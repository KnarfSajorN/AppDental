<?php
//include 'header.php';
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
//  include 'menu.php'; 



date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
//$con = conectar();



$ID                    = $_POST['ID'];
$codigo1 = $_POST['cie10postquirurgico'];
$CUPSREMISION = $_POST['CUPSREMISION'];
if (is_countable($CUPSREMISION)) {
  if (count($CUPSREMISION) == 0) {
  $CUPSREMISION = 0;
  } else {
    $CUPSREMISION = json_encode($CUPSREMISION);
  }
}

$CUPSLABORATORIO = $_POST['CUPSLABORATORIO'];
if (is_countable($CUPSLABORATORIO)) {
  if (count($CUPSLABORATORIO) == 0) {
    $CUPSLABORATORIO = 0;
  } else {
    $CUPSLABORATORIO = json_encode($CUPSLABORATORIO);
  }
}

$CUPSIMAGENOLOGIA = $_POST['CUPSIMAGENOLOGIA'];
if (is_countable($CUPSIMAGENOLOGIA)) {
  if (count($CUPSIMAGENOLOGIA) == 0) {
  $CUPSIMAGENOLOGIA = 0;
  } else {
    $CUPSIMAGENOLOGIA = json_encode($CUPSIMAGENOLOGIA);
  }
}





$registro             = $_POST['registro'];
$idUsuario            = $_POST['usuario_id'];
$idusuario            = $_POST['usuario_id'];
$idCliente            = $_POST['clienteId'];

$tratamiento          = reem($_POST['tratamiento']);
$descripcion          = reem($_POST['descripcion']);

$fechaHora            = date("Y-m-d H:i:s");

$procedimiento        = reem($_POST['procedimiento']);

$planAtencion         = reem($_POST['planAtencion']);
$nota                 = reem($_POST['nota']);

$peso                 = $_POST['peso'];
$altura               = $_POST['altura'];
$imc                  = $_POST['imc'];
$composicionCorporal  = reem($_POST['ComposicionCorporal']);


$operador  = $_POST['operador'];

$abono                 = $_POST['abono'];


$Afecha                = $_POST['fecha'];
$Ahora                 = $_POST['hora'];

$P                     = $_POST['P'];
$doctor                     = $_POST['doctor'];
$motivo                = reem($_POST['motivo']);


$Afechar               = date("Y-m-d H:i:s");
$email                 = $_POST['email'];
$nombre                = reem($_POST['nombre']);
$telefono              = $_POST['telefono'];





$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $email = $rowMotorizado['correo_cliente'];
  }
}











if ($tratamiento == 1) {


  $tratamiento = 'Tratamiento Corporal';




  $to1                 = $_POST['to1'];
  $to2                 = $_POST['to2'];
  $to3                 = $_POST['to3'];
  $to4                 = $_POST['to4'];
  $to5                 = $_POST['to5'];
  $to6                 = $_POST['to6'];
  $to7                 = $_POST['to7'];
  $to8                 = $_POST['to8'];
  $to9                 = $_POST['to9'];
  $to10                = $_POST['to10'];
  $to11                = $_POST['to11'];

  $to12                = $_POST['to12'];
  $to13                = $_POST['to13'];
  $to14                = $_POST['to14'];

  $antA                = $_POST['antA'];





  if ($to1 <> '') {
    $s1 = '' . $to1 . '<br>';
  }
  if ($to2 <> '') {
    $s2 = ' Busto: ' . $to2 . '<br>';
  }
  if ($to3 <> '') {
    $s3 = ' Abdomen Alto: ' . $to3 . '<br>';
  }
  if ($to4 <> '') {
    $s4 = ' Cintura: ' . $to4 . '<br>';
  }
  if ($to5 <> '') {
    $s5 = ' Cadera : ' . $to5 . '<br>';
  }
  if ($to6 <> '') {
    $s6 = ' Pierna Derecha : ' . $to6 . '<br>';
  }
  if ($to7 <> '') {
    $s7 = ' Pierna Izquierda: ' . $to7 . '<br>';
  }
  if ($to8 <> '') {
    $s8 = ' Brazo Derecho: ' . $to8 . '<br>';
  }
  if ($to9 <> '') {
    $s9 = ' Brazo Izquierdo: ' . $to9 . '<br>';
  }
  if ($to10 <> '') {
    $s10 = ' Peso: ' . $to10 . '<br>';
  }
  if ($to11 <> '') {
    $s11 = '   | Record de sesiones FACIAL : : ' . $to11;
  }
  if ($antA <> '') {
    $sant = '  | Antecedentes : : ' . $antA;
  }

  if ($to12 <> '') {
    $s12 = '  | % Grasa : ' . $to12;
  }
  if ($to13 <> '') {
    $s13 = '  | % Musculo : ' . $to13;
  }
  if ($to14 <> '') {
    $s14 = '  | Grasa visceral : ' . $to14;
  }

  $descripcion = $s1 . $s2 . $s3 . $s4 . $s5 . $s6 . $s7 . $s8 . $s9 . $s10 . $s11 . $sant . $s12 . $s13 . $s14;
}




if ($tratamiento == 2) {

  $tratamiento = 'Tratamiento Facial';



  $AntecedentesFamiliar                 = $_POST['AntecedentesFamiliar'];
  $to2                 = $_POST['to2'];
  $to3                 = $_POST['to3'];
  $to4                 = $_POST['to4'];
  $to5                 = $_POST['to5'];
  $to6                 = $_POST['to6'];
  $to7                 = $_POST['to7'];
  $to8                 = $_POST['to8'];
  $to9                 = $_POST['to9'];
  $to10                = $_POST['to10'];
  $to11                = $_POST['to11'];
  $to12                = $_POST['to12'];
  $to13                = $_POST['to13'];
  $to14                = $_POST['to14'];
  $to15                = $_POST['to15'];
  $to16                = $_POST['to16'];
  $to17                = $_POST['to17'];
  $to18                = $_POST['to18'];
  $to19                = $_POST['to19'];
  $to20                = $_POST['to20'];
  $to21                = $_POST['to21'];
  $to22                = $_POST['to22'];
  $to23                = $_POST['to23'];


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

  $to38                = $_POST['to38'];
  $to39                = $_POST['to39'];
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


  // Clasificación de Ritides Facial
  $to52                = $_POST['to52'];
  if ($to52 <> '') {
    $s52 = $to52;
  }
  $to53                = $_POST['to53'];
  if ($to53 <> '') {
    $s53 = '<br>Tipo de Piel ' . $to53;
  }
  $to54                = $_POST['to54'];
  if ($to54 <> '') {
    $s54 = '<br>Fitzpatrick ' . $to54;
  }
  $to55                = $_POST['to55'];
  if ($to55 <> '') {
    $s55 = '<br>Textura ' . $to55;
  }
  $to56                = $_POST['to56'];
  if ($to56 <> '') {
    $s56 = '<br>Piel ' . $to56;
  }
  $to57                = $_POST['to57'];
  if ($to57 <> '') {
    $s57 = '<br>Según lesión predominante - Acne  ' . $to57;
  }
  $to58                = $_POST['to58'];
  if ($to58 <> '') {
    $s58 = '<br>Según grado de severidad  ' . $to58;
  }
  $to59                = $_POST['to59'];
  if ($to59 <> '') {
    $s59 = '<br>Formas especiales:  ' . $to59;
  }

  /*
  $to60                = $_POST['to60'];
  if ($to60 <> '') {
    $s60 = '  ' . $to60;
  }
  */
  $to59a                = $_POST['to59a'];
  if ($to59a <> '') {
    $s59a = '<br> Esta en algún Tratamiento: X';
  }
  $to59b                = $_POST['to59b'];
  if ($to59b <> '') {
    $s59b = '<br> Cuales: '.$to59b;
  }






  $tipoPiel                = $_POST['tipoPiel'];
  $to38                = $_POST['to38'];
  $to39                = $_POST['to39'];
  $cAcne2                = $_POST['cAcne2'];
  $antAe                = $_POST['antAe'];

  $textura                = $_POST['textura'];
  if($textura!='') {
    $textura = " Textura: ".$textura;
  }

  $to40a                = $_POST['to40a'];
  $to41a                = $_POST['to41a'];
  $to42a                = $_POST['to42a'];
  $to43a                = $_POST['to43a'];
  $fitzpatrick                = $_POST['fitzpatrick'];
  $cRitidosis                = $_POST['cRitidosis'];
  $cAcne                = $_POST['cAcne'];

  if ($tipoPiel <> '') {
    $t3234 = 'Tipo de Piel :  ' . $tipoPiel . ' | ';
  }

  if ($AntecedentesFamiliar <> '') {
    $sAntecedentesFamiliar = '<br> Antecedentes Familiar: ' . $AntecedentesFamiliar . ' |';
  }
  if ($to2 <> '') {
    $s2 = 'Delineado parpado inferior |';
  }
  if ($to3 <> '') {
    $s3 = 'Cejas   | ';
  }
  if ($to4 <> '') {
    $s4 = 'Delineado de labios  | ';
  }
  if ($to5 <> '') {
    $s5 = 'Relleno de labios | ';
  }
  if ($to6 <> '') {
    $s6 = 'Camuflaje de cicatriz | ';
  }
  if ($to7 <> '') {
    $s7 = ' Retoque | ';
  }
  if ($to8 <> '') {
    $s8 = 'Corrección | ';
  }
  if ($to9 <> '') {
    $s9 = 'Larga  | ';
  }
  if ($to10 <> '') {
    $s10 = 'Redonda | ';
  }
  if ($to11 <> '') {
    $s11 = 'Cuadrada |';
  }
  if ($to12 <> '') {
    $s12 = 'Ovalada | ';
  }
  if ($to13 <> '') {
    $s13 = 'Diamante | ';
  }
  if ($to14 <> '') {
    $s14 = 'rasgados | ';
  }
  if ($to15 <> '') {
    $s15 = 'Grandes | ';
  }
  if ($to16 <> '') {
    $s16 = 'Redondos | ';
  }
  if ($to17 <> '') {
    $s17 = 'Normales | ';
  }
  if ($to18 <> '') {
    $s18 = ' Ovales  | ';
  }
  if ($to19 <> '') {
    $s19 = '  Caídos | ';
  }
  if ($to20 <> '') {
    $s20 = ' Gruesos  | ';
  }
  if ($to21 <> '') {
    $s21 = ' Pequeños  | ';
  }
  if ($to22 <> '') {
    $s22 = ' Puntiagudos  | ';
  }
  //if ($to23 <> '') {$s23 = ' Normales  | ';}


  if ($to24 <> '') {
    $s24 = 'Cicatriz Queloide | ';
  }
  if ($to25 <> '') {
    $s25 = 'Diabetes   | ';
  }
  if ($to26 <> '') {
    $s26 = ' Epilepsia  | ';
  }
  if ($to27 <> '') {
    $s27 = ' Herpes  | ';
  }
  if ($to28 <> '') {
    $s28 = ' Cancer  | ';
  }
  if ($to29 <> '') {
    $s29 = ' Enfermedades Cardíacas   | ';
  }
  if ($to30 <> '') {
    $s30 = ' Alergias  | ';
  }
  if ($to31 <> '') {
    $s31 = ' Usa Esteroides   | ';
  }
  if ($to32 <> '') {
    $s32 = ' Uso de lentes de contacto  | ';
  }

  if ($to33 <> '') {
    $s33 = ' Embarazo  | ';
  }

  if ($to34 <> '') {
    $s34 = 'Enfermedades Autoinmunes  | ';
  }
  if ($to35 <> '') {
    $s35 = 'Actividad Física   | ';
  }
  if ($to36 <> '') {
    $s36 = ' Uso de Isotetrinoina    | ';
  }
  if ($to37 <> '') {
    $s37 = 'Cicatriz Atrófica  | ';
  }
  if ($to38 <> '') {
    $s38 = 'Cirugías  | ';
  }
  if ($to39 <> '') {
    $s39 = 'Procedimientos estéticos | ';
  }

  if ($to40 <> '') {
    $s40 = ' Procedimiento dental  | ';
  }
  if ($to41 <> '') {
    $s41 = ' Anestesia  | ';
  }
  if ($to42 <> '') {
    $s42 = '  Trastornos Tiroideos | ';
  }
  if ($to43 <> '') {
    $s43 = ' Rosácea  | ';
  }
  if ($to44 <> '') {
    $s44 = ' Acné  | ';
  }
  if ($to45 <> '') {
    $s45 = '  Dermatitis | ';
  }
  if ($to46 <> '') {
    $s46 = 'LES   | ';
  }
  if ($to47 <> '') {
    $s47 = 'Artritis Reumatoidea    | ';
  }
  if ($to48 <> '') {
    $s48 = ' Vasculitis  | ';
  }
  if ($to49 <> '') {
    $s49 = ' Enfermedad hepática  | ';
  }
  if ($to50 <> '') {
    $s50 = ' Trastornos de la Coagulación   | ';
  }
  if ($to51 <> '') {
    $s51 = ' Miopatía  | ';
  }




  if ($cAcne2 <> '') {
    $s3se = ' <br> Clasificación del Acné ? ' . $cAcne2 . ' | ';
  }

  if ($to40a <> '') {
    $s40a = ' T/A: '.$to40a.' <br> ';
  }
  if ($to41a <> '') {
    $s41a = ' F/C: '.$to41a.' <br> ';
  }
  if ($to42a <> '') {
    $s42a = ' F/R: '.$to42a.' <br> ';
  }
  if ($to43a <> '') {
    $s43a = ' T: '.$to43a.' <br>';
  }


  if ($fitzpatrick <> '') {
    $s2s = ' Fitzpatrick    :' . $fitzpatrick . ' | ';
  }
  if ($cRitidosis <> '') {
    $s3s = 'Clasificacion de Ritidosis    ' . $cRitidosis . ' | ';
  }
  if ($cAcne <> '') {
    $s3s = 'Clasificación del Acné    ' . $cAcne . ' | ';
  }





  $descripcion = 'Motivo de la Consulta: ' . $to23 . '<br>Antecedentes: ' . $s24 . $s25 . $s26 . $s27 . $s28 . $s29 . $s30 . $s31 . $s32 . $s33 . $s34 . $s35 . $s36 . $s37 . $s38 . $s39 . $s40 . $s41 . $s42 . $s43 . $s44 . $s45 . $s46 . $s47 . $s48 . $s49 . $s50 . $s51 .'<br>'.$s52 . $s53 . $s54 . $s55 . $s56 . $s57 . $s58 . $s59 . $s59a. $s59b . $s3se . $sAntecedentesFamiliar .'<br> Examen Físico: <br>'.$s40a . $s41a . $s42a . $s43a .'<br>'. $s2s .'<br>'. $s3s . '' . $t3234 . '<br> Antecedentes Adicionales: ' . $antAe . '<br>' . $textura;




  /*    
$descripcion = 'MOTIVO DE LA CONSULTA: '.$s1.$s2.$s3.$s4.$s5.$s6.$s7.$s8.'<br> ANALISIS FACIAL : <br>Forma de la cara '.$s9.$s10.$s11.$s12.$s13.'<br>Forma de los Ojos <br>'.$s14.$s15.$s16.$s17.'<br>Forma de Labios '.$s18.$s19.$s20.$s21.$s22.$s23.'<br>ANTECEDENTES: '.$s24.$s25.$s26.$s27.$s28.$s29.$s30.$s31.$s32.$s33.$s34.$s35.$s36.$s37.$s38.$s39.$s3se.'EXAMEN FISICO '.$s40.$s41.$s42.$s43.$s2s.$s3s.'TIPO DE PIEL'.$t3234.'Antecedente Adicionales'.$antAe.'Textura'.$textura;  


*/
}

if ($tratamiento == 3) {


  $tratamiento = 'Tratamiento Laser';
  $to1                 = $_POST['to1'];
  $to2                 = $_POST['to2'];
  $to3                 = $_POST['to3'];
  $to4                 = $_POST['to4'];
  $to5                 = $_POST['to5'];
  $to6                 = $_POST['to6'];
  $to7                 = $_POST['to7'];
  $to8                 = $_POST['to8'];
  $to9                 = $_POST['to9'];
  $to10                = $_POST['to10'];
  $antA                = $_POST['antA'];


  $to11                = $_POST['to11'];
  $to12                = $_POST['to12'];
  $to13                = $_POST['to13'];
  $to14                = $_POST['to14'];
  $to15                = $_POST['to15'];
  $to16                = $_POST['to16'];
  $to17                = $_POST['to17'];
  $to18                = $_POST['to18'];
  $to19                = $_POST['to19'];
  $to20                = $_POST['to20'];
  $to21                 = $_POST['to21'];
  $to22                 = $_POST['to22'];





  // Clasificación de Ritides Facial
  $to52                = $_POST['to52'];
  if ($to52 <> '') {
    $s52 = $to52;
  }
  $to53                = $_POST['to53'];
  if ($to53 <> '') {
    $s53 = '<br>Tipo de Piel ' . $to53;
  }
  $to54                = $_POST['to54'];
  if ($to54 <> '') {
    $s54 = '<br>fitzpatrick ' . $to54;
  }
  $to55                = $_POST['to55'];
  if ($to55 <> '') {
    $s55 = '<br>Textura ' . $to55;
  }
  $to56                = $_POST['to56'];
  if ($to56 <> '') {
    $s56 = '<br>Piel ' . $to56;
  }
  $to57                = $_POST['to57'];
  if ($to57 <> '') {
    $s57 = '<br>Según lesión predominante - Acne  ' . $to57;
  }
  $to58                = $_POST['to58'];
  if ($to58 <> '') {
    $s58 = '<br>Según grado de severidad  ' . $to58;
  }
  $to59                = $_POST['to59'];
  if ($to59 <> '') {
    $s59 = '<br>Formas especiales  ' . $to59;
  }
  $to60                = $_POST['to60'];
  if ($to60 <> '') {
    $s60 = '  ' . $to60;
  }




  $antA3                = $_POST['antA3'];


  if ($to1 <> '') {
    $s1 = 'Completa |';
  }
  if ($to2 <> '') {
    $s2 = ' Bikini |';
  }
  if ($to3 <> '') {
    $s3 = ' Axilas | ';
  }
  if ($to4 <> '') {
    $s4 = 'P/C | ';
  }
  if ($to5 <> '') {
    $s5 = 'M/P |';
  }
  if ($to6 <> '') {
    $s6 = 'Rejuvenecimiento de la piel |';
  }
  if ($to7 <> '') {
    $s7 = 'Pigmentación |';
  }
  if ($to8 <> '') {
    $s8 = 'Terapia de Acne |';
  }
  if ($to9 <> '') {
    $s9 = 'Terapia Vacular | ';
  }
  if ($to14 <> '') {
    $s14 = 'Esta Tomando antibioticos ' . sino($to14) . ' | ';
  }
  if ($to15 <> '') {
    $s15 = 'Toma vitaminas A-B  ' . sino($to15) . ' | ';
  }
  if ($to16 <> '') {
    $s16 = 'Toma Robacutam ' . sino($to16) . ' | ';
  }
  if ($to17 <> '') {
    $s17 = 'Toma Aminoglucosos ' . sino($to17) . ' | ';
  }
  if ($to18 <> '') {
    $s18 = 'Fuma  ' . sino($to18) . ' | ';
  }
  if ($to19 <> '') {
    $s19 = 'Tiene piel bronceada ' . sino($to19) . ' | ';
  }
  if ($to20 <> '') {
    $s20 = 'Cera | ';
  }
  if ($to21 <> '') {
    $s21 = 'Cuchilla | ';
  }
  if ($to22 <> '') {
    $s22 = 'Cremas | ';
  }

  $descripcion = 'Depilacion: ' . $s1 . $s2 . $s3 . $s4 . $s5 . $s6 . $s7 . $s8 . $s9 . ' <br> Tipo de Vello :' . $to11 . '  <br> Densidad:  ' . $to12 . '<br>  Color: ' . $to13 . '<br> INFORMACIÓN  PERSONAL: ' . $s14 . $s15 . $s16 . $s17 . $s18 . $s19 . '<br>  Clase de Depilación :' . $s20 . $s21 . $s22 . ' <br> Antecedentes Adicionales:' . $antA3;
}













if ($tratamiento == 4) {


  $tratamiento = 'Mesoterapia Facial';


  // Clasificación de Ritides Facial
  $to52                = $_POST['to52'];
  if ($to52 <> '') {
    $s52 = $to52;
  }
  $to53                = $_POST['to53'];
  if ($to53 <> '') {
    $s53 = '<br>Tipo de Piel ' . $to53;
  }
  $to54                = $_POST['to54'];
  if ($to54 <> '') {
    $s54 = '<br>fitzpatrick ' . $to54;
  }
  $to55                = $_POST['to55'];
  if ($to55 <> '') {
    $s55 = '<br>Textura ' . $to55;
  }
  $to56                = $_POST['to56'];
  if ($to56 <> '') {
    $s56 = '<br>Piel ' . $to56;
  }
  $to57                = $_POST['to57'];
  if ($to57 <> '') {
    $s57 = '<br>Según lesión predominante - Acne  ' . $to57;
  }
  $to58                = $_POST['to58'];
  if ($to58 <> '') {
    $s58 = '<br>Según grado de severidad  ' . $to58;
  }
  $to59                = $_POST['to59'];
  if ($to59 <> '') {
    $s59 = '<br>Formas especiales  ' . $to59;
  }
  $to60                = $_POST['to60'];
  if ($to60 <> '') {
    $s60 = ' Otros hallazgos ' . $to60;
  }






  $descripcion = $s52 . $s53 . $s54 . $s55 . $s56 . $s57 . $s58 . $s59 . $s60;
}










if ($tratamiento == 5) {

  $tratamiento = 'Mesoterapia Capilar';


  // Clasificación de Ritides Facial
  $to52                = $_POST['to52'];
  if ($to52 <> '') {
    $s52 = $to52;
  }
  $to53                = $_POST['to53'];
  if ($to53 <> '') {
    $s53 = '<br>Escala Ludwig  ' . $to53;
  }



  $to60                = $_POST['to60'];
  if ($to60 <> '') {
    $s60 = ' Otros hallazgos ' . $to60;
  }






  $descripcion = $s52 . $s53 . $s54 . $s55 . $s56 . $s57 . $s58 . $s59 . $s60;
}









if ($tratamiento == 6) {

  $tratamiento = 'Mesoterapia Corporal';

  // Clasificación de Ritides Facial
  $to52                = $_POST['to52'];
  if ($to52 <> '') {
    $s52 = 'Medidas ' . $to52;
  }
  $to53                = $_POST['to53'];
  if ($to53 <> '') {
    $s53 = '<br>Busto ' . $to53;
  }
  $to54                = $_POST['to54'];
  if ($to54 <> '') {
    $s54 = '<br>Abdomen Alto ' . $to54;
  }
  $to55                = $_POST['to55'];
  if ($to55 <> '') {
    $s55 = '<br>Cintura ' . $to55;
  }
  $to56                = $_POST['to56'];
  if ($to56 <> '') {
    $s56 = '<br>Cadera ' . $to56;
  }
  $to57                = $_POST['to57'];
  if ($to57 <> '') {
    $s57 = '<br>Record sesiones:  ' . $to57;
  }
  $to58                = $_POST['to58'];
  if ($to58 <> '') {
    $s58 = '<br>PEFE  ' . $to58;
  }



  $descripcion = $s52 . $s53 . $s54 . $s55 . $s56 . $s57 . $s58;
}






if ($peso == '') {
  $peso = 0;
}
if ($altura == '') {
  $altura = 0;
}
if ($imc == '') {
  $imc = 0;
}
if ($abono == '') {
  $abono = 0;
}




$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

// *********************************************************    TABLA  historiaClinica1 *********************************************************
// *********************************************************    TABLA  historiaClinica1 *********************************************************
$sucursal = $_POST['sucursal'];
if ($sucursal == "") {
  $sucursal = "0";
}
////////////////////////////// CREACION DE TABLAS ///////////////////////////////////////////////////
/*
$Campo1 = mysqli_query($conn3, "show COLUMNS from e_tratamiento  WHERE Field = 'sucursal';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
  mysqli_query($conn3, "ALTER TABLE `e_tratamiento ` ADD `sucursal` TEXT NULL DEFAULT '0' COMMENT 'Sucursal en la que fue atendido *Creado Dinamicamente*'");
}
*/

$Campo = mysqli_query($conn3, "show COLUMNS from e_tratamiento WHERE Field = 'sucursal';");
$nrowCampo = mysqli_num_rows($Campo);
if ($nrowCampo == "0") {
    mysqli_query($conn3, "ALTER TABLE `e_tratamiento` ADD `sucursal` TEXT NULL DEFAULT '0' COMMENT ''");
}

$query = "INSERT INTO e_tratamiento 
    (idUsuario, tratamiento,        operador,    descripcion,     fechaHora,    idCliente,    procedimiento,    planAtencion, abono, nota, peso, altura, imc, composicionCorporal,cups,sucursal) VALUES 
    ($idUsuario, $tratamiento, $operador, $descripcion, $fechaHora, $idCliente, $procedimiento, $planAtencion, $abono, $nota, $peso, $altura, $imc, $composicionCorporal,$CUPSREMISION,$sucursal);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);


mysqli_query($conn3, "INSERT INTO e_tratamiento 
    (idUsuario, tratamiento,        operador,    descripcion,     fechaHora,    idCliente,    procedimiento,    planAtencion, abono, nota, peso, altura, imc, composicionCorporal,cups,sucursal) VALUES 
    ('$idUsuario', '$tratamiento', '$operador', '$descripcion', '$fechaHora', '$idCliente', '$procedimiento', '$planAtencion ', '$abono', '$nota', '$peso', '$altura', '$imc', '$composicionCorporal','$CUPSREMISION','$sucursal');") or die ('Error: ' . mysqli_error($conn3));




echo "INSERT INTO e_tratamiento 
    (idUsuario, tratamiento,        operador,    descripcion,     fechaHora,    idCliente,    procedimiento,    planAtencion, abono, nota, peso, altura, imc, composicionCorporal,cups) VALUES 
    ('$idUsuario', '$tratamiento', '$operador', '$descripcion', '$fechaHora', '$idCliente', '$procedimiento', '$planAtencion ', '$abono', '$nota', '$peso', '$altura', '$imc', '$composicionCorporal','$CUPSREMISION');";


$queryListhc = mysqli_query($conn3, "SELECT MAX(ID) as historiaClinica1 from e_tratamiento where idCliente= $idCliente");
// $nrowl = mysqli_num_rows($queryListhc);
if ($queryListhc) {
  while ($rowhc = mysqli_fetch_array($queryListhc)) {
    $historiaClinica1 = $rowhc['historiaClinica1'];
  }
}



//////////////////AUTOGUARDADO///////////////////////////////////////////////////////////////
$idusuario            = $_POST['usuario_id'];
if($_POST['Ruta_Historia_AutoGuardado']!=""){
	$Ruta_Historia_AutoGuardado = $_POST['Ruta_Historia_AutoGuardado'];

	$query = "UPDATE AutoGuardado SET Estado='0' WHERE cliente_id = '$idCliente' and usuario_id = '$idUsuario' and Ruta = '$Ruta_Historia_AutoGuardado' AND Estado = '1' ";
	mysqli_query($conn3, $query);

}











// *********************************************************    TABLA  historiaClinica1 *********************************************************
// *********************************************************    TABLA  historiaClinica1 *********************************************************

//      $abono






$para = "$email";

// título
$título = 'Resultado de la consulta';

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
<td width="80%"><p>Tratamiento </p>
<br />

<h3>  ' . $descripcion . '  </h3> 

<br> 

</td>
<br />

  

<td width="10%">&nbsp;</td>
</tr>
</table>

<p>Atentamente,<br />
' . $NOMBRE_USUARIO . '</p> 

                      <table width="100%" border="0">
                        <tr>
                          <td height="21" bgcolor="#00A74B">&nbsp;</td>
                        </tr>
                      </table>
                      <table width="100%" height="64" border="0">
                        <tr>
                          <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, Contactart a ' . $NOMBRE_USUARIO . '<br />
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
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: ' . $NOMBRE_USUARIO . ' <noreply@medicalsoftcolombia.com>' . "\r\n";
$cabeceras .= 'From: Resultado de la consulta <noreply@medicalsoftcolombia.com>' . "\r\n";
$cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
$cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

// Enviarlo
mail($para, $título, $mensaje, $cabeceras);


$verficar = date("Y-m-d");


if ($Afecha > $verficar) {

  echo '<br> CALENDARIO  1 1' . $verficar . ' <br>';

  $mensaje = ' Sr(a) *' . $nombre . '* usted a agendado un cita  con *' . $doctor . '* el dia *' . $fecha . '* a las *' . $Hora . '* en *' . $sucursal . '*. Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR ALBUJA CENTROS MEDICOS-MedicalSoft';
  // Whatsapp_sent($telefono, $mensaje);


  $mensaje2 = ' *' . $doctor . '*  se a agendado  una cita con la paciente *' . $nombre . '*,  *' . $fecha . '* a las *' . $Hora . '* en *' . $sucursal . '*. Motivo: *' . $motivoConsulta . '* Atte DR ALBUJA CENTROS MEDICOS MedicalSoft';
  // Whatsapp_sent($whatsapp, $mensaje2);








  mysqli_query($conn3, "INSERT INTO citas (doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id , tipo) 
                VALUES ('$doctor', '$Afecha', '$Ahora', '$nombre', '$telefono', '$email', '$motivo', '1', '$Afechar', '$ID', '0')");



  echo "INSERT INTO citas (doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id , tipo) 
                VALUES ('$doctor', '$Afecha', '$Ahora', '$nombre', '$telefono', '$email', '$motivo', '1', '$Afechar', '$ID', '0')";


  $para = "$email";

  // título
  $título = 'Cita Agendada';

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
<td width="80%"><p>Cita Agendada por el doctor(a) ' . $NOMBRE_USUARIO . '</p>
<br />

<h3>  Se a  agendado un cita para ustes el dia <strong>  ' . $Afecha . ' </strong> a las  <strong>   ' . $Ahora . '  </strong>  , Motivo:  <strong>  ' . $motivo . ' </strong>   </h3> 

<br> 

</td>
<br />



<td width="10%">&nbsp;</td>
</tr>

</table>

<p>Atentamente,<br />
' . $NOMBRE_USUARIO . '</p> 

                <table width="100%" border="0">
                        <tr>
                          <td height="21" bgcolor="#00A74B">&nbsp;</td>
                        </tr>
                      </table>
                      <table width="100%" height="64" border="0">
                        <tr>
                          <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, Contactart a ' . $NOMBRE_USUARIO . '<br />
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
  $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
  $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

  // Cabeceras adicionales
  $cabeceras .= 'To: ' . $NOMBRE_USUARIO . ' <noreply@medicalsoftcolombia.com>' . "\r\n";
  $cabeceras .= 'From: Resultado de su Cita <noreply@medicalsoftcolombia.com>' . "\r\n";
  $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
  $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

  // Enviarlo
  mail($para, $título, $mensaje, $cabeceras);
}



echo "<script language='Javascript'> window.location='HC_FinalizadoCentroEstetico?iHC=".encrypt($historiaClinica1)."';</script>";
