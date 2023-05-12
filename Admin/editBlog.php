<?php

include_once("Header.php");
include_once("../DB_Files/db.php");

if (isset($_REQUEST['reqUpdate'])) {
    if (($_REQUEST['blog_title'] == "") || ($_REQUEST['blog_desc'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Required</div>';
    } else {
        $bid = $_REQUEST['blog_id'];
        $btitle = $_REQUEST['blog_title'];
        $bdesc = $_REQUEST['blog_desc'];
        $bdesc1 = $_REQUEST['blog_desc1'];
        $bdesc2 = $_REQUEST['blog_desc2'];
        $bdesc3 = $_REQUEST['blog_desc3'];
        
        $sql = "UPDATE blog SET b_id='$bid',b_title='$btitle',b_dec='$bdesc',b_dec1='$bdesc1',b_dec2='$bdesc2',b_dec3='$bdesc3' WHERE b_id='$bid'";

        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully</div>';
            echo "<script>setTimeout(()=>{window.location.href='Blog.php';},0);</script>";
        } else {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Updated Failed</div>';
        }
    }
}
?>


<div class="col-sm-6 mt-5 jumbotron">
    <h3 class="text-center">Edit Blog Details</h3>
    <?php
    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM blog WHERE b_id={$_REQUEST['id']}";
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
            <label for="course_id">Blog ID</label>
            <input type="text" id="blog_id" name="blog_id" class="form-control" value="<?php if (isset($row['b_id'])) {
                                                                                                echo $row['b_id'];
                                                                                            } ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="course_name">Blog Title</label>
            <input type="text" id="blog_title" name="blog_title" class="form-control" value="<?php if (isset($row['b_title'])) {
                                                                                                    echo $row['b_title'];
                                                                                                } ?>">
        </div><br>
        <div class="form-group">
            <label for="course_desc">Blog Description 01</label>
            <input id="blog_desc" name="blog_desc" row=2 class="form-control" value="<?php if (isset($row['b_dec'])) {
                echo $row['b_dec'];
            } ?>">
            </input>
        </div>
        <br>
        <div class="form-group">
            <label for="course_desc">Blog Description 02</label>
            <input id="blog_desc1" name="blog_desc1" row=2 class="form-control" value="<?php if (isset($row['b_dec1'])) {
                echo $row['b_dec1'];
            } ?>">
            </input>
        </div>
        <br>
        <div class="form-group">
            <label for="course_desc">Blog Description 03</label>
            <input id="blog_desc2" name="blog_desc2" row=2 class="form-control" value="<?php if (isset($row['b_dec2'])) {
                echo $row['b_dec2'];
            } ?>">
            </input>
        </div>
        <br>
        <div class="form-group">
            <label for="course_desc">Blog Description 04</label>
            <input id="blog_desc3" name="blog_desc3" row=2 class="form-control" value="<?php if (isset($row['b_dec3'])) {
                echo $row['b_dec3'];
            } ?>">
            </input>
        </div>
        <br>
        <div class="form-group">
            <label for="course_img">blog Image</label>
            <br>
            <img style="height: 300px; width:400px;" src="<?php if (isset($row['b_img'])) {
                            echo $row['b_img'];
                        } ?>" alt="" class="img-thumbnail">
            <!-- <input type="file" id="course_img" name="course_img" class="form-control-file"> -->
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-danger" type="submit" id="reqUpdate" name="reqUpdate">Update</button>
            <a href="Blog.php" class="btn btn-secondary">Close</a>
        </div>



    </form>
</div>


<?php
include_once("Footer.php");
?>