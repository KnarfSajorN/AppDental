<?php 
// 13 09 2023 - JRodriguez
// aqui vamos a registrar un nuevo cliente, actualizar la factura segun sea el caso

// primero recibimos todo lo que llegue por post en el arreglo datos[]

$datos = $_POST['datos'];

// se presentan diferentes casos

// caso 0 - mi mismo id
// array(1) { ["idClienteFac"]=> string(3) "114" }

// caso1 - otro paciente registrado
// array(1) { ["idClienteFac"]=> string(3) "115" }

// caso 2 - formulario nuevo 
// array(6) { ["idClienteFac"]=> string(1) "0" ["nombre_cliente"]=> string(14) "jose desde fac" ["CODI_CLIENTE"]=> string(8) "12121212" ["whatsapp"]=> string(10) "3194615775" ["correo_cliente"]=> string(13) "demo@demo.com" ["direccion_cliente"]=> string(9) "direccion" }


if ($datos['idClienteFac'] > 0) {
    // es un cliente registrado
    // en este caso solo actualizamos el campo idClienteFac en la factura
    $queryUpdate = "UPDATE sOperacionInv set idClienteFac = '$datos[idClienteFac]' WHERE idOperacion = '$idOperacion' limit 1";
    mysqli_query($conn3, $queryUpdate);
}else{
    // es un cliente nuevo entonces registramos el cliente y luego actualizamos el registro en factura
    $queryInsert = "INSERT INTO cliente
    set
    usuario_id = 0,
    nombre_cliente = '{$datos['nombre_cliente']}',
    CODI_CLIENTE = '{$datos['CODI_CLIENTE']}',
    whatsapp = '{$datos['whatsapp']}',
    correo_cliente = '{$datos['correo_cliente']}',
    direccion_cliente = '{$datos['direccion_cliente']}'    
    ";
    mysqli_query($conn3, $queryInsert);
    $idPaciente = mysqli_insert_id($conn3);

    $queryUpdate = "UPDATE sOperacionInv set idClienteFac = '$idPaciente' WHERE idOperacion = '$idOperacion' limit 1";
    mysqli_query($conn3, $queryUpdate);
}




?>