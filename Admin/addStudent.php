<?php
include_once("Header.php");
include_once("../DB_Files/db.php");
$fname = '';
$mail = '';
$password = '';
$occ = '';

if (isset($_REQUEST['newStuSubmitBtn'])) {
    $fname = $_REQUEST['stu_name'];
    $mail = $_REQUEST['stu_email'];
    $password = $_REQUEST['stu_pass'];
    $occ = $_REQUEST['stu_occ'];

    if (($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "") ||  ($_REQUEST['stu_pass'] == "")  ||  ($_REQUEST['stu_occ'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Required</div>';
    } else {
        $stu_name = $_REQUEST['stu_name'];
        $stu_email = $_REQUEST['stu_email'];
        $stu_pass = $_REQUEST['stu_pass'];
        $stu_occ = $_REQUEST['stu_occ'];


        $email_query = "SELECT * FROM students WHERE stu_email='$stu_email'";
        $email_query_run = mysqli_query($conn, $email_query);
        if (mysqli_num_rows($email_query_run) > 0) {
            $error_msg['Email'] = "Email Already Taken";
        } else {
            $stu_pass = md5($stu_pass);
            $sql = "INSERT INTO students(stu_name, stu_email, stu_pass, stu_occ) VALUES ('$stu_name','$stu_email','$stu_pass','$stu_occ')";

            if ($conn->query($sql) == TRUE) {
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Student Added Successfully</div>';
                echo "<script>setTimeout(()=>{window.location.href='Students.php';},300);</script>";
            } else {
                $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Student Added Failed</div>';
            }
        }
    }
}
?>
<style>
    .validationError {
        color: red;
        font-size: 15px;
    }
</style>
<div class="col-sm-6 mt-5 jumbotron">
    <h3 class="text-center">Add New Students</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <br>
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
        <br>
        <div class="form-group">
            <label for="course_name">Name</label>
            <input type="text" id="stu_name" name="stu_name" class="form-control" <?php echo 'value="' . $fname . '"' ?>>
        </div><br>
        <div class="form-group">
            <label for="course_desc">Email</label>
            <input type="text" id="stu_email" name="stu_email" row=2 class="form-control" <?php echo 'value="' . $mail . '"' ?>>
            <?php
            if (isset($error_msg['Email'])) {
                echo "<div class='validationError'>" . $error_msg['Email'] . "</div>";
            }
            ?>
        </div>
        <br>
        <div class="form-group">
            <label for="course_author">Password</label>
            <input type="text" id="stu_pass" name="stu_pass" class="form-control" <?php echo 'value="' . $password . '"' ?>>
        </div>
        <br>
        <div class="form-group">
            <label for="course_duration">Occupation</label>
            <input type="text" id="stu_occ" name="stu_occ" class="form-control" <?php echo 'value="' . $occ . '"' ?>>
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-danger" type="submit" id="newStuSubmitBtn" name="newStuSubmitBtn">Submit</button>
            <a href="Students.php" class="btn btn-secondary">Close</a>
        </div>



    </form>
</div>
<?php
include_once("Footer.php");
?>