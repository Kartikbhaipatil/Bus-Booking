<?php
include('header.php');
session_start();
$total_price = isset($_SESSION['total_price']) ? $_SESSION['total_price'] : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>

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

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .highlight {
        font-size: 18px;
        font-weight: bold;
        color: #28a745;
        }

        .pay-btn{
            width: 100%;
            padding: 10px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .pay-btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="payment-container">
    <h2>Payment Details</h2>
    <p><strong>Total Amount:</strong> <span class="highlight">₹<?php echo number_format((float)$total_price, 2); ?></span></p>

    <form action="process-payment.php" method="POST">
        <input type="text" name="card_name" placeholder="Cardholder Name" required>
        <input type="text" name="card_number" placeholder="Card Number" maxlength="16" required>
        <input type="text" name="exp_date" placeholder="MM/YYYY" required>
        <input type="password" name="cvv" placeholder="CVV" maxlength="3" required>
        <input type="hidden" name="amount" value="<?php echo $total_price; ?>">
        
        <button type="submit" class="pay-btn">Confirm Payment</button>
    </form>
</div>

</body>
</html>
