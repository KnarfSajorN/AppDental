<style>
    .TablaDetalle > tbody > tr > td {
        vertical-align: middle;
    }
</style>
<style>
.input-group {
  position: relative;
}

.icono-input {
  position: absolute;
  left: 10px; /* Ajusta el valor según sea necesario */
  top: 50%;
  transform: translateY(-50%);
}
</style>

<!-- El Modal -->
<div class="modal fade" id="ModalExistenciasSeriales">
    <div class="modal-dialog modal-lg" style="margin-top: 170px;">
        <div class="modal-content">

        <!-- Encabezado del Modal -->
        <div class="modal-header">
            <h5 class="modal-title">Modulo Seriales</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Contenido del Modal -->
        <form onsubmit="GuardarDatosExistenciasSeriales();" id="FormularioExistenciasSerial" method="POST">
        <div class="modal-body row" id="ModalCamposSerialExistencias">

            <div class="form-group col-md-12">
            <div align="left"> Existencias  </div>
            <input type="number" step="1" class="form-control input-lg" id="ExistenciasSeriales"  value="0" min="1"  onchange="AgregarCamposSeriales(this);" readOnly>
            </div>
            
            <div class="form-group col-md-12" id="Div_CamposSeriales">

            </div>

            <input type="hidden" name="DetalleSerialCargar" id="DetalleProducto_Modal" >
            <input type="hidden" name="SinvDep" id="SinvDep_Modal" >
            <input type="hidden" name="caracter_serial" id="caracter_serial_Modal" >
            <input type="hidden" name="usuario_id" id="usuario_id_modal" value="<?php echo $_SESSION['ID'] ?>">
        </div>
        
        <!-- Pie del Modal -->
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger btn-lg rounded-pill shadow" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow" >Guardar</button>
        </div>
        </form>
        
        </div>
    </div>
</div>





<!-- El Modal -->
<div class="modal fade" id="ModalExistenciasRegistradas">
    <div class="modal-dialog modal-lg" style="margin-top: 170px;">
        <div class="modal-content">

        <!-- Encabezado del Modal -->
        <div class="modal-header">
            <h5 class="modal-title">Modulo Seriales Registrados</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        

        <div class="modal-body row" >

            
            <div class="form-group col-md-12" id="Div_CamposSerialesRegistrados">

            </div>

            <input type="hidden" name="DetalleProducto_ModalHistorial" id="DetalleProducto_ModalHistorial" >
        </div>
        
        <!-- Pie del Modal -->
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger btn-lg rounded-pill shadow" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-outline-info btn-lg rounded-pill shadow" onclick="EliminarSerialesRegistrados();" > Eliminar Seriales</button>
        </div>

        
        </div>
    </div>
</div>



<script>
$(document).ready(function () {
    // Busca si existe un elemento con la clase 'FaltaLlenarSerial' es por que falta que llenen el serial del producto
    var faltaLlenarSerialElement = $('.FaltaLlenarSerial');
    if (faltaLlenarSerialElement.length > 0) {
        var nuevoInput = $('<input>', {
            type: 'text',
            class: 'form-control input-lg blur',
            id: 'ValidacionSeriales',
            name: 'ValidacionSeriales',
            placeholder: 'Faltan llenar los seriales en la parte superior',
            value: '',
            'data-readonly_P': true,
            required: true,
        });
        var br = $('<br>');
        // Crea el elemento <i> con la clase proporcionada
        var icono = $('<i>', {
            class: 'fa-solid fa-barcode',
            'aria-hidden': 'true'
        });

        // Crea un elemento <p> con el texto
        var parrafo = $('<p>', {
            style: 'text-align: center;',
            html: 'el icono para rellenar el serial es: '
        });

        // Agrega el icono al párrafo
        parrafo.append(icono);

        var submitButton = $('#<?=$Tabla_id_Formulario;?> :submit');

        if (submitButton.length > 0) {
            submitButton.before([br, nuevoInput, parrafo]);
        } else {
            $('#<?=$Tabla_id_Formulario;?>').append([br, nuevoInput, parrafo]);
        }

    }

});



function ModalModuloSeriales(Detalle_id,SinvDep,caracter_serial,cantidad){
    $('#ModalExistenciasSeriales').modal('show');

    document.getElementById('Div_CamposSeriales').innerHTML = '';
    document.getElementById('ExistenciasSeriales').value = '0';
    $('#SinvDep_Modal').val(SinvDep);
    $('#DetalleProducto_Modal').val(Detalle_id);
    $('#caracter_serial_Modal').val(caracter_serial);
    $('#ExistenciasSeriales').val(cantidad);
    
    $('#ExistenciasSeriales').trigger('change');

}

function AgregarCamposSeriales(valor){
    var ValorExistencias = valor.value;

    var SinvDep = $('#SinvDep_Modal').val();

    $.ajax({
    type: "POST",
    url: "IN_AjaxSeriales.php",
    data: {
        SinvDep: SinvDep,
        Tipo_Consulta: "Consultar Seriales Disponibles"
    },
    success: function(response) {
        var Arreglo = JSON.parse(response);
        //console.log(Arreglo);
    
         // Construir las opciones para el select
         var options = ['<option value="">Seleccione</option>']; // Agregar la opción "Seleccione" al principio

         options = options.concat(Arreglo.map(function (item) {
            return '<option value="' + item.id + '">' + item.Serial + '</option>';
        }));

        // Asignar las opciones al select
        $('.campo-serial').html(options.join(''));
    }
    });

    var Caracter = $('#caracter_serial_Modal').val();

    var Campos = "";
    for (let index = 1; index <= ValorExistencias; index++) {
        
        Campos += `
        <div class="col-md-12">
            <div align="left"> Serial - #`+index+`</div>
            <div class="input-group mb-3">
                
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">`+Caracter+`</span>
                </div>
                <select class="form-control input-lg campo-serial" name="ArregloExistencias[`+index+`]"  onchange="verificarCampo(this)" required >
                    
                </select>
                <br>
            </div>
        </div>
        `;

    }

    document.getElementById('Div_CamposSeriales').innerHTML = Campos;
}

function GuardarDatosExistenciasSeriales(){
    event.preventDefault(); 
    var formData = $('#FormularioExistenciasSerial').serialize();

    $.ajax({
    type: "POST",
    url: "IN_AjaxSeriales.php",
    data: {
        formulario: formData,
        Tipo_Consulta: "Agregar Seriales Producto Simple" 
    },
    success: function(response) {
        var Arreglo = JSON.parse(response);
        if(Arreglo.Estado == true){
            Swal.fire(
            'Guardado!',
            '¡El Serial ya se Guardo Correctamente!',
            'success'
            );

            window.location.reload();
        }else{
            Swal.fire(
            'Error!',
            '¡Error al Cargar los Seriales!',
            'error'
            );

            window.location.reload();
        }
    }
    });

}



function BuscarSerialRegistradoDetalles(campo) {

    var serial = $(campo).find('option:selected').text();

    var Detalle_id = $('#DetalleProducto_Modal').val();
    //console.log(campo);
    var Sinvdep = document.getElementById('SinvDep_Modal').value;
    
    $.ajax({
        type: "POST",
        url: "IN_AjaxSeriales.php",
        data: {
            serial: serial,
            Detalle_id: Detalle_id,
            Sinvdep: Sinvdep,
            Tipo_Consulta: "Buscar Serial Registrado Detalles Producto Simple"
        },
        success: function(response) {
            
            var Arreglo = JSON.parse(response);
            if(Arreglo.Estado == "Existe"){
                var Mensaje = Arreglo.Mensaje;
                campo.value = "";
                Swal.fire(
            'Duplicado!',
            Mensaje,
            'warning'
            );

            }
            
        }

    })
}


function verificarCampo(campoActual) {
    // Envuelve campoActual en jQuery para utilizar la función val()
    const valorActual =  $(campoActual).find('option:selected').text();

    // Verifica la longitud del campo
    if (valorActual.length !== 20) {
        alert('¡El campo debe tener 20 dígitos! Se borrará el campo.');
        $(campoActual).val(''); // Borra el campo si la longitud no es 20
        return;
    }

    // Verifica duplicados
    $('.campo-serial').not(campoActual).each(function() {
        if ($(this).find('option:selected').text() === valorActual) {
            //alert('¡El serial ya existe en otro campo!');
            Swal.fire(
            'Duplicado!',
            '¡El serial ya existe en otro campo! '+$(this).find('option:selected').text(),
            'warning'
            );
            $(campoActual).val(''); // Borra el campo si hay duplicados
            return false; // Detiene el bucle cuando se encuentra un duplicado
        }

        
    });

    BuscarSerialRegistradoDetalles(campoActual);
}



















function ModalModuloHistorialExistencias(Detalle_id,caracter_serial){
    $('#ModalExistenciasRegistradas').modal('show');

    document.getElementById('Div_CamposSerialesRegistrados').innerHTML = '';

    $('#DetalleProducto_ModalHistorial').val(Detalle_id);

    $.ajax({
        type: "POST",
        url: "IN_AjaxSeriales.php",
        data: {
            Detalle_id: Detalle_id,
            Tipo_Consulta: "Obtener Seriales Registrados Detalles"
        },
        success: function(response) {
            var Seriales = JSON.parse(response);
            var Campos = "";

            var serialArray = Object.values(Seriales);

            serialArray.forEach((value, index) => {
                Campos += `
                <div class="col-md-12">
                    <div align="left"> Serial - #${index + 1}</div>
                    <div class="input-group mb-3">
                        
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">${caracter_serial}</span>
                        </div>
                        <input type="text" class="form-control input-lg " value="${value}" readonly>
                        <br>
                    </div>
                </div>`;
            });

            document.getElementById('Div_CamposSerialesRegistrados').innerHTML = Campos;

        }

    })

}

function EliminarSerialesRegistrados(){

    var Detalle_id = $('#DetalleProducto_ModalHistorial').val();

    $.ajax({
        type: "POST",
        url: "IN_AjaxSeriales.php",
        data: {
            Detalle_id: Detalle_id,
            Tipo_Consulta: "Eliminar Seriales Detalles"
        },
        success: function(response) {
            
            var Arreglo = JSON.parse(response);
            if(Arreglo.Estado == true){
                Swal.fire(
                'Guardado!',
                '¡Los Seriales se Eliminaron Correctamente!',
                'success'
                );

                window.location.reload();
            }else{
                Swal.fire(
                'Error!',
                '¡Error al Eliminar los Seriales!',
                'error'
                );

                window.location.reload();
            }

        }

    })

}
</script>
<script>
/* no quitar sirve para la validacion de los seriales*/
/* no quitar sirve para la validacion de los seriales*/
/* no quitar sirve para la validacion de los seriales*/
$(document).on('focus', ".blur", function() {
    $(this).blur();
});
/* no quitar sirve para la validacion de los seriales*/
/* no quitar sirve para la validacion de los seriales*/
/* no quitar sirve para la validacion de los seriales*/
</script>

