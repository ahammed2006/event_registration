<!-- Save this as register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up - Event Registration</title>
    <style>
        * {
            margin: 0; padding: 0; box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #e19191 0%, #967bbd 50%, #5170b5 100%);
        }

        .signup-container {
            width: 350px;
            background-color: rgba(255, 255, 255, 0.85);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            text-align: center;
            position: relative;
        }

        .signup-container::after {
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

        h2 {
            margin-bottom: 20px;
            color: #0c2c52;
        }

        .input-group {
            margin-bottom: 16px;
            text-align: left;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            border: none;
            background-color: #0c2c52;
            color: white;
            border-radius: 5px;
        }

        .input-field::placeholder {
            color: #a8b2c0;
        }

        .signup-btn {
            width: 100%;
            padding: 12px;
            background-color: #ff8c00;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
        }

        .login-link {
            margin-top: 15px;
            color: #0c2c52;
            font-size: 14px;
            text-decoration: none;
            display: block;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        .error {
            color: #ff4d4d;
            margin: 10px 0;
            text-align: left;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>Create Account</h2>

        <?php
            if (isset($_GET['error'])) {
                echo '<div class="error">' . htmlspecialchars($_GET['error']) . '</div>';
            }
        ?>

        <form action="register_process.php" method="POST">
            <div class="input-group">
                <input type="email" name="email" class="input-field" placeholder="Email ID" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" class="input-field" placeholder="Password" required>
            </div>
            <button type="submit" class="signup-btn">SIGN UP</button>
        </form>

        <a href="login.php" class="login-link">Already have an account? Login</a>
    </div>
</body>
</html>
