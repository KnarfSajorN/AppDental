<?php

include("funciones/conn3.php");
include("funciones/funciones.php");

date_default_timezone_set('America/Bogota');

$cortex_id = $_GET['id'];


$queryList = mysqli_query($conn3, "SELECT * FROM Cortes where id = $cortex_id");
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
  
}


$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $idUsuario");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $empresaNombre      = $rowMotorizado['empresaNombre'];
}


$QueryAperturaCaja = mysqli_query($conn3, "SELECT * FROM AperturaCaja WHERE CierreCaja_id='$cortex_id' LIMIT 1");
$NrowApertura=mysqli_num_rows($QueryAperturaCaja);

if($NrowApertura>0){
    $RowAperturaCaja = mysqli_fetch_assoc($QueryAperturaCaja);
    // Acceder a los valores de montoApertura e id
    $MontoApertura = $RowAperturaCaja['MontoApertura'];
    $AperturaCaja_id = $RowAperturaCaja['id'];
}


if (strlen($Firma_Modulo) > 10) {
$Firma = "<img src='$Firma_Modulo' height='125' width='250'> <br>__________________________________ <br>$Firma_Datos";
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
  <div class="wrapper">
    <!-- Main content -->

    <!-- Main content -->
    <section class="container-fluid">
      <!-- title row -->
      <div class="row">
        <!-- /.col -->


        <div class="col-sm-12">
          <b>Corte # <?php echo $cortex_id ?></b><br>
          <b>Turno: <?php echo $Turno ?></b><br>
          <b>Fecha: </b><?php echo $Fecha . ' ' . $Hora ?><br>
          <hr>
          <b>Monto de Apertura: </b><?php echo $MontoApertura;?><br>
        </div>

        <div class="row">
            <br>    
          <div class="col-xs-12">
            
          <table id="TablaCortesX" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Método de Pago</th>
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

                                                foreach ($ArregloMediosPago as $key => $value) {
                                                    
                                                    echo "<tr>";
                                                    echo "<td>".$value['Nombre'],"</td>";
                                                    echo "<td>".$pagos[$key]."</td>";
                                                    echo "</tr>";


                                                $TotalFinalCorteRegistrado += $pagos[$key];
                                                }
                                            


                                                echo "<tr>";
                                                    echo "<td><label class='control-label'><strong>Total</strong></label></td>";
                                                    echo "<td>".$TotalFinalCorteRegistrado."</td>";
                                                    echo "</tr>";


                                                ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Método de Pago</th>
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
        <br>
        <button class="boton-impreso btn btn-primary btn-lg" onclick="window.location.href='pos'" style="width:100%;">Ir a POS</button>
    </section>
    </div>
</body>
<style>
        /* Estilos para ocultar el botón en la versión impresa */
        @media print {
            .boton-impreso {
                display: none;
            }
        }
</style>
<script type="text/javascript">
    printHTML();

    function printHTML() {
        if (window.print) {
            window.print();
        }
    }
</script>