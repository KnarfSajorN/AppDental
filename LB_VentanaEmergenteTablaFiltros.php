<?php

?>

<div class="form-group col-md-12" style="text-align-last: center;">
    <div class="box-body">
        <label style="font-size:20px">Filtro Valores de Referencia</label>
        <table cellpadding="0" cellspacing="0" border="0" class="dataTable table table-striped" id="TablaFiltroValores" style="width:100%">
        </table>
        <input type="hidden" name="Valores_Referencia_Filtrado_Pagina_Externa" id="Valores_Referencia_Filtrado_Pagina_Externa" value='[]'>
    </div>
</div>

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="plugins/DataTablesK2/datatables.css" />
<link rel="stylesheet" href="plugins/FontAwesomeK Free 6.0/css/all.css">

<script type="text/javascript" src="plugins/DataTablesK2/datatables.js"></script>

<script src="plugins/DataEditor/dataTables.altEditor.free.js"></script>

<script type="text/javascript">
    function TablaFiltros_VentanaExterna(id, Nombre, Valor) {

        var dataSet = JSON.parse(Valor);
        //console.log(dataSet)

        var columnDefs1 = [{
                data: "id_Filtro",
                title: "id_Filtro",
                type: "readonly",
                value: "0",
                /*
                render: function(data, type, row, meta) {
                    return data + '<a class="editbutton fa fa-pencil btn btn-info" href="#"> Editar </a>';
                }
                */
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
                type: "number"
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
            },
            {
                title: "Tipo Edad",
                id: "Tipo_Edad",
                data: "Tipo_Edad",
                type: "select",
                "options": [
                    "No Aplica",
                    "Dias",
                    "Meses",
                    "Anual"
                ]
            },
            {
                title: "Edad Minima",
                id: "Edad_Minima",
                data: "Edad_Minima",
                type: "range"
            },
            {
                title: "Edad Maxima",
                id: "Edad_Maxima",
                data: "Edad_Maxima",
                type: "range"
            },
            {
                title: "Sexo",
                id: "Sexo",
                data: "Sexo",
                type: "select",
                "options": [
                    "No Aplica",
                    "Masculino",
                    "Femenino"
                ]
            },
            {
                data: null,
                title: "Actions",
                name: "Actions",
                render: function(data, type, row, meta) {
                    return '<a class="editbutton fa fa-pencil btn btn-info" href="#"> Editar </a><br><a class="delbutton fa fa-minus-square btn btn-danger" href="#"> Borrar </a>';
                },
                disabled: true
            }
        ];

        var myTable;

        myTable = $('#' + Nombre).DataTable({
            "sPaginationType": "full_numbers",
            data: dataSet,
            columns: columnDefs1,
            columnDefs: [{
                "type": "html-num",
                "targets": 0
            }],
            dom: 'Bfrtip', // Needs button container
            select: {
                style: 'single',
                toggleable: false
            },
            responsive: true,
            altEditor: true, // Enable altEditor
            buttons: [{
                text: 'Agregar',
                className: 'btn btn-primary Boton_Agregar_Ventana'
            }],
            onAddRow: function(datatable, rowdata, success, error) {
                success(rowdata);

                var Datos = JSON.parse(document.getElementById("Valores_Referencia_Filtrado_Pagina_Externa").value);
                Datos.push(rowdata);
                var jsonFinal = JSON.stringify(Datos);
                document.getElementById('Valores_Referencia_Filtrado_Pagina_Externa').value = jsonFinal;
                //console.log(jsonFinal);
            },
            onDeleteRow: function(datatable, rowdata, success, error) {
                success(rowdata);

                var Datos = JSON.parse(document.getElementById("Valores_Referencia_Filtrado_Pagina_Externa").value);
                Datos[rowdata.id_Filtro] = null;
                var jsonFinal = JSON.stringify(Datos);
                document.getElementById('Valores_Referencia_Filtrado_Pagina_Externa').value = jsonFinal;

            },
            onEditRow: function(datatable, rowdata, success, error) {
                success(rowdata);

                var Datos = JSON.parse(document.getElementById("Valores_Referencia_Filtrado_Pagina_Externa").value);
                console.log(rowdata);
                Datos[rowdata.id_Filtro] = rowdata;
                var jsonFinal = JSON.stringify(Datos);
                document.getElementById('Valores_Referencia_Filtrado_Pagina_Externa').value = jsonFinal;
                console.log(jsonFinal);
            }
        });

        // Edit
        $(document).on('click', "[id='TablaFiltroValores'] .editbutton ", 'tr', function() {
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

            FuncionesSelects_Historia("Editar");
        });

        // Delete
        $(document).on('click', "[id='TablaFiltroValores'] .delbutton", 'tr', function(x) {
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
        $('.Boton_Agregar_Ventana').on('click', function() {
            var that = $('#TablaFiltroValores')[0].altEditor;
            that._openAddModal();
            $('#altEditor-add-form-' + that.random_id)
                .off('submit')
                .on('submit', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    that._addRowData();
                });

            FuncionesSelects_Historia("Agregar");

        });


        function FuncionesSelects_Historia(tipo) {
            document.getElementById('Tipo_Filtro').required = true;
            document.getElementById('Valor_Referencia_Minima').required = true;
            document.getElementById('Valor_Referencia_Maxima').required = true;
            document.getElementById('Color_Correcto').required = true;

            var Datos = JSON.parse(document.getElementById("Valores_Referencia_Filtrado_Pagina_Externa").value);
            var largo = Datos.length;

            if (tipo == "Editar") {
                
            } else if (tipo == "Agregar") {
                document.getElementById('id_Filtro').value = largo;
                $("#Color_Correcto").val("#B9F3C8");
            }

            var Valores_Referencia = document.getElementById('Tipo_Filtro');
            Valores_Referencia.onchange = function() {
                var Resultado1 = document.getElementById('Tipo_Filtro').value;
                if (Resultado1 == "Numerico") {
                    document.getElementById('Valor_Referencia_Minima').type = "number";
                    document.getElementById('Valor_Referencia_Maxima').type = "number";
                    document.getElementById('Valor_Referencia_Minima').step = "0.01";
                    document.getElementById('Valor_Referencia_Maxima').step = "0.01";

                    document.getElementById('Valor_Referencia_Minima').placeholder = "Valor Minimo";
                    document.getElementById('Valor_Referencia_Maxima').placeholder = "Valor Maximo";

                    if (tipo == "Editar") {

                    } else if (tipo == "Agregar") {
                        document.getElementById('Valor_Referencia_Minima').value = "";
                        document.getElementById('Valor_Referencia_Maxima').value = "";
                    }

                } else if (Resultado1 == "Texto") {
                    document.getElementById('Valor_Referencia_Minima').type = "text";
                    document.getElementById('Valor_Referencia_Maxima').type = "text";

                    document.getElementById('Valor_Referencia_Minima').placeholder = "Valor Incorrecto";
                    document.getElementById('Valor_Referencia_Maxima').placeholder = "Valor Correcto";

                    if (tipo == "Editar") {

                    } else if (tipo == "Agregar") {
                        document.getElementById('Valor_Referencia_Minima').value = "";
                        document.getElementById('Valor_Referencia_Maxima').value = "";
                    }

                }
            };

            Valores_Referencia.onchange();

            //$("#Color_Correcto").val("#B9F3C8");

            var output = document.createElement('output');
            output.innerHTML = "0";
            output.style.position = "absolute";
            output.style.top = "-27px";

            var Edad_Minima = document.getElementById('Edad_Minima');
            Edad_Minima.oninput = function() {
                this.nextElementSibling.value = this.value
            }
            Edad_Minima.insertAdjacentElement("afterend", output);

            Edad_Minima.oninput();

            var output1 = document.createElement('output');
            output1.innerHTML = "0";
            output1.style.position = "absolute";
            output1.style.top = "-27px";

            var Edad_Maxima = document.getElementById('Edad_Maxima');
            Edad_Maxima.oninput = function() {
                this.nextElementSibling.value = this.value
            }
            Edad_Maxima.insertAdjacentElement("afterend", output1);
            Edad_Maxima.oninput();

            var Tipo_Edad = document.getElementById('Tipo_Edad');
            Tipo_Edad.onchange = function() {
                if (this.value == "No Aplica") {
                    Edad_Minima.value = "0";
                    output.value = "0";
                    output1.value = "0";
                    Edad_Maxima.value = "0";

                    Edad_Maxima.max = "100";
                    Edad_Minima.max = "100";


                    Edad_Minima.disabled = true;
                    Edad_Maxima.disabled = true;

                } else if (this.value == "Dias") {
                    Edad_Maxima.max = "90";
                    Edad_Minima.max = "90";

                    Edad_Minima.disabled = false;
                    Edad_Maxima.disabled = false;
                } else if (this.value == "Meses") {
                    Edad_Maxima.max = "240";
                    Edad_Minima.max = "240";

                    Edad_Minima.disabled = false;
                    Edad_Maxima.disabled = false;
                } else if (this.value == "Anual") {
                    Edad_Maxima.max = "100";
                    Edad_Minima.max = "100";

                    Edad_Minima.disabled = false;
                    Edad_Maxima.disabled = false;
                }
            }
            Tipo_Edad.onchange();

        }

    }

    window.addEventListener('message', function(e) {
        // Check the origin, accept messages only if they are from YOUR site!
        if (e.data != "") {
            console.log(e.data);
            var Datos = e.data;
            Datos = Datos.replaceAll('&#039;', "'");
            Datos = Datos.replaceAll('&quot;', '"');

            console.log(Datos);
            if (Datos == "Crear") {
                TablaFiltros_VentanaExterna(0, "TablaFiltroValores", "[]");
            } else {
                TablaFiltros_VentanaExterna(0, "TablaFiltroValores", Datos);
                document.getElementById("Valores_Referencia_Filtrado_Pagina_Externa").value = Datos;
            }

        }
    });

    
</script>
<script>
  // no quitar para evitar problemas de que guarde con este caracter ""
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/['"]/g, ''));
  });
</script>