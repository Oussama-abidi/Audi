<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_model = $_POST['car_model'];
    $quantity = $_POST['quantity'];

    include('db.php');

    $user_id = $_SESSION['user_id']; 
    $order_date = date('Y-m-d H:i:s'); 

    $sql = "INSERT INTO orders (user_id, car_model, quantity, order_date) 
            VALUES ('$user_id', '$car_model', '$quantity', '$order_date')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
