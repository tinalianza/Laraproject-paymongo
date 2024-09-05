@extends('layouts.app')

@section('title', 'BUsina Online')

@section('content')
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
<style>
    h1 {
        font-family: 'Poppins', sans-serif;
        font-size: 18px; 
        color: black;
        margin: 0;
        text-align: center; 
    }

    .bee {
        color: #0061A6;
    }

    .per {
        color: #F2752B;
    }

    html, body {
        height: 100%;
        margin: 0;
        font-family: 'Poppins', sans-serif;
        font-size: 11px; 
        background-color: #ecf0f1;
        overflow-x: hidden;
    }

    .container {
        display: flex;
        align-items: center;
        height: 100vh; 
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

    .table-container {
        width: 60%; 
        margin: auto;
        margin-top: 150px; 
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .page-title {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .search-input, .filter-select {
        padding: 8px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    .search-input {
        width: 300px;
    }

    .filter-select {
        width: 120px;
    }

    .table th, .table td {
        padding: 8px; 
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: #f4f4f4;
    }

    .table tr:hover {
        background-color: #f1f1f1;
    }

    .pagination {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .pagination div {
        font-size: 14px;
    }

    .renew-btn {
        background-color: #e77743;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 5px 10px;
        cursor: pointer;
    }

    .add-vehicle-btn {
        background-color: #054470;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 10px 20px;
        cursor: pointer;
        margin-top: 20px;
        display: block;
    }
</style>

<div class="sidebar" id="sidebar">
    <ul class="sidebar-menu">
        <li><a href="{{ route('dashboard') }}" data-tooltip="Home"><img src="{{ asset('images/home_btn.png') }}" alt="Home Icon"></a></li>
        <li><a href="{{ route('vehicles.list') }}" data-tooltip="Registered Vehicles"><img src="{{ asset('images/vehicle_btn.png') }}" alt="Vehicles Icon"></a></li>
        <li><a href="{{ route('edit.page') }}" data-tooltip="Edit Profile"><img src="{{ asset('images/edit_btn.png') }}" alt="Edit Icon"></a></li>
    </ul>
    <button class="toggle-btn" id="toggle-btn">☰</button>
</div>

<div class="table-container">
    <div class="heading">
        <h1>My <span class="bee">Bee</span><span class="per">per</span> Vehicles</h1>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Model/Color</th>
                <th>Plate Number</th>
                <th>Expiry Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($vehicles as $vehicle)
                <tr onclick="window.location='{{ route('reg_details', ['id' => $vehicle->id]) }}'">
                    <td>{{ $vehicle->model_color }}</td>
                    <td>{{ $vehicle->plate_no }}</td>
                    <td>{{ $vehicle->expiry_date}}</td>
                    <td><button class="renew-btn" onclick="event.stopPropagation(); window.location='{{ route('vehicle.renew', ['id' => $vehicle->id]) }}'">Renew</button></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No vehicles found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <button class="add-vehicle-btn" onclick="location.href='{{ route('vehicle.add') }}'">Add Vehicle</button>
</div>

<script>
    document.getElementById('toggle-btn').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('hidden');
    });
</script>

@endsection
