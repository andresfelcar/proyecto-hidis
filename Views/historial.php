<?php
@session_start();
require_once "Controller/Controller.php";
$resultado = $_SESSION['user'];
if ($resultado == null) {
  header("location:index.php");
}

require_once "Controller/Controller.php";

if ($resultado != null) {
  $idpaciente = $resultado[0];
  $control = new Controller();
  $paciente = $control->Paciente(0, $idpaciente);
  $mostrar = $paciente->fetch_row();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <!-- TAGS -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>CARDIO</title>
  <link rel="icon" href="Resources/img/logo.png" />
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
  <!-- ICONOS-->
  <link rel="stylesheet" href="Resources/css/style.css" />
  <link rel="stylesheet" href="Resources/fonts/style.css" />
  <!-- CSS -->
  <link rel="stylesheet" href="Resources/css/ingreso.css" />
  <link rel="stylesheet" href="Resources/css/tabla-histo.css" />
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
          
        <?php 
                
                if($mostrar[6]==1){
                  echo '<li><a class="nav-link" href="index.php?view=ingreso">Inicio</a></li>';
                  echo '<li><a class="nav-link" href="index.php?view=historial">Historial</a>';
                  echo '<li><a class="nav-link" href="index.php?view=familiares">Familiares</a></li>';
                  echo '<li><a class="nav-link" href="index.php?view=dispositivo">Dispositivo</a></li>';
                  
                      }
                      if($mostrar[6]==2){
                  echo '<li><a class="nav-link" href="index.php?view=ingreso">Inicio</a></li>';
                  echo '<li><a class="nav-link" href="index.php?view=historial">Historial</a></li>';
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
  <div class="container-fluid mt-4">
  <form method="POST" class="mt-4 mb-5">
      <input type="date" name="fecha1"/>
      <input type="date" name="fecha2"/>
      <button type="submit" class="btn btn-success">Buscar</button>
  </form>
    <div class="row">
      <div class="col-12" id="table-histo">
        <table class="table table-bordered mt-3" >
          <thead>
            <tr>

              <th scope="col">Doctor</th>
              <th scope="col">Sugerencia</th>
              <th scope="col">Gravedad</th>
              <th scope="col">Fecha</th>
              <th scope="col">Imprimir</th>



            </tr>
          </thead>
          <tbody>
            <?php
            $histo = new Controller();
            if (!empty($_POST['fecha1']) && !empty($_POST['fecha2'])) {
              $array = [];
              array_push($array, $_POST['fecha1'], $_POST['fecha2']);
              $event = $histo->Historial(0, $array);



              while ($mostrar = $event->fetch_row()) {

            ?>

                <tr>
                  <td>No hay recomendaciones actualmente></td>
                </tr>
              <?php
              }
            } else {
              $histo = new Controller();

              $event = $histo->Historial(4, $resultado[0]);

              while ($mostrar = $event->fetch_row()) {

              ?>

                <tr>

                  <td><?php echo $mostrar[2] ?></td>
                  <td><?php echo $mostrar[3] ?></td>
                  <td><?php echo $mostrar[1] ?></td>
                  <td><?php echo $mostrar[4] ?></td>
                  <td><a class="btn btn-warning" href="index.php?view=Print_Reco&printid=<?php echo $mostrar[0] ?>
                        " title="Imprimir Historial"><i class="icon-printer"></i> Imprimir</a></td>

                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>