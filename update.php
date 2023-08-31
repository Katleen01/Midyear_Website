<?php
    include('connect.php');

    

    $id = $_GET['updateid'];
    $sql = "SELECT * FROM `student_account` WHERE idno=$id";
    $result = mysqli_query($con, $sql);
        if($result){
            $row = mysqli_fetch_assoc($result);
            $id = $row['idno'];
            $name = $row['name'];
            $gender = $row['gender'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $password = $row['password'];
            $studentparent = $row['stu_parent'];
            $pwd = $row['pwd'];
        }
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $password = $_POST['password'];
            $studentparent = $_POST['stu_parent'];
            $pwd = $_POST['pwd'];

            $sql = "UPDATE `student_account` SET name='$name',gender='$gender',email='$email',mobile='$mobile',password='$password', stu_parent='$studentparent', pwd='$pwd' where idno='$id'";
            $result = mysqli_query($con, $sql);
                if($result){
                    header('location:display.php');
                }else{
                    die(mysqli_error($con));
                } 
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootsrap.css">

    <style>
         @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
            font-weight: 500;
        }
        .navigation ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        .navigation li {
            margin-bottom: 10px;
        }

    .navigation a {
      display: block;
      padding: 10px;
      background-color: #eee;
      color: #333;
      text-decoration: none;
      border-radius: 5px;
    }
    
    .navigation a:hover {
      background-color: #ddd;
    }
    
    .navigation{
      display: flex;
      justify-content: center;
      align-items: center;
      position: absolute;
      left: 1rem;
      top: 10rem;
      height: 10rem;
      margin: 1rem;
    }
    body {
            background-image: linear-gradient(to right, #80FF72, #7EE8FA);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 10px 5px 6px rgba(0, 0, 0, 0.1);
        }

        .isu-logo{
            position: absolute;
            left: 15rem;
            top: 1rem;
            height: 7rem;
            width: 7rem;
        }

        .it-logo{
            position: absolute;
            right: 15rem;
            top: 1rem;
            height: 7rem;
            width: 7rem; 
        }

        .red-button{
            background-color: red;
            border: none;
        }
        .red-button:hover:{
            background-color: #a40404;
        }

        a{
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <img class="isu-logo" src="asset/isabela-state-university-logo-67371D9323-seeklogo.com.png" alt="">
    <img class="it-logo" src="asset/Isu - IT LOGO.png" alt="">
    <div class="container">
        <form method="post">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter Your Name" name="name" value="<?php echo $name ?>">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter Your Email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="mb-3">
                <label>Gender</label>
                <input type="text" class="form-control" placeholder="Ex. Male/Female" name="gender" value="<?php echo $gender ?>">
            </div>
           <div class="mb-3">
                <label>Mobile</label>
                <input type="text" class="form-control" placeholder="Enter Your Mobile" name="mobile" value="<?php echo $mobile ?>">
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password" value="<?php echo $password ?>" autocomplete="off">
            </div>
            <div class="mb-3">
                <label>Student Paren</label>
                <input type="text" class="form-control" placeholder="Yes or No" name="stu_parent" value="<?php echo $studentparent ?>">
            </div>
            <div class="mb-3">
                <label>PWD</label>
                <input type="text" class="form-control" placeholder="Yes or No" name="pwd" value="<?php echo $pwd ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <button class="btn red-button btn-primary"><a href="display.php">Back</a></button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="js/bootstrap.js"></script>
</body>
</html>