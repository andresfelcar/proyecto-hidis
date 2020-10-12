<?php
@session_start();
require_once "Controller/Controller.php";
$loginError = "";
if (!empty($_POST['email']) && !empty($_POST['pass'])) {

    $login = new Controller();
    $array = [];
    array_push($array, $_POST['email'], $_POST['pass']);
    $_SESSION['user'] = $login->Login(0, $array);
    $resultado = $_SESSION['user'];

    if ($resultado != null) {
        header("location:index.php?view=ingreso");
    } else {
        $_SESSION['user'] = null;
        $loginError = "Usuario o contraseña incorrectos";
    }
} else {
    $loginError = "Ingrese los datos";
}

if (isset($_POST['btn_restart'])) {
    $cambio = new Controller();
    $array = [];
    $token = uniqid();
    array_push($array, $token, $_POST['email_restart']);
    $cambio->Login(2, $array);
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso</title>
    <link rel="icon" href="Resources/img/logo.png">

    <!--Bootsraps-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!--Estilo-->
    <link rel="stylesheet" href="Resources/css/register_and_login.css">
    <!-- ICONOS-->
    <link rel="stylesheet" href="Resources/fonts/style.css">
</head>

<body class="scroll">
    <!--Loader-->
    <div id="carga">
        <div id="carga2"></div>
    </div>

    <div class="container">
        <div class="row justify-content-center mt-4">
            
                <div class="card card-login">
                    <div class="card-body">
                        <h4 class="card-title d-flex justify-content-center">Ingreso</h4>
                        <form method="POST" id="IngresoLogin">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-mail2"></i></span>
                                </div>
                                <input name="email" type="text" class="form-control" placeholder="Correo" id="correo">

                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-key"></i></span>
                                </div>
                                <input name="pass" type="password" class="form-control" placeholder="Contraseña " id="contrasena">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn login_btn btn-warning btn-block" id="boton"> Ingresar</button>
                                <a href="" id="a_restart">¿Olvidó su contraseña?</a>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center links">
                            ¿No tienes una cuenta?
                        </div>
                        <a href="index.php?view=registro" class="btn btn-success d-flex justify-content-center">Registrate</a>
                    </div>
                </div>
            </div>



            <div class="row justify-content-center mt-4">
                <div class="card" id="card_restart">
                    <div class="card-body">
                        <h4 class="card-title d-flex justify-content-center">Ingrese su correo</h4>

                        <form action="" method="POST">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-mail2"></i></span>
                                </div>
                                <input name="email_restart" type="email" class="form-control" placeholder="Correo">
                                <button name="btn_restart" type="submit" class="btn login_btn btn-warning btn-block mt-2">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        


    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="Resources/js/loader.js"></script>
<script src="Resources/js/login.js"></script>

</html>