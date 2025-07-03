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

if ($ant1 <> '') {
  $antper1 = ' ' . $ant1 . ': SI,';
} else {
  $antper1 = $ant1 . '"Hipertensi&oacuten Arterial Cronica:Niega |';
}
if ($ant2 <> '') {
  $antper2 = ' ' . $ant2 . ': SI,';
} else {
  $antper2 = $ant2 . 'Diabetes  Mellitus: Niega |';
}
if ($ant3 <> '') {
  $antper3 = ' ' . $ant3 . ': SI,';
} else {
  $antper3 = $ant3 . 'Insuficiencia Cardiaca:Niega |';
}
if ($ant4 <> '') {
  $antper4 = ' ' . $ant4 . ': SI,';
} else {
  $antper4 = $ant4 . 'Insuficiencia Renal:Niega |';
}
if ($ant5 <> '') {
  $antper5 = ' ' . $ant5 . ': SI,';
} else {
  $antper5 = $ant5 . 'Hipotiroidismo:Niega |';
}
if ($ant6 <> '') {
  $antper6 = ' ' . $ant6 . ': SI,';
} else {
  $antper6 = $ant6 . 'Hiperlipidemia:Niega |';
}
if ($ant7 <> '') {
  $antper7 = ' ' . $ant7 . ': SI,';
} else {
  $antper7 = $ant7 . 'C&aacutencer:Niega |';
}
if ($ant8 <> '') {
  $antper8 = ' ' . $ant8 . ': SI,';
} else {
  $antper8 = $ant8 . 'Trastorno de Refracci&oacuten:Niega |';
}
if ($ant9 <> '') {
  $antper9 = ' ' . $ant9 . ': SI,';
} else {
  $antper9 = $ant9 . 'Infecci&oacuten de Trasmisi&oacuten Sexual:Niega |';
}
if ($ant10 <> '') {
  $antper10 = ' ' . $ant10 . ': SI';
} else {
  $antper10 = $ant10 . 'Otros:Niega |';
}
if ($ant11 <> '') {
  $antper11 = '<br><b>Antecedentes Quirurgícos:</b> ' . $ant11 . '<br>';
} else {
  $antper11 = '<br><b>Antecedentes Quirurgícos:</b> Niega<br>';
}
if ($ant12 <> '') {
  $antper12 = '<b>Antecedentes  Farmacologicos:</b> ' . $ant12 . '<br>';
} else {
  $antper12 = '<b>Antecedentes  Farmacologicos:</b>Niega<br>';
}
if ($ant13 <> '') {
  $antper13 = '<b>Antecedentes Tóxicos:</b> ' . $ant13 . '<br>';
} else {
  $antper13 = '<b>Antecedentes Tóxicos:</b> Niega <br>';
}
if ($ant14 <> '') {
  $antper14 = '<b>Antecedentes Alergícos:</b>' . $ant14 . '<br>';
} else {
  $antper14 = '<b>Antecedentes Alergícos:</b>Niega<br>';
}
if ($ant15 <> '') {
  $antper15 = '<b>Inmunización:</b> ' . $ant15 . '<br>';
} else {
  $antper15 = '<b>Inmunización:</b> Niega <br>';
}
if ($ant16 <> '') {
  $antper16 = '<b>Salud Mental:</b>  ' . $ant16 . '<br>';
} else {
  $antper16 = '<b>Salud Mental:</b> Niega<br>';
}
if ($ant17 <> '') {
  $antper17 = '<b>Antecedentes Socioecónomicos: </b> ' . $ant17 . '<br>';
} else {
  $antper17 = '<b>Antecedentes Socioecónomicos: </b>Niega<br>';
}
if ($ant18 <> '') {
  $antper18 = '<b>Violencia intrafamiliar, sexual,  económica, psicológica, física, de género: </b> ' . $ant18 . '<br>';
} else {
  $antper18 = '<b>Violencia intrafamiliar, sexual,  económica, psicológica, física, de género: </b>Niega<br>';
}
if ($ant19 <> '') {
  $antper19 = ' ' . $ant19 . ',';
}
if ($ant20 <> '') {
  $antper20 = ' ' . $ant20 . ': SI,';
} else {
  $antper20 = $ant20 . 'Actividad f&iacutesica:Niega |';
}
if ($ant21 <> '') {
  $antper21 = ' ' . $ant21 . ': SI,';
} else {
  $antper21 = $ant21 . 'Consumo de licor:Niega |';
}
if ($ant22 <> '') {
  $antper22 = ' ' . $ant22 . ': SI,';
} else {
  $antper22 = $ant22 . 'Consumo de  sustancias psicoactivas:Niega |';
}
if ($ant22x <> '') {
  $antper22x = ' ' . $ant22x . ': SI,';
} else {
  $antper22x = $ant22x . 'Consumo de cigarrillo:Niega <br>';
}
if ($antecedentesPersonales <> '') {
  $antper23 = 'Detalles de antecedentes personales:' . $antecedentesPersonales . ' ';
}

$antecedentesPers = '<br> <b>Antecedentes Médicos:</B>' . $antper1 . $antper2 . $antper3 . $antper4 . $antper5 . $antper6 . $antper7 . $antper8 . $antper9 . $antper10 . $antper11 . $antper12 . $antper13 . $antper14 . $antper15 . $antper16 . $antper17 . $antper18 . $antper19 . '<b>Hábitos de vida saluables</b><br>' . $antper20 . $antper21 . $antper22 . $antper22x . $antper23;

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

if ($tart1 <> '') {
  $V1 = 'TA (mmhg): ' . $tart1 . '<trong> | </trong>';
}
if ($temperatura  <> '') {
  $V2 = ' Temperatura: ' . $temperatura . '<trong> | </trong>';
}
if ($fcard <> '') {
  $V3 = ' FC LPM: ' . $fcard . '<trong> | </trong>';
}
if ($sat <> '') {
  $V4 = 'SAT02 : ' . $sat . '<trong> | </trong>';
}
if ($FR <> '') {
  $V5 = 'Frecuencia Respiratoria: ' . $FR . '<trong> | </trong>';
}
if ($perimetro <> '') {
  $V6 = 'Perimetro Abdóminal : ' . $perimetro . '<trong> | </trong>';
}

$examenFisico = $V1 . $V2 . $V3 . $V4 . $V5 . $V6;

$examenObservacion = $_POST['examenObservacion'];



$update = '';
if (isset($_POST['line']))
  $update = $_POST['line'];



$queryListhc = mysqli_query($conn3, "SELECT * from configTablas where id = '$idHistoria'");
// $nrowl = mysqli_num_rows($queryListhc);
while ($rowhc = mysqli_fetch_array($queryListhc)) {
  $nombreTabla1 = $rowhc['nombre'];
  $action = $rowhc['action'];
  $method = $rowhc['method'];
  $nombreTabla = $rowhc['name'];
  $boton = $rowhc['boton'];
  $ID_Tabla = $rowhc['id'];
}



if ($update == '') {
  $valores = "cliente_id, usuario_id, Fecha, Hora ";
  $query = "'$clienteId', '$ID', '$fechar', '$hora'";
}
$queryDetalle = mysqli_query($conn3, "SELECT * FROM  configTablaDetalle where idTabla = $idHistoria and estado = 1");
// $nrowl = mysqli_num_rows($queryDetalle);
while ($rowDetalle = mysqli_fetch_array($queryDetalle)) {

  $input_name  = $rowDetalle['input_name'];
  $tipoCampo  = $rowDetalle['tipoCampo'];
  $tamanio  = $rowDetalle['input_maxl'];


  if ($tipoCampo == 'text')
    mysqli_query($conn3, "ALTER TABLE $nombreTabla ADD COLUMN $input_name VARCHAR ($tamanio)");
  if ($tipoCampo == 'number')
    mysqli_query($conn3, "ALTER TABLE $nombreTabla ADD COLUMN $input_name int ($tamanio)");
  if ($tipoCampo == 'textarea')
    mysqli_query($conn3, "ALTER TABLE $nombreTabla ADD COLUMN $input_name text");
  if ($tipoCampo == 'select_si_no')
    mysqli_query($conn3, "ALTER TABLE $nombreTabla ADD COLUMN $input_name VARCHAR(2)");
  if ($tipoCampo == 'select')
    mysqli_query($conn3, "ALTER TABLE $nombreTabla ADD COLUMN $input_name VARCHAR(200)");
  if ($tipoCampo == 'selectmultiple')
    mysqli_query($conn3, "ALTER TABLE $nombreTabla ADD COLUMN $input_name text");
  if ($tipoCampo == 'date')
    mysqli_query($conn3, "ALTER TABLE $nombreTabla ADD COLUMN $input_name date");
  if ($tipoCampo == 'file')
    mysqli_query($conn3, "ALTER TABLE $nombreTabla ADD COLUMN $input_name text");


  if (
    $tipoCampo <> 'number' && $tipoCampo <> 'separador' && $tipoCampo <> 'imagen' && $tipoCampo <> 'file' && $tipoCampo <> 'date'
    && $tipoCampo <> 'selectmultiple' && $tipoCampo <> 'moduloplegable_inicio' && $tipoCampo <> 'moduloplegable_final'
  ) {


    if ($update != '') {

      $valores .=  "," . $input_name . " = '" . reem($_POST[$input_name]) . "'";
    } else {
      $valores .=  ',' . $input_name;


      $input_name = reem($_POST[$input_name]);


      $query .=  ", '$input_name'";
    }
  }

  if ($tipoCampo == 'selectmultiple') {
    $selectmultiple = reem($_POST[$input_name]);

    if ($update != '') {

      $valores .=  "," . $input_name;
    } else {
      $valores .=  ',' . $input_name;
      $input_name = $input_name;
    }

    if ($update != '') {

      $queryListhc = mysqli_query($conn3, "SELECT $input_name FROM $nombreTabla where id = $update");
      // $nrowl = mysqli_num_rows($queryListhc);
      if ($queryListhc) {
        while ($rowhc = mysqli_fetch_array($queryListhc)) {
          $field = $rowhc[$input_name];
        }
      }

      $valores .= " = '"; //.$field;
      for ($i = 0; $i < count($selectmultiple); $i++) {
        $valores .=  "|" . $selectmultiple[$i];
      }
      $valores .= "'";
    } else {
      $query .= ", '";
      for ($i = 0; $i < count($selectmultiple); $i++) {
        $query .=  "|" . $selectmultiple[$i];
      }
      $query .= "'";
    }
  }

  if ($tipoCampo == 'number') {
    if (reem($_POST[$input_name]) == '') {


      if ($update != '') {

        $valores .=  "," . $input_name . " = '0'";
      } else {
        $valores .=  ',' . $input_name;


        $input_name = '0';


        $query .=  ", '$input_name'";
      }
    } else {
      if ($update != '') {

        $valores .=  "," . $input_name . " = '" . reem($_POST[$input_name]) . "'";
      } else {
        $valores .=  ',' . $input_name;


        $input_name = reem($_POST[$input_name]);


        $query .=  ", '$input_name'";
      }
    }
  }

  if ($tipoCampo == 'date') {
    if (reem($_POST[$input_name]) == '') {


      if ($update != '') {

        $valores .=  "," . $input_name . " = '0000-00-00'";
      } else {
        $valores .=  ',' . $input_name;


        $input_name = '0000-00-00';


        $query .=  ", '$input_name'";
      }
    } else {
      if ($update != '') {

        $valores .=  "," . $input_name . " = '" . reem($_POST[$input_name]) . "'";
      } else {
        $valores .=  ',' . $input_name;


        $input_name = reem($_POST[$input_name]);


        $query .=  ", '$input_name'";
      }
    }
  }

  if ($tipoCampo == 'file') {

    mkdir('img/historia/' . $idHistoria . '/', 0777, true);

    $uri = $_SERVER['REQUEST_URI'];
    $exploded_uri = explode('/', $uri);
    $domain_name = $exploded_uri[1];
    $currentPath = $_SERVER['PHP_SELF'];
    $pathInfo = pathinfo($currentPath);
    $hostName = $_SERVER['HTTP_HOST'];
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https' ? 'https' : 'https';
    $urlBase = $protocol . '://' . $hostName . "/" . $domain_name;

    if ($update != '') {

      $valores .=  "," . $input_name;
    } else {
      $valores .=  ',' . $input_name;
      $input_name = $input_name;
    }

    $f = array();
    for ($i = 0; $i < count($_FILES[$input_name]['name']); $i++) {
      $fileName = $_FILES[$input_name]['name'][$i];
      $f[$i] = $idHistoria . md5(uniqid()) . $fileName;
      //target_path = "img/historia/".$f;
      //$ext = explode('.', basename( $_FILES['file']['name'][$i]));
      //$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext)-1]; 
      $uploadFileDir = 'img/historia/' . $idHistoria . '/';
      $target_path = $uploadFileDir . $f[$i];

      if (move_uploaded_file($_FILES[$input_name]['tmp_name'][$i], $target_path));
      // else echo 'Err';
    }

    if ($update != '') {

      $queryListhc = mysqli_query($conn3, "SELECT $input_name FROM $nombreTabla where id = $update");
      // $nrowl = mysqli_num_rows($queryListhc);
      while ($rowhc = mysqli_fetch_array($queryListhc)) {
        $field = $rowhc[$input_name];
      }

      $valores .= " = '" . $field;
      if ($fileName != '')
        for ($i = 0; $i < count($f); $i++) {
          $valores .=  "|" . $urlBase . "/" . $uploadFileDir . $f[$i];
        }
      $valores .= "'";
    } else {
      $query .= ", '";
      for ($i = 0; $i < count($f); $i++) {
        $query .=  "|" . $urlBase . "/" . $uploadFileDir . $f[$i];
      }
      $query .= "'";
    }
  }
}
// echo $valores;
// echo '<br>----------------  ----<br>';
// echo $query;
// echo '<br>----------------  ----<br>';
// echo '<br>----------------  ----<br>';



$queryAuditor = "INSERT INTO $nombreTabla ($valores) VALUES  ($query);";
$queryAuditor = str_replace("'", '', $queryAuditor);
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);
//echo $queryAuditor;

auditorMaster($idusuario, '1', $enlace_actual, $queryAuditor);
//exit();


if ($update != '') {
  // echo "UPDATE $nombreTabla SET " . trim($valores, ',') . " WHERE id='" . $update . "'";
  mysqli_query($conn3, "UPDATE $nombreTabla SET " . trim($valores, ',') . " WHERE id='" . $update . "'");
} else {


  // echo "INSERT INTO $nombreTabla ($valores) VALUES  ($query);";


  //echo "INSERT INTO $nombreTabla ($valores) VALUES  ($query);";
  //echo "INSERT INTO $nombreTabla ($valores) VALUES  ($query);";
  mysqli_query($conn3, "INSERT INTO $nombreTabla ($valores) VALUES  ($query);");
}








$queryListhc = mysqli_query($conn3, "SELECT MAX(id) as historiaClinica1 from $nombreTabla where cliente_id = $clienteId");
// $nrowl = mysqli_num_rows($queryListhc);
while ($rowhc = mysqli_fetch_array($queryListhc)) {
  $historiaClinica1 = $rowhc['historiaClinica1'];
}



if ($ID_Tabla == '5') { mysqli_query($conn3,"UPDATE $nombreTabla SET D1 = '$diaganostico1' , D2 = '$diaganostico2', D3 ='$diaganostico3', nota1 ='$Ob1', nota2 ='$Ob2', nota3='$Ob3' WHERE id ='$historiaClinica1'");



}

if ($ID_Tabla == '15') {
  mysqli_query($conn3, "UPDATE $nombreTabla SET antecedentes = '$antecedentesPers' , peso = '$peso', talla ='$altura', imc ='$imc', corporal ='$ComposicionCorporal', otros='$examenFisico', observacion='$examenObservacion' WHERE id ='$historiaClinica1'");
}





if ($ID_Tabla == '16') {
  mysqli_query($conn3, "UPDATE $nombreTabla SET resultado = '$resultado' WHERE id ='$historiaClinica1'");
}


if ($ID_Tabla == '17') {
  mysqli_query($conn3, "UPDATE $nombreTabla SET resultado = '$respuesta', interpretacion = '$interpretacion' WHERE id ='$historiaClinica1'");
}


if ($ID_Tabla == '19') {
  mysqli_query($conn3, "UPDATE $nombreTabla SET idMetodo = '$metodo' WHERE id ='$historiaClinica1'");
}

if (isset($_POST['tipo_pie'])) {
  $tipo_pie = $_POST['tipo_pie'];
}

if (isset($_POST['planta_pie'])) {
  $planta_pie = $_POST['planta_pie'];
}

if ($ID_Tabla == '78') {
  foreach ($tipo_pie as $tipo) {
      mysqli_query($conn3, "UPDATE $nombreTabla  Set Tipo_Pie = '$tipo' WHERE id ='$historiaClinica1'");
  }

  foreach ($planta_pie as $planta) {
      mysqli_query($conn3, "UPDATE $nombreTabla  Set Planta_Pie = '$planta' WHERE id ='$historiaClinica1'");
  }
}


// historia audiometria -> id = 34 
if ($ID_Tabla == '34') {
  include 'configDatosAdicionalesHistoriaAudiologia.php';
}
// cierre de historia de audiometria -> 34

// ---------------------------------------------
// para rayado
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

//////////////////? AUTOGUARDADO/////////////////
if($_POST['Ruta_Historia_AutoGuardado']!=""){
  $Ruta_Historia_AutoGuardado = $_POST['Ruta_Historia_AutoGuardado'];
  $cliente_id = $_POST['clienteId'];
  $usuario_id = $_POST['ID'];
  $query = "UPDATE AutoGuardado SET Estado='0' WHERE cliente_id = '$cliente_id' and usuario_id = '$usuario_id' and Ruta = '$Ruta_Historia_AutoGuardado' AND Estado = '1' ";
  mysqli_query($conn3, $query);
}
//////////////////? AUTOGUARDADO/////////////////


echo "<script language='Javascript'> window.location='cFinalizado?iC=".encrypt($historiaClinica1)."&iCr=".encrypt($idHistoria)."';</script>";
