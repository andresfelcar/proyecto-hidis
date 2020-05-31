<?php 

require_once "Login_Controller.php";
require_once "FamiliarController.php";
class Controller{

    public function Login($option,$array=[]){
        return Login_Controller::Main($option,$array);
    }
    public function Familiar($option,$array=[]){
        return FamiliarController::Main($option,$array);
    }

   
}

?>