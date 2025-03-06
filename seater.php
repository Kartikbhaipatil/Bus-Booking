<?php
include('header.php');
$servername = "localhost";
$username = "root";
$password = "";
$database = "bus_booking";

// Create database connection
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$route_from = $_POST['from'];
$route_to = $_POST['to'];
$travel_date = $_POST['travel_date'];
$bus_types = isset($_POST['seat_type']) ? $_POST['seat_type'] : [];

$bus_type_condition = "";
if (!empty($bus_types)) {
    $bus_types_str = "'" . implode("', '", $bus_types) . "'";
    $bus_type_condition = "AND bus_type IN ($bus_types_str)";
}

// Fetch available buses
$sql = "SELECT * FROM buses 
        WHERE route_from = ? 
        AND route_to = ? 
        $bus_type_condition
        ORDER BY departure_time ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $route_from, $route_to);
$stmt->execute();
$result = $stmt->get_result();
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

    body {
        background: #f8f9fa;
    }

    /* Bus List Section */
    .bus-list {
        width: 80%;
        margin: 40px auto;
    }

    h2 {
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
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
        padding: 20px;
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

    .price {
        font-size: 16px;
        font-weight: bold;
        color: #28a745;
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
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="bus-card">
                    <img src="images/bus1.jpeg" alt="Bus">
                    <div class="bus-info">
                        <h3>' . $row['bus_type'] . ' - ' . $row['route_from'] . ' → ' . $row['route_to'] . '</h3>
                        <p class="time">🕒 ' . $row['departure_time'] . ' → ' . $row['arrival_time'] . '</p>
                        <p class="route">📍 ' . $row['route_from'] . ' → ' . $row['route_to'] . '</p>
                        <p class="price">₹' . $row['fare'] . '</p>
                    </div>
                    <a href="seat_layout.php?bus_id=' . $row['id'] . '"><button class="book-btn">Book Now</button></a>
                </div>';
            }
        } else {
            echo "<h3 style='text-align:center;'>No buses available for the selected route and criteria.</h3>";
        }
        ?>
    </div>
</section>
</body>

<?php $conn->close(); ?>
