<?php

include 'funciones/conn3.php';

$usuario_id = $_POST['usuario_id'];
$cliente_id = $_POST['cliente_id'];

/////////////////////////////////////////////////////////////////// creacion de la tabla //////////////////////////////////////////////////////////////////////////
$tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'Historia_Anestesia'");
$nrowtabla = mysqli_num_rows($tabla);
if ($nrowtabla == 0) {
    $query = "CREATE TABLE `Historia_Anestesia` ( 
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
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




foreach (($_POST['Historia']['PrimerModulo']) as $key => $value) {

    ////////////////////////////////////////////////////////
    $Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Anestesia WHERE Field = 'PrimerModulo_$key';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Historia_Anestesia` ADD `PrimerModulo_$key` TEXT NULL ");
    }
    ////////////////////////////////////////////////////////

    $ArregloRegistrar['PrimerModulo_'.$key]=$value;

}









foreach (($_POST['Historia']['AnestesiaRegional']) as $key => $value) {

    ////////////////////////////////////////////////////////
    $Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Anestesia WHERE Field = 'AnestesiaRegional_$key';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Historia_Anestesia` ADD `AnestesiaRegional_$key` TEXT NULL ");
    }
    ////////////////////////////////////////////////////////

    $ArregloRegistrar['AnestesiaRegional_'.$key]=$value;

}









foreach (($_POST['Historia']['SegundoModulo']) as $key => $value) {

    ////////////////////////////////////////////////////////
    $Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Anestesia WHERE Field = 'SegundoModulo_$key';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Historia_Anestesia` ADD `SegundoModulo_$key` TEXT NULL ");
    }
    ////////////////////////////////////////////////////////

    $ArregloRegistrar['SegundoModulo_'.$key]=$value;

}









foreach (($_POST['Historia']['TercerModulo']) as $key => $value) {

    ////////////////////////////////////////////////////////
    $Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Anestesia WHERE Field = 'TercerModulo_$key';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Historia_Anestesia` ADD `TercerModulo_$key` TEXT NULL ");
    }
    ////////////////////////////////////////////////////////

    $ArregloRegistrar['TercerModulo_'.$key]=$value;

}









foreach (($_POST['Historia']['CuartoModulo']) as $key => $value) {

    ////////////////////////////////////////////////////////
    $Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Anestesia WHERE Field = 'CuartoModulo_$key';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Historia_Anestesia` ADD `CuartoModulo_$key` TEXT NULL ");
    }
    ////////////////////////////////////////////////////////

    $ArregloRegistrar['CuartoModulo_'.$key]=$value;

}









foreach (($_POST['Historia']['QuintoModulo']) as $key => $value) {

    ////////////////////////////////////////////////////////
    $Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Anestesia WHERE Field = 'QuintoModulo_$key';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Historia_Anestesia` ADD `QuintoModulo_$key` TEXT NULL ");
    }
    ////////////////////////////////////////////////////////

    $ArregloRegistrar['QuintoModulo_'.$key]=$value;

}




foreach (($_POST['TablaRecordAnestesia']) as $key => $value) {

    ////////////////////////////////////////////////////////
    $Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Anestesia WHERE Field = 'TablaRecordAnestesia_$key';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Historia_Anestesia` ADD `TablaRecordAnestesia_$key` TEXT NULL ");
    }
    ////////////////////////////////////////////////////////

    $ArregloRegistrar['TablaRecordAnestesia_'.$key]=$value;

}

$ArregloCompletoTabla = mysqli_real_escape_string($conn3,json_encode($_POST['TablaRecordAnestesia']));


$Campos = "";
$Valores = "";
foreach ($ArregloRegistrar as $key => $value) {

    if(is_array($value)){
        $ValorArreglo = mysqli_real_escape_string($conn3, json_encode($value));
    }else{
        $ValorArreglo = mysqli_real_escape_string($conn3, $value);
    }
    
    $Campos .= $key . ',';
    $Valores .= "'{$ValorArreglo}',";
}


$Campos = trim($Campos, ',');
$Valores = trim($Valores, ',');
echo "<br>";

// echo "INSERT INTO Historia_Anestesia (usuario_id,cliente_id,{$Campos},ArregloCompletoTabla) VALUES ('$usuario_id','$cliente_id',{$Valores},'$ArregloCompletoTabla');";
// echo "<br>";

$queryList = mysqli_query($conn3, "INSERT INTO Historia_Anestesia (usuario_id,cliente_id,{$Campos},ArregloCompletoTabla) VALUES ('$usuario_id','$cliente_id',{$Valores},'$ArregloCompletoTabla');") or die(mysqli_error($conn3));
$Historia_id = mysqli_insert_id($conn3);



//echo "INSERT INTO Historia_Anestesia (usuario_id,cliente_id,{$Campos}) VALUES ('$usuario_id','$cliente_id',{$Valores});";

echo "<script language='Javascript'> window.location='RA_Finalizado.php?id=$Historia_id';</script>";
?>