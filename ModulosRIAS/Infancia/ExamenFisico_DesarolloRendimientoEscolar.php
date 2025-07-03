
                                       
                                       <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_2_SubPrincipal_2">
                                                        2.2	Valoración del desarrollo y rendimiento escolar
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_2_SubPrincipal_2" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <?php

                                                        $ArreglosCamposDesarolloRendimientoEscolar = [
                                                            "1" => "Rendimiento escolar, del comportamiento y aprendizaje",
                                                        ];

                                                        foreach ($ArreglosCamposDesarolloRendimientoEscolar as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificador = $key;
                                                        echo"
                                                        <div class='form-group col-md-12'>
                                                            <label>$Titulo</label><br>
                                                            <textarea class='form-control' name='ExamenFisico[RendimientoEscolar][ComportamientoAprendizaje][$Identificador][$value]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                        </div>";

                                                        }



                                                        ?>

                                                        <?php
                                                        if($DiasNacido_Paciente<=2555):
                                                        ?>
                                                        <div class='form-group col-md-12' style="width:100%">
                                                            <h2 style="width:100%;text-align:center">2.2.1 Escala abreviada del desarrollo</h2>
                                                        </div>

                                                        <?php
                                                        include 'ModulosRIAS/Infancia/Include_EscalaAbreviadaDesarrollo.php';
                                                        ?>

                                                        <div class='form-group col-md-12'>
                                                            <br>
                                                            <hr>
                                                            <br>
                                                        </div>
                                                        <?php
                                                        endif;
                                                        ?>

                                                    
                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12'>
                                                            <h3 style="width:100%;text-align:center">Test Goodenough Harris</h3>
                                                        </div>

                                                        <?php
                                                        

                                                        include 'ModulosRIAS/Infancia/Include_TestGoodenough.php';


                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->

                                        <script>
                                            /*
                                            function IMC() {
                                                m1 = document.getElementById("SignosVitales_Peso").value;
                                                m2 = document.getElementById("SignosVitales_Altura").value;
                                                 r = m1 / ((m2 / 100) * (m2 / 100));
                                                document.getElementById("SignosVitales_IMC").value = r.toFixed(2);
                                                var ComposicionCorporal4 ="";
                                                if (r.toFixed(2) < 18.49)
                                                    ComposicionCorporal4 = 'Delgadez o bajo peso';
                                                else if (r.toFixed(2) > 18.50 & r.toFixed(2) < 24.99)
                                                    ComposicionCorporal4 = 'Normal';
                                                else if (r.toFixed(2) > 25.00 & r.toFixed(2) < 29.99)
                                                    ComposicionCorporal4 = 'Sobrepeso';
                                                else if (r.toFixed(2) > 30.00)
                                                    ComposicionCorporal4 = 'Obesidad';
                                                document.getElementById("SignosVitales_ComposicionCorporal").value = ComposicionCorporal4;
                                            }

                                            document.addEventListener("DOMContentLoaded", function() {

                                            var inputPeso = document.getElementById("SignosVitales_Peso");
                                            var inputAltura = document.getElementById("SignosVitales_Altura");
                                            
                                            // Agrega el evento 
                                            inputPeso.onchange = IMC;
                                            inputAltura.onchange = IMC;
                                            });
                                            */
                                        </script>