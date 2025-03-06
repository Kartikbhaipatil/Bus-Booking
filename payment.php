<?php
include('header.php');
session_start();

$total_price = isset($_POST['total_price']) ? $_POST['total_price'] : 0;
$selected_seats = isset($_POST['selected_seats']) ? $_POST['selected_seats'] : '';

$_SESSION['total_price'] = $total_price; 
$_SESSION['selected_seats'] = $selected_seats; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
        /* General Styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        .payment-container {
            width: 400px;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 15px;
        }

        p {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
        }

        .highlight {
            font-size: 18px;
            font-weight: bold;
            color: #28a745;
        }

        /* Pay Now Button */
        .pay-btn {
            width: 100%;
            padding: 12px;
            background: #007BFF;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 15px;
        }

        .pay-btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="payment-container">
    <h2>Payment</h2>
    <p><strong>Selected Seats:</strong> <span class="highlight"><?php echo $selected_seats; ?></span></p>
    <p><strong>Total Amount:</strong> <span class="highlight">₹<?php echo number_format((float)$total_price, 2); ?></span></p>


    <form action="payment2.php" method="post">
        <input type="hidden" name="amount" value="<?php echo $total_price; ?>">
        <button type="submit" class="pay-btn">Pay Now</button>
    </form>
</div>

</body>
</html>
