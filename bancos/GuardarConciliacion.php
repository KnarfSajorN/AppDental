<?php
include '../funciones/conn3.php';

///////////////////////////////////////////////////////////////////////////////////////////////////

$tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'Stransbanco_Conciliado'");
$nrowtabla = mysqli_num_rows($tabla);
if ($nrowtabla == 0) {

    $query = "CREATE TABLE `Stransbanco_Conciliado` (
    `id` int(11) NOT NULL,
    `Fecha` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
    `idBanco` int(11) NOT NULL,
    `usuario_id` int(11) NOT NULL,
    `Saldo_Banco` text NULL DEFAULT '',
    `Saldo_Conciliar` text NULL DEFAULT '',
    
    `Creacion_Dinamica` text DEFAULT '',
    `Activo` varchar(5) DEFAULT '1'
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

    $creaciontabla = mysqli_query($conn3, $query);
    if (!$creaciontabla) {
        echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
    } else {
        mysqli_query($conn3, "ALTER TABLE `Stransbanco_Conciliado` ADD PRIMARY KEY (`id`);");
        mysqli_query($conn3, "ALTER TABLE `Stransbanco_Conciliado` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////
    
$Saldo_Banco = $_POST['saldobanco'];
$Saldo_Conciliar = $_POST['saldobanco'];
$usuario_id = $_POST['usuario_id'];
$idBanco = $_POST['idBanco'];


$SaldoConciliarCheck=0;
foreach ($_POST['DetallesConciliar'] as $key => $value) {
    $SaldoConciliarCheck = $SaldoConciliarCheck + $value;
}

if($SaldoConciliarCheck == $Saldo_Conciliar){

    //insert de la tabla Stransbanco_Conciliado
    $query = "INSERT INTO `Stransbanco_Conciliado` (`idBanco`, `usuario_id`, `Saldo_Banco`, `Saldo_Conciliar`)
    VALUES ('$idBanco', '$usuario_id', '$Saldo_Banco', '$Saldo_Conciliar');";
    $insert = mysqli_query($conn3, $query) or die(mysqli_error($conn3));
    //mysqli_insert_id
    $id_conciliacion = mysqli_insert_id($conn3);

    //update de los detalles de la tabla Stransbanco
    foreach ($_POST['DetallesConciliar'] as $key => $value) {
        $query = "UPDATE `Stransbanco` SET `Conciliado` = '1', `conciliacion_id` = '$id_conciliacion' WHERE `id` = '$key' LIMIT 1;";
        $update = mysqli_query($conn3, $query);
    }
    //redireccionar a HistorialConciliaciones.php con javascript
    echo "<script language='Javascript'> alert('Datos Registrados');</script>";
    echo "<script language='Javascript'> window.location.href = '../bancosConciliaciones';</script>";
    
}else{
    echo "<script language='Javascript'> alert('Error al cargar el saldo a conciliar');</script>";
}
?>