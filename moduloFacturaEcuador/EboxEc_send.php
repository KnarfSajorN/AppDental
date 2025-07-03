<?php
// 04 09 2023 - JRodriguez
// test de consumo de API - EboxEc - Servicio de Rentas Internas (SRI).

$url = "https://apitest.facturar.ec/integracion/api/v2/recepcion/factura";


// enviar datos de la factura a la API via POST

$data = [];
$data['codigoEstablecimiento'] = '001';
$data['numeroOrden'] = '001';
$data['detalles'] = [];
// primer detalle 
$data['detalles'][] = [
    "cantidad" => 1,
    "codigoAuxiliar" => "01",
    "codigoPorcentajeIVA" => "2",
    "codigoPrincipal" => "001",
    "descripcion" => "Producto Test",
    "descuento" => 0,
    "impuestos" => [
        [
            "baseImponible" => 10.00,
            "codigo" => "2",
            "codigoPorcentaje" => "2",
            "tarifa" => "12.00",
        ]
    ],
    "isDescuentoPorcentaje" => false,
    "precioTotalSinImpuesto" => 10.00,
    "precioUnitarioProducto" => 10.0
];
$data['direccionComprador'] = "Direccion Test.";
$data['direccionEstablecimiento'] = "Dirección empresa";
$data['fechaEmision'] = "2023-08-02T15:20:05Z";
$data['identificacionComprador'] = "1234567895001";
$data['importeTotal'] = 11.20;
// pagos
$data['pagos'] = [];
$data['pagos'][] = [
    "formaPago" => "20",
    "plazo" => "1",
    "total" => "11.20", 
    "unidadTiempo" => "dias"
];
$data['password'] = "clave";
$data['propina'] =  0;
$data['puntoEmision'] = "001";
$data['razonSocialComprador'] = "Comproador Test";
$data['rucEmpresa'] = "1234567895001";
$data['secuencial'] = "0";
$data['tipoIdentificacionComprador'] = "04";
// total con impuestos
$data['totalConImpuestos'] = [];
$data['totalConImpuestos'][] = [
    "descuentoAdicional" => 1.20,
    "baseImponible" => 10.00,
    "codigo" => "2",
    "codigoPorcentaje" => "2",
    "valor" => 1.2
];
// información adicional
$data['informacionAdicional'] = [];
$data['informacionAdicional'][] = [
    "nombre" => "CORREO",
    "valor" => "test@hotmail.com"
];
$data['totalSinImpuestos'] = 10.00;
$data['totalDescuento'] = 1.20;
$data['username'] = "username";
$data['idTipoIntegracion'] = "1";

$json = json_encode($data);

// imprimir data
print("<pre>" . print_r($data, true) . "</pre>");
// enviar el dato
// En el header se identifica al usuario, el tipo de codificación y el juego de caracteres
$header = array(
    "Accept: application/json;",
    "Content-Type: application/json;",
);
// Se inicializa el objeto CURL (Call URL)
$ch = curl_init();
// Se establecen los parámetros del Objeto antes del envío
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
$output = curl_exec($ch);
// Se obtiene la información de depuración del CURL (resultado HTTP)
$info = curl_getinfo($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
// Se destruye el objeto CURL y se cierra la comunicación
curl_close($ch);
// Convertimos el resultado JSON a arreglo
$salida = json_decode($output, true);
print("<pre>" . print_r($salida, true) . "</pre>");