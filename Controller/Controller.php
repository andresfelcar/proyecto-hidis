<?php
/* Creamos la clase controller la cual cumple el papel de ser un intermediario entre los demás controladores
es decir, los controladores específicos para cada uno de los módulos, este controlador principal redirige
la información de cada una de las vistas al respectivo Main*/ 
require_once "historialController.php";
require_once "Login_Controller.php";
require_once "FamiliarController.php";
require_once "PacienteController.php";
/* Pedimos los archivos necesarios de cada uno de los controladores específicos*/
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
    /*Métodos(funciones) con el nombre de los módulos, estos tienen como parámetro una opción 
    y un arreglo con los datos provenientes de cada vista estos métodos devuelven el valor de las consultas 
    y operaciones que se realizan en los archivos*/
}

?>