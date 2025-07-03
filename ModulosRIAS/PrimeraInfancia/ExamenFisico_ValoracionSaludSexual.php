                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_2_SubPrincipal_4">
                                                        2.4 Valoración de la salud sexual
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_2_SubPrincipal_4" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>


                                                        <div class='form-group col-md-12' style="width:100%">
                                                            <h2 style="width:100%;text-align:center">En niñas</h2>
                                                        </div>


                                                        <?php

         
                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludSexual = [
                                                            "1" => "Sinequias vulvares",
                                                            "2" => "Prácticas nocivas para la vida o salud (mutilación genital, matrimonio infantil o forzoso)"
                                                        ];


                                                        foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           
                                                            
                                                            echo "<div class='form-group col-md-12'><label>$Titulo</label></div>";

                                                            echo"<div class='form-group col-md-2'>
                                                                    
                                                                    <div>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='ExamenFisico[SaludSexual][Ninas][$Identificacion][$value][1][Estado]' value='Si'> Sí
                                                                        </label>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='ExamenFisico[SaludSexual][Ninas][$Identificacion][$value][1][Estado]' value='No' > No
                                                                        </label>
                                                                    </div>
                                                                </div>";

                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>Observaciones</label><br>
                                                                <textarea class='form-control' name='ExamenFisico[SaludSexual][Ninas][$Identificacion][$value][2][Observaciones]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";

                                                            
                                                        }

                                                        ?>








                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12' style="width:100%">
                                                            <h2 style="width:100%;text-align:center">En niños</h2>
                                                        </div>


                                                        <?php

         
                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludSexual = [
                                                            "1" => "Criptorquidia",
                                                            "2" => "Epi o hipospadias"
                                                        ];

                                                        foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           
                                                            
                                                            echo "<div class='form-group col-md-12'><label>$Titulo</label></div>";

                                                            echo"<div class='form-group col-md-2'>
                                                                    
                                                                    <div>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='ExamenFisico[SaludSexual][Ninos][$Identificacion][$value][1][Estado]' value='Si'> Sí
                                                                        </label>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='ExamenFisico[SaludSexual][Ninos][$Identificacion][$value][1][Estado]' value='No' > No
                                                                        </label>
                                                                    </div>
                                                                </div>";

                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>Observaciones</label><br>
                                                                <textarea class='form-control' name='ExamenFisico[SaludSexual][Ninos][$Identificacion][$value][2][Observaciones]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";

                                                            
                                                        }
                                                    ?>









                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12' style="width:100%">
                                                            <h2 style="width:100%;text-align:center">Intersexuales</h2>
                                                        </div>


                                                        <?php

         
                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludSexual = [
                                                            "1" => "Valoracion",
                                                        ];

                                                        foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           
                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>$Titulo</label><br>
                                                                <textarea class='form-control' name='ExamenFisico[SaludSexual][Intersexuales][$Identificacion][$value]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";

                                                            
                                                        }


                                                        ?>





                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->