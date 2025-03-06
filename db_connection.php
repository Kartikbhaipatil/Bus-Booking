<?php
// Database Configuration
$host = "localhost";  
$user = "root";       
$pass = "";           
$dbname = "bus_booking";

// Create Connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
