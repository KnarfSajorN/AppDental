<?php 
session_start();
include '../funciones/funciones.php';
include '../funciones/conn3.php';

// recibir el post
$uI = 0 + base64_decode($_POST['uI']);

// cargar datos
if ($uI > 0) {
    $queryComandos = "SELECT * from asistenteVirtualCommandsUsers
    WHERE 1=1
    and usuarioId = '$uI'
    and activo = 1
    ";
    $resultComandos = mysqli_query($conn3, $queryComandos);
    if ($resultComandos) {
        $arrayComandosConverted = [];
        while ($rowComandos = mysqli_fetch_assoc($resultComandos)) {
            $arrayComandosConvertedThis = [];
            foreach ($rowComandos as $key => $value) {
                $arrayComandosConvertedThis[base64_encode($key)] = base64_encode(strtolower($value));
            }
            array_push($arrayComandosConverted, $arrayComandosConvertedThis);
        }
        echo json_encode($arrayComandosConverted);
    }
}

?>