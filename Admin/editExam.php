<?php

include_once("Header.php");
include_once("../DB_Files/db.php");

if (isset($_REQUEST['reqUpdate'])) {
    if (($_REQUEST['name'] == "") || ($_REQUEST['time'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Required</div>';
    } else {
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $time = $_REQUEST['time'];
        
        $sql = "UPDATE exam_category SET id='$id',exam_name='$name',exam_time='$time' WHERE id='$id'";

        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully</div>';
            echo "<script>setTimeout(()=>{window.location.href='Exam.php';},300);</script>";
        } else {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Updated Failed</div>';
        }
    }
}
?>


<div class="col-sm-6 mt-5 jumbotron">
    <h3 class="text-center">Edit Exam Details</h3>
    <?php
    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM exam_category WHERE id={$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }



    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <br>
        <?php if (isset($msg)) {
            echo $msg;
        } ?><br>
        <div class="form-group">
            <label for="course_id">Exam ID</label>
            <input type="text" id="id" name="id" class="form-control" value="<?php if (isset($row['id'])) {
                                                                                                echo $row['id'];
                                                                                            } ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="course_name">Exam Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php if (isset($row['exam_name'])) {
                                                                                                    echo $row['exam_name'];
                                                                                                } ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="course_img">Exam Duration</label>
            <input type="text" id="time" name="time" class="form-control" value="<?php if (isset($row['exam_time'])) {
                                                                                                    echo $row['exam_time'];
                                                                                                } ?>"> 
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-danger" type="submit" id="reqUpdate" name="reqUpdate">Update</button>
            <a href="Exam.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>


<?php
include_once("Footer.php");
?>