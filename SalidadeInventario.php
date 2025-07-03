<style type="text/css">
    .loader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('images/pageLoader.gif') 50% 50% no-repeat rgb(249, 249, 249);
        opacity: .8;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script type="text/javascript">
    $(window).load(function() {
        $(".loader").fadeOut("slow");
    });
</script>

<div class="loader"></div>



<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

$usuario_id     = $_POST['usuario_id'];
$cantidadReg = 0;
$catidadTotal = 0;
$date = date("Y-m-d");

//echo "$codigoProd - $cantidad - $usuario_id";
/*

tipoDoc = 
1 = Entrada de inventario
2 = Salida de vinentarios

 */
echo 'iniciamos';
$queryinconfig = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = '$usuario_id'");
$nrowl = mysqli_num_rows($queryinconfig);
while ($rowinconfig = mysqli_fetch_array($queryinconfig)) {

    $salidaInv      = $rowinconfig['salidaInv'];
    $entradaInv     = $rowinconfig['entradaInv'];
}
$salidaInv++;

//echo 'usuario_id'.$usuario_id.'-'.$salidaInv.'<br>';



// ***************************************************************** buscamos al cliente *****************************************************************
$tercero    = $_POST['tercero'];
$queryT = mysqli_query($conn3, "SELECT * FROM sclientes WHERE id = $tercero");
$nrowlT = mysqli_num_rows($queryT);
while ($row_T = mysqli_fetch_array($queryT)) {
    $rut     = $row_T['rut'];
    $nombre      = $row_T['nombre'];
    //$id              = $row_recordset32['id'];

}

$llaves = '';
$valores = '';
foreach ($_POST['Proveedor'] as $key => $value) {
    $validaCampo = mysqli_query($conn3, "SHOW COLUMNS FROM opracioninvheader WHERE Field = '{$key}';");
    if (mysqli_num_rows($validaCampo) == 0) {
        mysqli_query($conn3, "ALTER TABLE opracioninvheader ADD COLUMN {$key} TEXT NULL DEFAULT NULL");
    }
    $llaves .= ",{$key}";
    $valores .= ",'{$value}'"; 
}

$tercero = (!empty($tercero) ? $tercero : 0);

mysqli_query($conn3, "INSERT INTO opracioninvheader (usuario_id, tipoDoc, fechaReg, cantidadReg, totalCosto, totalPrecio, catidadTotal, numero, idTercero, nombre, rut{$llaves}) VALUES 
	        ('$usuario_id', '2', '$date', '0', '0', '0', '0', '$salidaInv', '$tercero', '$nombre', '$rut'{$valores});") or die(mysqli_error($conn3));

$idinvheader = mysqli_insert_id($conn3);




$queryinoper = mysqli_query($conn3, "SELECT * FROM  operacioninv where ususario_id = '$usuario_id'  and estado = 0 and tipoDoc = 0 ");
$rowinoper = mysqli_num_rows($queryinoper);
while ($rowinoper = mysqli_fetch_array($queryinoper)) {

    $cantidad              = $rowinoper['cantidad'];
    $codigoProd          = $rowinoper['codigoProd'];
    $costo              = $rowinoper['costo'];
    $precio              = $rowinoper['precio'];
    $id                  = $rowinoper['id'];

    //echo '<br>operacioninv ='.$id.' - '.$codigoProd.'<br>';

    $queryinl = mysqli_query($conn3, "SELECT * FROM  sinvetrios where usuario_id = '$usuario_id' and ID = $codigoProd");
    $nrowl = mysqli_num_rows($queryinl);
    while ($rowinl = mysqli_fetch_array($queryinl)) {

        $existencia      = $rowinl['existencia'];

        //	echo '<br>existencia ='.$existencia.'<br>';

    }

    $existenciaupdate = $existencia - $cantidad;
    $catidadTotal = $catidadTotal + $codigoProd;

    $cantidadReg++;
    $totalCosto = $totalCosto + $costo;
    $totalPrecio = $totalPrecio + $Precio;


    //	echo '<br>cantidadReg ='.$cantidadReg.'<br>';




    mysqli_query($conn3, "update sinvetrios set existencia= $existenciaupdate where usuario_id = '$usuario_id' and ID = $codigoProd");

    mysqli_query($conn3, "update operacioninv set estado = 1, tipoDoc = 2, fechaReg = '$date', numero = $salidaInv,operacioninvheader_id = '$idinvheader' where ususario_id = '$usuario_id' and id = '$id'");
    //echo "update operacioninv set estado = 1, tipoDoc = 2, fechaReg = '$date', numero = $salidaInv where ususario_id = '$usuario_id' and id = '$id'";
}




mysqli_query($conn3, "update config set salidaInv = $salidaInv, entradaInv= $entradaInv where ID_Usuario = '$usuario_id'");

/*

tipoDoc = 
1 = Entrada de inventario
2 = Salida de vinentarios

 */
/*
$llaves = '';
$valores = '';
foreach ($_POST['Proveedor'] as $key => $value) {
    $validaCampo = mysqli_query($conn3, "SHOW COLUMNS FROM opracioninvheader WHERE Field = '{$key}';");
    if (mysqli_num_rows($validaCampo) == 0) {
        mysqli_query($conn3, "ALTER TABLE opracioninvheader ADD COLUMN {$key} TEXT NULL DEFAULT NULL");
    }
    $llaves .= ",{$key}";
    $valores .= ",'{$value}'"; 
}

$tercero = (!empty($tercero) ? $tercero : 0);

mysqli_query($conn3, "INSERT INTO opracioninvheader (usuario_id, tipoDoc, fechaReg, cantidadReg, totalCosto, totalPrecio, catidadTotal, numero, idTercero, nombre, rut{$llaves}) VALUES 
	        ('$usuario_id', '2', '$date', '$cantidadReg', '$totalCosto', '$totalPrecio', '$catidadTotal', '$salidaInv', '$tercero', '$nombre', '$rut'{$valores});") or die(mysqli_error($conn3));
*/

mysqli_query($conn3, "update opracioninvheader set cantidadReg = $cantidadReg,totalCosto = $totalCosto,totalPrecio = $totalPrecio,catidadTotal = $catidadTotal where id = '$idinvheader' ");

?>


<script language='Javascript'>
    window.location = 'Historial_ImprimirEntradaSalidaInventario.php?id=<?php echo $idinvheader;?>';
    alert('Documento generado')
</script>