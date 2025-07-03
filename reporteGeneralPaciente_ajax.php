<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/conn3.php");
mysqli_set_charset($conn3, 'utf8');



$tipo = $_POST['paciente'];
$ID = $_POST['ID'];

$response = [['Fecha', 'motivo de consulta', 'cie10', 'diagnostico']];

$queryList = mysqli_query($conn3, "SELECT * FROM historiaClinica2 where usuario_id=$ID and cliente_id = $tipo");
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Fecha = $rowMotorizado['fecha'];
        $motivoConsulta = $rowMotorizado['EnfermedadActual'];
        $motivoConsulta = str_replace('<br>', PHP_EOL, $motivoConsulta);
        $diagnostico1 = funcionMaster($rowMotorizado['CIE10_1'], 'codigo', 'descripcion', 'cie10');
        $diagnostico2 = funcionMaster($rowMotorizado['CIE10_2'], 'codigo', 'descripcion', 'cie10');
        $diagnostico3 = funcionMaster($rowMotorizado['CIE10_3'], 'codigo', 'descripcion', 'cie10');
        $diagnostico4 = funcionMaster($rowMotorizado['CIE10_4'], 'codigo', 'descripcion', 'cie10');
        $cie101 = $rowMotorizado['CIE10_1'];
            $cie102 = $rowMotorizado['CIE10_2'];
            $cie103 = $rowMotorizado['CIE10_3'];
            $cie104 = $rowMotorizado['CIE10_4'];
        //unir los 4 diagnósticos separados con ,
        $diagnostico = $diagnostico1 . ', ' . $diagnostico2 . ', ' . $diagnostico3 . ', ' . $diagnostico4;
        //trim ,
        $diagnosticos = trim($diagnostico, ', ');

        $cie10 = $cie101 . ', ' . $cie102 . ', ' . $cie103 . ', ' . $cie104;
        $cie10 = trim($cie10, ', ');

        $response[] = [
            $Fecha,
            $motivoConsulta,
            $cie10,
            $diagnosticos, 
        ];
    }
}

header('Content-Type: application/json; charset=UTF-8');
echo json_encode($response, JSON_UNESCAPED_UNICODE);
