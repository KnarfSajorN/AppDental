<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");


////////////////////////////////////////////////////////////////////? creacion de la tabla  //////////////////////////////////////////////////////////////////////////
$tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'DocumentoSoporte_Operacion'");
$nrowtabla = mysqli_num_rows($tabla);
if ($nrowtabla == 0) {
    $query = "CREATE TABLE `DocumentoSoporte_Operacion` ( 
        `idOperacion` INT(11) NOT NULL AUTO_INCREMENT , 
        `FechaOperacion` DATE NULL DEFAULT CURRENT_TIMESTAMP ,
        `NumeroDocumentoSoporte` TEXT NULL DEFAULT '0' ,
        `usuario_id` INT(11) NOT NULL ,
        `proveedor_id` INT(11) NOT NULL ,
        `FechaVencimiento` DATE NULL ,
        `FechaVenta` DATE NULL ,
        `FechaEntrega` DATE NULL ,

        `TotalBruto` FLOAT NOT NULL,
        `Descuentos` FLOAT NOT NULL,
        `SubTotal` FLOAT NOT NULL,
        `ImpuestoBase` FLOAT NOT NULL,
        `TotalNeto` FLOAT NOT NULL,
        `CantidadProductos` INT(11) NULL DEFAULT '0' ,
        `Nota` TEXT NULL  ,
        `Estado` INT(11) NULL DEFAULT '1' ,
        PRIMARY KEY (`idOperacion`)) ENGINE = MyISAM;";

    $creaciontabla = mysqli_query($conn3, $query);
    if (!$creaciontabla) {
        echo "<script language='Javascript'> alert('error en la creacion de la tabla');
        window.location='portada';</script>";

        exit();
    }
}
////////////////////////////////////////////////////////////////////? creacion de la tabla  //////////////////////////////////////////////////////////////////////////

$Campo1 = mysqli_query($conn3, "show COLUMNS from usuarios WHERE Field = 'NumeroDocumentoSoporte';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `usuarios` ADD `NumeroDocumentoSoporte` TEXT NULL DEFAULT '0' COMMENT 'Numeracion Factura*Creado desde modulo de Totalizar Documento*'");
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



$usuario_id  			= $_POST['usuario_id'];
$proveedor_id  			= $_POST['proveedor_id'];

$nota  			        = $_POST['Nota'];

$FechaVencimiento 		= $_POST['FechaVencimiento'];
$FechaVenta 		= $_POST['FechaVenta'];
$FechaEntrega = $_POST['FechaEntrega'];
$FechaRegistro             = date("Y-m-d H:i:s");



$QueryUsuario = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = '$usuario_id' ");
while ($RowUsuario = mysqli_fetch_array($QueryUsuario)) {
    $soportedocumentos_numeroinicio = $RowUsuario['soportedocumentos_numeroinicio'];
}

$soportedocumentos_numeroinicio++;



$QueryDetalles = mysqli_query($conn3, "SELECT SUM(totalbase) as sumTotalbase, SUM(Cantidad) as sumCantidad, SUM(Subtotal) as
sumSubTotal, SUM(Descuento_Numerico)
as sumDescuento,SUM(Impuesto_Numerico) as sumImpuesto,SUM(Total) as sumTotal 
from DocumentoSoporte_Detalles_Temp 
WHERE Estado = 1 and usuario_id = $usuario_id and  proveedor_id = $proveedor_id  order by id");
while ($RowDetalles = mysqli_fetch_array($QueryDetalles)) {

$sumTotalbase = $RowDetalles['sumTotalbase'];
$sumCantidad = $RowDetalles['sumCantidad'];
$sumSubTotal = $RowDetalles['sumSubTotal'];
$sumDescuento = $RowDetalles['sumDescuento'];

$sumImpuesto = $RowDetalles['sumImpuesto'];
$sumTotal = $RowDetalles['sumTotal'];

}

mysqli_query($conn3, "INSERT INTO DocumentoSoporte_Operacion
				(proveedor_id, usuario_id, FechaOperacion, FechaVencimiento, FechaVenta, FechaEntrega, NumeroDocumentoSoporte,
				TotalBruto, Descuentos, SubTotal,ImpuestoBase, TotalNeto, CantidadProductos, Nota) 
				VALUES                     
				('$proveedor_id', '$usuario_id', '$FechaRegistro', '$FechaVencimiento', '$FechaVenta', '$FechaEntrega', '$soportedocumentos_numeroinicio',
				'$sumTotalbase', '$sumDescuento' , '$sumSubTotal', '$sumImpuesto', '$sumTotal', '$sumCantidad' , '$nota');") or die(mysqli_error($conn3));

$idOperacion = mysqli_insert_id($conn3);

mysqli_query($conn3, "UPDATE usuarios set soportedocumentos_numeroinicio = $soportedocumentos_numeroinicio where ID = $usuario_id;");


$QueryOperativos = mysqli_query($conn3, "SELECT * FROM  DocumentoSoporte_Detalles_Temp where Estado = 1 and usuario_id = $usuario_id and  proveedor_id = $proveedor_id Order by id");
while ($RowOperativos = mysqli_fetch_array($QueryOperativos)) {

        $id = $RowOperativos['id'];
        $Descripcion = mysqli_real_escape_string($conn3,$RowOperativos['Descripcion']);



		$queryList = mysqli_query($conn3,
        "INSERT INTO DocumentoSoporte_Detalles (idOperacion,Fecha, idProducto, Cantidad, Descripcion, Base, Totalbase, 
            Subtotal, usuario_id, proveedor_id,Descuento_Numerico,Descuento_Textual,SinvDep_id,Deposito_id,
            Impuesto_Numerico,Impuesto_Textual,Total) VALUES 
                                                    ('$idOperacion','$RowOperativos[Fecha]', '$RowOperativos[idProducto]', '$RowOperativos[Cantidad]', '$Descripcion', '$RowOperativos[Base]', '$RowOperativos[Totalbase]',
            '$RowOperativos[Subtotal]', '$RowOperativos[usuario_id]', '$RowOperativos[proveedor_id]', '$RowOperativos[Descuento_Numerico]','$RowOperativos[Descuento_Textual]','$RowOperativos[SinvDep_id]','$RowOperativos[Deposito_id]',
            '$RowOperativos[Impuesto_Numerico]','$RowOperativos[Impuesto_Textual]','$RowOperativos[Total]');") or die(mysqli_error($conn3));

		mysqli_query($conn3, "UPDATE DocumentoSoporte_Detalles_Temp set Estado = 2 where id = $id");

}

echo "<script language='Javascript'> window.location='Docso_EnviarDocumentoApi.php?idOperacion=$idOperacion';</script>";

//echo "<script language='Javascript'> window.location='Docso_PreliminarDocumento?idOperacion=$idOperacion';</script>";
?>