<?php
@session_start();
require_once "Controller/Controller.php";
$resultado = $_SESSION['user'];
if ($resultado == null) {
    header("location:index.php?view=login");
}
if ($resultado != null) {
    $idpaciente = $resultado[0];
    $control = new Controller();
    $paciente = $control->Paciente(0, $idpaciente);
    $mostrar = $paciente->fetch_row();
}

if ($_SESSION['user'][6]==3) {
    header('location:index.php?view=notificacion');
}
?>

<!doctype html>
<html lang="es">

<head>
    <!-- TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CARDIO</title>
    <link rel="icon" href="Resources/img/logo.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- ICONOS-->
    <link rel="stylesheet" href="Resources/css/style.css">
    <link rel="stylesheet" href="Resources/fonts/style.css">
    <!-- CSS -->
    <link rel="stylesheet" href="Resources/css/entrar.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <img id="logo_nav" src="Resources/img/logo.png" alt="logo">
        <img id="palpitar" src="Resources/img/corazon1.gif" alt="corazon">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?view=ingreso">Inicio</a>
                </li>
                <?php

                if ($mostrar[6] == 1) {
                    echo '<li><a class="nav-link" href="index.php?view=historial">Historial</a>';
                    echo '<li><a class="nav-link" href="index.php?view=familiares">Familiares</a></a></li>';
                    echo '<li><a class="nav-link" href="index.php?view=dispositivo">Dispositivo</a></li>';
                }
                if ($mostrar[6] == 2) {
                    echo '<li><a class="nav-link" href="index.php?view=historial">Historial</a>';
                    echo '<li><a class="nav-link" href="index.php?view=dispositivo">Dispositivo</a></li>';
                }
                if ($mostrar[6] == 3) {
                    echo '<li><a class="nav-link" href="index.php?view=notificacion">Notificar</a></li>';
                    echo '<li><a class="nav-link" href="index.php?view=dispositivo">Dispositivo</a></li>';
                }
                ?>

                <li class="nav-item">

                    <a class="nav-link" href="index.php?view=perfil"><?php echo $mostrar[1]; ?></a>
                </li>

            </ul>
            <a class="btn btn-danger" href="index.php?view=salir">Cerrar Sesion</a>

        </div>
    </nav>
    <div class="fondo"></div>

    <div class="contend-1">
        <div class="container">
            <p class="text-center" id="gra-title">Hola <?php echo $mostrar[1]; ?> estas son tus pulsaciones</p>
            <canvas id="ChartPulse"></canvas>
            <button class="btn btn-warning" id="activator">Iniciar</button>
        </div>
        <div class="container">
            <p class="text-center" id="gra-title">¿Deseas conocer las clinicas cercanas a ti?</p>
            <div id="google-canvas"></div>
        </div>

    </div>
    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- GOOGLE MAPS API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsoIUo1Lu3ki3Fsvi_HsYoy-hCaOQuUBo&sensor=false"></script>
    <!-- CHART JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
    <script src="Resources/js/chart.js"></script>

</body>

</html>