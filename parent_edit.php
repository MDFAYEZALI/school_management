<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parent Edit</title>
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
            $p_number = mysqli_real_escape_string($con, $_GET['id']);
            $query = "SELECT * FROM parent WHERE P_NUMBER ='$p_number'";
 
            $query_run = mysqli_query($con, $query);
 
            if (!$query_run) {
                die('Error: ' . mysqli_error($con)); 
            }
 
            if (mysqli_num_rows($query_run) > 0) {
                $parent = mysqli_fetch_assoc($query_run);
        ?>
            <form action="parentcode.php" method="POST">
                <input type="hidden" name="P_NUMBER" value="<?= $p_number ?>">
                <div class="mb-3">
                <label>Parent Name</label>
                <input type="text" name="PARENT_NAME" value="<?= $parent['PARENT_NAME'] ?>" class="form-control">
                </div>
                <div class="mb-3">
                <label>Email</label>
                <input type="text" name="EMAIL" value="<?= $parent['EMAIL'] ?>" class="form-control">
               </div>
                <div class="mb-3">
                <label>Parent Number</label>
                <input type="text" name="P_NUMBER" value="<?= $parent['P_NUMBER'] ?>" class="form-control">
                </div>
                <button type="submit" name="update_parent" class="btn btn-primary">Update Parent</button>
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