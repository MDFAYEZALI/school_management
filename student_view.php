    <?php
    require 'dbconnect.php';
    ?>
    <!doctype html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Student View Details</title>
    </head>
    <body>
    <div class="container mt-5">


    <div class="row">
    <div class="col-md-12">
    <div class="card">
      <div class="card-header">
          <h4>Student View Details
          <a href="student_index.php" class="btn btn-danger float-end">BACK</a>
          </h4>
      </div>
      <div class="card-body">

      <?php
      if(isset($_GET['id']))
      {
        $student_id = mysqli_real_escape_string($con,$_GET['id']);
        $query = "SELECT * FROM student WHERE STUDENT_ID='$student_id' ";
        $query_run = mysqli_query($con, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
          $student = mysqli_fetch_array($query_run);
          ?>

            <div class="mb-3">
            <label>Student First Name </label>
            <p class="form-control">
            <?= $student['STUDENT_FNAME']?>
            </p>
            </div>
            <div class="mb-3">
            <label>Student Last Name </label>
              <p class="form-control">
            <?= $student['STUDENT_LNAME']?>
            </p>
            </div>
            </div>
            <div class="mb-3">
            <label>Student Address </label>
            <p class="form-control">
            <?= $student['ADDRESS']?>
            </p>
            </div>
            <div class="mb-3">
            <label>Student Phone </label>
              <p class="form-control">
            <?= $student['NUMBER']?>
            </p>
            </div>
            <div class="mb-3">
            <label>Class ID </label>
              <p class="form-control">
            <?= $student['CLASS_ID']?>
            </p>
            </div>
            <div class="mb-3">
            <label>Parent Phone</label>
              <p class="form-control">
            <?= $student['PARENT_NUMBER']?>
            </p>
            </div>
                  
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