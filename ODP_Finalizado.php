<?php

include 'header.php';
include 'menu.php';

$id = $_GET['id'];

$QueryHistoria = mysqli_query($conn3, "SELECT * FROM  Historia_Odontopediatria where id = $id");
while ($RowHistoria = mysqli_fetch_array($QueryHistoria)) {

  $cliente_id = $RowHistoria['cliente_id'];
  $whatsapp = $RowHistoria['whatsapp'];
  $nombre_cliente = $RowHistoria['nombre_cliente'];

}

$whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
$nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');

if (isset($_POST['Enviar_Firma'])) {

  $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le ha sugerido firmar esta historia clinica, para proceder abrir el siguiente link ' . $Base . 'firma/firmardocumento/' . $id . '/Historia_Odontopediatria/' . $cliente_id;
  $accion = 0;

  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

  echo "<script language='Javascript'> window.location='ODP_Finalizado?id=" . ($id) . "&msg=Mensaje Enviado';</script>";
}

if (isset($_GET['tipo'])) {
    $tipo = $_GET['tipo'];
    $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le envia el siguiente documento registrado en la cita ' . $Base . 'ODP_ImpresionHistoria?id=' . $id . '';
    $accion = 0;
    Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);
  
    echo "<script language='Javascript'> window.location='ODP_Finalizado?id=" . $id . "';</script>";
}

if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">

  <br><br>
  <section class="content">
    <div class="box">
        <div class="box-body">
            <br>
            <br>
            <div align="center">

            <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>ODP_Pacientes.php">
                <i class="fa fa-heartbeat"></i> Nueva Consulta
            </a>

            <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>agregarCitas.php?clienteId=<?= ($cliente_id); ?>">
                <i class="fa fa-calendar-check-o"></i> Agregar Cita
            </a>

            <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>SclienteAdministracion_facturas">
                <i class="fa fa-plus"></i> Facturas
            </a>


            </div>

            <hr>

            <div align="center">

            <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
                href="<?php echo $Base; ?>ODP_ImpresionHistoria?id=<?php echo ($id); ?>">
                <i class="fa fa-print"></i> Imprimir Consulta
            </a>

            </div>

            <hr>
            
            <div align="center">
                <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>ODP_Finalizado.php?id=<?php echo ($id) ?>&tipo=consulta">
                    <i class="fa fa-paper-plane"></i> Enviar Impresión
                </a>
            </div>


            <hr>

            <div align="center">
                <?php

                    $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $id and historia_nombre = 'Historia_Odontopediatria'");
                    $nrowl = mysqli_num_rows($queryList);
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                        $firma = $rowMotorizado['firma'];
                    }

                    if (strlen($firma) > 10) {
                        echo "Firmado <br><img src='$firma'>";
                    } else {
                        ?>
                        <form action="ODP_Finalizado.php?id=<?php echo ($id) ?>" method="POST" name="EnvioMensaje">
                        <button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow" name="Enviar_Firma"><i class="fa fa-pencil-square-o"></i>Solicitar Firma</button>
                        </form>
                        <?php
                    }
                ?>
            </div>



        </div>
    </div>
  </section>


</div>
<!-- /.box-body -->

<?php include("footer.php") ?>

