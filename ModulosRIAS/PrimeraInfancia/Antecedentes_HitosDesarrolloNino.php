                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_1_SubPrincipal_3">
                                                        1.3 Hitos del desarrollo del niño
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_1_SubPrincipal_3" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">

                                                    <div class='form-group col-md-12'>
                                                        <hr>
                                                    </div>

                                                    <?php

                                                    $ArreglosCamposHitos = [
                                                        "1" => "Adaptacion e integración al entorno de educación inicial",
                                                        "2" => "Desarrollo del lenguaje y del habla" 
                                                    ];


                                                    //NombreMenuPrincipal[Submenu][identificador unico general][titulo en texto]
                                                    foreach ($ArreglosCamposHitos as $key => $value) {
                                                        $Titulo = $value;
                                                        $Identificador = $key;
                                                    echo"
                                                    <div class='form-group col-md-12'>
                                                        <label>$Titulo</label><br>
                                                        <textarea class='form-control' name='Anamnesis[HitosDesarollo][$Identificador][$value]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                    </div>";

                                                    }
                                                    
                                                    
                                                    
                                                    ?>




                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->