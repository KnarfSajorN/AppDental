let procedimientos = [];
    let isMinimized = false;
    let valorTotal = 0;

    function addProcedimiento(btn, data) {
        const isChecked = btn.checked;
        let datosPieza = JSON.parse(atob(data));
        datosPieza.procedimientos = [];
        const idPieza = datosPieza.pieza;

        procedimientos = isChecked ?
            [...procedimientos, datosPieza] :
            procedimientos.filter(p => p.pieza != idPieza);

        updateProcedimientoSlip();
    }

    function updateProcedimientoSlip() {
        const procedimientoSlip = document.getElementById("procedimientoSlip");
        const procedimientosList = document.getElementById("procedimientosList");
        // console.log("ArregloProcedimientos", ArregloProcedimientos);
        procedimientosList.innerHTML = "";

        procedimientos.forEach((procedimiento) => {
            const { procedimientos: procedimientosPieza, pieza: idPieza } = procedimiento;
            let procedimientosPiezaHtml = procedimientosPieza.map((proc, indice) => {

            

            const optionsProcedimiento1 = ArregloProcedimientos.map(item => {
                // console.log("item", item);
                
                const { id_procedimiento, SVG, Valor_Inventario, Nombre, Nombre_Inventario } = item;
                const selected = proc.procedimiento == id_procedimiento ? "selected" : "";
                return `<option ${selected} value='${id_procedimiento}' data-valor='${Valor_Inventario}' data-icon='${SVG}' > ${Nombre} ${Nombre_Inventario ? Nombre_Inventario : ''} </option>`;
            }).join('');

            return `
            <tr id="fila_detalle_${idPieza}_${indice}">
                <td>
                    <select style="width:100%" class="select2 form-select input-lg"  onchange="handleCaraChange(${idPieza}, ${indice})"  name="datos[${idPieza}][${indice}][cara]">
                        <option ${proc.cara == '' ? "selected" : ''} value="">Seleccione</option>
                        ${getCaraOptions(proc.cara)}
                    </select>
                </td>
                <td>
                    <select style="width:100%" class="form-select"  onchange="handleProcedimientoChange(${idPieza}, ${indice})"  name="datos[${idPieza}][${indice}][procedimiento]">
                        <option value="">Seleccione</option>
                        ${optionsProcedimiento1}
                    </select>
                </td>
                <td>
                    <input name="datos[${idPieza}][${indice}][valor]" onchange="handleValorChange(${idPieza}, ${indice})" class="form-control" value="${proc.valor}" type="number">
                </td>
                <td>
                    ${indice != 0 ? `<i class="fas fa-minus text-danger" onclick="removeProcedimientoDetalle(${idPieza}, ${indice})"></i>` : ''}
                </td>
            </tr>`}).join('');

            procedimientosList.innerHTML += `
            <tr id="fila_pieza_${idPieza}">
                <th style="width:30%" class="text-center">
                    <img src='OD_ImagenOdontograma/${idPieza}.png' style="max-width:15px">
                </th>
                <th style="width:60%" class="text-center">${procedimiento.nombre}</th>
                <td style="width:10%" class="text-center">
                    <i class="fas fa-xmark text-danger" onclick="removeProcedimiento(${idPieza})"></i>
                </td>
            </tr>
            <tr id="fila_detalle_${idPieza}">
                <td colspan="3">
                    <table class="table" id="fila_tabla_${idPieza}">
                        <thead>
                            <tr>
                                <th>Cara</th>
                                <th>Procedimiento</th>
                                <th>Valor</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="fila_tbody_${idPieza}">
                            ${procedimientosPiezaHtml}
                        </tbody>
                    </table>
                </td>
            </tr>`;

            if (procedimientosPieza.length == 0) addRowProcedure(idPieza);

            // Actualizar los valores de los selectores sin disparar eventos
            procedimientosPieza.forEach((proc, j) => {
                $(`select[name="datos[${idPieza}][${j}][cara]"]`).val(proc.cara);
                $(`select[name="datos[${idPieza}][${j}][procedimiento]"]`).val(proc.procedimiento);
                $(`input[name="datos[${idPieza}][${j}][valor]"]`).val(proc.valor);
            });
        });

        procedimientoSlip.classList.toggle("active", procedimientos.length > 0);
    }

    function getCaraOptions(selectedCara) {
        const caras = ["Cuello vestibular", "Vestibular", "Cuello palatino", "Palatino", "Mesial", "Distal", "Borde incisal", "Toda la pieza"];
        return caras.map(cara => `<option ${cara == selectedCara ? "selected" : ""} value="${cara}">${cara}</option>`).join('');
    }

    function addRowProcedure(pieza) {
        const detalleProcedimiento = {
            cara: "",
            procedimiento: 0,
            valor: 0
        };
        procedimientos.find(item => item.pieza == pieza).procedimientos.push(detalleProcedimiento);
        updateProcedimientoSlip();
    }

    function removeProcedimiento(pieza) {
        $(`#checkselectall_${pieza}`).prop("checked", false);
        procedimientos = procedimientos.filter(p => p.pieza != pieza);
        updateProcedimientoSlip();
    }

    function removeProcedimientoDetalle(pieza, indice) {
        const piezaPosicion = procedimientos.find(item => item.pieza == pieza);
        piezaPosicion.procedimientos = piezaPosicion.procedimientos.filter((_, index) => index != indice);
        updateProcedimientoSlip();
    }

    function handleCaraChange(pieza, indice) {
        const piezaPosicion = procedimientos.find(item => item.pieza == pieza);
        piezaPosicion.procedimientos[indice].cara = $(`select[name="datos[${pieza}][${indice}][cara]"]`).val();
        autoRowProcedure(pieza, indice);
    }

    function handleProcedimientoChange(pieza, indice) {
        const piezaPosicion = procedimientos.find(item => item.pieza == pieza);
        piezaPosicion.procedimientos[indice].procedimiento = $(`select[name="datos[${pieza}][${indice}][procedimiento]"]`).val();
        agregarValorProcedimiento(pieza, indice);
    }

    function handleValorChange(pieza, indice) {
        const piezaPosicion = procedimientos.find(item => item.pieza == pieza);
        piezaPosicion.procedimientos[indice].valor = $(`input[name="datos[${pieza}][${indice}][valor]"]`).val();
        updateTotal(pieza, piezaPosicion.procedimientos[indice].valor, indice);
    }

    function clearProcedimientos() {
        procedimientos = [];
        updateProcedimientoSlip();
        $(".class_checkselectall").prop("checked", false);
    }

    function toggleMinimize(minusIcon) {
        isMinimized = !isMinimized;
        document.getElementById("procedimientoSlip").classList.toggle("minimized", isMinimized);
        minusIcon.class = isMinimized ? "fas fa-plus" : "fas fa-minus";
    }

    function autoRowProcedure(pieza, indice) {
        if (!$(`select[name="datos[${pieza}][${indice + 1}][cara]"]`).val()) addRowProcedure(pieza);
    }

    function updateTotal(pieza, valor, indice) {
        valorTotal = procedimientos.reduce((total, procedimiento) => {
            procedimiento.procedimientos.forEach((proc, i) => {
                if (procedimiento.pieza == pieza && i == indice) proc.valor = valor;
                total += Number(proc.valor);
            });
            return total;
        }, 0);
        document.getElementById("totalOdds").textContent = valorTotal.toFixed(2);
    }

    function agregarValorProcedimiento(pieza, indice) {
        const valor = $(`select[name="datos[${pieza}][${indice}][procedimiento]"] option:selected`).data("valor");
        $(`input[name="datos[${pieza}][${indice}][valor]"]`).val(valor);
        updateTotal(pieza, valor, indice);
    }