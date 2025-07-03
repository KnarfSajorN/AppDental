<?php
// recibimos el post
$n = 0 + $_GET['n'];
$img = $_GET['img'];
$h = $_GET['h'];
$w = $_GET['w'];
$timer = $_GET['timer'];
$disabled_medico = 0 + $_GET['disabled_medico'];

?>

<?php if ($disabled_medico == 0) : ?>
    <style>
	/* Boton sucess */
.css-button-sharp--green {
    min-width: 130px;
    height: 40px;
    color: #fff;
    padding: 5px 10px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    display: inline-block;
    outline: none;
    border: 2px solid #57cc99;
    background: #57cc99;
	border-radius: 30px;
}

.css-button-sharp--green:hover {
    background: #fff;
    color: #57cc99
}
/* Botón primary */
.css-button-sharp--green1 {
    min-width: 130px;
    height: 40px;
    color: #fff;
    padding: 5px 10px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    display: inline-block;
    outline: none;
    border: 2px solid #117a8b;
    background: #117a8b;
	border-radius: 30px;
}

.css-button-sharp--green1:hover {
    background: #fff;
    color: #117a8b
}
/* Botón warning */
.css-button-sharp--green4 {
    min-width: 130px;
    height: 40px;
    color: #fff;
    padding: 5px 10px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    display: inline-block;
    outline: none;
    border: 2px solid #ffc107;
    background: #ffc107;
	border-radius: 30px;
}

.css-button-sharp--green4:hover {
    background: #fff;
    color: #ffc107;
}


.contenedor_canvas {
  display: flex;
  justify-content: center;
  align-items: center;
}

</style>
    <div class="col-md-6">
        <label>Color del trazo: </label>
        <input type="color" class="form-control input-lg" name="color" id="color<?= $n ?>" onchange="cambiarColorSignature<?= $n ?>()">
    </div>
    <div class="col-md-6">
        <label>Herramienta: </label>
        <select class="form-control input-lg" name="tool" id="tool<?= $n ?>" onchange="cambiarColorSignature<?= $n ?>()">
            <option value="1">1. Lápiz</option>
            <option value="2">2. Spray</option>
        </select>
    </div>

    <div class="col-md-12"><br></div>

    <div class="col-md-12 center text-center">
        <div class="contenedor_canvas" style="background-color:#c0c0c0">
            <canvas id="canvas1<?= $n ?>" name="canvas1<?= $n ?>" width="<?= $w ?>" height="<?= $h ?>"></canvas>
            
        </div>
        <div class="col-md-12">
            <input type="file" id="fileUpload1<?= $n ?>" name="fileUpload1<?= $n ?>">
        </div>

        <div style="<?= ($_GET['escribir'] ? '' : 'display:none;') ?>">
            <div class="row">
                <div class="col-md-8">
                    <label>Texto</label>
                    <input type="text" id="textoCanvas<?= $n ?>" placeholder="texto a incluir - debe realizar doble click donde desee pegar el texto" value="" name="textoCanvas<?= $n ?>" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Tamaño</label>
                    <select id="tamanoCanvas<?= $n ?>" class="form-control">
                        <option value="12">12</option>
                        <option value="14">14</option>
                        <option value="16">16</option>
                        <option value="18">18</option>
                        <option value="20">20</option>
                        <option value="24">24</option>
                        <option value="26">26</option>
                        <option value="28">28</option>
                        <option value="30">30</option>
                    </select>
                </div>
            </div>
        </div>


        <p class="text text-muted"> Para guardar la imagen y el trazado, porfavor oprimir "GUARDAR" al terminar. </p>
        <a class="css-button-sharp--green1" id="rayadodeshacer_<?= $n ?>"data-action="undo"><i class="fa fa-undo"></i> - Deshacer</a>
        <a class="css-button-sharp--green4" id="rayadolimpiar_<?= $n ?>"onclick="clear1<?= $n ?>()"><i class="fas fa-trash-can"></i> - Limpiar</a>
        |
        <a class="css-button-sharp--green trazo" onclick="guardarTrazo<?= $n ?>()"><i class="fa fa-save"></i> - Guardar</a>
        <input type="hidden" name="rayado[img<?= $n ?>]" id="img<?= $n ?>" class="RayadoAutoguardado" required>
        <span class="text-center text-bold trazoAlerta<?= $n ?>" style="display:none">Trazo Guardado</span>
    </div>
    <!-- jquery -->
    <script src="<?php echo $Base ?>plugins/jquery/jquery-2.2.3.min.js"></script>
    <script src="<?php echo $Base ?>firma/js/signature_pad.umd.js"></script>
    <script src="<?php echo $Base ?>firma/js/app.js"></script>

    <script type="text/javascript">
        window.signaturePad1<?= $n ?> = new SignaturePad($('#canvas1<?= $n ?>').get(0), {});

        document.getElementById('canvas1<?= $n ?>').setAttribute('width', '<?= $h ?>');
        document.getElementById('canvas1<?= $n ?>').setAttribute('height', '<?= $w ?>');
        // malditasea :c

        const EL<?= $n ?> = (sel<?= $n ?>) => document.querySelector(sel<?= $n ?>);
        const canvasContext<?= $n ?> = EL<?= $n ?>("#canvas1<?= $n ?>").getContext("2d");

        var imagenHeight<?= $n ?> = document.getElementById('canvas1<?= $n ?>').clientHeight;
        imagenHeight<?= $n ?> = '<?= $h ?>';

        var imagenWidth<?= $n ?> = document.getElementById('canvas1<?= $n ?>').clientWidth;
        imagenWidth<?= $n ?> = '<?= $w ?>';

        var imagenTag<? $n ?> = document.getElementById('fileUpload1<?= $n ?>');

        var canvasTag<?= $n ?> = document.getElementById('canvas1<?= $n ?>');

        imagenTag<? $n ?>.setAttribute('width', imagenWidth<?= $n ?>);
        imagenTag<? $n ?>.setAttribute('height', imagenHeight<?= $n ?>);
        canvasTag<?= $n ?>.setAttribute('width', imagenWidth<?= $n ?>);
        canvasTag<?= $n ?>.setAttribute('height', imagenHeight<?= $n ?>);

        function guardarTrazo<?= $n ?>() {
            var dataURL<?= $n ?> = signaturePad1<?= $n ?>.toDataURL();
            document.getElementById("img<?= $n ?>").value = dataURL<?= $n ?>;
            if (document.getElementById("img<?= $n ?>").value != "") {
                document.getElementsByClassName("trazoAlerta<?= $n ?>")[0].style.display = "block";
            }
        }

        function clearFileInput<?= $n ?>(ctrl) {
            try {
                ctrl.value = null;
            } catch (ex) {}
            if (ctrl.value) {
                ctrl.parentNode.replaceChild(ctrl.cloneNode(true), ctrl);
            }
        }

        function clear1<?= $n ?>() {
            window.signaturePad1<?= $n ?>.clear();
            clearFileInput<?= $n ?>(document.getElementById("fileUpload1<?= $n ?>"));
            base_image<?= $n ?> = new Image();
            base_image<?= $n ?>.src = '<?= $img ?>';
            base_image<?= $n ?>.onload = function() {
                canvasContext<?= $n ?>.clearRect(base_image<?= $n ?>, 0, 0, 99999999999, 99999999999);
                canvasContext<?= $n ?>.drawImage(base_image<?= $n ?>, 0, 0, imagenWidth<?= $n ?>, imagenHeight<?= $n ?>);
            }
            console.log(imagenWidth<?= $n ?>);
            console.log(imagenHeight<?= $n ?>);
        }


        function readImage1<?= $n ?>() {
            if (!this.files || !this.files[0]) return;

            const FR<?= $n ?> = new FileReader();
            FR<?= $n ?>.addEventListener("load", (evt) => {
                const img = new Image();
                img.addEventListener("load", () => {
                    var imagenW = img.width;
                    var imagenH = img.height;
                    // ajustamos la altura del canva segun la imagen
                    var ratio = imagenW / imagenH;
                    if (ratio > 1) {
                        imagenWidth<?= $n ?>2 = imagenWidth<?= $n ?>;
                    } else {
                        imagenWidth<?= $n ?>2 = imagenWidth<?= $n ?> * ratio;
                    }
                    canvasContext<?= $n ?>.clearRect(img, 0, 0, 99999999999, 99999999999);
                    canvasContext<?= $n ?>.drawImage(img, 0, 0, imagenWidth<?= $n ?>2, imagenHeight<?= $n ?>);
                    canvasContext<?= $n ?>.clearRect(0, 0, canvasContext<?= $n ?>.width, canvasContext<?= $n ?>.height);
                    canvasContext<?= $n ?>.beginPath(); //ADD THIS LINE!<<<<<<<<<<<<<
                    canvasContext<?= $n ?>.moveTo(0, 0);
                    canvasContext<?= $n ?>.lineTo(event.clientX, event.clientY);
                    canvasContext<?= $n ?>.stroke();


                });
                img.src = evt.target.result;
                //console.log(img.src);
                document.getElementById("img<?= $n ?>").value = evt.target.result;
            });
            FR<?= $n ?>.readAsDataURL(this.files[0]);
        }

        EL<?= $n ?>("#fileUpload1<?= $n ?>").addEventListener("change", readImage1<?= $n ?>);


        function cambiarColorSignature<?= $n ?>() {
            var get<?= $n ?> = document.getElementById('color<?= $n ?>').value;
            var get1<?= $n ?> = document.getElementById('tool<?= $n ?>').value;

            if (get1<?= $n ?> == '1') {
                signaturePad1<?= $n ?>.dotSize = 1;
            } else {
                signaturePad1<?= $n ?>.dotSize = 10;
            }

            var
                r<?= $n ?> = parseInt(get<?= $n ?>.slice(1, 3), 16),
                g<?= $n ?> = parseInt(get<?= $n ?>.slice(3, 5), 16),
                b<?= $n ?> = parseInt(get<?= $n ?>.slice(5, 7), 16);

            if (get1<?= $n ?> == '1') {
                var color<?= $n ?> = "rgb(" + r<?= $n ?> + ", " + g<?= $n ?> + ", " + b<?= $n ?> + ")";
            } else {
                var color<?= $n ?> = "rgba(" + r<?= $n ?> + ", " + g<?= $n ?> + ", " + b<?= $n ?> + ",0.5)";
            }

            signaturePad1<?= $n ?>.penColor = color<?= $n ?>;
        }


        $("#canvas1<?= $n ?>").dblclick(function() {
            var texto = $("#textoCanvas<?= $n ?>").val();
            var tamano = $("#tamanoCanvas<?= $n ?>").val();
            console.log(texto);
            console.log(tamano);
            signaturePad1<?= $n ?>._ctx.font = tamano + "px Arial";
            signaturePad1<?= $n ?>._ctx.fillText(
                texto, event.offsetX, event.offsetY
            );
            $("#textoCanvas<?= $n ?>").val("");
        })

        let borrar<?= $n ?> = document.querySelector('[data-action="undo"]');
        borrar<?= $n ?>.addEventListener("click", function(event) {
            var data = signaturePad1<?= $n ?>.toData();
            console.log(data);
            if (data) {
                data.pop(); // remove the last dot or line
                cargarTrazos<?= $n ?>(data);
                //cargarImagenFondo<?= $n ?>();
            }
            
        });



        function cargarTrazos<?= $n ?>(data) {
            console.log(document.getElementById("img<?= $n ?>").value);
            if (document.getElementById("img<?= $n ?>").value != "") {  



                var canvas = document.getElementById("canvas1<?= $n ?>");
                var ctx = canvas.getContext("2d");

                // Cargar la imagen de fondo
                var imagenBase64 = document.getElementById("img<?= $n ?>").value;
                var tempImage = new Image();
                tempImage.src = imagenBase64;
                tempImage.onload = function() {
                    // Dibujar la imagen de fondo
                    ctx.drawImage(tempImage, 0, 0, canvas.width, canvas.height);
                    
                    // Dibujar los trazos del objeto signaturePad1<?= $n ?> en el lienzo
                    var data = signaturePad1<?= $n ?>.toData();
                    for (var i = 0; i < data.length; i++) {
                        var trazo = data[i];
                        ctx.beginPath();
                        ctx.lineWidth = trazo.width || 2; // Establece el ancho de línea (puede usar un valor predeterminado)
                        ctx.moveTo(trazo.points[0].x, trazo.points[0].y);
                        for (var j = 1; j < trazo.points.length; j++) {
                            ctx.lineTo(trazo.points[j].x, trazo.points[j].y);
                        }
                        ctx.stroke();
                    }
                };



            }else{
                clear1<?= $n ?>();

                setTimeout(() => {
                signaturePad1<?= $n ?>.fromData(data);
                }, 1000);
            }
            
            
        }

        clear1<?= $n ?>();
    </script>

    <script>
        setTimeout(() => {
            // validar si el valor de img<?= $n ?> esta vacio
            if (document.getElementById("img<?= $n ?>").value != "") {                
                window.signaturePad1<?= $n ?>.clear();
                clearFileInput<?= $n ?>(document.getElementById("fileUpload1<?= $n ?>"));
                base_image<?= $n ?> = new Image();
                base_image<?= $n ?>.src = document.getElementById("img<?= $n ?>").value;
                base_image<?= $n ?>.onload = function() {
                    canvasContext<?= $n ?>.clearRect(base_image<?= $n ?>, 0, 0, 99999999999, 99999999999);
                    canvasContext<?= $n ?>.drawImage(base_image<?= $n ?>, 0, 0, imagenWidth<?= $n ?>, imagenHeight<?= $n ?>);
                }
            }
        }, <?= $timer ?>);
    </script>

<?php else : ?>
    <div class="center text-center mt-3 mb-3">
        <img name="datos[img<?= $n ?>]" src="" alt="">
    </div>
<?php endif ?>