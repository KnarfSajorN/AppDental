<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");

$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

$queryList1 = mysqli_query($conn3, "SELECT count(idOperacion) as cantidad, sum(totalBruto) as Sum_totalBruto FROM   sOperacionInv  where fechaOperacion ='$fecha' AND tipo = 1 ");
while ($rowFacturas= mysqli_fetch_array($queryList1)) {
    $totalfacturas = $rowFacturas["Sum_totalBruto"];
    $cantidad = $rowFacturas['cantidad'];
}



$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $numeroDoc      = $rowMotorizado['numeroDoc'];
  $idCliente      = $rowMotorizado['idCliente'];
  $idEmpresa      = $rowMotorizado['idEmpresa'];
  $fechaOperacion = $rowMotorizado['fechaOperacion'];
  $fechaVencimiento = $rowMotorizado['fechaVencimiento'];
  $subTotal       = $rowMotorizado['subTotal'];
  $impuesto       = $rowMotorizado['impuesto'];
  $totalNeto      = $rowMotorizado['totalNeto'];
  $totalBruto     = $rowMotorizado['totalBruto'];
  $cantidadProduc = $rowMotorizado['cantidadProduc'];
  $descuentos     = $rowMotorizado['descuentos'];
  $montoPagado    = $rowMotorizado['montoPagado'];
  $nota    = $rowMotorizado['nota'];
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $empresaNombre ?> </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
</head>

<body style="padding:15px;">
<div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Fecha Cierre Diario</th>
                    <th>Hora Cierre Diario</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$fecha;?></td>
                        <td><?=$hora;?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Cantidad Transacciones</th>
                    <th>Valor de Transacciones</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$cantidad;?></td>
                        <td><?=number_format($totalfacturas,2,",",".");?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-xs-12 table-responsive" style="zoom:0.7;">
        <h3>Ventas</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Codigo Departamento</th>
                    <th>Nombre Departamento</th>
                    <th>Operacion</th>
                    <th>Tarifa</th>
                    <th>Base Gravable</th>
                    <th>Descuento</th>
                    <th>Impoconsumo</th>
                    <th>Valor Iva</th>
                    <th>Valor Neto</th>
                </tr>
                </thead>
                <tbody>

                    <?php

                    $queryList1 = mysqli_query($conn3, "SELECT * FROM   sOperacionInv  where fechaOperacion ='$fecha' AND tipo = 1 ");
                    while ($rowFacturas= mysqli_fetch_array($queryList1)) {
                        $idOperacion = $rowFacturas["idOperacion"];
                        $numeroDoc = $rowFacturas["numeroDoc"];
                        $queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where idOperacion = $idOperacion");
                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                            $Codigo = funcionMaster($rowMotorizado["idProducto"],'ID','referencia','sinvetrios');
                            $descripcion = $rowMotorizado["descripcion"];
                            $ivaPorcentaje = $rowMotorizado["ivaPorcentaje"];
                            $totalbase = $rowMotorizado["totalbase"];
                            $descuento = 0;
                            $impoconsumo =0;
                            $ValorIva= $rowMotorizado['impuesto_monto'];
                            $ValorNeto = $rowMotorizado['subTotal'];

                            echo "<tr>
                                        <td>$Codigo</td>
                                        <td>$descripcion</td>
                                        <td>$numeroDoc</td>
                                        <td>$ivaPorcentaje</td>
                                        <td>".number_format($totalbase,2,",",".")."</td>
                                        <td>".number_format($descuento,2,",",".")."</td>
                                        <td>".number_format($impoconsumo,2,",",".")."</td>
                                        <td>".number_format($ValorIva,2,",",".")."</td>
                                        <td>".number_format($ValorNeto,2,",",".")."</td>
                                </tr>";

                            $BaseTotal += $totalbase;
                            $BaseDescuento += $descuento;
                            $BaseImpoConsumo += $impoconsumo;
                            $BaseIva += $ValorIva;
                            $BaseTotalNeto += $ValorNeto;
                        }
                    }


                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Totales</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?=number_format($BaseTotal,2,",",".");?></td>
                        <td><?=number_format($BaseDescuento,2,",",".");?></td>
                        <td><?=number_format($BaseImpoConsumo,2,",",".");?></td>
                        <td><?=number_format($BaseIva,2,",",".");?></td>
                        <td><?=number_format($BaseTotalNeto,2,",",".");?></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="col-xs-12 table-responsive" style="zoom:0.7;">
        <h3>Devoluciones Ventas</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Codigo Departamento</th>
                    <th>Nombre Departamento</th>
                    <th>Operacion</th>
                    <th>Tarifa</th>
                    <th>Base Gravable</th>
                    <th>Descuento</th>
                    <th>Impoconsumo</th>
                    <th>Valor Iva</th>
                    <th>Valor Neto</th>
                </tr>
                </thead>
                <tbody>
                <?php

$queryList1 = mysqli_query($conn3, "SELECT * FROM   sOperacionInv  where fechaOperacion ='$fecha' AND tipo = 2 ");
while ($rowFacturas= mysqli_fetch_array($queryList1)) {
    $idOperacion = $rowFacturas["idOperacion"];
    $numeroDoc = $rowFacturas["numeroDoc"];
    $queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where idOperacion = $idOperacion");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Codigo = funcionMaster($rowMotorizado["idProducto"],'ID','referencia','sinvetrios');
        $descripcion = $rowMotorizado["descripcion"];
        $ivaPorcentaje = $rowMotorizado["ivaPorcentaje"];
        $totalbase = $rowMotorizado["totalbase"];
        $descuento = 0;
        $impoconsumo =0;
        $ValorIva= $rowMotorizado['impuesto_monto'];
        $ValorNeto = $rowMotorizado['subTotal'];

        echo "<tr>
                    <td>$Codigo</td>
                    <td>$descripcion</td>
                    <td>$numeroDoc</td>
                    <td>$ivaPorcentaje</td>
                    <td>".number_format($totalbase,2,",",".")."</td>
                    <td>".number_format($descuento,2,",",".")."</td>
                    <td>".number_format($impoconsumo,2,",",".")."</td>
                    <td>".number_format($ValorIva,2,",",".")."</td>
                    <td>".number_format($ValorNeto,2,",",".")."</td>
            </tr>";

        $BaseTotal += $totalbase;
        $BaseDescuento += $descuento;
        $BaseImpoConsumo += $impoconsumo;
        $BaseIva += $ValorIva;
        $BaseTotalNeto += $ValorNeto;
    }
}


?>
                </tbody>
            </table>
        </div>


        <div class="col-xs-12 table-responsive" style="zoom:0.7;">
            <h3>Totales por Tarifa de Iva</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Operacion</th>
                    <th>Tarifa</th>
                    <th>Base Gravable</th>
                    <th>Descuento</th>
                    <th>Impoconsumo</th>
                    <th>Valor Iva</th>
                </tr>
                </thead>
                <tbody>
                    <?php


                        $queryList1 = mysqli_query($conn3, "SELECT * FROM   sOperacionInv  where fechaOperacion ='$fecha' AND tipo = 1 ");
                        while ($rowFacturas= mysqli_fetch_array($queryList1)) {
                            $idOperacion = $rowFacturas["idOperacion"];
                            $numeroDoc = $rowFacturas["numeroDoc"];
                            $queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where idOperacion = $idOperacion");
                            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                $Codigo = funcionMaster($rowMotorizado["idProducto"],'ID','referencia','sinvetrios');
                                $descripcion = $rowMotorizado["descripcion"];
                                $ivaPorcentaje = $rowMotorizado["ivaPorcentaje"];
                                $totalbase = $rowMotorizado["totalbase"];
                                $descuento = 0;
                                $impoconsumo =0;
                                $ValorIva= $rowMotorizado['impuesto_monto'];
                                $ValorNeto = $rowMotorizado['subTotal'];

                                $ArregloIva["$ivaPorcentaje"]["Base"]=$ArregloIva["$ivaPorcentaje"]["Base"]+$totalbase;
                                $ArregloIva["$ivaPorcentaje"]["ValorIva"]=$ArregloIva["$ivaPorcentaje"]["ValorIva"]+$ValorIva;
                                $ArregloIva["$ivaPorcentaje"]["Operacion"][$idOperacion]="Aplica";


                            }
                        }

                        foreach ($ArregloIva as $key => $value) {
                            $Operaciones="";
                            foreach ($value["Operacion"] as $key1 => $value1) {
                                $Operaciones.="$key1 | ";
                            }
                            echo "<tr><td> {$Operaciones}</td>
                                    <td> IVA {$key}</td>
                                    <td> ".number_format($value['Base'],2,",",".")."</td>
                                    <td> 0,00</td>
                                    <td> 0,00</td>
                                    <td> ".number_format($value['ValorIva'],2,",",".")."</td></tr>";

                        }



                    ?>
                </tbody>
            </table>
        </div>

        <div class="col-xs-12 table-responsive" style="zoom:0.7;">
            <h3>Totales por Medio de Pago</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nombre Medio de Pago</th>
                    <th>Numero Transacciones</th>
                    <th>Valor Transacciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php


                        $queryList1 = mysqli_query($conn3, "SELECT * FROM   sOperacionInv  where fechaOperacion ='$fecha' AND tipo = 1 ");
                        while ($rowFacturas= mysqli_fetch_array($queryList1)) {
                            $idOperacion = $rowFacturas["idOperacion"];
                            $totalBruto = $rowFacturas["totalBruto"];
                            $tipoPago = $rowFacturas["tipoPago"];

                            $ArregloMedioPago["$tipoPago"]["Numero"]=$ArregloMedioPago["$tipoPago"]["Numero"]+1;
                            $ArregloMedioPago["$tipoPago"]["Valor"]=$ArregloMedioPago["$tipoPago"]["Valor"]+$totalBruto;
                        }

                        foreach ($ArregloMedioPago as $key => $value) {
                            echo "<tr><td> {$key}</td>
                                    <td> ".number_format($value['Numero'],2,",",".")."</td>
                                    <td> ".number_format($value['Valor'],2,",",".")."</td></tr>";

                        }



                    ?>
                </tbody>
            </table>
        </div>


    </div>

</body>

  <script type="text/javascript">
    printHTML();

    function printHTML() {
        if (window.print) {
            window.print();
        }
    }
</script>