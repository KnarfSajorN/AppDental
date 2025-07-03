
                                       
                                       <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_2_SubPrincipal_1">
                                                        2.1 Signos vitales
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_2_SubPrincipal_1" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <?php

         
                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSignosVitales = [
                                                            "SignosVitales_PASA" => "Presion Arterial Sistolica Acostado (mmHg)",
                                                            "SignosVitales_PADA" => "Presion Arterial Diastolica Acostado (mmHg)",
                                                            "SignosVitales_PASS" => "Presion Arterial Sistolica Sentado (mmHg)",
                                                            "SignosVitales_PADS" => "Presion Arterial Diastolica Sentado (mmHg)",
                                                            "SignosVitales_PASP" => "Presion Arterial Sistolica de Pie (mmHg)",
                                                            "SignosVitales_PADP" => "Presion Arterial Diastolica de Pie (mmHg)",
                                                            "SignosVitales_PAM" => "Presion Arterial Media (mmHg)",
                                                            "NULL" => "NULL",
                                                            "SignosVitales_Pulso" => "Pulso",
                                                            "SignosVitales_FrecuenciaCardiaca" => "Frecuencia Cardiaca",
                                                            "SignosVitales_FrecuenciaRespiratoria" => "Frecuencia Respiratoria",
                                                            "SignosVitales_TemperaturaCorporal" => "Temperatura Corporal (C°)",
                                                            "SignosVitales_Peso" => "Peso Corporal (Kg)",
                                                            "SignosVitales_Altura" => "Altura (cm)",
                                                            "SignosVitales_IMC" => "IMC",
                                                            "SignosVitales_ComposicionCorporal" => "Composición Corporal",
                                                            "SignosVitales_SaturacionOxigeno" => "Saturacion Oxigeno (%)",
                                                            "SignosVitales_PerimetroCefalico" => "Perimetro Cefalico",
                                                            "SignosVitales_CircunferenciaAbdominal" => "Circunferencia Abdominal (cm)",
                                                            "SignosVitales_CircunferenciaCintura" => "Circunferencia de Cintura (cm)",
                                                            "SignosVitales_PorcentajeGrasa" => "Porcentaje de Grasa Corporal (%)"
                                                        ];

                                                        $ArregloClasesFuncinInputDuplicado = [];
                                                        $ArregloClasesFuncinInputDuplicado["SignosVitales_Peso"]="InputPeso_Funcion";
                                                        $ArregloClasesFuncinInputDuplicado["SignosVitales_Altura"]="InputAltura_Funcion";
                                                        $ArregloClasesFuncinInputDuplicado["SignosVitales_IMC"]="InputIMC_Funcion";
                                                        $ArregloClasesFuncinInputDuplicado["SignosVitales_PerimetroCefalico"]="InputPerimetroCefalico_Funcion";

                                                        $ArregloReadOnly = [];
                                                        $ArregloReadOnly['SignosVitales_IMC'] = "readOnly";

                                                        foreach ($ArreglosCamposSignosVitales as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           
                                                            if($Titulo!="NULL" AND $Identificacion!="SignosVitales_ComposicionCorporal"){
                                                                echo"
                                                                <div class='form-group col-md-4'>
                                                                    <label>$Titulo</label><br>
                                                                    <input type='number' step='0.01' class='form-control $ArregloClasesFuncinInputDuplicado[$Identificacion]' name='SignosVitales[SignosVitales][$Identificacion][$Titulo]' id='$Identificacion' $ArregloReadOnly[$Identificacion]>
                                                                </div>";
                                                            }elseif($Identificacion=="SignosVitales_ComposicionCorporal"){
                                                                echo"
                                                                <div class='form-group col-md-4'>
                                                                    <label>$Titulo</label>*<br>
                                                                    <input type='text' class='form-control' name='SignosVitales[SignosVitales][$Identificacion][$Titulo]' id='$Identificacion' >
                                                                </div>";
                                                            }
                                                            else{
                                                                echo"
                                                                <div class='form-group col-md-4'>
                                                                &nbsp;
                                                                </div>";
                                                            }
                                                            
                                                        }
                                                        ?>



                                                        <label style="color:red;">* Los campos Peso,Altura,IMC,Perimetro Cefalico tendran el mismo valor que se agregue ya sea en este modulo 2.1 o en el modulo 2.3 por lo que si se modifica aqui se modificara en  el modulo 2.3 y viceversa *</label>
                                                    

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->

                                        <script>
                                            /*
                                            function IMC() {
                                                m1 = document.getElementById("SignosVitales_Peso").value;
                                                m2 = document.getElementById("SignosVitales_Altura").value;
                                                 r = m1 / ((m2 / 100) * (m2 / 100));
                                                document.getElementById("SignosVitales_IMC").value = r.toFixed(2);
                                                var ComposicionCorporal4 ="";
                                                if (r.toFixed(2) < 18.49)
                                                    ComposicionCorporal4 = 'Delgadez o bajo peso';
                                                else if (r.toFixed(2) > 18.50 & r.toFixed(2) < 24.99)
                                                    ComposicionCorporal4 = 'Normal';
                                                else if (r.toFixed(2) > 25.00 & r.toFixed(2) < 29.99)
                                                    ComposicionCorporal4 = 'Sobrepeso';
                                                else if (r.toFixed(2) > 30.00)
                                                    ComposicionCorporal4 = 'Obesidad';
                                                document.getElementById("SignosVitales_ComposicionCorporal").value = ComposicionCorporal4;
                                            }
                                            */
                                            function IMC() {
                                                
                                                m1 = document.getElementById("SignosVitales_Peso").value;
                                                m2 = document.getElementById("SignosVitales_Altura").value;
                                                 r = m1 / ((m2 / 100) * (m2 / 100));
                                                document.getElementById("SignosVitales_IMC").value = r.toFixed(2);
                                                var ComposicionCorporal4 ="";
                                                if (r.toFixed(2) < 18.49){
                                                    ComposicionCorporal4 = 'Delgadez o bajo peso';
                                                }
                                                else if (r.toFixed(2) > 18.50 & r.toFixed(2) < 24.99){
                                                    ComposicionCorporal4 = 'Normal';
                                                }
                                                else if (r.toFixed(2) > 25.00 & r.toFixed(2) < 29.99){
                                                    ComposicionCorporal4 = 'Sobrepeso';
                                                }
                                                else if (r.toFixed(2) > 30.00){
                                                    ComposicionCorporal4 = 'Obesidad';
                                                }
                                                    
                                                if(<?=$MesesSignosVitales?> > 0 && <?=$MesesSignosVitales?> <= 204){
                                                    
                                                    console.log('Entro');
                                                    $.ajax({
                                                    type: "POST",
                                                    url: "ModulosRIAS/DatosGenerales/RIAS_ComposicionCorporal_Ajax.php",
                                                    data: {
                                                        Edad: <?=$MesesSignosVitales?>,
                                                        cliente_id: <?=$cliente_SignosVitales?>,
                                                        Peso: document.getElementById("SignosVitales_Peso").value,
                                                        Altura: document.getElementById("SignosVitales_Altura").value,
                                                        IMC: r.toFixed(2),
                                                    },
                                                    success: function (response) {
                                                        //console.log(response);
                                                        var dataArreglo = JSON.parse(response);
                                                        var Res = dataArreglo['Respuesta'];

                                                        document.getElementById("SignosVitales_ComposicionCorporal").value = Res;

                                                    }
                                                    });

                                                }else{
                                                    //console.log('No entro');
                                                    document.getElementById("SignosVitales_ComposicionCorporal").value = ComposicionCorporal4;
                                                }

                                            }

                                            document.addEventListener("DOMContentLoaded", function() {

                                            var inputPeso = document.getElementById("SignosVitales_Peso");
                                            var inputAltura = document.getElementById("SignosVitales_Altura");
                                            
                                            // Agrega el evento 
                                            inputPeso.onchange = IMC;
                                            inputAltura.onchange = IMC;
                                            });

                                            

                                        </script>