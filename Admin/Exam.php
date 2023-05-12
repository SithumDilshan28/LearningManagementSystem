<?php

include_once("Header.php");
include_once("../DB_Files/db.php");

if (isset($_REQUEST['submit'])) {
    if (($_REQUEST['category'] == "") || ($_REQUEST['time'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-2 m-2 mt-2">All Fields Required</div>';
    } else {
        $category = $_REQUEST['category'];
        $time = $_REQUEST['time'];

        $sql = "INSERT INTO exam_category(exam_name,exam_time) VALUES ('$category','$time')";

        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2 m-2">Category Added Successfully</div>';
            echo '<meta http-equiv="refresh" content="3;"/>';
        } else {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2 m-2">Category Added Failed</div>';
        }
    }
}
?>


<div class="col-sm-9 mt-5">
    <br><br>
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-6">
                <div class="card bg-transparent">
                    <form action="" method="POST">
                        <div class="card-header bg-dark text-light"><strong>Add Category</strong></div>
                        <?php if (isset($msg)) {
                            echo $msg;
                        } ?>
                        <div class="card-body card-block">
                            <div class="form-group"><label for="company" class=" form-control-label"><b>Add Category</b> </label>
                                <select class="form-control" name="category" id="category">
                                    <?php
                                    $sql = "SELECT * FROM course";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <option value="none" selected disabled hidden>--Select Category--</option>
                                        <option value="<?php echo $row['course_name']; ?>"><?php echo $row['course_name']; ?></option> <?php } ?>
                                </select>
                            </div>
                            <br>
                            <div class="form-group"><label for="vat" class=" form-control-label"><b>Time in Minutes</b> </label><input placeholder="Time in Minute" type="text" id="time" name="time" class="form-control"></div>
                            <div class="form-group">
                                <br>
                                <button type="submit" name="submit" class="btn btn-success">Add Exam</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card bg-transparent">
                    <div class="card-header bg-dark">
                        <strong class="card-title text-light"> Categories</strong>
                    </div>
                    <div class="card-body">
                        <?php
                        $sql = "SELECT * FROM exam_category";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        ?>
                            <table class="table ">
                                <thead class="">
                                    <tr>
                                        <th class="text-dark fw-bolder" scope="col">ID</th>
                                        <th class="text-dark fw-bolder" scope="col">Category Name</th>
                                        <th class="text-dark fw-bolder" scope="col">Time</th>
                                        <th class="text-dark fw-bolder" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<th class="text-dark fw-bolder" scope="row">' . $row['id'] . '</th>';
                                        echo '<td class="text-dark fw-bolder">' . $row['exam_name'] . '</td>';
                                        echo '<td class="text-dark fw-bolder">' . $row['exam_time'] . '</td>';
                                        echo '<td>';
                                        echo '
                <form action="editExam.php" method="POST" class="d-inline">
                <input type="hidden" name="id" value=' . $row["id"] . '>
                <button type="submit" class="btn btn-info mr-3" name="view" value="View"><i class="uil uil-pen"></i></button>
                </form>
                <form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value=' . $row["id"] . '>
                    <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                        <i class="uil uil-trash-alt"></i>
                    </button>
                    </form>
                </td>
            </tr>';
                                    } ?>
                                </tbody>
                            </table>
                        <?php } else {
                            echo "<p class='text-dark p-2 fw-bolder'>Exam Not Found. </p>";
                        }

                        if (isset($_REQUEST['delete'])) {
                            $sql = "DELETE FROM exam_category WHERE id={$_REQUEST['id']}";
                            if ($conn->query($sql) == TRUE) {
                                echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
                            } else {
                                echo "Delete Failed";
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>




        </div>
    </div>