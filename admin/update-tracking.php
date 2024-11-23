<?php
session_start();
$pageTitle = "Update Tracking";
include('includes/header.php');
require('./admin/config/dbconfig.php'); 

// Check admin authentication
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// Handle POST request to update tracking status
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trackingId = $_POST['tracking_id'];
    $status = $_POST['status'];

    // Validate inputs
    if (empty($trackingId) || empty($status)) {
        $_SESSION['error'] = "All fields are required.";
    } else {
        // Update booking status
        $query = "UPDATE bookings SET status = ? WHERE tracking_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $status, $trackingId);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Tracking status updated successfully.";
        } else {
            $_SESSION['error'] = "Failed to update the tracking status.";
        }
    }

    header("Location: update-tracking.php");
    exit();
}

// Fetch all bookings for display
$query = "SELECT * FROM bookings ORDER BY preferred_date DESC";
$result = $conn->query($query);
?>

<div class="container py-5">
    <h2 class="text-center mb-4">Update Tracking Status</h2>

    <!-- Display Success or Error Messages -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <!-- Bookings Table -->
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Tracking ID</th>
                <th>Name</th>
                <th>Device Type</th>
                <th>Issue Description</th>
                <th>Status</th>
                <th>Update Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['tracking_id']); ?></td>
                    <td><?= htmlspecialchars($row['name']); ?></td>
                    <td><?= htmlspecialchars($row['device_type']); ?></td>
                    <td><?= htmlspecialchars($row['issue_description']); ?></td>
                    <td><?= htmlspecialchars($row['status']); ?></td>
                    <td>
                        <form method="POST" action="update-tracking.php">
                            <input type="hidden" name="tracking_id" value="<?= htmlspecialchars($row['tracking_id']); ?>">
                            <select name="status" class="form-select" required>
                                <option value="" disabled selected>Change Status</option>
                                <option value="Pending">Pending</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select>
                            <button type="submit" class="btn btn-primary btn-sm mt-2">Update</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include('includes/admin-footer.php'); ?>
