<div id="modalEvolucionOdontograma" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalHeaderEvolucion"> <i class="fas fa-notes-medical"></i> Nota de evolucion</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                
                <input type="hidden" id="dienteId" value="0">    
                <input type="hidden" id="procedimientoId" value="0">    

                <div class="col-md-12 row">
                    <div class="form-group col-md-12">
                        <label>Nota de Evolución</label>
                        <textarea id="motivoConsulta" name="motivoConsulta" class="textarea" placeholder="Nota de Evolución" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>

                    <label>Imagenes (opcional)</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"> <i class="fas fa-file-lines"></i> </span>
                        <input type="file" id="files_evolucion" accept="image/*" multiple name="files_evolucion[]" class="form-control">
                    </div>

                    <div id="preview-container" class="my-1"></div>

                    <div class="col-md-12 my-1">
                        <button class="btn rounded-pill btn-outline-info btn-md" id="btnAgregarEvolucionOD" onclick="guardarEvolucion()"> <i class="fas fa-save"></i> Guardar Evolucion</button>

                    </div>
                    
                    <div id="list-evoluciones-odontograma" class="col-md-12"></div>
                    
                    
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn rounded-pill btn-outline-danger" data-dismiss="modal"> <i class="fas fa-xmark"></i> Cerrar</button>
            </div>
        </div>

    </div>
</div>


<script>

    const mostrarModalEvolucion = (procedimiento, dienteId) => {
        
        
        let usuario_id = document.getElementById("usuario_id").value;
        let cliente_id = document.getElementById("cliente_id").value;
        let html = "";
        
        $.ajax({
            type: "POST",
            url: "ODP_Ajax.php",
            data: {
                Tipo_Consulta: "Consultar_Evoluciones",
                dienteId,
                procedimiento,
                usuario_id,
                cliente_id,
                usuarioPrincipal: "<?= $_SESSION["ID_principal"] ?>"
            },
            success: function (response) {
                console.log("Modal evolucion " , response);
                const res = JSON.parse(response);
                const { data } = res;

                if (!data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al obtener evoluciones',
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    });

                    // return;
                }

                html += `<table class="table">
                            <thead>
                                <tr>
                                    <th style="70%">Evolucion</th>
                                    <th style="30%">Imagenes</th>
                                </tr>
                            </thead>
                            <tbody>`;


                console.log("Iterando ", data);
                
                data.forEach((evolucion, index) => {


                    let imagenes = evolucion.imagenes;
                    let nota = evolucion.nota_evolucion;

                    if (!imagenes) {
                        imagenes = [];
                    }

                    let carrousel = `<div class="col-md-12">`; 
                    imagenes.forEach(imagen => {
                        const rutaImagen = imagen.ruta;
                        carrousel += `  <div class="item active preview-item">
                                            <img src="${rutaImagen}" alt="Los Angeles">
                                        </div>`;
                    });

                    carrousel += `</div>`;


                    html += `<tr>
                                <td style="70%">${nota}</td>
                                <td style="30%">${carrousel}</td>
                            </tr>`;
                })
                
                html += `</tbody></table>`;

                $("#list-evoluciones-odontograma").html(html);

                $('#modalEvolucionOdontograma').modal('show');
                $('#modalPieza').modal('hide');
                $('#modalEvolucionOdontograma #dienteId').val(dienteId);
                $('#modalEvolucionOdontograma #procedimientoId').val(procedimiento);

                
            }
        });



    }
    
    const resetModalEvolucion = () => {
        $('#modalEvolucionOdontograma #dienteId').val("0");
        $('#modalEvolucionOdontograma #procedimientoId').val("0");
        document.getElementById("motivoConsulta").value = "";
        document.getElementById("files_evolucion").value = "";
        document.getElementById("preview-container").innerHTML = "";
    }



    const guardarEvolucion = () => {
        $("#btnAgregarEvolucionOD").prop("disabled", true);
        $("#btnAgregarEvolucionOD").html(`  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            <span class="sr-only">Guardando...</span>`);

        let formData = new FormData();
        const dienteId = $('#modalEvolucionOdontograma #dienteId').val();
        const procedimientoId = $('#modalEvolucionOdontograma #procedimientoId').val();
        const nota = $('#modalEvolucionOdontograma #motivoConsulta').val();
        const usuario_id = document.getElementById("usuario_id").value;
        const cliente_id = document.getElementById("cliente_id").value;

        let files = document.getElementById("files_evolucion").files;
        
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            formData.append("files_evolucion[]", file);
        }

        formData.append("dienteId", dienteId);
        formData.append("procedimientoId", procedimientoId);
        formData.append("nota", nota);
        formData.append("usuario_id", usuario_id);
        formData.append("cliente_id", cliente_id);
        formData.append("usuario_principal_id", "<?= $_SESSION["ID_principal"] ?>");
        formData.append("Tipo_Consulta", "Guardar_Evoluciones");

        $.ajax({
            url: "ODP_Ajax.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);

                $("#btnAgregarEvolucionOD").prop("disabled", false);
                $("#btnAgregarEvolucionOD").html(`<i class="fas fa-save"></i> Guardar Evolucion`);
                
                const resp = JSON.parse(response);
                const { status } = resp;
                
                Swal.fire({
                    icon: status ? 'success' : 'error',
                    title: status ? 'Correcto' : 'Error',
                    text: status ? resp.data.message : 'Error al guardar',
                })

                if (status) {
                    $('#modalEvolucionOdontograma').modal('hide');
                    resetModalEvolucion();
                }
            }
        });

        
    }


    const fileInput = document.getElementById("files_evolucion");
    const previewContainer = document.getElementById("preview-container");

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
    #preview-container {
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

    /* Ancho del scroll */
    .modal-body::-webkit-scrollbar {
    width: 10px;  /* Ancho del scrollbar vertical */
    }

    /* Fondo del scrollbar */
    .modal-body::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
    }

    /* Color del "thumb" (la parte que se mueve) */
    .modal-body::-webkit-scrollbar-thumb {
    background-color: #D4D4D4;  /* Azul Bootstrap */
    border-radius: 10px;
    border: 2px solid #f1f1f1;  /* Espacio entre el track y el thumb */
    }

    /* Hover en el thumb */
    .modal-body::-webkit-scrollbar-thumb:hover {
    background-color: #D4D4D4;
    }

</style>