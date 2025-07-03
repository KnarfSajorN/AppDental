                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_1_SubPrincipal_7">
                                                     1.7 Rutinas y hábitos saludables
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_1_SubPrincipal_7" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <?php

                                                        $ArreglosCamposRutinas = [
                                                            "1" => "Sueño: (cuántas veces y cuánto tiempo duerme, dónde duerme, cómo y con quién duerme, rutina para dormir y medidas para hacer el sueño seguro)",
                                                        "2" => "Higiene (baño, cambio de pañal (cuántas veces al día, características de la deposición), lavado de manos del cuidador y de la niña(o), cuidado bucal (desde el recién nacido) y cepillado de dientes, foto protección, evolución del control de esfínteres a partir de dos (2) años y limpieza del área perineal )",
                                                        "3" => "Juegos y movimientos activos: cuánto tiempo suma al día"
                                                        ];

                                                        foreach ($ArreglosCamposRutinas as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                        


                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>$Titulo</label><br>
                                                                <textarea class='form-control' name='Anamnesis[RutinasHabitos][$Identificacion][$Titulo]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";


                                                        }



                                                        ?>




                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->

