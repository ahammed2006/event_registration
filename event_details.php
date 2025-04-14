<?php
session_start();
include 'db_config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get event ID from the URL
$event_id = $_GET['id'] ?? null;

if (!$event_id) {
    echo "Invalid event ID.";
    exit();
}

// Fetch event details from the database
$query = "SELECT * FROM events WHERE id = $event_id";
$result = mysqli_query($conn, $query);

if ($event = mysqli_fetch_assoc($result)) {
    $event_name = $event['event_name'];
    $event_description = $event['event_description'];
    $event_image = $event['event_image'];  // Path stored as 'images/music.jpg'
    $event_fee = $event['registration_fee'];
    $event_date = $event['date'];
    $event_time = $event['time'];
    $event_venue = $event['venue'];
    $event_coordinator = $event['coordinator'];
} else {
    echo "Event not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e19191 0%, #967bbd 50%, #5170b5 100%);
            margin: 0;
            padding: 0;
        }

        .event-container {
            max-width: 800px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .event-container img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        h2 {
            margin-top: 0;
            color: #333;
        }

        p {
            font-size: 16px;
            color: #555;
            margin: 10px 0;
        }

        /* Styling for both buttons */
        .button-container {
            display: flex;
            gap: 20px;  /* Adds space between buttons */
            margin-top: 20px;
        }

        .btn {
            background-color: #0c2c52;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            width: 48%;  /* Ensures both buttons have equal width */
            text-align: center;
            cursor: pointer;
            font-size: 18px; 
        }

        .btn:hover {
            background-color: #45a049;
        }

        form {
            margin-top: 30px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="event-container">
    <h2><?php echo htmlspecialchars($event_name); ?></h2>

    <!-- Display event image from database (images/music.jpg) -->
    <img src="images/<?php echo htmlspecialchars($event_image); ?>" alt="Event Image"
         onerror="this.onerror=null;this.src='images/default.jpg';">

    <p><strong>Description:</strong> <?php echo htmlspecialchars($event_description); ?></p>
    <p><strong>Date:</strong> <?php echo htmlspecialchars($event_date); ?></p>
    <p><strong>Time:</strong> <?php echo htmlspecialchars($event_time); ?></p>
    <p><strong>Venue:</strong> <?php echo htmlspecialchars($event_venue); ?></p>
    <p><strong>Coordinator:</strong> <?php echo htmlspecialchars($event_coordinator); ?></p>
    <p><strong>Registration Fee:</strong> ₹<?php echo number_format($event_fee, 2); ?></p>

    <!-- Registration form -->
    <form method="POST" action="register_event.php">
        <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">

        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="department">Department:</label>
        <input type="text" name="department" required>

        <label for="semester">Semester:</label>
        <input type="text" name="semester" required>

        <label for="upi_id">UPI ID:</label>
        <input type="text" name="upi_id" placeholder="example@upi" required>

        <div class="button-container">
            <!-- Buttons with consistent size and adjacent placement -->
            <button class="btn" type="submit">Register</button>
            <a href="events.php" class="btn">Back to Events</a>
        </div>
    </form>
</div>

</body>
</html>
