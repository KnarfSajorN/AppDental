<?php
include 'header.php';
include 'menu.php';

$idOperacion = $_GET['idOperacion'];


$QueryDocumento = mysqli_query($conn3, "SELECT * FROM  DocumentoSoporte_Operacion where idOperacion = $idOperacion");
while ($RowDocumento = mysqli_fetch_array($QueryDocumento)) {

    $usuario_id = $RowDocumento['usuario_id'];
    $proveedor_id = $RowDocumento['proveedor_id'];

    $TotalBruto = $RowDocumento['TotalBruto'];
    $Descuentos = $RowDocumento['Descuentos'];
    $SubTotal = $RowDocumento['SubTotal'];
    $ImpuestoBase = $RowDocumento['ImpuestoBase'];
    $TotalNeto = $RowDocumento['TotalNeto'];
    
    $Nota = $RowDocumento['Nota'];

    $FechaOperacion = $RowDocumento['FechaOperacion'];
    $FechaVencimiento = $RowDocumento['FechaVencimiento'];
    $FechaVenta = $RowDocumento['FechaVenta'];
    
    $NumeroDocumentoSoporte = $RowDocumento['NumeroDocumentoSoporte'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
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

  $LogoF               = $rowMotorizado['logoF'];

  if (strlen($LogoF) > 0) {
    $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" height="10%" width="10%">';
  }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $empresaNombre      = $rowMotorizado['empresaNombre'];
  $pais               = $rowMotorizado['pais'];

  $ciudad             = $rowMotorizado['ciudad'];
  $direccion          = $rowMotorizado['direccion'];
  $telefono           = $rowMotorizado['telefono'];

  $nit                = $rowMotorizado['nit'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  sproveedores where id = '$proveedor_id'");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $nombre_p = $rowMotorizado['nombre'];
    $rut_p = $rowMotorizado['rut'];
    $correo_p = $rowMotorizado['correo'];

    $direccion_p = $rowMotorizado['direccion'];
    $telefono_p = $rowMotorizado['telefono'];
}



$cliente_id = $idCliente;
$usuario_id = $idEmpresa;
/*
if (isset($_GET['tipo'])) {
  $tipo = $_GET['tipo'];

  $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le ha generado una factura, para visualizar la factura dar click en el siguiente link: ' . $Base . 'OD_ImprimirFactura?idOperacion=' . ($idOperacion) . '';
  $accion = 0;
  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

  echo "<script language='Javascript'> window.location='OD_PreliminarFactura?idOperacion=" . ($idOperacion) . "';</script>";

}
*/
?>


<link rel="stylesheet" href="Modulos_Estilos/DatosFactura.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Documento Soporte </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content" style="padding: 30px;">
                <div class="col-md-12">
                    <article class="postcard light red">
                        <a class="postcard__img_link" href="#">
                            <img class="postcard__img" src="<?php echo $Base ?>/Modulos_Estilos/Imagenes/IconoFactura.jpg" alt="Image Title" />
                        </a>
                        <div class="postcard__text t-dark">

                            <h1 class="postcard__title red"><a href="#">Documento Soporte</a> <!--<?php echo $Logo ?>--></h1>
                            <div class="postcard__subtitle small">
                                <time>
                                    <i class="fas fa-calendar-alt mr-2"></i> <?php echo $fechaOperacion; ?>
                                </time>
                            </div>
                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt">

                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        <b>Empresa</b>
                                        <address>
                                            <br>
                                            <b> <?php echo $nombreF ?></b><br>
                                            <b>Licencia: </b> <?php echo $licenciaF ?><br>
                                            <b>Nit: </b><?php echo $nit ?><br>
                                            <b>Dirección: </b><?php echo $direccionF ?> - <?php echo $ciudadPaisF ?><br>
                                            <b>Teléfono: </b><?php echo $telefonoF ?><br>
                                            <b>Email: </b><?php echo $emailF ?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        Proveedor
                                        <address>
                                            <br>
                                            <b><?php echo $nombre_p ?> </b><br>
                                            <b>Dirección: </b><?php echo $direccion_p ?><br>
                                            <b>RUT: </b><?php echo $rut_p ?><br>
                                            <b>Teléfono: </b><?php echo $telefono_p ?><br>
                                            <b>Correo: </b><?php echo $correo_p ?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <b>Documento Soporte # <?php echo $NumeroDocumentoSoporte ?></b><br>
                                        <br>

                                        <b>Fecha Operacion:</b><?php echo $FechaOperacion ?><br>
                                        <b>Fecha Vencimiento:</b> <?php echo $FechaVencimiento ?><br>
                                        <b>Fecha Venta:</b> <?php echo $FechaVenta ?><br>
                                    </div>
                                    <!-- /.col -->
                                </div>

                            </div>
                            <ul class="postcard__tagbox">
                                <li class="tag__item"><i class="fas fa-tag mr-2"></i>Documento Soporte</li>
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
                            <h2 style='text-align-last: center;margin-top:0px;'> Documento Soporte </h2>
                        </div>
                        <div class="col-md-12">
                            <hr style="margin-top:0px;margin-bottom: 10px;">
                        </div>
                        <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descripción</th>

                                    <th>
                                        <div align="Right">Precio</div>
                                    </th>

                                    <th>
                                        <div align="Right">Cantidad</div>
                                    </th>
                                    <th>
                                        <div align="Right">SubTotal</div>
                                    </th>
                                    <th>
                                        <div align="center" style="color: blue;">Impuesto</div>
                                    </th>
                                    <th>
                                        <div align="Right">Total</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php

                                    $ID = $_SESSION['ID'];
                                                                    
                                    $resultado = mysqli_query($conn3, "SELECT * FROM  DocumentoSoporte_Detalles where Estado = 1 and idOperacion = $idOperacion Order by id");
                                    while ($fila = mysqli_fetch_array($resultado)) {
                            
                                        $Numero++;

                                        $deposito = funcionMaster($fila['Deposito_id'],'id','descripcion','dep');
                                        if($deposito != ""){
                                            $deposito = $deposito." | ";
                                        }

                                        echo '     <tr>
                                        <td  width="1%">' . $Numero .' </td>
                                        <td width="30%">' .$deposito . ' ' . $fila['Descripcion'] .' </td>
                                        <td width="10%"><div align="Right">' . $fila['Base'] . '' . $moneda . '</div></td>
                                        <td width="5%"><div align="Right">' . $fila['Cantidad'] . '</div></td>
                                        <td width="10%"><div align="Right">' . $fila['Subtotal'] . '' . $moneda . '</div></td>
                                        <td width="10%"><div align="center">' . $fila['Impuesto_Numerico'] . '' . $moneda . '</div></td>
                                        <td width="10%"><div align="Right">' . $fila['Total'] . '' . $moneda . '</div></td>';

                                        echo '</tr>';
                                    }

                                    ?>
                                </tr>

                            </tbody>
                                <tfoot>
                                    <tr>
                                    <th  colspan="6" ><div align="Right">Precio Base:</div></th>
                                    <td><div align="Right"> <?php echo number_format($TotalBruto,2)  . '' . $moneda ?></div> </td>
                                    </tr>
                                    <tr>
                                    <th  colspan="6" ><div align="Right">Subtotal:</div></th>
                                    <td><div align="Right"> <?php echo number_format($SubTotal,2)  . '' . $moneda ?></div> </td>
                                    </tr>


                                    <?php
                                    if ($ImpuestoBase > 0) {
                                    ?>

                                    <tr>
                                        <th  colspan="6" ><div align="Right">Impuesto:</div></th>
                                        <td> <div align="Right"><?php echo number_format($ImpuestoBase,2) . '' . $moneda ?></div> </td>
                                    </tr>

                                    <?php
                                    } ?>

                                    <tr>
                                    <th colspan="6" ><div align="Right">Total Documento:</div></th>
                                    <td><div align="Right"><?php echo number_format($TotalNeto,2) . '' . $moneda ?></div></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <br>
                            <div class="col-xs-6">
                                <p class="lead">Comentarios:</p>
                                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                    <?php echo $Nota ?>
                                </p>
                            </div>
                            <br>
                        </div>
                        
                        
                        <center style="width: 100%;"><button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" onclick="window.location.href='Docso_Impresion?idOperacion=<?php echo $idOperacion; ?>'; "> <i class="fa fa-print"></i> <strong> Imprimir  </strong> </button></center>
                        <br><br><br>
                        

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