<?php
    include 'header.php';
    include 'menu.php'; 
 
 
    date_default_timezone_set('America/Bogota');
    include("conexiones/conexion.php");
    $con=conectar();

    $clienteId         	   = $_POST['clienteId']; //Paciente
    $usuarioid         	   = $_POST['usuario_Id']; //Usuario

    $fechar                = date("Y-m-d");
    $Afechar               = date("Y-m-d H:i:s");
    $hora                  = date("H:i:s");
    $P                     = $_POST['P'];  

    
    //test 1
    $a1 = $_POST['a1'];
    $a2 = $_POST['a2'];
    $a3 = $_POST['a3'];
    $a4 = $_POST['a4'];
    $a5 = $_POST['a5'];
    $a6 = $_POST['a6'];
    $a7 = $_POST['a7'];
    $a8 = $_POST['a8'];
    $a9 = $_POST['a9'];

    //test2
    $b1 = $_POST['b1'];
    $b2 = $_POST['b2'];
    $b3 = $_POST['b3'];
    $b4 = $_POST['b4'];
    $b5 = $_POST['b5'];
    $b6 = $_POST['b6'];
    $b7 = $_POST['b7'];
    $b8 = $_POST['b8'];

    //test3
    $c1 = $_POST['c1'];
    $c2 = $_POST['c2'];
    $c3 = $_POST['c3'];
    $c4 = $_POST['c4'];
    $c5 = $_POST['c5'];
    $c6 = $_POST['c6'];
    $c7 = $_POST['c7'];
    $c8 = $_POST['c8'];
    $c9 = $_POST['c9'];

    //test 4
    $d1 = $_POST['d1'];
    $d2 = $_POST['d2'];
    $d3 = $_POST['d3'];
    $d4 = $_POST['d4'];
    $d5 = $_POST['d5'];
    $d6 = $_POST['d6'];
    $d7 = $_POST['d7'];
    $d8 = $_POST['d8'];
    $d9 = $_POST['d9'];
    
    //test 5
    $e1 = $_POST['e1'];
    $e2 = $_POST['e2'];
    $e3 = $_POST['e3'];
    $e4 = $_POST['e4'];
    $e5 = $_POST['e5'];
    $e6 = $_POST['e6'];
    $e7 = $_POST['e7'];
    $e8 = $_POST['e8'];
    $e9 = $_POST['e9'];


    
    $zz1 = $_POST['zz1'];
    $zz2 = $_POST['zz2'];
    $zz3 = $_POST['zz3'];
    $zz4 = $_POST['zz4'];

    $aaa1 = $_POST['aaa1'];
    $aaa2 = $_POST['aaa2'];
    $aaa3 = $_POST['aaa3'];
    $aaa4 = $_POST['aaa4'];

    $bbb1 = $_POST['bbb1'];
    $bbb2 = $_POST['bbb2'];
    $bbb3 = $_POST['bbb3'];
    $bbb4 = $_POST['bbb4'];

    $ccc1 = $_POST['ccc1'];
    $ccc2 = $_POST['ccc2'];
    $ccc3 = $_POST['ccc3'];
    $ccc4 = $_POST['ccc4'];

    $ddd1 = $_POST['ddd1'];
    $ddd2 = $_POST['ddd2'];
    $ddd3 = $_POST['ddd3'];
    $ddd4 = $_POST['ddd4'];

    if ($a1 <> '') {$val1 = 'Ríe: '.$a1.'<strong> | </strong>';}
    if ($a2 <> '') {$val2 = 'Chilla: '.$a2.'<strong> | </strong>';}
    if ($a3 <> '') {$val3 = 'Sigue mirada más allá de la línea media: '.$a3.'<strong> | </strong>';}
    if ($a4 <> '') {$val4 = 'Sigue objetos 180º con la mirada: '.$a4.'<strong> | </strong>';}
    if ($a5 <> '') {$val5 = 'Coge sonajero: '.$a5.'<strong> | </strong>';}
    if ($a6 <> '') {$val6 = 'Sostén cefálico: '.$a6.'<strong> | </strong>';}
    if ($a7 <> '') {$val7 = 'Eleva el tórax apoyándose con los brazos: '.$a7.'<strong> | </strong>';}
    if ($a8 <> '') {$val8 = 'Gira sobre sí mismo: '.$a8.'<strong> | </strong>';}
    if ($a9 <> '') {$val9 = 'Sonrisa social: '.$a9.'<strong> | </strong>';}

    $testDenver1 = $val1.$val2.$val3.$val4.$val5.$val6.$val7.$val8.$val9;

    if ($b1 <> '') {$vil1 = 'Ríe: '.$b1.'<strong> | </strong>';}
    if ($b2 <> '') {$vil2 = 'Chilla: '.$b2.'<strong> | </strong>';}
    if ($b3 <> '') {$vil3 = 'Sigue mirada más allá de la línea media: '.$b3.'<strong> | </strong>';}
    if ($b4 <> '') {$vil4 = 'Sigue objetos 180º con la mirada: '.$b4.'<strong> | </strong>';}
    if ($b5 <> '') {$vil5 = 'Sostén cefálico: '.$b5.'<strong> | </strong>';}
    if ($b6 <> '') {$vil6 = 'Eleva el tórax apoyándose con los brazos: '.$b6.'<strong> | </strong>';}
    if ($b7 <> '') {$vil7 = 'Gira sobre sí mismo: '.$b7.'<strong> | </strong>';}
    if ($b8 <> '') {$vil8 = 'Sonrisa social: '.$b8.'<strong> | </strong>';}

     $testDenver2 = $vil1.$vil2.$vil3.$vil4.$vil5.$vil6.$vil7.$vil8;
    
    if ($c1 <> '') {$vel1 = 'Ríe: '.$c1.'<strong> | </strong>';}
    if ($c2 <> '') {$vel2 = 'Chilla: '.$c2.'<strong> | </strong>';}
    if ($c3 <> '') {$vel3 = 'Sigue mirada más allá de la línea media: '.$c3.'<strong> | </strong>';}
    if ($c4 <> '') {$vel4 = 'Sigue objetos 180º con la mirada: '.$c4.'<strong> | </strong>';}
    if ($c5 <> '') {$vel5 = 'Coge sonajero: '.$c5.'<strong> | </strong>';}
    if ($c6 <> '') {$vel6 = 'Sostén cefálico: '.$c6.'<strong> | </strong>';}
    if ($c7 <> '') {$vel7 = 'Eleva el tórax apoyándose con los brazos: '.$c7.'<strong> | </strong>';}
    if ($c8 <> '') {$vel8 = 'Gira sobre sí mismo: '.$c8.'<strong> | </strong>';}
    if ($c9 <> '') {$vel9 = 'Sonrisa social: '.$c9.'<strong> | </strong>';}

    $testDenver3 = $vel1.$vel2.$vel3.$vel4.$vel5.$vel6.$vel7.$vel8.$vel9;

    
    if ($d1 <> '') {$vol1 = 'Ríe: '.$d1.'<strong> | </strong>';}
    if ($d2 <> '') {$vol2 = 'Chilla: '.$d2.'<strong> | </strong>';}
    if ($d3 <> '') {$vol3 = 'Sigue objetos 180º con la mirada: '.$d3.'<strong> | </strong>';}
    if ($d4 <> '') {$vol4 = 'Coge sonajero: '.$d4.'<strong> | </strong>';}
    if ($d5 <> '') {$vol5 = 'Intenta llegar a los objetos: '.$d5.'<strong> | </strong>';}
    if ($d6 <> '') {$vol6 = 'Sostén cefálico: '.$d6.'<strong> | </strong>';}
    if ($d7 <> '') {$vol7 = 'Eleva el tórax apoyándose con los brazos: '.$d7.'<strong> | </strong>';}
    if ($d8 <> '') {$vol8 = 'Gira sobre sí mismo: '.$d8.'<strong> | </strong>';}
    if ($d9 <> '') {$vol9 = 'Sonrisa social: '.$d9.'<strong> | </strong>';}

    $testDenver4 = $vol1.$vol2.$vol3.$vol4.$vol5.$vol6.$vol7.$vol8.$vol9;

    if ($e1 <> '') {$vul1 = 'Chilla: '.$e1.'<strong> | </strong>';}
    if ($e2 <> '') {$vul2 = 'Se vuelve a la voz: '.$e2.'<strong> | </strong>';}
    if ($e3 <> '') {$vul3 = 'Sigue objetos 180º con la mirada: '.$e3.'<strong> | </strong>';}
    if ($e4 <> '') {$vul4 = 'Coge sonajero: '.$e4.'<strong> | </strong>';}
    if ($e5 <> '') {$vul5 = 'Intenta llegar a los objetos: '.$e5.'<strong> | </strong>';}
    if ($e6 <> '') {$vul6 = 'Sostén cefálico: '.$e6.'<strong> | </strong>';}
    if ($e7 <> '') {$vul7 = 'Eleva el tórax apoyándose con los brazos: '.$e7.'<strong> | </strong>';}
    if ($e8 <> '') {$vul8 = 'Gira sobre sí mismo: '.$e8.'<strong> | </strong>';}
    if ($e9 <> '') {$vul9 = 'Sonrisa social: '.$e9.'<strong> | </strong>';}

    $testDenver5 = $vul1.$vul2.$vul3.$vul4.$vul5.$vul6.$vul7.$vul8.$vul9;

    //datos del formulario 71 al 75


    if ($zz1 <> '') {$zul1 = 'Define palabras: '.$zz1.'<strong> | </strong>';}
    if ($zz2 <> '') {$zul2 = 'Dibuja 6 partes de un hombre: '.$zz2.'<strong> | </strong>';}
    if ($zz3 <> '') {$zul3 = 'Mantiene 10 sg. equilibrio sobre un pie: '.$zz3.'<strong> | </strong>';}
    if ($zz4 <> '') {$zul4 = 'Camina hacia atrás talón-puntera: '.$zz4.'<strong> | </strong>';}

    $testDenver71 = $zul1.$zul2.$zul3.$zul4;

    

    if ($aaa1 <> '') {$al1 = 'Define palabras: '.$aaa1.'<strong> | </strong>';}
    if ($aaa2 <> '') {$al2 = 'Dibuja 6 partes de un hombre: '.$aaa2.'<strong> | </strong>';}
    if ($aaa3 <> '') {$al3 = 'Mantiene 10 sg. equilibrio sobre un pie: '.$aaa3.'<strong> | </strong>';}
    if ($aaa4 <> '') {$al4 = 'Camina hacia atrás talón-puntera: '.$aaa4.'<strong> | </strong>';}

    $testDenver72 = $al1.$al2.$al3.$al4;

    

    if ($bbb1 <> '') {$bl1 = 'Define palabras: '.$bbb1.'<strong> | </strong>';}
    if ($bbb2 <> '') {$bl2 = 'Dibuja 6 partes de un hombre: '.$bbb2.'<strong> | </strong>';}
    if ($bbb3 <> '') {$bl3 = 'Mantiene 10 sg. equilibrio sobre un pie: '.$bbb3.'<strong> | </strong>';}
    if ($bbb4 <> '') {$bl4 = 'Camina hacia atrás talón-puntera: '.$bbb4.'<strong> | </strong>';}

    $testDenver73 = $bl1.$bl2.$bl3.$bl4;

    

    if ($ccc1 <> '') {$cl1 = 'Define palabras: '.$ccc1.'<strong> | </strong>';}
    if ($ccc2 <> '') {$cl2 = 'Dibuja 6 partes de un hombre: '.$ccc2.'<strong> | </strong>';}
    if ($ccc3 <> '') {$cl3 = 'Mantiene 10 sg. equilibrio sobre un pie: '.$ccc3.'<strong> | </strong>';}
    if ($ccc4 <> '') {$cl4 = 'Camina hacia atrás talón-puntera: '.$ccc4.'<strong> | </strong>';}

    $testDenver74 = $cl1.$cl2.$cl3.$cl4;

    

    if ($ddd1 <> '') {$dl1 = 'Define palabras: '.$ddd1.'<strong> | </strong>';}
    if ($ddd2 <> '') {$dl2 = 'Dibuja 6 partes de un hombre: '.$ddd2.'<strong> | </strong>';}
    if ($ddd3 <> '') {$dl3 = 'Mantiene 10 sg. equilibrio sobre un pie: '.$ddd3.'<strong> | </strong>';}
    if ($ddd4 <> '') {$dl4 = 'Camina hacia atrás talón-puntera: '.$ddd4.'<strong> | </strong>';}

    $testDenver75 = $dl1.$dl2.$dl3.$dl4;


    $Edad_i = $_POST['EdadInfante'];
    if($Edad_i == 'Edad de 0 años a 1,5 meses'){
        //mysqli_query($conn3,
        //print_r
        msqli_query($conn3,"INSERT INTO historiaClinica_testDenver (usuario_id,cliente_id,fecha,hora,edad_infante,detalle_test) 
        VALUES ('1','2','$fechar','$hora','Edad de 0 años a 1,5 meses','$testDenver1')");
    }
    else if($Edad_i == 'Edad de 0 años a 2 meses') {
        mysqli_query($conn3,"INSERT INTO historiaClinica_testDenver (usuario_id,cliente_id,fecha,hora,edad_infante,detalle_test) 
        VALUES ('1','2','$fechar','$hora','Edad de 0 años a 2 meses','$testDenver2')");
    }
    else if($Edad_i == 'Edad de 0 años a 2,5 meses') {
        mysqli_query($conn3,"INSERT INTO historiaClinica_testDenver (usuario_id,cliente_id,fecha,hora,edad_infante,detalle_test) 
        VALUES ('1','2','$fechar','$hora','Edad de 0 años a 2,5 meses','$testDenver3')");
    }
    else if($Edad_i == 'Edad de 0 años a 3 meses') {
        mysqli_query($conn3,"INSERT INTO historiaClinica_testDenver (usuario_id,cliente_id,fecha,hora,edad_infante,detalle_test) 
        VALUES ('1','2','$fechar','$hora','Edad de 0 años a 3 meses','$testDenver4')");
    }
    else if($Edad_i == 'Edad de 0 años a 3,5 meses') {
        mysqli_query($conn3,"INSERT INTO historiaClinica_testDenver (usuario_id,cliente_id,fecha,hora,edad_infante,detalle_test) 
        VALUES ('1','2','$fechar','$hora','Edad de 0 años a 3,5 meses','$testDenver5')");
    }



    //test del 71 al 75 - solo es para presentacion estos diez, falta terminar
    else if ($Edad_i = 'Edad de 5 años a 7 meses') {
        mysqli_query($conn3,"INSERT INTO historiaClinica_testDenver (usuario_id,cliente_id,fecha,hora,edad_infante,detalle_test) VALUES ('1','2','$fechar','$hora','Edad de 5 años a 7 meses','$testDenver71')");
    }
    else if ($Edad_i = 'Edad de 5 años a 8 meses') {
        mysqli_query($conn3,"INSERT INTO historiaClinica_testDenver (usuario_id,cliente_id,fecha,hora,edad_infante,detalle_test) VALUES ('1','2','$fechar','$hora','Edad de 5 años a 8 meses','$testDenver72')");
    }
    else if ($Edad_i = 'Edad de 5 años a 9 meses') {
        mysqli_query($conn3,"INSERT INTO historiaClinica_testDenver (usuario_id,cliente_id,fecha,hora,edad_infante,detalle_test) VALUES ('1','2','$fechar','$hora','Edad de 5 años a 9 meses','$testDenver73')");
    }
    else if ($Edad_i = 'Edad de 5 años a 10 meses') {
        mysqli_query($conn3,"INSERT INTO historiaClinica_testDenver (usuario_id,cliente_id,fecha,hora,edad_infante,detalle_test) VALUES ('1','2','$fechar','$hora','Edad de 5 años a 10 meses','$testDenver74')");
    }
    else if ($Edad_i = 'Edad de 5 años a 11 meses') {
        mysqli_query($conn3,"INSERT INTO historiaClinica_testDenver (usuario_id,cliente_id,fecha,hora,edad_infante,detalle_test) VALUES ('1','2','$fechar','$hora','Edad de 5 años a 11 meses','$testDenver75')");
    }

    //mysqli_query($conn3,
    

    $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as testDenver from historiaClinica_testDenver");
    $nrowl=mysqli_num_rows($queryListhc);
    while($rowhc=mysqli_fetch_array($queryListhc))
    {
        $historiaClinica=$rowhc['testDenver'];
    } 

    echo "<script language='Javascript'> window.location='finalizado_testDenver.php?test=$historiaClinica';</script>";
?>