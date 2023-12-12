<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Add Student</title>
  </head>
  <body>
   <div class="container mt-5">

   <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Student 
                    <a href="student_index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="studentcode.php" method="POST">

                       <div class="mb-3">
                       <label>Student First Name </label>
                        <input type="text" name="STUDENT_FNAME" class="form-control">
                       </div>
                       <div class="mb-3">
                       <label>Student Last Name </label>
                        <input type="text" name="STUDENT_LNAME" class="form-control">
                       </div>
                       <div class="mb-3">
                       <label>Student Address </label>
                        <input type="text" name="ADDRESS" class="form-control">
                       </div>
                       <div class="mb-3">
                       <label>Student Phone </label>
                        <input type="text" name="NUMBER" class="form-control">
                       </div>
                       <div class="mb-3">
                       <label>Class ID </label>
                        <input type="text" name="CLASS_ID" class="form-control">
                       </div>
                       <div class="mb-3">
                       <label>Parent Phone</label>
                        <input type="text" name="P_NUMBER" class="form-control">
                       </div>
                       <div class="mb-3">
                        <button type="submit" name="save_student" class="btn btn-primary">Save Student</button>
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>