<?php
session_start();
require 'dbconnect.php';


if(isset($_POST['delete_parent']))
{
    $p_number = mysqli_real_escape_string($con, $_POST['P_NUMBER']);
    $query = "DELETE FROM parent WHERE  P_NUMBER= '$p_number' ";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Parent Deleted Successfully";
        header("Location: parent_index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Parent Not Deleted";
        header("Location: parent_index.php");
        exit(0);
    }
}
if(isset($_POST['update_parent']))
{
    $p_name = mysqli_real_escape_string($con, $_POST['PARENT_NAME']);
    $email = mysqli_real_escape_string($con, $_POST['EMAIL']);
    $p_number = isset($_POST['P_NUMBER']) ? mysqli_real_escape_string($con, $_POST['P_NUMBER']) : '';

    $query = " UPDATE  parent SET PARENT_NAME=' $p_name', EMAI= '$email', P_NUMBER= '$p_number',
    WHERE P_NUMBER='$p_number'";
    $query_run = mysqli_query ($con,$query);
    if($query_run)
    {
        $_SESSION['message'] = "Parent Updated Successfully";
        header("Location: parent_index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Parent Not Updated";
        header("Location: parent_index.php");
        exit(0);
    }
}

if(isset($_POST['save_parent']))
{
    $p_name = mysqli_real_escape_string($con, $_POST['PARENT_NAME']);
    $email = mysqli_real_escape_string($con, $_POST['EMAIL']);
    $p_number = mysqli_real_escape_string($con, $_POST['P_NUMBER']);



    $query = "INSERT INTO parent (PARENT_NAME, EMAIL, P_NUMBER) VALUES 
        ('$p_name', '$email', '$p_number')";

    $query_run = mysqli_query($con, $query); 
    if($query_run)
    {
        $_SESSION['message'] = "Parent Created Successfully";
        header("Location: parent_create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Parent Not Created";
        header("Location: parent_create.php");
        exit(0);
    }
}
?>
