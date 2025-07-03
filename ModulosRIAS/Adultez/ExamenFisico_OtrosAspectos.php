
                                       
                                       <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_2_SubPrincipal_9">
                                                        2.9 Otros aspectos
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_2_SubPrincipal_9" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <?php

         
                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposOtrosAspectos = [
                                                            "1" => "Glándula tiroides",
                                                            "2" => "Ganglios linfáticos",
                                                            "3" => "Orofaringe",
                                                            "4" => "Hígado",
                                                            "5" => "Bazo",
                                                            "6" => "Hernias",
                                                            "7" => "Deformidad o alteración rotacional o angular en los miembros inferiores",
                                                            "8" => "Columna vertebral pasiva y dinámica (Escoliosis)",
                                                            "9" => "Columna vertebral pasiva y dinámica (Lordosis)",
                                                            "10" => "Columna vertebral pasiva y dinámica (Cifosis)",
                                                            "11" => "Tos con expectoración de más de 15 días",
                                                            "12" => "Perdida o no ganancia de peso (en los tres meses precedentes)"

                                                        ];

                                                        foreach ($ArreglosCamposOtrosAspectos as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           
                                                            if($key=="11"){

                                                                echo "
                                                                
                                                                <div class='form-group col-md-4'>
                                                                    <label>$Titulo</label><br>
                                                                    <select name='ExamenFisico[OtrosAspectos][Valoracion][$Identificacion][$Titulo][1][Estado]' class='form-control input-lg select2' style='width:100%' >
                                                                        <option value='' selected>Seleccione</option>
                                                                        <option value='Si'>Si</option>
                                                                        <option value='No'>No</option>
                                                                    </select>
                                                                </div>

                                                                ";


                                                            }
                                                            else{

                                                                echo "
                                                                
                                                                <div class='form-group col-md-4'>
                                                                    <label>$Titulo</label><br>
                                                                    <select name='ExamenFisico[OtrosAspectos][Valoracion][$Identificacion][$Titulo][1][Estado]' class='form-control input-lg select2' style='width:100%' >
                                                                        <option value='' selected>Seleccione</option>
                                                                        <option value='Normal'>Normal</option>
                                                                        <option value='Anormal'>Anormal</option>
                                                                    </select>
                                                                </div>

                                                                ";


                                                            }
                                                            
                                                            echo "<div class='form-group col-md-8'>
                                                                <label>Observaciones</label><br>
                                                                <textarea class='form-control' name='ExamenFisico[OtrosAspectos][Valoracion][$Identificacion][$Titulo][2][Observaciones]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";
                                                            
                                                        }


                                                        ?>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->