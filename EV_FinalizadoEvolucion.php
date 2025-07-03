<?php
include 'header.php';
include 'menu.php';

$evolucion_id = decrypt($_GET['id']);

$query = "SELECT * FROM  Evoluciones_Generales where id = $evolucion_id";
$queryList = mysqli_query($conn3, $query);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $cliente_id      = $rowMotorizado['cliente_id'];
  $usuario_id      = $rowMotorizado['usuario_id'];
  //$id_historiaClinica     = $rowMotorizado['id_historiaClinica'];
}


?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">

  <section class="content">
    <div class="box">
        <div class="box-body">
            <br>
            <br>
            <div align="center">
                <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>agregarCitas?cI=<?= encrypt($cliente_id); ?>">
                    <i class="fa fa-calendar-check-o"></i> Agregar Cita
                </a>

                <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>SclienteAdministracion_facturas">
                    <i class="fa fa-plus"></i> Facturas
                </a>
            </div>
            
            <hr>


            <div align="center">
                <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>EV_ImprimirEvolucion.php?id=<?= encrypt($evolucion_id); ?>">
                    <i class="fa fa-print"></i> Imprimir Evolución
                </a>
            </div>
        </div>
    </div>
    </section>
<!-- /.content -->
</div>

<?php include("footer.php") ?>
