<?php
$youtubePL1 = 'PLW_c2xKfxEIqpPCrfw_twlTSWYiiwvnq-';
$category1 = "Sport";
$youtubePL2= 'RDqWAqMzB31lQ';
$category2= "Music";
$youtubePL3 = 'PL4WiRZw8bmXvAw7LyLC3LIuLDoagogZdb';
$category3 = "Cooking";
$youtubePL4 = 'PLriZt3RmcI30iIudgKFINROyCK2Jmo4Z_';
$category4 = "Movies";
$youtubePL5 = 'PLW_c2xKfxEIoV9Udl7Q9wzikc3P28d1X7';
$category5 = "Videogame";

$API_key = 'AIzaSyADr5BLQb1yjMtHftZIhhUEj96FvESVLMM';
$channelID = $_GET['id'];
$maxResults = '50';

$apiError = 'Video not found';
try{
  $apiData = @file_get_contents('https://www.googleapis.com/youtube/v3/playlistItems?part=snippet%2C+id&playlistId='.$channelID.'&maxResults='.$maxResults.'&key='.$API_key.'');
  if($apiData){
    $videolist = json_decode($apiData);
  } else {
    throw new Exception('Invalid API key or channel ID.');
  }
} catch(Exception $e){
    $apiError = $e->getMessage();
  }


  $category = '';
  
  if ($channelID == $youtubePL1){
    $category = $category1;
  } 
  elseif ($channelID == $youtubePL2){
    $category = $category2;
  }
  elseif ($channelID == $youtubePL3){
    $category = $category3;
  }
  elseif ($channelID == $youtubePL4){
    $category = $category4;
  }
  elseif ($channelID == $youtubePL5){
    $category = $category5;
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <!-- <link rel="stylesheet" href="shows.css"> -->
    <link rel="stylesheet" href="shows.css?v=<?php echo time(); ?>">
    <!-- link icon in head -->
    <link rel="apple-touch-icon" type="image/png" sizes="16x16" href="./assets/ventilateur.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/ventilateur.png">
    <title><?php echo $category;?></title>
</head>
<body>
    <!-- navbar -->
<div class="topnav">
  <a href="../index.php"><img src="../assets/ventilateur.png" width="30" alt="logo"> <b>BesTube</b></a>
  <a href="../index.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Categories</button>
    <div class="dropdown-content">
      <a href="movies.php?id=<?php echo $youtubePL1;?>">Sport</a>
      <a href="movies.php?id=<?php echo $youtubePL2;?>">Music</a>
      <a href="movies.php?id=<?php echo $youtubePL3;?>">Cooking</a>
      <a href="movies.php?id=<?php echo $youtubePL4;?>">Movies</a>
      <a href="movies.php?id=<?php echo $youtubePL5;?>">Gaming</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">My account</button>
    <div class="dropdown-content">
      <!-- <a href="sign.php">Log in</a> -->
      <a href="../logout.php">Log out</a>
    </div>
  </div>
  <div class="search-container">
    <form action="" method="post">
      <input type="text" name="search" style="width: 300px;" placeholder="Search in <?php echo $category;?>..." name="search">
      <button name="submitSearch" type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>

<?php
include_once('../searchCateg.php');
?>

<div  class="container">
<div class='containervideo'>
<div class="row justify-content-around">

  <?php
  if(!empty($videolist->items)){
    foreach($videolist->items as $item){
      if(isset($item->snippet->resourceId->videoId)){
        ?>
        
        
        <a id="linkphp" href="../auth/index.php?id=<?php echo $item->snippet->resourceId->videoId; ?>">
        <div class="card my-5">
        <img width="85%" src="https://img.youtube.com/vi/<?php echo $item->snippet->resourceId->videoId; ?>/maxresdefault.jpg" class="card-img-top" alt=""></img>
        <div class="card-body" style="background-color:#eae9e7;">
        <h5 class="card-text" id="titleVideo"><?php echo $item->snippet->title; ?></h5>
        </div>
        </div>
        </a>
      
       <?php
      }
    }
  } else{
    echo '<p class="error">'.$apiError.'</p>';
  }
  ?>
</div>
</div>
</div>

<footer class="footer p-2 pt-3 mt-5">
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
</body>
</html>