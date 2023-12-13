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

    <title>Add Teacher</title>
  </head>
  <body>
   <div class="container mt-5">

   <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Teacher
                    <a href="teacher_index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                <?php
                if(isset($_GET['TEACHER_ID']))
                {
                   $teacher_id = mysqli_real_escape_string($con,$_GET['TEACHER_ID']);
                   $query = "SELECT * FROM teacher WHERE TEACHER_ID='$teacher_id' ";
                   $query_run = mysqli_query($con, $query);

                   if(mysqli_num_rows($query_run) > 0)
                   {
                     $student = mysqli_fetch_array($query_run);
                     ?>
            
                <form action="teachercode.php" method="POST">
                <input type="hidden" name="TEACHER_ID" values="<?=$teacher_id['TEACHER_ID']?>">

                       <div class="mb-3">
                       <label>Teacher Id </label>
                        <input type="text" name="TEACHER_ID" class="form-control">
                       </div>
                       <div class="mb-3">
                       <label>Teacher First Name </label>
                        <input type="text" name="TEACHER_FNAME" class="form-control">
                       </div>
                       <div class="mb-3">
                       <label>Teacher Last Name </label>
                        <input type="text" name="TEACHER_LNAME" class="form-control">
                       </div>
                       <div class="mb-3">
                       <label>Address </label>
                        <input type="text" name="ADDRESS" class="form-control">
                       </div>
                       <div class="mb-3">
                       <label>Number </label>
                        <input type="text" name="NUMBER" class="form-control">
                       </div>
                       <div class="mb-3">
                       <br> <br> Class ID
                    <select class= "input" name="Class id" required>
                     <option value= "" > Select Class ID </option>
                     <option value= "101" >101 </option>
                     <option value= "202">202</option>
                    <option value= "303"> 303 </option>
                    <option value="404"> 404 </option>
                    <option value="505"> 505 </option>
                    <option value="606"> 606 </option>
                    <option value="707"> 707 </option>
                    <option value="808"> 808 </option>
                              </select>
                       </div>
                       <div class="mb-3">
                        <button type="submit" name="update_teacher" class="btn btn-primary">Update Teacher</button>
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