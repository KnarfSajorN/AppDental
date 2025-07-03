                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_1_SubPrincipal_5">
                                                        1.5 Alimentación en niños mayores de 6 meses
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_1_SubPrincipal_5" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <?php


                                                        $ArreglosCamposAlimentacionNinoMayores6 = [
                                                           "1" => "Frecuencia, cantidad, forma de preparación y tipo de alimentos (incluyendo consumo de azúcar y sal), para lo cual puede ser útil la indagación en las últimas 24 horas o en un día regular",
                                                        "2" =>"Edad de introducción de los diferentes alimentos durante la alimentación complementaria y la tolerancia a los nuevos alimentos",
                                                        "3" =>"Consumo de la dieta familiar. Debe verificarse después del años de edad"
                                                        ];

                                                        foreach ($ArreglosCamposAlimentacionNinoMayores6 as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                        


                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>$Titulo</label><br>
                                                                <textarea class='form-control' name='Anamnesis[AlimentacionMayor6][$Identificacion][$Titulo]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";


                                                        }



                                                        ?>




                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->

