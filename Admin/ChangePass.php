<?php

include_once("../DB_Files/db.php");
include_once("Header.php");

$email=$_SESSION['email'];
if(isset($_REQUEST['updatePass'])){
    if(($_REQUEST['admin_pass']=="")){
        $passmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">All Field Required</div>';
    }else{
        $sql="SELECT * FROM admin WHERE email='$email'";
        $result=$conn->query($sql);
        if($result->num_rows==1){
            $pass=$_REQUEST['admin_pass'];
            $sql="UPDATE admin SET password='$pass' WHERE email='$email'";
            if($conn->query($sql)==TRUE){
                $passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
            }else{
                $passmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Updated Field</div>';
            }
        }
    }

}



?>
<div class="col-sm-9 mt-5">
<p class="bg-dark text-white p-2">Change Password</p>
    <div class="row">
        <div class="col-sm-6">
        <form method="POST" enctype="multipart/form-data" class="mx-5 mt-5">
        <?php  if(isset($passmsg))  {echo $passmsg;}?>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" class="form-control" value="<?php echo $_SESSION['email'] ?>" readonly>
        </div>
        <br>
        <div class="form-group">
            <label for="stu_pass">New Password</label>
            <input type="text" id="admin_pass" name="admin_pass"  class="form-control">
        </div>
        <br>
        <button type="submit" name="updatePass" class="btn btn-primary">Update
        </button>
        <br><br><br>
    </form>
        </div>
    </div>
</div>