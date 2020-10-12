<?php 

@session_start();
require_once "Controller/Controller.php";

$resultado= $_SESSION['user'];
if($resultado == null) {
 
    header("Location:index.php?view=login");

}
 
$fami = new Controller();
$code=$_GET['updateid'];
if(isset($code)){
    $familiarvalues=$fami->Familiar(4, $code);
    $items =$familiarvalues->fetch_row();
}
if(!empty($_POST['nombreF']) && !empty($_POST['apellidoF'])){
    $array=[];
    array_push($array, $code);
  
    $familia=new Controller();
    $result=$familia->Familiar(3,$array);
    
    header("Location:index.php?view=familiares"); 
  }

?>
<!DOCTYPE html>
<html lang="es">
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
<body>
<div class="container">
    <div class="form">
            
    <form class="form_reg" action="" method="POST">
            
            <div class="col mt-4">
        <form method="POST">
        <div class="form-group">
        <h4 class="text-center">Eliminar Cuenta</h4>
              <label for="exampleFormControlInput1 mt-4">Codigo Familiar</label>
              <input value="<?php echo $items[0]; ?>" name="codi"  class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" required type=»text» readonly=»readonly»>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1 mt-4">Nombre</label>
              <input value="<?php echo $items[1]; ?>" name="nombreF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" required type=»text» readonly=»readonly»>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1 mt-4">Apellido</label>
              <input value="<?php echo $items[2]; ?>" name="apellidoF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" required type=»text» readonly=»readonly»>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1 mt-4">Documento</label>
                <input value="<?php echo $items[3]; ?>" name="documentoF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" required type=»text» readonly=»readonly»>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1 mt-4">Telefono</label>
                <input value="<?php echo $items[4]; ?>" name="telefonoF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" required type=»text» readonly=»readonly»>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1 mt-4">Celular</label>
                <input value="<?php echo $items[5]; ?>" name="celularF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" required type=»text» readonly=»readonly»>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1 mt-4">Correo</label>
                <input value="<?php echo $items[6]; ?>" name="correoF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" required type=»text» readonly=»readonly»>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1 mt-4">Direccion</label>
                <input value="<?php echo $items[7]; ?>" name="direccionF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" required type=»text» readonly=»readonly»>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1 mt-4">Direccion Laboral</label>
                <input value="<?php echo $items[8]; ?>" name="direccionlF" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" type=»text» readonly=»readonly»>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1 mt-4">Codigo del paciente</label>
                <input value="<?php echo $items[9]; ?>" name="codigoP" type="number" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" required type=»text» readonly=»readonly»>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1 mt-4">Contraseña</label>
                <input value="<?php echo $items[10]; ?>" name="contraseñaF" type="" class="form-control" id="exampleFormControlInput1" placeholder="nombre del familiar" required type=»text» readonly=»readonly»>
              </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Eliminar</button>
                  </div>
    
            
          </form>
    </div>
        </div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>