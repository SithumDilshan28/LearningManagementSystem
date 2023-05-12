<?php
include_once("Header.php");
include_once("../DB_Files/db.php");

$c_name = '';
$c_desc = '';
$c_auth = '';
$c_dur = '';
$c_price = '';
$c_less = '';

if (isset($_REQUEST['courseSubmitBtn'])) {

    $c_name = $_REQUEST['course_name'];
    $c_desc = $_REQUEST['course_desc'];
    $c_auth = $_REQUEST['course_author'];
    $c_dur = $_REQUEST['course_duration'];
    $c_price = $_REQUEST['course_price'];
    $c_less = $_REQUEST['course_lessons'];

    if (($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") ||  ($_REQUEST['course_author'] == "")  ||  ($_REQUEST['course_duration'] == "")  ||  ($_REQUEST['course_price'] == "") ||  ($_REQUEST['course_lessons'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Required</div>';
    } else {
        $course_name = $_REQUEST['course_name'];
        $course_desc = $_REQUEST['course_desc'];
        $course_author = $_REQUEST['course_author'];
        $course_duration = $_REQUEST['course_duration'];
        $course_price = $_REQUEST['course_price'];
        $course_lessons = $_REQUEST['course_lessons'];
        $course_image = $_FILES['course_img']['name'];
        $course_image_temp = $_FILES['course_img']['tmp_name'];
        $img_folder = '../Images/CourseImages/' . $course_image;
        move_uploaded_file($course_image_temp, $img_folder);

        $sql = "INSERT INTO course(course_name, course_desc, course_author, course_img, course_duration, course_price, course_lessons) VALUES ('$course_name','$course_desc','$course_author','$img_folder','$course_duration','$course_price','$course_lessons')";

        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Added Successfully</div>';
            echo "<script>setTimeout(()=>{window.location.href='Course.php';},300);</script>";
        } else {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Course Added Failed</div>';
        }
    }
}
?>
<div class="col-sm-6 mt-5 jumbotron">
    <h3 class="text-center">Add New Course</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <br>
        <?php if (isset($msg)) {
            echo $msg;
        } ?><br>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" id="course_name" name="course_name" class="form-control" <?php echo 'value="' . $c_name . '"' ?>>
        </div><br>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <input type="text" id="course_desc" name="course_desc" row=2 class="form-control" <?php echo 'value="' . $c_desc . '"' ?>>
        </div>
        <br>
        <div class="form-group">
            <label for="course_author">Lecture</label>
            <!-- <input type="text" id="course_author" name="course_author" class="form-control"<?php echo 'value="' . $c_auth . '"' ?>> -->
            <select class="form-control" name="course_author" id="course_author">
                                    <?php
                                    $sql = "SELECT * FROM lectures";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <option value="none" selected disabled hidden>--Select Lecture--</option>
                                        <option value="<?php echo $row['l_name']; ?>"><?php echo $row['l_name']; ?></option> <?php } ?>
                                </select>
        </div>
        <br>
        <div class="form-group">
            <label for="course_duration">Course Duration (Hours)</label>
            <input type="number" id="course_duration" name="course_duration" class="form-control"<?php echo 'value="' . $c_dur . '"' ?>>
        </div>
        <br>
        <div class="form-group">
            <label for="course_price">Course Price</label>
            <input type="float" id="course_price" name="course_price" class="form-control" <?php echo 'value="' . $c_price . '"' ?>>
        </div>
        <br>
        <div class="form-group">
            <label for="course_lessons">Course Lessons</label>
            <input type="number" id="course_lessons" name="course_lessons" class="form-control"<?php echo 'value="' . $c_less . '"' ?>>
        </div>
        <br>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <input type="file" id="course_img" name="course_img" class="form-control-file">
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-danger" type="submit" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
            <a href="Course.php" class="btn btn-secondary">Close</a>
        </div>



    </form>
</div>
<?php
include_once("Footer.php");
?>