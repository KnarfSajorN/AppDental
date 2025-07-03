<?php
include 'header.php';
include 'menu.php';

$idOperacion = $_GET['idOperacion'];

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $idOperacion      = $rowMotorizado['idOperacion'];
  $numeroDoc      = $rowMotorizado['numeroDoc'];
  $idCliente      = $rowMotorizado['idCliente'];
  $idEmpresa      = $rowMotorizado['idEmpresa'];
  $fechaOperacion      = $rowMotorizado['fechaOperacion'];
  $fechaVencimiento      = $rowMotorizado['fechaVencimiento'];
  //$subTotal      =$rowMotorizado['subTotal'];
  //$impuesto      = $rowMotorizado['impuesto'];
  $impuestoBase = $rowMotorizado['impuestoBase'];
  $totalNeto      = $rowMotorizado['totalNeto'];
  $totalBruto      = $rowMotorizado['totalBruto'];
  $cantidadProduc      = $rowMotorizado['cantidadProduc'];
  $descuentos      = $rowMotorizado['descuentos'];
  $montoPagado      = $rowMotorizado['montoPagado'];
  $notafactura      = $rowMotorizado['nota'];
  $ID_Empresa      = $rowMotorizado['ID_Empresa'];
}
$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleMetodosPagos where idOperacion = $idOperacion and tipo = '3'");
// echo "SELECT * FROM  sDetalleMetodosPagos where idOperacion = $idOperacion and tipo = '1'";
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $idOperacion      = $rowMotorizado['idOperacion'];
  $id_usuario      = $rowMotorizado['id_usuario'];
  $id_cliente      = $rowMotorizado['id_cliente'];
  $fechaOperacion      = $rowMotorizado['fechaOperacion'];
  $metodo_pago      = $rowMotorizado['metodo_pago'];
  $nota_pago      = $rowMotorizado['nota_pago'];
  $tipo      = $rowMotorizado['tipo'];;
}


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $idEmpresa");
$nrowl = mysqli_num_rows($queryList);
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


$queryList=mysqli_query($conn3,"SELECT * FROM  sproveedores where id = '$ID_Empresa'");
// echo "SELECT * FROM  sproveedores where id = '$ID_Empresa'";

$nrowl=mysqli_num_rows($queryList);

while($rowMotorizado=mysqli_fetch_array($queryList))

{

    $nombre = $rowMotorizado['nombre'];
    $rut = $rowMotorizado['rut'];
    $correo = $rowMotorizado['correo'];

    $direccion = $rowMotorizado['direccion'];
    $telefono = $rowMotorizado['telefono'];
    $vendedor = $rowMotorizado['vendedor'];
    $nota = $rowMotorizado['nota'];
   $idE = $rowMotorizado['id'];

}


// if ($montoPagado == 0) {
//   $pagado = '<div align="center"><img src="' . $Base . '/pagado.png" height="10%" width="30%"></div>';
// }

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Orden de Compra
      <small># 0000<?php echo $numeroDoc ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li class="active"> Orden de Compra</li>
    </ol>
  </section>


  <!-- Main content -->
  <section class="invoice p-3">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
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
          <strong>Teléfono:</strong> <?php echo $telefonoF ?><br>
          <strong>Email:</strong> <?php echo $emailF ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <h4>Datos del Proveedor</h4>
        <address>

          <strong>Nombre: </strong> <?php echo $nombre ?><br>
          <strong>RUT:</strong> <?php echo $rut ?> <br>
          <strong>Dirección:</strong> <?php echo $direccion ?><br>
          <strong>Teléfono:</strong> <?php echo $telefono ?><br>
          <strong>Email: </strong> <?php echo $correo ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Orden de Compra # 0000<?php echo $numeroDoc ?></b><br>
        <b>Fecha Orden:</b><?php echo $fechaOperacion ?><br>
        <b>Fecha Vencimiento:</b> <?php echo $fechaVencimiento ?><br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
                <div class="col-md-12">
                    <hr>
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
              <!-- <th>Referencia</th> -->

              <th>
                <div align="Right">Cantidad</div>
              </th>
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


            $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where estado = 1 and id_usuario = $idEmpresa and idOperacion = $idOperacion order by id");
            while ($fila = mysqli_fetch_array($resultado)) {
              //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
              $Numero++;
              $Descuento = $fila['Descuento_Numerico'];

              $Descripcion = $fila['descripcion'];
              if($fila["Mas_Detalles"]!=""){
                $Descripcion.= ' '.$fila["Mas_Detalles"].'';
              }

              echo '     <tr>
                  <td  width="5%">' . $Numero . ' </td>
                  <td width="30%">' . $Descripcion . ' </td>
                  
                  <td width="5%"><div align="Right">' . $fila['cantidad'] . '</div></td>
                  <td width="13%"><div align="Right">' . number_format($fila['base'],2) . '' . $moneda . '</div></td>
                  <td width="13%"><div align="Right">' . number_format($Descuento,2)  . '' . $moneda . '</div></td>
                  <td width="13%"><div align="Right">' . number_format($fila['subTotal'],2)  . '' . $moneda . '</div></td>
                 
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
      <!-- <div class="col-xs-6">
           <label>
             <h4>Metodo de Pago:</h4>
             <h5><?php echo $metodo_pago ?></h5>
           </label>

         </div> -->
    </div>
    <!-- /.row -->

    <div class="row">

      <!-- accepted payments column -->

      <div class="col-md-4">
        <p class="lead">Comentarios:</p>


        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          <?php echo $notafactura; ?>
        </p>
      </div>

      <div class="col-md-4">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>
                <div>Método de Pago</div>
              </th>
              <th>
                <div align="Right">Monto</div>
              </th>
              <th> </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
              $ID = $_SESSION['ID'];
              $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE idOperacion = $idOperacion");
              $check = mysqli_num_rows($resultado);
              $totalMet = 0;

              while ($fila = mysqli_fetch_array($resultado)) {
                $contador++;
                $ruta = htmlentities($_SERVER['PHP_SELF']);
                $Nombre_Pago = funcionMaster($fila['metodo_pago'],'id','Nombre','Medios_Pago');
                echo '<tr>
                            <td>' . $contador . '</td>
                            <td>' . $Nombre_Pago . '</td>
                            <td><div align="Right">' . number_format($fila[6],2)  . '' . $moneda . '</div></td>
                        </tr>';

                $totalMet += $fila[6];
                $saldo = $totalNeto - $totalMet;


               
              }

             

              // echo "El total es: " . $totalMet;
              ?>
          
            </tr>
          </tbody>
          <!-- <thead>
            <tr>
              <th></th>
              <th> <strong>
                  <div align="Right"> Total </div>
                </strong>
              </th>
              <th>
                <div align="Right"><?php echo $totalMet . ' ' . $moneda; ?> </div>
              </th>



            </tr>

          </thead> -->

        </table>

      </div>

      <!-- /.col -->
      <div class="col-md-4">


        <div class="table-responsive">
          <table class="table">
          <tr>
              <th style="width:50%">Precio Base:</th>
              <td> <?php echo number_format($totalBruto,2)  . '' . $moneda ?> </td>
            </tr>
            <tr>
              <th style="color:green">Descuento:</th>
              <td><?php echo number_format($descuentos,2) . '' . $moneda ?></td>
            </tr>
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td> <?php echo number_format($totalBruto-$descuentos,2)  . '' . $moneda ?> </td>
            </tr>
            <th style="width:50%">Iva:</th>
              <td>
                <?php echo number_format($impuestoBase / ($totalBruto - $descuentos) * 100, 1) . '' . '%' . '' ?>
              </td>


            <?php
            if ($impuestoBase > 0) {
              //$impuestoF2 = $impuestoF / 100;
              //$total1 =  $total * $impuestoF2;
              $total1 =  $impuestoBase;
              $total =  $total1 + $total;


            ?>

              <tr>
                <th style="width:50%">Impuesto:</th>
                <td> <?php echo number_format($total1,2) . '' . $moneda ?> </td>
              </tr>

            <?php
            } ?>
            <tr>
              <th>Total a Pagar:</th>
              <td><?php echo number_format($totalNeto,2) . '' . $moneda ?></td>
            </tr>

            <tr>
              <th>Pagado:</th>
              <td><?php echo number_format($totalMet,2) . '' . $moneda ?></td>
            </tr>
            <?php if ($totalMet == 0) { ?>
              <tr>
                <th style="color:red">Saldo:</th>
                <td><?php echo number_format($totalNeto,2) . '' . $moneda ?></td>
              </tr>
            <?php } else { ?>
              <tr>
                <th style="color:red">Saldo:</th>
                <td><?php echo number_format($saldo,2) . '' . $moneda ?></td>
              </tr>
            <?php } ?>

            <tr>
              <th>Total:</th>
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


    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-md-12">
        <a href="imprimirOrden.php?idOperacion=<?php echo $idOperacion ?>" target="_blank" class="btn btn-block btn-outline-info rounded-pill shadow m-1"><i class="fa fa-print"></i> Imprimir</a>

        <!--
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
-->

      </div>
    </div>
    <div class="col-md-12" align="center">

      <a class="btn btn-block btn-outline-primary rounded-pill shadow m-1" target="_blank" href="<?php echo $Base; ?>enviarOrden.php?id=<?php echo $ID_Empresa ?>&idOperacion=<?php echo $idOperacion ?>">
        <i class="fa fa-send"></i> Enviar Orden de Compra
      </a>



    </div>
  </section>
  <!-- /.content -->
  <div class="clearfix"></div>
</div>

<?php include("footer.php") ?>