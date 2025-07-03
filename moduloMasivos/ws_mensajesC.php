
<?php
// verificar tablas creadas
include './ws_createTables.php';
include '../header.php';

include '../menu.php';
include 'loading.php';
$ID = $_SESSION['ID'];



// recibimos post 
// accion 1 = Registro
// accion 2 = update
if ($_POST) {
    switch ($_POST['accion']) {
        case 1:
            // Registro
            $nombre = $_POST['nombre'];
            $asunto = $_POST['asunto'];
            $banner = $_POST['banner'];
            $mensaje = $_POST['mensaje'];            
            $filtro = $_POST['filtro'];
            $filtroAZ = $_POST['filtroAZ'];
            $ID_principal = $_POST['ID_principal'];
            foreach ($filtroAZ as $filtroAZ) {
                $filtroAZ_ .= $filtroAZ . "||";
            }
            foreach ($filtro as $filtro) {
                $filtro_ .= $filtro . "||";
            }
            $filtro_ = substr($filtro_, 0, -2);
            $query  = "INSERT into ws_mensajesC set usuarioId = $ID, titulo = '$nombre', mensaje = '$mensaje', filtro = '$filtro_', filtroAZ = '$filtroAZ_', asunto = '$asunto', banner = '$banner', ID_principal = '$ID_principal'";
            mysqli_query($conn3, $query);

            $lasId = mysqli_insert_id($conn3);

            foreach ($_POST['filtroPre'] as $key => $value) {
                // verificar si la columna filtroPre_$key existe sino se crea
                mysqli_query($conn3, "ALTER TABLE ws_mensajesC ADD COLUMN filtroPre_$key text null default null");
                mysqli_query($conn3, "UPDATE ws_mensajesC set filtroPre_$key = '1' where id = $lasId");

                // ahora los filtroR 
                $contact = "";
                foreach ($_POST['filtroR'][$key] as $keyR => $valueR) {
                    $contact .= $valueR . "||";
                }
                $contact = substr($contact, 0, -2);
                mysqli_query($conn3, "ALTER TABLE ws_mensajesC ADD COLUMN filtroR_$key text null default null");
                mysqli_query($conn3, "UPDATE ws_mensajesC set filtroR_$key = '$contact' where id = $lasId");
            }

            echo '<script>window.location.href="./masivoMensajesC"</script>';
            break;
        case 2:
            // update
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $mensaje = $_POST['mensaje'];
            $filtroAZ = $_POST['filtroAZ'];
            foreach ($filtroAZ as $filtroAZ) {
                $filtroAZ_ .= $filtroAZ . "||";
            }
            $filtro = $_POST['filtro'];
            foreach ($filtro as $filtro) {
                $filtro_ .= $filtro . "||";
            }
            $filtro_ = substr($filtro_, 0, -2);
            $query  = "UPDATE ws_mensajesC set titulo = '$nombre', mensaje = '$mensaje', filtro = '$filtro_', filtroAZ = '$filtroAZ_' where id = $id";
            mysqli_query($conn3, $query);

            $lasId = $id;

            foreach ($_POST['filtroPre'] as $key => $value) {
                // verificar si la columna filtroPre_$key existe sino se crea
                mysqli_query($conn3, "ALTER TABLE ws_mensajesC ADD COLUMN filtroPre_$key text null default null");
                mysqli_query($conn3, "UPDATE ws_mensajesC set filtroPre_$key = '1' where id = $lasId");

                // ahora los filtroR 
                $contact = "";
                foreach ($_POST['filtroR'][$key] as $keyR => $valueR) {
                    $contact .= $valueR . "||";
                }
                $contact = substr($contact, 0, -2);
                mysqli_query($conn3, "ALTER TABLE ws_mensajesC ADD COLUMN filtroR_$key text null default null");
                mysqli_query($conn3, "UPDATE ws_mensajesC set filtroR_$key = '$contact' where id = $lasId");
            }
            echo '<script>window.location.href="./masivoMensajesC"</script>';
            break;
    }
}

?>
<!-- <script type="text/javascript">
    window.addEventListener('load', () => {
        alert("ATENCION: Actualmente nos encontramos validando su problema, por favor no usar el modulo. Gracias por su comprencion, y le pedimos disculpas por las molestias ocacionadas. Tenga excelente dia.");
    });
</script> -->

<!-- emojis -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.css">
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
        <div class="copyPaste"></div>
        <div class="">
            <div class="col-xs-12">
                <h4 class="Titulo_Pagina">
                    Lista de mensajes masivos - Correo Electrónico
                </h4>
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                    <div class="center text-center">
                            <a href="./masivoMensajesW" type="button" class="btn btn-outline-info rounded-pill">
                                <i class="fas fa-plus"></i>
                                Editar filtros personalizados
                            </a>
                        </div>
                        <hr>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-info rounded-pill" data-toggle="modal" data-target="#nuevoContacto">
                            <i class="fa fa-plus"></i> Nuevo mensaje
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="nuevoContacto" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="overflow: auto;">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h5 class="modal-title">nuevo mensaje</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= 'masivoMensajesC' ?>" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body row" style="margin:0;">
                                            <div class="col-md-12">
                                                <label for="">Titulo</label>
                                                <input type="text" class="form-control input-lg" name="nombre" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Asunto</label>
                                                <input type="text" class="form-control input-lg" name="asunto" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Filtro [A-Z]</label>
                                                <select name="filtroAZ[]" id="filtroAZ" class="form-control input-lg select2" style="width:100%;" multiple>
                                                    <option value="a|b|c|d|e|f|g|h|i">De la A a la I Grupo 1</option>
                                                    <option value="j|k|l|m">De la J a la M Grupo 2</option>
                                                    <option value="n|ñ|o|p|q|r|s|t|u|v|w|x|y|z">De la N a Z Grupo 3</option>
                                                </select>
                                            </div>
                                            <script>
                                                $("#filtroAZ").select2({                                                    
                                                })
                                            </script>

                                            <!-- filtros predefinidos -->
                                            <?php include './filtrosPredefinidos.php'; ?>
                                            <!-- filtros predefinidos - fin -->

                                            <div class="col-md-12">
                                                <label for="">Filtros personalizados</label>
                                                <select name="filtro[]" id="filtro" class="form-control input-lg select2" style="width:100%;" multiple >
                                                    <?php
                                                    $query2 = "SELECT * from ws_filtro where activo = 1 and ID_principal = '{$_SESSION['ID_principal']}' ";
                                                    $result2 = mysqli_query($conn3, $query2);
                                                    while ($row2 = mysqli_fetch_array($result2)) {
                                                        echo '<option value="' . $row2['filtro'] . '">' . $row2['filtro'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Banner publicitario (imagen principal)</label>
                                                <select name="banner" id="banner" class="form-control input-lg" style="width:100%;" required>
                                                <option value="0" selected>Sin Banner</option>
                                                    <?php
                                                    $query2 = "SELECT * FROM ws_archivos where ID_principal = '{$_SESSION['ID_principal']}' ";
                                                    $result2 = mysqli_query($conn3, $query2);
                                                    while ($row2 = mysqli_fetch_array($result2)) {
                                                        echo '<option value="' . $row2['url'] . '">' . $row2['descripcion'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Mensaje</label>
                                                <textarea class="editorJR" id="mensaje" rows="3" name="mensaje"></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                                <label >Registro de Archivos</label>

                                                <table id="example2" class="table table-bordered table-striped" style="width: 100%">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Nombre</th>
                                                            <th scope="col">URL</th>
                                                            <th scope="col">Copiar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $queryImg = mysqli_query($conn3, "SELECT * FROM ws_archivos where ID_principal = '{$_SESSION['ID_principal']}' ");
                                                        $nrowlER = mysqli_num_rows($queryImg);
                                                        while ($resulImg = mysqli_fetch_array($queryImg)) {
                                                            $contador++;
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $contador ?>
                                                                </td>
                                                                <td>
                                                                    <?= $resulImg['descripcion']; ?>
                                                                </td>
                                                                <td>
                                                                    <?= $resulImg['url']; ?>
                                                                </td>

                                                                <td style="text-align: center;">
                                                                    <button type="button" onclick="CopyPaste('<?= rawurlencode($resulImg['url']) ?>', this)" class="btn btn-outline-danger rounded-pill btn-disabled text-bold">Copiar <i class="fa fa-file" data-icon="gridicons:print"></i></button>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="accion" value="1">
                                            <input type="hidden" name="ID_principal" value="<?=$_SESSION['ID_principal'] ?>">
                                            <button type="button" class="btn btn-outline-secondary rounded-pill" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-outline-info rounded-pill">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>


                        <div class="box-body">

                            <table id="example1" class="table table-bordered table-striped" style="font-size:18px">
                                <thead>
                                    <tr>
                                        <th>Titulo</th>
                                        <th>Mensaje</th>
                                        <th>Filtro</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * from ws_mensajesC where ID_principal = '{$_SESSION['ID_principal']}'  ";
                                    $result = mysqli_query($conn3, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<tr>';
                                        echo '<td>' . $row['titulo'] . '</td>';
                                        echo '<td>' . substr($row['mensaje'], 0, 0) . ' ...</td>';
                                        echo '<td>' . str_replace('||', ' | ', $row['filtro']) . '</td>';
                                        echo '<td>';
                                    ?>
                                        <button type="button" class="btn btn-outline-secondary rounded-pill" data-toggle="modal" data-target="#nuevoFiltro<?= $row['id'] ?>" title="Editar" onclick="abrirEditar<?=$row['id']?>();">
                                            <li class="fas fa-gear"></li>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="nuevoFiltro<?= $row['id'] ?>" role="dialog" aria-labelledby="modelTitleId" style="overflow: auto;" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-info">
                                                        <h5 class="modal-title">editar mensaje <?= $row['titulo'] ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= 'masivoMensajesC' ?>" method="POST" enctype="multipart/form-data" style="overflow: auto;">
                                                        <div class="modal-body row" style="margin:0;">
                                                            <div class="col-md-12">
                                                                <label for="">Titulo</label>
                                                                <input type="text" class="form-control input-lg" name="nombre" value="<?= $row['titulo'] ?>" required>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="">Asunto</label>
                                                                <input type="text" class="form-control input-lg" name="asunto" value="<?= $row['asunto'] ?>" required>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <?php $dato = explode('||', $row['filtroAZ']); ?>
                                                                <label for="">Filtro [A-Z]</label>
                                                                <select name="filtroAZ[]" id="filtroAZ" class="form-control input-lg select2" style="width:100%;" multiple>
                                                                    <option value="a|b|c|d|e|f|g|h|i" <?= (in_array("a|b|c|d|e|f|g|h|i", $dato) ? 'selected' : '') ?>>De la A a la I Grupo 1</option>
                                                                    <option value="j|k|l|m" <?= (in_array("j|k|l|m", $dato) ? 'selected' : '') ?>>De la J a la M Grupo 2</option>
                                                                    <option value="n|ñ|o|p|q|r|s|t|u|v|w|x|y|z" <?= (in_array("n|ñ|o|p|q|r|s|t|u|v|w|x|y|z", $dato) ? 'selected' : '') ?>>De la N a Z Grupo 3</option>
                                                                </select>
                                                            </div>

                                                            <!-- filtros predefinidos -->
                                                            <?php $_GET['number'] = $row['id']; ?>
                                                            <?php include './filtrosPredefinidos.php'; ?>
                                                            <!-- filtros predefinidos - fin -->


                                                            <div class="col-md-12">
                                                                <label for="">Filtros personalizados</label>
                                                                <select name="filtro[]" id="filtro" class="form-control input-lg select2" style="width:100%;" multiple >
                                                                    <?php
                                                                    $dato = explode('||', $row['filtro']);
                                                                    $query2 = "SELECT * from ws_filtro where activo = 1 and ID_principal = '{$_SESSION['ID_principal']}' ";
                                                                    $result2 = mysqli_query($conn3, $query2);
                                                                    while ($row2 = mysqli_fetch_array($result2)) {
                                                                        if (in_array($row2['filtro'], $dato)) {
                                                                            echo '<option value="' . $row2['filtro'] . '" selected>' . $row2['filtro'] . '</option>';
                                                                        } else {
                                                                            echo '<option value="' . $row2['filtro'] . '">' . $row2['filtro'] . '</option>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="">Banner publicitario (imagen principal)</label>
                                                                <select name="banner" id="banner" class="form-control input-lg" style="width:100%;" required>
                                                                    <?php
                                                                    $dato = $row['banner'];
                                                                    $query2 = "SELECT * from ws_archivos where ID_principal = '{$_SESSION['ID_principal']}'  ";
                                                                    $result2 = mysqli_query($conn3, $query2);
                                                                    while ($row2 = mysqli_fetch_array($result2)) {
                                                                        if ($row2['url'] == $dato) {
                                                                            echo '<option value="' . $row2['url'] . '" selected>' . $row2['descripcion'] . '</option>';
                                                                        } else {
                                                                            echo '<option value="' . $row2['url'] . '">' . $row2['descripcion'] . '</option>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="">Mensaje</label>
                                                                <textarea class="editorJR" rows="3" name="mensaje" required><?= $row['mensaje'] ?></textarea>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <hr>
                                                                <label >Registro de Archivos</label>
                                                                <table id="example3" class="table table-bordered table-striped" style="width: 100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">#</th>
                                                                            <th scope="col">Nombre</th>
                                                                            <th scope="col">URL</th>
                                                                            <th scope="col">Copiar</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $queryImg = mysqli_query($conn3, "SELECT * FROM ws_archivos where ID_principal = '{$_SESSION['ID_principal']}' ");
                                                                        $nrowlER = mysqli_num_rows($queryImg);
                                                                        while ($resulImg = mysqli_fetch_array($queryImg)) {
                                                                            $contador++;
                                                                        ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <?= $contador ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?= $resulImg['descripcion']; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?= $resulImg['url']; ?>
                                                                                </td>

                                                                                <td style="text-align: center;">
                                                                                    <button type="button" onclick="CopyPaste('<?= rawurlencode($resulImg['url']) ?>', this)" class="btn btn-outline-danger rounded-pill btn-disabled text-bold">Copiar <i class="fa fa-file" data-icon="gridicons:print"></i></button>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="accion" value="2">
                                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                            <button type="button" class="btn btn-outline-secondary rounded-pill" data-dismiss="modal">Cerrar</button>
                                                            <button type="submit" class="btn btn-outline-info rounded-pill">Guardar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    <?php
                                        $☺ = explode("/", ($row['activo'] == 1 ? "0/outline-success/Desactivar" : "1/outline-danger/Activar"));

                                        echo '<a href="masivoActivarFiltro?id=' .encrypt($row['id']) . '&estado=' . $☺[0] . '&tabla=ws_mensajesC" class="btn btn-' . $☺[1] . ' rounded-pill" title="' . $☺[2] . '"><i class="fas fa-power-off "></i></a>';
                                        if ($row['activo'] == 1){
                                            echo '|<a href="masivoEnviarCorreo?A=' . encrypt($row['id']) . '&send=' . encrypt("mucho texto :)") . '" target="_blank" class="btn btn-outline-success rounded-pill" title="Enviar Mensaje"><i class="fas fa-paper-plane "></i></a>';
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<script type="text/javascript">
    const CopyPaste = (alias, el) => {
        // console.log("Ella no te ama, pero sin llora");
        var $temp = $("<input style='opacity: 0; pointer-events: none;'>"); // definimos un input tipo hidden
        $(".copyPaste").append($temp); // creamos el input
        $temp.val(`https://dev.sievensoft.com/<?= trim(explode("/", $_SERVER['PHP_SELF'])[1]) ?>/moduloMasivos/ws_archivos/${alias}`).select();
        document.execCommand("copy");
        $temp.remove();
        // $(".btn-disabled").attr('disabled', false);
        // $(el).attr('disabled', true);
    };


    window.addEventListener('load', () => {
        $(".select2").select2();
    });
</script>