<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'config.php';
// para el tema de los acentos con mysql
header("Content-Type: text/html;charset=utf-8");
// para el tema de los acentos con mysql
$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

$idcliente = $_GET['Ci'];

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

         body {
        background: radial-gradient(ellipse at center, rgba(255, 255, 255, 15%) 0%, rgba(255, 255, 255, 15%) 35%, #ffffff 100%);
    }

    .ocean {
        z-index: -1;
        height: 0%;
        width: 100%;
        /*position: absolute;*/
        position: fixed;
        bottom: 0;
        left: 0;
        background: #ffffff;
    }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <section class="content">
        <div class="box box-info" align="center" style="box-shadow:none;">
            <div class="card-body">
                    <h3 class="card-title"> Apertura de historia (Registro de paciente) </h3>
                    <div align="right"> Fecha <?php echo date("m-d-Y") ?> Hora:<?php echo date("h:m:s") ?> </div>
                    <br>
                    <form action="guardarRegistroPacienteReferido.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
                        <div class="form-row">
                             <div class="form-group col-md-3">
                             <div align="left"> Tipo </div>
                            <select id="tipo" name="tipo" class="form-control input-lg select" style="width: 100%;" required>
                            <option value=""> Seleccione</option>
                            <option value="CC"> CC - Cédula de ciudadanía</option>
                            <option value="CE"> CE - Cédula de extranjería</option>
                            <option value="TI"> TI - Tarjeta de identidad</option>
                            <option value="RC"> RC - Registro Civil</option>
                            <option value="CD"> CD - Cédula Digital</option>
                            <option value="CN"> CN - Comprobante del tramite del documento</option>
                            <option value="NU"> NU - Número Único de identificación</option>
                            <option value="NI"> NI - Carnet de identidad - Documento nacional de identidad </option>
                            <option value="PE"> PE - Permiso especial de permanencia</option>
                            <option value="PA"> PA - Pasaporte</option>
                            <option value="SC"> SC - Salvoconducto</option>
                            <option value="AS"> AS - Adulto sin identidad</option>
                            <option value="MS"> MS - Menor sin identificación</option>
                            <option value="PT"> PT - Permiso por Protección Temporal </option>
                            </select>
                        </div>

                             <div class="form-group col-md-3">
                            <div align="left"> Número de Cédula/ID</div>
                            <input type="text" class="form-control input-lg" name="CODI_CLIENTE" id="CODI_CLIENTE" placeholder="Cédula" required onblur="vercedula();">
                            <div id="div-results-cedula"></div>
                            </div>

                           
                            <div class="form-group col-md-4">
                                <div align="left"> Fecha de nacimiento </div>
                                <input type="date" class="form-control input-lg" id="fechaNacimiento" name="fechaNacimiento" placeholder="Edad" onchange="verEdad();" required>
                            </div>
                            <div class="form-group col-md-2">
                                <div align="left"> Edad <div id="div-edad"></div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div align="left"> Primer Nombre</div>
                                <input type="text" class="form-control input-lg" id="primer_nombre" name="primer_nombre" value="<?= $querySelect['primer_nombre'] ?>" placeholder="Primer Nombre" required>
                            </div>

                             <div class="form-group col-md-6">
                                <div align="left">Segundo Nombre</div>
                                <input type="text" class="form-control input-lg" id="segundo_nombre" name="segundo_nombre" value="<?= $querySelect['primer_nombre'] ?>" placeholder="Segundo Nombre">
                            </div>

                            <div class="form-group col-md-6">
                                <div align="left">Primer Apellido</div>
                                <input type="text" class="form-control input-lg" id="primer_apellido" name="primer_apellido" value="<?= $querySelect['primer_apellido'] ?>" placeholder="Primer Apellido" required>
                            </div>

                            <div class="form-group col-md-6">
                                <div align="left">Segundo Apellido</div>
                                <input type="text" class="form-control input-lg" id="segundo_apellido" name="segundo_apellido" value="<?= $querySelect['primer_apellido'] ?>" placeholder="Segundo Apellido">
                            </div>

                            <div class="form-group col-md-4">
                            <div align="left"> Género </div>
                            <select id="genero" name="genero" class="form-control input-lg select" style="width: 100%;" required onchange="VisualizarGenero(this.value)">
                            <option value="" selected> Seleccione </option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                            <option value="I">Indeterminado</option>
                            <option value="O">Otro</option>
                            </select>
                            </div>
                            
                            <div class="form-group col-md-8">
                                <div align="left"> Email </div>
                                <input type="email" class="form-control input-lg" id="correo_cliente" name="correo_cliente"  placeholder="Correo">
                            </div>
                            <div class="form-group col-md-6">
                                <div align="left"> Dirección de Residencia</div>
                                <input type="text" class="form-control input-lg" id="direccion_cliente" name="direccion_cliente"  placeholder="Direccion">
                            </div>
                            <div class="form-group col-md-6">
                                <div align="left"> Ocupación </div>
                                <input type="text" class="form-control input-lg" id="ocupacion" name="ocupacion"  placeholder="ocupacion">
                            </div>
                           
                           <div class="form-group col-md-4" style="margin-bottom: auto;">
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
                        </div>

                        <div class="form-group col-md-8" style="margin-bottom: auto;">
                        <div align="left">
                        <font color="green"> <strong>Número de Celular notificaciones WhatsApp</strong></font>
                        </div>
                        <input type="number" class="form-control input-lg" id="Whatsapp" name="whatsapp" placeholder="">
                        </div>
                            <div class="form-group col-md-12">
                                <input type="hidden" name="idcliente" value="<?= $idcliente?>">
                                <br>
                            <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                            <h2> <strong> G u a r d a r </strong> </h2>
                            </div>
                        </div>
                    </form>
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
  function VerificarDocumento(valor) {
        var CODI_CLIENTE = valor.value;
        var cliente_id = $("#cliente_id").val(); // trae el clienteId

        $.ajax({
            type: "POST",
            url: "Ajax_VerificarDocumento.php",
            data: {
                CODI_CLIENTE: CODI_CLIENTE,
                cliente_id: cliente_id
            },
            success: function(response) {

                var arreglo = JSON.parse(response);
                $("#div-results-cedula").html(arreglo.Mensaje);
                if (arreglo.Estado != "True") {
                    $(valor).val("");
                }
            }
        });
    };
    /* jquery onchange input[id="CODI_CLIENTE"] */
    $("#CODI_CLIENTE").on('change', function() {
        VerificarDocumento(this);
    });


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
</script>