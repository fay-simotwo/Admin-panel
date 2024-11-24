<?php
session_start();
require('./admin/config/dbconfig.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Insert the message into the database
    $query = "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        $_SESSION['contact_success'] = "Your message has been sent successfully!";
    } else {
        $_SESSION['contact_success'] = "An error occurred while sending your message. Please try again.";
    }

    // Redirect back to the contact page
    header("Location: contact.php");
    exit();
}
?>
