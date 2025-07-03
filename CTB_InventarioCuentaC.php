<?php include 'header.php';
include 'menu.php';

///////////////////////////////////////////////////////////////////////////
$Nombre_Tabla = "sinvetrios";

if (isset($_POST['Actualizar_Informacion_Pagina'])) {

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sinvetrios WHERE Field = 'idCuentaContable';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sinvetrios` ADD `idCuentaContable` TEXT NULL DEFAULT '0' COMMENT '*Creado desde modulo de CTB_InventarioCuentaC*'");
    }

    $arreglo_id = $_POST['arreglo_id'];
    foreach ($_POST["Arreglo"] as $key => $value) {
        $Campos .= "{$key} = '{$value}',";
    }
    $Campos = trim($Campos, ',');

    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET {$Campos} WHERE ID = '{$arreglo_id}' limit 1;");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    //$ruta = str_replace('.php', '', $ruta);

    if ($queryList != true) {
        echo "<script language='Javascript'> window.location=CTB_InventarioCuentaC?error=Hubo Un Error Al Actualizar El Menu'</script>";
    } else {
        echo "<script language='Javascript'> window.location='CTB_InventarioCuentaC?msg=Se Actualizo Correctamente El Menu'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////

if (isset($_GET['Editar'])) {

    


    $id = $_GET['Editar'];
    $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} where ID=$id limit 1");
    $numrow = mysqli_num_rows($queryList);
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        foreach ($rowMotorizado as $key => $value) {
                $datos["$key"] = "$value";
        }
        $NombreEditar= $rowMotorizado['descripcion'];
    }
    if ($numrow == 0) {
        echo "<script language='Javascript'> window.location='CTB_InventarioCuentaC?error=Inventario No Permitido'</script>";
    }
    $datos_json = json_encode($datos);
    ?>
    <script>
        window.onload = function() {
            var Arreglo = <?php echo $datos_json ?>;
            for (index in Arreglo) {
              if (document.getElementsByName("Arreglo[" + index + "]")[0] != undefined) {

              if ((document.getElementsByName("Arreglo[" + index + "]")[0].tagName == "INPUT" || document.getElementsByName("Arreglo[" + index + "]")[0].tagName == "TEXTAREA") && document.getElementsByName("Arreglo[" + index + "]")[0].type != "checkbox") {
                  document.getElementsByName("Arreglo[" + index + "]")[0].value = Arreglo[index];
              } else {

                  var name = document.getElementsByName("Arreglo[" + index + "]")[0].name;
                  var classe = document.getElementsByName("Arreglo[" + index + "]")[0].className;
                  //console.log(Arreglo[index]+" // "+index+ " @@ "+ name);
                  if (classe.indexOf("select2") > -1) {
                      $("select[name='" + name + "'] > option[value='" + Arreglo[index] + "']").attr("selected", true);
                      $("select[name='" + name + "']").select2();
                      //console.log("entroo "+Arreglo[index]+" // "+index+ " @@ "+ name);
                  } else {
                      $("select[name='" + name + "']").val(Arreglo[index]);
                      //console.log("No entro"+Arreglo[index]+" // "+index+ " @@ "+ name);
                  }

              }

            }

            }
        };
    </script>
<?php
}

if (isset($_GET['Editar'])) {
    $EstadoFinalEditar = "show active";
    $EstadoFinal = "";
} else {
    $EstadoFinalEditar = "";
    $EstadoFinal = "show active";
}

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

                      <div class="card-header-title font-size-lg text-capitalize font-weight-normal row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                          <h2>Inventarios</h2>
                        </div>
                        <div class="col-md-3">
                          <ul class="nav nav-justified">
                            <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" style="margin-bottom: 10px;" href="#tab-eg-0" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow <?=$EstadoFinalEditar;?> ">Editar</a></li>
                            <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" style="margin-bottom: 10px;" href="#tab-eg-1" class="btn btn-block btn-outline-secondary btn-lg rounded-pill shadow <?=$EstadoFinal;?> ">Ver Todos</a></li>
                          </ul>
                        </div>
                      </div>

                      <div class="tab-content">
                        <div class="tab-pane <?=$EstadoFinalEditar;?>" id="tab-eg-0" role="tabpanel">

                          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="row" enctype="multipart/form-data" style="<?php if (!$_GET['Editar']) {echo "display:none";}?>">
                              <div class="form-group col-md-12">
                                <hr>   
                                <h3><?=$NombreEditar;?></h3>
                                <hr>
                              </div>
                              <div class="form-group col-md-12">
                                  <label>Cuenta Contable</label>
                                  <select class="input-lg form-control select2" name="Arreglo[idCuentaContable]" required>
                                    <option value="" selected>Seleccione</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM CCuentas WHERE activo = 1 order by id ASC");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                        $idC = $row_recordset32['id'];
                                        $descripcionC = utf8_encode($row_recordset32['descripcion']);
                                        $detalleC = $row_recordset32['detalle'];
                                        echo "<option value='$idC'>$idC | $descripcionC  </option>";
                                    }
                                    ?>
                                  </select>
                              </div>

                              <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

                              <?php if ($_GET['Editar'] != ""): ?>
                                  <div class="col-sm-12">
                                      <input type="hidden" name="arreglo_id" value="<?php echo $_GET['Editar'] ?>">
                                      <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow" name="Actualizar_Informacion_Pagina">
                                              <h2> <strong> A c t u a l i z a r </strong> </h2>
                                          </button></center>
                                  </div>
                              <?php endif;?>

                          </form>



                        </div>


                        <div class="tab-pane  <?=$EstadoFinal;?>" id="tab-eg-1" role="tabpanel">
                          <!-- lista -->
                          <div class="row">
                            <div class="col-md-12">
                              <table class="table table-striped table-bordered" id="example1" style="width:100%">
                                <?php
                                  $tableColumna = [
                                      'Nombre',
                                      'Tipo',
                                      'Cuenta Contable',
                                      'Opciones',
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
                                  $tabla = "sinvetrios";
                                  $querysinvetrios = "SELECT * from $tabla where  estado = 1";
                                  $resultsinvetrios = mysqli_query($conn3, $querysinvetrios);
                                  while ($rowsinvetrios = mysqli_fetch_assoc($resultsinvetrios)) {

                                      $Tipo = funcionMaster($rowsinvetrios['tipo'], 'id', 'descripcion', 'scategoria');

                                      ?>
                                    <tr class="center text-center">
                                      <td><?=$rowsinvetrios['descripcion']?></td>
                                      <td><?=$Tipo?></td>
                                      <td><?=$rowsinvetrios['idCuentaContable']?></td>
                                      <td>
                                        <a href="CTB_InventarioCuentaC?Editar=<?=($rowsinvetrios['ID'])?>" class="btn btn-light" title="editar">
                                          <i class="fas fa-edit"></i>
                                        </a>
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


                    </div>




                </section>

                <?php echo $mensaje_registro_patients; ?>

                <!-- /.content -->
              </div>
              <!-- /.content-wrapper -->


  <?php include 'footer.php'?>

