<?php
 
    include 'header.php';
    include 'menu.php';

  $historiaClinica1 = $_GET['historiaClinica1'];

  $queryList = mysqli_query($conn3, "SELECT * FROM  nutricionAdulto where ID = $historiaClinica1");
   while ($rowMotorizado = mysqli_fetch_array($queryList)) {
   
     $cliente_id = $rowMotorizado['cliente_id'];
     $usuario_id      = $rowMotorizado['usuario_id'];
   }

   $whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
$nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');

if (isset($_GET['tipo'])) {
  $tipo = $_GET['tipo'];

  if($tipo=="consulta"){
    $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le envia el siguiente documento registrado en la consulta ' . $Base . 'HN_Imprimir_Historias?historiaClinica1=' . $historiaClinica1 . '';
  $accion = 0;
  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

  echo "<script language='Javascript'> window.location='HN_Finalizado_Historias?historiaClinica1=" . $historiaClinica1 . "';</script>";
  }
  
  if($tipo=="examenes"){
    $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le envia el siguiente documento registrado en la consulta ' . $Base . 'HN_Imprimir_Historias_Examenes?historiaClinica1=' . $historiaClinica1 . '';
    $accion = 0;
    Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

    echo "<script language='Javascript'> window.location='HN_Finalizado_Historias?historiaClinica1=" . $historiaClinica1 . "';</script>";
  }

}
if (isset($_POST['Enviar_Firma'])) {

    $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le ha sugerido firmar esta historia clinica, para proceder abrir el siguiente link ' . $Base . 'firma/firmardocumento/' . $historiaClinica1 .'/nutricionAdulto/'. $cliente_id;
    $accion = 0;
    
    Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);
  
    echo "<script language='Javascript'> window.location='HN_Finalizado_Historias?historiaClinica1=" . $historiaClinica1 . "';</script>";
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
  
<a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base;?>HN_Pacientes"> 
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
  
<a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base;?>HN_Imprimir_Historias?historiaClinica1=<?php echo $historiaClinica1;?>"> 
  <i class="fa fa-print"></i> Imprimir Consulta
</a>

<a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base;?>HN_Imprimir_Historias_Examenes?historiaClinica1=<?php echo $historiaClinica1;?>"> 
  <i class="fa fa-print"></i> Imprimir Exámenes
</a>
</div>


<?php 
        $botonesImprimir = [
          ['Consulta', base64_encode($Base.'HN_Imprimir_Historias_plantilla.php?historiaClinica1='.encrypt($historiaClinica1).'')],
          ['Exámenes', base64_encode($Base.'HN_Imprimir_Historias_Examenes_plantilla.php?historiaClinica1='.encrypt($historiaClinica1).'')],          
        ];
        $_GET['botones'] = base64_encode(json_encode($botonesImprimir));
        include './creadorImpresiones/seleccionarMetodoImpresion.php';
      ?>


<hr>

<div align="center">

<a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>HN_Finalizado_Historias?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=consulta">
<i class="fa fa-paper-plane"></i> Enviar Consulta
</a>

<a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>HN_Finalizado_Historias?historiaClinica1=<?php echo $historiaClinica1; ?>&tipo=examenes">
<i class="fa fa-paper-plane"></i> Enviar Exámenes
</a>

</div>


</div>
<hr>

<div align="center">




      <?php

      $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $historiaClinica1 and historia_nombre = 'nutricionAdulto'");
      $nrowl = mysqli_num_rows($queryList);
      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $firma = $rowMotorizado['firma'];
      }

      if (strlen($firma) > 10) {
      echo "Firmado <br><img src='$firma'>";
      } else {
      ?>
        <form action="HN_Finalizado_Historias?historiaClinica1=<?php echo $historiaClinica1 ?>" method="POST" name="formularioEnvioExamen">
          <button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow" name="Enviar_Firma"><i class="fa fa-pencil-square-o"></i>Solicitar Firma</button>
        </form>
      <?php
      }
      ?>
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
          
          
          
     

<?php include("footer.php")?>