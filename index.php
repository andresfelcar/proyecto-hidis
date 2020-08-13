<?php
    require_once "Controller/Router.php";
    $router= new Router();

    if (!empty($_GET['view'])) {
        $name=$_GET['view'];
        
        if (method_exists($router,$name)) {
            $router->$name();
        }else{
            $router->index();
        }
    }else{
        $router->index();
    }

    
?>