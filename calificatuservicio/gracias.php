<?php
include '../funciones/funciones.php';

$r = $_GET['r'];



$p = funcionMaster($r, 'id', 'stars', 'comentarios_demo_sieven');

?>





<!DOCTYPE html>

<html lang="es">



<head>



    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">

    <!-- ICONO -->

    <!-- <link rel="shortcut icon" type="image/x-icon" href="https://medicalsoftplus.com/{$Base}/icono.ico"> -->

    <link rel="apple-touch-icon" sizes="57x57" href="../packFaviconsDentalsoft/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../packFaviconsDentalsoft/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../packFaviconsDentalsoft/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../packFaviconsDentalsoft/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../packFaviconsDentalsoft/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../packFaviconsDentalsoft/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../packFaviconsDentalsoft/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../packFaviconsDentalsoft/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../packFaviconsDentalsoft/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../packFaviconsDentalsoft/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../packFaviconsDentalsoft/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../packFaviconsDentalsoft/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../packFaviconsDentalsoft/favicon-16x16.png">
    <link rel="manifest" href="../packFaviconsDentalsoft/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- ICONO -->





    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="keywords"
        content="medical, medicos, salud, directorio medico, sievensoft, medicalsoft, latam, veterinarios, dental, dentalsoftplus" />

    <!-- <meta NAME="description" CONTENT="Sea parte de de sievensoft de LATAM ❤️ para el mundo, mas de 15 años, mas de 1 millon de usuarios, estamos en mas de 

23 países siendo medicalsoftplus, petsoftplus, dentalsoftplus, hellomedical, ponkys y sievenca. ven y forma parte de nuestra familia "> -->

    <meta NAME="description"
        CONTENT="Dentalsoft, de LATAM ❤️ para el mundo. Mas de 15 años, mas de 1 millón de usuarios, con presencia en mas de 23 paises, ven y forma parte de nuestra familia">

    <meta NAME="Author" CONTENT="Dentalsoft">

    <meta NAME="Date" CONTENT="01/07/2007">

    <meta NAME="Copyright" CONTENT="Dentalsoft company sas">



    <title>Medicalsoft Calificanos!!</title>



    <!-- Custom fonts for this template-->

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">



    <!-- Custom styles for this template-->

    <link href="css/sb-admin-2.min.css" rel="stylesheet">





</head>



<style>
@media only screen and (max-width: 600px) {

    #show {

        display: none;

    }

}
</style>

<style>
.waves {

    position: relative;

    width: 100%;

    height: 16vh;

    margin-bottom: -7px;

    /*Fix for safari gap*/

    min-height: 30em;

    max-height: 40em;

}



.waves.waves-sm {

    height: 20em;

    min-height: 20em;

}



.waves.no-animation .moving-waves>use {

    animation: none;

}



.wave-rotate {

    transform: rotate(180deg);

}



/* Animation for the waves */



.moving-waves>use {

    animation: move-forever 40s cubic-bezier(0.55, 0.5, 0.45, 0.5) infinite;

}



.moving-waves>use:nth-child(1) {

    animation-delay: -2s;

    animation-duration: 11s;

}



.moving-waves>use:nth-child(2) {

    animation-delay: -4s;

    animation-duration: 13s;

}



.moving-waves>use:nth-child(3) {

    animation-delay: -3s;

    animation-duration: 15s;

}



.moving-waves>use:nth-child(4) {

    animation-delay: -4s;

    animation-duration: 20s;

}



.moving-waves>use:nth-child(5) {

    animation-delay: -4s;

    animation-duration: 25s;

}



.moving-waves>use:nth-child(6) {

    animation-delay: -3s;

    animation-duration: 30s;

}



@keyframes move-forever {

    0% {

        transform: translate3d(-90px, 0, 0);

    }



    100% {

        transform: translate3d(85px, 0, 0);

    }

}
</style>

<style>
.rating {

    display: inline-block;

    position: relative;

}



.rating label {

    position: absolute;

    top: 0;

    left: 0;

    cursor: pointer;

}



.rating label:last-child {

    position: static;

}



.rating label:nth-child(1) {

    z-index: 5;

}



.rating label:nth-child(2) {

    z-index: 4;

}



.rating label:nth-child(3) {

    z-index: 3;

}



.rating label:nth-child(4) {

    z-index: 2;

}



.rating label:nth-child(5) {

    z-index: 1;

}



.rating label input {

    position: absolute;

    top: 0;

    left: 0;

    opacity: 0;

}



.rating label .icon {

    float: left;

    color: transparent;

}



.rating label:last-child .icon {

    color: #000;

}



.rating:not(:hover) label input:checked~.icon,

.rating:hover label:hover input~.icon {

    color: #4e73df;

}



.rating label input:focus:not(:checked)~.icon:last-child {

    color: #000;

    text-shadow: 0 0 5px #4e73df;

}
</style>



<body class="bg-gradient-primary">

    <div class="position-absolute w-100 z-index-1 bottom-0" style="bottom: 0; position:fixed !important;">

        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">

            <defs>

                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />

            </defs>

            <!-- las olitas bonitas :3 -->

            <g class="moving-waves">

                <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />

                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />

                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />

                <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />

                <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />

                <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,0.95" />

            </g>

            <!-- fin de las olitas bonitas :3 -->

        </svg>

    </div>



    <div class="container">





        <div class="card o-hidden border-0 shadow-lg my-4">

            <div class="card-body p-0">

                <!-- Nested Row within Card Body -->

                <div class="row">

                    <!-- <div class="col-lg-3 d-none d-lg-block center text-center align-center">

                        <img class="img-responsive mt-5" style="width:90%" src="https://medicalsoftplus.com/baseDev/img/logo.png">

                    </div> -->

                    <div class="col-lg-12">

                        <div class="">

                            <div class="text-center">

                                <h1 class="h4 text-gray-900 mb-3 p-3"><strong class=""></strong>

                                    <p class="h3"> <strong>Gracias por tu opinión </strong><br> Estamos comprometidos
                                        contigo.</p>



                                    <?php

                                    if ($p == 1) {

                                        echo '<p style="font-size: 2em;">😧  </p><br><strong>Pronto estaremos en contacto contigo.</strong>';

                                    }

                                    if ($p == 2) {

                                        echo '<p style="font-size: 2em;">🙁 </p><br><strong>Pronto estaremos en contacto contigo.</strong>';

                                    }

                                    if ($p == 3) {

                                        echo '<p style="font-size: 2em;">😐 </p><br><strong>¡No somos buenos, ni malos! Que crees que debemos mejorar para ajustarnos a ti? </strong>';

                                    }

                                    if ($p == 4) {

                                        echo '<p style="font-size: 2em;">😄 </p> <strong>¡GRACIAAASSS! Eres la razón por la que trabajamos día a día!!  </strong>';

                                    }

                                    if ($p == 5) {

                                        echo '<p style="font-size: 2em;">😆💙</p> <strong> Muchas GRACIAS por tu comentario eres la razón del porque trabajamos día a día</strong>';

                                    }



                                    if ($p == 5 or $p == 4 or $p == 3) {

                                    ?>

                                </h1>



                                <!-- <p> <h2> Le gustaría ayudarnos y anexar una foto o imagen o de su consultorio? </h2></p> -->

                                <!-- radio de si o no -->

                                <!-- <div class="form-check h2">



                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" checked onclick="verificar1()">

                                        <label class="form-check-label" for="exampleRadios2">

                                            No

                                        </label>

                                        <br>

                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" onclick="verificar1()">

                                        <label class="form-check-label" for="exampleRadios1">

                                            Si

                                        </label>

                                    </div> -->



                                <!-- fin radio de si o no -->



                                <!-- si es si, anexar una foto o imagen de su consultorio? -->

                                <!-- <div class="form-group" id="primeraPregunta" style="display: none;">

                                        <label for="exampleFormControlFile1">Anexar una foto o imagen de su consultorio</label>

                                        <div class="form-group col-md-12">

                                            <label for="file-input" class="text-compu icono">

                                                <i class="fas fa-camera-retro fa-2x text-primary"></i>

                                            </label>

                                            <input id="file-input" type="file" accept="image/*" capture="camera" name="imagen" style="display:none;" />

                                        </div>

                                        <hr>

                                    </div> -->



                                <!-- <p class="h2">Recomendaría el sistema a un amigo o colega?</p> -->

                                <!-- <div class="form-check h3">

                                        <input class="form-check-input" type="radio" name="exampleRadios2" id="exampleRadios22" value="option2" checked onclick="verificar2()">

                                        <label class="form-check-label" for="exampleRadios22">

                                            No

                                        </label>

                                        <br>

                                        <input class="form-check-input" type="radio" name="exampleRadios2" id="exampleRadios21" value="option1" onclick="verificar2()">

                                        <label class="form-check-label" for="exampleRadios21">

                                            Si

                                        </label>

                                    </div> -->



                                <div class="form-group row" id="segundaPRegunta" style="display:none;">

                                    <div class="col-md-12">

                                        <label for="exampleFormControlFile1">Contacto</label>

                                    </div>

                                    <div class="col-md-4"></div>

                                    <div class="form-group col-md-4">

                                        <!-- input nombre y telefono -->

                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text" id="basic-addon1"><i
                                                        class="fas fa-user"></i></span>

                                            </div>

                                            <input type="text" class="form-control" placeholder="Nombre"
                                                aria-label="Nombre" aria-describedby="basic-addon1" name="nombre"
                                                id="referNombre">

                                        </div>

                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text" id="basic-addon1"><i
                                                        class="fas fa-phone"></i></span>

                                            </div>

                                            <input type="text" class="form-control" placeholder="Teléfono"
                                                aria-label="Teléfono" aria-describedby="basic-addon1" name="telefono"
                                                id="referTelefono">

                                        </div>



                                        <div class="col-md-12">

                                            <button type="submit" class="btn btn-primary"
                                                onclick="Procesar()">Guardar</button>

                                        </div>





                                    </div>

                                    <div class="col-md-4"></div>

                                </div>



                                <!-- boton de guardado -->

                                <div class="form-group row" id="botoncito" style="display:none;">



                                </div>

                                </h1>

                                <?php } ?>



                                <!-- <div class="col-md-12">

                                    <br>

                                    <br>

                                    <br>

                                    <a href="https://medicalsoftplus.com/baseDev/web/medico/drjuanito">

                                        <button type="submit" class="btn btn-primary">Cerrar</button>

                                    </a>

                                </div> -->

                                <br>



                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



    </div>



    <!-- Bootstrap core JavaScript-->

    <script src="../vendor/jquery/jquery.min.js"></script>

    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



    <!-- Core plugin JavaScript-->

    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>



    <!-- Custom scripts for all pages-->

    <script src="../js/sb-admin-2.min.js"></script>



</body>



</html>

<?php

$icono = rand(1, 7);

$ArrayIcono = array('1', '2', '3', '4', '5', '6', '7');

$ArrayIcono_ = array('fa-stethoscope', 'fa-heartbeat', 'fa-plus-square', 'fa-heart', 'fa-medkit', 'fa-hospital', 'fa-wheelchair');

$icono_ = str_replace($ArrayIcono, $ArrayIcono_, $icono);

$rotate = 20;

?>

<div style="position: absolute; bottom: 2em;" id="show">

    <i style="transform: rotate(<?= $rotate ?>deg);" class="fa <?= $icono_ ?> fa-10x m-5 text-primary"></i>

    <i style="transform: rotate(-<?= $rotate ?>deg);" class="fa <?= $icono_ ?> fa-6x text-primary"></i>

</div>

<?php

?>



<script>
function verificar1() {

    if (document.getElementById('exampleRadios1').checked) {

        document.getElementById('primeraPregunta').style.display = 'block';

        document.getElementById('botoncito').style.display = 'block';

    } else {

        document.getElementById('primeraPregunta').style.display = 'none';

        document.getElementById('segundaPRegunta').style.display = 'none';

        document.getElementById('botoncito').style.display = 'none';

        document.getElementById('exampleRadios1').checked = false;

    }

}



function verificar2() {

    if (document.getElementById('exampleRadios21').checked) {

        document.getElementById('segundaPRegunta').style.display = 'flex';

        document.getElementById('botoncito').style.display = 'block';

    } else {

        document.getElementById('segundaPRegunta').style.display = 'none';

        document.getElementById('exampleRadios21').checked = false;

    }

}



function Procesar() {

    var file = document.getElementById("file-input").files[0];

    var referNombre = document.getElementById("referNombre").value;

    var referTelefono = document.getElementById("referTelefono").value;

    var id = <?= $r ?>;



    console.log(file);

    console.log(referNombre);

    console.log(referTelefono);



    var formData = new FormData();



    formData.append("file", file);

    formData.append("referNombre", referNombre);

    formData.append("referTelefono", referTelefono);

    formData.append("id", id);



    var xhr = new XMLHttpRequest();

    xhr.open("POST", "procesar.php", true);

    xhr.send(formData);

    xhr.onreadystatechange = function() {

        if (xhr.readyState == 4 && xhr.status == 200) {

            // mensaje de exito

            alert("Se ha guardado la información! Gracias por confiar en nosotros.");

        }

    }

}
</script>