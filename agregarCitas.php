<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php';


$clienteId = ($_GET['cI'] != '' ? decrypt($_GET['cI']) : $_GET['clienteId']);

if (isset($_SESSION['cI']) && $_SESSION['cI'] <> '' && $clienteId == "") {
    $clienteId = $_SESSION['cI'];
}

if (isset($_SESSION['cI'])) {
    $queryClienteC = " AND idCliente=" . $clienteId;
}




$IDconfig = $_SESSION['ID'];
$queryListcalendario = mysqli_query($conn3, "SELECT * FROM config where (ID_Usuario = '{$_SESSION['ID']}' or ID_Usuario = '{$_SESSION['ID_principal']}')");

$nrowl = mysqli_num_rows($queryListcalendario);

while ($rowcalendario = mysqli_fetch_array($queryListcalendario)) {

    $tiempoConsulta = $rowcalendario['tiempoConsulta'];
    $cantidadPacientes = $rowcalendario['cantidadPacientes'];

    $lt = $rowcalendario['lt'];
    $mt = $rowcalendario['mt'];
    $et = $rowcalendario['et'];
    $jt = $rowcalendario['jt'];
    $vt = $rowcalendario['vt'];
    $st = $rowcalendario['st'];
    $dt = $rowcalendario['dt'];

    $ld = $rowcalendario['ld'];
    $md = $rowcalendario['md'];
    $ed = $rowcalendario['ed'];
    $jd = $rowcalendario['jd'];
    $vd = $rowcalendario['vd'];
    $sd = $rowcalendario['sd'];
    $dd = $rowcalendario['dd'];

    $lh = $rowcalendario['lh'];
    $mh = $rowcalendario['mh'];
    $eh = $rowcalendario['eh'];
    $jh = $rowcalendario['jh'];
    $vh = $rowcalendario['vh'];
    $sh = $rowcalendario['sh'];
    $dh = $rowcalendario['dh'];

    $CitasGoogleCalendar = $rowcalendario['CitasGoogleCalendar'];
    $Sucursales = $rowcalendario['Sucursales'];
}


if ($clienteId > 0) {

    include 'funciones/conn3.php';

    $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId and (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}')");

    $nrowl = mysqli_num_rows($queryList);

    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $usuario_id = $rowMotorizado['usuario_id'];
        $nombre_cliente = $rowMotorizado['nombre_cliente'];
        $indicativo = $rowMotorizado['indicativo'];
        $whatsapp = $rowMotorizado['whatsapp'];
        // $whatsapp = substr($whatsapp, strlen($indicativo));
        // $whatsapp = str_replace("/*0*/", "", $whatsapp);
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
    }
    //     $_SESSION['NOMBRE_USUARIO']
}

if (isset($_GET['editar_cita'])) {
    $editar_cita = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['editar_cita'])));
    $queryList = mysqli_query($conn3, "SELECT * FROM  citas where idCitas = '$editar_cita' and doctor = '{$_SESSION['ID']}' or doctor = '{$_SESSION['ID_principal']}'");
    $nrowl = mysqli_num_rows($queryList);
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $idCitas = $rowMotorizado['idCitas'];
        $nombre_cliente = $rowMotorizado['nombre'];
        $celular_cliente = $rowMotorizado['celular_cliente'];
        $whatsapp = $rowMotorizado['telefono'];
        $correo_cliente = $rowMotorizado['correo'];
        $motivoConsulta = $rowMotorizado['motivoConsulta'];
        $Hora = $rowMotorizado['Hora'];
        $fecha = $rowMotorizado['fecha'];
        $frecuencia = $rowMotorizado['frecuencia'];
        $cantidad = $rowMotorizado['cantidad'];
    }
}



if ($fecha == '') {
    $fecha = date("Y-m-d");
}


if ($idCitas = '') {
    $idCitas = 0;
}



$msg = $_GET['msg'];
/*
if ($msg == 1) {
  $respuesta = '
        <div class="callout callout-info">
        <h4>Cita registrada</h4>
         <p></p>
      </div>';
}
*/


#Cierre
if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">

      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="#">Agregar cita</a></li>


      </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-md-12">

                <h4 class="Titulo_Pagina">Agregar cita</h4>

                <form action="guardar_Cita" method="POST" name="formularioActualizarcliente">
                    <div class="box box-body row">
                        <div class="col-md-12"><?php echo $respuesta; ?></div>

                        <div class="form-group col-md-6">
                            <div align="left">
                                <strong>Usuario</strong>
                            </div>
                            <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;"
                                required="required" onChange="cargarFecha();">
                                <option value="0" disabled selected>Seleccione</option>
                                <!--<option value="<?= $_SESSION['ID'] ?>"><?= $_SESSION['NOMBRE_USUARIO'] ?></option>-->
                                <?php
                                usuariosEspecialistasSelect();
                                ?>
                            </select>
                        </div>

                        <style type="text/css">
                            #div-fecha {
                                display: none;
                            }

                            #div-Hora {
                                display: none;
                            }
                        </style>

                        <div id="div-fecha" class="form-group col-md-6">
                            <!-- Fecha para verificar disponiblidad   -->
                            <div align="left">
                                <strong>Fecha</strong>
                            </div>
                            <input type="date" class="form-control input-lg" name="fecha" id="fecha"
                                min="<?php echo date('Y-m-d') ?>" onChange="verDia();" required>

                            <div id="div-results"></div>
                        </div>


                        <div class="form-group col-md-6">
                            <div align="left">
                                <strong>Nombre Paciente</strong>
                            </div>
                            <input type="text" class="form-control input-lg" name="nombre" placeholder="Nombre"
                                value="<?php echo $nombre_cliente ?>" required>
                        </div>

                        <?php if (!isset($_GET['editar_cita'])): ?>
                            <!-- <div class="form-group col-md-2" style="margin-bottom: auto;">
                              <div align="left">
                                  <strong>Indicativo</strong>
                              </div>
                              <select id="indicativo" name="indicativo" class="form-control select2"
                                  style="width: 100%;" >
                                  <?php
                                  //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
                                  echo selectMaster("", "numero", "numero,nombre", "indicativos");

                                  ?>
                              </select>
                          </div> -->
                        <?php endif; ?>
                        <div class="form-group col-md-4">
                            <div align="left">
                                <strong>Celular</strong>
                            </div>
                            <input type="number" class="form-control input-lg" name="telefono" placeholder="3206547898"
                                value="<?php echo $whatsapp ?>" required>
                            <font color="red" size="2">Para enviar la notificación de Whatsapp debe de colocar el
                                código país antes del numero +57</font>
                        </div>
                        <div class="form-group col-md-6">
                            <div align="left">
                                <strong>Correo</strong>
                            </div>
                            <input type="email" class="form-control input-lg" name="correo" placeholder="Correo"
                                value="<?php echo $correo_cliente ?>">
                            <font color="red" size="2">Para enviar la notificación al correo colocar el correo de los
                                contrario no colocarlo </font>
                        </div>

                        <!-- <div class="form-group col-md-6">
                <div align="left">
                  <strong>Motivo de consulta</strong>
                </div>
                <input type="text" class="form-control input-lg" id="motivoConsulta" name="motivoConsulta" placeholder="Motivo de consulta" value="<?php echo $motivoConsulta ?>" required>
              </div> -->
                        <div class="form-group col-md-6">
                            <div align="left"><strong>Servicio</strong> <a href="CL_MotivosConsulta.php"><i
                                        class="fa fa-cog"></i> </a> </div>
                            <!-- <div align="left"><strong>Motivo de consulta</strong></div> -->
                            <!-- <input type="text" class="form-control input-lg" id="motivoConsulta" name="motivoConsulta" placeholder="Motivo de consulta" required> -->
                            <select name="motivoConsulta" class="form-control select2" style="width: 100%;"
                                onchange="tiempoMotivoConsulta(this.value, 'duracion')" required>
                                <option value="">Seleccione...</option> <!-- Campo por defecto -->
                                <?php
                                mysqli_set_charset($conn3, "utf8");
                                $queryList = mysqli_query($conn3, "SELECT * FROM  Motivos_Consulta where (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}') and Activo = 1");
                                $nrowl = mysqli_num_rows($queryList);

                                while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                                    $id = $row_recordset32A['id'];
                                    $nombre = $row_recordset32A['descripcion'];

                                    echo "<option value='$id'> $nombre </option>";
                                }
                                ?>
                            </select>


                            </select>

                        </div>

                        <div class="form-group col-md-6">
                            <div align="left">
                                <strong>Tiempo de Cita</strong>
                            </div>
                            <select id="duracion" name="duracion" class="form-control select2"
                                data-placeholder="Seleccione el tiempo en minutos" style="width: 100%;" required>
                                <option value="<?php echo $duracion ?>"> <?php echo categoria($duracion) ?> </option>
                                <option>5</option>
                                <option>10</option>
                                <option>15</option>
                                <option>20</option>
                                <option>30</option>
                                <option>45</option>
                                <option>60</option>
                                <option>80</option>
                                <option>120</option>
                            </select>
                        </div>


                        <div class="form-group col-md-12">
                            <div align="center">
                                <label>
                                    <input type="radio" name="P" value="0" class="flat-red" checked>
                                    <i class="fa fa-user"></i> Presencial

                                    <input type="radio" name="P" value="2" class="flat-red" checked>
                                    <i class="fa fa-user"></i> Domiciliaria

                                    <?php if ($clienteId > 0): ?>
                                        <input type="radio" name="P" value="1" class="flat-red" checked>
                                        <i class="fa fa-video-camera"></i> Virtual
                                    </label>
                                <?php endif ?>
                                <?php if ($clienteId == ''): ?>
                                    <br>
                                    <i class="fa fa-video-camera"></i>
                                    <a href="hcmePacientes">Para agendar citas virtuales debemos de seleccionar el
                                        paciente</a>
                                <?php endif ?>
                                </label>
                            </div>
                        </div>

                        <div align="center" class="col-md-12">
                            <div id="div-resultsHora"></div>
                        </div>

                        <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                        <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>">
                        <input type="hidden" name="idCitas" id="idCitas" value="<?php echo $_GET['editar_cita'] ?>">
                        <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                        <input type="hidden" name="sucursal" id="sucursal" value='0'>

                    </div>

                </form>
            </div>


            <br>
            <div class="col-md-12">
                <div class="box-body box">
                    <h3 align="Center"><b>Citas Agendadas</b></h3>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped col-md-12">
                            <thead>
                                <tr>

                                    <th class="text-center">Doctor</th>
                                    <th class="text-center">Fecha-Hora</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Correo</th>
                                    <th class="text-center">Frecuencia</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-center">Servicio</th>
                                    <!-- <th class="text-center">Motivo consulta</th> -->
                                    <th class="text-center"> Tipo </th>
                                    <th class="text-center"> Estado Presencial </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $ID = $_SESSION['ID'];

                                $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));


                                $doctor = $_SESSION['username'];

                                $queryListA = mysqli_query($conn3, "SELECT * FROM  citas  where  estado  = 1 and (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') $queryClienteC  order by fecha DESC");

                                $nrowl = mysqli_num_rows($queryListA);
                                while ($row_recordset32A = mysqli_fetch_array($queryListA)) {


                                    $idCitas = $row_recordset32A['idCitas'];
                                    $doctor = $row_recordset32A['doctor'];
                                    $fecha = $row_recordset32A['fecha'];
                                    $Hora = $row_recordset32A['Hora'];
                                    $nombre = $row_recordset32A['nombre'];
                                    $telefono = $row_recordset32A['telefono'];
                                    $frecuencia = $row_recordset32A['frecuencia'];
                                    $cantidad = $row_recordset32A['cantidad'];
                                    $correo = $row_recordset32A['correo'];
                                    $estadoPresencia = $row_recordset32A['estadoPresencia'];
                                    $motivoConsultaId = $row_recordset32A['motivoConsulta'];
                                    $motivoConsulta = (is_numeric($row_recordset32A['motivoConsulta']) ? funcionMaster($row_recordset32A['motivoConsulta'], 'id', 'descripcion', 'Motivos_Consulta') : $row_recordset32A['motivoConsulta']);
                                    $tipo = $row_recordset32A['tipo'];
                                    $link_googlecalendar = $row_recordset32A['link_googlecalendar'];


                                    if ($tipo == 0) {
                                        $tipoE = '<font color="blue"> <i class="fa fa-user" title="Presencial" name="Presencial"></i> </font>';
                                    } elseif ($tipo == 1) {
                                        $tipoE = '<font color="#04CC05"> <i class="fa fa-video-camera" title="Virtual" name="Virtual"></i></font>';
                                    } elseif ($tipo == 2) {
                                        $tipoE = '<font color="red"> <i class="fa fa-user" title="Domiciliaria" name="Domiciliaria"></i></font>';
                                    }
                                    echo '
                      <tr>
                      <td width="20%"> 
                      <font color="#04CC05"> 
                      <a href="agregarCitas?editar_cita=' . $idCitas . '"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i>  </a> ';

                                    if ($_SESSION['TIPO'] == 99) {
                                        echo '
                      <a href="EliminarCita.php?idCitas=' . $idCitas . '"> <font color = "red"> <i class="fa fa-trash" title="ELIMINAR" name="ELIMINAR"></i></font>  </a>';
                                    }

                                    if ($CitasGoogleCalendar == "Si") {

                                        if ($link_googlecalendar != "") {
                                            echo '
                      <a href="' . $link_googlecalendar . '" target="_blank"> <font color = "green"> <i class="fa fa-calendar" title="Ver Evento en Google Calendar"></i></font>  </a>';

                                            echo '
                      <a href="ApiGoogleCalendar.php?cita_id=' . $idCitas . '&ruta=1" target="_blank"> <font color = "green"> <i class="fa fa-refresh" title="Volver a Crear el Evento en Google Calendar"></i></font>  </a>';
                                        } else {
                                            echo '
                      <a href="ApiGoogleCalendar.php?cita_id=' . $idCitas . '&ruta=1"> <font color = "green"> <i class="fa fa-address-book" title="Agregar Cita en Google Calendar" ></i></font>  </a>';
                                        }
                                    }


                                    if ($motivoConsulta == '') {
                                        $motivoConsulta = funcionMaster($row_recordset32A["odprocedimiento_id"], 'id', 'Nombre', 'OD_Procedimiento');
                                        if ($motivoConsulta == '') {
                                            $motivoConsulta = funcionMaster($row_recordset32A["sinvetrios_id"], 'ID', 'descripcion', 'sinvetrios');
                                        }
                                    }


                                    echo '</font> ' . funcionMaster($doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios') . '</td>
                      <td width="10%" class="text-center"> ' . $fecha . '-' . $Hora . '</td>
                      <td width="10%" class="text-center"> ' . $nombre . '</td>
                      <td width="10%" class="text-center">' . $telefono . '</td>
                      <td width="10%" class="text-center">' . $correo . '</td>
                      <td width="10%" class="text-center">' . $frecuencia . '</td>
                      <td width="10%" class="text-center">' . $cantidad . '</td>
                      <td width="40%" class="text-center">
                      ' . utf8_encode($motivoConsulta) . '</td>
                      <td width="1%" class="text-center">' . $tipoE . ' </td>';
                                    ?>
                                    <td style="width: 20%;" class="text-center">
                                        <?php
                                        $botonesPresencial = [
                                            "0" => "No ha Ingresado",
                                            "1" => "Ingresado",
                                            "2" => "Retirado"
                                        ];
                                        ?>
                                        <div class="dropdown dropup" style="position: relative;">
                                            <button class="btn btn-default dropdown-toggle" type="button"
                                                data-toggle="dropdown" title="<?= $botonesPresencial[$estadoPresencia] ?>"
                                                id="btn2<?= $idCitas ?>"> <?= $botonesPresencial[$estadoPresencia] ?>
                                            </button>
                                            <ul class="dropdown-menu" style="top: auto; bottom: 100%; position: absolute;">
                                                <li><a style="cursor: pointer; padding: 10px;"
                                                        onclick="presenciaDinamico(<?= $idCitas ?>, 0)"> No ha
                                                        Ingresado</a>
                                                </li>
                                                <li><a style="cursor: pointer; padding: 10px;"
                                                        onclick="presenciaDinamico(<?= $idCitas ?>, 1)"> Ingresado</a>
                                                </li>
                                                <li><a style="cursor: pointer; padding: 10px;"
                                                        onclick="presenciaDinamico(<?= $idCitas ?>, 2)"> Retirado</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <?php
                                    echo '</tr>';
                                    // <a href="masterEditor.php?filtro=' . $idCitas . '&tabla=citas&Columna=idCitas&origen=agregarCitas&campoEditado=' . $motivoConsultaId . '&columnaEditado=motivoConsulta&idUsuario=' . $ID . '"> <font color = "green"> <i class="fa fa-pencil" title="Editar Campo" name="Editar Campo"></i></font>  </a>
                                }

                                //mssql_close($dbhandle);
                                ?>
                                <a href=""></a>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Doctor</th>
                                    <th class="text-center">Fecha-Hora</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Correo</th>
                                    <th class="text-center">Frecuencia</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-center">Servicio</th>
                                    <!-- <th class="text-center">Motivo Consulta</th> -->
                                    <th class="text-center"> Tipo </th>
                                    <th class="text-center"> Estado Presencial </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
                <!-- /.box-body -->
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
    /* para que funcione correctamente el select de estado presencial */
    .dropdown-menu.show {
        display: inline-table;
    }
</style>

<?php
include 'footer.php';

?>

<!-- Funciona para consultar disponibilidad -->

<script type="text/javascript">
    function verDia() {
        // estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();
        var doctor = $("#doctor").val();
        var idCitas = $("#idCitas").val();
        var Sucursales = $("#Sucursales").val();
        var sucursal = $("#sucursal").val();

        // aqui enviamos el mensaje por medio de un arreglo
        console.log(Sucursales);
        console.log(sucursal);
        $.ajax({
            type: "POST",
            url: "disponibilidad.php",
            data: {
                fecha: fecha,
                Hora: Hora,
                usuario_id: usuario_id,
                doctor: doctor,
                Sucursales: Sucursales,
                sucursal: sucursal,
                idCitas: idCitas
            },
            success: function (response) {
                $('#div-results').html(response);

            }
        });
    };

    function verHora() {
        // estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();
        var doctor = $("#doctor").val();
        var idCitas = $("#idCitas").val();
        var Sucursales = $("#Sucursales").val();
        var sucursal = $("#sucursal").val();
        console.log(Sucursales);
        console.log(sucursal);
        // aqui enviamos el mensaje por medio de un arreglo

        $.ajax({
            type: "POST",
            url: "disponibilidadHora.php",
            data: {
                fecha: fecha,
                Hora: Hora,
                usuario_id: usuario_id,
                doctor: doctor,
                Sucursales: Sucursales,
                sucursal: sucursal,
                idCitas: idCitas
            },
            success: function (response) {
                $('#div-resultsHora').html(response);

            }
        });
    };



    function cargarFecha() {
        var x = document.getElementById('div-fecha');
        x.style.display = 'none';

        if (x.style.display === 'none') {
            x.style.display = 'block';
        }
    }
</script>

<script type="text/javascript">
    $(function () {
        $('select[name="indicativo"]').on('change', function (e) {
            $('input[name="monto"]').val($(this).find(":selected").text());
        })
    })

    // seleccione el indicativo correspondiente
    <?php $indicativo = funcionMaster($_SESSION['ID'], 'ID', 'Indicativo', 'usuarios');
    if ($_GET['cI'] <> "") {
        $indicativo = funcionMaster($clienteId, 'cliente_id', 'indicativo', 'cliente');
    } else {
        $indicativo = funcionMaster($_SESSION['ID'], 'ID', 'Indicativo', 'usuarios');
    }
    ?>
    $(window).on("load", function () {
        $("#indicativo > option[value='<?php echo $indicativo ?>']").attr("selected", true);
        $('#indicativo').select2();
    });
</script>


<script>
    $(document).ready(function () {

        $('#duracion').select2({
            tags: true,
            createTag: function (params) {
                // Don't offset to create a tag if there is no @ symbol
                if (params.term.search('^[0-9]+$') == 0) {
                    // Return null to disable tag creation
                    return {
                        id: params.term,
                        text: params.term
                    }
                } else {
                    return null;
                }
                //console.log(params.term.search('/[0-9]/'));


            }
        });

    });

    const tiempoMotivoConsulta = (id, mascara) => {
        let data = {
            key: "info_motivoConsulta",
            mascara: mascara,
            id: id
        };
        $.ajax({
            url: "./ajax_calendar.php",
            data: data,
            type: "POST",
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response.status) {
                    for (const key in object = response.data[0]) {
                        if (Object.hasOwnProperty.call(object, key)) {
                            if (key == mascara) {
                                $(`#${key}`).val([object[key]]).trigger("change.select2");
                                if ($(`#${key}`).val() != object[key]) {
                                    $(`#${key}`).append(`<option>${object[key]}</option>`).val([object[
                                        key]]).trigger("change.select2");
                                }
                            }
                        }
                    }
                }
            }
        });
    };

    <?php if ($motivoConsulta != '') { ?>
        // NO ES NECESARIO YA QUE AL EDITAR AUTOMATICAMENTE SE ANEXA EL TIEMPO DE LA CITA
        // tiempoMotivoConsulta('<?php echo $motivoConsulta ?>', 'motivoConsulta');
    <?php } ?>

    $(document).ready(function () {
        var table = $('#example1').DataTable();
        table.on('draw.dt', function () {
            $('.select2').select2(); // Ejecutar Select2 en cada elemento con la clase "select2"
        });
    });

    const presenciaDinamico = (id, estado) => {
        let data = {
            key: "updateEstadoPresencialCita",
            idCitas: id,
            estadoPresencia: estado
        };
        $.ajax({
            url: "./ajax_calendar.php",
            data: data,
            type: "POST",
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    let botonesPresencial = JSON.parse(`<?= json_encode($botonesPresencial) ?>`);
                    if (response.status) {
                        $(`#btn2${id}`).attr('title', botonesPresencial[estado]).html(botonesPresencial[
                            estado]);
                    }
                }
            }
        });
    };
</script>