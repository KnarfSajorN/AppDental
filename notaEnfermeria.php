<?php
include 'header.php';
include 'menu.php';

$cliente_id = base64_decode($_GET['clienteId']);

$queryList = mysqli_query($conn3, "SELECT * FROM cliente where cliente_id = $cliente_id");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $nameCliente = $rowMotorizado['nombre_cliente'];
    }
}

if ($_POST['key'] == 'editNotaE') {
    $notaEnf = strval($_POST['notaEnfermeria']);
    $idNE = $_POST['idNE'];
    $idusuario = $_SESSION['ID'];

    $query = "UPDATE NotaEnfermeria SET notaEnfermeria = $notaEnf WHERE id = $idNE";
    $enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $enlace_actual = str_replace('.php', '', $enlace_actual);

    auditorMaster($idusuario, '1', $enlace_actual, $query);

    mysqli_query($conn3, "UPDATE NotaEnfermeria SET notaEnfermeria = '$notaEnf' WHERE id = $idNE");
    // $newArray = $_POST['key'] . " " . $_POST['notaEnfermeria'] . " " . $_POST['idCitas'];
    // $clienteid = $_POST['idCliente'];
    return true;
}
if ($_POST['key'] == 'insertNotaE') {
    $idCliente = $_POST['idCliente'];
    $idDoctor = $_POST['idDoctor'];
    $idusuario = $_POST['idDoctor'];
    $notaEnf = strval($_POST['notaEnfermeria']);
    $query = "INSERT INTO NotaEnfermeria SET idCliente = $idCliente, idDoctor = $idDoctor, notaEnfermeria = $notaEnf);";
    $enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $enlace_actual = str_replace('.php', '', $enlace_actual);

    auditorMaster($idusuario, '1', $enlace_actual, $query);

    mysqli_query($conn3, "INSERT INTO NotaEnfermeria SET idCliente = '$idCliente', idDoctor = '$idDoctor', notaEnfermeria = '$notaEnf'");
    // $newArray = $_POST['key'] . " " . $_POST['notaEnfermeria'] . " " . $_POST['idCitas'];
    // $clienteid = $_POST['idCliente'];
    return true;
}
if ($_GET['key'] == 'close') {
    $idNota = base64_decode($_GET['id']);
    $clienteId = base64_decode($_GET['clienteId']);
    $idusuario = $_SESSION['ID'];

    $query = "UPDATE NotaEnfermeria SET estado = 0 WHERE id = $idNota";
    $enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $enlace_actual = str_replace('.php', '', $enlace_actual);

    auditorMaster($idusuario, '1', $enlace_actual, $query);

    mysqli_query($conn3, "UPDATE NotaEnfermeria SET estado = 0 WHERE id = $idNota");
    echo "<script type='text/javascript'>window.location.replace('notaEnfermeria.php?clienteId=" . base64_encode($clienteId) . "');</script>";
}
?>

<style type="text/css">
    .select2-container .select2-selection--single {
        height: 47px !important;
        padding: 15px !important;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #3c8dbc;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Paciente: <?= $nameCliente ?> </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Notas de Enfermeria </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <style type="text/css">
                            a:hover,
                            a:focus {
                                text-decoration: none;
                                outline: none;
                            }

                            #accordion {
                                padding-right: 24px;
                                padding-left: 24px;
                                z-index: 1;
                            }

                            #accordion .panel {
                                border: none;
                                box-shadow: none;
                            }

                            #accordion .panel-heading {
                                padding: 0;
                                border-radius: 0;
                                border: none;
                            }

                            #accordion .panel-title {
                                padding: 0;
                            }

                            #accordion .panel-title a {
                                display: block;
                                font-size: 16px;
                                font-weight: bold;
                                background: #3c8dbc;
                                color: white;
                                padding: 15px 25px;
                                position: relative;
                                margin-left: -24px;
                                transition: all 0.3s ease 0s;
                            }

                            #accordion .panel-title a.collapsed {
                                background: #3c8dbc87;
                                color: #ffffff;
                                margin-left: 0;
                                transition: all 0.3s ease 0s;
                            }

                            #accordion .panel-title a:before {
                                content: "";
                                border-left: 24px solid #3c8dbcf7;
                                border-top: 24px solid transparent;
                                border-bottom: 24px solid transparent;
                                position: absolute;
                                top: 0;
                                right: -24px;
                                transition: all 0.3s ease 0s;
                            }

                            #accordion .panel-title a.collapsed:before {
                                border-left-color: #93bed7d6;
                            }

                            #accordion .panel-title a:after {
                                /*content: "\f106";*/
                                content: "▼";
                                font-family: "Font Awesome 5 Free";
                                font-weight: 900;
                                position: absolute;
                                top: 30%;
                                right: 15px;
                                font-size: 18px;
                                color: white;
                            }

                            #accordion .panel-title a.collapsed:after {
                                /*content: "\f107";*/
                                content: "►";
                                color: white;
                            }

                            #accordion .panel-collapse {
                                position: relative;
                                top: -8px;
                            }

                            #accordion .panel-collapse.in:before {
                                content: "";
                                border-right: 24px solid #3c8dbccf;
                                border-bottom: 18px solid transparent;
                                position: absolute;
                                top: 0;
                                left: -24px;
                            }

                            #accordion .panel-body {
                                font-size: 14px;
                                color: #333;
                                background: #e4e4e4;
                                border-top: none;
                                z-index: 1;
                                padding: 20px;
                            }

                            /* //////////////////////// */
                            .form-check-input {
                                width: 18px;
                                height: 18px;
                                color: red;
                                border: 1px solid gray;
                            }

                            /* /////////////////// */
                            .swal-wide {
                                font-size: 17px;
                            }
                        </style>

                        <div class="">
                            <div class="row" style="position: relative; font-size: 20px;">
                                <div class="col-md-4">
                                    <i class="fa fa-plus btn btn-outline-info rounded-pill"
                                        onclick="cargarInfo('0', 'insert')" data-target="#modalForm5"
                                        data-toggle="modal" title="Agregar Notas" style="z-index: 100;width:100%">
                                        Agregar Nota</i>
                                </div>
                                <div class="col-md-4" style="display:flex; justify-content:space-evenly;">
                                    <?php if (!$_GET['event']): ?>
                                        <i class="fa fa-check-square btn btn-outline-info rounded-pill" target="_blank"
                                            onclick="window.location = 'notaEnfermeria.php?clienteId='+btoa(<?= $cliente_id ?>)+'&event=true'"
                                            title="Seleccionar Para Enviar/Imprimir" style="width:100%"> Seleccionar</i>
                                    <?php endif; ?>
                                    <?php if ($_GET['event']): ?>
                                        <i class="fa fa-caret-left btn btn-outline-danger rounded-pill"
                                            onclick="window.location = 'notaEnfermeria.php?clienteId='+btoa(<?= $cliente_id ?>)"
                                            title="Retroceder"></i>
                                        <i class="fa fa-paper-plane btn btn-outline-info rounded-pill"
                                            onclick="eventoNotaEnfermeria('enviar','<?= base64_encode($cliente_id) ?>','<?= base64_encode($_SESSION['ID']) ?>')"
                                            title="Enviar"> Enviar</i>
                                        <i class="fa fa-print btn btn-outline-info rounded-pill"
                                            onclick="eventoNotaEnfermeria('imprimir','<?= base64_encode($cliente_id) ?>','<?= base64_encode($_SESSION['ID']) ?>')"
                                            title="Imprimir"> Imprimir</i>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-4" style="display:flex; justify-content:space-evenly;">
                                    <div class="col-md-4 text-center"><i class="fa fa-edit text-black" title="Edotar">
                                            Editar</i></div>
                                    <div class="col-md-4 text-center"><i class="fa fa-times text-danger" title="Cerrar">
                                            Cerrar</i></div>
                                    <div class="col-md-4 text-center"><i class="fa fa-check text-success"
                                            title="Cerrado"> Cerrado</i></div>

                                    <!-- <div class="col-md-3 text-center"><i class="fa fa-check text-success"> Asistio</i></div>
                  <div class="col-md-3 text-center"><i class="fa fa-times text-danger"> No Asisitio</i></div> -->
                                </div>
                                <div class="col-md-12" style="display:flex; justify-content:space-evenly;">
                                    <h2 style="position: relative;"><b>Notas de Enfermería</b></h2>
                                </div>
                                <div class="col-md-12">
                                    <?php if ($_GET['event']): ?>
                                        <div class="row">
                                            <span class="col-md-2" style="float: right; font-size: 20px"><b><span
                                                        id="contador">0</span> Nota/s</b></span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <?php
                                        $queryList = mysqli_query($conn3, "SELECT * FROM NotaEnfermeria where idCliente = $cliente_id AND (estado = 1 OR estado = 0) ORDER BY created_at DESC");
                                        //$nrowl = mysqli_num_rows($queryList);
                                        $lista = 1;
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                            $idNotaEnfermeria = $rowMotorizado['id'];
                                            $id = $rowMotorizado['id'];
                                            $dateRegistro = $rowMotorizado['created_at'];
                                            $dateEditado = $rowMotorizado['updated_at'];
                                            $usuario_id = $rowMotorizado['idDoctor'];
                                            $nombre_usuario = funcionMaster($usuario_id, 'ID', 'NOMBRE_USUARIO', 'usuarios');
                                            $notaEnfermeria = $rowMotorizado['notaEnfermeria'];
                                            $estado = $rowMotorizado['estado'];
                                            $dateRegistro = explode(" ", $dateRegistro);
                                            $dateEditado = explode(" ", $dateEditado);
                                            ?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                    <h4 class="panel-title">
                                                        <?php if ($_GET['event']): ?>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox"
                                                                    onchange="cargarId(<?= $idNotaEnfermeria ?>)"
                                                                    class="form-check-input" name="select<?= $lista ?>"
                                                                    id="select<?= $lista ?>">
                                                                <label class="form-check-label"
                                                                    for="select<?= $lista ?>"></label>
                                                            </div>
                                                        <?php endif; ?>
                                                        <a class="collapsed" role="button" data-toggle="collapse"
                                                            data-parent="#accordion"
                                                            href="#Diagnostico<?php echo $idNotaEnfermeria ?>"
                                                            aria-expanded="false" aria-controls="collapseTwo">
                                                            <div class="row">
                                                                <div class="col-md-5"><?php echo $lista; ?> - Nota de
                                                                    Enfermería - realizada por Dr/a
                                                                    <?php echo $nombre_usuario; ?>
                                                                </div>
                                                                <div class="col-md-3" align="left">Registrado:
                                                                    <?php echo $dateRegistro[0]; ?>
                                                                </div>
                                                                <div class="col-md-3">Modificado:
                                                                    <?php echo $dateEditado[0]; ?>
                                                                </div>
                                                                <div class="col-md-1"
                                                                    style="z-index: 100; display:flex; justify-content:space-evenly;">
                                                                    <?php if ($estado == 1): ?>
                                                                        <i onclick="cargarInfo(<?= $lista ?>)"
                                                                            data-target="#modalForm4" data-toggle="modal"
                                                                            title="Agregar Nota" class="fa fa-edit text-black"
                                                                            style="z-index: 100;"></i>
                                                                        <i onclick="window.location = 'notaEnfermeria.php?clienteId='+btoa(<?= $cliente_id ?>)+'&id='+btoa(<?= $idNotaEnfermeria ?>)+'&key=close'"
                                                                            class="fa fa-times text-danger" title="Cerrar Nota"
                                                                            style="z-index: 100;"></i>
                                                                    <?php endif; ?>
                                                                    <?php if ($estado == 0): ?>
                                                                        <i class="fa fa-check text-success" title="Cerrado"
                                                                            style="z-index: 100;"></i>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="Diagnostico<?php echo $idNotaEnfermeria ?>"
                                                    class="panel-collapse collapse" role="tabpanel"
                                                    aria-labelledby="headingTwo">
                                                    <div class="panel-body">
                                                        <p class='text-dark'
                                                            style='word-wrap: break-word; font-weight: bold;'>
                                                            <?= nl2br($notaEnfermeria); ?>
                                                        </p>

                                                        <input type="hidden" id="editNotaE<?= $lista ?>"
                                                            name="editNotaE<?= $lista ?>" value="<?= $notaEnfermeria ?>">
                                                        <input type="hidden" id="idCliente<?= $lista ?>"
                                                            name="idCliente<?= $lista ?>" value="<?= $cliente_id ?>">
                                                        <input type="hidden" id="id<?= $lista ?>" name="id<?= $lista ?>"
                                                            value="<?= $idNotaEnfermeria ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $lista++;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

    </section>

</div>


<div class="modal fade" id="modalForm4" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <h4 class="modal-title" id="myModalLabel"><b>Editar Nota de Enfermeria</b></h4>
                <p class="statusMsg"></p>
                <div class="form-group">
                    <textarea id="notaEnfermeria" class="incapacidad_modal"
                        style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;"
                        data-title="Nota"></textarea>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <a onclick="editNotaE('edit', false, false)" class="btn btn-default"> <i
                        class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalForm5" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <h4 class="modal-title" id="myModalLabel"><b>Agregar Nota de Enfermeria</b></h4>
                <p class="statusMsg"></p>
                <div class="form-group">
                    <textarea id="addNotaEnfermeria" class="incapacidad_modal"
                        style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;"
                        data-title="Nota"></textarea>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <a onclick="editNotaE('insert',<?= $cliente_id ?>,<?= $_SESSION['ID'] ?>)" class="btn btn-default"> <i
                        class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
<?php include ("footer.php") ?>

<script type="text/javascript">
    ClassicEditor
        .create(document.querySelector('#DiagnosticoMedico'))
        .catch(error => {
            console.error(error);
        });


    var idCliente = '';
    var idNE = '';
    var idArray = [];

    function cargarId(id) {
        var unLock = false;
        const contador = document.querySelector("#contador");
        if (idArray.length <= 0) {
            idArray[0] = id;
        } else {
            var num = 0;
            while (num < idArray.length) {
                if (idArray[num] == id) {
                    idArray.splice(num, 1);
                    unLock = false;
                    break;
                } else {
                    unLock = true;
                }
                num++;
            }
            if (unLock == true) {
                idArray[idArray.length] = id;
            }
        }
        console.log(idArray.sort());
        contador.innerHTML = idArray.length;
    }

    function eventoNotaEnfermeria(event, idClientes, idUser) {
        if (idArray.length > 0) {
            if (event == 'imprimir') {
                window.open('imprimirNotaEnfermeria.php?clienteId=' + idClientes + '&idu=' + idUser + '&idsNotas=' + btoa(
                    idArray));
            } else if (event == 'enviar') {
                window.location = 'enviarNotaEnfermeria.php?clienteId=' + idClientes + '&idu=' + idUser + '&idsNotas=' +
                    btoa(idArray);
            }
        } else {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                customClass: 'swal-wide',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'info',
                title: '¡Por Favor Seleccionar Notas!'
            })
        }
    }

    function cargarInfo(indice) {
        let btnNotaE = document.getElementById("editNotaE" + indice).value;
        document.getElementById("notaEnfermeria").value = btnNotaE;
        idCliente = document.getElementById("idCliente" + indice).value;
        idNE = document.getElementById("id" + indice).value;
    }

    function editNotaE(evento, idClientes, idDoctor) {
        if (evento == 'insert') {
            idCliente = idClientes;
            let notaEn = document.getElementById("addNotaEnfermeria").value;
            date = {
                idNE: idNE,
                idCliente: idClientes,
                idDoctor: idDoctor,
                notaEnfermeria: notaEn,
                key: 'insertNotaE'
            };
        } else {
            let notaEn = document.getElementById("notaEnfermeria").value;
            date = {
                idNE: idNE,
                notaEnfermeria: notaEn,
                key: 'editNotaE'
            };
        }

        $.ajax({
            url: "notaEnfermeria.php",
            data: date,
            type: "POST",
            success: function (resp) {
                console.log(resp);
                if (resp != 0) {
                    window.location = 'notaEnfermeria.php?clienteId=' + btoa(idCliente);
                }
            }
        });
    }
</script>