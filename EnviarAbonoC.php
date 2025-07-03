<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");

$idAbono = $_GET['idAbono'];
$idOperacion = $_GET['idOperacion'];
$usuario_id = $_SESSION['ID'];





$queryList=mysqli_query($conn3,"SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
              $idOperacion      =$rowMotorizado['idOperacion'];  
              $idCliente      =$rowMotorizado['idCliente'];
              $idEmpresa      =$rowMotorizado['idEmpresa'];
            }

            $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $idCliente");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
              $nombre_cliente             =rtrim($rowMotorizado['nombre_cliente']);
              $whatsapp           =$rowMotorizado['whatsapp']; 
            }

            $queryList=mysqli_query($conn3,"SELECT * FROM  abonoC where  numero_operacion = '$idOperacion' AND id='$idAbono' ");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
              $id=$rowMotorizado['id'];
              $numero_operacion=$rowMotorizado['numero_operacion'];
              $fecha=$rowMotorizado['fecha'];
              $hora=$rowMotorizado['hora'];
              $valor_abonado=$rowMotorizado['valor_abonado'];
            }

            $Moneda = funcionMaster($idEmpresa,'ID_Usuario','moneda','config');



$mensajeW = ' Sr(a) *'.$nombre_cliente .'* Se le ha registrado una cuenta a cobrar por el valor de : *'.$valor_abonado.'* *'.$Moneda.'* 
por favor firmar en el siguiente link para confirmar el monto cancelado,
Link:  '.$Base.'firma/FirmarAbonoC/'.$idOperacion.'/'.$id.' ';
$accion = 0;
Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $idCliente, $usuario_id, $whatsapp, $accion);
echo "<script language='Javascript'> window.location='HistorialAbonoC?idOperacion=".$idOperacion."';</script>"; 

?> 