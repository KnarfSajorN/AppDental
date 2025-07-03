<style type="text/css">
.tg {
    border-collapse: collapse;
    border-spacing: 0;
}

.tg td {
    border-color: black;
    border-style: solid;
    border-width: 1px;
    font-family: Arial, sans-serif;
    font-size: 14px;
    overflow: hidden;
    padding: 10px 5px;
    word-break: normal;
}

.tg th {
    border-color: black;
    border-style: solid;
    border-width: 1px;
    font-family: Arial, sans-serif;
    font-size: 14px;
    font-weight: normal;
    overflow: hidden;
    padding: 10px 5px;
    word-break: normal;
}

.tg .tg-0lax {
    text-align: left;
    vertical-align: top
}
</style>
<table class="tg">
    <thead>
        <tr>
            <th class="tg-0lax" colspan="2">Ambito de exploracion</th>
            <th class="tg-0lax">Forma de exploracion</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="tg-0lax">1. Funcionamiento psicosocial del adolescente fuera del hogar</td>
            <td class="tg-0lax">Valoración la implicación del/la adolescente en problemas de comportamiento. Valora el
                nivel de competencia con sus pares</td>
            <td class="tg-0lax">En la exploración con la familia del adolescente interrogar sobre participación en
                actividades como destruir bienes ajenos, vincularse a peleas, agredir a otras personas, quejas de
                comportamiento del colegio, uso de SPA, conducción temeraria.</td>
        </tr>
        <tr>
            <td class="tg-0lax" rowspan="3">2. Componentes de la autonomía (actitudinal, emocional, funcional)</td>
            <td class="tg-0lax">Componente actitudinal: hace referencia a la capacidad de elegir metas (capacidad de
                identificar varias opciones y tomar una decisión)</td>
            <td class="tg-0lax" rowspan="3">Se recomienda valorar en relación con algún asunto particular en el que se
                quiera profundizar y aun se esté valorando este: (Por ejemplo: inicio de relaciones sexuales, drogas,
                maternidad/ paternidad. Violencia de pareja, reclutamiento«.) ¿Ha pensado sobre« (Y.g. la maternidad en
                este momento)?. ¿Tiene alguna decisión al respecto?, ¿Porque tomo esa decisión? En general en la
                adolescencia las y los jóvenes pueden sentirse presionados por sus amigos/as, pareja a« Algunos
                argumentos que suelen utilizarse son« ¿Qué opina sobre esto? ¿Qué haría si se encontrara en una
                situación similar? ¿Qué opciones tiene para eYitar«.?</td>
        </tr>
        <tr>
            <td class="tg-0lax">Componente emocional: tiene que ver con el proceso afectivo de sentirse con confianza en
                las opciones y objetivos propios. (independencia emocional)</td>
        </tr>
        <tr>
            <td class="tg-0lax">Componente funcional: Son los procedimientos de regulación necesarios para el desarrollo
                de estrategias y selección de alguna potencialmente eficaz de acuerdo a su objetivo</td>
        </tr>
        <tr>
            <td class="tg-0lax">3. Factores asociados a su buen desempeño</td>
            <td class="tg-0lax">Factores que facilitan su buen desarrollo: Comunicación familiar Equilibrio entre la
                concesión de la autonomía con cantidades apropiadas de control y aceptación. Espacios familiares que
                facilitan aprender de los errores</td>
            <td class="tg-0lax">¿En su familia suelen explicar y discutir las razones de los desacuerdos? ¿Sabe que
                espera su madre, padre o cuidador(a) de usted?, ¿Lo animan a que les cuente sus problemas,
                preocupaciones u opiniones?, ¿En caso de tener problemas puede contar con su ayuda?, ¿Le ponen límites a
                la hora en que usted debe volver a casa?, ¿considera que las reglas en su familia son muy estrictas?,
                ¿Le animan tomar sus propias decisiones?, ¿Lo hacen sentir culpable cuando usted no hace lo que ellos
                quieren o le tratan de forma distante?.</td>
        </tr>
    </tbody>
</table>

<?php

$ArreglosCampos = [
                        "1" => "Valoración la implicación del/la adolescente en problemas de comportamiento. Valora el nivel de competencia con sus pares",
                        "2" => "Componente actitudinal",
                        "3" => "Componente emocional",
                        "4" => "Componente funcional",
                        "5" => "Factores que facilitan su buen desarrollo",
                    ];

                    

                    foreach ($ArreglosCampos as $key => $value) {
                        $Pregunta = $value;
                        $Identificacion = $key;

                        

                        echo "
                        <tr>
                        <td> <label> $Pregunta </label> </td>
                            <td>
                                <textarea name='ExamenFisico[ValoracionDesarrollo][Autonomia_Anexo15][$Identificacion][$Pregunta]' value='' class='form-control input-lg' ></textarea>
                            </td>
                        </tr>";

                        
                    }


?>