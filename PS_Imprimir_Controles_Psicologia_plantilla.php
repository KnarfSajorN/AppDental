<?php
date_default_timezone_set('America/Bogota');

include("funciones/conn3.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");


            $historiaClinica1 = decrypt($_GET['historiaClinica1']);




                $queryList=mysqli_query($conn3,"SELECT * FROM   historiaClinica_controlesPsicologia where id =  $historiaClinica1");
                
                if ($queryList) {
                    while($rowMotorizado=mysqli_fetch_array($queryList))
                        {

                        $cliente_id      =$rowMotorizado['cliente_id'];
                        $usuario_id      =$rowMotorizado['usuario_id'];
                        $Fecha           =$rowMotorizado['Fecha'];

                        $Hora            =$rowMotorizado['Hora'];
                        $numero          =$rowMotorizado['numero'];
                        $detalle         =$rowMotorizado['Detalle'];
                        $control         =$rowMotorizado['control'];
                        
                            
                        }
                }
                

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

                $LogoF           =$rowMotorizado['logoF'];
                $firma               =$rowMotorizado['firma'];

                if (strlen($LogoF) > 0) 
                {
                  $Logo = '<img src="'.$Base.'logos/'.$LogoF.'" style="height: 3.5cm;width: auto;">'; 
                }
                
  
              
     if (strlen($firma) > 0)  
                {
                  $firmaImg = '<img src="'.$Base.'FirmasReg/'.$firma.'" height="80" width="200">'; 
                }







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
                $telefono           =$rowMotorizado['telefono'];
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
             $edad               =$rowMotorizado['edad_cliente'];
              $fechaNacimiento               =$rowMotorizado['fechaNacimiento'];
           $telefono                =$rowMotorizado['celular_cliente'];
            $seguro                     =$rowMotorizado['seguro'];
              $direccion_cliente          =$rowMotorizado['direccion_cliente'];
              $genero                     =$rowMotorizado['genero'];
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
            

            $cie1=mysqli_query($conn3,"SELECT * FROM historiaClinica9_Quirurgico_Cie10 as hc, cie10 as cie10 WHERE hc.historiaClinica9_id='$historiaClinica1' AND cie10.codigo=hc.codigo AND hc.Tipo_Historia='historiaClinica_controlesPsicologia'");
 
              ?>





<!-- <!DOCTYPE html>
<html>

<head> -->
    <!--<link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
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

<div class="row">
         
 
 <div class="col-xs-12">
         <h4 align="center"><?php echo $control?> </h4>
       </div>
     </div>


    <table width="100%">
          
        <?php 
        $contadorcie10=0;
        while ($ci=mysqli_fetch_assoc($cie1)) { ?>
        <?php
        if($contadorcie10==0){
            echo "<tr>
            
            <td  style='font-weight: bold;'>Diágnostico CIE10</td><td></td>
          </tr>";
        }
        $contadorcie10++;
        ?>
          <tr>
           
            
            <td ><?php echo $ci['descripcion'];?></td>
            <td></td>
          </tr>
        <?php } ?>
    </table><br>
          
               <div class="col-xs-12" align="justify">   
                    <?php echo $detalle?>                              


              </div>
              
              <div class="row" align="center">
               <div class="col-md-6" align="center">
              <?php
            // echo  $firmaImg;

              ?>
              </div>



 <div class="col-md-6" align="center">
  <?php
  echo  $firmaImg;

  ?>
  <br>_______________________________________<br>
  <?php echo $nombreF?><br>
  <?php echo $especialidad?><br>
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

