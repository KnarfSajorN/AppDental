<?php

include '../header.php';
include '../menu.php';

$historiaClinica1 = base64_decode($_GET['FAID']);

$queryList = mysqli_query($conn3, "SELECT * FROM  Historia_ClinicaBo where id = $historiaClinica1");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

        $cliente_id = $rowMotorizado['cliente_id'];
        $usuario_id = $rowMotorizado['usuario_id'];
    }
}

if (isset($_POST['Enviar_Firma'])) {
    $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_ClinicaBo where ID = $historiaClinica1");
    // $nrowl = mysqli_num_rows($queryList);
    if ($queryList) {
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

            $cliente_id = $rowMotorizado['cliente_id'];
            $usuario_id = $rowMotorizado['usuario_id'];
            // $receta     = $rowMotorizado['receta'];
        }
    }

    $whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
    $nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
    $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le ha sugerido firmar esta historia clinica, para proceder abrir el siguiente link ' . $Base . 'firma/firmardocumento/' . $historiaClinica1 . '/Historia_ClinicaBo/' . $cliente_id;
    $accion = 0;

    whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);
}

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">

    <section class="content box p-4">

        <br>
        <br>
        <div align="center">

            <a class="btn btn-outline-info btn-lg rounded-pill shadow"
                href="<?php echo $Base; ?>cPacientes?iCr=<?= encrypt($idHistoria); ?>">
                <i class="fa fa-heartbeat"></i> Nueva Consulta
            </a>

            <a class="btn btn-outline-info btn-lg rounded-pill shadow"
                href="<?php echo $Base; ?>agregarCitas?cI=<?= encrypt($cliente_id); ?>">
                <i class="fa fa-calendar-check-o"></i> Agregar Cita
            </a>

            <a class="btn btn-outline-info btn-lg rounded-pill shadow"
                href="<?php echo $Base; ?>SclienteAdministracion_facturas">
                <i class="fa fa-plus"></i> Facturas
            </a>


        </div>

        <hr>


        <?php
        $botonesImprimir = [
            ['Consulta', base64_encode($Base . 'PT_ImprimirHistoria?idhb=' . $historiaClinica1)],
        ];
        $_GET['botones'] = base64_encode(json_encode($botonesImprimir));
        include '../creadorImpresiones/seleccionarMetodoImpresion.php';
        ?>


        <br>


        <div align="center" id="HistoriaPrincipal">
            <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
                href="<?php echo $Base; ?>ConfigEnviarConsulta?iC=<?= encrypt($historiaClinica1) ?>&iCr=<?= encrypt($idHistoria) ?>">
                <i class="fa fa-send-o"></i> Enviar Consulta
            </a>

        </div>

        <?php if ($idHistoria == "34"):
            $HistoriaFiltro = "34";
            include '../configFinalizado_Opciones.php';
            echo "<style>#HistoriaPrincipal{display:none;}</style>";
        endif; ?>

        <div align="center">
            <hr>
        </div>



        <div align="center">




            <?php

            $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas WHERE historia_nombre='Historia_ClinicaBo' AND historia_id = $historiaClinica1");
            // $nrowl = mysqli_num_rows($queryList);
            if ($queryList) {
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $firma = $rowMotorizado['firma'];
                }
            }


            if (strlen($firma) > 10) {
                echo "<img src='$firma'>";
            } else {

                $ruta = htmlentities($_SERVER['REQUEST_URI']);

            ?>
                <form action="<?php echo ($ruta) ?>" method="POST" name="formularioEnvioExamen">
                    <button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow" name="Enviar_Firma"><i
                            class="fa fa-pencil-square-o"></i>Solicitar
                        Firma</button>
                </form>

            <?php
            }
            ?>
        </div>
    </section>
    <!-- /.content -->
</div>

<?php include("../footer.php") ?>


<script type="text/javascript">
    function solicitarFirma1() {
        // estas son las variables que enviamos
        var fecha = $("#id").val();
        // aqui enviamos el mensaje por medio de un arreglo
        $.ajax({
            type: "POST",
            url: "ajax_solicitarFirma.php",
            data: {
                id: id
            },
            success: function(response) {
                $('#div-results').html(response);
            }
        });
    };
</script>