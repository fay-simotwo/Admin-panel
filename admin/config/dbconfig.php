<?php

define('DB_SERVER',"localhost");
define('DB_USERNAME',"faith");
define('DB_PASSWORD',"P@ssw0rd123!");
define('DB_DATABASE',"nelsservices");

$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}

?>