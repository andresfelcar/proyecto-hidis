<?php
@session_start();
require_once "Controller/Controller.php";
$resultado = $_SESSION['user'];
if ($resultado == null) {
  header("location:index.php?view=login");
}

$fami = new Controller();
$code = $_GET['updateid'];

if (isset($code)) {
  $array=[];
  array_push($array,$code);
  $familiarvalues = $fami->Historial(4, $array);
  $items = $familiarvalues->fetch_row();
}

if (!empty($_POST['gravedad']) && !empty($_POST['recomendacion'])) {
  $array = [];
  array_push(
    $array,
    $_POST['gravedad'],
    $_POST['recomendacion'],
    $code
  );

  $familia = new Controller();
  $result = $familia->Historial(2, $array);
  header("Location:index.php?view=historial");
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
</head>

<body>
  <div class="container mt-5">

    <div class="row">
      <div class="col-md-4 bg-font-edit tam-doc mt-5"></div>
      <div class="col-md-4 mt-5">
        <div class="form mt-4">

          <form class="form_reg" action="" method="POST">

            <div class="col">
              <form method="POST">
                <h4 class="text-center mt-5 mb-5">Actualizar Recomendacion</h4>
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
                  <textarea name="recomendacion" class="form-control" id="exampleFormControlTextarea1" rows="3" value="<?php echo $items[3]; ?>">
                </textarea>
                </div>
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>


              </form>
            </div>

        </div>
        <div class="col-md-4"></div>
      </div>

    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>

</html>