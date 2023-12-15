<?php
session_start();
require 'dbconnect.php';

if(isset($_POST['delete_record']))
{
    $Studentid = mysqli_real_escape_string($con,$_POST['delete_record']);

    $query = "DELETE FROM medical WHERE STUDENT_ID='$Studentid'";
    $query_run = mysqli_query($con, $query);

   if($query_run)
   {
    $_SESSION['message'] = "Medical Record Deleted Successfully";
    header("Location: medrec_index.php");
    exit(0);
   }
   else
   {
    $_SESSION['message'] = "Medical Record Not Deleted";
    header("Location: medrec_index.php");
    exit(0);
   } 
}

if(isset($_POST['update_medrec']))
{
    $Studentid = mysqli_real_escape_string($con, $_POST['STUDENT_ID']);
    $allergies = mysqli_real_escape_string($con, $_POST['ALLERGIES']);


    $query = " UPDATE  medical SET STUDENT_ID='$Studentid', ALLERGIES= '$allergies' WHERE STUDENT_ID='$Studentid'";
    $query_run = mysqli_query ($con,$query);
    if($query_run)
    {
        $_SESSION['message'] = "Medical Record Updated Successfully";
        header("Location: medrec_index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Medical Record Not Updated";
        header("Location: medrec_index.php");
        exit(0);
    }
}

if(isset($_POST['save_record']))
{
    $Studentid = mysqli_real_escape_string($con, $_POST['STUDENT_ID']);
    $allergies = mysqli_real_escape_string($con, $_POST['ALLERGIES']);

    $query = "INSERT INTO medical (STUDENT_ID,ALLERGIES) VALUES 
        ('$Studentid','$allergies')";

    $query_run = mysqli_query($con,$query); 
    if($query_run)
    {
        $_SESSION['message'] = "Medical Record Created Successfully";
        header("Location: medrec_create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Medical Record Not Created";
        header("Location: medrec_create.php");
        exit(0);
    }

}

?>