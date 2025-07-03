<?php 
    include "../funciones/funciones.php";
    include "../funciones/conn3.php";

    $tipo = $_POST['tipo'];

    if ($tipo == "Crear_QR") {
        $idUsuario = $_POST['idUsuario'];
        $enlace = $Base . "registroPaciente_QR?idU=" . $idUsuario;

        $array = array();
        
        if (mysqli_query($conn3, "UPDATE config SET enlaceRegistroPaciente = '$enlace' WHERE ID_Usuario = '$idUsuario'")) {
            $array['status'] = "success";
            $array['nombreUsuario'] = funcionMaster($idUsuario, "ID", "NOMBRE_USUARIO", "usuarios");
            $array['link'] = base64_encode($enlace);
        }else{
            $array['status'] = "error";
            $array['link'] = '';
            $array['query'] = "UPDATE config SET enlaceRegistroPaciente = '$enlace' WHERE ID_Usuario = '$idUsuario'";
        }
        
        echo json_encode($array);

    }elseif ($tipo == "Consultar_QR") {
        $idUsuario = $_POST['idUsuario'];

        $array = array();

        $enlace = funcionMaster($idUsuario, "ID_Usuario", "enlaceRegistroPaciente", "config");
        
        $array['status'] = "success";
        $array['nombreUsuario'] = funcionMaster($idUsuario, "ID", "NOMBRE_USUARIO", "usuarios");
        $array['link'] = base64_encode($enlace);

        
        echo json_encode($array);
    }else if ($tipo == "Activar_Desactivar") {
        $estado = $_POST['estado'];
        $idUsuario = $_POST['idUsuario'];
        mysqli_query($conn3, "UPDATE config SET enlaceActivo = '$estado' WHERE ID_Usuario = '$idUsuario'");
    }else if ($tipo == "Crear_QR_IA") {
        $idUsuario = $_POST['idUsuario'];
        $enlace = $Base . "asistenteP?idU=" . $idUsuario;

        $array = array();
        
        if (mysqli_query($conn3, "UPDATE config SET enlaceRegistroPaciente_IA = '$enlace' WHERE ID_Usuario = '$idUsuario'")) {
            $array['status'] = "success";
            $array['nombreUsuario'] = funcionMaster($idUsuario, "ID", "NOMBRE_USUARIO", "usuarios");
            $array['link'] = base64_encode($enlace);
        }else{
            $array['status'] = "error";
            $array['link'] = '';
            $array['query'] = "UPDATE config SET enlaceRegistroPaciente_IA = '$enlace' WHERE ID_Usuario = '$idUsuario'";
        }
        
        echo json_encode($array);

    }elseif ($tipo == "Consultar_QR_IA") {
        $idUsuario = $_POST['idUsuario'];

        $array = array();

        $enlace = funcionMaster($idUsuario, "ID_Usuario", "enlaceRegistroPaciente_IA", "config");
        
        $array['status'] = "success";
        $array['nombreUsuario'] = funcionMaster($idUsuario, "ID", "NOMBRE_USUARIO", "usuarios");
        $array['link'] = base64_encode($enlace);

        
        echo json_encode($array);
    }

?>