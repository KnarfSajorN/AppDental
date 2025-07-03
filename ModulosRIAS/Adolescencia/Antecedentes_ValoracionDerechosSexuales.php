


                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                        <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_1_SubPrincipal_2_1">
                                                     1.2.1 Valoración de los derechos sexuales y reproductivos 
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_1_SubPrincipal_2_1" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row">


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="3" style="text-align-last: center;">Ámbito de Exploración</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Ejercicio de Derechos</td>

                                                                    <td>Información, educación y acceso a servicios</td>

                                                                    <td>Condiciones particulares que pueden afectar el ejercicio de los derechos</td>
                                                                </tr>
                                                                <!-- Marcas con "x" -->
                                                                <tr>
                                                                    <td>
                                                                        Toma decisiones alrededor de la 
                                                                        sexualidad (autonomía)

                                                                        Identidad de género (sexismo, 
                                                                        homofobia, y transfobia)

                                                                        Violencia contra la mujer y/o violencia 
                                                                        de género. (incluye explotación 
                                                                        sexual comercial de niños, niñas y 
                                                                        adolescentes ESCNNA, abuso sexual 
                                                                        en menores de 14 años de edad, 
                                                                        violencia en el noviazgo)

                                                                        Maternidad y paternidad planeada, 
                                                                        uso de anticonceptivos.

                                                                        Cuidado del cuerpo y uso de 
                                                                        protección contra ITS /VIH
                                                                    </td>

                                                                    <td>
                                                                    Conocimiento de fisiología y anatomía de la 
                                                                    sexualidad y la reproducción. 

                                                                    Conocimientos sobre ITS/VIH y formas de 
                                                                    protección.

                                                                    Conocimientos, creencias y actitudes sobre 
                                                                    el uso de anticoncepción y preservativos.

                                                                    Creencias y actitudes sobre el inicio de 
                                                                    relaciones sexuales.

                                                                    Creencias y actitudes sobre las relaciones 
                                                                    de pareja.

                                                                    Conocimientos sobre derechos en salud 
                                                                    (anticoncepción e IVE).

                                                                    Conocimiento sobre la ESCNNA-), uso de 
                                                                    redes sociales
                                                                    </td>

                                                                    <td>
                                                                        Transgénero que no han accedido a 
                                                                        acompañamiento en salud de su 
                                                                        tránsito en el género.

                                                                        Homosexuales víctimas de violencia 
                                                                        de pares y social.

                                                                        Heterosexuales hijos de víctimas de 
                                                                        violencia de pareja.

                                                                        Adolescentes en contexto de alto 
                                                                        riesgo de ESCNNA

                                                                        Víctimas de violencia sexual
                                                                    </td>
                                                                </tr>
                                                                <!-- ... Agrega más elementos según sea necesario ... -->
                                                            </tbody>
                                                        </table>

                                                        <?php
                                                        $ArregloCamposTitulo["1"]= array("id"=>1,"Nombre"=>"Existencia y tipo de relación actual");
                                                        $ArregloCamposTitulo["2"]= array("id"=>2,"Nombre"=>"Estilos de comunicación, violencia en el noviazgo o relación de pareja: (explorar en hombres y mujeres, tanto como víctima o agresor)");
                                                        $ArregloCamposTitulo["13"]= array("id"=>3,"Nombre"=>"Inicio de relaciones sexuales, prácticas sexuales");
                                                        $ArregloCamposTitulo["20"]= array("id"=>4,"Nombre"=>"Orientación sexual, identidad de género");
                                                        $ArregloCamposTitulo["29"]= array("id"=>5,"Nombre"=>"Maternidad/paternidad, uso de anticoncepción y preservativo, autonomía, ITS: (Si tiene relaciones sexuales heterosexuales) ");
                                                        $ArregloCamposTitulo["36"]= array("id"=>6,"Nombre"=>"Autonomía:(Si No tiene relaciones sexuales) ");
                                                        $ArregloCamposTitulo["41"]= array("id"=>7,"Nombre"=>"Violencia sexual");
                                                        $ArregloCamposTitulo["45"]= array("id"=>8,"Nombre"=>"Percepciones/conocimientos, actitudes");
                                                        $ArregloCamposTitulo["49"]= array("id"=>9,"Nombre"=>"Redes sociales");
                                                        $ArregloCamposTitulo["55"]= array("id"=>10,"Nombre"=>"Identidad de género/sexismo/homofobia/violencia de género en la familia de origen");

                                                        $ArregloCamposTitulo["64"]= array("id"=>11,"Nombre"=>"(Mujeres/ heterosexuales)");
                                                        $ArregloCamposTitulo["66"]= array("id"=>12,"Nombre"=>"(Hombres/heterosexuales)");
                                                        //id del campo para diferenciar ya sean aqui en el input o en el arreglo que se llegue a formar [si aplica] => titulo del campo
                                                        $ArreglosCamposSaludVisual = [
                                                            "1" => "¿Tiene pareja, o tiene alguna relación con alguien?",

                                                            "2" => "¿Cuándo tienen un desacuerdo como lo resuelven?",
                                                            "3" => "¿Es usual que se presenten conflictos?",
                                                            "4" => "¿Controla frecuentemente su forma de vestir, los o las amigos, el dinero, los planes?",
                                                            "5" => "¿Existen acusaciones de coquetear frecuentemente con otra persona?",
                                                            "6" => "¿Le han insultado?",
                                                            "7" => "¿Se ha sentido obligada(o) a hacer algo que no quiere?",
                                                            "8" => "¿recibe amenazas, o siente miedo?",
                                                            "9" => "¿Le hacen sentir vergüenza o le tratan mal frente a otras personas?",
                                                            "10" => "¿alguna vez le han empujado, golpeado o lanzado objetos?",
                                                            "11" => "¿Le han obligado a alguna actividad sexual cuando no quiere?",
                                                            "12" => "¿Le han intentado o forzado a mantener alguna actividad sexual con engaños, insistencia o intimación?",

                                                            "13" => "¿Ha tenido relaciones sexuales?",
                                                            "14" => "¿Con quién tiene relaciones sexuales?",
                                                            "15" => "¿Tuvo o tiene relaciones sexuales con varias parejas sexuales?",
                                                            "16" => "¿Tiene más de un/a Compañero/a sexual?",
                                                            "17" => "¿Cambia frecuentemente de pareja sexual?",
                                                            "18" => "¿Tiene relaciones sexuales con personas desconocidas?",
                                                            "19" => "¿Qué tipo de prácticas sexuales tiene en este momento? (colectivas, individuales, con uso de SPA, oral, anal, vaginal).",

                                                            "20" => "¿Qué método de anticoncepción usa?",
                                                            "21" => "¿Por qué?",
                                                            "22" => "¿Quién se lo formuló?",
                                                            "23" => "¿Qué metodos de anticoncepción conoce?",
                                                            "24" => "¿Desea ser padre o madre en este momento?",
                                                            "25" => "¿Qué ventajas o desventajas tiene para usted la maternidad/paternidad?",
                                                            "26" => "¿Qué acercamientos sexuales cree que la/lo ponen en riesgo de embarazo?",
                                                            "27" => "¿Qué barreras puede incidir en su decisión?",
                                                            "28" => "¿Cómo enfrentaría estas barreras?",

                                                            "29" => "¿Qué acercamientos sexuales te ponen en riesgo para una ITS/VIH?",
                                                            "30" => "¿Usa preservativo en todas sus relaciones sexuales?",
                                                            "31" => "¿Porque?",
                                                            "32" => "¿En una parte del acto sexual o en todo el acto sexual?",
                                                            "33" => "¿Tiene conocimiento de las enfermedades que se transmiten sexualmente?",
                                                            "34" => "¿Ha tenido flujo uretral o vaginal anormal (olor, color)?",
                                                            "35" => "¿Dolor, lesiones, verrugas, masas, úlceras, picazón, ardor en la región genital?",

                                                            "36" => "¿Cree probable tener relaciones sexuales dentro de lo próximos seis meses?",
                                                            "37" => "¿O lo considera improbable?",
                                                            "38" => "¿Qué ventajas o desventajas tiene para usted postergarlas relaciones sexuales?",
                                                            "39" => "¿Que barreras pueden influir en la decisión?",
                                                            "40" => "¿Cómo enfrentaría estas barreras?",

                                                            "41" => "¿Alguna vez alguien le ha obligado a realizar alguna actividad sexual cuando no quiere o bajo efectos de alguna sustancia?",
                                                            "42" => "Algunos/as adolescentes pueden participar en actividades sexuales a cambio de dinero o regalos.",
                                                            "43" => "¿Tiene amigos/as que participen en este tipo de actividades?",
                                                            "44" => "¿Tiene o ha tenido actividades sexuales a cambio de dinero o regalos?",

                                                            "45" => "Algunas personas piensan que el condón no es efectivo, o que no se siente lo mismo ¿Usted qué opina? ",
                                                            "46" => "Algunos/as Adolescentes les da vergüenza comprar o venir al centro de salud, o no saben dónde pueden conseguir preservativos o anticonceptivos. ¿Usted que piensa al respecto? ",
                                                            "47" => "Algunos/as Adolescentes prefieren remedios caseros como método anticonceptivo porque creen que los anticonceptivos van a ocasionarle algún daño. ¿Usted qué opina sobre esto? ",
                                                            "48" => "¿Conoce en que caso puede acceder a un aborto (IVE) legal y seguro en el servicio de salud?",
                                                            
                                                            "49" => "¿Sus padres lo acompañan cuando usa internet?",
                                                            "50" => "¿Algunos adolescentes comparten información íntima, videos, fotos con contenido erótico en las redes sociales usted lo ha hecho?",
                                                            "51" => "¿Con personas conocidas o desconocidas?",
                                                            "52" => "¿Conoce los riesgos de compartir este tipo de información?",
                                                            "53" => "¿Alguna vez se ha puesto una cita con alguien que conoció en la red?",
                                                            "54" => "¿Alguna han publicado fotos o videos íntimos suyos sin su conocimiento?",

                                                            "55" => "¿En alguna ocasión, has visto o percibido que su papá insulte o diga malas palabras a su mamá?",
                                                            "56" => "¿Que la ofenda?",
                                                            "57" => "¿Qué rompa sus cosas?",
                                                            "58" => "¿Qué la amenace?",
                                                            "59" => "¿Qué le pegue, la empuje, la abofetee, la queme o le propine otro agresión física?",
                                                            "60" => "¿Esto sucede en este momento o en el pasado?",
                                                            "61" => "¿Hace cuánto?",
                                                            "62" => "¿Ha hablado con alguien de esto?",
                                                            "63" => "¿Con quién?",

                                                            "64" => "¿Cree que en una relación de pareja hay que estar dispuesta a sufrir y soportar?,",
                                                            "65" => "¿Qué tan importante es para usted en este momento enamorase y mantener una relación de pareja por el resto de tu vida? ",

                                                            "66" => "¿Qué tan de acuerdo está con que no es propio de hombres encargarse de las tareas del hogar?",
                                                            "67" => "¿Qué tan de acuerdo está con que el marido es la cabeza de la familia y la mujer debe respetar su autoridad?"




                                                        ];

                                                        $lastId = null;

                                                        foreach ($ArreglosCamposSaludVisual as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                           
                                                            // Obtener el ID del campo actual o utilizar el último ID no vacío
                                                            $id_Campos = !empty($ArregloCamposTitulo[$key]["id"]) ? $ArregloCamposTitulo[$key]["id"] : $lastId;

                                                            // Actualizar la variable $lastId si el ID actual no está vacío
                                                            if (!empty($id_Campos)) {
                                                                $lastId = $id_Campos;

                                                                
                                                            }
                                                            if(!empty($ArregloCamposTitulo[$key]["id"])){
                                                                echo "<div class='form-group col-md-12'><h4>".$ArregloCamposTitulo[$key]["Nombre"]."</h4></div>";
                                                            }

                                                            echo"
                                                            <div class='form-group col-md-12'>
                                                                <label>$Titulo</label><br>
                                                                <textarea class='form-control' name='Anamnesis[ValoracionDerechosSexuales][Valoracion_$lastId][$Identificacion][$value]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";

                                                            
                                                        }

                                                        ?>


                                                        <div class='form-group col-md-12'>
                                                            <label>De acuerdo con sus expresiones de género en una escala de 1 a 10, siendo uno totalmente femenino y 10 totalmente masculino, ¿Qué calificación daría a su forma de vestir, ademanes, gestos o modales?</label><br>
                                                            <input type='text' class='form-control input-lg' name='Anamnesis[ValoracionDerechosSexuales][FormaVestir][1][De acuerdo con sus expresiones de género en una escala de 1 a 10, siendo uno totalmente femenino y 10 totalmente masculino, ¿Qué calificación daría a su forma de vestir, ademanes, gestos o modales?]' >
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->

                                        