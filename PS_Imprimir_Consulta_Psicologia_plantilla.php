<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
date_default_timezone_set('America/Bogota');

include("funciones/conn3.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

            $historiaClinica1 = decrypt($_GET['historiaClinica1']);


                  $queryList=mysqli_query($conn3,"SELECT * FROM  HistoriaClinica12 where ID = $historiaClinica1");

                  // $nrowl=mysqli_num_rows($queryList);

                  if ($queryList) {
                    while($row_recordset32=mysqli_fetch_array($queryList))

                  {
                      $ID                 = $row_recordset32['ID'];                
                      $Fecha                 = $row_recordset32['Fecha'];                
                      $Hora                  = $row_recordset32['Hora'];
                       $entrevistaInicial        = $row_recordset32['entrevistaInicial'];
                       $historiaPersonal           = $row_recordset32['historiaPersonal']; 


                      $historiaFamiliar           = $row_recordset32['historiaFamiliar'];      
                      $Personalidad           = $row_recordset32['Personalidad']; 

                      $examenMental           = $row_recordset32['examenMental'];      
                      $educacion           = $row_recordset32['educacion'];      
                      $Trabajo           = $row_recordset32['Trabajo'];      
                      $cambioResidencia           = $row_recordset32['cambioResidencia'];      
                      $accidentesEnfermedades           = $row_recordset32['accidentesEnfermedades'];      
                      $vidaSexual           = $row_recordset32['vidaSexual'];      
                      $habitosIntereses           = $row_recordset32['habitosIntereses'];      
                      $actitudConFamilia           = $row_recordset32['actitudConFamilia'];      
                      $suenos           = $row_recordset32['suenos'];      
                      $AntecedentesSocioeconomicos           = $row_recordset32['AntecedentesSocioeconomicos'];      
                      $evaluacion           = $row_recordset32['evaluacion'];      
                      $tratamiento           = $row_recordset32['tratamiento'];      
                      $evolucion           = $row_recordset32['evolucion'];      
                      $fechaevolucion           = $row_recordset32['fechaEvolucion']; 
                      $cliente_id      =$row_recordset32['cliente_id'];
                      $usuario_id      =$row_recordset32['usuario_id'];
 
  
                   }
                  }
                  










           $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $usuario_id");
            // $nrowl=mysqli_num_rows($queryList);
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
                $firmaImg = '<img src="'.$Base.'FirmasReg/'.$firma.'" height="80" width="200">'; 
              }

// Nuevos campos 
 
            }
            }
            
 

            $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $usuario_id");
            // $nrowl=mysqli_num_rows($queryList);
            if ($queryList) {
              while($rowMotorizado=mysqli_fetch_array($queryList))
              {

                $empresaNombre      =$rowMotorizado['empresaNombre'];
                $pais               =$rowMotorizado['pais'];

                $ciudad             =$rowMotorizado['ciudad'];
                $direccion          =$rowMotorizado['direccion'];
                $telefono           =$rowMotorizado['telefono'];
                $especialidad        = $rowMotorizado['especialidad'];
                $nit                =$rowMotorizado['nit'];

              }
            }
            

    $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $cliente_id");
            // $nrowl=mysqli_num_rows($queryList);
            if ($queryList) {
              while($rowMotorizado=mysqli_fetch_array($queryList))
              {


                $nombre_cliente             =$rowMotorizado['nombre_cliente'];
                $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
                $fechaNacimiento            =$rowMotorizado['fechaNacimiento'];
                $celular_cliente            =$rowMotorizado['celular_cliente'];
                $seguro                     =$rowMotorizado['seguro'];
                $direccion_cliente          =$rowMotorizado['direccion_cliente'];
                $etnia=$rowMotorizado['etnia'];
                $discapacidad=$rowMotorizado['tipodiscapacidad'];

                $entidadSalud = $rowMotorizado['entidadSalud'];
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
            

 
   ?>


<!-- <!DOCTYPE html>
<html>

<head> -->
    <!--<link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">-->
<!-- </head>

<body> -->
  <!-- <style>
    h5{
      margin-top: 100px
    }
  </style> -->
                    <table class="table" style="width: 100%;margin-top: 3px;">
                      <tr>
                          <td width="35%">
                              <b>Nombre:</b> <?php echo $historiaClinica1 . " " .$nombre_cliente ?> 
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


        <div class="row">
        <h4 align="center"> Valoración de Psicología </h4>
                
        </div>
   

        <div>
          <?php if (strlen($Fecha)>0): ?>
            
            <!--<p>entrevista Inicial: </p> --> 
            <p><b>Fecha de Valoración:</b> <?php echo $Fecha?></p>  
            
          <?php endif ?>
        </div>
  
  
   <br><h5> 1. Entrevista Inicial </h5>
    
    <div>
     <?php if (strlen($entrevistaInicial)>0): ?>
        <div>
          <hr>
          <!--<p>entrevista Inicial: </p> --> 
          <p> <?php
          
          $valores = explode('|', $entrevistaInicial);
          foreach ($valores as $valor) {
              echo $valor . "<br>";
          }
          //echo $entrevistaInicial?></p>  
        </div>
      <?php endif ?>
    </div>




 
     <br><h5> 2. Historia Familiar </h5><div> <?php if (strlen($historiaFamiliar)>0): ?>
          <div>
            <hr>
          <!--<p>historia Familiar:</p>-->
          <p>  <?php 
          
          $valores = explode('|', $historiaFamiliar);
            foreach ($valores as $valor) {
                echo $valor . "<br>";
            }

          //echo $historiaFamiliar
          ?></p>
          </div>
          <?php endif ?>  
      </div>    

  

              
      <br>
      <h5>3. Historia Personal</h5>
      <div style="padding: 15px">
          <?php if (strlen($historiaPersonal) > 0): ?>
              <div>
                  <hr>
                  <p>
                      <?php
                      $valores = explode('|', $historiaPersonal);
                      foreach ($valores as $valor) {
                          echo $valor . "<br>";
                      }
                      ?>
                  </p>
              </div>
          <?php endif ?>
      </div>

  

              
        <br><h5> 4. Personalidad </h5> <div> <?php if (strlen($Personalidad)>0): ?>
        <div>

            <hr>

            <!-- <p>Personalidad:</p>-->
            <p>  <?php 
            
            $valores = explode('|', $Personalidad);
            foreach ($valores as $valor) {
                echo $valor . "<br>";
            }

            //echo $Personalidad?></p>
          </div>
          <?php endif ?>
        </div>

  

            <br><h5> 5. Examen General </h5>
            <div>
              <?php if (strlen($examenMental)>0): ?>
                <div>
                  <hr>
                <!-- <p>examenMental:</p>-->
                <p>  <?php 
                
                $valores = explode('|', $examenMental);
                  foreach ($valores as $valor) {
                      echo $valor . "<br>";
                  }

                //echo $examenMental?></p>
                </div>
                <?php endif ?>
            </div>
  
 
            <br><h5> 6. Educación</h5> 
            <div><?php if (strlen($educacion)>0): ?>
              <div>
                <hr>
               <!--<p>educacion:</p>-->
               <p>  <?php echo $educacion?></p>
              </div>
              <?php endif ?>
            </div>

            <br><h5> 7. Trabajo</h5>
              <div>
                <?php if (strlen($Trabajo)>0): ?>
                <div>
                  <hr>
                <!--<p>Trabajo:</p>-->
                <p>  <?php echo $Trabajo?></p>
                </div>
                <?php endif ?>
              </div>
  
              <br><h5> 8. Cambio de Residencia</h5>
                <div><?php if (strlen($cambioResidencia)>0): ?>
                    <div>
                    <hr>
                    <!--<p>cambio Residencia:</p>-->
                    <p>  <?php echo $cambioResidencia?></p>
                    </div>
                    <?php endif ?>
                </div>
  
              <br><h5> 9. Accidentes y Enfermedades </h5>  
              <div>
                <?php if (strlen($accidentesEnfermedades)>0): ?>
                <div>
                  <hr>
                <!--<p>accidentesEnfermedades:</p>-->
                <p>  <?php echo $accidentesEnfermedades?></p>
                </div>
                <?php endif ?>
              </div>


  
              <br><h5> 10. Vida Sexual </h5> 
              <div><?php if (strlen($vidaSexual)>0): ?>
                <div>
                  <hr>
                <!--<p>vidaSexual:</p>-->
                <p>  <?php echo $vidaSexual?></p>
                </div>
              <?php endif ?>
              </div>

 
                <br><h5> 11. Hábitos e Intereses </h5> <div ><?php if (strlen($habitosIntereses)>0): ?>
              <div>
                <hr>
              <!-- <p>habitosIntereses:</p>-->
               <p>  <?php echo $habitosIntereses?></p>
              </div>
              <?php endif ?>
              </div>

 
              <br><h5> 12. Actitud hacia la Familia </h5> <div ><?php if (strlen($actitudConFamilia)>0): ?>
                <div>
                  <hr>
                <!-- <p>actitudConFamilia:</p>-->
                <p>  <?php echo $actitudConFamilia?></p>
                </div>
                <?php endif ?>
              </div>
 
              <br><h5> 13. Sueños </h5> <div >
                <?php if (strlen($suenos)>0): ?>
                  <div>
                    <hr>
                  <!--<p>sueños:</p>-->
                  <p>  <?php echo $suenos?></p>
                  </div>
                <?php endif ?>
              </div>
 
              <br><h5> 14. Antecedentes Socioeconómicos </h5> <div >
                <?php if (strlen($AntecedentesSocioeconomicos)>0): ?>
                <div>
                  <hr>
                <!--<p>AntecedentesSocioeconomicos:</p>-->
                <p>  <?php echo $AntecedentesSocioeconomicos?></p>
                </div>
                <?php endif ?>
              </div>
 
              <br><h5> 15. Evaluación </h5> 
              <div>
                <?php if (strlen($evaluacion)>0): ?>
                <div>
                  <hr>
                <!--<p>evaluacion:</p>-->
                <p>  <?php echo $evaluacion?></p>
                </div>
                <?php endif ?>
              </div>
 
              <br><h5> 16. Tratamiento </h5> 
              <div>
                <?php if (strlen($tratamiento)>0): ?>
                <div>
                  <hr>
                <!--<p>tratamiento:</p>-->
                <p>  <?php echo $tratamiento?></p>
                </div>
                <?php endif ?>
              </div>

              <br><h5> 17. Evolución </h5> 
              <div>
                <?php if (strlen( $fechaevolucion)>0): ?>
                <div>
                  <hr>
                <p>Fecha de evolución:</p>
                <p>  <?php echo  $fechaevolucion?></p>
                </div>
                <?php endif ?>
              </div>

              <div>
              <?php if (strlen($evolucion)>0): ?>
                <div>
                  <hr>
                  <p>Evolución:</p>
                  <p> <br> <?php echo $evolucion?></p>
                </div>
                <?php endif ?>
              </div>
               
   
   
 

  


                        <div class="col-sm-12">
                          <div class="row">
                            <div class="col-sm-6" align="center">
                                <?php
                                echo  $firmaPaciente;

                                ?>
                            </div>
                            <div class="col-sm-6" align="center">
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

</html>
 -->
