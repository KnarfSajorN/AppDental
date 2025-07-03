<?php
include '../header.php';
include '../menu.php';


// $_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "ConceptosBanco";
#Inicio
if (isset($_POST['Guardar_Informacion_Pagina'])) {
    echo 'asdasdasd';

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
        {$Campos},
        `Creacion_Dinamica` text DEFAULT '',
        `Activo` varchar(5) DEFAULT '1'
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creación de la tabla');</script>";
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
                echo "<script language='Javascript'> alert('Tabla No fue creada');</script>";
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

    $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (usuario_id,{$Campos}) VALUES ('$usuario_id',{$Valores});");

    $ruta = 'bancosConceptos';
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?entidad_id={$entidad_id}&error=Hubo Un Error Al Guardar El Dato'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?entidad_id={$entidad_id}&msg=Se Guardo El Dato Correctamente'</script>";
    }
}

///////////////////////////////////////////////////////////////////////////

if (isset($_POST['Actualizar_Informacion_Pagina'])) {
    $arreglo_id = $_POST['arreglo_id'];

    foreach ($_POST["Arreglo"] as $key => $value) {
        $Campos .= "{$key} = '{$value}',";
    }
    $Campos = trim($Campos, ',');
    $entidad_id = $_POST['entidad_id'];

    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET {$Campos} WHERE id = '{$arreglo_id}' limit 1;");

    $ruta = 'bancosConceptos';
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Actualizar El Dato'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Actualizo El Dato Correctamente'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////
if ($_GET['Eliminar'] <> "") {
    $id = $_GET['Eliminar'];
    $entidad_id = $_GET['entidad_id'];
    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET Activo='0' WHERE id ='{$id}' limit 1");

    $ruta = 'bancosConceptos';
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Eliminar El Dato'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Elimino el Dato Correctamente'</script>";
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
        window.onload = function() {
            var Arreglo = <?php echo $datos_json ?>;
            for (index in Arreglo) {
                if (document.getElementsByName("Arreglo[" + index + "]")[0] != undefined) {
                    document.getElementsByName("Arreglo[" + index + "]")[0].value = Arreglo[index];
                }


            }
        };
    </script>
<?php
}
#Cierre
if ($_GET["msg"] != "") {
    include "../plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "../plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];

?>

<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="copyPaste"></div>
        <div class="">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4><?= ($_GET['Editar'] != null ? 'Actualizar' : 'Registrar') ?> Concepto</h4>
                                </div>
                            </div>

                            <form action="bancosConceptos" method="POST">
                                <div class="card-body">
                                    <div class="form-group col-md-12">
                                        <label>Código</label>
                                        <input type="text" class="form-control input-lg" name="Arreglo[Codigo]" placeholder="Codigo del Concepto" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Descripción</label>
                                        <input type="text" class="form-control input-lg" name="Arreglo[Descripcion]" placeholder="Descripcion" value="" maxlength="250" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Descripción Detallada</label>
                                        <textarea class="form-control input-lg" name="Arreglo[Descripcion_Detallada]" placeholder="Descripcion Detallada"></textarea>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Tipo Concepto</label>
                                        <select class="form-control input-lg" name="Arreglo[Tipo_Concepto]" placeholder="Tipo Concepto" required>
                                            <option value="">Seleccione</option>
                                            <option value="Ingreso">Ingreso</option>
                                            <option value="Egreso">Egreso</option>
                                            <option value="Gasto">Gasto</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Categoría</label>
                                        <input type="text" class="form-control input-lg" name="Arreglo[Categoria]" placeholder="Categoria" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                    </div>

                                    <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

                                </div>

                                <div class="card-footer">
                                    <?php if ($_GET['Editar'] <> "") : ?>
                                        <div class="col-sm-12">
                                            <input type="hidden" name="arreglo_id" value="<?php echo $_GET['Editar'] ?>">
                                            <button type="submit" class="btn btn-outline-info rounded-pill" name="Actualizar_Informacion_Pagina">
                                                <i class="fa fa-floppy-o"></i>
                                                Actualizar
                                            </button>
                                        </div>
                                    <?php else : ?>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-outline-info rounded-pill" name="Guardar_Informacion_Pagina">
                                                <i class="fa fa-floppy-o"></i>
                                                Guardar
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4>Lista de bancos</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped w-100" id="Tabla_Rapida_AJAX">
                                    <?php
                                    $columnas = [
                                        '#',
                                        'Descripción',
                                        'Código',
                                        'Tipo de concepto',
                                        '',
                                    ];
                                    ?>
                                    <thead>
                                        <tr>
                                            <?php foreach ($columnas as $columna) : ?>
                                                <th><?= $columna ?></th>
                                            <?php endforeach; ?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <?php foreach ($columnas as $columna) : ?>
                                                <th><?= $columna ?></th>
                                            <?php endforeach; ?>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include '../footer.php';
?>
<script>
    function VerificarCaracteres(input) {
        input.value = input.value.replace(/'/g, "");
        input.value = input.value.replace(/"/g, "");
    }
</script>

<script>
    var titulo_tabla = 'conceptos';
    query_tabla_ajax = '<?= "SELECT * from ConceptosBanco where Activo=1 " ?>';
    columnas = ['id', 'usuario_id', 'Codigo', 'Descripcion', 'Descripcion_Detallada', 'Tipo_Concepto', 'Categoria', 'Activo', 'Creacion_Dinamica'];
    columnastablas = [{
            "data": function(row, type, set) {
                botones = ``;
                botones += `${row.id}`;
                return botones;
            }
        },
        {
            "data": function(row, type, set) {
                botones = ``;
                botones += `${row.Descripcion}`;
                return botones;
            }
        },
        {
            "data": function(row, type, set) {
                botones = ``;
                botones += `${row.Codigo}`;
                return botones;
            }
        },
        {
            "data": function(row, type, set) {
                botones = ``;
                botones += `${row.Tipo_Concepto}`;
                return botones;
            }
        },
        {
            "data": function(row, type, set) {
                botones = ``;
                botones += `<a href="./bancosConceptos?Editar=${(row.id)}" class="btn btn-outline-info rounded-pill btn-block">
                    <i class="fa fa-pencil"></i>
                    Editar
                    </a>`;
                    botones += `<a href="./bancosConceptos?Eliminar=${(row.id)}" class="btn btn-outline-danger rounded-pill btn-block">
                    <i class="fa fa-trash"></i>
                    Eliminar
                    </a>`;
                return botones;
            }
        },
    ];
</script>