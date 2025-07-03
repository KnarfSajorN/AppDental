<?php
include 'header.php';
include 'menu.php';

$idOperacion = $_GET['idOperacion'];





//////////////////////////////////////////////////
$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $idOperacion      = $rowMotorizado['idOperacion'];
    $numeroDoc      = $rowMotorizado['numeroDoc'];
    $idCliente      = $rowMotorizado['idCliente'];
    $idEmpresa      = $rowMotorizado['idEmpresa'];
    $fechaOperacion      = $rowMotorizado['fechaOperacion'];
    $fechaVencimiento      = $rowMotorizado['fechaVencimiento'];
    //$subTotal      = $rowMotorizado['subTotal'];
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
    $pieF = $rowMotorizado['pieF'];

    $LogoF = $rowMotorizado['logoF'];

    if (strlen($LogoF) > 0) {
        $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;float: right;'>";
    }
    $moneda = $rowMotorizado['moneda'];
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


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $nombre_cliente             = $rowMotorizado['nombre_cliente'];
    $ciudad_cliente             = $rowMotorizado['ciudad_cliente'];

    $correo_cliente             = $rowMotorizado['correo_cliente'];
    $direccion_cliente          = $rowMotorizado['direccion_cliente'];
    $telefono_cliente           = $rowMotorizado['telefono_cliente'];

    $whatsapp = $rowMotorizado['whatsapp'];
}

// a la variable saldo se le resta el monto pagado y se le suma el total neto y se le resta el descuento si es que tiene uno
if($Tipo_Descuento=="Numerico" OR $Tipo_Descuento=="")
{
    $saldo = $totalBruto - $montoPagado - $descuentos;
    $Icono=$moneda;
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
    //$pagado = '<div align="center"><img src="' . $Base . '/pagado.png" height="7%" width="10%" style="top: 34%;right: 5%;position: fixed;"></div>';
}


if (isset($_GET['Envio'])) {
    $tipo = $_GET['Envio'];
  
    if ($tipo == "Factura") {
      $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le envía la siguiente factura registrada para su visualización en la siguiente ruta:  ' . $Base . 'LB_ImpresionOrden?idOperacion=' .$idOperacion;
    }
  
    $accion = 0;
    Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $idCliente, $idEmpresa, $whatsapp, $accion);
  
    echo "<script language='Javascript'> window.location='LB_PreliminarOrden?idOperacion=" .$idOperacion . "&msg=Mensaje Enviado';</script>";
}


if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}

?>


<link rel="stylesheet" href="Modulos_Estilos/DatosFactura.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Factura Orden de Laboratorio </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="content">
                <div class="col-md-12">
                    <article class="postcard light red">
                        <a class="postcard__img_link" href="#">
                            <img class="postcard__img" src="<?php echo $Base ?>/Modulos_Estilos/Imagenes/IconoFactura.jpg" alt="Image Title" />
                        </a>
                        <div class="postcard__text t-dark">

                            <h1 class="postcard__title red"><a href="#">Orden de Laboratorio</a> <?php echo $Logo ?> </h1>
                            <div class="postcard__subtitle small">
                                <time>
                                    <i class="fas fa-calendar-alt mr-2"></i> <?php echo $fechaOperacion; ?>
                                </time>
                            </div>
                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt">

                                <div class="row invoice-info">
                                    <div class="col-sm-6 invoice-col">
                                        Empresa
                                        <address>
                                            <br>
                                            <strong> <?php echo $nombreF ?></strong><br>
                                            Licencia: <strong> <?php echo $licenciaF ?></strong><br>
                                            Nit: <?php echo $nit ?><br>
                                            Dirección: <?php echo $direccionF ?> - <?php echo $ciudadPaisF ?><br>
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
                                            Dirección: <?php echo $direccion_cliente ?><br>
                                            Ciudad: <?php echo $ciudad_cliente ?><br>
                                            Teléfono: <?php echo $telefono_cliente ?><br>
                                            Email: <?php echo $correo_cliente ?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <b>Factura # 0000<?php echo $numeroDoc ?></b><br>
                                        <br>

                                        <b>Fecha Factura:</b><?php echo $fechaOperacion ?><br>
                                        <b>Fecha Vencimiento:</b> <?php echo $fechaVencimiento ?><br>
                                        <?php echo $pagado ?>
                                    </div>
                                    <!-- /.col -->
                                </div>

                            </div>
                            <ul class="postcard__tagbox">
                                <li class="tag__item"><i class="fas fa-tag mr-2"></i>Laboratorio</li>
                                <!--<li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                                <li class="tag__item play red">
                                    <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                                </li>-->
                            </ul>
                        </div>
                    </article>
                </div>
                <h4 class="Titulo_Pagina" style="background-color: initial;padding: 1px;"></h4>
                <div class="box">
                    <div class="box-body row">

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

                                    $queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOper WHERE idOperacion='$idOperacion' AND estado = 1");
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
                            <div class="col-xs-6">
                                <p class="lead">Comentarios:</p>
                                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                    <?php echo $nota ?>
                                </p>
                            </div>
                            <br>
                        </div>

                        <center style="width: 100%;"><button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" onclick="window.location.href='LB_ImprimirEtiqueta?idOperacion=<?php echo $idOperacion; ?>'; "> <i class="fa fa-print"></i> <strong> Imprimir Etiquetas </strong> </button></center>
                        <br><br><br>
                        <center style="width: 100%;"><button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" onclick="window.location.href='LB_ImprimirEtiquetaCategorias?idOperacion=<?php echo $idOperacion; ?>'; "> <i class="fa fa-print"></i> <strong> Imprimir Etiquetas [Categorías] </strong> </button></center>
                        <br><br><br>
                        <center style="width: 100%;"><button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" onclick="window.location.href='LB_ImpresionOrden?idOperacion=<?php echo $idOperacion; ?>';"> <i class="fa fa-print"></i> <strong> Imprimir </strong> </button></center>
                        <br><br><br>
                        <center style="width: 100%;"><button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" onclick="window.location.href='LB_PreliminarOrden?idOperacion=<?php echo $idOperacion; ?>&Envio=Factura';"> <i class="fa fa-paper-plane"></i> <strong> Enviar Orden/Factura </strong> </button></center>
                        <br><br><br>
                        <?php if (isset($_GET['Lectura'])) : ?>
                            <center style="width: 100%;"><button type="button" class="btn btn-block btn-outline-danger btn-lg rounded-pill shadow" onclick="window.location.href='LB_PacientesOrdenes?Tipo=OrdenCargada';"> <strong> Salir </strong> </button></center>
                        <?php else : ?>
                            <center style="width: 100%;"><button type="button" class="btn btn-block btn-outline-danger btn-lg rounded-pill shadow" onclick="window.location.href='LB_PacientesOrdenes?Tipo=CargarOrden';"> <strong> Salir </strong> </button></center>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</section>

<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>

<script>
    $('#Tabla_Examenes').dataTable({
        "info": false,
        "paging": false,
        "searching": false
    });
</script>