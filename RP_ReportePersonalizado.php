<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php';

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
.col-xs-3
{
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
                    <div class="">
                      <!-- /.box-header -->
                      <div class="box-body">
                        <div class="col-md-12">
                          <h2 align="center"><?php echo $tipo_reporte ?> [<?= $desde; ?> - <?= $hasta; ?>]</h2>
                          <div class="table table-responsive">
                            <table id="Tabla_Inteligente" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <?php
                                  //Reporte de Balance Prueba
                                  $Cabezera["Balance Prueba"] = ["Codigo cuenta contable", "Nombre cuenta contable", "Saldo inicial", "Movimiento debito", "Movimiento credito", "Saldo final"];

                                  //Compras Por Proveedor
                                  $Cabezera["Compras Por Proveedor"] = ["Identificacion", "Nombre Proveedor", "Numero Comprobantes", "Valor Bruto", "Descuento", "Subtotal", "Impuesto Cargo", "Impuesto Retencion", "Total"];

                                  //Cartera General Detallada Por Cliente
                                  $Cabezera["Cartera General Detallada Por Cliente"] = ["Identificacion", "Nombre Cliente", "Deuda por cobrar", "Valor Anticipos", "Saldo Cartera", "Valor Vencido", "Valor por Vencer", "Dias en mora / Por vencer"];

                                  //Ventas Por Cliente
                                  $Cabezera["Ventas Por Cliente"] = ["Identificacion", "Nombre Cliente", "Número de comprobantes", "Valor bruto", "Descuentos por item", "Subtotal", "Impuesto cargo", "Impuesto retención", "Cargo en totales", "Descuento en totales", "Total"];

                                  //Consecutivo De Comprobantes
                                  $Cabezera["Consecutivo De Comprobantes"] = ["Tipo Transaccion", "Comprobante", "Valor", "Debito", "Credito", "Moneda", "Fecha de elaboracion", "Fecha de creacion", "Creado por"];

                                  //Libro Oficial De Compras
                                  $Cabezera["Libro Oficial De Compras"] = ["Comprobante", "Fecha elaboracion", "Identificacion", "Nombre tercero", "Factura proveedor", "Base gravada", "Base exenta", "Iva", "Total"];

                                  //Ventas por Producto
                                  $Cabezera["Ventas por Producto"] = ["Codigo producto", "Nombre producto", "Referencia fabrica", "Grupo inventario", "Cantidad vendida", "Valor bruto", "Descuento", "Subtotal", "Impuesto cargo", "Impuesto retencion", "Total"];

                                  //Movimiento Nota Debito y Credito [Venta y Compras]
                                  $Cabezera["Movimiento Nota Debito y Credito [Venta y Compras]"] = ["Tipo", "Numero Comprobante", "Consecutivo", "Factura Proveedor", "Comprobante Relacionado", "Identificacion", "Nombre Tercero", "Centro Costo", "Movimiento debito", "Movimiento credito", "Saldo final"];

                                  //Ventas Por Centro De Costo
                                  $Cabezera["Ventas Por Centro De Costo"] = ["Codigo Centro de Costo", "Centro de Costo", "Numero de Comprobantes", "Valor Bruto", "Descuento", "Subtotal", "Impuesto Cargo", "Impuesto Retencion", "Cargo en Totales", "Descuento en Totales", "Total"];

                                  //Libro Oficial de Ventas
                                  $Cabezera["Libro Oficial de Ventas"] = ["Comprobante", "Fecha Elaboracion", "Identificacion", "Base Gravada", "Base Exenta", "Iva", "Impoconsumo", "Ad-Valorem", "Cargo en Totales", "Descuento en Totales", "Total"];

                                  //Libro Oficial de Ventas
                                  $Cabezera["Movimiento De Recibos De Caja Pagos"] = ["Comprobante", "Identificacion", "Nombre del Tercero", "Centro de Costo", "Fecha Creacion", "Fecha Elaboracion", "Vencimiento", "Forma de Pago", "Valor"];

                                  foreach ($Cabezera[$tipo_reporte] as $key => $value) {
                                    echo "<th data-orderable='false' >{$value}</th>";
                                  }
                                  ?>
                                </tr>
                              </thead>
                            </table>
                          </div>

                        </div>


  

                        <!-- /.col -->
                      </div>





                      </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>


  <script>
    //version 2 tabla dinamica <table id="Tabla_Inteligente">   
    var data_table = []; //datos que recibe la tabla
    var titulo_tabla = "<?php echo $tipo_reporte; ?>"; //titulo de la tabla para las impresiones
    var titulo_tabla1 = '<div style="text-align: left;font-size: 20px;"><strong>IPS LIFE-PRO SAS<br>NIT: 901.560.765-6<br>Dirección: Av Calle 116 No. 9-72 Consult. 301<br>Teléfono: 601-702-9124</strong></div><br><div style="text-align: left;font-size: 20px;">Fecha Inicial: <?php echo $desde; ?><br> Fecha Final: <?php echo $hasta; ?> </div><br><div style="text-align: center;"><?php echo $tipo_reporte; ?> </div>';
    var titulo_tabla2 = 'IPS LIFE-PRO SAS\nNIT: 901.560.765-6\nDirección: Av Calle 116 No. 9-72 Consult. 301\nTeléfono: 601-702-9124\n\nFecha Inicial: <?php echo $desde; ?>\nFecha Final: <?php echo $hasta; ?>\n\n<?php echo $tipo_reporte; ?>';

    if (titulo_tabla == "Balance Prueba") {
      <?php
      if ($tipo_reporte == "Balance Prueba") {
        //$CuentaContable = $_POST["CuentaContable"];

        $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where fecha <= '$hasta'  group by cuenta");
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
          $CuentaContable[] = $rowMotorizado["cuenta"];
        }

        foreach ($CuentaContable as $key => $value) {

          $queryList = mysqli_query($conn3, "SELECT cuenta, SUM(monto_debe) as total_debe_inicial , SUM(monto_haber) as total_haber_inicial FROM  CCompDiarioMov  where fecha < '$desde' AND cuenta = '$value'");
          while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $total_debe_inicial = $rowMotorizado['total_debe_inicial'];
            $total_haber_inicial = $rowMotorizado['total_haber_inicial'];
          }
          $total_inicial = $total_debe_inicial - $total_haber_inicial;
          if ($total_inicial == "") {
            $total_inicial = 0;
          }

          $queryList = mysqli_query($conn3, "SELECT SUM(monto_debe) as total_debe , SUM(monto_haber) as total_haber FROM  CCompDiarioMov  where (fecha BETWEEN '$desde' and '$hasta' ) AND cuenta = '$value'");
          while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $total_debe = $rowMotorizado['total_debe'];
            if ($total_debe == "") {
              $total_debe = 0;
            }
            $total_haber = $rowMotorizado['total_haber'];
            if ($total_haber == "") {
              $total_haber = 0;
            }
          }

          mysqli_set_charset($conn3, "utf8");
          $queryList = mysqli_query($conn3, "SELECT descripcion FROM  CCuentas  where  id = '$value'");
          $rowMotorizado = mysqli_fetch_array($queryList);

          $cuentaNombre = $rowMotorizado["descripcion"];
          //$cuentaNombre=RemCom(funcionMaster($value,'id','descripcion','CCuentas'));

          $total_final = $total_inicial + ($total_debe - $total_haber);
      ?>
          //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
          data_table.push([
            "<?php echo $value; ?>",
            "<?php echo $cuentaNombre; ?>",
            "<?php echo $total_inicial; ?>",
            "<?php echo $total_debe; ?>",
            "<?php echo $total_haber; ?>",
            "<?php echo $total_final; ?>"
          ]);
      <?php
        }
      }
      ?>

    } else if (titulo_tabla == "Compras Por Proveedor") {
      <?php
      if ($tipo_reporte == "Compras Por Proveedor") {
        $Proveedor = $_POST["Proveedor"];

        //echo "SELECT id,rut,nombre,count(id) as contador_registros, sum(totalCosto) as TotalidadCosto FROM  opracioninvheader_bk  where  (fechaReg BETWEEN '$desde' and '$hasta' ) AND idTercero = '$Proveedor' ";

        $queryGeneral = mysqli_query($conn3, "SELECT id,rut,nombre,count(id) as contador_registros, sum(totalCosto) as TotalidadCosto FROM  opracioninvheader  where  (fechaReg BETWEEN '$desde' and '$hasta' ) AND idTercero = '$Proveedor' AND estadoOrden = 4 ");
        while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
          if ($rowGeneral['id'] != null) {
            $id = $rowGeneral['id'];
            $rut = $rowGeneral['rut'];
            $nombre = $rowGeneral['nombre'];
            $contador_registros = $rowGeneral['contador_registros'];
            $TotalidadCosto = $rowGeneral['TotalidadCosto'];
            $descuento = 0;
            $subtotal = $TotalidadCosto - $descuento;
            $impuestocargo = 0;
            $impuestoretencion = 0;
            $total = $subtotal;


      ?>
            //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
            data_table.push([
              "<?php echo $rut; ?>",
              "<?php echo $nombre; ?>",
              "<?php echo $contador_registros; ?>",
              "<?php echo $TotalidadCosto; ?>",
              "<?php echo $descuento; ?>",
              "<?php echo $subtotal; ?>",
              "<?php echo $impuestocargo; ?>",
              "<?php echo $impuestoretencion; ?>",
              "<?php echo $total; ?>"
            ]);
      <?php
          }
        }
      }
      ?>

    } else if (titulo_tabla == "Cartera General Detallada Por Cliente") {
      <?php
      if ($tipo_reporte == "Cartera General Detallada Por Cliente") {
        $Cliente = $_POST["Cliente"];

        if ($Cliente != "Todos") {
          $FiltroWhere = "where idCliente = '$Cliente' AND tipo = 1";
        } else {
          $FiltroWhere = "where tipo = 1";
        }

        $arregloDeuda_save = [];
        $arregloDeuda = [];
        $queryGeneral = mysqli_query($conn3, "SELECT * FROM  sOperacionInv {$FiltroWhere} group by idCliente");
        while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {

          $Cliente_id = $rowGeneral['idCliente'];

          $cedula = funcionMasterMedical($Cliente_id, 'cliente_id', 'CODI_CLIENTE', 'cliente');
          $nombre_cliente = funcionMasterMedical($Cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');


          $deuda = 0;
          $anticipo = 0;
          $saldocartera = 0;
          $valorvencido = 0;
          $valorvencer = 0;
          $diasmora = 0;
          $diasvencer = 0;



          $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv  where idCliente = '$Cliente_id' AND  tipo = 1 ");
          while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $idOperacion = $rowMotorizado['idOperacion'];

            if ($rowMotorizado["totalBruto"] != $rowMotorizado["montoPagado"]) {

              $queryList1 = mysqli_query($conn3, "SELECT * FROM  sCuentasCobrar  where idDocumento = '$idOperacion' ");
              while ($rowDeuda = mysqli_fetch_array($queryList1)) {
                $arregloDeuda["$idOperacion"]["deuda"] = $rowDeuda["montoPendiente"] * -1;
                $arregloDeuda["$idOperacion"]["valor anticipo"] = $rowDeuda["montoPagado"] * -1;

                $fechaActual = date('Y-m-d');
                $datetime1 = date_create($rowMotorizado["fechaVencimiento"]);
                $datetime2 = date_create($fechaActual);
                $contador = date_diff($datetime1, $datetime2);
                $differenceFormat = '%a';
                $dias = $contador->format($differenceFormat);

                if ($rowMotorizado["fechaVencimiento"] < date("Y-m-d")) {
                  $arregloDeuda["$idOperacion"]["valor vencido"] = $rowDeuda["montoPendiente"] * -1;
                  $arregloDeuda["$idOperacion"]["valor por vencer"] = 0;

                  $arregloDeuda["$idOperacion"]["dias mora"] = $dias;
                  $arregloDeuda["$idOperacion"]["dias por vencer"] = 0;
                } else {
                  $arregloDeuda["$idOperacion"]["valor vencido"] = 0;
                  $arregloDeuda["$idOperacion"]["valor por vencer"] = $rowDeuda["montoPendiente"] * -1;

                  $arregloDeuda["$idOperacion"]["dias mora"] = 0;
                  $arregloDeuda["$idOperacion"]["dias por vencer"] = $dias;
                }
              }
            }

            $arregloDeuda["$idOperacion"]["fecha vencimiento"] = $rowMotorizado["fechaVencimiento"];
          }

          foreach ($arregloDeuda as $key => $value) {
            $deuda = $deuda + $value["deuda"];

            $anticipo = $anticipo - ($value["valor anticipo"] * -1);
            $saldocartera = $deuda + $anticipo;
            $valorvencido = $valorvencido + $value["valor vencido"];
            $valorvencer = $valorvencer + $value["valor por vencer"];
            $diasmora = $diasmora + $value["dias mora"];
            $diasvencer = $diasvencer + $value["dias por vencer"];

            $operaciones = $operaciones . " " . $idOperacion;
          }

          $arregloDeuda_save = array_merge($arregloDeuda_save, $arregloDeuda);
          $arregloDeuda = [];

          //["Identificacion","Nombre Cliente","Deuda por cobrar","Valor Anticipos","Saldo Cartera","Valor Vencido","Valor por Vencer", "Dias en mora / Por vencer"];
      ?>
          //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
          data_table.push([
            "<?php echo $cedula; ?>",
            "<?php echo $nombre_cliente; ?>",
            "<?php echo $deuda; ?>",
            "<?php echo $anticipo; ?>",
            "<?php echo $saldocartera; ?>",
            "<?php echo $valorvencido; ?>",
            "<?php echo $valorvencer; ?>",
            "<?php echo round($diasmora / $diasvencer, 2); ?>"
          ]);
      <?php

        }
      }

      ?>

    } else if (titulo_tabla == "Ventas Por Cliente") {
      <?php
      if ($tipo_reporte == "Ventas Por Cliente") {
        $Cliente = $_POST["Cliente"];

        if ($Cliente != "Todos") {
          $FiltroWhere = "where idCliente = '$Cliente' AND fechaOperacion BETWEEN '$desde' and '$hasta' AND  tipo = 1";
        } else {
          $FiltroWhere = "where fechaOperacion BETWEEN '$desde' and '$hasta' AND  tipo = 1 ";
        }


        $queryGeneral = mysqli_query($conn3, "SELECT * FROM  sOperacionInv {$FiltroWhere} group by idCliente");
        while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {

          $Cliente_id = $rowGeneral['idCliente'];

          $cedula = funcionMasterMedical($Cliente_id, 'cliente_id', 'CODI_CLIENTE', 'cliente');
          $nombre_cliente = funcionMasterMedical($Cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');


          $totalNeto = 0;
          $descuentos = 0;
          $subtotal = 0;
          $impuesto = 0;
          $impuestoretencion = 0;
          $cargosTotales = 0;
          $descuentosTotales = 0;
          $total = 0;

          $contador = 0;
          $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv  where idCliente = '$Cliente_id' AND tipo = 1 ");
          while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $contador++;
            $totalNeto += $rowMotorizado['totalNeto'];
            $descuentos += 0;
            $subtotal += $rowMotorizado['totalNeto'];
            $impuesto += $rowMotorizado['impuestoMonto'];
            $impuestoretencion = 0;
            $cargosTotales += $rowMotorizado['impuestoMonto'];
            $descuentosTotales += 0;
            $total += $rowMotorizado['totalBruto'];
          }

          //["Identificacion","Nombre Cliente","Número de comprobantes","Valor bruto","Descuentos por item","Subtotal","Impuesto cargo", "Impuesto retención","Cargo en totales","Descuento en totales","Total"];
      ?>
          //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
          data_table.push([
            "<?php echo $cedula; ?>",
            "<?php echo $nombre_cliente; ?>",
            "<?php echo $contador; ?>",
            "<?php echo $totalNeto; ?>",
            "<?php echo $descuentos; ?>",
            "<?php echo $subtotal; ?>",
            "<?php echo $impuesto; ?>",
            "<?php echo $impuestoretencion; ?>",
            "<?php echo $cargosTotales; ?>",
            "<?php echo $descuentosTotales; ?>",
            "<?php echo $total; ?>"
          ]);
      <?php

        }
      }

      ?>
    } else if (titulo_tabla == "Consecutivo De Comprobantes") {
      <?php
      if ($tipo_reporte == "Consecutivo De Comprobantes") {

        foreach ($_POST["Comprobante"] as $key => $value) {
          $Secuencia = 0;
          $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiario  where (fecha BETWEEN '$desde' and '$hasta' ) AND tipo_comprobante = '$value' ");
          while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $id = $rowMotorizado['id'];
            $numero = $rowMotorizado['numero'];

            switch ($value) {
              case '0':
                $TipoTransaccion =  "Comprobante [Documento]";
                break;
              case '1':
                $TipoTransaccion =  "Factura";
                break;
              case '2':
                $TipoTransaccion =  "Compras";
                break;
              case '3':
                $TipoTransaccion =  "Gastos y Egresos";
                break;
              case '4':
                $TipoTransaccion =  "Devoluciones";
                break;
            }


            $numero = $rowMotorizado['numero'];
            $Valor = $rowMotorizado['monto_debe'] - $rowMotorizado['monto_haber']; //saber a que me respondan
            $Moneda = "COP";
            $Fecha = $rowMotorizado['fecha'];
            $nombreusuario = funcionMaster($rowMotorizado['usuario_id'], 'ID', 'NOMBRE_USUARIO', 'usuarios');


            //["Tipo Transaccion","Comprobante","Valor","Moneda","Fecha de elaboracion","Fecha de creacion","Creado por"];
      ?>

            data_table.push([
              "<?php echo $TipoTransaccion; ?>",
              "<?php echo $numero; ?>",
              "<?php echo $Valor; ?>",
              "<?php echo $rowMotorizado['monto_debe']; ?>",
              "<?php echo $rowMotorizado['monto_haber']; ?>",
              "<?php echo $Moneda; ?>",
              "<?php echo $Fecha; ?>",
              "<?php echo $Fecha; ?>",
              "<?php echo $nombreusuario; ?>"
            ]);
      <?php

          }
        }
      }

      ?>
    } else if (titulo_tabla == "Libro Oficial De Compras") {
      <?php
      if ($tipo_reporte == "Libro Oficial De Compras") {

        $queryGeneral = mysqli_query($conn3, "SELECT * FROM  opracioninvheader WHERE fechaReg BETWEEN '$desde' and '$hasta' AND estadoOrden = 4");
        while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
          $comprobante = funcionMaster($rowGeneral["Comprobante_id"], 'id', 'numero', 'CCompDiario');
          $fechaReg = $rowGeneral['fechaReg'];
          $rut = $rowGeneral['rut'];
          $nombre = $rowGeneral['nombre'];
          $facturaproveedor = $rowGeneral['id'];
          $basegravada = 0;
          $baseexenta = $rowGeneral['totalCosto'];
          $iva = 0;
          $total = $rowGeneral['totalCosto'];

          //["Comprobante","Fecha elaboracion","Identificacion","Nombre tercero","Factura proveedor","Base gravada","Base exenta", "Iva", "Total"];
      ?>
          //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
          data_table.push([
            "<?php echo $comprobante; ?>",
            "<?php echo $fechaReg; ?>",
            "<?php echo $rut; ?>",
            "<?php echo $nombre; ?>",
            "<?php echo $facturaproveedor; ?>",
            "<?php echo $basegravada; ?>",
            "<?php echo $baseexenta; ?>",
            "<?php echo $iva; ?>",
            "<?php echo $total; ?>"
          ]);
      <?php

        }
      }

      ?>
    } else if (titulo_tabla == "Ventas por Producto") {
      <?php
      if ($tipo_reporte == "Ventas por Producto") {

        $tipo = $_POST["tipo"];
        $producto = $_POST["producto"];

        $queryGeneral = mysqli_query($conn3, "SELECT * FROM  sOperacionInv WHERE (fechaOperacion BETWEEN '$desde' and '$hasta') AND  tipo = 1 ");

        while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
          $idOperacion = $rowGeneral['idOperacion'];

          if ($tipo == "Todos") {
            $filtroWhere = "";
          } else if ($tipo != "Todos" and $producto == "Todos") {
            $filtroWhereDentro = $tipo;
          } else if ($tipo != "Todos" and $producto != "Todos") {
            $filtroWhere = " AND idProducto = '$producto' ";
          }

          $queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOper  where idOperacion = '$idOperacion' {$filtroWhere}  ");
          while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $idProducto = $rowMotorizado['idProducto'];
            $cantidad = $rowMotorizado['cantidad'];
            $totalBase = $rowMotorizado['totalBase'];
            $impuesto    = $rowMotorizado['impuesto'];

            $Codigo = funcionMaster($idProducto, 'ID', 'referencia', 'sinvetrios');
            $Nombre = funcionMaster($idProducto, 'ID', 'descripcion', 'sinvetrios');

            $codigoGrupo = funcionMaster($idProducto, 'ID', 'tipo', 'sinvetrios');

            $GrupoInventario = funcionMaster($codigoGrupo, 'id', 'descripcion', 'scategoria');

            $impuesto_monto = $rowMotorizado['impuesto_monto'];
            $subTotal = $rowMotorizado['subTotal'];

            if ($filtroWhereDentro == "") {
              $ArregloProductos[$idProducto]["Codigo"] = $Codigo;
              $ArregloProductos[$idProducto]["Nombre"] = $Nombre;
              $ArregloProductos[$idProducto]["ReferenciaFabrica"] = $GrupoInventario;
              $ArregloProductos[$idProducto]["GrupoInventario"] = $GrupoInventario;
              $ArregloProductos[$idProducto]["Cantidad"] = $ArregloProductos[$idProducto]["Cantidad"] + $cantidad;
              $ArregloProductos[$idProducto]["Bruto"] = $ArregloProductos[$idProducto]["Bruto"] + $totalBase;
              $ArregloProductos[$idProducto]["Descuento"] = 0;
              $ArregloProductos[$idProducto]["Subtotal"] = $ArregloProductos[$idProducto]["Subtotal"] + $totalBase;
              $ArregloProductos[$idProducto]["Impuesto"] = $ArregloProductos[$idProducto]["Impuesto"] + $impuesto_monto;
              $ArregloProductos[$idProducto]["Retencion"] = 0;
              $ArregloProductos[$idProducto]["Total"] = $ArregloProductos[$idProducto]["Total"] + $subTotal;
            } else {
              if ("$filtroWhereDentro" == "$codigoGrupo") {
                $ArregloProductos[$idProducto]["Codigo"] = $Codigo;
                $ArregloProductos[$idProducto]["Nombre"] = $Nombre;
                $ArregloProductos[$idProducto]["ReferenciaFabrica"] = $GrupoInventario;
                $ArregloProductos[$idProducto]["GrupoInventario"] = $GrupoInventario;
                $ArregloProductos[$idProducto]["Cantidad"] = $ArregloProductos[$idProducto]["Cantidad"] + $cantidad;
                $ArregloProductos[$idProducto]["Bruto"] = $ArregloProductos[$idProducto]["Bruto"] + $totalBase;
                $ArregloProductos[$idProducto]["Descuento"] = 0;
                $ArregloProductos[$idProducto]["Subtotal"] = $ArregloProductos[$idProducto]["Subtotal"] + $totalBase;
                $ArregloProductos[$idProducto]["Impuesto"] = $ArregloProductos[$idProducto]["Impuesto"] + $impuesto_monto;
                $ArregloProductos[$idProducto]["Retencion"] = 0;
                $ArregloProductos[$idProducto]["Total"] = $ArregloProductos[$idProducto]["Total"] + $subTotal;
              }
            }
          }
        }

        foreach ($ArregloProductos as $key => $value) {

          //["Codigo producto","Nombre producto","Referencia fabrica","Grupo inventario","Cantidad vendida","Valor bruto","Descuento", "Subtotal", "Impuesto cargo","Impuesto retencion","Total"];
      ?>
          //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
          data_table.push([
            "<?php echo $value["Codigo"]; ?>",
            "<?php echo $value["Nombre"]; ?>",
            "<?php echo $value["ReferenciaFabrica"]; ?>",
            "<?php echo $value["GrupoInventario"]; ?>",
            "<?php echo $value["Cantidad"]; ?>",
            "<?php echo $value["Bruto"]; ?>",
            "<?php echo $value["Descuento"]; ?>",
            "<?php echo $value["Subtotal"]; ?>",
            "<?php echo $value["Impuesto"]; ?>",
            "<?php echo $value["Retencion"]; ?>",
            "<?php echo $value["Total"]; ?>"
          ]);
      <?php

        }
      }

      ?>
    } else if (titulo_tabla == "Movimiento Nota Debito y Credito [Venta y Compras]") {
      <?php
      if ($tipo_reporte == "Movimiento Nota Debito y Credito [Venta y Compras]") {

        $Comprobante = $_POST['Comprobante'];
        $centrocosto = $_POST['centrocosto'];
        if ($centrocosto != "Todos") {
          $FiltroWhere = " AND idCentroCosto = '$centrocosto' ";
        } else {
          $FiltroWhere = "";
        }

        $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiario  where (fecha BETWEEN '$desde' and '$hasta' ) AND tipo_comprobante = '$Comprobante' $FiltroWhere ");
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
          $id = $rowMotorizado['id'];
          $numero = $rowMotorizado['numero'];
          $idCentroCosto = $rowMotorizado['idCentroCosto'];
          $nombrecentrocosto = funcionMaster($idCentroCosto, 'id', 'descripcion', 'CcentroCostos');
          if ($nombrecentrocosto == "") {
            $nombrecentrocosto = "No diligenciado";
          }
          $tipo_comprobante = $rowMotorizado['tipo_comprobante'];

          switch ($tipo_comprobante) {
            case '1':
              $TipoTransaccion =  "Factura";
              break;
            case '2':
              $TipoTransaccion =  "Compras";
              break;
            case '4':
              $TipoTransaccion =  "Devoluciones";
              break;
          }

          $queryList1 = mysqli_query($conn3, "SELECT CDM.* FROM  CCompDiarioMov as CDM INNER JOIN CCompDiario as CD ON CDM.idComprobante = CD.id AND CDM.idComprobante = '$id' ORDER BY CDM.id");
          while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
            $contador++;
            //$numero = $rowMotorizado1['numero'];
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

            if ($tipo_comprobante == "2") {
              $facturaproveedor = funcionMaster($id, 'Comprobante_id', 'id', 'opracioninvheader');
              $identificacion = funcionMaster($id, 'Comprobante_id', 'rut', 'opracioninvheader');
              $nombre = funcionMaster($id, 'Comprobante_id', 'nombre', 'opracioninvheader');
            } else {
              $facturaproveedor = "";
              $cliente_id = funcionMaster($id, 'Comprobante_id', 'idCliente', 'sOperacionInv');
              $identificacion = funcionMasterMedical($cliente_id, 'cliente_id', 'CODI_CLIENTE', 'cliente');
              $nombre = funcionMasterMedical($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
            }

            //["Tipo","Numero Comprobante","Consecutivo","Factura Proveedor","Comprobante Relacionado","Identificacion","Nombre Tercero", "Centro Costo","Movimiento debito","Movimiento credito","Saldo final"];
      ?>

            data_table.push([
              "<?php echo $TipoTransaccion; ?>",
              "<?php echo $numero; ?>",
              "<?php echo $contador; ?>",
              "<?php echo $facturaproveedor; ?>",
              "<?php echo ""; ?>",
              "<?php echo $identificacion; ?>",
              "<?php echo $nombre; ?>",
              "<?php echo $nombrecentrocosto; ?>",
              "<?php echo $total_debe; ?>",
              "<?php echo $total_haber; ?>",
              "<?php echo $total_final; ?>"
            ]);
      <?php
          }
        }
      }
      ?>
    } else if (titulo_tabla == "Ventas Por Centro De Costo") {
      <?php
      if ($tipo_reporte == "Ventas Por Centro De Costo") {

        $centrocosto = $_POST["centrocosto"];
        if ($centrocosto != "Todos") {
          $FiltroWhere = " AND idCentroCosto = '$centrocosto' ";
        } else {
          $FiltroWhere = "";
        }

        $queryGeneral1 = mysqli_query($conn3, "SELECT idCentroCosto  FROM sOperacionInv  where  (fechaOperacion BETWEEN '$desde' and '$hasta' ) AND tipo = 1 {$FiltroWhere} GROUP BY idCentroCosto");
        while ($rowGeneral1 = mysqli_fetch_array($queryGeneral1)) {

          $CentroCosto = $rowGeneral1['idCentroCosto'];

          $queryGeneral = mysqli_query($conn3, "SELECT idOperacion,idCentroCosto,count(idOperacion) as cantidad_facturas, sum(totalNeto) as valorBruto,  sum(impuestoMonto) as impuestoMonto, sum(totalBruto) as totalBruto  FROM sOperacionInv  where  (fechaOperacion BETWEEN '$desde' and '$hasta' ) AND tipo = 1 AND idCentroCosto = '$CentroCosto' ");
          while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
            $idOperacion = $rowGeneral['idOperacion'];
            $idCentroCosto = $rowGeneral['idCentroCosto'];
            $NombreCentroCosto = funcionMaster($idCentroCosto, 'id', 'descripcion', 'CcentroCostos');
            if ($NombreCentroCosto == "") {
              $NombreCentroCosto = "No diligenciado";
            }
            $cantidad_facturas = $rowGeneral['cantidad_facturas'];
            $valorBruto = $rowGeneral['valorBruto'];
            $impuestoMonto = $rowGeneral['impuestoMonto'];
            $totalBruto = $rowGeneral['totalBruto'];


            //["Codigo Centro de Costo","Centro de Costo","Numero de Comprobantes","Valor Bruto","Descuento","Subtotal","Impuesto Cargo", "Impuesto Retencion","Cargo en Totales","Descuento en Totales","Total"];
      ?>

            data_table.push([
              "<?php echo $idCentroCosto; ?>",
              "<?php echo $NombreCentroCosto; ?>",
              "<?php echo $cantidad_facturas; ?>",
              "<?php echo $valorBruto; ?>",
              "<?php echo "0"; ?>",
              "<?php echo $valorBruto; ?>",
              "<?php echo $impuestoMonto; ?>",
              "<?php echo "0"; ?>",
              "<?php echo "0"; ?>",
              "<?php echo "0"; ?>",
              "<?php echo round($totalBruto, 2); ?>"
            ]);
      <?php
          }
        }
      }
      ?>

    } else if (titulo_tabla == "Libro Oficial de Ventas") {
      <?php
      if ($tipo_reporte == "Libro Oficial de Ventas") {


        $queryGeneral = mysqli_query($conn3, "SELECT numeroDoc,fechaOperacion,idCliente, totalNeto as totalNeto, impuestoMonto as impuestoMonto, totalBruto as totalBruto,Comprobante_id  FROM sOperacionInv  where  (fechaOperacion BETWEEN '$desde' and '$hasta' ) and tipo = 1");
        while ($rowGeneral = mysqli_fetch_array($queryGeneral)) {
          $numeroDoc = $rowGeneral['numeroDoc'];
          $Comprobante = funcionMaster($rowGeneral['Comprobante_id'], 'id', 'numero', 'CCompDiario');
          $fechaOperacion = $rowGeneral['fechaOperacion'];
          $idCliente = $rowGeneral['idCliente'];
          $Cedula = funcionMasterMedical($idCliente, 'cliente_id', 'CODI_CLIENTE', 'cliente');
          $totalNeto = $rowGeneral['totalNeto'];
          $impuestoMonto = $rowGeneral['impuestoMonto'];
          $totalBruto = $rowGeneral['totalBruto'];

          if ($impuestoMonto == 0) {
            $BaseExenta = $totalNeto;
            $BaseGravable = 0;
          } else {
            $BaseExenta = 0;
            $BaseGravable = $totalNeto;
          }
          //["Comprobante","Fecha Elaboracion","Identificacion","Base Gravada","Base Exenta","Iva","Impoconsumo", "Ad-Valorem","Cargo en Totales","Descuento en Totales","Total"];
      ?>

          data_table.push([
            "<?php echo $numeroDoc . " | " . $Comprobante; ?>",
            "<?php echo $fechaOperacion; ?>",
            "<?php echo $Cedula; ?>",
            "<?php echo $BaseGravable; ?>",
            "<?php echo $BaseExenta; ?>",
            "<?php echo $impuestoMonto; ?>",
            "<?php echo "0"; ?>",
            "<?php echo "0"; ?>",
            "<?php echo "0"; ?>",
            "<?php echo "0"; ?>",
            "<?php echo $totalBruto; ?>"
          ]);
      <?php
        }
      }
      ?>

    }
  </script>
  <?php
  /* 
  //Cartera General Detallada Por Cliente
  echo "<pre>";
  print_r($arregloDeuda_save);
  echo "</pre>";
  */
  ?>

  <?php
  include 'footer.php';
  ?>

  <style type="text/css">
    .btn-primary1 {
      color: #fff !important;
      background-color: #337ab7 !important;
      border-color: #2e6da4 !important;
    }
  </style>
  <script type="text/javascript">
    $(function() {
      // esto va en el footer
      //tabla inteligente
      if (typeof data_table !== 'undefined') {
        var Tabla_Inteligente = $('#Tabla_Inteligente').DataTable({

          data: data_table,
          "aaSorting": [],
          deferRender: true,
          scrollY: 1200,
          scrollCollapse: true,
          scroller: true,
          processing: true,
          lengthMenu: [10, 20, 50, 100, 200, 500],
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
            },
            buttons: {
              pageLength: {
                _: "Mostrando %d <br> Elementos",
                '-1': "Ver Todo"
              }
            }
          },

          dom: 'Bfrtip',
          buttons: [{
            extend: 'collection',
            text: '<i class="fa fa-cog" aria-hidden="true"></i>',
            className: 'btn btn-primary1',
            buttons: [{
                extend: 'print',
                text: 'Imprimir',
                title: titulo_tabla1,
                exportOptions: {
                  columns: ':visible'
                }
              },
              {
                extend: 'copy',
                text: 'Copiar',
                title: titulo_tabla,
                exportOptions: {
                  columns: ':visible'
                }
              },
              {
                extend: 'excel',
                text: 'Excel',
                title: titulo_tabla,
                exportOptions: {
                  columns: ':visible'
                }
              },
              {
                extend: 'csv',
                text: 'CSV',
                title: titulo_tabla,
                exportOptions: {
                  columns: ':visible'
                }
              },
              {
                extend: 'pdf',
                text: 'PDF',
                title: titulo_tabla2,
                orientation: 'landscape',
                titleAlign: 'left',
                exportOptions: {
                  columns: ':visible'
                }
              },
              {
                extend: 'pageLength'
              },
              {
                extend: 'colvis',
                text: 'Modificar Columnas'
              }
            ]
          }],

        });
      }

    });
    // fin de tabla inteligente
  </script>