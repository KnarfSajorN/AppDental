
                                                    <div class="col-md-12 row">


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <?php

         
                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposOtrosAspectos = [
                                                            "1" => "Lactancia materna - En menores de 6 meses",
                                                            "2" => "Inicio de la alimentación complementaria",
                                                            "3" => "Estimulación del desarrollo",
                                                            "4" => "Información sobre aprender a reconocer el llanto del bebé y sus necesidades",
                                                            "5" => "Cuidados especiales: baño, cambio de pañales",
                                                            "6" => "Medidas para la prevención de la muerte súbita del lactante",
                                                            "7" => "Signos de alarma y manejo básico de las condiciones prevalentes de la infancia (gripa, diarrea y fiebre)",
                                                            "8" => "Prevención de accidentes",
                                                            "9" => "Prácticas de crianza protectoras y basadas en derechos",
                                                            "10" => "Prevención de violencias",
                                                            "11" => "Promoción de la salud, del bienestar, del crecimiento, del desarrollo, de la adecuada alimentación, de prácticas para la adecuada manipulación de alimentos y prevención de enfermedades transmitidas por alimentos",
                                                            "12" => "Promoción de hábitos y estilos de vida saludables, evitación del sedentarismo y el uso prolongado de televisión, computadores y otras pantallas, de cuidado del oído y la visión, hábitos de higiene personal y de cuidado bucal, alertas tempranas de las pérdidas auditivas, conductas protectoras incluyendo normas de control y manejo del ruido para el mantenimiento de los ambientes tranquilos que propicien una audición segura",
                                                            "13" => "Promoción de la salud mental; de prevención de accidentes (incluyendo accidentes de tránsito en calidad de pasajero o de peatón)",
                                                            "14" => "Signos de alarma para enfermedades prevalentes de la infancia, asma, tuberculosis, manejo adecuado en casa y educar para consultar a urgencias en los casos necesarios",
                                                            "15" => "Derechos de los niños, derecho a la salud, y mecanismos de exigibilidad de estos",


                                                        ];

                                                        foreach ($ArreglosCamposOtrosAspectos as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           

                                                            
                                                            echo "<div class='form-group col-md-12'>
                                                                <label>$Titulo</label><br>
                                                                <textarea class='form-control' name='Educacion[Educacion][$Identificacion][$Titulo]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";
                                                            
                                                        }




                                                        ?>



                                                    </div>

