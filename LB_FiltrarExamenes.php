<?php

if ($_POST['nombretabla']) {
    include 'funciones/conn3.php';
    $nombretabla = $_POST['nombretabla'];
    $id = $_POST['id'];
    $campotabla = $_POST['campotabla'];
    $filtro = $_POST['filtro'];

    $queryList = mysqli_query($conn3, "SELECT * FROM {$nombretabla} where idOperacion = $id $filtro ");
    if ($queryList) {
        echo '<option value="todos" selected>Imprimir Todo</option>';
        while ($rowArray = mysqli_fetch_array($queryList)) {
            echo '<option value="' . $rowArray['id'] . '">' . $rowArray[$campotabla] . '</option>';
        }
    } else {
        var_dump(mysqli_error_list($conn3));
    }
    exit();
}

?>

<style>
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
</style>
<div id="modalMedicamentos" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <p class="statusMsg"></p>
                <h5 class="modal-title" id="exampleModalLabel">Imprimir Todo o Filtrar los Exámenes.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3>Exámenes a Imprimir</h3>
                    </div>
                    <div class="col-md-12">
                        <input type="hidden" name="idr" id="idRecibido" value="">
                        <input type="hidden" name="recetaContent" id="recetaContent" value="">
                        <div class="row" style="display: flex; justify-content:center; align-items:center; flex-flow:column; margin-bottom: 10px;">
                            <div class="col-md-12">
                                <select name="ListaFiltro" id="ListaFiltro" class="form-control select2" onchange="AgregarLista()" style="width: 100%;">
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="display: flex; justify-content:center; align-items:center; margin-top: 10px;padding-left: 30px;padding-right: 30px;">
                                    <button type="button" style="width:100%" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" title="Imprimir Todos los Resultados" id="ResultadosTodos" onclick="window.open('LB_ImpresionResultadoOrden?idOperacion=<?php echo $idOperacion; ?>')"><i class="fa fa-print"></i> Imprimir Todo </button>
                                </div>

                                <div class="col-md-12" style="display: flex; justify-content:center; align-items:center; margin-top: 10px;padding-left: 30px;padding-right: 30px;">
                                    <button type="button" style="width:100%;" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" title="Imprimir Resultados por Exámenes" id="ResultadosExamenes" onclick="window.open('LB_ImpresionResultadoOrden?idOperacion=<?php echo $idOperacion; ?>&examenes=examenes')"><i class="fa fa-print"></i> Imprimir Separado por Exámenes</button>
                                </div>
                                <div class="col-md-12" style="display: flex; justify-content:center; align-items:center; margin-top: 10px;padding-left: 30px;padding-right: 30px;">
                                    <button type="button" style="width:100%;" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" title="Imprimir Resultados por Categoría" id="ResultadosCategoria" onclick="window.open('LB_ImpresionResultadoOrden?idOperacion=<?php echo $idOperacion; ?>&examenes=categoria')"><i class="fa fa-print"></i> Imprimir Separado por Categorías</button>
                                </div>
                            </div>

                        </div>

                        <br>
                        <div class="container-fluid row" id="filter" style="display: none;">
                            <table class="table text-center" id="example1" style="undefined;table-layout: fixed; width: 100%">
                                <thead>
                                    <tr>
                                        <th style="width: 20%;">#</th>
                                        <th style="width: 60%;">Nombre Examen</th>
                                        <th style="width: 20%;">Acción</th>
                                    </tr>
                                </thead>
                                <tbody id="codeReceta">
                                    <!-- <tr>
                                                                    <th>Codigo</th>
                                                                    <th>Medicamento</th>
                                                                    <th>Op</th>
                                                                </tr> -->
                                </tbody>
                            </table>
                            <div class="col-md-12" style="margin-top: 10px;">
                                <button type="button" id="ResultadosLista" style="display:none" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" title="Imprimir Exámenes Filtrados en la Tabla" onclick="window.open('LB_ImpresionResultadoOrden?idOperacion=<?php echo $idOperacion; ?>&examenes='+ $('#recetaContent').val());"><i class="fa fa-print"></i> Imprimir Exámenes Filtrados</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var recetaCache = [];
    var recetaCompleto = [];


    function cargarTabla(imp, idimp) {
        //table.clear().draw(); // Limpio la tabla ya existente
        table = $("#example1").dataTable().fnDestroy(); // Destruyo
        $("#" + idimp).html(imp); // Imprimi los datos en el body
        table = $("#example1").DataTable({ // Creo la tabla nuevamente
            responsive: true,
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
            paging: true,
            ordering: true,
            info: true,
            lengthChange: false,
            ordering: true,
            info: true,
            autoWidth: false
        });
    }

    function SeleccionarDatosImprimir(id, nombretabla) {
        let date = {
            id: id,
            nombretabla: nombretabla,
            campotabla: "Nombre",
            filtro: " AND CaracteristicaExamen='No' AND Activo = '1' "
        };
        $.ajax({
            url: "LB_FiltrarExamenes.php",
            data: date,
            type: "POST",
            success: function(resp) {
                $('#ListaFiltro').html(resp);
                $("#modalMedicamentos").modal()
            },
        });
        $("#filter").show();
    }


    function AgregarLista() {
        let dato = $("select[name=ListaFiltro]").val();
        if (dato == "todos") {
            document.getElementById("ResultadosTodos").style.display = "block";
            document.getElementById("ResultadosCategoria").style.display = "block";
            document.getElementById("ResultadosExamenes").style.display = "block";
            //document.getElementById("Etiquetas").style.display = "block";


            document.getElementById("ResultadosLista").style.display = "none";
        }

        // Si toman este codigo, esta condicion pueden eliminarla, se usa para filtrar una seleccion
        if (dato != "todos") {

            document.getElementById("ResultadosTodos").style.display = "none";
            document.getElementById("ResultadosCategoria").style.display = "none";
            document.getElementById("ResultadosExamenes").style.display = "none";
            //document.getElementById("Etiquetas").style.display = "none";

            document.getElementById("ResultadosLista").style.display = "block";

            let pass = 0;
            for (let i = 0; i < recetaCompleto.length; i++) {
                if (recetaCompleto[i] == dato) {
                    pass = 1;
                }
            }
            if (pass == 0) {
                let dato2 = $("select[name=ListaFiltro] option[value=" + dato + "]").text();

                recetaCompleto[recetaCache.length] = dato + "";
                // let vacunaArray = dato.toString().split(" - ");
                recetaCache[recetaCache.length] = "<tr>" +
                    "<td > " + dato + " </td>" +
                    "<td > " + dato2 + " </td>";
                var acum = 0;
                var imprimir = "";
                while (acum < recetaCache.length) {
                    imprimir += recetaCache[acum] + "<td > <i class='fa fa-trash' onclick='borrarReceta(" + acum + ")'></i></td>" +
                        "</tr>";
                    acum++;
                }
                cargarTabla(imprimir, "codeReceta"); // Imprimi los datos en el body
                $("#recetaContent").val(recetaCompleto);
                //console.log($("#recetaContent").val());
            }
        }

    }

    function borrarReceta(e) {
        recetaCache.splice(e, 1);
        recetaCompleto.splice(e, 1);
        var acum = 0;
        var imprimir = "";
        while (acum < recetaCache.length) {
            imprimir += recetaCache[acum] + "<td > <i class='fa fa-trash' onclick='borrarReceta(" + acum + ")'></i></td>" +
                "</tr>";
            acum++;
        }
        cargarTabla(imprimir, "codeReceta");
        $("#recetaContent").val(recetaCompleto);
    }
</script>