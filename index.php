<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Campus Events...!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #e19191 0%, #967bbd 50%, #5170b5 100%);
            color: #fff;
            text-align: center;
        }

        h1 {
            font-size: 2.2em;
            white-space: nowrap;
            overflow: hidden;
            border-right: 3px solid #fff;
            width: 0;
            animation: typing 3s steps(25, end) forwards, blink 0.75s step-end infinite;
            margin-bottom: 30px;
        }

        @keyframes typing {
            from { width: 0; }
            to { width: 27ch; }
        }

        @keyframes blink {
            0%, 100% { border-color: transparent; }
            50% { border-color: #fff; }
        }

        hr {
            width: 60%;
            border: 0;
            height: 1px;
            background: rgba(255, 255, 255, 0.5);
            margin: 20px 0;
        }

        a.login-btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #0c2c52;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        a.login-btn:hover {
            background-color: #09213d;
        }
    </style>
</head>
<body>
    <h1>Welcome to Campus Events...!</h1>
    <hr>
    <a href="login.php" class="login-btn">Login Here</a>
</body>
</html>
