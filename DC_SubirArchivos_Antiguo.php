<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "DC_Archivos";

$clienteId = $_GET['clienteId'];

#Inicio
if (isset($_POST['Guardar_Informacion_Pagina'])) {

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
        `cliente_id` int(11) NOT NULL,
        `Fecha_Registro` date DEFAULT current_timestamp(),
        {$Campos},
        `Archivos` text DEFAULT '',
        `Nombre_Original` text DEFAULT '',
        `Creacion_Dinamica` text DEFAULT '',
        `Activo` varchar(5) DEFAULT '1'
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
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
                echo "<script language='Javascript'> alert('Tabla No fue creada Dinamicamente');</script>";
                // si bota este mensaje es por que la tabla no esta creado el campo *Creacion_Dinamica* sirve para que no se use este modulo en tablas ya preexistentes
            }
        }
    }

    $Carpeta = $_POST['Arreglo']['Carpeta'];

    $usuario_id = $_POST['usuario_id'];
    $cliente_id = $_POST['cliente_id'];

    $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} WHERE Carpeta = '{$Carpeta}' AND cliente_id = '{$cliente_id}' ");
    $NrowArchivos = mysqli_num_rows($queryList);


    if ($NrowArchivos == "0") {
        $CantidadArchivos_Error = 0;
        $CantidadArchivos_Ok = 0;
        //echo "entro0";
        foreach ($_FILES['Archivos']["tmp_name"] as $key => $tmp_name) {
            $contador++;
            /*
            //Validamos que el archivo exista
            if ($_FILES['Archivos']["name"][$key] and $_FILES['Archivos']['type'][$key] == "application/octet-stream") {

                $filename = $_FILES['Archivos']["name"][$key];
                $nombre_asignado = $contador . '.dcm'; //Obtenemos el nombre original del archivo
                $source = $_FILES['Archivos']["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo

                $directorio = 'ArchivosDicom/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
                //Validamos si la ruta de destino existe, en caso de no existir la creamos
                if (!file_exists($directorio)) {
                    mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
                }

                $directorio1 = $directorio . "{$cliente_id}/"; //Declaramos un  variable con la ruta donde guardaremos los archivos
                //Validamos si la ruta de destino existe, en caso de no existir la creamos
                if (!file_exists($directorio1)) {
                    mkdir($directorio1, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
                }


                $directorio2 = $directorio1 . "{$Carpeta}/"; //Declaramos un  variable con la ruta donde guardaremos los archivos
                //Validamos si la ruta de destino existe, en caso de no existir la creamos
                if (!file_exists($directorio2)) {
                    mkdir($directorio2, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
                }

                $dir = opendir($directorio2); //Abrimos el directorio de destino
                $target_path = $directorio2 . '/' . $nombre_asignado; //Indicamos la ruta de destino, así como el nombre del archivo

                //Movemos y validamos que el archivo se haya cargado correctamente
                //El primer campo es el origen y el segundo el destino
                if (move_uploaded_file($source, $target_path)) {
                    echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                } else {
                    echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
                }
                closedir($dir); //Cerramos el directorio de destino

                $type = $_FILES['Archivos']['type'][$key];

                $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (cliente_id,usuario_id,Carpeta,Archivos,Nombre_Original) VALUES   ('$cliente_id', '$usuario_id','$Carpeta','$nombre_asignado','$filename')");

                if ($queryList != true) {
                    $CantidadArchivos_Error++;
                } else {
                    $CantidadArchivos_Ok++;
                }
            } else {
                $CantidadArchivos_Error++;
            }
            */
        }
    } else {

        echo "<script language='Javascript'> window.location='{$ruta}?error=Error, Cambiar el nombre de la carpeta'</script>";
    }

    if ($CantidadArchivos_Ok <> 0) {
        $Msg = "Se Subieron $CantidadArchivos_Ok Archivos Correctamente";
    }
    if ($CantidadArchivos_Error <> 0) {
        $Msg .= ", No Se Subieron $CantidadArchivos_Error Archivos";
    }
    $Msg = trim($Msg, ',');

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    //echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&msg={$Msg}'</script>";

    echo $contador;
}

///////////////////////////////////////////////////////////////////////////

#Cierre
if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
?>

<!-- Se Cambia de Paquetes a Categoria -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Registro de Categorias </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="content">
                <h4 class="Titulo_Pagina">Registro de Categorias</h4>
                <div class="box">
                    <div class="box-body">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Launch demo modal
                        </button>

                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group col-md-12">
                                <label>Nombre de la Carpeta</label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Carpeta]" placeholder="Nombre de la Categoria" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                            </div>

                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">
                            <input type="hidden" name="cliente_id" value="<?php echo $clienteId; ?>">

                            <?php if (isset($_GET["clienteId"]) and $_GET["clienteId"] != 0 and $_GET["clienteId"] != "") : ?>
                                <div class="col-sm-12">
                                    <center><button type="submit" class="btn btn-block btn-primary btn-sm" name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php endif; ?>

                        </form>


                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <h2 style="text-align: center;font-weight: bold;"> Categorias </h2>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nombre de la Carpeta</th>
                                                    <th scope="col">Examenes</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} WHERE cliente_id = '{$clienteId}' GROUP BY Carpeta ORDER By id ASC ");
                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    $contador++;
                                                    $Archivos = "";
                                                    $ArchivosURL = "";
                                                    $Carpeta = $rowMotorizado["Carpeta"];
                                                    $queryList1 = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} WHERE cliente_id = '{$clienteId}' AND Carpeta = '{$Carpeta}' ORDER By id ASC ");
                                                    while ($RowArchivos = mysqli_fetch_array($queryList1)) {
                                                        $id = $RowArchivos['id'];
                                                        $Archivos .= $RowArchivos['Archivos'] . "<br>";
                                                        $ArchivosURL .= "file=" . $RowArchivos['Archivos'] . "&";
                                                    }
                                                    $Archivos = trim($Archivos, '<br>');
                                                    $ArchivosURL = trim($ArchivosURL, '&');

                                                    $rutaArchivos = urlencode("{$Base}ArchivosDicom/{$clienteId}/{$Carpeta}/?{$ArchivosURL}");
                                                    $ruta = "{$Base}plugins/DicomVista/index.php?input={$rutaArchivos}&dwvReplaceMode=void&Numero={$clienteId}&Paciente={$Carpeta}";
                                                    $ruta1 = "{$Base}plugins/DicomVista_Paciente/index.php?input={$rutaArchivos}&dwvReplaceMode=void";

                                                    echo "<tr width='2%'><th scope='row'>{$contador}</th>
                                                    <td width='20%' align='center'>{$Carpeta}</td>
                                                    <td width='20%' align='center'>{$Archivos}</td>";

                                                    echo "<td width='20%' align='center'> <a href='{$ruta}' class='btn btn-primary' style='width: 200px;background-color:#04CC05'><i class='fa fa-pencil' title='Ver Archivo'> Ver Archivo Dicom</i></a> <br><br>
                                                    <a onclick=\"Ruta('$ruta1','$clienteId')\" class='btn btn-primary' style='width: 200px;background-color:#3c8dbc'><i class='fa fa-send' title='Enviar Archivo'> Enviar Archivo </i></a><br>
                                                        </td></tr>";
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

                <!-- Fine Uploader New/Modern CSS file
    ====================================================================== -->
                <link href="plugins/FineUploader/fine-uploader-new.css" rel="stylesheet">

                <!-- Fine Uploader jQuery JS file
    ====================================================================== -->
                <script src="plugins/FineUploader/jquery.fine-uploader.js"></script>

                <!-- Fine Uploader Thumbnails template w/ customization
    ====================================================================== -->
                <script type="text/template" id="qq-template-manual-trigger">
                    <div class="qq-uploader-selector qq-uploader" qq-drop-area-text="Drop files here">
            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
            </div>
            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                <span class="qq-upload-drop-area-text-selector"></span>
            </div>
            <div class="buttons">
                <div class="qq-upload-button-selector qq-upload-button">
                    <div>Select files</div>
                </div>
                <button type="button" id="trigger-upload" class="btn btn-primary">
                    <i class="icon-upload icon-white"></i> Upload
                </button>
            </div>
            <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Processing dropped files...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
            <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
                <li>
                    <div class="qq-progress-bar-container-selector">
                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                    </div>
                    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                    <img class="qq-thumbnail-selector" qq-max-size="100" qq-server-scale>
                    <span class="qq-upload-file-selector qq-upload-file"></span>
                    <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                    <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                    <span class="qq-upload-size-selector qq-upload-size"></span>
                    <button type="button" class="qq-btn qq-upload-cancel-selector qq-upload-cancel">Cancel</button>
                    <button type="button" class="qq-btn qq-upload-retry-selector qq-upload-retry">Retry</button>
                    <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">Delete</button>
                    <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                </li>
            </ul>

            <dialog class="qq-alert-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Close</button>
                </div>
            </dialog>

            <dialog class="qq-confirm-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">No</button>
                    <button type="button" class="qq-ok-button-selector">Yes</button>
                </div>
            </dialog>

            <dialog class="qq-prompt-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <input type="text">
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Cancel</button>
                    <button type="button" class="qq-ok-button-selector">Ok</button>
                </div>
            </dialog>
        </div>
    </script>

                <style>
                    #trigger-upload {
                        color: white;
                        background-color: #00ABC7;
                        font-size: 14px;
                        padding: 7px 20px;
                        background-image: none;
                        position: fixed;
                    }

                    #fine-uploader-manual-trigger .qq-upload-button {
                        margin-right: 15px;
                    }

                    #fine-uploader-manual-trigger .buttons {
                        width: 36%;
                    }

                    #fine-uploader-manual-trigger .qq-uploader .qq-total-progress-bar-container {
                        width: 60%;
                    }
                </style>

                <title>Fine Uploader Manual Upload Trigger Demo</title>
                </head>

                <body>
                    <!-- Fine Uploader DOM Element
    ====================================================================== -->
                    <div id="fine-uploader-manual-trigger"></div>

                    <!-- Your code to create an instance of Fine Uploader and bind to the DOM/template
    ====================================================================== -->
                    <script>
                        $('#fine-uploader-manual-trigger').fineUploader({
                            debug: true,
                            template: 'qq-template-manual-trigger',
                            request: {
                                endpoint: 'upload.php',
                                params: {
                                    cliente_id: "pruebs",
                                    Carpeta: ""
                                }
                            },
                            thumbnails: {
                                placeholders: {
                                    waitingPath: 'plugins/FineUploader/placeholders/waiting-generic.png',
                                    notAvailablePath: 'plugins/FineUploader/placeholders/not_available-generic.png'
                                }
                            },
                            autoUpload: false
                        });

                        $('#trigger-upload').click(function() {
                            $('#fine-uploader-manual-trigger').fineUploader('uploadStoredFiles');
                        });
                    </script>
                </body>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>

<script>
    function Ruta(link, cliente_id) {

        $.ajax({
            url: "DC_Ajax.php",
            method: "POST",
            data: {
                cliente_id: cliente_id,
                link: link
            },
            success: function(data) {
                alert("Se Envio el mensaje");
            }
        })

    }
</script>