<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "LB_Examen";

function FuncionDatosTablaAltEditor($arreglo)
{
    //esto sirve para que cuando para revertir la funcion DatosIngresarMysqli para tratar usar el arreglo
    $ArregloLimpio = strtr($arreglo, [
        '\0'   => "\x00",
        '\n'   => "\n",
        '\r'   => "\r",
        '\\\\' => "\\",
        "\'"   => "'",
        '\"'   => '"',
        '\Z' => "\x1a"
    ]);
    //

    $ArregloTabla1 = json_decode($ArregloLimpio, true);
    $Arreglonuevo = [];

    foreach ($ArregloTabla1 as $key => $value) {
        if ($value != null) {
            $Arreglonuevo[] = $value;
        }
    }
    foreach ($Arreglonuevo as $key => $value) {
        foreach ($value as $key1 => $value1) {
            if ($key1 == "id_Filtro") {
                $Arreglonuevo[$key][$key1] = $key;
            }
        }
    }

    return json_encode($Arreglonuevo, JSON_UNESCAPED_UNICODE);
}

if (isset($_POST['Guardar_Informacion_Pagina'])) {

    $Campo1 = mysqli_query($conn3, "show COLUMNS from {$Nombre_Tabla} WHERE Field = 'Nombre_Filtro';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD `Nombre_Filtro` TEXT NULL DEFAULT 'Principal' COMMENT 'Principal = Examen sin filtros Diferente a Principal examenes con filtros *Creado desde modulo de Laboratorio(CrearExamenesFiltros)*'");
    }

    $Arreglo = $_POST["Arreglo"];
    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE '{$Nombre_Tabla}'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 1) {
        $Campo1 = mysqli_query($conn3, "show COLUMNS from {$Nombre_Tabla} WHERE Field = 'Creacion_Dinamica';");
        $nrowCampo1 = mysqli_num_rows($Campo1);
        if ($nrowCampo1 == "1") {
            foreach ($Arreglo as $key => $value) {
                $Campo = mysqli_query($conn3, "show COLUMNS from {$Nombre_Tabla} WHERE Field = '{$key}';");
                $nrowCampo = mysqli_num_rows($Campo);
                if ($nrowCampo == 0) {
                    if ($key == "Filtro_Edad") {
                        mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD `{$key}` TEXT NULL DEFAULT '" . '["0.00","0.00"]' . "';");
                    } else {
                        mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD `{$key}` TEXT NULL DEFAULT '';");
                    }
                }
            }
        } else {
            echo "<script language='Javascript'> alert('Tabla No fue creada Dinamicamente');</script>";
            // si bota este mensaje es por que la tabla no esta creado el campo *Creacion_Dinamica* sirve para que no se use este modulo en tablas ya preexistentes
        }
    }

    $Campos = "";
    $Valores = "";
    foreach ($_POST["Arreglo"] as $key => $value) {

        $Campos .= $key . ',';
        $ValoresArray = array();
        if (is_array($value)) {
            foreach ($value as $key1 => $value1) {
                $ValoresArray[] = $value1;
            }
            $ListaFinal = json_encode($ValoresArray, JSON_UNESCAPED_UNICODE);
            $Valores .= "'{$ListaFinal}',";
        } else {
            $Valores .= "'{$value}',";
        }
    }
    $Campos = trim($Campos, ',');
    $Valores = trim($Valores, ',');

    $categoria_id = $_POST['categoria_id'];
    $usuario_id = $_POST['usuario_id'];
    $Arreglonuevo = FuncionDatosTablaAltEditor($_POST["Arreglo_Tabla"]["Valores_Referencia_Filtrado"]);

    $examen_relacionado_id = $_POST['examen_relacionado_id'];
    $Caracteristicas = funcionMaster($examen_relacionado_id, 'id', 'Caracteristicas', 'LB_Examen');


    $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (usuario_id,categoria_id,examen_relacionado_id,Caracteristicas,Valores_Referencia_Filtrado,{$Campos}) VALUES ('$usuario_id', '$categoria_id', '$examen_relacionado_id','$Caracteristicas','$Arreglonuevo', {$Valores});");

    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='LB_HistorialFiltros.php?Categoria={$categoria_id}&Examen={$examen_relacionado_id}&error=Hubo Un Error Al Guardar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='LB_HistorialFiltros.php?Categoria={$categoria_id}&Examen={$examen_relacionado_id}&msg=Se Guardaron Los Datos Correctamente'</script>";
    }
}

if (isset($_POST['Actualizar_Informacion_Pagina'])) {
    $arreglo_id = $_POST['arreglo_id'];
    foreach ($_POST["Arreglo"] as $key => $value) {

        $ValoresArray = array();
        if (is_array($value)) {
            foreach ($value as $key1 => $value1) {
                $ValoresArray[] = $value1;
            }
            $ListaFinal = json_encode($ValoresArray, JSON_UNESCAPED_UNICODE);
            $Campos .= "{$key} = '{$ListaFinal}',";
        } else {
            $Campos .= "{$key} = '{$value}',";
        }
    }

    if (!isset($_POST["Arreglo"]["Valor_Campo_Resultado"])) {
        $Campos .= "Valor_Campo_Resultado = '',";
    }

    $Campos = trim($Campos, ',');
    $categoria_id = $_POST['categoria_id'];
    $Arreglonuevo = FuncionDatosTablaAltEditor($_POST["Arreglo_Tabla"]["Valores_Referencia_Filtrado"]);

    $examen_relacionado_id = $_POST['examen_relacionado_id'];

    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET {$Campos},Valores_Referencia_Filtrado='$Arreglonuevo' WHERE id = '{$arreglo_id}' limit 1;");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='LB_HistorialFiltros.php?Categoria={$categoria_id}&Examen={$examen_relacionado_id}&error=Hubo Un Error Al Editar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='LB_HistorialFiltros.php?Categoria={$categoria_id}&Examen={$examen_relacionado_id}&msg=Se Actualizaron Los Datos Correctamente'</script>";
    }
}



if ($_GET['Eliminar'] <> "") {
    $id = $_GET['Eliminar'];
    $categoria_id = $_GET['Categoria'];
    $ExamenRaiz = $_GET['ExamenRaiz'];

    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET Activo='0' WHERE id ='{$id}' limit 1");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='LB_HistorialFiltros.php?Categoria={$categoria_id}&Examen={$ExamenRaiz}&error=Hubo Un Error Al Eliminar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='LB_HistorialFiltros.php?Categoria={$categoria_id}&Examen={$ExamenRaiz}&msg=Se Eliminaron Los Datos Correctamente'</script>";
    }
}


if (isset($_GET['Editar']) or isset($_GET['ExamenRaiz'])) {
    $id = $_GET['Editar'];
    if ($id == "") {
        $id = $_GET['ExamenRaiz'];
    }

    $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} where id=$id limit 1");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        foreach ($rowMotorizado as $key => $value) {
            $datos["$key"] = "$value";
        }
    }
    $datos_json = json_encode($datos);
?>
    <script>
        window.onload = function() {
            var Arreglo = <?php echo $datos_json ?>;
            //console.log(Arreglo);
            for (index in Arreglo) {

                if (document.getElementsByName("Arreglo[" + index + "]")[0] != undefined && index != "Campo_Resultado" && index != "Valores_Referencia_Filtrado" && index != "Nombre_Filtro") {
                    document.getElementsByName("Arreglo[" + index + "]")[0].value = Arreglo[index];
                }

                if (index == "Nombre_Filtro" && Arreglo[index] != "Principal") {
                    document.getElementsByName("Arreglo[" + index + "]")[0].value = Arreglo[index];
                }

                if (index == "Valor_Campo_Resultado" && Arreglo[index] != "") {
                    var Arreglo1 = JSON.parse((Arreglo[index]));
                    var Values = new Array();
                    for (index1 in Arreglo1) {
                        $("#Valor_Campo_Resultado").append('<option>' + Arreglo1[index1] + '</option>');
                        Values.push(Arreglo1[index1]);
                    }
                    $("#Valor_Campo_Resultado").val(Values).trigger('change');
                }

                if (index == "Campo_Resultado") {
                    var Checks = document.getElementsByName("Arreglo[" + index + "]");
                    console.log(Checks.length);
                    for (let index1 = 0; index1 < Checks.length; index1++) {
                        if (Checks[index1].value == Arreglo[index]) {
                            Checks[index1].checked = true;
                            if (Checks[index1].value == "Lista") {
                                $("#Valor_Campo_Resultado").prop("disabled", false);
                            }
                        }
                    }
                }


                if (index == "Valores_Referencia_Filtrado") {
                    document.getElementsByName("Arreglo_Tabla[" + index + "]")[0].value = Arreglo[index];
                    TablaFiltros(<?php echo $id; ?>, "TablaFiltroValores");
                }

                if (index == "Filtro_Sexo") {
                    if (Arreglo[index] == "") {
                        document.getElementsByName("Arreglo['Filtro_Sexo']")[0].value = "Ninguno";
                    }
                    $('#' + index).select2();
                }


                if (index == "Filtro_Edad") {
                    document.getElementsByName("Arreglo[" + index + "]")[0].value = Arreglo[index];
                    document.getElementById('slider-snap').noUiSlider.set(JSON.parse(Arreglo[index]));
                    console.log(Arreglo[index]);
                }


            }
        };
    </script>
<?php
}

if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
$categoria_id = $_GET["Categoria"];
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Registro de Examenes </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="content">
                <h4 class="Titulo_Pagina"> <a href='<?php echo "{$Base}LB_HistorialFiltros.php?Categoria={$categoria_id}&Examen={$_GET['ExamenRaiz']}"; ?>'> <i class="fa-solid fa-right-from-bracket fa-rotate-180"></i></a>&nbsp;&nbsp;Registro de Examenes </h4>
                <div class="box">
                    <div class="box-body">
                        <form action='<?php echo htmlentities($_SERVER["PHP_SELF"]) . "?Categoria={$categoria_id}"; ?>' method="POST">

                            <div class="form-group col-md-12">
                                <label>Nombre del Filtro </label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Nombre_Filtro]" id="Nombre_Filtro" placeholder="Nombre del Filtro" value="" maxlength="120" onchange="this.value = this.value.trim(); if (this.value=='Principal' || this.value=='principal'){ this.value = '';}if(this.value.length > this.maxLength){this.value = this.value.slice(0, this.maxLength);}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Nombre del Examen</label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Nombre]" placeholder="Nombre" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Metodo</label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Metodo]" placeholder="Metodo" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Precio</label>
                                <input type="number" class="form-control input-lg" name="Arreglo[Precio]" value="0" step="0.01" placeholder="Precio" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Unidades de Referencia</label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Unidades_Referencia]" placeholder="Unidades de Referencia" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Examen en dos tablas misma hoja *Usar si el examen es muy largo y desea que aparezca en un hoja*</label>
                                <select name="Arreglo[En_Dos_Tablas]" class="form-control input-lg">
                                    <option>No</option>
                                    <option>Si</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Valores de Referencia</label>
                                <textarea name="Arreglo[Valores_Referencia]" id="editor1" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Interpretacion</label>
                                <textarea name="Arreglo[Interpretacion]" id="editor2" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>



                            <div class="form-group col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapse1">Mas Opciones del Examen</a>
                                        </h4>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse">
                                        <div class="panel-body">

                                            <div class="form-group col-md-6">
                                                <label style="float: left;">Campo de Resultado &nbsp;&nbsp;&nbsp;</label>
                                                <input type="checkbox" class="checkbox" value="Numerico" name="Arreglo[Campo_Resultado]" style="float: left;" onclick="CheckBoxUno(this)" /> <label style="float: left;">&nbsp; Numerico &nbsp;</label>
                                                <input type="checkbox" class="checkbox" value="Texto" name="Arreglo[Campo_Resultado]" style="float: left;" onclick="CheckBoxUno(this)" /> <label style="float: left;">&nbsp; Texto &nbsp;</label>
                                                <input type="checkbox" class="checkbox" value="Lista" name="Arreglo[Campo_Resultado]" style="float: left;" onclick="CheckBoxUno(this)" /> <label>&nbsp; Lista &nbsp;</label>
                                                <script>
                                                    function CheckBoxUno(checkbox) {
                                                        var checkboxes = document.getElementsByName('Arreglo[Campo_Resultado]')
                                                        checkboxes.forEach((item) => {
                                                            if (item !== checkbox) item.checked = false
                                                        })

                                                        if (checkbox.value == "Lista") {
                                                            //document.getElementById("Valor_Campo_Resultado").readOnly = false;
                                                            $("#Valor_Campo_Resultado").prop("disabled", false);
                                                        } else {
                                                            //document.getElementById("Valor_Campo_Resultado").readOnly = true;
                                                            $("#Valor_Campo_Resultado").prop("disabled", true);
                                                            $('#Valor_Campo_Resultado').val(null).trigger('change');
                                                        }

                                                        if (checkbox.checked != true) {
                                                            $("#Valor_Campo_Resultado").prop("disabled", true);
                                                            $('#Valor_Campo_Resultado').val(null).trigger('change');
                                                        }
                                                    }
                                                </script>
                                                <select name="Arreglo[Valor_Campo_Resultado][]" class="form-control input-lg" id="Valor_Campo_Resultado" multiple style="width:100%">
                                                </select>
                                            </div>


                                            <div class="form-group col-md-6">
                                                <label>Filtro Valores de Referencia</label>
                                                <table cellpadding="0" cellspacing="0" border="0" class="dataTable table table-striped" id="TablaFiltroValores" style="width:100%">
                                                </table>
                                                <input type="hidden" name="Arreglo_Tabla[Valores_Referencia_Filtrado]" id="Valores_Referencia_Filtrado" value='[]'>
                                            </div>

                                        </div>
                                        <div class="panel-footer">Mas Opciones</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Filtro Por Sexo</label>
                                <select name="Arreglo[Filtro_Sexo]" id="Filtro_Sexo" class="form-control input-lg select2" style="width:100%" required>
                                    <option selected>Ninguno</option>
                                    <option>Masculino</option>
                                    <option>Femenino</option>
                                </select>
                            </div>

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js" integrity="sha512-T5Bneq9hePRO8JR0S/0lQ7gdW+ceLThvC80UjwkMRz+8q+4DARVZ4dqKoyENC7FcYresjfJ6ubaOgIE35irf4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.css" integrity="sha512-MKxcSu/LDtbIYHBNAWUQwfB3iVoG9xeMCm32QV5hZ/9lFaQZJVaXfz9aFa0IZExWzCpm7OWvp9zq9gVip/nLMg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

                            <div class="form-group col-md-6">
                                <label>Filtro Por Edad <b>[Edad Minima <div id="slider-snap-value-lower" style="display: contents;"></div>]</b> - <b>[Edad Maxima <div id="slider-snap-value-upper" style="display: contents;"></div>]</b></label>
                                <div id="slider-snap"></div>
                            </div>

                            <input type="hidden" name="Arreglo[Filtro_Edad]" id="Filtro_Edad" value='["0.00","0.00"]'>


                            <script>
                                function Llenar(Nombre, Valor) {
                                    var Datos = JSON.parse(document.getElementById("Filtro_Edad").value);
                                    console.log(Datos);
                                    if (Datos == "") {
                                        Datos = '["0.00","0.00"]';
                                    }
                                    if (Nombre == "slider-snap-value-lower") {
                                        Datos[0] = Valor
                                    }
                                    if (Nombre == "slider-snap-value-upper") {
                                        Datos[1] = Valor
                                    }
                                    document.getElementById('Filtro_Edad').value = JSON.stringify(Datos);
                                }

                                var snapSlider = document.getElementById('slider-snap');

                                noUiSlider.create(snapSlider, {
                                    start: [0, 0],
                                    connect: true,
                                    step: 1,
                                    range: {
                                        'min': 0,
                                        'max': 100
                                    },
                                    pips: {
                                        mode: 'values',
                                        values: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
                                        density: 4
                                    },
                                });

                                var snapValues = [
                                    document.getElementById('slider-snap-value-lower'),
                                    document.getElementById('slider-snap-value-upper')
                                ];

                                snapSlider.noUiSlider.on('update', function(values, handle) {
                                    snapValues[handle].innerHTML = values[handle];

                                    Llenar(snapValues[handle].id, values[handle]);
                                });
                            </script>

                            <div class="form-group col-md-12"></div>

                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">
                            <input type="hidden" name="categoria_id" value="<?php echo $categoria_id; ?>">
                            <input type="hidden" name="examen_relacionado_id" value="<?php echo $_GET['ExamenRaiz']; ?>">

                            <?php if ($_GET['Editar'] <> "") : ?>
                                <div class="col-sm-12">
                                    <input type="hidden" name="arreglo_id" value="<?php echo $_GET['Editar'] ?>">
                                    <center><button type="submit" class="btn btn-block btn-primary btn-sm" name="Actualizar_Informacion_Pagina">
                                            <h2> <strong> A c t u a l i z a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php else : ?>
                                <div class="col-sm-12">
                                    <center><button type="submit" class="btn btn-block btn-primary btn-sm" name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php endif; ?>

                        </form>

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

    <?php if (!isset($_GET['Editar']) and !isset($_GET['ExamenRaiz'])) : ?>
        TablaFiltros(0, "TablaFiltroValores");
    <?php endif; ?>
</script>


<!--  /////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!--  /////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!--  /////////////////////////////////////////////////////////////////////////////////////////////////////// -->


<script src="plugins/CkeditorK/ckeditor.js"></script>

<script>
    function Select2DinamicoMultipleSimple(Nombre) {
        $('#' + Nombre).select2({
            tags: true,
            disabled: true,
            createTag: function(params) {
                return {
                    id: params.term,
                    text: params.term
                }
            }
        })
    }

    $(document).ready(function() {
        Select2DinamicoMultipleSimple("Valor_Campo_Resultado");
    });
</script>