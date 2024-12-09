<?php
session_start(); // Start the session to access session variables

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// If the user is logged in, display a welcome message
echo "Welcome to your Dashboard, " . $_SESSION['username'] . "!<br>";
echo "Your user ID is: " . $_SESSION['user_id'] . "<br>";

// You can add more features here, like an option to order the car or view order history
?>

<!-- Example: Order a Car Button -->
<a href="order_car.php">Order Your Audi</a>
