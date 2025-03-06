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
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 15px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background: #007BFF;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
            cursor: pointer;
        }

        .back-btn:hover {
            background: #0056b3;
        }

        .back-btn span {
            font-size: 18px;
        }

    </style>
</head>
<header>
    <div class="navbar">
        <div class="logo">Shiv<span>shakti</span> travel</div>
        <ul class="nav-links">
            <li><a href="#">Ticket Booking</a></li>
            <li><a href="#">Recharge & Bills</a></li>
            <li><a href="#">Payments & Services</a></li>
            <li><a href="#">Paytm for Business</a></li>
            <li><a href="#">Company</a></li>
        </ul>
        <div class="nav-right">
        <a href="index.php" class="back-btn"> <span>&#8592;</span> Back </a>

        </div>
    </div>
</header>