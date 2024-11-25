<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}

// Handle the POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require('./admin/config/dbconfig.php'); 

    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $userId = $_SESSION['id']; // Assuming 'id' is the logged-in user's ID
    $deviceType = htmlspecialchars($_POST['deviceType']);
    $issueDescription = htmlspecialchars($_POST['issueDescription']);
    $preferredDate = $_POST['preferredDate'];

    // Validate inputs
    if (empty($deviceType) || empty($issueDescription) || empty($preferredDate)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: booking.php");
        exit();
    }

    // Generate a unique tracking ID
    $trackingId = 'TRK' . uniqid();

    // Start a transaction to ensure data consistency
    $conn->begin_transaction();

    try {
        // Insert booking into the bookings table
        $query = "INSERT INTO bookings (name, email, device_type, issue_description, preferred_date, tracking_id, status) 
                  VALUES (?, ?, ?, ?, ?, ?, 'Pending')";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssss", $name, $email, $deviceType, $issueDescription, $preferredDate, $trackingId);
        $stmt->execute();

        // Insert tracking data into repair_tracking table
        $repairQuery = "INSERT INTO repair_tracking (tracking_id, user_id, device_type, issue_description, status) 
                        VALUES (?, ?, ?, ?, 'Received')";
        $stmt2 = $conn->prepare($repairQuery);
        $stmt2->bind_param("siss", $trackingId, $userId, $deviceType, $issueDescription);
        $stmt2->execute();

        // Commit the transaction
        $conn->commit();

        // Notify the admin
        $adminEmail = "chepfaith18@gmail.com"; 
        $subject = "New Repair Booking Submitted";
        $message = "
        A new repair booking has been submitted:

        Name: $name
        Email: $email
        Device Type: $deviceType
        Issue Description: $issueDescription
        Preferred Date: $preferredDate
        Tracking ID: $trackingId
        ";
        $headers = "From: no-reply@nelsrepairs.com";

        if (mail($adminEmail, $subject, $message, $headers)) {
            $_SESSION['success'] = "Booking submitted successfully! Your Tracking ID is $trackingId.";
        } else {
            $_SESSION['success'] = "Booking submitted successfully, but the admin notification failed. Your Tracking ID is $trackingId.";
        }

        // Redirect to confirmation page
        $_SESSION['tracking_id'] = $trackingId;
        header("Location: confirmation.php");
        exit();

    } catch (Exception $e) {
        // Rollback transaction on failure
        $conn->rollback();
        error_log("Error during booking process: " . $e->getMessage());
        $_SESSION['error'] = "An error occurred. Please try again.";
        header("Location: booking.php");
        exit();
    }
}
