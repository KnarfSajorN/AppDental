<script>
    // Es necesario agregar el plugin de sweetalert2 para la ventana de alertas
    // es necesario agregar el plugin de lottie para el icono que se visualiza al realizar el autoguardado

    var rutaActual = "";

    //Funcion para guardar los campos de la historia clinica en la base de datos
    function guardarValores(usuario_id, cliente_id) {
        //
        var ids = [<?=$HistoriasClinicasAutoguardado_id;?>];

        var valores = [];

        var CamposPersonalizados = []; //Esta variable se usa para el envio y carga de campos personalizados

        var ArregloDatosModal = {};
        //se agrega este arreglo que es para los modulos de Paraclinica, Incapacidad y Insumos los cuales sus valores se guardan en un input como arreglo y se manejan de manera distinta
        var ArregloCamposHiddenPermitidos_id = ["Arreglo_Paraclinicos", "Arreglo_Incapacidades", "Arreglo_Insumos"];

        var ArregloDatosAntecedentesFamiliares = {};
        //se agrega este arreglo para el modulo de diagnostico cie10 que aparece en la parte inferior del formulario
        var ArregloSelectCIE10_id = ["cie10"];


        ids.forEach(function(id) {
            var formulario = document.getElementById(id);

            var historia_id = id;

            //Se lee los inputs
            var inputs = formulario.getElementsByTagName("input");
            //Se lee los selects
            var selects = formulario.getElementsByTagName("select");
            //Se lee los textareas
            var textareas = formulario.getElementsByTagName("textarea");
            

            //Aquí recorre y guarda los inputs del formulario
            for (var i = 0; i < inputs.length; i++) {
                var input = inputs[i];
                if (input.type === "text" || input.type === "number" || input.type === "date" || input.type === "time") { // Filtrar solo campos de texto,numero y fecha
                    var nombreCampo = input.name;
                    var id = input.id;
                    var valor = input.value;
                    valor = valor.replace(/"/g, '\\"');

                    //Aquí se guardara el campo con su valor nombre id y demás datos
                    var campo = {
                        nombre: nombreCampo,
                        id: id,
                        valor: valor,
                        tipo: "input",
                        historia:historia_id
                    };

                    //Aquí se agrega al arreglo los datos guardados anteriormente
                    valores.push(campo);
                } else if (input.type === "hidden") {
                    var nombreCampo = input.name;
                    var id = input.id;

                    //en este if pregunta si el campo hidden corresponde a los arreglos que arriba tiene ese nombre para guardarlos de manera por separada en la tabla
                    if (ArregloCamposHiddenPermitidos_id.includes(id)) {
                        var valor = input.value;

                        var id1 = input.id;
                        var jsonObject = JSON.parse(valor);
                        var jsonString = JSON.stringify(jsonObject);

                        //Aquí se guardara el arreglo que contiene el campo
                        ArregloDatosModal[id1] = jsonString;

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
                            tipo: "checkbox",
                            historia:historia_id
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
                            tipo: "radio",
                            historia:historia_id
                        }

                        //Aquí se agrega al arreglo los datos guardados anteriormente
                        valores.push(campo);
                    }
                }


                //Personalizado para el creador de historias
                //Personalizado para el creador de historias
                //Personalizado para el creador de historias
            
                if (input.type === "hidden" && input.classList.contains("Botones_Creador_Historia")) {
                    //console.log(input);
                    var nombreCampo = input.name;
                    var id = input.id;
                    var valor = input.value;
                    valor = valor.replace(/"/g, '\\"');

                    //Aquí se guardara el campo con su valor nombre id y demás datos
                    var campo = {
                        nombre: nombreCampo,
                        id: id,
                        valor: valor,
                        tipo: "hidden_botones",
                        historia:historia_id
                    };

                    //Aquí se agrega al arreglo los datos guardados anteriormente
                    valores.push(campo);
                    
                } 

                

                //Personalizado para el creador de historias
                //Personalizado para el creador de historias
                //Personalizado para el creador de historias
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

                //Aqui entra si el id del select incluye algunos de los ids arriba agregados en el arregloselectCIE10
                if (ArregloSelectCIE10_id.includes(id)) {
                    tipo_select = "select_cie10";
                }

                //Aquí se guardara el campo con su valor nombre id y demás datos
                var campo = {
                    nombre: nombreCampo,
                    id: id,
                    valor: opcionesSeleccionadas,
                    tipo: tipo_select,
                    historia:historia_id
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
                    tipo: "textarea",
                    historia:historia_id
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





        });
        // Obtener la ruta actual del archivo
        //rutaActual = window.location.href;

        //Obtener la ruta y el get y que no tome otros campos como #modal o # etc que pueden da;ar el codigo
        /*
        const {
            pathname,
            searchParams
        } = new URL(window.location.href);
        const clienteId = searchParams.get('clienteId');
        const rutaActual = pathname + (clienteId ? `?clienteId=${clienteId}` : '');
        */

        /*
        //////////////////////////? RUTA 2.0 ///////////////////////
        // Obtener la URL actual
        var url = window.location.href;
        // Remover cualquier texto después del '#'
        const rutaActual = url.split('#')[0];
        //////////////////////////? RUTA 2.0 ///////////////////////
        */

        //////////////////////////? RUTA 2.0 - Solo para el creador de historias///////////////////////
        const rutaActual = "<?=$RutaFinal_Encryptado;?>";
        //////////////////////////? RUTA 2.0 - Solo para el creador de historias///////////////////////



        //var JsonModulo = ArregloDatosModal;
        //var filteredJsonString = JSON.stringify(ArregloDatosModal).replace(/\\"/g, "\"");
        //console.log(ArregloDatosModal);



        //Aquí se envian los datos para guardarlos 
        $.ajax({
            type: "POST",
            url: "AutoGuardados/HistoriaEncryptadaMultiple/AutoGuardado_Encryptado_Ajax.php",
            data: {
                Campos: valores,
                CamposArrayModulos: ArregloDatosModal,
                CamposArrayAntecedentesFamiliares: ArregloDatosAntecedentesFamiliares,

                CamposPersonalizados:CamposPersonalizados,//enviar campos personalizados

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

                    /*
                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        //timerProgressBar: true,
                        customClass: {
                            htmlContainer: "ContainerAlerta",
                            popup: 'PopUpAlerta'
                        },
                        html: '<lottie-player src="https://assets5.lottiefiles.com/packages/lf20_lv93mXIJSa.json" mode="bounce" background="transparent" speed="0.5" style="width: 60px; height: 60px;float:left;" loop autoplay></lottie-player><label style="    float: left;position: absolute;top: 37px;"> Guardado </label>'
                    });
                    */

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

                    /*
                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        //timerProgressBar: true,
                        customClass: {
                            htmlContainer: "ContainerAlerta",
                            popup: 'PopUpAlerta'
                        },
                        html: '<lottie-player src="https://assets2.lottiefiles.com/packages/lf20_yw3nyrsv.json" mode="bounce" speed="2" background="transparent" speed="0.5" style="width: 60px; height: 60px;float:left;" loop autoplay></lottie-player><label style="    float: left;position: absolute;top: 37px;"> Error </label>'
                    });
                    */

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

        // Obtener la ruta actual del archivo
        //rutaActual = window.location.href;


        //Obtener la ruta y el get y que no tome otros campos como #modal o # etc que pueden da;ar el codigo
        /*
        const {
            pathname,
            searchParams
        } = new URL(window.location.href);
        const clienteId = searchParams.get('clienteId');
        const rutaActual = pathname + (clienteId ? `?clienteId=${clienteId}` : '');*/

        /*
        //////////////////////////? RUTA 2.0 ///////////////////////
        // Obtener la URL actual
        var url = window.location.href;
        // Remover cualquier texto después del '#'
        const rutaActual = url.split('#')[0];
        //////////////////////////? RUTA 2.0 ///////////////////////
        */

        //////////////////////////? RUTA 2.0 - Solo para el creador de historias///////////////////////
        const rutaActual = "<?=$RutaFinal_Encryptado;?>";
        //////////////////////////? RUTA 2.0 - Solo para el creador de historias///////////////////////

        var ids = [<?=$HistoriasClinicasAutoguardado_id;?>];

        ids.forEach(function(id) {
            
            //Crear input en historia para enviar la ruta
            var inputHidden = document.createElement("input");
            inputHidden.type = "hidden";
            inputHidden.name = "Ruta_Historia_AutoGuardado";
            inputHidden.value = rutaActual;
            document.getElementById(id).appendChild(inputHidden);

        });
        

        // Se hace una consulta jax para consultar el estado del autoguardado
        $.ajax({
            type: "POST",
            url: "AutoGuardados/HistoriaEncryptadaMultiple/AutoGuardado_Encryptado_Ajax.php",
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
                                url: "AutoGuardados/HistoriaEncryptadaMultiple/AutoGuardado_Encryptado_Ajax.php",
                                data: {
                                    rutaActual: rutaActual,
                                    usuario_id: usuario_id,
                                    cliente_id: cliente_id,
                                    Tipo_Consulta: "Cargar AutoGuardado"

                                }
                                ,success: function(response) {
                                    //convertimos la respuesta en arreglo
                                var Respuesta = JSON.parse(response);
                                //console.log(Respuesta);

                                var ArregloMedicamentos = [];

                                if (Respuesta.Campos != null) {
                                    //console.log(Respuesta.Campos);

                                    var Campos = Respuesta.Campos;


                                    //Aqui recorremos los campos que trajimos del ajax
                                    Campos.forEach(function(elemento) {
                                        var nombreCampo = elemento.nombre;

                                        var HistoriaId = elemento.historia;
                                        var DocumentHistoria = document.getElementById(HistoriaId);

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

                                            var input = DocumentHistoria.querySelector('input[name="' + nombreCampo + '"]');
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


                                            var textarea = DocumentHistoria.querySelector('textarea[name="' + nombreCampo + '"]');
                                            if (textarea) {
                                                textarea.value = valorCampo;
                                            }
                                        } else if (elemento.tipo == "select") {
                                            var select = DocumentHistoria.querySelector('select[name="' + nombreCampo + '"]');
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

                                                            var option = select.querySelector('option[value="' + elemento + '"]');
                                                            if (option) {
                                                                option.selected = true;
                                                            }
                                                        })
                                                        $(select).select2();
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
                                                            
                                                            $(select).val(elemento);
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
                                            var check = DocumentHistoria.querySelectorAll('input[name="' + nombreCampo + '"]');
                                            check.forEach(function(checkbox) {
                                                if (checkbox.value === valorCampo) {
                                                    checkbox.checked = true;

                                                    if (checkbox.parentElement && checkbox.parentElement.classList.contains('icheckbox_minimal-blue')) {
                                                        checkbox.parentElement.classList.add('checked');
                                                    }

                                                }
                                            });

                                        } else if (elemento.tipo == "radio") {
                                            if (nombreCampo != undefined) {
                                                valorCampo = valorCampo.replace(/u00([0-9A-F]{2})/gi, function(match, p1) {
                                                    return String.fromCharCode(parseInt(p1, 16));
                                                });
                                            }
                                            var radio = DocumentHistoria.querySelectorAll('input[name="' + nombreCampo + '"]');
                                            radio.forEach(function(radioinput) {
                                                if (radioinput.value === valorCampo) {
                                                    radioinput.checked = true;
                                                    // Agrega una clase al elemento padre del input
                                                    if (radioinput.parentElement && radioinput.parentElement.classList.contains('iradio_flat-green')) {
                                                        radioinput.parentElement.classList.add('checked');
                                                    }
                                                }
                                            });

                                        }

                                        /*
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
                                        else if (elemento.tipo == "select_cie10") {
                                            var select = DocumentHistoria.querySelector('select[name="' + nombreCampo + '"]');
                                            if (select) {
                                                //console.log(valorCampo);
                                                var Valor = valorCampo;
                                                var Clases = select.className;
                                                //console.log(Valor+" "+nombreCampo);

                                                // Si el select usa clase select2 ejecutar esta funcion
                                                if (Clases.indexOf("select2") > -1) {
                                                    if (Valor != undefined) {
                                                        Valor.forEach(function(elemento) {
                                                            $('select[name="' + nombreCampo + '"]').append('<option value="' + elemento + '">' + elemento + '</option>');
                                                            $('select[name="' + nombreCampo + '"] > option[value="' + elemento + '"]').attr("selected", true);
                                                        })
                                                        $('select[name="' + nombreCampo + '"]').select2();
                                                    }

                                                }

                                            }
                                        }
                                        */

                                        



                                    });


                                    
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
                                        url: "AutoGuardados/HistoriaEncryptadaMultiple/AutoGuardado_Encryptado_Ajax.php",
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
        console.log("2312321");
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