<?php
//include 'header.php';
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';


date_default_timezone_set('America/Bogota');

$registro              = $_POST['registro'];
$ID                    = $_POST['ID'];
$idusuario                    = $_POST['ID'];
$clienteId             = $_POST['clienteId'];
$usuario_id             = $_POST['usuario_id'];
$Afechar               = date("Y-m-d H:i:s");






$fechaconsulta = date('Y-m-d', strtotime($_POST['fechaconsulta']));
$hora                  = date("H:i:s");

$comentariosgeneral = $_POST['comentariosgeneral'];




//Antecedentes



//Antecedentes Laborales 
$antecedenteContent = $_POST['antecedenteContent'];
$servicioContent = $_POST['servicioContent'];



//Accidentes Laborales
$indicacionesclinicas = $_POST['indicacionesclinicas'];



$nota   = $_POST['tarea2'];


//mysqli_query($conn3, "INSERT INTO historiaClinica6_fisioterapia set imagen  = '$dataURL' WHERE id = '$historiaClinica1';");
/*##############################################################################################################################################################################*/
/*##############################################################################################################################################################################*/

/*//define('UPLOAD_DIR', 'pascientes/'); 
$imagenCodificada = $_POST["tarea"];
$imagenCodificadaLimpia = str_replace("data:image/png;base64,", "", $imagenCodificada);
$imagenDecodificada = base64_decode($imagenCodificadaLimpia);
$nombreImagenGuardada = "imagen_" . uniqid() . ".png";
//$success = file_put_contents(UPLOAD_DIR , $nombreImagenGuardada);
$destino = 'pascientes/';
$tmp_name = $_FILES["tarea"]["tmp_name"];
//move_uploaded_file($destino, $nombreImagenGuardada);
move_uploaded_file($tmp_name, "$destino/$nombreImagenGuardada"); // Subimos el archivo 
*/



    define('UPLOAD_DIR', 'ImagenesFisioterapia/');
    $img = $_POST['tarea'];
    if ($img <> "") {
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        //$file = UPLOAD_DIR.uniqid().'.png';  //nombre del archivo
        //$file = $nombre_cliente.rand(1,9999).'.png';
        $fechahora = date("Y-m-d_H-i-s");
        $name = str_replace(' ', '', $nombre_cliente);
        $nombre_foto = "{$clienteId}__{$fechahora}.png";
        $success = file_put_contents(UPLOAD_DIR . $nombre_foto, $data);
       
        //print $success ? $file : 'Unable to save the file.'; 
    }

    $query = "INSERT INTO Historia_Clinica_Fisioterapia_1 (cliente_id, usuario_id, Fecha, Hora, comentariosgeneral, servicioContent, indicacionesclinicas,imagen,nota) 
    VALUES ($clienteId, $ID, $fechaconsulta, $hora, $comentariosgeneral, $servicioContent, $indicacionesclinicas,$nombre_foto,$nota);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

mysqli_query($conn3, "INSERT INTO Historia_Clinica_Fisioterapia_1 (cliente_id, usuario_id, Fecha, Hora, comentariosgeneral, servicioContent, indicacionesclinicas,imagen,nota) 
    VALUES ('$clienteId', '$ID', '$fechaconsulta ', '$hora', '$comentariosgeneral', '$servicioContent', '$indicacionesclinicas','$nombre_foto','$nota')");


$historiaClinica1 = mysqli_insert_id($conn3);


$receta_id = $_POST['receta_id'];
if ($receta_validacion != "") {
	$RecetaId = $receta;
} else {
	$RecetaId = "0";
}


// Para el Recetario
$Recetario_Nombre_Historia = "Historia_Clinica_Fisioterapia_1";
$Recetario_historia_id = $historiaClinica1;
$Recetario_cliente_id = $clienteId;
$Recetario_usuario_id = $ID;

//echo "UPDATE RM_Recetario SET Estado = 'Cerrado' WHERE receta_id = '$receta_id' AND cliente_id = '$Recetario_cliente_id' AND usuario_id ='$Recetario_usuario_id' ";
include 'RM_GuardarRecetaHistoria.php';

//mysqli_query($conn3, "UPDATE historiaClinica7_fisioterapia set imagen  = '$dataURL' WHERE id = '$historiaClinica1';");
          //mssql_query("INSERT INTO examenFisico (usuario_id, cliente_id, peso, altura, imc, ComposicionCorporal, estadoGeneral, estadoConciencia, ojos, otoscopia, cavidadOral, cuello, torax, corazon, abdomen, genitoUrinario, extremidades, vacularPeriferico, sistemaNervioso, pielAnexos, examenPartesdCuerpo, tart, temperatura, fcard, sat, fechaHora, historia_id) VALUES ('$idexamenFisico', '$ID', '$clienteId', '$peso', '$altura', '$imc', '$ComposicionCorporal', '$estadoGeneral', '$estadoConciencia', '$ojos', '$otoscopia', '$cavidadOral', '$cuello', '$torax', '$corazon', '$abdomen', '$genitoUrinario', '$extremidades', '$vacularPeriferico', '$sistemaNervioso', '$pielAnexos', '$examenPartesdCuerpo', '$examenFisico', '$temp', '$fcard', '$sat', '$Afechar', '$historiaClinica1');");
  //////////////////AUTOGUARDADO///////////////////////////////////////////////////////////////
  if($_POST['Ruta_Historia_AutoGuardado']!=""){
	$Ruta_Historia_AutoGuardado = $_POST['Ruta_Historia_AutoGuardado'];

	$query = "UPDATE AutoGuardado SET Estado='0' WHERE cliente_id = '$clienteId' and usuario_id = '$ID' and Ruta = '$Ruta_Historia_AutoGuardado' AND Estado = '1' ";
	mysqli_query($conn3, $query);
}




//echo "<script language='Javascript'> window.location='finalizadoLaboral_ant.php?historiaClinica1=$historiaClinica1';</script>";
echo "<script language='Javascript'> window.location='HFT1_Finalizado_Historia_Fisioterapia?historiaClinica1=$historiaClinica1 ';</script>";
