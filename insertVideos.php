<?php
//include connection to API
include ('apiConn.php');

// function to insert into the database all the videos 
function insertDB($list, $category){
      
      if(!empty($list->items)){

          for($x=0; $x<50; $x++){
              
                if(isset($list->items[$x]->snippet->resourceId->videoId)){

                  //INCLUDE CONNECTION TO DATABASE
                  include ('config.php');

              $title = filter_var($list->items[$x]->snippet->title, FILTER_SANITIZE_STRING);
              $videoID = filter_var($list->items[$x]->snippet->resourceId->videoId, FILTER_SANITIZE_STRING);
              $categoryName = filter_var($category, FILTER_SANITIZE_STRING);

          
        $sql = "INSERT IGNORE INTO videos (id, name, category)
                VALUES ('$videoID','$title', '$categoryName')";

                
             if (mysqli_query($conn, $sql)) {
               
            header("location: backoffice.php");
                      
             } else {
             echo "Error: " . $sql . ":-" . mysqli_error($conn);
             }
            

           }
          
      }
      mysqli_close($conn);

  
   }else{
      echo '<p class="error">'.$apiError.'</p>';
   }
}


if (isset($_POST['update'])){
   insertDB($videolist, $category1);
   insertDB($videolistMusic, $category2);
   insertDB($videolistCooking, $category3);
   insertDB($videolistTrailer, $category4);
   insertDB($videolistVideoGames, $category5);
}

?>