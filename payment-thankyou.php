<?php
include('header.php');
?>

<head>
    <style>
        .thankyou-container {
            text-align: center;
            padding: 50px;
            background: #fff;
            margin: 50px auto;
            width: 50%;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #28a745;
        }

        .btn {
            background-color: #007BFF;
            color: white;
            padding: 12px 20px;
            border: none;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="thankyou-container">
        <h2>🎉 Booking Confirmed!</h2>
        <p>Thank you for choosing **ShivShakti Travels** 🚍</p>
        <p>Check your email for confirmation details.</p>
        <a href="index.php" class="btn">Go to Home</a>
    </div>

</body>
