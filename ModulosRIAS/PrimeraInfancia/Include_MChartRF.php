<?php
$array = [
    "M‐CHAT‐R/F" => [
        0 => "Si usted señala  algo al otro lado de la habitación, ¿su hijo/a lo mira? (POR EJEMPLO, Si usted
            señala a un juguete, un peluche o un animal, ¿su hijo/a lo mira?)",
        1 => "2. ¿Alguna vez se ha preguntado si su hijo/a es sordo/a?",
        2 => "¿Su hijo/a juega juegos de fantasía o imaginación? (POR EJEMPLO, *hace como que* bebe de una taza vacía, habla por teléfono o da de comer a una muñeca o peluche,…)",
        3 => "¿A su hijo le gusta subirse a cosas? (POR EJEMPLO, a una silla, escaleras, o tobogán,…)",
        4 => "¿Hace su hijo/a movimientos inusuales con sus dedos cerca de sus ojos? (POR EJEMPLO,
            mueve sus dedos cerca de sus ojos de manera inusual?)",
        5 => "¿Su hijo/a señala con un dedo cuando quiere pedir algo o pedir ayuda? (POR EJEMPLO, señala
            un juguete o algo de comer que está fuera de su alcance?) ",
        6 => "Su hijo/a señala con un dedo cuando quiere mostrarle algo que le llama la atención? (POR
            EJEMPLO, señala un avión en el cielo o un camión  muy grande en la calle)",
        7 => "¿Su hijo/a se interesa en otros niños? (POR EJEMPLO, mira con atención a otros niños, les
            sonríe o se les acerca?)",
        8 => "¿Su hijo/a le muestra cosas acercándolas o levantándolas para que usted las vea – no para
            pedir ayuda sino solamente para compartirlas con usted? (POR EJEMPLO, le muestra una flor o
            un peluche o un coche de juguete)",
        9 => " ¿Su hijo/a responde cuando usted le llama por su nombre?  (POR EJEMPLO, se vuelve, habla
            o balbucea, o deja de hacer lo que estaba haciendo para mirarle?)",
        10 => "¿Cuándo usted sonríe a su hijo/a, él o ella también le sonríe?",
        11 => "¿Le molestan a su hijo/a ruidos cotidianos? (POR EJEMPLO, la aspiradora o la música, incluso
                cuando está no está excesivamente alta?)",
        12 => "¿Su hijo/a camina solo?",
        13 => "¿Su hijo/a le mira a los ojos cuando usted le habla, juega con él o ella, o lo viste?",
        14 => "¿Su hijo/a imita  sus movimientos? (POR EJEMPLO, decir adiós con la mano, aplaudir o algún
                ruido  gracioso que usted haga?)",
        15 => "Si usted se gira a ver algo, ¿su hijo/a trata de mirar hacia  lo que usted está mirando?",
        16 => "¿Su hijo/a intenta que usted le mire/preste atención? (POR EJEMPLO, busca que usted le
                haga un cumplido, o  le dice *mira* ó 'mírame')",
        17 => "¿Su hijo/a le entiende cuando usted le dice que haga algo? (POR EJEMPLO, si usted no hace
                gestos, ¿su hijo/a entiende *pon el libro encima de  la silla* o *tráeme la manta*?)",
        18 => "Si algo nuevo pasa, ¿su hijo/a le mira  para ver como usted reacciona al respecto? (POR
                EJEMPLO, si oye un ruido extraño o ve un juguete nuevo, ¿se gira a ver su cara?)",
        19 => "Le gustan a su hijo/a los juegos  de movimiento? (POR EJEMPLO, le gusta que le balancee, o
                que le haga  *el caballito* sentándole en sus rodillas)",
    ],
];

?>
<style type="text/css">
    .dlk-radio input[type="radio"],
    .dlk-radio input[type="checkbox"] {
        margin-left: -99999px;
        display: none;
    }

    .dlk-radio input[type="radio"]+.fa,
    .dlk-radio input[type="checkbox"]+.fa {
        opacity: 0.15
    }

    .dlk-radio input[type="radio"]:checked+.fa,
    .dlk-radio input[type="checkbox"]:checked+.fa {
        opacity: 1
    }

    .input-group {
        position: relative;
        display: flex;
        width: 100%;
    }
</style>
<script>
    const clearRadiomchart = (input) => {
        $(document.querySelectorAll(`.mChart${input}`)).prop('checked', false);
    }
</script>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <?php
$regisPEAD = array();
$acumQuest = 0;
foreach ($array as $key => $value) {
    $acumQuest++;
    $regisPEAD[$acumQuest] = [0, 0];
    $acum = 1;
    ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center" colspan="3"> Por favor responda a estas preguntas sobre su hijo/a. Tenga en cuenta cómo su hijo/a se comporta
                                habitualmente. Si usted ha visto a su hijo/a comportarse de una de estas maneras algunas veces, pero
                                no es un comportamiento habitual, por favor responda no.</th>
                        </tr>
                        <tr>
                            <th class="text-center" style="width: 16%;"> <i class="fa fa-trash btn btn-danger" onclick="clearRadiomchart(<?=$acumQuest?>)"> LIMPIAR</i> </th>
                            <th class="text-center" style="width: 68%;"><?=$key?></th>
                            <th class="text-center" style="width: 16%;"> </th>
                        </tr>
                        <!-- <tr>
                            <th class="text-center" style="width: 8%;">Rango de edad</th>
                            <th class="text-center" style="width: 8%;">Nº de ítem</th>
                            <th class="text-center" style="width: 68%;">Enunciado</th>
                            <th class="text-center" style="width: 8%;">1</th>
                            <th class="text-center" style="width: 8%;">0</th>
                        </tr> -->
                    </thead>
                    <tbody>
                        <?php
$posicion = (count($arrayRango) - 1);
    foreach ($value as $key2 => $value2) {?>
                            <tr>
                                <td class="text-center" style="width: 8%;"><?=$acum++;?></td>
                                <td class="text-center" style="width: 68%; word-break: break-all;"><?=$value2?></td>
                                <td class="text-center" colspan="2" style="width: 16%;">
                                    <div class=" btn-group">
                                        <label class="btn btn-default btn-sm">
                                            <input name="mChart<?=$acumQuest?>[mChart<?=($acum - 1)?>]" id="mChart<?=($acum - 1);?>" class="form-control mChart<?=$acumQuest?> MCHART_TABLA RequiredMCHART_Radio" type="radio" value="1" onchange="">
                                            <i class="fa fa-check glyphicon glyphicon-ok text-black"></i> <span class="text-black text-bold">Si</span>
                                        </label>
                                        <label class="btn btn-default btn-sm">
                                            <input name="mChart<?=$acumQuest?>[mChart<?=($acum - 1)?>]" id="mChart<?=($acum - 1);?>" class="form-control mChart<?=$acumQuest?> MCHART_TABLA RequiredMCHART_Radio" type="radio" value="0" onchange="">
                                            <i class="fa fa-times glyphicon glyphicon-remove text-black"></i> <span class="text-black text-bold">No</span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        <?php
}?>
                        <!-- <tr>
                            <td class="text-center text-bold" colspan="3" style="text-align: right;">Total Acumulado al inicio</td>
                            <td class="text-center text-bold" colspan="2" id="totalAcumIniciomChart<?=$acumQuest?>"></td>
                        </tr> -->
                    </tbody>
                </table>
            <?php
}
?>
        </div>

        <div class="col-md-12">
                                                            <br><br>
                                                            <hr>
                                                            <br><br>
                                                        </div>


                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h4 class="text-bold text-center">Interpretacion</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <table class="table table-hover">
                                                                <tbody>
                                                                    <tr>
                                                                        <td> Puntaje </td>
                                                                        <td> Interpretacion </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>
                                                                            0 - 2
                                                                        </td>
                                                                        <td>
                                                                            Bajo Riesgo
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            3 - 7
                                                                        </td>
                                                                        <td>
                                                                            Riesgo Medio
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            8 - 20
                                                                        </td>
                                                                        <td>
                                                                            Riesgo Alto
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <div class='form-group col-md-12'>
                                                                <label>Interpretacion</label><br>
                                                                <input type='text' id='Interpretacion_MCHART' name='ExamenFisico[ValoracionDesarollo][InterpretacionMCHART]' value='' class='form-control input-lg' readOnly >
                                                                <label>Puntaje</label><br>
                                                                <input type='text' id='Puntaje_MCHART' name='ExamenFisico[ValoracionDesarollo][PuntajeMCHART]' value='' class='form-control input-lg' readOnly >
                                                        </div>

                                                        <script>
                                                            function FuncionInterpretacionMCHART(className, textFieldId) {
                                                                var radios = document.querySelectorAll('.' + className);
                                                                var textField = document.getElementById(textFieldId);

                                                                radios.forEach(function(radio) {
                                                                    radio.addEventListener('change', function() {
                                                                        var sum = 0;
                                                                        radios.forEach(function(radio) {
                                                                            //console.log(radio);
                                                                            if (radio.checked && radio.value !== "") {
                                                                                sum += parseInt(radio.value); // Suma el valor si está marcado
                                                                            }
                                                                        });

                                                                        textField.value = sum; // Asigna la suma al campo de texto

                                                                        InterpretacionMCHART();
                                                                    });
                                                                });


                                                            }

                                                            FuncionInterpretacionMCHART('MCHART_TABLA', 'Puntaje_MCHART');

                                                            function InterpretacionMCHART() {

                                                                var puntaje = document.getElementById('Puntaje_MCHART').value;

                                                                var interpretacion = '';

                                                                // Filtrar los puntajes
                                                                if (puntaje >= 8 && puntaje <= 20) {
                                                                    interpretacion = 'Riesgo Alto';
                                                                } else if (puntaje >= 3 && puntaje <= 7) {
                                                                    interpretacion = 'Riesgo Medio';
                                                                } else if (puntaje >= 0 && puntaje <= 2) {
                                                                    interpretacion = 'Bajo Riesgo';
                                                                } 

                                                                document.getElementById('Interpretacion_MCHART').value = interpretacion;
                                                            }

                                                        </script>
    </div>
</div>

<?php
/*
<div class="col-md-12">
<div class="row">
<div class="col-md-12">
<?php
$regisPEAD = array();
$acumQuest = 0;
foreach ($array as $key => $value) {
$acumQuest++;
$regisPEAD[$acumQuest] = [0, 0];
$acum = 1;
?>
<table class="table">
<thead>
<tr>
<th class="text-center" style="width: 16%;"> <i class="fa fa-trash btn btn-danger" onclick=""> LIMPIAR</i> </th>
<th class="text-center" style="width: 68%;">Entrevista de Seguimiento al M‐CHAT‐R/F™ Hoja de Puntuación</th>
<th class="text-center" style="width: 16%;"> </th>
</tr>
<tr>
<th class="text-center" colspan="3"> Por favor tenga en cuenta: Sí/No han sido sustituidos por Pasa/No Pasa </th>
</tr>
</thead>
<tbody>
<?php
$posicion = (count($arrayRango) - 1);
foreach ($value as $key2 => $value2) { ?>
<tr>
<td class="text-center" style="width: 8%;"><?= $acum++; ?></td>
<td class="text-center" style="width: 68%; word-break: break-all;"><?= $value2 ?></td>
<td class="text-center" colspan="2" style="width: 16%;">
<div class="dlk-radio btn-group">
<label class="btn btn-default btn-sm">
<input name="mChart2<?= $acumQuest ?>[mChart2<?= ($acum - 1) ?>]" id="mChart2<?= ($acum - 1); ?>" class="form-control mChart2<?= $acumQuest ?>" type="radio" value="1" onchange="">
<i class="fa fa-check glyphicon glyphicon-ok text-black"></i> <span class="text-black text-bold">Pasa</span>
</label>
<label class="btn btn-default btn-sm">
<input name="mChart2<?= $acumQuest ?>[mChart2<?= ($acum - 1) ?>]" id="mChart2<?= ($acum - 1); ?>" class="form-control mChart2<?= $acumQuest ?>" type="radio" value="0" onchange="">
<i class="fa fa-times glyphicon glyphicon-remove text-black"></i> <span class="text-black text-bold">No Pasa</span>
</label>
</div>
</td>
</tr>
<?php
} ?>
<tr>
<td class="text-center text-bold" colspan="3" style="text-align: right;">Puntuacion</td>
<td class="text-center text-bold" colspan="2"  id="totalAcumIniciomChart2<?= $acumQuest ?>"></td>
</tr>
</tbody>
</table>
<?php
}
?>
</div>
</div>
</div>
 */
?>