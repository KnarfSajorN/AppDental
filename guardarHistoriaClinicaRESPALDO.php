<?php
   //include 'header.php';
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
 //  include 'menu.php'; 



    date_default_timezone_set('America/Bogota');
    include("conexiones/conexion.php");
    $con=conectar();
 
        $registro              = $_POST['registro'];          
        $ID                    = $_POST['ID'];          
        $clienteId             = $_POST['clienteId'];          
       
        $motivoConsulta        = reem($_POST['motivoConsulta']);      
        $motivo                = reem($_POST['motivo']);      
        $diagnostico           = reem($_POST['diagnostico']); 
        $NOMBRE_USUARIO        = reem($_POST['NOMBRE_USUARIO']); 
        $tratamiento           = reem($_POST['tratamiento']);

        $Afecha                = $_POST['fecha'];        
        $Ahora                 = $_POST['hora'];        
        $email                 = $_POST['email'];        
        $nombre                = reem($_POST['nombre']);        
        $telefono              = $_POST['telefono'];        
               
        $notas                 = reem($_POST['notas']);
        $cie10                 = $_POST['cie10'];

        $recipe                = reem($_POST['recipe']);        
        $incapacidades         = reem($_POST['incapacidades']);        
        $prestaciones          = reem($_POST['prestaciones']);   
        
        $prestaciones1         = reem($_POST['prestaciones1']);   
        $prestaciones2         = reem($_POST['prestaciones2']);   

        $activo                = 1;
        $fechar                = date("Y-m-d");
        $Afechar               = date("Y-m-d H:i:s");
        $hora                  = date("H:i:s");
       


        $P                     = $_POST['P'];  
        $doctor                     = $_POST['doctor'];  
        $motivo                = reem($_POST['motivo']);   



        $enfermedadActual         = reem($_POST['enfermedadActual']);   
        $acompananteFamiliar         = reem($_POST['acompananteFamiliar']);   
        $telefono_acompanante         = reem($_POST['telefono_acompanante']);   


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
        $rs17                 = $_POST['rs17'];        
        $rs18                 = $_POST['rs18'];

        $p1                 = $_POST['p1'];        
        $p2                 = reem($_POST['p2']);  
if ($p1 <> '') {$p1i = ' Para clínicos : '.sino($p1).'<trong> | </trong>';$paraClinicos = $p1i.$p2;}

        
        $r1                 = $_POST['r1'];        
        $r2                 = reem($_POST['r2']);  
if ($r1 <> '') {$r1i = ' Remisión : '.sino($r1).'<trong> | </trong>';$remision = $r1i.$r2;}



 
        $diagnosticoMsalud                 = reem($_POST['diagnosticoMsalud']);        
        $comoTomarlo                 = reem($_POST['comoTomarlo']);        
        









        if ($rs1 <> '') {$s1 = ' Fiebre : '.sino($rs1).'<trong> | </trong>';}
        if ($rs2 <> '') {$s2 = ' Tos: '.sino($rs2).'<trong> | </trong>';}
        if ($rs3 <> '') {$s3 = ' Rinorrea: '.sino($rs3).'<trong> | </trong>';}
        if ($rs4 <> '') {$s4 = ' Cefalea: '.sino($rs4).'<trong> | </trong>';}
        if ($rs5 <> '') {$s5 = ' Mareo: '.sino($rs5).'<trong> | </trong>';}
        if ($rs6 <> '') {$s6 = ' Vomito: '.sino($rs6).'<trong> | </trong>';}
        if ($rs7 <> '') {$s7 = ' Diarrea: '.sino($rs7).'<trong> | </trong>';}
        if ($rs8 <> '') {$s8 = ' Disuria: '.sino($rs8).'<trong> | </trong>';}
        if ($rs9 <> '') {$s9 = ' Dolor de Garganta: '.sino($rs9).'<trong> | </trong>';}
        if ($rs10 <> '') {$s10 = ' Dolor Adominal: '.sino($rs10).'<trong> | </trong>';}
        if ($rs11 <> '') {$s11 = ' Disnea: '.sino($rs11).'<trong> | </trong>';}
        if ($rs12 <> '') {$s12 = ' Otalgia: '.sino($rs12).'<trong> | </trong>';}
        if ($rs13 <> '') {$s13 = ' Perdida de Peso: '.sino($rs13).'<trong> | </trong>';}
        if ($rs14 <> '') {$s14 = ' Sangre en las heces o al defecar: '.sino($rs14).'<trong> | </trong>';}
        if ($rs15 <> '') {$s15 = ' Hematuria: '.sino($rs15).'<trong> | </trong>';}
        if ($rs16 <> '') {$s16 = ' Dolor en las extremidades: '.sino($rs16).'<trong> | </trong>';}
        if ($rs17 <> '') {$s17 = ' Parestesias: '.sino($rs17).'<trong> | </trong>';}
        if ($rs18 <> '') {$s18 = ' Hipoestesias: '.sino($rs18).'<trong> | </trong>';}

        $rSistema = $s1.$s2.$s3.$s4.$s5.$s6.$s7.$s8.$s9.$s10.$s11.$s12.$s13.$s14.$s15.$s16.$s17.$s18;  







// *********************************************************    TABLA  examenFisico *********************************************************
// *********************************************************    TABLA  examenFisico *********************************************************


        $peso                 = $_POST['peso'];        
        $altura               = $_POST['altura'];        
        $imc                  = $_POST['imc'];        
        $ComposicionCorporal  = $_POST['ComposicionCorporal']; 

        $tart1                = $_POST['tart1'];        
        $temperatura          = $_POST['temperatura'];        
        $fcard                = $_POST['fcard'];        
        $sat                  = $_POST['sat'];        
       



        $e11                 = $_POST['e11'];
        $e12                 = $_POST['e12'];
        $e13                 = $_POST['e13'];

if ($e11 <> '') {$ei11 = ' Buen estado general : '.sino($e11).'<trong> | </trong>';}
if ($e12 <> '') {$ei12 = ' Febril al tacto : '.sino($e12).'<trong> | </trong>';}
if ($e13 <> '') {$ei13 = ' Irritable  : '.sino($e13).'<trong> | </trong>';}

$estadoGeneral = $ei11.$ei12.$ei13;



        $e21                 = $_POST['e21'];
        $e22                 = $_POST['e22'];
        $e23                 = $_POST['e23'];

if ($e21 <> '') {$ei21 = ' Alerta  : '.sino($e21).'<trong> | </trong>';}
if ($e22 <> '') {$ei22 = ' Somnoliento  : '.sino($e22).'<trong> | </trong>';}
if ($e23 <> '') {$ei23 = ' Inconciente   : '.sino($e23).'<trong> | </trong>';}

$estadoConciencia = $ei21.$ei22.$ei23;

        $e31                 = $_POST['e31'];
        $e32                 = $_POST['e32'];
        $e33                 = $_POST['e33'];
        $e34                 = $_POST['e34'];
        $e35                 = $_POST['e35'];


if ($e31 <> '') {$ei31 = ' Reaccion pupilar N   : '.sino($e31).'<trong> | </trong>';}
if ($e32 <> '') {$ei32 = ' Ojo Rojo  : '.sino($e32).'<trong> | </trong>';}
if ($e33 <> '') {$ei33 = ' Dolor ocular    : '.sino($e33).'<trong> | </trong>';}
if ($e34 <> '') {$ei34 = ' Nistagmo   : '.sino($e34).'<trong> | </trong>';}
if ($e35 <> '') {$ei35 = ' Pterigión   : '.sino($e35).'<trong> | </trong>';}

$ojos = $ei31.$ei32.$ei33.$ei34.$ei35;



        $e41                 = $_POST['e41'];
        $e42                 = $_POST['e42'];
        $e43                 = $_POST['e43'];


if ($e41 <> '') {$ei41 = ' Dolor a la exploración : '.sino($e41).'<trong> | </trong>';}
if ($e42 <> '') {$ei42 = ' Exsudados en CAE : '.sino($e42).'<trong> | </trong>';}
if ($e43 <> '') {$ei43 = ' Cambios en timpanos : '.sino($e43).'<trong> | </trong>';}

$otoscopia = $ei41.$ei42.$ei43;

 
        $e51                 = $_POST['e51'];
        $e52                 = $_POST['e52'];
        $e53                 = $_POST['e53'];
        $e54                 = $_POST['e54'];
        $e55                 = $_POST['e55'];



if ($e51 <> '') {$ei51 = ' Mucosa Oral : '.hs($e51).'<trong> | </trong>';}
if ($e52 <> '') {$ei52 = ' Aftas Bucales : '.sino($e52).'<trong> | </trong>';}
if ($e53 <> '') {$ei53 = ' Gingivitis : '.sino($e53).'<trong> | </trong>';}
if ($e54 <> '') {$ei54 = ' Caries : '.sino($e54).'<trong> | </trong>';}
if ($e55 <> '') {$ei55 = ' Faringe: '.$e55.'<trong> | </trong>';}

$cavidadOral = $ei51.$ei52.$ei53.$ei54.$ei55;





        $e61                 = $_POST['e61'];
        $e62                 = $_POST['e62'];
        $e63                 = $_POST['e63'];
        $e64                 = $_POST['e64'];
        $e65                 = reem($_POST['e65']);

 
if ($e61 <> '') {$ei61 = ' Movilidad Normal : '.sino($e61).'<trong> | </trong>';}
if ($e62 <> '') {$ei62 = ' Adenomegalias : '.sino($e62).'<trong> | </trong>';}
if ($e63 <> '') {$ei63 = ' Masa Palpable  : '.sino($e63).'<trong> | </trong>';}
if ($e64 <> '') {$ei64 = ' Bocio : '.sino($e64).'<trong> | </trong>';}
if ($e65 <> '') {$ei65 = ' Aneurisma : '.$e65.'<trong> | </trong>';}

$cuello = $ei61.$ei62.$ei63.$ei64.$ei65;



        $e71                 = $_POST['e71'];
        $e72                 = $_POST['e72'];
        $e73                 = $_POST['e73'];
        $e74                 = $_POST['e74'];
        $e75                 = $_POST['e75'];
        $e76                 = $_POST['e76'];
        $e77                 = reem($_POST['e77']);

 
if ($e71 <> '') {$ei71 = ' Pulmones claros y bien ventilados : '.sino($e71).'<trong> | </trong>';}
if ($e72 <> '') {$ei72 = ' Roncus : '.sino($e72).'<trong> | </trong>';}
if ($e73 <> '') {$ei73 = ' Silibancias  : '.sino($e73).'<trong> | </trong>';}
if ($e74 <> '') {$ei74 = ' Estertores : '.sino($e74).'<trong> | </trong>';}
if ($e75 <> '') {$ei75 = ' Crepitantes  : '.sino($e75).'<trong> | </trong>';}
if ($e76 <> '') {$ei75 = ' Hipoventilacion  : '.sino($e76).'<trong> | </trong>';}
if ($e77 <> '') {$ei75 = ' Anotaciones  : '.$e77.'<trong> | </trong>';}

$torax = $ei71.$ei72.$ei73.$ei74.$ei75.$ei76.$ei77;




        $e81                 = $_POST['e81'];
        $e82                 = $_POST['e82'];
        $e83                 = $_POST['e83'];
        $e84                 = reem($_POST['e84']);


if ($e81 <> '') {$ei81 = ' Ruidos cardiacos normales  : '.sino($e81).'<trong> | </trong>';}
if ($e82 <> '') {$ei82 = ' Soplo : '.sino($e82).'<trong> | </trong>';}
if ($e83 <> '') {$ei83 = ' Arritmia  : '.sino($e83).'<trong> | </trong>';}
if ($e84 <> '') {$ei84 = ' Anotaciones  : '.$e84.'<trong> | </trong>';}

$torax = $ei81.$ei82.$ei83.$ei84;



        $e91                 = $_POST['e91'];
        $e92                 = $_POST['e92'];
        $e93                 = $_POST['e93'];
        $e94                 = $_POST['e94'];
        $e95                 = $_POST['e95'];
        $e96                 = $_POST['e96'];
        $e97                 = reem($_POST['e97']);
if ($e91 <> '') {$ei91 = ' Blando : '.sino($e91).'<trong> | </trong>';}
if ($e92 <> '') {$ei92 = 'Dolor a la exploración : '.sino($e92).'<trong> | </trong>';}
if ($e93 <> '') {$ei93 = ' Peristalsis aumentada  : '.sino($e93).'<trong> | </trong>';}
if ($e94 <> '') {$ei94 = ' Hepatomegalia: '.sino($e94).'<trong> | </trong>';}
if ($e95 <> '') {$ei95 = ' Hernia: '.sino($e95).'<trong> | </trong>';}
if ($e96 <> '') {$ei96 = ' Esplenomegalia: '.sino($e96).'<trong> | </trong>';}
if ($e97 <> '') {$ei97 = ' Anotaciones: '.$e97.'<trong> | </trong>';}

$corazon = $ei91.$ei92.$ei93.$ei94.$ei95;
 



        $e101                 = $_POST['e101'];
        $e102                 = $_POST['e102'];
        $e103                 = $_POST['e103'];
        $e1031                = $_POST['e1031'];
        $e104                 = $_POST['e104'];
        $e105                 = $_POST['e105'];
        $e106                 = $_POST['e106'];
        $e107                 = $_POST['e107'];
if ($e101 <> '') {$ei101 = ' Dolor suprapúblico : '.sino($e101).'<trong> | </trong>';}
if ($e102 <> '') {$ei102 = 'Masa suprapública : '.sino($e102).'<trong> | </trong>';}
if ($e103 <> '') {$ei103 = ' Peñopercusión dolorosa  : '.sino($e103).'<trong> | </trong>';}
if ($e1031 <> '') {$ei1031 = ' Nota : '.sino($e1031).'<trong> | </trong>';}
if ($e104 <> '') {$ei104 = ' Ulcera Genital : '.sino($e104).'<trong> | </trong>';}
if ($e105 <> '') {$ei105 = ' Verrugas genitales : '.sino($e105).'<trong> | </trong>';}
if ($e106 <> '') {$ei106 = ' Flujo vaginal : '.sino($e106).'<trong> | </trong>';}
if ($e107 <> '') {$ei107 = ' Varicocele : '.sino($e107).'<trong> | </trong>';}

$abdomen = $ei101.$ei102.$ei103.$ei1031.$ei104.$ei105.$ei106.$ei107;
 




        $e111                 = $_POST['e111'];
        $e112                 = $_POST['e112'];
        $e113                 = $_POST['e113'];
        $e114                 = $_POST['e114'];
        $e115                 = $_POST['e115'];
        $e116                 = $_POST['e116'];
        $e117                 = reem($_POST['e117']);
if ($e111 <> '') {$ei111 = ' Movilidad Normal  : '.sino($e111).'<trong> | </trong>';}
if ($e112 <> '') {$ei112 = ' Fuerza Normal : '.sino($e112).'<trong> | </trong>';}
if ($e113 <> '') {$ei113 = ' Deformidades : '.sino($e113).'<trong> | </trong>';}
if ($e114 <> '') {$ei114 = ' Marcha Normal  : '.sino($e114).'<trong> | </trong>';}
if ($e115 <> '') {$ei115 = ' Aumento Articular : '.sino($e115).'<trong> | </trong>';}
if ($e116 <> '') {$ei116 = ' Dolor Articular  : '.sino($e116).'<trong> | </trong>';}
if ($e117 <> '') {$ei117 = ' Anotaciones  : '.$e117.'<trong> | </trong>';}

$genitoUrinario = $ei111.$ei112.$ei113.$ei114.$ei115.$ei116.$ei117;
 




        $e121                 = $_POST['e121'];
        $e122                 = $_POST['e122'];
        $e123                 = reem($_POST['e123']);
if ($e121 <> '') {$ei121 = ' Edema   : '.sino($e121).'<trong> | </trong>';}
if ($e122 <> '') {$ei122 = ' LLenado capilar  : '.nole($e122).'<trong> | </trong>';}
if ($e123 <> '') {$ei123 = ' Varices : '.sino($e123).'<trong> | </trong>';}
if ($e1231 <> '') {$ei1231 = ' Varices : '.$e1231.'<trong> | </trong>';}

$extremidades = $ei121.$ei122.$ei123.$ei1231;



        $e131                 = $_POST['e131'];
        $e132                 = $_POST['e132'];
        $e133                 = $_POST['e133'];
        $e134                 = $_POST['e134'];
        $e135                 = $_POST['e135'];
        $e136                 = $_POST['e136'];
        $e137                 = $_POST['e137'];
        $e138                 = $_POST['e138'];
        $e1381                = reem($_POST['e1381']);
if ($e131 <> '') {$ei131 = ' Alerta   : '.sino($e131).'<trong> | </trong>';}
if ($e132 <> '') {$ei132 = ' Lenguaje coherente  : '.sino($e132).'<trong> | </trong>';}
if ($e133 <> '') {$ei133 = ' Temblor : '.sino($e133).'<trong> | </trong>';}
if ($e134 <> '') {$ei134 = ' Prueba Dedo - Nariz  : '.noan($e134).'<trong> | </trong>';}
if ($e135 <> '') {$ei135 = ' Romberg : '.pone($e135).'<trong> | </trong>';}
if ($e136 <> '') {$ei136 = ' Reflejos paterales : '.noan($e136).'<trong> | </trong>';}
if ($e137 <> '') {$ei137 = ' Desviacion de comisura labial   : '.sino($e137).'<trong> | </trong>';}
if ($e138 <> '') {$ei138 = ' Hemiparesia : '.sino($e138).'<trong> | </trong>';}
if ($e1381 <> ''){$ei1381 = ' Anotaciones : '.$e1381.'<trong> | </trong>';}

$vacularPeriferico = $ei131.$ei132.$ei133.$ei134.$ei135.$ei136.$ei137.$ei138.$ei1381;
 






        $e141                 = $_POST['e141'];
        $e142                 = $_POST['e142'];
        $e143                 = $_POST['e143'];
        $e144                 = $_POST['e144'];
        $e145                 = $_POST['e145'];
        $e146                 = $_POST['e146'];
        $e147                 = $_POST['e147'];
        $e148                 = $_POST['e148'];
        $e149                 = $_POST['e149'];
        $e1410                 = $_POST['e1410'];
        $e1411                 = $_POST['e1411'];
        $e1412                 = reem($_POST['e1412']);
if ($e141 <> '') {$ei141 = ' Exatema  : '.sino($e141).'<trong> | </trong>';}
if ($e142 <> '') {$ei142 = ' Abceso  : '.sino($e142).'<trong> | </trong>';}
if ($e143 <> '') {$ei143 = ' Infección Local : '.sino($e143).'<trong> | </trong>';}
if ($e144 <> '') {$ei144 = ' Pioderma : '.sino($e144).'<trong> | </trong>';}
if ($e145 <> '') {$ei145 = ' Ronchas  : '.sino($e145).'<trong> | </trong>';}
if ($e146 <> '') {$ei146 = ' Habones : '.sino($e146).'<trong> | </trong>';} 
if ($e147 <> '') {$ei147 = ' Angioedema : '.sino($e147).'<trong> | </trong>';} 
if ($e148 <> '') {$ei148 = ' Hipocromia : '.sino($e148).'<trong> | </trong>';} 
if ($e149 <> '') {$ei149 = ' Erupción Herpetica : '.sino($e149).'<trong> | </trong>';} 
if ($e1410 <> ''){$ei1410 = ' Celulitis  : '.sino($e1410).'<trong> | </trong>';} 
if ($e1411 <> ''){$ei1411 = ' Erisipela : '.sino($e1411).'<trong> | </trong>';} 
if ($e1412 <> ''){$ei1412 = 'Anotaciones : '.$e1412.'<trong> | </trong>';} 

$sistemaNervioso = $ei141.$ei142.$ei143.$ei144.$ei145.$ei146.$ei147;
 
 

      $examenPartesdCuerpo                 = reem($_POST['examenPartesdCuerpo']);



// *********************************************************    TABLA  examenFisico *********************************************************
// *********************************************************    TABLA  examenFisico *********************************************************




// *********************************************************    TABLA  examenesaRealizar *********************************************************
// *********************************************************    TABLA  examenesaRealizar *********************************************************



        $laboratorio           = reem($_POST['laboratorio']);
        $ecografia             = reem($_POST['ecografia']);
        $otros                 = reem($_POST['otros']);



// *********************************************************    TABLA  examenesaRealizar *********************************************************
// *********************************************************    TABLA  examenesaRealizar *********************************************************



 


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

 

// *********************************************************    TABLA  historiaClinica1 *********************************************************
// *********************************************************    TABLA  historiaClinica1 *********************************************************
mysqli_query($conn3,"INSERT INTO historiaClinica1 (cliente_id, usuario_id, Fecha, Hora, motivoConsulta, diagnostico, tratamiento, notas, recipe, incapacidades, cie10, rSistema, enfermedadActual, acompananteFamiliar, telefono_acompanante, paraClinicos, remision, diagnosticoMsalud, comoTomarlo) VALUES 
  ('$clienteId', '$ID', '$fechar', '$hora', '$motivoConsulta', '$diagnostico', '$tratamiento', '$notas',  '$recipe', '$incapacidades', '$cie10', '$rSistema', '$enfermedadActual', '$acompananteFamiliar', '$telefono_acompanante', '$paraClinicos', '$remision', '$diagnosticoMsalud', '$comoTomarlo');");
// *********************************************************    TABLA  historiaClinica1 *********************************************************
// *********************************************************    TABLA  historiaClinica1 *********************************************************

 



              $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica1 from historiaClinica1 where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinica1'];
              }   




 

// *********************************************************    TABLA  examenFisico *********************************************************
// *********************************************************    TABLA  examenFisico *********************************************************
mysqli_query($conn3,"INSERT INTO examenFisico (usuario_id, cliente_id, peso, altura, imc, ComposicionCorporal, estadoGeneral, estadoConciencia, ojos, otoscopia, cavidadOral, cuello, torax, corazon, abdomen, genitoUrinario, extremidades, vacularPeriferico, sistemaNervioso, pielAnexos, examenPartesdCuerpo, tart, temperatura, fcard, sat, fechaHora, historia_id) VALUES ('$ID', '$clienteId', '$peso', '$altura', '$imc', '$ComposicionCorporal', '$estadoGeneral', '$estadoConciencia', '$ojos', '$otoscopia', '$cavidadOral', '$cuello', '$torax', '$corazon  ', '$abdomen', '$genitoUrinario', '$extremidades', '$vacularPeriferico', '$sistemaNervioso', '$pielAnexos', '$examenPartesdCuerpo', '$tart', '$temp', '$fcard', '$sat', '$Afechar', '$historiaClinica1');");
// *********************************************************    TABLA  examenFisico *********************************************************
// *********************************************************    TABLA  examenFisico *********************************************************







// *********************************************************    TABLA  examenesaRealizar *********************************************************
// *********************************************************    TABLA  examenesaRealizar *********************************************************
mysqli_query($conn3,"INSERT INTO examenesaRealizar 
  (usuario_id, cliente_id,   historia_id,         laboratorio,    ecografia,    otros,    fechaHora) VALUES 
('$ID',        '$clienteId','$historiaClinica1', '$laboratorio', '$ecografia', '$otros', '$Afechar');");
// *********************************************************    TABLA  examenesaRealizar *********************************************************
// *********************************************************    TABLA  examenesaRealizar *********************************************************

  










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
                $cabeceras .= 'To: '.$NOMBRE_USUARIO.' <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'From: Resultado de la consulta <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
                $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

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
                $cabeceras .= 'To: '.$NOMBRE_USUARIO.' <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'From: Resultado de su Cita <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
                $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

                // Enviarlo
                mail($para, $título, $mensaje, $cabeceras);

}


   echo "<script language='Javascript'> window.location='finalizado.php?historiaClinica1=$historiaClinica1';</script>"; 

      
    //Historia Ginecologica
   //********Examen Obtetrico*******//
        $motivo_c=$_POST['motivo_c'];
        $enfermedad_actual=$_POST['enfermedad_actual'];
        $diagnostico_p=$_POST['diagnostico_p'];


   //********Antecedentes Hereditario*******//

        $fimico=$_POST['fimico'];
        $leuticos=$_POST['leuticos'];
        $alcoholicos=$_POST['alcoholicos'];
        $neuropaticos=$_POST['neuropaticos'];
        $otros_p=$_POST['otros_p'];
        $embarazos_m=$_POST['embarazos_m'];

        if($fimico <> '')       {$s1= 'Fímico (TB):'.$fimico.'<trong> | </trong>';}
        if($leuticos <> '')     {$s2= 'Leuticos (Sífilis):'.$leuticos.'<trong> | </trong>';}
        if($alcoholicos <> '')  {$s3= 'Alcohólicos:'.$alcoholicos.'<trong> | </trong>';}
        if($neuropaticos <> '') {$s4= 'Neuropáticos:'.$neuropaticos.'<trong> | </trong>';}
        if($otros_p <> '')      {$s4= 'Otros Procesos:'.$otros_p.'<trong> | </trong>';}
        if($embarazos_m <> '')  {$s5= 'Embarazos Multiples:'.$embarazos_m.'<trong> | </trong>';}
            $antecedentes_h=$s1.$s2.$s3.$s4.$s4.$s5;
   //********Antecedentes PErsonales*******//

        $antecedentes__p=$_POST['antecedentes__p'];

   //********Antecedentes Obtetrico*******//

        $embarazo=$_POST['embarazo'];
        $anno=$_POST['anno'];
        $tipo_parto=$_POST['tipo_parto'];
        $hemorragia=$_POST['hemorragia'];
        $lesion_p=$_POST['lesion_p'];
        $puerperio=$_POST['puerperio'];
        $peso_nn=$_POST['peso_nn'];
        $vivo_m=$_POST['vivo_m'];
        $sexo=$_POST['sexo'];

        if($embarazo <> '')     {$ao1= ''.$embarazo.'<trong> | </trong>';}
        if($anno <> '')         {$ao2= ''.$anno.'<trong> | </trong>';}
        if($tipo_parto <> '')   {$ao3= ''.$tipo_parto.'<trong> | </trong>';}
        if($hemorragia <> '')   {$ao4= ''.$hemorragia.'<trong> | </trong>';}
        if($lesion_p <> '')     {$ao5= ''.$lesion_p.'<trong> | </trong>';}
        if($puerperio <> '')    {$ao6= ''.$puerperio.'<trong> | </trong>';}
        if($peso_nn <> '')      {$ao7= ''.$peso_nn.'<trong> | </trong>';}
        if($vivo_m <> '')       {$ao8= ''.$vivo_m.'<trong> | </trong>';}
        if($sexo <> '')         {$ao9= ''.$sexo.'<trong> | </trong>';}
            $antecedentes_obs=$ao1.$ao2.$ao3.$ao4.$ao5.$ao6.$ao7.$ao8.$ao9;
   //********Examen Fisico*******//
        $aspecto_g=$_POST['aspecto_g'];
        $piel=$_POST['piel'];
        $funciones_n=$_POST['funciones_n'];
        $aparato_d=$_POST['aparato_d'];
        $aparato_c=$_POST['aparato_c'];
        $aparato_r=$_POST['aparato_r'];
        $ex_p=$_POST['ex_p'];
        $aparato_u=$_POST['aparato_u'];
        $aparato_l=$_POST['aparato_l'];
        $varices=$_POST['varices'];
        $edemas=$_POST['edemas'];
        $senos=$_POST['senos'];
        $abdomen=$_POST['abdomen'];
        $vulva_p=$_POST['vulva_p'];
        $vagina=$_POST['vagina'];
        $utero_a=$_POST['utero_a'];
        $sistema_g=$_POST['sistema_g'];
        $otros1=$_POST['otros1'];

        if($aspecto_g <> '')          {$efi1= ''.$aspecto_g.'<trong> | </trong>';}
        if($piel <> '')          {$efi2= ''.$piel.'<trong> | </trong>';}
        if($funciones_n <> '')          {$efi3= ''.$funciones_n.'<trong> | </trong>';}
        if($aparato_d <> '')          {$efi4= ''.$aparato_d.'<trong> | </trong>';}
        if($aparato_c <> '')          {$efi5= ''.$aparato_c.'<trong> | </trong>';}
        if($aparato_r <> '')          {$efi6= ''.$aparato_r.'<trong> | </trong>';}
        if($ex_p <> '')          {$efi7= ''.$ex_p.'<trong> | </trong>';}
        if($aparato_u <> '')          {$efi8= ''.$aparato_u.'<trong> | </trong>';}
        if($aparato_l <> '')          {$efi9= ''.$aparato_l.'<trong> | </trong>';}
        if($varices <> '')          {$efi10= ''.$varices.'<trong> | </trong>';}
        if($edemas <> '')          {$efi11= ''.$edemas.'<trong> | </trong>';}
        if($senos <> '')          {$efi12= ''.$senos.'<trong> | </trong>';}
        if($abdomen <> '')          {$efi13= ''.$abdomen.'<trong> | </trong>';}
        if($vulva_p <> '')          {$efi14= ''.$vulva_p.'<trong> | </trong>';}
        if($vagina <> '')          {$efi15= ''.$vagina.'<trong> | </trong>';}
        if($utero_a <> '')          {$efi16= ''.$utero_a.'<trong> | </trong>';}
        if($sistema_g <> '')          {$efi17= ''.$sistema_g.'<trong> | </trong>';}
        if($otros1 <> '')          {$efi18= ''.$otros1.'<trong> | </trong>';}

        $examen_f=$efi1.$efi2.$efi3.$efi4.$efi5.$efi6.$efi7.$efi8.$efi9.$efi10.$efi11.$efi12.$efi13.$efi14.$efi15.$efi16=.$efi17.$efi18;

   //********Estado Fisico*******//

        $va1=$_POST['peso_p'];
        $va2=$_POST['peso_a'];
        $va3=$_POST['talla'];
        $va4=$_POST['temperatura'];
        $va5=$_POST['pulso'];
        $va6=$_POST['respiracion'];
        $va7=$_POST['ta'];

        if($va1 <> ''){$top1= ''.$va1.'<trong> | </trong>';}
        if($va2 <> ''){$top2= ''.$va2.'<trong> | </trong>';}
        if($va3 <> ''){$top3= ''.$va3.'<trong> | </trong>';}
        if($va4 <> ''){$top4= ''.$va4.'<trong> | </trong>';}
        if($va5 <> ''){$top5= ''.$va5.'<trong> | </trong>';}
        if($va6 <> ''){$top6= ''.$va6.'<trong> | </trong>';}
        if($va7 <> ''){$top7= ''.$va7.'<trong> | </trong>';}
        $examen_fisico=$top1.$top2.$top3.$top4.$top5.$top6.$top7;
        

  $hem1=$_POST['globulos_r'];
        $hem2=$_POST['otrosv1'];
        $hem3=$_POST['globulos_b'];
        $hem4=$_POST['glicemia'];
        $hem5=$_POST['hemoglobina'];
        $hem6=$_POST['uroanalisis'];
        $hem7=$_POST['hematocrito'];
        $hem8=$_POST['coproanalisis']; 

        if($hem1 <> ''){$get1= ''.$hem1.'<trong> | </trong>';}
        if($hem2 <> ''){$get2= ''.$hem2.'<trong> | </trong>';}
        if($hem3 <> ''){$get3= ''.$hem3.'<trong> | </trong>';}
        if($hem4 <> ''){$get4= ''.$hem4.'<trong> | </trong>';}
        if($hem5 <> ''){$get5= ''.$hem5.'<trong> | </trong>';}
        if($hem6 <> ''){$get6= ''.$hem6.'<trong> | </trong>';}
        if($hem7 <> ''){$get7= ''.$hem7.'<trong> | </trong>';}
        if($hem8 <> ''){$get8= ''.$hem8.'<trong> | </trong>';}

        $hematologia=$get1.$get2.$get3.$get4.$get5.$get6.$get7.$get8;


   //********Control Prenatal*******//

        $conp1=$_POST['amenorrea'];
        $conp2=$_POST['parto_p'];
        $conp3=$_POST['paridad'];
        $conp4=$_POST['donde_h_p'];
        $conp5=$_POST['numero_c'];
        $conp6=$_POST['resumen_i'];


        if($conp1 <> ''){$co1= ''.$conp1.'<trong> | </trong>';}
        if($conp2 <> ''){$co2= ''.$conp2.'<trong> | </trong>';}
        if($conp3 <> ''){$co3= ''.$conp3.'<trong> | </trong>';}
        if($conp4 <> ''){$co4= ''.$conp4.'<trong> | </trong>';}
        if($conp5 <> ''){$co5= ''.$conp5.'<trong> | </trong>';}
        if($conp6 <> ''){$co6= ''.$conp6.'<trong> | </trong>';}

        $control_p=$co1.$co2.$co3.$co4.$co5.$co6;

   //********Exploración Útero-Abdominal a la Admisión*******//

        $evalu1=$_POST['dia'];
        $evalu2=$_POST['altura_u'];
        $evalu3=$_POST['circunferencia_a'];
        $evalu4=$_POST['presentacionv1'];
        $evalu5=$_POST['encajamiento'];
        $evalu6=$_POST['auscultacion_foco'];
        $evalu7=$_POST['edad'];
        $evalu8=$_POST['particularidades'];

        if($evalu1 <> ''){$eexp1= ''.$evalu1.'<trong> | </trong>';}
        if($evalu2 <> ''){$eexp2= ''.$evalu2.'<trong> | </trong>';}
        if($evalu3 <> ''){$eexp3= ''.$evalu3.'<trong> | </trong>';}
        if($evalu4 <> ''){$eexp4= ''.$evalu4.'<trong> | </trong>';}
        if($evalu5 <> ''){$eexp5= ''.$evalu5.'<trong> | </trong>';}
        if($evalu6 <> ''){$eexp6= ''.$evalu6.'<trong> | </trong>';}
        if($evalu7 <> ''){$eexp7= ''.$evalu7.'<trong> | </trong>';}
        if($evalu8 <> ''){$eexp8= ''.$evalu8.'<trong> | </trong>';}
        $Expración=$eexp1.$eexp2.$eexp3.$eexp4.$eexp5.$eexp6.$eexp7.$eexp8;

        $evolucion=$_POST['evolucion'];
   //********Resumen Ingreso******//


        $ult1=$_POST['mc'];
        $ult2=$_POST['hea'];
        $ult3=$_POST['app'];
        $ult4=$_POST['apf'];
        $ult5=$_POST['ago'];
        $ult6=$_POST['exa_fisi'];
        $ult7=$_POST['condiciones'];
        $ult8=$_POST['idx'];

        if($ult1 <> ''){$ingre1= ''.$ult1.'<trong> | </trong>';}
        if($ult2 <> ''){$ingre2= ''.$ult2.'<trong> | </trong>';}
        if($ult3 <> ''){$ingre3= ''.$ult3.'<trong> | </trong>';}
        if($ult4 <> ''){$ingre4= ''.$ult4.'<trong> | </trong>';}
        if($ult5 <> ''){$ingre5= ''.$ult5.'<trong> | </trong>';}
        if($ult6 <> ''){$ingre6= ''.$ult6.'<trong> | </trong>';}
        if($ult7 <> ''){$ingre7= ''.$ult7.'<trong> | </trong>';}
        if($ult8 <> ''){$ingre8= ''.$ult8.'<trong> | </trong>';}


        $resumen_ingreso=$ingre1.$ingre2.$ingre3.$ingre4.$ingre5.$ingre6.$ingre7.$ingre8;






            mysqli_query($conn3,"INSERT INTO historiaClinica5_genicologica  
            (cliente_id, usuario_id, Fecha, Hora, motivo, enfermedadActual, diagnostico, antecedentesH, antecedentesP, antecedentesO, examenFisico, controlPrenatal,   hematologia,    evolucion,examenFisico2, ResumenIngreso,) VALUES 
            ('$clienteId', '$ID', '$fechar', '$hora',' $motivo_c',' $enfermedad_actual','$diagnostico_p,'$antecedentes_h','$antecedentes__p','$antecedentes_obs','$examen_f','$examen_fisico','$hematologia','$control_p','$Expración','$evolucion','$$resumen_ingreso' );");



?>