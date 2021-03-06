<?php
@session_start();
require_once "Controller/Controller.php";
$resultado = $_SESSION['user'];
$idpaciente = $resultado[0];
if ($resultado == null) {
  header("location:index.php?view=index");
}
if (!empty($_POST['nombreF']) && !empty($_POST['apellidoF'])) {
  $array = [];
  error_reporting(E_ALL ^ E_NOTICE);
  array_push(
    $array,
    $_POST['nombreF'],
    $_POST['apellidoF'],
    $_POST['documentoF'],
    $_POST['telefonoF'],
    $_POST['celularF'],
    $_POST['correoF'],
    $_POST['direccionF'],
    $_POST['direccionlF'],
    $_POST['codigoP'],
    $_POST['contraseñaF'],
    $idpaciente
);

  $familia = new Controller();
  $result = $familia->Familiar(1, $array);
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
<html>

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

  <div class="container-fluid pt-5">
    <div class="row ">
      <div class="col-sm-12 col-md-12 col-xl-6 mb-5 mt-4">
        <h4 class="mb-4 text-center">Familiares Registrados</h4>


        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Codigo</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Telefono</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $control = new Controller();
            $familiares = $control->Familiar(0, $idpaciente);
            while ($mostrar = $familiares->fetch_row()) {
            ?>

              <tr>
                <td><?php echo $mostrar[0] ?></td>
                <td><?php echo $mostrar[1] ?></td>
                <td><?php echo $mostrar[2] ?></td>
                <td><?php echo $mostrar[5] ?></td>
                <td><a class="btn btn-warning" href="index.php?view=editar_familiar&updateid=<?php echo $mostrar[0] ?>
                        " title="Editar Familiar"><i class="icon-pencil"></i></a></td>

                <td><a class="btn btn-danger" href="index.php?view=eliminar_familiar&updateid=<?php echo $mostrar[0] ?>
                        " title="Eliminar Familiar"><i class="icon-bin"></i></a></td>

              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
      <form method="POST" class="col-sm-12 col-md-12 col-xl-6 mb-5 text-center text-center">
        <h4 class="text-center">Registrar familiar</h4>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="exampleFormControlInput1 mt-4">Nombre</label>
              <input name="nombreF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1 mt-4">Apellido</label>
              <input name="apellidoF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="apellido del familiar" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1 mt-4">Documento</label>
              <input name="documentoF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="documento del familiar" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1 mt-4">Telefono</label>
              <input name="telefonoF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="telefono del familiar" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1 mt-4">Celular</label>
              <input name="celularF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="celular del familiar" required>
            </div>
          </div>


          <div class="col">
            <div class="form-group">
              <label for="exampleFormControlInput1 mt-4">Correo</label>
              <input name="correoF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="correo del familiar" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1 mt-4">Direccion</label>
              <input name="direccionF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="direccion del familiar" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1 mt-4">Direccion Laboral</label>
              <input name="direccionlF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="direccion laboral del familiar">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1 mt-4">Codigo del paciente</label>
              <input name="codigoP" type="number" class="form-control" id="exampleFormControlInput1" placeholder="codigo del paciente" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1 mt-4">Contraseña</label>
              <input name="contraseñaF" type="password" class="form-control" id="exampleFormControlInput1" placeholder="contraseña del familiar" required>
            </div>



          </div>
          <button type="submit" class="btn btn-primary btn-block">Registrar</button>
        </div>
      </form>

    </div>

  </div>
  <!-- SCRIPTS -->
  <script src="js/bootstrap.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>