                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_1_SubPrincipal_8">
                                                     1.8 Seguimiento a compromisos acordados en sesiones de educación individual previas
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_1_SubPrincipal_8" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <?php

                                                        $ArreglosCamposSeguimientoEducacionIndividual = [
                                                        "1" => "Observaciones"];

                                                        foreach ($ArreglosCamposSeguimientoEducacionIndividual as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                        


                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>$Titulo</label><br>
                                                                <textarea class='form-control' name='Anamnesis[SeguimientoCompromisoEducacion][$Identificacion][$Titulo]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";


                                                        }



                                                        ?>




                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->

