

                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12' style="width:100%">
                                                            <h2 style="width:100%;text-align:center">Alcohol Use Disorders Identification Test (AUDIT) </h2>
                                                        </div>


                                                        <?php

                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludSexual = [
                                                            "1" => "Con qué frecuencia consume alguna bebida alcohólica?",
                                                            "2" => "¿Cuantas consumiciones de bebidas alcohólicas suele realizar en un día de consumo normal?",
                                                            "3" => "¿ Con qué frecuencia toma 6 o más bebidas alcohólicas en un solo día?",
                                                            "4" => "¿Con qué frecuencia en el curso del último año ha sido incapaz de parar de beber una vez había empezado?",
                                                            "5" => "¿Con qué frecuencia en el curso del último año no pudo hacer lo que se esperaba de usted porque había bebido?",
                                                            "6" => "¿Con qué frecuencia en el curso del último año ha necesitado beber en ayunas para recuperarse después de haber bebido mucho el día anterior?",
                                                            "7" => "¿Con qué frecuencia en el curso del último año ha tenido remordimientos o sentimientos de culpa después de haber bebido?",
                                                            "8" => "¿Con qué frecuencia en el curso del último año no ha podido recordar lo que sucedió la noche anterior porque había estado bebiendo?",
                                                            "9" => "¿Usted o alguna otra persona ha resultado herido porque usted había bebido?",
                                                            "10" => "¿Algún familiar, amigo, médico o profesional sanitario ha mostrado preocupación por su consumo de bebidas alcohólicas o le han sugerido que deje de beber?"
                                                        ];

                                                        $ArregloSelectOptions = [
                                                            "1" => [
                                                                0 => "Nunca",
                                                                1 => "Una o menos veces al mes",
                                                                2 => "De 2 a 4 veces al mes",
                                                                3 => "De 2 a 3 mas veces a la semana",
                                                                4 => "4 o más veces a la semana"
                                                            ],
                                                            "2" => [
                                                                0 => "1 o 2",
                                                                1 => "3 o 4",
                                                                2 => "5 o 6",
                                                                3 => "7, 8, o 9",
                                                                4 => "10 o más"
                                                            ],
                                                            "3" => [
                                                                0 => "Nunca",
                                                                1 => "Menos de una vez al mes",
                                                                2 => "Mensualmente",
                                                                3 => "Semanalmente",
                                                                4 => "A diario o casi a diario"
                                                            ],
                                                            "4" => [
                                                                0 => "Nunca",
                                                                1 => "Menos de una vez al mes",
                                                                2 => "Mensualmente",
                                                                3 => "Semanalmente",
                                                                4 => "A diario o casi a diario"
                                                            ],
                                                            "5" => [
                                                                0 => "Nunca",
                                                                1 => "Menos de una vez al mes",
                                                                2 => "Mensualmente",
                                                                3 => "Semanalmente",
                                                                4 => "A diario o casi a diario"
                                                            ],
                                                            "6" => [
                                                                0 => "Nunca",
                                                                1 => "Menos de una vez al mes",
                                                                2 => "Mensualmente",
                                                                3 => "Semanalmente",
                                                                4 => "A diario o casi a diario"
                                                            ],
                                                            "7" => [
                                                                0 => "Nunca",
                                                                1 => "Menos de una vez al mes",
                                                                2 => "Mensualmente",
                                                                3 => "Semanalmente",
                                                                4 => "A diario o casi a diario"
                                                            ],
                                                            "8" => [
                                                                0 => "Nunca",
                                                                1 => "Menos de una vez al mes",
                                                                2 => "Mensualmente",
                                                                3 => "Semanalmente",
                                                                4 => "A diario o casi a diario"
                                                            ],
                                                            "9" => [
                                                                0 => "No",
                                                                2 => "Sí, pero no en el curso del último año",
                                                                4 => "Sí, el último año"
                                                            ],
                                                            "10" => [
                                                                0 => "No",
                                                                2 => "Sí, pero no en el curso del último año",
                                                                4 => "Sí, el último año"
                                                            ]
                                                        ];

                                                        // Primer foreach para las preguntas
                                                        echo "<div class='form-group col-md-12 row'>";
                                                        echo "<div class='form-group col-md-12'>";
                                                        echo "<h4>Preguntas</h4>";
                                                        echo "</div>";

                                                        foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;

                                                            echo "<div class='form-group col-md-8'>";
                                                            echo "<label>$Titulo</label>";
                                                            echo "</div>";
                                                            echo "<div class='form-group col-md-4'>";
                                                            echo "<select name='ExamenFisico[SaludMental][AUDIT][$Identificacion][$Titulo]' class='form-control input-lg select2 FormularioAUDIT RequiredAUDIT_Select' style='width:100%' onchange='FuncionInterpretacionAUDIT();'>";
                                                            echo "<option value=''>Seleccione</option>";
                                                            foreach ($ArregloSelectOptions[$Identificacion] as $key => $value) {
                                                                echo "<option value='$key'>$value</option>";
                                                            }
                                                            echo "</select>";
                                                            echo "</div>";
                                                        }
                                                        


                                                        echo "</div>";

                                                        



                                                        ?>


                                                        <div class='form-group col-md-12'>
                                                                <label>Interpretacion </label><br>
                                                                <input type='text' id='AUDIT_Interpretacion' name='ExamenFisico[SaludMental][AUDITInterpretacion]' value='' class='form-control input-lg' readOnly >
                                                                <label>Puntaje</label><br>
                                                                <input type='text' id='AUDIT_Puntaje' name='ExamenFisico[SaludMental][AUDITPuntaje]' value='' class='form-control input-lg' readOnly >
                                                        </div>


                                                        <script>
                                                            function FuncionInterpretacionAUDIT() {
                                                                var className = 'FormularioAUDIT';
                                                                var textFieldId = 'AUDIT_Puntaje';
                                                                var selects = document.querySelectorAll('.' + className);

                                                                        var sum = 0;
                                                                        var cont = 0;
                                                                        selects.forEach(function(select) {
                                                                            if (select.value !== "") {
                                                                                sum += parseInt(select.value);
                                                                                cont++;
                                                                            }
                                                                        });

                                                                        document.getElementById(textFieldId).value = sum;
                                                                        
                                                                        if(cont==0){
                                                                            document.getElementById(textFieldId).value = "";
                                                                            document.getElementById('AUDIT_Interpretacion').value = "";
                                                                        }else{
                                                                            InterpretacionAUDIT();
                                                                        }
                                                                        
                                                            }

                                                            

                                                            function InterpretacionAUDIT() {
                                                                
                                                                var puntaje = document.getElementById('AUDIT_Puntaje').value;
                                                                
                                                                var interpretacion = '';

                                                                // Filtrar los puntajes

                                                                if (puntaje >= 0 && puntaje <= 7) {
                                                                    interpretacion = 'Zona I, Educación sobre el consumo de alcohol';
                                                                } else if (puntaje >= 8 && puntaje <= 15) {
                                                                    interpretacion = 'Zona II, Consejo simple';
                                                                } else if (puntaje >= 16 && puntaje <= 19) {
                                                                    interpretacion = 'Zona II, Consejo simple más terapia breve';
                                                                } else if (puntaje >= 20 && puntaje <= 40) {
                                                                    interpretacion = 'Zona IV, Derivación al especialista';
                                                                }

                                                                
                                                                document.getElementById('AUDIT_Interpretacion').value = interpretacion;
                                                            }

                                                        </script>



    



    