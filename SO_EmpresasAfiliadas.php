<?php
include 'header.php';
include 'menu.php';
$ID = $_SESSION['ID'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <style type="text/css">
        .btn-outline-primar {
            color: #007bff;
            border-color: #007bff
        }

        .btn-outline-primar:hover {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff
        }

        .btn-outline-primar.focus,
        .btn-outline-primar:focus {
            box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5)
        }

        .btn-outline-primar.disabled,
        .btn-outline-primar:disabled {
            color: #007bff;
            background-color: transparent
        }

        .btn-outline-primar:not(:disabled):not(.disabled).active,
        .btn-outline-primar:not(:disabled):not(.disabled):active,
        .show>.btn-outline-primar.dropdown-toggle {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff
        }

        .btn-outline-primar:not(:disabled):not(.disabled).active:focus,
        .btn-outline-primar:not(:disabled):not(.disabled):active:focus,
        .show>.btn-outline-primar.dropdown-toggle:focus {
            box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5)
        }

        .swal2-popup {
            font-size: 1.4rem;
        }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>

            <li class="active"> Empresas Afiliadas </li>
        </ol>
    </section>

    <section class="content">
    <div class="box">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Registro de Empresas Afiliadas</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12" align="right">
                <button type="button" name="addEmpresa" id="addEmpresa" class="btn  btn-outline-info btn-lg rounded-pill shadow active" onclick="addEmpresa()" style="border-bottom-right-radius: 0; border-top-right-radius: 0;"> <i class="fa fa-plus"></i> Añadir Empresa</button>
                <button type="button" name="editEmpresa" id="editEmpresa" class="btn  btn-outline-secondary btn-lg rounded-pill shadow disabled" onclick="addEmpresa(3)" style="border-bottom-left-radius: 0; border-top-left-radius: 0;"> <i class="fa fa-refresh"></i> Editar Datos</button>
            </div>
        </div>
        <hr>
        <div class="row">

            <div class="col-md-3">
                <label for="nombreEmpresa">Nombre de la Empresa <span class="text-danger">*</span></label>
                <input type="text" id="nombreEmpresa" name="nombreEmpresa" class="form-control input-lg" required>
                <input type="hidden" name="idEmpresa" id="idEmpresa">
            </div>

            <div class="col-md-3">
                <label for="rutcc">RUT/CC</label>
                <input type="text" id="rutcc" name="rutcc" class="form-control input-lg">
            </div>

            <div class="col-md-3">
                <label for="nit">NIT <span class="text-danger">*</span></label>
                <input type="text" id="nit" name="nit" placeholder="XXX.XXX.XXX-Y" class="form-control input-lg">
            </div>

            <div class="col-md-3">
                <label for="razonSocial">Razón social</label>
                <input type="text" id="razonSocial" name="razonSocial" class="form-control input-lg">
            </div>

            <div class="col-md-3">
                <label for="direccionEmpresa">Dirección</label>
                <input type="text" id="direccionEmpresa" name="direccionEmpresa" class="form-control input-lg">
            </div>

            <div class="col-md-3">
                <label for="ciudadEmpresa">Ciudad</label>
                <input type="text" id="ciudadEmpresa" name="ciudadEmpresa" class="form-control input-lg">
            </div>

            <div class="col-md-3">
                <label for="telefonoEmpresa">Teléfono</label>
                <input type="number" id="telefonoEmpresa" name="telefonoEmpresa" class="form-control input-lg">
            </div>

            <div class="col-md-3">
                <label for="nombreContactoEmpresa">Nombre de Contacto <span class="text-danger">*</span></label>
                <input type="text" id="nombreContactoEmpresa" name="nombreContactoEmpresa" class="form-control input-lg" required>
            </div>

            <div class="col-md-4">
                <label for="telefonoContactoEmpresa">Teléfono de Contacto <span class="text-danger">*</span></label>
                <input type="number" id="telefonoContactoEmpresa" name="telefonoContactoEmpresa" class="form-control input-lg" required>
            </div>

            <div class="col-md-4">
                <label for="correoContactoEmpresa">Correo Electrónico de Contacto <span class="text-danger">*</span></label>
                <input type="email" id="correoContactoEmpresa" name="correoContactoEmpresa" class="form-control input-lg" required>
            </div>

            <div class="col-md-4">
                <label for="conoceProfesiograma">Se Conoce Profesiograma <span class="text-danger">*</span></label>
                <select class="form-control select2" name="conoceProfesiograma" id="conoceProfesiograma" required>
                    <option value="0" selected>No</option>
                    <option value="1">Si</option>
                </select>
            </div>

        </div>

        <hr>
        <div class="row">
            <div class="col-md-12">
                <table class="table" id="examples1">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 3%;">#</th>
                            <th class="text-center" style="width: 20%;">Nombre de la Empresa</th>
                            <th class="text-center" style="width: 15%;">Nombre de Contacto</th>
                            <th class="text-center" style="width: 15%;">Teléfono de Contacto</th>
                            <th class="text-center" style="width: 18%;">Correo de Contacto</th>
                            <th class="text-center" style="width: 17%;">¿Conoce Profesiograma?</th>
                            <th class="text-center" style="width: 12%;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="imp">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
</div>
</section>
<!-- /.content-wrapper -->
<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-bold text-center">
                        <p>Fecha y Hora Registrado <br><span id="fechaHora"></span></p>
                    </div>
                    <hr>
                    <div class="col-md-6 text-bold">
                        <p>RUT/CC: <span id="impRutCC"></span></p>
                    </div>
                    <div class="col-md-6 text-bold">
                        <p>NIT: <span id="impNit"></span></p>
                    </div>
                    <div class="col-md-6 text-bold">
                        <p>Razón Social: <span id="impRazonSolcial"></span></p>
                    </div>
                    <div class="col-md-6 text-bold">
                        <p>Dirección: <span id="impDir"></span></p>
                    </div>
                    <div class="col-md-6 text-bold">
                        <p>Ciudad: <span id="impCiudad"></span></p>
                    </div>
                    <div class="col-md-6 text-bold">
                        <p>Teléfono Empresa: <span id="impTelfEmpresa"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>
<script type="text/javascript">
    var tableCache = [];
    var posicion = "";

    function setSpinnerLoader(options) {
        const component =
            '<tr>' +
            '  <td colspan="6" class="text-center visually-hidden text-' + options.color + '"><i class="fa fa-refresh fa-spin fa-2x fa-fw"></i></td>' +
            '</tr>';
        $("#" + options.container).html(component);
    }

    const redireccionar = (name, idTabla) => {
        window.open('configFormularioNew.php?Nombre_table=' + name + '&Tabla=' + idTabla);
    }

    const cambioBtn = (indice) => {
        $("#" + (indice == 1 ? 'addEmpresa' : 'editEmpresa')).removeClass("btn-outline-primar active").addClass("disabled");
        $("#" + (indice == 1 ? 'editEmpresa' : 'addEmpresa')).addClass("btn-outline-primar active").removeClass("disabled");
    }

    const editEmpresas = (objectNum) => {
        let select = '<option value="0" selected>No</option>' +
            '<option value="1">Si</option>';


        if ($('#editDatos' + objectNum).hasClass("fa-edit") && objectNum != "clear") {


            if (posicion != "" || posicion == 0 && objectNum != posicion) {
                $("#editDatos" + posicion).removeClass("fa-times text-danger").addClass("fa-edit text-success");
            }

            posicion = objectNum;
            // document.getElementById('editDatos' + objectNum).setAttribute('onclick', 'cambioBtn(2)');
            $("#editDatos" + objectNum).removeClass("fa-edit text-success").addClass("fa-times text-danger");
            cambioBtn(1);
            $("#nombreEmpresa").val(atob(tableCache[objectNum].nombreEmpresa));
            $("#rutcc").val(atob(tableCache[objectNum].rutcc));
            $("#nit").val(atob(tableCache[objectNum].nit));
            $("#razonSocial").val(atob(tableCache[objectNum].razonSocial));
            $("#direccionEmpresa").val(atob(tableCache[objectNum].direccionEmpresa));
            $("#ciudadEmpresa").val(atob(tableCache[objectNum].ciudadEmpresa));
            $("#telefonoEmpresa").val(atob(tableCache[objectNum].telefonoEmpresa));
            $("#nombreContactoEmpresa").val(atob(tableCache[objectNum].nombreContactoEmpresa));
            $("#telefonoContactoEmpresa").val(atob(tableCache[objectNum].telefonoContactoEmpresa));
            $("#correoContactoEmpresa").val(atob(tableCache[objectNum].correoContactoEmpresa));
            select = '<option value="0" ' + (atob(tableCache[objectNum].conoceProfesiograma) == 0 ? 'selected' : '') + '>No</option>' +
                '<option value="1" ' + (atob(tableCache[objectNum].conoceProfesiograma) == 1 ? 'selected' : '') + '>Si</option>';
            $("#conoceProfesiograma").html(select);
            $("#idEmpresa").val(atob(tableCache[objectNum].id));
        } else {

            if (objectNum != "" || objectNum == 0 || objectNum != "clear") {
                // document.getElementById('editDatos' + objectNum).setAttribute('onclick', 'cambioBtn(1)');
                $("#editDatos" + objectNum).removeClass("fa-times text-danger").addClass("fa-edit text-success");
                cambioBtn(2);
            }
            $("#nombreEmpresa").val('');
            $("#rutcc").val('');
            $("#nit").val('');
            $("#razonSocial").val('');
            $("#direccionEmpresa").val('');
            $("#ciudadEmpresa").val('');
            $("#telefonoEmpresa").val('');
            $("#nombreContactoEmpresa").val('');
            $("#telefonoContactoEmpresa").val('');
            $("#correoContactoEmpresa").val('');
            $("#conoceProfesiograma").html(select);
            $("#idEmpresa").val('');
            posicion = "";
        }
    }

    const removeEmpresa = (indice) => {
        alertGlobal({
            modo: 3,
            title: 'Remover Empresa',
            text: '¿ Comprende que los Datos Removidos no pueden ser Recuperados ?',
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Remover',
            href: false,
            title2: '¡Procesado!',
            text2: 'Empresa ' + atob(tableCache[indice].nombreEmpresa) + ' Removida con Exito',
            icon2: 'success',
            tarea: 'remove'
        });
        $("#idEmpresa").val(atob(tableCache[indice].id));
    }

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

    function CalcularDv() {
        var vpri;
        var x;
        var y;
        var z;
        var i;
        var nit1;
        var dv1;
        nit1 = $("#nit").val();
        nit1 = nit1.replace(/\s/g, ""); // Espacios
        nit1 = nit1.replace(/,/g, ""); // Comas
        nit1 = nit1.replace(/\./g, ""); // Puntos
        // nit1 = nit1.replace(/-/g, ""); // Guiones
        let position = nit1.indexOf("-");
        if (position) {
            nit1 = nit1.split("-");
            let indice = nit1.length - 1;
            nit1.splice(indice, 1);
            let nit2 = "";
            for (let num = 0; num < nit1.length; num++) {
                nit2 += nit1[num];
            }
            // console.log(nit2);
            let residuo = nit1[nit1.length - 1];
            nit1 = nit2;
            // console.log(nit1);
            // console.log(typeof(nit1));
        }
        if (isNaN(nit1) || nit1.length < 8) {
            // console.log("No es un Numero o La longitud del NIT no es la correcta");
        } else {
            vpri = new Array(16);
            x = 0;
            y = 0;
            z = nit1.length;
            vpri[1] = 3;
            vpri[2] = 7;
            vpri[3] = 13;
            vpri[4] = 17;
            vpri[5] = 19;
            vpri[6] = 23;
            vpri[7] = 29;
            vpri[8] = 37;
            vpri[9] = 41;
            vpri[10] = 43;
            vpri[11] = 47;
            vpri[12] = 53;
            vpri[13] = 59;
            vpri[14] = 67;
            vpri[15] = 71;
            for (i = 0; i < z; i++) {
                y = (nit1.substr(i, 1));
                // console.log(y + "x" + vpri[z - i] + ":");
                x += (y * vpri[z - i]);
                // console.log(x);
            }
            y = x % 11
            // console.log(y);
            if (y > 1) {
                dv1 = 11 - y;
            } else {
                dv1 = y;
            }
            return dv1;
        }
    }

    const viewInfo = (indice) => {
        $("#impRutCC").html(atob(tableCache[indice].rutcc) || "N/A");
        $("#impNit").html(atob(tableCache[indice].nit) || "N/A");
        $("#impRazonSolcial").html(atob(tableCache[indice].razonSocial) || "N/A");
        $("#impDir").html(atob(tableCache[indice].direccionEmpresa) || "N/A");
        $("#impCiudad").html(atob(tableCache[indice].ciudadEmpresa) || "N/A");
        $("#impTelfEmpresa").html(atob(tableCache[indice].telefonoEmpresa) || "N/A");
        $("#fechaHora").html(atob(tableCache[indice].created_at) || "N/A");
    }

    const addEmpresa = (pase = "") => {
        let arrayCampos = ['nombreEmpresa', 'nombreContactoEmpresa', 'telefonoContactoEmpresa', 'correoContactoEmpresa', 'conoceProfesiograma'];
        let arrayNameCampos = ['Nombre de la Empresa', 'Nombre de Contacto', 'Teléfono de Contacto', 'Correo Electrónico de Contacto', 'Se conoce profesiograma'];
        let acum = 0;
        let imprimirCampos = "";
        while (acum < arrayCampos.length) {
            if ($("#" + arrayCampos[acum]).val() == "") {
                imprimirCampos += "[" + arrayNameCampos[acum] + "] ";
            }
            acum++;
        }
        if (imprimirCampos != "" && (pase == "" || pase == 3)) {
            alertGlobal({
                modo: 1,
                icon: 'error',
                title: '¡ Campos Obligatorios !',
                text: 'Por favor Rellenar los Campos ' + imprimirCampos
            });
        } else {
            let comprobarEmail = $("#correoContactoEmpresa").val();
            let emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            if (emailRegex.test(comprobarEmail) || (pase != "" && pase != 3)) {
                let verificaNit2 = $("#nit").val();
                let position = verificaNit2.indexOf("-");
                if (position) {
                    verificaNit2 = verificaNit2.split("-");
                    // console.log(verificaNit2);
                    verificaNit2 = verificaNit2[verificaNit2.length - 1];
                    // console.log(verificaNit2);
                }
                // console.log(verificaNit2 + " Esto es el numero de comparacion");
                // console.log(CalcularDv() + " Este es el valor retornado");
                if (CalcularDv() == verificaNit2 || (pase != "" && pase != 3) || verificaNit2 == "") {
                    let date = {};
                    date.id = <?= $ID ?>;
                    date.nombreEmpresa = $("#nombreEmpresa").val() || "";
                    date.rutcc = $("#rutcc").val() || "";
                    date.nit = $("#nit").val() || "";
                    date.razonSocial = $("#razonSocial").val() || "";
                    date.direccionEmpresa = $("#direccionEmpresa").val() || "";
                    date.ciudadEmpresa = $("#ciudadEmpresa").val() || "";
                    date.telefonoEmpresa = $("#telefonoEmpresa").val() || "";
                    date.nombreContactoEmpresa = $("#nombreContactoEmpresa").val() || "";
                    date.telefonoContactoEmpresa = $("#telefonoContactoEmpresa").val() || "";
                    date.correoContactoEmpresa = $("#correoContactoEmpresa").val() || "";
                    date.conoceProfesiograma = $("#conoceProfesiograma").val() || "";
                    if (pase != "" && pase != 3 && pase != 4) {
                        date.key = 'cargarDatos';
                    } else if (pase == 3) {
                        date.idEmpresa = $("#idEmpresa").val();
                        date.key = 'updateEmpresa';
                    } else if (pase == 4) {
                        date.idEmpresa = $("#idEmpresa").val();
                        date.key = 'removeEmpresa';
                    } else {
                        date.key = 'insertEmpresa';
                    }
                    // console.log(date);
                    $.ajax({
                        url: "guardarEmpresaAfiliada.php",
                        data: date,
                        type: "POST",
                        beforeSend: function() {
                            setSpinnerLoader({
                                container: "imp",
                                color: "primary",
                            });
                        },
                        dataType: "json",
                        success: function(resp) {
                            // console.log(resp);
                            var imprimir = '<tr role="row" class="odd">' +
                                '  <td class="sorting_1">N/A</td>' +
                                '  <td>NO DATA</td>' +
                                '  <td>NO DATA</td>' +
                                '  <td>NO DATA</td>' +
                                '  <td>NO DATA</td>' +
                                '  <td>NO DATA</td>' +
                                '  <td>NO DATA</td>' +
                                '</tr>';

                            if (resp == 1) {
                                alertGlobal({
                                    modo: 1,
                                    icon: 'info',
                                    title: 'Lo sentimos',
                                    text: 'El RUTCC ' + date.rutcc + ' o el NIT ' + date.nit + ' ya se encuentran registrados.'
                                });
                            }

                            if (date.key == "updateEmpresa") {
                                editEmpresas("");
                                alertGlobal({
                                    modo: 2,
                                    icon: 'success',
                                    title: '¡ Datos Actualizados Correctamente !'
                                });
                            }

                            if (date.key == "removeEmpresa") {
                                editEmpresas("");
                                alertGlobal({
                                    modo: 2,
                                    icon: 'success',
                                    title: '¡ Empresa Removida !'
                                });
                            }

                            if (date.key == "insertEmpresa") {
                                alertGlobal({
                                    modo: 2,
                                    icon: 'success',
                                    title: '¡ Datos Añadidos Correctamente !'
                                });
                            }

                            if (resp) {
                                if (resp != 1) {
                                    tableCache = resp;
                                } else {
                                    resp = tableCache;
                                }

                                imprimir = '';
                                for (let num = 0; num < resp.length; num++) {   
                                    imprimir += '<tr role="row" class="odd">' +
                                        '  <td class="text-center" class="sorting_1">' + (num + 1) + '</td>' +
                                        '  <td class="text-center">' + atob(resp[num].nombreEmpresa) + '</td>' +
                                        '  <td class="text-center">' + atob(resp[num].nombreContactoEmpresa) + '</td>' +
                                        '  <td class="text-center">' + atob(resp[num].telefonoContactoEmpresa) + '</td>' +
                                        '  <td class="text-center">' + atob(resp[num].correoContactoEmpresa) + '</td>' +
                                        '  <td class="text-center">' + (atob(resp[num].conoceProfesiograma) == 0 ? 'NO' : 'SI') + '</td>' +
                                        '  <td>' +
                                        '  <div class="col-md-12" style="font-size: 20px; display: flex; justify-content:space-evenly; align-items:center;">' +
                                        '  <a href="#" onclick="editEmpresas(' + num + ')" title="Editar Empresa"><i class="fa fa-edit text-success" id="editDatos' + num + '"></i></a>' +
                                        '  <a href="#" onclick="removeEmpresa(' + num + ')" title="Remover Empresa"><i class="fa fa-trash text-danger"></i></a>' +
                                        '  <a href="#" onclick="viewInfo(' + num + ')" data-toggle="modal" data-target="#my-modal" title="Ver Informacion"><i class="fa fa-eye text-primary"></i></a>' +
                                        '  <a href="#" onclick="window.open(' + "'SO_EmpresaAfiliarServicios?empresaAfiliada_id=" + atob(resp[num].id) + "'" + ')" title="Afiliar Servicios"><i class="fa fa-user-md text-info"></i></a>' +
                                        '  <a href="#" onclick="window.open(' + "'SO_EnviarCredencialesEmpresa.php?key=" + atob(resp[num].id) + "&usuario_id=<?=$_SESSION['ID'];?>'" + ')" title="Enviar credenciales al Correo de la Empresa"><i class="fa fa-send text-success"></i></a>' +
                                        '  </div>' +
                                        '  </td>' +
                                        '</tr>';
                                }
                            }
                            editEmpresas("clear");

                            if (typeof table !== 'undefined') {
                            // Borrar la tabla solo si está definida
                            table.clear().draw();
                            table = $("#examples1").dataTable().fnDestroy(); // Destruyo
                            }
                            
                            $("#imp").html(imprimir); // Imprimi los datos en el body
                            table = $("#examples1").DataTable({ // Creo la tabla nuevamente
                                responsive: true,
                                responsivePriority: 1,
                                dom: 'Bfrtip',
                                buttons: [{
                                    extend: 'collection',
                                    text: '<i class="fa fa-cog" aria-hidden="true"></i>',
                                    className: 'btn btn-primary',
                                    buttons: [{
                                            extend: 'print',
                                            text: 'Imprimir',
                                            title: 'Pacientes',
                                            exportOptions: {
                                                columns: ':visible'
                                            }
                                        },
                                        {
                                            extend: 'copy',
                                            text: 'Copiar',
                                            title: 'Pacientes',
                                            exportOptions: {
                                                columns: ':visible'
                                            }
                                        },
                                        {
                                            extend: 'excel',
                                            text: 'Excel',
                                            title: 'Pacientes',
                                            exportOptions: {
                                                columns: ':visible'
                                            }
                                        },
                                        {
                                            extend: 'csv',
                                            text: 'CSV',
                                            title: 'Pacientes',
                                            exportOptions: {
                                                columns: ':visible'
                                            }
                                        },
                                        {
                                            extend: 'pdf',
                                            text: 'PDF',
                                            title: 'Pacientes',
                                            exportOptions: {
                                                columns: ':visible'
                                            }
                                        },
                                        {
                                            extend: 'pageLength'
                                        },
                                        {
                                            extend: 'colvis',
                                            text: 'Modificar Columnas'
                                        }
                                    ]
                                }],
                                language: {
                                    "decimal": "",
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Entradas",
                                    "loadingRecords": "Cargando...",
                                    "processing": "Procesando...",
                                    "search": "Buscar:",
                                    "zeroRecords": "Sin resultados encontrados",
                                    "paginate": {
                                        "first": "Primero",
                                        "last": "Ultimo",
                                        "next": "Siguiente",
                                        "previous": "Anterior"
                                    }
                                },
                            });

                        },
                    });
                } else {
                    alertGlobal({
                        modo: 2,
                        icon: 'error',
                        title: '¡ Atencion el NIT suministrado es invalido !'
                    });
                }
            } else {
                alertGlobal({
                    modo: 2,
                    icon: 'error',
                    title: 'Correo Electronico Incorrecto!'
                });
            }
        }
    }
    window.addEventListener('load', () => {
        addEmpresa(1);
    });
</script>