<?php
include 'db_config.php';

$query = "SELECT r.id, u.name, u.email, r.upi_id, e.title AS event_name
          FROM registrations r
          JOIN users u ON r.user_id = u.id
          JOIN events e ON r.event_id = e.id
          ORDER BY r.id DESC";

$result = $conn->query($query);
?>

<h2>All Registrations</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>User Name</th>
        <th>Email</th>
        <th>UPI ID</th>
        <th>Event Name</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['upi_id'] ?></td>
            <td><?= $row['event_name'] ?></td>
        </tr>
    <?php } ?>
</table>

<br><a href="admin_dashboard.php">Back to Dashboard</a>
