<?php
require_once "../config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- link css same as home -->
  <!-- <link rel="stylesheet" href="home.css"> -->
  <link rel="stylesheet" href="home.css?v=<?php echo time(); ?>">
  <!-- <link rel="stylesheet" href="sign.css"> -->
  <link rel="stylesheet" href="sign.css?v=<?php echo time(); ?>">
  <script src="https://kit.fontawesome.com/6c36406174.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="apple-touch-icon" type="image/png" sizes="16x16" href="../assets/ventilateur.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/ventilateur.png">
</head>
<body>
  <!-- navbar -->
  <div class="topnav container-fluid p-2">
    <a class="logo"  href="../index.php"><img src="../assets/ventilateur.png" width="30" alt="logo"> <b>BesTube</b></a>
    <!-- <a  class="p-3 split" style="background-color: transparent; color: #fff;" href="./auth/home.php">Home</a> -->
    <a href="../auth/home.php" class="split">Home</a>
  </div>
</div>
<!-- background image -->
  <section class="vh-50 mt-5 mb-5">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <!-- update h-85 when user not registered less space -->
        <div class="row d-flex justify-content-center align-items-center h-85">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Sign In</h2>
                <form action="" method="post">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <label for="email"></label>
                    <input type="text" name="email" id="email" placeholder="Email address" required value="" class=form-control>
                  </div>
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <label for="password"></label>
                    <input type="password" name="password" id="password" required value="" placeholder="Password" class="form-control">
                  </div>
                  <!-- 2 column grid layout for inline styling -->
                  <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                      <!-- Checkbox -->
                      <div class="form-check">
                        <input class="form-check-input" name="rmbme" type="checkbox" value="" id="form2Example31"
                          checked />
                        <label class="form-check-label" for="form2Example31"> Remember me </label>
                      </div>
                    </div>
                    <div class="col">
                      <!-- Simple link -->
                      <a class="btnpwd" href="../forget_passwood_management/forget.php">Forgot password?</a>
                    </div>
                  </div>
                  <!-- Submit button -->
                  <div class="text-center">
                    <a href="../index.php">
                  <button type="submit" name="submit" class="btnlogin btn btn-danger btn-block mb-4">Log in</button></a>
                  </div>
                  <!-- Register buttons -->
                  <div class="text-center">
                    <p class="signup">New to BesTube? <a class="btnpwd" href="home.php">Sign up here</a>.</p>
                  </div>

                  <?php
                  if(!empty($_SESSION['id'])){
                    header("Location: ../index.php");
                }
                
                if(isset($_POST['submit'])){
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
                    $row = mysqli_fetch_assoc($result);
                    if(mysqli_num_rows($result) > 0){
                        if($password == $row['password']){
                            $_SESSION['login'] = true;
                            $_SESSION['id'] = $row['id'];
                            header("Location: ../index.php");
                        } else{
                            echo "<hr><h6 class='m-1 text-center text-danger'>Wrong password, try again.</h6>";
                        }
                    } else{
                        echo "<hr><h6 class='m-1 text-center text-danger'>User not registered.</h6>";
                    }
                }
                  ?>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
<!-- footer -->
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
    <li>2022 BesTube <i class="fa-regular fa-copyright"></i></li>
    </ul>
  </div>
</footer>
<!-- link script js -->
<script src="../myscripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
crossorigin="anonymous"></script>
</body>
</html>