<?php

include 'header.php';
include 'menu.php';

$Historia_id = $_GET['id'];

$queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Ecomapa where id = $Historia_id");
if($queryList){
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $cliente_id = $rowMotorizado['cliente_id'];
    $usuario_id = $rowMotorizado['usuario_id'];
  }
}


$whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
$nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');

if (isset($_POST['Enviar_Firma'])) {

  $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Ecomapa where id = $Historia_id");
  $nrowl = mysqli_num_rows($queryList);
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $cliente_id = $rowMotorizado['cliente_id'];
    $usuario_id      = $rowMotorizado['usuario_id'];

  }

  $whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
  $nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
  $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le ha sugerido firmar este ecomapa, para proceder abrir el siguiente link ' . $Base . 'firma/firmardocumento/' . $Historia_id . '/Ecomapa/' . $cliente_id;
  $accion = 0;

  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);
  // echo "<script language='Javascript'> window.location='Pacientes.php';</script>";


  echo "<script language='Javascript'> window.location='EC_Finalizado?id=" . ($Historia_id) . "';</script>";
}

if(isset($_GET['tipo']))
{
//$tipo = $_GET['tipo'];
$mensajeW = 'Sr(a) *'.$nombre_cliente.'* Se le envia el siguiente ecomapa registrado en el sistema '.$Base.'EC_ImprimirEcomapa?id='.$Historia_id;
$accion = 0;
Whatsapp_sent_cliente($linkkey,$whatsapp, $mensajeW, $cliente_id, $usuario_id,$whatsapp, $accion);

echo "<script language='Javascript'> window.location='EC_Finalizado?id=" . ($Historia_id) . "';</script>";

} 


if ($_GET["msg"] != "") {
  include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">

  <section class="content">
  <div class="box">
    <div class="box-body">
    <br>
    <br>
    <div align="center">

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>agregarCitas?cI=<?= encrypt($cliente_id); ?>">
        <i class="fa fa-calendar-check-o"></i> Agregar Cita
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>SclienteAdministracion_facturas">
        <i class="fa fa-plus"></i> Facturas
      </a>


    </div>



    <hr>

    <div align="center">

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
        href="<?php echo $Base; ?>EC_ImprimirEcomapa?id=<?php echo ($Historia_id); ?>">
        <i class="fa fa-print"></i> Imprimir Ecomapa
      </a>


    </div>






    <hr>


    <div align="center">

    <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base;?>EC_Finalizado?id=<?php echo $Historia_id;?>&tipo=1"> 
      <i class="fa fa-paper-plane"></i> Enviar Ecomapa
    </a>

      <hr>
    </div>



    <div align="center">




      <?php

      $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $Historia_id and historia_nombre = 'Ecomapa'");
      $nrowl = mysqli_num_rows($queryList);
      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $firma = $rowMotorizado['firma'];
      }

      if (strlen($firma) > 10) {
        echo "Firmado <BR><img src='$firma'>";
      } else {

        ?>
        
<!-- <a class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" target="_blank"  href="<?php echo $Base; ?>firma/firmardocumento/<?php encrypt($Historia_id); ?>/Ecomapa/<?php echo $cliente_id; ?>/<?php echo $_SESSION['ID'] ?>" > 
    <i class="fa fa-pencil-square-o" ></i> Solicitar Firma
  </a> -->

        <form action="EC_Finalizado?id=<?php echo ($Historia_id) ?>" method="POST"
          name="formularioEnvioExamen">
          <button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow" name="Enviar_Firma"><i class="fa fa-pencil-square-o"></i>Solicitar
            Firma</button>
         </form>
        <!--<div id="div-results"></div>-->

        <?php

      }






      ?>


    </div>







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
