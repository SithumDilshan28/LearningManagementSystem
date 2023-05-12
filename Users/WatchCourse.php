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

<?php
    if (isset($_GET['course_id'])) {
        $course_id = $_GET['course_id'];
        $sql = "SELECT * FROM course WHERE course_id='$course_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>

<div style="height: 120px;" class="container-fluid bg-dark p-2">
    <h4  class="text-white">Course Name:  <?php echo $row['course_name']  ?></h4>
    <a  href="MyCourse.php" class="btn fw-bolder btn-danger float-start mt-3">Back to My Course</a>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 border-right">
            <br><br>
            <h4 class="text-center">Lessons</h4>
            <ul class="nav flex-column" id="playlist">
                <?php
                if(isset($_GET['course_id'])){
                    $course_id=$_GET['course_id'];
                    $sql="SELECT * FROM lesson WHERE course_id='$course_id'";
                    $result=$conn->query($sql);
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            $link=$row["lesson_link"];
                            echo'<li class="nav-item border-bottom py-2" movieurl='.$row['lesson_link'].' style="cursor:pointer;">'.$row['lesson_name'].'</li>';
                        }
                    }
                }
                ?>
            </ul>
        </div>

        <div class="col-sm-8">
<video hidden class="mt-5 ml-5"  id="videoarea" src="" controls></video> 
            <?php 
            $txt='
            <iframe id="videoarea" width="560" height="315" src="https://www.youtube.com/embed/'.$link.'"  allowfullscreen class="mt-5 ml-5"></iframe>
                <button onclick="next()">Next</button>';
                echo $txt;
                ?> 
                
    <br>
    <?php
    if (isset($_GET['course_id'])) {
        $course_id = $_GET['course_id'];
        $sql = "SELECT * FROM course WHERE course_id='$course_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>
<br>
            <h6 style="width: 600px;"><?php echo $row['course_desc']  ?></h6>
            <br><br>
        </div>

    </div>
</div>

<script>
    $(document).ready(function() {
    $(function() {
        $("#playlist li").on("click", function() {
            $("#videoarea").attr({
                src: $(this).attr("movieurl"),
            });
        });
        $("#videoarea").attr({
            src: $("#playlist li").eq(0).attr("movieurl")
        })
    });
});



</script>