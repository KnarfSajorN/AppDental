<?php

include 'header.php';
include 'menu.php';

$historiaClinica1 = $_GET['historiaClinica1'];
$historiaClinica2 = $_GET['historiaClinica2'];
$historiaClinica3 = $_GET['historiaClinica3'];
$historiaClinica4 = $_GET['historiaClinica4'];
$historiaClinica5 = $_GET['historiaClinica5'];



$queryList = mysqli_query($conn3, "SELECT * FROM  historiaObstetrica where ID = $historiaClinica1");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $cliente_id      = $rowMotorizado['cliente_id'];
  $usuario_id      = $rowMotorizado['usuario_id'];
  $receta     = $rowMotorizado['receta'];
}
$whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
$nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');

if (isset($_POST['Enviar_Firma'])) {
  $queryList = mysqli_query($conn3, "SELECT * FROM  historiaObstetrica where ID = $historiaClinica1");
  $nrowl = mysqli_num_rows($queryList);
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $cliente_id      = $rowMotorizado['cliente_id'];
    // $usuario_id      = $rowMotorizado['usuario_id'];
    // $receta     = $rowMotorizado['receta'];
  }

  $whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
  $nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
  $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le ha sugerido firmar esta historia clinica, para proceder abrir el siguiente link ' . $Base . 'firma/firmardocumento/' . $historiaClinica1 . '/Historia_Clinica/' . $cliente_id;
  $accion = 0;

  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

  echo "<script language='Javascript'> window.location='finalizadoObstetrica.php?historiaClinica1=" . $historiaClinica1 . "&historiaClinica2=" . $historiaClinica2 . "&historiaClinica3=" . $historiaClinica3 . "&historiaClinica4=" . $historiaClinica4 . "&historiaClinica5=" . $historiaClinica5 . "';</script>";
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

      <a class="btn btn-app" href="<?php echo $Base; ?>buscarpaciente">
        <i class="fa fa-heartbeat"></i> Nuevo consulta
      </a>

      <a class="btn btn-app" href="<?php echo $Base; ?>calendarioagenda">
        <i class="fa fa-calendar-check-o"></i> Agregar Cita
      </a>

      <a class="btn btn-app" href="<?php echo $Base; ?>SclienteAdministracion_facturas">
        <i class="fa fa-plus"></i> Facturas
      </a>


    </div>



    <hr>


    <div align="center">
      <!--
<a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>imprimirRecetaH.php?idr=<?php echo $receta ?>&cliente=<?php echo $cliente_id ?>"> 
  <i class="fa fa-print"></i> Imprimir Receta medica 
</a>

<a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>imprimirTratamiento.php?historiaClinica1=<?php echo $historiaClinica1; ?>"> 
  <i class="fa fa-print"></i> Imprimir Tratamiento
</a> 

<a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>imprimirDiscapacidad.php?historiaClinica1=<?php echo $historiaClinica1; ?>"> 
  <i class="fa fa-print"></i> Imprimir Incapacidad
</a>


<a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>imprimirExamenes.php?historiaClinica1=<?php echo $historiaClinica1; ?>"> 
  <i class="fa fa-print"></i> Imprimir Examenes
</a>   -->

      <a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>imprimirHistoriaObstetrica.php?historiaClinica1=<?php echo $historiaClinica1; ?>">
        <i class="fa fa-print"></i> Imprimir Consulta
      </a>

      <a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>imprimirtest.php?historiaClinica1=<?php echo $historiaClinica3; ?>">
        <i class="fa fa-print"></i> Imprimir Test Coronavirus
      </a>

      <a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>imprimirOrdenLabOste.php?historiaClinica1=<?php echo $historiaClinica2; ?>">
        <i class="fa fa-print"></i> Imprimir orden laboratorio
      </a>
      <a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>imprimirImagenologia.php?historiaClinica1=<?php echo $historiaClinica4; ?>">
        <i class="fa fa-print"></i> Imprimir Imagenologia
      </a>
      <!-- <a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>imprimirEpidemiologia.php?historiaClinica1=<?php echo $historiaClinica5; ?>"> 
  <i class="fa fa-print"></i> Imprimir Epidemiología
</a> -->
      <a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>imprimirRecetaOstetrica.php?idr=<?php echo $receta ?>&cliente=<?php echo $cliente_id ?>">
        <i class="fa fa-print"></i> Imprimir Receta medica
      </a>
      <a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>imprimirVacunasObs.php?historiaClinica1=<?php echo $historiaClinica1; ?>">
        <i class="fa fa-print"></i> Imprimir Historial de Vacunas
      </a>
    </div>


    <div align="center">


      <a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>pruebareceta.php?idr=<?php echo $receta ?>&cliente=<?php echo $cliente_id ?>">
        <i class="fa fa-send-o"></i> Enviar Receta
      </a>
      <a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>enviarLaboratorio.php?historiaClinica1=<?php echo $historiaClinica2; ?>">
        <i class="fa fa-send-o"></i> Enviar Orden Laboratorio
      </a>
      <a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>enviarImagenologia.php?historiaClinica1=<?php echo $historiaClinica4; ?>">
        <i class="fa fa-send-o"></i> Enviar Imagenologia
      </a>

      <!-- <a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>enviarEpi.php?historiaClinica1=<?php echo $historiaClinica5; ?>">
        <i class="fa fa-send-o"></i> Enviar Epidemiología
      </a> -->

    </div>


    <!--
<a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>imprimirTratamiento.php?historiaClinica1=<?php echo $historiaClinica1; ?>"> 
  <i class="fa fa-print"></i> Imprimir Tratamiento
</a> 

<a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>enviarIncapacidadH.php?historiaClinica1=<?php echo $historiaClinica1; ?>"> 
  <i class="fa fa-send-o"></i> Enviar Incapacidad
</a>


<a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>enviarExamenesH.php?historiaClinica1=<?php echo $historiaClinica1; ?>"> 
  <i class="fa fa-send-o"></i> Enviar Examenes
</a>
 
<a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>enviarConsultaH.php?historiaClinica1=<?php echo $historiaClinica1; ?>"> 
  <i class="fa fa-send-o"></i> Enviar Consulta
</a>
</div>  -->

    <div align="center">
      <hr>



    </div>



    <!--<div align="center">




      <?php

      $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $historiaClinica1 and historia_nombre = 'Historia_Clinica'");
      $nrowl = mysqli_num_rows($queryList);
      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $firma = $rowMotorizado['firma'];
      }

      if (strlen($firma) > 10) {
        echo "<img src='$firma'>";
      } else {

      ?>
        <form action="finalizadoObstetrica.php?historiaClinica1=<?php echo $historiaClinica1 ?>&historiaClinica2=<?php echo $historiaClinica2 ?>&historiaClinica3=<?php echo $historiaClinica3 ?>&historiaClinica4=<?php echo $historiaClinica4 ?>&historiaClinica5=<?php echo $historiaClinica5 ?>" method="POST" name="formularioEnvioExamen">
          <button type="submit" class="btn btn-app" name="Enviar_Firma"><i class="fa fa-pencil-square-o"></i>Solicitar Firma</button>
        </form>

      

      <?php

      }






      ?>


    </div>-->






    <!--
<div align="center">
 
 
  <a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>firma/firmar.php?id=<?php echo $historiaClinica1; ?>" > 

  
 <input type="number" name="numeroW"> 
  
 <a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>imprimirExamenes.php?historiaClinica1=<?php echo $historiaClinica1; ?>"> 
  <i class="fa fa-pencil-square-o"></i> Enviar Solicitud a whatsapp 
</a>
  
</div>
 
-->
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