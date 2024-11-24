<?php
session_start();
$pageTitle = "Track Your Repair";
include('includes/header.php');
require('./admin/config/dbconfig.php');

// Initialize variables
$trackingData = null;
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trackingId = $_POST['tracking_id'];
    $userId = $_SESSION['user_id']; 

    // Fetch repair details from the database and verify ownership
    $query = "SELECT * FROM bookings WHERE tracking_id = ? AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('si', $trackingId, $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $trackingData = $result->fetch_assoc();
    } else {
        $errorMessage = "Invalid Tracking ID or it does not belong to your account. Please try again.";
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
        <input type="text" name="tracking_id" class="form-control w-50 mx-auto" placeholder="Enter Tracking ID after booking your repair" required>
        <button type="submit" class="btn btn-outline-light mt-3">Track</button>
    </form>

    <!-- Display tracking details if found -->
    <?php if ($trackingData): ?>
        <div class="card mx-auto w-50">
            <div class="card-body">
                <h5 class="card-title">Tracking ID: <?= htmlspecialchars($trackingData['tracking_id']); ?></h5>
                <p><strong>Name:</strong> <?= htmlspecialchars($trackingData['name']); ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($trackingData['email']); ?></p>
                <p><strong>Device Type:</strong> <?= htmlspecialchars($trackingData['device_type']); ?></p>
                <p><strong>Issue Description:</strong> <?= htmlspecialchars($trackingData['issue_description']); ?></p>
                <p><strong>Status:</strong> <?= htmlspecialchars($trackingData['status']); ?></p>
                <p><strong>Preferred Date:</strong> <?= htmlspecialchars($trackingData['preferred_date']); ?></p>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include('includes/footer.php'); ?>
