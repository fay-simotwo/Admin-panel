<?php
session_start();
require_once('./admin/config/dbconfig.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['loginBtn'])) {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // Store user details in session
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            $redirectPage = $_SESSION['redirect_to'] ?? 'index.php';
            unset($_SESSION['redirect_to']); 
            header("Location: $redirectPage");
            exit();
        } else {
            $_SESSION['login_error'] = "Invalid password.";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "No account found with that email.";
        header("Location: login.php");
        exit();
    }
}
?>
