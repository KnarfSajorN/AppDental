<?php
session_start();
include '../funciones/funciones.php';
include '../verificarSesion.php';

$logo = (funcionMaster($_SESSION['ID'], 'ID_Usuario', 'logoF', 'config') != null ? 'logos/' . funcionMaster($_SESSION['ID'], 'ID_Usuario', 'logoF', 'config') : 'img/logoSolo.png');
$tiempoConsulta = (funcionMaster($_SESSION['ID'], 'ID_Usuario', 'tiempoConsulta', 'config') != 0 ? funcionMaster($_SESSION['ID'], 'ID_Usuario', 'tiempoConsulta', 'config') : '30');

// consulta el config del usuario
$queryAsistenteConfig = "SELECT * from asistenteVirtualConfig where usuarioId = " . $_SESSION['ID'] . " and activo = 1;";
$resultAsistenteConfig = $conn3->query($queryAsistenteConfig);
// var_dump($resultAsistenteConfig);
if ($resultAsistenteConfig === false) {
    header('Location: ' . $Base . '/portada');
} else {
    $rowAsistenteConfig = $resultAsistenteConfig->fetch_assoc();
    // var_dump($rowAsistenteConfig);

    $queryAsistenteConfigUser = "SELECT * from asistenteVirtualCommandsUsers where usuarioId = " . $_SESSION['ID'] . " and activo = 1 order by rand()";
    $resultAsistenteConfigUser = $conn3->query($queryAsistenteConfigUser);
    $rowCommands = [];
    while ($rowAsistenteConfigUser = $resultAsistenteConfigUser->fetch_assoc()) {
        $rowCommands[] = $rowAsistenteConfigUser;
    }

    $queryAsistenteGeneralCommand = "SELECT * from asistenteVirtualCommands";
    $resultAsistenteGeneralCommand = $conn3->query($queryAsistenteGeneralCommand);
    $rowCommandsGeneral = [];
    while ($rowAsistenteGeneralCommand = $resultAsistenteGeneralCommand->fetch_assoc()) {
        $rowCommandsGeneral[] = $rowAsistenteGeneralCommand;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $sistema ?> | Asistente Virtual</title>
    <link rel="icon" type="image/vnd.microsoft.icon" href="https://medicalsoftplus.com/iconoms.ico">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $Base ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= $Base ?>dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $Base ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="<?= $Base ?>plugins/FontAwesomeK Free 6.0/css/all.css">
    <!-- animaciones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="<?= $Base ?>js/kit.fontawesome.js" crossorigin="anonymous"></script>
    <style>
        .waves {
            position: relative;
            width: 100%;
            height: 30vh;
            margin-bottom: -7px;
            /*Fix for safari gap*/
            min-height: 100px;
            max-height: 300px;
        }

        /* Animation */
        .parallax>use {
            animation: move-forever 25s cubic-bezier(.55, .5, .45, .5) infinite;
        }

        .parallax>use:nth-child(1) {
            animation-delay: -2s;
            animation-duration: 4s;
        }

        .parallax>use:nth-child(2) {
            animation-delay: -3s;
            animation-duration: 7s;
        }

        .parallax>use:nth-child(3) {
            animation-delay: -4s;
            animation-duration: 9s;
        }

        .parallax>use:nth-child(4) {
            animation-delay: -5s;
            animation-duration: 17s;
        }

        @keyframes move-forever {
            0% {
                transform: translate3d(-90px, 0, 0);
            }

            100% {
                transform: translate3d(85px, 0, 0);
            }
        }

        /*Shrinking for mobile*/
        @media (max-width: 768px) {
            .waves {
                height: 100px;
                min-height: 40px;
            }
        }
    </style>

    <style>
        .loaderAI {
            z-index: 9999;
            width: 350px;
            height: 350px;
            background-color: #6f42c170;
            border-radius: 50%;
            position: fixed;
            /* Cambié "relative" por "fixed" */
            top: 50%;
            /* Lo coloca a la mitad de la pantalla */
            left: 50%;
            /* Lo coloca a la mitad de la pantalla */
            transform: translate(-50%, -50%);
            /* Ajuste para centrarlo perfectamente */
            box-shadow: 0 0 30px 4px rgba(0, 0, 0, 0.5) inset,
                0 5px 12px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        .loaderAI:before,
        .loaderAI:after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 45%;
            top: -40%;
            background-color: #fff;
            animation: wave 5s linear infinite;
        }

        .loaderAI:before {
            border-radius: 30%;
            background: rgba(255, 255, 255, 0.4);
            animation: wave 5s linear infinite;
        }

        @keyframes wave {
            0% {
                transform: rotate(0);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>


</head>

<body class="hold-transition lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper mt-5">
        <div class="lockscreen-logo">
            <a href="<?= $Base ?>asistente"><b>Asistente</b> Virtual</a>
        </div>
        <!-- User name -->
        <div class="lockscreen-name">Usuario: <?= $_SESSION['NOMBRE_USUARIO'] ?></div>

        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                <img src="<?= $Base ?><?= $logo ?>" alt="User Image">
            </div>
            <!-- /.lockscreen-image -->

            <!-- lockscreen credentials (contains the form) -->
            <div class="lockscreen-credentials">
                <div class="input-group bg-white rounded-lg">
                    <h3 class="m-0 p-0"><?= ($rowAsistenteConfig['nombre'] != '' ? $rowAsistenteConfig['nombre'] : '.') ?></h3>
                </div>
            </div>
            <!-- /.lockscreen credentials -->

        </div>




        <!-- /.lockscreen-item -->
        <div class="text-center">
            <button type="button" name="" id="iniciarAsistente" class="btn btn-outline-secondary rounded-pill" onclick="inicializarTodo(this.id)">
                Iniciar Asistente
            </button>
        </div>
        <div class="lockscreen-footer text-center">
            <!-- Copyright &copy; 2014-2021 <b><a href="https://adminlte.io" class="text-black">AdminLTE.io</a></b><br>
            All rights reserved -->
            <div id="carouselId" class="carousel slide p-2 rounded-lg" data-ride="carousel" style="background-color: rgba(0, 0, 0, 0.1);">
                <div class="lockscreen-logo">
                    Acciones activas
                </div>
                <ol class="carousel-indicators">
                    <?php for ($i = 0; $i < count($rowCommands); $i++) { ?>
                        <li data-target="#carouselId" data-slide-to="<?= $i ?>" class="<?= $i == 0 ? 'active' : '' ?>"></li>
                    <?php } ?>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <?php for ($i = 0; $i < count($rowCommands); $i++) { ?>
                        <?php $thisCommandGeneral = $rowCommandsGeneral[array_search($rowCommands[$i]['commandId'], array_column($rowCommandsGeneral, 'id'))]; ?>
                        <div class="carousel-item <?= $i == 0 ? 'active' : '' ?> mb-5">
                            <i class="fas fa-<?= $thisCommandGeneral['icon'] ?> fa-5x mb-2 text-<?= $thisCommandGeneral['color'] ?>"></i>
                            <div class="bg-white rounded-lg mx-5 py-1">
                                <h5><?= $thisCommandGeneral['nombre'] ?></h5>
                                <p class="p-0 m-0">Diga: <strong class="text-<?= $thisCommandGeneral['color'] ?>"><?= $rowAsistenteConfig['nombre'] ?></strong> <?= $rowCommands[$i]['comando'] ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
            </div>
            <hr>
            <div style="position: absolute; z-index: 9999999999;" id="player" class="d-none">
                <div class="card">
                    <div class="card-header" id="playerHeader">
                        <h3 class="card-title">Reproductor</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-text" id="playerBody"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.center -->

    <!-- fixed bottom div -->
    <div class="fixed-bottom" style="z-index: 0;">
        <div id="wavesUser" class="d-none">
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="#007bff70" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="#007bff50" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="#007bff30" />
                </g>
            </svg>

            <div class="fixed-bottom" style="z-index: 0;">
                <div class="row">
                    <div class="col-12 center text-center">
                        <span class="px-3 py-2 bg-white rounded rounded-lg">
                            <strong><?= $_SESSION['NOMBRE_USUARIO'] ?></strong>
                        </span>
                        <br>
                        <span class="px-3 py-2 bg-white rounded rounded-lg text-muted">
                            <em><strong><?= $rowAsistenteConfig['nombre'] ?></strong> su asistente esta escuchando</em>
                        </span>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed-bottom" style="z-index: 0;">
        <div id="wavesAssistant" class="d-none">
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="#6f42c170" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="#6f42c150" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="#6f42c130" />
                </g>
            </svg>

            <div class="fixed-bottom" style="z-index: 0;">
                <div class="row">
                    <div class="col-12 center text-center">
                        <?php if ($rowAsistenteConfig['nombre'] != '') : ?>
                            <span class="px-3 py-2 bg-white rounded rounded-lg">
                                <strong><?= $rowAsistenteConfig['nombre'] ?></strong>
                            </span>
                            <br>
                        <?php endif ?>
                        <span class="px-3 py-2 bg-white rounded rounded-lg text-muted">
                            <em>Por favor espere que el asistente termine de hablar para responder</em>
                        </span>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <span class="loaderAI" style="display: none;"></span>





    <!-- jQuery -->
    <script src="<?= $Base ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= $Base ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            setInterval(function() {
                fetch("<?= $Base ?>refrescar.php").then((response) => {
                    return response.text();
                });
            }, 5000);
        });
    </script>
    <!-- automaticForm -->
    <!-- agrego plugins automaticForm para cruds automáticos -->
    <script src="<?= $Base ?>plugins/automaticForm/personalizado.js"></script>
    <script src="<?= $Base ?>plugins/automaticForm/automaticForm.js"></script>
    <script src="<?= $Base ?>plugins/automaticForm/tokenMaster.js"></script>
    <script src="<?= $Base ?>plugins/automaticForm/systemConfigForm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- 20 06 2026 - JRodriguez -->

    <script>
        function funcionMaster(filtro, campoFiltrar, campoImprimir, tabla, imprimir = null) {
            if (imprimir == null) {
                // promesa
                return new Promise((resolve, reject) => {
                    $.ajax({
                        type: "POST",
                        url: "<?= $Base ?>ajax_funcionMaster.php",
                        data: {
                            filtro: filtro,
                            campoFiltrar: campoFiltrar,
                            campoImprimir: campoImprimir,
                            tabla: tabla
                        },
                        success: function(data) {
                            resolve(data); // Resuelve la promesa con los datos recibidos
                            // data.then((resolve)=>{
                            // return resolve.json();
                            // });
                        },
                        error: function(xhr, status, error) {
                            reject(error); // Rechaza la promesa con el error, si lo hay
                        }
                    });
                });
            } else {
                // normal
                $.ajax({
                    type: "POST",
                    url: "<?= $Base ?>ajax_funcionMaster.php",
                    data: {
                        filtro: filtro,
                        campoFiltrar: campoFiltrar,
                        campoImprimir: campoImprimir,
                        tabla: tabla
                    },
                    success: function(data) {
                        // $(imprimir).html(data);
                        if ($(imprimir).is("input")) {
                            $(imprimir).val(data); // Si es un input, asigna el valor usando .val()
                        } else {
                            $(imprimir).html(data); // Si no es un input, asigna el HTML usando .html()
                        }
                    }
                });
            }
        }
    </script>

    <script>
        const animateCSS = (element, animation, display = '', prefix = 'animate__') =>
            // We create a Promise and return it
            new Promise((resolve, reject) => {
                const animationName = `${prefix}${animation}`;
                const node = document.querySelector(element);

                node.className = `${prefix}animated ${animationName}`;

                // When the animation ends, we clean the classes and resolve the Promise
                function handleAnimationEnd(event) {
                    event.stopPropagation();
                    (display == 'd-none' ? node.className = display : '');

                    // node.classList.remove(`${prefix}animated`, animationName);
                    resolve('Animation ended');
                }

                node.addEventListener('animationend', handleAnimationEnd, {
                    once: true
                });
            });
    </script>

    <!-- artyom voice  -->
    <?php include './artyomConfig.php'; ?>


</body>

</html>