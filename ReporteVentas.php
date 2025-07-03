<?php

include ("funciones/funciones.php");
include ("funciones/conn3.php");

try {
    // header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
// header('Content-Disposition: attachment; filename=ReporteVentas.xls');


    $desde = $_POST['desde'];
    $hasta = $_POST['hasta'];

    $usuario = $_POST['usuario'];

    $salario_usuario = $_POST['salario'];
    $sucursal = $_POST['sucursal'];

    echo '<table border="1" cellpadding="2" cellspacing="0" width="100%">
  <tr>
    <td>id</td>
    <td>Numero de Factura</td>
    <td>Usuario</td>
    <td>Fecha</td>
    <td>Servicios</td>
    <td>Valor Total Comision</td>
    <td>Valor Total Factura</td>


  </tr>';
    if ($usuario != "0") {

        if ($sucursal != "0") {
            $QueryConsulta .= "AND sucursal = '{$sucursal}' ";
        }

        $Query = "SELECT * FROM sOperacionInv where fechaOperacion BETWEEN '$desde' and '$hasta' AND (idEmpresa = '$usuario' or idEmpresa = '{$_SESSION['ID_principal']}') and tipo = 1 $QueryConsulta";
        $queryListaf = mysqli_query($conn3, $Query);
        while ($rowListaf = mysqli_fetch_array($queryListaf)) {
            $descripcionFactura = "";
            $comision_total = "";
            $idOperacion = $rowListaf['idOperacion'];
            $numeroDoc = $rowListaf['numeroDoc'];
            $idEmpresa = $rowListaf['idEmpresa'];
            $NOMBRE_USUARIO = funcionMaster($idEmpresa, 'ID', 'NOMBRE_USUARIO', 'usuarios');
            $fechaOperacion = $rowListaf['fechaOperacion'];
            $subTotal = $rowListaf['totalNeto'];

            $ValorSalario = funcionMaster($idEmpresa, 'ID', 'salario', 'usuarios');

            $queryList = mysqli_query($conn3, "SELECT * FROM sDetalleOper where idOperacion = $idOperacion");
            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                $descripcionFactura .= $rowMotorizado['descripcion'] . ' , ';
                //$comision_total = $comision_total + $rowMotorizado['comision_total'];
                $comision_total = intval($comision_total) + round($rowMotorizado['subTotal'] * 0.15, 2);
            }


            //eliminar la ultima coma con trim 
            $descripcionFactura = trim($descripcionFactura, ' , ');

            $ValorFinal = $comision_total;
            echo " <tr>
        <td>$idOperacion </td>
        <td>$numeroDoc </td>
        <td>$NOMBRE_USUARIO </td>
        <td>$fechaOperacion </td>
        <td>$descripcionFactura </td>
        <td>$ValorFinal </td>
        <td>$subTotal </td>
        </tr>";
        }
        if ($salario_usuario != "0") {
            $ValorFinalTotal = $ValorSalario;
            echo " <tr>
        <td> </td>
        <td> </td>
        <td>$NOMBRE_USUARIO</td>
        <td> </td>
        <td> </td>
        <td>Salario</td>
        <td>$ValorSalario </td>
        
        </tr>";
        }


        //echo " <tr>
        //<td> </td>
        //<td> </td>
        //<td> </td>
        //<td> </td>
        //<td>Total</td>
        //<td>$ValorFinalTotal </td>
        //</tr>";

        echo "</table>";

    } else {
        /*
        if ($usuario_id != "0") {
          $QueryConsulta .= "AND idEmpresa = '{$usuario_id}' ";
        }
        */
        if ($sucursal != "0") {
            $QueryConsulta .= "AND sucursal = '{$sucursal}' ";
        }

        $Query = "SELECT * FROM sOperacionInv where fechaOperacion BETWEEN '$desde' and '$hasta' Group By idEmpresa";
        $queryListaf = mysqli_query($conn3, $Query);
        while ($rowListaf = mysqli_fetch_array($queryListaf)) {
            $idEmpresa = $rowListaf['idEmpresa'];
            $Query1 = "SELECT * FROM sOperacionInv where fechaOperacion BETWEEN '$desde' and '$hasta' AND idEmpresa = '$idEmpresa' $QueryConsulta ";
            $queryListaf1 = mysqli_query($conn3, $Query1);
            while ($rowListaf1 = mysqli_fetch_array($queryListaf1)) {
                $descripcionFactura = "";
                $comision_total = "";
                $idOperacion = $rowListaf1['idOperacion'];
                $numeroDoc = $rowListaf1['numeroDoc'];
                $NOMBRE_USUARIO = funcionMaster($idEmpresa, 'ID', 'NOMBRE_USUARIO', 'usuarios');
                $fechaOperacion = $rowListaf1['fechaOperacion'];
                $subTotal = $rowListaf1['totalNeto'];

                $idEmpresa = $rowListaf1['idEmpresa'];
                $ValorSalario = funcionMaster($idEmpresa, 'ID', 'salario', 'usuarios');

                $queryList = mysqli_query($conn3, "SELECT * FROM sDetalleOper where idOperacion = $idOperacion");
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $descripcionFactura .= $rowMotorizado['descripcion'] . ' , ';
                    //$comision_total = $comision_total + $rowMotorizado['comision_total'];
                    $comision_total = $comision_total + round($rowMotorizado['subTotal'] * 0.15, 2);
                }


                //eliminar la ultima coma con trim 
                $descripcionFactura = trim($descripcionFactura, ' , ');

                $ValorFinal = $comision_total;
                echo " <tr>
          <td>$idOperacion </td>
          <td>$numeroDoc </td>
          <td>$NOMBRE_USUARIO </td>
          <td>$fechaOperacion </td>
          <td>$descripcionFactura </td>
          <td>$ValorFinal </td>
          <td>$subTotal </td>
          </tr>";
            }
            if ($salario_usuario != "0") {
                $ValorFinalTotal = $ValorSalario;
                echo " <tr>
        <td> </td>
        <td> </td>
        <td>$NOMBRE_USUARIO</td>
        <td> </td>
        <td> </td>
        <td>Salario</td>
        <td>$ValorSalario </td>
        </tr>";
            }
            echo " <tr>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        </tr>";


            //echo " <tr>
            //<td> </td>
            //<td> </td>
            //<td> </td>
            //<td> </td>
            //<td>Total</td>
            //<td>$ValorFinalTotal </td>
            //</tr>";


        }
        echo "</table>";
    }
} catch (Exception | Error $th) {
    echo "{$th->getMessage()} - {$th->getFIle()}:{$th->getLine()}";
}