<?php
include '../funciones/funciones.php';

$nt = base64_decode($_GET['nombretabla']);
$ci = base64_decode($_GET['campoid']);
$id = $_GET['id'];

function Encriptar($valor)
{
    $Sc = base64_decode("Medical");
    //$Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
    $Texto = (openssl_encrypt($valor, "AES-256-CBC", $Sc));
    return base64_encode($Texto);
}

function Desencriptar($valor)
{
    $Sc = base64_decode("Medical");
    //$Texto = (openssl_decrypt(urldecode($valor), "AES-256-CBC", $Sc));
    $Texto = openssl_decrypt(($valor), "AES-256-CBC", $Sc);
    return $Texto;
}

$nombretabla=Desencriptar($nt);
$campoid=Desencriptar($ci);

$queryList=mysqli_query($conn3,"SELECT Firma FROM $nombretabla where Firma != '' AND $campoid = '$id'");
// $nrowl=mysqli_num_rows($queryList);
if ($queryList) {
  while($rowMotorizado=mysqli_fetch_array($queryList))
  {
    $firma = $rowMotorizado['Firma']; 
  }
}


if (strlen($firma)>10) 
{
      echo "<script>alert('Su firma ya ha sido Registrada');window.location='".$Base."FirmasPacientes/FirmaFinalizado.php'</script>";
}

if(isset($_POST['Guardar_Firma']))
{ 

  $dataURL    = $_POST['tarea'];

  $nombre  = mysqli_real_escape_string($conn3,$_POST['nombre']);
  $documento  = mysqli_real_escape_string($conn3,$_POST['documento']);

  $nombretabla  = Desencriptar($_POST['nt']);
  $campoid  = Desencriptar($_POST['ci']);
  $id  = $_POST['id'];
   
  mysqli_query($conn3,"update {$nombretabla} set Firma = '$dataURL', Firma_Informacion='Nombre : {$nombre} <br> Documento :{$documento}' where {$campoid} = '$id' ");

  echo "<script>alert('Su firma ya ha sido Registrada');window.location='".$Base."FirmasPacientes/FirmaFinalizado.php'</script>";
}




?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Modulo de Firma</title>
  <meta name="description" content="Modulo de Firma">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <link rel="stylesheet" href="<?php echo $Base;?>firma/css/signature-pad.css">
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
  <div id="signature-pad" class="signature-pad">
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
      </div>
    </div>
    <font size="1"> 
      <div id="div-mostrarFimra" align="center"></div>
    </font>

    <div align="center">
      <br><hr><br>
      <form action="../../../FirmarDocumento/1/1/1" method="POST">
        <input type="hidden"  name="tarea" id="tarea"    required>
        <input type="hidden"  name="nt" value="<?php echo $nt?>">
        <input type="hidden"  name="ci" value="<?php echo $ci?>">
        <input type="hidden"  name="id" value="<?php echo $id?>">
        <input type="hidden"  name="idOperacion" id="idOperacion"  value="<?php echo $idOperacion;?>"  required>

        <label>Nombre</label>
        <input type="text" class="form-control input-lg"  name="nombre" id="nombre"    required>
   
        <label>Documento</label>
        <input type="text" class="form-control input-lg"  name="documento" id="documento"    required>
        <br> 
   
        <button type="submit" class="boton_personalizado" name="Guardar_Firma" ><h4> Paso 2 - Guardar </h4></button>
      </form>
    </div>
  </div>

  <script src="<?php echo $Base;?>firma/js/signature_pad.umd.js"></script>
  <script src="<?php echo $Base;?>firma/js/app.js"></script>
</body>
</html>