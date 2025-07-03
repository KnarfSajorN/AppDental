<?php 
    $valor=$_POST['valor'];
    $desc_moneda="pesos";//moneda
    $sep="con";//separador ej con, coma, y
    $desc_decimal="centavos";//decimales ej centavos, centimos

    $arr = explode(".", $valor);
    $entero = $arr[0];
    if (isset($arr[1])) {
        $decimos = strlen($arr[1]) == 1 ? $arr[1] . '0' : $arr[1];
    }

    $fmt = new \NumberFormatter('es', \NumberFormatter::SPELLOUT);
    if (is_array($arr)) {
        $num_word = ($arr[0]>=1000000) ? "{$fmt->format($entero)} de $desc_moneda" : "{$fmt->format($entero)} $desc_moneda";
        if (isset($decimos) && $decimos > 0) {
            $num_word .= " $sep  {$fmt->format($decimos)} $desc_decimal";
        }
    }
    echo $num_word;
?>