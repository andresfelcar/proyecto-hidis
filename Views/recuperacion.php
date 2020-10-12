<?php

require_once "Controller/Controller.php";
$recu = new Controller();
$array = [];
array_push($array, $_GET['tokens']);
$result = $recu->Login(3, $array);

if ($result != null) {
    if (isset($_POST['recuperar'])) {
        $login = new Controller();
        $array = [];
        array_push($array, $_POST['new_pass'], $_GET['tokens']);
        $login->Login(4, $array);
    }

?>



    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cambiar contraseña</title>
        <link rel="icon" href="Resources/img/logo.png">
        <!--Bootsrap 4 CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!--Estilo-->
        <link rel="stylesheet" href="Resources/css/register_and_login.css">
        <!-- ICONOS-->
        <link rel="stylesheet" href="Resources/css/style.css">
        <link rel="stylesheet" href="Resources/fonts/style.css">
    </head>

    <body class="scroll">
        <!--Loader-->
        <div id="carga">
            <div id="carga2"></div>
        </div>
        <div class="contenedor">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h4 class="card-title d-flex justify-content-center">Cambiar contraseña</h4>
                </div>
                <form action="" method="POST">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-key"></i></span>
                        </div>
                        <input name="new_pass" type="password" class="form-control" placeholder="Nueva contraseña" id="contrasena">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-key"></i></span>
                        </div>
                        <input name="new_pass" type="password" class="form-control" placeholder="Confirmar contraseña" id="conficontrasena">
                    </div>

                    <div class="form-group">
                        <button type="submit" name="recuperar" class="btn login_btn btn-success btn-block" id="restart-boton">Cambiar</button>
                    </div>
                </form>
            </div>
        </div>

    </body>


    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="Resources/js/main.js"></script>
    <script src="Resources/js/validacion_recu.js"></script>

    </html>

<?php
} else {
    echo "<script>
    alert('No existe un token');
    window.location='index.php?view=login';
    </script>";
}

?>