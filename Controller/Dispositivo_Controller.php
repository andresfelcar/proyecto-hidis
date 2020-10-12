<?php

require_once "Modelo/Conexion.php";


class Dispositivo_Controller
{

    private function __construct()
    {
    }

    public static function Main($option, $array = [])
    {

        $dispo = new Dispositivo_Controller();
        switch ($option) {

            case 0:
                $result = $dispo->Consult($array);
                break;

            case 1:
                $result = $dispo->Insert($array);
                break;
        }
        return $result;
    }
    public function Consult($array)
    {

        $conexion = conexion::connection();
        
        $sql = "SELECT * from dispositivo WHERE idpaciente = '$array'";
        $result= $conexion->query($sql);
        return $result;

    }
    public function Insert($array)
    { 

        $Conexion = Conexion::connection();
           
            $stmt = $Conexion->prepare("INSERT INTO dispositivo (serie,modelo,idpaciente,clave) VALUES (?,?,?,?)");
            $stmt->bind_param("ssis", $array[1], $array[0], $array[4], $array[3]);
            $stmt->execute();
            echo "<script>alert('Dispositivo registrado con exito');</script>";
            return $stmt;
    
    }
   

}
