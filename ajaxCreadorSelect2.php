<?php
// V2.4

if (isset($_POST['keyUnlock'])) {
    include 'funciones/conn3.php';
    function Desencriptar2($valor)
    {
        $Sc = base64_decode("keyMaster");
        $Texto = openssl_decrypt(urldecode($valor), "AES-256-CBC", $Sc);
        return $Texto;
    }

    $option = json_decode(json_encode($_POST['option']));
    $Nombre_Tabla = Desencriptar2($option->name);
    $selectFrom = Desencriptar2($option->selectFrom);
    $option->order = json_decode(Desencriptar2($option->order));
    foreach ($option->order as $key => $value) {
        $order .= $key . " " . $value . " ";
    }
    $option->clausula->data = Desencriptar2($option->clausula->data);
    foreach ($option->clausula->value as $key => $value) {
        $option->clausula->data = str_replace("$" . $key, $value, $option->clausula->data);
    }

    if (isset($_POST["Nueva_Opcion_Select_Global"]) && $_POST['Tipo'] != "cargar") {
        $campoCreador = json_decode(base64_decode($_POST['option']['campoCreador']));
        $nombreCreador = Desencriptar2($campoCreador->nombreCreador);
        $conditionInsert = Desencriptar2($campoCreador->conditionInsert);
        $conditionSelect = Desencriptar2($campoCreador->conditionSelect);
        $TipoSelect = Desencriptar2($option->Tipo_Select_Global);
        $creadoArray = explode(",", $_POST["Nueva_Opcion_Select_Global"]);
        $Igual = "0";
        $NombreCreado = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $creadoArray[count($creadoArray) - 1]);
        $likeWhere = explode(" || ", Desencriptar2($option->likeWhere));
        foreach ($likeWhere as $key => $value) {
            $likes .= $value . " LIKE '%" . $NombreCreado . "%'" . ($key < (count($likeWhere) - 1) ? " OR " : "");
        }
        $comprobarExistencia = mysqli_query($conn3, "SELECT * FROM {$Nombre_Tabla} WHERE ($likes) " . $conditionSelect);
        $nrowSelect = mysqli_num_rows($comprobarExistencia);
        $Igual = ($nrowSelect >= 1 ? "1" : "0");
        if ($Igual == "0") {
            $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} SET {$nombreCreador} = '{$NombreCreado}'" . $conditionInsert);
            if ($queryList) {
                $comprobarExistencia = mysqli_query($conn3, "SELECT * FROM {$Nombre_Tabla} WHERE {$nombreCreador} = '$NombreCreado' " . $conditionSelect);
                $data = array();
                $data['items'] = [];
                $valores = explode(" || ", Desencriptar2($option->value));
                $text = explode(" || ", Desencriptar2($option->text));
                while ($RowSelect = mysqli_fetch_array($comprobarExistencia)) {
                    $val = "";
                    foreach ($valores as $key => $value) {
                        $val .= ($option->carapter == "true" ? utf8_encode($RowSelect["{$value}"]) : $RowSelect["{$value}"]) . ($key < (count($valores) - 1) ? ' | ' : '');
                    }
                    $texto = "";
                    foreach ($text as $key => $value) {
                        $texto .= ($option->carapter == "true" ? utf8_encode($RowSelect["{$value}"]) : $RowSelect["{$value}"]) . ($key < (count($text) - 1) ? ' • ' : '');
                    }
                    $data['items'] = array("id" => $val, "text" => $texto);
                }
                echo json_encode($data['items']);
            } else {
                echo "<pre>";
                echo "Error";
                var_dump(mysqli_error_list($conn3));
                echo "</pre>";
            }
        } else {
            echo "Creado";
        }
    } else if ($_POST['Tipo'] == "cargar") {
        $page = $_POST['page'];
        $paginacionInicio = ($page * 1000) - 1000;
        if (!isset($_POST['searchTerm'])) {
            $query = ($option->clausula->data != "" ? "WHERE {$option->clausula->data}" : "") . " {$order} limit $paginacionInicio, 1000";
            $queryTotal = ($option->clausula->data != "" ? "WHERE {$option->clausula->data}" : "") . " {$order}";
        } else {
            $searchTerm = $_POST["searchTerm"];
            $likeWhere = explode(" || ", Desencriptar2($option->likeWhere));
            foreach ($likeWhere as $key => $value) {
                $likes .= $value . " LIKE '%" . str_replace(" ", '%', $searchTerm) . "%'" . ($key < (count($likeWhere) - 1) ? " OR " : "");
            }
            $query = "WHERE ($likes) " . ($option->clausula->data != "" ? "AND {$option->clausula->data}" : "") . " {$order} limit $paginacionInicio, 1000";
            $queryTotal = "WHERE ($likes)" . ($option->clausula->data != "" ? " AND {$option->clausula->data}" : "") . " {$order}";
        }
        $QuerySelect = mysqli_query($conn3, "SELECT $selectFrom FROM {$Nombre_Tabla} " . $query);
        $progreso = mysqli_query($conn3, "SELECT count(*) as regiTotal FROM {$Nombre_Tabla} " . $queryTotal)->fetch_object();
        $nrowSelect = mysqli_num_rows($QuerySelect);
        $data = array();
        $data['items'] = [];
        $valores = explode(" || ", Desencriptar2($option->value));
        $text = explode(" || ", Desencriptar2($option->text));
        $regAdicional = json_decode(base64_decode($_POST['option']['regAdicional']), true);
        $regAdicional['data'] = ((gettype($regAdicional['data']) === "string") ? json_decode(Desencriptar2($regAdicional['data'])) : $regAdicional['data']);
        if (!empty($regAdicional) && $regAdicional['position'] == "top") {
            foreach ($regAdicional['data'] as $key => $value) {
                $data['items'][] = $value;
            }
        }
        while ($RowSelect = mysqli_fetch_array($QuerySelect)) {
            $val = "";
            foreach ($valores as $key => $value) {
                $val .= ($option->carapter == "true" ? utf8_encode($RowSelect["{$value}"]) : $RowSelect["{$value}"]) . ($key < (count($valores) - 1) ? ' | ' : '');
            }
            $texto = "";
            foreach ($text as $key => $value) {
                $texto .= ($option->carapter == "true" ? utf8_encode($RowSelect["{$value}"]) : $RowSelect["{$value}"]) . ($key < (count($text) - 1) ? ' • ' : '');
            }
            $data['items'][] = array("id" => $val, "text" => $texto);
        }
        if (!empty($regAdicional) && $regAdicional['position'] == "bottom") {
            foreach ($regAdicional['data'] as $key => $value) {
                $data['items'][] = $value;
            }
        }
        $data['total'] = $progreso->regiTotal;
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    exit();
}
?>
<script type="text/javascript">
    function Select2Dinamico2(Nombre, TipoSelect, creador, selected = false) {
        $(Nombre).select2({
            // placeholder: {
            //     id: '-1', // the value of the option
            //     text: 'Select an option'
            // },
            placeholder: 'Seleccionar...',
            language: {
                errorLoading: function() {
                    return "No se pueden cargar los resultados";
                },
                inputTooLong: function(e) {
                    var t = e.input.length - e.maximum,
                        n = "por favor borrar" + t + "Caracteres";
                    return n
                },
                inputTooShort: function(e) {
                    var t = e.minimum - e.input.length,
                        n = "Por favor ingrese al menos otra vez" + t + "Caracteres";
                    return n
                },
                loadingMore: function() {
                    return "Cargar más resultados ..."
                },
                maximumSelected: function(e) {
                    var t = "Solo puede seleccionar como máximo" + e.maximum + "Artículos";
                    return t
                },
                searching: function() {
                    return "buscando...";
                },
                noResults: function() {
                    return "¡No hay resultados de búsqueda!";
                }
            },
            tags: creador,
            ajax: {
                url: "ajaxCreadorSelect2.php",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    params.page = params.page || 1; // Esta página se grabará y aumentará automáticamente al desplazarse hacia abajo
                    return {
                        page: params.page || 1, // Paginación: número de página actual
                        searchTerm: params.term, // search term
                        Nueva_Opcion_Select_Global: $.trim(this.val()),
                        option: TipoSelect,
                        Tipo: "cargar",
                        keyUnlock: "true"
                    };
                },
                processResults: function(response, params) {
                    return {
                        results: response.items,
                        pagination: { // Paginación
                            // más: data.more // ¿Hay una última página: verdadero | falso
                            more: (params.page * 1000) < response.total // Se calcula el número total devuelto por el backend.
                        }
                    };
                },
                createTag: function(params) {
                    // Don't offset to create a tag if there is no @ symbol
                    if (params.term.indexOf($.trim(this.val())) === -1) {
                        // Return null to disable tag creation
                        return null;
                    }
                    return {
                        id: params.term,
                        text: params.term,
                        newTag: true
                    }
                    // $('select').select2({
                    //     createTag: function(params) {
                    //         var term = $.trim(params.term);

                    //         if (term === '') {
                    //             return null;
                    //         }

                    //         return {
                    //             id: term,
                    //             text: term,
                    //             newTag: true // add additional parameters
                    //         }
                    //     }
                    // });
                },
                cache: true
            },
            // minimumInputLength: 1, // comienza a buscar al ingresar algunas palabras
        }).on('select2:close', function() {
            var element = $(this);
            var new_category = $.trim(element.val());
            if (new_category != '' && creador == true) {
                $.ajax({
                    url: "ajaxCreadorSelect2.php",
                    method: "POST",
                    data: {
                        Nueva_Opcion_Select_Global: new_category,
                        option: TipoSelect,
                        Tipo: "crear",
                        keyUnlock: "true"
                    },
                    success: function(data) {
                        console.log(data);
                        if (data == 'Error') {
                            alert("Error al crear un nuevo dato");
                        } else if (data == 'Creado') {
                            console.log("existe dato");
                        } else {
                            data = JSON.parse(data);
                            var arraySelectivo = new_category.split(",");
                            arraySelectivo.push(data.id);
                            $(Nombre + " option[value='" + data.text + "']").remove();
                            element.append('<option value="' + data.id + '">' + data.text + '</option>').val();
                            $(Nombre).val(arraySelectivo).trigger('change');
                        }
                    }
                })
            } else if (creador == false) {
                console.log("Creador Desactivado");
            } else {
                console.log("Error");
            }
        });
        if (selected != false) {
            $(Nombre).append('<option value="' + selected.valueSelect + '">' + selected.textSelect + '</option>');
        }
        // var data = {
        //     id: 1,
        //     text: 'Barn owl'
        // };

        // var newOption = new Option(data.text, data.id, false, false);
        // $('#mySelect2').append(newOption).trigger('change');
    }
</script>