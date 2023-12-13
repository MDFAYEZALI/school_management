<?php
session_start();
require 'dbconnect.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Student Edit</title>
  </head>
  <body>
   <div class="container mt-5">

   <?php include('message.php'); ?> 

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Student Edit 
                    <a href="student_index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                <?php
                if(isset($_GET['STUDENT_ID']))
                {
                   $student_id = mysqli_real_escape_string($con,$_GET['STUDENT_ID']);
                   $query = "SELECT * FROM student WHERE STUDENT_ID='$student_id' ";
                   $query_run = mysqli_query($con, $query);

                   if(mysqli_num_rows($query_run) > 0)
                   {
                     $student = mysqli_fetch_array($query_run);
                     ?>
            
                    <form action="studentcode.php" method="POST">
                           
                    <input type="hidden" name="STUDENT_ID" values="<?= $student_id ?>">

                       <div class="mb-3">
                       <label>Student First Name </label>
                        <input type="text" name="STUDENT_FNAME" value="<?= $student['STUDENT_FNAME']?>" class="form-control">
                       </div>
                       <div class="mb-3">
                       <label>Student Last Name </label>
                        <input type="text" name="STUDENT_LNAME" value="<?= $student['STUDENT_LNAME']?>" class="form-control">
                       </div>
                       <div class="mb-3">
                       <label>Student Address </label>
                        <input type="text" name="ADDRESS" value="<?= $student['ADDRESS']?>" class="form-control">
                       </div>
                       <div class="mb-3">
                       <label>Student Phone </label>
                        <input type="text" name="NUMBER"  value="<?= $student['NUMBER']?>" class="form-control">
                       </div>
                       <div class="mb-3">
                       <label>Class ID </label>
                        <input type="text" name="CLASS_ID"  value="<?= $student['CLASS_ID']?>" class="form-control">
                       </div>
                       <div class="mb-3">
                       <label>Parent Phone</label>
                        <input type="text" name="P_NUMBER"  value="<?= $student['P_NUMBER']?>" class="form-control">
                       </div>
                       <div class="mb-3">
                        <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
                       </div>
                    </form>
                             
                    <?php
                   }
                   else
                   {
                     echo "<h4> No Such Id Found</h4>";
                   }
                }
                ?>
                </div>
            </div>
        </div>
    </div>
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>