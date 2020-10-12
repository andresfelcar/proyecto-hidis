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
 $_POST['gravedad'],$_POST['recomendacion'],$_POST['codigoP']);

$histori= new Controller();
$result=$histori->Historial(1,$array);

}
if ($resultado != null) {
  $idpaciente = $resultado[0];
  $control = new Controller();
  $paciente = $control->Paciente(0, $idpaciente);
  $mostrar = $paciente->fetch_row();
} 

if ($_SESSION['user'][6]==3) {
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
    <link rel="icon" href="Resources/img/logo.png" />
    <!-- Bootstrap -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
    <!-- ICONOS-->
    <link rel="stylesheet" href="Resources/css/style.css" />
    <link rel="stylesheet" href="Resources/fonts/style.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="Resources/css/ingreso.css" />
  </head>

  <nav class="navbar navbar-expand-lg navbar-light">
    <img id="logo_nav" src="Resources/img/logo.png" alt="logo">
    <img id="palpitar" src="Resources/img/corazon1.gif" alt="corazon">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <?php 
                
                if($mostrar[6]==1){
                  echo '<li><a class="nav-link" href="index.php?view=ingreso">Inicio</a></li>';
                  echo '<li><a class="nav-link" href="index.php?view=historial">Recomendaciones</a>';
                  echo '<li><a class="nav-link" href="index.php?view=familiares">Familiares</a></li>';
                  echo '<li><a class="nav-link" href="index.php?view=dispositivo">Dispositivo</a></li>';
                  
                      }
                      if($mostrar[6]==2){
                  echo '<li><a class="nav-link" href="index.php?view=ingreso">Inicio</a></li>';
                  echo '<li><a class="nav-link" href="index.php?view=historial">Recomendaciones</a></li>';
                  echo '<li><a class="nav-link" href="index.php?view=dispositivo">Dispositivo</a></li>';
                      }
                      if($mostrar[6]==3){
                  echo '<li><a class="nav-link" href="index.php?view=notificacion">Notificar</a></li>';
                  echo '<li><a class="nav-link" href="index.php?view=dispositivo">Dispositivo</a></li>';
                  echo '';
                }
                ?>
      <li><a class="nav-link" href="index.php?view=Perfil"><?php echo $mostrar[1]?></a></li>
      </ul>
      <a class="btn btn-danger" href="index.php?view=salir">Cerrar Sesion</a>

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
            <input type="text" name="nombreP" class="form-control" placeholder="Nombre Paciente" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Codigo Paciente</label>
            <input type="text" name="codigoP" class="form-control" placeholder="Codigo Paciente" aria-label="Username" aria-describedby="basic-addon1">
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
    <script src="./Resoruces/js/miselector.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
}else{
  header('location:index.php?view=ingreso');
}
?>