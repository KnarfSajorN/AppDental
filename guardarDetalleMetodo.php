<?php
date_default_timezone_set('America/Bogota');

include("funciones/conn3.php");
include("funciones/funciones.php");

// datos del cliente y usuario

$fechaRegistro           = date("Y-m-d H:i:s");
$idOperacion             = 0;
$id_usuario              = $_POST['id_usuario'];
$id_cliente              = $_POST['id_cliente'];
$metodo_pago              = $_POST['metodo_pago'];
$nota_pago              = $_POST['nota_pago'];
$historia  = $_POST['historia'];
$tipo_historia = $_POST['tipo_historia'];
$tipo = $_POST['tipo'];
$ID_Empresa = $_POST['ID_Empresa'];

$nOrden = 0 + $_POST['nOrden'];

if($id_cliente==""){
    $id_cliente=0;
}






$queryUsuario = "INSERT INTO sDetalleMetodosPagos 
                    (idOperacion, fechaRegistro,id_usuario, id_cliente,metodo_pago,nota_pago,id_historia,tipo_historia,tipo,ID_Empresa, nOrden) 
                                          VALUES 
                    ('$idOperacion','$fechaRegistro','$id_usuario', 
                    '$id_cliente','$metodo_pago','$nota_pago','$historia','$tipo_historia','$tipo','$ID_Empresa', '$nOrden');";

// echo "INSERT INTO sDetalleMetodosPagos 
//                     (idOperacion, fechaRegistro,id_usuario, id_cliente,metodo_pago,nota_pago,tipo,ID_Empresa) 
//                                           VALUES 
//                     ('$idOperacion','$fechaRegistro','$id_usuario', 
//                     '$id_cliente','$metodo_pago','$nota_pago','$historia', '$tipo_historia','$tipo','$ID_Empresa');";





mysqli_query($conn3,$queryUsuario) or die(mysqli_error($conn3));

if ($id_cliente != 0) {
    //echo "<script language='Javascript'> window.location='SgenerarFactura.php?clienteId=$id_cliente'</script>";
    echo "<script language='Javascript'> 
    var rutaPaginaAnterior = document.referrer;
    window.location.href = rutaPaginaAnterior;
    </script>";
}
elseif ($id_cliente == 0) {
    //echo "<script language='Javascript'> window.location='SgenerarOrdenC.php?id=$ID_Empresa'</script>";
    echo "<script language='Javascript'> 
    var rutaPaginaAnterior = document.referrer;
    window.location.href = rutaPaginaAnterior;
    </script>";
}
// echo "<script language='Javascript'> window.location='SgenerarFactura.php?historiaClinica1=$historia&clienteId=$id_cliente&tipo_historia=$tipo_historia'</script>"; 
   //     }
