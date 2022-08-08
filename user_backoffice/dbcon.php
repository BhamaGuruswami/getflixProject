<?php

$servername = "localhost";
$username = "root";
$password = "root";
$DbName = "register";

// Create connection
$con = new mysqli($servername, $username, $password,$DbName);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
// echo "Connected successfully";
?>
