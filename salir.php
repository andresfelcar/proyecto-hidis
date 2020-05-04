<?php 
@session_start();
$_SESSION['user']=null;
@session_destroy();
header("location:login.php");
?>