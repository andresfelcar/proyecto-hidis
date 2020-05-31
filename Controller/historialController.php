<?php
class historialController
{
    private function __construct()
    {
    }

    public static function Main($option, $array = [])
    {
        $histo= new historialController();
        switch ($option) {
            case 0:
                $result = $histo->Consult($array);
                break;
                case 1:
                    $result = $histo->Insert($array);
                    break;
        }
        return $result;
    }

    public function Consult($array)
    {
        $conexion = conexion::connection();

        $sql = "SELECT idevento,gravedad,notificacion,
        recomendacion,fecha_suceso,nombreP from evento";

        $result=$conexion->query($sql);
        
       
        return $result;
       
    }
    public function Insert($array)
    {
         
       $conexion=conexion::connection();
       date_default_timezone_set('America/Bogota');
       $date = date('Y-m-d h:i:s', time());
      
       array_push($array,$_POST['nombredoctor'],$_POST['nombreP'],
       $_POST['gravedad'],$_POST['recomendacion']);

       $stmt= $conexion->prepare("INSERT INTO evento (notificacion,nombreP,gravedad,fecha_suceso,recomendacion)
       VALUES (?,?,?,'$date',?)");
       $stmt->bind_param("ssss",$array[0],$array[1],$array[2],$array[3]);
       $stmt->execute();
       return $stmt;
       
    }
}
