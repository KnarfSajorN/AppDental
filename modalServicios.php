<div id="servicios-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="servicios-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document" style="padding-top: 50px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="servicios-modal-title">Crear Servicios</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#servicios" method="POST" id="form-servicios">
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <label>Nombre [Servicio]</label>
                        <input type="text" class="form-control input-lg" name="descripcion" placeholder="Nombre" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Color</label>
                        <input type="color" name="Color" class="form-control input-lg" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Tiempo</label>
                        <input type="number" name="Tiempo" class="form-control input-lg" required min="0" value="0">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Precio</label>
                        <input type="number" name="Precio" class="form-control input-lg" required min="0" value="0">
                    </div>
                    <br>
                    <input type="hidden" name="usuario_id" value="<?= $_SESSION['ID']; ?>">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary rounded-pill shadow" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-info rounded-pill shadow">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#form-servicios").on('submit', function(e) {
            e.preventDefault();
            let data = new FormData(this);
            data.append("key", "addServicios");
            $.ajax({
                url: "./ajax_calendar.php",
                data: data,
                type: "POST",
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status) {
                        let values = response.data[0];
                        $("select[name='motivoConsulta']").append(`<option value="${values.id}">${values.descripcion}</option>`).val([values.id]).trigger('change.select2');
                        $("#servicios-modal").modal("hide");
                    }
                }
            });
        });
    });
</script>