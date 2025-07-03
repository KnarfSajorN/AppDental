<?php
date_default_timezone_set('America/Bogota');
include "funciones/conn3.php";


if($_POST["Tipo_Consulta"]=="Agregar Formula"){

    $inventario_id  = $_POST['formula'];
    $queryList=mysqli_query($conn3,"SELECT * FROM  RM_Medicamentos WHERE id='$inventario_id'");
    while($row_recordset32=mysqli_fetch_array($queryList))
    {
        $Nombre = mysqli_real_escape_string($conn3,$row_recordset32['Nombre']);
    }
    $id_usuario = $_POST['id_usuario'];
    $ID_formula = $_POST['ID_formula'];
    $Cantidad = $_POST['Cantidad'];
    $Presentacion = $_POST['Presentacion'];
    $Via_Administracion = $_POST['Via_Administracion'];
    $Composicion = $_POST['Composicion'];
    $Dosis = $_POST['Dosis'];
    $Indicaciones = $_POST['Indicaciones'];
    $ID_principal = $_POST['ID_principal'];
    $numerosesiones = 0;
    $precio = 0;
    $fechar = date("Y-m-d");
  
 
 
    $QueryRespuesta = mysqli_query($conn3, "INSERT INTO RM_Paquetes_Medicamentos(usuario_id, Nombre, paquete_id, Numerosesiones, Precio, Fecha, inventario_id,Cantidad, Presentacion, Via_Administracion, Composicion, Dosis, Indicaciones, Indicaciones_Generales,ID_principal) 
                    VALUES ('$id_usuario','$Nombre','$ID_formula','$numerosesiones', '$precio', '$fechar','$inventario_id','$Cantidad', '$Presentacion','$Via_Administracion', '$Composicion', '$Dosis','$Indicaciones','$Indicaciones_Generales','$ID_principal');");
//  $QueryRespuesta = mysqli_query($conn3, "INSERT INTO RM_Paquetes_Medicamentos(usuario_id, Nombre, paquete_id, Fecha, inventario_id, Cantidad, Presentacion, Via_Administracion, Composicion, Dosis, Indicaciones, Indicaciones_Generales) 
//  VALUES ('$id_usuario','$Nombre','$ID_formula', '$fechar','$inventario_id',$Cantidad, $Presentacion,$Via_Administracion, $Composicion, $Dosis,$Indicaciones,$Indicaciones_Generales);");



              
//echo "<script language='Javascript'> window.location='ES_VerFormula.php?id=$ID_formula';</script>";
    if ($QueryRespuesta != true) {
        $Arreglo["Estado"]='RM_VerPaquete.php?id='.$ID_formula.'&error=Hubo Un Error Al Guardar Los Datos';
    } else {
        $Arreglo["Estado"]='RM_VerPaquete.php?id='.$ID_formula.'&msg=Se Guardaron Los Datos Correctamente';
    }
echo json_encode($Arreglo);
}

if($_POST["Tipo_Consulta"]=="Eliminar Formula"){

    $idformula	= $_POST['idformula'];
    $idmedicamento	= $_POST['idmedicamento'];
    $UpdatePaquete = mysqli_query($conn3, "UPDATE RM_Paquetes_Medicamentos SET activo = 0 WHERE id = '$idmedicamento' limit 1");
    $AfectadasUp = mysqli_affected_rows($conn3);

    if($AfectadasUp > 0 ){
        $Arreglo["Estado"]=true;
        $Arreglo["Ruta"]='RM_VerPaquete.php?id='.$idformula.'&error=Se Elimino Correctamente';
    }else{
        $Arreglo["Estado"]=false;
        $Arreglo["Ruta"]='RM_VerPaquete.php?id='.$idformula.'';
    }
    echo json_encode($Arreglo);
}



?>