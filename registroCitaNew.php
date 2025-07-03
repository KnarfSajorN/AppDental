<!-- Left side column. contains the logo and sidebar -->
<?php
if (isset($_POST['key'])) {
    include "./funciones/funciones.php";
    header("ContentType: application/json; charset=utf-8");

    $arrayDiasSemana = [ // Array que nos facilitara el proceso de ingresar datos para la tabla config
        'Monday' => ["lt"], // Lunes ambos turnos
        'Tuesday' => ["mt"], // Martes ambos turnos
        'Wednesday' => ["et"], // Miercoles ambos turnos
        'Thursday' => ["jt"], // Jueves ambos turnos
        'Friday' => ["vt"], // Viernes ambos turnos
        'Saturday' => ["st"], // Sabado ambos turnos
        'Sunday' => ["dt"], // Domingo ambos turnos
    ];

    $array = [
        "status" => true,
        "data" => array(),
        "error" => array()
    ];

    $_POST = preparePost($_POST, true);
    $queryConfig = mysqli_query($conn3, "SELECT * FROM config WHERE ID_Usuario = {$_POST['usuario_id']}");
    if (!$queryConfig) {
        array_push($array['error'], "Error config: " . mysqli_error($conn3));
    }

    $config = mysqli_fetch_array($queryConfig); // Extraemos el calendario del Usuario
    if ($_POST['key'] == "fechaDisponible") {
        if ($config[$arrayDiasSemana[Date("l", strtotime($_POST['fecha']))][0]] == 1) {
            include "getHoraDisponible.php";
            if ($config['tiempoConsulta'] > 0) {
                $array['data']['tipo'] = 1; // seleccion por tiempo consulta
                $array['data']['horas'] = getHoraSelect((object)[
                    "usuario_id" => "{$_POST['usuario_id']}",
                    "fecha" => $_POST['fecha']
                ]);
            } else {
                $array['data']['tipo'] = 0; // seleccion libre
                $array['data']['horas'] = getHoras((object)[
                    "usuario_id" => "{$_POST['usuario_id']}",
                    "fecha" => $_POST['fecha'],
                    "hora" => $_POST['hora']
                ]);
            }
        } else {
        }
        echo json_encode($array);
        exit();
    }

    if ($_POST['key'] == "tiempoConsulta") {
        if ($config['tiempoConsulta'] > 0) {
            array_push($array['data'], 1);
        } else if ($config['tiempoConsulta'] == 0) {
            array_push($array['data'], 0);
        }
        echo json_encode($array);
        exit();
    }

    echo json_encode($array);
    exit();
}
include 'header.php';
include 'menu.php';
?>
<link rel="stylesheet" href="./css/agregarCitas.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
            <li><a href="#">Agregar cita</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h4 class="Titulo_Pagina">Agregar cita</h4>
                <div class="box box-body">
                    <div class="row">
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" name="formularioActualizarcliente">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="usuarios">Usuarios</label>
                                            <select name="doctor" id="doctor" class="form-control input-lg select2" style="width: 100%;"></select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="fecha">Fecha</label>
                                            <input type="date" class="form-control input-lg" name="fecha" id="fecha" min="<?= Date('Y-m-d') ?>" onchange="">
                                        </div>
                                        <div class="col-md-4">
                                            <!-- <label for="hora">Hora</label>
                                            <select name="hora" id="hora" class="form-control input-lg select2"></select> -->

                                            <!-- <label for="hora">Hora</label>
                                            <input type="time" name="hora" id="hora" class="form-control input-lg" disabled> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12" style="display: flex; justify-content: flex-end; padding:0;">
                                        <div class="col-xs-12 col-md-4 row" style="margin:0; padding:0;">
                                            <p class="text-bold">El día <span class="text-danger">Lunes</span> solo se atiende en</p>
                                            <p class="text-bold">Pacientes agendados <span class="text-danger">1</span> Cupos disponibles <span class="text-danger">11</span></p>
                                            <div class="col-md-12 row scroll-personalizado" style="padding-left: 0; margin:0; max-height: 202px; overflow: auto;">
                                                <div class="widget widget-gray">
                                                    <!-- TYPE PANEL -->
                                                    <div class="widget-head">
                                                        <!-- HEAD PANEL -->
                                                        <h4 class="heading"><a href="#" class="toggle-personalizado text-black" title=""><i class="fa fa-calendar"></i> 10:00 pm - Roberto Gomez Bolañoz</a></h4>
                                                    </div><!-- /HEAD PANEL -->

                                                    <div class="widget-body" id="widget-body" style="display: none;">
                                                        <!-- CONTENT PANEL -->
                                                        <h4> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla asperiores quo veritatis cupiditate atque minus, exercitationem commodi? Deleniti sapiente nesciunt voluptates fugit cumque, perferendis necessitatibus voluptatem cum saepe facere voluptas? </h4>

                                                    </div><!-- /CONTENT PANEL -->

                                                    <div class="widget-footer">
                                                        <!-- FOOTER PANEL-->
                                                        <a href="#" class="fa fa-pencil fa-1x text-primary" title="Editar Cita"><i></i></a>
                                                        <a href="#" class="fa fa-trash fa-1x text-danger" title="Remover Cita"><i></i></a>
                                                        <!-- <a href="#" class="fa fa-search fa-1x" title="" ><i></i></a>
                                                    <a href="#" class="fa fa-plus-circle fa-1x" title="" ><i></i></a> -->
                                                    </div><!-- /FOOTER PANEL-->

                                                </div> <!-- /TYPE PANEL -->
                                                <div class="widget widget-gray">
                                                    <!-- TYPE PANEL -->
                                                    <div class="widget-head">
                                                        <!-- HEAD PANEL -->
                                                        <h4 class="heading"><a href="#" class="toggle-personalizado text-black" title=""><i class="fa fa-calendar"></i> 10:00 pm - Roberto Gomez Bolañoz</a></h4>
                                                    </div><!-- /HEAD PANEL -->

                                                    <div class="widget-body" id="widget-body" style="display: none;">
                                                        <!-- CONTENT PANEL -->
                                                        <h4> Por Moricion </h4>

                                                    </div><!-- /CONTENT PANEL -->

                                                    <div class="widget-footer">
                                                        <!-- FOOTER PANEL-->
                                                        <a href="#" class="fa fa-pencil fa-1x text-primary" title="Editar Cita"><i></i></a>
                                                        <a href="#" class="fa fa-trash fa-1x text-danger" title="Remover Cita"><i></i></a>
                                                        <!-- <a href="#" class="fa fa-search fa-1x" title="" ><i></i></a>
                                                    <a href="#" class="fa fa-plus-circle fa-1x" title="" ><i></i></a> -->
                                                    </div><!-- /FOOTER PANEL-->

                                                </div> <!-- /TYPE PANEL -->
                                                <div class="widget widget-gray">
                                                    <!-- TYPE PANEL -->
                                                    <div class="widget-head">
                                                        <!-- HEAD PANEL -->
                                                        <h4 class="heading"><a href="#" class="toggle-personalizado text-black" title=""><i class="fa fa-calendar"></i> 10:00 pm - Roberto Gomez Bolañoz</a></h4>
                                                    </div><!-- /HEAD PANEL -->

                                                    <div class="widget-body" id="widget-body" style="display: none;">
                                                        <!-- CONTENT PANEL -->
                                                        <h4> Por Moricion </h4>

                                                    </div><!-- /CONTENT PANEL -->

                                                    <div class="widget-footer">
                                                        <!-- FOOTER PANEL-->
                                                        <a href="#" class="fa fa-pencil fa-1x text-primary" title="Editar Cita"><i></i></a>
                                                        <a href="#" class="fa fa-trash fa-1x text-danger" title="Remover Cita"><i></i></a>
                                                        <!-- <a href="#" class="fa fa-search fa-1x" title="" ><i></i></a>
                                                    <a href="#" class="fa fa-plus-circle fa-1x" title="" ><i></i></a> -->
                                                    </div><!-- /FOOTER PANEL-->

                                                </div> <!-- /TYPE PANEL -->
                                                <div class="widget widget-gray">
                                                    <!-- TYPE PANEL -->
                                                    <div class="widget-head">
                                                        <!-- HEAD PANEL -->
                                                        <h4 class="heading"><a href="#" class="toggle-personalizado text-black" title=""><i class="fa fa-calendar"></i> 10:00 pm - Roberto Gomez Bolañoz</a></h4>
                                                    </div><!-- /HEAD PANEL -->

                                                    <div class="widget-body" id="widget-body" style="display: none;">
                                                        <!-- CONTENT PANEL -->
                                                        <h4> Por Moricion </h4>

                                                    </div><!-- /CONTENT PANEL -->

                                                    <div class="widget-footer">
                                                        <!-- FOOTER PANEL-->
                                                        <a href="#" class="fa fa-pencil fa-1x text-primary" title="Editar Cita"><i></i></a>
                                                        <a href="#" class="fa fa-trash fa-1x text-danger" title="Remover Cita"><i></i></a>
                                                        <!-- <a href="#" class="fa fa-search fa-1x" title="" ><i></i></a>
                                                    <a href="#" class="fa fa-plus-circle fa-1x" title="" ><i></i></a> -->
                                                    </div><!-- /FOOTER PANEL-->

                                                </div> <!-- /TYPE PANEL -->

                                            </div>
                                        </div>

                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-hover table-striped table-bordered table-condensed" style="width: 100%; display: flex; flex-flow: column">
                                                <thead style="width: 100%; display: flex; flex-flow: column">
                                                    <tr style="width: 100%; display: flex; flex-flow: row">
                                                        <th class="text-center bg-primary" style="width: calc(100%/3);">Hora</th>
                                                        <th class="text-center bg-primary" style="width: calc(100%/3);">Nombre</th>
                                                        <th class="text-center bg-primary" style="width: calc(100%/3);">Motivo</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="width: 100%; display: flex; flex-flow: column; max-height: 160px; overflow: auto;">
                                                    <tr style="width: 100%; display: flex; flex-flow: row">
                                                        <td class="text-center" style="width: calc(100%/3);">09:00 AM</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Venito Camelo</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Por motivo de moricion</td>
                                                    </tr>
                                                    <tr style="width: 100%; display: flex; flex-flow: row">
                                                        <td class="text-center" style="width: calc(100%/3);">09:00 AM</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Venito Camelo</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Por motivo de moricion</td>
                                                    </tr>
                                                    <tr style="width: 100%; display: flex; flex-flow: row">
                                                        <td class="text-center" style="width: calc(100%/3);">09:00 AM</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Venito Camelo</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Por motivo de moricion</td>
                                                    </tr>
                                                    <tr style="width: 100%; display: flex; flex-flow: row">
                                                        <td class="text-center" style="width: calc(100%/3);">09:00 AM</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Venito Camelo</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Por motivo de moricion</td>
                                                    </tr>
                                                    <tr style="width: 100%; display: flex; flex-flow: row">
                                                        <td class="text-center" style="width: calc(100%/3);">09:00 AM</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Venito Camelo</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Por motivo de moricion</td>
                                                    </tr>
                                                    <tr style="width: 100%; display: flex; flex-flow: row">
                                                        <td class="text-center" style="width: calc(100%/3);">09:00 AM</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Venito Camelo</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Por motivo de moricion</td>
                                                    </tr>
                                                    <tr style="width: 100%; display: flex; flex-flow: row">
                                                        <td class="text-center" style="width: calc(100%/3);">09:00 AM</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Venito Camelo</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Por motivo de moricion</td>
                                                    </tr>
                                                    <tr style="width: 100%; display: flex; flex-flow: row">
                                                        <td class="text-center" style="width: calc(100%/3);">09:00 AM</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Venito Camelo</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Por motivo de moricion</td>
                                                    </tr>
                                                    <tr style="width: 100%; display: flex; flex-flow: row">
                                                        <td class="text-center" style="width: calc(100%/3);">09:00 AM</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Venito Camelo</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Por motivo de moricion</td>
                                                    </tr>
                                                    <tr style="width: 100%; display: flex; flex-flow: row">
                                                        <td class="text-center" style="width: calc(100%/3);">09:00 AM</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Venito Camelo</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Por motivo de moricion</td>
                                                    </tr>
                                                    <tr style="width: 100%; display: flex; flex-flow: row">
                                                        <td class="text-center" style="width: calc(100%/3);">09:00 AM</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Venito Camelo</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Por motivo de moricion</td>
                                                    </tr>
                                                    <tr style="width: 100%; display: flex; flex-flow: row">
                                                        <td class="text-center" style="width: calc(100%/3);">09:00 AM</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Venito Camelo</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Por motivo de moricion</td>
                                                    </tr>
                                                    <tr style="width: 100%; display: flex; flex-flow: row">
                                                        <td class="text-center" style="width: calc(100%/3);">09:00 AM</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Venito Camelo</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Por motivo de moricion</td>
                                                    </tr>
                                                    <tr style="width: 100%; display: flex; flex-flow: row">
                                                        <td class="text-center" style="width: calc(100%/3);">09:00 AM</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Venito Camelo</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Por motivo de moricion</td>
                                                    </tr>
                                                    <tr style="width: 100%; display: flex; flex-flow: row">
                                                        <td class="text-center" style="width: calc(100%/3);">09:00 AM</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Venito Camelo</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Por motivo de moricion</td>
                                                    </tr>
                                                    <tr style="width: 100%; display: flex; flex-flow: row">
                                                        <td class="text-center" style="width: calc(100%/3);">09:00 AM</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Venito Camelo</td>
                                                        <td class="text-center" style="width: calc(100%/3);">Por motivo de moricion</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="cliente_id">Cliente</label>
                                            <select name="cliente_id" id="cliente_id" class="form-control input-lg select2" style="width: 100%;"></select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="indicativo">Indicativo</label>
                                            <select name="indicativo" id="indicativo" class="form-control input-lg select2" style="width: 100%;"></select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="whatsapp">Whatsapp</label>
                                            <input type="number" name="whatsapp" id="whatsapp" class="form-control input-lg">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="correo_electronico">Correo Electronico</label>
                                            <input type="email" name="correo_electronico" id="correo_electronico" class="form-control input-lg">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="motivoConsulta">Motivo de Consulta</label>
                                            <input type="number" name="motivoConsulta" id="motivoConsulta" class="form-control input-lg">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="duracion">Tiempo de Cita</label>
                                            <select name="duracion" id="duracion" class="form-control input-lg select2" style="width: 100%;">
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
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <label for="tipo">
                                                <input type="radio" name="tipo" id="Presencial" value="1"> <i class="fa fa-user text-bold"> Presencial</i>
                                            </label>
                                            <label for="tipo">
                                                <input type="radio" name="tipo" id="Domiciliaria" value="2"> <i class="fa fa-user text-bold"> Domiciliaria</i>
                                            </label>
                                            <label for="tipo">
                                                <input type="radio" name="tipo" id="Video Consulta" value="3"> <i class="fa fa-user text-bold"> Video Consulta</i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-12"></div>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include("footer.php");
include("ajaxCreadorSelect.php");
function Encriptar($valor)
{
    $Sc = base64_decode("keyMaster");
    $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
    return $Texto;
}
?>

<script type="text/javascript">
    $(document).ready(function() {
        $(".toggle-personalizado").click(function(e) {
            var count = 0;
            do {
                count = document.querySelectorAll(".widget-body[style='']").length;
                document.querySelectorAll(".widget-body[style='']").forEach(element => {
                    $(element).attr('style', "display:block;");
                });
                if (count == 0) {
                    let padre = $(this).parent().parent().parent();
                    if ($(padre[0]).children("#widget-body").css("display") == "block") {
                        $(padre[0]).children("#widget-body").slideToggle("slow");
                    } else {
                        $(".widget-body[style='display: block;']").slideToggle("slow");
                        $(padre[0]).children("#widget-body").slideToggle("slow");
                    }
                }
            } while (count > 0);
        });
        $("#toggle2").click(function() {
            $("#widget-body2").slideToggle("slow");
        });
    });

    window.addEventListener('load', () => {
        Select2Dinamico(
            "#doctor", {
                selectFrom: "<?= Encriptar("*") ?>",
                name: "<?= Encriptar("usuarios") ?>",
                value: "<?= Encriptar("ID") ?>",
                text: "<?= Encriptar("especialidad || NOMBRE_USUARIO") ?>",
                likeWhere: "<?= Encriptar("especialidad || NOMBRE_USUARIO") ?>",
                order: "<?= Encriptar(json_encode(['ORDER BY' => 'ID'])) ?>",
                clausula: {
                    data: "<?= Encriptar("ACTIVO = 1") ?>",
                    value: [''],
                },
                carapter: "true",
                campoCreador: false,
            }, false, false
        );
    });

    const fechaDisponible = (value) => {
        let data = {
            key: "fechaDisponible",
            usuario_id: $("#doctor").val(),
            value: value
        };
        $.ajax({
            url: "<?= $_SERVER['PHP_SELF'] ?>",
            type: "POST",
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.status) {

                }
            }
        });
    };

    const tiempoConsulta = (data) => {
        data.key = "tiempoConsulta";
        $.ajax({
            url: "<?= $_SERVER['PHP_SELF'] ?>",
            type: "POST",
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.status) {
                    let print = '';
                    if (response.data[0] == 1) {
                        print = `
                            <label for="hora">Hora</label>
                            <select name="hora" id="hora" class="form-control input-lg select2"></select>
                        `;
                    } else if (response.data[0] == 0) {
                        print = `
                            <label for="hora">Hora</label>
                            <input type="time" name="hora" id="hora" class="form-control input-lg">
                        `;
                    }
                }
            }
        });
    };
</script>


<script>
    $(document).ready(function() {
        $('#duracion').select2({
            tags: true,
            createTag: function(params) {
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
            }
        });
    });
</script>