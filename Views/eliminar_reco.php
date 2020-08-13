<?php
@session_start();
require_once "Controller/Controller.php";

$resultado= $_SESSION['user'];
if($resultado == null) {
 
    header("Location:index.php?view=login");

}
 
$delete = new Controller();
$code=$_GET['updateid'];
if(!empty($_GET['updateid'])){
  
 $array=[];

 array_push($array,$code);

    $familiarvalues=$delete->Historial(3,$array);
    header("Location:index.php?view=historial");
   
}

?>