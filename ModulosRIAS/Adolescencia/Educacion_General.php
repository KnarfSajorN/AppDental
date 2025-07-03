

<div class="col-md-12 row">


<div class='form-group col-md-12'>
    <hr>
</div>

<?php


$ArreglosCamposOtrosAspectos = [
    "1" => "Promoción de la salud, del bienestar, del crecimiento, del desarrollo físico y psicosocial esperado y como potenciarlo incluye particularmente el desarrollo sexual, cognitivo, la construcción de identidad, autonomía, agencia",
    "2" => "El ejercicio de la sexualidad en el marco de los derechos sexuales y reproductivos",
    "3" => "Identificar los riesgos y cómo prevenirlos, evitarlos o mitigarlos",
    "4" => "Toma de decisiones como expresión de la autonomía",
    "5" => "Relaciones con pares, los padres y la familia",
    "6" => "Servicios de salud y sociales disponibles para los adolescentes PARA LA FAMILIA",
    "7" => "Apoya el proceso de desarrollo, construcción de autonomía e identidad del adolescente",
    "8" => "Promoción de la alimentación adecuada, de hábitos y estilos de vida saludables (prevención de la exposición al humo de tabaco, promover la cesación del consumo de tabaco)",
    "9" => "Prácticas deportivas organizadas, actividad física y evitación del sedentarismo",
    "10" => "Uso prolongado de televisión, computadores y otras pantallas",
    "11" => "Promoción de la salud mental",
    "12" => "Prevención de violencias de diversas formas de violencia",
    "13" => "Promoción de la salud mental; de prevención de accidentes (incluyendo accidentes de tránsito en calidad de pasajero o de peatón);",
    "14" => "Cuidado del oído y la visión",
    "15" => "Hábitos de higiene personal y de higiene bucal",
    "16" => "Normas de control y manejo del ruido para el mantenimiento de los ambientes tranquilos que propicien una audición segura",
];

foreach ($ArreglosCamposOtrosAspectos as $key => $value) {
    $Titulo = $value;
    $Identificacion = $key;
   

    
    echo "<div class='form-group col-md-12'>
        <label>$Titulo</label><br>
        <textarea class='form-control' name='Educacion[Educacion][$Identificacion][$Titulo]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
    </div>";
    
}


?>



</div>

