                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_1_SubPrincipal_2">
                                                        1.2	Derechos sexuales y reproductivos
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

         
                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludSexual = [
                                                            "1" => "Orientacion Sexual",
                                                            "2" => "Identidad de Genero",
                                                            "3" => "Inicio de relaciones sexuales",
                                                            "4" => "Número de compañeros sexuales",
                                                            "5" => "Uso de métodos de anticoncepción y protección contra ITS/VIH",
                                                            "6" => "Dificultad durante relaciones sexuales"
                                                        ];

                                                        foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           
                                                            if($key=="3"){
                                                                echo"
                                                                <div class='form-group col-md-12'>
                                                                    <label>$Titulo</label><br>
                                                                    <select name='Anamnesis[DerechosSexuales][$Identificacion][$Titulo]' class='form-control input-lg select2' style='width:100%'>
                                                                        <option value=''>Seleccione</option>
                                                                        <option value='Si'>Si</option>
                                                                        <option value='No'>No</option>  
                                                                    </select>

                                                                </div>";
                                                            }
                                                            else if($key=="1"){

                                                                echo"
                                                                <div class='form-group col-md-12'>
                                                                    <label>$Titulo</label><br>
                                                                    <select name='Anamnesis[DerechosSexuales][$Identificacion][$Titulo]' class='form-control input-lg select2' style='width:100%'>
                                                                        <option value=''>Seleccione</option>
                                                                        <option value='Homosexual'>Homosexual</option>
                                                                        <option value='Bisexual'>Bisexual</option>
                                                                        <option value='Pansexual'>Pansexual</option>        
                                                                        <option value='Demisexualidad'>Demisexualidad</option>
                                                                        <option value='Lithsexualidad'>Lithsexualidad</option>
                                                                        <option value='Autosexualidad'>Autosexualidad</option>
                                                                        <option value='Antrosexualidad'>Antrosexualidad</option>    
                                                                        <option value='Polisexualidad'>Polisexualidad</option>  
                                                                        <option value='Asexualidad'>Asexualidad</option>    
                                                                    </select>

                                                                </div>";
                                                            }
                                                            else if($key=="2"){

                                                                echo"
                                                                <div class='form-group col-md-12'>
                                                                    <label>$Titulo</label><br>
                                                                    <select name='Anamnesis[DerechosSexuales][$Identificacion][$Titulo]' class='form-control input-lg select2' style='width:100%'>
                                                                        <option value=''>Seleccione</option>
                                                                        <option value='Hombre Transgénero'>Hombre Transgénero</option>
                                                                        <option value='Mujer Transgénero'>Mujer Transgénero</option>    
                                                                        <option value='Transexual'>Transexual</option>
                                                                        <option value='Andrógino'>Andrógino</option>
                                                                        <option value='Neutrois'>Neutrois</option>
                                                                        <option value='No Binario'>No Binario</option>
                                                                        <option value='No Conformes con el Género'>No Conformes con el Género</option>
                                                                        <option value='Agénero'>Agénero</option>
                                                                        <option value='Bigénero'>Bigénero</option>
                                                                        <option value='Pangénero'>Pangénero</option>
                                                                    </select>

                                                                </div>";

                                                            }
                                                            else if($key=="4" OR $key=="5"){

                                                                echo"
                                                                <div class='form-group col-md-12'>
                                                                    <label>$Titulo</label><br>
                                                                    <textarea class='form-control' name='Anamnesis[DerechosSexuales][$Identificacion][$Titulo]' style='width:100%'></textarea>

                                                                </div>";

                                                            }
                                                            else if($key=="6"){

                                                                echo"
                                                                <div class='form-group col-md-12'>
                                                                    <label>$Titulo</label><br>
                                                                    <select name='Anamnesis[DerechosSexuales][$Identificacion][$Titulo]' class='form-control input-lg select2' style='width:100%'>
                                                                        <option value=''>Seleccione</option>
                                                                        <option value='Excitación'>Excitación</option>
                                                                        <option value='Lubricación'>Lubricación</option>  
                                                                        <option value='Orgasmo'>Orgasmo</option> 
                                                                        <option value='Erección'>Erección</option> 
                                                                        <option value='Eyaculación'>Eyaculación</option> 
                                                                        <option value='Dolor'>Dolor</option> 
                                                                    </select>

                                                                </div>";

                                                            }
                                                            
                                                            

                                                            
                                                        }


                                                        ?>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->