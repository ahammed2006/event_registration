<?php
include 'db_config.php';

session_start();

// Ensure the user is logged in as admin
if ($_SESSION['role'] != 'admin') {
    echo "You must be logged in as admin to access this page.";
    exit;
}

$registration_id = $_GET['registration_id'];
$event_id = $_GET['event_id'];

// Delete registration
$delete_query = "DELETE FROM registrations WHERE id = ?";
$delete_stmt = $conn->prepare($delete_query);
$delete_stmt->bind_param("i", $registration_id);

if ($delete_stmt->execute()) {
    echo "Registration deleted successfully!";
    header("Location: view_event_registrations.php");  // Redirect back to event registrations page
} else {
    echo "Error: " . $delete_stmt->error;
}
?>
