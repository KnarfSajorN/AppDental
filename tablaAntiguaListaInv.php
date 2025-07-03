<div class="tab-content">

          <div class="tab-pane active" id="tab-eg-1" role="tabpanel">
            
            <div class="row">
              <div class="col-md-12">
                <table class="table table-striped table-bordered" id="example1">
                  //
                  ///$tableColumna = [
                    //'Referencia',
                  //   'Descripción',
                  //   'Tipo',
                  //   'Precio',
                  //   'Existencias Globales'
                    
                  // ]
                  // ?>
                  <thead>
                    <tr>
                       <?php
                      // foreach ($tableColumna as $columna) {
                      //   echo "<th>$columna</th>";
                      // }
                      ?> 
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    // function verificarRango($valor, $minimo, $maximo)
                    // {
                    //   if ($valor >= $minimo && $valor <= $maximo) {
                    //     return "#0080005c";
                    //   } else {
                    //     return "#ff000038";
                    //   }
                    // }

                    // $querysinvetrios = "SELECT * from sinvetrios where estado = 1";
                    // $resultsinvetrios = mysqli_query($conn3, $querysinvetrios);
                    // while ($rowsinvetrios = mysqli_fetch_assoc($resultsinvetrios)) {

                    //   $inventario_id = $rowsinvetrios['ID'];

                    //   $minimo = $rowsinvetrios['minimo'];
                    //   $maximo = $rowsinvetrios['maximo'];

                    //   $totalExistencia = "0";
                    //   $QueryInvDep = mysqli_query($conn3, "SELECT SUM(existencia) AS total_existencias FROM  SinvDep where idSinvetrios = '$inventario_id'");
                    //   $RowInvDep = mysqli_fetch_assoc($QueryInvDep);
                    //   $totalExistencia = $RowInvDep['total_existencias'];
                    //   if ($totalExistencia == "") {
                    //     $totalExistencia = "Sin Inventario";
                    //   }
                    //   $TipoInventarioCodigo = funcionMaster($rowsinvetrios['tipo'], 'id', 'tipo', 'scategoria');
                    //   if ($TipoInventarioCodigo == "2") {
                    //     $totalExistencia .= "<br>[Servicios]";
                    //   }

                    //   $Color = verificarRango($totalExistencia, $minimo, $maximo);
                    ?>
                      <tr class="center text-center">
                        <td style="background-color:<?= //$Color; ?>;"><?= $rowsinvetrios['referencia'] ?></td>
                        <td style="background-color:<?= //$Color; ?>;"><?= $rowsinvetrios['descripcion'] ?></td>
                        <td style="background-color:<?= //$Color; ?>;"><?= funcionMaster($rowsinvetrios['tipo'], 'id', 'descripcion', 'scategoria') ?></td>
                        <td style="background-color:<?= //$Color; ?>;">
                          <p class="text-primary"><strong><?= number_format($rowsinvetrios['precio'], decimales()) ?> <?= $moneda; ?> </strong></p>
                        </td>
                        <td style="background-color:<?= //$Color; ?>;">
                          <p class="text-primary"><strong><?= //$totalExistencia; ?> </strong></p>
                        </td>
                      </tr>
                    <?php
                    //}
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <?php
                      // foreach ($tableColumna as $columna) {
                      //   echo "<th>$columna</th>";
                      // }
                      ?>
                  </tfoot>
                </table>
              </div>
            </div>

          </div>
        </div>

        <input type="hidden" name="ID_Doctor" class="form-control input-lg input-lg" value="<?php //echo $_SESSION['ID'] ?>">

-->