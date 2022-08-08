<?php
// session_start();
require 'dbcon.php';

if(isset($_POST['delete_message']))
{
    $message_id = mysqli_real_escape_string($con, $_POST['delete_message']);

    $query = "DELETE FROM messages WHERE id='$message_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Message Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Message Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_message']))
{
    $message_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    $query = "UPDATE messages SET name='$name', email='$email',subject='$subject', message='$message' WHERE id='$message_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Message Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Message Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_message']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    $query = "INSERT INTO messages (name,email,subject,message) VALUES ('$name','$email','$subject','$message')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Message Created Successfully";
                //  header("Location: message-create.php");
        header("Location: ../contact.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Message Not Created";
        // header("Location: message-create.php");
        header("Location:../contact.php");
        exit(0);
    }
}

?>
