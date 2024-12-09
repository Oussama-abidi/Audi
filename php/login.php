<?php
session_start();
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
    $sql->bind_param("ss", $user, $pass);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $user;
        header("Location: dashboard.php"); 
        exit();
    } else {
        echo "<script>alert('Invalid Username or Password!');</script>";
        echo "<script>window.location.href = 'account.html';</script>";
    }
}
$conn->close();
?>
