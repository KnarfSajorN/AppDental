<?php
include 'header.php';
$clienteId = $_GET['clienteId'];
$idPlaca = $_GET['id'];

$EstadoPlaca = 34;
$estadoAusente = 4;
$piezaPLaca = 0;
$Ausente = 0;



// arreglo de los dientes para dibujar las tablas
$arregloPartes = [
  [18, 17, 16, 15, 14, 13, 12, 11, 21, 22, 23, 24, 25, 26, 27, 28],
  [null, null, null, 55, 54, 53, 52, 51, 61, 62, 63, 64, 65, null, null, null],
  [null, null, null, 85, 84, 83, 82, 81, 71, 72, 73, 74, 75, null, null, null],
  [48, 47, 46, 45, 44, 43, 42, 41, 31, 32, 33, 34, 35, 36, 37, 38],
];

$arregloPiezas = [
  [null, 1, null],
  [2, 3, 4],
  [null, 5, null],
];

$queryOdontoMaster = "SELECT * FROM odontogramaMasterPlaca WHERE idCliente = $clienteId and id = $idPlaca";
$resultOdontoMaster = mysqli_query($conn3, $queryOdontoMaster);
$rowOdontoMaster = [];
if ($resultOdontoMaster) {
  $rowOdontoMaster = mysqli_fetch_assoc($resultOdontoMaster);
}
?>

<body>
  <?php include 'menu.php' ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Escritorio </a></li>
      </ol>
    </section>
    <section class="content">
      <div class="card">
        <div class="card-header">
          Control de placa
        </div>
        <div class="card-body" style="overflow:auto;">

          <input type="hidden" id="idCliente" value="<?= $clienteId ?>">
          <input type="hidden" id="idUsuario" value="<?= $_SESSION['ID'] ?>">
          <input type="hidden" id="idPlaca" value="<?= $idPlaca ?>">
          <input type="hidden" id="EstadoPlaca" value="<?= $EstadoPlaca ?>">

          <table class="table table-secondary rounded" style="width:100%;">
            <tbody>
              <?php for ($i = 0; $i < count($arregloPartes); $i++) { ?>
                <tr>
                  <?php for ($j = 0; $j < count($arregloPartes[$i]); $j++) { ?>
                    <?php
                    //estado de la placa 38
                    if ($EstadoPlaca == explode(",", $rowOdontoMaster['o' . $arregloPartes[$i][$j]])[0]) {
                      $piezaPLaca++;
                    }
                    if ($EstadoPlaca == explode(",", $rowOdontoMaster['o' . $arregloPartes[$i][$j]])[1]) {
                      $piezaPLaca++;
                    }
                    if ($EstadoPlaca == explode(",", $rowOdontoMaster['o' . $arregloPartes[$i][$j]])[2]) {
                      $piezaPLaca++;
                    }
                    if ($EstadoPlaca == explode(",", $rowOdontoMaster['o' . $arregloPartes[$i][$j]])[3]) {
                      $piezaPLaca++;
                    }
                    if ($EstadoPlaca == explode(",", $rowOdontoMaster['o' . $arregloPartes[$i][$j]])[4]) {
                      $piezaPLaca++;
                    }
                    if ($EstadoPlaca == explode(",", $rowOdontoMaster['o' . $arregloPartes[$i][$j]])[5]) {
                      $piezaPLaca++;
                    }
                    //estados ausentes del diente 38
                    if ($estadoAusente == explode(",", $rowOdontoMaster['o' . $arregloPartes[$i][$j]])[0]) {
                      $Ausente++;
                    }
                    ?>
                    <td class="center text-center" style="width: <?= 100 / count($arregloPartes[$i]) ?>%;">
                      <?php if ($arregloPartes[$i][$j] != null) { ?>
                        <p class="m-0"><?= $arregloPartes[$i][$j] ?></p>
                        <a href="#" onclick="cargarParte('<?= $arregloPartes[$i][$j] ?>',0)"
                          style="width: 1cm; height:1.5cm; display: contents">
                          <input type="hidden" id="parte<?= $arregloPartes[$i][$j] ?>" value="<?= $arregloPartes[$i][$j] ?>">
                          <img src="Odontograma/oG0/<?= $arregloPartes[$i][$j] ?>.png" style="width: auto; height:1.5cm;">
                        </a>
                        <div class="mt-2">
                          <?php for ($k = 0; $k < count($arregloPiezas); $k++) { ?>
                            <div class="row">
                              <?php for ($l = 0; $l < count($arregloPiezas[$k]); $l++) { ?>
                                <?php if ($arregloPiezas[$k][$l] != null) { ?>
                                  <div class=""
                                    style="background-color:<?= funcionMaster(explode(",", $rowOdontoMaster['o' . $arregloPartes[$i][$j]])[$arregloPiezas[$k][$l]], 'id', 'color', 'OdontogramaEstados'); ?>;  height:<?= (10 / count($arregloPiezas[$k])) ?>mm;  width: <?= (100 / count($arregloPiezas[$k])) ?>%; cursor:pointer;"
                                    href="#" onclick="cargarParte('<?= $arregloPartes[$i][$j] ?>',<?= $arregloPiezas[$k][$l] ?>)">
                                  </div>
                                <?php } else { ?>
                                  <div style="width: <?= (100 / count($arregloPiezas[$k])) ?>%;"></div>
                                <?php } ?>
                              <?php } ?>
                            </div>
                          <?php } ?>
                        </div>
                      <?php } ?>
                    </td>
                  <?php } ?>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <?php

        //calculos del diente con placa
        $resultado = $piezaPLaca * 100; //superficie con placa
        $resultado2 = 52 - $Ausente;
        $resultado2 = $resultado2 * 4;
        //Total de los calculos
        $Total = $resultado / $resultado2;
        ?>
        <div class="card-footer">
          Calculo de indice
          <form action="OD_RegistrarPlaca" method="POST">
            <div class="row">

              <div class="col-md-6 center text-center">
                <label>
                  <h3> TOTAL : <?= number_format($Total); ?> % </h3>
                </label>
                <table border="2">
                  <tr>
                    <td align="center"><strong># de superficies con placa x 100</strong></td>
                    <td align="center"><strong>total de dientes presentes por 4</strong></td>
                  </tr>
                  <tbody>
                    <tr>
                      <td>
                        <input type="hidden" name="resultado" id="superficies" value="<?= $resultado; ?>">
                        <?= $resultado; ?>
                      </td>
                      <td>
                        <input type="hidden" name="resultado2" id="dientes_p" value="<?= $resultado2; ?>">
                        <?= $resultado2; ?>
                      </td>
                    </tr>
                  </tbody>
                </table>

                <input type="hidden" name="porcenaje" value="<?= $Total; ?>">
              </div>

              <div class='col-md-6'>
                <strong>OBSERVACIONES</strong>
                <input type="hidden" name="ID" value="<?= $_SESSION['ID'] ?>">
                <input type="hidden" name="clienteId" value="<?= $clienteId ?>">
                <input type="hidden" name="idPlaca" value="<?= $idPlaca ?>">
                <textarea name="Observaciones" id="Observacionse" class="form-control" rows="5"
                  placeholder="Digite sus Observaciones......">
                </textarea>
                <br>
                <button type="submit" name="Registrar" id="registros" value="Registrar"
                  class="btn btn-outline-info btn-block rounded-pill">
                  <i class="fa fa-save"></i>
                  Guardar
                </button>
              </div>


            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php include 'footer.php'; ?>
  <script src="apiVoz_3.2.js"></script>
  <?php include 'plantilla.php'; ?>
  <script type="text/javascript">
    function cargarDetalle() {
      var detalleOdontograma = $("#detalleOdontograma").val();
      var parteDetalleog = $("#parteDetalleog").val();
      var servicioAplicado = $("#servicioAplicado").val();
      var parteAplicada = $("#parteAplicada").val();
      var idCliente = $("#idCliente").val();

      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMasterDetalle.php",
        data: {
          detalleOdontograma: detalleOdontograma,
          parteDetalleog: parteDetalleog,
          idCliente: idCliente,
          servicioAplicado: servicioAplicado,
          parteAplicada: parteAplicada
        },
        success: function (response) {
          $('#cargarHistoriaDetalle').html(response);
        }
      });
    };

    function cargarParte(prt, pze) {
      let parte = prt;
      // let pze = (pze == '' ? 0 : pze);
      let idCliente = $("#idCliente").val();
      let idUsuario = $("#idUsuario").val();

      let idPlaca = $("#idPlaca").val();
      let EstadoPlaca = $("#EstadoPlaca").val();

      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: {
          parte: parte,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze: pze,
          idPlaca: idPlaca,
          EstadoPlaca: EstadoPlaca,
        },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    }
  </script>