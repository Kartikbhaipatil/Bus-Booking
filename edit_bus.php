<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

include("db_connection.php");
include("header.php");

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: admin_dashboard.php");
    exit();
}

$bus_id = $_GET['id'];
$bus_query = mysqli_query($conn, "SELECT * FROM buses WHERE id = $bus_id");
$bus = mysqli_fetch_assoc($bus_query);

if (isset($_POST['update_bus'])) {
    $route_from = $_POST['route_from'];
    $route_to = $_POST['route_to'];
    $bus_type = $_POST['bus_type'];
    $total_seats = $_POST['seats'];
    $available_seats = $_POST['available_seats'];
    $fare = $_POST['fare'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $duration = $_POST['duration'];

    $update_query = "UPDATE buses SET 
        route_from='$route_from', 
        route_to='$route_to', 
        bus_type='$bus_type',
        seats='$total_seats',
        available_seats='$available_seats',
        fare='$fare', 
        departure_time='$departure_time', 
        arrival_time='$arrival_time',
        duration='$duration' 
        WHERE id=$bus_id";

    if (mysqli_query($conn, $update_query)) {
        header("Location: admin_dashboard.php?update=success");
    } else {
        echo "Error updating bus: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bus - Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        *{
            margin:0px;
            padding: 0px;
        }
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.4);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-primary {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }
        .back-btn {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }
        .back-btn a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🚌 Edit Bus Details</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">From</label>
                <input type="text" name="route_from" class="form-control" value="<?php echo $bus['route_from']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">To</label>
                <input type="text" name="route_to" class="form-control" value="<?php echo $bus['route_to']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Bus Type</label>
                <input type="text" name="bus_type" class="form-control" value="<?php echo $bus['bus_type']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Total Seats</label>
                <input type="number" name="seats" class="form-control" value="<?php echo $bus['seats']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Available Seats</label>
                <input type="number" name="available_seats" class="form-control" value="<?php echo $bus['available_seats']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Fare (₹)</label>
                <input type="number" name="fare" class="form-control" value="<?php echo $bus['fare']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Departure Time</label>
                <input type="time" name="departure_time" class="form-control" value="<?php echo $bus['departure_time']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Arrival Time</label>
                <input type="time" name="arrival_time" class="form-control" value="<?php echo $bus['arrival_time']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Duration</label>
                <input type="text" name="duration" class="form-control" value="<?php echo $bus['duration']; ?>" required>
            </div>
            <button type="submit" name="update_bus" class="btn btn-primary">Update Bus</button>
        </form>
        <div class="back-btn">
            <a href="admin_dashboard.php">← Back to Dashboard</a>
        </div>
    </div>
</body>
</html>
