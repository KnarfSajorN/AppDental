<?php

include 'header.php';
include 'menu.php';


// $historiaClinica1 = $_GET['historiaClinica1'];
$historiaClinica1 = decrypt($_GET['HC']);

$queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where ID = $historiaClinica1");
// echo "SELECT * FROM  Historia_Clinica where ID = $historiaClinica1";
if($queryList){
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $cliente_id = $rowMotorizado['cliente_id'];
    $usuario_id = $rowMotorizado['usuario_id'];
    $receta = $rowMotorizado['receta'];
  }
}


$whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
$nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');

if (isset($_POST['Enviar_Firma'])) {

  $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where ID = $historiaClinica1");
  $nrowl = mysqli_num_rows($queryList);
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $cliente_id = $rowMotorizado['cliente_id'];
    $usuario_id      = $rowMotorizado['usuario_id'];
    // $receta     = $rowMotorizado['receta'];
  }

  $whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
  $nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
  $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le ha sugerido firmar esta historia clinica, para proceder abrir el siguiente link ' . $Base . 'firma/firmardocumento/' . $historiaClinica1 . '/Historia_Clinica/' . $cliente_id;
  $accion = 0;

  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);
  // echo "<script language='Javascript'> window.location='Pacientes.php';</script>";


  // echo "<script language='Javascript'> window.location='HC_FinalizadoGeneral?&HC=" . encrypt($historiaClinica1) . "';</script>";
}

if (isset($_GET['tipo'])) {
  $tipo = decrypt($_GET['tipo']);

  //echo $tipo;
  //echo "Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);";
  if ($tipo == "examenes") {
   
    $tipo_encriptado = encrypt($tipo);
    $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le envia los siguientes examenes, registrado en la cita ' . $Base . 'HC_ImprimirGeneral?HC=' . encrypt($historiaClinica1) . '&tipo=' . $tipo_encriptado;
  } elseif ($tipo == "incapacidad") {
   
    $tipo_encriptado1 = encrypt($tipo);
    $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le envia la siguiente incapacidad, registrado en la cita ' . $Base . 'HC_ImprimirGeneral?HC=' . encrypt($historiaClinica1) . '&tipo=' . $tipo_encriptado1;
  } elseif ($tipo == "consulta") {
  
    $tipo_encriptado2 = encrypt($tipo);
    $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le envia el siguiente documento, registrado en la cita ' . $Base . 'HC_ImprimirGeneral?HC=' . encrypt($historiaClinica1) . '&tipo=' . $tipo_encriptado2;
  } elseif ($tipo == "Historia_Clinica") {  
    $tipo_encriptado3 = encrypt($tipo);
    $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le envia la siguiente receta, registrado en la cita ' . $Base . 'RM_ImprimirReceta.php?HC=' . encrypt($historiaClinica1) . '&NC=' . $tipo_encriptado3;
  }

  $accion = 0;

   Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

  // mail($email, $subject, $mensaje, $headers);
  $_GET['receptor'] = $correo;
  $_GET['asunto'] = "Documento - {$tipo} ";
  $_GET['mensaje'] = $texto;
  include 'plantillaCorreo.php';


  // echo "<script language='Javascript'> window.location='HC_FinalizadoGeneral?HC=" . encrypt($historiaClinica1) . "&msg=Mensaje Enviado';</script>";
}

if ($_GET["msg"] != "") {
  include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
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

  <section class="content">
  <div class="box">
    <div class="box-body">
    <br>
    <br>
    <div align="center">

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>HC_HistoriaGeneral?cI=<?= encrypt($cliente_id); ?>">
        <i class="fa fa-heartbeat"></i> Nuevo consulta
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>agregarCitas?cI=<?= encrypt($cliente_id); ?>">
        <i class="fa fa-calendar-check-o"></i> Agregar Cita
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>SclienteAdministracion_facturas">
        <i class="fa fa-plus"></i> Facturas
      </a>


    </div>



    <hr>

    <?php
    $tipo = "examenes";
    $tipo_encriptado = encrypt($tipo);
    //
    $tipo1 = "incapacidad";
    $tipo_encriptado1 = encrypt($tipo1);
    //
    $tipo2 = "consulta";
    $tipo_encriptado2 = encrypt($tipo2);
    //
    $tipo3 = "Historia_Clinica";
    $tipo_encriptado3 = encrypt($tipo3);

    ?>
    <!-- <div align="center">
      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
        href="<?php echo $Base; ?>RM_ImprimirReceta.php?HC=<?php echo encrypt($historiaClinica1); ?>&NC=<?php echo $tipo_encriptado3; ?>">
        <i class="fa fa-print"></i> Imprimir Receta medica
      </a>
      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
        href="<?php echo $Base; ?>HC_ImprimirGeneral?HC=<?php echo encrypt($historiaClinica1); ?>&tipo=<?php echo $tipo_encriptado1; ?>">
        <i class="fa fa-print"></i> Imprimir Incapacidad
      </a>
      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
        href="<?php echo $Base; ?>HC_ImprimirGeneral?HC=<?php echo encrypt($historiaClinica1); ?>&tipo=<?php echo $tipo_encriptado; ?>">
        <i class="fa fa-print"></i> Imprimir Examenes
      </a>
      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
        href="<?php echo $Base; ?>HC_ImprimirGeneral?HC=<?php echo encrypt($historiaClinica1); ?>&tipo=<?php echo $tipo_encriptado2; ?>">
        <i class="fa fa-print"></i> Imprimir Consulta
      </a>
    </div> -->

      <?php 
        $botonesImprimir = [
          ['Consulta', base64_encode($Base.'Imprimir_Historia_Clinica_plantilla.php?HC='.encrypt($historiaClinica1).'&tipo='. $tipo_encriptado2.'')],
          ['Receta Medica', base64_encode($Base.'RM_ImprimirReceta_plantilla.php?HC='.encrypt($historiaClinica1).'&NC='. $tipo_encriptado3.'')],
          ['Exámenes', base64_encode($Base.'Imprimir_Historia_Clinica_plantilla.php?HC='.encrypt($historiaClinica1).'&tipo='. $tipo_encriptado.'')], 
          ['Incapacidad', base64_encode($Base.'Imprimir_Historia_Clinica_plantilla.php?HC='.encrypt($historiaClinica1).'&tipo='. $tipo_encriptado1.'')],         
        ];
        $_GET['botones'] = base64_encode(json_encode($botonesImprimir));
        include './creadorImpresiones/seleccionarMetodoImpresion.php';
      ?>







    <hr>


    <!-- <div align="center">
      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
        href="<?php echo $Base; ?>HC_FinalizadoGeneral?HC=<?php echo encrypt($historiaClinica1); ?>&tipo=<?php echo $tipo_encriptado3; ?>">
        <i class="fa fa-paper-plane"></i> Enviar Receta medica
      </a>
      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
        href="<?php echo $Base; ?>HC_FinalizadoGeneral?HC=<?php echo encrypt($historiaClinica1); ?>&tipo=<?php echo $tipo_encriptado1; ?>">
        <i class="fa fa-paper-plane"></i> Enviar Incapacidad
      </a>
      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
        href="<?php echo $Base; ?>HC_FinalizadoGeneral?HC=<?php echo encrypt($historiaClinica1); ?>&tipo=<?php echo $tipo_encriptado; ?>">
        <i class="fa fa-paper-plane"></i> Enviar Examenes
      </a>
      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
        href="<?php echo $Base; ?>HC_FinalizadoGeneral?HC=<?php echo encrypt($historiaClinica1); ?>&tipo=<?php echo $tipo_encriptado2; ?>">
        <i class="fa fa-paper-plane"></i> Enviar Consulta
      </a>
    </div> -->



    <div align="center">
      <hr>



    </div>



    <div align="center">




      <?php

      $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $historiaClinica1 and historia_nombre = 'Historia_Clinica'");
      $nrowl = mysqli_num_rows($queryList);
      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $firma = $rowMotorizado['firma'];
      }

      if (strlen($firma) > 10) {
        echo "FIRMADO <BR><img src='$firma'>";
      } else {

        ?>
        
<!-- <a class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" target="_blank"  href="<?php echo $Base; ?>firma/firmardocumento/<?php encrypt($historiaClinica1); ?>/Historia_Clinica/<?php echo $cliente_id; ?>/<?php echo $_SESSION['ID'] ?>" > 
    <i class="fa fa-pencil-square-o" ></i> Solicitar Firma
  </a> -->

        <form action="HC_FinalizadoGeneral?HC=<?php echo encrypt($historiaClinica1) ?>" method="POST"
          name="formularioEnvioExamen">
          <button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow" name="Enviar_Firma"><i class="fa fa-pencil-square-o"></i>Solicitar
            Firma</button>
         </form>
        <!--<div id="div-results"></div>-->

        <?php

      }






      ?>


    </div>






    <!--
<div align="center">
 
 
  <a class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>firma/firmar.php?id=<?php encrypt($historiaClinica1); ?>" > 

  
 <input type="number" name="numeroW"> 
  
 <a class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>imprimirExamenes.php?HC=<?php encrypt($historiaClinica1); ?>"> 
  <i class="fa fa-pencil-square-o"></i> Enviar Solicitud a whatsapp 
</a>
  
</div>
 
-->
    </div>
    </div>
  </section>





  <!--
<div align="center">
  
<a class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>vercliente.php?clienteId=<?php echo $cliente_id; ?>"> 
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
      success: function (response) {
        $('#div-results').html(response);

      }
    });
  };
</script>