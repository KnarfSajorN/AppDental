<?php

include("funciones/conn3.php");
include("funciones/funciones.php");

date_default_timezone_set('America/Bogota');

$cortex = $_GET['cortex'];


$queryList = mysqli_query($conn3, "SELECT * FROM Cortes where id = $cortex");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $Fecha = $rowMotorizado['Fecha'];
  $Hora = $rowMotorizado['Hora'];
  $Turno = $rowMotorizado['Turno'];
  $idUsuario = $rowMotorizado['usuario_id'];

  $impuestoBase = $rowMotorizado['impuestoBase'];
  $totalNeto = $rowMotorizado['totalNeto'];
  $totalBruto = $rowMotorizado['totalBruto'];
  $nota = $rowMotorizado['Notas'];
  $montoPagado = $rowMotorizado['montoPagado'];
  $pos = $rowMotorizado['Pos'];

  $pagos = json_decode($rowMotorizado['MediosPago'], true);

  $Firma_Modulo = $rowMotorizado['Firma'];
  $Firma_Datos = $rowMotorizado['Firma_Datos'];
  $Logo = $rowMotorizado['Logo'];

}



$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $idUsuario");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $empresaNombre      = $rowMotorizado['empresaNombre'];
}


if (strlen($Firma_Modulo) > 10) {
    $Firma = "<img src='$Firma_Modulo' height='125' width='250'> <br>__________________________________ <br>$Firma_Datos";
}

    if (strlen($Logo) > 0) {
        $Logo = "<img src='$Logo' height='125' width='125'>";
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

    <div class="page-header row" style="text-align: center">
        <div class="col-5" align="left"><?php echo $Logo ?></div>

        <div class="col-7" style="font-size: 50px;text-align: right;"><?php echo nl2br($header) ?></div>

        <button type="button" onClick="window.print()" style='background: rgb(250,235,215);background: -moz-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: -webkit-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" #faebd7",endColorstr="#3c8db0" ,GradientType=1);'>
            </button>
    </div>

  <div class="wrapper">

    <!-- Main content -->

    <!-- Main content -->
    <section class="container-fluid">
      <!-- title row -->
      <div class="row">
        <!-- /.col -->


        <div class="col-sm-12">
          <b><?php echo $Logo ?></b><br>
          <b>Corte # <?php echo $cortex ?></b><br>
          <b>Turno: <?php echo $Turno ?></b><br>
          <b>Fecha: </b><?php echo $Fecha . ' ' . $Hora ?><br>
        </div>

        <div class="row">
            <br>    
          <div class="col-xs-12">
            
          <table id="TablaCortesX" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Método de Pago</th>
                            <th>Total en Caja</th>
                            <th>Total Registrado</th>
                        </tr>
                    </thead>
                    <tbody>
                                        <?php

                                            $ArregloMediosPago=[];

                                            $QueryMedioPago = mysqli_query($conn3, "SELECT * FROM Medios_Pago WHERE  Activo = '1'");
                                            while ($RowMedioPago = mysqli_fetch_array($QueryMedioPago)) {

                                                $MedioPago_id = $RowMedioPago['id'];
                                                $Nombre_MedioPago = $RowMedioPago['Nombre'];

                                                $ArregloMediosPago[$MedioPago_id]["Nombre"]=$Nombre_MedioPago;
                                                $ArregloMediosPago[$MedioPago_id]["Valor"]="0";

                                            }

                                            
                                            $QueryOperacion = mysqli_query($conn3, "SELECT * FROM sOperacionInv WHERE Corte = '$cortex' ");
                                            while ($RowOperacion = mysqli_fetch_assoc($QueryOperacion)) {
                                                $idOperacion = $RowOperacion['idOperacion'];

                                                $QueryPagos = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE idOperacion = '$idOperacion' ");
                                                while ($RowPagos = mysqli_fetch_assoc($QueryPagos)) {
                                                    $metodo_pago = $RowPagos['metodo_pago'];
                                                    $ArregloMediosPago[$metodo_pago]["Valor"]+= $RowPagos['nota_pago'];
                                                }

                                            }
                                                foreach ($ArregloMediosPago as $key => $value) {
                                                    
                                                    echo "<tr>";
                                                    echo "<td>".$value['Nombre'],"</td>";
                                                    echo "<td>".number_format($value['Valor'], 0, ',', '.')."</td>";
                                                    echo "<td>".$pagos[$key]."</td>";
                                                    echo "</tr>";


                                                $TotalFinalCaja += $value['Valor'];
                                                $TotalFinalCorteRegistrado += $pagos[$key];
                                                }
                                            


                                                echo "<tr>";
                                                    echo "<td><label class='control-label'><strong>Total</strong></label></td>";
                                                    echo "<td>".number_format($TotalFinalCaja, 0, ',', '.')."</td>";
                                                    echo "<td>".$TotalFinalCorteRegistrado."</td>";
                                                    echo "</tr>";


                                                ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Método de Pago</th>
                            <th>Total en Caja</th>
                            <th>Total Registrado</th>
                        </tr>
                    </tfoot>
                </table>
                
                <div class="col-xs-12">
                    <p class="lead">
                        <font size="2">Comentarios:</font>
                    </p>


                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                        <font size="2"><?php echo $nota; ?></font>
                    </p>
                </div>

                <div class="col-xs-12">
                    <p class="lead">
                        <font size="2">Firma:</font>
                    </p>


                    <?php
                        echo  $Firma;
                    ?>
                </div>
                

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
    </section>
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

  <?php include 'PiedePaginasReportes.php'; ?>