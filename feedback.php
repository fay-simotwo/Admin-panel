<?php
session_start();
$pageTitle = "Feedback";
include('includes/header.php');
require('./admin/config/dbconfig.php');

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI']; // Store the current URL
    header("Location: login.php");
    exit();
}
// Handle feedback submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['id'];
    $message = htmlspecialchars(trim($_POST['message']));
    $rating = intval($_POST['rating']);

    if (!empty($message) && $rating >= 1 && $rating <= 5) {
        $query = "INSERT INTO feedback (user_id, message, rating) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param('isi', $userId, $message, $rating);
            if ($stmt->execute()) {
                $_SESSION['success'] = "Thank you for your feedback!";
            } else {
                $_SESSION['error'] = "Failed to submit feedback. Please try again.";
            }
            $stmt->close();
        } else {
            $_SESSION['error'] = "Failed to prepare query. Please try again.";
        }
    } else {
        $_SESSION['error'] = "Please provide a valid message and rating.";
    }

    // Redirect to the same page to show success or error messages
    header("Location: feedback.php");
    exit();
}
?>

<div class="container py-5">
    <h2 class="text-center mb-4" style="color: #ec0e3e;">We Value Your Feedback</h2>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger text-center"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php elseif (isset($_SESSION['success'])): ?>
        <div class="alert alert-success text-center"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <form action="" method="POST" class="text-center">
        <div class="mb-3">
            <textarea name="message" class="form-control w-50 mx-auto" rows="4" placeholder="Your feedback..." required></textarea>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rate Us:</label>
            <select name="rating" class="form-select w-25 mx-auto" required>
                <option value="5">5 - Excellent</option>
                <option value="4">4 - Good</option>
                <option value="3">3 - Average</option>
                <option value="2">2 - Poor</option>
                <option value="1">1 - Very Poor</option>
            </select>
        </div>
        <button type="submit" class="btn btn-outline-light" style="border-radius: 30px;">Submit Feedback</button>
    </form>
</div>

<?php include('includes/footer.php'); ?>
