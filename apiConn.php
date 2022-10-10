<?php 
$API_key = 'AIzaSyADr5BLQb1yjMtHftZIhhUEj96FvESVLMM';
$youtubePL1 = 'PLW_c2xKfxEIrXT9uU39TE6l7p8C8DHX5J';
$category1 = "originals";
$youtubePL2 = 'PLW_c2xKfxEIqpPCrfw_twlTSWYiiwvnq-';
$category2 = "sport";
$youtubePL3= 'RDqWAqMzB31lQ';
$category3= "music";
$youtubePL4 = 'PL4WiRZw8bmXvAw7LyLC3LIuLDoagogZdb';
$category4 = "cooking";
$youtubePL5 = 'PLriZt3RmcI30iIudgKFINROyCK2Jmo4Z_';
$category5 = "movies";
$youtubePL6 = 'PLW_c2xKfxEIoV9Udl7Q9wzikc3P28d1X7';
$category6 = "videogame";
$maxResults = '15';

$apiError = 'Video not found';

//api connection playlist 0
try{
  $apiDataOriginals = @file_get_contents('https://www.googleapis.com/youtube/v3/playlistItems?part=snippet%2C+id&playlistId='.$youtubePL1.'&maxResults='.$maxResults.'&key='.$API_key.'');
  if($apiDataOriginals){
    $videolistOriginals = json_decode($apiDataOriginals);
  } else {
    throw new Exception('Invalid API key or channel ID.');
  }
} catch(Exception $e){
    $apiError = $e->getMessage();
  }

//api connection playlist 1
try{
  $apiData = @file_get_contents('https://www.googleapis.com/youtube/v3/playlistItems?part=snippet%2C+id&playlistId='.$youtubePL2.'&maxResults='.$maxResults.'&key='.$API_key.'');
  if($apiData){
    $videolistSport = json_decode($apiData);
  } else {
    throw new Exception('Invalid API key or channel ID.');
  }
} catch(Exception $e){
    $apiError = $e->getMessage();
  }


//api connection playlist 2
try{
    $apiDataMusic = @file_get_contents('https://www.googleapis.com/youtube/v3/playlistItems?part=snippet%2C+id&playlistId='.$youtubePL3.'&maxResults='.$maxResults.'&key='.$API_key.'');
    if($apiDataMusic){
      $videolistMusic = json_decode($apiDataMusic);
    } else {
      throw new Exception('Invalid API key or channel ID.');
    }
  } catch(Exception $e){
      $apiError = $e->getMessage();
    }

//api connection playlist 3
try{
  $apiDataCooking = @file_get_contents('https://www.googleapis.com/youtube/v3/playlistItems?part=snippet%2C+id&playlistId='.$youtubePL4.'&maxResults='.$maxResults.'&key='.$API_key.'');
  if($apiDataCooking){
    $videolistCooking = json_decode($apiDataCooking);
  } else {
    throw new Exception('Invalid API key or channel ID.');
  }
} catch(Exception $e){
    $apiError = $e->getMessage();
  }

//api connection playlist 4
try{
  $apiDataTrailer = @file_get_contents('https://www.googleapis.com/youtube/v3/playlistItems?part=snippet%2C+id&playlistId='.$youtubePL5.'&maxResults='.$maxResults.'&key='.$API_key.'');
  if($apiDataTrailer){
    $videolistTrailer = json_decode($apiDataTrailer);
  } else {
    throw new Exception('Invalid API key or channel ID.');
  }
} catch(Exception $e){
    $apiError = $e->getMessage();
  }

//api connection playlist 5
try{
  $apiDataGames = @file_get_contents('https://www.googleapis.com/youtube/v3/playlistItems?part=snippet%2C+id&playlistId='.$youtubePL6.'&maxResults='.$maxResults.'&key='.$API_key.'');
  if($apiDataGames){
    $videolistVideoGames = json_decode($apiDataGames);
  } else {
    throw new Exception('Invalid API key or channel ID.');
  }
} catch(Exception $e){
    $apiError = $e->getMessage();
  }
?>