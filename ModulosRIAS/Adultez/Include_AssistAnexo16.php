
                                                    <div class="col-md-12 row">


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12' style="width:100%">
                                                            <h2 style="width:100%;text-align:center">Instrumento Substance Involvement Screening Test (ASSIST)</h2>
                                                        </div>


                                                        <?php


                                                         $PreguntasPrincipales = [
                                                            "1" => "A lo largo de la vida, ¿cuál de las siguientes sustancias ha consumido alguna vez? (solo las que consumió sin receta médica)",
                                                            "2" => "En los últimos tres meses, ¿con qué frecuencia ha consumido las sustancias que mencionó (primera droga, segunda droga, etc.)?",
                                                            "3" => "En los últimos tres meses, ¿con qué frecuencia ha sentido un fuerte deseo o ansias de consumir (primera droga, segunda droga, etc.)?",
                                                            "4" => "En los últimos tres meses, ¿con qué frecuencia el consumo de (primera droga, segunda droga, etc.) le ha causado problemas de salud, sociales, legales o económicos?",
                                                            "5" => "En los últimos tres meses, ¿con qué frecuencia dejó de hacer lo que habitualmente se esperaba de usted por el consumo de (primera droga, segunda droga, etc.)?",
                                                            "6" => "¿Un amigo, un familiar o alguien más alguna vez ha mostrado preocupación por sus hábitos de consumo de (primera droga, segunda droga, etc.)?",
                                                            "7" => "¿Ha intentado alguna vez reducir o eliminar el consumo de (primera droga, segunda droga) y no lo ha logrado?",   
                                                            "8" => "¿Alguna vez ha consumido alguna droga por vía inyectada? (solo las que consumió sin receta médica)",
                                                        ];

                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludSexual = [
                                                            "1" => "Tabaco (cigarrillos, tabaco de mascar, puros, etc.)",
                                                            "2" => "Bebidas alcohólicas (cerveza, vinos, licores, etc.)",
                                                            "3" => "Cannabis (marihuana, mota, hierba, hachís, etc.)",
                                                            "4" => "Cocaína (coca, crack, etc.)",
                                                            "5" => "Estimulantes de tipo anfetamina (speed, anfetaminas, éxtasis, etc.)",
                                                            "6" => "Inhalantes (óxido nitroso, pegamento, gasolina, solvente para pintura, etc.)",
                                                            "7" => "Sedantes o pastillas para dormir (diazepam, alprazolam, flunitrazepam, midazolam, etc.)",   
                                                            "8" => "Alucinógenos (LSD, ácidos, hongos, ketamina, etc.)",
                                                            "9" => "Opiáceos (heroína, morfina, metadona, buprenorfina, codeína, etc.)",
                                                            "10" => "Otras",
                                                            "11" => "Especifique"
                                                        ];

                                                        // Primer foreach para la pregunta 1
                                                        echo "<div class='form-group col-md-12 row'>";
                                                        echo "<div class='form-group col-md-12'>";
                                                        echo "{$PreguntasPrincipales[1]}";
                                                        echo "</div>";

                                                        foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;

                                                            if($Identificacion != "11"){
                                                                echo "<div class='form-group col-md-8'>";
                                                                echo "<label>$Titulo</label>";
                                                                echo "</div>";
                                                                echo "<div class='form-group col-md-4'>";
                                                                echo "<select name='ExamenFisico[SaludMental][ASISST][Pregunta_1][$Identificacion][$Titulo]' class='form-control input-lg select2  RequiredASSIST_Select' style='width:100%'>";
                                                                echo "<option value=''>Seleccione</option>";
                                                                echo "<option value='Si'>Si</option>";
                                                                echo "<option value='No'>No</option>";
                                                                echo "</select>";
                                                                echo "</div>";
                                                            }else{
                                                                echo "<div class='form-group col-md-8'>";
                                                                echo "<label>$Titulo</label>";
                                                                echo "</div>";
                                                                echo "<div class='form-group col-md-4'>";
                                                                echo "<input type='text'  name='ExamenFisico[SaludMental][ASISST][Pregunta_1][$Identificacion][$Titulo]' class='form-control'>";
                                                                echo "</div>";
                                                            }
                                                        }

                                                        echo "</div>";

                                                        // Segundo foreach para las preguntas 2 a 5
                                                        for ($i = 2; $i <= 5; $i++) {
                                                            echo "<div class='form-group col-md-12 row'>";
                                                            echo "<div class='form-group col-md-12'>";
                                                            echo "{$PreguntasPrincipales[$i]}";
                                                            echo "</div>";

                                                            foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                                $Titulo = $value;
                                                                $Identificacion = $key;

                                                                if($i==2){

                                                                    if($Identificacion != "11"){
                                                                        echo "<div class='form-group col-md-8'>";
                                                                        echo "<label>$Titulo</label>";
                                                                        echo "</div>";
                                                                        echo "<div class='form-group col-md-4'>";
                                                                        echo "<select name='ExamenFisico[SaludMental][ASISST][Pregunta_$i][$Identificacion][$Titulo]' class='form-control input-lg select2 ASISST_Opcion_$key  RequiredASSIST_Select' onchange='InterpretacionASISST($key)' style='width:100%'>";
                                                                        echo "<option value=''>Seleccione</option>";
                                                                        echo "<option value='0'>Nunca</option>";
                                                                        echo "<option value='2'>Una o dos veces</option>";
                                                                        echo "<option value='3'>Mensualmente</option>";
                                                                        echo "<option value='4'>Semanalmente</option>";
                                                                        echo "<option value='6'>Diariamente o casi diariamente</option>";
                                                                        echo "</select>";
                                                                        echo "</div>";
                                                                    }else{
                                                                        echo "<div class='form-group col-md-8'>";
                                                                        echo "<label>$Titulo</label>";
                                                                        echo "</div>";
                                                                        echo "<div class='form-group col-md-4'>";
                                                                        echo "<input type='text' name='ExamenFisico[SaludMental][ASISST][Pregunta_$i][$Identificacion][$Titulo]' class='form-control'>";
                                                                        echo "</div>";
                                                                    }

                                                                }else if($i==3){

                                                                    if($Identificacion != "11"){
                                                                        echo "<div class='form-group col-md-8'>";
                                                                        echo "<label>$Titulo</label>";
                                                                        echo "</div>";
                                                                        echo "<div class='form-group col-md-4'>";
                                                                        echo "<select name='ExamenFisico[SaludMental][ASISST][Pregunta_$i][$Identificacion][$Titulo]' class='form-control input-lg select2 ASISST_Opcion_$key  RequiredASSIST_Select' onchange='InterpretacionASISST($key)' style='width:100%'>";
                                                                        echo "<option value=''>Seleccione</option>";
                                                                        echo "<option value='0'>Nunca</option>";
                                                                        echo "<option value='3'>Una o dos veces</option>";
                                                                        echo "<option value='4'>Mensualmente</option>";
                                                                        echo "<option value='5'>Semanalmente</option>";
                                                                        echo "<option value='6'>Diariamente o casi diariamente</option>";
                                                                        echo "</select>";
                                                                        echo "</div>";
                                                                    }else{
                                                                        echo "<div class='form-group col-md-8'>";
                                                                        echo "<label>$Titulo</label>";
                                                                        echo "</div>";
                                                                        echo "<div class='form-group col-md-4'>";
                                                                        echo "<input type='text' name='ExamenFisico[SaludMental][ASISST][Pregunta_$i][$Identificacion][$Titulo]' class='form-control'>";
                                                                        echo "</div>";
                                                                    }

                                                                }else if($i==4){

                                                                    if($Identificacion != "11"){
                                                                        echo "<div class='form-group col-md-8'>";
                                                                        echo "<label>$Titulo</label>";
                                                                        echo "</div>";
                                                                        echo "<div class='form-group col-md-4'>";
                                                                        echo "<select name='ExamenFisico[SaludMental][ASISST][Pregunta_$i][$Identificacion][$Titulo]' class='form-control input-lg select2 ASISST_Opcion_$key  RequiredASSIST_Select' onchange='InterpretacionASISST($key)' style='width:100%'>";
                                                                        echo "<option value=''>Seleccione</option>";
                                                                        echo "<option value='0'>Nunca</option>";
                                                                        echo "<option value='4'>Una o dos veces</option>";
                                                                        echo "<option value='5'>Mensualmente</option>";
                                                                        echo "<option value='6'>Semanalmente</option>";
                                                                        echo "<option value='7'>Diariamente o casi diariamente</option>";
                                                                        echo "</select>";
                                                                        echo "</div>";
                                                                    }else{
                                                                        echo "<div class='form-group col-md-8'>";
                                                                        echo "<label>$Titulo</label>";
                                                                        echo "</div>";
                                                                        echo "<div class='form-group col-md-4'>";
                                                                        echo "<input type='text' name='ExamenFisico[SaludMental][ASISST][Pregunta_$i][$Identificacion][$Titulo]' class='form-control'>";
                                                                        echo "</div>";
                                                                    }

                                                                }else if($i==5){

                                                                    if($Identificacion != "11"){
                                                                        echo "<div class='form-group col-md-8'>";
                                                                        echo "<label>$Titulo</label>";
                                                                        echo "</div>";
                                                                        echo "<div class='form-group col-md-4'>";
                                                                        echo "<select name='ExamenFisico[SaludMental][ASISST][Pregunta_$i][$Identificacion][$Titulo]' class='form-control input-lg select2 ASISST_Opcion_$key  RequiredASSIST_Select' onchange='InterpretacionASISST($key)' style='width:100%'>";
                                                                        echo "<option value=''>Seleccione</option>";
                                                                        echo "<option value='0'>Nunca</option>";
                                                                        echo "<option value='5'>Una o dos veces</option>";
                                                                        echo "<option value='6'>Mensualmente</option>";
                                                                        echo "<option value='7'>Semanalmente</option>";
                                                                        echo "<option value='8'>Diariamente o casi diariamente</option>";
                                                                        echo "</select>";
                                                                        echo "</div>";
                                                                    }else{
                                                                        echo "<div class='form-group col-md-8'>";
                                                                        echo "<label>$Titulo</label>";
                                                                        echo "</div>";
                                                                        echo "<div class='form-group col-md-4'>";
                                                                        echo "<input type='text' name='ExamenFisico[SaludMental][ASISST][Pregunta_$i][$Identificacion][$Titulo]' class='form-control'>";
                                                                        echo "</div>";
                                                                    }

                                                                }
                                                            }

                                                            echo "</div>";
                                                        }

                                                        // Segundo foreach para las preguntas 6 a 7
                                                        for ($i = 6; $i <= 7; $i++) {
                                                            echo "<div class='form-group col-md-12 row'>";
                                                            echo "<div class='form-group col-md-12'>";
                                                            echo "{$PreguntasPrincipales[$i]}";
                                                            echo "</div>";

                                                            foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                                $Titulo = $value;
                                                                $Identificacion = $key;

                                                                if($Identificacion != "11"){
                                                                    echo "<div class='form-group col-md-8'>";
                                                                    echo "<label>$Titulo</label>";
                                                                    echo "</div>";
                                                                    echo "<div class='form-group col-md-4'>";
                                                                    echo "<select name='ExamenFisico[SaludMental][ASISST][Pregunta_$i][$Identificacion][$Titulo]' class='form-control input-lg select2 ASISST_Opcion_$key  RequiredASSIST_Select' onchange='InterpretacionASISST($key)' style='width:100%'>";
                                                                    echo "<option value=''>Seleccione</option>";
                                                                    echo "<option value='0'>No, nunca</option>";
                                                                    echo "<option value='6'>Si, en los últimos 3 meses</option>";
                                                                    echo "<option value='3'>Si, pero no en los últimos 3 meses</option>";
                                                                    echo "</select>";
                                                                    echo "</div>";
                                                                }else{
                                                                    echo "<div class='form-group col-md-8'>";
                                                                    echo "<label>$Titulo</label>";
                                                                    echo "</div>";
                                                                    echo "<div class='form-group col-md-4'>";
                                                                    echo "<input type='text' name='ExamenFisico[SaludMental][ASISST][Pregunta_$i][$Identificacion][$Titulo]' class='form-control'>";
                                                                    echo "</div>";
                                                                }
                                                            }

                                                            echo "</div>";
                                                        }


                                                         echo "<div class='form-group col-md-12 row'>";


                                                                echo "<div class='form-group col-md-8'>";
                                                                echo "<label>$PreguntasPrincipales[8]</label>";
                                                                echo "</div>";
                                                                echo "<div class='form-group col-md-4'>";
                                                                echo "<select name='ExamenFisico[SaludMental][ASISST][Pregunta_8][$Identificacion][$Titulo]' class='form-control input-lg select2  RequiredASSIST_Select' style='width:100%'>";
                                                                echo "<option value=''>Seleccione</option>";
                                                                echo "<option value='0'>No, nunca</option>";
                                                                echo "<option value='6'>Si, en los últimos 3 meses</option>";
                                                                echo "<option value='3'>Si, pero no en los últimos 3 meses</option>";
                                                                echo "</select>";
                                                                echo "</div>";
                                                            

                                                            echo "</div>";



                                                        ?>


                                                    </div>
                                                    
                                                    <?php
                                                    
                                                    /*
                                                    a Tabaco 27 0 – 3 4 – 26 27+
                                                    b Alcohol 2 0 – 10 11 – 26 27+
                                                    c Cannabis 24 0 – 3 4 – 26 27+
                                                    d Cocaína 0 0 – 3 4 – 26 27+
                                                    e Estimulantes de 
                                                    tipo anfetamina 0 0 – 3 4 – 26 27+
                                                    f Inhalantes 0 0 – 3 4 – 26 27+
                                                    g Sedantes 0 0 – 3 4 – 26 27+
                                                    h Alucinógenos 2 0 – 3 4 – 26 27+
                                                    i Opiáceos 6 0 – 3 4 – 26 27+
                                                    j Otras drogas 0 0 – 3 4 – 26 27+
                                                    */

                                                        echo "<table class='table table-bordered'>
                                                        <thead>
                                                        <tr>
                                                        <td>Tipo</td>
                                                        <td>Puntaje</td>
                                                        <td>Interpretacion</td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                        <td>Tabaco</td>
                                                        <td><input type='text' id='ASSIST_Puntaje_1' name='ExamenFisico[SaludMental][ASISSTPuntaje][1]' value='' class='form-control input-lg' readOnly ></td>
                                                        <td><input type='text' id='ASSIST_Interpretacion_1' name='ExamenFisico[SaludMental][ASISSTInterpretacion][1]' value='' class='form-control input-lg' readOnly ></td>
                                                        </tr>
                                                        <tr>
                                                        <td>Alcohol</td>
                                                        <td><input type='text' id='ASSIST_Puntaje_2' name='ExamenFisico[SaludMental][ASISSTPuntaje][2]' value='' class='form-control input-lg' readOnly ></td>
                                                        <td><input type='text' id='ASSIST_Interpretacion_2' name='ExamenFisico[SaludMental][ASISSTInterpretacion][2]' value='' class='form-control input-lg' readOnly ></td>
                                                        </tr>
                                                        <tr>
                                                        <td>Cannabis</td>
                                                        <td><input type='text' id='ASSIST_Puntaje_3' name='ExamenFisico[SaludMental][ASISSTPuntaje][3]' value='' class='form-control input-lg' readOnly ></td>
                                                        <td><input type='text' id='ASSIST_Interpretacion_3' name='ExamenFisico[SaludMental][ASISSTInterpretacion][3]' value='' class='form-control input-lg' readOnly ></td>
                                                        </tr>
                                                        <tr>
                                                        <td>Cocaína</td>
                                                        <td><input type='text' id='ASSIST_Puntaje_4' name='ExamenFisico[SaludMental][ASISSTPuntaje][4]' value='' class='form-control input-lg' readOnly ></td>
                                                        <td><input type='text' id='ASSIST_Interpretacion_4' name='ExamenFisico[SaludMental][ASISSTInterpretacion][4]' value='' class='form-control input-lg' readOnly ></td>
                                                        </tr>
                                                        <tr>
                                                        <td>Estimulantes de tipo anfetamina</td>
                                                        <td><input type='text' id='ASSIST_Puntaje_5' name='ExamenFisico[SaludMental][ASISSTPuntaje][5]' value='' class='form-control input-lg' readOnly ></td>
                                                        <td><input type='text' id='ASSIST_Interpretacion_5' name='ExamenFisico[SaludMental][ASISSTInterpretacion][5]' value='' class='form-control input-lg' readOnly ></td>
                                                        </tr>
                                                        <tr>
                                                        <td>Inhalantes</td>
                                                        <td><input type='text' id='ASSIST_Puntaje_6' name='ExamenFisico[SaludMental][ASISSTPuntaje][6]' value='' class='form-control input-lg' readOnly ></td>
                                                        <td><input type='text' id='ASSIST_Interpretacion_6' name='ExamenFisico[SaludMental][ASISSTInterpretacion][6]' value='' class='form-control input-lg' readOnly ></td>
                                                        </tr>
                                                        <tr>
                                                        <td>Sedantes</td>
                                                        <td><input type='text' id='ASSIST_Puntaje_7' name='ExamenFisico[SaludMental][ASISSTPuntaje][7]' value='' class='form-control input-lg' readOnly ></td>
                                                        <td><input type='text' id='ASSIST_Interpretacion_7' name='ExamenFisico[SaludMental][ASISSTInterpretacion][7]' value='' class='form-control input-lg' readOnly ></td>
                                                        </tr>
                                                        <tr>
                                                        <td>Alucinógenos</td>
                                                        <td><input type='text' id='ASSIST_Puntaje_8' name='ExamenFisico[SaludMental][ASISSTPuntaje][8]' value='' class='form-control input-lg' readOnly ></td>
                                                        <td><input type='text' id='ASSIST_Interpretacion_8' name='ExamenFisico[SaludMental][ASISSTInterpretacion][8]' value='' class='form-control input-lg' readOnly ></td>
                                                        </tr>
                                                        <tr>
                                                        <td>Opiáceos</td>
                                                        <td><input type='text' id='ASSIST_Puntaje_9' name='ExamenFisico[SaludMental][ASISSTPuntaje][9]' value='' class='form-control input-lg' readOnly ></td>
                                                        <td><input type='text' id='ASSIST_Interpretacion_9' name='ExamenFisico[SaludMental][ASISSTInterpretacion][9]' value='' class='form-control input-lg' readOnly ></td>
                                                        </tr>
                                                        <tr>
                                                        <td>Otras drogas</td>
                                                        <td><input type='text' id='ASSIST_Puntaje_10' name='ExamenFisico[SaludMental][ASISSTPuntaje][10]' value='' class='form-control input-lg' readOnly ></td>
                                                        <td><input type='text' id='ASSIST_Interpretacion_10' name='ExamenFisico[SaludMental][ASISSTInterpretacion][10]' value='' class='form-control input-lg' readOnly ></td>
                                                        </tr>
                                                        </tbody>
                                                        </table>";


                                                    ?>


                                                        <script>
                                                            function InterpretacionASISST(key) {
                                                                var className = 'ASISST_Opcion_'+key;
                                                                var PuntajeFieldId = 'ASSIST_Puntaje_'+key;
                                                                var textFieldId = 'ASSIST_Interpretacion_'+key;
                                                                var selects = document.querySelectorAll('.' + className);

                                                                var sum = 0;
                                                                var cont = 0;
                                                                selects.forEach(function(select) {
                                                                     if (select.value !== "") {
                                                                         sum += parseInt(select.value);
                                                                         console.log(select.value);
                                                                         cont++;
                                                                    }
                                                                });

                                                                document.getElementById(PuntajeFieldId).value = sum;

                                                                var puntaje = sum;
                                                                var interpretacion = '';
                                                                    console.log(key);
                                                                // Filtrar los puntajes
                                                                if(key == "2"){

                                                                    if (puntaje >= 0 && puntaje <= 10) {
                                                                    interpretacion = 'No requiere intervención';
                                                                    } else if (puntaje >= 11 && puntaje <= 26) {
                                                                        interpretacion = 'Recibir intervención breve';
                                                                    } else if (puntaje >= 27) {
                                                                        interpretacion = 'Recibir tratamiento más intensivo';
                                                                    } 

                                                                }else{

                                                                    if (puntaje >= 0 && puntaje <= 3) {
                                                                    interpretacion = 'No requiere intervención';
                                                                    } else if (puntaje >= 4 && puntaje <= 26) {
                                                                        interpretacion = 'Recibir intervención breve';
                                                                    } else if (puntaje >= 27) {
                                                                        interpretacion = 'Recibir tratamiento más intensivo';
                                                                    } 

                                                                }
                                                                

                                                                
                                                                document.getElementById(textFieldId).value = interpretacion;

                                                                if(cont==0){
                                                                    document.getElementById(textFieldId).value = "";
                                                                    document.getElementById(PuntajeFieldId).value = "";
                                                                }
                                                            }

                                                            
                                                        </script>
