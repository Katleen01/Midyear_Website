<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "crud";

$con = new mysqli($hostname, $username, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
