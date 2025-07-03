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

 $CONTA           = $_POST['contact'];




 $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinicaN  where cliente_id = $clienteId");
                
                $nrowl=mysqli_num_rows($queryList);
                while($rowMotorizado=mysqli_fetch_array($queryList))
                {

                 
                  $personales      =$rowMotorizado['personales'];
                  $familiares    =$rowMotorizado['familiares'];
                 
                  
                        
                }









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
                $Logo = '<img src="https://medicalsoftplus.com/pe507/logos/'.$LogoF.'" height="20" width="70">'; 
              }
              

              if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="https://medicalsoftplus.com/pe507/FirmasReg/'.$firma.'" height="50" width="60">'; 
              }


            }
            



        //entrevista inicial
        $motivoConsulta        = reem($_POST['motivoConsulta']);
           $antecedentesPersonales  = $_POST['antecedentesP'];
           $observacionP   = $_POST['observacionP'];
           $patalogicos    = $_POST['patalogicos'];
           $quirurgicos    = $_POST['quirurgicos'];
           $clinicos       = $_POST['clinicos'];
           $alergia        = $_POST['alergia'];
           $medicacion     = $_POST['medicacion'];
           $antecedentesPers = $_POST['antecedentesPers'];
foreach ($antecedentesPers as $e) {$antecedentesPers_final .= $e.'|';}

            $TITUL1= '<table class="table table-bordered" width="100%"><tr th aling="center"> <th><B> <H4 aling="center"> MOTIVO DE CONSULTA</H4></B></th></tr>';
             $V1= '<tr><td><h6>'.$motivoConsulta.'</h6></td></tr></table>';
            $TITUL2= '<table class="table table-bordered" width="100%"><tr th aling="center"> <th><B> <H4 aling="center"> ANTECEDENTES PERSONALES</H4></B></th></tr>';
            $VP1= '<tr><td><h6>Patalógicos:<br>'.$patalogicos.'</h6></td></tr>';
            //$VP3= '<tr><td><h6>'.$antecedentesPers_final.'</h6></td></tr></table>';
            $VP2= '<tr><td><h6>Quirúrgicos:<br>'.$quirurgicos.'</h6></td></tr>';
            $VP3= '<tr><td><h6>Clínicos:<br>'.$clinicos.'</h6></td></tr>';
            $VP4= '<tr><td><h6>Alergia:<br>'.$alergia.'</h6></td></tr>';
            $VP5= '<tr><td><h6>Medicación:<br>'.$medicacion.'</h6></td></tr>';
            //$VP3= '<tr><td><h6>'.$antecedentesPers_final.'</h6></td></tr></table>';
             $V2= '<tr><td><h6>'.$antecedentesPersonales.'</h6></td></tr>';
             $VP6= '<tr><td><h6>'.$observacionP.'</h6></td></tr></table>';
             
             
 
    $perso=$TITUL2.$VP1.$VP2.$VP3.$VP4.$VP5.$V2.$VP6; 


      
             
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

          $TITUL3= '<table class="table table-bordered" width="100%"><tr th aling="center"> <th><B> <H4 aling="center"> ANTECEDENTES FAMILIARES</H4></B></th></tr></table>';
             //$V3= '<table table-bordered" width="100%"><tr><td><h6>1.CARDIOPATIA'.$ant6.'</h6></td>';
             //$V4= '<td><h6>2.DIABETES'.$ant7.'</h6></td>';
             //$V5= '<td><h6>3. ENF. C. VASCULAR'.$ant8.'</h6></td>';
             //$V6= '<td><h6>4. HIPERTENSIÓN'.$ant999.'</h6></td>';
             //$V7= '<td><h6>5. CÁNCER'.$ant10.'</h6></td></tr>';
             //$V8= '<tr><td><h6>6. TUBERCULOSIS'.$ant11.'</h6></td>';
             //$V9= '<td><h6>7. ENF. MENTAL'.$ant12.'</h6></td>';
             //$V10= '<td><h6>8. ENF. INFECCIOSA'.$ant13.'</h6></td>';
             //$V11= '<td><h6>9. MALFORMACIÓN'.$ant14.'</h6></td>';
             //$V12= '<td><h6>10. OTRO'.$ant15.'</h6></td></tr></table>';
             $V13=  '<table><tr><td><h6>'.$antecedentesFamiliares.'</h6></td></tr></table>';  

          

             $fami= $TITUL3.$V3.$V4.$V5.$V6.$V7.$V8.$V9.$V10.$V11.$V12.$V13; 

     








/////////////////////////////////////

            $enfermedadActual         = reem($_POST['enfermedadActual']);

             $TITU4= '<table class="table table-bordered" width="100%"><tr th aling="center"> <th><B> <H4 aling="center"> ENFERMEDAD O PROBLEMA ACTUAL</H4></B></th></tr>';
             $V14= '<tr><td><h6>'.$enfermedadActual.'</h6></td><tr></table>';

       
 $consulta=$TITUL1.$V1; 
 $enfermedadA=$TITU4.$V14;  
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


 $TITUL5= '<table class="table table-bordered" width="100%"><tr th aling="center"> <th><B> <H4 aling="center"> REVISION ACTUAL DE ORGANOS Y SISTEMAS</H4></B></th></tr></table>';
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

      $TITU6= '<table class="table table-bordered" width="100%"><tr th aling="center"> <th><B> <H4 aling="center">SIGNOS VITALES</H4></B></th></tr></table>';
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

   


echo '******************************************************************************';
    
$diagnostico1 = $_POST['diagnostico1'];
$cie10D1  = $_POST['cie10lista1'];

ECHO'diagnostico1'.$cie10D1; 
echo '******************************************************************************';

$pre1  = $_POST['pre1'];
$diagnostico2 = $_POST['diagnostico2'];
$cie10D2  = $_POST['cie10lista2'];
ECHO'diagnostico2'.$cie10D12; 

$pre2  = $_POST['pre2'];
$diagnostico3 = $_POST['diagnostico3'];
$cie10D3  = $_POST['cie10lista3'];
ECHO'diagnostico3'.$cie10D3; 

$pre3  = $_POST['pre3'];

$diagnostico4 = $_POST['diagnostico4'];
$cie10D4  = $_POST['cie10lista4'];
ECHO'diagnostico4'.$cie10D4; 

$pre4  = $_POST['pre4'];

$diagnostico5 = $_POST['diagnostico5'];
$cie10D5  = $_POST['cie10lista5'];
ECHO'diagnostico5'.$cie10D5; 

$pre5  = $_POST['pre5'];

$TITU8= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"><tr th aling="center"> <th><B> <H4 aling="center"> DIAGNOSTICOS</H4></B></th></tr></table>';


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
             $Va37= '<td><h6>'.$pre3.'</h6></td></tr>';
             $Va351= '<tr><td><h6>'.$diagnostico4.'</h6></td>'; 
             $Va361= '<td><h6>'.$cie10D4.'</h6></td>'; 
             $Va371= '<td><h6>'.$pre4.'</h6></td></tr>';
             $Va352= '<tr><td><h6>'.$diagnostico5.'</h6></td>'; 
             $Va362= '<td><h6>'.$cie10D5.'</h6></td>'; 
             $Va372= '<td><h6>'.$pre5.'</h6></td></tr></table>';




//////////////////Planes y tratamien

             $planes  = $_POST['otros'];


$TITU9= '<table class="table table-bordered" width="100%"><tr th aling="center"> <th><B> <H4 aling="center"> PLANES DE TRATAMIENTO</H4></B></th></tr>';
$Va38= '<tr><td><h6>'.$planes.'</h6></td></tr></table>';


$diagno=$TITU8.$Va28.$Va29.$Va30.$Va31.$Va32.$Va33.$Va34.$Va35.$Va36.$Va37.$Va351.$Va361.$Va371.$Va352.$Va362.$Va372.$TITU9.$Va38;

     

        $exam1                 = $_POST['exam1'];
        $exam2                 = $_POST['exam2'];
        $exam3                 = $_POST['exam3'];
        $exam4                 = $_POST['exam4'];
        $exam5                 = $_POST['exam5'];
        $exam6                 = $_POST['exam6'];
        $exam7                 = $_POST['exam7'];
        $exam8                 = $_POST['exam8'];
        $exam9                 = $_POST['exam9'];
        $exam10                = $_POST['exam10'];
        $exam11                = $_POST['exam11'];
        $exam12                = $_POST['exam12'];
        $exam13                = $_POST['exam13'];
        $exam14                = $_POST['exam14'];
        $exam15                = $_POST['exam15'];
        $exam16                = $_POST['exam16'];
        $exam17                = $_POST['exam17'];
        $exam18                = $_POST['exam18'];
        $exam19                = $_POST['exam19'];
        $exam20                = $_POST['exam20'];
        $exam21                = $_POST['exam21'];
        $exam22                = $_POST['exam22'];
        $exam23                = $_POST['exam23'];
        $exam24                = $_POST['exam24'];
        $exam25                = $_POST['exam25'];
        $exam26                = $_POST['exam26'];
        $exam27                = $_POST['exam27'];
        $exam28                = $_POST['exam28'];
        $exam29                = $_POST['exam29'];
        $exam30                = $_POST['exam30'];
        $exam31                = $_POST['exam31'];
        $exam32                = $_POST['exam32'];
        $exam33                = $_POST['exam33'];
        $exam34                = $_POST['exam34'];
        $exam35                = $_POST['exam35'];
        $exam36                = $_POST['exam36'];
        $exam37                = $_POST['exam37'];
        $exam38                = $_POST['exam38'];
        $exam39                = $_POST['exam39'];
        $exam40                = $_POST['exam40'];
        $exam41                = $_POST['exam41'];
        $exam42                = $_POST['exam42'];
        $exam43                = $_POST['exam43'];
        $exam44                = $_POST['exam44'];
        $exam45                = $_POST['exam45'];
        $exam46                = $_POST['exam46'];
        $exam47                = $_POST['exam47'];
        $exam48                = $_POST['exam48'];
        $exam49                = $_POST['exam49'];
        $exam50                = $_POST['exam50'];
        $exam51                = $_POST['exam51'];
        $exam52                = $_POST['exam52'];
        $exam53                = $_POST['exam53'];
        $exam54                = $_POST['exam54'];
        $exam55                = $_POST['exam55'];
        $exam56                = $_POST['exam56'];
        $exam57                = $_POST['exam57'];
        $exam58                = $_POST['exam58'];
        $exam59                = $_POST['exam59'];
        $exam60                = $_POST['exam60'];
        $exam61                = $_POST['exam61'];
        $exam62                = $_POST['exam62'];
        $exam63                = $_POST['exam63'];
        $exam64                = $_POST['exam64'];
        $exam65                = $_POST['exam65'];
        $exam66                = $_POST['exam66'];
        $exam67                = $_POST['exam67'];
        $exam68                = $_POST['exam68'];
        $exam69                = $_POST['exam69'];
        $exam70                = $_POST['exam70'];
        $exam71                = $_POST['exam71'];
        $exam72                = $_POST['exam72'];
        $exam73                = $_POST['exam73'];
        $exam74                = $_POST['exam74'];
        $exam75                = $_POST['exam75'];
        $exam76                = $_POST['exam76'];
        $exam77                = $_POST['exam77'];
        $exam78                = $_POST['exam78'];
        $exam79                = $_POST['exam79'];
        $exam80                = $_POST['exam80'];
        $exam81                = $_POST['exam81'];
        $exam82                = $_POST['exam82'];
        $exam83                = $_POST['exam83'];
        $exam84                = $_POST['exam84'];
        $exam85                = $_POST['exam85'];
        $exam86                = $_POST['exam86'];
        $exam87                = $_POST['exam87'];
        $exam88                = $_POST['exam88'];
        $exam89                = $_POST['exam89'];
        $exam90                = $_POST['exam90'];
        $exam91                = $_POST['exam91'];
        $exam92                = $_POST['exam92'];
        $exam93                = $_POST['exam93'];
        $exam94                = $_POST['exam94'];
        $exam95                = $_POST['exam95'];
        $exam96                = $_POST['exam96'];
        $exam97                = $_POST['exam97'];
        $exam98                = $_POST['exam98'];
        $exam99                = $_POST['exam99'];
        $exam100               = $_POST['exam100'];
        $exam101               = $_POST['exam101'];
        $exam102               = $_POST['exam102'];
        $exam103               = $_POST['exam103'];
        $exam104               = $_POST['exam104'];
        $exam105               = $_POST['exam105'];
        $exam106               = $_POST['exam106'];
        $exam107               = $_POST['exam107'];
        $exam108               = $_POST['exam108'];
        $exam109               = $_POST['exam109'];
        $exam110               = $_POST['exam110'];
        $exam111               = $_POST['exam111'];
        $exam112               = $_POST['exam112'];
        $exam113               = $_POST['exam113'];
        $exam114               = $_POST['exam114'];
        $exam115               = $_POST['exam115'];
        $exam116               = $_POST['exam116'];
        $exam117               = $_POST['exam117'];
        $exam118               = $_POST['exam118'];
        $exam119               = $_POST['exam119'];
        $exam120               = $_POST['exam120'];
        $exam121               = $_POST['exam121'];
        $exam122               = $_POST['exam122'];
        $exam123               = $_POST['exam123'];
        $exam124               = $_POST['exam124'];
        $exam125               = $_POST['exam125'];
        $exam126               = $_POST['exam126'];
        $exam127               = $_POST['exam127'];
        $exam128               = $_POST['exam128'];
        $exam129               = $_POST['exam129'];
        $exam130               = $_POST['exam130'];
        $exam131               = $_POST['exam131'];
        $exam132               = $_POST['exam132'];
        $exam133               = $_POST['exam133'];
        $exam134               = $_POST['exam134'];
        $exam135               = $_POST['exam135'];
        $exam136               = $_POST['exam136'];
        $exam137               = $_POST['exam137'];
        $exam138               = $_POST['exam138'];
        $exam139               = $_POST['exam139'];
        $exam140               = $_POST['exam140'];
        $exam141               = $_POST['exam141'];
        $exam142               = $_POST['exam142'];
        $exam143               = $_POST['exam143'];
        $exam144               = $_POST['exam144'];
        $exam145               = $_POST['exam145'];
        $exam146               = $_POST['exam146'];
        $exam147               = $_POST['exam147'];
        $exam148               = $_POST['exam148'];
        $exam149               = $_POST['exam149'];
        $exam150               = $_POST['exam150'];
        $exam151               = $_POST['exam151'];
        $exam152               = $_POST['exam152'];
        $exam153               = $_POST['exam153'];
        $exam154               = $_POST['exam154'];
        $exam155               = $_POST['exam155'];
        $exam156               = $_POST['exam156'];
        $exam157               = $_POST['exam157'];
        $exam158               = $_POST['exam158'];
        $exam159               = $_POST['exam159'];
        $exam160               = $_POST['exam160'];
        $exam161               = $_POST['exam161'];
        $exam162               = $_POST['exam162'];
        $exam163               = $_POST['exam163'];
        $exam164               = $_POST['exam164'];
        $exam165               = $_POST['exam165'];
        $exam166               = $_POST['exam166'];
        $exam167               = $_POST['exam167'];
        $exam168               = $_POST['exam168'];
        $exam169               = $_POST['exam169'];
        $exam170               = $_POST['exam170'];
        $exam171               = $_POST['exam171'];
        $exam172               = $_POST['exam172'];
        $exam173               = $_POST['exam173'];
        $exam174               = $_POST['exam174'];
        $exam175               = $_POST['exam175'];
        $exam176               = $_POST['exam176'];
        $exam177               = $_POST['exam177'];
        $exam178               = $_POST['exam178'];
        $exam179               = $_POST['exam179'];
        $exam180               = $_POST['exam180'];
        $exam181               = $_POST['exam181'];
        $exam182               = $_POST['exam182'];
        $exam183               = $_POST['exam183'];
        $exam184               = $_POST['exam184'];
        $exam185               = $_POST['exam185'];
        $exam186               = $_POST['exam186'];
        $exam187               = $_POST['exam187'];
        $exam188               = $_POST['exam188'];
        $exam189               = $_POST['exam189'];
        $exam190               = $_POST['exam190'];
        $exam191               = $_POST['exam191'];
        $exam192               = $_POST['exam192'];
        $exam193               = $_POST['exam193'];
        $exam194               = $_POST['exam194'];
        $exam195               = $_POST['exam195'];
        $exam196               = $_POST['exam196'];
        $exam197               = $_POST['exam197'];
        $exam198               = $_POST['exam198'];
        $exam199               = $_POST['exam199'];
        $exam200               = $_POST['exam200'];
        $exam201               = $_POST['exam201'];
        $exam202               = $_POST['exam202'];
        $exam203               = $_POST['exam203'];
        $exam204               = $_POST['exam204'];
        $exam205               = $_POST['exam205'];
        $exam206               = $_POST['exam206'];
        $exam207               = $_POST['exam207'];
        $exam208               = $_POST['exam208'];
        $exam209               = $_POST['exam209'];
        $exam210               = $_POST['exam210'];
        $exam211               = $_POST['exam211'];
        $exam212               = $_POST['exam212'];
        $exam213               = $_POST['exam213'];
        $exam214               = $_POST['exam214'];
        $exam215               = $_POST['exam215'];
        $exam216               = $_POST['exam216'];
        $exam217               = $_POST['exam217'];
        $exam218               = $_POST['exam218'];
        $exam219               = $_POST['exam219'];
        $exam220               = $_POST['exam220'];
        $exam221               = $_POST['exam221'];
        $exam222               = $_POST['exam222'];
        $exam223               = $_POST['exam223'];
        $exam224               = $_POST['exam224'];
        $exam225               = $_POST['exam225'];
        $regional  = $_POST['regional'];


        $TITU7= '<table class="table table-bordered" width="100%"><tr th aling="center"> <th><B> <H4 aling="center"> EXAMEN FISICO REGIONAL</H4></B></th></tr></table>';

             $Ex1= '<table table-bordered" width="100%"><tr><td><h6>'.$exam1.'</h6></td>'; 
             $Ex2= '<td><h6>Normal:'.$exam2.'</h6></td>'; 
             $Ex3= '<td><h6>Anormal:'.$exam3.'</h6></td>'; 
             $Ex4= '<td><h6>No aplica:'.$exam4.'</h6></td>'; 
             $Ex5= '<td><h6>'.$exam5.'</h6></td></tr>'; 
             $Ex6= '<tr><td><h6>'.$exam6.'</h6></td>';
             $Ex7= '<td><h6>Si:'.$exam7.'</h6></td>'; 
             $Ex8= '<td><h6>No:'.$exam8.'</h6></td>';
             $Ex9= '<td><h6>No aplica:'.$exam9.'</h6></td>'; 
             $Ex10= '<td><h6>'.$exam10.'</h6></td></tr>'; 
             $Ex11= '<tr><td><h6>'.$exam11.'</h6></td>'; 
             $Ex12= '<td><h6>Normal:'.$exam12.'</h6></td>'; 
             $Ex13= '<td><h6>Anormal:'.$exam13.'</h6></td>'; 
             $Ex14= '<td><h6>No aplica:'.$exam14.'</h6></td>'; 
             $Ex15= '<td><h6>'.$exam15.'</h6></td></tr>'; 
             $Ex16= '<tr><td><h6>'.$exam16.'</h6></td>'; 
             $Ex17= '<td><h6>Normal:'.$exam17.'</h6></td>'; 
             $Ex18= '<td><h6>Anormal:'.$exam18.'</h6></td>'; 
             $Ex19= '<td><h6>No aplica:'.$exam19.'</h6></td>'; 
             $Ex20= '<td><h6>'.$exam20.'</h6></td></tr>'; 
             $Ex21= '<tr><td><h6>'.$exam21.'</h6></td>'; 
             $Ex22= '<td><h6>Normal:'.$exam22.'</h6></td>'; 
             $Ex23= '<td><h6>Anormal:'.$exam23.'</h6></td>'; 
             $Ex24= '<td><h6>No aplica:'.$exam24.'</h6></td>'; 
             $Ex25= '<td><h6>'.$exam25.'</h6></td></tr>'; 
             $Ex26= '<tr><td><h6>'.$exam26.'</h6></td>'; 
             $Ex27= '<td><h6>Normal:'.$exam27.'</h6></td>'; 
             $Ex28= '<td><h6>Anormal:'.$exam28.'</h6></td>'; 
             $Ex29= '<td><h6>No aplica:'.$exam29.'</h6></td>'; 
             $Ex30= '<td><h6>'.$exam30.'</h6></td></tr>'; 
             $Ex31= '<tr><td><h6>'.$exam31.'</h6></td>'; 
             $Ex32= '<td><h6>Normal:'.$exam32.'</h6></td>'; 
             $Ex33= '<td><h6>Anormal:'.$exam33.'</h6></td>'; 
             $Ex34= '<td><h6>No aplica:'.$exam34.'</h6></td>'; 
             $Ex35= '<td><h6>'.$exam35.'</h6></td></tr>'; 
             $Ex36= '<tr><td><h6>'.$exam36.'</h6></td>'; 
             $Ex37= '<td><h6>Normal:'.$exam37.'</h6></td>'; 
             $Ex38= '<td><h6>Anormal:'.$exam38.'</h6></td>'; 
             $Ex39= '<td><h6>No aplica:'.$exam39.'</h6></td>'; 
             $Ex40= '<td><h6>'.$exam40.'</h6></td></tr>'; 
             $Ex41= '<tr><td><h6>'.$exam41.'</h6></td>'; 
             $Ex42= '<td><h6>Normal:'.$exam42.'</h6></td>'; 
             $Ex43= '<td><h6>Anormal:'.$exam43.'</h6></td>'; 
             $Ex44= '<td><h6>No aplica:'.$exam44.'</h6></td>';
             $Ex45= '<td><h6>'.$exam45.'</h6></td></tr>'; 
             $Ex46= '<tr><td><h6>'.$exam46.'</h6></td>'; 
             $Ex47= '<td><h6>Normal:'.$exam47.'</h6></td>'; 
             $Ex48= '<td><h6>Anormal:'.$exam48.'</h6></td>'; 
             $Ex49= '<td><h6>No aplica:'.$exam49.'</h6></td>'; 
             $Ex50= '<td><h6>'.$exam50.'</h6></td></tr>'; 
             $Ex51= '<tr><td><h6>'.$exam51.'</h6></td>'; 
             $Ex52= '<td><h6>Normal:'.$exam52.'</h6></td>';
             $Ex53= '<td><h6>Anormal:'.$exam53.'</h6></td>'; 
             $Ex54= '<td><h6>No aplica:'.$exam54.'</h6></td>'; 
             $Ex55= '<td><h6>'.$exam55.'</h6></td></tr>'; 
             $Ex56= '<tr><td><h6>'.$exam56.'</h6></td>'; 
             $Ex57= '<td><h6>Normal:'.$exam57.'</h6></td>'; 
             $Ex58= '<td><h6>Anormal:'.$exam58.'</h6></td>'; 
             $Ex59= '<td><h6>No aplica:'.$exam59.'</h6></td>'; 
             $Ex60= '<td><h6>'.$exam60.'</h6></td></tr>';
             $Ex61= '<tr><td><h6>'.$exam61.'</h6></td>'; 
             $Ex62= '<td><h6>Normal:'.$exam62.'</h6></td>'; 
             $Ex63= '<td><h6>Anormal:'.$exam63.'</h6></td>'; 
             $Ex64= '<td><h6>No aplica:'.$exam64.'</h6></td>'; 
             $Ex65= '<td><h6>'.$exam65.'</h6></td></tr>'; 
             $Ex66= '<tr><td><h6>'.$exam66.'</h6></td>'; 
             $Ex67= '<td><h6>Normal:'.$exam67.'</h6></td>'; 
             $Ex68= '<td><h6>Anormal:'.$exam68.'</h6></td>';
             $Ex69= '<td><h6>No aplica:'.$exam69.'</h6></td>'; 
             $Ex70= '<td><h6>'.$exam70.'</h6></td></tr>'; 
             $Ex71= '<tr><td><h6>'.$exam71.'</h6></td>'; 
             $Ex72= '<td><h6>Normal:'.$exam72.'</h6></td>'; 
             $Ex73= '<td><h6>Anormal:'.$exam73.'</h6></td>'; 
             $Ex74= '<td><h6>No aplica:'.$exam74.'</h6></td>'; 
             $Ex75= '<td><h6>'.$exam75.'</h6></td></tr>'; 
             $Ex76= '<tr><td><h6>'.$exam76.'</h6></td>';
             $Ex77= '<td><h6>Normal:'.$exam77.'</h6></td>'; 
             $Ex78= '<td><h6>Anormal:'.$exam78.'</h6></td>'; 
             $Ex79= '<td><h6>No aplica:'.$exam79.'</h6></td>'; 
             $Ex80= '<td><h6>'.$exam80.'</h6></td></tr>'; 
             $Ex81= '<tr><td><h6>'.$exam81.'</h6></td>'; 
             $Ex82= '<td><h6>Normal:'.$exam82.'</h6></td>'; 
             $Ex83= '<td><h6>Anormal:'.$exam83.'</h6></td>'; 
             $Ex84= '<td><h6>No aplica:'.$exam84.'</h6></td>';
             $Ex85= '<td><h6>'.$exam85.'</h6></td></tr>'; 
             $Ex86= '<tr><td><h6>'.$exam86.'</h6></td>'; 
             $Ex87= '<td><h6>Normal:'.$exam87.'</h6></td>'; 
             $Ex88= '<td><h6>Anormal:'.$exam88.'</h6></td>'; 
             $Ex89= '<td><h6>No aplica:'.$exam89.'</h6></td>'; 
             $Ex90= '<td><h6>'.$exam90.'</h6></td></tr>'; 
             $Ex91= '<tr><td><h6>'.$exam91.'</h6></td>'; 
             $Ex92= '<td><h6>Normal:'.$exam92.'</h6></td>';
             $Ex93= '<td><h6>Anormal:'.$exam93.'</h6></td>'; 
             $Ex94= '<td><h6>No aplica:'.$exam94.'</h6></td>'; 
             $Ex95= '<td><h6>'.$exam95.'</h6></td></tr>'; 
             $Ex96= '<tr><td><h6>'.$exam96.'</h6></td>'; 
             $Ex97= '<td><h6>Normal:'.$exam97.'</h6></td>'; 
             $Ex98= '<td><h6>Anormal:'.$exam98.'</h6></td>'; 
             $Ex99= '<td><h6>No aplica:'.$exam99.'</h6></td>'; 
             $Ex100= '<td><h6>'.$exam100.'</h6></td></tr>';
             $Ex101= '<tr><td><h6>'.$exam101.'</h6></td>'; 
             $Ex102= '<td><h6>Normal:'.$exam102.'</h6></td>'; 
             $Ex103= '<td><h6>Anormal:'.$exam103.'</h6></td>'; 
             $Ex104= '<td><h6>No aplica:'.$exam104.'</h6></td>'; 
             $Ex105= '<td><h6>'.$exam105.'</h6></td></tr>'; 
             $Ex106= '<tr><td><h6>'.$exam106.'</h6></td>'; 
             $Ex107= '<td><h6>Normal:'.$exam107.'</h6></td>'; 
             $Ex108= '<td><h6>Anormal:'.$exam108.'</h6></td>';
             $Ex109= '<td><h6>No aplica:'.$exam109.'</h6></td>'; 
             $Ex110= '<td><h6>'.$exam110.'</h6></td></tr>'; 
             $Ex111= '<tr><td><h6>'.$exam111.'</h6></td>'; 
             $Ex112= '<td><h6>Normal:'.$exam112.'</h6></td>'; 
             $Ex113= '<td><h6>Anormal:'.$exam113.'</h6></td>'; 
             $Ex114= '<td><h6>No aplica:'.$exam114.'</h6></td>'; 
             $Ex115= '<td><h6>'.$exam115.'</h6></td></tr>'; 
             $Ex116= '<tr><td><h6>'.$exam116.'</h6></td>';
             $Ex117= '<td><h6>Normal:'.$exam117.'</h6></td>'; 
             $Ex118= '<td><h6>Anormal:'.$exam118.'</h6></td>'; 
             $Ex119= '<td><h6>No aplica:'.$exam119.'</h6></td>'; 
             $Ex120= '<td><h6>'.$exam120.'</h6></td></tr>'; 
             $Ex121= '<tr><td><h6>'.$exam121.'</h6></td>'; 
             $Ex122= '<td><h6>Normal:'.$exam122.'</h6></td>'; 
             $Ex123= '<td><h6>Anormal:'.$exam123.'</h6></td>'; 
             $Ex124= '<td><h6>No aplica:'.$exam124.'</h6></td>';
             $Ex125= '<td><h6>'.$exam125.'</h6></td></tr>'; 
             $Ex126= '<tr><td><h6>'.$exam126.'</h6></td>'; 
             $Ex127= '<td><h6>Normal:'.$exam127.'</h6></td>'; 
             $Ex128= '<td><h6>Anormal:'.$exam128.'</h6></td>'; 
             $Ex129= '<td><h6>No aplica:'.$exam129.'</h6></td>'; 
             $Ex130= '<td><h6>'.$exam130.'</h6></td></tr>'; 
             $Ex131= '<tr><td><h6>'.$exam131.'</h6></td>'; 
             $Ex132= '<td><h6>Normal:'.$exam132.'</h6></td>'; 
             $Ex133= '<td><h6>Anormal:'.$exam133.'</h6></td>';
             $Ex134= '<td><h6>No aplica:'.$exam134.'</h6></td>'; 
             $Ex135= '<td><h6>'.$exam135.'</h6></td></tr>'; 
             $Ex136= '<tr><td><h6>'.$exam136.'</h6></td>'; 
             $Ex137= '<td><h6>Normal:'.$exam137.'</h6></td>'; 
             $Ex138= '<td><h6>Anormal:'.$exam138.'</h6></td>'; 
             $Ex139= '<td><h6>No aplica:'.$exam139.'</h6></td>'; 
             $Ex140= '<td><h6>'.$exam140.'</h6></td></tr>'; 
             $Ex141= '<tr><td><h6>'.$exam141.'</h6></td>';
             $Ex142= '<td><h6>Normal:'.$exam142.'</h6></td>';
             $Ex143= '<td><h6>Anormal:'.$exam143.'</h6></td>'; 
             $Ex144= '<td><h6>No aplica:'.$exam144.'</h6></td>'; 
             $Ex145= '<td><h6>'.$exam145.'</h6></td></tr>'; 
             $Ex146= '<tr><td><h6>'.$exam146.'</h6></td>'; 
             $Ex147= '<td><h6>Normal:'.$exam147.'</h6></td>'; 
             $Ex148= '<td><h6>Anormal:'.$exam148.'</h6></td>'; 
             $Ex149= '<td><h6>No aplica:'.$exam149.'</h6></td>'; 
             $Ex150= '<td><h6>'.$exam150.'</h6></td></tr>';
             $Ex151= '<tr><td><h6>'.$exam151.'</h6></td>';
             $Ex152= '<td><h6>Normal:'.$exam152.'</h6></td>'; 
             $Ex153= '<td><h6>Anormal:'.$exam153.'</h6></td>'; 
             $Ex154= '<td><h6>No aplica:'.$exam154.'</h6></td>'; 
             $Ex155= '<td><h6>'.$exam155.'</h6></td></tr>'; 
             $Ex156= '<tr><td><h6>'.$exam156.'</h6></td>'; 
             $Ex157= '<td><h6>Normal:'.$exam157.'</h6></td>'; 
             $Ex158= '<td><h6>Anormal:'.$exam158.'</h6></td>'; 
             $Ex159= '<td><h6>No aplica:'.$exam159.'</h6></td>';
             $Ex160= '<td><h6>'.$exam160.'</h6></td></tr>';
             $Ex161= '<tr><td><h6>'.$exam161.'</h6></td>'; 
             $Ex162= '<td><h6>Normal:'.$exam162.'</h6></td>'; 
             $Ex163= '<td><h6>Anormal:'.$exam163.'</h6></td>'; 
             $Ex164= '<td><h6>No aplica:'.$exam164.'</h6></td>'; 
             $Ex165= '<td><h6>'.$exam165.'</h6></td></tr>'; 
             $Ex166= '<tr><td><h6>'.$exam166.'</h6></td>'; 
             $Ex167= '<td><h6>Normal:'.$exam167.'</h6></td>'; 
             $Ex168= '<td><h6>Anormal:'.$exam168.'</h6></td>';
             $Ex169= '<td><h6>No aplica:'.$exam169.'</h6></td>';
             $Ex170= '<td><h6>'.$exam170.'</h6></td></tr>'; 
             $Ex171= '<tr><td><h6>'.$exam171.'</h6></td>'; 
             $Ex172= '<td><h6>Normal:'.$exam172.'</h6></td>'; 
             $Ex173= '<td><h6>Anormal:'.$exam173.'</h6></td>'; 
             $Ex174= '<td><h6>No aplica:'.$exam174.'</h6></td>'; 
             $Ex175= '<td><h6>'.$exam175.'</h6></td></tr>'; 
             $Ex176= '<tr><td><h6>'.$exam176.'</h6></td>'; 
             $Ex177= '<td><h6>Normal:'.$exam177.'</h6></td>';
             $Ex178= '<td><h6>Anormal:'.$exam178.'</h6></td>';
             $Ex179= '<td><h6>No aplica:'.$exam179.'</h6></td>'; 
             $Ex180= '<td><h6>'.$exam180.'</h6></td></tr>'; 
             $Ex181= '<tr><td><h6>'.$exam181.'</h6></td>'; 
             $Ex182= '<td><h6>Normal:'.$exam182.'</h6></td>'; 
             $Ex183= '<td><h6>Anormal:'.$exam183.'</h6></td>'; 
             $Ex184= '<td><h6>No aplica:'.$exam184.'</h6></td>'; 
             $Ex185= '<td><h6>'.$exam185.'</h6></td></tr>'; 
             $Ex186= '<tr><td><h6>'.$exam186.'</h6></td>';
             $Ex187= '<td><h6>Normal:'.$exam187.'</h6></td>';
             $Ex188= '<td><h6>Anormal:'.$exam188.'</h6></td>'; 
             $Ex189= '<td><h6>No aplica:'.$exam189.'</h6></td>'; 
             $Ex190= '<td><h6>'.$exam190.'</h6></td></tr>'; 
             $Ex191= '<tr><td><h6>'.$exam191.'</h6></td>'; 
             $Ex192= '<td><h6>Normal:'.$exam192.'</h6></td>'; 
             $Ex193= '<td><h6>Anormal:'.$exam193.'</h6></td>'; 
             $Ex194= '<td><h6>No aplica:'.$exam194.'</h6></td>'; 
             $Ex195= '<td><h6>'.$exam195.'</h6></td></tr>';
             $Ex196= '<tr><td><h6>'.$exam196.'</h6></td>';
             $Ex197= '<td><h6>Normal:'.$exam197.'</h6></td>'; 
             $Ex198= '<td><h6>Anormal:'.$exam198.'</h6></td>'; 
             $Ex199= '<td><h6>No aplica:'.$exam199.'</h6></td>'; 
             $Ex200= '<td><h6>'.$exam200.'</h6></td></tr>'; 
             $Ex201= '<tr><td><h6>'.$exam201.'</h6></td>'; 
             $Ex202= '<td><h6>Normal:'.$exam202.'</h6></td>'; 
             $Ex203= '<td><h6>Anormal:'.$exam203.'</h6></td>'; 
             $Ex204= '<td><h6>No aplica:'.$exam204.'</h6></td>';
             $Ex205= '<td><h6>'.$exam205.'</h6></td></tr>'; 
             $Ex206= '<tr><td><h6>'.$exam206.'</h6></td>'; 
             $Ex207= '<td><h6>Normal:'.$exam207.'</h6></td>'; 
             $Ex208= '<td><h6>Anormal:'.$exam208.'</h6></td>'; 
             $Ex209= '<td><h6>No aplica:'.$exam209.'</h6></td>';
             $Ex210= '<td><h6>'.$exam210.'</h6></td></tr>'; 
             $Ex211= '<tr><td><h6>'.$exam211.'</h6></td>'; 
             $Ex212= '<td><h6>Si:'.$exam212.'</h6></td>'; 
             $Ex213= '<td><h6>No:'.$exam213.'</h6></td>'; 
             $Ex214= '<td><h6>No aplica:'.$exam214.'</h6></td>';
             $Ex215= '<td><h6>'.$exam215.'</h6></td></tr>'; 
             $Ex216= '<tr><td><h6>'.$exam216.'</h6></td>'; 
             $Ex217= '<td><h6>Normal:'.$exam217.'</h6></td>'; 
             $Ex218= '<td><h6>Anormal:'.$exam218.'</h6></td>'; 
             $Ex219= '<td><h6>No aplica:'.$exam219.'</h6></td>';
             $Ex220= '<td><h6>'.$exam220.'</h6></td>/tr>';
             $Ex221= '<tr><td><h6>'.$exam221.'</h6></td>'; 
             $Ex222= '<td><h6>Si:'.$exam222.'</h6></td>';
             $Ex223= '<td><h6>No:'.$exam223.'</h6></td>';
             $Ex224= '<td><h6>No aplica:'.$exam224.'</h6></td>';
             $Ex225= '<td><h6>'.$exam225.'</h6></td></tr>';
             $Ex226= '<tr><td><h6>'.$regional.'</h6></td></tr></table>';


$exaregional=$TITU7.$Ex1.$Ex2.$Ex3.$Ex4.$Ex5.$Ex6.$Ex7.$Ex8.$Ex9.$Ex10.$Ex11.$Ex12.$Ex13.$Ex14.$Ex15.$Ex16.$Ex17.$Ex18.$Ex19.$Ex20.$Ex21.$Ex22.$Ex23.$Ex24.$Ex25.$Ex26.$Ex27.$Ex28.$Ex29.$Ex30.$Ex31.$Ex32.$Ex33.$Ex34.$Ex35.$Ex36.$Ex37.$Ex38.$Ex39.$Ex40.$Ex41.$Ex42.$Ex43.$Ex44.$Ex45.$Ex46.$Ex47.$Ex48.$Ex49.$Ex50.$Ex51.$Ex52.$Ex53.$Ex54.$Ex55.$Ex56.$Ex57.$Ex58.$Ex59.$Ex60.$Ex61.$Ex62.$Ex63.$Ex64.$Ex65.$Ex66.$Ex67.$Ex68.$Ex69.$Ex70.$Ex71.$Ex72.$Ex73.$Ex74.$Ex75.$Ex76.$Ex77.$Ex78.$Ex79.$Ex80.$Ex81.$Ex82.$Ex83.$Ex84.$Ex85.$Ex86.$Ex87.$Ex88.$Ex89.$Ex90.$Ex91.$Ex92.$Ex93.$Ex94.$Ex95.$Ex96.$Ex97.$Ex98.$Ex99.$Ex100.$Ex101.$Ex102.$Ex103.$Ex104.$Ex105.$Ex106.$Ex107.$Ex108.$Ex109.$Ex110.$Ex111.$Ex112.$Ex113.$Ex114.$Ex115.$Ex116.$Ex117.$Ex118.$Ex119.$Ex120.$Ex121.$Ex122.$Ex123.$Ex124.$Ex125.$Ex126.$Ex127.$Ex128.$Ex129.$Ex130.$Ex131.$Ex132.$Ex133.$Ex134.$Ex135.$Ex136.$Ex137.$Ex138.$Ex139.$Ex140.$Ex141.$Ex142.$Ex143.$Ex144.$Ex145.$Ex146.$Ex147.$Ex148.$Ex149.$Ex150.$Ex151.$Ex152.$Ex153.$Ex154.$Ex155.$Ex156.$Ex157.$Ex158.$Ex159.$Ex160.$Ex161.$Ex162.$Ex163.$Ex164.$Ex165.$Ex166.$Ex167.$Ex168.$Ex169.$Ex170.$Ex171.$Ex172.$Ex173.$Ex174.$Ex175.$Ex176.$Ex177.$Ex178.$Ex179.$Ex180.$Ex181.$Ex182.$Ex183.$Ex184.$Ex185.$Ex186.$Ex187.$Ex188.$Ex189.$Ex190.$Ex191.$Ex192.$Ex193.$Ex194.$Ex195.$Ex196.$Ex197.$Ex198.$Ex199.$Ex200.$Ex201.$Ex202.$Ex203.$Ex204.$Ex205.$Ex206.$Ex207.$Ex208.$Ex209.$Ex210.$Ex211.$Ex212.$Ex213.$Ex214.$Ex215.$Ex216.$Ex217.$Ex218.$Ex219.$Ex220.$Ex221.$Ex222.$Ex223.$Ex224.$Ex225.$Ex226;  

 
        $ciclo                  = $_POST['ciclo'];
        $numerodias             = $_POST['numerodias'];
        $fum                    = $_POST['fum'];
        $vidasexual             = $_POST['vidasexual'];
        $planificacion          = $_POST['planificacion'];
        $metodo                 = $_POST['metodo'];
        $gesta                  = $_POST['gesta'];
        $parto                  = $_POST['parto'];
        $cesarea                = $_POST['cesarea'];
        $abortos                = $_POST['abortos'];
        $malformacion           = $_POST['malformacion'];
        $hijosvivos             = $_POST['hijosvivos'];
        $hijosmuertos           = $_POST['hijosmuertos'];
        $embarazosecto          = $_POST['embarazosecto'];
        $edadmenarca            = $_POST['edadmenarca'];
        $edadmeno               = $_POST['edadmeno'];
        $dmo                    = $_POST['dmo'];
        $ultimacito             = $_POST['ultimacito'];
        $ultcitotiem            = $_POST['ultcitotiem'];
        $ultcitores             = $_POST['ultcitores'];
        $ecomamario             = $_POST['ecomamario'];
        $ecomamatie             = $_POST['ecomamatie'];
        $ecomamariores          = $_POST['ecomamariores'];
        $colposcopia            = $_POST['colposcopia'];
        $colpostiem             = $_POST['colpostiem'];
        $colposresul            = $_POST['colposresul'];
        $mamografia             = $_POST['mamografia'];
        $mamotiemp              = $_POST['mamotiemp'];
        $mamoresul              = $_POST['mamoresul'];
        $observacionG           = $_POST['observacionG'];


 $TITUL20= '<table class="table table-bordered" width="100%"><tr th aling="center"> <th><B> <H4 aling="center"> ANTECEDENTES GINECO-OSTÉTRICOS</H4></B></th></tr></table>';
             $Vg1= '<table table-bordered" width="100%"><tr><td><h6>Ciclo mestrual:'.$ciclo.'</h6></td>';
             $Vg2= '<td><h6>Numero de dias:'.$numerodias.'</h6></td>';
             $Vg3= '<td><h6>FUM:'.$fum.'</h6></td></tr>';
             $Vg4= '<tr><td><h6>Vida Sexual Activa:'.$vidasexual.'</h6></td>';
             $Vg5= '<td><h6>Planificación Familiar:'.$planificacion.'</h6></td>';
             $Vg6= '<td><h6>Método:'.$metodo.'</h6></td></tr>';
             $Vg7= '<tr><td><h6>Gestaciones:'.$gesta.'</h6></td>';
             $Vg8= '<td><h6>Partos:'.$parto.'</h6></td>';
             $Vg9= '<td><h6>Cesáreas:'.$cesarea.'</h6></td></tr>';
             $Vg10= '<tr><td><h6>Abortos:'.$abortos.'</h6></td>';
             $Vg11= '<td><h6>Hijos con Malformación:'.$malformacion.'</h6></td>';
             $Vg12= '<td><h6>Hijos vivos:'.$hijosvivos.'</h6></td></tr>';
             $Vg13= '<tr><td><h6>Hijos muertos:'.$hijosmuertos.'</h6></td>';
             $Vg14= '<td><h6>Embarazos ectópicos:'.$embarazosecto.'</h6></td>';
             $Vg15= '<td><h6>Edad Menarca:'.$edadmenarca.'</h6></td></tr>';
             $Vg16= '<tr><td><h6>Edad Menopausia:'.$edadmeno.'</h6></td>';
             $Vg17= '<td><h6>dmo:'.$dmo.'</h6></td></tr>';
             $Vg18= '<tr><td><h6>Última Citologia:'.$ultimacito.'</h6></td>';
             $Vg19= '<td><h6>Última Citologia(Tiempo):'.$ultcitotiem.'</h6></td>';
             $Vg20= '<td><h6>Última Citologia(Resultado):'.$ultcitores.'</h6></td></tr>';
             $Vg21= '<tr><td><h6>Eco Mamario:'.$ecomamario.'</h6></td>';
             $Vg22= '<td><h6>Eco Mamario(Tiempo):'.$ecomamatie.'</h6></td>';
             $Vg23= '<td><h6>Eco Mamario(Resultado):'.$ecomamariores.'</h6></td></tr>';
             $Vg24= '<tr><td><h6>Colposcopia:'.$colposcopia.'</h6></td>';
             $Vg25= '<td><h6>Colposcopia(Tiempo):'.$colpostiem.'</h6></td>';
             $Vg26= '<td><h6>Colposcopia(Resultado):'.$colposresul.'</h6></td></tr>';
             $Vg27= '<tr><td><h6>Mamografia:'.$mamografia.'</h6></td>';
             $Vg28= '<td><h6>Mamografia(Tiempo):'.$mamotiemp.'</h6></td>';
             $Vg29= '<td><h6>Mamografia(Resultado):'.$mamoresul.'</h6></td></tr></table>';
             $Vg30=  '<table><tr><td><h6>'.$observacionG.'</h6></td></tr></table>'; 



 $antedentesgine=$TITUL20.$Vg1.$Vg2.$Vg3.$Vg4.$Vg5.$Vg6.$Vg7.$Vg8.$Vg9.$Vg10.$Vg11.$Vg12.$Vg13.$Vg14.$Vg15.$Vg16.$Vg17.$Vg18.$Vg19.$Vg20.$Vg21.$Vg22.$Vg23.$Vg24.$Vg25.$Vg26.$Vg27.$Vg28.$Vg29.$Vg30;


 $vacunasinte           = $_POST['vacunasinte'];

 $TITU21= '<table class="table table-bordered" width="100%"><tr th aling="center"> <th><B> <H4 aling="center">INMUNIZACIONES</H4></B></th></tr>';
$VC1= '<tr><td><h6>'.$vacunasinte.'</h6></td></tr></table>';   

$vacunante=$TITU21.$VC1;



           $historia_vacunacion = '<table class="table table-bordered" width="100%"><tr th aling="center"> <th><B> <H4 aling="center">HISTORIAL DE VACUNAS</H4></B></th></tr>';
    foreach ($_POST['Vacunacion'] as $clave=>$value)
    {
        $contador='0';
        $historia_vacunacion .= '<tr>';
        foreach ($value as $clave=>$value)
        {
            $contador++;
            if($contador == 4){$historia_vacunacion .= '</tr><tr><td>'.$clave.'</td><td>'.$value.'</td>';}
            else{$historia_vacunacion .= '<td>'.$clave.'</td><td>'.$value.'</td>';}
            
        }
        $historia_vacunacion .= '</tr>';
    }

    $historia_vacunacion.='</table>';

    $historialvacu = $historia_vacunacion;


           $alcohol                 = $_POST['alcohol'];
           $frecuencia_con          = $_POST['frecuencia_con'];
           $tiempo_alcohol          = $_POST['tiempo_alcohol'];
           $cantidad_alcohol        = $_POST['cantidad_alcohol'];
           $canti_descr             = $_POST['canti_descr'];
           $estado_cigarro          = $_POST['estado_cigarro'];
           $frecuencia_cigarro      = $_POST['frecuencia_cigarro'];
           $tiempo_cigarro          = $_POST['tiempo_cigarro'];
           $frecuencia_con          = $_POST['frecuencia_con'];
           $tiempo_alcohol          = $_POST['tiempo_alcohol'];
           $cantidad_cigarro        = $_POST['cantidad_cigarro'];
           $cantid_result           = $_POST['cantid_result'];
           $estado_sustancias       = $_POST['estado_sustancias'];
           $sustan                  = $_POST['sustan'];
           $frecuencia_sustancia    = $_POST['frecuencia_sustancia'];
           $tiempo_sustancia        = $_POST['tiempo_sustancia'];
           

        $TITU23= '<table class="table table-bordered" width="100%"><tr th aling="center"> <th><B> <H4 aling="center"HÁBITOS</H4></B></th></tr>';
        $Vha1= '<table table-bordered" width="100%"><tr><td><h6>Consumo de Alcohol</h6></td></tr>'; 
        $Vha2= '<tr><td><h6>Estado:'.$alcohol.'</h6></td>';
        $Vha3= '<td><h6>Frecuencia de Consumo:'.$frecuencia_con.'</h6></td>';
        $Vha4= '<td><h6>Tiempo:'.$tiempo_alcohol.'</h6></td></tr>';
        $Vha5= '<tr><td><h6>Cantidad:'.$cantidad_alcohol.'</h6></td>';
        $Vha6= '<td><h6>Cantidad descripción:'.$canti_descr.'</h6></td></tr>';
        $Vha7= '<table table-bordered" width="100%"><tr><td><h6>Consumo de Cigarrillo</h6></td></tr>'; 
        $Vha8= '<tr><td><h6>Estado:'.$estado_cigarro.'</h6></td>';
        $Vha9= '<td><h6>Frecuencia de Consumo:'.$frecuencia_cigarro.'</h6></td>';
        $Vha10= '<td><h6>Tiempo:'.$tiempo_cigarro.'</h6></td></tr>';
        $Vha11= '<tr><td><h6>Cantidad:'.$cantidad_cigarro.'</h6></td>';
        $Vha12= '<td><h6>Cantidad descripción:'.$cantid_result.'</h6></td></tr>';
        $Vha13= '<table table-bordered" width="100%"><tr><td><h6>Consumo de sustabcias psicotrópicas</h6></td></tr>'; 
        $Vha14= '<tr><td><h6>Estado:'.$estado_sustancias.'</h6></td>';
        $Vha15= '<td><h6>Sustancia:'.$sustan.'</h6></td>';
        $Vha16= '<td><h6>Frecuencia de Consumo:'.$frecuencia_sustancia.'</h6></td>';
        $Vha17= '<td><h6>Tiempo:'.$tiempo_sustancia.'</h6></td></tr></table>';   

     $habitos=$TITU22.$Vha1.$Vha2.$Vha3.$Vha4.$Vha5.$Vha6.$Vha7.$Vha8.$Vha9.$Vha10.$Vha11.$Vha12.$Vha13.$Vha14.$Vha15.$Vha16.$Vha17;



////////////////////////////////////////LABORATORIOS//////////////////////////////////////////////////

$hematologia = $_POST['hematologia'];
foreach ($hematologia as $e) {$hematologia_final .= $e.'|';}

$drogasabuso = $_POST['drogasabuso'];
foreach ($drogasabuso as $e) {$drogasabuso_final .= $e.'|';}

$serologia = $_POST['serologia'];
foreach ($serologia as $e) {$serologia_final .= $e.'|';}

$autoinmunidad = $_POST['autoinmunidad'];
foreach ($autoinmunidad as $e) {$autoinmunidad_final .= $e.'|';}

$coproanalisis = $_POST['coproanalisis'];
foreach ($coproanalisis as $e) {$coproanalisis_final .= $e.'|';}

$coagulacion = $_POST['coagulacion'];
foreach ($coagulacion as $e) {$coagulacion_final .= $e.'|';}

$enzimas = $_POST['enzimas'];
foreach ($enzimas as $e) {$enzimas_final .= $e.'|';}

$biologiamolecular = $_POST['biologiamolecular'];
foreach ($biologiamolecular as $e) {$biologiamolecular_final .= $e.'|';}

$electro = $_POST['electro'];
foreach ($electro as $e) {$electro_final .= $e.'|';}

$anticuerpos = $_POST['anticuerpos'];
foreach ($anticuerpos as $e) {$anticuerpos_final .= $e.'|';}

$bacteriologia = $_POST['bacteriologia'];
foreach ($bacteriologia as $e) {$bacteriologia_final .= $e.'|';}

$quimica = $_POST['quimica'];
foreach ($quimica as $e) {$quimica_final .= $e.'|';}

$marcadores = $_POST['marcadores'];
foreach ($marcadores as $e) {$marcadores_final .= $e.'|';}

$drogas = $_POST['drogas'];
foreach ($drogas as $e) {$drogas_final .= $e.'|';}

$pruebashor = $_POST['pruebashor'];
foreach ($pruebashor as $e) {$pruebashor_final .= $e.'|';}

$inmuno = $_POST['inmuno'];
foreach ($inmuno as $e) {$inmuno_final .= $e.'|';}

$orina = $_POST['orina'];
foreach ($orina as $e) {$orina_final .= $e.'|';}

$patologia = $_POST['patologia'];
foreach ($patologia as $e) {$patologia_final .= $e.'|';}

$otrosexa = $_POST['otrosexa'];
foreach ($otrosexa as $e) {$otrosexa_final .= $e.'|';}

$otros_laboratorios= reem($_POST['otros_laboratorios']);
if ($otros_laboratorios <>'') {$otros_laboratorios=reem($_POST['otros_laboratorios']);
$otros_laboratorios=str_replace("\r","<br>",$otros_laboratorios);}


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

             $VV6= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"><tr><td><h6>NOMBRE PACIENTE<br>'.$nombre_cliente.'</h6></td>';
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
        }

   
        $ante2                 = $_POST['ante2'];
         if ($ante2 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FÓRMULA LEUCOCITARIA MANUAL');");
        }
        $ante3                 = $_POST['ante3'];
         if ($ante3 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HEMATOCRITO/HEMOGLOBINA');");
        }
        $ante4                 = $_POST['ante4'];
        if ($ante4 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','SEDIMENTACIÓN(VSG)');");
        }

        $ante5                 = $_POST['ante5'];

if ($ante5 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','RETICULOCITOS');");
        }


        $ante6                 = $_POST['ante6'];
        if ($ante6 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HEMATOZOARIO');");
        }

        $ante7                = $_POST['ante7'];
         if ($ante7 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','TRANSFERRINA');");
        }

        $ante8                 = $_POST['ante8'];

        if ($ante8 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','SATURACIÓN DE TRANSFERENCIA');");
        }


        $ante9                = $_POST['ante9'];

         if ($ante9 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','COOMBOS DIRECTO');");
        }

        $ante10                 = $_POST['ante10'];
 if ($ante10<> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','GRUPO SANGUINEO');");
        }

        $ante11                 = $_POST['ante11'];

        if ($ante11<> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','INV. DREPANOCITOS');");
        }
 ////////////////UROANALISIS

        $ante12                 = $_POST['ante12'];

        if ($ante12 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HIERRO SÉRICO');");
        }

        $ante13                 = $_POST['ante13'];

         if ($ante13 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FERRETINA');");
        }


        $ante14                 = $_POST['ante14'];

if ($ante14 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','VITAMINA B12');");
        }


        $ante15                 = $_POST['ante15'];

        if ($ante15 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ÁCIDO FÓLICO');");
        }

////////////////MARCADORES

        $ante16                 = $_POST['ante16'];
 if ($ante16 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','WESTERGREEN');");
        }

        $ante17                 = $_POST['ante17'];
if ($ante17 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CÉLULAS LE');");
        }

        $ante18                 = $_POST['ante18'];
if ($ante18 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','COOMBOS INDIRECTO');");
        }


        $ante19                 = $_POST['ante19'];

        if ($ante19 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','COCAINA');");
        }

 ////////////////COPOROLOGICO
        $ante20                = $_POST['ante20'];
 if ($ante20 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','MARIHUANA');");
        }


        $ante21                = $_POST['ante21'];

if ($ante21 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PANEL 6 DROGRAS (COC,ANF,MAR,EXT,OPI,BZO)');");
        }




        $ante22                = $_POST['ante22'];
if ($ante22 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PANEL 10 DROGAS (ANF, BAR, BZO,COC,MAR,MET,METAN,OPI,FEN,ANTIDEP)');");
        }


        $ante23                 = $_POST['ante23'];
        if ($ante23 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ALCOHOL ETÍLICO EN SALIVA');");
        }


        $ante24                 = $_POST['ante24'];

         if ($ante24 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ALCOHOL ETÍLICO EN SANGRE');");
        }

 ////////////////QUIMICA SANGUINEA
        $ante25                 = $_POST['ante25'];

         if ($ante25 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PRC CUANTITATIVO');");
        }

        $ante26                  = $_POST['ante26'];

if ($ante26 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ASTO CUANTITIVO');");
        }

        $ante27                 = $_POST['ante27'];

if ($ante27 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FR(LÁTEX) CUALITATIVO');");
        }

        $ante28                 = $_POST['ante28'];
        if ($ante28 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FR CUANTITATIVO');");
        }

        $ante29                 = $_POST['ante29'];
        if ($ante29 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CITRULINA (ANTI CCP)');");
        }


        $ante30                 = $_POST['ante30'];

         if ($ante30 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','V.D.R.L');");
        }

        $ante31                = $_POST['ante31'];

   if ($ante31 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','AGLUTINACIONES FEBRILES');");
        }
        


        $ante32                = $_POST['ante32'];

if ($ante32 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI-NUCLEARES ANA');");
        }


        $ante33                 = $_POST['ante33'];

if ($ante33 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI DNA (DOBLE CADENA)');");
        }



        $ante34                = $_POST['ante34'];

if ($ante34 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI-FOSFOLÍPIDOS');");
        }

        $ante35                 = $_POST['ante35'];

if ($ante35 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI-COAGULANTE LÚPICO (LA)');");
        }


        $ante36                 = $_POST['ante36'];

        if ($ante36 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI-CARDIOLIPINA(ACÁ)igG');");
        }

        $ante37                 = $_POST['ante37'];
         if ($ante37 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI-CARDIOLIPINA(ACÁ)igM');");
        }

        $ante38                 = $_POST['ante38'];

         if ($ante38 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI-SCL 70');");
        }



        $ante39                 = $_POST['ante39'];
 if ($ante39 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI-RO(SSA)');");
        }

        $ante40                 = $_POST['ante40'];
         if ($ante40 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI-LA(SSB)');");
        }


        $ante41                 = $_POST['ante41'];

          if ($ante41 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANCAS');");
        }


        $ante42                = $_POST['ante42'];

         if ($ante42 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANCA-P');");
        }


        $ante43                = $_POST['ante43'];
         if ($ante43 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANCA-C');");
        }


        $ante44                = $_POST['ante44'];

         if ($ante44 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI-SM');");
        }

        $ante45                = $_POST['ante45'];

        if ($ante45 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI-MUSCULOSO LISO(ASMA)');");
        }

        $ante46                = $_POST['ante46'];

        if ($ante46 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI-MITOCONDRIALES (AMA)');");
        }

        $ante47                 = $_POST['ante47'];
if ($ante47 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI-CÉLULAS PARIETALES');");
        }

        $ante48                 = $_POST['ante48'];

if ($ante48 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI-MICROSOMALES(ANTI-TIPO)');");
        }

///////////////////////////serologia

        $ante49                 = $_POST['ante49'];

if ($ante49 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI-TIROGLOBULINA(ANTI-TG)');");
        }


        $ante50                 = $_POST['ante50'];

    if ($ante50 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','COMPLEMENTO C3');");
        }   
        

        $ante51                 = $_POST['ante51'];
 if ($ante51 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','COMPLEMENTO C4');");
        }   

        $ante52                = $_POST['ante52'];
        if ($ante52 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANA BLOT');");
        }

        $ante53                = $_POST['ante53'];

        
        if ($ante53 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI LKM-1');");
        } 



        $ante54                = $_POST['ante54'];
 if ($ante54 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','COPROPARASIATRIO SIMPLE');");
        } 


        $ante55                = $_POST['ante55'];
 if ($ante55 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','COPROPARASIATRIO POR CONCENTRACIÓN');");
        } 

        $ante56                = $_POST['ante56'];
 if ($ante56 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','INV DE POLIMORFONUCLEARES (PMN)');");
        }

        $ante57                 = $_POST['ante57'];

       if ($ante57 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PH EN HECES ');");
        }
          
        $ante58                 = $_POST['ante58'];
 if ($ante58 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','INV. DE GRASAS FECALES (SUDÁN III)');");
        }

        $ante59                 = $_POST['ante59'];

 if ($ante59 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CLINI-TEST');");
        }



        $ante60                 = $_POST['ante60'];
 if ($ante60 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','INV. DE OXIUROS');");
        }




        $ante60a                 = $_POST['ante60a'];
 if ($ante60a <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTIBIOGRAMA ANTINUCLEARES (ANA)');");
        }







        $ante61                 = $_POST['ante61'];

 if ($ante61 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','INV. SANGRE OCULTA');");
        }

        $ante62                = $_POST['ante62'];

 if ($ante62 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','INV. DE ROTAVIRUS');");
        }

        $ante63                = $_POST['ante63'];

if ($ante63 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','INV. DE ADENOVIRUS');");
        }

        $ante64                = $_POST['ante64'];
if ($ante64 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTÍGENO HELICOBACTER PYLORI');");
        }

        $ante65                = $_POST['ante65'];
if ($ante65 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','T.COAGULACIÓN');");
        }

        $LATEX                = $_POST['LATEX'];
if ($LATEX  <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','LATEX');");
        }


        $FACTOR               = $_POST['FACTOR'];

if ($FACTOR  <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FACTOR REUMATODEO');");
        }


        $SEDI               = $_POST['SEDI'];

if ($SEDI <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','SEDIMENTACIÓN');");
        }

        $PCR              = $_POST['PCR'];


if ($PCR  <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PCR');");
        }    


        $CCP              = $_POST['CCP'];
if ($CCP  <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI CCP');");
        } 


        $ANA            = $_POST['ANA'];
if ($ANA  <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANA');");
        } 

        $ANTI            = $_POST['ANTI'];

if ($ANTI   <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI DNA');");
        } 


     $ante65a                = $_POST['ante65a'];
if ($ante65a <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FSH');");
        }

 $ante66                = $_POST['ante66'];
if ($ante66 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PLAQUETAS');");
        }

        $ante67                = $_POST['ante67'];
if ($ante67 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FR(LÁTEX) CUALITATIVO');");
        }

        $ante68                = $_POST['ante68'];
if ($ante68 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','TP');");
        }

         $ante68a                = $_POST['ante68a'];
if ($ante68a <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',' ESTRADIOL');");
        } 

 $ante69                = $_POST['ante69'];
if ($ante69 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','TTP');");
        }
       
$ante70               = $_POST['ante70'];
if ($ante70 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','DIMERO D.');");
        }
$ante71              = $_POST['ante71'];
if ($ante71 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FACTOR V LEYDEN PROTEÍNAS S');");
        }

    $ante72              = $_POST['ante72'];
if ($ante72 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PROTEÍNAS S');");
        }   


 $ante73              = $_POST['ante73'];
if ($ante73 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','T. HEMORRAGIA Q.');");
        }   
 $ante74              = $_POST['ante74'];
if ($ante74 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','RETRAC. COAGULACIÓN');");
        }   
 $ante75              = $_POST['ante75'];
if ($ante75 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PROTEÍNA C');");
        }
 $ante76              = $_POST['ante76'];
if ($ante76 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI. TROMBINA III');");
        }
 $ante77              = $_POST['ante77'];
if ($ante77 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FIBRINÓGENO');");
        }

 $ante78              = $_POST['ante78'];
if ($ante78 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI LÚPICO');");
        }
$ante79              = $_POST['ante79'];
if ($ante79 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','AST(STGO)');");
        }

$ante80             = $_POST['ante80'];
if ($ante80 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','AST(STGP)');");
        }

$ante81             = $_POST['ante81'];
if ($ante81 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FOSFATASA ALCALINA');");
        }

$ante82             = $_POST['ante82'];
if ($ante82 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','GAMMA GT');");
        }

$ante83             = $_POST['ante83'];
if ($ante83 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FOSFATASA ÁCIDA TOTAL');");
        }

$ante84             = $_POST['ante84'];
if ($ante84 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FOSFATASA ÁCIDA PROSTÁTICA');");
        }


$ante85             = $_POST['ante85'];
if ($ante85 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','AMILASA');");
        }


$ante86             = $_POST['ante86'];
if ($ante86 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','LIPASA');");
        }


$ante87             = $_POST['ante87'];
if ($ante87 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CPK');");
        }



$ante88             = $_POST['ante88'];
if ($ante88 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CK-MB');");
        }


$ante89             = $_POST['ante89'];
if ($ante89 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','TROPONINA');");
        }



$ante90            = $_POST['ante90'];
if ($ante90 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','LDH');");
        }



$ante91            = $_POST['ante91'];
if ($ante91 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','MIOGLOBINA');");
        }

$ante92            = $_POST['ante92'];
if ($ante92 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HPV 28 GENOTIPOS');");
        }

$ante93            = $_POST['ante93'];
if ($ante93 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HPV 14 GENOTIPOS');");
        }


$ante94            = $_POST['ante94'];
if ($ante94 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HILA B27');");
        }

$ante95            = $_POST['ante95'];
if ($ante95 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','TUBERCULOSIS (PCR)');");
        }

$ante96            = $_POST['ante96'];
if ($ante96 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','NEISSERIA GONORRHOEAE (PRC)');");
        }

$ante97            = $_POST['ante97'];
if ($ante97 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','SODIO');");
        }

$ante98            = $_POST['ante98'];
if ($ante98 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','POTASIO');");
        }

$ante99            = $_POST['ante99'];
if ($ante99 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CLORO');");
        }

$ante100            = $_POST['ante100'];
if ($ante100 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FÓSFORO');");
        }

$ante101            = $_POST['ante101'];
if ($ante101 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','LITIO');");
        }

$ante102            = $_POST['ante102'];
if ($ante102 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CA. TOTAL');");
        }

$ante103            = $_POST['ante103'];
if ($ante103 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','MAGNESIO');");
        }

$ante104            = $_POST['ante104'];
if ($ante104 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PROTEÍNAS S');");
        }

$ante105            = $_POST['ante105'];
if ($ante105 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','C.IÓNICO');");
        }

$ante106            = $_POST['ante106'];
if ($ante106 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','GASOMETRÍA ARTERIAL');");
        }

$ante107            = $_POST['ante107'];
if ($ante107 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','GASOMETRÍA VENOSA');");
        }

$ante108            = $_POST['ante108'];
if ($ante108 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','INFLUENZA AB+ VIRUS SR');");
        }

$ante109            = $_POST['ante109'];
if ($ante109 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','TORCH');");
        }

$ante110            = $_POST['ante110'];
if ($ante110 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','TOXOPLASMA');");
        }

$ante111            = $_POST['ante111'];
if ($ante111 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','RUBÉOLA');");
        }

$ante112            = $_POST['ante112'];
if ($ante112 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CITOMEGALOVIRUS');");
        }

$ante113            = $_POST['ante113'];
if ($ante113 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','MONOCUCLEOSIS MONOTETST');");
        }

$ante114            = $_POST['ante114'];
if ($ante114 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','EPSTEIN BARR (VCA)');");
        }

$ante115            = $_POST['ante115'];
if ($ante115 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HERPES I');");
        }

$ante116            = $_POST['ante116'];
if ($ante116 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HERPES II');");
        }

$ante117            = $_POST['ante117'];
if ($ante117 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CHLAMYDIA TRACHOMATIS');");
        }

$ante118            = $_POST['ante118'];
if ($ante118 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','SEROAMEBA');");
        }

$ante119            = $_POST['ante119'];
if ($ante119 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI CISTICERCO');");
        }

$ante120            = $_POST['ante120'];
if ($ante120 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','H1V1, HIV2 + P24');");
        }

$ante121            = $_POST['ante121'];
if ($ante121 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','DENGUE SÉRICO');");
        }

$ante122            = $_POST['ante122'];
if ($ante122 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CHAGAS SÉRICO');");
        }

$ante123            = $_POST['ante123'];
if ($ante123 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','INV. A. MALARIA');");
        }

$ante124            = $_POST['ante124'];
if ($ante124 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTÍGENO CHLAMDYA TRACHOMATIS');");
        }

$ante125            = $_POST['ante125'];
if ($ante125 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','INV SÍFILIS IgG-IgM');");
        }

$ante126            = $_POST['ante126'];
if ($ante126 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FTA Abs');");
        }

$ante127            = $_POST['ante127'];
if ($ante127 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','VARICELA ZOSTER');");
        }

$ante128            = $_POST['ante128'];
if ($ante128 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CULTIVO DE');");
        }

$ante129            = $_POST['ante129'];
if ($ante129 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','COPROCULTIVO');");
        }

$ante130            = $_POST['ante130'];
if ($ante130 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CULTIVO DE HONGOS');");
        }

$ante131            = $_POST['ante131'];
if ($ante131 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FRESCO');");
        }

$ante132            = $_POST['ante132'];
if ($ante132 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','GRAM');");
        }

$ante133            = $_POST['ante133'];
if ($ante133 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','KOH');");
        }

$ante134            = $_POST['ante134'];
if ($ante134 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTÍGENO DE CHLAMYDIA');");
        }

$ante135            = $_POST['ante135'];
if ($ante135 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CULTIVO DE LOWEINSTEIN');");
        }

$ante136            = $_POST['ante136'];
if ($ante136 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HEMOCULTIVO No');");
        }

$ante137            = $_POST['ante137'];
if ($ante137 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','INV EOSINOFILOS EN MOCO NASAL');");
        }

$ante138            = $_POST['ante138'];
if ($ante138 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','INV ZIEL - NIELSEN (BAAR)');");
        }

$ante139            = $_POST['ante139'];
if ($ante139 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CITOQUÍMICO');");
        }

$ante140            = $_POST['ante140'];
if ($ante140 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','GLUCOSA EN AYUNAS');");
        }

$ante141            = $_POST['ante141'];
if ($ante141 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','GLUCOSA POST PRANDIAL 2 HS');");
        }

$ante142            = $_POST['ante142'];
if ($ante142 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CURVA DE TOLERANCIA A LA GLUCOCOSA');");
        }

$ante143            = $_POST['ante143'];
if ($ante143 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','TEST DE SULLIVAN');");
        }

$ante144            = $_POST['ante144'];
if ($ante144 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HEMOGLOBINA GLICOSILADA');");
        }

$ante145            = $_POST['ante145'];
if ($ante145 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FRUCTOSAMINA');");
        }

$ante146            = $_POST['ante146'];
if ($ante146 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PÉPTIDO C');");
        }

$ante147            = $_POST['ante147'];
if ($ante147 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ÚREA');");
        }

$ante148            = $_POST['ante148'];
if ($ante148 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CREATININA');");
        }

$ante149            = $_POST['ante149'];
if ($ante149 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','AC ÚRICO');");
        }

$ante150            = $_POST['ante150'];
if ($ante150 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','BUN');");
        }

$ante151            = $_POST['ante151'];
if ($ante151 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','COLESTEROL');");
        }

$ante152            = $_POST['ante152'];
if ($ante152 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HDL COLESTEROL');");
        }

$ante153            = $_POST['ante153'];
if ($ante153 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','LDL COLESTEROL');");
        }

$ante154            = $_POST['ante154'];
if ($ante154 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','TRIGLICÉRIDOS');");
        }

$ante155            = $_POST['ante155'];
if ($ante155 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','V.L.D.L');");
        }

$ante156            = $_POST['ante156'];
if ($ante156 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','APO-LIPOPROTEÍNAS');");
        }

$ante157            = $_POST['ante157'];
if ($ante157 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','LÍPIDOS TOTALES');");
        }

$ante158            = $_POST['ante158'];
if ($ante158 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','BILIRRUBINAS T-D-I');");
        }

$ante159            = $_POST['ante159'];
if ($ante159 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PROTEÍNAS TOTALES');");
        }

$ante160            = $_POST['ante160'];
if ($ante160 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','GLOBULINA');");
        }

$ante161            = $_POST['ante161'];
if ($ante161 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ALBÚMINA');");
        }

$ante162            = $_POST['ante162'];
if ($ante162 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ÍNDICE AL/GL');");
        }

$ante163            = $_POST['ante163'];
if ($ante163 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ELECTROFORESIS DE PROTEÍNAS');");
        }

$ante164            = $_POST['ante164'];
if ($ante164 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','COLINESTERASA PLASMÁTICA');");
        }

$ante165            = $_POST['ante165'];
if ($ante165 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','COLINESTERASA ERITROCITARIA');");
        }

$ante166            = $_POST['ante166'];
if ($ante166 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','AC. LÁCTICO');");
        }

$ante167            = $_POST['ante167'];
if ($ante167 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ÍNDICE HOMA');");
        }

$ante168            = $_POST['ante168'];
if ($ante168 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ALFA FETO PROTEÍNA (AFT)');");
        }

$ante169            = $_POST['ante169'];
if ($ante169 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','AG. CARCINO EMBRRIONARIO (PSA)');");
        }

$ante170            = $_POST['ante170'];
if ($ante170 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','AG PROSTÁTICO ESPECÍFICO (PSA)');");
        }

$ante171            = $_POST['ante171'];
if ($ante171 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PSA LIBRE');");
        }

$ante172            = $_POST['ante172'];
if ($ante172 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CA 125 (OVARIO)');");
        }

$ante173            = $_POST['ante173'];
if ($ante173 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CA 15-3 (MAMAS)');");
        }

$ante174            = $_POST['ante174'];
if ($ante174 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CA 19-9 (PÁNCREAS, GÁSTRICO, E INTEST.)');");
        }

$ante175            = $_POST['ante175'];
if ($ante175 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','BHCG CUANTITAIVO');");
        }

$ante176            = $_POST['ante176'];
if ($ante176 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CYFRA 21.1');");
        }

$ante177            = $_POST['ante177'];
if ($ante177 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HE4');");
        }

$ante178            = $_POST['ante178'];
if ($ante178 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','AC. VALPROICO');");
        }

$ante179            = $_POST['ante179'];
if ($ante179 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','AC. VALPROICO');");
        }

$ante180            = $_POST['ante180'];
if ($ante180 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FENOBARBITAL');");
        }

$ante181            = $_POST['ante181'];
if ($ante179 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','DIGOXINA');");
        }

$ante182            = $_POST['ante182'];
if ($ante182 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FENITOINA');");
        }

$ante183            = $_POST['ante183'];
if ($ante183 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','LITIO');");
        }

$ante184            = $_POST['ante184'];
if ($ante184 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','TSH');");
        }

$ante185            = $_POST['ante185'];
if ($ante185 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FT3');");
        }

$ante186            = $_POST['ante186'];
if ($ante186 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FT4');");
        }

$ante187            = $_POST['ante187'];
if ($ante187 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','T4');");
        }

$ante188            = $_POST['ante188'];
if ($ante188 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','T3');");
        }

$ante189            = $_POST['ante189'];
if ($ante189 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','TIROGLOBULINA(TG)');");
        }

$ante190            = $_POST['ante190'];
if ($ante190 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','LH');");
        }

$ante191            = $_POST['ante191'];
if ($ante191 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','FSH');");
        }

$ante192            = $_POST['ante192'];
if ($ante192 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PROLACTINA');");
        }

$ante193            = $_POST['ante193'];
if ($ante193 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PROGESTERONA');");
        }

$ante194            = $_POST['ante194'];
if ($ante194 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','17 BETA ESTRADIOL (ESTRÓGENOS)');");
        }

$ante195            = $_POST['ante195'];
if ($ante195 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','TESTOSTERONA TOTAL');");
        }

$ante196            = $_POST['ante196'];
if ($ante196 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CORTISOL');");
        }

$ante197            = $_POST['ante197'];
if ($ante197 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','DHEAS');");
        }

$ante198            = $_POST['ante198'];
if ($ante198 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ACTH');");
        }

$ante199            = $_POST['ante199'];
if ($ante199 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PARATOHORMONA(PTH)');");
        }

$ante200            = $_POST['ante200'];
if ($ante200 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HcG BETA CUALITATIVA');");
        }

$ante201            = $_POST['ante201'];
if ($ante201 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HcG BETA CUANTITATIVA');");
        }

$ante202            = $_POST['ante202'];
if ($ante202 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','(GH) HORMONA CRECIMIENTO');");
        }

$ante203            = $_POST['ante203'];
if ($ante203 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','INSULINA');");
        }

$ante204            = $_POST['ante204'];
if ($ante204 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','INSULINA POST PRANDIAL');");
        }

$ante205            = $_POST['ante205'];
if ($ante205 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HELI');");
        }

$ante206            = $_POST['ante206'];
if ($ante206 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI HAV IgG');");
        }

$ante207           = $_POST['ante207'];
if ($ante207 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI HAV IgM');");
        }

$ante208            = $_POST['ante208'];
if ($ante208 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTÍGENO AUSTRALIA Hbs- Ag');");
        }

$ante209            = $_POST['ante209'];
if ($ante209 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI HBs');");
        }

$ante210            = $_POST['ante210'];
if ($ante210 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI HBe');");
        }

$ante211            = $_POST['ante211'];
if ($ante211 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI HBC IgM');");
        }

$ante212            = $_POST['ante212'];
if ($ante212 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI HBC(ANTI CORE TOTAL)');");
        }

$ante213            = $_POST['ante213'];
if ($ante213 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HBeAg');");
        }

$ante214            = $_POST['ante214'];
if ($ante214 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','HBsAg(ANTÍGENO AUSTRALIA)');");
        }

$ante215            = $_POST['ante215'];
if ($ante215 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANTI HCV (ANTICUERPOS TOTALES)');");
        }

$ante216            = $_POST['ante216'];
if ($ante216 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','INMUNOGLOBULINAS');");
        }

$ante217            = $_POST['ante217'];
if ($ante217 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','EMO');");
        }

$ante218            = $_POST['ante218'];
if ($ante218 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','GRAM EN SEDIMIENTO');");
        }

$ante219            = $_POST['ante219'];
if ($ante219 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','GOTA FRESCO');");
        }

$ante220            = $_POST['ante220'];
if ($ante220 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CULTIVO Y ANTIBIOGRAMA');");
        }

$ante221            = $_POST['ante221'];
if ($ante221 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','SODIO');");
        }

$ante222            = $_POST['ante222'];
if ($ante222 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','POTASIO');");
        }

$ante223            = $_POST['ante223'];
if ($ante223 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','CLORO');");
        }

$ante224            = $_POST['ante224'];
if ($ante224 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PROTEINURA ORINA 24H');");
        }

$ante225            = $_POST['ante225'];
if ($ante225 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PROTEINURA ORINA OCASIONAL');");
        }

$ante226            = $_POST['ante226'];
if ($ante226 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','MICROALBUNIMURIA');");
        }

$ante227            = $_POST['ante227'];
if ($ante227 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','DEPURACIÓN DE CREATININA');");
        }

$ante228            = $_POST['ante228'];
if ($ante228 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','BARR EN ORINA');");
        }

$ante229            = $_POST['ante229'];
if ($ante229 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ELECTROLITOS EN ORINA');");
        }

$ante230            = $_POST['ante230'];
if ($ante230 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PAP TEST (PLACA)');");
        }

$ante231            = $_POST['ante231'];
if ($ante231 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','PAP TEST (CITOLOGÍA LÍQUIDA)');");
        }

$ante232            = $_POST['ante232'];
if ($ante232 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','BIOPSIA DE');");
        }

$ante233            = $_POST['ante233'];
if ($ante233 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ESPERMATOGRAMA');");
        }

$ante234            = $_POST['ante234'];
if ($ante234 <> '') {  mysqli_query($conn3,"INSERT INTO laboratorios(cliente_id, usuario_id, fecha, hora, descripcion) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','ANÁLISIS DE CÁLCULO RENAL');");
        }


$V17= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"  style="background: #A4A4A4"><tr><td width="36%"><h5><b>HEMATOLOGIA</b> </h5></td> <td width="27%"><h5><b>DROGAS DE ABUSO</h5></b></td> <td><b><h5><b> QUIMICA SANGUINEA</b></h5></b></td> </tr></table>';
$V18= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> <tr><td><h6>BIOMETRIA HEMATICA:'.$ante1.'<br>FÓRMULA LEUCOCITARIA MANUAL:'.$ante2.'<br>HEMATOCRITO/HEMOGLOBINA:'.$ante3.'<br>SEDIMENTACIÓN(VSG):'.$ante4.'<br>RETICULOCITOS:'.$ante5.'<br>HEMATOZOARIO:'.$ante6.'<br>TRANSFERRINA:'.$ante7.'<br>SATURACIÓN DE TRANSFERENCIA :'.$ante8.' <br>COOMBOS DIRECTO :'.$ante9.'
<!--<div align="left"  width="100%"  style="background: #A4A4A4"> <h5 align="right"><b> SEROLOGÍA </b></h5><br> </div>
PRC CUANTITATIVO:'.$ante25.'<br> 
ASTO CUANTITIVO:'.$ante26.'<br>
FR(LÁTEX) CUALITATIVO:'.$ante27.'<br> 
FR CUANTITATIVO:'.$ante28.'<br> 
ITRULINA (ANTI CCP):'.$ante29.'<br> 
V.D.R.L:'.$ante30.'<br>
AGLUTINACIONES FEBRILES:'.$ante31.'<br>-->    


 </h6></td>

  <td><h6>GRUPO SANGUINEO:'.$ante10.'<br>INV. DREPANOCITOS:'.$ante11.'<br>HIERRO SÉRICO:'.$ante12.'<br>FERRETINA:'.$ante13.'<br>VITAMINA B12:'.$ante14.' <br>ÁCIDO FÓLICO:'.$ante15.'<br>WESTERGREEN:'.$ante16.'<br>CÉLULAS LE:'.$ante17.'<br>COOMBOS INDIRECTO:'.$ante18.' <br><br>
<!--<div align="left"  width="100%"  style="background: #A4A4A4"> <h5> <b>BIOLOGÍA MOLECULAR</b></h5><br> </div>
HPV 28 GENOTIPOS:'.$ante92.'<br> 
HPV 14 GENOTIPOS:'.$ante93.'<br>
HILA B27:'.$ante94.'<br> 
TUBERCULOSIS (PCR):'.$ante95.'<br> 
NEISSERIA GONORRHOEAE (PRC):'.$ante96.'<br> -->


  </h6></td>




<td><h6>COCAINA:'.$ante19.'<br>MARIHUANA:'.$ante20.'<br>PANEL 6 DROGRAS (COC,ANF,MAR,EXT,OPI,BZO)
:'.$ante21.'<br>PANEL 10 DROGAS (ANF, BAR, BZO,COC,MAR,MET,METAN,OPI,FEN,ANTIDEP):'.$ante22.'<br>ALCOHOL ETÍLICO EN SALIVA:'.$ante23.'<br>ALCOHOL ETÍLICO EN SANGRE:'.$ante24.'<br> 
<div align="left"  width="100%"  style="background: #A4A4A4"> <h5><b>COPROANÁLISIS</b> </h5><br> </div>

COPROPARASIATRIO SIMPLE:'.$ante54.'<br> 
COPROPARASIATRIO POR CONCENTRACIÓN:'.$ante55.'<br> 
INV DE POLIMORFONUCLEARES (PMN):'.$ante56.'<br> 
PH EN HECES:'.$ante57.'<br> 
INV. DE GRASAS FECALES (SUDÁN III):'.$ante58.'<br>
CLINI-TEST:'.$ante59.'<br>
INV. DE OXIUROS:'.$ante60.'<br>
INV. SANGRE OCULTA:'.$ante61.'<br>
INV. DE ROTAVIRUS:'.$ante62.'<br>
INV. DE ADENOVIRUS:'.$ante63.'<br>
ANTÍGENO HELICOBACTER PYLORI:'.$ante64.'<br>
</h6></td> 


<td><h6>GLUCOSA EN AYUNAS:'.$ante140.'<br>GLUCOSA POST PRANDIAL 2 HS:'.$ante141.'<br>CURVA DE TOLERANCIA A LA GLUCOCOSA:'.$ante142.'<br>TEST DE SULLIVAN:'.$ante143.'<br>HEMOGLOBINA GLICOSILADA:'.$ante144.'<br>FRUCTOSAMINA:'.$ante145.'<br>PÉPTIDO C:'.$ante146.'<br>ÚREA:'.$ante147.'<br>CREATININA:'.$ante148.'<br>AC ÚRICO:'.$ante149.'<br>BUN:'.$ante150.'<br>COLESTEROL:'.$ante151.'<br>HDL COLESTEROL:'.$ante152.'<br>LDL COLESTEROL:'.$ante153.'</h6></td> <td><h6><br>TRIGLICÉRIDOS:'.$ante154.'<br>V.L.D.L:'.$ante155.'<br>APO-LIPOPROTEÍNAS:'.$ante156.'<br>LÍPIDOS TOTALES:'.$ante157.'<br>BILIRRUBINAS T-D-I:'.$ante158.'<br>PROTEÍNAS TOTALES:'.$ante159.'<br>GLOBULINA:'.$ante160.'<br>ALBÚMINA:'.$ante161.'<br>LACTATO ÍNDICE AL/GL:'.$ante162.'<br>ELECTROFORESIS DE PROTEÍNAS :'.$ante163.'<br>COLINESTERASA PLASMÁTICA :'.$ante164.'<br>COLINESTERASA ERITROCITARIA :'.$ante165.'<br>AC. LÁCTICO :'.$ante166.'<br>ÍNDICE HOMA :'.$ante167.' </h6></td></tr></table>';



$V19= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"  style="background: #A4A4A4"><tr><td width="36%"><h5><b>AUTOINMUNIDAD</b> </h5></td> <td width="40%"><h5><b>COAGULACIÓN</h5></b></td> <td><b><h5><b> ENZIMAS</h5></b></td> </tr></table>';
$V20= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> <tr><td width="16%" ><h6>ANTI-NUCLEARES ANA:'.$ante32.'<br>ANTI DNA (DOBLE CADENA):'.$ante33.'<br>ANTI-FOSFOLÍPIDOS:'.$ante34.'<br>ANTI-COAGULANTE LÚPICO (LA):'.$ante35.'<br>ANTI-CARDIOLIPINA(ACÁ)igG:'.$ante36.'<br>ANTI-CARDIOLIPINA(ACÁ)igM:'.$ante37.'<br>  ANTI-SCL 70:'.$ante38.'<br> ANTI-RO(SSA):'.$ante39.'<br>ANTI-LA(SSB):'.$ante40.'<BR> ANCAS:'.$ante41.'<br>ANCA-P:'.$ante42.'<br>ANCA-C:'.$ante43.'<br>ANTI-SM:'.$ante44.'  
</h6></td>

<td width="20" ><h6>ANTI-MUSCULOSO LISO(ASMA):'.$ante45.'<br>ANTI-MITOCONDRIALES (AMA):'.$ante46.'<br>ANTI-CÉLULAS PARIETALES:'.$ante47.'<br>ANTI-MICROSOMALES(ANTI-TIPO):'.$ante48.'<br>ANTI-TIROGLOBULINA(ANTI-TG):'.$ante49.'<br>COMPLEMENTO C3:'.$ante50.'<br>COMPLEMENTO C4:'.$ante51.'<br>ANA BLOT:'.$ante52.'<br>ANTI LKM-1:'.$ante53.'  </h6></td>
<td width="20%"><h6>T.COAGULACIÓN:'.$ante65.'<br>PLAQUETAS:'.$ante66.'<br>FR(LÁTEX) CUALITATIVO:'.$ante67.'<br>TP:'.$ante68.'<br>TTP:'.$ante69.'<br>DIMERO D.:'.$ante70.'</h6></td>
<td width="20%" ><h6>FACTOR V LEYDEN:'.$ante71.'<br>PROTEÍNAS S:'.$ante72.'<br>T. HEMORRAGIA Q.:'.$ante73.'<br>RETRAC. COAGULACIÓN:'.$ante74.'<br>PROTEÍNA C.:'.$ante75.'<br>ANTI. TROMBINA III:'.$ante76.'<br>FIBRINÓGENO:'.$ante77.'<br>ANTI LÚPICO:'.$ante78.'</h6></td>
<td width="24%" ><h6>AST(STGO):'.$ante79.'<br>AST(STGP):'.$ante80.'<br>FOSFATASA ALCALIN:'.$ante81.'<br>GAMMA GT:'.$ante82.'<br>FOSFATASA ÁCIDA TOTAL:'.$ante83.'<br>FOSFATASA ÁCIDA TOTAL:'.$ante83.'<br>FOSFATASA ÁCIDA TOTAL:'.$ante83.'<br>FOSFATASA ÁCIDA TOTAL:'.$ante83.'<br>FOSFATASA ÁCIDA PROSTÁTICA:'.$ante84.'<br>AMILASA:'.$ante85.'<br>LIPASA:'.$ante86.'<br>CPK:'.$ante87.'<br>CK-MB:'.$ante88.'<br>TROPONINA:'.$ante89.'<br>LDH:'.$ante90.'<br>MIOGLOBINA:'.$ante91.'</h6></td>

</tr></table> ';


$V21= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"  style="background: #A4A4A4"><tr><td width="36%"><h5><b>ELECTROLITOS</b> </h5></td> <td width="40%"><h5><b>ANTICUERPOS VIRALES E INMUNODIAGNOSTICO</h5></b></td> <td><b><h5><b>BACTERIOLOGIA</h5></b></td> </tr></table>';
$V22= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> <tr><td width="16%" ><h6>SODIO:'.$ante97.'<br>POTASIO:'.$ante98.'<br>CLORO:'.$ante99.'<br>FÓSFORO:'.$ante100.'<br>LITIO:'.$ante36.'<br>CA. TOTAL:'.$ante102.'  
</h6></td>

<td width="20" ><h6>MAGNESIO:'.$ante103.'<br>PROTEÍNAS S:'.$ante104.'<br>C.IÓNICO:'.$ante105.'<br>GASOMETRÍA ARTERIAL:'.$ante106.'<br>GASOMETRÍA VENOSA:'.$ante107.'</h6></td>
<td width="20%"><h6>INFLUENZA AB+ VIRUS SR:'.$ante108.'<br>TORCH:'.$ante109.'<br>TOXOPLASMA:'.$ante110.'<br>RUBÉOLA:'.$ante111.'<br>CITOMEGALOVIRUS:'.$ante112.'<br>MONOCUCLEOSIS MONOTETST:'.$ante113.'<br>EPSTEIN BARR (VCA):'.$ante114.'<br>HERPES I:'.$ante115.'<br>HERPES II:'.$ante116.'</h6></td>
<td width="20%" ><h6>CHLAMYDIA TRACHOMATIS:'.$ante117.'<br>SEROAMEBA:'.$ante118.'<br>ANTI CISTICERCO:'.$ante119.'<br>H1V1, HIV2 + P24:'.$ante120.'<br>DENGUE SÉRICO:'.$ante121.'<br>CHAGAS SÉRICO:'.$ante122.'<br>INV. A. MALARIA:'.$ante123.'<br>ANTÍGENO CHLAMDYA TRACHOMATIS:'.$ante124.'<br>INV SÍFILIS IgG-IgM:'.$ante125.'<br>FTA Abs:'.$ante126.'<br>VARICELA ZOSTER:'.$ante127.'</h6></td>
<td width="24%" ><h6>CULTIVO DE:'.$ante128.'<br>COPROCULTIVO:'.$ante129.'<br>CULTIVO DE HONGOS:'.$ante130.'<br>FRESCO:'.$ante131.'<br>GRAM:'.$ante132.'<br>KOH:'.$ante133.'<br>ANTÍGENO DE CHLAMYDIA:'.$ante134.'<br>CULTIVO DE LOWEINSTEIN:'.$ante135.'<br>HEMOCULTIVO No:'.$ante136.'<br>INV EOSINOFILOS EN MOCO NASAL:'.$ante137.'<br>INV ZIEL - NIELSEN (BAAR):'.$ante138.'<br>CITOQUÍMICO:'.$ante139.'</h6></td>

</tr></table> ';

$V23= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"  style="background: #A4A4A4"><tr><td width="36%"><h5><b>MARCADORES ONCOLÓGICOS</b> </h5></td> <td width="40%"><h5><b>PRUEBAS HORMONALES</h5></b></td> <td><b><h5><b>DROGAS TERAPÉUTICAS</h5></b></td> </tr></table>';
$V24= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> <tr><td width="16%" ><h6>ALFA FETO PROTEÍNA (AFT):'.$ante168.'<br>AG. CARCINO EMBRRIONARIO (PSA):'.$ante169.'<br>AG PROSTÁTICO ESPECÍFICO (PSA):'.$ante170.'<br>PSA LIBRE:'.$ante171.'<br>CA 125 (OVARIO):'.$ante172.'<br>CA 15-3 (MAMAS):'.$ante173.'  
</h6></td>

<td width="20" ><h6>CA 19-9 (PÁNCREAS, GÁSTRICO, E INTEST.):'.$ante174.'<br>BHCG CUANTITAIVO:'.$ante175.'<br>CYFRA 21.1:'.$ante176.'<br>HE4:'.$ante177.'</h6></td>
<td width="20%"><h6>TSH:'.$ante184.'<br>FT3:'.$ante185.'<br>FT4:'.$ante186.'<br>T4:'.$ante187.'<br>T3:'.$ante188.'<br>TIROGLOBULINA(TG):'.$ante189.'<br>LH:'.$ante190.'<br>FSH:'.$ante191.'<br>PROLACTINA:'.$ante192.'</h6></td>
<td width="20%" ><h6>PROGESTERONA:'.$ante193.'<br>17 BETA ESTRADIOL (ESTRÓGENOS):'.$ante194.'<br>TESTOSTERONA TOTAL:'.$ante195.'<br>CORTISOL:'.$ante196.'<br>DHEAS:'.$ante197.'<br>ACTH:'.$ante198.'<br>PARATOHORMONA(PTH):'.$ante199.'<br>HcG BETA CUALITATIVA:'.$ante200.'<br>HcG BETA CUANTITATIVA:'.$ante201.'<br>(GH) HORMONA CRECIMIENTO:'.$ante202.'<br>INSULINA:'.$ante203.'<br>INSULINA POST PRANDIAL:'.$ante204.'</h6></td>
<td width="24%" ><h6>CARBAMAZEPINA:'.$ante178.'<br>AC. VALPROICO:'.$ante179.'<br>FENOBARBITAL:'.$ante180.'<br>DIGOXINA:'.$ante181.'<br>FENITOINA:'.$ante182.'<br>LITIO:'.$ante183.'</h6></td>

</tr></table> ';

$V25= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"  style="background: #A4A4A4"><tr><td width="40%"><h5><b>INMUNO DIAGNÓSTICO</b> </h5></td> <td width="40%"><h5><b>ORINA</h5></b></td> </tr></table>';
$V26= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> <tr><td width="40%" ><h6>HELI:'.$ante205.'<br>ANTI HAV IgG:'.$ante206.'<br>ANTI HAV IgM:'.$ante207.'<br>ANTÍGENO AUSTRALIA Hbs- Ag:'.$ante208.'<br>ANTI HBs:'.$ante209.'<br>ANTI HBe:'.$ante210.'<br>ANTI HBC IgM:'.$ante211.'<br>ANTI HBC(ANTI CORE TOTAL):'.$ante212.'<br>HBeAg:'.$ante213.'<br>HBsAg(ANTÍGENO AUSTRALIA):'.$ante214.'<br>ANTI HCV (ANTICUERPOS TOTALES):'.$ante215.'<br>INMUNOGLOBULINAS:'.$ante216.'<br>
</h6></td>
<td width="40%"><h6>EMO:'.$ante217.'<br>GRAM EN SEDIMIENTO:'.$ante218.'<br>GOTA FRESCO:'.$ante219.'<br>CULTIVO Y ANTIBIOGRAMA:'.$ante220.'<br>SODIO:'.$ante221.'<br>POTASIO:'.$ante222.'<br>CLORO:'.$ante223.'<br>PROTEINURA ORINA 24H:'.$ante224.'<br>PROTEINURA ORINA OCASIONAL:'.$ante225.'<br>MICROALBUNIMURIA:'.$ante226.'<br>DEPURACIÓN DE CREATININA:'.$ante227.'<br>BARR EN ORINA:'.$ante228.'<br>ELECTROLITOS EN ORINA:'.$ante229.'<br></h6></td>
</tr></table> ';


$V27= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"  style="background: #A4A4A4"><tr><td width="40%"><h5><b>BIOLOGÍA MOLECULAR</b> </h5></td> <td width="40%"><h5><b>SEROLOGÍA</h5></b></td> </tr></table>';
$V28= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> <tr><td width="40%" ><h6>HPV 28 GENOTIPOS:'.$ante92.'<br>HPV 14 GENOTIPOS:'.$ante93.'<br>HILA B27:'.$ante94.'<br>TUBERCULOSIS (PCR):'.$ante95.'<br>NEISSERIA GONORRHOEAE (PRC):'.$ante96.'<br>
</h6></td>
<td width="40%"><h6>PRC CUANTITATIVO:'.$ante25.'<br>ASTO CUANTITIVO:'.$ante26.'<br>FR(LÁTEX) CUALITATIVO:'.$ante27.'<br>FR CUANTITATIVO:'.$ante28.'<br>CITRULINA (ANTI CCP):'.$ante29.'<br>V.D.R.L:'.$ante30.'<br>AGLUTINACIONES FEBRILES:'.$ante31.'<br></h6></td>
</tr></table> ';


$V29= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"  style="background: #A4A4A4"><tr><td width="40%"><h5><b>PATOLOGÍA-CITOLOGÍA</b> </h5></td> <td width="40%"><h5><b>OTROS</h5></b></td> </tr></table>';
$V30= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> <tr><td width="40%" ><h6>PAP TEST (PLACA):'.$ante230.'<br>PAP TEST (CITOLOGÍA LÍQUIDA):'.$ante231.'<br>BIOPSIA DE:'.$ante232.'<br>
</h6></td>
<td width="40%"><h6>ESPERMATOGRAMA:'.$ante233.'<br>ANÁLISIS DE CÁLCULO RENAL:'.$ante234.'<br></h6></td>
</tr></table> ';

$detallar                    = $_POST['detallar'];

$examen=$V17.$V18.$V19.$V20.$V21.$V22.$V23.$V24.$V25.$V26.$V27.$V28.$V29.$V30;




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
          
             $VT2= '<table width="100%"><tr><td><h5>¿Tienes sensación de falta de aire de inicio brusco?<br>'.$antCO6.'</h5></td></tr>';
             $VT3= '<tr><td><h5>¿Tienes fiebre? (+37.7oC)?<br>'.$antCO7.'</h5></td></tr>';
             $VT4= '<tr><td><h5>¿Tienes tos seca y persistente?<br>'.$antCO8.'</h5></td></tr>';
             $VT5= '<td><h5>¿Has tenido contacto estrecho con algún paciente positivo confirmado? (+37.7oC)?<br>'.$antCO9.'</h5></td></tr>';

             $VT6= '<tr><tr><td><h5>¿Tienes mucosidad en la nariz?<br>'.$antCO10.'</h5></td></tr>';
             $VT7= '<td><h5>¿Tienes dolor muscular?<br>'.$antCO11.'</h5></td></tr>';

             $VT8= '<tr><tr><td><h5>¿Tienes sintomatología gastrointestinal?<br>'.$antCO12.'</h5></td></tr>';
             $VT9= '<tr><td><h5>¿Llevas más de 20 días con estos síntomas?<br>'.$antCO13.'</h5></td></tr></table>';

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

$I6= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"><tr><td width="50%"><h5   style="background: #A4A4A4"><b>3. RESUMEN CLINICO</b></h5> <br> <h6>'.$resumenclinico.'</h6></td><td width="50%"><h5 style="background: #A4A4A4"><b>4. DIAGNOSTICO</b></h5><h6>'.$T1.'</h6></td></tr></table>'; 


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
$epi75a= $_POST['epi75a'];
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




 $epidemia= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> 
  <div class="row"> <div class="col-xs-12"><h6>13. Signos y síntomas:&nbsp&nbsp&nbsp&nbsp Fecha de inicio de cuadro clinico:&nbsp'.$epi1.'&nbsp&nbsp&nbsp&nbspFecha inicio de sintoma/signo relevante:&nbsp'.$epi2.'&nbsp&nbsp&nbsp&nbspN° Días:&nbsp'.$epi3.'</div></div>
 <div class="row"> <div class="col-xs-3"><h6>Adenopatías:&nbsp'.$epi4.'<br>Alt. neurológicas del nivel periférico:&nbsp'.$epi5.'<br>Alt.neurológicas del nivel central:&nbsp'.$epi6.'<br>Anorexia:&nbsp'.$epi7.'<br>Apnea:&nbsp'.$epi8.'<br>Artralgia:&nbsp'.$epi9.'<br>Ascitis:&nbsp'.$epi10.'<br>Cefalea:&nbsp'.$epi11.'</div> <div class="col-xs-3"><h6>Cianosis:&nbsp'.$epi13.'<br>Convulsiones:&nbsp'.$epi14.'<br>Deshidratación:'.$epi15.'<br>Diarrea:&nbsp'.$epi16.'<br>Dificultad respiratoria:&nbsp'.$epi17.'<br>Dolor abdominal:&nbsp'.$epi18.'<br>Dolor garganta:&nbsp'.$epi19.'<br>Erupción:&nbsp'.$epi20.'</div> 

 <div class="col-xs-3"><h6>Escalofríos:&nbsp'.$epi21.'<br>Espasmo muscular:&nbsp'.$epi22.'<br>Estridor respiratorio:'.$epi23.'<br>Fiebre:&nbsp'.$epi24.'<br>Ictericia:&nbsp'.$epi25.'<br>Mialgias:&nbsp'.$epi26.'<br>Nausea/vómitos:&nbsp'.$epi27.'<br>Parálisis:&nbsp'.$epi28.'</div>

<div class="col-xs-3"><h6>Prurito:&nbsp'.$epi29.'<br>Rigidez muscular:&nbsp'.$epi30.'<br>Sangrados:'.$epi31.'<br>Tos:&nbsp'.$epi32.'<br>Trismus:&nbsp'.$epi33.'<br>Visión borrosa:&nbsp'.$epi34.'</div>
 </div>
 <div class="col-xs-12"><h6>Otros signos y síntomas:'.$epi35.'</div>

 <div class="row"> 
 <div class="col-xs-12"><h6> 14. Caracterizar el/los signos/síntomas más relevantes:.'.$epi36.'<br>
  Alergias a farmacos:'.$epi37.'<br>
  Enfermedades crónicas:'.$epi38.'<br>
   Refiere:'.$epi39.'</div> 
  </div>
  <div class="row"> <div class="col-xs-4"><h6>15. Recibió tratamiento:&nbsp'.$epi40.'</div><div class="col-xs-8"><h6>Especifique cual:&nbsp'.$epi41.'</div><div class="col-xs-1"><h6>
Evolución:&nbsp&nbsp</div><div class="col-xs-3"><h6>Mejoró:&nbsp'.$epi42.'<br>Iguales condiciones:&nbsp'.$epi43.'<br>Empeoró:&nbsp'.$epi44.'</div>

<div class="col-xs-4"><h6>Lugar donde recibió tratamiento:<br>Domicilio:&nbsp'.$epi45.'<br>Farmacia:&nbsp'.$epi46.'</div>
<div class="col-xs-4"><h6>Unidades de Salud del MSP:<br>Otras Unidades de sector Público:&nbsp'.$epi47.'<br>Unidades de Salud Privadas:&nbsp'.$epi48.'</div>

</div>

<div class="row"> <div class="col-xs-3"><h6>16. Hospitalizado:&nbsp'.$epi49.'</div><div class="col-xs-3"><h6>Fecha de hospitalización:&nbsp'.$epi50.'</div><div class="col-xs-2"><h6>
N° HCI:&nbsp&nbsp </div> <div class="col-xs-4"><h6>Servicio:&nbsp'.$epi51.'</div>

<div class="col-xs-6"><h6>Nombre del hospital:&nbsp'.$epi52.'</div> <div class="col-xs-6"><h6>17. Ingreso a UCI:&nbspSI:'.$epi53.'&nbsp&nbsp&nbsp&nbspNO:</div>

<div class="col-xs-4"><h6>18. Condicion egreso:</div><div class="col-xs-2"><h6>Vivo:&nbsp'.$epi54.'</div><div class="col-xs-2"><h6>Muerto:&nbsp'.$epi55.'</div><div class="col-xs-4"><h6>19. Fecha fallecimieto:&nbsp'.$epi56.'</div>


<div class="col-xs-4"><h6>20. Antecedente vacunal:&nbsp&nbspSI:'.$epi57.'&nbsp&nbsp&nbsp&nbspNO:&nbsp&nbsp</div><div class="col-xs-8"><h6>Desconoce:&nbsp'.$epi58.'</div>


<div class="col-xs-1"><h6>BCG:&nbsp:'.$epi59.'<br>FA:&nbsp:'.$epi60.' </div><div class="col-xs-1"><h6>HB:&nbsp'.$epi61.'<br>DT:&nbsp:'.$epi62.'</div>    <div class="col-xs-1"><h6>Rota:&nbsp'.$epi63.'<br>DPT:&nbsp:'.$epi64.'</div>    <div class="col-xs-1"><h6>OPV:&nbsp'.$epi65.'<br>dT:&nbsp:'.$epi66.'</div> <div class="col-xs-1"><h6>Penta:&nbsp'.$epi67.'<br>SRP:&nbsp:'.$epi68.'</div><div class="col-xs-3"><h6>Influenza:&nbsp'.$epi69.'<br>Varicela:&nbsp:'.$epi70.'</div> <div class="col-xs-3"><h6>Neumococo Conjugado:&nbsp'.$epi71.'br>Neumococo Polisacarido:&nbsp:'.$epi72.'</div> <div class="col-xs-1"><h6>SR:&nbsp'.$epi73.'<br>Otras:&nbsp:'.$epi74.'</div>



<div class="col-xs-4"><h6>21. Fecha de última dosis:&nbsp&nbsp&nbsp&nbsp'.$epi75.'</div><div class="col-xs-8"><h6>22. No de dosis recibidas:&nbsp'.$epi75a.'</div>
<div class="col-xs-3"><h6>23. Fuente de información:&nbsp&nbsp&nbsp</div>  <div class="col-xs-3"><h6>Tarjeta vacunación:&nbsp'.$epi76.'</div>
<div class="col-xs-3"><h6>Registro servicio salud:&nbsp'.$epi77.'</div>

<div class="col-xs-3"><h6>Verbal:&nbsp'.$epi78.'</div>

<div class="col-xs-12"><h6>24. Antecedente de
contacto con:</div>  

<div class="col-xs-2"><h6>Animal:&nbsp'.$epi79.'<br>Metanol:&nbsp'.$epi85.'</div>
<div class="col-xs-2"><h6>Persona sintomática:&nbsp'.$epi80.'<br>Metales pesados:&nbsp'.$epi86.'</div>
<div class="col-xs-2"><h6>Alimentos:&nbsp'.$epi81.'<br>Solventes:&nbsp'.$epi87.'</div>
<div class="col-xs-2"><h6>Agua/suelos:&nbsp'.$epi82.'<br>Plaguicidas:&nbsp'.$epi89.'</div>
<div class="col-xs-2"><h6>Basurales:&nbsp'.$epi83.'<br>Ninguno:&nbsp'.$epi84.'</div> <div class="col-xs-2"><h6>Otros:&nbsp'.$epi90.'</div>


<div class="col-xs-4"><h6>25. Lugar geográfico:&nbsp'.$epi91.'</div>  <div class="col-xs-4"><h6>Forma de contacto:&nbsp'.$epi92.'</div> 
<div class="col-xs-4"><h6>Origen/tipo/nombre del objeto de contacto:&nbsp'.$epi93.'</div> 

<div class="col-xs-12"><h6>26. Fecha de contacto:&nbsp'.$epi94.'</div> 

<div class="col-xs-12"><h6>27. En caso contacto con agua/alimentos, verifique su procedencia:</div> 

<div class="col-xs-2"><h6>Casa:&nbsp'.$epi95.'</div>
<div class="col-xs-2"><h6>Restaurante:&nbsp'.$epi96.'</div>
<div class="col-xs-2"><h6>Calle:&nbsp'.$epi97.'</div>
<div class="col-xs-2"><h6>Reunión social:&nbsp'.$epi98.'</div>
<div class="col-xs-4"><h6>Otro:&nbsp'.$epi99.'</div>

<div class="col-xs-12"><h6>28. Tipo de exposición:</div> 

<div class="col-xs-4"><h6>Ocupacional:&nbsp'.$epi100.'<br>Accidental:&nbsp'.$epi103.' </div>
<div class="col-xs-4"><h6>Intencional suicida:&nbsp'.$epi101.'<br>Intencional homicida:&nbsp'.$epi103a.' </div>
<div class="col-xs-4"><h6>Reacción adversa:&nbsp'.$epi102.'<br>Desconocida:&nbsp'.$epi104.' </div>
<div class="col-xs-22"><h6>Otras:&nbsp'.$epi105.'</div>

<div class="col-xs-4"><h6>29.Antecedentes de transfusión sanguínea:'.$epi106.'</div> 
<div class="col-xs-4"><h6>30.Embarazada:'.$epi107.'</div> 
<div class="col-xs-4"><h6> Semanas de gestación:'.$epi108.'</div> 


<div class="col-xs-4"><h6>31.Antecedentes de viaje, visitas:'.$epi109.'</div> 
<div class="col-xs-3"><h6>Lugar:'.$epi110.'</div> 
<div class="col-xs-5"><h6> Fecha de estadía Desde:'.$epi111.'&nbsp&nbspHasta:'.$epi112.'</div> 

<div class="col-xs-12"><h6>32.Caracterizar los factores de riesgo identificados:'.$epi113.'</div>
<div class="col-xs-12"><h6>33.Información de contactos periodo de incubación y transmisibilidad:'.$epi113.'</div>  </div>


 </table>'; 

 $epidemia1= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> 
  <div class="row">

<div class="col-xs-3"><h6>34.Se tomó muestra de laboratorio:'.$epi114.'</div> 
<div class="col-xs-3"><h6>35. Antes de dar tratamiento:'.$epi115.'</div> 
<div class="col-xs-6"><h6> 36.Tipo de muestra:'.$epi116.'</div> 
<div class="col-xs-12"><h6>37.Resultado de laboratorio:'.$epi117.'</div> 

<div class="col-xs-5"><h6>38.Diagnóstico definitivo:'.$epi118.'</div> 
<div class="col-xs-3"><h6>Confirmado por:&nbsp&nbspLaboratorio:'.$epi119.'</div> 
<div class="col-xs-2"><h6>Clinica:'.$epi120.'</div> 
<div class="col-xs-2"><h6>Nexo:'.$epi121.'</div> 


<div class="col-xs-6"><h6>39.Es caso aislado:'.$epi122.'</div> 
<div class="col-xs-6"><h6>Es parte de brote o epidemia:'.$epi123.'</div>  


<div class="col-xs-12"><h6>40. Actividades generales:</div> 
<div class="col-xs-4"><h6>Visita domiciliaria:'.$epi124.'<br>Búsqueda activa de casos:'.$epi127.'<br>Seguimiento de contactos:'.$epi130.'</div>  
<div class="col-xs-4"><h6>'.$epi125.'<br>'.$epi128.'<br>'.$epi131.'</div> 
<div class="col-xs-4"><h6>Observaciones:'.$epi126.'<br>N° de casos sospechosos encontrados:'.$epi129.'<br>Fecha de último día de seguimiento:'.$epi132.'</div> 


<div class="col-xs-12"><h6>41. Actividades específicas:</div> 

<div class="col-xs-4"><h6>Vacunación de bloqueo:'.$epi133.'<br>Profilaxis a los contactos:'.$epi136.'<br>Monitoreo rápido de cobertura:'.$epi139.'<br>Tratamiento de criadero de vectores:'.$epi141.'</div>  
<div class="col-xs-4"><h6>'.$epi134.'<br>'.$epi137.'<br>'.$epi140.'<br>'.$epi142.'</div> 
<div class="col-xs-4"><h6>Observaciones:'.$epi135.'<br>% de vacunados que se encontró:'.$epi143.'</div> 

<div class="col-xs-12"><h6>Describa otras actividades de control realizadas:'.$epi144.'</div> 
</div>

 </table>';





     

mysqli_query($conn3,"INSERT INTO reporteimagenologia(cliente_id, usuario_id, fecha, hora, estudio, descripcion, especificacion, motivo, resumen) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','$estudiosolicitado', '$estudio', '$anteCt11','$motivosolicitud','$resumenclinico');");


mysqli_query($conn3,"INSERT INTO epidemiologia
    (cliente_id, usuario_id, fecha, hora, epidemiologia , epidemiologia2, idTabla, datos) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','$epidemia','$epidemia1', '$CONTA','$datos');");

echo "INSERT INTO epidemiologia
    (cliente_id, usuario_id, fecha, hora, epidemiologia , epidemiologia2, idTabla, datos) VALUES  ('$clienteId', '$ID', '$fechar', '$hora','$epidemia','$epidemia1', '$CONTA','$datos');";


    $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica5 from epidemiologia where cliente_id= '$clienteId'");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica5=$rowhc['historiaClinica5'];
              }  







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

 


      mysqli_query($conn3,"INSERT INTO historiaObstetrica(cliente_id, usuario_id, Fecha, Hora,  motivoConsulta, organos, antrop, exaregional, diagnostico,receta, CIE1,CIE2,CIE3,CIE4,CIE5, personales ,familiares, enfermedad, diagnostico1, diagnostico2,diagnostico3,diagnostico4,diagnostico5, antedentesgine, vacunante, historialvacu,habitos) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$consulta', '$organost', '$antro', '$exaregional',  '$diagno', '$receta','$cie10D1','$cie10D2','$cie10D3','$cie10D4','$cie10D5','$perso','$fami','$enfermedadA', '$diagnostico1', '$diagnostico2', '$diagnostico3','$diagnostico4', '$diagnostico5','$antedentesgine','$vacunante','$historialvacu','$habitos');");


echo"INSERT INTO historiaObstetrica(cliente_id, usuario_id, Fecha, Hora,  motivoConsulta, organos, antrop, exaregional, diagnostico,receta, CIE1,CIE2,CIE3, personales ,familiares, enfermedad, diagnostico1, diagnostico2,diagnostico3, antedentesgine, vacunante, historialvacu,habitos) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$consulta', '$organost', '$antro', '$exaregional',  '$diagno', '$receta','$cie10D1','$cie10D2','$cie10D3','$perso','$fami','$enfermedadA', '$diagnostico1', '$diagnostico2', '$diagnostico3,'$antedentesgine','$vacunante','$historialvacu','$habitos');";



  $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica1 from historiaObstetrica where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinica1'];
              }   

 $queryListhc=mysqli_query($conn3,"SELECT diagnostico from historiaObstetrica where ID= $historiaClinica1");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $diagnosticoconsulta=$rowhc['diagnostico'];
              }




 mysqli_query($conn3,"INSERT INTO Ordenlaboratorio(cliente_id, usuario_id, Fecha, Hora,  datos, laboratorio,detallar, hematologia_final, drogasabuso_final, serologia_final, autoinmunidad_final, coproanalisis_final, coagulacion_final, enzimas_final, biologiamolecular_final, electro_final, anticuerpos_final, bacteriologia_final, quimica_final, marcadores_final, drogas_final, pruebashor_final, inmuno_final, orina_final, patologia_final, otrosexa_final, otros_laboratorios) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$datos', '$examen','$detallar','$hematologia_final', '$drogasabuso_final', '$serologia_final', '$autoinmunidad_final','$coproanalisis_final', '$coagulacion_final', '$enzimas_final', '$biologiamolecular_final', '$electro_final','$anticuerpos_final', '$bacteriologia_final','$quimica_final','$marcadores_final','$drogas_final','$pruebashor_final','$inmuno_final','$orina_final','$patologia_final' ,'$otrosexa_final', '$otros_laboratorios');");


echo "INSERT INTO Ordenlaboratorio(cliente_id, usuario_id, Fecha, Hora,  datos, laboratorio) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$datos', '$examen');";

$queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica2 from Ordenlaboratorio where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica2=$rowhc['historiaClinica2'];
              }   






 mysqli_query($conn3,"INSERT INTO test(cliente_id, usuario_id, Fecha, Hora, test) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',   '$test');");


echo "INSERT INTO test(cliente_id, usuario_id, Fecha, Hora, test) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',   '$test');";



  $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica3 from test where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica3=$rowhc['historiaClinica3'];
              }   






 mysqli_query($conn3,"INSERT INTO imagenologia(cliente_id, usuario_id, Fecha, Hora,  datos, laboratorio) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$datos', '$imagen')");


echo "INSERT INTO imagenologia(cliente_id, usuario_id, Fecha, Hora,  datos, laboratorio) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$datos', '$imagen');";


       
              $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica1 from imagenologia where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica4=$rowhc['historiaClinica1'];
              }   











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


echo "<script language='Javascript'> window.location='finalizadoObstetrica.php?historiaClinica1=$historiaClinica1&historiaClinica2=$historiaClinica2&historiaClinica3=$historiaClinica3&historiaClinica4=$historiaClinica4&historiaClinica5=$historiaClinica5';</script>";
?>