<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
$con = conectar();

// datos del cliente y usuario

$fechaRegistro           = date("Y-m-d H:i:s");
$idOperacion             = 0;
$idProducto              = 0;
$impuesto                = 0;
$totalbase               = 0;
$cantidad                = $_POST['cantidad'];
$base                    = $_POST['base'];
$descripcion             = $_POST['descripcion'];
$subTotal                = $_POST['subTotal'];
$id_usuario              = $_POST['id_usuario'];
$id_cliente              = $_POST['id_cliente'];
$codigoProd              = $_POST['codigoProd'];
$historia             = $_POST['historia'];
$tipo_historia             = $_POST['tipo_historia'];


/*
        $chekUsuario = "SELECT * from envioEmbarcador where correo = '$correoCliente'";
        $resultChekusuario = mysql_query ($chekUsuario, $con) or die ( mysql_error());
     
        $usuarioExiste = mysql_num_rows($resultChekusuario);
         echo "3  ";
        if($usuarioExiste>0){
          echo "4  ";
            echo "<script language='Javascript'> window.location='agregarClientes.php?msg=1';
                </script>"; 
        }
        else{
 */

/*

INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente) 
VALUES                    ('$idOperacion','$fechaRegistro', '$idProducto','$cantidad','$descripcion','$base','$impuesto', '$totalbase' '$subTotal', '$id_usuario', '$id_cliente', '1');
                                                                                    
*/
//insetamos el usuario





$queryList = mysqli_query($conn3, "SELECT * FROM sinvetrios WHERE ID = $codigoProd");
$nrowl = mysqli_num_rows($queryList);
while ($row_recordset32 = mysqli_fetch_array($queryList)) {
    $descripcion     = $row_recordset32['descripcion'];
    $existencia      = $row_recordset32['existencia'];
    $cliente_id      = $row_recordset32['cliente_id'];
    $referencia      = $row_recordset32['referencia'];
    $ID              = $row_recordset32['ID'];
}





$queryUsuario = "INSERT INTO sDetalleOperPendites 
                    (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente) 
                                          VALUES 
                    ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base','$impuesto', '$totalbase', '$subTotal', '$id_usuario', '$id_cliente');";





mysql_query($queryUsuario, $con) or die(mysql_error());


echo "<script language='Javascript'> window.location='SgenerarFactura.php?historiaClinica1=$historia&clienteId=$id_cliente&tipo_historia=$tipo_historia'</script>"; 
   //     }
