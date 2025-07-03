<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php';
//$_POST = preparePost($_POST, true);

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
                            <table id="1example" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <?php
                                  //Comprobantes Detallados
                                  $Cabezera["Comprobantes Detallados"] = ["Secuencia", "Fecha elaboracion", "Codigo cuenta contable", "Cuenta contable", "Identificacion", "Sucursal", "Nombre Tercero", "Descripcion", "Detalle/Referencia", "Centro de costo", "Debito", "Credito"];

                                  //Comprobantes Detallados
                                  $Cabezera["Libro Diario Resumido"] = ["Titulo", "Codigo cuenta contable", "Nombre cuenta contable", "Debito", "Credito"];

                                  //Estado De Situacion Financiera
                                  $Cabezera["Estado De Situacion Financiera"] = ["Codigo de cuenta", "Nombre Cuenta Contable"];
                                  //array_push($Cabezera["Estado De Situacion Financiera"], 'Año ' . $_POST["anualbusqueda"] . '');
                                  // array_push($Cabezera["Estado De Situacion Financiera"], 'Movimiento');
                                  // if ($_POST["compararanual"] != "") {
                                  //   //array_push($Cabezera["Estado De Situacion Financiera"], 'Año ' . $_POST["compararanual"] . '');
                                  //   array_push($Cabezera["Estado De Situacion Financiera"], 'Saldo Inicial');
                                  //   array_push($Cabezera["Estado De Situacion Financiera"], 'Saldo Final');
                                  // }

                                  // // Estado De Ganancia y Perdida
                                  // $Cabezera["Estado De Ganancia y Perdida"] = ["Codigo de cuenta", "Nombre Cuenta Contable"];
                                  // array_push($Cabezera["Estado De Ganancia y Perdida"], 'Año ' . $_POST["anualbusqueda"] . '');
                                  // if ($_POST["compararanual"] != "") {
                                  //   array_push($Cabezera["Estado De Ganancia y Perdida"], 'Año ' . $_POST["compararanual"] . '');
                                  //   // array_push($Cabezera["Estado De Ganancia y Perdida"], 'Año ' . $_POST["compararanual"] . '');
                                  // }
                                  if ($_POST["compararanual"] != "") {
                                    //array_push($Cabezera["Estado De Situacion Financiera"], 'Año ' . $_POST["compararanual"] . '');
                                    array_push($Cabezera["Estado De Situacion Financiera"], 'Saldo Inicial');
                                  }
                                  array_push($Cabezera["Estado De Situacion Financiera"], 'Movimiento');
                                  array_push($Cabezera["Estado De Situacion Financiera"], 'Saldo Final');

                                  // Estado De Ganancia y Perdida
                                  $Cabezera["Estado De Ganancia y Perdida"] = ["Codigo de cuenta", "Nombre Cuenta Contable"];
                                  // array_push($Cabezera["Estado De Ganancia y Perdida"], 'Año ' . $_POST["anualbusqueda"] . '');
                                  if ($_POST["compararanual"] != "") {
                                    array_push($Cabezera["Estado De Ganancia y Perdida"], "Saldo Inicial");
                                    // array_push($Cabezera["Estado De Ganancia y Perdida"], 'Año ' . $_POST["compararanual"] . '');
                                  }
                                  array_push($Cabezera["Estado De Ganancia y Perdida"], "Movimiento");
                                  array_push($Cabezera["Estado De Ganancia y Perdida"], "Saldo Final");

                                  //Reporte de Estado Resultado Integral
                                  $Cabezera["Estado Resultado Integral"] = ["Codigo cuenta contable", "Nombre cuenta contable", "Año"];

                                  //Libro de Inventario y Balance
                                  $Cabezera["Libro de Inventario y Balance"] = ["Codigo cuenta contable", "Nombre", "Monto Debito", "Monto Credito", "Saldo Deudor", "Saldo Acreedor", "Inventario Activo", "Inventario Pasivo", "Resultado Perdida", "Resultado Ganancia"];

                                  //Movimiento Auxiliar De Centro De Costo Por Cuenta Contable
                                  $Cabezera["Movimiento Auxiliar De Centro De Costo Por Cuenta Contable"] = ["Comprobante", "Secuencia", "Fecha Elaboracion", "Descripcion", "Detalle", "Debito", "Credito", "Saldo Movimiento"];

                                  //Movimiento Auxiliar De Proveedores Por Cuenta Contable
                                  $Cabezera["Movimiento Auxiliar De Proveedores Por Cuenta Contable"] = ["Identificacion", "Comprobante", "Secuencia", "Fecha Elaboracion", "Descripcion", "Vencimiento", "Debito", "Credito", "Saldo Movimiento"];

                                  //Movimiento Auxiliar Por Cuenta Contable
                                  $Cabezera["Movimiento Auxiliar Por Cuenta Contable"] = ["Codigo Cuenta", "Nombre Cuenta", "Comprobante", "Fecha", "Identificacion", "Nombre Tercero", "Descripcion", "Detalle", "Centro de Costo", "Debito", "Credito", "Saldo"];

                                  //Auxiliar Cuenta Contable Por Tercero
                                  $Cabezera["Auxiliar Cuenta Contable Por Tercero"] = ["Codigo Cuenta", "Nombre Cuenta", "Identificacion", "Nombre Tercero", "Saldo Inicial", "Debito", "Credito", "Nuevo Saldo"];

                                  //Recibos De Caja y Pagos
                                  $Cabezera["Recibos De Caja y Pagos"] = ["Comprobante", "Identificacion", "Nombre Tercero", "Centro De Costo", "Fecha De Creacion", "Fecha De Modificacion", "Fecha De Elaboracion", "Vencimiento", "Forma de Pago", "Valor", "Valor Anticipos", "Observaciones"];

                                  //Recibos De Caja Detallado Por Facturas
                                  $Cabezera["Recibos De Caja Detallado Por Facturas"] = ["Comprobante", "Fecha Elaboracion", "Creador", "Identificacion", "Nombre Cliente", "Cuenta Contable", "Vencimiento", "Valor", "Forma de Pago"];

                                  //Movimiento Auxiliar De Tercero Por Cuenta Contable
                                  $Cabezera["Movimiento Auxiliar De Tercero Por Cuenta Contable"] = ["Identificacion", "Nombre Tercero", "Codigo Contable", "Cuenta Contable", "Comprobante", "Fecha Elaboracion", "Saldo Inicial", "Debito", "Credito", "Saldo Movimiento"];

                                  //Movimiento Auxiliar De Gastos Por Cuenta Contable
                                  $Cabezera["Movimiento Auxiliar De Gastos Por Cuenta Contable"] = ["Codigo Cuenta", "Nombre Cuenta Contable", "Valor"];

                                  //Libro Diario
                                  $Cabezera["Libro Diario"] = ["Comprobante", "Fecha Elaboracion", "Codigo Contable", "Nombre Contable", "Debito", "Credito"];

                                  //Libro Mayor y Balance
                                  $Cabezera["Libro Mayor y Balance"] = ["Cuenta", "Comprobante", "Descripcion", "Debitos", "Creditos", "Saldo"];

                                  //Comprobante Por Tipo De Impuesto
                                  $queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOper  where (fechaRegistro BETWEEN '$desde 00:00:00' and '$hasta 00:00:00' ) GROUP BY ivaPorcentaje");
                                  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                    $PorcentajeIva = $rowMotorizado["ivaPorcentaje"];
                                    if ($PorcentajeIva != "" and $PorcentajeIva != "0") {
                                      $ArregloIva["$PorcentajeIva"] = "Aplica";
                                    }
                                  }
                                  $queryList = mysqli_query($conn3, "SELECT * FROM  operacioninv  where (fecha BETWEEN '$desde 00:00:00' and '$hasta 00:00:00' ) GROUP BY iva");
                                  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                    $PorcentajeIva = $rowMotorizado["iva"];
                                    if ($PorcentajeIva != "" and $PorcentajeIva != "0") {
                                      $ArregloIva["$PorcentajeIva"] = "Aplica";
                                    }
                                  }
                                  $Cabezera["Comprobante Por Tipo De Impuesto"] = ["Tipo Transaccion", "Comprobante", "Fecha", "Identificacion", "Nombre Tercero", "Centro Costo", "Valor Bruto", "Descuento"];
                                  foreach ($ArregloIva as $key => $value) {
                                    array_push($Cabezera["Comprobante Por Tipo De Impuesto"], "Iva $key");
                                  }
                                  array_push($Cabezera["Comprobante Por Tipo De Impuesto"], "Valor Neto");






                                  //Informe Impuesto Detallado
                                  $Cabezera["Informe Impuesto Detallado"] = ["Comprobante", "Identificacion", "Nombre Tercero", "Fecha Elaboracion", "Base Ventas", "Valor Impuesto Ventas", "Base Compras", "Valor Impuesto Compras", "Base Devolucion Ventas", "Valor Impuesto Devolucion Ventas", "Base Devolucion Compras", "Valor Impuesto Devolucion Compras"];

                                  //Cuentas Por Pagar Detallada Por Proveedor
                                  $Cabezera["Cuentas Por Pagar Detallada Por Proveedor"] = ["Identificacion", "Nombre del Proveedor", "Deuda A Pagar", "Valor Anticipos", "Saldo Proveedor", "Valor Vencido", "Valor Por Vencer", "Dias En Mora"];

                                  //Cuentas Por Pagar Por Centro de Costo
                                  $Cabezera["Cuentas Por Pagar Por Centro De Costo"] = ["Detalle", "No. Cuotas", "Identificacion", "Nombre Proveedor", "Deuda A Pagar [Inicial]", "Valor Anticipo", "Saldo Proveedor", "Valor Vencido", "Valor Por Vencer"];

                                  //Compras Por Producto Por Proveedor
                                  $Cabezera["Compras Por Producto Por Proveedor"] = ["Codigo Producto", "Nombre Producto", "Grupo Inventario", "Identificacion", "Nombre Proveedor", "Factura Proveedor", "Cantidad", "Valor Unitario", "Valor Bruto", "Descuento", "Subtotal", "Impuesto Cargo", "Impuesto Retencion", "Total"];

                                  //Auxiliar Cuenta Contable
                                  $Cabezera["Auxiliar Cuenta Contable"] = ["Codigo Cuenta Contable", "Cuenta Contable", "Saldo Inicial", "Debito", "Credito", "Nuevo Saldo"];

                                  //Auxiliar Cuenta Contable Por Centro De Costo
                                  $Cabezera["Auxiliar Cuenta Contable Por Centro De Costo"] = ["Codigo Cuenta Contable", "Cuenta Contable", "Codigo Centro Costo", "Nombre Centro Costo", "Saldo Inicial", "Debito", "Credito", "Nuevo Saldo"];

                                  foreach ($Cabezera[$tipo_reporte] as $key => $value) {
                                    echo "<th>{$value}</th>";
                                  }
                                  ?>
                                </tr>
                              </thead>
                              <tbody>
                                <?php

                                include 'funciones/conn3.php';








                                if ($tipo_reporte == "Libro de Inventario y Balance") {
                                  $queryGeneral = mysqli_query($conn3, "SELECT cuenta, descripcion, sum(monto_debe) AS debe, sum(monto_haber) AS haber, 
                                    IF (sum(monto_debe) > sum(monto_haber), sum(monto_debe) - sum(monto_haber), '0') AS saldoDeudor,
                                    IF (sum(monto_debe) <= sum(monto_haber), sum(monto_debe) - sum(monto_haber), '0') AS saldoAcreedor,
                                    IF (SUBSTRING(cuenta, 1, 1) = '1', sum(monto_debe) - sum(monto_haber), '0') AS inventarioActivo,
                                    IF (SUBSTRING(cuenta, 1, 1) = '2' OR SUBSTRING(cuenta, 1, 1) = '3', sum(monto_debe) - sum(monto_haber), '0') AS inventarioPasivo,
                                    IF (SUBSTRING(cuenta, 1, 1) = '4', sum(monto_debe) - sum(monto_haber), '0') AS resultadoGanancia,
                                    IF (SUBSTRING(cuenta, 1, 1) = '5', sum(monto_debe) - sum(monto_haber), '0') AS resultadoPerdida
                                    FROM CCompDiarioMov WHERE (fecha BETWEEN '$desde' AND '$hasta') AND 
                                    (cuenta LIKE '1%' OR cuenta LIKE '2%' OR cuenta LIKE '3%' OR cuenta LIKE '4%' OR cuenta LIKE '5%')
                                    GROUP BY cuenta ORDER BY cuenta ASC;
                                  ");
                                  while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                    echo "<tr>
                                          <td>{$rowGeneral['cuenta']}</td>
                                          <td>{$rowGeneral['descripcion']}</td>
                                          <td>{$rowGeneral['debe']}</td>
                                          <td>{$rowGeneral['haber']}</td>
                                          <td>{$rowGeneral['saldoDeudor']}</td>
                                          <td>{$rowGeneral['saldoAcreedor']}</td>
                                          <td>{$rowGeneral['inventarioActivo']}</td>
                                          <td>{$rowGeneral['inventarioPasivo']}</td>
                                          <td>{$rowGeneral['resultadoGanancia']}</td>
                                          <td>{$rowGeneral['resultadoPerdida']}</td>
                                        </tr>";
                                  }
                                } else if ($tipo_reporte == "Comprobantes Detallados") {

                                  foreach ($_POST["Comprobante"] as $key => $value) {
                                    switch ($value) {
                                      case 'Pago':
                                        $Secuencia = 0;
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiario  where (fecha BETWEEN '$desde' and '$hasta' ) AND tipo_comprobante = '2' ");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                          $id = $rowMotorizado['id'];
                                          $numero = $rowMotorizado['numero'];

                                          echo "<tr><td colspan='12'> Pago #{$numero}</td></tr>";

                                          $fecha = $rowMotorizado['fecha'];
                                          $idCentroCosto = $rowMotorizado['idCentroCosto'];
                                          $nombrecentrocosto = funcionMaster($idCentroCosto, 'id', 'descripcion', 'CcentroCostos');
                                          if ($nombrecentrocosto == "") {
                                            $nombrecentrocosto = "No diligenciado";
                                          }

                                          $tercero_id = funcionMaster($id, 'Comprobante_id', 'idTercero', 'opracioninvheader');
                                          $rut = funcionMaster($tercero_id, 'id', 'rut', 'sproveedores');
                                          $nombre_tercero = funcionMaster($cliente_id, 'id', 'nombre', 'sproveedores');

                                          $queryList1 = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where  numero = '$numero' order by id ASC");
                                          while ($rowComprobanteMov = mysqli_fetch_array($queryList1)) {
                                            $Secuencia++;

                                            $codigocuenta = $rowComprobanteMov['cuenta'];
                                            $cuentaNombre = funcionMaster($rowComprobanteMov['cuenta'], 'id', 'descripcion', 'CCuentas');
                                            $sucursal = 0;
                                            $descripcion = $rowComprobanteMov['descripcion'];
                                            $referencia = $rowComprobanteMov['referencia'];

                                            $monto_debe = $rowComprobanteMov['monto_debe'];
                                            $monto_haber = $rowComprobanteMov['monto_haber'];

                                            echo "<tr>
                                                <td>$Secuencia</td>
                                                <td>$fecha</td>
                                                <td>$codigocuenta</td>
                                                <td>$cuentaNombre</td>
                                                <td>$rut</td>
                                                <td>$sucursal</td>
                                                <td>$nombre_tercero</td>
                                                <td>$descripcion</td>
                                                <td>$referencia</td>
                                                <td>$nombrecentrocosto</td>
                                                <td>$monto_debe</td>
                                                <td>$monto_haber</td>
                                              </tr>";
                                          }
                                        }


                                        break;
                                      case 'Factura':
                                        $Secuencia = 0;
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiario  where (fecha BETWEEN '$desde' and '$hasta' ) AND tipo_comprobante = '1' ");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                          $id = $rowMotorizado['id'];
                                          $numero = $rowMotorizado['numero'];

                                          echo "<tr><td colspan='12'> Factura #{$numero}</td></tr>";

                                          $fecha = $rowMotorizado['fecha'];
                                          $idCentroCosto = $rowMotorizado['idCentroCosto'];
                                          $nombrecentrocosto = funcionMaster($idCentroCosto, 'id', 'descripcion', 'CcentroCostos');
                                          if ($nombrecentrocosto == "") {
                                            $nombrecentrocosto = "No diligenciado";
                                          }

                                          $cliente_id = funcionMaster($id, 'Comprobante_id', 'idCliente', 'sOperacionInv');
                                          $cedula = funcionMasterMedical($cliente_id, 'cliente_id', 'CODI_CLIENTE', 'cliente');
                                          $nombre_cliente = funcionMasterMedical($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');

                                          $queryList1 = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where  numero = '$numero' order by id ASC");
                                          while ($rowComprobanteMov = mysqli_fetch_array($queryList1)) {
                                            $Secuencia++;

                                            $codigocuenta = $rowComprobanteMov['cuenta'];
                                            $cuentaNombre = funcionMaster($rowComprobanteMov['cuenta'], 'id', 'descripcion', 'CCuentas');
                                            $sucursal = 0;
                                            $descripcion = $rowComprobanteMov['descripcion'];
                                            $referencia = $rowComprobanteMov['referencia'];

                                            $monto_debe = $rowComprobanteMov['monto_debe'];
                                            $monto_haber = $rowComprobanteMov['monto_haber'];

                                            echo "<tr>
                                                <td>$Secuencia</td>
                                                <td>$fecha</td>
                                                <td>$codigocuenta</td>
                                                <td>$cuentaNombre</td>
                                                <td>$cedula</td>
                                                <td>$sucursal</td>
                                                <td>$nombre_cliente</td>
                                                <td>$descripcion</td>
                                                <td>$referencia</td>
                                                <td>$nombrecentrocosto</td>
                                                <td>$monto_debe</td>
                                                <td>$monto_haber</td>
                                              </tr>";
                                          }
                                        }

                                        break;
                                      case 'Gastos y Egresos':
                                        $Secuencia = 0;
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiario  where (fecha BETWEEN '$desde' and '$hasta' ) AND tipo_comprobante = '3' ");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                          $id = $rowMotorizado['id'];
                                          $numero = $rowMotorizado['numero'];

                                          echo "<tr><td colspan='12'> Gasto y Egreso #{$numero}</td></tr>";

                                          $fecha = $rowMotorizado['fecha'];
                                          $idCentroCosto = $rowMotorizado['idCentroCosto'];
                                          $nombrecentrocosto = funcionMaster($idCentroCosto, 'id', 'descripcion', 'CcentroCostos');
                                          if ($nombrecentrocosto == "") {
                                            $nombrecentrocosto = "No diligenciado";
                                          }

                                          //$cliente_id=funcionMaster($id,'Comprobante_id','idCliente','sOperacionInv');
                                          $cedula = "No Registra";
                                          $nombre_cliente = "No Registra";

                                          $queryList1 = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where  numero = '$numero' order by id ASC");
                                          while ($rowComprobanteMov = mysqli_fetch_array($queryList1)) {
                                            $Secuencia++;

                                            $codigocuenta = $rowComprobanteMov['cuenta'];
                                            $cuentaNombre = funcionMaster($rowComprobanteMov['cuenta'], 'id', 'descripcion', 'CCuentas');
                                            $sucursal = 0;
                                            $descripcion = $rowComprobanteMov['descripcion'];
                                            $referencia = $rowComprobanteMov['referencia'];

                                            $monto_debe = $rowComprobanteMov['monto_debe'];
                                            $monto_haber = $rowComprobanteMov['monto_haber'];

                                            echo "<tr>
                                                <td>$Secuencia</td>
                                                <td>$fecha</td>
                                                <td>$codigocuenta</td>
                                                <td>$cuentaNombre</td>
                                                <td>$cedula</td>
                                                <td>$sucursal</td>
                                                <td>$nombre_cliente</td>
                                                <td>$descripcion</td>
                                                <td>$referencia</td>
                                                <td>$nombrecentrocosto</td>
                                                <td>$monto_debe</td>
                                                <td>$monto_haber</td>
                                              </tr>";
                                          }
                                        }

                                        break;

                                      case 'Comprobante [Documento]':
                                        $Secuencia = 0;
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiario  where (fecha BETWEEN '$desde' and '$hasta' ) AND tipo_comprobante = '0' ");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                          $id = $rowMotorizado['id'];
                                          $numero = $rowMotorizado['numero'];

                                          echo "<tr><td colspan='12'> Comprobante [Documento] #{$numero}</td></tr>";

                                          $fecha = $rowMotorizado['fecha'];
                                          $idCentroCosto = $rowMotorizado['idCentroCosto'];
                                          $nombrecentrocosto = funcionMaster($idCentroCosto, 'id', 'descripcion', 'CcentroCostos');
                                          if ($nombrecentrocosto == "") {
                                            $nombrecentrocosto = "No diligenciado";
                                          }
                                          //$cliente_id=funcionMaster($id,'Comprobante_id','idCliente','sOperacionInv');
                                          $cedula = "No Registra";
                                          $nombre_cliente = "No Registra";


                                          $queryList1 = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where  numero = '$numero' order by id ASC");
                                          while ($rowComprobanteMov = mysqli_fetch_array($queryList1)) {
                                            $Secuencia++;

                                            $codigocuenta = $rowComprobanteMov['cuenta'];
                                            $cuentaNombre = funcionMaster($rowComprobanteMov['cuenta'], 'id', 'descripcion', 'CCuentas');
                                            $sucursal = 0;
                                            $descripcion = $rowComprobanteMov['descripcion'];
                                            $referencia = $rowComprobanteMov['referencia'];

                                            $monto_debe = $rowComprobanteMov['monto_debe'];
                                            $monto_haber = $rowComprobanteMov['monto_haber'];

                                            echo "<tr>
                                                <td>$Secuencia</td>
                                                <td>$fecha</td>
                                                <td>$codigocuenta</td>
                                                <td>$cuentaNombre</td>
                                                <td>$cedula</td>
                                                <td>$sucursal</td>
                                                <td>$nombre_cliente</td>
                                                <td>$descripcion</td>
                                                <td>$referencia</td>
                                                <td>$nombrecentrocosto</td>
                                                <td>$monto_debe</td>
                                                <td>$monto_haber</td>
                                              </tr>";
                                          }
                                        }

                                        break;
                                    }
                                  }
                                } else if ($tipo_reporte == "Libro Diario Resumido") {

                                  foreach ($_POST["Comprobante"] as $key => $value) {
                                    switch ($value) {
                                      case 'Pago':
                                        $ArregloABuscar[] = 2;
                                        break;
                                      case 'Factura':
                                        $ArregloABuscar[] = 1;
                                        break;
                                      case 'Gastos y Egresos':
                                        $ArregloABuscar[] = 3;
                                        break;
                                      case 'Comprobante [Documento]':
                                        $ArregloABuscar[] = 0;
                                        break;
                                    }

                                    foreach ($ArregloABuscar as $key => $value) {
                                      $Secuencia = 0;
                                      $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiario  where (fecha BETWEEN '$desde' and '$hasta' ) AND tipo_comprobante = '$value' ");
                                      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id = $rowMotorizado['id'];
                                        $numero = $rowMotorizado['numero'];

                                        switch ($value) {
                                          case '0':
                                            echo "<tr><td colspan='12'><b>Comprobante [Documento] #{$numero}</b></td></tr>";
                                            break;
                                          case '1':
                                            echo "<tr><td colspan='12'><b>Factura #{$numero}</b></td></tr>";
                                            break;
                                          case '2':
                                            echo "<tr><td colspan='12'><b>Pago #{$numero}</b></td></tr>";
                                            break;
                                          case '3':
                                            echo "<tr><td colspan='12'><b> Gastos y Egresos #{$numero}</b></td></tr>";
                                            break;
                                        }


                                        $queryList1 = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where  numero = '$numero' order by id ASC");
                                        while ($rowComprobanteMov = mysqli_fetch_array($queryList1)) {
                                          $Secuencia++;

                                          $codigocuenta = $rowComprobanteMov['cuenta'];
                                          $cuentaNombre = funcionMaster($rowComprobanteMov['cuenta'], 'id', 'descripcion', 'CCuentas');
                                          $descripcion = $rowComprobanteMov['descripcion'];

                                          $monto_debe = $rowComprobanteMov['monto_debe'];
                                          $monto_haber = $rowComprobanteMov['monto_haber'];

                                          echo "<tr>
                                                    <td>$descripcion</td>
                                                    <td>$codigocuenta</td>
                                                    <td>$cuentaNombre</td>
                                                    <td>$monto_debe</td>
                                                    <td>$monto_haber</td>
                                                    </tr>";
                                        }
                                      }
                                    }
                                  }
                                } else if ($tipo_reporte == "Estado De Situacion Financiera") {
                                  $cuentasUsadas = [];
                                  $desdeAnual = "{$_POST["compararanual"]}-01-01";
                                  $hastaAnual = "{$_POST["compararanual"]}-12-31";
                                  $patrimonio = 0;
                                  $queryGeneral = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where  (fecha BETWEEN '$desde' and '$hasta' ) AND (cuenta LIKE '1%' OR cuenta LIKE '2%' OR cuenta LIKE '3%') group by cuenta ");
                                  while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                    $cuenta = $rowGeneral['cuenta'];
                                    array_push($cuentasUsadas, $cuenta);


                                    mysqli_set_charset($conn3, "utf8");
                                    $queryList = mysqli_query($conn3, "SELECT descripcion FROM  CCuentas  where  id = '$cuenta'");
                                    $rowMotorizado = mysqli_fetch_array($queryList);

                                    $cuentaNombre = $rowMotorizado["descripcion"];
                                    $queryList = mysqli_query($conn3, "SELECT cuenta, SUM(monto_debe) as total_debe , SUM(monto_haber) as total_haber FROM  CCompDiarioMov  where (fecha BETWEEN '$desde' and '$hasta' ) AND cuenta = '$cuenta'");
                                    $comparemos = 0;
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                      $total_debe = $rowMotorizado['total_debe'];
                                      if ($total_debe == "") {
                                        $total_debe = 0;
                                      }
                                      $total_haber = $rowMotorizado['total_haber'];
                                      if ($total_haber == "") {
                                        $total_haber = 0;
                                      }

                                      $total_anual = $total_debe - $total_haber;
                                      $comparemos = ($total_debe == $total_haber ? $total_debe : 0);
                                    }
                                    $comparemos;

                                    if ($total_anual < 0) $total_anual = ($total_anual * -1);

                                    if ($_POST["compararanual"] != "") {

                                      $desde_comparativo = str_replace($_POST["anualbusqueda"], $_POST["compararanual"], $desde);
                                      $hasta_comparativo = str_replace($_POST["anualbusqueda"], $_POST["compararanual"], $hasta);
                                      // $total_debe_comparativo = 0;
                                      // $total_haber_comparativo = 0;
                                      $comparemos2 = 0;
                                      $queryList = mysqli_query($conn3, "SELECT cuenta, SUM(monto_debe) as total_debe , SUM(monto_haber) as total_haber FROM  CCompDiarioMov  where (fecha BETWEEN '$desde_comparativo' and '$hasta_comparativo' ) AND cuenta = '$cuenta' ");
                                      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $total_debe_comparativo = $rowMotorizado['total_debe'];
                                        if ($total_debe_comparativo == "") {
                                          $total_debe_comparativo = 0;
                                        }
                                        $total_haber_comparativo = $rowMotorizado['total_haber'];
                                        if ($total_haber_comparativo == "") {
                                          $total_haber = 0;
                                        }
                                        // debe ingresa
                                        // haber sale
                                        $total_anual_comparativo = $total_debe_comparativo - $total_haber_comparativo;
                                        $comparemos2 = ($total_debe_comparativo == $total_haber_comparativo ? $total_debe_comparativo : 0);
                                      }
                                      if ($total_anual_comparativo < 0) $total_anual_comparativo = ($total_anual_comparativo * -1);

                                      if (!empty($total_haber_comparativo) && preg_match("/^1.3.13.26.01/", $rowGeneral['cuenta'])) {
                                        $Total_Final = $total_anual - $total_anual_comparativo;
                                      } else {
                                        $Total_Final = $total_anual + $total_anual_comparativo;
                                      }

                                      echo "<tr><td>" . $cuenta . "</td>";
                                      echo "<td>" . $cuentaNombre . "</td>";
                                      echo "<td>" . $total_anual_comparativo . "</td>";
                                      echo "<td>" . (!empty($comparemos) ? $comparemos : $total_anual) . "</td>";
                                      echo "<td>" . $Total_Final . "</td></tr>";
                                    } else {
                                      echo "<tr><td>" . $cuenta . "</td>";
                                      echo "<td>" . $cuentaNombre . "</td>";
                                      echo "<td>" . (!empty($comparemos) ? $comparemos : $total_anual) . "</td></tr>";
                                    }
                                    // $patrimonio
                                  }
                                  $patrimonio = funcionMaster('3.1.01.01.01', 'id', 'saldo_inicial', 'CCuentas');
                                  $ingreso1 = 0; // 4
                                  $gastos1 = 0; // 5
                                  $ingreso2 = 0; // 4
                                  $gastos2 = 0; // 5
                                  // $cuentasUsadas = [];
                                  $desdeAnual1 = "{$_POST["anualbusqueda"]}-01-01";
                                  $hastaAnual1 = "{$_POST["anualbusqueda"]}-12-31";
                                  $desdeAnual2 = "{$_POST["compararanual"]}-01-01";
                                  $hastaAnual2 = "{$_POST["compararanual"]}-12-31";
                                  $queryGeneral = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where  (fecha BETWEEN '$desdeAnual1' and '$hastaAnual1' ) AND (cuenta LIKE '4%' OR cuenta LIKE '5%') group by cuenta ");
                                  while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                    $cuenta = $rowGeneral['cuenta'];

                                    mysqli_set_charset($conn3, "utf8");
                                    $queryList = mysqli_query($conn3, "SELECT descripcion FROM  CCuentas  where  id = '$cuenta'");
                                    $rowMotorizado = mysqli_fetch_array($queryList);

                                    $cuentaNombre = $rowMotorizado["descripcion"];
                                    $queryList = mysqli_query($conn3, "SELECT cuenta, SUM(monto_debe) as total_debe , SUM(monto_haber) as total_haber FROM  CCompDiarioMov  where (fecha BETWEEN '$desdeAnual1' and '$hastaAnual1' ) AND cuenta = '$cuenta' ");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                      $total_debe = $rowMotorizado['total_debe'];
                                      if ($total_debe == "") {
                                        $total_debe = 0;
                                      }
                                      $total_haber = $rowMotorizado['total_haber'];
                                      if ($total_haber == "") {
                                        $total_haber = 0;
                                      }

                                      $total_anual = $total_debe - $total_haber;
                                    }

                                    if ($total_anual < 0) {
                                      $total_anual = ($total_anual * -1);
                                    }

                                    if (preg_match("/^4/", $rowGeneral['cuenta'])) {
                                      $ingreso1 = $ingreso1 + $total_anual;
                                    }
                                    if (preg_match("/^5/", $rowGeneral['cuenta'])) {
                                      $gastos1 = $gastos1 + $total_anual;
                                    }
                                  }
                                  $totalGP1 = ($gastos1 - $ingreso1);

                                  $queryGeneral = mysqli_query($conn3, "SELECT * FROM CCompDiarioMov  where  (fecha BETWEEN '$desdeAnual2' and '$hastaAnual2' ) AND (cuenta LIKE '4%' OR cuenta LIKE '5%') group by cuenta ");
                                  while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                    $cuenta = $rowGeneral['cuenta'];

                                    mysqli_set_charset($conn3, "utf8");
                                    $queryList = mysqli_query($conn3, "SELECT descripcion FROM  CCuentas  where  id = '$cuenta'");
                                    $rowMotorizado = mysqli_fetch_array($queryList);

                                    $cuentaNombre = $rowMotorizado["descripcion"];
                                    $queryList = mysqli_query($conn3, "SELECT cuenta, SUM(monto_debe) as total_debe , SUM(monto_haber) as total_haber FROM  CCompDiarioMov  where (fecha BETWEEN '$desdeAnual2' and '$hastaAnual2' ) AND cuenta = '$cuenta' ");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                      $total_debe = $rowMotorizado['total_debe'];
                                      if ($total_debe == "") {
                                        $total_debe = 0;
                                      }
                                      $total_haber = $rowMotorizado['total_haber'];
                                      if ($total_haber == "") {
                                        $total_haber = 0;
                                      }

                                      $total_anual = $total_debe - $total_haber;
                                    }

                                    if ($total_anual < 0) {
                                      $total_anual = ($total_anual * -1);
                                    }

                                    if (preg_match("/^4/", $rowGeneral['cuenta'])) {
                                      $ingreso2 = $ingreso2 + $total_anual;
                                    }
                                    if (preg_match("/^5/", $rowGeneral['cuenta'])) {
                                      $gastos2 = $gastos2 + $total_anual;
                                    }
                                  }
                                  $totalGP2 = ($gastos2 - $ingreso2);
                                  if ($_POST["compararanual"] != "") {
                                    $queryGeneral = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where  (fecha BETWEEN '$desdeAnual' and '$hastaAnual' ) AND (cuenta LIKE '1%' OR cuenta LIKE '2%' OR cuenta LIKE '3%') group by cuenta ");
                                    while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                      $cuenta = $rowGeneral['cuenta'];
                                      if (!in_array($cuenta, $cuentasUsadas)) {
                                        mysqli_set_charset($conn3, "utf8");
                                        $queryList = mysqli_query($conn3, "SELECT descripcion FROM  CCuentas  where  id = '$cuenta'");
                                        $rowMotorizado = mysqli_fetch_array($queryList);

                                        $cuentaNombre = $rowMotorizado["descripcion"];

                                        $queryList = mysqli_query($conn3, "SELECT cuenta, SUM(monto_debe) as total_debe , SUM(monto_haber) as total_haber FROM  CCompDiarioMov  where (fecha BETWEEN '$desde' and '$hasta' ) AND cuenta = '$cuenta' ");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                          $total_debe = $rowMotorizado['total_debe'];
                                          if ($total_debe == "") {
                                            $total_debe = 0;
                                          }
                                          $total_haber = $rowMotorizado['total_haber'];
                                          if ($total_haber == "") {
                                            $total_haber = 0;
                                          }

                                          $total_anual = $total_debe - $total_haber;
                                        }

                                        if ($_POST["compararanual"] != "") {

                                          $desde_comparativo = str_replace($_POST["anualbusqueda"], $_POST["compararanual"], $desde);
                                          $hasta_comparativo = str_replace($_POST["anualbusqueda"], $_POST["compararanual"], $hasta);

                                          $queryList = mysqli_query($conn3, "SELECT cuenta, SUM(monto_debe) as total_debe , SUM(monto_haber) as total_haber FROM  CCompDiarioMov  where (fecha BETWEEN '$desde_comparativo' and '$hasta_comparativo' ) AND cuenta = '$cuenta' ");
                                          while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                            $total_debe_comparativo = $rowMotorizado['total_debe'];
                                            if ($total_debe_comparativo == "") {
                                              $total_debe_comparativo = 0;
                                            }
                                            $total_haber_comparativo = $rowMotorizado['total_haber'];
                                            if ($total_haber_comparativo == "") {
                                              $total_haber = 0;
                                            }

                                            $total_anual_comparativo = $total_debe_comparativo - $total_haber_comparativo;
                                          }

                                          $Total_Final = $total_anual + $total_anual_comparativo;

                                          echo "<tr><td>" . $cuenta . "</td>";
                                          echo "<td>" . $cuentaNombre . "</td>";
                                          echo "<td>" . $total_anual_comparativo . "</td>";
                                          echo "<td>" . $total_anual . "</td>";
                                          echo "<td>" . $Total_Final . "</td></tr>";
                                        }
                                      }
                                    }
                                  }
                                  echo "<tr><td></td>";
                                  echo "<td></td>";
                                  echo "<td></td>";
                                  echo "<td style='font-weight: bold;' >Perdida o Utilidad {$_POST["anualbusqueda"]}</td>";
                                  echo "<td>-" . $totalGP1 . "</td></tr>";
                                  echo "<tr><td></td>";
                                  echo "<td></td>";
                                  echo "<td></td>";
                                  echo "<td style='font-weight: bold;' >Perdida o Utilidad {$_POST["compararanual"]}</td>";
                                  echo "<td>-" . $totalGP2 . "</td></tr>";
                                  echo "<tr><td></td>";
                                  echo "<td></td>";
                                  echo "<td></td>";
                                  echo "<td style='font-weight: bold;' >Patrimonio</td>";
                                  echo "<td>" . ($patrimonio - $totalGP1 - $totalGP2) . "</td></tr>";
                                } else if ($tipo_reporte == "Estado De Ganancia y Perdida") {
                                  $ingreso = 0; // 4
                                  $gastos = 0; // 5
                                  $ingresoComparativa = 0; // 4
                                  $gastosComparativa = 0; // 5
                                  $cuentasUsadas = [];
                                  $desdeAnual = "{$_POST["compararanual"]}-01-01";
                                  $hastaAnual = "{$_POST["compararanual"]}-12-31";
                                  $queryGeneral = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where  (fecha BETWEEN '$desde' and '$hasta' ) AND (cuenta LIKE '4%' OR cuenta LIKE '5%') group by cuenta ");
                                  while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                    $cuenta = $rowGeneral['cuenta'];
                                    array_push($cuentasUsadas, $cuenta);

                                    mysqli_set_charset($conn3, "utf8");
                                    $queryList = mysqli_query($conn3, "SELECT descripcion FROM  CCuentas  where  id = '$cuenta'");
                                    $rowMotorizado = mysqli_fetch_array($queryList);

                                    $cuentaNombre = $rowMotorizado["descripcion"];
                                    $queryList = mysqli_query($conn3, "SELECT cuenta, SUM(monto_debe) as total_debe , SUM(monto_haber) as total_haber FROM  CCompDiarioMov  where (fecha BETWEEN '$desde' and '$hasta' ) AND cuenta = '$cuenta' ");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                      $total_debe = $rowMotorizado['total_debe'];
                                      if ($total_debe == "") {
                                        $total_debe = 0;
                                      }
                                      $total_haber = $rowMotorizado['total_haber'];
                                      if ($total_haber == "") {
                                        $total_haber = 0;
                                      }

                                      $total_anual = $total_debe - $total_haber;
                                    }

                                    if ($total_anual < 0) {
                                      $total_anual = ($total_anual * -1);
                                    }

                                    if (preg_match("/^4/", $rowGeneral['cuenta'])) {
                                      $ingreso = $ingreso + $total_anual;
                                    }
                                    if (preg_match("/^5/", $rowGeneral['cuenta'])) {
                                      $gastos = $gastos + $total_anual;
                                    }

                                    if ($_POST["compararanual"] != "") {
                                      // $desde_comparativo = str_replace($_POST["anualbusqueda"], $_POST["compararanual"], $desde);
                                      // $hasta_comparativo = str_replace($_POST["anualbusqueda"], $_POST["compararanual"], $hasta);
                                      $queryList = mysqli_query($conn3, "SELECT cuenta, SUM(monto_debe) as total_debe , SUM(monto_haber) as total_haber FROM  CCompDiarioMov  where (fecha BETWEEN '$desdeAnual' and '$hastaAnual' ) AND cuenta = '$cuenta'");
                                      while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                        $total_debe_comparativo = $rowMotorizado['total_debe'];
                                        if ($total_debe_comparativo == "") {
                                          $total_debe_comparativo = 0;
                                        }
                                        $total_haber_comparativo = $rowMotorizado['total_haber'];
                                        if ($total_haber_comparativo == "") {
                                          $total_haber = 0;
                                        }
                                        $total_anual_comparativo = $total_debe_comparativo - $total_haber_comparativo;
                                      }

                                      if ($total_anual_comparativo < 0) {
                                        $total_anual_comparativo = ($total_anual_comparativo * -1);
                                      }

                                      echo "<tr><td>" . $cuenta . "</td>";
                                      echo "<td>" . $cuentaNombre . "</td>";
                                      echo "<td>0</td>";
                                      echo "<td>" . $total_anual . "</td>";
                                      $saldoFinalMonto = $total_anual_comparativo + $total_anual;
                                      echo "<td>" . $saldoFinalMonto . "</td></tr>";
                                    } else {
                                      echo "<tr><td>" . $cuenta . "</td>";
                                      echo "<td>" . $cuentaNombre . "</td>";
                                      echo "<td>" . $total_anual . "</td>
                                        <td>" . $total_anual . "</td>
                                      </tr>";
                                    }
                                  }
                                  if ($_POST["compararanual"] != "") {
                                    $queryGeneral = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where  (fecha BETWEEN '$desdeAnual' and '$hastaAnual' ) AND (cuenta LIKE '4%' OR cuenta LIKE '5%') group by cuenta ");
                                    while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                      $cuenta = $rowGeneral['cuenta'];
                                      if (!in_array($cuenta, $cuentasUsadas)) {
                                        mysqli_set_charset($conn3, "utf8");
                                        $queryList = mysqli_query($conn3, "SELECT descripcion FROM  CCuentas  where  id = '$cuenta'");
                                        $rowMotorizado = mysqli_fetch_array($queryList);

                                        $cuentaNombre = $rowMotorizado["descripcion"];
                                        $queryList = mysqli_query($conn3, "SELECT cuenta, SUM(monto_debe) as total_debe , SUM(monto_haber) as total_haber FROM  CCompDiarioMov  where (fecha BETWEEN '$desde' and '$hasta' ) AND cuenta = '$cuenta' ");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                          $total_debe = $rowMotorizado['total_debe'];
                                          if ($total_debe == "") {
                                            $total_debe = 0;
                                          }
                                          $total_haber = $rowMotorizado['total_haber'];
                                          if ($total_haber == "") {
                                            $total_haber = 0;
                                          }

                                          $total_anual = $total_debe - $total_haber;
                                        }

                                        if ($total_anual < 0) {
                                          $total_anual = ($total_anual * -1);
                                        }

                                        // if (preg_match("/^4/", $rowGeneral['cuenta'])) {
                                        //   $ingreso = $ingreso + $total_anual;
                                        // }
                                        // if (preg_match("/^5/", $rowGeneral['cuenta'])) {
                                        //   $gastos = $gastos + $total_anual;
                                        // }

                                        if ($_POST["compararanual"] != "") {
                                          // $desde_comparativo = str_replace($_POST["anualbusqueda"], $_POST["compararanual"], $desde);
                                          // $hasta_comparativo = str_replace($_POST["anualbusqueda"], $_POST["compararanual"], $hasta);
                                          // $desdeAnual = "{$_POST["compararanual"]}-01-01";
                                          // $hastaAnual = "{$_POST["compararanual"]}-12-31";
                                          $queryList = mysqli_query($conn3, "SELECT cuenta, SUM(monto_debe) as total_debe , SUM(monto_haber) as total_haber FROM  CCompDiarioMov  where (fecha BETWEEN '$desdeAnual' and '$hastaAnual' ) AND cuenta = '$cuenta'");
                                          while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                            $total_debe_comparativo = $rowMotorizado['total_debe'];
                                            if ($total_debe_comparativo == "") {
                                              $total_debe_comparativo = 0;
                                            }
                                            $total_haber_comparativo = $rowMotorizado['total_haber'];
                                            if ($total_haber_comparativo == "") {
                                              $total_haber = 0;
                                            }
                                            $total_anual_comparativo = $total_debe_comparativo - $total_haber_comparativo;
                                          }
                                          // echo "<tr><td>" . $cuenta . "</td>";
                                          // echo "<td>" . $cuentaNombre . "</td>";
                                          // echo "<td>" . $total_anual_comparativo . "</td>";
                                          // echo "<td>" . $total_anual . "</td>";
                                          // $saldoFinalMonto = $total_anual_comparativo + $total_anual;
                                          // echo "<td>" . $saldoFinalMonto . "</td></tr>";
                                          echo "<tr>
                                        <td>" . $cuenta . "</td>";
                                          echo "<td>" . $cuentaNombre . "</td>";
                                          echo "<td>0</td>";
                                          echo "<td>0</td>";
                                          $saldoFinalMonto = $total_anual_comparativo + 0;
                                          echo "<td>0</td></tr>";
                                        }
                                      }
                                    }
                                  }
                                  $tdAdicional = ($_POST["compararanual"] != "" ? '<td></td>' : '');
                                  echo "<tr>
                                    <td></td>{$tdAdicional}
                                    <td align='right' style='font-weight: bold;'>Ingresos Netos</td>
                                    <td>" . $ingreso . "</td>{$tdAdicional}
                                  </tr>";
                                  echo "<tr>
                                    <td></td>{$tdAdicional}
                                    <td align='right' style='font-weight: bold;'>Gastos Totales</td>
                                    <td>" . $gastos . "</td>{$tdAdicional}
                                  </tr>";
                                  echo "<tr>
                                    <td></td>{$tdAdicional}
                                    <td align='right' style='font-weight: bold;'>Utilidad o Perdida del Periodo</td>
                                    <td>-" . ($gastos - $ingreso) . "</td>{$tdAdicional}
                                  </tr>";
                                } else if ($tipo_reporte == "Estado Resultado Integral") {

                                  //echo "console.log(SELECT * FROM  CCompDiarioMov  where  (fecha BETWEEN '$desde' and '$hasta' ) group by cuenta  ORDER BY cuenta desc";
                                  $queryGeneral = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where  (fecha BETWEEN '$desde' and '$hasta' ) group by cuenta  ORDER BY cuenta ASC");
                                  while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                    $cuenta = $rowGeneral['cuenta'];
                                    $CuentaMaestra = $cuenta[0] . $cuenta[1];
                                    $ArregloCuentas["$CuentaMaestra"][] = $cuenta;
                                  }


                                  foreach ($ArregloCuentas as $key => $value) {
                                    $monto_total_cuenta = 0;
                                    foreach ($value as $key1 => $value1) {

                                      $queryList = mysqli_query($conn3, "SELECT cuenta, SUM(monto_debe) as total_debe , SUM(monto_haber) as total_haber FROM  CCompDiarioMov  where (fecha BETWEEN '$desde' and '$hasta' ) AND cuenta = '$value1' ");
                                      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $cuenta = $rowMotorizado['cuenta'];
                                        $total_debe = $rowMotorizado['total_debe'];
                                        if ($total_debe == "") {
                                          $total_debe = 0;
                                        }
                                        $total_haber = $rowMotorizado['total_haber'];
                                        if ($total_haber == "") {
                                          $total_haber = 0;
                                        }

                                        $total_anual = $total_debe - $total_haber;

                                        mysqli_set_charset($conn3, "utf8");
                                        $queryList = mysqli_query($conn3, "SELECT descripcion FROM  CCuentas  where  id = '$cuenta'");
                                        $rowMotorizado = mysqli_fetch_array($queryList);

                                        $cuentaNombre = $rowMotorizado["descripcion"];

                                        echo "<tr><td>" . $cuenta . "</td>";
                                        echo "<td>" . $cuentaNombre . "</td>";
                                        echo "<td>" . $total_anual . "</td></tr>";

                                        $monto_total_cuenta = $monto_total_cuenta + $total_anual;
                                      }
                                    }


                                    if ($key[0] == "") {
                                      $cuentafinal = $value[0];
                                    } else {
                                      $cuentafinal = $key[0];
                                    }
                                    $nombrecuenta = funcionMaster($cuentafinal, 'id', 'descripcion', 'CCuentas');
                                    echo "<tr><td colspan='2' style='background-color: #91c3ef;'>Total Cuenta  [$nombrecuenta] </td><td style='background-color: #91c3ef;'>$monto_total_cuenta</td></tr>";
                                  }

                                  /*
                                        echo "<pre>";
                                        print_r($ArregloCuentas);
                                        echo "</pre>";
                                        */
                                } else if ($tipo_reporte == "Movimiento Auxiliar De Centro De Costo Por Cuenta Contable") {

                                  $centrocosto = $_POST['centrocosto'];
                                  $cuentacontable = $_POST['cuentacontable'];

                                  if ($centrocosto == "Todos") {
                                    $FiltroWhere = "";
                                  } else {
                                    $FiltroWhere = " AND idCentroCosto = '$centrocosto'";
                                    $FiltroWhereEspecial = " AND CD.idCentroCosto = '$centrocosto'";
                                  }

                                  $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiario  where fecha <= '$hasta' {$FiltroWhere} ");
                                  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                    $id = $rowMotorizado['id'];
                                    $queryList1 = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where fecha <= '$hasta' AND idComprobante = $id GROUP BY cuenta");
                                    while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                      $cuenta = $rowMotorizado1['cuenta'];
                                      $CuentaMaestra = $cuenta[0] . $cuenta[1];
                                      if ($CuentaMaestra == "1." or $CuentaMaestra == "2.") {
                                        $CuentaContable[$rowMotorizado1["cuenta"]] = "Cuenta";
                                      }
                                    }
                                  }

                                  /*
                                  echo "<tr><td>SELECT * FROM  CCompDiario  where fecha <= '$hasta' {$FiltroWhere}  group by cuenta <pre>";
                                  print_r($CuentaContable);
                                  echo "</pre></tr></td>";
                                  */
                                  foreach ($CuentaContable as $key => $value) {

                                    $Pasa = "No";
                                    if ($cuentacontable != "Todas") {
                                      if ($key == $cuentacontable) {
                                        $Pasa = "Si";
                                      } else {
                                        $Pasa = "No";
                                      }
                                    } else {
                                      $Pasa = "Si";
                                    }

                                    if ($Pasa == "Si") {
                                      /*
                                      $queryList=mysqli_query($conn3,"SELECT cuenta, SUM(monto_debe) as total_debe_inicial , SUM(monto_haber) as total_haber_inicial FROM  CCompDiarioMov  where fecha < '$desde' AND cuenta = '$key' {$FiltroWhere} ");
                                      while($rowMotorizado=mysqli_fetch_array($queryList))
                                      {
                                          $total_debe_inicial=$rowMotorizado['total_debe_inicial'];
                                          $total_haber_inicial=$rowMotorizado['total_haber_inicial'];
                                      }
                                      $total_inicial = $total_debe_inicial - $total_haber_inicial;
                                      if($total_inicial==""){$total_inicial=0;}
                                      */


                                      $contador = 0;
                                      $queryList1 = mysqli_query($conn3, "SELECT CDM.* FROM  CCompDiarioMov as CDM INNER JOIN CCompDiario as CD ON CDM.idComprobante = CD.id  AND  (CD.fecha BETWEEN '$desde' and '$hasta' ) AND CDM.cuenta = '$key' {$FiltroWhereEspecial} ORDER BY CDM.id");
                                      $numrow = mysqli_num_rows($queryList1);

                                      if ($numrow > 0) {
                                        echo "<tr><td colspan='8'><b>Cuenta {$key}</b></td></tr>";
                                      }
                                      while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                        $contador++;
                                        $numero = $rowMotorizado1['numero'];
                                        $fecha = $rowMotorizado1['fecha'];

                                        $descripcion = $rowMotorizado1['descripcion'];
                                        $referencia = $rowMotorizado1['referencia'];

                                        $total_debe = $rowMotorizado1['monto_debe'];
                                        if ($total_debe == "") {
                                          $total_debe = 0;
                                        }
                                        $total_haber = $rowMotorizado1['monto_haber'];
                                        if ($total_haber == "") {
                                          $total_haber = 0;
                                        }

                                        $total_final = ($total_debe - $total_haber);
                                        //$total_final = $total_inicial + ($total_debe-$total_haber);
                                        //["Comprobante","Secuencia","Fecha Elaboracion","Descripcion","Detalle","Saldo Inicial","Debito", "Credito", "Saldo Movimiento"];

                                        echo "<tr><td> $numero</td>";
                                        echo "<td> $contador</td>";
                                        echo "<td> $fecha</td>";
                                        echo "<td> $descripcion</td>";
                                        echo "<td> $referencia</td>";
                                        //echo "<td> $total_inicial</td>";
                                        echo "<td> $total_debe</td>";
                                        echo "<td> $total_haber</td>";
                                        echo "<td> $total_final</td></tr>";
                                      }
                                    }
                                  }
                                }

                                //Movimiento Auxiliar De Proveedores Por Cuenta Contable

                                else if ($tipo_reporte == "Movimiento Auxiliar De Proveedores Por Cuenta Contable") {

                                  $proveedor = $_POST['proveedor'];
                                  $cuentacontable = $_POST['cuentacontable'];
                                  if ($proveedor == "Todos") {
                                    $FiltroWhere = "";
                                  } else {
                                    $FiltroWhere = "AND idTercero = '$proveedor'";
                                  }

                                  if ($cuentacontable == "Todos") {
                                    $FiltroWhereEspecial = "";
                                  } else {
                                    $FiltroWhereEspecial = "AND CDM.cuenta = '$cuentacontable'";
                                  }

                                  $queryList = mysqli_query($conn3, "SELECT * FROM  opracioninvheader WHERE estadoOrden = 4 {$FiltroWhere} ");
                                  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                    $id = $rowMotorizado['Comprobante_id'];
                                    $rut = $rowMotorizado['rut'];
                                    $fechavencimiento = $rowMotorizado['fechavencimiento'];

                                    $numero_id = $rowMotorizado['id'];
                                    //echo "<tr><td>entro / SELECT CDM.* FROM  CCompDiarioMov as CDM INNER JOIN CCompDiario as CD ON CDM.idComprobante = CD.id  AND  (CD.fecha BETWEEN '$desde' and '$hasta' ) AND CD.id = '$id' {$FiltroWhereEspecial} ORDER BY CDM.id</td></tr>";
                                    $queryList1 = mysqli_query($conn3, "SELECT CDM.* FROM  CCompDiarioMov as CDM INNER JOIN CCompDiario as CD ON CDM.idComprobante = CD.id  AND  (CD.fecha BETWEEN '$desde' and '$hasta' ) AND CD.id = '$id' {$FiltroWhereEspecial} ORDER BY CDM.id");
                                    $numrow = mysqli_num_rows($queryList1);

                                    if ($numrow > 0) {
                                      echo "<tr><td colspan='9'><b>Compra # {$numero_id}</b></td></tr>";
                                    }
                                    while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                      $contador++;
                                      $numero = $rowMotorizado1['numero'];
                                      $fecha = $rowMotorizado1['fecha'];

                                      $descripcion = $rowMotorizado1['descripcion'];
                                      $referencia = $rowMotorizado1['referencia'];

                                      $total_debe = $rowMotorizado1['monto_debe'];
                                      if ($total_debe == "") {
                                        $total_debe = 0;
                                      }
                                      $total_haber = $rowMotorizado1['monto_haber'];
                                      if ($total_haber == "") {
                                        $total_haber = 0;
                                      }

                                      $total_final = $total_inicial + ($total_debe - $total_haber);
                                      //["Identificacion","Comprobante","Secuencia","Fecha Elaboracion","Descripcion","Vencimiento","Debito", "Credito", "Saldo Movimiento"];

                                      echo "<tr><td> $rut</td>";
                                      echo "<td> $numero</td>";
                                      echo "<td> $contador</td>";
                                      echo "<td> $fecha</td>";
                                      echo "<td> $descripcion</td>";
                                      echo "<td> $fechavencimiento</td>";
                                      echo "<td> $total_debe</td>";
                                      echo "<td> $total_haber</td>";
                                      echo "<td> $total_final</td></tr>";
                                    }
                                  }
                                }

                                //Movimiento Auxiliar Por Cuenta Contable 

                                else if ($tipo_reporte == "Movimiento Auxiliar Por Cuenta Contable") {

                                  $CuentaContable = $_POST['CuentaContable'];
                                  $queryGeneral = mysqli_query($conn3, "SELECT * FROM CCompDiario WHERE tipo_comprobante in ('1','2') AND fecha BETWEEN '$desde' AND '$hasta' ORDER BY tipo_comprobante;");
                                  while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                    //1->factura,2->compras,5->cuentas x cobrar 6-> cuentas por pagar

                                    $tipo_comprobante = $rowGeneral['tipo_comprobante'];
                                    $id = $rowGeneral['id'];
                                    $Fecha = $rowGeneral['fecha'];
                                    $Numero = $rowGeneral["numero"];

                                    switch ($tipo_comprobante) {
                                      case '1':
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv  where Comprobante_id = '$id' ");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                          $idCliente = $rowMotorizado["idCliente"];

                                          $Identificacion = funcionMasterMedical($idCliente, 'cliente_id', 'CODI_CLIENTE', 'cliente');
                                          $Nombre = funcionMasterMedical($idCliente, 'cliente_id', 'nombre_cliente', 'cliente');

                                          $CentroCosto = $rowGeneral1['idCentroCosto'];
                                        }
                                        break;
                                      case '2':
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  opracioninvheader  where Comprobante_id = '$id' ");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                          $idTercero = $rowMotorizado["idTercero"];

                                          $Identificacion = funcionMaster($idTercero, 'id', 'rut', 'sproveedores');
                                          $Nombre = funcionMaster($idTercero, 'id', 'nombre', 'sproveedores');

                                          $CentroCosto = $rowGeneral1['idCentroCosto'];
                                        }
                                        break;
                                    }
                                    $NombreCentroCosto = funcionMaster($CentroCosto, 'id', 'descripcion', 'CcentroCostos');
                                    if ($NombreCentroCosto == "") {
                                      $NombreCentroCosto = "No diligenciado";
                                    }

                                    $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where cuenta LIKE '4%' AND idComprobante  = '$id' ");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                      $Contador++;
                                      $Cuenta = $rowMotorizado["cuenta"];
                                      $NombreCuenta = funcionMaster($rowMotorizado['cuenta'], 'id', 'descripcion', 'CCuentas');
                                      $Descripcion = $rowMotorizado['descripcion'];
                                      $Referencia = $rowMotorizado['referencia'];
                                      $Monto_debe = $rowMotorizado['monto_debe'];
                                      $Monto_haber = $rowMotorizado['monto_haber'];
                                      $Saldo = $Monto_debe - $Monto_haber;

                                      $Acesso = "";
                                      if ($CuentaContable == "Todos") {
                                        $Acesso = "Si";
                                      } else if ($CuentaContable == $Cuenta) {
                                        $Acesso = "Si";
                                      }

                                      if ($Acesso == "Si") {
                                        $Arreglo["$Cuenta"][$Contador]["Cuenta"] = $Cuenta;
                                        $Arreglo["$Cuenta"][$Contador]["NombreCuenta"] = $NombreCuenta;
                                        $Arreglo["$Cuenta"][$Contador]["Numero"] = $Numero;
                                        $Arreglo["$Cuenta"][$Contador]["Fecha"] = $Fecha;
                                        $Arreglo["$Cuenta"][$Contador]["Identificacion"] = $Identificacion;
                                        $Arreglo["$Cuenta"][$Contador]["Nombre"] = $Nombre;
                                        $Arreglo["$Cuenta"][$Contador]["Descripcion"] = $Descripcion;
                                        $Arreglo["$Cuenta"][$Contador]["Referencia"] = $Referencia;
                                        $Arreglo["$Cuenta"][$Contador]["CentroCosto"] = $NombreCentroCosto;
                                        $Arreglo["$Cuenta"][$Contador]["Monto_Debe"] = $Monto_debe;
                                        $Arreglo["$Cuenta"][$Contador]["Monto_Haber"] = $Monto_haber;
                                        $Arreglo["$Cuenta"][$Contador]["Saldo"] = $Saldo;

                                        $ArregloTotal["$Cuenta"]["Debe"] = $ArregloTotal["$Cuenta"]["Debe"] + $Monto_debe;
                                        $ArregloTotal["$Cuenta"]["Haber"] = $ArregloTotal["$Cuenta"]["Haber"] + $Monto_haber;
                                      }

                                      //["Codigo Cuenta","Nombre Cuenta","Comprobante","Fecha","Identificacion","Nombre Tercero","Descripcion", "Detalle","Centro de Costo","Debito","Credito","Saldo"];

                                    }
                                  }

                                  foreach ($Arreglo as $key => $value) {

                                    $Saldo = $ArregloTotal["$key"]["Debe"] - $ArregloTotal["$key"]["Haber"];
                                    echo "<tr style='background-color:#d4f1ff;'><td>" . $key . "</td>";
                                    echo "<td>" . $key . "</td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td>" . $ArregloTotal["$key"]["Debe"] . "</td>";
                                    echo "<td>" . $ArregloTotal["$key"]["Haber"] . "</td>";
                                    echo "<td>" . $Saldo . "</td></tr>";

                                    foreach ($value as $key1 => $value1) {

                                      echo "<tr><td>" . $value1["Cuenta"] . "</td>";
                                      echo "<td>" . $value1["NombreCuenta"] . "</td>";
                                      echo "<td>" . $value1["Numero"] . "</td>";
                                      echo "<td>" . $value1["Fecha"] . "</td>";
                                      echo "<td>" . $value1["Identificacion"] . "</td>";
                                      echo "<td>" . $value1["Nombre"] . "</td>";
                                      echo "<td>" . $value1["Descripcion"] . "</td>";
                                      echo "<td>" . $value1["Referencia"] . "</td>";
                                      echo "<td>" . $value1["CentroCosto"] . "</td>";
                                      echo "<td>" . $value1["Monto_Debe"] . "</td>";
                                      echo "<td>" . $value1["Monto_Haber"] . "</td>";
                                      echo "<td>" . $value1["Saldo"] . "</td></tr>";
                                    }
                                  }
                                } else if ($tipo_reporte == "Auxiliar Cuenta Contable Por Tercero") {

                                  $TipoCliente = $_POST['TipoCliente'];
                                  $Cliente = $_POST['Cliente'];

                                  $queryGeneral = mysqli_query($conn3, "SELECT * FROM CCompDiario WHERE tipo_comprobante in ('1','2') AND fecha BETWEEN '$desde' AND '$hasta' ORDER BY tipo_comprobante;");
                                  while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                    //1->factura,2->compras,5->cuentas x cobrar 6-> cuentas por pagar
                                    $tipo_comprobante = $rowGeneral['tipo_comprobante'];
                                    $id = $rowGeneral['id'];

                                    switch ($tipo_comprobante) {
                                      case '1':
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv  where Comprobante_id = '$id' ");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                          $idPersona = $rowMotorizado["idCliente"];
                                          $Identificacion = funcionMasterMedical($idPersona, 'cliente_id', 'CODI_CLIENTE', 'cliente');
                                          $Nombre = funcionMasterMedical($idPersona, 'cliente_id', 'nombre_cliente', 'cliente');
                                        }
                                        break;
                                      case '2':
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  opracioninvheader  where Comprobante_id = '$id' ");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                          $idPersona = $rowMotorizado["idTercero"];
                                          $Identificacion = funcionMaster($idPersona, 'id', 'rut', 'sproveedores');
                                          $Nombre = funcionMaster($idPersona, 'id', 'nombre', 'sproveedores');
                                        }
                                        break;
                                    }

                                    $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where idComprobante  = '$id' ");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                      $Contador++;
                                      $Cuenta = $rowMotorizado["cuenta"];
                                      $NombreCuenta = funcionMaster($rowMotorizado['cuenta'], 'id', 'descripcion', 'CCuentas');
                                      $Descripcion = $rowMotorizado['descripcion'];
                                      $Referencia = $rowMotorizado['referencia'];
                                      $Monto_debe = $rowMotorizado['monto_debe'];
                                      $Monto_haber = $rowMotorizado['monto_haber'];
                                      $Saldo = $Monto_debe - $Monto_haber;

                                      $Acesso = "";
                                      if ($Cliente == "Todos") {
                                        $Acesso = "Si";
                                      } else if ($TipoCliente == $tipo_comprobante and $Cliente == $idPersona) {
                                        $Acesso = "Si";
                                      }

                                      if ($Acesso == "Si") {
                                        $Arreglo["$idPersona"][$Cuenta]["Cuenta"] = $Cuenta;
                                        $Arreglo["$idPersona"][$Cuenta]["NombreCuenta"] = $NombreCuenta;
                                        $Arreglo["$idPersona"][$Cuenta]["Identificacion"] = $Identificacion;
                                        $Arreglo["$idPersona"][$Cuenta]["Nombre"] = $Nombre;
                                        $Arreglo["$idPersona"][$Cuenta]["Saldo_Inicial"] = funcionMaster($rowMotorizado['cuenta'], 'id', 'saldo_inicial', 'CCuentas');
                                        $Arreglo["$idPersona"][$Cuenta]["Monto_Debe"] = $Arreglo["$idPersona"][$Cuenta]["Monto_Debe"] + $Monto_debe;
                                        $Arreglo["$idPersona"][$Cuenta]["Monto_Haber"] = $Arreglo["$idPersona"][$Cuenta]["Monto_Haber"] + $Monto_haber;
                                        $Arreglo["$idPersona"][$Cuenta]["Saldo"] = $Arreglo["$idPersona"][$Cuenta]["Saldo"] + ($Monto_debe - $Monto_haber);
                                      }

                                      //["Codigo Cuenta", "Nombre Cuenta", "Identificacion", "Nombre Tercero", "Saldo Inicial", "Debito", "Credito", "Nuevo Saldo"];
                                    }
                                  }

                                  foreach ($Arreglo as $key => $value) {

                                    foreach ($value as $key1 => $value1) {

                                      $SaldoFinal = $value1["Saldo_Inicial"] + $value1["Saldo"];
                                      echo "<tr><td> {$value1["Cuenta"]}</td>
                                    <td> {$value1["NombreCuenta"]}</td>
                                    <td> {$value1["Identificacion"]}</td>
                                    <td> {$value1["Nombre"]}</td>
                                    <td> {$value1["Saldo_Inicial"]}</td>
                                    <td> {$value1["Monto_Debe"]}</td>
                                    <td> {$value1["Monto_Haber"]}</td>
                                    <td> {$SaldoFinal}</td></tr>";
                                    }
                                  }
                                } else if ($tipo_reporte == "Recibos De Caja y Pagos") {

                                  $Tipo = $_POST['Tipo'];

                                  switch ($Tipo) {
                                    case 'CxC':
                                      $TipoFiltrado = '5';
                                      break;

                                    case 'CxP':
                                      $TipoFiltrado = '6';
                                      break;
                                  }


                                  $queryGeneral = mysqli_query($conn3, "SELECT * FROM CCompDiario WHERE tipo_comprobante = '$TipoFiltrado' AND fecha BETWEEN '$desde' AND '$hasta' ORDER BY tipo_comprobante;");
                                  while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                    //1->factura,2->compras,5->cuentas x cobrar 6-> cuentas por pagar
                                    $tipo_comprobante = $rowGeneral['tipo_comprobante'];
                                    $id = $rowGeneral['id'];
                                    $numero = $rowGeneral['numero'];

                                    $NombreCentroCosto = funcionMaster($rowGeneral["idCentroCosto"], 'id', 'descripcion', 'CcentroCostos');
                                    if ($NombreCentroCosto == "") {
                                      $NombreCentroCosto = "No diligenciado";
                                    }

                                    switch ($tipo_comprobante) {
                                      case '5':
                                        $queryList1 = mysqli_query($conn3, "SELECT * FROM InformacionCuentasxCobrar  where Comprobante_id_movimientoCuentaXCobrar = '$id' ");
                                        while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                          $tipoPago = $rowMotorizado1["Forma_Pago"];
                                          $idCuentax = $rowMotorizado1["id_sCuentasCobrar"];
                                          $idOperacion = funcionMaster($idCuentax, 'id', 'idDocumento', 'sCuentasCobrar');

                                          $idPersona = funcionMaster($idOperacion, 'idOperacion', 'idCliente', 'sOperacionInv');
                                          $Identificacion = funcionMasterMedical($idPersona, 'cliente_id', 'CODI_CLIENTE', 'cliente');
                                          $Nombre = funcionMasterMedical($idPersona, 'cliente_id', 'nombre_cliente', 'cliente');
                                          $fecha = $rowMotorizado1["fecha"];

                                          $fechaVencimiento = funcionMaster($idOperacion, 'idOperacion', 'fechaVencimiento', 'sOperacionInv');

                                          $Forma_Pago = $rowMotorizado1["Forma_Pago"];
                                          $MontoC = number_format($rowMotorizado1["MontoPagado_Final"] - $rowMotorizado1["MontoPagado_Inicial"], 2, ",", ".");
                                        }
                                        break;
                                      case '6':
                                        $queryList1 = mysqli_query($conn3, "SELECT * FROM InformacionCuentasxPagar  where 	Comprobante_id_movimientoCuentaXPagar = '$id' ");
                                        while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                          $tipoPago = $rowMotorizado1["Forma_Pago"];
                                          $idCuentax = $rowMotorizado1["id_sCuentasPagar"];
                                          $idOperacion = funcionMaster($idCuentax, 'id', 'idDocumento', 'CuentasxPagar');

                                          $idPersona = funcionMaster($idOperacion, 'id', 'idTercero', 'opracioninvheader');
                                          $Identificacion = funcionMaster($idPersona, 'id', 'rut', 'sproveedores');
                                          $Nombre = funcionMaster($idPersona, 'id', 'nombre', 'sproveedores');
                                          $fecha = $rowMotorizado1["fecha"];

                                          $fechaVencimiento = funcionMaster($idOperacion, 'id', 'fechavencimiento', 'opracioninvheader');

                                          $Forma_Pago = $rowMotorizado1["Forma_Pago"];
                                          $MontoC = number_format($rowMotorizado1["MontoPagado_Final"] - $rowMotorizado1["MontoPagado_Inicial"], 2, ",", ".");
                                        }
                                        break;
                                    }


                                    //["Comprobante", "Identificacion", "Nombre Tercero", "Centro De Costo", "Fecha De Creacion", "Fecha De Modificacion", "Fecha De Elaboracion", "Vencimiento","Forma de Pago", "Valor","Valor Anticipos","Observaciones"];

                                    echo "<tr><td> {$numero}</td>
                                    <td> {$idOperacion}</td>
                                    <td> {$Nombre}</td>
                                    <td> {$NombreCentroCosto}</td>
                                    <td> {$fecha}</td>
                                    <td> </td>
                                    <td> {$fecha}</td>
                                    <td> {$fechaVencimiento}</td>
                                    <td> {$Forma_Pago}</td>
                                    <td> {$MontoC}</td>
                                    <td> 0</td>
                                    <td> </td></tr>";
                                  }
                                } else if ($tipo_reporte == "Recibos De Caja Detallado Por Facturas") {

                                  $TipoFiltrado = '5';

                                  $queryGeneral = mysqli_query($conn3, "SELECT * FROM CCompDiario WHERE tipo_comprobante = '$TipoFiltrado' AND fecha BETWEEN '$desde' AND '$hasta' ORDER BY tipo_comprobante;");
                                  while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                    //1->factura,2->compras,5->cuentas x cobrar 6-> cuentas por pagar
                                    $Contador++;
                                    $tipo_comprobante = $rowGeneral['tipo_comprobante'];
                                    $id = $rowGeneral['id'];
                                    $numero = $rowGeneral['numero'];

                                    $NombreCentroCosto = funcionMaster($rowGeneral["idCentroCosto"], 'id', 'descripcion', 'CcentroCostos');
                                    if ($NombreCentroCosto == "") {
                                      $NombreCentroCosto = "No diligenciado";
                                    }

                                    switch ($tipo_comprobante) {
                                      case '5':
                                        $queryList1 = mysqli_query($conn3, "SELECT * FROM InformacionCuentasxCobrar  where Comprobante_id_movimientoCuentaXCobrar = '$id' ");
                                        while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {

                                          $fecha = $rowMotorizado1["fecha"];
                                          $NombreUsuario = funcionMaster($rowMotorizado1['usuario_id'], 'id', 'NOMBRE_USUARIO', 'usuarios');
                                          $idCuentax = $rowMotorizado1["id_sCuentasCobrar"];
                                          $idOperacion = funcionMaster($idCuentax, 'id', 'idDocumento', 'sCuentasCobrar');

                                          $idPersona = funcionMaster($idOperacion, 'idOperacion', 'idCliente', 'sOperacionInv');
                                          $Identificacion = funcionMasterMedical($idPersona, 'cliente_id', 'CODI_CLIENTE', 'cliente');
                                          $Nombre = funcionMasterMedical($idPersona, 'cliente_id', 'nombre_cliente', 'cliente');

                                          $queryList2 = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where idComprobante = $id ");
                                          while ($rowMotorizado2 = mysqli_fetch_array($queryList2)) {
                                            if ($rowMotorizado2['monto_debe'] != "0") {
                                              $cuenta = $rowMotorizado2['cuenta'];
                                            }
                                          }

                                          $fechaVencimiento = funcionMaster($idOperacion, 'idOperacion', 'fechaVencimiento', 'sOperacionInv');

                                          $Forma_Pago = $rowMotorizado1["Forma_Pago"];
                                          $MontoC = number_format($rowMotorizado1["MontoPagado_Final"] - $rowMotorizado1["MontoPagado_Inicial"], 2, ",", ".");
                                        }
                                        break;
                                    }

                                    $ArregloFacturas["$idOperacion"][$Contador]["numero"] = $numero;
                                    $ArregloFacturas["$idOperacion"][$Contador]["fecha"] = $fecha;
                                    $ArregloFacturas["$idOperacion"][$Contador]["NombreUsuario"] = $NombreUsuario;
                                    $ArregloFacturas["$idOperacion"][$Contador]["Identificacion"] = $Identificacion;
                                    $ArregloFacturas["$idOperacion"][$Contador]["Nombre"] = $Nombre;
                                    $ArregloFacturas["$idOperacion"][$Contador]["cuenta"] = $cuenta;
                                    $ArregloFacturas["$idOperacion"][$Contador]["fechaVencimiento"] = $fechaVencimiento;
                                    $ArregloFacturas["$idOperacion"][$Contador]["MontoC"] = $MontoC;
                                    $ArregloFacturas["$idOperacion"][$Contador]["Forma_Pago"] = $Forma_Pago;
                                    //["Comprobante", "Fecha Elaboracion", "Creador", "Identificacion", "Nombre Cliente", "Cuenta Contable", "Vencimiento", "Valor","Forma de Pago"];
                                  }

                                  foreach ($ArregloFacturas as $key => $value) {
                                    echo "<tr><td colspan='9' style='background-color:#d4f1ff;' >Factura #" . funcionMaster($key, 'idOperacion', 'numeroDoc', 'sOperacionInv') . "</td></tr>";
                                    foreach ($value as $key1 => $value1) {
                                      echo "<tr><td> {$value1['numero']}</td>
                                    <td> {$value1['fecha']}</td>
                                    <td> {$value1['NombreUsuario']}</td>
                                    <td> {$value1['Identificacion']}</td>
                                    <td> {$value1['Nombre']}</td>
                                    <td> {$value1['cuenta']}</td>
                                    <td> {$value1['fechaVencimiento']}</td>
                                    <td> {$value1['MontoC']}</td>
                                    <td> {$value1['Forma_Pago']}</td></tr>";
                                    }
                                  }
                                } else if ($tipo_reporte == "Movimiento Auxiliar De Tercero Por Cuenta Contable") {

                                  $TipoCliente = $_POST['TipoCliente'];
                                  $Cliente = $_POST['Cliente'];

                                  /*
                                  //echo $TipoCliente." / ".$Cliente;
                                  if($TipoCliente=="0"){
                                    $FiltroWhere="tipo_comprobante in ('1','2')";
                                  }
                                  else{
                                    $FiltroWhere="tipo_comprobante = '$TipoCliente'";
                                  }
                                  */
                                  //$queryGeneral = mysqli_query($conn3, "SELECT * FROM CCompDiario WHERE {$FiltroWhere} AND fecha BETWEEN '$desde' AND '$hasta' ORDER BY tipo_comprobante;");
                                  $queryGeneral = mysqli_query($conn3, "SELECT * FROM CCompDiario WHERE fecha BETWEEN '$desde' AND '$hasta' ORDER BY tipo_comprobante;");
                                  while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                    //1->factura,2->compras,5->cuentas x cobrar 6-> cuentas por pagar
                                    $Contador++;
                                    $tipo_comprobante = $rowGeneral['tipo_comprobante'];
                                    $id = $rowGeneral['id'];
                                    $numero = $rowGeneral['numero'];

                                    $fecha = $rowGeneral['fecha'];

                                    $NombreCentroCosto = funcionMaster($rowGeneral["idCentroCosto"], 'id', 'descripcion', 'CcentroCostos');
                                    if ($NombreCentroCosto == "") {
                                      $NombreCentroCosto = "No diligenciado";
                                    }

                                    $tercero_id = $rowGeneral['tercero_id'];
                                    $tipo_tercero = $rowGeneral['tipo_tercero'];

                                    switch ($tipo_tercero) {
                                      case '1':

                                        $queryList = mysqli_query($connMedical, "SELECT * FROM cliente where cliente_id = '$tercero_id'");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                          $idPersona = $rowMotorizado["cliente_id"];
                                          $Identificacion = $rowMotorizado["CODI_CLIENTE"];
                                          $Nombre = $rowMotorizado["nombre_cliente"];
                                        }
                                        break;
                                      case '2':
                                        $queryList = mysqli_query($conn3, "SELECT * FROM sproveedores where id = '$tercero_id' ");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                          $idPersona = $rowMotorizado["id"];
                                          $Identificacion = $rowMotorizado["rut"];
                                          $Nombre = $rowMotorizado["nombre"];
                                        }
                                        break;
                                    }

                                    if ($tercero_id != 0) {


                                      $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where idComprobante  = '$id' ");
                                      while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                        $cuenta = $rowMotorizado["cuenta"];
                                        $Acesso = "";
                                        if ($Cliente == "Todos") {
                                          $Acesso = "Si";
                                        } else if ($TipoCliente == $tipo_tercero and $Cliente == $idPersona) {
                                          $Acesso = "Si";
                                        }

                                        //echo "<br> $TipoCliente==$tipo_comprobante AND $Cliente==$idPersona";

                                        if ($Acesso == "Si") {

                                          $ArregloFacturas["$tipo_tercero"]["$idPersona"]["$cuenta"]["debe"] = $ArregloFacturas["$tipo_comprobante"]["$idPersona"]["$cuenta"]["debe"]  + $rowMotorizado["monto_debe"];
                                          $ArregloFacturas["$tipo_tercero"]["$idPersona"]["$cuenta"]["haber"] = $ArregloFacturas["$tipo_comprobante"]["$idPersona"]["$cuenta"]["haber"] + $rowMotorizado["monto_haber"];
                                          $ArregloFacturas["$tipo_tercero"]["$idPersona"]["$cuenta"]["Identificacion"] = $Identificacion;
                                          $ArregloFacturas["$tipo_tercero"]["$idPersona"]["$cuenta"]["Nombre"] = $Nombre;
                                          //$ArregloFacturas["$tipo_comprobante"]["$idPersona"]["$cuenta"]["Fecha"] = $fecha;

                                        }
                                      }
                                    }

                                    // ["Identificacion", "Nombre Tercero", "Codigo Contable", "Cuenta Contable", "Comprobante", "Fecha Elaboracion", "Saldo Inicial", "Debito","Credito","Saldo Movimiento"];
                                  }

                                  foreach ($ArregloFacturas as $key => $value) {
                                    switch ($key) {
                                      case '1':
                                        $TipoClienteMostrar = "Cliente";
                                        break;

                                      case '2':
                                        $TipoClienteMostrar = "Proveedor";
                                        break;
                                    }
                                    echo "<tr><td colspan='10' style='background-color:#d4f1ff;' > $TipoClienteMostrar </td></tr>";
                                    foreach ($value as $key1 => $value1) {

                                      foreach ($value1 as $key2 => $value2) {

                                        $SaldoInicial = funcionMaster($key2, 'id', 'saldo_inicial', 'CCuentas');
                                        $SaldoFinal = $SaldoInicial + ($value2['debe'] - $value2['haber']);
                                        echo "<tr><td> {$value2['Identificacion']}</td>
                                      <td> {$value2['Nombre']}</td>
                                      <td> {$key2}</td>
                                      <td> " . funcionMaster($key2, 'id', 'descripcion', 'CCuentas') . "</td>
                                      <td> </td>
                                      <td> </td>
                                      <td>" . $SaldoInicial . "</td>
                                      <td> {$value2['debe']}</td>
                                      <td> {$value2['haber']}</td>
                                      <td> {$SaldoFinal}</td></tr>";
                                      }
                                    }
                                  }
                                } else if ($tipo_reporte == "Movimiento Auxiliar De Gastos Por Cuenta Contable") {


                                  $queryGeneral = mysqli_query($conn3, "SELECT * FROM CCompDiario WHERE tipo_comprobante in ('3') AND fecha BETWEEN '$desde' AND '$hasta' ORDER BY tipo_comprobante;");
                                  while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
                                    //1->factura,2->compras,5->cuentas x cobrar 6-> cuentas por pagar
                                    $Contador++;
                                    $id = $rowGeneral['id'];

                                    $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where idComprobante  = '$id' ");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                      $cuenta = $rowMotorizado['cuenta'];
                                      $ArregloFacturas["$cuenta"]["debe"] = $ArregloFacturas["$cuenta"]["debe"]  + $rowMotorizado["monto_debe"];
                                      $ArregloFacturas["$cuenta"]["haber"] = $ArregloFacturas["$cuenta"]["haber"] + $rowMotorizado["monto_haber"];
                                    }

                                    // ["Codigo Cuenta", "Nombre Cuenta Contable","Valor"];
                                  }

                                  foreach ($ArregloFacturas as $key => $value) {

                                    $NombreCuenta = funcionMaster($key, 'id', 'descripcion', 'CCuentas');
                                    $SaldoFinal = ($value['debe'] - $value['haber']);
                                    echo "<tr><td> {$key}</td>
                                      <td> {$NombreCuenta}</td>
                                      <td> {$SaldoFinal}</td></tr>";
                                  }
                                } else if ($tipo_reporte == "Libro Diario") {

                                  $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiario  where (fecha BETWEEN '$desde' and '$hasta' ) ");
                                  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                    $id = $rowMotorizado['id'];
                                    $numero = $rowMotorizado['numero'];
                                    $fecha = $rowMotorizado['fecha'];
                                    $tipo_comprobante = $rowMotorizado['tipo_comprobante'];

                                    switch ($tipo_comprobante) {
                                      case '0':
                                        echo "<tr><td colspan='6' style='background-color:#d4f1ff;'><b>Comprobante [Documento] #{$numero}</b></td></tr>";
                                        break;
                                      case '1':
                                        echo "<tr><td colspan='6' style='background-color:#d4f1ff;'><b>Factura #{$numero}</b></td></tr>";
                                        break;
                                      case '2':
                                        echo "<tr><td colspan='6' style='background-color:#d4f1ff;'><b>Pago #{$numero}</b></td></tr>";
                                        break;
                                      case '3':
                                        echo "<tr><td colspan='6' style='background-color:#d4f1ff;'><b> Gastos y Egresos #{$numero}</b></td></tr>";
                                        break;
                                      case '5':
                                        echo "<tr><td colspan='6' style='background-color:#d4f1ff;'><b> Cuentas por Cobrar #{$numero}</b></td></tr>";
                                        break;
                                      case '6':
                                        echo "<tr><td colspan='6' style='background-color:#d4f1ff;'><b> Cuentas por Pagar #{$numero}</b></td></tr>";
                                        break;
                                    }


                                    $queryList1 = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where  idComprobante = '$id' order by id ASC");
                                    while ($rowComprobanteMov = mysqli_fetch_array($queryList1)) {

                                      $codigocuenta = $rowComprobanteMov['cuenta'];
                                      $cuentaNombre = funcionMaster($rowComprobanteMov['cuenta'], 'id', 'descripcion', 'CCuentas');
                                      $descripcion = $rowComprobanteMov['descripcion'];

                                      $monto_debe = $rowComprobanteMov['monto_debe'];
                                      $monto_haber = $rowComprobanteMov['monto_haber'];

                                      //["Comprobante", "Fecha Elaboracion", "Codigo Contable", "Nombre Contable", "Debito", "Credito"];
                                      echo "<tr>
                                                    <td>$numero</td>
                                                    <td>$fecha</td>
                                                    <td>$codigocuenta</td>
                                                    <td>$cuentaNombre</td>
                                                    <td>$monto_debe</td>
                                                    <td>$monto_haber</td>
                                                    </tr>";
                                    }
                                  }
                                } else if ($tipo_reporte == "Libro Mayor y Balance") {

                                  $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiario  where (fecha BETWEEN '$desde' and '$hasta' ) ");
                                  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                    $id = $rowMotorizado['id'];
                                    $numero = $rowMotorizado['numero'];
                                    $fecha = $rowMotorizado['fecha'];

                                    $queryList1 = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where  idComprobante = '$id' order by id ASC");
                                    while ($rowComprobanteMov = mysqli_fetch_array($queryList1)) {
                                      $Contador++;
                                      $cuenta = $rowComprobanteMov['cuenta'];

                                      $ArregloComprobantes["$cuenta"]["$Contador"]["Fecha"] = $rowComprobanteMov["fecha"];
                                      $ArregloComprobantes["$cuenta"]["$Contador"]["Comprobante"] = $rowComprobanteMov["numero"];
                                      $ArregloComprobantes["$cuenta"]["$Contador"]["Descripcion"] = $rowComprobanteMov["descripcion"];
                                      $ArregloComprobantes["$cuenta"]["$Contador"]["Debe"] = $rowComprobanteMov["monto_debe"];
                                      $ArregloComprobantes["$cuenta"]["$Contador"]["Haber"] = $rowComprobanteMov["monto_haber"];
                                    }
                                  }

                                  foreach ($ArregloComprobantes as $key => $value) {

                                    echo "<tr><td colspan='6' style='background-color:#d4f1ff;' > $key </td></tr>";

                                    $queryList = mysqli_query($conn3, "SELECT cuenta, SUM(monto_debe) as total_debe_inicial , SUM(monto_haber) as total_haber_inicial FROM  CCompDiarioMov  where fecha < '$desde' AND cuenta = '$key'");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                      $total_debe_inicial = $rowMotorizado['total_debe_inicial'];
                                      $total_haber_inicial = $rowMotorizado['total_haber_inicial'];
                                    }

                                    $SaldoInicialFechaAnterior = $total_debe_inicial - $total_haber_inicial;
                                    echo "<tr style='background-color:#d4ffe3;'  ><td>$key</td><td></td><td>Saldo Anterior</td> <td>$total_debe_inicial</td><td>$total_haber_inicial</td><td>$SaldoInicialFechaAnterior</td></tr>";

                                    foreach ($value as $key1 => $value1) {
                                      //["Cuenta", "Comprobante", "Descripcion", "Debitos", "Creditos", "Saldo"];

                                      $SaldoFinal = $SaldoInicialFechaAnterior + ($value1['Debe'] - $value1['Haber']);
                                      $total_debe_inicial = $total_debe_inicial + $value1['Debe'];
                                      $total_haber_inicial = $total_haber_inicial + $value1['Haber'];
                                      echo "<tr>
                                                  <td>{$key}</td>
                                                  <td>{$value1['Comprobante']}</td>
                                                  <td>{$value1['Descripcion']}</td>
                                                  <td>{$value1['Debe']}</td>
                                                  <td>{$value1['Haber']}</td>
                                                  <td>{$SaldoFinal}</td>
                                                  </tr>";
                                      $SaldoInicialFechaAnterior = $SaldoFinal;
                                    }

                                    echo "<tr style='background-color:#eeffd4;'  ><td>$key</td><td></td><td>Saldo Final Hasta la Fecha </td> <td>$total_debe_inicial</td><td>$total_haber_inicial</td><td>$SaldoInicialFechaAnterior</td></tr>";
                                  }
                                } else if ($tipo_reporte == "Comprobante Por Tipo De Impuesto") {

                                  $TipoComprobante = $_POST['TipoComprobante'];

                                  if ($TipoComprobante == "0") {
                                    $FiltroWhere = "tipo_comprobante in ('1','2')";
                                  } else {
                                    $FiltroWhere = "tipo_comprobante = '$TipoComprobante'";
                                  }

                                  $queryGeneral = mysqli_query($conn3, "SELECT * FROM  CCompDiario  where (fecha BETWEEN '$desde' and '$hasta' )  AND  {$FiltroWhere}  ");
                                  while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {

                                    $Contador++;
                                    $tipo_comprobante = $rowGeneral['tipo_comprobante'];
                                    $id = $rowGeneral['id'];
                                    $numero = $rowGeneral['numero'];

                                    $fecha = $rowGeneral['fecha'];

                                    $NombreCentroCosto = funcionMaster($rowGeneral["idCentroCosto"], 'id', 'descripcion', 'CcentroCostos');
                                    if ($NombreCentroCosto == "") {
                                      $NombreCentroCosto = "No diligenciado";
                                    }
                                    $ArregloIvaValor = [];
                                    switch ($tipo_comprobante) {
                                      case '1':
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv  where Comprobante_id = '$id' ");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                          $TipoTransaccion = "Factura de Venta";
                                          $idPersona = $rowMotorizado["idCliente"];
                                          $Identificacion = funcionMasterMedical($idPersona, 'cliente_id', 'CODI_CLIENTE', 'cliente');
                                          $Nombre = funcionMasterMedical($idPersona, 'cliente_id', 'nombre_cliente', 'cliente');
                                          $ValorBruto = $rowMotorizado['totalNeto'];
                                          $ValorFinal = $rowMotorizado['totalBruto'];
                                          $idOperacion = $rowMotorizado['idOperacion'];

                                          $queryList1 = mysqli_query($conn3, "SELECT * FROM  sDetalleOper  where idOperacion = '$idOperacion' ");
                                          while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                            $ArregloIvaValor["$rowMotorizado1[ivaPorcentaje]"] = $ArregloIvaValor["$rowMotorizado1[ivaPorcentaje]"] + $rowMotorizado1["impuesto_monto"];
                                          }
                                        }
                                        break;
                                      case '2':
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  opracioninvheader  where Comprobante_id = '$id' ");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                          $TipoTransaccion = "Factura de Compra";
                                          $idPersona = $rowMotorizado["idTercero"];
                                          $Identificacion = funcionMaster($idPersona, 'id', 'rut', 'sproveedores');
                                          $Nombre = funcionMaster($idPersona, 'id', 'nombre', 'sproveedores');
                                          $ValorBruto = $rowMotorizado['totalCosto'];
                                          $ValorFinal = $rowMotorizado['totalPrecio'];
                                          $idOperacion = $rowMotorizado['id'];

                                          $queryList1 = mysqli_query($conn3, "SELECT * FROM  operacioninv  where nOperaheader = '$idOperacion' ");
                                          while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                            $TotalCosto = ($rowMotorizado1["costo"] * $rowMotorizado1["cantidad"]);
                                            $ArregloIvaValor["$rowMotorizado1[iva]"] = $ArregloIvaValor["$rowMotorizado1[iva]"] + round($TotalCosto * ($rowMotorizado1['iva'] / 100), 2);
                                          }
                                        }
                                        break;
                                    }

                                    //Comprobante Por Tipo De Impuesto
                                    //ArregloIva -> ["Tipo Transaccion", "Comprobante", "Fecha", "Identificacion", "Nombre Tercero", "Centro Costo","Valor Bruto","Descuento",ArregloIva , "Valor Neto"];
                                    $Impuesto = "0";
                                    echo "<tr>
                                              <td>{$TipoTransaccion}</td>
                                              <td>{$numero}</td>
                                              <td>{$fecha}</td>
                                              <td>{$Identificacion}</td>
                                              <td>{$Nombre}</td>
                                              <td>{$NombreCentroCosto}</td>
                                              <td>{$ValorBruto}</td>
                                              <td>0</td>";
                                    foreach ($ArregloIva as $key => $value) {
                                      if ($ArregloIvaValor[$key] != "") {
                                        echo "<td>" . $ArregloIvaValor[$key] . "</td>";
                                      } else {
                                        echo "<td>0</td>";
                                      }
                                    }
                                    echo "<td>$ValorFinal</td>";
                                    echo "</tr>";
                                  }
                                } else if ($tipo_reporte == "Informe Impuesto Detallado") {

                                  $TipoComprobante = $_POST['TipoComprobante'];

                                  if ($TipoComprobante == "0") {
                                    $FiltroWhere = "tipo_comprobante in ('1','2')";
                                  } else {
                                    $FiltroWhere = "tipo_comprobante = '$TipoComprobante'";
                                  }

                                  $queryGeneral = mysqli_query($conn3, "SELECT * FROM  CCompDiario  where (fecha BETWEEN '$desde' and '$hasta' )  AND  {$FiltroWhere}  ");
                                  while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {

                                    $Contador++;
                                    $tipo_comprobante = $rowGeneral['tipo_comprobante'];
                                    $id = $rowGeneral['id'];

                                    $numero = $rowGeneral['numero']; //
                                    $fecha = $rowGeneral['fecha']; //

                                    $NombreCentroCosto = funcionMaster($rowGeneral["idCentroCosto"], 'id', 'descripcion', 'CcentroCostos');
                                    if ($NombreCentroCosto == "") {
                                      $NombreCentroCosto = "No diligenciado";
                                    }

                                    $ArregloIvaValor = [];
                                    switch ($tipo_comprobante) {
                                      case '1':
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv  where Comprobante_id = '$id' ");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                          $TipoTransaccion = "Factura de Venta";
                                          $idPersona = $rowMotorizado["idCliente"];
                                          $Identificacion = funcionMasterMedical($idPersona, 'cliente_id', 'CODI_CLIENTE', 'cliente'); //
                                          $Nombre = funcionMasterMedical($idPersona, 'cliente_id', 'nombre_cliente', 'cliente'); //
                                          $ValorBruto = $rowMotorizado['totalNeto']; //

                                          $idOperacion = $rowMotorizado['idOperacion'];

                                          $queryList1 = mysqli_query($conn3, "SELECT * FROM  sDetalleOper  where idOperacion = '$idOperacion' ");
                                          while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                            $ArregloIvaValor["$rowMotorizado1[ivaPorcentaje]"] = $ArregloIvaValor["$rowMotorizado1[ivaPorcentaje]"] + $rowMotorizado1["impuesto_monto"];
                                          }
                                        }
                                        break;
                                      case '2':
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  opracioninvheader  where Comprobante_id = '$id' ");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                          $TipoTransaccion = "Factura de Compra";
                                          $idPersona = $rowMotorizado["idTercero"];
                                          $Identificacion = funcionMaster($idPersona, 'id', 'rut', 'sproveedores'); //
                                          $Nombre = funcionMaster($idPersona, 'id', 'nombre', 'sproveedores'); //
                                          $ValorBruto = $rowMotorizado['totalCosto']; //

                                          $idOperacion = $rowMotorizado['id'];

                                          $queryList1 = mysqli_query($conn3, "SELECT * FROM  operacioninv  where nOperaheader = '$idOperacion' ");
                                          while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                            $TotalCosto = ($rowMotorizado1["costo"] * $rowMotorizado1["cantidad"]);
                                            $ArregloIvaValor["$rowMotorizado1[iva]"] = $ArregloIvaValor["$rowMotorizado1[iva]"] + round($TotalCosto * ($rowMotorizado1['iva'] / 100), 2);
                                          }
                                        }
                                        break;
                                    }
                                    $Contador++;
                                    foreach ($ArregloIvaValor as $key => $value) {
                                      if ($tipo_comprobante == "1") {
                                        $ArregloImpuestoxFactura["$key"]["$Contador"]["Base Ventas"] = $ValorBruto;
                                        $ArregloImpuestoxFactura["$key"]["$Contador"]["Impuesto Ventas"] = $ArregloIvaValor[$key];
                                        $ArregloImpuestoxFactura["$key"]["$Contador"]["Base Compras"] = 0;
                                        $ArregloImpuestoxFactura["$key"]["$Contador"]["Impuesto Compras"] = 0;
                                        $ArregloImpuestoxFactura["$key"]["$Contador"]["Comprobante"] = $numero;
                                        $ArregloImpuestoxFactura["$key"]["$Contador"]["Identificacion"] = $Identificacion;
                                        $ArregloImpuestoxFactura["$key"]["$Contador"]["Nombre"] = $Nombre;
                                        $ArregloImpuestoxFactura["$key"]["$Contador"]["Fecha"] = $fecha;
                                      } elseif ($tipo_comprobante == "2") {
                                        $ArregloImpuestoxFactura["$key"]["$Contador"]["Base Ventas"] = 0;
                                        $ArregloImpuestoxFactura["$key"]["$Contador"]["Impuesto Ventas"] = 0;
                                        $ArregloImpuestoxFactura["$key"]["$Contador"]["Base Compras"] = $ValorBruto;
                                        $ArregloImpuestoxFactura["$key"]["$Contador"]["Impuesto Compras"] = $ArregloIvaValor[$key];
                                        $ArregloImpuestoxFactura["$key"]["$Contador"]["Comprobante"] = $numero;
                                        $ArregloImpuestoxFactura["$key"]["$Contador"]["Identificacion"] = $Identificacion;
                                        $ArregloImpuestoxFactura["$key"]["$Contador"]["Nombre"] = $Nombre;
                                        $ArregloImpuestoxFactura["$key"]["$Contador"]["Fecha"] = $fecha;
                                      }
                                    }

                                    //["Comprobante", "Identificacion", "Nombre Tercero", "Fecha Elaboracion", "Base Ventas", "Valor Impuesto Ventas","Base Compras","Valor Impuesto Compras","Base Devolucion Ventas","Valor Impuesto Devolucion Ventas","Base Devolucion Compras","Valor Impuesto Devolucion Compras"];
                                  }

                                  foreach ($ArregloImpuestoxFactura as $key => $value) {
                                    echo "<tr><td colspan='12' style='background-color:#d4f1ff;' >Impuesto {$key}</td></tr>";

                                    foreach ($value as $key1 => $value1) {
                                      echo "<tr><td>{$value1['Comprobante']}</td>
                                        <td>{$value1['Identificacion']}</td>
                                        <td>{$value1['Nombre']}</td>
                                        <td>{$value1['Fecha']}</td>
                                        <td>{$value1['Base Ventas']}</td>
                                        <td>{$value1['Impuesto Ventas']}</td>
                                        <td>{$value1['Base Compras']}</td>
                                        <td>{$value1['Impuesto Compras']}</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td></tr>";
                                    }
                                  }
                                }


                                //$Cabezera["Cuentas Por Pagar Detallada Por Proveedor"] = ["Identificacion", "Nombre del Proveedor", "Deuda A Pagar", "Valor Anticipos", "Saldo Proveedor", "Valor Vencido","Valor Por Vencer","Dias En Mora"];

                                else if ($tipo_reporte == "Cuentas Por Pagar Detallada Por Proveedor") {

                                  $proveedor = $_POST['proveedor'];


                                  $queryGeneral = mysqli_query($conn3, "SELECT * FROM  CuentasxPagar  where (fechaRegistro BETWEEN '$desde' and '$hasta' )  ");
                                  while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {

                                    $Contador++;
                                    $idDocumento = $rowGeneral['idDocumento'];
                                    $montoBase = $rowGeneral['montoBase'];
                                    $montoPagado = $rowGeneral['montoPagado'];
                                    $montoPendiente = $rowGeneral['montoPendiente'];
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  opracioninvheader  where id = '$idDocumento' ");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                      $idPersona = $rowMotorizado["idTercero"];
                                      $Identificacion = funcionMaster($idPersona, 'id', 'rut', 'sproveedores'); //
                                      $Nombre = funcionMaster($idPersona, 'id', 'nombre', 'sproveedores'); //
                                      $fechavencimiento = $rowMotorizado["fechavencimiento"];
                                    }
                                    $Saldo = $montoPagado - $montoBase;

                                    $fechaActual = date('Y-m-d');
                                    $datetime1 = date_create($fechavencimiento);
                                    $datetime2 = date_create($fechaActual);
                                    $contador = date_diff($datetime1, $datetime2);
                                    $differenceFormat = '%a';
                                    $dias = $contador->format($differenceFormat);

                                    if ($fechavencimiento < date("Y-m-d")) {
                                      $ValorVencido = $montoPendiente * -1;
                                      $ValorPorVencer = 0;

                                      $DiasMora = $dias;
                                      $DiasVencer = 0;
                                    } else {
                                      $ValorVencido = 0;
                                      $ValorPorVencer = $rowDeuda["montoPendiente"] * -1;

                                      $DiasMora = 0;
                                      $DiasVencer = $dias;
                                    }

                                    $Acesso = "";
                                    if ($proveedor == "Todos") {
                                      $Acesso = "Si";
                                    } else if ($proveedor == $idPersona) {
                                      $Acesso = "Si";
                                    }

                                    if ($Acesso == "Si") {
                                      $ArregloProveedor["$Identificacion"]["Nombre"] = $Nombre;
                                      $ArregloProveedor["$Identificacion"]["montoBase"] = $ArregloProveedor["$Identificacion"]["montoBase"] + $montoBase;
                                      $ArregloProveedor["$Identificacion"]["montoPagado"] = $ArregloProveedor["$Identificacion"]["montoPagado"] + $montoPagado;
                                      $ArregloProveedor["$Identificacion"]["Saldo"] = $ArregloProveedor["$Identificacion"]["Saldo"] + $Saldo;
                                      $ArregloProveedor["$Identificacion"]["ValorVencido"] = $ArregloProveedor["$Identificacion"]["ValorVencido"] + $ValorVencido;
                                      $ArregloProveedor["$Identificacion"]["DiasVencer"] = $ArregloProveedor["$Identificacion"]["DiasVencer"] + $DiasVencer;
                                      $ArregloProveedor["$Identificacion"]["DiasMora"] = $ArregloProveedor["$Identificacion"]["DiasMora"] + $DiasMora;
                                    }


                                    //["Identificacion", "Nombre del Proveedor", "Deuda A Pagar", "Valor Anticipos", "Saldo Proveedor", "Valor Vencido","Valor Por Vencer"];
                                  }

                                  foreach ($ArregloProveedor as $key => $value) {
                                    $SaldoFinal = $value['Saldo'] * -1;
                                    echo "<tr><td>{$key}</td>
                                      <td>{$value['Nombre']}</td>
                                      <td>{$value['montoBase']}</td>
                                      <td>{$value['montoPagado']}</td>
                                      <td>{$SaldoFinal}</td>
                                      <td>{$value['ValorVencido']}</td>
                                      <td>{$value['DiasVencer']}</td>
                                      <td>{$value['DiasMora']}</td></tr>";
                                  }
                                } else if ($tipo_reporte == "Cuentas Por Pagar Por Centro De Costo") {

                                  $centrocosto = $_POST['centrocosto'];

                                  $queryGeneral = mysqli_query($conn3, "SELECT * FROM  CuentasxPagar  where (fechaRegistro BETWEEN '$desde' and '$hasta' )  ");
                                  while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {

                                    $id = $rowGeneral['id'];
                                    $montoBase = $rowGeneral['montoBase'];
                                    $idDocumento = $rowGeneral['idDocumento'];

                                    $queryList = mysqli_query($conn3, "SELECT * FROM  opracioninvheader  where id = '$idDocumento' ");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                      $TipoTransaccion = "Factura de Compra";
                                      $idPersona = $rowMotorizado["idTercero"];
                                      $Identificacion = funcionMaster($idPersona, 'id', 'rut', 'sproveedores'); //CuentasxPagar
                                      $Nombre = funcionMaster($idPersona, 'id', 'nombre', 'sproveedores');
                                      $fechavencimiento = $rowMotorizado["fechavencimiento"];
                                    }
                                    $Contador1 = 0;
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  InformacionCuentasxPagar  where id_sCuentasPagar = '$id' ORDER BY id ASC");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                      $Contador1++;
                                      if ($Contador1 == 1) {
                                        $MontoDeudaAlFacturar = $montoBase - $rowMotorizado["MontoPagado_Inicial"];
                                      }
                                      $Comprobante_id_movimientoCuentaXPagar = $rowMotorizado["Comprobante_id_movimientoCuentaXPagar"];
                                      $Comprobante = funcionMaster($Comprobante_id_movimientoCuentaXPagar, 'id', 'numero', 'CCompDiario'); //CuentasxPagar
                                      $idCentroCosto = funcionMaster($Comprobante_id_movimientoCuentaXPagar, 'id', 'idCentroCosto', 'CCompDiario');
                                      //["Detalle", "No. Cuotas", "Identificacion", "Nombre Proveedor", "Deuda A Pagar", "Valor Anticipo","Saldo Proveedor","Valor Vencido","Valor Por Vencer"];
                                      $ValorAnticipo = $rowMotorizado["MontoPagado_Final"] - $rowMotorizado["MontoPagado_Inicial"];

                                      $fechaCuentaXpagar_inpuro = explode(" ", $rowMotorizado["fecha"]);

                                      $datetime1 = date_create($fechavencimiento);
                                      $datetime2 = date_create($fechaCuentaXpagar_inpuro[0]);
                                      $contador = date_diff($datetime1, $datetime2);
                                      $differenceFormat = '%a';
                                      $dias = $contador->format($differenceFormat);


                                      $Acesso = "";
                                      if ($centrocosto == "Todos") {
                                        $Acesso = "Si";
                                      } else if ($centrocosto == $idCentroCosto) {
                                        $Acesso = "Si";
                                      }

                                      if ($Acesso == "Si") {

                                        $ArregloCXP["$idCentroCosto"]["$Comprobante"]["Identificacion"] = $Identificacion;
                                        $ArregloCXP["$idCentroCosto"]["$Comprobante"]["Nombre"] = $Nombre;
                                        $ArregloCXP["$idCentroCosto"]["$Comprobante"]["Deuda"] = $MontoDeudaAlFacturar;
                                        $ArregloCXP["$idCentroCosto"]["$Comprobante"]["ValorAnticipo"] = $ValorAnticipo;
                                        $ArregloCXP["$idCentroCosto"]["$Comprobante"]["Saldo"] = $MontoDeudaAlFacturar - $ValorAnticipo;


                                        if ($fechavencimiento < date($fechaCuentaXpagar_inpuro[0])) {
                                          $ArregloCXP["$idCentroCosto"]["$Comprobante"]["ValorVencido"] = $ValorAnticipo;
                                          $ArregloCXP["$idCentroCosto"]["$Comprobante"]["ValorVencer"] = 0;
                                        } else {
                                          $ArregloCXP["$idCentroCosto"]["$Comprobante"]["ValorVencido"] = 0;
                                          $ArregloCXP["$idCentroCosto"]["$Comprobante"]["ValorVencer"] = $ValorAnticipo;
                                        }

                                        $ArregloCXP["$idCentroCosto"]["$Comprobante"]["Informacion"] = " Factura C # {$idDocumento}";
                                      }
                                    }
                                  }

                                  /*
                              echo "<pre>";
                              print_r($ArregloCXP);
                              echo "</pre>";
                              */

                                  //["Detalle", "No. Cuotas", "Identificacion", "Nombre Proveedor", "Deuda A Pagar", "Valor Anticipo","Saldo Proveedor","Valor Vencido","Valor Por Vencer"];

                                  foreach ($ArregloCXP as $key => $value) {
                                    $NombreCentroCosto = funcionMaster($key, 'id', 'descripcion', 'CcentroCostos');
                                    if ($NombreCentroCosto == "") {
                                      $NombreCentroCosto = "Ninguno";
                                    }
                                    echo "<tr><td colspan='12' style='background-color:#d4f1ff;'> Centro de Costo <b>{$NombreCentroCosto}</b></td></tr>";
                                    foreach ($value as $key1 => $value1) {
                                      echo "<tr><td>{$key1} {$value1['Informacion']}</td>
                                        <td>1</td>
                                        <td>{$value1['Identificacion']}</td>
                                        <td>{$value1['Nombre']}</td>
                                        <td>{$value1['Deuda']}</td>
                                        <td>{$value1['ValorAnticipo']}</td>
                                        <td>{$value1['Saldo']}</td>
                                        <td>{$value1['ValorVencido']}</td>
                                        <td>{$value1['ValorVencer']}</td></tr>";
                                    }
                                  }
                                } else if ($tipo_reporte == "Compras Por Producto Por Proveedor") {

                                  $proveedor = $_POST['proveedor'];

                                  $queryGeneral = mysqli_query($conn3, "SELECT * FROM  opracioninvheader  where (fechaReg BETWEEN '$desde' and '$hasta' ) AND estadoOrden = 4  ");
                                  while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {

                                    $id = $rowGeneral['id'];
                                    $idTercero = $rowGeneral['idTercero'];

                                    $Identificacion = funcionMaster($idTercero, 'id', 'rut', 'sproveedores'); //CuentasxPagar
                                    $Nombre = funcionMaster($idTercero, 'id', 'nombre', 'sproveedores');


                                    $queryList1 = mysqli_query($conn3, "SELECT * FROM  operacioninv  where nOperaheader = '$id' ");
                                    while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {

                                      $idProducto = $rowMotorizado1['codigoProd'];
                                      $totalBruto = $rowMotorizado1["costo"] * $rowMotorizado1["cantidad"];
                                      $total = $rowMotorizado1["total_producto"];
                                      $impuesto = $rowMotorizado1["total_producto"] - $totalBruto;

                                      $Acesso = "";
                                      if ($proveedor == "Todos") {
                                        $Acesso = "Si";
                                      } else if ($proveedor == $idTercero) {
                                        $Acesso = "Si";
                                      }

                                      if ($Acesso == "Si") {
                                        $ArregloProductoProveedor["$idTercero"]["$id"]["$idProducto"]["Codigo"] = funcionMaster($idProducto, 'ID', 'referencia', 'sinvetrios');
                                        $ArregloProductoProveedor["$idTercero"]["$id"]["$idProducto"]["Nombre"] = $rowMotorizado1["descripcion"];
                                        $ArregloProductoProveedor["$idTercero"]["$id"]["$idProducto"]["Grupo"] = funcionMaster(funcionMaster($idProducto, 'ID', 'tipo', 'sinvetrios'), 'id', 'descripcion', 'scategoria'); //scategoria
                                        $ArregloProductoProveedor["$idTercero"]["$id"]["$idProducto"]["Identificacion"] = $Identificacion;
                                        $ArregloProductoProveedor["$idTercero"]["$id"]["$idProducto"]["Nombre Proveedor"] = $Nombre;
                                        $ArregloProductoProveedor["$idTercero"]["$id"]["$idProducto"]["Cantidad"] = $rowMotorizado1["cantidad"];
                                        $ArregloProductoProveedor["$idTercero"]["$id"]["$idProducto"]["Valor Unitario"] = $rowMotorizado1["costo"];
                                        $ArregloProductoProveedor["$idTercero"]["$id"]["$idProducto"]["Valor Bruto"] = $totalBruto;
                                        $ArregloProductoProveedor["$idTercero"]["$id"]["$idProducto"]["Subtotal"] = $totalBruto;
                                        $ArregloProductoProveedor["$idTercero"]["$id"]["$idProducto"]["Impuesto Cargo"] = $impuesto;
                                        $ArregloProductoProveedor["$idTercero"]["$id"]["$idProducto"]["Total"] = $total;
                                      }
                                    }
                                  }

                                  // ["Codigo Producto", "Nombre Producto", "Grupo Inventario", "Identificacion", "Nombre Proveedor", "Factura Proveedor","Cantidad","Valor Unitario","Valor Bruto","Descuento","Subtotal","Impuesto Cargo","Impuesto Retencion","Total"];

                                  foreach ($ArregloProductoProveedor as $key => $value) {
                                    $NombreCentroCosto = funcionMaster($key, 'id', 'nombre', 'sproveedores');
                                    echo "<tr><td colspan='14' style='background-color:#d4f1ff;'> Proveedor <b>{$NombreCentroCosto}</b></td></tr>";
                                    foreach ($value as $key1 => $value1) {
                                      foreach ($value1 as $key2 => $value2) {
                                        echo "<tr><td>{$value2['Codigo']}</td>
                                        <td>{$value2['Nombre']}</td>
                                        <td>{$value2['Grupo']}</td>
                                        <td>{$value2['Identificacion']}</td>
                                        <td>{$value2['Nombre Proveedor']}</td>
                                        <td># {$key1}</td>
                                        <td>{$value2['Cantidad']}</td>
                                        <td>{$value2['Valor Unitario']}</td>
                                        <td>{$value2['Valor Bruto']}</td>
                                        <td>0</td>
                                        <td>{$value2['Subtotal']}</td>
                                        <td>{$value2['Impuesto Cargo']}</td>
                                        <td>0</td>
                                        <td>{$value2['Total']}</td></tr>";
                                      }
                                    }
                                  }
                                } else if ($tipo_reporte == "Auxiliar Cuenta Contable") {

                                  $CuentaContable = $_POST['CuentaContable'];

                                  $conn4 = $conn3;
                                  mysqli_set_charset($conn4, "utf8");

                                  $queryGeneral = mysqli_query($conn4, "SELECT * FROM  CCuentas ");
                                  while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {

                                    $id = $rowGeneral['id'];
                                    $idTercero = $rowGeneral['idTercero'];
                                    $NombreCuenta = $rowGeneral['descripcion'];
                                    $Saldo_Inicial = $rowGeneral['saldo_inicial'];

                                    $queryList1 = mysqli_query($conn3, "SELECT sum(monto_debe) as Sum_monto_debe, sum(monto_haber) as Sum_monto_haber FROM  CCompDiarioMov  where  cuenta = '$id' AND  (fecha BETWEEN '$desde' and '$hasta' ) ");
                                    while ($rowComprobanteMov = mysqli_fetch_array($queryList1)) {

                                      $Acesso = "";
                                      if ($CuentaContable == "Todos") {
                                        $Acesso = "Si";
                                      } else if ($CuentaContable == $id) {
                                        $Acesso = "Si";
                                      }

                                      if ($Acesso == "Si") {
                                        $ArregloCuenta["$id"]["Codigo"] = $id;
                                        $ArregloCuenta["$id"]["Nombre"] = $NombreCuenta;
                                        $ArregloCuenta["$id"]["SaldoInicial"] = $Saldo_Inicial;
                                        $ArregloCuenta["$id"]["Debito"] = $rowComprobanteMov['Sum_monto_debe'] == "" ? 0 : round($rowComprobanteMov['Sum_monto_debe'], 2);
                                        $ArregloCuenta["$id"]["Credito"] = $rowComprobanteMov['Sum_monto_haber'] == "" ? 0 : round($rowComprobanteMov['Sum_monto_haber'], 2);
                                      }
                                    }
                                  }

                                  // ["Codigo Cuenta Contable", "Cuenta Contable", "Saldo Inicial", "Debito", "Credito", "Nuevo Saldo"]

                                  foreach ($ArregloCuenta as $key => $value) {
                                    $SaldoFinal = $value['SaldoInicial'] + ($value['Debito'] - $value['Credito']);
                                    echo "<tr><td>{$value['Codigo']}</td>
                                      <td>{$value['Nombre']}</td>
                                      <td>{$value['SaldoInicial']}</td>
                                      <td>{$value['Debito']}</td>
                                      <td>{$value['Credito']}</td>
                                      <td>{$SaldoFinal}</td></tr>";
                                  }
                                } else if ($tipo_reporte == "Auxiliar Cuenta Contable Por Centro De Costo") {

                                  $CuentaContable = $_POST['CuentaContable'];
                                  $centrocosto = $_POST['centrocosto'];

                                  $conn4 = $conn3;
                                  mysqli_set_charset($conn4, "utf8");

                                  $queryGeneral = mysqli_query($conn4, "SELECT * FROM  CCuentas ");
                                  while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {

                                    $id = $rowGeneral['id'];
                                    $idTercero = $rowGeneral['idTercero'];
                                    $NombreCuenta = $rowGeneral['descripcion'];
                                    $Saldo_Inicial = $rowGeneral['saldo_inicial'];

                                    $queryList1 = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where  cuenta = '$id' AND  (fecha BETWEEN '$desde' and '$hasta' ) ");
                                    while ($rowComprobanteMov = mysqli_fetch_array($queryList1)) {

                                      $monto_debe = $rowComprobanteMov['monto_debe'] == "" ? 0 : round($rowComprobanteMov['monto_debe'], 2);
                                      $monto_haber = $rowComprobanteMov['monto_haber'] == "" ? 0 : round($rowComprobanteMov['monto_haber'], 2);
                                      $idComprobante = $rowComprobanteMov['idComprobante'];
                                      $idCentroCosto = funcionMaster($idComprobante, 'id', 'idCentroCosto', 'CCompDiario');
                                      $Acesso = "";
                                      if ($CuentaContable == "Todos") {
                                        $Acesso = "Si";
                                      } else if ($CuentaContable == $id) {
                                        $Acesso = "Si";
                                      }

                                      if ($Acesso == "Si") {
                                        $ArregloCuenta["$idCentroCosto"]["$id"]["Codigo"] = $id;
                                        $ArregloCuenta["$idCentroCosto"]["$id"]["Nombre"] = $NombreCuenta;
                                        $ArregloCuenta["$idCentroCosto"]["$id"]["SaldoInicial"] = $Saldo_Inicial;
                                        $ArregloCuenta["$idCentroCosto"]["$id"]["Debito"] = $ArregloCuenta["$idCentroCosto"]["$id"]["Debito"] + $monto_debe;
                                        $ArregloCuenta["$idCentroCosto"]["$id"]["Credito"] = $ArregloCuenta["$idCentroCosto"]["$id"]["Credito"] + $monto_haber;
                                      }
                                    }
                                  }

                                  // ["Codigo Cuenta Contable", "Cuenta Contable", "Codigo Centro Costo","Nombre Centro Costo","Saldo Inicial", "Debito", "Credito", "Nuevo Saldo"];

                                  foreach ($ArregloCuenta as $key => $value) {

                                    $Acesso = "";
                                    if ($centrocosto == "Todos") {
                                      $Acesso = "Si";
                                    } else if ($centrocosto == $key) {
                                      $Acesso = "Si";
                                    }

                                    if ($Acesso == "Si") {
                                      $Centrocosto = funcionMaster($key, 'id', 'descripcion', 'CcentroCostos');
                                      $Centrocosto = ($key == "0") ? "Sin Centro de Costo" : $Centrocosto;
                                      echo "<tr><td colspan='14' style='background-color:#d4f1ff;'> Centro De Costo <b>" . $Centrocosto . "</b></td></tr>";
                                      foreach ($value as $key1 => $value1) {
                                        $SaldoFinal = $value1['SaldoInicial'] + ($value1['Debito'] - $value1['Credito']);
                                        echo "<tr><td>{$value1['Codigo']}</td>
                                      <td>{$value1['Nombre']}</td>
                                      <td>{$key}</td>
                                      <td>" . funcionMaster($key, 'id', 'descripcion', 'CcentroCostos') . "</td>
                                      <td>{$value1['SaldoInicial']}</td>
                                      <td>{$value1['Debito']}</td>
                                      <td>{$value1['Credito']}</td>
                                      <td>{$SaldoFinal}</td></tr>";
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
    var titulo_tabla = "<?php echo $tipo_reporte; ?>"; //titulo de la tabla para las impresiones
    var titulo_tabla1 = '<div style="text-align: left;font-size: 20px;"><strong>IPS LIFE-PRO SAS<br>NIT: 901.560.765-6<br>Dirección: Av Calle 116 No. 9-72 Consult. 301<br>Teléfono: 601-702-9124</strong></div><br><div style="text-align: center;"><?php echo $tipo_reporte; ?> </div><div style="text-align: center; font-size: 20px;">FI: <?php echo $desde; ?> - FF: <?php echo $hasta; ?> </div>';
    var titulo_tabla2 = 'IPS LIFE-PRO SAS\nNIT: 901.560.765-6\nDirección: Av Calle 116 No. 9-72 Consult. 301\nTeléfono: 601-702-9124\n\n<?php echo $tipo_reporte; ?>\nFI: <?php echo $desde; ?> - FF: <?php echo $hasta; ?>';

    function DescargarExcel() {

      $("#1example").table2excel({
        exclude: ".excludeThisClass",
        name: "Reporte <?= $tipo_reporte; ?>",
        filename: "Reporte <?= $tipo_reporte; ?>.xls", // do include extension
        preserveColors: false // set to true if you want background colors and font colors preserved
      });
    }

    $('#1example').DataTable({
      // idioma
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      },
      // botones
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": [{
        extend: 'copy',
        text: 'Copiar'
      }, {
        extend: 'csv',
        text: 'CSV',
        title: titulo_tabla
      }, {
        extend: 'excel',
        text: 'Excel',
        title: titulo_tabla
      }, {
        extend: 'pdf',
        text: 'PDF',
        title: titulo_tabla2
      }, {
        extend: 'print',
        text: 'Imprimir',
        title: titulo_tabla1
      }, {
        extend: 'colvis',
        text: 'Orden de Columnas'
      }],
      // estilo
      "aaSorting": [],
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "responsivePriority": 1,
      "targets": 0,
    }).buttons().container().appendTo('#1example_wrapper .col-md-6:eq(0)');
  </script>