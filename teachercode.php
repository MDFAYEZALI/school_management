<?php
session_start();
require 'dbconnect.php';

if(isset($_POST['delete_teacher']))
{
    $tid = mysqli_real_escape_string($con,$_POST['delete_teacher']);

    $query = "DELETE FROM teacher WHERE TEACHER_ID='$tid'";
    $query_run = mysqli_query($con, $query);

   if($query_run)
   {
    $_SESSION['message'] = "Teacher Deleted Successfully";
    header("Location: teacher_index.php");
    exit(0);
   }
   else
   {
    $_SESSION['message'] = "Teacher Not Deleted";
    header("Location: teacher_index.php");
    exit(0);
   } 
}

if(isset($_POST['update_teacher']))
{
    $tid= mysqli_real_escape_string($con, $_POST['TEACHER_ID']);
    $tfname = mysqli_real_escape_string($con, $_POST['TEACHER_FNAME']);
    $tlname = mysqli_real_escape_string($con, $_POST['TEACHER_LNAME']);
    $address = mysqli_real_escape_string($con, $_POST['ADDRESS']);
    $number = mysqli_real_escape_string($con, $_POST['NUMBER']);
    $cid= mysqli_real_escape_string($con, $_POST['CLASS_ID']);


    $query = " UPDATE  teacher SET TEACHER_ID='$tid', TEACHER_FNAME= '$tfname', TEACHER_LNAME= ' $tlname', ADDRESS= '$address',
    NUMBER= '$number', CLASS_ID=' $cid' WHERE TEACHER_ID='$tid'";
    $query_run = mysqli_query ($con,$query);
    if($query_run)
    {
        $_SESSION['message'] = "Teacher Updated Successfully";
        header("Location: teacher_index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Teacher Not Updated";
        header("Location: teacher_index.php");
        exit(0);
    }
}


if(isset($_POST['save_teacher']))
{
    $tid= mysqli_real_escape_string($con, $_POST['TEACHER_ID']);
    $tfname = mysqli_real_escape_string($con, $_POST['TEACHER_FNAME']);
    $tlname = mysqli_real_escape_string($con, $_POST['TEACHER_LNAME']);
    $address = mysqli_real_escape_string($con, $_POST['ADDRESS']);
    $number = mysqli_real_escape_string($con, $_POST['NUMBER']);
    $cid= mysqli_real_escape_string($con, $_POST['CLASS_ID']);

    $query = "INSERT INTO teacher (TEACHER_ID,TEACHER_FNAME,TEACHER_LNAME,ADDRESS,NUMBER,CLASS_ID) VALUES 
        ('$tid',' $tfname',' $tlname','$address','$number','$cid')";

    $query_run = mysqli_query($con,$query); 
    if($query_run)
    {
        $_SESSION['message'] = "Teacher Created Successfully";
        header("Location: teacher_create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Teacher Not Created";
        header("Location: teacher_create.php");
        exit(0);
    }

}
?>