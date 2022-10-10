<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6c36406174.js" crossorigin="anonymous"></script>
    <!-- link css -->
    <link rel="stylesheet" href="../signin/home.css?v=<?php echo time(); ?>">
    <!-- link icon in head -->
    <link rel="apple-touch-icon" type="image/png" sizes="16x16" href="../assets/ventilateur.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/ventilateur.png">
</head>

<body>
    <!-- navbar -->
    <div class="topnav container-fluid p-2">
    <a class="logo"  href="../index.php"><img src="../assets/ventilateur.png" width="30" alt="logo"> <b>BesTube</b></a>
    <a href="index.php" class="btn btn-danger float-end">Backoffice</a>

    </div>
    <section class="vh-50 mt-3 mb-5">
    <?php include('message.php'); ?>
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px; box-shadow: 5px 5px 10px #111827;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Sign up now</h2>
              <!-- <form action="" method="post"> -->
              <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-outline mb-4">
                  <label for="name" style="font-weight: 600;">Enter your name </label>
                  <input type="text" name="name" id="name" placeholder="Name" class="form-control form-control-md">
                </div>
                <div class="form-outline mb-4">
                  <label for="email" style="font-weight: 600;">Enter your email address</label>
                  <input type="text" name="email" id="email"  placeholder="Email address" class="form-control form-control-md">
                </div>
                <div class="form-outline mb-4">
                  <label for="password" style="font-weight: 600;">Choose a password </label>
                  <input type="password" name="password" id="password" placeholder="Password" class="form-control form-control-md">
                </div>
                <div class="form-outline mb-4">
                  <label for="rptpassword" style="font-weight: 600;">Confirm password </label>
                  <input type="password" name="rptpassword" id="rptpassword" placeholder="Confirm" class="form-control form-control-md">
                </div>
                <div class="d-flex justify-content-center">
                <button type="submit" name="save_message" 
                class="btnsign btn btn-danger btn-block btn-lg gradient-custom-4 text-light text-uppercase">Sign up</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="footer p-2">
  <div class="footer-cols ">
    <ul>
      <li><a href="./faq.php">FAQ</a></li>
    </ul>
    <ul>
      <li><a href="./contact.php">Contact Us</a></li>
    </ul>
    <ul>
    <li><a href="./auth/home.php">BesTube Originals</a></li>
    </ul>
    <ul>
      <li><a href="#">Copyright 2022 BesTube <i class="fa-regular fa-copyright"></i></a></li>
   </ul>
  </div>
</footer>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>