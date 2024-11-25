<?php
session_start();
$pageTitle = "Your Cart";
include('includes/header.php');
require('./admin/config/dbconfig.php');

if (!isset($_SESSION['id'])) {
    $_SESSION['error'] = "You need to log in to view your cart.";
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['id'];

// Fetch cart items
$query = "
    SELECT c.id AS cart_id, p.id AS product_id, p.name, p.image, p.price, c.quantity 
    FROM cart c 
    JOIN products p ON c.product_id = p.id 
    WHERE c.user_id = ?
";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

?>

<div class="container py-5">
    <h2 class="text-center mb-4" style="color: #ec0e3e;">Your Cart</h2>
    <?php if ($result->num_rows > 0): ?>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $grandTotal = 0;
                while ($item = $result->fetch_assoc()):
                    $total = $item['price'] * $item['quantity'];
                    $grandTotal += $total;
                ?>
                    <tr>
                        <td><img src="<?= htmlspecialchars($item['image']); ?>" alt="<?= htmlspecialchars($item['name']); ?>" style="width: 80px;"></td>
                        <td><?= htmlspecialchars($item['name']); ?></td>
                        <td>Ksh <?= number_format($item['price']); ?></td>
                        <td>
                            <form action="update-cart.php" method="POST" style="display: inline;">
                                <input type="hidden" name="cart_id" value="<?= $item['cart_id']; ?>">
                                <input type="number" name="quantity" value="<?= $item['quantity']; ?>" min="1" max="99" style="width: 60px;" required>
                                <button type="submit" class="btn btn-sm btn-outline-light">Update </button>
                            </form>
                        </td>
                        <td>Ksh <?= number_format($total); ?></td>
                        <td>
                            <form action="remove-cart.php" method="POST" style="display: inline;">
                                <input type="hidden" name="cart_id" value="<?= $item['cart_id']; ?>">
                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                            </form>
                            <!-- Add Another Button -->
                            <form action="products.php" method="GET" style="display: inline;">
                                <button type="submit" class="btn btn-sm btn-success">Add Another</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <h4 class="text-end">Grand Total: Ksh <?= number_format($grandTotal); ?></h4>
        <a href="checkout.php" class="btn btn-lg btn-success mt-3" style="border-radius: 30px;">Proceed to Checkout</a>
    <?php else: ?>
        <p class="text-center mt-4">Your cart is empty! <a href="products.php">Continue Shopping</a></p>
    <?php endif; ?>
</div>

<?php include('includes/footer.php'); ?>
