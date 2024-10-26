@extends('layouts.app')
@section('title', 'BUsina Online')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f9;
            height: auto;
        }

        .top {
            position: relative;
            overflow: hidden;
        }

        .top img {
            width: 100%;
            height: auto;
            max-height: 450px;
            object-fit: cover;
        }

        .overlay-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }

        .overlay-text h1 {
            font-size: 2.5rem;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .learn-more {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #FF8C00; /* Bright Orange */
            color: white;
            text-decoration: none;
            border-radius: 10px;
            transition: background 0.3s;
        }

        .learn-more:hover {
            background: #F39C12; /* Lighter Orange */
        }

        .slider-container { 
            background: linear-gradient(to right, rgba(255, 111, 0, 0.5), rgba(255, 179, 0, 0.5), rgba(0, 114, 184, 0.5));
            /* Gradient with transparency (opacity of 0.5) */
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2); /* Soft shadow */
            padding: 25px 0; /* Add padding for better spacing */
        }

        .steps {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            padding: 25px;
            color: white;
        }

        .step {
            text-align: center;
            flex: 1 1 150px; /* Ensure responsiveness */
            margin: 5px;
        }

        .step img {
            width: 70px; /* Slightly larger for better visibility */
            height: auto;
        }

        .card-container {
            padding: 20px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px; /* Increase space between cards */
        }

        .card {
            width: 18rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: none; /* Remove default border */
            border-radius: 10px; /* Rounded corners */
            overflow: hidden; /* Ensure image fits within rounded corners */
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px); /* Lift effect on hover */
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card-body {
            background-color: #fff; /* White background for card body */
            padding: 15px; /* Padding inside the card */
        }

        .card-title {
            color: #005B96; /* Dark blue for the card titles */
        }

        marquee {
            margin-top: 10px;
            font-family: 'Poppins', sans-serif;
            color: #F39C12; /* Bright Orange */
            font-weight: bold; /* Make marquee text bold */
        }

        /* Media Queries for responsiveness */
        @media (max-width: 768px) {
            .overlay-text h1 {
                font-size: 1.8rem;
            }

            .steps {
                flex-direction: column;
                align-items: center;
            }

            .step img {
                width: 50px; /* Smaller on mobile */
            }

            .card {
                width: 100%; /* Full width on mobile */
                max-width: 300px; /* Limit max width */
            }
        }
    </style>
</head>

<body>
    <div class="top">
        <img src="{{ asset('images/bu-orange.png') }}" alt="Bicol University">
        <div class="overlay-text">
            <h1>Welcome, Beepers!</h1>
            <a href="https://bicol-u.edu.ph/" class="learn-more">Learn More</a>
        </div>
    </div>

    <div class="slider-container">
        <div class="steps">
            <div class="step">
                <img src="{{ asset('images/step1.png') }}" alt="Step 1">
                <p>Step 1</p>
                <p>Register/Login</p>
            </div>
            <div class="step">
                <img src="{{ asset('images/step2.png') }}" alt="Step 2">
                <p>Step 2</p>
                <p>Fill out the Application Form</p>
            </div>
            <div class="step">
                <img src="{{ asset('images/step3.png') }}" alt="Step 3">
                <p>Step 3</p>
                <p>Upload Documents</p>
            </div>
            <div class="step">
                <img src="{{ asset('images/step4.png') }}" alt="Step 4">
                <p>Step 4</p>
                <p>Make Payment</p>
            </div>
            <div class="step">
                <img src="{{ asset('images/step5.png') }}" alt="Step 5">
                <p>Step 5</p>
                <p>Receive Confirmation</p>
            </div>
        </div>
    </div>

    <div class="card-container">
        <div class="card">
            <img src="{{ asset('images/busina card guest.png') }}" alt="Guest Card">
            <div class="card-body">
                <h5 class="card-title">Guest Card</h5>
                <p class="card-text">Special access for guests.</p>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('images/busina card staff.png') }}" alt="Staff Card">
            <div class="card-body">
                <h5 class="card-title">Staff Card</h5>
                <p class="card-text">Access for staff members.</p>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('images/busina card student.png') }}" alt="Student Card">
            <div class="card-body">
                <h5 class="card-title">Student Card</h5>
                <p class="card-text">For registered students.</p>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('images/busina card vip.png') }}" alt="VIP Card">
            <div class="card-body">
                <h5 class="card-title">VIP Card</h5>
                <p class="card-text">Exclusive access for VIPs.</p>
            </div>
        </div>
    </div>

    <marquee behavior="scroll" direction="left" scrollamount="20">
        GET YOUR BUSINA CARD NOW! GET YOUR BUSINA CARD NOW! GET YOUR BUSINA CARD NOW!
    </marquee>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
