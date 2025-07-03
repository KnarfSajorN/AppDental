<?php
   //include 'header.php';
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
 //  include 'menu.php'; 



    date_default_timezone_set('America/Bogota');

  $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


        //entrevista inicial
        $motivoConsulta        = reem($_POST['motivoConsulta']);
        $enfermedadActual         = reem($_POST['enfermedadActual']);


        //revision por sistema
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
        $rs19                 = $_POST['rs19'];
        $rs20                 = $_POST['rs20'];
        $rs21                  = $_POST['rs21'];
         $notasadicionales  = $_POST['notasadicionales'];

echo '.......fiebretos rinooo.....................'.$rs1.$rs2.$rs3;

        if ($rs1 <>'') {$s1 = ' Fiebre : '.sino($rs1).'<trong> | </trong>';}
        if ($rs2 <>'') {$s2 = ' Tos: '.sino($rs2).'<trong> | </trong>';}
        if ($rs3 <>'') {$s3 = ' Rinorrea: '.sino($rs3).'<trong> | </trong>';}
        if ($rs4 <>'') {$s4 = ' Cefalea: '.sino($rs4).'<trong> | </trong>';}
        if ($rs5 <>'') {$s5 = ' Mareo: '.sino($rs5).'<trong> | </trong>';}
        if ($rs6 <>'') {$s6 = ' Vomito: '.sino($rs6).'<trong> | </trong>';}
        if ($rs7 <>'') {$s7 = ' Diarrea: '.sino($rs7).'<trong> | </trong>';}
        if ($rs8 <>'') {$s8 = ' Disuria: '.sino($rs8).'<trong> | </trong>';}
        if ($rs9 <>'') {$s9 = ' Dolor de Garganta: '.sino($rs9).'<trong> | </trong>';}
        if ($rs10 <>'') {$s10 = ' Dolor Adominal: '.sino($rs10).'<trong> | </trong>';}
        if ($rs11 <>'') {$s11 = ' Disnea: '.sino($rs11).'<trong> | </trong>';}
        if ($rs12 <>'') {$s12 = ' Otalgia: '.sino($rs12).'<trong> | </trong>';}
        if ($rs13 <>'') {$s13 = ' Perdida de Peso: '.sino($rs13).'<trong> | </trong>';}
        if ($rs14 <>'') {$s14 = ' Sangre en las heces o al defecar: '.sino($rs14).'<trong> | </trong>';}
        if ($rs15 <>'') {$s15 = ' Hematuria: '.sino($rs15).'<trong> | </trong>';}
        if ($rs16 <>'') {$s16 = ' Dolor en las extremidades: '.sino($rs16).'<trong> | </trong>';}
        if ($rs17 <>'') {$s17 = ' Parestesias: '.sino($rs17).'<trong> | </trong>';}
        if ($rs18 <>'') {$s18 = ' Hipoestesias: '.sino($rs18).'<trong> | </trong>';}
        if ($rs19 <>'') {$s19 = ' Cefalea: '.sino($rs19).'<trong> | </trong>';}
        if ($rs20 <>'') {$s20= ' Astenia: '.sino($rs20).'<trong> | </trong>';}
        if ($rs21 <>'') {$s21= ' Adinamia: '.sino($rs21).'<trong> | </trong>';}

        $rSistema = $s1.$s2.$s3.$s4.$s5.$s6.$s7.$s8.$s9.$s10.$s11.$s12.$s13.$s14.$s15.$s16.$s17.$s18.'<br>'.$notasadicionales;

        // antecedentes Personales
        $ant1                 = $_POST['ant1'];
        $ant2                 = $_POST['ant2'];
        $ant3                 = $_POST['ant3'];
        $ant4                 = $_POST['ant4'];
        $ant5                 = $_POST['ant5'];
        $ant6                 = $_POST['ant6'];
        $ant7                 = $_POST['ant7'];
        $ant8                 = $_POST['ant8'];
        $ant9                 = $_POST['ant9'];
        $ant10                 = $_POST['ant10'];
        $ant11                 = $_POST['ant11'];
        $ant12                 = $_POST['ant12'];
        $ant13                 = $_POST['ant13'];
        $ant14                 = $_POST['ant14'];
        $ant15                 = $_POST['ant15'];
        $ant16                 = $_POST['ant16'];
        $ant17                 = $_POST['ant17'];
        $ant18                 = $_POST['ant18'];
        $ant19                 = $_POST['ant19'];
        $ant20                 = $_POST['ant20'];
        $ant21                 = $_POST['ant21'];
        $ant22                 = $_POST['ant22'];

        $antecedentesPersonales                 = $_POST['antecedentesP'];

        if ($ant1 <>'') {$antper1 = ' '.$ant1.',';}
        if ($ant2 <>'') {$antper2 = ' '.$ant2.',';}
        if ($ant3 <>'') {$antper3 = ' '.$ant3.',';}
        if ($ant4 <>'') {$antper4 = ' '.$ant4.',';}
        if ($ant5 <>'') {$antper5 = ' '.$ant5.',';}
        if ($ant6 <>'') {$antper6 = ' '.$ant6.',';}
        if ($ant7 <>'') {$antper7 = ' '.$ant7.',';}
        if ($ant8 <>'') {$antper8 = ' '.$ant8.',';}
        if ($ant9 <>'') {$antper9 = ' '.$ant9.',';}
        if ($ant10 <>'') {$antper10 = ' '.$ant10.',';}
        if ($ant11 <>'') {$antper11 = ' '.$ant11.',';}
        if ($ant12 <>'') {$antper12 = ' '.$ant12.',';}
        if ($ant13 <>'') {$antper13 = ' '.$ant13.',';}
        if ($ant14 <>'') {$antper14 = ' '.$ant14.',';}
        if ($ant15 <>'') {$antper15 = ' '.$ant15.',';}
        if ($ant16 <>'') {$antper16 = ' '.$ant16.',';}
        if ($ant17 <>'') {$antper17 = ' '.$ant17.',';}
        if ($ant18 <>'') {$antper18 = ' '.$ant18.',';}
        if ($ant19 <>'') {$antper19 = ' '.$ant19.',';}
        if ($ant20 <>'') {$antper20 = ' '.$ant20.',';}
        if ($ant21 <>'') {$antper21 = ' '.$ant21.',';}
        if ($ant22 <>'') {$antper22 = ' '.$ant22.'. <br>';}
        if ($antecedentesPersonales <>'') {$antper23 = 'Detalles de antecedentes personales:'.$antecedentesPersonales.' ';}

        $antecedentesPers =$antper1.$antper2.$antper3.$antper4.$antper5.$antper6.$antper7.$antper8.$antper9.$antper10.$antper11.$antper12.$antper13.$antper14.$antper15.$antper16.$antper17.$antper18.$antper19.$antper20.$antper21.$antper22.$antper23 ;


        //antecendentes Familiares
        $antf1                 = $_POST['antf1'];
        $antf2                 = $_POST['antf2'];
        $antf3                 = $_POST['antf3'];
        $antf4                 = $_POST['antf4'];
        $antf5                 = $_POST['antf5'];
        $antf6                 = $_POST['antf6'];
        $antf7                 = $_POST['antf7'];
        $antf8                 = $_POST['antf8'];
        $antf9                 = $_POST['antf9'];
        $antf10                 = $_POST['antf10'];
        $antf11                 = $_POST['antf11'];
        $antf12                 = $_POST['antf12'];
        $antf13                 = $_POST['antf13'];

         $antecedentesFamiliares                 = $_POST['antecedentesF'];

        if ($antf1 <>'') {$antfam1 = ' '.$antf1.',';}
        if ($antf2 <>'') {$antfam2 = ' '.$antf2.',';}
        if ($antf3 <>'') {$antfam3 = ' '.$antf3.',';}
        if ($antf4 <>'') {$antfam4 = ' '.$antf4.',';}
        if ($antf5 <>'') {$antfam5 = ' '.$antf5.',';}
        if ($antf6 <>'') {$antfam6 = ' '.$antf6.',';}
        if ($antf7 <>'') {$antfam7 = ' '.$antf7.',';}
        if ($antf8 <>'') {$antfam8 = ' '.$antf8.',';}
        if ($antf9 <>'') {$antfam9 = ' '.$antf9.',';}
        if ($antf10 <>'') {$antfam10 = ' '.$antf10.',';}
        if ($antf11 <>'') {$antfam11 = ' '.$antf11.',';}
        if ($antf12 <>'') {$antfam12 = ' '.$antf12.',';}
        if ($antf13 <>'') {$antfam13 = ' '.$antf13.'. <br>';}
        if ($antecedentesFamiliares <>'') {$antfam14 = 'Detalles de antecedentes familiares:'.$antecedentesFamiliares.' ';}

        $antecedentesFami=$antfam1.$antfam2.$antfam3.$antfam4.$antfam5.$antfam6.$antfam7.$antfam8.$antfam9.$antfam10.$antfam11.$antfam12.$antfam13.$antfam14;


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

if ($tart1 <> '') {$V1 = 'TA (mmhg): '.$tart1.'<trong> | </trong>';}
        if ($temperatura  <>'') {$V2 = ' Temperatura: '.$temperatura.'<trong> | </trong>';}
        if ($fcard <>'') {$V3= ' FC LPM: '.$fcard .'<trong> | </trong>';}
        if ($sat <>'') {$V4= 'SAT02 : '.$sat.'<trong> | </trong>';}

        $examenFisico =$V1.$V2.$V3.$V4;




        $e11                 = $_POST['e11'];
        $e12                 = $_POST['e12'];
        $e13                 = $_POST['e13'];
        $e14                 = $_POST['e14'];

        if ($e11 <>'') {$ei11 = ' Buen estado general : '.sino($e11).'<trong> | </trong>';}
        if ($e12 <>'') {$ei12 = ' Febril al tacto : '.sino($e12).'<trong> | </trong>';}
        if ($e13 <>'') {$ei13 = ' Irritable  : '.sino($e13).'<trong> | </trong>';}
        if ($e14 <>'') {$ei14 = ' Anotación : '.$e14.'';}

        $estadoGeneral = $ei11.$ei12.$ei13.$ei14;

       



        $e21                 = $_POST['e21'];
        $e22                 = $_POST['e22'];
        $e23                 = $_POST['e23'];
        $e24                 = $_POST['e24'];

        if ($e21 <>'') {$ei21 = ' Alerta  : '.sino($e21).'<trong> | </trong>';}
        if ($e22 <>'') {$ei22 = ' Somnoliento  : '.sino($e22).'<trong> | </trong>';}
        if ($e23 <>'') {$ei23 = ' Inconciente   : '.sino($e23).'<trong> | </trong>';}
        if ($e24 <>'') {$ei24 = ' Anotación  : '.$e24.'';}

        $estadoConciencia = $ei21.$ei22.$ei23.$ei24;

        
        $e31                 = $_POST['e31'];
        $e32                 = $_POST['e32'];
        $e33                 = $_POST['e33'];
        $e34                 = $_POST['e34'];
        $e35                 = $_POST['e35'];
          $e36                 = $_POST['e36'];


        if ($e31 <>'') {$ei31 = ' Reaccion pupilar N   : '.sino($e31).'<trong> | </trong>';}
        if ($e32 <>'') {$ei32 = ' Ojo Rojo  : '.sino($e32).'<trong> | </trong>';}
        if ($e33 <>'') {$ei33 = ' Dolor ocular    : '.sino($e33).'<trong> | </trong>';}
        if ($e34 <>'') {$ei34 = ' Nistagmo   : '.sino($e34).'<trong> | </trong>';}
        if ($e35 <>'') {$ei35 = ' Pterigión   : '.sino($e35).'<trong> | </trong>';}
        if ($e36 <>'') {$ei36 = 'Anotación  : '.$e36.'';}

        $ojos = $ei31.$ei32.$ei33.$ei34.$ei35.$ei36;


        



        $e41                 = $_POST['e41'];
        $e42                 = $_POST['e42'];
        $e43                 = $_POST['e43'];
         $e44                 = $_POST['e44'];



        if ($e41 <>'') {$ei41 = ' Dolor a la exploración : '.sino($e41).'<trong> | </trong>';}
        if ($e42 <>'') {$ei42 = ' Exsudados en CAE : '.sino($e42).'<trong> | </trong>';}
        if ($e43 <>'') {$ei43 = ' Cambios en timpanos : '.sino($e43).'<trong> | </trong>';}
        if ($e44 <>'') {$ei44 = ' Anotación : '.$e44.'';}

        $otoscopia = $ei41.$ei42.$ei43.$ei44;

       


        $e51                 = $_POST['e51'];
        $e52                 = $_POST['e52'];
        $e53                 = $_POST['e53'];
        $e54                 = $_POST['e54'];
        $e55                 = $_POST['e55'];
          $e56                 = $_POST['e56'];



        if ($e51 <>'') {$ei51 = ' Mucosa Oral : '.hs($e51).'<trong> | </trong>';}
        if ($e52 <>'') {$ei52 = ' Aftas Bucales : '.sino($e52).'<trong> | </trong>';}
        if ($e53 <>'') {$ei53 = ' Gingivitis : '.sino($e53).'<trong> | </trong>';}
        if ($e54 <>'') {$ei54 = ' Caries : '.sino($e54).'<trong> | </trong>';}
        if ($e55 <>'') {$ei55 = ' Faringe: '.$e55.'<trong> | </trong>';}
        if ($e56 <>'') {$ei56 = ' Anotación: '.$e56.'';}

        $cavidadOral = $ei51.$ei52.$ei53.$ei54.$ei55.$ei56;

       

        $e61                 = $_POST['e61'];
        $e62                 = $_POST['e62'];
        $e63                 = $_POST['e63'];
        $e64                 = $_POST['e64'];
        $e65                 = reem($_POST['e65']);
         $e66                 = $_POST['e66'];


        if ($e61 <>'') {$ei61 = ' Movilidad Normal : '.sino($e61).'<trong> | </trong>';}
        if ($e62 <>'') {$ei62 = ' Adenomegalias : '.sino($e62).'<trong> | </trong>';}
        if ($e63 <>'') {$ei63 = ' Masa Palpable  : '.sino($e63).'<trong> | </trong>';}
        if ($e64 <>'') {$ei64 = ' Bocio : '.sino($e64).'<trong> | </trong>';}
        if ($e65 <>'') {$ei65 = ' Aneurisma : '.$e65.'<trong> | </trong>';}
        if ($e66 <>'') {$ei66 = ' Anotación: '.$e66.'';}

        $cuello = $ei61.$ei62.$ei63.$ei64.$ei65.$ei66;

        



        $e71                 = $_POST['e71'];
        $e72                 = $_POST['e72'];
        $e73                 = $_POST['e73'];
        $e74                 = $_POST['e74'];
        $e75                 = $_POST['e75'];
        $e76                 = $_POST['e76'];
        $e77                 = reem($_POST['e77']);


        if ($e71 <>'') {$ei71 = ' Pulmones claros y bien ventilados : '.sino($e71).'<trong> | </trong>';}
        if ($e72 <>'') {$ei72 = ' Roncus : '.sino($e72).'<trong> | </trong>';}
        if ($e73 <>'') {$ei73 = ' Silibancias  : '.sino($e73).'<trong> | </trong>';}
        if ($e74 <>'') {$ei74 = ' Estertores : '.sino($e74).'<trong> | </trong>';}
        if ($e75 <>'') {$ei75 = ' Crepitantes  : '.sino($e75).'<trong> | </trong>';}
        if ($e76 <>'') {$ei76 = ' Hipoventilacion  : '.sino($e76).'<trong> | </trong>';}
        if ($e77 <>'') {$ei77 = ' Anotaciones  : '.$e77.'<trong> | </trong>';}

        $torax = $ei71.$ei72.$ei73.$ei74.$ei75.$ei76.$ei77;


        $e81                 = $_POST['e81'];
        $e82                 = $_POST['e82'];
        $e83                 = $_POST['e83'];
        $e84                 = reem($_POST['e84']);


        if ($e81 <>'') {$ei81 = ' Ruidos cardiacos normales  : '.sino($e81).'<trong> | </trong>';}
        if ($e82 <>'') {$ei82 = ' Soplo : '.sino($e82).'<trong> | </trong>';}
        if ($e83 <>'') {$ei83 = ' Arritmia  : '.sino($e83).'<trong> | </trong>';}
        if ($e84 <>'') {$ei84 = ' Anotaciones  : '.$e84.'<trong> | </trong>';}

        $corazon = $ei81.$ei82.$ei83.$ei84;


        $e91                 = $_POST['e91'];
        $e92                 = $_POST['e92'];
        $e93                 = $_POST['e93'];
        $e94                 = $_POST['e94'];
        $e95                 = $_POST['e95'];
        $e96                 = $_POST['e96'];
        $e97                 = reem($_POST['e97']);

        if ($e91 <>'') {$ei91 = ' Blando : '.sino($e91).'<trong> | </trong>';}
        if ($e92 <>'') {$ei92 = 'Dolor a la exploración : '.sino($e92).'<trong> | </trong>';}
        if ($e93 <>'') {$ei93 = ' Peristalsis aumentada  : '.sino($e93).'<trong> | </trong>';}
        if ($e94 <>'') {$ei94 = ' Hepatomegalia: '.sino($e94).'<trong> | </trong>';}
        if ($e95 <>'') {$ei95 = ' Hernia: '.sino($e95).'<trong> | </trong>';}
        if ($e96 <>'') {$ei96 = ' Esplenomegalia: '.sino($e96).'<trong> | </trong>';}
        if ($e97 <>'') {$ei97 = ' Anotaciones: '.$e97.'<trong> | </trong>';}

          $abdomen = $ei91.$ei92.$ei93.$ei94.$ei95.$ei96.$ei97;


        $e101                 = $_POST['e101'];
        $e102                 = $_POST['e102'];
        $e103                 = $_POST['e103'];
        $e1031                = $_POST['e1031'];
        $e104                 = $_POST['e104'];
        $e105                 = $_POST['e105'];
        $e106                 = $_POST['e106'];
        $e107                 = $_POST['e107'];

        if ($e101 <>'') {$ei101 = ' Dolor suprapúblico : '.sino($e101).'<trong> | </trong>';}
        if ($e102 <>'') {$ei102 = 'Masa suprapública : '.sino($e102).'<trong> | </trong>';}
        if ($e103 <>'') {$ei103 = ' Peñopercusión dolorosa  : '.sino($e103).'<trong> | </trong>';}
        if ($e1031 <>'') {$ei1031 = ' Nota : '.sino($e1031).'<trong> | </trong>';}
        if ($e104 <>'') {$ei104 = ' Ulcera Genital : '.sino($e104).'<trong> | </trong>';}
        if ($e105 <>'') {$ei105 = ' Verrugas genitales : '.sino($e105).'<trong> | </trong>';}
        if ($e106 <>'') {$ei106 = ' Flujo vaginal : '.sino($e106).'<trong> | </trong>';}
        if ($e107 <>'') {$ei107 = ' Varicocele : '.sino($e107).'<trong> | </trong>';}

        $genitoUrinario = $ei101.$ei102.$ei103.$ei1031.$ei104.$ei105.$ei106.$ei107;

        $e111                 = $_POST['e111'];
        $e112                 = $_POST['e112'];
        $e113                 = $_POST['e113'];
        $e114                 = $_POST['e114'];
        $e115                 = $_POST['e115'];
        $e116                 = $_POST['e116'];
        $e117                 = reem($_POST['e117']);

        if ($e111 <>'') {$ei111 = ' Movilidad Normal  : '.sino($e111).'<trong> | </trong>';}
        if ($e112 <>'') {$ei112 = ' Fuerza Normal : '.sino($e112).'<trong> | </trong>';}
        if ($e113 <>'') {$ei113 = ' Deformidades : '.sino($e113).'<trong> | </trong>';}
        if ($e114 <>'') {$ei114 = ' Marcha Normal  : '.sino($e114).'<trong> | </trong>';}
        if ($e115 <>'') {$ei115 = ' Aumento Articular : '.sino($e115).'<trong> | </trong>';}
        if ($e116 <>'') {$ei116 = ' Dolor Articular  : '.sino($e116).'<trong> | </trong>';}
        if ($e117 <>'') {$ei117 = ' Anotaciones  : '.$e117.'<trong> | </trong>';}

        $extremidades = $ei111.$ei112.$ei113.$ei114.$ei115.$ei116.$ei117;


        $e121                 = $_POST['e121'];
        $e122                 = $_POST['e122'];
        $e123                 = reem($_POST['e123']);
        if ($e121 <>'') {$ei121 = ' Edema   : '.sino($e121).'<trong> | </trong>';}
        if ($e122 <>'') {$ei122 = ' LLenado capilar  : '.nole($e122).'<trong> | </trong>';}
        if ($e123 <>'') {$ei123 = ' Varices : '.sino($e123).'<trong> | </trong>';}
        if ($e1231 <>'') {$ei1231 = ' Varices : '.$e1231.'<trong> | </trong>';}

        $vacularPeriferico = $ei121.$ei122.$ei123.$ei1231;



        $e131                 = $_POST['e131'];
        $e132                 = $_POST['e132'];
        $e133                 = $_POST['e133'];
        $e134                 = $_POST['e134'];
        $e135                 = $_POST['e135'];
        $e136                 = $_POST['e136'];
        $e137                 = $_POST['e137'];
        $e138                 = $_POST['e138'];
        $e1381                = reem($_POST['e1381']);


        if ($e131 <>'') {$ei131 = ' Alerta   : '.sino($e131).'<trong> | </trong>';}
        if ($e132 <>'') {$ei132 = ' Lenguaje coherente  : '.sino($e132).'<trong> | </trong>';}
        if ($e133 <>'') {$ei133 = ' Temblor : '.sino($e133).'<trong> | </trong>';}
        if ($e134 <>'') {$ei134 = ' Prueba Dedo - Nariz  : '.noan($e134).'<trong> | </trong>';}
        if ($e135 <>'') {$ei135 = ' Romberg : '.pone($e135).'<trong> | </trong>';}
        if ($e136 <>'') {$ei136 = ' Reflejos paterales : '.noan($e136).'<trong> | </trong>';}
        if ($e137 <>'') {$ei137 = ' Desviacion de comisura labial   : '.sino($e137).'<trong> | </trong>';}
        if ($e138 <>'') {$ei138 = ' Hemiparesia : '.sino($e138).'<trong> | </trong>';}
        if ($e1381 <>''){$ei1381 = ' Anotaciones : '.$e1381.'<trong> | </trong>';}

        $sistemaNervioso = $ei131.$ei132.$ei133.$ei134.$ei135.$ei136.$ei137.$ei138.$ei1381;


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

        if ($e141 <>'') {$ei141 = ' Exatema  : '.sino($e141).'<trong> | </trong>';}
        if ($e142 <>'') {$ei142 = ' Abceso  : '.sino($e142).'<trong> | </trong>';}
        if ($e143 <>'') {$ei143 = ' Infección Local : '.sino($e143).'<trong> | </trong>';}
        if ($e144 <>'') {$ei144 = ' Pioderma : '.sino($e144).'<trong> | </trong>';}
        if ($e145 <>'') {$ei145 = ' Ronchas  : '.sino($e145).'<trong> | </trong>';}
        if ($e146 <>'') {$ei146 = ' Habones : '.sino($e146).'<trong> | </trong>';}
        if ($e147 <>'') {$ei147 = ' Angioedema : '.sino($e147).'<trong> | </trong>';}
        if ($e148 <>'') {$ei148 = ' Hipocromia : '.sino($e148).'<trong> | </trong>';}
        if ($e149 <>'') {$ei149 = ' Erupción Herpetica : '.sino($e149).'<trong> | </trong>';}
        if ($e1410 <>''){$ei1410 = ' Celulitis  : '.sino($e1410).'<trong> | </trong>';}
        if ($e1411 <>''){$ei1411 = ' Erisipela : '.sino($e1411).'<trong> | </trong>';}
        if ($e1412 <>''){$ei1412 = 'Anotaciones : '.$e1412.'<trong> | </trong>';}

        $pielAnexos = $ei141.$ei142.$ei143.$ei144.$ei145.$ei146.$ei147.$ei148.$ei149.$ei1410.$ei1411.$ei1412;
        






        // *********************************************************    TABLA  examenFisico *********************************************************
        // *********************************************************    TABLA  examenFisico *********************************************************



        $examenPartesdCuerpo                 = reem($_POST['examenPartesdCuerpo']);

        $acompananteFamiliar         = reem($_POST['acompananteFamiliar']);

        $telefono_acompanante         = reem($_POST['telefono_acompanante']);

        $parentesco         = $_POST['parentesco'];

        $diagnostico           = reem($_POST['diagnostico']);

        $tratamiento1          = reem($_POST['tratamiento']);

         if ($tratamiento1 <>'') { $tratamiento=$_POST['tratamiento'];
 $tratamiento=str_replace("\r","<br>", $tratamiento);}


        $p1                 = $_POST['p1'];
        $p2                 = reem($_POST['p2']);
        if ($p1 <>'') {$p1i = ' Para clínicos : '.sino($p1).'<trong> | </trong>';}

$paraClinicos = $p1i.$p2;
        $r1                 = $_POST['r1'];
        $r2                 = reem($_POST['r2']);
        if ($r1 <>'') {$r1i = ' Remisión : '.sino($r1).'<trong> | </trong>';}
        $remision = $r1i.$r2;

        $diagnosticoMsalud                 = reem($_POST['diagnosticoMsalud']);
        $analisis             = reem($_POST['analisis']);
 
        $cie10                 = $_POST['name1'];

        $prestaciones          = reem($_POST['prestaciones']);

        $prestaciones1         = reem($_POST['prestaciones1']);
        $prestaciones2         = reem($_POST['prestaciones2']);

        $recipe1                = reem($_POST['recipe']);
        if ($recipe1<>'') { $recipe=$_POST['recipe'];
$recipe=str_replace("\r","<br>",$recipe);}


        $comoTomarlo                 = reem($_POST['comoTomarlo']);

        $incapacidades1         = reem($_POST['incapacidades']);
        if ($incapacidades1 <>'') {$incapacidades=$_POST['incapacidades'];
$incapacidades=str_replace("\r","<br>",$incapacidades);}

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


        // *****************************   Variables Informacion RIPS Y (CUPS) *********************************

        $numero_autorizacion = $_POST['numero_autorizacion'];
        $Cup = $_POST['select1_Cup'];
        $finalidad_consulta = $_POST['finalidad_consulta'];
        $causa_externa = $_POST['causa_externa']; 
        $cie10_1 = $_POST['select1'];
        $cie10_2 = $_POST['select2'];
        $cie10_3 = $_POST['select3'];
        $cie10_4 = $_POST['select4'];
        $tipo_diagnostico_principal = $_POST['tipo_diagnostico_principal'];
        $valor_consulta = $_POST['valor_consulta'];
        if($valor_consulta == '')
        {
            $valor_consulta = 0;
        }
        $tipo_historia=1;



        // ***************************** ************************ ************************* ********************

        // *****************************   Variables Procedimiento  *********************************

        $ambito_procedimiento = $_POST['ambito_procedimiento'];
        $finalidad_procedimiento = $_POST['finalidad_procedimiento'];
        $personal_atiende = $_POST['personal_atiende'];
        $realizacion_quirurgico = $_POST['realizacion_quirurgico'];
        $valor_procedimiento = $_POST['valor_procedimiento'];
        if($valor_procedimiento == '')
        {
            $valor_procedimiento = 0;
        }
        $cie10_complicacion=$_POST['select5'];
        





        // ***************************** ************************ ************************* ********************
        // *****************************   Variables Facturacion  *********************************
      
        $numero_contrato = $_POST['numero_contrato'];if($numero_contrato == ''){ $numero_contrato = 0;}
        $plan_beneficios = $_POST['plan_beneficios'];
        $numero_poliza = $_POST['numero_poliza'];if($numero_poliza == ''){ $numero_poliza = 0;}
        $valor_total_copago = $_POST['valor_total_copago'];if($valor_total_copago == ''){ $valor_total_copago = 0;}
        $valor_comision = $_POST['valor_comision'];if($valor_comision == ''){ $valor_comision = 0;}
        $valor_total_descuento = $_POST['valor_total_descuento'];if($valor_total_descuento == ''){ $valor_total_descuento = 0;}
        $valor_entidad_contratante = $_POST['valor_entidad_contratante'];if($valor_entidad_contratante == ''){ $valor_entidad_contratante = 0;}
        $valor_cuota_moderadora = $_POST['valor_cuota_moderadora'];if($valor_cuota_moderadora == ''){ $valor_cuota_moderadora = 0;}
        $valor_neto_pagar = $_POST['valor_neto_pagar'];if($valor_neto_pagar == ''){ $valor_neto_pagar = 0;}
 

        // ***************************** ************************ ************************* ********************

        // *********************************************************    TABLA  historiaClinica1 *********************************************************
        // *********************************************************    TABLA  historiaClinica1 *********************************************************


        mysqli_query($conn3,"INSERT INTO historiaClinica1 (cliente_id, usuario_id, Fecha, Hora,  motivoConsulta, diagnostico, tratamiento, notas, recipe, incapacidades, cie10, rSistema, antecedentesPers,antecedentesFami, enfermedadActual, acompananteFamiliar, telefono_acompanante, paraClinicos, remision, diagnosticoMsalud, comoTomarlo, analisis, receta) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$motivoConsulta', '$diagnostico', '$tratamiento', '$notas',  '$recipe', '$incapacidades', '$codigo1', '$rSistema', '$antecedentesPers','$antecedentesFami','$enfermedadActual', '$acompananteFamiliar', '$telefono_acompanante', '$paraClinicos', '$remision', '$diagnosticoMsalud', '$comoTomarlo','$analisis','$receta');");



              $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica1 from historiaClinica1 where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinica1'];
              }   


                                                    // tabla informacion rips//
               mysqli_query($conn3,"INSERT INTO informacion_rips (id_historia,id_cliente,fecha, tipo, numero_autorizacion, CUPS,  finalidad_consulta, causa_externa, cie10_1, cie10_2, cie10_3, cie10_4, tipo_diagnostico_principal,valor_consulta,ambito_procedimiento,finalidad_procedimiento,personal_atiende,realizacion_quirurgico,valor_procedimiento,cie10_complicacion,numero_contrato,plan_beneficios,numero_poliza,valor_total_copago,valor_comision,valor_total_descuento,valor_entidad_contratante,valor_cuota_moderadora,valor_neto_pagar) 
                VALUES  
                ('$historiaClinica1','$clienteId','$fechar',$tipo_historia, '$numero_autorizacion', '$Cup',  '$finalidad_consulta', '$causa_externa', '$cie10_1', '$cie10_2',  '$cie10_3', '$cie10_4', '$tipo_diagnostico_principal', '$valor_consulta','$ambito_procedimiento','$finalidad_procedimiento','$personal_atiende','$realizacion_quirurgico','$valor_procedimiento','$cie10_complicacion','$numero_contrato','$plan_beneficios','$numero_poliza','$valor_total_copago','$valor_comision','$valor_total_descuento','$valor_entidad_contratante','$valor_cuota_moderadora','$valor_neto_pagar');");

               echo "INSERT INTO informacion_rips (id_historia,id_cliente,fecha, tipo, numero_autorizacion, CUPS,  finalidad_consulta, causa_externa, cie10_1, cie10_2, cie10_3, cie10_4, tipo_diagnostico_principal,valor_consulta,ambito_procedimiento,finalidad_procedimiento,personal_atiende,realizacion_quirurgico,valor_procedimiento,cie10_complicacion,numero_contrato,plan_beneficios,numero_poliza,valor_total_copago,valor_comision,valor_total_descuento,valor_entidad_contratante,valor_cuota_moderadora,valor_neto_pagar) 
                VALUES  
                ('$historiaClinica1','$clienteId','$fechar',$tipo_historia, '$numero_autorizacion', '$Cup',  '$finalidad_consulta', '$causa_externa', '$cie10_1', '$cie10_2',  '$cie10_3', '$cie10_4', '$tipo_diagnostico_principal', '$valor_consulta','$ambito_procedimiento','$finalidad_procedimiento','$personal_atiende','$realizacion_quirurgico','$valor_procedimiento','$cie10_complicacion','$numero_contrato','$plan_beneficios','$numero_poliza','$valor_total_copago','$valor_comision','$valor_total_descuento','$valor_entidad_contratante','$valor_cuota_moderadora','$valor_neto_pagar');";

         



/*

echo "INSERT INTO historiaClinica1 (cliente_id, usuario_id, Fecha, Hora,  motivoConsulta, diagnostico, tratamiento, notas, recipe, incapacidades, cie10, rSistema, antecedentesPers,antecedentesFami, enfermedadActual, acompananteFamiliar, telefono_acompanante, paraClinicos, remision, diagnosticoMsalud, comoTomarlo, analisis, receta) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$motivoConsulta', '$diagnostico', '$tratamiento', '$notas',  '$recipe', '$incapacidades', '$cie10', '$rSistema', '$antecedentesPers','$antecedentesFami','$enfermedadActual', '$acompananteFamiliar', '$telefono_acompanante', '$paraClinicos', '$remision', '$diagnosticoMsalud', '$comoTomarlo','$analisis','$receta');";


*/
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


        ECHO "INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo) VALUES ('$clienteId', '$ID', '$historiaClinica1','$fechar','$hora','$codigocie10')";   



              $qierycie=mysqli_query($conn3,"SELECT MAX(ID_Cie10) as ID_Cie10 from historiaClinica9_Quirurgico_Cie10");
              $nrowl=mysqli_num_rows($qierycie);
              while($rowCie=mysqli_fetch_array($qierycie))
              {
                $ID_Cie10=$rowCie['ID_Cie10'];
              }   


         



    }
/*
 echo "INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo) VALUES ('$clienteId', '$ID', '$historiaClinica1','$fechar','$hora','$codigocie10')";   
*/

   


/*

 for ($i=1; $i<$contador; $i++) 
 { 
        //
        mysqli_query($conn3,"INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo) VALUES ('$clienteId', '$ID', '$historiaClinica1','$Fecha','$Hora','$codigo1[$i]')");   }

 echo "INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo) VALUES ('$clienteId', '$ID', '$historiaClinica1','$Fecha','$Hora','$codigo1[$i]')";   
   */


            // *********************************************************    TABLA  examenFisico *********************************************************
            // *********************************************************    TABLA  examenFisico *********************************************************
            mysqli_query($conn3,"INSERT INTO examenFisico (usuario_id, cliente_id, peso, altura, imc, ComposicionCorporal, estadoGeneral, estadoConciencia, ojos, otoscopia, cavidadOral, cuello, torax, corazon, abdomen, genitoUrinario, extremidades, vacularPeriferico, sistemaNervioso, pielAnexos, examenPartesdCuerpo, tart, temperatura, fcard, sat, fechaHora, historia_id) VALUES ('$ID', '$clienteId', '$peso', '$altura', '$imc', '$ComposicionCorporal', '$estadoGeneral', '$estadoConciencia', '$ojos', '$otoscopia', '$cavidadOral', '$cuello', '$torax', '$corazon', '$abdomen', '$genitoUrinario', '$extremidades', '$vacularPeriferico', '$sistemaNervioso', '$pielAnexos', '$examenPartesdCuerpo', '$examenFisico', '$temp', '$fcard', '$sat', '$Afechar', '$historiaClinica1');");

 

              $queryFisico=mysqli_query($conn3,"SELECT MAX(id) as idexamenFisico from examenFisico");
              $nrowl=mysqli_num_rows($queryFisico);
              while($rowFisi=mysqli_fetch_array($queryFisico))
              {
                $idexamenFisico=$rowFisi['idexamenFisico'];
              }   


          //mssql_query("INSERT INTO examenFisico (id, usuario_id, cliente_id, peso, altura, imc, ComposicionCorporal, estadoGeneral, estadoConciencia, ojos, otoscopia, cavidadOral, cuello, torax, corazon, abdomen, genitoUrinario, extremidades, vacularPeriferico, sistemaNervioso, pielAnexos, examenPartesdCuerpo, tart, temperatura, fcard, sat, fechaHora, historia_id) VALUES ('$idexamenFisico', '$ID', '$clienteId', '$peso', '$altura', '$imc', '$ComposicionCorporal', '$estadoGeneral', '$estadoConciencia', '$ojos', '$otoscopia', '$cavidadOral', '$cuello', '$torax', '$corazon', '$abdomen', '$genitoUrinario', '$extremidades', '$vacularPeriferico', '$sistemaNervioso', '$pielAnexos', '$examenPartesdCuerpo', '$examenFisico', '$temp', '$fcard', '$sat', '$Afechar', '$historiaClinica1');");






  
            // *********************************************************    TABLA  examenFisico *********************************************************
            // *********************************************************    TABLA  examenFisico *********************************************************
 
            // *********************************************************    TABLA  examenesaRealizar *********************************************************
            // *********************************************************    TABLA  examenesaRealizar *********************************************************
            mysqli_query($conn3,"INSERT INTO examenesaRealizar 
              (usuario_id, cliente_id,   historia_id,         laboratorio,    ecografia,    otros,    fechaHora) VALUES 
            ('$ID',        '$clienteId','$historiaClinica1', '$laboratorio', '$ecografia', '$otros', '$Afechar');");






              $queryExamen=mysqli_query($conn3,"SELECT MAX(id) as idexamenesaRealizar from examenesaRealizar");
              $nrowl=mysqli_num_rows($queryExamen);
              while($rowExamen=mysqli_fetch_array($queryExamen))
              {
                $idexamenesaRealizar=$rowExamen['idexamenesaRealizar'];
              }   


          //mssql_query("INSERT INTO examenesaRealizar (id, usuario_id, cliente_id,   historia_id,         laboratorio,    ecografia,    otros,    fechaHora) VALUES ('$idexamenesaRealizar', '$ID',        '$clienteId','$historiaClinica1', '$laboratorio', '$ecografia', '$otros', '$Afechar');");







            // *********************************************************    TABLA  examenesaRealizar *********************************************************
            // *********************************************************    TABLA  examenesaRealizar *********************************************************

  



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


echo "<script language='Javascript'> window.location='finalizado.php?historiaClinica1=$historiaClinica1';</script>"; 

?>