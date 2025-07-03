<?php include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);

if (isset($_POST['GuardarDetalleSalida'])) {
  date_default_timezone_set('America/Bogota');

  $Campo1 = mysqli_query($conn3, "show COLUMNS from operacioninv WHERE Field = 'Deposito_id_Origen';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `operacioninv` ADD `Deposito_id_Origen` 	int(11) NULL DEFAULT '0'  COMMENT ' *Creado desde modulo de salida inventario*';");
  }

  $Campo1 = mysqli_query($conn3, "show COLUMNS from operacioninv WHERE Field = 'SinvDep_id';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `operacioninv` ADD `SinvDep_id` 	int(11) NULL DEFAULT '0'  COMMENT ' *Creado desde modulo de salida inventario*';");
  }

  $Campo1 = mysqli_query($conn3, "show COLUMNS from operacioninv WHERE Field = 'Descripcion';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `operacioninv` ADD `Descripcion` 	TEXT NULL  COMMENT ' *Creado desde modulo de salida inventario*';");
  }




  $Campo1 = mysqli_query($conn3, "show COLUMNS from operacioninv WHERE Field = 'Mas_Detalles';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `operacioninv` ADD `Mas_Detalles` TEXT NULL  COMMENT ' *Creado desde modulo de salida inventario*';");
  }

  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  $codigoProd   = $_POST['codigoProd'];
  $cantidad     = $_POST['cantidad'];
  $usuario_id   = $_POST['usuario_id'];
  $descripcion = mysqli_real_escape_string($conn3, funcionMaster($codigoProd, 'ID', 'descripcion', 'sinvetrios'));

  $queryinv = mysqli_query($conn3, "SELECT * FROM  sinvetrios where  ID = $codigoProd");
  while ($rowinv = mysqli_fetch_array($queryinv)) {

    //$tipo         = $rowinv['tipo'];
    $costo        = $rowinv['costo'];
    $precio       = $rowinv['precio'];
    $existencia   = $rowinv['existencia'];
  }

  $SinvDep_id = $_POST['SinvDep_id'];
  $Deposito_id = $_POST['deposito'];
  $tipoOperacion = "1"; //Operacion Salida
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



  /////////////////////////////////////////////////////////////////
  include 'FA_Include_ValidacionExistenciasProductos.php';
  //aqui llama a la funcion MasDetalles Para traer informacion adicional del producto ya sea el lote o los productos que contiene el producto compuesto
  $Mas_Detalles = mysqli_real_escape_string($conn3, MasDetalles($codigoProd, $SinvDep_id));
  //////////////////////////////////////////////////////////////////


  $queryList = mysqli_query($conn3, "INSERT INTO operacioninv (usuario_id, codigoProd, cantidad, tipo, fecha, estado, costo, precio,SinvDep_id,Deposito_id_Origen,Descripcion,Mas_Detalles) 
                    VALUES ('$usuario_id', '$codigoProd','$cantidad', '$tipoOperacion', current_timestamp(), '0', '$costo', '$precio','$SinvDep_id','$Deposito_id','$descripcion','$Mas_Detalles');") or die(mysqli_error($conn3));




  if ($queryList != true) {
    echo "<script language='Javascript'> window.location='salidadeinventario'</script>";
  } else {
    echo "<script language='Javascript'> window.location='salidadeinventario'</script>";
  }
}



if (isset($_POST['GuardarOperacionSalida'])) {

  /////////////////////////////////////////////////////////////////////
  $Campo1 = mysqli_query($conn3, "show COLUMNS from opracioninvheader WHERE Field = 'Motivo';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `opracioninvheader` ADD `Motivo` TEXT NULL  COMMENT ' *Creado desde modulo de totalizar salida inventario*';");
  }
  ////////////////////////////////////////////////////////////////////


  date_default_timezone_set('America/Bogota');
  $date = date("Y-m-d");
  $usuario_id = $_POST['datos']['idUsuario'];
  $Motivo = $_POST['datos']['motivo'];

  $queryinconfig = mysqli_query($conn3, "SELECT * FROM  config where (ID_Usuario = '$usuario_id' or ID_Usuario = '{$_SESSION['ID_principal']}')");
  while ($rowinconfig = mysqli_fetch_array($queryinconfig)) {
    $salidaInv      = $rowinconfig['salidaInv'];
  }
  $salidaInv++;

  $tercero = (!empty($tercero) ? $tercero : 0);
  $nombre = "";
  $rut = "";

  mysqli_query($conn3, "INSERT INTO opracioninvheader (usuario_id, tipoDoc, fechaRegistro, cantidadRegistros, totalCosto, totalPrecio, cantidadTotal, numero, idTercero, nombre, rut,Motivo) VALUES 
            ('$usuario_id', '1', '$date', '0', '0', '0', '0', '$salidaInv', '$tercero', '$nombre', '$rut','$Motivo');") or die(mysqli_error($conn3));
  $idinvheader = mysqli_insert_id($conn3);

  $queryinoper = mysqli_query($conn3, "SELECT * FROM  operacioninv where (usuario_id = '$usuario_id' or usuario_id = '{$_SESSION['ID_principal']}')  and estado = 0  AND tipo = 1 ");
  while ($rowinoper = mysqli_fetch_array($queryinoper)) {

    $cantidad              = $rowinoper['cantidad'];
    $codigoProd          = $rowinoper['codigoProd'];
    $costo              = $rowinoper['costo'];
    $precio              = $rowinoper['precio'];
    $id                  = $rowinoper['id'];

    $CantidadTotal = $CantidadTotal + $cantidad;
    $cantidadRegistros++;
    $TotalCosto = $TotalCosto + ($costo * $cantidad);
    $TotalPrecio = $TotalPrecio + ($precio * $cantidad);

    /////////////////////////////////////////////////////////////////
    $SinvDep_id = $rowinoper['SinvDep_id'];
    //Actualizacion de la existencias e los productos y los
    $QueryExistencias = mysqli_query($conn3, "SELECT * FROM  SinvDep where id = $SinvDep_id");
    while ($RowExistencias = mysqli_fetch_array($QueryExistencias)) {
      $ExistenciaSinvDep = $RowExistencias['existencia'];
    }
    $ExistenciasFinales = $ExistenciaSinvDep - $cantidad;
    mysqli_query($conn3, "UPDATE SinvDep set existencia = $ExistenciasFinales where id = $SinvDep_id");
    ////////////////////////////////////////////////////////////////


    mysqli_query($conn3, "UPDATE operacioninv set estado = 1, tipoDoc = 1, fechaReg = '$date', numero = $salidaInv, operacioninvheader_id = '$idinvheader' WHERE usuario_id = '$usuario_id' and id = '$id'");
  }

  mysqli_query($conn3, "UPDATE config set salidaInv = $salidaInv WHERE ID_Usuario = '$usuario_id'");

  mysqli_query($conn3, "UPDATE opracioninvheader set cantidadRegistros = $cantidadRegistros,totalCosto = $TotalCosto,totalPrecio = $TotalPrecio,cantidadTotal = $CantidadTotal where id = '$idinvheader' ");

  //echo "UPDATE opracioninvheader set cantidadRegistros = $cantidadReg,totalCosto = $totalCosto,totalPrecio = $totalPrecio,cantidadTotal = $catidadTotal where id = '$idinvheader'";

  echo "<script language='Javascript'> window.location='Historial_ImprimirSalidaInventario.php?id={$idinvheader}';</script>";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//esto se usara para el apartado de la lista del deposito y en un campo hidden para totalizar la factura
$Deposito_id = "0";
$ID_Usuario  =  $_SESSION['ID'];
$resultado = mysqli_query($conn3, "SELECT * FROM  operacioninv where estado = 0 and  (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') AND tipo = '1' order by id");
while ($fila = mysqli_fetch_array($resultado)) {
  $Deposito_id = $fila["Deposito_id_Origen"];
}
if ($Deposito_id != "0" and $Deposito_id != "") {
  $DesabilitarDep = "readonly";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <br>

  <section class="content">

    <div class="box box-info" align="center">

      <div class="card-body">

        <div class="card-header-title font-size-lg text-capitalize font-weight-normal row">
          <div class="col-md-3">
            <a href="IN_Inventario" class="btn btn-block btn-outline-success btn-lg rounded-pill shadow">Nuevo Inventario</a>
          </div>
          <div class="col-md-6">
            <h2>Salida de Inventario</h2>
          </div>
          <div class="col-md-3">
            <ul class="nav nav-justified">
              <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" style="margin-bottom: 10px;" href="#tab-eg-0" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow active"><?= 'Nuevo' ?></a></li>
              <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" style="margin-bottom: 10px;" href="#tab-eg-1" class="btn btn-block btn-outline-secondary btn-lg rounded-pill shadow">Ver Todos</a></li>
            </ul>
          </div>
        </div>

        <div class="tab-content">
          <div class="tab-pane show active" id="tab-eg-0" role="tabpanel">
            <!-- nuevo -->
            <form id="FormularioSalidaInventario" class="form-group row" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
              <input type="hidden" name="usuario_id" value="<?= $_SESSION['ID'] ?>">

              <div class="form-group col-md-4">
                <label><strong> Depósito</strong></label>
                <select class="input-lg form-control" name="deposito" id="deposito" onchange="ActualizacionDeposito()" <?= $DesabilitarDep; ?> required>
                  <?php
                  $queryListDP = mysqli_query($conn3, "SELECT * from dep WHERE (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and activo = 1 ORDER BY id ASC");
                  while ($rowMotorizadoDP = mysqli_fetch_array($queryListDP)) {
                    $idDP = $rowMotorizadoDP['id'];
                    $descripcionDP = $rowMotorizadoDP['descripcion'];

                    if ($Deposito_id != "" and $Deposito_id == $idDP) {
                      echo '<option value="' . $idDP . '" selected>' . $descripcionDP . '</option>';
                    } else {
                      echo '<option value="' . $idDP . '">' . $descripcionDP . '</option>';
                    }
                  }
                  ?>
                </select>
                <?php
                if ($DesabilitarDep != "") {
                  echo '<script>document.getElementById("deposito").addEventListener("mousedown", function (e) {
                                      e.preventDefault(); // Evita que se abra el menú desplegable
                                      this.blur(); // Quítale el enfoque al elemento
                                  });</script>';
                }
                ?>
              </div>
              <div class="form-group col-md-4">
                <div class="form-group col-md-12">
                  <div align="left">
                    <label>Producto</label>
                  </div>
                  <select id="codigoProd" name="codigoProd" class="form-control select2" style="width: 100%;" required="required" onChange="CargarPrecioProducto();">
                    <option value="" selected="selected">Seleccione Producto</option>
                    <?php

                    $queryList = mysqli_query($conn3, "SELECT * FROM sinvetrios WHERE (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and estado = 1 order by ID");
                    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                      $descripcion     = $row_recordset32['descripcion'];
                      $ID              = $row_recordset32['ID'];

                      $tipo = $row_recordset32['tipo'];
                      $queryinv = mysqli_query($conn3, "SELECT * FROM  scategoria where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and id = $tipo LIMIT 1");
                      while ($rowinv = mysqli_fetch_array($queryinv)) {
                        $TipoInventario = $rowinv['tipo'];
                        $maneja_serial = $rowinv['maneja_serial'];
                      }

                      if (($TipoInventario == "1" and $maneja_serial != "1") or $TipoInventario == "5") {
                        echo "<option value='$ID'> $descripcion </option>";
                      }
                    }

                    ?>

                  </select>
                </div>
                <div id="Campo_Adicional_Producto" class="col-md-12">

                </div>
              </div>

              <div class="form-group col-md-4">
                <label>Cantidad</label>
                <input type="number" class="form-control input-lg" id="1" name="cantidad" placeholder="Cantidad" onChange="multiplicar();" required>
                <div align="left" id="informacion_existencia"></div>
              </div>

              <div class="form-group col-md-12">
                <br>
                <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="GuardarDetalleSalida">
                  <i class="fa fa-plus"></i>
                  Agregar
                </button>
              </div>

            </form>
            <!-- nuevo -->


            <div class="col-md-12">
              <table class="table table-striped table-bordered">
                <?php
                $tableColumna = [
                  'Fecha',
                  'Deposito',
                  'Descripción',
                  'Cantidad',
                  'Precio',
                  'Costo',
                  ''
                ]
                ?>
                <thead>
                  <tr>
                    <?php
                    foreach ($tableColumna as $columna) {
                      echo "<th>$columna</th>";
                    }
                    ?>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  //1-> Salida
                  //2-> Entrada
                  //3-> Transferencia
                  $queryOpera = "SELECT * from operacioninv where estado = 0 and (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and tipo = '1' order by id desc";
                  $resultOpera = mysqli_query($conn3, $queryOpera);
                  while ($rowOpera = mysqli_fetch_array($resultOpera)) {

                    $Descripcion = $rowOpera['Descripcion'];
                    $MasDetalles = $rowOpera['Mas_Detalles'];;
                    if ($MasDetalles != "") {
                      $Descripcion .= $MasDetalles;
                    }

                  ?>
                    <tr>
                      <td><?= $rowOpera['fecha'] ?></td>
                      <td><?= ($rowOpera['Deposito_id_Origen'] != '' ? funcionMaster($rowOpera['Deposito_id_Origen'], 'id', 'descripcion', 'dep') : '-') ?></td>
                      <td><?= $Descripcion ?></td>
                      <td><?= $rowOpera['cantidad'] ?></td>
                      <td><?= ($rowOpera['precio'] != '' ? $rowOpera['precio'] : '-') ?></td>
                      <td><?= ($rowOpera['costo'] != '' ? $rowOpera['costo'] : '-') ?></td>
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modelId<?= $rowOpera['id'] ?>">
                          <i class="fa fa-trash"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modelId<?= $rowOpera['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Eliminar <?= $rowOpera['id'] ?> - <?= ($rowOpera['Descripcion']) ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form id="modal-form<?= $rowOpera['id'] ?>">
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="">Motivo</label>
                                    <input type="text" class="form-control" name="datos[motivoEliminado]" value="#<?= $rowOpera['id'] ?>-Error:">
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="hidden" name="datos[estado]" value="2">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                  <button type="submit" class="btn btn-danger" onclick="$('#modal-form<?= $rowOpera['id'] ?>').automaticForm({type: 2,table: 'operacioninv', idUpdate: '<?= $rowOpera['id'] ?>', reload:'', page:'salidadeinventario'});">Eliminar</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <?php
                    foreach ($tableColumna as $columna) {
                      echo "<th>$columna</th>";
                    }
                    ?>
                  </tr>
                </tfoot>
              </table>
            </div>

            <?php
            // para tokenAutomaticForm
            // function tokenAutomaticForm(texto, usuario, numeros, type, table, idUpdate, reload, page, formulario)
            //$ttext = base64_encode(base64_encode($_SESSION['ID'] . ' - ' . $_SESSION['NOMBRE_USUARIO'] . ', necesita un código de autenticación para la Salida de Inventario'));
            //$tnumeros = base64_encode(base64_encode(funcionMaster($_SESSION['ID'], 'ID_Usuario', 'whatsapp', 'config')));

            //$tuser = base64_encode(base64_encode($_SESSION['ID']));
            ?>

            <form id="totalizar-operacionInv-form" class="form-group row">

              <input type="hidden" name="datos[tipo]" value="1">
              <input type="hidden" name="datos[idUsuario]" id="id_usuario_totalizar" value="<?= $_SESSION['ID'] ?>">
              <input type="hidden" name="datos[Deposito_id_Origen]" id="Deposito_id" value="<?= $Deposito_id ?>">
              <div class="col-md-12">
                <label for="">Motivo</label>
                <textarea name="datos[motivo]" class="form-control" required></textarea>
                <hr>
                <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="GuardarOperacionSalida" <?= (($Deposito_id != "0" and $Deposito_id != "") ? '' : 'disabled') ?> type="submit">Guardar</button>
              </div>
            </form>

          </div>


          <div class="tab-pane" id="tab-eg-1" role="tabpanel">
            <!-- lista -->
            <div class="row">
              <div class="col-md-12">
                <table class="table table-striped table-bordered">
                  <?php
                  $tableColumna = [
                    'Fecha',
                    'Cantidad de Productos',
                    'Costo Total',
                    'Precio Total',
                    'Motivo',
                    ''
                  ]
                  ?>
                  <thead>
                    <tr>
                      <?php
                      foreach ($tableColumna as $columna) {
                        echo "<th>$columna</th>";
                      }
                      ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $queryOpera = "SELECT * from opracioninvheader where tipoDoc = '1'and (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') order by id DESC";
                    $resultOpera = mysqli_query($conn3, $queryOpera);
                    while ($rowOpera = mysqli_fetch_array($resultOpera)) {

                    ?>
                      <tr>
                        <td><?= $rowOpera['fechaRegistro'] ?></td>
                        <td><?= $rowOpera['cantidadTotal'] ?></td>
                        <td><?= $rowOpera['totalCosto'] ?></td>
                        <td><?= $rowOpera['totalPrecio'] ?></td>
                        <td><?= $rowOpera['Motivo'] ?></td>
                        <td>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" data-toggle="modal" data-target="#modelId_<?= $rowOpera['id']; ?>">
                            Ver
                          </button>
                          <a href='Historial_ImprimirSalidaInventario.php?id=<?= $rowOpera['id']; ?>' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style='width: 100%;'><i class='fa fa-print' title='Imprimir'> Imprimir</i></a>

                          <!-- Modal -->
                          <div class="modal fade" id="modelId_<?= $rowOpera['id']; ?>" tabindex="99999" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document" style="z-index: 99999999 !important">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Salida de Inventario Detallada</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <table class="table table-striped table-bordered display responsive">
                                    <?php
                                    $tableColumna2 = [
                                      'Fecha',
                                      'Deposito Origen',
                                      'Descripción',
                                      'Cantidad',
                                      'Costo',
                                      'Precio'
                                    ]
                                    ?>
                                    <thead>
                                      <tr>
                                        <?= implode("\n", array_map(fn ($col) => "<th>$col</th>", $tableColumna2)) ?>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $queryOpera2 = "SELECT * from operacioninv where estado = 1 and tipo = '1' and operacioninvheader_id = '{$rowOpera['id']}' order by id desc";
                                      $resultOpera2 = mysqli_query($conn3, $queryOpera2);
                                      while ($rowOpera2 = mysqli_fetch_array($resultOpera2)) {
                                      ?>
                                        <tr>
                                          <td><?= $rowOpera2['fechaReg'] ?></td>
                                          <td><?= ($rowOpera2['Deposito_id_Origen'] != '' ? funcionMaster($rowOpera2['Deposito_id_Origen'], 'id', 'descripcion', 'dep') : '-') ?></td>
                                          <td><?= $rowOpera2['Descripcion'] ?></td>
                                          <td><?= $rowOpera2['cantidad'] ?></td>
                                          <td><?= $rowOpera2['costo'] ?></td>
                                          <td><?= $rowOpera2['precio'] ?></td>
                                        </tr>
                                      <?php
                                      }
                                      ?>
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <?php
                                        foreach ($tableColumna2 as $columna2) {
                                          echo "<th>$columna2</th>";
                                        }
                                        ?>
                                      </tr>
                                    </tfoot>
                                  </table>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <?php
                      foreach ($tableColumna as $columna) {
                        echo "<th>$columna</th>";
                      }
                      ?>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>

          </div>
        </div>

        <input type="hidden" name="ID_Doctor" class="form-control input-lg input-lg" value="<?php echo $_SESSION['ID'] ?>">


      </div>




  </section>

  <?php echo $mensaje_registro_patients; ?>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php include 'footer.php' ?>
<!-- <script src="./plugins/automaticForm/tokenMaster.js"></script> -->


<script>
  $(document).on('focus', ".blur", function() {
    $(this).blur();
  });
</script>

<script>
  function CargarPrecioProducto() {
    var codigoProd = $("#codigoProd").val();
    var deposito = $("#deposito").val();

    ////////////////////////// EVITAR ERRORES ///////////////
    var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
    DivCampoPersonalizado.innerHTML = "";
    $('#1').val("");
    document.getElementById('informacion_existencia').innerHTML = "";
    /////////////////////////////////////////////////////////

    if (codigoProd != "") {
      $.ajax({
        type: "POST",
        url: "FA_Ajax_CargarPrecioYLista.php",
        data: {
          codigoProd: codigoProd,
          deposito: deposito,
          Tipo_Consulta: "Cargar Informacion Salida"
        },
        success: function(response) {

          var Respuesta = JSON.parse(response);
          //console.log (Respuesta);

          // codigo para el apartado de lotes
          if (Respuesta.Lista == true && Respuesta.Tipo == "Lotes") {

            var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
            // Crea el elemento select
            var selectElement = document.createElement('select');
            selectElement.className = "form-control input-lg";
            selectElement.setAttribute('required', 'required');
            selectElement.setAttribute('name', 'SinvDep_id');
            selectElement.setAttribute('width', '100%');

            var optionElement = document.createElement('option');
            optionElement.value = '';
            optionElement.textContent = 'Seleccione';
            selectElement.appendChild(optionElement);

            // Crea el elemento label
            var labelElement = document.createElement('label');
            labelElement.textContent = 'Lotes';

            DivCampoPersonalizado.appendChild(labelElement);
            DivCampoPersonalizado.appendChild(document.createElement('br'));

            var Options = Respuesta.Detalles;
            //console.log(Options);
            // Recorre el JSON y agrega opciones al select
            Object.keys(Options).forEach(function(key) {
              var item = Options[key];
              var optionElement = document.createElement('option');
              optionElement.value = item.id;
              optionElement.textContent = item.Nombre + ` [${item.Existencia}] [${item.Vencimiento}] `;
              optionElement.dataset.existencias = item.Existencia;

              if (parseInt(item.Existencia) <= 0) {
                //optionElement.disabled = true;
                optionElement.style.backgroundColor = '#ff00004d';
              }

              selectElement.appendChild(optionElement);
            });

            // Agrega la función onchange al select
            selectElement.onchange = function() {
              var selectedOption = this.options[this.selectedIndex];
              var existencias = selectedOption.dataset.existencias;

              //////////////////////////////////////////////////////////////////////////
              var Mensaje = "Existencia Disponible: <u><b>" + existencias + "</b></u>";
              //info de las existencias informacion_existencia
              document.getElementById('informacion_existencia').innerHTML = Mensaje;
              ///////////////////////////////////////////////////////////////////////////
              // Establecer el valor máximo para el elemento con id=1 que es el campo cantidad
              var elemento1 = document.getElementById('1');
              elemento1.max = existencias;
            };

            DivCampoPersonalizado.appendChild(selectElement);

          }
          //codigo para el apartado de producto simple
          else if (Respuesta.Tipo == "Simple") {

            var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
            var Options = Respuesta.Detalles;
            //console.log(Options);

            // Crea el elemento input hidden
            var input = document.createElement('input');
            input.setAttribute('type', 'hidden');
            input.setAttribute('name', 'SinvDep_id');

            Object.keys(Options).forEach(function(key) {
              var item = Options[key];
              input.value = item.id;

              var elemento1 = document.getElementById('1');
              elemento1.max = item.Existencia;

              ////////////////////
              var Mensaje = "Existencia Disponible: <u><b>" + item.Existencia + "</b></u>";
              document.getElementById('informacion_existencia').innerHTML = Mensaje;
              //////////////////////

            });
            DivCampoPersonalizado.appendChild(input);

          }
          // si no tiene un tipo de clasificacion nos indicara este error
          else if (Respuesta.Tipo == "Error") {

            alert('el tipo del producto tiene un error con la clasificacion del inventario o no existe el registro para el deposito elegido');
            ActualizacionDeposito();
          }


          //$('#2').val(Respuesta.Precio);

        }
      });
    } else {
      $("#codigoProd").val("").trigger('change');
    }

  }

  function ActualizacionDeposito() {

    var divPersonalizado = document.getElementById('Campo_Adicional_Producto');
    divPersonalizado.innerHTML = "";

    $('#1').val("");
    document.getElementById('1').removeAttribute('max');
    $("#codigoProd").val("").trigger('change');

  }
  /*
  //////////////////////////////////////Validar Existencias //////////////////////////////////////
  // si no necesitan validar las existencias comentar este codigo
  document.getElementById('totalizarFactura').addEventListener('submit', function(event) {
    event.preventDefault(); // Detiene el envío predeterminado del formulario
    
    var usuario_id = $("#id_usuario_totalizar").val();
    var cliente_id = $("#id_cliente_totalizar").val();
    var deposito = $("#Deposito_id").val();
    var tipo ="1";//1-> Factura General | revisar el campo tipo de soperacioninv
    $.ajax({
        type: "POST",
        url: "FA_Ajax_VerificarCantidadesAFacturar.php",
        data: {
          usuario_id: usuario_id,
          cliente_id: cliente_id,
          deposito:deposito,
          tipo:tipo,
          Tipo_Consulta: "Verificar Existencia"
        },
        success: function(response) {
          console.log(response);
          var Respuesta = JSON.parse(response);
          var Detalles = Respuesta.Detalles;
          if(Respuesta.Enviar==false){
            var Mensaje = "";
            var MensajeEstatico = "";
            Object.keys(Detalles).forEach(function(key) {
              var item = Detalles[key];
              if(item.Estado==false){
                Mensaje += item.Nombre+": ";
                Mensaje += "\r\nExistencias: "+item.Existencia+"\r\n";
                Mensaje += "Existencias a descontar en la factura actual: "+item.Descontar+" . \r\n   ";
                MensajeEstatico += item.Motivo;
              }
              
            });

            Mensaje = Mensaje+" "+MensajeEstatico;

            alert(Mensaje);
          }
          else{
            //alert("Existencia Disponible");
            document.getElementById('totalizarFactura').submit();
          }
        }
      });
    
  });
  //////////////////////////////////////Validar Existencias //////////////////////////////////////
  */
  //////////////////////////////////////Validar Existencias //////////////////////////////////////
  // si no necesitan validar las existencias comentar este codigo
  document.getElementById('totalizar-operacionInv-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Detiene el envío predeterminado del formulario

    var usuario_id = $("#id_usuario_totalizar").val();
    //var cliente_id = $("#id_cliente_totalizar").val();
    var deposito = $("#Deposito_id").val();
    var tipoInventario = "1"; //3-> transferencia
    $.ajax({
      type: "POST",
      url: "FA_Ajax_VerificarCantidadesAFacturar.php",
      data: {
        usuario_id: usuario_id,
        deposito: deposito,
        tipoInventario: tipoInventario,
        Tipo_Consulta: "Verificar Existencia Operaciones Inventario Transferencia"
      },
      success: function(response) {
        console.log(response);
        var Respuesta = JSON.parse(response);
        var Detalles = Respuesta.Detalles;
        if (Respuesta.Enviar == false) {
          var Mensaje = "";
          var MensajeEstatico = "";
          Object.keys(Detalles).forEach(function(key) {
            var item = Detalles[key];
            if (item.Estado == false) {
              Mensaje += item.Nombre + ": ";
              Mensaje += "\r\nExistencias: " + item.Existencia + "\r\n";
              Mensaje += "Existencias a descontar en la operacion actual: " + item.Descontar + " . \r\n   ";
              MensajeEstatico = item.Motivo;
            }

          });

          Mensaje = Mensaje + " " + MensajeEstatico;

          alert(Mensaje);
        } else {
          //alert("Existencia Disponible");
          //document.getElementById('totalizarFactura').submit();

          $('#totalizar-operacionInv-form').automaticForm({
            type: 1,
            table: 'operacioninvHeader',
            // token: 'si',
            // tokenText: '<?= $ttext ?>',
            // tokenUser: '<?= $tuser ?>',
            // tokenNumbers: '<?= $tnumeros ?>',
            reload: '',
            page: 'salidadeinventario',
            post: true
          });

        }
      }
    });

  });
  //////////////////////////////////////Validar Existencias //////////////////////////////////////
</script>