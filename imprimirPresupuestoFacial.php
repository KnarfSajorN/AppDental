<?php
date_default_timezone_set('America/Bogota');

include("funciones/conn3.php");
include("funciones/funciones.php");

$idOperacion = $_GET['idOperacion'];

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
// $nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $numeroDoc      = $rowMotorizado['numeroDoc'];
    $idCliente      = $rowMotorizado['idCliente'];
    $idEmpresa      = $rowMotorizado['idEmpresa'];
    $fechaOperacion = $rowMotorizado['fechaOperacion'];
    $fechaVencimiento = $rowMotorizado['fechaVencimiento'];
    $subTotal       = $rowMotorizado['subTotal'];
    $impuesto      = $rowMotorizado['impuesto'];
    $impuestoBase = $rowMotorizado['impuestoBase'];
    $totalNeto      = $rowMotorizado['totalNeto'];
    $totalBruto     = $rowMotorizado['totalBruto'];
    $cantidadProduc = $rowMotorizado['cantidadProduc'];
    $descuentos     = $rowMotorizado['descuentos'];
    $montoPagado    = $rowMotorizado['montoPagado'];
    $nota    = $rowMotorizado['nota'];
    $sucursal = $rowMotorizado['sucursal'];
    $tercioSuperior = $rowMotorizado['tercioSuperior'];
    $tercioMedio = $rowMotorizado['tercioMedio'];
    $tercioInferior = $rowMotorizado['tercioInferior'];
    $cuelloEscote = $rowMotorizado['cuelloEscote'];
    $pie = $rowMotorizado['pie'];
    $objetivos = $rowMotorizado['objetivos'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM config where ID_Usuario = $idEmpresa");
// $nrowl = mysqli_num_rows($queryList);
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

    $LogoF               = $rowMotorizado['logoF'];

    if (strlen($LogoF) > 0) {
        $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" style="height:3cm; width:auto">';
    }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $idEmpresa");
// $nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $empresaNombre      = $rowMotorizado['empresaNombre'];
    $pais               = $rowMotorizado['pais'];

    $ciudad             = $rowMotorizado['ciudad'];
    $direccion          = $rowMotorizado['direccion'];
    $telefono           = $rowMotorizado['telefono'];

    $nit                = $rowMotorizado['nit'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");
// $nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $nombre_cliente             = $rowMotorizado['nombre_cliente'];
    $ciudad_cliente             = $rowMotorizado['ciudad_cliente'];

    $correo_cliente             = $rowMotorizado['correo_cliente'];
    $direccion_cliente          = $rowMotorizado['direccion_cliente'];
    $telefono_cliente           = $rowMotorizado['telefono_cliente'];
    $whatsapp           = $rowMotorizado['whatsapp'];
    $codigo_ciudad           = $rowMotorizado['codigo_ciudad'];
    $CODI_CLIENTE           = $rowMotorizado['CODI_CLIENTE'];
}

$saldo = $totalBruto - $montoPagado;


if ($saldo == 0) {
    $pagado = '<div align="center"><img src="' . $Base . '/pagado.png" height="10%" width="30%"></div>';
}
?>


<?php
$_GET['validar'] = $CODI_CLIENTE;
$_GET['mensaje'] = "Ingrese su Cédula para Visualizar el Contenido de la Impresión";
include 'preventView.php';
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

    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    <style type="text/css">
        html,
        body {
            color-adjust: exact !important;
            -webkit-print-color-adjust: exact !important;
        }

        @media print {

            html,
            body {
                color-adjust: exact !important;
                -webkit-print-color-adjust: exact !important;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!-- Main content -->

        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <?php echo $Logo ?> <?php echo $nombreF ?>
                        <small class="pull-right">Fecha: <?php echo date("d-m-y") ?></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <h4>Datos de la Empresa</h4>
                    <address>
                        <strong>Nombre de la Empresa:</strong><?php echo $nombreF ?><br>
                        <!-- Licencia: <strong> <?php echo $licenciaF ?></strong><br> -->
                        <strong>NIT:</strong> <?php echo $nit ?><br>
                        <strong>Dirección:</strong> <?php echo $direccionF ?> - <?php echo $ciudadPaisF ?><br>
                        <strong> Teléfono:</strong> <?php echo $telefonoF ?><br>
                        <strong> Email:</strong> <?php echo $emailF ?>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <h4>Datos del Cliente</h4>
                    <address>

                        <strong>Nombre: </strong> <?php echo $nombre_cliente ?><br>
                        <strong>Cédula:</strong> <?php echo $CODI_CLIENTE ?> <br>
                        <strong>Dirección:</strong> <?php echo $direccion_cliente ?><br>
                        <strong>Ciudad:</strong> <?php echo $codigo_ciudad ?><br>
                        <strong>Teléfono:</strong> <?php echo $whatsapp ?><br>
                        <strong>Email:</strong> <?php echo $correo_cliente ?>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Presupuesto # 0000<?php echo $idOperacion ?></b><br>
                    <b>Fecha Presupuesto:</b><?php echo $fechaOperacion ?><br>
                    <b>Fecha Vencimiento:</b> <?php echo $fechaVencimiento ?><br>
                    <b>Sucursal:</b> <?php echo funcionMaster($sucursal, 'id', 'descripcion', 'sucursales') ?>
                    <?php echo $pagado ?>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <style type="text/css">
                .areas {
                    display: flex;
                    justify-content: flex-end;
                    align-items: center;
                    font-size: 1em;
                    font-weight: bold;
                    border-bottom: 1px solid #000;
                    text-transform: uppercase;
                    cursor: pointer;
                    z-index: 10000;
                }

                .areas.active {
                    background-color: #b6b7b62b;
                    color-adjust: exact !important;
                    -webkit-print-color-adjust: exact !important;
                }

                .areas:hover {
                    background-color: #b6b7b62b;
                }

                .areas:nth-child(1) {
                    height: 185px;
                }

                .areas:nth-child(2) {
                    height: 30px;
                }

                .areas:nth-child(3) {
                    height: 50px;
                }

                .areas:nth-child(4) {
                    height: 45px;
                }

                .areas:nth-child(5) {
                    height: 45px;
                    border: none;
                }

                .textarea-style {
                    height: 100px;
                    border: none;
                    resize: none;
                    font-size: 1em;
                    display: flex;
                    flex-flow: column;
                    justify-content: center;
                    word-break: break-all;
                }
            </style>

            <div class="row">
                <div class="col-md-12">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-xs-6">
                        <?php if ($tercioSuperior != '') : ?>
                            <div class="col-xs-6 textarea-style tercioSuperiorTextarea">
                                <label for="tercioSuperior">Tercio Superior</label>
                                <p><?= $tercioSuperior ?></p>
                            </div>
                        <?php endif; ?>
                        <?php if ($tercioMedio != '') : ?>
                            <div class="col-xs-6 textarea-style tercioMedioTextarea">
                                <label for="tercioMedio">Tercio Medio</label>
                                <p><?= $tercioMedio ?></p>
                            </div>
                        <?php endif; ?>
                        <?php if ($tercioInferior != '') : ?>
                            <div class="col-xs-6 textarea-style tercioInferiorTextarea">
                                <label for="tercioInferior">Tercio Inferior</label>
                                <p><?= $tercioInferior ?></p>
                            </div>
                        <?php endif; ?>
                        <?php if ($cuelloEscote != '') : ?>
                            <div class="col-xs-6 textarea-style cuelloEscoteTextarea">
                                <label for="cuelloEscote">Cuello y Escote</label>
                                <p><?= $cuelloEscote ?></p>
                            </div>
                        <?php endif; ?>
                        <?php if ($pie != '') : ?>
                            <div class="col-xs-12 textarea-style pieTextarea">
                                <label for="pie">Piel</label>
                                <p><?= $pie ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <div class="col-md-12" style="margin: 0; padding: 0; position: relative;">
                                <div class="col-md-12 areas <?= ($tercioSuperior != "" ? 'active' : '') ?>" id="tercioSuperiorTextarea">
                                    <p>Tercio Superior</p>
                                </div>
                                <div class="col-md-12 areas <?= ($tercioMedio != "" ? 'active' : '') ?>" id="tercioMedioTextarea">
                                    <p>Tercio Medio</p>
                                </div>
                                <div class="col-md-12 areas <?= ($tercioInferior != "" ? 'active' : '') ?>" id="tercioInferiorTextarea">
                                    <p>Tercio Inferior</p>
                                </div>
                                <div class="col-md-12 areas <?= ($cuelloEscote != "" ? 'active' : '') ?>" id="cuelloEscoteTextarea">
                                    <p>Cuello y Escote</p>
                                </div>
                                <div class="col-md-12 areas <?= ($pie != "" ? 'active' : '') ?>" id="pieTextarea">
                                    <p>Piel</p>
                                </div>
                                <img src="./img/presupuestos/facial.png" alt="" class="img-fluid" style="width: 100%; height: 400px; position: absolute; left: 0; top: 0;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <br>
                    </div>
                </div>
            </div>
            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descripción</th>
                                <th>
                                    <div align="Right">Cantidad</div>
                                </th>
                                <th>
                                    <div align="Right">Precio</div>
                                </th>
                                <th>
                                    <div align="Right">Subtotal </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php


                            $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleOper WHERE estado = 1 AND id_usuario = $idEmpresa AND id_cliente = $idCliente AND idOperacion = $idOperacion ORDER BY id");
                            // $check = mysqli_num_rows($q);
                            while ($fila = mysqli_fetch_array($resultado)) {
                                $Numero++;

                                $Descripcion = $fila['descripcion'];
    
                                if($fila["Mas_Detalles"]!=""){
                                    $Descripcion.= ' '.$fila["Mas_Detalles"].'';
                                }
    
                                echo '<tr>
                                    <td  width="5%">' . $Numero . ' </td>
                                    <td width="50%">' . $Descripcion . ' </td>
                                    <td width="5%"><div align="Right">' . $fila['cantidad'] . '</div></td>
                                    <td width="20%"><div align="Right">' . number_format($fila['base'],2) . '' . $moneda . '</div></td>
                                    <td width="20%"><div align="Right">' . number_format($fila['subTotal'],2) . '' . $moneda . '</div></td>
                                </tr>';
                                $totalCant += $fila['cantidad'];
                                $totalBase +=  $fila['base'];
                                $total += $fila['subTotal'];
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                    <p class="text-bold lead">Objetivos:</p>
                    <p class="text-bold well well-sm no-shadow" style="margin-top: 10px;">
                        <?= $objetivos ?>
                    </p>
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                    <div class="table-responsive">
                        <table class="table">
                        <?php
                        if ($impuestoBase > 0) {
                        //$impuestoF2 = $impuestoF / 100;
                        //$total1 =  $total * $impuestoF2;
                        $total1 =  $impuestoBase;
                        //$total =  $total1 + $total;


                        ?>

                        <tr>
                            <th style="width:50%">Impuesto:</th>
                            <td> <?php echo number_format($total1,2) . '' . $moneda ?> </td>
                        </tr>

                        <?php
                        } ?>
                            <tr>
                                <th>Total Presupuesto:</th>
                                <td><?php echo number_format($totalNeto,2) . '' . $moneda ?></td>
                            </tr>
                        </table>
                    </div>
                    <div align="left">Esta cotización tiene una validez por 3 meses</div>
                </div>
                <!-- /.col -->
            </div>
            <div class="col-xs-12" align="center">
                <?php echo $pieF ?>
            </div>
            <!-- /.row -->
            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <a onclick="window.print()"  class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
                </div>
            </div>
        </section>
        <!-- /.content -->
        <div class="clearfix"></div>
    </div>


    <style>
    @media print {
      .no-print {
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
