<?php
@session_start();
require_once "Controller/Controller.php";
$resultado = $_SESSION['user'];
if ($resultado == null) {
    header("location:login.php");
}
?>


<!doctype html>
<html lang="es">

<head>
    <!-- TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CARDIO</title>
    <link rel="icon" href="img/logo.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- ICONOS-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/style.css">
    <!-- CSS -->
    <link rel="stylesheet" href="css/ingreso.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <img id="logo_nav" src="img/logo.png" alt="logo">
        <img id="palpitar" src="img/corazon1.gif" alt="corazon">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="ingreso.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Historial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contactos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="familiares.php">Familiares</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Dispositivo</a>
                </li>
              
                <li class="nav-item">
                 <a class="nav-link ml-5" href="micuenta.html"><?php echo "$resultado[1]" ?></a>
                </li>
            </ul>
            <button type="button" class="btn btn-danger"><a href="salir.php">Cerrar Sesion</a></button>

        </div>
    </nav>
    <div class="fondo"></div>
    <div id="contenedor_1">

        <h2>CARDIO</h2>
        <div id="cardio">
            <i class="icon-warning"> Panico</i>
        </div>
    </div>
    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>