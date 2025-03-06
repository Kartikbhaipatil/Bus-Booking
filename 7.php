<?php
include('header.php');
?>
<head>
<style>
    /* Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    /* Bus List Section */
    .bus-list {
        width: 80%;
        margin: 40px auto;
    }

    h2 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    /* Bus Container */
    .bus-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 20px;
    }

    /* Bus Card */
    .bus-card {
        display: flex;
        align-items: center;
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: 0.3s;
        position: relative;
    }

    .bus-card:hover {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    }

    /* Image */
    .bus-card img {
        width: 80px;
        height: 80px;
        border-radius: 10px;
        object-fit: cover;
    }

    /* Bus Info */
    .bus-info {
        flex-grow: 1;
        padding-left: 15px;
    }

    .bus-info h3 {
        font-size: 16px;
        font-weight: bold;
    }

    .bus-info p {
        font-size: 14px;
        color: gray;
        margin-top: 5px;
    }

    /* Price Styling */
    .price {
        font-size: 16px;
        font-weight: bold;
        color: #28a745; /* Green color */
        margin-top: 8px;
    }

    /* Book Button */
    .book-btn {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: #007BFF;
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
    }

    .book-btn:hover {
        background: #0056b3;
    }
</style>
</head>
<body>

<section class="bus-list">
    <h2>Available Buses</h2>
    <div class="bus-container">
        
        <!-- Bus Card 1 -->
        <div class="bus-card">
            <img src="images/bus1.jpeg" alt="Bus">
            <div class="bus-info">
                <h3>GreenLine Express</h3>
                <p class="time">🕒 08:30 AM → 02:15 PM</p>
                <p class="route">📍Mumbai → Udaipur-Sahelion ki bari</p>
                <p class="price">₹1200</p>
            </div>
            <a href="seat_layout.php"><button class="book-btn">Book Now</button></a>
        </div>

        <!-- Bus Card 2 -->
        <div class="bus-card">
            <img src="images/bus2.jpeg" alt="Bus">
            <div class="bus-info">
                <h3>RedLine Travels</h3>
                <p class="time">🕒 09:00 AM → 04:30 PM</p>
                <p class="route">📍 Mumbai → Udaipur</p>
                <p class="price">₹900</p>
            </div>
            <a href="seat_layout.php"><button class="book-btn">Book Now</button></a>
        </div>

        <!-- Bus Card 3 -->
        <div class="bus-card">
            <img src="images/bus3.jpeg" alt="Bus">
            <div class="bus-info">
                <h3>Blue Sky Bus</h3>
                <p class="time">🕒 10:15 AM → 06:00 PM</p>
                <p class="route">📍 Mumbai → Hill-juben</p>
                <p class="price">₹850</p>
            </div>
            <a href="seat_layout.php"><button class="book-btn">Book Now</button></a>
        </div>

        <!-- Bus Card 4 -->
        <div class="bus-card">
            <img src="images/bus4.jpeg" alt="Bus">
            <div class="bus-info">
                <h3>Orange Travels</h3>
                <p class="time">🕒 07:00 AM → 01:45 PM</p>
                <p class="route">📍 Mumbai → Udaipur-city palace</p>
                <p class="price">₹1000</p>
            </div>
            <a href="seat_layout.php"><button class="book-btn">Book Now</button></a>
        </div>

         <!-- Bus Card 5 -->
         <div class="bus-card">
            <img src="images/bus5.jpeg" alt="Bus">
            <div class="bus-info">
                <h3>Orange Travels</h3>
                <p class="time">🕒 07:00 AM → 01:45 PM</p>
                <p class="route">📍 Mumbai → Udaipur-sayajigunj</p>
                <p class="price">₹1000</p>
            </div>
            <a href="seat_layout.php"><button class="book-btn">Book Now</button></a>
        </div>

         <!-- Bus Card 6 -->
         <div class="bus-card">
            <img src="images/bus6.jpeg" alt="Bus">
            <div class="bus-info">
                <h3>Orange Travels</h3>
                <p class="time">🕒 07:00 AM → 01:45 PM</p>
                <p class="route">📍 Mumbai → Udaipur-majalpur</p>
                <p class="price">₹1000</p>
            </div>
            <a href="seat_layout.php"><button class="book-btn">Book Now</button></a>
        </div>

         <!-- Bus Card 7 -->
         <div class="bus-card">
            <img src="images/bus7.jpeg" alt="Bus">
            <div class="bus-info">
                <h3>Orange Travels</h3>
                <p class="time">🕒 07:00 AM → 03:50 PM</p>
                <p class="route">📍 Mumbai → jag mandir</p>
                <p class="price">₹1000</p>
            </div>
            <a href="seat_layout.php"><button class="book-btn">Book Now</button></a>
        </div>

         <!-- Bus Card 8 -->
         <div class="bus-card">
            <img src="images/bus8.jpeg" alt="Bus">
            <div class="bus-info">
                <h3>Orange Travels</h3>
                <p class="time">🕒 05:06 AM → 10:45 PM</p>
                <p class="route">📍 Mumbai → Lake-side</p>
                <p class="price">₹1000</p>
            </div>
            <a href="seat_layout.php"><button class="book-btn">Book Now</button></a>
        </div>

         <!-- Bus Card 9 -->
         <div class="bus-card">
            <img src="images/bus9.jpeg" alt="Bus">
            <div class="bus-info">
                <h3>Orange Travels</h3>
                <p class="time">🕒 06:30 AM → 01:09 PM</p>
                <p class="route">📍 Mumbai → Udaipur</p>
                <p class="price">₹1000</p>
            </div>
            <a href="seat_layout.php"><button class="book-btn">Book Now</button></a>
        </div>

    </div>
</section>

</body>
</html>
