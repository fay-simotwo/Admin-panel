<?php
session_start();
$pageTitle = "Your Cart";
include('includes/header.php');
require('./admin/config/dbconfig.php');

// Fetch cart items for the user
if (!isset($_SESSION['id'])) {
    $_SESSION['error'] = "You need to log in to view your cart.";
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['id'];
$query = "SELECT c.*, p.name, p.price, p.image 
          FROM cart c
          JOIN products p ON c.product_id = p.id
          WHERE c.user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

?>

<div class="container py-5">
    <h2 class="text-center mb-4" style="color: #ec0e3e;">Your Cart</h2>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success text-center"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php elseif (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger text-center"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <?php if ($result->num_rows > 0): ?>
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price (Ksh)</th>
                    <th>Quantity</th>
                    <th>Total (Ksh)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($item = $result->fetch_assoc()): ?>
                    <tr>
                        <td>
                            <img src="<?= htmlspecialchars($item['image']); ?>" alt="<?= htmlspecialchars($item['name']); ?>" style="height: 60px; width: 60px; object-fit: cover;">
                        </td>
                        <td><?= htmlspecialchars($item['name']); ?></td>
                        <td><?= number_format($item['price']); ?></td>
                        <td>
                        <form action="update-cart.php" method="POST" style="display: inline;">
                        <input type="hidden" name="cart_id" value="<?= $item['cart_id']; ?>">
                                <input type="number" name="quantity" value="<?= $item['quantity']; ?>" min="1" max="99" style="width: 60px;" required>
                                <button type="submit" class="btn btn-sm btn-outline-light">Update </button>
                            </form>
                        </td>
                        <td><?= number_format($item['price'] * $item['quantity']); ?></td>
                        <td>
    <!-- Remove Icon -->
    <form action="remove-cart.php" method="POST" style="display: inline;">
        <input type="hidden" name="cart_id" value="<?= $item['cart_id']; ?>">
        <button type="submit" class="btn btn-sm btn-danger">
            <i class="bi bi-trash-fill"></i>
        </button>
    </form>

    <!-- Add Another Icon -->
    <form action="products.php" method="GET" style="display: inline;">
        <button type="submit" class="btn btn-sm btn-success">
            <i class="bi bi-plus-circle-fill"></i> 
        </button>
    </form>
</td>

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div class="text-end">
            <a href="checkout.php" class="btn btn-success btn-lg mt-3" style="border-radius: 30px;">Proceed to Checkout</a>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">Your cart is empty. <a class="start" href="products.php">Start shopping now!</a></div>
    <?php endif; ?>
</div>

<?php include('includes/footer.php'); ?>
