<?php 
require_once "historialController.php";
require_once "Login_Controller.php";
require_once "FamiliarController.php";
class Controller{
    
    public function Login($option,$array=[]){
        return Login_Controller::Main($option,$array);
    }
    public function Familiar($option,$array=[]){
        return FamiliarController::Main($option,$array);
    }
    public function Historial($option,$array=[]){
        return historialController::Main($option,$array);
    }


   
}

?>