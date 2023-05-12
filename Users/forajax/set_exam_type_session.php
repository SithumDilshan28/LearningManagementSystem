<?php
session_start();
include_once("../../DB_Files/db.php");
$exam_category=$_GET["exam_category"];
$_SESSION["exam_category"]=$exam_category;
$res=mysqli_query($conn,"SELECT * FROM exam_category WHERE exam_name='$exam_category'");
while($row=mysqli_fetch_array($res)){
    $_SESSION["exam_time"]=$row["exam_time"];
}

$date=date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date."+$_SESSION[exam_time] minutes"));
$_SESSION["exam_start"]="yes";


?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>