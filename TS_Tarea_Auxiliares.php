<?php
if (isset($_POST['key'])) {
    include 'config.php';
    $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_errno($conn3));
    if ($_POST['key'] == "selectName") {
        $idTipo = $_POST['idTipo'];
        $querySelect = mysqli_query($conn3, "SELECT * FROM TS_Tareas_Auxiliares WHERE activo = 1 AND tipoEstado != 0 AND tipoEstado = {$idTipo}")->fetch_object();
        // $newArray[0] = $querySelect->id;
        $newArray[0] = $querySelect->nombreAuxiliar;
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($newArray);
    exit();
}

include 'header.php';
include 'menu.php';

if (isset($_POST['guardarAuxiliar'])) {
    $nombreAuxiliar     = mysql_real_escape_string(htmlspecialchars(trim($_POST['nombreAuxiliar'])));
    $usuario_id     = mysql_real_escape_string(htmlspecialchars(trim($_POST['usuario_id'])));
    $querySelect = mysqli_query($conn3, "SELECT * FROM TS_Tareas_Auxiliares WHERE activo = 1 AND tipoEstado != 0 ORDER BY tipoEstado DESC LIMIT 1");
    $unLock = true;
    if ($querySelect) {
        $tipoEstado = ($querySelect->fetch_object()->tipoEstado + 1);
        $queryInsert = mysqli_query($conn3, "INSERT INTO TS_Tareas_Auxiliares SET idDoctor = '{$usuario_id}', tipoEstado = '{$tipoEstado}', nombreAuxiliar = '{$nombreAuxiliar}'");
        if ($queryInsert) {
            echo "<script language='Javascript'> window.location='TS_Tarea_Auxiliares.php';</script>";
        } else {
            $unLock = false;
        }
    } else {
        $unLock = false;
    }
    if ($unLock == true) {
        echo '<pre>';
        var_dump(mysqli_error_list($conn3));
        echo '</pre>';
    }
}
if (isset($_POST['actualizarAuxiliar'])) {
    $asignado     = mysql_real_escape_string(htmlspecialchars(trim($_POST['asignado'])));
    $nombreAuxiliar     = mysql_real_escape_string(htmlspecialchars(trim($_POST['nombreAuxiliar'])));
    $usuario_id     = mysql_real_escape_string(htmlspecialchars(trim($_POST['usuario_id'])));
    $querySelect = mysqli_query($conn3, "UPDATE TS_Tareas_Auxiliares SET nombreAuxiliar = '{$nombreAuxiliar}' WHERE tipoEstado = '{$asignado}'");
    if ($querySelect) {
        echo "<script language='Javascript'> window.location='TS_Tarea_Auxiliares.php';</script>";
    } else {
        echo '<pre>';
        var_dump(mysqli_error_list($conn3));
        echo '</pre>';
    }
}

/* ATENCION */
// Si el Cliente solicita Remover en esta area, solo descomentar este codigo.
// Tambien descomentar lo que estara comentado en la tabla mas abajo, buen dia compañer@.
// By: Shoe
// if (isset($_GET['remove'])) {
//     $idAuxiliar     = mysql_real_escape_string(htmlspecialchars(trim($_GET['idAuxiliar'])));
//     $querySelect = mysqli_query($conn3, "UPDATE TS_Tareas_Auxiliares SET activo = 0 WHERE ID = '{$idAuxiliar}'");
//     if ($querySelect) {
//         echo "<script language='Javascript'> window.location='TS_Tarea_Auxiliares.php';</script>";
//     } else {
//         echo '<pre>';
//         var_dump(mysqli_error_list($conn3));
//         echo '</pre>';
//     }
// }
?>

<link href="css/input.css" rel="stylesheet" type="text/css" media="all">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Usuarios</h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Usuarios</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="TS_Tarea_Auxiliares.php" method="POST" id="formAuxiliares" name="formAuxiliares" style="display: flex; justify-content: center">
                            <div class="row col-md-6 col-xs-12">
                                <div class="form__group col-md-12">
                                    <select class="form__field" name="asignado" id="asignado" style="max-width:100%;">
                                        <option value="" selected>Seleccione... (Alternar Opcion permite Agregar Funcionario)</option>
                                        <?php
                                        $queryAuxiliar = mysqli_query($conn3, "SELECT * FROM TS_Tareas_Auxiliares WHERE activo = 1 AND tipoEstado != 0");
                                        while ($arrayAuxiliar = mysqli_fetch_array($queryAuxiliar)) {
                                        ?>
                                            <option value="<?= $arrayAuxiliar['tipoEstado'] ?>"><?= ($arrayAuxiliar['tipoEstado'] == 0 ? $arrayAuxiliar['nombreAuxiliar'] : 'Funcionario ' . $arrayAuxiliar['tipoEstado'] . " - " . $arrayAuxiliar['nombreAuxiliar']) ?></option>
                                            <!-- <option value="<?= $arrayAuxiliar['tipoEstado'] ?>"><?= ($arrayAuxiliar['tipoEstado'] == 0 ? $arrayAuxiliar['nombreAuxiliar'] : 'Auxiliar ' . $arrayAuxiliar['tipoEstado'] . " - " . $arrayAuxiliar['nombreAuxiliar']) ?></option> -->
                                            <?php
                                        }
                                            ?>¿
                                    </select>
                                    <label for="asignado" class="form__label">Para Modificar:</label>
                                </div>
                                <div class="form__group col-md-12">
                                    <input class="form__field" name="nombreAuxiliar" id="nombreAuxiliar" type="text" required>
                                    <label for="Titulo" class="form__label">Nombre Funcionario</label>
                                    <!-- <label for="Titulo" class="form__label">Nombre Auxiliar</label> -->
                                </div>
                                <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                                <div class="col-md-12" style="margin-top: 25px;">
                                    <button type="submit" class="btn btn-block btn-primary btn-sm pulse" name="guardarAuxiliar" id="guardarAuxiliar" style="left: -8.5px; position: inherit;">
                                        <h4> <strong id="cambioName"> G u a r d a r </strong> </h4>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="">
                            <div class="col-md-12">
                                <h2><b>Registros de Usuarios</b></h2>
                                <div class="container-fluid">
                                    <table class="table" id="example1">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="30%">Rango</th>
                                                <th width="30%">Nombre</th>
                                                <th width="15%">Registrado</th>
                                                <th width="15%">Actualizado</th>
                                                <!-- Para Remover Descomenta el TH -->
                                                <!-- <th width="5%">OP</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $querySelectAuxiliar = mysqli_query($conn3, "SELECT * FROM TS_Tareas_Auxiliares WHERE activo = 1 AND tipoEstado != 0");
                                            $contador = 1;
                                            while ($arrayAuxiliar = mysqli_fetch_array($querySelectAuxiliar)) { ?>
                                                <tr>
                                                    <td><?= $contador; ?></td>
                                                    <td><?= "Funcionario " . $arrayAuxiliar['tipoEstado']; ?></td>
                                                    <!-- <td><?= "Auxiliar " . $arrayAuxiliar['tipoEstado']; ?></td> -->
                                                    <td><?= $arrayAuxiliar['nombreAuxiliar']; ?></td>
                                                    <td><?= $arrayAuxiliar['created_at']; ?></td>
                                                    <td><?= $arrayAuxiliar['updated_at']; ?></td>
                                                    <!-- Para Remover Descomenta el TD -->
                                                    <!-- <td><a href="TS_Tarea_Auxiliares.php?idAuxiliar=<?= $arrayAuxiliar['id']; ?>&remove=true" class="text-bold text-danger"><i class="fa fa-trash"></i></a></td> -->
                                                </tr>
                                            <?php $contador++;
                                            } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="30%">Rango</th>
                                                <th width="30%">Nombre</th>
                                                <th width="15%">Registrado</th>
                                                <th width="15%">Actualizado</th>
                                                <!-- Para Remover Descomenta el TH -->
                                                <!-- <th width="5%">OP</th> -->
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include("footer.php") ?>
<script type="text/javascript">
    $(function() {
        $('#asignado').on('change', (e) => {
            if ($('#asignado').val() == '') {
                $('#guardarAuxiliar').attr('name', 'guardarAuxiliar');
                $('#nombreAuxiliar').val('');
                $('#cambioName').text('G u a r d a r');
            } else {
                $('#cambioName').text('A c t u a l i z a r');
                $('#guardarAuxiliar').attr('name', 'actualizarAuxiliar');
                let date = {
                    idTipo: $('#asignado').val(),
                    key: 'selectName'
                };
                $.ajax({
                    url: "TS_Tarea_Auxiliares.php",
                    data: date,
                    type: "POST",
                    dataType: 'JSON',
                    success: function(resp) {
                        console.log(resp);
                        $('#nombreAuxiliar').val(resp[0]);
                    },
                });
            }
            // console.log($('#asignado').val());
        });
    });
</script>