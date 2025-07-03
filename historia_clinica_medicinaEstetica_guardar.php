<?php
   //include 'header.php';
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
 //  include 'menu.php'; 



date_default_timezone_set('America/Bogota');

$registro              = $_POST['registro'];          
$ID                    = $_POST['ID']; 
$idusuario             = $_POST['ID'];          
$clienteId             = $_POST['clienteId'];          

$motivoConsulta        = reem($_POST['motivoConsulta']);      
$motivo                = reem($_POST['motivo']);      
$diagnostico           = reem($_POST['diagnostico']); 
$NOMBRE_USUARIO        = reem($_POST['NOMBRE_USUARIO']); 

$tratamientoResumen    = reem($_POST['tratamientoResumen']);

$Afecha                = $_POST['fecha'];        
$Ahora                 = $_POST['hora'];        
$email                 = $_POST['email'];        
$nombre                = reem($_POST['nombre']);        
$telefono              = $_POST['telefono'];        



$envejecimiento              = $_POST['envejecimiento'];        
$cirugia              = $_POST['cirugia'];        



$rs1                 = $_POST['rs1rs1'];        
$rs2                 = $_POST['rs2'];        
$rs3                 = $_POST['rs3'];        
$rs4                 = $_POST['rs4'];        
$rs5                 = $_POST['rs5'];        
$rs6                 = $_POST['rs6'];        
$rs7                 = $_POST['rs7'];        
$rs8                 = $_POST['rs8'];        
$rs9                 = $_POST['rs9'];        
$rs10                 = $_POST['rs10'];        
$rs11                 = $_POST['rs11'];        
$rs12                 = $_POST['rs12'];        
$rs13                 = $_POST['rs13'];        
$rs14                 = $_POST['rs14'];        
$rs15                 = $_POST['rs15'];        
$rs16                 = $_POST['rs16'];        
$rs17                 = $_POST['rs17'];        
$rs18                 = $_POST['rs18'];

$enfermedadActual                 = $_POST['enfermedadActual'];




if ($rs1 <> '') {$s1 = ' Fiebre : '.sino($rs1).'<trong> | </trong>';}
if ($rs2 <> '') {$s2 = ' Tos: '.sino($rs2).'<trong> | </trong>';}
if ($rs3 <> '') {$s3 = ' Rinorrea: '.sino($rs3).'<trong> | </trong>';}
if ($rs4 <> '') {$s4 = ' Cefalea: '.sino($rs4).'<trong> | </trong>';}
if ($rs5 <> '') {$s5 = ' Mareo: '.sino($rs5).'<trong> | </trong>';}
if ($rs6 <> '') {$s6 = ' Vomito: '.sino($rs6).'<trong> | </trong>';}
if ($rs7 <> '') {$s7 = ' Diarrea: '.sino($rs7).'<trong> | </trong>';}
if ($rs8 <> '') {$s8 = ' Disuria: '.sino($rs8).'<trong> | </trong>';}
if ($rs9 <> '') {$s9 = ' Dolor de Garganta: '.sino($rs9).'<trong> | </trong>';}
if ($rs10 <> '') {$s10 = ' Dolor Adominal: '.sino($rs10).'<trong> | </trong>';}
if ($rs11 <> '') {$s11 = ' Disnea: '.sino($rs11).'<trong> | </trong>';}
if ($rs12 <> '') {$s12 = ' Otalgia: '.sino($rs12).'<trong> | </trong>';}
if ($rs13 <> '') {$s13 = ' Perdida de Peso: '.sino($rs13).'<trong> | </trong>';}
if ($rs14 <> '') {$s14 = ' Sangre en las heces o al defecar: '.sino($rs14).'<trong> | </trong>';}
if ($rs15 <> '') {$s15 = ' Hematuria: '.sino($rs15).'<trong> | </trong>';}
if ($rs16 <> '') {$s16 = ' Dolor en las extremidades: '.sino($rs16).'<trong> | </trong>';}
if ($rs17 <> '') {$s17 = ' Parestesias: '.sino($rs17).'<trong> | </trong>';}
if ($rs18 <> '') {$s18 = ' Hipoestesias: '.sino($rs18).'<trong> | <br> </trong>';}
if (strlen($enfermedadActual)> 0) {$senfermedadActual = 'Enfermedad Actual: '.$enfermedadActual.'<trong> | </trong>';}



$rSistema = $s1.$s2.$s3.$s4.$s5.$s6.$s7.$s8.$s9.$s10.$s11.$s12.$s13.$s14.$s15.$s16.$s17.$s18.'<br>'.$senfermedadActual;  








$prestaciones1         = reem($_POST['prestaciones1']);   
$prestaciones2         = reem($_POST['prestaciones2']);   



$activo                = 1;
$fechar                = date("Y-m-d");
$Afechar               = date("Y-m-d H:i:s");
$hora                  = date("H:i:s");



$P                     = $_POST['P'];  
$doctor                     = $_POST['doctor'];  
$motivo                = reem($_POST['motivo']);   










$t11                 = $_POST['t11'];        
$t12                 = $_POST['t12'];        
$t13                 = $_POST['t13'];        
$t14                 = $_POST['t14'];        
$t15                 = $_POST['t15'];        
$t16                 = $_POST['t16'];        
$t17                 = $_POST['t17'];        
$t18                 = $_POST['t18'];        
$t19                 = $_POST['t19'];        
$t20                 = $_POST['t20'];        
$t21                 = $_POST['t21'];        
$t22                 = $_POST['t22'];        
$t23                 = $_POST['t23'];        



$to24                = $_POST['to24'];        
$to25                = $_POST['to25'];        
$to26                = $_POST['to26'];        
$to27                = $_POST['to27'];        
$to28                = $_POST['to28'];        
$to29                = $_POST['to29'];        
$to30                = $_POST['to30'];        
$to31                = $_POST['to31'];        
$to32                = $_POST['to32'];        
$to33                = $_POST['to33'];        
$to34                = $_POST['to34'];        
$to35                = $_POST['to35'];        
$to36                = $_POST['to36'];        
$to37                = $_POST['to37'];
$to38 = $_POST['to38']; 
$to39 = $_POST['to39']; 
// hacer la estructura de arriba hasta el 51

$to40                = $_POST['to40'];        
$to41                = $_POST['to41'];        
$to42                = $_POST['to42'];        
$to43                = $_POST['to43'];        
$to44                = $_POST['to44'];
$to45                = $_POST['to45'];
$to46                = $_POST['to46'];
$to47                = $_POST['to47'];
$to48                = $_POST['to48'];
$to49                = $_POST['to49'];
$to50                = $_POST['to50'];
$to51                = $_POST['to51'];



$n342                 = $_POST['n342'];        
$n344                 = $_POST['n344'];        
$diagnostico1        = $_POST['diagnostico1'];        



if ($to24 <> '') {$s24 = 'Cicatriz Queloide | ';}
if ($to25 <> '') {$s25 = 'Diabetes   | ';}
if ($to26 <> '') {$s26 = ' Epilepsia  | ';}
if ($to27 <> '') {$s27 = ' Herpes  | ';}
if ($to28 <> '') {$s28 = ' Cancer  | ';}
if ($to29 <> '') {$s29 = ' Enfermedades Cardiacas   | ';}
if ($to30 <> '') {$s30 = ' Alergias  | ';}
if ($to31 <> '') {$s31 = ' Usa Esteroides   | ';}
if ($to32 <> '') {$s32 = ' Uso de lentes de contacto  | ';}

if ($to33 <> '') {$s33 = ' Embarazo  | ';}

if ($to34 <> '') {$s34 = 'Enfermedades Autoinmunes  | ';}
if ($to35 <> '') {$s35 = 'Actividad Física   | ';}
if ($to36 <> '') {$s36 = ' Uso de Isotetrinoina    | ';}
if ($to37 <> '') {$s37 = 'Cicatriz Atrófica  | ';}
if ($to38 <> '') {$s38 = 'Cirugías  | ';}
if ($to39 <> '') {$s39 = 'Procedimientos estéticos | ';}

if ($to40 <> '') {$s40 = ' Procedimiento dental  | ';}
if ($to41 <> '') {$s41 = ' Anestesia  | ';}
if ($to42 <> '') {$s42 = '  Trastornos Tiroideos | ';}
if ($to43 <> '') {$s43 = ' Rosácea  | ';}
if ($to44 <> '') {$s44 = ' Acné  | ';}
if ($to45 <> '') {$s45 = '  Dermatitis | ';}
if ($to46 <> '') {$s46 = 'LES   | ';}
if ($to47 <> '') {$s47 = 'Artritis Reumatoidea    | ';}
if ($to48 <> '') {$s48 = ' Vasculitis  | ';}
if ($to49 <> '') {$s49 = ' Enfermedad hepática  | ';}
if ($to50 <> '') {$s50 = ' Trastornos de la Coagulación   | ';}
if ($to51 <> '') {$s51 = ' Miopatía  | ';}

$AntecedentesFamiliar              = $_POST['AntecedentesFamiliar']; 

if ($AntecedentesFamiliar  <> '') {$AntecedentesFamiliar1  = ' Antecedentes Familiares : '.$AntecedentesFamiliar.'  ';}

$AntecedentesPersonales        = $_POST['AntecedentesPersonales']; 

if ($AntecedentesPersonales   <> '') {$AntecedentesPersonales1  = ' Antecedentes Personales : '.$AntecedentesPersonales.'  ';}



$Antecedentesp=  $AntecedentesFamiliar1.'<br>'.$AntecedentesPersonales1;  






if (strlen($n342)> 0) {$nrt32 = $n342.'<trong> | </trong>';}
if (strlen($n344)> 0) {$nrt33 = $n344.'<trong> | </trong>';} 



if (strlen($diagnostico1)> 0) {$rdiagnostico1 = $diagnostico1.'<trong> | </trong>';} 

$antecedentes = $s24.$s25.$s26.$s27.$s28.$s29.$s30.$s31.$s32.$s33.$s34.$s35.$s36.$s37.$s38.$s39.$s40.$s41.$s42.$s43.$s44.$s45.$s46.$s47.$s48.$s49.$s50.$s51.$s52.$s53.$s54.$s55.$s56.$rdiagnostico1.$nrt32.$nrt33.'<br>'.$Antecedentesp;







$cutaneo              = $_POST['cutaneo'];        
$acne                 = $_POST['acne'];        
$fototico             = $_POST['fototico'];        
$pele                 = $_POST['pele'];        
$lesoes               = $_POST['lesoes'];        
$est_cutaneos         = $_POST['est_cutaneos'];        
$diagnostico2        = $_POST['diagnostico2'];        


if (strlen($cutaneo)> 0) {$rcutaneo = $cutaneo.'<trong> | </trong>';} 
if (strlen($acne)> 0) {$racne = $acne.'<trong> | </trong>';} 
if (strlen($fototico)> 0) {$rfototico = $fototico.'<trong> | </trong>';} 
if (strlen($pele)> 0) {$rpele = $pele.'<trong> | </trong>';} 
if (strlen($lesoes)> 0) {$rlesoes = $lesoes.'<trong> | </trong>';} 
if (strlen($est_cutaneos)> 0) {$rest_cutaneos = $est_cutaneos.'<trong> | </trong>';} 
if (strlen($diagnostico2)> 0) {$rdiagnostico2 = $diagnostico2.'<trong> | </trong>';} 


$tratamiento2 = $rcutaneo.$racne.$rfototico.$rpele.$rlesoes.$rest_cutaneos.$rdiagnostico2;








$evolucion            = $_POST['evolucion'];        
$t311                 = $_POST['t311'];        
$t312                 = $_POST['t312'];        
$t313                 = $_POST['t313'];        
$t314                 = $_POST['t314'];        
$t315                 = $_POST['t315'];        
$t316                 = $_POST['t316'];        
$t317                 = $_POST['t317'];        
$t318                 = $_POST['t318'];        
$t319                 = $_POST['t319'];        
$t320                 = $_POST['t320'];        
$t321                 = $_POST['t321'];        
$t322                 = $_POST['t322'];        
$t323                 = $_POST['t323'];        
$diagnostico3        = $_POST['diagnostico3'];        



if (strlen($t311)> 0) {$rt311 = $e311.'<trong> | </trong>';}
if (strlen($t312)> 0) {$rt312 = $e312.'<trong> | </trong>';}
if (strlen($t313)> 0) {$rt313 = $e313.'<trong> | </trong>';}
if (strlen($t314)> 0) {$rt314 = $e314.'<trong> | </trong>';}
if (strlen($t315)> 0) {$rt315 = $e315.'<trong> | </trong>';}
if (strlen($t316)> 0) {$rt316 = $e316.'<trong> | </trong>';}
if (strlen($t317)> 0) {$rt317 = $e317.'<trong> | </trong>';}
if (strlen($t318)> 0) {$rt318 = $e318.'<trong> | </trong>';}
if (strlen($t319)> 0) {$rt319 = $e319.'<trong> | </trong>';}
if (strlen($t320)> 0) {$rt320 = $e320.'<trong> | </trong>';}
if (strlen($t321)> 0) {$rt321 = $e321.'<trong> | </trong>';}
if (strlen($t322)> 0) {$rt322 = $e322.'<trong> | </trong>';}
if (strlen($t323)> 0) {$rt323 = $e323.'<trong> | </trong>';}
if (strlen($diagnostico3)> 0) {$rdiagnostico3 = $diagnostico3.'<trong> | </trong>';} 



$tratamiento3 = $rt311.$rt312.$rt313.$rt314.$rt315.$rt316.$rt317.$rt318.$rt319.$rt320.$rt321.$rt322.$rt323.$rdiagnostico3;





$t411                 = $_POST['t411'];
$t412                 = $_POST['t412'];
$t413                 = $_POST['t413'];
$t414                 = $_POST['t414'];
$t415                 = $_POST['t415'];
$t416                 = $_POST['t416'];
$t417                 = $_POST['t417'];
$t418                 = $_POST['t418'];
$t419                 = $_POST['t419'];
$t420                 = $_POST['t420'];
$t421                 = $_POST['t421'];
$t422                 = $_POST['t422'];
$t423                 = $_POST['t423'];
$t424                 = $_POST['t424'];
$diagnostico4        = $_POST['diagnostico4']; 

$CIE10             = $_POST['cie10D1'];   



if (strlen($t411)> 0) {$rt411 = $e411.'<trong> | </trong>';}
if (strlen($t412)> 0) {$rt412 = $e412.'<trong> | </trong>';}
if (strlen($t413)> 0) {$rt413 = $e413.'<trong> | </trong>';}
if (strlen($t414)> 0) {$rt414 = $e414.'<trong> | </trong>';}
if (strlen($t415)> 0) {$rt415 = $e415.'<trong> | </trong>';}
if (strlen($t416)> 0) {$rt416 = $e416.'<trong> | </trong>';}
if (strlen($t417)> 0) {$rt417 = $e417.'<trong> | </trong>';}
if (strlen($t418)> 0) {$rt418 = $e418.'<trong> | </trong>';}
if (strlen($t419)> 0) {$rt419 = $e419.'<trong> | </trong>';}
if (strlen($t420)> 0) {$rt420 = $e420.'<trong> | </trong>';}
if (strlen($t421)> 0) {$rt421 = $e421.'<trong> | </trong>';}
if (strlen($t422)> 0) {$rt422 = $e422.'<trong> | </trong>';}
if (strlen($t423)> 0) {$rt423 = $e423.'<trong> | </trong>';}
if (strlen($t424)> 0) {$rt424 = $e424.'<trong> | </trong>';}
if (strlen($diagnostico4)> 0) {$rdiagnostico4 = $diagnostico4.'<trong> | </trong>';} 


$tratamiento4 = $rt411.$rt412.$rt413.$rt414.$rt415.$rt416.$rt417.$rt418.$rt419.$rt420.$rt421.$rt422.$rt423.$rdiagnostico4;





$tratamientoRegistro = $tratamiento1.$tratamiento2.$tratamiento3.$tratamiento4;



$diagnostico5        = reem($_POST['diagnostico5']); 









$peso                 = $_POST['peso'];        
$altura               = $_POST['altura'];        
$imc                  = $_POST['imc'];        
$ComposicionCorporal  = $_POST['ComposicionCorporal']; 


$procedimiento  = reem($_POST['procedimiento']); 
$tratamiento    = reem($_POST['tratamiento']); 
$planAtencion   = reem($_POST['planAtencion']); 
$nota           = reem($_POST['nota']); 
$pagoAbono      = $_POST['pagoAbono']; 

if ($pagoAbono == '') {
    $pagoAbono = 0;
}





 /*

if ($e11 <> '') {$ei11 = ' Buen estado general : '.sino($e11).'<trong> | </trong>';}

if ($e12 <> '') {$ei12 = ' Febril al tacto : '.sino($e12).'<trong> | </trong>';}

if ($e13 <> '') {$ei13 = ' Irritable  : '.sino($e13).'<trong> | </trong>';}

$estadoGeneral = $ei11.$ei12.$ei13;

*/

$queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario=$ID");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
    $whatsapp = $rowMotorizado['whatsapp'];
}


$queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
    $celular_cliente = $rowMotorizado['celular_cliente'];
}




$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));



// // *****************    TABLA  historiaClinica1 *****************************************
// // *****************    TABLA  historiaClinica1 *********************************************************

// imagen canva
$dataURL = $_POST['tarea'];
$notaImagen = $_POST['tarea2'];

$sucursal = $_POST['sucursal'];
if ($sucursal == "") {
	$sucursal = "0";
}
// ////////////////////////////// CREACION DE TABLAS ///////////////////////////////////////////////////
$Campo1 = mysqli_query($conn3, "show COLUMNS from historiaClinica5 WHERE Field = 'sucursal';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `historiaClinica5` ADD `sucursal` TEXT NULL DEFAULT '0' COMMENT 'Sucursal en la que fue atendido *Creado Dinamicamente*'");
}


$query = "INSERT INTO historiaClinica5 (cliente_id, usuario_id, Fecha, Hora, envejecimiento, cirugia, tratamiento, tratamientoResumen, procedimiento, planAtencion, notas, fotoAntes, fotoDurante, fotoDespues, pagoAbono, peso, altura, imc, ComposicionCorporal, diagnostico5, rSistema, motivoConsulta,   antecedentespf, CIE10, enfermedadActual, antP, antF,sucursal) VALUES
    ($clienteId, $ID,$fechar, $hora, $envejecimiento, $cirugia, $tratamientoRegistro, $tratamientoResumen, $procedimiento, $planAtencion, $nota, $fotoAntes, $fotoDurante, $fotoDespues, $pagoAbono, $peso, $altura,$imc, $ComposicionCorporal, $diagnostico5, $rSistema, $motivoConsulta, $antecedentes, $CIE10, $enfermedadActual, $AntecedentesPersonales, $AntecedentesFamiliar, $sucursal);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

mysqli_query($conn3,"INSERT INTO historiaClinica5 (cliente_id, usuario_id, Fecha, Hora, envejecimiento, cirugia, tratamiento, tratamientoResumen, procedimiento, planAtencion, notas, fotoAntes, fotoDurante, fotoDespues, pagoAbono, peso, altura, imc, ComposicionCorporal, diagnostico5, rSistema, motivoConsulta,   antecedentespf, CIE10, imagen, notaImagen, enfermedadActual, antP, antF,sucursal) VALUES
    ('$clienteId', '$ID','$fechar', '$hora', '$envejecimiento', '$cirugia', '$tratamientoRegistro', '$tratamientoResumen', '$procedimiento', '$planAtencion', '$nota', '$fotoAntes', '$fotoDurante', '$fotoDespues', '$pagoAbono', '$peso', '$altura', '$imc', '$ComposicionCorporal', '$diagnostico5', '$rSistema', '$motivoConsulta',     '$antecedentes', '$CIE10', '$dataURL', '$notaImagen', '$enfermedadActual', '$AntecedentesPersonales', '$AntecedentesFamiliar', '$sucursal');");

echo"INSERT INTO historiaClinica5 (cliente_id, usuario_id, Fecha, Hora, envejecimiento, cirugia, tratamiento, tratamientoResumen, procedimiento, planAtencion, notas, fotoAntes, fotoDurante, fotoDespues, pagoAbono, peso, altura, imc, ComposicionCorporal, diagnostico5, rSistema, motivoConsulta,   antecedentespf, CIE10, imagen, notaImagen, enfermedadActual, antP, antF) VALUES
    ('$clienteId', '$ID','$fechar', '$hora', '$envejecimiento', '$cirugia', '$tratamientoRegistro', '$tratamientoResumen', '$procedimiento', '$planAtencion', '$nota', '$fotoAntes', '$fotoDurante', '$fotoDespues', '$pagoAbono', '$peso', '$altura', '$imc', '$ComposicionCorporal', '$diagnostico5', '$rSistema', '$motivoConsulta',     '$antecedentes', '$CIE10', '$dataURL', '$notaImagen', '$enfermedadActual', '$AntecedentesPersonales', '$AntecedentesFamiliar');";

echo "<pre>";
var_dump(mysqli_error_list($conn3));
echo "</pre>";

// /*
// mysqli_query($conn3,"INSERT INTO historiaClinica1 (cliente_id, usuario_id, Fecha, Hora, motivoConsulta, diagnostico, tratamiento, notas, recipe, incapacidades, cie10, rSistema, enfermedadActual, acompananteFamiliar, telefono_acompanante, paraClinicos, remision, diagnosticoMsalud, comoTomarlo) VALUES 
//   ('$clienteId', '$ID', '$fechar', '$hora', '$motivoConsulta', '$diagnostico', '$tratamiento', '$notas',  '$recipe', '$incapacidades', '$cie10', '$rSistema', '$enfermedadActual', '$acompananteFamiliar', '$telefono_acompanante', '$paraClinicos', '$remision', '$diagnosticoMsalud', '$comoTomarlo');");
// // *****************    TABLA  historiaClinica1 *********************************************************
// // *****************    TABLA  historiaClinica1 *********************************************************
// */


// //////////////////AUTOGUARDADO///////////////////////////////////////////////////////////////
if($_POST['Ruta_Historia_AutoGuardado']!=""){
	$Ruta_Historia_AutoGuardado = $_POST['Ruta_Historia_AutoGuardado'];

	$query = "UPDATE AutoGuardado SET Estado='0' WHERE cliente_id = '$clienteId' and usuario_id = '$ID' and Ruta = '$Ruta_Historia_AutoGuardado' AND Estado = '1' ";
	mysqli_query($conn3, $query);
}


  $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica1  from historiaClinica5 where cliente_id= $clienteId");
  $nrowl=mysqli_num_rows($queryListhc);
  while($rowhc=mysqli_fetch_array($queryListhc))
  {
    $historiaClinica1=$rowhc['historiaClinica1'];
}   


// cargamos imagenes
$path = 'historiaClinica5';
// verificar y crear ruta
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}
// subir y actualizar imagenes
for ($i=1; $i <=3 ; $i++) { 
    if ($_FILES['imagen'.$i]['name']<>'') {
        // echo'1<br>';
        $var = 'img1'.$i;
        $nombrer = rand(1,9999).$_FILES['imagen'.$i]['name'];
        $resultado = @move_uploaded_file($_FILES["imagen".$i]["tmp_name"],$path."/".$nombrer);
        if (!empty($resultado))
        {
            $queryCliente = "UPDATE historiaClinica5 SET  $var = '$nombrer'  WHERE ID =   '$historiaClinica1' ";
            mysqli_query($conn3,$queryCliente) or die(mysqli_error());
        }
    }    
}
// cargamos imagenes fin



// $mensaje = ' Resultado de la consulta  con el Dr(a) *'.$NOMBRE_USUARIO.'*, *Procedimiento* '.$procedimiento.' *Tratamiento* '.$tratamiento.'. ***Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR ALBUJA CENTROS MEDICOS-MedicalSoft';
// Whatsapp_sent($celular_cliente, $mensaje);






$para ="$email";

                // título
$título = ' Resultado de la consulta';

                // mensaje
$mensaje = ' 
<html>
<head>
<title>Resultado de la consulta</title>
<table width="100%" height="466" border="0">
<tr>
<td><table width="100%" height="75" border="0">

</table>
<table width="100%" height="143" border="0">
<tr>
<td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
<tr>
<td width="5%">&nbsp;</td>
<td width="72%" style="color:#FFF;"><h1><strong>Resultado de la consulta </strong></h1></td>
<td width="23%">&nbsp;</td>
</tr>
</table></td>
</tr>
</table>
<table width="100%" height="122" border="0">
<tr>
<td width="10%">&nbsp;</td>
<td width="80%"><p>procedimiento</p>
<br />

<h3>  '.$motivoConsulta.'  </h3> 

<br> 

</td>
<br />

<td width="10%">&nbsp;</td>
</tr>

<tr>
<td width="10%">&nbsp;</td>
<td width="80%"><p>tratamiento</p>
<br />

<h3>  '.$tratamiento.'  </h3> 

<br> 

</td>
<br />






<td width="10%">&nbsp;</td>
</tr>
</table>

<p>Atentamente,<br />
'.$NOMBRE_USUARIO.'</p> 

<table width="100%" border="0">
<tr>
<td height="21" bgcolor="#00A74B">&nbsp;</td>
</tr>
</table>
<table width="100%" height="64" border="0">
<tr>
<td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, Contactart a '.$NOMBRE_USUARIO.'<br />
</td>
</tr>
</table></td>
</tr>
</table>
</head>
<body>

</body>
</html>
';

                // Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = ' MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                // Cabeceras adicionales
$cabeceras .= 'To: '.$NOMBRE_USUARIO.' <noreply@medicalsoftcolombia.com>' . "\r\n";
$cabeceras .= 'From: Resultado de la consulta <noreply@medicalsoftcolombia.com>' . "\r\n";
$cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
$cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

                // Enviarlo
mail($para, $título, $mensaje, $cabeceras);


$verficar = date("Y-m-d");


if ($Afecha>$verficar) 
{

    // echo '<br> CALENDARIO  1 1'.$verficar.' <br>';

    // $mensaje = ' Sr(a) *'.$nombre.'* usted a agendado un cita médica con Dr(a) *'.$doctor.'* el dia *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR ALBUJA CENTROS MEDICOS-MedicalSoft';
    // Whatsapp_sent($telefono, $mensaje);


    // $mensaje2 = ' Dr(a) *'.$doctor.'*  se a agendado  una cita con la paciente *'.$nombre.'*,  *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Motivo: *'.$motivoConsulta.'* Atte DR ALBUJA CENTROS MEDICOS MedicalSoft';
    // Whatsapp_sent($whatsapp, $mensaje2);









    mysqli_query($conn3,"INSERT INTO citas (doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id , tipo) 
        VALUES ('$doctor', '$Afecha', '$Ahora', '$nombre', '$telefono', '$email', '$motivo', '1', '$Afechar', '$ID', '0')");


    $para ="$email";

                // título
    $título = ' Cita Agendada';

                // mensaje
    $mensaje = ' 
    <html>
    <head>
    <title>Cita Agendada</title>
    <table width="100%" height="466" border="0">
    <tr>
    <td><table width="100%" height="75" border="0">

    </table>
    <table width="100%" height="143" border="0">
    <tr>
    <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
    <tr>
    <td width="5%">&nbsp;</td>
    <td width="72%" style="color:#FFF;"><h1><strong>Cita Agendada</strong></h1></td>
    <td width="23%">&nbsp;</td>
    </tr>
    </table></td>
    </tr>
    </table>
    <table width="100%" height="122" border="0">
    <tr>
    <td width="10%">&nbsp;</td>
    <td width="80%"><p>Cita Agendada por el doctor(a) '.$NOMBRE_USUARIO.'</p>
    <br />

    <h3>  Se a  agendado un cita para ustes el dia <strong>  '.$Afecha.' </strong> a las  <strong>   '.$Ahora.'  </strong>  , Motivo:  <strong>  '.$motivo.' </strong>   </h3> 

    <br> 

    </td>
    <br />



    <td width="10%">&nbsp;</td>
    </tr>

    </table>

    <p>Atentamente,<br />
    '.$NOMBRE_USUARIO.'</p> 

    <table width="100%" border="0">
    <tr>
    <td height="21" bgcolor="#00A74B">&nbsp;</td>
    </tr>
    </table>
    <table width="100%" height="64" border="0">
    <tr>
    <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, Contactart a '.$NOMBRE_USUARIO.'<br />
    </td>
    </tr>
    </table></td>
    </tr>
    </table>
    </head>
    <body>

    </body>
    </html>
    ';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $cabeceras  = ' MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
    $cabeceras .= 'To: '.$NOMBRE_USUARIO.' <noreply@medicalsoftcolombia.com>' . "\r\n";
    $cabeceras .= 'From: Resultado de su Cita <noreply@medicalsoftcolombia.com>' . "\r\n";
    $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
    $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

// Enviarlo
    mail($para, $título, $mensaje, $cabeceras);

}

echo "<br><br>Antes de la redireccion";
echo "<script language='Javascript'> window.location='hcmeFinalizado?hC=".encrypt($historiaClinica1)."';</script>"; 
echo "<br><br>Despues de la redireccion";

?>