<?php
include_once("Header.php");
include_once("../DB_Files/db.php");

if (isset($_REQUEST['reqUpdate'])) {
    if (($_REQUEST['stu_id'] == "") ||($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "") ||  ($_REQUEST['stu_pass'] == "") ) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Required</div>';
    }else{
        $sid=$_REQUEST['stu_id'];
        $sname = $_REQUEST['stu_name'];
        $semail = $_REQUEST['stu_email'];
        $spass = $_REQUEST['stu_pass'];
        $socc = $_REQUEST['stu_occ'];

        $sql = "UPDATE students SET stu_id='$sid',stu_name='$sname',stu_email='$semail',stu_pass='$spass',stu_occ='$socc' WHERE stu_id='$sid'";

        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully</div>';
            echo "<script>setTimeout(()=>{window.location.href='Students.php';},400);</script>";
        } else {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Updated Failed</div>';
        }
    }
}

if(isset($_REQUEST['delete'])){
    $sql="DELETE FROM students WHERE stu_id={$_REQUEST['stu_id']}";
    if($conn->query($sql)==TRUE){
        echo "<script>setTimeout(()=>{window.location.href='Students.php';},0);</script>";
    }else{
        echo "Delete Failed";
    }
}
?>


<div class="col-sm-6 mt-5 jumbotron">
    <?php
    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM students WHERE stu_id={$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $stu_email=$row["stu_email"];
    }



    ?>
        <h3 class="text-center">Update Students Details</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <br>
            <?php if (isset($msg)) {
                echo $msg;
            } ?><br>
            <div class="form-group">
                <label for="course_name">ID</label>
                <input type="text" id="stu_id" name="stu_id" class="form-control" value="<?php if(isset($row['stu_id'])){echo $row['stu_id'];}
                ?>" readonly>
            </div><br>
            <div class="form-group">
                <label for="course_name">Name</label>
                <input type="text" id="stu_name" name="stu_name" class="form-control"value="<?php if(isset($row['stu_name'])){echo $row['stu_name'];}
                ?>">
            </div><br>
            <div class="form-group">
                <label for="course_desc">Email</label>
                <input type="text" id="stu_email" name="stu_email" row=2 class="form-control"value="<?php if(isset($row['stu_email'])){echo $row['stu_email'];}
                ?>" readonly>
            </div>
            <br>
            <div class="form-group">
                <label for="course_author">Password</label>
                <input type="text" id="stu_pass" name="stu_pass" class="form-control"value="<?php if(isset($row['stu_pass'])){echo $row['stu_pass'];}
                ?>" readonly>
            </div>
            <br>
            <div class="form-group">
                <label for="course_duration">Occupation</label>
                <input type="text" id="stu_occ" name="stu_occ" class="form-control"
                value="<?php if(isset($row['stu_occ'])){echo $row['stu_occ'];}
                ?>">
            </div>
            <br>
            <div class="text-center">
            <button class="btn btn-danger" type="submit" id="reqUpdate" name="reqUpdate">Update</button>
            <a href="Students.php" class="btn btn-secondary">Close</a>
            <button type="submit" name="delete" class="btn btn-warning">Delete</button>
        </div>
        </form>
        <br><br><br>




<?php

?>

        <!-- student enrolled course details-->
        <h5 class="text-center fw-bolder">Student Enroll Courses Details</h5>
        <br><br>
        <?php
    $sql = "SELECT * FROM courseorder WHERE stu_email='$stu_email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    ?>
    <table class="table  text-center">
        <thead>
            <tr>
                <th class="text-dark" scope="col">Course ID</th>
                <th class="text-dark" scope="col">Course Name</th>
            </tr>
        </thead>
        <tbody>
        <?php  while($row=$result->fetch_assoc()){ 
            echo '<tr>';
                echo '<th class="text-dark" scope="row">'.$row['course_id'].'</th>';
                echo '<td class="text-dark">'.$row['course_name'].'</td>';
                echo '</tr>';
            } ?>
        </tbody>
    </table>
    <?php }else{ echo "<p class='text-dark p-2 fw-bolder'>Student Enroll Courses Not Found. </p>";} 

    ?>
    </div>


    <?php
    include_once("Footer.php");
    ?>