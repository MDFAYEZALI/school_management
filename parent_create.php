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

    <title>ADD PARENT</title>
  </head>
  <body>
   <div class="container mt-5">

   <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Parent 
                    <a href="student_index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="parentcode.php" method="POST">

                       <div class="mb-3">
                       <label>PARENT Name </label>
                        <input type="text" name="PARENT_NAME" class="form-control">
                       </div>
                       <div class="mb-3">
                       <label>EMAIL </label>
                        <input type="text" name="EMAIL" class="form-control">
                       </div>
                       <div class="mb-3">
                       <label>PARENT NUMBER</label>
                        <input type="text" name="PARENT_NUMBER" class="form-control">
                       </div>
                     
                       <br> <br> Student ID 
                    <select class= "input" name="student id" required>
                     <option value= "" > Select Student ID </option>
                     <option value= "1" >1 </option>
                     <option value= "2">2</option> 
                    <option value= "3"> 3 </option> 
                    <option value="4"> 4 </option> 
                    <option value="5"> 5 </option>
					          </select>
                       <div class="mb-3">
                        <button type="submit" name="save_parent" class="btn btn-primary">Save Parent</button>
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