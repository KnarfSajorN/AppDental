<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
$con = conectar();

// datos del cliente y usuario

$fechaRegistro           = date("Y-m-d H:i:s");
$idOperacion             = 0;
$codigoProd              = $_POST['codigoProd'];
$impuesto                = 0;
$totalbase               = 0;
$cantidad                = $_POST['cantidad'];
$base                    = $_POST['base'];
$descripcion             = $_POST['descripcion'];
$subTotal                = $_POST['subTotal'];
$id_usuario              = $_POST['id_usuario'];
$id_cliente              = $_POST['id_cliente'];


$queryList = mysqli_query($conn3, "SELECT * FROM sinvetrios WHERE ID = $codigoProd");
$nrowl = mysqli_num_rows($queryList);
while ($row_recordset32 = mysqli_fetch_array($queryList)) {
  $descripcion     = $row_recordset32['descripcion'];
  $ID              = $row_recordset32['ID'];
  $precio          = $row_recordset32['precio'];
}


/*

INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente) 
VALUES                    ('$idOperacion','$fechaRegistro', '$idProducto','$cantidad','$descripcion','$base','$impuesto', '$totalbase' '$subTotal', '$id_usuario', '$id_cliente', '1');
                                                                                    
*/
//insetamos el usuario
$queryUsuario = "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente) 
                                          VALUES ('$idOperacion','$fechaRegistro', '$ID','$cantidad','$descripcion','$base','$impuesto', '$precio', '$subTotal', '$id_usuario', '$id_cliente');";





mysql_query($queryUsuario, $con) or die(mysql_error());


echo "<script language='Javascript'> window.location='SgenerarPresupuesto.php?clienteId=$id_cliente';</script>"; 
   //     }
