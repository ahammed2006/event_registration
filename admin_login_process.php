<?php
session_start();
include 'db_config.php'; // adjust if your DB config file is named differently

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['admin_email'];
    $password = $_POST['admin_password'];

    // Fetch the admin from the database
    $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();

        // Verify password (use password_hash() when storing in DB)
        if (password_verify($password, $admin['password'])) {
            // Store admin info in session
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_email'] = $admin['email'];

            // Redirect to admin dashboard
            header("Location: admin_dashboard.php");
            exit();
        } else {
            header("Location: admin_login.php?error=Invalid password");
            exit();
        }
    } else {
        header("Location: admin_login.php?error=Admin not found");
        exit();
    }
}
?>
