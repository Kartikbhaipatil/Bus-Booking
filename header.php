<head>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Header */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 10%;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #0033a0;
        }

        .logo span {
            color: #ec7927;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .nav-links li a {
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }

        .nav-right {
            display: flex;
            gap: 15px;
        }
        
        .review-btn {
            background: #2e67e2;
            color: white;
            font-size: 14px;
            height: 30px;
            width: 60px;
        }
        .admin-btn {
            background: #2e67e2;
            color: white;
            font-size: 14px;
            height: 30px;
            width: 60px;
        }
    </style>
</head>
<header>
    <div class="navbar">
        <div class="logo">Shiv<span>shakti</span> travel</div>
        <ul class="nav-links">
            <li><a href="seat_layout.php">Ticket Booking</a></li>
            <li><a href="index.php">Buses</a></li>
            <li><a href="index.php">Seater Buses</a></li>
            <li><a href="index.php">Slipper Buses</a></li>
            <li><a href="company.php">Company</a></li>
        </ul>
        <div class="nav-right">
           <a href="review.php"> <button class="review-btn">Review</button></a>
           <a href="admin.php"> <button class="admin-btn">Admin</button></a>
        </div>
    </div>
</header>