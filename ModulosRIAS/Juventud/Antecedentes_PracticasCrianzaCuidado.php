                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_1_SubPrincipal_5">
                                                     1.5 Practicas de crianza y cuidado  
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_1_SubPrincipal_5" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12'>
                                                            <h3 style="width:100%;text-align:center">Acciones correctivas</h3>
                                                        </div>

                                                        <?php

                                                        $ArreglosCampoPracticasCrianzaCuidadoActividades = [
                                                        "1" => "Castigo corporal",
                                                        "2" => "Violencia física, psicológica o sexual",
                                                        "3" => "Negligencia",
                                                        "4" => "Abandono",
                                                        "5" => "Exposición a violencias (víctimas o testigos de diversas formas de violencias, enaltecimiento de conductas violentas en los medios de comunicación, o si al interior de la familia se dan formas de ejercer autoridad y poder que legitiman el uso de la violencia)",      

                                                        ];

                                                        foreach ($ArreglosCampoPracticasCrianzaCuidadoActividades as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                        


                                                            echo"
                                                                <div class='form-group col-md-12'>
                                                                    <label>$Titulo</label><br>
                                                                    <div>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='Anamnesis[PracticasCrianzaCuidado][Actividades][$Identificacion][$Titulo]' value='Si'> Sí
                                                                        </label>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='Anamnesis[PracticasCrianzaCuidado][Actividades][$Identificacion][$Titulo]' value='No' > No
                                                                        </label>
                                                                    </div>
                                                                </div>";


                                                        }



                                                        ?>


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>




                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->

