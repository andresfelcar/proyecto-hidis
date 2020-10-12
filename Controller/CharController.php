<?php
require_once "Modelo/Conexion.php";
class Char_Controller
{
    private function __construct()
    {
    }
    public static function Main($option)
    {
        $Char = new Char_Controller();
        switch ($option) {
            case 0:
                $result = $Char->consult();
                break;
            case 1:
                $result = $Char->insert();
                break;
        }
        return $result;
    }

    public function insert(){
        date_default_timezone_set('America/Bogota');
        $date = date('Y-m-d h:i:s', time());
        $bpm= rand(60,90);
        $conexion = Conexion::connection();
        $sql = "INSERT INTO monitoreo (bpm,fecha) VALUES ($bpm,'$date')";
        return $conexion->query($sql);
    }

    public function consult()
    {
        $conexion = Conexion::connection();
        $sql = "SELECT bpm, fecha from monitoreo ORDER BY fecha";
        return $conexion->query($sql);
    }
}
?>