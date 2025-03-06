<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

include("db_connection.php");

// Handle adding a bus
if (isset($_POST['add_bus'])) {
    $route_from = $_POST['route_from'];
    $route_to = $_POST['route_to'];
    $bus_type = $_POST['bus_type'];
    $total_seats = $_POST['total_seats'];
    $available_seats = $_POST['available_seats'];
    $fare = $_POST['fare'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $duration = $_POST['duration'];

    $sql = "INSERT INTO buses (route_from, route_to, bus_type, total_seats, available_seats, fare, departure_time, arrival_time, duration) 
            VALUES ('$route_from', '$route_to', '$bus_type', '$total_seats', '$available_seats', '$fare', '$departure_time', '$arrival_time', '$duration')";
    mysqli_query($conn, $sql);
}

// Handle deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM buses WHERE id = $id");
}

$buses = mysqli_query($conn, "SELECT * FROM buses");
?>

<head>
    <style>
        body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        }
        .dashboard-header {
        background: linear-gradient(135deg,rgb(237, 239, 241), #0056b3);
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color:rgb(0, 24, 65);
        }

        .logo span {
            color:rgb(238, 118, 32);
        }

        .dashboard-header nav {
        display: flex;
        align-items: center;
        }

        .logout-btn {
        background:rgb(255, 75, 75);
        color: white;
        border: 2px solidrgb(255, 49, 49);
        padding: 8px 15px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s ease;
        border: 2px solid white;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }

        .bus-form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .bus-form input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .bus-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .bus-card {
            width: 300px;
            background-color: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .bus-card img {
            width: 100%;
            border-radius: 10px;
        }

        .bus-info {
            margin-top: 10px;
        }

        .bus-info p {
            font-size: 14px;
            margin: 5px 0;
        }

        .bus-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            color: white;
        }

        .primary-btn {
            background-color: #28a745;
        }

        .edit-btn {
            background-color: #ffc107;
        }

        .delete-btn {
            background-color: #dc3545;
        }

    </style>   
</head>
<body>
    <header class="dashboard-header">
    <div class="logo">Shiv<span>shakti</span> travel</div>
        <nav>
            <a href="logout.php" class="logout-btn">🚪 Logout</a>
        </nav>
    </header>

    <div class="container">
        <h3>Add a New Bus</h3>
        <form action="admin_dashboard.php" method="post" class="bus-form">
            <input type="text" name="route_from" placeholder="Route From" required>
            <input type="text" name="route_to" placeholder="Route To" required>
            <input type="text" name="bus_type" placeholder="Bus Type (Seater/Sleeper)" required>
            <input type="number" name="seats" placeholder="Total Seats" required>
            <input type="number" name="available_seats" placeholder="Available Seats" required>
            <input type="number" name="fare" placeholder="Fare (₹)" required>
            <input type="time" name="departure_time" required>
            <input type="time" name="arrival_time" required>
            <input type="text" name="duration" placeholder="Duration (e.g., 14h)" required>
            <button type="submit" name="add_bus" class="btn primary-btn">Add Bus</button>
        </form>

        <h3>Available Buses</h3>
        <div class="bus-container">
            <?php
            if (mysqli_num_rows($buses) > 0) {
                while ($bus = mysqli_fetch_assoc($buses)) {
                    echo '
                    <div class="bus-card">
                        <img src="images/bus6.jpeg" alt="Bus">
                        <div class="bus-info">
                            <h3>' . $bus['route_from'] . ' → ' . $bus['route_to'] . '</h3>
                            <p class="bus-type">🚌 ' . $bus['bus_type'] . '</p>
                            <p class="time">🕒 ' . $bus['departure_time'] . ' → ' . $bus['arrival_time'] . '</p>
                            <p class="duration">⏳ ' . $bus['duration'] . '</p>
                            <p class="seats">🪑 Total Seats: ' . $bus['seats'] . '</p>
                            <p class="available-seats">✅ Available: ' . $bus['available_seats'] . '</p>
                            <p class="fare">💰 ₹' . $bus['fare'] . '</p>
                        </div>
                        <div class="bus-actions">
                            <a href="edit_bus.php?id=' . $bus['id'] . '" class="btn edit-btn">Edit</a>
                            <a href="?delete=' . $bus['id'] . '" class="btn delete-btn" onclick="return confirm(\'Are you sure?\')">Delete</a>
                        </div>
                    </div>';
                }
            } else {
                echo "<h3 style='text-align:center;'>No buses available.</h3>";
            }
            ?>
        </div>
    </div>
</body>
</html>
