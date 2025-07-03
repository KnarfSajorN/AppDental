<?php
   //include 'header.php';
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
 //  include 'menu.php'; 

    date_default_timezone_set('America/Bogota');

        $fecha_consulta                = $_POST['fecha_consulta'];
        $ultima_mestruaccion                   = $_POST['ultima_mestruaccion'];
        $probable                  = $_POST['probable'];
        $dudas                    = $_POST['dudas'];
        $vacunas                    = $_POST['vacunas'];
        $internacion                    = $_POST['internacion'];
        $mes_embarazo                    = $_POST['mes_embarazo'];
        $dias                    = $_POST['dias'];
        $gesta                    = $_POST['gesta'];
        $abortos                    = $_POST['abortos'];
        $parto                    = $_POST['parto'];
        $ninguno                    = $_POST['ninguno'];
        $vaginales                    = $_POST['vaginales'];
        $cesarea                    = $_POST['cesarea'];
        $hijosvivos                    = $_POST['hijosvivos'];
        $hijosmuertos                    = $_POST['hijosmuertos'];
        $viven                    = $_POST['viven'];
        $mueren                    = $_POST['mueren'];
        $mueren_semana                    = $_POST['mueren_semana'];
        $recien_nacido                    = $_POST['recien_nacido'];
        $fecha_terminacion                    = $_POST['fecha_terminacion'];
        $pa                    = $_POST['pa'];
        $peso                    = $_POST['peso'];
        $edema                    = $_POST['edema'];
        $varices                    = $_POST['varices'];
        $presentacion                    = $_POST['presentacion'];
        $tonos                    = $_POST['tonos'];
        $au                    = $_POST['au'];
        $cefalea                    = $_POST['cefalea'];
        $semanas                    = $_POST['semanas'];
        $medico                    = $_POST['medico'];
        $hemoglobina                    = $_POST['hemoglobina'];
        $tipaje                    = $_POST['tipaje'];
        $rh                    = $_POST['rh'];
        $orina                    = $_POST['orina'];
        $vdrl                    = $_POST['vdrl'];
        $glicemia                    = $_POST['glicemia'];
        $alfafeto                    = $_POST['alfafeto'];
        $citomega                    = $_POST['citomega'];
        $usg                    = $_POST['usg'];
        $combs                    = $_POST['combs'];
        $miscelanos                    = $_POST['miscelanos'];
        $pap                    = $_POST['pap'];
        $toxoplasma                    = $_POST['toxoplasma'];
        $rubela                    = $_POST['rubela'];
        $observaciones        = reem($_POST['observaciones']);

        $ant1                 = $_POST['ant1'];
        $ant2                 = $_POST['ant2'];
        $ant3                 = $_POST['ant3'];
        $ant4                 = $_POST['ant4'];


        if ($ant1 <>'') {$antper1 = ' '.$ant1.',';}
        if ($ant2 <>'') {$antper2 = ' '.$ant2.',';}
        if ($ant3 <>'') {$antper3 = ' '.$ant3.',';}
        if ($ant4 <>'') {$antper4 = ' '.$ant4.',';}
        if ($ant5 <>'') {$antper5 = ' '.$ant5.'.';}

        $antecedentesPers =$antper1.$antper2.$antper3.$antper4.$antper5;


        $antg1                 = $_POST['antg1'];
        $antg2                 = $_POST['antg2'];
        $antg3                 = $_POST['antg3'];
        $antg4                 = $_POST['antg4'];
        $antg5                 = $_POST['antg5'];
        $antg6                 = $_POST['antg6'];
        $antg7                 = $_POST['antg7'];
        $antg8                 = $_POST['antg8'];
        $antg9                 = $_POST['antg9'];
        $antg10                = $_POST['antg10'];
        $antg11                 = $_POST['antg11'];
        $antg12                 = $_POST['antg12'];
        $antg13                 = $_POST['antg13'];
        $antg14                 = $_POST['antg14'];
        $antg15                 = $_POST['antg15'];
        $antg16                 = $_POST['antg16'];
        $antg17                 = $_POST['antg17'];
        $antg18                 = $_POST['antg18'];
        $antg19                 = $_POST['antg19'];
        $antg20                 = $_POST['antg20'];
        $antg21                 = $_POST['antg21'];
        $antg22                 = $_POST['antg22'];
        $antg23                 = $_POST['antg23'];
        $antg24                 = $_POST['antg24'];
        $antg25                 = $_POST['antg25'];


        if ($antg1 <>'') {$antpg1 = ' '.$antg1.',';}
        if ($antg2 <>'') {$antpg2 = ' '.$antg2.',';}
        if ($antg3 <>'') {$antpg3 = ' '.$antg3.',';}
        if ($antg4 <>'') {$antpg4 = ' '.$antg4.',';}
        if ($antg5 <>'') {$antpg5 = ' '.$antg5.',';}
        if ($antg6 <>'') {$antpg6 = ' '.$antg6.',';}
        if ($antg7 <>'') {$antpg7 = ' '.$antg7.',';}
        if ($antg8 <>'') {$antpg8 = ' '.$antg8.',';}
        if ($antg9 <>'') {$antpg9 = ' '.$antg9.',';}
        if ($antg10 <>'') {$antpg10 = ' '.$antg10.',';}
        if ($antg11 <>'') {$antpg11 = ' '.$antg11.',';}
        if ($antg12 <>'') {$antpg12 = ' '.$antg12.',';}
        if ($antg13 <>'') {$antpg13 = ' '.$antg13.',';}
        if ($antg14 <>'') {$antpg14 = ' '.$antg14.',';}
        if ($antg15 <>'') {$antpg15 = ' '.$antg15.',';}
        if ($antg16 <>'') {$antpg16 = ' '.$antg16.',';}
        if ($antg17 <>'') {$antpg17 = ' '.$antg17.',';}
        if ($antg18 <>'') {$antpg18 = ' '.$antg18.',';}
        if ($antg19 <>'') {$antpg19 = ' '.$antg19.',';}
        if ($antg20 <>'') {$antpg20 = ' '.$antg20.',';}
        if ($antg21 <>'') {$antpg21 = ' '.$antg21.',';}
        if ($antg22 <>'') {$antpg22 = ' '.$antg22.',';}
        if ($antg23 <>'') {$antpg23 = ' '.$antg23.',';}
        if ($antg24 <>'') {$antpg24 = ' '.$antg24.',';}
        if ($antg25 <>'') {$antpg25 = ' '.$antg25.'.';}

        $antecedentesPersG =$antpg1.$antpg2.$antpg3.$antpg4.$antpg5.$antpg6.$antpg7.$antpg8.$antpg9.$antpg10.$antpg11.$antpg12.$antpg13.$antpg14.$antpg15.$antpg16.$antpg17.$antpg18.$antpg19.$antpg20.$antpg21.$antpg22.$antpg23.$antpg24.$antpg25;




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


$query = "INSERT INTO Historia_Control_Prenatal (cliente_id, usuario_id, Fecha, Hora, sdg, peso, ta, fu, labx, dx, tratamiento, ultima_mestruaccion, probable, dudas, vacunas, internacion, mes_embarazo, dias, gesta, abortos, parto, ninguno, vaginales, cesarea, hijosvivos, hijosmuertos, viven, mueren, mueren_semana, recien_nacido, fecha_terminacion, pa, edema, varices, presentacion, tonos, au, cefalea, semanas, medico, hemoglobina, tipaje, rh, orina, vdrl, glicemia, alfafeto, citomega, usg, combs, miscelanos, pap, toxoplasma, rubela, observaciones, antecedentesPers, antecedentesPersG) VALUES  ($clienteId, $ID, $fecha_consulta, $hora,  sdg, $peso, $ta, $fu, $labx, $dx, $tratamiento, $ultima_mestruaccion, $probable, $dudas, $vacunas, $internacion, $mes_embarazo, $dias, $gesta, $abortos, $parto, $ninguno, $vaginales, $cesarea, $hijosvivos, $hijosmuertos, $viven, $mueren, $mueren_semana, $recien_nacido, fecha_terminacion, $pa, $edema, $varices, $presentacion, $tonos, $au, $cefalea, $semanas, $medico, $hemoglobina, $tipaje, $rh, $orina, $vdrl, $glicemia, $alfafeto, $citomega, $usg, $combs, $miscelanos, $pap, $toxoplasma, $rubela, $observaciones, $antecedentesPers, $antecedentesPersG);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);


        mysqli_query($conn3,"INSERT INTO Historia_Control_Prenatal (cliente_id, usuario_id, Fecha, Hora, sdg, peso, ta, fu, labx, dx, tratamiento, ultima_mestruaccion, probable, dudas, vacunas, internacion, mes_embarazo, dias, gesta, abortos, parto, ninguno, vaginales, cesarea, hijosvivos, hijosmuertos, viven, mueren, mueren_semana, recien_nacido, fecha_terminacion, pa, edema, varices, presentacion, tonos, au, cefalea, semanas, medico, hemoglobina, tipaje, rh, orina, vdrl, glicemia, alfafeto, citomega, usg, combs, miscelanos, pap, toxoplasma, rubela, observaciones, antecedentesPers, antecedentesPersG) VALUES  ('$clienteId', '$ID', '$fecha_consulta', '$hora',  'sdg', '$peso', '$ta', '$fu', '$labx', '$dx', '$tratamiento', '$ultima_mestruaccion', '$probable', '$dudas', '$vacunas', '$internacion', '$mes_embarazo', '$dias', '$gesta', '$abortos', '$parto', '$ninguno', '$vaginales', '$cesarea', '$hijosvivos', '$hijosmuertos', '$viven', '$mueren', '$mueren_semana', '$recien_nacido', '$fecha_terminacion', '$pa', '$edema', '$varices', '$presentacion', '$tonos', '$au', '$cefalea', '$semanas', '$medico', '$hemoglobina', '$tipaje', '$rh', '$orina', '$vdrl', '$glicemia', '$alfafeto', '$citomega', '$usg', '$combs', '$miscelanos', '$pap', '$toxoplasma', '$rubela', '$observaciones', '$antecedentesPers', '$antecedentesPersG');");


        /*
              $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica1 from controlprenatal where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinica1'];
              }   
        */

        $historiaClinica1 = mysqli_insert_id($conn3);

echo "<script language='Javascript'> window.location='GO_FinalizadoControlPrenatal.php?historiaClinica1=$historiaClinica1';</script>"; 

?>