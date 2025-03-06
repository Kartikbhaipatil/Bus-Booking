<?php
include('db_connection.php'); // Ensure this file contains database connection details
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $card_name = $_POST['card_name'];
    $card_number = $_POST['card_number'];
    $exp_date = $_POST['exp_date'];
    $cvv = $_POST['cvv'];
    $amount = $_POST['amount'];

    // Validate input (basic example)
    if (strlen($card_number) != 16 || strlen($cvv) != 3) {
        echo "<script>alert('Invalid Card Details!'); window.location.href='payment.php';</script>";
        exit();
    }

    // Encrypt card details (only for storage security)
    $hashed_card_number = password_hash($card_number, PASSWORD_BCRYPT);
    $hashed_cvv = password_hash($cvv, PASSWORD_BCRYPT);

    // Insert into database
    $sql = "INSERT INTO payment (card_name, card_number, exp_date, cvv, amount, payment_status) 
            VALUES (?, ?, ?, ?, ?, 'Completed')";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssd", $card_name, $hashed_card_number, $exp_date, $hashed_cvv, $amount);

    if ($stmt->execute()) {
        echo "<script>alert('Payment Successful!'); window.location.href='thankyou.php';</script>";
    } else {
        echo "<script>alert('Payment Failed! Try again.'); window.location.href='payment.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
