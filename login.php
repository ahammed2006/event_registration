<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Event Registration</title>
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
        
        .login-container {
            width: 320px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
        }
        
        .login-container::after {
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
            width: 65px;
            height: 65px;
            background-color: #0c2c52;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px;
        }
        
        .avatar svg {
            width: 30px;
            height: 30px;
            fill: none;
            stroke: white;
            stroke-width: 2;
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
            padding-left: 40px;
            padding-right: 40px;
        }
        
        .input-field::placeholder {
            color: #a8b2c0;
        }
        
        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
        }
        
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            background: none;
            border: none;
            cursor: pointer;
        }
        
        .password-toggle svg {
            width: 20px;
            height: 20px;
            fill: none;
            stroke: white;
            stroke-width: 2;
        }
        
        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            justify-content: flex-start;
        }
        
        .checkbox-container input {
            margin-right: 6px;
        }
        
        .checkbox-label {
            color: #666;
            font-size: 14px;
        }
        
        .login-btn {
            width: 100%;
            padding: 12px;
            background-color: transparent;
            color: #0c2c52;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            letter-spacing: 1px;
            margin-top: 10px;
        }
        
        .signup-link {
            margin-top: 20px;
            color: #0c2c52;
            font-size: 14px;
            text-decoration: none;
            display: block;
        }
        
        .signup-link:hover {
            text-decoration: underline;
        }
        
        .input-wrapper {
            position: relative;
        }
        
        .error {
            color: #ff4d4d;
            margin: 10px 0;
            text-align: left;
            font-size: 14px;
        }

        .admin-login-btn {
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
    </style>
</head>
<body>
    <div class="login-container">
        <div class="avatar">
            <svg viewBox="0 0 24 24">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path>
            </svg>
        </div>
        
        <?php
            if (isset($_GET['error'])) {
                echo '<div class="error">'.htmlspecialchars($_GET['error']).'</div>';
            }
        ?>
        
        <form action="login_process.php" method="POST">
            <div class="input-group">
                <div class="input-wrapper">
                    <input type="email" name="email" class="input-field" placeholder="Email ID" required>
                    <div class="input-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="input-group">
                <div class="input-wrapper">
                    <input type="password" name="password" class="input-field" id="password" placeholder="Password" required>
                    <div class="input-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </div>
                    <button type="button" class="password-toggle" id="togglePassword">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" id="eyeIcon">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
            </div>
            
            <div class="checkbox-container">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember" class="checkbox-label">Remember me</label>
            </div>
            
            <button type="submit" class="login-btn">LOGIN</button>
        </form>
        
        <!-- ✅ Fixed Sign Up Link -->
        <a href="signup.php" class="signup-link">Don't have account? Sign Up</a>

        <!-- Admin login button -->
        <form action="admin_login.php" method="GET">
            <button type="submit" class="admin-login-btn">Admin Login</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            
            togglePassword.addEventListener('click', function() {
                if (password.type === 'password') {
                    password.type = 'text';
                    eyeIcon.innerHTML = ` 
                        <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                        <line x1="1" y1="1" x2="23" y2="23"></line>
                    `;
                } else {
                    password.type = 'password';
                    eyeIcon.innerHTML = `
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    `;
                }
            });
        });
    </script>
</body>
</html>
