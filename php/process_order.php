<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Process the order
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_model = $_POST['car_model'];
    $quantity = $_POST['quantity'];

    // Save the order to the database (you can add more fields like delivery address, etc.)
    include('db.php'); // Make sure to include the database connection

    $user_id = $_SESSION['user_id']; // Get the logged-in user ID
    $order_date = date('Y-m-d H:i:s'); // Get the current date and time

    $sql = "INSERT INTO orders (user_id, car_model, quantity, order_date) 
            VALUES ('$user_id', '$car_model', '$quantity', '$order_date')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
