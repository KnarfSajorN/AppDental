<?php

include("conexiones/conn3.php");
include("funciones/funciones.php");
 
        $doctor                 = $_POST['ID'];
        $clienteid             = $_POST['clienteId'];

        $fechar                = date("Y-m-d");     
        $hora                  = date("H:i:s");      
        
        $idOperacion = $_POST['idOperacion'];
        // $pago = $_POST['pago'];
        $banco= $_POST['banco'];
        // $pago = $_POST['pago'];
        $tarjeta= $_POST['tarjeta'];
        $cuenta = $_POST['cuenta'];
        $notas = $_POST['nota'];
        $fecha_abono= $_POST['fecha_abono'];
        $valor_abonar = $_POST['valor_abonar'];
        $pago = $_POST['metodo_pago'];
        $factura=funcionMaster($idOperacion,'idOperacion','numeroDoc','sOperacionInv');
        $monto_pagado_factura = funcionMaster($idOperacion,'idOperacion','montoPagado','sOperacionInv');
        $monto_total = funcionMaster($idOperacion,'idOperacion','totalNeto','sOperacionInv');

        $monto_faltante=$monto_pagado_factura-$monto_total;
        $montoFinal=$monto_pagado_factura+$valor_abonar;
        $montoPendienteFinal=$monto_faltante+$valor_abonar;

        /*
        echo $idOperacion.' idop<br>';
        echo $monto_pagado_factura.'pagado<br>';
        echo $monto_pendiente.'pendiente<br>';

        echo $montoFinal.'final pagado<br>';
        echo $montoPendienteFinal.'final pendiente<br>';
        */

mysqli_query($conn3,"insert INTO abono (fecha, hora, numero_operacion, numero_documento, usuario_id, cliente_id, valor_abonado,valor_anterior_factura,valor_nuevo_factura,monto_faltante, pago, banco, tarjeta, cuenta, notas,fecha_abono)VALUES ('$fechar' ,'$hora' ,'$idOperacion' ,'$factura' ,'$doctor' ,'$clienteid' ,'$valor_abonar','$monto_pagado_factura','$montoFinal','$montoPendienteFinal','$pago', '$banco', '$tarjeta','$cuenta', '$notas','$fecha_abono')");

echo "insert INTO abono (fecha, hora, numero_operacion, numero_documento, usuario_id, cliente_id, valor_abonado,valor_anterior_factura,valor_nuevo_factura,monto_faltante, pago, banco, tarjeta, cuenta, notas,fecha_abono)VALUES ('$fechar' ,'$hora' ,'$idOperacion' ,'$factura' ,'$doctor' ,'$clienteid' ,'$valor_abonar','$monto_pagado_factura','$montoFinal','$montoPendienteFinal','$pago', '$banco', '$tarjeta','$cuenta', '$notas','$fecha_abono')";


              $queryListhc=mysqli_query($conn3,"SELECT MAX(id) as historiaClinica1 from abono  where cliente_id= $clienteid");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $idAbono=$rowhc['historiaClinica1'];
              }   

              

mysqli_query($conn3,"UPDATE sOperacionInv SET montoPagado='$montoFinal' WHERE idOperacion='$idOperacion' limit 1");

//mysqli_query($conn3,"UPDATE sCuentasCobrar SET montoPendiente='$montoPendienteFinal' WHERE idDocumento='$idOperacion' limit 1");
 
  echo "<script language='Javascript'> window.location='ImprimirAbono.php?idOperacion=$idOperacion&idAbono=$idAbono';</script>"; 


 
                
  
                                                                     
   
?>