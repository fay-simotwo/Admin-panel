<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit User
                    <a href="users.php" class="btn btn-primary float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="update_user.php" method="POST">
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

                            <!-- Select Role Dropdown -->
                            <div class="row">
                                <!-- Column for Select Role Dropdown -->
                                <div class="col-md-3 ">
                                    <label for="role" class="form-label">Select Role</label>
                                    <select name="role" class="form-select" required>
                                        <option value="">Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>

                                <!-- Column for Select Role Checkbox -->
                                <div class="col-md-3 ">
                                    <label class="ms-3">Select Role</label>
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
                                <input type="password" name="password" class="form-control" id="password">
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
