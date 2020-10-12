<!doctype html>
<html lang="es">

<head>
    <!-- TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HIDIS</title>
    <link rel="icon" href="Resources/img/logo.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- ICONOS-->
    <link rel="stylesheet" href="Resources/fonts/style.css">
    <!-- CSS -->
    <link rel="stylesheet" href="Resources/css/index.css">
</head>

<body class="scroll">
    <a href="#" id="btn-sub"><i class="icon icon-arrow-up2"></i></a>
    <!--Loader-->
    <div id="carga">
        <div id="carga2"></div>
    </div>
    <!--Nav-->
    <nav class="navbar navbar-expand-lg navbar-light">
        <img id="logo_nav" src="Resources/img/logo.png" alt="logo">
        <img id="palpitar" src="Resources/img/corazon1.gif" alt="corazon">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#descripcion">Descripcion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#componentes">Componentes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#equipo">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#opiniones">Opiniones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#relacionados">Referencias</a>
                </li>
            </ul>

            <a href="index.php?view=registro"><button type="button" class="btn btn-warning mr-3">Registrar</button></a>
            <a href="index.php?view=ingreso"><button type="button" class="btn btn-light">Ingresar</button></a>

        </div>
    </nav>
    <!--Nav end-->

    <!-- DESCRIPCION-->
    <section class="descripcion" id="descripcion">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-xl-5">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1 class="move">HIDIS PROJECT</h1>
                            <p>El proyecto HIDIS pretende ser una herramienta para identificar los síntomas y señales de
                                alarma previos a un accidente cardiovascular, logrando notificar al usuario y a sus
                                familiares de la situación de riesgo que se pueda estar presentando y por consiguiente
                                aumentar las posibilidades de sobrevivir al conseguir ayuda médica a tiempo. </p>
                            <a href="#" class="btn_2">Leer mas</a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner_img">
                        <img src="Resources/img/banner_img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- DESCRIPCION END-->

    <!-- COMPONENTES-->
    <section class="componentes parallax">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-12">
                    <div class="componentes_content">
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <h2 id="componentes">Componentes</h2>
                                <div class="row">
                                    <div class="card" style="width: 18rem;">
                                        <img src="Resources/img/paca-arduino.webp" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Placa Arduino</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                card's content.</p>
                                        </div>
                                    </div>
                                    <div class="card" style="width: 18rem;">
                                        <img src="Resources/img/oximetro.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Oximetro</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                card's content.</p>
                                        </div>
                                    </div>
                                    <div class="card" style="width: 18rem;">
                                        <img src="Resources/img/bateria.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Protoboard y bateria</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                card's content.</p>
                                        </div>
                                    </div>
                                    <div class="card" style="width: 18rem;">
                                        <img src="Resources/img/software.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Software</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                card's content.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- COMPONENTES END-->

    <!-- NUESTRO EQUIPO-->
    <section class="team contenedor" id="equipo">
        <h2>Nuestro equipo</h2>
        <p class="after">Conoce a la gente asombrosa y creativa</p>
        <div class="tarjetas">
            <div class="card" style="width: 18rem;">
                <img src="Resources/img/presentacion1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="Resources/img/presentacion1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="Resources/img/presentacion1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- NUESTRO EQUIPO END-->

    <!-- OPINIONES-->
    <section class="opiniones parallax" id="opiniones">
        <div class="container">
            <div class="row align-items-center opiniones_content">
                <div class="col-lg-7">
                    <div class="opiniones_iner">
                        <form class="move1">
                            <h2>Y cuentanos, ¿Qué te parece?</h2>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Nombre">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="password" class="form-control" id="inputPassword4" placeholder="Correo">
                                </div>

                                <div class="form-group col-md-12">
                                    <textarea class="form-control" id="Textarea" rows="4" placeholder="Tu sugerencia"></textarea>
                                </div>
                            </div>
                            <div class="regerv_btn">
                                <button type="button" class="btn btn-warning boton">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="reservation_img">
                        <img src="Resources/img/reservation.png" alt="" class="reservation_img_iner">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- OPINIONES END-->

    <!----------------- RELACIONADOS, FOOTER ----------------->
    <div id="relacionados">
        <div class="contenedor">
            <img src="Resources/img/Logo.png" alt="">
            <div id="referencias">
                <ul>
                    <h2>Referencias</h2>
                    <li class="">
                        <a href="https://fundaciondelcorazon.com/">Fundacion española del corazon</a>
                    </li>
                    <li>
                        <a href="http://scc.org.co/inicio-alternativo-scc/logos-2/">Sociedad colombiana de cardiologia</a>
                    </li>
                    <li>
                        <a href="https://www.minsalud.gov.co/Paginas/default.aspx">Ministerio de salud</a>
                    </li>
                    <p>Somos HIDIS con el corazon contento</p>
                </ul>
                <div class="iconos">
                    <i class="icon icon-facebook"></i>
                    <i class="icon icon-youtube"></i>
                </div>
            </div>
        </div>
    </div>
    <!----------------- RELACIONADOS, FOOTER END----------------->

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="Resources/js/main.js"></script>
    <script src="Resources/js/loader.js"></script>
</body>

</html>