<?php
$servername = "localhost"; // Change to your database host if different
$username = "root";        // Your database username
$password = "";            // Your database password
$dbname = "event_db";      // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
