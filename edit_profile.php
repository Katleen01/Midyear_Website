<?php
include_once "connect.php"; 

if (isset($_GET['email'])) {
    $student_email = $_GET['email'];
} else {
    header("Location: error_page.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateProfile"])) {

    $newName = $_POST["newName"];
    $newEmail = $_POST["newEmail"]; 
    $newPwd = $_POST["newPwd"]; 
    $newGender = $_POST["newGender"];
    $newMobile = $_POST["newMobile"];
    $newParent = $_POST["newParent"];
    $newPWD = $_POST["newPWD"];
    $email = $_POST["email"]; 

    $sql = "UPDATE student_account SET name = '$newName', gender = '$newGender', mobile = '$newMobile', stu_parent = '$newParent', email = '$newEmail', password = '$newPwd', pwd = '$newPWD' WHERE email = '$email'";
    $con->query($sql);

    header("Location: student_dashboard.php?email=" . urlencode($email));
    exit();
}

$email = $_GET["email"];

$sql = "SELECT * FROM student_account WHERE email = '$email'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $password = $row['password'];
    $gender = $row['gender'];
    $mobile = $row['mobile'];
    $parent = $row['stu_parent'];
    $pwd = $row['pwd'];
} else {

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include_once 'navigation_student.php';?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="profile-card">
                    <h1>Edit Profile</h1>
                    <form method="post" action="">
                        <input type="hidden" name="email" value="<?php echo $email; ?>">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="newName" class="form-control" value="<?php echo $name; ?>">
                        </div>

                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="newEmail" class="form-control" value="<?php echo $email; ?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="newPwd" class="form-control" value="<?php echo $password; ?>">
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="newMobile" class="form-control" value="<?php echo $mobile; ?>">
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="newGender" class="form-control">
                                <option value="Male" <?php if ($gender === 'Male') echo 'selected'; ?>>Male</option>
                                <option value="Female" <?php if ($gender === 'Female') echo 'selected'; ?>>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Student Parent</label>
                            <select name="newParent" class="form-control">
                                <option value="yes" <?php if ($parent === 'yes') echo 'selected'; ?>>Yes</option>
                                <option value="no" <?php if ($parent === 'no') echo 'selected'; ?>>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Person with Disabilities (PWD)</label>
                            <select name="newPWD" class="form-control">
                                <option value="yes" <?php if ($parent === 'yes') echo 'selected'; ?>>Yes</option>
                                <option value="no" <?php if ($parent === 'no') echo 'selected'; ?>>No</option>
                            </select>
                        </div>

                        <button type="submit" name="updateProfile" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
