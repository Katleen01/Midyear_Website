<?php
    include 'connect.php';

    if (isset($_GET['deleteid'])) {
        $deleteId = $_GET['deleteid'];

  
        $deleteQuery = "DELETE FROM `deleted_students` WHERE `idno` = '$deleteId'";
        $deleteResult = mysqli_query($con, $deleteQuery);

        if ($deleteResult) {

            header("Location: retrieve.php");
            exit();
        } else {
            die(mysqli_error($con));
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container my-5">
        <h1>Delete Student</h1>
        <p>Are you sure you want to delete this student?</p>
        <form action="" method="GET">
            <button class="btn btn-danger" type="submit" name="deleteid" value="<?php echo $_GET['deleteid']; ?>">Delete</button>
            <a href="retrieve.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="js/bootstrap.js"></script>
</body>
</html>
