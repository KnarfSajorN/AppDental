<?php
include 'header.php';
include 'menu.php';

$historiaClinica1 = decrypt($_GET['iC']);



$queryList = mysqli_query($conn3, "SELECT * FROM  evoluciones where ID = $historiaClinica1");
if($queryList){
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $cliente_id      = $rowMotorizado['cliente_id'];
    $usuario_id      = $rowMotorizado['usuario_id'];
    $id_historiaClinica     = $rowMotorizado['id_historiaClinica'];
  }
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <!-- <section class="content-header">
    <h1>

    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> </a></li>
    </ol>
  </section> -->

  <section class="content">

    <br>
    <br>
    <div align="center">

      <a class="css-button-sharp--green" href="<?php echo $Base; ?>agregarCitas?cI=<?= encrypt($cliente_id); ?>">
        <i class="fa fa-calendar-check-o"></i> Agregar Cita
      </a>

      <a class="css-button-sharp--green" href="<?php echo $Base; ?>SclienteAdministracion_facturas">
        <i class="fa fa-plus"></i> Facturas
      </a>


    </div>



    <hr>


    <div align="center">



      <a class="css-button-sharp--green" target="_blank" href="<?php echo $Base; ?>imprimirEvoluciones?iC=<?= encrypt($historiaClinica1); ?>">
        <i class="fa fa-print"></i> Imprimir Evolución
      </a>


    </div>


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
