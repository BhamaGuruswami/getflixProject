<?php 
  //Connection to youtube Data Api:
  include ('apiConn.php');

  //Connect to database
  include ('insertVideos.php');
 

//Function to insert videos'data on the table:
    function insertTable($list, $category){
      
        if(!empty($list->items)){
  
            for($x=0; $x<50; $x++){
                
                  if(isset($list->items[$x]->snippet->resourceId->videoId)){
          
                echo "<tr>";
                echo '<td>'.$list->items[$x]->snippet->publishedAt.'</td>';
                echo '<td>'.$list->items[$x]->snippet->title.'</td>';
                echo '<td>'.$list->items[$x]->snippet->resourceId->videoId.'</td>';
                echo '<td>'.$category.'</td>';

                ?>
                <!-- <td class="btn btn-danger">Delete</td> -->
                </tr>
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
    <title>Backoffice</title>   
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- link css -->
    <link rel="stylesheet" href="./signin/home.css?v=<?php echo time(); ?>">
    <!-- font awesome icons -->
    <script src="https://kit.fontawesome.com/6c36406174.js" crossorigin="anonymous"></script>
    <!-- link icon in head -->
    <link rel="apple-touch-icon" type="image/png" sizes="16x16" href="../assets/ventilateur.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/ventilateur.png">
</head>
<body>

<!-- navbar -->
<div class="topnav container-fluid p-2">
    <a class="logo"  href="index.php"><img src="./assets/ventilateur.png" width="30" alt="logo"> <b>BesTube</b></a>
    <a href="./user_backoffice/index.php" class="split">Users</a>
    <a href="./contact_backoffice/index.php" class="split">Messages</a>
  </div>

<div class="container mb-5">
        <form action="" method="POST" class="p-5">
         <button type="submit" name="update" class="btn btn-outline-danger">Update Database</button>
  </form>
        <div class="row justify-content-center">
        <table class="table table-hover table-light table-striped">
        <thead>
            <tr>


                <th scope="col">Date</th>
                <th scope="col">Title</th>
                <th scope="col">Video ID</th>
                <th scope="col">Category</th>
                <!-- <th scope="col">Delete</th> -->
            </tr>
        </thead>
        <tbody>
           <?php
           insertTable($videolist, $category1);
           insertTable($videolistMusic, $category2);
           insertTable($videolistCooking, $category3);
           insertTable($videolistTrailer, $category4);
           insertTable($videolistVideoGames, $category5);
            ?>
      </table>
    </div>
        </div>




        <footer class="footer p-2">
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
                <li>2022 BesTube <i class="fa-regular fa-copyright"></i></li>
                </ul>
            </div>
        </footer>
<!-- link script js -->
</body>
</html>