<?php
if (isset($_GET['send'])) {
    include("funciones/funciones.php");
    $idOperacion = preparePost($_GET['idOperacion']);
    $usuario_id = $_SESSION['ID'];
    $queryList = mysqli_query($conn3, "SELECT * FROM sOperacionInv where idOperacion = $idOperacion");
    // $nrowl = mysqli_num_rows($queryList);
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $idCliente      = $rowMotorizado['idCliente'];
        $usuario_id_op      = $rowMotorizado['idEmpresa'];
        $totalNeto      = $rowMotorizado['totalNeto'];
    }
    $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");
    // $nrowl = mysqli_num_rows($queryList);
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $nombre_cliente             = rtrim($rowMotorizado['nombre_cliente']);
        $ciudad_cliente             = $rowMotorizado['ciudad_cliente'];
        $correo_cliente             = $rowMotorizado['correo_cliente'];
        $direccion_cliente          = $rowMotorizado['direccion_cliente'];
        $telefono_cliente           = $rowMotorizado['telefono_cliente'];
        $whatsapp           = $rowMotorizado['whatsapp'];
    }
    $Moneda = funcionMaster($usuario_id_op, 'ID_Usuario', 'moneda', 'config');
    $mensajeW = ' Sr(a) *' . $nombre_cliente . '* Se le ha generado un presupuesto por el valor de : *' . $totalNeto . '* *' . $Moneda . '*, para visualizarlo haga Click Aquí: '.$Base.'imprimirPresupuestoCorporal.php?idOperacion=' . $idOperacion . ' para firmar en el siguiente link para confirmar, Link:  '.$Base.'firma/FirmarPresupuesto/' . $idOperacion . ' ';
    $accion = 0;
    Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $idCliente, $usuario_id_op, $whatsapp, $accion);
    echo "<script language='Javascript'> window.location='preliminarpresupuestoCorporal.php?idOperacion={$idOperacion}';</script>";
    exit();
}
include 'header.php';
include 'menu.php';
$idOperacion = $_GET['idOperacion'];
$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
// $nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $idOperacion = $rowMotorizado['idOperacion'];
    $numeroDoc = $rowMotorizado['numeroDoc'];
    $idCliente = $rowMotorizado['idCliente'];
    $idEmpresa = $rowMotorizado['idEmpresa'];
    $fechaOperacion = $rowMotorizado['fechaOperacion'];
    $fechaVencimiento = $rowMotorizado['fechaVencimiento'];
    $subTotal = $rowMotorizado['subTotal'];
    $impuesto      = $rowMotorizado['impuesto'];
    $impuestoBase = $rowMotorizado['impuestoBase'];
    $totalNeto = $rowMotorizado['totalNeto'];
    $totalBruto = $rowMotorizado['totalBruto'];
    $cantidadProduc = $rowMotorizado['cantidadProduc'];
    $descuentos = $rowMotorizado['descuentos'];
    $montoPagado = $rowMotorizado['montoPagado'];
    $nota = $rowMotorizado['nota'];
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
        $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" height="10%" width="10%">';
    }
    // Nuevos campos 
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
    $pagado = '<div align="center"><img src="https://' . $Base . '/pagado.png" height="10%" width="30%"></div>';
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Presupuesto
            <small># 0000<?php echo $numeroDoc ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li class="active"> Presupuesto</li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-header">
                    <?php echo $nombreF ?>
                    <small class="pull-right">Fecha: <?php echo date("d-m-y") ?></small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-md-4 invoice-col">
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
            <div class="col-md-4 invoice-col">
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
            <div class="col-md-4 invoice-col">
                <b>Presupuesto # 0000<?php echo $numeroDoc ?></b><br>
                <b>Fecha Presupuesto:</b> <?php echo $fechaOperacion ?><br>
                <b>Fecha Vencimiento:</b> <?php echo $fechaVencimiento ?><br>
                <b>Sucursal:</b> <?php echo $sucursal ?>
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
            }

            .areas:hover {
                background-color: #b6b7b62b;
            }

            .areas:nth-child(1) {
                height: 82px;
            }

            .areas:nth-child(2) {
                height: 56px;
            }

            .areas:nth-child(3) {
                height: 49px
            }

            .areas:nth-child(4) {
                height: 87px;
            }

            .areas:nth-child(5) {
                height: 58px;
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
           
                <div class="col-md-10">
                    <?php if ($tercioSuperior != '') : ?>
                        <div class="col-md-6 textarea-style tercioSuperiorTextarea">
                            <label for="tercioSuperior">Mamas</label>
                            <p><?= $tercioSuperior ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if ($tercioMedio != '') : ?>
                        <div class="col-md-6 textarea-style tercioMedioTextarea">
                            <label for="tercioMedio">Brazos</label>
                            <p><?= $tercioMedio ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if ($tercioInferior != '') : ?>
                        <div class="col-md-4 textarea-style tercioInferiorTextarea">
                            <label for="tercioInferior">Abdomen y Espalda</label>
                            <p><?= $tercioInferior ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if ($cuelloEscote != '') : ?>
                        <div class="col-md-4 textarea-style cuelloEscoteTextarea">
                            <label for="cuelloEscote">Gluteos</label>
                            <p><?= $cuelloEscote ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if ($pie != '') : ?>
                        <div class="col-md-4 textarea-style pieTextarea">
                            <label for="pie">Piernas</label>
                            <p><?= $pie ?></p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-xs-2">
                    
                        <div class="col-md-12" style="margin: 0; padding: 0; position: relative;">
                            <div class="col-md-12 areas <?= ($tercioSuperior != "" ? 'active' : '') ?>" id="tercioSuperiorTextarea">
                                <p>Mamas</p>
                            </div>
                            <div class="col-md-12 areas <?= ($tercioMedio != "" ? 'active' : '') ?>" id="tercioMedioTextarea">
                                <p>Brazos</p>
                            </div>
                            <div class="col-md-12 areas <?= ($tercioInferior != "" ? 'active' : '') ?>" id="tercioInferiorTextarea">
                                <p>Abdomen y Espalda</p>
                            </div>
                            <img src="./img/presupuestos/corporalSuperior.png" alt="" class="img-fluid" style="width: 100%; height: 200px; position: absolute; left: 0; top: 0;">
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <hr>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin: 0; padding: 0; position: relative;">
                            <div class="col-md-12 areas <?= ($cuelloEscote != "" ? 'active' : '') ?>" id="cuelloEscoteTextarea">
                                <p>Glúteos</p>
                            </div>
                            <div class="col-md-12 areas <?= ($pie != "" ? 'active' : '') ?>" id="pieTextarea">
                                <p>Piernas</p>
                            </div>
                            <img src="./img/presupuestos/corporalInferior.png" alt="" class="img-fluid" style="width: 100%; height: 150px; position: absolute; left: 0; top: 0;">
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
            <div class="col-md-12 table-responsive">
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
                        $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where estado = 1 and id_usuario = $idEmpresa and  id_cliente = $idCliente and idOperacion = $idOperacion order by id");
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
            <div class="col-md-6">
                <p class="text-bold lead">Objetivos:</p>
                <p class="text-bold well well-sm no-shadow" style="background-color: #5b59590f;padding: 20px;margin: 10px;">
                    <?= $objetivos ?>
                </p>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td> <?php echo number_format($total,2) . '' . $moneda ?> </td>
                        </tr>
                        
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
            </div>
            <!-- /.col -->
        </div>
        <div class="col-xs-12" align="center">
            <?php echo $pieF ?>
        </div>
        <div class="row no-print">
            <div class="col-md-6">
                <!-- <a href="imprimirPresupuestoCorporal.php?idOperacion=<?php echo $idOperacion ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a> -->
                <a class="btn btn-block btn-outline-info rounded-pill shadow m-1" target="_blank" href="<?php echo $Base; ?>imprimirPresupuestoCorporal.php?idOperacion=<?php echo $idOperacion ?>">
                    <i class="fa fa-print"></i> Imprimir Presupuesto
                </a>
            </div>

            <div class="col-md-6" align="center">
                <a class="btn btn-block btn-outline-info rounded-pill shadow m-1" target="_blank" href="<?php echo $Base; ?>preliminarpresupuestoCorporal.php?idOperacion=<?php echo $idOperacion ?>&send=true">
                    <i class="fa fa-print"></i> Enviar Presupuesto al paciente
                </a>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <br>
                </div>
            </div>
        </div>
        
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
</div>
<?php include("footer.php") ?>