<?php

    session_start();
include_once("../DB_Files/db.php");

if (!isset($_SESSION['stu_id'])) {
    header('Location:../index.php');
}
//else{
//  echo "<script>location.href='../Home.php';</script>";
//}
$stu_email=$_SESSION['stu_email'];
if (isset($stu_email)) {
    $sql = "SELECT stu_img FROM students WHERE stu_email='$stu_email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stu_img = $row['stu_img'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="CSS/profileHeader.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
</head>
<style>
    body {
        background: #f7f9fa;
        color: rgb(255, 255, 255);
    }

    .nav-link {
        transition: all 400ms ease;
        color: black;
    }

</style>

<body>
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-3 shadow" style="background-color: #363636;">
        <a href="../index.php" class="navbar-brand col-sm-3 col-md-2 mr-0">Imperial <small>Student Profile</small> </a>
    </nav>

    <!-- Side Bar -->
    <div class="container-fluid mb-5" style="margin-top: 100px;">
        <div class="row">
            <nav class="col-sm-3 col-md-2 sidebar py-5d-print-none" style="padding-top:40px; margin-left:-20px;">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                            <img src="<?php echo $stu_img ?>" alt="" class="img-thumbnail rounded-circle" style="margin-left: 10px; height:150px;
                            width:150px;" >
                        </li>
                        <li class="nav-item">
                            <a href="Profile.php" class="nav-link">
                                <i class="uil uil-user-square"></i>
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="MyCourse.php" class="nav-link">
                                <i class="uil uil-book"></i>
                                My Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="EnrollQuiz.php" class="nav-link">
                                <i class="uil uil-clipboard-alt"></i>
                                Take a Quiz
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Feedback.php" class="nav-link">
                                <i class="uil uil-feedback"></i>
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="getCertificate.php" class="nav-link">
                            <i class="uil uil-award"></i>
                                Get Certificate
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="ChangePass.php" class="nav-link">
                                <i class="uil uil-key-skeleton-alt"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Logout.php" class="nav-link">
                                <i class="uil uil-sign-out-alt"></i>
                                Log Out
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>