<?php
include '../header.php';
include '../menu.php';
$ID = $_SESSION['ID'];
$tabla = "nominaEmpresas";
$page = 'nominaEmpresas';
// cargar datos
if ($_GET['FAID']) {
    $FAID = base64_decode($_GET['FAID']);
    $queryConfig = "SELECT * from $tabla where id = $FAID limit 1";
    $resultConfig = mysqli_query($conn3, $queryConfig);
    $rowConfig = mysqli_fetch_array($resultConfig);
}
?>

<div class="content-wrapper p-3">
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4><?= ($rowConfig != null ? 'Editar empresa #' . $rowConfig['id'] : 'Registrar nueva empresa') ?> </h4>
                                </div>
                            </div>
                            <form id="correoForm">
                                <div class="card-body row">
                                    <div class="form-group col-md-12">
                                        <label for="">Nombre</label>
                                        <input type="text" class="form-control" id="" name="datos[nombre]" value="<?= $rowConfig['nombre'] ?>" autocomplete="new-password">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="">Siglas</label>
                                        <input type="text" class="form-control" id="" name="datos[siglas]" value="<?= $rowConfig['siglas'] ?>" autocomplete="new-password">
                                    </div> -->

                                    <div class="col-md-4">
                                        <label for="">Tipo de documento</label>
                                        <select name="datos[tipoDocumento]" id="tipoDocumento" class="form-control">
                                            <option <?= ($rowConfig['tipoDocumento'] == "NIT" ? 'selected' : '') ?> value="NIT">NIT</option>
                                            <option <?= ($rowConfig['tipoDocumento'] == "RUC" ? 'selected' : '') ?> value="RUC">RUC</option>
                                            <option <?= ($rowConfig['tipoDocumento'] == "RUT" ? 'selected' : '') ?> value="RUT">RUT</option>
                                            <option <?= ($rowConfig['tipoDocumento'] == "RIF" ? 'selected' : '') ?> value="RIF">RIF</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Documento fiscal</label>
                                        <input type="number" class="form-control" id="" name="datos[documento]" value="<?= $rowConfig['documento'] ?>" autocomplete="new-password">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">DV</label>
                                        <input type="number" class="form-control" id="" name="datos[dv]" value="<?= $rowConfig['dv'] ?>" autocomplete="new-password">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="">Dirección</label>
                                        <input type="text" class="form-control" id="" name="datos[direccion]" value="<?= $rowConfig['direccion'] ?>" autocomplete="new-password">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="">Actividad económica</label>
                                        <select name="datos[actividad_economica]" class="form-control select2 w-100" style="width:100% !important;" id="">
                                            <option value=""> Seleccione </option>
                                            <?php
                                            $query = "SELECT * from medicaso_fe_col.actividadEconomica";
                                            mysqli_set_charset($conn3, "utf8");
                                            $result = mysqli_query($conn3, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo '<option ' . ($rowConfig['actividad_economica'] == $row['codigo'] ? 'selected' : '') . ' value="' . $row['codigo'] . '">' . $row['codigo'] . ' - ' . $row['nombre'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Ciudad</label>
                                        <select name="datos[municipio]" class="form-control select2 w-100" style="width:100% !important;" id="">
                                            <option value=""> Seleccione </option>
                                            <?php
                                            $query = "SELECT * from medicaso_fe_col.fe_municipio";
                                            mysqli_set_charset($conn3, "utf8");
                                            $result = mysqli_query($conn3, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo '<option ' . ($rowConfig['municipio'] == $row['codigo_municipio'] ? 'selected' : '') . ' value="' . $row['codigo_municipio'] . '">' . $row['codigo_municipio'] . ' - ' . $row['nombre_municipio'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">tipo persona</label>
                                        <select name="datos[tipoPersona]" class="form-control select2 w-100" style="width:100% !important;" id="">
                                            <option value=""> Seleccione </option>
                                            <?php
                                            $query = "SELECT * from medicaso_fe_col.fe_tipoPersona";
                                            mysqli_set_charset($conn3, "utf8");
                                            $result = mysqli_query($conn3, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo '<option ' . ($rowConfig['tipoPersona'] == $row['codigo'] ? 'selected' : '') . ' value="' . $row['codigo'] . '">' . $row['codigo'] . ' - ' . $row['nombre'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Regimen de salud</label>
                                        <select name="datos[regimenSalud]" class="form-control select2 w-100" style="width:100% !important;" id="">
                                            <option value=""> Seleccione </option>
                                            <?php
                                            $query = "SELECT * from fe_regimenSalud";
                                            mysqli_set_charset($conn3, "utf8");
                                            $result = mysqli_query($conn3, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo '<option ' . ($rowConfig['regimenSalud'] == $row['codigo'] ? 'selected' : '') . ' value="' . $row['codigo'] . '">' . $row['codigo'] . ' - ' . $row['nombre'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="">Dirección postal</label>
                                        <input type="text" class="form-control" id="" name="datos[direccionPostal]" value="<?= $rowConfig['direccionPostal'] ?>" autocomplete="new-password">
                                    </div> -->
                                    <!-- <div class="form-group">
                                        <label for="">Teléfono</label>
                                        <input type="text" class="form-control" id="" name="datos[telefono]" value="<?= $rowConfig['telefono'] ?>" autocomplete="new-password">
                                    </div> -->
                                    <!-- <div class="form-group">
                                        <label for="">Fax</label>
                                        <input type="text" class="form-control" id="" name="datos[fax]" value="<?= $rowConfig['fax'] ?>" autocomplete="new-password">
                                    </div> -->
                                    <!-- <div class="form-group">
                                        <label for="">Correo electrónico</label>
                                        <input type="text" class="form-control" id="" name="datos[correo]" value="<?= $rowConfig['correo'] ?>" autocomplete="new-password">
                                    </div> -->

                                    <div class="form-group d-none">
                                        <div class="accordion" id="accordionExample">
                                            <div class="card card-secondary">
                                                <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <h4 class="mb-0">
                                                        Información adicional
                                                    </h4>
                                                </div>
                                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="">Pagina web</label>
                                                            <input type="text" class="form-control" id="" name="datos[paginaWeb]" value="<?= $rowConfig['paginaWeb'] ?>" autocomplete="new-password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Entidad federal</label>
                                                            <input type="text" class="form-control" id="" name="datos[entidadFederal]" value="<?= $rowConfig['entidadFederal'] ?>" autocomplete="new-password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Distrito</label>
                                                            <input type="text" class="form-control" id="" name="datos[distrito]" value="<?= $rowConfig['distrito'] ?>" autocomplete="new-password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Municipio</label>
                                                            <input type="text" class="form-control" id="" name="datos[municipio]" value="<?= $rowConfig['municipio'] ?>" autocomplete="new-password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Código de actividad económica</label>
                                                            <input type="text" class="form-control" id="" name="datos[codigoActividadE]" value="<?= $rowConfig['codigoActividadE'] ?>" autocomplete="new-password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Nombre de actividad económica</label>
                                                            <input type="text" class="form-control" id="" name="datos[nombreActividadE]" value="<?= $rowConfig['nombreActividadE'] ?>" autocomplete="new-password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Fecha de fundación</label>
                                                            <input type="date" class="form-control" id="" name="datos[fechafundacion]" value="<?= $rowConfig['fechafundacion'] ?>" autocomplete="new-password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Capital social</label>
                                                            <input type="text" class="form-control" id="" name="datos[capitalSocial]" value="<?= $rowConfig['capitalSocial'] ?>" autocomplete="new-password">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="datos[activo]" value="1">
                                    <input type="hidden" name="datos[tucosa]" value="1">
                                    <input type="hidden" name="datos[usuario_id]" value="<?= $ID ?>">
                                    <input type="hidden" name="datos[fecha]" value="<?= date('y-m-d H:i:s') ?>">
                                    <button type="submit" class="btn btn-outline-info rounded-pill" onclick="$('#correoForm').automaticForm({type:<?= ($rowConfig == null ? 1 : 2) ?>, table:'<?= $tabla ?>',idUpdate:'<?= ($rowConfig == null ? 0 : $rowConfig['id']) ?>',reload:'',page:'<?= $page ?>?FAID='});">
                                        <i class="fa fa-save mr-1"></i>
                                        Guardar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4>Listado de empresas</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="Tabla_Rapida_AJAX">
                                    <?php
                                    $columnasTabla = [
                                        'No.',
                                        'Nombre',
                                        'Siglas',
                                        'Documento fiscal',
                                        'Teléfono',
                                        'Fax',
                                        'Correo',
                                        '',
                                    ];
                                    ?>
                                    <thead>
                                        <tr>
                                            <?php for ($i = 0; $i < count($columnasTabla); $i++) : ?>
                                                <th><?= $columnasTabla[$i] ?></th>
                                            <?php endfor ?>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <div class="card-footer">
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
    titulo_tabla = 'Empresas';
    query_tabla_ajax = "<?= "SELECT * from $tabla" ?>";
    columnas = ['id', 'fechaRegistro', 'nombre', 'siglas', 'tipoDocumento', 'documento', 'direccion', 'direccionPostal', 'telefono', 'fax', 'correo', 'paginaWeb', 'entidadFederal', 'distrito', 'municipio', 'codigoActividadE', 'nombreActividadE', 'fechafundacion', 'capitalSocial', 'usuario_id', 'fecha', 'activo'];
    columnastablas = [{
            "data": function(row, type, val, meta) {
                data = ``;
                data += `${row.id}`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `${row.nombre}`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `${row.siglas}`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `${row.tipoDocumento} ${row.documento}`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `${row.telefono}`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `${row.fax}`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `${row.correo}`;
                return data;
            }
        },


        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `<a href="./<?= $page ?>?FAID=${btoa(row.id)}" class="btn btn-outline-info rounded-pill btn-block" title="Editar">
                    <i class="fa fa-edit"></i>
                    Editar
                    </a>`;
                data += `<button onclick="automaticUpdate(${(row.activo == 1 ? 0 : 1)},'activo','<?= $tabla ?>','${row.id}','<?= $page ?>');" class="btn btn-outline-${(row.activo == 1 ? 'danger' : 'success')} rounded-pill btn-block">
                    <i class="fa ${(row.activo == 1 ? 'fa-times' : 'fa-check')}"></i>
                    ${(row.activo == 1 ? 'Desactivar' : 'Activar')}
                </button>`;

                data += `
                <div class="dropdown open mt-2">
                    <button class="btn btn-outline-secondary rounded-pill btn-block dropdown-toggle" type="button" id="triggerId${row.id}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog"></i>
                        Más Opciones
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId${row.id}">
                        <a class="dropdown-item" href="./nominaEmpresasNiveles?e=${btoa(row.id)}">
                            <i class="fa fa-file text-info"></i>
                            Unidades Funcionales
                        </a>
                        <a class="dropdown-item" href="./nominaEmpresasCargos?e=${btoa(row.id)}">
                            <i class="fa fa-file text-info"></i>
                            Cargos u Oficios
                        </a>
                        <a class="dropdown-item" href="./nominaEmpresasProfesiones?e=${btoa(row.id)}">
                            <i class="fa fa-file text-info"></i>
                            Profesiones
                        </a>
                        <a class="dropdown-item" href="./nominaPersonal?e=${btoa(row.id)}">
                            <i class="fa fa-users text-info"></i>
                            Empleados / Personal
                        </a>
                    </div>
                </div>
                `;
                return data;
            }
        },
    ];
</script>