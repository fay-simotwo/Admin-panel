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
}$pageTitle = "Book Repair";
include('includes/header.php');

if (!isset($_SESSION['id'])) {
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI']; 
    header("Location: login.php");
    exit();
}
?>


<div class="container py-5">
    <h2 class="text-center fw-bold mb-4" style="color: #ec0e3e;">Book a Repair Service</h2>

    <div class="row">
        <!-- Illustration Section -->
        <div class="col-md-6 text-center">
            <img src="assets/images/phone-repair.png" alt="Repair Illustration" class="booking-image">

        </div>

        <!-- Booking Form Section -->
        <div class="col-md-6">
            <h4 class="fw-bold text-secondary mb-3">Fill in the Details Below</h4>
            <form action="process-booking.php" method="POST">
                <!-- Full Name -->
                <div class="mb-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" value="<?= htmlspecialchars($_SESSION['name']); ?>" readonly>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($_SESSION['email']); ?>" readonly>
                </div>

                <!-- Device Type -->
                <div class="mb-3">
                    <label for="deviceType" class="form-label">Device Type</label>
                    <select class="form-select" id="deviceType" name="deviceType" required>
                        <option value="" disabled selected>Select your device</option>
                        <option value="Phone">Phone</option>
                        <option value="Tablet">Tablet</option>
                        <option value="Laptop">Laptop</option>
                    </select>
                </div>

                <!-- Issue Description -->
                <div class="mb-3">
                    <label for="issueDescription" class="form-label">Describe the Issue</label>
                    <textarea class="form-control" id="issueDescription" name="issueDescription" rows="4" placeholder="Briefly describe the problem with your device" required></textarea>
                </div>

                <!-- Preferred Date -->
                <div class="mb-3">
                    <label for="preferredDate" class="form-label">Preferred Repair Date</label>
                    <input type="date" class="form-control" id="preferredDate" name="preferredDate" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-lg w-100 mt-3" style="background-color:#ec0e3e; color:white;">Submit Booking</button>
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
