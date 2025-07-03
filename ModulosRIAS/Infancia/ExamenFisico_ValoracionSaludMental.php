
<!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_2_SubPrincipal_8">
                                                        2.8 Valoración de la salud mental
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_2_SubPrincipal_8" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <?php

         
                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludMental = [
                                                            "1" => "Signos o síntomas de exposición a violencia",
                                                            "2" => "Uso de sustancias psicoactivas del padre o la madre del menor",
                                                            "3" => "Trastorno mental",
                                                            "4" => "Duelo",
                                                            "5" => "Alteraciones en salud mental o neurológica"
                                                        ];

                                                        foreach ($ArreglosCamposSaludMental as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           
                                                            echo "
                                                            <div class='form-group col-md-4'>
                                                                <label>$Titulo</label><br>
                                                                <div>
                                                                    <label class='radio-inline'>
                                                                        <input type='radio' name='ExamenFisico[SaludMental][Valoracion][$Identificacion][$Titulo][1][Estado]' value='Si'> Si
                                                                    </label>
                                                                    <label class='radio-inline'>
                                                                        <input type='radio' name='ExamenFisico[SaludMental][Valoracion][$Identificacion][$Titulo][1][Estado]' value='No'> No
                                                                    </label>
                                                                </div>
                                                            </div>";


                                                            echo"
                                                            <div class='form-group col-md-8'>
                                                                <label>Observaciones</label><br>
                                                                <textarea class='form-control' name='ExamenFisico[SaludMental][Valoracion][$Identificacion][$value][2][Observaciones]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";

                                                            
                                                        }



                                                        include 'ModulosRIAS/Infancia/Include_RQC.php';
                                                        ?>

                                                        


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>




                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->