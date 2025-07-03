<?php
include 'header.php';
include 'menu.php';
$ID = $_SESSION['ID'];
?>
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<link href="css/css_historia_clinica.css" rel="stylesheet" type="text/css" media="all">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            Control Sala de Espera

        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Control Sala de Espera </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-md-12">

                <div class="box">
                    <div class="col-md-12" align="center">
                        <h2>Citas en Atención</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Fecha-Hora</th>
                                    <th class="text-center">Hora de Llegada</th>
                                    <th class="text-center">Hora de Atención</th>
                                    <th class="text-center">Doctor</th>
                                    <th class="text-center">Nombre</th>
                                    <!-- <th class="text-center">Teléfono</th>
                    <th class="text-center">Correo</th> -->
                                    <th class="text-center">Motivo Consulta</th>
                                    <!-- <th> </th>
                    <th> </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                //     ?ID_patients=8



                                $ID = $_SESSION['ID'];

                                $fechacitahoy = date('Y-m-d');
                                $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

                                //   if ($_SESSION['TIPO'] == 1) {
                                $queryList = mysqli_query($conn3, "SELECT * FROM  citas  where (doctor = '{$_SESSION['ID']}' or doctor = '{$_SESSION['ID_principal']}') and  estadoAtencion=1 and fecha = '$fechacitahoy' order by fecha asc ");
                                //   } else {
                                //     $queryList = mysqli_query($conn3, "SELECT * FROM  citas  where estado  <> 4 and estado  <> 3 and usuario_id = $ID order by fecha asc ");
                                //   }




                                $nrowl = mysqli_num_rows($queryList);

                                while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                    $idCitas = $row_recordset32['idCitas'];
                                    $Doctor = $row_recordset32['doctor'];
                                    $fecha = $row_recordset32['fecha'];
                                    $Hora = $row_recordset32['Hora'];
                                    $nombre = $row_recordset32['nombre'];
                                    $telefono = $row_recordset32['telefono'];
                                    $correo = $row_recordset32['correo'];
                                    $motivoConsulta = funcionMaster($row_recordset32['motivoConsulta'], 'id', 'descripcion', 'Motivos_Consulta');
                                    $activo = $row_recordset32['activo'];
                                    $estado = $row_recordset32['estado'];
                                    $horallegada = $row_recordset32['horallegada'];
                                    $horaatencion = $row_recordset32['horaatencion'];
                                    $color = 'background-color:#00ff005c';

                                    echo '
                      <tr style="' . $color . '">
                       <td width="10%" class="text-center">' . $fecha . '-' . $Hora . '</td>
                       <td width="5%" class="text-center">' . $horallegada . '</td>
                       <td width="5%" class="text-center">' . $horaatencion . '</td>
                      <td width="20%" class="text-center">' . funcionMaster($Doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios') . '</td>    
                     
                      <td width="20%" class="text-center"> ' . $nombre . '</td>
                     <!-- <td width="10%" class="text-center">' . $telefono . '</td>
                      <td width="10%" class="text-center">' . $correo . '</td> -->
                      <td width="30%" class="text-center">' . $motivoConsulta . '</td>';
                                    ?>



                                    <?php


                                    // echo '<a href="AddSalaEspera.php?idCitas=' . $idCitas . '"><button type="button" class="btn btn-block btn-success btn-sm">Confirmar</button></a>';

                                }


                                ?>

                                </tr>

                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-12">

                <div class="box">
                    <div class="col-md-12" align="center">
                        <h2>Citas para Hoy</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Fecha-Hora</th>
                                    <th class="text-center">Doctor</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Correo</th>
                                    <th class="text-center">Motivo Consulta</th>
                                    <th> </th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                //     ?ID_patients=8



                                $ID = $_SESSION['ID'];


                                $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
                                $date = date('Y-m-d');

                                //   if ($_SESSION['TIPO'] == 1) {
                                $queryList = mysqli_query($conn3, "SELECT * FROM  citas  where (doctor = '{$_SESSION['ID']}' or doctor = '{$_SESSION['ID_principal']}') and estadoEspera=0 and (estado = 0 or estado = 1 or estado = 2) and fecha = '$date' order by fecha asc ");
                                //   } else {
                                //     $queryList = mysqli_query($conn3, "SELECT * FROM  citas  where estado  <> 4 and estado  <> 3 and usuario_id = $ID order by fecha asc ");
                                //   }



                                $nrowl = mysqli_num_rows($queryList);

                                while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                    $idCitas = $row_recordset32['idCitas'];
                                    $Doctor = $row_recordset32['doctor'];
                                    $fecha = $row_recordset32['fecha'];
                                    $Hora = $row_recordset32['Hora'];
                                    $nombre = $row_recordset32['nombre'];
                                    $telefono = $row_recordset32['telefono'];
                                    $correo = $row_recordset32['correo'];
                                    $motivoConsulta = funcionMaster($row_recordset32['motivoConsulta'], 'id', 'descripcion', 'Motivos_Consulta');
                                    $activo = $row_recordset32['activo'];
                                    $estado = $row_recordset32['estado'];

                                    echo '
                      <tr>
                       <td width="10%" class="text-center">' . $fecha . '-' . $Hora . '</td>
                      <td width="10%" class="text-center">' . funcionMaster($Doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios') . '</td>    
                     
                      <td width="10%" class="text-center"> ' . $nombre . '</td>
                      <td width="10%" class="text-center">' . $telefono . '</td>
                      <td width="10%" class="text-center">' . $correo . '</td>
                      <td width="30%" class="text-center">' . $motivoConsulta . '</td>';
                                    ?>

                                    <td width="10%" class="text-center"><?php
                                    if ($estado == '1') {
                                        echo '<a href="Confirmarcita.php?idCitas=' . $idCitas . '&r=SE_ControlCitas.php"><button type="button" class="btn btn-block btn-outline-success btn-lg rounded-pill shadow">Confirmar</button></a>';
                                    }

                                    if ($estado == '2') {
                                        echo '<a href="asistioCita.php?idCitas=' . $idCitas . '"><button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Asistio</button></a>';
                                    }

                                    ?>
                                        <!-- <button type="button" class="btn btn-block btn-primary btn-sm prueba" data-toggle="modal" data-target="#modalVarios" data-id="<?= $idCitas ?>">Sala de Espera</button> -->
                                        <button type="button"
                                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow prueba"
                                            data-toggle="modal" data-target="#modalVarios"
                                            onclick="openModal(<?php echo $idCitas; ?>)">Sala de
                                            Espera</button>
                                    </td>

                                    <?php

                                    echo '<td width="10%" class="text-center">
                    <a href="NoAsistio.php?idCitas=' . $idCitas . '"><button type="button" class="btn btn-block btn-outline-danger btn-lg rounded-pill shadow">No Asistio</button></a>
                   
                     </td> ';
                                    // echo '<a href="AddSalaEspera.php?idCitas=' . $idCitas . '"><button type="button" class="btn btn-block btn-success btn-sm">Confirmar</button></a>';

                                }


                                ?>

                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Fecha-Hora</th>
                                    <th class="text-center">Doctor</th>

                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Correo</th>
                                    <th class="text-center">Motivo Consulta</th>

                                    <th> </th>
                                    <th> </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->





                    <div class="box-body">

                        <div class="col-xs-12">
                            <hr>
                        </div>

                        <div class="col-xs-12">
                            <div style="width:100%;text-align:center;"><i class="fas fa-id-card-alt"></i> Reporte
                                Control de Citas
                            </div>
                            <form action="SE_ReporteControlCitas.php" method="POST" enctype="multipart/form-data">


                                <div class="col-xs-3">
                                    <label style='padding-top: 15px;'> Fecha Desde</label>
                                    <input type="date" class="form-control input-lg" name="desde"
                                        value="<?= $fecha_actual; ?>">
                                    <input type="hidden" class="form-control input-lg" name="usuario_id"
                                        value="<?php echo $_SESSION["ID"] ?>" required>
                                </div>
                                <div class="col-xs-3">
                                    <label style='padding-top: 15px;'> Fecha Hasta</label>
                                    <input type="date" class="form-control input-lg" name="hasta"
                                        value="<?= $fecha_actual_mas_dias; ?>">
                                </div>

                                <div class="col-xs-3">
                                    <center style='padding-top: 35px;'><button type="submit"
                                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                            <h4> <strong> Generar </strong> </h4>
                                        </button></center>
                                </div>
                            </form>
                        </div>


                    </div>



                    <div class="box-body">

                        <div class="col-md-12">
                            <hr>
                        </div>

                        <div class="col-md-12">
                            <div style="width:100%;text-align:center;"><i class="fas fa-id-card-alt"></i> Tiempos
                                Promedios</div>

                            <?php

                            $fechaActual = date('Y-m-d');
                            $fechaHace7Dias = date('Y-m-d', strtotime('-7 days'));
                            $SalaEspera = 0;
                            $Consulta = 0;
                            $TiempoSala = 0;
                            $TiempoCita = 0;
                            $queryListaH = mysqli_query($conn3, "SELECT * FROM citas where (doctor = '{$_SESSION['ID']}' or doctor = '{$_SESSION['ID_principal']}') and fecha BETWEEN '$fechaHace7Dias' AND '$fechaActual' AND cita_sala_espera=1");
                            if ($queryListaH) {
                                while ($rowListaH = mysqli_fetch_array($queryListaH)) {

                                    $horallegada = $rowListaH['horallegada'];
                                    $horaatencion = $rowListaH['horaatencion'];
                                    $horafinalizada = $rowListaH['horafinalizada'];


                                    if ($horallegada != "" and $horaatencion != "") {
                                        $to_time = strtotime($horallegada);
                                        $from_time = strtotime($horaatencion);
                                        $TiempoSala += round(abs($to_time - $from_time) / 60, 2);
                                        $SalaEspera++;
                                    }


                                    if ($horaatencion != "" and $horafinalizada != "") {
                                        $to_time = strtotime($horaatencion);
                                        $from_time = strtotime($horafinalizada);
                                        $TiempoCita += round(abs($to_time - $from_time) / 60, 2);
                                        $Consulta++;
                                    }
                                }
                            }

                            if ($SalaEspera == 0) {
                                $SalaEspera = 1;
                            }

                            if ($Consulta == 0) {
                                $Consulta = 1;
                            }

                            ?>

                            <div class="col-md-6">
                                <label style='padding-top: 15px;'> Tiempo Promedio en Sala de Espera: <h2
                                        style="color:gray;">
                                        <?= round($TiempoSala / $SalaEspera, 2); ?> Minutos
                                    </h2></label>
                            </div>
                            <div class="col-md-6">
                                <label style='padding-top: 15px;'> Tiempo Promedio en Consulta: <h2 style="color:gray;">
                                        <?= round($TiempoCita / $Consulta, 2); ?> Minutos
                                    </h2></label>

                            </div>

                        </div>


                    </div>




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

<style>
    .modal-header {
        background-color: #3390FF;
        color: white;
    }
</style>
<br><!-- Modal -->
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="modalVarios" tabindex="-1" role="dialog" aria-labelledby="modalVariosLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalVariosLabel">Confirmación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Paciente con Incapacidad</label>
                                <input type="checkbox" class="option-input checkbox" id="Incapacidad" value="1">
                            </div>
                            <div class="col-md-12">
                                <label>Consultorio</label>
                                <input type="text" id="Consultorio" class="form-control input-lg">
                            </div>
                        </div>
                    </div>
                    ¿Está seguro de que desea enviar esta cita a la sala de espera?
                    <!-- <p>El ID de la cita seleccionada es: <span id="idCitas"></span></p> -->
                    <input type="hidden" id="idCitas">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardar">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';

?>
<script>
    //     $(document).on('click', '.prueba', function() {

    //         var id = $(this).attr('data-id');
    //         var id1 = "<?php echo $ID ?>";
    //         console.log(id);

    //         $.ajax({
    //   url: 'indexsala.php',
    //   method: 'POST',
    //   data: { id: id, id1: id1 },
    //   success: function(response) {
    //     console.log('Cita actualizada con éxito');
    //   },
    //   error: function(xhr, status, error) {
    //     console.error(error);
    //   }

    //     });
    //     });
    function openModal(id) {
        // Set the value of the idCitas element in the modal body
        $('#idCitas').text(id);
        console.log(id);
        // Call the reloadCitas function to update the citas data with the new state
        // reloadCitas();
    }
    $(document).on('click', '#btnGuardar', function () {
        // $(document).ready(function() {
        // Al hacer clic en el botón "Guardar" del modal
        //   $('#btnGuardar').click(function() {
        //var idCitas = $('#modalVarios').data('id'); // Obtener el ID de la cita desde el atributo "data-id" del modal
        //var idCitas = $('#modalVarios').attr('data-id'); // Obtener el ID de la cita desde el atributo "data-id" del modal
        var idUsuario = "<?php echo $ID ?>";
        // var idCitas = $('.prueba').attr('data-id');
        var idCitas = $('#idCitas').text();
        var Incapacidad = document.getElementById('Incapacidad').value;
        var Consultorio = document.getElementById('Consultorio').value;
        //  var Incapacidad = $('#Incapacidad').text();
        //  var Consultorio = $('#Consultorio').text();

        console.log(idCitas);
        console.log(idUsuario);
        // Enviar el ID de la cita mediante AJAX

        let data = {
            key: "UpdateCita",
            idCitas: idCitas,
            idUsuario: idUsuario,
            Incapacidad: Incapacidad,
            Consultorio: Consultorio
        };
        console.log(data);
        $.ajax({
            url: 'SE_AjaxCitas.php',
            method: 'POST',
            data: data,
            success: function (response) {
                // console.log(response);
                console.log('Cita enviada a la sala de espera con éxito');
                $('#modalVarios').modal('hide'); // Ocultar el modal después de enviar la cita
                location.reload(); // Recargar la página después de actualizar la cita

            },

        });

        // Cerrar el modal
        // $('#modalVarios').modal('hide');
    });

</script>