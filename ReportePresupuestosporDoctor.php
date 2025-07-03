<?php
date_default_timezone_set('America/Bogota');
include ("funciones/funciones.php");
include ("funciones/conn3.php");
session_start();
$idUsuarioP = $_SESSION['ID_principal'];
$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$tipo = $_POST['tipo'];
$ID = $_POST['ID'];


$queryList = mysqli_query($conn3, "SELECT * FROM  config where (ID_Usuario = $ID or ID_Usuario = '{$_SESSION['ID_principal']}')");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $empresaNombre = $rowMotorizado['nombreF'];
    $LogoF = $rowMotorizado['logoF'];

    if (strlen($LogoF) > 0) {
        $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" height="10%" width="10%">';
    }
}

if ($_POST['submitButton'] == 'generar') {
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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    </head>

    <body>
        <!-- Main content -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="<?php echo $Base; ?>Reportesfacturacion" class="btn btn-default"> Regresar</a>
                <a href='javascript:window.print(); void 0;' class="btn btn-default"><i class="fa fa-print"></i>
                    Imprimir</a>
            </div>
        </div>
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <?php echo $Logo ?>     <?php echo $empresaNombre ?>
                    <small class="pull-right"> Fecha: <?php echo date("d-m-y") ?></small>
                </h2>
            </div>

            <div class="col-xs-12">

                <?php echo 'Desde: ' . $desde . '<br> Hasta:' . $hasta ?>
                <?php
                $docName = funcionMaster($tipo, 'ID', 'NOMBRE_USUARIO', 'usuarios');
                $tipo = $_POST['tipo'];

                if ($_POST['tipo'] <> 0) {
                    echo '<br>Doctor: ' . $docName;
                } elseif ($_POST['tipo'] == 0) {
                    echo '<br> Todos';
                }
                ?>


            </div>


            <!-- /.col -->
        </div>
        <!-- info row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped" border="1">
                    <thead>
                        <tr style="background: #A4A4A4">

                            <th> Numero de factura </th>
                            <th> Paciente </th>
                            <th> Fecha </th>
                            <th> Cantidad de productos </th>
                            <th> Sub total </th>
                            <th> Impuesto </th>
                            <th> Descuento </th>
                            <th> Total </th>
                            
                            <th> Monto pendiente </th>
                            <th> Abono </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$totalAbonado = 0;
                        $tipo = $_POST['tipo'];

                        if ($tipo == 0) {

                            $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where ID_principal = $idUsuarioP and fechaOperacion BETWEEN '$desde' and '$hasta' and tipo IN (2,4,5,6) ");

                        } elseif ($tipo <> 0) {

                            $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv  where idEmpresa = $tipo and fechaOperacion BETWEEN '$desde' and '$hasta' and tipo IN (2,4,5,6) ");

                        }



                        $nrowl = mysqli_num_rows($queryList);
                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                            $fechaOperacion = $rowMotorizado['fechaOperacion'];
                            $numeroDoc = $rowMotorizado['numeroDoc'];
                            $subTotal = $rowMotorizado['subTotal'];
                            $impuesto = $rowMotorizado['impuesto'];
                            $totalBruto = $rowMotorizado['totalBruto'];
                            $descuentos = $rowMotorizado['descuentos'];
                            $totalNeto = $rowMotorizado['totalNeto'];
                            $montoPagado = $rowMotorizado['montoPagado'];
                            $cantidadProduc = $rowMotorizado['cantidadProduc'];
                            $idCliente = $rowMotorizado['idCliente'];
                            $idOperacion = $rowMotorizado['idOperacion'];

                            $montoPendiente = $totalNeto - $montoPagado;
                            //$abono = funcionMaster($idOperacion, 'numero_operacion', 'valor_abonado', 'abono');


                            //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                            $Numero++;

                            $queryListCli = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");

                            while ($rowCli = mysqli_fetch_array($queryListCli)) {

                                $nombre_cliente = $rowCli['nombre_cliente'];
                            }

                            $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where id_usuario = $ID and  id_cliente = $idCliente and idOperacion = 6 order by id");
                            //$resultado=mysql_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");
                    

                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                                $Numero++;
                                $total += $fila[9];
                            }

                            
                            $queryAbono = mysqli_query($conn3, "SELECT valor_abonado FROM  abono WHERE cliente_id = $idCliente and numero_operacion = $idOperacion ");
                            $abono = [];
                            $sumatotal = 0;
                            while ($rowAbono = mysqli_fetch_assoc($queryAbono)) {

                                $sumatotal += $rowAbono['valor_abonado'];
                            }
                            
                            




                            echo '     <tr>
                  <td width="1%">' . $numeroDoc . ' </td>
                  <td width="10%">' . $nombre_cliente . ' </td>
                  <td width="5%">' . $fechaOperacion . ' </td>
                  <td width="2%">' . $cantidadProduc . '  </td>
                  <td width="5%">' . number_format($totalBruto,2) . ' </td>
                  <td width="5%">' . number_format($impuesto,2) . ' </td>
                  <td width="5%">' . number_format($descuentos,2) . ' </td>
                  <td width="5%">' . number_format($totalNeto,2) . ' </td>
                  
                  <td width="5%">' . number_format($montoPendiente, 2). ' </td>
                  <td width="5%">' . number_format($sumatotal,2) . ' </td>
                </tr>';
                $totalAbonado += $sumatotal;
                        }
                        echo '<tr>
          <td colspan="8"></td>
          <td><strong>Monto total abonado:</strong></td>
          <td style="background: #A4A4A4">' . number_format($totalAbonado, 2) . '</td>
        </tr>';
                        echo '</table>'
                        ;
                        ?>


                    </tbody>
                </table>




            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- /.row -->

        <!-- this row will not appear when printing -->


        <!-- /.content -->
        </div>
        <!-- ./wrapper -->
    </body>

    </html>
<?
} elseif ($_POST['submitButton'] == 'excel') {
    header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
    header('Content-Disposition: attachment; filename=ReportePresupuestos' . date("Y-m-d") . '.xls');
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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    </head>

    <body>
        <!-- Main content -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="<?php echo $Base; ?>Reportesfacturacion" class="btn btn-default"> Regresar</a>
                <a href='javascript:window.print(); void 0;' class="btn btn-default"><i class="fa fa-print"></i>
                    Imprimir</a>
            </div>
        </div>
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <?php echo $Logo ?>     <?php echo $empresaNombre ?>
                    <small class="pull-right"> Fecha: <?php echo date("d-m-y") ?></small>
                </h2>
            </div>

            <div class="col-xs-12">

                <?php echo 'Desde: ' . $desde . '<br> Hasta:' . $hasta ?>
                <?php
                $tipo = $_POST['tipo'];

                if ($_POST['tipo'] <> 0) {
                    echo '<br>Cliente: ' . $tipo;
                } elseif ($_POST['tipo'] == 0) {
                    echo '<br> Todos';
                }
                ?>


            </div>


            <!-- /.col -->
        </div>
        <!-- info row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped" border="1">
                    <thead>
                        <tr style="background: #A4A4A4">

                            <th> Numero de factura </th>
                            <th> Paciente </th>
                            <th> Fecha </th>
                            <th> Cantidad de productos </th>
                            <th> Sub total </th>
                            <th> Impuesto </th>
                            <th> Descuento </th>
                            <th> Total </th>
                            <th> Monto pagado </th>
                            <th> Abono </th>
                            <th> Monto pendiente </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $tipo = $_POST['tipo'];

                        if ($tipo == 0) {

                            $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where ((idEmpresa = '{$_SESSION['ID']}' or idEmpresa = '{$_SESSION['ID_principal']}') or (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}')) and fechaOperacion BETWEEN '$desde' and '$hasta' and tipo IN (2,4,5,6) ");

                        } elseif ($tipo <> 0) {

                            $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv  where (idEmpresa = $ID or idEmpresa = '{$_SESSION['ID_principal']}') and idCliente = $tipo and fechaOperacion BETWEEN '$desde' and '$hasta' and tipo IN (2,4,5,6) ");

                        }



                        $nrowl = mysqli_num_rows($queryList);
                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                            $fechaOperacion = $rowMotorizado['fechaOperacion'];
                            $numeroDoc = $rowMotorizado['numeroDoc'];
                            $subTotal = $rowMotorizado['subTotal'];
                            $impuesto = $rowMotorizado['impuesto'];
                            $totalBruto = $rowMotorizado['totalBruto'];
                            $descuentos = $rowMotorizado['descuentos'];
                            $totalNeto = $rowMotorizado['totalNeto'];
                            $montoPagado = $rowMotorizado['montoPagado'];
                            $cantidadProduc = $rowMotorizado['cantidadProduc'];
                            $idCliente = $rowMotorizado['idCliente'];
                            $idOperacion = $rowMotorizado['idOperacion'];

                            $montoPendiente = $totalNeto - $montoPagado;
                            $abono = funcionMaster($idOperacion, 'numero_operacion', 'valor_abonado', 'abono');


                            //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                            $Numero++;

                            $queryListCli = mysqli_query($conn3, "SELECT * FROM  cliente where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and cliente_id = $idCliente");

                            while ($rowCli = mysqli_fetch_array($queryListCli)) {

                                $nombre_cliente = $rowCli['nombre_cliente'];
                            }

                            $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where (id_usuario = $ID or id_usuario = '{$_SESSION['ID_principal']}') and id_cliente = $idCliente and idOperacion = 6 order by id");
                            //$resultado=mysql_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");
                    

                            while ($fila = mysqli_fetch_array($resultado, MYSQLI_NUM)) {
                                //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                                $Numero++;




                                $total += $fila[9];
                            }








                            echo '     <tr>
                  <td width="1%">' . $numeroDoc . ' </td>
                  <td width="10%">' . $nombre_cliente . ' </td>
                  <td width="5%">' . $fechaOperacion . ' </td>
                  <td width="2%">' . $cantidadProduc . '  </td>
                  <td width="5%">' . $totalBruto . ' </td>
                  <td width="5%">' . $impuesto . ' </td>
                  <td width="5%">' . $descuentos . ' </td>
                  <td width="5%">' . $totalNeto . ' </td>
                  <td width="5%">' . $montoPagado . ' </td>
                  <td width="5%">' . $abono . ' </td>
                  <td width="5%">' . $montoPendiente . ' </td>
                 
                </tr>';
                        }

                        ?>


                    </tbody>
                </table>




            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- /.row -->

        <!-- this row will not appear when printing -->


        <!-- /.content -->
        </div>
        <!-- ./wrapper -->
    </body>

    </html>
<? }


?>