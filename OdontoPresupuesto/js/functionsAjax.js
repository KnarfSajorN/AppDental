function guardarProcedimientos() {
    let detalleProcedimientos = [];
    let isValid = true;

    const fecha_vencimiento = $("#procedimientoSlip #fecha_vencimiento").val();
    const monto_pagado = $("#procedimientoSlip #monto_pagado").val();
    const nota = $("#procedimientoSlip #nota").val();
    
    const button_save = $("#procedimientoSlip #button-save");
    button_save.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">Guardando...</span>`)
    button_save.attr('disabled', true);

    procedimientos.forEach((proc) => {
        if (!isValid) return;

        const listaProcedimientos = proc.procedimientos;

        listaProcedimientos.forEach(({ cara, procedimiento, valor }) => {
            const campos = [cara, procedimiento, valor];
        
            const hayAlMenosUnoLleno = campos.some(
                (field) => field !== null && (field) !== 0 && field !== undefined && String(field).trim() !== ""
            );
        
            const todosLlenos = campos.every(
                (field) => field !== null && (field) !== 0 && field !== undefined && String(field).trim() !== ""
            );
        
            if (hayAlMenosUnoLleno && !todosLlenos) {
                isValid = false;
            }
        });
    });

    console.log("procedimientos ", procedimientos);
    
    const procedimientosFiltrados = procedimientos.map((piezas) => {
        const procedimientosPieza = piezas.procedimientos;
        const nuevosFilter = procedimientosPieza.filter( (field) => field.cara != "" && field.procedimiento != 0 && field.valor != 0 )
        piezas.procedimientos = nuevosFilter;
        return piezas
    })
    
    console.log("procedimientosFiltrados ", procedimientosFiltrados);

    if (!isValid) {
        Swal.fire({
            icon: "error",
            text: "Por favor complete todos los campos, si no desea ocupar una fila vacíe su contenido o eliminela",
            title: "Error",
        });
        
        button_save.html(`<i class="fas fa-bookmark"></i> Guardar`)
        button_save.attr('disabled', false);

        return;
    }

    $.ajax({
        type: "POST",
        url: AjaxPath,
        data: {
            Tipo_Consulta: "Guardar_Procedimientos",
            cliente_id,
            usuario_id,
            fecha_vencimiento,
            monto_pagado,
            nota,
            sucursal_id,
            ID_principal,
            detalle: JSON.stringify(procedimientosFiltrados),
        },
        success: function (response) {
            console.log("response", response);
            
            button_save.html(`<i class="fas fa-bookmark"></i> Guardar`)
            button_save.attr('disabled', false);

            const { error , status , message } = JSON.parse(response);
            
            Swal.fire({
                icon : status ? 'success' : 'error',
                title: status ? 'Correcto' : 'Error',
                text: message,
            });

            console.log("Error " , error);
            
            if (status) {
                setTimeout(() => {
                    // window.location.reload();
                    window.location.href = BasePath + 'SclienteAdministracion_presupuestos_Odontograma';
                    // window.location.href = BasePath + 'OP_Clientes';
                }, 1000);
                
            }
        },
    });
}
