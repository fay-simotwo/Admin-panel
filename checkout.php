<?php
session_start();
$pageTitle = "Checkout";
include('includes/header.php');
require('./admin/config/dbconfig.php');

// Ensure the user is logged in
if (!isset($_SESSION['id'])) {
    $_SESSION['error'] = "You need to log in to checkout.";
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Get user inputs
    $deliveryAddress = htmlspecialchars(trim($_POST['address']));
    $phoneNumber = htmlspecialchars(trim($_POST['phone']));

    // Validate inputs
    if (empty($deliveryAddress) || empty($phoneNumber)) {
        $_SESSION['error'] = "Please provide a valid delivery address and phone number.";
        header("Location: checkout.php");
        exit();
    }

    // Create a new order
    $query = "INSERT INTO orders (user_id, delivery_address, phone, status) VALUES (?, ?, ?, 'Pending')";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        error_log("Prepare failed: " . $conn->error);
        exit();
    }
    $stmt->bind_param("iss", $userId, $deliveryAddress, $phoneNumber);
    $stmt->execute();
    $orderId = $stmt->insert_id;

    // Check for issues with the order insertion
    if ($stmt->affected_rows <= 0) {
        $_SESSION['error'] = "Failed to place your order. Please try again.";
        header("Location: checkout.php");
        exit();
    }

    // Add items to order
    $cartQuery = "SELECT product_id, quantity FROM cart WHERE user_id = ?";
    $cartStmt = $conn->prepare($cartQuery);
    $cartStmt->bind_param("i", $userId);
    $cartStmt->execute();
    $cartResult = $cartStmt->get_result();

    while ($cartItem = $cartResult->fetch_assoc()) {
        $insertItem = "INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)";
        $itemStmt = $conn->prepare($insertItem);
        $itemStmt->bind_param("iii", $orderId, $cartItem['product_id'], $cartItem['quantity']);
        $itemStmt->execute();
    }

    // Clear cart
    $clearCart = "DELETE FROM cart WHERE user_id = ?";
    $clearStmt = $conn->prepare($clearCart);
    $clearStmt->bind_param("i", $userId);
    $clearStmt->execute();

    // Success message
    $_SESSION['success'] = "Order placed successfully! We will contact you shortly.";
    header("Location: cart-confirmation.php");
    exit();
}
?>

<div class="container py-5">
    <h2 class="text-center mb-4" style="color: #ec0e3e;">Checkout</h2>
    <form method="POST" class="w-50 mx-auto">
        <div class="mb-3">
            <label for="address" class="form-label">Delivery Address</label>
            <textarea name="address" id="address" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-lg btn-success w-100 mt-3" style="border-radius: 30px;">Confirm Order</button>
    </form>
</div>

<?php include('includes/footer.php'); ?>
