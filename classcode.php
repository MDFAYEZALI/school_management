<?php
session_start();
require 'dbconnect.php';

if(isset($_POST['save_class']))
{
    $cid = mysqli_real_escape_string($con, $_POST['CLASS_ID']);
    $cname = mysqli_real_escape_string($con, $_POST['CLASS_NAME']);

    $query = "INSERT INTO class (CLASS_ID,CLASS_NAME) VALUES 
        ('$cid','$cname')";

    $query_run = mysqli_query($con,$query); 
    if($query_run)
    {
        $_SESSION['message'] = "Class Created Successfully";
        header("Location: class_create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Class Not Created";
        header("Location: class_create.php");
        exit(0);
    }

}

?>