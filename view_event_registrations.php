<?php
include 'db_config.php';

session_start();

// Ensure the user is logged in as admin
if ($_SESSION['role'] != 'admin') {
    echo "You must be logged in as admin to access this page.";
    exit;
}

// Fetch all events to display registrations
$events_query = "SELECT * FROM events";
$events_stmt = $conn->prepare($events_query);
$events_stmt->execute();
$events_result = $events_stmt->get_result();

echo "<h2>Manage Event Registrations</h2>";

while($event = $events_result->fetch_assoc()) {
    $event_id = $event['id'];
    echo "<h3>Event: " . $event['title'] . "</h3>";

    // Fetch registrations for each event
    $registration_query = "SELECT registrations.*, users.name, users.email FROM registrations JOIN users ON registrations.user_id = users.id WHERE registrations.event_id = ?";
    $registration_stmt = $conn->prepare($registration_query);
    $registration_stmt->bind_param("i", $event_id);
    $registration_stmt->execute();
    $registration_result = $registration_stmt->get_result();

    echo "<table border='1'>
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Semester</th>
                    <th>Registration Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>";

    while($registration = $registration_result->fetch_assoc()) {
        echo "<tr>
                <td>" . $registration['name'] . "</td>
                <td>" . $registration['email'] . "</td>
                <td>" . $registration['department'] . "</td>
                <td>" . $registration['semester'] . "</td>
                <td>" . $registration['registration_date'] . "</td>
                <td>" . ($registration['status'] == 'attended' ? 'Attended' : 'Not Attended') . "</td>
                <td>
                    <a href='mark_attended.php?registration_id=" . $registration['id'] . "&event_id=" . $event_id . "'>Mark as Attended</a> | 
                    <a href='delete_registration.php?registration_id=" . $registration['id'] . "&event_id=" . $event_id . "' onclick='return confirm(\"Are you sure you want to delete this registration?\")'>Delete</a>
                </td>
              </tr>";
    }

    echo "</tbody></table>";
}
?>
