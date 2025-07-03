<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-bold text-center"> Lista factores de riesgo enfermedades del oído </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Del nacimiento a 5 meses de edad </th>
                        <th>Si</th>
                        <th>No</th>
                    </tr>
                </thead>
                <tbody>


                    <?php
                    $ArreglosCampos = [
                        "1" => "Reacciona a los sonidos fuertes.",
                        "2" => "Vuelve la cabeza hacia la fuente de sonido." ,
                        "3" => "Observa su cara cuando usted habla." ,
                        "4" => "Vocaliza sonidos placenteros y desagradables (ríe, se ríe tontamente--risilla--, llora o se alborota)." ,
                        "5" => "Hace ruidos cuando conversan con él o ella." ,
                    ];


                    foreach ($ArreglosCampos as $key => $value) {
                        $Titulo = $value;
                        $Identificacion = $key;
                    
                        echo"
                        <tr>
                            <td class='Anexo4_5Meses'>{$Titulo}</td>
                            <td class='Anexo4_5Meses'>
                                <input type='radio' name='ExamenFisico[SaludAuditiva][Anexo4][$Identificacion][$Titulo]' value='1' style='width: 25px;height: 25px;' >
                            </td>
                            <td class='Anexo4_5Meses'>
                                <input type='radio' name='ExamenFisico[SaludAuditiva][Anexo4][$Identificacion][$Titulo]' value='0' style='width: 25px;height: 25px;' >
                            </td>
                        </tr>";

                    }

                    echo "<tr>
                        <th>6-11 Meses </th>
                        <th>Si</th>
                        <th>No</th>
                    </tr>";

                    $ArreglosCampos = [
                        "6" => "Comprende cuando le dicen *no*.",
                        "7" => "Balbucea (dice *ba-ba-ba* o *ma-ma-ma*)." ,
                        "8" => "Trata de comunicarse con acciones o gestos." ,
                        "9" => "Trata de repetir los sonidos que hace." ,
                    ];


                    foreach ($ArreglosCampos as $key => $value) {
                        $Titulo = $value;
                        $Identificacion = $key;
                    
                        echo"
                        <tr>
                            <td class='Anexo4_6-11Meses'>{$Titulo}</td>
                            <td class='Anexo4_6-11Meses'>
                                <input type='radio' name='ExamenFisico[SaludAuditiva][Anexo4][$Identificacion][$Titulo]' value='1' style='width: 25px;height: 25px;' >
                            </td>
                            <td class='Anexo4_6-11Meses'>
                                <input type='radio' name='ExamenFisico[SaludAuditiva][Anexo4][$Identificacion][$Titulo]' value='0' style='width: 25px;height: 25px;' >
                            </td>
                        </tr>";

                    }


                    echo "<tr>
                        <th>12-17 Meses </th>
                        <th>Si</th>
                        <th>No</th>
                    </tr>";

                    $ArreglosCampos = [
                        "10" => "Pone atención en un libro o juguete al menos por 2 minutos.",
                        "11" => "Sigue instrucciones sencillas acompañadas por gestos." ,
                        "12" => "Responde preguntas simples con gesticulaciones." ,
                        "13" => "Apunta a objetos, pinturas o fotos y a los miembros de la familia." ,
                        "14" => "Utiliza entre dos a tres palabras para identificar a una persona u objeto (quizás la pronunciación no es clara)." ,
                        "15" => "Trata de imitar palabras simples." ,
                    ];


                    foreach ($ArreglosCampos as $key => $value) {
                        $Titulo = $value;
                        $Identificacion = $key;
                    
                        echo"
                        <tr>
                            <td class='Anexo4_12-17Meses'>{$Titulo}</td>
                            <td class='Anexo4_12-17Meses'>
                                <input type='radio' name='ExamenFisico[SaludAuditiva][Anexo4][$Identificacion][$Titulo]' value='1' style='width: 25px;height: 25px;' >
                            </td>
                            <td class='Anexo4_12-17Meses'>
                                <input type='radio' name='ExamenFisico[SaludAuditiva][Anexo4][$Identificacion][$Titulo]' value='0' style='width: 25px;height: 25px;' >
                            </td>
                        </tr>";

                    }

                    

                    echo "<tr>
                        <th>18-23 Meses </th>
                        <th>Si</th>
                        <th>No</th>
                    </tr>";

                    $ArreglosCampos = [
                        "16" => "Disfruta que le lean.",
                        "17" => "Sigue órdenes simples sin usar gesticulaciones.",
                        "18" => "Señala partes del cuerpo simples como la *nariz*.",
                        "19" => "Comprende verbos simples como *comer* o *dormir*.",
                        "20" => "Pronuncia correctamente la mayoría de las vocales y las letras n, m, p, h, especialmente al comienzo de las sílabas y en palabras cortas. También empieza a usar otros sonidos.",
                        "21" => "Dice entre 8 y 10 palabras (quizás la pronunciación todavía es poco clara).",
                        "22" => "Pide alimentos comunes por su nombre.",
                        "23" => "Hace sonidos de animales como *muuuu*.",
                        "24" => "Comienza a combinar palabras tales como *más leche*. ",
                        "25" => "Empieza a usar pronombres posesivos como *mío*.",
                    ];
                    
                    foreach ($ArreglosCampos as $key => $value) {
                        $Titulo = $value;
                        $Identificacion = $key;
                    
                        echo "
                        <tr>
                            <td class='Anexo4_18-23Meses'>{$Titulo}</td>
                            <td class='Anexo4_18-23Meses'>
                                <input type='radio' name='ExamenFisico[SaludAuditiva][Anexo4][$Identificacion][$Titulo]' value='1' style='width: 25px;height: 25px;' >
                            </td>
                            <td class='Anexo4_18-23Meses'>
                                <input type='radio' name='ExamenFisico[SaludAuditiva][Anexo4][$Identificacion][$Titulo]' value='0' style='width: 25px;height: 25px;' >
                            </td>
                        </tr>";
                    }


                    echo "
                    <tr>
                        <th>2-3 Años</th>
                        <th>Sí</th>
                        <th>No</th>
                    </tr>";


                    $ArreglosCampos = [
                        "26" => "A los 24 meses de edad ya conoce alrededor de 50 palabras.",
                        "27" => "Conoce algunos conceptos de espacio tales como *en* o *sobre*.",
                        "28" => "Conoce pronombres tales como *tú*, *yo*, *ella*.",
                        "29" => "Conoce palabras descriptivas tales como *grande* o *feliz*.",
                        "30" => "A los 24 meses de edad ya dice cerca de 40 palabras.",
                        "31" => "El habla--pronunciación de las palabras--se torna más exacta, pero todavía no pronuncia los sonidos finales de la palabra. Las personas desconocidas pueden no comprender gran parte de lo que se dice.",
                        "32" => "Responde a preguntas simples.",
                        "33" => "Comienza a usar más pronombres como *ustedes* o *yo*.",
                        "34" => "Habla con oraciones compuestas de dos o tres palabras.",
                        "35" => "Usa inflexiones en la voz para pedir algo (por ejemplo, *¿mi pelota?*).",
                        "36" => "Empieza a usar plurales como *zapatos* o *calcetines* y los verbos en pasado simple como *salté*.",
                    ];
                    
                    foreach ($ArreglosCampos as $key => $value) {
                        $Titulo = $value;
                        $Identificacion = $key;
                    
                        echo "
                        <tr>
                            <td class='Anexo4_2-3Anual'>{$Titulo}</td>
                            <td class='Anexo4_2-3Anual'>
                                <input type='radio' name='ExamenFisico[SaludAuditiva][Anexo4][$Identificacion][$Titulo]' value='1' style='width: 25px;height: 25px;' >
                            </td>
                            <td class='Anexo4_2-3Anual'>
                                <input type='radio' name='ExamenFisico[SaludAuditiva][Anexo4][$Identificacion][$Titulo]' value='0' style='width: 25px;height: 25px;' >
                            </td>
                        </tr>";
                    }


                    echo "
                            <tr>
                                <th>3-4 Años</th>
                                <th>Sí</th>
                                <th>No</th>
                            </tr>";

                    $ArreglosCampos = [
                        "37" => "Agrupa objetos tales como alimentos, ropa, etc.",
                        "38" => "Identifica los colores.",
                        "39" => "Usa la mayoría de los sonidos, pero puede distorsionar algunos de los sonidos más difíciles como j, s, ch, rr, r. Estos sonidos no pueden dominarse plenamente hasta la edad 7 u 8 años.",
                        "40" => "Usa consonantes al comienzo, al medio y al final de las palabras. Tiene problemas con la pronunciación de las consonantes más difíciles, pero trata de decirlas.",
                        "41" => "Los desconocidos entienden gran parte de lo que el niño dice.",
                        "42" => "Es capaz de describir el uso de los objetos como *tenedor*, *auto*, etc.",
                        "43" => "Se divierte con el idioma. Disfruta los poemas y reconoce los absurdos del idioma como *¿eso es un elefante o tu cabeza?*",
                        "44" => "Expresa ideas y sentimientos en vez de hablar de las cosas que están alrededor de él o ella.",
                        "45" => "Usa verbos que terminan en *ando* tales como *caminando* o *conversando*.",
                        "46" => "Responde a preguntas simples, como por ejemplo, *¿qué hacen ustedes cuando tienen hambre?*",
                        "47" => "Repite oraciones.",
                    ];

                    foreach ($ArreglosCampos as $key => $value) {
                        $Titulo = $value;
                        $Identificacion = $key;

                        echo "
                        <tr>
                            <td class='Anexo4_3-4Anual'>{$Titulo}</td>
                            <td class='Anexo4_3-4Anual'>
                                <input type='radio' name='ExamenFisico[SaludAuditiva][Anexo4][$Identificacion][$Titulo]' value='1' style='width: 25px;height: 25px;' >
                            </td>
                            <td class='Anexo4_3-4Anual'>
                                <input type='radio' name='ExamenFisico[SaludAuditiva][Anexo4][$Identificacion][$Titulo]' value='0' style='width: 25px;height: 25px;' >
                            </td>
                        </tr>";
                    }





                    echo "
                            <tr>
                                <th>4-5 Años</th>
                                <th>Sí</th>
                                <th>No</th>
                            </tr>";

                    $ArreglosCampos = [
                        "48" => "Comprende conceptos de espacio como *atrás* o *cerca de*.",
                        "49" => "Entiende preguntas más complejas.",
                        "50" => "Se entiende lo que dice, pero comete equivocaciones al pronunciar palabras largas, difíciles o complejas como *hipopótamo*.",
                        "51" => "Dice entre 200 y 300 palabras distintas.",
                        "52" => "Usa algunos verbos irregulares en tiempo pasado tales como *hubo* o *cayó*.",
                        "53" => "Describe cómo hacer cosas, por ejemplo, un dibujo.",
                        "54" => "Define palabras.",
                        "55" => "Enumera elementos que pertenecen a una categoría en particular, como por ejemplo, animales, vehículos, etc.",
                        "56" => "Responde con preguntas de *¿por qué?*",
                    ];

                    foreach ($ArreglosCampos as $key => $value) {
                        $Titulo = $value;
                        $Identificacion = $key;

                        echo "
                        <tr>
                            <td class='Anexo4_4-5Anual'>{$Titulo}</td>
                            <td class='Anexo4_4-5Anual'>
                                <input type='radio' name='ExamenFisico[SaludAuditiva][Anexo4][$Identificacion][$Titulo]' value='1' style='width: 25px;height: 25px;' >
                            </td>
                            <td class='Anexo4_4-5Anual'>
                                <input type='radio' name='ExamenFisico[SaludAuditiva][Anexo4][$Identificacion][$Titulo]' value='0' style='width: 25px;height: 25px;' '>
                            </td>
                        </tr>";
                    }







                    
                    echo "
                            <tr>
                                <th>5 Años</th>
                                <th>Sí</th>
                                <th>No</th>
                            </tr>";

                    $ArreglosCampos = [
                        "57" => "Entiende más de 2.000 palabras.",
                        "58" => "Entiende secuencias de tiempo (lo que sucedió primero, segundo, tercero, etc.).",
                        "59" => "Ejecuta instrucciones en tres pasos.",
                        "60" => "Entiende rimas (versos).",
                        "61" => "Participa en conversaciones.",
                        "62" => "Las oraciones pueden ser de 8 o más palabras.",
                        "63" => "Usa oraciones compuestas y complejas.",
                        "64" => "Describe objetos.",
                        "65" => "Usa la imaginación para crear historias.",
                    ];

                    foreach ($ArreglosCampos as $key => $value) {
                        $Titulo = $value;
                        $Identificacion = $key;

                        echo "
                        <tr>
                            <td class='Anexo4_5Anual'>{$Titulo}</td>
                            <td class='Anexo4_5Anual'>
                                <input type='radio' name='ExamenFisico[SaludAuditiva][Anexo4][$Identificacion][$Titulo]' value='1' style='width: 25px;height: 25px;' >
                            </td>
                            <td class='Anexo4_5Anual'>
                                <input type='radio' name='ExamenFisico[SaludAuditiva][Anexo4][$Identificacion][$Titulo]' value='0' style='width: 25px;height: 25px;' >
                            </td>
                        </tr>";
                    }





                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    
    function aplicarColorSegunMesesOidos(meses) {
    // Obtener elementos con las clases correspondientes
    var elementos5Meses = document.getElementsByClassName('Anexo4_5Meses');
    var elementos6_11Meses = document.getElementsByClassName('Anexo4_6-11Meses');
    var elementos12_17Meses = document.getElementsByClassName('Anexo4_12-17Meses');
    var elementos18_23Meses = document.getElementsByClassName('Anexo4_18-23Meses');
    var elementos2_3Anual = document.getElementsByClassName('Anexo4_2-3Anual');
    var elementos3_4Anual = document.getElementsByClassName('Anexo4_3-4Anual');
    var elementos4_5Anual = document.getElementsByClassName('Anexo4_4-5Anual');
    var elementos5Anual = document.getElementsByClassName('Anexo4_5Anual');

    // Convertir el valor a entero
    meses = parseInt(meses);

    // Verificar en qué rango de meses se encuentra y aplicar el color correspondiente
    if (meses >= 0 && meses <= 5) {
        cambiarColorOidos(elementos5Meses, '#00800038');
    } else if (meses >= 6 && meses <= 11) {
        cambiarColorOidos(elementos6_11Meses, '#00800038');
    } else if (meses >= 12 && meses <= 17) {
        cambiarColorOidos(elementos12_17Meses, '#00800038');
    } else if (meses >= 18 && meses <= 23) {
        cambiarColorOidos(elementos18_23Meses, '#00800038');
    } else if (meses >= 24 && meses <= 36) {
        cambiarColorOidos(elementos2_3Anual, '#00800038');
    } else if (meses >= 37 && meses <= 48) {
        cambiarColorOidos(elementos3_4Anual, '#00800038');
    } else if (meses >= 49 && meses <= 60) {
        cambiarColorOidos(elementos4_5Anual, '#00800038');
    } else if (meses >= 61) {
        cambiarColorOidos(elementos5Anual, '#00800038');
    }
}

// Función para cambiar el color de fondo de los elementos
function cambiarColorOidos(elementos, color) {
    for (var i = 0; i < elementos.length; i++) {
        elementos[i].style.backgroundColor = color;

        var inputs = elementos[i].querySelectorAll('input');
        inputs.forEach(function(input) {
            input.classList.add('RequiredFACTORESRIESGO1_Radio');
        });
    }
}

// Ejemplo de uso
var meses = '<?=$MesesNacio_Paciente;?>'; // Cambia esto con el valor de meses que tengas
aplicarColorSegunMesesOidos(meses);

</script>