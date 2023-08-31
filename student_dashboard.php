<?php

  include_once 'connect.php';     

  if (isset($_GET['email'])) {
      $student_email = $_GET['email'];
  } else {
      header("Location: error_page.php");
      exit;
  }
        $sql = "SELECT * FROM student_account WHERE email = '$student_email'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $gender = $row['gender'];
            $mobile = $row['mobile'];
            $parent = $row['stu_parent'];
        } else {
            $name = "Student";
            $gender = "";
            $mobile = "";
            $parent = "";
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background-color: #f7f7f7;
        }
        .bg-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.5;
            z-index: -1;
        }
        .welcome-message-container {
            position: absolute;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 20px;
            border-radius: 10px;
            top: 17em;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px); /* Apply the glass effect */
        }
    </style>
</head>
<body>
    <?php include_once 'navigation_student.php';?>
    <img src="asset/backgroun - isur.jpg" alt="Background Image" class="bg-img">
    <div class="welcome-message-container">
        <h1>Welcome, <?php echo $name; ?>!</h1>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

