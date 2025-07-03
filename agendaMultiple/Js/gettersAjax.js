
const getEvents = async () => {

    try {
        const response = await fetch(baseJs + "agendaMultiple/Ajax/CM_Ajax_Agenda.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: new URLSearchParams({
                type: "consultar_eventos_calendar",
                ID_principal,
            }),
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const { data, error } = await response.json();

        if (!data) return;

        const colorsUser = data.colorsUser;

        $("#conventions").html(""); // Limpiar el contenedor antes de agregar elementos

        for (const key in colorsUser) {
            const colorHex = colorsUser[key]; // Extrae el color directamente

            const div = `<div class="col-md-3 col-sm-6 d-flex justify-content-center">
                        <label class="d-flex align-items-center gap-2">
                            <div style="border-radius: 50%; height: 20px; width: 20px; background-color: ${colorHex[0]};"></div>
                            ${colorHex[1]}
                        </label>
                    </div>`;

            $("#conventions").append(div);
        }

        return data.events;

    } catch (error) {

    }
};

const getClients = async () => {
    try {
        const response = await $.ajax({
            url: baseJs + "agendaMultiple/Ajax/CM_Ajax_Cliente.php",
            type: "POST",
            data: {
                type: "obtener",
                ID_principal: ID_principal,
            }
        });

        const { data, error } = JSON.parse(response);
        if (!data) return;
        clientesOptions = data.map(({ CODI_CLIENTE, nombre_cliente, cliente_id }) => 
            `<option value='${cliente_id}'>${CODI_CLIENTE} - ${nombre_cliente}</option>`
        ).join('');

    } catch (error) {
        
    }
};

const getUsers = async () => {
    try {
        const response = await $.ajax({
            url: baseJs + "agendaMultiple/Ajax/CM_Ajax_User.php",
            type: "POST",
            data: {
                type: "obtener",
                ID_principal: ID_principal,
            }
        });

        const { data, error } = JSON.parse(response);
        if (!data) return;

        userOptions = data.map(({ ID, NOMBRE_USUARIO }) => 
            `<option value='${ID}'>${NOMBRE_USUARIO}</option>`
        ).join('');

    } catch (error) {
        
    }
};

const getServices = async () => {
    try {
        const response = await $.ajax({
            url: baseJs + "agendaMultiple/Ajax/CM_Ajax_Servicios.php",
            type: "POST",
            data: {
                type: "obtener",
                ID_principal: ID_principal,
            }
        });

        const { data, error } = JSON.parse(response);
        if (!data) return;

        servicesOptions = data.map(({ id, descripcion, Tiempo }) => 
            `<option data-tiempo="${Tiempo}" value='${id}'>${descripcion}</option>`
        ).join('');

    } catch (error) {
        
    }
};


function validarHorarios(indice) {
    let doctor = $(`select[name='rows[${indice}][doctor]']`);
    let fecha = $(`input[name='rows[${indice}][fecha]']`);
    let Hora = $(`input[name='rows[${indice}][Hora]']`);

    if (!doctor.val() || !fecha.val() || !Hora.val()) return;

    const data = {
        doctor: doctor.val(),
        fecha: fecha.val(),
        Hora: Hora.val(),
        type: "consultar_agenda"
    }

    $.ajax({
        url: baseJs + "agendaMultiple/Ajax/CM_Ajax_Agenda.php",
        type: "POST",
        data,
        success: (response) => {
            
            const { data } = JSON.parse(response);
            const { message , status } = data;
            if (!status) {
                Swal.fire({icon: "error", html: message, title: "Error"});
                fecha.val("");
                Hora.val("");
            }
        }
    });
}