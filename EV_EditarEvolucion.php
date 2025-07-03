<?php
include 'header.php';
include 'menu.php';
require_once './plugins/comprimir/comprimirImagen.php';



#Inicio
if (isset($_POST['Guardar_Informacion_Pagina'])) {

    $ID_principal = $_SESSION['ID_principal'];

    $Table = "Evoluciones_Generales";


    $QueryAddColumn = "ALTER TABLE {$Table} ADD COLUMN IF NOT EXISTS evolucion_id_anterior INT(11) COMMENT 'Referencia a tabla $Table, id por el cual es reemplazado esta evolucion' ";
    mysqli_query($conn3, $QueryAddColumn) or die(mysqli_error($conn3));

    $QueryInsert = "INSERT INTO {$Table} SET cliente_id = '{$_POST["cliente_id"]}',
                                             usuario_id = '{$_POST["usuario_id"]}',
                                             id_historiaClinica = '{$_POST["historia_id"]}',
                                             evolucion_id_anterior = '{$_POST["evolucion_id"]}',
                                             tabla = '{$_POST["tabla"]}',
                                             Fecha = '".date("Y-m-d")."',
                                             Hora = '".date("H:i:s")."',
                                             motivoConsulta = '{$_POST["motivoConsulta"]}'";
                                         
    $QueryUpdate = "UPDATE {$Table} SET Activo='1' WHERE id='{$_POST["evolucion_id"]}' ";
    

    // echo $QueryInsert .  "<br>" .$QueryUpdate;
    // die();

    mysqli_query($conn3, $QueryInsert) or die(mysqli_error($conn3));
    $id_nuevo = mysqli_insert_id($conn3);
    mysqli_query($conn3, $QueryUpdate) or die(mysqli_error($conn3));


    $ruta = htmlentities($_SERVER['PHP_SELF']);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Guardar La Evolucion'</script>";
    } else {
        echo "<script language='Javascript'> window.location='EV_FinalizadoEvolucion.php?id=" . encrypt($id_nuevo) . "'</script>";
    }
}


$usuario_id = $_SESSION['ID'];
$evolucion_id = decrypt($_GET['id']); 

$QueryEvolucion = "SELECT * FROM Evoluciones_Generales WHERE id = $evolucion_id";
$ResultEvolucion = mysqli_query($conn3, $QueryEvolucion);
$DatosEvolucion = mysqli_fetch_assoc($ResultEvolucion);
$cliente_id = $DatosEvolucion['cliente_id'];

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
                                <textarea id="motivoConsulta" name="motivoConsulta" class="textarea" placeholder="Nota de Evolución" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$DatosEvolucion["motivoConsulta"]?></textarea>
                            </div>

                            <!-- <label>Imagenes (opcional)</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"> <i class="fas fa-file-lines"></i> </span>
                                <input type="file" id="files" accept="image/*" multiple name="files[]" class="form-control">
                            </div> -->

                            <div id="preview" class="my-3"></div>
                            

                            <input type="hidden" name="usuario_id" value="<?=$DatosEvolucion["usuario_id"]; ?>">
                            <input type="hidden" name="cliente_id" value="<?=$DatosEvolucion["cliente_id"]; ?>">
                            <input type="hidden" name="historia_id" value="<?=$DatosEvolucion["id_historiaClinica"]; ?>">
                            <input type="hidden" name="tabla" value="<?php echo $DatosEvolucion["tabla"]; ?>">
                            <input type="hidden" name="evolucion_id" value="<?=$evolucion_id ?>">

                            <div class="col-sm-12">
                                <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Guardar_Informacion_Pagina">
                                        <h2> <strong> A c t u a l i z a r </strong> </h2>
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