<?php
include '../header.php';
include '../menu.php';
include 'loading.php';
// include './ws_createTables.php';

// recibimos post 
// accion 1 = Registro de contacto
// accion 2 = cambio de filtros
if ($_POST) {
    switch ($_POST['accion']) {
        case 1:
            // Registro de contacto
            $nombre = $_POST['nombre'];
            $ID_principal = $_POST['ID_principal'];
            $query  = "INSERT into ws_filtro set filtro = '$nombre', ID_principal = '$ID_principal'";
            // var_dump($query);
            mysqli_query($conn3, $query);
            echo '<script>window.location.href="./masivoFiltros"</script>';
            break;
        case 2:
            // cambio de filtros
            $nombre = $_POST['nombre'];
            $filtro = $_POST['filtro'];
            $query = "UPDATE ws_filtro set filtro = '$nombre' WHERE id = $filtro";
            mysqli_query($conn3, $query);
            echo '<script>window.location.href="./masivoFiltros"</script>';
            break;
    }
}

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Contactos</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <h4 class="Titulo_Pagina">
                    Lista de Filtros - WhatsApp / Correo Electrónico
                </h4>
                
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="center text-center">
                            <a href="./masivoContactos" type="button" class="btn btn-outline-info rounded-pill">
                                <i class="fas fa-address-book"></i> 
                                Ir a Contactos
                            </a>
                            <a href="./masivoMensajesW" type="button" class="btn btn-outline-info rounded-pill">
                                <i class="fas fa-address-book"></i> 
                                Ir a Mensajes [WhatsApp]
                            </a>
                            <a href="./masivoMensajesC" type="button" class="btn btn-outline-info rounded-pill">
                                <i class="fas fa-address-book"></i> 
                                Ir a Mensajes [Correo]
                            </a>
                        </div>
                        <hr>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-info rounded-pill" data-toggle="modal" data-target="#nuevoContacto">
                            <i class="fa fa-plus"></i> Nuevo filtro
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="nuevoContacto" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="overflow:hidden;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h5 class="modal-title">Nuevo filtro</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= 'masivoFiltros' ?>" method="POST">
                                        <div class="modal-body row" style="margin:0;">
                                            <div class="col-md-12">
                                                <label for="">Nombre</label>
                                                <input type="text" class="form-control input-lg" name="nombre" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="accion" value="1">
                                            <input type="hidden" name="ID_principal" value="<?= $_SESSION['ID_principal'] ?>">
                                            <button type="button" class="btn btn-outline-secondary rounded-pill" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-outline-info rounded-pill">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>


                        <div class="box-body table-responsive no-padding">

                            <table id="example1" class="table table-bordered table-striped" style="font-size:18px">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * from ws_filtro where ID_principal = '{$_SESSION['ID_principal']}' ";
                                    $result = mysqli_query($conn3, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<tr>';
                                        echo '<td>' . $row['filtro'] . '</td>';
                                        echo '<td>';
                                    ?>
                                        <button type="button" class="btn btn-outline-secondary rounded-pill" data-toggle="modal" data-target="#nuevoFiltro<?= $row['id'] ?>" title="Nuevo filtro">
                                            <li class="fas fa-gear"></li>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="nuevoFiltro<?= $row['id'] ?>" role="dialog" aria-labelledby="modelTitleId" style="overflow:hidden;" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-info">
                                                        <h5 class="modal-title">Filtros <?= $row['filtro'] ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= 'masivoFiltros' ?>" method="POST">
                                                        <div class="modal-body">
                                                            <label for="">Nombre</label>
                                                            <input type="text" class="form-control input-lg" value="<?= $row['filtro'] ?>" name="nombre" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="filtro" value="<?= $row['id'] ?>">
                                                            <input type="hidden" name="ID_principal" value="<?= $_SESSION['ID_principal'] ?>">
                                                            <input type="hidden" name="accion" value="2">
                                                            <button type="button" class="btn btn-outline-secondary rounded-pill" data-dismiss="modal">Cerrar</button>
                                                            <button type="submit" class="btn btn-outline-info rounded-pill">Actualizar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        if ($row['activo'] == 1) {
                                            echo '<a href="masivoActivarFiltro?id=' . encrypt($row['id']) . '&estado=0" class="btn btn-outline-success rounded-pill" title="Desactivar "><i class="fas fa-power-off"></i></a>';
                                        } else {
                                            echo '<a href="masivoActivarFiltro?id=' . encrypt($row['id']) . '&estado=1" class="btn btn-outline-danger rounded-pill" title="Activar "><i class="fas fa-power-off"></i></a>';
                                        }
                                        echo '</td>';
                                        echo '</tr>';
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
include '../footer.php';
?>