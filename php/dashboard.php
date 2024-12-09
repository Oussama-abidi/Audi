<?php
session_start(); 
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "Welcome to your Dashboard, " . $_SESSION['username'] . "!<br>";
echo "Your user ID is: " . $_SESSION['user_id'] . "<br>";
?>

<a href="order_car.php">Order Your Audi</a>
