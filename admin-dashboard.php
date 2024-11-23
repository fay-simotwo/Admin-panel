<?php
session_start();
$pageTitle = "Admin Dashboard";
include('includes/admin-header.php'); 

require('./admin/config/dbconfig.php');

// Fetch all bookings
$query = "SELECT * FROM bookings WHERE status = 'Pending'";
$result = $conn->query($query);
?>

<div class="container py-5">
    <h2 class="text-center mb-4">Pending Bookings</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Device Type</th>
                <th>Issue Description</th>
                <th>Preferred Date</th>
                <th>Assign Technician</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= htmlspecialchars($row['name']); ?></td>
                    <td><?= htmlspecialchars($row['email']); ?></td>
                    <td><?= htmlspecialchars($row['device_type']); ?></td>
                    <td><?= htmlspecialchars($row['issue_description']); ?></td>
                    <td><?= htmlspecialchars($row['preferred_date']); ?></td>
                    <td>
                        <form action="assign-technician.php" method="POST">
                            <input type="hidden" name="booking_id" value="<?= $row['id']; ?>">
                            <select name="technician" class="form-select" required>
                                <option value="" disabled selected>Select Technician</option>
                                <option value="Technician 1">Technician 1</option>
                                <option value="Technician 2">Technician 2</option>
                                <option value="Technician 3">Technician 3</option>
                            </select>
                            <button type="submit" class="btn btn-primary btn-sm mt-2">Assign</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include('includes/footer.php'); ?>
