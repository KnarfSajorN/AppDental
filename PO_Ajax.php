<?php
include("funciones/conn3.php");
date_default_timezone_set('America/Bogota');

function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla)
{
    include 'funciones/conn3.php';
    $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
    $nrowl = mysqli_num_rows($query);
    while ($row = mysqli_fetch_array($query)) {

        $text = $row[$campoImprimir];
    }
    return  $text;
}


if ($_POST["Tipo_Consulta"] == "Guardar Datos Periodoncia") {
    
        $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'PO_Periodoncia'");
        $nrowtabla = mysqli_num_rows($tabla);
        if ($nrowtabla == 0) {
    
            $query = "CREATE TABLE `PO_Periodoncia` (
            `id` int(11) NOT NULL,
            `Fecha` date DEFAULT NULL,
            `Hora` time NOT NULL,
            `cliente_id` int(11) DEFAULT NULL,
            `usuario_id` int(11) DEFAULT NULL,
            `Activo` varchar(5) DEFAULT '1'
          ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
    
            $creaciontabla = mysqli_query($conn3, $query);
            if (!$creaciontabla) {
                echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
            } else {
                mysqli_query($conn3, "ALTER TABLE `PO_Periodoncia` ADD PRIMARY KEY (`id`);");
                mysqli_query($conn3, "ALTER TABLE `PO_Periodoncia` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
            }
        }
        
    // Actualizar el valor del campo
    $Nombre = $_POST["name"]; // Input modal 
    $Value = $_POST["value"]; // Input modal

    $tipo = $_POST["tipo"];

    $verificar_campo = mysqli_query($conn3, "SHOW COLUMNS FROM `PO_Periodoncia` WHERE Field = '$Nombre'");
    $existe_campo = mysqli_num_rows($verificar_campo);

    if ($existe_campo == 0) {
        // Si el campo no existe, crearlo
        if($tipo=="1"){
            $query = "ALTER TABLE `PO_Periodoncia` ADD `$Nombre` TEXT NULL DEFAULT '0';";
        }else{
            $query = "ALTER TABLE `PO_Periodoncia` ADD `$Nombre` TEXT NULL;";
        }
        
        $creacion_campo = mysqli_query($conn3, $query);
        if (!$creacion_campo) {
            echo "<script language='Javascript'> alert('error en la creación del campo');</script>";
            echo $query;
        }
    }
    
    $Fecha = date("Y-m-d");
    $Hora = date("H:i:s");

    $cliente_id = $_POST["cliente_id"];
    $usuario_id = $_POST["usuario_id"];

    $QueryPeriodoncia = mysqli_query($conn3, "SELECT * FROM PO_Periodoncia WHERE cliente_id = '{$cliente_id}' AND usuario_id = '{$usuario_id}'");
    $NumPeriodoncia = mysqli_num_rows($QueryPeriodoncia);
    
    if ($NumPeriodoncia == 0) {
        mysqli_query($conn3, "INSERT INTO PO_Periodoncia(usuario_id, cliente_id, Fecha, Hora ) 
                                                        VALUES ('$usuario_id','$cliente_id','$Fecha' ,'$Hora');");
    }


    
    
    

    // Actualizar el valor del campo en la tabla
    $update_query = "UPDATE `PO_Periodoncia` SET `$Nombre` = '$Value' WHERE cliente_id = '$cliente_id' AND usuario_id = '$usuario_id'";
    $actualizacion = mysqli_query($conn3, $update_query);
    if (!$actualizacion) {
        echo "<script language='Javascript'> alert('error en la actualización del campo');</script>";
        echo "UPDATE `PO_Periodoncia` SET `$Nombre` = '$Value' WHERE cliente_id = '$cliente_id' AND usuario_id = '$usuario_id'";
    }

    echo "Correecto";
}

if ($_POST["Tipo_Consulta"] == "Cargar Datos Periodoncia") {

    $usuario_id = $_POST["usuario_id"];
    $cliente_id = $_POST["cliente_id"];

    $QueryPeriodoncia = mysqli_query($conn3, "SELECT * FROM PO_Periodoncia WHERE cliente_id = '{$cliente_id}' AND usuario_id = '{$usuario_id}' limit 1");
    $NumPeriodoncia = mysqli_num_rows($QueryPeriodoncia);
    $RowPeriodoncia = mysqli_fetch_array($QueryPeriodoncia);

    echo json_encode($RowPeriodoncia,true);
        
    
}

?>
