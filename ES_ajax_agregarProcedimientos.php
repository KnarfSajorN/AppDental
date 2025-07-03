<?php
date_default_timezone_set('America/Bogota');
include "funciones/conn3.php";


if($_POST["Tipo_Consulta"]=="Agregar Formula"){

    $inventario_id  = $_POST['formula'];
    $queryList=mysqli_query($conn3,"SELECT * FROM  sinvetrios WHERE ID='$inventario_id'");
    while($row_recordset32=mysqli_fetch_array($queryList))
    {
        //$Nombre = mysqli_real_escape_string($conn3,$row_recordset32['descripcion']);
    }
    $id_usuario = $_POST['id_usuario'];
    $ID_formula = $_POST['ID_formula'];
    $numerosesiones = $_POST['numerosesiones'];
    $precio = $_POST['precio'];
    $fechar = date("Y-m-d");
  
 
 
    $QueryRespuesta = mysqli_query($conn3, "INSERT INTO ES_Paquete_Procedimientos(usuario_id, Nombre, paquete_id, Numerosesiones, Precio, Fecha, inventario_id) 
                    VALUES ('$id_usuario','$Nombre','$ID_formula','$numerosesiones', '$precio', '$fechar','$inventario_id');");


              
//echo "<script language='Javascript'> window.location='ES_VerFormula.php?id=$ID_formula';</script>";
    if ($QueryRespuesta != true) {
        $Arreglo["Estado"]='ES_VerFormula?id='.$ID_formula.'&error=Hubo Un Error Al Guardar Los Datos';
    } else {
        $Arreglo["Estado"]='ES_VerFormula?id='.$ID_formula.'&msg=Se Guardaron Los Datos Correctamente';
    }
echo json_encode($Arreglo);
}

if($_POST["Tipo_Consulta"]=="Eliminar Formula"){

    $idformula	= $_POST['idformula'];
    $idmedicamento	= $_POST['idmedicamento'];
    $UpdatePaquete = mysqli_query($conn3, "UPDATE ES_Paquete_Procedimientos SET activo = 0 WHERE id = '$idmedicamento' limit 1");
    $AfectadasUp = mysqli_affected_rows($conn3);

    if($AfectadasUp > 0 ){
        $Arreglo["Estado"]=true;
        $Arreglo["Ruta"]='ES_VerFormula?id='.$idformula.'&error=Se Elimino Correctamente';
    }else{
        $Arreglo["Estado"]=false;
        $Arreglo["Ruta"]='ES_VerFormula?id='.$idformula.'';
    }
    echo json_encode($Arreglo);
}



?>