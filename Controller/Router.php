<?php
require_once "Controller/Controller.php";
class Router
{
    function index()
    {
        include_once("Views/index.php");
    }
    function login()
    {
        include_once("Views/login.php");
    }
    function registro()
    {
        include_once("Views/registro.php");
    }
    function ingreso()
    {
        include_once("Views/ingreso.php");
    }
    function salir()
    {
        include_once("Views/salir.php");
    }
    function editar_familiar()
    {
        include_once("Views/editar_familiar.php");
    }
    function eliminar_familiar()
    {
        include_once("Views/eliminar_familiar.php");
    }
    function familiares()
    {
        include_once("Views/familiares.php");
    }
    function historial()
    {
        include_once("Views/historial.php");
    }
    function notificacion()
    {
        include_once("Views/notificacion.php");
    }
    function perfil()
    {
        include_once("Views/perfil.php");
    }
    function recuperacion()
    {
        include_once("Views/recuperacion.php");
    }
    function editar_reco()
    {
        include_once("Views/editar_reco.php");
    }
    function eliminar_reco()
    {
        include_once("Views/eliminar_reco.php");
    }
    function Print_Reco()
    {
        include_once("Views/Print_Reco.php");
    }
    function dispositivo()
    {
        include_once("Views/dispositivo.php");
    }
    public function chargrap($op)
    {
        switch ($op) {
            case "insert":
                $insert = new Controller;
                $result = $insert->Char(1);
                echo $result;
                break;

            case "consult":
                $consult = new Controller;
                $result = $consult->Char(0);
                $json = array();

                while ($row = mysqli_fetch_array($result)) {

                    $json[] = array(
                        'bpm' => $row['bpm'],
                        'date' => $row['fecha']
                    );
                }
                $jsonstring = json_encode($json);
                echo $jsonstring;
                break;
        }
    }
}
