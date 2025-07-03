<?php

include 'header.php';
include 'menu.php';

$id = $_GET['id'];

$QueryHistoria = mysqli_query($conn3, "SELECT * FROM  RIAS_HistoriaVejez where id = $id");
while ($RowHistoria = mysqli_fetch_array($QueryHistoria)) {

  $cliente_id = $RowHistoria['cliente_id'];

}

$TipoHistoria = "RIAS_HistoriaVejez";
$TipoHistoriaEncryptado = encrypt($TipoHistoria);



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

            <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>RIAS_Pacientes.php">
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
                href="<?php echo $Base; ?>RIAS_Impresion_Vejez.php?id=<?php echo ($id); ?>">
                <i class="fa fa-print"></i> Imprimir Consulta
            </a>

            <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
              href="<?php echo $Base; ?>RM_ImprimirReceta.php?HC=<?php echo encrypt($id); ?>&NC=<?php echo $TipoHistoriaEncryptado; ?>">
              <i class="fa fa-print"></i> Imprimir Receta medica
            </a>

            <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
              href="<?php echo $Base; ?>RIAS_ExamenesOrdenMedica.php?id=<?php echo ($id); ?>&hc=<?php echo $TipoHistoriaEncryptado; ?>">
              <i class="fa fa-print"></i> Imprimir Examenes / Orden Medica
            </a>


            </div>




        </div>
    </div>
  </section>


</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>

<?php include("footer.php") ?>

