<?php
if ($_POST["Tipo"] == "Guardar Logo" and isset($_POST["Imagen"]) and isset($_POST["usuario_id"])) {

    include 'funciones/conn3.php';

    define('UPLOAD_DIR', 'logos/');
    $img = $_POST['Imagen'];
    $usuario_id = $_POST['usuario_id'];

    if ($img <> "") {
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $fechahora = date("Y-m-d_H-i-s");
        $QueryUsuarios = mysqli_query($conn3, "SELECT * FROM  usuarios WHERE ID='$usuario_id'");
        while ($RowUsuarios = mysqli_fetch_array($QueryUsuarios)) {
            $Nombre = $RowUsuarios["NOMBRE_USUARIO"];
        }
        $name = str_replace(' ', '', $Nombre);
        $nombre_foto = "{$usuario_id}__{$fechahora}__{$name}.png";
        $success = file_put_contents(UPLOAD_DIR . $nombre_foto, $data);
        if (!empty($success)) {
            $queryCliente = "UPDATE config SET  logoF= '$nombre_foto'  WHERE ID_Usuario = '$usuario_id'";
            mysqli_query($conn3, $queryCliente) or die(mysql_error());
        }
        //print $success ? $file : 'Unable to save the file.'; 
    }

    //exit();
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.css"
    integrity="sha512-5ZQRy5L3cl4XTtZvjaJRucHRPKaKebtkvCWR/gbYdKH67km1e18C1huhdAc0wSnyMwZLiO7nEa534naJrH6R/Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .label {
        cursor: pointer;
    }

    .progress {
        display: none;
        margin-bottom: 1rem;
    }

    .alert {
        display: none;
    }

    .img-container img {
        max-width: 100%;
    }
</style>



<div class="container">
    <h1>Subir logo al sistema:</h1>
    <p>Haga clic en el recuadro negro para elegir el logo.
     </p><br>
    <label class="label" data-toggle="tooltip" title="Change your avatar">
        <?php
        if (strlen($logoF) > 0) {
            echo "<img class='rounded' id='avatar' src='{$Base}/logos/{$logoF}' alt='avatar' style='border: 2px solid black;padding: 15px;width:300px;height:250px'>";
        } else {
            echo "<img class='rounded' id='avatar' src='' alt='avatar'>";
        }
        ?>

        <input type="file" class="sr-only" id="input" accept="image/*">
    </label>
    <br>
    <!-- <h1>Subir logo al sistema <b>sencillo</b> -->
    <h1><b>Al subir la imagen darle al botón actualizar</b></h1>
    <p>Si desea cambiar el logo, darle clic a "ELEGIR ARCHIVO".</p>
    <input type="file" class="form-control input-lg" name="imagen">
    <br>

    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0"
            aria-valuemin="0" aria-valuemax="100">0%</div>
    </div>
    <div class="alert" role="alert"></div>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Crop the image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                    </div>
                    <div id="result"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/jquery@3/dist/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap@4/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.js"
    integrity="sha512-witv14AEvG3RlvqCAtVxAqply8BjTpbWaWheEZqOohL5pxLq3AtIwrihgz7SsxihwAZkhUixj171yQCZsUG8kw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    window.addEventListener('DOMContentLoaded', function () {
        var avatar = document.getElementById('avatar');
        var image = document.getElementById('image');
        var input = document.getElementById('input');
        var $progress = $('.progress');
        var $progressBar = $('.progress-bar');
        var $alert = $('.alert');
        var $modal = $('#modal');
        var cropper;

        var minCroppedWidth = 100;
        var minCroppedHeight = 100;
        var maxCroppedWidth = 500;
        var maxCroppedHeight = 500;

        /*
        var minAspectRatio = 0.5;
        var maxAspectRatio = 1.5;
        */

        $('[data-toggle="tooltip"]').tooltip();

        input.addEventListener('change', function (e) {
            var files = e.target.files;
            var done = function (url) {
                input.value = '';
                image.src = url;
                $alert.hide();
                $modal.modal('show');
            };
            var reader;
            var file;
            var url;

            if (files && files.length > 0) {
                file = files[0];

                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                viewMode: 0,
                zoomable: true,
                dragMode: "move",

                data: {
                    width: (minCroppedWidth + maxCroppedWidth) / 2,
                    height: (minCroppedHeight + maxCroppedHeight) / 2,
                },

                crop: function (event) {
                    var width = event.detail.width;
                    var height = event.detail.height;

                    if (
                        width < minCroppedWidth ||
                        height < minCroppedHeight ||
                        width > maxCroppedWidth ||
                        height > maxCroppedHeight
                    ) {
                        cropper.setData({
                            width: Math.max(minCroppedWidth, Math.min(maxCroppedWidth, width)),
                            height: Math.max(minCroppedHeight, Math.min(maxCroppedHeight, height)),
                        });
                    }

                    //data.textContent = JSON.stringify(cropper.getData(true));
                },

            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        document.getElementById('crop').addEventListener('click', function () {
            var initialAvatarURL;
            var canvas;

            $modal.modal('hide');

            if (cropper) {
                canvas = cropper.getCroppedCanvas();
                initialAvatarURL = avatar.src;
                avatar.src = canvas.toDataURL();
                $progress.show();

                $alert.removeClass('alert-success alert-warning');
                canvas.toBlob(function (blob) {
                    var formData = new FormData();
                    var Imagenes = canvas.toDataURL();
                    //console.log(canvas.toDataURL());
                    formData.append('avatar', blob, 'avatar.jpg');
                    $.ajax({
                        url: "CargarLogo.php",
                        method: 'POST',
                        data: {
                            Imagen: Imagenes,
                            usuario_id: "<?php echo $usuarioId; ?>",
                            Tipo: "Guardar Logo"
                        },

                        success: function (response) {
                            $alert.show().addClass('alert-success').text('Se cargo la imagen correctamente');
                            //console.log(response);
                        },

                        error: function () {
                            avatar.src = initialAvatarURL;
                            $alert.show().addClass('alert-warning').text('Error en la carga de la imagen');
                        },

                        complete: function () {
                            $progress.hide();
                        },
                    });
                });
            }
        });
    });
</script>