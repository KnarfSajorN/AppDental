<?php
session_start();
include("funciones/funciones.php");
// $con = conectar();
$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$tipo = $_POST['tipo'];
$ID = $_POST['ID'];

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $ID");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $empresaNombre      = $rowMotorizado['nombreF'];
  $LogoF               = $rowMotorizado['logoF'];
  $moneda               = $rowMotorizado['moneda'];

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
    <title> <?= $empresaNombre ?> </title>
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

  <body>
    <!-- Main content -->
    <div class="row no-print">
      <div class="col-xs-12">
        <a href="<?= $Base; ?>Reportesinventario" class="btn btn-default"> Regresar</a>
        <a href='javascript:window.print(); void 0;' class="btn btn-default"><i class="fa fa-print"></i>
          Imprimir</a>
      </div>
    </div>
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <?= $Logo ?> <?= $empresaNombre ?>
          <small class="pull-right"> Fecha: <?= date("d-m-y") ?></small>
        </h2>
      </div>

      <div class="col-xs-12">

        <?= 'Desde: ' . $desde . '<br> Hasta:' . $hasta ?>
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


        <!-- <div class="col-xs-6 table-responsive">
                <table border="1" class="table table-striped">
                    <thead>

                        <tr style="background: #A4A4A4">
                            <th> Apertura de Caja </th>

                        </tr>
                    </thead>
                    <tr style="background: #A4A4A4">
                        <th> Fecha y hora de apertura </th>
                        <th> Caja Menor de Farmacia </th>
                        <th> Caja Menor de Recepción </th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php

                        // $queryListCli112 = mysqli_query($conn3, "SELECT * FROM  aperturacaja  where Fecha BETWEEN '$desde' and '$hasta' ");
                        // if ($queryListCli112) {
                        //   while ($rowCli112 = mysqli_fetch_array($queryListCli112)) {
                        //     $Fecha    = $rowCli112['Fecha'];
                        //     $Hora   = $rowCli112['Hora'];
                        //     $caja_farmacia     = $rowCli112['caja_farmacia'];
                        //     $caja_recepcion     = $rowCli112['caja_recepcion'];

                        //     echo '<tr>
                        //         <td width="20%">' . $Fecha . '  - ' . $Hora . ' </td>
                        //         <td width="40%">' . number_format($caja_farmacia, 2) . ' </td>
                        //         <td width="40%">' . number_format($caja_recepcion, 2) . ' </td>';
                        //   }
                        // }

                        ?>
                    </tbody>
                </table>
            </div> -->


        <div class="col-xs-12 table-responsive">
          <div class="col-xs-12 ">
            <label> Cuentas a Cobrar</label>
          </div>
          <table class="table table-striped" border="1">
            <thead>
              <tr style="background: #A4A4A4">

                <th> Numero de factura </th>
                <th> Paciente </th>
                <th> Fecha </th>
                <th>
                  <div align="right"> Monto de la factura </div>
                </th>
                <th>
                  <div align="right">Monto pagado</div>
                </th>

                <th>
                  <div align="right">Saldo pendiente</div>
                </th>

                <th> Método de pago </th>



              </tr>
            </thead>
            <tbody>
          <?
          $tipo = $_POST['tipo'];

          if ($tipo == 0) {

            $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}') and fechaOperacion BETWEEN '$desde' and '$hasta' and tipo IN (1, 7) order by numeroDoc asc ");
          
          } elseif ($tipo <> 0) {

            $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv  where (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}') and idCliente = $tipo and fechaOperacion BETWEEN '$desde' and '$hasta' and tipo IN (1, 7) order by numeroDoc asc");
          }

          $nrowl = mysqli_num_rows($queryList);
          while ($rowMotorizado = mysqli_fetch_array($queryList)) {

            $idOperacion = $rowMotorizado['idOperacion'];
            $fechaOperacion      = $rowMotorizado['fechaOperacion'];
            $numeroDoc               = $rowMotorizado['numeroDoc'];

            $totalNeto               = $rowMotorizado['totalNeto'];
            $totalBruto               = $rowMotorizado['totalBruto'];
            $montoPagado               = $rowMotorizado['montoPagado'];

            $montoPendiente = $totalNeto - $montoPagado;
            $idCliente               = $rowMotorizado['idCliente'];



            $MetodosPago = "";
            $QueryMetodosPago = mysqli_query($conn3, "SELECT * FROM  sDetalleMetodosPagos where idOperacion = $idOperacion");
            while ($rowMetodosPago = mysqli_fetch_array($QueryMetodosPago)) {
              $MetodosPago .= $rowMetodosPago['metodo_pago'] . "<br>";
            }
            if ($MetodosPago == "") {
              $MetodosPago = "Ninguno";
            }else{
              $MetodosPago = funcionMaster($MetodosPago,'id','Nombre','Medios_Pago');
            }

            $queryListCli = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");
            $nrowl = mysqli_num_rows($queryListCli);
            while ($rowCli = mysqli_fetch_array($queryListCli)) {
              $nombre_cliente      = $rowCli['nombre_cliente'];
            }
            if ($montoPendiente > 0){
              echo '     <tr>
                  <td width="10%">' . $numeroDoc . ' </td>
                  <td width="20%">' . $nombre_cliente . ' </td>
                  <td width="15%">' . $fechaOperacion . ' </td> 
                  <td width="15%"><div align="right">' . number_format($totalNeto,2) . '</div> </td> 
                  <td width="15%"><div align="right">' . number_format($montoPagado,2) . '</div> </td>
                  <td width="15%"><div align="right">' . number_format($montoPendiente,2) . '</div> </td>
                  <td width="15%">' . $MetodosPago . ' </td>
                 
                </tr>';
            }
            
          }

          ?>


            </tbody>
          </table>




        </div>
        <div class="col-xs-12 table-responsive">
          <div class="col-xs-12 ">
            <label> Ingreso por Medio de Pago</label>
          </div>
          <table class="table table-striped" border="1">
            <thead>
              <tr style="background: #A4A4A4">

                <th> Tipo de Pago </th>
                <th> Total </th>
              </tr>
            </thead>
            <tbody>
              <?php
              
              if ($tipo == 0) {
                $queryList = mysqli_query($conn3, "SELECT mp.Nombre AS MedioPago, SUM(sdmp.nota_pago) AS TotalDinero 
                FROM sDetalleMetodosPagos sdmp 
                left join sOperacionInv sin on sdmp.idOperacion = sin.idOperacion
                INNER JOIN Medios_Pago mp ON sdmp.metodo_pago = mp.id 
                WHERE sdmp.fechaRegistro BETWEEN '$desde' AND '$hasta'
                and (sin.ID_principal = '{$_SESSION['ID']}' or sin.ID_principal = '{$_SESSION['ID_principal']}')
                and sin.tipo IN (1, 7)
                GROUP BY mp.Nombre");
              } elseif ($tipo <> 0) {
                $queryList = mysqli_query($conn3, "SELECT mp.Nombre AS MedioPago, SUM(sdmp.nota_pago) AS TotalDinero 
                FROM sDetalleMetodosPagos sdmp 
                left join sOperacionInv sin on sdmp.idOperacion = sin.idOperacion
                INNER JOIN Medios_Pago mp ON sdmp.metodo_pago = mp.id 
                WHERE sdmp.fechaRegistro BETWEEN '$desde' AND '$hasta'  and sdmp.id_cliente = $tipo
                and (sin.ID_principal = '{$_SESSION['ID']}' or sin.ID_principal = '{$_SESSION['ID_principal']}')
                and sin.tipo IN (1, 7)
                GROUP BY mp.Nombre");
              }
       
     

              if ($queryList) {
                while ($rowMedio = mysqli_fetch_array($queryList)) {
                  $idMedio = $rowMedio['MedioPago'];
                  $total = $rowMedio['TotalDinero'];
                echo '     <tr>
                  <td width="10%">' . $idMedio . ' </td>
                  <td width="20%">' . number_format($total,2) . '</td>';

                }
              }
              // $tipo = $_POST['tipo'];

              // if ($tipo == 0) {
              //   $queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleMetodosPagos where  fechaRegistro BETWEEN '$desde' and '$hasta' ");
              // } elseif ($tipo <> 0) {

              //   $queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleMetodosPagos  where  id_cliente = $tipo and fechaRegistro BETWEEN '$desde' and '$hasta' ");
              // }

              // $nrowl = mysqli_num_rows($queryList);
              // while ($rowMotorizado = mysqli_fetch_array($queryList)) {
              //   $NombrePago      = funcionMaster($rowMotorizado['metodo_pago'],'id','Nombre','Medios_Pago');

              //   echo '     <tr>
              //       <td width="10%">' . $NombrePago . ' </td>


              //     </tr>';
              // }

              ?>


            </tbody>
          </table>



        </div>

        <div class="col-xs-12 table-responsive">
          <div class="col-xs-12 ">
            <label> Pagos realizados</label>
          </div>
          <table class="table table-striped" border="1">
            <thead>
              <tr style="background: #A4A4A4">
                <th> Número de Factura </th>
                <th> Tipo de Pago </th>
                <th> Total </th>
              </tr>
            </thead>
            <tbody>
              <?php
              
              if ($tipo == 0) {
                $queryList = mysqli_query($conn3, "SELECT mp.Nombre AS MedioPago, sdmp.nota_pago AS TotalDinero, sin.*
                FROM sDetalleMetodosPagos sdmp 
                left join sOperacionInv sin on sdmp.idOperacion = sin.idOperacion
                INNER JOIN Medios_Pago mp ON sdmp.metodo_pago = mp.id 
                WHERE sdmp.fechaRegistro BETWEEN '$desde' AND '$hasta'
                and (sin.ID_principal = '{$_SESSION['ID']}' or sin.ID_principal = '{$_SESSION['ID_principal']}')
                and sin.tipo IN (1, 7)
                and sin.totalNeto > 0
                -- GROUP BY mp.Nombre
                ");
              } elseif ($tipo <> 0) {
                $queryList = mysqli_query($conn3, "SELECT mp.Nombre AS MedioPago, sdmp.nota_pago AS TotalDinero, sin.*
                FROM sDetalleMetodosPagos sdmp 
                left join sOperacionInv sin on sdmp.idOperacion = sin.idOperacion
                INNER JOIN Medios_Pago mp ON sdmp.metodo_pago = mp.id 
                WHERE sdmp.fechaRegistro BETWEEN '$desde' AND '$hasta'  and sdmp.id_cliente = $tipo
                and (sin.ID_principal = '{$_SESSION['ID']}' or sin.ID_principal = '{$_SESSION['ID_principal']}')
                and sin.tipo IN (1, 7)
                and sin.totalNeto > 0
                -- GROUP BY mp.Nombre
                ");
              }
       
     

              if ($queryList) {
                while ($rowMedio = mysqli_fetch_array($queryList)) {
                  $idMedio = $rowMedio['MedioPago'];
                  $total = $rowMedio['TotalDinero'];
                echo '     <tr>
                <td width="10%">' . $rowMedio['numeroDoc'] . ' </td>
                  <td width="10%">' . $idMedio . ' </td>
                  <td width="20%">' . number_format($total,2) . '</td>';

                }
              }

              ?>


            </tbody>
          </table>



        </div>
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
<? } elseif ($_POST['submitButton'] == 'excel') {

  header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
  header('Content-Disposition: attachment; filename=ReporteFacturas_' . date("Y-m-d") . '.xls');
?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?= $empresaNombre ?> </title>
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

  <body>
    <!-- Main content -->
    <div class="row no-print">
      <div class="col-xs-12">
        <a href="<?= $Base; ?>Reportesinventario" class="btn btn-default"> Regresar</a>
        <a href='javascript:window.print(); void 0;' class="btn btn-default"><i class="fa fa-print"></i>
          Imprimir</a>
      </div>
    </div>
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <?= $Logo ?> <?= $empresaNombre ?>
          <small class="pull-right"> Fecha: <?= date("d-m-y") ?></small>
        </h2>
      </div>

      <div class="col-xs-12">

        <?= 'Desde: ' . $desde . '<br> Hasta:' . $hasta ?>
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


        <!-- <div class="col-xs-6 table-responsive">
                <table border="1" class="table table-striped">
                    <thead>

                        <tr style="background: #A4A4A4">
                            <th> Apertura de Caja </th>

                        </tr>
                    </thead>
                    <tr style="background: #A4A4A4">
                        <th> Fecha y hora de apertura </th>
                        <th> Caja Menor de Farmacia </th>
                        <th> Caja Menor de Recepción </th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php

                        // $queryListCli112 = mysqli_query($conn3, "SELECT * FROM  aperturacaja  where Fecha BETWEEN '$desde' and '$hasta' ");
                        // if ($queryListCli112) {
                        //   while ($rowCli112 = mysqli_fetch_array($queryListCli112)) {
                        //     $Fecha    = $rowCli112['Fecha'];
                        //     $Hora   = $rowCli112['Hora'];
                        //     $caja_farmacia     = $rowCli112['caja_farmacia'];
                        //     $caja_recepcion     = $rowCli112['caja_recepcion'];

                        //     echo '<tr>
                        //         <td width="20%">' . $Fecha . '  - ' . $Hora . ' </td>
                        //         <td width="40%">' . number_format($caja_farmacia, 2) . ' </td>
                        //         <td width="40%">' . number_format($caja_recepcion, 2) . ' </td>';
                        //   }
                        // }

                        ?>
                    </tbody>
                </table>
            </div> -->


        <div class="col-xs-12 table-responsive">
          <div class="col-xs-12 ">
            <label> Cuentas a Cobrar</label>
          </div>
          <table class="table table-striped" border="1">
            <thead>
              <tr style="background: #A4A4A4">

                <th> Numero de factura </th>
                <th> Paciente </th>
                <th> Fecha </th>
                <th>
                  <div align="right"> Monto de la factura </div>
                </th>
                <th>
                  <div align="right">Monto pagado</div>
                </th>

                <th>
                  <div align="right">Saldo pendiente</div>
                </th>

                <th> Método de pago </th>



              </tr>
            </thead>
            <tbody>
              <?php

              $tipo = $_POST['tipo'];

              if ($tipo == 0) {

                $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where  (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}') and  fechaOperacion BETWEEN '$desde' and '$hasta' and tipo IN (1, 7) order by numeroDoc asc ");
              
              } elseif ($tipo <> 0) {
    
                $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv  where  (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}') and  idCliente = $tipo and fechaOperacion BETWEEN '$desde' and '$hasta' and tipo IN (1, 7) order by numeroDoc asc");
              }

              $nrowl = mysqli_num_rows($queryList);
              while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    
                $idOperacion = $rowMotorizado['idOperacion'];
                $fechaOperacion      = $rowMotorizado['fechaOperacion'];
                $numeroDoc               = $rowMotorizado['numeroDoc'];
    
                $totalNeto               = $rowMotorizado['totalNeto'];
                $totalBruto               = $rowMotorizado['totalBruto'];
                $montoPagado               = $rowMotorizado['montoPagado'];
    
                $montoPendiente = $totalNeto - $montoPagado;
                $idCliente               = $rowMotorizado['idCliente'];
    
    
    
                $MetodosPago = "";
                $QueryMetodosPago = mysqli_query($conn3, "SELECT * FROM  sDetalleMetodosPagos where idOperacion = $idOperacion");
                while ($rowMetodosPago = mysqli_fetch_array($QueryMetodosPago)) {
                  $MetodosPago .= $rowMetodosPago['metodo_pago'] . "<br>";
                  $ArregloMetodosPagos[$rowMetodosPago['metodo_pago']] = $ArregloMetodosPagos[$rowMetodosPago['metodo_pago']] + $rowMetodosPago['nota_pago'];
                }
                if ($MetodosPago == "") {
                  $MetodosPago = "Ninguno";
                }else{
                  $MetodosPago = funcionMaster($MetodosPago,'id','Nombre','Medios_Pago');
                }
    
                $queryListCli = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");
                $nrowl = mysqli_num_rows($queryListCli);
                while ($rowCli = mysqli_fetch_array($queryListCli)) {
                  $nombre_cliente      = $rowCli['nombre_cliente'];
                }
                if ($montoPendiente){
                  echo '     <tr>
                      <td width="10%">' . $numeroDoc . ' </td>
                      <td width="20%">' . $nombre_cliente . ' </td>
                      <td width="15%">' . $fechaOperacion . ' </td> 
                      <td width="15%"><div align="right">' . number_format($totalNeto,2) . '</div> </td> 
                      <td width="15%"><div align="right">' . number_format($montoPagado,2) . '</div> </td>
                      <td width="15%"><div align="right">' . number_format($montoPendiente,2) . '</div> </td>
                      <td width="15%">' . $MetodosPago . ' </td>
                     
                    </tr>';
                }
                
              }
                  ?>


            </tbody>
          </table>




        </div>
        <div class="col-xs-12 table-responsive">
          <div class="col-xs-12 ">
            <label> Ingreso por Medio de Pago</label>
          </div>
          <table class="table table-striped" border="1">
            <thead>
              <tr style="background: #A4A4A4">

                <th> Tipo de Pago </th>
                <th> Total </th>
              </tr>
            </thead>
            <tbody>
            <?php
              
              if ($tipo == 0) {
                $queryList = mysqli_query($conn3, "SELECT mp.Nombre AS MedioPago, SUM(sdmp.nota_pago) AS TotalDinero 
                FROM sDetalleMetodosPagos sdmp 
                left join sOperacionInv sin on sdmp.idOperacion = sin.idOperacion
                INNER JOIN Medios_Pago mp ON sdmp.metodo_pago = mp.id 
                WHERE sdmp.fechaRegistro BETWEEN '$desde' AND '$hasta'
                and (sin.ID_principal = '{$_SESSION['ID']}' or sin.ID_principal = '{$_SESSION['ID_principal']}')
                and sin.tipo IN (1, 7)
                GROUP BY mp.Nombre");
              } elseif ($tipo <> 0) {
                $queryList = mysqli_query($conn3, "SELECT mp.Nombre AS MedioPago, SUM(sdmp.nota_pago) AS TotalDinero 
                FROM sDetalleMetodosPagos sdmp 
                left join sOperacionInv sin on sdmp.idOperacion = sin.idOperacion
                INNER JOIN Medios_Pago mp ON sdmp.metodo_pago = mp.id 
                WHERE sdmp.fechaRegistro BETWEEN '$desde' AND '$hasta'  and sdmp.id_cliente = $tipo
                and (sin.ID_principal = '{$_SESSION['ID']}' or sin.ID_principal = '{$_SESSION['ID_principal']}')
                and sin.tipo IN (1, 7)
                GROUP BY mp.Nombre");
              }
       
     

              if ($queryList) {
                while ($rowMedio = mysqli_fetch_array($queryList)) {
                  $idMedio = $rowMedio['MedioPago'];
                  $total = $rowMedio['TotalDinero'];
                echo '     <tr>
                  <td width="10%">' . $idMedio . ' </td>
                  <td width="20%">' . number_format($total,2) . '</td>';

                }
              }
              // $tipo = $_POST['tipo'];

              // if ($tipo == 0) {
              //   $queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleMetodosPagos where  fechaRegistro BETWEEN '$desde' and '$hasta' ");
              // } elseif ($tipo <> 0) {

              //   $queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleMetodosPagos  where  id_cliente = $tipo and fechaRegistro BETWEEN '$desde' and '$hasta' ");
              // }

              // $nrowl = mysqli_num_rows($queryList);
              // while ($rowMotorizado = mysqli_fetch_array($queryList)) {
              //   $NombrePago      = funcionMaster($rowMotorizado['metodo_pago'],'id','Nombre','Medios_Pago');

              //   echo '     <tr>
              //       <td width="10%">' . $NombrePago . ' </td>


              //     </tr>';
              // }

              ?>


            </tbody>
          </table>



        </div>

        <div class="col-xs-12 table-responsive">
          <div class="col-xs-12 ">
            <label> Pagos realizados</label>
          </div>
          <table class="table table-striped" border="1">
            <thead>
              <tr style="background: #A4A4A4">
                <th> Número de Factura </th>
                <th> Tipo de Pago </th>
                <th> Total </th>
              </tr>
            </thead>
            <tbody>
              <?php
              
              if ($tipo == 0) {
                $queryList = mysqli_query($conn3, "SELECT mp.Nombre AS MedioPago, sdmp.nota_pago AS TotalDinero, sin.*
                FROM sDetalleMetodosPagos sdmp 
                left join sOperacionInv sin on sdmp.idOperacion = sin.idOperacion
                INNER JOIN Medios_Pago mp ON sdmp.metodo_pago = mp.id 
                WHERE sdmp.fechaRegistro BETWEEN '$desde' AND '$hasta'
                and (sin.ID_principal = '{$_SESSION['ID']}' or sin.ID_principal = '{$_SESSION['ID_principal']}')
                and sin.tipo IN (1, 7)
                and sin.totalNeto > 0
                -- GROUP BY mp.Nombre
                ");
              } elseif ($tipo <> 0) {
                $queryList = mysqli_query($conn3, "SELECT mp.Nombre AS MedioPago, sdmp.nota_pago AS TotalDinero, sin.*
                FROM sDetalleMetodosPagos sdmp 
                left join sOperacionInv sin on sdmp.idOperacion = sin.idOperacion
                INNER JOIN Medios_Pago mp ON sdmp.metodo_pago = mp.id 
                WHERE sdmp.fechaRegistro BETWEEN '$desde' AND '$hasta'  and sdmp.id_cliente = $tipo
                and (sin.ID_principal = '{$_SESSION['ID']}' or sin.ID_principal = '{$_SESSION['ID_principal']}')
                and sin.tipo IN (1, 7)
                and sin.totalNeto > 0
                -- GROUP BY mp.Nombre
                ");
              }
       
     

              if ($queryList) {
                while ($rowMedio = mysqli_fetch_array($queryList)) {
                  $idMedio = $rowMedio['MedioPago'];
                  $total = $rowMedio['TotalDinero'];
                echo '     <tr>
                <td width="10%">' . $rowMedio['numeroDoc'] . ' </td>
                  <td width="10%">' . $idMedio . ' </td>
                  <td width="20%">' . number_format($total,2) . '</td>';

                }
              }

              ?>


            </tbody>
          </table>



        </div>

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