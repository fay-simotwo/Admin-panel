<?php
session_start();
require('./admin/config/dbconfig.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartId = intval($_POST['cart_id']);
    $quantity = intval($_POST['quantity']);

    $query = "UPDATE cart SET quantity = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $quantity, $cartId);
    $stmt->execute();

    $_SESSION['success'] = "Cart updated successfully!";
    header("Location: view-cart.php");
    exit();
}
?>
