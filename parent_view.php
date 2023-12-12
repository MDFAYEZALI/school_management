<?php
require 'dbconnect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> PARENT VIEW DETAILS</title>
</head>
<body>
<div class="container mt-5">



    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Parent 
                        <a href="parent_index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                    if (isset($_GET['P_NUMBER'])) {
                        $p_number = mysqli_real_escape_string($con, $_GET['P_NUMBER']);
                        $query = "SELECT * FROM parent WHERE P_NUMBER='$p_number'";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $parent = mysqli_fetch_array($query_run);
                            ?>

                               <input type="hidden" name="P_NUMBER" value= "<?= $p_number['P_NUMBER']; ?>">
                                <div class="mb-3">
                                    <label>PARENT Name </label>
                                    
                                           <class="form-control">
                                    <p class="form-control"> 
                                    <?= $parent['PARENT_NAME']; ?>
                                     </p>
                                </div>
                                <div class="mb-3">
                                    <label>EMAIL </label>
                                    <p class="form-control"> 
                                     <?= $parent['EMAIL']; ?>
                                     </p>
                                </div>
                                <div class="mb-3">
                                    <label>PARENT NUMBER</label>
                                    <p class="form-control"> 
                                     <?= $parent['P_NUMBER']; ?>
                                     </p>
                                </div>

                            

                            <?php
                        } else {
                            echo "<h4>No Such Id Found</h4>";
                        }
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>
