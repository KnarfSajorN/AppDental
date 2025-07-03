<?php

include 'header.php';
include 'menu.php';

$idHistoria = $_GET['iC'];


if (isset($_POST['Enviar_Firma'])) {
  $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where ID = $historiaClinica1");
  // $nrowl = mysqli_num_rows($queryList);
  if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

      $cliente_id = $rowMotorizado['cliente_id'];
      $usuario_id      = $rowMotorizado['usuario_id'];
      // $receta     = $rowMotorizado['receta'];
    }
  }


  $whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
  $nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
  $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le ha sugerido firmar esta historia clinica, para proceder abrir el siguiente link ' . $Base . 'firma/firmardocumento/' . $historiaClinica1 . '/' . $Tabla . '/' . $cliente_id;
  $accion = 0;

  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);
  // echo "<script language='Javascript'> window.location='Pacientes.php';</script>";

  //$ruta = htmlentities($_SERVER['PHP_SELF']);
  //echo "<script language='Javascript'> window.location='HC_FinalizadoGeneral?&HC=" . encrypt($historiaClinica1) . "';</script>"; 
  echo "<script language='Javascript'> window.history.back();</script>";
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

    <section class="content box p-4">

        <br>
        <br>
        <div align="center">

            <a class="btn btn-outline-info btn-lg rounded-pill shadow"
                href="<?php echo $Base; ?>cPacientes?iCr=<?= encrypt($idHistoria); ?>">
                <i class="fa fa-heartbeat"></i> Nueva Consulta
            </a>

            <a class="btn btn-outline-info btn-lg rounded-pill shadow"
                href="<?php echo $Base; ?>agregarCitas?cI=<?= encrypt($cliente_id); ?>">
                <i class="fa fa-calendar-check-o"></i> Agregar Cita
            </a>

            <a class="btn btn-outline-info btn-lg rounded-pill shadow"
                href="<?php echo $Base; ?>SclienteAdministracion_facturas">
                <i class="fa fa-plus"></i> Facturas
            </a>


        </div>



        <hr>

        <?php
    if ($Tabla == "historia_1_preanestesica72968068096") {
    ?>
        <div align="center" id="HistoriaPrincipal">
            <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
                href="<?php echo $Base; ?>impPreanestesica.php?iC=<?= encrypt($historiaClinica1) ?>&iCr=<?= encrypt($idHistoria) ?>"">
                <i class=" fa fa-print"></i> Imprimir Consulta preanestesica
            </a>
        </div>
        <?php
    } else {
    ?>
        <div align="center" id="HistoriaPrincipal">
            <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
                href="<?php echo $Base; ?>imprimir_controlEC.php?iC=<?= encrypt($idHistoria) ?>">
                <i class="fa fa-print"></i> Imprimir Consulta
            </a>
        </div>
        <?php
    }
    ?>

        <?php
    $botonesImprimir = [
      ['Consulta', base64_encode($Base . 'cImprimir_plantilla.php?iC=' . encrypt($historiaClinica1) . '&iCr=' . encrypt($idHistoria) . '')],
    ];
    $_GET['botones'] = base64_encode(json_encode($botonesImprimir));
    include './creadorImpresiones/seleccionarMetodoImpresion.php';
    ?>


        <br>


        <div align="center" id="HistoriaPrincipal">
            <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
            href="<?php echo $Base; ?>ConfigEnviarConsultaEC.php?iC=<?=encrypt($idHistoria)?> "
                <i class="fa fa-send-o"></i> Enviar Consulta
            </a>
        </div>

        <?php if ($idHistoria == "34") :
      $HistoriaFiltro = "34";
      include 'configFinalizado_Opciones.php';
      echo "<style>#HistoriaPrincipal{display:none;}</style>";
    endif; ?>

        <div align="center">
            <hr>
        </div>



        <div align="center">




            <?php
      //foreach ($_SERVER as $key => $value) {
      //  echo " $key $value <br>";
      //}


      $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas WHERE historia_nombre='$Tabla' AND historia_id = $historiaClinica1");
      // $nrowl = mysqli_num_rows($queryList);
      if ($queryList) {
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
          $firma = $rowMotorizado['firma'];
        }
      }


      if (strlen($firma) > 10) {
        echo "<img src='$firma'>";
      } else {

        $ruta = htmlentities($_SERVER['REQUEST_URI']);
      ?>
            <!--
        <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>firma/firmardocumento/<?php echo $historiaClinica1; ?>/<?php echo $idHistoria; ?>/<?php echo $cliente_id; ?>">
          <i class="fa fa-pencil-square-o"></i> Solicitar Firma
        </a>
        -->
            <form action="<?php echo ($ruta) ?>" method="POST" name="formularioEnvioExamen">
                <button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow" name="Enviar_Firma"><i
                        class="fa fa-pencil-square-o"></i>Solicitar
                    Firma</button>
            </form>

            <!--<div id="div-results"></div>-->

            <?php

      }






      ?>


        </div>


    </section>









    <!--<div align="center">
  
<a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>configVerCliente.php?clienteId=<?php echo $cliente_id; ?>&historiaClinica=<?php echo $historiaClinica1 ?>&idHistoria=<?php echo $idHistoria ?>"> 
  <i class="fa fa-print"></i> Imprimir Toda la Historia
</a>
 
 

</div>-->





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