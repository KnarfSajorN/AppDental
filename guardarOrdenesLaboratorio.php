<?php
   //include 'header.php';
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
 //  include 'menu.php'; 



    date_default_timezone_set('America/Bogota');
    include("conexiones/conexion.php");
    $con=conectar();



    $ID                    = $_POST['ID'];

       
        $fechar                = date("Y-m-d");
       
        $hora                  = date("H:i:s");
     $clienteId             = $_POST['clienteId'];


            $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $clienteId");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
              $fechaNacimiento            =$rowMotorizado['fechaNacimiento'];
            
        $nombre_cliente1=$rowMotorizado['nombre_cliente1'];
        $apellido_mat=$rowMotorizado['apell_mat'];
        $apellido_pat=$rowMotorizado['apell_pat'];
        $celular_cliente=$rowMotorizado['celular_cliente'];
        $genero=$rowMotorizado['genero'];
        $tiposSangre      =$rowMotorizado['tiposSangre'];
       
                
            }

         $EDAD = calculaedad($fechaNacimiento);

        //eNCABEZADO
           $INSTITUCION       = reem($_POST['INSTITUCION']);
           $ORDEN  = reem($_POST['ORDEN']);
           $HISTORIA = reem($_POST['HISTORIA']);
           $PARROQUIA      = reem($_POST['PARROQUIA']);
           $CANTON  = reem($_POST['CANTON']);
           $PROVINCIA = reem($_POST['PROVINCIA']);
           $SERVICIO     = reem($_POST['SERVICIO']);
           $SALA  = reem($_POST['SALA']);
           $CAMA = reem($_POST['CAMA']);
           $PRIORIDAD = reem($_POST['PRIORIDAD']);
           $FTOMA  = reem($_POST['FTOMA']);



           
      /*       $V1= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"><tr><td><h6>INSTITUCION DEL SISTEMA<br>'.$INSTITUCION.'</h6></td>';
             $V2= '<td><h6>UNIDAD OPERATIVA'.$logo.'</h6></td>';
             $V3= '<td><h6>ORDEN<br>'.$ORDEN.'</h6></td>';
             $V4= '<td><h6>PARROQUIA<br>'.$PARROQUIA.'</h6></td><td><h6>CANTÓN<br>'.$CANTON.'</h6></td> <td><h6>PROVINCIA<br>'.$PROVINCIA.'</h6></td>';
             $V5= '<td><h6>HISTORIA CLINICA<BR>'.$HISTORIA.'</h6></td></tr></table>'; */

             $V6= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"><tr><td><h6>APELLIDO PATERNO<br>'.$apellido_pat.'</h6></td>';
             $V7= '<td><h6>APELLIDO MATERNO<BR>'.$apellido_mat.'</h6></td>';
             $V8= '<td><h6>PRIMER NOMBRE<br>'.$nombre_cliente.'</h6></td>';
             $V9= '<td><h6>SEGUNDO NOMBRE<br>'.$nombre_cliente1.'</h6></td>';
             $V10= '<td><h6>EDAD<BR>'.$EDAD.'</h6></td>';
             $V11= '<td><h6>CÈDULA DE IDENTIDAD<BR>'.$CODI_CLIENTE.'</h6></td></tr></table>';

          /*     $V12= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"><tr><td><h6>SERVICIO QUE SOLICITA<br>'.$SERVICIO.'</h6></td>';
             $V13= '<td><h6>SALA<br>'.$SALA.'</h6></td>';
             $V14= '<td><h6>CAMA<br>'.$CAMA.'</h6></td>';
             $V15= '<td><h6>PRIORIDAD<br>'.$PRIORIDAD.'</h6></td>';
             $V16= '<td><h6>FECHA DE TOMA<BR>'.$FTOMA.'</h6></td></tr></table>'; */


$datos=$V1.$V2.$V3.$V4.$V5.$V6.$V7.$V8.$V9.$V10.$V11.$V12.$V13.$V14.$V15.$V16;


/////////////HEMATOLOGIA
        $ante1                 = $_POST['ante1'];
        $ante2                 = $_POST['ante2'];
        $ante3                 = $_POST['ante3'];
        $ante4                 = $_POST['ante4'];
        $ante5                 = $_POST['ante5'];
        $ante6                 = $_POST['ante6'];
        $ante7                = $_POST['ante7'];
        $ante8                 = $_POST['ante8'];
        $ante9                = $_POST['ante9'];
        $ante10                 = $_POST['ante10'];
        $ante11                 = $_POST['ante11'];
 ////////////////UROANALISIS

        $ante12                 = $_POST['ante12'];
        $ante13                 = $_POST['ante13'];
        $ante14                 = $_POST['ante14'];
        $ante15                 = $_POST['ante15'];

////////////////MARCADORES

        $ante16                 = $_POST['ante16'];
        $ante17                 = $_POST['ante17'];
        $ante18                 = $_POST['ante18'];
        $ante19                 = $_POST['ante19'];

 ////////////////COPOROLOGICO
        $ante20                = $_POST['ante20'];
        $ante21                = $_POST['ante21'];
        $ante22                = $_POST['ante22'];
        $ante23                 = $_POST['ante23'];
        $ante24                 = $_POST['ante24'];

 ////////////////QUIMICA SANGUINEA
        $ante25                 = $_POST['ante25'];
        $ante26                  = $_POST['ante26'];
        $ante27                 = $_POST['ante27'];
        $ante28                 = $_POST['ante28'];
        $ante29                 = $_POST['ante29'];
        $ante30                 = $_POST['ante30'];
        $ante31                = $_POST['ante31'];
        $ante32                = $_POST['ante32'];
        $ante33                 = $_POST['ante33'];
        $ante34                = $_POST['ante34'];
        $ante35                 = $_POST['ante35'];
        $ante36                 = $_POST['ante36'];
        $ante37                 = $_POST['ante37'];
        $ante38                 = $_POST['ante38'];
        $ante39                 = $_POST['ante39'];
        $ante40                 = $_POST['ante40'];
        $ante41                 = $_POST['ante41'];
        $ante42                = $_POST['ante42'];
        $ante43                = $_POST['ante43'];
        $ante44                = $_POST['ante44'];
        $ante45                = $_POST['ante45'];
        $ante46                = $_POST['ante46'];
        $ante47                 = $_POST['ante47'];
        $ante48                 = $_POST['ante48'];


///////////////////////////

        $ante49                 = $_POST['ante49'];
        $ante50                 = $_POST['ante50'];
        $ante51                 = $_POST['ante51'];
        $ante52                = $_POST['ante52'];
        $ante53                = $_POST['ante53'];
        $ante54                = $_POST['ante54'];
        $ante55                = $_POST['ante55'];
        $ante56                = $_POST['ante56'];
        $ante57                 = $_POST['ante57'];
        $ante58                 = $_POST['ante58'];
        $ante59                 = $_POST['ante59'];
        $ante60                 = $_POST['ante60'];
        $ante61                 = $_POST['ante61'];
        $ante62                = $_POST['ante62'];
        $ante63                = $_POST['ante63'];
        $ante64                = $_POST['ante64'];
        $ante65                = $_POST['ante65'];
       

$V17= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"  style="background: #A4A4A4"><tr><td width="36%"><h5><b>1 HEMATOLOGIA</b> </h5></td> <td width="27%"><h5><b>2 UROANALISIS</h5></b></td> <td><b><h5><b>4 QUIMICA SANGUINEA</b></h5></b></td> </tr></table>';
$V18= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> <tr><td><h6>BIOMETRIA HEMATICA:'.$ante1.'<br>SEDIMENTACION:'.$ante2.'<br>GRUPO SANGUÍNEO Y FACTOR RH:'.$ante3.'<br>RETICULOCITOS:'.$ante4.'<br>HEMATOZOARIO:'.$ante5.'<br>HCG-B CUANTITATIVA:'.$ante6.' 
<div align="left"  width="100%"  style="background: #A4A4A4"> <h5 align="right"><b> 1A MARCADORES </b></h5><br> </div>
AFP:'.$ante16.'<br> 
CEA:'.$ante17.'<br> 


 </h6></td>

  <td><h6>TIEMPO DE PROTROMBINA (TP):'.$ante7.'<br>T. TROMBOPLASTINA PARCIAL (TTP):'.$ante8.'<br>COOMBS DIRECTO:'.$ante9.'<br>COOMBS INDIRECTO:'.$ante10.'<br>HEMOGLOBINA GLICOSILADA (HBA1C):'.$ante11.' <br><br>
<div align="left"  width="100%"  style="background: #A4A4A4"> <h5> <b>TUMORALES</b></h5><br> </div>
CA 19-9:'.$ante18.'<br> 
CA 125:'.$ante19.'<br> 


  </h6></td>




<td><h6>ELEMENTAL Y MICROSCOPICO:'.$ante12.'PROTEINURIA 24 HORAS:'.$ante13.'<br>MICROALBUMINURIA:'.$ante14.'<br>UROCULTIVO:'.$ante15.'<br> 
<div align="left"  width="100%"  style="background: #A4A4A4"> <h5><b> 3 COPROLOGICO</b> </h5><br> </div>

COPROPARASITORIO SIMPLE:'.$ante20.'<br> 
SERIADO X 3:'.$ante21.'<br> 
SANGRE OCULTA:'.$ante22.'<br> 
POLIMORFONUCLEARES:'.$ante23.'<br> 
ERRADICACION DE H. PYLORI:'.$ante24.'<br> 
</h6></td> 


<td><h6>GLUCOSA EN AYUNAS:'.$ante25.'<br>GLUCOSA POST PRANDIAL 2 HORAS:'.$ante26.'<br>BUN (NITROGENO UREICO):'.$ante27.'<br>CREATININA:'.$ante28.'<br>BILIRUBINA TOTAL:'.$ante29.'<br>BILIRUBINA DIRECTA:'.$ante30.'<br>ACIDO URICO:'.$ante31.'<br>PROTEINA TOTAL:'.$ante32.'<br>ALBUMINA:'.$ante33.'<br>FERRITINA:'.$ante34.'<br> NA - K - CL:'.$ante35.'<br>CA IONICO:'.$ante36.'</h6></td> <td><h6>TRANSAMINASA PIRUVICA:'.$ante37.'<br>TRANSAMINASA OXALACETICA (AST):'.$ante38.'<br>FOSFATASA ALCALINA:'.$ante39.'<br>GAMA GLUTIL TRANSPEPTIDASA (GGT):'.$ante40.'<br>COLESTEROL TOTAL:'.$ante41.'<br>COLESTEROL HDL:'.$ante42.'<br>COLESTEROL LDL:'.$ante43.'<br>TRIGLICERIDOS:'.$ante44.'<br>AMILASA:'.$ante45.'<br>LIPASA:'.$ante46.'<br>LACTATO DESHIDROGENSA (LDH):'.$ante47.'<br>CITOMEGALOVIRUS IGM :'.$ante48.' </h6></td></tr></table>';



$V19= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"  style="background: #A4A4A4"><tr><td width="36%"><h5><b>SEROLOGIA</b> </h5></td> <td width="40%"><h5><b>6 BACTERIOLOGIA</h5></b></td> <td><b><h5><b>7 OTROS</h5></b></td> </tr></table>';
$V20= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> <tr><td width="16%" ><h6>VDRL:'.$ante49.'<br>HIV:'.$$ante50.'<br>PCR SEMICUANTITATIVO:'.$ante51.'<br>PSA TOTAL / LIBRE:'.$ante52.'<br> 
</h6></td>

<td width="20" ><h6>ANTICUERPOS<BR> ANTINUCLEARES (ANA):'.$ante53.'<br>AC. ANTIPEROXIDASA<BR> (ANTI-TPO):'.$ante54.'<br>HAV IGM:'.$ante55.'<br></h6></td>
<td width="20%"><h6>GRAM:'.$ante56.'<br>ZIEHL:'.$ante57.'<br>KOH:'.$ante57.'<br></h6></td>
<td width="20%" ><h6>FRESCO:'.$ante59.'<br>CULTIVO - ANTIBIOGRAMA:'.$ante60.'<br></h6></td>
<td width="24%" ><h6>TSH:'.$ante61.'<br>FT4:'.$ante62.'<br>CORONAVIRUS RAPIDA:'.$ante63.'<br>PRUEBA PCR:'.$ante65.'<br>PCR, VSG, RA TES<br> ACIDO URICO BIOMETRIA:'.$ante64.'</h6></td>

</tr></table> ';

$examen=$V17.$V18.$V19.$V20;



        






        $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario=$ID");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $whatsapp = $rowMotorizado['whatsapp'];
        }


        $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $celular_cliente = $rowMotorizado['celular_cliente'];
        }




        $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

 


       mysqli_query($conn3,"INSERT INTO Ordenlaboratorio(cliente_id, usuario_id, Fecha, Hora,  datos, laboratorio) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$datos', '$examen');");


echo "INSERT INTO Ordenlaboratorio(cliente_id, usuario_id, Fecha, Hora,  datos, laboratorio) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$datos', '$examen');";


       
              $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica1 from Ordenlaboratorio where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinica1'];
              }   

 
foreach ($codigo1 as $e) 
    {
/*
 for ($i=1; $i<$ foreach ($numeros as $e) 
    {; $i++) 
 { 
  */      //
     
     $codigocie10 = $e;   
    
        mysqli_query($conn3,"INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo) VALUES ('$clienteId', '$ID', '$historiaClinica1','$fechar','$hora','$codigocie10')");   



    }

 echo "INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo) VALUES ('$clienteId', '$ID', '$historiaClinica1','$fechar','$hora','$codigocie10')";   


   


/*

 for ($i=1; $i<$contador; $i++) 
 { 
        //
        mysqli_query($conn3,"INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo) VALUES ('$clienteId', '$ID', '$historiaClinica1','$Fecha','$Hora','$codigo1[$i]')");   }

 echo "INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo) VALUES ('$clienteId', '$ID', '$historiaClinica1','$Fecha','$Hora','$codigo1[$i]')";   
   */


            // *********************************************************    TABLA  examenFisico *********************************************************
            // *********************************************************    TABLA  examenFisico *********************************************************
        



$mensaje = ' Resultado de la consulta  con el Dr(a) *'.$NOMBRE_USUARIO.'*, *Diagnostico* '.$diagnostico.' *Tratamiento* '.$tratamiento.'. ***Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR ALBUJA CENTROS MEDICOS-MedicalSoft';
Whatsapp_sent($celular_cliente, $mensaje);


 

 
    for ($i=0;$i<count($prestaciones1);$i++) 
        { 
     echo ' | '.$i;     
          $ldp1 = $ID.'pos';
          $codigo1 = $prestaciones1[$i];

                 $queryListhc=mysqli_query($conn3,"SELECT * from  $ldp1  where codigo = $codigo1");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $denominacion=$rowhc['denominacion'];
                $valor=$rowhc['valor'];
              }   


          mysqli_query($conn3,"INSERT INTO historiaClinica1_pos 
            (cliente_id, usuario_id, historiaClinica1_id, Fecha, Hora, codigo) VALUES 
            ('$clienteId', '$ID', '$historiaClinica1', '$fechar', '$hora', '$codigo1');");
    
 echo "<br>FIN DE 1<br>"; 

        } 


         for ($i2=0;$i2<count($prestaciones2);$i2++) 
        { 

echo '<br><br><br><br><br><br>'.$i2;
          
          $ldp2 = $ID.'cups';
          $codigo2 = $prestaciones2[$i];



  $queryList2=mysqli_query($conn3,"SELECT * from  $ldp2  where codigo = $codigo2");
              $nrowl=mysqli_num_rows($queryList2);
              while($row_recordset322=mysqli_fetch_array($queryList2))
              {
              $codigo      = $row_recordset322['codigo'];
              $descripcion      = $row_recordset322['descripcion'];
              }   


          mysqli_query($conn3,"INSERT INTO historiaClinica1_cups  
            (cliente_id, usuario_id, historiaClinica1_id, Fecha, Hora, codigo) VALUES 
            ('$clienteId', '$ID', '$historiaClinica1', '$fechar', '$hora', '$codigo2');");



 /*   
 echo "<br>INSERT INTO historiaClinica1_ldp2 
            (cliente_id, usuario_id, historiaClinica1_id, Fecha, Hora, codigo, pab, denominacion, hpc, hsc, htc, hcc, han) VALUES 
            ('$clienteId', '$ID', '$historiaClinica1', '$fechar', '$hora', '$codigo2', '$pab', '$denominacion', '$hpc', '$hsc', '$htc', '$hcc', '$han');<br>";
            */
        } 
 
 



/*


echo "<h1>  ----->>>>>>> SELECT MAX(ID) as historiaClinica1 from historiaClinica1 where usuario_id= $clienteId  $historiaClinica1 <<<<<<<<<<<<<<<<<<<<<<<<<<<<<< </h1>";
                  $nrowl=mysqli_num_rows($queryList);
                  while($rowMotorizado=mysqli_fetch_array($queryList))
                  {
                    $usuario_id=$rowMotorizado['usuario_id'];
mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
    $queryUsuario = "INSERT INTO historiaClinica1 (cliente_id, usuario_id, Fecha, Hora, motivoConsulta, diagnostico, tratamiento, notas, recipe, incapacidades) VALUES ('$clienteId', '$ID', '$fechar', '$hora', '$motivoConsulta', '$diagnostico', '$tratamiento', '$notas',  '$recipe', '$incapacidades');";
    mysql_query($queryUsuario,$con) or die(mysql_error());
 
*/

                $para ="$email";

                // título
                $título = ' Resultado de la consulta';

                // mensaje
$mensaje = ' 
<html>
<head>
  <title>Resultado de la consulta</title>
    <table width="100%" height="466" border="0">
  <tr>
    <td><table width="100%" height="75" border="0">
      
    </table>
      <table width="100%" height="143" border="0">
        <tr>
          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
            <tr>
              <td width="5%">&nbsp;</td>
              <td width="72%" style="color:#FFF;"><h1><strong>Resultado de la consulta </strong></h1></td>
              <td width="23%">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="100%" height="122" border="0">
<tr>
<td width="10%">&nbsp;</td>
<td width="80%"><p>motivo Consulta</p>
<br />

<h3>  '.$motivoConsulta.'  </h3> 

<br> 

</td>
<br />



<td width="10%">&nbsp;</td>
</tr>

<tr>
<td width="10%">&nbsp;</td>
<td width="80%"><p>diagnostico</p>
<br />

<h3>  '.$diagnostico.'  </h3> 

<br> 

</td>
<br />



<td width="10%">&nbsp;</td>
</tr>

<tr>
<td width="10%">&nbsp;</td>
<td width="80%"><p>tratamiento</p>
<br />

<h3>  '.$tratamiento.'  </h3> 

<br> 

</td>
<br />




<td width="10%">&nbsp;</td>
</tr>

<tr>
<td width="10%">&nbsp;</td>
<td width="80%"><p>Recipe</p>
<br/>

<h3>  '.$recipe.'  </h3> 

<br> 

</td>
<br/>
 


<td width="10%">&nbsp;</td>
</tr>

<tr>
<td width="10%">&nbsp;</td>
<td width="80%"><p>Incapacidad</p>
<br/>

<h3>  '.$incapacidades.'  </h3> 

<br> 

</td>
<br />





<td width="10%">&nbsp;</td>
</tr>
</table>

<p>Atentamente,<br />
'.$NOMBRE_USUARIO.'</p> 

                      <table width="100%" border="0">
                        <tr>
                          <td height="21" bgcolor="#00A74B">&nbsp;</td>
                        </tr>
                      </table>
                      <table width="100%" height="64" border="0">
                        <tr>
                          <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, Contactart a '.$NOMBRE_USUARIO.'<br />
                         </td>
                        </tr>
                    </table></td>
                  </tr>
                </table>
                </head>
                <body>

                </body>
                </html>
                ';

                // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                $cabeceras  = ' MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                // Cabeceras adicionales
                $cabeceras .= 'To: '.$NOMBRE_USUARIO.' <noreply@'.$_SERVER["HTTP_HOST"].'>' . "\r\n";
                $cabeceras .= 'From: Resultado de la consulta <noreply@'.$_SERVER["HTTP_HOST"].'>' . "\r\n";
                $cabeceras .= 'Cc: noreply@'.$_SERVER["HTTP_HOST"].'' . "\r\n";
                $cabeceras .= 'Bcc: noreply@'.$_SERVER["HTTP_HOST"].'' . "\r\n";

                // Enviarlo
                mail($para, $título, $mensaje, $cabeceras);
 

$verficar = date("Y-m-d");
 

if ($Afecha>$verficar) 
{

echo '<br> CALENDARIO  1 1'.$verficar.' <br>';

$mensaje = ' Sr(a) *'.$nombre.'* usted a agendado un cita médica con Dr(a) *'.$doctor.'* el dia *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR ALBUJA CENTROS MEDICOS-MedicalSoft';
Whatsapp_sent($telefono, $mensaje);


$mensaje2 = ' Dr(a) *'.$doctor.'*  se a agendado  una cita con la paciente *'.$nombre.'*,  *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Motivo: *'.$motivoConsulta.'* Atte DR ALBUJA CENTROS MEDICOS MedicalSoft';
Whatsapp_sent($whatsapp, $mensaje2);









     mysqli_query($conn3,"INSERT INTO citas (doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id , tipo) 
                VALUES ('$doctor', '$Afecha', '$Ahora', '$nombre', '$telefono', '$email', '$motivo', '1', '$Afechar', '$ID', '0')");
                 

                $para ="$email";

                // título
                $título = ' Cita Agendada';

                // mensaje
                $mensaje = ' 
                <html>
                <head>
                  <title>Cita Agendada</title>
                    <table width="100%" height="466" border="0">
                  <tr>
                    <td><table width="100%" height="75" border="0">
                      
                    </table>
                      <table width="100%" height="143" border="0">
                        <tr>
                          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
                            <tr>
                              <td width="5%">&nbsp;</td>
                              <td width="72%" style="color:#FFF;"><h1><strong>Cita Agendada</strong></h1></td>
                              <td width="23%">&nbsp;</td>
                            </tr>
                          </table></td>
                        </tr>
                      </table>
                      <table width="100%" height="122" border="0">
<tr>
<td width="10%">&nbsp;</td>
<td width="80%"><p>Cita Agendada por el doctor(a) '.$NOMBRE_USUARIO.'</p>
<br />

<h3>  Se a  agendado un cita para ustes el dia <strong>  '.$Afecha.' </strong> a las  <strong>   '.$Ahora.'  </strong>  , Motivo:  <strong>  '.$motivo.' </strong>   </h3> 

<br> 

</td>
<br />



<td width="10%">&nbsp;</td>
</tr>

</table>

<p>Atentamente,<br />
'.$NOMBRE_USUARIO.'</p> 

                      <table width="100%" border="0">
                        <tr>
                          <td height="21" bgcolor="#00A74B">&nbsp;</td>
                        </tr>
                      </table>
                      <table width="100%" height="64" border="0">
                        <tr>
                          <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, Contactart a '.$NOMBRE_USUARIO.'<br />
                         </td>
                        </tr>
                    </table></td>
                  </tr>
                </table>
                </head>
                <body>

                </body>
                </html>
                ';

                // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                $cabeceras  = ' MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                // Cabeceras adicionales
                $cabeceras .= 'To: '.$NOMBRE_USUARIO.' <noreply@'.$_SERVER["HTTP_HOST"].'>' . "\r\n";
                $cabeceras .= 'From: Resultado de su Cita <noreply@'.$_SERVER["HTTP_HOST"].'>' . "\r\n";
                $cabeceras .= 'Cc: noreply@'.$_SERVER["HTTP_HOST"].'' . "\r\n";
                $cabeceras .= 'Bcc: noreply@'.$_SERVER["HTTP_HOST"].'' . "\r\n";

                // Enviarlo
                mail($para, $título, $mensaje, $cabeceras);

}


echo "<script language='Javascript'> window.location='imprimirOrdenLab.php?historiaClinica1=$historiaClinica1';</script>"; 

?>