<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php'; ?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Registros de Orden de Compras
        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Registros de Orden de Compras</a></li>


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
                        <font calss="text-dark"> Orden Pagado <i class="fa fa-circle" style="color:#80e68070"></i> </font>||
                        <font calss="text-dark"> Orden Pendiente <i class="fa fa-circle" style="color:#FC5E79"></i> </font>||
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Proveedor</th>
                                    <th>Fecha de Orden</th>
                                    <th>Fecha vencimiento</th>
                                    <th>
                                        <div align="right">Total</div>
                                    </th>
                                    <th>
                                        <div align="right">Cant.</div>
                                    </th>
                                    <th>
                                        <div align="right" style="color: red">Saldo</div>
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $ID = $_SESSION['ID'];
                                $idOperacion = $_GET['idOperacion'];

                                $resultado = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where ((idEmpresa = '{$_SESSION['ID']}' or idEmpresa = '{$_SESSION['ID_principal']}') or (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}')) and tipo = 3 order by numeroDoc");
                                //$resultado = mysqli_query($conn3,"SELECT * FROM  sOperacionInv where idEmpresa =$ID and tipo = 3 order by numeroDoc");
                                //$resultado=mysqli_query($conn3,"select * from patients where ID_Doctor = '$ID_DOSTOR'");
                                // $check = mysqli_num_rows($q);

                                while ($fila = mysqli_fetch_array($resultado)) {

                                    $idEmpresa = $fila['idEmpresa'];

                                    $queryList = mysqli_query($conn3, "SELECT * FROM  sproveedores where id = $idEmpresa");
                                    //  echo "SELECT * FROM  sproveedores where id = $fila[32]";
                                    // $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                        $nombre             = $rowMotorizado['nombre'];

                                        $telefono           = $rowMotorizado['telefono'];
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

                                    //$saldo = $fila[12] - $fila[14];
                                    $Color = "";
                                    if ($saldo == "0") {
                                        $Color = 'style="background-color:#80e68070"';
                                    } else {
                                        $Color = 'style="background-color:#EA7A7A"';
                                    }
                                    echo '     <tr>
                  <td ' . $Color . '>' . $fila[1] . ' </td>
                  <td ' . $Color . '>' . $nombre . ' </td>
                  <td ' . $Color . '>' . $fila[4] . '</td>
                  <td ' . $Color . '>' . $fila[5] . '</td>
                  <td ' . $Color . '><div align="right">' . number_format($fila[12], 2) . '<br>' . $Mensaje_ValorProductoDevuelto . '<br>' . $Mensaje_MontoDevolucion . '</div></td>
                  <td ' . $Color . '><div align="right">' . $fila[13] . '</div></td>
                  <td ' . $Color . '> <div align="right">  ' . number_format($saldo, 2) . ' </div></td>
                    
                                        ' ?>
                                    <td width='10%' <?php echo $Color ?>>
                                        <div class='btn-group'>
                                            <button type='button' class='btn btn-block btn-light rounded-pill  dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
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

                                                <a class='dropdown-item' href='DV_GenerarDevolucionCompras.php?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                                    <button type='button' class='btn btn-block btn-outline-danger rounded-pill  btn-block'>
                                                        Realizar Devolución Compras
                                                    </button>
                                                </a>

                                                <a class='dropdown-item' href='DV_ControlDevoluciones.php?OperacionPrincipal=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                                    <button type='button' class='btn btn-block btn-outline-warning rounded-pill  btn-block'>
                                                        Historial de Devoluciones Compras
                                                    </button>
                                                </a>

                                            </div>
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
                                    <th>Fecha de Orden</th>
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
                                    <th></th>
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