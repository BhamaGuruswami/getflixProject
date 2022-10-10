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
    <title>message</title>
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
    <link rel="stylesheet" href="../home.css">
  <link rel="stylesheet" href="../style.css">

</head>
<body>
<div class="my-5 conatiner">
<?php include('message.php'); ?>
            <div class="text-center">
            <h4>Message Edit 
                    <a href="index.php" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
            <?php
                if(isset($_GET['id']))
                {
                    $message_id = mysqli_real_escape_string($con, $_GET['id']);
                    $query = "SELECT * FROM messages WHERE id='$message_id' ";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $message = mysqli_fetch_array($query_run);
                        ?>

            <div class="d-flex align-items-center justify-content-center">
                <div class="bg-white col-md-6 rounded-5">
                    <div class="p-4 rounded shadow-md ">
                    <form action="code.php" method="POST">
                    <input type="hidden" name="student_id" value="<?= $message['id']; ?>">

                        <div >
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" name="name" class="form-control" value="<?=$message['name'];?>"placeholder="Your Name" required>
                        </div>
                        <div class="mt-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="text" name="email" class="form-control" value="<?=$message['email'];?>" placeholder="Your Email" required>
                        </div class="mt-3">
                        <div class="mt-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" name="subject" class="form-control" value="<?=$message['subject'];?>"
                        placeholder="Subject" required>
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea name="message" cols="20" rows="6" class="form-control"
                            value="<?=$message['message'];?>"  placeholder="Message"></textarea>
                        </div>
                        <button type="submit" name="update_message" class="btn btn-primary">
                                    Update Message
                                </button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </form>
        <?php
                    }
                    else
                    {
                        echo "<h4>No Such Id Found</h4>";
                    }
                }
                ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>

</body>
</html>