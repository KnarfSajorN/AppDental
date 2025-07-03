<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/funciones.php");


$con = conectar();


$cliente   = $_POST['cliente_id'];
$pieza    = $_POST['pieza'];
$vestibular = $_POST['vestibular'];
$Mesial = $_POST['Mesial'];
$Lingual = $_POST['Lingual'];
$Distal = $_POST['Distal'];
$Oclusal = $_POST['Oclusal'];
$usuario_id = $_POST['usuario_id'];

$fechaO                = date("Y-m-d");
$horaO                  = date("H:i:s");



if ($vestibular == '') {
  $vestibular = 0;
}
if ($Mesial == '') {
  $Mesial = 0;
}
if ($Lingual == '') {
  $Lingual = 0;
}
if ($Distal == '') {
  $Distal = 0;
}
if ($Oclusal == '') {
  $Oclusal = 0;
}




if ($pieza >=  'o11' and $pieza <= 'o18') {
  $valores = '0,' . $vestibular . ',' . $Distal . ',' . $Oclusal . ',' . $Mesial . ',' . $Lingual;
}
if ($pieza >=  'o51' and $pieza <= 'o55') {
  $valores = '0,' . $vestibular . ',' . $Distal . ',' . $Oclusal . ',' . $Mesial . ',' . $Lingual;
}


if ($pieza >=  'o21' and $pieza <= 'o28') {
  $valores = '0,' . $vestibular . ',' . $Mesial . ',' . $Oclusal . ',' . $Distal . ',' . $Lingual;
}
if ($pieza >=  'o61' and $pieza <= 'o65') {
  $valores = '0,' . $vestibular . ',' . $Mesial . ',' . $Oclusal . ',' . $Distal . ',' . $Lingual;
}



if ($pieza >=  'o31' and $pieza <= 'o38') {
  $valores = '0,' . $Lingual . ',' . $Mesial . ',' . $Oclusal . ',' . $Distal . ',' . $vestibular;
}
if ($pieza >=  'o71' and $pieza <= 'o75') {
  $valores = '0,' . $Lingual . ',' . $Mesial . ',' . $Oclusal . ',' . $Distal . ',' . $vestibular;
}



if ($pieza >=  'o41' and $pieza <= 'o48') {
  $valores = '0,' . $Lingual . ',' . $Distal . ',' . $Oclusal . ',' . $Mesial . ',' . $vestibular;
}
if ($pieza >=  'o81' and $pieza <= 'o85') {
  $valores = '0,' . $Lingual . ',' . $Distal . ',' . $Oclusal . ',' . $Mesial . ',' . $vestibular;
}







$queryList1 = mysqli_query($conn3, "SELECT * FROM piezas_estado  where  cliente=$cliente and pieza= '$pieza'");
$nrowl1 = mysqli_num_rows($queryList1);
while ($rowMotorizado = mysqli_fetch_array($queryList1)) {
  $id = $rowMotorizado['id'];
}
if ($nrowl1 == '') {


  mysqli_query($conn3, "INSERT INTO piezas_estado(pieza, vestibular, mesial, lingual, distal, oclusal , cliente ) VALUES ('$pieza', '$vestibular' ,'$Mesial', '$Lingual', '$Distal', '$Oclusal', '$cliente');");
} else {
  echo '<h5><b>PIEZA VALORADA, SOLO EDITAR <font color="#04CC05"> <a href="OdontogramaInicial.php?clienteId=' . $cliente . '&editar_estado=' . $id . '&usuario_id=' . $usuario_id . '" target="blank"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i>  </a></font></b></h5>';
}

$queryList = mysqli_query($conn3, "SELECT * FROM odontogramaMasterHistoria WHERE  idCliente = $cliente");
$nrowlc = mysqli_num_rows($queryList);


if ($nrowlc == '') {


  mysqli_query($conn3, "INSERT INTO odontogramaMasterHistoria (fecha, hora , idCliente, idUsuario ) VALUES ('$fechaO', '$horaO' ,'$cliente', '$usuario_id' );");;
}

mysqli_query($conn3, "UPDATE odontogramaMasterHistoria SET  
    $pieza ='$valores'
     WHERE idCliente = '$cliente' ");




echo '<h3><b>Guardado</b></h3>';
    

/*echo "<script language='Javascript'> window.location='odontograma.php?clienteId=$cliente';</script>"; */
