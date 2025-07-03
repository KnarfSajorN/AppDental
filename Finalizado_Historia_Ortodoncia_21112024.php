<?php

include 'header.php';
include 'menu.php';

$historiaClinica1 = $_GET['historiaClinica1'];



$queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Ortodoncia where ID = $historiaClinica1");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $cliente_id = $rowMotorizado['cliente_id'];
  $usuario_id = $rowMotorizado['usuario_id'];
  $receta = $rowMotorizado['receta'];
}

$whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
$nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');

if (isset($_POST['Enviar_Firma'])) {
  $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Ortodoncia where ID = $historiaClinica1");
  $nrowl = mysqli_num_rows($queryList);
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $cliente_id = $rowMotorizado['cliente_id'];
    // $usuario_id      = $rowMotorizado['usuario_id'];
    // $receta     = $rowMotorizado['receta'];
  }

  $whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
  $nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
  $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le ha sugerido firmar esta historia clinica, para proceder abrir el siguiente link ' . $Base . 'firma/firmardocumento/' . $historiaClinica1 . '/Historia_Ortodoncia/' . $cliente_id;
  $accion = 0;

  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

  echo "<script language='Javascript'> window.location='Finalizado_Historia_Ortodoncia?&historiaClinica1=" . $historiaClinica1 . "';</script>";
}

if (isset($_GET['tipo'])) {
  $tipo = $_GET['tipo'];
  $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le envia el siguiente documento registrado en la cita ' . $Base . 'Imprimir_Historia_Ortodoncia.php?historiaClinica1=' . $historiaClinica1 . '&tipo=' . $tipo;
  $accion = 0;
  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

  echo "<script language='Javascript'> window.location='Finalizado_Historia_Ortodoncia?&historiaClinica1=" . $historiaClinica1 . "';</script>";
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

  <section class="content p-3">
    <div class="box">
      <div class="box-body">
        <br>
        <br>
        <div align="center">

          <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>Pacientes_Ortodoncia">
            <i class="fa fa-heartbeat"></i> Nueva consulta
          </a>

          <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>agregarCitas">
            <i class="fa fa-calendar-check-o"></i> Agregar Cita
          </a>



        </div>



        <hr>


        <div align="center">

          <!-- <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>RM_ImprimirReceta.php?historia_Ortodoncia_id=<?php echo $historiaClinica1; ?>&nombre_historia=Historia_Ortodoncia">
        <i class="fa fa-print"></i> Imprimir Receta medica
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>Imprimir_Historia_Ortodoncia.php?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=incapacidad">
        <i class="fa fa-print"></i> Imprimir Incapacidad
      </a>


      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>Imprimir_Historia_Ortodoncia.php?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=examenes">
        <i class="fa fa-print"></i> Imprimir Examenes
      </a> -->

          <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
            href="<?php echo $Base; ?>Imprimir_Historia_Ortodoncia?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=consulta">
            <i class="fa fa-print"></i> Imprimir Consulta
          </a>
        </div>







        <hr>


        <div align="center">

          <!-- <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>Finalizado_Historia_Ortodoncia?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=receta">
        <i class="fa fa-paper-plane"></i> Enviar Receta medica
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>Finalizado_Historia_Ortodoncia?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=incapacidad">
        <i class="fa fa-paper-plane"></i> Enviar Incapacidad
      </a>


      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>Finalizado_Historia_Ortodoncia?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=examenes">
        <i class="fa fa-paper-plane"></i> Enviar Examenes
      </a> -->

          <a class="btn btn-outline-info btn-lg rounded-pill shadow"
            href="<?php echo $Base; ?>Finalizado_Historia_Ortodoncia?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=consulta">
            <i class="fa fa-paper-plane"></i> Enviar Consulta
          </a>
        </div>



        <div align="center">
          <hr>



        </div>



        <div align="center">




          <?php

          $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $historiaClinica1 and historia_nombre = 'Historia_Ortodoncia'");
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
            <form action="Finalizado_Historia_Ortodoncia?historiaClinica1=<?php echo $historiaClinica1 ?>"
              method="POST" name="formularioEnvioExamen">
              <button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow" name="Enviar_Firma"><i
                  class="fa fa-pencil-square-o"></i>Solicitar Firma</button>
            </form>
            <!--<div id="div-results"></div>-->

            <?php
            $botonesImprimir = [
              ['Consulta', base64_encode($Base . 'Imprimir_Historia_Ortodoncia_Plantilla.php?historiaClinica1=' . $historiaClinica1 . '')]
            ];
            $_GET['botones'] = base64_encode(json_encode($botonesImprimir));
            include './creadorImpresiones/seleccionarMetodoImpresion.php';
            ?>

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
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>

<?php include ("footer.php") ?>




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