<?php
date_default_timezone_set('America/Bogota');

include("funciones/conn3.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

            //$con=conectar();
            
            //$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

            $historiaClinica1 = $_GET['historiaClinica1'];

             $historiaClinicaEcografia = decrypt($_GET['ecografia']);
/*
            $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinica1 where ID = $historiaClinica1");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $cliente_id      =$rowMotorizado['cliente_id'];
              $usuario_id      =$rowMotorizado['usuario_id'];
            
              

            }
este codigo esta mal porque estas consultando ecografia no historiaclinicageneral 
luego de esto consultas tabla config que se trae info de logo nombre .... y todas las variables que se colocaron en el header 
*/





                $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinica_ecografias where ID = $historiaClinicaEcografia");
                
                $nrowl=mysqli_num_rows($queryList);
                while($rowMotorizado=mysqli_fetch_array($queryList))
                {

                  $cliente_id      =$rowMotorizado['cliente_id'];
                  $usuario_id      =$rowMotorizado['usuario_id'];
                  $Fecha           =$rowMotorizado['Fecha'];

                  $Hora            =$rowMotorizado['Hora'];
                  $eco             =$rowMotorizado['ecografiaDetalle'];
                  $diagnostico     =$rowMotorizado['diagnostico'];
                  $nombreeco       =$rowMotorizado['nombreEcografia'];
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

                if (strlen($LogoF) > 0) {
                  $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
              }
          
          
              if (strlen($firma) > 0) {
                  $firmaImg = "<img src='{$Base}/FirmasReg/{$firma}' height='150' width='300'>";
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

              $nit                =$rowMotorizado['nit'];

            }

    $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $cliente_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
              $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
              $direccion_cliente = $rowMotorizado['direccion_cliente'];
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

<!-- <!DOCTYPE html>
<html>

<head> -->
    <!--<link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">-->
<!-- </head>

<body>  -->
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

                <div class="col-md-12">

                  <h2 align="center"><?php echo $nombreeco ?></h2>

                  <br>

                  
                  <?php echo $eco ?>

                      <?php  $img=mysqli_query($conn3,"SELECT * FROM archivos where  cliente_id = '$cliente_id' and historia_id='$historiaClinicaEcografia' and Realizado_Desde = 'historiaClinica_ecografias' and Campo_Input='ImagenesHistoriaEcografias'");  
                        $contador=0;
                        while ($ReImg=mysqli_fetch_assoc($img)) { 
                          $contador++;
                          if($contador==1){
                            echo "<h3>Imágenes Ciclos de Embarazo</h3>";
                          }
                          ?>
                            
                <div class="col-md-3" >
                  <img style="border: 1px solid #3c8dbc;border-radius: 5px; padding-left: 10px;padding-right: 11px;box-shadow: 0px 0px 15px -1px rgb(60, 141, 188);"  width="150" height="130" src="archivos/<?php echo $ReImg['codigo']; ?>" alt="" >
                </div>
           



              <?php }  ?>

                      <table class="table table-bordered">
                        <tr>
                          <th colspan="4">Diagnóstico General</th>
                        </tr>
                        <tr><td><?php echo $diagnostico ?></td></tr>
                      </table>


    
   <?php  $img=mysqli_query($conn3,"SELECT * FROM archivos where  cliente_id = '$cliente_id' and historia_id='$historiaClinicaEcografia' and Realizado_Desde = 'historiaClinica_ecografias' and Campo_Input IS NULL");  
  $contador=0;
                        while ($ReImg=mysqli_fetch_assoc($img)) { 
                          $contador++;
                          if($contador==1){
                            echo "<h3>Archivos</h3>";
                          }
                          ?>
                            
                <div class="col-md-3" >
                  <img style="border: 1px solid #3c8dbc;border-radius: 5px; padding-left: 10px;padding-right: 11px;box-shadow: 0px 0px 15px -1px rgb(60, 141, 188);"  width="150" height="130" src="archivos/<?php echo $ReImg['codigo']; ?>" alt="" >
                </div>
           



              <?php }  ?>

                  



                    <table class="table table-bordered">
                       
                        <tr><td>
 <?php if( $nombreeco =='Ecografia Obstetrica' or $nombreeco =='Ecografia Morfologica' or $nombreeco =='Ecografia Genetica' or $nombreeco =='Ecografia  Primer Trimestre' )
{
 echo
'IMPORTANTE: La precision diagnostica del examen ecografico es de 85%; y depende de factores , como: tiempo de gestacion posicion fetal, obesidad materna, cantidad de liquido anmiotico, tipo de anomalia existente, etc. POR TANTO: Recuerde que la ecografia, por si sola, NO EXCLUYE, que su bebe nazca sin alteraciones o sin retardo mental';
}
else
  {  echo ''; 
}
?>
</td></tr>
                      </table>
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

<!-- 
















                        


        </div> -->
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

