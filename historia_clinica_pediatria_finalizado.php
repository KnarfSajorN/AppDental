<?php

include 'header.php';
include 'menu.php';

$historiaClinica1 = decrypt($_GET['hC']);



$queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica_Pediatria where ID = $historiaClinica1");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $cliente_id      = $rowMotorizado['cliente_id'];
  $usuario_id      = $rowMotorizado['usuario_id'];
  $receta     = $rowMotorizado['receta'];
}

$whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
$nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');

if (isset($_POST['Enviar_Firma'])) {
  $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica_Pediatria where ID = $historiaClinica1");
  $nrowl = mysqli_num_rows($queryList);
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $cliente_id      = $rowMotorizado['cliente_id'];
    // $usuario_id      = $rowMotorizado['usuario_id'];
    // $receta     = $rowMotorizado['receta'];
  }

  $whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
  $nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
  $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le ha sugerido firmar esta historia clínica, para proceder abrir el siguiente link ' . $Base . 'firma/firmardocumento/' . $historiaClinica1 . '/'.'Historia_Clinica_Pediatria'.'/' . $cliente_id;
  $accion = 0;

  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

  echo "<script language='Javascript'> window.location='hcpFinalizado?hC=" . encrypt($historiaClinica1) . "';</script>";
}

if (isset($_GET['tipo'])) {
  $tipo1 = decrypt($_GET['tipo']);
  if($tipo1 == 'receta') {$mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le envía la siguiente Receta de su cita. ' . $Base .'ImprimirReceta?HC='.encrypt($historiaClinica1) .'&NC='.encrypt('Historia_Clinica_Pediatria');   }
  else{
    $tipo = $_GET['tipo'];
    $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le envía el siguiente documento registrado en la cita ' . $Base . 'hcpImprimir?hC=' . encrypt($historiaClinica1). '&tipo=' .$tipo; 
  }
  $accion = 0;
  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);
  echo "<script language='Javascript'> window.location='hcpFinalizado?&hC=" . encrypt($historiaClinica1) . "';</script>";

}

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!--
  <section class="content-header">
    <h1>

    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> </a></li>
    </ol>
  </section>-->

  <br><br>
  <section class="content">
    <div class="box">
      <div class="box-body">
    <!-- <br>
    <br>
    <div align="center"> -->

      <!-- <a class="btn btn-app" href="<?php echo $Base; ?>buscarpaciente">
        <i class="fa fa-heartbeat"></i> Nuevo consulta
      </a> -->

      <!-- <a class="btn btn-app" href="<?php echo $Base; ?>calendarioagenda">
        <i class="fa fa-calendar-check-o"></i> Agregar Cita
      </a> -->

      <!-- <a class="btn btn-app" href="<?php echo $Base; ?>SclienteAdministracion_facturas">
        <i class="fa fa-plus"></i> Facturas
      </a> -->


    <!-- </div> -->



    <hr>


    <div align="center">

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>ImprimirReceta?HC=<?= encrypt($historiaClinica1); ?>&NC=<?=encrypt('Historia_Clinica_Pediatria')?>">
        <i class="fa fa-print"></i> Imprimir Receta
      </a>

      <a class="btn  btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>hcpImprimir?hC=<?= encrypt($historiaClinica1); ?>&tipo=<?=encrypt('incapacidad')?>">
        <i class="fa fa-print"></i> Imprimir Incapacidad
      </a>


      <a class="btn  btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>hcpImprimir?hC=<?= encrypt($historiaClinica1); ?>&tipo=<?=encrypt('examenes')?>">
        <i class="fa fa-print"></i> Imprimir Exámenes
      </a>

      <!-- <a class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>Imprimir_Historia_Clinica_PediatriaE.php?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=<?=encrypt('examenes2')?>">
        <i class="fa fa-print"></i> Imprimir Exámenes Laboratorio
      </a>

      <a class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>Imprimir_Historia_Clinica_PediatriaE.php?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=<?=encrypt('examenes1')?>">
        <i class="fa fa-print"></i> Imprimir Exámenes Imagenología
      </a> -->

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>hcpImprimir?hC=<?= encrypt($historiaClinica1); ?>&tipo=<?=encrypt('consulta')?>">
        <i class="fa fa-print"></i> Imprimir Consulta
      </a>
    </div>


    <?php 
        $botonesImprimir = [
          ['Consulta', base64_encode($Base.'historia_clinica_pediatria_imprimir_plantilla.php?hC='.encrypt($historiaClinica1).'&tipo='.encrypt('consulta').'')],
          ['Receta Medica', base64_encode($Base.'RM_ImprimirReceta_plantilla.php?HC='.encrypt($historiaClinica1).'&NC='.encrypt('Historia_Clinica_Pediatria').'')],
          ['Exámenes', base64_encode($Base.'historia_clinica_pediatria_imprimir.php?hC='.encrypt($historiaClinica1).'&tipo='.encrypt('examenes').'')], 
          ['Incapacidad', base64_encode($Base.'historia_clinica_pediatria_imprimir_plantilla.php?hC='.encrypt($historiaClinica1).'&tipo='.encrypt('incapacidad').'')],         
        ];
        $_GET['botones'] = base64_encode(json_encode($botonesImprimir));
        include './creadorImpresiones/seleccionarMetodoImpresion.php';
      ?>







    <hr>


    <div align="center">

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>hcpFinalizado?hC=<?= encrypt($historiaClinica1); ?>&tipo=<?=encrypt('receta')?>">
        <i class="fa fa-paper-plane"></i> Enviar Receta médica
      </a>

      



      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>hcpFinalizado?hC=<?= encrypt($historiaClinica1); ?>&tipo=<?=encrypt('incapacidad')?>">
        <i class="fa fa-paper-plane"></i> Enviar Incapacidad
      </a>


      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>hcpFinalizado?hC=<?= encrypt($historiaClinica1); ?>&tipo=<?=encrypt('examenes')?>">
        <i class="fa fa-paper-plane"></i> Enviar Exámenes
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>hcpFinalizado?hC=<?= encrypt($historiaClinica1); ?>&tipo=<?=encrypt('consulta')?>">
        <i class="fa fa-paper-plane"></i> Enviar Consulta
      </a>
    </div>



    <div align="center">
      <hr>



    </div>



    <div align="center">




      <?php

      $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $historiaClinica1 and historia_nombre = 'Historia_Clinica_Pediatria'");
      $nrowl = mysqli_num_rows($queryList);
      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $firma = $rowMotorizado['firma'];
      }

      if (strlen($firma) > 10) {
        echo "FIRMADO <BR><img src='$firma'>";
      } else {

      ?>
        <!--
<a class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" target="_blank"  href="<?php echo $Base; ?>firma/firmardocumento/<?php echo $historiaClinica1; ?>/Historia_Clinica_Pediatria/<?php echo $cliente_id; ?>/<?php echo $_SESSION['ID'] ?>" > 
    <i class="fa fa-pencil-square-o" ></i> Solicitar Firma
  </a>
-->
        <form action="hcpFinalizado?hC=<?=encrypt($historiaClinica1)  ?>" method="POST" name="formularioEnvioExamen">
          <button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow" name="Enviar_Firma"><i class="fa fa-pencil-square-o"></i>Solicitar Firma</button>
        </form>
        <!--<div id="div-results"></div>-->

      <?php

      }






      ?>


    </div>






    <!--
<div align="center">
 
 
  <a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>firma/firmar.php?id=<?php echo $historiaClinica1; ?>" > 

  
 <input type="number" name="numeroW"> 
  
 <a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>imprimirExamenes.php?historiaClinica1=<?php echo $historiaClinica1; ?>"> 
  <i class="fa fa-pencil-square-o"></i> Enviar Solicitud a whatsapp 
</a>
  
</div>
 
-->
    </div>
  </div>
</section>





  <!--
<div align="center">
  
<a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>vercliente.php?clienteId=<?php echo $cliente_id; ?>"> 
  <i class="fa fa-print"></i> Imprimir Toda la Historia
</a>
 
 

</div>
-->




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