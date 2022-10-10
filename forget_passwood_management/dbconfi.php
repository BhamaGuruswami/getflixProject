<?php
$servername = "database-2.csmkfiung66c.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "4G^xPTq3";
$DbName = "userDB";

// Create connection
$conn = new mysqli($servername, $username, $password,$DbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>
