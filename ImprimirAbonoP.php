<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

$idOperacion = $_GET['idOperacion'];
$idAbono = $_GET['idAbono'];

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where  idOperacion = '$idOperacion' limit 1");
// $nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $idOperacion      = $rowMotorizado['idOperacion'];

    $idCliente      = $rowMotorizado['idCliente'];
    $idEmpresa      = $rowMotorizado['idEmpresa'];
    $ID_Empresa      = $rowMotorizado['ID_Empresa'];



    $totalNeto = $rowMotorizado['totalNeto']; //valor total con descuento
    $montoPagado      = $rowMotorizado['montoPagado'];
    $saldo = ($rowMotorizado['totalNeto'] - $rowMotorizado['montoPagado']);
}

////////////////////////////////////////////////////////////////////////devoluciones////////////////////////////////////////////////////////////////
$ValorProductoDevuelto = 0;
$MontoDevolucion=0;
$ResultDevolucion = mysqli_query($conn3,"SELECT * FROM sOperacionInvDevolucion where idOperacion_principal =$idOperacion");
while ($RowDevolucion = mysqli_fetch_array($ResultDevolucion)) {
    $ValorProductoDevuelto = round($ValorProductoDevuelto+$RowDevolucion['totalNeto'],2);
    $MontoDevolucion = round($MontoDevolucion+$RowDevolucion['MontoDevolucion'],2);
}

$saldodevolucion = ($ValorProductoDevuelto - $MontoDevolucion);
$saldo1 = round($saldo-$saldodevolucion,2);
////////////////////////////////////////////////////////////////////////devoluciones////////////////////////////////////////////////////////////////

//$saldo = $totalNeto - $montoPagado;

$nombre_paciente = funcionMaster($ID_Empresa, 'id', 'nombre', 'sproveedores');


$queryList = mysqli_query($conn3, "SELECT * FROM  abonoP where  id = '$idAbono' ");

// $nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $id = $rowMotorizado['id'];
    $numero_operacion = $rowMotorizado['numero_operacion'];
    $numero_documento = $rowMotorizado['numero_documento'];
    $fecha = $rowMotorizado['fecha'];
    //$hora=$rowMotorizado['hora'];
    $pago = $rowMotorizado['pago'];
    $notas = $rowMotorizado['notas'];
    //$banco=$rowMotorizado['banco'];
    $tarjeta = $rowMotorizado['tarjeta'];
    $cuenta = $rowMotorizado['cuenta'];
    $cliente_id = $rowMotorizado['cliente_id'];
    $valor_abonado = $rowMotorizado['valor_abonado'];
    $fecha_abono = $rowMotorizado['fecha_abono'];
    $timestamp = strtotime($fecha_abono);
    $fecha_formateada = date('d/m/Y', $timestamp);


    $valor_nuevo_factura = $rowMotorizado['valor_nuevo_factura'];
    $firmaC = $rowMotorizado['Firma'];
    $Valor_Factura = funcionMaster($idOperacion, 'idOperacion', 'totalNeto', 'sOperacionInv');
    $saldo = $Valor_Factura - $valor_nuevo_factura;
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario =  $idEmpresa");
// $nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
    $impuestoF = $rowMotorizado['impuestoF'];

    // Nuevos campos

    $nombreF      = $rowMotorizado['nombreF'];
    $header       = $rowMotorizado['header'];


    $LogoF               = $rowMotorizado['logoF'];
    $firma               = $rowMotorizado['firma'];

    if (strlen($LogoF) > 0) {
        $Logo = '<img src="'.$Base.'logos/' . $LogoF . '" height="100" width="100%">';
    }


    if (strlen($firma) > 0) {
        $firmaImg = '<img src="'.$Base.'FirmasReg/' . $firma . '" height="100" width="150">';
    }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $empresaNombre      = $rowMotorizado['empresaNombre'];
        $direccion          = $rowMotorizado['direccion'];
        $especialidad = $rowMotorizado['especialidad'];
    }    
}


$queryList = mysqli_query($conn3, "SELECT * FROM  sproveedores where id = '$ID_Empresa'");
// echo "SELECT * FROM  sproveedores where id = '$ID_Empresa'";

// $nrowl = mysqli_num_rows($queryList);

while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $nombre = $rowMotorizado['nombre'];
  $rut = $rowMotorizado['rut'];
  $correo = $rowMotorizado['correo'];

  $direccion = $rowMotorizado['direccion'];
  $telefono = $rowMotorizado['telefono'];
  $vendedor = $rowMotorizado['vendedor'];
  $nota = $rowMotorizado['nota'];
  $idE = $rowMotorizado['id'];
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

<body >
    <div class="wrapper">
        <div class="col-md-12">

            <div class="box box-solid">

                <div class="row">

                    <div class="col-md-12">

                        <table class="tg" style="undefined;table-layout: fixed; width: 100%">
                            <colgroup>
                                <col style="width:  100%">
                                <col style="width:  100%">
                                <col style="width:  100%">
                                <col style="width:  100%">
                            </colgroup>


                            <tr align="center">
                                <th class="Logo" rowspan="4" align="center"><?php echo $Logo ?> </th>
                                <th class="titulo" colspan="4" rowspan="4" align="center">
                                    <div align="center" style="font-size: 28px""><?php echo $header  ?></div>

                                    <!--<h9 align="center"> <?php echo  $empresaNombre ?> <?php echo   $direccion ?>  </h9></th>-->
                            </tr>

                            <tr>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                    </div>
                    <hr>
                    <div class="row">
                        <h4 align="center"><b> RECIBO DE PAGO DE CUENTA A PAGAR</b></h4>
                        <div class="col-md-12">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-12" style="font-size: 18px">
                            Proveedor: <?php echo $nombre ?><br>
                            RUT: <?php echo $rut ?> </div>

                        <div class="col-xs-12" style="font-size: 18px">
                            Fecha del Pago:
                            <?php if ($fecha_formateada <> '') {
                                echo $fecha_formateada;
                            } else {
                                echo $fecha;
                            }  ?>
                        </DIV>
                        <div class="col-xs-4" style="font-size: 18px">Método de pago:
                            <?php echo funcionMaster($pago,'id','Nombre','Medios_Pago');  ?>
                        </DIV>

                        <div class="col-xs-4" style="font-size: 18px"> Cancelado:
                            <?php echo number_format($valor_abonado,2) .''.$moneda  ?>
                        </DIV>
                        <div class="col-xs-4" style="font-size: 18px"> Pendiente:
                            <?php echo number_format($saldo1,2) .''.$moneda ?>
                        </DIV>
                        <div class="col-xs-12" style="font-size: 18px"> Notas :
                            <?php echo $notas ?>
                        </DIV>
                        <hr>
                    </div>
                    <!-- /.col -->
                </div>
                <br> <br> <!-- /.row -->

                <div class="col-xs-6" align="center">
                    <?php //echo $Fecha 
                    ?>
                </div>

                <div class="col-xs-6" align="center">

                </div>


                <div class="col-xs-6">

                    <strong>Firma del Proveedor</strong> <br>
                    <div class="col-xs-12">
                        <?php if (strlen($firmaC) > 10) {
                            echo "<img src='$firmaC' height='100' width='200'>";
                        } else {
                            echo "<br><br><br>";
                        }


                        ?> <br>
                        <?php echo $nombre_cliente; ?> <br>
                        C.C. <?php echo $CODI_CLIENTE; ?>

                    </div>
                </div>

                <div class="col-xs-6" align="center">
                    <?php
                    echo  $firmaImg;

                    ?>
                    <br>_______________________________________<br>
                    Dr.<?php echo $nombreF ?><br>
                    <?php echo $especialidad ?><br>

                    <b>* Documento firmado digitalmente *</b>
                </div>




                <!-- /.row -->

                <!-- this row will not appear when printing -->
                </section>
                <!-- /.content -->
                <div class="clearfix"></div>
            </div>