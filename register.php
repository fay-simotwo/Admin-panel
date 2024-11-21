<?php
$pageTitle = "Sign Up";
include('includes/header.php');
?>

<div class="py-5 d-flex align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="register-card">
                    <h4>Create an Account</h4>
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['error']; ?>
                        </div>
                        <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['success']; ?>
                        </div>
                        <?php unset($_SESSION['success']); ?>
                    <?php endif; ?>

                    <p class="text-center mb-4" style="color: #666;">Please fill in the details below to create your account</p>

                    <form action="register-code.php" method="POST">
                        <div class="mb-3">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control" placeholder="e.g. 0712345678" required>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <button type="submit" name="registerBtn" class="btn btn-register">Sign Up</button>
                        </div>
                        <p class="text-center" style="color: #666;">Already have an account? <a href="login.php" style="color: #db2777; font-weight: bold;">Log in</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
