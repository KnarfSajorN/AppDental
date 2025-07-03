<?php

include 'header.php';
include 'menu.php';

$historiaClinica1 = $_GET['historiaClinica1'];

$queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Quiropractica where id = $historiaClinica1");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $cliente_id      = $rowMotorizado['cliente_id'];
  $usuario_id      = $rowMotorizado['usuario_id'];
}

$whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
$nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');

if (isset($_GET['tipo'])) {
  $tipo = $_GET['tipo'];

  $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le envía el siguiente documento registrado, para visualizarlo ingresar en el siguiente link: ' . $Base . 'GO_ImprimirQuiropractica.php?historiaClinica1=' . ($historiaClinica1) . '&tipo=consulta';
  $accion = 0;
  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

  echo "<script language='Javascript'> window.location='GO_FinalizadoQuiropractica.php?historiaClinica1=" . ($historiaClinica1) . "';</script>";

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

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>GO_PacientesControlPrenatal.php">
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

      

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>GO_ImprimirQuiropractica.php?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=consulta">
        <i class="fa fa-print"></i> Imprimir Consulta
      </a>
    </div>

    <?php 
        $botonesImprimir = [
          ['Consulta', base64_encode($Base.'GO_ImprimirQuiropractica_plantilla.php?historiaClinica1='.encrypt($historiaClinica1).'&tipo=consulta')],       
        ];
        $_GET['botones'] = base64_encode(json_encode($botonesImprimir));
        include './creadorImpresiones/seleccionarMetodoImpresion.php';
      ?>

    <hr>

    <div align="center">

<a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>GO_FinalizadoQuiropractica.php?historiaClinica1=<?php echo ($historiaClinica1); ?>&tipo=consulta">
<i class="fa fa-paper-plane"></i> Enviar Consulta
</a>
</div>







    <hr>





  





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