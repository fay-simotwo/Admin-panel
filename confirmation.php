<?php
session_start();
$pageTitle = "Booking Confirmation";
include('includes/header.php');

if (!isset($_SESSION['tracking_id'])) {
    header("Location: booking.php");
    exit();
}

$trackingId = $_SESSION['tracking_id'];
?>

<div class="container py-5 text-center">
    <h2 class="fw-bold text-success">Booking Successful!</h2>
    <p>Your booking has been submitted successfully!</p>
    <p>Your Tracking ID is:</p>
    <h4 class="text-h4"><?= htmlspecialchars($trackingId); ?></h4>
    <p>Use this ID to <a class="text-h4" href="track-repair.php">track your repair status</a>.</p>
    <a href="index.php" class="btn btn-outline-light mt-3">Return to Home</a>
</div>

<?php include('includes/footer.php'); ?>
