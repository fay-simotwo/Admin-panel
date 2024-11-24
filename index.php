<?php
$pageTitle = "Home";
include('includes/header.php');
?>

<div class="container py-5">
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

  
    <div id="services" class="container py-5">
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
            <h2 class="fw-bold" style="color: #ec0e3e;">Book Your Repair Online</h2>
            <p class="text-muted">
                Book your repair now to save waiting time.
                Our expert technicians are ready to assist you with quick and reliable repair services.
            </p>
            <a href="<?= $isLoggedIn ? 'booking.php' : 'login.php'; ?>" class="btn btn-outline-light btn-lg mt-3" style="border-radius:30px;">
                Book Now
            </a>
        </div>
    </div>

    <div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #ec0e3e;">Search for Device Repair Details</h2>
        <p class="text-muted">Enter the device type, issue, or any keyword to find the repair service you need.</p>
    </div>

    <form action="search.php" method="GET" class="d-flex justify-content-center">
        <input type="text" name="query" class="form-control w-50 me-2" placeholder="Search for repairs..." required>
        <button type="submit" class="btn btn-outline-light" style="border-radius: 30px;">Search</button>
    </form>
</div>

    <div id="about" class="container-fluid py-5" style="background-color: #f9f9f9;">
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
</div>


<?php include('includes/footer.php'); ?>