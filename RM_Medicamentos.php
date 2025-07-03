<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "RM_Medicamentos";
$usuario_id = $_SESSION['ID'];
$ID_Principal = $_SESSION['ID_principal'];

#Inicio
if (isset($_POST['Guardar_Informacion_Pagina'])) {

    $Arreglo = $_POST["Arreglo"];
    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE '{$Nombre_Tabla}'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {
        foreach ($Arreglo as $key => $value) {
            $Campos .= "`{$key}` text DEFAULT '',";
        }
        $Campos = trim($Campos, ',');

        $query = "CREATE TABLE `{$Nombre_Tabla}` (
        `id` int(11) NOT NULL,
        `usuario_id` int(11) NOT NULL,
        `Fecha_Registro` date DEFAULT current_timestamp(),
        {$Campos},
        `Creacion_Dinamica` text DEFAULT '',
        `Activo` varchar(5) DEFAULT '1'
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('Error en la creación de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    } else {
        if ($nrowtabla == 1) {

            $Campo1 = mysqli_query($conn3, "show COLUMNS from {$Nombre_Tabla} WHERE Field = 'Creacion_Dinamica';");
            $nrowCampo1 = mysqli_num_rows($Campo1);
            if ($nrowCampo1 == "1") {
                foreach ($Arreglo as $key => $value) {
                    $Campo = mysqli_query($conn3, "show COLUMNS from {$Nombre_Tabla} WHERE Field = '{$key}';");
                    $nrowCampo = mysqli_num_rows($Campo);
                    if ($nrowCampo == 0) {
                        mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD `{$key}` TEXT NULL DEFAULT '';");
                    }
                }
            } else {
                echo "<script language='Javascript'> alert('Tabla no fue creada dinámicamente');</script>";
                // si bota este mensaje es por que la tabla no esta creado el campo *Creacion_Dinamica* sirve para que no se use este modulo en tablas ya preexistentes
            }
        }
    }

    $Campos = "";
    $Valores = "";
    foreach ($_POST["Arreglo"] as $key => $value) {
        $Campos .= $key . ',';
        $Valores .= "'{$value}',";
    }
    $Campos = trim($Campos, ',');
    $Valores = trim($Valores, ',');

    $usuario_id = $_POST['usuario_id'];

    $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (usuario_id,{$Campos}) VALUES ('$usuario_id', {$Valores});");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='?error=Hubo un error al guardar los datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='?msg=Se guardo el medicamento correctamente'</script>";
    }
}

///////////////////////////////////////////////////////////////////////////

if (isset($_POST['Actualizar_Informacion_Pagina'])) {
    $arreglo_id = $_POST['arreglo_id'];
    foreach ($_POST["Arreglo"] as $key => $value) {
        $Campos .= "{$key} = '{$value}',";
    }
    $Campos = trim($Campos, ',');

    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET {$Campos} WHERE id = '{$arreglo_id}' limit 1;");
    $ruta = htmlentities($_SERVER['PHP_SELF']);

    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='?error=Hubo un error al actualizar los datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='?msg=Se actualizo el medicamento correctamente'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////
if ($_GET['Eliminar'] <> "") {
    $id = $_GET['Eliminar'];
    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET Activo='0' WHERE id ='{$id}' limit 1");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='?error=Hubo un error al eliminar los datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='?msg=Se eliminaron los datos correctamente'</script>";
    }
}

///////////////////////////////////////////////////////////////////////////
if (isset($_GET['Editar'])) {
    $id = $_GET['Editar'];
    $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} where id=$id limit 1");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        foreach ($rowMotorizado as $key => $value) {
            $datos["$key"] = "$value";
        }
    }
    $datos_json = json_encode($datos);
    ?>
    <script>
        window.onload = function () {
            var Arreglo = <?php echo $datos_json ?>;
            for (index in Arreglo) {
                if (document.getElementsByName("Arreglo[" + index + "]")[0] != undefined) {
                    document.getElementsByName("Arreglo[" + index + "]")[0].value = Arreglo[index];
                }
                // if (index == "Presentacion") {
                //     $("#Presentacion").append($('<option>', {
                //         value: Arreglo[index],
                //         text: Arreglo[index]
                //     }));
                //     $("#Presentacion > option[value='" + Arreglo[index] + "']").attr("selected", true);

                //     Select2DinamicoArreglo("Presentacion", "Presentacion_Receta", "<?php echo $usuario_id; ?>");


                // }
                // if (index == "Via_Administracion") {

                //     $("#Via_Administracion_Receta").append($('<option>', {
                //         value: Arreglo[index],
                //         text: Arreglo[index]
                //     }));
                //     $("#Via_Administracion_Receta > option[value='" + Arreglo[index] + "']").attr("selected", true);

                //     Select2DinamicoArreglo("Via_Administracion_Receta", "Via_Administracion_Receta",
                //         "<?php echo $usuario_id; ?>");

                // }

            }
        };
    </script>
    <?php
}




#Cierre
if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

function Opciones_Global_Select(mysqli $con, string $name): string
{
    # Esteban
    # Ni la menor idea de como usan esa tabla
    $query = mysqli_query($con, "SELECT Opciones FROM Global_Select WHERE Nombre = '{$name}'");
    $result = json_decode(mysqli_fetch_array($query)["Opciones"]);
    $options = [];
    foreach ($result as $key => $value) {
        $options[] = <<<HTML
        <option value="{$key}">{$value}</option>
        HTML;
    }

    return implode("\n", $options);
}

?>

<style type="text/css">
    .select2-container .select2-selection--single {
        height: 46px !important;
        padding: 15px !important;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Medicamentos </a></li>
        </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
        <div>
            <div class="content">
                <h4 class="Titulo_Pagina"> Medicamentos </h4>
                <div class="box">
                    <div class="box-body">
                        <!-- <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST" class="row"> -->
                        <form action="Medicamentos" method="POST" class="row">
                            <div class="form-group col-md-6">
                                <label>Nombre del Medicamento</label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Nombre]"
                                    placeholder="Nombre del Medicamento" value="" maxlength="120"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Presentacion">Presentación
                                    <!-- <a href="Global_ModuloSelect.php?Tipo=Presentacion_Receta">
                                        <i class="fa fa-cog"></i>
                                    </a> -->
                                </label>
                                <select class="form-control input-lg" name="Arreglo[Presentacion]" id="Presentacion"
                                    placeholder="Presentacion del Medicamento">
                                    <option value="">Seleccione...</option>
                                    <?= Opciones_Global_Select($conn3, 'Presentacion_Receta') ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Via_Administracion_Receta">Vía de Administración
                                    <!-- <a href="Global_ModuloSelect.php?Tipo=Via_Administracion_Receta">
                                        <i class="fa fa-cog"></i>
                                    </a> -->
                                </label>
                                <select class="form-control input-lg" name="Arreglo[Via_Administracion]"
                                    id="Via_Administracion_Receta" placeholder="Vía de Administración del Medicamento">
                                    <option value="">Seleccione...</option>
                                    <?= Opciones_Global_Select($conn3, 'Via_Administracion_Receta') ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Dosis</label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Dosis]"
                                    placeholder="Dosis del Medicamento" value="" maxlength="120"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Composición</label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Composicion]"
                                    placeholder="Composicion del Medicamento" value="" maxlength="240"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Lote</label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Lote]"
                                    placeholder="Lote del Medicamento" value="" maxlength="240"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Fecha de Vencimiento</label>
                                <input type="date" class="form-control input-lg" name="Arreglo[Fecha_Vencimiento]">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Laboratorio</label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Laboratorio]"
                                    placeholder="Laboratorio del Medicamento" value="" maxlength="240"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Indicaciones</label>
                                <textarea class="form-control input-lg" name="Arreglo[Indicaciones]"
                                    placeholder="Indicaciones del Medicamento"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Indicaciones Generales</label>
                                <textarea class="form-control input-lg" name="Arreglo[Indicaciones_Generales]"
                                    placeholder="Indicaciones Generales del Medicamento"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>

                            <input type="hidden" name="Arreglo[ID_principal]" value="<?=$ID_Principal ?>">
                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

                            <?php if ($_GET['Editar'] <> ""): ?>
                                <div class="col-sm-12">
                                    <input type="hidden" name="arreglo_id" value="<?php echo $_GET['Editar'] ?>">
                                    <center><button type=" submit"
                                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                            name="Actualizar_Informacion_Pagina">
                                            <h2> <strong> A c t u a l i z a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php else: ?>
                                <div class="col-sm-12">
                                    <center><button type="submit"
                                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                            name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php endif; ?>
                            <div class="col-sm-12">
                                <hr>
                            </div>
                        </form>


                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="col-md-12 table-responsive">
                                        <h2 style="text-align: center;font-weight: bold;"> Medicamentos </h2>
                                        <table id="Tabla_Rapida_MP" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nombre del Medicamento</th>
                                                    <th scope="col">Presentación</th>
                                                    <th scope="col">Vía de Administración</th>
                                                    <th scope="col">Dosis</th>
                                                    <th scope="col">Lote</th>
                                                    <th scope="col">Fecha Vencimiento</th>
                                                    <th scope="col">Laboratorio</th>
                                                    <th scope="col">Indicaciones</th>
                                                    <th scope="col">Indicaciones Generales</th>

                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                /*

                                                $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} WHERE Activo='1' ");
                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    //$contador++;
                                                    $id = $rowMotorizado['id'];
                                                    $Nombre = $rowMotorizado['Nombre'];
                                                    $Presentacion = $rowMotorizado['Presentacion'];
                                                    $Via_Administracion = $rowMotorizado['Via_Administracion'];
                                                    $Dosis = $rowMotorizado['Dosis'];
                                                    $Lote = $rowMotorizado['Lote'];
                                                    $Fecha_Vencimiento = $rowMotorizado['Fecha_Vencimiento'];
                                                    $Laboratorio = $rowMotorizado['Laboratorio'];
                                                    $Indicaciones = $rowMotorizado['Indicaciones'];
                                                    $Indicaciones_Generales = $rowMotorizado['Indicaciones_Generales'];


                                                    $ruta = htmlentities($_SERVER['PHP_SELF']);
                                                    echo "<tr width='2%'><th scope='row'>{$id}</th>
                                                    <td width='15%' align='center'>{$Nombre}</td>
                                                    <td width='15%' align='center'>{$Presentacion}</td>
                                                    <td width='5%' align='center'>{$Via_Administracion}</td>
                                                    <td width='5%' align='center'>{$Dosis}</td>
                                                    <td width='10%' align='center'>{$Lote}</td>
                                                    <td width='20%' align='center'>{$Fecha_Vencimiento}</td>
                                                    <td width='20%' align='center'>{$Laboratorio}</td>
                                                    <td width='20%' align='center'>{$Indicaciones}</td>
                                                    <td width='20%' align='center'>{$Indicaciones_Generales}</td>
                                                    ";

                                                    echo "<td width='20%' align='center'><font color='#04CC05'> <a href='{$ruta}?Editar={$id}' class='btn btn-primary' style='width: 200px;'><i class='fa fa-pencil' title='Editar'> Editar</i></a></font><br>
                                                    <font> <a href='{$ruta}?Eliminar={$id}' class='btn btn-primary' style='width: 200px;background-color:#ef4259;margin-top:5px;margin-bottom:5px'> <i class='fa fa-close' title='Eliminar'> Eliminar</i></a></font><br>    
                                                    </td></tr>";
                                                }
                                                */

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
<!-- /.content-wrapper -->

<script>
    //version 1 tabla dinamica <table id="Tabla_Rapida_MP"></table>

    var data_table = []; //datos que recibe la tabla
    var titulo_tabla = "Medicamentos"; //titulo de la tabla para las impresiones
    <?php
    include 'funciones/conn3.php';

    //query para sacar la informacion
    $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} WHERE Activo='1' and (usuario_id = 0 or usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') ");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        //$contador++;

        $id = $rowMotorizado['id'];
        $Nombre = QuitarComillasyOtrosCaracteres($rowMotorizado['Nombre']);
        $Presentacion = QuitarComillasyOtrosCaracteres($rowMotorizado['Presentacion']);
        $Via_Administracion = QuitarComillasyOtrosCaracteres($rowMotorizado['Via_Administracion']);
        $Dosis = QuitarComillasyOtrosCaracteres($rowMotorizado['Dosis']);
        $Lote = QuitarComillasyOtrosCaracteres($rowMotorizado['Lote']);
        $Fecha_Vencimiento = $rowMotorizado['Fecha_Vencimiento'];
        $Laboratorio = QuitarComillasyOtrosCaracteres($rowMotorizado['Laboratorio']);
        $Indicaciones = QuitarComillasyOtrosCaracteres($rowMotorizado['Indicaciones']);
        $Indicaciones_Generales = QuitarComillasyOtrosCaracteres($rowMotorizado['Indicaciones_Generales']);

        $ruta = htmlentities($_SERVER['PHP_SELF']);
        $boton1 = "<td width='20%' align='center'><font color='#04CC05'> <a href='{$ruta}?Editar={$id}' class='btn btn-primary' style='width: 200px;'><i class='fa fa-pencil' title='Editar'> Editar</i></a></font><br><font> <a href='{$ruta}?Eliminar={$id}' class='btn btn-primary' style='width: 200px;background-color:#ef4259;margin-top:5px;margin-bottom:5px'> <i class='fa fa-close' title='Eliminar'> Eliminar</i></a></font><br></td></tr>"

            ?>
        //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
        data_table.push(["<?php echo $id ?>", "<?php echo $Nombre ?>", "<?php echo $Presentacion ?>",
            "<?php echo $Via_Administracion ?>", "<?php echo $Dosis ?>", "<?php echo $Lote ?>",
            "<?php echo $Fecha_Vencimiento; ?>", "<?php echo $Laboratorio; ?>", "<?php echo $Indicaciones; ?>",
            "<?php echo $Indicaciones_Generales; ?>", "<?php echo $boton1; ?>"
        ]);
        <?php
    }
    ?>
</script>


<?php
include 'footer.php';
?>


<script>
    /*
        function Select2Dinamico(Nombre, TipoSelect, Usuario) {
            $('#' + Nombre).select2({
                tags: true,
                createTag: function(params) {
                    // Don't offset to create a tag if there is no @ symbol

                    //if (params.term.indexOf('@') === -1) {
                        // Return null to disable tag creation
                      //  return null;
                    //}


                    return {
                        id: params.term,
                        text: params.term
                    }
                }
            }).on('select2:close', function() {
                var element = $(this);
                var new_category = $.trim(element.val());

                //console.log(new_category);
                if (new_category != '') {
                    $.ajax({
                        url: "Global_Ajax.php",
                        method: "POST",
                        data: {
                            Nueva_Opcion_Select_Global: new_category,
                            Tipo_Select_Global: TipoSelect,
                            Usuario_Select_Global: Usuario
                        },
                        success: function(data) {
                            //console.log(data);
                            if (data == 'Error') {
                                alert("Error al crear un nuevo dato");
                            } else if (data == 'Creado') {
                                console.log("existe dato");
                            } else {
                                element.append('<option value="' + data + '">' + new_category + '</option>').val(data).change();
                            }
                        }
                    })
                } else {
                    console.log("Error");
                }
            });
        }
        */

    function Select2DinamicoArreglo(Nombre, Tabla, Usuario, Tag) {
        $('#' + Nombre).select2({
            //placeholder: 'Seleccione...',
            tags: Tag,
            language: {
                errorLoading: function () {
                    return "No se pued en cargar los resultados";
                },
                inputTooLong: function (e) {
                    var t = e.input.length - e.maximum,
                        n = "Por favor borrar " + t + " caracteres";
                    return n
                },
                inputTooShort: function (e) {
                    var t = e.minimum - e.input.length,
                        n = "Por favor ingrese al menos otra vez " + t + " caracteres";
                    return n
                },
                loadingMore: function () {
                    return "Cargar más re sultados ..."
                },
                maximumSelected: function (e) {
                    var t = "Solo puede seleccionar como máximo " + e.maximum + " opciones";
                    return t
                },
                searching: function () {
                    return "Buscand o...";
                },
                noResults: function () {
                    return "¡No hay resultados de búsqueda!";
                }
            },

            ajax: {
                url: "Global_Ajax.php",
                type: "post",

                dataType: 'json',
                data: function (params) {
                    return {
                        searchTerm: params.term,
                        Usuario: Usuario,
                        Tabla: Tabla,
                        Tipo: "GlobalSelect_CargarDatos"
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                createTag: function (params) {
                    // D   on't offset to create a tag if there is no @ symbol
                    if (params.term.indexOf($.trim(this.val())) === -1) {
                        // Return null to disable tag creation
                        return null;
                    }
                    return {
                        id: params.term,
                        text: params.term
                    }
                },
            },
        }).on('select2:close', function () {
            var element = $(this);
            var valor = $.trim(element.val());

            if (valor != '' && Tag == true) {
            $.ajax({
                url: "Global_Ajax.php",
                method: "POST",
                data: {
                    Nueva_Opcion_Select_Global: valor,
                    Tabla: Tabla,
                    Usuario: Usuario,
                    Tipo: "Global Select_CrearDatos",
                },
                success: function (data) {
                    //console.log(data);
                    if (data == 'Error') {
                        alert("Error al crear un nuevo dato");
                        //eliminar el dato selected
                        element.val('').trigger('change');

                    } else if (data == 'Creado') {
                        console.log("existe dato");
                    } else {
                        data = JSON.parse(data);
                        element.append('<option value="' + data[0] + '" data-select2-tag="true">' +
                            new_category + '</option>').val();
                        $(Nombre).val(data[0]).trigger('change.select2');
                    }
                }
            })
        } else if (Tag == false) {
            console.log("Creador Desactivado");
        } else {
            console.log("Error");
        }

    });

}


    function Select2DinamicoTabla(Nombre, Tabla, Datos_Option, Consulta_Where, Usuario, Tag) {
        $('#' + Nombre).select2({
            //placeholder: 'Seleccione...',
            tags: Tag,
            language: {
                errorLoading: function () {
                    return "No se pued en cargar los resultados";
                },
                inputTooLong: function (e) {
                    var t = e.input.length - e.maximum,
                        n = "Por favor borrar " + t + " caracteres";
                    return n
                },
                inputTooShort: function (e) {
                    var t = e.minimum - e.input.length,
                        n = "Por favor ingrese al menos otra vez " + t + " caracteres";
                    return n
                },
                loadingMore: function () {
                    return "Cargar más re sultados ..."
                },
                maximumSelected: function (e) {
                    var t = "Solo puede seleccionar como máximo " + e.maximum + " opciones";
                    return t
                },
                searching: function () {
                    return "Buscand o...";
                },
                noResults: function () {
                    return "¡No hay resultados de búsqueda!";
                }
            },

            ajax: {
                url: "Global_Ajax.php",
                type: "post",

                dataType: 'json',
                data: function (params) {
                    return {
                        searchTerm: params.term,
                        Usuario: Usuario,
                        Datos_Option: Datos_Option,
                        Consulta_Where: Consulta_Where,
                        Tabla: Tabla,
                        Tipo: "TablaSelect_CargarDatos"
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                createTag: function (params) {
                    // D  on't offset to create a tag if there is no @ symbol
                    if (params.term.indexOf($.trim(this.val())) === -1) {
                        // Return null to disable tag creation
                        return null;
                    }
                    return {
                        id: params.term,
                        text: params.term
                    }
                },
            },
        }).on('select2:close', function () {
            var element = $(this);
            var valor = $.trim(element.val());
            if (valor != '' && Tag == true) {
            $.ajax({
                url: "Global_Ajax.php",
                method: "POST",
                data: {
                    Valor: valor,
                    Tabla: Tabla,
                    Datos_Option: Datos_Option,
                    Usuario: Usuario,
                    Tipo: "TablaS elect_CrearDatos",
                },
                success: function (data) {
                    // dividir data por |
                    console.log(data);
                    var data = data.split("|");

                    if (data[0] == 'Error ') {
                        alert("Error al crear un nuevo dato debido a " + data[1]);
                    } else if (data[0] == 'Creado') {
                        console.log("existe dato");
                    } else {
                        element.append('<option value="' + data[0] + '" data-select2-tag="true">' +
                            valor + '</option>').val();
                        $(Nombre).val(data[0]).trigger('change.select2');
                    }
                }
            })
        } else if (Tag == false) {
            console.log("Creador Desactivado");
        } else {
            console.log("Error");
        }

    });

}


    $(document).ready(function () {

        //Select2Dinamico("Presentacion", "Presentacion_Receta", "<?php echo $usuario_id; ?>");
        //Select2Dinamico("Via_Administracion_Receta", "Via_Administracion_Receta", "<?php echo $usuario_id; ?>");

        Campo = "Presentacion"; //Id del campo select
        Tabla = "Presentacion_Receta"; //nombre de la tabla
        Usuario = "<?php echo $usuario_id; ?>"; //id del usuario
        Tag = true; //si se puede crear un nuevo dato
        Select2DinamicoArreglo(Campo, Tabla, Usuario, Tag);

        Campo = "Via_Administracion_Receta"; //Id del campo select
        /*
        Tabla = "cie10";//nombre de la tabla
        Datos_Option = {};
        Datos_Option["ValueOption"]="codigo";// informacion para ["value del option", " texto del option"," validacion para el where cuando se crea un tag busca el valor ingresado en la variable que se ponga aqui"]
        Datos_Option["TextOption"]="codigo|descripcion"; // text del option

            Datos_Option["CampoWhereValue"]="codigo"; // campo donde se va a buscar el valor en el where al momento de buscar la informacion de la tabla para cargarla
        Datos_Option["AgregarQueryCampo"]="descripcion"; // campo adicional para agregar campos necesarios para la consulta
        Datos_Option["AgregarQueryValor"]="Prueba"; // Valor del campo adicional para agregar campos necesarios para la consulta
        //jsonencode de Datos_Option
        Datos_Option = JSON.stringify(Datos_Option);

        Consulta_Where = "";//condicion para la consulta
        */
        Tabla = "Via_Administracion_Receta"; //nombre de la tabla
        Usuario = "<?php echo $usuario_id; ?>"; //id del usuario
        Tag = true; //si se puede crear un nuevo dato

        Select2DinamicoArreglo(Campo, Tabla, Usuario, Tag); //Select con value texto

        //Select2DinamicoTabla(Campo, Tabla, Datos_Option, Consulta_Where, Usuario, Tag) // select  con value del campo id de una tabla

    });
</script>

<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php'; ?>