<?php
date_default_timezone_set('America/Bogota');
 
include("funciones/conn3.php");

if($_POST["Tipo_Consulta"]=="Agregar Paquete"){

    $formula	= $_POST['formula'];
    $id_usuario	= $_POST['id_usuario'];
    $ID_principal = $_POST['ID_principal'];
    $fechar = date("Y-m-d");
  
 
 
 $QueryRespuesta = mysqli_query($conn3, "INSERT INTO RM_Paquete (usuario_id, Nombre, Fecha, ID_principal) 
                    VALUES ('$id_usuario','$formula', '$fechar','$ID_principal');");

    if ($QueryRespuesta != true) {
        $Arreglo["Estado"]='RM_PaquetesMedicamentos.php?error=Hubo Un Error Al Guardar Los Datos';
    } else {
        $Arreglo["Estado"]='RM_PaquetesMedicamentos.php?msg=Se Guardaron Los Datos Correctamente';
    }
    echo json_encode($Arreglo);
}

    
 if($_POST["Tipo_Consulta"]=="Eliminar Paquete"){

    $id	= $_POST['id'];
  
    $UpdatePaquete = mysqli_query($conn3, "UPDATE RM_Paquete SET Activo = 0 WHERE (ID_principal = $ID_principal or ID_principal = $id_usuario) limit 1");
    $AfectadasUp = mysqli_affected_rows($conn3);

    if($AfectadasUp > 0 ){
        $Arreglo["Estado"]=true;
        $Arreglo["Ruta"]='RM_PaquetesMedicamentos.php?error=Se Elimino Correctamente';
    }else{
        $Arreglo["Estado"]=false;
        $Arreglo["Ruta"]='RM_PaquetesMedicamentos.php';
    }
    echo json_encode($Arreglo);
}



?>