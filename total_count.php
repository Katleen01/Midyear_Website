<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Students Count</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container-count{
            margin-top: 5rem;
        }
    </style>
</head>
<body>


<?php
include_once 'connect.php';

$query = "SELECT COUNT(*) AS total_count FROM student_account";

$result = $con->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_count = $row["total_count"];
} else {
    $total_count = 0;
}


?>

<div class="container-count mt-15">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow">
                <div class="card-body text-center">
                    <h5 class="card-title font-weight-bold">Total Students</h5>
                    <p class="card-text display-4 text-primary"><?php echo $total_count; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
