<?php
include_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $grade = $_POST["grade"];
    $unit = $_POST["unit"]; // Changed "units" to "unit"

    // Assuming you have a new table to store grades called "student_grades"
    $sql = "INSERT INTO student_grades (email, subject, grade, unit) VALUES ('$email', '$subject', '$grade', '$unit')";

    if ($con->query($sql) === TRUE) {
        header("Location: student_grades.php?email=" . urlencode($email));
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

// Fetch subjects from the "gwa" table
$subjects_query = "SELECT * FROM gwa";
$subjects_result = $con->query($subjects_query);

// Get student's email from URL parameter
if (isset($_GET['email'])) {
    $student_email = $_GET['email'];
} else {
    // header("Location: error_page.php");
}

// units code
if (isset($_POST['subject'])) {
    $selected_subject_id = $_POST['subject'];
    $unit_query = "SELECT units FROM gwa WHERE id = '$selected_subject_id'"; // Changed "$subject" to "$selected_subject_id"
    $unit_result = $con->query($unit_query);
    if ($unit_result && $unit_result->num_rows > 0) {
        $unit_row = $unit_result->fetch_assoc();
        $selected_subject_unit = $unit_row['units'];
    } else {
        $selected_subject_unit = "";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Grades</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include_once 'navigation_student.php';?>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Enter Grades</h5>
                        <form method="post">
                            <div class="form-group">
                            <label for="subject">Select Subject</label>
                            <select class="form-control" id="subject" name="subject" onchange="populateUnit(this)">
                                <option value="" data-unit="">Select a subject</option>
                                <?php
                                if ($subjects_result && $subjects_result->num_rows > 0) {
                                    while ($subject_row = $subjects_result->fetch_assoc()) {
                                        echo '<option value="' . $subject_row['id'] . '" data-unit="' . $subject_row['units'] . '">' . $subject_row['subjects'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            </div>
                            <div class="mb-3">
                                <label for="unit" class="form-label">Unit</label>
                                <input type="number" class="form-control" id="unit" name="unit" required>
                            </div>
                            <div class="form-group">
                                <label for="grade">Enter Grade</label>
                                <input type="text" class="form-control" id="grade" name="grade">
                            </div>
                            <input type="hidden" name="email" value="<?php echo $student_email; ?>">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        function populateUnit(select) {
            var selectedOption = select.options[select.selectedIndex];
            var unitField = document.getElementById("unit");
            unitField.value = selectedOption.getAttribute("data-unit");
        }
    </script>       
</body>
</html>
