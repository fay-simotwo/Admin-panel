<?php include('includes/header.php'); ?>

<script>
    console.log("Users List page loaded successfully");

    // Log table rows to verify data display
    document.addEventListener("DOMContentLoaded", function () {
        const rows = document.querySelectorAll("table tbody tr");
        console.log("Number of users loaded:", rows.length);
        rows.forEach((row, index) => {
            console.log(`User Row ${index + 1}:`, row.innerText);
        });
    });
</script>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Users List
                    <a href="users-create.php" class="btn btn-primary float-end">Add User</a>
                </h4>
            </div>
            <div class="card-body">
            <?= alertMessage(); ?>  
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample Data Row 1 -->
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>john@example.com</td>
                            <td>1234567890</td>
                            <td>
                                <a href="users-edit.php" class="btn btn-success btn-sm">Edit</a>
                                <a href="users-delete.php" class="btn btn-danger btn-sm mx-2" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                            </td>
                        </tr>
                        <!-- Sample Data Row 2 -->
                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
