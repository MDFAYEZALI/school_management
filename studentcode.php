<?php
session_start();
require 'dbconnect.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con,$_POST['delete_student']);

    $query = "DELETE FROM student WHERE STUDENT_ID='$student_id'";
    $query_run = mysqli_query($con, $query);

   if($query_run)
   {
    $_SESSION['message'] = "Student Deleted Successfully";
    header("Location: student_index.php");
    exit(0);
   }
   else
   {
    $_SESSION['message'] = "Student Not Deleted";
    header("Location: student_index.php");
    exit(0);
   } 
}


if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['STUDENT_ID']);
    $fname= mysqli_real_escape_string($con, $_POST['STUDENT_FNAME']);
    $lname = mysqli_real_escape_string($con, $_POST['STUDENT_LNAME']);
    $address = mysqli_real_escape_string($con, $_POST['ADDRESS']);
    $s_phone = mysqli_real_escape_string($con, $_POST['NUMBER']);
    $class_id = mysqli_real_escape_string($con, $_POST['CLASS_ID']);
    $p_phone= mysqli_real_escape_string($con, $_POST['PARENT_NUMBER']);

    $query = " UPDATE SET student SET STUDENT_FNAME=' $fname', STUDENT_LNAME= '$lname', ADDRESS= '$address', NUMBER= '$s_phone',
    CLASS_ID= '$class_id', PARENT_NUMBER='$p_phone', WHERE STUDENT_ID='$student_id'";
    $query_run = mysqli_query ($con,$query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: student_index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: student_index.php");
        exit(0);
    }
}

if(isset($_POST['save_student']))
{
    $fname= mysqli_real_escape_string($con, $_POST['STUDENT_FNAME']);
    $lname = mysqli_real_escape_string($con, $_POST['STUDENT_LNAME']);
    $address = mysqli_real_escape_string($con, $_POST['ADDRESS']);
    $s_phone = mysqli_real_escape_string($con, $_POST['NUMBER']);
    $class_id = mysqli_real_escape_string($con, $_POST['CLASS_ID']);
    $p_phone= mysqli_real_escape_string($con, $_POST['PARENT_NUMBER']);

    $query = "INSERT INTO student (STUDENT_FNAME,STUDENT_LNAME,ADDRESS,NUMBER,CLASS_ID,PARENT_NUMBER) VALUES 
        ('$fname','$lname','$address','$s_phone',' $class_id',' $p_phone')";

    $query_run = mysqli_query($con,$query); 
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: student_create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: student_create.php");
        exit(0);
    }

}

?>