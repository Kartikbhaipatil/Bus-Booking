<?php include('header.php'); ?>
<head>
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
    body { background: #f5f5f5; text-align: center; }
    .seat-selection-container {
        width: 50%; margin: 40px auto; background: white; padding: 20px;
        border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    h2 { font-size: 22px; margin-bottom: 10px; }
    .bus-layout {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
        justify-content: center;
        margin-top: 20px;
        position: relative;
    }
    .driver-seat {
        grid-column: span 4;
        width: 60px; height: 60px;
        background: #000; color: white;
        text-align: center; font-weight: bold;
        display: flex; align-items: center; justify-content: center;
        border-radius: 5px; margin: 0 auto;
    }
    .seat {
        width: 50px; height: 50px; background: #ddd;
        border-radius: 5px; display: flex; align-items: center;
        justify-content: center; cursor: pointer;
        transition: 0.3s; font-weight: bold;
    }
    .seat:hover { background: #28a745; color: white; }
    .seat.selected { background: #28a745 !important; color: white; }
    .seat.booked { background: #ff4d4d !important; color: white; cursor: not-allowed; }
    .seat-legend {
        display: flex; justify-content: center; gap: 15px; margin-top: 20px;
    }
    .legend-item { display: flex; align-items: center; gap: 5px; }
    .legend-item span { width: 20px; height: 20px; display: inline-block; border-radius: 5px; }
    .available { background: #ddd; }
    .selected { background: #28a745; }
    .booked { background: #ff4d4d; }
    .price-container {
        margin-top: 20px; font-size: 18px; font-weight: bold; color: #333;
    }
    .total-price { color: #28a745; font-size: 22px; }
    .confirm-btn {
        margin-top: 20px; padding: 10px 15px; font-size: 16px;
        background: #007BFF; color: white; border: none; border-radius: 5px;
        cursor: pointer; transition: 0.3s;
    }
    .confirm-btn:hover { background: #0056b3; }
    .error-message {
        color: red; font-size: 16px; margin-top: 10px; display: none;
    }
</style>
</head>
<body>

<section class="seat-selection-container">
    <h2>Select Your Seats</h2>

    <div class="bus-layout">
        <!-- Driver Seat -->
        <div class="driver-seat">Driver</div>

        <?php
        $total_seats = 30;
        $rows = 10; // 10 rows
        $cols = 4;  // 4 columns per row (2 on each side of the aisle)
        
        $seat_number = 1;
        
        for ($r = 1; $r <= $rows; $r++) {
            for ($c = 1; $c <= $cols; $c++) {
                // Create an aisle space (no seat)
                if ($c == 3) {
                    echo "<div style='visibility: hidden;'></div>";
                    continue;
                }

                $booked = (rand(1, 10) > 8) ? "booked" : "";
                echo "<div class='seat $booked' data-seat='$seat_number'>$seat_number</div>";
                $seat_number++;
            }
        }
        ?>
    </div>

    <div class="seat-legend">
        <div class="legend-item"><span class="available"></span> Available</div>
        <div class="legend-item"><span class="selected"></span> Selected</div>
        <div class="legend-item"><span class="booked"></span> Booked</div>
    </div>

    <div class="price-container">
        Total Price: <span class="total-price" id="totalPrice">₹0</span>
    </div>

    <p class="error-message" id="errorMessage">Please select at least one seat.</p>

    <!-- Form to Submit Selection -->
    <form action="payment.php" method="post" onsubmit="return validateSelection();">
        <input type="hidden" name="selected_seats" id="selected_seats">
        <input type="hidden" name="total_price" id="total_price">
        <button type="submit" class="confirm-btn">Confirm Selection</button>
    </form>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let selectedSeats = [];
        let seatPrice = 500;

        document.querySelectorAll('.seat').forEach(seat => {
            if (!seat.classList.contains('booked')) {
                seat.addEventListener('click', function () {
                    if (this.classList.contains('selected')) {
                        this.classList.remove('selected');
                        selectedSeats = selectedSeats.filter(s => s !== this.dataset.seat);
                    } else {
                        this.classList.add('selected');
                        selectedSeats.push(this.dataset.seat);
                    }

                    document.getElementById('selected_seats').value = selectedSeats.join(',');
                    document.getElementById('total_price').value = selectedSeats.length * seatPrice;
                    document.getElementById('totalPrice').innerText = '₹' + (selectedSeats.length * seatPrice);
                });
            }
        });
    });

    function validateSelection() {
        let selectedSeats = document.getElementById('selected_seats').value;
        if (!selectedSeats) {
            document.getElementById('errorMessage').style.display = 'block';
            return false;
        }
        return true;
    }
</script>

</body>
</html>
