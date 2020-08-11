<?php
@session_start();
require_once "Controller/Controller.php";
$resultado = $_SESSION['user'];
$idpaciente = $resultado[0];
if ($resultado == null) {
  header("location:index.php");
}
if ($_POST['act-pac']=1) {
    $control = new Controller();
    $paciente = $control->Paciente(0, $idpaciente);
    $mostrar = $paciente->fetch_row();
    
}

if (!empty($_POST['nombrePac']) && !empty($_POST['apellidoPac'])) {
  $array = [];
  error_reporting(E_ALL ^ E_NOTICE);
  array_push(
    $array,
    $_POST['nombrePac'],
    $_POST['apellidoPac'],
    $idpaciente
  );

  $edpaciente = new Controller();
  $result = $edpaciente->Paciente(1, $array);
  header("location:perfil.php");
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- TAGS -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PERFIL</title>
    <link rel="icon" href="img/logo.png" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
    <!-- ICONOS-->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="fonts/style.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/perfil.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <img id="logo_nav" src="img/logo.png" alt="logo" />
        <img id="palpitar" src="img/corazon1.gif" alt="corazon" />
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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







    <div class="container pt-5">

        <div class="row justify-content-center text-center">
            <form action="">
                <h4 class="text-center">Mi cuenta</h4>
                <h4 class="m-3"><?php echo $mostrar[1]; ?> bienvenido</h4>
                <h5 class="m-3">¿Qué quieres hacer?</h5>
                <button class="btn btn-primary" name="act-pac" value="1">Actualizar mis datos</button>
                <button class="btn btn-danger">Eliminar mi cuenta</button>
            </form>
        </div>


        <div class="row justify-content-center pt-5">
            <form method="POST" class="col-sm-8 col-md-8 col-xl-8 mb-5 text-center">
                <h4 class="text-center">Actualizar</h4>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlInput1 mt-4">Nombre</label>
                            <input name="nombrePac" type="text" class="form-control"
                                placeholder="nombre del familiar" required value="<?php echo $mostrar[1];?>">
                        </div>
                        
                    </div>


                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlInput1 mt-4">Apellido</label>
                            <input name="apellidoPac" type="text" class="form-control"
                                placeholder="apellido del familiar" required value="<?php echo $mostrar[2];?>">
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-success btn-block">Listo</button>
            </form>

        </div>



    </div>
    <script src="js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>








</body>

</html>