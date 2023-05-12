<?php
include_once("ProfileHeader.php");
include_once("../DB_Files/db.php");
$date=date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date."+$_SESSION[exam_time] minutes"));
?>
<div class="col-sm-9 mt-5 bg-transparent carousel-fade ms-5">
    <h5 class="bg-dark card text-white p-2 text-center ">Result</h5>
    <?php
    $correct=0;
    $wrong=0;
    if(isset($_SESSION["answer"])){
        for($i=1; $i<=sizeof($_SESSION["answer"]); $i++){
            $answer="";
            $res=mysqli_query($conn,"SELECT * FROM add_ques WHERE catergory='$_SESSION[exam_category]' && ques_no=$i");
            while($row=mysqli_fetch_array($res))
            {
                $answer=$row["answer"];
            }
            if(isset($_SESSION["answer"][$i])){
                if($answer==$_SESSION["answer"] [$i])
                {
                    $correct=$correct+1;
                }else{
                    $wrong=$wrong+1;
                }
            }
            else{
                $wrong=$wrong+1;
            }
        }
    }

    $count=0;
    $res=mysqli_query($conn,"SELECT * FROM add_ques WHERE catergory='$_SESSION[exam_category]'");
    $count=mysqli_num_rows($res);
    $wrong=$count-$correct;
    $mark=($correct/$count)*100;
    echo "<br>"; echo "<br>";
    echo "<center>";
    echo "<h4 class='fw-bolder text-dark'>Total Questions= $count</h4>";
    echo "<h4 class='fw-bolder text-dark'>Correct Answer= $correct</h4>";
    echo "<h4 class='fw-bolder text-dark'>Wrong Answer= $wrong</h4>";
    echo "<h4 class='fw-bolder text-dark'>Your Marks= $mark</h4>";
    echo "</center>";
    ?>

    <br><br><br><br>
    <div class="container">
        <div class="col-md-12 text-center">
            <a href="EnrollQuiz.php">
            <button type="button" name="mainmenu" class="btn btn-danger text-light fw-bolder">Main Menu</button>
            </a>
            <br><br>
            <?php
            if($mark>=51){
                echo "";
                
            }else{
                $msg = '<div class="alert alert-warning m-auto col-sm-6 ml-5 mt-2 fw-bolder text-danger">Note :  Your Marks are less than 50. you need to get a certificate of more than 50 marks.Please Try Again Exam an get more than 50.</div>';
            }
            ?>
            <?php if (isset($msg)) {
            echo $msg;
        } ?>
        <br>
        </div>
    </div>
</div>
<?php
if(isset($_SESSION["exam_start"])){
    $date=date("Y-m-d H:i:s");
    if($mark>=51){
    mysqli_query($conn,"INSERT INTO exam_result( email, exam_type, total_question, correct_answer, wrong_answer, exam_time,mark) VALUES ('$_SESSION[stu_email]','$_SESSION[exam_category]','$count','$correct','$wrong','$date','$mark')");
    }
}
if(isset($_SESSION["exam_start"])){
    unset($_SESSION["exam_start"]);
    ?>
    <script type="text/javascript">
        window.location.href=window.location.href;
    </script>
    <?php
}
?>