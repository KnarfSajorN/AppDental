<?php 
    session_start();
    include "funciones/conn3.php";
    date_default_timezone_set("America/Bogota");
    // include "funciones/funciones.php";


    if ($_POST['tipo'] == 'Ingreso') {
        $clienteId = $_POST['cI'];
        $usuarioId = $_POST['userId'];

        $fecha = date("Y-m-d");
        $hora = date("H:i:s");

        $arreglo = array();

        if (mysqli_query($conn3, "INSERT INTO paciente_atencion SET 
            fecha = '$fecha',
            hora = '$hora',
            usuarioId = '$usuarioId',
            clienteId = '$clienteId'
        ")) {
            $arreglo['status'] = "success";
            $_SESSION['cI'] = $_POST['cI'];
        }else{
            $arreglo['status'] = "error";
            $arreglo['error'] = mysqli_error($conn3);
        }

        echo json_encode($arreglo);
    }

    if ($_POST['tipo'] == 'Salida') {
        $arreglo = array();
        $fecha_actual = date("Y-m-d");
        $hora_actual = date("H:i:s");

        $idAtencion =   $_POST['idAtencion'];
        if (mysqli_query($conn3, "UPDATE paciente_atencion SET activo = 0,fechaSalida = '$fecha_actual' , horaSalida='$hora_actual' WHERE ID = '$idAtencion'  ")) {
            $arreglo['status'] = "success";
            unset($_SESSION['cI']);
        }else{
            $arreglo['status'] = "error";
            $arreglo['error'] = mysqli_error($conn3);
        }
        echo json_encode($arreglo);
    }
    
    

?>