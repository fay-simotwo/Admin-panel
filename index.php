<?php
$pageTitle = "Home";
include('includes/header.php');
?>

<div class="container mt-4">
    <!-- Carousel -->
    <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000" data-bs-touch="true">
        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./assets/images/phone.png" class="d-block w-100" alt="Slide 1" style="height: 400px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="./assets/images/tablet.png" class="d-block w-100" alt="Slide 2" style="height: 400px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="./assets/images/secure.png" class="d-block w-100" alt="Slide 3" style="height: 400px; object-fit: cover;">
            </div>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Repair Services Section -->
    <div class="my-5">
        <h2 class="text-center mb-4">Our Repair Services</h2>
        <div class="row g-4">
            <!-- Service 1 -->
            <div class="col-md-4">
                <div class="card service-card h-100 text-center">
                    <div class="card-body">
                        <!-- Icon for Phone Repair -->
                        <i class="bi bi-phone" style="font-size: 3rem; color: #ec0e3e;"></i>
                        <h5 class="card-title mt-3">Phone Repair</h5>
                        <p class="card-text">We provide expert phone repair services to ensure your device is as good as new.</p>
                    </div>
                </div>
            </div>
            <!-- Service 2 -->
            <div class="col-md-4">
                <div class="card service-card h-100 text-center">
                    <div class="card-body">
                        <!-- Icon for Laptop Repair -->
                        <i class="bi bi-laptop" style="font-size: 3rem; color: #ec0e3e;"></i>
                        <h5 class="card-title mt-3">Laptop Repair</h5>
                        <p class="card-text">Our team is skilled at resolving hardware and software issues for laptops.</p>
                    </div>
                </div>
            </div>
            <!-- Service 3 -->
            <div class="col-md-4">
                <div class="card service-card h-100 text-center">
                    <div class="card-body">
                        <!-- Icon for Tablet Repair -->
                        <i class="bi bi-tablet" style="font-size: 3rem; color: #ec0e3e;"></i>
                        <h5 class="card-title mt-3">Tablet Repair</h5>
                        <p class="card-text">We offer comprehensive repair services for tablets of all brands.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="container py-5">
    <!-- Book a Phone Repair Section -->
    <div class="row align-items-center mb-5">
        <!-- Illustration Section -->
        <div class="col-md-6 text-center">
            <img src="assets/images/phone-repair.png" alt="Repair Illustration" class="img-fluid" style="max-height: 400px;">
        </div>

        <!-- Booking Information Section -->
        <div class="col-md-6">
            <h2 class="fw-bold" style="color: #ec0e3e;">Book a Phone Repair Online</h2>
            <p class="text-muted">
                Book a phone repair now to save waiting time.
                Our expert technicians are ready to assist you with quick and reliable repair services.
            </p>
            <a href="<?= $isLoggedIn ? 'booking.php' : 'login.php'; ?>" class="btn btn-lg mt-3" style="border-radius: 30px; background-color: #ec0e3e; color: #fff; padding: 10px 20px; text-decoration: none;">
                Book Now
            </a>
        </div>
    </div>

    <!-- Discover More Services Section -->
    <div class="my-5">
    <h2 class="text-center fw-bold " style="color: #ec0e3e;">Discover More Services</h2>
    <div class="row g-4 mt-4">
        <!-- Laptops -->
        <div class="col-md-4">
            <a href="laptops.php" class="service-box text-decoration-none">
                <div class="icon-container">
                    <img src="assets/images/laptop-icon.jpg" alt="Laptops" class="img-fluid">
                </div>
                <h5 class="mt-3 fw-bold">Laptops</h5>
                <p class="text-muted">Browse our collection of high-performance laptops.</p>
            </a>
        </div>

        <!-- Phones -->
        <div class="col-md-4">
            <a href="phones.php" class="service-box text-decoration-none">
                <div class="icon-container">
                    <img src="assets/images/phone-icon.jpg" alt="Phones" class="img-fluid">
                </div>
                <h5 class="mt-3 fw-bold">Phones</h5>
                <p class="text-muted">Discover the latest smartphones at unbeatable prices.</p>
            </a>
        </div>

        <!-- Tablets -->
        <div class="col-md-4">
            <a href="tablets.php" class="service-box text-decoration-none">
                <div class="icon-container">
                    <img src="assets/images/tablet-icon.jpg" alt="Tablets" class="img-fluid">
                </div>
                <h5 class="mt-3 fw-bold">Tablets</h5>
                <p class="text-muted">Explore versatile tablets for work and entertainment.</p>
            </a>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>