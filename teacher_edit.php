
<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Class Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
 
<body>
    <div class="container mt-5">
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
 
        session_start();
        require 'dbconnect.php';
 
        if (isset($_GET['id'])) {
          $tid = mysqli_real_escape_string($con, $_GET['id']);
            $query = "SELECT * FROM teacher WHERE TEACHER_ID ='$tid'";
 
            $query_run = mysqli_query($con, $query);
 
            if (!$query_run) {
                die('Error: ' . mysqli_error($con)); 
            }
 
            if (mysqli_num_rows($query_run) > 0) {
                $class = mysqli_fetch_assoc($query_run);
        ?>
                <form action="teachercode.php" method="POST">
                    <input type="hidden" name="TEACHER_ID" value="<?= $tid ?>">
                    <div class="mb-3">
                        <label>Teacher Id</label>
                        <input type="text" name="TEACHER_ID" value="<?= $teacher['TEACHER_ID'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Teacher First Name</label>
                        <input type="text" name="TEACHER_FNAME" value="<?= $teacher['TEACHER_FNAME'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Teacher Last Name</label>
                        <input type="text" name="TEACHER_LNAME" value="<?= $teacher['TEACHER_LNAME'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Address</label>
                        <input type="text" name="ADDRESS" value="<?= $teacher['ADDRESS'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Number</label>
                        <input type="text" name="NUMBER" value="<?= $teacher['NUMBER'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Class ID</label>
                        <input type="text" name="CLASS_ID" value="<?= $teacher['CLASS_ID'] ?>" class="form-control">
                    </div>
      
                    <button type="submit" name="update_teacher" class="btn btn-primary">Update Teacher</button>
                </form>
        <?php
            } else {
                echo "<h4>No Such Id Found</h4>";
            }
        }
        ?>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
 
</html>