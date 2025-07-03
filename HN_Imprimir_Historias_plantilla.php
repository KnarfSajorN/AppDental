<?php
date_default_timezone_set('America/Bogota');

include("funciones/conn3.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

            $historiaClinica1 = decrypt($_GET['historiaClinica1']);



            $queryList=mysqli_query($conn3,"SELECT * FROM  nutricionAdulto where ID = $historiaClinica1");
            if ($queryList) {
              while($rowMotorizado=mysqli_fetch_array($queryList))
                {

                  $cliente_id      =$rowMotorizado['cliente_id'];
                  $usuario_id      =$rowMotorizado['usuario_id'];
                  $Fecha           =$rowMotorizado['Fecha'];

                  $Hora            =$rowMotorizado['Hora'];
                  $motivoConsulta  =$rowMotorizado['motivoConsulta'];
                  $diagnostico     =$rowMotorizado['diagnostico'];
                  $tratamiento     =$rowMotorizado['tratamiento'];
                  $notas           =$rowMotorizado['notas'];
                  $recipe          =$rowMotorizado['recipe'];
                  $remite          =$rowMotorizado['remite'];
                  $comoTomarlo     =$rowMotorizado['comoTomarlo'];
                  $incapacidades   =$rowMotorizado['incapacidades'];
                  $rSistema         =$rowMotorizado['rSistema'];
                  $enfermedadActual  =$rowMotorizado['enfermedad'];
                  $antecedentesPers  =$rowMotorizado['antecedentesPers'];
                  $antecedentesFami =$rowMotorizado['antecedentesFami'];
                  $nutricion =$rowMotorizado['antenutricion'];
                  $PARAMETROS=$rowMotorizado['parametros'];
                  $estilo = $rowMotorizado['estiloVida'];
                  $funcionalidadMuscular= $rowMotorizado['funcionalidadMuscular'];
                  $anamnesis= $rowMotorizado['anamnesis'];
                  $consumoH= $rowMotorizado['consumoH'];
                  $antropometria= $rowMotorizado['antropometria'];
                  $archivo= $rowMotorizado['archivo'];
                  $examenPartesdCuerpo= $rowMotorizado['examenPartesdCuerpo'];
                  $laboratorio= $rowMotorizado['laboratorio'];
                  $ecografia= $rowMotorizado['ecografia'];
                  $otros= $rowMotorizado['otros'];
                  $Antecedentes_personales= $rowMotorizado['Antecedentes_personales'];
                  $Antecedentes_Familiares= $rowMotorizado['Antecedentes_Familiares'];
                  $Antecedentes_Ginecologicos= $rowMotorizado['Antecedentes_Ginecologicos'];
                  $notasadicionales= $rowMotorizado['notasadicionales'];
                
                  $ConceptoyPlan = $rowMotorizado['ConceptoyPlan'];

                  $problemasGastrointestinales = $rowMotorizado['problemasGastrointestinales'];
                  $antecedentesNutricionales = $rowMotorizado['antecedentesNutricionales'];
                  $finalidadConsulta = $rowMotorizado['finalidadConsulta'];

              }
            }
            





/*
            $queryList=mysqli_query($conn3,"SELECT * FROM  informacion_rips  where id_historia = $historiaClinica1");
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $CUPS      =$rowMotorizado['CUPS'];
              $finalidad_consulta     =$rowMotorizado['finalidad_consulta'];
              $causa_externa          =$rowMotorizado['causa_externa'];

              $ambito_procedimiento           =$rowMotorizado['ambito_procedimiento'];
              $finalidad_procedimiento =$rowMotorizado['finalidad_procedimiento'];
              $realizacion_quirurgico  =$rowMotorizado['realizacion_quirurgico'];
              $cie10_complicacion     =$rowMotorizado['cie10_complicacion'];
            $cie10_1=$rowMotorizado['cie10_1']; 
            $cie10_2=$rowMotorizado['cie10_2']; 
            $cie10_3=$rowMotorizado['cie10_3']; 
            $cie10_4=$rowMotorizado['cie10_4']; 

          }
*/


/*
$queryList=mysqli_query($conn3,"SELECT * FROM  examenFisico where historia_id = $historiaClinica1");
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $peso     =$rowMotorizado['peso'];
              $altura    =$rowMotorizado['altura'];
              $imc         =$rowMotorizado['imc'];
               $ComposicionCorporal  = $rowMotorizado['ComposicionCorporal'];
             
              $eg          =$rowMotorizado['estadoGeneral'];
              $conciencia  =$rowMotorizado['estadoConciencia'];
              $ojos    =$rowMotorizado['ojos'];
              $ostocopia    =$rowMotorizado['otoscopia'];
              $cavidad           =$rowMotorizado['cavidadOral'];
              $cuello         =$rowMotorizado['cuello'];
              $torax   =$rowMotorizado['torax'];
              $corazo   =$rowMotorizado['corazon'];
             $abdomen        =$rowMotorizado['abdomen'];
             $urinario =$rowMotorizado['genitoUrinario'];
              $extremidades  =$rowMotorizado['extremidades'];
               $nervioso     =$rowMotorizado['sistemaNervioso'];
              $piel  =$rowMotorizado['pielAnexos'];
              $partes        =$rowMotorizado['examenPartesdCuerpo'];

              $tart         =$rowMotorizado['tart'];
              $tc  =$rowMotorizado['temperatura'];
              $card   =$rowMotorizado['fcard'];
              $sat  =$rowMotorizado['sat'];
             
 $vacularPeriferico    =$rowMotorizado['vacularPeriferico '];            } 
 */

           $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $usuario_id");
           if ($queryList) {
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
                $moneda=$rowMotorizado['moneda'];
                $impuestoF=$rowMotorizado['impuestoF'];

                // Nuevos campos

                $nombreF      =$rowMotorizado['nombreF'];
                $telefonoF    =$rowMotorizado['telefonoF'];
                $direccionF   =$rowMotorizado['direccionF'];
                $emailF       = $rowMotorizado['emailF'];
                $ciudadPaisF  =$rowMotorizado['ciudadPaisF'];
                $licenciaF    =$rowMotorizado['licenciaF'];
                $pieF         =$rowMotorizado['pieF'];
                $header       = $rowMotorizado['header'];

                $LogoF               =$rowMotorizado['logoF'];
                $firma               =$rowMotorizado['firma'];

              if (strlen($LogoF) > 0) 
              {
               $Logo = '<img src="'.$Base.'logos/'.$LogoF.'" style="height: 3.5cm;width: auto;">'; 
              }
              

              if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="'.$Base.'FirmasReg/'.$firma.'" height="80" width="150">'; 
              }





// Nuevos campos 


            }
           }
            
 

            $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $usuario_id");
            if ($queryList) {
              while($rowMotorizado=mysqli_fetch_array($queryList))
                {

                  $empresaNombre      =$rowMotorizado['empresaNombre'];
                  $pais               =$rowMotorizado['pais'];

                  $ciudad             =$rowMotorizado['ciudad'];
                  $direccion          =$rowMotorizado['direccion'];
                  $telefono           =$rowMotorizado['whatsapp'];
                  $especialidad        = $rowMotorizado['especialidad'];
                  $nit                =$rowMotorizado['nit'];
                  

                }
            }
            


            $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $cliente_id");
            if ($queryList) {
              while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
              $fechaNacimiento            =$rowMotorizado['fechaNacimiento'];
              $celular_cliente            =$rowMotorizado['celular_cliente'];
              $entidadSalud                     =$rowMotorizado['entidadSalud'];
              $genero                     =$rowMotorizado['genero'];
              $direccion_cliente          =$rowMotorizado['direccion_cliente'];
              $etnia=$rowMotorizado['etnia'];
              $discapacidad=$rowMotorizado['tipodiscapacidad'];
          
              $entidadSalud = funcionMaster($rowMotorizado['entidad_id'],'id','Nombre','Rips_Entidades');
              $celular_cliente = $rowMotorizado['celular_cliente'];
              $genero = $rowMotorizado['genero'];
          
              if ($genero == "M") {
                  $genero = "Masculino";
              } elseif ($genero == "F") {
                  $genero = "Femenino";
              }
                
            }
            }
            


            $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $historiaClinica1 and historia_nombre = 'nutricionAdulto'");
            if ($queryList) {
              while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                $firmaP = $rowMotorizado['firma'];
              }
            }
      

      if (strlen($firmaP) > 10) {
        $firmaPaciente = "<img src='$firmaP' height='125' width='125'> <br>__________________________________ <br>$nombre_cliente<br>$CODI_CLIENTE";

      } 


 
   ?>



<!-- 
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/Impresion/estructura_impresion.css"> -->
    <!--<link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">-->
<!-- </head>

<body> -->

                        <table class="table" style="width: 100%;margin-top: 3px;">
                            <tr>
                                <td width="35%">
                                    <b>Nombre:</b> <?php echo $nombre_cliente ?> 
                                </td>
                                <td width="30%">
                                    <b>Documento:</b> <?php echo $CODI_CLIENTE ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <b>F.Nacimiento:</b> <?php echo  $fechaNacimiento ?>
                                </td>
                                <td width="15%">
                                    <b>Edad:</b> <?php echo  CalculoEdadPaciente($fechaNacimiento); ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b>Residencia:</b> <?php echo $direccion_cliente  ?>
                                </td>
                                <td>
                                    <b>EPS:</b> <?php echo $entidadSalud  ?>
                                </td>
                            </tr>
                            <tr style="border-bottom-width: 1px;">
                                <td>
                                    <b>Teléfono:</b> <?php echo $celular_cliente ?>
                                </td>
                                <td>
                                    <b>Género:</b> <?php echo $genero ?>
                                </td>
                            </tr>
                        </table>

                        <hr style="border-top: 1px solid black;opacity: 1;">




  
                        <div class="row col-md-12">
                        <h4 align="center"> Historia Nutrición</h4>
                                
                        <?php
                        
                        if($remite<>''){echo "<div class='col-md-12'><b>¿Quién Remite?:</b> {$remite}</div>";}
                        
                        if($motivoConsulta<>''){echo "<div class='col-md-12'><b>Motivo Consulta:</b> {$motivoConsulta}</div>";}
                        
                          
                        if($finalidadConsulta<>''){echo "<div class='col-md-12'><b>Finalidad de la consulta:</b> {$finalidadConsulta}</div>";}
                        
                        if($enfermedadActual<>''){echo "<div class='col-md-12'><b>Enfermedad Actual:</b> {$enfermedadActual}</div>";}

                        echo "<div><br></div>";
                        /////////////////////////////

                        if($notasadicionales<>''){echo "<div class='col-md-12'><b>Revisión por Sistema:</b> {$notasadicionales}</div>";}
                        echo "<div><br></div>";
                        /////////////////////////////

                        //
                          // 
                          if($problemasGastrointestinales<>''){echo "<div class='col-md-10'><center>{$problemasGastrointestinales}</center></div><br><br>";}
                          
                        if($Antecedentes_personales<>''){echo "<div class='col-md-6'><br><br>Antecedentes personales{$Antecedentes_personales}<br><br></div>";}


                        echo "<div class='col-md-12 row' style='display:flex; flex-direction: row; justify-content: space-between'>";
                        if($antecedentesFami<>''){echo "<div class='col-6'>{$antecedentesFami}</div>";}

                        if($antecedentesNutricionales<>''){echo "<div class='col-6'> {$antecedentesNutricionales}</div>";}

                        echo "</div><br><br>";
                        

                        if($Antecedentes_Ginecologicos<>''){echo "<div class='col-md-12'>Antecedentes Ginecológicos: {$Antecedentes_Ginecologicos}</div>";}
                        echo "<div><br></div>";
                        /////////////////////////////


                        /////////////////////////////

                        if($PARAMETROS<>''){echo "<div class='col-md-12'><h6> Parámetros Bioquímicos </h6> <br> {$PARAMETROS}</div>";}
                        echo "<div><br></div>";
                        /////////////////////////////

                        /////////////////////////////

                        if($estilo<>''){echo "<div class='col-md-12'><h6> Estilo de Vida </h6> <br> {$estilo}</div>";}
                        echo "<div><br></div>";
                        /////////////////////////////

                        /////////////////////////////

                        if($funcionalidadMuscular<>''){echo "<div class='col-md-12'><h6> Funcionalidad Muscular </h6> <br> {$funcionalidadMuscular}</div>";}
                        echo "<div><br></div>";
                        /////////////////////////////

                        /////////////////////////////

                        if($anamnesis<>''){echo "<div class='col-md-12'><h6> Anamnesis Gastrointestinal y Alimentaria </h6> <br> {$anamnesis}</div>";}
                        echo "<div><br></div>";
                        /////////////////////////////

                        /////////////////////////////
                        //?Importante si modifican y agregan o quitan algun caracteres del modulo de consumoH en el guardar deberan modificar aqui cuantos caracteres tiene al estar vacio para evitar que se visualize la tabla si esta vacia
                        
                        if(strlen($consumoH)>1974){echo "<div class='col-md-12'><h6> Consumo Habitual </h6> <br> {$consumoH}</div>";}
                        echo "<div><br></div>";
                        /////////////////////////////

                        /////////////////////////////
                        //?Importante si modifican y agregan o quitan algun caracteres del modulo de antropometria en el guardar deberan modificar aqui cuantos caracteres tiene al estar vacio para evitar que se visualize la tabla si esta vacia
                        if(strlen($antropometria)>54){echo "<div class='col-md-12'><h6> Antropometría Completa </h6> <br> {$antropometria}</div>";}
                        echo "<div><br></div>";
                        /////////////////////////////

                        /////////////////////////////

                        if($ConceptoyPlan<>''){echo "<div class='col-md-12'><h6> Concepto y Plan </h6> <br> {$ConceptoyPlan}</div>";}
                        echo "<div><br></div>";
                        /////////////////////////////
                        
                        /////////////////////////////

                        if($incapacidades<>'' OR $recipe<>'' OR $notas<>'' OR $examenPartesdCuerpo<>'' OR $diagnostico<>'' OR $tratamiento<>'')
                          {echo "<div class='col-md-12'><h6> Notas y Formulaciones </h6> <br> </div>";
                            
                            if($incapacidades<>''){
                              echo "<div class='col-md-12'>Incapacidades: {$incapacidades} </div>";
                            }

                            if($recipe<>''){
                              echo "<div class='col-md-12'>Receta Médica: {$recipe} </div>";
                            }

                            if($notas<>''){
                              echo "<div class='col-md-12'>Notas: {$notas} </div>";
                            }

                            if($examenPartesdCuerpo<>''){
                              echo "<div class='col-md-12'>Exámenes de las Partes del Cuerpo: {$examenPartesdCuerpo} </div>";
                            }

                            if($diagnostico<>''){
                              echo "<div class='col-md-12'>Impresiones Diagnósticas (Diagnóstico General): {$diagnostico} </div>";
                            }

                            if($tratamiento<>''){
                              echo "<div class='col-md-12'>Tratamiento (Plan de Atención): {$tratamiento} </div>";
                            }
                          }
                        echo "<div><br></div>";
                        /////////////////////////////


                        /////////////////////////////

                        if($laboratorio<>'' OR $ecografia<>'' OR $otros<>'')
                          {echo "<div class='col-md-12'><h6> Exámenes a Realizar </h6> <br> </div>";
                            
                            if($incapacidades<>''){
                              echo "<div class='col-md-12'>Laboratorio: {$laboratorio} </div>";
                            }

                            if($ecografia<>''){
                              echo "<div class='col-md-12'>Imagenología: {$ecografia} </div>";
                            }

                            if($notas<>''){
                              echo "<div class='col-md-12'>Otros: {$otros} </div>";
                            }
                          }
                        echo "<div><br></div>";
                        /////////////////////////////

                        ?>



        </div>
<div class="col-md-12">
                            <div class="row">

                                <div class="col-md-6" align="center">
                                    <?php
                                    echo  $firmaPaciente;

                                    ?>
                                </div>

                                <div class="col-md-6" align="center">
                                    <?php
                                    echo  $firmaImg;

                                    ?>
                                    <br>_______________________________________<br>
                                    <?php echo $nombreF ?><br>
                                    <b>* Documento firmado digitalmente *</b>
                                </div>
                            </div>
                        </div>



        <!-- division -->

        <!-- <table>
            <thead>
                <tr>
                    <td> -->
                        <!--place holder for the fixed-position header-->
                        <!-- <div class="page-header-space"></div>
                    </td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td> -->
                        <!--*** CONTENT GOES HERE ***-->


















                        


        <!-- </div> -->
        <!-- cierre del page-->
        <!-- </td>
        </tr>
        </tbody>

        <tfoot>
            <tr>
                <td> -->
                    <!--place holder for the fixed-position footer-->
                    <!-- <div class="page-footer-space"></div>
                </td>
            </tr>
        </tfoot>

        </table>

</body>

</html> -->