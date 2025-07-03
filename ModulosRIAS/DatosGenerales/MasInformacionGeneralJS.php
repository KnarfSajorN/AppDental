<script>


    function CIE10_Registro(valor) {
    $("#CIE10CUPS_"+valor).select2({
        allowClear: true,
        ajax: {
            url: "RIAS_AjaxSelects.php",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    searchTerm: params.term, // search term
                    Tipo: "CIE10"
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });
}

function CUPS_Registro(valor) {
    $("#ExamenesCUPS_"+valor).select2({
        allowClear: true,
        ajax: {
            url: "RIAS_AjaxSelects.php",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    searchTerm: params.term, // search term
                    Tipo: "CUPS"
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });
}
/*
var contador=2;
function agregarFila() {
    var table = document.getElementById("dynamicTable");
    var row = table.insertRow(table.rows.length);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);

    cell1.innerHTML = '<select class="form-control input-lg select2" style="width:98%" name="ExamenesCUPS[CUP][]" id="ExamenesCUPS_' + contador + '" onclick="CUPS_Registro(' + contador + ');"><option value="">Seleccione</option></select>';
    cell2.innerHTML = '<select class="form-control input-lg select2" style="width:98%" name="ExamenesCUPS[CIE10][]" id="CIE10CUPS_' + contador + '" onclick="CIE10_Registro(' + contador + ');"><option value="">Seleccione</option></select>';
    cell3.innerHTML = '<button type="button" class="btn btn-danger" onclick="eliminarFila(this)">-</button>';

    CIE10_Registro(contador);
    CUPS_Registro(contador);
    contador++;
}

function eliminarFila(button) {
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}
*/
$(document).ready(function() {
        CIE10_Registro(1);
        CUPS_Registro(1);

        CIE10_Registro(2);
        CUPS_Registro(2);

        CIE10_Registro(3);
        CUPS_Registro(3);
});

</script>