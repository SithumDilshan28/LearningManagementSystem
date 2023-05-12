<?php
session_start();
include_once("../DB_Files/db.php");

if (!isset($_SESSION['stu_id'])) {
    header('Location:../Home.php');
}
?>
<link rel="stylesheet" href="CSS/watchcourse.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<title>Imperial College</title>
<script type="text/javascript">
    function preventbackbutton() {
        window.history.forward();
    }
    setTimeout("preventbackbutton()", 0);
    window.onunload = function() {
        alert("nfdsjdsn");
    }; 
</script>

<body>


    <?php
    if (isset($_GET['course_id'])) {
        $course_id = $_GET['course_id'];
        $sql = "SELECT * FROM course WHERE course_id='$course_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>

    <div style="height: 120px;" class="container-fluid bg-dark p-2">
        <h4 class="text-white">Course Name: <?php echo $row['course_name']  ?></h4>
        <a href="MyCourse.php" class="btn fw-bolder btn-danger float-start mt-3">Back to My Course</a>
    </div>


    <div class="col-sm-9 mt-5 m-auto">
        <p class="bg-dark text-white p-2">List of Lessons</p>
        <?php
        $course_id = $_GET['course_id'];
        $sql = "SELECT * FROM lesson WHERE course_id='$course_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-dark fw-bolder" scope="col">Lesson Name</th>
                        <th class="text-dark fw-bolder" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td class="text-dark fw-bolder">' . $row['lesson_name'] . '</td>';
                        echo '<td>';
                        echo '
                <form action="Watch.php" method="POST" class="d-inline">
                <input type="hidden" name="link" value=' . $row['lesson_link'] . '>
                <button type="submit" class="btn btn-info mr-3" name="view" value="View">View</button>
                </form>
                </td>
            </tr>';
                    } ?>
                </tbody>
            </table>
        <?php } else {
            echo "<p class='text-dark p-2 fw-bolder'>Lessons Not Found. </p>";
        }


        ?>
    </div>
    </div>
    </div>
</body>