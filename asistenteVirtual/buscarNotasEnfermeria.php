<?php
include '../funciones/conn3.php';

// recibir post
$documento = $_POST['documento'];

// query
$queryPaciente = "SELECT * from cliente where CODI_CLIENTE like '$documento' limit 1";
$resultPaciente = mysqli_query($conn3, $queryPaciente);
$rowPaciente = mysqli_fetch_assoc($resultPaciente);
$return = array();
if ($rowPaciente['CODI_CLIENTE'] == $documento) {
    // buscar las notas de enfermería
    $queryNota = "SELECT * from NotaEnfermeria where idCliente = '" . $rowPaciente['cliente_id'] . "' order by id desc limit 5";
    $resultNota = mysqli_query($conn3, $queryNota);
    if ($resultNota) {
        $cont = 0;
        while ($rowNota = mysqli_fetch_assoc($resultNota)) {
            $cont = $cont + 1;
            array_push($return, ['numero' => $cont, 'fecha' => $rowNota['updated_at'], 'nota' => $rowNota['notaEnfermeria'] ]);
        }
    }
}

echo json_encode($return);
