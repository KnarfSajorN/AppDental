<script src="ModulosRIAS/Familiograma/API/diagram-editor.js"></script>

<?php
$QueryPaciente = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $ClienteFami_Eco");
while ($RowPaciente = mysqli_fetch_array($QueryPaciente)) {

    $Familiograma_Fami_Eco = $RowPaciente['Familiograma_Archivo'];
}
$DisplayFamiliograma = "";
if($Familiograma_Fami_Eco==""){
    $Familiograma_Fami_Eco="data:image/svg+xml;base64,";
    $DisplayFamiliograma = "display:none;";
}
?>

<div class="form-group col-md-12" style="text-align: -webkit-center;">
<img id="MapaConceptual_Familiograma" class="nocargarimagenpredeterminada" onclick='DiagramEditor.editElement(this);'  src="<?=$Familiograma_Fami_Eco;?>" style="cursor:pointer;<?=$DisplayFamiliograma;?>">
</div>
<br>
<div class="form-group col-md-12" style="text-align: -webkit-center;">
<button type="button" class="btn btn-block btn-primary" style="width: 90%; display: inline-block;" onclick="agregarFamiliograma()"> Agregar/Modificar Familiograma </button>
<button type="button" class="btn btn-block btn-danger" style="width: 10%; width: 10%; float: right; height: 34px; margin-top: 0;"onclick="LimpiarFamiliograma()"> <i class="fa fa-trash"></i></button>
</div>

<input id="familiograma_xml" name="familiograma_xml" type="hidden">
<div class="form-group col-md-12" style="text-align: -webkit-center;">
<br>
</div>

<div class="form-group col-md-12" style="text-align: -webkit-center;">
<button type="button" class="btn btn-block btn-primary" onclick="agregarEcomapaDuplicado()"> Agregar Datos a Ecomapa </button>
</div>

<script>
     function agregarFamiliograma() {
      // Obtener referencia a la imagen
      const familiogramaImg = document.getElementById('MapaConceptual_Familiograma');

      // Ejecutar el evento onclick directamente
      if (familiogramaImg.onclick) {
        familiogramaImg.onclick();
        familiogramaImg.style.display = 'block';
      }
    }

    function LimpiarFamiliograma(){
      
      Swal.fire({
                    title: 'Familiograma', 
                    text: 'Desea limpiar el Familiograma ?',
                    icon: 'danger',
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: 'Aceptar',
                    customClass: {
                        container: 'custom-swal-container',
                    },
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {

                        Swal.fire({
                            title: "Familiograma",
                            text: "Se limpio el Familiograma",
                            icon: "success",
                            customClass: {
                                container: 'custom-swal-container',
                            },
                            allowOutsideClick: false, // Evita que el usuario cierre la alerta haciendo clic fuera de ella.
                            allowEscapeKey: false, // Evita que el usuario cierre la alerta presionando la tecla Esc.
                            showConfirmButton: false, // Oculta el botón de confirmación.
                            // Aquí utilizamos el temporizador para hacer el envío del formulario después de 3 segundos.
                            timer: 1500, // 3000 milisegundos (3 segundos).
                        });

                        document.getElementById('MapaConceptual_Familiograma').src = "data:image/svg+xml;base64,";
                        document.getElementById('familiograma_xml').value = "";

                    }
                })

    }

    function agregarEcomapaDuplicado(){

      var familiograma_xml = $('#familiograma_xml').val();
        
      Swal.fire({
                    title: 'Aplicar cambios al ecomapa', 
                    text: 'Desea agregar la estructura del familiograma al Ecomapa ?',
                    icon: 'warning',
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: 'Aplicar',
                    customClass: {
                        container: 'custom-swal-container',
                    },
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {

                        Swal.fire({
                            title: "Ecomapa",
                            text: "Se Actualizo el Ecomapa",
                            icon: "success",
                            customClass: {
                                container: 'custom-swal-container',
                            },
                            allowOutsideClick: false, // Evita que el usuario cierre la alerta haciendo clic fuera de ella.
                            allowEscapeKey: false, // Evita que el usuario cierre la alerta presionando la tecla Esc.
                            showConfirmButton: false, // Oculta el botón de confirmación.

                            // Aquí utilizamos el temporizador para hacer el envío del formulario después de 3 segundos.
                            timer: 1000, // 3000 milisegundos (3 segundos).
                            timerProgressBar: true, // Muestra una barra de progreso durante el temporizador.
                        }).then(() => {

                            document.getElementById('MapaConceptual_Ecomapa').src = familiograma_xml;
                            document.getElementById('MapaConceptual_Ecomapa').style.display = 'block';
                        });
                    }
                })
    }

</script>

<script>
    // Obtener referencias a la imagen y al input
    const familiogramaImg = document.getElementById('MapaConceptual_Familiograma');
    const familiogramaXmlInput = document.getElementById('familiograma_xml');

    // Agregar un event listener para el cambio de src en la imagen
    familiogramaImg.addEventListener('load', function() {
      // Actualizar el valor del input con el nuevo src
      familiogramaXmlInput.value = familiogramaImg.src;
    });
</script>



