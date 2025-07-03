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

                      <div class="card-header-title font-size-lg text-capitalize font-weight-normal row" style="background-color:#17a2b812;padding: 20px;">
                        <div class="col-md-3">
                        <?php if ($_GET['Editar']) : ?>
                          <a href="#.php" id="boton_modulo_nuevo" class="btn btn-block btn-outline-success btn-lg rounded-pill shadow">Nuevo</a>
                        <?php endif ?>
                        </div>
                        <div class="col-md-6" style="align-self: center;">
                          <h2>Activos Asignados a <br><b><?=funcionMaster($_GET['id'],'id','nombre','nominaEmpresasPersonal')?></b></h2>
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
                                  'Nombre del Producto',
                                  'Deposito',
                                  'Serial',
                                  'Fecha',
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

                                  $ResultadoAsignacion = mysqli_query($conn3, "SELECT * FROM Asignacion_Activos WHERE Personal_id = '$_GET[id]' AND Activo = 1 ");
                                  while ($RowAsignacion = mysqli_fetch_assoc($ResultadoAsignacion)) {
                                    $id = $RowAsignacion['id'];
                                    $NombreProducto = funcionMaster($RowAsignacion['idProducto'],'ID','descripcion','sinvetrios');
                                    $Deposito = funcionMaster($RowAsignacion['Deposito_id'],'id','descripcion','dep');
                                    $Serial = funcionMaster($RowAsignacion['Serial_id'],'id','Serial','SinvSerial');
                                    $Fecha = $RowAsignacion['Fecha'];

                                    echo "<tr>
                                        <th scope='row' width='2%'>{$id}</th>
                                        <td width='20%' align='center'>{$NombreProducto}</td>
                                        <td width='20%' align='center'>{$Deposito}</td>
                                        <td width='20%' align='center'>{$Serial}</td>
                                        <td width='20%' align='center'>{$Fecha}</td>";

                                    echo "<td width='20%' align='center'> <a onclick='EliminarRegistro({$id})'class='btn btn-block btn-outline-danger btn-lg rounded-pill shadow' style='width: 200px;margin-top:5px;margin-bottom:5px'> <i class='fa fa-close' title='Eliminar'> </i> Eliminar</a>
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
    
    function EliminarRegistro(id) {
        Swal.fire({
                    title: 'Eliminar Registro',
                    text: 'Esta Seguro en Eliminar el Registro?',
                    icon: 'warning',
                    showDenyButton: false,
                    showCancelButton: true,
                    allowOutsideClick: false, // Evita que el usuario cierre la alerta haciendo clic fuera de ella.
                    allowEscapeKey: false, // Evita que el usuario cierre la alerta presionando la tecla Esc.
                    showConfirmButton: true, 
                    confirmButtonText: 'Confirmar',
                    customClass: {
                        container: 'custom-swal-container',
                    },
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {


                        $.ajax({
                            type: "POST",
                            url: "<?=htmlentities($_SERVER['PHP_SELF'])?>",
                            data: {
                                "Consulta_Modulo": "Eliminar Modulos",
                                "Registro_id": id
                            },
                            success: function(response) {
                                var Arreglo = JSON.parse(response);
                                if(Arreglo.Estado == true){
                                    Swal.fire(
                                    'Eliminado!',
                                    '¡Se Elimino Correctamente!',
                                    'success'
                                    );

                                    window.location.reload();
                                }else{
                                    Swal.fire(
                                    'Error!',
                                    '¡Error al Eliminar el Registro!',
                                    'error'
                                    );

                                    window.location.reload();
                                }
                            }
                        });


                    }
                });

    }
</script>