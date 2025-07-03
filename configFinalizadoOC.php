<?php

include 'header.php';
include 'menu.php';

$historiaClinica1 = $_GET['historiaClinica'];
$idHistoria = $_GET['idHistoria'];

$queryListhc = mysqli_query($conn3, "SELECT * from configTablas where id = $idHistoria ");
$nrowl = mysqli_num_rows($queryListhc);
while ($rowhc = mysqli_fetch_array($queryListhc)) {
  $Tabla = $rowhc['name'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  $Tabla where id = $historiaClinica1");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $cliente_id      = $rowMotorizado['cliente_id'];
  $usuario_id      = $rowMotorizado['usuario_id'];
}

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>

    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> </a></li>
    </ol>
  </section>

  <section class="content">

    <br>
    <br>
    <div align="center">

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>cPacientesOC?iCr=<?= encrypt($idHistoria); ?>">
        <i class="fa fa-heartbeat"></i> Nueva Consulta
      </a>

       <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>agregarCitas?cI=<?= encrypt($cliente_id); ?>">
        <i class="fa fa-calendar-check-o"></i> Agregar Cita
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>SclienteAdministracion_facturas">
        <i class="fa fa-plus"></i> Facturas
      </a>


    </div>



    <hr>


    <div align="center">
      <?php if ($idHistoria == 47) { ?>
        <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>fichaMedicaPO.php?historiaClinica=<?php echo $historiaClinica1 ?>&idHistoria=<?php echo $idHistoria ?>">
          <i class="fa fa-print"></i> Imprimir Consulta
        </a>
      <?php } else if ($idHistoria == 45) { ?>
        <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>FMOPeriodica.php?historiaClinica=<?php echo $historiaClinica1 ?>&idHistoria=<?php echo $idHistoria ?>">
          <i class="fa fa-print"></i> Imprimir Consulta
        </a>
      <?php } else if ($idHistoria == 49) { ?>
        <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>fichaMedicaCR.php?historiaClinica=<?php echo $historiaClinica1 ?>&idHistoria=<?php echo $idHistoria ?>">
          <i class="fa fa-print"></i> Imprimir Consulta
        </a>
      <?php } else if ($idHistoria == 48) { ?>
        <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>fichaMedicaOR.php?historiaClinica=<?php echo $historiaClinica1 ?>&idHistoria=<?php echo $idHistoria ?>">
          <i class="fa fa-print"></i> Imprimir Consulta
        </a>
      <?php } else if ($idHistoria == 50) { ?>
        <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>evaluacionMedicaTA.php?historiaClinica=<?php echo $historiaClinica1 ?>&idHistoria=<?php echo $idHistoria ?>">
          <i class="fa fa-print"></i> Imprimir Consulta
        </a>
      <?php } else if ($idHistoria == 44) { ?>
        <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>certificadoAL.php?historiaClinica=<?php echo $historiaClinica1 ?>&idHistoria=<?php echo $idHistoria ?>">
          <i class="fa fa-print"></i> Imprimir Consulta
        </a>
        <?php } ?>



   

    <div align="center">
      <hr>



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




<script type="text/javascript">
  function solicitarFirma1() {
    // estas son las variables que enviamos


    var fecha = $("#id").val();
    //        var Hora = $("#Hora").val();
    //        var usuario_id = $("#usuario_id").val();

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