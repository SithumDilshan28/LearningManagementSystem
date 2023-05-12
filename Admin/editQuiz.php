<?php

include_once("Header.php");
include_once("../DB_Files/db.php");

if (isset($_REQUEST['reqUpdate'])) {
    if (($_REQUEST['question'] == "") || ($_REQUEST['opt1'] == "")||  ($_REQUEST['opt2'] == "") ||  ($_REQUEST['opt3'] == "") ||  ($_REQUEST['opt4'] == "") || ($_REQUEST['correct'] == "") ) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Required</div>';
    } else {
        $id = $_REQUEST['id'];
        $question = $_REQUEST['question'];
        $opt1 = $_REQUEST['opt1'];
        $opt2 = $_REQUEST['opt2'];
        $opt3 = $_REQUEST['opt3'];
        $opt4 = $_REQUEST['opt4'];
        $correct = $_REQUEST['correct'];


        $sql = "UPDATE add_ques SET id='$id',question='$question',opt1='$opt1',opt2='$opt2',opt3='$opt3',opt4='$opt4',answer='$correct' WHERE id='$id'";


        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully</div>';
            echo "<script>setTimeout(()=>{window.location.href='addQuizz.php';},1500);</script>";
        } else {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Updated Failed</div>';
        }
    }
}
?>
<?php
if (isset($_REQUEST['view'])) {
    $sql = "SELECT * FROM add_ques WHERE id={$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}



?>

<div class="col-sm-6 mt-5 jumbotron">
    <h3 class="text-center">Edit <?php if (isset($row['catergory'])) {
                                        echo $row['catergory'];
                                    } ?></h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <br>
        <?php if (isset($msg)) {
            echo $msg;
        } ?><br>
        <div class="form-group">
            <label for="course_id">Question ID</label>
            <input type="text" id="id" name="id" class="form-control" value="<?php if (isset($row['id'])) {
                                                                                    echo $row['id'];
                                                                                } ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="course_name">Question</label>
            <input type="text" id="question" name="question" class="form-control" value="<?php if (isset($row['question'])) {
                                                                                                echo $row['question'];
                                                                                            } ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="course_img">Opt 1</label>
            <input type="text" id="opt1" name="opt1" class="form-control" value="<?php if (isset($row['opt1'])) {
                                                                                        echo $row['opt1'];
                                                                                    } ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="course_img">Opt 2</label>
            <input type="text" id="opt2" name="opt2" class="form-control" value="<?php if (isset($row['opt2'])) {
                                                                                        echo $row['opt2'];
                                                                                    } ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="course_img">Opt 3</label>
            <input type="text" id="opt3" name="opt3" class="form-control" value="<?php if (isset($row['opt3'])) {
                                                                                        echo $row['opt3'];
                                                                                    } ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="course_img">Opt 4</label>
            <input type="text" id="opt4" name="opt4" class="form-control" value="<?php if (isset($row['opt4'])) {
                                                                                        echo $row['opt4'];
                                                                                    } ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="course_img">Correct Answer</label>
            <input type="text" id="correct" name="correct" class="form-control" value="<?php if (isset($row['answer'])) {
                                                                                            echo $row['answer'];
                                                                                        } ?>">
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-danger" type="submit" id="reqUpdate" name="reqUpdate">Update</button>
            <a href="addQuizz.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>


<?php
include_once("Footer.php");
?>