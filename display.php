<?php
include_once 'connect.php';


if (isset($_GET['search'])) {
    $search = $_GET['search'];

    $sql = "SELECT * FROM `student_account` WHERE `name` LIKE '%$search%'";
    $result = mysqli_query($con, $sql);

} else {
    $sql = "SELECT * FROM `student_account`";
    $result = mysqli_query($con, $sql);

    $searchPerformed = false; 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
            font-weight: 500;
        }

        img {
            height: 36rem;
            width: 36rem;
            margin-left: 22rem;
            margin-top: 0rem;
            position: absolute;
            z-index: -20;
            opacity: .2;
        }

        nav {
            position: relative;
            width: 100%;
        }

        table {
            padding: 5em 5em;
        }

        h1 {
            margin: 1rem;
        }
        
    </style>
</head>

<body>
    <img src="asset/isabela-state-university-logo-67371D9323-seeklogo.com.png" alt="">
    <div class="nav" style="width:100%;">
        <?php include_once "navigation.php"; ?>
    </div>

    <div class="container my-5">
        <h1>STUDENT PROFILE</h1>
        <div class="row mb-3">
            <div class="col-md-6">
                <form action="" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search by name">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="retrieve.php" class="btn btn-primary text-light">Retrieve Student</a>
            </div>
        </div>
    </div>


    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Student Parent</th>
                <th scope="col">PWD</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                   
                    if ($searchPerformed && isset($search) && !empty($search) && stripos($row['name'], $search) === false) {
                        continue; 
                    }

                    echo '
                        <tr class="text-center">
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['gender'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['mobile'] . '</td>
                            <td>' . $row['stu_parent'] . '</td>
                            <td>' . $row['pwd'] . '</td>
                            <td>' . str_repeat('•', strlen($row['password'])) . '</td>
                            <td>
                                <button class="btn btn-success"><a href="update.php?updateid=' . $row['idno'] . '" class="text-decoration-none text-light">Update</a></button>
                                <button class="btn btn-danger"><a href="delete1.php?deleteid=' . $row['idno'] . '" class="text-decoration-none text-light">Delete</a></button>
                            </td>
                        </tr>
                    ';
                }
            } else {
                die(mysqli_error($con));
            }

            ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>
