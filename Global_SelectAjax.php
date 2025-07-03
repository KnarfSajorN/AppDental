<?php
if (isset($_POST['keyUnlock'])) {
    include 'funciones/conn3.php';
    function Desencriptar($valor)
    {
        $Sc = base64_decode("keyMaster");
        $Texto = openssl_decrypt(urldecode($valor), "AES-256-CBC", $Sc);
        return $Texto;
    }
    $option = json_decode(json_encode($_POST['option']));
    $Nombre_Tabla = Desencriptar($option->name);
    // name
    // Usuario_Select_Global
    // value
    // text
    // keyWhere
    // Tipo_Select_Global
    // carapter
    // Tipo
    if (isset($_POST["Nueva_Opcion_Select_Global"]) and isset($_POST["Tipo_Select_Global"]) and $option->Tipo != 'crear') {
        $TipoSelect = Desencriptar($_POST["Tipo_Select_Global"]);
        $NombreCreado = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $_POST["Nueva_Opcion_Select_Global"]);
        //$category_name = $_POST["category_name"];
        $usuario_id = Desencriptar($_POST["Usuario_Select_Global"]);
        $Igual = "0";
        $comprobarExistencia = mysqli_query($conn3, "SELECT * FROM pos WHERE (descripcion = '$NombreCreado' OR codigo = '$NombreCreado' OR id = '$NombreCreado')");
        $nrowSelect = mysqli_num_rows($comprobarExistencia);
        $Igual = ($nrowSelect >= 1 ? "1" : "0");
        if ($Igual == "0") {
            $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} SET descripcion = '{$NombreCreado}'");
            if ($queryList != true) {
                echo "Error";
            } else {
                $comprobarExistencia = mysqli_query($conn3, "SELECT * FROM pos WHERE descripcion = '$NombreCreado'")->fetch_object();
                echo $comprobarExistencia->id . " || " . $NombreCreado;
            }
        } else {
            echo "Creado";
        }
    } else if (isset($option->Tipo_Select_Global) and $option->Tipo == "cargar") {
        $page = $_POST['page'];
        $paginacionInicio = ($page * 1000) - 1000;
        $Campo_Tabla = Desencriptar($option->Tipo_Select_Global);
        if (!isset($_POST['searchTerm'])) {
            $QuerySelect = mysqli_query($conn3, "SELECT * FROM {$Nombre_Tabla} order by id limit $paginacionInicio, 1000");
            $progreso = mysqli_query($conn3, "SELECT count(*) as regiTotal FROM {$Nombre_Tabla} order by id")->fetch_object();
        } else {
            $searchTerm = $_POST["searchTerm"];
            $keyWhere = explode(" || ", Desencriptar($option->keyWhere));
            foreach ($keyWhere as $key => $value) {
                $likes .= $value . " LIKE '%" . $searchTerm . "%'" . ($key < (count($keyWhere) - 1) ? " OR " : "");
            }
            $QuerySelect = mysqli_query($conn3, "SELECT * FROM {$Nombre_Tabla} WHERE ($likes) order by id limit $paginacionInicio, 1000");
            $progreso = mysqli_query($conn3, "SELECT count(*) as regiTotal FROM {$Nombre_Tabla} WHERE ($likes) order by id")->fetch_object();
        }
        $nrowSelect = mysqli_num_rows($QuerySelect);
        $data = array();
        $valores = explode(" || ", Desencriptar($option->value));
        $text = explode(" || ", Desencriptar($option->text));
        while ($RowSelect = mysqli_fetch_array($QuerySelect)) {
            $val = "";
            foreach ($valores as $key => $value) {
                $val .= ($option->carapter == "true" ? utf8_encode($RowSelect["{$value}"]) : $RowSelect["{$value}"]) . ($key < (count($valores) - 1) ? ' | ' : '');
            }
            $texto = "";
            foreach ($text as $key => $value) {
                $texto .= ($option->carapter == "true" ? utf8_encode($RowSelect["{$value}"]) : $RowSelect["{$value}"]) . ($key < (count($text) - 1) ? ' | ' : '');
            }
            // (($RowSelect['codigo'] != "0" || $RowSelect['codigo'] != 0 && $RowSelect['codigo'] != "") ? $RowSelect['codigo'] . " - " : '')  .  utf8_encode($RowSelect['descripcion'])
            $data['items'][] = array("id" => $val, "text" => $texto);
        }
        $data['total'] = $progreso->regiTotal;
        // $data[] = array("id" => 1, "text" => "multivitaminas prenatales Composición: cada comprimido, cápsula o gragea debe contener: Hierro (como sulfato o fumarato): 60 mg Ácido fólico 400 µg – 500 µg Puede contener calcio, flúor y otras vitaminas y minerales. Máximo de las siguientes vitaminas por preparado: Vitamina A 5000 U, Vitamina D 250 UI");
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    exit();
}
?>
<script type="text/javascript">
    function Select2Dinamico(Nombre, TipoSelect, Usuario, creador) {
        $(Nombre).select2({
            placeholder: 'Escriba para Buscar el Datp',
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
                url: "Global_SelectAjax.php",
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
                        Usuario_Select_Global: Usuario,
                        Tipo: "Cargar Resultados",
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
                        text: params.term
                    }
                },
                cache: true
            },
            // minimumInputLength: 1, // comienza a buscar al ingresar algunas palabras

        }).on('select2:close', function() {
            var element = $(this);
            var new_category = $.trim(element.val());
            //console.log(new_category);
            if (new_category != '') {
                $.ajax({
                    url: "ajaxCreadorSelect.php",
                    method: "POST",
                    data: {
                        Nueva_Opcion_Select_Global: new_category,
                        Tipo_Select_Global: TipoSelect,
                        Usuario_Select_Global: Usuario,
                        keyUnlock: "true"
                    },
                    success: function(data) {
                        //console.log(data);
                        if (data == 'Error') {
                            alert("Error al crear un nuevo dato");
                        } else if (data == 'Creado') {
                            console.log("existe dato");
                        } else {
                            data = data.split(" || ");
                            element.append('<option value="' + data[0] + '">' + new_category + '</option>').val(data[0]).change();
                        }
                    }
                })
            } else {
                console.log("Error");
            }
        });
    }
</script>