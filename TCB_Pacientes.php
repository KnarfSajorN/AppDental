<?php
include 'header.php';
include 'menu.php';
$idHistoria = 0;
$idHistoria = $_GET['id'];


$queryListhc = mysqli_query($conn3, "SELECT * from configTablas where id = $idHistoria");
if ($queryListhc) {
    while ($rowhc = mysqli_fetch_array($queryListhc)) {
        $menuNombre = $rowhc['menuNombre'];
        $nombreH = $rowhc['nombre'];
        $idHistoria = $rowhc['id'];
        $database = $rowhc['name'];
    }
}


if ($idHistoria == 0) {
    header("Location: portada");
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Historia de Onda de Choque y Choque Bilateral

        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Historia de Onda de Choque y Choque Bilateral</a></li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-md-12">


                <div class="box">
                    <div class="box-header">
                        <a href="nuevoPaciente">
                            <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                <h4> <strong> <i class="fa fa-glyphicon glyphicon-plus"></i> Registrar Pacientes </strong></h4>
                            </button>
                        </a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cedula</th>
                                        <th>Direccion (Casa)</th>
                                        <th>Celular (Contacto)</th>
                                        <th>Celular (Whatsapp)</th>
                                        <th>Correo</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     if (($_SESSION['vista'] == 0 || $_SESSION['vista'] == 1) and $_SESSION['sucursal'] != 0) {
                                        $filtro = (($_SESSION['vista'] == 1) ? "usuario_id = '{$_SESSION['ID']}' AND " : ''); 
                                       $query_tabla_ajax = "SELECT * FROM  cliente WHERE {$filtro} sucursal = '$sucursal' $queryCliente ORDER BY cliente_id";
                                      } else if (($_SESSION['vista'] == 0 || $_SESSION['vista'] == 1)) {
                                        $filtro = (($_SESSION['vista'] == 1) ? "AND usuario_id = '{$_SESSION['ID']}'" : ''); 
                                       $query_tabla_ajax = "SELECT * FROM  cliente WHERE 1=1 {$filtro} $queryCliente ORDER BY cliente_id";
                                      }

                                    //$queryClientes = "SELECT * from cliente";
                                    $resultClientes = mysqli_query($conn3, $query_tabla_ajax);
                                    if ($resultClientes) {
                                    
                                    while ($rowClientes = mysqli_fetch_array($resultClientes)) {
                                        $totalSesiones = 0;
                                        $sesionesChoque = 0;
                                        $idHistoria = 0;
                                        $historiaChoque = mysqli_query($conn3, "SELECT id, numeroSesiones FROM HT_OndasChoque WHERE cliente_id = '{$rowClientes['cliente_id']}' AND activo = 1");
                                        if (!empty(mysqli_num_rows($historiaChoque))) {
                                            $historiaChoque = mysqli_fetch_assoc($historiaChoque);
                                            $idHistoria = $historiaChoque['id'];
                                            $totalSesiones = $historiaChoque['numeroSesiones'];
                                            $sesion1 = mysqli_query($conn3, "SELECT sesion FROM sesionesAplicadas WHERE historia_id = '{$historiaChoque['id']}' AND historia_tipo = 0 ORDER BY sesion DESC LIMIT 1");
                                            if (!empty(mysqli_num_rows($sesion1))) {
                                                $sesion1 = mysqli_fetch_assoc($sesion1);
                                                $sesionesChoque = $sesion1['sesion'];
                                            }
                                        }
                                        $totalSesiones2 = 0;
                                        $sesionesBilateral = 0;
                                        $idHistoria2 = 0;
                                        $historiaBilateral = mysqli_query($conn3, "SELECT id, numeroSesiones FROM HT_OndasChoqueBilateral WHERE cliente_id = '{$rowClientes['cliente_id']}' AND activo = 1");
                                        if (!empty(mysqli_num_rows($historiaBilateral))) {
                                            $historiaBilateral = mysqli_fetch_assoc($historiaBilateral);
                                            $idHistoria2 = $historiaBilateral['id'];
                                            $totalSesiones2 = $historiaBilateral['numeroSesiones'];
                                            $sesion2 = mysqli_query($conn3, "SELECT sesion FROM sesionesAplicadas WHERE historia_id = '{$historiaBilateral['id']}' AND historia_tipo = 1 ORDER BY sesion DESC LIMIT 1");
                                            if (!empty(mysqli_num_rows($sesion2))) {
                                                $sesion2 = mysqli_fetch_assoc($sesion2);
                                                $sesionesBilateral = $sesion2['sesion'];
                                            }
                                        }

                                    ?>
                                        <tr>
                                            <td><?= $rowClientes['nombre_cliente'] ?></td>
                                            <td><?= $rowClientes['CODI_CLIENTE'] ?></td>
                                            <td><?= $rowClientes['direccion_cliente'] ?></td>
                                            <td><?= $rowClientes['telefono_cliente'] ?></td>
                                            <td><?= $rowClientes['whatsapp'] ?></td>
                                            <td><?= $rowClientes['correo_cliente'] ?></td>
                                            <td>
                                                <?php if (!empty($totalSesiones)) : ?>
                                                    Sesiones Ondas Choque: <?= $sesionesChoque ?> de <?= $totalSesiones ?> <br>
                                                    <a href="TCB_Historia_Tratamiento?clienteId=<?= $rowClientes['cliente_id'] ?>&tipo=2&idHistoriaSesion=<?= $idHistoria ?>&tipoHistoria=0" target="_blank" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Sesión</a><br>
                                                <?php else : ?>
                                                    <a href="TCB_Historia_Tratamiento?clienteId=<?= $rowClientes['cliente_id'] ?>&tipo=0" target="_blank" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Historia de Ondas de Choque</a><br>
                                                <?php endif; ?>
                                                <?php if (!empty($totalSesiones2)) : ?>
                                                    Sesiones Choque Bilateral: <?= $sesionesBilateral ?> de <?= $totalSesiones2 ?> <br>
                                                    <a href="TCB_Historia_Tratamiento?clienteId=<?= $rowClientes['cliente_id'] ?>&tipo=2&idHistoriaSesion=<?= $idHistoria2 ?>&tipoHistoria=1" target="_blank" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Sesión</a><br>
                                                <?php else : ?>
                                                    <a href="TCB_Historia_Tratamiento?clienteId=<?= $rowClientes['cliente_id'] ?>&tipo=1" target="_blank" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Historia de Choque Bilateral</a><br>
                                                <?php endif; ?>
                                                <a href='TCB_Historial_Tratamiento?clienteId=<?= $rowClientes['cliente_id'] ?>' title='Ver Historial'><i class='fa fa-book fa-lg'></i> </a>
                                                <a href='agregarCitas?cI=<?= encrypt($rowClientes['cliente_id']) ?>' title='Agregar Cita'><i class='fa fa-calendar fa-lg'></i> </a>
                                                <a href='nuevoPaciente?cI=<?= encrypt($rowClientes['cliente_id']) ?>' title='Editar Cliente'><i class='fa fa-pencil fa-lg'></i> </a>
                                                <a href='anexosPaciente?cI=<?= encrypt($rowClientes['cliente_id']) ?>' title='Anexar Archivos'><i class='fa fa-folder-open fa-lg'></i> </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                }
                                    ?>
                                </tbody>
                            </table>
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
?>