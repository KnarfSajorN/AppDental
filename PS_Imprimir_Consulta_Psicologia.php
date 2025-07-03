<?php
date_default_timezone_set('America/Bogota');

include("funciones/conn3.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

            $historiaClinica1 = $_GET['historiaClinica1'];


                  $queryList=mysqli_query($conn3,"SELECT * FROM  HistoriaClinica12 where ID = $historiaClinica1");

                  $nrowl=mysqli_num_rows($queryList);

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










           $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $usuario_id");
            $nrowl=mysqli_num_rows($queryList);
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
 

            $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $usuario_id");
            $nrowl=mysqli_num_rows($queryList);
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

    $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $cliente_id");
            $nrowl=mysqli_num_rows($queryList);
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

 
   ?>
<?php
$_GET['validar'] = $CODI_CLIENTE;
$_GET['mensaje'] = "Ingrese su Cédula para Visualizar el Contenido de la Impresión";
include 'preventView.php';
?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">
</head>

<body>

    <div class="page-header row" style="text-align: center">
        <div class="col-5" align="left"><?php echo $Logo ?></div>

        <div class="col-7" style="font-size: 15px;text-align: right;"><?php echo nl2br($header) ?></div>

        <button type="button" onClick="window.print()" style='background: rgb(250,235,215);background: -moz-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: -webkit-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" #faebd7",endColorstr="#3c8db0" ,GradientType=1);'>
            IMPRIMIR!
        </button>
    </div>

    <div class="page-footer">
        <?php echo nl2br($pieF); ?>
    </div>

    <table>

        <thead>
            <tr>
                <td>
                    <!--place holder for the fixed-position header-->
                    <div class="page-header-space"></div>
                </td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <!--*** CONTENT GOES HERE ***-->
                    <div class="page" style="width:100vw; page-break-after:initial; page-break-before: always;" >   
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


        <div class="row">
        <h4 align="center"> Valoración de Psicología </h4>
                <div class="col-md-12">
          </div>
        </div>
   

<div>
<?php if (strlen($Fecha)>0): ?>
              
              <!--<font size="2">entrevista Inicial: </font> --> 
              <font size="2"><b>Fecha de Valoración:</b> <?php echo $Fecha?></font>  
              </div>
              <?php endif ?>

  
  
   <br><h5> 1. Entrevista Inicial 
    
  <div align="justify" >
     <?php if (strlen($entrevistaInicial)>0): ?>
              <div>
              <hr style="margin:0.5% 0;">
              <!--<font size="2">entrevista Inicial: </font> --> 
              <font size="2"> <?php
              
              $valores = explode('|', $entrevistaInicial);
              foreach ($valores as $valor) {
                  echo $valor . "<br>";
              }
              //echo $entrevistaInicial?></font>  
              </div></div>
              <?php endif ?>




 
     <br><h5> 2. Historia Familiar <div align="justify" > <?php if (strlen($historiaFamiliar)>0): ?>
              <div>
                <hr style="margin:0.5% 0;">
               <!--<font size="2">historia Familiar:</font>-->
               <font size="2">  <?php 
               
               $valores = explode('|', $historiaFamiliar);
                foreach ($valores as $valor) {
                    echo $valor . "<br>";
                }

               //echo $historiaFamiliar
               ?></font>
              </div></div>
              <?php endif ?>      

  

              
     <br><h5> 3. Historia Personal <div align="justify" > <?php if (strlen($historiaPersonal)>0): ?>
              <div>
             <hr style="margin:0.5% 0;">
             <!-- <font size="2">historiaPersonal--> 
               <font size="2">  <?php 
               
               $valores = explode('|', $historiaPersonal);
                foreach ($valores as $valor) {
                    echo $valor . "<br>";
                }

              //echo $historiaPersonal?></font>
              </div></div>
              <?php endif ?>

  

              
              <br><h5> 4. Personalidad <div align="justify" > <?php if (strlen($Personalidad)>0): ?>
              <div>

                <hr style="margin:0.5% 0;">

             <!-- <font size="2">Personalidad:</font>-->
               <font size="2">  <?php 
               
               $valores = explode('|', $Personalidad);
                foreach ($valores as $valor) {
                    echo $valor . "<br>";
                }

               //echo $Personalidad?></font>
              </div></div>
              <?php endif ?>

  

               <br><h5> 5. Examen General <div align="justify" >
              <?php if (strlen($examenMental)>0): ?>
              <div>
                <hr style="margin:0.5% 0;">
              <!-- <font size="2">examenMental:</font>-->
               <font size="2">  <?php 
               
               $valores = explode('|', $examenMental);
                foreach ($valores as $valor) {
                    echo $valor . "<br>";
                }

               //echo $examenMental?></font>
              </div></div>
              <?php endif ?>

  
 
                 <br><h5> 6. Educación <div align="justify" ><?php if (strlen($educacion)>0): ?>
              <div>
                <hr style="margin:0.5% 0;">
               <!--<font size="2">educacion:</font>-->
               <font size="2">  <?php echo $educacion?></font>
              </div></div>
              <?php endif ?>

                 <br><h5> 7. Trabajo <div align="justify" ><?php if (strlen($Trabajo)>0): ?>
              <div>
                <hr style="margin:0.5% 0;">
               <!--<font size="2">Trabajo:</font>-->
               <font size="2">  <?php echo $Trabajo?></font>
              </div></div>
              <?php endif ?>

  
                 <br><h5> 8. Cambio de Residencia <div align="justify" ><?php if (strlen($cambioResidencia)>0): ?>
              <div>
                <hr style="margin:0.5% 0;">
               <!--<font size="2">cambio Residencia:</font>-->
               <font size="2">  <?php echo $cambioResidencia?></font>
              </div></div>
              <?php endif ?>

  
                 <br><h5> 9. Accidentes y Enfermedades  <div align="justify" ><?php if (strlen($accidentesEnfermedades)>0): ?>
              <div>
                <hr style="margin:0.5% 0;">
               <!--<font size="2">accidentesEnfermedades:</font>-->
               <font size="2">  <?php echo $accidentesEnfermedades?></font>
              </div></div>
              <?php endif ?>



  
                <br><h5> 10. Vida Sexual <div align="justify" ><?php if (strlen($vidaSexual)>0): ?>
              <div>
                <hr style="margin:0.5% 0;">
               <!--<font size="2">vidaSexual:</font>-->
               <font size="2">  <?php echo $vidaSexual?></font>
              </div></div>
              <?php endif ?>

 
                <br><h5> 11. Hábitos e Intereses <div align="justify" ><?php if (strlen($habitosIntereses)>0): ?>
              <div>
                <hr style="margin:0.5% 0;">
              <!-- <font size="2">habitosIntereses:</font>-->
               <font size="2">  <?php echo $habitosIntereses?></font>
              </div></div>
              <?php endif ?>

 
                <br><h5> 12. Actitud hacia la Familia <div align="justify" ><?php if (strlen($actitudConFamilia)>0): ?>
              <div>
                <hr style="margin:0.5% 0;">
              <!-- <font size="2">actitudConFamilia:</font>-->
               <font size="2">  <?php echo $actitudConFamilia?></font>
              </div></div>
              <?php endif ?>

 
                <br><h5> 13. Sueños <div align="justify" ><?php if (strlen($suenos)>0): ?>
              <div>
                <hr style="margin:0.5% 0;">
               <!--<font size="2">sueños:</font>-->
               <font size="2">  <?php echo $suenos?></font>
              </div></div>
              <?php endif ?>

 
                 <br><h5> 14. Antecedentes Socioeconómicos <div align="justify" ><?php if (strlen($AntecedentesSocioeconomicos)>0): ?>
              <div>
                <hr style="margin:0.5% 0;">
               <!--<font size="2">AntecedentesSocioeconomicos:</font>-->
               <font size="2">  <?php echo $AntecedentesSocioeconomicos?></font>
              </div></div>
              <?php endif ?>

 
                 <br><h5> 15. Evaluación <div align="justify" ><?php if (strlen($evaluacion)>0): ?>
              <div>
                <hr style="margin:0.5% 0;">
               <!--<font size="2">evaluacion:</font>-->
               <font size="2">  <?php echo $evaluacion?></font>
              </div></div>
              <?php endif ?>

 
                 <br><h5> 16. Tratamiento <div align="justify" ><?php if (strlen($tratamiento)>0): ?>
              <div>
                <hr style="margin:0.5% 0;">
               <!--<font size="2">tratamiento:</font>-->
               <font size="2">  <?php echo $tratamiento?></font>
              </div></div>
              <?php endif ?>

               <br><h5> 17. Evolución <div align="justify" >
 <?php if (strlen( $fechaevolucion)>0): ?>
              <div>
                <hr style="margin:0.5% 0;">
               <font size="2">Fecha de evolución:</font>
               <font size="2">  <?php echo  $fechaevolucion?></font>
              </div>
              <?php endif ?>

 
                <?php if (strlen($evolucion)>0): ?>
              <div>
                <hr style="margin:0.5% 0;">
               <font size="2">Evolución:</font>
               <font size="2"> <br> <?php echo $evolucion?></font>
              </div></div>
              <?php endif ?>   </h4>

               
   
   
 

  


<hr style="margin:0.5% 0;">
    
        <!-- /.col -->
     
      <!-- /.row -->

<!--<div class="col-xs-6" align="center">
  <?php echo $Fecha ?> 
  </div> -->

<div class="col-xs-6" align="center">
  <?php echo $ciudadPaisF?>
  </div>


<div class="col-xs-6" align="center">
  <?php
 // echo  $firmaImg;

  ?>
  </div>



 <div class="col-xs-6" align="center">
  <?php
  echo   $firmaImg;

  ?>
  <br>_______________________________________<br>
  <?php echo $nombreF?><br>
  <?php echo $especialidad?><br>
  <b>* Documento firmado digitalmente *</b>
  </div>

                    </div> 
                    <!-- cierre del page-->
                </td>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td>
                    <!--place holder for the fixed-position footer-->
                    <div class="page-footer-space"></div>
                </td>
            </tr>
        </tfoot>

    </table>

</body>

</html>

<script type="text/javascript">
    printHTML();

    function printHTML() {
        if (window.print) {
            window.print();
        }
    }
</script>





