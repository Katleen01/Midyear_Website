<?php
include_once "connect.php";

if (isset($_GET['email'])) {
    $student_email = $_GET['email'];
} else {
    header("Location: error_page.php");
}

$name_query = "SELECT name FROM student_account WHERE email = '$student_email'";
$name_result = $con->query($name_query);
if ($name_result->num_rows > 0) {
    $student_row = $name_result->fetch_assoc();
    $student_name = $student_row['name'];
} else {
    $student_name = "Student";
}

$grades_query = "SELECT * FROM student_grades WHERE email = '$student_email'";
$grades_result = $con->query($grades_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grades</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include_once 'navigation_student.php';?>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4">Grades - <?php echo $student_name; ?></h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Grade</th>
                            <th>Unit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        include_once "connect.php";

                        $total_grade_points = 0;
                        $total_units = 0;

                        if ($grades_result->num_rows > 0) {
                            while ($grade_row = $grades_result->fetch_assoc()) {
                                $subject_grade = floatval($grade_row['grade']);
                                $subject_unit = intval($grade_row['unit']);

                                $subject_wag = $subject_grade * $subject_unit;

                                $total_grade_points += $subject_wag;
                                $total_units += $subject_unit;

                                $subject_id = $grade_row['subject'];
                                $subject_name_query = "SELECT subjects FROM gwa WHERE id = '$subject_id'";
                                $subject_name_result = $con->query($subject_name_query);
                                $subject_name = "";

                                if ($subject_name_result && $subject_name_result->num_rows > 0) {
                                    $subject_name_row = $subject_name_result->fetch_assoc();
                                    $subject_name = $subject_name_row['subjects'];
                                }
                                echo '<tr>';
                                echo '<td>' . $subject_name . '</td>';
                                echo '<td>' . $grade_row['grade'] . '</td>';
                                echo '<td>' . $grade_row['unit'] . '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="3">No grades added yet.</td></tr>';
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <?php
                        if ($total_units > 0) {
                            $wag = $total_grade_points / $total_units;
                            echo '<tr>';
                            echo '<td colspan="2" class="text-right"><strong>Total Weighted Average Grade:</strong></td>';
                            echo '<td>' . number_format($wag, 2) . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
