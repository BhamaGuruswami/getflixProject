
<?php
session_start();
require "./contact_backoffice/code.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6c36406174.js" crossorigin="anonymous"></script>
    <!-- link css -->
    <link rel="stylesheet" href="./signin/home.css?v=<?php echo time(); ?>">
    <!-- link icon in head -->
    <link rel="apple-touch-icon" type="image/png" sizes="16x16" href="../assets/ventilateur.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/ventilateur.png">
  </head>

<body>
   <!-- navbar -->
   <div class="topnav container-fluid p-2">
    <a class="logo"  href="index.php"><img src="./assets/ventilateur.png" width="30" alt="logo"> <b>BesTube</b></a>
    <!-- <a  class="p-3 split" style="background-color: transparent; color: #fff;" href="./auth/home.php">Home</a> -->
    <a href="./auth/home.php" class="split">Home</a>
  </div>

<div class="my-5 conatiner">
<?php include('./contact_backoffice/message.php'); ?>
            <div class="text-center">
                <h3 class="text-light mb-5">How Can We Help You?</h3>
            </div>
              <div class=" d-flex align-items-center justify-content-center">
                <div class="bg-white col-md-6 rounded-2">
                  <div class="p-4 rounded shadow-md ">
                    <form action="./contact_backoffice/code.php" method="POST">
                      <div>
                        <label for="name" class="form-label">Enter your name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                      </div>
                      <div class="mt-3">
                        <label for="email" class="form-label">Enter your email</label>
                        <input type="text" name="email" class="form-control" placeholder="Email address" required>
                      </div class="mt-3">
                      <div class="mt-3">
                          <label for="subject" class="form-label">Subject</label>
                          <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                      </div>
                      <div class="mt-3 mb-3">
                          <label for="message" class="form-label">Message</label>
                          <textarea name="message" cols="20" rows="6" class="form-control"
                                placeholder="Leave your message here"></textarea>
                      </div>
                          <button type="submit" name="save_message" class="btn btn-danger">
                            Send
                          </button>
                   </div>
                   </form>
                 </div>
                </div>
              </div>
</div>



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
    <li>2022 BesTube <i class="fa-regular fa-copyright"></i></li>
   </ul>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>