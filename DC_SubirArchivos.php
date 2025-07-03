<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "DC_Archivos";

$clienteId = $_GET['clienteId'];

#Inicio
if (isset($_POST['Guardar_Informacion_Pagina'])) {

    $NombreCarpeta = $_POST["Arreglo"]["Carpeta"];
    $NombreCarpeta = str_replace(" ", "_", $NombreCarpeta);
    $cliente_id = $_POST['cliente_id'];
    $queryList = mysqli_query($conn3, "SELECT * FROM  cliente WHERE cliente_id = '{$cliente_id}'");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Documento = $rowMotorizado["CODI_CLIENTE"];
    }

    $pathDocumento = "ArchivosDicom/$cliente_id";

    if (!file_exists($pathDocumento)) {
        mkdir($pathDocumento, 0777, true);
        $Msg = "Se Creo la Carpeta del Paciente.";
    }

    $Fecha = date('m-d-Y-H_i_s', time());

    $NombreCarpeta = $NombreCarpeta . "__" . $Fecha;
    $path = "{$pathDocumento}/$NombreCarpeta";

    if (!file_exists($path)) {
        mkdir($path, 0777, true);
        $Msg .= " Se Creo la Carpeta de los Archivos.";
    }

    echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&msg={$Msg}'</script>";
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
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Registro Dicom </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Registro Dicom</h4>
                <div class="box">
                    <div class="box-body">

                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group col-md-12">
                                <label>Nombre de la Carpeta</label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Carpeta]" placeholder="Nombre de la Carpeta" value="" pattern="[^'\x22_]+" maxlength="60" oninput="if(!this.checkValidity()){ this.value = this.value.slice(0, -1);}if(this.value.length > this.maxLength){this.value = this.value.slice(0, this.maxLength);}" required>
                            </div>

                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">
                            <input type="hidden" name="cliente_id" value="<?php echo $clienteId; ?>">

                            <?php if (isset($_GET["clienteId"]) and $_GET["clienteId"] != 0 and $_GET["clienteId"] != "") : ?>
                                <div class="col-sm-12">
                                    <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php endif; ?>

                        </form>


                        <div class="col-xs-12">
                            <div class="box">
                                <?php
                                function RecorrerCarpetas($Ruta)
                                {
                                    $ArregloLimpio = [];
                                    $a = scandir($Ruta);
                                    foreach ($a as $key => $value) {
                                        if (is_dir($Ruta . $value) and $value != ".." and $value != "." and $value != ".ftpquota") {
                                            $ArregloLimpio[$value] = RecorrerCarpetas($Ruta . $value . "/");
                                        } elseif ($value != ".." and $value != "." and $value != ".ftpquota") {
                                            $ArregloLimpio[] = $value;
                                        }
                                    }

                                    return $ArregloLimpio;
                                }
                                //$PrinRreglo = RecorrerCarpetas("ArchivosDicom/");

                                //print("<pre>" . print_r($PrinRreglo, true) . "</pre>");

                                /*
                                    $a = scandir("ArchivosDicom/");
                                    print_r($a);
                                    $ArregloLimpio=[];
                                    foreach ($a as $key => $value) {
                                        if (is_dir("ArchivosDicom/". $value) AND $value!=".." AND $value!=".") {
                                        $ArregloLimpio[]=$value;
                                        }
                                    }
                                    print_r($ArregloLimpio);
                                    */

                                ?>
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <h2 style="text-align: center;font-weight: bold;"> Registros Dicom </h2>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nombre de la Carpeta</th>
                                                    <th scope="col">Exámenes</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $queryList = mysqli_query($conn3, "SELECT * FROM  cliente WHERE cliente_id = '{$clienteId}'");
                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    $Documento = $rowMotorizado["CODI_CLIENTE"];
                                                    $Nombre_P= $rowMotorizado["nombre_cliente"];
                                                }
                                               

                                                /*
                                                function showFiles($path)
                                                {
                                                    $devuelto = array();
                                                    $arreglo = array();
                                                    $dir = opendir($path);
                                                    $files = array();
                                                    while ($current = readdir($dir)) {
                                                        if ($current != "." && $current != "..") {
                                                            if (is_dir($path . $current)) {
                                                                $devuelto[] = showFiles($path . $current . '/');
                                                            } else {
                                                                $files[] = $current;
                                                            }
                                                        }
                                                    }

                                                    for ($i = 0; $i < count($files); $i++) {
                                                        $arreglo[$path][] = $files[$i];
                                                    }

                                                    $resultado = array_merge($arreglo, $devuelto);
                                                    return ($resultado);
                                                }
                                                */


                                                //$Ruta = "ArchivosDicom/{$Documento}/";
                                                $Ruta = "ArchivosDicom/{$clienteId}/";
                                                $Datos = RecorrerCarpetas($Ruta);

                                                //echo json_encode($Datos);
                                                //echo $Datos.$Documento;

                                                foreach ($Datos as $key => $value) {
                                                    $contador++;
                                                    $contador_unico = "";
                                                    $Archivos = "";
                                                    $ArchivosURL = "";
                                                    echo "<tr ><th scope='row' width='2%'>{$contador}</th>
                                                        <td width='20%' align='center'>{$key}</td>";
                                                    foreach ($value as $key1 => $value1) {
                                                        $contador_unico++;
                                                        if ($value1 != "state_dicom.json") {
                                                            $Archivos .= $value1 . "<br>";
                                                            $ArchivosURL .= "file=" . $value1 . "&";
                                                        }

                                                        if($contador_unico=="1"){
                                                            $ImagenSola = $value1;
                                                        }
                                                    }
                                                    $Archivos = trim($Archivos, '<br>');
                                                    $ArchivosURL = trim($ArchivosURL, '&');
                                                    
                                                    $DocumentoEncriptado = encrypt($Documento);


                                                    if($contador_unico=="1"){
                                                        $rutaArchivos = urlencode("{$Base}{$Ruta}{$key}/{$ImagenSola}");
                                                    }else{
                                                        $rutaArchivos = urlencode("{$Base}{$Ruta}{$key}/?{$ArchivosURL}");
                                                    }
                                                    
                                                    $ruta = "{$Base}plugins/DicomVista/index?input={$rutaArchivos}&dwvReplaceMode=void&Numero={$Documento}&Nombre={$key}&ci={$clienteId}&Nombre_P={$Nombre_P}";
                                                    $ruta1 = "{$Base}plugins/DicomVista_Paciente/index?input={$rutaArchivos}&dwvReplaceMode=void&Numero={$DocumentoEncriptado}&Nombre={$key}&ci={$clienteId}";
                                                    $RutaCargaImagen = "{$Base}{$Ruta}{$key}";
                                                    echo "
                                                        <td width='20%' align='center' style='max-height: 445px;width: 96%;height: auto;'>{$Archivos}</td>";

                                                    echo "<td width='20%' align='center'> <a href='{$ruta}' class='btn btn-block btn-outline-success btn-lg rounded-pill shadow' style=''><i class='fa fa-pencil' title='Ver Archivo'> Ver Archivo Dicom</i></a> <br><br>
                                                        <a onclick=\"Ruta('$ruta1','$clienteId')\" class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style=''><i class='fa fa-send' title='Enviar Archivo'> Enviar Archivo </i></a><br><br>
                                                        <a type='button' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' data-toggle='modal' data-target='#exampleModal' onclick=\"AgregarInfoUpload('$key','$clienteId')\" style='><i class='fa fa-plus' title='Agregar Archivos Dicom'> Agregar Archivos Dicom </i></a><br><br>
                                                        <a type='button' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' data-toggle='modal' data-target='#exampleModal1' style=''><i class='fa fa-plus' title='Ver Informe'></i> Ver Informe</a>
                                                        
                                                        </td>";

                                                    echo "</tr>";
                                                }

                                                /*
                                                $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} WHERE cliente_id = '{$clienteId}' GROUP BY Carpeta ORDER By id ASC ");
                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    $contador++;
                                                    $Archivos = "";
                                                    $ArchivosURL = "";
                                                    $Carpeta = $rowMotorizado["Carpeta"];

                                                    if ($Carpeta != "Creacion Carpeta") {
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
                                                }
                                                */


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


    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $queryList = mysqli_query($conn3, "SELECT * FROM DC_Informes WHERE cliente_id = '{$clienteId}'");
                    mysqli_set_charset($conn3, 'utf8');
                    //    echo  "SELECT * FROM DC_Informes WHERE cliente_id = '{$clienteId}'";
                    // echo "SELECT * FROM DC_Informes WHERE Numero = $Documento";
                    $nrowl = mysqli_num_rows($queryList);
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                        $id = $rowMotorizado['id'];
                        $cliente_id = $rowMotorizado['cliente_id'];
                        $usuario_id = $rowMotorizado['usuario_id'];
                        $Fecha_Registro = $rowMotorizado['Fecha_Registro'];
                        $Carpeta = $rowMotorizado['Carpeta'];
                        $Numero = $rowMotorizado['Numero'];
                        $Informe = $rowMotorizado['Informe'];
                    ?>
                        <!-- <p>Cliente ID: <?php echo $cliente_id; ?></p>
                        <p>Usuario ID: <?php echo $usuario_id; ?></p> -->
                        <p>ID: <?php echo $id; ?></p>
                        <p>Fecha de Registro: <?php echo $Fecha_Registro; ?></p>
                        <p>Carpeta: <?php echo $Carpeta; ?></p>
                        <p>Número: <?php echo $Numero; ?></p>
                        <p>Informe: <?php echo utf8_encode($Informe); ?></p>

                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>


<?php
include 'footer.php';
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Archivos</h5>
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
                <div class="qq-upload-button-selector qq-upload-button btn-roundmedical">
                    <div>Select files</div>
                </div>
                <button type="button" id="trigger-upload" class="btn btn-primary btn-roundmedical">
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

                    .btn-roundmedical{
                        border-radius: 25px;
                    }
                </style>

                <title>Fine Uploader Manual Upload Trigger Demo</title>
                </head>

                <body>
                    <!-- Fine Uploader DOM Element
    ====================================================================== -->
                    <div id="fine-uploader-manual-trigger">
                        <!--<input type="hidden" id="Carpeta_Dicom"  value="">-->
                    </div>
                    <!-- Your code to create an instance of Fine Uploader and bind to the DOM/template
    ====================================================================== -->
                    <script>
                        var defaultParams = {}

                        function AgregarInfoUpload(valor, valor1) {
                            //Ruta123 = document.getElementById("Ruta_Dicom").value = valor;
                            defaultParams = {
                                Carpeta: valor,
                                Cliente_id: valor1
                            }
                        }

                        //var Ruta = document.getElementById("Ruta_Dicom").value;



                        $('#fine-uploader-manual-trigger').fineUploader({

                            debug: true,
                            template: 'qq-template-manual-trigger',
                            request: {
                                endpoint: 'upload.php',
                            },
                            callbacks: {
                                onSubmit: function(id, fileName) {
                                    // Extend the default parameters for all files
                                    // with the parameters for _this_ file.
                                    // qq.extend is part of a myriad of Fine Uploader
                                    // utility functions and cross-browser shims
                                    // found in client/js/util.js in the source.
                                    var newParams = {
                                            newPar: 321
                                        },
                                        finalParams = defaultParams;

                                    qq.extend(finalParams, newParams);
                                    this.setParams(finalParams);
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
                <button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" data-dismiss="modal" onclick="window.location.reload();">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- /.content-wrapper -->


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

<style>
    tbody>tr>td:nth-child(3) {
        overflow-y: scroll;
        height: 200px;
        display: block;
        width: 100%;
    }
</style>