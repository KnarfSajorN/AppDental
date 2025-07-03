$(document).ready(function() {

    var selectores = ['#Diente_Procedimiento', '#Presupuesto_Tratamiento', '#Diente_Procedimiento_Multiple', '#Presupuesto_Tratamiento_Multiple', '#tratamiento_edicion'];
    SelectIconos(selectores);

    $(".click_odontograma").click(function(event) {
        //console.log($(this).attr('id'));
        var arreglo_id = $(this).attr('id').split("_");
        var diente_id = arreglo_id[1];
        var Posicion = arreglo_id[0];
        var Nombre_Cara = $(this).attr('data-diente');

        HistorialDiente(diente_id);
        ModalPiezaOdontograma(diente_id, Posicion, Nombre_Cara);
    });

    let Numero_Diente_Arreglo = ["18","17","16","15","14","13","12","11","21","22","23","24","25","26","27","28","55","54","53","52","51","61","62","63","64","65","48","47","46","45","44","43","42","41","31","32","33","34","35","36","37","38","85","84","83","82","81","71","72","73","74","75"];

    Numero_Diente_Arreglo.forEach(function(elemento, indice, array) {
        //CargarImagenPieza(elemento);
        CargarImagenDiente(elemento);
    })

    $(".diente_img_general").click(function(event) {
        //console.log($(this).attr('id'));
        var arreglo_id = $(this).attr('id').split("_");
        var diente_id = arreglo_id[1];
        var Posicion = "Toda la Pieza";
        var Nombre_Cara = "Toda la Pieza";
        var Toda_Pieza = diente_id;

        HistorialDiente(diente_id);
        ModalPiezaOdontograma(diente_id, Posicion, Nombre_Cara, Toda_Pieza);
    });
});