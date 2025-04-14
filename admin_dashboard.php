<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #e19191, #967bbd, #5170b5);
            color: #fff;
            min-height: 100vh;
            padding: 20px;
        }

        .dashboard {
            max-width: 1200px;
            margin: auto;
            background: rgba(0, 0, 0, 0.3);
            padding: 30px;
            border-radius: 12px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .section {
            margin-bottom: 30px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .section h2 {
            margin-bottom: 10px;
            font-size: 22px;
            color: #fff;
        }

        .btn {
            padding: 10px 15px;
            background-color: #0c2c52;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #081a34;
        }

        .logout {
            text-align: right;
            margin-top: -20px;
        }

        .logout a {
            color: #fff;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="logout">
            <a href="admin_logout.php">Logout</a>
        </div>
        <h1>Welcome, Admin!</h1>

        <div class="section" id="event-management">
            <h2>Event Management</h2>
            <button class="btn" onclick="location.href='add_event.php'">Add New Event</button>
            <button class="btn" onclick="location.href='view_events.php'">View/Edit/Delete Events</button>
        </div>

        <div class="section" id="registrations">
            <h2>Event Registrations</h2>
            <button class="btn" onclick="location.href='view_registrations.php'">View All Registrations</button>
        </div>
    </div>
</body>
</html>
