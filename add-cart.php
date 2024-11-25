<?php
session_start();
require('./admin/config/dbconfig.php');

if (!isset($_SESSION['id'])) {
    $_SESSION['error'] = "You need to log in to add items to your cart.";
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        $updateQuery = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("ii", $userId, $productId);
        $updateStmt->execute();
        $_SESSION['success'] = "Another item added to your cart.";
    } else {
        // Add new item to cart
        $insertQuery = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, 1)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("ii", $userId, $productId);
        $insertStmt->execute();
        $_SESSION['success'] = "Item added to your cart.";
    }

    header("Location: cart-page.php");
    exit();
}
?>
