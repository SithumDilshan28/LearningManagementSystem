<?php 
// if(!isset($_SESSION)){
//     session_start();
// }

session_start();
if (!isset($_SESSION['id'])) {
    header('Location:Index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="CSS/Header.css">
    <!-- Icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #363636;">
        <a href="Dashboard.php" class="navbar-brand col-sm-3 col-md-2 mr-0" style="padding-left: 20px; height:80px;">Imperial <small class="text-white">Admin Panel</small></a>
    </nav>


    <div class="container-fluid mb-5" style="margin-top: 60px;">
        <div class="row">
            <nav class="col-sm-3 col-md-2 sidebar py-5d-print-none" style="padding-top:40px; margin-left:-20px;">
                <div  class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="Dashboard.php" class="nav-link">
                                <i class="uil uil-tachometer-fast-alt"></i>
                                <b>Dashboard</b>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="Course.php" class="nav-link">
                                <i class="uil uil-accessible-icon-alt"></i>
                                <b>Courses</b>
                            </a>
                        </li>



                        <li class="nav-item">
                            <a href="Lesson.php" class="nav-link">
                                <i class="uil uil-accessible-icon-alt"></i>
                                <b>Lessons</b>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="Students.php" class="nav-link">
                                <i class="uil uil-user"></i>
                                <b>Students</b>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="Exam.php" class="nav-link">
                            <i class="uil uil-plus"></i>
                                <b>Add Quiz Category</b>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="AddQuizz.php" class="nav-link">
                            <i class="uil uil-plus-circle"></i>
                                <b>Add Quiz</b>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="Result.php" class="nav-link">
                            <i class="uil uil-file-landscape-alt"></i>
                                <b>All Result</b>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="AddCertificate.php" class="nav-link">
                            <i class="uil uil-award-alt"></i>
                                <b>Add Certificate</b>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="Lectures.php" class="nav-link">
                            <i class="uil uil-user-plus"></i>
                                <b>Lectures</b>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="Blog.php" class="nav-link">
                            <i class="uil uil-blogger-alt"></i>
                                <b>Blogs</b>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="SellReport.php" class="nav-link">
                                <i class="uil uil-analysis"></i>
                                <b>Report</b>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="PaymentStatus.php" class="nav-link">
                                <i class="uil uil-invoice"></i>
                                <b>Payment Status</b>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="Feedback.php" class="nav-link">
                                <i class="uil uil-feedback"></i>
                                <b>Feedback</b>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="Messages.php" class="nav-link">
                            <i class="uil uil-envelope-add"></i>
                                <b>Messages</b>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="ChangePass.php" class="nav-link">
                                <i class="uil uil-key-skeleton"></i>
                                <b>Change Password</b>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="Logout.php" class="nav-link">
                                <i class="uil uil-sign-out-alt"></i>
                                <b>Log Out</b>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>



            


            
