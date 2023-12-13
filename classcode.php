<?php
session_start();
require 'dbconnect.php';

if(isset($_POST['delete_class']))
{
    $cid = mysqli_real_escape_string($con,$_POST['delete_class']);

    $query = "DELETE FROM class WHERE CLASS_ID='$cid'";
    $query_run = mysqli_query($con, $query);

   if($query_run)
   {
    $_SESSION['message'] = "Class Deleted Successfully";
    header("Location: Class_index.php");
    exit(0);
   }
   else
   {
    $_SESSION['message'] = "Class Not Deleted";
    header("Location: class_index.php");
    exit(0);
   } 
}

if(isset($_POST['update_class']))
{
    $cid = mysqli_real_escape_string($con, $_POST['CLASS_ID']);
    $cname = mysqli_real_escape_string($con, $_POST['CLASS_NAME']);


    $query = " UPDATE  class SET CLASS_ID='$cid', CLASS_NAME= '$cname' WHERE CLASS_ID='$cid'";
    $query_run = mysqli_query ($con,$query);
    if($query_run)
    {
        $_SESSION['message'] = "Class Updated Successfully";
        header("Location: class_index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Class Not Updated";
        header("Location: class_index.php");
        exit(0);
    }
}

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