<?php

<<<<<<< HEAD
if (!empty($_POST['nombre']) && !empty($_POST['contraseña'])){
=======
require_once "Controller/Controller.php";
>>>>>>> a8ad0bdd11d77b61f66cc2edea4833cdfbdf355e

if (!empty($_POST['nombre']) && !empty($_POST['pass'])) {

<<<<<<< HEAD
   array_push($array, $_POST['nombre'],$_POST['apellido'],$_POST['correo'],$_POST['contraseña']);
   $register = new Controller();
   $result =$register->Login(1,$array);
=======
    $array = [];
>>>>>>> a8ad0bdd11d77b61f66cc2edea4833cdfbdf355e

    array_push($array, $_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['pass']);
    $register = new Controller();
    $result = $register->Login(1, $array);
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="icon" href="img/logo.png">
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!--Estilo-->
    <link rel="stylesheet" href="css/register_and_login.css">
    <!-- ICONOS-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/style.css">
</head>

<body class="scroll">
    <!--Loader-->
    <div id="carga">
        <div id="carga2"></div>
    </div>
    <div class="contenedor">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h4 class="card-title d-flex justify-content-center">Registro</h4>
                <form action="" method="POST">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-user"></i></span>
                        </div>
                        <input name="nombre" type="text" class="form-control" placeholder="Nombre" id="nombre">

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-users"></i></span>
                        </div>
                        <input name="apellido" type="text" class="form-control" placeholder="Apellido" id="apellido">

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-mail2"></i></span>
                        </div>
                        <input name="correo" type="text" class="form-control" placeholder="Correo" id="correo">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-key"></i></span>
                        </div>
                        <input name="contraseña" type="password" class="form-control" placeholder="Contraseña" id="contrasena">
                    </div>

                    <div class="form-group">
                        <button type="button" value="Registrar" class="btn login_btn btn-warning" id="boton" onclick="validarFormulario()"> Registrar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer ">
                <div class="d-flex justify-content-center links">
                    <p>¿Ya tienes una cuenta?</p>
                </div>
                <a href="login.php" class="btn btn-success d-flex justify-content-center">Ingresa</a>
            </div>
        </div>
    </div>

</body>


<!-- SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script src="js/validacion.js"></script>

</html>