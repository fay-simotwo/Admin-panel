<?php
session_start();
?>

<nav class="navbar navbar-expand-lg navbar shadow-sm py-3">
    <div class="container-fluid">
        <!-- Brand Logo and Name -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="assets/images/Logo.png" alt="Logo" style="width: 30px; height: 30px;" class="me-2">
            <span class="nels">Nels Repairs</span>
        </a>
        
        <!-- Toggle Button for Mobile View -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Navbar Links and Dropdown -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="index.php">Home</a>
                </li>
                
                <!-- About Us -->
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                
                <!-- Services -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Services
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                        <li><a class="dropdown-item" href="services.php">All Services</a></li>
                        <li><a class="dropdown-item" href="booking.php">Book a repair</a></li>
                        <li><a class="dropdown-item" href="track-repair.php">Track your repair</a></li>
                        <li><a class="dropdown-item" href="products.php">Shop now</a></li>
                        <li><a class="dropdown-item" href="support.php">Support</a></li>
                        <li><a class="dropdown-item" href="feedback.php">Feedback</a></li>
                    </ul>
                </li>
                
                <!-- Contact Us -->
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
            </ul>
            
            <!-- User Icon or Login/Signup -->
            <div class="d-flex ms-lg-3">
                <?php if (isset($_SESSION['name'])): ?>
                    <!-- User Icon and Dropdown -->
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill" style="font-size: 1.5rem; color: black;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li class="dropdown-item text-center">
                                <strong><?= htmlspecialchars($_SESSION['name']); ?></strong>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                            <a href="logout.php" class="dropdown-item text-center">Logout</a>

                            </li>
                        </ul>
                    </div>
                <?php else: ?>
                    <!-- Login and Signup Buttons -->
                    <a href="login.php" class="btn btn-outline-light me-2">Login</a>
                    <a href="register.php" class="btn btn-outline-light">Sign Up</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<?php
// // Handle Logout
// if (isset($_POST['logoutBtn'])) {
//     session_destroy();
//     header("Location: index.php");
//     exit();
// }
// ?>
