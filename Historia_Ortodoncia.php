<?php
include 'header.php';
include 'menu.php';
include 'verificarSesion.php';

$clienteId = $_GET['clienteId'];
$usuarioId = $_GET['usuarioId'];
$ID = $_SESSION['ID'];

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));


$queryList = mysqli_query($conn3, "SELECT * FROM  operacionRecetario where cliente_id = $clienteId order by id ASC");
/// echo "SELECT * FROM  operacionRecetario where cliente_id = $clienteId order by id ASC";
$nrowl = mysqli_num_rows($queryList);

while ($row_recordset32 = mysqli_fetch_array($queryList)) {

    $idReceta = $row_recordset32['idReceta'];
}

if ($queryList == '') {
    $idR == 1;
} else {
    $idR = ($idReceta + 1);
}

$queryList = mysqli_query($conn3, "SELECT * FROM cliente where cliente_id = $clienteId");
$nrowl = mysqli_num_rows($queryList);
while ($row_recordset32 = mysqli_fetch_array($queryList)) {
    $nombre_cliente = $row_recordset32['nombre_cliente'];
    $fechaNacimiento = $row_recordset32['fechaNacimiento'];
}



?>
<style type="text/css">
    input[type=radio]:focus,
    input[type=checkbox]:focus {
        outline: none;
    }

    input[type=checkbox] {
        position: relative;
        right: -25px;
    }
</style>
<style>

</style>

<link href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' rel='stylesheet' type='text/css'>

<!-- Script -->
<script src="js/jquery.min-3.2.1.js"></script>
<script src='js/select2.min-4.0.3.js'></script>

<link rel="stylesheet" href="apiVoz.css">

<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<link href="css/css_historia_clinica.css" rel="stylesheet" type="text/css" media="all">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Consulta de Ortodoncia, Paciente:
            <?php echo $nombre_cliente . ', Edad: ' . CalculoEdadPaciente($fechaNacimiento); ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Consulta de Ortodoncia </a></li>
        </ol>
    </section>

    <section class="content">
        <div class="">
            <div class="col-xs-12">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="col-md-12">


                            <div class="box box-solid">
                                <!-- /.box-header -->
                                <!-- <div class="box-body">
                  <div class="box-group" id="accordion2">
                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion2" href="#collapseEstadoIngreso">
                            Estado Ingreso del Paciente
                          </a>
                        </h4>
                      </div>
                      <div id="collapseEstadoIngreso" class="panel-collapse collapse">
                        <div class="col-md-12">
                          <div class="form-group"></div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group"></div>
                          <div class="row">
                            <div class="col-12 col-md-3"></div>
                            <div class="col-12 col-md-6" id="div-Ingresos"></div>
                            <div class="col-12 col-md-3"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
                                <form action="Guardar_Historia_Ortodoncia.php" method="POST"
                                    id="FormularioHistoriaClinica">
                                    <div class="box-body">

                                        <!-- cambiar el estilo del menu desplegable id=accordion , class=panel panel-default, class=panel-heading class=panel-title-->
                                        <div class="box-group" id="accordion1">
                                            <!-- lista -->
                                            <div class="panel box box-primary">
                                                <div class="box-header with-border">
                                                    <h4 class="box-title">
                                                        <a data-toggle="collapse" data-parent="#accordion1"
                                                            href="#collapseOne">
                                                            Datos personales
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse">
                                                    <?php echo datosPacientes($clienteId); ?>
                                                </div>
                                            </div>
                                            <!--cierre de lista-->
                                            <!-- lista -->
                                            <div class="panel box box-primary">
                                                <div class="box-header with-border">
                                                    <h4 class="box-title">
                                                        <a data-toggle="collapse" data-parent="#accordion1"
                                                            href="#collapseThree">
                                                            1.Diagnóstico Articular
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseThree" class="panel-collapse collapse">

                                                    <div class="box-body row">

                                                        <div class="col-md-4">
                                                            <label>Dolor en Rostro</label>
                                                            <input type="checkbox" class="form-check-input"
                                                                name="InformacionAcudiente[Dolor en Rostro]" value="Si">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Dolor en Cuello</label>
                                                            <input type="checkbox" class="form-check-input"
                                                                name="InformacionAcudiente[Dolor en Cuello]" value="Si">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Dolor de Cabeza</label>
                                                            <input type="checkbox" class="form-check-input"
                                                                name="InformacionAcudiente[Dolor de Cabeza]">
                                                        </div>
                                                        <br> <br>
                                                        <div class="col-md-4">
                                                            <label>Historia de Trauma</label>
                                                            <select name="InformacionAcudiente[Historia de Trauma]"
                                                                class="form-control select2" style="width: 100%;">
                                                                <option selected="selected" value="">Seleccione</option>
                                                                <option value="Si">Si</option>
                                                                <option Value="No">No</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Tratamiento Previo</label>
                                                            <select name="InformacionAcudiente[Tratamiento Previo]"
                                                                class="form-control select2" style="width: 100%;">
                                                                <option selected="selected" value="">Seleccione</option>
                                                                <option value="Si">Si</option>
                                                                <option Value="No">No</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Tensión Emocional</label>
                                                            <select name="InformacionAcudiente[Tensión Emocional]"
                                                                class="form-control select2" style="width: 100%;">
                                                                <option selected="selected" value="">Seleccione</option>
                                                                <option value="Si">Si</option>
                                                                <option Value="No">No</option>
                                                            </select>
                                                        </div>
                                                        <br> <br>
                                                        <div class="col-md-4">
                                                            <label>Eventos Traumáticos</label>
                                                            <input type="text"
                                                                name="InformacionAcudiente[Eventos Traumáticos]"
                                                                class="form-control">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Hábitos/ Parafunciones</label>
                                                            <input type="text"
                                                                name="InformacionAcudiente[Hábitos Parafunciones]"
                                                                class="form-control">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Ruidos</label>
                                                            <input type="text" name="InformacionAcudiente[Ruidos]"
                                                                class="form-control">
                                                        </div>

                                                        <br> <br>
                                                        <br> <br>

                                                        <table class="table" style="width: 100%;margin-top: 3px;">
                                                            <center>
                                                                <h3><b>Musculatura Craneocervical</b></h3>
                                                            </center>
                                                            <tr>
                                                                <td width="35%">
                                                                    <b>Derecho</b>
                                                                </td>
                                                                <td width="30%">
                                                                    <b>Izquierdo</b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="10%">
                                                                    <b>Temporal Anterior:</b>
                                                                    <select
                                                                        name="EnfermedadActual[Temporal Anterior Derecho]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                                <td width="10%">
                                                                    <b>Temporal Anterior:</b> <select
                                                                        name="EnfermedadActual[Temporal Anterior Izquierdo]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td width="20%">
                                                                    <b>Temporal Medio:</b>
                                                                    <select
                                                                        name="EnfermedadActual[Temporal Medio Derecho]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                                <td width="15%">
                                                                    <b>Temporal Medio:</b> <select
                                                                        name="EnfermedadActual[Temporal Medio Izquierdo]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%">
                                                                    <b>Temporal Posterior:</b>
                                                                    <select
                                                                        name="EnfermedadActual[Temporal Posterior Derecho]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                                <td width="15%">
                                                                    <b>Temporal Posterior:</b> <select
                                                                        name="EnfermedadActual[Temporal Posterior Izquierdo]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%">
                                                                    <b>Masetero Superficial:</b>
                                                                    <select
                                                                        name="EnfermedadActual[Masetero Superficial Derecho]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                                <td width="15%">
                                                                    <b>Masetero Superficial:</b> <select
                                                                        name="EnfermedadActual[Masetero Superficial Izquierdo]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%">
                                                                    <b>Masetero Profundo:</b>
                                                                    <select
                                                                        name="EnfermedadActual[Masetero Profundo Derecho]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                                <td width="15%">
                                                                    <b>Masetero Profundo:</b> <select
                                                                        name="EnfermedadActual[Masetero Profundo Izquierdo]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%">
                                                                    <b>Tendón del Temporal:</b>
                                                                    <select
                                                                        name="EnfermedadActual[Tendón del Temporal Derecho]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                                <td width="15%">
                                                                    <b>Tendón del Temporal:</b> <select
                                                                        name="EnfermedadActual[Tendón del Temporal Izquierdo]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%">
                                                                    <b>Pterigoideo Externo:</b>
                                                                    <select
                                                                        name="EnfermedadActual[Pterigoideo Externo Derecho]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                                <td width="15%">
                                                                    <b>Pterigoideo Externo:</b> <select
                                                                        name="EnfermedadActual[Pterigoideo Externo Izquierdo]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%">
                                                                    <b>Esternocleidomastoideo:</b>
                                                                    <select
                                                                        name="EnfermedadActual[Esternocleidomastoideo Derecho]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                                <td width="15%">
                                                                    <b>Esternocleidomastoideo:</b> <select
                                                                        name="EnfermedadActual[Esternocleidomastoideo Izquierdo]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%">
                                                                    <b>Suboccipital:</b>
                                                                    <select
                                                                        name="EnfermedadActual[Suboccipital Derecho]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                                <td width="15%">
                                                                    <b>Suboccipital:</b> <select
                                                                        name="EnfermedadActual[Suboccipital Izquierdo]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </table>


                                                        <table class="table" style="width: 100%;margin-top: 3px;">
                                                            <center>
                                                                <h3><b>ATM</b></h3>
                                                            </center>
                                                            <tr>
                                                                <td width="35%">
                                                                    <b>Derecho</b>
                                                                </td>
                                                                <td width="30%">
                                                                    <b>Izquierdo</b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%">
                                                                    <b>1.Sinovial Anteroinferior:</b>
                                                                    <select
                                                                        name="Checks_Antecedentes[Sinovial Anteroinferior Derecho]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                                <td width="15%">
                                                                    <b>1.Sinovial Anteroinferior:</b> <select
                                                                        name="Checks_Antecedentes[Sinovial Anteroinferior Izquierdo]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td width="20%">
                                                                    <b>2.Sinovial Anterosuperior:</b>
                                                                    <select
                                                                        name="Checks_Antecedentes[Sinovial Anterosuperior Derecho]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                                <td width="15%">
                                                                    <b>2.Sinovial Anterosuperior:</b> <select
                                                                        name="Checks_Antecedentes[Sinovial Anterosuperior Izquierdo]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%">
                                                                    <b>3.Ligamento Colateral Externo:</b>
                                                                    <select
                                                                        name="Checks_Antecedentes[Ligamento Colateral Externo Derecho]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                                <td width="15%">
                                                                    <b>3.Ligamento Colateral Externo:</b> <select
                                                                        name="Checks_Antecedentes[Ligamento Colateral Externo Izquierdo]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%">
                                                                    <b>4.Ligamento Temporomandibular:</b>
                                                                    <select
                                                                        name="Checks_Antecedentes[Ligamento Temporomandibular Derecho]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                                <td width="15%">
                                                                    <b>4.Ligamento Temporomandibular:</b> <select
                                                                        name="Checks_Antecedentes[Ligamento Temporomandibular Izquierdo]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%">
                                                                    <b>5.Sinovial Posteroinferior:</b>
                                                                    <select
                                                                        name="Checks_Antecedentes[Sinovial Posteroinferior Derecho]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                                <td width="15%">
                                                                    <b>5.Sinovial Posteroinferior:</b> <select
                                                                        name="Checks_Antecedentes[Sinovial Posteroinferior Izquierdo]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%">
                                                                    <b>6.Sinovial Postero Superior:</b>
                                                                    <select
                                                                        name="Checks_Antecedentes[Sinovial Postero Superior Derecho]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                                <td width="15%">
                                                                    <b>6.Sinovial Postero Superior:</b> <select
                                                                        name="Checks_Antecedentes[Sinovial Postero Superior Izquierdo]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%">
                                                                    <b>7.Ligamento Posterior:</b>
                                                                    <select
                                                                        name="Checks_Antecedentes[Ligamento Posterior Derecho]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                                <td width="15%">
                                                                    <b>7.Ligamento Posterior:</b> <select
                                                                        name="Checks_Antecedentes[Ligamento Posterior Izquierdo]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%">
                                                                    <b>8.Zona Retrodiscal:</b>
                                                                    <select
                                                                        name="Checks_Antecedentes[Zona Retrodiscal Derecho]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                                <td width="15%">
                                                                    <b>8.Zona Retrodiscal:</b> <select
                                                                        name="Checks_Antecedentes[Zona Retrodiscal Izquierdo]"
                                                                        class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Sensibilidad">Sensibilidad
                                                                        </option>
                                                                        <option value="Dolor">Dolor</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--cierre de lista-->






                                            <!-- lista -->
                                            <!-- <div class="panel box box-primary">
                                                <div class="box-header with-border">
                                                    <h4 class="box-title">
                                                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapseEight">
                                                            Examenes y Laboratorios
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseEight" class="panel-collapse collapse">

                                                    <div class="box-body">
                                                        <label>Seleccione Examen de Imagenologia</label>
                                                        <select id="imagenologia_examen" name="Imagenologia_Examen[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                                                            <?php
                                                            try {
                                                                $queryList = mysqli_query($conn3, "SELECT * FROM examenes_historia where Tipo='1' order by id");
                                                                $nrowl = mysqli_num_rows($queryList);
                                                                while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                                                    $id = $row_recordset32['id'];
                                                                    $Nombre = $row_recordset32['Nombre'];
                                                                    echo "<option value='$id'>$Nombre</option>";
                                                                }
                                                            } catch (Exception | Error $e) {
                                                                echo "";
                                                            }
                                                            ?>
                                                        </select>

                                                        <label>Seleccione Examen de Laboratorio</label>
                                                        <select id="laboratorio_examenes" name="Laboratorio_Examenes[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                                            <?php
                                                            try {
                                                                $queryList = mysqli_query($conn3, "SELECT * FROM examenes_historia where Tipo='2' order by id");
                                                                $nrowl = mysqli_num_rows($queryList);
                                                                while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                                                    $id = $row_recordset32['id'];
                                                                    $Nombre = $row_recordset32['Nombre'];
                                                                    echo "<option value='$id'>$Nombre</option>";
                                                                }
                                                            } catch (Exception | Error $e) {
                                                                echo "";
                                                            }
                                                            ?>
                                                        </select>

                                                    </div>

                                                </div>
                                            </div> -->
                                            <!--cierre de lista-->





                                            <!-- lista -->
                                            <div class="panel box box-primary">
                                                <div class="box-header with-border">
                                                    <h4 class="box-title">
                                                        <a data-toggle="collapse" data-parent="#accordion1"
                                                            href="#collapseTen">
                                                            2. Diagnóstico Respiratorio
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTen" class="panel-collapse collapse">

                                                    <div class="box-body row">

                                                        <div class="col-md-4">
                                                            <label>Restricción Nasal</label>
                                                            <select name="Checks_Revision[Restricción Nasal]"
                                                                class="form-control select2" style="width: 100%;">
                                                                <option selected="selected" value="">Seleccione</option>
                                                                <option value="Si">Si</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Ronquido</label>
                                                            <select name="Checks_Revision[Ronquido]"
                                                                class="form-control select2" style="width: 100%;">
                                                                <option selected="selected" value="">Seleccione</option>
                                                                <option value="Si">Si</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Signos de AOS</label>
                                                            <select name="Checks_Revision[Signos de AOS]"
                                                                class="form-control select2" style="width: 100%;">
                                                                <option selected="selected" value="">Seleccione</option>
                                                                <option value="Si">Si</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Cirugías</label><textarea
                                                                name="Checks_Revision[Cirugias] class=" form-control
                                                                input-lg" placeholder="Cirugías"
                                                                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Alergias</label><textarea
                                                                name="Checks_Revision[Alergias] class=" form-control
                                                                input-lg" placeholder="Alergias"
                                                                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Observaciones</label><textarea
                                                                name="Checks_Revision[Observaciones] class="
                                                                form-control input-lg" placeholder="Observaciones"
                                                                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <!--cierre de lista-->



                                            <!-- lista -->
                                            <div class="panel box box-primary">
                                                <div class="box-header with-border">
                                                    <h4 class="box-title">
                                                        <a data-toggle="collapse" data-parent="#accordion1"
                                                            href="#collapseMAXI">
                                                            3. Diagnóstico Maxilofacial
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseMAXI" class="panel-collapse collapse">

                                                    <div class="box-body row">

                                                        <div class="col-md-6">
                                                            <label>Tipo de Frente</label>
                                                            <select name="SintomasGenerales[Tipo de Frente]"
                                                                class="form-control select2" style="width: 100%;">
                                                                <option selected="selected" value="">Seleccione</option>
                                                                <option value="Recta">Recta</option>
                                                                <option value="Redonda">Redonda</option>
                                                                <option value="Angulada">Angulada</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label>GALL-FA</label>
                                                            <input type="number" name="SintomasGenerales[GALL-FA]"
                                                                placeholder="MM" class="form-control">
                                                        </div>



                                                    </div>

                                                    <div class="box-body row">
                                                        <div class="" style="width: 100%;">



                                                            <div class="box-body">
                                                                <style>
                                                                    table {
                                                                        width: 100%;
                                                                        background: white;
                                                                        margin-bottom: 1.25em;
                                                                        border: solid 1px #dddddd;
                                                                        border-collapse: collapse;
                                                                        border-spacing: 0;
                                                                    }

                                                                    table tr th,
                                                                    table tr td {
                                                                        padding: 0.5625em 0.625em;
                                                                        font-size: 0.875em;
                                                                        color: #222222;
                                                                        border: 1px solid #dddddd;
                                                                    }

                                                                    table tr.even,
                                                                    table tr.alt,
                                                                    table tr:nth-of-type(even) {
                                                                        background: #f9f9f9;
                                                                    }

                                                                    @media only screen and (max-width: 768px) {

                                                                        table.resp,
                                                                        .resp thead,
                                                                        .resp tbody,
                                                                        .resp tr,
                                                                        .resp th,
                                                                        .resp td,
                                                                        .resp caption {
                                                                            display: block;
                                                                        }

                                                                        table.resp {
                                                                            border: none
                                                                        }

                                                                        .resp thead tr {
                                                                            display: none;
                                                                        }

                                                                        .resp tbody tr {
                                                                            margin: 1em 0;
                                                                            border: 1px solid #2ba6cb;
                                                                        }

                                                                        .resp td {
                                                                            border: none;
                                                                            border-bottom: 1px solid #dddddd;
                                                                            position: relative;
                                                                            padding-left: 45%;
                                                                            text-align: left;
                                                                        }

                                                                        .resp tr td:last-child {
                                                                            border-bottom: 1px double #dddddd;
                                                                        }

                                                                        .resp tr:last-child td:last-child {
                                                                            border: none;
                                                                        }

                                                                        .resp td:before {
                                                                            position: absolute;
                                                                            top: 6px;
                                                                            left: 6px;
                                                                            width: 45%;
                                                                            padding-right: 10px;
                                                                            white-space: nowrap;
                                                                            text-align: left;
                                                                            font-weight: bold;
                                                                        }

                                                                        td:nth-of-type(1):before {
                                                                            content: "Elementos";
                                                                        }
                                                                    }
                                                                </style>

                                                                <table class="resp">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col"
                                                                                style="text-align: center; background:#222222; color:#f9f9f9;">
                                                                                <h3>Dientes</h3>
                                                                            </th>
                                                                            <th scope="col" colspan="6"
                                                                                style="width: 20px; text-align: center; background:#222222; color:#f9f9f9;">
                                                                                <b>
                                                                                    <h3>Maxilar</h3>
                                                                                </b>
                                                                            <th scope="col" colspan="4"
                                                                                style="text-align: center; background:#222222; color:#f9f9f9;">
                                                                                <h3>Mandíbula</h3>
                                                                            </th>
                                                                        </tr>
                                                                        <tr>

                                                                            <th scope="col" style="text-align: center;">
                                                                                <h4> Elementos</h4>
                                                                            </th>
                                                                            <th scope="col" colspan="4"
                                                                                style="text-align: center;">
                                                                                <h4>Discrepancia
                                                                                    Central</h4>
                                                                            </th>
                                                                            <th scope="col"
                                                                                style="width: 20px; text-align: center;">
                                                                                <b>O</b>
                                                                                <input type="text" name="SI2" id="SI2"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                                </td>
                                                                            <th scope="col"
                                                                                style="width: 20px; text-align: center;">
                                                                                <b>C</b>
                                                                                <input type="text" name="BL1" id="BL1"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                                </td>
                                                                            <th scope="col" colspan="2"></th>
                                                                            <th scope="col"
                                                                                style="width: 20px; text-align: center;">
                                                                                <b>O</b>
                                                                                <input type="text" name="BL2" id="BL2"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                                </td>
                                                                            <th scope="col"
                                                                                style="width: 20px; text-align: center;">
                                                                                <b>C</b>
                                                                                <input type="text" name="BL5" id="BL5"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                                </td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td rowspan="7" style="text-align: center;">
                                                                                I,IV
                                                                            </td>
                                                                            <td colspan="2">
                                                                                <h4>AP</h4>
                                                                            </td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="AP1" id="AP1"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="MULTI();"
                                                                                    size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="AP2" id="AP2"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="MULTI();"
                                                                                    size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td style="width: 20px;"> <input type="text"
                                                                                    name="AP3" id="AP3"
                                                                                    class="form-control" value="0"
                                                                                    step="0.01"
                                                                                    onchange="TotaldeTodo();" size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="AP4" id="AP4"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <script>
                                                                                function MULTI() {
                                                                                    let m1;
                                                                                    let m2;
                                                                                    let r;
                                                                                    let r1;
                                                                                    m1 = document.getElementById("AP1").value;
                                                                                    m2 = document.getElementById("AP2").value;
                                                                                    r = m1 * 2;
                                                                                    r1 = m2 * 2;



                                                                                    document.getElementById("AP3").value = r;
                                                                                    document.getElementById("AP4").value = r1;

                                                                                }
                                                                            </script>
                                                                            <td style="width: 20px;"> <input type="text"
                                                                                    name="AP5" id="AP5"
                                                                                    class="form-control" value="0"
                                                                                    step="0.01" onchange="MULTI1();"
                                                                                    size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="AP6" id="AP6"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="MULTI1();"
                                                                                    size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="AP7" id="AP7"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td style="width: 20px;"> <input type="text"
                                                                                    name="AP8" id="AP8"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                        </tr>
                                                                        <script>
                                                                            function MULTI1() {
                                                                                let m1;
                                                                                let m2;
                                                                                let r;
                                                                                let r1;
                                                                                m1 = document.getElementById("AP5").value;
                                                                                m2 = document.getElementById("AP6").value;
                                                                                r = m1 * 2;
                                                                                r1 = m2 * 2;



                                                                                document.getElementById("AP7").value = r;
                                                                                document.getElementById("AP8").value = r1;

                                                                            }
                                                                        </script>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <h4>SI</h4>
                                                                            </td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="SI1" id="SI1"
                                                                                    class="form-control" step="any"
                                                                                    value="0" onchange="CAL();"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td></td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="SI3" id="SI3"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>

                                                                            <td style="width: 20px;"> <input type="text"
                                                                                    name="SI4" id="SI4"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <script type="text/javascript">
                                                                                function CAL() {
                                                                                    let m1;
                                                                                    let r;

                                                                                    m1 = document.getElementById("SI1").value;

                                                                                    if (m1 == 2) {
                                                                                        r = -1;
                                                                                    } else if (m1 == 3) {
                                                                                        r = -2;
                                                                                    } else if (m1 == 4) {
                                                                                        r = -3;
                                                                                    } else if (m1 == 5) {
                                                                                        r = -5;
                                                                                    } else if (m1 == 6) {
                                                                                        r = -7;
                                                                                    } else {
                                                                                        r = 0;
                                                                                    }

                                                                                    document.getElementById("SI3").value = r;
                                                                                    document.getElementById("SI4").value = r;
                                                                                    console.log(r);
                                                                                }
                                                                            </script>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="SI5" id="SI5"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="CAL1();"
                                                                                    size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td></td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="SI7" id="SI7"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td style="width: 20px;"> <input type="text"
                                                                                    name="SI8" id="SI8"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                        </tr>
                                                                        <script type="text/javascript">
                                                                            function CAL1() {
                                                                                let m1;
                                                                                let r;

                                                                                m1 = document.getElementById("SI5").value;

                                                                                if (m1 == 2) {
                                                                                    r = -1;
                                                                                } else if (m1 == 3) {
                                                                                    r = -2;
                                                                                } else if (m1 == 4) {
                                                                                    r = -3;
                                                                                } else if (m1 == 5) {
                                                                                    r = -5;
                                                                                } else if (m1 == 6) {
                                                                                    r = -7;
                                                                                } else {
                                                                                    r = 0;
                                                                                }

                                                                                document.getElementById("SI7").value = r;
                                                                                document.getElementById("SI8").value = r;
                                                                                console.log(r);
                                                                            }
                                                                        </script>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <h4>BL</h4>
                                                                            </td>
                                                                            <td style="width: 20px;"></td>
                                                                            <td></td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="BL3" id="BL3"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="BL4" id="BL4"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="BL7" id="BL7"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td style="width: 20px;"> <input type="text"
                                                                                    name="BL8" id="BL8"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <h4>SP</h4>
                                                                            </td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="SP3" id="SP3"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="SP4" id="SP4"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="SP7" id="SP7"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td style="width: 20px;"> <input type="text"
                                                                                    name="SP8" id="SP8"
                                                                                    class="form-control" value="0"
                                                                                    step="0.01"
                                                                                    onchange="TotaldeTodo();" size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="4"
                                                                                style="background: #0486FF; color: white">
                                                                                <h4>BL (MAxilar)</h4>
                                                                            </td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="BLM1" id="BLM1"
                                                                                    class="form-control" step="any"
                                                                                    value="0" onchange="TotaldeTodo();"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="BLM2" id="BLM2"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <h4>I</h4>
                                                                            </td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="IDis3" id="IDis3"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="IDis4" id="IDis4"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="IDis7" id="IDis7"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td style="width: 20px;"> <input type="text"
                                                                                    name="IDis8" id="IDis8"
                                                                                    class="form-control" value="0"
                                                                                    step="any" onchange="TotaldeTodo();"
                                                                                    size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <h4>ICD</h4>
                                                                            </td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td style="width: 20px;"><input
                                                                                    type="number" class="form-control"
                                                                                    step="any" value="0" name="Total_T"
                                                                                    id="Total_T"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    class="form-control" value="0"
                                                                                    step="any" name="Total_O"
                                                                                    id="Total_O"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td style="width: 20px;"><input type="text"
                                                                                    name="Total_R" id="Total_R"
                                                                                    class="form-control" value="0"
                                                                                    step="any" size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                            <td style="width: 20px;"> <input type="text"
                                                                                    name="Total_G" id="Total_G"
                                                                                    class="form-control" value="0"
                                                                                    step="any" size="40"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <script>
                                                                    //Emma
                                                                    function TotaldeTodo() {
                                                                        //Primero Fila (O)
                                                                        let SI2 = Number(document.getElementById("SI2").value);
                                                                        let AP3 = Number(document.getElementById("AP3").value);
                                                                        let SI3 = Number(document.getElementById("SI3").value);
                                                                        let BL3 = Number(document.getElementById("BL3").value);
                                                                        let SP3 = Number(document.getElementById("SP3").value);
                                                                        let BLM1 = Number(document.getElementById("BLM1")
                                                                            .value);
                                                                        let IDis3 = Number(document.getElementById("IDis3")
                                                                            .value);
                                                                        //Segunda Fila (C)
                                                                        let BL1 = Number(document.getElementById("BL1").value);
                                                                        let AP4 = Number(document.getElementById("AP4").value);
                                                                        let SI4 = Number(document.getElementById("SI4").value);
                                                                        let BL4 = Number(document.getElementById("BL4").value);
                                                                        let SP4 = Number(document.getElementById("SP4").value);
                                                                        let BLM2 = Number(document.getElementById("BLM2")
                                                                            .value);
                                                                        let IDis4 = Number(document.getElementById("IDis4")
                                                                            .value);
                                                                        //Tercera Fila (O)
                                                                        let BL2 = Number(document.getElementById("BL2").value);
                                                                        let AP7 = Number(document.getElementById("AP7").value);
                                                                        let SI7 = Number(document.getElementById("SI7").value);
                                                                        let BL7 = Number(document.getElementById("BL7").value);
                                                                        let SP7 = Number(document.getElementById("SP7").value);
                                                                        let IDis7 = Number(document.getElementById("IDis7")
                                                                            .value);
                                                                        //Cuarta Fila (C)
                                                                        let BL5 = Number(document.getElementById("BL5").value);
                                                                        let AP8 = Number(document.getElementById("AP8").value);
                                                                        let SI8 = Number(document.getElementById("SI8").value);
                                                                        let BL8 = Number(document.getElementById("BL8").value);
                                                                        let SP8 = Number(document.getElementById("SP8").value);
                                                                        let IDis8 = Number(document.getElementById("IDis8")
                                                                            .value);
                                                                        //Primera Fila
                                                                        let resultadoTotal = SI2 + AP3 + SI3 + BL3 + SP3 +
                                                                            BLM1 + IDis3;
                                                                        document.getElementById("Total_T").value =
                                                                            resultadoTotal;
                                                                        // Segundo Fila
                                                                        let resultadoTotal_O = BL1 + AP4 + SI4 + BL4 + SP4 +
                                                                            BLM2 + IDis4;
                                                                        document.getElementById("Total_O").value =
                                                                            resultadoTotal_O;
                                                                        // Tercera Fila
                                                                        let resultadoTotal_R = BL2 + AP7 + SI7 + BL7 + SP7 +
                                                                            IDis7;
                                                                        document.getElementById("Total_R").value =
                                                                            resultadoTotal_R;
                                                                        // Cuarta Fila
                                                                        let resultadoTotal_G = BL5 + AP8 + SI8 + BL8 + SP8 +
                                                                            IDis8;
                                                                        document.getElementById("Total_G").value =
                                                                            resultadoTotal_G;
                                                                    }
                                                                </script>

                                                                <br>
                                                                <br>
                                                                <style type="text/css">
                                                                    table {
                                                                        width: 100%;
                                                                        background: white;
                                                                        margin-bottom: 1.25em;
                                                                        border: solid 1px #dddddd;
                                                                        border-collapse: collapse;
                                                                        border-spacing: 0;
                                                                    }

                                                                    table tr th,
                                                                    table tr td {
                                                                        padding: 0.5625em 0.625em;
                                                                        font-size: 0.875em;
                                                                        color: #222222;
                                                                        border: 1px solid #dddddd;
                                                                    }

                                                                    table tr.even,
                                                                    table tr.alt,
                                                                    table tr:nth-of-type(even) {
                                                                        background: #f9f9f9;
                                                                    }

                                                                    @media only screen and (max-width: 768px) {

                                                                        table.resp,
                                                                        .resp thead,
                                                                        .resp tbody,
                                                                        .resp tr,
                                                                        .resp th,
                                                                        .resp td,
                                                                        .resp caption {
                                                                            display: block;
                                                                        }

                                                                        table.resp {
                                                                            border: none
                                                                        }

                                                                        .resp thead tr {
                                                                            display: none;
                                                                        }

                                                                        .resp tbody tr {
                                                                            margin: 1em 0;
                                                                            border: 1px solid #2ba6cb;
                                                                        }

                                                                        .resp td {
                                                                            border: none;
                                                                            border-bottom: 1px solid #dddddd;
                                                                            position: relative;
                                                                            padding-left: 45%;
                                                                            text-align: left;
                                                                        }

                                                                        .resp tr td:last-child {
                                                                            border-bottom: 1px double #dddddd;
                                                                        }

                                                                        .resp tr:last-child td:last-child {
                                                                            border: none;
                                                                        }

                                                                        .resp td:before {
                                                                            position: absolute;
                                                                            top: 6px;
                                                                            left: 6px;
                                                                            width: 45%;
                                                                            padding-right: 10px;
                                                                            white-space: nowrap;
                                                                            text-align: left;
                                                                            font-weight: bold;
                                                                        }

                                                                        td:nth-of-type(1):before {
                                                                            content: "Elementos";
                                                                        }
                                                                    }
                                                                </style>
                                                                <table class="resp">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col"
                                                                                style="width: 20px; text-align: center; background:#222222; color:#f9f9f9;">
                                                                                <h4> Elemento II</h4>
                                                                            </th>
                                                                            <th scope="col" colspan="2"
                                                                                style="width: 20px; text-align: center;">
                                                                                <h4>AP</h4>
                                                                            </th>
                                                                            <th scope="col"
                                                                                style="width: 20px; text-align: center;">
                                                                                <h4>O</h4>
                                                                                <input type="text" name="ELO1" id="ELO1"
                                                                                    class="form-control" value="0"
                                                                                    step="any"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </th>
                                                                            <th scope="col"
                                                                                style="width: 20px; text-align: center;">
                                                                                <h4>C</h4>
                                                                                <input type="text" name="ELO2" id="ELO2"
                                                                                    class="form-control" value="0"
                                                                                    step="any"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </th>
                                                                            <th scope="col" colspan="2"
                                                                                style="width: 20px; text-align: center;">
                                                                                <h4>AP</h4>
                                                                            </th>
                                                                            <th scope="col"
                                                                                style="width: 20px; text-align: center;">
                                                                                <h4>O</h4>
                                                                                <input type="text" name="ELO3" id="ELO3"
                                                                                    class="form-control" value="0"
                                                                                    step="any"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </th>
                                                                            <th scope="col"
                                                                                style="width: 20px; text-align: center;">
                                                                                <h4>C</h4>
                                                                                <input type="text" name="ELO4" id="ELO4"
                                                                                    class="form-control" value="0"
                                                                                    step="any"
                                                                                    style="width: 70px;height: 34px;padding: 6px 12px;display: block;">
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td
                                                                                style="width: 20px; text-align: center; background:#222222; color:#f9f9f9;">
                                                                                <h4> Elemento III</h4>
                                                                            </td>
                                                                            <td colspan="2"
                                                                                style="width: 20px; text-align: center; background: #0486FF; color:#f9f9f9;">
                                                                                <h4>BL</h4>
                                                                            </td>
                                                                            <td
                                                                                style="width: 20px; text-align: center;">
                                                                                <input type="text" name="ElementoBL"
                                                                                    id="ElementoBL" class="form-control"
                                                                                    value="0" step="any">
                                                                            </td>
                                                                            <td
                                                                                style="width: 20px; text-align: center;">
                                                                                <input type="text" name="ELBL4"
                                                                                    id="ELBL4" class="form-control"
                                                                                    value="0" step="any">
                                                                            </td>
                                                                            <td colspan="2"></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td
                                                                                style="width: 20px; text-align: center; background:#222222; color:#f9f9f9;">
                                                                                <h4>Elemento IV</h4>
                                                                            </td>
                                                                            <td colspan="2"
                                                                                style="width: 20px; text-align: center;">
                                                                                <h4>SI</h4>
                                                                            </td>
                                                                            <td><input type="text" name="ELOS1"
                                                                                    id="ELOS1" class="form-control"
                                                                                    value="0" step="any"></td>
                                                                            <td><input type="text" name="ELOS2"
                                                                                    id="ELOS2" class="form-control"
                                                                                    value="0" step="any"></td>
                                                                            <td colspan="2"
                                                                                style="width: 20px; text-align: center;">
                                                                                <h4>SI</h4>
                                                                            </td>
                                                                            <td><input type="text" name="ELOS3"
                                                                                    id="ELOS3" class="form-control"
                                                                                    value="0" step="any"></td>
                                                                            <td><input type="text" name="ELOS4"
                                                                                    id="ELOS4" class="form-control"
                                                                                    value="0" step="any"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td
                                                                                style="width: 20px; text-align: center; background:#222222; color:#f9f9f9;">
                                                                                <h4>Elemento V</h4>
                                                                            </td>
                                                                            <td colspan="4"></td>
                                                                            <td colspan="2"
                                                                                style="width: 20px; text-align: center;">
                                                                                <h4>PO</h4>
                                                                            </td>
                                                                            <td><input type="text" name="ELPO1"
                                                                                    id="ELPO1" class="form-control"
                                                                                    value="0" step="any"></td>
                                                                            <td><input type="text" name="ELPO2"
                                                                                    id="ELPO2" class="form-control"
                                                                                    value="0" step="any"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                                <div class="col-md-12">
                                                                    <table class="table table-responsive table-striped">

                                                                        <thead>
                                                                            <tr>
                                                                                <th
                                                                                    style="background: #222222; color:#f9f9f9;">
                                                                                    <h4>Ancho Pre-Tratamiento</h4>
                                                                                </th>
                                                                                <th
                                                                                    style="background: green; color:#f9f9f9;">
                                                                                    <h4>Ancho Elemento I</h4>
                                                                                </th>
                                                                                <th
                                                                                    style="background: #222222; color:#f9f9f9;">
                                                                                    <h4>Ancho Pre-Tratamiento</h4>
                                                                                </th>
                                                                                <th
                                                                                    style="background: #E00C0C; color:#f9f9f9;">
                                                                                    <h4>Ancho Elemento I</h4>
                                                                                </th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>

                                                                                <td>
                                                                                    <input type="number" name="LM6"
                                                                                        id="LM6"
                                                                                        class="form-control inputgroup"
                                                                                        id="nombrequeyoquiera2"
                                                                                        value="0" step="any">
                                                                                </td>


                                                                                <td>
                                                                                    <input type="number" name="LM7"
                                                                                        id="LM7"
                                                                                        class="form-control inputgroup"
                                                                                        id="nombrequeyoquiera2"
                                                                                        value="0" step="any"
                                                                                        onchange="Elementos()">
                                                                                </td>

                                                                                <td>
                                                                                    <input type="number" name="LM8"
                                                                                        id="LM8"
                                                                                        class="form-control inputgroup"
                                                                                        id="nombrequeyoquiera2"
                                                                                        value="0" step="any">
                                                                                </td>


                                                                                <td>
                                                                                    <input type="number" name="LM5"
                                                                                        id="LM5"
                                                                                        class="form-control inputgroup"
                                                                                        id="nombrequeyoquiera2"
                                                                                        value="0" step="any"
                                                                                        onchange="Elementos()">
                                                                                </td>

                                                                            </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <script>
                                                            function Elementos() {
                                                                var m1;
                                                                var m2;
                                                                var r;
                                                                var r1;

                                                                // m1 = document.getElementById("LM7").value;
                                                                // m2 = document.getElementById("LM5").value;
                                                                m1 = parseInt(document.getElementById("LM7").value);
                                                                m2 = parseInt(document.getElementById("LM5").value);

                                                                if (m1 == m2) {
                                                                    r = 0;
                                                                    r1 = "G";
                                                                } else if (m1 > m2) {
                                                                    r = m1 - m2;
                                                                    r1 = "R" + r;
                                                                } else if (m1 < m2) {
                                                                    r = m2 - m1;
                                                                    r1 = "B" + r;
                                                                } else {
                                                                    r = "G";
                                                                    r1 = "G";
                                                                }

                                                                document.getElementById("ElementoBL").value = r;
                                                                document.getElementById("ElementoBL").value = r1;
                                                                document.getElementById("BLM1").value = r;
                                                                console.log(r);
                                                                console.log(r1)
                                                                return;
                                                            }
                                                        </script>














                                                        <br>
                                                        <br>
                                                        <center style="width:100%">
                                                            <h3><span style="font-weight:bold">Subsección Altura
                                                                    Facial</span></h3>
                                                        </center>
                                                        <div class="col-md-6">
                                                            <label>P. Oclusal</label><textarea
                                                                name="Impresion[P. Oclusal]"
                                                                class=" form-control input-lg" placeholder="P. Oclusal"
                                                                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>G/Sn</label><textarea name="Impresion[G/Sn]"
                                                                class=" form-control input-lg" placeholder="G/Sn"
                                                                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Co/Go</label><textarea name="Impresion[Co/Go]"
                                                                class=" form-control input-lg" placeholder="Co/Go"
                                                                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Sn/Me</label><textarea name="Impresion[Sn/Me]"
                                                                class=" form-control input-lg" placeholder="Sn/Me"
                                                                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Fa-Stm ()</label><textarea
                                                                name="Impresion[Fa-Stm ()]"
                                                                class=" form-control input-lg" placeholder="Fa-Stm ()"
                                                                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Fa.Sup</label><textarea name="Impresion[Fa.Sup]"
                                                                class=" form-control input-lg" placeholder="Fa.Sup"
                                                                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Fa.Inf</label><textarea name="Impresion[Fa.Inf]"
                                                                class=" form-control input-lg" placeholder="Fa.Inf"
                                                                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                                                        </div>
                                                        <br>
                                                        <br>
                                                        <center style="width:100%">
                                                            <h3><span style="font-weight:bold">Subsección
                                                                    Simetría</span></h3>
                                                        </center>
                                                        <div class="col-md-6">
                                                            <label>Arcada Maxilar</label><textarea
                                                                name="DiagnosticoConsulta[Arcada Maxilar]"
                                                                class=" form-control input-lg"
                                                                placeholder="Arcada maxilar"
                                                                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>LM Superior</label><textarea
                                                                name="DiagnosticoConsulta[LM Superior]"
                                                                class=" form-control input-lg" placeholder="LM Superior"
                                                                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Arcada Mandibular</label><textarea
                                                                name="DiagnosticoConsulta[Arcada Mandibular]"
                                                                class=" form-control input-lg"
                                                                placeholder="Arcada mandibular"
                                                                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>LM Inferior</label><textarea
                                                                name="DiagnosticoConsulta[LM Inferior]"
                                                                class=" form-control input-lg" placeholder="LM Inferior"
                                                                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                                                        </div>
                                                        <br>
                                                        <br>
                                                        <center style="width:100%">
                                                            <h3><span style="font-weight:bold">Subsección
                                                                    Mandíbula</span></h3>
                                                        </center>
                                                        <!-- <h4><span style="font-weight:bold">&nbsp;&nbsp;&nbsp; Derecha &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Izquierda</span></h4> -->
                                                        <div class="col-md-6">
                                                            <label>Co-Go</label><input type="number"
                                                                name="PlanManejo[Co-Go1]" class="form-control">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Co-Go</label><input type="number"
                                                                name="PlanManejo[Co-Go2]" class="form-control">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Go-Me</label><input type="number"
                                                                name="PlanManejo[Go-Me1]" class="form-control">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Go-Me</label><input type="number"
                                                                name="PlanManejo[Go-Me2]" class="form-control">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Total</label><input type="number"
                                                                name="PlanManejo[Total Derecho]" class="form-control">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Total</label><input type="number"
                                                                name="PlanManejo[Total Izquierdo]" class="form-control">
                                                        </div>

                                                        <div class="col-md-12">
                                                            <center><label>(Total D - Total I)</label></center>
                                                            <input type="text" name="PlanManejo[Totales]"
                                                                class="form-control ladilla"
                                                                placeholder="Total1-Total2">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label>Desvió del Menton</label><input type="text"
                                                                name="PlanManejo[Desvió del Menton]"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Canteamiento PO</label><input type="text"
                                                                name="PlanManejo[Canteamiento PO]" class="form-control">
                                                            <br>
                                                            <br>
                                                        </div>

                                                        <center>
                                                            <h3><span style="font-weight:bold">Diagnóstico y Plan de
                                                                    Tratamiento</span></h3>
                                                        </center>
                                                        <div class="col-md-12">
                                                            <label>Diagnóstico Ortopédico-Ortodóncico</label><textarea
                                                                name="OrganoSentidos[Diagnóstico Ortopedico-Ortodoncico]"
                                                                class=" form-control input-lg"
                                                                placeholder="Diagnóstico Ortopédico-Ortodóncico"
                                                                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>Plan del Tratamiento</label><textarea
                                                                name="OrganoSentidos[Plan del Tratamiento]"
                                                                class=" form-control input-lg"
                                                                placeholder="Plan del Tratamiento"
                                                                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--cierre de lista-->


                                            <!-- lista -->
                                            <div class="panel box box-primary">
                                                <div class="box-header with-border">
                                                    <h4 class="box-title">
                                                        <a data-toggle="collapse" data-parent="#accordion1"
                                                            href="#collapseEleven">
                                                            4. Compromisos
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseEleven" class="panel-collapse collapse">

                                                    <div class="box-body">

                                                        <div class="col-md-12">
                                                            <textarea name="ExamenFisico[Compromisos]"
                                                                class="form-control input-lg" placeholder="Compromisos"
                                                                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--cierre de lista-->

                                            <!-- lista -->
                                            <div class="panel box box-primary">
                                                <div class="box-header with-border">
                                                    <h4 class="box-title">
                                                        <a data-toggle="collapse" data-parent="#accordion1"
                                                            href="#collapseTIEMPO">
                                                            Tiempo de Tratamiento
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTIEMPO" class="panel-collapse collapse">

                                                    <div class="box-body">

                                                        <div class="col-md-12">
                                                            <input type="text"
                                                                name="DiagnosticoAcupuntura[Tiempo de Tratamiento]"
                                                                class="form-control">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--cierre de lista-->


                                            <!-- lista -->
                                            <!-- <div class="panel box box-primary">
                                                <div class="box-header with-border">
                                                    <h4 class="box-title">
                                                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapseFourteen">
                                                            Impresion
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseFourteen" class="panel-collapse collapse">

                                                    <div class="box-body">

                                                        <div class="col-md-12">
                                                            <textarea name="Impresion[Impresion]" class="form-control input-lg" placeholder="" style="width: 100%; min-height: 60px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div> -->
                                            <!--cierre de lista-->




                                            <!-- lista -->
                                            <!-- <div class="panel box box-primary">
                                                <div class="box-header with-border">
                                                    <h4 class="box-title">
                                                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapseFiveteen">
                                                            Plan de manejo
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseFiveteen" class="panel-collapse collapse">

                                                    <div class="box-body">

                                                        <div class="col-md-12">
                                                            <textarea name="PlanManejo[Plan de Manejo]" class="form-control input-lg" placeholder="" style="width: 100%; min-height: 60px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div> -->
                                            <!--cierre de lista-->






                                            <!-- lista -->
                                            <!-- <div class="panel box box-primary">
                                                <div class="box-header with-border">
                                                    <h4 class="box-title">
                                                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapseSixteen">
                                                            Prescripciones
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseSixteen" class="panel-collapse collapse">

                                                    <br>-->
                                            <!-- esta es la barra del menu-->
                                            <!-- <div class="tab">
                                                        <button type="button" class="tablinks" onclick="MenuAntecedentes(event, 'Incapacidades')">Incapacidades</button>
                                                        <button type="button" class="tablinks" onclick="MenuAntecedentes(event, 'Medicamentos')">Medicamentos</button>
                                                        <button type="button" class="tablinks" onclick="MenuAntecedentes(event, 'Insumos')">Insumos</button>
                                                    </div> -->
                                            <!-- barra de menu final -->


                                            <!-- Submodulo Incapacidades -->
                                            <!-- <div id="Incapacidades" class="tabcontent">


                                                        <div class="col-md-4">
                                                            <br><br>
                                                            <button type="button" style="display: initial;" data-target="#modalForm4" data-toggle="modal" title="Agregar Incapacidades"><i class="fa fa-plus"> Agregar Incapacidades</i>
                                                            </button>
                                                        </div>
                                                        <div class="col-md-8">&nbsp;</div>

                                                        <input type="hidden" id="Arreglo_Incapacidades" name="Arreglo_Incapacidades" value='{"0":{"Area_Tratamiento":null}}'>

                                                        <div class="table-responsive col-md-12" style="overflow: auto;">
                                                            <br><br>
                                                            <table id="tabla_incapacidades" class="table table-bordered table-striped" style="width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width:20%">Area de Tratamiento</th>
                                                                        <th style="width:20%">Recurrencia</th>
                                                                        <th style="width:20%">Fecha Inicial Incapacidad</th>
                                                                        <th style="width:20%">Fecha Final Incapacidad</th>
                                                                        <th style="width:20%">Comentarios</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                                <tfoot>
                                                                </tfoot>
                                                            </table>

                                                            <script type="text/javascript">
                                                                function tabla_incapacidades() {

                                                                    var data = JSON.parse(document.getElementById("Arreglo_Incapacidades").value);
                                                                    var arreglo = [];
                                                                    var contador = "0";
                                                                    for (index in data) {
                                                                        var arreglotemporal = {};

                                                                        arreglotemporal["Area Tratamiento"] = data[index]["Area Tratamiento"];
                                                                        arreglotemporal["Recurrencia"] = data[index].Recurrencia;
                                                                        arreglotemporal["Fecha Inicial Incapacidad"] = data[index]["Fecha Inicial Incapacidad"];
                                                                        arreglotemporal["Fecha Final Incapacidad"] = data[index]["Fecha Final Incapacidad"];
                                                                        arreglotemporal["Comentarios"] = data[index].Comentarios;

                                                                        arreglo = arreglo.concat(arreglotemporal);
                                                                        contador++;
                                                                    }

                                                                    let pos = 1;

                                                                    let arreglo_final = arreglo.splice(pos, contador); // para que seleccione los arreglos despues del primer lugar ya que corresponde al input hidden


                                                                    $("#tabla_incapacidades").dataTable().fnDestroy();

                                                                    $('#tabla_incapacidades').DataTable({
                                                                        data: arreglo_final,
                                                                        columns: [{
                                                                                data: "Area Tratamiento"
                                                                            },
                                                                            {
                                                                                data: "Recurrencia"
                                                                            },
                                                                            {
                                                                                data: "Fecha Inicial Incapacidad"
                                                                            },
                                                                            {
                                                                                data: "Fecha Final Incapacidad"
                                                                            },
                                                                            {
                                                                                data: "Comentarios"
                                                                            },
                                                                        ]
                                                                    });


                                                                }
                                                            </script>

                                                        </div>

                                                    </div> -->
                                            <!-- Cierre Submodulo Incapacidades -->

                                            <!-- Submodulo Medicamentos -->

                                            <div id="Medicamentos" class="tabcontent">

                                                <div class="box-body">

                                                    <?php
                                                    $cliente_id = $clienteId;
                                                    $usuario_id = $_SESSION['ID'];
                                                    // include 'RM_Receta.php'
                                                    ?>

                                                    <?php
                                                    /*
                              <!--
                              <div class="col-md-12 content-card">
                                <div class="card-big-shadow">
                                    <div class="card card-just-text" data-background="color" data-color="azul">
                                        <div class="content">
                                            <h4 class="title"><a href="#"><h2> Agregar Receta</h2></a></h4>
                                            <div class="description">

                                              <form id="detalleRecetario" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
                                                      <div class="form-row">


                                                        <div class="form-group col-md-6">
                                                        <div align="left"> Agregar Medicamento </div>
                                                          <input type="hidden" class="form-control input-lg" id="usuario_id" name="usuario_id" placeholder="usuario_id" value="<?php echo  $usuario_id?>">
                                                          <select id="codigoProd" name="codigoProd" class="form-control select2" style="width: 100%;" >
                                                              <option value="" selected="selected">Seleccione Medicamento</option>
                                                              <?php
                                                              //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
                                                                echo selectMaster("","id","descripcion,concentracion","pos");
                                                              ?>

                                                          </select>
                                                        </div>

                                                          <div class="form-group col-md-3">
                                                            <div align="left"> Cantidad </div>
                                                            <input type="text" class="form-control input-lg" name="cantidad"  id="cantidad" placeholder="Cantidad">
                                                            <div id="div-results-cedula"></div>
                                                          </div>

                                                          <div class="form-group col-md-3">
                                                            <div align="left"> Presentacion</div>
                                                              <select class="form-control posologia select2" name="posologia" id="posologia" style="width: 100%;" >
                                                                <option value=" ">Seleccione...</option>
                                                                 <option value="Miligramos">Miligramos </option>
                                                                 <option value="Milimetros">Milimetros</option>
                                                                 <option value="Microgramos">Microgramos</option>
                                                                 <option value="Gramos">Gramos</option>
                                                                 <option value="Milimetros">CC</option>
                                                                 <option value="Unidad">Unidad</option>
                                                                 <option value="Sobre">Sobre</option>
                                                                 <option value="Frasco">Frasco</option>
                                                                 <option value="Onza">Onza</option>
                                                                 <option value="Tabletas">Tabletas</option>
                                                                 <option value="Ampollas">Ampollas</option>
                                                                 <option value="Capsulas">Cápsulas</option>
                                                                  <option value="Comprimidos">Comprimidos</option>
                                                                 <option value="Crema">Crema</option>
                                                                 <option value="Jarabe">Jarabe</option>
                                                                 <option value="Ovulos">Ovulos</option>
                                                                 <option value="Sobre">Sobre</option>
                                                                 <option value="Tubo">Tubo</option>
                                                                 <option value="Geles y jaleas- Espuma">Geles y jaleas- Espuma</option>
                                                                 <option value="Loción">Loción</option>
                                                                 <option value="Jabones y champú">Jabones y champú</option>
                                                                 <option value="Unguento">Unguento</option>
                                                                 <option value="Otras soluciones">Otras soluciones</option>
                                                                 <option value="Ampolla">Ampolla</option>
                                                                 <option value="Anillo">Anillo</option>
                                                                 <option value="Aplicador">Aplicador</option>
                                                                 <option value="Atomizador(spray)">Atomizador(spray)</option>
                                                                 <option value="Barra">Barra</option>
                                                                 <option value="Bolo">Bolo</option>
                                                                 <option value="Bolsa">Bolsa</option>
                                                                 <option value="Caja">Caja</option>
                                                                 <option value="Cartón">Cartón</option>
                                                                 <option value="Cartucho">Cartucho</option>
                                                                 <option value="Cilindro">Cilindro</option>
                                                                 <option value="Contenedor">Contenedor</option>
                                                                 <option value="Disco">Disco</option>
                                                                 <option value="Esponja">Esponja</option>
                                                                 <option value="Estuche">Estuche</option>
                                                                 <option value="Frasco">Frasco</option>
                                                                 <option value="Generador">Generador</option>
                                                                 <option value="Gotas">Gotas</option>
                                                                 <option value="Implante">Implante</option>
                                                                 <option value="Inhalador">Inhalador</option>
                                                                 <option value="Jarra">Jarra</option>
                                                                 <option value="Jeringa">Jeringa</option>
                                                                 <option value="Kit">Kit</option>
                                                                 <option value="Lata">Lata</option>
                                                                 <option value="Litro">Litro</option>
                                                                 <option value="Parche">Parche</option>
                                                                 <option value="Pluma">Pluma</option>
                                                                 <option value="Supositorio">Supositorio</option>
                                                                 <option value="Tampón">Tampón</option>
                                                                 <option value="Tanque">Tanque</option>
                                                                 <option value="Tira">Tira</option>
                                                                 <option value="Unidades">Unidades</option>
                                                                 <option value="Vial">Vial</option>
                                                               </select>
                                                          </div>

                                                        <div class="form-group col-md-3">
                                                            <div align="left">Duración Prescripción</div>
                                                            <input type="text" name="duracion" id="duracion" class="form-control" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <div align="left">Método de administración</div>
                                                            <input type="text" name="metodo" id="metodo" class="form-control"  pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <div align="left">Frecuencia de administración</div>
                                                            <input type="text" name="frecuencia" id="frecuencia" class="form-control" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <div align="left">Dosis</div>
                                                            <input type="text" name="dosis" id="dosis" class="form-control" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                          <div align="left">  Indicaciones </div>
                                                          <textarea  name="nota"  id="nota" placeholder="INDICACIONES ESPECIFICAS DEL MEDICAMENTO" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;" ></textarea>
                                                        </div>


                                                        <div class="form-group col-md-6">
                                                          <div align="left">  Indicaciones generales de la Recetas </div>
                                                          <textarea  name="nota2" id="nota2"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;" placeholder="INDICACIONES GENERALES DE LA RECETA , LLENAR AL FINAL." ></textarea>
                                                        </div>


                                                        <div class="form-group col-md-12">

                                                        <input type="hidden" name="id_usuario" id="id_usuario"  value="<?php echo $_SESSION['ID']?>">
                                                        <input type="hidden" name="idcliente" id="idcliente"  value="<?php echo $clienteId?>">
                                                        <input type="hidden" name="idReceta" id="idReceta" value="<?php echo $idR?>">

                                                        <input type="hidden" name="nomedicamento" value="<?php echo $descripcion?>">
                                                        <input type="hidden" name="ID" value="<?php echo $_SESSION['ID']?>">

                                                        <center><button type="button" onclick="agergarItem();" class="btn btn-block btn-primary btn-sm">Guardar</button></center>

                                                        </div>
                                                      </div>
                                              </form>
                                            </div><!-- cierre de la descripcion-->
                                        </div>
                                    </div> <!-- end card -->
                                </div>
                              </div>

                                    <script type="text/javascript">
                                     function Medicamento()
                                      {
                                          $("#codigoProd").select2({
                                           ajax: {
                                            url: "Ajax_Poslista.php",
                                            type: "post",
                                            dataType: 'json',
                                            delay: 250,
                                            data: function (params) {
                                             return {
                                               searchTerm: params.term // search term
                                             };
                                            },
                                            processResults: function (response) {
                                              return {
                                                 results: response
                                              };
                                            },
                                            cache: true
                                           }
                                          });

                                      }


                                    </script>

                                    <br>
                                    <div class="form-group col-md-12" id="div-results" style="overflow:auto"></div>
                                    <br>
                                    <br>

                                    */
                                                    //
                                                    ?>
                                                    <!--    </div>
                                                    // </div>
                                                    <!-- Cierre Submodulo Medicamentos -->



                                                    <!-- Submodulo Insumos -->
                                                    <!-- <div id="Insumos" class="tabcontent">

                                                        <div class="col-md-4">
                                                            <br><br>
                                                            <button type="button" style="display: initial;" data-target="#modalForm5" data-toggle="modal" title="Agregar Insumos"><i class="fa fa-plus"> Agregar Insumos</i>
                                                            </button>
                                                        </div>
                                                        <div class="col-md-8">&nbsp;</div>

                                                        <input type="hidden" id="Arreglo_Insumos" name="Arreglo_Insumos" value='{"0":{"Tipo_Insumo":null}}'>

                                                        <div class="table-responsive col-md-12" style="overflow: auto;">
                                                            <br><br>
                                                            <table id="tabla_insumos" class="table table-bordered table-striped" style="width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width:20%">Tipo Insumo</th>
                                                                        <th style="width:20%">Cantidad Solicitada</th>
                                                                        <th style="width:20%">Recomendaciones</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                                <tfoot>
                                                                </tfoot>
                                                            </table>

                                                            <script type="text/javascript">
                                                                function tabla_insumos() {

                                                                    var data = JSON.parse(document.getElementById("Arreglo_Insumos").value);
                                                                    var arreglo = [];
                                                                    var contador = "0";
                                                                    for (index in data) {
                                                                        var arreglotemporal = {};

                                                                        arreglotemporal["Tipo Insumo"] = data[index]["Tipo Insumo"];
                                                                        arreglotemporal["Cantidad Solicitada"] = data[index]["Cantidad Solicitada"];
                                                                        arreglotemporal["Comentarios"] = data[index].Comentarios;

                                                                        arreglo = arreglo.concat(arreglotemporal);
                                                                        contador++;
                                                                    }

                                                                    let pos = 1;

                                                                    let arreglo_final = arreglo.splice(pos, contador); // para que seleccione los arreglos despues del primer lugar ya que corresponde al input hidden

                                                                    $("#tabla_insumos").dataTable().fnDestroy();

                                                                    $('#tabla_insumos').DataTable({
                                                                        data: arreglo_final,
                                                                        columns: [{
                                                                                data: "Tipo Insumo"
                                                                            },
                                                                            {
                                                                                data: "Cantidad Solicitada"
                                                                            },
                                                                            {
                                                                                data: "Comentarios"
                                                                            },
                                                                        ]
                                                                    });

                                                                }
                                                            </script>

                                                        </div>

                                                    </div> -->
                                                    <!-- Cierre Submodulo Insumos -->

                                                </div>
                                            </div>
                                            <!--cierre de lista-->

                                            <input type="hidden" name="receta" value="<?php echo $idR ?>">
                                            <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                                            <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                                            <input type="hidden" name="sucursal"
                                                value="<?php echo $_SESSION["sucursal"] ?>">
                                            <input type="hidden" name="Campo_Procedimientos_Realizados" value="">
                                            <div class="form-group col-md-12">
                                                <label>Ya terminé <input type="checkbox" value="" required=""></label>
                                                <center><button type="submit" class="btn btn-block btn-primary btn-sm"
                                                        onclick="verificarformulario()">
                                                        <h2> <strong> G u a r d a r </strong> </h2>
                                                    </button></center>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                                <!--cierre vbox body-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!--
<?php $javascriptocultar = "1"; ?>

<script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous"></script>
<script type="text/javascript">
function verificarformulario()
{
  var elem = document.querySelectorAll("select, input, textarea");
  console.log($( "#KG_peso" ));
  elem.forEach(function(userItem) {
    //console.log($( "#KG_peso" ));
    $( "#KG_peso" ).css( "border-color", "red" )

    if(userItem.required || userItem.invalid){
      if(userItem.value=="")
        {
          alert('Falta por llenar el campo : '+userItem.getAttribute('data-name'));
       }
    }

  });
}
</script>
-->


























<!-- modal antecedentes-->

<div class="modal fade" id="modalForm1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Editar Antecedentes</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>

                <div class="form-group">
                    <label for="arreglo_editar">Antecedentes Separados por Comas</label>
                    <h5 style="color:red">*Si Actualiza los antecedentes, la pagina se recargara y perdera los datos
                        ingresados*</h5>
                    <input type="text" class="form-control" id="arreglo_editar" name="arreglo_editar"
                        onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" />
                    <input type="hidden" name="id_configantecedente" id="id_configantecedente">
                </div>

                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <a href="#" onclick="ActualizarAntecedentes();" class="btn btn-default"> <i
                        class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>
                <a href="#" onclick="EliminarAntecedentes();" class="btn btn-danger" style="float: right;"> <i
                        class="fa fa-trash"></i> <strong> Eliminar </strong></a>


            </div>
        </div>
    </div>
</div>

<!-- modal agregar mas antecedentes principales -->

<div class="modal fade" id="modalForm_add_personales" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Editar Antecedentes</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>

                <div class="form-group">
                    <label>Nombre del Antecedente Principal</label>
                    <input type="text" class="form-control" id="modal_antecendente_principal"
                        onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" />

                    <label for="arreglo_editar">Antecedentes Separados por Comas</label>
                    <h5 style="color:red">*Si Actualiza los antecedentes, la pagina se recargara y perdera los datos
                        ingresados*</h5>
                    <input type="text" class="form-control" id="modal_antecendente_arreglo"
                        onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" />
                </div>

                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <a href="#" onclick="CrearAntecedentes();" class="btn btn-default"> <i
                        class="fa fa-glyphicon glyphicon-plus"></i> <strong> Crear </strong></a>


            </div>
        </div>
    </div>
</div>

<!-- modal revision-->

<div class="modal fade" id="modalForm2" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Editar Revision por Sistemas</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>

                <div class="form-group">
                    <label for="arreglo_editar">Revision Separados por Comas</label>
                    <h5 style="color:red">*Si Actualiza la revision, la pagina se recargara y perdera los datos
                        ingresados*</h5>
                    <input type="text" class="form-control" id="arreglo_editar1" name="arreglo_editar1"
                        onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" />
                    <input type="hidden" name="id_configantecedente1" id="id_configantecedente1">
                </div>

                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <a href="#" onclick="ActualizarRevision();" class="btn btn-default"> <i
                        class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>
                <a href="#" onclick="EliminarRevision();" class="btn btn-danger" style="float: right;"> <i
                        class="fa fa-trash"></i> <strong> Eliminar </strong></a>


            </div>
        </div>
    </div>
</div>


<!-- modal agregar mas revisiones principales -->

<div class="modal fade" id="modalForm_add_revision_sistemas" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Editar Revision por Sistemas</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>

                <div class="form-group">
                    <label>Nombre Revision Principal</label>
                    <input type="text" class="form-control" id="modal_revision_principal"
                        onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" />

                    <label for="arreglo_editar">Revision Separados por Comas</label>
                    <h5 style="color:red">*Si Actualiza los antecedentes, la pagina se recargara y perdera los datos
                        ingresados*</h5>
                    <input type="text" class="form-control" id="modal_revision_arreglo"
                        onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" />
                </div>

                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <a href="#" onclick="CrearRevisiones();" class="btn btn-default"> <i
                        class="fa fa-glyphicon glyphicon-plus"></i> <strong> Crear </strong></a>


            </div>
        </div>
    </div>
</div>

<!-- modal paraclinico-->

<div class="modal fade" id="modalForm3" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Editar Paraclinicos</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>

                <div class="form-group" id="form_div">

                    <div class="col-md-6">
                        <label>Fecha</label>
                        <input type="date" name="Paraclinicos[Fecha]" class="form-control input-lg Paraclinicos_modal"
                            data-title="Fecha">
                    </div>
                    <div class="col-md-6">
                        <label>Tipo de Paraclinico</label>
                        <input type="text" name="Paraclinicos[Tipo de Paraclinico]"
                            class="form-control input-lg Paraclinicos_modal" data-title="Tipo">
                    </div>

                    <div class="col-md-6">
                        <label>Valor del Paraclinico</label>
                        <input type="number" name="Paraclinicos[Valor]" class="form-control input-lg Paraclinicos_modal"
                            data-title="Valor">
                    </div>
                    <div class="col-md-6">
                        <label>Unidades</label>
                        <select name="Paraclinicos[Unidades]" class="form-control input-lg Paraclinicos_modal"
                            data-title="Unidades">
                            <option> </option>
                            <option>Minuto</option>
                            <option>Horas</option>
                            <option>Dias</option>
                            <option>mm3</option>
                            <option>g</option>
                            <option>kg</option>
                            <option>mg</option>
                            <option>ml</option>
                            <option>mm</option>
                            <option>mmHg</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label>Clasificacion</label>
                        <select name="Paraclinicos[Clasificacion]" class="form-control input-lg Paraclinicos_modal"
                            data-title="Clasificacion">
                            <option> </option>
                            <option>Positivo</option>
                            <option>Negativo</option>
                            <option>No Concluyente</option>
                            <option>Reactivo</option>
                            <option>No Reactivo</option>
                            <option>Normal</option>
                            <option>Anormal</option>
                            <option>Benigno</option>
                            <option>Maligno</option>
                            <option>Otro</option>
                            <option>No Aplica</option>
                            <option>Desconocido</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label>Comentarios</label>
                        <textarea name="Paraclinicos[Comentarios]" class="Paraclinicos_modal"
                            style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;"
                            placeholder="Observaciones de gestaciones anteriores" data-title="Comentarios"></textarea>
                        <br><br>
                    </div>

                </div>

                <center>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button id="user-data-next-button" class="btn my-button"
                        onclick="$.when(GuardarParaclinico()).then(tabla_paraclinicos());" disabled>Guardar</button>
                </center>

            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    //Siempre que salgamos de un campo de texto, se chequeará esta función
                    $("#form_div input").change(function () {
                        var form = $(this).parents("#form_div");
                        var check = checkCampos(form);
                        //console.log(check);
                        if (check) {
                            $("#user-data-next-button").prop("disabled", false);
                        } else {
                            $("#user-data-next-button").prop("disabled", true);
                        }
                    });
                });

                //Función para comprobar los campos de texto
                function checkCampos(obj) {
                    var camposRellenados = true;
                    obj.find("input").each(function () {
                        var $this = $(this);
                        //alert($this.val());
                        if ($this.val().length <= 0) {
                            camposRellenados = false;
                            return false;
                        }
                    });
                    if (camposRellenados == false) {
                        return false;
                    } else {
                        return true;
                    }
                }
            </script>
        </div>
    </div>
</div>




<!-- modal incapacidad-->

<div class="modal fade" id="modalForm4" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Crear Incapacidad</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>

                <div class="form-group">
                    <label>Area de Tratamiento</label>
                    <input type="text" class="form-control incapacidad_modal"
                        onkeypress="return (event.charCode != 34 && event.charCode != 39)" value=""
                        data-title="Area Tratamiento" />
                    <label>Recurrencia</label>
                    <select class="form-control input-lg incapacidad_modal" data-title="Recurrencia">
                        <option> </option>
                        <option>Unica</option>
                        <option>Recurrente</option>
                    </select>
                    <label>Fecha Inicial Incapacidad</label>
                    <input type="date" class="form-control input-lg incapacidad_modal"
                        data-title="Fecha Inicial Incapacidad">
                    <label>Fecha Final Incapacidad</label>
                    <input type="date" class="form-control input-lg incapacidad_modal"
                        data-title="Fecha Final Incapacidad">
                    <label>Comentarios</label>
                    <textarea class="incapacidad_modal"
                        style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;"
                        placeholder="Observaciones de gestaciones anteriores" data-title="Comentarios"></textarea>
                    <br><br>

                    <input type="hidden" name="id_configincapacidad" id="id_configincapacidad">
                </div>

                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <a href="#" onclick="$.when(GuardarIncapacidad()).then(tabla_incapacidades());" class="btn btn-default">
                    <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>


            </div>
        </div>
    </div>
</div>



<!-- modal insumos-->

<div class="modal fade" id="modalForm5" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Crear Insumos</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>

                <div class="form-group">
                    <label>Tipo de Insumo</label>
                    <input type="text" class="form-control insumo_modal"
                        onkeypress="return (event.charCode != 34 && event.charCode != 39)" value=""
                        data-title="Tipo Insumo" />
                    <label>Cantidad Solicitada</label>
                    <input type="number" class="form-control insumo_modal" value="" data-title="Cantidad Solicitada" />
                    <label>Comentarios</label>
                    <textarea class="insumo_modal"
                        style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;"
                        placeholder="Observaciones de gestaciones anteriores" data-title="Comentarios"></textarea>
                    <br><br>

                    <input type="hidden" name="id_configincapacidad" id="id_configincapacidad">id_configexamenfisico
                </div>

                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <a href="#" onclick="$.when(GuardarInsumos()).then(tabla_insumos());" class="btn btn-default"> <i
                        class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>


            </div>
        </div>
    </div>
</div>

<!-- modal editar examen fisico -->

<div class="modal fade" id="modalForm_examen_fisico" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Editar Examen Fisico</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>

                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" id="nombre_editar_examenfisico"
                        onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" />

                    <label for="arreglo_editar">Plantilla</label>
                    <h5 style="color:red">*Si Actualiza, la pagina se recargara y perdera los datos ingresados*</h5>
                    <textarea class="form-control" id="plantilla_editar_examenfisico"
                        onkeypress="return (event.charCode != 34 && event.charCode != 39)" value=""></textarea>
                    <input type="hidden" name="id_configexamenfisico" id="id_configexamenfisico">
                </div>

                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <a href="#" onclick="ActualizarExamenFisico();" class="btn btn-default"> <i
                        class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>
                <a href="#" onclick="EliminarExamenFisico();" class="btn btn-danger" style="float: right;"> <i
                        class="fa fa-trash"></i> <strong> Eliminar </strong></a>


            </div>
        </div>
    </div>
</div>

<!-- modal agregar mas examenes fisicos -->

<div class="modal fade" id="modalForm_agregar_examen_fisico" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Editar Revision por Sistemas</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>

                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" id="nombre_agregar_examenfisico"
                        onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" />

                    <label for="arreglo_editar">Plantilla</label>
                    <h5 style="color:red">*Si Actualiza, la pagina se recargara y perdera los datos ingresados*</h5>
                    <textarea class="form-control" id="plantilla_agregar_examenfisico"
                        onkeypress="return (event.charCode != 34 && event.charCode != 39)" value=""></textarea>
                </div>

                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <a href="#" onclick="CrearExamenFisico();" class="btn btn-default"> <i
                        class="fa fa-glyphicon glyphicon-plus"></i> <strong> Crear </strong></a>


            </div>
        </div>
    </div>
</div>


<?php
include ("footer.php");
include ("ajaxCreadorSelect.php");
function Encriptar($valor)
{
    $Sc = base64_decode("keyMaster");
    $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
    return $Texto;
}
// El primer campo, es el selector; ya sea id, clase o campo todo depdnde de como sea implementado Ejem: #campo .campo input etc
// selectFrom: con este objeto podran manipular los campos pasados en el SELECT * FROM, muy util cuando usan JOIN EJEMP:
// selectFrom: Encriptar("lb_c.id AS id, lb_c.Nombre AS Nombre") = SELECT lb_c.id AS id, lb_c.Nombre AS Nombre FROM
// name: nombre de la tabla al cual se hara la consulta SQL
// value: valor que contendra el option del select Ejem: <option value"dato"></option>. Podra contener mas de un campo, solo seprara de esta forma id || descripcion
// value se separara con | en el value del option
// text: texto que aparecera dentro de la etiqueta option Ejem: <option>dato</option. Podra contener mas de un campo, solo seprara de esta forma id || descripcion
// text se separara con • en el texto del option
// likeWhere: condicion a cumplir para el buscador, seran representado como Ejem: descripcion like "%dato%", no esta lkimitado a un solo campo, solo seprara de esta forma codigo || descripcion
// order: este sera el campo que te ayudara a filtrar y se representa en arrays Ejemplo ['group by' => 'empresa', 'order by' => 'cliente_id']
// clausula: este objeto contendra dos objetos,
// data: se encargara de añadir condiciones a la consulta ejemplo: Encriptar("cliente_id = 1 AND cliente_id = 2") equivalente a AND cleinte_id = 1
// value: contendra valores en array, reemplazables en data: Ejempl: [1, 2, 3]
// ATENCION: data trabaja con una especie de remplazo de valores, ejempl: cliente_id = $0 ,  $0 es el quivalente a la posisicon 0 del array value
// carapter: si tenemos problemas al cargar una data porque los caracteres devueltos rompen el javascript mantenerlo en true de otra forma pueden tenerlo como false
// campoCreador: esta campo sera añadido siempre y cuando tengamos el creador de tags activo ya que se encargara de indicar con cual campo debe verificar si existe o no el mismo para saber si debe crearse, dejar vacio al no usarse
// El ultimo campo nos permitira activar o desactivar el creador de Tags, por defecto esta desactivado ya que no queremos crear/añadir nuevos datos a la tabla desde el select
?>

<script>
    // no quitar para evitar problemas de que guarde con este caracter " ' "
    $(document).on('input', 'input[type="text"], textarea', function () {
        $(this).val($(this).val().replace(/[']/g, ''));
    });
</script>

<script type="text/javascript">
    CargarDatosAntecedentes();


    function MenuAntecedentes(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";

    }

    ////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////
    /////////////// antecedentes (dinamicos) ///////////////////
    ////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////

    function MenuAntecedentes_Personales(evt, tabla) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent1");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks1");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabla).style.display = "block";
        evt.currentTarget.className += " active";


    }

    function CargarDatosAntecedentes() {

        var Arreglo = '<?php echo $arreglo_antecedentes ?>';

        var text = '';
        for (index in Arreglo) {
            var titulo = index.replaceAll(" ", "_");
            text += '<div id="div_' + titulo + '" class="tabcontent1 row"><br>';

            for (i = 0; i <= Arreglo[index].length; i++) {
                if (Arreglo[index][i] !== undefined) {
                    text += '<div class="col-md-4"><label style="padding-bottom: 10px;margin-bottom: 0px;"><input type="checkbox" class="option-input checkbox" name="Checks_Antecedentes[' + index + '][]" value="' + Arreglo[index][i] + '" /> ' + Arreglo[index][i] + ' </label></div>';
                }
            }
            text += '<div class="col-md-12"><br><br><label>Otros</label><textarea name="Checks_Antecedentes[' + index + '][Otros]"  class="form-control input-lg" placeholder="Otros" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea></div></div>';

        }
        document.getElementById("TabDinamica").innerHTML = text;
    }



    function EditarAntecedentes(id) {
        var editar = <?php echo json_encode($arreglo_editar) ?>;
        var id_arreglo = id;
        var rango = "";
        editar[id_arreglo].forEach(element => rango += element + ',');
        document.getElementById("arreglo_editar").value = rango;
        document.getElementById("id_configantecedente").value = id;
    };

    function ActualizarAntecedentes() {
        // estas son las variables que enviamos
        var arreglo = $("#arreglo_editar").val();
        var id = $("#id_configantecedente").val();

        // aqui enviamos el mensaje por medio de un arreglo
        $.ajax({
            type: "POST",
            url: "Ajax_ActualizarAntecedentes.php",
            data: {
                arreglo: arreglo,
                id: id,
                Antecedente_Tipo: "Editar"
            },
            success: function (response) {
                location.reload(true);
                // aqui enviamos el mensaje por medio de un arreglo
            }
        });
    };

    function CrearAntecedentes() {
        var Antecendente_Principal = document.getElementById('modal_antecendente_principal').value;
        var Antecendente_Arreglo = document.getElementById('modal_antecendente_arreglo').value;
        $.ajax({
            type: "POST",
            url: "Ajax_ActualizarAntecedentes.php",
            data: {
                Antecendente_Principal: Antecendente_Principal,
                Antecendente_Arreglo: Antecendente_Arreglo,
                Antecedente_Tipo: "Crear"
            },
            success: function (response) {
                location.reload(true);
                // aqui enviamos el mensaje por medio de un arreglo
            }
        });
    };

    function EliminarAntecedentes() {
        var id = $("#id_configantecedente").val();
        $.ajax({
            type: "POST",
            url: "Ajax_ActualizarAntecedentes.php",
            data: {
                id: id,
                Antecedente_Tipo: "Eliminar"
            },
            success: function (response) {
                location.reload(true);
                // aqui enviamos el mensaje por medio de un arreglo
            }
        });
    }

    ////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////
    /////////////// revision sistema (dinamico)//////////////////
    ////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////

    CargarDatosRevision();

    function MenuRevision(evt, table) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent2");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks2");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(table).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function CargarDatosRevision() {

        var Arreglo = '<?php echo $arreglo_revision ?>';

        var text = '';
        for (index in Arreglo) {
            var titulo = index.replaceAll(" ", "_");
            text += '<div id="div_' + titulo + '" class="tabcontent2 row"><br>';

            for (i = 0; i <= Arreglo[index].length; i++) {
                if (Arreglo[index][i] !== undefined) {
                    text += '<div class="col-md-4"><label style="padding-bottom: 10px;margin-bottom: 0px;"><input type="checkbox" class="option-input checkbox" name="Checks_Revision[' + titulo + '][]" value="' + Arreglo[index][i] + '" /> ' + Arreglo[index][i] + ' </label></div>';
                }
            }
            text += '<br><div class="col-md-12"><br><br><label>Otros</label><textarea name="Checks_Revision[' + titulo + '][Otros]"  class="form-control input-lg" placeholder="Otros" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea></div></div>';
        }
        document.getElementById("TabDinamica_revision").innerHTML = text;
    }

    function EditarRevision(id) {
        var editar = <?php echo json_encode($arreglo_editar_revision) ?>;
        var id_arreglo = id;
        var rango = "";
        editar[id_arreglo].forEach(element => rango += element + ',');
        document.getElementById("arreglo_editar1").value = rango;
        document.getElementById("id_configantecedente1").value = id;
    };

    function ActualizarRevision() {
        // estas son las variables que enviamos
        var arreglo = $("#arreglo_editar1").val();
        var id = $("#id_configantecedente1").val();

        // aqui enviamos el mensaje por medio de un arreglo
        $.ajax({
            type: "POST",
            url: "Ajax_ActualizarRevision.php",
            data: {
                arreglo: arreglo,
                id: id,
                Revision_Tipo: "Editar"
            },
            success: function (response) {
                location.reload(true);
                // aqui enviamos el mensaje por medio de un arreglo
            }
        });
    };

    function CrearRevisiones() {
        var Revision_Principal = document.getElementById('modal_revision_principal').value;
        var Revision_Arreglo = document.getElementById('modal_revision_arreglo').value;
        $.ajax({
            type: "POST",
            url: "Ajax_ActualizarRevision.php",
            data: {
                Revision_Principal: Revision_Principal,
                Revision_Arreglo: Revision_Arreglo,
                Revision_Tipo: "Crear"
            },
            success: function (response) {
                location.reload(true);
                // aqui enviamos el mensaje por medio de un arreglo
            }
        });
    }

    function EliminarRevision() {
        var id = $("#id_configantecedente1").val();
        $.ajax({
            type: "POST",
            url: "Ajax_ActualizarRevision.php",
            data: {
                id: id,
                Revision_Tipo: "Eliminar"
            },
            success: function (response) {
                location.reload(true);
                // aqui enviamos el mensaje por medio de un arreglo
            }
        });
    }

    ////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////
    // llenar paraclinicos//
    ////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////

    function GuardarParaclinico() {

        var multi = $('.Paraclinicos_modal');
        var contador = "0";
        var arreglo = {};
        var puntos = JSON.parse(document.getElementById("Arreglo_Paraclinicos").value);
        for (index in puntos) {
            arreglo[contador] = {};
            arreglo[contador]["Fecha"] = puntos[index].Fecha;
            arreglo[contador]["Tipo"] = puntos[index].Tipo;
            arreglo[contador]["Valor"] = puntos[index].Valor;
            arreglo[contador]["Unidades"] = puntos[index].Unidades;
            arreglo[contador]["Clasificacion"] = puntos[index].Clasificacion;
            arreglo[contador]["Comentarios"] = puntos[index].Comentarios;
            contador++;
        }

        arreglo[contador] = {};
        $.each(multi, function (index, item) {

            arreglo[contador][$(item).data('title')] = $(item).val();
        });

        document.getElementById("Arreglo_Paraclinicos").value = JSON.stringify(arreglo);


        $('#modalForm3').modal('hide');

        return "Correcto";
    }

    ////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////
    // llenar incapacidades//
    ////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////

    function GuardarIncapacidad() {

        var multi = $('.incapacidad_modal');
        var contador = "0";
        var arreglo = {};
        var puntos = JSON.parse(document.getElementById("Arreglo_Incapacidades").value);
        for (index in puntos) {
            arreglo[contador] = {};
            arreglo[contador]["Area Tratamiento"] = puntos[index]["Area Tratamiento"];
            arreglo[contador]["Recurrencia"] = puntos[index].Recurrencia;
            arreglo[contador]["Fecha Inicial Incapacidad"] = puntos[index]["Fecha Inicial Incapacidad"];
            arreglo[contador]["Fecha Final Incapacidad"] = puntos[index]["Fecha Final Incapacidad"];
            arreglo[contador]["Comentarios"] = puntos[index].Comentarios;
            contador++;
        }

        arreglo[contador] = {};
        $.each(multi, function (index, item) {

            arreglo[contador][$(item).data('title')] = $(item).val();
        });

        document.getElementById("Arreglo_Incapacidades").value = JSON.stringify(arreglo);


        $('#modalForm4').modal('hide');
    }



    ////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////
    // llenar insumos//
    ////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////

    function GuardarInsumos() {

        var multi = $('.insumo_modal');
        var contador = "0";
        var arreglo = {};
        var puntos = JSON.parse(document.getElementById("Arreglo_Insumos").value);
        for (index in puntos) {
            arreglo[contador] = {};
            arreglo[contador]["Tipo Insumo"] = puntos[index]["Tipo Insumo"];
            arreglo[contador]["Cantidad Solicitada"] = puntos[index]["Cantidad Solicitada"];
            arreglo[contador]["Comentarios"] = puntos[index].Comentarios;

            contador++;
        }

        arreglo[contador] = {};
        $.each(multi, function (index, item) {

            arreglo[contador][$(item).data('title')] = $(item).val();
        });

        document.getElementById("Arreglo_Insumos").value = JSON.stringify(arreglo);


        $('#modalForm5').modal('hide');
    }

    ////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////
    // editar examen fisico//
    ////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////


    function EditarExamenFisico(id) {
        let editar = <?php echo json_encode($arreglo_examenfisico) ?>;

        document.getElementById("nombre_editar_examenfisico").value = editar[id]['Nombre'];
        document.getElementById("plantilla_editar_examenfisico").innerHTML = editar[id]["Plantilla"];
        document.getElementById("id_configexamenfisico").value = id;
    };

    function ActualizarExamenFisico() {
        // estas son las variables que enviamos
        var nombre = $("#nombre_editar_examenfisico").val();
        var plantilla = $("#plantilla_editar_examenfisico").val();
        var id = $("#id_configexamenfisico").val();

        // aqui enviamos el mensaje por medio de un arreglo
        $.ajax({
            type: "POST",
            url: "Ajax_ActualizarExamenFisico.php",
            data: {
                nombre: nombre,
                plantilla: plantilla,
                id: id,
                Revision_Tipo: "Editar"
            },
            success: function (response) {
                location.reload(true);
                // aqui enviamos el mensaje por medio de un arreglo
            }
        });
    };

    function CrearExamenFisico() {
        var nombre = document.getElementById('nombre_agregar_examenfisico').value;
        var plantilla = document.getElementById('plantilla_agregar_examenfisico').value;
        $.ajax({
            type: "POST",
            url: "Ajax_ActualizarExamenFisico.php",
            data: {
                nombre: nombre,
                plantilla: plantilla,
                Revision_Tipo: "Crear"
            },
            success: function (response) {
                location.reload(true);
                // aqui enviamos el mensaje por medio de un arreglo
            }
        });
    }

    function EliminarExamenFisico() {
        var id = $("#id_configexamenfisico").val();
        $.ajax({
            type: "POST",
            url: "Ajax_ActualizarExamenFisico.php",
            data: {
                id: id,
                Revision_Tipo: "Eliminar"
            },
            success: function (response) {
                location.reload(true);
                // aqui enviamos el mensaje por medio de un arreglo
            }
        });
    }
</script>


<script type="text/javascript">
    // mover una lista de izquierda a derecha en un nav por medio de botones //
    $('#next_nav').click(function () {
        $("#tab").animate({
            scrollLeft: '+=156px'
        });
    });
    $('#prev_nav').click(function () {
        $("#tab").animate({
            scrollLeft: '-=156px'
        });
    });

    $(document).ready(function () {
        BuscarCie10('acupuntura');
        //el menu de antecedentes despliegue el primero
        MenuAntecedentes_Personales(event, "<?php echo $inicial; ?>");
        var x = document.getElementById('principal_antecedentes');
        x.classList.add("active");
    });
</script>

















<script type="text/javascript">
    //antiguo
    function verPos() {
        var clientepos = $("#clientepos").val();
        var codigoProd = $("#codigoProd").val();
        $.ajax({
            type: "POST",
            url: "Poslista.php",
            data: {
                clientepos: clientepos,
                codigoProd: codigoProd
            },
            success: function (response) {
                $('#div-resultsM').html(response);
            }
        });
    };

    function listaItem() {
        // estas son las variables que enviamos
        var usuario_id = $("#usuario_id").val();
        // aqui enviamos el mensaje por medio de un arreglo
        $.ajax({
            type: "POST",
            url: "listaItem.php",
            data: {
                usuario_id: usuario_id
            },
            success: function (response) {
                $('#div-results1').html(response);
                // aqui enviamos el mensaje por medio de un arreglo

            }
        });
    };
    window.onload = listaItem;
    /*
        function agergarItem(){
            // estas son las variables que enviamos
            var codigoProd = $("#codigoProd").val();

     var dosis = $("#dosis").val();
     var posologia = $("#posologia").val();
     var frecuencia = $("#frecuencia").val();
     var administracion= $("#administracion").val();
     var duracion= $("#duracion").val();
     var metodo= $("#metodo").val();
     var dosisdia= $("#dosisdia").val();
     var dias= $("#dias").val();
     var via= $("#via").val();
            var total = $("#total").val();
            var nota = $("#nota").val();
            var usuario_id = $("#id_usuario").val();
            var idcliente = $("#idcliente").val();
            var idReceta = $("#idReceta").val();
            var codigoProd1 = $("#codigoProd1").val();
            var nota2 = $("#nota2").val();
            var cantidad = $("#cantidad").val();
            // aqui enviamos el mensaje por medio de un arreglo
            $.ajax({
                type: "POST",
                url: "ajax_agregarItemrecetario.php",
                data: {codigoProd:codigoProd, dosis:dosis, posologia:posologia, frecuencia:frecuencia,duracion:duracion,metodo:metodo, administracion:administracion, dosisdia:dosisdia, dias:dias, via:via, total:total, nota:nota, usuario_id:usuario_id, idcliente:idcliente,idReceta:idReceta,codigoProd1:codigoProd1,nota2:nota2,cantidad:cantidad},
                success: function(response) {

                    $('#dosis').val('');
                    $('#posologia').val('');
                    $('#frecuencia').val('');
                    $('#administracion').val('');
                    $('#duracion').val('');
                    $('#metodo').val('');
                    $('#dosisdia').val('');
                    $('#dias').val('');
                    $('#via').val('');
                    $('#total').val('');
                    $('#nota').val('');
                    $('#cantidad').val('');

                   $('#codigoProd').val('');
                   $('#codigoProd1').val('');
                    $('#nota').val('');

                    $('#div-results').html(response);

            // aqui enviamos el mensaje por medio de un arreglo
                }
            });

        };
    */
    function agergarItem() {
        // estas son las variables que enviamos
        var codigoProd = $("#codigoProd").val();

        var dosis = $("#dosis").val();
        var posologia = $("#posologia").val();
        var frecuencia = $("#frecuencia").val();
        var administracion = $("#administracion").val();
        var duracion = $("#duracion").val();
        var metodo = $("#metodo").val();
        var dosisdia = $("#dosisdia").val();
        var dias = $("#dias").val();
        var via = $("#via").val();
        var total = $("#total").val();
        var nota = $("#nota").val();
        var usuario_id = $("#id_usuario").val();
        var idcliente = $("#idcliente").val();
        var idReceta = $("#idReceta").val();
        var codigoProd1 = $("#codigoProd1").val();
        var nota2 = $("nota2").val();
        var cantidad = $("#cantidad").val();

        // aqui enviamos el mensaje por medio de un arreglo
        $.ajax({
            type: "POST",
            url: "ajax_agregarItemrecetario.php",
            data: {
                codigoProd: codigoProd,
                dosis: dosis,
                posologia: posologia,
                frecuencia: frecuencia,
                duracion: duracion,
                metodo: metodo,
                administracion: administracion,
                dosisdia: dosisdia,
                dias: dias,
                via: via,
                total: total,
                nota: nota,
                usuario_id: usuario_id,
                idcliente: idcliente,
                idReceta: idReceta,
                codigoProd1: codigoProd1,
                nota2: nota2,
                cantidad: cantidad
            },
            success: function (response) {
                $('#div-results').html(response);
                // aqui enviamos el mensaje por medio de un arreglo

            }
        });

        $('#dosis').val('');
        //$('#posologia').val('');
        $('#frecuencia').val('');
        $('#administracion').val('');
        $('#duracion').val('');
        $('#metodo').val('');
        $('#dosisdia').val('');
        $('#dias').val('');
        $('#via').val('');
        $('#total').val('');
        $('#nota').val('');
        $('#cantidad').val('');

        $('#codigoProd').val(null).trigger('change');
        $('#posologia').val(null).trigger('change');
        //$('#codigoProd').val('');
        $('#codigoProd1').val('');
        $('#nota2').val('');

    };

    function eliminarItem(valor) {
        // estas son las variables que enviamos
        var idOper = $("#idOper" + valor).val();
        var usuario_id = $("#id_usuario").val();
        var idcliente = $("#idcliente").val();
        var idReceta = $("#idReceta").val();
        // aqui enviamos el mensaje por medio de un arreglo
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {
                idOper: idOper,
                usuario_id: usuario_id,
                idcliente: idcliente,
                idReceta: idReceta
            },
            success: function (response) {
                $('#div-results').html(response);
                // aqui enviamos el mensaje por medio de un arreglo
            }
        });
    };

    function listaItem() {
        // estas son las variables que enviamos
        var usuario_id = $("#usuario_id").val();
        // aqui enviamos el mensaje por medio de un arreglo
        $.ajax({
            type: "POST",
            url: "listaItem.php",
            data: {
                usuario_id: usuario_id
            },
            success: function (response) {
                $('#div-results').html(response);
                // aqui enviamos el mensaje por medio de un arreglo

            }
        });
    };

    // window.addEventListener('load', () => {
    //   verIngresos({
    //     cliente_id: <?= $clienteId ?>,
    //     usuario_id: <?= $_SESSION['ID'] ?>
    //   });
    // });

    // function funcionDinamica() {
    //   Select2Dinamico(
    //     "#tipoIngreso", {
    //       selectFrom: "<?= Encriptar("*") ?>",
    //       name: "<?= Encriptar("estadosIngreso") ?>",
    //       value: "<?= Encriptar("id") ?>",
    //       text: "<?= Encriptar("nombreEstado") ?>",
    //       likeWhere: "<?= Encriptar("nombreEstado") ?>",
    //       order: "<?= Encriptar(json_encode(['group by' => 'id'])) ?>",
    //       clausula: {
    //         data: "<?= Encriptar("estado = 1") ?>",
    //         value: [''],
    //       },
    //       carapter: "true",
    //       campoCreador: btoa(JSON.stringify({
    //         nombreCreador: false,
    //         conditionInsert: false,
    //         conditionSelect: false,
    //       })),
    //     }, false, false
    //   );
    // }

    // function verIngresos(data) {
    //   data.cargarCard = "cargarCard";
    //   $.ajax({
    //     type: "POST",
    //     url: "consultarClienteIngresos.php",
    //     data: data,
    //     success: function(response) {
    //       $('#div-Ingresos').html(response);
    //       $("#form-ingresos").submit(function(e) {
    //         e.preventDefault();
    //         var data = new FormData(this);
    //         addEstado(data);
    //       });
    //     }
    //   });
    // };

    // function addEstado(data) {
    //   $.ajax({
    //     type: "POST",
    //     url: "consultarClienteIngresos.php",
    //     processData: false,
    //     contentType: false,
    //     data: data,
    //     success: function(response) {
    //       // console.log(response);
    //       let datos = JSON.parse(response);
    //       if (datos.status == 1) {
    //         verIngresos({
    //           cliente_id: atob(datos.cliente_id),
    //           usuario_id: <?= $_SESSION['ID'] ?>
    //         });
    //       } else {
    //         alert("El estado no fue agregado");
    //       }
    //     }
    //   });
    // }

    // function verEstado(data) {
    //   data.cargarEstadoTipo = "cargarEstadoTipo";
    //   $.ajax({
    //     type: "POST",
    //     url: "consultarClienteIngresos.php",
    //     data: data,
    //     success: function(response) {
    //       $('#div-campoAdicional').html(response);
    //     }
    //   });
    // };

    // function cerrarEstado(data) {
    //   data.cerrarEstado = "cerrarEstado";
    //   $.ajax({
    //     type: "POST",
    //     url: "consultarClienteIngresos.php",
    //     data: data,
    //     success: function(response) {
    //       let datos = JSON.parse(response);
    //       if (datos.status) {
    //         verIngresos({
    //           cliente_id: atob(datos.cliente_id),
    //           usuario_id: <?= $_SESSION['ID'] ?>
    //         });
    //       } else {
    //         console.log(response);
    //         alert("El estado no se ha Cerrado");
    //       }
    //     }
    //   });
    // };
</script>

<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';

// $rips_activo = funcionMaster($_SESSION["ID"], 'ID_Usuario', 'rips', 'config');
// include 'IR_ModalRips.php';
?>

<script>
    $("form").on("change", function () {
        TotaldeTodo();
        Elementos();
    });
</script>
<script src="plugins/LottieK/lottie.min.js"></script>
<?php
$usuariod_id_autoguardado = $_SESSION["ID"];
$cliente_id_autoguardado = $_GET['clienteId'];
$Nombre_Tabla_autoguardado = "Historia_Ortidoncia";
include 'AutoGuardado_Historia.php';
?>

<?php $rips_activo = funcionMaster($_SESSION["ID"], 'ID_Usuario', 'rips', 'config');
if ($rips_activo != 1) : ?>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#FormularioHistoriaClinica").submit(function(e) {
        e.preventDefault();
        if ($(`#CIE10-Principal`).val().trim() != '') {
          $(this).off().submit()
        } else {
          alert(
            "No es posible continuar, el campo 'CÓDIGO DEL DIAGNÓSTICO PRINCIPAL' no se ha seleccionado."
          );
          $(`a[href='#collapseRIPS']`).click();
        };
      });
    });
  </script>
<?php endif; ?>

<?php
$rips_activo = funcionMaster($_SESSION["ID"], 'ID_Usuario', 'rips', 'config');
include 'IR_ModalRips.php';
?>


<?php
/*
$Cliente_Presupuesto = $_GET['clienteId'];
$Usuario_Presupuesto = $_SESSION['ID'];
include 'MPR_ModuloPresupuestoRealizado.php';
*/
?>