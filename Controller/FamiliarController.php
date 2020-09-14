<?php

/* Este archivo es el controlador específico para el tipo de usuario: FAMILIAR
 en el se requiere la conexion, se crea una clase con el nombre del modulo que posteriormente será instanciada
 en el método principal para condicionar que función del CRUD se va a ejecutar (mediante un SWITCH), cada una de las funciones
 son consultas a la base de datos segun la opción que viene desde el controlador principal CONTROLLER.php y a su
 vez este trae la informació desde la vista. Dichas funciones del CRUD devuelve una respuesta para el usuario*/
require_once "Modelo/Conexion.php";

class FamiliarController
{
    private function __construct()
    {
    }    
    /**
     * Main
     * Recibe una opción la cual entra en una condición  según la misma entrará a cada una de las funciones
     * @param  mixed $option
     * @param  mixed $array
     * @return $result
     */
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
    /**
     * Consult
     * consulta todos los datos del familiar según el id del paciente(asociado) traido desde la vista
     * @param  mixed $array
     * @return $conexion
     */
    public function Consult($array)
    {
        $conexion = Conexion::connection();
        $sql = "SELECT * from familiar WHERE idpaciente='$array'";
        return $conexion->query($sql);
    }
    
    /**
     * Consultfamiliaraso
     * Consulta todos los datos del familiar según su id
     * @param  mixed $array
     * @return $conexion
     */
    public function Consultfamiliaraso($array)
    {
        $conexion = Conexion::connection();
        $sql = "SELECT * from familiar WHERE idfamiliar='$array'";
        return $conexion->query($sql);
    }
    
    /**
     * Insert
     * inserta un nuevo familiar al sistema con sus datos correspondientes traidos desde la vista
     * @param  mixed $array
     * @return $stmt
     */
    public function Insert($array)
    {
        $conexion = Conexion::connection();
        $sql = "INSERT INTO familiar (nombres,apellidos,documento_id,telefono,movil,correo,
        direccion_residencia,direccion_laboral,idpaciente,contrasena) VALUES (?,?,?,?,?,?,?,?,?,MD5(?))";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssssssssis", $array[0], $array[1], $array[2], $array[3], $array[4], $array[5], $array[6], $array[7], $array[10], $array[9]);
        $stmt->execute();
    }
        
    /**
     * Update
     * Actualiza los datos del paciente según su id que se encuentra en la posición numero 10 del arreglo
     * @param  mixed $array
     * @return $stmt
     */
    public function Update($array)
    {
        $conexion = Conexion::connection();
        $sql = "UPDATE familiar SET nombres=?,apellidos=?,documento_id=?,telefono=?,
        movil=?,correo=?,direccion_residencia=?,direccion_laboral=?,idpaciente=?,contrasena=? WHERE idfamiliar=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssssssssisi", $array[0], $array[1], $array[2], $array[3], $array[4], $array[5], $array[6], $array[7], $array[8], $array[9], $array[10]);
        $stmt->execute();
    }
        
    /**
     * Delete
     * Elimina los datos del familiar según su id
     * @param  mixed $array
     * @return $stmt
     */
    public function Delete($array)
    {
        $conexion = Conexion::connection();
        $sql = "DELETE FROM familiar WHERE idfamiliar='$array[0]'";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
    }
}
