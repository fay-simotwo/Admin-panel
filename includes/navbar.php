<nav class="navbar navbar-expand-lg navbar shadow-sm py-3">
    <div class="container-fluid">
        <!-- Brand Logo and Name -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="assets/images/Logo.png" alt="Logo" style="width: 30px; height: 30px;" class="me-2">
            <span>Nels Repairs</span>
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
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                
                <!-- About Us -->
                <li class="nav-item">
                    <a class="nav-link" href="About.php">About Us</a>
                </li>
                
                <!-- Services -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Services
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                        <li><a class="dropdown-item" href="Services.php">All Services</a></li>
                        <li><a class="dropdown-item" href="repair.php">Repair Services</a></li>
                        <li><a class="dropdown-item" href="consultation.php">Consultation</a></li>
                        <li><a class="dropdown-item" href="support.php">Support</a></li>
                    </ul>
                </li>
                
                <!-- Contact Us -->
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
                
                <!-- Disabled Link (Example) -->
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            
            <div class="d-flex ms-lg-3">
                <a href="login.php" class="btn btn-outline-light me-2">Login</a>
                <a href="register.php" class="btn btn-warning">Sign Up</a>
            </div>
        </div>
    </div>
</nav>