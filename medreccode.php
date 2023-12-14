<?php
session_start();
require 'dbconnect.php';

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