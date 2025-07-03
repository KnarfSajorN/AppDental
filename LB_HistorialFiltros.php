<?php
include 'header.php';
include 'menu.php';

$usuario_id = $_SESSION['ID'];
$examen_id = $_GET["Examen"];
$categoria_id = $_GET["Categoria"];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Filtros del Examen [<?php echo funcionMaster($examen_id, 'id', 'Nombre', 'LB_Examen'); ?>] </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="content">
                <h4 class="Titulo_Pagina"> <a href='<?php echo "{$Base}LB_CrearExamenes.php?Categoria={$categoria_id}"; ?>'> <i class="fa-solid fa-right-from-bracket fa-rotate-180"></i></a>&nbsp;&nbsp;Filtros del Examen [<?php echo funcionMaster($examen_id, 'id', 'Nombre', 'LB_Examen'); ?>] </h4>
                <div class="box">
                    <div class="box-body">

                        <?php
                        echo "<font color='#04CC05'> <a href='LB_CrearExamenesFiltros.php?Categoria={$categoria_id}&ExamenRaiz={$examen_id}' class='btn btn-primary' style='width: 100%;'><i class='fa fa-pencil' title='Añadir Mas Filtros'> Añadir Mas Filtros </i></a></font>";
                        ?>
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <h2 style="text-align: center;font-weight: bold;"> Filtros del Examen [<?php echo funcionMaster($examen_id, 'id', 'Nombre', 'LB_Examen') ?>]</h2>
                                        <table id="example3" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Filtro</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Unidades de Referencia</th>
                                                    <th scope="col">Valores de Referencia</th>
                                                    <th scope="col">Filtro Edad</th>
                                                    <th scope="col">Precio</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $queryList = mysqli_query($conn3, "SELECT * FROM  LB_Examen WHERE examen_relacionado_id = '$examen_id' AND Activo='1' ");
                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    //$contador++;
                                                    $id = $rowMotorizado['id'];
                                                    $Nombre_Filtro = $rowMotorizado['Nombre_Filtro'];
                                                    $Nombre = $rowMotorizado['Nombre'];
                                                    $Unidades_Referencia = $rowMotorizado['Unidades_Referencia'];
                                                    $Valores_Referencia = $rowMotorizado['Valores_Referencia'];

                                                    if ($rowMotorizado['Filtro_Edad'] == "Si") {
                                                        $Edad = $rowMotorizado['Edad_Minima'] . " - ";
                                                        $Edad .= $rowMotorizado['Edad_Maxima'];
                                                    }

                                                    if ($rowMotorizado['Filtro_Valores_Referencia'] == "Numerico") {
                                                        $Filtro_Valores = "Rango Numerico entre : [ " . $rowMotorizado['Valor_Referencia_Minima'] . " - ";
                                                        $Filtro_Valores .= $rowMotorizado['Valor_Referencia_Maxima'] . " ]";
                                                    }

                                                    if ($rowMotorizado['Filtro_Valores_Referencia'] == "Texto") {
                                                        $Filtro_Valores = "Rango Texto de : [ " . $rowMotorizado['Valor_Referencia_Minima'] . " O ";
                                                        $Filtro_Valores .= $rowMotorizado['Valor_Referencia_Maxima'] . " ]";
                                                    }

                                                    $Precio = $rowMotorizado['Precio'];

                                                    $ruta = htmlentities($_SERVER['PHP_SELF']);
                                                    echo "<tr width='2%'><th scope='row'>{$id}</th>
                                                    <td width='20%' align='center'>{$Nombre_Filtro}</td>
                                                    <td width='5%' align='center'>{$Nombre}</td>
                                                    <td width='20%' align='center'>{$Unidades_Referencia}</td>
                                                    <td width='10%' align='center'>{$Valores_Referencia}</td>
                                                    <td width='20%' align='center'>{$Edad}</td>
                                                    <td width='10%' align='center'>{$Precio}</td>
                                                    <td width='20%' align='center'><font color='#04CC05'> <a href='LB_CrearExamenesFiltros.php?Categoria={$categoria_id}&Editar={$id}&ExamenRaiz={$examen_id}' class='btn btn-primary' style='width: 200px;'><i class='fa fa-pencil' title='Editar'> Editar</i></a></font><br>
                                                        <font> <a href='LB_CrearExamenesFiltros.php?Categoria={$categoria_id}&Eliminar={$id}&ExamenRaiz={$examen_id}' class='btn btn-primary' style='width: 200px;background-color:#ef4259;margin-top:5px;margin-bottom:5px'> <i class='fa fa-close' title='Eliminar'> Eliminar</i></a></font>
                                                        <font> <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#Modal_Caracteristicas' onclick='TablaCaracteristicas({$id})' style='width: 200px;background-color:#43ab61;margin-top:5px;margin-bottom:5px'> <i class='fa fa-sticky-note' title='Agregar Caracteristicas'> Ver Caracteristicas </i> </button></font>
                                                    </td></tr>";
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<?php
include 'footer.php';
?>

<div class="modal fade bd-example-modal-lg" id="Modal_Caracteristicas" role="dialog" aria-labelledby="ModalRips" aria-hidden="true">
    <div class="modal-dialog modal-lg-k" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="statusMsg"></p>
                <h5 class="modal-title" id="exampleModalLabel" style="font-size: 25px;text-align-last: center;">Caracteristicas del Examen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div style="width:100%">

                            <button type="button" class="btn btn-primary" id="addbutton" title="Add"><span class="fa fa-plus-square"></span> &nbsp;&nbsp; Agregar</button>
                            <hr style="margin-top: 5px!important;margin-bottom: 5px!important;">
                            <table cellpadding="0" cellspacing="0" border="0" class="dataTable table table-striped" id="example" style="width:100%">

                            </table>

                        </div>

                    </div>
                </div>

                <input type="hidden" id="examen_id_tabla">

            </div>
            <div class="modal-footer" style="text-align: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Modal_Filtro_Valores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1051!important;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filtro Caracteristicas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="CrearVentanaExterna">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="CargarInformacionVentanaExterna()">Guardar Datos</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    /* para ver imagenes en el select
    <select id="js-example-templating">
        <option value='hola' data-image='prueba'>hola</option>
    </select>
    $(document).ready(function() {
        $("#js-example-templating").select2({
            templateResult: formatState,
            templateSelection: formatState
        });
    });


    function formatState(opt) {
        if (!opt.id) {
            return opt.text.toUpperCase();
        }

        var optimage = $(opt.element).attr('data-image');
        console.log(optimage)
        if (!optimage) {
            return opt.text.toUpperCase();
        } else {
            var $opt = $(
                '<span><img src="' + optimage + '" width="60px" /> ' + opt.text.toUpperCase() + '</span>'
            );
            return $opt;
        }
    };
    */
</script>

<script src="plugins/DataEditor/dataTables.altEditor.free.js"></script>

<script type="text/javascript">
    function TablaFiltros(id, Nombre) {

        var columnDefs1 = [{
                data: "id_Filtro",
                title: "id_Filtro",
                type: "readonly",
                value: "0"
            }, {
                data: "Nombre",
                title: "Nombre",
                type: "text"
            },
            {
                title: "Tipo Filtro",
                id: "Tipo_Filtro",
                data: "Tipo_Filtro",
                type: "select",
                "options": [
                    "Numerico",
                    "Texto"
                ]
            },
            {
                title: "Valor Minimo",
                id: "Valor_Referencia_Minima",
                data: "Valor_Referencia_Minima",
                type: "number",
            },
            {
                title: "Valor Maximo",
                id: "Valor_Referencia_Maxima",
                data: "Valor_Referencia_Maxima",
                type: "number"
            },
            {
                title: "Color Correcto",
                id: "Color_Correcto",
                data: "Color_Correcto",
                type: "color"
            }
        ];

        var myTable;

        myTable = $('#' + Nombre).DataTable({
            "sPaginationType": "full_numbers",
            ajax: {
                url: "LB_Ajax_Caracteristicas.php?FiltroValores=" + id,
                dataSrc: ''
            },
            columns: columnDefs1,
            dom: 'Bfrtip', // Needs button container
            select: {
                style: 'single',
                toggleable: false
            },
            responsive: true,
            altEditor: true, // Enable altEditor
            buttons: [{
                    text: 'Add',
                    name: 'add', // do not change name
                    className: 'CrearFiltro',
                },
                {
                    extend: 'selected', // Bind to Selected row
                    text: 'Edit',
                    name: 'edit' // do not change name
                },
                {
                    extend: 'selected', // Bind to Selected row
                    text: 'Delete',
                    name: 'delete' // do not change name
                }
            ],
            onAddRow: function(datatable, rowdata, success, error) {
                success(rowdata);

                var Datos = JSON.parse(document.getElementById("Valores_Referencia_Filtrado").value);
                Datos.push(rowdata);
                var jsonFinal = JSON.stringify(Datos);
                document.getElementById('Valores_Referencia_Filtrado').value = jsonFinal;
            },
            onDeleteRow: function(datatable, rowdata, success, error) {
                success(rowdata);

                var Datos = JSON.parse(document.getElementById("Valores_Referencia_Filtrado").value);
                Datos[rowdata.id_Filtro] = null;
                var jsonFinal = JSON.stringify(Datos);
                document.getElementById('Valores_Referencia_Filtrado').value = jsonFinal;

            },
            onEditRow: function(datatable, rowdata, success, error) {
                success(rowdata);

                var Datos = JSON.parse(document.getElementById("Valores_Referencia_Filtrado").value);
                Datos[rowdata.id_Filtro] = rowdata;
                var jsonFinal = JSON.stringify(combined);
                document.getElementById('Valores_Referencia_Filtrado').value = jsonFinal;

            }
        });

        $('.CrearFiltro').on('click', function() {
            FuncionesSelects_Historia();
        });

        function FuncionesSelects_Historia() {
            document.getElementById('Tipo_Filtro').required = true;
            document.getElementById('Valor_Referencia_Minima').required = true;
            document.getElementById('Valor_Referencia_Maxima').required = true;
            document.getElementById('Color_Correcto').required = true;

            var Datos = JSON.parse(document.getElementById("Valores_Referencia_Filtrado").value);
            var largo = Datos.length;
            document.getElementById('id_Filtro').value = largo;


            var Valores_Referencia = document.getElementById('Tipo_Filtro');
            Valores_Referencia.onchange = function() {

                var Resultado1 = document.getElementById('Tipo_Filtro').value;

                if (Resultado1 == "Numerico") {
                    document.getElementById('Valor_Referencia_Minima').type = "number";
                    document.getElementById('Valor_Referencia_Maxima').type = "number";

                    document.getElementById('Valor_Referencia_Minima').placeholder = "Valor Minimo";
                    document.getElementById('Valor_Referencia_Maxima').placeholder = "Valor Maximo";

                    document.getElementById('Valor_Referencia_Minima').value = "";
                    document.getElementById('Valor_Referencia_Maxima').value = "";
                } else if (Resultado1 == "Texto") {
                    document.getElementById('Valor_Referencia_Minima').type = "text";
                    document.getElementById('Valor_Referencia_Maxima').type = "text";

                    document.getElementById('Valor_Referencia_Minima').placeholder = "Valor Incorrecto";
                    document.getElementById('Valor_Referencia_Maxima').placeholder = "Valor Correcto";

                    document.getElementById('Valor_Referencia_Minima').value = "";
                    document.getElementById('Valor_Referencia_Maxima').value = "";
                }
            };
        }
    }

    <?php if (!isset($_GET['Editar'])) : ?>
        TablaFiltros(0, "TablaFiltroValores");
    <?php endif; ?>
</script>


<!--  /////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!--  /////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!--  /////////////////////////////////////////////////////////////////////////////////////////////////////// -->


<script type="text/javascript">
    function TablaCaracteristicas(valor) {

        var columnDefs = [{
                data: "id",
                title: "id",
                type: "readonly",
                render: function(data, type, row, meta) {
                    return '<a class="editbutton fa fa-pencil btn btn-info" href="#"> Editar ' + data + ' </a>';
                },
            },
            {
                data: "Nombre_Caracteristica",
                title: "Nombre de la Caracteristica",
                type: "text"
            },
            {
                title: "Campo de Resultado",
                id: "Campo_Resultado",
                data: "Campo_Resultado",
                type: "select",
                "options": [
                    "Numerico",
                    "Texto",
                    "Lista"
                ]
            },
            {
                data: "Valores_Campo_Resultado",
                title: "Valores Campo Resultado",
                type: "readonly"
            },
            {
                data: "Unidades_Referencia",
                title: "Unidades de Referencia",
                type: "text"
            },
            {
                title: "Filtro Personalizados",
                id: "Filtro_Personalizado",
                data: "Filtro_Personalizado",
                type: "readonly"
            },
            {
                data: "Valores_Referencia_Caracteristica",
                title: "Valores de Referencia de la Caracteristica",
                type: "textarea"
            },
            {
                data: null,
                title: "Actions",
                name: "Actions",
                render: function(data, type, row, meta) {
                    return '<a class="delbutton fa fa-minus-square btn btn-danger" href="#"></a>';
                },
                disabled: true
            }
        ];

        var Tabla_Examenes;

        if ($.fn.dataTable.isDataTable('#example')) {
            $('#example').DataTable().destroy();
        }

        document.getElementById("examen_id_tabla").value = valor; //aqui se almacena que id examen es para agregarle la caracteristica al examen correspondiente

        Tabla_Examenes = $('#example').DataTable({
            "sPaginationType": "full_numbers",
            //data: dataSet,
            ajax: {
                url: "LB_Ajax_Caracteristicas.php?idExamen=" + valor,
                // our data is an array of objects, in the root node instead of /data node, so we need 'dataSrc' parameter
                dataSrc: ''
            },
            columns: columnDefs,
            dom: 'Bfrtip', // Needs button container
            select: {
                style: 'single',
                toggleable: false
            },
            responsive: true,
            altEditor: true, // Enable altEditor
            buttons: [{
                text: 'Refrescar',
                className: 'btn btn-primary Refrescar',
                action: function(e, dt, node, config) {
                    window.location.reload(true);
                }
            }, {
                text: 'Borrar Todos los Datos',
                className: 'btn btn-danger Borrar',
                action: function(e, dt, node, config) {
                    window.location = 'LB_Ajax_Caracteristicas.php?BorrarTodo=' + valor;
                }
            }], // no buttons, however this seems compulsory
            onAddRow: function(datatable, rowdata, success, error) {
                $.ajax({

                    url: "LB_Ajax_Caracteristicas.php",
                    type: 'POST',
                    data: {
                        rowdata: rowdata,
                        Tipo: "Add",
                        Examen: document.getElementById("examen_id_tabla").value
                    },
                    success: success,
                    error: error,
                });
                //console.log(rowdata);
            },
            onDeleteRow: function(datatable, rowdata, success, error) {
                $.ajax({

                    url: "LB_Ajax_Caracteristicas.php",
                    type: 'POST',
                    data: {
                        rowdata: rowdata,
                        Tipo: "Delete",
                        Examen: document.getElementById("examen_id_tabla").value
                    },
                    success: success,
                    error: error
                });
                //console.log(success);
            },
            onEditRow: function(datatable, rowdata, success, error) {
                $.ajax({

                    url: "LB_Ajax_Caracteristicas.php",
                    type: 'POST',
                    data: {
                        rowdata: rowdata,
                        Tipo: "Edit",
                        Examen: document.getElementById("examen_id_tabla").value
                    },
                    //data: rowdata,
                    success: success,
                    error: error
                });
                //console.log(rowdata);
            }
        });

        // Edit
        $(document).on('click', "[id='example'] .editbutton ", 'tr', function() {
            var tableID = $(this).closest('table').attr('id'); // id of the table
            var that = $('#' + tableID)[0].altEditor;
            that._openEditModal();
            $('#altEditor-edit-form-' + that.random_id)
                .off('submit')
                .on('submit', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    that._editRowData();
                });


            FuncionesSelects_ModalExamen(that.random_id, "altEditor-edit-form-");
            FuncionesSelects_ModalExamenCarga();
        });

        // Delete
        $(document).on('click', "[id='example'] .delbutton", 'tr', function(x) {
            var tableID = $(this).closest('table').attr('id'); // id of the table
            var that = $('#' + tableID)[0].altEditor;
            that._openDeleteModal();
            $('#altEditor-delete-form-' + that.random_id)
                .off('submit')
                .on('submit', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    that._deleteRow();
                });
            x.stopPropagation(); //avoid open "Edit" dialog
        });

        // Add row
        $('#addbutton').on('click', function() {
            var that = $('#example')[0].altEditor;
            that._openAddModal();
            $('#altEditor-add-form-' + that.random_id)
                .off('submit')
                .on('submit', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    that._addRowData();
                });

            FuncionesSelects_ModalExamen(that.random_id, "altEditor-add-form-");
        });

    }

    var Modal = "";

    function FuncionesSelects_ModalExamen(valor, tipo) {

        Modal = document.querySelector("#" + tipo + valor + "> .modal-content > .modal-body ");

        var Valores_Referencia = Modal.querySelector("#alteditor-row-Campo_Resultado > div > #Campo_Resultado");
        Valores_Referencia.onchange = function() {
            if (Valores_Referencia.value == "Lista") {
                var div = document.createElement('div');
                div.id = "AgregarFunciones1234";
                div.innerHTML = "<hr><input type='text' class='form-control'><button type='button' class='btn-success' onclick='FuncionAgregarOpciones(this)'>+ Agregar</button> <button type='button'class='btn-danger' onclick='FuncionQuitarOpciones()'>- Limpiar  </button>";

                Valores_Referencia.insertAdjacentElement("afterend", div);
            } else {
                if (document.getElementById("AgregarFunciones1234") != null) {
                    document.getElementById("AgregarFunciones1234").remove();
                }
                var Valores_Campo_Resultado = Modal.querySelector("#alteditor-row-Valores_Campo_Resultado > div > #Valores_Campo_Resultado");
                Valores_Campo_Resultado.value = "";
            }
        }
        var DivBotonPersonalizado = document.createElement('div');
        DivBotonPersonalizado.innerHTML = "<br><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#Modal_Filtro_Valores' id='Modal_Filtro_Valores_Boton' style='width:100%'> Agregar Valores de Referencia </button>";
        Modal.querySelector("#alteditor-row-Unidades_Referencia > div > #Unidades_Referencia").insertAdjacentElement("afterend", DivBotonPersonalizado);
        Modal.querySelector('#Modal_Filtro_Valores_Boton').onclick = function() {

            document.getElementById("CrearVentanaExterna").innerHTML = "<iframe id='myFrame' class='test' src='<?php echo $Base; ?>LB_VentanaEmergenteTablaFiltros.php' min-height='980px' height='680px' width='100%' frameborder='none'></iframe>";
            var ValorActual = Modal.querySelector("#alteditor-row-Filtro_Personalizado > div > #Filtro_Personalizado").value;

            frame = document.querySelector('html iframe[id=myFrame]');
            if (tipo == "altEditor-add-form-") {
                ValorActual = "Crear";
            }

            setTimeout(function() {
                frame.contentWindow.postMessage(ValorActual, "*");
            }, 3000);
        }
        Valores_Referencia.onchange();
    }

    function FuncionAgregarOpciones(valor) {
        var input = valor.previousElementSibling.value;
        var Valores_Campo_Resultado = Modal.querySelector("#alteditor-row-Valores_Campo_Resultado > div > #Valores_Campo_Resultado");
        if (Valores_Campo_Resultado.value != "") {
            var Arreglo = JSON.parse(Valores_Campo_Resultado.value);
        } else {
            var Arreglo = [];
        }

        Arreglo.push(input);
        Valores_Campo_Resultado.value = JSON.stringify(Arreglo);
    }

    function FuncionQuitarOpciones() {

        var Valores_Campo_Resultado1 = Modal.querySelector("#alteditor-row-Valores_Campo_Resultado > div > #Valores_Campo_Resultado");
        Valores_Campo_Resultado1.value = "";
    }

    function FuncionesSelects_ModalExamenCarga() {
        var Valores_Campo_Resultado2 = Modal.querySelector("#alteditor-row-Valores_Campo_Resultado > div > #Valores_Campo_Resultado");
        var text = Valores_Campo_Resultado2.value;
        text = text.replace(/&quot;/g, '"');
        Valores_Campo_Resultado2.value = text;
    }

    function CargarInformacionVentanaExterna() {

        var Valores_Referencia = Modal.querySelector("#alteditor-row-Filtro_Personalizado > div > #Filtro_Personalizado");
        Valores_Referencia.value = $('iframe[id=myFrame]').contents().find('#Valores_Referencia_Filtrado_Pagina_Externa').val();

    }

    /*
    $('#Modal_Filtro_Valores_Boton').on('click', function() {
        TablaFiltros("0", "TablaFiltroValores_Caracteristicas");
    });
    */
</script>
<style>
    .Refrescar {
        background-color: #3c8dbc !important;
        border-color: #367fa9 !important;
        color: white !important;
    }

    .Borrar {
        background-color: #ed6060 !important;
        border-color: #a93636 !important;
        color: white !important;
    }

    button.dt-button:focus:not(.disabled),
    div.dt-button:focus:not(.disabled),
    a.dt-button:focus:not(.disabled),
    input.dt-button:focus:not(.disabled) {
        border: 1px solid #0074ff;
        text-shadow: 0 1px 0 #c4def1;
        outline: none;
        background-color: #79ace9;
        background: -webkit-linear-gradient(top, #d1e2f7 0%, #79ace9 100%);
        background: -moz-linear-gradient(top, #d1e2f7 0%, #79ace9 100%);
        background: -ms-linear-gradient(top, #d1e2f7 0%, #79ace9 100%);
        background: -o-linear-gradient(top, #d1e2f7 0%, #79ace9 100%);
        background: linear-gradient(to bottom, #468fb9 0%, #3780aa00 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, StartColorStr="#d1e2f7", EndColorStr="#79ace9");
    }

    #example>tbody>tr>td:nth-child(6) {
        overflow-y: scroll;
        min-width: 100px;
        max-width: 200px;
    }

    #example>tbody>tr>td:nth-child(8) {
        text-align-last: center;
    }

    #example>tbody>tr>td:nth-child(1) {
        text-align-last: center;
    }

    #example>tbody>tr>td:nth-child(7) {
        overflow-y: scroll;
        min-width: 200px;
        max-width: 400px;
    }

    .modal {
        padding-right: 0 !important;
    }

    <?php
    $width = ["767", "1000", "1400", "2600"];
    $cal = ["96", "90", "70", "75"];
    foreach ($width as $key => $value) {
        echo "
        @media only screen and (min-device-width : {$value}px) and (max-device-width : {$width[$key + 1]}px) {
            .modal-lg-k {
                width: {$cal[$key]}%;
            }
        }";
    }

    ?>
</style>

<script src="plugins/CkeditorK/ckeditor.js"></script>