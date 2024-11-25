<?php
session_start();

// Redirect admins to the admin dashboard
if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
    header("Location: ./admin/index.php");
    exit();
}

// Redirect non-logged-in users to login page
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
$pageTitle = "Track Your Repair";
include('includes/header.php');
require('./admin/config/dbconfig.php');

// Initialize variables
$trackingData = null;
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trackingId = trim($_POST['tracking_id']);

    // If the user is logged in, verify ownership with user_id
    if (isset($_SESSION['id'])) {
        $userId = $_SESSION['id']; // User's ID from session
        $query = "SELECT * FROM repair_tracking WHERE tracking_id = ? AND user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('si', $trackingId, $userId);
    } else {
        // If the user is not logged in, only validate the tracking ID
        $query = "SELECT * FROM repair_tracking WHERE tracking_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $trackingId);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $trackingData = $result->fetch_assoc();
    } else {
        $errorMessage = "Invalid Tracking ID. Please try again.";
    }
}
?>

<div class="container py-5">
    <h2 class="text-center mb-4">Track Your Repair</h2>

    <!-- Display error message if exists -->
    <?php if (!empty($errorMessage)): ?>
        <div class="alert alert-danger text-center"><?= htmlspecialchars($errorMessage); ?></div>
    <?php endif; ?>

    <form method="POST" class="text-center mb-5">
        <input type="text" name="tracking_id" class="form-control w-50 mx-auto" placeholder="Enter Tracking ID" required>
        <button type="submit" class="btn btn-outline-light mt-3">Track</button>
    </form>

    <!-- Display tracking details if found -->
    <?php if ($trackingData): ?>
        <div class="card mx-auto w-50">
            <div class="card-body">
                <h5 class="card-title">Tracking ID: <?= htmlspecialchars($trackingData['tracking_id']); ?></h5>
                <p><strong>Device Type:</strong> <?= htmlspecialchars($trackingData['device_type']); ?></p>
                <p><strong>Issue Description:</strong> <?= htmlspecialchars($trackingData['issue_description']); ?></p>
                <p><strong>Status:</strong> <?= htmlspecialchars($trackingData['status']); ?></p>
                <p><strong>Last Updated:</strong> <?= htmlspecialchars($trackingData['last_updated']); ?></p>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include('includes/footer.php'); ?>
