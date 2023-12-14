<?php
      session_start();
      require 'dbconnect.php';

?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> St Alphonsus Primary School</title>
  </head>
  <body>
   <div class="container mt-4">

   <?php include('message.php'); ?>

<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4>MEDICAL DETAILS
<a href="medrec_create.php" class="btn btn-primary float-end">Add MEDICAL RECORDS</a>
<a href="home.php" class="btn btn-danger float-end">BACK</a>
</h4>
</div>
<div class="card-body">
<table class="table table-bordered table-striped">
<thead>
  <tr>
    <th>Student Id</th>
    <th>Allergies</th>
  </tr>
</thead>
<tbody>
  <?php 
      $query = "SELECT * FROM  medical";
      $query_run = mysqli_query($con, $query);

      if(mysqli_num_rows($query_run) > 0)
      {
          foreach($query_run as $medical)
          {
        ?>
        <tr>
        <td><?= $medical['STUDENT_ID']; ?></td>
        <td><?= $medical['ALLERGIES']; ?></td>
        <td>
            <a href="medrec_edit.php?id=<?= $medical['STUDENT_ID']; ?>" class="btn btn-success btn-sm">Edit</a>
            <form action="medreccode.php" method="POST" class="d-inline">
                <button type="submit" name="delete_record" value="<?=$medical['STUDENT_ID'];?>" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
        </tr>
              <?php
          }
      }
      else
      {
          echo "<h5> No Record Found </h5>";
      }
  ?>
  
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>