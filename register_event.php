<?php
session_start();
include 'db_config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_id = $_POST['event_id'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $semester = $_POST['semester'];
    $user_id = $_SESSION['user_id'];
    $upi_id = $_POST['upi_id'];

    // Prevent duplicate registrations
    $check = $conn->prepare("SELECT * FROM registrations WHERE user_id = ? AND event_id = ?");
    $check->bind_param("ii", $user_id, $event_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "You’ve already registered for this event!";
    } else {
        // Insert registration into the database
        $stmt = $conn->prepare("INSERT INTO registrations (user_id, event_id, name, department, semester, payment_status, upi_id) VALUES (?, ?, ?, ?, ?, 'pending', ?)");
        $stmt->bind_param("iissss", $user_id, $event_id, $name, $department, $semester, $upi_id);
        
        if ($stmt->execute()) {
            echo "Registration successful! <br>";
            echo "Payment notification sent to your UPI ID: {$upi_id}. <br>";
            echo "You will receive a push notification on your UPI app.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>
