<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php';

/*
//indices de tipo de la tabla soperacioninv
1-> Facturas Generales
7-> Facturas Odontograma
*/


if (isset($_SESSION['cI']) && $_SESSION['cI'] <> '') {
    $queryCliente = " AND idCliente=" . $_SESSION['cI'];
} else {
    $queryCliente = "";
}


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Registros de Facturas

        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Registros de facturas</a></li>


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
                        <font calss="text-dark"> Factura Pagado <i class="fa fa-circle" style="color:#80e68070"></i> </font>||
                        <font calss="text-dark"> Factura Pendiente <i class="fa fa-circle" style="color:#FC5E79"></i> </font><br>

                        <font calss="text-dark"> *Cliente Contado* <i class="fa fa-person" style="color:#80e68070"> </i>  </font>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Numero</th>
                                    <th>Cliente</th>
                                    <th>Fecha Factura</th>
                                    <th>Fecha vencimiento</th>
                                    <th>
                                        <div align="right">Total</div>
                                    </th>
                                    <th>
                                        <div align="right">Cant.</div>
                                    </th>
                                    <th>
                                        <div align="right">Saldo</div>
                                    </th>
                                    <th> </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $ID = $_SESSION['ID'];

                                $resultado = mysqli_query($conn3, "SELECT * FROM sOperacionInv where (idEmpresa = $ID or ID_principal = '{$_SESSION['ID_principal']}') and tipo IN (1, 7) $queryCliente order by numeroDoc");
                                while ($fila = mysqli_fetch_array($resultado)) {
                                    //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>
                                    $nombre_cliente = "";
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $fila[2]");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                        $nombre_cliente = $rowMotorizado['nombre_cliente'];

                                        $telefono_cliente = $rowMotorizado['telefono_cliente'];
                                    }
                                    $tipo = $fila['tipo'];
                                    //$saldo = $fila['totalNeto'] - $fila['montoPagado'];




                                    if ($fila[2] == "-1") {
                                        $nombre_cliente = "*Cliente Contado*";
                                    }

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

                                    $Color = "";
                                    if ($saldo == 0) {
                                        $Color = 'style="background-color:#80e68070"';
                                    } else {
                                        $Color = 'style="background-color:#EA7A7A"';
                                    }

                                    echo '<tr>
                          <td ' . $Color . '>' . $fila['numeroDoc'] . ' </td>
                          <td ' . $Color . '>' . $nombre_cliente . ' </td>
                          <td ' . $Color . '>' . $fila['fechaOperacion'] . '</td>
                          <td ' . $Color . '>' . $fila['fechaVencimiento'] . '</td>
                          <td ' . $Color . '><div align="right">' . number_format($fila['totalNeto'], 2) . '<br>' . $Mensaje_ValorProductoDevuelto . '<br>' . $Mensaje_MontoDevolucion . '</div></td>
                          <td ' . $Color . '><div align="right">' . $fila['cantidadProduc'] . '</div></td>
                          <td ' . $Color . '> <div align="right">  ' . number_format($saldo, 2) . ' </div></td>
                         ';

                                    if ($tipo == "1") :
                                ?>
                                        <td width='10%' <?php echo $Color ?>>
                                            <div class='btn-group'>
                                                <button type='button' class='btn btn-block btn-light rounded-pill  dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    <i class='fa fa-bill'></i> Acciones Factura
                                                </button>
                                                <div class='dropdown-menu'>
                                                    <a class='dropdown-item' href='preliminarFactura?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                                        <button type='button' class='btn btn-block btn-outline-info rounded-pill  btn-block'>
                                                            Preliminar Factura
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item' href='imprimirFactura?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                                        <button type='button' class='btn btn-block btn-outline-success rounded-pill  btn-block'>
                                                            Imprimir Factura
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item' href='ticketPrint?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                                        <button type='button' class='btn btn-block btn-outline-success rounded-pill  btn-block'>
                                                            Imprimir Ticket
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item' href='enviarFactura?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                                        <button type='button' class='btn btn-block btn-outline-danger rounded-pill  btn-block'>
                                                            Enviar Factura
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item' href='DV_GenerarDevolucionFactura?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                                        <button type='button' class='btn btn-block btn-outline-danger rounded-pill  btn-block'>
                                                            Realizar Devolución
                                                        </button>
                                                    </a>

                                                    <a class='dropdown-item' href='DV_ControlDevoluciones?OperacionPrincipal=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                                        <button type='button' class='btn btn-block btn-outline-warning rounded-pill  btn-block'>
                                                            Historial de Devoluciones
                                                        </button>
                                                    </a>

                                                </div>
                                            </div>


                                            <div class='btn-group'>
                                                <button type='button'
                                                    class='btn btn-block btn-outline-success rounded-pill shadow m-1 dropdown-toggle'
                                                    data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    <i class='fa fa-bill'></i> Acción Abono
                                                </button>
                                                <div class='dropdown-menu'>
                                                    <?php
                                                    if ($saldo == 0) {
                                                    ?>
                                                        <a href="?msg=3" style="color:green">
                                                            <button type='button' class='btn btn-warning btn-block' disabled>
                                                                 Pagado
                                                            </button>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a class='dropdown-item'
                                                            href='Abono.php?idOperacion=<?php echo  $fila['idOperacion']; ?>'
                                                            target='_blank'>
                                                            <button type='button'
                                                                class='btn btn-block btn-outline-success rounded-pill shadow m-1 btn-block'>
                                                                Abonar
                                                            </button>
                                                        </a>
                                                    <?php } ?>
                                                    <a class='dropdown-item'
                                                        href='HistorialAbono.php?idOperacion=<?php echo $fila[0]; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-success rounded-pill shadow m-1 btn-block'>
                                                            Historial de Abono
                                                        </button>
                                                    </a>

                                                </div>
                                            </div>

                                        </td>
                                    <?php
                                    endif;
                                    if ($tipo == "7") :
                                    ?>
                                        <td width='10%' <?php echo $Color ?>>
                                            <div class='btn-group btn-block'>
                                                <button type='button' class='btn btn-block btn-light rounded-pill  dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    <i class='fa fa-bill'></i> Acciones Factura
                                                </button>
                                                <div class='dropdown-menu'>
                                                    <a class='dropdown-item' href='OD_PreliminarFactura?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                                        <button type='button' class='btn btn-block btn-outline-info rounded-pill  btn-block'>
                                                            Preliminar Factura
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item' href='OD_ImprimirFactura?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                                        <button type='button' class='btn btn-block btn-outline-success rounded-pill  btn-block'>
                                                            Imprimir Factura
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item' href='ticketPrint?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                                        <button type='button' class='btn btn-block btn-outline-success rounded-pill  btn-block'>
                                                            Imprimir Ticket
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item' href='enviarFactura?idOperacion=<?php echo $fila['idOperacion']; ?>&tipo=odontograma' target='_blank'>
                                                        <button type='button' class='btn btn-block btn-outline-danger rounded-pill  btn-block'>
                                                            Enviar Factura
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item' href='DV_GenerarDevolucionFactura?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                                        <button type='button' class='btn btn-block btn-outline-danger rounded-pill  btn-block'>
                                                            Realizar Devolución
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class='btn-group btn-block mt-1'>
                                                <button type='button'
                                                    class='btn btn-block btn-success rounded-pill dropdown-toggle'
                                                    data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    <i class='fa fa-bill'></i> Acción Abono
                                                </button>
                                                <div class='dropdown-menu'>
                                                    <?php
                                                    if ($saldo == 0) {
                                                    ?>
                                                        <a href="?msg=3" style="color:green">
                                                            <button type='button' class='btn btn-warning btn-block' disabled>
                                                                 Pagado
                                                            </button>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a class='dropdown-item'
                                                            href='Abono.php?idOperacion=<?php echo  $fila['idOperacion']; ?>'
                                                            target='_blank'>
                                                            <button type='button'
                                                                class='btn btn-block btn-outline-success rounded-pill shadow m-1 btn-block'>
                                                                Abonar
                                                            </button>
                                                        </a>
                                                    <?php } ?>
                                                    <a class='dropdown-item'
                                                        href='HistorialAbono.php?idOperacion=<?php echo $fila[0]; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-success rounded-pill shadow m-1 btn-block'>
                                                            Historial de Abono
                                                        </button>
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                <?php
                                    endif;
                                    echo '
                 </tr>';
                                }
                                ?>
                                <a href=""></a>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Numero</th>
                                    <th>Cliente</th>
                                    <th>Fecha Factura</th>
                                    <th>Fecha vencimiento</th>
                                    <th>
                                        <div align="right">Total</div>
                                    </th>
                                    <th>
                                        <div align="right">Cant.</div>
                                    </th>
                                    <th>
                                        <div align="right">Saldo</div>
                                    </th>
                                    <th> </th>
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