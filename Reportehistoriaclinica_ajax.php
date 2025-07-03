<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/conn3.php");

$tipo = $_POST['tipo'];
$ID = $_POST['ID'];

$data = [['Fecha', 'Motivo Consulta', 'Cie10', 'Diagnostico']];
$queryListc = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$tipo");
$nrowl = mysqli_num_rows($queryListc);
while ($rowc = mysqli_fetch_array($queryListc)) {
    $nombre_cliente     = $rowc['nombre_cliente'];
    $CODI_CLIENTE       = $rowc['CODI_CLIENTE'];
}
$queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where usuario_id=$ID and cliente_id = $tipo");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $cliente_id = $rowMotorizado['cliente_id'];
    $Fecha = $rowMotorizado['fecha'];
    $motivoConsulta = $rowMotorizado['EnfermedadActual'];
    $diagnostico1 = funcionMaster($rowMotorizado['CIE10_1'], 'codigo', 'descripcion', 'cie10');
    $diagnostico2 = funcionMaster($rowMotorizado['CIE10_2'], 'codigo', 'descripcion', 'cie10');
    $diagnostico3 = funcionMaster($rowMotorizado['CIE10_3'], 'codigo', 'descripcion', 'cie10');
    $diagnostico4 = funcionMaster($rowMotorizado['CIE10_4'], 'codigo', 'descripcion', 'cie10');
    $cie101 = $rowMotorizado['CIE10_1'];
    $cie102 = $rowMotorizado['CIE10_2'];
    $cie103 = $rowMotorizado['CIE10_3'];
    $cie104 = $rowMotorizado['CIE10_4'];
    //unir los 4 diagnosticos separados con ,
    $diagnostico = $diagnostico1 . ', ' . $diagnostico2 . ', ' . $diagnostico3 . ', ' . $diagnostico4;
    //trim ,
    $diagnosticos = trim($diagnostico, ', ');

    $cie10 = $cie101 . ', ' . $cie102 . ', ' . $cie103 . ', ' . $cie104;
    $cie10 = trim($cie10, ', ');
    
    $data[] = [$Fecha, $motivoConsulta, $cie10, $diagnosticos];
    $data[] = $rowData;
}
echo json_encode($data);
