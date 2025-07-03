<?php
include 'header.php';
include 'menu.php';

$clienteId = $_GET['clienteId'];
$usuarioId = 1;



$queryList = mysqli_query($conn3, "SELECT * FROM  DC_Informes where cliente_id = $clienteId");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $cliente_id      = $rowMotorizado['cliente_id'];
    $usuario_id      = $rowMotorizado['usuario_id'];
    $Fecha_Registro     = $rowMotorizado['Fecha_Registro'];
    $Carpeta     = $rowMotorizado['Carpeta'];
    $Numero     = $rowMotorizado['Numero'];
    $Informe     = $rowMotorizado['Informe'];
}

$whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
$nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');



?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Paciente

        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Historial </a></li>
        </ol>
    </section>

    <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="card-body">
                <div class="box">
                    <?php echo datosPacientes($clienteId); ?>
                </div>
            </div>
        </div>
    </section>

    <br>

    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historia</a></li>
                        <!-- ************************************************************** -->
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <!-- inicio seccion 1 -->
                        <div role="tabpanel" class="tab-pane fade in active" id="Section1">

                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                    <?php

                                    $queryList = mysqli_query($conn3, "SELECT * FROM  DC_Informes where cliente_id = $clienteId AND usuario_id='$usuarioId'");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id = $rowMotorizado['id'];
                                        $cliente_id = $rowMotorizado['cliente_id'];
                                        $Fecha_Registro = $rowMotorizado['Fecha_Registro'];
                                        $Carpeta = $rowMotorizado['Carpeta'];
                                        $Fecha_Registro = $rowMotorizado['Fecha_Registro'];
                                        $Numero = $rowMotorizado['Numero'];
                                        $Informe = $rowMotorizado['Informe'];

                                    ?>
                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?php echo $id ?>" aria-expanded="false" aria-controls="Historia<?php echo $id ?>">
                                                        Informe <?php echo $id . ' / <b style="color: #444444;">' . $fecha . '</b>'; ?>
                                                        <button onclick="window.open('Finalizado_Historia_Clinica.php?historiaClinica1=<?php echo $id; ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Historia<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                                <div class="panel-body">

                                                    <!-- Edwin =)  -->
                                                    <?php if ($InformacionAcudiente) : ?>
                                                        <p><b>Informacion del Acudiente</b></p>
                                                        <?= $InformacionAcudiente ?><br>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <!--final accordion-->   




                        </div>
                        <!-- cierre seccion 1-->








                        <!-- ************************************************************************************************************************-->
                        <!-- ************************************************************************************************************************-->
                        <!-- *************************************************  UPDATE 01062023 LORDON********************************************************-->
                        <!-- ************************************************************************************************************************-->
                        <!-- ************************************************************************************************************************-->












                    </div>
                </div>
            </div>
        </div>
    </div>

















</div>
</section>
</div>


<?php
include 'footer.php';

?>
<!-- Funciona para consultar disponibilidad -->

<script type="text/javascript">
    function verDia() {
        // estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();
        var doctor = $("#doctor").val();
        var idCitas = $("#idCitas").val();
        var Sucursales = $("#Sucursales").val();
        var sucursal = $("#sucursal").val();

        // aqui enviamos el mensaje por medio de un arreglo     
        console.log(Sucursales);
        console.log(sucursal);
        $.ajax({
            type: "POST",
            url: "disponibilidad.php",
            data: {
                fecha: fecha,
                Hora: Hora,
                usuario_id: usuario_id,
                doctor: doctor,
                Sucursales: Sucursales,
                sucursal: sucursal,
                idCitas: idCitas
            },
            success: function(response) {
                $('#div-results').html(response);

            }
        });
    };

    function verHora() {
        // estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();
        var doctor = $("#doctor").val();
        var idCitas = $("#idCitas").val();
        var Sucursales = $("#Sucursales").val();
        var sucursal = $("#sucursal").val();
        console.log(Sucursales);
        console.log(sucursal);
        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "disponibilidadHora.php",
            data: {
                fecha: fecha,
                Hora: Hora,
                usuario_id: usuario_id,
                doctor: doctor,
                Sucursales: Sucursales,
                sucursal: sucursal,
                idCitas: idCitas
            },
            success: function(response) {
                $('#div-resultsHora').html(response);

            }
        });
    };



    function cargarFecha() {
        var x = document.getElementById('div-fecha');
        x.style.display = 'none';

        if (x.style.display === 'none') {
            x.style.display = 'block';
        }
    }
</script>

<script type="text/javascript">
    $(function() {
        $('select[name="indicativo"]').on('change', function(e) {
            $('input[name="monto"]').val($(this).find(":selected").text());
        })
    })

    // seleccione el indicativo correspondiente
    <?php $indicativo = funcionMaster($_SESSION['ID'], 'ID', 'Indicativo', 'usuarios');
    if ($_GET['clienteId'] <> "") {
        $indicativo = funcionMaster($clienteId, 'cliente_id', 'indicativo', 'cliente');
    } else {
        $indicativo = funcionMaster($_SESSION['ID'], 'ID', 'Indicativo', 'usuarios');
    }
    ?>
    $(window).on("load", function() {
        $("#indicativo > option[value='<?php echo $indicativo ?>']").attr("selected", true);
        $('#indicativo').select2();
    });
</script>


<script>
    $(document).ready(function() {

        $('#duracion').select2({
            tags: true,
            createTag: function(params) {
                // Don't offset to create a tag if there is no @ symbol
                if (params.term.search('^[0-9]+$') == 0) {
                    // Return null to disable tag creation
                    return {
                        id: params.term,
                        text: params.term
                    }
                } else {
                    return null;
                }
                //console.log(params.term.search('/[0-9]/'));


            }
        });

    });

    const tiempoMotivoConsulta = (id, mascara) => {
        let data = {
            key: "info_motivoConsulta",
            mascara: mascara,
            id: id
        };
        $.ajax({
            url: "./ajax_calendar.php",
            data: data,
            type: "POST",
            dataType: "json",
            success: function(response) {
                console.log(response);
                if (response.status) {
                    for (const key in object = response.data[0]) {
                        if (Object.hasOwnProperty.call(object, key)) {
                            if (key == mascara) {
                                $(`#${key}`).val([object[key]]).trigger("change.select2");
                                if ($(`#${key}`).val() != object[key]) {
                                    $(`#${key}`).append(`<option>${object[key]}</option>`).val([object[key]]).trigger("change.select2");
                                }
                            }
                        }
                    }
                }
            }
        });
    };

    <?php if ($motivoConsulta != '') { ?>
        // NO ES NECESARIO YA QUE AL EDITAR AUTOMATICAMENTE SE ANEXA EL TIEMPO DE LA CITA
        // tiempoMotivoConsulta('<?php echo $motivoConsulta ?>', 'motivoConsulta');
    <?php } ?>

    $(document).ready(function() {
        var table = $('#example1').DataTable();
        table.on('draw.dt', function() {
            $('.select2').select2(); // Ejecutar Select2 en cada elemento con la clase "select2"
        });
    });

    const presenciaDinamico = (id, estado) => {
        let data = {
            key: "updateEstadoPresencialCita",
            idCitas: id,
            estadoPresencia: estado
        };
        $.ajax({
            url: "./ajax_calendar.php",
            data: data,
            type: "POST",
            dataType: "json",
            success: function(response) {
                if (response.status) {
                    let botonesPresencial = JSON.parse(`<?= json_encode($botonesPresencial) ?>`);
                    if (response.status) {
                        $(`#btn2${id}`).attr('title', botonesPresencial[estado]).html(botonesPresencial[estado]);
                    }
                }
            }
        });
    };
</script>