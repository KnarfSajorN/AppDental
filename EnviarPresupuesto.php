<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");
 ?>

 
<?php

$idOperacion = $_GET['idOperacion'];
$usuario_id = $_SESSION['ID'];





$queryList=mysqli_query($conn3,"SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
              $idOperacion      =$rowMotorizado['idOperacion'];
              $numeroDoc      =$rowMotorizado['numeroDoc'];
              $idCliente      =$rowMotorizado['idCliente'];
              $idEmpresa      =$rowMotorizado['idEmpresa'];
              $fechaOperacion      =$rowMotorizado['fechaOperacion'];
              $fechaVencimiento      =$rowMotorizado['fechaVencimiento'];
              $subTotal      =$rowMotorizado['subTotal'];
              $impuesto      =$rowMotorizado['impuesto'];
              $totalNeto      =$rowMotorizado['totalNeto'];
              $totalBruto      =$rowMotorizado['totalBruto'];
              $cantidadProduc      =$rowMotorizado['cantidadProduc'];
              $descuentos      =$rowMotorizado['descuentos'];
              $montoPagado      =$rowMotorizado['montoPagado'];
              $nota      =$rowMotorizado['nota'];
            }

            $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $idCliente");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =rtrim($rowMotorizado['nombre_cliente']);
              $ciudad_cliente             =$rowMotorizado['ciudad_cliente'];

              $correo_cliente             =$rowMotorizado['correo_cliente'];
              $direccion_cliente          =$rowMotorizado['direccion_cliente'];
              $telefono_cliente           =$rowMotorizado['telefono_cliente'];
              $whatsapp           =$rowMotorizado['whatsapp'];

                
            }

            $queryList=mysqli_query($conn3,"SELECT * FROM  abono where  numero_operacion = '$idOperacion' AND id='$idAbono' ");
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

   ?>

<?php

echo '........'.$whatsapp;

$mensajeW = ' Sr(a) *'.$nombre_cliente .'* Se le ha generado un presupuesto por el valor de : *'.$totalNeto.'* *'.$Moneda.'* por favor firmar en el siguiente link para confirmar, Link:  '.$Base.'firma/FirmarPresupuesto/'.$idOperacion.' ';
$accion = 0;
Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $idCliente, $usuario_id, $whatsapp, $accion);

/*
$mensajeW_Doctor = "Este es el mensaje enviado al paciente : ".$mensajeW;

$whatsapp="51990385933";

Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW_Doctor, $idCliente, $usuario_id, $whatsapp, $accion);
*/




                echo "<script language='Javascript'> window.location='SclienteAdministracion_ControlPresupuesto';</script>"; 

              ?> 