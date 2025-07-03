console.log(`Vinculado`);

const obtenerDatosTabla = () => {
    const detalle = [];
    let isValid = true;
    const filasCitasList = $("#citasList tr");
    filasCitasList.each( function() {
        if(!isValid) return;

        const idFila = $(this).attr("id");
        const indice = idFila.replace("filaCitaList", "");

        const pieza_id                  = $(`input[name='datos[${indice}][pieza_id]']`).val();
        const od_presupuesto_detalle_id = $(`input[name='datos[${indice}][od_presupuesto_detalle_id]']`).val();
        const presupuesto_detalle_id    = $(`input[name='datos[${indice}][presupuesto_detalle_id]']`).val();
        const soperacioninv_detalle_id  = $(`input[name='datos[${indice}][soperacioninv_detalle_id]']`).val();
        const cara                      = $(`input[name='datos[${indice}][cara]']`).val();
        const fecha                     = $(`input[name='datos[${indice}][fecha]']`).val();
        const hora                      = $(`input[name='datos[${indice}][hora]']`).val();
        const doctor                    = $(`select[name='datos[${indice}][doctor]']`).val();
        const procedimiento             = $(`select[name='datos[${indice}][procedimiento]']`).val();
        const tipo                      = $(`select[name='datos[${indice}][tipo]']`).val();

        const dataDetalle = {
            cara,
            doctor,
            fecha,
            hora,
            od_presupuesto_detalle_id,
            pieza_id,
            presupuesto_detalle_id,
            procedimiento,
            soperacioninv_detalle_id,
            tipo
        };

        const tieneVacio = Object.values(dataDetalle).some(value => !value);

        if (tieneVacio) isValid = false;       
        detalle.push(dataDetalle);

    });

    if (!isValid) return false;

    return detalle;

}

const guardarCitas = () => {
    const id               = $("#sdetalle_oper_id").val(); 
    const correo_cliente   = $("#correo_cliente").val(); 
    const whatsapp_cliente = $("#whatsapp_cliente").val(); 
    const datosTabla = obtenerDatosTabla();

    console.log("datosTabla", datosTabla);
    

    if(!datosTabla) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor completa todos los campos',
        });

        return;
    };

    if(datosTabla.length == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No hay citas para agendar',
        });

        return;
    };

    const data = {
        detalle: JSON.stringify(datosTabla),
        id,
        ID_principal,
        sucursal,
        usuario_id,
        cliente_id,
        correo_cliente,
        whatsapp_cliente,
        type: 'guardar',
    }


    console.log("data" , data);
    // return;

    $.ajax({
        url: AjaxPath,
        method: 'POST',
        data,
        success: function(result) {

            const response = JSON.parse(result);
            const { error, status, message, data } = response;

                Swal.fire({
                    icon:  status ? "success" : 'error',
                    title: status ? "Correcto" :  'Error',
                    text: message
                });

            if(error) console.log("error =>" , error);
            if(status) { setTimeout(() => { window.location.href = BasePATH + "SclienteAdministracion_ControlPresupuesto";}, 1000) };
            // if(status) { setTimeout(() => { history.back(); }, 1000) };
            

        }
    });
}


const validarHorarios = (indice) => {
    const fecha = $(`input[name='datos[${indice}][fecha]']`);
    const hora  = $(`input[name='datos[${indice}][hora]']`);
    const doctor= $(`select[name='datos[${indice}][doctor]']`);


    const data = {
        doctor: doctor.val(),
        fecha: fecha.val(),
        hora: hora.val(),
        type: 'consultar_horarios',
    };

    // console.log("data", data);
    

    const tieneVacio = Object.values(data).some(value => !value);
    if (tieneVacio) return;     

    $.ajax({
        url: AjaxPath,
        method: 'POST',
        data,
        success: function(result) {
            console.log("result", result);
            

            const response = JSON.parse(result);
            const { error, status, message } = response;

            if (!status) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: message
                });

                fecha.val("");
                hora.val("");

                return;
            }

            console.log("error " , error);
            

        }
    });

};