<?php
require '/home/lastie/Documents/Nels/php-admin-panel/admin/config/function.php';


if(isset($_POST['saveUser'])) {
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = password_hash(validate($_POST['password']), PASSWORD_DEFAULT);
    $role = validate($_POST['role']);
    $is_ban = isset($_POST['is_ban']) ? 1 : 0;

    if($name != '' && $email != '' && $phone != '' && $password != '') {
        $stmt = $conn->prepare("INSERT INTO users (name, phone, email, password, is_ban, role) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssis", $name, $phone, $email, $password, $is_ban, $role);

        if($stmt->execute()) {
            redirect('users.php','User/Admin Added successfully');
        } else {
            redirect('users-create.php','Something went wrong');
        }
        $stmt->close();
    } else {
        redirect('users-create.php', 'Please fill all the input fields');
    }
}

?>