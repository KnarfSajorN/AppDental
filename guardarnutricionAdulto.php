<?php
   //include 'header.php';
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
 //  include 'menu.php'; 



    date_default_timezone_set('America/Bogota');
    include("conexiones/conexion.php");
    $con=conectar();


        //entrevista inicial

        $motivoConsulta        = reem($_POST['motivoConsulta']);
        $enfermedadActual         = reem($_POST['enfermedadActual']);
$usuarioId = $_POST['ID'];

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

        $antecedentesPersonales                 = $_POST['antecedentesPersonales'];

        if ($ant1 <> '') {$antper1 = ' '.$ant1.',';}
        if ($ant2 <> '') {$antper2 = ' '.$ant2.',';}
        if ($ant3 <> '') {$antper3 = ' '.$ant3.',';}
        if ($ant4 <> '') {$antper4 = ' '.$ant4.',';}
        if ($ant5 <> '') {$antper5 = ' '.$ant5.',';}
        if ($ant6 <> '') {$antper6 = ' '.$ant6.',';}
        if ($ant7 <> '') {$antper7 = ' '.$ant7.',';}
        if ($ant8 <> '') {$antper8 = ' '.$ant8.',';}
        if ($ant9 <> '') {$antper9 = ' '.$ant9.',';}
        if ($ant10 <> '') {$antper10 = ' '.$ant10.',';}
        if ($ant11 <> '') {$antper11 = ' '.$ant11.',';}
        if ($ant12 <> '') {$antper12 = ' '.$ant12.',';}
        if ($ant13 <> '') {$antper13 = ' '.$ant13.',';}
        if ($ant14 <> '') {$antper14 = ' '.$ant14.',';}
        if ($ant15 <> '') {$antper15 = ' '.$ant15.',';}
        if ($ant16 <> '') {$antper16 = ' '.$ant16.',';}
        if ($ant17 <> '') {$antper17 = ' '.$ant17.',';}
        if ($ant18 <> '') {$antper18 = ' '.$ant18.',';}
        if ($ant19 <> '') {$antper19 = ' '.$ant19.',';}
        if ($ant20 <> '') {$antper20 = ' '.$ant20.',';}
        if ($ant21 <> '') {$antper21 = ' '.$ant21.',';}
        if ($ant22 <> '') {$antper22 = ' '.$ant22.'. <br>';}
        if ($antecedentesPersonales <> '') {$antper23 = 'Detalles de antecedentes personales:'.$antecedentesPersonales.' ';}

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

        $antecedentesFamiliares                 = $_POST['antecedentesFamiliares'];

        if ($antf1 <> '') {$antfam1 = ' '.$antf1.',';}
        if ($antf2 <> '') {$antfam2 = ' '.$antf2.',';}
        if ($antf3 <> '') {$antfam3 = ' '.$antf3.',';}
        if ($antf4 <> '') {$antfam4 = ' '.$antf4.',';}
        if ($antf5 <> '') {$antfam5 = ' '.$antf5.',';}
        if ($antf6 <> '') {$antfam6 = ' '.$antf6.',';}
        if ($antf7 <> '') {$antfam7 = ' '.$antf7.',';}
        if ($antf8 <> '') {$antfam8 = ' '.$antf8.',';}
        if ($antf9 <> '') {$antfam9 = ' '.$antf9.',';}
        if ($antf10 <> '') {$antfam10 = ' '.$antf10.',';}
        if ($antf11 <> '') {$antfam11 = ' '.$antf11.',';}
        if ($antf12 <> '') {$antfam12 = ' '.$antf12.',';}
        if ($antf13 <> '') {$antfam13 = ' '.$antf13.'. <br>';}
        if ($antecedentesFamiliares <> '') {$antfam14 = 'Detalles de antecedentes familiares:'.$antecedentesFamiliares.' ';}

        $antecedentesFami=$antfam1.$antfam2.$antfam3.$antfam4.$antfam5.$antfam6.$antfam7.$antfam8.$antfam9.$antfam10.$antfam11.$antfam12.$antfam13.$antfam14;


        // *********************************************************    TABLA  examenFisico *********************************************************
        // *********************************************************    TABLA  examenFisico *********************************************************
$edadMeses  = $_POST['edadMeses'];
        $edadanos  = $_POST['edadanos'];
        $perimetrocefalico  = $_POST['perimetrocefalico'];

        $peso                 = $_POST['peso'];
        $altura               = $_POST['altura'];
        $imc                  = $_POST['imc'];
        $ComposicionCorporal  = $_POST['ComposicionCorporal'];

  if ($peso == '') {$peso = 0;}
          if ($altura == '') {$altura = 0;}
          if ($imc == '') {$imc = 0;}
          if ($ComposicionCorporal == '') {$ComposicionCorporal = 0;}
 


         if ($edadMeses < 13) 
         {
            $edadanos = 0;
         }



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







        // *********************************************************    TABLA  examenFisico *********************************************************
        // *********************************************************    TABLA  examenFisico *********************************************************



        $examenPartesdCuerpo                 = reem($_POST['examenPartesdCuerpo']);

        $acompananteFamiliar         = reem($_POST['acompananteFamiliar']);

        $telefono_acompanante         = reem($_POST['telefono_acompanante']);

        $parentesco         = $_POST['parentesco'];

        $diagnostico           = reem($_POST['diagnostico']);

        $tratamiento           = reem($_POST['tratamiento']);


        $p1                 = $_POST['p1'];
        $p2                 = reem($_POST['p2']);
        if ($p1 <> '') {$p1i = ' Para clínicos : '.sino($p1).'<trong> | </trong>';$paraClinicos = $p1i.$p2;}


        $r1                 = $_POST['r1'];
        $r2                 = reem($_POST['r2']);
        if ($r1 <> '') {$r1i = ' Remisión : '.sino($r1).'<trong> | </trong>';$remision = $r1i.$r2;}

        $diagnosticoMsalud                 = reem($_POST['diagnosticoMsalud']);

        $cie10                 = $_POST['cie10'];

        $prestaciones          = reem($_POST['prestaciones']);

        $prestaciones1         = reem($_POST['prestaciones1']);
        $prestaciones2         = reem($_POST['prestaciones2']);

        $recipe                = reem($_POST['recipe']);

        $comoTomarlo                 = reem($_POST['comoTomarlo']);

        $incapacidades         = reem($_POST['incapacidades']);

        $notas                 = reem($_POST['notas']);



        // *********************************************************    TABLA  examenesaRealizar *********************************************************
        // *********************************************************    TABLA  examenesaRealizar *********************************************************



        $laboratorio           = reem($_POST['laboratorio']);
        $ecografia             = reem($_POST['ecografia']);
        $otros                 = reem($_POST['otros']);



        // *********************************************************    TABLA  examenesaRealizar *********************************************************
        // *********************************************************    TABLA  examenesaRealizar *********************************************************



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

 // *********************************************************    TABLA  nutricion *********************************************************
        // *********************************************************    TABLA  nutricion *********************************************************



 $remite                = reem($_POST['remite']);
 $fechaM               = reem($_POST['fechaM']);
 $embarazos                = reem($_POST['embarazos']);
 
if ($fechaM  <> '' or $embarazos <> '' ) {$titulo = '<h4> Antecedetes Ginecológicos:</h4>';}
if ($fechaM  <> '') {$fechaM1   = 'FUM: '.$fechaM.'<trong> | </trong>';}
    if ($embarazos <> '') {$embarazos1   = ' Embarazos: '.$embarazos;}    

        $anteGinecologicos = $titulo.$fechaM1.$embarazos1;


 $patologicos               = reem($_POST['patologicos']);
 if ($patologicos   <> '') {$patologicos1   = ' <b><h4>Antecedentes Patologícos: </h4></b> '.$patologicos;}    
 $quirurgicos               = reem($_POST['quirurgicos']);
 if ($quirurgicos    <> '') {$quirurgicos1   = ' <b><h4>Antecedentes Quirurgícos: </h4></b> '.$quirurgicos;} 
 $medicacion              = reem($_POST['medicacion']);
 if ($medicacion    <> '') {$medicacion1   = ' <b><h4>Antecedentes de Medicación: </h4></b> '.$medicacion;}

  $antenutricion = $anteGinecologicos.$patologicos1.$quirurgicos1.$medicacion1; 

 $TRAE               = reem($_POST['TRAE']);
 $fecha1               = reem($_POST['fecha1']);
if ( $TRAE   <> '' or  $fecha1 <> ''  ) { $TRAE1   = ' Trae?:'. $TRAE.' &nbsp&nbsp&nbspFecha:'.$fecha1 ;}    

 $hb                = reem($_POST['hb']);
  if ($hb <> ''  ) { $hb1   = ' <br>HB:'.$hb ;}    

 $Htcto              = reem($_POST['Htcto']);
  if ($Htcto   <> '') {$Htcto1   = ' &nbsp&nbsp&nbspHtcto '.$Htcto;}    

 $blancos                = reem($_POST['blancos']);
 if ( $blancos   <> '') { $blancos1   = ' &nbsp&nbsp&nbspBlancos '. $blancos ;} 

 $titulo2='<br><b>Otros Hemogramas</b><br> <i>Perfil Lipídico:</i>';

 $Coltotal              = reem($_POST['Coltotal']);
if ( $Coltotal<> ''  ) { $Coltotal1   = ' <br>Col Total:'. $Coltotal ;}

 $TG              = reem($_POST['TG']);
  if ($TG    <> '') {$TG1   = ' &nbsp&nbsp&nbspTG: '.$TG ;}  
 $ColLDL             = reem($_POST['ColLDL']);
 if ($ColLDL    <> '') {$ColLDL1   = ' &nbsp&nbsp&nbspCol LDL: '.$ColLDL ;} 
 $COLHDL             = reem($_POST['COLHDL']);
  if ($COLHDL    <> '') {$COLHDL1   = ' &nbsp&nbsp&nbspCol COL HDL: '.$COLHDL;} 
  
    $titulo3='<br> <i>Glucemia:</i>';

 $Ayunas               = reem($_POST['Ayunas']);
 if ( $Ayunas <> ''  ) {$Ayunas1   = ' <br>Ayunas:'.$Ayunas  ;}
 $curva                = reem($_POST['curva']);
  if ($curva    <> '') {$curva1   = ' &nbsp&nbsp&nbspPre Carga:'. $curva  ;} 
 $Post             = reem($_POST['Post']);
  if ($Post  <> '') {$Post1   = ' &nbsp&nbsp&nbspPost: '. $Post ;} 
 $A1C               = reem($_POST['A1C']);
 if ($A1C   <> '') { $A1C1   = ' &nbsp&nbsp&nbspA1C: '.  $A1C ;} 
 $ACIDO              = reem($_POST['ACIDO']);
 if ($ACIDO    <> '') {$ACIDO1   = ' &nbsp&nbsp&nbspAcido:: '.$ACIDO;} 
 $titulo4='<br> <i>Función tiroidea:</i>';
 $TSH               = reem($_POST['TSH']);
 if ($TSH  <> ''  ) {$TSH1   = ' <br>TSH :'.$TSH  ;}
 $T3              = reem($_POST['T3']);
  if ($T3   <> '') {$T31   = ' &nbsp&nbsp&nbspT3:'.$T3  ;} 
 $T4               = reem($_POST['T4']);
  if ($T4   <> '') {$T41   = ' &nbsp&nbsp&nbspT4:'.$T4;} 

   $titulo5='<br> <i>Insulina:</i>';
 $Ayunasi               = reem($_POST['Ayunasi']);
  if ($Ayunasi <> ''  ) {$Ayunasi1   = ' <br>Ayunas:'.$Ayunasi ;}
 $pre                = reem($_POST['pre']);
 if ($pre   <> '') {$pre1   = ' &nbsp&nbsp&nbspPre'.$pre;} 
 $post1              = reem($_POST['post1']);
  if ($post1    <> '') {$post11   = ' &nbsp&nbsp&nbspPost'.$post1 ;} 
 $titulo6='<br> <i>Perfil hepático:</i>';
 $AST               = reem($_POST['AST']);
 if ($AST   <> ''  ) {$AST1   = ' <br>AST:'.$AST ;}
 $ALT              = reem($_POST['ALT']);
  if ($ALT   <> '') {$ALT1   = ' &nbsp&nbsp&nbspALT: '.$ALT ;} 
 $TGO             = reem($_POST['TGO']);
  if ($TGO    <> '') {$TGO1   = ' &nbsp&nbsp&nbspTGO: '.$TGO ;} 
$titulo7='<br> <i>Perfil vitaminas:</i>';
 $Calcio             = reem($_POST['Calcio']);
  if ($Calcio    <> ''  ) {$Calcio1   = ' <br>Calcio:'.$Calcio ;}
 $VitD             = reem($_POST['VitD']);
  if ( $VitD    <> '') { $VitD1   = ' &nbsp&nbsp&nbspVit D: '.$VitD;} 
 $VitB12              = reem($_POST['VitB12']);
 if ( $VitB12    <> '') { $VitB121   = ' &nbsp&nbsp&nbspVit B12: '. $VitB12  ;} 
 $titulo8='<br> <i>Perfil gestante:</i>';

 $Toxop              = reem($_POST['Toxop']);
  if ($Toxop   <> ''  ) {$Toxop1   = ' <br>Toxop:'.$Toxop;}

 $IgG              = reem($_POST['IgG']);
  if ($IgG     <> '') {$IgG1   = ' &nbsp&nbsp&nbspIgG: '.$IgG;} 

 $IgM               = reem($_POST['IgM']);
  if ($IgM     <> '') {$IgM1   = ' &nbsp&nbsp&nbspIgM : '.$IgM ;}
 $otros              = reem($_POST['otros']);
  if ($otros     <> '') {$otros1   = ' &nbsp&nbsp&nbspIgM : '.$otros ;}

 $obser               = reem($_POST['obser']);
  if ($obser   <> ''  ) {$obser1   = ' <br>Observaciones:'.$obser;}



 $parametros=$TRAE1.$hb1.$Htcto1.$blancos1.$titulo2.$Coltotal1.$TG1.$ColLDL1.$COLHDL1.$titulo3.$Ayunas1.$curva1.$Post1.$A1C1.$ACIDO1.$titulo4.$TSH1.$T31.$T41.$titulo5.$Ayunasi1.$pre1.$post11.$titulo6.$AST1.$ALT1.$TGO1.$titulo7.$Calcio1.$VitD1.$VitB121.$titulo8.$Toxop1.$IgG1.$IgM1.$otros1.$obser1;




 $hrasS             = reem($_POST['hrasS']);
  if ($hrasS <> ''  ) {$hrasS1   = ' Horas de Sueño/Día (horas):'.$hrasS;}

 $SUEÑO              = reem($_POST['SUEÑO']);
  if ($SUEÑO <> '') {$SUEÑO1   = ' &nbsp&nbsp&nbspCalidad del sueño: '.$SUEÑO;} 

 $actividadF              = reem($_POST['actividadF']);
  if ($actividadF  <> '') {$actividadF1   = ' &nbsp&nbsp&nbspActividad Física : '.$actividadF ;} 

 $tipoA               = reem($_POST['tipoA']);
  if ($tipoA <> '') {$tipoA1   = ' &nbsp&nbsp&nbspTipo de Actividad : '.$tipoA ;} 

//$titulo9='<br> <i>Estrés Laboral:</i>';
 $alto              = reem($_POST['alto']);
if ($alto  <> ''  ) {$alto1   = ' <br>Estres:'.$alto ;}

 /*$moderado               = reem($_POST['moderado']);
  if ($moderado <> '') {$moderado1   = ' &nbsp&nbsp&nbspModerado: '.$moderado ;} 

 $bajo              = reem($_POST['bajo']);
  if ($bajo <> '') {$bajo1   = ' &nbsp&nbsp&nbspModerado: '.$bajo;} */
$titulo10='<br> <i>Viciosl:</i>';

 $alcohol             = reem($_POST['alcohol']);
  if ($alcohol  <> ''  ) {$alcohol1   = ' <br>Alcohol:'.$alcohol ;}

 $cantidadalcohol             = reem($_POST['cantidadalcohol']);
  if ($cantidadalcohol  <> '') {$cantidadalcohol1   = ' &nbsp&nbsp&nbspCantidad de Acohol: '.$cantidadalcohol ;} 

 $frecuencia           = reem($_POST['frecuencia']);
  if ($frecuencia <> '') {$frecuencia1   = ' &nbsp&nbsp&nbspFrecuencia: '.$frecuencia ;} 

 $cigarrillo              = reem($_POST['cigarrillo']);
  if ($cigarrillo <> ''  ) {$cigarrillo1   = ' <br>Cigarrillo:'.$cigarrillo ;}

 $cantidad1                = reem($_POST['cantidad1']);
  if ($cantidad1   <> '') {$cantidad11   = ' &nbsp&nbsp&nbspCantidad: '.$cantidad1 ;} 

 $frecuencia1            = reem($_POST['frecuencia1']);
  if ($frecuencia1   <> '') {$frecuencia11   = ' &nbsp&nbsp&nbspFrecuencia1: '.$frecuencia1 ;} 


$estiloVida=$hrasS1.$SUEÑO1.$actividadF1.$tipoA1.$alto1.$moderado1.$bajo1.$titulo10.$alcohol1.$cantidadalcohol1.$frecuencia1.$cigarrillo1.$cantidad11.$frecuencia11; 
  



 $Fuerza             = reem($_POST['Fuerza']);
  if ($Fuerza  <> ''  ) {$Fuerza1   = 'fuerza:'.$Fuerza ;}

 $Dinamometro             = reem($_POST['Dinamometro']);
  if ( $Dinamometro   <> '') { $Dinamometro1   = ' &nbsp&nbsp&nbspDinamometro : '. $Dinamometro  ;} 

 $masa             = reem($_POST['masa']);
  if ($masa  <> '') {$masa1   = ' &nbsp&nbsp&nbspMasa: '.$masa ;} 

 $compocorporal             = reem($_POST['compocorporal']);
  if ($compocorporal   <> '') {$compocorporal1   = ' &nbsp&nbsp&nbspComposición Corporal: '.$compocorporal   ;} 

 $Rendimientomuscular               = reem($_POST['Rendimientomuscular']);
  if ($Rendimientomuscular<> ''  ) {$Rendimientomuscular1   = ' <br>Rendimiento muscular:'.$Rendimientomuscular;}

 $velocidad                = reem($_POST['velocidad']);
  if ($velocidad   <> '') {$velocidad1   = ' &nbsp&nbsp&nbspVelocidad : '.$velocidad  ;} 

 $marcha             = reem($_POST['marcha']);
  if ( $marcha   <> '') { $marcha1   = ' &nbsp&nbsp&nbspMarcha: '. $marcha  ;} 

 $equilibrio               = reem($_POST['equilibrio']);
  if ($equilibrio   <> '') {$equilibrio1   = ' &nbsp&nbsp&nbspEquilibrio: '.$equilibrio  ;} 

 $silla             = reem($_POST['silla']);
  if ($silla  <> '') {$silla1   = ' &nbsp&nbsp&nbspSilla : '.$silla   ;} 


 $funcionalidadMuscular=$Fuerza1.$Dinamometro1.$masa1.$compocorporal1.$Rendimientomuscular1.$velocidad1.$marcha1.$equilibrio1.$silla1;


 $alergiasA            = reem($_POST['alergiasA']);
  if ($alergiasA  <> ''  ) {$alergiasA1   = ' Alergías:'.$alergiasA  ;}

 $cuales1           = reem($_POST['cuales1']);
  if ($cuales1  <> '') {$cuales11   = ' &nbsp&nbsp&nbspCuales?: '.$cuales1;} 
  $titulo11='<br> <i>Síntomas GI:</i>';

 $gastritis             = reem($_POST['gastritis']);
  if ($gastritis  <> '') {$gastritis1   = '<br>Síntomas GI : '.$gastritis ;} 

$rge              = reem($_POST['varios']);
  if ($rge   <> '') {$rge1   = ' &nbsp&nbsp&nbspVarios: '.$rge ;} 

 /*$colon              = reem($_POST['colon']);
  if ($colon   <> '') {$colon1   = ' &nbsp&nbsp&nbspColón Irritable: '.$colon  ;} 
  $titulo12='<br> <i>Hábito Instestinal:</i>';*/

 $adecuado             = reem($_POST['adecuado']);
  if ($adecuado    <> '') { $adecuado1   = '&nbsp&nbsp&nbspHábito Intestinal: '. $adecuado    ;} 

   $bristol             = reem($_POST['bristol']);
  if ($bristol   <> '') {$bristol1   = ' <br>Bristol: '.$bristol ;}

 $estreñ             = reem($_POST['estreñ']);
  if ($estreñ   <> '') {$estreñ1   = '<br>Notas: '.$estreñ;}  


  $titulo13='<br> <i>Conducta alimentaria:</i>';

 $sobreI            = reem($_POST['sobreI']);
  if ($sobreI  <> '') {$sobreI1   = '<br>presenta atracones o sobreingestas?: '.$sobreI ;} 

 $RESTRICCIONE           = reem($_POST['RESTRICCIONE']);
  if ($RESTRICCIONE <> '') {$RESTRICCIONE1   = '<br>Restricciones alimentarias: '.$sobreI ;} 

 $alimentos            = reem($_POST['alimentos']);
  if ($alimentos <> '') {$alimentos1   = '<br>Alimentos que producen temor: '.$sobreI ;} 

 $intorelancias            = reem($_POST['intorelancias']);
  if ($intorelancias  <> '') {$intorelancias1   = '<br>Intolerancias: '.$intorelancias ;} 

$Rechazos             = reem($_POST['Rechazos']);
  if ($Rechazos   <> '') {$Rechazos1   = '<br>Rechazos: '.$Rechazos;} 

 $Preferencias             = reem($_POST['Preferencias']);
  if ($Preferencias <> '') {$Preferencias1   = '<br>Preferencias: '.$Preferencias;} 

 $Suplementos             = reem($_POST['Suplementos']);
  if ($Suplementos <> '') {$Suplementos1   = '<br>Consumo de Suplementos: '.$Suplementos ;} 
  $titulo14='<br> <b>Frecuencia de Consumo:</b>';

 $bebidas            = reem($_POST['bebidas']);
  if ($bebidas<> '') {$bebidas1   = '<br>Bebidas Azucaradas: '.$bebidas;} 

 $panaderia           = reem($_POST['panaderia']);
  if ( $panaderia     <> '') { $panaderia1   = ' &nbsp&nbsp&nbspProductos de panaderia: '.$panaderia;} 

 $dulces           = reem($_POST['dulces']);
  if ($dulces<> '') {$dulces1   = ' &nbsp&nbsp&nbspDulces y Postres: '.$dulces ;} 

 $comidasR           = reem($_POST['comidasR']);
  if ($comidasR  <> '') {$comidasR1   = '<br>Comidas Rápidas: '.$comidasR;} 

 $fritos            = reem($_POST['fritos']);
  if ( $fritos     <> '') { $fritos1   = ' &nbsp&nbsp&nbspFritos: '.$fritos ;} 

$Ensaladas             = reem($_POST['Ensaladas']);
  if ($Ensaladas  <> '') {$Ensaladas1   = ' &nbsp&nbsp&nbspEnsaladas: '.$Ensaladas;} 

 $Frutas            = reem($_POST['Frutas']);
  if ( $Frutas    <> '') { $Frutas1   = '<br> Frutas : '.$Frutas;} 

 $Granos             = reem($_POST['Granos']);
  if ($Granos   <> '') {$Granos1   = ' &nbsp&nbsp&nbspGranos: '.$Granos ;} 

 $embutidos            = reem($_POST['embutidos']);
 if ($embutidos   <> '') {$embutidos1   = ' &nbsp&nbsp&nbspEmbutidos: '.$embutidos ;} 

 $sal           = reem($_POST['sal']);
 if ($sal   <> '') {$sal1   = ' &nbsp&nbsp&nbspSal: '.$sal;} 
 $agua          = reem($_POST['agua']);
 if ($agua   <> '') {$agua1   = ' &nbsp&nbsp&nbspAgua: '.$agua;} 


$anamnesis=$alergiasA1.$cuales11.$gastritis1.$rge1.$colon1.$adecuado1.$estreñ1.$bristol1.$titulo13.$sobreI1.$RESTRICCIONE1.$alimentos1.$intorelancias1.$Rechazos1.$Preferencias1.$Suplementos1.$titulo14.$bebidas1.$panaderia1.$dulces1.$comidasR1.$fritos1.$Ensaladas1.$Frutas1.$Granos1.$embutidos1.$sal1.$agua1; 



$hora1           = reem($_POST['hora1']);
  if ($hora1 <> '') { $hora11  =' <td> Hora:'.$hora1.'</td>';}else{$hora11 = ' <td>"  "</td>';} 

$preparacion1           = reem($_POST['preparacion1']);
  if ($preparacion1 <> '') { $preparacion11P  =' <td>'.$preparacion1.'</td>' ;}else{$preparacion11P = ' <td>"  "</td>';} 

 $cantidad1            = reem($_POST['cantidad1']);
  if ($cantidad1 <> '') {$cantidad11P  ='<td>'.$cantidad1.'</td>';}else{$cantidad11P = ' <td>"  "</td>';} 

 $ic1             = reem($_POST['ic1']);
  if ($ic1 <> '') {$ic11P  =' <td>'.$ic1.'</td></tr>';}else{$ic11P = ' <td>"  "</td></tr>';} 

  $preparacion11           = reem($_POST['preparacion11']);
  if ($preparacion11 <> '') { $preparacion1111  =' <td>'.$preparacion11.'</td>' ;}else{$preparacion1111 = ' <td>"  "</td>';} 

 $cantidad11            = reem($_POST['cantidad11']);
  if ($cantidad11 <> '') {$cantidad1111  ='<td>'.$cantidad11.'</td>';}else{$cantidad1111 = ' <td>"  "</td>';} 

 $ic11             = reem($_POST['ic11']);
  if ($ic11 <> '') {$ic1111  =' <td>'.$ic11.'</td></tr>';}else{$ic1111 = ' <td>"  "</td></tr>';} 

  $preparacion12           = reem($_POST['preparacion12']);
  if ($preparacion12 <> '') { $preparacion1212  =' <td>'.$preparacion12.'</td>' ;}else{$preparacion1212 = ' <td>"  "</td>';} 

 $cantidad12            = reem($_POST['cantidad12']);
  if ($cantidad12 <> '') {$cantidad1212  ='<td>'.$cantidad12.'</td>';}else{$cantidad1212 = ' <td>"  "</td>';} 

 $ic12             = reem($_POST['ic12']);
  if ($ic12 <> '') {$ic1212  =' <td>'.$ic12.'</td></tr>';}else{$ic1212 = ' <td>"  "</td></tr>';} 

  $preparacion13           = reem($_POST['preparacion13']);
  if ($preparacion13 <> '') { $preparacion1313  =' <td>'.$preparacion13.'</td>' ;}else{$preparacion1313 = ' <td>"  "</td>';} 

 $cantidad13            = reem($_POST['cantidad13']);
  if ($cantidad13 <> '') {$cantidad1313  ='<td>'.$cantidad13.'</td>';}else{$cantidad1313 = ' <td>"  "</td>';} 

 $ic13             = reem($_POST['ic13']);
  if ($ic13 <> '') {$ic1313  =' <td>'.$ic13.'</td></tr>';}else{$ic1313 = ' <td>"  "</td></tr>';}

  $preparacion14           = reem($_POST['preparacion14']);
  if ($preparacion14 <> '') { $preparacion1414  =' <td>'.$preparacion14.'</td>' ;}else{$preparacion1414 = ' <td>"  "</td>';} 

 $cantidad14            = reem($_POST['cantidad14']);
  if ($cantidad14 <> '') {$cantidad1414  ='<td>'.$cantidad14.'</td>';}else{$cantidad1414 = ' <td>"  "</td>';} 

 $ic14             = reem($_POST['ic14']);
  if ($ic14 <> '') {$ic1414  =' <td>'.$ic14.'</td></tr>';}else{$ic1414 = ' <td>"  "</td></tr>';}

 $lugar1           = reem($_POST['lugar1']);
  if ($lugar1 <> '') {$lugar11  =' <td>Lugar:'.$lugar1.'</td>';}else{$lugar11 = '<td>"  "</td></tr>';} 




$hora2           = reem($_POST['hora2']);
  if ($hora2 <> '') { $hora22  =' <td>Hora:'.$hora2.'</td>';}else{$hora22 = ' <td>"  "</td>';} 

$preparacion2           = reem($_POST['preparacion2']);
  if ($preparacion2 <> '') { $preparacion22P  =' <td>'.$preparacion2.'</td>' ;}else{$preparacion22P = ' <td>"  "</td>';} 

 $cantidad2            = reem($_POST['cantidad2']);
  if ($cantidad2 <> '') {$cantidad22P  ='<td>'.$cantidad2.'</td>';}else{$cantidad22P = ' <td>"  "</td>';} 

 $ic2             = reem($_POST['ic2']);
  if ($ic2 <> '') {$ic22P  =' <td>'.$ic2.'</td></tr>';}else{$ic22P = ' <td>"  "</td></tr>';} 

$preparacion21           = reem($_POST['preparacion21']);
  if ($preparacion21 <> '') { $preparacion2121  =' <td>'.$preparacion21.'</td>' ;}else{$preparacion2121 = ' <td>"  "</td>';} 

 $cantidad21            = reem($_POST['cantidad21']);
  if ($cantidad21 <> '') {$cantidad2121  ='<td>'.$cantidad21.'</td>';}else{$cantidad2121 = ' <td>"  "</td>';} 

 $ic21             = reem($_POST['ic21']);
  if ($ic21 <> '') {$ic2121  =' <td>'.$ic21.'</td></tr>';}else{$ic2121 = ' <td>"  "</td></tr>';}

  $preparacion22           = reem($_POST['preparacion22']);
  if ($preparacion22 <> '') { $preparacion2222  =' <td>'.$preparacion22.'</td>' ;}else{$preparacion2222 = ' <td>"  "</td>';} 

 $cantidad22            = reem($_POST['cantidad22']);
  if ($cantidad22 <> '') {$cantidad2222  ='<td>'.$cantidad22.'</td>';}else{$cantidad2222 = ' <td>"  "</td>';} 

 $ic22             = reem($_POST['ic22']);
  if ($ic22 <> '') {$ic2222  =' <td>'.$ic22.'</td></tr>';}else{$ic2222 = ' <td>"  "</td></tr>';}

  $preparacion23           = reem($_POST['preparacion23']);
  if ($preparacion23 <> '') { $preparacion2323  =' <td>'.$preparacion23.'</td>' ;}else{$preparacion2323 = ' <td>"  "</td>';} 

 $cantidad23            = reem($_POST['cantidad23']);
  if ($cantidad23 <> '') {$cantidad2323  ='<td>'.$cantidad23.'</td>';}else{$cantidad2323 = ' <td>"  "</td>';} 

 $ic23             = reem($_POST['ic23']);
  if ($ic23 <> '') {$ic2323  =' <td>'.$ic23.'</td></tr>';}else{$ic2323 = ' <td>"  "</td></tr>';}

  $preparacion24           = reem($_POST['preparacion24']);
  if ($preparacion24 <> '') { $preparacion2424  =' <td>'.$preparacion24.'</td>' ;}else{$preparacion2424 = ' <td>"  "</td>';} 

 $cantidad24            = reem($_POST['cantidad24']);
  if ($cantidad24 <> '') {$cantidad2424  ='<td>'.$cantidad24.'</td>';}else{$cantidad2424 = ' <td>"  "</td>';} 

 $ic24             = reem($_POST['ic24']);
  if ($ic24 <> '') {$ic2424  =' <td>'.$ic24.'</td></tr>';}else{$ic2424 = ' <td>"  "</td></tr>';}


$lugar2           = reem($_POST['lugar2']);
  if ($lugar2 <> '') {$lugar22  =' <td> Lugar:'.$lugar2.'</td>';}else{$lugar22 = '<td>"  "</td></tr>';} 

 $hora3           = reem($_POST['hora3']);
  if ($hora3 <> '') { $hora33  =' <td>HOra:'.$hora3.'</td>';}else{$hora33 = ' <td>"  "</td>';} 

$preparacion3           = reem($_POST['preparacion3']);
  if ($preparacion3 <> '') { $preparacion33P  =' <td>'.$preparacion3.'</td>' ;}else{$preparacion33P = ' <td>"  "</td>';} 

 $cantidad3            = reem($_POST['cantidad3']);
  if ($cantidad3 <> '') {$cantidad33P  ='<td>'.$cantidad3.'</td>';}else{$cantidad33P = ' <td>"  "</td>';} 

 $ic3             = reem($_POST['ic3']);
  if ($ic3 <> '') {$ic33P  =' <td>'.$ic3.'</td></tr>';}else{$ic33P = ' <td>"  "</td></tr>';} 

  $preparacion31           = reem($_POST['preparacion31']);
  if ($preparacion31 <> '') { $preparacion3131  =' <td>'.$preparacion31.'</td>' ;}else{$preparacion3131 = ' <td>"  "</td>';} 

 $cantidad31            = reem($_POST['cantidad31']);
  if ($cantidad31 <> '') {$cantidad3131  ='<td>'.$cantidad31.'</td>';}else{$cantidad3131 = ' <td>"  "</td>';} 

 $ic31             = reem($_POST['ic31']);
  if ($ic31 <> '') {$ic3131  =' <td>'.$ic31.'</td></tr>';}else{$ic3131 = ' <td>"  "</td></tr>';}

  $preparacion32           = reem($_POST['preparacion32']);
  if ($preparacion32 <> '') { $preparacion3232  =' <td>'.$preparacion32.'</td>' ;}else{$preparacion3232 = ' <td>"  "</td>';} 

 $cantidad32            = reem($_POST['cantidad32']);
  if ($cantidad32 <> '') {$cantidad3232  ='<td>'.$cantidad32.'</td>';}else{$cantidad3232 = ' <td>"  "</td>';} 

 $ic32             = reem($_POST['ic32']);
  if ($ic32 <> '') {$ic3232  =' <td>'.$ic32.'</td></tr>';}else{$ic3232 = ' <td>"  "</td></tr>';}

  $preparacion33           = reem($_POST['preparacion33']);
  if ($preparacion33 <> '') { $preparacion3333  =' <td>'.$preparacion33.'</td>' ;}else{$preparacion3333 = ' <td>"  "</td>';} 

 $cantidad33            = reem($_POST['cantidad33']);
  if ($cantidad33 <> '') {$cantidad3333  ='<td>'.$cantidad33.'</td>';}else{$cantidad3333 = ' <td>"  "</td>';} 

 $ic33             = reem($_POST['ic33']);
  if ($ic33 <> '') {$ic3333  =' <td>'.$ic33.'</td></tr>';}else{$ic3333 = ' <td>"  "</td></tr>';}

  $preparacion34           = reem($_POST['preparacion34']);
  if ($preparacion34 <> '') { $preparacion3434  =' <td>'.$preparacion34.'</td>' ;}else{$preparacion3434 = ' <td>"  "</td>';} 

 $cantidad34            = reem($_POST['cantidad34']);
  if ($cantidad34 <> '') {$cantidad3434  ='<td>'.$cantidad34.'</td>';}else{$cantidad3434 = ' <td>"  "</td>';} 

 $ic34             = reem($_POST['ic34']);
  if ($ic34 <> '') {$ic3434  =' <td>'.$ic34.'</td></tr>';}else{$ic3434 = ' <td>"  "</td></tr>';}

 $lugar3           = reem($_POST['lugar3']);
  if ($lugar3 <> '') {$lugar33  =' <td> Lugar:'.$lugar3.'</td>';}else{$lugar33 = '<td>"  "</td></tr>';} 
 

  $hora4           = reem($_POST['hora4']);
  if ($hora4 <> '') { $hora44  =' <td> Hora:'.$hora4.'</td>';}else{$hora44 = ' <td>"  "</td>';} 

$preparacion4           = reem($_POST['preparacion4']);
  if ($preparacion4 <> '') { $preparacion44P  =' <td>'.$preparacion4.'</td>' ;}else{$preparacion44P = ' <td>"  "</td>';} 

 $cantidad4            = reem($_POST['cantidad4']);
  if ($cantidad4 <> '') {$cantidad44P  ='<td>'.$cantidad4.'</td>';}else{$cantidad44P = ' <td>"  "</td>';} 

 $ic4             = reem($_POST['ic4']);
  if ($ic4 <> '') {$ic44P  =' <td>'.$ic4.'</td></tr>';}else{$ic44P = ' <td>"  "</td></tr>';} 

  $preparacion41           = reem($_POST['preparacion41']);
  if ($preparacion41 <> '') { $preparacion4141  =' <td>'.$preparacion41.'</td>' ;}else{$preparacion4141 = ' <td>"  "</td>';} 

 $cantidad41            = reem($_POST['cantidad41']);
  if ($cantidad41 <> '') {$cantidad4141  ='<td>'.$cantidad41.'</td>';}else{$cantidad4141 = ' <td>"  "</td>';} 

 $ic41             = reem($_POST['ic41']);
  if ($ic41 <> '') {$ic4141  =' <td>'.$ic41.'</td></tr>';}else{$ic4141 = ' <td>"  "</td></tr>';}
  $preparacion42           = reem($_POST['preparacion42']);
  if ($preparacion42 <> '') { $preparacion4242  =' <td>'.$preparacion42.'</td>' ;}else{$preparacion4242 = ' <td>"  "</td>';} 

 $cantidad42            = reem($_POST['cantidad42']);
  if ($cantidad42 <> '') {$cantidad4242  ='<td>'.$cantidad42.'</td>';}else{$cantidad4242 = ' <td>"  "</td>';} 

 $ic42             = reem($_POST['ic42']);
  if ($ic42 <> '') {$ic4242  =' <td>'.$ic42.'</td></tr>';}else{$ic4242 = ' <td>"  "</td></tr>';}

  $preparacion43           = reem($_POST['preparacion43']);
  if ($preparacion43 <> '') { $preparacion4343  =' <td>'.$preparacion43.'</td>' ;}else{$preparacion4343 = ' <td>"  "</td>';} 

 $cantidad43            = reem($_POST['cantidad43']);
  if ($cantidad43 <> '') {$cantidad4343  ='<td>'.$cantidad43.'</td>';}else{$cantidad4343 = ' <td>"  "</td>';} 

 $ic43             = reem($_POST['ic43']);
  if ($ic43 <> '') {$ic4343  =' <td>'.$ic43.'</td></tr>';}else{$ic4343 = ' <td>"  "</td></tr>';}

  $preparacion44           = reem($_POST['preparacion44']);
  if ($preparacion44 <> '') { $preparacion4444  =' <td>'.$preparacion44.'</td>' ;}else{$preparacion4444 = ' <td>"  "</td>';} 

 $cantidad44            = reem($_POST['cantidad44']);
  if ($cantidad44 <> '') {$cantidad4444  ='<td>'.$cantidad44.'</td>';}else{$cantidad4444 = ' <td>"  "</td>';} 

 $ic44             = reem($_POST['ic44']);
  if ($ic44 <> '') {$ic4444  =' <td>'.$ic44.'</td></tr>';}else{$ic4444 = ' <td>"  "</td></tr>';}

 $lugar4           = reem($_POST['lugar4']);
  if ($lugar4 <> '') {$lugar44  =' <td> Lugar:'.$lugar4.'</td>';}else{$lugar44 = '<td>"  "</td></tr>';} 



   $hora5           = reem($_POST['hora5']);
  if ($hora5 <> '') { $hora55  =' <td>Hora:'.$hora5.'</td>';}else{$hora55 = ' <td>"  "</td>';} 

$preparacion5           = reem($_POST['preparacion5']);
  if ($preparacion5 <> '') { $preparacion55P  =' <td>'.$preparacion5.'</td>' ;}else{$preparacion55P = ' <td>"  "</td>';} 

 $cantidad5            = reem($_POST['cantidad5']);
  if ($cantidad5 <> '') {$cantidad55P  ='<td>'.$cantidad5.'</td>';}else{$cantidad55P = ' <td>"  "</td>';} 

 $ic5             = reem($_POST['ic5']);
  if ($ic5 <> '') {$ic55P  =' <td>'.$ic5.'</td></tr>';}else{$ic55P = ' <td>"  "</td></tr>';} 

$preparacion51           = reem($_POST['preparacion51']);
  if ($preparacion51 <> '') { $preparacion5151 =' <td>'.$preparacion51.'</td>' ;}else{$preparacion5151 = ' <td>"  "</td>';} 

 $cantidad51            = reem($_POST['cantidad51']);
  if ($cantidad51 <> '') {$cantidad5151  ='<td>'.$cantidad51.'</td>';}else{$cantidad5151 = ' <td>"  "</td>';} 

 $ic51             = reem($_POST['ic51']);
  if ($ic51 <> '') {$ic5151  =' <td>'.$ic51.'</td></tr>';}else{$ic5151 = ' <td>"  "</td></tr></table>';} 

 $lugar5           = reem($_POST['lugar5']);
  if ($lugar5 <> '') {$lugar55  =' <td>Lugar:'.$lugar5.'</td>';}else{$lugar55 = '<td>"  "</td></tr>';} 
$preparacion52           = reem($_POST['preparacion52']);

  if ($preparacion52 <> '') { $preparacion5252 =' <td>'.$preparacion52.'</td>' ;}else{$preparacion5252 = ' <td>"  "</td>';} 

 $cantidad52            = reem($_POST['cantidad52']);
  if ($cantidad52 <> '') {$cantidad5252  ='<td>'.$cantidad52.'</td>';}else{$cantidad5252 = ' <td>"  "</td>';} 

 $ic52             = reem($_POST['ic52']);
  if ($ic52 <> '') {$ic5252  =' <td>'.$ic52.'</td></tr>';}else{$ic5252 = ' <td>"  "</td></tr>';} 

  $preparacion53           = reem($_POST['preparacion53']);
  if ($preparacion53 <> '') { $preparacion5353 =' <td>'.$preparacion53.'</td>' ;}else{$preparacion5353 = ' <td>"  "</td>';} 

 $cantidad53            = reem($_POST['cantidad53']);
  if ($cantidad53 <> '') {$cantidad5353  ='<td>'.$cantidad53.'</td>';}else{$cantidad5353 = ' <td>"  "</td>';} 

 $ic53             = reem($_POST['ic53']);
  if ($ic53 <> '') {$ic5353  =' <td>'.$ic53.'</td></tr>';}else{$ic5353 = ' <td>"  "</td></tr>';} 

  $preparacion54           = reem($_POST['preparacion54']);
  if ($preparacion54 <> '') { $preparacion5454 =' <td>'.$preparacion54.'</td>' ;}else{$preparacion5454 = ' <td>"  "</td>';} 

 $cantidad54            = reem($_POST['cantidad54']);
  if ($cantidad54 <> '') {$cantidad5454  ='<td>'.$cantidad54.'</td>';}else{$cantidad5454 = ' <td>"  "</td>';} 

 $ic54             = reem($_POST['ic54']);
  if ($ic54 <> '') {$ic5454  =' <td>'.$ic54.'</td></tr>';}else{$ic5454 = ' <td>"  "</td></tr></table>';} 

$titulo15= '<table class= "table table-bordered"><tr> </tr> <br>';
$titulos= '<b><tr><td> Alimento/Preparacion</td><td> Cantidad</td> <td> #IC </td></tr></b> <br>';
$comida1='<tr><td><b>DESAYUNO</b></td> </tr>';
$comida2='<tr><td><b>MEDIA MAÑANA</b></td> </tr>';
$comida3='<tr><td><b>AlLMUERZO</td></b> </tr>';
$comida4='<tr><td><b>MEDIA TARDE </b></td> </tr>';
$comida5='<tr><td><b>CENA </b></td> </tr>';

$consumofin           = reem($_POST['consumofin']);
  if ($consumofin <> '') {$consumofin1   = '<br> Consumo del fin de semana: '.$consumofin;} 

 $cambiar          = reem($_POST['cambiar']);
  if ($cambiar <> '') {$cambiar1   = ' &nbsp&nbsp&nbspQue esta dispuesto a cambiar?: '.$cambiar;} 

 $diaganosticoN             = reem($_POST['diaganosticoN']);
  if ($diaganosticoN <> '') {$diaganosticoN1   = ' <br>DIANÓSTICO NUTRICIONAL: '.$diaganosticoN;} 

 $objetivoP        = reem($_POST['objetivoP']);
  if ($objetivoP<> '') {$objetivoP1   = ' <br>OBJETIVO (Paciente + ND): '.$objetivoP;} 

$PLAN          = reem($_POST['PLAN']);
  if ($PLAN <> '') {$PLAN1   = '<br> CONCEPTO Y PLAN: '.$PLAN;} 
 


$consumoH=$titulo15.$comida1.$hora11.$lugar11.$titulos.$preparacion11P.$cantidad11P.$ic11P.$preparacion1111.$cantidad1111.$ic1111.$preparacion1212.$cantidad1212.$ic1212.$preparacion1313.$cantidad1313.$ic1313.$preparacion1414.$cantidad1414.$ic1414.$comida2.$hora22.$lugar22.$titulos.$preparacion22P.$cantidad22P.$ic22P.$preparacion2121.$cantidad2121.$ic2121.$preparacion2222.$cantidad2222.$ic2222.$preparacion2323.$cantidad2323.$ic2323.$preparacion2424.$cantidad2424.$ic2424.$comida3.$hora33.$lugar33.$titulos.$preparacion33P.$cantidad33P.$ic33P.$preparacion3131.$cantidad3131.$ic3131.$preparacion3232.$cantidad3232.$ic3232.$preparacion3333.$cantidad3333.$ic3333.$preparacion3434.$cantidad3434.$ic3434.$comida4.$hora44.$lugar44.$titulos.$preparacion44P.$cantidad44P.$ic44P.$preparacion4141.$cantidad4141.$ic4141.$preparacion4242.$cantidad4242.$ic4242.$preparacion4343.$cantidad4343.$ic4343.$preparacion4444.$cantidad4444.$ic4444.$comida5.$hora55.$lugar55.$titulos.$preparacion55P.$cantidad55P.$ic55P.$preparacion5151.$cantidad5151.$ic5151.$preparacion5252.$cantidad5252.$ic5252.$preparacion5353.$cantidad5353.$ic5353.$preparacion5454.$cantidad5454.$ic5454.$consumofin1.$cambiar1.$diaganosticoN1.$objetivoP1.$PLAN1;

//ANTROPOMETRIA

$ec1    = $_POST['PesoActual'];
        $ec2    = $_POST['PesoUsual'];
        $ec3    = $_POST['PesoMinimo'];
        $ec4    = $_POST['PesoMaximo'];
        $ec5    = $_POST['Talla'];
        $ec7    = $_POST['Observaciones'];
        $ec8    = $_POST['Cuello'];
        $ec9    = $_POST['Pecho'];
        $ec10   = $_POST['brazoR'];
        $ec11   = $_POST['BrazoC'];
        $ec12   = $_POST['Antebrazo'];
        $ec13   = $_POST['Muneca'];
        $ec14   = $_POST['Cintura'];
        $ec15   = $_POST['Abdomen'];
        $ec16   = $_POST['Cadera'];
        $ec16a  = $_POST['Muslo'];
        
        $ec17   = $_POST['Pantorrilla'];
        $ec18   = $_POST['Observaciones1'];
        $ec19   = $_POST['Biceps'];
        $ec20   = $_POST['riceps'];
        $ec21   = $_POST['Subescapular'];
        $ec22   = $_POST['Cresta '];
        $ec23   = $_POST['Supraespinal'];
        $ec24   = $_POST['Abdominal'];
        $ec25   = $_POST['Muslo1'];
        $ec26   = $_POST['Pierna'];
        $ec27   = $_POST['Observaciones2'];
        $ec28   = $_POST['Dinanometro'];
        $ec29   = $_POST['IMC'];
        $ec30   = $_POST['Estructura'];
        $ec31   = $_POST['Peso'];
        $ec32   = $_POST['Relacion'];
        $ec33   = $_POST['Pliegues'];
        $ec34   = $_POST['Graso'];
        $ec35   = $_POST['Magro'];
        $ec36   = $_POST['IAKS'];
       $TIPOA   = $_POST['TipoA'];
       $ComposicionCorporal= $_POST['ComposicionCorporal'];
       $interpretacion= $_POST['interpretacion'];
       $masap= $_POST['masap'];
       $masaA= $_POST['masaA'];
       $pesoM= $_POST['pesom'];
       


        //Datos iniciales de la 
      $titulo1= '<tr><th colspan="4" class="text-center"> Peso, Historia del Peso y Talla</th></tr>';

        if(strlen($ec1) <> ''){$exp1= '<tr><td>Peso Actual(kg):'.$ec1.'</td>';}
        if(strlen($ec2) <> ''){$exp2= '<td>Peso Usual (kg): '.$ec2.'</td>';}
        if(strlen($ec3) <> ''){$exp3= '<td>Peso Minimo: '.$ec3.'</td>';}
        if(strlen($ec4) <> ''){$exp4= '<td>Peso Maximo:'.$ec4.'</td>';}
        if(strlen($ec5) <> ''){$exp5= '<td>Talla(cm):'.$ec5.'</td></tr>';}
         if(strlen($ec7) <> ''){$exp7= '<tr><td>Observaciones: '.$ec7.'</td></tr>';}
         $titulo2= '<br><tr><th colspan="4" class="text-center"> Perímetros (Cm) </th></tr>';
        if(strlen($ec8) <> ''){$exp8= '<tr><td>Cuello:'.$ec8.'</td>';}
        if(strlen($ec9) <> ''){$exp9= '<td>Pecho/Tórax: '.$ec9.'</td>';}
        if(strlen($ec10) <> ''){$exp10= '<td>Brazo Relajado: '.$ec10.'</td>';}
        if(strlen($ec11) <> ''){$exp11= '<td>Brazo Contraído:'.$ec11.'</td></tr>';}
        if(strlen($ec12) <> ''){$exp12= '<tr><td> Antebrazo:'.$ec12.'</td>';}
       if(strlen($ec13) <> ''){$exp13= '<td>Muñeca: '.$ec13.'</td>';}
        if(strlen($ec14) <> ''){$exp14= '<td>Cintura:'.$ec14.'</td>';}
        if(strlen($ec15) <> ''){$exp15= '<td>Abdómen:'.$ec15.'</td></tr>';}
         if(strlen($ec16) <> ''){$exp16= '<tr><td>Cadera: '.$ec16.'</td>';}
         if(strlen($ec16a) <> ''){$exp16a= '<td>Muslo: '.$ec16a.'</td>';}

        if(strlen($ec17) <> ''){$exp17= '<td>Pantorrilla: '.$ec17.'</td></tr>';}
        if(strlen($ec18) <> ''){$exp18= '<tr><td>Observaciones:'.$ec18.'</td></tr>';}
         $titulo3= '<br><tr><th colspan="4" class="text-center"> Pliegues Cútaneos (mm) </th></tr>';

        if(strlen($ec19) <> ''){$exp19= '<tr><td>Biceps:'.$ec19.'</td>';}
         if(strlen($ec20) <> ''){$exp20= '<td>Triceps: '.$ec20.'</td>';}
         if(strlen($ec21) <> ''){$exp21= '<td> Subescapular'.$ec21.'</td>';}
        if(strlen($ec22) <> ''){$exp22= '<td>Cresta Iliaca:'.$ec22.'</td></tr>';}
        if(strlen($ec23) <> ''){$exp23= '<tr><td>Supraespinal:'.$ec23.'</td>';}
         if(strlen($ec24) <> ''){$exp24= '<td> Abdominal:'.$ec24.'</td>';}
        if(strlen($ec25) <> ''){$exp25= '<td> Muslo:'.$ec25.'</td>';}
        if(strlen($ec26) <> ''){$exp26= '<td>Pierna Media:'.$ec26.'</td></tr>';}
         if(strlen($ec27) <> ''){$exp27= '<tr><td>Observaciones:'.$ec27.'</td></tr>';}
         $titulo4= '<br><tr><th colspan="4" class="text-center"> Fuerza Muscular </th></tr>';

        if(strlen($ec28) <> ''){$exp28= '<tr><td>Dinanómetro: '.$ec28.'</td></tr>';}
         $titulo5= '<br><tr><th colspan="4" class="text-center"> Resultados</th></tr>';

        if(strlen($ec29) <> ''){$exp29= '<tr><td> IMC:'.$ec29.'</td>';}
        if(strlen($ec30) <> ''){$exp30= '<td>Estructura:'.$ec30.'</td>';}
        if(strlen($ec31) <> ''){$exp31= '<td>Peso Saludable: '.$ec31.'</td>>';}
        if(strlen($ec32) <> ''){$exp32= '<td>Relación Cintura/Cadera:'.$ec32.'</tr>';}
        if(strlen($ComposicionCorporal) <> ''){$exp37= '<td>Composición Corporal:'.$ComposicionCorporal.'</td></tr>';}

         $titulo5= '<br><tr><th colspan="4" class="text-center"> % Grasas(YUHASZ)</th></tr>';

        if(strlen($ec33) <> ''){$exp33= '<tr><td>Suma Pliegues: '.$ec33.'</td>';}
        if(strlen($ec34) <> ''){$exp34= '<td>Peso Graso: '.$ec34.'</td>';}
 if(strlen($ec35) <> ''){$exp35= '<td>Peso Magro: '.$ec35.'</td>';}
 if(strlen($ec36) <> ''){$exp36= '<td>IAKS: '.$ec36.'</td></tr>';}
 if(strlen($interpretacion) <> ''){$exp38= '<td>Interpretación de Grasa: '.$interpretacion.'</td></tr>';}


 $titulo6= '<br><tr><th colspan="4" class="text-center"> Analis de Composición Corporal </th></tr>';

        if(strlen($masap) <> ''){$exp39= '<tr><td>Masa Piel: '.$masap.'</td>';}
        if(strlen($masaA) <> ''){$exp40= '<td>Masa Adiposa: '.$masaA.'</td>';}
        if(strlen($pesoM) <> ''){$exp41= '<td>Peso Muscular: '.$pesoM.'</td></tr>';}

 

        $antropometria= '<table class="table table-bordered"><tr>'.$titulo1.$exp1.$exp2.$exp3.$exp4.$exp5.$exp6.$exp7. $titulo2.$exp8.$exp9.$exp10.$exp11.$exp12.$exp43.$exp44.$exp45.$exp46.$exp13.$exp14.$exp15.$exp16.$exp16a.$exp17.$exp18.$titulo3.$exp19.$exp20.$exp21.$exp22.$exp23.$exp24.$exp25.$exp26.$exp27.$titulo4.$exp28.$exp29.$exp30.$exp31.$exp32.$exp37.$titulo5.$exp33.$exp34.$exp35.$exp36.$exp38.$titulo6.$exp39.$exp40.$exp41.'</tr></table>';



   {
                echo 'cargamos el archivo';
                $nombre = $_FILES['archivo1']['name'].rand(10);
                $nombrer = strtolower($nombre);
                $cd=$_FILES['archivo1']['tmp_name'];
                $ruta = "logos/" . $_FILES['archivo1']['name'];
                $destino = "logos/".$nombrer;
                $resultado = @move_uploaded_file($_FILES["archivo1"]["tmp_name"], $ruta);
                if (!empty($resultado))
            {

                /*       @mysqli_query($conexion,"INSERT INTO fotos VALUES ('". $nombre."','" . $destino . "')"); 
                echo "el archivo ha sido movido exitosamente";
                */

                $queryCliente = "UPDATE historiaClinica1 SET  archivo = '$nombrer'  WHERE usuario_id = '$ID'";

                mysql_query($queryCliente,$con) or die(mysql_error());
            }
  

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

 

        // *********************************************************    TABLA  historiaClinica1 *********************************************************
        // *********************************************************    TABLA  historiaClinica1 *********************************************************


        mysqli_query($conn3,"INSERT INTO nutricionAdulto (cliente_id, usuario_id, Fecha, Hora, remite, motivoConsulta, diagnostico, tratamiento, notas, recipe, incapacidades, cie10, rSistema,  enfermedadActual, acompananteFamiliar, telefono_acompanante, paraClinicos, remision, diagnosticoMsalud, comoTomarlo, antecedentesPers,antecedentesFami,antenutricion, parametros, estiloVida, funcionalidadMuscular,anamnesis,consumoH,antropometria,tipo, archivo) VALUES  ('$clienteId', '$ID', '$fechar', '$hora', '$remite','$motivoConsulta', '$diagnostico', '$tratamiento', '$notas',  '$recipe', '$incapacidades', '$cie10', '$rSistema',  '$acompananteFamiliar', '$telefono_acompanante', '$paraClinicos', '$remision', '$diagnosticoMsalud', '$comoTomarlo','$enfermedadActual','$antecedentesPers','$antecedentesFami','$antenutricion','$parametros','$estiloVida','$funcionalidadMuscular','$anamnesis','$consumoH','$antropometria', '$TIPOA' ,'$nombrer');");


echo"INSERT INTO nutricionAdulto (cliente_id, usuario_id, Fecha, Hora, remite, motivoConsulta, diagnostico, tratamiento, notas, recipe, incapacidades, cie10, rSistema,  enfermedadActual, acompananteFamiliar, telefono_acompanante, paraClinicos, remision, diagnosticoMsalud, comoTomarlo, antecedentesPers,antecedentesFami,antenutricion, parametros, estiloVida, funcionalidadMuscular,anamnesis,consumoH,antropometria,tipo, archivo) VALUES  ('$clienteId', '$ID', '$fechar', '$hora', '$remite','$motivoConsulta', '$diagnostico', '$tratamiento', '$notas',  '$recipe', '$incapacidades', '$cie10', '$rSistema',  '$acompananteFamiliar', '$telefono_acompanante', '$paraClinicos', '$remision', '$diagnosticoMsalud', '$comoTomarlo','$enfermedadActual','$antecedentesPers','$antecedentesFami','$antenutricion','$parametros','$estiloVida','$funcionalidadMuscular','$anamnesis','$consumoH','$antropometria', '$TIPOA ','$nombrer');";

        // *********************************************************    TABLA  historiaClinica1 *********************************************************
        // *********************************************************    TABLA  historiaClinica1 *********************************************************

 
              $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica1 from nutricionAdulto where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinica1'];
              }   


echo '-- error aqui--- <br> ';
mysqli_query($conn3,"INSERT INTO seguimiento(cliente_id,usuario_id,fecha,peso,talla,cuello,pecho,brazoR, brazoC,antebrazo,muneca,cintura,abdomen,cadera,muslo, pantorrilla,biceps,tripces,subescapular,cresta,supraespinal,abdominal,muslo1,piernamedia, dinanometro, imc,estructura,pesosalud,relacion,sumapliegues, pesograso,pesomagro,iaks,masapiel,adiposa,masamuscular)

        VALUES ('$clienteId', '$ID', '$fechar','$ec1','$ec5','$ec8','$ec9','$ec10','$ec11','$ec12','$ec13','$ec14','$ec15','$ec16','$ec16a','$ec17','$ec19', '$ec20','$ec21','$ec22','$ec23','$ec24','$ec25','$ec26','$ec28','$ec29','$ec30','$ec31','$ec32','$ec33','$ec34','$ec35','$ec36','$masap','$masaA','$pesoM')");

echo '----- <br> ';
 echo "INSERT INTO seguimiento(cliente_id,usuario_id,fecha,peso,talla,cuello,pecho,brazoR, brazoC,antebrazo,muneca,cintura,abdomen,cadera,muslo, pantorrilla,biceps,tripces,subescapular,cresta,supraespinal,abdominal,muslo1,piernamedia, dinanometro, imc,estructura,pesosalud,relacion,sumapliegues, pesograso,pesomagro,iaks,masapiel,adiposa,masamuscular)

        VALUES ('$clienteId', '$ID', '$fechar','$ec1','$ec5','$ec8','$ec9','$ec10','$ec11','$ec12','$ec13','$ec14','$ec15','$ec16','$ec16a','$ec17','$ec19', '$ec20','$ec21','$ec22','$ec23','$ec24','$ec25','$ec26','$ec28','$ec29','$ec30','$ec31','$ec32','$ec33','$ec34','$ec35','$ec36','$masap','$masaA','$pesoM')";

 

mysqli_query($conn3,"INSERT INTO historiaFisica 
                (usuario_id, cliente_id,fecha, hora, peso, estatura, imc, Composicioncorporal, meses,                      historia_id, perimetrocefalico) VALUES 
                ('$ID', '$clienteId','$fechar', '$hora', '$ec1', '$ec5', '$ec29', '$ComposicionCorporal', '$edadMeses', '$historiaClinica1', '$perimetrocefalico');");

echo '<br>';
echo '------------------------------------------';
echo '<br>';
echo '<br> historiaFisica';
echo '<br>';
echo "INSERT INTO historiaFisica 
                (usuario_id, cliente_id,fecha, hora, peso, estatura, imc, Composicioncorporal, meses,                      historia_id, perimetrocefalico) VALUES 
                ('$ID', '$clienteId','$fechar', '$hora', '$ec1', '$ec5', '$ec29','$ComposicionCorporal', '$edadMeses', '$historiaClinica1', '$perimetrocefalico');";

echo '<br>';
echo '------------------------------------------';
echo '<br>';






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


echo "<script language='Javascript'> window.location='finalizadoNutricion.php?historiaClinica1=$historiaClinica1';</script>"; 

?>