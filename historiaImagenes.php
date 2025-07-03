<?php
include 'header.php';
include 'menu.php'; ?>



<?php
function esArchivoImagen($archivo) {
  // Obtiene la información sobre el archivo
  $info = getimagesize($archivo);
  // Si $info no es falso, entonces es una imagen
  return $info !== false;
}

$clienteId = ($_GET['cI'] != '' ? decrypt($_GET['cI']) : $_GET['clienteId']);


$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));


$queryList = mysqli_query($conn3, "SELECT * FROM cliente where cliente_id=$clienteId and (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}')");

// $nrowl = mysqli_num_rows($queryList);

if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {


        $usuario_id = $rowMotorizado['usuario_id'];
        $nombre_cliente = $rowMotorizado['nombre_cliente'];
        $celular_cliente = $rowMotorizado['celular_cliente'];
        $ciudad_cliente = $rowMotorizado['ciudad_cliente'];
        $correo_cliente = $rowMotorizado['correo_cliente'];
        $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
        $id_uso_servicio = $rowMotorizado['id_uso_servicio'];
        $tipo_cliente = $rowMotorizado['tipo_cliente'];
        $fechar = $rowMotorizado['fechar'];
        $fecha_actualizado = $rowMotorizado['fecha_actualizado'];
        $activo = $rowMotorizado['activo'];
        $genero = $rowMotorizado['genero'];
        $direccion_cliente = $rowMotorizado['direccion_cliente'];
        $telefono_cliente = $rowMotorizado['telefono_cliente'];
        $edad_cliente = $rowMotorizado['edad_cliente'];
        $profesion_cliente = $rowMotorizado['profesion_cliente'];
        $acompananteFamiliar = $rowMotorizado['acompananteFamiliar'];
        $telefono_acompanante = $rowMotorizado['telefono_acompanante'];
        $antecedentes = $rowMotorizado['antecedentes'];
    }
}

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
    <!-- <section class="content-header">
       <ol class="breadcrumb">
         <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
         <li><a href="#">Historial exámenes </a></li>
       </ol>
     </section> -->

    <!-- Main content -->
    <section class="content">
        <div class="col-xs-12">
            <h4 class="Titulo_Pagina"></a>&nbsp;&nbsp;Historial exámenes </h4>

            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <?php echo datosPacientes($clienteId); ?>


                    <div class="col-md-12 bg-white">
                        <h4 class="card-title">Nombre de la Carpeta o Archivo</h4>
                        <form action="guardarImagenes.php" method="POST" name="FormularioImagenes" enctype="multipart/form-data">

                            <input type="hidden" id="clienteId" name="usuario_id" value="<?php echo $usuario_id; ?>">
                            <input type="hidden" id="CODI_CLIENTE" name="CODI_CLIENTE" value="<?php echo $CODI_CLIENTE; ?>">
                            <input type="hidden" id="clienteid" name="clienteid" value="<?php echo $clienteId; ?>">


                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="Descripcion" name="descripcion" placeholder="Carpeta" autocomplete="off" required>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Archivos</label>

                                <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="" required autocomplete="off" placeholder="">
                                <span id="fileWarning" style="color: red;">Solo se permiten archivos en formato JPG, JPEG, PNG, GIF, PDF, DOC, DOCX o XLSX.</span>
                            </div>
                            <center><input type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" value="Guardar" placeholder=" Solo se permiten archivos en formato JPG, JPEG, PNG, GIF, PDF, DOC, DOCX o XLSX.">
                            </center>
                        </form>
                        <link type="text/css" rel="stylesheet" href="css/tabs.css" />
                    </div>
                    <div class="page" style="background-color: aliceblue;padding: 20px;">
                        <!--<h1>Pure CSS Tabs</h1>  -->
                        <!-- tabs -->
                        <div class="pcss3t pcss3t-effect-scale pcss3t-theme-1">
                            <input type="radio" name="pcss3t" checked id="tab1" class="tab-content-first">
                            <label for="tab1"><i class="icon-bolt"></i>Archivos</label>

                            <input type="radio" name="pcss3t" id="tab2" class="tab-content-2">
                            <label for="tab2"><i class="icon-picture"></i>Carpetas</label>

                            <ul>
                                <li class="tab-content tab-content-first typography">
                                    <h1 class="txt_rsp">Registro de Archivos</h1>

                                    <table class="table table-responsive">
                         <thead>
                           <tr>
                             <th scope="col">#</th>
                             <th scope="col">Nombre Archivo</th>
                             <th scope="col">Carpeta</th>
                             <th scope="col">Fecha</th>
                             <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-camera" aria-hidden="true"></i></th>
                             <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-download" aria-hidden="true"></i></th>
                             <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-picture-o" aria-hidden="true"></i></th>
                             <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></th>
                             <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-trash" aria-hidden="true"></i></th>
                             <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-pencil" aria-hidden="true"></i></th>
                           </tr>
                         </thead>
                         <tbody>

                           <?php
                           $queryImg = mysqli_query(
                               $conn3,"SELECT * FROM archivos  where cliente_id = '$clienteId' and estado = '1'"
                           );


                           while ($resulImg = mysqli_fetch_array($queryImg)) {

                               $contador++;
                               $Producto = $resulImg['id'];
                               $img = 'archivos/' . $resulImg['codigo'];
                               if (!esArchivoImagen($img)) {
                                $queryLogo = mysqli_query($conn3," SELECT logoF FROM config c where (ID_Usuario = '{$_SESSION['ID']}' or ID_Usuario = '{$_SESSION['ID_principal']}');");
                                $resulLogo = mysqli_fetch_array($queryLogo);
                                $img = 'logos/' . $resulLogo['logoF'];
                               }
                            ?>
                             <tr>
                               <td>
                                 <?php echo $contador; ?>
                               </td>
                               <td>
                                 <?php echo $resulImg['NombreVisual']; ?>

                               </td>
                               <td>
                                 <?php echo $resulImg['descripcion']; ?>
                               </td>
                               <td>
                                 <?php echo $resulImg['fecha']; ?>
                               </td>

                               <td style="text-align: center;">

                              <a> <img src="<?php echo $Base; ?><?php
                               echo  $img;
                               ?>" width="100" height="100" alt="" /></a>

                              <td style="text-align: center;">
                                 <a target="_blank" href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>">
                                   <a href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>" download="Archivo">Descargar Archivo
                                   </a>
                                 </a>
                               </td>
                               <td style="text-align: center;">
                                 <a href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>" >
                                   <a target="_blank" href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>">Ver Archivo o Imagen <br>
                                   </a>
                                 </a>
                               </td>
                               <td style="text-align: center;">
                                 <a target="_blank" href="<?php echo $Base; ?>enviarArchivo.php?cliente=<?php echo $clienteId; ?>&id=<?php echo $Producto; ?>">
                                   Enviar Archivo <br>
                                 </a>
                               </td>
                               <td style="text-align: center;">
                                 <a href="<?php echo $Base; ?>historiaImagenes_eliminar.php?cliente=<?php echo $clienteId; ?>&id=<?php echo $Producto; ?>">
                                   Eliminar Archivo <br>
                                 </a>
                               </td>
                               <td style="text-align: center;">
                              <a target="_blank" href="<?php echo $Base; ?>EditarArchivo.php?cliente=<?php echo $clienteId; ?>&id=<?php echo $Producto; ?>">
                                Editar Nombre de Archivo <br>
                              </a>
                            </td>
                             </tr>
                           <?php
                           }
                           ?>
                         </tbody>
                       </table>

                                </li><!-- cierre del primer modulo archivos -->

                                <li class="tab-content tab-content-2 typography">
                                    <h1 class="txt_rsp">Registro de Carpetas</h1>



                                    <table class="table w-100" style="width: 100% !important;">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Carpeta</th>
                                                <th scope="col">Fecha</th>
                                                <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $queryarchivo = mysqli_query($conn3, "SELECT * FROM archivos  where cliente_id = '$clienteId' and estado = 1 group by descripcion");

                                            $nrowlER = mysqli_num_rows($queryarchivo);
                                            while ($resularchivo = mysqli_fetch_array($queryarchivo)) {
                                                $descripcion = $resularchivo['descripcion'];

                                            ?>





                                                <tr>
                                                    <td>
                                                        <?php echo $contador ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $descripcion; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $resularchivo['fecha']; ?>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <a target="_blank" href="<?php echo $Base; ?>enviarArchivoPaquete.php?cliente=<?php echo $clienteId; ?>&descripcion=<?php echo $descripcion; ?>">
                                                            Enviar Archivos <br>
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

<div id="imageModal" class="modal">
    <div class="modal-content">
        <span class="close-button" onclick="closeModal()">&times;</span>
        <img id="modalImage" src="" alt="Vista previa de la imagen">
        <br>
        <a href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>" download="Archivo">Descargar</a>
    </div>
</div>





<?php include("footer.php")


?>
<script type="text/javascript" src="upload/js/jquery-ui.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="upload/plupload/js/plupload.full.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="upload/plupload/js/jquery.ui.plupload/jquery.ui.plupload.min.js" charset="UTF-8">
</script>

<script>
    function openModal(imageUrl) {
        // Mostrar el modal
        var modal = document.getElementById('imageModal');
        modal.style.display = 'flex';

        // Mostrar la imagen en el modal
        var modalImage = document.getElementById('modalImage');
        modalImage.src = imageUrl;
    }

    function closeModal() {
        // Cerrar el modal
        var modal = document.getElementById('imageModal');
        modal.style.display = 'none';
    }
</script>

<style>
  #error {
    color: red;
}
    /* Estilo para el modal */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        max-width: 80%;
        max-height: 80%;
        overflow: hidden;
        position: relative;
        text-align: center;
    }

    .close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        color: red;
        cursor: pointer;
        height: 150px;
        /* Ajusta la altura según tus necesidades */
        width: 150px;
        /* Ajusta el ancho según tus necesidades */
        font-size: 100px;
        /* Ajusta el tamaño de la fuente para mantener el icono grande */
    }


    /* Estilo para el enlace de descarga */
    .download-link {
        text-align: center;
        display: block;
        margin: 20px 0;
    }