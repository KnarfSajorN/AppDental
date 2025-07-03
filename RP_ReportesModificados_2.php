<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php';
$_POST = preparePost($_POST, true);

$ID = $_SESSION['ID'];

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

$tipo_reporte = $_POST['tipo_reporte'];

function RemCom($Campo)
{
    return str_replace('"', "'", $Campo);
}
?>
<style type="text/css">
    .col-xs-3 {
        padding-bottom: 20px;
    }
</style>

<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}
.Backk-Color{
    background-color: #9cc3db;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Reportes Sistema </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Reportes Sistema </h4>
                <div class="box">
                    <div class="box-body">





                                    <div class="m-3">
                                        <div class="box">
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <div class="col-md-12">
                                                    <h2 align="center">Reporte de <?php echo $tipo_reporte ?> [<?= $desde; ?> - <?= $hasta; ?>] <?php if ($tipo_reporte == "Estado De Situacion Financiera") {
                                                                                                                                                    echo " | [" . str_replace($_POST["anualbusqueda"], $_POST["compararanual"], $desde);
                                                                                                                                                    echo " - " . str_replace($_POST["anualbusqueda"], $_POST["compararanual"], $hasta) . " ]";
                                                                                                                                                } ?>
                                                    </h2>
                                                    <h5 align="center">Fecha de Impresion <?= (isset($_POST['fechaImpresion']) && !empty($_POST['fechaImpresion']) ? $_POST['fechaImpresion'] : Date("Y-m-d")) ?></h5>
                                                    <div class="table table-responsive  mt-3">
                                                        <table id="example1" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <?php
                                                                    //Libro de Inventario y Balance
                                                                    $Cabezera["Libro de Inventario y Balance"] = ["Codigo cuenta contable", "Nombre", "Debito", "Credito", "Saldo Deudor", "Saldo Acreedor", "Inventario Activo", "Inventario Pasivo", "Resultado Perdida", "Resultado Ganancia"];
                                                                    $Cabezera["Resumen Forma de Pago"] = ["Codigo Cuenta Contable", "Nombre Cuenta Contable", "Formas de Pago", "Ingresos", "Salidas", "Saldo"];
                                                                    $Cabezera["Movimiento auxiliar de Activos Fijos"] = ["Codigo Activo Fijo", "Nombre Activo Fijo", "Fecha", "Cantidad", "Marca", "Modelo"];
                                                                    list($a, $m, $d) = explode("-", $desde);
                                                                    $Cabezera["Estado de resultado integral por naturaleza de gasto"] = ["Nombre", "{$a}"];
                                                                    $Cabezera["Movimiento Auxiliar de Cartera por Cuenta Contable"] = ["Identificacion", "Nombre del Tercero", "Codigo Contable", "Cuenta Contable", "Comprobante", "Secuencia", "Fecha de Elaboracion", "Descripcion", "Vencimiento", "Saldo Inicial", "Debito", "Credito", "Saldo Movimiento"];
                                                                    $Cabezera["Cartera por Centro de Costo"] = ["Detalle Vencimiento", "No. Cuota", "Identificacion", "Nombre Cliente", "Deuda por Cobrar", "Valor Anticipo", "Saldo Cartera", "Valor Vencido", "Valor por Vencer"];
                                                                    $Cabezera["Balance de prueba por Tercero"] = ["Nivel", "Transaccional", "Codigo Cuenta Contable", "Nombre Cuenta Contable", "Identificacion", "Sucursal", "Nombre Tercero", "Saldo Inicial", "Movimiento Debito", "Movimiento Credito", "Saldo Final"];
                                                                    $Cabezera["Balance de prueba por Centro de Costo"] = ["Codigo Cuenta Contable", "Nombre Cuenta Contable", "Identificacion", "Sucursal", "Nombre Tercero", "Saldo Inicial", "Movimiento Debito", "Movimiento Credito", "Saldo Final"];

                                                                    foreach ($Cabezera[$tipo_reporte] as $key => $value) {
                                                                        echo "<th>{$value}</th>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if ($tipo_reporte == "Resumen Forma de Pago") {
                                                                    // movimientos de ventas por cobrar
                                                                    $tipoPago_filtrado = $_POST["tipoPago"];

                                                                    $queryGeneral = mysqli_query($conn3, "SELECT * FROM CCompDiario WHERE 
                                                                        tipo_comprobante in ('1','2','5','6') AND fecha BETWEEN '$desde' AND '$hasta' ORDER BY tipo_comprobante;
                                                                    ");
                                                                    while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                                                        //1->factura,2->compras,5->cuentas x cobrar 6-> cuentas por pagar

                                                                        $tipo_comprobante = $rowGeneral['tipo_comprobante'];
                                                                        $id = $rowGeneral['id'];

                                                                        $tipoPago = "";
                                                                        //recorrer en las diferentes tablas
                                                                        switch ($tipo_comprobante) {
                                                                            case '1':
                                                                                $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv  where Comprobante_id = '$id' ");
                                                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                                                    $tipoPago = $rowMotorizado["tipoPago"];
                                                                                }
                                                                                break;
                                                                            case '2':
                                                                                $queryList = mysqli_query($conn3, "SELECT * FROM  opracioninvheader  where Comprobante_id = '$id' ");
                                                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                                                    $tipoPago = $rowMotorizado["tipoPago"];
                                                                                }
                                                                                break;
                                                                            case '5':
                                                                                $queryList1 = mysqli_query($conn3, "SELECT * FROM InformacionCuentasxCobrar  where Comprobante_id_movimientoCuentaXCobrar = '$id' ");
                                                                                while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                                                                    $tipoPago = $rowMotorizado1["Forma_Pago"];
                                                                                }
                                                                                break;
                                                                            case '6':
                                                                                $queryList1 = mysqli_query($conn3, "SELECT * FROM InformacionCuentasxPagar  where 	Comprobante_id_movimientoCuentaXPagar = '$id' ");
                                                                                while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                                                                    $tipoPago = $rowMotorizado1["Forma_Pago"];
                                                                                }
                                                                                break;
                                                                        }


                                                                        $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where cuenta LIKE '3%' AND idComprobante  = '$id' ");
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                                            $cuenta = $rowMotorizado["cuenta"];
                                                                            if ($tipoPago_filtrado == "Todos") {
                                                                                $ArregloTipoPago["$cuenta"]["$tipoPago"]["debe"] = $ArregloTipoPago["$cuenta"]["$tipoPago"]["debe"] + $rowMotorizado['monto_debe'];
                                                                                $ArregloTipoPago["$cuenta"]["$tipoPago"]["haber"] = $ArregloTipoPago["$cuenta"]["$tipoPago"]["haber"] + $rowMotorizado['monto_haber'];
                                                                            } else if ($tipoPago_filtrado == $tipoPago) {
                                                                                $ArregloTipoPago["$cuenta"]["$tipoPago"]["debe"] = $ArregloTipoPago["$cuenta"]["$tipoPago"]["debe"] + $rowMotorizado['monto_debe'];
                                                                                $ArregloTipoPago["$cuenta"]["$tipoPago"]["haber"] = $ArregloTipoPago["$cuenta"]["$tipoPago"]["haber"] + $rowMotorizado['monto_haber'];
                                                                            }
                                                                        }
                                                                    }
                                                                    //["Codigo Cuenta Contable", "Nombre Cuenta Contable", "Formas de Pago", "Ingresos", "Salidas", "Saldo"];
                                                                    foreach ($ArregloTipoPago as $key => $value) {
                                                                        foreach ($value as $key1 => $value1) {

                                                                            $monto_debe = $value1["debe"];
                                                                            $monto_haber = $value1["haber"];
                                                                            $saldo = $monto_haber - $monto_debe;
                                                                            $NombreCuenta = funcionMaster($key, 'id', 'descripcion', 'CCuentas');
                                                                            echo "<tr>
                                                                                    <td>{$key}</td>
                                                                                    <td>{$NombreCuenta}</td>
                                                                                    <td>{$key1}</td>
                                                                                    <td>{$monto_haber}</td>
                                                                                    <td>{$monto_debe}</td>
                                                                                    <td>{$saldo}</td>
                                                                                </tr>";
                                                                        }
                                                                    }
                                                                } else if ($tipo_reporte == "Movimiento auxiliar de Activos Fijos") {
                                                                    $queryGeneral = mysqli_query($conn3, "SELECT cm.id, so.idProducto,
                                                                        so.cantidad, cm.fecha, so.fechaRegistro AS regProducto,
                                                                        s.descripcion, s.marca_producto, s.modelo_producto FROM
                                                                        CCompDiarioMov AS cm INNER JOIN sDetalleOper AS so ON
                                                                        cm.detalle_id_factura = so.id INNER JOIN sinvetrios AS s ON
                                                                        so.idProducto = s.ID WHERE s.activoFijo = 1 AND 
                                                                        (cm.fecha BETWEEN '$desde' AND '$hasta') ORDER BY cm.id; 
                                                                    ");
                                                                    while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                                                        list($f, $h) = explode(" ", $rowGeneral['regProducto']);
                                                                        echo "<tr>
                                                                                <td>{$rowGeneral['id']}</td>
                                                                                <td>{$rowGeneral['descripcion']}</td>
                                                                                <td>{$f}</td>
                                                                                <td>{$rowGeneral['cantidad']}</td>
                                                                                <td>{$rowGeneral['marca_producto']}</td>
                                                                                <td>{$rowGeneral['modelo_producto']}</td>
                                                                            </tr>";
                                                                    }
                                                                } else if ($tipo_reporte == "Estado de resultado integral por naturaleza de gasto") {
                                                                    $queryGeneral = mysqli_query($conn3, "SELECT cuenta, descripcion, 
                                                                        (sum(monto_debe) - sum(monto_haber)) AS total
                                                                        FROM CCompDiarioMov WHERE (fecha BETWEEN '$desde' AND '$hasta') AND 
                                                                        (cuenta LIKE '4%' OR cuenta LIKE '5%')
                                                                        GROUP BY cuenta ORDER BY cuenta ASC;
                                                                    ");
                                                                    while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                                                        echo "<tr>
                                                                            <td>{$rowGeneral['descripcion']}</td>
                                                                            <td>{$rowGeneral['total']}</td>
                                                                        </tr>";
                                                                    }
                                                                } else if ($tipo_reporte == "Movimiento Auxiliar de Cartera por Cuenta Contable") {
                                                                    $queryGeneral = mysqli_query($conn3, "SELECT * FROM CCompDiario WHERE 
                                                                        tipo_comprobante in ('1', '2', '5', '6') AND fecha BETWEEN '$desde' AND '$hasta' ORDER BY tipo_comprobante;
                                                                    ");
                                                                    $clientes = [];
                                                                    $terceros = [];
                                                                    while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                                                        $cliente = 0;
                                                                        $proveedor = 0;
                                                                        //1->factura,2->compras,5->cuentas x cobrar 6-> cuentas por pagar
                                                                        $tipo_comprobante = $rowGeneral['tipo_comprobante'];
                                                                        $id = $rowGeneral['id'];
                                                                        //recorrer en las diferentes tablas
                                                                        switch ($tipo_comprobante) {
                                                                            case '1':
                                                                                $queryList = mysqli_query($conn3, "SELECT * FROM sOperacionInv WHERE Comprobante_id = '$id'");
                                                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                                                    $cliente = $rowMotorizado["idCliente"];
                                                                                    $fechaVencimientoCliente = $rowMotorizado["fechaVencimiento"];
                                                                                }
                                                                                break;
                                                                            case '2':
                                                                                $queryList = mysqli_query($conn3, "SELECT * FROM  opracioninvheader WHERE Comprobante_id = '$id'");
                                                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                                                    $proveedor = $rowMotorizado["idTercero"];
                                                                                    $fechavencimientoProveedor = $rowMotorizado["fechavencimiento"];
                                                                                }
                                                                                break;
                                                                            case '5':
                                                                                $queryList1 = mysqli_query($conn3, "SELECT oi.* FROM sOperacionInv AS oi 
                                                                                    INNER JOIN sCuentasCobrar AS cc ON oi.idOperacion = cc.idDocumento 
                                                                                    INNER JOIN InformacionCuentasxCobrar AS ic 
                                                                                    ON cc.id = ic.id_sCuentasCobrar WHERE cc.Comprobante_id_movimientoCuentaXCobrar = '{$id}';
                                                                                ");
                                                                                while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                                                                    $proveedor = $rowMotorizado1["idCliente"];
                                                                                    $fechavencimientoProveedor = $rowMotorizado1["fechavencimiento"];
                                                                                }
                                                                                break;
                                                                            case '6':
                                                                                $queryList1 = mysqli_query($conn3, "SELECT oh.* FROM opracioninvheader AS oh 
                                                                                    INNER JOIN CuentasxPagar AS cxp ON oh.id = cxp.idDocumento 
                                                                                    INNER JOIN InformacionCuentasxPagar AS ixp
                                                                                    ON cxp.id = ixp.id_sCuentasPagar WHERE ixp.Comprobante_id_movimientoCuentaXPagar = '{$id}';
                                                                                ");
                                                                                while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                                                                    $proveedor = $rowMotorizado1["idTercero"];
                                                                                    $fechavencimientoProveedor = $rowMotorizado1["fechavencimiento"];
                                                                                }
                                                                                break;
                                                                        }

                                                                        if ($cliente > 0 || $proveedor > 0) {
                                                                            if ($tipo_comprobante == 1 || $tipo_comprobante == 5) {
                                                                                $queryList = mysqli_query($conn3, "SELECT * FROM CCompDiarioMov WHERE idComprobante = '$id'");
                                                                                while ($rowMotorizado = mysqli_fetch_assoc($queryList)) {
                                                                                    $rowMotorizado['fechaVencimiento'] = $fechaVencimientoCliente;
                                                                                    $clientes["{$cliente}"]["{$rowMotorizado['cuenta']}"][] = $rowMotorizado;
                                                                                }
                                                                            }
                                                                            if ($tipo_comprobante == 2 || $tipo_comprobante == 6) {
                                                                                $queryList = mysqli_query($conn3, "SELECT * FROM CCompDiarioMov WHERE idComprobante = '$id'");
                                                                                while ($rowMotorizado = mysqli_fetch_assoc($queryList)) {
                                                                                    $rowMotorizado['fechaVencimiento'] = $fechavencimientoProveedor;
                                                                                    $terceros["{$proveedor}"]["{$rowMotorizado['cuenta']}"][] = $rowMotorizado;
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                    foreach ([$clientes, $terceros] as $key => $value) {
                                                                        foreach ($value as $key1 => $value1) {
                                                                            echo "<tr>
                                                                                <td colspan='13'>" . ($key == 0 ? "Cliente " . funcionMasterMedical($key1, 'cliente_id', 'nombre_cliente', 'cliente') : "Proveedor " . funcionMaster($key1, 'id', 'nombre', 'sproveedores')) . "</td>
                                                                            </tr>";
                                                                            foreach ($value1 as $key2 => $value2) {
                                                                                echo "<tr>
                                                                                    <td colspan='9'>Cuenta " . $key2 . " - " . funcionMaster($key2, 'id', 'descripcion', 'CCuentas') . "</td>
                                                                                    <td colspan='4'>" . funcionMaster($key2, 'id', 'saldo_inicial', 'CCuentas') . "</td>
                                                                                </tr>";
                                                                                $saldo = 0;
                                                                                foreach ($value2 as $key3 => $value3) {
                                                                                    $saldo = ($saldo + ($value3['monto_debe'] - $value3['monto_haber']));
                                                                                    echo "<tr>
                                                                                        <td>" . ($key == 0 ? funcionMasterMedical($key1, 'cliente_id', 'CODI_CLIENTE', 'cliente') : funcionMaster($key1, 'id', 'rut', 'sproveedores')) . "</td>
                                                                                        <td>" . ($key == 0 ? funcionMasterMedical($key1, 'cliente_id', 'nombre_cliente', 'cliente') : funcionMaster($key1, 'id', 'nombre', 'sproveedores')) . "</td>
                                                                                        <td>{$value3['cuenta']}</td>
                                                                                        <td>" . funcionMaster($value3['cuenta'], 'id', 'descripcion', 'CCuentas') . "</td>
                                                                                        <td>{$value3['numero']}</td>
                                                                                        <td>0</td>
                                                                                        <td>{$value3['fecha']}</td>
                                                                                        <td>{$value3['descripcion']}</td>
                                                                                        <td>{$value3['fechaVencimiento']}</td>
                                                                                        <td></td>
                                                                                        <td>{$value3['monto_debe']}</td>
                                                                                        <td>{$value3['monto_haber']}</td>
                                                                                        <td>{$saldo}</td>
                                                                                    </tr>";
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                } else if ($tipo_reporte == "Estado de resultado integral por funcion de gasto") {
                                                                    // INCOMPLETO
                                                                    $queryGeneral = mysqli_query($conn3, "SELECT cuenta, descripcion, 
                                                                        (sum(monto_debe) - sum(monto_haber)) AS total
                                                                        FROM CCompDiarioMov WHERE (fecha BETWEEN '$desde' AND '$hasta') AND 
                                                                        (cuenta LIKE '4%' OR cuenta LIKE '5%')
                                                                        GROUP BY cuenta ORDER BY cuenta ASC;
                                                                    ");
                                                                    while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                                                        echo "<tr>
                                                                            <td>{$rowGeneral['descripcion']}</td>
                                                                            <td>{$rowGeneral['total']}</td>
                                                                        </tr>";
                                                                    }
                                                                } else if ($tipo_reporte == "Cartera por Centro de Costo") {
                                                                    $centroCostos = [];
                                                                    $queryList1 = mysqli_query($conn3, "SELECT oi.*, cc.montoBase, cc.montoPagado FROM 
                                                                        sOperacionInv AS oi INNER JOIN sCuentasCobrar AS cc ON oi.idOperacion = cc.idDocumento;
                                                                    ");
                                                                    while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                                                        $centroCostos["{$rowMotorizado1['idCentroCosto']}"][] = $rowMotorizado1;
                                                                    }
                                                                    foreach ([$centroCostos] as $key => $value) {
                                                                        foreach ($value as $key1 => $value1) {
                                                                            echo "<tr>
                                                                                <td colspan='13'>" . ($key == 0 ? "Centro de Costo " . funcionMaster($key1, 'id', 'descripcion', 'CcentroCostos') : '') . "</td>
                                                                            </tr>";
                                                                            foreach ($value1 as $key2 => $value2) {
                                                                                echo "<tr>
                                                                                        <td>" . funcionMaster($value2['Comprobante_id'], 'id', 'numero', 'CCompDiario') . "</td>
                                                                                        <td></td>
                                                                                        <td>" . funcionMasterMedical($value2['idCliente'], 'cliente_id', 'CODI_CLIENTE', 'cliente') . "</td>
                                                                                        <td>" . funcionMasterMedical($value2['idCliente'], 'cliente_id', 'nombre_cliente', 'cliente') . "</td>
                                                                                        <td>{$value2['montoBase']}</td>
                                                                                        <td>{$value2['montoPagado']}</td>
                                                                                        <td>" . ($value2['montoBase'] - $value2['montoPagado']) . "</td>
                                                                                        <td>" . (Date("Y-m-d") > Date("Y-m-d", strtotime($value2['fechaVencimiento'])) ? ($value2['montoBase'] - $value2['montoPagado']) : '0') . "</td>
                                                                                        <td>" . (Date("Y-m-d") <= Date("Y-m-d", strtotime($value2['fechaVencimiento'])) ? ($value2['montoBase'] - $value2['montoPagado']) : '0') . "</td>
                                                                                    </tr>";
                                                                            }
                                                                        }
                                                                    }
                                                                } else if ($tipo_reporte == "Balance de prueba por Tercero") {
                                                                    $queryGeneral = mysqli_query($conn3, "SELECT * FROM CCompDiario WHERE 
                                                                        fecha BETWEEN '$desde' AND '$hasta' ORDER BY tipo_comprobante;
                                                                    ");
                                                                    while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                                                        $tipo_comprobante = $rowGeneral['tipo_comprobante'];
                                                                        $id = $rowGeneral['id'];
                                                                        $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov WHERE idComprobante  = '$id' ");
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                                            if ($_POST['tercero'] == 1 || $_POST['tercero'] == 0) {
                                                                                if ($rowGeneral['tipo_tercero'] == 1) {
                                                                                    $ArregloBalanceTercero["{$rowGeneral['tercero_id']}"]["{$rowMotorizado['cuenta']}"]["debe"] = round(($ArregloBalanceTercero["{$rowGeneral['tercero_id']}"]["{$rowMotorizado['cuenta']}"]["debe"] + $rowMotorizado['monto_debe']), 2);
                                                                                    $ArregloBalanceTercero["{$rowGeneral['tercero_id']}"]["{$rowMotorizado['cuenta']}"]["haber"] = round(($ArregloBalanceTercero["{$rowGeneral['tercero_id']}"]["{$rowMotorizado['cuenta']}"]["haber"] + $rowMotorizado['monto_haber']), 2);
                                                                                }
                                                                            }
                                                                            if ($_POST['tercero'] == 2 || $_POST['tercero'] == 0) {
                                                                                if ($rowGeneral['tipo_tercero'] == 2) {
                                                                                    $ArregloBalanceTercero2["{$rowGeneral['tercero_id']}"]["{$rowMotorizado['cuenta']}"]["debe"] = round(($ArregloBalanceTercero2["{$rowGeneral['tercero_id']}"]["{$rowMotorizado['cuenta']}"]["debe"] + $rowMotorizado['monto_debe']), 2);
                                                                                    $ArregloBalanceTercero2["{$rowGeneral['tercero_id']}"]["{$rowMotorizado['cuenta']}"]["haber"] = round(($ArregloBalanceTercero2["{$rowGeneral['tercero_id']}"]["{$rowMotorizado['cuenta']}"]["haber"] + $rowMotorizado['monto_haber']), 2);
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                    foreach ([$ArregloBalanceTercero, $ArregloBalanceTercero2] as $key => $value) {
                                                                        foreach ($value as $key2 => $value2) {
                                                                            foreach ($value2 as $key3 => $value3) {
                                                                                echo "<tr>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td>{$key3}</td>
                                                                                    <td>" . funcionMaster($key3, 'id', 'descripcion', 'CCuentas') . "</td>
                                                                                    <td>" . ($key == 0 ? funcionMasterMedical($key2, 'cliente_id', 'CODI_CLIENTE', 'cliente') : funcionMaster($key2, 'id', 'rut', 'sproveedores')) . "</td>
                                                                                    <td></td>
                                                                                    <td>" . ($key == 0 ? funcionMasterMedical($key2, 'cliente_id', 'nombre_cliente', 'cliente') : funcionMaster($key2, 'id', 'nombre', 'sproveedores')) . "</td>
                                                                                    <td>" . funcionMaster($key3, 'id', 'saldo_inicial', 'CCuentas') . "</td>
                                                                                    <td>{$value3['debe']}</td>
                                                                                    <td>{$value3['haber']}</td>
                                                                                    <td>" . ((funcionMaster($key3, 'id', 'saldo_inicial', 'CCuentas') + $value3['debe']) - $value3['haber']) . "</td>
                                                                                </tr>";
                                                                            }
                                                                        }
                                                                    }

                                                                } else if ($tipo_reporte == "Balance de prueba por Centro de Costo") {
                                                                    $centroCostoSelec = $_POST["centroCosto"];
                                                                    $queryGeneral = mysqli_query($conn3, "SELECT * FROM CCompDiario WHERE 
                                                                        tipo_comprobante in ('1','2','5','6') AND fecha BETWEEN '$desde' AND '$hasta' ORDER BY id;
                                                                    ");
                                                                    while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                                                        //1->factura,2->compras,5->cuentas x cobrar 6-> cuentas por pagar
                                                                        $tipo_comprobante = $rowGeneral['tipo_comprobante'];
                                                                        $id = $rowGeneral['id'];
                                                                        //recorrer en las diferentes tablas
                                                                        switch ($tipo_comprobante) {
                                                                            case '1':
                                                                                $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv WHERE idCentroCosto > 0 AND Comprobante_id = '$id' ");
                                                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                                                    $tercero = $rowMotorizado['idCliente'];
                                                                                    $idCentroCosto = $rowMotorizado['idCentroCosto'];
                                                                                    $cuenta = $rowMotorizado['idCuentaContable'];
                                                                                }
                                                                                break;
                                                                            case '2':
                                                                                $queryList = mysqli_query($conn3, "SELECT * FROM  opracioninvheader WHERE idCentroCosto > 0 AND Comprobante_id = '$id' ");
                                                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                                                    $tercero = $rowMotorizado['idTercero'];
                                                                                    $idCentroCosto = $rowMotorizado['idCentroCosto'];
                                                                                    $idCuentaContable_haber = $rowMotorizado['idCuentaContable_haber'];
                                                                                }
                                                                                break;
                                                                            case '5':
                                                                                $queryList1 = mysqli_query($conn3, "SELECT oi.* FROM sOperacionInv AS oi 
                                                                                    INNER JOIN sCuentasCobrar AS cc ON oi.idOperacion = cc.idDocumento 
                                                                                    INNER JOIN InformacionCuentasxCobrar AS ic 
                                                                                    ON cc.id = ic.id_sCuentasCobrar WHERE oi.idCentroCosto > 0 AND 
                                                                                    cc.Comprobante_id_movimientoCuentaXCobrar = '{$id}';
                                                                                ");
                                                                                while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                                                                    $tercero = $rowMotorizado1['idCliente'];
                                                                                    $idCentroCosto = $rowMotorizado1['idCentroCosto'];
                                                                                    $cuenta = $rowMotorizado['idCuentaContable'];
                                                                                }
                                                                                break;
                                                                            case '6':
                                                                                $queryList1 = mysqli_query($conn3, "SELECT oh.* FROM opracioninvheader AS oh 
                                                                                    INNER JOIN CuentasxPagar AS cxp ON oh.id = cxp.idDocumento 
                                                                                    INNER JOIN InformacionCuentasxPagar AS ixp
                                                                                    ON cxp.id = ixp.id_sCuentasPagar WHERE oh.idCentroCosto > 0 AND 
                                                                                    ixp.Comprobante_id_movimientoCuentaXPagar = '{$id}';
                                                                                ");
                                                                                while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                                                                    $tercero = $rowMotorizado1['idTercero'];
                                                                                    $idCentroCosto = $rowMotorizado1['idCentroCosto'];
                                                                                    $idCuentaContable_haber = $rowMotorizado1['idCuentaContable_haber'];
                                                                                }
                                                                                break;
                                                                        }
                                                                        $queryList = mysqli_query($conn3, "SELECT * FROM CCompDiarioMov WHERE idComprobante = '$id'");
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                                            if ($idCentroCosto == $centroCostoSelec || $centroCostoSelec == 0) {
                                                                                if ($tipo_comprobante = 1 || $tipo_comprobante = 5) {
                                                                                    $ArregloCentroCosto["$idCentroCosto"]["$cuenta"]["$tercero"]["debe"] = round(($ArregloCentroCosto["$idCentroCosto"]["$cuenta"]["$tercero"]["debe"] + $rowMotorizado['monto_debe']), 2);
                                                                                    $ArregloCentroCosto["$idCentroCosto"]["$cuenta"]["$tercero"]["haber"] = round(($ArregloCentroCosto["$idCentroCosto"]["$cuenta"]["$tercero"]["haber"] + $rowMotorizado['monto_haber']), 2);
                                                                                } else {
                                                                                    $ArregloCentroCosto2["$idCentroCosto"]["$cuenta"]["$tercero"]["debe"] = round(($ArregloCentroCosto["$idCentroCosto"]["$cuenta"]["$tercero"]["debe"] + $rowMotorizado['monto_debe']), 2);
                                                                                    $ArregloCentroCosto2["$idCentroCosto"]["$cuenta"]["$tercero"]["haber"] = round(($ArregloCentroCosto["$idCentroCosto"]["$cuenta"]["$tercero"]["haber"] + $rowMotorizado['monto_haber']), 2);
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                    foreach ([$ArregloCentroCosto, $ArregloCentroCosto2] as $key => $value) {
                                                                        // echo "$key Valor 1<br>";
                                                                        foreach ($value as $key2 => $value2) {
                                                                            // echo "$key2 Valor 2<br>";
                                                                            echo "<tr>
                                                                                <td colspan='13'> " . ($key == 0 ? "Centro de Costo " . funcionMaster($key2, 'id', 'descripcion', 'CcentroCostos') : '') . "</td>
                                                                            </tr>";
                                                                            foreach ($value2 as $key3 => $value3) {
                                                                                // echo "$key3 Valor 3<br>";
                                                                                foreach ($value3 as $key4 => $value4) {
                                                                                    // echo "$key4 Valor 4<br>";
                                                                                    $NombreCuenta = funcionMaster($key3, 'id', 'descripcion', 'CCuentas');
                                                                                    echo "<tr>
                                                                                        <td>{$key3}</td>
                                                                                        <td>{$NombreCuenta}</td>
                                                                                        <td>" . ($key == 0 ? funcionMasterMedical($key4, 'cliente_id', 'CODI_CLIENTE', 'cliente') : funcionMaster($key4, 'id', 'rut', 'sproveedores')) . "</td>
                                                                                        <td>" . ($key == 0 ? funcionMasterMedical($key4, 'cliente_id', 'nombre_cliente', 'cliente') : funcionMaster($key4, 'id', 'nombre', 'sproveedores')) . "</td>
                                                                                        <td></td>
                                                                                        <td>" . funcionMaster($key3, 'id', 'saldo_inicial', 'CCuentas') . "</td>
                                                                                        <td>{$value4['debe']}</td>
                                                                                        <td>{$value4['haber']}</td>
                                                                                        <td>" . round(((funcionMaster($key2, 'id', 'saldo_inicial', 'CCuentas') + $value4['debe']) - $value4['haber']), 2) . "</td>
                                                                                    </tr>";
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>

                                                <button onclick="DescargarExcel()" class="btn btn-block btn-primary btn-sm"> Descargar Excel </button>

                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->




                                            </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>



    <?php
    include 'footer.php';
    ?>
    <script src="plugins/ExcelAjax/jquery.table2excel.min.js"></script>

    <script>
        function DescargarExcel() {
            $("#example1").table2excel({
                exclude: ".excludeThisClass",
                name: "Reporte <?= $tipo_reporte; ?>",
                filename: "Reporte <?= $tipo_reporte; ?>.xls", // do include extension
                preserveColors: false // set to true if you want background colors and font colors preserved
            });
        }
    </script>