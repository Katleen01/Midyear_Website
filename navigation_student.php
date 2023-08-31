<?php include_once 'connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Custom styling for navigation menu */
        .green-theme {
            background-color: #4CAF50; /* Green background color */
            color: white; /* Text color */
        }
        .green-theme .navbar-brand {
            color: white; /* Text color for logo */
            font-weight: bold; /* Bold font weight for logo */
        }
        .green-theme .navbar-toggler-icon {
            color: white; /* Color for the navbar toggler icon */
        }
        .green-theme .nav-link {
            color: white; /* Text color for navigation links */
            font-size: 18px; /* Font size for navigation links */
            transition: color 0.3s; /* Smooth color transition on hover */
        }
        .green-theme .nav-link:hover {
            color: #f8f9fa; /* Hover color for navigation links */
            text-decoration: none; /* Remove underline on hover */
        }
    </style>
</head>
<body>
    <!-- Navigation Menu -->
    <nav class="navbar navbar-expand-lg green-theme">
        <a class="navbar-brand" href="#"><i class="fas fa-graduation-cap"></i> Student Portal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="student_dashboard.php?email=<?php echo urlencode($student_email); ?>"><i class="fas fa-home"></i> Dashboard</a></li>
                <li class="nav-item active">
                    <a class="nav-link" href="edit_profile.php?email=<?php echo urlencode($student_email); ?>"><i class="fas fa-home"></i> Edit Profile</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="enter_grades.php?email=<?php echo urlencode($student_email); ?>"><i class="fas fa-edit"></i> Add Grades</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="student_grades.php?email=<?php echo urlencode($student_email); ?>"><i class="fas fa-list"></i> Student Grades</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Bootstrap Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
