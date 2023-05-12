<?php
include_once("Header.php");
include_once("../DB_Files/db.php");

if (isset($_REQUEST['reqUpdate'])) {
    if (($_REQUEST['lesson_id'] == "") || ($_REQUEST['lesson_name'] == "") || ($_REQUEST['course_id'] == "") ||  ($_REQUEST['course_name'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Required</div>';
    } else {
        $lid = $_REQUEST['lesson_id'];
        $lname = $_REQUEST['lesson_name'];
        $cid = $_REQUEST['course_id'];
        $cname = $_REQUEST['course_name'];
        $Llink=$_REQUEST['lesson_link'];

        $sql = "UPDATE lesson SET lesson_id='$lid',lesson_name='$lname',lesson_link='$Llink',course_id='$cid',course_name='$cname' WHERE lesson_id='$lid'";

        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully</div>';
        } else {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Updated Failed</div>';
        }
    }
}
?>


<div class="col-sm-6 mt-5 jumbotron">
    <h3 class="text-center">Edit Lesson Details</h3>
    <?php
    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM lesson WHERE lesson_id={$_REQUEST['id']}";
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
            <label for="lesson_id">Lesson ID</label>
            <input type="text" id="lesson_id" name="lesson_id" class="form-control" value="<?php if (isset($row['lesson_id'])) {
                                                                                                echo $row['lesson_id'];
                                                                                            } ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" id="lesson_name" name="lesson_name" class="form-control" value="<?php if (isset($row['lesson_name'])) {
                                                                                                    echo $row['lesson_name'];
                                                                                                } ?>">
        </div><br>
        <div class="form-group">
            <label for="course_id">Course_ID</label>
            <input type="text" id="course_id" name="course_id" class="form-control" value="<?php if (isset($row['course_id'])) {
                                                                                                echo $row['course_id'];
                                                                                            } ?>" readonly>
        </div>
        <br>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" id="course_name" name="course_name" class="form-control" value="<?php if (isset($row['course_name'])) {
                                                                                                    echo $row['course_name'];
                                                                                                } ?>" readonly>
        </div>
        <br>
        <div class="form-group">
            <label for="lesson_link">Lesson Link</label>
            <input type="text" id="lesson_link" name="lesson_link" class="form-control" value="<?php if (isset($row['lesson_link'])) {
                                                                                                    echo $row['lesson_link'];
                                                                                                } ?>">
            <!-- <div class="embed-responsive embed-responsive-16by9">
                <iframe src="<?php if (isset($row['lesson_link'])) {
                                    echo $row['lesson_link'];
                                } ?>" class="embed-responsive-item" allowfullscreen></iframe>
            </div> -->
            <!-- <input type="file" id="lesson_link" name="lesson_link" class="form-control-file"> -->
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-danger" type="submit" id="reqUpdate" name="reqUpdate">Update</button>
            <a href="Lesson.php" class="btn btn-secondary">Close</a>
        </div>



    </form>
</div>


<?php
include_once("Footer.php");
?>