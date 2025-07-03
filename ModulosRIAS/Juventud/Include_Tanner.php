<div class='form-group col-md-12' style="width:100%">
                                                            <h2 style="width:100%;text-align:center">Estadios de Tanner</h2>
                                                        </div>
                                                        
                                                        <?php

                                                        if($GeneroTanner=="F"):




                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludSexual = [
                                                            "1" => array(
                                                                "Estadio I",
                                                                "Mama preadolescente o infantil. Solo el pezón está ligeramente sobreelevado",
                                                                "MujerMama_1.png"
                                                            ),
                                                            "2" => array(
                                                                "Estadio II",
                                                                "Brote mamario. Las areolas y pezones sobresalen como un cono. Esto indica la existencia de tejido glandular subyacente. Aumento del diámetro de la areola",
                                                                "MujerMama_2.png"
                                                            ),
                                                            "3" => array(
                                                                "Estadio III",
                                                                "Continuación del crecimiento con elevación de mama y areola en un mismo plano",
                                                                "MujerMama_3.png"
                                                            ),
                                                            "4" => array(
                                                                "Estadio IV",
                                                                "La areola y el pezón pueden distinguirse como una segunda elevación, por encima del contorno de la mama",
                                                                "MujerMama_4.png"
                                                            ),
                                                            "5" => array(
                                                                "Estadio V",
                                                                "La areola y el pezón pueden distinguirse como una segunda elevación, por encima del contorno de la mama",
                                                                "MujerMama_5.png"
                                                            ),
                                                        ];
                                                        
                                                        foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                            $Valor = $value[0];
                                                            $Pregunta = $value[1];
                                                            $Imagen = $value[2];
                                                        
                                                            $Identificacion = $key;
                                                        
                                                            echo "<div class='form-group col-md-12'>";

                                                            echo "<div class='form-group col-md-3' style='    text-align-last: center;'>
                                                                    <div style='    padding-top: 32px;'>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='ExamenFisico[SaludSexual][EscalaTanner][1][F1]' value='$Valor'> 
                                                                        </label>
                                                                    </div>
                                                                    </div>";
                                                            echo "<div class='form-group col-md-3'><img src='ModulosRIAS/ImagenesTanner/$Imagen' width='150px'></div>";
                                                            echo "<div class='form-group col-md-6'><label>$Valor<br>$Pregunta</label></div>";

                                                            echo "</div>";
                                                        }



                                                        echo "<div class='form-group col-md-12'>
                                                        <hr>
                                                    </div>";
                                                        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludSexual = [
                                                            "1" => array(
                                                                "Estadio I",
                                                                "Ligera vellosidad infantil",
                                                                "MujerPubis_1.png"
                                                            ),
                                                            "2" => array(
                                                                "Estadio II",
                                                                "Vello escaso, lacio y ligeramente pigmentado, usualmente a lo largo de los labios (dificultad para apreciar en la figura)",
                                                                "MujerPubis_2.png"
                                                            ),
                                                            "3" => array(
                                                                "Estadio III",
                                                                "Vello rizado, aún escasamente desarrollado, pero oscuro, claramente pigmentado, sobre los labios",
                                                                "MujerPubis_3.png"
                                                            ),
                                                            "4" => array(
                                                                "Estadio IV",
                                                                "Vello pubiano de tipo adulto, pero no con respecto a la distribución (crecimiento del vello hacia los pliegues inguinales, pero no en la cara interna de los muslos)",
                                                                "MujerPubis_4.png"
                                                            ),
                                                            "5" => array(
                                                                "Estadio V",
                                                                "Desarrollo de la vellosidad adulta con respecto a tipo y cantidad; el vello se extiende en forma de un patrón horizontal, el llamado femenino (el vello crece también en la cara interna de los muslos)",
                                                                "MujerPubis_5.png"
                                                            ),
                                                        ];
                                                        
                                                        foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                            $Valor = $value[0];
                                                            $Pregunta = $value[1];
                                                            $Imagen = $value[2];
                                                        
                                                            $Identificacion = $key;
                                                        
                                                            echo "<div class='form-group col-md-12'>";

                                                            echo "<div class='form-group col-md-3' style='    text-align-last: center;'>
                                                                    <div style='    padding-top: 32px;'>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='ExamenFisico[SaludSexual][EscalaTanner][2][F2]' value='$Valor'> 
                                                                        </label>
                                                                    </div>
                                                                    </div>";
                                                            echo "<div class='form-group col-md-3'><img src='ModulosRIAS/ImagenesTanner/$Imagen' width='150px'></div>";
                                                            echo "<div class='form-group col-md-6'><label>$Valor<br>$Pregunta</label></div>";

                                                            echo "</div>";
                                                        }



                                                        



                                                        elseif($GeneroTanner=="M"):

                                                        


                                                            //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludSexual = [
                                                            "1" => array(
                                                                "Estadio G1",
                                                                "Pene, testículo y escroto de tamaño infantil.",
                                                                "HombreG_1.png"
                                                            ),
                                                            "2" => array(
                                                                "Estadio G2",
                                                                "Aumento del tamaño de los testículos y del escroto (el pene no suele aumentar todavía). La piel del escroto más fina y enrojecida.",
                                                                "HombreG_2.png"
                                                            ),
                                                            "3" => array(
                                                                "Estadio G3",
                                                                "Siguen aumentando los testículos y el escroto. Aumenta la longitud del pene.",
                                                                "HombreG_3.png"
                                                            ),
                                                            "4" => array(
                                                                "Estadio G4",
                                                                "Continuación del crecimiento de los testículos y del escroto. El pene aumenta en diámetro y longitud. Pigmentación de la piel del escroto.",
                                                                "HombreG_4.png"
                                                            ),
                                                            "5" => array(
                                                                "Estadio G5",
                                                                "Órganos genitales propios de una persona adulta, tanto por su tamaño como por su forma.",
                                                                "HombreG_5.png"
                                                            ),
                                                        ];
                                                        
                                                        foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                            $Valor = $value[0];
                                                            $Pregunta = $value[1];
                                                            $Imagen = $value[2];
                                                        
                                                            $Identificacion = $key;
                                                        
                                                            echo "<div class='form-group col-md-12'>";

                                                            echo "<div class='form-group col-md-3' style='    text-align-last: center;'>
                                                                    <div style='    padding-top: 32px;'>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='ExamenFisico[SaludSexual][EscalaTanner][1][M1]' value='$Valor'> 
                                                                        </label>
                                                                    </div>
                                                                    </div>";
                                                            echo "<div class='form-group col-md-3'><img src='ModulosRIAS/ImagenesTanner/$Imagen' width='150px'></div>";
                                                            echo "<div class='form-group col-md-6'><label>$Valor<br>$Pregunta</label></div>";

                                                            echo "</div>";  
                                                        }



                                                        echo "<div class='form-group col-md-12'>
                                                        <hr>
                                                    </div>";
                                                        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludSexual = [
                                                            "1" => array(
                                                                "Estadio P1",
                                                                "No hay vello púbico",
                                                                "HombreP_1.png"
                                                            ),
                                                            "2" => array(
                                                                "Estadio P2",
                                                                "Crecimiento disperso de vello largo, fino, ligeramente pigmentado, liso o ligeramente rizado en la base del pene",
                                                                "HombreP_2.png"
                                                            ),
                                                            "3" => array(
                                                                "Estadio P3",
                                                                "Vello más pigmentado, más denso, más rizado, que se extiende por la sínfisis púbica.",
                                                                "HombreP_3.png"
                                                            ),
                                                            "4" => array(
                                                                "Estadio P4",
                                                                "Vello del tipo observado en una persona adulta, pero en menor cantidad.",
                                                                "HombreP_4.png"
                                                            ),
                                                            "5" => array(
                                                                "Estadio P5",
                                                                "Cello del tipo observado en una persona adulta, tanto por su tipo como por su cantidad.",
                                                                "HombreP_5.png"
                                                            ),
                                                        ];
                                                        
                                                        foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                            $Valor = $value[0];
                                                            $Pregunta = $value[1];
                                                            $Imagen = $value[2];
                                                        
                                                            $Identificacion = $key;
                                                            
                                                            echo "<div class='form-group col-md-12'>";

                                                            echo "<div class='form-group col-md-3' style='    text-align-last: center;'>
                                                                    <div style='    padding-top: 32px;'>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='ExamenFisico[SaludSexual][EscalaTanner][2][M2]' value='$Valor'>
                                                                        </label>
                                                                    </div>
                                                                    </div>";
                                                            echo "<div class='form-group col-md-3'><img src='ModulosRIAS/ImagenesTanner/$Imagen' width='150px'></div>";
                                                            echo "<div class='form-group col-md-6'><label>$Valor<br>$Pregunta</label></div>";

                                                            echo "</div>";
                                                        }








                                                        endif;
                                                        ?>