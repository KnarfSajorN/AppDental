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
      $receta            = $_POST['receta'];





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

 $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $ID");

 echo "SELECT * FROM  config where ID_Usuario = $ID";

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

                $LogoF           =$rowMotorizado['logoF'];
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
            



        //entrevista inicial
        $motivoConsulta        = reem($_POST['motivoConsulta']);
           $antecedentesPersonales  = $_POST['antecedentesP'];

            $TITUL1= '<table class="table table-bordered" width="100%"><tr th aling="center"> <th><B> <H4 aling="center">A. MOTIVO DE CONSULTA</H4></B></th></tr>';

             $V1= '<tr><td><h6>'.$motivoConsulta.'</h6></td></tr></table>';




            $TITUL2= '<table class="table table-bordered" width="100%"><tr th aling="center"> <th><B> <H4 aling="center">3. ANTECEDENTES PERSONALES</H4></B></th></tr>';
             $V2= '<tr><td><h6>'.$antecedentesPersonales.'</h6></td></tr></table>';


    
             
/////////////Antecedentes Familiares

        $ant6                = $_POST['ant6'];
        $ant7                 = $_POST['ant7'];
        $ant8                 = $_POST['ant8'];
        $ant999                 = $_POST['ant999'];
        $ant10                 = $_POST['ant10'];
        $ant11                 = $_POST['ant11'];
        $ant12                 = $_POST['ant12'];
        $ant13                 = $_POST['ant13'];
        $ant14                 = $_POST['ant14'];
        $ant15                 = $_POST['ant15'];

        $antecedentesFamiliares                 = $_POST['antecedentesF'];

          $TITUL3= '<table class="table table-bordered" width="100%"><tr th aling="center"> <th><B> <H4 aling="center">4. ANTECEDENTES FAMILIARES</H4></B></th></tr></table>';
             $V3= '<table table-bordered" width="100%"><tr><td><h6>1.CARDIOPATIA'.$ant6.'</h6></td>';
             $V4= '<td><h6>2.DIABETES'.$ant7.'</h6></td>';
             $V5= '<td><h6>3. ENF. C. VASCULAR'.$ant8.'</h6></td>';
             $V6= '<td><h6>4. HIPERTENSIÓN'.$ant999.'</h6></td>';
             $V7= '<td><h6>5. CÁNCER'.$ant10.'</h6></td></tr>';
             $V8= '<tr><td><h6>6. TUBERCULOSIS'.$ant11.'</h6></td>';
             $V9= '<td><h6>7. ENF. MENTAL'.$ant12.'</h6></td>';
             $V10= '<td><h6>8. ENF. INFECCIOSA'.$ant13.'</h6></td>';
             $V11= '<td><h6>9. MALFORMACIÓN'.$ant14.'</h6></td>';
             $V12= '<td><h6>10. OTRO'.$ant15.'</h6></td></tr></table>';
             $V13=  '<table><tr><td><h6>'.$antecedentesFamiliares.'</h6></td></tr></table>';  

/////////////////////////////////////

            $enfermedadActual         = reem($_POST['enfermedadActual']);

             $TITU4= '<table class="table table-bordered" width="100%"><tr th aling="center"> <th><B> <H4 aling="center">2. ENFERMEDAD O PROBLEMA ACTUAL</H4></B></th></tr>';
             $V14= '<tr><td><h6>'.$enfermedadActual.'</h6></td><tr></table>';

            

       
 $consulta=$TITUL1.$V1;
  $enfermedad = $TITU4.$V14;

 $antecd= $TITUL2.$V2.$TITUL3.$V3.$V4.$V5.$V6.$V7.$V8.$V9.$V10.$V11.$V12.$V13; 
////////Revisión actual de Orgános y Sistemas
        $antc6                 = $_POST['antc6'];
        $antc7                 = $_POST['antc7'];
        $antc8                 = $_POST['antc8'];
        $antc9                 = $_POST['antc9'];
        $antc10                 = $_POST['antc10'];
        $antc11                 = $_POST['antc11'];
        $antc12                 = $_POST['antc12'];
        $antc13                 = $_POST['antc13'];
        $antc14                 = $_POST['antc14'];
        $antc15                 = $_POST['antc15'];

$organos  = $_POST['organos'];


 $TITUL5= '<table class="table table-bordered" width="100%"><tr th aling="center"> <th><B> <H4 aling="center">5. REVISION ACTUAL DE ORGANOS Y SISTEMAS</H4></B></th></tr></table>';
             $Va3= '<table table-bordered" width="100%"><tr><td><h6>1. ÓRGANOS DE LOS SENTIDOS'.$antc6.'</h6></td>';
             $Va4= '<td><h6>2. RESPIRATORIO'.$antc7.'</h6></td>';
             $Va5= '<td><h6>3. CARDIO-VASCULAR'.$antc8.'</h6></td>';
             $Va6= '<td><h6>4. DIGESTIVO'.$antc9.'</h6></td>';
             $Va7= '<td><h6>5. GENITAL'.$antc10.'</h6></td></tr>';
             $Va8= '<tr><td><h6>6. URINARIO'.$antc11.'</h6></td>';
             $Va9= '<td><h6>7. MÚSCULO ESQUELÉTICO'.$antc12.'</h6></td>';
             $Va10= '<td><h6>8. ENDOCRINO'.$antc13.'</h6></td>';
             $Va11= '<td><h6>9. HEMO LINFÁTICO'.$antc14.'</h6></td>';
             $Va12= '<td><h6>10. NERVIOSO'.$antc15.'</h6></td></tr></table>';
             $Va13=  '<table><tr><td><h6>'.$organos.'</h6></td></tr></table>'; 



 $organost=$TITUL5.$Va3.$Va4.$Va5.$Va6.$Va7.$Va8.$Va9.$Va10.$Va11.$Va12.$Va13;              

/////////Constantes Vitales y Antropometría
 $temperatura          = $_POST['temperatura'];
  $tart1                = $_POST['tart1'];
   $Pulso   = $_POST['Pulso'];
     $medicion  = $_POST['medicion'];
       $frt  = $_POST['frt'];
       $peso                 = $_POST['peso'];
        $altura               = $_POST['altura'];
        $imc                  = $_POST['imc'];
        $ComposicionCorporal  = $_POST['ComposicionCorporal'];

      $TITU6= '<table class="table table-bordered" width="100%"><tr th aling="center"> <th><B> <H4 aling="center">5. SIGNOS VITALES Y ANTROPOMETRIA</H4></B></th></tr></table>';
             $Va14= '<table table-bordered" width="100%"><tr><td><h6>FECHA MEDICIÓN:'.$medicion.'</h6></td>'; 
             $Va15= '<td><h6>TEMPERATURA C:'.$temperatura.'</h6></td>'; 
             $Va16= '<td><h6>PRESIÓN ARTERIAL:'.$tart1.'</h6></td>';
             $Va17= '<td><h6>PULSO:'.$Pulso.'</h6></td></tr>';

             $Va18= '<tr><td><h6>FREC. RESPIRA.:'.$frt.'</h6></td>'; 
             $Va19= '<td><h6>PESO:'.$peso.'</h6></td>'; 
             $Va20= '<td><h6>TALLA:'.$altura.'</h6></td>';
             $Va21= '<td><h6>IMC:'.$imc.'</h6></td></tr></table>';


$antro=$TITU6.$Va14.$Va15.$Va16.$Va17.$Va18.$Va19.$Va20.$Va21;  

/////////////// examen regional


         $antec6                 = $_POST['antecd6'];
        $antec7                 = $_POST['antecd7'];
        $antec8                 = $_POST['antecd8'];
        $antec9                 = $_POST['antecd9'];
        $antec10                 = $_POST['antecd10'];
        $antec11                 = $_POST['antecd11'];
       $regional  = $_POST['regional'];

 $TITU7= '<table class="table table-bordered" width="100%"><tr th aling="center"> <th><B> <H4 aling="center">6. EXAMEN FISICO REGIONAL</H4></B></th></tr></table>'; 
 $Va211= '<table table-bordered" width="100%"><tr><td><h6>'.$regional.'</h6></td>'; 
             //$Va22= '<td><h6>2. CUELLO:'.$antec7.'</h6></td>'; 
             //$Va23= '<td><h6>3. TORAX:'.$antec8.'</h6></td>'; 
             //$Va24= '<td><h6>4. ABDOMEN:'.$antec9.'</h6></td>'; 
             // $Va25= '<td><h6>5. PELVÍS:'.$antec10.'</h6></td>'; 
             //$Va26= '<td><h6>6. EXTREMIDADES:'.$antec11.'</h6></td></tr></table>';  
              //$Va27=  '<table><tr><td><h6>'.$regional.'</h6></td></tr></table>'; 


$exaregional=$TITU7.$Va211.$Va22.$Va23.$Va24.$Va25.$Va26.$Va27;    


/////////////////diagnostico

$diagnostico1 = $_POST['diagnostico1'];
$cie10D1  = $_POST['cie10D1'];
$pre1  = $_POST['pre1'];
$diagnostico2 = $_POST['diagnostico2'];
$cie10D2  = $_POST['cie10D2'];
$pre2  = $_POST['pre2'];
$diagnostico3 = $_POST['diagnostico3'];
$cie10D3  = $_POST['cie10D3'];
$pre3  = $_POST['pre3'];

$dia = $_POST['dia'];


$analisiss=  $_POST['analisiss'];

$TITU8= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"><tr th aling="center"> <th><B> <H4 aling="center">7. ANÁLISIS</H4></B></th></tr> <tr><td><h6>'.$analisiss.'</h6></td></tr></table>';

/*
$Va28= '<table table-bordered" width="100%"><tr><td><h6>DIAGNÓSTICO</h6></td>'; 
             $Va281= '<td><h6>CIE </h6></td>'; 
             $Va282= '<td><h6>PRE/DEF </h6></td></tr>'; 
           
$Va29= '<tr><td><h6>'.$diagnostico1.'</h6></td>'; 
             $Va30= '<td><h6>'.$cie10D1.'</h6></td>'; 
             $Va31= '<td><h6>'.$pre1.'</h6></td></tr>'; 
             $Va32= '<tr><td><h6>'.$diagnostico2.'</h6></td>'; 
             $Va33= '<td><h6>'.$cie10D2.'</h6></td>'; 
             $Va34= '<td><h6>'.$pre2.'</h6></td></tr>';
             $Va35= '<tr><td><h6>'.$diagnostico3.'</h6></td>'; 
             $Va36= '<td><h6>'.$cie10D3.'</h6></td>'; 
             $Va37= '<td><h6>'.$pre3.'</h6></td></tr></table>';

*/


//////////////////Planes y tratamien

             $planes  = $_POST['otros'];


$TITU9= '<table class="table table-bordered" width="100%"><tr th aling="center"> <th><B> <H4 aling="center">8. PLANES DE TRATAMIENTO</H4></B></th></tr>';
$Va38= '<tr><td><h6>'.$planes.'</h6></td></tr></table>';


$diagno=$TITU8.$TITU9.$Va38;

     







////////////////////////////////////////LABORATORIOS//////////////////////////////////////////////////




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



           
       /*     $VV1= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"><tr><td><h6>INSTITUCION DEL SISTEMA<br>'.$INSTITUCION.'</h6></td>';
             $VV2= '<td><h6>UNIDAD OPERATIVA<br>'.$Logo.'</h6></td>';
             $VV3= '<td><h6>ORDEN<br>'.$ORDEN.'</h6></td>';
             $VV4= '<td><h6>PARROQUIA<br>'.$PARROQUIA.'</h6></td><td><h6>CANTÓN<br>'.$CANTON.'</h6></td> <td><h6>PROVINCIA<br>'.$PROVINCIA.'</h6></td>';
             $VV5= '<td><h6>HISTORIA CLINICA<BR>'.$HISTORIA.'</h6></td></tr></table>'; */

             $VV6= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"><tr><td><h6>NOMBRE<br>'.$nombre_cliente.'</h6></td>';
             //$VV7= '<td><h6>APELLIDO MATERNO<BR>'.$apellido_mat.'</h6></td>';
             //$VV8= '<td><h6>PRIMER NOMBRE<br>'.$nombre_cliente.'</h6></td>';
             $VV9= '<td><h6>CELULAR<br>'.$celular_cliente.'</h6></td>';
             $VV10= '<td><h6>EDAD<BR>'.$EDAD.'</h6></td>';
             $VV11= '<td><h6>CÈDULA DE IDENTIDAD<BR>'.$CODI_CLIENTE.'</h6></td></tr></table>';

    /*         $VV12= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"><tr><td><h6>SERVICIO QUE SOLICITA<br>'.$SERVICIO.'</h6></td>';
             $VV13= '<td><h6>SALA<br>'.$SALA.'</h6></td>';
             $VV14= '<td><h6>CAMA<br>'.$CAMA.'</h6></td>';
             $VV15= '<td><h6>PRIORIDAD<br>'.$PRIORIDAD.'</h6></td>';
             $VV16= '<td><h6>FECHA DE TOMA<BR>'.$FTOMA.'</h6></td></tr></table>'; */


$datos=$VV1.$VV2.$VV3.$VV4.$VV5.$VV6.$VV7.$VV8.$VV9.$VV10.$VV11.$VV12.$VV13.$VV14.$VV15.$VV16;


/////////////HEMATOLOGIA
        $ante1                 = $_POST['ante1'];

        if ($ante1 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','BIOMETRIA HEMATICA');");
     

        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','BIOMETRIA HEMATICA');");

  }  


   
        $ante2                 = $_POST['ante2'];
         if ($ante2 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','SEDIMENTACION');");

      $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

        mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','SEDIMENTACION');");

  }  

        $ante3                 = $_POST['ante3'];
         if ($ante3 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','GRUPO SANGUÍNEO Y FACTOR RH');");
         

       $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   


  mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','GRUPO SANGUÍNEO Y FACTOR RH');");   } 



        $ante4                 = $_POST['ante4'];
        if ($ante4 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','RETICULOCITOS');");
      
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','RETICULOCITOS');");

  } 


        $ante5                 = $_POST['ante5'];

if ($ante5 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HEMATOZOARIO');");
        

       $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }  

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','HEMATOZOARIO');");

 } 


        $ante6                 = $_POST['ante6'];
        if ($ante6 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HCG-B CUANTITATIVA');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','HCG-B CUANTITATIVA');");


  }


        $ante7                = $_POST['ante7'];
         if ($ante7 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','TIEMPO DE PROTROMBINA (TP)');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','TIEMPO DE PROTROMBINA (TP)');");

}

        $ante8                 = $_POST['ante8'];

        if ($ante8 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','T. TROMBOPLASTINA PARCIAL (TTP)');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','T. TROMBOPLASTINA PARCIAL (TTP)');");

  }


        $ante9                = $_POST['ante9'];

         if ($ante9 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','COOMBS DIRECTO');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   
 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','COOMBS DIRECTO');");
  } 



        $ante10                 = $_POST['ante10'];
 if ($ante10<> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','COOMBS INDIRECTO');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   
mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','COOMBS INDIRECTO');");

 } 


        $ante11                 = $_POST['ante11'];

        if ($ante11<> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HEMOGLOBINA GLICOSILADA (HBA1C)');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   



        mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','HEMOGLOBINA GLICOSILADA (HBA1C)');");
      
 }

 ////////////////UROANALISIS

        $ante12                 = $_POST['ante12'];

        if ($ante12 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ELEMENTAL Y MICROSCOPICO');");
          $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   



 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','ELEMENTAL Y MICROSCOPICO');");
      
}









        $ante13                 = $_POST['ante13'];

         if ($ante13 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PROTEINURIA 24 HORAS');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   


 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','PROTEINURIA 24 HORAS');");

  }
      


        $ante14                 = $_POST['ante14'];

if ($ante14 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','MICROALBUMINURIA');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','MICROALBUMINURIA');");
      
 }

        $ante15                 = $_POST['ante15'];

        if ($ante15 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','UROCULTIVO');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','UROCULTIVO');");

   }

////////////////MARCADORES

        $ante16                 = $_POST['ante16'];
 if ($ante16 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','AFP');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','AFP');");
 }

        $ante17                 = $_POST['ante17'];
if ($ante17 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CEA');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   


 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','CEA');");

  }

        $ante18                 = $_POST['ante18'];
if ($ante18 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CA 19-9');");
      $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','CA 19-9');");

   } 

        $ante19                 = $_POST['ante19'];

        if ($ante19 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CA 125');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','CA 125');");

  } 


 ////////////////COPOROLOGICO
        $ante20                = $_POST['ante20'];
 if ($ante20 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','COPROPARASITORIO SIMPLE');");
       $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','COPROPARASITORIO SIMPLE');");

   } 


        $ante21                = $_POST['ante21'];

if ($ante21 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','SERIADO X 3');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','SERIADO X 3');");

  }



        $ante22                = $_POST['ante22'];
if ($ante22 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','SANGRE OCULTA');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','SANGRE OCULTA');");

  }


        $ante23                 = $_POST['ante23'];
        if ($ante23 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','POLIMORFONUCLEARES');");
      $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','POLIMORFONUCLEARES');");

   }  


        $ante24                 = $_POST['ante24'];

         if ($ante24 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ERRADICACION DE H. PYLORI');");
       $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','ERRADICACION DE H. PYLORI');");

  } 


 ////////////////QUIMICA SANGUINEA
        $ante25                 = $_POST['ante25'];

         if ($ante25 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','GLUCOSA EN AYUNAS');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','GLUCOSA EN AYUNAS');");
 } 



        $ante26                  = $_POST['ante26'];

if ($ante26 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','GLUCOSA POST PRANDIAL 2 HORAS');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','GLUCOSA POST PRANDIAL 2 HORAS');");

 } 


        $ante27                 = $_POST['ante27'];

if ($ante27 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','BUN (NITROGENO UREICO)');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','BUN (NITROGENO UREICO)');");
  }

        $ante28                 = $_POST['ante28'];
        if ($ante28 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CREATININA');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','CREATININA');");

 }


        $ante29                 = $_POST['ante29'];
        if ($ante29 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','BILIRUBINA TOTAL');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','BILIRUBINA TOTAL');");

  } 


        $ante30                 = $_POST['ante30'];

         if ($ante30 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','BILIRUBINA DIRECTA');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','BILIRUBINA DIRECTA');");

 }


        $ante31                = $_POST['ante31'];

   if ($ante31 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ACIDO URICO');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','ACIDO URICO');");
        
         } 


        $ante32                = $_POST['ante32'];

if ($ante32 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PROTEINA TOTAL');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   


 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','PROTEINA TOTAL');");

  } 

        $ante33                 = $_POST['ante33'];

if ($ante33 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ALBUMINA');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora', 'ALBUMINA');");
 } 


        $ante34                = $_POST['ante34'];

if ($ante34 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FERRITINA');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora', 'FERRITINA');");
 }

        $ante35                 = $_POST['ante35'];

if ($ante35 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','NA - K - CL');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora', 'NA - K - CL');");
 }


        $ante36                 = $_POST['ante36'];

        if ($ante36 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CA IONICO');");
       $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora', 'CA IONICO');");

  } 



        $ante37                 = $_POST['ante37'];
         if ($ante37 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','TRANSAMINASA PIRUVICA');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   



mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora', 'TRANSAMINASA PIRUVICA');");
 }


        $ante38                 = $_POST['ante38'];

         if ($ante38 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','TRANSAMINASA OXALACETICA (AST)');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora', 'TRANSAMINASA OXALACETICA (AST)');");
  }


        $ante39                 = $_POST['ante39'];
 if ($ante39 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FOSFATASA ALCALINA');");
       $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora', 'FOSFATASA ALCALINA');");

  } 



        $ante40                 = $_POST['ante40'];
         if ($ante40 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','GAMA GLUTIL TRANSPEPTIDASA (GGT)');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora', 'GAMA GLUTIL TRANSPEPTIDASA (GGT)');");
 }


        $ante41                 = $_POST['ante41'];

          if ($ante41 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','COLESTEROL TOTAL');");
       $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora', 'COLESTEROL TOTAL');");

  } 


        $ante42                = $_POST['ante42'];

         if ($ante42 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','COLESTEROL HDL');");
       $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','COLESTEROL HDL');");

  } 


        $ante43                = $_POST['ante43'];
         if ($ante43 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','COLESTEROL LDL');");
       $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   


mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','COLESTEROL LDL');"); }




        $ante44                = $_POST['ante44'];

         if ($ante44 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','TRIGLICERIDOS');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   


mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','TRIGLICERIDOS');"); }




        $ante45                = $_POST['ante45'];

        if ($ante45 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','AMILASA');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','AMILASA');"); }




        $ante46                = $_POST['ante46'];

        if ($ante46 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','LIPASA');");
    $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   



mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','LIPASA');"); }





        $ante47                 = $_POST['ante47'];
if ($ante47 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','LACTATO DESHIDROGENSA (LDH)');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','LACTATO DESHIDROGENSA (LDH)');"); }



        $ante48                 = $_POST['ante48'];

if ($ante48 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CITOMEGALOVIRUS IGM');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','CITOMEGALOVIRUS IGM');"); }

///////////////////////////serologia

        $ante49                 = $_POST['ante49'];

if ($ante49 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','VDRL');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','VDRL');"); }



        $ante50                 = $_POST['ante50'];

    if ($ante50 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HIV');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

   mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','HIV');"); }

        

        $ante51                 = $_POST['ante51'];
 if ($ante51 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PCR SEMICUANTITATIVO');");
          $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

    mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','PCR SEMICUANTITATIVO');"); }


        $ante52                = $_POST['ante52'];
        if ($ante52 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PSA TOTAL / LIBRE');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   


 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','PSA TOTAL / LIBRE');"); }




        $ante53                = $_POST['ante53'];

        
        if ($ante53 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTINUCLEARES (ANA)');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

  mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','ANTINUCLEARES (ANA)');"); }




        $ante54                = $_POST['ante54'];
 if ($ante54 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','AC. ANTIPEROXIDASA<BR> (ANTI-TPO)');");
          $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   
 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','AC. ANTIPEROXIDASA<BR> (ANTI-TPO)');"); }
 


        $ante55                = $_POST['ante55'];
 if ($ante55 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI CCP');");
          $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   
 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','ANTI CCP');"); }
 
 

        $ante56                = $_POST['ante56'];
 if ($ante56 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','GRAM');");
          $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   
 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','GRAM');"); }
 




        $ante57                 = $_POST['ante57'];

       if ($ante57 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ZIEHL');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   
 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','ZIEHL');"); }





          
        $ante58                 = $_POST['ante58'];
 if ($ante58 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','KOH');");
          $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   
 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','KOH');"); }



        $ante59                 = $_POST['ante59'];

 if ($ante59 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FRESCO');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','FRESCO');"); }



        $ante60                 = $_POST['ante60'];
 if ($ante60 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CULTIVO - ANTIBIOGRAMA');");
          $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   
 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','CULTIVO - ANTIBIOGRAMA');"); }


        $ante61                 = $_POST['ante61'];

 if ($ante61 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','TSH');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   
 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','TSH');"); }


        $ante62                = $_POST['ante62'];

 if ($ante62 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FT4');");
          $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   
 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','FT4');"); }



        $ante63                = $_POST['ante63'];

if ($ante63 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CORONAVIRUS RAPIDA');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','CORONAVIRUS RAPIDA');"); }

        $ante64                = $_POST['ante64'];
if ($ante64 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ACIDO URICO BIOMETRIA');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','ACIDO URICO BIOMETRIA');"); }

        $ante65                = $_POST['ante65'];
if ($ante65 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PRUEBA PCR');");
          $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   



 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','PRUEBA PCR');"); }


        $LATEX                = $_POST['LATEX'];
if ($LATEX  <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','LATEX');");
          $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','LATEX');"); }



        $FACTOR               = $_POST['FACTOR'];

if ($FACTOR  <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FACTOR REUMATODEO');");
          $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   
 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','FACTOR REUMATODEO');"); }



        $SEDI               = $_POST['SEDI'];

if ($SEDI <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','SEDIMENTACIÓN');");
          $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   
 mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','SEDIMENTACIÓN');"); }

        $PCR              = $_POST['PCR'];


if ($PCR  <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PCR');");
          $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

     mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','PCR');"); }


        $CCP              = $_POST['CCP'];
if ($CCP  <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI CCP');");
         $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

  mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','ANTI CCP');"); }


        $ANA            = $_POST['ANA'];
if ($ANA  <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANA');");
        $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

  mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','ANA');"); }

        $ANTI            = $_POST['ANTI'];

if ($ANTI   <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI DNA');");
          $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDlaboratorios from laboratorios where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDlaboratorios=$rowhc['IDlaboratorios'];
              }   

   mssql_query("INSERT INTO laboratorios(ID, cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$IDlaboratorios', '$clienteId', '$ID', '$fechar', '$hora','ANTI DNA');"); }


       

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




<td><h6>ELEMENTAL Y MICROSCOPICO:'.$ante12.'<br>PROTEINURIA 24 HORAS:'.$ante13.'<br>MICROALBUMINURIA:'.$ante14.'<br>UROCULTIVO:'.$ante15.'<br> 
<div align="left"  width="100%"  style="background: #A4A4A4"> <h5><b> 3 COPROLOGICO</b> </h5><br> </div>

COPROPARASITORIO SIMPLE:'.$ante20.'<br> 
SERIADO X 3:'.$ante21.'<br> 
SANGRE OCULTA:'.$ante22.'<br> 
POLIMORFONUCLEARES:'.$ante23.'<br> 
ERRADICACION DE H. PYLORI:'.$ante24.'<br> 
</h6></td> 


<td><h6>GLUCOSA EN AYUNAS:'.$ante25.'<br>GLUCOSA POST PRANDIAL 2 HORAS:'.$ante26.'<br>BUN (NITROGENO UREICO):'.$ante27.'<br>CREATININA:'.$ante28.'<br>BILIRUBINA TOTAL:'.$ante29.'<br>BILIRUBINA DIRECTA:'.$ante30.'<br>ACIDO URICO:'.$ante31.'<br>PROTEINA TOTAL:'.$ante32.'<br>ALBUMINA:'.$ante33.'<br>FERRITINA:'.$ante34.'<br> NA - K - CL:'.$ante35.'<br>CA IONICO:'.$ante36.'</h6></td> <td><h6>TRANSAMINASA PIRUVICA:'.$ante37.'<br>TRANSAMINASA OXALACETICA (AST):'.$ante38.'<br>FOSFATASA ALCALINA:'.$ante39.'<br>GAMA GLUTIL TRANSPEPTIDASA (GGT):'.$ante40.'<br>COLESTEROL TOTAL:'.$ante41.'<br>COLESTEROL HDL:'.$ante42.'<br>COLESTEROL LDL:'.$ante43.'<br>TRIGLICERIDOS:'.$ante44.'<br>AMILASA:'.$ante45.'<br>LIPASA:'.$ante46.'<br>LACTATO DESHIDROGENSA (LDH):'.$ante47.'<br>CITOMEGALOVIRUS IGM :'.$ante48.' </h6></td></tr></table>';



$V19= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"  style="background: #A4A4A4"><tr><td width="36%"><h5><b>5 SEROLOGIA</b> </h5></td> <td width="40%"><h5><b>6 BACTERIOLOGIA</h5></b></td> <td><b><h5><b>7 OTROS</h5></b></td> </tr></table>';
$V20= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> <tr><td width="16%" ><h6>VDRL:'.$ante49.'<br>HIV:'.$ante50.'<br>PCR SEMICUANTITATIVO:'.$ante51.'<br>PSA TOTAL / LIBRE:'.$ante52.'<br>LATEX:'.$LATEX.'<br>FACTOR REUMATODEO:'.$FACTOR.'<br>  SEDIMENTACIÓN:'.$SEDI.'<br> PCR:'.$PCR.'  
</h6></td>

<td width="20" ><h6>ANTICUERPOS<BR> ANTINUCLEARES (ANA):'.$ante53.'<br>AC. ANTIPEROXIDASA<BR> (ANTI-TPO):'.$ante54.'<br>HAV IGM:'.$ante55.'<br>ANTI CCP:'.$CCP.'<br>ANA:'.$ANA.'<br>ANTI DNA:'.$ANTI.'<br>  </h6></td>
<td width="20%"><h6>GRAM:'.$ante56.'<br>ZIEHL:'.$ante57.'<br>KOH:'.$ante58.'<br></h6></td>
<td width="20%" ><h6>FRESCO:'.$ante59.'<br>CULTIVO - ANTIBIOGRAMA:'.$ante60.'<br></h6></td>
<td width="24%" ><h6>TSH:'.$ante61.'<br>FT4:'.$ante62.'<br>CORONAVIRUS RAPIDA:'.$ante63.'<br>PRUEBA PCR:'.$ante65.'<br>PCR, VSG, RA TES<br> ACIDO URICO BIOMETRIA:'.$ante64.'</h6></td>

</tr></table> ';

$examen=$V17.$V18.$V19.$V20;




/////////////CORONAVIRUS///////////////////////////////


 $sintomascorona = $_POST['sintomascorona'];

          
             


        $antCO6                 = $_POST['antCO6'];
        $antCO7                 = $_POST['antCO7'];
        $antCO8                 = $_POST['antCO8'];
        $antCO9                 = $_POST['antCO9'];
        $antCO10                 = $_POST['antCO10'];
        $antCO11                 = $_POST['antCO11'];
        $antCO12                 = $_POST['antCO12'];
        $antCO13                 = $_POST['antCO13'];
        $antCO14                 = $_POST['antCO14'];
        $antCO15                 = $_POST['antCO15'];


          $TITU1= '<table class="table table-bordered" width="100%"><tr th aling="center"> <th> <H4 aling="center"> <b>TEST DE CORONAVIRUS VÍA TELEMÉDICINA</b></H4></th></tr></TABLE>';
             $VT1= '<table  width="100%"><tr><td><h5>¿Qué síntomas tienes?<br>'.$sintomascorona.'</h5></td></tr></table>';
          
             $VT2= '<table width="100%"><tr><td><h5>¿Tienes sensación de falta de aire de inicio brusco?'.$antCO6.'</h5></td></tr>';
             $VT3= '<tr><td><h5>¿Tienes fiebre? (+37.7oC)?'.$antCO7.'</h5></td></tr>';
             $VT4= '<tr><td><h5>¿Tienes tos seca y persistente?'.$antCO8.'</h5></td></tr>';
             $VT5= '<td><h5>¿Has tenido contacto estrecho con algún paciente positivo confirmado? (+37.7oC)?'.$antCO9.'</h5></td></tr>';

             $VT6= '<tr><tr><td><h5>¿Tienes mucosidad en la nariz?'.$antCO10.'</h5></td></tr>';
             $VT7= '<td><h5>¿Tienes dolor muscular?'.$antCO11.'</h5></td></tr>';

             $VT8= '<tr><tr><td><h5>¿Tienes sintomatología gastrointestinal?'.$antCO12.'</h5></td></tr>';
             $VT9= '<tr><td><h5>¿Llevas más de 20 días con estos síntomas?'.$antCO13.'</h5></td></tr></table>';

             $test=$TITU1.$VT1.$VT2.$VT3.$VT4.$VT5.$VT6.$VT7.$VT8.$VT9;



    /////////////IMAGENOLOGIA Estudio solicitado
        $anteCt1                 = $_POST['anteCt1'];
        $anteCt2                 = $_POST['anteCt2'];
        $anteCt3                 = $_POST['anteCt3'];
        $anteCt4                 = $_POST['anteCt4'];
        $anteCt5                 = $_POST['anteCt5'];
        $anteCt6                 = $_POST['anteCt6'];

         if ($anteCt1 <> '') {$anteC1='RX CONVENCIONAL';}
         if ($anteCt2 <> '') {$anteC2='TOMOGRAFIA';}
         if ($anteCt3 <> '') {$anteC3='RESONANCIA';}
         if ($anteCt4 <> '') {$anteC4='ECOGRAFÍA';}
         if ($anteCt5 <> '') {$anteC5='PROCEDIMIENTO';}
         if ($anteCt6 <> '') {$anteC6='OTROS';}

 $estudiosolicitado= $anteC1.' '.$anteC2.' '.$anteC3.' '.$anteC4.' '.$anteC5.' '.$anteC6;


        $estudio                 = $_POST['estudio'];
        $anteCt7                = $_POST['anteCt7'];
        $anteCt8                 = $_POST['anteCt8'];
        $anteCt9                = $_POST['anteCt9'];
        $anteCt10                 = $_POST['anteCt10'];

         if ($anteCt7 <> '') {$anteC7='PUEDE MOVILIZARSE';}
         if ($anteCt8 <> '') {$anteC8='PUEDE RETIRARSE VENDAS, APOSITOS O YESOS';}
         if ($anteCt9 <> '') {$anteC9='EL MEDICO ESTARA PRESENTE EN EL EXAMEN';}
         if ($anteCt10 <> '') {$anteC10='TOMA DE RADIOLOGIA EN LA CAMA';}


        $anteCt11 =$anteC7.' '.$anteC8.' '.$anteC9.' '.$anteC10;


        $motivosolicitud        = $_POST['motivosolicitud'];
        $resumenclinico    = $_POST['resumenclinico'];

   /*     $diagnostico1     = $_POST['diagnostico1'];
        $cie10D1     = $_POST['cie10D1'];
        $pre1     = $_POST['pre1'];

        $diagnostico2     = $_POST['diagnostico2'];
        $cie10D2     = $_POST['cie10D2'];
        $pre2     = $_POST['pre2'];
 
         $diagnostico3     = $_POST['diagnostico3'];
        $cie10D3     = $_POST['cie10D3'];
        $pre3     = $_POST['pre3']; */



 ////////////////UROANALISIS

 $T1= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> <tr><td><h6>'.$diagnostico1.'</h6></td><td><h6>'. $cie10D1.'</h6></td><td><h6>'.$pre1.'</h6></td></tr></h6>
  <tr><td><h6>'.$diagnostico2.'</h6></td><td><h6>'.$cie10D2.'</h6></td><td><h6>'.$pre2.'</h6></td></tr></h6>
  <tr><td><h6>'.$diagnostico3.'</h6></td><td><h6>'.$cie10D3.'</h6></td><td><h6>'.$pre3.'</h6></td></tr></h6>
 </table>';





      $I1= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"  style="background: #A4A4A4"><tr><td><h5><b>1. ESTUDIO SOLICITADO</b> </h5></td> </tr></table>';
$I2= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> <tr><td><h6>RX CONVENCIONAL'.$anteCt1.'</h6></td><td><h6>TOMOGRAFIA'. $anteCt2.'</h6></td><td><h6>RESONANCIA'.$anteCt3.'</h6></td><td><h6>ECOGRAFÍA'.$anteCt4.'</h6></td><td><h6>PROCEDIMIENTO'.$anteCt5.'</h6></td><td><h6>OTROS'.$anteCt6.'</h6></td></tr></h6></table>';
 $I3= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> <tr><td><h5> DESCRIPCION </h5><br><h6>'.$estudio.' </h6></td> </tr></table>';
$I4= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> <tr><td><h6>PUEDE MOVILIZARSE'.$anteCt7.'</h6></td><td><h6>PUEDE RETIRARSE VENDAS, APOSITOS O YESOS'.$anteCt8.'</h6></td><td><h6>EL MEDICO ESTARA PRESENTE EN EL EXAMEN'.$anteCt9.'</h6></td><td><h6>TOMA DE RADIOLOGIA EN LA CAMA'. $anteCt10.'</h6></td></tr></h6></table>';

      $I5= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"><tr><td  style="background: #A4A4A4"><h5><b>2 MOTIVO DE LA SOLICITUD</b> </h5></td> </tr><tr><td><h6>'.$motivosolicitud.'</h6></td></tr></table>';

$I6= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"><tr><td width="50%"><h5   style="background: #A4A4A4"><b>3. RESUMEN CLINICO</b></h5> <br> <h6>'.$resumenclinico.'</h6></td></tr></table>'; 


$imagen=$I1.$I2.$I3.$I4.$I5.$I6;





////////////////EPIDEMIOLOGIA///////////////////////////////////////////


        $epi1= $_POST['epi1'];
        $epi2= $_POST['epi2'];
        $epi3= $_POST['epi3'];
        $epi4= $_POST['epi4'];
        $epi5= $_POST['epi5'];
        $epi6= $_POST['epi6'];
        $epi7= $_POST['epi7'];
        $epi8= $_POST['epi8'];
        $epi9= $_POST['epi9'];
        $epi10= $_POST['epi10'];
        $epi11= $_POST['epi11'];
        $epi12= $_POST['epi12'];
        $epi13= $_POST['epi13'];
        $epi14= $_POST['epi14'];
        $epi15= $_POST['epi15'];
        $epi16= $_POST['epi16'];
        $epi17= $_POST['epi17'];
        $epi18= $_POST['epi18'];
        $epi19= $_POST['epi19'];
        $epi20= $_POST['epi20'];
        $epi21= $_POST['epi21'];
        $epi22= $_POST['epi22'];
        $epi23= $_POST['epi23'];
        $epi24= $_POST['epi24'];
        $epi25= $_POST['epi25'];
        $epi26 = $_POST['epi26'];
        $epi27= $_POST['epi27'];
        $epi28= $_POST['epi28'];
        $epi29= $_POST['epi29'];
        $epi30= $_POST['epi30'];
        $epi31= $_POST['epi31'];
        $epi32= $_POST['epi32'];
        $epi33= $_POST['epi33'];
        $epi34= $_POST['epi34'];
        $epi35= $_POST['epi35'];
        $epi36= $_POST['epi36'];
        $epi37= $_POST['epi37'];
        $epi38= $_POST['epi38'];
        $epi39= $_POST['epi39'];
        $epi40= $_POST['epi40'];
        $epi41= $_POST['epi41'];
        $epi42= $_POST['epi42'];
        $epi43= $_POST['epi43'];
        $epi44= $_POST['epi44'];
        $epi45= $_POST['epi45'];
        $epi46= $_POST['epi46'];
        $epi47= $_POST['epi47'];
        $epi48= $_POST['epi48'];
        $epi49= $_POST['epi49'];
        $epi50= $_POST['epi50'];
        $epi51= $_POST['epi51'];
        $epi52= $_POST['epi52'];
        $epi53= $_POST['epi53'];
        $epi54= $_POST['epi54'];
        $epi55= $_POST['epi55'];
        $epi56= $_POST['epi56'];
        $epi57= $_POST['epi57'];
        $epi58= $_POST['epi58'];
        $epi59= $_POST['epi59'];
        $epi60= $_POST['epi60'];
        $epi61= $_POST['epi61'];
        $epi62= $_POST['epi62'];
        $epi63= $_POST['epi63'];
        $epi64= $_POST['epi64'];
        $epi65= $_POST['epi65'];
        $epi66 = $_POST['epi66'];
$epi67 = $_POST['epi67'];
$epi68 = $_POST['epi68'];
$epi69= $_POST['epi69'];
$epi70= $_POST['epi70'];
$epi71= $_POST['epi71'];
$epi72= $_POST['epi72'];
$epi73= $_POST['epi73'];
$epi74= $_POST['epi74'];
$epi75= $_POST['epi75'];
$epi76= $_POST['epi76'];
$epi77= $_POST['epi77'];
$epi78= $_POST['epi78'];
$epi79= $_POST['epi79'];
$epi80= $_POST['epi80'];
$epi81= $_POST['epi81'];
$epi82= $_POST['epi82'];
$epi83= $_POST['epi83'];
$epi84= $_POST['epi84'];
$epi85= $_POST['epi85'];
$epi86= $_POST['epi86'];
$epi87= $_POST['epi87'];
$epi88= $_POST['epi88'];
$epi89= $_POST['epi89'];
$epi90= $_POST['epi90'];
$epi91= $_POST['epi91'];
$epi92= $_POST['epi92'];
$epi93= $_POST['epi93'];
$epi94= $_POST['epi94'];
$epi95= $_POST['epi95'];
$epi96= $_POST['epi96'];
$epi97= $_POST['epi97'];
$epi98= $_POST['epi98'];
$epi99= $_POST['epi99'];
$epi100= $_POST['epi100'];
$epi101= $_POST['epi101'];
$epi102= $_POST['epi102'];
$epi103= $_POST['epi103'];
$epi104= $_POST['epi104'];
$epi105= $_POST['epi105'];
$epi106= $_POST['epi106'];
$epi107= $_POST['epi107'];
$epi108= $_POST['epi108'];
$epi109= $_POST['epi109'];
$epi110= $_POST['epi110'];
$epi111= $_POST['epi111'];
$epi112= $_POST['epi112'];
$epi113= $_POST['epi113'];
$epi114= $_POST['epi114'];
$epi115= $_POST['epi115'];
$epi116= $_POST['epi116'];
$epi117= $_POST['epi117'];
$epi118= $_POST['epi118'];
$epi119= $_POST['epi119'];
$epi120= $_POST['epi120'];
$epi121= $_POST['epi121'];
$epi122= $_POST['epi122'];
$epi123= $_POST['epi123'];
$epi124= $_POST['epi124'];
$epi125= $_POST['epi125'];
$epi126= $_POST['epi126'];
$epi127= $_POST['epi127'];
$epi128= $_POST['epi128'];
$epi129= $_POST['epi129'];
$epi130= $_POST['epi130'];
$epi131= $_POST['epi131'];
$epi132= $_POST['epi132'];
$epi133= $_POST['epi133'];
$epi134= $_POST['epi134'];
$epi135= $_POST['epi135'];
$epi136= $_POST['epi136'];
$epi137= $_POST['epi137'];
$epi138= $_POST['epi138'];
$epi139= $_POST['epi139'];
$epi140= $_POST['epi140'];
$epi141= $_POST['epi141'];
$epi142= $_POST['epi142'];
$epi143= $_POST['epi143'];
$epi144= $_POST['epi144'];









 $T1= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> 
  <tr><td><h6>Signos y síntomas:              Fecha de inicio:'.$diagnostico2.'</h6></td><td><h6>'.$cie10D2.'</h6></td><td><h6>'.$pre2.'</h6></td></tr></h6>
  <tr><td><h6>'.$diagnostico3.'</h6></td><td><h6>'.$cie10D3.'</h6></td><td><h6>'.$pre3.'</h6></td></tr></h6>
 </table>';







     

mysqli_query($conn3,"INSERT INTO reporteimagenologia(cliente_id, usuario_id, fecha, hora, estudio, descripcion, especificacion, motivo, resumen) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','$estudiosolicitado', '$estudio', '$anteCt11','$motivosolicitud','$resumenclinico');");


  $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as IDimagen from reporteimagenologia where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $IDimagen=$rowhc['IDimagen'];
              }   


          mssql_query("INSERT INTO reporteimagenologia(ID, cliente_id, usuario_id, fecha, hora, estudio, descripcion, especificacion, motivo, resumen) VALUES  ('$IDimagen', '$clienteId', '$ID', '$fechar', '$hora','$estudiosolicitado', '$estudio', '$anteCt11','$motivosolicitud','$resumenclinico');");







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

 


       mysqli_query($conn3,"INSERT INTO historiaClinicaN(cliente_id, usuario_id, Fecha, Hora,  motivoConsulta, enfermedad, antecedentes, organos, antrop, exaregional, diagnostico,receta, CIE1,CIE2,CIE3) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','$consulta','$enfermedad','$antecd', '$organost', '$antro', '$exaregional',  '$diagno', '$receta','$cie10D1','$cie10D2','$cie10D3');");


//echo "INSERT INTO historiaClinicaN(cliente_id, usuario_id, Fecha, Hora,  motivoConsulta, organos, antrop, exaregional, diagnostico,receta) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$consulta', '$organost', '$antro', '$exaregional',  '$diagno', '$receta');";



  $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica1 from historiaClinicaN where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinica1'];
              }   


  mssql_query("INSERT INTO historiaClinicaN(ID, cliente_id, usuario_id, Fecha, Hora,  motivoConsulta, enfermedad, antecedentes, organos, antrop, exaregional, diagnostico,receta, CIE1,CIE2,CIE3) VALUES  ('$historiaClinica1', '$clienteId', '$ID', '$fechar', '$hora','$consulta','$enfermedad','$antecd', '$organost', '$antro', '$exaregional',  '$diagno', '$receta','$cie10D1','$cie10D2','$cie10D3');");



 $queryListhc=mysqli_query($conn3,"SELECT diagnostico from historiaClinicaN where ID= $historiaClinica1");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $diagnosticoconsulta=$rowhc['diagnostico'];
              }




 mysqli_query($conn3,"INSERT INTO Ordenlaboratorio(cliente_id, usuario_id, Fecha, Hora,  datos, laboratorio) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$datos', '$examen');");


//echo "INSERT INTO Ordenlaboratorio(cliente_id, usuario_id, Fecha, Hora,  datos, laboratorio) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$datos', '$examen');";

$queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica2 from Ordenlaboratorio where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica2=$rowhc['historiaClinica2'];
              }   

 mssql_query("INSERT INTO Ordenlaboratorio(ID,cliente_id, usuario_id, Fecha, Hora,  datos, laboratorio) VALUES  ('$historiaClinica2','$clienteId', '$ID', '$fechar', '$hora',  '$datos', '$examen');");





 mysqli_query($conn3,"INSERT INTO test(cliente_id, usuario_id, Fecha, Hora, test) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',   '$test');");


//echo "INSERT INTO test(cliente_id, usuario_id, Fecha, Hora, test) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',   '$test');";



  $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica3 from test where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica3=$rowhc['historiaClinica3'];
              }   

mssql_query("INSERT INTO test(ID, cliente_id, usuario_id, Fecha, Hora, test) VALUES  ('$historiaClinica3','$clienteId', '$ID', '$fechar', '$hora',   '$test');");





 mysqli_query($conn3,"INSERT INTO imagenologia(cliente_id, usuario_id, Fecha, Hora,  datos, laboratorio) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$datos', '$imagen')");


//echo "INSERT INTO imagenologia(cliente_id, usuario_id, Fecha, Hora,  datos, laboratorio) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$datos', '$imagen');";


       
              $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica1 from imagenologia where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica4=$rowhc['historiaClinica1'];
              }   



 mssql_query("INSERT INTO imagenologia(ID, cliente_id, usuario_id, Fecha, Hora,  datos, laboratorio) VALUES  ('$historiaClinica4','$clienteId', '$ID', '$fechar', '$hora',  '$datos', '$imagen')");







        // *********************************************************    TABLA  historiaClinica1 *********************************************************
        // *********************************************************    TABLA  historiaClinica1 *********************************************************

 
 
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




     $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as cie10 from historiaClinica9_Quirurgico_Cie10  where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $cie10 =$rowhc['cie10 '];
              }   



 mssql_query("INSERT INTO historiaClinica9_Quirurgico_Cie10 (ID, cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo) VALUES ('$cie10','$clienteId', '$ID', '$historiaClinica1','$fechar','$hora','$codigocie10')");  


 //cho "INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo) VALUES ('$clienteId', '$ID', '$historiaClinica1','$fechar','$hora','$codigocie10')";   


   


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

$mensaje = ' Sr(a) *'.$nombre.'* usted ha agendado un cita médica con Dr(a) *'.$doctor.'* el dia *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR ALBUJA CENTROS MEDICOS-MedicalSoft';
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


echo "<script language='Javascript'> window.location='finalizadoHistoria.php?historiaClinica1=$historiaClinica1&historiaClinica2=$historiaClinica2&historiaClinica3=$historiaClinica3&historiaClinica4=$historiaClinica4';</script>"; 

?>