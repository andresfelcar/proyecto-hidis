<?php
@session_start();
require_once "Controller/Controller.php";
$resultado = $_SESSION['user'];
$idpaciente = $resultado[0];
if ($resultado == null) {
    header("location:index.php");
}
if (!empty($idpaciente)) {
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
    header("location:index.php?view=perfil");
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- TAGS -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PERFIL</title>
    <link rel="icon" href="Resources/img/logo.png" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
    <!-- ICONOS-->
    <link rel="stylesheet" href="Resources/css/style.css" />
    <link rel="stylesheet" href="Resources/fonts/style.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="Resources/css/perfil.css" />
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







    <div class="container pt-5">

        <div class="row justify-content-center text-center">
            <form>
                <h4 class="text-center"><b>Mi cuenta</b></h4>
                <h4 class="m-3"><?php echo $mostrar[1]; ?> bienvenido</h4>
                <h5 class="m-3">¿Qué quieres hacer?</h5>
                <button class="btn btn-primary" id="act-pac" type="button">Actualizar mis datos</button>
                <button class="btn btn-warning" id="eli-pac">Eliminar mi cuenta</button>
            </form>
        </div>


        <div class="row justify-content-center pt-5" id="contened-forms">
            <form method="POST" class="col-sm-8 col-md-8 col-xl-8 mb-5 text-center" id="contenido-form1">
                <h4 class="text-center">Actualizar</h4>
                <div class="row justify-content-around">
                        <div class="form-group col-xl-6 col-md-8 col-sm-12">
                            <label for="exampleFormControlInput1 mt-4">Nombre</label>
                            <input name="nombrePac" type="text" class="form-control" required value="<?php echo $mostrar[1]; ?>">
                        </div>

                        <div class="form-group col-xl-6 col-md-8 col-sm-12"">
                            <label for="exampleFormControlInput1 mt-4">Apellido</label>
                            <input name="apellidoPac" type="text" class="form-control" required value="<?php echo $mostrar[2]; ?>">
                        </div>
                </div>
                <button type="submit" class="btn btn-success w-50 m-auto">Listo</button>
            </form>

            <form method="POST" class="col-sm-8 col-md-8 col-xl-8 mb-5 text-center" id="contenido-form2">
                <h3><b>¡Nos entristece que abandone nuestros servicios!</b></h3>
                <p>Al presionar el botón su cuenta quedará desactivada, para reestablecer su cuenta deberá actualizar su contraseña en el apartado de login</p>
                <h3>Gracias por confiarnos su corazón</h3>
                <button class="btn btn-danger mt-2" name="del-acount" type="submit">Borrar</button>
            </form>
        </div>




    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="Resources/js/main.js"></script>
</body>

</html>