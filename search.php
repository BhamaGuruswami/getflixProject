<!-- php for the searchbar -->
<?php

  include_once('config.php');

if (isset($_POST['submitSearch'])) {

  //change background in the main page
  $background = 1;

  $search = filter_var($_POST['search'], FILTER_SANITIZE_STRING);
  
  $sql = "SELECT * FROM videos WHERE name LIKE '%".$search."%'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0){

    ?>
    <div  class="container">  
    <div class='containervideo'>
    <div class="row justify-content-around">
<?php
    
    while($row = $result->fetch_assoc() ){
?>    

  <a id="linkphp" href="./auth/index.php?id=<?php echo $row["id"]; ?> ">
    <div class="card my-5">        
      <iframe src="https://www.youtube.com/embed/<?php echo $row["id"]; ?>  "title="YouTube video" allowfullscreen frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
        <div class="card-body" style="background-color:#eae9e7;">
          <p class="card-text" id="titleVideo"><?php echo $row["name"]; ?> </p>
        </div> 
    </div>
  </a>

<?php
     }
?>

  </div>
  </div>
  </div>
   <hr style="border-top: 1px solid white;"> 

<?php
  } else {
    $background = 0;
?>    
  <div class="alert alert-light m-5 alert-dismissible fade show" role="alert">
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 

<?php
    echo "<strong>0 records</strong>";
?>
    </div>
<?php
  }

}
                                
$conn->close();

?>
