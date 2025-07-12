<?php
include 'funciones/funciones.php';
include 'funciones/conn3.php';

// procesar login 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $response = json_decode(loginUser($username, $password), true);
    // var_dump($response);
?>
    <div class="alert alert-<?= ($response['error'] ? 'danger' : 'success')?> alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas <?= ($response['error'] ? 'fa-ban' : 'fa-check') ?>"></i></h5>
        <?= $response['mensaje'] ?>
    </div>
<?php
//var_dump($response['location']);
if (isset($response['location'])) {
    $_SESSION['response']=$response['location'];
        if ($response['location']) {
            header("location: " . $response['location']);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$sistema?> | Iniciar sesión</title>





    <meta property="og:title" content="dentalsoftplus">
   <meta property="og:description" content="Potencializa tu clínica odontológica con nuestras herramientas únicas, diseñadas para atraer y retener a más pacientes, llevando la excelencia en tu practica a otro nivel.">
   <meta property="og:url" content="https://dentalsoftplus.com/">
   <meta property="og:image" content="<?= $Base ?>img/dentalsoftpluselmejor.png">
   <meta property="og:type" content="website">
   <meta property="og:site_name" content="dentalsoftplus">
   <meta property="og:locale" content="es_ES">

 

<meta name="rating" content="general">
<meta name="format-detection" content="telephone=no">

<meta name="twitter:card" content="<?= $Base ?>/img/Disenos-pagina-30.png">
<meta name="twitter:title" content="dentalsoftplus">
<meta name="twitter:description" content="Potencializa tu clínica odontológica con nuestras herramientas únicas, diseñadas para atraer y retener a más pacientes, llevando la excelencia en tu practica a otro nivel.">
<meta name="twitter:image" content="<?= $Base ?>/img/Disenos-pagina-30.png">

 <meta name="description" content="Potencializa tu clínica odontológica con nuestras herramientas únicas, diseñadas para atraer y retener a más pacientes, llevando la excelencia en tu practica a otro nivel.">

 

<link rel="canonical" href="<?= $Base ?>">

   
    <!-- Favicon -->
    <link href="https://sievensoft.com/logosMarcas/dentalsoft/isologo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">














    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $Base ?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= $Base ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= $Base ?>dist/css/adminlte.min.css">
</head>

<style>
    .animated-background {
        background: linear-gradient(270deg, #81d3f790, #0064dc90);
        background-size: 400% 400%;
        animation: gradientAnimation 10s ease infinite;
    }

    @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }
</style>

<body class="hold-transition login-page ">

    <div style="position: fixed; margin-left: 23em;" id="show">
        <img style="transform: rotate(20deg); height: 10cm; width: auto;" src="https://sievensoft.com/logosMarcas/dentalsoft/isologo.png" alt="">
    </div>


    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card" style="background-color: rgba(255, 255, 255, 0.5);">
            <div class="card-header text-center bg-white">
        <!--

                <img src="https://flagpedia.net/data/flags/h120/<?= strtolower($_SESSION['geoData']['countryCode']) ?>.webp" style="width:50px;height:auto;border-radius: 10px; position: absolute;margin-left: -3em; top: 2em;">
-->
                <img src="https://sievensoft.com/logosMarcas/dentalsoft/horizontal.png" style="height:2cm; width:auto;">
            </div>
            <div class="card-body login-card-body" style="background-color: rgba(255, 255, 255, 0.5);">
                <p class="login-box-msg">Bienvenido(a) <br> por favor inicia sesión para continuar</p>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Correo electrónico" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text bg-white">
                                <span class="fas fa-envelope text-primary"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Contraseña" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text bg-white">
                                <span class="fas fa-lock text-primary"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!-- <div class="social-auth-links text-center mb-3">
                    <p>- O -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-google mr-2"></i> Inicia sesión con Google
                    </a>
                </div> -->
                <!-- /.social-auth-links -->

                <!-- <p class="mb-1">
                    <a href="forgot-password.html">Recuperar contraseña</a>
                </p> -->
                <p class="mb-0 mt-3">
                    <a href="https://dentalsoftplus.com/eres-especialista" class="text-center">No tienes cuenta? Regístrate aquí</a>
                </p>
                <p class="mb-0 mt-3">
                    <a href="https://dentalsoftplus.com/recuperar-contrasena" class="text-center">Recuperar contraseña</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->



    <!-- jQuery -->
    <script src="<?= $Base ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= $Base ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= $Base ?>dist/js/adminlte.min.js"></script>

</body>

</html>