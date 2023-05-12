<?php
include_once("Header.php");
include_once("../DB_Files/db.php");

$l_name='';
$l_des='';

if (isset($_REQUEST['lecSubmitBtn'])) {
    $l_name=$_REQUEST['lec_name'];
    $l_des=$_REQUEST['lec_design'];
    
    if (($_REQUEST['lec_name'] == "") || ($_REQUEST['lec_design'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Required</div>';
    }else{
        $lec_name = $_REQUEST['lec_name'];
        $lec_design = $_REQUEST['lec_design'];
        $lec_link=$_FILES['lec_link']['name'];
        $lec_link_temp=$_FILES['lec_link']['tmp_name'];
        $link_folder='../Images/Lectures/'.$lec_link;
        move_uploaded_file($lec_link_temp,$link_folder);

        $sql="INSERT INTO lectures (l_name, l_design,l_img) VALUES ('$lec_name','$lec_design','$link_folder')";

        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Lecture Added Successfully</div>';
            echo "<script>setTimeout(()=>{window.location.href='Lectures.php';},300);</script>";
        }else{
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Lecture Added Failed</div>';
        }
    }

}


?>


<div class="col-sm-6 mt-5 jumbotron">
    <h3 class="text-center">Add Lectures</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <br>
        <?php if (isset($msg)) {
            echo $msg;
        } ?><br>
        <div class="form-group">
            <label for="course_id">Lecture Name</label>
            <input type="text" id="lec_name" name="lec_name" class="form-control" <?php echo 'value="' . $l_name . '"' ?>>
        </div><br>
        <div class="form-group">
            <label for="course_name">Lecture Designation</label>
            <input type="text" id="lec_design" name="lec_design" row=2 class="form-control" 
            <?php echo 'value="' . $l_des . '"' ?>>
        </div>
        <br>
        <div class="form-group">
            <label for="lesson_link">Lecture Image</label>
            <input type="file" id="lec_link" name="lec_link" class="form-control-file">
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-danger" type="submit" id="lecSubmitBtn" name="lecSubmitBtn">Submit</button>
            <a href="Lectures.php" class="btn btn-secondary">Close</a>
        </div>
        


    </form>
</div>