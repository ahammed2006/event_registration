<?php
include 'db_config.php';

// Check if the ID is passed
if (isset($_GET['id'])) {
    $event_id = $_GET['id'];

    // Fetch the event details
    $stmt = $conn->prepare("SELECT * FROM events WHERE id = ?");
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $event = $result->fetch_assoc();
} else {
    echo "Invalid request!";
    exit();
}

// Update the event if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $venue = $_POST['venue'];
    $coordinator = $_POST['coordinator'];

    $update_stmt = $conn->prepare("UPDATE events SET title = ?, description = ?, date = ?, time = ?, venue = ?, coordinator = ? WHERE id = ?");
    $update_stmt->bind_param("ssssssi", $title, $description, $date, $time, $venue, $coordinator, $event_id);

    if ($update_stmt->execute()) {
        echo "Event updated successfully!";
        header("Location: view_events.php");
        exit();
    } else {
        echo "Error: " . $update_stmt->error;
    }
}
?>

<h2>Edit Event</h2>
<form method="POST">
    Title: <input type="text" name="title" value="<?= $event['title'] ?>" required><br><br>
    Description: <textarea name="description" required><?= $event['description'] ?></textarea><br><br>
    Date: <input type="date" name="date" value="<?= $event['date'] ?>" required><br><br>
    Time: <input type="time" name="time" value="<?= $event['time'] ?>" required><br><br>
    Venue: <input type="text" name="venue" value="<?= $event['venue'] ?>" required><br><br>
    Coordinator: <input type="text" name="coordinator" value="<?= $event['coordinator'] ?>" required><br><br>
    <button type="submit">Update Event</button>
</form>
