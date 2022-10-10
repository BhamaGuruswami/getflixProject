<?php
if (isset($_POST['forget_btn'])){

    $email=$_POST['email'];
}
$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);   

$sqlCheck = "SELECT * FROM users WHERE email='$email' AND password='$password'";

$result = mysqli_query($conn, $sqlCheck);   

$num = mysqli_num_rows($result);

    if($num > 0) {
         echo "You are connected";

        //after login in conncect to main page
        header("location:index.html");
        }

        else{
            echo "Name or password are not correct";
        }

sendpasswordresetlink($user['token']);
?>