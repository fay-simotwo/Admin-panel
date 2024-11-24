<?php
$pageTitle = "Home";
include('includes/header.php');

?>

<div class="container-fluid py-5" style="background-color: #f9f9f9;">
    <div class="container">
        <!-- About Section -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="fw-bold" style="color: #ec0e3e;">Who We Are</h1>
                <p class="text-muted">
                    At <strong>Nels Repairs</strong>, we are passionate about providing reliable, affordable, and high-quality tech repair services and products. 
                    Our expert team is committed to ensuring your devices work flawlessly, and your tech needs are met with excellence.
                </p>
                <a href="services.php" class="btn btn-outline-light btn-lg mt-3" style="border-radius: 30px;">
                    Explore Our Services
                </a>
            </div>
            <div class="col-md-6 text-center">
                <img src="assets/images/lap.png" alt="About Us" class="img-fluid rounded" style="max-height: 400px;">
            </div>
        </div>
    </div>
</div>

<!-- Mission, Vision, and Values Section -->
<div class="container py-5">
    <div class="row text-center">
        <!-- Mission -->
        <div class="col-md-4">
            <div class="p-4 shadow-sm rounded" style="background-color: #fff;">
                <i class="bi bi-flag-fill" style="font-size: 3rem; color: #ec0e3e;"></i>
                <h4 class="mt-3">Our Mission</h4>
                <p class="text-muted">
                    To provide outstanding repair services and high-quality tech products that enhance our customers' lives.
                </p>
            </div>
        </div>
        <!-- Vision -->
        <div class="col-md-4">
            <div class="p-4 shadow-sm rounded" style="background-color: #fff;">
                <i class="bi bi-eye-fill" style="font-size: 3rem; color: #ec0e3e;"></i>
                <h4 class="mt-3">Our Vision</h4>
                <p class="text-muted">
                    To be the leading tech repair and product provider, known for exceptional service and innovative solutions.
                </p>
            </div>
        </div>
        <!-- Values -->
        <div class="col-md-4">
            <div class="p-4 shadow-sm rounded" style="background-color: #fff;">
                <i class="bi bi-heart-fill" style="font-size: 3rem; color: #ec0e3e;"></i>
                <h4 class="mt-3">Our Values</h4>
                <p class="text-muted">
                    Integrity, quality, innovation, and customer satisfaction are the pillars of our business.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Why Choose Us Section -->
<div class="container py-5">
    <h2 class="text-center fw-bold" style="color: #ec0e3e;">Why Choose Us?</h2>
    <div class="row g-4 mt-4">
        <!-- Quality Service -->
        <div class="col-md-4 text-center">
            <i class="bi bi-award-fill" style="font-size: 3rem; color: #ec0e3e;"></i>
            <h5 class="mt-3">Quality Service</h5>
            <p class="text-muted">We deliver exceptional results that exceed your expectations.</p>
        </div>
        <!-- Affordable Pricing -->
        <div class="col-md-4 text-center">
            <i class="bi bi-cash-coin" style="font-size: 3rem; color: #ec0e3e;"></i>
            <h5 class="mt-3">Affordable Pricing</h5>
            <p class="text-muted">Our pricing is competitive and transparent with no hidden costs.</p>
        </div>
        <!-- Customer Support -->
        <div class="col-md-4 text-center">
            <i class="bi bi-telephone-fill" style="font-size: 3rem; color: #ec0e3e;"></i>
            <h5 class="mt-3">24/7 Support</h5>
            <p class="text-muted">We’re here to assist you anytime, anywhere.</p>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>