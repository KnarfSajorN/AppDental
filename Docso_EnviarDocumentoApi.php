<?php

include 'funciones/conn3.php';

$idOperacion = $_GET['idOperacion'];


$QueryDocumento = mysqli_query($conn3, "SELECT * FROM  DocumentoSoporte_Operacion where idOperacion = $idOperacion");
while ($RowDocumento = mysqli_fetch_array($QueryDocumento)) {

    $usuario_id = $RowDocumento['usuario_id'];
    $proveedor_id = $RowDocumento['proveedor_id'];

    $TotalBruto = $RowDocumento['TotalBruto'];
    $SubTotal = $RowDocumento['SubTotal'];
    $ImpuestoBase = $RowDocumento['ImpuestoBase'];
    $TotalNeto = $RowDocumento['TotalNeto'];
    
    $Nota = $RowDocumento['Nota'];

    $FechaOperacion = $RowDocumento['FechaOperacion'];
    $FechaVencimiento = $RowDocumento['FechaVencimiento'];
    $FechaVenta = $RowDocumento['FechaVenta'];
    $FechaEntrega = $RowDocumento['FechaEntrega'];

    $NumeroDocumentoSoporte = $RowDocumento['NumeroDocumentoSoporte'];
}

$QueryUsuario = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id");
$nrowl = mysqli_num_rows($QueryUsuario);
while ($RowUsuario = mysqli_fetch_array($QueryUsuario)) {
  $soportedocumentos_nit = $RowUsuario['soportedocumentos_nit'];
  $soportedocumentos_emisor = $RowUsuario['soportedocumentos_emisor'];
  $soportedocumentos_username = $RowUsuario['soportedocumentos_username'];
  $soportedocumentos_password = $RowUsuario['soportedocumentos_password'];
  $soportedocumentos_prefijo = $RowUsuario['soportedocumentos_prefijo'];
}


$ArregloEncabezado['emisor']= $soportedocumentos_emisor;
$ArregloEncabezado['generarpdf']= true;
$ArregloEncabezado['fecha']= $FechaVenta;
$ArregloEncabezado['fvence']= $FechaVencimiento;
//////////////////////? Preguntar ///////////////////
$ArregloEncabezado['Idsuc']= "1";
$ArregloEncabezado['nit']=$soportedocumentos_nit;//nit del usuario
$ArregloEncabezado['numero']=$NumeroDocumentoSoporte;
//////////////////////? Preguntar no hay nada relacionado en el json de prueba///////////////////
$ArregloEncabezado['otrosconceptos']=0;//valor total factura
$ArregloEncabezado['prefijo']=$soportedocumentos_prefijo;

$ArregloEncabezado['subtotal']=$SubTotal;
$ArregloEncabezado['total']=$TotalNeto;

/*
$ArregloEncabezado['totalDet']="";//se llena abajo
$ArregloEncabezado['totalImp']="";//se llena abajo
*/



////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$QueryProveedor = mysqli_query($conn3, "SELECT * FROM  sproveedores where id = $proveedor_id");
while ($RowProveedor = mysqli_fetch_array($QueryProveedor)) {

    $Segundo_Apellido = mysqli_real_escape_string($conn3,$RowProveedor['Segundo_Apellido']);
    $Primer_Apellido = mysqli_real_escape_string($conn3,$RowProveedor['Primer_Apellido']);

    $DV = $RowProveedor['DV'];
    $TipoEmpresa = $RowProveedor['TipoEmpresa'];
    $Nit = $RowProveedor['rut'];
    $TotalNeto = $RowProveedor['TotalNeto'];
    
    $Primer_Nombre = mysqli_real_escape_string($conn3,$RowProveedor['Primer_Nombre']);
    $Segundo_Nombre = mysqli_real_escape_string($conn3,$RowProveedor['Segundo_Nombre']);
    $Nombre = mysqli_real_escape_string($conn3,$RowProveedor['nombre']);
    $TipoIdentificacion = $RowProveedor['TipoIdentificacion'];
    $TipoPersona = $RowProveedor['TipoPersona'];

    $ObligacionFiscal = $RowProveedor['ObligacionFiscal'];
    $TributoReceptor = $RowProveedor['TributoReceptor'];
}

if($TipoPersona=="N"){

  $ArregloTercero['apl2']=$Segundo_Apellido;
  $ArregloTercero['apli1']=$Primer_Apellido;

  
  $ArregloTercero['idtipoempresa']=$TipoEmpresa;
  $ArregloTercero['nit']=$Nit;

  $ArregloTercero['nom1']=$Primer_Nombre;
  $ArregloTercero['nom2']=$Segundo_Nombre;

  $ArregloTercero['razonsocial']=$Primer_Apellido." ".$Segundo_Apellido." ".$Primer_Nombre." ".$Segundo_Nombre;
  $ArregloTercero['tdoc']=$TipoIdentificacion;
  $ArregloTercero['tipopersona']=$TipoPersona;
  $ArregloTercero['obligacionfiscal']=$ObligacionFiscal;
  $ArregloTercero['tributoreceptor']=$TributoReceptor;

}else{



  $ArregloTercero['idtipoempresa']=$TipoEmpresa;
  $ArregloTercero['nit']=$Nit;

  $ArregloTercero['razonsocial']=$Nombre;
  $ArregloTercero['tdoc']=$TipoIdentificacion;
  $ArregloTercero['tipopersona']=$TipoPersona;
  $ArregloTercero['obligacionfiscal']=$ObligacionFiscal;
  $ArregloTercero['tributoreceptor']=$TributoReceptor;
}

if($TipoIdentificacion=="31"){
  $ArregloTercero['dv']=$DV;
}


$ContadorDetalles=0;
$QueryDetalles = mysqli_query($conn3, "SELECT * FROM  DocumentoSoporte_Detalles where Estado = 1 and idOperacion = $idOperacion Order by id");
while ($RowDetalles = mysqli_fetch_array($QueryDetalles)) {
    $ContadorDetalles++;
    $ArregloDetalle['cantidad']= $RowDetalles['Cantidad'];
    $ArregloDetalle['fentrega']= $FechaEntrega;


    $ArregloDetalle['idgeneracion']="1";

    $ArregloDetalle['iva']= $RowDetalles['Impuesto_Numerico'];
    $ArregloDetalle['nombreproducto']= mysqli_real_escape_string($conn3,$RowDetalles['Descripcion']);
    $ArregloDetalle['porciva']= $RowDetalles['Impuesto_Textual'];
    $ArregloDetalle['pos']= $ContadorDetalles;
    $ArregloDetalle['precio']= $RowDetalles['Base'];
    $ArregloDetalle['subtotal']= $RowDetalles['Totalbase'];

    

    $ArregloImpuestos[$RowDetalles['Impuesto_Textual']]['Base']=$ArregloImpuestos[$RowDetalles['Impuesto_Textual']]['Base']+$RowDetalles['Totalbase'];
    $ArregloImpuestos[$RowDetalles['Impuesto_Textual']]['Iva_Aplicado']=$ArregloImpuestos[$RowDetalles['Impuesto_Textual']]['Iva_Aplicado']+$RowDetalles['Impuesto_Numerico'];

    $ArregloDetalles[] = $ArregloDetalle;
}

$Contador=0;
foreach ($ArregloImpuestos as $key => $value) {
  
  $ArregloImpuestosFinal[$Contador]['base_calculo']=$value['Base'];
  $ArregloImpuestosFinal[$Contador]['valor']=$value['Iva_Aplicado'];
  $ArregloImpuestosFinal[$Contador]['porciva']=$key;
  $Contador++;
}


$ArregloEncabezado['totalDet']=$ContadorDetalles;
$ArregloEncabezado['totalImp']=count($ArregloImpuestos);

$ArregloDocumento['documento']['detalle'] = $ArregloDetalles;
$ArregloDocumento['documento']['encabezado'] = $ArregloEncabezado;
$ArregloDocumento['documento']['impuesto'] = $ArregloImpuestosFinal;
$ArregloDocumento['documento']['tercero'] = $ArregloTercero;


echo "<pre>";
print_r($ArregloDocumento);
echo "</pre>";

echo "<hr>";

echo json_encode($ArregloDocumento);

$ArregloJson = json_encode($ArregloDocumento,true);

if (isset($_GET['test'])) {
  $url =   "https://ws.dsnube.co/api/v1/estadofe"; // consulta estado
} else {
  
}

$url =   "https://ws.dsnube.co/api/v1/docds"; // envia
$header = array(
  "Content-Type: application/json",
  "Authorization: Basic " . base64_encode($soportedocumentos_username . ":" . $soportedocumentos_password)

);
/*
array(
    'Content-Type: application/json',
    'Authorization: Basic d0lTUzZ4UllDQ3FIemZtNTR0bHNWSkNnZ2ZjQVV3QldrYUI3ai9OWm9acz06NWJwNlJCRTlIUGhTeWxCNy83azNld0M0eURaMGdKc2NMMGRrNFdpYWo5VGtrRHN6YUVsRldML1lZU2ZNanJoZzJzWGlFWnprWG9ucTFPYktzK1hWeFE9PQ=='
  ),
  */
/*
echo $soportedocumentos_password;
echo"<br>";
echo $soportedocumentos_username;


echo "Content-Type: application/json";
echo "Authorization: Basic " . base64_encode($soportedocumentos_username) . "" . base64_encode($soportedocumentos_password);
echo "<hr>";
echo 'Content-Type: application/json';
echo 'Authorization: Basic d0lTUzZ4UllDQ3FIemZtNTR0bHNWSkNnZ2ZjQVV3QldrYUI3ai9OWm9acz06NWJwNlJCRTlIUGhTeWxCNy83azNld0M0eURaMGdKc2NMMGRrNFdpYWo5VGtrRHN6YUVsRldML1lZU2ZNanJoZzJzWGlFWnprWG9ucTFPYktzK1hWeFE9PQ==';

// Se inicializa el objeto CURL (Call URL)
$ch = curl_init();

// Se establecen los parámetros del Objeto antes del envío
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
$output = curl_exec($ch);



// Se obtiene la información de depuración del CURL (resultado HTTP)
$info = curl_getinfo($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Se destruye el objeto CURL y se cierra la comunicación
curl_close($ch);

echo "<pre>";
print_r($output);
echo "</pre>";

$salida = json_decode($output, true);


echo "<hr>";

echo $salida;
*/

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $ArregloJson,
  CURLOPT_HTTPHEADER => $header,
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;


?>