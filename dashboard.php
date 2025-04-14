<?php 
session_start();  

if (!isset($_SESSION['user_id'])) {     
    header("Location: login.php");     
    exit(); 
} 
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Event Registration</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #e19191 0%, #967bbd 50%, #5170b5 100%);
        }
        
        .dashboard-container {
            width: 400px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
        }
        
        .dashboard-container::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 8px;
            left: 0;
            background-color: rgba(255, 255, 255, 0.4);
            border-radius: 12px;
            z-index: -1;
        }
        
        .avatar {
            width: 80px;
            height: 80px;
            background-color: #0c2c52;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px;
        }
        
        .avatar svg {
            width: 40px;
            height: 40px;
            fill: none;
            stroke: white;
            stroke-width: 2;
        }
        
        h2 {
            color: #0c2c52;
            margin-bottom: 15px;
        }
        
        .welcome-message {
            color: #444;
            margin-bottom: 30px;
            font-size: 18px;
        }
        
        .emoji {
            font-size: 24px;
            margin-left: 5px;
        }
        
        .logout-btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: #0c2c52;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
            transition: background-color 0.3s;
        }
        
        .logout-btn:hover {
            background-color: #0a2442;
        }
        
        .dashboard-info {
            margin: 30px 0;
            text-align: left;
            padding: 15px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 8px;
        }
        
        .dashboard-info p {
            margin-bottom: 10px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="avatar">
            <svg viewBox="0 0 24 24">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path>
            </svg>
        </div>
        
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
        
        <p class="welcome-message">
            You are logged in successfully <span class="emoji">🎉</span>
        </p>
        
        <div class="dashboard-info">
            <p><strong>Account Details:</strong></p>
            <p>Username: <?php echo htmlspecialchars($_SESSION['user_name']); ?></p>
            <p>Email: <?php echo isset($_SESSION['user_email']) ? htmlspecialchars($_SESSION['user_email']) : 'Not available'; ?></p>
            <p>Last Login: <?php echo date('F j, Y, g:i a'); ?></p>
        </div>
        
        <a href="logout.php" class="logout-btn">LOGOUT</a>
    </div>
</body>
</html>