<?php
session_start();
require_once('../php-admin-panel/admin/config/dbconfig.php'); 
require_once('../php-admin-panel/admin/config/function.php');

if (isset($_POST['loginBtn'])) {
    $email = validate($_POST['email']); // Sanitize the email input
    $password = validate($_POST['password']); // Sanitize the password input

    // Query to find user by email
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Check if user exists and verify password
    if ($user && password_verify($password, $user['password'])) {
        // Store user information in the session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['role'];

        // Redirect based on user role
        if ($user['role'] == 'admin') {
            header("Location: admin/index.php"); 
        } else {
            header("Location: index.php"); 
        }
        exit();
    } else {
        // If login fails, redirect back to login with an error message
        $_SESSION['login_error'] = "Invalid email or password";
        header("Location: login.php");
        exit();
    }
}
?>
