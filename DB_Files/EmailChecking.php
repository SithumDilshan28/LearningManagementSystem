<?php
    include("db.php");
    //Email Available Code
    if (isset($_POST['check_submit_btn'])) {
        $email = $_POST['email_id'];
        $email_query = "SELECT * FROM students WHERE stu_email='$email'";
        $email_query_run = mysqli_query($conn, $email_query);
        if (mysqli_num_rows($email_query_run) > 0) {
            echo "Email Already Taken";
        } else {
            echo "It's Available ";
        }
    }
?>
