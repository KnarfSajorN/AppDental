<?php
if (isset($_POST) && !empty($_POST['key'])) {
    include 'funciones/conn3.php';
    $id = $_POST['id'];
    $concepto = mysqli_query($conn3, "SELECT cliente_id, idHistoria FROM conceptolaboral WHERE id = '{$id}'") or die(mysqli_error($conn3));
    $nrow = mysqli_num_rows($concepto);
    $newArray = [
        'status' => false
    ];
    if ($nrow > 0) {
        $concepto = $concepto->fetch_assoc();
        $updateHistoria = mysqli_query($conn3, "UPDATE conceptolaboral SET proceso = 0 WHERE id = '{$id}'") or die(mysqli_error($conn3));
        if ($updateHistoria) {
            $newArray['status'] = true;
            $newArray['cliente_id'] = $concepto['cliente_id'];
        }
    }
    header("Content-Type: application/json; chatrset=utf-8");
    echo json_encode($newArray);
    exit();
}
include 'header.php';
include 'menu.php';
// include("funciones/funcionesUtilidades.php");
$idCliente = $_GET['idCliente'];
$usuarioId = $_GET['usuarioId'];

$ID = $_SESSION['ID'];

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = {$idCliente}");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $cliente_id = $rowMotorizado['cliente_id'];
    $usuario_id = $rowMotorizado['usuario_id'];
    $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
    $whatsapp = $rowMotorizado['whatsapp'];
    $idEmpresa = funcionMaster($rowMotorizado['idEmpresa'], 'id', 'nombreEmpresa', 'empresasAfiliadas');
    $correoEmpresa = funcionMaster($rowMotorizado['idEmpresa'], 'id', 'correoContactoEmpresa', 'empresasAfiliadas');
    $correo_cliente = $rowMotorizado['correo_cliente'];
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $ciudad_cliente = $rowMotorizado['ciudad_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
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
    $parentesco_acompanante = $rowMotorizado['parentesco_acompanante'];
    $antecedentes = $rowMotorizado['antecedentes'];
    $entidadSalud = $rowMotorizado['entidadSalud'];
    $seguro = $rowMotorizado['seguro'];
    $nota = $rowMotorizado['nota'];
    $alergias = $rowMotorizado['alergias'];
    $tiposSangre = $rowMotorizado['tiposSangre'];
    $esDonante = $rowMotorizado['esDonante'];
    $tomaMedicamento = $rowMotorizado['tomaMedicamento'];
    $enfermedadesPequeno = $rowMotorizado['enfermedadesPequeno'];
    $fotoperfil = $rowMotorizado['fotoperfil'];
    $motivoConsulta = $rowMotorizado['motivoConsulta'];
    $peso = $rowMotorizado['peso'];
    $altura = $rowMotorizado['altura'];
    $imc = $rowMotorizado['imc'];
    $ComposicionCorporal = $rowMotorizado['ComposicionCorporal'];
    $ap1 = $rowMotorizado['ap1'];
    $ap2 = $rowMotorizado['ap2'];
    $ap3 = $rowMotorizado['ap3'];
    $ap4 = $rowMotorizado['ap4'];
    $ap5 = $rowMotorizado['ap5'];
    $ap6 = $rowMotorizado['ap6'];
    $ap7 = $rowMotorizado['ap7'];
    $ap8 = $rowMotorizado['ap8'];
    $ap9 = $rowMotorizado['ap9'];
    $cirugiasCuales = $rowMotorizado['cirugiasCuales'];
    $cirugiasOtros = $rowMotorizado['cirugiasOtros'];
    $tipoUsuario = $rowMotorizado['tipoUsuario'];
    $estado = $rowMotorizado['estado'];
    $sucursal = $rowMotorizado['sucursal'];
    $ocupacion = $rowMotorizado['ocupacion'];
    $wts2 = $rowMotorizado['wts2'];
    $wts3 = $rowMotorizado['wts3'];

    if($fotoperfil <> ""){
        $fotoperfil = "pascientes/".$fotoperfil;
    }

    $empresaAfilidad_id = $rowMotorizado['idEmpresa'];
    $tiposExamen = $rowMotorizado['tiposExamen'];
}


$queryHistoria = mysqli_query($conn3, "SELECT * FROM salaControl WHERE idCliente = {$idCliente} AND proceso = 0;");
$nrowlHistoria = mysqli_num_rows($queryHistoria);

$queryconfig = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario=$ID");
$nrowl = mysqli_num_rows($queryconfig);
while ($rowconfig = mysqli_fetch_array($queryconfig)) {
    $cie10 = $rowconfig['cie10'];
    $pro1  = $rowconfig['pro1'];
    $pro2  = $rowconfig['pro2'];
}
?>

<?php 

include "./planAtencion/index.php";
?>



<link rel="stylesheet" href="./css/styleSalaControl.css">
<link rel="stylesheet" href="apiVoz.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Sala de Control</h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Sala de Control </a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">

                <div class="box">
                    <div class="container-fluid row"></div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-12" id="imprimirHistorico">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="text-center card-box">
                                            <div class="member-card">
                                                <div class="thumb-xl member-thumb m-b-10 center-block">
                                                    <img src="<?=$Base;?><?= ($fotoperfil != '' ? $fotoperfil : 'ImagenesHistoria/SaludOcupacional.jpg') ?>" id="imgCliente" class="img-fluid img-circle img-thumbnail" alt="profile-image" style="width:200px; height: 200px;">
                                                    <!-- <img src="https://medicalsoftplus.com/co573/pascientes/107__2021-12-09_15-09-03__Test.jpg" id="imgCliente" class="img-circle img-thumbnail img-fluid" alt="profile-image" style="max-height: 400px; max-width:300px;"> -->
                                                    <!-- <img src="https://bootdey.com/img/Content/avatar/avatar6.png" id="imgCliente" class="img-circle img-thumbnail" alt="profile-image" style="max-width:100%;"> -->
                                                </div>

                                                <div class="">
                                                    <h4 class="m-b-5" id="nombre"><?= ($nombre_cliente != "" ? $nombre_cliente : "N/A") ?></h4>
                                                    <p class="text-muted"><?= ($profesion_cliente != "" ? $profesion_cliente : '') ?></p>
                                                </div>

                                                <div class="text-left m-t-40">
                                                    <p class="text-muted font-13"><strong>Fecha Nacimiento :</strong> <br> <span class="m-l-15" id="fechaNacimiento"><?= ($fechaNacimiento != "" ? $fechaNacimiento : "N/A") ?></span></p>
                                                    <p class="text-muted font-13"><strong>Telefono :</strong> <br> <span class="m-l-15" id="telefono"><?= ($whatsapp != "" ? str_replace("/*0*/", '', $whatsapp) : "N/A") ?></span></p>
                                                    <p class="text-muted font-13"><strong>Empresa :</strong> <br> <span class="m-l-15" id="empresaAfiliada"><?= ($idEmpresa != "" ? $idEmpresa : "N/A") ?></span></p>
                                                    <p class="text-muted font-13"><strong>Correo Empresa :</strong> <br> <span class="m-l-15" id="correoEmpresaAfiliada"><?= ($correoEmpresa != "" ? $correoEmpresa : "N/A") ?></span></p>
                                                    <p class="text-muted font-13"><strong>Tipos Exámenes :</strong> <br> <span class="m-l-15" id="examenestipos"><?= ($tiposExamen != "" ? str_replace('||',' ',$tiposExamen) : "N/A") ?></span></p>
                                                </div>

                                                <ul class="social-links list-inline m-t-30 row">
                                                    <li style="width:33%;">
                                                        <a id="editCliente" data-placement="top" data-toggle="tooltip" class="tooltips text-success" href="#"  data-tippy-content="Editar Datos" onclick="window.open('nuevoPaciente?cI=<?= encrypt($idCliente) ?>')"><i class="fa fa-pencil"></i></a>
                                                    </li>
                                                    <li style="width:33%;">
                                                        <a id="generarHistorias" data-placement="top" data-toggle="tooltip" class="tooltips text-danger <?= ($nrowlHistoria > 0 ? 'disabled' : '')  ?>" href="#"  data-tippy-content="Ordenar Procedimientos"><i class="fa fa-id-card-alt" data-toggle="modal" data-target="#my-modal"></i></a>
                                                    </li>
                                                    <li style="width:33%;">
                                                        <a id="ordenLaboratorio" data-placement="top" data-toggle="tooltip" class="tooltips text-primary" href="#"  data-tippy-content="Generar Orden de Laboratorio" onclick="window.open('SO_AsignarExamenes?idCliente=<?= $idCliente ?>')"><i class="fa fa-flask"></i></a>
                                                    </li>
                                                    <li style="width:100%;">
                                                        <a id="SweetEditar" data-placement="top" data-toggle="tooltip" class="tooltips text-primary" href="#"  data-tippy-content="Actualizar Empresa/Tipo de Exámenes" onclick="mostrarSweetAlertDatosAdicionales()" style="border-radius: 10px;width: 31%;margin-top: 10px;"><i class="fa fa-industry"></i><i class="fa fa-pencil"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> <!-- end card-box -->
                                        <!-- 
                                        <div class="card-box">
                                            <h4 class="m-t-0 m-b-20 header-title">Skills</h4>
                                            <div class="p-b-10">
                                                <p>HTML5</p>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                    </div>
                                                </div>
                                                <p>PHP</p>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                    </div>
                                                </div>
                                                <p>Wordpress</p>
                                                <div class="progress progress-sm m-b-0">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="card-box">
                                            <!-- <h4 class="m-t-0 m-b-20 header-title">Controles en Proceso</h4>
                                            <div class="p-b-10">
                                                <div class="content-fluid" style="padding:0;">
                                                    <label for="clienteFiltrado"></label>
                                                    <select name="clienteFiltrado" id="clienteFiltrado" onchange="clienteFiltrado()" class="form-control select2" style="width:100%">
                                                        <option value="" selected>Provedor General</option>
                                                        <?php
                                                        //where 
                                                        // value del option (si se quiere mas de un valor separarlo por ,) 
                                                        // texto del option (si se quiere mas de un valor separarlo por ,)
                                                        // tabla 
                                                        // selected agregar "nombre comprarador , 0" para comparar con value del option 
                                                        // selected agregar "nombre comprarador , 1" para comparar con texto del option
                                                        echo selectMaster("", "cliente_id", "CODI_CLIENTE,nombre_cliente", "cliente", "{$idCliente},0");
                                                        ?>
                                                    </select>
                                                </div>
                                            </div> -->
                                            <!-- <hr> -->
                                            <div class="p-b-10" style="display:flex; align-items: center; justify-content:center; flex-flow:column; border: 1px solid #eee; height: 1px; margin: 35px 0 35px 0;">
                                                <div class="p-b-10" style="display:flex; align-items: center; justify-content:center; flex-flow:column;">
                                                    <div class="dlk-radio btn-group">
                                                        <label class="btn btn-default btn-sm">
                                                            <input name="general" id="procesadaHistoria" class="form-control general" onchange="showHEnCurso({idCliente: <?= $idCliente ?>,proceso: $(this).val()})" type="radio" value="1" <?= ($nrowlHistoria <= 0 ? 'checked="true" defaultchecked="checked"' : '') ?>>
                                                            <i class="fa fa-book-medical glyphicon glyphicon-ok text-black"></i> <span class="text-black text-bold">Terminada</span>
                                                        </label>
                                                        <label class="btn btn-default btn-sm">
                                                            <input name="general" id="procesoHistoria" class="form-control general" onchange="showHEnCurso({idCliente: <?= $idCliente ?>,proceso: $(this).val()})" type="radio" value="0" <?= ($nrowlHistoria > 0 ? 'checked="true" defaultchecked="checked"' : '') ?>>
                                                            <i class="fa fa-filter glyphicon glyphicon-remove text-black"></i> <span class="text-black text-bold">En Proceso</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>



                                            <!-- <hr> -->
                                            <!-- <h4 class="m-t-0 m-b-20 header-title">Historial de Clientes</h4> -->
                                            <!-- <div class="p-b-10"> -->
                                            <!-- <div class="content-fluid" style="padding:0;"> -->
                                            <!-- <label for="clienteFiltrado"></label> -->
                                            <!-- <select name="clienteFiltrado" id="clienteFiltrado" onchange="clienteFiltrado()" class="form-control select2" style="width:100%"> -->
                                            <!-- <option value="" selected disabled>Clientes General</option> -->
                                            <?php
                                            //where 
                                            // value del option (si se quiere mas de un valor separarlo por ,) 
                                            // texto del option (si se quiere mas de un valor separarlo por ,)
                                            // tabla 
                                            // selected agregar "nombre comprarador , 0" para comparar con value del option 
                                            // selected agregar "nombre comprarador , 1" para comparar con texto del option
                                            // echo selectMaster("", "cliente_id", "CODI_CLIENTE,nombre_cliente", "cliente", "{$idCliente},0");
                                            ?>
                                            <!-- </select> -->
                                            <!-- </div> -->
                                            <!-- </div> -->
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-md-8 col-lg-9">
                                        <div class="">
                                            <div class="">
                                                <ul class="nav nav-tabs navtab-custom">
                                                    <li class="">
                                                        <a href="#historias" onclick="($(' #cambiaCarpeta').hasClass('fa-folder') ? '' : ($('#cambiaCarpeta').removeClass('fa-folder-open').addClass('fa-folder')))" data-toggle="tab" aria-expanded="false">
                                                            <span class="visible-xs"><i class="fa fa-book"></i></span>
                                                            <span class="hidden-xs">Vista Previa</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#profile" data-toggle="tab" aria-expanded="true">
                                                            <span class="visible-xs"><i class="fa fa-photo"></i></span>
                                                            <span class="hidden-xs">Historias Realizadas</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#archivos" onclick="($('#cambiaCarpeta').hasClass('fa-folder') ? ($('#cambiaCarpeta').removeClass('fa-folder').addClass('fa-folder-open')) : '')" data-toggle="tab" aria-expanded="true">
                                                            <span class="visible-xs"><i class="fa fa-folder" id="cambiaCarpeta"></i></span>
                                                            <span class="hidden-xs">Archivos</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane" id="historias">
                                                        <div class="div">
                                                            <div class="col-sm-12">
                                                                <div class="panel-group drop-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                                                    <?php include "impCargaHistoria.php"; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane active" id="profile">
                                                        <div class="row" id="impHistorias" style="max-height: 750px; overflow: auto;">
                                                            <!-- <div class="col-sm-4">
                                                                <div class="gal-detail thumb">
                                                                    <a href="#" class="image-popup">
                                                                        <i class="fa fa-book thumb-img text-primary flex tooltips" style="width: 100%; height: 120px; font-size: 60px;" data-placement="top" data-toggle="tooltip" data-original-title="Historia Clinica"></i> -->
                                                            <!-- <img src="https://via.placeholder.com/400x300/008B8B/00000" class="thumb-img" alt="work-thumbnail"> -->
                                                            <!-- </a>
                                                                    <h4 class="text-center">Historia Clinica</h4>
                                                                    <div class="ga-border"></div>
                                                                    <p class="text-muted text-center"><small>2021-12-09</small><br><small>14:22:05</small></p>
                                                                    <div class="p-t-12 flex"> -->
                                                            <!-- <button type="button" class="btn btn-info btn-sm w-sm waves-effect m-t-10 waves-light"><i class="fa fa-refresh"></i> Comenzar</button> -->
                                                            <!-- <button type="button" class="btn btn-success btn-sm w-sm waves-effect m-t-10 waves-light"><i class="fa fa-play"></i> Continuar</button>
                                                                        <button type="button" class="btn btn-primary btn-sm w-sm waves-effect m-t-10 waves-light"><i class="fa fa-print"></i> Imprimir</button> -->
                                                            <!-- </div>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="archivos">
                                                        <div id="main-content" class="file_manager">
                                                            <div class="container-fluid">
                                                                <div class="row clearfix" id="impArchivos">
                                                                    <?php include "impCargaArchivos.php"; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->
                                <!-- modal -->
                                <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-bold" id="my-modal-title">Procedimientos a Realizar: <span aria-hidden="true" id="cuentaHistorias">0</span></h4>
                                                <button class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <select id="tipoHistoria" name="tipoHistoria[]" onchange="$('#cuentaHistorias').text(($(this).val() == null ? 0 : $(this).val().length))" class="form-control select2" multiple="multiple" style="width: 100%;">
                                                            <!-- ATENCION -->
                                                            <!-- NO CAMBIAR LAS POSICIONES -->
                                                            <!-- AÑADIR NUEVOS EN CONTINUIDAD -->
                                                            <option value="1" selected>Salud Ocupacional(Historia)</option>
                                                            <option value="2">Visiometría(Paraclínicos)</option>
                                                            <option value="3">Audiometría(Paraclínicos)</option>
                                                            <option value="4">Espirometría(Paraclínicos)</option>
                                                            <option value="5">Optometría(Paraclínicos)</option>
                                                            <option value="6">Electrocardiograma(Paraclínicos)</option>
                                                            <option value="7">Psicofísico(Paraclínicos)</option>
                                                            <option value="8">Psicométrico(Paraclínicos)</option>
                                                            <option value="9">Radiografía(Paraclínicos)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="" style="width:100%;">
                                                    <div class="col-md-12">
                                                        <button type="button" id="procesarHistorias" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" style="width:100%" onclick="addHistoria({idCliente: <?= $idCliente ?>, procesarHistorias: $('#tipoHistoria').val()})">Procesar <i class="fa fa-send"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- fin modal -->
                                <!-- end row -->
                                <!-- modal -->
                                <div id="my-modal2" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-bold" id="my-modal-title">Paraclínicos</h4>
                                                <button class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="max-height: 550px; overflow: auto;">
                                                <div class="row" id="impParaClinicos">
                                                    <div class="col-sm-4">
                                                        <div class="gal-detail thumb">
                                                            <a href="#" class="image-popup">
                                                                <i class="fa fa-book thumb-img text-primary flex tooltips" style="width: 100%; height: 120px; font-size: 60px;" data-placement="top" data-toggle="tooltip" data-tippy-content="Historia Clinica"></i>
                                                                <!-- <img src="https://via.placeholder.com/400x300/008B8B/00000" class="thumb-img" alt="work-thumbnail"> -->
                                                            </a>
                                                            <h4 class="text-center">Historia Clinica</h4>
                                                            <div class="ga-border"></div>
                                                            <p class="text-muted text-center"><small>2021-12-09</small><br><small>14:22:05</small></p>
                                                            <div class="p-t-12 flex">
                                                                <!-- <button type="button" class="btn btn-info btn-sm w-sm waves-effect m-t-10 waves-light"><i class="fa fa-refresh"></i> Comenzar</button> -->
                                                                <!-- <button type="button" class="btn btn-success btn-sm w-sm waves-effect m-t-10 waves-light"><i class="fa fa-play"></i> Continuar</button>
                                                                        <button type="button" class="btn btn-primary btn-sm w-sm waves-effect m-t-10 waves-light"><i class="fa fa-print"></i> Imprimir</button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="" style="width:100%">
                                                    <div class="col-md-12" id="ocultarAnexar">
                                                        <select id="tipoHistoria2" name="tipoHistoria[]" class="form-control input-lg select2" multiple="multiple" style="width: 100%;">
                                                            <!-- ATENCION -->
                                                            <!-- NO CAMBIAR LAS POSICIONES -->
                                                            <!-- AÑADIR NUEVOS EN CONTINUIDAD -->
                                                        </select><br>
                                                        <button type="button" id="imprimirHistorias" style="border-radius: 0;" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" onclick="addHistoria({idCliente: <?= $idCliente ?>, procesarHistorias: $('#tipoHistoria2').val()})">Añadir Mas Paraclínicos <i class="fa fa-show"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="my-modal3" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-bold" id="my-modal-title">Paraclínicos</h4>
                                                <button class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="max-height: 550px; overflow: auto;">
                                                <div class="row" id="impParaClinicosFinalizado">
                                                    <!-- <div class="col-sm-4">
                                                        <div class="gal-detail thumb">
                                                            <a href="#" class="image-popup">
                                                                <i class="fa fa-book thumb-img text-primary flex tooltips" style="width: 100%; height: 120px; font-size: 60px;" data-placement="top" data-toggle="tooltip" data-original-title="Historia Clinica"></i> -->
                                                    <!-- <img src="https://via.placeholder.com/400x300/008B8B/00000" class="thumb-img" alt="work-thumbnail"> -->
                                                    <!-- </a>
                                                            <h4 class="text-center">Historia Clinica</h4>
                                                            <div class="ga-border"></div>
                                                            <p class="text-muted text-center"><small>2021-12-09</small><br><small>14:22:05</small></p>
                                                            <div class="p-t-12 flex"> -->
                                                    <!-- <button type="button" class="btn btn-info btn-sm w-sm waves-effect m-t-10 waves-light"><i class="fa fa-refresh"></i> Comenzar</button> -->
                                                    <!-- <button type="button" class="btn btn-success btn-sm w-sm waves-effect m-t-10 waves-light"><i class="fa fa-play"></i> Continuar</button>
                                                                        <button type="button" class="btn btn-primary btn-sm w-sm waves-effect m-t-10 waves-light"><i class="fa fa-print"></i> Imprimir</button> -->
                                                    <!-- </div>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- fin modal -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include("footer.php") ?>

<script type="text/javascript">
    var idCliente = <?= $idCliente ?>;
    var fotoPerfil = "<?= $fotoperfil ?>";
    var idDoctor = "<?= $_SESSION['ID'] ?>";
    const alertGlobal = (options) => {
        if (options.modo == 1) {
            Swal.fire({
                icon: options.icon,
                title: options.title,
                text: options.text
            })
        } else if (options.modo == 2) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: options.icon,
                title: options.title
            });
        } else if (options.modo == 3) {
            Swal.fire({
                title: options.title,
                text: options.text,
                icon: options.icon,
                showCancelButton: true,
                confirmButtonColor: options.colorConfirm,
                cancelButtonColor: options.colorCancel,
                confirmButtonText: options.confirmButtonText
            }).then((result) => {
                if (result.isConfirmed) {
                    if (options.href == false) {
                        respuesta = true;
                        switch (options.tarea) {
                            case 'remove':
                                addEmpresa(4);
                                break;
                            case 'alerta':
                                Swal.fire(
                                    options.title2,
                                    options.text2,
                                    options.icon2
                                );
                                break;
                            case 'continuar':
                                trueUnLock = 1;
                                Swal.fire(
                                    options.title2,
                                    options.text2,
                                    options.icon2
                                );
                                break;
                            default:
                                break;
                        }
                    } else {
                        window.location.href = options.href;
                    }
                }
                return respuesta;
            })
        }
    }

    window.addEventListener('load', function() {
        showHEnCurso({
            idCliente: <?= $idCliente ?>,
            proceso: <?= ($nrowlHistoria > 0 ? 0 : 1) ?> || 0
        });
    });

    const addHistoria = (data) => {
        data.idDoctor = idDoctor;
        data.key = "addHEnCurso";
        $.ajax({
            url: "SO_cargaDataHEnCurso.php",
            data: data,
            type: "POST",
            dataType: "json",
            success: function(response) {
                // console.log(response);
                // console.log("response");
                if (response.status == 1) {
                    alertGlobal({
                        modo: 2,
                        title: '¡ Historias Asignadas !',
                        icon: 'success'
                    });
                    $("#my-modal").modal('hide');
                    $("#procesoHistoria").click();
                    $("#generarHistorias").addClass('disabled');
                    showHEnCurso({
                        idCliente: <?= $idCliente ?>,
                        proceso: 0
                    });
                } else if (response.status == 3) {
                    alertGlobal({
                        modo: 2,
                        title: 'ATENCION: Algunas de las Historias se encuentran asignadas',
                        icon: 'warning'
                    });
                    $("#my-modal").modal('hide');
                    $("#generarHistorias").addClass('disabled');
                    showHEnCurso({
                        idCliente: <?= $idCliente ?>,
                        proceso: 0
                    });
                } else if (response.status == 4) {
                    alertGlobal({
                        modo: 2,
                        title: 'ATENCION: No puede procesar Para-Clinicos sin procesar la Historia Ocupacional.',
                        icon: 'info'
                    });
                    // $("#my-modal").modal('hide');
                    // $("#procesoHistoria").click();
                    // $("#generarHistorias").addClass('disabled');
                    // showHEnCurso({
                    //     idCliente: <?= $idCliente ?>,
                    //     proceso: 0
                    // });
                } else if (response.status == 0) {
                    $("#my-modal").modal('hide');
                    $("#procesoHistoria").click();
                    $("#generarHistorias").addClass('disabled');
                }
            }
        });
    };

    function printParaclinicos(id, el) {
        $.ajax({
            url: "SO_cargaDataHEnCurso.php",
            data: {
                idHistoricoControl: id,
                key: "imprimirParaclinicos"
            },
            method: "POST",
            dataType: "json",
            success: function(response) {
                console.log(response);
                if (response.status) {
                    let arrayColor = ['primary', 'success', 'danger', 'warning', 'info', 'dark'];
                    let imprimir2 = "";
                    response.data.forEach(element => {
                        let fecha = atob(element.updated_at).split(' ');
                        imprimir2 += `<div class="col-sm-4">
                            <div class="gal-detail thumb">
                                <a href="#" class="image-popup">
                                    <i class="fa fa-book thumb-img text-${arrayColor[Math.floor(Math.random() * ((arrayColor.length - 1) - 0)) + 0]}' flex tooltips" style="width: 100%; height: 120px; font-size: 60px;" data-placement="top" data-toggle="tooltip" data-tippy-content="${(element.nombreHistoria)}"></i>
                                </a>
                                <h4 class="text-center">${corregirCodificacion((element.nombreHistoria))}</h4>
                                <div class="ga-border"></div>
                                <p class="text-muted text-center"><small>${fecha[0]}</small><br><small>${fecha[1]}</small></p>
                                <div class="p-t-12 flex">
                                    <button type="button" class="btn btn-default btn-block w-sm waves-effect m-t-10 waves-light" title="Terminado" style="pointer-events: none; background: transparent !important; border: none"><i class="fa fa-${(atob(element.proceso) == 0 ? 'times' : 'check')} text-${(atob(element.proceso) == 0 ? 'danger' : 'success')}"></i></button>
                                </div>
                                <div class="p-t-12 flex">
                                    <button type="button" class="btn btn-success btn-block w-sm waves-effect m-t-10 waves-light text-bold disabled">Generado</button>
                                </div>
                            </div>
                        </div>`;
                    });
                    imprimir2 = (imprimir2 == "" ? "<h4 align='center'>NO DATA</h4>" : imprimir2);
                    $("#impParaClinicosFinalizado").html(imprimir2);
                    $("#my-modal3").modal('show');
                } else {
                    $(el).attr('disabled', true);
                }
            },
        });
    }

    function removeParaclinicos(data) {
        data.key = "removeParaclinicos";
        $.ajax({
            url: "SO_cargaDataHEnCurso.php",
            data: data,
            method: "POST",
            dataType: "json",
            success: function(response) {
                if (response.status == 1) {
                    alertGlobal({
                        modo: 2,
                        title: '¡ Historias Removidas !',
                        icon: 'success'
                    });
                    showHEnCurso({
                        idCliente: <?= $idCliente ?>,
                        proceso: 0
                    });
                } else if (response.status == 0) {
                    alertGlobal({
                        modo: 2,
                        title: 'ATENCION: Ha Ocurrido un Error al Remover el Procedimiento.',
                        icon: 'info'
                    });
                }
                // $("#my-modal2").modal('hide');
            },
        });
    }

    const showHEnCurso = (data) => {
        data.key = "cargaDataHEnCurso";
        $.ajax({
            url: "SO_cargaDataHEnCurso.php",
            data: data,
            type: "POST",
            dataType: "json",
            success: function(response) {
                console.log(response);
                var imprimir = '';
                var imprimir2 = '<h4 align="center">NO DATA</h4>';
                for (var num = 0; num < response.length; num++) {
                    var procedimiento2 = 0;
                    var procedimiento3 = 0;
                    var procedimiento4 = 0;
                    var procedimiento5 = 0;
                    var procedimiento6 = 0;
                    var procedimiento7 = 0;
                    var procedimiento8 = 0;
                    var procedimiento9 = 0;
                    var impProcedimiento = "";
                    imprimir2 = "";
                    for (var num2 = 0; num2 < response[num][1].length; num2++) {
                        // Array para color de fa-book de medicina
                        let arrayColor = ['primary', 'success', 'danger', 'warning', 'info', 'dark'];
                        // Arrays para rutas
                        let arrayRutas = [
                            'SO_historiaClinicaLaboral?clienteId=' + idCliente,
                            'certificadolaboral/' + atob(response[num][1][num2].idHistoria),
                            'firma/firmardocumento/' + atob(response[num][1][num2].idHistoria) + '/6/' + atob(response[num][1][num2].idDoctorHistoria),
                            `SO_HistoriaConceptoLaboral?clienteId=${idCliente}&id=${atob(response[num][0][1].certificado)}`,
                            `SO_Finalizado?historiaClinica1=${atob(response[num][0][1].certificado)}`,
                        ];
                        // Arrays para botones de comenzar|continuar|imprimir|firmar|certificado|finalizado
                        let arrayBtn = [
                            '<button type="button" onclick="window.location.href=' + "'" + arrayRutas[0] + "'" + '" class="btn btn-info btn-sm w-sm waves-effect m-t-10 waves-light"><i class="fa fa-refresh"></i> Comenzar</button>',
                            '<button type="button" onclick="window.location.href=' + "'" + arrayRutas[0] + '&edit=true' + "'" + '" class="btn btn-success btn-sm w-sm waves-effect m-t-10 waves-light"><i class="fa fa-play"></i> Continuar</button>',
                            '<button type="button" onclick="window.location.href=' + "'" + arrayRutas[1] + "'" + '" class="btn btn-primary btn-sm w-sm waves-effect m-t-10 waves-light" title="Imprimir"><i class="fa fa-print"></i></button>',
                            '<button type="button" onclick="window.open(' + "'" + arrayRutas[2] + "'" + ')" class="btn btn-info btn-sm w-sm waves-effect m-t-10 waves-light" title="Firmar"><i class="fa fa-pencil"></i></button>',
                            '<button type="button" onclick="window.location.href=' + "'" + arrayRutas[3] + "'" + '" class="btn btn-success btn-sm w-sm waves-effect m-t-10 waves-light" title="Generar Certificado"><i class="fa fa-play"></i></button>',
                            '<button type="button" onclick="window.location.href=' + "'" + arrayRutas[4] + "'" + '" class="btn btn-primary btn-sm w-sm waves-effect m-t-10 waves-light" title="Imprimir Certificado"><i class="fa fa-sticky-note-o"></i> </button> <button type="button" class="btn btn-danger btn-sm w-sm waves-effect m-t-10 waves-light" onclick="nuevoCertificado(' + atob(response[num][0][1].certificado) + ')" title="Editar Certificado"><i class="fa fa-pencil"></i> </button>',
                        ];
                        // Primer mensaje que indica que faltan procesos por realizar
                        var mensajeError = (response[num][0][0].controlProcess != 1 ? "Algunos Procedimiento no se completaron" : "");
                        // Esta condicion me permitira imprimir solo la historia principal
                        if (atob(response[num][1][num2].tipo) == 1) {
                            let fecha = atob(response[num][1][num2].updated_at).split(' ');
                            let fechaActual = '<?= Date("Y-m-d") ?>';
                            imprimir += '<div class="col-sm-4">';
                            imprimir += '    <div class="gal-detail thumb">';
                            imprimir += '        <a href="#" class="image-popup">';
                            imprimir += '            <i class="fa fa-book thumb-img text-' + arrayColor[Math.floor(Math.random() * ((arrayColor.length - 1) - 0)) + 0] + ' flex tooltips" style="width: 100%; height: 140px; font-size: 100px;" data-placement="top" data-toggle="tooltip" data-tippy-content="' + (response[num][1][num2].nombreHistoria) + '"></i>';
                            imprimir += '        </a>';
                            imprimir += '        <h4 class="text-center">' + corregirCodificacion((response[num][1][num2].nombreHistoria)) + '</h4>';
                            imprimir += '        <div class="ga-border"></div>';
                            imprimir += '        <p class="text-muted text-center text-bold"><small>' + (fecha[0] == fechaActual ? 'HOY' : fecha[0]) + '</small><br><small>' + fecha[1] + '</small></p>';
                            imprimir += '           <div class="p-t-12 flex" style="flex-flow: row wrap;">';
                            // Este array me permitira verificar si la imagen del paciente esta subida; 
                            // De lo contrario no podra imprimir
                            let arrayExtencion = fotoPerfil.split(".");
                            let extencionComprobar = ['jpg', 'jpeg', 'png', 'svg', 'webp']; // Extenciones para filtrar imagen
                            console.log(response[num][0][0].controlProcess); // controlProcess
                            if (response[num][0][0].controlProcess == 0) {
                                imprimir += arrayBtn[atob(response[num][1][num2].proceso)];
                            }
                            if (atob(response[num][1][num2].firma) != '1') {
                                // Condicion para verificar si el documento esta firmado
                                mensajeError += "\n El Documento aun no se ha Firmado";
                            }
                            if (extencionComprobar.indexOf(arrayExtencion[arrayExtencion.length - 1]) != -1) {
                                // Condicion para verificar si el documento esta firmado
                                if (atob(response[num][1][num2].firma) == '1') {
                                    imprimir += arrayBtn[atob(response[num][1][num2].proceso)];
                                }
                            } else {
                                mensajeError += "\n La Foto del Paciente no se ha Cargado";
                            }
                            if (mensajeError != "") {
                                imprimir += '           <button type="button" class="btn btn-default btn-sm w-sm waves-effect m-t-10 waves-light tooltips" style="display:flex;align-items:center;justify-content:center; background: transparent !important; border:none" data-placement="top" data-toggle="tooltip" ><span class="123" data-tippy-content="' + mensajeError + '" style="width:25px;height:25px;"> <i class="fa fa-info-circle text-danger" id="infoAnimado" ></i></span></button>';
                            }
                            imprimir += `           <button type="button" class="btn btn-warning btn-sm w-sm waves-effect m-t-10 waves-light" title="Para-Clinicos" ${response[num][0][0].controlProcess == 1 ? `onclick='printParaclinicos(${atob(response[num][1][num2].idControl)}, this)'` : 'data-toggle="modal" data-target="#my-modal2"'}><i class="fa fa-eye"></i></button>`;
                            // Condicion para solicitar firma en caso de no tener 
                            if (response[num][0][0].controlProcess == 1) {
                                if (atob(response[num][1][num2].firma) == '0') {
                                    imprimir += arrayBtn[3];
                                }
                            }
                            if (atob(response[num][0][1].procesoCertificado) == 1 && atob(response[num][0][1].certificado) > 0) {
                                imprimir += arrayBtn[5];
                            } else if (atob(response[num][0][1].procesoCertificado) == 0 && atob(response[num][0][1].certificado) > 0) {
                                imprimir += arrayBtn[4];
                            }
                            imprimir += '        </div>';
                            imprimir += '    </div>';
                            imprimir += '</div>';
                        }
                        if (atob(response[num][1][num2].tipo) != 1) {
                            let fecha = atob(response[num][1][num2].updated_at).split(' ');
                            imprimir2 += '<div class="col-sm-4">';
                            imprimir2 += '    <div class="gal-detail thumb">';
                            imprimir2 += '        <a href="#" class="image-popup">';
                            imprimir2 += '            <i class="fa fa-book thumb-img text-' + arrayColor[Math.floor(Math.random() * ((arrayColor.length - 1) - 0)) + 0] + ' flex tooltips" style="width: 100%; height: 120px; font-size: 60px;" data-placement="top" data-toggle="tooltip" data-tippy-content="' + (response[num][1][num2].nombreHistoria) + '"></i>';
                            imprimir2 += '        </a>';
                            imprimir2 += '        <h4 class="text-center">' + corregirCodificacion((response[num][1][num2].nombreHistoria)) + '</h4>';
                            imprimir2 += '        <div class="ga-border"></div>';
                            imprimir2 += '        <p class="text-muted text-center"><small>' + fecha[0] + '</small><br><small>' + fecha[1] + '</small></p>';
                            imprimir2 += '        <div class="p-t-12 flex">';
                            imprimir2 += '           <button type="button" class="btn btn-default btn-block w-sm waves-effect m-t-10 waves-light" title="Firmar" style="pointer-events: none; background: transparent !important; border: none"><i class="fa fa-' + (atob(response[num][1][num2].proceso) == 0 ? 'times' : 'check') + ' text-' + (atob(response[num][1][num2].proceso) == 0 ? 'danger' : 'success') + '"></i></button>';
                            imprimir2 += '        </div>';
                            if (response[num][0][0].controlProcess == 0 && atob(response[num][1][num2].proceso) == 0) {
                                imprimir2 += '        <div class="p-t-12 flex">';
                                imprimir2 += '           <button type="button" class="btn btn-danger btn-block w-sm waves-effect m-t-10 waves-light text-bold" title="Firmar" onclick="removeParaclinicos({idCliente: <?= $idCliente ?>, idHistoricoControl: ' + atob(response[num][1][num2].idHistoricoControl) + '})">Remover</button>';
                                imprimir2 += '        </div>';
                            } else {
                                imprimir2 += '        <div class="p-t-12 flex">';
                                imprimir2 += '           <button type="button" class="btn btn-success btn-block w-sm waves-effect m-t-10 waves-light text-bold disabled">Generado</button>';
                                imprimir2 += '        </div>';
                            }
                            imprimir2 += '    </div>';
                            imprimir2 += '</div>';
                        }
                        if (atob(response[num][1][num2].tipo) == 2) {
                            procedimiento2 = 1;
                        } else if (atob(response[num][1][num2].tipo) == 3) {
                            procedimiento3 = 1;
                        } else if (atob(response[num][1][num2].tipo) == 4) {
                            procedimiento4 = 1;
                        } else if (atob(response[num][1][num2].tipo) == 5) {
                            procedimiento5 = 1;
                        } else if (atob(response[num][1][num2].tipo) == 6) {
                            procedimiento6 = 1;
                        } else if (atob(response[num][1][num2].tipo) == 7) {
                            procedimiento7 = 1;
                        } else if (atob(response[num][1][num2].tipo) == 8) {
                            procedimiento8 = 1;
                        } else if (atob(response[num][1][num2].tipo) == 9) {
                            procedimiento9 = 1;
                        }
                    }
                    if (response[num][0][0].controlProcess == 0) {
                        impProcedimiento += '<option value="2" ' + (procedimiento2 == 1 ? 'disabled' : '') + '>Visiometría(Paraclínicos)</option>';
                        impProcedimiento += '<option value="3" ' + (procedimiento3 == 1 ? 'disabled' : '') + '>Audiometría(Paraclínicos)</option>';
                        impProcedimiento += '<option value="4" ' + (procedimiento4 == 1 ? 'disabled' : '') + '>Espirometría(Paraclínicos)</option>';
                        impProcedimiento += '<option value="5" ' + (procedimiento5 == 1 ? 'disabled' : '') + '>Optometría(Paraclínicos)</option>';
                        impProcedimiento += '<option value="6" ' + (procedimiento6 == 1 ? 'disabled' : '') + '>Electrocardiogrma(Paraclínicos)</option>';
                        impProcedimiento += '<option value="7" ' + (procedimiento7 == 1 ? 'disabled' : '') + '>Psicofísico(Paraclínicos)</option>';
                        impProcedimiento += '<option value="8" ' + (procedimiento8 == 1 ? 'disabled' : '') + '>Psicométrico(Paraclínicos)</option>';
                        impProcedimiento += '<option value="9" ' + (procedimiento9 == 1 ? 'disabled' : '') + '>Radiografía(Paraclínicos)</option>';
                    }
                }
                if (imprimir == "") {
                    imprimir = '<h4 align="center">NO DATA</h4>';
                }
                $("#tipoHistoria2").html(impProcedimiento || '<h4 align="center">NO DATA</h4>');
                $("#impHistorias").html(imprimir);
                $("#impParaClinicos").html(imprimir2);
                tippy('[data-tippy-content]');
            }
        });
    };
    const nuevoCertificado = (id) => {
        let data = {
            key: 'updateCertificado',
            id: id
        };
        $.ajax({
            url: './SO_SalaControl',
            type: 'POST',
            data: data,
            success: (response) => {
                if (response.status) {
                    window.location.href = `SO_HistoriaConceptoLaboral.php?clienteId=${response.cliente_id}&id=${id}&editar=1`;
                }
            }
        });
    };

    // Función para corregir la codificación de tildes
function corregirCodificacion(cadena) {
    try {
        // Decodificar la cadena utilizando decodeURIComponent
        return decodeURIComponent(cadena);
    } catch (error) {
        // Si la decodificación falla, simplemente devuelve la cadena original
        return cadena;
    }
}


</script>

<?php
$ArregloOptions="";
$queryList = mysqli_query($conn3, "SELECT * FROM  empresasAfiliadas WHERE estado='1'");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    //$contador++;
    $id = $rowMotorizado['id'];
    $nombreEmpresa = $rowMotorizado['nombreEmpresa'];

    if($id == $empresaAfilidad_id){
        $ArregloOptions.= "<option value='$id' selected>$nombreEmpresa</option>";
    }else{
        $ArregloOptions.= "<option value='$id'>$nombreEmpresa</option>";
    }
}
?>

<script>
    // Función para mostrar el SweetAlert2
    function mostrarSweetAlertDatosAdicionales() {
        Swal.fire({
            title: 'Ingrese la Información Requerida:',
            html: `<div id="ModalSweet" class="col-md-12" >
            <label>Seleccione Tipo de Examen:</label>
            <select id="select1" class="swal2-input select2" multiple style="width:100%" required>
                    <option value="">Seleccione una Opción</option>
                    <option value="Ingreso">Ingreso</option>
                    <option value="Periodico">Periodico</option>
                    <option value="Egreso">Egreso</option>
                    <option value="Post incapacidad">Post Incapacidad</option>
                    <option value="Reubicacion">Reubicacion</option>
                    <option value="Revisión de recomendaciones">Revisión de recomendaciones</option>
                </select>
                <label>Seleccione Empresa Afiliada:</label></br>
                <select id="select2" class="swal2-input select2" style="width:100%" required>
                <option value="">Seleccione una Opción</option>
                    <?=$ArregloOptions;?>
                </select>
            
            `,
            closeOnClickOutside: false,
            allowOutsideClick: () => false,
            focusConfirm: false,
            didOpen: function () {
        $("#swal2-html-container #select1").select2({
            dropdownParent: $('#swal2-html-container')
        });

        $("#swal2-html-container #select2").select2({
            dropdownParent: $('#swal2-html-container')
        });

    },
            preConfirm: () => {
                const select1 = Array.from(Swal.getPopup().querySelectorAll('#select1 option:checked')).map(option => option.value);
                const select2 = Swal.getPopup().querySelector('#select2').value;
                
                // Verificar si los campos están llenos
                if (select1.length === 0 || select2 === '') {
                    Swal.showValidationMessage('Por favor, complete todos los campos.');
                    return false;
                }

                // Realizar la solicitud AJAX aquí
                // Reemplaza esta parte con tu código AJAX
                // Ejemplo de solicitud AJAX ficticia
                return $.ajax({
                    url: 'SO_Ajax_SalaControl.php',
                    method: 'POST',
                    data: {
                        Tipo_Examen: select1,
                        Empresa_id: select2,
                        cliente_id: "<?=$idCliente;?>",
                        Tipo_Consulta: "Actualizar Empresa y Tipo Examen"
                    }
                });
            }
        }).then((result) => {
            //console.log(result.value.Respuesta);
            var RespuestaArreglo = JSON.parse(result.value);
            if (result.isConfirmed) {
            // Verificar la respuesta del AJAX
            switch (RespuestaArreglo.Respuesta) {
                case 1:
                    Swal.fire('Actualización exitosa', 'Los datos se han actualizado correctamente.', 'success');
                    window.location.reload();
                    break;
                case 2:
                    Swal.fire('No se actualizaron los datos', 'Los datos son los mismos.', 'info');
                    window.location.reload();
                    break;
                case 3:
                    Swal.fire('Error', 'No se pudo actualizar la información.', 'error');
                    window.location.reload();
                    break;
                default:
                    Swal.fire('Respuesta desconocida', 'La respuesta del servidor no se reconoce.', 'warning');
                    window.location.reload();
            }
        }
        });

        $('#select1').select2({
            dropdownParent: $('#ModalSweet')
        });

    }

    // Evento DOMContentLoaded para ejecutar la función al iniciar la página
    <?php 
    if($tiposExamen=="" && ($empresaAfilidad_id=="0" || $empresaAfilidad_id=="")):
    ?>
    document.addEventListener('DOMContentLoaded', mostrarSweetAlertDatosAdicionales);
    <?php
    endif;  
    ?>
</script>
<style>
    .swal2-html-container{
        z-index:2;
    }
</style>

<script src="https://unpkg.com/popper.js@1"></script>
<script src="https://unpkg.com/tippy.js@5"></script>

<script>
tippy('[data-tippy-content]');
</script>

