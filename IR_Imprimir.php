<?php

$QueryHistoria = mysqli_query($conn3, "SELECT * FROM  {$Historia_Nombre} where id = $Historia_id");
if ($QueryHistoria) {
    while ($rowHistoria = mysqli_fetch_array($QueryHistoria)) 
    {
        $CIE_10_1 = $rowHistoria["CIE10_1"];
        $CIE_10_2 = $rowHistoria["CIE10_2"];
        $CIE_10_3 = $rowHistoria["CIE10_3"];
        $CIE_10_4 = $rowHistoria["CIE10_4"];
    }

    if (strlen($CIE_10_1) > "1") {
        echo '<div class="col-12\" style="padding-bottom: 10px;\">'.'<b>  Diagnóstico principal </b> :' . $CIE_10_1 .' - '.funcionMaster($CIE_10_1,'codigo','descripcion','cie10'). '</div>';
    }

    if (strlen($CIE_10_2) > "1") {
        echo '<div class="col-12\" style="padding-bottom: 10px;\">'.'<b>  Diagnóstico relacionado N° 1 </b> :' . $CIE_10_2 .' - '.funcionMaster($CIE_10_2,'codigo','descripcion','cie10'). '</div>';
    }

    if (strlen($CIE_10_3) > "1") {
        echo '<div class="col-12\" style="padding-bottom: 10px;\">'.'<b>  Diagnóstico relacionado N° 2 </b> :' . $CIE_10_3 .' - '.funcionMaster($CIE_10_3,'codigo','descripcion','cie10'). '</div>';
    }

    if (strlen($CIE_10_4) > "1") {
        echo '<div class="col-12\" style="padding-bottom: 10px;\">'.'<b>  Diagnóstico relacionado N° 3 </b> :' . $CIE_10_4 .' - '.funcionMaster($CIE_10_4,'codigo','descripcion','cie10'). '</div>';
    }
}

?>