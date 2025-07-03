<?php

include 'header.php';
include 'menu.php';

$historiaClinica1 = decrypt($_GET['iC']);





$queryList = mysqli_query($conn3, "SELECT * FROM  e_tratamiento where ID = $historiaClinica1");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {


  //$usuario_id      = $rowMotorizado['idCliente'];

  $usuario_id = $rowMotorizado['idUsuario'];
  $cliente_id = $rowMotorizado['idCliente'];

}


$whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
$nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');

if (isset($_GET['tipo'])) {
  $tipo = $_GET['tipo'];

  $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le envía el siguiente documento registrado, para visualizarlo ingresar en el siguiente link: ' . $Base . 'hcspaImprimir?iC=' . encrypt($historiaClinica1) . '';
  $accion = 0;
  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

  echo "<script language='Javascript'> window.location='hcspaFinalizado?iC=" . encrypt($historiaClinica1) . "';</script>";

}

if (isset($_POST['Enviar_Firma'])) {
  $tipo = $_GET['tipo'];

  $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le ha sugerido firmar esta consulta, para proceder abrir el siguiente link ' . $Base . 'firma/firmardocumento/' . $historiaClinica1 .'/e_tratamiento/'. $cliente_id;
  $accion = 0;
  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

  echo "<script language='Javascript'> window.location='hcspaFinalizado?iC=" . encrypt($historiaClinica1) . "';</script>";

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



  <br><br>
  <section class="content">
  <div class="box">
      <div class="box-body">
    <br>
    <br>
    <div align="center">

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>hcspaPacientes">
        <i class="fa fa-heartbeat"></i> Nueva Consulta
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>agregarCitas?cI=<?=  encrypt($usuario_id) ?>">
        <i class="fa fa-calendar-check-o"></i> Agregar Cita
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>SclienteAdministracion_facturas">
        <i class="fa fa-plus"></i> Facturar
      </a>


    </div>



    <hr>


    <div align="center">

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>hcspaImprimir?iC=<?= encrypt($historiaClinica1); ?>">
        <i class="fa fa-print"></i> Imprimir Consulta
      </a>

      <?php 
        $botonesImprimir = [
          ['Consulta', base64_encode($Base.'hcspaImprimir_plantilla.php?iC='.encrypt($historiaClinica1).'')],         
        ];
        $_GET['botones'] = base64_encode(json_encode($botonesImprimir));
        include './creadorImpresiones/seleccionarMetodoImpresion.php';
      ?>




    </div>





    <hr>

<div align="center">

<a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>hcspaFinalizado?iC=<?php echo encrypt($historiaClinica1); ?>&tipo=consulta">
<i class="fa fa-paper-plane"></i> Enviar Consulta
</a>
</div>

<hr>






    <div align="center">




      <?php




      $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $historiaClinica1 and historia_nombre = 'e_tratamiento'");
      $nrowl = mysqli_num_rows($queryList);
      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $firma = $rowMotorizado['firma'];
      }

      if (strlen($firma) > 10) {
        echo "<img src='$firma'>";
      } else {

      ?>
      <br>
        <form action="hcspaFinalizado?iC=<?php echo encrypt($historiaClinica1) ?>" method="POST" name="formularioEnvioExamen">
          <button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow" name="Enviar_Firma"><i class="fa fa-pencil-square-o"></i>Solicitar Firma</button>
        </form>

        <!--
        <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" onclick="solicitarFirma1()" href="<?php echo $Base; ?>firma/firmardocumento/<?php echo $historiaClinica1; ?>/21/<?php echo $usuario_id; ?>">
          <i class="fa fa-pencil-square-o"></i> Solicitar Firma
        </a>

        <div id="div-results"></div>
      -->

      <?php

      }






      ?>


    </div>





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