<?php
session_start();
require('./admin/config/dbconfig.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['id'])) {
        $_SESSION['error'] = "You need to log in to add items to your cart.";
        header("Location: login.php");
        exit();
    }

    $productId = intval($_POST['product_id']);
    $userId = $_SESSION['id'];

    // Check if the product exists in the cart
    $query = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $userId, $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update quantity
        $query = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $userId, $productId);
        $stmt->execute();
        $_SESSION['success'] = "Item quantity updated in your cart.";
    } else {
        // Add new item to cart
        $query = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, 1)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $userId, $productId);
        $stmt->execute();
        $_SESSION['success'] = "Item added to your cart.";
    }

    // Redirect to cart page
    header("Location: cart-page.php"); // Redirects to cart page
    exit();
}
?>
