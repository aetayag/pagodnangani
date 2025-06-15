<?php
session_start();
include 'db.conn.php';

// Retrieve correct POST variables
$username = $_POST['username'];
$password = $_POST['password'];

// Sanitize input to prevent SQL injection
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Check credentials
$sql = "SELECT * FROM admin_account WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $_SESSION['user_id'] = $username;
    header("Location: index.php");
    exit();
} else {
    echo "<script>alert('Invalid Username or Password'); window.location.href='login.php';</script>";
}
?>
