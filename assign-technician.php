<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require('./admin/config/dbconfig.php');

    $bookingId = $_POST['booking_id'];
    $technician = $_POST['technician'];

    // Update the booking record to assign a technician
    $query = "UPDATE bookings SET assigned_to = ?, status = 'Assigned' WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $technician, $bookingId);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Technician assigned successfully.";
    } else {
        $_SESSION['error'] = "Failed to assign technician. Please try again.";
    }

    header("Location: admin-dashboard.php");
    exit();
}
