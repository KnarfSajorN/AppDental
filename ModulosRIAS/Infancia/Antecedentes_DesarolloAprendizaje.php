                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_1_SubPrincipal_4">
                                                     1.4 Desarrollo y aprendizaje 
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
                                                        

                                                        $ArreglosCamposDesarolloAprendizaje = [
                                                        "1" => "Rendimiento escolar",
                                                        "2" => "Aptitud de aprendizaje",
                                                        "3" => "Actitud en el aula y la vida social (juego y conducta de pares)",
                                                        "4" => "Rutinas y ejercicios de aprendizaje",
                                                        "5" => "Problemas de aprendizaje, de lenguaje, de rendimiento escolar o de comportamiento",
                                                        "6" => "Desarrollo del lenguaje y del habla",
                                                        "7" => "Percepción de los padres y/o cuidadores sobre la audición y la visión",
                                                        "8" => "¿Usted cree que su hijo escucha y ve bien?"];

                                                        foreach ($ArreglosCamposDesarolloAprendizaje as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                        


                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>$Titulo</label><br>
                                                                <textarea class='form-control' name='Anamnesis[DesarolloAprendizaje][$Identificacion][$Titulo]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";


                                                        }



                                                        ?>




                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->

