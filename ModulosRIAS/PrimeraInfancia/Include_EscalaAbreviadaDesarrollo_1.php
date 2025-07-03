<?php
function calculaEdadYMD($fechanacimiento, $modo, $formato = 1)
{
    list($y, $m, $d) = explode("-", $fechanacimiento);
    $restaM = date("m") - $m;
    $restaD = date("d") - $d;
    $restaM = ($restaM < 0 ? (12 - ($restaM * -1)) : (($restaM >= 0) ? $restaM : 0));
    (($restaD < 0) ? $restaM-- : '');
    $restaD = ($restaD < 0 ? (date("t", strtotime($fechanacimiento)) - ($restaD * -1)) : (($restaD >= 0) ? $restaD : 0));
    $restaY = (($restaD < 0 || $restaM < 0) ? ((date("Y") - $y) - 1) : (date("Y") - $y));
    // formato = 1 texto, formato = 2 json
    // 2022 - 1996 = 26 - 1 = 25
    // 07 - 10 = 12 - 3 = 9
    // 01 - 04 = 31 - 3 = 28 
    // Para imprimir los valores que necesites debes expresarlo en "y-m-d"
    // calculaEdadYMD('1996-10-04', 'y-m-d')
    // Resp: 25 Años 9 Meses 28 Días
    // No estan limitados por el orden, solo anexar y m o d segun necesiten
    // IMPORTANTE siempre divirdir por guiones(-)
    $modo = explode("-", $modo);
    $record = 0;
    $variableReturn = ($formato == 1 ? '' : ($formato == 2 ? array() : ''));
    do {
        switch ($modo[$record]) {
            case 'y':
                if ($restaY != "" && $restaY > 0 && $formato == 1) {
                    $variableReturn .= $restaY . ($restaY > 0 && $restaY < 2 ? " Año " : ($restaY >= 0 ? " Años " : ''));
                } else if ($formato == 2) {
                    $variableReturn['y'] = $restaY;
                }
                break;
            case 'm':
                if ($restaM != "" && $restaM > 0 && $formato == 1) {
                    $variableReturn .= $restaM . ($restaM > 0 && $restaM < 2 ? " Mes " : ($restaM >= 0 ? " Meses " : ''));
                } else if ($formato == 2) {
                    $variableReturn['m'] = $restaM;
                }
                break;
            case 'd':
                if ($restaD != "" && $restaD > 0 && $formato == 1) {
                    $variableReturn .= $restaD . (($restaD > 0 && $restaD < 2) ? " Día " : ($restaD >= 0 ? " Días " : ''));
                } else if ($formato == 2) {
                    $variableReturn['d'] = $restaD;
                }
                break;
            default:
                $variableReturn = 'Parametros correctos: (y-m-d), no estan limitados por el Orden';
                break;
        }
        $record++;
    } while ($record < count($modo));
    return ($formato == 1 ? $variableReturn : ($formato == 2 ? (object) $variableReturn : $variableReturn));
}
// $fechaNacimiento = "2021-01-22";
// echo $fechaNacimiento;
$edadArray = calculaEdadYMD($fechaNacimiento, 'y-m-d', 2);
// var_dump($edadArray);
// echo $m = (($edadArray->y * 12) + $edadArray->m);
// echo $d = $edadArray->d;
function escala($valor, $valor2)
{
    $edadArray = calculaEdadYMD($valor2, 'y-m-d', 2);
    $m = (($edadArray->y * 12) + $edadArray->m);
    $d = $edadArray->d;
    if (($m == 1 && $d == 0 || $m == 0 && $d >= 0) && $valor == 1) : return true;
    elseif (($m == 3 && $d == 0 || ($m >= 1 && $m < 3) && ($m > 1 ? $d >= 0 : $d >= 1)) && $valor == 2) :  return true;
    elseif (($m == 6 && $d == 0 || ($m >= 3 && $m < 6) && ($m > 3 ? $d >= 0 : $d >= 1)) && $valor == 3) :  return true;
    elseif (($m == 9 && $d == 0 || ($m >= 6 && $m < 9) && ($m > 6 ? $d >= 0 : $d >= 1)) && $valor == 4) :  return true;
    elseif (($m == 12 && $d == 0 || ($m >= 9 && $m < 12) && ($m > 9 ? $d >= 0 : $d >= 1)) && $valor == 5) :  return true;
    elseif (($m == 18 && $d == 0 || ($m >= 12 && $m < 18) && ($m > 12 ? $d >= 0 : $d >= 1)) && $valor == 6) :  return true;
    elseif (($m == 24 && $d == 0 || ($m >= 18 && $m < 24) && ($m > 18 ? $d >= 0 : $d >= 1)) && $valor == 7) :  return true;
    elseif (($m == 36 && $d == 0 || ($m >= 24 && $m < 36) && ($m > 24 ? $d >= 0 : $d >= 1)) && $valor == 8) :  return true;
    elseif (($m == 48 && $d == 0 || ($m >= 36 && $m < 48) && ($m > 36 ? $d >= 0 : $d >= 1)) && $valor == 9) :  return true;
    elseif (($m == 60 && $d == 0 || ($m >= 48 && $m < 60) && ($m > 48 ? $d >= 0 : $d >= 1)) && $valor == 10) :  return true;
    elseif (($m == 72 && $d == 0 || ($m >= 60 && $m < 72) && ($m > 60 ? $d >= 0 : $d >= 1)) && $valor == 11) :  return true;
    elseif (($m == 84 && $d == 0 || ($m >= 72 && $m < 84) && ($m > 72 ? $d >= 0 : $d >= 1)) && $valor == 12) :  return true;
    endif;
    return false;
}

$array = [
    "MOTRICIDAD GRUESA" => [
        0 => [
            "Realiza reflejo de búsqueda y reflejo de succión.",
            "El reflejo de moro está presente y es simétrico.",
            "Mueve sus extremidades.",
        ],
        1 => [
            "Sostiene la cabeza al levantarlo de los brazos.",
            "Levanta la cabeza y pecho en prono.",
            "Gira la cabeza desde la línea media.",
        ],
        2 => [
            "Control de cabeza sentado con apoyo.",
            "Se voltea.",
            "Se mantiene sentado momentáneamente.",
        ],
        3 => [
            "Se mantiene sentado sin apoyo.",
            "Adopta la posición de sentado.",
            "Se arrastra en posición prono.",
        ],
        4 => [
            "Gatea con desplazamiento cruzado (alternando rodillas y manos)",
            "Adopta posición bípeda y se sostiene de pie con apoyo.",
            "Se sostiene de pie sin apoyo.",
        ],
        5 => [
            "Se pone de pie sin ayuda.",
            "Da pasos solo(a).",
            "Camina con desplazamiento cruzado sin ayuda (alternando brazos y pies).",
        ],
        6 => [
            "Corre.",
            "Lanza la pelota.",
            "Patea la pelota.",
        ],
        7 => [
            "Salta con los pies juntos.",
            "Se empina en ambos pies.",
            "Sube dos escalones sin apoyo.",
        ],
        8 => [
            "Camina en puntas de pies.",
            "Se para en un solo pie.",
            "Baja dos escalones con apoyo mínimo, alternando los pies.",
        ],
        9 => [
            "Camina sobre una línea recta sin apoyo visual.",
            "Salta en tres o más ocasiones en un pie.",
            "Hace rebotar y agarra la pelota.",
        ],
        10 => [
            "Hace “caballitos” (alternando los pies).",
            "Salta de lado a lado de una línea con los pies juntos.",
            "Salta desplazándose con ambos pies.",
        ],
        11 => [
            "Mantiene el equilibrio en la punta de los pies con los ojos cerrados.",
            "Realiza saltos alternados en secuencia.",
            "Realiza alguna actividad de integración motora.",
        ],
    ],
    "MOTRICIDAD FINO ADAPTATIVA" => [
        0 => [
            "Reflejo de prensión palmar.",
            "Reacciona ante luz y sonidos.",
            "Sigue movimiento horizontal.",
        ],
        1 => [
            "Abre y mira sus manos.",
            "Sostiene objeto en la mano.",
            "Se lleva un objeto a la boca.",
        ],
        2 => [
            "Agarra objetos voluntariamente.",
            "Retiene un objeto cuando se lo intentan quitar.",
            "Pasa objeto de una mano a otra.",
        ],
        3 => [
            "Sostiene un objeto en cada mano.",
            "Deja caer los objetos intencionalmente.",
            "Agarra con pulgar e índice (pinza).",
        ],
        4 => [
            "Agarra tercer objeto sin soltar otros.",
            "Saca objetos del contenedor.",
            " Busca objetos escondidos.",
        ],
        5 => [
            "Hace torre de tres cubos.",
            "Pasa hojas de un libro.",
            "Agarra una cuchara y se la lleva a la boca.",
        ],
        6 => [
            "Garabatea espontáneamente.",
            "Quita la tapa del contenedor o frasco de muestra de orina.",
            "Hace torre de cinco cubos.",
        ],
        7 => [
            "Ensarta cuentas perforadas con pinza.",
            "Rasga papel con pinza de ambas manos.",
            "Copia línea horizontal y vertical.",
        ],
        8 => [
            "Hace una bola de papel con sus dedos.",
            "Copia círculo.",
            "Figura humana rudimentaria.",
        ],
        9 => [
            "Imita el dibujo de una escalera.",
            "Corta papel con las tijeras.",
            "Figura humana 2.",
        ],
        10 => [
            "Dibuja el lugar en el que vive.",
            "Modelo de cubos “escalera”.",
            "Copia un triángulo.",
        ],
        11 => [
            "Copia una figura de puntos.",
            "Puede hacer una figura plegada.",
            "Ensarta cordón cruzado (como amarrarse los zapatos).",
        ],
    ],
    "AUDICIÓN Y LENGUAJE" => [
        0 => [
            "Se sobresalta con un ruido.",
            "Contempla momentáneamente a una persona.",
            "Llora para expresar necesidades.",
        ],
        1 => [
            "Se tranquiliza con la voz humana.",
            "Produce sonidos guturales indiferenciados.",
            "Busca el sonido con la mirada.",
        ],
        2 => [
            "Busca diferentes sonidos con la mirada.",
            "Pone atención a la conversación.",
            "Produce cuatro o más sonidos diferentes.",
        ],
        3 => [
            "Pronuncia tres o más sílabas.",
            "Reacciona cuando se le llama por su nombre.",
            "Reacciona a tres palabras familiares.",
        ],
        4 => [
            "Reacciona a la palabra no.",
            "Llama al cuidador.",
            "Responde a una instrucción sencilla.",
        ],
        5 => [
            "Aproximación a una palabra con intención comunicativa.",
            "Reconoce al menos 6 objetos o imágenes.",
            "Sigue instrucciones de dos pasos.",
        ],
        6 => [
            "Nombre cinco objetos de una imagen.",
            "Utiliza más de 20 palabras.",
            "Usa frases de dos palabras.",
        ],
        7 => [
            "Dice su nombre completo.",
            "Dice frases de 3 palabras.",
            "Reconoce cualidades de los objetos.",
        ],
        8 => [
            "Define por su uso cinco objetos.",
            "Hace comparativos.",
            "Describe el dibujo.",
        ],
        9 => [
            "Reconoce 5 colores.",
            "Responde tres preguntas sobre un relato.",
            "Elabora un relato a partir de una imagen.",
        ],
        10 => [
            "Expresa opiniones.",
            "Repite palabras con pronunciación correcta.",
            "Absurdos visuales.",
        ],
        11 => [
            "Identifica palabras que inician con sonidos parecidos.",
            "Conoce: ayer, hoy y mañana.",
            "Ordena una historia y la relata.",
        ],
    ],
    "PERSONAL SOCIAL" => [
        0 => [
            "Se tranquiliza cuando se toma entre los brazos.",
            "Responde a las caricias.",
            "El bebé ya está registrado(a).",
        ],
        1 => [
            "Reconoce la voz del cuidador principal.",
            "Sonrisa social.",
            "Responde a una conversación.",
        ],
        2 => [
            "Coge las manos del examinador.",
            "Ríe a carcajadas.",
            "Busca la continuación del juego.",
        ],
        3 => [
            "Reacciona con desconfianza ante el extraño.",
            "Busca apoyo del cuidador.",
            "Reacciona a su imagen en el espejo.",
        ],
        4 => [
            "Participa en juegos.",
            "Muestra interés o intención en alimentarse solo.",
            "Explora el entorno.",
        ],
        5 => [
            "Seguimiento de rutinas",
            "Ayuda a desvestirse.",
            "Señala 5 partes de su cuerpo.",
        ],
        6 => [
            "Acepta y tolera el contacto de su piel con diferentes texturas.",
            "Expresa su satisfacción cuando logra o consigue algo.",
            "Identifica emociones básicas en una imagen.",
        ],
        7 => [
            "Identifica qué es de él y qué es de otros.",
            "Dice nombres de las personas con quien vive o comparte.",
            "Expresa verbalmente emociones básicas (tristeza, alegría, miedo, rabia).",
        ],
        8 => [
            "Rechaza la ayuda del cuidador cuando desea, intenta o hace algo por sí mismo.",
            "Comparte juego con otros(as) niños(as).",
            "Reconoce las emociones básicas de los otros(as).",
        ],
        9 => [
            "Puede vestirse y desvestirse solo(a).",
            "Propone juegos.",
            "Sabe cuántos años tiene.",
        ],
        10 => [
            "Participa en juegos respetando reglas y turnos.",
            "Comenta vida familiar.",
            "Colabora por iniciativa propia con actividades cotidianas.",
        ],
        11 => [
            "Manifiesta emoción ante acontecimientos importantes de su grupo social.",
            "Reconocimiento de normas o prohibiciones.",
            "Reconoce emociones complejas (culpa, pena, frustración, etc.).",
        ],
    ]
];

$arrayRango = [
    0 => "Rango 1 <br> 0 dias a 1 mes y 0 dias",
    1 => "Rango 2 <br> 1 mes y 1 dia a 3 meses y 0 dias",
    2 => "Rango 3 <br> 3 meses y 1 dia a 6 meses y 0 dias",
    3 => "Rango 4 <br> 6 meses y 1 dia a 9 meses y 0 dias",
    4 => "Rango 5 <br> 9 meses y 1 dia a 12 meses y 0 dias",
    5 => "Rango 6 <br> 12 meses y 1 dia a 18 meses y 0 dias",
    6 => "Rango 7 <br> 18 meses y 1 dia a 24 meses y 0 dias",
    7 => "Rango 8 <br> 24 meses y 1 dia a 36 meses y 0 dias",
    8 => "Rango 9 <br> 36 meses y 1 dia a 48 meses y 0 dias",
    9 => "Rango 10 <br> 48 meses y 1 dia a 60 meses y 0 dias",
    10 => "Rango 11 <br> 60 meses y 1 dia a 72 meses y 0 dias",
    11 => "Rango 12 <br> 72 meses y 1 dia a 84 meses y 0 dias",
    12 => "Fuera de Rango"
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
                            <th class="text-center" style="width: 16%;" colspan="2"> <i class="fa fa-trash btn btn-danger" onclick="clearRadio(<?= $acumQuest ?>)"> LIMPIAR</i> </th>
                            <th class="text-center" style="width: 68%;"><?= $key ?></th>
                            <th class="text-center" style="width: 16%;" colspan="2"> <?= Date("Y-m-d"); ?> </th>
                        </tr>
                        <tr>
                            <th class="text-center" style="width: 8%;">Rango de edad</th>
                            <th class="text-center" style="width: 8%;">Nº de ítem</th>
                            <th class="text-center" style="width: 68%;">Enunciado</th>
                            <th class="text-center" style="width: 8%;">1</th>
                            <th class="text-center" style="width: 8%;">0</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $posicion = (count($arrayRango) - 1);
                        foreach ($value as $key2 => $value2) { ?>
                            <tr <?= (escala(($key2 + 1), $fechaNacimiento) ? "class='bg-success'" : '') ?>>
                                <td class="text-center" style="width: 8%;"></td>
                                <td class="text-center" style="width: 8%;"><?= $acum++; ?></td>
                                <td class="text-center" style="width: 68%; word-break: break-all;"><?= $value2[0] ?></td>
                                <td class="text-center" colspan="2" style="width: 16%;">
                                    <div class="dlk-radio btn-group">
                                        <label class="btn btn-default btn-sm">
                                            <input name="encuesta<?= $acumQuest ?>[question<?= ($acum - 1) ?>]" id="question<?= ($acum - 1); ?>" class="form-control question<?= $acumQuest ?>" type="radio" value="1" onchange="escalaAbreviadaD(<?= $acumQuest ?>, <?= ($acum - 1) ?>)">
                                            <i class="fa fa-check glyphicon glyphicon-ok text-black"></i> <span class="text-black text-bold">1</span>
                                        </label>
                                        <label class="btn btn-default btn-sm">
                                            <input name="encuesta<?= $acumQuest ?>[question<?= ($acum - 1) ?>]" id="question<?= ($acum - 1); ?>" class="form-control question<?= $acumQuest ?>" type="radio" value="0" onchange="escalaAbreviadaD(<?= $acumQuest ?>, <?= ($acum - 1) ?>)">
                                            <i class="fa fa-times glyphicon glyphicon-remove text-black"></i> <span class="text-black text-bold">0</span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr <?= (escala(($key2 + 1), $fechaNacimiento) ? "class='bg-success'" : '') ?>>
                                <td class="text-center" style="width: 8%;"><?= ($key2 + 1) ?></td>
                                <td class="text-center" style="width: 8%;"><?= $acum++; ?></td>
                                <td class="text-center" style="width: 68%; word-break: break-all;"><?= $value2[1] ?></td>
                                <td class="text-center" colspan="2" style="width: 16%;">
                                    <div class="dlk-radio btn-group">
                                        <label class="btn btn-default btn-sm">
                                            <input name="encuesta<?= $acumQuest ?>[question<?= ($acum - 1) ?>]" onchange="escalaAbreviadaD(<?= $acumQuest ?>, <?= ($acum - 1) ?>)" id="question<?= ($acum - 1); ?>" class="form-control question<?= $acumQuest ?>" type="radio" value="1">
                                            <i class="fa fa-check glyphicon glyphicon-ok text-black"></i> <span class="text-black text-bold">1</span>
                                        </label>
                                        <label class="btn btn-default btn-sm">
                                            <input name="encuesta<?= $acumQuest ?>[question<?= ($acum - 1) ?>]" onchange="escalaAbreviadaD(<?= $acumQuest ?>, <?= ($acum - 1) ?>)" id="question<?= ($acum - 1); ?>" class="form-control question<?= $acumQuest ?>" type="radio" value="0">
                                            <i class="fa fa-times glyphicon glyphicon-remove text-black"></i> <span class="text-black text-bold">0</span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr <?= (escala(($key2 + 1), $fechaNacimiento) ? "class='bg-success'" : '') ?>>
                                <td class="text-center" style="width: 8%;"></td>
                                <td class="text-center" style="width: 8%;"><?= $acum++; ?></td>
                                <td class="text-center" style="width: 68%; word-break: break-all;"><?= $value2[2] ?></td>
                                <td class="text-center" colspan="2" style="width: 16%;">
                                    <div class="dlk-radio btn-group">
                                        <label class="btn btn-default btn-sm">
                                            <input name="encuesta<?= $acumQuest ?>[question<?= ($acum - 1) ?>]" onchange="escalaAbreviadaD(<?= $acumQuest ?>, <?= ($acum - 1) ?>)" id="question<?= ($acum - 1); ?>" class="form-control question<?= $acumQuest ?>" type="radio" value="1">
                                            <i class="fa fa-check glyphicon glyphicon-ok text-black"></i> <span class="text-black text-bold">1</span>
                                        </label>
                                        <label class="btn btn-default btn-sm">
                                            <input name="encuesta<?= $acumQuest ?>[question<?= ($acum - 1) ?>]" onchange="escalaAbreviadaD(<?= $acumQuest ?>, <?= ($acum - 1) ?>)" id="question<?= ($acum - 1); ?>" class="form-control question<?= $acumQuest ?>" type="radio" value="0">
                                            <i class="fa fa-times glyphicon glyphicon-remove text-black"></i> <span class="text-black text-bold">0</span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            $posicion = ((escala(($key2 + 1), $fechaNacimiento)) ? $key2 : $posicion);
                        } ?>
                        <input type="hidden" id="posicionEscala<?= $acumQuest ?>" value="<?= "{$posicion},{$acumQuest}" ?>">
                        <tr>
                            <td class="text-center text-bold" colspan="3" style="text-align: right;">Total Acumulado al inicio</td>
                            <td class="text-center text-bold" colspan="2" id="totalAcumInicio<?= $acumQuest ?>"></td>
                        </tr>
                        <tr>
                            <td class="text-center text-bold" colspan="3" style="text-align: right;">Número de ítems correctos</td>
                            <td class="text-center text-bold" colspan="2" id="numeroItems<?= $acumQuest ?>"></td>
                        </tr>
                        <tr>
                            <td class="text-center text-bold" colspan="3" style="text-align: right;">Total (Puntaje Directo)</td>
                            <td class="text-center text-bold" colspan="2" id="totalPorcenDirecto<?= $acumQuest ?>"></td>
                        </tr>
                    </tbody>
                </table>

                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 68%;" colspan="2">TABLA DE CONVERSIONES DE PD A PT <?= $key ?></th>
                        </tr>
                        <tr>
                            <th class="text-center" style="width: 8%;">Puntuacion Directa</th>
                            <th class="text-center" style="width: 8%;"><?= $arrayRango[$posicion] ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center" id="puntuacionDirecta<?= $acumQuest ?>">0</td>
                            <td class="text-center" id="rangoEdad<?= $acumQuest ?>">0</td>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" id="posicionEscala<?= $acumQuest ?>" value="<?= "{$posicion},{$acumQuest}" ?>">
            <?php
            }
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 68%;" colspan="5">HOJA REGISTRO DE PUNTUACION DE LA ESCALA ABREVIADA DE DESARROLLO EAD </th>
                    </tr>
                    <tr>
                        <th class="text-center" style="width: calc(100%/6)">RANGO</th>
                        <th class="text-center" style="width: calc(100%/6)">AREA</th>
                        <th class="text-center" style="width: calc(100%/6)">PD</th>
                        <th class="text-center" style="width: calc(100%/6)">PT</th>
                        <th class="text-center" style="width: calc(100%/6)">PUNTOS</th>
                        <th class="text-center" style="width: calc(100%/6)">NIVEL DESARROLLO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center" rowspan="4">
                            <span style="width: 100%; height: 150px; display: flex; justify-content: center; align-items: center;"><?= $arrayRango[$posicion] ?></span>
                        </td>
                        <td class="text-center">MG</td>
                        <td class="text-center" id="mgPD">0</td>
                        <td class="text-center" id="mgPT">0</td>
                        <td class="text-center" id="mgP">0</td>
                        <td class="text-center" id="nivelDesarrollo1"></td>
                    </tr>
                    <tr>
                        <td class="text-center">MF</td>
                        <td class="text-center" id="mfPD">0</td>
                        <td class="text-center" id="mfPT">0</td>
                        <td class="text-center" id="mfP">0</td>
                        <td class="text-center" id="nivelDesarrollo2"></td>
                    </tr>
                    <tr>
                        <td class="text-center">AL</td>
                        <td class="text-center" id="alPD">0</td>
                        <td class="text-center" id="alPT">0</td>
                        <td class="text-center" id="alP">0</td>
                        <td class="text-center" id="nivelDesarrollo3"></td>
                    </tr>
                    <tr>
                        <td class="text-center">PS</td>
                        <td class="text-center" id="psPD">0</td>
                        <td class="text-center" id="psPT">0</td>
                        <td class="text-center" id="psP">0</td>
                        <td class="text-center" id="nivelDesarrollo4"></td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="jsonDataEscala" id="jsonDataEscala" value="">
        </div>
    </div>
</div>

<script type="text/javascript">
    let regisPEAD = <?= json_encode($regisPEAD) ?>;
    // console.log(regisPEAD);
    let hojaRegistroPTEAD = [];
    let puntuacionArray = [
        [ // 0
            [35, 47, 100],
            [31, 51, 100],
            [19, 29, 100],
            [16, 33, 100]
        ],
        [ // 1
            [30, 40, 100],
            [25, 32, 100],
            [30, 39, 100],
            [33, 40, 100]
        ],
        [ // 2
            [32, 41, 100],
            [33, 39, 100],
            [24, 40, 100],
            [33, 39, 100]
        ],
        [ // 3
            [36, 43, 100],
            [38, 45, 100],
            [26, 41, 100],
            [33, 39, 100]
        ],
        [ // 4
            [34, 40, 100],
            [38, 44, 100],
            [35, 42, 100],
            [45, 0, 100]
        ],
        [ // 5
            [33, 39, 100],
            [45, 0, 100],
            [38, 44, 100],
            [37, 41, 100]
        ],
        [ // 6
            [32, 42, 100],
            [34, 40, 100],
            [33, 43, 100],
            [30, 39, 100]
        ],
        [ // 7
            [29, 38, 100],
            [34, 40, 100],
            [32, 42, 100],
            [29, 41, 100]
        ],
        [ // 8
            [32, 40, 100],
            [32, 38, 100],
            [30, 39, 100],
            [30, 42, 100]
        ],
        [ // 9
            [33, 42, 100],
            [29, 42, 100],
            [33, 42, 100],
            [32, 40, 100]
        ],
        [ // 10
            [29, 42, 100],
            [34, 40, 100],
            [34, 40, 100],
            [32, 38, 100]
        ],
        [ // 11
            [36, 50, 100],
            [36, 45, 100],
            [30, 46, 100],
            [38, 60, 100]
        ],
    ];

    // for (let index = 0; index < 12; index++) {
    //     hojaRegistroPTEAD[index] = [
    //         ["MG"],
    //         ["MF"],
    //         ["AL"],
    //         ["PS"]
    //     ];
    //     hojaRegistroPTEAD[index]["MG"] = [];
    //     hojaRegistroPTEAD[index]["MF"] = [];
    //     hojaRegistroPTEAD[index]["AL"] = [];
    //     hojaRegistroPTEAD[index]["PS"] = [];
    // }
    // console.log(hojaRegistroPTEAD);

    const clearRadio = (input) => {
        $(document.querySelectorAll(`.question${input}`)).prop('checked', false);
        $(`#totalAcumInicio${input}`).text(0);
        $(`#numeroItems${input}`).text(0);
        $(`#totalPorcenDirecto${input}`).text(0);
        $(`#puntuacionDirecta${input}`).text(0);
        $(`#rangoEdad${input}`).text(0);
    };

    const escalaAbreviadaD = (checked, valor) => {
        let btn = document.querySelectorAll(`.question${checked}:checked[value='1']`);
        let acum = 0;
        let indice = $(document.querySelectorAll(`.question${checked}:checked`)[0]).attr('onchange').replace(")", ",").replace("(", ",").split(",")[2].trim();
        indice = parseInt((indice == 1 ? indice : (indice - 1)));
        btn.forEach(element => {
            acum++;
        });

        let arrayTablaConvercion = [];
        arrayTablaConvercion[0] = [
            [2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [25, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [36, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [48, 31, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [59, 41, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [71, 51, 25, 8, 0, 0, 0, 0, 0, 0, 0, 0],
            [73, 61, 33, 15, 2, 0, 0, 0, 0, 0, 0, 0],
            [93, 72, 42, 22, 9, 0, 0, 0, 0, 0, 0, 0],
            [105, 82, 50, 29, 15, 1, 0, 0, 0, 0, 0, 0],
            [116, 92, 58, 37, 22, 6, 0, 0, 0, 0, 0, 0],
            [128, 102, 67, 44, 28, 12, 0, 0, 0, 0, 0, 0],
            [139, 112, 75, 51, 35, 17, 3, 0, 0, 0, 0, 0],
            [150, 122, 84, 58, 41, 23, 8, 0, 0, 0, 0, 0],
            [162, 132, 92, 66, 47, 29, 13, 0, 0, 0, 0, 0],
            [173, 143, 100, 73, 54, 34, 18, 3, 0, 0, 0, 0],
            [185, 153, 109, 80, 60, 40, 23, 7, 0, 0, 0, 0],
            [196, 163, 117, 88, 67, 46, 28, 12, 0, 0, 0, 0],
            [208, 173, 126, 95, 73, 51, 33, 16, 2, 0, 0, 0],
            [219, 183, 134, 102, 80, 57, 38, 21, 6, 0, 0, 0],
            [230, 193, 142, 109, 86, 63, 43, 25, 11, 2, 0, 0],
            [242, 204, 151, 117, 93, 68, 48, 30, 15, 7, 0, 0],
            [253, 214, 159, 124, 999, 74, 53, 34, 16, 11, 0, 0],
            [265, 224, 168, 131, 106, 80, 58, 39, 24, 16, 0, 0],
            [276, 234, 176, 134, 112, 85, 63, 43, 28, 20, 0, 0],
            [287, 244, 185, 146, 119, 91, 68, 48, 33, 25, 0, 0],
            [299, 254, 193, 153, 125, 97, 73, 52, 37, 30, 4, 0],
            [310, 265, 201, 160, 132, 102, 78, 57, 41, 34, 10, 0],
            [322, 275, 210, 167, 138, 108, 83, 61, 46, 39, 17, 0],
            [333, 285, 218, 175, 144, 114, 88, 66, 50, 43, 23, 0],
            [345, 295, 227, 182, 151, 119, 93, 70, 54, 48, 30, 0],
            [356, 305, 235, 189, 157, 125, 98, 75, 59, 53, 36, 0],
            [367, 315, 243, 197, 164, 131, 103, 79, 63, 57, 43, 0],
            [379, 325, 252, 204, 170, 136, 108, 84, 68, 62, 49, 11],
            [390, 336, 260, 211, 177, 142, 113, 88, 72, 66, 56, 24],
            [402, 346, 269, 218, 183, 148, 118, 93, 76, 71, 62, 37],
            [413, 356, 277, 226, 190, 153, 123, 97, 81, 76, 69, 51]
        ];
        arrayTablaConvercion[1] = [
            [0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [12, 11, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [32, 19, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [52, 26, 17, 2, 0, 0, 0, 0, 0, 0, 0, 0],
            [72, 33, 23, 8, 0, 0, 0, 0, 0, 0, 0, 0],
            [92, 40, 29, 15, 0, 0, 0, 0, 0, 0, 0, 0],
            [112, 47, 34, 21, 7, 0, 0, 0, 0, 0, 0, 0],
            [132, 55, 40, 27, 13, 0, 0, 0, 0, 0, 0, 0],
            [152, 62, 46, 33, 20, 5, 0, 0, 0, 0, 0, 0],
            [172, 69, 52, 39, 26, 11, 0, 0, 0, 0, 0, 0],
            [192, 76, 58, 46, 32, 17, 0, 0, 0, 0, 0, 0],
            [212, 53, 64, 52, 39, 23, 0, 0, 0, 0, 0, 0],
            [232, 91, 70, 58, 45, 29, 0, 0, 0, 0, 0, 0],
            [252, 98, 76, 64, 52, 34, 7, 0, 0, 0, 0, 0],
            [272, 105, 82, 70, 58, 40, 14, 0, 0, 0, 0, 0],
            [292, 112, 88, 77, 65, 46, 21, 0, 0, 0, 0, 0],
            [312, 119, 94, 83, 71, 52, 28, 4, 0, 0, 0, 0],
            [332, 127, 100, 89, 77, 58, 35, 10, 0, 0, 0, 0],
            [352, 134, 106, 95, 84, 64, 42, 16, 0, 0, 0, 0],
            [372, 141, 112, 101, 90, 70, 50, 23, 1, 0, 0, 0],
            [392, 148, 118, 108, 97, 76, 57, 29, 6, 0, 0, 0],
            [412, 155, 124, 114, 103, 82, 64, 35, 11, 0, 0, 0],
            [432, 163, 130, 120, 110, 88, 71, 41, 17, 0, 0, 0],
            [452, 170, 136, 126, 116, 94, 78, 47, 22, 4, 0, 0],
            [472, 177, 42, 132, 122, 100, 85, 53, 28, 11, 0, 0],
            [492, 184, 148, 139, 129, 106, 93, 59, 33, 17, 5, 0],
            [512, 191, 154, 145, 135, 112, 100, 65, 39, 23, 11, 0],
            [532, 199, 160, 151, 142, 118, 107, 71, 44, 30, 17, 0],
            [552, 206, 166, 157, 148, 124, 114, 77, 49, 36, 23, 9],
            [572, 213, 172, 163, 155, 130, 121, 83, 55, 43, 29, 18],
            [592, 220, 178, 170, 161, 136, 129, 89, 60, 49, 35, 26],
            [612, 227, 184, 176, 168, 142, 136, 96, 66, 55, 41, 37],
            [632, 235, 190, 182, 174, 148, 143, 102, 71, 62, 47, 46],
            [652, 242, 196, 188, 180, 154, 150, 108, 77, 68, 53, 55],
            [672, 249, 202, 194, 187, 160, 157, 114, 82, 75, 59, 64],
            [692, 256, 208, 201, 193, 166, 164, 120, 88, 81, 65, 73],
            [712, 263, 214, 207, 200, 172, 172, 126, 93, 87, 71, 82]
        ];
        arrayTablaConvercion[2] = [
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [10, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [20, 12, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [30, 22, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [40, 31, 17, 6, 0, 0, 0, 0, 0, 0, 0, 0],
            [50, 40, 25, 13, 4, 0, 0, 0, 0, 0, 0, 0],
            [60, 49, 33, 20, 11, 0, 0, 0, 0, 0, 0, 0],
            [70, 58, 41, 27, 17, 5, 0, 0, 0, 0, 0, 0],
            [80, 67, 49, 34, 23, 11, 0, 0, 0, 0, 0, 0],
            [90, 77, 56, 42, 30, 16, 3, 0, 0, 0, 0, 0],
            [100, 86, 64, 49, 36, 22, 6, 0, 0, 0, 0, 0],
            [110, 95, 72, 56, 43, 28, 13, 0, 0, 0, 0, 0],
            [120, 104, 80, 63, 49, 34, 16, 1, 0, 0, 0, 0],
            [130, 113, 88, 70, 56, 39, 23, 5, 0, 0, 0, 0],
            [140, 123, 96, 77, 62, 45, 28, 10, 0, 0, 0, 0],
            [150, 132, 104, 84, 69, 51, 34, 15, 0, 0, 0, 0],
            [160, 141, 112, 91, 75, 57, 39, 19, 0, 0, 0, 0],
            [170, 150, 120, 98, 82, 63, 44, 24, 4, 0, 0, 0],
            [180, 159, 128, 105, 88, 68, 49, 29, 8, 0, 0, 0],
            [190, 168, 136, 113, 94, 74, 54, 33, 13, 2, 0, 0],
            [200, 178, 144, 120, 101, 80, 59, 38, 17, 6, 0, 0],
            [210, 187, 152, 127, 107, 86, 65, 43, 22, 11, 0, 0],
            [220, 196, 160, 134, 114, 91, 70, 47, 26, 15, 0, 0],
            [230, 205, 168, 141, 120, 97, 75, 52, 31, 20, 0, 0],
            [240, 214, 179, 148, 127, 103, 80, 57, 35, 25, 1, 0],
            [250, 224, 184, 155, 133, 109, 85, 61, 40, 29, 7, 0],
            [260, 233, 192, 162, 144, 114, 90, 66, 44, 34, 12, 0],
            [270, 242, 200, 169, 146, 120, 96, 71, 49, 38, 18, 0],
            [280, 251, 208, 176, 153, 126, 101, 75, 52, 43, 24, 6],
            [290, 260, 216, 184, 159, 132, 106, 80, 58, 48, 29, 14],
            [300, 270, 224, 191, 166, 137, 111, 85, 62, 52, 35, 22],
            [310, 279, 232, 198, 172, 143, 116, 89, 67, 57, 41, 31],
            [320, 288, 240, 205, 178, 149, 121, 94, 71, 62, 46, 39],
            [330, 297, 248, 212, 185, 155, 127, 99, 76, 66, 52, 47],
            [240, 306, 256, 219, 191, 161, 132, 104, 80, 71, 58, 55],
            [350, 315, 264, 226, 198, 166, 137, 108, 85, 75, 63, 64]
        ];
        arrayTablaConvercion[3] = [
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [8, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [17, 11, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [25, 18, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [34, 26, 14, 6, 0, 0, 0, 0, 0, 0, 0, 0],
            [42, 34, 21, 11, 4, 0, 0, 0, 0, 0, 0, 0],
            [50, 41, 27, 17, 9, 0, 0, 0, 0, 0, 0, 0],
            [59, 49, 34, 23, 14, 4, 0, 0, 0, 0, 0],
            [67, 57, 40, 29, 20, 9, 0, 0, 0, 0, 0, 0],
            [76, 64, 47, 34, 25, 14, 2, 0, 0, 0, 0, 0],
            [84, 72, 53, 40, 30, 18, 6, 0, 0, 0, 0, 0],
            [92, 79, 60, 46, 35, 23, 10, 0, 0, 0, 0, 0],
            [101, 87, 67, 52, 41, 28, 15, 0, 0, 0, 0, 0],
            [109, 95, 73, 58, 46, 32, 19, 3, 0, 0, 0, 0],
            [118, 102, 80, 63, 51, 37, 23, 7, 0, 0, 0, 0],
            [126, 110, 86, 69, 56, 42, 27, 11, 0, 0, 0, 0],
            [134, 118, 93, 95, 61, 46, 31, 15, 0, 0, 0, 0],
            [143, 125, 99, 81, 67, 51, 36, 19, 0, 0, 0, 0],
            [151, 133, 106, 86, 72, 56, 40, 22, 3, 0, 0, 0],
            [160, 141, 112, 92, 77, 60, 44, 26, 7, 0, 0, 0],
            [168, 148, 119, 98, 82, 65, 48, 30, 11, 0, 0, 0],
            [176, 156, 125, 104, 88, 70, 52, 34, 15, 3, 0, 0],
            [185, 163, 132, 110, 93, 74, 57, 38, 19, 7, 0, 0],
            [193, 171, 138, 115, 98, 79, 61, 42, 23, 12, 0, 0],
            [202, 179, 145, 121, 103, 84, 65, 46, 27, 16, 0, 0],
            [210, 186, 152, 127, 109, 88, 69, 50, 31, 20, 0, 0],
            [218, 194, 158, 133, 114, 93, 74, 54, 35, 24, 0, 0],
            [227, 202, 165, 138, 119, 98, 78, 57, 39, 29, 0, 0],
            [235, 209, 171, 144, 124, 102, 82, 61, 43, 33, 6, 0],
            [244, 217, 178, 150, 130, 107, 86, 65, 47, 37, 12, 0],
            [252, 225, 184, 156, 135, 112, 90, 69, 50, 41, 19, 0],
            [260, 232, 191, 162, 140, 116, 95, 73, 54, 46, 26, 0],
            [269, 240, 197, 167, 145, 121, 99, 77, 58, 50, 33, 0],
            [277, 248, 204, 173, 150, 126, 103, 81, 62, 54, 39, 18],
            [286, 255, 210, 179, 156, 130, 107, 85, 66, 58, 46, 39],
            [294, 263, 217, 185, 161, 135, 111, 89, 70, 62, 53, 61],
            [302, 270, 223, 190, 166, 140, 116, 92, 74, 67, 59, 82]
        ];

        let puntajeDirecto = (parseInt(indice) + parseInt(acum));

        $(`#totalAcumInicio${checked}`).text(indice);
        $(`#numeroItems${checked}`).text(acum);
        $(`#totalPorcenDirecto${checked}`).text(puntajeDirecto);

        let arrayPosition = $(`#posicionEscala${checked}`).val().split(",");

        regisPEAD[checked] = [puntajeDirecto, arrayTablaConvercion[(arrayPosition[1] - 1)][puntajeDirecto][arrayPosition[0]]];
        $(`#puntuacionDirecta${checked}`).text(puntajeDirecto);
        $(`#rangoEdad${checked}`).text(arrayTablaConvercion[(arrayPosition[1] - 1)][puntajeDirecto][arrayPosition[0]]);

        cargaRegisPEAD(arrayPosition[0]);
    };

    const colorRegisPEAD = (posicion, rango1, rango2, registroPuntuacion) => {
        let validaRango = (regisPEAD[rango1][0] + regisPEAD[rango1][1]);
        regisPEAD[rango1][2] = validaRango; // [0] => PD [1] => PT [2] => RANGO/PUNTOS
        if (validaRango >= 0 && validaRango <= registroPuntuacion[posicion][rango2][0]) {
            $(`#nivelDesarrollo${rango1}`).text("Sospecha de problema en el desarrollo");
            return "red";
        } else if (validaRango > registroPuntuacion[posicion][rango2][0] && validaRango <= registroPuntuacion[posicion][rango2][1]) {
            $(`#nivelDesarrollo${rango1}`).text("Riesgo de problema en el desarrollo");
            return "yellow";
        } else if (validaRango > registroPuntuacion[posicion][rango2][1]) {
            $(`#nivelDesarrollo${rango1}`).text("Desarrollo esperado para la edad");
            return "green";
        }
        $(`#nivelDesarrollo${rango1}`).text("");
        return "black";
    }

    const cargaRegisPEAD = (posicion) => {
        let registroPuntuacion = [
            [ // 0
                [35, 47, 100], // 0 1 2
                [31, 51, 100],
                [19, 29, 100],
                [16, 33, 100]
            ],
            [ // 1
                [30, 40, 100],
                [25, 32, 100],
                [30, 39, 100],
                [33, 40, 100]
            ],
            [ // 2
                [32, 41, 100],
                [38, 45, 100],
                [26, 41, 100],
                [33, 40, 100]
            ],
            [ // 3
                [32, 41, 100],
                [38, 45, 100],
                [26, 41, 100],
                [33, 40, 100]
            ],
            [ // 4
                [34, 40, 100],
                [38, 44, 100],
                [35, 42, 100],
                [45, 0, 100]
            ],
            [ // 5
                [33, 39, 100],
                [45, 0, 100],
                [38, 44, 100],
                [37, 41, 100]
            ],
            [ // 6 
                [32, 42, 100],
                [34, 40, 100],
                [33, 43, 100],
                [30, 39, 100]
            ],
            [ // 7
                [29, 38, 100],
                [34, 40, 100],
                [33, 42, 100],
                [39, 41, 100]
            ],
            [ // 8
                [32, 40, 100],
                [32, 38, 100],
                [31, 39, 100],
                [31, 42, 100]
            ],
            [ // 9
                [33, 42, 100],
                [30, 42, 100],
                [33, 42, 100],
                [32, 40, 100]
            ],
            [ // 10
                [29, 42, 100],
                [34, 40, 100],
                [34, 40, 100],
                [33, 38, 100]
            ],
            [ // 11
                [36, 50, 100],
                [36, 45, 100],
                [31, 46, 100],
                [38, 60, 100]
            ]
        ];

        let colorRango = "";

        $("#mgPD").text(regisPEAD[1][0]);
        $("#mgPT").text(regisPEAD[1][1]);

        colorRango = colorRegisPEAD(posicion, 1, 0, registroPuntuacion);

        $("#mgP").text((regisPEAD[1][0] + regisPEAD[1][1])).css({
            "color": (colorRango == "yellow" ? "black" : "white"),
            "background": colorRango,
            "fontWeight": "bold"
        });

        $("#mfPD").text(regisPEAD[2][0]);
        $("#mfPT").text(regisPEAD[2][1]);

        colorRango = colorRegisPEAD(posicion, 2, 1, registroPuntuacion);

        $("#mfP").text((regisPEAD[2][0] + regisPEAD[2][1])).css({
            "color": (colorRango == "yellow" ? "black" : "white"),
            "background": colorRango,
            "fontWeight": "bold"
        });

        $("#alPD").text(regisPEAD[3][0]);
        $("#alPT").text(regisPEAD[3][1]);

        colorRango = colorRegisPEAD(posicion, 3, 2, registroPuntuacion);

        $("#alP").text((regisPEAD[3][0] + regisPEAD[3][1])).css({
            "color": (colorRango == "yellow" ? "black" : "white"),
            "background": colorRango,
            "fontWeight": "bold"
        });

        $("#psPD").text(regisPEAD[4][0]);
        $("#psPT").text(regisPEAD[4][1]);

        colorRango = colorRegisPEAD(posicion, 4, 3, registroPuntuacion);

        $("#psP").text((regisPEAD[4][0] + regisPEAD[4][1])).css({
            "color": (colorRango == "yellow" ? "black" : "white"),
            "background": colorRango,
            "fontWeight": "bold"
        });

        $("#jsonDataEscala").val(JSON.stringify(regisPEAD));
    }
</script>