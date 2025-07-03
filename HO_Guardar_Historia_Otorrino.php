<?php
   //include 'header.php';
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
 //  include 'menu.php'; 



    date_default_timezone_set('America/Bogota');

  $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


        //Nariz
        $motivoConsulta        = reem($_POST['motivoConsulta']);
        $motivoConsulta_nariz        = reem($_POST['motivoConsulta_nariz']);
        $enfermedadActual         = reem($_POST['enfermedadActual']);
        $tipoConsulta  = $_POST['tipoConsulta'];
        $Consulta_cod  = $_POST['Consulta_cod'];


  $obstruccion = $_POST['obstruccion'];
  foreach ($obstruccion as $e) {$obstruccion_final .= $e.' | ';}

  $obstruccion_intensa = $_POST['obstruccion_intensa'];
  foreach ($obstruccion_intensa as $e) {$obstruccion_intensa_final .= $e.' | ';}

  $estornudos = $_POST['estornudos'];
  foreach ($estornudos as $e) {$estornudos_final .= $e.' | ';}

  $secreccion_nasal = $_POST['secreccion_nasal'];
  foreach ($secreccion_nasal as $e) {$secreccion_nasal_final .= $e.' | ';}


  $prurito = $_POST['prurito'];
  foreach ($prurito as $e) {$prurito_final .= $e.' | ';}

  $epistaxis = $_POST['epistaxis'];
  foreach ($epistaxis as $e) {$epistaxis_final .= $e.' | ';}

  $olfato = $_POST['olfato'];
  foreach ($olfato as $e) {$olfato_final .= $e.' | ';}

  $cefalea = $_POST['cefalea'];
  foreach ($cefalea as $e) {$cefalea_final .= $e.' | ';}


  $sime = $_POST['sime'];

  if ($sime <>'') {$sime1 = 'Simetría Facial: '.sino($sime).'<strong> | </strong>';}

  $simetria=$sime1;


  $piramide_nasal = $_POST['piramide_nasal'];
  foreach ($piramide_nasal as $e) {$piramide_nasal_final .= $e.' | ';}

   $dorso_nasal = $_POST['dorso_nasal'];
  foreach ($dorso_nasal as $e) {$dorso_nasal_final .= $e.' | ';}

   $punta_nasal = $_POST['punta_nasal'];
  foreach ($punta_nasal as $e) {$punta_nasal_final .= $e.' | ';}


  $angulo_naso = $_POST['angulo_naso'];
  foreach ($angulo_naso as $e) {$angulo_naso_final .= $e.' | ';}

  $angulo_fronto = $_POST['angulo_fronto'];
  foreach ($angulo_fronto as $e) {$angulo_fronto_final .= $e.' | ';}

  $columella = $_POST['columella'];
  foreach ($columella as $e) {$columella_final .= $e.' | ';}

  $relacion_columela = reem($_POST['relacion_columela']);


  $puntos_paranasales = $_POST['puntos_paranasales'];
  foreach ($puntos_paranasales as $e) {$puntos_paranasales_final .= $e.' | ';}

  $base_nasal = $_POST['base_nasal'];
  foreach ($base_nasal as $e) {$base_nasal_final .= $e.' | ';} 

  $septum_nasal = $_POST['septum_nasal'];
  foreach ($septum_nasal as $e) {$septum_nasal_final .= $e.' | ';}

  $mucosa_nasal = $_POST['mucosa_nasal'];
  foreach ($mucosa_nasal as $e) {$mucosa_nasal_final .= $e.' | ';}

  $cornetes_nasal = $_POST['cornetes_nasal'];
  foreach ($cornetes_nasal as $e) {$cornetes_nasal_final .= $e.' | ';}      

  $cornete_bulloso = $_POST['cornete_bulloso'];
  foreach ($cornete_bulloso as $e) {$cornete_bulloso_final .= $e.' | ';}

   $Observaciones_nariz        = reem($_POST['Observaciones_nariz']);

























   //Desordenes


   $motivoconsulta_desorden        = reem($_POST['motivoconsulta_desorden']);


        $sueno                 = $_POST['sueno'];
        $respi                 = $_POST['respi'];
        $ronca                 = $_POST['ronca'];
        $mueve                 = $_POST['mueve'];
        

echo '.......fiebretos rinooo.....................'.$rs1.$rs2.$rs3;

        if ($sueno <>'') {$sueno1 = ' Apneas de Sueño: '.sino($sueno).'<strong> | </strong>';}
        if ($respi <>'') {$respi1 = ' Respiración Oral: '.sino($respi).'<strong> | </strong>';}
        if ($ronca <>'') {$ronca1 = ' Ronca en la Noche: '.sino($ronca).'<strong> | </strong>';}
        if ($mueve <>'') {$mueve1 = ' Se Mueve Mucho al Dormir: '.sino($mueve).'<strong> | </strong>';}
        
        $rdesordenes = $sueno1.$respi1.$ronca1.$mueve1;

        $peso                 = $_POST['peso'];
        $altura               = $_POST['altura'];
        $imc                  = $_POST['imc'];

        $posicion                 = $_POST['posicion'];
        $cuello                 = $_POST['cuello'];
        $abdominal                 = $_POST['abdominal'];
        $epwort                 = $_POST['epwort'];
        $stopbang                 = $_POST['stopbang'];
        $interrogatorio                 = $_POST['interrogatorio'];
        $movilidad                 = $_POST['movilidad'];
        $insomio                 = $_POST['insomio'];

        if ($posicion <>'') {$antper1 = 'Posición para Dormir: '.$posicion.'<strong> | </strong>';}
        if ($cuello <>'') {$antper2 = 'C. Cuello: '.$cuello.'<strong> | </strong>';}
        if ($abdominal <>'') {$antper3 = 'C. Abdominal: '.$abdominal.'<strong> | </strong>';}
        if ($epwort <>'') {$antper4 = 'Epworth: '.$epwort.'<strong> | </strong>';}
        if ($stopbang <>'') {$antper5 = 'Stop-Bang: '.$stopbang.'<strong> | </strong>';}
        if ($interrogatorio <>'') {$antper6 = 'Interrogatorio '.$interrogatorio.'<strong> | </strong>';}
        if ($movilidad <>'') {$antper7 = 'Movilidad '.$movilidad.'<strong> | </strong>';}
        if ($insomio <>'') {$antper8 = 'Insomnio '.$insomio.'<br>';}

        $desorden=$antper1.$antper2.$antper3.$antper4.$antper5.$antper6.$antper7.$antper8;

       $antecedentes                 = $_POST['antecedentes'];

       $pang_rotemberg = $_POST['pang_rotemberg'];
  foreach ($pang_rotemberg as $e) {$pang_rotemberg_final .= $e.' | ';}

        //antecendentes Familiares
        $desviacion                 = $_POST['desviacion'];
        $colapso_valvular                 = $_POST['colapso_valvular'];
        $Izq                 = $_POST['Izq'];
        $Der                 = $_POST['Der'];
        $Izqui                 = $_POST['Izqui'];
        $Dere                 = $_POST['Dere'];
        

        if ($desviacion <>'') {$antfam1 = 'Desviación Septal: '.$desviacion.'<strong> | </strong>';}
        if ($colapso_valvular <>'') {$antfam2 = 'Colapso Valvular: '.$colapso_valvular.'<strong> | </strong>';}
        if ($Izq <>'') {$antfam3 = 'Izquierdo: '.$Izq.'<strong> | </strong>';}
        if ($Der <>'') {$antfam4 = 'Derecho: '.$Der.'<strong> | </strong>';}
        if ($Izqui <>'') {$antfam5 = 'Izquierdo: '.$Izqui.'<strong> | </strong>';}
        if ($Dere <>'') {$antfam6 = 'Derecho: '.$Dere.'<br>';}
       
        $Nariz_desorde=$antfam1.$antfam2.$antfam3.$antfam4.$antfam5.$antfam6;

        $friedman                 = $_POST['friedman'];
    
         if ($friedman <>'') {$friedman1 = 'Friedman Tongue Position (F.T.P.): '.$friedman.'  ';}

         $Friedman=$friedman1;


        $malampati                 = $_POST['malampati_paladar'];
    
         if ($malampati <>'') {$malampati1 = 'Mallampati Modificado: '.$malampati.'  ';}

         $Paladar=$malampati1;

         $hiper                 = $_POST['hiper'];
    
         if ($hiper <>'') {$hiper1 = 'Hipertrofia Grado: '.$hiper.'  ';}

         $Hpertro=$hiper1;

         $apneas                 = $_POST['apneas'];
        
        
        if ($apneas <>'') {$apneas1 = 'Apneas Vividas:'.sino($apneas).'';}

        $Apneas_Vividas=$apneas1;





    


        $lengua = $_POST['lengua'];
  foreach ($lengua as $e) {$lengua_final .= $e.' | ';}

  $paladar_oseo = $_POST['paladar_oseo'];
  foreach ($paladar_oseo as $e) {$paladar_oseo_final .= $e.' | ';}

   $palador_blando = $_POST['palador_blando'];
  foreach ($palador_blando as $e) {$palador_blando_final .= $e.' | ';}

   $uvula = $_POST['uvula'];
  foreach ($uvula as $e) {$uvula_final .= $e.' | ';}




        $base                 = $_POST['base'];
        $largo                 = $_POST['largo'];
        $distancia                 = $_POST['distancia'];
        $distancia_punto                 = $_POST['distancia_punto'];
        $palato_faringeo                 = $_POST['palato_faringeo'];
        $gap_inter                 = $_POST['gap_inter'];
        

        if ($base <>'') {$base1 = 'Base: '.$base.'<strong> | </strong>';}
        if ($largo <>'') {$largo1 = 'Largo: '.$largo.'<strong> | </strong>';}
        if ($distancia <>'') {$distancia1 = 'Distancia Intermolar: '.$distancia.'<strong> | </strong>';}
        if ($distancia_punto <>'') {$distancia_punto1 = 'Distancia Punto: '.$distancia_punto.'<strong> | </strong>';}
        if ($palato_faringeo <>'') {$palato_faringeo1 = 'Palato-Faríngeo (PASS): '.$palato_faringeo.'<strong> | </strong>';}
        if ($gap_inter <>'') {$gap_inter1 = 'Gap Interpalto Faríngeo: '.$gap_inter.'<br>';}
       
        $base_desorde=$base1.$largo1.$distancia1.$distancia_punto1.$palato_faringeo1.$gap_inter1;

$perfil_cara = $_POST['perfil_cara'];
  foreach ($perfil_cara as $e) {$perfil_cara_final .= $e.' | ';}

  $clasificacion = $_POST['clasificacion'];
  foreach ($clasificacion as $e) {$clasificacion_final .= $e.' | ';}

  $articulacion_temporo = $_POST['articulacion_temporo'];
  foreach ($articulacion_temporo as $e) {$articulacion_temporo_final .= $e.' | ';}

  $apertura_bucal = $_POST['apertura_bucal'];
  foreach ($apertura_bucal as $e) {$apertura_bucal_temporo_final .= $e.' | ';}


  $nasoendoscopia                 = $_POST['nasoendoscopia'];
    
         if ($nasoendoscopia <>'') {$nasoendoscopia1 = 'Nasoendoscopia: '.$nasoendoscopia.'<br>';}

         $Nasoendo=$nasoendoscopia1;

$lugar_obstrccion = $_POST['lugar_obstrccion'];
  foreach ($lugar_obstrccion as $e) {$lugar_obstrccion_final .= $e.' | ';}


        $tipo_cierre                 = $_POST['tipo_cierre'];
        $tipo_cierre_por                 = $_POST['tipo_cierre_por'];
        $rinofaringe                 = $_POST['rinofaringe'];
        $rinofaringe_por                 = $_POST['rinofaringe_por'];
        $orofaringe                 = $_POST['orofaringe'];
        $orofaringe_por                 = $_POST['orofaringe_por'];
        $base_lengua                 = $_POST['base_lengua'];
        $base_lengua_por                 = $_POST['base_lengua_por'];
        $epiglotis_por                 = $_POST['epiglotis_por'];
        

        if ($tipo_cierre <>'') {$b1 = 'Tipo de Cierre al Roncar: '.$tipo_cierre.'<strong> | </strong>';}
        if ($tipo_cierre_por <>'') {$b2 = 'Tipo Cierre % '.$tipo_cierre_por.'<strong> | </strong>';}
        if ($rinofaringe <>'') {$b3 = 'Rinofaringe: '.$rinofaringe.'<strong> | </strong>';}
        if ($rinofaringe_por <>'') {$b4 = '%: '.$rinofaringe_por.'<strong> | </strong>';}
        if ($orofaringe <>'') {$b5 = 'Orofaringe: '.$orofaringe.'<strong> | </strong>';}
        if ($orofaringe_por <>'') {$b6 = '%: '.$orofaringe_por.'<strong> | </strong>';}
        if ($base_lengua <>'') {$b7 = 'Base de Lengua: '.$base_lengua.'<strong> | </strong>';}
        if ($base_lengua_por <>'') {$b8= '% '.$base_lengua_por.'<strong> | </strong>';}
        if ($epiglotis_por <>'') {$b9 = 'Epiglotis % '.$epiglotis_por.'<br>';}
       
        $tipo_desorde=$b1.$b2.$b3.$b4.$b5.$b6.$b7.$b8.$b9;


        $protru                 = $_POST['protru'];
        $protru_mani                 = $_POST['protru_mani'];

        
        if ($protru <>'') {$protru1 = ' Protrusión Lingual: '.sino($protru).'<strong> | </strong>';}
        if ($protru_mani <>'') {$protru_mani1 = ' Protrusión Mandibular: '.sino($protru_mani).'<strong> | </strong>';}

        $Maniobra=$protru1.$protru_mani1;

        $amigdalas_linguales = $_POST['amigdalas_linguales'];
  foreach ($amigdalas_linguales as $e) {$amigdalas_linguales_final .= $e.' | ';}

   $epiglotis                 = $_POST['epiglotis'];
    
         if ($epiglotis <>'') {$epiglotis1 = 'Epiglotis %: '.$epiglotis.' , ';}

         $Epoglo=$epiglotis1;


         $Estadio                 = $_POST['Estadio'];
    
         if ($Estadio <>'') {$Estadio1 = ''.$Estadio.'<br>';}

         $Estadio_desorden=$Estadio1;




$esta  = $_POST['esta'];
$malampati = $_POST['malampati'];
$amigdalas  = $_POST['amigdalas'];
$IMC  = $_POST['IMC'];
$esta1  = $_POST['esta1'];
$malampati1 = $_POST['malampati1'];
$amigdalas1  = $_POST['amigdalas1'];
$IMC1 = $_POST['IMC1'];
$esta2  = $_POST['esta2'];
$malampati2 = $_POST['malampati2'];
$amigdalas2  = $_POST['amigdalas2'];
$IMC2  = $_POST['IMC2'];
$esta3  = $_POST['esta3'];
$malampati3 = $_POST['malampati3'];
$amigdalas3  = $_POST['amigdalas3'];
$IMC3  = $_POST['IMC3'];
$esta4  = $_POST['esta4'];
$malampati4 = $_POST['malampati4'];
$amigdalas4  = $_POST['amigdalas4'];
$IMC4  = $_POST['IMC4'];
 


         $TITU1= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"><tr th aling="center"> <th><B> <H4 aling="center">Pronóstico: Escala de Friedman</H4></B></th></tr></table>';


$Va28= '<table class="table table-bordered" width="100%"><tr><td><h6>Estadio o Fase</h6></td>'; 
             $Va281= '<td><h6>Mallampati Modificado</h6></td>'; 
             $Va282= '<td><h6>Amígdalas</h6></td>';
             $Va283= '<td><h6>IMC</h6></td></tr>'; 
           
$Va29= '<tr><td><h6>'.$esta.'</h6></td>'; 
             $Va30= '<td><h6>'.$malampati.'</h6></td>'; 
             $Va31= '<td><h6>'.$amigdalas.'</h6></td>'; 
             $Va32= '<td><h6>'.$IMC.'</h6></td></tr>'; 
             $Va33= '<tr><td><h6>'.$esta1.'</h6></td>'; 
             $Va34= '<td><h6>'.$malampati1.'</h6></td>';
             $Va35= '<td><h6>'.$amigdalas1.'</h6></td>'; 
             $Va36= '<td><h6>'.$IMC1.'</h6></td></tr>'; 
             $Va37= '<tr><td><h6>'.$esta2.'</h6></td>'; 
             $Va38= '<td><h6>'.$malampati2.'</h6></td>';
             $Va39= '<td><h6>'.$amigdalas2.'</h6></td>'; 
             $Va40= '<td><h6>'.$IMC2.'</h6></td></tr>'; 
             $Va41= '<tr><td><h6>'.$esta3.'</h6></td>'; 
             $Va42= '<td><h6>'.$malampati3.'</h6></td>';
             $Va43= '<td><h6>'.$amigdalas3.'</h6></td>'; 
             $Va44= '<td><h6>'.$IMC3.'</h6></td></tr>'; 
             $Va45= '<tr><td><h6>'.$esta4.'</h6></td>'; 
             $Va46= '<td><h6>'.$malampati4.'</h6></td>';
             $Va47= '<td><h6>'.$amigdalas4.'</h6></td>';
             $Va48= '<td><h6>'.$IMC4.'</h6></td></tr></table>';

             $pronostico=$TITU1.$Va28.$Va281.$Va282.$Va283.$Va29.$Va30.$Va31.$Va32.$Va33.$Va34.$Va35.$Va36.$Va37.$Va38.$Va39.$Va40.$Va41.$Va42.$Va43.$Va44.$Va45.$Va46.$Va47.$Va48;



$estudio_sueño  = $_POST['estudio_sueño'];
$fecha_sueño = $_POST['fecha_sueño'];
$estudio_sueño1  = $_POST['estudio_sueño1'];
$fecha_sueño1  = $_POST['fecha_sueño1'];
$estudio_sueño2  = $_POST['estudio_sueño2'];
$fecha_sueño2  = $_POST['fecha_sueño2'];
$estudio_sueño3 = $_POST['estudio_sueño3'];
$fecha_sueño3  = $_POST['fecha_sueño3'];


        

$Vap28= '<table class="table table-bordered" width="100%"><tr><td><h6>Estudio de Sueño</h6></td>'; 
             $Vap281= '<td><h6>Fecha</h6></td></tr>';  
           
$Vap29= '<tr><td><h6>'.$estudio_sueño.'</h6></td>'; 
             $Vap30= '<td><h6>'.$fecha_sueño.'</h6></td></tr>'; 
             $Vap31= '<tr><td><h6>'.$estudio_sueño1.'</h6></td>'; 
             $Vap32= '<td><h6>'.$fecha_sueño1.'</h6></td></tr>'; 
             $Vap33= '<tr><td><h6>'.$estudio_sueño2.'</h6></td>'; 
             $Vap34= '<td><h6>'.$fecha_sueño2.'</h6></td></tr>';
             $Vap35= '<tr><td><h6>'.$estudio_sueño3.'</h6></td>';
             $Vap36= '<td><h6>'.$fecha_sueño3.'</h6></td></tr></table>';

             $estudio9=$Vap28.$Vap281.$Vap29.$Vap30.$Vap31.$Vap32.$Vap33.$Vap34.$Vap35.$Vap36;



$adaptacion_des                 = $_POST['adaptacion_des'];
$adaptacion_desorde                 = $_POST['adaptacion_desorde'];
    
         if ($adaptacion_des <>'') {$adaptacion_des1 = ''.$adaptacion_des.' , ';}
         if ($adaptacion_desorde <>'') {$adaptacion_desorde1 = ''.$adaptacion_desorde.' , ';}

         $Adaptacion=$adaptacion_des1.$adaptacion_desorde1;


         $ronquido                 = $_POST['ronquido'];
         $baja_probabilidad                 = $_POST['baja_probabilidad'];
         $alta_probabilidad                 = $_POST['alta_probabilidad'];
         $otra_patologia                 = $_POST['otra_patologia'];
    
         if ($ronquido <>'') {$ronquido1 = 'Ronquido Simple: '.$ronquido.'<br>';}
         if ($baja_probabilidad <>'') {$baja_probabilidad1 = 'Baja Probabilidad [SAHOS]: '.$baja_probabilidad.'<br>';}
         if ($alta_probabilidad <>'') {$alta_probabilidad1 = 'Alta Probabilidad [SAHOS]: '.$alta_probabilidad.'<br>';}
         if ($otra_patologia <>'') {$otra_patologia1 = 'Otra Patología: '.$otra_patologia.'<br>';}

         $Hipotesis=$ronquido1.$baja_probabilidad1.$alta_probabilidad1.$otra_patologia1;

         $ahi                 = $_POST['ahi'];
         $ir                 = $_POST['ir'];
         $ido                 = $_POST['ido'];
         $saturacion                 = $_POST['saturacion'];
         $ronquitos                 = $_POST['ronquitos'];
    
         if ($ahi <>'') {$ahi1 = 'AHI: '.$ahi.' , ';}
         if ($ir <>'') {$ir1 = 'IR: '.$ir.' , ';}
         if ($ido <>'') {$ido1 = 'IDO: '.$ido.' , ';}
         if ($saturacion <>'') {$saturacion1 = 'Saturación: '.$saturacion.' , ';}
         if ($ronquitos <>'') {$ronquitos1 = 'Ronquidos: '.$ronquitos.' , ';}

         $Resultados=$ahi1.$ir1.$ido1.$saturacion1.$ronquitos1;


         $comentarios_desordenes                 = $_POST['comentarios_desordenes'];


































      //OIDO 

         $motivoConsulta_oido                 = $_POST['motivoConsulta_oido'];

         $perfil_oido = $_POST['perfil_oido'];
  foreach ($perfil_oido as $e) {$perfil_oido_final .= $e.' | ';}

  $trauma_oido                = $_POST['trauma_oido'];

    
         if ($trauma_oido <>'') {$trauma_oido1 = 'Trauma de Oído: '.$trauma_oido.',';}

         $Trauma=$trauma_oido1;


         $otoscopia = $_POST['otoscopia'];
  foreach ($otoscopia as $e) {$otoscopia_final .= $e.' | ';}


  $microscopia = $_POST['microscopia'];
  foreach ($microscopia as $e) {$microscopia_final .= $e.' | ';}

  $audiometria = $_POST['audiometria'];
  foreach ($audiometria as $e) {$audiometria_final .= $e.' | ';}

  $timpanograma = $_POST['timpanograma'];
  foreach ($timpanograma as $e) {$timpanograma_final .= $e.' | ';}

  $reflejo                 = $_POST['reflejo'];

        
        if ($reflejo <>'') {$reflejo1 = ' Reflejo Estapedial Ipsi: '.sino($reflejo).'<strong> | </strong>';}

        $Reflejo=$reflejo1;


        $audiometria_vocal = $_POST['audiometria_vocal'];
  foreach ($audiometria_vocal as $e) {$audiometria_vocal_final .= $e.' | ';}


  $petc = $_POST['petc'];
  foreach ($petc as $e) {$petc_final .= $e.' | ';}


  $seguimiento_onda = $_POST['seguimiento_onda'];
  foreach ($seguimiento_onda as $e) {$seguimiento_onda_final .= $e.' | ';}

    $otoemisiones = $_POST['otoemisiones'];
  foreach ($otoemisiones as $e) {$otoemisiones_final .= $e.' | ';}


  $indice_nariz = $_POST['indice_nariz'];
  foreach ($indice_nariz as $e) {$indice_nariz_final .= $e.' | ';}

   $seguimiento                 = $_POST['seguimiento'];

        
        if ($seguimiento <>'') {$seguimiento1 = ' Seguimiento de Mano: '.sino($seguimiento).'<strong> | </strong>';}

        $Seguimiento_oido=$seguimiento1;


        $perfil_pierna = $_POST['perfil_pierna'];
  foreach ($perfil_pierna as $e) {$perfil_pierna_final .= $e.' | ';}

  $perfil_romberg = $_POST['perfil_romberg'];
  foreach ($perfil_romberg as $e) {$perfil_romberg_final .= $e.' | ';}

  $romberg_sensible = $_POST['romberg_sensible'];
  foreach ($romberg_sensible as $e) {$romberg_sensible_final .= $e.' | ';}

  $marcha = $_POST['marcha'];
  foreach ($marcha as $e) {$marcha_final .= $e.' | ';}


   $der_nistagnus                = $_POST['der_nistagnus'];
   $izq_nistagnus                = $_POST['izq_nistagnus'];

        
        if ($der_nistagnus <>'') {$der_nistagnus1 = ' Nistagmus Derecho: '.sino($der_nistagnus).'<strong> | </strong>';}
        if ($izq_nistagnus <>'') {$izq_nistagnus1 = ' Nistagmus Izquierdo: '.sino($izq_nistagnus).'<strong> | </strong>';}

        $Giro=$der_nistagnus1.$izq_nistagnus1;


$barracoa = $_POST['barracoa'];
  foreach ($barracoa as $e) {$barracoa_final .= $e.' | ';}

  $nistagus_provocacion = $_POST['nistagus_provocacion'];
  foreach ($nistagus_provocacion as $e) {$nistagus_provocacion_final .= $e.' | ';}

  $Notas_oidos                = $_POST['Notas_oidos'];











































//Faringe

  $motivoConsulta_Faringe                = $_POST['motivoConsulta_Faringe'];



  $rs1                 = $_POST['rs1'];
        $rs2                 = $_POST['rs2'];
        $rs3                 = $_POST['rs3'];
        $rs4                 = $_POST['rs4'];
        $rs5                 = $_POST['rs5'];
        $rs6                 = $_POST['rs6'];
        $rs7                 = $_POST['rs7'];
        $rs8                 = $_POST['rs8'];
        $rs9                 = $_POST['rs9'];
        $rs10                 = $_POST['rs10'];
        $rs11                 = $_POST['rs11'];
        $rs12                 = $_POST['rs12'];
        $rs13                 = $_POST['rs13'];
        $rs14                 = $_POST['rs14'];
        $rs15                 = $_POST['rs15'];
        $rs16                 = $_POST['rs16'];


echo '.......fiebretos rinooo.....................'.$rs1.$rs2.$rs3;

        if ($rs1 <>'') {$s1 = ' Dolor: '.sino($rs1).'<strong> | </strong>';}
        if ($rs2 <>'') {$s2 = ' Sens C. Extraño: '.sino($rs2).'<strong> | </strong>';}
        if ($rs3 <>'') {$s3 = ' Odinofagia: '.sino($rs3).'<strong> | </strong>';}
        if ($rs4 <>'') {$s4 = ' Disfagia: '.sino($rs4).'<strong> | </strong>';}
        if ($rs5 <>'') {$s5 = ' Carraspeo: '.sino($rs5).'<strong> | </strong>';}
        if ($rs6 <>'') {$s6 = ' Flema: '.sino($rs6).'<strong> | </strong>';}
        if ($rs7 <>'') {$s7 = ' Fiebre: '.sino($rs7).'<strong> | </strong>';}
        if ($rs8 <>'') {$s8 = ' Astenia: '.sino($rs8).'<strong> | </strong>';}
        if ($rs9 <>'') {$s9 = ' Anorexia: '.sino($rs9).'<strong> | </strong>';}
        if ($rs10 <>'') {$s10 = ' Mialgias: '.sino($rs10).'<strong> | </strong>';}
        if ($rs11 <>'') {$s11 = ' Artralgias: '.sino($rs11).'<strong> | </strong>';}
        if ($rs12 <>'') {$s12 = ' Disnea: '.sino($rs12).'<strong> | </strong>';}
        if ($rs13 <>'') {$s13 = ' Disfonía: '.sino($rs13).'<strong> | </strong>';}
        if ($rs14 <>'') {$s14 = ' Rinolalia: '.sino($rs14).'<strong> | </strong>';}
        if ($rs15 <>'') {$s15 = ' Cefalea: '.sino($rs15).'<strong> | </strong>';}
        if ($rs16 <>'') {$s16 = ' Decaimiento: '.sino($rs16).'<strong> | </strong>';}
        /*if ($rs17 <>'') {$s17 = ' Parestesias: '.sino($rs17).'<trong> | </trong>';}//
        if ($rs18 <>'') {$s18 = ' Hipoestesias: '.sino($rs18).'<trong> | </trong>';}
        if ($rs19 <>'') {$s19 = ' Cefalea: '.sino($rs19).'<trong> | </trong>';}
        if ($rs20 <>'') {$s20= ' Astenia: '.sino($rs20).'<trong> | </trong>';}*/
        if ($rs21 <>'') {$s21= ' Adinamia: '.sino($rs21).'<strong> | </strong>';}

        $faringe = $s1.$s2.$s3.$s4.$s5.$s6.$s7.$s8.$s9.$s10.$s11.$s12.$s13.$s14.$s15.$s16;



$rs17                 = $_POST['rs17'];
        $rs18                 = $_POST['rs18'];
        $rs19                 = $_POST['rs19'];
        $rs20                 = $_POST['rs20'];
        $rs21                  = $_POST['rs21'];
         

         if ($rs17 <>'') {$s17 = ' Aftas: '.sino($rs17).'<strong> | </strong>';}
        if ($rs18 <>'') {$s18 = ' Les. Herpéticas: '.sino($rs18).'<strong> | </strong>';}
        if ($rs19 <>'') {$s19 = ' Hiperemia: '.sino($rs19).'<strong> | </strong>';}
        if ($rs20 <>'') {$s20= ' Les. Necróticas: '.sino($rs20).'<strong> | </strong>';}

        $Examen_Fisico = $s17.$s18.$s19.$s20;


        $rs21                  = $_POST['rs21'];
        $rs22                  = $_POST['rs22'];

        if ($rs21 <>'') {$s21= ' Violáceos: '.sino($rs21).'<trong> | </trong>';}
        //if ($rs22 <>'') {$s22= ' OIDES HIPERTRO: '.sino($rs22).'<trong> | </trong>';}

        $pilares=$s21.$s22;



        $perfil_sangrado = $_POST['perfil_sangrado'];
  foreach ($perfil_sangrado as $e) {$perfil_sangrado_provocacion_final .= $e.' | ';}

        $lesiones                  = $_POST['lesiones'];

        if ($lesiones <>'') {$slesiones= ' Lesiones Papilomatosas: '.sino($rlesiones).'<strong> | </strong>';}

        $Lesiones=$slesiones;

        $perfil_uvula = $_POST['perfil_uvula'];
  foreach ($perfil_uvula as $e) {$perfil_uvula_final .= $e.' | ';}


  $perfil_amigdalas = $_POST['perfil_amigdalas'];
  foreach ($perfil_amigdalas as $e) {$perfil_amigdalas_final .= $e.' | ';}


  $tumaracio                  = $_POST['tumaracion'];
        $ulcera                  = $_POST['ulcera'];

        if ($tumaracio <>'') {$stumaracio= 'Tumoración Exofítica: '.sino($tumaracio).'<strong> | </strong>';}
        if ($ulcera <>'') {$sulcera= ' Ulcerada: '.sino($ulcera).'<strong> | </strong>';}

        $faringe_otros=$stumaracio.$sulcera;

        $perfil_rinofaringe = $_POST['perfil_rinofaringe'];
  foreach ($perfil_rinofaringe as $e) {$perfil_rinofaringe_final .= $e.' | ';}

  $perfil_orofaringe = $_POST['perfil_orofaringe'];
  foreach ($perfil_orofaringe as $e) {$perfil_orofaringe_final .= $e.' | ';}

  $perfil_hipofaringe = $_POST['perfil_hipofaringe'];
  foreach ($perfil_hipofaringe as $e) {$perfil_hipofaringe_final .= $e.' | ';}

  $perfil_epiglotis = $_POST['perfil_epiglotis'];
  foreach ($perfil_epiglotis as $e) {$perfil_epiglotis_final .= $e.' | ';}




  $notas_faringe                = $_POST['notas_faringe'];



































//Laringe 


$motivoConsulta_Laringe                = $_POST['motivoConsulta_Laringe'];


$perfil_laringe = $_POST['perfil_laringe'];
  foreach ($perfil_laringe as $e) {$perfil_laringe_final .= $e.' | ';}


  $perfil_congestion = $_POST['perfil_congestion'];
  foreach ($perfil_congestion as $e) {$perfil_congestion_final .= $e.' | ';}

  $perfil_edema = $_POST['perfil_edema'];
  foreach ($perfil_edema as $e) {$perfil_edema_final .= $e.' | ';}

  $perfil_lesiones = $_POST['perfil_lesiones'];
  foreach ($perfil_lesiones as $e) {$perfil_lesiones_final .= $e.' | ';}

  $perfil_lesionesmuco = $_POST['perfil_lesionesmuco'];
  foreach ($perfil_lesionesmuco as $e) {$perfil_lesionesmuco_final .= $e.' | ';}

  $perfil_cancer = $_POST['perfil_cancer'];
  foreach ($perfil_cancer as $e) {$perfil_cancer_final .= $e.' | ';}

  $perfil_paralisis1 = $_POST['perfil_paralisis'];
  foreach ($perfil_paralisis1 as $e) {$perfil_paralisis .= $e.' | ';}

  $perfil_cierrepli = $_POST['perfil_cierrepli'];
  foreach ($perfil_cierrepli as $e) {$perfil_cierrepli_final .= $e.' | ';}

  $perfil_subglotis = $_POST['perfil_subglotis'];
  foreach ($perfil_subglotis as $e) {$perfil_subglotis_final .= $e.' | ';}

  $notas_laringe                = $_POST['notas_laringe'];

  

//Glandulas 



$motivoconsulta_glandulas                = $_POST['motivoconsulta_glandulas'];


$perfil_glandula = $_POST['perfil_glandula'];
  foreach ($perfil_glandula as $e) {$perfil_glandula_final .= $e.' | ';}

  $perfil_sialo = $_POST['perfil_sialo'];
  foreach ($perfil_sialo as $e) {$perfil_sialo_final .= $e.' | ';}

  $perfil_ecografia = $_POST['perfil_ecografia'];
  foreach ($perfil_ecografia as $e) {$perfil_ecografia_final .= $e.' | ';}

  $notas_glandulas                = $_POST['notas_glandulas'];


  //Via Lagrimal

  $motivoconsulta_lagrimal                = $_POST['motivoconsulta_lagrimal'];

  $perfil_lagrimal = $_POST['perfil_lagrimal'];
  foreach ($perfil_lagrimal as $e) {$perfil_lagrimal_final .= $e.' | ';}

  $perfil_secresion = $_POST['perfil_secresion'];
  foreach ($perfil_secresion as $e) {$perfil_secresion_final .= $e.' | ';}

  $perfil_obstruccion = $_POST['perfil_obstruccion'];
  foreach ($perfil_obstruccion as $e) {$perfil_obstruccion_final .= $e.' | ';}

  $notas_lagrimal                = $_POST['notas_lagrimal'];

  //Cuello

  $motivoconsulta_cuello                = $_POST['motivoconsulta_cuello'];

  $perfil_cuello = $_POST['perfil_cuello'];
  foreach ($perfil_cuello as $e) {$perfil_cuello_final .= $e.' | ';}

  $notas_cuello                = $_POST['notas_cuello'];





















        $notas1                 = reem($_POST['notas']);
  if ($notas1 <>'') {$notas=$_POST['notas'];
$notas=str_replace("\r","<br>",$notas);}



        // *********************************************************    TABLA  examenesaRealizar *********************************************************
        // *********************************************************    TABLA  examenesaRealizar *********************************************************



       $laboratorio1           = reem($_POST['laboratorio']);
  if ($laboratorio1 <>'') {$laboratorio=$_POST['laboratorio'];
$laboratorio=str_replace("\r","<br>",$laboratorio);}


        $ecografia1             = reem($_POST['ecografia']);
  if ($ecografia1 <>'') {$ecografia=$_POST['ecografia'];
$ecografia=str_replace("\r","<br>",$ecografia);}


        $otros1                 = reem($_POST['otros']);
 if ($otros1 <>'') {$otros=$_POST['otros'];
$otros=str_replace("\r","<br>",$otros);}



        // *********************************************************    TABLA  examenesaRealizar *********************************************************
        // *********************************************************    TABLA  examenesaRealizar *********************************************************

$codigo1=$_POST['select1'];
$codigo2=$_POST['select2'];

echo'.....hghjghjghjgh..........'.$codigo1;
echo'.....hghjghjghjgh..........'.$codigo2;


        $Afecha                = $_POST['fecha'];
        $Ahora                 = $_POST['hora'];
        $motivo                = reem($_POST['motivo']);

        $doctor                     = $_POST['doctor'];

        $NOMBRE_USUARIO        = reem($_POST['NOMBRE_USUARIO']);
        $email                 = $_POST['email'];        
        $nombre                = reem($_POST['nombre']);        
        $telefono              = $_POST['telefono'];

        $activo                = 1;
        $fechar                = date("Y-m-d");
        $Afechar               = date("Y-m-d H:i:s");
        $hora                  = date("H:i:s");
        $P                     = $_POST['P'];

        $registro              = $_POST['registro'];
        $ID                    = $_POST['ID'];
        $idusuario                    = $_POST['ID'];
        $clienteId             = $_POST['clienteId'];
        $receta            = $_POST['receta'];

        $fechaC= $_POST['fechadiagnostico'];


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

$query = "INSERT INTO Historia_Clinica_Otorrino (cliente_id, usuario_id, Fecha, Hora,  motivoConsulta, obstruccion, obstruccion_intensa, estornudos, secreccion_nasal, prurito, epistaxis, olfato, cefalea,simetria, piramide_nasal, dorso_nasal, punta_nasal, angulo_naso, angulo_fronto, columella, relacion_columela, base_nasal, puntos_paranasales, septum_nasal, mucosa_nasal, cornete_bulloso, Observaciones_nariz, motivoconsulta_desorden, rdesordenes, peso, altura, imc, desorden, antecedentes, pang_rotemberg, Nariz_desorde, Friedman, Paladar, Hpertro, lengua, palador_blando, uvula, base_desorde, perfil_cara, clasificacion, articulacion_temporo, apertura_bucal, Nasoendo, lugar_obstrccion, tipo_desorde, Maniobra, Epoglo, Estadio_desorden, pronostico, estudio9, Adaptacion, Hipotesis, Resultados, comentarios_desordenes, motivoConsulta_oido, perfil_oido, Trauma, otoscopia, microscopia, audiometria, timpanograma, Reflejo, audiometria_voca, petc, seguimiento_onda, otoemisiones, indice_nariz, Seguimiento_oido, perfil_pierna, perfil_romberg, romberg_sensible, marcha, Giro, barracoa, nistagus_provocacion, Notas_oidos, motivoConsulta_Faringe, faringe, Examen_Fisico, pilares, Lesiones, perfil_uvula, perfil_amigdalas, faringe_otros, perfil_rinofaringe, perfil_orofaringe, perfil_hipofaringe, perfil_epiglotis, notas_faringe, motivoConsulta_Laringe, perfil_laringe, perfil_congestion, perfil_edem, perfil_lesiones, perfil_lesionesmuco, perfil_cancer, perfil_paralisis, perfil_cierrepli, perfil_subglotis, notas_laringe, motivoconsulta_glandulas, perfil_glandula, perfil_sialo, perfil_ecografia, notas_glandulas, motivoconsulta_lagrimal, perfil_lagrimal, perfil_secresion, perfil_obstruccion, notas_lagrimal, motivoconsulta_cuello, perfil_cuello, notas_cuello, cornetes_nasal, paladar_oseo, perfil_sangrado, perfil_edema, Apneas_Vividas, motivoConsulta_nariz,amigdalas_linguales) VALUES  ($clienteId, $ID, $fechar, $hora,  $motivoConsulta, $obstruccion_final, $obstruccion_intensa_final, $estornudos_final, $secreccion_nasal_final, $prurito_final, $epistaxis_final, $olfato_final, $cefalea_final, $simetria, $piramide_nasal_final, $dorso_nasal_final, $punta_nasal_final, $angulo_naso_final, $angulo_fronto_final, $columella_final,$relacion_columela, $base_nasal_final, $puntos_paranasales_final, $septum_nasal_final, $mucosa_nasal_final, $cornete_bulloso_final, $Observaciones_nariz, $motivoconsulta_desorden, $rdesordenes, $peso, $altura, $imc, $desorden, $antecedentes, $pang_rotemberg_final, $Nariz_desorde, $Friedman, $Paladar, $Hpertro, $lengua_final, $palador_blando_final, $uvula_final, $base_desorde, $perfil_cara_final, $clasificacion_final, $articulacion_temporo_final, $apertura_bucal_temporo_final, $Nasoendo, $lugar_obstrccion_final, $tipo_desorde, $Maniobra, $Epoglo, $Estadio_desorden, $pronostico, $estudio9, $Adaptacion, $Hipotesis, $Resultados, $comentarios_desordenes, $motivoConsulta_oido, $perfil_oido_final, $Trauma, $otoscopia_final, $microscopia_final, $audiometria_final, $timpanograma_final, $Reflejo, $audiometria_vocal_final, $petc_final,$seguimiento_onda_final, $otoemisiones_final, $indice_nariz_final, $Seguimiento_oido, $perfil_pierna_final, $perfil_romberg_final, $romberg_sensible_final, $marcha_final, $Giro, $barracoa_final, $nistagus_provocacion_final, $Notas_oidos, $motivoConsulta_Faringe, $faringe, $Examen_Fisico, $pilares, $Lesiones, $perfil_uvula_final, $perfil_amigdalas_final, $faringe_otros, $perfil_rinofaringe_final, $perfil_orofaringe_final, $perfil_hipofaringe_final,$perfil_epiglotis_final, $notas_faringe, $motivoConsulta_Laringe, $perfil_laringe_final, $perfil_congestion_final, $perfil_edem, $perfil_lesiones_final, $perfil_lesionesmuco_final, $perfil_cancer_final, $perfil_paralisis, $perfil_cierrepli_final, $perfil_subglotis_final, $notas_laringe, $motivoconsulta_glandulas, $perfil_glandula_final, $perfil_sialo_final, $perfil_ecografia_final, $notas_glandulas, $motivoconsulta_lagrimal, $perfil_lagrimal_final, $perfil_secresion_final, $perfil_obstruccion_final, $notas_lagrimal, $motivoconsulta_cuello, $perfil_cuello_final, $notas_cuello, $cornetes_nasal_final, $paladar_oseo_final, $perfil_sangrado_provocacion_final, $perfil_edema_final, $Apneas_Vividas, $motivoConsulta_nariz,$amigdalas_linguales_final);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);
       

        mysqli_query($conn3,"INSERT INTO Historia_Clinica_Otorrino (cliente_id, usuario_id, Fecha, Hora,  motivoConsulta, obstruccion, obstruccion_intensa, estornudos, secreccion_nasal, prurito, epistaxis, olfato, cefalea,simetria, piramide_nasal, dorso_nasal, punta_nasal, angulo_naso, angulo_fronto, columella, relacion_columela, base_nasal, puntos_paranasales, septum_nasal, mucosa_nasal, cornete_bulloso, Observaciones_nariz, motivoconsulta_desorden, rdesordenes, peso, altura, imc, desorden, antecedentes, pang_rotemberg, Nariz_desorde, Friedman, Paladar, Hpertro, lengua, palador_blando, uvula, base_desorde, perfil_cara, clasificacion, articulacion_temporo, apertura_bucal, Nasoendo, lugar_obstrccion, tipo_desorde, Maniobra, Epoglo, Estadio_desorden, pronostico, estudio9, Adaptacion, Hipotesis, Resultados, comentarios_desordenes, motivoConsulta_oido, perfil_oido, Trauma, otoscopia, microscopia, audiometria, timpanograma, Reflejo, audiometria_voca, petc, seguimiento_onda, otoemisiones, indice_nariz, Seguimiento_oido, perfil_pierna, perfil_romberg, romberg_sensible, marcha, Giro, barracoa, nistagus_provocacion, Notas_oidos, motivoConsulta_Faringe, faringe, Examen_Fisico, pilares, Lesiones, perfil_uvula, perfil_amigdalas, faringe_otros, perfil_rinofaringe, perfil_orofaringe, perfil_hipofaringe, perfil_epiglotis, notas_faringe, motivoConsulta_Laringe, perfil_laringe, perfil_congestion, perfil_edem, perfil_lesiones, perfil_lesionesmuco, perfil_cancer, perfil_paralisis, perfil_cierrepli, perfil_subglotis, notas_laringe, motivoconsulta_glandulas, perfil_glandula, perfil_sialo, perfil_ecografia, notas_glandulas, motivoconsulta_lagrimal, perfil_lagrimal, perfil_secresion, perfil_obstruccion, notas_lagrimal, motivoconsulta_cuello, perfil_cuello, notas_cuello, cornetes_nasal, paladar_oseo, perfil_sangrado, perfil_edema, Apneas_Vividas, motivoConsulta_nariz,amigdalas_linguales) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$motivoConsulta', '$obstruccion_final', '$obstruccion_intensa_final', '$estornudos_final', '$secreccion_nasal_final', '$prurito_final', '$epistaxis_final', '$olfato_final', '$cefalea_final', '$simetria', '$piramide_nasal_final', '$dorso_nasal_final', '$punta_nasal_final', '$angulo_naso_final', '$angulo_fronto_final', '$columella_final','$relacion_columela', '$base_nasal_final', '$puntos_paranasales_final', '$septum_nasal_final', '$mucosa_nasal_final', '$cornete_bulloso_final', '$Observaciones_nariz', '$motivoconsulta_desorden', '$rdesordenes', '$peso', '$altura', '$imc', '$desorden', '$antecedentes', '$pang_rotemberg_final', '$Nariz_desorde', '$Friedman', '$Paladar', '$Hpertro', '$lengua_final', '$palador_blando_final', '$uvula_final', '$base_desorde', '$perfil_cara_final', '$clasificacion_final', '$articulacion_temporo_final', '$apertura_bucal_temporo_final', '$Nasoendo', '$lugar_obstrccion_final', '$tipo_desorde', '$Maniobra', '$Epoglo', '$Estadio_desorden', '$pronostico', '$estudio9', '$Adaptacion', '$Hipotesis', '$Resultados', '$comentarios_desordenes', '$motivoConsulta_oido', '$perfil_oido_final', '$Trauma', '$otoscopia_final', '$microscopia_final', '$audiometria_final', '$timpanograma_final', '$Reflejo', '$audiometria_vocal_final', '$petc_final', '$seguimiento_onda_final', '$otoemisiones_final', '$indice_nariz_final', '$Seguimiento_oido', '$perfil_pierna_final', '$perfil_romberg_final', '$romberg_sensible_final', '$marcha_final', '$Giro', '$barracoa_final', '$nistagus_provocacion_final', '$Notas_oidos', '$motivoConsulta_Faringe', '$faringe', '$Examen_Fisico', '$pilares', '$Lesiones', '$perfil_uvula_final', '$perfil_amigdalas_final', '$faringe_otros', '$perfil_rinofaringe_final', '$perfil_orofaringe_final', '$perfil_hipofaringe_final','$perfil_epiglotis_final', '$notas_faringe', '$motivoConsulta_Laringe', '$perfil_laringe_final', '$perfil_congestion_final', '$perfil_edem', '$perfil_lesiones_final', '$perfil_lesionesmuco_final', '$perfil_cancer_final', '$perfil_paralisis', '$perfil_cierrepli_final', '$perfil_subglotis_final', '$notas_laringe', '$motivoconsulta_glandulas', '$perfil_glandula_final', '$perfil_sialo_final', '$perfil_ecografia_final', '$notas_glandulas', '$motivoconsulta_lagrimal', '$perfil_lagrimal_final', '$perfil_secresion_final', '$perfil_obstruccion_final', '$notas_lagrimal', '$motivoconsulta_cuello', '$perfil_cuello_final', '$notas_cuello', '$cornetes_nasal_final', '$paladar_oseo_final', '$perfil_sangrado_provocacion_final', '$perfil_edema_final', '$Apneas_Vividas', '$motivoConsulta_nariz','$amigdalas_linguales_final');")  or die(mysqli_error($conn3));  


     /*   echo "INSERT INTO historiaClinicaOtorrino (cliente_id, usuario_id, Fecha, Hora,  motivoConsulta, obstruccion, obstruccion_intensa, estornudos, secreccion_nasal, prurito, epistaxis, olfato, cefalea,simetria, piramide_nasal, dorso_nasal, punta_nasal, angulo_naso, angulo_fronto, columella, relacion_columela, base_nasal, puntos_paranasales, septum_nasal, mucosa_nasal, cornete_bulloso, Observaciones_nariz, motivoconsulta_desorden, rdesordenes, peso, altura, imc, desorden, antecedentes, pang_rotemberg, Nariz_desorde, Friedman, Paladar, Hpertro, lengua, palador_blando, uvula, base_desorde, perfil_cara, clasificacion, articulacion_temporo, apertura_bucal, Nasoendo, lugar_obstrccion, tipo_desorde, Maniobra, Epoglo, Estadio_desorden, pronostico, estudio9, Adaptacion, Hipotesis, Resultados, comentarios_desordenes, motivoConsulta_oido, perfil_oido, Trauma, otoscopia, microscopia, audiometria, timpanograma, Reflejo, audiometria_voca, petc, seguimiento_onda, otoemisiones, indice_nariz, Seguimiento_oido, perfil_pierna, perfil_romberg, romberg_sensible, marcha, Giro, barracoa, nistagus_provocacion, Notas_oidos, motivoConsulta_Faringe, faringe, Examen_Fisico, pilares, Lesiones, perfil_uvula, perfil_amigdalas, faringe_otros, perfil_rinofaringe, perfil_orofaringe, perfil_hipofaringe, perfil_epiglotis, notas_faringe, motivoConsulta_Laringe, perfil_laringe, perfil_congestion, perfil_edem, perfil_lesiones, perfil_lesionesmuco, perfil_cancer, perfil_paralisis, perfil_cierrepli, perfil_subglotis, notas_laringe, motivoconsulta_glandulas, perfil_glandula, perfil_sialo, perfil_ecografia, notas_glandulas, motivoconsulta_lagrimal, perfil_lagrimal, perfil_secresion, perfil_obstruccion, notas_lagrimal, motivoconsulta_cuello, perfil_cuello, notas_cuello, cornetes_nasal, paladar_oseo, perfil_sangrado, perfil_edema) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$motivoConsulta', '$obstruccion_final', '$obstruccion_intensa_final', '$estornudos_final', '$secreccion_nasal_final', '$prurito_final', '$epistaxis_final', '$olfato_final', '$cefalea_final', '$simetria', '$piramide_nasal_final', '$dorso_nasal_final', '$punta_nasal_final', '$angulo_naso_final', '$angulo_fronto_final', '$columella_final','$relacion_columela', '$base_nasal_final', '$puntos_paranasales_final', '$septum_nasal_final', '$mucosa_nasal_final', '$cornete_bulloso_final', '$Observaciones_nariz', '$motivoconsulta_desorden', '$rdesordenes', '$peso', '$altura', '$imc', '$desorden', '$antecedentes', '$pang_rotemberg_final', '$Nariz_desorde', '$Friedman', '$Paladar', '$Hpertro', '$lengua_final', '$palador_blando_final', '$uvula_final', '$base_desorde', '$perfil_cara_final', '$clasificacion_final', '$articulacion_temporo_final', '$apertura_bucal_temporo_final', '$Nasoendo', '$lugar_obstrccion_final', '$tipo_desorde', '$Maniobra', '$Epoglo', '$Estadio_desorden', '$pronostico', '$estudio9', '$Adaptacion', '$Hipotesis', '$Resultados', '$comentarios_desordenes', '$motivoConsulta_oido', '$perfil_oido_final', '$Trauma', '$otoscopia_final', '$microscopia_final', '$audiometria_final', '$timpanograma_final', '$Reflejo', '$audiometria_vocal_final', '$petc_final', '$seguimiento_onda_final', '$otoemisiones_final', '$indice_nariz_final', '$Seguimiento_oido', '$perfil_pierna_final', '$perfil_romberg_final', '$romberg_sensible_final', '$marcha_final', '$Giro', '$barracoa_final', '$nistagus_provocacion_final', '$Notas_oidos', '$motivoConsulta_Faringe', '$faringe', '$Examen_Fisico', '$pilares', '$Lesiones', '$perfil_uvula_final', '$perfil_amigdalas_final', '$faringe_otros', '$perfil_rinofaringe_final', '$perfil_orofaringe_final', '$perfil_hipofaringe_final','$perfil_epiglotis_final', '$notas_faringe', '$motivoConsulta_Laringe', '$perfil_laringe_final', '$perfil_congestion_final', '$perfil_edem', '$perfil_lesiones_final', '$perfil_lesionesmuco_final', '$perfil_cancer_final', '$perfil_pierna_final', '$perfil_cierrepli_final', '$perfil_subglotis_final', '$notas_laringe', '$motivoconsulta_glandulas', '$perfil_glandula_final', '$perfil_sialo_final', '$perfil_ecografia_final', '$notas_glandulas', '$motivoconsulta_lagrimal', '$perfil_lagrimal_final', '$perfil_secresion_final', '$perfil_obstruccion_final', '$notas_lagrimal', '$motivoconsulta_cuello', '$perfil_cuello_final', '$notas_cuello', '$cornetes_nasal_final', '$paladar_oseo_final', '$perfil_sangrado_provocacion_final', '$perfil_edema_final');";*/


              /*
              $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica1 from historiaClinicaOtorrino where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinica1'];
              }
              */
              $historiaClinica1= mysqli_insert_id($conn3);

              $descripcion          = $_POST['descripcion'];  

       

          $codigo2=$_POST['archivo'];
       

      // $contador2=count($codigo2); 



       

 foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
    {
        //Validamos que el archivo exista
        if($_FILES["archivo"]["name"][$key]) {
            $filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
            ////////////////////////////////////////
             // Eliminar caracteres ' y "
            $cleanedFilename = str_replace(array("'", "\""), "", $filename);
            $currentDate = date("Ymd_His");
            $randomNumber = mt_rand(1, 9999);
            $filename = $currentDate . "_" . $randomNumber . "_" . $cleanedFilename;
            ///////////////////////////////////////////
            
            $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
            
            $directorio = 'archivos/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
            
            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if(!file_exists($directorio)){
                mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");    
            }
            
            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if(move_uploaded_file($source, $target_path)) { 
                echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                } else {    
                echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
            }
            closedir($dir); //Cerramos el directorio de destino
        }
 




    mysqli_query($conn3,"INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, descripcion,NombreVisual,Realizado_Desde) VALUES   ('$clienteId', '$ID', '$historiaClinica1','$filename','$fechar','','$descripcion','Historia_Clinica_Otorrino')") or die(mysqli_error($conn3));


/*echo "INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, descripcion) VALUES   ('$clienteId', '$ID', '$historiaClinica1','$filename','$fechar', '$descripcion')"; */ 


    }  


             
/*


$mensaje = ' Resultado de la consulta  con el Dr(a) *'.$NOMBRE_USUARIO.'*, *Diagnostico* '.$diagnostico.' *Tratamiento* '.$tratamiento.'. ***Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR '.$nombre.'-MedicalSoft';
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



   
// echo "<br>INSERT INTO historiaClinica1_ldp2 
            //(cliente_id, usuario_id, historiaClinica1_id, Fecha, Hora, codigo, pab, denominacion, hpc, hsc, htc, hcc, han) VALUES 
            //('$clienteId', '$ID', '$historiaClinica1', '$fechar', '$hora', '$codigo2', '$pab', '$denominacion', '$hpc', '$hsc', '$htc', '$hcc', '$han');<br>";
            
        } 
 */
 



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
/*
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

$mensaje = ' Sr(a) *'.$nombre.'* usted ha agendado un cita médica con Dr(a) *'.$doctor.'* el dia *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR '.$nombre.'-MedicalSoft';
Whatsapp_sent($telefono, $mensaje);


$mensaje2 = ' Dr(a) *'.$doctor.'*  se ha agendado  una cita con la paciente *'.$nombre.'*,  *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Motivo: *'.$motivoConsulta.'* Atte '.$nombre.' MedicalSoft';
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
*/

echo "<script language='Javascript'> window.location='HO_Finalizado_Historia_Otorrino?historiaClinica1=$historiaClinica1';</script>"; 

?>