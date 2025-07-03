


                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_2_SubPrincipal_7">
                                                        2.7 Valoración de la salud bucal
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_2_SubPrincipal_7" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <?php
                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludSexual = [
                                                            "1" => "Estructuras dentomaxilofaciales  Evaluar funcionalidad en proceso de masticación, deglución, habla, fonación, socialización, afecto y autoestima",
                                                        ];

                                                        foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           

                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>$Titulo</label><br>
                                                                <textarea class='form-control' name='ExamenFisico[SaludBucal][ValoracionEstructuras][$Identificacion][$value]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";

                                                            
                                                        }
         
                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludSexual = [
                                                            "1" => "Cara",
                                                            "2" => "Maxilar",
                                                            "3" => "Mandíbula",
                                                            "4" => "Labios",
                                                            "5" => "Comisura labial",
                                                            "6" => "Mejillas, carrillos",
                                                            "7" => "Encía",
                                                            "8" => "Zona retromolar",
                                                            "9" => "Piso de boca",
                                                            "10" => "Superficie ventral y dorsal de la lengua",
                                                            "11" => "Paladar duro y blando",
                                                            "12" => "Orofaringe",
                                                            "13" => "Articulación temporomandibular",
                                                            "14" => "Estructuras dentales"
                                                        ];

                                                        foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           
                                                            echo "
                                                            <div class='form-group col-md-4'>
                                                                <label>$Titulo</label><br>
                                                                <div>
                                                                    <label class='radio-inline'>
                                                                        <input type='radio' name='ExamenFisico[SaludBucal][Valoracion][$Identificacion][$Titulo][1][Estado]' value='Anormal'> Anormal
                                                                    </label>
                                                                    <label class='radio-inline'>
                                                                        <input type='radio' name='ExamenFisico[SaludBucal][Valoracion][$Identificacion][$Titulo][1][Estado]' value='Normal'> Normal
                                                                    </label>
                                                                </div>
                                                            </div>";


                                                            echo"
                                                            <div class='form-group col-md-8'>
                                                                <label>Observaciones</label><br>
                                                                <textarea class='form-control' name='ExamenFisico[SaludBucal][Valoracion][$Identificacion][$value][2][Observaciones]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";

                                                            
                                                        }


                                                        ?>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->