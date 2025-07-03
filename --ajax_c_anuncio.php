<?php 
    include "funciones/funciones.php";
    include "funciones/conn3.php";
    $tipo = $_POST['tipo'];

    if ($tipo == 'Cambiar_Leido_Msg') {

        $idMsg = $_POST['idMsg'];
        $estadoActual = funcionMaster($idMsg, "id", "estado", "c_contactanos");

        if ($estadoActual == 1) {
            mysqli_query($conn3, "UPDATE c_contactanos SET estado = 0 WHERE id='$idMsg'"); 
        }else{
            mysqli_query($conn3, "UPDATE c_contactanos SET estado = 1 WHERE id='$idMsg'"); 
        }

        $estadoActual = funcionMaster($idMsg, "id", "estado", "c_contactanos");

        $data = array();
        $data['estadoActual'] = $estadoActual;
        echo json_encode($data);

    }else if($tipo == 'Cambiar_Destacado_Msg'){
        $idMsg = $_POST['idMsg'];
        $estadoActual = funcionMaster($idMsg, "id", "destacado", "c_contactanos");

        if ($estadoActual == 1) {
            mysqli_query($conn3, "UPDATE c_contactanos SET destacado = 0 WHERE id='$idMsg'"); 
        }else{
            mysqli_query($conn3, "UPDATE c_contactanos SET destacado = 1 WHERE id='$idMsg'"); 
        }

        $estadoActual = funcionMaster($idMsg, "id", "destacado", "c_contactanos");

        $data = array();
        $data['estadoActual'] = $estadoActual;
        echo json_encode($data);
    }

?>