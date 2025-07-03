let indice = 0;
function addRow() {
    let btnDelete =  indice > 0  ? `<button class="btn btn-xs btn-danger" onclick="handleDeleteRow(${indice})"><i class="fas fa-minus"></i></button>` : ``; 
    let newRow = `  <tr id="fila${indice}">
                        <td>
                            <select class="select2" style="max-width: 120px;" onchange="autoRow(${indice})" name="rows[${indice}][idCliente]">
                                <option value=''>Seleccione</option>
                                ${clientesOptions}
                            </select>
                            </td>
                        <td>
                            <select class="select2" onchange="autoRow(${indice}); validarHorarios(${indice})" name="rows[${indice}][doctor]">
                                <option value=''>Seleccione</option>
                                ${userOptions}
                            </select>    
                        </td>
                        <td><input class="form-control" type="date" min="<?= $fecha ?>" onchange="autoRow(${indice}); validarHorarios(${indice})" name="rows[${indice}][fecha]"></td>
                        <td><input class="form-control" type="time" onchange="autoRow(${indice}); validarHorarios(${indice})" name="rows[${indice}][Hora]"></td>
                        <td>
                            <select class="select2" style="max-width: 120px;" onchange="autoRow(${indice})" name="rows[${indice}][motivoConsulta]">
                            <option data-tiempo="0" value=''>Seleccione</option>
                            ${servicesOptions}
                            </select>
                        </td>
                        <td>
                            <select class="select2" style="max-width: 100px;" onchange="autoRow(${indice})" name="rows[${indice}][tipo]">
                                <option value=''>Seleccione</option>
                                <option value='0'>Presencial</option>
                                <option value='1'>Virtual</option>
                            </select>
                        </td>
                        <td>${btnDelete}</td>
                    </tr>`;

    $("#citasList").append(newRow);
    $(".select2").select2();
    indice += 1;
}

function autoRow(i) {

    let indiceSiguiente = i + 1;
    let filaSiguiente = $(`select[name='rows[${indiceSiguiente}][idCliente]']`);
    
    if (filaSiguiente.val() === undefined ) {
        addRow();
    }

}


const handleDeleteRow = (i) => {
    $(`#fila${i}`).remove();
}

const obtenerDatosFilas = () => {
    const filas = $("#citasList tr");
    const datos = [];
    let isValid = true;

    filas.each((index, element) => {
        if(!isValid) return;
        
        let idFila = $(element).attr("id");
        let filaIndex = idFila ? idFila.replace("fila", "") : index;

        let idCliente = $(`select[name='rows[${filaIndex}][idCliente]']`).val();
        let doctor = $(`select[name='rows[${filaIndex}][doctor]']`).val();
        let fecha = $(`input[name='rows[${filaIndex}][fecha]']`).val();
        let Hora = $(`input[name='rows[${filaIndex}][Hora]']`).val();
        let motivoConsulta = $(`select[name='rows[${filaIndex}][motivoConsulta]']`).val();
        let tipo = $(`select[name='rows[${filaIndex}][tipo]']`).val();

        const tieneCampoVacio = (obj) => Object.values(obj).some(val => val === "" || val == null);
        const tieneCampoLleno = (obj) => Object.values(obj).some(val => val !== "" && val != null);
        
        let data = {
            idCliente,
            doctor,
            fecha,
            Hora,
            motivoConsulta,
            tipo
        }

        if (tieneCampoLleno(data)) {
            if (!tieneCampoVacio(data)) {
                datos.push(data);
            }else{
                isValid = false
            }
        }
    });

    if (!isValid) return false;
    return datos; 
}