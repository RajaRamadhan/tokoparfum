<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Parfum</title>
    <link rel="icon" href="{{ asset('asset/logo.png') }}" type="image/png"> <!-- Menambahkan favicon -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            display: flex;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            padding: 20px;
            color: white;
            height: 130vh;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #ecf0f1;
            min-height: 100vh;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sidebar ul li {
            margin: 10px 0;
        }
        .sidebar ul li a {
            color: #ecf0f1;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }
        .sidebar ul li a:hover {
            background-color: #34495e;
            color: #ffffff;
        }
        /* Optional: Add a logo or heading to the sidebar */
        .sidebar h1 {
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .sidebar img {
            width: 100px; /* Adjust the size as needed */
            margin-bottom: 20px; /* Space between image and heading */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h1>Dashboard Toko</h1>
        @include('layouts.sidebar')
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
