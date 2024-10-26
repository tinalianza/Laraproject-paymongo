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
    @yield('head')
    <style>
 /* General Styles */
body, html {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background-color: #f5f5f9;
    height: 100vh;
    overflow: hidden;
    font-size: 12px; /* Adjusted font size */
}

/* Container Styles */
.container {
    display: grid;
    grid-template-columns: 250px 1fr; /* Sidebar and remaining space */
    grid-template-rows: 60px 20px 1fr; /* Navbar, empty space, and content */
    height: 100vh;
    background-color: white; /* Ensure container is white */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Header Styles */
.header {
    background-color: #ffffff;
    padding: 10px; /* Slightly increased padding */
    box-shadow: 0 0 0.375rem 0.25rem rgba(161, 172, 184, 0.15);
    border-radius: 5px;
    text-align: center;
    margin: 20px;
}

.page-title {
    font-size: 18px; /* Adjusted to match with general font size */
    font-weight: bold; 
    color: #566a7f; /* Updated color */
}

/* FAQ Content */
.faq-content {
    margin-top: 20px;
}

.faq-item {
    margin-bottom: 20px;
}

.faq-question {
    font-size: 20px;
    font-weight: bold;
    color: #444;
    margin-bottom: 5px;
}

.faq-answer {
    font-size: 14px; /* Reduced size to match with other text */
    color: #666;
    line-height: 1.6;
}

/* Links */
a {
    color: #007BFF;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

/* Table Styles */
.table {
    width: 100%; 
    border-collapse: collapse; 
    margin-bottom: 16px;
}

.th-class {
    padding: 8px;
    text-align: left;
    color: #566a7f;
    background-color: rgba(53, 192, 247, 0.3);
    font-size: 14px;
}

.td-class {
    padding: 8px;
    font-size: 14px;
}

#tableBody {
    color: #566a7f;
    overflow-y: auto; /* Enable vertical scrolling */
}

#tableBody tr:nth-child(even) {
    background-color: #f2f2f2; /* Light gray */
}

#tableBody tr:nth-child(odd) {
    background-color: #ffffff; /* White */
}

/* Pagination Styles */
.pagination {
    margin-top: 30px;
    font-size: 12px;
    color: #566a7f;
}

.pagination-buttons {
    text-align: center; /* Centers pagination buttons */
}

.pagination-buttons a {
    text-decoration: none;
    color: #566a7f;
    border: 1px solid #697a8d;
    padding: 5px;
    margin-right: 5px;
    border-radius: 5px;
    background-color: #f2f2f2;
}

.pg-active {
    border: 1px solid #697a8d;
    padding: 5px;
    border-radius: 5px;
    margin-right: 5px;
    color: #566a7f;
    background-color: rgba(53, 192, 247, 0.3);
}

/* Additional Styles */
.clock {
    font-size: 15px;
    font-weight: 500;
    color: #697a8d;
    padding-left: 10px;
}

/* Sidebar Styles */
.sidebar {
    background-color: #ffffff;
    color: #697a8d; /* Text color to match the theme */
    box-shadow: 0 0.125rem 0.375rem 0 rgba(161, 172, 184, 0.12);
    height: 100vh;
}

/* User Initials Circle */
.user-initial-circle {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 28px;
    height: 28px;
    background-color: #616779; /* Background color */
    color: white;
    border-radius: 50%;
    font-size: 14px;
    font-weight: 400;
    cursor: pointer;
    margin-right: 8px;
}

    </style>
</head>
<body>
    <div class="header-menu">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>
        <div class="hamburger" onclick="toggleMenu()">&#9776;</div> <!-- Hamburger icon -->
        <ul class="main-menu" id="navbar">
            <li><a href="{{ url('/') }}">BUsina Online</a></li>
            <li><a href="{{ url('/login') }}">Account</a></li>
            <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
            <li><a href="{{ url('/guidelines') }}">Guidelines</a></li>
            <li><a href="{{ url('/faq') }}">FAQ</a></li>
        </ul>
    </div>
    @yield('content')

    <!-- Footer Section -->
    <div class="footer">
        <img src="{{ asset('images/bug-logo.png') }}" alt="Bug Logo"> <!-- Path to your bug logo -->
    </div>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('navbar');
            menu.classList.toggle('active'); // Toggle active class
        }
    </script>
</body>
</html>
