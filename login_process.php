<?php
session_start();
include 'db_config.php';


$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['name'] = $user['name'];
    header("Location: events.php"); // ✅ Redirect to main page
    exit();
} else {
    header("Location: login.php?error=Invalid email or password");
    exit();
}
