<?php
include "adminConn.php";
//Connection to users table
require_once "config.php";
if(!empty($_SESSION['id'])){
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);
} else{
    header("Location: ./signin/sign.php");
}

$background = 0;

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
      <img width="85%" src="https://img.youtube.com/vi/<?php echo $list->items[$x]->snippet->resourceId->videoId; ?>/maxresdefault.jpg" class="card-img-top" alt="video">></img>
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
  <!-- link font awesome icons -->
  <script src="https://kit.fontawesome.com/6c36406174.js" crossorigin="anonymous"></script>
  <!-- link bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <!-- link css -->
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
  <!-- link icon in head -->
  <link rel="apple-touch-icon" type="image/png" sizes="16x16" href="../assets/ventilateur.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/ventilateur.png">
</head>
<body>
<!-- navbar -->
<div class="topnav">
  <a class="topnavlogo" href="index.php"><img src="./assets/ventilateur.png" width="30" alt="logo"> <b>BesTube</b></a>
  <a class="topnavhome" href="index.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Categories</button>
    <div class="dropdown-content">
      <a href="#originals">Originals</a>
      <a href="#sport">Sport</a>
      <a href="#music">Music</a>
      <a href="#cooking">Cooking</a>
      <a href="#movies">Movies</a>
      <a href="#games">Gaming</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">My account</button>
    <div class="dropdown-content">
      <a href="./logout.php">Log out</a>
    </div>
  </div>
  <span class="welcome text-light text-center mx-3"><b>Welcome <?php echo $row['name']; ?></b></span>
  <div class="search-container">
    <form action="" method="post">

      <input type="text" name="search" placeholder="Search..." name="search">
      <button name="submitSearch" type="submit"><i class="fa fa-search"></i></button>

    </form>
  </div>
</div>

<?php
include_once('search.php');
?>

<!-- Main image -->
<?php 
if($background==0){
  ?>
<div class="container1">
<img src="./assets/background.png" class="main img-fluid" alt="Responsive image">
<div class="centered carousel-caption" style="top:56% !important; left:28% !important;padding-left: 7%;" ><h2>Watch our selection of the best videos on Youtube</h2></div>
</div>
<?php
}
?>

<!-- CAROUSEL 1 LARGE SCREEN  -->
<h3 class="title1 pt-4" id="originals"><a href="./shows/movies.php?id=<?php echo $youtubePL1; ?>">Originals</a></h3>
<div id="large" class="wrapper">
  <section id="sectionOriginals1">
    <a href="#sectionOriginals3" class="arrow__btn">‹</a>
<?php 
 insertImage($videolistOriginals, $startSect=0, $endSect=5);
?>
<a href="#sectionOriginals2" class="arrow__btn">›</a>
</section>
<section id="sectionOriginals2">
<a href="#sectionOriginals1" class="arrow__btn">‹</a>
<?php 
   insertImage($videolistOriginals, $startSect=5, $endSect=10);
?>
<a href="#sectionOriginals3" class="arrow__btn">›</a>
</section>
<section id="sectionOriginals3">
<a href="#sectionOriginals2" class="arrow__btn">‹</a>
<?php 
  insertImage($videolistOriginals, $startSect=10, $endSect=15);
?>
<a href="#sectionOriginals1" class="arrow__btn">›</a>
</section>
</div>

<!-- CAROUSEL 1 SMALL SCREEN  -->
<div id="small" class="wrapper">
<section id="sectionSmallOrignals1">
<a href="#sectionSmallOriginals3" class="arrow__btn">‹</a>
<?php 
  insertImage($videolistOriginals, $startSect=0, $endSect=2);
?>
<a href="#sectionSmallOriginals2" class="arrow__btn">›</a>
</section>
<section id="sectionSmallOriginals2">
<a href="#sectionSmallOriginals1" class="arrow__btn">‹</a>
<?php
    insertImage($videolistOriginals, $startSect=2, $endSect=4);
?>
<a href="#sectionSmallOriginals3" class="arrow__btn">›</a>
</section>
<section id="sectionSmallOriginals3">
<a href="#sectionSmallOriginals2" class="arrow__btn">‹</a>
<?php
  insertImage($videolistOriginals, $startSect=4, $endSect=6);
?>
<a href="#sectionSmallOriginals1" class="arrow__btn">›</a>
</section>
</div>

<!-- CAROUSEL 2 LARGE SCREEN  -->
<h3 class="title1 pt-4" id="sport"><a href="./shows/movies.php?id=<?php echo $youtubePL2; ?>">Sport</a></h3>
<div id="large" class="wrapper">
  <section id="section1">
    <a href="#section3" class="arrow__btn">‹</a>
<?php 
 insertImage($videolistSport, $startSect=0, $endSect=5);
?>
<a href="#section2" class="arrow__btn">›</a>
</section>
<section id="section2">
<a href="#section1" class="arrow__btn">‹</a>
<?php 
   insertImage($videolistSport, $startSect=5, $endSect=10);
?>
<a href="#section3" class="arrow__btn">›</a>
</section>
<section id="section3">
<a href="#section2" class="arrow__btn">‹</a>
<?php 
  insertImage($videolistSport, $startSect=10, $endSect=15);
?>
<a href="#section1" class="arrow__btn">›</a>
</section>
</div>

<!-- CAROUSEL 2 SMALL SCREEN  -->
<div id="small" class="wrapper">
<section id="sectionSmall1">
<a href="#sectionSmall3" class="arrow__btn">‹</a>
<?php 
  insertImage($videolistSport, $startSect=0, $endSect=2);
?>
<a href="#sectionSmall2" class="arrow__btn">›</a>
</section>
<section id="sectionSmall2">
<a href="#sectionSmall1" class="arrow__btn">‹</a>
<?php
    insertImage($videolistSport, $startSect=2, $endSect=4);
?>
<a href="#sectionSmall3" class="arrow__btn">›</a>
</section>
<section id="sectionSmall3">
<a href="#sectionSmall2" class="arrow__btn">‹</a>
<?php
  insertImage($videolistSport, $startSect=4, $endSect=6);
?>
<a href="#sectionSmall1" class="arrow__btn">›</a>
</section>
</div>
<!-- CAROUSEL 3 LARGE SCREEN-->
<h3 class="title1" id="music"><a href="./shows/movies.php?id=<?php echo $youtubePL3; ?>">Music</a></h3>
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

<!-- CAROUSEL 3 SMALL SCREEN  -->
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

<!-- CAROUSEL 4 LARGE SCREEN-->
<h3 class="title1" id="cooking"><a href="./shows/movies.php?id=<?php echo $youtubePL4; ?>">Cooking</a></h3>
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

<!-- CAROUSEL 4 SMALL SCREEN  -->
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

<!-- CAROUSEL 5 LARGE SCREEN-->
<h3 class="title1" id="movies"><a href="./shows/movies.php?id=<?php echo $youtubePL5; ?>">Movies</a></h3>
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

<!-- CAROUSEL 5 SMALL SCREEN  -->
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

<!-- CAROUSEL 6 LARGE SCREEN-->
<h3 class="title1" id="games"><a href="./shows/movies.php?id=<?php echo $youtubePL6; ?>">Gaming</a></h3>
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

<!-- CAROUSEL 6 SMALL SCREEN  -->
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

<!-- footer -->
<footer class="footer p-2 pt-3 mt-5">
  <div class="footer-cols">
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
    <li>2022 BesTube <i class="fa-regular fa-copyright"></i>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="button" class="btn btn-dark ms-5" data-bs-toggle="modal" data-bs-target="#admin" id="puzzle"><i class="fa fa-puzzle-piece"></i></button></li>
  </ul>
  </div>
 <!-- Modal -->
<div class="modal fade" id="admin" tabindex="-1" aria-labelledby="Admin Form" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="myform bg-dark">
            <h1 class="text-center">Login Admin</h1>
            <form action="" method="POST">
                  <div class="mb-3 mt-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="userAdmin" class="form-control" id="usernameAdmin" aria-describedby="username admin">
                </div>
                <div class="mb-3">
                    <label for="password"  class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="passwordAdmin">
                </div>
                <button type="submit" name="login" class="btn btn-light mt-3">LOGIN</button>               
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
</footer>
<!-- link script js -->
</body>
</html>