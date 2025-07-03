<?php 

include 'header.php';
include 'menu.php';

///////////////////////////////////////////////////////////////////////////
$_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "Asignacion_Activos";

if (isset($_POST['Guardar_Informacion_Pagina'])) {

  $Arreglo = $_POST["Arreglo"];
  $tabla = mysqli_query($conn3, "SHOW TABLES LIKE '{$Nombre_Tabla}'");
  $nrowtabla = mysqli_num_rows($tabla);
  if ($nrowtabla == 0) {
      foreach ($Arreglo as $key => $value) {
          $Campos .= "`{$key}` text DEFAULT '',";
      }
      $Campos = trim($Campos, ',');

      $query = "CREATE TABLE `{$Nombre_Tabla}` (
      `id` int(11) NOT NULL,
      `usuario_id` int(11) NOT NULL,
      `Fecha` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , 
      {$Campos},
      `Tipo_Asignacion` INT(11) NULL DEFAULT '1' COMMENT '1 = Asignado, 2 = Desasignado',
      `Creacion_Dinamica` text DEFAULT '',
      `Activo` INT(11) NULL DEFAULT '1'
      ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

      $creaciontabla = mysqli_query($conn3, $query);
      if (!$creaciontabla) {
          echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
      } else {
          mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD PRIMARY KEY (`id`);");
          mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
      }
  } else {
      if ($nrowtabla == 1) {

          $Campo1 = mysqli_query($conn3, "show COLUMNS from {$Nombre_Tabla} WHERE Field = 'Creacion_Dinamica';");
          $nrowCampo1 = mysqli_num_rows($Campo1);
          if ($nrowCampo1 == "1") {
              foreach ($Arreglo as $key => $value) {
                  $Campo = mysqli_query($conn3, "show COLUMNS from {$Nombre_Tabla} WHERE Field = '{$key}';");
                  $nrowCampo = mysqli_num_rows($Campo);
                  if ($nrowCampo == 0) {
                      mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD `{$key}` TEXT NULL;");
                  }
              }
          } else {
              echo "<script language='Javascript'> alert('Tabla No fue creada Dinamicamente');</script>";
              // si bota este mensaje es por que la tabla no esta creado el campo *Creacion_Dinamica* sirve para que no se use este modulo en tablas ya preexistentes
          }
      }
  }

  $Campos = "";
  $Valores = "";
  foreach ($_POST["Arreglo"] as $key => $value) {
      $Campos .= $key . ',';
      $Valores .= "'{$value}',";
  }
  $Campos = trim($Campos, ',');
  $Valores = trim($Valores, ',');

  $usuario_id = $_POST['usuario_id'];
  $Tipo_Asignacion = "1";

  $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (usuario_id,Tipo_Asignacion,{$Campos}) VALUES ('$usuario_id','$Tipo_Asignacion',{$Valores});");

  $Serial = $_POST['Arreglo']['Serial_id'];

  mysqli_query($conn3, "UPDATE SinvSerial set Activo = 2 where id = $Serial  LIMIT 1");

  $ruta = htmlentities($_SERVER['PHP_SELF']);
  //$ruta = str_replace('.php', '', $ruta);
  if ($queryList != true) {
      echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Guardar la Asignacion'</script>";
  } else {
      echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Guardo La Asignacion Correctamente'</script>";
  }
}

///////////////////////////////////////////////////////////////////////////


#Cierre
if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];


?>

              <!-- Content Wrapper. Contains page content -->
              <div class="content-wrapper">

                <br>

                <section class="content">

                  <div class="box box-info" align="center">

                    <div class="card-body">

                      <div class="card-header-title font-size-lg text-capitalize font-weight-normal row" style="background-color:#17a2b812;padding: 20px;">
                        <div class="col-md-3">
                        <?php if ($_GET['Editar']) : ?>
                          <a href="IN_AsignarSerialEmpleado.php" id="boton_modulo_nuevo" class="btn btn-block btn-outline-success btn-lg rounded-pill shadow">Nuevo</a>
                        <?php endif ?>
                        </div>
                        <div class="col-md-6" style="align-self: center;">
                          <h2>Asignar Activo Cliente</h2>
                        </div>
                        <div class="col-md-3">
                          <ul class="nav nav-justified">
                            <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" id="boton_modulo_informacion" style="margin-bottom: 10px;" href="#tab-eg-0" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow active"><?= ($_GET['Editar']) ? 'Editar <br>' . funcionMaster($_GET['Editar'], 'id', 'nombre', 'Siva') : 'Nuevo' ?></a></li>
                            <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" id="boton_modulo_tabla" style="margin-bottom: 10px;" href="#tab-eg-1" class="btn btn-block btn-outline-secondary btn-lg rounded-pill shadow">Ver Todos</a></li>
                          </ul>
                        </div>
                      </div>

                      <div class="tab-content">
                        <div class="tab-pane show active" id="tab-eg-0" role="tabpanel">
                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="row" enctype="multipart/form-data" id="FormularioInformacion">

                                <div class="form-group col-md-12">
                                    <hr>
                                </div>
                                
                                <div class="form-group col-md-12">
                                  <label>Empleado</label>
                                  <select class="form-control input-lg select2" name="Arreglo[Personal_id]" required>
                                    <option value="" selected>Seleccione</option> 
                                    <?php
                                      $QueryEmpleado = mysqli_query($conn3, "SELECT * FROM nominaEmpresasPersonal WHERE activo = 1");
                                      while ($RowEmpleado = mysqli_fetch_array($QueryEmpleado)) {
                                          $id = $RowEmpleado['id'];
                                          $nombre = utf8_encode($RowEmpleado['nombre']);
                                          echo "<option value='$id'> $nombre  </option>";
                                      }
                                    ?>
                                  </select>
                              </div>

                              <div class="form-group col-md-6">
                                <div align="left"> Deposito </div>
                                <select class="form-control input-lg select2" name="Arreglo[Deposito_id]" id="Deposito_id" onchange="ConsultarSerialProductoDeposito()"required>
                                    <option value="" selected>Seleccione</option> 
                                    <?php
                                      $queryListDP = mysqli_query($conn3, "SELECT * from dep WHERE activo = 1 ORDER BY id ASC");
                                      while ($rowMotorizadoDP = mysqli_fetch_array($queryListDP)) {
                                          $idDP = $rowMotorizadoDP['id'];
                                          $descripcionDP = $rowMotorizadoDP['descripcion'];
        
                                          if($Deposito_id!="" AND $Deposito_id == $idDP){
                                            echo '<option value="' . $idDP . '" selected>' . $descripcionDP . '</option>';
                                            }else{
                                            echo '<option value="' . $idDP . '">' . $descripcionDP . '</option>';
                                            }
                                                                      
                                      }
                                    ?>
                                  </select>
                              </div>
                              
                              <div class="form-group col-md-6">
                                <div align="left"> Producto </div>
                                <select class="form-control input-lg select2" name="Arreglo[idProducto]" id="idProducto" style="width: 100%;" onchange="ConsultarSerialProductoDeposito()" required>
                                    <option value="" selected>Seleccione</option>
                                  <?php
                                        //solo deben aparecer los productos activos
                                        $queryList = mysqli_query($conn3, "SELECT si.* FROM sinvetrios si
                                        JOIN scategoria sca ON si.tipo = sca.id
                                        WHERE 1=1
                                        AND si.estado = 1
                                        AND sca.tipo in (6)");
                                        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                            $descripcion     = $row_recordset32['descripcion'];
                                            $ID              = $row_recordset32['ID'];

                                            echo "<option value='$ID'> $descripcion </option>";
                                        }
                                        

                                  ?>
                                </select>
                              </div>

                              <div class="form-group col-md-12">
                                <div align="left"> Serial </div>
                                <select class="form-control input-lg select2" title="" name="Arreglo[Serial_id]" id="Serial"  style="width: 100%;" required>
                                </select>
                              </div>


                                <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">
                                
                                <div class="form-group col-md-12">
                                    <hr>
                                </div>

                                    <div class="col-sm-12">
                                        <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow" name="Guardar_Informacion_Pagina">
                                                <h2> <strong> G u a r d a r </strong> </h2>
                                            </button></center>
                                    </div>


                           </form>


                        </div>


                        <div class="tab-pane" id="tab-eg-1" role="tabpanel">
                          <!-- lista -->
                          <div class="row">
                            <div class="col-md-12">

                              <div class="form-group col-md-12">
                                    <hr>
                              </div>

                              <table class="table table-striped table-bordered">
                                <?php
                                $tableColumna = [
                                  'Nombre',
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

                                  $ResultadoAsignacion = mysqli_query($conn3, "SELECT * FROM nominaEmpresasPersonal WHERE activo = 1");
                                  while ($RowAsignacion = mysqli_fetch_assoc($ResultadoAsignacion)) {
                                    $id = $RowAsignacion['id'];
                                    $nombre = $RowAsignacion['nombre'];

                                    echo "<tr>
                                        <th scope='row' width='2%'>{$id}</th>
                                        <td width='20%' align='center'>{$nombre}</td>";

                                    echo "<td width='20%' align='center'><font color='#04CC05'> <a href='IN_HistorialSerialEmpleado.php?id={$id}' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style='width: 100%;'><i class='fa fa-list' title='Activos'> Activos Asignados </i></a></font><br>
                                    </td></tr>";
                                    
                                    

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

                    </div>




                </section>

                <!-- /.content -->
              </div>
              <!-- /.content-wrapper -->


  <?php include 'footer.php' ?>

  <script>
    function ConsultarSerialProductoDeposito(){
      var Deposito_id = $("#Deposito_id").val();
      var idProducto = $("#idProducto").val();

      $('#Serial').html('');

      if(Deposito_id != "" && idProducto != ""){
        
        $.ajax({
          type: "POST",
          url: "IN_AjaxActivos.php",
          data: {
            Deposito_id: Deposito_id,
            idProducto: idProducto,
            Tipo_Consulta: "Cargar Seriales Modulo AsignarSerialEmpleado"
          },
          success: function(response) {
              var data = JSON.parse(response);

              var options = ['<option value="">Seleccione</option>']; // Agregar la opción "Seleccione" al principio

              // Iterar sobre el objeto data y agregar las opciones al arreglo options
              for (var key in data) {
                if (data.hasOwnProperty(key)) {
                  var id = data[key].id;
                  var serial = data[key].Serial;
                  options.push('<option value="' + id + '">' + serial + '</option>');
                }
              }
              // Asignar las opciones al select
              $('#Serial').html(options.join(''));

          }
        });

      }
      

    }
  </script>