<?php
$pageTitle = "Services";
include('includes/header.php');
?>

<div class="container py-5">
    <!-- Page Header -->
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #ec0e3e;">Our Services</h2>
        <p class="text-muted">Explore our wide range of services and products to meet your tech needs.</p>
    </div>

    <!-- Services Section -->
    <div class="row g-4">
        <!-- Repairs Section -->
        <div class="col-md-4">
            <div class="card h-100 service-card text-center">
                <div class="card-body">
                    <i class="bi bi-tools" style="font-size: 3rem; color: #ec0e3e;"></i>
                    <h5 class="mt-3 fw-bold">Device Repairs</h5>
                    <p class="text-muted">We provide professional repair services for phones, laptops, tablets, and more.</p>
                    <a href="repair-services.php" class="btn btn-outline-light" style="border-radius: 30px;">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Products Section -->
        <div class="col-md-4">
            <div class="card h-100 service-card text-center">
                <div class="card-body">
                    <i class="bi bi-shop" style="font-size: 3rem; color: #ec0e3e;"></i>
                    <h5 class="mt-3 fw-bold">Shop Tech Products</h5>
                    <p class="text-muted">Browse our collection of high-quality laptops, phones, and tablets at great prices.</p>
                    <a href="products.php" class="btn btn-outline-light" style="border-radius: 30px;">Shop Now</a>
                </div>
            </div>
        </div>

        <!-- Support Section -->
        <div class="col-md-4">
            <div class="card h-100 service-card text-center">
                <div class="card-body">
                    <i class="bi bi-headset" style="font-size: 3rem; color: #ec0e3e;"></i>
                    <h5 class="mt-3 fw-bold">Customer Support</h5>
                    <p class="text-muted">Reach out to our support team for any queries or assistance with our services.</p>
                    <a href="contact.php" class="btn btn-outline-light" style="border-radius: 30px;">Contact Us</a>
                </div>
            </div>
        </div>

    
    </div>
</div>

<?php include('includes/footer.php'); ?>
