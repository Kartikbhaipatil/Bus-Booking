<?php
include('header.php');
?>
<head>
<style>
    /* General Styling */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        background: #f5f5f5;
        text-align: center;
    }

    /* Seat Selection Section */
    .seat-selection-container {
        width: 80%;
        margin: 40px auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-size: 22px;
        margin-bottom: 10px;
    }

    /* Sleeper Bus Layout (2 Decks: Lower & Upper) */
    .sleeper-deck {
        display: flex;
        justify-content: center;
        gap: 40px;
        margin-top: 20px;
    }

    .deck {
        width: 45%;
    }

    .deck-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .seat-layout {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
        justify-content: center;
    }

    /* Seat Box */
    .seat {
        width: 60px;
        height: 40px;
        background: #ddd;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: 0.3s;
        font-weight: bold;
    }

    .seat:hover {
        background: #28a745;
        color: white;
    }

    .seat.selected {
        background: #28a745 !important;
        color: white;
    }

    .seat.booked {
        background: #ff4d4d !important;
        color: white;
        cursor: not-allowed;
    }

    /* Seat Legend */
    .seat-legend {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 20px;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .legend-item span {
        width: 20px;
        height: 20px;
        display: inline-block;
        border-radius: 5px;
    }

    .available { background: #ddd; }
    .selected { background: #28a745; }
    .booked { background: #ff4d4d; }

    /* Total Price Section */
    .price-container {
        margin-top: 20px;
        font-size: 18px;
        font-weight: bold;
        color: #333;
    }

    .total-price {
        color: #28a745;
        font-size: 22px;
    }

    /* Confirm Button */
    .confirm-btn {
        margin-top: 20px;
        padding: 10px 15px;
        font-size: 16px;
        background: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    .confirm-btn:hover {
        background: #0056b3;
    }

</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let seats = document.querySelectorAll(".seat");
        let totalPriceElement = document.getElementById("totalPrice");
        const pricePerSeat = 800; // Sleeper seat price

        seats.forEach(seat => {
            seat.addEventListener("click", function() {
                if (!this.classList.contains("booked")) {
                    this.classList.toggle("selected");

                    // Calculate total price based on selected seats
                    let selectedSeats = document.querySelectorAll(".seat.selected").length;
                    let totalPrice = selectedSeats * pricePerSeat;
                    totalPriceElement.innerText = "₹" + totalPrice;
                }
            });
        });
    });
</script>
</head>
<body>

<section class="seat-selection-container">
    <h2>Select Your Sleeper Seats</h2>

    <div class="sleeper-deck">
        <!-- Lower Deck -->
        <div class="deck">
            <div class="deck-title">Lower Deck</div>
            <div class="seat-layout">
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    // Randomly mark some seats as booked
                    $booked = (rand(1, 10) > 8) ? "booked" : "";
                    echo "<div class='seat $booked' data-seat='L$i'>L$i</div>";
                }
                ?>
            </div>
        </div>

        <!-- Upper Deck -->
        <div class="deck">
            <div class="deck-title">Upper Deck</div>
            <div class="seat-layout">
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    // Randomly mark some seats as booked
                    $booked = (rand(1, 10) > 8) ? "booked" : "";
                    echo "<div class='seat $booked' data-seat='U$i'>U$i</div>";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Seat Legend -->
    <div class="seat-legend">
        <div class="legend-item"><span class="available"></span> Available</div>
        <div class="legend-item"><span class="selected"></span> Selected</div>
        <div class="legend-item"><span class="booked"></span> Booked</div>
    </div>

    <!-- Total Price -->
    <div class="price-container">
        Total Price: <span class="total-price" id="totalPrice">₹0</span>
    </div>

    <!-- Confirm Booking Button -->
    <button class="confirm-btn">Confirm Selection</button>
</section>

</body>
</html>
