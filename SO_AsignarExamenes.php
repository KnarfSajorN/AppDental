<?php
include 'header.php';
include 'menu.php';
$idCliente = $_GET['idCliente'];
if (isset($_POST['cargarExamanes'])) {
    $idDoctor = $_POST['idDoctor'];
    $cargarExamanes = $_POST['cargarExamanes'];
    switch ($_POST['accion']) {
        case 'Agregar Exámen a la Orden':
            $querySelect = mysqli_query($conn3, "SELECT * FROM generarOrden WHERE idCliente = {$idCliente} AND cargado = 0");
            $numRow = mysqli_num_rows($querySelect);
            if ($numRow > 0) {
                $querySelect = $querySelect->fetch_object();
            } else {
                $query = mysqli_query($conn3, "INSERT INTO generarOrden SET idDoctor = {$idDoctor}, idCliente = {$idCliente}");
                if ($query) {
                    $querySelect = mysqli_query($conn3, "SELECT * FROM generarOrden WHERE idCliente = {$idCliente} AND cargado = 0")->fetch_object();
                } else {
                    echo "<pre>";
                    var_dump(mysqli_error_list($conn3));
                    echo "</pre>";
                }
            }
            foreach ($cargarExamanes as $key => $value) {
                $querySelect2 = mysqli_query($conn3, "SELECT * FROM examanesAsignados WHERE idOrden = {$querySelect->id} AND idExamen = {$value}");
                $numRow = mysqli_num_rows($querySelect2);
                if ($numRow > 0) {
                    $query = mysqli_query($conn3, "UPDATE examanesAsignados SET estado = 1 WHERE id = {$querySelect2->fetch_object()->id}");
                } else {
                    $query = mysqli_query($conn3, "INSERT INTO examanesAsignados SET idOrden = {$querySelect->id}, idExamen = {$value}");
                }
            }
            break;
        case 'EDITAR':
            $query = mysqli_query($conn3, "UPDATE examenesLB SET nombreExamen = '{$nombreExamen}' WHERE id = {$idExamen}");
            break;
        default:
            # code...
            break;
    }
    if ($query) {
        echo '<script type="text/javascript">window.location.href="SO_AsignarExamenes?idCliente=' . $idCliente . '"</script>';
    } else {
        echo $_POST['accion'];
        echo "<pre>";
        var_dump(mysqli_error_list($conn3));
        echo "</pre>";
    }
}
if ($_GET['key']) {
    $idExamenAsignado = $_GET['id'];
    $btn = strtoupper($_GET['key']);
    switch ($_GET['key']) {
        case 'remover':
            $query = mysqli_query($conn3, "UPDATE examanesAsignados SET estado = '0' WHERE id = {$idExamenAsignado}");
            break;
        default:
            break;
    }
    if ($query && $_GET['key'] == "remover") {
        echo '<script type="text/javascript">window.location.href="SO_AsignarExamenes?idCliente=' . $idCliente . '"</script>';
    } else if (!$query && $_GET['key'] == "remover") {
        echo $_POST['accion'];
        echo "<pre>";
        var_dump(mysqli_error_list($conn3));
        echo "</pre>";
    }
}

$querySelect = mysqli_query($conn3, "SELECT * FROM cliente WHERE cliente_id = {$idCliente}");
while ($numArray = mysqli_fetch_array($querySelect)) {
    $cliente_id = $numArray['cliente_id'];
    $usuario_id = $numArray['usuario_id'];
    $nombre_cliente = $numArray['nombre_cliente'];
    $celular_cliente = $numArray['celular_cliente'];
    $ciudad_cliente = $numArray['ciudad_cliente'];
    $correo_cliente = $numArray['correo_cliente'];
    $CODI_CLIENTE = $numArray['CODI_CLIENTE'];
    $tipo_cliente = $numArray['tipo_cliente'];
    $fechar = $numArray['fechar'];
    $fecha_actualizado = $numArray['fecha_actualizado'];
    $activo = $numArray['activo'];
    $genero = $numArray['genero'];
    $direccion_cliente = $numArray['direccion_cliente'];
    $telefono_cliente = $numArray['telefono_cliente'];
    $edad_cliente = $numArray['edad_cliente'];
    $profesion_cliente = $numArray['profesion_cliente'];
    $acompananteFamiliar = $numArray['acompananteFamiliar'];
    $telefono_acompanante = $numArray['telefono_acompanante'];
    $parentesco_acompanante = $numArray['parentesco_acompanante'];
    $antecedentes = $numArray['antecedentes'];
    $entidadSalud = $numArray['entidadSalud'];
    $seguro = $numArray['seguro'];
    $nota = $numArray['nota'];
    $alergias = $numArray['alergias'];
    $tiposSangre = $numArray['tiposSangre'];
    $esDonante = $numArray['esDonante'];
    $tomaMedicamento = $numArray['tomaMedicamento'];
    $enfermedadesPequeno = $numArray['enfermedadesPequeno'];
    $fotoperfil = $numArray['fotoperfil'];
    $motivoConsulta = $numArray['motivoConsulta'];
    $fechaNacimiento = $numArray['fechaNacimiento'];
    $peso = $numArray['peso'];
    $altura = $numArray['altura'];
    $imc = $numArray['imc'];
    $ComposicionCorporal = $numArray['ComposicionCorporal'];
    $ap1 = $numArray['ap1'];
    $ap2 = $numArray['ap2'];
    $ap3 = $numArray['ap3'];
    $ap4 = $numArray['ap4'];
    $ap5 = $numArray['ap5'];
    $ap6 = $numArray['ap6'];
    $ap7 = $numArray['ap7'];
    $ap8 = $numArray['ap8'];
    $ap9 = $numArray['ap9'];
    $cirugiasCuales = $numArray['cirugiasCuales'];
    $cirugiasOtros = $numArray['cirugiasOtros'];
    $whatsapp = $numArray['whatsapp'];
    $tipoUsuario = $numArray['tipoUsuario'];
    $estado = $numArray['estado'];
    $sucursal = $numArray['sucursal'];
    $ocupacion = $numArray['ocupacion'];
    $nacionalidad = $numArray['nacionalidad'];
    $cod_entidad = $numArray['cod_entidad'];
    $nombre = $numArray['nombre'];
    $apellido = $numArray['apellido'];
    $zona = $numArray['zona'];
    $asignar = $numArray['asignar'];
    $primer_nombre = $numArray['primer_nombre'];
    $segundo_nombre = $numArray['segundo_nombre'];
    $primer_apellido = $numArray['primer_apellido'];
    $segundo_apellido = $numArray['segundo_apellido'];
    $genero_asignado = $numArray['genero_asignado'];
    $nivel_educacion = $numArray['nivel_educacion'];
    $prepagada = $numArray['prepagada'];
    $indicativo = $numArray['indicativo'];
    $habeasdata = $numArray['habeasdata'];
    $codigo_pais = $numArray['codigo_pais'];
    $codigo_departamento = $numArray['codigo_departamento'];
    $codigo_ciudad = $numArray['codigo_ciudad'];
    $expedicionDocumento = $numArray['expedicionDocumento'];
    $EPS = $numArray['EPS'];
    $AFP = $numArray['AFP'];
    $ARL = $numArray['ARL'];
    $estrato = $numArray['estrato'];
    $localidad = $numArray['localidad'];
    $idEmpresa = $numArray['idEmpresa'];
    $tiposExamen = $numArray['tiposExamen'];
}


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Orden de Exámenes - Salud Ocupacional, Paciente: <?= $nombre_cliente ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Registro de Orden de Exámenes - Salud Ocupacional</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="col-md-12 text-center"><b>Generar Orden de Exámenes</b> <a href="SO_SalaControl?idCliente=<?= $idCliente ?>" class="text-primary" title="Volver a Sala Control"><i class="fa fa-play" aria-hidden="true"></i></a></h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="box-body table-responsive no-padding">
                            <div class="container-fluid">
                                <form action="SO_AsignarExamenes?idCliente=<?= $idCliente ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <div class="col-md-12">
                                                <label for="nombreExamen">Exámenes: </label>
                                                <select name="cargarExamanes[]" id="cargarExamanes" class="form-control input-lg select2" multiple style="width: 100%"></select>
                                                <input type="hidden" name="idDoctor" id="idDoctor" value="<?= $_SESSION['ID'] ?>">
                                            </div>
                                            <!-- <div class="col-md-12">
                                                <label for="nombreExamen">Examen: </label>
                                                <input type="text" name="nombreExamen" id="nombreExamen" value="<?= $query->nombreExamen ?>" class="form-control input-lg">
                                                <input type="hidden" name="idDoctor" id="idDoctor" value="<?= $_SESSION['ID'] ?>">
                                                <input type="hidden" name="idExamen" id="idExamen" value="<?= $query->id ?>">
                                            </div> -->
                                            <div class="col-md-12">
                                                <br>
                                                <input type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="accion" value="<?= ($btn != "" ? $btn : 'Agregar Exámen a la Orden') ?>" style="border-top-left-radius: 0; border-top-right-radius: 0;">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-md-12">
                                    <table id="nuevaTabla" class="table table-bordered table-striped" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%">#</th>
                                                <th style="width: 70%">Nombre del Examen</th>
                                                <th style="width: 20%">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th style="width: 10%">#</th>
                                                <th style="width: 70%">Nombre del Examen</th>
                                                <th style="width: 20%">Acciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';
include 'dataTablePaginacion.php';
include("ajaxCreadorSelect.php");
function Encriptar($valor)
{
    $Sc = base64_decode("keyMaster");
    $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
    return $Texto;
}
?>
<script type="text/javascript">
    window.addEventListener('load', () => {
        let tablaOne = tablaDinamica({
            input: "#nuevaTabla",
            selectFrom: "<?= Encriptar("a.id AS id, a.idExamen AS idExamen, lb.nombreExamen AS nombreExamen, o.idDoctor AS idDoctor, o.idCliente AS idCliente, o.cargado AS cargado, a.created_at AS fechaEAsinado, lb.created_at AS fechaOrden") ?>",
            name: "<?= Encriptar("examanesAsignados AS a JOIN examenesLB AS lb ON a.idExamen = lb.id JOIN generarOrden AS o ON a.idOrden = o.id") ?>",
            camposValue: "<?= Encriptar(json_encode(["id", "nombreExamen"])) ?>",
            clausula: {
                data: "<?= Encriptar("o.idCliente = $0 AND a.estado = 1 AND o.cargado = 0") ?>",
                value: [<?= $idCliente ?>],
            },
            likeWhere: "<?= Encriptar("nombreExamen") ?>",
            order: "<?= Encriptar(json_encode(['order by' => 'a.$0'])) ?>", // Orden de la consulta, AQUI SE PUEDE PONER EL ORDER BY, GROUP BY
            btns: btoa(JSON.stringify({ // Botones que se mostraran en la tabla
                btn1: btoa(JSON.stringify({ // Boton 1 PARA CREAR MAS BOTONES ES IMPORTANTE MANTENER LA NUMERACION EJEMPL BTN1, BTN2 ETC
                    style: false,
                    class: "<?= Encriptar("fa fa-trash text-danger") ?>",
                    id: false,
                    href: "<?= Encriptar("SO_AsignarExamenes?idCliente=$0&id=$1&key=remover") ?>",
                    title: "<?= Encriptar("Editar Examen") ?>",
                    event: "<?= Encriptar("") ?>",
                    target: "<?= Encriptar("") ?>", // blank_
                    dataPlacement: false,
                    dataToggle: false,
                    dataOriginalTitle: false,
                    value: "<?= Encriptar("idCliente || id") ?>" // indices del href dividir con || en caso de presentar mas de un indice del boton
                })),
            })),
            carapter: "true", // ACTIVAR O DESACTUVAR UTF8_DECODE
            tbody: true, // ACTIVAR O DESACTIVAR LA ANIMACION DE CARGA
        });
        Select2Dinamico(
            "#cargarExamanes", {
                selectFrom: "<?= Encriptar("*") ?>",
                name: "<?= Encriptar("examenesLB") ?>",
                value: "<?= Encriptar("id") ?>",
                text: "<?= Encriptar("nombreExamen") ?>",
                likeWhere: "<?= Encriptar("nombreExamen") ?>",
                order: "<?= Encriptar(json_encode(['order by' => 'id'])) ?>",
                clausula: {
                    data: "<?= Encriptar("estado = 1") ?>",
                    value: [''],
                },
                carapter: "true",
                campoCreador: btoa(JSON.stringify({ // Botones que se mostraran en la tabla
                    nombreCreador: false,
                    conditionInsert: false,
                    conditionSelect: false,
                })),
            }, false, false
        );
    });
</script>