<?php
$servername = "localhost";
$username = "root";  // default username for XAMPP
$password = "";  // default password for XAMPP is empty
$dbname = "audi_project";  // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
