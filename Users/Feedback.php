<?php


include_once("ProfileHeader.php");
include_once("../DB_Files/db.php");


$stu_email=$_SESSION['stu_email'];
$sql="SELECT * FROM students WHERE stu_email='$stu_email'";
$result=$conn->query($sql);
if($result->num_rows==1){
    $row=$result->fetch_assoc();
    $stuId=$row["stu_id"];
}

if(isset($_REQUEST['submitFeedback'])){
    if(($_REQUEST['f_content']=="")){
        $passmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">All Field Required</div>';
    }else{
        $fContent=$_REQUEST['f_content'];
        $sql="INSERT INTO feedback (f_content,stu_id) VALUES ('$fContent','$stuId')";
    }if($conn->query($sql)==TRUE){
        $passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Feedback Submitted </div>';
    }else{
        $passmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Feedback Submitted Failed</div>';
    }
}

?>

<div class="col-sm-6 mt-4 ms-5">
    <form method="POST" enctype="multipart/form-data" class="mx-5">
    <p class="bg-dark text-white p-2 fw-bolder">Feedback</p>
    <?php  if(isset($passmsg))  {echo $passmsg;}?>
        <div class="form-group">
            <label class="text-dark" for="stuId">Student ID</label>
            <input type="text" id="stuId" class="form-control" name="stuId" value="<?php if(isset($stuId)) {echo $stuId;} ?>" readonly>
        </div>
        <br>
        <div class="form-group">
            <label class="text-dark" for="stuEmail">Write Feedback:</label>
            <input type="text" id="f_content"   name="f_content" class="form-control">
        </div>
        <br>
        <button type="submit" name="submitFeedback" class="btn btn-danger">Submit
        </button>
        <br><br><br>
    </form>
</div>