<?php 

require_once "Modelo/Conexion.php";

Class Login_Controller{

    private function __construct(){}
 
    public static function Main($option,$array=[]){
    
     $login = new Login_Controller();
     switch($option){

        case 0:
            $result = $login->Consult($array);
        break;

        case 1:
            $result =$login->Insert($array);
        break;

        case 2:
            $result =$login->Update();
        break;

        case 3:
            $result =$login->Delete();
        break;
    }
         return $result;

    }
    public function Consult($array){

        $conexion=Conexion::connection();
        $sql = "SELECT * FROM paciente WHERE correo=? AND contrasena=MD5(?)";
        $stmt=$conexion->prepare($sql);
        $stmt->bind_param("ss",$array[0],$array[1]);
        $stmt->execute();
        $result=$stmt->get_result();
        return $result->fetch_row();

    }
    public function Insert($array) {
     
        echo "si entro";
        
        $Conexion = Conexion::connection();
        $sql="SELECT * FROM paciente WHERE correo = '$array[2]'";
        $result =$Conexion->query($sql);
        $filas=$result->num_rows;
        if($filas>0){
          echo  "<script> alert('Ya existe una cuenta con ese correo ');</script>";
        }else{
        $stmt=$Conexion->prepare("INSERT INTO paciente (nombres,apellidos,correo,contrasena) VALUES (?,?,?,MD5(?))");
        $stmt->bind_param("ssss", $array[0],$array[1],$array[2],$array[3]);
        $stmt->execute();
        echo "<script>alert('Usuario registrado con exito');</script>" ;
        return $stmt; 
      
    }
    }
    public function Update(){}
    public function Delete(){} 


}
?>