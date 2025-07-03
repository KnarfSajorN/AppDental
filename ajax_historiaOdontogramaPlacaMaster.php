<?php
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
include("funciones/conn3.php");
include("funciones/funciones.php");


// include("funcionesOdontograma.php");

 
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

// if ($_POST['parte18']) {$parte  = $_POST['parte18'];}
// if ($_POST['parte17']) {$parte  = $_POST['parte17'];}
// if ($_POST['parte16']) {$parte  = $_POST['parte16'];}
// if ($_POST['parte15']) {$parte  = $_POST['parte15'];}
// if ($_POST['parte14']) {$parte  = $_POST['parte14'];}
// if ($_POST['parte13']) {$parte  = $_POST['parte13'];}
// if ($_POST['parte12']) {$parte  = $_POST['parte12'];}
// if ($_POST['parte11']) {$parte  = $_POST['parte11'];}
// if ($_POST['parte28']) {$parte  = $_POST['parte28'];}
// if ($_POST['parte27']) {$parte  = $_POST['parte27'];}
// if ($_POST['parte26']) {$parte  = $_POST['parte26'];}
// if ($_POST['parte25']) {$parte  = $_POST['parte25'];}
// if ($_POST['parte24']) {$parte  = $_POST['parte24'];}
// if ($_POST['parte23']) {$parte  = $_POST['parte23'];}
// if ($_POST['parte22']) {$parte  = $_POST['parte22'];}
// if ($_POST['parte21']) {$parte  = $_POST['parte21'];}
// if ($_POST['parte55']) {$parte  = $_POST['parte55'];}
// if ($_POST['parte54']) {$parte  = $_POST['parte54'];}
// if ($_POST['parte53']) {$parte  = $_POST['parte53'];}
// if ($_POST['parte52']) {$parte  = $_POST['parte52'];}
// if ($_POST['parte51']) {$parte  = $_POST['parte51'];}
// if ($_POST['parte65']) {$parte  = $_POST['parte65'];}
// if ($_POST['parte64']) {$parte  = $_POST['parte64'];}
// if ($_POST['parte63']) {$parte  = $_POST['parte63'];}
// if ($_POST['parte62']) {$parte  = $_POST['parte62'];}
// if ($_POST['parte61']) {$parte  = $_POST['parte61'];}
// if ($_POST['parte85']) {$parte  = $_POST['parte85'];}
// if ($_POST['parte84']) {$parte  = $_POST['parte84'];}
// if ($_POST['parte83']) {$parte  = $_POST['parte83'];}
// if ($_POST['parte82']) {$parte  = $_POST['parte82'];}
// if ($_POST['parte81']) {$parte  = $_POST['parte81'];}
// if ($_POST['parte75']) {$parte  = $_POST['parte75'];}
// if ($_POST['parte74']) {$parte  = $_POST['parte74'];}
// if ($_POST['parte73']) {$parte  = $_POST['parte73'];}
// if ($_POST['parte72']) {$parte  = $_POST['parte72'];}
// if ($_POST['parte71']) {$parte  = $_POST['parte71'];}
// if ($_POST['parte48']) {$parte  = $_POST['parte48'];}
// if ($_POST['parte47']) {$parte  = $_POST['parte47'];}
// if ($_POST['parte46']) {$parte  = $_POST['parte46'];}
// if ($_POST['parte45']) {$parte  = $_POST['parte45'];}
// if ($_POST['parte44']) {$parte  = $_POST['parte44'];}
// if ($_POST['parte43']) {$parte  = $_POST['parte43'];}
// if ($_POST['parte42']) {$parte  = $_POST['parte42'];}
// if ($_POST['parte41']) {$parte  = $_POST['parte41'];}
// if ($_POST['parte38']) {$parte  = $_POST['parte38'];}
// if ($_POST['parte37']) {$parte  = $_POST['parte37'];}
// if ($_POST['parte36']) {$parte  = $_POST['parte36'];}
// if ($_POST['parte35']) {$parte  = $_POST['parte35'];}
// if ($_POST['parte34']) {$parte  = $_POST['parte34'];}
// if ($_POST['parte33']) {$parte  = $_POST['parte33'];}
// if ($_POST['parte32']) {$parte  = $_POST['parte32'];}
// if ($_POST['parte31']) {$parte  = $_POST['parte31'];}

$parte  = $_POST['parte'];

$idCliente = $_POST['idCliente'];
$idUsuario = $_POST['idUsuario'];
$idPlaca = $_POST['idPlaca'];
$servicioAplicado = 34;


// if ($_POST['pze18'])  {  $pieza  = $_POST['pze18']; }
// if ($_POST['pze17']){ $pieza  = $_POST['pze17']; }
// if ($_POST['pze16']){ $pieza  = $_POST['pze16'];}
// if ($_POST['pze15']){ $pieza = $_POST['pze15'];}
// if ($_POST['pze14']){ $pieza = $_POST['pze14'];}
// if ($_POST['pze13']){ $pieza = $_POST['pze13']; }
// if ($_POST['pze12']){ $pieza = $_POST['pze12'];}
// if ($_POST['pze11']){ $pieza = $_POST['pze11'];}
// if ($_POST['pze28']){ $pieza = $_POST['pze28'];}
// if ($_POST["pze27"]){ $pieza = $_POST['pze27']; }
// if ($_POST['pze26']){ $pieza = $_POST['pze26'];}
// if ($_POST['pze25']){ $pieza = $_POST['pze25'];}
// if ($_POST['pze24']) { $pieza = $_POST['pze24'];}
// if ($_POST['pze23']) { $pieza = $_POST['pze23'];}
// if ($_POST['pze22']) {$pieza = $_POST['pze22']; }
// if ($_POST["pze21"]) { $pieza = $_POST['pze21'];}
// if ($_POST["pze48"]) { $pieza = $_POST['pze48'];}
// if ($_POST["pze47"]) {$pieza = $_POST['pze47'];}
// if ($_POST["pze46"]){$pieza = $_POST['pze46'];}
// if ($_POST["pze45"]) { $pieza = $_POST["pze45"];}
// if ($_POST["pze44"]){ $pieza = $_POST['pze44']; }
// if ($_POST["pze43"]){ $pieza =  $_POST['pze43'];}
// if ($_POST["pze42"]){ $pieza =  $_POST['pze42']; }
// if ($_POST["pze41"]){ $pieza = $_POST["pze41"];}
// if ($_POST["pze38"]){ $pieza = $_POST["pze38"];}
// if ($_POST["pze37"]){ $pieza = $_POST["pze37"];}
// if ($_POST["pze36"]){ $pieza = $_POST["pze36"]; }
// if ($_POST["pze35"]){ $pieza = $_POST["pze35"]; }
// if ($_POST["pze34"]){ $pieza = $_POST["pze34"]; }
// if ($_POST["pze33"]){ $pieza = $_POST['pze33']; }
// if ($_POST["pze32"]){ $pieza = $_POST["pze32"]; }
// if ($_POST["pze31"]){ $pieza = $_POST["pze31"]; }
// if ($_POST["pze55"]){ $pieza = $_POST["pze55"]; }
// if ($_POST["pze54"]){ $pieza = $_POST["pze54"]; }
// if ($_POST["pze53"]){ $pieza = $_POST["pze53"]; }
// if ($_POST["pze52"]){ $pieza = $_POST["pze52"]; }
// if ($_POST["pze51"]){ $pieza = $_POST['pze51']; }
// if($_POST['pze65']){ $pieza = $_POST['pze65']; }
// if($_POST['pze64']){ $pieza = $_POST['pze64']; }
// if($_POST['pze63']){ $pieza = $_POST['pze63']; }
// if($_POST['pze62']){ $pieza = $_POST['pze62']; }
// if($_POST['pze61']){ $pieza = $_POST['pze61']; }
// if ($_POST["pze85"]){ $pieza = $_POST["pze85"];}
// if ($_POST["pze84"]){ $pieza = $_POST['pze84'];}
// if ($_POST["pze83"]){ $pieza = $_POST['pze83'];}
// if ($_POST['pze82']){ $pieza = $_POST["pze82"];}
// if ($_POST['pze81']){ $pieza = $_POST['pze81'];}
// if ($_POST['pze75']){ $pieza = $_POST['pze75'];}
// if ($_POST['pze74']){ $pieza = $_POST['pze74'];}
// if ($_POST['pze73']){ $pieza = $_POST['pze73'];}
// if ($_POST['pze72']){ $pieza = $_POST['pze72'];}
// if ($_POST['pze71']){ $pieza = $_POST['pze71'];}


$pieza = $_POST['pze'];

/* validacion de la piezas*/
 switch ($pieza)
 {
    case 1:
         $respuesta =  "Vestibular";
    break;
    case 2:
          $respuesta = "Mesial";
    break;
    case 3:
        $respuesta = "Lingual";
    break;
    case 4:
        $respuesta = "Distal";
    break;
    case 5:
        $respuesta = "Oclusal";
    break;

 }
 
$parteDetalleog           = $parte;
$parteAplicada            = $pieza;
$parteAplicadaDetalleq    = $parteAplicada;
 
    $query_ap=mysqli_query($conn3,"SELECT * from odontogramaMasterPlaca where idCliente = $idCliente  and id = $idPlaca");
    $nrowl=mysqli_num_rows($query_ap);
    while($row_alp=mysqli_fetch_array($query_ap))
    {
      $idPzaQuery = 'o'.$parteDetalleog;
          $parteAplicadaDetalle = explode(",", $row_alp[$idPzaQuery]);
    }

if ($parteAplicadaDetalle[0] == '') { $parteAplicadaDetalle[0] = '0';}
if ($parteAplicadaDetalle[1] == '') { $parteAplicadaDetalle[1] = '0';}
if ($parteAplicadaDetalle[2] == '') { $parteAplicadaDetalle[2] = '0';}
if ($parteAplicadaDetalle[3] == '') { $parteAplicadaDetalle[3] = '0';}
if ($parteAplicadaDetalle[4] == '') { $parteAplicadaDetalle[4] = '0';}
if ($parteAplicadaDetalle[5] == '') { $parteAplicadaDetalle[5] = '0';}
 
if ($parteAplicada == 0) 
{
$parteAplicada = '0'.','.$servicioAplicado.','.$servicioAplicado.','.$servicioAplicado.','.$servicioAplicado.','.$servicioAplicado;
 
}

elseif ($parteAplicada == 1) 
{
$parteAplicada = $parteAplicadaDetalle[0].','.$servicioAplicado.','.$parteAplicadaDetalle[2].','.$parteAplicadaDetalle[3].','.$parteAplicadaDetalle[4].','.$parteAplicadaDetalle[5];  
}
elseif ($parteAplicada == 2) 
{
$parteAplicada = $parteAplicadaDetalle[0].','.$parteAplicadaDetalle[1].','.$servicioAplicado.','.$parteAplicadaDetalle[3].','.$parteAplicadaDetalle[4].','.$parteAplicadaDetalle[5];  
}
elseif ($parteAplicada == 3) 
{
$parteAplicada = $parteAplicadaDetalle[0].','.$parteAplicadaDetalle[1].','.$parteAplicadaDetalle[2].','.$servicioAplicado.','.$parteAplicadaDetalle[4].','.$parteAplicadaDetalle[5];  
}
elseif ($parteAplicada == 4) 
{
$parteAplicada = $parteAplicadaDetalle[0].','.$parteAplicadaDetalle[1].','.$parteAplicadaDetalle[2].','.$parteAplicadaDetalle[3].','.$servicioAplicado.','.$parteAplicadaDetalle[5]; 
}
elseif ($parteAplicada == 5) 
{
$parteAplicada = $parteAplicadaDetalle[0].','.$parteAplicadaDetalle[1].','.$parteAplicadaDetalle[2].','.$parteAplicadaDetalle[3].','.$parteAplicadaDetalle[4].','.$servicioAplicado;  
}


mysqli_query($conn3,"UPDATE odontogramaMasterPlaca set $idPzaQuery = '$parteAplicada' where idCliente = $idCliente and id = $idPlaca");
 
 //echo "update odontogramaMasterPlaca set $idPzaQuery = '$parteAplicada' where idCliente = $idCliente and id = $idPlaca";


$fecha = date("Y-m-d");
$hora = date("h:i:s");

 
 
echo '<font color ="green" size = "3"><strong>NUEVO detalle Grabado</strong>:Aplicada a  '.$parte. '  </font><br>';

  
 
?>

