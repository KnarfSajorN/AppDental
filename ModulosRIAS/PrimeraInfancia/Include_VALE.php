<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-bold text-center">VALE</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h4 class="text-bold text-center">Riesgos generales</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th rowspan="2">Rango de edad</th>
                        <th rowspan="2">Condiciones perinatales y posnatales</th>
                        <th colspan="2">Respuesta</th>
                    </tr>
                    <tr>
                        <th>Si</th>
                        <th>No</th>
                    </tr>
                </thead>
                <tbody>


                    <?php
                    if($MesesNacio_Paciente < 24){
                        $ClaseMenores2VAlERG="RequiredVALERIESGOSGENERALES_Radio";
                        $ClaseMenores2VAlERG_BG = "bg-success";
                    }
                    $ClaseTodoVALERG="RequiredVALERIESGOSGENERALESTODOS_Radio";
                    $ClaseTodoVALERG_BG = "bg-success";

                    $ArreglosCampos = [
                        "1" => "Bajo peso al nacer (menor de 1500 gr)",
                        "2" => "Nació antes de las 30 semanas de gestación (Prematuro extremo)" ,
                        "3" => "Estancia superior a 30 días en la unidad de cuidados intensivos neonatales." ,
                    ];

                    echo "<tr>
                    <td class='' rowspan='4'> Menores de 2 años </td>
                    </tr>";

                    foreach ($ArreglosCampos as $key => $value) {
                        $Titulo = $value;
                        $Identificacion = $key;
                    
                        echo"
                        <tr>

                            <td class='{$ClaseMenores2VAlERG_BG}'> {$Titulo} </td>
                            <td class='{$ClaseMenores2VAlERG_BG}'>
                                <input type='radio' class='$ClaseMenores2VAlERG' name='ExamenFisico[SaludAuditiva][VALE][$Identificacion][$Titulo]' value='1' style='width: 25px;height: 25px;' >
                            </td>
                            <td class='{$ClaseMenores2VAlERG_BG}'>
                                <input type='radio' class='$ClaseMenores2VAlERG' name='ExamenFisico[SaludAuditiva][VALE][$Identificacion][$Titulo]' value='0' style='width: 25px;height: 25px;' >
                            </td>
                        </tr>";

                    }

                    $ArreglosCampos = [
                        "4" => "¿Antes, durante o poco después del nacimiento hubo alguna complicación?",
                        "5" => "¿El niño / niña ha sido diagnosticado(a) con alguna condición de salud?" ,
                        "6" => "¿Hay alguna condición de riesgo social (maltrato, abandono, otras) en la que se encuentre el niño?" ,
                        "7" => "¿El niño presenta dificultades en el aprendizaje de la lectura y la escritura o en su desempeño escolar?",
                    ];

                    echo "<tr>
                    <td class='' rowspan='5'>Todas las edades  </td>
                    </tr>";
                    foreach ($ArreglosCampos as $key => $value) {
                        $Titulo = $value;
                        $Identificacion = $key;
                    
                        echo"
                        <tr>
                            
                            <td class='{$ClaseTodoVALERG_BG}'> {$Titulo} </td>
                            <td class='{$ClaseTodoVALERG_BG}'>
                                <input type='radio' class='$ClaseTodoVALERG' name='ExamenFisico[SaludAuditiva][VALE][$Identificacion][$Titulo]' value='1' style='width: 25px;height: 25px;' >
                            </td>
                            <td class='{$ClaseTodoVALERG_BG}'>
                                <input type='radio' class='$ClaseTodoVALERG' name='ExamenFisico[SaludAuditiva][VALE][$Identificacion][$Titulo]' value='0' style='width: 25px;height: 25px;' >
                            </td>
                        </tr>";

                    }




                    ?>

                </tbody>
            </table>
        </div>

        
        <div class="col-md-12">
            <br><br>
            <hr>
            <br><br>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-bold text-center">Condiciones estructurales</h4>
            </div>
        </div>
        
        <div class="col-md-12">
            <br><br>
            <hr>
            <br><br>
        </div>

        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th rowspan="2">Rango de edad</th>
                        <th rowspan="2">Condiciones estructurales</th>
                        <th colspan="2">Presencia</th>
                        <th colspan="2">Integridad</th>
                    </tr>
                    <tr>
                        <th>Si</th>
                        <th>No</th>
                        <th>Si</th>
                        <th>No</th>
                    </tr>
                </thead>
                <tbody>

                    
                    <?php

                    $ArreglosCampos = [
                        "1" => "Orejas",
                        "2" => "Labios" ,
                        "3" => "Lengua" ,
                        "4" => "Nariz",
                        "5" => "Paladar" ,
                        "6" => "Ojos" ,
                        "7" => "Dientes" ,
                        "8" => "Cuello" ,
                        "9" => "Hombros"
                    ];

                    echo "<tr>
                    <td class='' rowspan='10'> Todas las Edades </td>
                    </tr>";

                    foreach ($ArreglosCampos as $key => $value) {
                        $Titulo = $value;
                        $Identificacion = $key;
                    
                        echo"
                        <tr>

                            <td class=''> {$Titulo} </td>
                            <td class=''>
                                <input type='radio' class='RequiredVALECESTRUCTURAL_Radio' name='ExamenFisico[SaludAuditiva][VALE_2][$Identificacion][$Titulo][Presencia]' value='1' style='width: 25px;height: 25px;' >
                            </td>
                            <td class=''>
                                <input type='radio' class='RequiredVALECESTRUCTURAL_Radio' name='ExamenFisico[SaludAuditiva][VALE_2][$Identificacion][$Titulo][Presencia]' value='0' style='width: 25px;height: 25px;' >
                            </td>

                            <td class=''>
                                <input type='radio' class='RequiredVALECESTRUCTURAL_Radio' name='ExamenFisico[SaludAuditiva][VALE_2][$Identificacion][$Titulo][Integridad]' value='1' style='width: 25px;height: 25px;' >
                            </td>
                            <td class=''>
                                <input type='radio' class='RequiredVALECESTRUCTURAL_Radio' name='ExamenFisico[SaludAuditiva][VALE_2][$Identificacion][$Titulo][Integridad]' value='0' style='width: 25px;height: 25px;' >
                            </td>

                        </tr>";

                    }

                    ?>

                </tbody>
            </table>
        </div>



        <div class="col-md-12">
            <br><br>
            <hr>
            <br><br>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-bold text-center">Items de Valoracion</h4>
            </div>
        </div>
        
        <div class="col-md-12">
            <br><br>
            <hr>
            <br><br>
        </div>



        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th rowspan="2">Rango de edad</th>
                        <th rowspan="2">Reporte de padres</th>
                        <th rowspan="2">Observacion directa</th>
                        <th colspan="2">Respuesta</th>
                    </tr>
                    <tr>
                        <th>Si</th>
                        <th>No</th>
                    </tr>
                </thead>
                <tbody>

                    
                    <?php

                    $ArreglosCampos = [
                        "1" => array(
                            "C: Cuando en casa se cierra una puerta, se cae un objeto o se escucha un ruido muy fuerte ¿el bebé se mueve, se queda quieto o llora? ",
                            "C: El evaluador produce un ruido fuerte fuera del campo visual, pero cerca del bebé y observa que emite alguna respuesta como: sobresalto, llorar, interrumpir actividad",
                            "C"
                        ),
                        "2" => array(
                            "E: ¿Usted siente diferencias en el llanto del bebé dependiendo si es por hambre, por sueño, porque está mojado, o de mal humor?",
                            "E: El evaluador observa (si tiene oportunidad) que el bebé emite llantos diferenciados según necesidades y situaciones",
                            "E"
                        ),
                        "3" => array(
                            "E: ¿El bebé succiona con fuerza el alimento u otros objetos?",
                            "E: El evaluador observa la succión mientras el bebé se alimenta",
                            "E"
                        ),
                        "4" => array(
                            "I: Cuando le habla al bebé, ¿él/ella la/lo mira?",
                            "I: El evaluador observa que el bebé mira al interlocutor cuando este le habla",
                            "I"
                        ),
                        "5" => array(
                            "C: Cuando se escucha una puerta, timbre u otro sonido familiar ¿el bebé voltea la cabeza buscando el sonido?",
                            "C: El evaluador aplaude fuerte fuera del campo visual pero cerca del bebé y observa que el bebé ubica la fuente sonora",
                            "C"
                        ),
                        "6" => array(
                            "E: Cuando alguien le dice repeticiones de gestos y vocalizaciones como vocales *aaa*, *eee* o sílabas mamama o papapa ¿el bebé intenta emitir sonidos similares?",
                            "E: El evaluador se dirige al bebé haciendo producciones como mamama, papapa, y observa que el bebé intenta imitar el sonido",
                            "E"
                        ),
                        "7" => array(
                            "I: Cuando interactúa, juega, canta, habla con su bebé, ¿él/ella hace sonidos o sonríe?",
                            "I: El evaluador observa que en la interacción con su interlocutor el bebé emite respuestas con sonidos o sonrisas.",
                            "I"
                        ),
                        "8" => array(
                            "C: Cuando usted le canta o le conversa ¿el bebé muestra interés?",
                            "C: El evaluador juega, canta, habla con el bebé y observa que el bebé reacciona, responde, ¿muestra interés?",
                            "C"
                        ),
                        "9" => array(
                            "E: Cuando el bebé quiere algo, ¿utiliza sonidos, sílabas palabras o gestos para solicitarlo?",
                            "E: El evaluador interactúa directamente y observa que el niño/a corresponde y hace solicitudes de cosas que quiere.",
                            "E"
                        ),
                        "10" => array(
                            "I: Cuando el bebé tiene alguna necesidad (por ejemplo, quiere algo, está incómodo o tiene hambre), ¿emite balbuceos, sonidos, señala o llora, para satisfacerla?",
                            "I: El evaluador interactúa con el bebé y detecta que él/ella emite balbuceos, hace señalamientos, sonríe, o llora para llamar la atención del interlocutor",
                            "I"
                        ),
                        "11" => array(
                            "C: Cuando las personas le hablan, ¿el niño/a les presta atención?",
                            "C: El evaluador le habla directamente y observa que el niño/a responde con su atención",
                            "C"
                        ),
                        "12" => array(
                            "E: Cuando le dicen palabras nuevas, ¿el niño/a trata de imitarlas?",
                            "E: El evaluador muestra diferentes objetos diciendo sus nombres al niño/a, y observa que él/ella intenta imitarlo.",
                            "E"
                        ),
                        "13" => array(
                            "E: El niño/a consume alimentos como papillas, jugos espesos, o galletas diariamente",
                            "E: El evaluador solicita al acudiente ofrecer al niño/a una compota, papilla u otro alimento diferente a leche y observa si el niño/a lo recibe y lo traga sin atorarse.",
                            "E"
                        ),
                        "14" => array(
                            "I: Cuando el niño/a quiere algún objeto (por ejemplo, un juguete) ¿lo señala y/o hace sonidos para obtenerlo?",
                            "I: El evaluador toma un objeto del niño/a y observa que él/ella lo solicita señalando o emitiendo sonidos",
                            "I"
                        ),
                        "15" => array(
                            "C: Cuando usted le pide al niño/a que le muestre los ojos, la nariz, u otra parte del cuerpo (que él conozca) ¿lo hace?",
                            "C: El evaluador le pide que muestre partes del cuerpo y observa que el niño/a responde en coherencia con la solicitud",
                            "C"
                        ),
                        "16" => array(
                            "E: ¿El niño/a produce sonidos de animales o de objetos conocidos, por ejemplo, gato, vaca, teléfono, etc.?",
                            "E: El evaluador observa que el niño/a reproduce el sonido de diferentes animales y objetos",
                            "E"
                        ),
                        "17" => array(
                            "I: ¿El niño/a toma y trae un objeto cuando quiere jugar con usted?",
                            "I: El evaluador tiene juguetes conocidos cerca del niño/a y observa que los toma y los trae cuando quiere jugar con alguien",
                            "I"
                        ),
                        "18" => array(
                            "C: ¿El niño/a ejecuta acciones u órdenes sencillas cuando alguien se las solicita? Por ejemplo: *donde está la abuela*.",
                            "C: El evaluador observa que el niño/a señala personas conocidas a su alrededor cuando se le solicita.",
                            "C"
                        ),
                        "19" => array(
                            "E: ¿El niño/a dice el nombre de diferentes objetos cotidianos cuando se le pregunta *Qué es esto?*",
                            "E: El evaluador observa que el niño/a nombra diferentes objetos de uso cotidiano.",
                            "E"
                        ),
                        "20" => array(
                            "I: ¿El niño/a pide cosas usando palabras, sílabas o sonidos vocálicos?",
                            "I: El evaluador observa que el niño/a utiliza palabras, sílabas, sonidos vocálicos y gestos para solicitar juguetes u objetos cuando quiere jugar con ellos.",
                            "I"
                        ),
                        "21" => array(
                            "C: ¿El niño/a entiende y ejecuta órdenes? por ejemplo si le dicen: *Trae la cuchara de la cocina*.",
                            "C: El evaluador da al niño/a algunas órdenes directas y observa que las entiende y ejecuta.",
                            "C"
                        ),
                        "22" => array(
                            "E: ¿El niño/a dice cada vez más palabras, incluyendo: *Yo, mío, no, arriba, abajo* y nombres de objetos y acciones cotidianas?",
                            "E: El evaluador observa que el niño/a utiliza nombres de objetos y acciones, y palabras como *Yo, mío, no, arriba, abajo*.",
                            "E"
                        ),
                        "23" => array(
                            "I: ¿El niño/a produce sonidos, sílabas y palabras, acompañadas de gestos, señalamientos, miradas y entonaciones de habla cuando quiere interactuar con otros?",
                            "I: El evaluador observa en la interacción del niño/a, el uso de sonidos, sílabas y palabras acompañadas de gestos, señalamientos, miradas y entonaciones de habla cuando quiere interactuar con alguien.",
                            "I"
                        ),
                        "24" => array(
                            "C: ¿El niño/a utiliza palabras como *Mío, tuyo, suyo, etc.* cuando se le pregunta a quién pertenece algún objeto conocido, por ejemplo: *De quién es esta camisa, ¿de quién es este muñeco?*",
                            "C: El evaluador observa que el niño/a utiliza al menos dos posesivos como *Mío, tuyo, suyo, etc.* cuando se le pregunta a quién pertenece algún objeto conocido.",
                            "C"
                        ),
                        "25" => array(
                            "E: ¿El niño/a se mueve, se emociona, canta, aplaude, cuando le ponen música?",
                            "E: El evaluador pone música y observa que el niño/a trata de acompañarla con algún movimiento.",
                            "E"
                        ),
                        "26" => array(
                            "E: ¿El niño/a muerde alimentos duros (por ejemplo, galletas) y los come sin atorarse?",
                            "E: El evaluador le da al niño/a una galleta y observa si hace buena masticación y no se atora o tose al tragar.",
                            "E"
                        ),
                        "27" => array(
                            "I: ¿El niño/a se muestra interesado por comunicarse, por interactuar, conversar y jugar con otros niños de su edad, en diferentes situaciones?",
                            "I: En interacciones comunicativas naturales entre pares, el evaluador observa interés en el niño/a por comunicarse, interactuar, conversar, y jugar con otros niños de su edad.",
                            "I"
                        ),
                        "28" => array(
                            "C: En narraciones de hechos, cuentos o historias ¿el niño/a responde a preguntas de Qué, ¿Cómo, ¿Cuándo, etc.?",
                            "C: En la visualización y narración de un cuento, el evaluador observa que el niño/a responde a preguntas de Qué, Cómo, Cuándo, etc.",
                            "C"
                        ),
                        "29" => array(
                            "E: ¿El niño/a hace preguntas cuando se presenta una situación nueva para él?",
                            "E: En la interacción comunicativa, el evaluador observa que el niño/a hace diferentes preguntas.",
                            "E"
                        ),
                        "30" => array(
                            "I: ¿El niño/a expresa sus sentimientos, pensamientos, emociones, ideas cuando interactúa con personas cercanas?",
                            "I: En la interacción comunicativa, el evaluador pide al acudiente que le pregunta al niño/a sobre sus sentimientos, pensamientos, emociones e ideas y observa el comportamiento.",
                            "I"
                        ),
                        "31" => array(
                            "C: ¿El niño/a sabe y repite rondas, canciones, cuentos, historias cortas o fragmentos?",
                            "C: El evaluador le solicita al niño/a cantar alguna canción",
                            "C"
                        ),
                        "32" => array(
                            "E: ¿El niño/a habla utilizando frases de al menos cuatro palabras para contar hechos o expresar diferentes situaciones?",
                            "E: El evaluador solicita al niño/a que cuente algo que le sucedió en un contexto particular y observa el uso de frases coherentes de al menos cuatro palabras.",
                            "E"
                        ),
                        "33" => array(
                            "I: ¿El niño/a comprende y responde cuando las personas saludan, se despiden, dicen *gracias* o *por favor*?",
                            "I: El evaluador identifica que el niño/a hace uso de reglas sociales, de manera guiada o espontáneamente, durante el contacto comunicativo",
                            "I"
                        ),
                        "34" => array(
                            "C: El niño/a cumple con varias indicaciones que se le dan al mismo tiempo, por ejemplo, cuando usted le dice: *Primero te pones de pie, luego vas corriendo hasta la puerta y después das dos golpes con la mano* o *Trae el caballito, ponlo en el corral y dale de comer*",
                            "C: El evaluador observa que niño/a ejecuta varias instrucciones dadas al mismo tiempo, en la secuencia adecuada. Por ejemplo, *Trae el caballito, ponlo en el corral y dale de comer* o *Primero te pones de pie, luego vas corriendo hasta la puerta y después das dos golpes con la mano*.",
                            "C"
                        ),
                        "35" => array(
                            "E: ¿Cuándo el niño/a habla o cuenta una historia se entiende claramente lo que dice y pronuncia bien todos los sonidos?",
                            "E: El evaluador solicita al niño que cuente algo que le sucedió en un contexto particular y observa que se entiende con claridad lo que dice y pronuncia bien todos los sonidos",
                            "E"
                        ),
                        "36" => array(
                            "I: ¿El niño/a sostiene conversaciones con familiares y no familiares para expresar opiniones e intentar convencer de sus ideas a los demás?",
                            "I: El evaluador propone al niño/a un tema de discusión pertinente a la edad, y observa habilidades para expresar su opinión y convencer a su interlocutor.",
                            "I"
                        ),
                        "37" => array(
                            "C: ¿El niño/a identifica errores, se ríe de errores e intenta corregirlos, cuando alguien los dice, por ejemplo, *la pelota tiene patas* *por la noche me como el desayuno*?",
                            "C: El evaluador provee al niño/a significados absurdos (frases con errores) y observa que logra identificarlos, riéndose, mirando diferente, haciendo caras o intentando corregirlo.",
                            "C"
                        ),
                        "38" => array(
                            "E: ¿El niño/a habla y explica el porqué de diversas situaciones, sentimientos y pensamientos utilizando palabras abstractas como orgullo, valor, amar, etc.?",
                            "E: El evaluador observa que el niño/a justifica el porqué de diversas situaciones, pensamientos o sentimientos, por ejemplo, ¿por qué nos enojamos/enfadamos?",
                            "E"
                        ),
                        "39" => array(
                            "I: ¿El niño/a conversa con otros de diferentes temas, escuchando sus ideas y expresando con argumentos su acuerdo o desacuerdo?",
                            "I: El evaluador plantea al niño/a una conversación con un tema de opinión y observa que puede asumir y defender una postura personal. Por ejemplo, el uso de redes sociales por parte de menores.",
                            "I"
                        )
                    ];

                    

                    foreach ($ArreglosCampos as $key => $value) {
                        $Pregunta = $value[0];
                        $Observacion = $value[1];
                        $Identificacion = $key;

                        switch($key){
                            case "1":
                                echo "<tr>
                                    <td class='' rowspan='5'> 0 a 3 meses </td>
                                </tr>";

                                $ClaseColor="VALE_3_0-3Meses";
                            break;
                            case "5":
                                echo "<tr>
                                    <td class='' rowspan='4'> 4 a 6 meses </td>
                                </tr>";

                                $ClaseColor="VALE_3_4-6Meses";
                            break;

                            
                            case "8":
                                echo "<tr>
                                    <td class='' rowspan='4'> 7 a 9 meses </td>
                                </tr>";

                                $ClaseColor="VALE_3_7-9Meses";
                                break;
                            case "11":
                                echo "<tr>
                                    <td class='' rowspan='5'> 10 a 12 meses </td>
                                </tr>";

                            $ClaseColor="VALE_3_10-12Meses";
                                break;
                            case "15":
                                echo "<tr>
                                    <td class='' rowspan='4'> 13 a 15 meses </td>
                                </tr>";

                                $ClaseColor="VALE_3_13-15Meses";
                                break;
                            case "18":
                                echo "<tr>
                                    <td class='' rowspan='4'> 16 a 18 meses </td>
                                </tr>";

                                $ClaseColor="VALE_3_16-18Meses";
                                break;
                            case "21":
                                echo "<tr>
                                    <td class='' rowspan='4'> 19 a 24 meses </td>
                                </tr>";

                                $ClaseColor="VALE_3_19-24Meses";
                                break;
                            case "24":
                                echo "<tr>
                                    <td class='' rowspan='5'> 25 a 36 meses </td>
                                </tr>";

                                $ClaseColor="VALE_3_25-36Meses";
                                break;
                            case "28":
                                echo "<tr>
                                    <td class='' rowspan='4'> 3 Años 1 Mes a 4 Años </td>
                                </tr>";

                                $ClaseColor="VALE_3_3-4Anios";
                                break;
                            case "31":
                                echo "<tr>
                                    <td class='' rowspan='4'> 4 Años 1 Mes a 5 Años </td>
                                </tr>";

                                $ClaseColor="VALE_3_4-5Anios";
                                break;
                            case "34":
                                echo "<tr>
                                    <td class='' rowspan='4'> 5 Años 1 Mes a 9 Años </td>
                                </tr>";

                                $ClaseColor="VALE_3_5-9Anios";
                                break;
                            case "37":
                                echo "<tr>
                                    <td class='' rowspan='4'> 9 Años 1 Mes a 12 Años 11 Meses </td>
                                </tr>";

                                $ClaseColor="VALE_3_9-12Anios";
                                break;
                        }

                        $ClaseRadios = "CamposCalificacion_".$value[2];
                        echo "
                        <tr>
                            <td class='$ClaseColor'> $Pregunta </td>
                            <td class='$ClaseColor'> $Observacion </td>
                            <td class='$ClaseColor'>
                                <input type='radio' name='ExamenFisico[SaludAuditiva][VALE_3][$Identificacion][$Pregunta | $Observacion]' value='1' style='width: 25px;height: 25px;' class='$ClaseRadios'>
                            </td>
                            <td class='$ClaseColor'>
                                <input type='radio' name='ExamenFisico[SaludAuditiva][VALE_3][$Identificacion][$Pregunta | $Observacion]' value='0' style='width: 25px;height: 25px;' class='$ClaseRadios'>
                            </td>
                        </tr>";

                        
                    }


                    ?>

                </tbody>
            </table>
        </div>






        <div class="col-md-12">
            <br><br>
            <hr>
            <br><br>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-bold text-center">Items de valoracion vestibular</h4>
            </div>
        </div>
        
        <div class="col-md-12">
            <br><br>
            <hr>
            <br><br>
        </div>



        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th rowspan="2">Rango de edad</th>
                        <th rowspan="2">Reporte de padres</th>
                        <th rowspan="2">Observacion directa</th>
                        <th colspan="2">Respuesta</th>
                    </tr>
                    <tr>
                        <th>Si</th>
                        <th>No</th>
                    </tr>
                </thead>
                <tbody>

                    
                    <?php

                    $ArreglosCampos = [
                        "1" => array(
                            "V: ¿El niño/a disfruta actividades de movimientos del cuerpo como columpiarse, girar, dar botes, saltar?",
                            "V: El evaluador le solicita al niño/a que dé una vuelta sobre su propio eje y observa que mantiene el equilibrio"
                        ),
                        "2" => array(
                            "V: ¿El niño/a camina recto, sin inclinarse hacia los lados y sin caerse constantemente?",
                            "V: El evaluador le solicita al niño/a que camine en línea recta y observa que puede hacerlo sin inclinarse hacia los lados."
                        ),
                        "3" => array(
                            "V: ¿El niño/a disfruta dar algunas vueltas sobre sí mismo, sin caerse?",
                            "V: El evaluador le pide al niño/a que dé tres vueltas sobre su propio eje, y observa que mantiene el equilibrio al detenerse."
                        ),
                        "4" => array(
                            "V: ¿Cuándo el niño/a se tropieza, o siente que se va a caer, pone las manos para protegerse?",
                            "V: El evaluador observa, si tiene oportunidad, que el niño/a anticipa acciones de protección para evitar caídas"
                        ),
                        "5" => array(
                            "V: ¿El niño/a disfruta del movimiento en varias direcciones, velocidades y alturas? por ejemplo: subir al rodadero3, ¿sube y baja, montaña rusa, que lo suban o bajen rápidamente?",
                            "V: El evaluador observa, si tiene oportunidad, que el niño/a disfruta hacer movimientos con su cuerpo en diferentes velocidades, direcciones y alturas"
                        )
                    ];

                    

                    foreach ($ArreglosCampos as $key => $value) {
                        $Pregunta = $value[0];
                        $Observacion = $value[1];
                        $Identificacion = $key;

                        switch($key){
                            case "1":
                                echo "<tr>
                                    <td class='' rowspan='3'> 3 Años a 5 Años </td>
                                </tr>";

                                $ClaseColor="VALE_4_3-5Anios";
                                $ClaseRadios="CamposCalificacion_V";
                            break;
                            case "3":
                                echo "<tr>
                                    <td class='' rowspan='4'> 5 Años 1 Mes a 12 Años 11 Mes  </td>
                                </tr>";

                                $ClaseColor="VALE_4_5-12Anios";
                                $ClaseRadios="CamposCalificacion_V";
                            break;

                        }

                        echo "
                        <tr>
                            <td class='$ClaseColor'> $Pregunta </td>
                            <td class='$ClaseColor'> $Observacion </td>
                            <td class='$ClaseColor'>
                                <input type='radio' name='ExamenFisico[SaludAuditiva][VALE_4][$Identificacion][$Pregunta | $Observacion]' value='1' style='width: 25px;height: 25px;' class='$ClaseRadios'>
                            </td>
                            <td class='$ClaseColor'>
                                <input type='radio' name='ExamenFisico[SaludAuditiva][VALE_4][$Identificacion][$Pregunta | $Observacion]' value='0' style='width: 25px;height: 25px;' class='$ClaseRadios' >
                            </td>
                        </tr>";

                        
                    }


                    ?>

                </tbody>
            </table>
        </div>



        


        <div class="col-md-12">
            <br><br>
            <hr>
            <br><br>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-bold text-center">Calificacion</h4>
            </div>
        </div>
        
        <div class="col-md-12">
            <br><br>
            <hr>
            <br><br>
        </div>


        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Items</th>
                        <th>Numero de respuestas negativas</th>
                    </tr>
                </thead>
                <tbody>

                    
                    <?php

                    $ArreglosCampos = [
                        "1" => "Comprensión (C)",
                        "2" => "Expresión (E)",
                        "3" => "Interacción (I)",
                        "4" => "Vestibular (V)",
                        "5" => "Total"
                    ];

                    

                    foreach ($ArreglosCampos as $key => $value) {
                        $Pregunta = $value;
                        $Identificacion = $key;

                        switch($key){
                            case "1":

                                $idCampo_Vale5="VALE_5_Comprension";
                            break;
                            case "2":

                                $idCampo_Vale5="VALE_5_Expresion";
                            break;
                            case "3":

                                $idCampo_Vale5="VALE_5_Interaccion";
                            break;
                            case "4":

                                $idCampo_Vale5="VALE_5_Vestibular";
                            break;
                            case "5":

                                $idCampo_Vale5="VALE_5_Total";
                            break;

                        }

                        echo "
                        <tr>
                        <td> $Pregunta </td>
                            <td>
                                <input type='text' id='$idCampo_Vale5' name='ExamenFisico[SaludAuditiva][VALE_5][$Identificacion][$Pregunta]' value='' class='form-control input-lg' readOnly >
                            </td>
                        </tr>";

                        
                    }


                    ?>

                    <tr>
                        <td> Interpretacion </td>
                        <td>
                            <input type='text' id='Interpretacion_VALE' name="ExamenFisico[SaludAuditiva][VALE_Interpretacion]" class='form-control input-lg'   value="No hay alteración alguna, PASA la prueba." readOnly >
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>







    </div>
</div>
<script>
    /*
    function aplicarColorSegunMeses(meses) {
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
        cambiarColor(elementos5Meses, '#00800038');
    } else if (meses >= 6 && meses <= 11) {
        cambiarColor(elementos6_11Meses, '#00800038');
    } else if (meses >= 12 && meses <= 17) {
        cambiarColor(elementos12_17Meses, '#00800038');
    } else if (meses >= 18 && meses <= 23) {
        cambiarColor(elementos18_23Meses, '#00800038');
    } else if (meses >= 24 && meses <= 36) {
        cambiarColor(elementos2_3Anual, '#00800038');
    } else if (meses >= 37 && meses <= 48) {
        cambiarColor(elementos3_4Anual, '#00800038');
    } else if (meses >= 49 && meses <= 60) {
        cambiarColor(elementos4_5Anual, '#00800038');
    } else if (meses >= 61) {
        cambiarColor(elementos5Anual, '#00800038');
    }
}
*/
// Función para cambiar el color de fondo de los elementos
function cambiarColorVALE(elementos, color) {
    for (var i = 0; i < elementos.length; i++) {
        elementos[i].style.backgroundColor = color;

        var inputs = elementos[i].querySelectorAll('input');
        inputs.forEach(function(input) {
            input.classList.add('RequiredVALEVALORACION_Radio');
        });

    }
}
/*
// Ejemplo de uso
var meses = '<?=$MesesNacio_Paciente;?>'; // Cambia esto con el valor de meses que tengas
aplicarColorSegunMeses(meses);
*/
</script>
<script>

function aplicarColorSegunMesesVale(meses) {
    // Obtener elementos con las clases correspondientes
    var elementos0_3Meses = document.getElementsByClassName('VALE_3_0-3Meses');
    var elementos4_6Meses = document.getElementsByClassName('VALE_3_4-6Meses');
    var elementos7_9Meses = document.getElementsByClassName('VALE_3_7-9Meses');
    var elementos10_12Meses = document.getElementsByClassName('VALE_3_10-12Meses');
    var elementos13_15Meses = document.getElementsByClassName('VALE_3_13-15Meses');
    var elementos16_18Meses = document.getElementsByClassName('VALE_3_16-18Meses');
    var elementos19_24Meses = document.getElementsByClassName('VALE_3_19-24Meses');
    var elementos25_36Meses = document.getElementsByClassName('VALE_3_25-36Meses');
    var elementos3_4Anios = document.getElementsByClassName('VALE_3_3-4Anios');
    var elementos4_5Anios = document.getElementsByClassName('VALE_3_4-5Anios');
    var elementos5_9Anios = document.getElementsByClassName('VALE_3_5-9Anios');
    var elementos9_12Anios = document.getElementsByClassName('VALE_3_9-12Anios');
    // Convertir el valor a entero
    meses = parseInt(meses);

    // Verificar en qué rango de meses se encuentra y aplicar el color correspondiente
    if (meses >= 0 && meses <= 3) {
        cambiarColorVALE(elementos0_3Meses, '#00800038');
    } else if (meses >= 4 && meses <= 6) {
        cambiarColorVALE(elementos4_6Meses, '#00800038');
    } else if (meses >= 7 && meses <= 9) {
        cambiarColorVALE(elementos7_9Meses, '#00800038');
    } else if (meses >= 10 && meses <= 12) {
        cambiarColorVALE(elementos10_12Meses, '#00800038');
    } else if (meses >= 13 && meses <= 15) {
        cambiarColorVALE(elementos13_15Meses, '#00800038');   
    }
    else if (meses >= 16 && meses <= 18) {
        cambiarColorVALE(elementos16_18Meses, '#00800038');
    }
    else if (meses >= 19 && meses <= 24) {
        cambiarColorVALE(elementos19_24Meses, '#00800038');
    }
    else if (meses >= 25 && meses <= 36) {
        cambiarColorVALE(elementos25_36Meses, '#00800038');
    }
    else if (meses >= 37 && meses <= 48) {
        cambiarColorVALE(elementos3_4Anios, '#00800038');
    }
    else if (meses >= 49 && meses <= 60) {
        cambiarColorVALE(elementos4_5Anios, '#00800038');
    }
    else if (meses >= 61 && meses <= 108) {
        cambiarColorVALE(elementos5_9Anios, '#00800038');
    }
    else if (meses >= 109 && meses <= 155) {
        cambiarColorVALE(elementos9_12Anios, '#00800038');
    }
}

aplicarColorSegunMesesVale(meses);
</script>
<script>

function aplicarColorSegunMesesVale_4(meses) {
    // Obtener elementos con las clases correspondientes

    var elementos3_5Anios = document.getElementsByClassName('VALE_4_3-5Anios');
    var elementos5_12Anios = document.getElementsByClassName('VALE_4_5-12Anios');
    // Convertir el valor a entero
    meses = parseInt(meses);

    // Verificar en qué rango de meses se encuentra y aplicar el color correspondiente

    if (meses >= 36 && meses <= 60) {
        cambiarColorVALE(elementos3_5Anios, '#00800038');
    }
    else if (meses >= 61 && meses <=  155) {
        cambiarColorVALE(elementos5_12Anios, '#00800038');
    }
}

aplicarColorSegunMesesVale_4(meses);
</script>
<script>
    /*
        var radios = document.querySelectorAll('.CamposCalificacion_V');
        var vale5Field = document.getElementById('VALE_5_Vestibular');

        radios.forEach(function(radio) {
            radio.addEventListener('change', updateCount);
        });

        function updateCount() {
            // Filtrar solo los radio buttons checkeados y con valor igual a 0
            var checkedRadios = Array.from(radios).filter(function(radio) {
                return radio.checked && radio.value === "0";
            });

            // Actualizar el valor del campo con la cantidad de radios checkeados y con valor igual a 0
            vale5Field.value = checkedRadios.length;
        }
    */

    function updateCount(className, textFieldId) {
            var radios = document.querySelectorAll('.' + className);
            var textField = document.getElementById(textFieldId);

            radios.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    var checkedRadios = Array.from(radios).filter(function(radio) {
                        return radio.checked && radio.value === "0";
                    });

                    textField.value = checkedRadios.length;
                    updateTotal();
                });
            });
    }

    function updateTotal() {
            var totalField = document.getElementById('VALE_5_Total');
            var total = 0;

            // Sumar los valores de los campos y actualizar el campo VALE_5_Total
            ['VALE_5_Vestibular', 'VALE_5_Interaccion', 'VALE_5_Expresion', 'VALE_5_Comprension'].forEach(function(fieldId) {
                var fieldValue = parseInt(document.getElementById(fieldId).value) || 0;
                total += fieldValue;
            });

            totalField.value = total;
            if(total==0){
                document.getElementById('Interpretacion_VALE').value = "No hay alteración alguna, PASA la prueba.";
            }else{
                document.getElementById('Interpretacion_VALE').value = "indicios de una alteración, FALLA en la prueba.";
            }
    }

        

        updateCount('CamposCalificacion_V', 'VALE_5_Vestibular');
        updateCount('CamposCalificacion_I', 'VALE_5_Interaccion');
        updateCount('CamposCalificacion_E', 'VALE_5_Expresion');
        updateCount('CamposCalificacion_C', 'VALE_5_Comprension');
        
</script>
