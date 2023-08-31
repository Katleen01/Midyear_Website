<?php

include_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["studentLogin"])) {
  $email = $_POST["studentEmail"];
  $password = $_POST["studentPassword"];

  $sql = "SELECT * FROM student_account WHERE email = '$email' AND password = '$password'";
  $result = $con->query($sql);

  if ($result->num_rows == 1) {

      header("Location: student_dashboard.php?email=" . urlencode($email)); 
      exit();
  } else {

      $loginError = "Failed to login. Please check your credentials.";
  }
}

$loginError = "";
$signupError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["studentLogin"])) {
    $email = $_POST["studentEmail"];
    $password = $_POST["studentPassword"];

    $sql = "SELECT * FROM student_account WHERE email = '$email' AND password = '$password'";

    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['studentEmail'] = $email;
        header("Location: student_dashboard.php"); 
        exit();
    } else {
        $loginError = "Failed to login. Please check your credentials.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["studentSignup"])) {
    $name = $_POST["studentSignupName"];
    $email = $_POST["studentSignupEmail"];
    $password = $_POST["studentSignupPassword"];
    $gender = $_POST["studentSignupGender"];
    $studentParent = $_POST["studentSignupParent"];
    $mobile = $_POST["studentSignupMobile"];
    $pwd = $_POST["studentSignupPwd"];

    $sql = "INSERT INTO student_account (name, email, password, gender, stu_parent, mobile, pwd, deleted) 
            VALUES ('$name', '$email', '$password', '$gender', '$studentParent', '$mobile', '$pwd', 0)";

    if ($con->query($sql) === TRUE) {
        header("Location: login-signup-admin-student.php");
        exit();
    } else {
      $signupError = "Failed to sign up. Please try again.";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["adminLogin"])) {
  $username = $_POST["adminUsername"];
  $password = $_POST["adminPassword"];

  $sql = "SELECT * FROM admin_account WHERE username = '$username' AND password = '$password'";
  $result = $con->query($sql);

  if ($result->num_rows == 1) {
  
      header("Location: dashboard.php"); 
  } else {
      $loginError = "Failed to login. Please check your credentials.";
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["adminSignup"])) {
  $name = $_POST["adminSignupName"];
  $email = $_POST["adminSignupEmail"];
  $username = $_POST["adminSignupUsername"];
  $password = $_POST["adminSignupPassword"];

  $sql = "INSERT INTO admin_account (name, email, username, password) 
          VALUES ('$name', '$email', '$username', '$password')";

  if ($con->query($sql) === TRUE) {
      header("Location: login-signup-admin-student.php");
      exit();
  } else {
      $signupError = "Failed to sign up. Please try again.";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login and Signup</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  body {
    background-color: #f3f7f4;
  }

  .container {
    margin-top: 50px;
  }

  .card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  }

  .card-header {
    background-color: #009688;
    color: #fff;
    border-radius: 10px 10px 0 0;
  }

  .nav-tabs .nav-link {
    color: #333;
    font-weight: bold;
  }

  .user-form {
    padding: 20px;
    display: none;
  }

  .user-form.active {
    display: block;
    animation: fadeIn 0.3s;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }

  .mt-2 {
    margin-top: 10px;
  }

  .btn-primary {
    background-color: #009688;
    border-color: #009688;
  }

  .btn-link {
    color: #009688;
  }
</style>
</head>
<body>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-center">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link active" id="student-tab" data-bs-toggle="tab" href="#student" role="tab" aria-controls="student" aria-selected="true">Student</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="admin-tab" data-bs-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="false">Admin</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="student" role="tabpanel" aria-labelledby="student-tab">
              <h2 class="card-title text-center">Student Login</h2>
              <form id="studentLoginForm" class="user-form active" method="post" action="">
                <div class="mb-3">
                  <label for="studentEmail" class="form-label">Email</label>
                  <input type="email" class="form-control" id="studentEmail" name="studentEmail" required>
                </div>
                <div class="mb-3">
                  <label for="studentPassword" class="form-label">Password</label>
                  <input type="password" class="form-control" id="studentPassword" name="studentPassword" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="studentLogin">Login</button>
                <p class="mt-2 text-center">Don't have an account? <a href="#" id="studentSignupBtn">Signup</a></p>
              </form>
              <form id="studentSignupForm" class="user-form" method="post" action="">
                <div class="mb-3">
                  <label for="studentSignupName" class="form-label">Full Name</label>
                  <input type="text" class="form-control" id="studentSignupName" name="studentSignupName">
                </div>
                <div class="mb-3">
                  <label for="studentSignupEmail" class="form-label">Email</label>
                  <input type="email" class="form-control" id="studentSignupEmail" name="studentSignupEmail">
                </div>
                <div class="mb-3">
                  <label for="studentSignupPassword" class="form-label">Password</label>
                  <input type="password" class="form-control" id="studentSignupPassword" name="studentSignupPassword">
                </div>
                <div class="mb-3">
                  <label for="studentSignupMobile" class="form-label">Mobile Number</label>
                  <input type="text" class="form-control" id="studentSignupMobile" name="studentSignupMobile">
                </div>
                <div class="mb-3">
                  <label for="studentSignupGender" class="form-label">Gender</label>
                  <select class="form-select" id="studentSignupGender" name="studentSignupGender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="studentSignupParent" class="form-label">Student Parent</label>
                  <select class="form-select" id="studentSignupParent" name="studentSignupParent">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="studentSignupPwd" class="form-label">Pwd</label>
                  <select class="form-select" id="studentSignupPwd" name="studentSignupPwd">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="studentSignup">Signup</button>
                <p class="mt-2 text-center">Already have an account? <a href="#" id="studentLoginBtn">Login</a></p>
              </form>
            </div>
            <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
              <h2 class="card-title text-center">Admin Login</h2>
              <form id="adminLoginForm" class="user-form active" method="post" action="">
                  <div class="mb-3">
                      <label for="adminUsername" class="form-label">Username</label>
                      <input type="text" class="form-control" id="adminUsername" name="adminUsername">
                  </div>
                  <div class="mb-3">
                      <label for="adminPassword" class="form-label">Password</label>
                      <input type="password" class="form-control" id="adminPassword" name="adminPassword">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block" name="adminLogin">Login</button>
                  <p class="mt-2 text-center">Don't have an account? <a href="#" id="adminSignupBtn">Signup</a></p>
              </form>
              <form id="adminSignupForm" class="user-form" method="post" action="">
                <div class="mb-3">
                    <label for="adminSignupName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="adminSignupName" name="adminSignupName">
                </div>
                <div class="mb-3">
                    <label for="adminSignupEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="adminSignupEmail" name="adminSignupEmail">
                </div>
                <div class="mb-3">
                    <label for="adminSignupUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="adminSignupUsername" name="adminSignupUsername">
                </div>
                <div class="mb-3">
                    <label for="adminSignupPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="adminSignupPassword" name="adminSignupPassword">
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="adminSignup">Signup</button>
                <p class="mt-2 text-center">
                    Already have an account? <a href="#" id="adminLoginBtn">Login</a>
                </p>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const studentLoginForm = document.getElementById('studentLoginForm');
  const adminLoginForm = document.getElementById('adminLoginForm');
  const studentSignupForm = document.getElementById('studentSignupForm');
  const adminSignupForm = document.getElementById('adminSignupForm');
  const studentSignupBtn = document.getElementById('studentSignupBtn');
  const adminSignupBtn = document.getElementById('adminSignupBtn');
  const studentLoginBtn = document.getElementById('studentLoginBtn');
  const adminLoginBtn = document.getElementById('adminLoginBtn');

  studentSignupBtn.addEventListener('click', () => {
    studentLoginForm.classList.remove('active');
    studentSignupForm.classList.add('active');
  });

  adminSignupBtn.addEventListener('click', () => {
    adminLoginForm.classList.remove('active');
    adminSignupForm.classList.add('active');
  });

  studentLoginBtn.addEventListener('click', () => {
    studentSignupForm.classList.remove('active');
    studentLoginForm.classList.add('active');
  });

  adminLoginBtn.addEventListener('click', () => {
    adminSignupForm.classList.remove('active');
    adminLoginForm.classList.add('active');
  });
</script>
</body>
</html>
