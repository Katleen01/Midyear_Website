<?php
include_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subjectId = $_POST["subject"];
    $grade = $_POST["grade"];

    $sql = "INSERT INTO gwa (subjects, grade) VALUES ('$subjectId', '$grade')";

    if ($conn->query($sql) === TRUE) {
        header("Location: gwa.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
