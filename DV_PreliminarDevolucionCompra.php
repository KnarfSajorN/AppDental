<?php
include 'header.php';
include 'menu.php';

$idOperacion = $_GET['idOperacion'];

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInvDevolucion where idOperacion = $idOperacion");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $idOperacion      = $rowMotorizado['idOperacion'];
  $numeroDoc      = $rowMotorizado['numeroDoc'];
  $ID_Empresa      = $rowMotorizado['ID_Empresa'];
  $idEmpresa      = $rowMotorizado['idEmpresa'];
  $fechaOperacion      = $rowMotorizado['fechaOperacion'];
  $fechaVencimiento      = $rowMotorizado['fechaVencimiento'];
  //$subTotal      =$rowMotorizado['subTotal'];
  $impuesto      = $rowMotorizado['impuesto'];
  $impuestoBase = $rowMotorizado['impuestoBase'];
  $totalNeto      = $rowMotorizado['totalNeto'];
  $totalBruto      = $rowMotorizado['totalBruto'];
  $cantidadProduc      = $rowMotorizado['cantidadProduc'];
  $descuentos      = $rowMotorizado['descuentos'];
  $nota      = $rowMotorizado['nota'];

  $MontoDevolucion = $rowMotorizado['MontoDevolucion'];
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


$queryList=mysqli_query($conn3,"SELECT * FROM  sproveedores where id = '$ID_Empresa'");
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
<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li class="active"> Devolución</li>
    </ol>
  </section>


  <!-- Main content -->
  <h4 class="Titulo_Pagina"> &nbsp;&nbsp; Devolución
      <small># 0000<?php echo $numeroDoc ?></small> 
  </h4>
  <section class="invoice p-3">
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
      <div class="col-md-4 invoice-col">
        <b>Devolución # 0000<?php echo $numeroDoc ?></b><br>
        <b>Fecha Devolución:</b><?php echo $fechaOperacion ?><br>
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
      <div class="col-md-12 table-responsive">
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


            $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperDevolucion where estado = 1 and  ID_Empresa = $ID_Empresa 
            and idOperacion = $idOperacion order by id");
            while ($fila = mysqli_fetch_array($resultado)) {

              $Numero++;
              $Descuento = $fila['Descuento_Numerico'];
              $Descripcion = $fila['descripcion'];
              //Apartado de paquetes
              if($fila["PaqueteProcedimiento_id"]!="0" && $fila["PaqueteProcedimiento_id"]!=""){
                $Paquete_id = funcionMaster($fila["PaqueteProcedimiento_id"],'id','paquete_id','ES_Paquete_Procedimientos');$PaqueteNombre = funcionMaster($Paquete_id,'id','Nombre','ES_Paquete');
                $Descripcion.= ' ['.$PaqueteNombre.']';
              }

              if($fila["Mas_Detalles"]!=""){
                $Descripcion.= ' '.$fila["Mas_Detalles"].'';
              }
              echo '     <tr>
                  <td  width="5%">' . $Numero . ' </td>
                  <td width="30%">' .$Descripcion. ' </td>
                  
                  <td width="5%"><div align="Right">' . $fila['cantidad'] . '</div></td>
                  <td width="13%"><div align="Right">' . number_format($fila['base'],2) . '' . $moneda . '</div></td>
                  <td width="13%"><div align="Right">' . number_format($Descuento,2) . '' . $moneda . '</div></td>
                  <td width="13%"><div align="Right">' . number_format($fila['subTotal'],2) . '' . $moneda . '</div></td>
                 
                </tr>';

              $totalCant += $fila['cantidad'];
              $totalBase +=  $fila['base'];
              $total += $fila['subTotal'];
            }





            ?>


          </tbody>
        </table>
      </div>

    </div>
    <!-- /.row -->

    <div class="row">

      <!-- accepted payments column -->

      <div class="col-md-4" >
        <p class="lead">Comentarios:</p>


        <p class="text-muted well well-sm no-shadow" style="background-color: #5b59590f;padding: 20px;margin: 10px;">
          <?php echo $nota; ?>
        </p>
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
              <th>Total Devolución:</th>
              <td><?php echo number_format($totalNeto,2) . '' . $moneda ?></td>
            </tr>

            <tr><th>&nbsp;</th><th></th><tr>
            <tr>
              <th style="width:50%">Monto Devolucion[Pago]:</th>
              <td> <?php echo number_format($MontoDevolucion,2)  . '' . $moneda ?> </td>
            </tr>
          </table>
        </div>
      </div>

      <!-- /.col -->
    </div>
    <div class="col-md-12" align="center">
      <?php echo $pieF ?>
    </div>


    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="no-print" style="width:100%">
      <div class="col-md-12">
        <a href="DV_ImprimirDevolucionCompras.php?idOperacion=<?php echo $idOperacion ?>" target="_blank" class="btn btn-block btn-outline-info rounded-pill shadow m-1" style="width:100%" ><i class="fa fa-print"></i> Imprimir</a>
      </div>
      <div class="col-md-12">
        <br>
      </div>
    </div>

  </section>
  <!-- /.content -->
  <div class="clearfix"></div>
</div>










<?php include("footer.php") ?>