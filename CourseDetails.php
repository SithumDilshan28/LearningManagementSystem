<?php
include_once("Inc/Header.php");
include_once("DB_Files/db.php");
?>
<link rel="stylesheet" href="CSS/responsiveness.css">
<link rel="stylesheet" href="CSS/CourseDetails.css">

<?php


if (isset($_SESSION['stu_id'])) {
$stu_email=$_SESSION["stu_email"];
$cid=$_GET['course_id'];
$_SESSION["course_id"]=$cid;
if(isset($_REQUEST['view'])){
    $sql="SELECT * FROM courseorder WHERE stu_email='$stu_email' && course_id='$cid'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        echo "<script>setTimeout(()=>{window.location.href='Users/MyCourse.php';},0);</script>";
        
    }else{
        echo "<script>setTimeout(()=>{window.location.href='Users/CheckOut.php';},0);</script>";
    }
}
}
?>



<section id="course-inner">
    <?php
    if (isset($_GET['course_id'])) {
        $course_id = $_GET['course_id'];
        $sql = "SELECT * FROM course WHERE course_id='$course_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>
    <div class="overview">
        <img class="course-img" src="<?php echo str_replace('..', '.', $row['course_img']) ?>" alt="">
        <div class="course-head">
            <div class="c-name">
                <h3><?php echo $row['course_name'] ?></h3>
            </div>
            <span class="price">&#36;<?php echo $row['course_price'] ?></span>
        </div>
        <h3>Instructor Name</h3>
        <div class="tutor">
            <div class="tutor-dt">
                <p> <?php echo $row['course_author']  ?></p>
            </div>
        </div>
        <!-- <hr> -->
        <h3>Description</h3>
        <p class="description"> <?php echo $row['course_desc']  ?></p>
    </div>


    <div class="enroll">
        <h3>This Course Includes:</h3>
        <p><i class="uil uil-book"></i><?php echo $row['course_lessons']  ?> lectures</p>
        <p><i class="uil uil-clock"></i><?php echo $row['course_duration']  ?> hours on-demand video</p>
        <p><i class="uil uil-life-ring"></i>Full Lifetime Access</p>
        <p><i class="uil uil-mobile-android"></i>Access on mobile</p>
        <p><i class="uil uil-newspaper"></i>Attend Quiz</p>
        <p><i class="uil uil-award"></i>Certificate of Completion</p>
        <div class="enroll-btn">
            <?php
            if (isset($_SESSION['stu_id'])) {
                echo '
                <form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value="' . $row["course_price"] . '">
                <button type="submit" class="button" name="view">Enroll Now</button>
                </form>
                    ';

            } else {
                echo '
                <a href="Popupbox.php" class="button">Enroll Now</a>
                ';
            }
            ?>
        </div>
    </div>
</section>

<table>
    <thead>
        <th scope="col">Lesson No.</th>
        <th scope="col">Lesson Name</th>
    </thead>

    <tbody>
        <?php
        $sql = "SELECT * FROM lesson";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $num = 0;
            while ($row = $result->fetch_assoc()) {
                if ($course_id == $row['course_id']) {
                    $num++;
                    echo ' <tr class="tr">
        <th scope="row">' . $num . '</th>
        <td>' . $row['lesson_name'] . '</td>
        </tr>';
                }
            }
        }
        ?>
    </tbody>
</table>
<br>
<style>
    table {
        width: 50%;
        margin-left: auto;
        margin-right: auto;
        padding-bottom: 100px;
        font-size: 1.3rem;
        margin-top: -50px;
    }
    thead{
        padding: 10px;
    }
    td {
        text-align: center;
        padding: 10px;
    }
</style>
<?php
include_once("Inc/Footer.php");
?>