                                                    <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12'>
                                                            <h4 class="text-bold text-center">Cuestionario SRQ</h4>
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
                                                                $ArreglosCamposSaludMentalSRQ = [
                                                                    "1" => "¿Tiene frecuentes dolores de cabeza?",
                                                                    "2" => "¿Tiene mal apetito?",
                                                                    "3" => "¿Duerme mal?",
                                                                    "4" => "¿Se asusta con facilidad?",
                                                                    "5" => "¿Sufre de temblor de manos?",
                                                                    "6" => "¿Se siente nervioso, tenso o aburrido?",
                                                                    "7" => "¿Sufre de mala digestión?",
                                                                    "8" => "¿No puede pensar con claridad?",
                                                                    "9" => "¿Se siente triste?",
                                                                    "10" => "¿Llora usted con mucha frecuencia?",
                                                                    "11" => "¿Tiene dificultad en disfrutar de sus actividades diarias?",
                                                                    "12" => "¿Tiene dificultad para tomar decisiones?",
                                                                    "13" => "¿Tiene dificultad en hacer su trabajo? (¿Sufre usted con su trabajo?)",
                                                                    "14" => "¿Es incapaz de desempeñar un papel útil en su vida?",
                                                                    "15" => "¿Ha perdido interés en las cosas?",
                                                                    "16" => "¿Siente que usted es una persona inútil?",
                                                                    "17" => "¿Ha tenido la idea de acabar con su vida?",
                                                                    "18" => "¿Se siente cansado todo el tiempo?",
                                                                    "19" => "¿Tiene sensaciones desagradables en su estómago?",
                                                                    "20" => "¿Se cansa con facilidad?",
                                                                    "21" => "¿Siente usted que alguien ha tratado de herirlo en alguna forma?",
                                                                    "22" => "¿Es usted una persona mucho más importante que lo que piensan los demás?",
                                                                    "23" => "¿Ha notado interferencias o algo raro en sus pensamientos?",
                                                                    "24" => "¿Oye voces sin saber de dónde vienen o que otras personas no pueden oír?",
                                                                    "25" => "¿Ha tenido convulsiones, ataques o caídas al suelo, como movimientos de brazos y piernas; con mordeduras de lengua o pérdida del conocimiento?",
                                                                    "26" => "¿Alguna vez le ha parecido a su familia, sus amigos, su médico o a su sacerdote que usted estaba bebiendo demasiado licor?",
                                                                    "27" => "¿Alguna vez ha querido dejar de beber, pero no ha podido?",
                                                                    "28" => "¿Ha tenido alguna vez dificultades en el trabajo (o estudio) a causa de la bebida, como beber en el trabajo o en el colegio, o faltar a ellos?",
                                                                    "29" => "¿Ha estado en riñas o lo han detenido estando borracho?",
                                                                    "30" => "¿Le ha parecido alguna vez que usted bebía demasiado?",
                                                                ];

                                                                foreach ($ArreglosCamposSaludMentalSRQ as $key => $value) {
                                                                    $Titulo = $value;
                                                                    $Identificacion = $key;
                                                                
                                                                    echo "
                                                                    <tr>
                                                                        <td > $Titulo </td>
                                                                        <td >
                                                                            <input type='radio' class='SRQ_Tabla RequiredSRQ_Radio' id='ItemSRQ_$key' name='ExamenFisico[SaludMental][SRQ][$Identificacion][$Titulo]' value='1' style='width: 25px;height: 25px;'>
                                                                        </td>
                                                                        <td >
                                                                            <input type='radio' class='SRQ_Tabla RequiredSRQ_Radio' id='ItemSRQ_$key' name='ExamenFisico[SaludMental][SRQ][$Identificacion][$Titulo]' value='0' style='width: 25px;height: 25px;'>
                                                                        </td>
                                                                    </tr>";

                                                                    
                                                                }

                                                                ?>

                                                                </tbody>
                                                            </table>
                                                        </div>



                                                        <div class='form-group col-md-12'>
                                                                <label>Interpretacion </label><br>
                                                                <textarea id='SRQ_Interpretacion' name='ExamenFisico[SaludMental][SRQInterpretacion]' value='' class='form-control input-lg'  readOnly ></textarea>
                                                        </div>


                                                        <script>
                                                            
                                                            document.addEventListener("DOMContentLoaded", function() {
                                                                // Obtén todos los elementos de entrada con la clase 'SRQ_Tabla'
                                                                var srqInputs = document.querySelectorAll('.SRQ_Tabla');

                                                                // Agrega un event listener 'change' a cada input
                                                                srqInputs.forEach(function(input) {
                                                                    input.addEventListener('change', function() {
                                                                        InterpretacionSRQ();
                                                                    });
                                                                });

                                                                // Función para calcular la interpretación
                                                                function InterpretacionSRQ() {
                                                                    var count_salud_mental = 0;
                                                                    var count_psicosis = 0;
                                                                    var count_trastorno_convulsivo = 0;
                                                                    var count_alcoholismo = 0;

                                                                    // Itera sobre cada input y cuenta las respuestas positivas
                                                                    srqInputs.forEach(function(input) {
                                                                        if (input.checked && input.value === '1') {
                                                                            var key = input.id.split('_')[1]; // Obtiene el ID del input
                                                                            if (key <= 20) {
                                                                                count_salud_mental++;
                                                                            } else if (key >= 21 && key <= 24) {
                                                                                count_psicosis++;
                                                                            } else if (key == 25) {
                                                                                count_trastorno_convulsivo++;
                                                                            } else if (key >= 26 && key <= 30) {
                                                                                count_alcoholismo++;
                                                                            }
                                                                        }
                                                                    });

                                                                    // Determinar la interpretación
                                                                    var interpretacion = "";
                                                                    if (count_salud_mental >= 11) {
                                                                        interpretacion += "Alta probabilidad de sufrir problemas de salud mental (depresión, ansiedad, etc.),";
                                                                    }
                                                                    if (count_psicosis >= 1) {
                                                                        interpretacion += "Posible caso de psicosis,";
                                                                    }
                                                                    if (count_trastorno_convulsivo >= 1) {
                                                                        interpretacion += "Alta probabilidad de sufrir un trastorno convulsivo,";
                                                                    }
                                                                    if (count_alcoholismo >= 1) {
                                                                        interpretacion += "Alto riesgo de sufrir alcoholismo,";
                                                                    } 
                                                                    if(interpretacion=="")
                                                                    {
                                                                        interpretacion = "No se encontraron posibles problemas.";
                                                                    }

                                                                    // Actualizar el valor del textarea
                                                                    document.getElementById('SRQ_Interpretacion').value = interpretacion;
                                                                }
                                                            });


                                                        </script>
