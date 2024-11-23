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
    $deviceType = $_POST['deviceType'];
    $issueDescription = $_POST['issueDescription'];
    $preferredDate = $_POST['preferredDate'];

    // Validate inputs
    if (empty($deviceType) || empty($issueDescription) || empty($preferredDate)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: booking.php");
        exit();
    }

    // Generate a unique tracking ID
    $trackingId = 'TRK' . uniqid();

    // Insert booking into the bookings table
    $query = "INSERT INTO bookings (name, email, device_type, issue_description, preferred_date, tracking_id) 
              VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssss", $name, $email, $deviceType, $issueDescription, $preferredDate, $trackingId);

    if ($stmt->execute()) {
        // Send email to admin
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

        Please log in to the admin panel to assign a technician.
        ";
        $headers = "From: no-reply@nelsrepairs.com";

        // Notify the admin
        if (mail($adminEmail, $subject, $message, $headers)) {
            $_SESSION['success'] = "Booking submitted successfully! Your Tracking ID is $trackingId.";
        } else {
            $_SESSION['success'] = "Booking submitted successfully, but the admin notification failed. Your Tracking ID is $trackingId.";
        }

        // Store the tracking ID in the session to display it on the confirmation page
        $_SESSION['tracking_id'] = $trackingId;

        // Redirect to confirmation page
        header("Location: confirmation.php");
        exit();
    } else {
        $_SESSION['error'] = "An error occurred while submitting your booking. Please try again.";
        header("Location: booking.php");
        exit();
    }
} else {
    header("Location: booking.php");
    exit();
}
