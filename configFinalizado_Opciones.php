<?php

if (isset($_GET['tipo'])) {

  $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where ID = $historiaClinica1");
  $nrowl = mysqli_num_rows($queryList);
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $cliente_id = $rowMotorizado['cliente_id'];
    $usuario_id      = $rowMotorizado['usuario_id'];
    // $receta     = $rowMotorizado['receta'];
  }

  $whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
  $nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');

  $tipo = $_GET['tipo'];

  if($tipo=="audiologia"){
    $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le envia el siguiente documento registrado en la consulta ' . $Base . "EA_Imprimir_General.php?historiaClinica={$historiaClinica1}&idHistoria={$idHistoria}";
  $accion = 0;
  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

  echo "<script language='Javascript'> window.location='cFinalizado?iC=".encrypt($historiaClinica1)."&iCr=".encrypt($idHistoria)."';</script>";
  }
  

}

if($HistoriaFiltro=="34"){

    echo "<div align='center'>
    <a class='btn btn-outline-info btn-lg rounded-pill shadow' target='_blank' href='{$Base}EA_Imprimir_General.php?historiaClinica={$historiaClinica1}&idHistoria={$idHistoria}'> 
    <i class='fa fa-print'></i> Imprimir Evaluación Audiologica
    </a>
</div>";
    echo "<div align='center'>
    <hr>
  </div>";
    echo "<div align='center'>
    <a class='btn btn-outline-info btn-lg rounded-pill shadow' target='_blank' href='{$Base}EA_Imprimir_Graficas.php?historiaClinica={$historiaClinica1}&idHistoria={$idHistoria}&Tipo=Audiometria'> 
    <i class='fa fa-print'></i> Imprimir Gráfica Audiometría
    </a>

    <a class='btn btn-outline-info btn-lg rounded-pill shadow' target='_blank' href='{$Base}EA_Imprimir_Graficas.php?historiaClinica={$historiaClinica1}&idHistoria={$idHistoria}&Tipo=Logoaudiometria'> 
    <i class='fa fa-print'></i> Imprimir Gráfica Logoaudiometría
    </a>

    <a class='btn btn-outline-info btn-lg rounded-pill shadow' target='_blank' href='{$Base}EA_Imprimir_Graficas.php?historiaClinica={$historiaClinica1}&idHistoria={$idHistoria}&Tipo=Timpanograma'> 
    <i class='fa fa-print'></i> Imprimir Gráfica Timpanograma
    </a>


  <div align='center'>
    <hr>
  </div>

  <a class='btn btn-outline-info btn-lg rounded-pill shadow' target='_blank' href='{$Base}EA_Imprimir_Graficas.php?historiaClinica={$historiaClinica1}&idHistoria={$idHistoria}&Tipo=AltaFrecuencia'> 
  <i class='fa fa-print'></i> Imprimir Gráfica Alta Frecuencia
  </a>
    <a class='btn btn-outline-info btn-lg rounded-pill shadow' target='_blank' href='{$Base}EA_Imprimir_Graficas.php?historiaClinica={$historiaClinica1}&idHistoria={$idHistoria}&Tipo=AltaFrecuencia_1'> 
    <i class='fa fa-print'></i> Imprimir Gráfica Alta Multifrecuencia
    </a>

    <a class='btn btn-outline-info btn-lg rounded-pill shadow' target='_blank' href='{$Base}EA_Imprimir_Graficas.php?historiaClinica={$historiaClinica1}&idHistoria={$idHistoria}&Tipo=Ganancia '> 
    <i class='fa fa-print'></i> Imprimir Gráfica Ganancia
    </a>
    
    
    <div align='center'>
    <hr>
  </div>
  ";
    ?>


    <?php 
        $botonesImprimir = [
          ['Evaluación Audiologica', base64_encode($Base.'EA_Imprimir_General_plantilla.php?iC='.encrypt($historiaClinica1).'&iCr='.encrypt($idHistoria).'')],         
        ];
        $_GET['botones'] = base64_encode(json_encode($botonesImprimir));
        include './creadorImpresiones/seleccionarMetodoImpresion.php';
      ?>

<div align="center" id="">
 <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>cFinalizado?iC=<?= encrypt($historiaClinica1) ?>&iCr=<?=  encrypt($idHistoria) ?>&tipo=audiologia">
   <i class="fa fa-print"></i> Enviar Consulta
 </a>
</div>

<?php

    echo"
</div>";
?>
 

<?php
}



?>