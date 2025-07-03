<?php
        foreach ($Modulos_Podologia as $key => $Modulo) {
            if ($Modulo == "Tipo de Pie") {
                ?>
                <div class="container">
                    <div class="row text-center">

                <div class="col-md-2" style="position: relative;">
                    <input style="position: absolute; top: 0; left: 0;" type="checkbox" name="tipo_pie[]" value="<?= $Base ?>/img/egipcio.png">
                    <img style="display: block; margin-top: 20px;" src="<?= $Base ?>/img/egipcio.png" alt=""> Egipcio
                </div>
                <div class="col-md-2" style="position: relative;">
                    <input style="position: absolute; top: 0; left: 0;" type="checkbox" name="tipo_pie[]" value="<?= $Base ?>/img/romano.png">
                    <img style="display: block; margin-top: 20px;" src="<?= $Base ?>/img/romano.png" alt=""> Romano
                </div>
                <div class="col-md-2" style="position: relative;">
                    <input style="position: absolute; top: 0; left: 0;" type="checkbox" name="tipo_pie[]" value="<?= $Base ?>/img/griego.png">
                    <img style="display: block; margin-top: 20px;" src="<?= $Base ?>/img/griego.png" alt=""> Griego
                </div>
                <div class="col-md-2" style="position: relative;">
                    <input style="position: absolute; top: 0; left: 0;" type="checkbox" name="tipo_pie[]" value="<?= $Base ?>/img/germanico.png">
                    <img style="display: block; margin-top: 20px;" src="<?= $Base ?>/img/germanico.png" alt=""> Germanico
                </div>
                <div class="col-md-2" style="position: relative;">
                    <input style="position: absolute; top: 0; left: 0;" type="checkbox" name="tipo_pie[]" value="<?= $Base ?>/img/celta.png">
                    <img style="display: block; margin-top: 20px;" src="<?= $Base ?>/img/celta.png" alt=""> Celta
                </div>
        </div>
        </div>
            <?php
            }




            if ($Modulo == "Tipo de Planta de Pie") {
            ?>
                <div class="container">
                    <div class="row text-center">

                <div class="col-md-3" style="position: relative;">
                    <input style="position: absolute; top: 0; left: 0;" type="checkbox" name="planta_pie[]" value="<?= $Base ?>/img/plano.png">
                    <img style="display: block; margin-top: 20px;" src="<?= $Base ?>/img/plano.png" alt="">Plano
                </div>
                <div class="col-md-3" style="position: relative;">
                    <input style="position: absolute; top: 0; left: 0;" type="checkbox" name="planta_pie[]" value="<?= $Base ?>/img/normal.png">
                    <img style="display: block; margin-top: 20px;" src="<?= $Base ?>/img/normal.png" alt=""> Normal
                </div>
                <div class="col-md-3" style="position: relative;">
                    <input style="position: absolute; top: 0; left: 0;" type="checkbox" name="planta_pie[]" value="<?= $Base ?>/img/cavo.png">
                    <img style="display: block; margin-top: 20px;" src="<?= $Base ?>/img/cavo.png" alt=""> Cavo
                </div>
                </div>
        </div>
        </div>
                
        <?php
            }
        }
        ?>