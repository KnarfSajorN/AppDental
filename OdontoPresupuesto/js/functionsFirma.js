function EnviarAFirmarCliente(detalle_id) {

    Swal.fire({
        title: 'Enviar Detalle a Firmar - ' + Paciente_Nombre,
        html: '<label for="whatsapp_enviar">Whatsapp:</label><br>' +
            '<input id="whatsapp_enviar"  type="number" class="form-control" placeholder="Escribe aquí el numero Whatsapp a enviar el detalle a firmar" style="width:100%;" value="' + Paciente_Whatsapp +
            '<label for="correo_enviar">Correo:</label><br>' +
            '<input id="correo_enviar"  type="email" class="form-control" placeholder="Escribe aquí el email a enviar el detalle a firmar" style="width:100%;" value="'+Paciente_Correo+'">' +
            '<input id="detalle_odontograma_id" type="hidden" value="' + detalle_id + '">' +
            '<input id="cliente_id" type="hidden" value="' + cliente_id,
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Enviar Mensaje',
        cancelButtonText: 'Descartar',
        focusConfirm: false,
        customClass: {
            popup: 'Swal_Enviar_Firma'
        },
        preConfirm: () => {
            const whatsapp_enviar = Swal.getPopup().querySelector('#whatsapp_enviar').value;
            const correo_enviar = Swal.getPopup().querySelector('#correo_enviar').value;
            const detalle_odontograma_id = Swal.getPopup().querySelector('#detalle_odontograma_id').value;
            const cliente_id = Swal.getPopup().querySelector('#cliente_id').value;

            if (!whatsapp_enviar && !correo_enviar) {
                Swal.showValidationMessage(`Completa alguno de los dos campos`);
            }
            return {
                whatsapp_enviar: whatsapp_enviar,
                correo_enviar: correo_enviar,
                detalle_odontograma_id: detalle_odontograma_id,
                cliente_id: cliente_id
            }
        },
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "OD_Ajax.php",
                data: {
                    Tipo_Consulta: "Enviar Firmar Cliente",
                    Resultados: result.value,
                }
            }).done(function(response) {
                console.log(response);
                var responsen = JSON.parse(response);
                if (response != "") {
                    Swal.fire(
                        responsen.Estado,
                    )
                } else {
                    Swal.fire(
                        'Error!',
                    )
                }
            });

        }
    })

}

function VerFirmaCliente(detalle_id) {

    var Detalle_id = detalle_id;

    Swal.fire({
        title: 'Firma',
        //html: '<div class="accordion" id="CitasAccordion"></div>',
        html: '<div class="container" id="Div_Firma" style="width:100%;"><div>',
        showCloseButton: true,
        showConfirmButton: false,
        width: '40%',
        didOpen: function() {
            var accordion = $('#Div_Firma');
            $.ajax({
                url: 'OD_Ajax.php',
                type: 'POST',
                data: {
                    Tipo_Consulta: "Buscar Firma",
                    Detalle_id: Detalle_id,
                },
                success: function(data) {
                    var data = JSON.parse(data);

                    html = `<div class="row">
                                    <div class="col-md-12">
                                        <img src="${data.Firma}">
                                    </div>
                                    <div class="col-md-12">
                                        <br><label><u>Fecha y Hora</u> : ${data.Fecha} - ${data.Hora}</label> <hr>
                                        <label><u>Nombres y Apellidos</u> : ${data.Firma_Nombre}</label> <br>
                                        <label><u>Numero Documento</u> : ${data.Firma_Documento}</label> <br>
                                    </div>
                                </div>`;
                    accordion.append(html);

                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
}