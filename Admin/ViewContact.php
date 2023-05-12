<?php

include_once("Header.php");
include_once("../DB_Files/db.php");
?>


<div class="col-sm-6 mt-5 jumbotron">
    <h3 class="text-center">View Message</h3>
    <?php
    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM contact WHERE id={$_REQUEST['id']}";
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
            <label for="course_id">ID</label>
            <input type="text" id="course_id" name="course_id" class="form-control" value="<?php if (isset($row['id'])) {
                                                                                                echo $row['id'];
                                                                                            } ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="course_name">First Name</label>
            <input type="text" id="course_name" name="course_name" class="form-control" value="<?php if (isset($row['f_name'])) {
                                                                                                    echo $row['f_name'];
                                                                                                } ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="course_author">Last name</label>
            <input type="text" id="course_author" name="course_author" class="form-control" value="<?php if (isset($row['l_name'])) {
                                                                                                        echo $row['l_name'];
                                                                                                    } ?>" readonly>
        </div>
        <br>
        <div class="form-group">
            <label for="course_duration">Email</label>
            <input type="text" id="course_duration" name="course_duration" class="form-control" value="<?php if (isset($row['email'])) {
                                                                                                            echo $row['email'];
                                                                                                        } ?>" readonly>
        </div>
        <br>
        <div class="form-group">
            <label for="course_price">Message</label>
            <input type="text" id="course_price" name="course_price" class="form-control" value="<?php if (isset($row['msg'])) {
                                                                                                        echo $row['msg'];
                                                                                                    } ?>"readonly>
        </div>
        <br>
        <div class="text-center">
            <a href="Messages.php" class="btn btn-secondary">Close</a>
        </div>



    </form>
</div>


<?php
include_once("Footer.php");
?>