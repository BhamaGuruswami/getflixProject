<?php
session_start();

// servername => localhost
$conn = mysqli_connect("database-2.csmkfiung66c.us-east-1.rds.amazonaws.com", "admin", "4G^xPTq3", "userDB");

// Check connection
if($conn === false){
  die("ERROR: Could not connect. " 
      . mysqli_connect_error());
}
?> 