<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ForgotPasswordController extends Controller
{
    // Show the forgot password form
    public function showForm()
    {
        return view('forgot_pass');
    }

    // Send reset token to email
    public function sendResetCode(Request $request)
    {
        // Validate email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return redirect()->route('password.request')
                ->withErrors($validator)
                ->withInput();
        }

        // Fetch user by email
        $user = DB::table('users')->where('email', $request->email)->first();

        // Generate a random reset token
        $resetToken = rand(100000, 999999);

        // Store the reset token in password_resets table
        DB::table('password_resets')->updateOrInsert(
            ['users_id' => $user->id],  // Use 'users_id' instead of 'email'
            [
                'reset_token' => $resetToken,  // Use 'reset_token' instead of 'reset_code'
                'expiration' => now()->addMinutes(10),
                'used_reset_token' => 0,
            ]
        );

        // Send reset token via email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME'); // Your email
            $mail->Password = env('MAIL_PASSWORD'); // Your app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('ronabalangat2003@gmail.com', 'YourApp');
            $mail->addAddress($user->email);

            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Token';
            $mail->Body = "
            <html>
            <body>
                <h3>Password Reset Request</h3>
                <p>Hello,</p>
                <p>You requested to reset your password. Use the following code to reset your password:</p>
                <h2>{$resetToken}</h2>
                <p>If you did not request this, please ignore this email.</p>
            </body>
            </html>";

            $mail->send();
        } catch (Exception $e) {
            \Log::error("Failed to send reset token: {$mail->ErrorInfo}");
            return redirect()->route('password.request')
                ->with('error', 'Failed to send reset token. Please try again later.');
        }

        return redirect()->route('password.reset.form')->with('success', 'Reset token sent to your email.');
    }

    // Verify reset token and reset password
    public function verifyResetCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'reset_token' => 'required|numeric', // Ensure this matches the form field name
            'password' => 'required|min:6|confirmed',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('password.reset.form')
                ->withErrors($validator)
                ->withInput();
        }
    
        // Fetch the reset record
        $resetRecord = DB::table('password_resets')
            ->where('reset_token', $request->reset_token) // Ensure this matches
            ->where('expiration', '>', now())
            ->where('used_reset_token', 0)
            ->where('users_id', DB::table('users')->where('email', $request->email)->first()->id)
            ->first();
    
        if (!$resetRecord) {
            return redirect()->route('password.reset.form')
                ->with('error', 'Invalid or expired reset token.');
        }
    
        // Update user's password
        DB::table('users')->where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);
    
        // Mark the reset token as used
        DB::table('password_resets')->where('reset_token', $request->reset_token)
            ->update(['used_reset_token' => 1]);
    
        return redirect()->route('login')->with('success', 'Password reset successful.');
    }
    
    // Show reset form
    public function showResetForm()
    {
        return view('reset_password');
    }
}
