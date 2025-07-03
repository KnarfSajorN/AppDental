<script>
    // Es necesario agregar el plugin de sweetalert2 para la ventana de alertas
    // es necesario agregar el plugin de lottie para el icono que se visualiza al realizar el autoguardado

    var rutaActual = "";

    //Funcion para guardar los campos de la historia clinica en la base de datos
    function guardarValores(usuario_id, cliente_id) {
        //Se lee el formulario de la historia clinica que debera tener el id -> Formulario_Historia_RIAS
        var formulario = document.getElementById("Formulario_Historia_RIAS");
        //Se lee los inputs
        var inputs = formulario.getElementsByTagName("input");
        //Se lee los selects
        var selects = formulario.getElementsByTagName("select");
        //Se lee los textareas
        var textareas = formulario.getElementsByTagName("textarea");
        var valores = [];

        var ArregloDatosModal = {};
        //se agrega este arreglo que es para los modulos de Paraclinica, Incapacidad y Insumos los cuales sus valores se guardan en un input como arreglo y se manejan de manera distinta
        var ArregloCamposHiddenPermitidos_id = ["EscalaAbreviadaTablaPuntuacionHTML","familiograma_xml","ecomapa_xml"];
        var ArregloCamposHiddenEspecial = ["jsonDataEscala"];

        var ArregloDatosAntecedentesFamiliares = {};
        //essto es para el modulo de lactancia el que crea campos nuevo dependiendo la seleccion
        var ArregloTextareaAlimentacion= ["CamposDinamicosLactancia_1","CamposDinamicosLactancia_2","CamposDinamicosLactancia_3","CamposDinamicosLactancia_4","CamposDinamicosLactancia_5","CamposDinamicosLactancia_6","CamposDinamicosLactancia_7","CamposDinamicosLactancia_8",
    "CamposDinamicosLactancia_9","CamposDinamicosLactancia_10"];

        var ArregloSelectDiagnostico = ["CIE10Diagnostico_0","CIE10Diagnostico_1","CIE10Diagnostico_2"];

        var ArregloSelectExamenesCups = ["ExamenesCUPS_1","ExamenesCUPS_2","ExamenesCUPS_3"];

        var ArregloSelectExamenes = ["CIE10CUPS_1","CIE10CUPS_2","CIE10CUPS_3"];

  

        //Aquí recorre y guarda los inputs del formulario
        for (var i = 0; i < inputs.length; i++) {
            var input = inputs[i];
            if (input.type === "text" || input.type === "number" || input.type === "date" || input.type === "time" ) { // Filtrar solo campos de texto,numero y fecha
                var nombreCampo = input.name;
                var id = input.id;
                var valor = input.value;
                valor = valor.replace(/"/g, '\\"');

                var tipo_input = 'input';

                //essto es para el modulo de lactancia el que crea campos nuevo dependiendo la seleccion
                if (ArregloTextareaAlimentacion.includes(id)) {
                    tipo_input = "input_alimentacion";
                }


                //Aquí se guardara el campo con su valor nombre id y demás datos
                var campo = {
                    nombre: nombreCampo,
                    id: id,
                    valor: valor,
                    tipo: tipo_input
                };

                
                //Aquí se agrega al arreglo los datos guardados anteriormente
                valores.push(campo);
            } else if (input.type === "hidden") {
                var nombreCampo = input.name;
                var id = input.id;

                //en este if pregunta si el campo hidden corresponde a los arreglos que arriba tiene ese nombre para guardarlos de manera por separada en la tabla
                if (ArregloCamposHiddenPermitidos_id.includes(id)) {
                    var valor = input.value;

                    var campo = {
                    nombre: nombreCampo,
                    id: id,
                    valor: valor,
                    tipo: 'input'
                    };

                    valores.push(campo);

                    //console.log(campo);

                }

                if(ArregloCamposHiddenEspecial.includes(id)){
                    var valorCampo_jsonDataEscala = input.value;
                }

            } else if (input.type === "checkbox") {
                //Si el checkbox esta checkeado guardarlo en la tabla
                if (input.checked) {
                    var nombreCampo = input.name;
                    var id = input.id;
                    var valor = input.value;
                    //valor = valor.replace(/"/g, '\\"');

                    //Aquí se guardara el campo con su valor nombre id y demás datos
                    var campo = {
                        nombre: nombreCampo,
                        id: id,
                        valor: valor,
                        tipo: "checkbox"
                    }
                    //Aquí se agrega al arreglo los datos guardados anteriormente
                    valores.push(campo);
                }
            } else if (input.type === "radio") {
                //Si el radio esta checkeado guardarlo en la tabla
                if (input.checked) {

                    var nombreCampo = input.name;
                    var id = input.id;
                    var valor = input.value;
                    //valor = valor.replace(/"/g, '\\"');

                    //Aquí se guardara el campo con su valor nombre id y demás datos
                    var campo = {
                        nombre: nombreCampo,
                        id: id,
                        valor: valor,
                        tipo: "radio"
                    }

                    //Aquí se agrega al arreglo los datos guardados anteriormente
                    valores.push(campo);
                }
            }
        }




        // Guardar valores de campos de select
        for (var i = 0; i < selects.length; i++) {
            var select = selects[i];
            var nombreCampo = select.name;
            var id = select.id;
            var valor = select.value;
            //console.log(select.name+" "+select.value);

            var opcionesSeleccionadas = [];
            //Aquí se guardan todos las opciones seleccionadas si es multiple
            var opciones = select.querySelectorAll('option:checked');

            //Aqui se recorren las opciones seleccionadas
            for (var j = 0; j < opciones.length; j++) {
                var opcion = opciones[j];
                var valor = opcion.value;
                opcionesSeleccionadas.push(opcion.value);
            }
            var tipo_select = "select";

            
            if (ArregloSelectDiagnostico.includes(id)) {
                tipo_select = "select_diagnostico";
            }
            
            if (ArregloSelectExamenes.includes(id)) {
                tipo_select = "select_examenes";
            }

            if (ArregloSelectExamenesCups.includes(id)) {
                tipo_select = "select_examenesCups";
            }

            //Aquí se guardara el campo con su valor nombre id y demás datos
            var campo = {
                nombre: nombreCampo,
                id: id,
                valor: opcionesSeleccionadas,
                tipo: tipo_select
            };

            //Aquí se agrega al arreglo los datos guardados anteriormente
            valores.push(campo);
        }

        // Guardar valores de campos de textarea
        for (var i = 0; i < textareas.length; i++) {
            var textarea = textareas[i];
            var nombreCampo = textarea.name;
            var id = textarea.id;
            var valor = textarea.value;
            valor = valor.replace(/"/g, '\\"');

             //Aquí se guardara el campo con su valor nombre id y demás datos
            var campo = {
                nombre: nombreCampo,
                id: id,
                valor: valor,
                tipo: "textarea"
            };

            //Aquí se agrega al arreglo los datos guardados anteriormente
            valores.push(campo);
        }

        //Aquí se filtra si es un el nombre del campo incluye antecedentesFamiliares trae el arreglo y actualiza el tipo agregandole _Antecedente
        valores.forEach((objeto, index) => {
            if (objeto.nombre.includes("AntecedentesFamiliares")) {
                ArregloDatosAntecedentesFamiliares[index] = JSON.stringify(objeto);
                //ArregloDatosAntecedentesFamiliares.push(JSON.stringify(objeto));
                objeto.tipo = objeto.tipo + "_Antecedente";
                //valores.splice(index, 1);
            }
        });


        //////////////////////////? RUTA 2.0 ///////////////////////
        // Obtener la URL actual
        var url = window.location.href;
        // Remover cualquier texto después del '#'
        const rutaActual = url.split('#')[0];
        //////////////////////////? RUTA 2.0 ///////////////////////


        //var JsonModulo = ArregloDatosModal;
        //var filteredJsonString = JSON.stringify(ArregloDatosModal).replace(/\\"/g, "\"");
        //console.log(ArregloDatosModal);
        
        //console.log(valores);


        //Aquí se envian los datos para guardarlos 
        $.ajax({
            type: "POST",
            url: "RIAS_AutoGuardado_Ajax.php",
            data: {
                Campos: valores,
                CamposArrayModulos: ArregloDatosModal,
                CamposArrayAntecedentesFamiliares: ArregloDatosAntecedentesFamiliares,
                valorCampo_jsonDataEscala: valorCampo_jsonDataEscala,
                rutaActual: rutaActual,
                usuario_id: usuario_id,
                cliente_id: cliente_id,
                nombre_tabla: "<?=$Nombre_Tabla_autoguardado;?>",
                Tipo_Consulta: "Guardar Datos Historia Clinica"
            },
            success: function(response) {
                //console.log(response);

                var Respuesta = JSON.parse(response);
                if (Respuesta.Estado == "Success") {

                    // Crear los elementos de la alerta personalizada para la alerta de que guardo correctamente
                    var alertContainer = document.createElement('div');
                    alertContainer.className = 'ContainerAlerta';

                    var alertPopup = document.createElement('div');
                    alertPopup.className = 'PopUpAlerta';

                    var lottiePlayer = document.createElement('lottie-player');
                    lottiePlayer.src = 'https://assets5.lottiefiles.com/packages/lf20_lv93mXIJSa.json';
                    lottiePlayer.mode = 'bounce';
                    lottiePlayer.background = 'transparent';
                    lottiePlayer.speed = '0.5';
                    lottiePlayer.style.width = '60px';
                    lottiePlayer.style.height = '60px';
                    lottiePlayer.style.float = 'left';
                    lottiePlayer.loop = true;
                    lottiePlayer.autoplay = true;

                    var label = document.createElement('label');
                    label.textContent = 'Guardado';
                    label.style.float = 'left';
                    label.style.position = 'absolute';
                    label.style.top = '25px';

                    // Agregar los elementos a la alerta
                    alertPopup.appendChild(lottiePlayer);
                    alertPopup.appendChild(label);
                    alertContainer.appendChild(alertPopup);

                    // Agregar la alerta al DOM
                    document.body.appendChild(alertContainer);
                    

                    // Aplicar estilos CSS
                    alertContainer.style.position = 'fixed';
                    alertContainer.style.top = '67px';
                    alertContainer.style.right = '17px';
                    alertContainer.style.backgroundColor = '#bbe0f9';
                    alertContainer.style.padding = '5px';
                    alertContainer.style.color = 'white';
                    alertContainer.style.borderRadius = '5px';
                    alertContainer.style.width = '160px';

                    // Cerrar la alerta después de un tiempo determinado
                    setTimeout(function() {
                    document.body.removeChild(alertContainer);
                    }, 3000);


                } else if (Respuesta.Estado == "Fail") {

                    // Crear los elementos de la alerta personalizada para la alerta de que hubo error

                    var alertContainer = document.createElement('div');
                    alertContainer.className = 'ContainerAlerta';

                    var alertPopup = document.createElement('div');
                    alertPopup.className = 'PopUpAlerta';

                    var lottiePlayer = document.createElement('lottie-player');
                    lottiePlayer.src = 'https://assets2.lottiefiles.com/packages/lf20_yw3nyrsv.json';
                    lottiePlayer.mode = 'bounce';
                    lottiePlayer.background = 'transparent';
                    lottiePlayer.speed = '0.5';
                    lottiePlayer.style.width = '60px';
                    lottiePlayer.style.height = '60px';
                    lottiePlayer.style.float = 'left';
                    lottiePlayer.loop = true;
                    lottiePlayer.autoplay = true;

                    var label = document.createElement('label');
                    label.textContent = 'Error';
                    label.style.float = 'left';
                    label.style.position = 'absolute';
                    label.style.top = '25px';

                    // Agregar los elementos a la alerta
                    alertPopup.appendChild(lottiePlayer);
                    alertPopup.appendChild(label);
                    alertContainer.appendChild(alertPopup);

                    // Agregar la alerta al DOM
                    document.body.appendChild(alertContainer);
                    

                    // Aplicar estilos CSS
                    alertContainer.style.position = 'fixed';
                    alertContainer.style.top = '67px';
                    alertContainer.style.right = '17px';
                    alertContainer.style.backgroundColor = '#dc354594';
                    alertContainer.style.padding = '5px';
                    alertContainer.style.color = 'white';
                    alertContainer.style.borderRadius = '5px';
                    alertContainer.style.width = '160px';

                    // Cerrar la alerta después de un tiempo determinado
                    setTimeout(function() {
                    document.body.removeChild(alertContainer);
                    }, 3000);

                }


            }
        });

        //console.log(valores); // Puedes cambiar esto por tu lógica para guardar los valores donde necesites

        // Aquí puedes realizar cualquier otra operación con los valores guardados

    }





    // Esta funcion es para cargar los datos que se tengan guardados en el autoguardado
    function CargarDatosHistoria(usuario_id, cliente_id) {


        //////////////////////////? RUTA 2.0 ///////////////////////
        // Obtener la URL actual
        var url = window.location.href;
        // Remover cualquier texto después del '#'
        const rutaActual = url.split('#')[0];
        //////////////////////////? RUTA 2.0 ///////////////////////

        //Crear input en historia para enviar la ruta
        var inputHidden = document.createElement("input");
        inputHidden.type = "hidden";
        inputHidden.name = "Ruta_Historia_AutoGuardado";
        inputHidden.value = rutaActual;
        document.getElementById("Formulario_Historia_RIAS").appendChild(inputHidden);

        // Se hace una consulta jax para consultar el estado del autoguardado
        $.ajax({
            type: "POST",
            url: "RIAS_AutoGuardado_Ajax.php",
            data: {
                rutaActual: rutaActual,
                usuario_id: usuario_id,
                cliente_id: cliente_id,
                Tipo_Consulta: "Consultar Estado AutoGuardado"
            },
            success: function(response) {
                var Respuesta = JSON.parse(response);
                //console.log(Respuesta.Estado);



                // Si la respuesta es que si existe nos mostrara una ventana para elegir si cargar o no lo datos
                if (Respuesta.Estado == "Existe") {


                    
                    Swal.fire({
                        title: 'Existen datos guardados automáticamente para esta historia clinica, desea cargar los datos',
                        closeOnClickOutside: false,
                        allowOutsideClick: () => false,
                        showDenyButton: true,
                        showCancelButton: false,
                        confirmButtonText: 'Si',
                        denyButtonText: `No`,
                    }).then((result) => {
                        
                        // Si confirma cargar los datos consulta en ajax la información de los campos
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "RIAS_AutoGuardado_Ajax.php",
                                data: {
                                    rutaActual: rutaActual,
                                    usuario_id: usuario_id,
                                    cliente_id: cliente_id,
                                    Tipo_Consulta: "Cargar AutoGuardado"

                                }
                                ,success: function(response) {
                                    //convertimos la respuesta en arreglo
                                var Respuesta = JSON.parse(response);
                                console.log(Respuesta);

                                var ArregloMedicamentos = [];

                                //essto es para el modulo de lactancia el que crea campos nuevo dependiendo la seleccion
                                var ArregloLactancia = [];

                                var ArregloSRQ = [];
                                var ArregloRQC=[];
                                if (Respuesta.Campos != null) {
                                    //console.log(Respuesta.Campos);

                                    var Campos = Respuesta.Campos;

                                    //Aqui recorremos los campos que trajimos del ajax
                                    Campos.forEach(function(elemento) {
                                        var nombreCampo = elemento.nombre;
                                        //console.log(nombreCampo);

                                        //aqui reemplazamos el nombre si tiene tildes para que aparezcan correctamente
                                        if (nombreCampo != undefined) {
                                            var nombreCampo = nombreCampo.replace(/u00([0-9A-F]{2})/gi, function(match, p1) {
                                                return String.fromCharCode(parseInt(p1, 16));
                                            });
                                        }

                                        var valorCampo = elemento.valor;

                                        //document.querySelector('input[name="' + nombreCampo + '"]'); -> sirve para buscar inputs por un nombre
                                        //document.querySelector('textarea[tex="' + nombreCampo + '"]'); -> sirve para buscar textarea por un nombre
                                        //document.querySelector('select[name="' + nombreCampo + '"]'); -> sirve para buscar selects por nombre

                                        // Buscar el campo de entrada por nombre y actualizar su valor
                                        if (elemento.tipo == "input") {

                                            ////////////////////////////? Poner tildes ///////////////////////
                                            if (valorCampo != undefined) {
                                                 valorCampo = valorCampo.replace(/u00([0-9A-F]{2})/gi, function(match, p1) {
                                                    return String.fromCharCode(parseInt(p1, 16));
                                                });
                                            }
                                            ////////////////////////////? Poner tildes ///////////////////////

                                            var input = document.querySelector('input[name="' + nombreCampo + '"]');
                                            if (input) {
                                                input.value = valorCampo;
                                            }
                                        } else if (elemento.tipo == "textarea") {

                                            ////////////////////////////? Poner tildes ///////////////////////
                                            if (valorCampo != undefined) {
                                                 valorCampo = valorCampo.replace(/u00([0-9A-F]{2})/gi, function(match, p1) {
                                                    return String.fromCharCode(parseInt(p1, 16));
                                                });
                                            }
                                            ////////////////////////////? Poner tildes ///////////////////////

                                            valorCampo = valorCampo.replace(/<br>/g, "\n");


                                            var textarea = document.querySelector('textarea[name="' + nombreCampo + '"]');
                                            if (textarea) {
                                                textarea.value = valorCampo;
                                            }
                                        } else if (elemento.tipo == "select") {
                                            var select = document.querySelector('select[name="' + nombreCampo + '"]');
                                            if (select) {
                                                //console.log(valorCampo);
                                                var Valor = valorCampo;
                                                var Clases = select.className;
                                                //console.log(Valor+" "+nombreCampo);

                                                // Si el select usa clase select2 ejecutar esta funcion
                                                if (Clases.indexOf("select2") > -1) {
                                                    if (Valor != undefined) {
                                                        Valor.forEach(function(elemento) {

                                                            ////////////////////////////? Poner tildes ///////////////////////
                                                            if (elemento != undefined) {
                                                                elemento = elemento.replace(/u00([0-9A-F]{2})/gi, function(match, p1) {
                                                                    return String.fromCharCode(parseInt(p1, 16));
                                                                });
                                                            }
                                                            ////////////////////////////? Poner tildes ///////////////////////

                                                            //$('select[name="' + nombreCampo + '"]').append('<option value="' + elemento + '">' + elemento + '</option>');
                                                            $('select[name="' + nombreCampo + '"] > option[value="' + elemento + '"]').attr("selected", true);
                                                        })
                                                        $('select[name="' + nombreCampo + '"]').select2();
                                                    }


                                                } else {
                                                    // Aqui se ejecutara si es un select normal
                                                    if (Valor != undefined) {
                                                        Valor.forEach(function(elemento) {

                                                            ////////////////////////////? Poner tildes ///////////////////////
                                                            if (elemento != undefined) {
                                                                elemento = elemento.replace(/u00([0-9A-F]{2})/gi, function(match, p1) {
                                                                    return String.fromCharCode(parseInt(p1, 16));
                                                                });
                                                            }
                                                            ////////////////////////////? Poner tildes ///////////////////////
                                                            
                                                            $("select[name='" + nombreCampo + "']").val(elemento);
                                                            //console.log("select "+elemento);
                                                        })
                                                    }
                                                }

                                            }
                                        } else if (elemento.tipo == "checkbox") {
                                            if (nombreCampo != undefined) {
                                                valorCampo = valorCampo.replace(/u00([0-9A-F]{2})/gi, function(match, p1) {
                                                    return String.fromCharCode(parseInt(p1, 16));
                                                });
                                            }
                                            var check = document.querySelectorAll('input[name="' + nombreCampo + '"]');
                                            check.forEach(function(checkbox) {
                                                if (checkbox.value === valorCampo) {
                                                    checkbox.checked = true;
                                                }
                                            });

                                        } else if (elemento.tipo == "radio") {
                                            if (nombreCampo != undefined) {
                                                valorCampo = valorCampo.replace(/u00([0-9A-F]{2})/gi, function(match, p1) {
                                                    return String.fromCharCode(parseInt(p1, 16));
                                                });
                                            }
                                            var radio = document.querySelectorAll('input[name="' + nombreCampo + '"]');
                                            radio.forEach(function(radioinput) {
                                                if (radioinput.value === valorCampo) {
                                                    radioinput.checked = true;
                                                }
                                            });

                                        }

                                        // estos campos son para el modulo de recetas
                                        var ArregloCamposMedicamentos_id = ["medicamento_id", "Cantidad", "Presentacion", "Via_Administracion", "Composicion", "Dosis", "Indicaciones", "Indicaciones_Generales"];

                                        //le ordenamos la posicion a los campos para evitar errores al cargar el select del medicamento
                                        if (ArregloCamposMedicamentos_id.includes(elemento.id)) {
                                            var posicion = ArregloCamposMedicamentos_id.indexOf(elemento.id);
                                            ArregloMedicamentos.push({
                                                id: elemento.id,
                                                value: valorCampo,
                                                posicion: posicion
                                            });
                                        }

                                        //este es para el apartado de los cie10 que se generan cuando hay rips desactivados
                                        else if (elemento.tipo == "select_diagnostico") {
                                            var select = document.querySelector('select[name="' + nombreCampo + '"]');
                                            if (select) {
                                                //console.log(valorCampo);
                                                var Valor = valorCampo;
                                                var Clases = select.className;
                                                var id = elemento.id;
                                                var id_numerico = id.split("_")[1];
                                                //console.log(Valor+" "+nombreCampo);
                                                //Modulo_CIE10_Registro(id_numerico);

                                                // Si el select usa clase select2 ejecutar esta funcion
                                                if (Clases.indexOf("select2") > -1) {
                                                    if (Valor != undefined) {
                                                        Valor.forEach(function(elemento) {
                                                            $('select[name="' + nombreCampo + '"]').append('<option value="' + elemento + '">' + elemento + '</option>');
                                                            $('select[name="' + nombreCampo + '"] > option[value="' + elemento + '"]').attr("selected", true);
                                                        })
                                                        $('select[name="' + nombreCampo + '"]').change();
                                                    }

                                                }
                                                

                                            }
                                        }

                                        else if (elemento.tipo == "select_examenes") {
                                            var select = document.querySelector('select[name="' + nombreCampo + '"]');
                                            if (select) {
                                                //console.log(valorCampo);
                                                var Valor = valorCampo;
                                                var Clases = select.className;
                                                var id = elemento.id;
                                                //var id_numerico = id.split("_")[1];
                                                //console.log(Valor+" "+nombreCampo);
                                                //Modulo_CIE10_Registro(id_numerico);

                                                // Si el select usa clase select2 ejecutar esta funcion
                                                if (Clases.indexOf("select2") > -1) {
                                                    if (Valor != undefined) {
                                                        Valor.forEach(function(elemento) {
                                                            $('select[name="' + nombreCampo + '"]').append('<option value="' + elemento + '">' + elemento + '</option>');
                                                            $('select[name="' + nombreCampo + '"] > option[value="' + elemento + '"]').attr("selected", true);
                                                        })
                                                        $('select[name="' + nombreCampo + '"]').change();
                                                    }

                                                }
                                                

                                            }
                                        }

                                        else if (elemento.tipo == "select_examenesCups") {
                                            var select = document.querySelector('select[name="' + nombreCampo + '"]');
                                            if (select) {
                                                //console.log(valorCampo);
                                                var Valor = valorCampo;
                                                var Clases = select.className;
                                                var id = elemento.id;
                                                //var id_numerico = id.split("_")[1];
                                                //console.log(Valor+" "+nombreCampo);
                                                //Modulo_CIE10_Registro(id_numerico);

                                                // Si el select usa clase select2 ejecutar esta funcion
                                                if (Clases.indexOf("select2") > -1) {
                                                    if (Valor != undefined) {
                                                        Valor.forEach(function(elemento) {

                                                            $.ajax({
                                                                type: 'POST',
                                                                url: 'RIAS_AutoguardadoConsultaNombreCups.php',
                                                                data: {
                                                                    id: elemento,
                                                                },
                                                                success: function (response) {
                                                                    $('select[name="' + nombreCampo + '"]').append('<option value="' + elemento + '">' + response + '</option>');
                                                                    $('select[name="' + nombreCampo + '"] > option[value="' + elemento + '"]').attr("selected", true);
                                                                }
                                                            });

                                                            
                                                            
                                                        })
                                                        $('select[name="' + nombreCampo + '"]').change();
                                                    }

                                                }
                                                

                                            }
                                        }



                                        //essto es para el modulo de lactancia el que crea campos nuevo dependiendo la seleccion
                                        if(elemento.tipo=="input_alimentacion"){
                                            ArregloLactancia.push({
                                                id: elemento.id,
                                                value: valorCampo
                                            });
                                        }
                                        //essto es para el modulo de lactancia el que crea campos nuevo dependiendo la seleccion
                                        if(elemento.id=="AlimentacionLactancia"){

                                            MostrarDatos(valorCampo);
                                            
                                        }
                                        ////////////////////////////////////////////////////////////////////////////////////////////////////////////




                                        if(elemento.id == "CuestionarioRQC_SRQ"){
                                            CuestionarioRQC_SRQ = valorCampo[0];
                                            //console.log(valorCampo);
                                            CuestionarioRQC_SRQ1234(CuestionarioRQC_SRQ);
                                            document.getElementById("CuestionarioRQC_SRQ").value = CuestionarioRQC_SRQ;
                                        }

                                        
                                        //console.log(elemento.nombre);
                                        if (elemento.nombre.startsWith("encuesta1[") || elemento.nombre.startsWith("encuesta2[") || elemento.nombre.startsWith("encuesta3[") || elemento.nombre.startsWith("encuesta4[")) {
                                            var miCampo = document.getElementsByName(elemento.nombre)[0];
                                            //console.log(miCampo);
                                            miCampo.dispatchEvent(new Event("change"));
                                        }

                                        //console.log(elemento.id);
                                        if(elemento.id == "familiograma_xml"){
                                            //console.log(valorCampo);
                                            document.getElementById("MapaConceptual_Familiograma").src = valorCampo;
                                            if(valorCampo != ""){
                                                document.getElementById("MapaConceptual_Familiograma").style.display = "block";
                                            }else{
                                                document.getElementById("MapaConceptual_Familiograma").style.display = "none";
                                                document.getElementById("MapaConceptual_Familiograma").src = "data:image/svg+xml;base64,";
                                            }
                                        }

                                        if(elemento.id == "ecomapa_xml"){
                                            //console.log(valorCampo);
                                            document.getElementById("MapaConceptual_Ecomapa").src = valorCampo;
                                            if(valorCampo != ""){
                                                document.getElementById("MapaConceptual_Ecomapa").style.display = "block";
                                            }else{
                                                document.getElementById("MapaConceptual_Ecomapa").style.display = "none";
                                                document.getElementById("MapaConceptual_Ecomapa").src = "data:image/svg+xml;base64,";
                                            }
                                        }



                                    });

                                    //essto es para el modulo de lactancia el que crea campos nuevo dependiendo la seleccion
                                    if(ArregloLactancia.length>0){
                                        ArregloLactancia.forEach(function(elemento) {
                                            var id = elemento.id;
                                            var valor = elemento.value;

                                            $("#"+id).val(valor);
                                        });
                                    }

                                    if(Respuesta.valorCampo_jsonDataEscala!=""){
                                        $("#jsonDataEscala").val(Respuesta.valorCampo_jsonDataEscala);
                                    }


                                    if(ArregloRQC.length>0){
                                        ArregloRQC.forEach(function(elemento) {
                                            var id = elemento.id;
                                            var valor = elemento.value;

                                           // Buscar todos los elementos con el mismo nombre
                                                    var radioButtons = document.getElementsByName(nombre);

                                            // Iterar sobre los radio buttons encontrados
                                            radioButtons.forEach(function(radioButton) {
                                                // Verificar si el valor coincide y es un radio button
                                                if (radioButton.type === 'radio' && radioButton.value === valor) {
                                                    radioButton.checked = true; // Marcar el radio button si coincide
                                                }
                                            });
                                        })
                                    }

                                    if(ArregloSRQ.length>0){
                                        ArregloSRQ.forEach(function(elemento) {
                                            var id = elemento.id;
                                            var valor = elemento.value;

                                           // Buscar todos los elementos con el mismo nombre
                                                    var radioButtons = document.getElementsByName(nombre);

                                            // Iterar sobre los radio buttons encontrados
                                            radioButtons.forEach(function(radioButton) {
                                                // Verificar si el valor coincide y es un radio button
                                                if (radioButton.type === 'radio' && radioButton.value === valor) {
                                                    radioButton.checked = true; // Marcar el radio button si coincide
                                                }
                                            });
                                        })
                                    }

                                    //Modulo Antecedentes Familiares
                                    /*
                                    if (Respuesta.Arreglo_Familiares != "") {

                                        var ArregloFamiliar = JSON.parse(Respuesta.Arreglo_Familiares);
                                        //console.log(ArregloFamiliar);
                                        

                                        var numeros = []; // Arreglo para almacenar los números extraídos del nombre
                                        var numeroEliminar = [];
                                        ArregloFamiliar.forEach(objeto => {
                                            var nombreSplit = objeto.nombre.split('[')[1].split(']')[0]; // Extraer el número del nombre
                                            var numero = parseInt(nombreSplit); // Convertir a número entero
                                            numeros.push(numero); // Agregar el número al arreglo
                                        });

                                        var numeroMasAlto = Math.max(...numeros);

                                        for (var i = 0; i <= numeroMasAlto; i++) {
                                            //console.log(i);
                                            if (numeros.includes(i)) {
                                                //aqui se ejecuta la funcion del antecedente familiar
                                                AgregarFamiliar();
                                            } else {
                                                //aqui se ejecuta la funcion del antecedente familiar
                                                AgregarFamiliar();
                                                numeroEliminar.push(i);
                                                //console.log(i + " eliminar");
                                            }
                                        }

                                        for (var i = 0; i < numeroEliminar.length; i++) {
                                            var numero = numeroEliminar[i];
                                            // aqui se elimina el antecedente familiar
                                            EliminarFamiliar(numero);
                                        }

                                        //document.querySelector('input[name="' + nombreCampo + '"]'); -> sirve para buscar inputs por un nombre
                                        //document.querySelector('textarea[tex="' + nombreCampo + '"]'); -> sirve para buscar textarea por un nombre
                                        //document.querySelector('select[name="' + nombreCampo + '"]'); -> sirve para buscar selects por nombre
                                        
                                        //aqui se recorre el modulo de antecedentes familiares para agregarles los valores a los inputs,select y textareas creados arriba con la funcion AgregarFamiliar();
                                        ArregloFamiliar.forEach(function(elemento) {
                                            var nombreCampo = elemento.nombre;
                                            var valorCampo = elemento.valor;
                                            if (elemento.tipo == "input") {

                                                //Aquí se busca el campo y si existe ingresa el valor al campo
                                                var input = document.querySelector('input[name="' + nombreCampo + '"]');
                                                if (input) {
                                                    input.value = valorCampo;
                                                }
                                            } else if (elemento.tipo == "textarea") {

                                                //aqui se reemplaza el <br> por el salto de linea
                                                valorCampo = valorCampo.replace(/<br>/g, "\n");


                                                var textarea = document.querySelector('textarea[name="' + nombreCampo + '"]');
                                                if (textarea) {
                                                    textarea.value = valorCampo;
                                                }
                                            } else if (elemento.tipo == "select") {
                                                var select = document.querySelector('select[name="' + nombreCampo + '"]');
                                                if (select) {
                                                    //console.log(valorCampo);
                                                    var Valor = valorCampo;
                                                    var Clases = select.className;
                                                    //console.log(Valor+" "+nombreCampo);

                                                    // Si el select usa clase select2 ejecutar esta funcion
                                                    if (Clases.indexOf("select2") > -1) {
                                                        if (Valor != undefined) {
                                                            var contador = 0;
                                                            Valor.forEach(function(elemento) {
                                                                $('select[name="' + nombreCampo + '"]').append('<option value="' + elemento + '">' + elemento + '</option>');
                                                                $('select[name="' + nombreCampo + '"] > option[value="' + elemento + '"]').attr("selected", true);
                                                                contador++;
                                                            })
                                                            if (contador != 0) {
                                                                $('select[name="' + nombreCampo + '"]').change();
                                                            }

                                                        }
                                                    }

                                                }
                                            }

                                        });
                                    }
                                    */

                                    ////////////////////////? OPCIONAL MODULO RECETARIO /////////////////////////////////////////////////////////////////////////////////
                                    ////////////////////////? OPCIONAL MODULO RECETARIO /////////////////////////////////////////////////////////////////////////////////
                                    ////////////////////////? OPCIONAL MODULO RECETARIO /////////////////////////////////////////////////////////////////////////////////
                                    
                                    //Aqui se organiza la posicion de los campos del recetario
                                    ArregloMedicamentos.sort(function(a, b) {
                                        return a.posicion - b.posicion;
                                    });

                                    //Aqui se recorre los campos del recetario
                                    ArregloMedicamentos.forEach(function(elemento) {
                                        if (elemento.id == "medicamento_id") {
                                            //aqui agrega el select de la lista de medicamentos
                                            $("#medicamento_id > option[value='" + elemento.value + "']").attr("selected", true);
                                            $("#medicamento_id").select2();
                                        } else if (elemento.id == "Presentacion") {
                                            //aqui agrega la presentiacion del medicamento
                                            $("#Presentacion > option[value='" + elemento.value + "']").attr("selected", true);
                                            $("#Presentacion").change();
                                        } else if (elemento.id == "Via_Administracion") {
                                            //aqui agrega la via de administracion del medicamento
                                            $("#Via_Administracion > option[value='" + elemento.value + "']").attr("selected", true);
                                            $("#Via_Administracion").change();
                                        } else if (elemento.id == "Composicion" || elemento.id == "Dosis") {
                                            //aqui agrega la composicion y dosis ademas de reemplazar el <br> por el salto de linea correspondiente
                                            var inputrecetario = document.querySelector('input[id="' + elemento.id + '"]');
                                            if (inputrecetario) {
                                                valorCampo = elemento.value.replace(/<br>/g, "\n");
                                                inputrecetario.value = valorCampo;
                                            }
                                        } else if (elemento.id == "Indicaciones" || elemento.id == "Indicaciones_Generales") {
                                             //aqui agrega las indicaciones del medicamento ademas de reemplazar el <br> por el salto de linea correspondiente
                                            var textarea = document.querySelector('textarea[id="' + elemento.id + '"]');
                                            if (textarea) {
                                                valorCampo = elemento.value.replace(/<br>/g, "\n");
                                                textarea.value = valorCampo;
                                            }
                                        }
                                    });

                                    ////////////////////////? [FIN] OPCIONAL MODULO RECETARIO /////////////////////////////////////////////////////////////////////////////////
                                    ////////////////////////? [FIN] OPCIONAL MODULO RECETARIO /////////////////////////////////////////////////////////////////////////////////
                                    ////////////////////////? [FIN] OPCIONAL MODULO RECETARIO /////////////////////////////////////////////////////////////////////////////////

                                    //aqui agrega una alerta que se cargaron los datos
                                    Swal.fire(
                                        'Completado!',
                                        'Se han Cargado los Datos!',
                                        'success'
                                    );

                                    //aqui comienza a ejecutar la funcion para guardar los datos del autoguardado cada 10 segundos
                                    setInterval(function() {
                                        guardarValores(<?= $usuariod_id_autoguardado ?>, <?= $cliente_id_autoguardado ?>);
                                    }, 10000);
                                } else {

                                    //aqui ingresa si dio error el autoguardado y actualiza la fila del autoguardado para mantener esos datos y que no se borren y ver cual fue el error
                                    $.ajax({
                                        type: "POST",
                                        url: "RIAS_AutoGuardado_Ajax.php",
                                        data: {
                                            rutaActual: rutaActual,
                                            usuario_id: usuario_id,
                                            cliente_id: cliente_id,
                                            Tipo_Consulta: "Cargar Estado Error Autoguardado"
                                        },
                                        success: function(response) {
                                            //console.log(response);
                                            var Respuesta = JSON.parse(response);
                                            if(Respuesta.Estado == "Fail") {
                                                //aqui se actualiza la pagina si dio error la actualizacion del autoguardado
                                                setInterval(function() {
                                                    window.location.reload();
                                                }, 3000);
                                            }

                                        }
                                    });

                                    Swal.fire(
                                        'Error, los datos almacenados están dañados, realizar un nuevo registro!',
                                    )
                                    
                                    //aqui comienza a ejecutar la funcion para guardar los datos del autoguardado cada 10 segundos
                                    setInterval(function() {
                                        guardarValores(<?= $usuariod_id_autoguardado ?>, <?= $cliente_id_autoguardado ?>);
                                    }, 10000);


                                }
                                }
                            });

                        } else {

                            //aqui comienza a ejecutar la funcion para guardar los datos del autoguardado cada 10 segundos
                            setInterval(function() {
                                guardarValores(<?= $usuariod_id_autoguardado ?>, <?= $cliente_id_autoguardado ?>);
                            }, 10000);
                        }

                    })

                } else {

                    //aqui comienza a ejecutar la funcion para guardar los datos del autoguardado cada 10 segundos
                    setInterval(function() {
                        guardarValores(<?= $usuariod_id_autoguardado ?>, <?= $cliente_id_autoguardado ?>);
                    }, 10000);

                }
            }
        });

    }

    // actualize el id de la historia, la lista de tipo de consulta, RM_Recetario las listas fueron actualizadas, agregar script no admitir comillas simples, actualizar el guardar historia


    $(document).ready(function() {
        //aqui comienza a ejecutar la funcion para cargar los datos de la historia al momento que se termine de cargar el html 
        CargarDatosHistoria(<?= $usuariod_id_autoguardado ?>, <?= $cliente_id_autoguardado ?>);
    });
</script>
<style>
    .ContainerAlerta {
        margin: 0 !important;
    }

    .PopUpAlerta {
        width: 50% !important;
    }
</style>