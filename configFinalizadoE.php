<?php

include 'header.php';
include 'menu.php';

$historiaClinica1 = decrypt($_GET['iC']);
$idHistoria = decrypt($_GET['iCr']);

$queryListhc = mysqli_query($conn3, "SELECT * from configTablasE where id = $idHistoria ");

// $nrowl = mysqli_num_rows($queryListhc);
if ($queryListhc) {
  while ($rowhc = mysqli_fetch_array($queryListhc)) {
  $Tabla = $rowhc['name'];
  }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  $Tabla where id = $historiaClinica1");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $cliente_id      = $rowMotorizado['cliente_id'];
    $usuario_id      = $rowMotorizado['usuario_id'];
                // formatos
    $REGISTRO_EXTERNO = $rowMotorizado['xregistroc607'];
    $REGISTRO_EPICRISIS = $rowMotorizado['xregistroe396'];
    $REGISTRO_INTERCONSULTA = $rowMotorizado['xregistroi329'];
    $REGISTRO_EMERGENCIA = $rowMotorizado['xregistroe605'];
    $REGISTRO_LABORATORIO = $rowMotorizado['xregistrol523'];
    $REGISTRO_IMAGENOLOGIA = $rowMotorizado['xregistroi376'];
    $REGISTRO_IMAGENOLOGIA_INFORME  = $rowMotorizado['xregistroi298'];
    $REGISTRO_INTERCONSULTA_INFORME = $rowMotorizado['xregistroi168'];
    $REGISTRO_LABORATORIO_INFORME = $rowMotorizado['xregistrol692'];

    $REGISTRO_053= $rowMotorizado['xtipo968'];
    $REGISTRO_0532= $rowMotorizado['xreferenci769'];


    if ($REGISTRO_EXTERNO<>'') {
      $REGISTRO_EXTERNO='';
    }else{$REGISTRO_EXTERNO='display: none';}

    if ($REGISTRO_EPICRISIS<>'') {
      $REGISTRO_EPICRISIS='';
    }else{$REGISTRO_EPICRISIS='display: none';}

    if ($REGISTRO_INTERCONSULTA<>'') {
      $REGISTRO_INTERCONSULTA='';
    }else{$REGISTRO_INTERCONSULTA='display: none;';}

    if ($REGISTRO_EMERGENCIA<>'') {
      $REGISTRO_EMERGENCIA='';
    }else{$REGISTRO_EMERGENCIA='display: none;';}

    if ($REGISTRO_LABORATORIO<>'') {
      $REGISTRO_LABORATORIO='';
    }else{$REGISTRO_LABORATORIO='display: none;';}

    if ($REGISTRO_IMAGENOLOGIA<>'') {
      $REGISTRO_IMAGENOLOGIA='';
    }else{$REGISTRO_IMAGENOLOGIA='display: none;';}

    if ($REGISTRO_IMAGENOLOGIA_INFORME<>'') {
      $REGISTRO_IMAGENOLOGIA_INFORME='';
    }else{$REGISTRO_IMAGENOLOGIA_INFORME='display: none;';}

    if ($REGISTRO_INTERCONSULTA_INFORME<>'') {
      $REGISTRO_INTERCONSULTA_INFORME='';
    }else{$REGISTRO_INTERCONSULTA_INFORME='display: none;';}

    if ($REGISTRO_LABORATORIO_INFORME<>'') {
      $REGISTRO_LABORATORIO_INFORME='';
    }else{$REGISTRO_LABORATORIO_INFORME='display: none;';}

    if ($REGISTRO_053<>'' or $REGISTRO_0532<>'') {
      $REGISTRO_053='';
    }else{$REGISTRO_053='display: none;';}

  }
}


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
  $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le ha sugerido firmar esta historia clinica, para proceder abrir el siguiente link ' . $Base . 'firma/firmardocumento/' . $historiaClinica1 . '/'.$Tabla.'/' . $cliente_id;
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

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>cPacientes?iCr=<?= encrypt($idHistoria); ?>">
        <i class="fa fa-heartbeat"></i> Nueva Consulta
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>agregarCitas?cI=<?= encrypt($cliente_id); ?>">
        <i class="fa fa-calendar-check-o"></i> Agregar Cita
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>SclienteAdministracion_facturas">
        <i class="fa fa-plus"></i> Facturas
      </a>


    </div>

    <hr>


    <div align="center">
    <a style="<?php echo "$REGISTRO_EXTERNO" ?>" class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base;?>imprimir002.php?iC=<?php echo encrypt($historiaClinica1)?>&iCr=<?php echo encrypt($idHistoria) ?>"> 
      <i class="fa fa-print"></i> CONSULTA EXTERNA - ANAMNESIS Y EF
    </a>
    <a style="<?php echo "$REGISTRO_EXTERNO" ?>" class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base;?>imprimir003.php?iC=<?php echo encrypt($historiaClinica1)?>&iCr=<?php echo encrypt($idHistoria) ?>"> 
      <i class="fa fa-print"></i> ANAMNESIS - EXAMEN FISICO
    </a>
    <!-- <a style="<?php echo "$REGISTRO_EXTERNO" ?>" class="btn btn-app" target="_blank" href="<?php echo $Base;?>imprimir003E.php?historiaClinica=<?php echo $historiaClinica1?>&idHistoria=<?php echo $idHistoria ?>"> 
      <i class="fa fa-print"></i> EXAMEN FISICO
    </a> -->
  </div>



    <hr>


    <div align="center">

         <a style="<?php echo "$REGISTRO_EPICRISIS" ?>" class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base;?>imprimir006.php?iC=<?php echo encrypt($historiaClinica1)?>&iCr=<?php echo encrypt($idHistoria) ?>"> 
      <i class="fa fa-print"></i> Imprimir EPICRISIS
    </a>

    <a style="<?php echo "$REGISTRO_INTERCONSULTA" ?>" class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base;?>imprimir007.php?iC=<?php echo encrypt($historiaClinica1)?>&iCr=<?php echo encrypt($idHistoria) ?>"> 
      <i class="fa fa-print"></i> Imprimir INTERCONSULTA
    </a>

    <a style="<?php echo "$REGISTRO_INTERCONSULTA_INFORME" ?>" class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base;?>imprimir007I.php?iC=<?php echo encrypt($historiaClinica1)?>&iCr=<?php echo encrypt($idHistoria) ?>"> 
      <i class="fa fa-print"></i> Imprimir INTERCONSULTA INFORME
    </a>

    <a style="<?php echo "$REGISTRO_EMERGENCIA" ?>" class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base;?>imprimir008.php?iC=<?php echo encrypt($historiaClinica1)?>&iCr=<?php echo encrypt($idHistoria) ?>"> 
      <i class="fa fa-print"></i> Imprimir EMERGENCIA
    </a>

    <a style="<?php echo "$REGISTRO_LABORATORIO" ?>" class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base;?>imprimir010S.php?iC=<?php echo encrypt($historiaClinica1)?>&iCr=<?php echo encrypt($idHistoria) ?>"> 
      <i class="fa fa-print"></i> Imprimir LABORATORIO
    </a>

    <a style="<?php echo "$REGISTRO_LABORATORIO_INFORME" ?>" class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base;?>imprimir010I.php?iC=<?php echo encrypt($historiaClinica1)?>&iCr=<?php echo encrypt($idHistoria) ?>"> 
      <i class="fa fa-print"></i> Imprimir LABORATORIO INFORME
    </a>

    <a style="<?php echo "$REGISTRO_IMAGENOLOGIA" ?>" class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base;?>imprimir012S.php?iC=<?php echo encrypt($historiaClinica1)?>&iCr=<?php echo encrypt($idHistoria) ?>"> 
      <i class="fa fa-print"></i> Imprimir IMAGENOLOGIA
    </a>

    <a style="<?php echo "$REGISTRO_IMAGENOLOGIA_INFORME" ?>" class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base;?>imprimir012I.php?iC=<?php echo encrypt($historiaClinica1)?>&iCr=<?php echo encrypt($idHistoria) ?>"> 
      <i class="fa fa-print"></i> Imprimir IMAGENOLOGIA INFORME
    </a>

    <a style="<?php echo "$REGISTRO_053" ?>" class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base;?>imprimir053.php?iC=<?php echo encrypt($historiaClinica1)?>&iCr=<?php echo encrypt($idHistoria) ?>"> 
      <i class="fa fa-print"></i> referencia, derivación, contrareferencia...
    </a>
    </div>


<br>


    <!--<div align="center" id="HistoriaPrincipal">
      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>ConfigEnviarConsulta.php?iC=<?= encrypt($historiaClinica1) ?>&iCr=<?=  encrypt($idHistoria) ?>">
        <i class="fa fa-send-o"></i> Enviar Consulta
      </a>

    </div>-->

    <!--<?php if ($idHistoria == "34") :
    $HistoriaFiltro="34";
    include 'configFinalizado_Opciones.php';
    echo "<style>#HistoriaPrincipal{display:none;}</style>";
    endif; ?>-->

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
        <!--<form action="<?php echo ($ruta) ?>" method="POST"
          name="formularioEnvioExamen">
          <button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow" name="Enviar_Firma"><i class="fa fa-pencil-square-o"></i>Solicitar
            Firma</button>
         </form>-->

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