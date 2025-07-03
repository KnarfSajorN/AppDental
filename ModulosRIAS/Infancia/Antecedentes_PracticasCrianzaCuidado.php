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

                                                        <?php

                                                        $ArreglosCampoPracticasCrianzaCuidado = [
                                                        "1" => "Formas de comunicación con el niño (expresión del afecto al niño, reconocimiento de los gustos o preferencias del niño)"

                                                        ];

                                                        foreach ($ArreglosCampoPracticasCrianzaCuidado as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                        


                                                            echo"
                                                                <div class='form-group col-md-12'>
                                                                    <label>$Titulo</label><br>
                                                                    <div>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='Anamnesis[PracticasCrianzaCuidado][FormasComunicacion][$Identificacion][$Titulo]' value='Si'> Sí
                                                                        </label>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='Anamnesis[PracticasCrianzaCuidado][FormasComunicacion][$Identificacion][$Titulo]' value='No' > No
                                                                        </label>
                                                                    </div>
                                                                </div>";


                                                        }



                                                        ?>


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12'>
                                                            <h3 style="width:100%;text-align:center">Actividades para estimular el juego, qué se relaciona con su familia y con otros adultos y años, establecimiento de límites y disciplina para corregir</h3>
                                                        </div>

                                                        <?php

                                                        $ArreglosCampoPracticasCrianzaCuidadoActividades = [
                                                        "1" => "Uso de castigo corporal",
                                                        "2" => "Diversas formas de violencia",
                                                        "3" => "Refuerzos positivos",
                                                        "4" => "Exposición a violencias (víctimas o testigos de diversas formas de violencias, enaltecimiento de conductas violentas en los medios de comunicación, o si al interior de la familia se dan formas de ejercer autoridad y poder que legitiman el uso de la violencia)",
                                                        "5" => "Prevención de accidentes (movilidad , uso de silla especial trasera, cinturón de seguridad, casco, en la casa, espacios abiertos)",
                                                        "6" => "Exposición a vulneraciones de derechos como el trabajo infantil",       

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

