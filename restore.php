<?php
    include 'connect.php';

    if (isset($_GET['restoreid'])) {
        $restoreID = $_GET['restoreid'];

        $selectQuery = "SELECT * FROM `deleted_students` WHERE `idno` = '$restoreID'";
        $result = mysqli_query($con, $selectQuery);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['idno'];
            $name = $row['name'];
            $gender = $row['gender'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $password = $row['password'];
            $studentparent = $row['stu_parent'];
            $pwd = $row['pwd'];

            $insertQuery = "INSERT INTO `student_account` (`idno`, `name`, `gender`, `email`, `mobile`, `password`, `stu_parent`, `pwd`) VALUES ('$id', '$name', '$gender', '$email', '$mobile', '$password', '$studentparent', '$pwd')";
            $insertResult = mysqli_query($con, $insertQuery);

            if ($insertResult) {
                $deleteQuery = "DELETE FROM `deleted_students` WHERE `idno` = '$restoreID'";
                $deleteResult = mysqli_query($con, $deleteQuery);

                if ($deleteResult) {
                    echo '<script>alert("Student restored successfully!"); window.location.href = "retrieve.php";</script>';
                    exit();
                } else {
                    echo '<script>alert("Failed to delete the student from the deleted_students table!"); window.location.href = "retrieve.php";</script>';
                    exit();
                }
            } else {
                echo '<script>alert("Failed to restore the student!"); window.location.href = "retrieve.php";</script>';
                exit();
            }
        } else {
            echo '<script>alert("Invalid restore ID!"); window.location.href = "retrieve.php";</script>';
            exit();
        }
    } else {
        echo '<script>alert("Restore ID not provided!"); window.location.href = "retrieve.php";</script>';
        exit();
    }
?>
