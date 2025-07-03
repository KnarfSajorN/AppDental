                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_1_SubPrincipal_1">
                                                        1.1 Antecedentes
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_1_SubPrincipal_1" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">

                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12' style="width:100%">
                                                            <h2 style="width:100%;text-align:center">Personales</h2>
                                                        </div>

                                                        <?php
                                                        //Manetener la estructura con los numeros para identificar ya sea en una impresion o una vista
                                                        $ArregloCamposAntecedentes = [
                                                            "1" => "Esferas Afectadas",
                                                            "2" => "Esferas No Afectadas",
                                                            "3" => "Toxicológicos",
                                                            "4" => "Patológicos",
                                                            "5" => "Quirúrgicos",
                                                            "6" => "Alérgicos",
                                                            "7" => "Control anterior",
                                                            "8" => "Neurológico"
                                                        ];

                                                        //1-> Estado
                                                        //2-> Antecedentes
                                                        //3-> Observaciones
                                                        //NombreMenuPrincipal[Submenu][Grupo][identificador unico general][titulo en texto][identificar unico subpreguntas][titulo de las subpreguntas]
                                                        
                                                        foreach ($ArregloCamposAntecedentes as $key => $value) {
                                                            
                                                            $Titulo = $value;
                                                            $Identificacion = $key;

                                                        echo"
                                                            <div class='form-group col-md-2'>
                                                                <label>$Titulo</label><br>
                                                                <div>
                                                                    <label class='radio-inline'>
                                                                        <input type='radio' name='Anamnesis[Antecedentes][Personales][$Identificacion][$Titulo][1][Estado]' value='Si'> Sí
                                                                    </label>
                                                                    <label class='radio-inline'>
                                                                        <input type='radio' name='Anamnesis[Antecedentes][Personales][$Identificacion][$Titulo][1][Estado]' value='No' > No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        
                                                        

                                                        <div class='form-group col-md-5'>
                                                            <label>Antecedentes</label><br>
                                                            <select name='Anamnesis[Antecedentes][Personales][$Identificacion][$Titulo][2][Antecedentes][]' class='form-control input-lg select2' style='width:100%' multiple>
                                                                <option value='Salud'>Salud</option>
                                                                <option value='Familiar Laboral'>Familiar Laboral</option>
                                                                <option value='Metafísico'>Metafísico</option>
                                                                <option value='Económico'>Económico</option>
                                                                <option value='Afectivo'>Afectivo</option>
                                                                <option value='Sexual'>Sexual</option>
                                                                <option value='Social'>Social</option>
                                                                <option value='Deporte'>Deporte</option>
                                                                <option value='Otro'>Otro</option>
                                                            </select>
                                                        </div>

                                                        <div class='form-group col-md-5'>
                                                            <label>Observaciones</label><br>
                                                            <textarea class='form-control' name='Anamnesis[Antecedentes][Personales][$Identificacion][$Titulo][3][Observaciones]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                        </div>";

                                                        }
                                                        ?>


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>


                                                        <div class='form-group col-md-12' style="width:100%">
                                                            <h2 style="width:100%;text-align:center">Medicos</h2>
                                                        </div>

                                                        <?php
                                                        //Manetener la estructura con los numeros para identificar ya sea en una impresion o una vista
                                                        $ArregloCamposAntecedentesMedicos = [
                                                            "1" => "Consultas de urgencias",
                                                            "2" => "Síntomas recurrentes",
                                                            "3" => "Otológicos",
                                                            "4" => "Condiciones crónicas o agudas"
                                                        ];
                                                        
                                                        //1-> Estado
                                                        //2-> Observaciones
                                                        //NombreMenuPrincipal[Submenu][Grupo][identificador unico general][titulo en texto][identificar unico subpreguntas][titulo de las subpreguntas]

                                                        foreach ($ArregloCamposAntecedentesMedicos as $key => $value) {
                                                            
                                                            $Titulo = $value;
                                                            $Identificacion = $key;

                                                        echo"
                                                            <div class='form-group col-md-4'>
                                                                <label>$Titulo</label><br>
                                                                <div>
                                                                    <label class='radio-inline'>
                                                                        <input type='radio' name='Anamnesis[Antecedentes][Medicos][$Identificacion][$Titulo][1][Estado]' value='Si'> Sí
                                                                    </label>
                                                                    <label class='radio-inline'>
                                                                        <input type='radio' name='Anamnesis[Antecedentes][Medicos][$Identificacion][$Titulo][1][Estado]' value='No' > No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        

                                                        <div class='form-group col-md-8'>
                                                            <label>Observaciones</label><br>
                                                            <textarea class='form-control' name='Anamnesis[Antecedentes][Medicos][$Identificacion][$Titulo][2][Observaciones]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                        </div>";

                                                        }
                                                        ?>

                                                        
                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12'>
                                                            <h2 style="width:100%;text-align:center">Familiares</h2>
                                                        </div>



                                                        <?php
                                                        //Manetener la estructura con los numeros para identificar ya sea en una impresion o una vista
                                                        $ArregloCamposAntecedentesMedicos = [
                                                            "1" => "",
                                                            "2" => "",
                                                            "3" => ""
                                                        ];

                                                        //1-> Estado
                                                        //2-> Fecha Diagnostico
                                                        //3-> Diagnostico
                                                        //4-> Observaciones
                                                        //NombreMenuPrincipal[Submenu][Grupo][identificador unico general][titulo en texto][identificar unico subpreguntas][titulo de las subpreguntas]

                                                        foreach ($ArregloCamposAntecedentesMedicos as $key => $value) {
                                                            
                                                            $Titulo = $value;
                                                            $Identificacion = $key;

                                                            ////////////////////////? Funcionamiento ///////////////////////////////////////////////////////////////////////////////////////////////////////
                                                            ////////////////////////? Anamnesis[Antecedentes][Familiares][$Identificacion][Parentesco]                         [Parentesco]
                                                            //////////////////////////? //////////////////////////////////////////////////////////|///////////////////////////////  |//////////
                                                            //////////////////////////? //////////////////////////////////////////////nombre del campo interno////////////Nombre del Campo Visual//////////
                                                        echo"
                                                            
                                                        <div class='form-group col-md-3'>
                                                            <label>Parentesco</label><br>
                                                            <input type='text' class='form-control input-lg' name='Anamnesis[Antecedentes][Familiares][$Identificacion][1][Parentesco]' >
                                                        </div>

                                                        <div class='form-group col-md-3'>
                                                            <label>Fecha de Diagnostico</label><br>
                                                            <input type='date'  class='form-control input-lg' name='Anamnesis[Antecedentes][Familiares][$Identificacion][2][Fecha de Diagnostico]' >
                                                        </div>

                                                        <div class='form-group col-md-3'>
                                                            <label>Diagnostico</label><br>
                                                            <select name='Anamnesis[Antecedentes][Familiares][$Identificacion][3][Diagnostico][]' class='form-control input-lg select2' style='width:100%' multiple>
                                                                <option value='Enfermedades hereditarias'>Enfermedades hereditarias</option>
                                                                <option value='Asma'>Asma</option>
                                                                <option value='Tuberculosis'>Tuberculosis</option>
                                                                <option value='Dermatitis atópica'>Dermatitis atópica</option>
                                                                <option value='Problemas de desarrollo infantil'>Problemas de desarrollo infantil</option>
                                                                <option value='Antecedente de muerte de hermanos'>Antecedente de muerte de hermanos</option>
                                                                <option value='Antecedentes de salud mental de los padres: depresión, esquizofrenia, trastorno afectivo bipolar'>Antecedentes de salud mental de los padres: depresión, esquizofrenia, trastorno afectivo bipolar</option>
                                                                <option value='Conducta suicida'>Conducta suicida</option>
                                                                <option value='Consumo de alcohol y/o sustancias psicoactivas '>Consumo de alcohol y/o sustancias psicoactivas </option>
                                                                <option value='En el caso de exposición al riesgo de consumo de alcohol y otras sustancias psicoactivas, se debe derivar a los padres a la Ruta integral de atención para la población con riesgo o presencia de trastornos asociados al uso de sustancias psicoactivas y adicciones'>En el caso de exposición al riesgo de consumo de alcohol y otras sustancias psicoactivas, se debe derivar a los padres a la Ruta integral de atención para la población con riesgo o presencia de trastornos asociados al uso de sustancias psicoactivas y adicciones</option>
                                                                <option value='Exposición a violencia (maltrato infantil, matoneo, abandono, negligencia, maltrato y violencia intrafamiliar, violencia sexual, víctimas del conflicto armado). En el caso de exposición a violencias debe derivarse a la Ruta integral de atención para la población en riesgo y víctima de violencias en el conflicto armado, violencias de género y otras violencias interpersonales'>Exposición a violencia (maltrato infantil, matoneo, abandono, negligencia, maltrato y violencia intrafamiliar, violencia sexual, víctimas del conflicto armado). En el caso de exposición a violencias debe derivarse a la Ruta integral de atención para la población en riesgo y víctima de violencias en el conflicto armado, violencias de género y otras violencias interpersonales</option>
                                                                <option value='Sucesos vitales: duelo o muerte de personas significativas, divorcio de los padres, problemas de las relaciones de los progenitores'>Sucesos vitales: duelo o muerte de personas significativas, divorcio de los padres, problemas de las relaciones de los progenitores</option>
                                                            </select>
                                                        </div>
                                                        

                                                        <div class='form-group col-md-3'>
                                                            <label>Observaciones</label><br>
                                                            <textarea class='form-control' name='Anamnesis[Antecedentes][Familiares][$Identificacion][4][Observaciones]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                        </div>";

                                                        }
                                                        ?>





                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12'>
                                                            <h2 style="width:100%;text-align:center">Mas Antecedentes</h2>
                                                        </div>
                                                        




                                                        <?php
                                                            //Manetener la estructura con los numeros para identificar ya sea en una impresion o una vista
                                                            $ArregloCamposAntecedentesMasAntecedentes = [
                                                                "1" => "Hospitalarios",
                                                                "2" => "Transfusionales",
                                                                "3" => "Farmacológicos",
                                                                "4" => "Exposición al humo de tabaco",
                                                                "5" => "Alérgicos",
                                                                "6" => "Quirúrgicos",
                                                                "7" => "Vacunación",
                                                                "8" => "Comportamiento general",
                                                                "9" => "Relaciones interpersonales",
                                                            ];

                                                            //1-> Estado
                                                            //2-> Observaciones
                                                            //NombreMenuPrincipal[Submenu][Grupo][identificador unico general][titulo en texto][identificar unico subpreguntas][titulo de las subpreguntas]
                                                            foreach ($ArregloCamposAntecedentesMasAntecedentes as $key => $value) {
                                                                
                                                                $Titulo = $value;
                                                                $Identificacion = $key;

                                                            echo"
                                                                <div class='form-group col-md-4'>
                                                                    <label>$Titulo</label><br>
                                                                    <div>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='Anamnesis[Antecedentes][MasAntecedentes][$Identificacion][$Titulo][1][Estado]' value='Si'> Sí
                                                                        </label>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='Anamnesis[Antecedentes][MasAntecedentes][$Identificacion][$Titulo][1][Estado]' value='No' > No
                                                                        </label>
                                                                    </div>
                                                                </div>


                                                            <div class='form-group col-md-8'>
                                                                <label>Observaciones</label><br>
                                                                <textarea class='form-control' name='Anamnesis[Antecedentes][MasAntecedentes][$Identificacion][$Titulo][2][Observaciones]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";

                                                            }
                                                        
                                                        
                                                        ?>

                                                        




                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->


