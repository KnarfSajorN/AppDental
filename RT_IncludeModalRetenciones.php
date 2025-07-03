<script>
function ModalRetenciones(){
    $('#ModalRetenciones').modal('show');
}

function ModalRetencionesCerrar(){
    $('#ModalRetenciones').modal('hide');
}

function CargarValorRetencion() {
      var selectElement = document.getElementById('TipoRetencion'); 
      var selectedOption = selectElement.options[selectElement.selectedIndex];
      var PorcentajeRetencion = selectedOption.getAttribute('data-valor');
      if(PorcentajeRetencion=="" || PorcentajeRetencion==null){
        PorcentajeRetencion = "0";
      }
      var tipoRetencion = selectedOption.getAttribute('data-tipo');

      if(tipoRetencion == "1"){
        //aplicar el PorcentajeRetencion a el id TotalSinImpuestoModal y guardarlo en una variable total
        var totalSinImpuestoModal = parseFloat(document.getElementById('TotalSinImpuestoModal').value);
        var total = ((totalSinImpuestoModal * PorcentajeRetencion) / 100 );
        
        //poner display block desde jquery
        $('#Modal_TotalSinImpuestos').css('display', 'block');
        $('#Modal_TotalImpuestos').css('display', 'none');
      }

      if(tipoRetencion == "2"){
        //aplicar el PorcentajeRetencion a el id TotalImpuestoModal y guardarlo en una variable total
        var TotalImpuesto = parseFloat(document.getElementById('TotalImpuestoModal').value);
        var total = ((TotalImpuesto * PorcentajeRetencion) / 100 );

        //poner display block desde jquery
        $('#Modal_TotalSinImpuestos').css('display', 'none');
        $('#Modal_TotalImpuestos').css('display', 'block');

      }
    
       // Redondear el resultado a dos decimales si es un número decimal
        if (total % 1 !== 0) {
            total = total.toFixed(2);
        }
        
      var campoFinal = document.getElementById('MontoRetencionModal');
      campoFinal.value = total;
}

function EliminarRetencion(valor){

    $.ajax({
      type: "POST",
      url: "RT_Retencion_Ajax.php",
      data: {
        valor: valor,
        Tipo_Consulta: "Eliminar Retencion"
      },
      success: function(response) {
        window.location.reload();
      }
    });

}
</script>

<style>
    /* para aplicar la misma funcion de un readonly, ya que si hay readonly y required no funcionan los dos */
    input[data-readonly_PR] {
        pointer-events: none;
        background-color: #eee;
        opacity: 1;
    }
</style>


 <!-- Modal -->
 <div class="modal fade" id="ModalRetenciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Formulario de Retención</h5>
          <button type="button" class="btn-close" onclick="ModalRetencionesCerrar()" aria-label="Cerrar">X</button>
        </div>
        <div class="modal-body">
          <!-- Formulario dentro del modal -->
          <form action="RT_CompraGuardarRetencion.php" method="POST">
            

            <div class="mb-3">
              <label for="TipoRetencion" class="form-label">Tipo de Retención:</label><br>
              <select class="form-control select2" id="TipoRetencion" name="TipoRetencion" style="width:100%" onchange="CargarValorRetencion();"required>
                <option value="">Seleccione</option>
                <?php
                $QueryRetencion = mysqli_query($conn3, "SELECT * FROM Retenciones WHERE  Activo = '1'");
                while ($RowRetencion = mysqli_fetch_array($QueryRetencion)) {

                    $Retencion_id = $RowRetencion['id'];
                    $Nombre = $RowRetencion['Nombre'];
                    $Porcentaje = $RowRetencion['Porcentaje'];
                    $Tipo = $RowRetencion['Tipo'];
                    echo "<option value='$Retencion_id' data-valor='$Porcentaje' data-tipo='$Tipo' >$Nombre | %{$Porcentaje}</option>";

                }
                ?>
              </select>
            </div>

            <div class="mb-3" id="Modal_TotalSinImpuestos" style="display:none;">
              <label for="inputDescripcion" class="form-label">Total Sin Impuestos:</label>
              <input type="number" class="form-control" id="TotalSinImpuestoModal" name="" value="<?=$ValorBaseParaRetencion_ModalInclude;?>" step="0.01" readOnly>
            </div>

            <div class="mb-3" id="Modal_TotalImpuestos" style="display:none;">
              <label for="inputDescripcion" class="form-label">Impuestos:</label>
              <input type="number" class="form-control" id="TotalImpuestoModal" name="" value="<?=$ValorImpuestoParaRetencion_ModalInclude;?>" step="0.01" readOnly>
            </div>

            <div class="mb-3">
              <label for="MontoRetencion" class="form-label">Monto:</label>
              <input type="number" class="form-control blurreten" id="MontoRetencionModal" name="MontoRetencion" required min="0" step="0.01" required data-readonly_PR>
            </div>

            <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
            <input type="hidden" name="ID_Empresa" value="<?php echo $Empresa_Id_ModalInclude; ?>">

            <div class="modal-footer">
              <button type="button" class="btn btn-outline-danger btn-lg rounded-pill shadow" onclick="ModalRetencionesCerrar()">Cerrar</button>
              <button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow">Guardar</button>
            </div>
          </form>

          <div class="mb-3">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Retencion</th>
                                                    <th scope="col">Porcentaje</th>
                                                    <th scope="col">Valor</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $QueryRetenciones = mysqli_query($conn3, "SELECT * FROM  DetalleRetenciones WHERE Activo='1' AND ID_Empresa = '$Empresa_Id_ModalInclude' AND usuario_id = '$_SESSION[ID]' ");
                                                while ($RowRetenciones = mysqli_fetch_array($QueryRetenciones)) {
                                                    //$contador++;
                                                    $id = $RowRetenciones['id'];
                                                    $Nombre = funcionMaster($RowRetenciones['TipoRetencion'],'id','Nombre','Retenciones');
                                                    $MontoRetencion= $RowRetenciones['MontoRetencion'];
                                                    $Porcentaje_Retencion = funcionMaster($RowRetenciones['TipoRetencion'],'id','Porcentaje','Retenciones');

                                                    $ruta = htmlentities($_SERVER['PHP_SELF']);
                                                    $ruta = str_replace('.php', '', $ruta);
                                                    echo "<tr><th scope='row' width='2%'>{$id}</th>
                                                    <td width='20%' align='center'>{$Nombre}</td>
                                                    <td width='20%' align='center'>{$Porcentaje_Retencion}</td>
                                                    <td width='20%' align='center'>{$MontoRetencion}</td>"
                                                    ;

                                                    echo "<td width='20%' align='center'>
                                                    <font> <a onclick='EliminarRetencion({$id})' class='btn btn-block btn-outline-danger btn-lg rounded-pill shadow' style='width: 100%;margin-top:5px;margin-bottom:5px'> <i class='fa fa-close' title='Eliminar'> Eliminar</i></a></font><br>
                                                    
                                                    </td></tr>";
                                                }

                                                ?>
                                            </tbody>
                                        </table>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
        $(document).on('focus', ".blurreten", function() {
            $(this).blur();
        });
    </script>