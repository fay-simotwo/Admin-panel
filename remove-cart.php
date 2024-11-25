<?php
session_start();
require('./admin/config/dbconfig.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartId = intval($_POST['cart_id']);

    $query = "DELETE FROM cart WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $cartId);
    $stmt->execute();

    $_SESSION['success'] = "Item removed from cart.";
    header("Location: view-cart.php");
    exit();
}
?>
