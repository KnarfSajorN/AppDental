<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="modal fade" id="modalHeaderPacientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pacientes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="col-md-12">
            <label>Seleccionar paciente en atención</label>
            <select onchange="pacienteSesion(this.value)" class="select2 form-control multiple" multiple style="width:100%">
                <option value="">Seleccione</option>
                <?php 
                $ID = $_SESSION['ID'];
                    $queryC = mysqli_query($conn3, "SELECT nombre_cliente, cliente_id FROM cliente WHERE activo=1 AND (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}') ORDER BY nombre_cliente ASC");
                    
                    foreach ($queryC as $clientes) {
                        echo "<option value='".$clientes['cliente_id']."'>".$clientes['nombre_cliente']."</option>";
                    }
                    
                ?>
            </select>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>

    function pacienteSesion(cI) {
        if (cI != '') {
            $.ajax({
                url: 'Ajax_Set_Session_CI.php',
                type: 'POST',
                data: {
                    cI,
                    userId : '<?= $_SESSION['ID'] ?>',
                    tipo : "Ingreso"
                },
                success: function(response) {
                    var dataJson = JSON.parse(response);
                    console.log(dataJson);
                    if (dataJson.status == 'success') {
                        location.reload()
                    }else{
                    }
                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Manejar errores aquí
                    console.error('Error en la solicitud AJAX:', errorThrown);
                }
            });

        }
    }

    function cerrarAtencion(idAtencion) {
        // alert(idAtencion);
        $.ajax({
            url: 'Ajax_Set_Session_CI.php',
            type: 'POST',
            data: {
                idAtencion,
                tipo : "Salida"
            },
            success: function(response) {
                var dataJson = JSON.parse(response);
                
                if (dataJson.status == 'success') {
                    location.reload()
                }else{
                  console.log(dataJson);
                }

                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Manejar errores aquí
                console.error('Error en la solicitud AJAX:', errorThrown);
            }
        });

    }

</script>