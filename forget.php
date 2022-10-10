<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forget password</title>
  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- link css same as home -->
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="sign.css">
  <script src="https://kit.fontawesome.com/6c36406174.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="apple-touch-icon" type="image/png" sizes="16x16" href="./assets/ventilateur.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/ventilateur.png">
</head>

<body>
  <!-- navbar -->
  <div class="topnav">
    <a href="#home"><img src="./assets/ventilateur.png" width="30" alt="logo"> <b>YesToBe</b></a>
    <!-- <a href="#" class="split">Log in</a> -->
  </div>
</div>

  <section class="vh-50 mt-5 mb-5">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                <!-- <h2 class="text-uppercase text-center mb-5">Recover your password</h2> -->


                <form action="forget.php" method="post">
                <h2 class="text-uppercase text-center mb-5">Recover your password</h2>
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Email address</label>
                    <input type="email" id="form2Example1" name="email_forget " class="form-control" />
                  </div>
                  <!-- Submit button -->
                  <div class="text-center">
                  <button type="submit" class="btnlogin btn btn-success btn-block mb-4" name ="login-btn">Log in</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

  </section>

  <footer class="footer">
    <p>Questions? Call 1-866-579-7172</p>
    <div class="footer-cols">
      <ul>
        <li><a href="#">FAQ</a></li>
        <li><a href="#">Investor Relations</a></li>
        
      </ul>
      <ul>
        <li><a href="#">Help Center</a></li>
        <li><a href="#">Jobs</a></li>
        
      </ul>
      <ul>
        <li><a href="#">Privacy</a></li>
        <li><a href="#">Speed Test</a></li>
      </ul>
      <ul>
        <li><a href="#">Cookie Preferences</a></li>
        <li><a href="#">Legal Notices</a></li>
      </ul>
    </div>

  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>

</body>
</html>