<?php

include_once("../DB_Files/db.php");
include_once("ProfileHeader.php");

$stu_email=$_SESSION['stu_email'];
if(isset($_REQUEST['updatePass'])){
    if(($_REQUEST['stu_pass']=="")){
        $passmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">All Field Required</div>';
    }else{
        $sql="SELECT * FROM students WHERE stu_email='$stu_email'";
        $result=$conn->query($sql);
        if($result->num_rows==1){
            $stu_pass=$_REQUEST['stu_pass'];
            $stu_pass=md5($stu_pass);
            $sql="UPDATE students SET stu_pass='$stu_pass' WHERE stu_email='$stu_email'";
            if($conn->query($sql)==TRUE){
                $passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
            }else{
                $passmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Updated Field</div>';
            }
        }
    }

}



?>
<div class="col-sm-9 mt-5 ms-5">
    <div class="row">
        <div class="col-sm-6">
        <form method="POST" enctype="multipart/form-data" class="mx-5 mt-5">
        <p class="bg-dark text-white p-2 fw-bolder">Change Password</p>
        <?php  if(isset($passmsg))  {echo $passmsg;}?>
        <div class="form-group">
            <label class="text-dark" for="email">Email</label>
            <input type="text" id="email" class="form-control" value="<?php echo $_SESSION['stu_email'] ?>" readonly>
        </div>
        <br>
        <div class="form-group">
            <label class="text-dark" for="stu_pass">New Password</label>
            <input type="text" id="stu_pass" name="stu_pass"  class="form-control">
        </div>
        <br>
        <button type="submit" name="updatePass" class="btn btn-danger">Update
        </button>
        <br><br><br>
    </form>
        </div>
    </div>
</div>