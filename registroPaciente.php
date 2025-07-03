<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'config.php';
// para el tema de los acentos con mysql
header("Content-Type: text/html;charset=utf-8");
// para el tema de los acentos con mysql
$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
function Encriptar($valor)
{
    $Sc = base64_decode("keyMaster");
    $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
    return $Texto;
}

$cod = preparePost($_GET['cod']);
$querySelect = mysqli_query($conn3, "SELECT * FROM cliente where cod_validacion = '{$cod}'");
$nrowl2 = mysqli_num_rows($querySelect);
if ($nrowl2 == 1) {
    $querySelect = $querySelect->fetch_array();
}

// DATOS PARA AUDITOR
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
auditorMaster($ususario_id, '2', $enlace_actual, '-');
// DATOS PARA AUDITOR

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?php echo $sistema ?> </title>
    <link rel="shortcut icon" type="image/x-icon" href="./icono.ico">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="plugins/iCheck/all.css">
    <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <style type="text/css">
        .alerta {
            margin: 0;
            padding: 0;
            position: absolute;
            font-weight: bold;
            display: flex;
            justify-content: center;
            align-items: center;
            top: 0;
            right: 0;
            opacity: 0;
        }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <section class="content">
        <div class="box box-info" align="center" style="box-shadow:none;">
            <div class="card-body">
                <?php if (isset($_GET['cod']) and !empty($_GET['cod']) and $nrowl2 == 1) : ?>
                    <h3 class="card-title"> Apertura de historia (Registro de paciente) </h3>
                    <div align="right"> Fecha <?php echo date("m-d-Y") ?> Hora:<?php echo date("h:m:s") ?> </div>
                    <br>
                    <form action="guardarRegistroPaciente.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <div align="left"> Tipo </div>
                                <select id="tipo_cliente" name="tipo_cliente" class="form-control input-lg select" style="width: 100%;" required>
                                    <option value=""> Seleccione</option>
                                    <option value="RC" <?= ($querySelect['tipo_cliente'] == "RC" ? 'selected' : '') ?>> RC - Registro Civil</option>
                                    <option value="TI" <?= ($querySelect['tipo_cliente'] == "TI" ? 'selected' : '') ?>> TI - Tarjeta de identidad</option>
                                    <option value="CC" <?= ($querySelect['tipo_cliente'] == "CC" ? 'selected' : '') ?>> CC - Cédula de ciudadanía</option>
                                    <option value="CE" <?= ($querySelect['tipo_cliente'] == "CE" ? 'selected' : '') ?>> CE - Cédula de extranjería</option>
                                    <option value="PA" <?= ($querySelect['tipo_cliente'] == "PA" ? 'selected' : '') ?>> PA - Pasaporte</option>
                                    <option value="MS" <?= ($querySelect['tipo_cliente'] == "MS" ? 'selected' : '') ?>> MS - Menor sin identificación</option>
                                    <option value="AS" <?= ($querySelect['tipo_cliente'] == "AS" ? 'selected' : '') ?>> AS - Adulto sin identidad</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <div align="left" style="position:relative;"> Número de Cédula/ID <span class="alerta"> Validar Documento </span></div>
                                <input type="text" class="form-control input-lg" name="CODI_CLIENTE" value="<?= $querySelect['CODI_CLIENTE'] ?>" id="CODI_CLIENTE" placeholder="Cedula" onblur="vercedula();" required>
                                <div id="div-results-cedula"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <div align="left"> Fecha de nacimiento </div>
                                <input type="date" class="form-control input-lg" id="fechaNacimiento" name="fechaNacimiento" value="<?= $querySelect['fechaNacimiento'] ?>" placeholder="Edad" onchange="verEdad();" required>
                            </div>
                            <div class="form-group col-md-2">
                                <div align="left"> Edad <div id="div-edad"></div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div align="left">Nombre</div>
                                <input type="text" class="form-control input-lg" id="primer_nombre" name="primer_nombre" value="<?= $querySelect['primer_nombre'] ?>" placeholder="Nombre" required>
                            </div>
                            <div class="form-group col-md-6">
                                <div align="left">Apellido</div>
                                <input type="text" class="form-control input-lg" id="primer_apellido" name="primer_apellido" value="<?= $querySelect['primer_apellido'] ?>" placeholder="Apellido" required>
                            </div>
                            <div class="form-group col-md-4">
                                <div align="left"> Género </div>
                                <select id="genero" name="genero" class="form-control input-lg select" style="width: 100%;" required>
                                    <option value="" selected> Seleccione </option>
                                    <option value="M" <?= ($querySelect['genero'] == "M" ? 'selected' : '') ?>>Masculino</option>
                                    <option value="F" <?= ($querySelect['genero'] == "F" ? 'selected' : '') ?>>Femenino</option>
                                    <option value="I" <?= ($querySelect['genero'] == "I" ? 'selected' : '') ?>>Indeterminado</option>
                                    <option value="O" <?= ($querySelect['genero'] == "O" ? 'selected' : '') ?>>Otro</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <div align="left"> Sexo Asignado al Nacer </div>
                                <select id="genero_asignado" name="genero_asignado" class="form-control input-lg select" style="width: 100%;" required>
                                    <option value="" selected> Seleccione </option>
                                    <option value="M" <?= ($querySelect['genero_asignado'] == "M" ? 'selected' : '') ?>>Masculino</option>
                                    <option value="F" <?= ($querySelect['genero_asignado'] == "F" ? 'selected' : '') ?>>Femenino</option>
                                    <option value="I" <?= ($querySelect['genero_asignado'] == "I" ? 'selected' : '') ?>>Indeterminado</option>
                                    <option value="O" <?= ($querySelect['genero_asignado'] == "O" ? 'selected' : '') ?>>Otro</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <div align="left"> Email </div>
                                <input type="email" class="form-control input-lg" id="correo_cliente" name="correo_cliente" value="<?= $querySelect['correo_cliente'] ?>" placeholder="Correo">
                            </div>
                            <div class="form-group col-md-6">
                                <div align="left"> Dirección de Residencia</div>
                                <input type="text" class="form-control input-lg" id="direccion_cliente" name="direccion_cliente" value="<?= $querySelect['direccion_cliente'] ?>" placeholder="Direccion">
                            </div>
                            <div class="form-group col-md-6">
                                <div align="left"> Ocupación </div>
                                <input type="text" class="form-control input-lg" id="ocupacion" name="ocupacion" value="<?= $querySelect['ocupacion'] ?>" placeholder="ocupacion">
                            </div>
                            <div class="form-group col-md-6" style="margin-bottom: auto;">
                                <div align="left">
                                    <font color="green"> <strong>Indicativo</strong> </font>
                                </div>
                                <select id="indicativo" name="indicativo" class="form-control select2" style="width: 100%;" required>
                                    <?php
                                    //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
                                    echo selectMaster("", "numero", "numero,nombre", "indicativos");
                                    ?>
                                </select>
                            </div>
                            <div align="left" class="form-group col-md-6" style="margin-bottom: auto;">
                                <div align="left">
                                    <font color="green"> <strong>Número de Celular notificaciones Whatsapp</strong></font>
                                </div>
                                <input type="number" class="form-control input-lg" id="Whatsapp" name="whatsapp" value="<?= preg_replace("/^" . $querySelect['indicativo'] . "/", '', $querySelect['whatsapp']) ?>" placeholder="">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="hidden" name="cod" value="<?= $cod ?>">
                                <br>
                                <center><button type="submit" class="btn btn-block btn-primary btn-sm">Guardar</button></center>
                            </div>
                        </div>
                    </form>
                <?php elseif (isset($_GET['status']) and !empty($_GET['status']) and $_GET['status'] == 'ok') : ?>
                    <div class="col-md-12">
                        <h3 class="text-bold">! REGISTRO EXITOSO ¡ GRACIAS POR SU TIEMPO.</h3>
                    </div>
                <?php elseif (isset($_GET['status']) and !empty($_GET['status']) and $_GET['status'] == 'error') : ?>
                    <div class="col-md-12">
                        <h3 class="text-bold">ERROR AL REALIZAR LA ACTUALIZACION DE LOS REGISTROS, POR FAVOR INTENTELO DE NUEVO.</h3>
                    </div>
                <?php else : ?>
                    <div class="col-md-12">
                        <h3 class="text-bold">EL LINK HA CADUCADO, PARA REALIZAR UNA ACTUALIZACION DE SUS DATOS CONTACTAR AL AREA PERTINENTE. GRACIAS, BUEN DIA.</h3>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/select2/select2.full.min.js"></script>
    <script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
</body>

</html>
<?php
// include 'footer.php'; 
?>
<script type="text/javascript">
    function vercedula() {
        var CODI_CLIENTE = $("#CODI_CLIENTE").val();
        $.ajax({
            type: "POST",
            url: "validadorDoc.php",
            data: {
                CODI_CLIENTE: CODI_CLIENTE,
                cliente_id: '<?= Encriptar($querySelect['cliente_id']) ?>'
            },
            success: function(response) {
                console.log(response);
                if (response.status == 1 || response.status == 2) {
                    $("#CODI_CLIENTE").val("");
                    $('.alerta').css({
                        'opacity': '1'
                    });
                    setTimeout(function() {
                        $('.alerta').css({
                            'opacity': '0'
                        });
                    }, 3000);
                }
            }
        });
    };

    function verEdad() {
        // estas son las variables que enviamos
        var fechaNacimiento = $("#fechaNacimiento").val();
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "ajax_edad.php",
            data: {
                fechaNacimiento: fechaNacimiento
            },
            success: function(response) {
                $('#div-edad').html(response);
            }
        });
    };
    window.addEventListener('load', function() {
        $(".select2").select2();
        $("#indicativo").val(<?= $querySelect['indicativo'] ?>).trigger('change');
        <?php if (!empty($querySelect['fechaNacimiento'])) : ?>
            verEdad();
        <?php endif; ?>
    });
</script>