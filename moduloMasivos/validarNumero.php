<?php 
// --------------------------------
// JRodriguez 21 04 2023
// --------------------------------
// recibimos data: '{"numero":"573194615775"}'
$numero = base64_decode($_GET['numero']);

// $numero = '593988987429'; // este es un numero de prueba


// creamos un objeto tipo array con los datos de cada país
// en el encontraremos código telefónico, nombre del país, largo del código y largo del numero
// esto para poder validar un numero y validar si es un numero real o no
// --------------------------------
// país = nombre del país
// código = código telefónico del país
// largoCodigo = largo del código del país ej para Colombia código 57 y largo del código 2
// largoNumero = largo del numero del país ej para Colombia numero 3194615775 y largo del numero 10
// --------------------------------
$paises = array(
    ['pais' => 'colombia', 'codigo' => '57', 'largoCodigo' => '2', 'largoNumero' => '10'],
    ['pais' => 'colombia fijo', 'codigo' => '57', 'largoCodigo' => '2', 'largoNumero' => '8'],
    ['pais' => 'peru', 'codigo' => '51', 'largoCodigo' => '2', 'largoNumero' => '9'],
    ['pais' => 'argentina', 'codigo' => '54', 'largoCodigo' => '2', 'largoNumero' => '11'],
    ['pais' => 'chile', 'codigo' => '56', 'largoCodigo' => '2', 'largoNumero' => '9'],
    ['pais' => 'ecuador', 'codigo' => '593', 'largoCodigo' => '3', 'largoNumero' => '9'],
    ['pais' => 'bolivia', 'codigo' => '591', 'largoCodigo' => '3', 'largoNumero' => '8'],
    ['pais' => 'honduras', 'codigo' => '504', 'largoCodigo' => '3', 'largoNumero' => '8'],
    ['pais' => 'venezuela', 'codigo' => '58', 'largoCodigo' => '2', 'largoNumero' => '10'],
    ['pais' => 'panama', 'codigo' => '507', 'largoCodigo' => '3', 'largoNumero' => '8'],
    ['pais' => 'usa rd puerto rico', 'codigo' => '1', 'largoCodigo' => '1', 'largoNumero' => '10'],    
    ['pais' => 'el salvador', 'codigo' => '503', 'largoCodigo' => '3', 'largoNumero' => '8'],    
    ['pais' => 'costa rica', 'codigo' => '506', 'largoCodigo' => '3', 'largoNumero' => '8'],    
    ['pais' => 'guatemala', 'codigo' => '502', 'largoCodigo' => '3', 'largoNumero' => '8'],    
    ['pais' => 'uruguay', 'codigo' => '598', 'largoCodigo' => '3', 'largoNumero' => '8'],    
    ['pais' => 'paraguay', 'codigo' => '595', 'largoCodigo' => '3', 'largoNumero' => '9'],    
    ['pais' => 'nicaragua', 'codigo' => '505', 'largoCodigo' => '3', 'largoNumero' => '8'],    
    ['pais' => 'mexico', 'codigo' => '52', 'largoCodigo' => '2', 'largoNumero' => '10'],
    ['pais' => 'mexico 2', 'codigo' => '52', 'largoCodigo' => '2', 'largoNumero' => '11'], 
    ['pais' => 'Paises Bajos', 'codigo' => '31', 'largoCodigo' => '2', 'largoNumero' => '9'],
    ['pais' => 'Portugal', 'codigo' => '351', 'largoCodigo' => '3', 'largoNumero' => '9'],
    ['pais' => 'España', 'codigo' => '34', 'largoCodigo' => '2', 'largoNumero' => '6'],
    ['pais' => 'España2', 'codigo' => '34', 'largoCodigo' => '2', 'largoNumero' => '7'],
    ['pais' => 'irlanda', 'codigo' => '354', 'largoCodigo' => '3', 'largoNumero' => '7'],
    ['pais' => 'francia', 'codigo' => '33', 'largoCodigo' => '2', 'largoNumero' => '9'],
    ['pais' => 'italia', 'codigo' => '39', 'largoCodigo' => '2', 'largoNumero' => '10'],
    ['pais' => 'marruecos', 'codigo' => '212', 'largoCodigo' => '3', 'largoNumero' => '7'],
    ['pais' => 'alemania', 'codigo' => '49', 'largoCodigo' => '2', 'largoNumero' => '8'],
);
 
// teniendo los datos de los países
// validamos si el numero es valido

$response = array('status' => false, 'pais' => '', 'numero' => '');

for ($i = 0; $i < count($paises); $i++) {    
    // validar si el largo del numero es igual al largoCodigo + largoNumero
    ($paises[$i]['largoCodigo'] + $paises[$i]['largoNumero'] == strlen($numero)) ? $valido = true : $valido = false;

    // validar si el codigo es igual al substring del numero 
    ($paises[$i]['codigo'] == substr($numero, 0, strlen($paises[$i]['codigo']))) ? $valido2 = true : $valido2 = false;

    // validar si el largo del numero es igual al largoNumero
    ($paises[$i]['largoNumero'] == strlen(substr($numero, $paises[$i]['largoCodigo'], $paises[$i]['largoNumero']))) ? $valido3 = true : $valido3 = false;

    if ($valido && $valido2 && $valido3) {
        // retornamos true
        $response['status'] = true;
        $response['pais'] = $paises[$i]['pais'];
        $response['numero'] = $numero;
    }else{
        $response['numero'] = $numero;        
    }
}


echo json_encode($response);


?>