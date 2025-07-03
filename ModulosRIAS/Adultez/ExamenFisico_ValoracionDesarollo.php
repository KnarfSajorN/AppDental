                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_2_SubPrincipal_2">
                                                     2.2 Valoración del desarrollo 
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_2_SubPrincipal_2" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12'>
                                                            <h4 style="width:100%;text-align:center" >Funciones cognitivas </h4>
                                                        </div>


                                                        <?php

                                                        $ArreglosCamposRutinas = [
                                                        "1" => "Demuestren que sus actividades tienen un propósito, se dirigen a un objetivo",
                                                        "2" => "Ejercen autocontrol",
                                                        "3" => "Exhiben comportamientos fiables, consistentes y pensados",
                                                        "4" => "Expresan autoeficacia positiva",
                                                        "5" => "Demuestran independencia",
                                                        "6" => "Demuestran capacidad de resolución de problemas",
                                                        "7" => "Exhiben un locus de control interno",
                                                        "8" => "Funciones ejecutivas: valorar la progresividad en su desarrollo y alcances en aspectos como proyectarse a futuro, resolver problemas y autocontrol",
                                                        ];

                                                        foreach ($ArreglosCamposRutinas as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                        


                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>$Titulo</label><br>
                                                                <textarea class='form-control' name='ExamenFisico[ValoracionDesarrollo][FuncionesCognitivas][$Identificacion][$Titulo]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";


                                                        }



                                                        ?>

                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12'>
                                                            <h4 style="width:100%;text-align:center">Identidad</h4>
                                                        </div>



                                                        <?php
                                                        
                                                        include 'ModulosRIAS/Adultez/Include_IdentidadAnexo14.php';

                                                        ?>






                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12'>
                                                            <h4 style="width:100%;text-align:center">Autonomía</h4>
                                                        </div>

                                                        <?php
                                                        $ArreglosCamposRutinas = [
                                                        "1" => "Componente actitudinal",
                                                        "2" => "Componente emocional",
                                                        "3" => "Componente funcional",
                                                        ];

                                                        foreach ($ArreglosCamposRutinas as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                        


                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>$Titulo</label><br>
                                                                <textarea class='form-control' name='ExamenFisico[ValoracionDesarrollo][Autonomia][$Identificacion][$Titulo]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";


                                                        }


                                                        ?>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->

