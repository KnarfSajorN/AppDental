<?php
include 'funciones/conn3.php';
include 'funciones/funciones.php';

//$_POST = DatosIngresarMysqli($_POST);

$usuario_id = $_POST['usuario_id'];
$cliente_id = $_POST['cliente_id'];

/////////////////////////////////////////////////////////////////// creacion de la tabla para los examemenes //////////////////////////////////////////////////////////////////////////
$tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'Historia_Familiograma'");
$nrowtabla = mysqli_num_rows($tabla);
if ($nrowtabla == 0) {
    $query = "CREATE TABLE `Historia_Familiograma` ( 
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


////////////////////////////////////////////Familiograma////////////////////////////////////////////////////////
$ArregloCamposAdicionales=["Familiograma_Archivo"];
foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Familiograma WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Historia_Familiograma` ADD `$value` TEXT NULL ");
    }
}
$Familiograma = $_POST['familiograma_xml'];
////////////////////////////////////////////Familiograma [FIN]///////////////////////////////////////////////////



$queryList = mysqli_query($conn3, "INSERT INTO Historia_Familiograma (usuario_id,cliente_id,Familiograma_Archivo) VALUES ('$usuario_id','$cliente_id','$Familiograma');") or die(mysqli_error($conn3));
$Historia_id = mysqli_insert_id($conn3);


////////////////////////////////////////////Familiograma para cliente ////////////////////////////////////////////////////////
$ArregloCamposAdicionales=["Familiograma_Archivo"];
foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from cliente WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `cliente` ADD `$value` TEXT NULL ");
    }
}
$Familiograma_cliente = $_POST['familiograma_xml'];
////////////////////////////////////////////Familiograma - Ecomapa para cliente  [FIN]///////////////////////////////////////////////////

mysqli_query($conn3, "UPDATE cliente SET Familiograma_Archivo = '$Familiograma_cliente' WHERE cliente_id = $cliente_id LIMIT 1");


echo "<script language='Javascript'> window.location='FM_Finalizado?id=$Historia_id';</script>";
//echo "<button class='btn btn-primary' onclick='window.location=`RIAS_Finalizado.php?id=$Historia_id`'>Finalizar</button>";

?>