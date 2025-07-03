<?php
include 'funciones/conn3.php';
include 'funciones/funciones.php';

//$_POST = DatosIngresarMysqli($_POST);

$usuario_id = $_POST['usuario_id'];
$cliente_id = $_POST['cliente_id'];

/////////////////////////////////////////////////////////////////// creacion de la tabla para los examemenes //////////////////////////////////////////////////////////////////////////
$tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'Historia_Ecomapa'");
$nrowtabla = mysqli_num_rows($tabla);
if ($nrowtabla == 0) {
    $query = "CREATE TABLE `Historia_Ecomapa` ( 
        `id` INT(11) NOT NULL AUTO_INCREMENT , 
        `Fecha` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , 
        `cliente_id` INT(11) NULL DEFAULT '0' , 
        `usuario_id` INT(11) NULL DEFAULT '0' ,
        PRIMARY KEY (`id`)) ENGINE = MyISAM;";

    $creaciontabla = mysqli_query($conn3, $query);
    if (!$creaciontabla) {
        echo "<script language='Javascript'> alert('error en la creacion de la tabla');
        window.location='portada';</script>";

        exit();
    }
}


////////////////////////////////////////////Ecomapa////////////////////////////////////////////////////////
$ArregloCamposAdicionales=["Ecomapa_Archivo"];
foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Ecomapa WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Historia_Ecomapa` ADD `$value` TEXT NULL ");
    }
}
$Ecomapa = $_POST['ecomapa_xml'];
////////////////////////////////////////////Ecomapa [FIN]///////////////////////////////////////////////////



$queryList = mysqli_query($conn3, "INSERT INTO Historia_Ecomapa (usuario_id,cliente_id,Ecomapa_Archivo) VALUES ('$usuario_id','$cliente_id','$Ecomapa');") or die(mysqli_error($conn3));
$Historia_id = mysqli_insert_id($conn3);


////////////////////////////////////////////Ecomapa para cliente ////////////////////////////////////////////////////////
$ArregloCamposAdicionales=["Ecomapa_Archivo"];
foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from cliente WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `cliente` ADD `$value` TEXT NULL ");
    }
}
$Ecomapa_cliente = $_POST['ecomapa_xml'];
////////////////////////////////////////////Ecomapa para cliente  [FIN]///////////////////////////////////////////////////

mysqli_query($conn3, "UPDATE cliente SET Ecomapa_Archivo = '$Ecomapa_cliente' WHERE cliente_id = $cliente_id LIMIT 1");


echo "<script language='Javascript'> window.location='EC_Finalizado?id=$Historia_id';</script>";
//echo "<button class='btn btn-primary' onclick='window.location=`RIAS_Finalizado.php?id=$Historia_id`'>Finalizar</button>";

?>