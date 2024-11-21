<?php
$pageTitle = "Login";
include('includes/header.php');
session_start();

// Check if the user is already logged in
if (isset($_SESSION['name'])) {
    header("Location: booking.php");
    exit();
}

// Display login error if it exists
if (isset($_SESSION['login_error'])) {
    echo "<p style='color: red; text-align: center;'>" . $_SESSION['login_error'] . "</p>";
    unset($_SESSION['login_error']);
}
?>

<div class="py-5 d-flex align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="login-card">
                    <h4>Welcome Back</h4>
                    <p class="text-center mb-4" style="color: #666;">Please enter your email and password to log in</p>
                    <form action="login-code.php" method="POST">
                        <div class="mb-3">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <button type="submit" name="loginBtn" class="btn btn-login">Login</button>
                        </div>
                        <p class="text-center" style="color: #666;">Don't have an account? <a href="register.php" style="color: #db2777; font-weight: bold;">Sign up</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
