<?php
date_default_timezone_set('America/Bogota');
 include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

           
            
            $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

            $historiaClinica1 = $_GET['historiaClinica1'];

            $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinica1 where ID = $historiaClinica1");
            $nrowl=mysqli_num_rows($queryList);
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
              $comoTomarlo     =$rowMotorizado['comoTomarlo'];
              $incapacidades   =$rowMotorizado['incapacidades'];
              

            }

              $queryList=mysqli_query($conn3,"SELECT * FROM  examenesaRealizar where historia_id = $historiaClinica1");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $laboratorio      =$rowMotorizado['laboratorio'];
              $ecografia      =$rowMotorizado['ecografia'];
              $otros           =$rowMotorizado['otros'];

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
                 $Logo = '<img src="'.$Base.'/logos/'.$LogoF.'" height="100" width="100%">';
              }
              

              if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="'.$Base.'/FirmasReg/'.$firma.'" height="150" width="150">'; 
              }


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
              $genero=$rowMotorizado['genero'];

              $correo_cliente=$rowMotorizado['correo_cliente'];
              $whatsapp=$rowMotorizado['whatsapp'];


            }

      $para =  $correo_cliente;      

            $mensaje .='  
                  <table class="tg" style="undefined;table-layout: fixed; width: 100%">
  

 <tr>
    <th class="titulo" colspan="4" rowspan="4" ><div align="center">'.$header.'</div>
   <h9 align="center"> <div align="center">'.$empresaNombre.'<br>Tel:'.$telefono.'<br>Nit:'.$nit.'</div> </h9></th>

    
  </tr>

  <tr>
    </tr>
  <tr>
    </tr>
  <tr>
    </tr> 
</table>
<br>
Nombre del paciente: '.$nombre_cliente.'</td>
<br>
Documento: '.$CODI_CLIENTE.'</td>
   
</div>
</div>





        <div class="row">
        <h4 align="center"> INCAPACIDAD</h4>
                <div class="col-md-12">
          </div> 
        </div>
   
      
      <div class="row">
        <div class="col-xs-12">
       <hr>
<p>
  Fecha : 
    '.$Fecha.'
 
  </p>
<p>
<b>INCAPACIDAD</b> : 
    '.$incapacidades.'
 </p>
  

        </div>
       
      </div>
     

<div class="col-xs-6" align="center">
  
  </div>

<div class="col-xs-6" align="center">
  '.$ciudadPaisF.'
  </div>


  <div class="col-xs-6" align="center">
  
  </div>

  <div class="col-xs-6" align="center">
  
'.$firmaImg.'<br>

  '.$nombreF.'<br>
  '.$especialidad.'<br>
  <b>* Documento firmado digitalmente *</b>
  </div>

                ';

                // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                // Cabeceras adicionales
                $cabeceras .= 'To: sievensoft <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'From:  Resultado de consulta  con el Dr(a). '.$NOMBRE_USUARIO.'  <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
                $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";
                // Enviarlo
                mail($para, $titulo, $mensaje, $cabeceras); 


$mensajeW = 'Remisión de Incapacidad con el Dr. JOSE LUIS RAMIREZ OSORIO.
Hola buen dia '.$nombrecliente.', Como resultado de su consulta con  el Doctor JOSE LUIS RAMIREZ OSORIO, se le ha formulado la siguiente incapacidad:
-
INCAPACIDAD:
'.$incapacidades;




$accion = 0;
$historiaClinica1 = 0;
$usuario_id = 0;
 
$historiaClinica1 = 0;
$usuario_id = 0;

Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $historiaClinica1, $usuario_id, $whatsapp, $accion);

  echo "<script language='Javascript'> window.location='patientes.php';</script>"; 

              ?> 