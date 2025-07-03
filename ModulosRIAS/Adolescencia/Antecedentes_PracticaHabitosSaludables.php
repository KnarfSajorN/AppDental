                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_1_SubPrincipal_4">
                                                     1.4 Prácticas y hábitos saludables 
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_1_SubPrincipal_4" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <?php
                                                    
                                                        $ArreglosCampoPracticasHabitos = [
                                                        "1" => "Juegos",
                                                        "2" => "Actividad física",
                                                        "3" => "Higiene oral y corporal (lavado de manos y área perineal)",
                                                        "4" => "Sueño",
                                                        "5" => "Hábito intestinal y urinario",      
                                                        "6" => "Foto protección",       
                                                        "7" => "Exposición a televisión y video juegos",
                                                        "8" => "Uso del tiempo libre y ocio (uso de internet y redes sociales)",
                                                        "9" => "Actividad física (60 minutos diarios de actividad moderada o vigorosa por lo menos 5 días a la semana.)",

                                                        ];

                                                        foreach ($ArreglosCampoPracticasHabitos as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                        


                                                            echo"
                                                                <div class='form-group col-md-12'>
                                                                    <label>$Titulo</label><br>
                                                                    <div>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='Anamnesis[HabitosSaludables][$Identificacion][$Titulo]' value='Si'> Sí
                                                                        </label>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='Anamnesis[HabitosSaludables][$Identificacion][$Titulo]' value='No' > No
                                                                        </label>
                                                                    </div>
                                                                </div>";


                                                        }



                                                        ?>




                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->

