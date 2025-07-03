<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
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
<div class="app-inner-layout__wrapper">
  <div class="app-inner-layout__content">
    <div class="tab-content">
      <div class="container-fluid">
        <div class="mb-3 card">
          <div class="card-header-tab card-header">
            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
              Reportes Sistema
            </div>
          </div>

          <div class="no-gutters row">
            <div class="col-md-12">
              <!-- Content Wrapper. Contains page content -->
              <div class="content-wrapper">
                <!-- Main content -->
                <section class="content" style="width: 100vw;">
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
                          <div class=" mt-3" style="width: 90%!important;">
                            <table id="1example15" class="table table-bordered table-striped" style="display: block;width: 95%;overflow: scroll;">
                              <thead>
                                <tr>
                                  <?php
                                  //Movimiento Facturas De Venta y Compra
                                  $Cabezera["Movimiento Facturas De Venta y Compra"] = ["Tipo Transaccion", "Numero Comprobante", "Consecutivo", "Factura Proveedor", "Identificacion", "Nombre Tercero", "Centro de Costo", "Fecha Creacion", "Fecha Modificacion", 
                                  "Fecha Elaboracion", "Nombre Contacto", "Correo Electronico", "Tipo Registro", "Tipo Clasificacion", "Codigo", "Nombre", "Referencia Fabrica", "Bodega", "Identificacion Vendedor", "Nombre Vendedor", "Cantidad", "Valor Unitario","Valor Descuento", 
                                  "Base AIU", "Impuesto Cargo", "Valor Impuesto Cargo", "Impuesto Cargo 2", "Valor Impuesto Cargo 2", "Impuesto Retencion", "Valor Impuesto Retencion", "Base retencion ICA/IVA","Cargo En Totales","Total","Moneda","Tasda de Cambio","Forma Pago","Fecha Vencimiento","Observaciones"];

                                  foreach ($Cabezera[$tipo_reporte] as $key => $value) {
                                    echo "<th>{$value}</th>";
                                  }
                                  ?>
                                </tr>
                              </thead>
                              <tbody>
                                <?php

                                if ($tipo_reporte == "Movimiento Facturas De Venta y Compra") {
                                
                                  $Tipo = $_POST['Tipo'];
                                 
                                  switch ($Tipo) {
                                      case '1':
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv  where fechaOperacion BETWEEN '$desde' AND '$hasta' ");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                          $idOperacion = $rowMotorizado['idOperacion'];
                                          $idPersona = $rowMotorizado["idCliente"];
                                          $Identificacion = funcionMaster($idPersona, 'cliente_id', 'CODI_CLIENTE', 'cliente');
                                          $Nombre = funcionMaster($idPersona, 'cliente_id', 'nombre_cliente', 'cliente');
                                          $Correo = funcionMaster($idPersona, 'cliente_id', 'correo_cliente', 'cliente');

                                          $numeroDoc = $rowMotorizado["id"];
                                          $NombreCentroCosto = funcionMaster($rowMotorizado['idCentroCosto'], 'id', 'descripcion', 'CcentroCostos');
                                          if ($NombreCentroCosto == "") {
                                            $NombreCentroCosto = "No diligenciado";
                                          }
                                          $Comprobante = funcionMaster($rowMotorizado['Comprobante_id'], 'id', 'numero', 'CCompDiario');
                                          $fechaOperacion = $rowMotorizado["fechaOperacion"];
                                          $TipoRegistro="Producto";
                                          $TipoClasificacion="Producto";


                                          $tipoPago = $rowMotorizado["tipoPago"];
                                          $fechaVencimiento = $rowMotorizado["fechaVencimiento"];
                                          $Observaciones = $rowMotorizado["nota"];


                                          $queryList1 = mysqli_query($conn3, "SELECT * FROM  sDetalleOper  where idOperacion = '$idOperacion'");
                                          while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                            $idProducto = $rowMotorizado1['idProducto'];
                                            $Codigo = funcionMaster($idProducto,'ID','referencia','sinvetrios');
                                            $descripcion = $rowMotorizado1['descripcion'];
                                            $referenciaFabrica="";
                                            $Bodega="";
                                            $IdentificacionVendedor="";
                                            $NombreVendedor="";

                                            $cantidad = $rowMotorizado1['cantidad'];
                                            $valorunitario = number_format($rowMotorizado1['base'],2,",",".");
                                            $valordescuento=0;
                                            $baseaiu="0";
                                            $ImpuestoCargo = $rowMotorizado1['ivaPorcentaje'];
                                            $ValorImpuesto = number_format($rowMotorizado1['impuesto_monto'],2,",",".");

                                            $CargoEnTotales = number_format($rowMotorizado1['impuesto_monto'],2,",",".");
                                            $Total = number_format($rowMotorizado1['subTotal'],2,",",".");

                                            $Moneda="COP";
                                            $TasaCambio="0.00";

                                             //["Tipo Transaccion", "Numero Comprobante", "Consecutivo", "Factura Proveedor", "Identificacion", "Nombre Tercero", "Centro de Costo", "Fecha Creacion", "Fecha Modificacion", 
                                  //"Fecha Elaboracion", "Nombre Contacto", "Correo Electronico", "Tipo Registro", "Tipo Clasificacion", "Codigo", "Nombre", "Referencia Fabrica", "Bodega", "Identificacion Vendedor", "Nombre Vendedor", "Cantidad", "Valor Unitario","Valor Descuento", 
                                  //"Base AIU", "Impuesto Cargo", "Valor Impuesto Cargo", "Impuesto Cargo 2", "Valor Impuesto Cargo 2", "Impuesto Retencion", "Valor Impuesto Retencion", "Base retencion ICA/IVA","Cargo En Totales","Total","Moneda","Tasda de Cambio","Forma Pago","Fecha Vencimiento","Observaciones"];
                                    

                                            echo "<tr><td>Factura Venta</td>
                                                    <td> {$Comprobante}</td>
                                                    <td> </td>
                                                    <td> {$numeroDoc}</td>
                                                    <td> {$Identificacion}</td>
                                                    <td> {$Nombre}</td>
                                                    <td> {$NombreCentroCosto}</td>
                                                    <td> {$fechaOperacion}</td>
                                                    <td> {$fechaOperacion}</td>
                                                    <td> {$fechaOperacion}</td>
                                                    <td> {$Nombre}</td>
                                                    <td> {$Correo}</td>
                                                    <td> {$TipoRegistro}</td>
                                                    <td> {$TipoClasificacion}</td>
                                                    <td> {$Codigo}</td>
                                                    <td> {$descripcion}</td>
                                                    <td> {$referenciaFabrica}</td>
                                                    <td> {$Bodega}</td>
                                                    <td> {$IdentificacionVendedor}</td>
                                                    <td> {$NombreVendedor}</td>
                                                    <td> {$cantidad}</td>
                                                    <td> {$valorunitario}</td>
                                                    <td> {$valordescuento}</td>
                                                    <td> {$baseaiu}</td>
                                                    <td> {$ImpuestoCargo}</td>
                                                    <td> {$ValorImpuesto}</td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> {$CargoEnTotales}</td>
                                                    <td> {$Total}</td>
                                                    <td> {$Moneda}</td>
                                                    <td> {$TasaCambio}</td>
                                                    <td> {$tipoPago}</td>
                                                    <td> {$fechaVencimiento}</td>
                                                    <td> {$Observaciones}</td>
                                                    </tr>";


                                          }


                                        }
                                        break;
                                      case '2':
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  opracioninvheader  where Comprobante_id = '$id' ");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                          $idPersona = $rowMotorizado["idTercero"];
                                          $Identificacion = funcionMaster($idPersona, 'id', 'rut', 'sproveedores');
                                          $Nombre = funcionMaster($idPersona, 'id', 'nombre', 'sproveedores');
                                        }




                                        $queryList = mysqli_query($conn3, "SELECT * FROM  opracioninvheader  where fechaReg BETWEEN '$desde' AND '$hasta' ");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                          $idOperacion = $rowMotorizado['id'];
                                          $idPersona = $rowMotorizado["idTercero"];
                                          $Identificacion = $rowMotorizado["rut"];
                                          $Nombre = $rowMotorizado["nombre"];
                                          $Correo = funcionMaster($idPersona, 'id', 'correo', 'sproveedores');

                                          $numeroDoc = $rowMotorizado["id"];
                                          $NombreCentroCosto = funcionMaster($rowGeneral['idCentroCosto'], 'id', 'descripcion', 'CcentroCostos');
                                          $fechaOperacion = $rowMotorizado["fechaReg"];
                                          $TipoRegistro="Producto";
                                          $TipoClasificacion="Producto";


                                          $tipoPago = $rowMotorizado["tipoPago"];
                                          $fechaVencimiento = $rowMotorizado["fechavencimiento"];
                                          $Observaciones = $rowMotorizado["notas"];


                                          $queryList1 = mysqli_query($conn3, "SELECT * FROM  operacioninv  where nOperaheader = '$idOperacion'");
                                          while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                            $idProducto = $rowMotorizado1['codigoProd'];
                                            $Codigo = funcionMaster($idProducto,'ID','referencia','sinvetrios');
                                            $descripcion = funcionMaster($idProducto,'ID','descripcion','sinvetrios');
                                            $referenciaFabrica="";
                                            $Bodega="";
                                            $IdentificacionVendedor="";
                                            $NombreVendedor="";

                                            $cantidad = $rowMotorizado1['cantidad'];
                                            $valorunitario = number_format($rowMotorizado1['costo'],2,",",".");
                                            $valordescuento=0;
                                            $baseaiu="0";
                                            $ImpuestoCargo = $rowMotorizado1['iva'];

                                            $totalsinimpuesto = ($rowMotorizado1['costo'] * $cantidad);

                                            $ValorImpuesto = number_format($totalsinimpuesto * ($ImpuestoCargo / 100),2,",",".");

                                            $CargoEnTotales = $ValorImpuesto;
                                            $Total = number_format($rowMotorizado1['total_producto'],2,",",".");
 
                                            $Moneda="COP";
                                            $TasaCambio="0.00";

                                             //["Tipo Transaccion", "Numero Comprobante", "Consecutivo", "Factura Proveedor", "Identificacion", "Nombre Tercero", "Centro de Costo", "Fecha Creacion", "Fecha Modificacion", 
                                  //"Fecha Elaboracion", "Nombre Contacto", "Correo Electronico", "Tipo Registro", "Tipo Clasificacion", "Codigo", "Nombre", "Referencia Fabrica", "Bodega", "Identificacion Vendedor", "Nombre Vendedor", "Cantidad", "Valor Unitario","Valor Descuento", 
                                  //"Base AIU", "Impuesto Cargo", "Valor Impuesto Cargo", "Impuesto Cargo 2", "Valor Impuesto Cargo 2", "Impuesto Retencion", "Valor Impuesto Retencion", "Base retencion ICA/IVA","Cargo En Totales","Total","Moneda","Tasda de Cambio","Forma Pago","Fecha Vencimiento","Observaciones"];
                                    

                                            echo "<tr><td>Factura Venta</td>
                                                    <td> </td>
                                                    <td> {$numeroDoc}</td>
                                                    <td> </td>
                                                    <td> {$Identificacion}</td>
                                                    <td> {$Nombre}</td>
                                                    <td> {$NombreCentroCosto}</td>
                                                    <td> {$fechaOperacion}</td>
                                                    <td> {$fechaOperacion}</td>
                                                    <td> {$fechaOperacion}</td>
                                                    <td> {$Nombre}</td>
                                                    <td> {$Correo}</td>
                                                    <td> {$TipoRegistro}</td>
                                                    <td> {$TipoClasificacion}</td>
                                                    <td> {$Codigo}</td>
                                                    <td> {$descripcion}</td>
                                                    <td> {$referenciaFabrica}</td>
                                                    <td> {$Bodega}</td>
                                                    <td> {$IdentificacionVendedor}</td>
                                                    <td> {$NombreVendedor}</td>
                                                    <td> {$cantidad}</td>
                                                    <td> {$valorunitario}</td>
                                                    <td> {$valordescuento}</td>
                                                    <td> {$baseaiu}</td>
                                                    <td> {$ImpuestoCargo}</td>
                                                    <td> {$ValorImpuesto}</td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> {$CargoEnTotales}</td>
                                                    <td> {$Total}</td>
                                                    <td> {$Moneda}</td>
                                                    <td> {$TasaCambio}</td>
                                                    <td> {$tipoPago}</td>
                                                    <td> {$fechaVencimiento}</td>
                                                    <td> {$Observaciones}</td>
                                                    </tr>";


                                          }


                                        }


                                        break;
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
                </section>
                <!-- /.content -->
              </div>
              <!-- /.content-wrapper -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include 'footer.php';
  ?>
  <script src="plugins/ExcelAjax/jquery.table2excel.min.js"></script>

  <script>
    function DescargarExcel() {

      $("#1example15").table2excel({
        exclude: ".excludeThisClass",
        name: "Reporte <?= $tipo_reporte; ?>",
        filename: "Reporte <?= $tipo_reporte; ?>.xls", // do include extension
        preserveColors: false // set to true if you want background colors and font colors preserved
      });

    }
  </script>