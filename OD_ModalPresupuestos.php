<!-- Botón para abrir el modal -->

<!--
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalPresupuestoOdontograma">
  Tratamientos Adjuntados para Presupuestar
</button>
-->

<!-- Modal -->
<div class="modal fade" id="ModalPresupuestoOdontograma">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Cabecera del modal -->
      <div class="modal-header">
        <h4 class="modal-title">Tabla de Procedimientos a Presupuestar</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Cuerpo del modal -->
      <div class="modal-body ">
        <table class="table" id="TablaPresupuesto">
          <thead>
            <tr>
              <th>Acciones</th>
              <th>Fecha - Hora</th>
              <th>Número de diente/cara</th>
              <th>Procedimiento/Servicio[Inventario]</th>
              <th>Valor en Inventario</th>
              <th>Detalle</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include 'funciones/conn3.php';
            $QueryPresupuestoTratamiento = mysqli_query($conn3, "SELECT * FROM OD_Procedimientos_Presupuestar WHERE cliente_id = '$cliente_id'AND usuario_id='$usuario_id' AND inventario_id!=0 AND Activo = 1");
            while ($RowPrespuestoTratamiento = mysqli_fetch_array($QueryPresupuestoTratamiento)) {

              $id = $RowPrespuestoTratamiento["id"];
              $detalle_odontograma_id = $RowPrespuestoTratamiento["detalle_odontograma_id"];

              $inventario_id = $RowPrespuestoTratamiento["inventario_id"];
              $Nombre_Inventario = funcionMaster($inventario_id, 'ID', 'descripcion', 'sinvetrios');


              $Estado = $RowPrespuestoTratamiento["Estado"];

              $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMasterDetalle WHERE id = '$detalle_odontograma_id' LIMIT 1");
              $RowOdontogramaMaster = mysqli_fetch_array($QueryOdontogramaMaster);

              $Numero_Diente = $RowOdontogramaMaster["Numero_Diente"];
              $NombreCara = $RowOdontogramaMaster["NombreCara"];
              $Procedimiento = funcionMaster($RowOdontogramaMaster["Procedimiento"], 'id', 'Nombre', 'OD_Procedimiento');
              $Detalle = $RowOdontogramaMaster["Detalle"];

              $SVG = funcionMaster(funcionMaster($RowOdontogramaMaster["Procedimiento"], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
              $Color = funcionMaster($RowOdontogramaMaster["Procedimiento"], 'id', 'Color', 'OD_Procedimiento');
              $SVG = str_replace('fill="currentColor"', 'fill="' . $Color . '"', $SVG);

              $precio = 0;
              $QueryInventario = mysqli_query($conn3, "SELECT * FROM sinvetrios WHERE ID = '$inventario_id'");
              while ($RowInventario = mysqli_fetch_array($QueryInventario)) {
                $precio = $RowInventario["precio"];
              }

              $Valor = $precio;

              if ($Estado == "0" and $inventario_id != "0") {
                $BotonAdicional = "<button type='button' class='btn btn-success' onclick='AgregarDetallePresupuesto({$id})' title='Agregar Tratamiento al Presupuesto'><i class='fa fa-money'></i> </button>";
              } elseif ($Estado == "1") {
                $BotonAdicional = "<button type='button' class='btn btn-warning'  title='Ya fue agregado el tratamiento'><i class='fa fa-check'></i> </button>";
              } elseif ($Estado == "2") {
                $BotonAdicional = "<button type='button' class='btn btn-info'  title='Este Detalle de tratamiento ya fue presupuestado'><i class='fa fa-check'></i> </button>";
              } 

              echo "<tr>
                    <td width='5%' style='text-align: center;'>
                        {$BotonAdicional}
                    </td>
                    <td width='10%' style='text-align: center;'>
                        " . $RowOdontogramaMaster["Fecha"] . " - " . $RowOdontogramaMaster["Hora"] . "
                    </td>
                    <td width='10%' style='text-align: center;'>
                         # " . $Numero_Diente . " <hr style='margin-top: 5px;margin-bottom: 5px;'> ".$NombreCara."
                    </td>
                    <td width='15%' style='text-align: -webkit-center;'>
                        <div style='width:40px'>
                        " . $SVG . " 
                        </div>
                        Procedimiento: " . $Procedimiento . " <hr style='margin-top: 5px;margin-bottom: 5px;'>
                        Servicio: " . $Nombre_Inventario . "
                    </td>
                    <td width='10%' style='text-align: center;'>
                        " . $Valor . "
                    </td>
                    <td width='15%' style='text-align: center;'>
                        " . $Detalle . "
                    </td>

                    
                    
                </tr>";
            }

            ?>
          </tbody>
        </table>
        <div class="col-md-12">
          <button type='button' class='btn btn-success' title='Agregar Tratamiento al Presupuesto' style='margin-bottom: 5px;'><i class='fa fa-money'></i>  </button> Agregar Procedimiento/Servicio al Presupuesto <br>
          <button type='button' class='btn btn-warning'  title='Ya fue agregado el tratamiento' style='padding-right: 16px;margin-bottom: 5px;'><i class='fa fa-check'></i> </button> Ya fue agregado el Procedimiento/Servicio al Presupuesto<br>
          <button type='button' class='btn btn-info'  title='Este Detalle de tratamiento ya fue presupuestado' style='padding-right: 16px;margin-bottom: 5px;'><i class='fa fa-check'></i>  </button> Este Detalle de Procedimiento/Servicio ya fue presupuestado
        </div>
      </div>

      <!-- Pie del modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<?php

?>

<script>
  $(document).ready(function() {
    $('#ModalPresupuestoOdontograma').on('shown.bs.modal', function() {
      $('#TablaPresupuesto').DataTable().destroy();
      $('#TablaPresupuesto').DataTable({
        responsive: true,
        pageLength: 5,
        lengthMenu: [5, 10, 15],
        language: {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
          "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Entradas",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar:",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
          },
          buttons: {
            pageLength: {
              _: "Mostrando %d <br> Elementos",
              '-1': "Ver Todo"
            }
          }
        },
        order: [
          [1, 'desc']
        ],
      });
    });
  });

  function AgregarDetallePresupuesto(id) {
    var Precio = 0;
    $.ajax({
      type: "POST",
      url: "OD_Ajax_Presupuesto.php",
      data: {
        id: id,
        usuario_id: '<?php echo $_SESSION["ID"]; ?>',
        Tipo_Consulta: "Calcular Precio"
      },
      success: function(response) {
        var Respuesta = JSON.parse(response);
        var Precio = Respuesta.Precio;

        var OpcionesModalSwalDeposito = '<?= $OpcionesModalSwalDeposito; ?>';
        
        Swal.fire({
          title: 'Deposito y Precio del Tratamiento',
          html: '<label for="Deposito_Modal">Deposito</label><br>' +
            '<select id="Deposito_Modal" class=" select2 select2_1 input-lg form-control" style="width:100%">' +
            OpcionesModalSwalDeposito +
            '</select>' +
            '<br>'+
            '<label for="precio_swal">Precio:</label><br>' +
            '<input id="precio_swal"  type="number" class="input-lg form-control" placeholder="12345" style="width:100%;" step="0.01" value="' + Precio + '">' +
            '<input id="id_detalle" type="hidden">',
            
          icon: 'question',
          showCancelButton: true,
          confirmButtonText: 'Guardar',
          cancelButtonText: 'Descartar',
          focusConfirm: false,
          customClass: {
            popup: 'Swal_Editar_Odontograma'
          },
          preConfirm: () => {
            const precio_swal1 = Swal.getPopup().querySelector('#precio_swal').value;
            const id_detalle1 = Swal.getPopup().querySelector('#id_detalle').value;

            const Deposito_Modal = Swal.getPopup().querySelector('#Deposito_Modal').value;

            //console.log(precio_swal1, id_detalle1, Deposito_Modal);
            //Swal.showValidationMessage(`Completa todos los campos`);
            if (precio_swal1=="" || Deposito_Modal == "") {
              Swal.showValidationMessage(`Completa todos los campos`);
            }
            return {
              precio_swal: precio_swal1,
              Deposito_Modal:Deposito_Modal,
              id_detalle: id_detalle1
            }
          },
        }).then((result) => {
          if (result.isConfirmed) {
            //console.log(result.value.precio_swal);
            
            $.ajax({
              type: "POST",
              url: "OD_Ajax_Presupuesto.php",
              data: {
                PresupuestoOdontogramaDetalle_id: id,
                Precio:result.value.precio_swal,
                Deposito_Modal:result.value.Deposito_Modal,
                usuario_id: '<?php echo $_SESSION["ID"]; ?>',
                tipo_detalle: '<?php echo $TipoDetalle_ModalPresupuestos; ?>',
                Tipo_Consulta: "Agregar Detalle Presupuesto"
              },
              success: function(response) {
                //console.log(response);
                location.reload();
              }
            });
            
          }
        })

      }
    });

    
    /*
    $.ajax({
            type: "POST",
            url: "Ajax_Presupuesto.php",
            data: {
                PresupuestoOdontogramaDetalle_id: id,
                usuario_id: '<?php echo $_SESSION["ID"]; ?>',
                Tipo_Consulta: "Agregar Detalle Presupuesto"
            },
            success: function(response) {
                location.reload();
            }
    });
    */
  }
</script>
