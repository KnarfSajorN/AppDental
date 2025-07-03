                                                            <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12'>
                                                            <h4 class="text-bold text-center">Cuestionario RQC</h4>
                                                        </div>


                                                        <div class="col-md-12">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Preguntas</th>
                                                                        <th>Si</th>
                                                                        <th>No</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>


                                                                <?php

                
                                                                //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                                $ArreglosCamposSaludMentalRQC = [
                                                                    "1" => "¿El lenguaje del niño es anormal en alguna forma?",
                                                                    "2" => "¿El niño duerme mal?",
                                                                    "3" => "¿Ha tenido el niño en algunas ocasiones convulsiones o caídas al suelo sin razón?",
                                                                    "4" => "¿Sufre el niño de dolores frecuentes de cabeza?",
                                                                    "5" => "¿El niño ha huido de casa frecuentemente?",
                                                                    "6" => "¿Ha robado algo de la casa?",
                                                                    "7" => "¿Se asusta o se pone nervioso sin razón?",
                                                                    "8" => "¿Parece como retardado o lento para aprender?",
                                                                    "9" => "¿El niño casi nunca juega con otros niños?",
                                                                    "10" => "¿El niño se orina o defeca en la ropa?"
                                                                ];

                                                                foreach ($ArreglosCamposSaludMentalRQC as $key => $value) {
                                                                    $Titulo = $value;
                                                                    $Identificacion = $key;
                                                                
                                                                    echo "
                                                                    <tr>
                                                                        <td > $Titulo </td>
                                                                        <td >
                                                                            <input type='radio' class='RQC_TablaClase' name='ExamenFisico[SaludMental][RQC][$Identificacion][$Titulo]' value='1' style='width: 25px;height: 25px;'>
                                                                        </td>
                                                                        <td >
                                                                            <input type='radio' class='RQC_TablaClase' name='ExamenFisico[SaludMental][RQC][$Identificacion][$Titulo]' value='0' style='width: 25px;height: 25px;'>
                                                                        </td>
                                                                    </tr>";

                                                                    
                                                                }

                                                                ?>

                                                                </tbody>
                                                            </table>
                                                        </div>


                                                        <div class='form-group col-md-12'>
                                                                <label>Interpretacion [Items Positivos]</label><br>
                                                                <input type='text' id='RQC_Interpretacion' name='ExamenFisico[SaludMental][RQCInterpretacion]' value='' class='form-control input-lg' readOnly >
                                                                <label>Puntaje</label><br>
                                                                <input type='text' id='RQC_Puntaje' name='ExamenFisico[SaludMental][RQCPuntaje]' value='' class='form-control input-lg' readOnly >
                                                        </div>


                                                        <script>
                                                            function FuncionInterpretacionRQC(className, textFieldId) {
                                                                var radios = document.querySelectorAll('.' + className);
                                                                var textField = document.getElementById(textFieldId);

                                                                radios.forEach(function(radio) {
                                                                    radio.addEventListener('change', function() {
                                                                        var sum = 0;
                                                                        radios.forEach(function(radio) {
                                                                            //console.log(radio);
                                                                            if (radio.checked && radio.value !== "") {
                                                                                sum += parseInt(radio.value); // Suma el valor si está marcado
                                                                            }
                                                                        });

                                                                        textField.value = sum; // Asigna la suma al campo de texto

                                                                        InterpretacionRQC();
                                                                    });
                                                                });

                                                                
                                                            }

                                                            FuncionInterpretacionRQC('RQC_TablaClase', 'RQC_Puntaje');

                                                            function InterpretacionRQC() {
                                                                
                                                                var puntaje = document.getElementById('RQC_Puntaje').value;
                                                                
                                                                var interpretacion = '';

                                                                // Filtrar los puntajes
                                                                if (puntaje == 0) {
                                                                    interpretacion = 'Sin necesidad de evaluación';
                                                                } else if (puntaje >= 1 && puntaje <= 10) {
                                                                    interpretacion = 'Necesidad de evaluación integral, diagnóstico, tratamiento y seguimiento';
                                                                } 

                                                                
                                                                document.getElementById('RQC_Interpretacion').value = interpretacion;
                                                            }

                                                        </script>
