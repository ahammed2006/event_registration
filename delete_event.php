<?php
include 'db_config.php';

if (isset($_GET['id'])) {
    $event_id = $_GET['id'];

    // Prepare and execute delete query
    $stmt = $conn->prepare("DELETE FROM events WHERE id = ?");
    $stmt->bind_param("i", $event_id);

    if ($stmt->execute()) {
        echo "Event deleted successfully!";
    } else {
        echo "Error deleting event: " . $stmt->error;
    }

    // Redirect back to view_events page
    header("Location: view_events.php");
    exit();
} else {
    echo "Invalid request!";
}
?>
