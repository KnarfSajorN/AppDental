<?php
include 'header.php';
include 'menu.php'; ?>
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
            Cuentas a Pagar
        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Control de Cuentas a Pagar</a></li>
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
                            <font calss="text-dark"> Cuenta Pagado <i class="fa fa-circle" style="color:#80e68070"></i> </font>||
                            <font calss="text-dark"> Cuenta Pendiente <i class="fa fa-circle" style="color:#FC5E79"></i> </font>||
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Número</th>
                                        <th>Proveedor</th>
                                        <th>RUT</th>
                                        <th>Fecha de Orden</th>
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
                                    if ($_GET['ID_Empresa']) {
                                        $ID_Empresa =  $_GET['ID_Empresa'];
                                        $resultado = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where ((idEmpresa = '{$_SESSION['ID']}' or idEmpresa = '{$_SESSION['ID_principal']}') or (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}')) and tipo = 3 and ID_Empresa = '$ID_Empresa' and (totalNeto - montoPagado) <> 0 order by numeroDoc");
                                    } else {
                                        $resultado = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where ((idEmpresa = '{$_SESSION['ID']}' or idEmpresa = '{$_SESSION['ID_principal']}') or (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}')) and tipo = 3 and (totalNeto - montoPagado) <> 0 order by numeroDoc");
                                    }



                                    // $check = mysqli_num_rows($q);
                                    while ($fila = mysqli_fetch_array($resultado)) {
                                        $firma  = $fila['Firma'];
                                        $ID_Empresa = $fila['ID_Empresa'];
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  sproveedores where id = $ID_Empresa");
                                        // $nrowl = mysqli_num_rows($queryList);
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                            $nombre             = $rowMotorizado['nombre'];
                                            $rut             = $rowMotorizado['rut'];

                                            $telefono           = $rowMotorizado['telefono'];
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
                                        $vence =  $fila['fechaVencimiento'];
                                        $Color = "";
                                        if ($saldo == "0") {
                                            $Color = 'style="background-color:#80e68070"';
                                        } else {
                                            $Color = 'style="background-color:#FC5E79"';
                                        }
                                        echo '     <tr>
                                        <td ' . $Color . '>' . $fila['numeroDoc'] . ' </td>
                                        <td ' . $Color . '>' . $nombre . ' </td>
                                        <td ' . $Color . '>' . $rut . ' </td>
                                        <td ' . $Color . '>' . $fila['fechaOperacion'] . '</td>
                                        <td ' . $Color . '><div align="right">' . number_format($fila['totalNeto'], 2) . '<br>' . $Mensaje_ValorProductoDevuelto . '</div></td>
                                        <td ' . $Color . '><div align="right">' . number_format($fila['montoPagado'], 2) . '<br>' . $Mensaje_MontoDevolucion . '</div></td>
                                        <td ' . $Color . '><div align="right">' . number_format($saldo, 2) . '</div></td>
                                        <td ' . $Color . '><div align="right">' . $fila['cantidadProduc'] . '</div></td> 
                                        ';


                                    ?>
                                        <td width='10%' <?php echo $Color ?>>
                                            <div class='btn-group w-100'>
                                                <button type='button' class='btn btn-block btn-info rounded-pill  dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    <i class='fa fa-bill'></i> Acciones Ordenes
                                                </button>
                                                <div class='dropdown-menu'>
                                                    <a class='dropdown-item' href='preliminarOrden.php?idOperacion=<?php echo  $fila[0]; ?>' target='_blank'>
                                                        <button type='button' class='btn btn-block btn-outline-info rounded-pill  btn-block'>
                                                            Preliminar Orden
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item' href='imprimirOrden.php?idOperacion=<?php echo $fila[0]; ?>' target='_blank'>
                                                        <button type='button' class='btn btn-block btn-outline-success rounded-pill  btn-block'>
                                                            Imprimir Orden
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item' href='enviarOrden.php?idOperacion=<?php echo $fila[0]; ?>' target='_blank'>
                                                        <button type='button' class='btn btn-block btn-outline-danger rounded-pill  btn-block'>
                                                            Enviar Orden
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item' href='ticketPrintOrden.php?idOperacion=<?php echo $fila[0]; ?>' target='_blank'>
                                                        <button type='button' class='btn btn-block btn-outline-warning rounded-pill  btn-block'>
                                                            Imprimir Ticket
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class='btn-group w-100 mt-1'>
                                                <?php
                                                if ($saldo <= 0) {
                                                ?>
                                                    <button type='button' class='btn btn-block btn-success rounded-pill  dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                        <i class='fa fa-bill'></i> Cuenta Pagada
                                                    </button>
                                                    <div class='dropdown-menu'>

                                                        <a class='dropdown-item' href='HistorialAbonoP.php?idOperacion=<?php echo $fila[0]; ?>' target='_blank'>
                                                            <button type='button' class='btn btn-block btn-outline-danger rounded-pill  btn-block'>
                                                                Historial de Pagos
                                                            </button>
                                                        </a>
                                                    </div>
                                                <? } else { ?>

                                                    <button type='button' class='btn btn-block btn-warning rounded-pill  dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                        <i class='fa fa-bill'></i> Acciones Pagos
                                                    </button>
                                                    <div class='dropdown-menu'>
                                                        <a class='dropdown-item' href='AbonoCuentasP.php?idOperacion=<?php echo $fila[0]; ?>' target='_blank'>
                                                            <button type='button' class='btn btn-block btn-outline-success rounded-pill  btn-block'>
                                                                Realizar Pago
                                                            </button>
                                                        </a>
                                                        <a class='dropdown-item' href='HistorialAbonoP.php?idOperacion=<?php echo $fila[0]; ?>' target='_blank'>
                                                            <button type='button' class='btn btn-block btn-outline-danger rounded-pill  btn-block'>
                                                                Historial de Pagos
                                                            </button>
                                                        </a>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    <?php
                                        echo '
                                     </tr>';
                                    }
                                    ?>
                                    <a href=""></a>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Número</th>
                                        <th>Proveedor</th>
                                        <th>RUT</th>
                                        <th>Fecha de Orden</th>
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