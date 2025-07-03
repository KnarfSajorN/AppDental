<?php
include 'funciones/conn3.php';
include 'funciones/funciones.php';

$idOperacion = $_GET['idOperacion'];

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $idOperacion      = $rowMotorizado['idOperacion'];
    //$numeroDoc      = $rowMotorizado['numeroDoc'];
    $idCliente      = $rowMotorizado['idCliente'];
    $idEmpresa      = $rowMotorizado['idEmpresa'];
    $fechaOperacion      = $rowMotorizado['fechaOperacion'];
    $fechaVencimiento      = $rowMotorizado['fechaVencimiento'];
    $subTotal      = $rowMotorizado['subTotal'];
    $impuesto      = $rowMotorizado['impuesto'];
    //$totalNeto      = $rowMotorizado['totalNeto'];
    //$totalBruto      = $rowMotorizado['totalBruto'];
    $montoPagado      = $rowMotorizado['montoPagado'];
    $nota      = $rowMotorizado['nota'];

    $descuentos = $rowMotorizado['descuentos'];
    $Tipo_Descuento = $rowMotorizado['Tipo_Descuento'];

    $totalBruto      = $rowMotorizado['totalBruto'];
    $totalNeto      = $rowMotorizado['totalNeto'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $idEmpresa");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
    $impuestoF = $rowMotorizado['impuestoF'];
    $nombreF = $rowMotorizado['nombreF'];
    $telefonoF = $rowMotorizado['telefonoF'];
    $direccionF = $rowMotorizado['direccionF'];
    $emailF = $rowMotorizado['emailF'];
    $ciudadPaisF = $rowMotorizado['ciudadPaisF'];
    $licenciaF = $rowMotorizado['licenciaF'];

    $pieF         = $rowMotorizado['pieF'];
    $header       = $rowMotorizado['header'];
    $LogoF        = $rowMotorizado['logoF'];

    if (strlen($LogoF) > 0) {
        $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
    }
}



$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $idEmpresa");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $empresaNombre      = $rowMotorizado['empresaNombre'];
    $pais               = $rowMotorizado['pais'];

    $ciudad             = $rowMotorizado['ciudad'];
    $direccion          = $rowMotorizado['direccion'];
    $telefono           = $rowMotorizado['telefono'];

    $nit                = $rowMotorizado['nit'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente ");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
    $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $entidadSalud = $rowMotorizado['entidadSalud'];
    $entidadSalud = funcionMaster($rowMotorizado['entidad_id'],'id','Nombre','Rips_Entidades');
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $genero = $rowMotorizado['genero'];
}

$saldo = $totalBruto - $montoPagado;

// a la variable saldo se le resta el monto pagado y se le suma el total neto y se le resta el descuento si es que tiene uno
if($Tipo_Descuento=="Numerico")
{
    $saldo = $totalBruto - $montoPagado - $descuentos;
    $Icono=" ".$moneda;
}
else if($Tipo_Descuento=="Porcentaje")
{
    $saldo = $totalBruto - $montoPagado - ($totalBruto * ($descuentos / 100));
    $Icono="%";
}
else{
    $saldo=$totalBruto - $montoPagado ;
}

if ($saldo == 0) {
    $pagado = '<div align="center"><img src="' . $Base . '/pagado.png" height="10%" width="15%"></div>';
}

function Edad_Paciente($fecha_nacimiento)
{
    $nacimiento = new DateTime($fecha_nacimiento);
    $ahora = new DateTime(date("Y-m-d"));
    $diferencia = $ahora->diff($nacimiento);
    return $diferencia->format("%y");
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
    <link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">
</head>

<body>

    <div class="page-header row" style="text-align: center">
        <div class="col-5" align="left"><?php echo $Logo ?></div>

        <div class="col-7" style="font-size: 15px;text-align: right;"><?php echo nl2br($header) ?></div>

        <button type="button" onClick="window.print()" style='background: rgb(250,235,215);background: -moz-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: -webkit-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" #faebd7",endColorstr="#3c8db0" ,GradientType=1);'>
            IMPRIMIR!
        </button>
    </div>

    <div class="page-footer">
        <?php echo nl2br($pieF); ?>
    </div>

    <table>

        <thead>
            <tr>
                <td>
                    <!--place holder for the fixed-position header-->
                    <div class="page-header-space"></div>
                </td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <!--*** CONTENT GOES HERE ***-->
                    <div class="page" style="width:100vw;">
                        <table class="table" style="width: 100%;margin-top: 3px;">
                            <tr>
                                <td width="35%">
                                    <b>Nombre:</b> <?php echo $nombre_cliente ?>
                                </td>
                                <td width="30%">
                                    <b>Documento:</b> <?php echo $CODI_CLIENTE ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <b>F.Nacimiento:</b> <?php echo  $fechaNacimiento ?>
                                </td>
                                <td width="15%">
                                    <b>Edad:</b> <?php echo  Edad_Paciente($fechaNacimiento) . " Años" ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b>Residencia:</b> <?php echo $direccion_cliente  ?>
                                </td>
                                <td>
                                    <b>EPS:</b> <?php echo $entidadSalud  ?>
                                </td>
                            </tr>
                            <tr style="border-bottom-width: 1px;">
                                <td>
                                    <b>Teléfono:</b> <?php echo $celular_cliente ?>
                                </td>
                                <td>
                                    <b>Género:</b> <?php echo $genero ?>
                                </td>
                            </tr>
                        </table>

                        <b>Factura</b> # 0000<?php echo $numeroDoc ?>
                        <br>
                        <b>Fecha Factura:</b><?php echo $fechaOperacion ?>
                        <br>
                        <b>Fecha Vencimiento:</b> <?php echo $fechaVencimiento ?>
                        <br>
                        
                        <hr style="border-top: 1px solid black;opacity: 1;">

                        <!-- comienzo de la impresion de la informacion-->
                        <?php $tabla[3] = "<div class=\"col-3\" style=\"padding-bottom: 10px;\">";
                        $tabla[6] = "<div class=\"col-6\" style=\"padding-bottom: 10px;\">";
                        $tabla[12] = "<div class=\"col-12\" style=\"padding-bottom: 10px;\">"; ?>


                        <div class="box">
                            <div class="col-md-12">

                                <div class="col-md-12">
                                    <hr style="margin-top:20px;margin-bottom: 10px;">
                                </div>
                                <div class="col-md-12">
                                    <h2 style='text-align-last: center;margin-top:0px;'> Orden de Laboratorio </h2>
                                </div>
                                <div class="col-md-12">
                                    <hr style="margin-top:0px;margin-bottom: 10px;">
                                </div>
                                <div class="col-md-12">
                                    <table id="Tabla_Examenes" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" width="2%">#</th>
                                                <th scope="col" width="20%">Nombre</th>
                                                <th scope="col" width="10%">Precio</th>
                                                <th scope="col" width="10%">Cantidad</th>
                                                <th scope="col" width="10%">Total</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOper WHERE idOperacion='$idOperacion' AND estado = '1' ");
                                            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                $contador++;
                                                $id = $rowMotorizado['id'];
                                                $descripcion = $rowMotorizado['descripcion'];
                                                $cantidad = $rowMotorizado['cantidad'];
                                                $base = $rowMotorizado['base'];
                                                $subtotal = $rowMotorizado['subTotal'];

                                                $ruta = htmlentities($_SERVER['PHP_SELF']);
                                                echo "
                                                <tr>
                                                    <th scope='row' width='2%'> {$contador}</th>
                                                    <td width='20%' align='center'>{$descripcion}</td>
                                                    <td width='10%' align='center'>{$base}</td>
                                                    <td width='10%' align='center'>{$cantidad}</td>
                                                    <td width='10%' align='center'>{$subtotal} {$moneda}</td>
                                                </tr>";

                                            }

                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4" style="text-align: end;">SubTotal</th>
                                                <th style="text-align: center;"><?php echo $totalBruto." ".$moneda; ?></th>
                                            </tr>
                                            <tr>
                                                <th colspan="4" style="text-align: end;border-top: 0;">Descuento</th>
                                                <th style="text-align: center;border-top: 0;"><?php echo $descuentos." ".$Icono; ?></th>
                                            </tr>
                                            <tr>
                                                <th colspan="4" style="text-align: end;border-top: 0;">Total</th>
                                                <th style="text-align: center;border-top: 0;"><?php echo $totalNeto." ".$moneda; ?></th>
                                            </tr>
                                            <tr>
                                                <th colspan="4" style="text-align: end;border-top: 0;">Pagado</th>
                                                <th style="text-align: center;border-top: 0;"><?php echo $montoPagado." ".$moneda; ?></th>
                                            </tr>
                                            <tr>
                                                <th colspan="4" style="text-align: end;border-top: 0;">Saldo</th>
                                                <th style="text-align: center;border-top: 0;"><?php echo number_format($saldo, 2, '.', '')." ".$moneda; ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <br>
                                    <div class="col-xs-12">
                                        <p class="lead">Comentarios:</p>
                                        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                            <?php echo $nota ?>
                                        </p>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>


                        <?php
                        $firmaE = funcionMaster($idEmpresa, 'ID_Usuario', 'firma', 'config');
                        $Datos = funcionMaster($idEmpresa, 'ID', 'NOMBRE_USUARIO', 'usuarios');
                        if (strlen($firmaE) > 1) {

                            echo "<div class='col-6' align='center'>
                                <img src='{$Base}/FirmasReg/{$firmaE}' height='100' width='200'>
                                <br>_______________________________
                                <br><u><b>*Medico*</b></u>
                                <br>$Datos
                                <br><u><b>*Documento Firmado Digitalmente*</b></u>
                            </div>";
                        }
                        echo "</div>";
                        ?>

                    </div>
                    <!-- cierre del page-->
                </td>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td>
                    <!--place holder for the fixed-position footer-->
                    <div class="page-footer-space"></div>
                </td>
            </tr>
        </tfoot>

    </table>

</body>

</html>

<script type="text/javascript">
    printHTML();

    function printHTML() {
        if (window.print) {
            window.print();
        }
    }
</script>

<?php /*
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="content">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6"><?php echo $Logo ?></div>
                        <div class="col-md-6"><?php echo $nombreF ?>
                            <b>Factura # 0000<?php echo $numeroDoc ?></b><br>
                            <b>Fecha Factura:</b><?php echo $fechaOperacion ?><br>
                            <b>Fecha Vencimiento:</b> <?php echo $fechaVencimiento ?><br>
                            <?php echo $pagado ?>
                        </div>
                    </div>
                        <hr>
                        <div class="col-sm-6 invoice-col">
                            Empresa
                            <address>
                                <br>
                                <strong> <?php echo $nombreF ?></strong><br>
                                Licencia: <strong> <?php echo $licenciaF ?></strong><br>
                                Nit: <?php echo $nit ?><br>
                                Direccion: <?php echo $direccionF ?> - <?php echo $ciudadPaisF ?><br>
                                Teléfono: <?php echo $telefonoF ?><br>
                                Email: <?php echo $emailF ?>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 invoice-col">
                            Paciente
                            <address>
                                <br>
                                <strong><?php echo $nombre_cliente ?> </strong><br>
                                Direccion: <?php echo $direccion_cliente ?><br>
                                Ciudad: <?php echo $ciudad_cliente ?><br>
                                Telefono: <?php echo $telefono_cliente ?><br>
                                Email: <?php echo $correo_cliente ?>
                            </address>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>

                <div class="box">
                    <div class="col-md-12">

                        <div class="col-md-12">
                            <hr style="margin-top:20px;margin-bottom: 10px;">
                        </div>
                        <div class="col-md-12">
                            <h2 style='text-align-last: center;margin-top:0px;'> Orden de Laboratorio </h2>
                        </div>
                        <div class="col-md-12">
                            <hr style="margin-top:0px;margin-bottom: 10px;">
                        </div>
                        <div class="col-md-12">
                            <table id="Tabla_Examenes" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" width="2%">#</th>
                                        <th scope="col" width="20%">Nombre</th>
                                        <th scope="col" width="10%">Precio</th>
                                        <th scope="col" width="10%">Cantidad</th>
                                        <th scope="col" width="10%">Total</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOper WHERE idOperacion='$idOperacion'");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $contador++;
                                        $id = $rowMotorizado['id'];
                                        $descripcion = $rowMotorizado['descripcion'];
                                        $cantidad = $rowMotorizado['cantidad'];
                                        $base = $rowMotorizado['base'];
                                        $subtotal = $rowMotorizado['subTotal'];

                                        $ruta = htmlentities($_SERVER['PHP_SELF']);
                                        echo "
                                        <tr>
                                            <th scope='row' width='2%'> {$contador}</th>
                                            <td width='20%' align='center'>{$descripcion}</td>
                                            <td width='10%' align='center'>{$base}</td>
                                            <td width='10%' align='center'>{$cantidad}</td>
                                            <td width='10%' align='center'>{$subtotal}</td>
                                        </tr>";

                                        $TotalOrden = $TotalOrden + $subtotal;
                                    }

                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4" style="text-align: end;">Total</th>
                                        <th style="text-align: center;"><?php echo $TotalOrden; ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="4" style="text-align: end;border-top: 0;">Pagado</th>
                                        <th style="text-align: center;border-top: 0;"><?php echo $montoPagado; ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="4" style="text-align: end;border-top: 0;">Saldo</th>
                                        <th style="text-align: center;border-top: 0;"><?php echo $saldo; ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <br>
                            <div class="col-xs-12">
                                <p class="lead">Comentarios:</p>
                                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                    <?php echo $nota ?>
                                </p>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<script type="text/javascript">
    printHTML();

    function printHTML() {
        if (window.print) {
            window.print();
        }
    }
</script>
*/ ?>