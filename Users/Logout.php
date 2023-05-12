<?php
session_start();

$_SESSION =array();

if(isset($_COOKIE[session_name()])){
    setcookie(session_name(),'',time()-86400,'/');
}
session_destroy();
header('Location:../index.php');
?>