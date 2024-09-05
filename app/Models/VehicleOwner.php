<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleOwner extends Model
{
    protected $table = 'vehicle_owner'; 

    protected $fillable = [
        'fname', 'lname', 'mname', 'contact_no', 'applicant_type_id',
        'qr_code', 'emp_id', 'std_id', 'driver_license_no',
    ];

    public function applicantType()
    {
        return $this->belongsTo(ApplicantType::class, 'applicant_type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'vehicle_owner_id');
    }
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'vehicle_owner_id');
    }

}
