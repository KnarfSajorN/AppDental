<?php
	include 'funciones/funciones.php';
	include 'funciones/funcionesUtilidades.php';
	date_default_timezone_set('America/Bogota');

  	$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

  	function removeEmptyElements(&$element)
  	{
  	    if (is_array($element)) {
  	        if ($key = key($element)) {
  	            $element[$key] = array_filter($element);
  	        }

  	        if (count($element) != count($element, COUNT_RECURSIVE)) {
  	            $element = array_filter(current($element), __FUNCTION__);
  	        }

  	        $element = array_filter($element);

  	        return $element;
  	    } else {
  	        return empty($element) ? false : $element;
  	    }
  	}


  	//array_filter($_POST['InformacionAcudiente'], 'removeEmptyElements') -> esto se usa para  eliminar campos vacios en un array
  	foreach (array_filter($_POST['InformacionAcudiente'], 'removeEmptyElements') as $key => $value) {
        $InformacionAcudiente .= $key.": ".$value.'<br>';
  	}
  	//echo $InformacionAcudiente.'<br>';

  	foreach (array_filter($_POST['EnfermedadActual'], 'removeEmptyElements') as $key => $value) {
        $EnfermedadActual .= $key.": ".$value.'<br>';
  	}
  	//echo $EnfermedadActual.'<br>';

  	foreach (array_filter($_POST['Checks_Antecedentes'], 'removeEmptyElements') as $key => $value) {
    	$Checks_Antecedentes .= '<b>'.$key.'</b>:<br>';
    	foreach ($value as $key1 => $value1) {
            $Checks_Antecedentes .= $value1.'<br>';
    	}
  	}
  	//echo $Checks_Antecedentes.'<br>';

  	foreach (array_filter($_POST['AntecentesGinecobstetricos'], 'removeEmptyElements') as $key => $value) {
        $AntecentesGinecobstetricos .= $key.": ".$value.'<br>';
  	}
  	//echo $AntecentesGinecobstetricos.'<br>';

  	foreach (array_filter($_POST['AntecedentesFamiliares'], 'removeEmptyElements') as $key => $value) {
    	$AntecedentesFamiliares .= '<b>Antecedente Familiar #'.$key.'</b>:<br>';
    	foreach ($value as $key1 => $value1) {
    		if(is_array($_POST['AntecedentesFamiliares'][$key][$key1]))
    		{
    			$AntecedentesFamiliares .= '<CIE10>'.$key1.'<br>';
    			foreach ($value1 as $key2 => $value2){
    			$AntecedentesFamiliares .= $value2.'&nbsp;,&nbsp;';
    			}
    			$AntecedentesFamiliares.='</CIE10><br>';
    		}
    		else
    		{
    			$AntecedentesFamiliares .= $key1.": ".$value1.'<br>';
          echo "entro";	
    		}
            
    	}
  	}
  	//echo $AntecedentesFamiliares.'<br>';

  	foreach (array_filter($_POST['Checks_Revision'], 'removeEmptyElements') as $key => $value) {
    	$Checks_Revision .= '<b>'.$key.'</b>:<br>';
    	foreach ($value as $key1 => $value1) {
            $Checks_Revision .= $value1.'<br>';
    	}
  	}
  	//echo $Checks_Revision.'<br>';

  	foreach (array_filter($_POST['SignosVitales'], 'removeEmptyElements') as $key => $value) {
        $SignosVitales .= $key.": ".$value.'<br>';
  	}
  	//echo $SignosVitales.'<br>';


  	$paraclinicos_arreglo = json_decode($_POST['Arreglo_Paraclinicos'], true);
  	foreach (array_filter($paraclinicos_arreglo, 'removeEmptyElements') as $key => $value) {
    	$Paraclinicos .= '<b>Paraclinico #'.$key.'</b>:<br>';
    	foreach ($value as $key1 => $value1) {
            $Paraclinicos .= $key1." : ".$value1.'<br>';
    	}
  	}
  	//echo $Paraclinicos.'<br>';

  	foreach ($_POST['Imagenologia_Examen'] as $key => $value) {
        $Imagenologia_Examen .= $value.',';
  	}
  	//echo $Imagenologia_Examen.'<br>';

  	foreach ($_POST['Laboratorio_Examenes'] as $key => $value) {
        $Laboratorio_Examenes .= $value.',';
  	}
  	//echo $Laboratorio_Examenes.'<br>';



  	foreach (array_filter($_POST['ExamenFisico'], 'removeEmptyElements') as $key => $value) {
  		
  		$contador="0";
  		$caracteres_examenfisico = strlen($ExamenFisico);
    	$ExamenFisico .= '<b>'.$key.'</b>:<br>';

    	foreach ($value as $key1 => $value1) {
    		if($_POST['ExamenFisico'][$key][0] == "No Evaluado")
    		{
    			$ExamenFisicoTemporal .= $value1.'<br>';
    			$contador++;
    		}
    		else
    		{
    			$ExamenFisico .= $value1.'<br>';
    		}
            
    	}
    	if($contador>1)
    	{
    		$ExamenFisico.=$ExamenFisicoTemporal;
        $ExamenFisicoTemporal="";
    	}
    	elseif($contador=='1')
    	{
    		$ExamenFisicoTemporal="";
    		$caracteres_restar = strlen($ExamenFisico)-$caracteres_examenfisico;
    		$ExamenFisico = substr($ExamenFisico,0,-$caracteres_restar); 
    	}
  	}
  	//echo $ExamenFisico.'<br>';

  	foreach (array_filter($_POST['OrganoSentidos'], 'removeEmptyElements') as $key => $value) {
        $OrganoSentidos .= $key.": ".$value.'<br>';
  	}
  	//echo $OrganoSentidos.'<br>';

  	foreach (array_filter($_POST['SintomasGenerales'], 'removeEmptyElements') as $key => $value) {
        $SintomasGenerales .= $key.": ".$value.'<br>';
  	}
  	//echo $SintomasGenerales.'<br>';

  	foreach (array_filter($_POST['DiagnosticoAcupuntura'], 'removeEmptyElements') as $key => $value) {
        $DiagnosticoAcupuntura .= $key.": ".$value.'<br>';
  	}
  	//echo $DiagnosticoAcupuntura.'<br>';

  	foreach (array_filter($_POST['DiagnosticoConsulta'], 'removeEmptyElements') as $key => $value) {
        if(is_array($value))
        {
        	$DiagnosticoConsulta .= '<CIE10-2>'.$key.'</b><br>';
        	foreach ($value as $key1 => $value1){
        	$DiagnosticoConsulta .= $value1.'&nbsp;,&nbsp;';
        	}
        	$DiagnosticoConsulta.='</CIE10-2><br>';
        }
        else
        {
        	$DiagnosticoConsulta .= $key.": ".$value.'<br>';	
        }
  	}
  	//echo $DiagnosticoConsulta.'<br>';

  	foreach (array_filter($_POST['Impresion'], 'removeEmptyElements') as $key => $value) {
        $Impresion .= $key." : ".$value.'<br>';
  	}
  	//echo $Impresion.'<br>';

  	foreach (array_filter($_POST['PlanManejo'], 'removeEmptyElements') as $key => $value) {
        $PlanManejo .= $key." : ".$value.'<br>';
  	}
  	//echo $PlanManejo.'<br>';

  	$incapacidades_arreglo = json_decode($_POST['Arreglo_Incapacidades'], true);
  	foreach (array_filter($incapacidades_arreglo, 'removeEmptyElements') as $key => $value) {
    	$Incapacidades .= '<b>Incapacidades #'.$key.'</b>:<br>';
    	foreach ($value as $key1 => $value1) {
            $Incapacidades .= $key1." : ".$value1.'<br>';
    	}
  	}
  	//echo $Incapacidades.'<br>';

  	$insumos_arreglo = json_decode($_POST['Arreglo_Insumos'], true);
  	foreach (array_filter($insumos_arreglo, 'removeEmptyElements') as $key => $value) {
    	$Insumos .= '<b>Insumos #'.$key.'</b>:<br>';
    	foreach ($value as $key1 => $value1) {
            $Insumos .= $key1." : ".$value1.'<br>';
    	}
  	}
  	//echo $Insumos.'<br>';

    // informacion General //

    date_default_timezone_set('America/Bogota');

                                          //si tiene informacion es por que se hizo una receta
    $receta_validacion = $_POST['idOper'];// esta variable corresponde a una input que trae el ajax al momento de genera una receta
    $receta = $_POST['receta'];
    if($receta_validacion!=""){$RecetaId = $receta;}
    else{$RecetaId="0";}
    $fecha = date("Y-m-d H:i:s");
    $fecha_dias = date("Y-m-d");
    $fecha_horas =  date("H:i:s");
    $clienteId = $_POST['clienteId'];
    $idusuario = $_POST['ID'];
    $tipoConsulta  = $_POST['tipoConsulta'];
    $Consulta_cod  = $_POST['Consulta_cod'];


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

        // *****************************************    Modulo Consultas Medicas Por Urgencias****************************************
        
        $hora_ingreso_observacion = $_POST['hora_ingreso_observacion'];
        if($hora_ingreso_observacion==''){$hora_ingreso_observacion="00:00:00";}
        $fecha_ingreso_observacion = $_POST['fecha_ingreso_observacion'];
        if($fecha_ingreso_observacion==''){$fecha_ingreso_observacion="0000-00-00";}
        $destino_usuario_urgencias = $_POST['destino_usuario_urgencias'];
        $estado_salida_urgencias = $_POST['estado_salida_urgencias'];
        $causa_basica_urgencias = $_POST['causa_basica_urgencias'];
        $fecha_salida_urgencias = $_POST['fecha_salida_urgencias'];
        if($fecha_salida_urgencias==''){$fecha_salida_urgencias="0000-00-00";}
        $hora_salida_urgencias = $_POST['hora_salida_urgencias'];
        if($hora_salida_urgencias==''){$hora_salida_urgencias="00:00:00";}

        if($tipoConsulta=='3')
        {
            $tipo_historia='2';
        }


    mysqli_query($conn3,"INSERT INTO  Historia_Clinica (fecha, cliente_id, usuario_id, InformacionAcudiente,    EnfermedadActual, Checks_Antecedentes, AntecentesGinecobstetricos , AntecedentesFamiliares, Checks_Revision, SignosVitales, Paraclinicos, Imagenologia_Examen, Laboratorio_Examenes, ExamenFisico, OrganoSentidos, SintomasGenerales, DiagnosticoAcupuntura, DiagnosticoConsulta, Impresion, PlanManejo, Incapacidades, Insumos, RecetaId, tipoConsulta, codigoConsulta) VALUES  ('$fecha', '$clienteId', '$idusuario', '$InformacionAcudiente',  '$EnfermedadActual', '$Checks_Antecedentes', '$AntecentesGinecobstetricos', '$AntecedentesFamiliares',  '$Checks_Revision', '$SignosVitales', '$Paraclinicos', '$Imagenologia_Examen', '$Laboratorio_Examenes','$ExamenFisico','$OrganoSentidos', '$SintomasGenerales', '$DiagnosticoAcupuntura', '$DiagnosticoConsulta', '$Impresion', '$PlanManejo', '$Incapacidades','$Insumos','$RecetaId', '$tipoConsulta', '$Consulta_cod');");


    echo "INSERT INTO  Historia_Clinica (fecha, cliente_id, usuario_id, InformacionAcudiente,    EnfermedadActual, Checks_Antecedentes, AntecentesGinecobstetricos , AntecedentesFamiliares, Checks_Revision, SignosVitales, Paraclinicos, Imagenologia_Examen, Laboratorio_Examenes, ExamenFisico, OrganoSentidos, SintomasGenerales, DiagnosticoAcupuntura, DiagnosticoConsulta, Impresion, PlanManejo, Incapacidades, Insumos, RecetaId, tipoConsulta, codigoConsulta) VALUES  ('$fecha', '$clienteId', '$idusuario', '$InformacionAcudiente',  '$EnfermedadActual', '$Checks_Antecedentes', '$AntecentesGinecobstetricos', '$AntecedentesFamiliares',  '$Checks_Revision', '$SignosVitales', '$Paraclinicos', '$Imagenologia_Examen', '$Laboratorio_Examenes','$ExamenFisico','$OrganoSentidos', '$SintomasGenerales', '$DiagnosticoAcupuntura', '$DiagnosticoConsulta', '$Impresion', '$PlanManejo', '$Incapacidades','$Insumos','$RecetaId', '$tipoConsulta', '$Consulta_cod');";
    $id_historia = mysqli_insert_id($conn3);

    foreach ($_POST['DiagnosticoConsulta']['CIE10'] as $value) 
    {
      $codigocie10 = $value;   
      mysqli_query($conn3,"INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo) VALUES ('$clienteId', '$idusuario', '$id_historia','$fecha_dias','$fecha_horas','$codigocie10')");    
    }


     mysqli_query($conn3,"INSERT INTO informacion_rips (id_historia,id_cliente,fecha, tipo, numero_autorizacion, CUPS,  finalidad_consulta, causa_externa, cie10_1, cie10_2, cie10_3, cie10_4, tipo_diagnostico_principal,valor_consulta,ambito_procedimiento,finalidad_procedimiento,personal_atiende,realizacion_quirurgico,valor_procedimiento,cie10_complicacion,numero_contrato,plan_beneficios,numero_poliza,valor_total_copago,valor_comision,valor_total_descuento,valor_entidad_contratante,valor_cuota_moderadora,valor_neto_pagar,fecha_ingreso_observacion,hora_ingreso_observacion,estado_salida_urgencias,causa_basica_urgencias,fecha_salida_urgencias,hora_salida_urgencias,destino_usuario_urgencias, tipoConsulta, codigoConsulta) 
                VALUES  
                ('$id_historia','$clienteId','$fecha',$tipo_historia, '$numero_autorizacion', '$Cup',  '$finalidad_consulta', '$causa_externa', '$cie10_1', '$cie10_2',  '$cie10_3', '$cie10_4', '$tipo_diagnostico_principal', '$valor_consulta','$ambito_procedimiento','$finalidad_procedimiento','$personal_atiende','$realizacion_quirurgico','$valor_procedimiento','$cie10_complicacion','$numero_contrato','$plan_beneficios','$numero_poliza','$valor_total_copago','$valor_comision','$valor_total_descuento','$valor_entidad_contratante','$valor_cuota_moderadora','$valor_neto_pagar','$fecha_ingreso_observacion','$hora_ingreso_observacion','$estado_salida_urgencias','$causa_basica_urgencias','$fecha_salida_urgencias','$hora_salida_urgencias','$destino_usuario_urgencias', '$tipoConsulta', '$Consulta_cod');");

               echo "INSERT INTO informacion_rips (id_historia,id_cliente,fecha, tipo, numero_autorizacion, CUPS,  finalidad_consulta, causa_externa, cie10_1, cie10_2, cie10_3, cie10_4, tipo_diagnostico_principal,valor_consulta,ambito_procedimiento,finalidad_procedimiento,personal_atiende,realizacion_quirurgico,valor_procedimiento,cie10_complicacion,numero_contrato,plan_beneficios,numero_poliza,valor_total_copago,valor_comision,valor_total_descuento,valor_entidad_contratante,valor_cuota_moderadora,valor_neto_pagar,fecha_ingreso_observacion,hora_ingreso_observacion,estado_salida_urgencias,causa_basica_urgencias,fecha_salida_urgencias,hora_salida_urgencias) 
                VALUES  
                ('$id_historia','$clienteId','$fecha',$tipo_historia, '$numero_autorizacion', '$Cup',  '$finalidad_consulta', '$causa_externa', '$cie10_1', '$cie10_2',  '$cie10_3', '$cie10_4', '$tipo_diagnostico_principal', '$valor_consulta','$ambito_procedimiento','$finalidad_procedimiento','$personal_atiende','$realizacion_quirurgico','$valor_procedimiento','$cie10_complicacion','$numero_contrato','$plan_beneficios','$numero_poliza','$valor_total_copago','$valor_comision','$valor_total_descuento','$valor_entidad_contratante','$valor_cuota_moderadora','$valor_neto_pagar','$fecha_ingreso_observacion','$hora_ingreso_observacion','$estado_salida_urgencias','$causa_basica_urgencias','$fecha_salida_urgencias','$hora_salida_urgencias');";


    mysqli_query($conn3,"INSERT INTO examenesaRealizar (usuario_id,cliente_id,historia_id,laboratorio,ecografia,otros,fechaHora) 
    VALUES 
    ('$idusuario','$clienteId','$id_historia', '$Laboratorio_Examenes', '$Imagenologia_Examen', '$otros', '$fecha');");
  
    echo "<script language='Javascript'> window.location='Finalizado_Historia_Clinica_General.php?historiaClinica1=$id_historia';</script>";
?>