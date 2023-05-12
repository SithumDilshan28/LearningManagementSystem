<?php

include_once("Header.php");
include_once("../DB_Files/db.php");

if (isset($_REQUEST['reqUpdate'])) {
    if (($_REQUEST['lec_name'] == "") || ($_REQUEST['lec_design'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Required</div>';
    } else {
        $lid = $_REQUEST['lec_id'];
        $lname = $_REQUEST['lec_name'];
        $ldesign = $_REQUEST['lec_design'];

        $sql = "UPDATE lectures SET l_id='$lid',l_name='$lname',l_design='$ldesign' WHERE l_id='$lid'";

        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully</div>';
        } else {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Updated Failed</div>';
        }
    }
}
?>


<div class="col-sm-6 mt-5 jumbotron">
    <h3 class="text-center">Edit lectures Details</h3>
    <?php
    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM lectures WHERE l_id={$_REQUEST['id']}";
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
            <label for="course_id">Lecture ID</label>
            <input type="text" id="lec_id" name="lec_id" class="form-control" value="<?php if (isset($row['l_id'])) {
                                                                                                echo $row['l_id'];
                                                                                            } ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="course_name">Lecture Name</label>
            <input type="text" id="lec_name" name="lec_name" class="form-control" value="<?php if (isset($row['l_name'])) {
                                                                                                    echo $row['l_name'];
                                                                                                } ?>">
        </div><br>
        <div class="form-group">
            <label for="course_desc">Lecture Designation</label>
            <input id="lec_design" name="lec_design" row=2 class="form-control" value="<?php if (isset($row['l_design'])) {
                echo $row['l_design'];
            } ?>">
            
            </input>
        </div>
        <br>
        <div class="form-group">
            <label for="course_img">Lecture Image</label>
            <br>
            <img style="height: 300px; width:400px;" src="<?php if (isset($row['l_img'])) {
                            echo $row['l_img'];
                        } ?>" alt="" class="img-thumbnail">
            <!-- <input type="file" id="course_img" name="course_img" class="form-control-file"> -->
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-danger" type="submit" id="reqUpdate" name="reqUpdate">Update</button>
            <a href="Lectures.php" class="btn btn-secondary">Close</a>
        </div>



    </form>
</div>


<?php
include_once("Footer.php");
?>