                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_1_SubPrincipal_6">
                                                        1.6 Identificación de factores de riesgo
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_1_SubPrincipal_6" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <?php


                                                        $ArreglosCamposFactoresRiesgo = [
                                                             "1" => "Hijos de madres sin control prenatal durante la gestación, inicio de la gestación con bajo peso, bajo peso durante la gestación IMC < 20, pobre adherencia a la suplementación con hierro, madre adolescente, anemia durante la gestación y periodo intergenésico corto",
                                                         "2" => "En caso de madres con antecedente de bajo peso para la edad gestacional y/o delgadez durante el periodo de lactancia",
                                                        "3" =>  "En caso de madres que durante la gestación tuvieron indicación de suplementación con hierro y no lo consumieron",
                                                        "4" =>  "Antecedente de prematuridad o bajo peso al nacer para la edad",
                                                         "5" => "Pinzamiento precoz del cordón umbilical",
                                                         "6" => "Consumo de leche de vaca u otros alimentos en los primeros seis (6) meses sin suplemento de hierro",
                                                         "7" => "Alimentación complementaria deficiente en alimentos ricos en hierro",
                                                         "8" => "Rezago en el crecimiento",
                                                         "9" => "Infecciones recurrentes o antecedente de infección controlada en el último mes",
                                                         "10" => "Pertenencia a un grupo étnico o a una zona endémica de parasitosis",
                                                         "11" => "Exposición a contaminación por metales pesados (plomo y mercurio)"
                                                         ];
                                                         
                                                         //1-> Estado
                                                        //2-> Observaciones
                                                        //NombreMenuPrincipal[Submenu][identificador unico general][titulo en texto][identificar unico subpreguntas][titulo de las subpreguntas]
                                                        foreach ($ArreglosCamposFactoresRiesgo as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                        

                                                            echo "<div class='form-group col-md-12'><label>$Titulo</label></div>";

                                                            echo"<div class='form-group col-md-2'>
                                                                    
                                                                    <div>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='Anamnesis[FactoresRiesgo][Campos][$Identificacion][$value][1][Estado]' value='Si'> Sí
                                                                        </label>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='Anamnesis[FactoresRiesgo][Campos][$Identificacion][$value][1][Estado]' value='No' > No
                                                                        </label>
                                                                    </div>
                                                                </div>";

                                                            echo"
                                                            <div class='form-group col-md-10'>
                                                                <label>$Observaciones</label><br>
                                                                <textarea class='form-control' name='Anamnesis[FactoresRiesgo][Campos][$Identificacion][$value][2][Observaciones]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";


                                                        }



                                                        ?>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->