<?php
include 'header.php';
include 'menu.php';

// -----------------------------------------------------
// impoltante tener estas dos variables para el formulario auotomatico
$tabla = "scategoria";
$idUpdate = base64_decode($_GET['C']);
// -----------------------------------------------------

//esto es para los campos adicionales para contabilidad
$queryList = mysqli_query($conn3, "SELECT * FROM  {$tabla} where id=$idUpdate limit 1");
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    foreach ($rowMotorizado as $key => $value) {

      $tipo_departamento = $rowMotorizado['tipo'];

      $maneja_serial = $rowMotorizado['maneja_serial'];
      $idCuentaContable = $rowMotorizado['idCuentaContable'];
      $maneja_serial3 = $rowMotorizado['maneja_serial3'];
    }
  }
}


?>
<!--
<div class="app-inner-layout__wrapper">
  <div class="app-inner-layout__content">
    <div class="tab-content">
      <div class="container-fluid">
        <div class="mb-3 card">
>
          <div class="no-gutters row">
            <div class="col-md-12">

              -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <br>

  <section class="content">

    <div class="box box-info" align="center">

      <div class="card-body">

        <div class="card-header-title font-size-lg text-capitalize font-weight-normal row">
          <div class="col-md-3">
            <?php if ($idUpdate) : ?>
              <a href="IN_tipo_inventarios" class="btn btn-block btn-outline-success btn-lg rounded-pill shadow">Nuevo</a>
            <?php endif ?>
          </div>
          <div class="col-md-6">
            <h2>Registro de Categorías </h2>
          </div>
          <div class="col-md-3">
            <!-- <ul class="nav nav-justified">
              <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" style="margin-bottom: 10px;" href="#tab-eg-0" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow active"><?= ($idUpdate) ? 'Editar ' . funcionMaster($idUpdate, 'id', 'descripcion', $tabla) : 'Nuevo' ?></a></li>
               <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" style="margin-bottom: 10px;" href="#tab-eg-1" class="btn btn-block btn-outline-secondary btn-lg rounded-pill shadow">Ver Todos</a></li> 
            </ul> -->
          </div>
        </div>


        <div class="tab-content">
          <div class="tab-pane show active" id="tab-eg-0" role="tabpanel">
            <!-- nuevo -->
            <form id="dep-form">
              <div class="form-row">

                <div class="form-group col-md-12">
                  <div align="left"> Nombre </div>
                  <input type="text" class="form-control input-lg" id="descripcion" name="datos[descripcion]" placeholder="Descripcion" required>
                </div>
                <br>
                <div class="form-group col-md-12">
                  <hr>
                </div>

                <div class="form-group col-md-12 row">
                  <div class="col-md-8">
                    <div align="left">Notas</div>

                    <!-- /.box-header -->
                    <div class="box-body pad">

                      <textarea id="nota" name="datos[nota]" class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                    </div>
                  </div>
                  <?php if ($idUpdate == ""): ?>
                    <div class="col-md-4 text-left">
                      <div align="left">Clasificación</div>
                      <select name="datos[tipo]" id="tipo" class="form-control input-lg" id="" onchange="EventoAgregarCampos();" required>
                        <option value="" selected>Seleccione</option>
                        <option value="1">Productos Simples</option>
                        <option value="2">Servicios</option>
                        <option value="3">Productos Compuestos</option>
                        <option value="5">Productos Con Lotes</option>
                        <option value="6">Activos Contables</option>
                      </select>
                      <br>
                    </div>
                  <?php else:
                    echo '<input type="hidden" name="datos[tipo]" id="tipo" value="' . $tipo_departamento . '">';
                  endif; ?>

                  <div class="col-md-12 row" id="Div_DatosAdicionales">

                  </div>


                  <input type="hidden" name="datos[usuario_id]" value="<?php echo $_SESSION['ID'] ?>">
                  <input type="hidden" name="datos[ID_principal]" value="<?= $_SESSION['ID_principal'] ?>">

                </div>
                <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Guardar</button>


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
                    'Descripción',
                    'Notas',
                    'Tipo de Producto',
                    'Opciones'
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
                    $queryscategoria = "SELECT * from scategoria where (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}') and activo = 1";
                    $resultscategoria = mysqli_query($conn3, $queryscategoria);
                    while ($rowscategoria = mysqli_fetch_assoc($resultscategoria)) {
                    ?>
                      <tr class="center text-center">
                        <td><?= $rowscategoria['descripcion'] ?></td>
                        <td><?= $rowscategoria['nota'] ?></td>
                        <td><?= ($rowscategoria['tipo'] == 1 ? 'Productos' : ($rowscategoria['tipo'] == 2 ? 'Servicios' : ($rowscategoria['tipo'] == 3 ? 'Productos compuestos' : ($rowscategoria['tipo'] == 5 ? 'Productos con Lotes' : 'Activos Contabilidad')))) ?></td>
                        <td>
                          <a href="IN_tipo_inventarios?C=<?= base64_encode($rowscategoria['id']) ?>" class="btn btn-light" title="editar">
                            <i class="fas fa-edit"></i>
                          </a>
                          <button class="btn btn-danger" title="eliminar" onclick="alerts({title: 'Seguro que desea eliminar este registro?',text: '',icon:'info',update: `0|/|activo|/|<?= $tabla ?>|/|<?= $rowscategoria['id'] ?>|/|IN_tipo_inventarios` });">
                            <i class="fas fa-close"></i>
                          </button>
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
                  </tfoot>
                </table>
              </div>
            </div>

          </div>
        </div>

        <input type="hidden" name="ID_Doctor" class="form-control input-lg input-lg" value="<?php echo $_SESSION['ID'] ?>">
<br>
<hr>
<br>
<div class="row">
      <div class="col-md-12">
        <h1>Lista de Categorias Creadas</h1>
        <br>
        <table class="table table-striped table-bordered">
          <?php
          $tableColumna = [
            'Descripción',
            'Notas',
            'Tipo de Producto',
            'Opciones'
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
            $queryscategoria = "SELECT * from scategoria where (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}') and activo = 1";
            $resultscategoria = mysqli_query($conn3, $queryscategoria);
            while ($rowscategoria = mysqli_fetch_assoc($resultscategoria)) {
            ?>
              <tr class="center text-center">
                <td><?= $rowscategoria['descripcion'] ?></td>
                <td><?= $rowscategoria['nota'] ?></td>
                <td><?= ($rowscategoria['tipo'] == 1 ? 'Productos' : ($rowscategoria['tipo'] == 2 ? 'Servicios' : ($rowscategoria['tipo'] == 3 ? 'Productos compuestos' : ($rowscategoria['tipo'] == 5 ? 'Productos con Lotes' : 'Activos Contabilidad')))) ?></td>
                <td>
                  <a href="IN_tipo_inventarios?C=<?= base64_encode($rowscategoria['id']) ?>" class="btn btn-light" title="editar">
                    <i class="fas fa-edit"></i>
                  </a>
                  <button class="btn btn-danger" title="eliminar" onclick="alerts({title: 'Seguro que desea eliminar este registro?',text: '',icon:'info',update: `0|/|activo|/|<?= $tabla ?>|/|<?= $rowscategoria['id'] ?>|/|IN_tipo_inventarios` });">
                    <i class="fas fa-close"></i>
                  </button>
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
          </tfoot>
        </table>
      </div>
    </div>
      </div>




  </section>

  

  <?php echo $mensaje_registro_patients; ?>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



</div>
</div>
</div>
</div>
</div>
</div>


<?php include 'footer.php' ?>

<script>
  function EventoAgregarCampos() {

    var Div_DatosAdicionales = document.getElementById('Div_DatosAdicionales');
    var CamposAgregar = "";
    var tipo = document.getElementById('tipo').value;
    if (tipo == 5) {
      let input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'datos[maneja_lote]';
      input.id = 'maneja_lote';
      input.value = 1;
      document.querySelector('#tipo').appendChild(input);
    } else if (tipo == 1) {

      CamposAgregar += `
        
        <div class="form-group col-md-6">
            <label>Maneja Serial</label>
            <select class="form-control" name="datos[maneja_serial]" id="maneja_serial" class="form-control input-lg" onchange="HabilitarCampoSerial()">
              <option value="0" selected>No</option>
              <option value="1">Si</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label>Carácter Serial</label>
            <input type="text" class="form-control input-lg SoloCaracteres" id="CaracterSerial" name="datos[caracter_serial]" placeholder="A"  maxlength="1" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);SoloCaracteres(this);" readonly>
        </div>`;
    } else if (tipo == 6) {

      CamposAgregar += `
        
        <div class="form-group col-md-6">
            <label>Maneja Serial</label>
            <select class="form-control" name="datos[maneja_serial]" id="maneja_serial" class="form-control input-lg" onchange="HabilitarCampoSerial()">
              <option value="0" selected>No</option>
              <option value="1">Si</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label>Carácter Serial</label>
            <input type="text" class="form-control input-lg SoloCaracteres" id="CaracterSerial" name="datos[caracter_serial]" placeholder="A"  maxlength="1" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);SoloCaracteres(this);" readonly>
        </div>

        <div class="form-group col-md-6">
            <label>Cuenta Contable</label>
            <select class="input-lg form-control select2" name="datos[idCuentaContable]" id="idCuentaContable">
              <option value="0" selected>Seleccione</option>
              <?php
              $queryList = mysqli_query($conn3, "SELECT * FROM CCuentas WHERE activo = 1 order by id ASC");
              // $nrowl = mysqli_num_rows($queryList);
              while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                $idC = $row_recordset32['id'];
                $descripcionC = utf8_encode($row_recordset32['descripcion']);
                $detalleC = $row_recordset32['detalle'];
                echo "<option value='$idC'>$idC | $descripcionC  </option>";
              }
              ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>Centro de Costo</label>
            <select class="input-lg form-control select2" name="datos[idCentroCosto]" id="idCentroCosto">
              <option value="0" selected>Sin Centro de Costo</option>
              <?php
              $queryList = mysqli_query($conn3, "SELECT * FROM CcentroCostos WHERE (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and estado = 1 order by id ASC");
              // $nrowl = mysqli_num_rows($queryList);
              while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                $idC = $row_recordset32['id'];
                $descripcionC = utf8_encode($row_recordset32['descripcion']);
                echo "<option value='$idC'> $descripcionC  </option>";
              }
              ?>
            </select>
        </div>
                            
        `;
    }

    Div_DatosAdicionales.innerHTML = CamposAgregar;
  }

  function HabilitarCampoSerial() {
    var tipo = document.getElementById('maneja_serial').value;

    document.getElementById('CaracterSerial').value = "";

    if (tipo == "1") {
      document.getElementById('CaracterSerial').readOnly = false;
      document.getElementById('CaracterSerial').require = true;
    } else {
      document.getElementById('CaracterSerial').readOnly = true;
      document.getElementById('CaracterSerial').require = false;
    }
  }

  function SoloCaracteres(valor1) {
    // Obtén el valor actual del campo
    var valor = $(valor1).val();

    // Remueve caracteres no alfabéticos y convierte a mayúsculas
    valor = valor.replace(/[^a-zA-Z]/g, '').toUpperCase();

    // Actualiza el valor del campo
    $(valor1).val(valor);
  }











  function EventoAgregarCamposEditar() {
    var tipo = document.getElementById('tipo').value;
    if (tipo == 5) {
      let input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'datos[maneja_lote]';
      input.id = 'maneja_lote';
      input.value = 1;
      document.querySelector('#tipo').appendChild(input);
    } else if (tipo == 6) {
      var Div_DatosAdicionales = document.getElementById('Div_DatosAdicionales');
      Div_DatosAdicionales.innerHTML = `
        
        <div class="form-group col-md-6">
            <label>Cuenta Contable</label>
            <select class="input-lg form-control" name="datos[idCuentaContable]" id="idCuentaContable">
              <option value="0" selected>Seleccione</option>
              <?php
              $queryList = mysqli_query($conn3, "SELECT * FROM CCuentas WHERE activo = 1 order by id ASC");
              // $nrowl = mysqli_num_rows($queryList);
              while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                $idC = $row_recordset32['id'];
                $descripcionC = utf8_encode($row_recordset32['descripcion']);
                $detalleC = $row_recordset32['detalle'];
                echo "<option value='$idC'>$idC | $descripcionC  </option>";
              }
              ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>Centro de Costo</label>
            <select class="input-lg form-control" name="datos[idCentroCosto]" id="idCentroCosto">
              <option value="0" selected>Sin Centro de Costo</option>
              <?php
              $queryList = mysqli_query($conn3, "SELECT * FROM CcentroCostos WHERE (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and estado = 1 order by id ASC");
              // $nrowl = mysqli_num_rows($queryList);
              while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                $idC = $row_recordset32['id'];
                $descripcionC = utf8_encode($row_recordset32['descripcion']);
                echo "<option value='$idC'> $descripcionC  </option>";
              }
              ?>
            </select>
        </div>
                            
        `;
    } else {
      var Div_DatosAdicionales = document.getElementById('Div_DatosAdicionales');
      Div_DatosAdicionales.innerHTML = ``;
    }



  }
</script>

<script>
  // formulario automatico
  $(document).ready(function() {
    timezone = Intl.DateTimeFormat().resolvedOptions().timeZone.split("/");
    $('#dep-form').creatorForm({
      automaticForm: { // formulario automatico enviamos tipo y el id
        type: <?= $idUpdate ? 2 : 1 ?>, // donde 1 es para insertar y 2 es para actualizar
        idUpdate: <?= $idUpdate ? $idUpdate : "''" ?>, // este caso solo se llena si es tipo 2 aqui va el id de la tabla
      },
      sweetalert2: false, // alteras
      btnReferences: '#configForm', // ahorita nada
      contentReferences: '#dep-form', // formulario que contiene los datos
      table: '<?= $tabla ?>', // tabla a gestionar
      reload: '', // reload pa actualizar
      page: 'IN_tipo_inventarios', // aqui va el php o pantalla para recargar
    });

    <?php
    if ($_GET['C']) {
    ?>
      EventoAgregarCamposEditar();
      // Esta función se ejecutará cuando cambie el valor de #idCentroCosto
      $('#idCentroCosto, #idCuentaContable  ').on('change', function() {
        actualizarSelect2();
      });
      // Función para actualizar Select2 y otros elementos según el valor seleccionado
      function actualizarSelect2() {
        var valueidcontable = document.getElementById('idCuentaContable').value;
        var valueidcentrocosto = document.getElementById('idCentroCosto').value;

        $("#idCuentaContable > option[value='" + valueidcontable + "']").prop("selected", true);
        $('#idCuentaContable').select2();

        $("#idCentroCosto > option[value='" + valueidcentrocosto + "']").prop("selected", true);
        $('#idCentroCosto').select2();
      }



    <?php
    }
    ?>
  })
</script>