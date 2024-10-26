@extends('layouts.app')

@section('title', 'BUsina Online Dashboard')

@section('content')

<style>
html, body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background-color: #f5f5f9;
    height: 100vh;
    overflow: hidden;
    font-size: 14px;
}

.card {
    background-image: url('/images/torch.png'); 
    background-size: cover;
    background-position: center;
    border: 2px solid #f7f5f4;
    border-radius: 15px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 30px;
    width: 100%;
    max-width: 800px;
}


.sidebar {
    width: 50px;
    background-color: #054470;
    height: 35%;
    position: fixed;
    top: 30%;
    left: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 20px;
    color: white;
    transition: transform 0.3s ease;
    transform: translateY(-50%);
    transform: translateX(0);
    border-radius: 10px;
    margin-left: 10px;
}

.sidebar.hidden {
    transform: translateX(-100%);
}

.sidebar .logo img {
    width: 40%;
}

.sidebar-menu {
    list-style: none;
    padding: 0;
    margin: 20px 0 0 0;
    width: 100%;
}

.sidebar-menu li {
    width: 100%;
    text-align: center;
    margin: 10px 0;
    position: relative;
}

.sidebar-menu li a {
    text-decoration: none;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    transition: background-color 0.3s;
}

.sidebar-menu li a:hover {
    background-color: #34495e;
}

.sidebar-menu li a.active::after,
.sidebar-menu li a:hover::after {
    content: attr(data-tooltip);
    position: absolute;
    left: 100%;
    top: 50%;
    font-size: 8px;
    transform: translateY(-50%);
    background-color: #34495e;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    white-space: nowrap;
    z-index: 1000;
    opacity: 1;
    visibility: visible;
    transition: opacity 0.3s ease, visibility 0.3s ease;
}

.sidebar-menu li a img {
    width: 30px;
    height: 30px;
}

.toggle-btn {
    position: absolute;
    top: 10%;
    left: 100%;
    transform: translateX(0px) translateY(-50%);
    background-color: #e77743;
    color: white;
    border-radius: 3px;
    border: none;
    padding: 10px;
    cursor: pointer;
    z-index: 1000;
}

.main-content {
    margin-left: 80px;
    padding: 40px;
    width: calc(100% - 80px);
    display: flex;
    flex-direction: column;
    align-items: center;
    height: 70%;
}

/* User initials circle */
.user-initials-circle {
    background-color: #f39c12;
    color: #fff;
    border-radius: 50%;
    width: 100px;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 36px;
    font-weight: 500;
    letter-spacing: 1px;
    margin-bottom: 15px;
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.08);
}

/* Date and time container */
.datetime {
    font-size: 16px;
    color: #555;
    text-align: center;
    margin-bottom: 15px;
}

/* Logout button */
.logout-button {
    background-color: #e74c3c;
    color: #fff;
    border: none;
    padding: 10px 30px;
    font-size: 14px;
    border-radius: 30px;
    cursor: pointer;
}

.logout-button:hover {
    background-color: #c0392b;
}
</style>

<div class="d-flex">
    <div class="sidebar" id="sidebar">
        <ul class="sidebar-menu">
            <li><a href="{{ route('dashboard') }}" data-tooltip="Home"><img src="{{ asset('images/home_btn.png') }}" alt="Home Icon"></a></li>
            <li><a href="{{ route('vehicles.list') }}" data-tooltip="Vehicles"><img src="{{ asset('images/vehicle_btn.png') }}" alt="Vehicles Icon"></a></li>
            <li><a href="{{ route('edit.page') }}" data-tooltip="Edit Profile"><img src="{{ asset('images/edit_btn.png') }}" alt="Edit Icon"></a></li>
        </ul>
        <button class="toggle-btn" id="toggle-btn">☰</button>
    </div>

    <div class="main-content">
        <div class="card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="user-initials-circle">
                    @if(Auth::check() && Auth::user()->vehicleOwner)
                        @php
                            $firstName = Auth::user()->vehicleOwner->fname;
                            $lastName = Auth::user()->vehicleOwner->lname;
                            $initials = strtoupper(substr($firstName, 0, 1) . substr($lastName, 0, 1));
                        @endphp
                        {{ $initials }}
                    @endif
                </div>
                <div class="datetime text-center">
                    <p id="current-date"></p>
                    <p id="current-time"></p>
                </div>
            </div>

            <div class="text-center mb-3">
                <h5>Welcome, {{ Auth::user()->name }}!</h5>
                <p>Your vehicle details and status are displayed below:</p>
            </div>

            <button class="logout-button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('toggle-btn').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('hidden');
    });

    function updateDateTime() {
        var now = new Date();
        var date = now.toLocaleDateString();
        var time = now.toLocaleTimeString();
        document.getElementById('current-date').textContent = date;
        document.getElementById('current-time').textContent = time;
    }

    setInterval(updateDateTime, 1000);
    updateDateTime();
</script>

@endsection
