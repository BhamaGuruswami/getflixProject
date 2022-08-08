<?php
session_start();
require 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice/Users</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- link font awesome icons -->
    <script src="https://kit.fontawesome.com/6c36406174.js" crossorigin="anonymous"></script>
    <!-- link css -->
    <link rel="stylesheet" href="../signin/home.css?v=<?php echo time(); ?>">
    <!-- <link rel="stylesheet" href="sign.css?v=<?php echo time(); ?>"> -->
    <!-- link icon in head -->
    <link rel="apple-touch-icon" type="image/png" sizes="16x16" href="../assets/ventilateur.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/ventilateur.png">

</head>
<body>
<div class="topnav container-fluid p-2">
    <a class="logo"  href="../index.php"><img src="../assets/ventilateur.png" width="30" alt="logo"> <b>BesTube</b></a>
  </div>

<div class="my-5 conatiner">
<?php include('message.php'); ?>
            <div class=" d-flex align-items-center justify-content-center">
                <div class="bg-white col-md-6 rounded-5">
                    <div class="p-4 rounded shadow-md ">
                    <div class="text-center-danger">
            <h4> Users Details
                    <!-- <a href="message-create.php" class="btn btn-primary float-end">Add Messages</a> -->
                </h4>
            </div>

                    <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM users";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $message)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $message['id']; ?></td>
                                        <td><?= $message['name']; ?></td>
                                        <td><?= $message['email']; ?></td>
                                        <td><?= $message['password']; ?></td>
                                        <td>
                                            <a href="message-edit.php?id=<?= $message['id']; ?>" class="btn btn-primary btn-sm">Update</a>
                                            <form action="code.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_message" value="<?=$message['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<h5> No Record Found </h5>";
                            }
                        ?>
                        
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        </div>

</form>













<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>

</body>
</html>