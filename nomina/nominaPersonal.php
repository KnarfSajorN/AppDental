<?php
include '../header.php';
include '../menu.php';
$ID = $_SESSION['ID'];
$tabla = "nominaEmpresasPersonal";
$page = 'nominaPersonal';
// cargar datos
if ($_GET['FAID']) {
    $FAID = base64_decode($_GET['FAID']);
    $queryConfig = "SELECT * from $tabla where id = $FAID limit 1";
    $resultConfig = mysqli_query($conn3, $queryConfig);
    $rowConfig = mysqli_fetch_array($resultConfig);
}
if ($_GET['e']) {
    $idEmpresa = base64_decode($_GET['e']);
    $queryEmpresa = "SELECT * from nominaEmpresas where id = $idEmpresa limit 1";
    $resultEmpresa = mysqli_query($conn3, $queryEmpresa);
    $rowEmpresa = mysqli_fetch_array($resultEmpresa);
}
if (!$_GET['e']) {
    echo "<script>location.href = './nominaSeleccionarEmpresa?p=" . base64_encode($page)."&n=" . base64_encode('Empleados') . "'</script>";
}

?>

<div class="content-wrapper p-3">
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4><?= ($rowConfig != null ? 'Editar empleado #' . $rowConfig['id'] : 'Registrar nuevo empleado') ?> en <strong><?= $rowEmpresa['nombre'] ?></strong> </h4>
                                </div>
                                <div class="float-right">
                                    <button onclick="location.href='./nominaEmpresas'" class="btn btn-light rounded-pill">
                                        <i class="fa fa-arrow-left mr-1"></i>
                                        Volver a listado de empresas
                                    </button>
                                </div>
                            </div>
                            <form id="empleadorForm">
                                <div class="card-body p-0">

                                    <div class="card card-info card-outline card-tabs m-0">
                                        <div class="card-header p-0 pt-1 border-bottom-0">
                                            <?php
                                            $paginas = [
                                                ['Datos Personales', 'tab1'],
                                                ['Inf. Beneficiarios', 'tab2'],
                                                ['Inf. Académica', 'tab3'],
                                                ['Referencias', 'tab4'],
                                                ['Exp. Laboral', 'tab5'],
                                                ['Inf. Laboral', 'tab6'],
                                                ['Novedades / Contratos', 'tab7'],
                                            ];
                                            ?>
                                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                                <?php for ($key = 0; $key < count($paginas); $key++) : ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link <?= $key == 0 ? 'active' : '' ?>" id="custom-tabs-three-<?= $paginas[$key][1] ?>-tab" data-toggle="pill" href="#custom-tabs-three-<?= $paginas[$key][1] ?>" role="tab" aria-controls="custom-tabs-three-<?= $paginas[$key][1] ?>" aria-selected="true"><?= $paginas[$key][0] ?></a>
                                                    </li>
                                                <?php endfor; ?>
                                            </ul>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="tab-content" id="custom-tabs-three-tabContent">

                                                <div class="tab-pane fade active show" id="custom-tabs-three-tab1" role="tabpanel" aria-labelledby="custom-tabs-three-tab1-tab">
                                                    <div class="card-body row">
                                                        <div class="col-md-4 form-group">
                                                            <label for="">Tipo de documento</label>
                                                            <select name="datos[tipo_documento]" class="form-control select2 w-100" style="width:100% !important;" id="">
                                                                <option value="CC" <?= ($rowConfig['tipo_documento'] == 'CC' ? 'selected' : '') ?>> CC - Cédula de ciudadanía</option>
                                                                <option value="CE" <?= ($rowConfig['tipo_documento'] == 'CE' ? 'selected' : '') ?>> CE - Cédula de extranjería</option>
                                                                <option value="TI" <?= ($rowConfig['tipo_documento'] == 'TI' ? 'selected' : '') ?>> TI - Tarjeta de identidad</option>
                                                                <option value="RC" <?= ($rowConfig['tipo_documento'] == 'RC' ? 'selected' : '') ?>> RC - Registro Civil</option>
                                                                <option value="CD" <?= ($rowConfig['tipo_documento'] == 'CD' ? 'selected' : '') ?>> CD - Cédula Digital</option>
                                                                <option value="CN" <?= ($rowConfig['tipo_documento'] == 'CN' ? 'selected' : '') ?>> CN - Comprobante del tramite del documento</option>
                                                                <option value="NU" <?= ($rowConfig['tipo_documento'] == 'NU' ? 'selected' : '') ?>> NU - Número Único de identificación</option>
                                                                <option value="NI" <?= ($rowConfig['tipo_documento'] == 'NI' ? 'selected' : '') ?>> NI - Carnet de identidad - Documento nacional de identidad </option>
                                                                <option value="PE" <?= ($rowConfig['tipo_documento'] == 'PE' ? 'selected' : '') ?>> PE - Permiso especial de permanencia</option>
                                                                <option value="PA" <?= ($rowConfig['tipo_documento'] == 'PA' ? 'selected' : '') ?>> PA - Pasaporte</option>
                                                                <option value="SC" <?= ($rowConfig['tipo_documento'] == 'SC' ? 'selected' : '') ?>> SC - Salvoconducto</option>
                                                                <option value="AS" <?= ($rowConfig['tipo_documento'] == 'AS' ? 'selected' : '') ?>> AS - Adulto sin identidad</option>
                                                                <option value="MS" <?= ($rowConfig['tipo_documento'] == 'MS' ? 'selected' : '') ?>> MS - Menor sin identificación</option>
                                                                <option value="PT" <?= ($rowConfig['tipo_documento'] == 'PT' ? 'selected' : '') ?>> PT - Permiso por Protección Temporal </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <label for="">Número de documento</label>
                                                            <input type="number" class="form-control" id="" name="datos[documento]" value="<?= $rowConfig['documento'] ?>">
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <label for="">Nombre</label>
                                                            <input type="text" class="form-control" id="" name="datos[nombre]" value="<?= $rowConfig['nombre'] ?>">
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label for="">Fecha de nacimiento</label>
                                                            <input type="date" class="form-control" id="" name="datos[fecha_nacimiento]" value="<?= $rowConfig['fecha_nacimiento'] ?>">
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label for="">Lugar de nacimiento</label>
                                                            <input type="text" class="form-control" id="" name="datos[lugar_nacimiento]" value="<?= $rowConfig['lugar_nacimiento'] ?>">
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label for="">Estado civil</label>
                                                            <select name="datos[estado_civil]" class="form-control select2 w-100" style="width:100% !important;" id="">
                                                                <option <?= ($rowConfig['estado_civil'] == '' ? 'selected' : '') ?> value=""> Seleccione </option>
                                                                <option <?= ($rowConfig['estado_civil'] == 'Casado(a)' ? 'selected' : '') ?> value="Casado(a)">Casado(a)</option>
                                                                <option <?= ($rowConfig['estado_civil'] == 'Soltero(a)' ? 'selected' : '') ?> value="Soltero(a)">Soltero(a)</option>
                                                                <option <?= ($rowConfig['estado_civil'] == 'Viudo(a)' ? 'selected' : '') ?> value="Viudo(a)">Viudo(a)</option>
                                                                <option <?= ($rowConfig['estado_civil'] == 'Menor de edad' ? 'selected' : '') ?> value="Menor de edad">Menor de edad</option>
                                                                <option <?= ($rowConfig['estado_civil'] == 'Separado(a)' ? 'selected' : '') ?> value="Separado(a)">Separado(a)</option>
                                                                <option <?= ($rowConfig['estado_civil'] == 'Union Libre' ? 'selected' : '') ?> value="Union Libre">Unión Libre</option>
                                                                <option <?= ($rowConfig['estado_civil'] == 'Divorciada(o)' ? 'selected' : '') ?> value="Divorciada(o)">Divorciada(o)</option>
                                                                <option <?= ($rowConfig['estado_civil'] == 'Otro(a)' ? 'selected' : '') ?> value="Otro(a)">Otro(a)</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2 form-group">
                                                            <label for="">Hijos</label>
                                                            <input type="number" class="form-control" id="" name="datos[hijos]" value="<?= $rowConfig['hijos'] ?>">
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <label for="">Tipo de sangre</label>
                                                            <select name="datos[tipo_sangre]" class="form-control select2 w-100" style="width:100% !important;" id="" value="<?= $rowConfig['tipo_sangre'] ?>">
                                                                <option <?= ($rowConfig['tipo_sangre'] == '' ? 'selected' : '') ?> value=""> Seleccione </option>
                                                                <option <?= ($rowConfig['tipo_sangre'] == 'O NEGATIVO' ? 'selected' : '') ?> value="O NEGATIVO">O NEGATIVO</option>
                                                                <option <?= ($rowConfig['tipo_sangre'] == 'O POSITIVO' ? 'selected' : '') ?> value="O POSITIVO">O POSITIVO</option>
                                                                <option <?= ($rowConfig['tipo_sangre'] == 'A NEGATIVO' ? 'selected' : '') ?> value="A NEGATIVO">A NEGATIVO</option>
                                                                <option <?= ($rowConfig['tipo_sangre'] == 'A POSITIVO' ? 'selected' : '') ?> value="A POSITIVO">A POSITIVO</option>
                                                                <option <?= ($rowConfig['tipo_sangre'] == 'B NEGATIVO' ? 'selected' : '') ?> value="B NEGATIVO">B NEGATIVO</option>
                                                                <option <?= ($rowConfig['tipo_sangre'] == 'B POSITIVO' ? 'selected' : '') ?> value="B POSITIVO">B POSITIVO</option>
                                                                <option <?= ($rowConfig['tipo_sangre'] == 'AB NEGATIVO' ? 'selected' : '') ?> value="AB NEGATIVO">AB NEGATIVO</option>
                                                                <option <?= ($rowConfig['tipo_sangre'] == 'AB POSITIVO' ? 'selected' : '') ?> value="AB POSITIVO">AB POSITIVO</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <label for="">Dirección</label>
                                                            <input type="text" class="form-control" id="" name="datos[direccion]" value="<?= $rowConfig['direccion'] ?>">
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <label for="">Barrio</label>
                                                            <input type="text" class="form-control" id="" name="datos[barrio]" value="<?= $rowConfig['barrio'] ?>">
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label for="">Teléfono</label>
                                                            <input type="text" class="form-control" id="" name="datos[telefono]" value="<?= $rowConfig['telefono'] ?>">
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label for="">Celular</label>
                                                            <input type="text" class="form-control" id="" name="datos[celular]" value="<?= $rowConfig['celular'] ?>">
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <label for="">Municipio</label>
                                                            <input type="text" class="form-control" id="" name="datos[municipio]" value="<?= $rowConfig['municipio'] ?>">
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <label for="">Departamento</label>
                                                            <input type="text" class="form-control" id="" name="datos[departamento]" value="<?= $rowConfig['departamento'] ?>">
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <label for="">Correo</label>
                                                            <input type="text" class="form-control" id="" name="datos[correo]" value="<?= $rowConfig['correo'] ?>">
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
                                                        <div class="col-md-12 form-group">
                                                            <label for="">Notas del empleado</label>
                                                            <textarea name="datos[notas]" class="form-control" id="" cols="30" rows="10"><?= $rowConfig['notas'] ?></textarea>
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label for="">Estado de empleado</label>
                                                            <select name="datos[estado]" class="form-control select2 w-100" style="width:100% !important;" id="">
                                                                <?php
                                                                $query = "SELECT * from estadosEmpleado";
                                                                $result = mysqli_query($conn3, $query);
                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    echo '<option ' . ($rowConfig['estado'] == $row['id'] ? 'selected' : '') . ' value="' . $row['id'] . '">' . $row['id'] . ' - ' . $row['descripcion'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label for="">Foto del empleado</label>
                                                            <input type="file" class="form-control" id="" name="archivos[foto|fotosEmpleados/]" accept="image/jpeg">
                                                            <div class="center text-center mt-3">
                                                                <?php if ($rowConfig['foto'] != null) : ?>
                                                                    <img src="fotosEmpleados/<?= $rowConfig['foto'] ?>" class="img img-fluid" style="width:5cm; height:auto;" />
                                                                <?php else : ?>
                                                                    <i class="fa fa-user fa-8x text-info"></i>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="custom-tabs-three-tab2" role="tabpanel" aria-labelledby="custom-tabs-three-tab2-tab">
                                                    <div class="card-body row">
                                                        <div class="border border-info rounded row w-100 p-2">
                                                            <div class="col-md-12">
                                                                <h4>Información del Cónyuge</h4>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <label for="">Tipo de documento</label>
                                                                <select name="datos[c_tipo_documento]" class="form-control select2 w-100" style="width:100% !important;" id="">
                                                                    <option value="CC" <?= ($rowConfig['c_tipo_documento'] == 'CC' ? 'selected' : '') ?>> CC - Cédula de ciudadanía</option>
                                                                    <option value="CE" <?= ($rowConfig['c_tipo_documento'] == 'CE' ? 'selected' : '') ?>> CE - Cédula de extranjería</option>
                                                                    <option value="TI" <?= ($rowConfig['c_tipo_documento'] == 'TI' ? 'selected' : '') ?>> TI - Tarjeta de identidad</option>
                                                                    <option value="RC" <?= ($rowConfig['c_tipo_documento'] == 'RC' ? 'selected' : '') ?>> RC - Registro Civil</option>
                                                                    <option value="CD" <?= ($rowConfig['c_tipo_documento'] == 'CD' ? 'selected' : '') ?>> CD - Cédula Digital</option>
                                                                    <option value="CN" <?= ($rowConfig['c_tipo_documento'] == 'CN' ? 'selected' : '') ?>> CN - Comprobante del tramite del documento</option>
                                                                    <option value="NU" <?= ($rowConfig['c_tipo_documento'] == 'NU' ? 'selected' : '') ?>> NU - Número Único de identificación</option>
                                                                    <option value="NI" <?= ($rowConfig['c_tipo_documento'] == 'NI' ? 'selected' : '') ?>> NI - Carnet de identidad - Documento nacional de identidad </option>
                                                                    <option value="PE" <?= ($rowConfig['c_tipo_documento'] == 'PE' ? 'selected' : '') ?>> PE - Permiso especial de permanencia</option>
                                                                    <option value="PA" <?= ($rowConfig['c_tipo_documento'] == 'PA' ? 'selected' : '') ?>> PA - Pasaporte</option>
                                                                    <option value="SC" <?= ($rowConfig['c_tipo_documento'] == 'SC' ? 'selected' : '') ?>> SC - Salvoconducto</option>
                                                                    <option value="AS" <?= ($rowConfig['c_tipo_documento'] == 'AS' ? 'selected' : '') ?>> AS - Adulto sin identidad</option>
                                                                    <option value="MS" <?= ($rowConfig['c_tipo_documento'] == 'MS' ? 'selected' : '') ?>> MS - Menor sin identificación</option>
                                                                    <option value="PT" <?= ($rowConfig['c_tipo_documento'] == 'PT' ? 'selected' : '') ?>> PT - Permiso por Protección Temporal </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <label for="">Número de documento</label>
                                                                <input type="number" class="form-control" id="" name="datos[c_documento]" value="<?= $rowConfig['c_documento'] ?>">
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label for="">Nombre</label>
                                                                <input type="number" class="form-control" id="" name="datos[c_nombre]" value="<?= $rowConfig['c_nombre'] ?>">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                                <label for="">Fecha de nacimiento</label>
                                                                <input type="date" class="form-control" id="" name="datos[c_fecha_nacimiento]" value="<?= $rowConfig['c_fecha_nacimiento'] ?>">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                                <label for="">Lugar de nacimiento</label>
                                                                <input type="date" class="form-control" id="" name="datos[c_lugar_nacimiento]" value="<?= $rowConfig['c_lugar_nacimiento'] ?>">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h4>Empresa donde Labora</h4>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label for="">Nombre</label>
                                                                <input type="text" class="form-control" id="" name="datos[c_empresa_nombre]" value="<?= $rowConfig['c_empresa_nombre'] ?>">
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label for="">Dirección</label>
                                                                <input type="text" class="form-control" id="" name="datos[c_empresa_direccion]" value="<?= $rowConfig['c_empresa_direccion'] ?>">
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label for="">Teléfono</label>
                                                                <input type="number" class="form-control" id="" name="datos[c_empresa_telefono]" value="<?= $rowConfig['c_empresa_telefono'] ?>">
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label for="">Antigüedad [Años]</label>
                                                                <input type="number" class="form-control" id="" name="datos[c_empresa_antiguedad]" value="<?= $rowConfig['c_empresa_antiguedad'] ?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <hr>
                                                        </div>

                                                        <div class="border border-info rounded row w-100 p-2">
                                                            <div class="col-md-12">
                                                                <h4>Información del Padre del empleado</h4>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label for="">Nombre</label>
                                                                <input type="text" class="form-control" id="" name="datos[p_nombre]" value="<?= $rowConfig['p_nombre'] ?>">
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <label for="">Tipo de documento</label>
                                                                <select name="datos[p_tipo_documento]" class="form-control select2 w-100" style="width:100% !important;" id="">
                                                                    <option value="CC" <?= ($rowConfig['p_tipo_documento'] == 'CC' ? 'selected' : '') ?>> CC - Cédula de ciudadanía</option>
                                                                    <option value="CE" <?= ($rowConfig['p_tipo_documento'] == 'CE' ? 'selected' : '') ?>> CE - Cédula de extranjería</option>
                                                                    <option value="TI" <?= ($rowConfig['p_tipo_documento'] == 'TI' ? 'selected' : '') ?>> TI - Tarjeta de identidad</option>
                                                                    <option value="RC" <?= ($rowConfig['p_tipo_documento'] == 'RC' ? 'selected' : '') ?>> RC - Registro Civil</option>
                                                                    <option value="CD" <?= ($rowConfig['p_tipo_documento'] == 'CD' ? 'selected' : '') ?>> CD - Cédula Digital</option>
                                                                    <option value="CN" <?= ($rowConfig['p_tipo_documento'] == 'CN' ? 'selected' : '') ?>> CN - Comprobante del tramite del documento</option>
                                                                    <option value="NU" <?= ($rowConfig['p_tipo_documento'] == 'NU' ? 'selected' : '') ?>> NU - Número Único de identificación</option>
                                                                    <option value="NI" <?= ($rowConfig['p_tipo_documento'] == 'NI' ? 'selected' : '') ?>> NI - Carnet de identidad - Documento nacional de identidad </option>
                                                                    <option value="PE" <?= ($rowConfig['p_tipo_documento'] == 'PE' ? 'selected' : '') ?>> PE - Permiso especial de permanencia</option>
                                                                    <option value="PA" <?= ($rowConfig['p_tipo_documento'] == 'PA' ? 'selected' : '') ?>> PA - Pasaporte</option>
                                                                    <option value="SC" <?= ($rowConfig['p_tipo_documento'] == 'SC' ? 'selected' : '') ?>> SC - Salvoconducto</option>
                                                                    <option value="AS" <?= ($rowConfig['p_tipo_documento'] == 'AS' ? 'selected' : '') ?>> AS - Adulto sin identidad</option>
                                                                    <option value="MS" <?= ($rowConfig['p_tipo_documento'] == 'MS' ? 'selected' : '') ?>> MS - Menor sin identificación</option>
                                                                    <option value="PT" <?= ($rowConfig['p_tipo_documento'] == 'PT' ? 'selected' : '') ?>> PT - Permiso por Protección Temporal </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <label for="">Número de documento</label>
                                                                <input type="number" class="form-control" id="" name="datos[p_documento]" value="<?= $rowConfig['p_documento'] ?>">
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label for="">Ocupación</label>
                                                                <input type="text" class="form-control" id="" name="datos[p_ocupacion]" value="<?= $rowConfig['p_ocupacion'] ?>">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                                <label for="">Fecha de nacimiento</label>
                                                                <input type="date" class="form-control" id="" name="datos[p_fecha_nacimiento]" value="<?= $rowConfig['p_fecha_nacimiento'] ?>">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                                <label for="">Lugar de nacimiento</label>
                                                                <input type="date" class="form-control" id="" name="datos[p_lugar_nacimiento]" value="<?= $rowConfig['p_lugar_nacimiento'] ?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <hr>
                                                        </div>

                                                        <div class="border border-info rounded row w-100 p-2">
                                                            <div class="col-md-12">
                                                                <h4>Información de la Madre del empleado</h4>
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label for="">Nombre</label>
                                                                <input type="text" class="form-control" id="" name="datos[m_nombre]" value="<?= $rowConfig['m_nombre'] ?>">
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <label for="">Tipo de documento</label>
                                                                <select name="datos[m_tipo_documento]" class="form-control select2 w-100" style="width:100% !important;" id="">
                                                                    <option value="CC" <?= ($rowConfig['m_tipo_documento'] == 'CC' ? 'selected' : '') ?>> CC - Cédula de ciudadanía</option>
                                                                    <option value="CE" <?= ($rowConfig['m_tipo_documento'] == 'CE' ? 'selected' : '') ?>> CE - Cédula de extranjería</option>
                                                                    <option value="TI" <?= ($rowConfig['m_tipo_documento'] == 'TI' ? 'selected' : '') ?>> TI - Tarjeta de identidad</option>
                                                                    <option value="RC" <?= ($rowConfig['m_tipo_documento'] == 'RC' ? 'selected' : '') ?>> RC - Registro Civil</option>
                                                                    <option value="CD" <?= ($rowConfig['m_tipo_documento'] == 'CD' ? 'selected' : '') ?>> CD - Cédula Digital</option>
                                                                    <option value="CN" <?= ($rowConfig['m_tipo_documento'] == 'CN' ? 'selected' : '') ?>> CN - Comprobante del tramite del documento</option>
                                                                    <option value="NU" <?= ($rowConfig['m_tipo_documento'] == 'NU' ? 'selected' : '') ?>> NU - Número Único de identificación</option>
                                                                    <option value="NI" <?= ($rowConfig['m_tipo_documento'] == 'NI' ? 'selected' : '') ?>> NI - Carnet de identidad - Documento nacional de identidad </option>
                                                                    <option value="PE" <?= ($rowConfig['m_tipo_documento'] == 'PE' ? 'selected' : '') ?>> PE - Permiso especial de permanencia</option>
                                                                    <option value="PA" <?= ($rowConfig['m_tipo_documento'] == 'PA' ? 'selected' : '') ?>> PA - Pasaporte</option>
                                                                    <option value="SC" <?= ($rowConfig['m_tipo_documento'] == 'SC' ? 'selected' : '') ?>> SC - Salvoconducto</option>
                                                                    <option value="AS" <?= ($rowConfig['m_tipo_documento'] == 'AS' ? 'selected' : '') ?>> AS - Adulto sin identidad</option>
                                                                    <option value="MS" <?= ($rowConfig['m_tipo_documento'] == 'MS' ? 'selected' : '') ?>> MS - Menor sin identificación</option>
                                                                    <option value="PT" <?= ($rowConfig['m_tipo_documento'] == 'PT' ? 'selected' : '') ?>> PT - Permiso por Protección Temporal </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <label for="">Número de documento</label>
                                                                <input type="number" class="form-control" id="" name="datos[m_documento]" value="<?= $rowConfig['m_documento'] ?>">
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <label for="">Ocupación</label>
                                                                <input type="text" class="form-control" id="" name="datos[m_ocupacion]" value="<?= $rowConfig['m_ocupacion'] ?>">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                                <label for="">Fecha de nacimiento</label>
                                                                <input type="date" class="form-control" id="" name="datos[m_fecha_nacimiento]" value="<?= $rowConfig['m_fecha_nacimiento'] ?>">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                                <label for="">Lugar de nacimiento</label>
                                                                <input type="date" class="form-control" id="" name="datos[m_lugar_nacimiento]" value="<?= $rowConfig['m_lugar_nacimiento'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-three-tab3" role="tabpanel" aria-labelledby="custom-tabs-three-tab3-tab">
                                                    <div class="card-body row">
                                                        <div class="col-md-6 row">
                                                            <div class="border border-info rounded row w-100 p-2">
                                                                <div class="col-md-12">
                                                                    <h4>Estudios Secundarios</h4>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="">Institución</label>
                                                                    <input type="text" class="form-control" id="" name="datos[e_s_institucion]" value="<?= $rowConfig['e_s_institucion'] ?>">
                                                                </div>
                                                                <div class="col-md-10 form-group">
                                                                    <label for="">Titulo</label>
                                                                    <input type="text" class="form-control" id="" name="datos[e_s_titulo]" value="<?= $rowConfig['e_s_titulo'] ?>">
                                                                </div>
                                                                <div class="col-md-2 form-group">
                                                                    <label for="">Año</label>
                                                                    <input type="text" class="form-control" id="" name="datos[e_s_ano]" value="<?= $rowConfig['e_s_ano'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <hr>
                                                            </div>

                                                            <div class="border border-info rounded row w-100 p-2">
                                                                <div class="col-md-12">
                                                                    <h4>Estudios Universitarios</h4>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="">Institución</label>
                                                                    <input type="text" class="form-control" id="" name="datos[e_u_institucion]" value="<?= $rowConfig['e_u_institucion'] ?>">
                                                                </div>
                                                                <div class="col-md-10 form-group">
                                                                    <label for="">Titulo</label>
                                                                    <input type="text" class="form-control" id="" name="datos[e_u_titulo]" value="<?= $rowConfig['e_u_titulo'] ?>">
                                                                </div>
                                                                <div class="col-md-2 form-group">
                                                                    <label for="">Año</label>
                                                                    <input type="text" class="form-control" id="" name="datos[e_u_ano]" value="<?= $rowConfig['e_u_ano'] ?>">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <hr>
                                                            </div>

                                                            <div class="border border-info rounded row w-100 p-2">
                                                                <div class="col-md-12">
                                                                    <h4>Postgrados</h4>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="">Institución</label>
                                                                    <input type="text" class="form-control" id="" name="datos[e_p_institucion]" value="<?= $rowConfig['e_p_institucion'] ?>">
                                                                </div>
                                                                <div class="col-md-10 form-group">
                                                                    <label for="">Titulo</label>
                                                                    <input type="text" class="form-control" id="" name="datos[e_p_titulo]" value="<?= $rowConfig['e_p_titulo'] ?>">
                                                                </div>
                                                                <div class="col-md-2 form-group">
                                                                    <label for="">Año</label>
                                                                    <input type="text" class="form-control" id="" name="datos[e_p_ano]" value="<?= $rowConfig['e_p_ano'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 row">
                                                            <div class="border border-info rounded row w-100 p-2 bg-light">
                                                                <div class="col-md-12">
                                                                    <h4>Otros Estudios</h4>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label for="">Institución</label>
                                                                    <input type="text" class="form-control" id="" name="datos[e_o_institucion_1]" value="<?= $rowConfig['e_o_institucion_1'] ?>">
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <label for="">Titulo</label>
                                                                    <input type="text" class="form-control" id="" name="datos[e_o_titulo_1]" value="<?= $rowConfig['e_o_titulo_1'] ?>">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label for="">Año</label>
                                                                    <input type="text" class="form-control" id="" name="datos[e_o_ano_1]" value="<?= $rowConfig['e_o_ano_1'] ?>">
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label for="">Institución</label>
                                                                    <input type="text" class="form-control" id="" name="datos[e_o_institucion_2]" value="<?= $rowConfig['e_o_institucion_2'] ?>">
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <label for="">Titulo</label>
                                                                    <input type="text" class="form-control" id="" name="datos[e_o_titulo_2]" value="<?= $rowConfig['e_o_titulo_2'] ?>">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label for="">Año</label>
                                                                    <input type="text" class="form-control" id="" name="datos[e_o_ano_2]" value="<?= $rowConfig['e_o_ano_2'] ?>">
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label for="">Institución</label>
                                                                    <input type="text" class="form-control" id="" name="datos[e_o_institucion_3]" value="<?= $rowConfig['e_o_institucion_3'] ?>">
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <label for="">Titulo</label>
                                                                    <input type="text" class="form-control" id="" name="datos[e_o_titulo_3]" value="<?= $rowConfig['e_o_titulo_3'] ?>">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label for="">Año</label>
                                                                    <input type="text" class="form-control" id="" name="datos[e_o_ano_3]" value="<?= $rowConfig['e_o_ano_3'] ?>">
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <hr>
                                                                    <label for="">Mercaderista</label>
                                                                    <input type="text" class="form-control" id="" name="datos[mercaderista]" value="<?= $rowConfig['mercaderista'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <hr>
                                                        </div>
                                                        <div class="col-md-12 row">
                                                            <div class="border border-info rounded row w-100 p-2">
                                                                <div class="col-md-8 row p-0 m-0">
                                                                    <div class="col-md-12 form-group">
                                                                        <label for="">Especialidad</label>
                                                                        <input type="text" class="form-control" id="" name="datos[especialidad]" value="<?= $rowConfig['especialidad'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 form-group">
                                                                        <label for="">firma digital</label>
                                                                        <input type="file" class="form-control" id="" name="archivos[firma|firmasEmpleados/]" accept="image/jpeg">
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label for="">Cód. Agenda</label>
                                                                        <input type="text" class="form-control" id="" name="datos[codAgenda]" value="<?= $rowConfig['codAgenda'] ?>">
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label for="">Cta. especialidad</label>
                                                                        <input type="text" class="form-control" id="" name="datos[ctaEspecialidad]" value="<?= $rowConfig['ctaEspecialidad'] ?>">
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label for="">Tarj. profesional</label>
                                                                        <input type="text" class="form-control" id="" name="datos[tarjetaProfesional]" value="<?= $rowConfig['tarjetaProfesional'] ?>">
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label for="">Cta. derechos de sala</label>
                                                                        <input type="text" class="form-control" id="" name="datos[ctaDerechos]" value="<?= $rowConfig['ctaDerechos'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 form-group">
                                                                        <label for="">cuenta de gasto o costo para liq. de profesionales</label>
                                                                        <input type="text" class="form-control" id="" name="datos[ctaLiq]" value="<?= $rowConfig['ctaLiq'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 center text-center">
                                                                    <?php if ($rowConfig['firma'] != null) : ?>
                                                                        <img src="firmasEmpleados/<?= $rowConfig['firma'] ?>" class="img img-fluid" style="width: 10cm; height: auto;">
                                                                    <?php else : ?>
                                                                        <i class="fas fa-signature text-info fa-10x"></i>
                                                                        <p>Sin firma</p>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-three-tab4" role="tabpanel" aria-labelledby="custom-tabs-three-tab4-tab">
                                                    <div class="card-body row">
                                                        <div class="col-md-12">
                                                            <a class="btn btn-info rounded-pill mb-3" href="nominaPersonalReferencia?iP=<?= base64_encode($rowConfig['id']) ?>">
                                                                <i class="fas fa-plus"></i>
                                                                Nueva referencia
                                                            </a>
                                                            <table class="table table-striped">
                                                                <?php
                                                                $columnasTabla = [
                                                                    'Tipo Ref.',
                                                                    'Nombre',
                                                                    'Dirección',
                                                                    'Teléfono',
                                                                    'Ciudad',
                                                                ];
                                                                $query = "SELECT * from nominaEmpresasPersonalReferencias
                                                                where 1=1
                                                                and idPersonal = '{$rowConfig['id']}'
                                                                ";
                                                                $result = mysqli_query($conn3, $query);
                                                                $columnasTablaDatos = [];
                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    $columnasTablaDatos[] = $row;
                                                                }
                                                                ?>
                                                                <thead>
                                                                    <tr>
                                                                        <?php for ($i = 0; $i < count($columnasTabla); $i++) : ?>
                                                                            <th><?= $columnasTabla[$i] ?></th>
                                                                        <?php endfor; ?>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php for ($i = 0; $i < count($columnasTablaDatos); $i++) : ?>
                                                                        <tr>
                                                                            <td><?= $columnasTablaDatos[$i]['tipoRef'] ?></td>
                                                                            <td><?= $columnasTablaDatos[$i]['nombre'] ?></td>
                                                                            <td><?= $columnasTablaDatos[$i]['direccion'] ?></td>
                                                                            <td><?= $columnasTablaDatos[$i]['telefono'] ?></td>
                                                                            <td><?= $columnasTablaDatos[$i]['ciudad'] ?></td>
                                                                        </tr>
                                                                    <?php endfor; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-three-tab5" role="tabpanel" aria-labelledby="custom-tabs-three-tab5-tab">
                                                    <div class="card-body row">
                                                        <div class="col-md-12">
                                                            <a class="btn btn-info rounded-pill mb-3" href="nominaPersonalExperiencia?iP=<?= base64_encode($rowConfig['id']) ?>">
                                                                <i class="fas fa-plus"></i>
                                                                Nuevo
                                                            </a>
                                                            <table class="table table-striped">
                                                                <?php
                                                                $columnasTabla = [
                                                                    'Empresa',
                                                                    'F. ingreso',
                                                                    'F. egreso',
                                                                    'Jefe inmediato',
                                                                    'Cargo',
                                                                    'Tiempo lab.',
                                                                    'Sueldo',
                                                                ];
                                                                $query = "SELECT * from nominaEmpresasPersonalExperiencia
                                                                where 1=1
                                                                and idPersonal = '{$rowConfig['id']}'
                                                                ";
                                                                $result = mysqli_query($conn3, $query);
                                                                $columnasTablaDatos = [];
                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    $columnasTablaDatos[] = $row;
                                                                }
                                                                ?>
                                                                <thead>
                                                                    <tr>
                                                                        <?php for ($i = 0; $i < count($columnasTabla); $i++) : ?>
                                                                            <th><?= $columnasTabla[$i] ?></th>
                                                                        <?php endfor; ?>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php for ($i = 0; $i < count($columnasTablaDatos); $i++) : ?>
                                                                        <tr>
                                                                            <td><?= $columnasTablaDatos[$i]['empresa'] ?></td>
                                                                            <td><?= $columnasTablaDatos[$i]['fechaIngreso'] ?></td>
                                                                            <td><?= $columnasTablaDatos[$i]['fechaEgreso'] ?></td>
                                                                            <td><?= $columnasTablaDatos[$i]['jefeInmediato'] ?></td>
                                                                            <td><?= $columnasTablaDatos[$i]['cargo'] ?></td>
                                                                            <td><?= $columnasTablaDatos[$i]['tiempoLab'] ?> año(s)</td>
                                                                            <td><?= number_format($columnasTablaDatos[$i]['sueldo'], 2) ?></td>
                                                                        </tr>
                                                                    <?php endfor; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-three-tab6" role="tabpanel" aria-labelledby="custom-tabs-three-tab6-tab">
                                                    <div class="card-body row">
                                                        <div class="col-md-12 row">
                                                            <div class="col-md-6 form-group">
                                                                <label for="">Centro de costo</label>
                                                                <select class="form-control" name="datos[centroCosto]" id="centroCosto">
                                                                    <option value="">Seleccione</option>
                                                                    <?php
                                                                    $query = "SELECT * from CcentroCostos";
                                                                    $result = mysqli_query($conn3, $query);
                                                                    while ($row = mysqli_fetch_array($result)) {
                                                                        echo "<option " . ($rowConfig['centroCosto'] == $row['id'] ? "selected" : "") . " value=" . $row['id'] . ">" . $row['codigo'] . " | " . $row['descripcion'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                                <label for="">Dependencia</label>
                                                                <input type="text" class="form-control" id="" name="datos[dependencia]" value="<?= $rowConfig['dependencia'] ?>">
                                                            </div>
                                                            <div class="col-md-3 form-group">
                                                                <label for="">Recibió inducción</label>
                                                                <select class="form-control" name="datos[induccion]" id="induccion">
                                                                    <option value="">Seleccione</option>
                                                                    <option <?= $rowConfig['induccion'] == 1 ? 'selected' : '' ?> value="1">Si</option>
                                                                    <option <?= $rowConfig['induccion'] == 0 ? 'selected' : '' ?> value="0">No</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-3 form-group">
                                                                <label for="">Fecha Ingreso</label>
                                                                <input type="date" class="form-control" id="" name="datos[fechaIngreso]" value="<?= $rowConfig['fechaIngreso'] ?>">
                                                            </div>
                                                            <div class="col-md-3 form-group">
                                                                <label for="">Fecha Retiro</label>
                                                                <input type="date" class="form-control" id="" name="datos[fechaRetiro]" value="<?= $rowConfig['fechaRetiro'] ?>">
                                                            </div>
                                                            <div class="col-md-3 form-group">
                                                                <label for="">Salario integral</label>
                                                                <select class="form-control" name="datos[salarioIntegral]" id="salarioIntegral">
                                                                    <option value="">Seleccione</option>
                                                                    <option <?= $rowConfig['salarioIntegral'] == 1 ? 'selected' : '' ?> value="1">Si</option>
                                                                    <option <?= $rowConfig['salarioIntegral'] == 0 ? 'selected' : '' ?> value="0">No</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3 form-group">
                                                                <label for="">Contrato fijo</label>
                                                                <select class="form-control" name="datos[contratoFijo]" id="contratoFijo">
                                                                    <option value="">Seleccione</option>
                                                                    <option <?= $rowConfig['contratoFijo'] == 1 ? 'selected' : '' ?> value="1">Si</option>
                                                                    <option <?= $rowConfig['contratoFijo'] == 0 ? 'selected' : '' ?> value="0">No</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3 form-group">
                                                                <label for="">OPS</label>
                                                                <select class="form-control" name="datos[ops]" id="ops">
                                                                    <option value="">Seleccione</option>
                                                                    <option <?= $rowConfig['ops'] == 1 ? 'selected' : '' ?> value="1">Si</option>
                                                                    <option <?= $rowConfig['ops'] == 0 ? 'selected' : '' ?> value="0">No</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3 form-group">
                                                                <label for="">Aprendiz</label>
                                                                <select class="form-control" name="datos[aprendiz]" id="aprendiz">
                                                                    <option value="">Seleccione</option>
                                                                    <option <?= $rowConfig['aprendiz'] == 1 ? 'selected' : '' ?> value="1">Si</option>
                                                                    <option <?= $rowConfig['aprendiz'] == 0 ? 'selected' : '' ?> value="0">No</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3 form-group">
                                                                <label for="">vive a menos de 1km</label>
                                                                <select class="form-control" name="datos[viveCerca]" id="viveCerca">
                                                                    <option value="">Seleccione</option>
                                                                    <option <?= $rowConfig['viveCerca'] == 1 ? 'selected' : '' ?> value="1">Si</option>
                                                                    <option <?= $rowConfig['viveCerca'] == 0 ? 'selected' : '' ?> value="0">No</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3 form-group">
                                                                <label for="">Tipo de cuenta</label>
                                                                <select class="form-control" name="datos[tipoCuenta]" id="tipoCuenta">
                                                                    <option value="">Seleccione</option>
                                                                    <option <?= $rowConfig['tipoCuenta'] == 'Ahorros' ? 'selected' : '' ?> value="Ahorros">Ahorros</option>
                                                                    <option <?= $rowConfig['tipoCuenta'] == 'Corriente' ? 'selected' : '' ?> value="Corriente">Corriente</option>
                                                                    <option <?= $rowConfig['tipoCuenta'] == 'Nomina' ? 'selected' : '' ?> value="Nomina">Nomina</option>
                                                                    <option <?= $rowConfig['tipoCuenta'] == 'Otro' ? 'selected' : '' ?> value="Otro">Otro</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3 form-group">
                                                                <label for="">Banco</label>
                                                                <input type="text" class="form-control" id="" name="datos[banco]" value="<?= $rowConfig['banco'] ?>">
                                                            </div>
                                                            <div class="col-md-3 form-group">
                                                                <label for="">N° Cuenta</label>
                                                                <input type="text" class="form-control" id="" name="datos[numeroCuenta]" value="<?= $rowConfig['numeroCuenta'] ?>">
                                                            </div>
                                                            <div class="col-md-3 form-group">
                                                                <label for="">Ciudad</label>
                                                                <input type="text" class="form-control" id="" name="datos[ciudad]" value="<?= $rowConfig['ciudad'] ?>">
                                                            </div>

                                                            <div class="col-md-3 form-group">
                                                                <label for="">N° Horas laborales</label>
                                                                <input type="number" class="form-control" id="" name="datos[horasLaborales]" value="<?= $rowConfig['horasLaborales'] ?>">
                                                            </div>
                                                            <div class="col-md-3 form-group">
                                                                <label for="">Valor x dia</label>
                                                                <input type="number" class="form-control" id="" name="datos[valorDia]" value="<?= $rowConfig['valorDia'] ?>" step="0.01">
                                                            </div>
                                                            <div class="col-md-3 form-group">
                                                                <label for="">Valor x hora</label>
                                                                <input type="number" class="form-control" id="" name="datos[valorHora]" value="<?= $rowConfig['valorHora'] ?>" step="0.01">
                                                            </div>
                                                            <div class="col-md-3 form-group">
                                                                <label for="">Salario básico</label>
                                                                <input type="number" class="form-control" id="" name="datos[salarioBasico]" value="<?= $rowConfig['salarioBasico'] ?>" step="0.01">
                                                            </div>
                                                            <div class="col-md-3 form-group">
                                                                <label for="">Pago en:</label>
                                                                <select name="datos[pago]" class="form-control" id="">
                                                                    <option value="">Seleccione</option>
                                                                    <option <?= $rowConfig['pago'] == 'Efectivo' ? 'selected' : '' ?> value="Efectivo">Efectivo</option>
                                                                    <option <?= $rowConfig['pago'] == 'Cheque' ? 'selected' : '' ?> value="Cheque">Cheque</option>
                                                                    <option <?= $rowConfig['pago'] == 'Transferencia' ? 'selected' : '' ?> value="Transferencia">Transferencia</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3 form-group">
                                                                <label for="">Nacionalidad</label>
                                                                <input type="text" class="form-control" id="" name="datos[nacionalidad]" value="<?= $rowConfig['nacionalidad'] ?>">
                                                            </div>
                                                            
                                                            <div class="col-md-3 form-group">
                                                                <label for="">Unidad Funcional</label>
                                                                <select name="datos[unidad_funcional]" class="form-control" id="">
                                                                    <option value="">Seleccione</option>
                                                                    <?php
                                                                    $query = "SELECT * from nominaEmpresasNiveles where (idEmpresa = '{$idEmpresa}' or idEmpresa = 0) and activo = 1";
                                                                    $result = mysqli_query($conn3, $query);
                                                                    while ($row = mysqli_fetch_array($result)) {
                                                                        echo "<option " . ($rowConfig['unidad_funcional'] == $row['id'] ? "selected" : "") . " value=" . $row['id'] . ">" . $row['codigo'] . " | " . $row['descripcion'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3 form-group">
                                                                <label for="">Cargo</label>
                                                                <select name="datos[cargo]" class="form-control" id="">
                                                                    <option value="">Seleccione</option>
                                                                    <?php
                                                                    $query = "SELECT * from nominaEmpresasCargos where (idEmpresa = '{$idEmpresa}' or idEmpresa = 0) and activo = 1";
                                                                    $result = mysqli_query($conn3, $query);
                                                                    while ($row = mysqli_fetch_array($result)) {
                                                                        echo "<option " . ($rowConfig['cargo'] == $row['id'] ? "selected" : "") . " value=" . $row['id'] . ">" . $row['codigo'] . " | " . $row['descripcion'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3 form-group">
                                                                <label for="">Profesión</label>
                                                                <select name="datos[profesion]" class="form-control" id="">
                                                                    <option value="">Seleccione</option>
                                                                    <?php
                                                                    $query = "SELECT * from nominaEmpresasProfesiones where (idEmpresa = '{$idEmpresa}' or idEmpresa = 0) and activo = 1";
                                                                    $result = mysqli_query($conn3, $query);
                                                                    while ($row = mysqli_fetch_array($result)) {
                                                                        echo "<option " . ($rowConfig['profesion'] == $row['id'] ? "selected" : "") . " value=" . $row['id'] . ">" . $row['codigo'] . " | " . $row['descripcion'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <!-- <div class="col-md-12">
                                                            <hr>
                                                        </div> -->

                                                        <div class="col-md-12 d-none">
                                                            <table class="table table-striped">
                                                                <?php
                                                                $columnasTabla = [
                                                                    'Cód',
                                                                    'Concepto',
                                                                    'Detalle',
                                                                    'F. Afiliación',
                                                                    'F. Ingreso',
                                                                    'Categoría',
                                                                    'F. Inicia',
                                                                    'F. final',
                                                                    'Valor',
                                                                    'Cód Pasivo',
                                                                    'Cód Gasto',
                                                                    '1ra',
                                                                    '2da',
                                                                ];
                                                                $query = "SELECT * from nominaEmpresasPersonalInf
                                                                where 1=1
                                                                and idPersonal = '{$rowConfig['id']}'
                                                                ";
                                                                $result = mysqli_query($conn3, $query);
                                                                $columnasTablaDatos = [];
                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    $columnasTablaDatos[] = $row;
                                                                }
                                                                ?>
                                                                <thead>
                                                                    <tr>
                                                                        <?php for ($i = 0; $i < count($columnasTabla); $i++) : ?>
                                                                            <th><?= $columnasTabla[$i] ?></th>
                                                                        <?php endfor; ?>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <?php for ($i = 0; $i < count($columnasTablaDatos); $i++) : ?>

                                                                        <?php endfor; ?>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-three-tab7" role="tabpanel" aria-labelledby="custom-tabs-three-tab7-tab">
                                                    <div class="card-body row">
                                                        <div class="col-md-12">
                                                            <h4>Novedades</h4>
                                                        </div>
                                                        <a class="btn btn-info rounded-pill mb-3" href="nominaPersonalNovedades?iP=<?= base64_encode($rowConfig['id']) ?>">
                                                            <i class="fas fa-plus"></i>
                                                            Nueva novedad
                                                        </a>
                                                        <table class="table table-striped">
                                                            <?php
                                                            $columnasTabla = [
                                                                'Novedad',
                                                                'Número',
                                                                'Motivo',
                                                                'F. Inicio',
                                                                'F. Final',
                                                                'Total días',
                                                                'Días vacaciones',
                                                                'Fecha',
                                                                'Año',
                                                            ];
                                                            $query = "SELECT * from nominaEmpresasPersonalNovedades
                                                                where 1=1
                                                                and idPersonal = '{$rowConfig['id']}'
                                                                ";
                                                            $result = mysqli_query($conn3, $query);
                                                            $columnasTablaDatos = [];
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                $columnasTablaDatos[] = $row;
                                                            }
                                                            ?>
                                                            <thead>
                                                                <tr>
                                                                    <?php for ($i = 0; $i < count($columnasTabla); $i++) : ?>
                                                                        <th><?= $columnasTabla[$i] ?></th>
                                                                    <?php endfor; ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php for ($i = 0; $i < count($columnasTablaDatos); $i++) : ?>
                                                                    <tr>
                                                                        <td><?= $columnasTablaDatos[$i]['novedad'] ?></td>
                                                                        <td><?= $columnasTablaDatos[$i]['numero'] ?></td>
                                                                        <td><?= $columnasTablaDatos[$i]['motivo'] ?></td>
                                                                        <td><?= $columnasTablaDatos[$i]['fechaInicio'] ?></td>
                                                                        <td><?= $columnasTablaDatos[$i]['fechaFin'] ?></td>
                                                                        <td><?= $columnasTablaDatos[$i]['totalDias'] ?></td>
                                                                        <td><?= $columnasTablaDatos[$i]['diasVacaciones'] ?></td>
                                                                        <td><?= $columnasTablaDatos[$i]['fecha'] ?></td>
                                                                        <td><?= $columnasTablaDatos[$i]['ano'] ?></td>
                                                                    </tr>
                                                                <?php endfor; ?>
                                                            </tbody>
                                                        </table>

                                                        <div class="col-md-12">
                                                            <hr>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <h4>Contratos</h4>
                                                        </div>
                                                        <a class="btn btn-info rounded-pill mb-3" href="nominaPersonalContratos?iP=<?= base64_encode($rowConfig['id']) ?>">
                                                            <i class="fas fa-plus"></i>
                                                            Nuevo
                                                        </a>
                                                        <table class="table table-striped">
                                                            <?php
                                                            $columnasTabla = [
                                                                'Número',
                                                                'Fecha Inicia',
                                                                'Fecha Termina',
                                                                'Observación',
                                                                'Estado',
                                                                'Tipo de contrato',
                                                                'Modo de terminación',
                                                            ];
                                                            $query = "SELECT * from nominaEmpresasPersonalContratos
                                                                where 1=1
                                                                and idPersonal = '{$rowConfig['id']}'
                                                                ";
                                                            $result = mysqli_query($conn3, $query);
                                                            $columnasTablaDatos = [];
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                $columnasTablaDatos[] = $row;
                                                            }
                                                            ?>
                                                            <thead>
                                                                <tr>
                                                                    <?php for ($i = 0; $i < count($columnasTabla); $i++) : ?>
                                                                        <th><?= $columnasTabla[$i] ?></th>
                                                                    <?php endfor; ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php for ($i = 0; $i < count($columnasTablaDatos); $i++) : ?>
                                                                    <tr>
                                                                        <td><?= $columnasTablaDatos[$i]['numero'] ?></td>
                                                                        <td><?= $columnasTablaDatos[$i]['fechaInicio'] ?></td>
                                                                        <td><?= $columnasTablaDatos[$i]['fechaFin'] ?></td>
                                                                        <td><?= $columnasTablaDatos[$i]['observacion'] ?></td>
                                                                        <td><?= $columnasTablaDatos[$i]['estado'] ?></td>
                                                                        <td><?= $columnasTablaDatos[$i]['tipoContrato'] ?></td>
                                                                        <td><?= $columnasTablaDatos[$i]['modoTerminacion'] ?></td>
                                                                    </tr>
                                                                <?php endfor; ?>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="datos[idEmpresa]" value="<?= $idEmpresa ?>" value="<?= $rowConfig['idEmpresa'] ?>">
                                    <input type="hidden" name="datos[activo]" value="1" value="<?= $rowConfig['activo'] ?>">
                                    <input type="hidden" name="datos[usuario_id]" value="<?= $ID ?>" value="<?= $rowConfig['usuario_id'] ?>">
                                    <input type="hidden" name="datos[fecha]" value="<?= date('y-m-d H:i:s') ?>" value="<?= $rowConfig['fecha'] ?>">
                                    <button type="submit" class="btn btn-outline-info rounded-pill" onclick="$('#empleadorForm').automaticForm({type:<?= ($rowConfig == null ? 1 : 2) ?>, table:'<?= $tabla ?>',idUpdate:'<?= ($rowConfig == null ? 0 : $rowConfig['id']) ?>',reload:'',page:'<?= $page ?>?e=<?= base64_encode($idEmpresa) ?>&FAID='});">
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
                                    <h4>Listado de empleados en <strong><?= $rowEmpresa['nombre'] ?></strong></h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="Tabla_Rapida_AJAX">
                                    <?php
                                    $columnasTabla = [
                                        'Código',
                                        'Documento',
                                        'Nombre',
                                        'Estado',
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
    titulo_tabla = 'Profesiones';
    query_tabla_ajax = "<?= "SELECT *, estado as activo from $tabla where idEmpresa = $idEmpresa" ?>";
    columnas = ['id', 'fechaRegistro', 'tipo_documento', 'documento', 'nombre', 'fecha_nacimiento', 'lugar_nacimiento', 'estado_civil', 'hijos', 'tipo_sangre', 'direccion', 'barrio', 'telefono', 'celular', 'municipio', 'departamento', 'correo', 'actividad_economica', 'notas', 'activo', 'idEmpresa', 'activo', 'usuario_id', 'fecha', 'foto'];
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
                data += `${row.tipo_documento} ${row.documento}`;
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
                data += `<p class="estado${row.id}"></p>`;
                funcionMaster(row.activo, 'id', 'descripcion', 'estadosEmpleado', '.estado' + row.id);
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `<a href="./<?= $page ?>?e=<?= base64_encode($idEmpresa) ?>&FAID=${btoa(row.id)}" class="btn btn-outline-info rounded-pill btn-block" title="Editar">
                    <i class="fa fa-edit"></i>
                    Editar
                    </a>`;
                return data;
            }
        },
    ];
</script>