<?php
$pageTitle = "Contact Us";
include('includes/header.php');
?>

<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="color: #ec0e3e;">Contact Us</h1>
        <p class="text-muted">We’d love to hear from you! Whether you have a question about our services, pricing, or anything else, our team is ready to answer your questions.</p>
    </div>

    <div class="row g-5">
        <!-- Contact Info Section -->
        <div class="col-md-6">
            <div class="p-4 shadow rounded" style="background-color: #fff;">
                <h4 class="fw-bold mb-4" style="color: #ec0e3e;">Get in Touch</h4>
                <p class="mb-2"><i class="bi bi-geo-alt-fill" style="color: #ec0e3e;"></i> 123 Tech Street, Nairobi, Kenya</p>
                <p class="mb-2"><i class="bi bi-telephone-fill" style="color: #ec0e3e;"></i> <a href="tel:+254712345678" class="text-decoration-none text-dark">+254 712 345 678</a></p>
                <p class="mb-2"><i class="bi bi-envelope-fill" style="color: #ec0e3e;"></i> <a href="mailto:info@nelsrepairs.com" class="text-decoration-none text-dark">info@nelsrepairs.com</a></p>
                <p><i class="bi bi-whatsapp" style="color: #ec0e3e;"></i> <a href="https://wa.me/254768822652" target="_blank" class="text-decoration-none text-dark">Chat with us on WhatsApp</a></p>
                <div class="d-flex mt-4">
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle me-2" style="background-color: #ec0e3e;">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle me-2" style="background-color: #ec0e3e;">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle me-2" style="background-color: #ec0e3e;">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="background-color: #ec0e3e;">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Contact Form Section -->
        <div class="col-md-6">
            <div class="p-4 shadow rounded" style="background-color: #f9f9f9;">
                <h4 class="fw-bold mb-4" style="color: #ec0e3e;">Send Us a Message</h4>
                <?php if (isset($_SESSION['contact_success'])): ?>
                    <div class="alert alert-success"><?= $_SESSION['contact_success']; unset($_SESSION['contact_success']); ?></div>
                <?php endif; ?>
                <form action="contact-submit.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" id="message" class="form-control" rows="5" placeholder="Enter your message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-light w-100" style="border-radius: 30px;">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
