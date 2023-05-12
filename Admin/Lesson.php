<?php

include_once("Header.php");
include_once("../DB_Files/db.php");
?>

<div class="col-sm-9 mt-5 ">
    <form action="" class="mt-3 form-inline d-print-none">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="checkid" name="checkid" placeholder="Course ID" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>
    




    <?php
    $sql = "SELECT course_id FROM course";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        if (isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['course_id']) {
            $sql = "SELECT * FROM course WHERE course_id={$_REQUEST['checkid']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if (($row['course_id']) == $_REQUEST['checkid']) {
                $_SESSION['course_id'] = $row['course_id'];
                $_SESSION['course_name'] = $row['course_name'];
    ?>
                <h5 class="mt-5 bg-dark text-white p-2">Course ID: <?php if (isset($row['course_id'])) {
                                                                        echo $row['course_id'];
                                                                    } ?>
                    Course Name: <?php if (isset($row['course_name'])) {
                                        echo $row['course_name'];
                                    } ?>
                </h5>
    <?php
                $sql = "SELECT * FROM lesson WHERE course_id={$_REQUEST['checkid']}";
                $result = $conn->query($sql);
                echo '
<table class="table">
<thead>
    <tr>
        <th class="text-dark fw-bolder" scope="col">Lesson ID</th>
        <th class="text-dark fw-bolder" scope="col">Lesson Name</th>
        <th class="text-dark fw-bolder" scope="col">Action</th>
    </tr>
</thead>
<tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<th class="text-dark fw-bolder" scope="row">' . $row['lesson_id'] . '</th>';
                    echo '<td class="text-dark fw-bolder">' . $row['lesson_name'] . '</td>';
                    echo '<td>';
                    echo '
        <form action="editLesson.php" method="POST" class="d-inline">
        <input type="hidden" name="id" value=' . $row["lesson_id"] . '>
        <button type="submit" class="btn btn-info mr-3" name="view" value="View"><i class="uil uil-pen"></i></button>
        </form>
        <form action="" method="POST" class="d-inline">
        <input type="hidden" name="id" value=' . $row["lesson_id"] . '>
            <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                <i class="uil uil-trash-alt"></i>
            </button>
            </form>
        </td>
    </tr>';
                }
                echo '</tbody>
</table>';
            } else {
                echo '<div class="alert alert-dark mt-4" role="alert> Course Not Found!</div>';
            }
            if (isset($_REQUEST['delete'])) {
                $sql = "DELETE FROM lesson WHERE lesson_id={$_REQUEST['id']}";
                if ($conn->query($sql) == TRUE) {
                    echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
                } else {
                    echo "Delete Failed";
                }
            }
        }
    }

    ?>
</div>


<?php
if (isset($_SESSION['course_id'])) {
    echo '
    <div>
    <a href="addLesson.php" class="btn btn-danger box">
    <i class="uil uil-plus fa-2x"></i>
    </a>
</div>
    ';
}
?>




<?php
include_once("Footer.php");
?>