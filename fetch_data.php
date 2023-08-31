<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'connect.php';

$query = "SELECT
    SUM(CASE WHEN pwd = 'yes' THEN 1 ELSE 0 END) AS pwd_yes,
    SUM(CASE WHEN pwd = 'no' THEN 1 ELSE 0 END) AS pwd_no,
    SUM(CASE WHEN stu_parent = 'yes' THEN 1 ELSE 0 END) AS parent_yes,
    SUM(CASE WHEN stu_parent = 'no' THEN 1 ELSE 0 END) AS parent_no
    FROM student_account";

$result = $con->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $data = [
        'pwd_yes' => $row['pwd_yes'],
        'pwd_no' => $row['pwd_no'],
        'parent_yes' => $row['parent_yes'],
        'parent_no' => $row['parent_no']
    ];
    echo json_encode($data);
} else {
    echo json_encode(['error' => 'No data found']);
}
?>
