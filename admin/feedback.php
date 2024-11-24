<?php
require('./admin/config/dbconfig.php');

// Fetch all feedback
$query = "
    SELECT f.id, u.name AS user_name, f.message, f.rating, f.created_at 
    FROM feedback f 
    JOIN users u ON f.user_id = u.id
    ORDER BY f.created_at DESC
";
$result = $conn->query($query);
?>

<div class="container py-5">
    <h2 class="text-center mb-4" style="color: #ec0e3e;">User Feedback</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Feedback</th>
                <th>Rating</th>
                <th>Submitted On</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= htmlspecialchars($row['user_name']); ?></td>
                    <td><?= htmlspecialchars($row['message']); ?></td>
                    <td><?= $row['rating']; ?> / 5</td>
                    <td><?= $row['created_at']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
