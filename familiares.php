<?php 
 @session_start();
 require_once "Controller/Controller.php";
 $resultado=$_SESSION['user'];
 if($resultado==null){
   header("location:index.php"); 
 } 
if(!empty($_POST['nombreF']) && !empty($_POST['apellidoF'])){
  $array=[];
  error_reporting(E_ALL ^ E_NOTICE);
  array_push($array,
  $_POST['nombreF'],
  $_POST['apellidoF'],
  $_POST['documentoF'],
  $_POST['telefonoF'],
  $_POST['celularF'],
  $_POST['correoF'],
  $_POST['direccionF'],
  $_POST['direccionlF'],
  $_POST['codigoP'],
  $_POST['contraseñaF']);

  $familia=new Controller();
  $result=$familia->Familiar(1,$array);
}

?>
<!doctype html>
<html>

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
            <button type="button" class="btn btn-danger"><a href="salir.php">Cerrar Sesion</a></button>

        </div>
    </nav>

    <div class="container-fluid pt-5">
<div class="row ">
    <div class="col mt-4">
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
                    $familiares=$control->Familiar(0);
                    while ($mostrar = $familiares->fetch_row()) {
                ?>

                    <tr>
                        <td><?php echo $mostrar[0] ?></td>
                        <td><?php echo $mostrar[1] ?></td>
                        <td><?php echo $mostrar[2] ?></td>
                        <td><?php echo $mostrar[5] ?></td>
                        <td><a class="btn btn-warning"  href="editFa.php?update_id=<?php echo $mostrar[0]?>
                        " title="Editar Familiar"><span class="glyphicon glyphicon-edit"></span></a></td>
                        
                        <td><a class="btn btn-danger"  href="eliminar.php?update_id=<?php echo $mostrar[0]?>
                        " title="Editar Familiar"><span class="glyphicon glyphicon-edit"></span></a></td>
                        
                        
                        
                        
                    </tr>
                <?php
                }
                ?>
            </tbody>
            </table>
              </div>
    <div class="col">
        <form method="POST">
            <div class="form-group">
                <h4 class="text-center">Registra a un familiar</h4>
              <label for="exampleFormControlInput1 mt-4">Nombre</label>
              <input name="nombreF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1 mt-4">Apellido</label>
              <input name="apellidoF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1 mt-4">Documento</label>
                <input name="documentoF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1 mt-4">Telefono</label>
                <input name="telefonoF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1 mt-4">Celular</label>
                <input name="celularF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1 mt-4">Correo</label>
                <input name="correoF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1 mt-4">Direccion</label>
                <input name="direccionF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1 mt-4">Direccion Laboral</label>
                <input name="direccionlF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1 mt-4">Codigo del paciente</label>
                <input name="codigoP" type="number" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1 mt-4">Contraseña</label>
                <input name="contraseñaF" type="password" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" required>
              </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
    
            
          </form>
    </div>
</div>


    </div>
    <!-- SCRIPTS -->
    <script src="js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>