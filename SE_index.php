<?php
session_start();
include 'funciones/conn3.php';

// tener la sesion del usaurio
// var_dump($_SESSION);

// consulta al usuario 
$queryUsuario = "SELECT * from usuarios where (id = '{$_SESSION['ID']}' or id = '{$_SESSION['ID_principal']}') limit 1 ";
$resultUsuario = mysqli_query($conn3, $queryUsuario);
$rowUsuario = mysqli_fetch_assoc($resultUsuario);
// var_dump($rowUsuario);

// consulta al config
$queryConfig = "SELECT * from config where (ID_Usuario = '{$_SESSION['ID']}' or ID_Usuario = '{$_SESSION['ID_principal']}') limit 1 ";
$resultConfig = mysqli_query($conn3, $queryConfig);
$rowConfig = mysqli_fetch_assoc($resultConfig);
// var_dump($rowConfig);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sala de espera</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="dist/css/adminlte.min.css?v=3.2.0">

    <!--  ============== FAVICONS =============== -->
    <link rel="apple-touch-icon" sizes="57x57" href="packFaviconsDentalsoft/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="packFaviconsDentalsoft/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="packFaviconsDentalsoft/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="packFaviconsDentalsoft/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="packFaviconsDentalsoft/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="packFaviconsDentalsoft/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="packFaviconsDentalsoft/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="packFaviconsDentalsoft/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="packFaviconsDentalsoft/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="packFaviconsDentalsoft/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="packFaviconsDentalsoft/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="packFaviconsDentalsoft/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="packFaviconsDentalsoft/favicon-16x16.png">
    <link rel="manifest" href="packFaviconsDentalsoft/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--  ============== FAVICONS =============== -->


</head>

<style>
    .wrapper {
        background-color: #f4f6f9;
        background-image: url('ImagenesHistoria/fondosalaespera2.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-color: white !important;
    }
</style>

<body class="">

    <div class="wrapper">

        <div class="content-wrapper ml-0" style="background-color: rgba(0,0,0,0.4);">

            <section class="content">

                <div class="container-fluid ">
                    <div class="row pt-3">
                        <div class="col-lg-8 ">

                            <div class="card">
                                <div class="card-header border-0 center text-center">
                                    <h1 class="">
                                        <strong>En Consulta</strong>
                                    </h1>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle center text-center">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <h2><strong>Turno</strong></h2>
                                                </th>
                                                <th>
                                                    <h2><strong>Consultorio</strong></h2>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="Consultorio">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header border-0 center text-center">
                                    <h2 class="">En espera</h2>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle center text-center">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <h3><strong>Turno</strong></h3>
                                                </th>
                                                <th>
                                                    <h3><strong>Consultorio</strong></h3>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="SalaEspera">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-4">
                            <div class="card" style="background-color: rgba(255,255,255,0.8);">
                                <div class="card-body box-profile">
                                    <div class="text-center mb-3">
                                        <img class="img img-fluid img-responsive w-100"
                                            src="<?= ($rowConfig['logoF'] != '' ? './logos/' . $rowConfig['logoF'] : 'img/logoSolo.png') ?>">
                                    </div>
                                    <h3 class="profile-username text-center"><?= $rowUsuario['empresaNombre'] ?></h3>
                                    <p class="text-muted text-center">Dentalsoft+</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section>

        </div>

    </div>


    <script src="plugins/jquery/jquery.min.js"></script>

    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="dist/js/adminlte.min.js?v=3.2.0"></script>

    <div style="display:none;">
        <select id="voces">
        </select>
    </div>
</body>

</html>

<script>
    const IDIOMAS_PREFERIDOS = ["es-MX", "es-US", "es-ES", "es_ES"];

    let vocesDisponibles = []; // Mueve la declaración aquí para que sea accesible en todo el ámbito

    document.addEventListener("DOMContentLoaded", () => {
        const $voces = document.querySelector("#voces");

        let posibleIndice = 0;

        const cargarVoces = () => {
            // console.log("cargarVoces");
            vocesDisponibles = speechSynthesis.getVoices();
            // console.log({
            //     vocesDisponibles
            // })
            posibleIndice = vocesDisponibles.findIndex(voz => IDIOMAS_PREFERIDOS.includes(voz.lang));
            if (posibleIndice === -1) posibleIndice = 0;

            // Limpiamos el select antes de agregar las nuevas voces
            $voces.innerHTML = "";

            vocesDisponibles.forEach((voz, indice) => {
                const opcion = document.createElement("option");
                opcion.value = indice;
                opcion.innerHTML = voz.name;
                opcion.selected = indice === posibleIndice;
                $voces.appendChild(opcion);
            });
        };

        if (!'speechSynthesis' in window) return alert("Lo siento, tu navegador no soporta esta tecnología");

        cargarVoces();

        if ('onvoiceschanged' in speechSynthesis) {
            speechSynthesis.onvoiceschanged = function () {
                cargarVoces();
                // Llamamos a leerTexto() después de cargar las voces
                //leerTexto("Buenos días");
            };
        } else {
            // Si 'onvoiceschanged' no es compatible, llamamos a leerTexto() después de cargar las voces de todos modos
            //leerTexto("Buenos días");
        }
    });

    // Función para leer el texto
    function leerTexto(texto) {
        let mensaje = new SpeechSynthesisUtterance();
        mensaje.voice = vocesDisponibles['237']; // Puedes ajustar el índice o valor según tus necesidades
        mensaje.volume = 1;
        mensaje.rate = 1;
        mensaje.text = texto;
        mensaje.pitch = 1;
        speechSynthesis.speak(mensaje);
    }
</script>

<script type="text/javascript">
    function getNombre() {
        // console.log("getNombre");
        let data = {
            key: "NombreDoctor",
            doctorId: doctorId
        };
        var doctorName = '';
        $.ajax({
            url: 'SE_AjaxCitas.php',
            type: 'POST',
            data: data,
            async: false,
            success: function (data) {
                doctorName = data;
            }
        });
        return doctorName;
    }

    function reloadCitas() {
        // citas en espera
        // console.log("reloadCitas");
        var idCitas = 0;
        // console.log(citas);

        let data = {
            key: "VerificarActualizacion",
            idCitas: idCitas
        };
        $.ajax({
            url: "SE_AjaxCitas.php",
            type: "POST",
            data: data,
            success: function (data) {
                // Parse the JSON data returned from the server
                // console.log(data);
                var citas = JSON.parse(data);

                // Generate the HTML content for the new citas data
                var citasHtml = '';
                for (var i = 0; i < citas.length; i++) {
                    var cita = citas[i];

                    citasHtml += `
                    <tr>
                        <td>
                            <h2><strong>` + cita.nombre + `</strong></h2>
                        </td>
                        <td>
                            <h2><strong>` + cita.Consultorio + `</strong></h2>
                        </td>
                    </tr>`;
                }
                // Update the HTML content with the new citas data
                document.getElementById('SalaEspera').innerHTML = citasHtml;
                // location.reload(); // Recargar la página después de actualizar la cita
                // Luego de actualizar el contenido, realiza el desplazamiento y espera a que termine
                // reloadCitas();


            },

        });
    };



    function reloadConsultorio() {
        // cita atendida en el momento
        console.log("reloadConsultorio");
        var idCitas = 0;
        // console.log(citas);

        let data = {
            key: "ConsultarCitasConsultorio",
            idCitas: idCitas
        };
        $.ajax({
            url: "SE_AjaxCitas.php",
            type: "POST",
            data: data,
            success: function (data) {
                // Parse the JSON data returned from the server
                // console.log(data);
                var citas = JSON.parse(data);

                // Generate the HTML content for the new citas data
                var citasHtml = '';
                for (var i = 0; i < citas.length; i++) {
                    var cita = citas[i];

                    citasHtml += `
                    <tr class="" style="`+ (i % 2 == 0 ? 'background-color: rgba(40, 167, 69, 1); ' : 'background-color: rgba(40, 167, 69, 0.5); ') + `" >
                        <td>
                            <h1><strong>` + cita.nombre + `</strong></h1>
                        </td>
                        <td>
                            <h1><strong>` + cita.Consultorio + `</strong></h1>
                        </td>
                    </tr>
                    `;
                }

                // Update the HTML content with the new citas data
                document.getElementById('Consultorio').innerHTML = citasHtml;
                // location.reload(); // Recargar la página después de actualizar la cita

                // Luego de actualizar el contenido, realiza el desplazamiento y espera a que termine



            },

        });
    };



    var sound = null;

    function reloadAlerta() {
        var idCitas = 0;
        var toasts = [];
        // Define tus parámetros de Ajax aquí
        var data = {
            key: "AlertaCita",
            idCitas: idCitas
        };

        $.ajax({
            url: "SE_AjaxCitas.php",
            type: "POST",
            data: data,
            success: function (data) {
                var bandera = 0;

                var citas = JSON.parse(data);

                for (var j = 0; j < citas.length; j++) {
                    var citaSeleccionada = citas[j];
                    if (citaSeleccionada.estado == 8 && citaSeleccionada.estadoEspera == 1 && citaSeleccionada
                        .alerta == 1) {
                        // Crear la alerta de cita disponible

                        var nombre = citaSeleccionada.nombre;
                        var consultorio = citaSeleccionada.Consultorio;

                        var MensajeLlamada = '' + nombre + 'dirigirse al Consultorio ' + consultorio +
                            ' para la atenciòn';


                        toast({
                            title: "Atencion",
                            message: 'Nombre: ' + nombre + ' Consultorio: ' + consultorio,
                            type: "success",
                            duration: 18000
                        });


                        bandera = 1;


                        $.ajax({
                            url: 'SE_AjaxCitas.php', // Ruta a tu script de actualización en el servidor
                            method: 'POST',
                            data: {
                                key: "UpdateAlerta",
                                cita_id: citaSeleccionada.idCitas,
                                nuevo_estado_alerta: 0
                            },
                            success: function (data) {
                                // Actualización exitosa, eliminar la alerta del DOM
                                //$(alerta).remove();
                            },
                            error: function (xhr, status, error) {
                                // Manejo de errores
                                console.log(error);
                            }
                        });


                        leerTexto(MensajeLlamada);

                    }
                }
                if (bandera == 1) {

                    // Detener el sonido existente si hay uno

                    /*
                    if (sound) {
                        sound.unload();
                    }

                             sound = new Howl({
                                src: ["https://medicalsoftplus.com/baseDev/audios/sos-morse-code_daniel-simion.wav"],
                                loop: true // Reproducir en bucle
                            });
                            sound.play();
                            setTimeout(function () {
                                sound.unload();
                            }, 18000); 
                    */



                }

            },
            error: function (xhr, status, error) {
                // Manejo de errores
                console.log(error);
            }
        });
    }


    // Toast function
    function toast({
        title = "",
        message = "",
        type = "info",
        duration = 3000
    }) {
        const main = document.getElementById("toast");
        if (main) {
            const toast = document.createElement("div");

            // Auto remove toast
            const autoRemoveId = setTimeout(function () {
                main.removeChild(toast);
            }, duration + 1000);

            // Remove toast when clicked
            toast.onclick = function (e) {
                if (e.target.closest(".toast__close")) {
                    main.removeChild(toast);
                    clearTimeout(autoRemoveId);
                }
            };

            const icons = {
                success: "fas fa-check-circle",
                info: "fas fa-info-circle",
                warning: "fas fa-exclamation-circle",
                error: "fas fa-exclamation-circle"
            };
            const icon = icons[type];
            const delay = (duration / 1000).toFixed(2);

            toast.classList.add("toast", `toast--${type}`);
            toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;

            toast.innerHTML = `
                    <div class="toast__icon">
                        <i class="${icon}"></i>
                    </div>
                    <div class="toast__body">
                        <h3 class="toast__title" style="width:100%;text-align:center;font-size:32px;">${title}</h3>
                        <p class="toast__msg" style="font-size:30px;">${message}</p>
                    </div>
                    <div class="toast__close">
                        <!--<i class="fas fa-times"></i>-->
                    </div>
                `;
            main.appendChild(toast);
        }
    }
</script>
<script>
    $(document).ready(function () {
        // Call the reloadCitas function on page load
        setInterval(reloadConsultorio, 10000);
        setInterval(reloadCitas, 10000);
        //setInterval(reloadCitas, 1000);
        setInterval(reloadAlerta, 10000);

        reloadConsultorio();
        reloadCitas();
    });
</script>
<script src="plugins/Howler/howler.min.js"></script>