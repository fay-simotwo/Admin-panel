<?php
session_start();

require 'dbconfig.php';

function validate($inputData)
{
    global $conn;
    $validatedData = mysqli_real_escape_string($conn, $inputData);
    echo "<script>console.log('Input validated:', '$validatedData');</script>";
    return $validatedData;
}

function redirect($url, $status)
{
    echo "<script>console.log('Redirect called with status:', '$status');</script>";
    $_SESSION['status'] = $status;
    header('Location: ' . $url);
    exit(0);
}

function alertMessage()
{
    if (isset($_SESSION['status'])) {
        echo '<div class="alert alert-success fade-out" id="status-message">
                <h6>' . $_SESSION['status'] . '</h6>
              </div>';
        echo "<script>console.log('Alert Message Displayed:', '" . $_SESSION['status'] . "');</script>";
        unset($_SESSION['status']);
    }
}

function getAll($tableName)
{
    global $conn;

    $table = validate($tableName); // Use validated variable

    $query = "SELECT * FROM $table"; // Correctly use the validated table name
    $result = mysqli_query($conn, $query);

    if(!$result) {
        echo "<script>console.log('Error fetching data:', '" . mysqli_error($conn) . "');</script>";
    }

    return $result;
}
