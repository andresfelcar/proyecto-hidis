<?php
@session_start();
require_once "Controller/Controller.php";

$resultado= $_SESSION['user'];
if($resultado == null) {
 
    header("Location:index.php");

}
 
$delete = new Controller();
$code=$_GET['update_id'];
if(!empty($_GET['update_id'])){
  
 $array=[];

 array_push($array,$code);

    $familiarvalues=$delete->historial(3,$array);
    header("Location:historial.php");
   
}

?>