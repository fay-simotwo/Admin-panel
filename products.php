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
$pageTitle = "Shop Tech Products";
include('includes/header.php');
?>

<div class="container py-5">
    <h2 class="text-center fw-bold" style="color: #ec0e3e;">Shop Tech Products</h2>
    <p class="text-muted text-center mb-4">Explore our wide range of products available for purchase.</p>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card text-center">
                <img src="assets/images/laptop-icon.jpg" alt="Laptop" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Laptops</h5>
                    <p class="text-muted">High-performance laptops for every need.</p>
                    <a href="laptops.php" class="btn btn-outline-light " style="border-radius: 30px;">Browse Laptops</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <img src="assets/images/phone-icon.jpg" alt="Phone" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Phones</h5>
                    <p class="text-muted">Latest smartphones at unbeatable prices.</p>
                    <a href="phones.php" class="btn btn-outline-light " style="border-radius: 30px;">Shop Phones</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <img src="assets/images/tablet-icon.jpg" alt="Tablet" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Tablets</h5>
                    <p class="text-muted">Versatile tablets suitable for work and play.</p>
                    <a href="tablets.php" class="btn btn-outline-light " style="border-radius: 30px;">View Tablets</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
