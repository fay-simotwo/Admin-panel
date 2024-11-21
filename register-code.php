<?php
session_start();
require_once('../php-admin-panel/admin/config/dbconfig.php'); 
require_once('../php-admin-panel/admin/config/function.php');

if (isset($_POST['registerBtn'])) {
    // Get form data and sanitize
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $confirm_password = validate($_POST['confirm_password']);

    // Check if passwords match
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match.";
        header("Location: register.php");
        exit();
    }

    // Check if email already exists
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Email is already registered.";
        header("Location: register.php");
        exit();
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user into the database with default role 'user'
    $insert_query = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'user')";
    $insert_stmt = $conn->prepare($insert_query);
    $insert_stmt->bind_param("sss", $name, $email, $hashed_password);

    if ($insert_stmt->execute()) {
        // Set session variables for automatic login
        $_SESSION['user_id'] = $conn->insert_id; // Get the ID of the newly created user
        $_SESSION['user_name'] = $name;
        $_SESSION['user_role'] = 'user'; // Default role

        // Redirect to homepage
        header("Location: index.php"); // Adjust this to the actual homepage URL
        exit();
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
        header("Location: register.php");
        exit();
    }
}
?>
