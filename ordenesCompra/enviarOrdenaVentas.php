<?php 
session_start();
include '../funciones/funciones.php';
include '../funciones/conn3.php';

// recibir el id de la orden
$idOrden = base64_decode($_GET['FAID']);
// var_dump($idOrden);

if ($idOrden != null) {
    // consultar la orden
    $idOrden = base64_decode($_GET['FAID']);
    $queryOrden = "SELECT * from ordenesCompraHeader where id = $idOrden limit 1";
    $resultOrden = mysqli_query($conn3, $queryOrden);
    $rowOrden = mysqli_fetch_array($resultOrden);

    // validar si existe y si no esta en status rechazada
    if ($rowOrden != null && $rowOrden['estado'] <> 3) {
        // se consulta el detalle de la orden
        
        $queryDetalle = "SELECT * from ordenesCompraPendiente where nOrden = $idOrden and estado = 1 and procesado = 0";
        $resultDetalle = mysqli_query($conn3, $queryDetalle);
        $rowDetalles = [];
        while ($row = mysqli_fetch_array($resultDetalle)) {
            $rowDetalles[] = $row;
        }

        for ($i=0; $i < count($rowDetalles); $i++) {
            // campos ordenesCompraPendiente
            // id, fechaRegistro, dep, tercero, codigoProd, costo, cantidad, usuario_id, fecha, estado, nOrden

            // campos sDetalleOperPendites
            // id, idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente, tipo, Tipo_Producto, descuento, descuento2, porcentaje, porcentaje2, Descuento_Numerico, Descuento_Textual, ID_Empresa, detalle_presupuesto_odontograma, Mas_Detalles_Odontograma, estado, PaqueteProcedimiento_id, SinvDep_id, Deposito_id, Servicio_EmpresaAfiliadas_id, Impuesto_Numerico, Impuesto_Textual, Total

            $descripcion = funcionMaster($rowDetalles[$i]['codigoProd'],'id','descripcion','sinvetrios');
            $totalBase = $rowDetalles[$i]['costo'] * $rowDetalles[$i]['cantidad'];
            $SinvDep_id = 0 + funcionMaster('1','1 and idSinvetrios = '.$rowDetalles[$i]['codigoProd'].' and idDep = '.$rowDetalles[$i]['dep'].' ','id','SinvDep');

            $query = "INSERT INTO sDetalleOperPendites
            set
            idOperacion = '0',
            fechaRegistro = now(),
            idProducto = '{$rowDetalles[$i]['codigoProd']}',
            cantidad = '{$rowDetalles[$i]['cantidad']}',
            descripcion = '{$descripcion}',
            base = '{$rowDetalles[$i]['costo']}',
            impuesto = '0',
            totalbase = '{$totalBase}',
            subTotal = '{$totalBase}',
            id_usuario = '{$_SESSION['ID']}',
            id_cliente = '{$rowDetalles[$i]['tercero']}',
            tipo = '3',
            Tipo_Producto = 'Inventario',
            Descuento_Numerico = '0',
            Descuento_Textual = '0',
            ID_Empresa = '{$rowDetalles[$i]['tercero']}',
            detalle_presupuesto_odontograma = '0',
            Mas_Detalles_Odontograma = '0',
            estado = '1',
            PaqueteProcedimiento_id = '0',
            SinvDep_id = '{$SinvDep_id}',
            Deposito_id = '{$rowDetalles[$i]['dep']}',
            Servicio_EmpresaAfiliadas_id = '0',
            Impuesto_Numerico = '0',
            Impuesto_Textual = '0',
            Total = '{$totalBase}',
            nOrden = '{$idOrden}'
            ";
            $result = mysqli_query($conn3, $query);
            mysqli_query($conn3, "UPDATE ordenesCompraPendiente set procesado = 1 where id = {$rowDetalles[$i]['id']} limit 1");
        }
        mysqli_query($conn3, "UPDATE ordenesCompraHeader set estado = 2 where id = $idOrden limit 1");
    }    
}
header("Location: ../ordenesCompraControl");



?>