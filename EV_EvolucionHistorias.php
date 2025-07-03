<?php
include 'header.php';
include 'menu.php';
require_once './plugins/comprimir/comprimirImagen.php';

#Inicio
if (isset($_POST['Guardar_Informacion_Pagina'])) {

    // try {
        $ID_principal = $_SESSION['ID_principal'];

        $tableImgEvolutions = "image_evolutions";
        $CreateTableImg = "CREATE TABLE IF NOT EXISTS {$tableImgEvolutions}(
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            fecha_actualizacion DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            historia_clinica_id INT(11) NOT NULL,
            evolucion_id INT(11) NOT NULL,
            usuario_id INT(11) NOT NULL,
            cliente_id INT(11) NOT NULL,
            usuario_principal_id INT(11) NOT NULL,
            image_name VARCHAR(255) NOT NULL,
            tabla VARCHAR(255) NOT NULL,
            ruta VARCHAR(255) NOT NULL
        )";
    
        mysqli_query($conn3, $CreateTableImg) or die("Error al crear la tabla: " . mysqli_error($conn3));
    
    
        $cliente_id             = $_POST['cliente_id'];
        $usuario_id             = $_POST['usuario_id'];
        $fechar                = date("Y-m-d");
        $hora                  = date("H:i:s");
        $motivoConsulta        = ($_POST['motivoConsulta']);
        $historia_id           = $_POST['historia_id'];
        $tabla           = $_POST['tabla'];
    
        $Campo1 = mysqli_query($conn3, "show COLUMNS from evoluciones WHERE Field = 'tabla';");
        $nrowCampo1 = mysqli_num_rows($Campo1);
        if ($nrowCampo1 == "0") {
            mysqli_query($conn3, "ALTER TABLE `evoluciones` ADD `tabla` TEXT NULL  COMMENT 'nombre de la tabla a la que se le hizo evolucion *Creado desde modulo de EV_EvolucionHistorias*'");
        }
    
        $queryList =  mysqli_query($conn3, "INSERT INTO Evoluciones_Generales (cliente_id, usuario_id, Fecha, Hora,  motivoConsulta, id_historiaClinica, tabla) VALUES  ('$cliente_id', '$usuario_id', '$fechar', '$hora',  '$motivoConsulta','$historia_id', '$tabla');") or die(mysqli_error($conn3));
        $evolucion_id = mysqli_insert_id($conn3);
    
    
        // var_dump($_FILES);
        // die();

        foreach ($_FILES["files"]["tmp_name"] as $index => $file) {
            if (!$file) {
                continue;
            }

            $name = date("YmdHis") . "_" .$_FILES["files"]["name"][$index];
            $type = $_FILES["files"]["type"][$index];
    
            $dirBase = "ImagenesEvoluciones/";
            if (!file_exists($dirBase)) {
                mkdir($dirBase);
            }
    
            $endDir = $dirBase . $name;
            comprimirImagen($file, $endDir, 70);
    
            // if (move_uploaded_file($file, $endDir)) {
                $QueryInsert = "INSERT INTO {$tableImgEvolutions} SET 
                                historia_clinica_id = '$historia_id',
                                evolucion_id = '$evolucion_id',
                                usuario_id  = '$usuario_id',
                                cliente_id = '$cliente_id',
                                usuario_principal_id = '$ID_principal',
                                image_name = '$name',
                                tabla = '$tabla',
                                ruta = '$endDir'";
    
                mysqli_query($conn3, $QueryInsert) or die(mysqli_error($conn3));
            // }
    
        }
    
    
        $ruta = htmlentities($_SERVER['PHP_SELF']);
        if ($queryList != true) {
            echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Guardar La Evolucion'</script>";
        } else {
            echo "<script language='Javascript'> window.location='EV_FinalizadoEvolucion.php?id=" . encrypt($evolucion_id) . "'</script>";
        }
    // } catch (\Throwable $th) {
    //     echo "Ocurrio un error=> " . $th->getMessage()  . " en la linea " . $th->getLine();
    // }


}


$usuario_id = $_SESSION['ID'];
$cliente_id = decrypt($_GET['cliente_id']);
$historia_id = decrypt($_GET['historia_id']);
$tabla = decrypt($_GET['tabla']);
/*
se usa en creador historias,medicina estetica,centro estetico,spa,historia audiologica,historia urologia
*/

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$cliente_id");
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $nombre_cliente = $rowMotorizado['nombre_cliente'];
    }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Registro de Evoluciones </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">

                <h4 class="Titulo_Pagina">Evolución, Paciente: <?php echo $nombre_cliente; ?></h4>
                <div class="box">
                    <div class="box-body">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group col-md-12">
                                <label>Nota de Evolución</label>
                                <textarea id="motivoConsulta" name="motivoConsulta" class="textarea" placeholder="Nota de Evolución" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>

                            <label>Imagenes (opcional)</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"> <i class="fas fa-file-lines"></i> </span>
                                <input type="file" id="files" accept="image/*" multiple name="files[]" class="form-control">
                            </div>

                            <div id="preview" class="my-3"></div>


                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">
                            <input type="hidden" name="cliente_id" value="<?php echo $cliente_id; ?>">
                            <input type="hidden" name="historia_id" value="<?php echo $historia_id; ?>">
                            <input type="hidden" name="tabla" value="<?php echo $tabla; ?>">

                            <div class="col-sm-12">
                                <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Guardar_Informacion_Pagina">
                                        <h2> <strong> G u a r d a r </strong> </h2>
                                    </button></center>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>
<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php'; ?>

<script>
    const fileInput = document.getElementById("files");
    const previewContainer = document.getElementById("preview");

    fileInput.addEventListener("change", function(event) {
        const files = event.target.files;
        previewContainer.innerHTML = ""; // Limpiar previas imágenes

        Array.from(files).forEach((file, index) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);

            reader.onload = function(e) {
                const imgContainer = document.createElement("div");
                imgContainer.classList.add("preview-item");
                imgContainer.innerHTML = `
                        <img src="${e.target.result}" alt="Imagen">
                        <button class="remove-btn" data-index="${index}">&times;</button>
                    `;

                previewContainer.appendChild(imgContainer);

                // Agregar evento de eliminación
                imgContainer.querySelector(".remove-btn").addEventListener("click", function() {
                    removeImage(index);
                });
            };
        });
    });

    function removeImage(index) {
        const filesList = Array.from(fileInput.files);
        filesList.splice(index, 1); // Eliminar imagen del array
        const dataTransfer = new DataTransfer();
        filesList.forEach(file => dataTransfer.items.add(file));
        fileInput.files = dataTransfer.files; // Actualizar input file

        // Volver a renderizar la previsualización
        previewContainer.innerHTML = "";
        Array.from(fileInput.files).forEach((file, i) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(e) {
                const imgContainer = document.createElement("div");
                imgContainer.classList.add("preview-item");
                imgContainer.innerHTML = `
                        <img src="${e.target.result}" alt="Imagen">
                        <button class="remove-btn" data-index="${i}">&times;</button>
                    `;
                previewContainer.appendChild(imgContainer);

                imgContainer.querySelector(".remove-btn").addEventListener("click", function() {
                    removeImage(i);
                });
            };
        });
    }
</script>

<style>
    #preview {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
    }

    .preview-item {
        position: relative;
        display: inline-block;
    }

    .preview-item img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .remove-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background: red;
        color: white;
        border: none;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 14px;
        cursor: pointer;
    }
</style>