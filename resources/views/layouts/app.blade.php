<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'BUsina Online') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa; /* Light background color */
        }
        .navbar {
            background-color: #ffffff; /* White background for navbar */
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); /* Soft shadow */
        }
        .navbar-nav .nav-link {
            background: linear-gradient(90deg, rgba(255, 179, 0, 1) 0%, rgba(0, 158, 255, 1) 100%);
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent; 
            font-weight: 500;
            padding: 10px 15px;
            font-size: 14px; /* Slightly larger font size */
            transition: background 0.3s ease; /* Smooth transition */
        }
        .navbar-nav .nav-link:hover { 
            background: linear-gradient(90deg, rgb(255, 140, 53) 0%, rgb(101, 181, 231) 100%);
            border-radius: 5px;
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent; 
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 16px; /* Adjusted font size for better visibility */
            color: transparent; /* Initially set to transparent for gradient */
            background: linear-gradient(90deg, rgba(255, 179, 0, 1) 0%, rgba(0, 158, 255, 1) 100%);
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent; 
            display: flex; /* Enable flex for alignment */
            align-items: center; /* Vertically center the logo and text */
        }
        .navbar-brand img {
            margin-right: 10px; /* Space between the logo and text */
            height: 40px; /* Set height for the logo */
        }
        .navbar-toggler {
            border-color: rgba(0, 0, 0, 0.1);
        }
        .navbar-toggler-icon {
            background-image: url('data:image/svg+xml;charset=UTF8,%3Csvg xmlns%3D%27http://www.w3.org/2000/svg%27 viewBox%3D%270 0 30 30%27%3E%3Cpath stroke%3D%27rgba(9, 47, 130, 1)%27 stroke-width%3D%272%27 linecap%3D%27round%27 d%3D%27M4 7h22M4 15h22M4 23h22%27/%3E%3C/svg%3E'); /* Adjusted icon color */
        }
        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 14px; /* Smaller font on mobile */
            }
            .navbar-nav .nav-link {
                font-size: 12px; /* Smaller nav link size on mobile */
            }
        }
    </style>
    @yield('head')
</head>
<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/busina_logo.png') }}" alt="Logo"> <!-- Logo beside the text -->
                BUsina Online
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto"> <!-- Right-aligned menu -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/privacy-policy') }}">Privacy Policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/guidelines') }}">Guidelines</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/faq') }}">FAQ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('content')

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
