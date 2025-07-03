function ActivarSeleccionMultiple() {
    document.getElementById("BotonSeleccion_Desactivar").style.display = "block";
    document.getElementById("BotonSeleccion_Procesar").style.display = "block";
    document.getElementById("BotonSeleccionar_Todas").style.display = "block";
    document.getElementById("BotonSeleccion_Activar").style.display = "none";

    //.check_seleccionMultiple
    $(".check_seleccionMultiple").css("display", "block");
}

function DesactivarSeleccionMultiple() {

    document.getElementById("BotonSeleccion_Desactivar").style.display = "none";
    document.getElementById("BotonSeleccion_Procesar").style.display = "none";
    document.getElementById("BotonSeleccionar_Todas").style.display = "none";
    document.getElementById("BotonSeleccion_Activar").style.display = "block";

    $(".check_seleccionMultiple").css("display", "none");
    $(".class_checkselectall").prop('checked', false);
}

function ProcesarSeleccionMultiple() {
    var Arreglo = []
    $('.class_checkselectall').each(function(index) {
        var valor = $(this).is(':checked');
        if ($(this).is(':checked') == true) {
            var arreglo_id = $(this).attr('id').split("_");
            Arreglo.push(arreglo_id[1]);
        }
    });
    //console.log(Arreglo);
    $("#diente_multiple").val(JSON.stringify(Arreglo));
    $('#ModalSeleccionAll').modal('toggle');
}

function SeleccionarTodas() {
    var elementosConClaseTodas = document.querySelectorAll('.class_checkselectall');

    elementosConClaseTodas.forEach(elemento => {
        if (elemento.type === 'checkbox' && !elemento.checked) {
            elemento.checked = true;
        } else if (elemento.type === 'checkbox') {
            elemento.checked = false;
        }
    });
}

function GuardarPiezaMultiple() {

    var Diente_Procedimiento = document.getElementById("Diente_Procedimiento_Multiple").value;
    var Diente_Detalle = document.getElementById("Diente_Detalle_Multiple").value;

    var usuario_id = document.getElementById("usuario_id_multiple").value;
    var cliente_id = document.getElementById("cliente_id_multiple").value;

    var diente_multiple = document.getElementById("diente_multiple").value;

    //var Presupuesto_Tratamiento = document.getElementById("Presupuesto_Tratamiento_Multiple").value;
    //var inventario_id = document.getElementById("inventario_id_Multiple").value;
    var cie_10 = document.getElementById("cie_10_Multiple").value;

    $.ajax({
        type: "POST",
        url: AjaxPath,
        data: {
            Tipo_Consulta: "Agregar Dato Multiple Odontograma",
            Diente_Procedimiento: Diente_Procedimiento,
            Diente_Detalle: Diente_Detalle,
            diente_multiple: diente_multiple,
            //Presupuesto_Tratamiento:Presupuesto_Tratamiento,
            //inventario_id:inventario_id,
            cie_10: cie_10,
            cliente_id: cliente_id,
            usuario_id: usuario_id
        },
        success: function(response) {
            window.location.reload();
        }
    });
}

function EliminarDetalleOdontograma_Diente(DetalleOdontograma_id) {

    Swal.fire({
        title: 'Esta seguro que desea eliminar el procedimiento realizado?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        //denyButtonText: `No Eliminar`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: AjaxPath,
                data: {
                    Tipo_Consulta: "Eliminar Detalle Odontograma",
                    DetalleOdontograma_id: DetalleOdontograma_id,

                }
            }).done(function(response) {
                if (response != "") {
                    Swal.fire(
                        'Eliminado!',
                    )
                    //console.log(response);
                    var diente_modal = $("#diente_id").val();
                    HistorialDiente(diente_modal);
                    CargarImagenDiente(diente_modal);
                } else {
                    Swal.fire(
                        'Error!',
                    )
                }

            });

        }
    })

}

function EditarDetalleOdontograma_Diente(DetalleOdontograma_id, lugar) {

    $.ajax({
        type: "POST",
        url: AjaxPath,
        data: {
            Tipo_Consulta: "Buscar Informacion Detalle Odontograma",
            DetalleOdontograma_id: DetalleOdontograma_id,

        }
    }).done(function(response) {
        var arreglo = JSON.parse(response);
        // aqui cambia debido a que en este odontograma no hay piezas visibles y se actualiza la funcion para comentar la funcion para cargar la piezasado
        ModalSwalEdicion_Inicial(arreglo, lugar);
    });

}

function PosicionCara(input) {
    /*
    var checkboxes = $('input.checks_modal:checkbox[value="' + input.value + '"]');
    // Recorre todos los checkboxes encontrados
    checkboxes.each(function() {
    // Obtiene el valor del atributo "data-cara" del checkbox actual
    var valorCara = $(this).data('cara');
    console.log('El checkbox con valor "' + input.value + '" tiene el atributo "data-cara" con valor "' + valorCara + '".');
    });
    */
    if (input.value != "Toda la Pieza") {
        
        Object.entries(CarasDientes[$("#numero_diente_edicion").val()]).forEach(([key, value]) => {
            //console.log(key, value);
            if (input.value == value) {
                $("#posicion_edicion").val(key)
            }
        });
    } else {
        $("#posicion_edicion").val("Toda la Pieza")
    }


}
var optionFormat1 = function(item) {
    if (!item.id) {
        return item.text;
    }

    var span = document.createElement('span');
    var icon_id = item.element.getAttribute('data-icon');

    var svg = ArregloSVG[icon_id];
    svg = svg.replaceAll('|', '"');
    svg = svg.replaceAll('■', '\r\n');
    svg = svg.replaceAll('°', '\n');
    var template = '';

    template += svg;
    template += "<label style='position: relative;top: 2px;left: 3px;margin-left: 3px;'>" + item.text + "<label>";

    span.innerHTML = template;

    return $(span);
}

function ModalSwalEdicion_Inicial(response, lugar) {

    var checkboxes = $('input.checks_modal:checkbox');

    
    var NumeroDiente = response.NumeroDiente;
    let Cara = [];
    Cara.push('Toda la Pieza');
    Object.values(CarasDientes[NumeroDiente]).forEach(valor => {
        Cara.push(valor);
    });
    //var Cara = ["Toda la Pieza", "Vestibular","Distal","Palatino","Mesial","Oclusal"];

    var Resultado_Procedimiento = response.Procedimiento;
    var Resultado_Cara = response.NombreCara;
    var Resultado_Detalle = response.Detalle;
    var id_detalle = response.id_detalle;
    var Posicion = response.Posicion;

    //var inventario_id = response.inventario_id;
    var cie_10 = response.cie_10;
    Swal.fire({
        title: 'Edicion de Procedimiento',
        html: '<label for="estado_edicion">Motivo Consulta:</label><br>' +
            '<select id="estado_edicion" class="swal2-select icons_select2_1 select2" >' +
            ArregloSwal +
            '</select>' +
            '<br><br>' +
            '<label for="cara_edicion">Cara:</label><br>' +
            '<select id="cara_edicion"  class="swal2-select select2_1" style="width: 82%;" onchange="PosicionCara(this)"><option value="">Seleccione</option>' +
            Cara.map(e => '<option value="' + e + '">' + e + '</option>').join('') +
            '</select>' +
            '<br><br>' +
            '<label for="detalle_edicion">Detalle:</label><br>' +
            '<input id="detalle_edicion"  type="text" class="form-control" placeholder="Escribe aquí el detalle" style="width:100%;">' +
            '<br><br>' +
            //'<label for="tratamiento_edicion">Adjuntar Tratamiento Para Presupuestar?</label><br>' +
            //'<select id="tratamiento_edicion" class="swal2-select select2 select2_1" ><option value="0">Ninguno</option>' +
            //ArregloSwalTratamiento +
            //'</select>' +
            //'<br><br>' +
            '<label for="CIE10_edicion">CIE10</label><br>' +
            '<select id="CIE10_edicion" class="swal2-select select2 select2_1" ><option value="0">Ninguno</option>' +
            ArregloSwalCIE10 +
            '</select>' +
            '<br><br>' +
            '<input id="posicion_edicion" type="hidden">' +
            '<input id="numero_diente_edicion" type="hidden">' +
            '<input id="id_detalle" type="hidden">',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Descartar',
        focusConfirm: false,
        customClass: {
            popup: 'Swal_Editar_Odontograma'
        },
        preConfirm: () => {
            const estado = Swal.getPopup().querySelector('#estado_edicion').value;
            const cara = Swal.getPopup().querySelector('#cara_edicion').value;
            const detalle = Swal.getPopup().querySelector('#detalle_edicion').value;
            const id_detalle = Swal.getPopup().querySelector('#id_detalle').value;

            const posicion_edicion = Swal.getPopup().querySelector('#posicion_edicion').value;
            const numero_diente_edicion = Swal.getPopup().querySelector('#numero_diente_edicion').value;
            //const tratamiento_edicion = Swal.getPopup().querySelector('#tratamiento_edicion').value;
            const CIE10_edicion = Swal.getPopup().querySelector('#CIE10_edicion').value;

            if (!estado || !cara) {
                Swal.showValidationMessage(`Completa todos los campos`);
            }
            return {
                estado: estado,
                cara: cara,
                detalle: detalle,
                id_detalle: id_detalle,
                posicion_edicion: posicion_edicion,
                numero_diente_edicion: numero_diente_edicion,
                //tratamiento_edicion: tratamiento_edicion,
                CIE10_edicion: CIE10_edicion
            }
        },
        didOpen: () => {
            var Arreglo = ["#tratamiento_edicion"]
            SelectIconos(Arreglo, $('.swal2-container'));

            $('.icons_select2_1').select2({
                width: "100%",
                templateSelection: optionFormat1,
                templateResult: optionFormat1,
                dropdownParent: $('.swal2-container')
            });

            $('.select2_1').select2({
                width: "100%",
                dropdownParent: $('.swal2-container')
            });
            //Procedimiento_Tratamiento_id
            $("#estado_edicion").val(Resultado_Procedimiento).trigger('change');
            $("#detalle_edicion").val(Resultado_Detalle);
            //$("#tratamiento_edicion").val(inventario_id).trigger('change');
            $("#CIE10_edicion").val(cie_10).trigger('change');

            $("#id_detalle").val(id_detalle);
            $("#numero_diente_edicion").val(NumeroDiente);
            $("#posicion_edicion").val(Posicion);
            $("#cara_edicion").val(Resultado_Cara).trigger('change');
        },
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: AjaxPath,
                data: {
                    Tipo_Consulta: "Guardar Edicion Informacion Detalle Odontograma",
                    Resultados: result.value,
                }
            }).done(function(response) {
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

                HistorialDiente(responsen.NumeroDiente);
                CargarImagenDiente(responsen.NumeroDiente);
                //CargarImagenPieza(responsen.NumeroDiente);

                //significa que la edicion se realizo desde modal de historial de odontograma
                if (lugar == "1") {
                    CargarHistorial(); // esta funcion esta en OD_ModalHistorial.php
                }
            });

        }
    })
}


    document.getElementsByTagName("body")[0].classList.add("sidebar-collapse");

    function ModalPiezaOdontograma(diente_id, posicion, NombreCara, Toda_Pieza) {

        return;

        $('#modalPieza').modal('show');
        document.getElementById("diente_id").value = diente_id;
        /*
        //se quitan estos datos
        document.getElementById("Diente_Posicion").value = posicion;
        document.getElementById("Diente_NombreCara").value = NombreCara;
        if(Toda_Pieza==undefined){
            document.getElementById("Diente_TodaPieza").value = "";
        }else{
            document.getElementById("Diente_TodaPieza").value = Toda_Pieza;
        }
        */

        document.getElementById("Tipo_Diente_Cara").innerText = NombreCara;
        document.getElementById("Imagen_Diente").innerHTML = "<label>" + diente_id + "</label><img src='OD_ImagenOdontograma/" + diente_id + ".png'>";


        var SVG = "<svg width='40' viewBox='0 0 35.6 35.6'><circle class='background' cx='17.8' cy='17.8' r='17.8'></circle><circle class='stroke' cx='17.8' cy='17.8' r='14.37'></circle><polyline class='check' points='11.78 18.12 15.55 22.23 25.17 12.87'></polyline></svg>";

        var ArregloChecks = new Array();
        ArregloChecks["Vestibular"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]' |@| class='checks_modal modal_valor' value='Vestibular'  onclick='CheckUnico()' > " + SVG + "  <br> Vestibular</div>"; // Todos los dientes

        ArregloChecks["Palatino"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]' |@| class='checks_modal modal_valor' value='Palatino'  onclick='CheckUnico()' > " + SVG + "  <br> Palatino</div>"; //Solo los diente superiores
        ArregloChecks["Lingual"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]' |@| class='checks_modal modal_valor' value='Lingual'  onclick='CheckUnico()' > " + SVG + " <br> Lingual</div>"; // solo los dientes inferiores

        ArregloChecks["Mesial"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]' |@| class='checks_modal modal_valor' value='Mesial'  onclick='CheckUnico()' > " + SVG + "   <br> Mesial</div>"; // Todos los dientes
        ArregloChecks["Distal"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]' |@| class='checks_modal modal_valor' value='Distal'  onclick='CheckUnico()' > " + SVG + "  <br> Distal</div>"; // Todos los dientes

        ArregloChecks["Oclusal"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]' |@| class='checks_modal modal_valor' value='Oclusal'  onclick='CheckUnico()' > " + SVG + "   <br> Oclusal</div>"; // Algunos Dientes
        ArregloChecks["Borde Incisal"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]' |@| class='checks_modal modal_valor' value='Borde Incisal'  onclick='CheckUnico()' > " + SVG + "   <br> Borde Incisal</div>"; // Algunos Dientes

        ArregloChecks["Cuello Vestibular"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]' |@| class='checks_modal modal_valor' value='Cuello Vestibular'  onclick='CheckUnico()' > " + SVG + "   <br> Cuello Vestibular</div>"; // Todos los dientes
        ArregloChecks["Cuello Palatino"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]' |@| class='checks_modal modal_valor' value='Cuello Palatino'  onclick='CheckUnico()' > " + SVG + "   <br> Cuello Palatino</div>"; // Algunos Dientes
        ArregloChecks["Cuello Lingual"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]' |@| class='checks_modal modal_valor' value='Cuello Lingual'  onclick='CheckUnico()' > " + SVG + "   <br> Cuello Lingual</div>"; // Algunos Dientes

        let PosicionArreglo = {};
        PosicionArreglo["Cuello Vestibular"] = "0";
        PosicionArreglo["Vestibular"] = "1";
        PosicionArreglo["Cuello Palatino"] = "2";
        PosicionArreglo["Palatino"] = "3";
        PosicionArreglo["Cuello Lingual"] = "4";
        PosicionArreglo["Lingual"] = "5";
        PosicionArreglo["Mesial"] = "6";
        PosicionArreglo["Distal"] = "7";
        PosicionArreglo["Oclusal"] = "8";
        PosicionArreglo["Borde Incisal"] = "9";

        
        let ArregloDienteCaras = {};

        for (var key in ArregloPosicionCarasDientes) {
            if (ArregloPosicionCarasDientes.hasOwnProperty(key)) {
                var diente = ArregloPosicionCarasDientes[key];
                //console.log('Diente #' + key + ':');
                if (key == diente_id) {
                    for (var propiedad in diente) {
                        if (diente.hasOwnProperty(propiedad)) {
                            //console.log(propiedad + ': ' + diente[propiedad]);
                            var InputCheck = ArregloChecks[diente[propiedad]].replace('|@|', "data-cara='" + propiedad + "'");
                            ArregloDienteCaras[PosicionArreglo[diente[propiedad]]] = InputCheck;
                        }
                    }
                }

            }
        }

        //console.log(ArregloDienteCaras);
        var Div = "";
        for (var key in ArregloDienteCaras) {
            if (ArregloDienteCaras.hasOwnProperty(key)) {
                Div += ArregloDienteCaras[key];
            }
        }
        Div += "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' id='check_all' name='Arreglo[Icono]' value='Toda la Pieza' onchange='CheckAll(this)' class='modal_valor' data-cara='Toda la Pieza' > " + SVG + " <br> Toda la pieza </div>";
        $("#check_caras").html(Div);


    }


    function CheckUnico() {
        $("#check_all").prop('checked', false);
        var Contador = 0;
        $('.checks_modal').each(function(index) {
            var valor = $(this).is(':checked');
            if ($(this).is(':checked') == true) {
                Contador++;
            }
            if (Contador == 7) {
                $("#check_all").prop('checked', true);
            }
        });
    }


    function CheckAll(valor) {
        if (valor.checked) {
            $(".checks_modal").prop('checked', true);
        } else {
            $(".checks_modal").prop('checked', false);
        }
    }

    function HistorialDiente(diente_id) {

        var usuario_id = document.getElementById("usuario_id").value;
        var cliente_id = document.getElementById("cliente_id").value;

        $.ajax({
            type: "POST",
            url: AjaxPath,
            data: {
                Tipo_Consulta: "Cargar Historial Diente",
                cliente_id: cliente_id,
                usuario_id: usuario_id,
                diente_id: diente_id
            },
            success: function(response) {
                document.getElementById("Historial_Diente").innerHTML = response;
                //console.log(response);
            }
        });

    }

    async function GuardarPiezaInicial() {
        var checks = document.getElementsByClassName("modal_valor");
        var contador = 0;
        var TodaLaPieza = "";

        for (var g of checks) {
            if (g.checked == true && g.value === "Toda la Pieza") {
                TodaLaPieza = "Si"; // Actualizamos el valor de TodaLaPieza si se encuentra "Toda la Pieza"
                var Nombre_Cara = g.getAttribute("data-cara");
                var res = await GuardarPiezaModificado(g.value, Nombre_Cara);
                contador++;
            }
        }
        if (TodaLaPieza == "") {
            for (var g of checks) {
                if (g.checked == true) {

                    var Nombre_Cara = $(g).attr('data-cara');
                    console.log(Nombre_Cara);
                    //console.log("2 segundos");
                    var res = await GuardarPiezaModificado(g.value, Nombre_Cara);
                    //console.log(res);
                    contador++;
                }
            }
        }
        if (contador == 0) {
            alert("Seleccione Alguna opcion de las caras del diente");
        }
        $('#modalPieza').modal('toggle');
    }


    function GuardarPiezaModificado(NombreCara, Posicion) {
        return new Promise((resolve, reject) => {
            var Nombre_Cara = $(this).attr('data-diente');
            var Diente_Procedimiento = document.getElementById("Diente_Procedimiento").value;
            var Diente_Detalle = document.getElementById("Diente_Detalle").value;
            var diente_id = document.getElementById("diente_id").value;

            var TodaPieza = "";
            if (Posicion == "Toda la Pieza") {
                TodaPieza = diente_id;
            }
            var Diente_Posicion = Posicion;
            var Diente_NombreCara = NombreCara;
            var Diente_TodaPieza = TodaPieza;

            var usuario_id = document.getElementById("usuario_id").value;
            var cliente_id = document.getElementById("cliente_id").value;

            //var Presupuesto_Tratamiento = document.getElementById("Presupuesto_Tratamiento").value;

            //var inventario_id = document.getElementById("inventario_id").value;
            var cie_10 = document.getElementById("cie_10").value;

            $.ajax({
                type: "POST",
                url: AjaxPath,
                data: {
                    Tipo_Consulta: "Agregar Dato Odontograma Inicial",
                    Diente_Procedimiento: Diente_Procedimiento,
                    Diente_Detalle: Diente_Detalle,
                    diente_id: diente_id,
                    Diente_Posicion: Diente_Posicion,
                    Diente_NombreCara: Diente_NombreCara,
                    Diente_TodaPieza: Diente_TodaPieza,
                    //Presupuesto_Tratamiento:Presupuesto_Tratamiento,
                    //inventario_id:inventario_id,
                    cie_10: cie_10,
                    cliente_id: cliente_id,
                    usuario_id: usuario_id
                },
                success: function(response) {
                    CargarImagenDiente(document.getElementById("diente_id").value);
                    resolve(response);
                }
            });

        })
    }


    function CargarImagenDiente(elemento) {
        var usuario_id = document.getElementById("usuario_id").value;
        var cliente_id = document.getElementById("cliente_id").value;

        $.ajax({
            type: "POST",
            url: AjaxPath,
            data: {
                Tipo_Consulta: "Cargar Imagen Diente",
                cliente_id: cliente_id,
                usuario_id: usuario_id,
                diente_id: elemento
            },
            success: function(response) {

                var div = document.getElementById("ImagenDiente_" + elemento);
                var svg = div.getElementsByTagName("svg")[0];
                if (svg != undefined) {
                    div.removeChild(svg);
                }
                var respuesta = response.split('|');
                document.getElementById("ImagenDiente_" + elemento).innerHTML += respuesta[0];
                document.getElementById("ImagenDiente_" + elemento).title = respuesta[1];
            }
        });
    }

    function VistaOdontograma(Valor) {
        switch (Valor) {
            case "Mixto":
                $(".G_1").css("display", "flex");
                $(".G_2").css("display", "flex");
                $(".G_3").css("display", "flex");
                $(".G_4").css("display", "flex");
                $(".G_5").css("display", "flex");
                $(".G_6").css("display", "flex");
                $(".G_7").css("display", "flex");
                $(".G_8").css("display", "flex");
                $(".G_9").css("display", "flex");
                $(".G_10").css("display", "flex");
                $(".G_11").css("display", "flex");
                $(".G_12").css("display", "flex");
                break;
            case "Permanente":
                $(".G_1").css("display", "flex");
                $(".G_2").css("display", "flex");
                $(".G_3").css("display", "flex");
                $(".G_4").css("display", "flex");
                $(".G_5").css("display", "none");
                $(".G_6").css("display", "none");
                $(".G_7").css("display", "none");
                $(".G_8").css("display", "none");
                $(".G_9").css("display", "flex");
                $(".G_10").css("display", "flex");
                $(".G_11").css("display", "flex");
                $(".G_12").css("display", "flex");
                break;
            case "Temporal":
                $(".G_1").css("display", "none");
                $(".G_2").css("display", "none");
                $(".G_3").css("display", "none");
                $(".G_4").css("display", "none");
                $(".G_5").css("display", "flex");
                $(".G_6").css("display", "flex");
                $(".G_7").css("display", "flex");
                $(".G_8").css("display", "flex");
                $(".G_9").css("display", "none");
                $(".G_10").css("display", "none");
                $(".G_11").css("display", "none");
                $(".G_12").css("display", "none");
                break;
        }
    }



    function SelectIconos(Selecticon, parent) {
        for (var i = 0; i < Selecticon.length; i++) {
            var selectOptions = {
                templateResult: function(option) {
                    if (!option.id) {
                        return option.text;
                    }
                    var icono = ArregloIconos[option.id] || ''; // obtener el SVG correspondiente al identificador
                    var svg = icono.replaceAll('|', '"');
                    svg = svg.replaceAll('■', '\r\n');
                    svg = svg.replaceAll('°', '\n');
                    var $option = $('<span style="height: 100%;display: flex;"><i class="icon">' + svg + '</i> ' + option.text + '</span>');
                    return $option;
                },
                templateSelection: function(option) {
                    if (!option.id) {
                        return option.text;
                    }
                    var icono = ArregloIconos[option.id] || ''; // obtener el SVG correspondiente al identificador
                    var svg = icono.replaceAll('|', '"');
                    svg = svg.replaceAll('■', '\r\n');
                    svg = svg.replaceAll('°', '\n');
                    var $option = $('<span style="height: 100%;display: flex;"><i class="icon">' + svg + '</i> ' + option.text + '</span>');
                    return $option;
                },
                width: "100%"
            };

            if (parent) {
                selectOptions.dropdownParent = parent;
            }

            $(Selecticon[i]).select2(selectOptions);

        }
    }

    function EditarEstadoProcedimiento(detalle_id) {

        Swal.fire({
            title: 'Editar Estado Procedimiento',
            html: '<label for="Estado_Modal_Procedimiento">Estado</label><br>' +
                '<select id="Estado_Modal_Procedimiento" class="form-control" style="width:100%;"><option value="Registrado">Registrado</option><option value="Realizado">Realizado</option><option value="No Realizado">No Realizado</option>' +
                '</select>' +
                '<label for="Detalle_Modal_Procedimiento">Detalle:</label><br>' +
                '<input id="Detalle_Modal_Procedimiento"  type="text" class="form-control" placeholder="Escribe aquí el detalle" style="width:100%;">' +
                '<input id="detalle_odontograma_id" type="hidden" value="' + detalle_id + '">',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Actualizar Procedimiento',
            cancelButtonText: 'Descartar',
            focusConfirm: false,
            customClass: {
                popup: 'Swal_Actualizar_Procedimiento'
            },
            preConfirm: () => {
                const Estado_Modal_Procedimiento = Swal.getPopup().querySelector('#Estado_Modal_Procedimiento').value;
                const Detalle_Modal_Procedimiento = Swal.getPopup().querySelector('#Detalle_Modal_Procedimiento').value;
                const detalle_odontograma_id = Swal.getPopup().querySelector('#detalle_odontograma_id').value;

                if (!Estado_Modal_Procedimiento) {
                    Swal.showValidationMessage(`Completa alguno de los dos campos`);
                }
                return {
                    Estado_Modal_Procedimiento: Estado_Modal_Procedimiento,
                    Detalle_Modal_Procedimiento: Detalle_Modal_Procedimiento,
                    detalle_odontograma_id: detalle_odontograma_id
                }
            },
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: AjaxPath,
                    data: {
                        Tipo_Consulta: "Actualizar Estado Procedimiento",
                        Resultados: result.value,
                    }
                }).done(function(response) {
                    //console.log(response);
                    var responsen = JSON.parse(response);
                    Swal.fire(
                        responsen.Estado,
                    );
                    HistorialDiente(responsen.NumeroDiente);
                });

            }
        })

    }