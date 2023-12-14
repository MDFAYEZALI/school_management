
<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Edit</title>
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
            $student_id = mysqli_real_escape_string($con, $_GET['id']);
            $query = "SELECT * FROM student WHERE STUDENT_ID ='$student_id'";
 
            $query_run = mysqli_query($con, $query);
 
            if (!$query_run) {
                die('Error: ' . mysqli_error($con)); 
            }
 
            if (mysqli_num_rows($query_run) > 0) {
                $student = mysqli_fetch_assoc($query_run);
        ?>
                <form action="studentcode.php" method="POST">
                    <input type="hidden" name="STUDENT_ID" value="<?= $student_id ?>">
                    <div class="mb-3">
                        <label>Student First Name</label>
                        <input type="text" name="STUDENT_FNAME" value="<?= $student['STUDENT_FNAME'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Student Last Name</label>
                        <input type="text" name="STUDENT_LNAME" value="<?= $student['STUDENT_LNAME'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Student Address</label>
                        <input type="text" name="ADDRESS" value="<?= $student['ADDRESS'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Student Phone</label>
                        <input type="text" name="NUMBER" value="<?= $student['NUMBER'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Class ID</label>
                        <input type="text" name="CLASS_ID" value="<?= $student['CLASS_ID'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Parent Phone</label>
                        <input type="text" name="P_NUMBER" value="<?= $student['P_NUMBER'] ?>" class="form-control">
                    </div>
      
                    <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
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