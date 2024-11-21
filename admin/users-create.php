<?php include('includes/header.php'); ?>

<script>
    console.log("Users Create page loaded successfully");

    // Log form submission details
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");
        form.addEventListener("submit", function (event) {
            console.log("Form submitted");
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
                <h4>Add User
                    <a href="users.php" class="btn btn-primary float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <?= alertMessage(); ?>
                <form action="code.php" method="POST">
                    <div class="row">
                        <!-- Left Column: Name, Phone Number, Select Role -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control" id="phone" required>
                            </div>
                            <div class="row">
                                <!-- Column for Select Role Dropdown -->
                                <div class="col-md-3 ">
                                    <label for="role" class="form-label">Select Role</label>
                                    <select name="role" class="form-select" required>
                                        <option value="">Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                        <option value="technician">Technician</option>
                                    </select>
                                </div>

                                <!-- Column for Select Role Checkbox -->
                                <div class="col-md-3 ">
                                    <label class="ms-3">Is Ban</label>
                                    <br />
                                    <input type="checkbox" name="is_ban" style="width:30px;height:30px;" />


                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Email, Password, Save -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            <div class="mb-3 text-end">
                                <br>
                                <button type="submit" name="saveUser" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>