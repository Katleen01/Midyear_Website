<?php

session_start();
session_destroy();

header("Location: login-signup-admin-student.php");
exit;

?>