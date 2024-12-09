<?php
// Start the session to track user login status
session_start();
require_once("db.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Prevent SQL injection by using prepared statements
    $sql = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
    $sql->bind_param("ss", $user, $pass);
    $sql->execute();
    $result = $sql->get_result();

    // If user is found, start the session and redirect
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $user;
        header("Location: dashboard.php"); // Redirect to dashboard or wherever you want after login
        exit();
    } else {
        echo "<script>alert('Invalid Username or Password!');</script>";
        echo "<script>window.location.href = 'account.html';</script>";
    }
}
$conn->close();
?>
