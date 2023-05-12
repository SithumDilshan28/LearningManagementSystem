<?php
include_once("Header.php");
include_once("../DB_Files/db.php");


if (isset($_REQUEST['certificateSubmitBtn'])) {
        $imgname=$_FILES['certificate']['name'];
        echo '<br>'; 
        $extension=pathinfo($imgname,PATHINFO_EXTENSION);

        $rename='Certificate';
        $newname=$rename.'.'.$extension;
        $filename=$_FILES['certificate']['tmp_name'];
        if(move_uploaded_file($filename,'../Images/Certificate/'.$newname)){
            $sql = "INSERT INTO certificate( certificate) VALUES ('$newname')";
            if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Certificate Added Successfully</div>';
            echo "<script>setTimeout(()=>{window.location.href='AddCertificate.php';},300);</script>";}
        }else{
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Certificate Added Failed</div>';
        }
    
}


?>


<div class="col-sm-6 mt-5 jumbotron">
    <h3 class="text-center">Add New Certificate</h3>
    <form action="" method="POST" enctype="multipart/form-data">
    <br>
        <?php if (isset($msg)) {
            echo $msg;
        } ?><br>
        <br><br><br><br>
        <div class="form-group">
            <label for="course_img">Add Certificate</label>
            <br><br>
            <input type="file" id="certificate" name="certificate" class="form-control-file">
            <br><br>
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-danger" type="submit" id="blogSubmitBtn" name="certificateSubmitBtn">Submit</button>
            <a href="Dashboard.php" class="btn btn-secondary">Close</a>
        </div>



    </form>
</div>