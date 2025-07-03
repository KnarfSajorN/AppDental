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
    //$ArregloTabla1 = json_decode($arreglo, true);
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

    $Arreglo = $_POST["Arreglo"];
    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE '{$Nombre_Tabla}'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {
        foreach ($Arreglo as $key => $value) {
            if ($key == "Precio") {
                $Campos .= "`{$key}` FLOAT NULL DEFAULT '0',";
            } else {
                $Campos .= "`{$key}` text DEFAULT '',";
            }
        }
        $Campos = trim($Campos, ',');

        $query = "CREATE TABLE `{$Nombre_Tabla}` (
      `id` int(11) NOT NULL,
      `usuario_id` int(11) NOT NULL,
      `Fecha_Registro` date DEFAULT current_timestamp(),
      {$Campos},
      `Caracteristicas` text DEFAULT '[]',
      `categoria_id` int(11) NOT NULL,
      `Creacion_Dinamica` text DEFAULT '',
      `Activo` varchar(5) DEFAULT '1'
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` CHANGE `Precio` `Precio` FLOAT  NULL DEFAULT '0';");
            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` CHANGE `En_Dos_Tablas` `En_Dos_Tablas` TEXT  NULL DEFAULT 'No';");
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
                        if ($key == "Precio") {
                            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD `{$key}` FLOAT NULL DEFAULT '0';");
                        } elseif ($key == "En_Dos_Tablas") {
                            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD `{$key}` TEXT NULL DEFAULT 'No';");
                        } else {
                            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD `{$key}` TEXT NULL DEFAULT '';");
                        }
                    }
                }

                $ArregloManual = ["Caracteristicas", "categoria_id", "Valores_Referencia_Filtrado"];
                $ArregloManualRespuesta = ["text DEFAULT '[]'", "int(11) NOT NULL", "text DEFAULT '[]'"];
                foreach ($ArregloManual as $key => $value) {
                    $Campo = mysqli_query($conn3, "show COLUMNS from {$Nombre_Tabla} WHERE Field = '{$value}';");
                    $nrowCampo = mysqli_num_rows($Campo);
                    if ($nrowCampo == 0) {
                        mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD `{$value}` {$ArregloManualRespuesta[$key]} AFTER `Creacion_Dinamica`;");
                    }
                }
            } else {
                echo "<script language='Javascript'> alert('Tabla No fue creada Dinamicamente');</script>";
                // si bota este mensaje es por que la tabla no esta creado el campo *Creacion_Dinamica* sirve para que no se use este modulo en tablas ya preexistentes
            }
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

    //////////////////////////////////////////////////////////////////////////////////
    $Arreglonuevo = FuncionDatosTablaAltEditor($_POST["Arreglo_Tabla"]["Valores_Referencia_Filtrado"]);
    //////////////////////////////////////////////////////////////////////////////////////

    $categoria_id = $_POST['Arreglo']['categoria_id'];
    $usuario_id = $_POST['usuario_id'];
    $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (usuario_id,Valores_Referencia_Filtrado,{$Campos}) VALUES ('$usuario_id', '$Arreglonuevo', {$Valores});");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='LB_CrearExamenes?error=Hubo Un Error Al Guardar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='LB_CrearExamenes?Categoria={$categoria_id}&msg=Se Guardaron Los Datos Correctamente'</script>";
    }
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


<style>

.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Registro de Exámenes </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina"> <a href='<?php echo "{$Base}LB_CrearCategorias.php"; ?>'> <i class="fa-solid fa-right-from-bracket fa-rotate-180"></i></a>&nbsp;&nbsp;Registro de Exámenes </h4>
                <div class="box">
                    <div class="box-body">
                        <form action='<?php echo htmlentities($_SERVER["PHP_SELF"]) . "?"; ?>' method="POST" class="row">
                            <div class="form-group col-md-6">
                                <label>Nombre del Examen</label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Nombre]" data-name="Nombre del Examen" placeholder="Nombre" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Método</label>
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
                                <label>Examen en Dos Tablas en una Misma Hoja *Usar si el Examen es Muy Largo y Desea que Aparezca en un Hoja*</label>
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
                                <label>Interpretación</label>
                                <textarea name="Arreglo[Interpretacion]" id="editor2" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>




                            <div class="col-md-12 row">
                                <div class="col-12">

                                    <div class="card collapsed-card">
                                        <div class="card-header">
                                            <h3 class="card-title" style="width: 100%">  <button type="button" class="btn btn-block btn-outline-success btn-lg rounded-pill shadow" data-card-widget="collapse" title="Collapse" type="button"><i class="fas fa-plus"></i> Más Opciones </button> </h3>

                                        </div>
                                        <div class="card-body" style="display: none;">

                                            <div class="col-md-12 row">

                                                <div class="form-group col-md-6">
                                                    <label style="float: left;">Campo de Resultado &nbsp;&nbsp;&nbsp;</label>
                                                    <input type="checkbox" class="checkbox" value="Numerico" name="Arreglo[Campo_Resultado]" data-name="Campo Resultado" style="float: left;" onclick="CheckBoxUno(this)" /> <label style="float: left;">&nbsp; Numérico &nbsp;</label>
                                                    <input type="checkbox" class="checkbox" value="Texto" name="Arreglo[Campo_Resultado]" data-name="Campo Resultado" style="float: left;" onclick="CheckBoxUno(this)" required checked /> <label style="float: left;">&nbsp; Texto &nbsp;</label>
                                                    <input type="checkbox" class="checkbox" value="Lista" name="Arreglo[Campo_Resultado]" data-name="Campo Resultado" style="float: left;" onclick="CheckBoxUno(this)" /> <label>&nbsp; Lista &nbsp;</label>
                                                    <script>
                                                        function CheckBoxUno(checkbox) {
                                                            var checkboxes = document.getElementsByName('Arreglo[Campo_Resultado]');
                                                            var contador = 0;
                                                            checkboxes.forEach((item) => {
                                                                if (item !== checkbox) {
                                                                    item.checked = false;
                                                                }
                                                                if (item.checked == true) {
                                                                    contador++;
                                                                    item.required = true;
                                                                } else {
                                                                    item.required = false;
                                                                }
                                                            });

                                                            if (contador == "0") {
                                                                checkboxes.forEach((item) => {
                                                                    item.required = true;
                                                                });
                                                            }

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
                                        </div>
                                        <div class="card-footer" style="display: none;">
                                            Opciones
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            /*
                            <div class="form-group col-md-12">
                                <div class="panel panel-default" style="background-color: #dadada;padding: 10px;border-radius: 20PX;">
                                    <div class="panel-heading" style="padding-top: 10px;padding-left: 20px;">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapse1" style="color:black;">Mas Opciones del Examen</a>
                                        </h4>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse">
                                        <div class="panel-body row">

                                            <div class="form-group col-md-6">
                                                <label style="float: left;">Campo de Resultado &nbsp;&nbsp;&nbsp;</label>
                                                <input type="checkbox" class="checkbox" value="Numerico" name="Arreglo[Campo_Resultado]" data-name="Campo Resultado" style="float: left;" onclick="CheckBoxUno(this)" /> <label style="float: left;">&nbsp; Numérico &nbsp;</label>
                                                <input type="checkbox" class="checkbox" value="Texto" name="Arreglo[Campo_Resultado]" data-name="Campo Resultado" style="float: left;" onclick="CheckBoxUno(this)" required checked /> <label style="float: left;">&nbsp; Texto &nbsp;</label>
                                                <input type="checkbox" class="checkbox" value="Lista" name="Arreglo[Campo_Resultado]" data-name="Campo Resultado" style="float: left;" onclick="CheckBoxUno(this)" /> <label>&nbsp; Lista &nbsp;</label>
                                                <script>
                                                    function CheckBoxUno(checkbox) {
                                                        var checkboxes = document.getElementsByName('Arreglo[Campo_Resultado]');
                                                        var contador = 0;
                                                        checkboxes.forEach((item) => {
                                                            if (item !== checkbox) {
                                                                item.checked = false;
                                                            }
                                                            if (item.checked == true) {
                                                                contador++;
                                                                item.required = true;
                                                            } else {
                                                                item.required = false;
                                                            }
                                                        });

                                                        if (contador == "0") {
                                                            checkboxes.forEach((item) => {
                                                                item.required = true;
                                                            });
                                                        }

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

                                            <!--
                                            <div class="form-group col-md-12">
                                                <label>Formulas</label>
                                                <select name="Arreglo[Formulas][]" id="Formulas" class="form-control input-lg select2" style="width:100%" multiple>
                                                    <?php
                                                    $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} WHERE categoria_id = '$categoria_id' AND Caracteristicas<>'' AND Activo='1' ");
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                        $id = $rowMotorizado["id"];
                                                        $Nombre = $rowMotorizado["Nombre"];
                                                        $Categoria = funcionMaster($rowMotorizado["categoria_id"], 'id', 'Nombre', 'LB_Categoria');

                                                        echo "<option value='id=$id'>[{$Categoria}] - {$Nombre} </option>";
                                                    }
                                                    echo "<option value='*'>*</option>";
                                                    echo "<option value='/'>/</option>";
                                                    echo "<option value='+'>+</option>";
                                                    echo "<option value='-'>-</option>";
                                                    echo "<option value='('>(</option>";
                                                    echo "<option value=')'>)</option>";

                                                    ?>
                                                </select>
                                            </div>
                                            -->
                                        </div>
                                        <div class="panel-footer">Mas Opciones</div>
                                    </div>
                                </div>
                            </div>*/?>

                                            <div class="form-group col-md-12">
                                                <label>Categorías</label>
                                                <select name="Arreglo[categoria_id]" id="categoria_id" class="form-control input-lg select2" style="width:100%" required>
                                                    <option value=''> Seleccione  </option>
                                                    <?php
                                                    $queryList = mysqli_query($conn3, "SELECT * FROM LB_Categoria WHERE Activo='1' ");
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                        $id = $rowMotorizado["id"];
                                                        $Nombre = $rowMotorizado["Nombre"];

                                                        echo "<option value='$id'> {$Nombre} </option>";
                                                    }

                                                    ?>
                                                </select>
                                            </div>

                            <div class="form-group col-md-12">
                                <hr>
                            </div>

                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">
                            <!--<input type="hidden" name="categoria_id" value="<?php echo $categoria_id; ?>">-->

                            <?php if ($_GET['Editar'] <> "") : ?>
                                <div class="col-sm-12">
                                    <input type="hidden" name="arreglo_id" value="<?php echo $_GET['Editar'] ?>">
                                    <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Actualizar_Informacion_Pagina">
                                            <h2> <strong> A c t u a l i z a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php else : ?>
                                <div class="col-sm-12">
                                    <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php endif; ?>
                            <br><br>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<style>
.Boton_Agregar_Ventana{
    background-color:white !important;
}
.altEditor-modal > div > form > div > .modal-body > div {
    display:flex;
}
#addbutton{

}
</style>

<?php
include 'footer.php';
?>

<!-- DataTables -->
<script src="js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="plugins/DataTablesK2/datatables.css" />
<script type="text/javascript" src="plugins/DataTablesK2/datatables.js"></script>





<script>
    $("form input").on("invalid", function() {
        //find tab id           
        if ($(this).is(':invalid')) {
            alert("Falta llenar el campo : " + $(this).attr("data-name"));
        }
    });
</script>


<script src="plugins/DataEditor/dataTables.altEditor.free.js"></script>

<script type="text/javascript">
    function TablaFiltros(Nombre, Valor) {

        var dataSet = JSON.parse(Valor);
        //console.log(dataSet)

        var columnDefs1 = [{
                data: "id_Filtro",
                title: "id_Filtro",
                type: "readonly",
                value: "0",
                /*
                render: function(data, type, row, meta) {
                    return '<a class="editbutton fa fa-pencil btn btn-info" href="#">  # ' + data + ' - Editar </a>';
                }*/
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
                required: true,
                "options": [
                    "Numérico",
                    "Texto"
                ]
            },
            {
                title: "Valor Mínimo",
                id: "Valor_Referencia_Minima",
                data: "Valor_Referencia_Minima",
                type: "number"
            },
            {
                title: "Valor Máximo",
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
                title: "Edad Mínima",
                id: "Edad_Minima",
                data: "Edad_Minima",
                type: "range"
            },
            {
                title: "Edad Máxima",
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
                    //return '<a class="delbutton fa fa-minus-square btn btn-danger" href="#"> - Borrar </a>';
                    return '<a class="editbutton fa fa-pencil btn btn-block btn-outline-info btn-lg rounded-pill shadow" href="#"> Editar </a><br><a class="delbutton fa fa-minus-square btn btn-block btn-outline-danger btn-lg rounded-pill shadow" href="#"> Borrar </a>';
                },
                disabled: true
            }
        ];

        var myTable;

        myTable = $('#' + Nombre).DataTable({
            "sPaginationType": "full_numbers",
            autoWidth: false,
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
                className: 'btn btn-block btn-outline-info btn-lg rounded-pill shadow Boton_Agregar_Ventana'
            }],
            onAddRow: function(datatable, rowdata, success, error) {
                success(rowdata);

                var Datos = JSON.parse(document.getElementById("Valores_Referencia_Filtrado").value);
                Datos.push(rowdata);
                var jsonFinal = JSON.stringify(Datos);
                document.getElementById('Valores_Referencia_Filtrado').value = jsonFinal;
                //console.log(jsonFinal);
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
                console.log(rowdata);
                Datos[rowdata.id_Filtro] = rowdata;
                var jsonFinal = JSON.stringify(Datos);
                document.getElementById('Valores_Referencia_Filtrado').value = jsonFinal;
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

            var Datos = JSON.parse(document.getElementById("Valores_Referencia_Filtrado").value);
            var largo = Datos.length;

            console.log(Datos);

            if (tipo == "Editar") {
                
            } else if (tipo == "Agregar") {
                document.getElementById('id_Filtro').value = largo;
                $("#Color_Correcto").val("#B9F3C8");
            }

            var Valores_Referencia = document.getElementById('Tipo_Filtro');
            Valores_Referencia.onchange = function() {
                var Resultado1 = document.getElementById('Tipo_Filtro').value;
                if (Resultado1 == "Numérico") {
                    document.getElementById('Valor_Referencia_Minima').type = "number";
                    document.getElementById('Valor_Referencia_Maxima').type = "number";
                    document.getElementById('Valor_Referencia_Minima').step = "0.01";
                    document.getElementById('Valor_Referencia_Maxima').step = "0.01";

                    document.getElementById('Valor_Referencia_Minima').placeholder = "Valor Mínimo";
                    document.getElementById('Valor_Referencia_Maxima').placeholder = "Valor Máximo";

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
                    Edad_Minima.disabled = true;
                    Edad_Maxima.disabled = true;
                } else {
                    Edad_Minima.disabled = false;
                    Edad_Maxima.disabled = false;
                }
            }
            Tipo_Edad.onchange();

        }

    }

    <?php if (!isset($_GET['Editar'])) : ?>
        TablaFiltros("TablaFiltroValores", "[]");
    <?php endif; ?>
</script>


<!--  /////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!--  /////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!--  /////////////////////////////////////////////////////////////////////////////////////////////////////// -->

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
        max-height: 50px;
        min-height: 50px;
        display: block;
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

.modal-dialog {
    max-width:none!important;
}

</style>

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

    function Select2DinamicoMultipleSimpleFormula(Nombre) {
        $('#' + Nombre).select2({
            tags: true,
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
        Select2DinamicoMultipleSimpleFormula("Formulas");
    });
</script>
<script>
  // no quitar para evitar problemas de que guarde con este caracter ""
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>