                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_1_SubPrincipal_0">
                                                        Anamnesis General
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_1_SubPrincipal_0" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">

                                                    <div class='form-group col-md-12'>
                                                        <hr>
                                                    </div>

                                                    <?php
                                                    //Para los inputs

                                                    $ArreglosCamposTamizaje = [
                                                        "1" => "Motivo Consulta",
                                                        "2" => "Enfermedad Actual" ,
                                                    ];

                                                    //1-> Estado
                                                    //2-> Observaciones
                                                    //NombreMenuPrincipal[Submenu][identificador unico general][titulo en texto]

                                                    foreach ($ArreglosCamposTamizaje as $key => $value) {
                                                        $Titulo = $value;
                                                        $Identificador = $key;
                                                    echo"
                                                    <div class='form-group col-md-12'>
                                                        <label>$Titulo</label><br>
                                                        <textarea class='form-control' name='Anamnesis[General][$Identificador][$value]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                    </div>";

                                                    }
                                                    
                                                    
                                                    
                                                    ?>




                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->


