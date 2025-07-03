
<script>

    function ModalModuloContabilidadDevolucion(){
        $('#ModalContabilidadDevolucion').modal('show');
    }

    function GuardarDatosContabilidad(){
        event.preventDefault(); // Detiene el envío predeterminado del formulario

        var formularioPrincipal = document.getElementById('FormularioDevolucion');
        
        var idCuentaContableDevolucion = $('#idCuentaContableDevolucion').val();
        var idCentroCosto = $('#idCentroCosto').val();
        
        var nuevoDiv = document.createElement('div');

        var nuevoCampo = document.createElement('input');
        nuevoCampo.type = 'hidden';
        nuevoCampo.name = "idCuentaContableDevolucion";
        nuevoCampo.value = idCuentaContableDevolucion;
        nuevoDiv.appendChild(nuevoCampo);

        var nuevoCampo1 = document.createElement('input');
        nuevoCampo1.type = 'hidden';
        nuevoCampo1.name = "idCentroCosto";
        nuevoCampo1.value = idCentroCosto;
        nuevoDiv.appendChild(nuevoCampo1);

        formularioPrincipal.appendChild(nuevoDiv);
        //formularioPrincipal.innerHTML=nuevoDiv.outerHTML;

        document.getElementById('FormularioDevolucion').submit();
    

    }
</script>

<!-- El Modal -->
<div class="modal fade" id="ModalContabilidadDevolucion">
  <div class="modal-dialog modal-lg" style="margin-top: 170px;">
    <div class="modal-content">
    
      <!-- Encabezado del Modal -->
      <div class="modal-header">
        <h5 class="modal-title">Modulo Contabilidad</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Contenido del Modal -->
      <form onsubmit="GuardarDatosContabilidad();">
      <div class="modal-body row">
        
        

        <div class="form-group col-md-12" id="Div_CuentaContableCXC">
            <label style="width:100%;">Cuenta Contable [Cuenta por Cobrar/Pagar]</label>
            <select class="input-lg form-control select2" name="Arreglo[idCuentaContableDevolucion]" id="idCuentaContableDevolucion" style="width:100%;" required>
                <option value="" selected>Seleccione</option>
                <?php
                $queryList = mysqli_query($conn3, "SELECT * FROM CCuentas WHERE activo = 1 order by id ASC");
                $nrowl = mysqli_num_rows($queryList);
                while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                    $idC = $row_recordset32['id'];
                    $descripcionC = utf8_encode($row_recordset32['descripcion']);
                    $detalleC = $row_recordset32['detalle'];

                    if($idC==$IdOperacion_CuentaContableDevolucion){
                      echo "<option value='$idC' selected>$idC | $descripcionC  </option>";
                    }else{
                        echo "<option value='$idC'>$idC | $descripcionC  </option>";
                    }

                }
                ?>
            </select>
            <label>*Viene pre seleccionada la cuenta por cobrar/pagar seleccionada en la factura/compra*</label>
        </div>
        
        <div class="form-group col-md-12">
            <label style="width:100%" >Centro de Costo</label>
            <select class="input-lg form-control select2" name="Arreglo[idCentroCosto]" id="idCentroCosto"  style="width:100%" required>
              <option value="0" selected>Sin Centro de Costo</option>
                <?php
                $queryList = mysqli_query($conn3, "SELECT * FROM CcentroCostos WHERE estado = 1 order by id ASC");
                $nrowl = mysqli_num_rows($queryList);
                while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                    $idC = $row_recordset32['id'];
                    $descripcionC = utf8_encode($row_recordset32['descripcion']);
                    echo "<option value='$idC'> $descripcionC  </option>";
                }
                ?>
            </select>
        </div>


      </div>
      
      <!-- Pie del Modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-block btn-outline-danger rounded-pill" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-block btn-outline-success rounded-pill" >Guardar</button>
      </div>
    </form>
      
    </div>
  </div>
</div>
