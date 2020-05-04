<?php 
 
 require_once "Controller/Controller.php";

if (!empty($_POST['nombre']) && !empty($_POST['pass'])){

   $array=[];

   array_push($array, $_POST['nombre'],$_POST['apellido'],$_POST['email'],$_POST['pass']);
   $register = new Controller();
   $result =$register->Login(1,$array);

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
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
                        <input name="nombre" type="text" class="form-control" placeholder="Nombre">

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-users"></i></span>
                        </div>
                        <input name="apellido" type="text" class="form-control" placeholder="Apellido">

                    </div>
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
                        <button type="submit" value="Registrar" class="btn login_btn btn-warning"> Ingresar</button>
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
<script src="js/jquery.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</html>