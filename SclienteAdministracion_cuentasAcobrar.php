<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php';

/*
//indices de tipo de la tabla soperacioninv
1-> Facturas Generales
7-> Facturas Odontograma
*/

?>
<!-- Archivos a tener en cuenta para editar:
- AbonoCuentasC.php
- AbonoRegistrarC.php
- HistorialAbonoC.php
- FirmarAbonoC.php
- AnularAbonoC.php 
- ImprimirAbonoC.php
- EnviarAbonoC.php
TABLA:
abonoC
by: Emma 24.05.23 -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cuentas a cobrar
        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Control facturas</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div>
            <div class="col-xs-12">
                <?php
                $msg = $_GET['msg'];
                if ($msg == '1') {
                    echo '  <div class="callout callout-info ">
            <h4> Cliente ya Registrado!</h4>

            <p>   </p>
          </div>';
                }

                if ($msg == '2') {
                    echo '
            <div class="callout callout-info ">
            <h4> Cliente Registrado!</h4>

            <p>   </p>
          </div>';
                }
                ?>
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="box-body">
                            <!-- <font calss="text-dark"> Cuenta Pagado <i class="fa fa-circle" style="color:#80e68070"></i> </font>|| -->
                            <font calss="text-dark"> Cuenta Pendiente <i class="fa fa-circle" style="color:#FC5E79"></i>
                            </font>||
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Numero</th>
                                        <th>Cliente</th>
                                        <th>Cédula</th>
                                        <th>Fecha Factura</th>
                                        <th>
                                            <div align="right">Total</div>
                                        </th>
                                        <th>
                                            <div align="right">Monto Pagado</div>
                                        </th>
                                        <th>
                                            <div align="right">Monto Faltante</div>
                                        </th>
                                        <th>
                                            <div align="right">Cant.</div>
                                        </th>
                                        <th></th>
                                        <!-- <th></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ID = $_SESSION['ID'];
                                    if ($_GET['clienteId'] || isset($_SESSION['cI'])) {
                                        // $idCliente =  $_GET['clienteId'];
                                    

                                        if (isset($_GET['clienteId'])) {
                                            $idCliente = decrypt($_GET['clienteId']);
                                        } else {
                                            $idCliente = $_SESSION['cI'];
                                        }

                                        $resultado = mysqli_query($conn3, "SELECT * FROM sOperacionInv where ((idEmpresa = '{$_SESSION['ID']}' or idEmpresa = '{$_SESSION['ID_principal']}') or (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}')) and tipo IN (1, 7) and idCliente = '$idCliente' and (totalNeto - montoPagado) > 0 order by numeroDoc");
                                    } else {
                                        $resultado = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where (idEmpresa = '{$_SESSION['ID']}' or idEmpresa = '{$_SESSION['ID_principal']}') and tipo IN (1, 7) and (totalNeto - montoPagado) > 0 order by numeroDoc");
                                    }
                                    //$check = mysql_num_rows($q);
                                    while ($fila = mysqli_fetch_array($resultado)) {
                                        $firma = $fila['Firma'];
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $fila[2]");
                                        $nrowl = mysqli_num_rows($queryList);
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                            $nombre_cliente = $rowMotorizado['nombre_cliente'];
                                            $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];

                                            $telefono_cliente = $rowMotorizado['telefono_cliente'];
                                        }
                                        //$saldo = $fila['totalNeto'] - $fila['montoPagado'];
                                    

                                        ////////////////////////////////////////////////////////devoluciones////////////////////////////////////////////////////////////////
                                        $idOperacionPrincipal = $fila['idOperacion'];
                                        $ValorProductoDevuelto = 0;
                                        $MontoDevolucion = 0;
                                        $ResultDevolucion = mysqli_query($conn3, "SELECT * FROM  sOperacionInvDevolucion where idOperacion_principal = $idOperacionPrincipal");
                                        while ($RowDevolucion = mysqli_fetch_array($ResultDevolucion)) {
                                            $ValorProductoDevuelto = round($ValorProductoDevuelto + $RowDevolucion['totalNeto'], 2);
                                            $MontoDevolucion = round($MontoDevolucion + $RowDevolucion['MontoDevolucion'], 2);
                                        }

                                        $Mensaje_ValorProductoDevuelto = "";
                                        $Mensaje_MontoDevolucion = "";
                                        if ($ValorProductoDevuelto != "0") {
                                            $Mensaje_ValorProductoDevuelto = ' Productos Devueltos: ' . $ValorProductoDevuelto;
                                        }
                                        if ($MontoDevolucion != "0") {
                                            $Mensaje_MontoDevolucion = ' Monto Devueltos: ' . $MontoDevolucion;
                                        }

                                        $saldo = ($fila['totalNeto'] - $fila['montoPagado']);
                                        $saldodevolucion = ($ValorProductoDevuelto - $MontoDevolucion);
                                        $saldo = round($saldo - $saldodevolucion, 2);
                                        ////////////////////////////////////////////////////////devoluciones////////////////////////////////////////////////////////////////
                                    

                                        $hoy = date("Y-m-d");
                                        $vence = $fila['fechaVencimiento'];
                                        $Color = "";
                                        if ($saldo == "0") {
                                            $Color = 'style="background-color:#80e68070"';
                                        } else {
                                            $Color = 'style="background-color:#EA7A7A"';
                                        }
                                        $tipo = $fila['tipo'];

                                        echo '     <tr>
                                        <td ' . $Color . '>' . $fila['numeroDoc'] . ' </td>
                                        <td ' . $Color . '>' . $nombre_cliente . ' </td>
                                        <td ' . $Color . '>' . $CODI_CLIENTE . ' </td>
                                        <td ' . $Color . '>' . $fila['fechaOperacion'] . '</td>
                                        <td ' . $Color . '><div align="right">' . number_format($fila['totalNeto'], 2) . '<br>' . $Mensaje_ValorProductoDevuelto . '</div></td>
                                        <td ' . $Color . '><div align="right">' . number_format($fila['montoPagado'], 2) . '<br>' . $Mensaje_MontoDevolucion . '</div></td>
                                        <td ' . $Color . '><div align="right">' . number_format($saldo, 2) . '</div></td>
                                        <td ' . $Color . '><div align="right">' . $fila['cantidadProduc'] . '</div></td> 
                                        <td width="10%" ' . $Color . ' >
                                        ' ?>
                                        <!--
                                        <td width='10%' <?php echo $Color ?>>
                                            <div class='btn-group'>
                                                <button type='button' class='btn btn-block btn-primary rounded-pill  dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    <i class='fa fa-bill'></i> Acciones Factura
                                                </button>
                                                <div class='dropdown-menu'>
                                                    <a class='dropdown-item' href='preliminarFactura?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                                        <button type='button' class='btn btn-block btn-primary rounded-pill  btn-block'>
                                                            Preliminar Factura
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item' href='imprimirFactura?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                                        <button type='button' class='btn btn-block btn-outline-success rounded-pill  btn-block'>
                                                            Imprimir Factura
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item' href='enviarFactura?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                                        <button type='button' class='btn btn-block btn-outline-danger rounded-pill  btn-block'>
                                                            Enviar Factura
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>-->

                                        <? if ($tipo == "1"): ?>

                                            <div class='btn-group'>
                                                <button type='button'
                                                    class='btn btn-block btn-light rounded-pill  dropdown-toggle'
                                                    data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    <i class='fa fa-bill'></i> Acciones Factura
                                                </button>
                                                <div class='dropdown-menu'>
                                                    <a class='dropdown-item'
                                                        href='preliminarFactura?idOperacion=<?php echo $fila['idOperacion']; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-info rounded-pill  btn-block'>
                                                            Preliminar Factura
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item'
                                                        href='imprimirFactura?idOperacion=<?php echo $fila['idOperacion']; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-success rounded-pill  btn-block'>
                                                            Imprimir Factura
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item'
                                                        href='ticketPrint?idOperacion=<?php echo $fila['idOperacion']; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-success rounded-pill  btn-block'>
                                                            Imprimir Ticket
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item'
                                                        href='enviarFactura?idOperacion=<?php echo $fila['idOperacion']; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-danger rounded-pill  btn-block'>
                                                            Enviar Factura
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>

                                            <?php
                                        endif;
                                        if ($tipo == "7"):
                                            ?>

                                            <div class='btn-group w-100'>
                                                <button type='button'
                                                    class='btn btn-block btn-light rounded-pill  dropdown-toggle'
                                                    data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    <i class='fa fa-bill'></i> Acciones Factura
                                                </button>
                                                <div class='dropdown-menu'>
                                                    <a class='dropdown-item'
                                                        href='OD_PreliminarFactura?idOperacion=<?php echo $fila['idOperacion']; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-info rounded-pill  btn-block'>
                                                            Preliminar Factura
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item'
                                                        href='OD_ImprimirFactura?idOperacion=<?php echo $fila['idOperacion']; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-success rounded-pill  btn-block'>
                                                            Imprimir Factura
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item'
                                                        href='ticketPrint?idOperacion=<?php echo $fila['idOperacion']; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-success rounded-pill  btn-block'>
                                                            Imprimir Ticket
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item'
                                                        href='enviarFactura?idOperacion=<?php echo $fila['idOperacion']; ?>&tipo=odontograma'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-danger rounded-pill  btn-block'>
                                                            Enviar Factura
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>

                                        <?php endif; ?>


                                        <div class='btn-group mt-1 w-100'>
                                            <?php if ($saldo == 0) { ?>
                                                <button type='button'
                                                    class='btn btn-block btn-outline-success rounded-pill  dropdown-toggle'
                                                    data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    <i class='fa fa-bill'></i> Factura Pagada
                                                </button>
                                                <div class='dropdown-menu'>
                                                    <!-- <a class='dropdown-item' href='AbonoCuentasC.php?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                                            <button type='button' class='btn btn-block btn-outline-success rounded-pill  btn-block' disabled>
                                                                Factura Pagada
                                                            </button>
                                                        </a> -->
                                                    <a class='dropdown-item'
                                                        href='HistorialAbonoC?idOperacion=<?php echo $fila['idOperacion']; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-danger rounded-pill  btn-block'>
                                                            Historial de Pagos
                                                        </button>
                                                    </a>
                                                </div>
                                            <?php } else { ?>

                                                <button type='button'
                                                    class='btn btn-block btn-warning rounded-pill dropdown-toggle'
                                                    data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    <i class='fa fa-bill'></i> Acciones Pagos
                                                </button>

                                                <div class='dropdown-menu'>
                                                    <a class='dropdown-item'
                                                        href='AbonoCuentasC?idOperacion=<?php echo $fila['idOperacion']; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-success rounded-pill  btn-block'>
                                                            Realizar Pago
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item'
                                                        href='HistorialAbonoC?idOperacion=<?php echo $fila['idOperacion']; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-danger rounded-pill  btn-block'>
                                                            Historial de Pagos
                                                        </button>
                                                    </a>
                                                </div>
                                            <?php } ?>
                                        </div>

                                        <?php
                                        echo '
                                        </td>
                                     </tr>';
                                    }
                                    ?>
                                    <a href=""></a>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Numero</th>
                                        <th>Cliente</th>
                                        <th>Cédula</th>
                                        <th>Fecha Factura</th>
                                        <th>
                                            <div align="right">Total</div>
                                        </th>
                                        <th>
                                            <div align="right">Monto Pagado</div>
                                        </th>
                                        <th>
                                            <div align="right">Monto Faltante</div>
                                        </th>
                                        <th>
                                            <div align="right">Cant.</div>
                                        </th>
                                        <th></th>
                                        <!-- <th></th> -->
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>