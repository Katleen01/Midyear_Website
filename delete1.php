<?php
    include 'connect.php';

    if(isset($_GET['deleteid'])){
        $deleteid = $_GET['deleteid'];

        $moveSql = "INSERT INTO `deleted_students` SELECT * FROM `student_account` WHERE `idno` = $deleteid";
        $moveResult = mysqli_query($con, $moveSql);
        if(!$moveResult){
            die(mysqli_error($con));
        }

        $deleteSql = "DELETE FROM `student_account` WHERE `idno` = $deleteid";
        $deleteResult = mysqli_query($con, $deleteSql);
        if($deleteResult){
            header("location: display.php");
        }else{
            die(mysqli_error($con));
        }
    }
?>

<?php
    include 'connect.php';

    if (isset($_GET['deleteid'])) {
        $deleteId = $_GET['deleteid'];

        $deleteQuery = "DELETE FROM `deleted_students` WHERE `id` = '$deleteId'";
        $deleteResult = mysqli_query($con, $deleteQuery);

        if ($deleteResult) {
            header("Location: retrieve.php");
            exit();
        } else {
            die(mysqli_error($con));
        }
    }
?>

