<?php
 
    include 'header.php';
    include 'menu.php';

  $historiaClinicaEcografia = $_GET['ecografia'];

  $queryList = mysqli_query($conn3, "SELECT * FROM  historiaClinica_ecografias where ID = $historiaClinicaEcografia");
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $cliente_id      = $rowMotorizado['cliente_id'];
  }
  
  if (isset($_GET['tipo'])) {
    $tipo = $_GET['tipo'];

    $whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
    $nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');

    $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le envía la siguiente consulta de ecografía, para poder visualizarla ingresar en el siguiente link:  ' . $Base . 'GO_Imprimir_Ecografia.php?ecografia='.$historiaClinicaEcografia;
    $accion = 0;
    Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);
  
    echo "<script language='Javascript'> window.location='GO_Finalizado_Ecografia.php?ecografia=" . $historiaClinicaEcografia . "';</script>";
  
  }
?>

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper p-3">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1></h1>
        <ol class="breadcrumb">
          <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
          <li><a href="#"> </a></li>
        </ol>
      </section>


    <section class="content">
      <div class="box">
        <div class="box-body">
      <br><br>
      <div align="center">
  
        <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base;?>GO_Pacientes_Ecografias.php"> <i class="fa fa-heartbeat"></i> Nueva Consulta</a>

        <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base;?>agregarCitas"> <i class="fa fa-calendar-check-o"></i> Agregar Cita</a>

        <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base;?>SclienteAdministracion_facturas"> <i class="fa fa-plus"></i> Facturas</a>
      </div>
      
      <hr>  

      <div align="center">

        <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base;?>GO_Visualizar_Ecografia.php?ecografia=<?php echo $historiaClinicaEcografia;?>"> 
          <i class="fa fa-print"></i> Visualizar Ecografía
        </a>

        <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base;?>GO_Imprimir_Ecografia.php?ecografia=<?php echo $historiaClinicaEcografia;?>"> 
          <i class="fa fa-print"></i> Imprimir Ecografía
        </a>

      </div>

      <?php 
        $botonesImprimir = [
        ['Imprimir Ecografía', base64_encode($Base.'GO_Imprimir_Ecografia_plantilla.php?ecografia='.encrypt($historiaClinicaEcografia).'')],       
        ];
        $_GET['botones'] = base64_encode(json_encode($botonesImprimir));
        include './creadorImpresiones/seleccionarMetodoImpresion.php';
      ?>

      <hr>

      <div align="center">

        <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>GO_Finalizado_Ecografia.php?ecografia=<?php echo $historiaClinicaEcografia; ?>&tipo=ecografia">
          <i class="fa fa-paper-plane"></i> Enviar Ecografia
        </a>

      </div>

    </div>
    </div>
  </section>
     
    </div>
           

<?php include("footer.php")?>