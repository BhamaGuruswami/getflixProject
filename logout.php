<?php
require_once "config.php";
// logout session
$_SESSION = [];
session_unset();
session_destroy();
header("Location: ./signin/sign.php"); // redirect to sign page