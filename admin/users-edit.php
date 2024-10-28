<?php
include('includes/header.php');
require_once('config/function.php');

// Check if the user ID is set in the URL
if (isset($_GET['id'])) {
    $userId = validate($_GET['id']); // Use your validation function to sanitize input

    // Fetch user details from the database
    $query = "SELECT * FROM users WHERE id = '$userId' LIMIT 1";
    $result = mysqli_query($conn, $query);

    // Check if user data is available
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        redirect('users.php', 'User not found');
    }
} else {
    redirect('users.php', 'Invalid User ID');
}
?>

<script>
    console.log("Users Edit page loaded successfully");

    // Log form submission details
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");
        form.addEventListener("submit", function (event) {
            console.log("Form submitted for Edit User");
            console.log("Name:", document.getElementById("name").value);
            console.log("Phone:", document.getElementById("phone").value);
            console.log("Email:", document.getElementById("email").value);
            console.log("Password:", document.getElementById("password").value);
        });
    });
</script>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit User
                    <a href="users.php" class="btn btn-primary float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="update-user.php" method="POST">
                    <input type="hidden" name="id" value="<?= $user['id']; ?>">
                    <div class="row">
                        <!-- Left Column: Name, Phone Number, Select Role -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="<?= $user['name']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control" id="phone" value="<?= $user['phone']; ?>" required>
                            </div>

                            <!-- Select Role Dropdown -->
                            <div class="row">
                                <!-- Column for Select Role Dropdown -->
                                <div class="col-md-3">
                                    <label for="role" class="form-label">Select Role</label>
                                    <select name="role" class="form-select" required>
                                        <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                        <option value="user" <?= $user['role'] == 'user' ? 'selected' : ''; ?>>User</option>
                                    </select>
                                </div>

                                <!-- Column for Select Role Checkbox -->
                                <div class="col-md-3">
                                    <label class="ms-3">Is Ban</label>
                                    <br />
                                    <input type="checkbox" name="is_ban" style="width:30px;height:30px;" <?= $user['is_ban'] ? 'checked' : ''; ?> />
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Email, Password, Save -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="<?= $user['email']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                                <small class="text-muted">Leave blank to keep current password</small>
                            </div>
                            <div class="mb-3 text-end">
                                <br>
                                <button type="submit" name="updateUser" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
