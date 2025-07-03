<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/conn3.php");

$idOperacion = $_GET['idOperacion'];

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
// $nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $numeroDoc      = $rowMotorizado['numeroDoc'];
  $idCliente      = $rowMotorizado['idCliente'];
  $idEmpresa      = $rowMotorizado['idEmpresa'];
  $fechaOperacion = $rowMotorizado['fechaOperacion'];
  $fechaVencimiento = $rowMotorizado['fechaVencimiento'];
  $subTotal       = $rowMotorizado['subTotal'];
  $impuesto       = $rowMotorizado['impuesto'];
  $totalNeto      = $rowMotorizado['totalNeto'];
  $totalBruto     = $rowMotorizado['totalBruto'];
  $cantidadProduc = $rowMotorizado['cantidadProduc'];
  $descuentos     = $rowMotorizado['descuentos'];
  $montoPagado    = $rowMotorizado['montoPagado'];
  $nota    = $rowMotorizado['nota'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $idEmpresa");
// $nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $moneda = $rowMotorizado['moneda'];
  $impuestoF = $rowMotorizado['impuestoF'];

  // Nuevos campos

  $nombreF = $rowMotorizado['nombreF'];
  $telefonoF = $rowMotorizado['telefonoF'];
  $direccionF = $rowMotorizado['direccionF'];
  $emailF = $rowMotorizado['emailF'];
  $ciudadPaisF = $rowMotorizado['ciudadPaisF'];
  $licenciaF = $rowMotorizado['licenciaF'];
  $pieF = $rowMotorizado['pieF'];

  $LogoF               = $rowMotorizado['logoF'];

  if (strlen($LogoF) > 0) {
    $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" style="width:100%">';
  }



  // Nuevos campos 


}


$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $idEmpresa");
// $nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $empresaNombre      = $rowMotorizado['empresaNombre'];
  $pais               = $rowMotorizado['pais'];

  $ciudad             = $rowMotorizado['ciudad'];
  $direccion          = $rowMotorizado['direccion'];
  $telefono           = $rowMotorizado['telefono'];

  $nit                = $rowMotorizado['nit'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");
// $nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $nombre_cliente             = $rowMotorizado['nombre_cliente'];
  $ciudad_cliente             = $rowMotorizado['ciudad_cliente'];

  $correo_cliente             = $rowMotorizado['correo_cliente'];
  $direccion_cliente          = $rowMotorizado['direccion_cliente'];
  $telefono_cliente           = $rowMotorizado['telefono_cliente'];
}


$saldo = $totalNeto - $montoPagado;


if ($saldo == 0) {
  $pagado = '<div align="center" style="padding:1rem;"><img src="' . $Base . '/pagado.png" height="10%" width="30%"></div>';
}
?>



<style type="text/css">
  * {
    font-size: 12px;
    font-family: 'Times New Roman';
  }

  td,
  th,
  tr,
  table {
    border-top: 1px solid black;
    border-collapse: collapse;
  }

  td.description,
  th.description {
    width: 75px;
    max-width: 75px;
  }

  td.quantity,
  th.quantity {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
  }

  td.price,
  th.price {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
  }

  .centered {
    text-align: center;
    align-content: center;
  }

  .ticket {
    width: 155px;
    max-width: 155px;
  }

  img {
    max-width: inherit;
    width: inherit;
  }

  @media print {

    .hidden-print,
    .hidden-print * {
      display: none !important;
    }
  }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Factura # 0000<?=$numeroDoc?></title>
</head>

<body>
  <div class="ticket">
    <?php echo $Logo ?>
    <p class="centered">
      <?php echo $nombreF ?>
      FACTURA
      <br>
      <strong> <?php echo $nombreF ?></strong><br>
      <strong> <?php echo $licenciaF ?></strong><br>
      <?php echo $nit ?><br>
      <?php echo $direccionF ?> - <?php echo $ciudadPaisF ?><br>
      Teléfono: <?php echo $telefonoF ?><br>
      Email: <?php echo $emailF ?>
      <hr>
      CLIENTE
      <br>
      <strong><?php echo $nombre_cliente ?> </strong><br>
      <?php echo $direccion_cliente ?><br>
      <?php echo $ciudad_cliente ?><br>
      Teléfono: <?php echo $telefono_cliente ?><br>
      Email: <?php echo $correo_cliente ?>
      <hr>
      <b>Factura # 0000<?php echo $idOperacion ?></b><br>
      <br>

      <b>Fecha Factura:</b><?php echo $fechaOperacion ?><br>
      <b>Fecha Vencimiento:</b> <?php echo $fechaVencimiento ?><br>

      <?php echo $pagado ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Desc.</th>
          <th>
            <div align="Right">Cant.</div>
          </th>
          <th>
            <div align="Right">Sub. </div>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php


        $resultado = mysqli_query($conn3,"SELECT * FROM  sDetalleOper where estado = 1 and id_usuario = $idEmpresa and  id_cliente = $idCliente and idOperacion = $idOperacion order by id");
        //$resultado=mysqli_query($conn3,"select * from patients where ID_Doctor = '$ID_DOSTOR'");
        // $check = mysqli_num_rows($q);

        while ($fila = mysqli_fetch_array($resultado, MYSQLI_NUM)) {
          //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
          $Numero++;

          echo '     <tr>
                  <td  width="5%">' . $Numero . ' </td>
                  <td width="50%">' . $fila[5] . ' </td>
                  <td width="5%"><div align="left">' . $fila[4] . '</div></td>
                  <td width="20%"><div align="Right">' . number_format($fila[9],2) . ' ' . $moneda . '</div></td>
                 
                </tr>';

          $totalCant += $fila[4];
          $totalBase +=  $fila[9];
          $total += $fila[9];
        }

        ?>


      </tbody>
    </table>
    <table class="table">
      <tr>
        <th align="left" style="width:50%">Subtotal:</th>
        <td> <?php echo number_format($totalBase,2) ?> </td>
      </tr>

      <?php
      if ($impuestoF > 0) {
        $impuestoF2 = $impuestoF / 100;
        $total1 =  $total * $impuestoF2;
        $total =  $total1 + $total;


      ?>

        <tr>
          <th align="left" style="width:50%">Impuesto:</th>
          <td> <?php echo number_format($total1,2) ?> </td>
        </tr>

      <?php
      } ?>
      <!--
              <tr>
                <th align="left">Tax (9.3%)</th>
                <td>$10.34</td>
              </tr>
-->
      <tr>
        <th align="left">Pagado:</th>
        <td><?php echo number_format($montoPagado,2)  ?></td>
      </tr>
      <tr>
        <th align="left">Saldo:</th>
        <td><?php echo number_format($saldo,2)  ?></td>
      </tr>

      <tr>
        <th align="left">Total Facturado:</th>
        <td><?php echo number_format($totalNeto,2)  ?></td>
      </tr>
    </table>
    <hr>

    <p class="centered"><?php echo $pieF ?></p>
  </div>
  <button id="btnPrint" class="hidden-print">Imprimir!</button>
  <script src="script.js"></script>
</body>

</html>
<script type="text/javascript">
  const $btnPrint = document.querySelector("#btnPrint");
  $btnPrint.addEventListener("click", () => {
    window.print();
  });
</script>