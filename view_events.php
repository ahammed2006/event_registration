<?php
// Include the database configuration file
include 'db_config.php';

// SQL query to fetch all events from the database
$sql = "SELECT id, title, date, time, venue, description, coordinator FROM events";
$result = $conn->query($sql); // Use the connection object to execute the query

// Check if there are any events in the result
if ($result->num_rows > 0) {
    // Display events in a table
    echo "<table>";
    echo "<tr><th>Event ID</th><th>Event Name</th><th>Date</th><th>Time</th><th>Venue</th><th>Description</th><th>Coordinator</th><th>Actions</th></tr>";

    // Loop through each event and display its details
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";            // Event ID
        echo "<td>" . $row['title'] . "</td>";         // Event Title
        echo "<td>" . $row['date'] . "</td>";          // Event Date
        echo "<td>" . $row['time'] . "</td>";          // Event Time
        echo "<td>" . $row['venue'] . "</td>";         // Event Venue
        echo "<td>" . $row['description'] . "</td>";   // Event Description
        echo "<td>" . $row['coordinator'] . "</td>";   // Event Coordinator
        echo "<td><a href='edit_event.php?id=" . $row['id'] . "'>Edit</a> | 
              <a href='delete_event.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    // If no events found, display a message
    echo "No events found.";
}
?>
