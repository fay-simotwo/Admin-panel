<?php
session_start();
$pageTitle = "Order Confirmation";
include('includes/header.php');
?>

<div class="container py-5 text-center">
    <h2 class="fw-bold" style="color: #ec0e3e;">Order Confirmed</h2>
    <p class="text-muted">Thank you for your order! We will contact you shortly to arrange delivery.</p>
    <a href="index.php" class="btn btn-outline-light mt-3" style="border-radius: 30px;">Back to Home</a>
</div>

<?php include('includes/footer.php'); ?>
