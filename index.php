<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Booking - Paytm Style</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

<header>
    <div class="navbar">
        <div class="logo">Shiv<span>shakti</span> travel</div>
        <ul class="nav-links">
            <li><a href="seat_layout.php">Ticket Booking</a></li>
            <li><a href="#routes">Buses</a></li>
            <li><a href="#routes">Seater Buses</a></li>
            <li><a href="#routes">Slipper Buses</a></li>
            <li><a href="company.php">Company</a></li>
        </ul>
        <div class="nav-right">
            <a href="review.php"><button class="review-btn">Review</button></a>
            <a href="admin_login.php"><button class="admin-btn">Admin</button></a>
        </div>
    </div>
</header>

<form action="seater.php" method="post">
    <section class="booking-section">
        <div class="booking-box">
            <h2>Book Bus Tickets</h2>

            <div class="trip-selection">
                <label><input type="radio" name="trip" value="one_way" checked> One Way</label>
                <label><input type="radio" name="trip" value="round_trip"> Round Trip</label>
            </div>

            <div class="form-group">
                <input type="text" name="from" id="from" placeholder="From" required>
                <span class="swap">&#8646;</span>
                <input type="text" name="to" id="to" placeholder="To" required>
            </div>

            <div class="seat-selection">
                <label><input type="checkbox" name="seat_type[]" value="Seater"> Seater</label>
                <label><input type="checkbox" name="seat_type[]" value="Sleeper"> Sleeper</label>
            </div>

            <div class="date-selection">
                <input type="date" name="travel_date" required>
            </div>

            <div class="seat-availability">
                <label><input type="checkbox" name="available_seats" value="1"> Show Only Available Buses</label>
            </div>

            <button type="submit" class="search-btn">Search Buses</button>
        </div>
    </section>
</form>


<section class="top-routes">
    <h2>Top Routes</h2>
    <div class="routes-container" id="routes">
        
        <!-- Route Card 1 -->
        <div class="route-card">
            <img src="images/1.jpg" alt="Hyderabad">
            <div class="route-info">
                <h3>Mumbai → Delhi</h3>
                <p>170 Buses</p>
            </div>
           <a href="1.php"><button class="view-btn">View all buses</button></a> 
        </div>

        <!-- Route Card 2 -->
        <div class="route-card">
            <img src="images/2.jpg" alt="Bangalore">
            <div class="route-info">
                <h3>Mumbai → Hyderabad</h3>
                <p>170 Buses</p>
            </div>
            <a href="2.php"><button class="view-btn">View all buses</button></a> 
        </div>

        <!-- Route Card 3 -->
        <div class="route-card">
            <img src="images/3.jpg" alt="Chennai">
            <div class="route-info">
                <h3>Mumbai → Vadodara</h3>
                <p>120 Buses</p>
            </div>
            <a href="3.php"><button class="view-btn">View all buses</button></a>
        </div>

        <!-- Route Card 4 -->
        <div class="route-card">
            <img src="images/4.jpg" alt="Indore">
            <div class="route-info">
                <h3>Mumbai → Bhopal</h3>
                <p>215 Buses</p>
            </div>
            <a href="4.php"><button class="view-btn">View all buses</button></a> 
        </div>

        <!-- Route Card 5 -->
        <div class="route-card">
            <img src="images/5.jpg" alt="Bhopal">
            <div class="route-info">
                <h3>Mumbai → Indore</h3>
                <p>180 Buses</p>
            </div>
            <a href="5.php"><button class="view-btn">View all buses</button></a> 
        </div>

        <!-- Route Card 6 -->
        <div class="route-card">
            <img src="images/7.jpg" alt="Vijayawada">
            <div class="route-info">
                <h3>Mumbai → Hyderabad</h3>
                <p>480 Buses</p>
            </div>
            <a href="6.php"><button class="view-btn">View all buses</button></a> 
        </div>

        <!-- Route Card 7 -->
        <div class="route-card">
            <img src="images/8.jpg" alt="Hyderabad">
            <div class="route-info">
                <h3>Mumbai → Udaipur</h3>
                <p>600 Buses</p>
            </div>
            <a href="7.php"><button class="view-btn">View all buses</button></a> 
        </div>

        <!-- Route Card 8 -->
        <div class="route-card">
            <img src="images/6.jpg" alt="Chennai">
            <div class="route-info">
                <h3>Mumbai → Chennai</h3>
                <p>110 Buses</p>
            </div>
            <a href="8.php"><button class="view-btn">View all buses</button></a> 
        </div>

    </div>
</section>

</body>
</html>
