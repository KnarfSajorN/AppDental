<?php
include 'header.php';
include 'menu.php';
if ($_POST['nombreExamen'] != "") {
    $idDoctor = $_POST['idDoctor'];
    $nombreExamen = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['nombreExamen'])));
    $idExamen = $_POST['idExamen'];
    switch ($_POST['accion']) {
        case 'Agregar Exámen':
            $query = mysqli_query($conn3, "INSERT INTO examenesLB SET idDoctor = {$idDoctor}, nombreExamen = '{$nombreExamen}'");

            echo "INSERT INTO examenesLB SET idDoctor = {$idDoctor}, nombreExamen = '{$nombreExamen}'";
            break;
        case 'EDITAR':
            $query = mysqli_query($conn3, "UPDATE examenesLB SET nombreExamen = '{$nombreExamen}' WHERE id = {$idExamen}");
            break;
        default:
            # code...
            break;
    }
    if ($query) {
       echo '<script type="text/javascript">window.location.href="SO_CrearExamenes"</script>';
    } else {
        echo $_POST['accion'];
        echo "<pre>";
        var_dump(mysqli_error_list($conn3));
        echo "</pre>";
    }
}
if ($_GET['key']) {
    $idExamen = $_GET['id'];
    $btn = strtoupper($_GET['key']);
    switch ($_GET['key']) {
        case 'editar':
            $query = mysqli_query($conn3, "SELECT * FROM examenesLB WHERE id = {$idExamen}")->fetch_object();
            break;
        case 'remover':
            $query = mysqli_query($conn3, "UPDATE examenesLB SET estado = '0' WHERE id = {$idExamen}");
            break;
        default:
            break;
    }
    if ($query && $_GET['key'] == "remover") {
        echo '<script type="text/javascript">window.location.href="SO_CrearExamenes"</script>';
    } else if (!$query && $_GET['key'] == "remover") {
        echo $_POST['accion'];
        echo "<pre>";
        var_dump(mysqli_error_list($conn3));
        echo "</pre>";
    }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Exámenes para Salud Ocupacional
        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Registro de Exámenes para Salud Ocupacional</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="col-md-12 text-center"><b>Exámenes para Salud Ocupacional</b></h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="box-body table-responsive no-padding">
                            <div class="container-fluid">
                                <form action="SO_CrearExamenes" method="post">
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <div class="col-md-12">
                                                <label for="nombreExamen">Nombre del Exámen</label>
                                                <input type="text" name="nombreExamen" id="nombreExamen" value="<?= $query->nombreExamen ?>" class="form-control input-lg">
                                                <input type="hidden" name="idDoctor" id="idDoctor" value="<?= $_SESSION['ID'] ?>">
                                                <input type="hidden" name="idExamen" id="idExamen" value="<?= $query->id ?>">
                                            </div>
                                            <div class="col-md-12">
                                                <br>
                                                <input type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="accion" value="<?= ($btn != "" ? $btn : 'Agregar Exámen') ?>" style="border-top-left-radius: 0; border-top-right-radius: 0;">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-md-12">
                                    <table id="nuevaTabla" class="table table-bordered table-striped" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%">#</th>
                                                <th style="width: 70%">Nombre</th>
                                                <th style="width: 20%">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th style="width: 10%">#</th>
                                                <th style="width: 70%">Nombre</th>
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
            input: "#nuevaTabla", // id del input
            selectFrom: "<?= Encriptar("*") ?>", // SELECT la colausa entre estos dos  FROM
            name: "<?= Encriptar("examenesLB") ?>", // Nombre de la tabla o en su defecto si se realiza joins y de mas
            camposValue: "<?= Encriptar(json_encode(["id", "nombreExamen"])) ?>", // Campos que se mostraran en la tabla ATENCION: en caso de usar inner si presentan porblemas al usar el filtrado por columnas, deberan reflejar cada columna con su sufijo, Ejemplo: c.cliente O en caso de no usar mascara ser directos cliente.cliente_id
            clausula: {
                data: "<?= Encriptar("estado = $0") ?>",
                value: ['1'],
            },
            likeWhere: "<?= Encriptar('nombreExamen') ?>", // campos que se usaran en el buscador (CAMPO LIKE %CAMPO%)
            order: "<?= Encriptar(json_encode(['order by' => '$0'])) ?>", // Orden de la consulta, AQUI SE PUEDE PONER EL ORDER BY, GROUP BY
            btns: btoa(JSON.stringify({ // Botones que se mostraran en la tabla
                btn1: btoa(JSON.stringify({ // Boton 1 PARA CREAR MAS BOTONES ES IMPORTANTE MANTENER LA NUMERACION EJEMPL BTN1, BTN2 ETC
                    style: false,
                    class: "<?= Encriptar("fa fa-pencil text-primary") ?>",
                    id: false,
                    href: "<?= Encriptar("SO_CrearExamenes?id=$0&key=editar") ?>",
                    title: "<?= Encriptar("Editar Examen") ?>",
                    event: "<?= Encriptar("") ?>",
                    target: "<?= Encriptar("") ?>", // blank_
                    dataPlacement: false,
                    dataToggle: false,
                    dataOriginalTitle: false,
                    value: "<?= Encriptar("id") ?>" // indices del href dividir con || en caso de presentar mas de un indice del boton
                })),
                btn2: btoa(JSON.stringify({
                    style: false,
                    class: "<?= Encriptar("fa fa-trash text-danger") ?>",
                    id: false,
                    href: "<?= Encriptar("SO_CrearExamenes?id=$0&key=remover") ?>",
                    title: "<?= Encriptar("Remover Examen") ?>",
                    event: false,
                    target: "<?= Encriptar("") ?>", // blank_
                    dataPlacement: false,
                    dataToggle: false,
                    dataOriginalTitle: false,
                    value: "<?= Encriptar("id") ?>" // indices del href dividir con || en caso de presentar mas de un indice del boton
                })),
            })),
            carapter: "false", // ACTIVAR O DESACTUVAR UTF8_DECODE
            tbody: true, // ACTIVAR O DESACTIVAR LA ANIMACION DE CARGA
        });
    });
</script>
<script>
  // no quitar para evitar problemas de que guarde con este caracter ""
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>