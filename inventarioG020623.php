<?php
    date_default_timezone_set('America/Bogota');
    include("funciones/funciones.php");
    include("funciones/conn3.php");
   
        $descripcion     = $_POST['descripcion'];  
        $fecha_vencimiento = $_POST['fecha_vencimiento'];
        $referencia     = $_POST['referencia']; 
        $tipo     = $_POST['tipo']; 
        $existencia     = $_POST['existencia']; 
        $minimo     = $_POST['minimo']; 
        $maximo     = $_POST['maximo']; 
        $costo     = $_POST['costo']; 
        $precio     = $_POST['precio']; 
        


        $ID              = $_POST['ID'];          
        $nota            = $_POST['nota'];          
        
        
        $fechar          = date("Y-m-d H:i:s");

        $sucursal = $_POST['sucursal'];
if ($sucursal == "") {
    $sucursal = "0";
}
////////////////////////////// CREACION DE TABLAS ///////////////////////////////////////////////////
$Campo1 = mysqli_query($conn3, "show COLUMNS from sinvetrios WHERE Field = 'sucursal';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sinvetrios` ADD `sucursal` TEXT NULL DEFAULT '0' COMMENT 'Sucursal en la que fue atendido *Creado desde modulo inventario*'");
}

mysqli_query($conn3,"INSERT INTO sinvetrios (descripcion, usuario_id, referencia, tipo, existencia, minimo, maximo, costo, precio, Fecha, nota,fecha_vencimiento,sucursal) VALUES 
                                           ('$descripcion', '$ID', '$referencia', '$tipo', '$existencia', '$minimo', '$maximo', '$costo', '$precio','$fechar', '$nota','$fecha_vencimiento','$sucursal');");

 

echo "<script language='Javascript'> window.location='listaInventario.php?msg=1';</script>"; 

?>