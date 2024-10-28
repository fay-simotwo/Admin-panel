<!-- if (!isset($_SESSION['auth']) || $_SESSION['role'] !== 'admin') {
    redirect('login.php', 'Unauthorized access');
} -->

<?php
require '/home/lastie/Documents/Nels/php-admin-panel/admin/config/function.php';

if (isset($_GET['id'])) {
    $userId = validate($_GET['id']); // Sanitize the input to prevent SQL injection

    // Query to delete the user by ID
    $query = "DELETE FROM users WHERE id = '$userId'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        redirect('users.php', 'User deleted successfully');
    } else {
        redirect('users.php', 'Error deleting user');
    }
} else {
    redirect('users.php', 'Invalid action');
}
?>
