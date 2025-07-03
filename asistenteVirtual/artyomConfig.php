<style>
    .swal2-container {
        z-index: 9999999999 !important;
        /* Asegúrate de que sea un valor alto */
    }
</style>
<script src="<?= $Base ?>/asistenteVirtual/artyom/artyom.window.js"></script>

<!-- artyom config -->
<script>
    // cargar local storage
    const AssistantConfigData = JSON.parse('<?= ($rowAsistenteConfig == null ? '{}' : json_encode($rowAsistenteConfig)) ?>');
    // // console.log(AssistantConfigData);
    if (AssistantConfigData['id']) {
        localStorage.setItem("AssistantName", btoa(AssistantConfigData['nombre']));
        localStorage.setItem("AssistantLang", btoa(AssistantConfigData['idioma']));
        localStorage.setItem("AssistantWelcomeM", btoa(AssistantConfigData['saludo']));
        localStorage.setItem("AssistantMode", false);
    } else {
        localStorage.setItem("AssistantName", '');
        localStorage.setItem("AssistantLang", 'native');
        localStorage.setItem("AssistantWelcomeM", '');
        localStorage.setItem("AssistantMode", false);
    }
</script>

<script>
    var Assistant = new Artyom();

    // -------------------------------------------------------
    // buscar voces disponibles
    // -------------------------------------------------------
    let vocesDisponiblesNavegador = []; // Obtener todas las voces disponibles Google
    let vocesDisponiblesAssistant = Object.keys(Assistant.ArtyomVoicesIdentifiers); // Obtener todas las voces disponibles del asistente
    let AssistantIdiomasDetectados = Array(); // arreglo para realizar un seguimiento de los idiomas detectados
    window.speechSynthesis.onvoiceschanged = function() {
        vocesDisponiblesNavegador = window.speechSynthesis.getVoices();
        vocesDisponiblesAssistant.forEach((voiceAssistant) => {
            vocesDisponiblesNavegador.find((voice) => {
                if (voice.lang === voiceAssistant && !AssistantIdiomasDetectados[voiceAssistant]) {
                    // // console.log(voiceAssistant);
                    AssistantIdiomasDetectados[voiceAssistant] = {
                        name: Assistant.ArtyomVoicesIdentifiers[voiceAssistant][0],
                        lang: voice.lang,
                    }
                }
            });
        });
    };
    // -------------------------------------------------------
    function initializeAssistant() {
        Assistant.initialize({
            name: atob(localStorage.getItem("AssistantName")),
            lang: atob(localStorage.getItem("AssistantLang")), // GreatBritain english
            continuous: true, // Listen forever
            soundex: true, // Use the soundex algorithm to increase accuracy
            debug: true, // Show messages in the console
            listen: true, // Start to listen commands !
        })
    }
    // Start the commands !
    // --------------------------------------------
    // variables globales
    // --------------------------------------------
    var preguntas = [];
    var respuestas = [];
    var tabla = '';
    // --------------------------------------------

    function comandosPrincipales() {
        commandId = 0;
        preguntas = [];
        respuestas = [];
        tabla = '';
        Assistant.emptyCommands();

        Assistant.ArtyomProperties.name = atob(localStorage.getItem("AssistantName"));

        $.ajax({
            url: '<?= $Base ?>/asistenteVirtual/ajax_comandosActivos.php',
            type: 'POST',
            data: {
                uI: '<?= base64_encode($_SESSION['ID']) ?>'
            },
            success: function(response) {
                if (response) {
                    response = JSON.parse(response);
                    for (let i = 0; i < response.length; i++) {
                        if (atob(response[i][btoa('commandId')]) == '1') { // registro de paciente

                            // console.log(decodeURIComponent(escape(atob(response[i][btoa('comando')]))));
                            Assistant.addCommands([{
                                indexes: [decodeURIComponent(escape(atob(response[i][btoa('comando')])))],
                                action: function() {
                                    preguntas = atob(response[i][btoa('preguntas')]).split('|/|');
                                    preguntas.forEach(pregunta => {
                                        preguntas[preguntas.indexOf(pregunta)] = pregunta.split('||');
                                    });
                                    tabla = 'cliente';
                                    Assistant.fatality();
                                    Assistant.say("Entrando en registro de paciente");
                                    insertarDictado("Por favor responda las preguntas a continuación", "0");
                                    Assistant.say("Por favor responda las preguntas a continuación", {
                                        onEnd: function() {
                                            insertarDictado("Por favor responda las preguntas a continuación", "0");
                                            commandId = 1;
                                            // setTimeout(() => {
                                            preguntar(preguntas, 0);
                                            // }, 100);
                                        }
                                    });
                                }
                            }]);
                        }
                        if (atob(response[i][btoa('commandId')]) == '2') { // registro de citas
                            // commandId = 2;
                            // console.log(decodeURIComponent(escape(atob(response[i][btoa('comando')]))));
                            Assistant.addCommands([{
                                indexes: [decodeURIComponent(escape(atob(response[i][btoa('comando')])))],
                                action: function() {
                                    preguntas = atob(response[i][btoa('preguntas')]).split('|/|');
                                    preguntas.forEach(pregunta => {
                                        preguntas[preguntas.indexOf(pregunta)] = pregunta.split('||');
                                    });
                                    tabla = 'citas';
                                    Assistant.fatality();
                                    Assistant.say("Entrando en registro de citas");
                                    insertarDictado("Entrando en registro de citas", "0");
                                    Assistant.say("Por favor responda las preguntas a continuación", {
                                        onEnd: function() {
                                            insertarDictado("Por favor responda las preguntas a continuación", "0");
                                            commandId = 2;
                                            // setTimeout(() => {
                                            preguntar(preguntas, 0);
                                            // }, 100);
                                        }
                                    });
                                }
                            }]);
                        }
                        if (atob(response[i][btoa('commandId')]) == '3') { // enviar correo

                            Assistant.addCommands([{
                                indexes: [decodeURIComponent(escape(atob(response[i][btoa('comando')])))],
                                action: function() {
                                    commandId = 3;
                                    Assistant.say("Entrando en Correo electrónico");
                                    insertarDictado("Entrando en Correo electrónico", "0");
                                    let mailto = document.createElement('a');
                                    mailto.href = 'mailto:?subject=';
                                    mailto.click();
                                }
                            }]);
                        }
                        if (atob(response[i][btoa('commandId')]) == '4') { // buscar música

                            Assistant.addCommands({
                                //The smart property of the command needs to be true
                                smart: true,
                                indexes: [atob(response[i][btoa('comando')]) + '*'],
                                action: function(i, wildcard) {
                                    commandId = 4;
                                    Assistant.say("Buscando coincidencias de " + wildcard);
                                    insertarDictado("Buscando coincidencias de " + wildcard, "0");
                                    // z-index: -1,
                                    // setTimeout(() => {
                                    searchAndPlay(wildcard);
                                    // }, 100);
                                }
                            });
                        }
                        if (atob(response[i][btoa('commandId')]) == '6') { // consulta agenda del dia                            
                            Assistant.addCommands([{
                                indexes: [decodeURIComponent(escape(atob(response[i][btoa('comando')])))],
                                action: function() {
                                    commandId = 3;
                                    Assistant.fatality();
                                    Assistant.emptyCommands();
                                    Assistant.say("consultando su agenda del día.");
                                    insertarDictado("consultando su agenda del día.", "0");
                                    var arreglo = '<?= funcionMaster($_SESSION['ID'], 'fecha = CURRENT_DATE and Hora >= CURRENT_TIME and doctor', 'group_concat(Hora,"||",nombre separator "|/|")', 'citas') ?>';
                                    console.log(arreglo);
                                    if (arreglo != '') {
                                        let resultadoSplit = arreglo.split('|/|');
                                        if (resultadoSplit.length > 0) {
                                            for (var i = 0; i < resultadoSplit.length; i++) {
                                                dictar = "a las " + resultadoSplit[i].split('||')[0] + " horas tiene agenda con el paciente " + resultadoSplit[i].split('||')[1] + ". ";
                                                insertarDictado(dictar, "0");
                                                Assistant.say(decodeURIComponent(encodeURIComponent(dictar)));
                                            }
                                        }
                                        Assistant.say("Esas son todas sus citas programadas.", {
                                            onEnd: function() {
                                                initializeAssistant();
                                                comandosPrincipales();
                                            }
                                        });
                                    } else {
                                        Assistant.say("No tiene agenda programada para el dia de hoy.", {
                                            onEnd: function() {
                                                initializeAssistant();
                                                comandosPrincipales();
                                            }
                                        });
                                        insertarDictado("No tiene agenda programada para el dia de hoy.", "0");
                                    }
                                }
                            }]);
                        }
                        if (atob(response[i][btoa('commandId')]) == '8') { // consulta notas de enfermería
                            Assistant.addCommands([{
                                indexes: [decodeURIComponent(escape(atob(response[i][btoa('comando')])))],
                                action: function() {
                                    commandId = 8;
                                    Assistant.fatality();
                                    Assistant.emptyCommands();
                                    Assistant.say("Por favor diga el número de documento del paciente a consultar", {
                                        onEnd: function() {
                                            insertarDictado("Por favor diga el número de documento del paciente a consultar", "0");
                                            initializeAssistant();
                                            Assistant.ArtyomProperties.name = '';
                                            Assistant.addCommands({
                                                smart: true,
                                                indexes: ['*'],
                                                action: function(i, wildcard) {
                                                    wildcard = formatearNumeros(wildcard);
                                                    Assistant.say("Buscando coincidencias de " + wildcard);
                                                    insertarDictado("Buscando coincidencias de " + wildcard, "0");
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: '<?= $Base ?>/asistenteVirtual/buscarNotasEnfermeria.php',
                                                        data: {
                                                            documento: wildcard
                                                        },
                                                        success: function(respuesta) {
                                                            Assistant.fatality();
                                                            console.log(respuesta);
                                                            if (respuesta != '[]') {
                                                                respuesta = JSON.parse(respuesta);
                                                                // Assistant.say(decodeURIComponent(escape(respuesta)));
                                                                // [{"numero":1,"fecha":"2024-03-23 09:52:18","nota":"segunda nota de enfermeria prueba prueba\n"},{"numero":2,"fecha":"2024-03-23 09:52:03","nota":"primera nota de enfermeria prueba"}]
                                                                DictarNota(0, respuesta);
                                                            } else {
                                                                Assistant.say("No se encontraron coincidencias", {
                                                                    onEnd: function() {
                                                                        insertarDictado("No se encontraron coincidencias", "0");
                                                                        initializeAssistant();
                                                                        comandosPrincipales();
                                                                    }
                                                                });
                                                            }
                                                        }
                                                    })
                                                }
                                            });
                                        }
                                    });
                                }
                            }]);
                        }
                        if (atob(response[i][btoa('commandId')]) == '9') { // consulta AI
                            Assistant.addCommands([{
                                indexes: [decodeURIComponent(escape(atob(response[i][btoa('comando')])))],
                                action: function() {
                                    Assistant.fatality();
                                    insertarDictado("En que puedo ayudarte?", "0");
                                    Assistant.say("En que puedo ayudarte?", {
                                        onEnd: function() {
                                            commandId = 9;
                                            initializeAssistant();
                                            Assistant.ArtyomProperties.name = '';
                                            Assistant.addCommands({
                                                smart: true,
                                                indexes: ['*'],
                                                action: function(i, wildcard) {
                                                    Assistant.fatality();
                                                    Assistant.say("Procesando su solicitud...", {
                                                        onEnd: function() {
                                                            insertarDictado("Procesando su solicitud...", "0");
                                                            // peticion curl a la api
                                                            $.ajax({
                                                                type: 'POST',
                                                                url: '<?= $Base ?>/AI/AISendRequest.php',
                                                                data: {
                                                                    pregunta: wildcard
                                                                },
                                                                beforeSend: function() {
                                                                    // mostrar el loader con animacion
                                                                    $('.loaderAI').fadeIn(1000); // 1000 milisegundos = 1 segundo
                                                                },
                                                                success: function(respuesta) {
                                                                    Assistant.say("Su solicitud ha sido procesada.", {
                                                                        onEnd: function() {
                                                                            $('.loaderAI').fadeOut(1000);
                                                                            Assistant.say(((respuesta)), {
                                                                                onEnd: function() {
                                                                                    
                                                                                    insertarDictado(respuesta, "0");
                                                                                    Assistant.say("Hasta luego");
                                                                                    initializeAssistant();
                                                                                    comandosPrincipales();
                                                                                }
                                                                            });
                                                                        }
                                                                    });
                                                                },

                                                            });
                                                        }
                                                    });
                                                }
                                            });

                                        }
                                    });
                                }
                            }]);
                        }
                    }
                }
            }
        })
    }

    // --------------------------------------------
    // Funciones
    // --------------------------------------------

    function DictarNota(elementSaid, respuesta) {
        console.log(elementSaid, respuesta);
        Assistant.fatality();
        if (elementSaid <= respuesta.length) {
            Assistant.say(decodeURIComponent(escape('Nota con fecha de ' + respuesta[elementSaid].fecha + ': ' + respuesta[elementSaid].nota)), {
                onEnd: function() {
                    insertarDictado(decodeURIComponent(escape('Nota con fecha de ' + respuesta[elementSaid].fecha + ': ' + respuesta[elementSaid].nota)), "0");
                    if (elementSaid == (respuesta.length - 1)) {
                        insertarDictado("Ya no hay mas notas disponibles.", "0");
                        Assistant.say("Ya no hay mas notas disponibles.", {
                            onEnd: function() {
                                initializeAssistant();
                                comandosPrincipales();
                            }
                        });
                    } else {
                        Assistant.fatality();
                        Assistant.say("Desea escuchar otra nota?", {
                            onEnd: function() {
                                insertarDictado("Desea escuchar otra nota?", "0");
                                Assistant.emptyCommands();
                                initializeAssistant();
                                Assistant.ArtyomProperties.name = '';
                                Assistant.addCommands({
                                    indexes: ["Si", "No"],
                                    action: function(i, wildcard) {
                                        if (i == 0) {
                                            Assistant.say('Confirmado', {
                                                onEnd: function() {
                                                    elementSaid++
                                                    DictarNota(elementSaid, respuesta);
                                                }
                                            });
                                        } else {
                                            Assistant.say('No confirmado', {
                                                onEnd: function() {
                                                    // Assistant.fatality();
                                                    // Assistant.emptyCommands();
                                                    // initializeAssistant();
                                                    comandosPrincipales();
                                                }
                                            });
                                        }
                                    }
                                });
                            }
                        });
                    }
                }
            });
        } else {
            Assistant.fatality();
            initializeAssistant();
            comandosPrincipales();
        }
    }

    function preguntar(preguntas, indice) {
        Assistant.fatality();
        Assistant.emptyCommands();
        console.log(preguntas[indice]);
        if (indice < preguntas.length) {
            Assistant.say(decodeURIComponent(escape(preguntas[indice][1])), {
                onEnd: function() {
                    insertarDictado(decodeURIComponent(escape(preguntas[indice][1])), "0");
                    // initializeAssistant();
                    // setTimeout(() => {
                    initializeAssistant();
                    Assistant.ArtyomProperties.name = '';
                    Assistant.addCommands({
                        smart: true,
                        indexes: "*",
                        action: function(i, wildcard) {
                            respuestas[indice] = wildcard;
                            // setTimeout(() => {
                            preguntar(preguntas, indice + 1);
                            // }, 100);
                        }
                    });
                    // }, 100);
                }
            });
        }
        if (indice == preguntas.length) {
            dictarRespuestas(preguntas, respuestas);
        }
    }

    function dictarRespuestas(preguntas, respuestas) {
        Assistant.fatality();
        console.log(preguntas, respuestas);
        Assistant.say("A continuación se dictarán sus respuestas");
        insertarDictado("A continuación se dictarán sus respuestas", "0");
        for (let i = 0; i < preguntas.length; i++) {
            // Assistant.say(decodeURIComponent(escape(preguntas[i][1])) + '. ' + respuestas[i]);
            // insertarDictado(decodeURIComponent(escape(preguntas[i][1])) + '. ' + respuestas[i], "0");
            Assistant.say(respuestas[i]);
            insertarDictado(respuestas[i], "0");
        }
        Assistant.say('Desea confirmar esta información?', {
            onEnd: function() {
                insertarDictado('Desea confirmar esta información?', "0");
                setTimeout(() => {
                    Assistant.emptyCommands();
                    initializeAssistant();
                    Assistant.ArtyomProperties.name = '';
                    Assistant.addCommands({
                        indexes: ["Si", "No", "confirmado", "no confirmado"],
                        action: function(i, wildcard) {
                            if (i == 0 || i == 2) {
                                Assistant.say('Confirmado', {
                                    onEnd: function() {
                                        // setTimeout(() => {
                                        procesarDatos();
                                        // }, 100);                                        
                                        // comandosPrincipales();
                                    }
                                });
                            } else {
                                Assistant.say('No confirmado', {
                                    onEnd: function() {
                                        // setTimeout(() => {
                                        comandosPrincipales();
                                        // }, 100);
                                    }
                                });
                            }
                        }
                    });
                }, 100);
            }
        });
    }

    function procesarDatos() {
        // formulario para insertar datos
        if (tabla != '' && respuestas.length > 0 && preguntas.length > 0) {
            // console.log(preguntas, respuestas);
            // nuevo form
            let form = document.createElement("form");
            form.setAttribute("id", "vozForm");
            // campos
            if (commandId == 1) {
                // registro de paciente
                let input1 = document.createElement("input");
                input1.setAttribute("type", "hidden");
                input1.setAttribute("name", "datos[usuario_id]");
                input1.setAttribute("value", '<?= $_SESSION['ID'] ?>');
                form.appendChild(input1);
                for (let i = 0; i < preguntas.length; i++) {
                    // registro de paciente
                    switch (preguntas[i][0]) {
                        case 'tipo_cliente':
                            respuestas[i] = formatearTipoDocumento(respuestas[i]);
                            break;
                        case 'codi_cliente':
                            respuestas[i] = formatearNumeros(respuestas[i]);
                            break;
                        case 'fechanacimiento':
                            respuestas[i] = formatearFecha(respuestas[i]);
                            break;
                        case 'codigo_pais':
                            respuestas[i] = formatearPais(respuestas[i]);
                            break;
                        case 'codigo_ciudad':
                            respuestas[i] = formatearCiudad(respuestas[i]);
                            break;
                        case 'genero':
                            respuestas[i] = formatearGenero(respuestas[i]);
                            break;
                        case 'celular_cliente':
                            respuestas[i] = formatearCelular(respuestas[i]);

                            let input1 = document.createElement("input");
                            input1.setAttribute("type", "hidden");
                            input1.setAttribute("name", "datos[telefono_cliente]");
                            input1.setAttribute("value", respuestas[i]);
                            form.appendChild(input1);

                            let input2 = document.createElement("input");
                            input2.setAttribute("type", "hidden");
                            input2.setAttribute("name", "datos[whatsapp]");
                            input2.setAttribute("value", respuestas[i]);
                            form.appendChild(input2);

                            let input3 = document.createElement("input");
                            input3.setAttribute("type", "hidden");
                            input3.setAttribute("name", "datos[indicativo]");
                            input3.setAttribute("value", '<?= funcionMaster($_SESSION['ID'], 'ID', 'indicativo', 'usuarios') ?>');
                            form.appendChild(input3);

                            break;
                        case 'entidad_id':
                            respuestas[i] = formatearEPS(respuestas[i]);
                            break;
                    }
                    let input = document.createElement("input");
                    input.setAttribute("type", "hidden");
                    input.setAttribute("name", "datos[" + preguntas[i][0] + "]");
                    input.setAttribute("value", respuestas[i]);
                    form.appendChild(input);
                }
                // idPrincipal
                let input4 = document.createElement("input");
                input4.setAttribute("type", "hidden");
                input4.setAttribute("name", "datos[ID_principal]");
                input4.setAttribute("value", '<?= $_SESSION['ID_principal'] ?>');
                form.appendChild(input4);


                // boton submit
                let boton = document.createElement("button");
                boton.setAttribute("type", "submit");
                boton.setAttribute("onclick", "$('#vozForm').automaticForm({type: 1, idUpdate: 0, table: '" + tabla + "'})");
                form.appendChild(boton);
                // insertar
                console.log(form);
                document.body.appendChild(form);
                boton.click();
                // delete 
                form.remove();
                Assistant.say("Paciente registrado con éxito");
                insertarDictado("Paciente registrado con éxito", "0");
                comandosPrincipales();
            }


            if (commandId == 2) {
                // registro de citas
                let input1 = document.createElement("input");
                input1.setAttribute("type", "hidden");
                input1.setAttribute("name", "datos[doctor]");
                input1.setAttribute("value", '<?= $_SESSION['ID'] ?>');
                form.appendChild(input1);

                let input2 = document.createElement("input");
                input2.setAttribute("type", "hidden");
                input2.setAttribute("name", "datos[estado]");
                input2.setAttribute("value", '1');
                form.appendChild(input2);

                let input3 = document.createElement("input");
                input3.setAttribute("type", "hidden");
                input3.setAttribute("name", "datos[usuario_id]");
                input3.setAttribute("value", '<?= $_SESSION['ID'] ?>');
                form.appendChild(input3);

                let input4 = document.createElement("input");
                input4.setAttribute("type", "hidden");
                input4.setAttribute("name", "datos[tipo]");
                input4.setAttribute("value", '0');
                form.appendChild(input4);

                let input5 = document.createElement("input");
                input5.setAttribute("type", "hidden");
                input5.setAttribute("name", "datos[idCliente]");
                input5.setAttribute("value", '0');
                form.appendChild(input5);

                let input6 = document.createElement("input");
                input6.setAttribute("type", "hidden");
                input6.setAttribute("name", "datos[correo]");
                input6.setAttribute("value", '-');
                form.appendChild(input6);

                let input7 = document.createElement("input");
                input7.setAttribute("type", "hidden");
                input7.setAttribute("name", "datos[duracion]");
                input7.setAttribute("value", '<?= $tiempoConsulta ?>');
                form.appendChild(input7);

                let input8 = document.createElement("input");
                input8.setAttribute("type", "hidden");
                input8.setAttribute("name", "datos[registrado]");
                input8.setAttribute("value", new Date().toISOString().slice(0, 19));
                form.appendChild(input8);

                // idPrincipal
                let input9 = document.createElement("input");
                input9.setAttribute("type", "hidden");
                input9.setAttribute("name", "datos[ID_principal]");
                input9.setAttribute("value", '<?= $_SESSION['ID_principal'] ?>');
                form.appendChild(input9);

                var fechaBien = '';
                var horaBien = '';
                var disponible = false;
                for (let i = 0; i < preguntas.length; i++) {
                    // registro de paciente
                    switch (preguntas[i][0]) {
                        case 'fecha':
                            respuestas[i] = formatearFechaDMA(respuestas[i]);
                            if (respuestas[i] && respuestas[i].length == 10) { // ej 0000-00-00
                                fechaBien = respuestas[i];
                            }
                            break;
                        case 'hora':
                            respuestas[i] = formatearHoraCita(respuestas[i]);
                            if (respuestas[i] && respuestas[i].length == 8) { // ej 00:00:00
                                horaBien = respuestas[i];
                                preguntas[i][0] = 'Hora';
                            }
                            break;
                        case 'telefono':
                            respuestas[i] = formatearCelular(respuestas[i]);
                            break;
                    }
                    let input = document.createElement("input");
                    input.setAttribute("type", "hidden");
                    input.setAttribute("name", "datos[" + preguntas[i][0] + "]");
                    input.setAttribute("value", respuestas[i]);
                    form.appendChild(input);
                }

                if (fechaBien && horaBien && fechaBien.length == 10 && horaBien.length == 8) {
                    $.ajax({
                        url: '<?= $Base ?>/asistenteVirtual/disponibilidadHoraAsistente.php',
                        type: 'POST',
                        data: {
                            fecha: fechaBien,
                            Hora: horaBien,
                            doctor: '<?= $_SESSION['ID'] ?>',
                            sucursal: '0',
                            sala: '0',
                            idCitas: '0',
                        },
                        success: function(response) {
                            disponible = response;
                            console.log(disponible);
                            console.log(fechaBien, horaBien);
                            if (disponible == 'true' && fechaBien && horaBien) {
                                // todo bien
                                console.log(fechaBien, horaBien);

                                let input9 = document.createElement("input");
                                // hora + <?= $tiempoConsulta ?> minutos
                                var nuevaHora = sumarMinutosAHora(horaBien, '<?= $tiempoConsulta ?>')
                                input9.setAttribute("type", "hidden");
                                input9.setAttribute("name", "datos[horaF]");
                                input9.setAttribute("value", nuevaHora);
                                form.appendChild(input9);

                                // boton submit
                                let boton = document.createElement("button");
                                boton.setAttribute("type", "submit");
                                boton.setAttribute("onclick", "$('#vozForm').automaticForm({type: 1, idUpdate: 0, table: '" + tabla + "'})");
                                form.appendChild(boton);
                                // insertar
                                document.body.appendChild(form);
                                boton.click();
                                // delete 
                                form.remove();
                                Assistant.say("Cita registrada con éxito");
                                insertarDictado("Cita registrada con éxito", "0");
                                comandosPrincipales();
                            } else {
                                Assistant.say('La fecha y hora elegidas no están disponibles, intente nuevamente', {
                                    onEnd: function() {
                                        insertarDictado("La fecha y hora elegidas no están disponibles, intente nuevamente", "0");
                                        preguntar(preguntas, 0);
                                    }
                                })
                            }
                            console.log(form);
                        }
                    });
                } else {
                    Assistant.say('La fecha y hora elegidas incorrectamente, intente nuevamente', {
                        onEnd: function() {
                            insertarDictado("La fecha y hora elegidas incorrectamente, intente nuevamente", "0");
                            preguntar(preguntas, 0);
                        }
                    })
                }
            }



        }
    }

    // Función para preguntar la próxima pregunta
</script>
<!-- artyom config -->

<script>
    function filtrarOpcion(estado) {
        var divs = document.querySelectorAll('[data-categoria]');
        if (estado > 0) {
            for (var i = 0; i < divs.length; i++) {
                if (divs[i].getAttribute('data-categoria') != estado) {
                    $(divs[i]).fadeOut(Math.random() * 1500);
                    divs[i].style.display = 'none';
                } else {
                    $(divs[i]).fadeIn(Math.random() * 1500);
                    divs[i].style.display = 'block';
                }
            }
        } else {
            for (var i = 0; i < divs.length; i++) {
                $(divs[i]).fadeIn(Math.random() * 1500);
                divs[i].style.display = 'block';
            }
        }
    }
</script>
<script>
    function formatearFecha(fecha) {
        // Mapeo de nombres de meses a números
        var meses = {
            "enero": "01",
            "febrero": "02",
            "marzo": "03",
            "abril": "04",
            "mayo": "05",
            "junio": "06",
            "julio": "07",
            "agosto": "08",
            "septiembre": "09",
            "octubre": "10",
            "noviembre": "11",
            "diciembre": "12"
        };

        // Remover todo excepto letras y números
        var limpia = fecha.replace(/[^\w\s]/gi, '');
        // quitar espacios
        limpia = limpia.replace(/\s/g, '');

        // buscar el mes en el texto

        for (var mes in meses) {
            console.log(mes);
            console.log(mes, mes.length, limpia.slice(4, (4 + mes.length)).toLowerCase());
            if (mes.toLowerCase() === limpia.slice(4, (4 + mes.length)).toLowerCase()) {
                limpia = limpia.slice(0, 4) + meses[mes] + (limpia.slice((4 + mes.length)).length == 1 ? 0 + limpia.slice((4 + mes.length)) : limpia.slice((4 + mes.length)));
                break;
            }
        }

        // remover todo menos los numeros
        limpia = limpia.replace(/\D/g, '');

        // Determinar el formato de la fecha y obtener el año, mes y día correspondientes
        var anio, mes, dia;
        if (limpia.length === 8) { // Formato "AAAAMMDD"
            anio = limpia.slice(0, 4);
            mes = limpia.slice(4, 6);
            dia = limpia.slice(6);
        } else if (limpia.length === 6) { // Formato "AAAA MMDD"
            anio = limpia.slice(0, 4);
            mes = 0 + limpia.slice(4, 5);
            dia = 0 + limpia.slice(5);
        } else if (limpia.length === 10) { // Formato "AAAA mes DD"
            anio = limpia.slice(0, 4);
            mes = meses[limpia.slice(4, 6).toLowerCase()];
            dia = limpia.slice(6);
        } else {
            // si no se puede entonces se devuelve la fecha actual para no se rompa 💓
            return new Date().toISOString().slice(0, 10);
        }
        // Formatear la fecha en el formato AAAA-MM-DD
        var fechaFormateada = anio + '-' + mes + '-' + dia;
        return fechaFormateada;
    }
</script>
<script>
    function formatearNumeros(numero) {
        // quitar todo lo que no sea numero
        limpio = numero.replace(/[^\d]/g, '');
        return limpio;
    }
</script>
<script>
    function formatearTipoDocumento(tipoDoc) {
        var tiposDocumento = {
            "Cédula": "CC",
            "Cédula de ciudadanía": "CC",
            "Cédula de extranjería": "CE",
            "Tarjeta": "TI",
            "Tarjeta de identidad": "TI",
            "Registro Civil": "RC",
            "Cédula Digital": "CD",
            "Comprobante del tramite del documento": "CN",
            "NUIP": "NU",
            "Número Único de identificación": "NU",
            "Carnet de identidad": "NI",
            "Documento nacional de identidad": "NI",
            "PEP": "PE",
            "Permiso especial de permanencia": "PE",
            "Pasaporte": "PA",
            "Salvoconducto": "SC",
            "Adulto sin identidad": "AS",
            "Menor": "MS",
            "Menor sin identificación": "MS",
            "Permiso por Protección Temporal ": "PT",
            "PPT": "PT",
        }
        // quitar puntos solo dejar espacios y letras
        var limpia = tipoDoc.replace(/[^\w\s]/gi, '');
        // buscar el mes en el texto
        for (var doc in tiposDocumento) {
            if (doc.toLowerCase() === limpia.toLowerCase()) {
                return tiposDocumento[doc];
            }
        }
        return 'CC';
    }
</script>
<script>
    function formatearGenero(genero) {
        if (genero.toLowerCase() === 'masculino' || genero.toLowerCase() === 'hombre') {
            return 'M';
        } else if (genero.toLowerCase() === 'femenino' || genero.toLowerCase() === 'mujer') {
            return 'F';
        } else {
            return 'O';
        }
    }
</script>
<script>
    function formatearEPS(valor) {
        let arreglo = '<?= funcionMaster('1', '1', 'GROUP_CONCAT(id,"||",Nombre SEPARATOR "|/|")', 'Rips_Entidades') ?>';
        if (arreglo != '') {
            let resultadoSplit = arreglo.split('|/|');
            if (resultadoSplit.length > 0) {
                for (var i = 0; i < resultadoSplit.length; i++) {
                    if (resultadoSplit[i].split('||')[1].toLowerCase() === valor.toLowerCase()) {
                        return resultadoSplit[i].split('||')[0];
                    }
                }
            }
        }
        return '0';
    }
</script>
<script>
    function formatearPais(valor) {
        let arreglo = '<?= funcionMaster('1', '1', 'GROUP_CONCAT(Codigo,"||",Pais SEPARATOR "|/|")', 'Paises') ?>';
        if (arreglo != '') {
            let resultadoSplit = arreglo.split('|/|');
            if (resultadoSplit.length > 0) {
                for (var i = 0; i < resultadoSplit.length; i++) {
                    if (resultadoSplit[i].split('||')[1].toLowerCase() === valor.toLowerCase()) {
                        return resultadoSplit[i].split('||')[0];
                    }
                }
            }
        }
        return '0';
    }
</script>
<script>
    function formatearCiudad(valor) {
        let arreglo = '<?= funcionMaster('1', '1', 'GROUP_CONCAT(codigo,"||",nombre SEPARATOR "|/|")', 'departamentos') ?>';
        if (arreglo != '') {
            let resultadoSplit = arreglo.split('|/|');
            if (resultadoSplit.length > 0) {
                for (var i = 0; i < resultadoSplit.length; i++) {
                    if (resultadoSplit[i].split('||')[1].toLowerCase() === valor.toLowerCase()) {
                        return resultadoSplit[i].split('||')[0];
                    }
                }
            }
        }
        return '0';
    }
</script>
<script>
    function formatearCelular(valor) {
        let indicativo = '<?= funcionMaster($_SESSION['ID'], 'ID', 'indicativo', 'usuarios') ?>';
        // solo dejar números
        let limpia = valor.replace(/[^\d]/g, '');
        // agregar indicativo
        return indicativo + limpia;
    }
</script>
<script>
    function searchAndPlay(buscar) {
        var searchQuery = encodeURIComponent(buscar);
        var apiUrl = '<?= $Base ?>/asistenteVirtual/youtubeSearch.php?q=' + searchQuery;

        var player = document.getElementById('playerBody');
        document.getElementById('player').className = '';


        fetch(apiUrl)
            .then(response => response.text())
            .then(videoId => {
                if (videoId !== 'Video no encontrado') {
                    var embedUrl = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&controls=1';
                    var playerHtml = '<iframe width="400" height="200" src="' + embedUrl + '" title="YouTube video player" frameborder="0" allow=" autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin"></iframe>';
                    document.getElementById('playerBody').innerHTML = playerHtml;
                    Assistant.say("Reproduciendo");
                    insertarDictado("Reproduciendo", "0");
                    var iframe = document.querySelector('#player iframe');
                    iframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
                    document.getElementById('playerBody').innerHTML = playerHtml;
                    // display none
                    // document.getElementById('player').style.display = 'none';
                } else {
                    console.log('No se encontraron videos');
                }
            })
            .catch(error => {
                console.error('Error al buscar y reproducir la canción:', error);
            });
    }
</script>
<script>
    function formatearHoraCita(frase) {
        // Expresión regular para extraer la hora, los minutos y el período del día
        const regexHora = /(?:a\s*las\s*)?(\d{1,2}|una|dos|tres|cuatro|cinco|seis|siete|ocho|nueve|diez|once|doce)(?::?(\d{0,2}))?\s*(?:h|am|pm|de la mañana|de la tarde|de la noche)?/i;

        // Mapeo de números escritos en palabras a números
        const numEscritosANum = {
            'una': 1,
            'dos': 2,
            'tres': 3,
            'cuatro': 4,
            'cinco': 5,
            'seis': 6,
            'siete': 7,
            'ocho': 8,
            'nueve': 9,
            'diez': 10,
            'once': 11,
            'doce': 12
        };

        // Buscar la coincidencia en la frase
        const match = frase.match(regexHora);

        if (match) {
            let hora;
            const horaEscrita = match[1].toLowerCase();

            // Si la hora está escrita en palabras, conviértela a número
            if (numEscritosANum.hasOwnProperty(horaEscrita)) {
                hora = numEscritosANum[horaEscrita];
            } else {
                hora = parseInt(horaEscrita);
            }

            let minutos = match[2] ? parseInt(match[2]) : 0;
            let periodo = '';

            // Determinar el período del día si está presente
            if (/p.m|p. m|pm|de la tarde|de la noche/i.test(frase)) {
                periodo = 'pm';
                if (hora !== 12) {
                    if (hora < 12) {
                        hora += 12;
                    }
                }
            } else if (/am|de la mañana/i.test(frase)) {
                periodo = 'am';
                if (hora === 12) {
                    hora = 0;
                }
            }

            // Formatear la hora y los minutos a dos dígitos
            const horaFormateada = hora.toString().padStart(2, '0');
            const minutosFormateados = minutos.toString().padStart(2, '0');

            // Construir la cadena de salida en formato hora:minutos:segundos
            const horaFinal = `${horaFormateada}:${minutosFormateados}:00`;

            return horaFinal;
        } else {
            // Si no se encuentra una coincidencia, devuelve null
            return null;
        }
    }
    // pruebas
    // console.log(formatearHoraCita('a las 8')); // Output: "08:00:00"
    // console.log(formatearHoraCita('8 AM')); // Output: "08:00:00"
    // console.log(formatearHoraCita('8 de la mañana')); // Output: "08:00:00"
    // console.log(formatearHoraCita('a las 8:30 h de la mañana')); // Output: "08:30:00"
    // console.log(formatearHoraCita('a las 20:25 h de la noche')); // Output: "20:25:00"
    // console.log(formatearHoraCita('a las 8:45 h')); // Output: "08:45:00"
    // console.log(formatearHoraCita('a las 18:30 h de la tarde')); // Output: "18:30:00"
    // console.log(formatearHoraCita('a las 5:45 h')); // Output: "05:45:00"
    // console.log(formatearHoraCita('a las 5:45 h PM')); // Output: "17:45:00"
    // console.log(formatearHoraCita('a las cuatro pm')); // Output: "16:00:00"
    // console.log(formatearHoraCita('ocho am')); // Output: "08:00:00"
    // console.log(formatearHoraCita('cinco de la tarde')); // Output: "17:00:00"
</script>
<script>
    function formatearFechaDMA(fecha) {
        // Mapeo de nombres de meses a números
        var meses = {
            "enero": "01",
            "febrero": "02",
            "marzo": "03",
            "abril": "04",
            "mayo": "05",
            "junio": "06",
            "julio": "07",
            "agosto": "08",
            "septiembre": "09",
            "octubre": "10",
            "noviembre": "11",
            "diciembre": "12"
        };

        // Remover todo excepto letras y números
        var limpia = fecha.replace(/[^\w\s]/gi, '');

        // separar por espacios
        limpia = limpia.split(' ');

        // buscar el mes en el texto

        for (var mes in meses) {
            // buscar la primera coincidencia
            if (limpia.indexOf(mes) !== -1) {
                // reemplazar el mes con el valor correspondiente
                limpia = limpia.map(function(item) {
                    if (item === mes) {
                        return meses[item];
                    } else {
                        return item;
                    }
                }).join(' ');
                break;
            }
        }

        // remover todo menos los numeros y espacios
        limpia = limpia.replace(/[^0-9\s]/gi, '');
        limpia = limpia.split(' ');
        for (var i = 0; i < limpia.length; i++) {
            if (limpia[i].length === 0) {
                // remover el elemento vacío
                limpia.splice(i, 1);
            } else if (limpia[i].length === 1) {
                // colocarle un 0 antes
                limpia.splice(i, 1, '0' + limpia[i]);
            }
        }
        // acomodar los elementos en el orden correcto (yyyy-mm-dd)
        if (limpia.length === 3) {
            // yyyy-mm-dd
            limpia = limpia[2] + '-' + limpia[1] + '-' + (limpia[0].length === 1 ? '0' + limpia[0] : limpia[0]);
        }
        console.log(limpia);

        if (limpia.length === 10) {
            return limpia;
        } else {
            return false;
        }
    }
</script>
<script>
    function buscarDisponibilidad(fecha, hora) {
        $.ajax({
            url: '<?= $Base ?>/asistenteVirtual/disponibilidadHoraAsistente.php',
            type: 'POST',
            data: {
                fecha: fecha,
                Hora: hora,
                doctor: '<?= $_SESSION['ID'] ?>',
                sucursal: '0',
                sala: '0',
                idCitas: '0',
            },
            success: function(response) {
                console.log(response);
                return response;
            }
        });
    }
</script>
<script>
    function sumarMinutosAHora(horaString, minutosASumar) {
        // Parsear la hora dada en formato hh:mm:ss
        const horaPartes = horaString.split(':');
        let horas = parseInt(horaPartes[0]);
        let minutos = parseInt(horaPartes[1]);
        let segundos = parseInt(horaPartes[2] || 0);

        // Sumar los minutos
        minutos += minutosASumar;

        // Ajustar las horas y los minutos si los minutos superan los 59
        horas += Math.floor(minutos / 60);
        minutos = minutos % 60;

        // Asegurar que las horas estén en el rango de 0 a 23
        horas = horas % 24;

        // Formatear la nueva hora
        const nuevaHora = `${String(horas).padStart(2, '0')}:${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}`;

        return nuevaHora;
    }
</script>
<script>
    function insertarDictado(mensaje, usuario) {
        $.ajax({
            url: '<?= $Base ?>/asistenteVirtual/insertarDictado.php',
            type: 'POST',
            data: {
                mensaje: mensaje,
                usuario: usuario
            },
        });
    }
</script>
<script>
    //All catchable artyom errors will be catched with this
    Assistant.when("ERROR", function(error) {
        if (error.code == "network") {
            alert("Ha ocurrido un error, " + atob(localStorage.getItem("AssistantName")) + " no puede funcionar sin conexión a internet !");
        }

        if (error.code == "audio-capture") {
            alert("Ha ocurrido un error, " + atob(localStorage.getItem("AssistantName")) + " no puede funcionar sin un micrófono");
        }

        if (error.code == "not-allowed") {
            alert("Ha ocurrido un error, parece ser que el acceso a su micrófono esta denegado o no funciona");
        }
    });
    Assistant.when("SPEECH_SYNTHESIS_START", function() {
        animateCSS('#wavesAssistant', 'fadeInUp');
    });
    Assistant.when("SPEECH_SYNTHESIS_END", function() {
        animateCSS('#wavesAssistant', 'fadeOutDown');
    });
    Assistant.when("COMMAND_RECOGNITION_START", function() {
        // animateCSS('#wavesAssistant', 'fadeOutDown', 'd-none');
        animateCSS('#wavesUser', 'fadeInUp');
    });
    Assistant.when("COMMAND_RECOGNITION_END", function() {
        animateCSS('#wavesUser', 'fadeOutDown');
    });
</script>

<script>
    //Make the DIV element draggagle:
    dragElement(document.getElementById("player"));

    function dragElement(elmnt) {
        var pos1 = 0,
            pos2 = 0,
            pos3 = 0,
            pos4 = 0;
        // if (document.getElementById(elmnt.id + "header")) {
        //     /* if present, the header is where you move the DIV from:*/
        //     document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
        // } else {
        //     /* otherwise, move the DIV from anywhere inside the DIV:*/

        // }
        elmnt.onmousedown = dragMouseDown;

        function dragMouseDown(e) {
            e = e || window.event;
            e.preventDefault();
            // get the mouse cursor position at startup:
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            // call a function whenever the cursor moves:
            document.onmousemove = elementDrag;
        }

        function elementDrag(e) {
            e = e || window.event;
            e.preventDefault();
            // calculate the new cursor position:
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            // set the element's new position:
            elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
            elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
        }

        function closeDragElement() {
            /* stop moving when mouse button is released:*/
            document.onmouseup = null;
            document.onmousemove = null;
        }
    }
</script>


<!-- inicializar todo -->
<script>
    function inicializarTodo(boton) {
        Assistant.fatality();
        initializeAssistant();
        document.getElementById(boton).style.display = 'none';
        Assistant.say(atob(localStorage.getItem("AssistantWelcomeM")), {
            onEnd: function() {
                comandosPrincipales();
                insertarDictado(atob(localStorage.getItem("AssistantWelcomeM")), "0");
            }
        });

    }
</script>
<!-- inicializar todo -->