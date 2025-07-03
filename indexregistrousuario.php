<?php
include "funciones/conn3.php";

$user_agent = $_SERVER['HTTP_USER_AGENT'];
function getBrowser($user_agent)
{

    if (strpos($user_agent, 'MSIE') !== FALSE)

        return 'Internet explorer';

    elseif (strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge

        return 'Microsoft Edge';

    elseif (strpos($user_agent, 'Trident') !== FALSE) //IE 11

        return 'Internet explorer';

    elseif (strpos($user_agent, 'Opera Mini') !== FALSE)

        return "Opera Mini";

    elseif (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)

        return "Opera";

    elseif (strpos($user_agent, 'Firefox') !== FALSE)

        return 'Mozilla Firefox';

    elseif (strpos($user_agent, 'Chrome') !== FALSE)

        return 'Google Chrome';

    elseif (strpos($user_agent, 'Safari') !== FALSE)

        return "Safari";

    else

        return 'No hemos podido detectar su navegador';
}


$navegador = getBrowser($user_agent);

if ($navegador <> "Google Chrome") {
    echo "<div align='center'>";
    echo "El navegador con el que estas visitando esta web es: " . $navegador;
    echo "<br>";
    echo "Para un correcto Funcionamiento te recomedamos Utilizar Google Chrome ";
    echo "  <a href='https://www.google.es/chrome/browser/desktop/'>Descargar Aqui</a>";
    echo "</div>";
}

//$queryList = mysqli_query($conn3, "SELECT * FROM usuarios where ID=1");
while ($RowUsuario = mysqli_fetch_array($queryList)) {
    $id = $RowUsuario['id'];
    $fechaVenceLic = $RowUsuario['fechaVenceLic'];
    $fechahoy = date("Y-m-d");

    if ($fechaVenceLic <= $fechahoy) {
        $Vencido = "1";
    }
}

if ($Vencido == "1") {
    include 'LicenciaVencida.php';
}
?>
<?php if ($Vencido != 1) : ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SievenSoft</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <!--<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">

        <link rel="shortcut icon" type="image/x-icon" href="./icono.ico">

        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <script type="text/javascript">
            window.$zopim || (function(d, s) {
                var z = $zopim = function(c) {
                        z._.push(c)
                    },
                    $ = z.s =
                    d.createElement(s),
                    e = d.getElementsByTagName(s)[0];
                z.set = function(o) {
                    z.set.
                    _.push(o)
                };
                z._ = [];
                z.set._ = [];
                $.async = !0;
                $.setAttribute("charset", "utf-8");
                $.src = "https://v2.zopim.com/?65r3mACnIFh8hYjJwvyl5pg2FZqM7yDU";
                z.t = +new Date;
                $.
                type = "text/javascript";
                e.parentNode.insertBefore($, e)
            })(document, "script");
        </script>

        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    </head>

    <body style="background-color:#E6E6FA">

        <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
            <div class="container">
                <div class="card login-card">
                    <div class="row no-gutters" style="height: 800px;">
                        <div class="col-sm-2 col-md-3 col-lg-4">
                            <img src="https://cdn.pixabay.com/photo/2014/12/10/20/56/medical-563427_960_720.jpg" alt="login" class="login-card-img">
                        </div>
                        <div class="col-sm-10 col-md-9 col-lg-8" style="height: 65vh;z-index:1;" id="formulario">
                            <div class="card-body" style="display: contents;">

                                <div class="welcome">
                                    <div class="pinkbox">
                                        <div class="signup nodisplay">
                                            <h1 style="margin-top: 100px;">Registrarse</h1>
                                            <form action="signup" method="POST">
                                                <input type="text" placeholder="Nombre Completo" maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                                <input type="email" placeholder="Correo" maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                                <input type="phone" placeholder="Telefono" maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                                <input type="text" placeholder="Pais" maxlength="40" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                                <select class="select" name="especialidad" placeholder="Especialidad">
                                                    <option value=" "> Especialidad </option>
                                                    <option value="1/Medicina general">Medicina general </option>
                                                    <option value="1/Medicina familiar">Medicina familiar</option>
                                                    <option value="1/Medico internista">Medico internista </option>
                                                    <option value="1/Medicina alternativa">Medicina alternativa</option>
                                                    <option value="0/Clínicas IPS">Clínicas /IPS </option>

                                                    <option value="3/Centro de vacunación">Centro de vacunación</option>
                                                    <option value="1/Pediatría">Pediatría </option>
                                                    <option value="2/Spa/estética ">Spa/estética </option>

                                                    <option value="5/Ecografista">Ecografista </option>

                                                    <option value="6/Ginecólogia">Ginecólogia </option>

                                                    <option value="11/Cardiologo">Cardiologo </option>


                                                    <option value="10/Traumatologia">Traumatologia </option>
                                                    <option value="10/Fisioterapia">Fisioterapia </option>
                                                    <option value="10/Reabilitacion">Reabilitacion </option>


                                                    <option value="9/Pre hospitalario">Pre hospitalario </option>
                                                    <option value="9/Servicios de ambulancias">Servicios de ambulancias </option>


                                                    <option value="7/Medicina est&eacutetica">Medicina est&eacutetica</option>

                                                    <option value="15/Podólogo">Podólogo </option>
                                                    <option value="16/Odontología">Odontología </option>
                                                    <option value="16/Ortodoncia">Ortodoncia </option>

                                                    <option value="4/Psic&oacutelogo">Psic&oacutelogo</option>

                                                    <option value="1/Anestesi&oacutelogo">Anestesi&oacutelogo</option>
                                                    <option value="1/Asociaci&oacuten m&eacutedica">Asociaci&oacuten m&eacutedica</option>
                                                    <option value="1/Audi&oacutelogo">Audi&oacutelogo</option>
                                                    <option value="1/Banco de sangre">Banco de sangre</option>
                                                    <option value="1/Cardi&oacutelogo">Cardi&oacutelogo</option>
                                                    <option value="1/Centro de rehabilitaci&oacuten">Centro de rehabilitaci&oacuten</option>
                                                    <option value="1/Centros m&eacutedicos">Centros m&eacutedicos</option>
                                                    <option value="1/Cirug&iacutea endosc&oacutepica">Cirug&iacutea endosc&oacutepica</option>
                                                    <option value="1/Cirug&iacutea laparosc&oacutepica">Cirug&iacutea laparosc&oacutepica</option>
                                                    <option value="1/Cirujano bariatrico">Cirujano bariatrico</option>
                                                    <option value="1/Cirujano cabeza y cuello">Cirujano cabeza y cuello</option>
                                                    <option value="1/Cirujano cardiovascular">Cirujano cardiovascular</option>
                                                    <option value="1/Cirujano de seno y tejido blandos">Cirujano de seno y tejido blandos</option>
                                                    <option value="1/Cirujano de torax">Cirujano de torax</option>
                                                    <option value="1/Cirujano gastrointestinal">Cirujano gastrointestinal</option>
                                                    <option value="1/Cirujano general">Cirujano general</option>
                                                    <option value="1/Cirujano maxilofacial">Cirujano maxilofacial</option>
                                                    <option value="1/Cirujano onc&oacutelogo">Cirujano onc&oacutelogo</option>
                                                    <option value="1/Cirujano pedi&aacutetrico">Cirujano pedi&aacutetrico</option>
                                                    <option value="1/Cirujano pl&aacutestico">Cirujano pl&aacutestico</option>
                                                    <option value="1/Cirujano vascular">Cirujano vascular</option>
                                                    <option value="1/Cl&iacutenica">Cl&iacutenica</option>
                                                    <option value="1/Coloproct&oacutelogo">Coloproct&oacutelogo</option>
                                                    <option value="1/Dermat&oacutelogo">Dermat&oacutelogo</option>
                                                    <option value="1/Droguer&iacutea">Droguer&iacutea</option>
                                                    <option value="1/Endocrin&oacutelogo">Endocrin&oacutelogo</option>
                                                    <option value="1/Enfermera">Enfermera</option>
                                                    <option value="1/EPS">EPS</option>
                                                    <option value="1/Est&eacuteticas">Est&eacuteticas</option>
                                                    <option value="1/Fisiatra">Fisiatra</option>
                                                    <option value="1/Fisioterapeuta">Fisioterapeuta</option>
                                                    <option value="1/Fonoaudi&oacutelogo">Fonoaudi&oacutelogo</option>
                                                    <option value="1/Fundaci&oacuten">Fundaci&oacuten</option>
                                                    <option value="1/Gastroenter&oacutelogo">Gastroenter&oacutelogo</option>
                                                    <option value="1/Genetista">Genetista</option>
                                                    <option value="1/Geriatra">Geriatra</option>
                                                    <option value="1/Hemat&oacutelogo">Hemat&oacutelogo</option>
                                                    <option value="1/Hepat&oacutelogo">Hepat&oacutelogo</option>
                                                    <option value="1/Hospital">Hospital</option>
                                                    <option value="1/Infect&oacutelogo">Infect&oacutelogo</option>
                                                    <option value="1/Inmun&oacutelogo">Inmun&oacutelogo</option>
                                                    <option value="1/Internista">Internista</option>
                                                    <option value="1/Laboratorio cl&iacutenico">Laboratorio cl&iacutenico</option>
                                                    <option value="1/Laboratorio farmac&eacuteutico">Laboratorio farmac&eacuteutico</option>
                                                    <option value="1/M&eacutedico alternativo">M&eacutedico alternativo</option>
                                                    <option value="1/M&eacutedico biol&oacutegico">M&eacutedico biol&oacutegico</option>
                                                    <option value="1/M&eacutedico general">M&eacutedico general</option>
                                                    <option value="1/Mast&oacutelogo">Mast&oacutelogo</option>
                                                    <option value="1/Medicina deportiva">Medicina deportiva</option>
                                                </select>

                                                <?php
                                                $ID = 0;
                                                $ID = $_GET['ID'];
                                                if ($ID <> 0) {
                                                ?>
                                                    <input type="hidden" name="aliado" class="form-control input-lg" value="<?php echo $ID ?>">
                                                <?php
                                                } else {
                                                    echo  '<input type="hidden" name="aliado"  class="form-control input-lg" value="0">';
                                                }
                                                ?>

                                                <input type="password" placeholder="Contraseña">
                                                <input type="password" placeholder="Confirmar Contraseña">

                                                <style>
                                                    .check-box::before {
                                                        box-shadow: 0 0 0 10px #73b6d4 !important;
                                                    }
                                                </style>
                                                <div style="top: 10px;left: 39px;position: relative;">
                                                    <input type="checkbox" class="checkbox" value="first_checkbox" id="cbox1" /><label for="cbox1" class="check-box" style="zoom: 0.2;"></label>
                                                    <label style="display: flex;zoom: 0.9;float: right;padding-left: 10px;color:#cce4ee">He leído y aceptado los <a data-toggle="modal" data-target="#condiciones" href="#" style="padding-left: 5px;color: #8fe690;"> términos y condiciones </a> </label>
                                                </div>



                                                <button class="button submit" style="position: relative;left: 40px;" id="registro_usuario" name="registro_usuario"> Crear Cuenta </button>
                                            </form>
                                        </div>
                                        <div class="signin">
                                            <img src="img/logo.png" height="20%" width="60%" style="margin-top: 200px;left: 20%;position: relative;">
                                            <h1 style="margin-top: 20px">Iniciar Sesion</h1>
                                            <form class="more-padding form-horizontal" action="verificarUsuario.php" method="POST">
                                                <input type="text" name="username" placeholder="Usuario">
                                                <input type="password" name="password" placeholder="Contraseña">
                                                <!--
                                                <div class="checkbox">
                                                    <input type="checkbox" id="remember" /><label for="remember">Recordarme</label>
                                                </div>
                                                -->

                                                <button class="button submit" style="position: relative;left: 40px;">Acceder</button>
                                                <button class="button" style="position: relative;left: 40px;"><a href="recover" style="text-decoration: none;"> Olvidé Contraseña </a></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="leftbox">
                                        <h2 class="title"><span>MedicalSoft</span>&<br>estetica</h2>
                                        <p class="desc">Tipo de Sistema <span> General </span></p>
                                        <img class="flower smaller" src="img/logoSolo.png" alt="1357d638624297b" border="0">
                                        <p class="account">Tiene Cuenta?</p>
                                        <button class="button" id="signin">Acceder</button>
                                    </div>
                                    <div class="rightbox">
                                        <h2 class="title"><span>MedicalSoft</span>&<br>estetica</h2>
                                        <p class="desc"> Tipo de Sistema <span> General </span></p>
                                        <img class="flower" src="img/logoSolo.png" />
                                        <p class="account">No Tiene Cuenta?</p>
                                        <button class="button" id="signup">Registrarse</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="ocean">
                <div class="wave"></div>
                <div class="wave"></div>
            </div>
        </main>
    </body>

    </html>

    <style>
        body {
            background: radial-gradient(ellipse at center, rgba(255, 254, 234, 1) 0%, rgba(255, 254, 234, 1) 35%, #b7e8eb 100%);
        }

        .ocean {
            height: 0%;
            width: 100%;
            /*position: absolute;*/
            position: fixed;
            bottom: 0;
            left: 0;
            background: #015871;
        }

        .wave {
            background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/85486/wave.svg) repeat-x;
            position: absolute;
            top: -98px;
            width: 6400px;
            height: 198px;
            animation: wave 7s cubic-bezier(0.36, 0.45, 0.63, 0.53) infinite;
            transform: translate3d(0, 0, 0);
        }

        .wave:nth-of-type(2) {
            top: -75px;
            animation: wave 7s cubic-bezier(0.36, 0.45, 0.63, 0.53) -0.125s infinite, swell 7s ease -1.25s infinite;
            opacity: 1;
        }

        @keyframes wave {
            0% {
                margin-left: 0;
            }

            100% {
                margin-left: -1600px;
            }
        }

        @keyframes swell {

            0%,
            100% {
                transform: translate3d(0, -25px, 0);
            }

            50% {
                transform: translate3d(0, 5px, 0);
            }
        }



        /* formulario */

        @media only screen and (min-device-width : 1200px) and (max-device-width : 1399px) {
            .welcome {
                zoom: 0.8;
                top: 20%;
            }
        }

        @media only screen and (min-device-width : 1171) and (max-device-width : 1199px) {
            .welcome {
                zoom: 0.75;
                top: 20%;
            }
        }

        @media only screen and (max-device-width : 1170px) {
            .col-lg-4 {
                display: contents;
            }

            .col-lg-8 {
                padding-left: 7%;
            }
        }

        @media only screen and (min-device-width : 768px) and (max-device-width : 991px) {
            .card-body {
                zoom: 0.75;
            }
        }

        <?php

        $width = ["527", "537", "557", "587", "617", "647", "677", "707", "737", "767"];
        $cal = ["-6", "-5", "-2", "-2", "0", "2", "5", "6", "7", "8"];
        foreach ($width as $key => $value) {
            echo "
        @media only screen and (min-device-width : {$value}px) and (max-device-width : {$width[$key + 1]}px) {
        .welcome {
                position: fixed !important;
                left: {$cal[$key]}%;
            }

            .card-body {
                zoom: 0.75;
            }
        }";
        }

        ?>@media only screen and (min-device-width : 320px) and (max-device-width : 615px) {
            .card-body {
                zoom: 0.75;
            }

            #formulario {
                overflow: scroll;
                position: fixed;
                height: 100vh !important;
                left: -3.5%;
            }
        }

        <?php
        $width = ["625", "700", "800", "900", "1000", "1120", "1275"];
        $cal = ["13", "16", "20", "23", "26", "29", "31"];
        foreach ($width as $key => $value) {
            echo "
            @media only screen and (min-device-height : {$value}px) and (max-device-height : {$width[$key + 1]}px) and (min-device-width : 527px) and (max-device-width : 767px)  {
            .welcome {
                    top: {$cal[$key]}% !important;
                }
            }";
        }
        ?>

        .brand-wrapper {
            margin-bottom: 19px;
        }

        .brand-wrapper .logo {
            height: 37px;
        }

        .login-card {
            border: 0;
            border-radius: 27.5px;
            box-shadow: 0 10px 30px 0 rgba(172, 168, 168, 0.43);
            overflow: hidden;
        }

        .login-card-img {
            border-radius: 0;
            position: relative;
            width: 100%;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
        }

        .login-card .card-body {
            padding: 85px 60px 60px;
        }

        @media (max-width: 422px) {
            .login-card .card-body {
                padding: 35px 24px;
            }
        }

        .login-card-description {
            font-size: 25px;
            color: #000;
            font-weight: normal;
            margin-bottom: 23px;
        }

        .login-card form {
            max-width: 326px;
        }

        .login-card .form-control {
            border: 1px solid #d5dae2;
            padding: 15px 25px;
            margin-bottom: 20px;
            min-height: 45px;
            font-size: 13px;
            line-height: 15;
            font-weight: normal;
        }

        .login-card .form-control::-webkit-input-placeholder {
            color: #919aa3;
        }

        .login-card .form-control::-moz-placeholder {
            color: #919aa3;
        }

        .login-card .form-control:-ms-input-placeholder {
            color: #919aa3;
        }

        .login-card .form-control::-ms-input-placeholder {
            color: #919aa3;
        }

        .login-card .form-control::placeholder {
            color: #919aa3;
        }

        .login-card .login-btn {
            padding: 13px 20px 12px;
            background-color: #000;
            border-radius: 4px;
            font-size: 17px;
            font-weight: bold;
            line-height: 20px;
            color: #fff;
            margin-bottom: 24px;
        }

        .login-card .login-btn:hover {
            border: 1px solid #000;
            background-color: transparent;
            color: #000;
        }

        .login-card .forgot-password-link {
            font-size: 14px;
            color: #919aa3;
            margin-bottom: 12px;
        }

        .login-card-footer-text {
            font-size: 16px;
            color: #0d2366;
            margin-bottom: 60px;
        }

        @media (max-width: 767px) {
            .login-card-footer-text {
                margin-bottom: 24px;
            }
        }

        .login-card-footer-nav a {
            font-size: 14px;
            color: #919aa3;
        }


        .card-img-left {
            width: 35%;
            /* Link to your background image using in the property below! */
            background: scroll center url('https://source.unsplash.com/WEQbe2jBg40/414x512');
            background-size: cover;
        }

        .btn-login {
            font-size: 0.9rem;
            letter-spacing: 0.05rem;
            padding: 0.75rem 1rem;
        }

        .btn-google {
            color: white !important;
            background-color: #ea4335;
        }

        .btn-facebook {
            color: white !important;
            background-color: #3b5998;
        }






        .welcome {
            background: #f6f6f6;
            width: 830px;
            height: 615px;
            position: absolute;
            top: 11%;
            border-radius: 5px;
            box-shadow: 5px 5px 5px rgba(0, 0, 0, .1);
        }

        .pinkbox {
            position: absolute;
            top: -10%;
            left: 5%;
            /*background: #3c8dbc;*/
            width: 400px;
            height: 750px;
            border-radius: 5px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, .1);
            transition: all 0.5s ease-in-out;
            z-index: 2;

            /*
            background: rgb(220, 250, 215);
            background: -moz-radial-gradient(circle, rgba(220, 250, 215, 1) 0%, rgba(60, 141, 176, 1) 100%);
            background: -webkit-radial-gradient(circle, rgba(220, 250, 215, 1) 0%, rgba(60, 141, 176, 1) 100%);
            background: radial-gradient(circle, rgba(220, 250, 215, 1) 0%, rgba(60, 141, 176, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#dcfad7", endColorstr="#3c8db0", GradientType=1);
            */

            background: rgb(182, 233, 255);
            background: -moz-radial-gradient(circle, rgba(182, 233, 255, 1) 0%, rgba(60, 141, 176, 1) 100%);
            background: -webkit-radial-gradient(circle, rgba(182, 233, 255, 1) 0%, rgba(60, 141, 176, 1) 100%);
            background: radial-gradient(circle, rgba(182, 233, 255, 1) 0%, rgba(60, 141, 176, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#b6e9ff", endColorstr="#3c8db0", GradientType=1);
        }

        .nodisplay {
            display: none;
            transition: all 0.5s ease;
        }

        .leftbox,
        .rightbox {
            position: absolute;
            width: 50%;
            transition: 1s all ease;
        }

        .leftbox {
            left: -2%;
        }

        .rightbox {
            right: -2%;
        }

        /* font & button styling */
        h1 {
            text-align: center;
            /*margin-top: 200px;*/
            margin-top: 20px;
            text-transform: uppercase;
            color: #ffffffa8;
            font-size: 2em;
        }

        .title {
            font-family: 'Lora', serif;
            color: #8e9aaf;
            font-size: 1.8em;
            line-height: 1.1em;
            letter-spacing: 3px;
            text-align: center;
            font-weight: 300;
            margin-top: 20%;
        }

        .desc {
            margin-top: -8px;
        }

        .account {
            margin-top: 45%;
            font-size: 10px;
        }

        p {
            font-family: 'Open Sans', sans-serif;
            font-size: 0.7em;
            letter-spacing: 2px;
            color: #8e9aaf;
            text-align: center;
        }

        span {
            color: #3c8dbc;
        }

        .flower {
            position: absolute;
            width: 150px;
            height: 130px;
            top: 46%;
            left: 32%;
            opacity: 0.7;
        }

        .smaller {
            width: 150px;
            height: 130px;
            top: 48%;
            left: 33%;
            opacity: 0.9;
        }

        button {
            padding: 12px;
            font-family: 'Open Sans', sans-serif;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 11px;
            border-radius: 10px;
            margin: auto;
            outline: none;
            display: block;
        }

        button:hover {
            background: #4dd84da6;
            color: #f6f6f6;
            transition: background-color 1s ease-out;
        }

        .button {
            margin-top: 3%;
            background: #f6f6f6;
            color: #3c8dbc;
            border: solid 1px #3c8dbc;
        }

        /* form styling */
        form {
            display: flex;
            align-items: center;
            flex-direction: column;
            padding-top: 7px;
        }

        .more-padding {
            padding-top: 35px;
        }

        .more-padding input {
            padding: 12px;
        }

        .more-padding .submit {
            margin-top: 45px;
        }

        .submit {
            margin-top: 25px;
            padding: 12px;
            border-color: #4dd84da6;
        }

        .submit:hover {
            background: #94dd87;
            border-color: #4dd84da6;
        }

        input {
            background: #529bc5d1;
            /*width: 65%;*/
            width: 100%;
            color: #94ff9d;
            border: none;
            border-bottom: 1px solid rgb(29 208 29 / 51%);
            padding: 9px;
            margin: 7px;

            left: 40px;
            position: relative;
        }

        .select {
            background: #529bc5d1;
            width: 100%;
            color: #fbf8f8;
            border: none;
            border-bottom: 1px solid rgb(29 208 29 / 51%);
            padding: 9px;
            margin: 7px;
            left: 40px;
            position: relative;
        }

        input::placeholder {
            color: rgba(246, 246, 246, 1);
            letter-spacing: 2px;
            font-size: 1.3em;
            font-weight: 100;
        }

        input:focus {
            color: #ce7d88;
            outline: none;
            border-bottom: 1.2px solid rgba(206, 125, 136, 0.7);
            font-size: 1em;
            transition: 0.8s all ease;
        }

        input:focus::placeholder {
            opacity: 0;
        }

        label {
            font-family: 'Open Sans', sans-serif;
            color: #ce7d88;
            font-size: 0.8em;
            letter-spacing: 1px;
        }

        .checkbox {
            display: inline;
            white-space: nowrap;
            position: relative;
            left: -62px;
            top: 5px;
        }

        input[type=checkbox] {
            width: 7px;
            background: #ce7d88;
        }

        .checkbox input[type="checkbox"]:checked+label {
            color: #ce7d88;
            transition: 0.5s all ease;
        }
    </style>

    <style>
        /* Checkmark style starts */
        @-moz-keyframes dothabottomcheck {
            0% {
                height: 0;
            }

            100% {
                height: 50px;
            }
        }

        @-webkit-keyframes dothabottomcheck {
            0% {
                height: 0;
            }

            100% {
                height: 50px;
            }
        }

        @keyframes dothabottomcheck {
            0% {
                height: 0;
            }

            100% {
                height: 50px;
            }
        }

        @keyframes dothatopcheck {
            0% {
                height: 0;
            }

            50% {
                height: 0;
            }

            100% {
                height: 120px;
            }
        }

        @-webkit-keyframes dothatopcheck {
            0% {
                height: 0;
            }

            50% {
                height: 0;
            }

            100% {
                height: 120px;
            }
        }

        @-moz-keyframes dothatopcheck {
            0% {
                height: 0;
            }

            50% {
                height: 0;
            }

            100% {
                height: 120px;
            }
        }

        input[class=checkbox] {
            display: none;
        }

        #select_all {
            display: none;
        }

        .check-box {
            height: 100px;
            width: 100px;
            background-color: transparent;
            border: 10px solid #000;
            border-radius: 5px;
            position: relative;
            display: inline-block;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -moz-transition: border-color ease 0.2s;
            -o-transition: border-color ease 0.2s;
            -webkit-transition: border-color ease 0.2s;
            transition: border-color ease 0.2s;
            cursor: pointer;
        }

        .check-box::before,
        .check-box::after {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            position: absolute;
            height: 0;
            width: 20px;
            background-color: #34b93d;
            display: inline-block;
            -moz-transform-origin: left top;
            -ms-transform-origin: left top;
            -o-transform-origin: left top;
            -webkit-transform-origin: left top;
            transform-origin: left top;
            border-radius: 5px;
            content: ' ';
            -webkit-transition: opacity ease 0.5;
            -moz-transition: opacity ease 0.5;
            transition: opacity ease 0.5;
        }

        .check-box::before {
            top: 72px;
            left: 41px;
            box-shadow: 0 0 0 5px #fff;
            -moz-transform: rotate(-135deg);
            -ms-transform: rotate(-135deg);
            -o-transform: rotate(-135deg);
            -webkit-transform: rotate(-135deg);
            transform: rotate(-135deg);
        }

        .check-box::after {
            top: 37px;
            left: 5px;
            -moz-transform: rotate(-45deg);
            -ms-transform: rotate(-45deg);
            -o-transform: rotate(-45deg);
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }

        input[type=checkbox]:checked+.check-box,
        .check-box.checked {
            border-color: #34b93d;
        }

        input[type=checkbox]:checked+.check-box::after,
        .check-box.checked::after {
            height: 50px;
            -moz-animation: dothabottomcheck 0.2s ease 0s forwards;
            -o-animation: dothabottomcheck 0.2s ease 0s forwards;
            -webkit-animation: dothabottomcheck 0.2s ease 0s forwards;
            animation: dothabottomcheck 0.2s ease 0s forwards;
        }

        input[type=checkbox]:checked+.check-box::before,
        .check-box.checked::before {
            height: 120px;
            -moz-animation: dothatopcheck 0.4s ease 0s forwards;
            -o-animation: dothatopcheck 0.4s ease 0s forwards;
            -webkit-animation: dothatopcheck 0.4s ease 0s forwards;
            animation: dothatopcheck 0.4s ease 0s forwards;
        }
    </style>



    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <!-- Modal -->
    <div class="modal" id="condiciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Términos y condiciones</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin:0;background: bisque;">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body" style="padding:40px;">
                    <p style="text-align: left;">CONTRATO DE LICENCIA DE USO DE PROGRAMAS DEL SOFTWARE APLICATIVO DENOMINADO MEDICALSOFT (Software de Gestión para consultorios/clínicas)</p>
                    <p style="text-align: left;">Entre Sievensoft , en adelante el LICENCIANTE, persona jurídica legalmente constituida como Sociedad Anónima y  en adelante el USUARIO, se celebra el presente contrato de LICENCIAMIENTO.</p>

                    <h4 style="text-align: left;">I.            OBJETO</h4>
                    <p style="text-align: left;">1.1 Este contrato tiene por objeto otorgar o conceder una licencia de uso exclusivo al USUARIO, del software denominado MEDICALSOFT, cuyos derechos patrimoniales son propiedad del LICENCIANTE.</p>
                    <p style="text-align: left;">1.2. Módulos Licenciados: Las licencias de uso del software aplicativo que el LICENCIANTE otorga al USUARIO comprenden los módulos que se detallan en el manual de usuario y técnico del sistema.</p>
                    <p style="text-align: left;">1.3 Alcance de las licencias. El otorgamiento de las licencias de uso implica:</p>
                    <p style="text-align: left;">1) La entrega al USUARIO de acceso único al software con numero de licencia . 2) Las licencias de uso indicadas en el literal anterior, dan derecho al USUARIO a utilizar en la forma que considere conveniente, en los equipos de su propiedad, en el ámbito central de cómputo y en las oficinas que designe, la versión licenciada del software aplicativo y a solicitar actualizaciones que considere .</p>
                    <p style="text-align: left;"><strong>AMBIENTE  TECNOLOGICO PARA        INSTALACIÓN        DEL     SOFTWARE LICENCIADO.</strong></p>
                    <p style="text-align: left;"><strong> </strong>Son requisitos mínimos para que el software cuya licencia se otorga funcione de manera correcta los siguientes:</p>

                    <ul style="text-align: left;">
                        <li><em>Internet banda ancha         </em></li>
                        <li>Manejo intermedio del computador ( tener computadores , teléfonos y/o tabletas ) donde visualizar y operar .</li>
                        <li>Manejo de herramientas de comunicación como chat , skype , correo electrónico , para recibir el soporte técnico</li>
                    </ul>
                    <h4 style="text-align: left;">II.        PRECIO DEL CONTRATO</h4>
                    <p style="text-align: left;">La licencia de uso tiene un precio, pero no conlleva o no implica de manera alguna una transmisión, transferencia, cesión o enajenación de los derechos patrimoniales o morales al USUARIO.</p>

                    <h4 style="text-align: left;">III.       VIGENCIA DEL CONTRATO</h4>
                    <p style="text-align: left;">El USUARIO podrá utilizar el software objeto de esta licencia en forma perpetua, siempre de manera exclusiva y para su uso individual, manteniendo su renovación al día en términos económicos y morales.</p>

                    <h4 style="text-align: left;">IV.     LIMITE DE RESPONSABILIDAD DE LA LICENCIA DE USO</h4>
                    <p style="text-align: left;">EL LICENCIANTE no será responsable bajo ninguna circunstancia de:</p>

                    <ul style="text-align: left;">
                        <li><em>Reclamaciones de terceros en contra del USUARIO por pérdidas, daños o perjuicios, atribuibles a la instalación y operación del software aquí licenciado;</em></li>
                        <li><em>Pérdida de los registros, bases de datos, información del </em></li>
                        <li><em>Daños o perjuicios económicos indirectos, lucro cesante o daños incidentales o potenciales, atribuibles a la instalación y operación del software aquí licenciado;</em></li>
                        <li><em>Si el USUARIO permite que personas ajenas a sí mismo o autorizados directos entren con su clave por cualquier motivo, no podrá hacer reclamación alguna de modificación, alteración y perdida de datos .</em></li>
                    </ul>
                    <h4 style="text-align: left;">V.     OBLIGACIONES DEL USUARIO</h4>
                    <ol style="text-align: left;">
                        <li><em>El usuario no arrendarán, subarrendarán, cederán, venderán o transferirán de algún otro modo esta licencia, ni los derechos conferidos en virtud de ella, ni delegarán sus </em></li>
                        <li><em>El usuario aceptan no copiar, ayudar a copiar, o permitir que terceros copien los programas del software licenciado y/o documentación sobre los cuales se le otorga la </em></li>
                        <li><em>Tampoco están facultados para duplicar con fines comerciales o para el uso por personas diferentes, por ningún medio, ninguno de los programas o su documentación objeto de este contrato</em></li>
                    </ol>
                    <h4 style="text-align: left;">VI. TERMINACIÓN DE LA LICENCIA</h4>
                    <p style="text-align: left;">Son causales para la terminación de esta Licencia las previstas en la Ley y cualquier violación de las obligaciones adquiridas mediante esta licencia de uso.</p>
                    <p style="text-align: left;">Esta licencia se rige por las reglas de exportación de servicios  y por los tratados Internacionales actualmente vigentes sobre propiedad intelectual y derechos de autor.</p>
                    <p style="text-align: left;">Así mismo el usuario podrá dejar de utilizar el software en cualquier momento por cualquier causa y sin necesidad de expresarla y solicitar un respaldo de su información de manera gratuita.</p>

                    <h4 style="text-align: left;">VII.  LEGALIZACION Y VIGENCIA</h4>
                    <p style="text-align: left;">El presente contrato se entenderá legalizado solo con la aceptación de términos y condiciones con una tilde al momento del registro del usuario sea cual sea la manera de utilización paga o gratuita.</p>
                    <p style="text-align: left;"><em>Si deseas más información al respecto escribe a info@sievensoft.com</em></p>

                    <hr>
                    <div align="left">
                        <h4> USO DEL SITIO.</h4>
                        Sievensoft company sas opera el sitio web <a href="http://www.hellomedical.net">www.hellomedical.net</a> /www.medicalsoftplus.com  y otros sitios y/o aplicaciones móviles relacionados estos Términos de uso (en conjunto y en adelante nombrados como, <strong>"EL SITIO"</strong>). Se estipula expresamente que los servicios derivados de la Plataforma tienen como único y exclusivo objetivo servir como un intermediario digital. En ningún momento, y bajo ninguna circunstancia, se entenderá que el fin u objetivo de la EL SITIO es prestar servicios médicos. Dichos servicios médicos, en su caso, serán prestados de forma absolutamente independiente a EL SITIO por los <strong>PROVEEDORES DE SALUD</strong> a los <strong>USUARIOS</strong>. Nosotros ponemos a disposición de los USUARIOS una plataforma para gestionar y ejecutar a) servicios de administración de agenda de citas médicas y servicios profesionales de salud ya sea de forma presencial o virtual, b) Teleconsultas con médicos y profesionales de salud telemedicina en línea, c) envío y recepción de prescripción médica, d) captura de datos clínicos y análisis médico. Al acceder y usar el sitio, usted acepta y se obliga a acatar estos Términos de Uso y todas las políticas que rigen el sitio. Si no desea vincularse a estos términos, le pedimos que no use <strong>EL SITIO</strong>.
                        <h4>2. LIMITACIÓN DE RESPONSABILIDAD.</h4>
                        Todos los PROVEEDORES DE SALUD, que ofrecen y/o prestan sus servicios a través de <a href="http://www.hellomedical.net">www.hellomedical.net</a> son profesionales independientes, que no tienen ninguna relación laboral con Sievensoft company sas / Medicalsoft / hello medical y son totalmente responsables por los servicios que ofrecen. Bajo ninguna circunstancia se entenderá que los PROVEEDORES DE SALUD son empleados, afiliados, agentes, representantes, o de cualquier otra manera relacionados a Sievensoft company sas o cualquiera de sus afiliadas. En este sentido, se acuerda expresamente que Sievensoft company sas no forma parte, ni adquiere obligación alguna derivada de, la prestación de servicios médicos por parte de los PROVEEDORES DE SALUD a USUARIOS. <a href="http://www.hellomedical.net">www.hellomedical.net</a> , no diagnostica ni realiza consultas y por ningún motivo interfiere con la práctica médica u otra práctica profesional de salud que ejercen los PROVEEDORES DE SALUD listados en EL SITIO. Todos los PROVEEDORES DE SALUD, son responsables de los servicios e indicaciones que prestan y que ofrecen y también del cumplimiento de las normatividades aplicables para el correcto ejercicio de su profesión. Sievensoft company sas  ni EL SITIO ni cualquier medio por el cual tuvo acceso al sitio es responsable por las prescripciones, consejos, indicaciones o servicios profesionales que obtuvo de los PROVEEDORES DE SALUD a través de los SERVICIOS que ofrece el sitio.

                        Sievensoft company sas , así como cualquier persona relacionada y/o afiliada Sievensoft company sas, incluyendo, sin limitar, directores, apoderados, representantes, administradores, empleados, accionistas y/o agentes, presentes o anteriores, no serán responsables de errores u omisiones en los contenidos de EL SITIO. Asimismo, no serán responsables, bajo ningún caso o circunstancia, por datos y/o perjuicios que se pudieren causar a USUARIOS y/o PROVEEDORES DE SALUD derivado del uso de la Plataforma.

                        En ningún caso Sievensoft company sas  tendrá responsabilidad derivada de violación del secreto profesional por parte de los PROVEEDORES DE SALUD, ni de cualquier daño y/o perjuicio que sean consecuencia directa de una lesión o daño causado por el tratamiento a un USUARIO, por parte de un PROVEEDOR DE SALUD.

                        USUARIOS y PROVEEDORES DE SALUD, mediante su aceptación a los presentes términos y condiciones, se obligan expresamente a sacar en paz y a salvo e indemnizar (incluyendo el pago de honorarios de abogados)a Sievensoft company sas , así como a cualquier persona relacionada y/o afiliada a Sievensoft company sas , incluyendo, sin limitar, directores, apoderados, representantes, administradores, empleados, accionistas y/o agentes, presentes o anteriores, de cualquier responsabilidad que derive, o pudiere derivar, del uso de EL SITIO, o de cualquier servicio derivado de dicho uso, incluyendo de manera enunciativa, más no limitativa, cualesquiera contingencias legales, fiscales, laborales, administrativas, civiles, penales, financieras, de salud o de cualquier otra índole, cualesquiera reclamación, demanda, juicio, acto, hecho u omisión que represente o pudiera representar una responsabilidad a cargo de Sievensoft company sas, o a cargo de personas relacionadas y/o afiliadas.
                        <h4>3. CONTENIDO DEL SITIO.</h4>
                        Ninguna información contenida en el sitio (salvo la que recomienden los PROVEEDORES DE SALUD, bajo su propio criterio profesional), debe considerarse como consulta médica o como garantía de que un tratamiento es apropiado o efectivo para ti.
                        <h4>4. AUTORIZACIÓN DE USO.</h4>
                        <ol>
                            <li>La Teleconsulta / Telemedicina es la entrega de servicios de salud usando tecnología interactiva de audio y video, donde el paciente y el PROVEEDOR DE SALUD, se encuentran en una ubicación física diferente. Durante la Teleconsulta con un PROVEEDOR DE SALUD, detalles personales de salud así como detalles de tu historia clínica pueden ser comunicados y discutidos a través de tecnologías de comunicación virtual.</li>
                            <li>Los servicios de Telemedicina que recibes de los PROVEEDORES DE SALUD, no intentan reemplazar la atención primaria de un médico o ser un médico permanente en casa. Podría darse el caso de desarrollar una relación usual de médico-paciente a través de la plataforma sin embargo, se deben acatar las instrucciones de los PROVEEDORES DE SALUD, de cuál es la mejor vía para que puedas ser diagnosticado y tratado. De cualquier forma y como en cualquier servicio de salud hay riesgos potenciales asociados al uso de la Telemedicina / Teleconsulta. Estos riesgos incluyen pero no se limitan a:</li>
                        </ol>
                        <ul>
                            <li>En algunos casos la información transmitida no es suficiente para permitir un diagnostico o recomendación de salud apropiado (p.e. baja resolución de las imágenes, formatos no compatibles, internet lento, etc).</li>
                            <li>Atrasos en el diagnostico o prescripción pueden ocurrir debido a fallas en los equipos electrónicos. Si esto ocurre deberás entrar en contacto con tu PROVEEDOR DE SALUD por cualquier otro medio.</li>
                            <li>En algunos casos, la falta de acceso a todo tu historial médico puede resultar en una prescripción de medicamentos que tengan un efecto adverso o alérgico o algunos otros errores de juicio.</li>
                            <li>Aunque los sistemas electrónicos que utilizamos incorporan protocolos de máxima seguridad para proteger la privacidad y la seguridad de tu información clínica, en casos extremos estos protocolos podrán fallar, causando una brecha de privacidad de la información clínica personal.</li>
                        </ul>
                        <ol>
                            <li>Aceptando estos Términos de Uso, confirmas que entiendes y aceptas:</li>
                        </ol>
                        <ul>
                            <li>Que puedes esperar beneficios anticipados del uso de la telemedicina en tu favor, pero que ningún resultado puede ser garantizado o asegurado.</li>
                            <li>Que entiendes que las leyes de protección de privacidad y seguridad de la información aplican a la Telemedicina y que has aceptado la política de privacidad de Sievensoft company sas . La comunicación electrónica que se lleva a cabo con EL SITIO, es transmitida a través de una interface segura y encriptado de video y de información</li>
                            <li>Que el PROVEEDOR DE SALUD puede determinar que los SERVICIOS, no son apropiados para tus necesidades y puede recomendar consultas presenciales u otro tipo de asistencia.</li>
                            <li>Con respecto a la psicoterapia, puedes recibir información de tu PROVEEDOR DE SALUD acerca de los métodos de terapia, técnicas usadas, duración de tu terapia y la estructura de los pagos. Puedes en cualquier momento buscar una segunda opinión de otro terapeuta o terminar la terapia cuando lo decidas.</li>
                        </ul>
                        <ol>
                            <li>Con respecto a la psicoterapia, si tú y tu PROVEEDOR DE SALUD, deciden realizar terapias de grupo o de parejas (en conjunto <strong>"TERAPIA DE GRUPO"</strong>) entiendes y aceptas que la información discutida en la terapia de grupo es para fines terapéuticos y de ninguna forma para fines legales que involucren a los participantes del grupo. Así mismo aceptas a no citar al PROVEEDOR DE SALUD a testificar por o contra cualquier participante de la TERAPIA DE GRUPO o proveer información en alguna acción legal contra los participantes de la TERAPIA DE GRUPO. Entiendes y aceptas que cualquier información que los participantes de la TERAPIA DE GRUPO comuniquen por cualquier medio al PROVEEDOR DE SALUD queda a completa discreción de este último para compartirla con los demás participantes de la TERAPIA DE GRUPO. Tu aceptas y compartes la responsabilidad con el PROVEEDOR DE SALUD, por el progreso de la terapia, incluyendo la fijación de objetivos y la terminación de la terapia.</li>
                            <li><strong> MÉDICO Y/O PROFESIONAL DE LA SALUD:</strong>Al aceptar estos términos y condiciones autoriza que EL SITIO (aliv.io) así como sus entidades legales puedan actuar como agente de cobranza en su nombre, sin que por ello se entienda que aliv.io es una prestadora de servicios de salud. El sitio realizará los cobros de las consultas que usted realice a través de la plataforma y transferirá los recursos a la cuenta bancaría que usted indique. Las obligaciones fiscales de los ingresos generados por consultas médicas continúan bajo la responsabilidad de cada prestador de servicios. Sievensoft company sas es responsable de las obligaciones fiscales de los ingresos generados por el uso de la plataforma Tecnológica.</li>
                        </ol>
                        <h4>5. AVISO DE PRIVACIDAD.</h4>
                        El presente aviso de Privacidad acata las Leyes de Protección de Datos Personales en Posesión de los Particulares, su Reglamento y los Lineamientos del Aviso de Privacidad, en todos los países donde EL SITIO tiene operaciones.

                        Es política y compromiso de Sievensoft company sas  con domicilio Bogotá, Colombia, respetar y proteger la privacidad de todos nuestros clientes y potenciales clientes, así como de los titulares de los datos personales que tengamos en nuestra posesión.

                        En Sievensoft company sas. Procuramos mantener una comunicación constante y activa con nuestros miembros, usuarios, visitantes y demás personas importantes para nosotros. Salvo notificación o instrucción contraria del titular de los datos personales (en adelante "Titular"), Él o ella consiente su tratamiento y uso dentro y fuera de las jurisdicciones donde opera Sievensoft company sas de conformidad con el presente Aviso y los "Términos de Uso" del Portal y reconoce que podrán ser manejados y/o transferidos directa o indirectamente por aliv.io, los PROVEEDORES DE SALUD, así como también autoridades competentes dentro del marco legal aplicable.

                        El tratamiento de los datos personales del Titular, comprende las siguientes finalidades:
                        <ul>
                            <li>Ser contactado para solucionar y dar seguimiento a incidentes que tenga con el uso de EL SITIO.</li>
                            <li>Ser contactado por los PROVEEDORES DE SALUD, para proveerle los servicios de salud que haya solicitado.</li>
                            <li>Que los USUARIOS puedan contactar a los PROVEEDORES DE SALUD, para recibir los servicios de salud solicitados.</li>
                            <li>Ser contactado y enviarle información relativa a las solicitudes del "Titular" o para agilizar y mejorar los Servicios y mantener comunicación en general.</li>
                            <li>Ser contactado y enviarle información relativa a los Médicos o Especialistas, promociones disponibles, y los cambios o mejoras de nuestros Servicios, así como otras comunicaciones, con el contenido que creemos le podría interesar.</li>
                            <li>Ser contactado a fin de recordarle sobre citas próximas o de seguimiento en conjunto con el uso de determinadas Herramientas Interactivas y otras aplicaciones comunitarias.</li>
                            <li>Realizar cobros por servicios adquiridos en EL SITIO, en nombre de los PROVEEDORES DE SALUD o por uso de la plataforma propiedad de Sievensoft company sas</li>
                            <li>Dar a conocer a nuestros miembros, usuarios y visitantes la información necesaria sobre los Médicos o Especialistas que forman parte de nuestra comunidad con el fin de que tengan acceso a la mejor opción en cuanto a experiencia, conocimientos, citas, horarios, ubicación, etc.</li>
                            <li>Conocer los trabajos, experiencias y niveles de estudios de los Médicos o Especialistas de nuestra comunidad.</li>
                            <li>Poner a disposición de los PROVEEDORES DE SALUD información necesaria para realizar un diagnóstico de salud con el fin de que pueda obtener un consejo una prescripción o un servicio de salud.</li>
                        </ul>
                        Para prevenir el acceso no autorizado a los datos personales del "Titular" y con el fin de asegurar que la información sea utilizada para los fines establecidos en este aviso de privacidad, las opciones y medios que hemos establecido son, de manera general los mismos que utilizamos para nuestros propios datos y documentos.

                        El Titular siempre tendrá derecho al acceso, rectificación, cancelación, u oposición respecto el uso de sus datos personales (Solicitud) y podrá revocar la autorización de Sievensoft company sas  para usar y tratar, así como limitar el uso o divulgación de sus datos personales mediante correo dirigido a la siguiente dirección: soporte@sievensoft.com en el cual debe indicar su usuario y el deseo de eliminar su cuenta de la plataforma

                        Esta solicitud, independientemente de los medios en que ponemos a su disposición este aviso, es regulada por las leyes de los datos personales aplicables al país de residencia de su cuenta de usuario.

                        Todo cambio a los términos y condiciones de este Aviso de Privacidad, será publicado en nuestra página en internet para que el Titular siempre tenga conocimiento de la versión vigente del mismo, así como de los Términos de Uso de nuestro Sitio.

                        El presente Aviso de Privacidad no abarca los términos de privacidad de personas ajenas al sitio web
                        <h4>6. CUENTA DE USUARIO.</h4>
                        Para hacer uso del sitio es requerido crear una cuenta de usuario (<strong>CUENTA DE USUARIO</strong>), ingresando tu nombre, edad, correo electrónico, teléfono, password y otra información recolectada por EL SITIO (en conjunto llamada <strong>INFORMACIÓN DE LA CUENTA</strong>). Para crear una CUENTA DE USUARIO debes ser mayor de edad para poder aceptar estos términos y condiciones vinculantes. Si no eres mayor de edad no debes registrarte para el uso de los SERVICIOS. Tú aceptas que la información que ingreses para crear la cuenta y cualquier información que ingreses al sitio, es verdadera, exacta, actualizada y completa. No debes transferir o compartir tu password ni la información de tu CUENTA DE USUARIO con nadie o crear más de una cuenta (con la excepción de subcuentas para niños de los cuales eres padre y responsable legal). Eres responsable de mantener la confidencialidad de tu cuenta y de todas las actividades que realices en ella. Sievensoft company sas,  se reserva del derecho de ejecutar cualquier acción que considere adecuada para salvaguardar la seguridad del sitio y de la información de tu cuenta. En ningún caso y bajo ninguna circunstancia Sievensoft company sas, será responsable por cualquier percance o daño resultado del uso del sitio, del uso de la información de tu cuenta o el despliegue de la información de tu cuenta a terceras personas. En ningún caso debes utilizar la cuenta de alguien más.
                        <h4>7. USO DEL SITIO PARA MENORES DE EDAD.</h4>
                        Los SERVICIOS, están disponibles para ser utilizados por niños( menos de 18 años), sin embargo el usuario a través del cual dispongan de los SERVICIOS debe ser mayor de 18 años y debe ser el padre o tutor del niño. Si tú te registras como el padre o tutor de un niño serás totalmente responsable del cumplimiento de estos Términos y condiciones.

                        &nbsp;
                        <h4>8. DERECHO DE ACCESO AL SITIO.</h4>
                        Por este medio se te otorga un derecho de uso limitado, no exclusivo y no transferible a EL SITIO y al uso de LOS SERVICIOS que se promueven en él, para tu uso personal y no comercial. Nos reservamos el derecho a nuestra entera discreción de negar o suspender el acceso y el uso de EL SITIO o sus SERVICIOS por cualquier razón. Tu aceptas que de ninguna manera
                        <ol>
                            <li><strong>a)</strong> Te harás pasar por otra persona o entidad.</li>
                            <li><strong>b)</strong> Usaras EL SITIO y LOS SERVICIOS para violar ninguna ley ni regulación local, nacional o internacional.</li>
                            <li><strong>c)</strong> Desmantelar, descompilar, decodificar, copiar todo o en partes, aplicar ingeniería en reversa, transferir, traducir cualquier software o componente parte de EL SITIO.</li>
                            <li><strong>d)</strong> Distribuir virus o cualquier otro código que pueda dañar equipos tecnológicos.</li>
                            <li><strong>e)</strong> Usar LOS SERVICIOS del sitio de cualquier manera que rebase el objetivo y el alcance plasmado en este documento.</li>
                            <li><strong>f)</strong> Adicionalmente tú aceptas no utilizar lenguaje ofensivo y mantener siempre un comportamiento cordial con los PROVEEDORES DE SALUD y el personal Staff del sitio web.</li>
                        </ol>
                        Recomendamos ampliamente no usar LOS SERVICIOS en computadoras públicas.

                        También recomendamos que no almacenes tu contraseña en el buscador o con otro software.
                        <h4>9. TÉRMINOS DE COMPRA, PAGO DE SERVICIOS Y REEMBOLSOS.</h4>
                        Tu aceptas y accedes a pagar todos los cargos hechos a tu CUENTA DE USUARIO, de acuerdo con las tarifas y términos de pago establecidas en el momento que EL SERVICIO, es generado u adquirido. Al capturar la información de algún MEDIO DE PAGO, autorizas a Sievensoft company sas o cualquiera de sus afiliadas, a cargar inmediatamente tu medio de pago y CUENTA DE USUARIO, con las tarifas correspondientes a los servicios solicitados a través de la plataforma. En adelante no es necesaria ninguna autorización adicional para poder realizar los cargos a los medios de pago capturados en la plataforma.

                        Sievensoft company sas, se reserva el derecho a modificar o implementar una nueva estructura de precios por LOS SERVICIOS que ofrece la plataforma en cualquier momento. Cualquier cambio a la estructura de precios será comunicado a través de EL SITIO y los medios de comunicación que se dispongan.

                        Tu entiendes y aceptas que por LOS SERVICIOS realizados con base en una cita agendada previamente serás responsable completamente en caso de que no asistas a la cita y que se cobrara el monto completo de la consulta médica y el uso de la plataforma en caso de que no se cancele la cita al menos con 24 horas de anterioridad.

                        Los pagos hechos por LOS SERVICIOS son finales y no reembolsables, a menos que se determine lo contrario por parte de Sievensoft company sas  analizando caso por caso mediante una solicitud por escrito enviada por USUARIOS y/o PROVEEDORES al correo <strong>soporte@sievensoft.com</strong> Sievensoft company sas, responderá a cualquier solicitud de un PROVEEDOR DE SALUD o USUARIO en un plazo no mayor de 30 días naturales.

                        Sievensoft company sas, puede generar ofertas promocionales y descuentos que pueden modificar los cargos.

                        &nbsp;
                        <ol start="10">
                            <li>PROPIEDAD.</li>
                        </ol>
                        El sitio y todo su contenido, configuraciones, y funcionalidad (que incluye pero no se limita a toda la información, software, texto, catálogos, imágenes, video, audio y diseño, flujos de procesos, botones de selección etc.) son propiedad de Sievensoft company sas, sus licenciatarios y/o otros proveedores de material, los cuales están protegidos por leyes y tratados internacionales de derechos de autor, marcas y patentes. Estos Términos permiten el uso de EL SITIO y LOS SERVICIOS para tu uso personal y no comercial. No debes reproducir, distribuir, modificar, crear trabajos derivados, desplegar, publicitar, republicar, descargar, almacenar o transmitir ningún material de nuestro sitio, excepto lo explícitamente permitido en estos Términos y Condiciones. No debes acceder o usar ninguna parte de EL SITIO o los SERVICIOS con fines comerciales.
                        <h4>11. MARCAS.</h4>
                        Algunos nombres, logos y otros materiales desplegados en EL STIO o en los SERVICIOS pueden ser marcas o nombres o logos (LAS MARCAS) propiedad de Sievensoft company sas. No tienes autorizado usar LAS MARCAS, sin permiso explícito y por escrito de Sievensoft company sas
                        <h4>12. TERMINACIÓN DE USUARIO.</h4>
                        Tienes derecho en cualquier momento y por cualquier razón a desactivar tu CUENTA DE USUARIO mandando un correo a soporte@sievensoft.com

                        Sievensoft company sas , puede suspender o cancelar tu CUENTA DE USUARIO, el uso de EL SITIO y LOS SERVICIOS, por cualquier razón en el momento que lo considere. Sujeto a la ley aplicable Sievensoft company sas, se reserva el derecho de mantener, almacenar, borrar o destruir, cualquier comunicación y material publicado y cargado en o a través de EL SITIO.
                        <h4>13. COOKIES.</h4>
                        Una cookie es un archivo de texto muy pequeño que un servidor Web puede guardar en el disco duro de un equipo para almacenar algún tipo de información sobre el usuario. La cookie identifica el equipo de forma única, y sólo puede ser leída por el sitio Web que lo envió al equipo.

                        Una cookie no es un archivo ejecutable ni un programa y por lo tanto no puede propagar o contener un virus u otro software malicioso.

                        La utilización de las cookies tiene como finalidad exclusiva recordar las preferencias del usuario (idioma, país, inicio de sesión, características de su navegador, información de uso de nuestra Web, etc

                        Sievensoft company sas, en este acto, notifica a Usuarios y Proveedores que EL SITIO, así como todos los servicios relacionados con la misma, podrán utilizar cookies a efecto de mejorar los servicios prestados por Sievensoft company sas. Mediante el registro y utilización de la Plataforma, Usuarios y Proveedores otorgan su consentimiento a Sievensoft company sas, en relación con la utilización de cookies en EL SITIO.

                        La información de Usuarios y Proveedores obtenida a través de cookies se utiliza para analizar tendencias, administrar la Plataforma, conocer la conducta del Usuario o Proveedor, y recopilar información de carácter demográfico acerca de nuestra base de Usuarios y Proveedores en conjunto. Sievensoft company sas, puede utilizar esta información en sus servicios de marketing y publicidad. Esta información puede utilizarse para reducir o eliminar la cantidad de mensajes enviados a nuestros clientes.

                        &nbsp;


                    </div>







                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>

    <script>
        $('#signup').click(function() {
            $('.pinkbox').css('transform', 'translateX(80%)');
            $('.signin').addClass('nodisplay');
            $('.signup').removeClass('nodisplay');
        });

        $('#signin').click(function() {
            $('.pinkbox').css('transform', 'translateX(0%)');
            $('.signup').addClass('nodisplay');
            $('.signin').removeClass('nodisplay');
        });
    </script>
<?php endif; ?>