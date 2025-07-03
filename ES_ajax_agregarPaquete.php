<?php
date_default_timezone_set('America/Bogota');
 
include("funciones/conn3.php");

if($_POST["Tipo_Consulta"]=="Agregar Paquete"){

    $formula	= $_POST['formula'];
    $id_usuario	= $_POST['id_usuario'];
    $fechar = date("Y-m-d");
  
 
 
 $QueryRespuesta = mysqli_query($conn3, "INSERT INTO ES_Paquete (usuario_id, Nombre, Fecha) 
                    VALUES ('$id_usuario','$formula', '$fechar');");

    if ($QueryRespuesta != true) {
        $Arreglo["Estado"]='ES_PaquetesProcedimiento?error=Hubo Un Error Al Guardar Los Datos';
    } else {
        $Arreglo["Estado"]='ES_PaquetesProcedimiento?msg=Se Guardaron Los Datos Correctamente';
    }
    echo json_encode($Arreglo);
}

    
 if($_POST["Tipo_Consulta"]=="Eliminar Paquete"){

    $id	= $_POST['id'];
  
    $UpdatePaquete = mysqli_query($conn3, "UPDATE ES_Paquete SET Activo = 0 WHERE id = '$id' limit 1");
    $AfectadasUp = mysqli_affected_rows($conn3);

    if($AfectadasUp > 0 ){
        $Arreglo["Estado"]=true;
        $Arreglo["Ruta"]='ES_PaquetesProcedimiento?error=Se Elimino Correctamente';
    }else{
        $Arreglo["Estado"]=false;
        $Arreglo["Ruta"]='ES_PaquetesProcedimiento';
    }
    echo json_encode($Arreglo);
}



?>