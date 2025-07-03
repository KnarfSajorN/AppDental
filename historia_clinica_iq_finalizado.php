<?php
 
    include 'header.php';
    include 'menu.php';

  $historiaClinica1 = decrypt($_GET['iC']);

  $queryList = mysqli_query($conn3, "SELECT * FROM  historiaClinica_Quirurgica where ID = $historiaClinica1");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $usuario_id = $rowMotorizado['usuario_id'];
  $clienteId = $rowMotorizado['cliente_id'];

}

  $whatsapp = funcionMaster($clienteId, 'cliente_id', 'whatsapp', 'cliente');
$nombre_cliente = funcionMaster($clienteId, 'cliente_id', 'nombre_cliente', 'cliente');

if (isset($_GET['tipo'])) {
  $tipo = $_GET['tipo'];

  $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le envía el siguiente documento registrado, para visualizarlo ingresar en el siguiente link: ' . $Base . 'hciqImprimir?iC=' . encrypt($historiaClinica1) . '';
  $accion = 0;
  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

  echo "<script language='Javascript'> window.location='hciqFinalizado?iC=" . encrypt($historiaClinica1) . "';</script>";

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
 <div align="center">
  
<a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base;?>hciqPacientes"> 
  <i class="fa fa-heartbeat"></i> Nueva Consulta
</a>

<a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base;?>agregarCitas?cI=<?= encrypt($clienteId);?>"> 
  <i class="fa fa-calendar-check-o"></i> Agregar Cita
</a>

<a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base;?>SclienteAdministracion_facturas"> 
  <i class="fa fa-plus"></i> Facturas
</a>
 

</div>



<hr>  

 
<div align="center">
  
<a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base;?>hciqImprimir?iC=<?= encrypt($historiaClinica1);?>"> 
  <i class="fa fa-print"></i> Imprimir Informe Quirúrgico 
</a>

</div>

<?php 
        $botonesImprimir = [
          ['Consulta', base64_encode($Base.'hciqImprimir_plantilla.php?iC='.encrypt($historiaClinica1).'')],         
        ];
        $_GET['botones'] = base64_encode(json_encode($botonesImprimir));
        include './creadorImpresiones/seleccionarMetodoImpresion.php';
      ?>

<hr>

<div align="center">

<a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>hciqFinalizado?iC=<?php echo encrypt($historiaClinica1); ?>&tipo=consulta">
<i class="fa fa-paper-plane"></i> Enviar Informe Quirúrgico 
</a>
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
          
          
          
     

<?php include("footer.php")?>