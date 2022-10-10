<?php
include "config.php";

if(isset($_POST['login']))
{
    if(isset($_POST['userAdmin'])  && isset($_POST['password']))
    {

    $user = filter_var($_POST['userAdmin'], FILTER_SANITIZE_STRING);   
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM admin WHERE username='$user' AND password='$password'";

    $result = mysqli_query($conn, $sql);   

    $num = mysqli_num_rows($result);
   
        if($num > 0) {
             echo "Connected";

            //after login in conncect to bckoffice
            header("location: ./contact_backoffice/index.php");
            }

            else{
                echo "Sorry, this section is available only for administrator!";
            }
    
    mysqli_close($conn);
    }

}

?>