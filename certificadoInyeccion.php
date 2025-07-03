<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
            
            $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

            $id_vacunacion = decrypt($_GET['iD']);

            $queryList=mysqli_query($conn3,"SELECT * FROM  vacunas_aplicadas where id = $id_vacunacion");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
              $Fecha=$rowMotorizado['Fecha'];
              $Hora=$rowMotorizado['Hora'];
              $Id_Lista_Vacuna=$rowMotorizado['Id_Lista_Vacuna'];
              $via=$rowMotorizado['via'];
              $Fecha_Administracion=$rowMotorizado['Fecha_Administracion'];
              $Fecha_Proxima_Aplicacion=$rowMotorizado['Fecha_Proxima_Aplicacion'];
              $Sitio_Anatomico=$rowMotorizado['Sitio_Anatomico'];
            
              $Observacion=$rowMotorizado['Observacion'];
              $Dosis_Aplicada=$rowMotorizado['Dosis_Aplicada'];
              $Medico_Indica=$rowMotorizado['Medico_Indica'];
              $Persona_Aplica=$rowMotorizado['Persona_Aplica'];
              $Efecto_Adverso=$rowMotorizado['Efecto_Adverso'];
              $Id_Cliente=$rowMotorizado['Id_Cliente'];
              $Id_Usuario=$rowMotorizado['Id_Usuario'];
              $Archivos=$rowMotorizado['Archivos'];
              $lote=$rowMotorizado['Lote'];

              $id_vacuna=funcionMaster($Id_Lista_Vacuna,'id','Id_Vacuna','listado_vacunas');

              $Archivos = explode("@", $Archivos);




            $querylote=mysqli_query($conn3,"SELECT * FROM  lotes where id_vacuna =$id_vacuna and descripcion='$lote'");
            $nrowl=mysqli_num_rows($querylote);
            while($rowMotorizado=mysqli_fetch_array($querylote))
            {
              $fechaV_V            =$rowMotorizado['fechaV']; 

            }   











            } 

            $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $Id_Cliente");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
              $edad               =$rowMotorizado['edad_cliente'];
              $fechaNacimiento               =$rowMotorizado['fechaNacimiento'];
              $telefonoC                =$rowMotorizado['celular_cliente'];
              $genero                  =$rowMotorizado['genero'];
              $whatsappC                  =$rowMotorizado['whatsapp'];
              $email                 =$rowMotorizado['correo_cliente'];

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

$queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $Id_Usuario");
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
                $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
              }
              

              if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="'.$Base.'FirmasReg/'.$firma.'" height="100" width="150">'; 
              }





// Nuevos campos 


            }
 

            $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $Id_Usuario");
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

    $nacimiento = new DateTime($fechaNacimiento);
    $Fecha_vacuna = new DateTime($Fecha_Administracion);
    $annos = $Fecha_vacuna->diff($nacimiento);

 

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





         <div class="col-xs-3" align="center">
         
        
         <?php
          $direccion = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
          echo '<img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl='.$direccion.'&choe=UTF-8" title="Link to Google.com" /><br><br>';

          ?>
        
         
          
        </div>
        
      </div> 

      <div class="col-md-12">

      
  </div>
    <div class="col-md-12">

      <table  class="table table-bordered" style="font-size:95%;">
        <tbody>
          
            <td colspan="2" align="center"> <b><u> Certificado de Vacunación</b></u> </td>
          </tr>
          <tr>
            <td>• <b> Fecha de Inyección:</b> </td>
            <td><?php echo $Fecha;?></td>
          </tr>
          <tr>
            <td>• <b>Edad del paciente al momento de la administración: </b></td>
            <td> <?php echo $annos->y; ?>Años, <?php echo $annos->m; ?>Meses, <?php echo $annos->d; ?>Días </td>
          </tr>
          <tr>
            <td>• <b> Inyección:</b></td>
            <td><?php echo funcionMaster($id_vacuna,'id','Nombre','vacunas');?></td>
          </tr>
          <tr>
            <td>• <b> Nombre comercial:</b></td>
            <td><?php echo funcionMaster($id_vacuna,'id','Nombre_Comercial','vacunas');?></td>
          </tr>
             <td>• <b>Vía de administración:</b></td>
            <td><?php echo $via;?></td>
          </tr>
           <tr>
            <td>• <b> Lugar anatómico de administración:</b></td>
            <td><?php echo $Sitio_Anatomico;?></td>
          </tr>

           <tr>
            <td>• <b> Fecha de expiración del lote:</b></td>
            <td><?php echo $fechaV_V;?></td>
          </tr>
        
          <tr>
            <td>• <b> Lote:</b></td>
            <td><?php echo $lote;?></td>
          </tr>
          <tr>
            <td>• <b> Dosis:</b></td>
            <td><?php echo $Dosis_Aplicada;?></td>
          </tr>
          
         
            <td>• <b> Próxima dosis: </b></td>
            <td><?php echo $Fecha_Proxima_Aplicacion?></td>
          </tr>
           <tr>
            <td>• <b> Nombre de persona que la administra:</b></td>
            <td><?=$Persona_Aplica?></td>
          </tr>
          <!-- <tr>
            <td>• <b> ID:</b></td>
            <td><?php echo funcionMaster($Persona_Aplica,'ID','rut','usuariosInterconsulta');?></td>
          </tr> -->
          
        
        </tbody>
      </table>

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


