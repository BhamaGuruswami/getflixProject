<?php
date_default_timezone_set('Europe/Paris');
include_once('config.php');
include_once('comments.inc.home.php');
session_start();
?>
<?php
// link Youtube API
$videoID= '9tbxDgcv74c' ;
$API_key = 'AIzaSyADr5BLQb1yjMtHftZIhhUEj96FvESVLMM';

$apiError = 'Video not found';
try{
  $apiData = @file_get_contents('https://www.googleapis.com/youtube/v3/videos?id='.$videoID.'&key='.$API_key.'&part=snippet');
  if($apiData){
    $videolist = json_decode($apiData);
  } else {
    throw new Exception('Invalid API key or channel ID.');
  }
} catch(Exception $e){
    $apiError = $e->getMessage();
  }
?>

<!-- video comments page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link to css -->
    <!-- <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="../home.css"> -->
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../signin/home.css?v=<?php echo time(); ?>">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- link -->
    <script src="https://kit.fontawesome.com/6c36406174.js" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- link icon image -->
    <link rel="apple-touch-icon" type="image/png" sizes="16x16" href="../assets/ventilateur.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/ventilateur.png">
    <title>Default Player</title>
</head>
    <body>
    <!-- navbar -->
    <div class="topnav p-2">
    <a class="logo" href="../index.php"><img src="../assets/ventilateur.png" width="30" alt="logo"> <b>BesTube</b></a>
    <a href="../signin/sign.php" class="split">Log in</a>
    </div>
  <!-- video -->
  <h3 class="text-light text-center mb-2">Deep Sea Nuke</h3>
    <div class="video" id="player">
        <iframe src="https://www.youtube.com/embed/9tbxDgcv74c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
<!-- description -->
<div class="accordion accordion-flush mx-5 mb-4" id="accordionFlushExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingOne">
        <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Description
        </button>
      </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body bg-dark text-light"><?php echo $videolist->items[0]->snippet->description; ?></div>
    <!-- </div> -->
    </div>
  </div>
<!-- login logout -->
<?php
    echo "<form class='mt-4 text-light' method='POST' action='".getLogin($pdo)."'>
        <span class='mx-1'> Log in here</span><br>
        <label for='username'></label>
        <input type='text' name='name' required value='' placeholder='Name'>
        <label for='password'></label>
        <input type='password' name='password' required value='' placeholder='Password'><br>
        <button type='submit' name='loginSubmit' class='buttonlogin mx-1'>Log in</button>
    </form>";
    echo "<form method='POST' action='".userLogout()."'>
        <button type='submit' name='logoutSubmit' class='buttonlogout'>Log out</button>
    </form>";

    if(isset($_SESSION['id'])){
        echo "<br><span class='mx-5'>  </span>";
    } else{
        echo " ";
    }
?>
<!-- comments section -->
<?php
    if(isset($_SESSION['id'])){
        echo " ";
        echo "<form method='POST' action='".setComments($pdo)."'>
        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
        <input type='hidden' name='name' value='".$_SESSION['id']."'>
        <textarea name='message' id='message' required value='' placeholder='Leave your message here'></textarea><br>
        <button type='submit' name='commentSubmit' class='buttoncomment'>Comment</button>
        <br><span class='messagestext text-light'>Messages</span>
    </form>";
    } else{
        echo "<br>" . "<span class='account text-light mx-5'><i>You need an account to comment!</i></span><br><span class='messagestext text-light'> </span>";
    }

    getComments($pdo);
?>
</div>
<!-- footer -->
<footer class="footer p-2 mt-5">
  <div class="footer-cols">
    <ul>
        <li><a href="../faq.php">FAQ</a></li>
    </ul>
    <ul>
        <li><a href="../contact.php">Contact Us</a></li>
    </ul>
    <ul>
        <li><a href="home.php">BesTube Originals</a></li>
    </ul>
    <ul>
        <li>2022 BesTube <i class="fa-regular fa-copyright"></i></li>
   </ul>
  </div>
</footer>

</body>
</html>