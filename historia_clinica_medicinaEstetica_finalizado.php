<?php

include 'header.php';
include 'menu.php';

$historiaClinica1 = ($_GET['hC'] != '' ? decrypt($_GET['hC']) : $_GET['historiaClinica1']);





$queryList = mysqli_query($conn3, "SELECT * FROM historiaClinica5 where ID = $historiaClinica1");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $cliente_id      = $rowMotorizado['cliente_id'];
  $usuario_id      = $rowMotorizado['usuario_id'];
}

$whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
$nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');

if (isset($_GET['tipo'])) {
  $tipo = $_GET['tipo'];

  $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le envía el siguiente documento registrado, para visualizarlo ingresar en el siguiente link:  ' . $Base . 'hcmeImprimir?hC='.encrypt($historiaClinica1).'';
  $accion = 0;
  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

  echo "<script language='Javascript'> window.location='hcmeFinalizado?hC=" . encrypt($historiaClinica1) . "';</script>";

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
    <div class="box">
    <div class="box-body">
  <br>
  <br>

  <div align="center">
  
  <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base;?>hcmePacientes"> 
    <i class="fa fa-heartbeat"></i> Nueva Consulta
  </a>
  
  <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base;?>agregarCitas"> 
    <i class="fa fa-calendar-check-o"></i> Agregar Cita
  </a>
  
  <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base;?>SclienteAdministracion_facturas"> 
    <i class="fa fa-plus"></i> Facturas
  </a>
   
  
  </div>
  
  
  
  <hr>  

    <div align="center">
      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>hcmeImprimir?hC=<?= encrypt($historiaClinica1) ?>">
        <i class="fa fa-print"></i> Imprimir
      </a>
    </div>

    <?php 
        $botonesImprimir = [
          ['Consulta', base64_encode($Base.'hcmeImprimir_plantilla.php?hC='.encrypt($historiaClinica1).'')],         
        ];
        $_GET['botones'] = base64_encode(json_encode($botonesImprimir));
        include './creadorImpresiones/seleccionarMetodoImpresion.php';
      ?>

    <hr>

<div align="center">

<a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>hcmeFinalizado?hC=<?php echo encrypt($historiaClinica1); ?>&tipo=consulta">
<i class="fa fa-paper-plane"></i> Enviar Consulta
</a>
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
        <form action="finalizadAntienvejecimiento.php?historiaClinica1=<?php echo $historiaClinica1 ?>" method="POST" name="formularioEnvioExamen">
          <button type="submit" class="css-button-sharp--green" name="Enviar_Firma"><i class="fa fa-pencil-square-o"></i>Solicitar Firma</button>
        </form>


      <?php

      }






      ?>


    </div>-->







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