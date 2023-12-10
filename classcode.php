<?php
session_start();
require 'dbconnect.php';

if(isset($_POST['save_class']))
{
    $cid = mysqli_real_escape_string($con, $_POST['CLASS_ID']);
    $cname = mysqli_real_escape_string($con, $_POST['CLASS_NAME']);
    $tid = mysqli_real_escape_string($con, $_POST['TEACHER_ID']);

    // Check if the referenced teacher ID exists in the teacher table
    $check_teacher_query = "SELECT * FROM teacher WHERE TEACHER_ID = '$tid'";
    $check_teacher_result = mysqli_query($con, $check_teacher_query);

    if (mysqli_num_rows($check_teacher_result) > 0) {
        // The teacher ID exists, proceed with the class insertion
        $query = "INSERT INTO class (CLASS_ID, CLASS_NAME, TEACHER_ID) VALUES ('$cid', '$cname', '$tid')";

        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            $_SESSION['message'] = "Class created successfully";
            header("Location: class_create.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Class not created. Error: " . mysqli_error($con);
            header("Location: class_create.php");
            exit(0);
        }
    }
}
?>
