<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $date = $_POST['date'];  // Assuming column name in database is 'date'
    $time = $_POST['time'];
    $venue = trim($_POST['venue']);
    $coordinator = trim($_POST['coordinator']);

    // Check if fields are empty
    if (empty($title) || empty($description) || empty($date) || empty($time) || empty($venue) || empty($coordinator)) {
        $error_message = "All fields are required!";
    } else {
        // Correct column names as per the database
        $stmt = $conn->prepare("INSERT INTO events (title, description, date, time, venue, coordinator) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $title, $description, $date, $time, $venue, $coordinator);

        if ($stmt->execute()) {
            // Redirect to view events page
            header("Location: view_events.php");
            exit();
        } else {
            $error_message = "Error: " . $stmt->error;
        }
    }
}
?>

<h2>Add New Event</h2>

<?php
if (!empty($error_message)) {
    echo "<p style='color: red;'>" . $error_message . "</p>";
}
?>

<form method="POST">
    Title: <input type="text" name="title" required><br><br>
    Description: <textarea name="description" required></textarea><br><br>
    Date: <input type="date" name="date" required><br><br>
    Time: <input type="time" name="time" required><br><br>
    Venue: <input type="text" name="venue" required><br><br>
    Coordinator: <input type="text" name="coordinator" required><br><br>
    <button type="submit">Add Event</button>
</form>
