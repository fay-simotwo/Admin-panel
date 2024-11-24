<?php
session_start();
$pageTitle = "Search Results";
include('includes/header.php');
require('./admin/config/dbconfig.php');

// Ensure the user is logged in
if (!isset($_SESSION['email'])) {
    $_SESSION['error'] = "You must be logged in to perform a search.";
    header("Location: login.php");
    exit();
}

// Get the logged-in user's email or ID
$userEmail = $_SESSION['email']; 

// Initialize variables
$searchResults = [];

if (isset($_GET['query'])) {
    $query = htmlspecialchars(trim($_GET['query']));
    
    // Query to search the database, restricting results to the logged-in user's data
    $searchQuery = "
        SELECT * FROM bookings 
        WHERE (device_type LIKE ? 
        OR issue_description LIKE ? 
        OR status LIKE ?)
        AND email = ?"; 
    
    $stmt = $conn->prepare($searchQuery);
    $likeQuery = "%" . $query . "%";
    $stmt->bind_param("ssss", $likeQuery, $likeQuery, $likeQuery, $userEmail); 
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the results
    while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
    }
}
?>

<div class="container py-5">
    <h2 class="text-center mb-4" style="color: #ec0e3e;">Search Results</h2>
    
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <?php if (empty($searchResults)): ?>
        <div class="text-center text-muted">No results found for "<strong><?= htmlspecialchars($_GET['query']); ?></strong>"</div>
    <?php else: ?>
        <div class="row g-4">
            <?php foreach ($searchResults as $result): ?>
                <div class="col-md-4">
                    <div class="card h-100 service-card">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #ec0e3e;"><?= htmlspecialchars($result['device_type']); ?></h5>
                            <p><strong>Issue:</strong> <?= htmlspecialchars($result['issue_description']); ?></p>
                            <p><strong>Status:</strong> <?= htmlspecialchars($result['status']); ?></p>
                            <p><strong>Preferred Date:</strong> <?= htmlspecialchars($result['preferred_date']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php include('includes/footer.php'); ?>
