<?php
    include 'connect.php';

    if (isset($_GET['search'])) {
        $search = $_GET['search'];

        $sql = "SELECT * FROM `deleted_students` WHERE `name` LIKE '%$search%'";
        
        $result = mysqli_query($con, $sql);

        $searchPerformed = true;
    } else {
        $sql = "SELECT * FROM `deleted_students`";
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
    <title>Restore Deleted Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
            font-weight: 500;
        }

        img{
            height: 36rem;
            width: 36rem;
            margin-left: 22rem;
            margin-top: -2rem;
            position: absolute;
            z-index: -20;
            opacity: .4;
        }
</style>
<body>

    <img src="asset/isabela-state-university-logo-67371D9323-seeklogo.com.png" alt="">
    <div class="container my-5">
        <h1>Restore Deleted Students</h1>
        <form action="" method="GET" class="mb-3">
            <input type="text" name="search" placeholder="Search by name">
            <button type="submit" class="btn btn-primary">Search</button>
            <button class="btn btn-secondary">
                <a style='color:white;' class="text-decoration-none" href="display.php">Back</a>
            </button>
        </form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th> 
                    <th scope="col">Gender</th> 
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
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
                            <tr>
                                <th scope="row">' . $row['idno'] . '</th>
                                <td>' . $row['name'] . '</td>
                                <td>' . $row['gender'] . '</td>
                                <td>' . $row['email'] . '</td>
                                <td>' . $row['mobile'] . '</td>
                                <td>' . $row['password'] . '</td>
                                <td>
                                    <button class="btn btn-success"><a href="restore.php?restoreid=' . $row['idno'] . '" class="text-decoration-none text-light">Restore</a></button>
                                    <button class="btn btn-danger"><a href="delete.php?deleteid=' . $row['idno'] . '" class="text-decoration-none text-light">Delete</a></button>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
