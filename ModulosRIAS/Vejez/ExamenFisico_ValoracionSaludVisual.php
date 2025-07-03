

                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_2_SubPrincipal_5">
                                                        2.5 Valoración de salud visual
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_2_SubPrincipal_5" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <?php

         
                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludVisual = [
                                                            "1" => "Anexos oculares",
                                                            "2" => "Conjuntiva",
                                                            "3" => "Cornea",
                                                            "4" => "Esclera anterior",
                                                            "5" => "Iris",
                                                            "6" => "Cristalino",
                                                            "7" => "Cámara anterior",
                                                            "8" => "Vítreo",
                                                            "9" => "Retina",
                                                            "10" => "Cabeza del nervio óptico",
                                                            "11" => "Estructuras vasculares retinales y coroides",
                                                            "12" => "Agudeza visual"


                                                        ];

                                                        foreach ($ArreglosCamposSaludVisual as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           

                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>$Titulo</label><br>
                                                                <textarea class='form-control' name='ExamenFisico[SaludVisual][Valoracion][$Identificacion][$value]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";

                                                            
                                                        }

                                                        ?>


                                                        <div class='form-group col-md-12'>
                                                            
                                                            <hr>
                                                            
                                                        </div>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->