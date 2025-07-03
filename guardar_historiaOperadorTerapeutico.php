<?php
   //include 'header.php';
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
 //  include 'menu.php'; 



    date_default_timezone_set('America/Bogota');
    include("conexiones/conexion.php");
    $con=conectar();
 



             

        

        $ID                    = $_POST['ID'];          
        $cliente_id            = $_POST['clienteId'];          
        
        // datos de fecha y hora
        $fechar                = date("Y-m-d");
        $Afechar               = date("Y-m-d H:i:s");
        $hora                  = date("H:i:s");


   
  //CAMPOS HISTORIA VALORACION
        $nivel=reem($_POST['nivel']);
        $grados=reem($_POST['grados']);
        $date=reem($_POST['date']);
        $hijos=reem($_POST['hijos']);
        $acudiene=reem($_POST['acudiene']);
        $ide=reem($_POST['ide']);
        $tel=reem($_POST['tel']);
        $ocupacion=reem($_POST['ocupacion']);
        $alcohol1=reem($_POST['rs1']);
        $alcohol2=reem($_POST['rs2']);
        $alcohol3=reem($_POST['rs3']);
        $alcohol4=reem($_POST['rs4']);
        $calle=reem($_POST['rs5']);
        $solo=reem($_POST['rs6']);
 $basuco1=reem($_POST['rs7']);
 $basuco2=reem($_POST['rs8']);
 $basuco3=reem($_POST['rs9']); 
 $basuco4=reem($_POST['rs10']);
        $paques=reem($_POST['rs11']);
        $amigos=reem($_POST['rs12']);
        $marihuana1=reem($_POST['rs13']);
        $marihuana2=reem($_POST['rs14']);
        $marihuana3=reem($_POST['rs15']);
        $marihuana4=reem($_POST['rs16']);
       $ollas=reem($_POST['rs17']);
        $familia=reem($_POST['rs18']);
        $cocaina1=reem($_POST['rs19']);
        $cocaina2=reem($_POST['rs20']);
        $cocaina3=reem($_POST['rs21']);
        $cocaina4=reem($_POST['rs22']);
        $casap=reem($_POST['rs23']);
        $compañero=reem($_POST['rs24']);
        $sinteticas1=reem($_POST['rs25']);
        $sinteticas2=reem($_POST['rs26']);
        $sinteticas3=reem($_POST['rs27']);
        $sinteticas4=reem($_POST['rs28']);
        $amigos=reem($_POST['rs29']);
        $desconocidos=reem($_POST['rs30']);
         $heroina1=reem($_POST['rs31']);
         $heroina2=reem($_POST['rs32']);
         $heroina3=reem($_POST['rs33']);
         $heroina4=reem($_POST['rs34']);
         $montes=reem($_POST['rs35']);
         $otros=reem($_POST['rs36']);
         $inhalantes1=reem($_POST['rs37']);
         $inhalantes2=reem($_POST['rs38']);
         $inhalantes3=reem($_POST['rs39']);
         $inhalantes4=reem($_POST['rs40']);
 $nicotina1=reem($_POST['rs41']);
 $nicotina2=reem($_POST['rs42']); 
 $nicotina3=reem($_POST['rs43']); 
 $nicotina4=reem($_POST['rs44']);
$observac=reem($_POST['observac']);


         $unavez1=reem($_POST['unavez1']);
         $dosvez1=reem($_POST['dosvez1']);
         $mas3veces1=reem($_POST['mas3veces1']);
         $diariamente1=reem($_POST['diariamente1']);
         $dosis1=reem($_POST['dosis1']);
         $unavez2=reem($_POST['unavez2']);
         $dosvez2=reem($_POST['dosvez2']);
         $mas3veces2=reem($_POST['mas3veces2']);
         $diariamente2=reem($_POST['diariamente2']);
         $dosis2=reem($_POST['dosis2']);
         $unavez3=reem($_POST['unavez3']);
         $dosvez3=reem($_POST['dosvez3']);
         $mas3veces3=reem($_POST['mas3veces3']);
         $diariamente3=reem($_POST['diariamente3']);
         $dosis4=reem($_POST['dosis4']);
         $unavez4=reem($_POST['unavez4']);
         $dosvez4=reem($_POST['dosvez4']);
         $mas3veces4=reem($_POST['mas3veces4']);
         $diariamente4=reem($_POST['diariamente4']);
         $dosis4=reem($_POST['dosis4']);
         $Observaciones4=reem($_POST['Observaciones']);  
         $dias=reem($_POST['dias']);
         $porq=reem($_POST['porq']);
         $tratamiento=reem($_POST['tratamiento']);
         $Entidad=reem($_POST['Entidad']);
         $Teoterapia=reem($_POST['Teoterapia2']);
         $psiquiatrico=reem($_POST['psiquiatrico']);
         $Terapeutica=reem($_POST['Terapeutica']);
         $Clinico=reem($_POST['Clinico']);
         $Otro=reem($_POST['Otro']);
     $nivelfísico=reem($_POST['nivelfísico']);
         $nivelfamiliar=reem($_POST['nivelfamiliar']);
         $nivelSocial=reem($_POST['nivelSocial']);
          $deteriodo=reem($_POST['deteriodo']);
         $consumo=reem($_POST['consumo']);
         $enfermedad=reem($_POST['enfermedad']);
         $Detalle1=reem($_POST['Detalle1']);
         $seguro =reem($_POST['seguro ']);
         $Detalle2=reem($_POST['Detalle2']);
         $txpsicologico=reem($_POST['txpsicologico']);
         $Detalle3=reem($_POST['Detalle3']);
         $txpsiquiatrico=reem($_POST['txpsiquiatrico']);
         $Detalle4=reem($_POST['Detalle4']);
         $examenmedico=reem($_POST['examenmedico']);
         $Detalle5=reem($_POST['Detalle5']);
         $Tomamedicinas=reem($_POST['Tomamedicinas']);
         $Detalle6=reem($_POST['Detalle6']);
         $Elisa=reem($_POST['Elisa']);
         $Detalle7=reem($_POST['Detalle7']);
        $cirugias=reem($_POST['cirugias']);
         $Detalle8=reem($_POST['Detalle8']);
         $hospitalizado=reem($_POST['hospitalizado']);
         $Detalle9=reem($_POST['Detalle9']);
         $voluntario=reem($_POST['voluntario']);
         $Detalle10=reem($_POST['Detalle10']);
         $presion=reem($_POST['presion']);
         $justicia=reem($_POST['justicia']);
         $Detalle11=reem($_POST['Detalle11']);
         $necesidad =reem($_POST['necesidad']);
         $Detalle12=reem($_POST['detalle12']);
         $expectativas=reem($_POST['expectativas']);
         $dificultad=reem($_POST['dificultad']);
         $entrevistador=reem($_POST['entrevistador']);
         $suspenderconsumo=reem($_POST['suspenderconsumo']);
         $dominio=reem($_POST['dominio']);
         $estilo =reem($_POST['estilo']);
         $autoestima=reem($_POST['autoestima']);
         $interpersonales=reem($_POST['interpersonales']);
         $estilovida=reem($_POST['estilovida']);
         $Recuperarfamilia=reem($_POST['Recuperarfamilia']);
       $creencia =reem($_POST['creencia']);
         $aspectofisico=reem($_POST['aspectofisico']);
         $problemas=reem($_POST['problemas']);
         $empleo=reem($_POST['empleo']);
         $conductasagresiva=reem($_POST['conductasagresiva']);
         $consumo=reem($_POST['consumo']);
         $confianza=reem($_POST['confianza']);
         $capacidades=reem($_POST['capacidades']);
         $Consumir=reem($_POST['Consumir']);
         $beneficios=reem($_POST['beneficios']);
         $enfrentar=reem($_POST['enfrentar']);
         $estatus=reem($_POST['estatus']);
         $creeDios =reem($_POST['creeDios']);
         $religion=reem($_POST['religion']);
         $dios=reem($_POST['dios']);
         $partespiritual=reem($_POST['partespiritual']);
         $aspectoespiritual=reem($_POST['aspectoespiritual']);
         $preliminares=reem($_POST['preliminares']);
         $sintesis =reem($_POST['sintesis']);
         $limitaciones=reem($_POST['limitaciones']);
         $Notasimpresiones=reem($_POST['Notasimpresiones']);

         $aspirante=reem($_POST['aspirante']);
         $Ingreso=reem($_POST['Ingreso']);
         $RemitidoSede=reem($_POST['RemitidoSede']);
         $Condicionamientos =reem($_POST['Condicionamientos']);
         $NombreEntrevistador=reem($_POST['NombreEntrevistador']);
         $Notasimpresiones=reem($_POST['Notasimpresiones']);

$tiempolibre=reem($_POST['tiempolibre']);


 $drogasinicio=$alcohol1.$basuco1.$marihuana1.$cocaina1.$sinteticas1.$heroina1.$inhalantes1.$nicotina1;
 $drogassecundarias=$alcohol2.$basuco2.$marihuana2.$cocaina2.$sinteticas2.$heroina2.$inhalantes2.$nicotina12;
 $drogasteriarias=$alcohol3.$basuco3.$marihuana3.$cocaina3.$sinteticas3.$heroina3.$inhalantes3.$nicotina13;
 $drogasimpacto=$alcohol4.$basuco4.$marihuana4.$cocaina4.$sinteticas4.$heroina4.$inhalantes4.$nicotina4;
 $lugarescons=$calle.$paques.$ollas.$casap.$amigos.$montes;
 $compañia=$solo.$amigos.$familia.$compañero.$desconocidos.$otros;

$drogasino=$unavez1.$dosvez1.$mas3veces1.$diariamente1.$dosis1;
$drogasecun=$unavez2.$dosvez2.$mas3veces2.$diariamente2.$dosis2;
$drogasterc=$unavez3.$dosvez3.$mas3veces3.$diariamente3.$dosis3;
$drogasimpa=$unavez4.$dosvez4.$mas3veces4.$diariamente4.$dosis4;

$tipo_trata=$Teoterapia.$psiquiatrico.$Terapeutica.$Clinico.$Otro;
        
        
   $estadosalud= $enfermedad.$Detalle1.$seguro.$Detalle2.$txpsicologico.$Detalle3.$txpsiquiatrico.$Detalle4.$examenmedico.$Detalle5.$Tomamedicinas.$Detalle6.$Elisa.$Detalle7.$cirugias.$Detalle8.$hospitalizado.$Detalle9;  
       




     if(strlen($nivel) > 1){$eexp1= '<table class="table table-bordered"><tr> <td>Nivel de estudios: '. $nivel.'</td>';}
      if(strlen($grados) > 1){$eexp2= '<td>N° de grados o semestres cursados: '.$grados.'</td>';}
      if(strlen($date) > 1){$eexp3= '<td>Fecha de Ingreso: '.$date.'</td></tr>';}
      if(strlen($hijos) > 1){$eexp4= '<tr><td>Numero de Hijos: '.$hijos.'</td>';}
      if(strlen($acudiene) > 1){$eexp5= '<tr><th colspan="4"> Datos del Acudiente</th></tr> <tr> <td>Nombre de Acudiente: '.$acudiene.'</td>';}
 
    if(strlen($ide) > 1){$eexp6= '<td>Identificación: '.$ide.'</td>';}
       if(strlen( $tel) > 1){$eexp7= '<td>Telefono: '.$tel.'</td>';}
       if(strlen($ocupacion) > 1){$eexp8= '<td>Ocupación: '.$ocupacion.'</td></tr>';}
        if(strlen($tiempolibre) > 1){$eexp72= '<td>Actividades en timepo libre: '.$tiempolibre.'</td></tr>';}
      if(strlen($drogasinicio) > 1){$eexp9= '<tr><th colspan="4"> Información sobre el consumo de sustancias Psicoactivas </th></tr> <tr><td> A). Sustancias de Inicio , Lugares y Compañias de Consumo</td></tr><tr><td>Droga de Inicio: '.$drogasinicio.'</tr>';} 
      if(strlen($drogassecundarias) > 1){$eexp10= '<tr><td>Droga Secundarias: '.$drogassecundarias.'</td></tr>';}  
     
      if(strlen($drogasteriarias) > 1){$eexp11= '<tr><td>Droga Terciaria: '.$drogasteriarias.'</td></tr>';}
      if(strlen($drogasimpacto) > 1){$eexp12= '<tr><td>Droga de + IMPACTO: '.$drogasimpacto.'</td></tr>';}
      if(strlen($lugarescons) > 1){$eexp13= '<tr><td>Lugares:  '.$lugarescons.'</td></tr>';}
      if(strlen($compañia) > 1){$eexp14= '<tr><td>Compañias: '.$compañia.'</td></tr>';}
      if(strlen($observac) > 1){$eexp73= '<tr><td>Observaciones: '.$observac.'</td></tr>';}
     

      if(strlen($drogasino) > 1){$eexp15= '<tr><td> B). Detalles del consumo, dosis y frecuencias</td> </tr><tr><td>Droga de Inicio: '.$drogasino.'</td></tr>';} 
       
      if(strlen($drogasecun) > 1){$eexp16= '<tr><td>Droga Secundaria:'.$drogasecun.'</td></tr>';}
      if(strlen($drogasterc) > 1){$eexp17= '<tr><td>Droga Terciaria: '.$drogasterc.'</td><tr>';}
      if(strlen($drogasimpa) > 1){$eexp18= '<tr><td>Droga de + IMPACTO: '.$drogasimpa.'</td></tr>';}


      if(strlen($Observaciones) > 1){$eexp19= '<tr><td>Observaciones '.$Observaciones.'</td></tr>';}  
      if(strlen($dias) > 1){$eexp20= '<tr><td>Dias de mayor Consumo:'.$dias.'</td>';}
      if(strlen($porq) > 1){$eexp21= '<td>Por qué?: '.$porq.'</td>';}
      if(strlen($tratamiento) > 1){$eexp22= '<td>Ha recibido tratamiento para la adicción?: '.$tratamiento.'</td></tr>';}
      if(strlen($Entidad) > 1){$eexp23= '<tr><td>Entidad:'. $Entidad.'</td>';}
      if(strlen($tipo_trata) > 1){$eexp24= '<td>Tipo de tratamiento: '.$tipo_trata.'</td></tr>';}

       if(strlen($nivelfísico) > 1){$eexp25= '<tr><td> C). Consecuencias del consumo (Describa el impacto del consumo en su vida)</td> </tr><tr><td>A nivel físico: '.$nivelfísico.'</td>';} 
       
      if(strlen( $nivelfamiliar) > 1){$eexp26= '<td>A nivel familiar: '. $nivelfamiliar.'</td>';}
      if(strlen($nivelSocial) > 1){$eexp27= '<td>A nivel Social: '.$nivelSocial.'</td>';}
      if(strlen($deteriodo) > 1){$eexp74= '<td>A Deteriodo presentado: '.$deteriodo.'</td>';}
      if(strlen($consumo) > 1){$eexp28= '<td>Cuando cosideró que el consumo de drogas era un problema? '.$consumo.'</td></tr>';}

if(strlen($estadosalud) > 1){$eexp29= '<tr><th colspan="4"> Estado de Salud:</th></tr><tr><td> '.$estadosalud.'</td></tr>';}  
if(strlen($voluntario) > 1){$eexp30= '<tr><th colspan="4"> Actitud Frente al Problema </th></tr><tr><td>¿Su ingreso al programa es voluntario? y por que quiere cambiar? '.$voluntario.'</td></tr>';} 

if(strlen($presion) > 1){$eexp31= '<tr><td>Que presión lo indujo a la búsqueda del proceso?: '.$presion.'</td>';}
if(strlen($justicia) > 1){$eexp32= '<td>¿Tiene problemas con la justicia?: '.$justicia.'</td>';}
if(strlen($Detalle11) > 1){$eexp33= '<td>Detalle de los problemas judiciales: '.$Detalle11.'</td></tr>';}
if(strlen($necesidad) > 1){$eexp34= '<tr><td>¿Considera usted la necesidad de un tratamiento?: '.$necesidad.'</td>';}
if(strlen($Detalle12) > 1){$eexp35= '<td>Por qué?: '.$Detalle12.'</td>';}
if(strlen($expectativas) > 1){$eexp36= '<td>¿Que expectativas tiene frente al programa?: '.$expectativas.'</td></tr>';}

if(strlen($dificultad) > 1){$eexp37= '<tr><td>Cuál cree usted que será la mayor dificultad para dejar de usar drogas?: '.$dificultad.'</td>';}


if(strlen($entrevistador) > 1){$eexp38= '<td>observaciones del entrevistador sobre la actitud del usuario frente al proceso: '.$entrevistador.'</td></tr>';}

if(strlen($suspenderconsumo) > 1){$eexp39= '<tr> A). Cuestionario de metas </tr><tr><td>Suspender el consumo: '.$suspenderconsumo.'</td>';}
if(strlen($dominio) > 1){$eexp40= '<td>recuperar dominio sobre si mismo: '.$dominio.'</td>';}
if(strlen($estilo) > 1){$eexp41= '<td>Cambiar de estilo de vida: '.$estilo.'</td></tr>';}
if(strlen($autoestima) > 1){$eexp42= '<tr><td>Elevar el autoestimae si mismo: '.$autoestima.'</td>';}
if(strlen($interpersonales) > 1){$eexp43= '<td>Mejorar relaciones interpersonales: '.$interpersonales.'</td>';}
if(strlen($estilovida) > 1){$eexp44= '<td>Adquirir un estilo de vida sano: '.$estilovida.'</td></tr>';}
if(strlen($Recuperarfamilia) > 1){$eexp45= '<tr><td>Recuperar a la familia: '.$Recuperarfamilia.'</td>';}
if(strlen($creencia )> 1){$eexp46= '<td>Cambiar el sistema de creencias: '.$creencia.'</td>';}
if(strlen($aspectofisico) > 1){$eexp47= '<td>Mejorar el aspecto fisico '.$aspectofisico.'</td></tr>';}
if(strlen($problemas) > 1){$eexp48= '<tr><td>Trabajar problemas que me afectan: '.$problemas.'</td>';}
if(strlen($empleo) > 1){$eexp49= '<td>Recuperar el empleo: '.$empleo.'</td>';}
if(strlen($conductasagresiva) > 1){$eexp50= '<td>Cambiar conductas agresivas: '.$conductasagresiva.'</td></tr>';}

if(strlen($consumo) > 1){$eexp51= '<tr><td>Manejar el consumo: '.$consumo.'</td>';}
if(strlen($confianza) > 1){$eexp52= '<td>Recuperar confianza en la familia: '.$confianza.'</td>';}
if(strlen($capacidades) > 1){$eexp53= '<td>Recuperar capacidades perdidas por el consumo '.$capacidades.'</td></tr>';}
if(strlen($problemas) > 1){$eexp54= '<tr><td>Consumir de vez en cuando ( solo en fiestas): '.$problemas.'</td>';}
if(strlen($beneficios) > 1){$eexp55= '<td>Lograr beneficios ofrecidos por la familia: '.$beneficios.'</td></tr>';}
if(strlen($enfrentar) > 1){$eexp56= '<td>Aprender a enfrentar los problemas: '. $enfrentar.'</td>';}

if(strlen($estatus) > 1){$eexp57= '<tr><td>Adquirir estatus o posición social: '.$estatus.'</td></tr>';}
if(strlen($creeDios) > 1){$eexp58= '<tr><th colspan="4"> Aspecto espiritual:</th></tr><td>¿cree usted en Dios? : '.$creeDios.'</td>';} 
if(strlen($religion) > 1){$eexp59= '<td>A que religión pertenece?: '.$religion.'</td></tr>';}
if(strlen($dios) > 1){$eexp60= '<tr><td>¿Por que cree en Dios?: '.$dios.'</td>';}
if(strlen($partespiritual) > 1){$eexp61= '<td>Como cree usted que la parte espiritual tiene que ver con su proceso de tratamiento? '.$partespiritual.'</td></tr>';}

if(strlen($aspectoespiritual) > 1){$eexp62= '<tr><td>Observaciones sobre el aspecto espiritual: '.$aspectoespiritual.'</td>';}
if(strlen($preliminares) > 1){$eexp63= '<td>Notas preliminares '.$preliminares.'</td></tr>';}

if(strlen($sintesis) > 1){$eexp64= '<tr><th colspan="4"> Observaciones generales del entrevistador (síntesis de la entrevista)</th>
</tr><tr><td>'.$sintesis.'</td>';} 
if(strlen($limitaciones) > 1){$eexp65= '<td>Descripción de las limitaciones físicas y/o mentales al momento de la entrevista: '.$limitaciones.'</td></tr>';}
if(strlen($Notasimpresiones) > 1){$eexp66= '<tr><td>Notas e impresiones del entrevistador: '.$Notasimpresiones.'</td></tr>';}

if(strlen($sintesis) > 1){$eexp67= '<tr><th colspan="4"> Aspectos sobre la Admisión</th>
</tr><tr><td>El aspirante ha sido informado sobre el programa y sus normas?: '.$aspirante.'</td>';} 
if(strlen($Ingreso) > 1){$eexp68= '<td>Ingreso autorizado por: '.$Ingreso.'</td></tr>';}
if(strlen($RemitidoSed) > 1){$eexp69= '<tr><td>Remitido Sede: '.$RemitidoSed.'</td>';}
if(strlen($Condicionamientos) > 1){$eexp70= '<td>Condicionamientos para el ingreso: '.$Condicionamientos.'</td></tr>';}
if(strlen($NombreEntrevistador) > 1){$eexp71= '<tr><td>Nombre del Entrevistador: '.$NombreEntrevistador.'';}







$entrevista=$eexp1.$eexp2.$eexp3.$eexp4.$eexp5.$eexp6.$eexp7.$eexp8.$eexp72.$eexp9.$eexp10.$eexp11.$eexp12.$eexp13.$eexp14.$eexp73.$eexp15.$eexp16.$eexp17.$eexp18.$eexp19.$eexp20.$eexp21.$eexp22.$eexp23.$eexp24.$eexp25.$eexp26.$eexp27.$eexp74.$eexp28.$eexp29.$eexp30.$eexp31.$eexp32.$eexp33.$eexp34.$eexp35.$eexp36.$eexp37.$eexp38.$eexp39.$eexp40.$eexp41.$eexp42.$eexp43.$eexp44.$eexp45.$eexp46.$eexp47.$eexp48.$eexp49.$eexp50.$eexp51.$eexp52.$eexp53.$eexp54.$eexp55.$eexp56.$eexp57.$eexp58.$eexp59.$eexp60.$eexp61.$eexp62.$eexp63.$eexp64.$eexp65.$eexp66.$eexp67.$eexp68.$eexp69.$eexp70.$eexp71.'</td></tr></table>';
  

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));





            mysqli_query($conn3,"INSERT INTO historiaClinica_operador 
(cliente_id, usuario_id, Fecha,     Hora,    entrevista) VALUES 
('$cliente_id ', '$ID',    '$fechar', '$hora','$entrevista');");



echo "INSERT INTO historiaClinica_operador 
(cliente_id, usuario_id, Fecha,     Hora,    entrevista) VALUES 
('$cliente_id ', '$ID',    '$fechar', '$hora','$entrevista');";
 








              $queryListhc=mysqli_query($conn3,"SELECT MAX(id) as operador  from historiaClinica_operador ");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['operador'];
              }   




echo "<script language='Javascript'> window.location='finalizadoOperador.php?historiaClinica1=$historiaClinica1';</script>"; 



?>