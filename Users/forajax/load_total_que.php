<?php
session_start();
include_once("../../DB_Files/db.php");

$total_que=0;
$resl=mysqli_query($conn,"SELECT * FROM add_ques WHERE catergory='$_SESSION[exam_category]'");
$total_que=mysqli_num_rows($resl);
echo $total_que;

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>