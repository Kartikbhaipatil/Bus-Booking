<?php
include("header.php");
if (isset($_GET['logout']) && $_GET['logout'] == 'success') {
    echo '<div class="logout-message">✅ You have been logged out successfully</div>';
    echo '<script>
            setTimeout(function() {
                window.location.href = "admin_login.php";
            }, 2000);
          </script>';
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
        margin-top: 20px;
        font-size: 16px;
    }
</style>
