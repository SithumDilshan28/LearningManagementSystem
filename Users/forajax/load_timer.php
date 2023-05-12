<?php 
session_start();
if(!isset($_SESSION["end_time"])){
    echo "00:00:00";
}else{
    $time1=gmdate("H:i:s",strtotime($_SESSION["end_time"])-strtotime(date("Y-m-d H:i:s")));
    if(strtotime($_SESSION["end_time"])<strtotime(date("Y-m-d H:i:s"))){
        echo "00:00:00";
    }else{
        echo $time1;
    }
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>