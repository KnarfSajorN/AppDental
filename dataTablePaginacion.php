<?php
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
// v2.2
if (isset($_POST['key'])) {
    include 'funciones/conn3.php';
    function Desencriptar($valor)
    {
        $Sc = base64_decode("keyMaster");
        $Texto = openssl_decrypt(urldecode($valor), "AES-256-CBC", $Sc);
        return $Texto;
    }
    $unLockSearch = false;
    $btnArrays = json_decode(base64_decode($_POST['option']['btns']));
    $nombreTabla = Desencriptar($_POST['option']['name']);
    $selectFrom = Desencriptar($_POST['option']['selectFrom']);
    $valores = json_decode(Desencriptar($_POST['option']['camposValue']));
    $_POST['option']['order'] = json_decode(Desencriptar($_POST['option']['order']));
    $orderDatatable = $valores[(($_POST['order'][0]['column'] > (count($valores) - 1)) ? 0 : $_POST['order'][0]['column'])] . " " . $_POST['order'][0]['dir'];
    foreach ($_POST['option']['order'] as $key => $value) {
        $value = str_replace("$0", $orderDatatable, $value);
        $order .= $key . " " . $value . " ";
    }
    $clausula = Desencriptar($_POST['option']['clausula']['data']);
    foreach ($_POST['option']['clausula']['value'] as $key => $value) {
        $clausula = str_replace("$" . $key, $value, $clausula);
    }
    foreach ($_POST['columns'] as $key => $value2) {
        $value2['search']["value"] = preg_replace("/[(|)]/", '', $value2['search']["value"]);
        if ($value2['search']["value"] != "") {
            $unLockSearch = true;
        }
    }
    if (!empty($_POST['search']['value']) || $unLockSearch == true) {
        $likeWhere = explode(" || ", Desencriptar($_POST['option']['likeWhere']));
        foreach ($likeWhere as $key => $value) {
            if ($_POST['search']['value'] != "") {
                $likes .= $value . " LIKE '%" . str_replace(" ", "%", $_POST['search']['value']) . "%'" . ($key < (count($likeWhere) - 1) ? " OR " : "");
            }
        }
        foreach ($_POST['columns'] as $key2 => $value2) {
            $value2['search']["value"] = preg_replace("/[(|)]/", '', $value2['search']["value"]);
            if ($value2['search']["value"] != "") {
                if ($likes2 != "") {
                    $likes2 .= " OR ";
                }
                foreach ($likeWhere as $key => $value) {
                    $likes2 .= $value . " LIKE '%" . str_replace(" ", "%", $value2['search']["value"]) . "%'" . (($key < (count($likeWhere) - 1)) ? " OR " : "");
                }
            }
        }
        // echo count($_POST['columns']) - 1;
        $query = "WHERE ({$likes}" . ($likes2 != "" && $likes != "" ? " OR $likes2" : ($likes2 != "" ? $likes2 : '')) . ") " . ($clausula != "" ? "AND {$clausula}" : "") . " {$order} limit {$_POST['start']}, {$_POST['length']}";
    } else {
        $query = ($clausula != "" ? "WHERE {$clausula}" : "") . " {$order} limit {$_POST['start']}, {$_POST['length']}";
    }
    $querySelect = mysqli_query($conn3, "SELECT {$selectFrom} FROM {$nombreTabla} " . $query) or die(var_dump(mysqli_error_list($conn3)));
    $queryCuenta = mysqli_query($conn3, "SELECT count(*) as cuentaRegistro FROM {$nombreTabla} " . (!empty($_POST['search']['value']) ? "WHERE ({$likes}" . ($likes2 != "" ? " OR $likes2" : '') . ") " . ($clausula != "" ? "AND {$clausula}" : "") : ($clausula != "" ? "WHERE {$clausula}" : "")) . " {$order}") or die(var_dump(mysqli_error_list($conn3)));
    $totalCuenta = mysqli_num_rows($queryCuenta);
    $queryCuenta = $queryCuenta->fetch_object();
    $totalRecords = mysqli_num_rows($querySelect);
    while ($rowArray = mysqli_fetch_array($querySelect)) {
        $btns = "";
        foreach ($btnArrays as $key => $value) {
            $value = json_decode(base64_decode($value));
            if ($value->create != "false") {
                $arrayBtn = explode(" || ", Desencriptar($value->value));
                $value->href = ($value->href == false ? false : Desencriptar($value->href));
                $value->class = ($value->class == false ? false : Desencriptar($value->class));
                $value->id = ($value->id == false ? false : Desencriptar($value->id));
                $value->event = ($value->event == false ? false : Desencriptar($value->event));
                $value->title = ($value->title == false ? false : Desencriptar($value->title));
                $value->dataPlacement = ($value->dataPlacement == false ? false : Desencriptar($value->dataPlacement));
                $value->dataToggle = ($value->dataToggle == false ? false : Desencriptar($value->dataToggle));
                $value->dataOriginalTitle = ($value->dataOriginalTitle == false ? false : Desencriptar($value->dataOriginalTitle));
                $value->style = ($value->style == false ? false : Desencriptar($value->style));
                foreach ($arrayBtn as $key2 => $value2) {
                    $value->href = ($value->href == false ? '' : str_replace("$" . $key2, $rowArray["{$value2}"], $value->href));
                    $value->class = ($value->class == false ? '' : str_replace("$" . $key2, $rowArray["{$value2}"], $value->class));
                    $value->id = ($value->id == false ? '' : str_replace("$" . $key2, $rowArray["{$value2}"], $value->id));
                    $value->event = ($value->event == false ? '' : str_replace("$" . $key2, $rowArray["{$value2}"], $value->event));
                    $value->title = ($value->title == false ? '' : str_replace("$" . $key2, $rowArray["{$value2}"], $value->title));
                    $value->dataPlacement = ($value->dataPlacement == false ? '' : str_replace("$" . $key2, $rowArray["{$value2}"], $value->dataPlacement));
                    $value->dataToggle = ($value->dataToggle == false ? '' : str_replace("$" . $key2, $rowArray["{$value2}"], $value->dataToggle));
                    $value->dataOriginalTitle = ($value->dataOriginalTitle == false ? '' : str_replace("$" . $key2, $rowArray["{$value2}"], $value->dataOriginalTitle));
                    $value->style = ($value->style == false ? '' : str_replace("$" . $key2, $rowArray["{$value2}"], $value->style));
                }
                $btns .= "<a href='{$value->href}' id='" . $value->id . "' " . $value->event . " target='" . $value->target . "' title='" . $value->title . "' data-placement='" . $value->dataPlacement . "' data-toggle='" . $value->dataToggle . "' data-original-title='" . $value->dataOriginalTitle . "' style='display:block; float: left; margin: 5px; font-size: 1.1em;'><i class='" . $value->class . "' style='" . ($value->style == false || empty($value->style) ? "display:block; float: left; margin: 5px; font-size: 1.1em;" : $value->style) . "'></i></a>";
            }
        }
        $datos = [];
        foreach ($valores as $key => $value) {
            $value = explode(".", $value);
            $value = $value[count($value) - 1];
            $datos[] = ($_POST['option']['carapter'] == "true" ? utf8_encode($rowArray["{$value}"])  : $rowArray["{$value}"]);
        }
        $datos[count($datos)] = $btns;
        $data[] = $datos;
    }
    $json_data = array(
        // "pruebas"         => $_POST,
        "draw"            => intval($_POST['draw']),
        "recordsTotal"    => intval(($totalCuenta === $queryCuenta->cuentaRegistro ? $totalCuenta : $queryCuenta->cuentaRegistro)),
        "recordsFiltered" => intval(($totalCuenta === $queryCuenta->cuentaRegistro ? $totalCuenta : $queryCuenta->cuentaRegistro)),
        "data"            => (count($data) == 0 ? array() : $data)
    );
    echo json_encode($json_data);
    exit();
}
?>
<script type="text/javascript">
    function setSpinnerLoader(options) {
        const component =
            '<tr>' +
            '  <td colspan="100" class="text-center visually-hidden" style="width:97%; margin:auto; display:flex; justify-content:center; align-items:center; position: absolute; bottom: 46%; opacity: .6"><i class="fa fa-spinner fa-pulse fa-3x fa-fw" ></i></td>' +
            '</tr>';
        $(options + " tbody").append(component);
    }

    // $('#idtabla thead tr').clone(true).addClass('filters').appendTo('#idtabla thead');
    // //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    // $('#idtabla thead tr:eq(0) th').each(function(i) {
    //     var title = $(this).text(); //es el nombre de la columna
    //     console.log(title);
    //     switch (title) {
    //         case 'doctor':
    //             $(this).html('<select name="text" id="codigo" class="input-lg form-group" style="width:100%"><option value="" selected>Seleccione</option><option>Esta Firmado</option><option selected>No Firmado</option></select>');
    //             break;
    //         case 'Nombres':
    //             $(this).html('<input type="text"  class="input-lg form-group" style="width:100%" value="">');
    //             break;
    //         case 'Paciente':
    //             $(this).html('<input type="text"  class="input-lg form-group" style="width:100%" value="">');
    //             break;
    //         case 'FechaR':
    //             $(this).html('<input type="text"  class="input-lg form-group" id="buscadores" style="width:100%" value="">');
    //             break;
    //         case ' ':

    //             break;
    //         default:
    //             $(this).html('<input type="text" class="form-control input-lg" placeholder="' + title + '" />');
    //             break;
    //     }

    //     $('input', this).on('keyup change', function(e) {
    //         e.stopPropagation();
    //         // Get the search value
    //         $(this).attr('title', $(this).val());
    //         var regexr = '({search})'; //$(this).parents('th').find('select').val();
    //         var cursorPosition = this.selectionStart;
    //         // Search the column for that value
    //         tablaOne
    //             .column(i)
    //             .search(
    //                 this.value != '' ?
    //                 regexr.replace('{search}', '(((' + this.value + ')))') :
    //                 '',
    //                 this.value != '',
    //                 this.value == ''
    //             )
    //             .draw();
    //         $(this)
    //             .focus()[0]
    //             .setSelectionRange(cursorPosition, cursorPosition);
    //     });

    //     $('select', this).off('keyup change').on('keyup change', function(e) {
    //         e.stopPropagation();
    //         // Get the search value
    //         $(this).attr('title', $(this).val());
    //         var regexr = '({search})'; //$(this).parents('th').find('select').val();
    //         var cursorPosition = this.selectionStart;
    //         // Search the column for that value
    //         tablaOne
    //             .column(i)
    //             .search(
    //                 this.value != '' ?
    //                 regexr.replace('{search}', '(((' + this.value + ')))') :
    //                 '',
    //                 this.value != '',
    //                 this.value == ''
    //             )
    //             .draw();
    //         $(this)
    //             .focus()[0]
    //             .setSelectionRange(cursorPosition, cursorPosition);
    //     });
    // });

    function tablaDinamica(option) {
        var tablaObjeto = $(option.input).DataTable({
            "bProcessing": true,
            "serverSide": true,
            "ajax": {
                url: "dataTablePaginacion.php",
                type: "POST",
                data: {
                    option: option,
                    key: "unLock"
                },
                beforeSend: function() {
                    if (option.tbody != false) {
                        setSpinnerLoader(option.input);
                    }
                },
                error: function() {
                    console.log("Ah ocurrido un error.");
                }
            },
            filter: true,
            ordering: true,
            deferRender: true,
            scrollY: 1200,
            scrollCollapse: true,
            processing: true,
            lengthMenu: [10, 20, 50, 100, 200, 500],
            responsive: true,
            responsivePriority: 1,
            dom: (option.tbody != false ? 'Bftip' : 'Bfrtip'),
            buttons: [{
                extend: 'collection',
                text: '<i class="fa fa-cog" aria-hidden="true"></i>',
                className: 'btn btn-primary',
                buttons: [{
                        extend: 'print',
                        text: 'Imprimir',
                        title: 'Documento',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'copy',
                        text: 'Copiar',
                        title: 'Documento',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        title: 'Documento',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        text: 'CSV',
                        title: 'Documento',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        title: 'Documento',
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
                },
                buttons: {
                    pageLength: {
                        _: "Mostrando %d <br> Elementos",
                        '-1': "Ver Todo"
                    }
                }
            },
        });
        return tablaObjeto;
        tablaObjeto = "";
    }
</script>