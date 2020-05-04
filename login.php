<?php
@session_start();
require_once "Controller/Controller.php";
$loginError ="";
if (!empty($_POST['email']) && !empty($_POST['pass'])){

    $login=new Controller();
    $array=[];
    array_push($array,$_POST['email'],$_POST['pass']);
    $_SESSION['user']=$login->Login(0,$array);
    $resultado=$_SESSION['user'];
    if($resultado !=null){
        header("location:ingreso.php");
    } else {
        $_SESSION['user']=null;
        $loginError="Usuario o contraseña incorrectos";
    }
}else{
    $loginError="Ingrese los datos";
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso</title>
    <link rel="icon" href="img/logo.png">

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--Estilo-->
    <link rel="stylesheet" href="css/register_and_login.css">
    <!-- ICONOS-->
    <link rel="stylesheet" href="fonts/style.css">
</head>

<body class="scroll">
    <!--Loader-->
    <div id="carga">
        <div id="carga2"></div>
    </div>
    <div class="contenedor">
        <div class="d-flex">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title d-flex justify-content-center">Login</h4>
                    <form action="" method="POST">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-mail2"></i></span>
                            </div>
                            <input name="email" type="text" class="form-control" placeholder="Correo">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-key"></i></span>
                            </div>
                            <input name="pass" type="password" class="form-control" placeholder="Contraseña">
                        </div>
                       
                        <div class="form-group">
                            <button type="submit" value="Registrar" class="btn btn-warning"> Ingresar</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        ¿No tienes una cuenta?
                    </div>
                    <a href="registro.php" class="btn btn-success d-flex justify-content-center">Registrate</a>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/jquery.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</html>