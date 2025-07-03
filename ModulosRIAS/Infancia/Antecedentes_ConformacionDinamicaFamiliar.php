                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_1_SubPrincipal_6">
                                                    1.6	Conformación y dinámica de la familia 
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_1_SubPrincipal_6" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">

                                        
                                                        

                                                    <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12' style="width:100%">
                                                            <h2 style="width:100%;text-align:center">Familiograma</h2>
                                                        </div>


                                                        <?php
                                                        
                                                        include 'ModulosRIAS/Familiograma/Familiograma.php';

                                                        
                                                        ?>






                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        
                                                        <div class='form-group col-md-12'>
                                                            <label>Capacidad y Recursos Familiares</label><br>
                                                            <textarea class='form-control' name='Anamnesis[DinamicaFamiliar][CapacidadRecursosFamiliares]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                        </div>


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h4 class="text-bold text-center">APGAR Familiar</h4>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <table class="table table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Función</th>
                                                                                <th>Nunca</th>
                                                                                <th>Casi Nunca</th>
                                                                                <th>Algunas Veces</th>
                                                                                <th>Casi Siempre</th>
                                                                                <th>Siempre</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        <?php
                                                                            $ArreglosCampos = [
                                                                                "1" => "Me satisface la ayuda que recibo de mi familia cuando tengo algún problema o necesidad",
                                                                                "2" => "Me satisface la participacion que mi familia brinda y permite" ,
                                                                                "3" => "Me satisface como mi familia acepta y apoya mis deseos de emprender nuevas actividades" ,
                                                                                "4" => "Me satisface como mi familia expresa afecto y responde a mis emociones como rabia, tristeza y amor" ,
                                                                                "5" => "Me satisface como compartimos en familia: El tiempo para estar juntos Los espacios en la casa El dinero" ,
                                                                            ];


                                                                            foreach ($ArreglosCampos as $key => $value) {
                                                                                $Titulo = $value;
                                                                                $Identificacion = $key;
                                                                            
                                                                                echo"
                                                                                <tr>
                                                                                    <td>{$Titulo}</td>
                                                                                    <td>
                                                                                        <input type='radio' class='Antecedentes_TablaAPGAR RequiredAPGAR_Radio' name='Anamnesis[DinamicaFamiliar][APGAR][$Identificacion][$Titulo]' value='0' style='width: 25px;height: 25px;'>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type='radio' class='Antecedentes_TablaAPGAR RequiredAPGAR_Radio' name='Anamnesis[DinamicaFamiliar][APGAR][$Identificacion][$Titulo]' value='1' style='width: 25px;height: 25px;'>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type='radio' class='Antecedentes_TablaAPGAR RequiredAPGAR_Radio' name='Anamnesis[DinamicaFamiliar][APGAR][$Identificacion][$Titulo]' value='2' style='width: 25px;height: 25px;'>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type='radio' class='Antecedentes_TablaAPGAR RequiredAPGAR_Radio' name='Anamnesis[DinamicaFamiliar][APGAR][$Identificacion][$Titulo]' value='3' style='width: 25px;height: 25px;'>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type='radio' class='Antecedentes_TablaAPGAR RequiredAPGAR_Radio' name='Anamnesis[DinamicaFamiliar][APGAR][$Identificacion][$Titulo]' value='4' style='width: 25px;height: 25px;'>
                                                                                    </td>
                                                                                </tr>";

                                                                            }

                                                                        ?>

    
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        



                                                        <div class="col-md-12">
                                                            <br><br>
                                                            <hr>
                                                            <br><br>
                                                        </div>


                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h4 class="text-bold text-center">Interpretacion</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <table class="table table-hover">
                                                                <tbody>
                                                                    <tr>
                                                                        <td> Puntaje </td>
                                                                        <td> Interpretacion </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>
                                                                            17 - 20
                                                                        </td>
                                                                        <td>
                                                                            Normal
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            16 - 13
                                                                        </td>
                                                                        <td>
                                                                            Disfunción leve
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            12 - 10
                                                                        </td>
                                                                        <td>
                                                                            Disfunción moderada
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            9 o menor
                                                                        </td>
                                                                        <td>
                                                                            Disfunción severa
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <div class='form-group col-md-12'>
                                                                <label>Interpretacion</label><br>
                                                                <input type='text' id='Interpretacion_Apgar' name='Anamnesis[DinamicaFamiliar][Interpretacion_APGAR]' value='' class='form-control input-lg' readOnly >
                                                                <label>Puntaje</label><br>
                                                                <input type='text' id='Puntaje_Apgar' name='Anamnesis[DinamicaFamiliar][Puntaje_APGAR]' value='' class='form-control input-lg' readOnly >
                                                        </div>

                                                        <script>
                                                            function FuncionInterpretacionAPGAR(className, textFieldId) {
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

                                                                        InterpretacionAPGAR();
                                                                    });
                                                                });

                                                                
                                                            }

                                                            FuncionInterpretacionAPGAR('Antecedentes_TablaAPGAR', 'Puntaje_Apgar');

                                                            function InterpretacionAPGAR() {
                                                                
                                                                var puntaje = document.getElementById('Puntaje_Apgar').value;
                                                                //console.log(puntaje);
                                                                
                                                                var interpretacion = '';

                                                                // Filtrar los puntajes
                                                                if (puntaje >= 17 && puntaje <= 20) {
                                                                    interpretacion = 'Normal';
                                                                } else if (puntaje >= 13 && puntaje <= 16) {
                                                                    interpretacion = 'Disfunción leve';
                                                                } else if (puntaje >= 10 && puntaje <= 12) {
                                                                    interpretacion = 'Disfunción moderada';
                                                                } else if (puntaje <= 9) {
                                                                    interpretacion = 'Disfunción severa';
                                                                } else {
                                                                    interpretacion = 'Puntaje fuera de rango';
                                                                }

                                                                
                                                                document.getElementById('Interpretacion_Apgar').value = interpretacion;
                                                            }

                                                        </script>

                                                        <div class="col-md-12">
                                                            <br><br>
                                                            <hr>
                                                            <br><br>
                                                        </div>

                                                        <div class='form-group col-md-12' style="width:100%">
                                                            <h2 style="width:100%;text-align:center">Proceso de desarrollo integral</h2>
                                                        </div>

                                                        <?php


                                                        $ArreglosCampos = [
                                                            "1" => "Distribución de tareas entre cuidadores o red de apoyo respecto a la crianza del niño",
                                                            "2" => "Tiempo para labores de casa, otros hijos, para si mismo, cuidadores y compartir en pareja" ,
                                                            "3" => "Planeación para retorno de la madre a las actividades laborales" ,
                                                            "4" => "Accesibilidad a servicios de salud del hijo y de la familia en general"
                                                        ];

                                                        foreach ($ArreglosCampos as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                        
                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>$Titulo</label><br>
                                                                <textarea class='form-control' name='Anamnesis[DinamicaFamiliar][ProcesoDesarolloIntegral][$Identificacion][$Titulo]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";
                                                        }
                                                        ?>

                                                        





                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12' style="width:100%">
                                                            <h2 style="width:100%;text-align:center">Riesgos para salud del niño o de su familia</h2>
                                                        </div>

                                                        <?php

                                                        $ArreglosCampos = [
                                                            "1" => "Disfuncionalidad familiar",
                                                            "2" => "Relaciones de poder y autoridad",
                                                            "3" => "Discapacidad o padecimiento de enfermedades crónicas, huérfanas o terminales"
                                                        ];



                                                        foreach ($ArreglosCampos as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                        
                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>$Titulo</label><br>
                                                                <textarea class='form-control' name='Anamnesis[DinamicaFamiliar][RiesgoSaludNinoFamilia][$Identificacion][$Titulo]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";
                                                        }
                                                        ?>



                                                        

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->

