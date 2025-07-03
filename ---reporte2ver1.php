<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
// $con = conectar();
$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
session_start();
$idUsuarioP = $_SESSION['ID_principal'];
$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$tipo = $_POST['tipo'];
$ID = $_SESSION['ID'];

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $ID");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $empresaNombre      = $rowMotorizado['nombreF'];
  $LogoF               = $rowMotorizado['logoF'];

  if (strlen($LogoF) > 0) {
    $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" height="10%" width="10%">';
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $empresaNombre ?> </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
  <!-- Main content -->
  <div class="row no-print">
    <div class="col-xs-12">
      <a href="<?php echo $Base; ?>Reportesfacturacion" class="btn btn-default"> Regresar</a>
      <a href='javascript:window.print(); void 0;' class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
    </div>
  </div>
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <?php echo $Logo ?> <?php echo $empresaNombre ?>
        <small class="pull-right"> Fecha: <?php echo date("d-m-y") ?></small>
      </h2>
    </div>

    <div class="col-xs-12">

      <?php echo 'Desde: ' . $desde . '<br> Hasta:' . $hasta ?>
      <?php
    $docName = funcionMaster($tipo, 'ID', 'NOMBRE_USUARIO', 'usuarios');
      if ($_POST['tipo'] <> 0) {
        echo '<br>Doctor: ' . $docName;
      } elseif ($_POST['tipo'] == 0) {
        echo '<br> Todos';
      }
      ?>


    </div>


    <!-- /.col -->
  </div>
  <!-- info row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12 ">
      <table class="table  table-bordered table-light" >
        <thead>
          <tr style="background: #A4A4A4">

            <th> No.factura </th>
            <th> Paciente </th>
            <th> Fecha </th>
            <th> Cant. </th>
            <th> Sub total </th>
            <th> Monto pagado </th>
            <th> Metodo de pago</th>
            <th> Total </th>
            <th> Descripcion </th>




          </tr>
        </thead>
        <tbody>
          <?php
          if ($tipo == 0) {

            
            $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where ID_principal = $idUsuarioP and fechaOperacion BETWEEN '$desde' and '$hasta' and tipo IN (1, 7) ");
            } elseif ($tipo <> 0) {

            $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv  where ID_principal = $idUsuarioP and idEmpresa =$tipo and fechaOperacion BETWEEN '$desde' and '$hasta' and tipo IN (1, 7) ");
            }

          $nrowl = mysqli_num_rows($queryList);
          while ($rowMotorizado = mysqli_fetch_array($queryList)) {

            $fechaOperacion           = $rowMotorizado['fechaOperacion'];
            $numeroDoc                = $rowMotorizado['numeroDoc'];
            $subTotal                 = $rowMotorizado['subTotal'];
            $impuesto                 = $rowMotorizado['impuesto'];
            $totalBruto               = $rowMotorizado['totalBruto'];
            $descuentos               = $rowMotorizado['descuentos'];
            $totalNeto                = $rowMotorizado['totalNeto'];
            $montoPagado              = $rowMotorizado['montoPagado'];
            $cantidadProduc           = $rowMotorizado['cantidadProduc'];
            $idCliente                = $rowMotorizado['idCliente'];
            $idOperacion              = $rowMotorizado['idOperacion'];
            // $FacPre                   = $rowMotorizado['FacPre'];
            
            
// if($FacPre == 1){
//   $facpre='Factura';
// }elseif($FacPre == 2){
//   $facpre='Presupuesto';
// }
            //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
            $Numero++;
            
            $queryListCli = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");
            $nrowl = mysqli_num_rows($queryListCli);
            while ($rowCli = mysqli_fetch_array($queryListCli)) {
              $nombre_cliente      = $rowCli['nombre_cliente'];
            }   
            $resultado = mysqli_query($conn3,"SELECT * FROM  sDetalleOper where   id_usuario = $ID and  id_cliente = $idCliente and idOperacion = 6 order by id");
            while ($fila = mysqli_fetch_assoc($resultado)) {
              //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
              $Numero++;
              $total += $fila[9];
            }
            
            $MetodosPago = "";
            $QueryMetodosPago = mysqli_query($conn3, "SELECT * FROM  sDetalleMetodosPagos where idOperacion = $idOperacion");
            while ($rowMetodosPago = mysqli_fetch_array($QueryMetodosPago)) {
              $MetodosPago .= funcionMaster($rowMetodosPago['metodo_pago'], 'id', 'Nombre', 'Medios_Pago') . "<br>";
            }
            
            // SI LA FACTURA FUE GENERADA DE UN PRESUPUESTO 
            // DEBEMOS REVISAR LOS ABONOS Y NO EL HISTORIAL TIPOS DE PAGO
            // LOS TIPOS DE PAGO NO ESTAN TRABAJADOS EN LOS ABONOS DE PRESUPUESTOS
            $abonos = mysqli_query($conn3, "SELECT * FROM abono WHERE numero_operacion = $idOperacion AND activo = 1");
            if (mysqli_num_rows($abonos) > 0) {
              while ($filaTP = mysqli_fetch_array($abonos)) {
                $MetodosPago .= funcionMaster($filaTP['pago'], 'id', 'Nombre', 'Medios_Pago') . "<br>";
              }
            }
            
            if ($MetodosPago == "") {
              $MetodosPago = "Ninguno";
            }

            $devolucion = "";
            $queryListCli = mysqli_query($conn3, "SELECT * FROM sOperacionInvDevolucion where idOperacion_principal = $idOperacion");
            $nrowl = mysqli_num_rows($queryListCli);
            while ($rowCli = mysqli_fetch_array($queryListCli)) {
              $devolucion      = $rowCli['totalBruto'];
              if ($devolucion == "") {
                $devolucion = "0";
              }
            }

            echo '     <tr>
                  <td width="1%">' . $numeroDoc . ' </td>
                  <td width="10%">' . $nombre_cliente . ' </td>
                  <td width="5%">' . $fechaOperacion . ' </td>
                  <td width="2%">' . $cantidadProduc . '  </td>
                  <td width="5%">' . $totalBruto . ' </td>
                  <td width="5%">' . $montoPagado . ' </td>
                  <td width="10%">' . $MetodosPago . ' </td>
                  <td width="10%">' . $totalNeto . ' </td>
                  <td width="10%">';
                        $resultado1 = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where  idOperacion = $idOperacion  ");
                        $descripciones = ""; // Variable para almacenar las descripciones
                        while ($fila2 = mysqli_fetch_array($resultado1)) {
                            
                            $descripcion = $fila2['descripcion'];
                            $comision_total = $fila2['comision_total'];


                            // Concatenar las descripciones separadas por una coma
                            if ($descripciones != "") {
                                $descripciones .= ", ";
                            }
                            $descripciones .= $descripcion;
                        }

                        echo utf8_encode($descripciones); // Mostrar todas las descripciones

                        echo '</td>
                        
                </tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <!-- /.content -->
  </div>
  <!-- ./wrapper -->
</body>

</html>
<style>
  @media print {
    .no-print {
      display: none;
    }
  }
</style>