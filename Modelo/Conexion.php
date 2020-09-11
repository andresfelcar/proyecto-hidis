<?php 

/*Creamos una clase llamada conexion en la cual se encuentra un método que se encarga de conectarnos
a la base de datos, hay que tener en cuenta los parametros que le pasamos, dichos parametros son:
HOST, USUARIO, CONTRASEÑA, NOMBRE DE LA BASE DE DATOS*/
class Conexion{
    private function __construct(){}

    public static function connection(){
    return mysqli_connect("localhost","root","","hidis_database");
    }
}
?>