<?php
session_start();
require 'dbconnect.php';

// Retrieve the list of available CLASS_ID values from the teacher table
$class_id_query = "SELECT CLASS_ID FROM teacher";
$class_id_result = mysqli_query($con, $class_id_query);

if (isset($_POST['save_teacher'])) {
    $tid = mysqli_real_escape_string($con, $_POST['TEACHER_ID']);
    $tfname = mysqli_real_escape_string($con, $_POST['TEACHER_FNAME']);
    $tlname = mysqli_real_escape_string($con, $_POST['TEACHER_LNAME']);
    $taddress = mysqli_real_escape_string($con, $_POST['ADDRESS']);
    $tnumber = mysqli_real_escape_string($con, $_POST['NUMBER']);
    $class_id = mysqli_real_escape_string($con, $_POST['CLASS_ID']);

    $query = "INSERT INTO teacher (TEACHER_ID, TEACHER_FNAME, TEACHER_LNAME, ADDRESS, NUMBER, CLASS_ID) VALUES 
        ('$tid', '$tfname', '$tlname', '$taddress', '$tnumber', '$class_id')";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Teacher Created Successfully";
        header("Location: teacher_create.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Teacher Not Created. Error: " . mysqli_error($con);
        header("Location: teacher_create.php");
        exit(0);
    }
}
?>