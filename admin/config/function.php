<?php
session_start();

require 'dbconfig.php';

function validate($inputData){
    global $conn;
    $validatedData = mysqli_real_escape_string($conn, $inputData);
    echo "<script>console.log('Input validated:', '$validatedData');</script>";
    return $validatedData;
}

function redirect($url, $status) {
    echo "<script>console.log('Redirect called with status:', '$status');</script>";
    $_SESSION['status'] = $status;
    header('Location: '.$url);
    exit(0);
}

function alertMessage() {
    if (isset($_SESSION['status'])) {
        echo '<div class="alert alert-success"><h6>'.$_SESSION['status'].'</h6></div>';
        echo "<script>console.log('Alert Message Displayed:', '".$_SESSION['status']."');</script>";
        unset($_SESSION['status']);
    }
}
?>
