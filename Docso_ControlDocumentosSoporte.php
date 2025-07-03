<?php 
$Nombre_Tabla = "Asignacion_Activos";
if($_POST['Consulta_Modulo']=="Eliminar Modulos"){
    include 'funciones/conn3.php';
    
    $Registro_id = $_POST['Registro_id'];
    $QueryUpdate = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET Activo='0' WHERE id ='{$Registro_id}' limit 1");
    $RegistrosAfectados = mysqli_affected_rows($conn3);

    if ($RegistrosAfectados > 0) {
        $Arreglo["Estado"] = true;
        $QueryAsignacion = mysqli_query($conn3, "SELECT * FROM Asignacion_Activos WHERE id = '$_POST[Registro_id]'");
        while ($RowAsignacion = mysqli_fetch_assoc($QueryAsignacion)) {
            $Serial_id = $RowAsignacion['Serial_id'];
        }
        
        $QueryUpdate = mysqli_query($conn3, "UPDATE SinvSerial SET Activo='1' WHERE id ='{$Serial_id}' limit 1");

    } else {
        $Arreglo["Estado"] = false;
        $Arreglo["Mensaje"] = mysqli_error($conn3);
    }

    echo json_encode($Arreglo);
    exit();
}
////////////////////////////////?////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php
include 'header.php';
include 'menu.php';

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

                      <div class="card-header-title font-size-lg  font-weight-normal row" style="background-color:#17a2b812;padding: 20px;">
                        <div class="col-md-3">
                        <?php if ($_GET['Editar']) : ?>
                          <a href="#.php" id="boton_modulo_nuevo" class="btn btn-block btn-outline-success btn-lg rounded-pill shadow">Nuevo</a>
                        <?php endif ?>
                        </div>
                        <div class="col-md-6" style="align-self: center;">
                          <h2>Control de Documentos Soporte</b></h2>
                        </div>
                        <div class="col-md-3">
                          <ul class="nav nav-justified">
                            <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" id="Boton_Tab_Formulario" style="margin-bottom: 10px;" href="#Tab_Formulario" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow "><?= ($_GET['Editar']) ? 'Editar <br>' . funcionMaster($_GET['Editar'], 'id', 'nombre', 'Siva') : 'Nuevo' ?></a></li>
                            <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" id="Boton_Tab_Historial" style="margin-bottom: 10px;" href="#Tab_Historial" class="btn btn-block btn-outline-secondary btn-lg rounded-pill shadow ">Ver Todos</a></li>
                          </ul>
                        </div>
                      </div>

                      <div class="tab-content">
                        <div class="tab-pane Principal_Modulo_V" id="Tab_Formulario" role="tabpanel">
                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="row" enctype="multipart/form-data" id="FormularioInformacion">

                           </form>


                        </div>


                        <div class="tab-pane" id="Tab_Historial" role="tabpanel">
                          <!-- lista -->
                          <div class="row">
                            <div class="col-md-12">

                              <div class="form-group col-md-12">
                                    <hr>
                              </div>

                              <table class="table table-striped table-bordered">
                                <?php
                                $tableColumna = [
                                  '#',
                                  'Proveedor',
                                  'Numero Operacion',
                                  'Fecha',
                                  'Cantidad Productos',
                                  'Total',
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
                                  $Contador=0;
                                  $QueryOperacionActivos = mysqli_query($conn3, "SELECT * FROM DocumentoSoporte_Operacion WHERE usuario_id = '$_SESSION[ID]'");
                                  while ($RowOperacionActivos = mysqli_fetch_assoc($QueryOperacionActivos)) {
                                    $Contador++;
                                    
                                    $id = $RowOperacionActivos['idOperacion'];

                                    $Fecha = $RowOperacionActivos['Fecha'];
                                    $NumeroDocumentoSoporte = $RowOperacionActivos['NumeroDocumentoSoporte'];

                                    $Proveedor = funcionMaster ($RowOperacionActivos['proveedor_id'], 'id', 'nombre', 'sproveedores');

                                    $FechaOperacion = $RowOperacionActivos['FechaOperacion'];
                                    $CantidadProductos = $RowOperacionActivos['CantidadProductos'];
                                    $TotalNeto = $RowOperacionActivos['TotalNeto'];

                                    echo "<tr>
                                        <th scope='row' width='2%'>{$Contador}</th>
                                        <td width='10%' align='center'>{$Proveedor}</td>
                                        <td width='5%' align='center'>{$NumeroDocumentoSoporte}</td>
                                        <td width='10%' align='center'>{$FechaOperacion}</td>
                                        <td width='10%' align='center'>{$CantidadProductos}</td>
                                        <td width='10%' align='center'>{$TotalNeto}</td>";

                                    echo "<td width='20%' align='center'> <a href='Docso_PreliminarDocumento.php?idOperacion={$id}'class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style='width: 100%;'> <i class='fa fa-print' title='Preliminar Documento Soporte'> </i> Preliminar Documento Soporte</a>
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
     $(document).ready(function () {
        var Tipo_Modulo = "Historial";
        if(Tipo_Modulo == "Historial"){
            $("#Boton_Tab_Formulario").css("display", "none");
            
            $("#Tab_Historial").addClass("show active");
            $("#Boton_Tab_Historial").addClass("active");
        }
    });
</script>
