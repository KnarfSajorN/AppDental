                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_1_SubPrincipal_8">
                                                        1.8 Prácticas de crianza y cuidado
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

                                                        $ArreglosCamposRutinas = [
                                                            "1" => "Formas de comunicación con el niño (expresión del afecto al niño, reconocimiento de los gustos o preferencias del niño)",
                                                        "2" => "Actividades para estimular el desarrollo (incluyendo la exposición a televisión o videojuegos) y el juego",
                                                        "3" => "Cómo se relaciona con su familia y con otras personas y niños",
                                                        "4" => "Conocimiento sobre cuándo está enfermo y qué hacer",
                                                        "5" => "Creencias, prácticas e inquietudes sobre el establecimiento de límites y disciplina para corregir (uso de castigo corporal, violencia física, psicológica, sexual, negligencia y abandono contra niños y niñas, manejo de rabietas y pataletas, refuerzos positivos)",
                                                        "6" => "Vivencia de violencia en el hogar (testigos, exposición al enaltecimiento de conductas violentas en los medios de comunicación, o si al interior de la familia se dan formas de ejercer autoridad y poder que legitiman el uso de la violencia)",
                                                        "7" => "Prevención de accidentes (movilidad, uso de silla especial trasera, cinturón de seguridad, casco, en la casa, espacios abiertos)"
                                                        ];


                                                        foreach ($ArreglosCamposRutinas as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                        


                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>$Titulo</label><br>
                                                                <textarea class='form-control' name='Anamnesis[PracticaCrianzaCuidado][$Identificacion][$Titulo]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";


                                                        }



                                                        ?>




                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->



