<?php
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
   include 'funciones/conn3.php';

   date_default_timezone_set('America/Bogota');

   	$fecha_historia = date("Y-m-d");
   	$hora_historia = date("H:i:s");

   	$usuarioId = $_POST['ID'];
    $clienteId = $_POST['clienteId'];

	$edad = $_POST['edad'];

	$paridad=$_POST["paridad"]; 

	foreach ($paridad as $valor) 	
	{
    	$paridad_total .= $valor.'<br>';
	}

	$antecedentes=$_POST["antecedentes"]; 

	foreach ($antecedentes as $valor) 	
	{
    	$antecedentes_total .= $valor.'<br>';
	}

	$embarazo=$_POST["embarazo"]; 

	foreach ($embarazo as $valor) 	
	{
    	$embarazo_total .= $valor.'<br>';
	}

	$total_riesgo_1=$_POST["total_riesgo"]; //subtotal #1  

	$tension1=$_POST["tension1"];
	if($tension1 !=""){$total_tension_emocional .= "Llanto facil : ".$tension1."<br>";}

	$tension2=$_POST["tension2"];
	if($tension2 !=""){$total_tension_emocional .= "Tension muscular : ".$tension2."<br>";}

	$tension3=$_POST["tension3"];
	if($tension3 !=""){$total_tension_emocional .= "Imposibilidad para estar quieta : ".$tension3."<br>";}

	$tension4=$_POST["tension4"];
	if($tension4 !=""){$total_tension_emocional .= "Sobresalto : ".$tension4."<br>";}

	$tension5=$_POST["tension5"];
	if($tension5 !=""){$total_tension_emocional .= "Temblor : ".$tension5."<br>";}

	$tension6=$_POST["tension6"];
	if($tension6 !=""){$total_tension_emocional .= "Incapacidad de relajarse : ".$tension6."<br>";}


	$tension7=$_POST["tension7"];
	if($tension7 !=""){$total_humor_depresivo .= "Insomnio : ".$tension7."<br>";}

	$tension8=$_POST["tension8"];
	if($tension8 !=""){$total_humor_depresivo .= "Falta de interes : ".$tension8."<br>";}

	$tension9=$_POST["tension9"];
	if($tension9 !=""){$total_humor_depresivo .= "No disfruta pasatiempos: ".$tension9."<br>";}

	$tension10=$_POST["tension10"];
	if($tension10 !=""){$total_humor_depresivo .= "Depresion : ".$tension10."<br>";}

	$tension11=$_POST["tension11"];
	if($tension11 !=""){$total_humor_depresivo .= "Variaciones de humor : ".$tension11."<br>";}


	$tension12=$_POST["tension12"];
	if($tension12 !=""){$total_sintomas_neuro .= "Transpiracion excesiva : ".$tension12."<br>";}
	$tension13=$_POST["tension13"];
	if($tension13 !=""){$total_sintomas_neuro .= "Accesos de rubor / palidez : ".$tension13."<br>";}
	$tension14=$_POST["tension14"];
	if($tension14 !=""){$total_sintomas_neuro .= "Boca seca : ".$tension14."<br>";}
	$tension15=$_POST["tension15"];
	if($tension15 !=""){$total_sintomas_neuro .= "Cefalea tensional : ".$tension15."<br>";}

	$total_riesgo_2=$_POST["total_riesgo_2"]; // subtotal #2

	$tiempo_riesgo=$_POST["tiempo_riesgo"]; 
	$espacio_riesgo=$_POST["espacio_riesgo"]; 
	$dinero_riesgo=$_POST["dinero_riesgo"]; 

	$total_riesgo_3=$_POST["total_riesgo_3"]; // subtotal #3

	$total_historia=$_POST["total_historia"]; // total historia 

	mysqli_query($conn3,"INSERT INTO historia_psicosocial (cliente_id, usuario_id, fecha, hora, edad, paridad, antecedentes, embarazo, total_riesgo_1, tension_emocional, humor_depresivo, sintomas_neurovegetativos, total_riesgo_2, tiempo_riesgo, espacio_riesgo, dinero_riesgo, total_riesgo_3, total_historia) VALUES ('$clienteId', '$usuarioId', '$fecha_historia', '$hora_historia', '$edad', '$paridad_total', '$antecedentes_total', '$embarazo_total', '$total_riesgo_1', '$total_tension_emocional', '$total_humor_depresivo', '$total_sintomas_neuro', '$total_riesgo_2', '$tiempo_riesgo', '$espacio_riesgo', '$dinero_riesgo', '$total_riesgo_3', '$total_historia')");

	$queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historia from historia_psicosocial where cliente_id= $clienteId");
	$nrowl=mysqli_num_rows($queryListhc);
	while($rowhc=mysqli_fetch_array($queryListhc))
	{
	  $historia=$rowhc['historia'];
	}  


	
	echo "<script language='Javascript'> window.location='finalizado_PsicoSocial.php?historia=$historia';</script>"; 

	
?>