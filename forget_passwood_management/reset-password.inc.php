<?php
if (isset($_post["reset-password-submit"])){

    $selector =$_POST["selector"];
    $validator =$_POST["validator"];
    $password =$_POST["pwd"]; 
    $passwordRepeat =$_POST["pwd-repeat"];


    if (empty($password) || empty(passwordRepeat)){
        header('location:create-new-password.php?newpwd =empty');
        exit();
    }
    else if ($password != $passwordRepeat){
        header('location:create-new-password.php?newpwd =pwdnotsame');
        exit();
    }

     $currentDate = date ("U");

     require  "dbconfi.php";
     $sql ="SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpire >= ?";
     $stmt = mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt,$sql)){
         echo 'there was an error';
         exit();
     }
 else{
     mysqli_stmt_bind_param($stmt, "s",$selector);
     mysqli_stmt_execute($stmt);
     $currentDate = date ("U");
     $result = mysqli_stmt_get_result($stmt);
     if(!$row = mysqli_fetch_assoc($result)) {
        echo 'you need to re-submit your reset request.';
        exit();
     }
     else{
        $tokenBin = hex2bin($validator);
        $tokenCheck = password_verify($tokenBin,$row["pwdreset"]);
        if ($tokenCheck === false){
            echo 'you need to re-submit your reset request.';
            exit();
        }
        elseif ($tokenCheck === true){
            $tokenEmail = $row['pwdResetEmail'];
            $sql ="SELECT * FROM users WHERE emailUsers=?;" ;
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)){
                echo 'there was an error';
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "s",$tokenEmail);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if(!$row = mysqli_fetch_assoc($result)){
                   echo 'there was an error.';
                   exit();
                } 
                else{
                    $sql ="UPDATE users Set pwdUsers =? WHERE emailUsers =?";
                    $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)){
                echo 'there was an error';
                exit();
            }
            else{
                $newPwdHash = password_harsh($password,PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "ss",$newPwdHash,$tokenEmail);
                mysqli_stmt_execute($stmt);

                $sql ="DELETE FROM pwdreset WHERE pwdResetEmail =?";
            $stmt = mysqli_stmt_init($conn);
             if (!mysqli_stmt_prepare($stmt,$sql)){
        echo 'there was an error';
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "s",$tokenEmail);
        mysqli_stmt_execute($stmt);
        header("location:sign.php?newpwd= passwordupdated");
}
    }
}
}

    }
}
 }
}
else{
    header('location:forgetmessage.php?');

}

?>