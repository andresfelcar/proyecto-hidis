<?php 
require_once "historialController.php";
require_once "Login_Controller.php";
require_once "FamiliarController.php";
require_once "PacienteController.php";
require_once "Dispositivo_Controller.php";
require_once "CharController.php";
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
    public function Paciente($option,$array=[]){
        return PacienteController::Main($option,$array);
    }
    public function Dispositivo($option,$array=[]){
        return Dispositivo_Controller::Main($option,$array);
    }
    public function Char($option){
        return Char_Controller::Main($option);
    }
}

?>