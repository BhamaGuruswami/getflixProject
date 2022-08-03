 <?php
// require_once "config.php";
// if(!empty($_SESSION['id'])){
//     $id = $_SESSION['id'];
//     $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
//     $row = mysqli_fetch_assoc($result);
// } else{
//     header("Location: sign.php");
// }
 ?>

<?php 
  //Connection to youtube Data Api:
  include ('apiConn.php');

  //Function to insert images on the carousel:
  function insertImage($list, $x, $y){

    if(!empty($list->items)){
  
      for($x; $x<$y; $x++){
      
        if(isset($list->items[$x]->snippet->resourceId->videoId)){
?>
              
          <div class="item">
          <a id="linkphp" href="./auth/index.php?id=<?php echo $list->items[$x]->snippet->resourceId->videoId; ?>">
          <div class="card">
            
             <img width="85%" src="https://img.youtube.com/vi/<?php echo $list->items[$x]->snippet->resourceId->videoId; ?>/maxresdefault.jpg" class="card-img-top" alt="">></img>
            
            <div class="card-body">
            <p class="card-text" id="titleVideo"><?php echo $list->items[$x]->snippet->title; ?></p>
            </div> 
          </div>
          </a>
        </div> 
<?php
        }
      }

    }else{
      echo '<p class="error">'.$apiError.'</p>';
    }
  }  
?>

<!-- main page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>   
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- link css -->
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <!-- link icon in head -->
    <link rel="apple-touch-icon" type="image/png" sizes="16x16" href="../assets/ventilateur.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/ventilateur.png">
</head>
<body>

<!-- navbar -->
<div class="topnav">
  <a href="index.php"><img src="./assets/ventilateur.png" width="30" alt="logo"> <b>BesToBe</b></a>
  <a href="index.php">Home</a>
  <a href="./shows/movies.php">Movies</a>
  <a href="./shows/tvshows.php">Music</a>
  <div class="dropdown">
    <button class="dropbtn">Categories</button>
    <div class="dropdown-content">
      <a href="./shows/sport.php">Sport</a>
      <a href="./shows/cooking.php">Cooking</a>
      <a href="./shows/gaming.php">Gaming</a>

    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">My account</button>
    <div class="dropdown-content">
      <!-- <a href="sign.php">Log in</a> -->
      <a href="./logout.php">Log out</a>
    </div>
  </div>
  <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search..." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>

<!-- PROMO MAIN IMAGE -->
<div class="container1">
<img src="./assets/main.jpg" class="main img-fluid" alt="Responsive image">
<div class="centered carousel-caption"><h1 class="welcome text-light text-center"><u>Welcome <?php echo $row['name']; ?> </u></h1></div>
</div>

<!-- CAROUSEL 1 LARGE SCREEN  -->
<h4 class="title1">Sport</h4>
<div id="large" class="wrapper">
    <section id="section1">
    <a href="#section3" class="arrow__btn">‹</a>

<?php 
 insertImage($videolist, $startSect=0, $endSect=5);
?>

<a href="#section2" class="arrow__btn">›</a>
</section>
<section id="section2">
<a href="#section1" class="arrow__btn">‹</a>
<?php 
   insertImage($videolist, $startSect=5, $endSect=10);
?>

<a href="#section3" class="arrow__btn">›</a>
</section>
<section id="section3">
<a href="#section2" class="arrow__btn">‹</a>
<?php 
  insertImage($videolist, $startSect=10, $endSect=15);
?>

<a href="#section1" class="arrow__btn">›</a>
</section>
</div>

<!-- CAROUSEL 1 SMALL SCREEN  -->
<div id="small" class="wrapper">
<section id="sectionSmall1">
<a href="#sectionSmall3" class="arrow__btn">‹</a>

<?php 
  insertImage($videolist, $startSect=0, $endSect=2);
?>

<a href="#sectionSmall2" class="arrow__btn">›</a>
</section>
<section id="sectionSmall2">
<a href="#sectionSmall1" class="arrow__btn">‹</a>

<?php
    insertImage($videolist, $startSect=2, $endSect=4);
?>

<a href="#sectionSmall3" class="arrow__btn">›</a>
</section>
<section id="sectionSmall3">
<a href="#sectionSmall2" class="arrow__btn">‹</a>

<?php
  insertImage($videolist, $startSect=4, $endSect=6);
?>

<a href="#sectionSmall1" class="arrow__btn">›</a>
</section>
</div>
  
<!-- CAROUSEL 2 LARGE SCREEN-->
<h4 class="title1">Music</h4>
<div id="large" class="wrapper">
    <section id="sectionMusic1">
    <a href="#sectionMusic3" class="arrow__btn">‹</a>

<?php 
 insertImage($videolistMusic, $startSect=0, $endSect=5);
?>

<a href="#sectionMusic2" class="arrow__btn">›</a>
</section>
<section id="sectionMusic2">
<a href="#sectionMusic1" class="arrow__btn">‹</a>
<?php 
   insertImage($videolistMusic, $startSect=5, $endSect=10);
?>

<a href="#sectionMusic3" class="arrow__btn">›</a>
</section>
<section id="sectionMusic3">
<a href="#sectionMusic2" class="arrow__btn">‹</a>
<?php 
  insertImage($videolistMusic, $startSect=10, $endSect=15);
?>

<a href="#sectionMusic1" class="arrow__btn">›</a>
</section>
</div>

<!-- CAROUSEL 2 SMALL SCREEN  -->
<div id="small" class="wrapper">
<section id="sectionSmallMusic1">
<a href="#sectionSmallMusic3" class="arrow__btn">‹</a>

<?php 
  insertImage($videolistMusic, $startSect=0, $endSect=2);
?>

<a href="#sectionSmallMusic2" class="arrow__btn">›</a>
</section>
<section id="sectionSmallMusic2">
<a href="#sectionSmallMusic1" class="arrow__btn">‹</a>

<?php
    insertImage($videolistMusic, $startSect=2, $endSect=4);
?>

<a href="#sectionSmallMusic3" class="arrow__btn">›</a>
</section>
<section id="sectionSmallMusic3">
<a href="#sectionSmallMusic2" class="arrow__btn">‹</a>

<?php
  insertImage($videolistMusic, $startSect=4, $endSect=6);
?>

<a href="#sectionSmallMusic1" class="arrow__btn">›</a>
</section>
</div>

<!-- CAROUSEL 3 LARGE SCREEN-->
<h4 class="title1">Cooking</h4>
<div id="large" class="wrapper">
    <section id="sectionCooking1">
    <a href="#sectionCooking3" class="arrow__btn">‹</a>

<?php 
 insertImage($videolistCooking, $startSect=0, $endSect=5);
?>

<a href="#sectionCooking2" class="arrow__btn">›</a>
</section>
<section id="sectionCooking2">
<a href="#sectionCooking1" class="arrow__btn">‹</a>
<?php 
   insertImage($videolistCooking, $startSect=5, $endSect=10);
?>

<a href="#sectionCooking3" class="arrow__btn">›</a>
</section>
<section id="sectionCooking3">
<a href="#sectionCooking2" class="arrow__btn">‹</a>
<?php 
  insertImage($videolistCooking, $startSect=10, $endSect=15);
?>

<a href="#sectionCooking1" class="arrow__btn">›</a>
</section>
</div>

<!-- CAROUSEL 3 SMALL SCREEN  -->
<div id="small" class="wrapper">
<section id="sectionSmallCooking1">
<a href="#sectionSmallCooking3" class="arrow__btn">‹</a>

<?php 
  insertImage($videolistCooking, $startSect=0, $endSect=2);
?>

<a href="#sectionSmallCooking2" class="arrow__btn">›</a>
</section>
<section id="sectionSmallCooking2">
<a href="#sectionSmallCooking1" class="arrow__btn">‹</a>

<?php
    insertImage($videolistCooking, $startSect=2, $endSect=4);
?>

<a href="#sectionSmallCooking3" class="arrow__btn">›</a>
</section>
<section id="sectionSmallCooking3">
<a href="#sectionSmallCooking2" class="arrow__btn">‹</a>

<?php
  insertImage($videolistCooking, $startSect=4, $endSect=6);
?>

<a href="#sectionSmallCooking1" class="arrow__btn">›</a>
</section>
</div>

<!-- CAROUSEL 4 LARGE SCREEN-->
<h4 class="title1">Movies</h4>
<div id="large" class="wrapper">
    <section id="sectionTrailer1">
    <a href="#sectionTrailer3" class="arrow__btn">‹</a>

<?php 
 insertImage($videolistTrailer, $startSect=0, $endSect=5);
?>

<a href="#sectionTrailer2" class="arrow__btn">›</a>
</section>
<section id="sectionTrailer2">
<a href="#sectionTrailer1" class="arrow__btn">‹</a>
<?php 
   insertImage($videolistTrailer, $startSect=5, $endSect=10);
?>

<a href="#sectionTrailer3" class="arrow__btn">›</a>
</section>
<section id="sectionTrailer3">
<a href="#sectionTrailer2" class="arrow__btn">‹</a>
<?php 
  insertImage($videolistTrailer, $startSect=10, $endSect=15);
?>

<a href="#sectionTrailer1" class="arrow__btn">›</a>
</section>
</div>

<!-- CAROUSEL 4 SMALL SCREEN  -->
<div id="small" class="wrapper">
<section id="sectionSmallTrailer1">
<a href="#sectionSmallTrailer3" class="arrow__btn">‹</a>

<?php 
  insertImage($videolistTrailer, $startSect=0, $endSect=2);
?>

<a href="#sectionSmallTrailer2" class="arrow__btn">›</a>
</section>
<section id="sectionSmallTrailer2">
<a href="#sectionSmallTrailer1" class="arrow__btn">‹</a>

<?php
    insertImage($videolistTrailer, $startSect=2, $endSect=4);
?>

<a href="#sectionSmallTrailer3" class="arrow__btn">›</a>
</section>
<section id="sectionSmallTrailer3">
<a href="#sectionSmallTrailer2" class="arrow__btn">‹</a>

<?php
  insertImage($videolistTrailer, $startSect=4, $endSect=6);
?>

<a href="#sectionSmallTrailer1" class="arrow__btn">›</a>
</section>
</div>

<!-- CAROUSEL 5 LARGE SCREEN-->
<h4 class="title1">Video Games</h4>
<div id="large" class="wrapper">
    <section id="sectionGames1">
    <a href="#sectionGames3" class="arrow__btn">‹</a>

<?php 
 insertImage($videolistVideoGames, $startSect=0, $endSect=5);
?>

<a href="#sectionGames2" class="arrow__btn">›</a>
</section>
<section id="sectionGames2">
<a href="#sectionGames1" class="arrow__btn">‹</a>
<?php 
   insertImage($videolistVideoGames, $startSect=5, $endSect=10);
?>

<a href="#sectionGames3" class="arrow__btn">›</a>
</section>
<section id="sectionGames3">
<a href="#sectionGames2" class="arrow__btn">‹</a>
<?php 
  insertImage($videolistVideoGames, $startSect=10, $endSect=15);
?>

<a href="#sectionGames1" class="arrow__btn">›</a>
</section>
</div>

<!-- CAROUSEL 5 SMALL SCREEN  -->
<div id="small" class="wrapper">
<section id="sectionSmallGames1">
<a href="#sectionSmallGames3" class="arrow__btn">‹</a>

<?php 
  insertImage($videolistVideoGames, $startSect=0, $endSect=2);
?>

<a href="#sectionSmallGames2" class="arrow__btn">›</a>
</section>
<section id="sectionSmallGames2">
<a href="#sectionSmallGames1" class="arrow__btn">‹</a>

<?php
    insertImage($videolistVideoGames, $startSect=2, $endSect=4);
?>

<a href="#sectionSmallGames3" class="arrow__btn">›</a>
</section>
<section id="sectionSmallGames3">
<a href="#sectionSmallGames2" class="arrow__btn">‹</a>

<?php
  insertImage($videolistVideoGames, $startSect=4, $endSect=6);
?>

<a href="#sectionSmallGames1" class="arrow__btn">›</a>
</section>
</div>

<footer class="footer p-2">
  <p>Any questions? Contact us 1-866-579-7172</p>
  <div class="footer-cols">
    <ul>
      <li><a href="#">FAQ</a></li>
      <li><a href="#">Ways To Watch</a></li>
      <li><a href="#">Getflix Originals</a></li>
    </ul>
    <ul>
      <li><a href="#">Help Center</a></li>
      <li><a href="#">Terms Of Use</a></li>
      <li><a href="#">Contact Us</a></li>
    </ul>
    <ul>
      <li><a href="#">Account</a></li>
      <li><a href="#">Privacy</a></li>
      <li><a href="#">Speed Test</a></li>
    </ul>
    <ul>
      <li><a href="#">Media Center</a></li>
      <li><a href="#">Cookie Preferences</a></li>
      <li><a href="#">Legal Notices</a></li>
    </ul>
  </div>
</footer>
<!-- link script js -->
<script src="myscript.js"></script>
</body>
</html>