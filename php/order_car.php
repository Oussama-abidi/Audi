<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "Order your Audi now, " . $_SESSION['username'] . "!<br>";
?>

<form action="process_order.php" method="POST">
    <label for="car_model">Select Car Model:</label>
    <select name="car_model" id="car_model">
        <option value="audi_r8">Audi R8</option>
        <option value="audi_rs6">Audi RS6</option>
    </select>
    
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" min="1" value="1" required>
    
    <button type="submit">Place Order</button>
</form>
