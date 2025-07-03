<?php

include 'header.php';
include 'menu.php';

$historiaClinica1 = $_GET['historiaClinica1'];



$queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica_Ginecobstetrica where ID = $historiaClinica1");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $cliente_id      = $rowMotorizado['cliente_id'];
  $usuario_id      = $rowMotorizado['usuario_id'];
  $receta     = $rowMotorizado['receta'];
}

$whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
$nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');

if (isset($_POST['Enviar_Firma'])) {
  $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica_Ginecobstetrica where ID = $historiaClinica1");
  $nrowl = mysqli_num_rows($queryList);
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $cliente_id      = $rowMotorizado['cliente_id'];
    // $usuario_id      = $rowMotorizado['usuario_id'];
    // $receta     = $rowMotorizado['receta'];
  }

  $whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
  $nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
  $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le ha sugerido firmar esta historia clinica, para proceder abrir el siguiente link ' . $Base . 'firma/firmardocumento/' . $historiaClinica1 .'/Historia_Clinica_Ginecobstetrica/'. $cliente_id;
  $accion = 0;
  
  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

  echo "<script language='Javascript'> window.location='GO_Finalizado_Historia_Ginecobstetrica?&historiaClinica1=" . $historiaClinica1 . "';</script>";
}

if (isset($_GET['tipo'])) {
  $tipo = $_GET['tipo'];
  if($tipo== 'receta'){
    $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le envia el siguiente documento registrado en la cita ' . $Base . 'RM_ImprimirRecetaGinecobstetrica?historia_clinica_id=' . $historiaClinica1 . '&nombre_historia=Historia_Clinica_Ginecobstetrica';
    $accion = 0;
    Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);
  }else{
  $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le envia el siguiente documento registrado en la cita ' . $Base . 'GO_Imprimir_Historia_Ginecobstetrica?historiaClinica1=' . $historiaClinica1 . '&tipo=' . $tipo;
  $accion = 0;
  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

  echo "<script language='Javascript'> window.location='GO_Finalizado_Historia_Ginecobstetrica?&historiaClinica1=" . $historiaClinica1 . "';</script>";
}
}

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
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
    <div class="box">
    <div class="box-body">
    <br>
    <br>
    <div align="center">

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>GO_Pacientes_Ginecobstetrica">
        <i class="fa fa-heartbeat"></i> Nueva Consulta
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>agregarCitas">
        <i class="fa fa-calendar-check-o"></i> Agregar Cita
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>SclienteAdministracion_facturas">
        <i class="fa fa-plus"></i> Facturas
      </a>


    </div>



    <hr>


    <div align="center">

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>RM_ImprimirRecetaGinecobstetrica?historia_clinica_id=<?php echo $historiaClinica1; ?>&nombre_historia=Historia_Clinica_Ginecobstetrica">
        <i class="fa fa-print"></i> Imprimir Receta Médica
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>GO_Imprimir_Historia_Ginecobstetrica?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=incapacidad">
        <i class="fa fa-print"></i> Imprimir Incapacidad
      </a>


      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>GO_Imprimir_Historia_Ginecobstetrica?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=examenes">
        <i class="fa fa-print"></i> Imprimir Exámenes
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>GO_Imprimir_Historia_Ginecobstetrica?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=vacunas">
        <i class="fa fa-print"></i> Imprimir Historial de Vacunas
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>GO_Imprimir_Historia_Ginecobstetrica?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=consulta">
        <i class="fa fa-print"></i> Imprimir Consulta
      </a>
    </div>


    <?php 
        $botonesImprimir = [
          ['Consulta', base64_encode($Base.'GO_Imprimir_Historia_Ginecobstetrica_plantilla.php?historiaClinica1='.encrypt($historiaClinica1).'&tipo=consulta')],
          ['Receta Medica', base64_encode($Base.'RM_ImprimirRecetaGinecobstetrica_plantilla.php?historia_clinica_id='.encrypt($historiaClinica1).'&nombre_historia=Historia_Clinica_Ginecobstetrica')],
          ['Exámenes', base64_encode($Base.'GO_Imprimir_Historia_Ginecobstetrica_plantilla.php?historiaClinica1='.encrypt($historiaClinica1).'&tipo=examenes')], 
          ['Incapacidad', base64_encode($Base.'GO_Imprimir_Historia_Ginecobstetrica_plantilla.php?historiaClinica1='.encrypt($historiaClinica1).'&tipo=incapacidad')], 
          ['Vacunas', base64_encode($Base.'GO_Imprimir_Historia_Ginecobstetrica_plantilla.php?historiaClinica1='.encrypt($historiaClinica1).'&tipo=vacunas')],          
        ];
        $_GET['botones'] = base64_encode(json_encode($botonesImprimir));
        include './creadorImpresiones/seleccionarMetodoImpresion.php';
      ?>







    <hr>


    <div align="center">

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>GO_Finalizado_Historia_Ginecobstetrica?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=receta">
        <i class="fa fa-paper-plane"></i> Enviar Receta Médica
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>GO_Finalizado_Historia_Ginecobstetrica?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=incapacidad">
        <i class="fa fa-paper-plane"></i> Enviar Incapacidad
      </a>


      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>GO_Finalizado_Historia_Ginecobstetrica?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=examenes">
        <i class="fa fa-paper-plane"></i> Enviar Exámenes
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>GO_Finalizado_Historia_Ginecobstetrica?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=vacunas">
        <i class="fa fa-paper-plane"></i> Enviar Historial de Vacunas
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>GO_Finalizado_Historia_Ginecobstetrica?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=consulta">
        <i class="fa fa-paper-plane"></i> Enviar Consulta
      </a>
    </div>



    <div align="center">
      <hr>



    </div>



    <div align="center">




      <?php

      $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $historiaClinica1 and historia_nombre = 'Historia_Clinica_Ginecobstetrica'");
      $nrowl = mysqli_num_rows($queryList);
      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $firma = $rowMotorizado['firma'];
      }

      if (strlen($firma) > 10) {
      echo "FIRMADO <BR><img src='$firma'>";
      } else {

      ?>
        <!--
<a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"  href="<?php echo $Base; ?>firma/firmardocumento/<?php echo $historiaClinica1; ?>/Historia_Clinica/<?php echo $cliente_id; ?>/<?php echo $_SESSION['ID'] ?>" > 
    <i class="fa fa-pencil-square-o" ></i> Solicitar Firma
  </a>
-->
        <form action="GO_Finalizado_Historia_Ginecobstetrica?historiaClinica1=<?php echo $historiaClinica1 ?>" method="POST" name="formularioEnvioExamen">
          <button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow" name="Enviar_Firma"><i class="fa fa-pencil-square-o"></i>Solicitar Firma</button>
        </form>
        <!--<div id="div-results"></div>-->

      <?php

      }






      ?>


    </div>






    <!--
<div align="center">
 
 
  <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>firma/firmar.php?id=<?php echo $historiaClinica1; ?>" > 

  
 <input type="number" name="numeroW"> 
  
 <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>imprimirExamenes.php?historiaClinica1=<?php echo $historiaClinica1; ?>"> 
  <i class="fa fa-pencil-square-o"></i> Enviar Solicitud a whatsapp 
</a>
  
</div>
 
-->
        </div>
    </div>
  </section>





  <!--
<div align="center">
  
<a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>vercliente.php?clienteId=<?php echo $cliente_id; ?>"> 
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