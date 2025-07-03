                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_2_SubPrincipal_4">
                                                        2.4 Valoración de la vida sexual
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_2_SubPrincipal_4" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">

                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>
                                                        
                                                        <?php
                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludSexual = [
                                                            "1" => "Madurez sexual",
                                                            "2" => "Signos de violencia física o sexual"
                                                        ];

                                                        foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           
                                                            
                                                            echo "<div class='form-group col-md-12'><label>$Titulo</label></div>";

                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>Observaciones</label><br>
                                                                <textarea class='form-control' name='ExamenFisico[SaludSexual][Signos][$Identificacion][$Titulo]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";

                                                            
                                                        }
                                                        ?>

                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12' style="width:100%">
                                                            <h4 style="width:100%;text-align:center">Maduración sexual y crecimiento físico </h4>
                                                        </div>

                                                        <?php

                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludSexual = [
                                                            "1" => "Estirón puberal",
                                                            "2" => "Modificación de composición corporal",
                                                        ];

                                                        foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           
                                                            /*
                                                            echo "<div class='form-group col-md-12'><label>$Titulo</label></div>";

                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>Observaciones</label><br>
                                                                <textarea class='form-control' name='ExamenFisico[SaludSexual][MaduracionSexualCrecimiento][$Identificacion][$Titulo]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";
                                                            */

                                                            echo "<div class='form-group col-md-12'><label>$Titulo</label></div>";

                                                            echo"<div class='form-group col-md-2'>
                                                                    
                                                                    <div>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='ExamenFisico[SaludSexual][MaduracionSexualCrecimiento][$Identificacion][$value]' value='Si'> Sí
                                                                        </label>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='ExamenFisico[SaludSexual][MaduracionSexualCrecimiento][$Identificacion][$value]' value='No' > No
                                                                        </label>
                                                                    </div>
                                                                </div>";

                                                            
                                                        }

                                                        echo '<div class="form-group col-md-12" style="width:100%">
                                                        <h4 style="width:100%;text-align:center">Aspectos que interfieren en maduración sexual</h4>
                                                    </div>';


                                                        $ArreglosCamposSaludSexual = [
                                                            "1" => "Aspectos que interfieren en maduración sexual",
                                                            "2" => "Aspecto nutricional",
                                                            "3" => "Glándula tiroidea (tamaño, consistencia, presencia de nódulos o masas)",
                                                            "4" => "Signos clínicos compatibles con patología crónica (acidosis renal, insuficiencia renal, fibrosis quística, enfermedades cardiacas, SIDA, asma severa, DM tipo 1) o cromosomopatía (talla baja o alta, pterigión ocular, implantación pabellón auricular, otros)",
                                                            "5" => "Signos clínicos de hipogonadismo",
                                                            "6" => "Estrés ambiental",
                                                            "7" => "Entrenamiento atlético intenso",
                                                            "8" => "Uso de drogas",
                                                            "9" => "Exceso de glucocorticoides"
                                                        ];

                                                        foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           
                                                            
                                                            echo "<div class='form-group col-md-12'><label>$Titulo</label></div>";

                                                            echo"<div class='form-group col-md-2'>
                                                                    
                                                                    <div>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='ExamenFisico[SaludSexual][AspectosMaduracion][$Identificacion][$value]' value='Si'> Sí
                                                                        </label>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='ExamenFisico[SaludSexual][AspectosMaduracion][$Identificacion][$value]' value='No' > No
                                                                        </label>
                                                                    </div>
                                                                </div>";

                                                            
                                                        }

                                                        ?>

                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>



                                                        <?php
                                                        
                                                        include 'ModulosRIAS/Adolescencia/Include_Tanner.php';

                                                        ?>


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        



                                                        <div class='form-group col-md-12' style="width:100%">
                                                            <h2 style="width:100%;text-align:center">En Mujeres</h2>
                                                        </div>


                                                        <?php

         
                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludSexual = [
                                                            "1" => "Mutilación genital",
                                                            "2" => "Matrimonio infantil o forzoso"
                                                        ];

                                                        foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           
                                                            
                                                            echo "<div class='form-group col-md-12'><label>$Titulo</label></div>";

                                                            echo"<div class='form-group col-md-2'>
                                                                    
                                                                    <div>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='ExamenFisico[SaludSexual][Mujeres][$Identificacion][$value][1][Estado]' value='Si'> Sí
                                                                        </label>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='ExamenFisico[SaludSexual][Mujeres][$Identificacion][$value][1][Estado]' value='No' > No
                                                                        </label>
                                                                    </div>
                                                                </div>";

                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>Observaciones</label><br>
                                                                <textarea class='form-control' name='ExamenFisico[SaludSexual][Mujeres][$Identificacion][$value][2][Observaciones]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";

                                                            
                                                        }

                                                        ?>








                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12' style="width:100%">
                                                            <h2 style="width:100%;text-align:center">En Varones</h2>
                                                        </div>


                                                        <?php

         
                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludSexual = [
                                                            "1" => "Criptorquidia",
                                                            "2" => "Epi o hipospadias",
                                                            "3" => "Varicocele"
                                                        ];

                                                        foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           
                                                            
                                                            echo "<div class='form-group col-md-12'><label>$Titulo</label></div>";

                                                            echo"<div class='form-group col-md-2'>
                                                                    
                                                                    <div>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='ExamenFisico[SaludSexual][Varones][$Identificacion][$value][1][Estado]' value='Si'> Sí
                                                                        </label>
                                                                        <label class='radio-inline'>
                                                                            <input type='radio' name='ExamenFisico[SaludSexual][Varones][$Identificacion][$value][1][Estado]' value='No' > No
                                                                        </label>
                                                                    </div>
                                                                </div>";

                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>Observaciones</label><br>
                                                                <textarea class='form-control' name='ExamenFisico[SaludSexual][Varones][$Identificacion][$value][2][Observaciones]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";

                                                            
                                                        }
                                                    ?>









                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12' style="width:100%">
                                                            <h2 style="width:100%;text-align:center">Intersexuales</h2>
                                                        </div>


                                                        <?php

         
                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludSexual = [
                                                            "1" => "Valoracion",
                                                        ];

                                                        foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           
                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>$Titulo</label><br>
                                                                <textarea class='form-control' name='ExamenFisico[SaludSexual][Intersexuales][$Identificacion][$value]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";

                                                            
                                                        }


                                                        ?>


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div class='form-group col-md-12' style="width:100%">
                                                            <h2 style="width:100%;text-align:center">Otros</h2>
                                                        </div>


                                                        <?php

         
                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludSexual = [
                                                            "1" => "Sexo",
                                                            "2" => "Orientacion Sexual",
                                                            "3" => "Identidad de género",
                                                        ];

                                                        foreach ($ArreglosCamposSaludSexual as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           
                                                            if($key=="1"){
                                                                echo"
                                                                <div class='form-group col-md-12'>
                                                                    <label>$Titulo</label><br>
                                                                    <select name='ExamenFisico[SaludSexual][Otros][$Identificacion][$Titulo]' class='form-control input-lg select2' style='width:100%'>
                                                                        <option value=''>Seleccione</option>
                                                                        <option value='Masculino'>Masculino</option>
                                                                        <option value='Femenino'>Femenino</option>  
                                                                    </select>

                                                                </div>";
                                                            }
                                                            else if($key=="2"){

                                                                echo"
                                                                <div class='form-group col-md-12'>
                                                                    <label>$Titulo</label><br>
                                                                    <select name='ExamenFisico[SaludSexual][Otros][$Identificacion][$Titulo]' class='form-control input-lg select2' style='width:100%'>
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
                                                            else if($key=="3"){

                                                                echo"
                                                                <div class='form-group col-md-12'>
                                                                    <label>$Titulo</label><br>
                                                                    <select name='ExamenFisico[SaludSexual][Otros][$Identificacion][$Titulo]' class='form-control input-lg select2' style='width:100%'>
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
                                                            
                                                            

                                                            
                                                        }


                                                        ?>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->