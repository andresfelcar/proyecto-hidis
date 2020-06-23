<?php 

require_once "Controller/Controller.php";


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
            <a class="btn btn-danger" href="salir.php">Cerrar Sesion</a>

        </div>
    </nav>
    <div class="container-fluid mt-4">
      <form action="" method="POST" class="mt-4 mb-5">
        <input type="date" name="fecha1" />
        <input type="date" name="fecha2" />
        <button type="submit" class="btn btn-success">Buscar</button>
      </form>
      <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Recomendacion</th>
                    <th scope="col">Gravedad</th>
                    <th scope="col">Paciente</th>
                    <th scope="col">Fecha</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    $histo = new Controller();
                    if(!empty($_POST['fecha1']) && !empty($_POST['fecha2'])){
                        $array=[];
                        array_push($array,$_POST['fecha1'],$_POST['fecha2']);
                        $productos=$histo->Historial(0,$array);
                   
                   
                   
                    while ($mostrar = $productos->fetch_row()) {
                    
                ?>

                    <tr>
                        <td><?php echo $mostrar[0] ?></td>
                        <td><?php echo $mostrar[2] ?></td>
                        <td><?php echo $mostrar[3] ?></td>
                        <td><?php echo $mostrar[1] ?></td>
                        <td><?php echo $mostrar[5] ?></td>
                        <td><?php echo $mostrar[4] ?></td>
                        <td><a class="btn btn-warning"  href="EditarReco.php?update_id=<?php echo $mostrar[0]?>
                        " title="Editar Familiar"><i class="icon-pencil"></i></a></td>
                        
                        <td><a  class="btn btn-warning" href="eliminar_reco.php?update_id=<?php echo $mostrar[0]?>
                        " title="Eliminar Historial"><i class="icon-bin"></i></a></td>
                        
                    </tr>
                <?php
                } } else {
                    $histo = new Controller();
                   
                        $productos=$histo->Historial(0);
                   
                   
                   
                    while ($mostrar = $productos->fetch_row()) {
                    
                ?>

                    <tr>
                        <td><?php echo $mostrar[0] ?></td>
                        <td><?php echo $mostrar[2] ?></td>
                        <td><?php echo $mostrar[3] ?></td>
                        <td><?php echo $mostrar[1] ?></td>
                        <td><?php echo $mostrar[5] ?></td>
                        <td><?php echo $mostrar[4] ?></td>
                        <td><a class="btn btn-warning"  href="EditarReco.php?update_id=<?php echo $mostrar[0]?>
                        " title="Editar Familiar"><span class="glyphicon glyphicon-edit">Editar</span></a></td>
                        
                        <td><a  class="btn btn-warning" href="eliminar_reco.php?update_id=<?php echo $mostrar[0]?>
                        " title="Eliminar Historial"><span class="glyphicon glyphicon-edit">Eliminar</span></a></td>
                        
                 
                    </tr>
                <?php
                }}
                ?>
            </tbody>
            </table>
    </div>

    <script src="js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
