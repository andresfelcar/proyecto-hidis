<?php
    /*Este index fuciona como enrutador a las demás vistas*/
    require_once "Controller/Router.php";
    /* Es necesario requerir el router que se encuentra en la carpeta controller*/
    $router= new Router();
    /*Lo instanciamos*/

    /*Realizamos una condición la cual si la variable vista que viene por el metodo GET es diferente 
    de vacio entonces se la asigna al nombre de lo contrario lo envia directo a la página principal, 
    dentro de la condición mencionada*/
    if (!empty($_GET['view'])) {
        $name=$_GET['view'];
        
    /*se encuentra otra en la cual se pregnta que si existe un método
    con ese nombre en el controlador, si es asi lo envía a la vista correspondiente de lo contrario 
    lo envia directo a la página principal*/
        if (method_exists($router,$name)) {
            if(!empty($_GET['op'])){
                $router->$name($_GET['op']);
                return;
            }
            $router->$name();
        }else{
            $router->index();
        }
    }else{
        $router->index();
    }

    
?>