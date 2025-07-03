<?php
date_default_timezone_set('America/Bogota');
include("../funciones/conn3.php");
include("../funciones/funciones.php");
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
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="padding:15px;">
<div class="row">
<?php

$ID = $_SESSION['ID'];
$Comprobante_id = $_GET["Comprobante_id"];

$queryList=mysqli_query($conn3,"SELECT * from CCompDiario WHERE id = '$Comprobante_id'");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
  $idCC=$rowMotorizado['id'];
  $numeroCC=$rowMotorizado['numero'];
  $fechaCC=$rowMotorizado['fecha'];
  $tipoCC=$rowMotorizado['tipo'];
  $estadoCC=$rowMotorizado['estado'];
  $descripcionCC=$rowMotorizado['descripcion'];
  $monto_debeCC=$rowMotorizado['monto_debe'];
  $monto_haberCC=$rowMotorizado['monto_haber'];
  $cant_movimientosCC=$rowMotorizado['cant_movimientos'];
  $detalladaCC=$rowMotorizado['detallada'];
  $idCentroCostoCC=$rowMotorizado['idCentroCosto'];

  $tipo_tercero = $rowMotorizado['tipo_tercero'];
  $tercero_id = $rowMotorizado['tercero_id'];
  if($tipo_tercero==1){
    include 'funciones/conn3.php';
    $tipotercerotexto = "Clientes";
    $queryList1 = mysqli_query($conn3, "SELECT * FROM cliente where cliente_id = '$tercero_id'");
    while($row1 = mysqli_fetch_array($queryList1)) {
        $nombretercero = $row1['nombre_cliente'];
    }

}
elseif($tipo_tercero==2){
    $tipotercerotexto = "Proveedores";
    $queryList1 = mysqli_query($conn3, "SELECT * FROM sproveedores where id = '$tercero_id' ");
    while($row1 = mysqli_fetch_array($queryList1)) {
        $nombretercero = $row1['nombre'];
    }
}

  echo '
  <div class="modal-body">
  <div class="col-md-12 row">
  <div class="col-md-6 mt-3">
  <label>Numero<strong class="text-danger"></strong></label><br>
  <input type="text" disabled class="form-control input-lg" value="'.$numeroCC.'">
  </div>
  <div class="col-md-6 mt-3">
  <label>Fecha<strong class="text-danger"></strong></label><br>
  <input type="text" disabled class="form-control input-lg" value="'.$fechaCC.'">
  </div>
  <div class="col-md-6 mt-3">
  <label>Descripción<strong class="text-danger"></strong></label><br>
  <input type="text" disabled class="form-control input-lg" value="'.$descripcionCC.'">
  </div>
  <div class="col-md-6 mt-3">
  <label>Monto Debe<strong class="text-danger"></strong></label><br>
  <input type="text" disabled class="form-control input-lg" value="'.$monto_debeCC.'">
  </div>
  <div class="col-md-6 mt-3">
  <label>Monto Haber<strong class="text-danger"></strong></label><br>
  <input type="text" disabled class="form-control input-lg" value="'.$monto_haberCC.'">
  </div>
  <div class="col-md-6 mt-3">
  <label>Cantidad de Movimientos<strong class="text-danger"></strong></label><br>
  <input type="text" disabled class="form-control input-lg" value="'.$cant_movimientosCC.'">
  </div>

  <div class="col-md-6 mt-3">
  <label>Tipo Tercero <strong class="text-danger"></strong></label><br>
  <input type="text" disabled class="form-control input-lg" value="'.$tipotercerotexto.'">
  </div>

  <div class="col-md-6 mt-3">
  <label>Nombre Tercero <strong class="text-danger"></strong></label><br>
  <input type="text" disabled class="form-control input-lg" value="'.$nombretercero.'">
  </div>
  

  ';
  $queryList2=mysqli_query($conn3,"SELECT * FROM CcentroCostos where id='$idCentroCostoCC'");
  $nrowl2=mysqli_num_rows($queryList2);
  while($row_recordset322=mysqli_fetch_array($queryList2))
  {
    $idCCC=$row_recordset322['id'];
    $descripcionCCC=$row_recordset322['descripcion'];
    echo'<div class="col-md-12 mt-3">
    <label>Centro de Costos<strong class="text-danger"></strong></label><br>';
    echo '<input type="text" disabled class="form-control input-lg" value="'.$descripcionCCC.'">';
    echo'</div>';
  } 

  echo'
  <div class="col-md-12">
  <hr>
  </div>';

  echo'
  <div class="col-md-2">
  <label>Cuenta Contable<strong class="text-danger"></strong></label><br>
  </div>
  <div class="col-md-4">
  <label>Descripción M.<strong class="text-danger"></strong></label><br>
  </div>
  <div class="col-md-2">
  <label>Referencia<strong class="text-danger"></strong></label><br>
  </div>
  <div class="col-md-2">
  <label>Debe<strong class="text-danger"></strong></label><br>
  </div>
  <div class="col-md-2">
  <label>Haber<strong class="text-danger"></strong></label><br>
  </div>
  ';


  //$queryList4=mysqli_query($conn3,"SELECT * FROM CCompDiarioMov where numero = '$numeroCC' and idComprobante='$idCC' ");
  //$queryList4=mysqli_query($conn3,"SELECT * FROM CCompDiarioMov where numero = '$numeroCC' ");
  $queryList4=mysqli_query($conn3,"SELECT * FROM CCompDiarioMov where idComprobante = '$idCC' ORDER BY id ASC");
  $nrowl4=mysqli_num_rows($queryList4);
  while($row_recordset324=mysqli_fetch_array($queryList4))
  {
    $idCCM=$row_recordset324['id'];
    $numeroCCM=$row_recordset324['numero'];
    $fechaCCM=$row_recordset324['fecha'];
    $tipoCCM=$row_recordset324['tipo'];
    $estadoCCM=$row_recordset324['estado'];
    $asientoCCM=$row_recordset324['asiento'];
    $cuentaCCM=$row_recordset324['cuenta'];
    $id_ccostoCCM=$row_recordset324['id_ccosto'];
    $descripcionCCM=$row_recordset324['descripcion'];
    $monto_debeCCM=$row_recordset324['monto_debe'];
    $monto_haberCCM=$row_recordset324['monto_haber'];
    $referenciaCCM=$row_recordset324['referencia'];
    $idComprobanteCCM=$row_recordset324['idComprobante'];

    echo'
    <div class="col-md-2">
    <p><input disabled type="text" class="input-lg form-control" value="'.$cuentaCCM.'"></p>
    </div>
    <div class="col-md-4">
    <p><input disabled type="text" class="input-lg form-control" value="'.$descripcionCCM.'"></p>
    </div>
    <div class="col-md-2">
    <p><input disabled type="text" class="input-lg form-control" value="'.$referenciaCCM.'"></p>
    </div>
    <div class="col-md-2">
    <p><input disabled type="text" class="input-lg form-control" value="'.$monto_debeCCM.'"></p>
    </div>
    <div class="col-md-2">
    <p><input disabled type="text" class="input-lg form-control" value="'.$monto_haberCCM.'"></p>                                    
    </div>
    ';
  }

}
?>

</body>

  <script type="text/javascript">
    printHTML();

    function printHTML() {
        if (window.print) {
            window.print();
        }
    }
</script>