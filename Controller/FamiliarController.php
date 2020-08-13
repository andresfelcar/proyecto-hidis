<?php

require_once "Modelo/Conexion.php";

class FamiliarController
{
    private function __construct()
    {
    }
    public static function Main($option, $array = [])
    {

        $familia = new FamiliarController();
        switch ($option) {
            case 0:
                $result = $familia->Consult($array);
                break;
            case 1:
                $result = $familia->Insert($array);
                break;
            case 2:
                $result = $familia->Update($array);
                break;
            case 3:
                $result = $familia->Delete($array);
                break;
                case 4:
                    $result = $familia->Consultfamiliaraso($array);
                    break;
        }
        return $result;
    }
    public function Consult($array)
    {
        $conexion = Conexion::connection();
        /*if($array[11]=1){
            $sql = "SELECT * from familiar";
            return $conexion->query($sql);
        }*/
        $sql = "SELECT * from familiar WHERE idpaciente='$array'";
        
        return $conexion->query($sql);
    }

    public function Consultfamiliaraso($array)
    {
        $conexion = Conexion::connection();
        $sql = "SELECT * from familiar WHERE idfamiliar='$array'";
        return $conexion->query($sql);
    }

    public function Insert($array)
    {

        $conexion = Conexion::connection();


        $sql = "INSERT INTO familiar (nombres,apellidos,documento_id,telefono,movil,correo,
        direccion_residencia,direccion_laboral,idpaciente,contrasena) VALUES (?,?,?,?,?,?,?,?,?,MD5(?))";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssssssssis", $array[0], $array[1], $array[2], $array[3], $array[4], $array[5], $array[6], $array[7], $array[10], $array[9]);
        $stmt->execute();
    }
    public function Update($array)
    {

        $conexion = Conexion::connection();
        $sql = "UPDATE familiar SET nombres=?,apellidos=?,documento_id=?,telefono=?,
        movil=?,correo=?,direccion_residencia=?,direccion_laboral=?,idpaciente=?,contrasena=? WHERE idfamiliar=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssssssssisi", $array[0], $array[1], $array[2], $array[3], $array[4], $array[5], $array[6], $array[7], $array[8], $array[9], $array[10]);
        $stmt->execute();
    }
    public function Delete($array)
    {
        echo "entro al delete";
        $conexion = Conexion::connection();

        $sql = "DELETE FROM familiar WHERE idfamiliar='$array[0]'";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
    }
}
