<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);

if (isset($_POST['GuardarDetalleFactura'])) {
  date_default_timezone_set('America/Bogota');

  $idOperacion = 0;
  $fechaRegistro = date("Y-m-d H:i:s");
  $idProducto = $_POST["productos"];
  $cantidad = $_POST['cantidad'];
  $descripcion = mysqli_real_escape_string($conn3, funcionMaster($idProducto, 'id', 'descripcion', 'Inventario'));
  $base = $_POST["precio"];
  $impuesto = 0;
  $totalbase = 0;
  $subTotal = $_POST["subtotal"];
  $id_usuario = $_POST['id_usuario'];
  $id_cliente = $_POST['id_cliente'];
  $smoneda = $_POST['smoneda'];

  $descuentoFactura           = $_POST['descuentoFactura'];

  if ($descuentoFactura <> "0") {
    $subTotal = $subTotal - ($subTotal * ($descuentoFactura / 100));
  }


  mysqli_query($conn3, "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente, smoneda, descuentoFactura) VALUES ('$idOperacion','$fechaRegistro', '$idProducto','$cantidad','$descripcion','$base','$impuesto', '$totalbase', '$subTotal', '$id_usuario', '$id_cliente', '$smoneda', '$descuentoFactura');");

  $clienteId = $_GET["clienteId"];
  $ruta = htmlentities($_SERVER['PHP_SELF']);
  echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$clienteId}'</script>";
}
if (isset($_GET['borrar'])) {
  $id = $_GET['borrar'];
  mysqli_query($conn3, "DELETE FROM sDetalleOperPendites WHERE id = '{$id}' limit 1;");

  $clienteId = $_GET["clienteId"];
  $ruta = htmlentities($_SERVER['PHP_SELF']);
  echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$clienteId}'</script>";
}

?>


<?php
$clienteId = $_GET['clienteId'];
$usuarioId = $_GET['usuarioId'];
$historiaClinica1 = $_GET['historiaClinica1'];
$tipo_historia  = $_GET['tipo_historia'];

$ID_Usuario  =  $_SESSION['ID'];

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $ID_Usuario");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $moneda = $rowMotorizado['moneda'];
  $impuestoF = $rowMotorizado['impuestoF'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $usuario_id = $rowMotorizado['usuario_id'];
  $nombre_cliente = $rowMotorizado['nombre_cliente'];
  $celular_cliente = $rowMotorizado['celular_cliente'];
  $ciudad_cliente = $rowMotorizado['ciudad_cliente'];
  $correo_cliente = $rowMotorizado['correo_cliente'];
  $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
  $id_uso_servicio = $rowMotorizado['id_uso_servicio'];
  $tipo_cliente = $rowMotorizado['tipo_cliente'];
  $fechar = $rowMotorizado['fechar'];
  $fecha_actualizado = $rowMotorizado['fecha_actualizado'];
  $activo = $rowMotorizado['activo'];
  $genero = $rowMotorizado['genero'];
  $direccion_cliente = $rowMotorizado['direccion_cliente'];
  $telefono_cliente = $rowMotorizado['telefono_cliente'];
  $edad_cliente = $rowMotorizado['edad_cliente'];
  $profesion_cliente = $rowMotorizado['profesion_cliente'];
  $acompananteFamiliar = $rowMotorizado['acompananteFamiliar'];
  $telefono_acompanante = $rowMotorizado['telefono_acompanante'];
  $antecedentes = $rowMotorizado['antecedentes'];
  $tipo_paciente = $rowMotorizado['tipo_paciente'];

  $entidad_facturacion = $rowMotorizado['entidad_facturacion'];
  $contrato_facturacion = $rowMotorizado['contrato_facturacion'];
}

$usuario_id = $_SESSION['ID'];
?>


<style type="text/css">
  .select2-container .select2-selection--single {
    height: 45px !important;
    padding: 15px !important;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Generar Presupuesto
    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
      <li><a href="#">Generar Presupuesto</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      <div class="col-md-12" style="height: 280px;">
        <?php include 'Modulos_Estilos/DatosPersonales.php';
        echo Datos_Personales($clienteId);
        ?>
      </div>
      <br>
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?clienteId=<?php echo $clienteId; ?>" method="POST" name="formularioActualizarcliente">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <h4 class="card-title">Agregar Producto</h4>
                </div>
                <div class="form-group col-md-12">
                  <div align="left">Paquetes </div>
                  <select name="paquetes" id="paquetes" class="form-control select2" style="width: 100%;" onchange="ProductoPaquete(this.value)" required>
                    <option value="0" selected="selected">Ninguno</option>
                    <?php
                    $queryList = mysqli_query($conn3, "SELECT * FROM IP_Inventario_Paquetes where Activo=1 AND usuario_id='$usuario_id'");
                    while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                      $id = $row_recordset32A['id'];
                      $Nombre = $row_recordset32A['Nombre'];
                      echo "<option value='$id'> $Nombre </option>";
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group col-md-4">
                  <div align="left"> Productos </div>
                  <select name="productos" id="productos" class="form-control select2" style="width: 100%;" onchange="CargarPrecio(this.value)" required>
                    <option value="" selected="selected">Seleccione ...</option>

                  </select>
                </div>

                <div class="form-group col-md-2">
                  <div align="left"> Precio </div>
                  <input name="precio" id="precio" class="form-control input-lg" required onchange="Multiplicar()">
                </div>

                <div class="form-group col-md-2">
                  <div align="left"> Cantidad </div>
                  <input name="cantidad" id="cantidad" class="form-control input-lg" required value="1" onchange="Multiplicar()">
                </div>

                <div class="form-group col-md-2">
                  <div align="left"> Subtotal </div>
                  <input name="subtotal" id="subtotal" class="form-control input-lg" required>
                </div>



                <div class="form-group col-md-2">
                  <div align="left"> Moneda</div>
                  <select name="smoneda" id="smoneda" class="form-control input-lg" required>

                    <option>$</option>
                    <option>S/. PEN</option>

                  </select>
                </div>

                <div class="form-group col-md-3">
                  <label> Descuento en %</label>
                  <input type="number" name="descuentoFactura" placeholder="Descuento" class="form-control input-lg" value="0"> <br>
                </div>

                <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID'] ?>">
                <input type="hidden" name="id_cliente" value="<?php echo $clienteId ?>">

                <div class="form-group col-md-2"><br>
                  <center><button type="submit" class="btn btn-block btn-primary btn-sm input-lg" name="GuardarDetalleFactura" style="font-size: 18px;">Guardar</button></center>
                </div>
              </div>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>

      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Descripción del producto</th>
              <th>
                <div align="Right">Cantidad</div>
              </th>
              <th>
                <div align="Right">Precio</div>
              </th>
              <th>
                <div align="Right">Total</div>
              </th>
              <th> </th>

            </tr>
          </thead>
          <tbody>
            <tr>

              <?php

              $ID = $_SESSION['ID'];

              $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where id_usuario =$ID and id_cliente = $clienteId order by id");
              while ($fila = mysqli_fetch_array($resultado)) {
                $Numero++;
                $ruta = htmlentities($_SERVER['PHP_SELF']);

                echo '     <tr>
                  <td  width="5%">' . $Numero . ' </td>
                  <td width="50%">' . $fila["descripcion"] . ' </td>
                  <td width="5%"><div align="Right">' . $fila["cantidad"] . '</div></td>
                  <td width="20%"><div align="Right">' . $fila["base"] . ' ' . $fila["smoneda"] . '  </div></td>
                  <td width="20%"><div align="Right">' . $fila["subTotal"] . ' ' . $fila["smoneda"] . '  </div></td> 
                  <td width="5%"> <a href=' . $ruta . '?clienteId=' . $clienteId . '&borrar=' . $fila["id"] . '><i class="fa fa-trash"></i> </a>  </td>

                  </tr>';

                $totalCant += $fila["cantidad"];
                $totalBase +=  $fila["base"];
                $total += $fila["subTotal"];
                $money = $fila["smoneda"];
              }


              ?>
            </tr>

          </tbody>
          <thead>
            <tr>
              <th> </th>
              <th> </th>
              <th> </th>
              <th> </th>
              <th> </th>
            </tr>
            <tr>
              <th width="5%"> </th>
              <td width="50%"> <strong>
                  <div align="Right"> Totales </div>
                </strong> </td>
              <td width="5%">
                <div align="Right"><?php echo $totalCant ?></div>
              </td>
              <!-- <td width="20%"><div align="Right"><?php echo $totalBase . '' . $money; ?>  </div></td>-->
              <td width="20%">
                <div align="Right"><input style="width: 60%;" class="form-control input-lg" value="<?php echo $totalBase . ' ' . $money; ?>" readonly> </div>
              </td>
              <!--   <td width="5%"><div align="Right"> <?php echo $total . '' . $money; ?>   </div></td>-->
              <td width="20%">
                <div align="Right"><input style="width: 60%;" class="form-control input-lg" value="<?php echo $total . ' ' . $money; ?>" readonly> </div>
              </td>


              <td width="5%"> </td>
            </tr>

            <?php
            if ($impuestoF > 0) {
              $impuestoF2 = $impuestoF / 100;
              $total1 =  $total * $impuestoF2;
              $total =  $total1 + $total;
            ?>

              <tr>
                <th width="5%"> </th>
                <td width="50%"> <strong>
                    <div align="Right"> Total con impuesto <?php echo $impuestoF ?>% </div>
                  </strong> </td>
                <td width="5%">
                  <div align="Right"> </div>
                </td>
                <td width="20%">
                  <div align="Right"> </div>
                </td>
                <td width="20%">
                  <div align="Right"><?php echo $total . ' ' . $money; ?> </div>
                </td>
                <td width="5%"> </td>
              </tr>
            <?php
            } ?>
          </thead>
        </table>
      </div>




      <form action="totalizarPresupuesto.php" method="POST" name="formularioActualizarcliente">
        <div class="form-row">

          <div align="left" class="form-group col-md-4">
            <label> Monto a Descontar </label>
            <input type="number" name="montoDescontar" placeholder="Monto Descontar" class="form-control input-lg" value="0" step="0.01" min="0" required> <br>
            <label> Monto pagado </label>
            <input type="number" name="montoPagado" placeholder="Monto Pagado" class="form-control input-lg" value="0" step="0.01"> <br>
            <label> Fecha de vencimiento</label>
            <input type="date" name="fechaVencimiento" placeholder="fecha Vencimiento" class="form-control input-lg">
            <br>

            <br>
            <center><button type="submit" class="btn btn-block btn-danger btn-sm"> <strong> Totalizar factura </strong> </button></center>
          </div>



          <div align="left" class="form-group col-md-4">
            <label> Observaciones o notas</label>
            <textarea id="nota" name="nota" class="textarea" placeholder="Observaciones o Notas" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><b>El presente presupuesto puede estar sujeto a modificaciones que serán acordadas entre el tratante y el paciente. Validez de este presupuesto 15 días.</b></textarea>
          </div>

          <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID'] ?>">
          <input type="hidden" name="id_cliente" value="<?php echo $clienteId ?>">
          <input type="hidden" name="historia" value="<?php echo $historiaClinica1 ?>">
          <input type="hidden" name="tipo_historia" value="<?php echo $tipo_historia ?>">
        </div>
      </form>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

<?php include("footer.php") ?>

<script type="text/javascript">
  function ProductoPaquete(valor) {
    $.ajax({
      type: "POST",
      url: "Ajax_Tarifa.php",
      data: {
        paquete: valor,
        tipo: "Nombre"
      },
      success: function(response) {
        $('#productos').html(response);
      }
    });
  }

  function CargarPrecio(valor) {
    $.ajax({
      type: "POST",
      url: "Ajax_Tarifa.php",
      data: {
        producto: valor,
        tipo: "Precio"
      },
      success: function(response) {
        $('#precio').val(response);

        Multiplicar()
      }
    });
  }

  function Multiplicar() {
    valor1 = document.getElementById("precio").value;
    valor2 = document.getElementById("cantidad").value;
    respuesta = valor1 * valor2;
    document.getElementById("subtotal").value = respuesta;
  }

  window.load {
    ProductoPaquete("0");
  }
</script>