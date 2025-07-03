                                        <!-- Collapse Interior -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#Collapse_Principal_1_SubPrincipal_4">
                                                        1.4 Alimentación en niños menores de 6 meses
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Collapse_Principal_1_SubPrincipal_4" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12 row d-flex flex-wrap">

                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>


                                                         <div class='form-group col-md-12'>
                                                            <label>Lactancia</label><br>
                                                            <select name='Anamnesis[AlimentacionMenor6][Lactancia]' id="AlimentacionLactancia" class='form-control input-lg select2' style='width:100%' onchange="MostrarDatos(this.value)">
                                                                <option value='' selected>Seleccione</option>
                                                                <option value='Si'>Si</option>
                                                                <option value='No'>No</option>
                                                            </select>
                                                        </div>


                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <div id="DatosLactancia" class='form-group col-md-12 row d-flex flex-wrap'>

                                                        </div>

                                                        <div class='form-group col-md-12'>
                                                            <hr>
                                                        </div>

                                                        <?php

                                                        //Para los inputs
                                                        /*
                                                        $ArregloCamposAntecedentes = ["Liquidos",
                                                        "Leche_Formula",
                                                        "Tipos_Leche",
                                                        "Alimentos"];*/


                                                        //Para los textos

                                                        $ArreglosCamposAlimentacionNino = [
                                                            "11" => "Durante el día de ayer o anoche ¿recibió alguno de los siguientes líquidos: agua, agua aromática, jugo, té?",
                                                        "12" => "Durante el día de ayer o anoche ¿recibió leche de fórmula? ",
                                                        "13" => "Durante el día de ayer o anoche ¿recibió leche (vaca, cabra,...) líquida, en polvo, fresca o en bolsa?",
                                                        "14" => "Durante el día de ayer o anoche ¿(...) recibió algún alimento como sopa espesa, puré, papilla o seco?"
                                                        ];


                                                        $ContadorArreglo = 0;
                                                        foreach ($ArreglosCamposAlimentacionNino as $key => $value) {
                                                            $Titulo = $value;
                                                            $Identificacion = $key;
                                                        
                                                            if ($ContadorArreglo % 2 == 0) {
                                                                echo "<div class='form-group col-md-12 row'>";
                                                            } 

                                                            echo"
                                                            <div class='form-group col-md-6'>
                                                                <label>$Titulo</label><br>
                                                                <textarea class='form-control' name='Anamnesis[AlimentacionMenor6][Campos][$Identificacion][$Titulo]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                            </div>";

                                                            if ($ContadorArreglo % 2 != 0) {
                                                                echo "</div>";
                                                            }

                                                            $ContadorArreglo++;
                                                        }
                                                        //por si es impar
                                                        if ($ContadorArreglo % 2 != 0) {
                                                            echo "</div>";
                                                        }
                                                        

                                                        ?>




                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del Collapse Interior -->
<script>
function MostrarDatos(valor) {

    
    const DatosLactancia = document.getElementById("DatosLactancia");

    if (valor == 'Si') {
        
        // Mostrar campos para lactancia
        DatosLactancia.innerHTML = '';

        var ArregloIdentificadores = ["1", "2", "3", "4","5","6"];//tener un identificador unico para cada campo por si acaso
        const ArregloCamposAntecedentesTituloSi = [
            "Frecuencia y forma en la que lacta (postura de la madre y del niño, agarre y succión)",
            "Forma como reconoce el hambre y saciedad del bebé",
            "Cuidado de los senos",
            "Alimentación de la madre",
            "Inconvenientes e inquietudes con la lactancia",
            "Planes para continuar con la lactancia en caso de retorno a los estudios o al trabajo"
        ];

        var contadorArreglo = 0;
        ArregloCamposAntecedentesTituloSi.forEach(function (titulo, index) {
            var identificador = ArregloIdentificadores[index];

            if (contadorArreglo % 2 === 0) {
                DatosLactancia.innerHTML += `<div class='form-group col-md-12'>`;
            }

            DatosLactancia.innerHTML += `
                <div class='form-group col-md-6'>
                    <label>${titulo}</label><br>
                    <textarea class='form-control' name='Anamnesis[AlimentacionMenor6][Campos][${identificador}][${titulo}]' id='CamposDinamicosLactancia_${identificador}' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                </div>`;

            if (contadorArreglo % 2 != 0) {
                DatosLactancia.innerHTML += `</div>`;
            }
            contadorArreglo++;
        });

        //por si es impar
        if (contadorArreglo % 2 != 0) {
                DatosLactancia.innerHTML += `</div>`;
        }
    } else if (valor == 'No') {
        // Mostrar campos para no lactancia
        DatosLactancia.innerHTML = '';

        var ArregloIdentificadores = ["7", "8", "9", "10"];//tener un identificador unico para cada campo por si acaso
        const ArregloCamposAntecedentesTituloNo = [
            "Tipo, frecuencia, cantidad y modo de preparación y administración de la leche de fórmula",
            "Ofrecimiento de alimentos o bebidas diferentes a la leche",
            "Para menores de los seis meses, indagar sobre la comprensión sobre el inicio de la alimentación complementaria",
            "Educación y refuerzo en la confianza en la capacidad en la madre y/o su compañero de alimentar adecuadamente a su hijo"
        ];

        var contadorArreglo = 0;
        ArregloCamposAntecedentesTituloNo.forEach(function (titulo, index) {
            var identificador = ArregloIdentificadores[index];

            if (contadorArreglo % 2 === 0) {
                DatosLactancia.innerHTML += `<div class='form-group col-md-12'>`;
            }

            DatosLactancia.innerHTML += `
                <div class='form-group col-md-6'>
                    <label>${titulo}</label><br>
                    <textarea class='form-control' name='Anamnesis[AlimentacionMenor6][Campos][${identificador}][${titulo}]' id='CamposDinamicosLactancia_${identificador}' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                </div>`;

            if (contadorArreglo % 2 != 0) {
                DatosLactancia.innerHTML += `</div>`;
            }
            contadorArreglo++;
        });

        //por si es impar
        if (contadorArreglo % 2 != 0) {
             DatosLactancia.innerHTML += `</div>`;
        }
    } else {
        // Si no se selecciona 'Si' o 'No', ocultar los campos
        DatosLactancia.innerHTML = '';
    }
}

</script>
