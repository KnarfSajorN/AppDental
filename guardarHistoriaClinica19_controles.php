<?php
   	include 'header.php';
   	//include 'menu.php'; 

    date_default_timezone_set('America/Bogota');
    include("conexiones/conexion.php");
    $con=conectar();
 
    $sesionusuario			= 	$_POST['ID'];
	$paciente			= 	$_POST['clienteId'];
	$fechar                = date("Y-m-d");
	$hora                  = date("H:i:s");

	$tipo_control	= 	$_POST['control'];

	//Control 1
	$valor1			= 	$_POST['hora1'];
	$valor2			= 	$_POST['ta'];
	$valor3			= 	$_POST['t'];
	$valor4			= 	$_POST['p'];
	$valor5			= 	$_POST['fr'];
	$valor6			= 	$_POST['temperatura'];
	$valor7			= 	$_POST['pa'];
	$valor8			= 	$_POST['peso'];
	$valor9			= 	$_POST['orina_total'];
	$valor10		= 	$_POST['evacuaciones'];
	$valor11		= 	$_POST['vomitos'];


	if($valor1 <> ''){$va1 = '  
		<table class="table table-bordered">
			<tr>
				<th colspan="4">Signos Vitales</th>
			</tr>
			<tr>
				<td colspan="4">Hora:'.$valor1.'</td>
			</tr>';}
	if ($valor2 <> '') {$va2 = '
			<tr>
				<td>TA:'.$valor2.'</td>
		';}
	if ($valor3 <> '') {$va3 = '
				<td>T:'.$valor3.'</td>
		';}
	if ($valor4 <> '') {$va4 = '
				<td>P:'.$valor4.'</td>
		';}
	if ($valor5 <> '') {$va5 = '
				<td>FR:'.$valor5.'</td>
			</tr>
		';}
	if ($valor6 <> '') {$va6 = '
			<tr>
				<td>Temperatura:'.$valor6.'</td>
		';}
	if ($valor7 <> '') {$va7 = '
				<td>PA:'.$valor7.'</td>
		';}
	if ($valor8 <> '') {$va8 = '
				<td>Peso:'.$valor8.'</td>
		';}
	if ($valor9 <> '') {$va9 = '
				<td>Orina Total:'.$valor9.'</td>
			</tr>
		';}
	if ($valor10 <> '') {$va10 = '
			<tr>
				<td colspan="2">Evacuaciones:'.$valor10.'</td>
		';}
	if ($valor11 <> '') {$va11 = '
				<td colspan="2">Vomitos:'.$valor11.'</td>
			</tr>
		</table>
		';}

		//Control 2 
	$valor12			= 	$_POST['t_a'];
	$valor13			= 	$_POST['F_C'];
	$valor14			= 	$_POST['f_r'];
	$valor15			= 	$_POST['t_n'];
	$valor16			= 	$_POST['hora2'];
	$valor17			= 	$_POST['enfermera'];
	$valor18			= 	$_POST['nota'];

	if($valor12 <> ''){$va12 = '  
		<table class="table table-bordered">
			<tr>
				<th colspan="5">Notas de Enfermeria</th>
			</tr>
			<tr>
				<td>T/A:'.$valor12.'</td>
			';}
	if ($valor13 <> '') {$va13 = '
				<td>F/C:'.$valor13.'</td>
		';}
	if ($valor14 <> '') {$va14 = '
				<td>F/R:'.$valor14.'</td>
		';}
	if ($valor15 <> '') {$va15 = '
				<td>T:'.$valor15.'</td>
			</tr>
		';}
	
	if ($valor16 <> '') {$va16 = '
			<tr>
				<td colspan="2">Hora de la Nota:'.$valor16.'</td>
		';}
	if ($valor17 <> '') {$va17 = '
				<td colspan="3">Nombre de la Enfermera:'.$valor17.'</td>
			</tr>
		';}
	if ($valor18 <> '') {$va18 = '
			<tr>
				<td colspan="5">Nota:'.$valor18.'</td>
			</tr>
		</table>
		';}

	//Control 3
	$valor19			= 	$_POST['tipo'];
	$valor20			= 	$_POST['hora3'];
	$valor21			= 	$_POST['oral'];
	$valor22			= 	$_POST['solucion_iv'];
	$valor23			= 	$_POST['sangre'];
	$valor24			= 	$_POST['plasma'];
	$valor25			= 	$_POST['sonda'];
	$valor26			= 	$_POST['orina'];
	$valor27			= 	$_POST['evacuacion'];
	$valor28			= 	$_POST['vomito'];
	$valor29			= 	$_POST['hemorragia'];
	$valor30			= 	$_POST['succion'];
	$valor31			= 	$_POST['canalizacion'];
	$valor32			= 	$_POST['resp_sudor'];
	$valor33			= 	$_POST['otros'];

	if($valor19 <> ''){$va19 = '  
		<table class="table table-bordered">
			<tr>
				<th colspan="4">Hoja de Control de Líquidos</th>
			</tr>
			<tr>
				<td>Tipo:'.$valor19.'</td>
			';}
	if ($valor20 <> '') {$va20 = '
				<td>Hora:'.$valor20.'</td>
		';}
	if ($valor21 <> '') {$va21 = '
				<td>Oral:'.$valor21.'</td>
		';}
	if ($valor22 <> '') {$va22 = '
				<td>Solución IV:'.$valor22.'</td>
			</tr>
		';}
	if ($valor23 <> '') {$va23 = '
			<tr>
				<td>Sangre:'.$valor23.'</td>
		';}
	if ($valor24 <> '') {$va24 = '
				<td>Plasma:'.$valor24.'</td>
		';}
	if ($valor25 <> '') {$va25 = '
				<td>Sonda:'.$valor25.'</td>
		';}
	if ($valor26 <> '') {$va26 = '
				<td>Orina:'.$valor26.'</td>
			</tr>
		';}
	if ($valor27 <> '') {$va27 = '
			<tr>
				<td>Evacuación:'.$valor27.'</td>
		';}
	if ($valor28 <> '') {$va28 = '
				<td>Vomito:'.$valor28.'</td>
		';}
	if ($valor29 <> '') {$va29 = '
				<td>Hemorragia:'.$valor29.'</td>
		';}
	if ($valor30 <> '') {$va30 = '
				<td>Succión:'.$valor30.'</td>
			</tr>
		';}
	if ($valor31 <> '') {$va31 = '
			<tr>
				<td>Canalización:'.$valor31.'</td>
		';}
	if ($valor32 <> '') {$va32 = '
				<td>Resp. y sudor:'.$valor32.'</td>
		';}
	if ($valor33 <> '') {$va33 = '
				<td colspan="2">Otros:'.$valor33.'</td>
			</tr>
		</table>
		';}

	//control 4
	$valor34			= 	$_POST['fecha1'];
	$valor35			= 	$_POST['hora4'];
	$valor36			= 	$_POST['medicamento'];
	$valor37			= 	$_POST['dosis'];
	$valor38			= 	$_POST['frecuencia'];
	$valor39			= 	$_POST['via'];

	if($valor34 <> ''){$va34 = '  
		<table class="table table-bordered">
			<tr>
				<th colspan="4">Administración de Medicamentos</th>
			</tr>
			<tr>
				<td colspan="2">Fecha:'.$valor34.'</td>
			';}
	if ($valor35 <> '') {$va35 = '
				<td colspan="2">Hora:'.$valor35.'</td>
			</tr>';}
	if ($valor36 <> '') {$va36 = '
			<tr>
				<td>Medicamento:'.$valor36.'</td>
		';}
	if ($valor37 <> '') {$va37 = '
				<td>Dosis:'.$valor37.'</td>
		';}
	if ($valor38 <> '') {$va38 = '
				<td>Frecuencia:'.$valor38.'</td>
		';}
	if ($valor39 <> '') {$va39 = '
				<td>Vía:'.$valor39.'</td>
			</tr>
		</table>
		';}
	
	//control 5
	$valor40			= 	$_POST['fecha2'];
	$valor41			= 	$_POST['hora5'];
	$valor42			= 	$_POST['nota2'];

	if($valor40 <> ''){$va40 = '  
		<table class="table table-bordered">
			<tr>
				<th colspan="4">Hoja de Evolución</th>
			</tr>
			<tr>
				<td colspan="2">Fecha:'.$valor40.'</td>
			';}
	if ($valor41 <> '') {$va41 = '
				<td colspan="2">Hora:'.$valor41.'</td>
			</tr>';}
	if ($valor42 <> '') {$va42 = '
			<tr>
				<td colspan="4">Nota:'.$valor42.'</td>
			</tr>
		</table>
		';}

	//control 6
	$valor43			= 	$_POST['fecha3'];
	$valor44			= 	$_POST['hora6'];
	$valor45			= 	$_POST['padecimiento_actual'];
	$valor46			= 	$_POST['evolucion'];
	$valor47			= 	$_POST['estudios_clinicos'];
	$valor48			= 	$_POST['diagnostico_inicial'];

	if($valor43 <> ''){$va43 = '  
		<table class="table table-bordered">
			<tr>
				<th colspan="4">Referencia</th>
			</tr>
			<tr>
				<td colspan="2">Fecha:'.$valor43.'</td>
			';}
	if ($valor44 <> '') {$va44 = '
				<td colspan="2">Hora:'.$valor44.'</td>
			</tr>';}
	if ($valor45 <> '') {$va45 = '
			<tr>
				<td colspan="4">Padecimiento Actual:'.$valor45.'</td>
			</tr>
		';}
	if ($valor46 <> '') {$va46 = '
			<tr>
				<td colspan="4">Evolución:'.$valor46.'</td>
			</tr>';}
	if ($valor47 <> '') {$va47 = '
			<tr>
				<td colspan="4">Estudios Clinicos:'.$valor47.'</td>
			</tr>';}
	if ($valor48 <> '') {$va48 = '
			<tr>
				<td colspan="4">Diagnóstico Inicial:'.$valor48.'</td>
			</tr>
		</table>';}

	//control 7
	$valor49			= 	$_POST['fecha4'];
	$valor50			= 	$_POST['hora7'];
	$valor51			= 	$_POST['padecimiento_actual2'];
	$valor52			= 	$_POST['evolucion2'];
	$valor53			= 	$_POST['estados_clinicos2'];
	$valor54			= 	$_POST['diagnostico_inicial2'];
	$valor55			= 	$_POST['diagnostico_final'];
	$valor56			= 	$_POST['recomendacion'];

	if($valor49 <> ''){$va49 = '  
		<table class="table table-bordered">
			<tr>
				<th colspan="4">Referencia</th>
			</tr>
			<tr>
				<td colspan="2">Fecha:'.$valor49.'</td>
			';}
	if ($valor50 <> '') {$va50 = '
				<td colspan="2">Hora:'.$valor50.'</td>
			</tr>';}
	if ($valor51 <> '') {$va51 = '
			<tr>
				<td colspan="4">Padecimiento Actual:'.$valor51.'</td>
			</tr>
		';}
	if ($valor52 <> '') {$va52 = '
			<tr>
				<td colspan="4">Evolución:'.$valor52.'</td>
			</tr>';}
	if ($valor53 <> '') {$va53 = '
			<tr>
				<td colspan="4">Estudios Clinicos:'.$valor53.'</td>
			</tr>';}
	if ($valor54 <> '') {$va54 = '
			<tr>
				<td colspan="4">Diagnóstico Inicial:'.$valor54.'</td>
			</tr>';}
	if ($valor55 <> '') {$va55 = '
			<tr>
				<td colspan="4">Diagnóstico Final:'.$valor55.'</td>
			</tr>';}
	if ($valor56 <> '') {$va56 = '
			<tr>
				<td colspan="4">Recomendación para su Manejo:'.$valor56.'</td>
			</tr>
		</table>';}


	if ($tipo_control == 'Signos Vitales') {

		$controle1=$va1.$va2.$va3.$va4.$va5.$va6.$va7.$va8.$va9.$va10.$va11;
		
		mysqli_query($conn3,"INSERT INTO historiaClinica_controles (usuario_id,cliente_id,fecha,hora,tipo_control,detalle) VALUES ('$sesionusuario','$paciente','$fechar','$hora','$tipo_control','$controle1')");
	}
	elseif($tipo_control == 'Notas de Enfermeria'){

		$controle2=$va12.$va13.$va14.$va15.$va16.$va17.$va18;

		mysqli_query($conn3,"INSERT INTO historiaClinica_controles (usuario_id,cliente_id,fecha,hora,tipo_control,detalle) VALUES ('$sesionusuario','$paciente','$fechar','$hora','$tipo_control','$controle2')");
	}
	elseif ($tipo_control == 'Hoja de Control de Líquidos') {

		$controle3=$va19.$va20.$va21.$va22.$va23.$va24.$va25.$va26.$va27.$va28.$va29.$va30.$va31.$va32.$va33;

		mysqli_query($conn3,"INSERT INTO historiaClinica_controles (usuario_id,cliente_id,fecha,hora,tipo_control,detalle) VALUES ('$sesionusuario','$paciente','$fechar','$hora','$tipo_control','$controle3')");
	}
	elseif ($tipo_control == 'Administración de Medicamentos') {

		$controle4=$va34.$va35.$va36.$va37.$va38.$va39;

		mysqli_query($conn3,"INSERT INTO historiaClinica_controles (usuario_id,cliente_id,fecha,hora,tipo_control,detalle) VALUES ('$sesionusuario','$paciente','$fechar','$hora','$tipo_control','$controle4')");
	}
	elseif ($tipo_control == 'Hoja de Evolución') {

		$controle5=$va40.$va41.$va42;

		mysqli_query($conn3,"INSERT INTO historiaClinica_controles (usuario_id,cliente_id,fecha,hora,tipo_control,detalle) VALUES ('$sesionusuario','$paciente','$fechar','$hora','$tipo_control','$controle5')");
	}
	elseif ($tipo_control == 'Referencia') {

		$controle6=$va43.$va44.$va45.$va46.$va47.$va48;

		mysqli_query($conn3,"INSERT INTO historiaClinica_controles (usuario_id,cliente_id,fecha,hora,tipo_control,detalle) VALUES ('$sesionusuario','$paciente','$fechar','$hora','$tipo_control','$controle6')");
	}
	elseif ($tipo_control == 'Contrareferencia') {

		$controle7=$va49.$va50.$va51.$va52.$va53.$va54.$va55.$va56;

		mysqli_query($conn3,"INSERT INTO historiaClinica_controles (usuario_id,cliente_id,fecha,hora,tipo_control,detalle) VALUES ('$sesionusuario','$paciente','$fechar','$hora','$tipo_control','$controle7')");
	}


	$query = mysqli_query($conn3,"SELECT MAX(ID) as controles FROM historiaClinica_controles");
    while($rowhc=mysqli_fetch_array($query)){$historia_control=$rowhc['controles'];} 
/*
	echo "<script language='Javascript'> window.location='finalizado_control.php?control=$historia_control';</script>"; */
?>
