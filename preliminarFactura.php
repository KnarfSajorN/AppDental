<?php
include 'header.php';
include 'menu.php';

$idOperacion = $_GET['idOperacion'];

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $idOperacion = $rowMotorizado['idOperacion'];
    $numeroDoc = $rowMotorizado['numeroDoc'];
    $idCliente = $rowMotorizado['idCliente'];
    $idClienteFac = $rowMotorizado['idClienteFac'];
    $idEmpresa = $rowMotorizado['idEmpresa'];
    $fechaOperacion = $rowMotorizado['fechaOperacion'];
    $fechaVencimiento = $rowMotorizado['fechaVencimiento'];
    //$subTotal      =$rowMotorizado['subTotal'];
    $impuesto = $rowMotorizado['impuesto'];
    $impuestoBase = $rowMotorizado['impuestoBase'];
    $totalNeto = $rowMotorizado['totalNeto'];
    $totalBruto = $rowMotorizado['totalBruto'];
    $cantidadProduc = $rowMotorizado['cantidadProduc'];
    $descuentos = $rowMotorizado['descuentos'];
    $montoPagado = $rowMotorizado['montoPagado'];
    $nota = $rowMotorizado['nota'];
    $valorIva = funcionMaster($fila['idProducto'], 'ID', 'iva', 'sinvetrios');
}


$queryList = mysqli_query($conn3, "SELECT * FROM  config where (ID_Usuario = '{$_SESSION['ID']}' or ID_Usuario = '{$_SESSION['ID_principal']}')");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
    $impuestoF = $rowMotorizado['impuestoF'];

    // Nuevos campos

    $nombreF = $rowMotorizado['nombreF'];
    $telefonoF = $rowMotorizado['telefonoF'];
    $direccionF = $rowMotorizado['direccionF'];
    $emailF = $rowMotorizado['emailF'];
    $ciudadPaisF = $rowMotorizado['ciudadPaisF'];
    $licenciaF = $rowMotorizado['licenciaF'];
    $pieF = $rowMotorizado['pieF'];

    $LogoF = $rowMotorizado['logoF'];

    if (strlen($LogoF) > 0) {
        $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" height="10%" width="10%">';
    }
}



$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $idEmpresa");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $empresaNombre = $rowMotorizado['empresaNombre'];
    $pais = $rowMotorizado['pais'];

    $ciudad = $rowMotorizado['ciudad'];
    $direccion = $rowMotorizado['direccion'];
    $telefono = $rowMotorizado['telefono'];

    $nit = $rowMotorizado['nit'];
}


if ($idClienteFac > 0) {
    $idCliente_ = $idClienteFac;
} else {
    $idCliente_ = $idCliente;
}

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente_");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $ciudad_cliente = $rowMotorizado['ciudad_cliente'];

    $correo_cliente = $rowMotorizado['correo_cliente'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $telefono_cliente = $rowMotorizado['telefono_cliente'];
    $whatsapp = $rowMotorizado['whatsapp'];
    $codigo_ciudad = $rowMotorizado['codigo_ciudad'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
}

// if ($montoPagado == 0) {
//   $pagado = '<div align="center"><img src="' . $Base . '/pagado.png" height="10%" width="30%"></div>';
// }

?>
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
            <li class="active"> Factura</li>
        </ol>
    </section>


    <!-- Main content -->
    <h4 class="Titulo_Pagina"> &nbsp;&nbsp; Factura
        <small># 0000<?php echo $numeroDoc ?></small>
    </h4>
    <section class="invoice p-3">
        <!-- title row -->
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-header">
                    <?php echo $nombreF ?>
                    <small class="pull-right">Fecha: <?php echo date("d-m-y") ?></small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-md-4 invoice-col">
                <h4>Datos de la Empresa</h4>
                <address>
                    <strong>Nombre de la Empresa:</strong><?php echo $nombreF ?><br>
                    <!-- Licencia: <strong> <?php echo $licenciaF ?></strong><br> -->
                    <strong>NIT:</strong> <?php echo $nit ?><br>
                    <strong>Dirección:</strong> <?php echo $direccionF ?> - <?php echo $ciudadPaisF ?><br>
                    <strong>Teléfono:</strong> <?php echo $telefonoF ?><br>
                    <strong>Email:</strong> <?php echo $emailF ?>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-md-4 invoice-col">
                <h4>Datos del Cliente</h4>
                <address>

                    <strong>Nombre: </strong> <?php echo $nombre_cliente ?><br>
                    <strong>Cédula:</strong> <?php echo $CODI_CLIENTE ?> <br>
                    <strong>Dirección:</strong> <?php echo $direccion_cliente ?><br>
                    <strong>Ciudad:</strong> <?php echo $codigo_ciudad ?><br>
                    <strong>Teléfono:</strong> <?php echo $whatsapp ?><br>
                    <strong>Email: </strong> <?php echo $correo_cliente ?>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-md-4 invoice-col">
                <b>Factura # 0000<?php echo $numeroDoc ?></b><br>
                <b>Fecha Factura:</b><?php echo $fechaOperacion ?><br>
                <b>Fecha Vencimiento:</b> <?php echo $fechaVencimiento ?><br>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-md-12">
                <hr>
            </div>
        </div>

        <!-- Table row -->
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>
                                <div align="Right">Cantidad</div>
                            </th>
                            <th>
                                <div align="Right">Precio</div>
                            </th>
                            <th>
                                <div align="Right">Descuento</div>
                            </th>
                            <th>
                                <div align="Right">Subtotal </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php


                        $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where estado = 1 and id_usuario = $idEmpresa and  id_cliente = $idCliente
            and idOperacion = $idOperacion order by id");
                        while ($fila = mysqli_fetch_array($resultado)) {
                            //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>
                            $Numero++;
                            $Descuento = $fila['Descuento_Numerico'];
                            $Descripcion = $fila['descripcion'];
                            //Apartado de paquetes
                            if ($fila["PaqueteProcedimiento_id"] != "0") {
                                $Paquete_id = funcionMaster($fila["PaqueteProcedimiento_id"], 'id', 'paquete_id', 'ES_Paquete_Procedimientos');
                                $PaqueteNombre = funcionMaster($Paquete_id, 'id', 'Nombre', 'ES_Paquete');
                                $Descripcion .= ' [' . $PaqueteNombre . ']';
                            }

                            if ($fila["Mas_Detalles"] != "") {
                                $Descripcion .= ' ' . $fila["Mas_Detalles"] . '';
                            }
                            echo '     <tr>
                  <td  width="5%">' . $Numero . ' </td>
                  <td width="30%">' . $Descripcion . ' </td>
                  
                  <td width="5%"><div align="Right">' . $fila['cantidad'] . '</div></td>
                  <td width="13%"><div align="Right">' . number_format($fila['base'], 2) . ' ' . $moneda . '</div></td>
                  <td width="13%"><div align="Right">' . number_format($Descuento, 2) . ' ' . $moneda . '</div></td>
                  <td width="13%"><div align="Right">' . number_format($fila['subTotal'], 2) . ' ' . $moneda . '</div></td>
                 
                </tr>';

                            $totalCant += $fila['cantidad'];
                            $totalBase += $fila['base'];
                            $total += $fila['subTotal'];
                        }





                        ?>


                    </tbody>
                </table>
            </div>
            <!-- /.col -->
            <!-- <div class="col-xs-6">
           <label>
             <h4>Metodo de Pago:</h4>
             <h5><?php echo $metodo_pago ?></h5>
           </label>

         </div> -->
        </div>
        <!-- /.row -->

        <div class="row">

            <!-- accepted payments column -->

            <div class="col-md-4">
                <p class="lead">Comentarios:</p>


                <p class="text-muted well well-sm no-shadow"
                    style="background-color: #5b59590f;padding: 20px;margin: 10px;">
                    <?php echo $nota; ?>
                </p>
            </div>

            <div class="col-md-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>
                                <div>Método de Pago</div>
                            </th>
                            <th>
                                <div align="Right">Monto</div>
                            </th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $ID = $_SESSION['ID'];
                            $Numero = 0;
                            $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE idOperacion = $idOperacion");
                            $totalMet = 0;
                            while ($fila = mysqli_fetch_array($resultado)) {
                                $Numero++;
                                $Valor_Pago = $fila['nota_pago'];
                                $Nombre_Pago = funcionMaster($fila['metodo_pago'], 'id', 'Nombre', 'Medios_Pago');

                                echo '<tr>
                    <td>' . $Numero . '</td>
                    <td>' . $Nombre_Pago . '</td>
                    <td><div align="Right">' . number_format($Valor_Pago, 2) . ' ' . $moneda . '</div></td>';

                                echo "<td align='center'></td>";

                                echo '</tr>';


                                $totalMet += $fila['nota_pago'];

                                $saldo = $totalNeto - $totalMet;
                            }



                            // echo "El total es: " . $totalMet;
                            ?>

                        </tr>
                    </tbody>
                    <!-- <thead>
            <tr>
              <th></th>
              <th> <strong>
                  <div align="Right"> Total </div>
                </strong>
              </th>
              <th>
                <div align="Right"><?php echo $totalMet . ' ' . $moneda; ?> </div>
              </th>



            </tr>

          </thead> -->

                </table>

            </div>

            <!-- /.col -->
            <div class="col-md-4">


                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Precio Base:</th>
                            <td> <?php echo number_format($totalBruto, 2) . ' ' . $moneda ?> </td>
                        </tr>
                        <tr>
                            <th style="color:green">Descuento:</th>
                            <td><?php echo number_format($descuentos, 2) . ' ' . $moneda ?></td>
                        </tr>
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td> <?php echo number_format($totalBruto - $descuentos, 2) . ' ' . $moneda ?> </td>
                        </tr>

                        <tr>
                            <th style="width:50%">Iva:</th>
                            <td>
                                <?php echo number_format($impuestoBase / ($totalBruto - $descuentos) * 100, 1) . '' . '%' . '' ?>
                            </td>


                            <?php
                            if ($impuestoBase > 0) {
                                //$impuestoF2 = $impuestoF / 100;
                                //$total1 =  $total * $impuestoF2;
                                $total1 = $impuestoBase;
                                $total = $total1 + $total;


                                ?>

                            <tr>
                                <th style="width:50%">Impuesto:</th>
                                <td> <?php echo number_format($total1, 2) . ' ' . $moneda ?> </td>
                            </tr>

                            <?php
                            } ?>


                        <!-- <tr>
                            <th>Total a Pagar:</th>
                            <td><?php echo number_format($totalNeto, 2) . ' ' . $moneda ?></td>
                        </tr> -->

                        <tr>
                            <th>Pagado:</th>
                            <td><?php echo number_format($totalMet, 2) . ' ' . $moneda ?></td>
                        </tr>
                        <?php if ($totalMet == 0) { ?>
                            <tr>
                                <th style="color:red">Saldo:</th>
                                <td><?php echo number_format($totalNeto, 2) . ' ' . $moneda ?></td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <th style="color:red">Saldo:</th>
                                <td><?php echo number_format($saldo, 2) . ' ' . $moneda ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <th>Total Factura:</th>
                            <td><?php echo number_format($totalNeto, 2) . ' ' . $moneda ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- /.col -->
        </div>
        <div class="col-md-12" align="center">
            <?php echo $pieF ?>
        </div>


        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="no-print" style="width:100%">
            <div class="col-md-12">
                <a href="imprimirFactura?idOperacion=<?php echo $idOperacion ?>" target="_blank"
                    class="btn btn-block btn-outline-info rounded-pill shadow m-1" style="width:100%"><i
                        class="fa fa-print"></i> Imprimir</a>
            </div>
            <div class="col-md-12">
                <br>
            </div>
            <?php
            if (isset($_SESSION['POS']) && $_SESSION['POS'] > 0) {
                echo "<div class='col-md-12'>
        <a href='pos' class='btn btn-block btn-outline-info rounded-pill shadow m-1' style='width:100%' ><i class='fa fa-sign-out'></i> Regresar al POS </a>
      </div>
      <div class='col-md-12'>
        <br>
      </div>";
            }
            ?>
        </div>
        <div class="col-md-12" align="center">

            <a class="btn btn-block btn-outline-primary rounded-pill shadow m-1" target="_blank"
                href="<?php echo $Base; ?>enviarFactura.php?cliente=<?php echo $idCliente; ?>&idOperacion=<?php echo $idOperacion ?>">
                <i class="fa fa-send"></i> Enviar Factura al paciente
            </a>



        </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
</div>










<?php include ("footer.php") ?>