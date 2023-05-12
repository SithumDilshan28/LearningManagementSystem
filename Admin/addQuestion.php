<?php
include_once("Header.php");
include_once("../DB_Files/db.php");
if (isset($_REQUEST['quesSubmitBtn'])) {
    if (($_REQUEST['add_ques'] == "") || ($_REQUEST['ans1'] == "") || ($_REQUEST['ans2'] == "") || ($_REQUEST['ans3'] == "") || ($_REQUEST['ans4'] == "") || ($_REQUEST['correct_ans'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Required</div>';
    } else {
        $add_ques = $_REQUEST['add_ques'];
        $ans1 = $_REQUEST['ans1'];
        $ans2 = $_REQUEST['ans2'];
        $ans3 = $_REQUEST['ans3'];
        $ans4 = $_REQUEST['ans4'];
        $correct_ans = $_REQUEST['correct_ans'];
        $name = $_REQUEST['name'];


        $loop = 0;
        $count = 0;

        $res = mysqli_query($conn, "SELECT * FROM add_ques WHERE catergory='$name' ORDER BY id ASC") or die(mysqli_error($conn));
        $count = mysqli_num_rows($res);

        if ($count == 0) {
        } else {
            while ($row = mysqli_fetch_array($res)) {
                $loop = $loop + 1;
                mysqli_query($conn, "UPDATE add_ques SET ques_no='$loop' WHERE id=$row[id]");
            }
        }

        $loop = $loop + 1;


        $sql = "INSERT INTO add_ques(ques_no,question,opt1, opt2, opt3, opt4, answer, catergory) VALUES ('$loop','$add_ques','$ans1','$ans2','$ans3','$ans4','$correct_ans','$name')";

        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Question Added Successfully</div>';
            echo "<script>setTimeout(()=>{window.location.href='AddQuizz.php';},100);</script>";
        } else {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Question Added Failed</div>';
        }
    }
}
?>


<div class="col-sm-6 mt-5 jumbotron">
    <?php
    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM exam_category WHERE id={$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>
    <h3 class="text-center">Add Question</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <br>
        <?php if (isset($msg)) {
            echo $msg;
        } ?><br>
        <div class="form-group">
            <label for="course_name">Exam Category</label>
            <input type="text" id="name" name="name" value="<?php if (isset($row['exam_name'])) {
                                                                echo $row['exam_name'];
                                                            } ?>" class=" form-control fw-bold bg-transparent border-0 text-dark" readonly>
        </div>
        <br>
        <div class="form-group">
            <label for="course_name">Add Question</label>
            <input type="text" id="add_ques" name="add_ques" class="form-control">
        </div><br>
        <div class="form-group">
            <label for="course_desc">Answer 01</label>
            <input type="text" id="ans1" name="ans1" row=2 class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label for="course_desc">Answer 02</label>
            <input type="text" id="ans2" name="ans2" row=2 class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label for="course_desc">Answer 03</label>
            <input type="text" id="ans3" name="ans3" row=2 class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label for="course_desc">Answer 04</label>
            <input type="text" id="ans4" name="ans4" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label for="course_desc">Correct Answer</label>
            <input type="text" id="correct_ans" name="correct_ans" row=2 class="form-control">
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-danger" type="submit" id="quesSubmitBtn" name="quesSubmitBtn">Submit</button>
            <a href="AddQuizz.php" class="btn btn-secondary">Close</a>
        </div>
    </form>


    <br>

    <div class="col-lg-12">
        <div class="card bg-transparent">
            <div class="card-body">
                <?php
                $sql = "SELECT * FROM add_ques WHERE catergory='$row[exam_name]'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                ?>
                    <table class="table">
                        <thead class="">
                            <tr>
                                <th class="text-dark" scope="col">ID</th>
                                <th class="text-dark" scope="col">Question</th>
                                <th class="text-dark" scope="col">Ans 1</th>
                                <th class="text-dark" scope="col">Ans 2</th>
                                <th class="text-dark" scope="col">Ans 3</th>
                                <th class="text-dark" scope="col">Ans 4</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<th class="text-dark" scope="row">' . $row['id'] . '</th>';
                                echo '<td class="text-dark">' . $row['question'] . '</td>';
                                echo '<td class="text-dark">' . $row['opt1'] . '</td>';
                                echo '<td class="text-dark">' . $row['opt2'] . '</td>';
                                echo '<td class="text-dark">' . $row['opt3'] . '</td>';
                                echo '<td class="text-dark">' . $row['opt4'] . '</td>';
                                echo '<td>';
                                echo '
                <form action="editQuiz.php" method="POST" class="d-inline">
                <input type="hidden" name="id" value=' . $row["id"] . '>
                <button type="submit" class="btn btn-info mr-3" name="view" value="View"><i class="uil uil-pen"></i></button>
                </form>
                </td>
            </tr>';
                            } ?>
                        </tbody>
                    </table>
                <?php } else {
                    echo "Exam Not Found";
                }

                ?>
            </div>

        </div>

    </div>
</div>






<?php
include_once("Footer.php");
?>