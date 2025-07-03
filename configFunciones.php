<?php
function reemConfig($texto1) 
{

//Rememplazamos caracteres especiales latinos minusculas
$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ', '\"', '€', 'ü', ' ', '?', '!', '¿', '"', '¡','(',')',';',',','/','.',':','&','<','>','=','<=','>=','°','-');
$repl = array('a', 'e', 'i', 'o', 'u', 'n', '', '', '', '', '', '', '', '', '', '', '', '','' ,'','','','','','','','','','');
$texto1 = str_replace ($find, $repl, $texto1);


//Rememplazamos caracteres especiales latinos mayusculas
$find = array('Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ', 'Ü', 'ç', 'Ç');
$repl = array('a', 'e', 'i', 'o', 'u', 'n', '', '', '');
$texto1 = str_replace ($find, $repl, $texto1);

return $texto1;

}



?>