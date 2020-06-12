<?php 
 @session_start();
 require_once "Controller/Controller.php";
 $resultado=$_SESSION['user'];
 if($resultado==null){
   header("location:index.php"); 
 } 

require_once "Controller/Controller.php";

if(!empty($_POST['nombredoctor']) && !empty($_POST['recomendacion'])){
 $array=[];
 array_push($array,$_POST['nombredoctor'],$_POST['nombreP'],
 $_POST['gravedad'],$_POST['recomendacion']);

$histori= new Controller();
$result=$histori->Historial(1,$array);



}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- TAGS -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>CARDIO</title>
    <link rel="icon" href="img/logo.png" />
    <!-- Bootstrap -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
    <!-- ICONOS-->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="fonts/style.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/ingreso.css" />
  </head>

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
                    <a class="nav-link" href="historial.php">Recomendaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Historial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contactos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Notificacion.php">Notificar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="familiares.php">Familiares</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Dispositivo</a>
                </li>
              
               
            </ul>
            <a class="btn btn-danger" href="salir.php">Cerrar Sesion</a>

        </div>
    </nav>
  <div class="container-fluid">
    <div class="row justify-content-center mt-5">
      <div class="col-4">
        <form action="" method="POST">
          <div class="form-group">
            <label>Nombre Doctor</label>
            <input
            name="nombredoctor"
              type="text"
              class="form-control"
              id="exampleFormControlInput1"
              placeholder="Nombre"
            />
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Paciente</label>
            <select name="nombreP" class="form-control" id="exampleFormControlSelect1">
              <option>Paciente...</option>
              <option>Andres Caro</option>
              <option>Gustavo Adolfo</option>
              <option>Juan David</option>
              <option>Nairo Quintana</option>
              <option>Llormi</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Gravedad</label>
            <select name="gravedad" class="form-control" id="exampleFormControlSelect1">
              <option>Gravedad...</option>
              <option>Baja</option>
              <option>Normal</option>
              <option>Media</option>
              <option>Alta</option>
              <option>Urgente</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Recomendacion</label>
            <textarea
              name="recomendacion"            
              class="form-control"
              id="exampleFormControlTextarea1"
              rows="3"
            ></textarea>
          </div>
          <div class="form-group text-center">
          <button type="submit" class="btn btn-primary ">
            Guardar
          </button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <body>
    <!-- SCRIPTS -->
    <script src="js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
