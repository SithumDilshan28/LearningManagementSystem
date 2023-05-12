<?php
include_once("Header.php");
include_once("../DB_Files/db.php");

$l_name='';
$l_desc='';


if (isset($_REQUEST['lessonSubmitBtn'])) {
    $l_name=$_REQUEST['lesson_name'];
    if (($_REQUEST['lesson_name'] == "")  ||  ($_REQUEST['course_id'] == "")  ||  ($_REQUEST['course_name'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Required</div>';
    }else{
        $lesson_name = $_REQUEST['lesson_name'];
        $course_id = $_REQUEST['course_id'];
        $course_name = $_REQUEST['course_name'];
        $lesson_link=$_REQUEST['lesson_link'];
        // $lesson_link=$_FILES['lesson_link']['name'];
        // $lesson_link_temp=$_FILES['lesson_link']['tmp_name'];
        // $link_folder='../Images/LessonVideo/'.$lesson_link;
        // move_uploaded_file($lesson_link_temp,$link_folder);

        $sql="INSERT INTO lesson(lesson_name,lesson_link, course_id, course_name) VALUES ('$lesson_name','$lesson_link','$course_id','$course_name')";

        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Lesson Added Successfully</div>';
            echo '<meta http-equiv="refresh" content="3;"/>';
        }else{
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Lesson Added Failed</div>';
        }
    }

}
?>
<div class="col-sm-6 mt-5 jumbotron">
    <h3 class="text-center">Add New Lesson</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <br>
        <?php if (isset($msg)) {
            echo $msg;
        } ?><br>
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" id="course_id" name="course_id" class="form-control" value="<?php if(isset($_SESSION['course_id'])) {echo $_SESSION['course_id'];} ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" id="course_name" name="course_name" row=2 class="form-control"value="<?php if(isset($_SESSION['course_name'])) {echo $_SESSION['course_name'];} ?>" readonly>
        </div>
        <br>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" id="lesson_name" name="lesson_name" class="form-control" <?php echo 'value="' . $l_name . '"' ?>>
        </div>
        <br>
        <div class="form-group">
            <label for="lesson_link">Lesson Youtube ID</label>
            <input type="text" id="lesson_link" name="lesson_link" class="form-control" <?php echo 'value="' . $l_name . '"' ?>>
            <br>
            <!-- <input type="file" id="lesson_link" name="lesson_link" class="form-control-file"> -->
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-danger" type="submit" id="lessonSubmitBtn" name="lessonSubmitBtn">Submit</button>
            <a href="Lesson.php" class="btn btn-secondary">Close</a>
        </div>
        


    </form>
</div>
<?php
include_once("Footer.php");
?>