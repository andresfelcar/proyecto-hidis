<?php
class historialController
{
    private function __construct()
    {
    }

    public static function Main($option, $array = [])
    {
        $histo = new historialController();
        switch ($option) {
            case 0:
                $result = $histo->Consult($array);
                break;
            case 1:
                $result = $histo->Insert($array);
                break;
            case 2:
                $result = $histo->Update($array);
                break;
            case 3:
                $result = $histo->Delete($array);
                break;
            case 4:
                $result = $histo->Consultforid($array);
                break;
            case 5:
                $result = $histo->ViewReco($array);
            break;

        }
        return $result;
    }

    public function Consult($array)
    {
        $conexion = conexion::connection();

        if ($array == null) {
            $sql = "SELECT idevento,gravedad,notificacion,
        recomendacion,fecha_suceso,nombreP from evento";

            $result = $conexion->query($sql);
        } else {

            $sql = "SELECT idevento,gravedad,notificacion,
            recomendacion,fecha_suceso,nombreP from evento WHERE  fecha_suceso BETWEEN '$array[0]' AND '$array[1]'";
            $result = $conexion->query($sql);
        }
        return $result;
    }
    public function Consultforid($array)
    {
      
        $conexion = conexion::connection();
        
        $sql = "SELECT * from evento WHERE idpaciente = '$array'";
        $result= $conexion->query($sql);
        return $result;

    }
    public function Insert($array)
    {

        $conexion = conexion::connection();
        date_default_timezone_set('America/Bogota');
        $date = date('Y-m-d h:i:s', time());

        array_push(
            $array,
            $_POST['nombredoctor'],
            $_POST['nombreP'],
            $_POST['gravedad'],
            $_POST['recomendacion'],
            $_POST['codigoP']

        );

        $stmt = $conexion->prepare("INSERT INTO evento (notificacion,nombreP,gravedad,fecha_suceso,recomendacion,idpaciente)
       VALUES (?,?,?,'$date',?,?)");
        $stmt->bind_param("ssssi", $array[0], $array[1], $array[2], $array[3],$array[4]);
        $stmt->execute();
        return $stmt;
    }

    public function Update($array)
    {
        echo "entro al update";
        $conexion = conexion::connection();
        $sql = "UPDATE evento SET gravedad=?,recomendacion=? WHERE idevento='$array[2]'";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $array[0], $array[1]);
        $stmt->execute();
    }

    public function Delete($array)
    {

        $conexion = conexion::connection();

        $sql = "DELETE FROM evento WHERE idevento=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $array[0]);
        $stmt->execute();
    }

    public function ViewReco($array)
    {
        
        

        $conexion = conexion::connection();
        
        $sql = "SELECT * from evento WHERE idevento = '$array[0]'";
        $result= $conexion->query($sql);
        return $result;
        
    
    }

  
    
}
