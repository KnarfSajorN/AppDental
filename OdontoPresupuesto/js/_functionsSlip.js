let procedimientos = [];
let isMinimized = false;
let valorTotal = 0;

function addProcedimiento(btn, data) {
  const isChecked = btn.checked;

  let datosPieza = JSON.parse(atob(data));
  datosPieza.procedimientos = [];

  const idPieza = datosPieza.pieza;

  if (isChecked) {
    procedimientos.push(datosPieza);
  } else {
    const nuevoArray = procedimientos.filter( (procedimiento) => procedimiento.pieza !== idPieza);
    procedimientos = nuevoArray;
  }

  updateProcedimientoSlip();
}
           -                         
function updateProcedimientoSlip() {
  console.log("Renderizando tabla con datos ", procedimientos);

  const procedimientoSlip = document.getElementById("procedimientoSlip");
  const procedimientosList = document.getElementById("procedimientosList");

  procedimientosList.innerHTML = "";

  procedimientos.forEach((procedimiento, index) => {
    const procedimientosPieza = procedimiento.procedimientos;
    const idPieza = procedimiento.pieza;
    let procedimientosPiezaHtml = ``;
    procedimientosPieza.forEach((proc, indice) => {
      let btnDeleteproc = indice != 0 ? `<i class="fas fa-minus text-danger" onclick="removeProcedimientoDetalle(${idPieza}, ${indice})"></i>` : "";

        procedimientosPiezaHtml += `   <tr id="fila_detalle_${idPieza}_${indice}">
                                          <td>
                                              <select style="width:100%" class="select2 form-select input-lg" onchange="modifyFields(${idPieza}, ${indice});autoRowProcedure(${idPieza}, ${indice})" name="datos[${idPieza}][${indice}][cara]">
                                                  <option ${proc.cara == "" ? "selected" : ""} value="">Seleccione</option>
                                                  <option ${proc.cara == "Cuello vestibular" ? "selected" : ""} value="Cuello vestibular">Cuello vestibular</option>
                                                  <option ${proc.cara == "Vestibular" ? "selected" : ""} value="Vestibular">Vestibular</option>
                                                  <option ${proc.cara == "Cuello palatino" ? "selected" : ""} value="Cuello palatino">Cuello palatino</option>
                                                  <option ${proc.cara == "Palatino" ? "selected" : ""} value="Palatino">Palatino</option>
                                                  <option ${proc.cara == "Mesial" ? "selected" : ""} value="Mesial">Mesial</option> 
                                                  <option ${proc.cara == "Distal" ? "selected" : ""} value="Distal">Distal</option> <option ${proc.cara == "Borde incisal" ? "selected" : ""} value="Borde incisal">Borde incisal</option>
                                                  <option ${proc.cara == "Toda la pieza" ? "selected" : ""} value="Toda la pieza">Toda la pieza</option>
                                              </select>
                                          </td>
                                          <td>
                                          <select style="width:100%" class="form-select" onchange="modifyFields(${idPieza}, ${indice}); agregarValorProcedimiento(${idPieza}, ${indice});" name="datos[${idPieza}][${indice}][procedimiento]">
                                              <option value="">Seleccione</option>
                                              ${optionsProcedimiento}
                                              </select>
                                          </td>
                                          <td>
                                              <input name="datos[${idPieza}][${indice}][valor]" onchange="updateTotal(${idPieza}, this.value); modifyFields(${idPieza}, ${indice});autoRowProcedure(${idPieza}, ${indice})" class="form-control" value="${proc.valor}" type="number" >
                                          </td>
                                          <td>
                                              ${btnDeleteproc}
                                          </td>
                                      </tr>`;
    });
    
    procedimientosList.innerHTML += `
                <tr id="fila_pieza_${idPieza}">
                    <th style="width:30%" class="text-center"><img src='OD_ImagenOdontograma/${idPieza}.png' style="max-width:15px"></th>
                    <th style="width:60%" class="text-center">${procedimiento.nombre}</th>
                    <td style="width:10%" class="text-center"><i class="fas fa-xmark text-danger" onclick="removeProcedimiento(${idPieza})"></i></td>
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
      
                
        if (procedimientosPieza.length == 0) {
          addRowProcedure(procedimiento.pieza);
        }

        for (let j = 0; j < procedimientosPieza.length; j++) {
          const proc = procedimientosPieza[j];
          // console.log("proc", proc);
          console.log("Modificando ", $(`select[name="datos[${idPieza}][${j}][procedimiento]"]`));
          console.log("Valor actual ", $(`select[name="datos[${idPieza}][${j}][procedimiento]"]`).val());
          console.log("Cambiando a", proc.procedimiento);
          
          // $(`select[name="datos[${idPieza}][${j}][procedimiento]"]`).val(proc.procedimiento).change();
          $(`select[name="datos[${idPieza}][${j}][procedimiento]"]`).val(proc.procedimiento);
        }
    // procedimientosList.appendChild(procedimientoRow);
  });

  if (procedimientos.length > 0) {
    procedimientoSlip.classList.add("active");
  } else {
    procedimientoSlip.classList.remove("active");
  }
}

function addRowProcedure(pieza) {
  const detalleProcedimiento = {
    cara: "",
    procedimiento: 0,
    valor: 0,
  };

  const piezaPosicion = procedimientos.find((item) => item.pieza == pieza);

  piezaPosicion.procedimientos.push(detalleProcedimiento);

  updateProcedimientoSlip();
}

function removeProcedimiento(pieza) {
  $(`#checkselectall_${pieza}`).prop("checked", false);
  const nuevoArray = procedimientos.filter(
    (procedimiento) => procedimiento.pieza != pieza
  );
  procedimientos = nuevoArray;

  updateProcedimientoSlip();
}

function removeProcedimientoDetalle(pieza, indice) {
  const piezaPosicion = procedimientos.find((item) => item.pieza == pieza);
  const arrayProcedimientos = piezaPosicion.procedimientos;
  const nuevosProcedimientos = arrayProcedimientos.filter(
    (_, index) => index !== indice
  );
  piezaPosicion.procedimientos = nuevosProcedimientos;
  updateProcedimientoSlip();
}

function modifyFields(pieza, indice) {
  const piezaPosicion = procedimientos.find((item) => item.pieza == pieza);
  const arrayProcedimientos = piezaPosicion.procedimientos;

  const nuevosProcedimientos = arrayProcedimientos.map(
    (procedimiento, index) => {
      if (index == indice) {
        const cara = $(`select[name="datos[${pieza}][${indice}][cara]"]`).val();
        const procedimiento = $(`select[name="datos[${pieza}][${indice}][procedimiento]"]`).val();
        const valor = $(`input[name="datos[${pieza}][${indice}][valor]"]`).val();

        return { cara, procedimiento, valor };
      }

      return procedimiento;
    }
  );

  piezaPosicion.procedimientos = nuevosProcedimientos;
  console.log("Finalizando modifyFields ", procedimientos);

  updateProcedimientoSlip();
}

function clearProcedimientos() {
  procedimientos = [];
  updateProcedimientoSlip();
  $(".class_checkselectall").prop("checked", false);
}

function toggleMinimize(minusIcon) {
  const procedimientoSlip = document.getElementById("procedimientoSlip");
  isMinimized = !isMinimized;
  procedimientoSlip.classList.toggle("minimized", isMinimized);

  if (isMinimized) {
    minusIcon.class = "fas fa-plus";
    // minusIcon.classList.remove("fa-minus");
    // minusIcon.classList.add("fa-plus");
  } else {
    minusIcon.class = "fas fa-minus";
    // minusIcon.classList.remove("fa-plus");
    // minusIcon.classList.add("fa-minus");
  }
}

function autoRowProcedure(pieza, indice) {
  const selectCaraSiguienteFila = $(
    `select[name="datos[${pieza}][${indice + 1}][cara]"]`
  );
  if (selectCaraSiguienteFila.val() == undefined) {
    addRowProcedure(pieza);
  }
}

function updateTotal(pieza, valor, indice) {
  valor = parseInt(valor);
  pieza = parseInt(pieza);
  valorTotal = 0;
  const totalOddsEl = document.getElementById("totalOdds");

  console.log("procedimientos" , procedimientos);
  

  const nuevoArray = procedimientos.map((procedimiento) => {
    const procedimientosPieza = procedimiento.procedimientos;
    const procs = procedimientosPieza.map((proc, index) => {
      if (procedimiento.pieza == pieza && index == indice) {
        proc.valor = valor;
        valorTotal += Number(proc.valor);
      }
      return proc;
    });

    procedimiento.procedimientos = procs;
    return procedimiento;
  });

  totalOddsEl.textContent = valorTotal.toFixed(2);
  procedimientos = nuevoArray;
  // console.log("Finalizando updatetotal ", procedimientos);

  // updateProcedimientoSlip();
}

function agregarValorProcedimiento(pieza, indice) {
  const procedimientoSeleccionado = $(
    `select[name="datos[${pieza}][${indice}][procedimiento]"] option:selected`
  );
  const dataValor = procedimientoSeleccionado.data("valor");
  $(`input[name="datos[${pieza}][${indice}][valor]"]`).val(dataValor);
  // console.log("Finalizando agregarValorProcedimiento ", procedimientos);

  updateTotal(pieza, dataValor, indice);
}

function formatOption(option) {
  if (!option.id) return option.text;

  const icon = $(option.element).data("icon");
  const text = option.text;

  return $(`
            <span style="display: flex; align-items: center;">
            ${icon}
            <span style="margin-left: 8px;">${text}</span>
            </span>
        `);
}