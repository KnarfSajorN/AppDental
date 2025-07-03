<?php
 
// funciona para reemplazar HTML al momento de guardar en base de datos
function reem($texto1) 
{

//Rememplazamos caracteres especiales latinos minusculas
$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ', '\"', '€', 'ü');
$repl = array('&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;', '&ntilde;', '&quot;', '&euro;', '&uuml;');
$texto1 = str_replace ($find, $repl, $texto1);


//Rememplazamos caracteres especiales latinos mayusculas
$find = array('Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ', 'Ü', 'ç', 'Ç');
$repl = array('&Aacute;', '&Eacute;', '&Iacute;', '&Oacute;', '&Uacute;', '&Ntilde;', '&Uuml;', '&ccedil;', '&Ccedil;');
$texto1 = str_replace ($find, $repl, $texto1);

return $texto1;

}

function reem_alreves($texto1) 
{

//Rememplazamos caracteres especiales latinos minusculas
$repl = array('á', 'é', 'í', 'ó', 'ú', 'ñ', '\"', '€', 'ü');
$find = array('&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;', '&ntilde;', '&quot;', '&euro;', '&uuml;');
$texto1 = str_replace ($find, $repl, $texto1);


//Rememplazamos caracteres especiales latinos mayusculas
$repl = array('Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ', 'Ü', 'ç', 'Ç');
$find = array('&Aacute;', '&Eacute;', '&Iacute;', '&Oacute;', '&Uacute;', '&Ntilde;', '&Uuml;', '&ccedil;', '&Ccedil;');
$texto1 = str_replace ($find, $repl, $texto1);

return $texto1;

}

// funciona para reemplazar HTML al momento de guardar en base de datos
function sincomillas($texto1) 
{

//Rememplazamos caracteres especiales por html entities
$find = array("'", '"');
$repl = array('&#039;', '&quot;');
$texto1 = str_replace ($find, $repl, $texto1);

return $texto1;

}

// Usado en  LB_CargarOrden.php | RM_Medicamentos.php
function PonerComillasyOtrosCaracteres($texto1)
{

	//Rememplazamos caracteres especiales por html entities
	$repl = array("'", '"', "\'", '\"', "\n", "\r", "\r\n");
	$find = array('&#039;', '&quot;', '&#039;', '&quot;', '<br>', '<br>', '<br>');
	$texto1 = str_replace($find, $repl, $texto1);

	return $texto1;
}
function QuitarComillasyOtrosCaracteres($texto1)
{

	//Rememplazamos caracteres especiales por html entities
	$find = array("'", '"', "\'", '\"',  "\n", "\r","\r\n", "\t");
	$repl = array('&#039;', '&quot;', '&#039;', '&quot;', '<br>', '<br>','<br>','');
	$texto1 = str_replace($find, $repl, $texto1);

	return $texto1;
}




function bloquearCadenas($texto1) 
{

//Rememplazamos caracteres especiales latinos minusculas
$find = array(
	'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'q', 'w', 'e', 'r', 't', 'y', 
	'u', 'i', 'o', 'p', 'z', 'x', 'c', 'v', 'b', 'n', 'm', '1', '2', '3', '4', 
	'5', '6', '7', '8', '9', '0');
$repl = array(
	'*', '*', '*', '*', '*', '*', '*', '*', '*', '*', '*', '*', '*', '*', '*',
    '*', '*', '*', '*', '*', '*', '*', '*', '*', '*', '*', '*', '*', '*', '*',
    '*', '*', '*', '*', '*', '*');
$texto1 = str_replace ($find, $repl, $texto1);
 
return $texto1;

}


function Funcion_Edad_Paciente($fecha_nacimiento)
{
	date_default_timezone_set('America/Bogota');
	$nacimiento = new DateTime($fecha_nacimiento);
	$ahora = new DateTime(date("Y-m-d"));
	$diferencia = $ahora->diff($nacimiento);

	$Respuesta = [];

	if ($nacimiento <= $ahora) {

		$Respuesta = [];
		if ($diferencia->format("%y") > 7) {
			$Respuesta["Años"] = $diferencia->format("%y");
		} elseif ($diferencia->format("%y") <= 7 and $diferencia->format("%y") >= 1) {
			$Respuesta["Años"] = $diferencia->format("%y");
			$Respuesta["Meses"] = $diferencia->format("%m");
		} elseif ($diferencia->format("%y") < 1) {
			$Respuesta["Meses"] = $diferencia->format("%m");
			$Respuesta["Dias"] = $diferencia->format("%d");
			if ($Respuesta["Meses"] == "0" and $Respuesta["Dias"] == "0") {
				$Respuesta["Respuesta"] = "Dia Actual de Nacimiento";
			}
		}

		foreach ($Respuesta as $key => $value) {
			if ($value == "0") {
				unset($Respuesta[$key]);
			}
		}
	} else {
		$Respuesta["Respuesta"] = "La Fecha de Nacimiento es Mayor a la Actual";
	}
	return $Respuesta;
}

function CalculoEdadPaciente($fechanacimiento)
{
	$Edad = Funcion_Edad_Paciente("{$fechanacimiento}");
	$Mensaje="";
	foreach ($Edad as $key => $value) {
		$Mensaje .= "{$value} {$key}, ";
	}
	$Mensaje = trim($Mensaje, ', ');
	return $Mensaje.".";
}




 
// function calculaedad($fechanacimiento){
	
// 	list($ano,$mes,$dia) = explode("-",$fechanacimiento);
// 	$anyo_dif  = date("Y" , intval(strtotime(date("Y"))) - intval(strtotime(date($ano))));
// 	$mes_dif = date("m", intval(strtotime(date("m"))) - intval(strtotime(date($mes))));
// 	$dia_diferencia   = date("d",intval(strtotime(date("d"))) - intval(strtotime(date($dia))));
// 	if ($dia_diferencia < 0 || $mes_diferencia < 0)
// 		$ano_diferencia--;
	


// 	if ($mes_dif >=0 ) {
// 		return  $anyo_dif.' Años'; 
// 	}

// 	if ($mes_dif < 0  ) {
		
// 		return  ($anyo_dif-1).'Años'; 
// 	}
	

	


// }


function calculaedad($fechanacimiento){
	list($ano, $mes, $dia) = explode("-", $fechanacimiento);
	$ano_dif = date("Y") - (int)$ano;
	$mes_dif = date("m") - (int)$mes;
	$dia_diferencia = date("d") - (int)$dia;
  
	if ($dia_diferencia < 0 || $mes_dif < 0) {
	  $ano_dif--;
	}
  
	if ($mes_dif >= 0) {
	  return  abs($ano_dif).' Años'; 
	}
  
	if ($mes_dif < 0) {
	  return abs(($ano_dif - 1)).' Años'; 
	}
  }
  



// function calculaedadMeses($fechanacimiento){
//   list($ano,$mes,$dia) = explode("-",$fechanacimiento);
//   $ano_diferencia  = date("Y") - $ano;
//   $mes_diferencia = date("m") - $mes;
//   $dia_diferencia   = date("d") - $dia;
//   if ($dia_diferencia < 0 || $mes_diferencia < 0)
//     $ano_diferencia--;
  


// if ($anyo_dif < 1) {
// 	return  $mes_diferencia; 
// }
// if ($anyo_dif > 0) {
// 	$anyo_dif = $anyo_dif*12;

// 	$mes_diferencia = $mes_diferencia+$anyo_dif;
// 	return  $mes_diferencia; 
// } 


// }

function calculaedadMeses($fechanacimiento){
	list($ano, $mes, $dia) = explode("-", $fechanacimiento);
	$ano_dif = date("Y") - (int)$ano;
	$mes_diferencia = date("m") - (int)$mes;
	$dia_diferencia = date("d") - (int)$dia;
  
	if ($dia_diferencia < 0 || $mes_diferencia < 0) {
	  $ano_dif--;
	}
  
	if ($ano_dif < 1) {
	  return $mes_diferencia; 
	}
  
	if ($ano_dif > 0) {
	  $ano_dif = $ano_dif * 12;
	  $mes_diferencia = $mes_diferencia + $ano_dif;
	  return $mes_diferencia; 
	}
  }
  




// function calculaedadAnos($fechanacimiento){
//   list($ano,$mes,$dia) = explode("-",$fechanacimiento);
//   $ano_diferencia  = date("Y") - $ano;
//   $mes_diferencia = date("m") - $mes;
//   $dia_diferencia   = date("d") - $dia;
//   if ($dia_diferencia < 0 || $mes_diferencia < 0)
//     $ano_diferencia--;
  
//  if ($ano_diferencia == date("A")) {
//  $ano_diferencia = 0;	
//  }
// 	return  $ano_diferencia; 
 

// }

function calculaedadAnos($fechanacimiento){
	list($ano, $mes, $dia) = explode("-", $fechanacimiento);
	$ano_diferencia = date("Y") - (int)$ano;
	$mes_diferencia = date("m") - (int)$mes;
	$dia_diferencia = date("d") - (int)$dia;
  
	if ($dia_diferencia < 0 || $mes_diferencia < 0) {
	  $ano_diferencia--;
	}
	
	if ($ano_diferencia == date("Y")) {
	  $ano_diferencia = 0;	
	}
  
	return $ano_diferencia; 
  }
  






function edad($fecha){
	list($anyo,$mes,$dia) = explode("-",$fecha);
	$anyo_dif  = date("Y") - $anyo;
	$mes_dif = date("m") - $mes;
	$dia_dif   = date("d") - $dia;
	if ($dia_dif < 0 || $mes_dif < 0) $anyo_dif--;
	return $anyo_dif;

}


//dejarlo asi la primera letra en mayuscula
function sino($respuesta){

	if ($respuesta == 1) 
	{
		$siono = 'Si';
	}
	elseif ($respuesta == 2 || $respuesta == 0) 
	{
		$siono = 'No';
	}
  return $siono;
}




function hs($respuesta){

	if ($respuesta == 1) 
	{
		$siono = 'H';
	}
	elseif ($respuesta == 2) 
	{
		$siono = 'S';
	}
  
  return $siono;
}



function nole($respuesta){

	if ($respuesta == 1) 
	{
		$siono = 'Normal';
	}
	elseif ($respuesta == 2) 
	{
		$siono = 'Lento';
	}
  
  return $siono;
}



function noan($respuesta){

	if ($respuesta == 1) 
	{
		$siono = 'Normal';
	}
	elseif ($respuesta == 2) 
	{
		$siono = 'Anormal';
	}
  
  return $siono;
}


function pone($respuesta){

	if ($respuesta == 1) 
	{
		$siono = 'Positivo';
	}
	elseif ($respuesta == 2) 
	{
		$siono = 'Negativo';
	}
  
  return $siono;
}


function genero_cliente($respuesta){

	switch ($respuesta) {
    case 'M':
        $siono = "Masculino";
        break;
    case 'F':
        $siono =  "Femenino";
        break;
    case 'I':
        $siono =  "Indeterminado";
        break;
    case 'O':
        $siono =  "Otro";
        break;
}
  return $siono;
}

function reemTilde($texto1) 
{

//Rememplazamos caracteres especiales latinos minusculas
$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
$repl = array('a', 'e', 'i', 'o', 'u', 'n');
$texto1 = str_replace ($find, $repl, $texto1);


//Rememplazamos caracteres especiales latinos mayusculas
$find = array('Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ');
$repl = array('A', 'E', 'I', 'O', 'U', 'N');
$texto1 = str_replace ($find, $repl, $texto1);

return $texto1;

}