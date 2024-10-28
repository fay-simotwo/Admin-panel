<?php
require '/home/lastie/Documents/Nels/php-admin-panel/admin/config/function.php';

if (isset($_POST['updateUser'])) {
    $userId = validate($_POST['id']);
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $role = validate($_POST['role']);
    $is_ban = isset($_POST['is_ban']) ? 1 : 0;
    
    // Check if password is provided, update only if a new password is entered
    $password = !empty($_POST['password']) ? password_hash(validate($_POST['password']), PASSWORD_DEFAULT) : null;

    if ($password) {
        // Update with password change
        $query = "UPDATE users SET name='$name', phone='$phone', email='$email', role='$role', is_ban='$is_ban', password='$password' WHERE id='$userId'";
    } else {
        // Update without password change
        $query = "UPDATE users SET name='$name', phone='$phone', email='$email', role='$role', is_ban='$is_ban' WHERE id='$userId'";
    }

    $result = mysqli_query($conn, $query);

    if ($result) {
        redirect('users.php', 'User updated successfully');
    } else {
        echo "<script>console.log('Error updating user:', '" . mysqli_error($conn) . "');</script>";
        redirect('users.php', 'Error updating user');
    }
} else {
    redirect('users.php', 'Invalid action');
}
?>
