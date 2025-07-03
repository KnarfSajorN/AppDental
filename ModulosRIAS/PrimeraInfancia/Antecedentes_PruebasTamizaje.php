                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_1_SubPrincipal_2">
                                                        1.2 Pruebas de Tamizaje Neonatal
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_1_SubPrincipal_2" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">

                                                    <div class='form-group col-md-12'>
                                                        <hr>
                                                    </div>

                                                    <?php
                                                    //Para los inputs

                                                    $ArreglosCamposTamizaje = [
                                                        "1" => "Tamizaje auditivo",
                                                        "2" => "Tamizaje de errores innatos del metabolismo" ,
                                                        "3" => "Tamizaje de cardiopatía congénita" 
                                                    ];

                                                    //1-> Estado
                                                    //2-> Observaciones
                                                    //NombreMenuPrincipal[Submenu][identificador unico general][titulo en texto][identificar unico subpreguntas][titulo de las subpreguntas]

                                                    foreach ($ArreglosCamposTamizaje as $key => $value) {
                                                        $Titulo = $value;
                                                        $Identificador = $key;
                                                    echo"
                                                        <div class='form-group col-md-2'>
                                                        <label>$Titulo</label><br>
                                                        <div>
                                                            <label class='radio-inline'>
                                                                <input type='radio' name='Anamnesis[Tamizaje][$Identificador][$value][1][Estado]' value='Si'> Sí
                                                            </label>
                                                            <label class='radio-inline'>
                                                                <input type='radio' name='Anamnesis[Tamizaje][$Identificador][$value][1][Estado]' value='No' > No
                                                            </label>
                                                        </div>
                                                    </div>
                                                    

                                                    <div class='form-group col-md-10'>
                                                        <label>Observaciones</label><br>
                                                        <textarea class='form-control' name='Anamnesis[Tamizaje][$Identificador][$value][2][Observaciones]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                    </div>";

                                                    }
                                                    
                                                    
                                                    
                                                    ?>




                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->


