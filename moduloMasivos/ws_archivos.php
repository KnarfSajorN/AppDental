<?php
session_start();
if (isset($_POST['key'])) {
    include "../funciones/funciones.php";

    if ($_POST['key'] == "registrarArchivos") {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        foreach ($_FILES["archivo"]['tmp_name'] as $key => $tmp_name) {
            //Validamos que el archivo exista
            if ($_FILES["archivo"]["name"][$key]) {
                $alias = substr(str_shuffle($permitted_chars), 0, 6);
                $filename = rand(0, 100) . "_" . str_replace(" ", "_", $_FILES["archivo"]["name"][$key]); //Obtenemos el nombre original del archivo
                $a = 0;
                do {
                    $resultExiste = mysqli_query($conn3, "SELECT * FROM ws_archivos WHERE url = '$filename'");
                    if (mysqli_num_rows($resultExiste) > 0) {
                        $filename = rand(0, 100) . "_" . str_replace(" ", "_", $_FILES["archivo"]["name"][$key]);
                    } else {
                        $resultExiste = mysqli_query($conn3, "SELECT * FROM ws_archivos WHERE alias = '$alias'");
                        if (mysqli_num_rows($resultExiste) > 0) {
                            $alias = substr(str_shuffle($permitted_chars), 0, 6);
                        } else {
                            $a++;
                        }
                    }
                } while ($a < 1);
                $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
                $directorio = 'ws_archivos/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
                if (!file_exists($directorio)) {
                    mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
                }
                $dir = opendir($directorio); //Abrimos el directorio de destino
                $target_path = $directorio . '/' . $filename; //Indicamos la ruta de destino, así como el nombre del archivo
                //Movemos y validamos que el archivo se haya cargado correctamente
                //El primer campo es el origen y el segundo el destino
                if (move_uploaded_file($source, $target_path)) {
                    // echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                } else {
                    // echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
                }

                // echo $prepare = preparePost([
                //     "usuario_id" => $_POST['usuario_id'],
                //     "descripcion" => $_POST['descripcion'],
                //     "alias" => $alias,
                //     "url" => $filename,
                // ]);

                mysqli_query($conn3, "INSERT INTO ws_archivos SET
                `usuario_id` = '{$_POST['usuario_id']}',
                `descripcion` = '{$_POST['descripcion']}',
                `alias` = '$alias',
                `url` = '$filename',
                `ID_principal` = '{$_SESSION['ID_principal']}'
                ") or die(mysqli_error($conn3));
                closedir($dir); //Cerramos el directorio de destino
            }
        }
        header("Location: masivoArchivos");
        exit();
    }
    header("Location: masivoArchivos");
    exit();
}
include '../header.php';
include '../menu.php';
?>

<!-- Upload archivos -->
<link href="upload/css/uploadfile.css" rel="stylesheet">
<script src="upload/js/jquery.min.js"></script>
<script src="upload/js/jquery.uploadfile.min.js"></script>
<!-- Fin upload archivos -->
<!-- Upload fotos -->
<link type="text/css" rel="stylesheet" href="upload/css/jquery-ui.min.css" media="screen" />
<link type="text/css" rel="stylesheet" href="upload/plupload/js/jquery.ui.plupload/css/jquery.ui.plupload.css" media="screen" />
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Archivos Publicitarios
        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
            <li><a href="#">Archivos Publicitarios</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <div class="box">
                    <div class="center text-center">

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
                    <!-- /.box-header -->
                    <div class="box-body">
                        <link type="text/css" rel="stylesheet" href="css/tabs.css" />
                        <div class="page" style="background-color: aliceblue;padding: 20px;">
                            <div class="col-md-12">
                                <form action="<?= 'masivoArchivos' ?>" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
                                    <input type="hidden" id="usuario_id" name="usuario_id" value="<?= $_SESSION['ID'] ?>">
                                    <input type="hidden" id="key" name="key" value="registrarArchivos">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="descripcion">Descripción</label>
                                                <input type="text" class="form-control input-lg" id="descripcion" name="descripcion" placeholder="Descripción del Archivo" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="archivo">Cargar Archivo</label>
                                                <input type="file" class="form-control input-lg" id="archivo" name="archivo[]" accept="audio/mp3,video/mp4,image/jpeg,image/png,application/pdf,application/msword">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="submit" class="btn btn-block btn-outline-success rounded-pill" value="Guardar">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="pcss3t pcss3t-effect-scale pcss3t-theme-1">
                                <input type="radio" name="pcss3t" checked id="tab1" class="tab-content-first">
                                <label for="tab1"><i class="icon-bolt"></i>Archivos</label>
                                <ul>
                                    <li class="tab-content tab-content-first typography">
                                        <h1 class="txt_rsp">Registro de Archivos</h1>
                                        <table class="table w-100">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nombre Archivo</th>
                                                    <th scope="col">Descripción</th>
                                                    <th scope="col">Fecha</th>
                                                    <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-download" aria-hidden="true"></i></th>
                                                    <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-picture-o" aria-hidden="true"></i></th>
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
                                                            <?php echo $contador ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $resulImg['url']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $resulImg['descripcion']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $resulImg['created_at']; ?>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <a target="blank" href="<?php echo $Base; ?>moduloMasivos/ws_archivos/<?php echo $resulImg['url']; ?>">
                                                                <a href="<?php echo $Base; ?>moduloMasivos/ws_archivos/<?php echo $resulImg['url']; ?>" download="<?php echo $resulImg['url']; ?>">Descargar Archivo
                                                                </a>
                                                            </a>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <a target="_blank" href="<?php echo $Base; ?>moduloMasivos/ws_archivos/<?php echo $resulImg['url']; ?>">
                                                                <a target="_blank" href="<?php echo $Base; ?>moduloMasivos/ws_archivos/<?php echo $resulImg['url']; ?>">Ver Archivo <br>
                                                                </a>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </li>
                                </ul>
                            </div>
                            <!--/ tabs -->
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





<?php include("../footer.php") ?>
<script type="text/javascript" src="upload/js/jquery-ui.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="upload/plupload/js/plupload.full.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="upload/plupload/js/jquery.ui.plupload/jquery.ui.plupload.min.js" charset="UTF-8"></script>