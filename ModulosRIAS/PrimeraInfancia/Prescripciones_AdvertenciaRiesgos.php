                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_6_SubPrincipal_1">
                                                        Advertencia sobre los riesgos
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_6_SubPrincipal_1" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <?php


                                                        $ArreglosCamposAdvertencia = [
                                                        "1" =>"Advertencia",
                                                        "2" =>"Otros"
                                                        ];

                                                        foreach ($ArreglosCamposAdvertencia as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                        


                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>$Titulo</label><br>
                                                                <textarea class='form-control' name='Advertencia[Riesgos][$Identificacion][$Titulo]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";


                                                        }



                                                        ?>




                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->

