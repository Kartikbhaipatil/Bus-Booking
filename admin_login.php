<?php
session_start();
include("db_connection.php");
include("header.php");

// Clear error message when page is refreshed
if (!isset($_SESSION['error'])) {
    $_SESSION['error'] = "";
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if admin exists in database
    $query = "SELECT * FROM admins WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $admin = mysqli_fetch_assoc($result);

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $admin['username'];

        // Clear any previous error
        $_SESSION['error'] = "";
        
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $_SESSION['error'] = "❌ Invalid username or password!";
        header("Location: admin_login.php"); // Refresh to clear POST data
        exit();
    }
}
?>

<head>
   <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            height: 100vh;
            margin: 0;
            padding:0px;
        }

        .login-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
            position: absolute;
            top: 35%;
            left: 35%;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        .input-group input {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            border: 1px solid black;
        }

        .login-btn {
            width: 50%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        .login-btn:hover {
            background-color: #0056b3;
        }

   </style>
</head>
<body>
    <div class="login-container">
        <h2>🔑 Admin Login</h2>

        <?php if (!empty($_SESSION['error'])) : ?>
            <p class="error-message"><?php echo $_SESSION['error']; ?></p>
            <?php $_SESSION['error'] = ""; // Clear error after displaying ?>
        <?php endif; ?>

        <form action="admin_login.php" method="post">
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" name="login" class="login-btn">Login</button>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_GET['logout']) && $_GET['logout'] == 'success') {
    echo '<div class="logout-message">✅ You have been logged out successfully</div>';
}
?>

<style>
    .logout-message {
        background: #d4edda;
        color: #155724;
        padding: 10px;
        text-align: center;
        border-radius: 5px;
        width: 80%;
        margin: 10px auto;
    }
</style>


