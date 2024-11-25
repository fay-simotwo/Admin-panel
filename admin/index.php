<?php

session_start();

// Ensure only admins can access this page
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header("Location: index.php");
    exit();
}

$pageTitle = "Admin Dashboard";
include('includes/header.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php include('includes/header.php'); ?>
<script>
    console.log("Index page loaded successfully");
</script>


<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card card-body p-3">

            <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Money</p>
            <h5 class="font-weight-bolder mb-0">
                2
            </h5>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-body p-3">

            <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Money</p>
            <h5 class="font-weight-bolder mb-0">
                2
            </h5>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-body p-3">

            <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Money</p>
            <h5 class="font-weight-bolder mb-0">
                3
            </h5>
        </div>
    </div>

</div>
<?php include('includes/footer.php'); ?>