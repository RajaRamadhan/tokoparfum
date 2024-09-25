<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Parfum</title>
    <link rel="icon" href="{{ asset('asset/logo4.png') }}" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            min-height: 100vh; 
        }


        .sidebar {
            width: 250px;
            background-color: #111827;
            color: #9ca3af;
            min-height: 100vh;
            padding-top: 10px;
            padding-bottom: 20px;
            position: fixed;
            overflow-y: auto; 
        }

        .sidebar h1 {
            font-size: 20px;
            color: #ffffff;
            text-align: center;
            margin-bottom: 30px;
            letter-spacing: 1px;
            font-weight: bold;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 10px 0;
        }

        .sidebar ul li a {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: #9ca3af;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s;
        }

        .sidebar ul li a i {
            margin-right: 15px;
            font-size: 18px;
        }

        .sidebar ul li a:hover {
            background-color: #1f2937; 
            color: #ffffff;
        }

        .sidebar ul li a.active {
            background-color: #2563eb; 
            color: #ffffff;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
            background-color: #f3f4f6; 
            min-height: 100vh;
        }

        
        .sidebar ul li a.active i {
            color: #ffffff;
        }

        .sidebar ul li a i {
            transition: color 0.3s;
        }

        
        .profile {
            display: flex;
            align-items: center;
            padding-left: 20px;
            margin-bottom: 20px;
        }

        .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .profile-info {
            color: #fff;
        }

        .profile-info span {
            display: block;
        }

        .profile-info .status {
            color: #10b981; 
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h1>Toko Parfum</h1>
        
        <!-- Profile Info Section -->
        <div class="profile">
            <img src="{{ asset('asset/logo2.png') }}" alt="Profile Picture">
            <div class="profile-info">
                <span>Gold Member</span>
                <span class="status">Online</span>
            </div>
        </div>

        <ul>
            @include('layouts.sidebar')
        </ul>
    </div>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
