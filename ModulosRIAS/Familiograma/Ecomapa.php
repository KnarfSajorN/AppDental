<script src="ModulosRIAS/Familiograma/API/diagram-editor.js"></script>

<?php
$QueryPaciente = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $ClienteFami_Eco");
while ($RowPaciente = mysqli_fetch_array($QueryPaciente)) {

    $Ecomapa_Fami_Eco = $RowPaciente['Ecomapa_Archivo'];
}
$DisplayEcomapa = "";
if($Familiograma_Fami_Eco==""){
    $Familiograma_Fami_Eco="data:image/svg+xml;base64,";
    $DisplayEcomapa = "display:none;";
}
?>


<div class="form-group col-md-12" style="text-align: -webkit-center;">
<img id="MapaConceptual_Ecomapa" class="nocargarimagenpredeterminada" onclick='DiagramEditor.editElement(this);'  src="<?=$Ecomapa_Fami_Eco;?>" style="cursor:pointer;<?=$DisplayEcomapa;?>">
</div>

<div class="form-group col-md-12" style="text-align: -webkit-center;">

<button type="button" class="btn btn-block btn-primary" style="width: 90%;    display: inline-block;" onclick="Ecomapa_Agregar()"> Agregar/Modificar Ecomapa </button>
<button type="button" class="btn btn-block btn-danger" style="width: 10%;    width: 10%; float: right; height: 34px; margin-top: 0;"onclick="LimpiarEcomapa()"> <i class="fa fa-trash"></i></button>

</div>

<input id="ecomapa_xml" name="ecomapa_xml" type="hidden">
<script>



     function Ecomapa_Agregar() {
      // Obtener referencia a la imagen
      const EcomapaImg = document.getElementById('MapaConceptual_Ecomapa');

      // Ejecutar el evento onclick directamente
      if (EcomapaImg.onclick) {
        EcomapaImg.onclick();
        EcomapaImg.style.display = 'block';
      }
    }


    function LimpiarEcomapa(){
      
      Swal.fire({
                    title: 'Ecomapa', 
                    text: 'Desea limpiar el Ecomapa ?',
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
                            title: "Ecomapa",
                            text: "Se limpio el Ecomapa",
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

                        document.getElementById('MapaConceptual_Ecomapa').src = "data:image/svg+xml;base64,";
                        document.getElementById('ecomapa_xml').value = "";

                    }
                })

    }



</script>
<script>
    // Obtener referencias a la imagen y al input
    const EcomapaImg = document.getElementById('MapaConceptual_Ecomapa');
    const EcomapaXmlInput = document.getElementById('ecomapa_xml');

    // Agregar un event listener para el cambio de src en la imagen
    EcomapaImg.addEventListener('load', function() {
      // Actualizar el valor del input con el nuevo src
      EcomapaXmlInput.value = EcomapaImg.src;
    });
</script>




