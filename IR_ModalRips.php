<?php
if ($rips_activo == "1") :
?>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .float {
            position: fixed;
            width: 50px;
            height: 50px;
            top: 140px;
            right: 0px;
            background-color: #3c8dbc;
            color: #FFF;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
            border-radius: 10px 0px 0px 10px;

            background: rgb(250, 235, 215);
            background: -moz-radial-gradient(circle, rgb(80 98 171) 30%, rgba(60, 141, 176, 1) 100%);
            background: -webkit-radial-gradient(circle, rgb(80 98 171) 30%, rgba(60, 141, 176, 1) 100%);
            background: radial-gradient(circle, rgb(80 98 171) 30%, rgba(60, 141, 176, 1) 100%);
        }

        .float .my-float {
            margin-top: 17px;
        }
    </style>
    <style type="text/css">
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #3c8dbc;
        }

        :root {
            --size-font: 15px;
        }

        .form__group {
            position: relative;
            padding: 20px 0 0;
            margin-top: 10px;
            padding-right: 20px;
        }

        .form__field {
            font-family: inherit;
            width: 100%;
            border: 0;
            border-bottom: 2px solid #9b9b9b;
            outline: 0;
            font-size: var(--size-font);
            color: black;
            padding: 7px 0;
            background: transparent;
            transition: border-color 0.2s;
        }

        /* para select2*/
        .form__group>span {
            font-family: inherit;
            width: 100%;
            border: 0;
            border-bottom: 2px solid #9b9b9b;
            outline: 0;
            font-size: var(--size-font);
            color: black;
            padding: 4px 0;
            background: transparent;
            transition: border-color 0.2s;
            width: 100% !important;
        }

        .form__group>textarea {
            height: 300px;
            border: 2px solid #9b9b9b;
            padding: 20px;
            position: relative;
            top: 10px;
        }



        .form__group .select2-selection {
            border: none;
            padding-left: 0;
        }

        .form__group .select2-selection__arrow {
            top: 10px !important;
        }

        .form__field~.select2-container .select2-selection--single {
            height: 27px !important;
            padding: 5px !important;
        }

        /*
        .select2-container *:focus~.form__label {
            position: absolute;
            top: 0;
            display: block;
            transition: 0.2s;
            font-size: var(--size-font);
            color: #3c8dbc;
            font-weight: 700;
        }
        */

        /* cierre para select 2 */



        .form__field::placeholder {
            color: transparent;
        }

        .form__field:placeholder-shown~.form__label {
            font-size: var(--size-font);
            cursor: text;
            top: 20px;
        }

        .form__field[type=date] {
            font-size: calc(var(--size-font)*0.9);
        }

        .form__label {
            position: absolute;
            top: 0;
            display: block;
            transition: 0.2s;
            font-size: var(--size-font);
            color: #9b9b9b;
        }

        .form__field:focus {
            padding-bottom: 6px;
            font-weight: 700;
            border-width: 3px;
            border-image: linear-gradient(to right, #2881b3, #a3cadc);
            border-image-slice: 1;
        }

        .form__field:focus~.form__label {
            position: absolute;
            top: 0;
            display: block;
            transition: 0.2s;
            font-size: var(--size-font);
            color: #3c8dbc;
            font-weight: 700;
        }

        /* reset input */
        .form__field:required,
        .form__field:invalid {
            box-shadow: none;
        }



        .fill:hover,
        .fill:focus {
            box-shadow: inset 0 0 0 2em var(--hover);
        }

        .pulse:hover,
        .pulse:focus {
            animation: pulse 1s;
            box-shadow: 0 0 0 2em rgba(255, 255, 255, 0);
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 var(--hover);
            }
        }

        .pulse {
            --color: #3c8dbc;
            --hover: #3c8dbc;
        }
    </style>

    <?php
    $clienteId = $_GET["clienteId"];
    $usuario_rip = $_SESSION["ID"];

    include 'funciones/conn3.php';

    ?>

    <a href="#" class="float" data-toggle="modal" data-target="#ModalRips">
        <i class="my-float fa fa-book"></i>
    </a>

    <div class="modal fade bd-example-modal-lg" id="ModalRips" role="dialog" aria-labelledby="ModalRips" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="statusMsg"></p>
                    <h5 class="modal-title" id="exampleModalLabel">Informacion para Rips</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formulario_rip">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12" align="center">
                                    <label style="font-size:20px;color:#3c8dbc;">Consulta</label>
                                </div>
                                <div class="form__group col-md-6">
                                    <select class="form__field select2" id="TipoConsulta" onchange="TipoConsultaRip(this.value)" data-placeholder="Seleccione la Consulta" data-requerida="Si">
                                        <option value="" selected> Seleccione</option>
                                        <!--
                                        <option value="1">Consulta médica general</option>
                                        <option value="2">Consulta de control</option>
                                        <option value="3">Consulta Médica de urgencias </option>
                                        <option value="4">Consulta Médica Domiciliaria </option>
                                        <option value="5">Consulta de Medicina alternativa </option>
                                        <option value="6">Consulta odontológica </option>
                                        <option value="7">Consulta odontológica de urgencias </option>
                                        -->
                                        <?php
                                        $QueryConsulta = mysqli_query($conn3, "SELECT * FROM tipoConsultaGeneral ");
                                        while ($RowConsulta = mysqli_fetch_array($QueryConsulta)) {
                                            $id = $RowConsulta['id'];
                                            $nombre = utf8_encode($RowConsulta['nombre']);

                                            echo "<option value='$id'> $nombre </option>";
                                        }
                                        ?>

                                    </select>
                                    <label for="TipoConsulta" class="form__label">Seleccione la Consulta</label>
                                </div>
                                <div class="form__group col-md-6">
                                    <select class="form__field select2" id="CodigoTipoConsulta" name="Tipo_Consulta" data-placeholder="Seleccione" data-requerida="Si">

                                    </select>
                                    <label for="CodigoTipoConsulta" class="form__label">Seleccione el Tipo de Consulta</label>
                                </div>

                                <div class="form__group col-md-6">
                                    <select class="form__field " id="CIE10-Principal" name="CIE10_1" onclick="Buscar_CIE10('Principal');" data-placeholder="CIE - 11" data-requerida="Si">
                                        <option value="">Seleccione... </option>
                                    </select>
                                    <label for="CIE10-Principal" class="form__label">Código del Diagnóstico principal</label>
                                </div>
                                <div class="form__group col-md-6">
                                    <select class="form__field " id="CIE10-1" name="CIE10_2" onclick="Buscar_CIE10('1');" data-placeholder="CIE - 11">
                                        <option value="">Ninguno </option>
                                    </select>
                                    <label for="CIE10-1" class="form__label">Código del Diagnóstico relacionado N° 1</label>
                                </div>
                                <div class="form__group col-md-6">
                                    <select class="form__field " id="CIE10-2" name="CIE10_3" onclick="Buscar_CIE10('2');" data-placeholder="CIE - 11">
                                        <option value="">Ninguno </option>
                                    </select>
                                    <label for="CIE10-2" class="form__label">Código del Diagnóstico relacionado N° 2</label>
                                </div>
                                <div class="form__group col-md-6">
                                    <select class="form__field " id="CIE10-3" name="CIE10_4" onclick="Buscar_CIE10('3');" data-placeholder="CIE - 11">
                                        <option value="">Ninguno </option>
                                    </select>
                                    <label for="CIE10-3" class="form__label">Código del Diagnóstico relacionado N° 3</label>
                                </div>

                                <div class="form__group col-md-6">
                                    <select class="form__field select2" id="Finalidad_Consulta" name="Finalidad_Consulta" data-placeholder="Seleccione la Finalidad" data-requerida="Si">
                                        <option value="" selected> Seleccione</option>
                                        <option value="01"> Atención del parto</option>
                                        <option value="02"> Atención Recién Nacido </option>
                                        <option value="03"> Atención Planificación familiar</option>
                                        <option value="04"> Detección alteraciones de crecimiento y desarrollo en menor de 10 años</option>
                                        <option value="05"> Detección de alteración del desarrollo joven</option>
                                        <option value="06"> Detección de alteraciones del embarazo</option>
                                        <option value="07"> Detección de alteraciones del adulto</option>
                                        <option value="08"> Detección de alteraciones de agudeza visual</option>
                                        <option value="09"> Detección de Enfermedad Profesional</option>
                                        <option value="10"> No aplica</option>
                                    </select>
                                    <label for="Finalidad_Consulta" class="form__label">Finalidad de la consulta</label>
                                </div>
                                <div class="form__group col-md-6">
                                    <select class="form__field select2" id="Causa_Externa" name="Causa_Externa" data-placeholder="Seleccione la Causa Externa" data-requerida="Si">
                                        <option value="" selected> Seleccione</option>
                                        <option value="01"> Accidente de trabajo</option>
                                        <option value="02"> Accidente de tránsito</option>
                                        <option value="03"> Accidente rábico</option>
                                        <option value="04"> Accidente ofídico</option>
                                        <option value="05"> Otro tipo de accidente</option>
                                        <option value="06"> Evento catatrósfico</option>
                                        <option value="07"> Lesión por agresión</option>
                                        <option value="08"> Lesión auto infligida</option>
                                        <option value="09"> Sospecha de maltrato físico</option>
                                        <option value="10"> Sospecha de abuso sexual</option>
                                        <option value="11"> Sospecha de violencia sexual</option>
                                        <option value="12"> Sospecha de maltrato emocional</option>
                                        <option value="13"> Enfermedad general</option>
                                        <option value="14"> Enfermedad profesional</option>
                                        <option value="15"> Otra</option>
                                    </select>
                                    <label for="Causa_Externa" class="form__label">Causa Externa</label>
                                </div>

                                <div class="form__group col-md-6">
                                    <input type="number" class="form__field" id="Numero_Autorizacion" name="Numero_Autorizacion">
                                    <label for="Numero_Autorizacion" class="form__label">Número de Autorización</label>
                                </div>

                                <div class="form__group col-md-6">
                                    <select class="form__field select2" id="Tipo_Diagnostico" name="Tipo_Diagnostico" data-placeholder="Seleccione el Tipo de Diagnostico" data-requerida="Si">
                                        <option value="" selected> Seleccione</option>
                                        <option value="1"> Impresión diagnóstica </option>
                                        <option value="2"> Confirmado nuevo </option>
                                        <option value="3"> Confirmado repetido </option>
                                    </select>
                                    <label for="Tipo_Diagnostico" class="form__label">Tipo de Diagnóstico Principal</label>
                                </div>

                                <div class="col-md-12 form__group">
                                    <hr style="border: 2px solid #9b9b9b;">
                                </div>

                                <div class="col-md-12" align="center">
                                    <label style="font-size:20px;color:#3c8dbc;">Procedimiento</label>
                                </div>

                                <div class="form__group col-md-6">
                                    <select class="form__field select2" id="Ambito_Realizacion" name="Ambito_Realizacion" data-placeholder="Seleccione.." data-requerida="No">
                                        <option value="" selected> Seleccione</option>
                                        <option value="1"> Ambulatorio </option>
                                        <option value="2"> Hospitalario </option>
                                        <option value="3"> En urgencias </option>
                                    </select>
                                    <label for="Ambito_Realizacion" class="form__label">Ambito de realizacion del procedimiento</label>
                                </div>

                                <div class="form__group col-md-6">
                                    <select class="form__field Cup_Select2" id="CUP_id" name="CUP_id" data-placeholder="Seleccione.." onchange="CodigoCup(this.value)" data-requerida="No">
                                        <option value="" selected> Seleccione</option>
                                    </select>
                                    <label for="CUP_id" class="form__label" id="Texto_CUP">CUPS</label>
                                </div>

                                <input type="hidden" id="CUP" name="CUP"><!-- esto es llenado por javascript-->
                                <label for="CUP" class="form__label" style="display:none">Codigo CUP</label>

                                <div class="form__group col-md-6">
                                    <select class="form__field select2" id="Finalidad_Procedimiento" name="Finalidad_Procedimiento" data-placeholder="Seleccione.." data-requerida="No">
                                        <option value="" selected> Seleccione</option>
                                        <option value="1"> Diagnóstico </option>
                                        <option value="2"> Terapeútico </option>
                                        <option value="3"> Protección específica </option>
                                        <option value="4"> Detección temprana en enfermedad general </option>
                                        <option value="5"> Detección temprana en enfermedad profesional </option>
                                        <option value="6"> Promover la salud integral en los niños, niñas, adolescentes y jóvenes. </option>
                                        <option value="7"> Promover la salud sexual y reproductiva. </option>
                                        <option value="8"> Promover la salud en la tercera edad. </option>
                                        <option value="9"> Promover la convivencia pacífica con énfasis en el ámbito intrafamiliar. </option>
                                        <option value="10"> Desestimular la exposición al tabaco, al alcohol y a las sustancias psicoactivas </option>
                                        <option value="11"> Promover las condiciones sanitarias del ambiente intradomiciliario. </option>
                                        <option value="12"> Incrementar el conocimiento de los afiliados en los derechos y deberes. </option>
                                        <option value="13"> Promover la Lactancia materna. </option>
                                        <option value="14"> Promoción de la salud enfermedades crónicas. </option>
                                        <option value="15"> Control o seguimiento de crónicas. </option>
                                        <option value="16"> Promoción de hábitos alimentarios </option>
                                        <option value="17"> Detección de Alteraciones en la Gestante </option>
                                    </select>
                                    <label for="Finalidad_Procedimiento" class="form__label">Finalidad del procedimiento</label>
                                </div>

                                <div class="form__group col-md-6">
                                    <select class="form__field select2" id="Personal_Atiende" name="Personal_Atiende" data-placeholder="Seleccione.." data-requerida="No">
                                        <option value="" selected> Seleccione</option>
                                        <option value="1"> Médico especialista </option>
                                        <option value="2"> Médico General </option>
                                        <option value="3"> Enfermera </option>
                                        <option value="4"> Auxiliar de enfermera </option>
                                        <option value="5"> Otro </option>
                                    </select>
                                    <label for="Personal_Atiende" class="form__label">Personal que atiende</label>
                                </div>

                                <div class="form__group col-md-6">
                                    <select class="form__field " id="CIE10-Complicacion" name="Complicacion" onclick="Buscar_CIE10('Complicacion');" data-placeholder="Complicacion">
                                        <option value="">Seleccione... </option>
                                    </select>
                                    <label for="CIE10-Principal" class="form__label">Código del Diagnóstico principal</label>
                                </div>

                                <div class="form__group col-md-6">
                                    <select class="form__field select2" id="Acto_Quirurgico" name="Acto_Quirurgico" data-placeholder="Seleccione.." data-requerida="No">
                                        <option value="" selected> Seleccione</option>
                                        <option value="1"> Único o unilateral </option>
                                        <option value="2"> Multiple o bilateral, misma vía diferente especialidad </option>
                                        <option value="3"> Múltiple o bilateral, misma vía igual especialidad </option>
                                        <option value="4"> Múltiple o bilateral, diferente vía, diferente especialidad </option>
                                        <option value="5"> Múltiple o bilateral, diferente vía. Igual especialidad </option>
                                    </select>
                                    <label for="Acto_Quirurgico" class="form__label">Forma de realización del acto quirúrgico</label>
                                </div>

                                <div class="form__group col-md-12">
                                    <input type="number" class="form__field" id="Valor_Procedimiento" name="Valor_Procedimiento" value="0" data-requerida="No">
                                    <label for="Valor_Procedimiento" class="form__label">Valor del Procedimiento</label>
                                </div>

                            </div>
                        </div>

                        <input type="hidden" name="cliente_id" value="<?php echo $clienteId; ?>">
                        <input type="hidden" name="usuario_id" value="<?php echo $usuario_rip; ?>">

                    </form>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="SubmitRIPS()">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function TipoConsultaRip(tipoConsulta) {
            $.ajax({
                type: "POST",
                url: "IR_Ajax_Rips.php",
                data: {
                    tipoConsulta: tipoConsulta,
                    Tipo: "Consulta"
                },
                success: function(response) {
                    $('#CodigoTipoConsulta').html(response);

                }
            });
        };

        function SubmitRIPS() {
            formulario_rip = document.getElementById("formulario_rip");
            var elem = formulario_rip.querySelectorAll("input, select");
            var contador = 0;
            var Datos = $("#formulario_rip").serialize();

            elem.forEach(function(userItem) {
                //console.log(userItem);
                //console.log(userItem.getAttribute('data-requerida'));
                if (userItem.value == "" && userItem.getAttribute('data-requerida') == "Si") {
                    alert('Falta por llenar el campo : ' + $('label[for="' + userItem.getAttribute('id') + '"]').html());
                    contador++;
                }
            });


            if (contador > 0) {
                $('.statusMsg').html('<span style="color:red;">Por favor rellene todos los campos.</span>');
                return false;
            }
            $('.statusMsg').html('<span style="color:green;">Los datos han sido cargados a la historia correctamente, al guardar la historia, se guardaran estos datos de los RIPS.</p>');

            document.getElementById("validacionrips").value = "Rips Llenados Correctamente";

            var node = document.createElement("input");
            node.type = "hidden";
            node.name = "RIP";
            node.value = Datos;
            //document.getElementsByTagName("form")[0].appendChild(node);

            // Obtener una referencia al elemento, antes de donde queremos insertar el elemento
            var sp2 = document.getElementById("validacionrips");
            // Obtener una referencia al nodo padre
            var parentDiv = sp2.parentNode;
            // Inserta un nuevo elemento en el DOM antes de sp2
            parentDiv.insertBefore(node, sp2.nextElementSibling);

            var div1 = document.createElement("div");
            div1.style = "padding: 10px;position: relative;top: 20px;";
            div1.innerHTML = '<svg width="32px" height="32px" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M2 16C2 8.26801 8.26801 2 16 2C23.732 2 30 8.26801 30 16C30 23.732 23.732 30 16 30C8.26801 30 2 23.732 2 16ZM20.9502 14.2929C21.3407 13.9024 21.3407 13.2692 20.9502 12.8787C20.5597 12.4882 19.9265 12.4882 19.536 12.8787L14.5862 17.8285L12.4649 15.7071C12.0744 15.3166 11.4412 15.3166 11.0507 15.7071C10.6602 16.0977 10.6602 16.7308 11.0507 17.1213L13.8791 19.9498C14.2697 20.3403 14.9028 20.3403 15.2933 19.9498L20.9502 14.2929Z" fill="#3A52EE"/></svg><label style="top: -11px;position: relative;">Cargado</label>';

            parentDiv.insertBefore(div1, sp2);

        }

        var campo = document.createElement('input'); //creating element
        campo.className = "form-group";
        campo.required = "required";
        campo.id = "validacionrips";
        campo.title = "Para validar este campo, dirigirse al boton que se encuentra en el lado derecho superior"
        campo.placeholder = "No esta diligenciado los RIPS";

        campo.addEventListener("keydown", function() {
            return false;
        });
        campo.style = "width: 100%;padding:10px 16px;border: none;";

        var list = document.querySelector("form > .box-body > .box-group");
        if (list != null) {

            var children = list.childNodes;
            numero = "";
            for (child in children) {
                if (children[child].name == "clienteId") {
                    numero = child;
                }
            }
            if (numero == "") {
                numero = 0;
            }

        } else {
            var list = document.querySelector("form");
            numero = 0;
        }

        list.insertBefore(campo, list.childNodes[numero]);

        $("#validacionrips").on('keydown paste focus mousedown', function(e) {
            if (e.keyCode != 9) // ignore tab
                e.preventDefault();
        });
    </script>
<?php else : ?>

    <script>
        var div = document.createElement('div'); //creating element
        div.className = "panel box box-primary";
        div.style = "display:inline-block;width:100%";
        input1 = "<div class='col-md-12'><label> Código del Diagnóstico principal </label> <select name = 'DiagnosticoConsultaMedica[CIE10_1]' id = 'CIE10-Principal' onclick = 'Buscar_CIE10(\"Principal\");' style = 'width:100%'> <option value=' '> Seleccione... </option></select></div>";
        input2 = "<div class='col-md-12'><label> Código del Diagnóstico relacionado N° 1 </label> <select name = 'DiagnosticoConsultaMedica[CIE10_2]' id = 'CIE10-1' onclick = 'Buscar_CIE10(\"1\");' style = 'width:100%'> <option value=' '> Seleccione... </option></select></div>";
        input3 = "<div class='col-md-12'><label> Código del Diagnóstico relacionado N° 2 </label> <select name = 'DiagnosticoConsultaMedica[CIE10_3]' id = 'CIE10-2' onclick = 'Buscar_CIE10(\"2\");' style = 'width:100%'> <option value=' '> Seleccione... </option></select></div>";
        input4 = "<div class='col-md-12'><label> Código del Diagnóstico relacionado N° 3 </label> <select name = 'DiagnosticoConsultaMedica[CIE10_4]' id = 'CIE10-3' onclick = 'Buscar_CIE10(\"3\");' style = 'width:100%'> <option value=' '> Seleccione... </option></select></div>";

        Estilo1 = "background: radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(215,250,244,1) 100%);background: -webkit-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(215,250,244,1) 100%);background: -moz-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(215,250,244,1) 100%);";
        Estilo2 = "border-width: 5px; border-style: solid; border-color: transparent; -webkit-border-image: -webkit-linear-gradient(top, rgb(58, 207, 213) 0%, rgb(58, 78, 213) 100%); border-image: radial-gradient(circle, rgb(250, 235, 215) 0%, rgb(215, 250, 244) 100%) 1 / 1 / 0 stretch;";
        div.innerHTML += '<div class="box-header with-border" style="' + Estilo1 + '"><h4 class="box-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseRIPS" onclick="Buscar_CIE10(\'Principal\');Buscar_CIE10(\'1\');Buscar_CIE10(\'2\');Buscar_CIE10(\'3\');"> Diagnósticos CIE-11</a></h4></div><div id="collapseRIPS" class="panel-collapse collapse" style="' + Estilo2 + '"><div class="box-body">' + input1 + input2 + input3 + input4;

        div.innerHTML += '</div></div>';

        var list = document.querySelector("form > .box-body > .box-group");
        if (list != null) {

            var children = list.childNodes;
            numero = "";
            for (child in children) {
                if (children[child].name == "clienteId") {
                    numero = child;
                }
            }

            if (numero == "") {
                numero = 0;
            }
        } else {
            var list = document.querySelector("form");
            numero = 0;
        }

        list.insertBefore(div, list.childNodes[numero]);
    </script>
<?php endif; ?>

<script>
    function Buscar_CIE10(Valor) {
        console.log("buscando");
        $("#CIE10-" + Valor).select2({
            allowClear: true,
            ajax: {
                url: "IR_Ajax_Rips.php",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    console.log('estoy en data');
                    return {
                        searchTerm: params.term, // search term
                        Tipo: "CIE10"
                    };
                },
                processResults: function(response) {
                    console.log(response);
                    return {
                        results: response
                        
                    };
                },
                cache: true
            }
        });
    };


    function CodigoCup(valor) {
        $.ajax({
            type: "POST",
            url: "IR_Ajax_Rips.php",
            data: {
                cup_id: valor,
                Tipo: "CodigoCup"
            },
            success: function(response) {
                $('#CUP').val(response),
                    $('#Texto_CUP').text("CUP - " + response);

            }
        });

    }

    $(document).ready(function() {
        setTimeout(function() {
            Buscar_CIE10('Principal');
        Buscar_CIE10('1');
        Buscar_CIE10('2');
        Buscar_CIE10('3');
        Buscar_CIE10('Complicacion');
        }, 3000);
       

        contrato = $("#contrato").val();
        $(".Cup_Select2").select2({
            allowClear: true,
            ajax: {
                url: "IR_Ajax_Rips.php",
                dataType: 'json',
                type: 'POST',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term,
                        contrato: window.contrato,
                        Tipo: "CUP"
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

    });

    //si no funciona el document.ready es por que en el footer esta molestando el ckeditor que tiene "$(function () { CKEDITOR" quitarlo y poner el de estetica
</script>