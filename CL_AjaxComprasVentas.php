<?php
date_default_timezone_set('America/Bogota');
include 'funciones/conn3.php';

function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla)
{
    include 'funciones/conn3.php';
    $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
    $nrowl = mysqli_num_rows($query);
    while ($row = mysqli_fetch_array($query)) {

        $text = $row[$campoImprimir];
    }
    return  $text;
}


if ($_POST["Tipo"] == "Eventos_Calendario") {
    
    date_default_timezone_set("America/Bogota");



    $start = $_POST['start'];
    $end = $_POST['end'];

    $usuario_id = $_POST['usuario_id'];

    $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv  where tipo IN (1,3) AND fechaVencimiento BETWEEN '$start' AND '$end' AND idEmpresa='$usuario_id' order by fechaVencimiento asc");
     while ($RowCitas = mysqli_fetch_array($queryList)) {

         $idOperacion = $RowCitas['idOperacion'];

         $Cliente_id = $RowCitas["idCliente"];
         $Usuario_id = $RowCitas["idEmpresa"];
         $Proveedor_id = $RowCitas["ID_Empresa"];

         $NumeroDoc = $RowCitas["numeroDoc"];
         $FechaOperacion = $RowCitas["fechaOperacion"];
         $FechaVencimiento = $RowCitas["fechaVencimiento"];

         $cantidadProduc = $RowCitas["cantidadProduc"];

         $totalNeto = $RowCitas["totalNeto"];
         $montoPagado = $RowCitas["montoPagado"];





         ////////////////////////////////////////////////////////devoluciones////////////////////////////////////////////////////////////////
         $idOperacionPrincipal = $idOperacion;
         $ValorProductoDevuelto = 0;
         $MontoDevolucion=0;
         $ResultDevolucion = mysqli_query($conn3,"SELECT * FROM  sOperacionInvDevolucion where idOperacion_principal = $idOperacionPrincipal");
         while ($RowDevolucion = mysqli_fetch_array($ResultDevolucion)) {
             $ValorProductoDevuelto = round($ValorProductoDevuelto+$RowDevolucion['totalNeto'],2);
             $MontoDevolucion = round($MontoDevolucion+$RowDevolucion['MontoDevolucion'],2);
         }

         $Mensaje_ValorProductoDevuelto="";
         $Mensaje_MontoDevolucion="";
         if($ValorProductoDevuelto!="0"){
             $Mensaje_ValorProductoDevuelto = ' Productos Devueltos: '.$ValorProductoDevuelto;
         }
         if($MontoDevolucion!="0"){
             $Mensaje_MontoDevolucion = ' Monto Devueltos: '.$MontoDevolucion;
         }
         
         $saldoFactura = ($totalNeto - $montoPagado);
         $saldodevolucion = ($ValorProductoDevuelto - $MontoDevolucion);
         $saldo = round($saldoFactura-$saldodevolucion,2);
         ////////////////////////////////////////////////////////devoluciones////////////////////////////////////////////////////////////////





         //$saldo = $totalNeto-$montoPagado;
         
         $Tipo = $RowCitas["tipo"];
         $TipoFactura="";
         $Icono="";
         $Texto="";
         $Color="";
         $ColorModal="";
         switch ($Tipo) {
             case 1:
                 $Nombre = funcionMaster($Cliente_id,'cliente_id','nombre_cliente','cliente');
                 $TipoFactura = "Factura";
                 $Icono = "fa-user-large";
                 
                 $Color="#acb9ea";
                 $ColorModal="ColorGroundAzul";

                 $Texto = "<div class='form-group col-md-12' style='text-align:center;'> <h3> Cuenta x Cobrar </h3> </div><div class='col-md-12'><hr></div>";
                 $Texto .= "<div class='form-group col-md-6'> <label> Cliente: </label> $Nombre   </div>";
                 $Texto .= "<div class='form-group col-md-6'> <label> Fecha Registro: </label> $FechaOperacion </div> ";
                 $Texto .= "<div class='form-group col-md-12'> <label> Fecha de Vencimiento: </label> $FechaVencimiento   </div>";
                 $Texto .= "<div class='form-group col-md-6'> <label> Cantidad Productos: </label> $cantidadProduc </div> ";
                 $Texto .= "<div class='form-group col-md-6'> <label> Numero de Factura: </label> # $NumeroDoc </div> <div class='col-md-12'><hr></div>";
                 
                 

                 break;
             case 3:
                $Nombre = funcionMaster($Proveedor_id,'id','nombre','sproveedores');
                 $TipoFactura = "Compra";
                 $Icono = "fa-basket-shopping";
                
                 $Color="#c88c0047";
                 $ColorModal="ColorGroundAmarillo";

                 $Texto = "<div class='form-group col-md-12' style='text-align:center;'> <h3> Cuenta x Pagar </h3> </div><div class='col-md-12'><hr></div>";
                 $Texto .= "<div class='form-group col-md-6'> <label> Proveedor: </label> $Nombre  </div>";
                 $Texto .= "<div class='form-group col-md-6'> <label> Fecha Registro: </label> $FechaOperacion </div> ";
                 $Texto .= "<div class='form-group col-md-12'> <label> Fecha de Vencimiento: </label> $FechaVencimiento   </div>";
                 $Texto .= "<div class='form-group col-md-6'> <label> Cantidad Productos: </label> $cantidadProduc </div> ";
                 $Texto .= "<div class='form-group col-md-6'> <label> Numero de Factura: </label> # $NumeroDoc </div> <div class='col-md-12'><hr></div>";

                 break;
         }


         if($ValorProductoDevuelto!="0"){
            $Texto .= "<div class='form-group col-md-6'> <label> Valor Factura: </label> <label style='color:green;'>$totalNeto</label> - <label style='color:#990000;'>($ValorProductoDevuelto)</label> </div>";
         }else{
            $Texto .= "<div class='form-group col-md-6'> <label> Valor Factura: </label> <label style='color:green;'>$totalNeto</label> </div>";
         }

         if($MontoDevolucion!="0"){
            $Texto .= "<div class='form-group col-md-6'> <label> Monto Pagado Factura: </label> <label style='color:green;'>$montoPagado</label> - <label style='color:#990000;'>($MontoDevolucion)</label> </div>";
         }else{
            $Texto .= "<div class='form-group col-md-6'> <label> Monto Pagado Factura: </label> <label style='color:green;'>$montoPagado</label> </div>";
         }

         if($MontoDevolucion!="0" OR $ValorProductoDevuelto!="0"){
            $Texto .= "<div class='form-group col-md-12'> <label style='color:#990000;'> *si aparece en rojo es que es la devolucion de un producto y de un monto de pago *</label></div>";
         }
         
         if($saldo>0){
            
            $Texto .= "<div class='form-group col-md-12'>  Saldo: <label style='color:blue;'>$saldo </label>  </div>";

            //volver json para el calendario
            $json[] = array(
                'title' => "{$Nombre} - [$TipoFactura]",
                'start' => "{$FechaOperacion}",
                'end' => "{$FechaOperacion}",
                'icon' => "{$Icono}",
                'descripcion' => "{$Texto}",
                'backgroundColor' => "{$Color}",
                'backgroundColorModal' => "{$ColorModal}",
                'textColor' => "black"

            );

         }
         

         
        //echo json_encode($json);
        

         

        

     
     }
     echo json_encode($json);
     
}

















// Ajax para el modal //

