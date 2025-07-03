

                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_2_SubPrincipal_6">
                                                        2.6 Valoración de la salud auditiva y comunicativa
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_2_SubPrincipal_6" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <?php

         
                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludAuditiva = [
                                                            "1" => "Inspección visual",
                                                            "2" => "Otoscopia",
                                                            "3" => "ATM",
                                                            "4" => "Voz",
                                                            "5" => "Habla",
                                                            "6" => "Desempeño comunicativo",
                                                        ];

                                                        foreach ($ArreglosCamposSaludAuditiva as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           

                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>$Titulo</label><br>
                                                                <textarea class='form-control' name='ExamenFisico[SaludAuditiva][Valoracion][$Identificacion][$value]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";

                                                            
                                                        }


                                                        include 'ModulosRIAS/Adolescencia/Include_AnexoFactoresRiesgoEnfermadesOido.php';

                                                        include 'ModulosRIAS/Adolescencia/Include_VALE.php';


                                                        ?>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->