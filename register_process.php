<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "event_portal");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecting form data
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $hashed_password);

    if ($stmt->execute()) {
        // Redirect with success message
        header("Location: login.php?success=Your registration is successful. Please login.");
        exit();
    } else {
        // Handle error (optional)
        echo "Error: " . $stmt->error;
    }
}
?>
