<?php
  include 'funciones/funciones.php';
  include 'funciones/funcionesUtilidades.php';

//********************************************************************//
//Insercion en la tabla de la base de Datos historiaClinica13PostOperatorio
//********************************************************************//
  //print_r($_POST);

      //tejido Blandos
        $lengua=$_POST['lengua'];
        $carillos=$_POST['carillos'];
        $mucosa=$_POST['mucosa'];
        $piso_boca=$_POST['piso_boca'];
        $paladar_dura=$_POST['paladar_dura'];
        $paladar_blando=$_POST['paladar_blando'];
        $frenillo=$_POST['frenillo'];
        $amigdalina=$_POST['amigdalina'];
        $faringe=$_POST['faringe'];
        $encia=$_POST['encia'];
        $periodontal=$_POST['periodontal'];
        $interdentales=$_POST['interdentales'];
        $insercion_frenillos=$_POST['insercion_frenillos'];
        $glandulas_salivales=$_POST['glandulas_salivales'];


        if($lengua <> ''){$valor1= 'Lengua : '.$lengua.'<strong> | </strong>';}
        if($carillos <> '') {$valor2='Carillos : ' .$carillos. '<strong> | </strong>';}
        if($mucosa <> '') {$valor3='Mucosa Labial : ' .$mucosa. '<strong> | </strong>';}
        if($piso_boca <> '') {$valor4='Piso de Boca : ' .$piso_boca. '<strong> | </strong>';}
        if($paladar_dura <> '') {$valor5='Paladar Duro : ' .$paladar_dura. '<strong> | </strong>';}
        if($paladar_blando <> '') {$valor6='Paladar Blando : ' .$paladar_blando. '<strong> | </strong>';}
        if($frenillo <> '') {$valor7='Frenillo : ' .$frenillo. '<strong> | </strong>';}
        if($amigdalina <> '') {$valor8='Área Amigdalina : ' .$amigdalina. '<strong> | </strong>';}
        if($faringe <> '') {$valor9='Oro-Faringe : ' .$faringe. '<strong> | </strong>';}
        if($encia <> '') {$valor10='Encía : ' .$encia. '<strong> | </strong>';}
        if($periodontal <> '') {$valor11='Biotipo Periodontal : ' .$periodontal. '<strong> | </strong>';}
        if($interdentales <> '') {$valor12='Papilas Interdentales : ' .$interdentales. '<strong> | </strong>';}
        if($insercion_frenillos <> '') {$valor13='Inserción de Frenillos : ' .$insercion_frenillos. '<strong> | </strong>';}
        if($glandulas_salivales <> '') {$valor14='Permeabilidad de Glándulas salivales : ' .$glandulas_salivales. '<strong> | </strong>';}
        $tejido_blandos=$valor1.$valor2.$valor3.$valor4.$valor5.$valor6.$valor7.$valor8.$valor9.$valor10.$valor11.$valor12.$valor13.$valor14;
      


      //Examen Dental
        $denticion=$_POST['denticion'];
        $dientes_erupcion=$_POST['dientes_erupcion'];
        $dientes_ausentes=$_POST['dientes_ausentes'];
        $fracturas_dentales=$_POST['fracturas_dentales'];
        $intregridad_dental=$_POST['intregridad_dental'];
        $anomalias_esmalte=$_POST['anomalias_esmalte'];
        $movilidad_dental=$_POST['movilidad_dental'];
        $dentarias_numero=$_POST['dentarias_numero'];
        $dentarias_forma=$_POST['dentarias_forma'];
        $dentarias_posicion=$_POST['dentarias_posicion'];
        $dentaria_tamanno=$_POST['dentaria_tamanno'];
        $obs_dental=$_POST['obs_dental'];


        if ($denticion <> '') {$dental1='Tipo de Dentición : ' .$denticion. '<strong> | </strong>';}
        if ($dientes_erupcion <> '') {$dental2='Dientes en Erupción : ' .$dientes_erupcion. '<strong> | </strong>';}
        if ($dientes_ausentes <> '') {$dental3='Dientes ausentes : ' .$dientes_ausentes. '<strong> | </strong>';}
        if ($fracturas_dentales <> '') {$dental4='Presencia de fracturas dentales : ' .$fracturas_dentales. '<strong> | </strong>';}
        if ($intregridad_dental <> '') {$dental5='Pérdida de la integridad dental : ' .$intregridad_dental. '<strong> | </strong>';}
        if ($anomalias_esmalte <> '') {$dental6='Otras anomalías de esmalte : ' .$anomalias_esmalte. '<strong> | </strong>';}
        if ($movilidad_dental <> '') {$dental7='Movilidad dental : ' .$movilidad_dental. '<strong> | </strong>';}
        if ($dentarias_numero <> '') {$dental8='Anomalías dentarias de número : ' .$dentarias_numero. '<strong> | </strong>';}
        if ($dentarias_forma <> '') {$dental9='Anomalías dentarias de forma : ' .$dentarias_forma. '<strong> | </strong>';}
        if ($dentarias_posicion <> '') {$dental10='Anomalías dentarias de posición : ' .$dentarias_posicion. '<strong> | </strong>';}
        if ($dentaria_tamanno <> '') {$dental11='Anomalías dentarias de tamaño : ' .$dentaria_tamanno. '<strong> | </strong>';}
        if ($obs_dental <> '') {$dental12='Observaciones : ' .$obs_dental. '<strong> | </strong>';}

        $examen_dental=$dental1.$dental2.$dental3.$dental4.$dental5.$dental6.$dental7.$dental8.$dental9.$dental10.$dental11.$dental12;

       //Examen Inter-Arco

        $Overjet=$_POST['Overjet'];
        $relacion_molar_der=$_POST['relacion_molar_der'];
        $relacion_molar_mili=$_POST['relacion_molar_mili'];
        $relacion_molar_izq=$_POST['relacion_molar_izq'];
        $relacion_molar_mili2=$_POST['relacion_molar_mili2'];
        $relacion_molar_per_der=$_POST['relacion_molar_per_der'];
        $relacion_molar_per_mili=$_POST['relacion_molar_per_mili'];
        $relacion_molar_per_izq=$_POST['relacion_molar_per_izq'];
        $relacion_molar_per_mili2=$_POST['relacion_molar_per_mili2'];
        $relacion_canina_der=$_POST['relacion_canina_der'];
        $relacion_canina_mili=$_POST['relacion_canina_mili'];
        $relacion_canina_izq=$_POST['relacion_canina_izq'];
        $relacion_canina_mili2=$_POST['relacion_canina_mili2'];
        $relaciones_verticales=$_POST['relaciones_verticales'];
        $mordida_abierta_anterior=$_POST['mordida_abierta_anterior'];
        $mordida_abierta_posterior=$_POST['mordida_abierta_posterior'];
        $unilateral=$_POST['unilateral'];
        $bilateral=$_POST['bilateral'];
        $derecha_mm=$_POST['derecha_mm'];
        $izquierda_mm=$_POST['izquierda_mm'];
        $relaciones_transversales=$_POST['relaciones_transversales'];
        $linea_media_inferior=$_POST['linea_media_inferior'];
        $precsencia_mordida_cruda=$_POST['precsencia_mordida_cruda'];
        $unilateral_mordida_cruzada=$_POST['unilateral_mordida_cruzada'];
        $bilateral_mordida_cruzada=$_POST['bilateral_mordida_cruzada'];
        $mordida_tijera=$_POST['mordida_tijera'];
        $unilateral_mordida_tijera=$_POST['unilateral_mordida_tijera'];
        $bilateral_mordida_tijera=$_POST['bilateral_mordida_tijera'];

        if ($Overjet <> '') {$inter_arco1= 'Overjet : ' . $Overjet . '<strong> | </strong>';}
        if ($relacion_molar_der <> '') {$inter_arco2= 'Relación molar temporal Derecha : ' . $relacion_molar_der . '<strong> | </strong>';}
        if ($relacion_molar_mili <> '') {$inter_arco3= 'Relación molar temporal Milímetros : ' . $relacion_molar_mili . '<strong> | </strong>';}
        if ($relacion_molar_izq <> '') {$inter_arco4= 'Relación molar temporal Izquierda : ' . $relacion_molar_izq . '<strong> | </strong>';}
        if ($relacion_molar_mili2 <> '') {$inter_arco5= 'Relación molar temporal Milímetros ' . $relacion_molar_mili2 . '<strong> | </strong>';}
        if ($relacion_molar_per_der <> '') {$inter_arco6= 'Relación molar permanente Derecha : ' . $relacion_molar_per_der . '<strong> | </strong>';}
        if ($relacion_molar_per_mili <> '') {$inter_arco7= 'Relación molar permanente Milímetros : ' . $relacion_molar_per_mili . '<strong> | </strong>';}
        if ($relacion_molar_per_izq <> '') {$inter_arco8= 'Relación molar permanente Izquierda : ' . $relacion_molar_per_izq . '<strong> | </strong>';}
        if ($relacion_molar_per_mili2 <> '') {$inter_arco9= 'Relación molar permanente Milímetros : ' . $relacion_molar_per_mili2 . '<strong> | </strong>';}
        if ($relacion_canina_der <> '') {$inter_arco10= 'Relación canina Derecha :  ' . $relacion_canina_der . '<strong> | </strong>';}
        if ($relacion_canina_mili <> '') {$inter_arco11= 'Relación canina Milímetros :  ' . $relacion_canina_mili . '<strong> | </strong>';}
        if ($relacion_canina_izq <> '') {$inter_arco12= 'Relación canina Izquierda :  ' . $relacion_canina_izq . '<strong> | </strong>';}
        if ($relacion_canina_mili2 <> '') {$inter_arco13= 'Relación canina Milímetros :  ' . $relacion_canina_mili2 . '<strong> | </strong>';}
        if ($relaciones_verticales <> '') {$inter_arco14= 'Verbite : ' . $relaciones_verticales . '<strong> | </strong>';}
        if ($mordida_abierta_anterior <> '') {$inter_arco15= 'Mordida Abierta Anterior : ' . $mordida_abierta_anterior . '<strong> | </strong>';}
        if ($mordida_abierta_posterior <> '') {$inter_arco16= 'Mordida Abierta Posterior : ' . $mordida_abierta_posterior . '<strong> | </strong>';}
        if ($unilateral <> '') {$inter_arco17= 'Unilateral : ' . $unilateral . '<strong> | </strong>';}
        if ($bilateral <> '') {$inter_arco18= 'Bilateral : ' . $bilateral . '<strong> | </strong>';}
        if ($derecha_mm <> '') {$inter_arco19= 'Derecha (mm) : ' . $derecha_mm . '<strong> | </strong>';}
        if ($izquierda_mm <> '') {$inter_arco20= 'Izquierda (mm) : ' . $izquierda_mm . '<strong> | </strong>';}
        if ($relaciones_transversales <> '') {$inter_arco21= 'Línea media superior (respecto a la línea media facial) : ' . $relaciones_transversales . '<strong> | </strong>';}
        if ($linea_media_inferior <> '') {$inter_arco22= 'Línea media inferior (respecto a la línea media facial) : ' . $linea_media_inferior . '<strong> | </strong>';}
        if ($precsencia_mordida_cruda <> '') {$inter_arco23= 'Presencia de mordida cruzada posterior : ' . $precsencia_mordida_cruda . '<strong> | </strong>';}
        if ($unilateral_mordida_cruzada <> '') {$inter_arco24= 'Unilateral : ' . $unilateral_mordida_cruzada . '<strong> | </strong>';}
        if ($bilateral_mordida_cruzada <> '') {$inter_arco25= 'Bilateral : ' . $bilateral_mordida_cruzada . '<strong> | </strong>';}
        if ($mordida_tijera <> '') {$inter_arco26= 'Presencia de mordida en tijera : ' . $mordida_tijera . '<strong> | </strong>';}
        if ($unilateral_mordida_tijera <> '') {$inter_arco27= 'Unilateral : ' . $unilateral_mordida_tijera . '<strong> | </strong>';}
        if ($bilateral_mordida_tijera <> '') {$inter_arco28= 'Bilateral : ' . $bilateral_mordida_tijera . '<strong> | </strong>';}
        $examen_Inter_Arco=$inter_arco1.$inter_arco2.$inter_arco3.$inter_arco4.$inter_arco5.$inter_arco6.$inter_arco7.$inter_arco8.$inter_arco9.$inter_arco10.$inter_arco11.$inter_arco12.$inter_arco13.$inter_arco14.$inter_arco15.$inter_arco16.$inter_arco17.$inter_arco18.$inter_arco19.$inter_arco20.$inter_arco21.$inter_arco22.$inter_arco23.$inter_arco24.$inter_arco25.$inter_arco26.$inter_arco27.$inter_arco28;



      //Examen Intra-Arco





        $f_arco_s_ovalado=$_POST['f_arco_s_ovalado'];
        $f_arco_s_trianglar=$_POST['f_arco_s_trianglar'];
        $f_arco_s_cuadrado=$_POST['f_arco_s_cuadrado'];
        $f_arco_i_ovalado=$_POST['f_arco_i_ovalado'];
        $f_arco_i_trianglar=$_POST['f_arco_i_trianglar'];
        $f_arco_i_cuadrado=$_POST['f_arco_i_cuadrado'];
        $anomalias_espacio_apinamiento_cuad_i=$_POST['anomalias_espacio_apinamiento_cuad_i'];
        $anomalias_espacio_apinamiento_cuad_ii=$_POST['anomalias_espacio_apinamiento_cuad_ii'];
        $anomalias_espacio_apinamiento_cuad_iii=$_POST['anomalias_espacio_apinamiento_cuad_iii'];
        $anomalias_espacio_apinamiento_cuad_iv=$_POST['anomalias_espacio_apinamiento_cuad_iv'];
        $anomalias_espacio_espaciamiento_cuad_i=$_POST['anomalias_espacio_espaciamiento_cuad_i'];
        $anomalias_espacio_espaciamiento_cuad_ii=$_POST['anomalias_espacio_espaciamiento_cuad_ii'];
        $anomalias_espacio_espaciamiento_cuad_iii=$_POST['anomalias_espacio_espaciamiento_cuad_iii'];
        $anomalias_espacio_espaciamiento_cuad_iv=$_POST['anomalias_espacio_espaciamiento_cuad_iv'];
        $analisis_simetria_sagi_supe_hallazgo=$_POST['analisis_simetria_sagi_supe_hallazgo'];
        $analisis_simetria_transver_hallazgo=$_POST['analisis_simetria_transver_hallazgo'];
        $analisis_simetria_sagi_infer_hallazgo=$_POST['analisis_simetria_sagi_infer_hallazgo'];
        $analisis_simetria_transver_infer_hallazgo=$_POST['analisis_simetria_transver_infer_hallazgo'];
        $analisis_simetria_sagi_supe_=$_POST['analisis_simetria_sagi_supe_'];
        $analisis_simetria_transver_supe_=$_POST['analisis_simetria_transver_supe_'];
        $analisis_simetria_sagi_infer_=$_POST['analisis_simetria_sagi_infer_'];
        $analisis_simetria_transver_infer_=$_POST['analisis_simetria_transver_infer_'];

        if ($f_arco_s_ovalado <> '' ) {$intra_ar1='Arco Superior Ovalado : ' . $f_arco_s_ovalado. '<strong> | </strong>';}
        if ($f_arco_s_trianglar <> '' ) {$intra_ar2='Arco Supeiror Triangular : ' . $f_arco_s_trianglar. '<strong> | </strong>';}
        if ($f_arco_s_cuadrado <> '' ) {$intra_ar3='Arco Supeiror Cuadrado : ' . $f_arco_s_cuadrado. '<strong> | </strong>';}
        if ($f_arco_i_ovalado <> '' ) {$intra_ar4='Arco Inferior Ovalado : ' . $f_arco_i_ovalado. '<strong> | </strong>';}
        if ($f_arco_i_trianglar <> '' ) {$intra_ar5='Arco Inferior Triangular : ' . $f_arco_i_trianglar. '<strong> | </strong>';}
        if ($f_arco_i_cuadrado <> '' ) {$intra_ar6='Arco Inferior Cuadrado : ' . $f_arco_i_cuadrado. '<strong> | </strong>';}
        if ($anomalias_espacio_apinamiento_cuad_i <> '' ) {$intra_ar7='Anomalías  Apiñamiento Cuadrante I : ' . $anomalias_espacio_apinamiento_cuad_i. '<strong> | </strong>';}
        if ($anomalias_espacio_apinamiento_cuad_ii <> '' ) {$intra_ar8='Anomalías  Apiñamiento Cuadrante II : ' . $anomalias_espacio_apinamiento_cuad_ii. '<strong> | </strong>';}
        if ($anomalias_espacio_apinamiento_cuad_iii <> '' ) {$intra_ar9='Anomalías  Apiñamiento Cuadrante III : ' . $anomalias_espacio_apinamiento_cuad_iii. '<strong> | </strong>';}
        if ($anomalias_espacio_apinamiento_cuad_iv <> '' ) {$intra_ar10='Anomalías  Apiñamiento Cuadrante IV : ' . $anomalias_espacio_apinamiento_cuad_iv. '<strong> | </strong>';}
        if ($anomalias_espacio_espaciamiento_cuad_i <> '' ) {$intra_ar11='Anomalías Espaciamiento Cuadrante I : ' . $anomalias_espacio_espaciamiento_cuad_i. '<strong> | </strong>';}
        if ($anomalias_espacio_espaciamiento_cuad_ii <> '' ) {$intra_ar12='Anomalías Espaciamiento Cuadrante II : ' . $anomalias_espacio_espaciamiento_cuad_ii. '<strong> | </strong>';}
        if ($anomalias_espacio_espaciamiento_cuad_iii <> '' ) {$intra_ar13='Anomalías Espaciamiento Cuadrante III : ' . $anomalias_espacio_espaciamiento_cuad_iii. '<strong> | </strong>';}
        if ($anomalias_espacio_espaciamiento_cuad_iv <> '' ) {$intra_ar14=' Anomalías Espaciamiento Cuadrante IV : ' . $anomalias_espacio_espaciamiento_cuad_iv. '<strong> | </strong>';}
        if ($analisis_simetria_sagi_supe_hallazgo <> '' ) {$intra_ar15='Sagital Superior  : ' . $analisis_simetria_sagi_supe_. '<strong> | </strong>';}
        if ($analisis_simetria_transver_hallazgo <> '' ) {$intra_ar16='Sagital Superior Hallazgo : ' . $analisis_simetria_sagi_supe_hallazgo. '<strong> | </strong>';}
        if ($analisis_simetria_sagi_infer_hallazgo <> '' ) {$intra_ar17='Transversal Superior  : ' . $analisis_simetria_transver_supe_. '<strong> | </strong>';}
        if ($analisis_simetria_transver_infer_hallazgo <> '' ) {$intra_ar18='Transversal Superior Hallazgo : ' . $analisis_simetria_transver_hallazgo. '<strong> | </strong>';}
        if ($analisis_simetria_sagi_supe_ <> '' ) {$intra_ar19='Sagital Inferior  : ' . $analisis_simetria_sagi_infer_. '<strong> | </strong>';}
        if ($analisis_simetria_transver_supe_ <> '' ) {$intra_ar20='Sagital Inferior Hallazgo' . $analisis_simetria_sagi_infer_hallazgo. '<strong> | </strong>';}
        if ($analisis_simetria_sagi_infer_ <> '' ) {$intra_ar21='Transversal Inferior   : ' . $analisis_simetria_transver_infer_. '<strong> | </strong>';}
        if ($analisis_simetria_transver_infer_ <> '' ) {$intra_ar22='Transversal Inferior  Hallazgo : ' . $analisis_simetria_transver_infer_hallazgo. '<strong> | </strong>';}

        $examen_Intra_Archo=$intra_ar1.$intra_ar2.$intra_ar3.$intra_ar4.$intra_ar5.$intra_ar6.$intra_ar7.$intra_ar8.$intra_ar9.$intra_ar10.$intra_ar11.$intra_ar12.$intra_ar13.$intra_ar14.$intra_ar15.$intra_ar16.$intra_ar17.$intra_ar18.$intra_ar19.$intra_ar20.$intra_ar21.$intra_ar22;







        $anchura_p_paladar=$_POST['anchura_p_paladar'];
        $altura_paladar=$_POST['altura_paladar'];
        $indice_korhaus=$_POST['indice_korhaus'];
        $asa=$_POST['asa'];
        $sistematico=$_POST['sistematico'];
        $facial_esqueletico=$_POST['facial_esqueletico'];
        $estomatologico=$_POST['estomatologico'];
        $endodonticos=$_POST['endodonticos'];
        $funcional1=$_POST['funcional1'];
        $pron_individual=$_POST['pron_individual'];
        $pron_general=$_POST['pron_general'];
        $plan_fase_sistematica=$_POST['plan_fase_sistematica'];
        $plan_fase_urgencia=$_POST['plan_fase_urgencia'];
        $plan_fase_higienica=$_POST['plan_fase_higienica'];
        $plan_ambiente_dentral=$_POST['plan_ambiente_dentral'];
        $plan_ambiente_periodontal=$_POST['plan_ambiente_periodontal'];
        $plan_fase_revaluativa=$_POST['plan_fase_revaluativa'];
        $plan_fase_correctiva_inicial=$_POST['plan_fase_correctiva_inicial'];
        $plan_fase_correctiva_final=$_POST['plan_fase_correctiva_final'];
        $plan_fase_mantenimiento=$_POST['plan_fase_mantenimiento'];


        if ($anchura_p_paladar <> '') {$paladar1= 'Anchura posterior del paladar : ' . $anchura_p_paladar . '<strong> | </strong>';}
        if ($altura_paladar <> '') {$paladar2= 'Altura del paladar : ' . $altura_paladar . '<strong> | </strong>';}
        if ($indice_korhaus <> '') {$paladar3= 'Índice de Korkhaus : ' . $indice_korhaus . '<strong> | </strong>';}
        if ($asa <> '') {$paladar4= 'Asa : ' . $asa . '<strong> | </strong>';}
        if ($sistematico <> '') {$paladar5= 'Sistématico : ' . $sistematico . '<strong> | </strong>';}
        if ($facial_esqueletico <> '') {$paladar6= 'Facial esquelético : ' . $facial_esqueletico . '<strong> | </strong>';}
        if ($estomatologico <> '') {$paladar7= 'Estomatológico : ' . $estomatologico . '<strong> | </strong>';}
        if ($endodonticos <> '') {$paladar8= 'Endodónticos : ' . $endodonticos . '<strong> | </strong>';}
        if ($funcional1 <> '') {$paladar9= 'Funcional : ' . $funcional1 . '<strong> | </strong>';}
        if ($pron_individual <> '') {$paladar10= 'Individual : ' . $pron_individual . '<strong> | </strong>';}
        if ($pron_general <> '') {$paladar11= 'General : ' . $pron_general . '<strong> | </strong>';}
        if ($plan_fase_sistematica <> '') {$paladar12= 'Fase sistémica : ' . $plan_fase_sistematica . '<strong> | </strong>';}
        if ($plan_fase_urgencia <> '') {$paladar13= 'Fase de Urgencia : ' . $plan_fase_urgencia . '<strong> | </strong>';}
        if ($plan_fase_higienica <> '') {$paladar14= 'Fase Higiénica : ' . $plan_fase_higienica . '<strong> | </strong>';}
        if ($plan_ambiente_dentral <> '') {$paladar15= 'Ambientación dental : ' . $plan_ambiente_dentral . '<strong> | </strong>';}
        if ($plan_ambiente_periodontal <> '') {$paladar16= 'Ambientación Periodontal : ' . $plan_ambiente_periodontal . '<strong> | </strong>';}
        if ($plan_fase_revaluativa <> '') {$paladar17= 'Fase revaluativa : ' . $plan_fase_revaluativa . '<strong> | </strong>';}
        if ($plan_fase_correctiva_inicial <> '') {$paladar18= 'Fase correctiva inicial : ' . $plan_fase_correctiva_inicial . '<strong> | </strong>';}
        if ($plan_fase_correctiva_final <> '') {$paladar19= 'Fase correctiva final : ' . $plan_fase_correctiva_final . '<strong> | </strong>';}
        if ($plan_fase_mantenimiento <> '') {$paladar20= 'Fase de mantenimiento : ' . $plan_fase_mantenimiento . '<strong> | </strong>';}

        $analisis_paladar=$paladar1.$paladar2.$paladar3.$paladar4.$paladar5.$paladar6.$paladar7.$paladar8.$paladar9.$paladar10.$paladar11.$paladar12.$paladar13.$paladar14.$paladar15.$paladar16.$paladar17.$paladar18.$paladar19.$paladar20;

          


        $usuarioId = $_POST['ID']; 
        $clienteId = $_POST['ClienteID']; 
        $pieza=$_POST['Pieza']; 
        $tratamiento=$_POST['tratamiento']; 
        $detalle_tra=$_POST['detalle_tra']; 

        if ($_POST['tipoConsulta']!='') {
          $tipoConsulta=$_POST['tipoConsulta'];
        }else{
          $tipoConsulta=1;
        }
        if ($_POST['p_inferior']!='') {
          $p_inferior=$_POST['p_inferior'];
        }else{
          $p_inferior=0;
        }
        if ($_POST['p_superior']!='') {
          $p_superior=$_POST['p_superior'];
        }else{
          $p_superior=0;
        }
        if ($_POST['p_frontal']!='') {
          $p_frontal=$_POST['p_frontal'];
        }else{
          $p_frontal=0;
        }
        if ($_POST['c_izquierdo']!='') {
          $c_izquierdo=$_POST['c_izquierdo'];
        }else{
          $c_izquierdo=0;
        }
        if ($_POST['c_derecho']!='') {
          $c_derecho=$_POST['c_derecho'];
        }else{
          $c_derecho=0;
        }
        if ($_POST['completa']!='') {
          $completa=$_POST['completa'];
        }else{
          $completa=0;
        }
 


        $fechar = date("Y-m-d");
        $hora = date("H:i:s");


        $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

      


//Insercion en la tabla historiaClinica9_Quirurgica
                $queryList=mysqli_query($conn3,"INSERT INTO  historiaClinica_odonto 
                    (cliente_id, usuario_id, Fecha, Hora, numero, motivoConsulta, tratamiento, detalleTratamiento,  p_inferior,   p_superior, c_derecho, c_izquierdo,   frontal, completa,   tejido_blando, examen_dental, examen_inter_arco, examen_intra_arco,   analisis_paladar  ) VALUES
                   ('$clienteId','$usuarioId', '$fechar','$hora','$pieza', '$tipoConsulta', '$tratamiento', '$detalle_tra','$p_inferior', '$p_superior', '$c_derecho', '$c_izquierdo', '$frontal', '$completa' ,'$tejido_blandos','$examen_dental','$examen_Inter_Arco','$examen_Intra_Archo','$analisis_paladar')");

//Busqueda del id mayor en la tabla historiaClinica13PostOperatorio
              $buscando=mysqli_query($conn3,"SELECT MAX(ID) as max from  historiaClinica_odonto ");
              $nrowl=mysqli_fetch_assoc($buscando);
              $maximos=$nrowl['max'];
              
            $variable="d".$pieza;
            $actualizar=mysqli_query($conn3,"UPDATE cliente_odonto
                SET 
                $variable=$tipoConsulta
                WHERE 
                cliente_odonto_id=$clienteId

                ");



                  echo "<script type='text/javascript'>
                        window.location='finalizar_donto.php?historiaClinica1=$maximos';
                     </script>";
          

?>