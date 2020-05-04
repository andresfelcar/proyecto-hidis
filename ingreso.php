<?php
@session_start();
require_once "Controller/Controller.php";
$resultado=$_SESSION['user'];
if($resultado==null){
  header("location:login.php");
}
?>


<!doctype html>
<html>

<head>
  <!-- TAGS -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CARDIO</title>
  <link rel="icon" href="img/logo.png">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
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
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Descripcion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Componentes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Opiniones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Referencias</a>
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
    <script src="js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>