<?php
include_once("Header.php");
include_once("../DB_Files/db.php");

$b_title = '';
$b_desc = '';
$b_desc1 = '';
$b_desc2 = '';
$b_desc3 = '';


if (isset($_REQUEST['blogSubmitBtn'])) {
    $b_title = $_REQUEST['blog_title'];
    $b_desc = $_REQUEST['blog_desc'];
    $b_desc1 = $_REQUEST['blog_desc1'];
    $b_desc2 = $_REQUEST['blog_desc2'];
    $b_desc3 = $_REQUEST['blog_desc3'];
    if (($_REQUEST['blog_title'] == "") || ($_REQUEST['blog_desc'] == "" ) || ($_REQUEST['blog_desc1'] == "" ) || ($_REQUEST['blog_desc2'] == "" ) || ($_REQUEST['blog_desc3'] == "" ) ) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Required</div>';
    } else {
        $blog_title = $_REQUEST['blog_title'];
        $blog_desc = $_REQUEST['blog_desc'];
        $blog_desc1 = $_REQUEST['blog_desc1'];
        $blog_desc2 = $_REQUEST['blog_desc2'];
        $blog_desc3 = $_REQUEST['blog_desc3'];
        $blog_img = $_FILES['blog_img']['name'];
        $blog_image_temp = $_FILES['blog_img']['tmp_name'];
        $img_folder = '../Images/Blog/' . $blog_img;
        move_uploaded_file($blog_image_temp, $img_folder);

        $sql = "INSERT INTO blog(b_title, b_dec,b_dec1,b_dec2,b_dec3,b_img) VALUES ('$blog_title','$blog_desc','$blog_desc1','$blog_desc2','$blog_desc3','$img_folder')";

        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Blog Added Successfully</div>';
            echo "<script>setTimeout(()=>{window.location.href='Blog.php';},300);</script>";
        } else {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Blog Added Failed</div>';
        }
    }
}
?>
<div class="col-sm-6 mt-5 jumbotron">
    <h3 class="text-center">Add New Blog</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <br>
        <?php if (isset($msg)) {
            echo $msg;
        } ?><br>
        <div class="form-group">
            <label for="course_name">Blog Title</label>
            <input type="text" id="blog_title" name="blog_title" class="form-control" <?php echo 'value="' . $b_title . '"' ?>>
        </div><br>
        <div class="form-group">
            <label for="course_desc">Blog Description 01</label>
            <input type="text" id="blog_desc" name="blog_desc" row=2 class="form-control" <?php echo 'value="' . $b_desc . '"' ?>>
        </div>
<br>
        <div class="form-group">
            <label for="course_desc">Blog Description 02</label>
            <input type="text" id="blog_desc1" name="blog_desc1" row=2 class="form-control" <?php echo 'value="' . $b_desc1 . '"' ?> >
        </div>
<br>
        <div class="form-group">
            <label for="course_desc">Blog Description 03</label>
            <input type="text" id="blog_desc2" name="blog_desc2" row=2 class="form-control" <?php echo 'value="' . $b_desc2 . '"' ?>>
        </div>
        <br>
        <div class="form-group">
            <label for="course_desc">Blog Description 04</label>
            <input type="text" id="blog_desc3" name="blog_desc3" row=2 class="form-control" <?php echo 'value="' . $b_desc3 . '"' ?>>
        </div>
        <br>
        <div class="form-group">
            <label for="course_img">Blog Image</label>
            <input type="file" id="blog_img" name="blog_img" class="form-control-file">
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-danger" type="submit" id="blogSubmitBtn" name="blogSubmitBtn">Submit</button>
            <a href="Blog.php" class="btn btn-secondary">Close</a>
        </div>



    </form>
</div>
<?php
include_once("Footer.php");
?>