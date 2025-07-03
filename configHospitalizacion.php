<?php
include 'header.php';
include 'menu.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">

    <style type="text/css">
    button {
        margin-top: 5px;
    }

    table {
        margin-top: 5px;
        margin-bottom: 15px;
    }
    </style>

    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
    
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="config"><i class="fa fa-gears"></i> Perfil / Configuración  </a></li>
        <li><a href="#">Lista sucursales</a></li>
        

      </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <div class="card-body">
                    <h3>Configuracion Inicial Hospitalización</h3>
                    <br>

                    <div class="row-md-12">
                        <ul class="nav nav-justified"
                            style="display:flex; flex-direction: row nowrap; justify-content:space-around">
                            <li class="nav-item" style="display: contents;width:30%"><a data-toggle="tab"
                                    style="margin: 10px;width:50%" href="#tab-Pisos"
                                    class="btn btn-block btn-outline-info btn-lg rounded-pill shadow active">Pisos</a>
                            </li>
                            <li class="nav-item" style="display: contents;width:30%"><a data-toggle="tab"
                                    style="margin: 10px;width:50%" href="#tab-Habitaciones"
                                    class="btn btn-block btn-outline-secondary btn-lg rounded-pill shadow">Habitaciones</a>
                            </li>
                            <li class="nav-item" style="display: contents;width:30%"><a data-toggle="tab"
                                    style="margin: 10px;width:50%" href="#tab-Permisos"
                                    class="btn btn-block btn-outline-secondary btn-lg rounded-pill shadow">Permisos de
                                    Hospitalización</a></li>
                            <!-- <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" style="margin-bottom: 10px;" href="#tab-Camillas" class="btn btn-block btn-outline-secondary btn-lg rounded-pill shadow">Camillas</a></li> -->
                        </ul>
                    </div>



                    <!-- CONTENIDO PISOS === OCULTO -->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="tab-Pisos" role="tabpanel">
                            <!-- ========== CONTENT PISOS ========== -->
                            <div class="col-xs-6">
                                <form action="hospitalizacion/guardarPiso.php" method="POST">
                                    <h5>Agregar pisos</h5>
                                    <input type="number" name="numeroPisos" class="form-control"
                                        onkeyup="configPisos(this.value)" required>
                                    <div id='content-config-pisos' class='col-md-12' style="padding:15px"></div>



                                    <?php $maximoPiso = funcionMaster('1', '1', 'count(*)', 'ho_piso') ?>

                                    <script>
                                    function configPisos(numeroPisos) {
                                        $('#content-config-pisos').html("");
                                        var addCamposPisos = "";
                                        var consecutivoPiso = "<?php echo $maximoPiso ?>";
                                        if (consecutivoPiso == "") {
                                            consecutivoPiso = 0;
                                        }


                                        if (numeroPisos != 0 && numeroPisos != '') {
                                            for (let i = 1; i <= numeroPisos; i++) {
                                                consecutivoPiso = Number(consecutivoPiso) + 1;
                                                addCamposPisos += `<div style="display:flex; flex-direction:row;justify-content:space-around; width:100%">
                                                <div class="" style="display:flex; flex-direction:column;width:45%;">
                                                  <label>Nombre de Piso</label>
                                                  <input class="form-control" name="ho_piso[` + i +
                                                    `][descripcion]" value="Piso No ` + consecutivoPiso + `" readonly>
                                                </div>
                                                <div class="" style="display:flex; flex-direction:column;width:45%;">
                                                  <label>Descripción</label>
                                                  <input class="form-control" name="ho_piso[` + i + `][caracteristicas]">
                                                </div>
                                              </div>`;
                                            }

                                            $('#content-config-pisos').html(addCamposPisos);

                                        } else {
                                            alert('Por favor ingrese un numero de pisos valido')
                                        }

                                    }
                                    </script>
                                    <button style="margin:15px" type="submit"
                                        class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Guardar
                                        configuracion de pisos</button>
                                </form>




                                <!-- LISTA DE PISOS -->
                                <table class="table" id="tabla-pisos">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Descripción</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                    $queryPiso = mysqli_query($conn3, "SELECT * FROM ho_piso");
                    foreach ($queryPiso as $key) {

                      echo "<tr>";

                      echo "<td>" . $key['despcripcion'] . "</td>";
                      echo "<td>" . $key['caracteristicas'] . "</td>";
                      echo "<td></td>";

                      echo "</tr>";
                    }



                    ?>
                                    </tbody>
                                </table>
                                <!-- LISTA DE PISOS -->

                            </div>
                            <!-- ========== CONTENT PISOS ========== -->
                        </div>
                        <!-- CONTENIDO PISOS === OCULTO -->

                        <!-- CONTENIDO HABITACIONES === OCULTO -->
                        <div class="tab-pane" id="tab-Habitaciones" role="tabpanel">
                            <!-- ========== CONTENT HABITACIONES ========== -->
                            <form action="hospitalizacion/guardarHabitacion.php" method="POST"
                                style="display: flex; flex-direction: column;">
                                <h5>Configurar Habitaciones</h5>
                                <div class="col-md-12"
                                    style="width:100%; display:flex; flex-direction: row; align-items: flex-end">
                                    <div class="" style="width:80%; display:flex; flex-direction: column">
                                        <label>Piso</label>
                                        <select name="idPiso" id="idPiso" class="form-control select2" required>
                                            <option value="">Seleccione</option>
                                            <?php
                      $queryPiso = mysqli_query($conn3, "SELECT * FROM ho_piso");
                      foreach ($queryPiso as $key) {
                        echo "<option value='" . $key['id'] . "'>" . $key['despcripcion'] . "</option>";
                      }
                      ?>
                                        </select>
                                    </div>

                                    <div class=""
                                        style="width:15%; display:flex; flex-direction: column; margin-left:10px">
                                        <label>Numero de habitaciones</label>
                                        <input type="number" name="nHabitaciones" id="nHabitaciones"
                                            class="form-control" onchange="configHabitaciones(this.value)">
                                    </div>

                                </div>

                                <div id="content-config-habitaciones"></div>


                                <script>
                                function configHabitaciones(numeroHabs) {
                                    $('#content-config-habitaciones').html("");
                                    var idPiso = $('#idPiso').val();

                                    var consecutivoHabitacion = 0;

                                    console.log('Antes del ajax');
                                    $.ajax({
                                        type: 'POST',
                                        url: 'Ajax_Habitaciones_Hospitalizacion.php',
                                        data: {
                                            pisoSeleccionado: idPiso,
                                            tipo: "Consultar Numero Habitaciones"
                                        },
                                        success: function(response) {
                                            console.log('Fue a hacer la peticion y esta fue exitosa');
                                            console.log(response);
                                            consecutivoHabitacion = response.trim();
                                        },
                                        error: function(error) {
                                            console.log('Fue a hacer la peticion y esta fue errada');
                                            console.error(error);
                                        }
                                    });
                                    console.log('Despues del ajax');



                                    var addCamposHabitaciones = "";



                                    if (idPiso != 0 && idPiso != '' && numeroHabs != 0 && numeroHabs != '') {
                                        for (let i = 1; i <= numeroHabs; i++) {
                                            consecutivoHabitacion = Number(consecutivoHabitacion) + 1;
                                            addCamposHabitaciones += `<div style="display:flex; flex-direction:row;justify-content:space-around; width:100%">
                                                        <div class="" style="display:flex; flex-direction:column;width:20%;">
                                                          <label>Nombre de habitación </label>
                                                          <input class="form-control" name="ho_habitacion[` + i +
                                                `][descripcion]" value="Habitacion No ` + consecutivoHabitacion +
                                                `" readonly>
                                                        </div>
                                                        <div class="" style="display:flex; flex-direction:column;width:25%;">
                                                          <label>Tipo</label>
                                                          <select required class="form-control select2" name="ho_habitacion[` +
                                                i +
                                                `][tipo]">
                                                              <option value="">Seleccione</option>
                                                              <option value="Estandar">Estandar</option>
                                                              <option value="Privada">Privada</option>
                                                              <option value="Semiprivada">Semiprivada</option>
                                                              <option value="Maternidad">Maternidad</option>
                                                              <option value="Pediatrica">Pediatrica</option>
                                                              <option value="Cuidados intensivos">Cuidados intensivos</option>
                                                              <option value="Aislamiento">Aislamiento</option>
                                                              <option value="Recuperacion">Recuperacion</option>
                                                          </select>
                                                        </div>
                                                        <div class="" style="display:flex; flex-direction:column;width:5%;">
                                                          <label>Camillas</label>
                                                          <input type="number" class="form-control" name="ho_habitacion[` +
                                                i +
                                                `][numeroCamillas]" >
                                                        </div>
                                                        <div class="" style="display:flex; flex-direction:column;width:40%;">
                                                          <label>Descripción *No obligatorio*</label>
                                                          <input type="text" class="form-control" name="ho_habitacion[` +
                                                i + `][caracteristicas]" >
                                                        </div>
                                                        
                                                      </div>`;
                                        }

                                        $('#content-config-habitaciones').html(addCamposHabitaciones);

                                    } else {
                                        alert('Por favor ingrese un numero de habitaciones valido y un piso')
                                    }

                                }
                                </script>



                                <button style="margin:15px" type="submit"
                                    class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Guardar
                                    Habitaciones</button>
                            </form>

                            <table class="table" id="tabla-habitaciones">
                                <thead>
                                    <tr>
                                        <th scope="col">Habitación</th>
                                        <th scope="col">Piso</th>
                                        <th scope="col">Capacidad</th>
                                        <!-- <th scope="col"></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                  $queryHabitaciones = mysqli_query($conn3, "SELECT * FROM ho_habitaciones");
                  foreach ($queryHabitaciones as $tablaHabitacion) {

                    echo "<tr>";

                    echo "<td>" . $tablaHabitacion['descripcion'] . "</td>";
                    echo "<td>" . funcionMaster($tablaHabitacion['pisoId'], 'id', 'despcripcion', 'ho_piso') . "</td>";
                    echo "<td>" . $tablaHabitacion['numeroCamillas'] . " Camillas</td>";
                    // echo '<td><i class="fa-solid fa-pencil" onclick="alert("funcion actualizar")"></i></td>';

                    echo "</tr>";
                  }



                  ?>
                                </tbody>
                            </table>
                            <!-- ========== CONTENT HABITACIONES ========== -->
                        </div>
                        <!-- CONTENIDO HABITACIONES === OCULTO -->


                        <!-- CONTENIDO PERMISOS DE HOSPITALIZACION === OCULTO -->
                        <div class="tab-pane" id="tab-Permisos" role="tabpanel">
                            <!-- ========== CONTENT PISOS ========== -->
                            <div class="col-xs-6">
                                <form action="hospitalizacion/guardarPermisos.php" method="POST">
                                    <h5>Permisos de hospitalización</h5>
                                    <div id='content-config-pisos' class='col-md-12' style="padding:15px"></div>
                                    <!-- LISTA DE PISOS -->
                                    <table class="table" id="tabla-permisos">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width:30%">Usuarios</th>
                                                <th scope="col" style="width:65%">Permisos</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                      $indice = 0;
                      $queryUser = mysqli_query($conn3, "SELECT * FROM usuarios");
                      foreach ($queryUser as $key) {
                        $permisosActuales = $key['permisosHospitalizacion'];
                        $indice += 1;
                        echo "<tr>";
                        echo "<td><input name='usuario[" . $indice . "]' class='form-control' value='" . $key['USUARIO'] . "' readonly></td>";
                        echo "<td>
                                  <select name='permisoUsuario[" . $indice . "][]' class='form-control select2' style='width:100%' multiple>" .
                          "<option" . (strpos($permisosActuales, "Notas de enfermeria") !== false ? " selected" : "") . ">Notas de enfermeria</option>" .
                          "<option " . (strpos($permisosActuales, "Suministro de alimentos") !== false ? " selected" : "") . ">Suministro de alimentos</option>" .
                          "<option " . (strpos($permisosActuales, "Suministro de medicamentos") !== false ? " selected" : "") . ">Suministro de medicamentos</option>" .
                          "<option " . (strpos($permisosActuales, "Dar de alta") !== false ? " selected" : "") . ">Dar de alta</option>" .
                          "<option " . (strpos($permisosActuales, "Registro de visitantes") !== false ? " selected" : "") . ">Registro de visitantes</option>" .
                          "<option " . (strpos($permisosActuales, "Trasladar camilla") !== false ? " selected" : "") . ">Trasladar camilla</option>" .
                          "</select>
                                </td>";
                        echo "</tr>";
                      }
                      ?>
                                        </tbody>
                                    </table>
                                    <!-- LISTA DE PISOS -->

                            </div>
                            <button style="margin:15px" type="submit"
                                class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Actualizar
                                permisos</button>
                            </form>
                            <!-- ========== CONTENT PISOS ========== -->
                        </div>
                    </div>
                    <!-- CONTENIDO PERMISOS DE HOSPITALIZACION === OCULTO -->






                    <!-- CONTENIDO CAMILLAS === OCULTO -->
                    <!-- <div class="tab-pane" id="tab-Camillas" role="tabpanel"> -->
                    <!-- ========== CONTENT CAMILLAS ========== -->
                    <!-- <form action="hospitalizacion/guardarCamilla.php" method="POST">
                    <h5>Agregar camilla</h5>
                    <label>Nombre</label>
                    <input type="text" name="nombreCamilla" class="form-control " required>
                    <label>Tipo de camilla</label>
                    <select class="form-control select2">
                      <option value="">Seleccione</option>
                      <option value="1">UCI</option>
                      <option value="2">INFANTIL</option>
                      <option value="3">ADULTOS</option>
                      <option value="4">PREFERENCIAL</option>
                    </select>
                    <label>Habitacion a la que pertenece</label>
                    <select class="form-control select2">
                      <?php

                      $queryPiso = mysqli_query($conn3, "SELECT * FROM ho_habitaciones");
                      foreach ($queryPiso as $key) {

                        echo "<option value='" . $key['idHabitacion'] . "'>" . $key['descripcion'] . "</option>";
                      }

                      ?>
                    </select>

                    <table class="table" id="tablaCamillas">
                      <thead>
                        <tr>
                          <th scope="col">Numero de Camilla</th>
                          <th scope="col">Habitacion</th>
                          <th scope="col">Tipo</th>
                          <th scope="col">Disponible</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $queryCamilla = mysqli_query($conn3, "SELECT * FROM ho_camilla");
                        foreach ($queryCamilla as $tablaCamilla) {



                          echo "<tr>";

                          echo "<td>" . $tablaCamilla['descripcion'] . "</td>";
                          echo "<td>" . $tablaCamilla['idHabitacion'] . "</td>";
                          echo "<td>" . $tablaCamilla['tipo'] . "</td>";

                          if ($tablaCamilla['disponible'] == 1) {
                            echo "<td style='background-color:green ¡important; '>SI</td>";
                          } else {
                            echo "<td style='background-color:red ¡important; '>NO</td>";
                          }


                          echo '<td><i class="fa-solid fa-pencil" onclick="alert("funcion actualizar")"></i></td>';

                          echo "</tr>";
                        }



                        ?>
                      </tbody>
                    </table>


                    <button style="margin:15px" type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Guardar Camilla</button>
                </form>
                   -->
                    <!-- ========== CONTENT CAMILLAS ========== -->
                    <!-- </div> -->
                    <!-- CONTENIDO CAMILLAS === OCULTO -->


                    <!-- <form action="sucursales" method="POST">
            <div class="form-row">
            <div class="col-md-12">
<?php echo $respuesta; ?>
  </div>
          

              

<br>
<br>


        </div>
  
                </tbody>
                <tfoot>
                <tr>
                     
                    <th class="text-center">Descripción </th>
       
                    <th class="text-center">   </th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';

?>
<script>
$(document).ready(function() {
    $('#tabla-habitaciones').DataTable();
    //$('#tablaCamillas').DataTable();
    $('#tabla-pisos').DataTable();
});
</script>