
<!-- para facturar a terceros o auxiliares -->
<!-- modal para totalizar factura -->
<div id="auxiliarModal" class="modal fade" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="my-modal-title">Totalizar Factura</h5>
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-4">
            <div class="form-group">
              <label for="facturarA">Facturar a:</label><br>
              <select name="facturarA" id="facturarA" class="form-control input-lg w-100" onchange="cambiarOpciones()">
                <option value="0">Paciente: <?php echo $nombre_cliente ?></option>
                <option value="1">Tercero - registrado en el sistema</option>
                <option value="2">Tercero - no registrado en el sistema</option>
              </select>
            </div>
          </div>
          <div class="col-8">
            <!-- 3 opciones -->
            <div class="d-none estosSon" id="facturarA_0">
              <!-- mismo paciente -->
              <input type="hidden" name="datos[idClienteFac]" id="idClienteFac" value="<?= $clienteId ?>">
              <label for="facturarA">Paciente</label><br>
              <p><strong>Nombre:</strong><br> <?= $nombre_cliente ?></p>
              <p><strong>Documento:</strong><br> <?= $CODI_CLIENTE ?></p>
            </div>

            <div class="d-none estosSon" id="facturarA_1">
              <!-- Tercero - registrado en el sistema -->
              <div class="form-group">
                <label for="idClienteFac">Paciente</label><br>
                <select name="datos[idClienteFac]" id="idClienteFac" class="form-control input-lg w-100 select2">
                  <?php
                  $queryPacientes = "SELECT * from cliente;";
                  $resultadoPacientes = mysqli_query($conn3, $queryPacientes);
                  while ($rowPacientes = mysqli_fetch_array($resultadoPacientes)) {
                    echo "<option value='" . $rowPacientes['cliente_id'] . "'>" . $rowPacientes['nombre_cliente'] . " | " . $rowPacientes['CODI_CLIENTE'] . "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="d-none estosSon" id="facturarA_2">
              <!-- Tercero - no registrado en el sistema -->
              <div class="row">
                <input type="hidden" name="datos[idClienteFac]" id="idClienteFac" value="0">
                <div class="form-group col-md-6" bis_skin_checked="1">
                  <label for="">Nombre Completo</label>
                  <input type="text" name="datos[nombre_cliente]" class="form-control input-lg" required="" placeholder="Nombre Completo">
                </div>
                <div class="form-group col-md-6" bis_skin_checked="1">
                  <label for="">Documento</label>
                  <input type="number" name="datos[CODI_CLIENTE]" class="form-control input-lg" required="" placeholder="Documento">
                </div>
                <div class="form-group col-md-6" bis_skin_checked="1">
                  <label for="">Teléfono</label>
                  <input type="number" name="datos[whatsapp]" class="form-control input-lg" required="" placeholder="Teléfono">
                </div>
                <div class="form-group col-md-6" bis_skin_checked="1">
                  <label for="">Correo</label>
                  <input type="mail" name="datos[correo_cliente]" class="form-control input-lg" required="" placeholder="Correo">
                </div>

                <div class="form-group col-md-6" bis_skin_checked="1">
                  <label for="">Dirección</label>
                  <input type="text" name="datos[direccion_cliente]" class="form-control input-lg" required="" placeholder="Dirección">
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger rounded-pill" id="totalizarFacturaModal">
          <i class="fas fa-dollar-sign mr-1"></i>
          Totalizar Factura
        </button>
      </div>
    </div>
  </div>
</div>
<!-- modal para totalizar factura -->
<script>
  $(document).ready(function() {
    let seProcesa = 0;
    let registroAuxiliar = 1; // recibe 1 para datos auxiliar o 0 para normal
    // si registroauxiliar es 0 significa que se procesa de forma normal y no pasa nada
    // de lo contrario mostrar  auxiliarModal para verificar datos 
    if (registroAuxiliar == 0) {
      // no pasa se deja todo originalongo
    } else if (registroAuxiliar == 1) {
      // primero prevenimos que el formulario de envie
      $('#totalizarFactura').submit(function(e) {
        if (seProcesa == 1) {
          // todo bien
        } else {
          e.preventDefault();

          // ahora se muestra el modal
          $('#auxiliarModal').modal('show');
          cambiarOpciones();

          // esperar el click al boton totalizarFacturaModal
          $('#totalizarFacturaModal').click(function() {
            let pasa = 1;
            // verificar en que posicion se encuentra el select
            let valor = $('#facturarA').val();
            if (valor == 2) {
              // todos los datos deben estar llenos
              let nombreCliente = document.querySelector('input[name="datos[nombre_cliente]"]').value;
              let CODI_CLIENTE = document.querySelector('input[name="datos[CODI_CLIENTE]"]').value;
              let whatsapp = document.querySelector('input[name="datos[whatsapp]"]').value;
              let correo_cliente = document.querySelector('input[name="datos[correo_cliente]"]').value;
              let direccion_cliente = document.querySelector('input[name="datos[direccion_cliente]"]').value;
              if (nombreCliente == '' || CODI_CLIENTE == '' || whatsapp == '' || correo_cliente == '' || direccion_cliente == '') {
                // no se procesa   
                alert('Debe llenar todos los campos');
                pasa = 0;
              } else {
                pasa = 1;
              }
            }

            if (pasa == 1) {
              // copiamos todo lo que esta dentro del div facturarA_2
              let copiar = document.querySelector('#facturarA_' + valor);
              // creamos un nuevo div dentro de facturarA
              let nuevo = document.createElement('div');
              nuevo.setAttribute('class', 'd-none');
              $('#totalizarFactura').append(nuevo);
              // se pega dentro del nuevo
              nuevo.appendChild(copiar);
              seProcesa = 1;
              setTimeout(() => {                
                $('#totalizarFactura').submit();
              }, 100);
            }

          })

        }

      })
    }
  })

  function cambiarOpciones() {
    let valor = $('#facturarA').val();
    let divs = document.getElementsByClassName('estosSon');
    for (let i = 0; i < divs.length; i++) {
      console.log(divs[i].id);
      if (divs[i].id == 'facturarA_' + valor) {
        // quitar clase d-none
        divs[i].classList.remove('d-none');
      } else {
        divs[i].classList.add('d-none');
      }
    }
  }
</script>

<!-- para facturar a terceros o auxiliares - fin -->