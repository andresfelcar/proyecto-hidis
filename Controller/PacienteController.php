<?php

require_once "Modelo/Conexion.php";

class PacienteController
{

    private function __construct()
    {
    }

    public static function Main($option, $array = [])
    {
        $paciente = new PacienteController();
        switch ($option) {

            case 0:
                $result = $paciente->Consult($array);
                break;

            case 1:
                $result = $paciente->Update($array);
                break;

            case 2:
                $result = $paciente->Delete($array);
                break;
        }
        return $result;
    }
    public function Consult($array){
        $conexion = Conexion::connection();
        $sql = "SELECT * from paciente WHERE idpaciente='$array'";
        return $conexion->query($sql);
    }

    public function Update($array){
        $conexion = Conexion::connection();
        $sql = "UPDATE paciente SET nombres=?,apellidos=? WHERE idpaciente=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssi", $array[0], $array[1], $array[2]);
        $stmt->execute();
    }
    public function Delete($array){

        $conexion = Conexion::connection();

        $sql = "DELETE FROM paciente WHERE idpaciente='$array[0]'";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
    }
}

?>