<?php
require_once '../header.php';
require_once '../menu.php';

$idOperacion = decrypt($_GET['id']);

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $idOperacion      = $rowMotorizado['idOperacion'];
    $numeroDoc      = $rowMotorizado['numeroDoc'];
    $idCliente      = $rowMotorizado['idCliente'];
    $idEmpresa      = $rowMotorizado['idEmpresa'];
    $fechaOperacion      = $rowMotorizado['fechaOperacion'];
    $fechaVencimiento      = $rowMotorizado['fechaVencimiento'];
    $subTotal      = $rowMotorizado['subTotal'];
    //$impuesto      = $rowMotorizado['impuesto'];
    $impuestoBase = $rowMotorizado['impuestoBase'];

    //$totalNeto      = $rowMotorizado['totalNeto'];
    //$totalBruto      = $rowMotorizado['totalBruto'];

    $SubTotal_Neto_Factura = $rowMotorizado['totalBruto'];
    $Total_Descuento_Factura = $rowMotorizado['descuentos'];
    $Total_Factura = $rowMotorizado['totalNeto'];

    $cantidadProduc      = $rowMotorizado['cantidadProduc'];
    $descuentos      = $rowMotorizado['descuentos'];
    $montoPagado      = $rowMotorizado['montoPagado'];
    $nota      = $rowMotorizado['nota'];
  }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $idEmpresa");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
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
}




$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $idEmpresa");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $empresaNombre      = $rowMotorizado['empresaNombre'];
    $pais               = $rowMotorizado['pais'];

    $ciudad             = $rowMotorizado['ciudad'];
    $direccion          = $rowMotorizado['direccion'];
    $telefono           = $rowMotorizado['telefono'];

    $nit                = $rowMotorizado['nit'];
  }
}



$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
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
}



//$saldo = $totalBruto - $montoPagado;


if ($saldo == 0) {
  //$pagado = '<div align="center"><img src="https://' . $Base . '/pagado.png" height="10%" width="30%"></div>';
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
  <section class="invoice p-3">
    <!-- title row -->
    <div>
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
        <b>Presupuesto # 0000<?php echo $numeroDoc ?></b><br>
        <b>Fecha Presupuesto:</b><?php echo $fechaOperacion ?><br>
        <b>Fecha Vencimiento:</b> <?php echo $fechaVencimiento ?><br>
        <?php echo $pagado ?>

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div>
      <div class="col-md-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th></th>
              <th>Descripción</th>
              <th>Pieza</th>
              <th>Cara</th>

              <th>
                <div align="Right">Precio</div>
              </th>
              <th>
                <div align="Right">Descuento</div>
              </th>
              <th>
                <div align="Right">Subtotal </div>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php


            $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where   id_usuario = $idEmpresa and  
                    id_cliente = $idCliente and idOperacion = $idOperacion and estado = 1 order by id");
            // $check = mysqli_num_rows($q);
            $totalSubTotal = 0;
            $totalBase = 0;
            if ($resultado) {
              while ($fila = mysqli_fetch_array($resultado)) {
                //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                $id_presupuesto_detalle_odonto = $fila['od_presupuesto_detalle_id'];
                $QueryOdontoDetalle = "SELECT * FROM OP_PresupuestoDetalle WHERE id = '$id_presupuesto_detalle_odonto' ";
                $ResultOdontoDetaLLe = mysqli_query($conn3, $QueryOdontoDetalle);
                $RowsOodontoDetalle = [];
                if ($ResultOdontoDetaLLe) {
                  $RowsOodontoDetalle = mysqli_fetch_assoc($ResultOdontoDetaLLe);
                }

                $Numero++;
                $Descuento = $fila['Descuento_Numerico'];

                $Descripcion = $fila['descripcion'];
                // if ($fila["Mas_Detalles"] != "") {
                //   $Descripcion .= ' ' . $fila["Mas_Detalles"] . '';
                // }

                $pieza = $RowsOodontoDetalle['pieza_id'];
                $cara = $RowsOodontoDetalle['cara'];


                echo '     <tr>
                  <td  width="5%"><img style="max-width:20px" src="'.$Base.'OD_ImagenOdontograma/'.$pieza.'.png"></td>
                  <td width="15%">' . $Descripcion . ' </td>
                  <td width="10%">' . $pieza . ' </td>
                  <td width="10%">' . $cara . ' </td>
                  <td width="10%"><div align="Right">' . number_format($fila['base'], 2) . '' . $moneda . '</div></td>
                  <td width="10%"><div align="Right">' . number_format($Descuento, 2) . '' . $moneda . '</div></td>
                  <td width="20%"><div align="Right">' . number_format($fila['subTotal'], 2) . '' . $moneda . '</div></td>
                 
                </tr>';

                //$totalCant += $fila[4];
                //$totalBase +=  $fila[6];
                //$total += $fila[9];
                //$TotalF += $fila[8];
                //$TotalD += $fila[17];

                $totalBase += $fila['totalbase'];
                $totalSubTotal += $fila['subTotal'];

              }
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
        <p class="lead">Comentarios:</p>
        <p class="text-muted well well-sm no-shadow" style="background-color: #5b59590f;padding: 20px;margin: 10px;">
          <?php echo $nota; ?>
        </p>
      </div>
      <!-- /.col -->
      <div class="col-md-6">


        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Precio Base:</th>
              <td> <?php echo number_format($totalBase, 2)  . '' . $moneda ?> </td>
            </tr>
            <!-- <tr>
              <th style="color:green">Descuento:</th>
              <td><?php echo number_format($Total_Descuento_Factura, 2) . '' . $moneda ?></td>
            </tr> -->
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td> <?php echo number_format($totalSubTotal - $Total_Descuento_Factura, 2)  . '' . $moneda ?> </td>
            </tr>


            <?php
            if ($impuestoBase > 0) {
              //$impuestoF2 = $impuestoF / 100;
              //$total1 =  $total * $impuestoF2;
              $total1 =  $impuestoBase;
              $total =  $total1 + $total;


            ?>

              <tr>
                <th style="width:50%">Impuesto:</th>
                <td> <?php echo number_format($total1, 2) . '' . $moneda ?> </td>
              </tr>

            <?php
            } ?>


            <tr>
              <th>Total Presupuesto:</th>
              <td><?php echo number_format($totalSubTotal, 2) . '' . $moneda ?></td>
            </tr>
          </table>
        </div>
      </div>

      <!-- this row will not appear when printing -->
      <div class="no-print" style="width:100%">
        <div class="col-md-12">
          <a href="OP_Imprimir?id=<?=encrypt($idOperacion);?>" target="_blank" class="btn btn-block btn-outline-info rounded-pill shadow m-1" style="width:100%"><i class="fa fa-print"></i> Imprimir</a>

          <!--
              <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
              </button>
              <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                <i class="fa fa-download"></i> Generate PDF
              </button>
    -->

        </div>
      </div>

      <div class="col-md-12" align="center" style="margin-top:20px;margin-bottom:20px;">
        <a class="btn btn-block btn-outline-primary rounded-pill shadow m-1" target="_blank" href="<?php echo $Base; ?>enviarPresupuestoP.php?cliente=<?php echo $idCliente; ?>&idr=<?php echo $idr; ?>&idOperacion=<?php echo $idOperacion ?>">
          <i class="fa fa-paper-plane"></i> Enviar Presupuesto al paciente
        </a>
      </div>

      <!-- /.col -->
    </div>
    <div class="col-xs-12" align="center">
      <?php echo $pieF ?>
    </div>


    <!-- /.row -->





  </section>
  <!-- /.content -->
  <div class="clearfix"></div>
</div>










<?php require_once "../footer.php" ?>