<?php
session_start();
$pageTitle = "Shop Laptops"; 
include('includes/header.php');
require('./admin/config/dbconfig.php');

// Fetch products for this category
$category = "Laptop"; 
$query = "SELECT * FROM products WHERE category = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="container py-5">
    <h2 class="text-center fw-bold" style="color: #ec0e3e;">Shop <?= htmlspecialchars($category); ?></h2>
    <div class="row g-4">
        <?php while ($product = $result->fetch_assoc()): ?>
        <div class="col-md-4">
            <div class="card text-center">
                <img src="<?= htmlspecialchars($product['image']); ?>" alt="<?= htmlspecialchars($product['name']); ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($product['name']); ?></h5>
                    <p class="text-muted">Ksh <?= number_format($product['price']); ?></p>
                    <p class="text-muted"><?= htmlspecialchars($product['description']); ?></p>

                    <?php if (isset($_SESSION['id'])): ?>
                        <!-- Show Add to Cart button if user is logged in -->
                        <form action="cart.php" method="POST">
                            <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                            <button type="submit" class="btn btn-outline-light" style="border-radius: 30px;">Add to Cart</button>
                        </form>
                    <?php else: ?>
                        <!-- Show alert if user is not logged in -->
                        <button onclick="alert('You need to log in to add items to your cart.');" class="btn btn-outline-light" style="border-radius: 30px;">Add to Cart</button>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include('includes/footer.php'); ?>
