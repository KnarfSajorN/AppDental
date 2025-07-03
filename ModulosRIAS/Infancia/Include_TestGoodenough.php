<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-bold text-center"> Test de inteligencia infantil Florence Goodenough </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Items</th>
                        <th>Criterio</th>
                        <th>Positivo</th>
                        <th>Negativo</th>
                    </tr>
                </thead>
                <tbody>

                    
                    <?php

                    $ArreglosCampos = [
                        "1" => array(
                            "1. PRESENCIA DE CABEZA:",
                            "Positivo: Toda forma clara; Negativos: La sola indicación de facciones faltando el contorno de la cabeza.",
                        ),
                        "2" => array(
                            "2. PRESENCIA DE PIERNAS:",
                            "Positivo. Cualquier procedimiento que indique claramente las piernas; en niños pequeños se aceptará una sola pierna pero con dos pies.",
                        ),
                        "3" => array(
                            "3. PRESENCIA DE BRAZOS:",
                            "Positivo: Toda indicación clara de los brazos, de cualquier longitud; el número debe ser exacto.",
                        ),
                        "4" => array(
                            "4. A) PRESENCIA DE TRONCO:",
                            "Positivo: Toda indicación clara, mediante líneas, figuras O figura bidimensional; la intercalación de una figura entre la cabeza y las piernas (interrogar); si no hay una clara diferencia de cabeza y tronco, siempre que las facciones están agrupadas en la parte superior y ocupen menos de la mitad del largo de la figura; Negativo: una hilera de botones extendida hacia abajo entre ambas piernas a menos que se haya trazado una horizontal para la figuración del tronco.",
                        ),
                        "5" => array(
                            "4. B) TRONCO MAS LARGO QUE ANCHO:",
                            "Negativo: si las magnitudes son iguales.",
                        ),
                        "6" => array(
                            "4. C) INDICACIÓN DEL HOMBRO:",
                            "Positivo: Cuando aparece un mero cambio de dirección en la línea superior del contorno del tronco y que ello produzca más una impresión de concavidad que de convexidad. Un tronco perfectamente cuadrado o rectangular no se aceptará, salvo que se hayan redondeado los ángulos.",
                        ),
                        "7" => array(
                            "5. A) BRAZOS Y PIERNAS UNIDOS AL TRONCO:",
                            "Positivo: cuando están unidos al tronco en cualquier parte; pueden unirse al cuello, cuando falta éste, a la unión de la cabeza con el tronco. Si se ha omitido un brazo o una pierna la puntuación debe hacerse al miembro presente; Negativo: si falta el tronco. Sí los brazos se unen al tronco y las piernas no. Si están representados ambos brazos y se unen directamente a las piernas.",
                        ),
                        "8" => array(
                            "5. B) BRAZOS Y PIERNAS AL TRONCO: BRAZOS UNIDOS AL TRONCO EN CORRECTA UBICACION.",
                            "Positivo: Cuando en un dibujo de frente 4 C es positivo, la unión de los brazos con el tronco ha de efectuarse exactamente en los hombros. En dibujos de perfil la unión de los brazos al tronco deberá estar situada a corta distancia debajo del cuello; este punto, de coincidir con el ensanchamiento del tronco, representa el pecho y los hombros. Si 4 C fuese negativo, la unión se realizará en los hombros.",
                        ),
                        "9" => array(
                            "6. A) PRESENCIA DEL CUELLO:",
                            "Positivo. Cualquier indicación clara del cuello como algo diferenciado de la cabeza y del tronco; Negativo. La mera yuxtaposición de la cabeza y del tronco.",
                        ),
                        "10" => array(
                            "6. B) CONTORNO DEL CUELLO COMO CONTAMINACION DE LA CABEZA O DEL TRONCO O DE AMBOS:",
                            "Positivo: valorada positivamente 6 A, resulta fácil valorar este ítem. La línea del cuello debe ser la continuación de la línea de la cabeza y del tronco.",
                        ),
                        "11" => array(
                            "7. A) PRESENCIA DE OJOS:",
                            "Positivo. Cuando están representados ambos o uno solo, Cualquier forma es satisfactoria.",
                        ),
                        "12" => array(
                            "7. B) PRESENCIA DE LA NARIZ:",
                            "Positivo: todo procedimiento de representación.",
                        ),
                        "13" => array(
                            "7. C) PRESENCIA DE LA BOCA:",
                            "Positivo: todo procedimiento de representación.",
                        ),
                        "14" => array(
                            "7. D) BOCA Y NARIZ EN DOS DIMENSIONES; LABIOS señalados:",
                            "Positivo. Toda Figura aproximadamente bidimensional. Un triángulo equilátero en posición normal, con la base hacia abajo (nariz). La boca vale siempre que este dibujada en dos dimensiones y se indique la línea que muestre la separación entre ambos labios; Negativo. La representación de dos puntos como nariz.",
                        ),
                        "15" => array(
                            "7. E) ORIFICIOS DE LA NARIZ INDICADOS:",
                            "Positivo: Cualquier indicación clara. En la figura de perfil cuando el contorno de la nariz, a la altura de la base, se prolonga hacia el interior de la cara por encima del labio superior.",
                        ),
                        "16" => array(
                            "8. A) CABELLOS INDICADOS:",
                            "Positivo: Cualquier indicación clara. Interrogar en dibujos Rudimentarios.",
                        ),
                        "17" => array(
                            "8. B) CABELLOS QUE EXCEDAN LA CIRCUNFERENCIA DE LA CABEZA Y NO SEAN TRANSPARENTES, TECNICA DE REPRESENTACION SUPERIOR AL GARABATO, EL CONTORNO DEL CRANEO NO DEBE VERSE A TRAVES DEL CABELLO:",
                            "Positivo. Siempre que los tres requisitos del ítem se cumplan simultáneamente.",
                        ),
                        "18" => array(
                            "9. A) PRESENCIA DE ROPA:",
                            "Positivo. Cualquier indicación clara de prendas de vestir; una hilera de botones, un sombrero, etc. Una serie de líneas horizontales trazadas al tronco y con menos frecuencia en los miembros.",
                        ),
                        "19" => array(
                            "9. B) DOS PRENDAS DE VESTIR NO TRANSPARENTES:",
                            "Positivo: Dos prendas que cubran u oculten las partes del cuerpo que se supone deban cubrir; como única indicación de vestimenta.",
                        ),
                        "20" => array(
                            "9. C) DIBUJO COMPLETO SIN TRANSPARENCIA, CUANDO SE INDIQUE MANGAS Y PANTALONES:",
                            "Positivo: Cuando se cumplen las exigencias del ítem.",
                        ),
                        "21" => array(
                            "9. D) CUATRO O MÁS ARTICULOS DE VESTIR DEFINITIVAMENTE INDICADOS:",
                            "Positivo: Sombrero, zapatos, paletó, camisa, cuello, corbata, tirantes, pantalón. Negativo: Los botones solos.",
                        ),
                        "22" => array(
                            "9. E) VESTIMENTA COMPLETA SIN INCONGRUENCIA:",
                            "Positivo: Vestuario reconocible y de especie definida; ropa de trabajo, uniforme de soldado, etc. Negativo: Traje de calle completado con gorra militar.",
                        ),
                        "23" => array(
                            "10. A) INDICACIÓN DE DEDOS:",
                            "Positivo: Cualquier indicación clara de ellos sin tener en cuenta la forma adoptada para representarlo. Si están dibujadas las manos, deben verse ambas. Si en única mano visible están representados.",
                        ),
                        "24" => array(
                            "10. B) NÚMERO CORRECTO DE DEDOS:",
                            "Positivo: Cinco dedos en cada mano cuando se vean las dos. Número exacto de dedos cuando se vea una sola.",
                        ),
                        "25" => array(
                            "10. C) DEDOS REPRESENTADOS EN DOS DIMENSIONES, MAS LARGOS QUE ANCHOS Y QUE EN CONJUNTO NO FORMEN UN ÁNGULO MAYOR DE 180°:",
                            "Positivo: Siempre que se cumplan las tres dimensiones del ítem.",
                        ),
                        "26" => array(
                            "10. D) INDICACIÓN DEL PULGAR EN OPOSICIÓN:",
                            "Positivo: El pulgar claramente diferenciado de los demás dedos. Cuando el ángulo que forma cualquier par de dedos es menor que la mitad del ángulo que forma el índice con el pulgar. Cuando la inserción del pulgar se acerca más a la muñeca que el resto de los dedos.",
                        ),
                        "27" => array(
                            "10. E) INDICACIÓN DE LA MANO DIFERENCIADA DEL BRAZO O DE LOS DEDOS:",
                            "Positivo: Dibujar al hombre son sus manos en los bolsillos se valora como positivo cuando la parte superior de ellas sea visible, asomando por el borde del bolsillo. En los demás casos atenerse a las exigencias del ítem.",
                        ),
                        "28" => array(
                            "11. A) PRESENCIA DE ARTICULACIÓN EN EL BRAZO, CODO, HOMBRO O AMBOS:",
                            "Positivo: La articulación del hombro, el brazo debe colgar al costado en dirección aproximadamente paralela al cuerpo. Una curva indicadora de la articulación del hombro debe marcar la inserción del brazo en el tronco; Negativo: Dibujos realizados por niños muy pequeños o retardados, los codos y las rodillas suelen indicarse con desconocimiento evidente de su función articulatoria.",
                        ),
                        "29" => array(
                            "11. B) ARTICULACIÓN DE LA PIERNA, RODILLA, CADERA O AMBAS:",
                            "Positivo: Si la puntuación se hace a la articulación de la rodilla, exíjase cono; en el caso del codo una flexión angular hacia la mitad de la pierna. También dicha articulación debe indicarse por un adelgazamiento de la pierna. Si la articulación se hace en base a la cadera, las líneas interiores de las piernas deben converger en el mismo punto, en la unión con el tronco.",
                        ),
                        "30" => array(
                            "12. A) CABEZA PROPORCIONADA:",
                            "Positivo: cb. Igual a ½ tr. tam: cb. Igual 1/10 cuerpo",
                        ),
                        "31" => array(
                            "12. B) BRAZOS PROPORCIONADOS:",
                            "Positivo: Cuando la longitud de los brazos es igual o poco mayor que la del tronco, pero nunca debe alcanzar la rodilla. El ancho debe ser menor que el del tronco.",
                        ),
                        "32" => array(
                            "12. C) PIERNAS PROPORCIONADAS:",
                            "Positivo: La longitud de las piernas puede ser igual a la del tronco o el doble del mismo. El ancho de las piernas debe ser menor que el del tronco.",
                        ),
                        "33" => array(
                            "12. D) PIES PROPORCIONADOS:",
                            "Positivo: El largo del pie debe ser mayor que la distancia de la suela al empeine. La longitud no excederá del tercio de la pierna ni será menor que un décimo de la misma. Cuando aparece un pie en perspectiva en los dibujos de frente.",
                        ),
                        "34" => array(
                            "12. E) BRAZO Y PIERNAS REPRESENTADOS EN DOS DIMENSIONES:",
                            "Positivo: Cuando se cumplen con el ítem, aun cuando las manos sean simples líneas.",
                        ),
                        "35" => array(
                            "13. REPRESENTACIÓN DEL TACO:",
                            "Positivo: Cualquier forma que represente claramente el taco. También en los dibujos de frente con pie en perspectiva.",
                        ),
                        "36" => array(
                            "14. A) COORDINACION MOTORA EN PRIMER GRADO:",
                            "Positivo: Todas las líneas deben estar tratadas con cierta firmeza, los puntos de unión entre ellas serán netos, sin tendencia a entrecruzarlas o superponerlas o dejar espacios en blanco entre dos extremos especialmente en dibujos de pocas líneas.",
                        ),
                        "37" => array(
                            "14. B) COORDINACION MOTORA DE SEGUNDO GRADO:",
                            "Positivo: Todas las líneas trazadas firmemente y con unión correcta. (Si 34 A fuese negativo no cabría un 34 B positivo). Puntúese estrictamente.",
                        ),
                        "38" => array(
                            "14. C) COORDINACION MOTORA. CONTORNO DE LA CABEZA:",
                            "Positivo: Contorno de cabeza sin irregularidad no intencionada. Cuando el dibujo de cabeza acuse un progreso sobre las rudimentarias formas del círculo y la elipse.",
                        ),
                        "39" => array(
                            "14. D) COORDINACION MOTORA, CONTORNO DEL TRONCO:",
                            "Positivo: Lo mismo del ítem anterior pero con referencia al tronco; Negativo: El círculo o la elipse primitiva.",
                        ),
                        "40" => array(
                            "14. E) COORDINACION MOTORA, BRAZOS Y PIERNAS:",
                            "Positivo: Brazos y piernas sin irregularidades y sin estrechamientos en sus inserciones en el tronco. Miembros superiores e inferiores representados en dos dimensiones.",
                        ),
                        "41" => array(
                            "14. F) COORDINACION MOTORA, FACCIONES:",
                            "Positivo: Relaciones de simetría en las facciones. Ojos equidistantes de la nariz y de las comisuras de los labios; no deben estar en contacto absurdo con las líneas del contorno de la cabeza. La nariz de forma simétrica debe estar ubicada sobre el punto medio de la boca.",
                        ),
                        "42" => array(
                            "15.A) PRESENCIA DE LA OREJA:",
                            "Positivo: Cualquier representación clara de oreja (dos en los dibujos de frente y una en los de perfil)",
                        ),
                        "43" => array(
                            "15. B) OREJAS PROPORCIONADAS Y CORRECTAMENTE UBICADAS:",
                            "Positivo: Diámetro vertical mayor que el horizontal. En las figuras de perfil un simple detalle indicador, por ejemplo: un punto que represente el conducto auditivo.",
                        ),
                        "44" => array(
                            "16. A) DETALLES DEL OJO, CEJAS, PESTAÑAS, O AMBAS:",
                            "Positivo: Cualquier método claro de representarlas.",
                        ),
                        "45" => array(
                            "16. B) DETALLE DEL OJO, PUPILA:",
                            "Positivo: Cuando están representados en ambos ojos.",
                        ),
                        "46" => array(
                            "16. C) DETALLE DEL OJO, PROPORCIÓN:",
                            "Positivo: Diámetro horizontal mayor que el vertical. Cuando aparecen los dos ojos, ambos satisfarán el requisito, pero si fuese uno visible, bastará con uno.",
                        ),
                        "47" => array(
                            "16. D) DETALLE DEL OJO. MIRADA:",
                            "Positivo: La cara debe verse de perfil. La pupila debe señalarse desplazada hacia delante",
                        ),
                        "48" => array(
                            "17. A) REPRESENTACIÓN DE LA FRENTE Y DEL MENTÓN:",
                            "Positivo: En el dibujo de frente deben aparecer los ojos y la boca lo suficientemente separados del contorno de la cabeza como para dejar sendos espacios que representan la frente y la barbilla. El dibujo de perfil, cuando se hayan omitido la boca y los ojos, siempre que el contorno de la cara exprese claramente las prominencias de la frente y del mentón.",
                        ),
                        "49" => array(
                            "17. B) REPRESENTACIÓN DE LA PROYECCIÓN DEL MENTÓN, BARBILLA CLARAMENTE DIFERENCIADA DEL LABIO INFERIOR:",
                            "Positivo: Este ítem debe acreditarse con escasa frecuencia, excepto en los dibujos de perfil. En los dibujos de frente cuando el mentón suele modelarse de algún modo, por ej.: mediante una línea curva debajo del labio inferior.",
                        ),
                        "50" => array(
                            "17. C) PERFIL SIN MÁS DE UN ERROR:",
                            "Positivo: La cabeza, el tronco y los pies, deben verse de perfil sin errores. El dibujo completo podrá contener uno y no más de los errores siguientes: a) Una transparencia (que vea el contorno a través del brazo; b) piernas que no estén de perfil; c) Brazos unidos al borde de la espalda y que se extienden hacia delante.",
                        ),
                        "51" => array(
                            "17. D) PERFIL CORRECTO:",
                            "Positivo: La figura debe mostrar un perfil correcto o transparencia. Puede exceptuarse la perspectiva del ojo.",
                        ),
                    ];

                    


                    foreach ($ArreglosCampos as $key => $value) {
                        $Items = $value[0];
                        $Criterio = $value[1];
                        $Identificacion = $key;


                        $ClaseRadios = "CamposTestGoodenough";
                        echo "
                        <tr>
                            <td> $Items </td>
                            <td> $Criterio </td>
                            <td>
                                <input type='radio' name='ExamenFisico[RendimientoEscolar][GOODENOUGHT][$Identificacion][$Items $Criterio]' value='1' style='width: 25px;height: 25px;' class='$ClaseRadios RequiredGOODENOUGH_Radio'>
                            </td>
                            <td>
                                <input type='radio' name='ExamenFisico[RendimientoEscolar][GOODENOUGHT][$Identificacion][$Items $Criterio]' value='0' style='width: 25px;height: 25px;' class='$ClaseRadios RequiredGOODENOUGH_Radio'>
                            </td>
                        </tr>";

                        
                    }

                    $MesesNacido_Anexo9 = $MesesNacido_Anexo9;//meses de nacido del paciente viene del php princpial RIAS_Historias.php


                    /*
                    // 3 años - 0 meses
                    $ArregloPuntajeMental["36"] = "0";
                    // 3 años - 3 meses
                    $ArregloPuntajeMental["39"] = "0";
                    // 3 años - 6 meses
                    $ArregloPuntajeMental["42"] = "2";
                    $ArregloPuntajeMental["45"] = "3";
                    $ArregloPuntajeMental["48"] = "4";
                    $ArregloPuntajeMental["51"] = "5";
                    $ArregloPuntajeMental["54"] = "6";
                    $ArregloPuntajeMental["57"] = "7";
                    $ArregloPuntajeMental["60"] = "8";
                    $ArregloPuntajeMental["63"] = "9";
                    $ArregloPuntajeMental["66"] = "10";
                    $ArregloPuntajeMental["69"] = "11";
                    $ArregloPuntajeMental["72"] = "12";
                    $ArregloPuntajeMental["75"] = "13";
                    $ArregloPuntajeMental["78"] = "14";
                    $ArregloPuntajeMental["81"] = "15";
                    $ArregloPuntajeMental["84"] = "16";
                    $ArregloPuntajeMental["87"] = "17";
                    $ArregloPuntajeMental["90"] = "18";
                    $ArregloPuntajeMental["93"] = "19";
                    $ArregloPuntajeMental["96"] = "20";
                    $ArregloPuntajeMental["99"] = "21";
                    $ArregloPuntajeMental["102"] = "22";
                    $ArregloPuntajeMental["105"] = "23";
                    $ArregloPuntajeMental["108"] = "24";
                    $ArregloPuntajeMental["111"] = "25";
                    $ArregloPuntajeMental["114"] = "26";
                    $ArregloPuntajeMental["117"] = "27";
                    $ArregloPuntajeMental["120"] = "28";
                    $ArregloPuntajeMental["123"] = "29";
                    $ArregloPuntajeMental["126"] = "30";
                    $ArregloPuntajeMental["129"] = "31";
                    $ArregloPuntajeMental["132"] = "32";
                    $ArregloPuntajeMental["135"] = "33";
                    $ArregloPuntajeMental["138"] = "34";
                    $ArregloPuntajeMental["141"] = "35";
                    $ArregloPuntajeMental["144"] = "36";
                    $ArregloPuntajeMental["147"] = "37";
                    $ArregloPuntajeMental["150"] = "38";
                    $ArregloPuntajeMental["153"] = "39";
                    $ArregloPuntajeMental["156"] = "40";
                    $ArregloPuntajeMental["159"] = "41";
                    $ArregloPuntajeMental["162"] = "42";
                    */
                    ?>

                </tbody>
            </table>

            <div class="col-md-12">
                <br>
                <h4 class="text-bold text-center"> Conversión de Puntaje en Edad Mental según Goodenough </h4>
                <br>
            </div>


            <table class="table table-bordered">
            <thead>
            <tr>
                <td class="tg-0lax" colspan="2">Años</td>
                <td class="tg-fgwq">3</td>
                <td class="tg-bn54">4</td>
                <td class="tg-0pky">5</td>
                <td class="tg-0pky">6</td>
                <td class="tg-0pky">7</td>
                <td class="tg-0pky">8</td>
                <td class="tg-0pky">9</td>
                <td class="tg-0pky">10</td>
                <td class="tg-0pky">11</td>
                <td class="tg-0pky">12</td>
                <td class="tg-0pky">13</td>
                <td class="tg-0pky" ></td>
            </tr>
            <tr>
                <td class="tg-0lax" rowspan="4" style="vertical-align: middle; text-align: center;">Meses</td>
                <td class="tg-0pky">0</td>
                <td class="tg-0pky">-</td>
                <td class="tg-0pky">4</td>
                <td class="tg-0pky">8</td>
                <td class="tg-0pky">12</td>
                <td class="tg-0pky">16</td>
                <td class="tg-0pky">20</td>
                <td class="tg-0pky">24</td>
                <td class="tg-0pky">28</td>
                <td class="tg-0pky">32</td>
                <td class="tg-0pky">36</td>
                <td class="tg-0pky">40</td>
                <td class="tg-0pky" rowspan="4" style="vertical-align: middle; text-align: center;">Puntaje</td>
            </tr>
            <tr>
                <td class="tg-0pky">3</td>
                <td class="tg-0pky">-</td>
                <td class="tg-0pky">5</td>
                <td class="tg-0pky">9</td>
                <td class="tg-0pky">13</td>
                <td class="tg-0pky">17</td>
                <td class="tg-0pky">21</td>
                <td class="tg-0pky">25</td>
                <td class="tg-0pky">29</td>
                <td class="tg-0pky">33</td>
                <td class="tg-0pky">37</td>
                <td class="tg-0pky">41</td>
            </tr>
            <tr>
                <td class="tg-0pky">6</td>
                <td class="tg-0pky">2</td>
                <td class="tg-0pky">6</td>
                <td class="tg-0pky">10</td>
                <td class="tg-0pky">14</td>
                <td class="tg-0pky">18</td>
                <td class="tg-0pky">22</td>
                <td class="tg-0pky">26</td>
                <td class="tg-0pky">30</td>
                <td class="tg-0pky">34</td>
                <td class="tg-0pky">38</td>
                <td class="tg-0pky">42</td>
            </tr>
            <tr>
                <td class="tg-0pky">9</td>
                <td class="tg-0pky">3</td>
                <td class="tg-0pky">7</td>
                <td class="tg-0pky">11</td>
                <td class="tg-0pky">15</td>
                <td class="tg-0pky">19</td>
                <td class="tg-0pky">23</td>
                <td class="tg-0pky">27</td>
                <td class="tg-0pky">31</td>
                <td class="tg-0pky">35</td>
                <td class="tg-0pky">39</td>
                <td class="tg-0pky">-</td>
            </tr>
            </thead>
            </table>


            <div class='form-group col-md-12'>
                <label>Puntaje</label><br>
                <input type="text" class='form-control input-lg' id="PuntajeGoodenough" name='ExamenFisico[RendimientoEscolar][DatosTestGoodenough][Puntaje][Puntaje]' readOnly>
            </div>


            <div class='form-group col-md-12'>
                <label>E.M</label><br>
                <input type="text" class='form-control input-lg' required name='ExamenFisico[RendimientoEscolar][DatosTestGoodenough][E.M][E.M]'  value="" id='emInput' oninput="calcularCI()">
            </div>

            <div class='form-group col-md-12'>
                <label>E.C</label><br>
                <input type="text" class='form-control input-lg' required name='ExamenFisico[RendimientoEscolar][DatosTestGoodenough][E.C][E.C]' placeholder="<?=$MesesNacido_Anexo9;?>" value="<?=$MesesNacido_Anexo9;?>" id='ecInput' oninput="calcularCI()">
            </div>

            <div class='form-group col-md-12'>
                <label>C.I</label><br>
                <input type="text" class='form-control input-lg' name='ExamenFisico[RendimientoEscolar][DatosTestGoodenough][C.I][C.I]' value="" id='ciInput' readOnly>
            </div>

            <div class='form-group col-md-12'>
                <label style="color: red;">Nota: El valor de  E.M y E.C son en meses ya que el campos E.C traera la edad del paciente en meses, ademas en el E.C en el fondo del campo estara el valor en meses para que lo puedan ingresar</label>
            </div>
            
            <script>
                function calcularCI() {
                    var emValue = parseFloat($('#emInput').val()) || 0;
                    var ecValue = parseFloat($('#ecInput').val()) || 0;

                    if (emValue && ecValue) {
                        var ciValue = (emValue / ecValue) * 100;
                        ciValue = ciValue.toFixed(2);
                        $('#ciInput').val(ciValue);
                    } else {
                        // Si uno de los campos no tiene valor, puedes manejar la lógica aquí
                        $('#ciInput').val('');
                    }
                }

                var radios = document.querySelectorAll('.CamposTestGoodenough');
                var vale5Field = document.getElementById('PuntajeGoodenough');

                radios.forEach(function(radio) {
                    radio.addEventListener('change', updateCount);
                });

                function updateCount() {
                    // Filtrar solo los radio buttons checkeados y con valor igual a 0
                    var checkedRadios = Array.from(radios).filter(function(radio) {
                        return radio.checked && radio.value === "1";
                    });

                    // Actualizar el valor del campo con la cantidad de radios checkeados y con valor igual a 0
                    vale5Field.value = checkedRadios.length;
                }

            </script>
                
            <div class="col-md-12">
                <br>
                <h4 class="text-bold text-center"> Valoracion Coeficiente Intelectual </h4>
                <br>
            </div>

            <table class="table table-bordered">
            <thead>
            <tr>
                <th class="tg-0pky">C.I</th>
                <th class="tg-0pky">Diagnósticos</th>
                <th class="tg-0pky">C.I</th>
                <th class="tg-0pky">Diagnósticos</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tg-0pky">150</td>
                <td class="tg-0pky">Genialidad</td>
                <td class="tg-0pky">70 – 79</td>
                <td class="tg-0pky">Debilidad mental, leve torpeza</td>
            </tr>
            <tr>
                <td class="tg-0pky">140 – 149</td>
                <td class="tg-0pky">Casi genialidad</td>
                <td class="tg-0pky">50 – 69</td>
                <td class="tg-0pky">Debilidad mental, bien definida</td>
            </tr>
            <tr>
                <td class="tg-0pky">120 – 139</td>
                <td class="tg-0pky">Inteligencia muy superior</td>
                <td class="tg-0pky">20 – 49</td>
                <td class="tg-0pky">Imbecilidad</td>
            </tr>
            <tr>
                <td class="tg-0pky">110 – 119</td>
                <td class="tg-0pky">Inteligencia superior</td>
                <td class="tg-0pky">0 – 19</td>
                <td class="tg-0pky">Idiotez</td>
            </tr>
            <tr>
                <td class="tg-0pky">90 – 109</td>
                <td class="tg-0pky">Inteligencia normal o mediana</td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
            </tr>
            <tr>
                <td class="tg-0pky">80 – 89</td>
                <td class="tg-0pky">Inteligencia lenta</td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
            </tr>
            </tbody>
            </table>


        </div>
    </div>
</div>
