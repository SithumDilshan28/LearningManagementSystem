<?php

include_once("Header.php");
include_once("../DB_Files/db.php");
?>


<div class="col-sm-6 mt-5 jumbotron">
    <h3 class="text-center">View Payment Status</h3>
    <?php
    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM courseorder WHERE co_id={$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }



    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <br>
        <div class="form-group">
            <label for="course_id">Order ID</label>
            <input type="text" id="course_id" name="course_id" class="form-control" value="<?php if (isset($row['order_id'])) {
                                                                                                echo $row['order_id'];
                                                                                            } ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="course_name">Student Email</label>
            <input type="text" id="course_name" name="course_name" class="form-control" value="<?php if (isset($row['stu_email'])) {
                                                                                                    echo $row['stu_email'];
                                                                                                } ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="course_author">Course ID</label>
            <input type="text" id="course_author" name="course_author" class="form-control" value="<?php if (isset($row['course_id'])) {
                                                                                                        echo $row['course_id'];
                                                                                                    } ?>" readonly>
        </div>
        <br>
        <div class="form-group">
            <label for="course_duration">Amount</label>
            <input type="text" id="course_duration" name="course_duration" class="form-control" value="<?php if (isset($row['amount'])) {
                                                                                                            echo $row['amount'];
                                                                                                        } ?>" readonly>
        </div>
        <br>
        <div class="form-group">
            <label for="course_price">Date</label>
            <input type="text" id="course_price" name="course_price" class="form-control" value="<?php if (isset($row['date'])) {
                                                                                                        echo $row['date'];
                                                                                                    } ?>"readonly>
        </div>
        <br>
        <div class="text-center">
            <a href="PaymentStatus.php" class="btn btn-secondary">Close</a>
        </div>



    </form>
</div>


<?php
include_once("Footer.php");
?>