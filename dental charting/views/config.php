<?php

$servername = "localhost";
$username = "pakdenti_admin";
$password = "+h8(C%EYZq8O";
$db = "pakdenti_dental";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>

