<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';



if ($_POST['citaAprobada'] == 1) {
  include 'guardarCita_Include.php';
}
$idHistoria         = reem($_POST['idHistoria']);

$fechar                = date("Y-m-d");
$hora                  = date("H:i:s");
$ID                    = $_POST['ID'];
$idusuario                    = $_POST['ID'];
$clienteId             = $_POST['clienteId'];

$diaganostico1             = $_POST['select1'];
$diaganostico2             = $_POST['select2'];
$diaganostico3             = $_POST['select3'];

$Ob1             = $_POST['notacie'];
$Ob2             = $_POST['notacie2'];
$Ob3             = $_POST['notacie3'];
$abd             = $_POST['abd'];
$perineal        = $_POST['perineal'];
$exploracion     = $_POST['exploracion'];
$tacto           = $_POST['tacto'];
$resultado           = $_POST['respuestatest'];
$respuesta           = $_POST['respuestatest1'];
$interpretacion          = $_POST['respuestatestx'];
$metodo         = $_POST['metodo'];



 // antecedentes Personales
$ant1                 = $_POST['ant1'];
$ant2                 = $_POST['ant2'];
$ant3                 = $_POST['ant3'];
$ant4                 = $_POST['ant4'];
$ant5                 = $_POST['ant5'];
$ant6                 = $_POST['ant6'];
$ant7                 = $_POST['ant7'];
$ant8                 = $_POST['ant8'];
$ant9                 = $_POST['ant9'];
$ant10                 = $_POST['ant10'];
$ant11                 = $_POST['ant11'];
$ant12                 = $_POST['ant12'];
$ant13                 = $_POST['ant13'];
$ant14                 = $_POST['ant14'];
$ant15                 = $_POST['ant15'];
$ant16                 = $_POST['ant16'];
$ant17                 = $_POST['ant17'];
$ant18                 = $_POST['ant18'];
$ant19                 = $_POST['ant19'];
$ant20                 = $_POST['ant20'];
$ant21                 = $_POST['ant21'];
$ant22                 = $_POST['ant22'];
$ant22x                 = $_POST['ant22x'];

$antecedentesPersonales                 = $_POST['antecedentesP'];

if ($ant1 <>'') {$antper1 = ' '.$ant1.': SI,';}else{$antper1 = $ant1.'"Hipertensi&oacuten Arterial Cronica:Niega |';}
if ($ant2 <>'') {$antper2 = ' '.$ant2.': SI,';}else{$antper2 =$ant2.'Diabetes  Mellitus: Niega |';}
if ($ant3 <>'') {$antper3 = ' '.$ant3.': SI,';}else{$antper3 = $ant3.'Insuficiencia Cardiaca:Niega |';}
if ($ant4 <>'') {$antper4 = ' '.$ant4.': SI,';}else{$antper4 =$ant4.'Insuficiencia Renal:Niega |';}
if ($ant5 <>'') {$antper5 = ' '.$ant5.': SI,';}else{$antper5 = $ant5.'Hipotiroidismo:Niega |';}
if ($ant6 <>'') {$antper6 = ' '.$ant6.': SI,';}else{$antper6 = $ant6.'Hiperlipidemia:Niega |';}
if ($ant7 <>'') {$antper7 = ' '.$ant7.': SI,';}else{$antper7 =$ant7.'C&aacutencer:Niega |';}
if ($ant8 <>'') {$antper8 = ' '.$ant8.': SI,';}else{$antper8 = $ant8.'Trastorno de Refracci&oacuten:Niega |';}
if ($ant9 <>'') {$antper9 = ' '.$ant9.': SI,';}else{$antper9 = $ant9.'Infecci&oacuten de Trasmisi&oacuten Sexual:Niega |';}
if ($ant10 <>'') {$antper10 = ' '.$ant10.': SI';}else{$antper10 = $ant10.'Otros:Niega |';}
if ($ant11 <>'') {$antper11 = '<br><b>Antecedentes Quirurgícos:</b> '.$ant11.'<br>';}else{$antper11 = '<br><b>Antecedentes Quirurgícos:</b> Niega<br>';}
if ($ant12 <>'') {$antper12 = '<b>Antecedentes  Farmacologicos:</b> '.$ant12.'<br>';}else{$antper12 = '<b>Antecedentes  Farmacologicos:</b>Niega<br>';}
if ($ant13 <>'') {$antper13 = '<b>Antecedentes Tóxicos:</b> '.$ant13.'<br>';}else {$antper13 = '<b>Antecedentes Tóxicos:</b> Niega <br>';}
if ($ant14 <>'') {$antper14 = '<b>Antecedentes Alergícos:</b>'.$ant14.'<br>';}else {$antper14 = '<b>Antecedentes Alergícos:</b>Niega<br>';}
if ($ant15 <>'') {$antper15 = '<b>Inmunización:</b> '.$ant15.'<br>';}else {$antper15 = '<b>Inmunización:</b> Niega <br>';}
if ($ant16 <>'') {$antper16 = '<b>Salud Mental:</b>  '.$ant16.'<br>';}else {$antper16 = '<b>Salud Mental:</b> Niega<br>';}
if ($ant17 <>'') {$antper17 = '<b>Antecedentes Socioecónomicos: </b> '.$ant17.'<br>';}else  {$antper17 = '<b>Antecedentes Socioecónomicos: </b>Niega<br>';}
if ($ant18 <>'') {$antper18 = '<b>Violencia intrafamiliar, sexual,  económica, psicológica, física, de género: </b> '.$ant18.'<br>';} else {$antper18 = '<b>Violencia intrafamiliar, sexual,  económica, psicológica, física, de género: </b>Niega<br>';}
if ($ant19 <>'') {$antper19 = ' '.$ant19.',';}
if ($ant20 <>'') {$antper20 = ' '.$ant20.': SI,';}else  {$antper20 = $ant20.'Actividad f&iacutesica:Niega |';}
if ($ant21 <>'') {$antper21 = ' '.$ant21.': SI,';}else  {$antper21 = $ant21.'Consumo de licor:Niega |';}
if ($ant22 <>'') {$antper22 = ' '.$ant22.': SI,';}else  {$antper22 = $ant22.'Consumo de  sustancias psicoactivas:Niega |';}
if ($ant22x <>'') {$antper22x = ' '.$ant22x.': SI,';}else  {$antper22x = $ant22x.'Consumo de cigarrillo:Niega <br>';}
if ($antecedentesPersonales <>'') {$antper23 = 'Detalles de antecedentes personales:'.$antecedentesPersonales.' ';}

$antecedentesPers ='<br> <b>Antecedentes Médicos:</B>'.$antper1.$antper2.$antper3.$antper4.$antper5.$antper6.$antper7.$antper8.$antper9.$antper10.$antper11.$antper12.$antper13.$antper14.$antper15.$antper16.$antper17.$antper18.$antper19.'<b>Hábitos de vida saluables</b><br>'.$antper20.$antper21.$antper22.$antper22x.$antper23 ;

$peso                 = $_POST['peso'];
$altura               = $_POST['altura'];
$imc                  = $_POST['imc'];
$ComposicionCorporal  = $_POST['ComposicionCorporal'];

$tart1                = $_POST['tart1'];
$temperatura          = $_POST['temperatura'];
$fcard                = $_POST['fcard'];
$sat                  = $_POST['sat'];
$FR                  = $_POST['FR'];
$perimetro           = $_POST['perimetro'];

if ($tart1 <> '') {$V1 = 'TA (mmhg): '.$tart1.'<trong> | </trong>';}
if ($temperatura  <>'') {$V2 = ' Temperatura: '.$temperatura.'<trong> | </trong>';}
if ($fcard <>'') {$V3= ' FC LPM: '.$fcard .'<trong> | </trong>';}
if ($sat <>'') {$V4= 'SAT02 : '.$sat.'<trong> | </trong>';}
if ($FR <>'') {$V5= 'Frecuencia Respiratoria: '.$FR.'<trong> | </trong>';}
if ($perimetro <>'') {$V6= 'Perimetro Abdóminal : '.$perimetro.'<trong> | </trong>';}

$examenFisico =$V1.$V2.$V3.$V4.$V5.$V6;

$examenObservacion = $_POST['examenObservacion'];



$update = '';
if(isset($_POST['line']))
  $update = $_POST['line'];  



$queryListhc=mysqli_query($conn3,"SELECT * from configTablasE where id = '$idHistoria'");
// $nrowl=mysqli_num_rows($queryListhc);
if ($queryListhc) {
  while($rowhc=mysqli_fetch_array($queryListhc))
  {
    $nombreTabla1=$rowhc['nombre'];
    $action=$rowhc['action'];
    $method=$rowhc['method'];
    $nombreTabla=$rowhc['name'];
    $boton=$rowhc['boton'];
    $ID_Tabla=$rowhc['id'];
  }  
}
 



if($update == ''){
  $valores = "cliente_id, usuario_id, Fecha, Hora ";
  $query = "'$clienteId', '$ID', '$fechar', '$hora'";
}
$queryDetalle=mysqli_query($conn3,"SELECT * FROM  configTablaDetalleE where idTabla = $idHistoria ");
// $nrowl=mysqli_num_rows($queryDetalle);
while($rowDetalle=mysqli_fetch_array($queryDetalle))
{

  $input_name  =$rowDetalle['input_name'];
  $tipoCampo  =$rowDetalle['tipoCampo'];
  $tamanio  =$rowDetalle['input_maxl'];


  if($tipoCampo == 'text') 
    mysqli_query($conn3,"ALTER TABLE $nombreTabla ADD COLUMN $input_name VARCHAR ($tamanio)");
  if($tipoCampo == 'number') 
    mysqli_query($conn3,"ALTER TABLE $nombreTabla ADD COLUMN $input_name int ($tamanio)");
  if($tipoCampo == 'textarea') 
    mysqli_query($conn3,"ALTER TABLE $nombreTabla ADD COLUMN $input_name text");
  if($tipoCampo == 'select_si_no') 
    mysqli_query($conn3,"ALTER TABLE $nombreTabla ADD COLUMN $input_name VARCHAR(2)");
  if($tipoCampo == 'select') 
    mysqli_query($conn3,"ALTER TABLE $nombreTabla ADD COLUMN $input_name VARCHAR(200)");
  if($tipoCampo == 'selectmultiple') 
    mysqli_query($conn3,"ALTER TABLE $nombreTabla ADD COLUMN $input_name text");
  if($tipoCampo == 'date') 
    mysqli_query($conn3,"ALTER TABLE $nombreTabla ADD COLUMN $input_name date");
  if($tipoCampo == 'file') 
    mysqli_query($conn3,"ALTER TABLE $nombreTabla ADD COLUMN $input_name text");


  if ($tipoCampo <> 'number' && $tipoCampo <> 'separador' && $tipoCampo <> 'imagen' && $tipoCampo <> 'file' && $tipoCampo <> 'date'
   && $tipoCampo <> 'selectmultiple' && $tipoCampo <> 'moduloplegable_inicio' && $tipoCampo <> 'moduloplegable_final') {


    if($update != ''){

     $valores .=  ",".$input_name." = '".reem($_POST[$input_name])."'";

   }else{
     $valores .=  ','.$input_name;


     $input_name = reem($_POST[$input_name]);


     $query .=  ", '$input_name'";
   }



 }

 if($tipoCampo == 'selectmultiple'){
  $selectmultiple = reem($_POST[$input_name]);

  if($update != ''){

   $valores .=  ",".$input_name;

 }else{
  $valores .=  ','.$input_name;
  $input_name =$input_name;
}

if($update != ''){

  $queryListhc=mysqli_query($conn3,"SELECT $input_name FROM $nombreTabla where id = $update");
  // $nrowl=mysqli_num_rows($queryListhc);
  if ($queryListhc) {
    while($rowhc=mysqli_fetch_array($queryListhc))
    {
      $field=$rowhc[$input_name];
    }

  }
  
  if ($selectmultiple <> '') {
    $valores .= " = '";//.$field;
    for($i=0; $i<count($selectmultiple); $i++){
      $valores .=  "|".$selectmultiple[$i];
    }
    $valores .= "'";
  }


}else{
  if ($selectmultiple <> '') {
    $query .= ", '";
    for($i=0; $i<count($selectmultiple); $i++){
      $query .=  "|".$selectmultiple[$i];
    }
    $query .= "'";
  }
  
}

}

if($tipoCampo == 'number'){
  if(reem($_POST[$input_name]) == ''){


    if($update != ''){

     $valores .=  ",".$input_name." = '0'";

   }else{
    $valores .=  ','.$input_name;


    $input_name = '0';


    $query .=  ", '$input_name'";
  }

}

else{
  if($update != ''){

   $valores .=  ",".$input_name." = '".reem($_POST[$input_name])."'";

 }else{
  $valores .=  ','.$input_name;


  $input_name = reem($_POST[$input_name]);


  $query .=  ", '$input_name'";
}
}
}

if($tipoCampo == 'date'){
  if(reem($_POST[$input_name]) == ''){


    if($update != ''){

     $valores .=  ",".$input_name." = '0000-00-00'";

   }else{
    $valores .=  ','.$input_name;


    $input_name = '0000-00-00';


    $query .=  ", '$input_name'";
  }

}

else{
  if($update != ''){

   $valores .=  ",".$input_name." = '".reem($_POST[$input_name])."'";

 }else{
  $valores .=  ','.$input_name;


  $input_name = reem($_POST[$input_name]);


  $query .=  ", '$input_name'";
}
}
}

if($tipoCampo == 'file'){

  mkdir('img/historia/'.$idHistoria.'/', 0777, true);

  $uri = $_SERVER['REQUEST_URI']; 
  $exploded_uri = explode('/', $uri); 
  $domain_name = $exploded_uri[1];
  $currentPath = $_SERVER['PHP_SELF']; 
  $pathInfo = pathinfo($currentPath); 
  $hostName = $_SERVER['HTTP_HOST']; 
  $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'https';
  $urlBase = $protocol.'://'.$hostName."/".$domain_name;

  if($update != ''){

   $valores .=  ",".$input_name;

 }else{
  $valores .=  ','.$input_name;
  $input_name =$input_name;
}

$f = array();
for($i=0; $i<count($_FILES[$input_name]['name']); $i++){
  $fileName = $_FILES[$input_name]['name'][$i];
  $f[$i] = $idHistoria. md5(uniqid()) .$fileName;
     //target_path = "img/historia/".$f;
    //$ext = explode('.', basename( $_FILES['file']['name'][$i]));
    //$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext)-1]; 
  $uploadFileDir = 'img/historia/'.$idHistoria.'/';
  $target_path = $uploadFileDir . $f[$i];

  if(move_uploaded_file($_FILES[$input_name]['tmp_name'][$i], $target_path)) echo 'OK'; else echo 'Err';
}

if($update != ''){

  $queryListhc=mysqli_query($conn3,"SELECT $input_name FROM $nombreTabla where id = $update");
  // $nrowl=mysqli_num_rows($queryListhc);
  if ($queryListhc) {
    while($rowhc=mysqli_fetch_array($queryListhc))
    {
      $field=$rowhc[$input_name];
    }
  }
  

  $valores .= " = '".$field;
  if($fileName != '')
    for($i=0; $i<count($f); $i++){
      $valores .=  "|".$urlBase."/".$uploadFileDir.$f[$i];
    }
    $valores .= "'";

  }else{
    $query .= ", '";
    for($i=0; $i<count($f); $i++){
      $query .=  "|".$urlBase."/".$uploadFileDir.$f[$i];
    }
    $query .= "'";
  }

}


}
echo $valores;
echo '<br>----------------  ----<br>';
echo $query;
echo '<br>----------------  ----<br>';
echo '<br>----------------  ----<br>';



$queryAuditor = "INSERT INTO $nombreTabla ($valores) VALUES  ($query);";
$queryAuditor = str_replace("'", '', $queryAuditor);
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);
//echo $queryAuditor;

auditorMaster($idusuario, '1', $enlace_actual, $queryAuditor);
//exit();

if($update != ''){
 echo "UPDATE $nombreTabla SET ".trim($valores, ',')." WHERE id='".$update."'";
 mysqli_query($conn3,"UPDATE $nombreTabla SET ".trim($valores, ',')." WHERE id='".$update."'");
 
}
else{

 echo "INSERT INTO $nombreTabla ($valores) VALUES  ($query);";



 mysqli_query($conn3,"INSERT INTO $nombreTabla ($valores) VALUES  ($query);");
}








$queryListhc=mysqli_query($conn3,"SELECT MAX(id) as historiaClinica1 from $nombreTabla where cliente_id = $clienteId");
// $nrowl=mysqli_num_rows($queryListhc);
if ($queryListhc) {
  while($rowhc=mysqli_fetch_array($queryListhc))
  {
    $historiaClinica1=$rowhc['historiaClinica1'];
  } 
}






if ($ID_Tabla == '15') { mysqli_query($conn3,"UPDATE $nombreTabla SET antecedentes = '$antecedentesPers' , peso = '$peso', talla ='$altura', imc ='$imc', corporal ='$ComposicionCorporal', otros='$examenFisico', observacion='$examenObservacion' WHERE id ='$historiaClinica1'");



}





if ($ID_Tabla == '16') { mysqli_query($conn3,"UPDATE $nombreTabla SET resultado = '$resultado' WHERE id ='$historiaClinica1'");



}


if ($ID_Tabla == '17') { mysqli_query($conn3,"UPDATE $nombreTabla SET resultado = '$respuesta', interpretacion = '$interpretacion' WHERE id ='$historiaClinica1'");



}  


if ($ID_Tabla == '19') { mysqli_query($conn3,"UPDATE $nombreTabla SET idMetodo = '$metodo' WHERE id ='$historiaClinica1'");



}

// historia audiometria -> id = 34 
function removeEmptyElements(&$element)
{
  if (is_array($element)) {
    if ($key = key($element)) {
      $element[$key] = array_filter($element);
    }

    if (count($element) != count($element, COUNT_RECURSIVE)) {
      $element = array_filter(current($element), __FUNCTION__);
    }

    $element = array_filter($element);

    return $element;
  } else {
    return empty($element) ? false : $element;
  }
}


//array_filter($_POST['InformacionAcudiente'], 'removeEmptyElements') -> esto se usa para  eliminar campos vacios en un array
$contador="0";
$LogoAudiometria.='<table class="tg"><thead><tr><th></th><th>Oído Derecho</th><th>Oído Izquierdo</th></tr></thead><tbody><tr>';
foreach ($_POST['LogoAudiometria'] as $key => $value) {
  $LogoAudiometria .= "</tr>";
    //$LogoAudiometria .= $key.": ".$value.'<br>';
  $LogoAudiometria .= "<td>".$key."</td>";
  foreach ($value as $key1 => $value1) {
    $LogoAudiometria .= "<td>".$value1.'</td>';
    if($value1<>"")
    {
      $contador++;
    }
  }
  $LogoAudiometria .= "</tr>";
}
$LogoAudiometria .= "</tbody></table>";
if($contador=="0")
{
  $LogoAudiometria = '<div style="display:none;">'.$LogoAudiometria."</div>";
} 


$contador="0";
$TimpanogramaTabla='<div class="col-md-12"><h3> Impedanciometría </h3></div>';
$Campos_Timpanograma = ["","ml","daPa","ml","daPa"];
foreach ($_POST['Timpanograma'] as $key => $value) {
  $TimpanogramaTabla.='<table class="tg" style="width: 50%;float: left;"><thead><tr><th colspan="2"> Oido '.$key.'</th></tr></thead><tbody>';
  $k="0";
  foreach ($value as $key1 => $value1) {
    $TimpanogramaTabla .= '<tr><td>'.$key1.'</td>'.'<td>'.$value1.' '.$Campos_Timpanograma[$k].'</td>'.'</tr>';
    if($value1<>"")
    {
      $contador++;
    }
    $k++;
  }
  $TimpanogramaTabla .= '</tbody></table>';
}
if($contador=="0")
{
  $TimpanogramaTabla = '<div style="display:none;">'.$TimpanogramaTabla."</div>";
} 


$contador="0";
$EstapedialesTabla='<div class="col-md-12"><h3> Reflejos Estapediales </h3></div>';
$EstapedialesTabla.='<table class="tg" style="width: 50%;float: left;"><thead><tr><th>Frecuencia</th><th colspan="2">Reflejos Ipsilaterales</th></tr></thead><tbody><tr><td></td><td> Oído Derecho</td><td> Oído Izquierdo </td></tr>';
foreach ($_POST['Reflejos_Ipsilaterales'] as $key => $value) {
  $EstapedialesTabla.='<tr><td>'.$key.'Hz</td>';
  foreach ($value as $key1 => $value1) {
    $EstapedialesTabla .= '<td>'.$value1.'</td>';
    if($value1<>"dB")
    {
      $contador++;
    }
  }
  $EstapedialesTabla .= '</tr>';
  
}
$EstapedialesTabla .= '</tbody></table>';

$EstapedialesTabla.='<table class="tg" style="width: 50%;float: left;"><thead><tr><th>Frecuencia</th><th colspan="2">Reflejos Contralaterales</th></tr></thead><tbody><tr><td></td><td> Oído Derecho</td><td> Oído Izquierdo </td></tr>';
foreach ($_POST['Reflejos_Contralaterales'] as $key => $value) {
  $EstapedialesTabla.='<tr><td>'.$key.'Hz</td>';
  foreach ($value as $key1 => $value1) {
    $EstapedialesTabla .= '<td>'.$value1.'</td>';
    if($value1<>"dB")
    {
      $contador++;
    }
  }
  $EstapedialesTabla .= '</tr>';
  
}
$EstapedialesTabla .= '</tbody></table>';

if($contador=="0")
{
  $EstapedialesTabla = '<div style="display:none;">'.$EstapedialesTabla."</div>";
} 

$equipos = $_POST['equipos'];
$logoderecho= $_POST['logoderecho'];
$logoIzquierdo= $_POST['logoIzquierdo'];
$discriDe = $_POST['discriDer'];
$discriIz = $_POST['discriIz'];
$osto1 = $_POST['osto1'];
$Entidad = $_POST['Entidad'];
$graficaaudiometria=$_POST['grafica'];
$graficalogometria=$_POST['grafica1'];

$graficatimpanograma1=$_POST['grafica_timpanograma_arreglo_1'];
$graficatimpanograma2=$_POST['grafica_timpanograma_arreglo_2'];

if ($ID_Tabla == '34') { mysqli_query($conn3,"UPDATE $nombreTabla SET equipos = '$equipos1', logoDer ='$logoderecho',  logoIz ='$logoIzquierdo',  discriDe='$discriDe', discriIz ='$discriIz',grafica_audiometria='$graficaaudiometria',grafica_logometria='$graficalogometria',campos_logometria='$LogoAudiometria',timpanograma_campos='$TimpanogramaTabla',reflejos_estapediales_campos='$EstapedialesTabla', grafica_timpanograma_od='$graficatimpanograma1',grafica_timpanograma_oi='$graficatimpanograma2' , ostocopia='$osto1', xentidaddo361 ='$Entidad' WHERE id ='$historiaClinica1'");}
// cierre de historia de audiometria -> 34

if ($idHistoria>=30 and $idHistoria<=40) {
  // datos para graficas
  foreach ($_POST['Grafico_Pediatria'] as $key => $value) 
  {
    $informacion_grafica.="'{$value}',"; 
    mysqli_query($conn3,"UPDATE SignosVitalesYAntropometria set $key  = '$value' WHERE cliente_id = '$clienteId' ;"); 
  }

  $informacion_grafica=trim($informacion_grafica,',').",'{$historiaClinica1}'";

  mysqli_query($conn3,"INSERT INTO  Grafica_Crecimiento 
  (usuario_id,cliente_id,Peso, Altura, IMC, Perimetro_Cefalico, Edad, id_historia, Tipo_Historia) 
  VALUES
  ('$ID','$clienteId',{$informacion_grafica},'Historia General');");



  $dataURL    = $_POST['tarea'];
  

  mysqli_query($conn3,"UPDATE $nombreTabla set grafica008  = '$dataURL' WHERE id = '$historiaClinica1';");


  // ecuador
  //registro de cie10  // diagnosticos  CONSULTA EXTERNA - ANAMNESIS
  foreach ($_POST['CIE-1052'] as $value){
    $cont++;
    $campo = 'cie1052_'.$cont;
    $codigocie10 = $value;
      //echo'<br>';
    echo"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id = '$historiaClinica1' ";
    mysqli_query($conn3,"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id = '$historiaClinica1';");
  }
  $cont=0;
  foreach ($_POST['PRE_1052'] as $value){
    $cont++;
    $campo = 'pre1052_'.$cont;
    $codigocie10 = $value;
    mysqli_query($conn3,"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id ='$historiaClinica1';");
  }
  $cont=0;

    //registro de cie10  // diagnosticos  EPICRISIS
  foreach ($_POST['CIE-1693'] as $value){
    $cont++;
    $campo = 'cie1693_'.$cont;
    $codigocie10 = $value;
    mysqli_query($conn3,"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id ='$historiaClinica1';");
  }
  $cont=0;
  foreach ($_POST['PRE_1693'] as $value){
    $cont++;
    $campo = 'pre1693_'.$cont;
    $codigocie10 = $value;
    mysqli_query($conn3,"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id ='$historiaClinica1';");
  }
  $cont=0;

    //registro de cie10  // 053
    foreach ($_POST['CIE-3109'] as $value){
      $cont++;
      $campo = 'cie3109_'.$cont;
      $codigocie10 = $value;
      mysqli_query($conn3,"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id ='$historiaClinica1';");
    }
    $cont=0;
    foreach ($_POST['PRE_3109'] as $value){
      $cont++;
      $campo = 'pre3109_'.$cont;
      $codigocie10 = $value;
      mysqli_query($conn3,"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id ='$historiaClinica1';");
    }
    $cont=0;
    foreach ($_POST['CIE-3084'] as $value){
      $cont++;
      $campo = 'cie3084_'.$cont;
      $codigocie10 = $value;
      mysqli_query($conn3,"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id ='$historiaClinica1';");
    }
    $cont=0;
    foreach ($_POST['PRE_3084'] as $value){
      $cont++;
      $campo = 'pre3084_'.$cont;
      $codigocie10 = $value;
      mysqli_query($conn3,"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id ='$historiaClinica1';");
    }
    $cont=0;
    

    //registro de cie10  // diagnosticos  INTERCONSULTA
  foreach ($_POST['CIE-1793'] as $value){
    $cont++;
    $campo = 'cie1793_'.$cont;
    $codigocie10 = $value;
    mysqli_query($conn3,"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id ='$historiaClinica1';");
  }
  $cont=0;
  foreach ($_POST['PRE_1793'] as $value){
    $cont++;
    $campo = 'pre1793_'.$cont;
    $codigocie10 = $value;
    mysqli_query($conn3,"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id ='$historiaClinica1';");
  }
  $cont=0;

    //registro de cie10  // diagnosticos  INTERCONSULTA INFORME
  foreach ($_POST['CIE-2220'] as $value){
    $cont++;
    $campo = 'cie2220_'.$cont;
    $codigocie10 = $value;
    mysqli_query($conn3,"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id ='$historiaClinica1';");
  }
  $cont=0;
  foreach ($_POST['PRE_2220'] as $value){
    $cont++;
    $campo = 'pre2220_'.$cont;
    $codigocie10 = $value;
    mysqli_query($conn3,"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id ='$historiaClinica1';");
  }
  $cont=0;

      //registro de cie10  // diagnosticos  imagenologia INFORME
  foreach ($_POST['CIE-2204'] as $value){
    $cont++;
    $campo = 'cie2204_'.$cont;
    $codigocie10 = $value;
    mysqli_query($conn3,"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id ='$historiaClinica1';");
  }
  $cont=0;
  foreach ($_POST['PRE_2204'] as $value){
    $cont++;
    $campo = 'pre2204_'.$cont;
    $codigocie10 = $value;
    mysqli_query($conn3,"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id ='$historiaClinica1';");
  }
  $cont=0;

    //registro de cie10  // diagnosticos  EMERGENCIA PRE
  foreach ($_POST['CIE-2011'] as $value){
    $cont++;
    $campo = 'cie2011_'.$cont;
    $codigocie10 = $value;
    mysqli_query($conn3,"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id ='$historiaClinica1';");
  }
  $cont=0;
  foreach ($_POST['PRE_2011'] as $value){
    $cont++;
    $campo = 'pre2011_'.$cont;
    $codigocie10 = $value;
    mysqli_query($conn3,"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id ='$historiaClinica1';");
  }
  $cont=0;

    //registro de cie10  // diagnosticos  EMERGENCIA DEF
  foreach ($_POST['CIE-2021'] as $value){
    $cont++;
    $campo = 'cie2021_'.$cont;
    $codigocie10 = $value;
    mysqli_query($conn3,"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id ='$historiaClinica1';");
  }
  $cont=0;
  foreach ($_POST['PRE_2021'] as $value){
    $cont++;
    $campo = 'pre2021_'.$cont;
    $codigocie10 = $value;
    mysqli_query($conn3,"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id ='$historiaClinica1';");
  }
  $cont=0;

    //registro de cie10  // diagnosticos LABORATORIO CLINICO
  foreach ($_POST['CIE-2139'] as $value){
    $cont++;
    $campo = 'cie2139_'.$cont;
    $codigocie10 = $value;
    mysqli_query($conn3,"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id ='$historiaClinica1';");
  }
  $cont=0;
  foreach ($_POST['PRE_2139'] as $value){
    $cont++;
    $campo = 'pre2139_'.$cont;
    $codigocie10 = $value;
    mysqli_query($conn3,"UPDATE $nombreTabla set $campo  = '$codigocie10' WHERE id ='$historiaClinica1';");
  }
  $cont=0;
}

if ($_POST['rayado']){
  $rayado = $_POST['rayado'];
  // var_dump($rayado);
  foreach ($rayado as $key => $value) {
    $key = 'rayado_' . $key;
    // var_dump($key);
    // var_dump($value);
    // verificar si existe el campo en la tabla
    $select = mysqli_query($conn3, "SELECT $key FROM $nombreTabla limit 1");
    if (mysqli_num_rows($select) == 0) {
      // no existe, se crea
      mysqli_query($conn3, "ALTER TABLE $nombreTabla ADD $key longtext null DEFAULT NULL");
    }else{
      // existe, se actualiza
      mysqli_query($conn3, "UPDATE $nombreTabla SET $key = '$value' WHERE id = '$historiaClinica1'");
    }
  }
}

echo "<script language='Javascript'> window.location='cFinalizadoE?iC=".encrypt($historiaClinica1)."&iCr=".encrypt($idHistoria)."';</script>";

?>