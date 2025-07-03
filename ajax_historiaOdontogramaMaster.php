<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");


// include("funcionesOdontograma.php");

 
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

if ($_POST['parte18']) {$parte  = $_POST['parte18'];}
if ($_POST['parte17']) {$parte  = $_POST['parte17'];}
if ($_POST['parte16']) {$parte  = $_POST['parte16'];}
if ($_POST['parte15']) {$parte  = $_POST['parte15'];}
if ($_POST['parte14']) {$parte  = $_POST['parte14'];}
if ($_POST['parte13']) {$parte  = $_POST['parte13'];}
if ($_POST['parte12']) {$parte  = $_POST['parte12'];}
if ($_POST['parte11']) {$parte  = $_POST['parte11'];}

if ($_POST['parte28']) {$parte  = $_POST['parte28'];}
if ($_POST['parte27']) {$parte  = $_POST['parte27'];}
if ($_POST['parte26']) {$parte  = $_POST['parte26'];}
if ($_POST['parte25']) {$parte  = $_POST['parte25'];}
if ($_POST['parte24']) {$parte  = $_POST['parte24'];}
if ($_POST['parte23']) {$parte  = $_POST['parte23'];}
if ($_POST['parte22']) {$parte  = $_POST['parte22'];}
if ($_POST['parte21']) {$parte  = $_POST['parte21'];}

if ($_POST['parte55']) {$parte  = $_POST['parte55'];}
if ($_POST['parte54']) {$parte  = $_POST['parte54'];}
if ($_POST['parte53']) {$parte  = $_POST['parte53'];}
if ($_POST['parte52']) {$parte  = $_POST['parte52'];}
if ($_POST['parte51']) {$parte  = $_POST['parte51'];}

if ($_POST['parte65']) {$parte  = $_POST['parte65'];}
if ($_POST['parte64']) {$parte  = $_POST['parte64'];}
if ($_POST['parte63']) {$parte  = $_POST['parte63'];}
if ($_POST['parte62']) {$parte  = $_POST['parte62'];}
if ($_POST['parte61']) {$parte  = $_POST['parte61'];}
 

if ($_POST['parte85']) {$parte  = $_POST['parte85'];}
if ($_POST['parte84']) {$parte  = $_POST['parte84'];}
if ($_POST['parte83']) {$parte  = $_POST['parte83'];}
if ($_POST['parte82']) {$parte  = $_POST['parte82'];}
if ($_POST['parte81']) {$parte  = $_POST['parte81'];}

if ($_POST['parte75']) {$parte  = $_POST['parte75'];}
if ($_POST['parte74']) {$parte  = $_POST['parte74'];}
if ($_POST['parte73']) {$parte  = $_POST['parte73'];}
if ($_POST['parte72']) {$parte  = $_POST['parte72'];}
if ($_POST['parte71']) {$parte  = $_POST['parte71'];}
 

if ($_POST['parte48']) {$parte  = $_POST['parte48'];}
if ($_POST['parte47']) {$parte  = $_POST['parte47'];}
if ($_POST['parte46']) {$parte  = $_POST['parte46'];}
if ($_POST['parte45']) {$parte  = $_POST['parte45'];}
if ($_POST['parte44']) {$parte  = $_POST['parte44'];}
if ($_POST['parte43']) {$parte  = $_POST['parte43'];}
if ($_POST['parte42']) {$parte  = $_POST['parte42'];}
if ($_POST['parte41']) {$parte  = $_POST['parte41'];}


if ($_POST['parte38']) {$parte  = $_POST['parte38'];}
if ($_POST['parte37']) {$parte  = $_POST['parte37'];}
if ($_POST['parte36']) {$parte  = $_POST['parte36'];}
if ($_POST['parte35']) {$parte  = $_POST['parte35'];}
if ($_POST['parte34']) {$parte  = $_POST['parte34'];}
if ($_POST['parte33']) {$parte  = $_POST['parte33'];}
if ($_POST['parte32']) {$parte  = $_POST['parte32'];}
if ($_POST['parte31']) {$parte  = $_POST['parte31'];}

   
    
$idCliente = $_POST['idCliente'];
$idUsuario = $_POST['idUsuario'];


if ($_POST['pze18'])  {  $pieza  = $_POST['pze18']; }

if ($_POST['pze17']){ $pieza  = $_POST['pze17']; }

if ($_POST['pze16']){ $pieza  = $_POST['pze16'];}

if ($_POST['pze15']){ $pieza = $_POST['pze15'];}

if ($_POST['pze14']){ $pieza = $_POST['pze14'];}

if ($_POST['pze13']){ $pieza = $_POST['pze13']; }

if ($_POST['pze12']){ $pieza = $_POST['pze12'];}

if ($_POST['pze11']){ $pieza = $_POST['pze11'];}

if ($_POST['pze28']){ $pieza = $_POST['pze28'];}

if ($_POST["pze27"]){ $pieza = $_POST['pze27']; }

if ($_POST['pze26']){ $pieza = $_POST['pze26'];}

if ($_POST['pze25']){ $pieza = $_POST['pze25'];}

if ($_POST['pze24']) { $pieza = $_POST['pze24'];}

if ($_POST['pze23']) { $pieza = $_POST['pze23'];}

if ($_POST['pze22']) {$pieza = $_POST['pze22']; }

if ($_POST["pze21"]) { $pieza = $_POST['pze21'];}

if ($_POST["pze48"]) { $pieza = $_POST['pze48'];}

if ($_POST["pze47"]) {$pieza = $_POST['pze47'];}

if ($_POST["pze46"]){$pieza = $_POST['pze46'];}

if ($_POST["pze45"]) { $pieza = $_POST["pze45"];}

if ($_POST["pze44"]){ $pieza = $_POST['pze44']; }

if ($_POST["pze43"]){ $pieza =  $_POST['pze43'];}

if ($_POST["pze42"]){ $pieza =  $_POST['pze42']; }

if ($_POST["pze41"]){ $pieza = $_POST["pze41"];}

if ($_POST["pze38"]){ $pieza = $_POST["pze38"];}

if ($_POST["pze37"]){ $pieza = $_POST["pze37"];}

if ($_POST["pze36"]){ $pieza = $_POST["pze36"]; }

if ($_POST["pze35"]){ $pieza = $_POST["pze35"]; }

if ($_POST["pze34"]){ $pieza = $_POST["pze34"]; }

if ($_POST["pze33"]){ $pieza = $_POST['pze33']; }

if ($_POST["pze32"]){ $pieza = $_POST["pze32"]; }

if ($_POST["pze31"]){ $pieza = $_POST["pze31"]; }

if ($_POST["pze55"]){ $pieza = $_POST["pze55"]; }


if ($_POST["pze54"]){ $pieza = $_POST["pze54"]; }

if ($_POST["pze53"]){ $pieza = $_POST["pze53"]; }

if ($_POST["pze52"]){ $pieza = $_POST["pze52"]; }

if ($_POST["pze51"]){ $pieza = $_POST['pze51']; }

if($_POST['pze65']){ $pieza = $_POST['pze65']; }


if($_POST['pze64']){ $pieza = $_POST['pze64']; }

if($_POST['pze63']){ $pieza = $_POST['pze63']; }

if($_POST['pze62']){ $pieza = $_POST['pze62']; }

if($_POST['pze61']){ $pieza = $_POST['pze61']; }

if ($_POST["pze85"]){ $pieza = $_POST["pze85"];}

if ($_POST["pze84"]){ $pieza = $_POST['pze84'];}


if ($_POST["pze83"]){ $pieza = $_POST['pze83'];}

if ($_POST['pze82']){ $pieza = $_POST["pze82"];}

if ($_POST['pze81']){ $pieza = $_POST['pze81'];}

if ($_POST['pze75']){ $pieza = $_POST['pze75'];}

if ($_POST['pze74']){ $pieza = $_POST['pze74'];}

if ($_POST['pze73']){ $pieza = $_POST['pze73'];}

if ($_POST['pze72']){ $pieza = $_POST['pze72'];}

if ($_POST['pze71']){ $pieza = $_POST['pze71'];}


/* validacion de la piezas*/
if($parte >=  '11' and $parte <= '18') {


 switch ($pieza)
 {
    case 1:
         $respuesta =  "Vestibular";
    break;
    case 2:
          $respuesta = "Distal";
    break;
    case 3:
        $respuesta = "Oclusal";
    break;
    case 4:
        $respuesta = "Mesial";
    break;
    case 5:
        $respuesta = "Lingual";
    break;

 }

}


if($parte >=  '51' and $parte <= '55') {


 switch ($pieza)
 {
    case 1:
         $respuesta =  "Vestibular";
    break;
    case 2:
          $respuesta = "Distal";
    break;
    case 3:
        $respuesta = "Oclusal";
    break;
    case 4:
        $respuesta = "Mesial";
    break;
    case 5:
        $respuesta = "Lingual";
    break;

 }

}


if($parte >=  '21' and $parte <= '28') {


 switch ($pieza)
 {
    case 1:
         $respuesta =  "Vestibular";
    break;
    case 2:
          $respuesta = "Mesial";
    break;
    case 3:
        $respuesta = "Oclusal";
    break;
    case 4:
        $respuesta = "Distal";
    break;
    case 5:
        $respuesta = "Lingual";
    break;

 }

}




if($parte >=  '61' and $parte <= '65') {


 switch ($pieza)
 {
    case 1:
         $respuesta =  "Vestibular";
    break;
    case 2:
          $respuesta = "Mesial";
    break;
    case 3:
        $respuesta = "Oclusal";
    break;
    case 4:
        $respuesta = "Distal";
    break;
    case 5:
        $respuesta = "Lingual";
    break;

 }

}













if($parte >=  '31' and $parte <= '38') {


 switch ($pieza)
 {
    case 1:
         $respuesta =  "Lingual";
    break;
    case 2:
          $respuesta = "Mesial";
    break;
    case 3:
        $respuesta = "Oclusal";
    break;
    case 4:
        $respuesta = "Distal";
    break;
    case 5:
        $respuesta = "Vestibular";
    break;

 }

}



if($parte >=  '71' and $parte <= '75') {


 switch ($pieza)
 {
    case 1:
         $respuesta =  "Lingual";
    break;
    case 2:
          $respuesta = "Mesial";
    break;
    case 3:
        $respuesta = "Oclusal";
    break;
    case 4:
        $respuesta = "Distal";
    break;
    case 5:
        $respuesta = "Vestibular";
    break;

 }

}







if($parte >=  '41' and $parte <= '48') {


 switch ($pieza)
 {
    case 1:
         $respuesta =  "Lingual";
    break;
    case 2:
          $respuesta = "Distal";
    break;
    case 3:
        $respuesta = "Oclusal";
    break;
    case 4:
        $respuesta = "Mesial";
    break;
    case 5:
        $respuesta = "Vestibular";
    break;

 }

}


if($parte >=  '81' and $parte <= '85') {


 switch ($pieza)
 {
    case 1:
         $respuesta =  "Lingual";
    break;
    case 2:
          $respuesta = "Distal";
    break;
    case 3:
        $respuesta = "Oclusal";
    break;
    case 4:
        $respuesta = "Mesial";
    break;
    case 5:
        $respuesta = "Vestibular";
    break;

 }

}



if($pieza == '') {


        $respuesta = "Toda la pieza";
   

}


/*pze18      = $_POST['pze18'];
$pze17     = $_POST['pze17'];
$pze16     = $_POST['pze16'];
$pze15     = $_POST['pze15'];
$pze14     = $_POST['pze14'];
$pze13     = $_POST['pze13'];
$pze12     = $_POST['pze12'];
$pze11     = $_POST['pze11'];
$pze28     = $_POST['pze28'];
$pze27     = $_POST['pze27'];
$pze26     = $_POST['pze26'];
$pze25     = $_POST['pze25'];
$pze24     = $_POST['pze24'];
$pze23     = $_POST['pze23'];
$pze22     = $_POST['pze22'];
$pze21     = $_POST['pze21'];
$pze48     = $_POST['pze48'];
$pze47     = $_POST['pze47'];
$pze46     = $_POST['pze46'];
$pze45     = $_POST['pze45'];
$pze44     = $_POST['pze44'];
$pze43     = $_POST['pze43'];
$pze42     = $_POST['pze42'];
$pze41     = $_POST['pze41'];
$pze38     = $_POST['pze38'];
$pze37     = $_POST['pze37'];
$pze36     = $_POST['pze36'];
$pze35     = $_POST['pze35'];
$pze34     = $_POST['pze34'];
$pze33     = $_POST['pze33'];
$pze32     = $_POST['pze32'];
$pze31     = $_POST['pze31'];
$pze55     = $_POST['pze55'];
$pze54     = $_POST['pze54'];
$pze53     = $_POST['pze53'];
$pze52     = $_POST['pze52'];
$pze51     = $_POST['pze51'];
$pze65     = $_POST['pze65'];
$pze64     = $_POST['pze64'];
$pze63     = $_POST['pze63'];
$pze62     = $_POST['pze62'];
$pze61     = $_POST['pze61'];
$pze85     = $_POST['pze85'];
$pze84     = $_POST['pze84'];
$pze83     = $_POST['pze83'];
$pze82     = $_POST['pze82'];
$pze81     = $_POST['pze81'];
$pze75     = $_POST['pze75'];
$pze74     = $_POST['pze74'];
$pze73     = $_POST['pze73'];
$pze72     = $_POST['pze72'];
$pze71     = $_POST['pze71'];
*/


echo 'Se está seleccionando la parte:'.$respuesta.'<br>
<div class="form-group col-md-12" style="border: 2px black solid; border-radius: 20px;" >
<div class="form-group col-md-6">';


$queryinv=mysqli_query($conn3,"SELECT * FROM  odontogramaMasterDetalle where  idPza = $parte and idCliente=$idCliente order by fecha desc");

$nrowl=mysqli_num_rows($queryinv);
while($rowinv=mysqli_fetch_array($queryinv))
{

$fecha         =$rowinv['fecha'];
$detalle        =$rowinv['detalle'];
$parteAplicada        =$rowinv['parteAplicadaDetalle']; 
$tratamiento        =$rowinv['tratamiento']; 
$tratamientoN= funcionMaster($tratamiento , 'id', 'nombre', 'OdontogramaEstados');








if($parte >=  '11' and $parte  <= '18') {


 switch ($parteAplicada)
 {

    case 0:
         $respuesta1 =  "Toda la pieza";
    break;
    case 1:
         $respuesta1 =  "Vestibular";
    break;
    case 2:
          $respuesta1 = "Distal";
    break;
    case 3:
        $respuesta1 = "Oclusal";
    break;
    case 4:
        $respuesta1 = "Mesial";
    break;
    case 5:
        $respuesta1 = "Lingual";
    break;

 }

}


if($parte >=  '51' and $parte  <= '55') {


 switch ($parteAplicada)
 {
  case 0:
         $respuesta1 =  "Toda la pieza";
    break;
    case 1:
         $respuesta1 =  "Vestibular";
    break;
    case 2:
          $respuesta1 = "Distal";
    break;
    case 3:
        $respuesta1 = "Oclusal";
    break;
    case 4:
        $respuesta1 = "Mesial";
    break;
    case 5:
        $respuesta1 = "Lingual";
    break;

 }

}







if($parte >=  '21' and $parte  <= '28') {


 switch ($parteAplicada)
 {

case 0:
         $respuesta1 =  "Toda la pieza";
    break;

    case 1:
         $respuesta1 =  "Vestibular";
    break;
    case 2:
          $respuesta1 = "Mesial";
    break;
    case 3:
        $respuesta1 = "Oclusal";
    break;
    case 4:
        $respuesta1 = "Distal";
    break;
    case 5:
        $respuesta1 = "Lingual";
    break;

 }

}



if($parte >=  '61' and $parte  <= '65') {


 switch ($parteAplicada)
 { case 0:
         $respuesta1 =  "Toda la pieza";
    break;
    case 1:
         $respuesta1 =  "Vestibular";
    break;
    case 2:
          $respuesta1 = "Mesial";
    break;
    case 3:
        $respuesta1 = "Oclusal";
    break;
    case 4:
        $respuesta1 = "Distal";
    break;
    case 5:
        $respuesta1 = "Lingual";
    break;

 }

}











if($parte >=  '31' and $parte  <= '38') {


 switch ($parteAplicada)
 { case 0:
         $respuesta1 =  "Toda la pieza";
    break;
    case 1:
         $respuesta1 =  "Lingual";
    break;
    case 2:
          $respuesta1 = "Mesial";
    break;
    case 3:
        $respuesta1 = "Oclusal";
    break;
    case 4:
        $respuesta1 = "Distal";
    break;
    case 5:
        $respuesta1 = "Vestibular";
    break;

 }

}





if($parte >=  '71' and $parte  <= '75') {


 switch ($parteAplicada)
 { case 0:
         $respuesta1 =  "Toda la pieza";
    break;
    case 1:
         $respuesta1 =  "Lingual";
    break;
    case 2:
          $respuesta1 = "Mesial";
    break;
    case 3:
        $respuesta1 = "Oclusal";
    break;
    case 4:
        $respuesta1 = "Distal";
    break;
    case 5:
        $respuesta1 = "Vestibular";
    break;

 }

}


if($parte >=  '41' and $parte  <= '48') {


 switch ($parteAplicada)
 { case 0:
         $respuesta1 =  "Toda la pieza";
    break;
    case 1:
         $respuesta1 =  "Lingual";
    break;
    case 2:
          $respuesta1 = "Distal";
    break;
    case 3:
        $respuesta1 = "Oclusal";
    break;
    case 4:
        $respuesta1 = "Mesial";
    break;
    case 5:
        $respuesta1 = "Vestibular";
    break;

 }

}


if($parte >=  '81' and $parte  <= '85') {


 switch ($parteAplicada)
 { case 0:
         $respuesta1 =  "Toda la pieza";
    break;
    case 1:
         $respuesta1 =  "Lingual";
    break;
    case 2:
          $respuesta1 = "Distal";
    break;
    case 3:
        $respuesta1 = "Oclusal";
    break;
    case 4:
        $respuesta1 = "Mesial";
    break;
    case 5:
        $respuesta1 = "Vestibular";
    break;

 }

}















echo 'Fecha:' .$fecha.' Pieza: '.$parte.'  Detalle: '.$tratamientoN.'--'.$detalle.', en la parte : '.$respuesta1.'<br>';

}   

echo '

</div>
<div class="form-group  col-md-1" >
Pieza '.$parte.'
<img src="Odontograma/oG0/'.$parte.'.png">

</div>

<div class="form-group col-md-5">
 Agregar detalle<br>

<textarea class="form-control"  name="detalle" id="detalleOdontograma" rows="3" placeholder="Enter ..."></textarea>
 </textarea>

<select id="servicioAplicado"   name="servicioAplicado" class="form-control select2" style="width: 100%;" >';


 $queryListA=mysqli_query($conn3,"SELECT * FROM OdontogramaEstados");
                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $id= $row_recordset32A['id'];
                      $nombre= $row_recordset32A['nombre'];
                      $color= $row_recordset32A['color'];

                      echo "<option value='$id'> $nombre </option>";
                  }


 echo   '
         <input type="hidden" id="parteAplicada"   name="parteAplicada"  Value="'.$pieza.'">
         
         <input type="hidden" id="parteDetalleog" value="'.$parte.'">   

        <button type="button"  onclick="cargarDetalle()" class="btn btn-block btn-primary btn-sm">    <i class="fa fa-glyphicon glyphicon-plus"></i>  Agregar consulta   </button>



</div>

</div>';




  
 
?>

