<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password for security

    // Check if the email or username already exists
    $sql = "SELECT * FROM user WHERE email = '$email' OR username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<script>alert('User with this email or username already exists.');</script>";
        echo "<script>window.location.href = '../html/signup.html';</script>";
    } else {
        // Insert the new user into the database
        $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('New record created successfully.!');</script>";
            echo "<script>window.location.href = '../html/Home.html';</script>";
        } else {
            echo "<script>alert('Error:');</script>";
            echo "<script>window.location.href = '../html/signup.html';</script>";
        }
    }
}
$conn->close();
