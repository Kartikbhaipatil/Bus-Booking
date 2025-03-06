<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            justify-content: center;
            align-items: center;
            position: absolute;
            left: 35%;
            top: 35%;

        }
        h2 {
            color: #28a745;
        }
        p {
            color: #333;
        }
        .button-1 {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .button-1:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Thank You! 🎉</h2>
        <p>Your feedback has been successfully submitted.</p>
        <a href="index.php" class="button-1">Go to Home</a>
    </div>

</body>
</html>
