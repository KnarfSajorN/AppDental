const guardarCitas = () => {
        
    let btnSubmit = $("#btnSubmit");
    btnSubmit.prop("disabled", true);
    btnSubmit.html(`<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                    <span class="sr-only">Guardando...</span>`);

    const datos = obtenerDatosFilas();
    
    if (!datos) {
        Swal.fire({
            icon: "error", 
            text: "Por favor completa todos los campos, si no deseas ocupar alguna fila vacía todos sus campos o eliminala", 
            title: "Error"
        });
        
        btnSubmit.prop("disabled", false);
        btnSubmit.html(`<i class="fas fa-plus"></i>&nbsp;Guardar`);
        return ;
    }

    const dataSend = {
        type: "crear",
        usuario_id,
        sucursal,
        ID_principal,
        detalle: JSON.stringify(datos),
    };
    
    $.ajax({
        url: baseJs + "agendaMultiple/Ajax/CM_Ajax_Agenda.php",
        type: "POST",
        data: dataSend,
        success: (response) => {
            console.log(response);
            

            btnSubmit.prop("disabled", false);
            btnSubmit.html(`<i class="fas fa-plus"></i>&nbsp;Guardar`);
            
            const { data } = JSON.parse(response);
            const { message , status } = data;
            Swal.fire({
                icon: status ? "success" : "error", 
                text: message, 
                title: status ? "Correcto" : "Error"
            });

            if (status) {
                setTimeout(() => {
                    location.reload()
                }, 1000);
            }

        },
        error: (error) => {
            console.error(error);
            btnSubmit.prop("disabled", false);
            btnSubmit.html(`<i class="fas fa-exclamation"></i>&nbsp;Ocurrio un error`);
        }
    });

};