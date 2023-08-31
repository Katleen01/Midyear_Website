<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'connect.php';

$query = "SELECT
    SUM(CASE WHEN gender = 'Male' THEN 1 ELSE 0 END) AS male_count,
    SUM(CASE WHEN gender = 'Female' THEN 1 ELSE 0 END) AS female_count
    FROM student_account";

$result = $con->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $male_count = $row["male_count"];
    $female_count = $row["female_count"];
} else {
    $male_count = 0;
    $female_count = 0;
}

echo json_encode([
    "male_count" => $male_count,
    "female_count" => $female_count
]);
?>
