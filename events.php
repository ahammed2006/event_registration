<?php
session_start();
include 'db_config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch events from the database
$query = "SELECT * FROM events";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Events - Event Registration</title>
    <style>
        body {
            background: linear-gradient(135deg, #e19191 0%, #967bbd 50%, #5170b5 100%);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .events-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .event-card {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 280px;
            margin-bottom: 30px;
            text-align: center;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .event-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .event-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
        }

        .event-card h3 {
            font-size: 22px;
            margin: 15px 0;
            color: #333;
        }

        .event-card p {
            font-size: 16px;
            color: #666;
        }

        .event-card .btn {
            background-color: #0c2c52;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .event-card .btn:hover {
            background-color: #45a049;
        }

        .header {
            background-color: #0c2c52;
            padding: 15px;
            color: white;
            text-align: center;
            font-size: 24px;
        }

        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #ff4d4d;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #d43f3f;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Upcoming Events</h1>
    </div>

    <button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>

    <div class="events-container">
        <?php
        while ($event = mysqli_fetch_assoc($result)) {
            // Check if event data is available
            if (isset($event['event_image'], $event['event_name'], $event['event_description'])) {
                echo '
                    <div class="event-card">
                        <img src="images/' . htmlspecialchars($event['event_image']) . '" alt="Event Image">
                        <h3>' . htmlspecialchars($event['event_name']) . '</h3>
                        <p>' . htmlspecialchars($event['event_description']) . '</p>
                        <a href="event_details.php?id=' . $event['id'] . '" class="btn">View Details</a>
                    </div>
                ';
            }
        }
        ?>
    </div>

</body>
</html>
