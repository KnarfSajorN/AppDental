<?php
include '../funciones/funciones.php';
/*include '../../masterFunciones_ec337.php';*/

$idOperacion = $_GET['idOperacion'];
$idAbono = $_GET['idAbono'];


$queryList=mysqli_query($conn3,"SELECT firma FROM  abonoP where firma != '' AND id = '$idAbono'");
// echo "SELECT firma FROM  abonoP where firma != '' AND id = '$idAbono'";
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
  $firma = $rowMotorizado['firma']; 
}

if (strlen($firma)>10) 
{
      echo "<script>alert('Su firma ya ha sido Registrada');window.location='".$Base."firma/FirmaFinalizado.php'</script>";
}

$montoAbonado = funcionMaster($idAbono,'id','valor_abonado','abonoP');
$usuario = funcionMaster($idAbono,'id','usuario_id','abonoP');
$moneda = funcionMaster($usuario,'ID_Usuario','moneda','config');

?>
<script>
    console.log($montoAbonado);
    console.log($usuario);
    console.log($moneda);
</script>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Modulo de Firma</title>
  <meta name="description" content="Modulo de Firma">

  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">

  <link rel="stylesheet" href="<?= $Base ?>firma/css/signature-pad.css">

  <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="css/ie9.css">
  <![endif]-->

<style type="text/css">
  .boton_personalizado{
    text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 15px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #0016b0;
  }
  .boton_personalizado:hover{
    color: #1883ba;
    background-color: #ffffff;
  }



    .boton_personalizado2{
    text-decoration: none;
    padding: 5px;
    font-weight: 600;
    font-size: 10px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #0016b0;
  }
  .boton_personalizado2:hover{
    color: #1883ba;
    background-color: #ffffff;
  }
</style>


  
</head>

<body onselectstart="return false">
    <?php
// echo var_dump($montoAbonado);
?>
  <div id="signature-pad" class="signature-pad">
    <h1>El monto cancelado es de : <?php echo $montoAbonado.' '.$moneda?></h1>
    <div align="center"  class="signature-pad--actions">
        <div>
          <button  type="button" class="boton_personalizado2" data-action="clear">Borrar</button>

           <button type="hidden" class="boton_personalizado2" data-action="change-color">Cambiar Color</button> 

          <button type="button" class="boton_personalizado2" data-action="undo">Borrar ultimo traso</button>
         </div> 

      </div> 
    <div class="signature-pad--body">
      <canvas></canvas>
    </div>
    <div class="signature-pad--footer">



      <div align="center" class="description">Firmar</div>

      
 <div>

          <br> 
          
          <button type="button" class="boton_personalizado" data-action="save-png">Paso 1 - Guardar Firma</button>
        


<!--
          <button type="button" class="button save" data-action="save-jpg">Save as JPG</button>
          <button type="button" class="button save" data-action="save-svg">Save as SVG</button>
-->

        </div>

    </div>
 <font size="1"> 
 <div id="div-mostrarFimra" align="center"></div>
</font>
 

 
<div align="center">
  <br>
<hr>
  <br>
 
<form action="<?= $Base ?>firma/AbonoFirmadoP" method="POST">
 

<input type="hidden"  name="tarea" id="tarea"    required>
<input type="hidden"  name="idAbono" id="idAbono"  value="<?php echo $idAbono;?>"  required>
<input type="hidden"  name="idOperacion" id="idOperacion"  value="<?php echo $idOperacion;?>"  required>

Nombre
<input type="text" class="form-control input-lg"  name="nombre" id="nombre"    required>
 
Documento
<input type="text" class="form-control input-lg"  name="documento" id="nombre"    required>

<br> 
 
<button type="submit" class="boton_personalizado" ><h4> Paso 2 - Guardar </h4></button>
 
 </form>



</div>
  </div>








  <script src="<?= $Base ?>firma/js/signature_pad.umd.js"></script>
  <script src="<?= $Base ?>firma/js/app.js"></script>
</body>
</html>


<script type="text/javascript">

</script>