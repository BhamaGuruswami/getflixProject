<?php
require_once "../config.php";

if(isset($_POST['reset-password-submit'])){

  $pwd1 = $_POST['pwd'];
  $pwd2 = $_POST['pwd-repeat'];
  $email = $_POST['new_email'];

  
  if($pwd1 == $pwd2){
    $sql = "UPDATE users set password='$pwd2' where email='$email'";
    mysqli_query($conn, $sql);
    echo "<h6 class='text-light m-1'>Password Updated successful.</h6><hr>";
    // var_dump ($name, $email, $password);

  } else{
    echo "<h6 class='text-light m-1'>Passwords do not match.</h6><hr>";
  }
// echo "<h6 class='text-light m-1'>Password Update.</h6><hr>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Password</title>
  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- link font awesome icons -->
    <script src="https://kit.fontawesome.com/6c36406174.js" crossorigin="anonymous"></script>
    <!-- link css -->
    <link rel="stylesheet" href="../signin/home.css?v=<?php echo time(); ?>">
    <!-- <link rel="stylesheet" href="sign.css?v=<?php echo time(); ?>"> -->
    <!-- link icon in head -->
    <link rel="apple-touch-icon" type="image/png" sizes="16x16" href="../assets/ventilateur.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/ventilateur.png">
</head>
<body>
  <!-- navbar -->
  <div class="topnav container-fluid p-2">
    <a class="logo"  href="../index.php"><img src="../assets/ventilateur.png" width="30" alt="logo"> <b>BesTube</b></a>
    <a href="./auth/home.php" class="split">Home</a>
  </div>
<!-- background image -->

  <section class="vh-50 mt-5 mb-5">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">

                <h2 class="text-uppercase text-center mb-5">Reset your password</h2>
                
                <?php
                $selector = $_GET["selector"];
                $validator = $_GET["validator"];
                $useremail=$_GET["useremail"];

if (empty($selector) || empty($validator)){
    echo "could not validate your request";
}
else{
    if(ctype_xdigit($selector)!==  false && ctype_xdigit($selector)!== false ){
        ?>
                <form action="" method="post">
                    <input type = "hidden " name ="selector" value="<?php echo $selector ?>">
                    <input type = "hidden " name ="validator" value="<?php echo $validator ?>">
                    <input type = "password " name ="pwd" placeholder="Enter your password">
                    <input type = "password " name ="pwd-repeat" placeholder="Confirm">
                    <input type = "text " name ="new_email" value="<?php echo $useremail ?>">

<button type = "submit" name = "reset-password-submit">Reset password</button> 
    </form>
        <?php

    }
}
                ?>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

  </section>

  <footer class="footer p-2">
            <div class="footer-cols">
                <ul>
                    <li><a href="../faq.php">FAQ</a></li>
                </ul>
                <ul>
                    <li><a href="../contact.php">Contact Us</a></li>
                </ul>
                <ul>
                    <li><a href="../auth/home.php">BesTube Originals</a></li>
                </ul>
                <ul>
                    <li><a href="#">2022 BesTube <i class="fa-regular fa-copyright"></i></a></li>
                </ul>
            </div>
        </footer>


  <script src="myscripts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>

</body>
</html>