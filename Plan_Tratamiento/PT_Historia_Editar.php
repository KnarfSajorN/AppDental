<?php
include '../header.php';
include '../menu.php';


try {

    $cliente_id = decrypt($_GET['cI']);
    $tabla = "Historia_ClinicaBo";
    $page = "PT_FinalizadoHistoria";
    $idUpdate = decrypt($_GET['id']);
    $antecedentesPersonales = [];
    $habitos = [];



    if (isset($_POST["datos"]["historia_id_anterior"])) {
        $_POST = reem_array($_POST);
        $datos = $_POST["datos"]; 
        $historia_id_anterior = $_POST["datos"]["historia_id_anterior"]; 
        
        // var_dump(json_encode($datos));
        // die();

        $values = "";
        foreach ($datos as $key => $value) {
            $thisValue = $value;
            $newValue = "";

            if (is_array($value)) {
                
                foreach ($value as $value1) {
                    $newValue .= $value1 . "|/|";
                }
                $newValue = substr($newValue, 0, -3);
            }
            
            $valueFinal = $newValue != "" ? $newValue : $value;
            $values .= " $key = '{$valueFinal}',";
        }
        
        $values = substr($values, 0, -1);

        $QueryAddColumns = "ALTER TABLE {$tabla} 
                            ADD COLUMN IF NOT EXISTS activo TINYINT(1) DEFAULT 1,
                            ADD COLUMN IF NOT EXISTS historia_id_anterior INT(11) DEFAULT 0"; 

        mysqli_query($conn3, $QueryAddColumns) or die("Error: " . mysqli_error($conn3));
        
        $QueryInsert = "INSERT INTO {$tabla} SET $values";
        // echo $QueryInsert;
        // echo "<script>alert(`$QueryInsert`)</script>";
        // die();
        mysqli_query($conn3, $QueryInsert) or die("Error: " . mysqli_error($conn3));
        
        $QueryUpdate = "UPDATE {$tabla} SET activo = 0 WHERE id = $historia_id_anterior LIMIT 1";
        mysqli_query($conn3, $QueryUpdate) or die("Error: " . mysqli_error($conn3));

        $clienteId = $_POST['datos']['cliente_id'];
        echo "<script>window.location.href='PT_HistoricoOdontologia?clienteId=$clienteId';</script>";
    }



    $rowDatos = [];
    if (isset($_GET['id'])) {
        $queryList = mysqli_query($conn3, "SELECT * FROM  {$tabla} where id=$idUpdate limit 1");
        $rowDatos = mysqli_fetch_assoc($queryList);
        // if ($queryList) {
        //     while ($rowMotorizado = mysqli_fetch_assoc($queryList)) {
        //         $rowDatos = $rowMotorizado;
        //         $antecedentesPersonales = $rowDatos['antecedentes_p'];
        //         $habitos = $rowDatos['Habitos'];
        //         $antecedentesPersonales = explode("|/|", $antecedentesPersonales);
        //         $habitos = explode("|/|", $habitos);
        //     }
        // }
    }


    $rowDatos1 = json_encode($rowDatos);
    // -----------------------------------------------------
    //             automaticForm
    //------------------------------------------------------



    $ID_principal = $_SESSION['ID_principal'];
    $usuario_id = $_SESSION['ID'];
    $queryCliente = mysqli_query($conn3, "SELECT * FROM cliente WHERE cliente_id = $cliente_id");
    while ($row = mysqli_fetch_assoc($queryCliente)) {
        $primer_nombre = $row['primer_nombre'];
        $segundo_nombre = $row['segundo_nombre'];
        $primer_apellido = $row['primer_apellido'];
        $segundo_apellido = $row['segundo_apellido'];
        $genero = $row['genero'];
        $fechaNacimiento = $row['fechaNacimiento'];
        $ocupacion = $row['ocupacion'];
        $direccion = $row['direccion_cliente'];
        $telefono    = $row['telefono_cliente'];
    }
} catch (\Throwable $th) {
    echo "<script>alert(`Ocurrio un error " . $th->getMessage() . " Line " . $th->getLine() . "`)</script>";
    die();
}


$ruta_actual = "PT_Historia_Clinica_Editar";

?>
<div class="content-wrapper p-3">
    <section class="content">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?=$ruta_actual?>" method="POST">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h2>Historia Clínica Odontológica <?=$idUpdate?></h2>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-center">Datos Personales</h3>
                                    </div>

                                    <div class="col-md-12 row">
                                        <div class="form-group col-md-3">
                                            <label for="">Primer Apellido</label>
                                            <input type="text" class="form-control input-lg" id="" name="datos[primer_apellido]" readonly value="<?= $primer_apellido ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Segundo Apellido</label>
                                            <input type="text" class="form-control input-lg" id="" name="datos[segundo_apellido]" readonly value="<?= $segundo_apellido ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Nombres</label>
                                            <input type="text" class="form-control input-lg" id="" name="datos[Nombres]" readonly value="<?= $primer_nombre . " " . $segundo_nombre ?>">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label for="">Edad</label>
                                            <input type="text" class="form-control input-lg" id="nombres" name="" readonly value="<?= CalculoEdadPaciente($fechaNacimiento) ?>">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label for="">Genero</label>
                                            <input type="text" class="form-control input-lg" id="nombres" name="datos[genero]" readonly value="<?= $genero ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 row">
                                        <div class="form-group col-md-4">
                                            <label for="">Fecha </label>
                                            <input type="date" class="form-control input-lg" id="nombres" name="datos[fecha_Nacimiento]" value="<?= $fechaNacimiento ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Lugar de Nacimiento</label>
                                            <input type="text" class="form-control input-lg" id="nombres" name="datos[Lugar_Nacimiento]" value="">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Ocupación</label>
                                            <input type="text" class="form-control input-lg" id="nombres" name="datos[ocupacion]" value="<?= $ocupacion ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Dirección</label>
                                            <input type="text" class="form-control input-lg" id="nombres" name="datos[direccion]" value="<?= $direccion ?>">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Teléfono-Celular</label>
                                            <input type="text" class="form-control input-lg" id="nombres" name="datos[celular]" value="<?= $telefono ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h3 class="text-center">Antecedentes Patológicos y Familiares: </h3>
                                    </div>


                                    <div class="col-md-12">
                                        <label for="">Antecedentes Patológicos y Familiares</label>
                                        <textarea name="datos[antecedentesFamiliares]" id="" class="form-control" rows="5"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <h3 class="text-center">Antecedentes Patológicos Y Personales:</h3>

                                    </div>

                                    <div class="col-md-12 row">
                                        <!-- aqui hares varios checkbox para elegir -->
                                        <div class="col-md-6 row">
                                            <div class="col-md-6">
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" id="Anemia" value="Anemia" name="datos[antecedentes_p][]" <?= in_array("Anemia", $antecedentesPersonales) ? "checked" : "" ?> />
                                                        <label for="Anemia"> Anemia</label>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" id="Asma" value="Asma" name="datos[antecedentes_p][]" <?= in_array("Asma", $antecedentesPersonales) ? "checked" : "" ?> />
                                                        <label for="Asma"> Asma</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" id="Cardiopatías" value="Cardiopatias" name="datos[antecedentes_p][]" <?= in_array("Cardiopatias", $antecedentesPersonales) ? "checked" : "" ?> />
                                                        <label for="Cardiopatías"> Cardiopatías</label>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" id="Diabetes" value="Diabetes" name="datos[antecedentes_p][]" <?= in_array("Diabetes", $antecedentesPersonales) ? "checked" : "" ?> />
                                                        <label for="Diabetes"> Diabetes</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" id="ProblemasRenales" value="ProblemasRenales" name="datos[antecedentes_p][]" <?= in_array("ProblemasRenales", $antecedentesPersonales) ? "checked" : "" ?> />
                                                        <label for="ProblemasRenales"> Problemas Renales</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 row">
                                            <div class="col-md-4">
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" id="EnfGastrica" value="EnfGastrica" name="datos[antecedentes_p][]" <?= in_array("EnfGastrica", $antecedentesPersonales) ? "checked" : "" ?> />
                                                        <label for="EnfGastrica"> Enf. Gástrica </label>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" id="Hepatitis" value="Hepatitis" name="datos[antecedentes_p][]" <?= in_array("Hepatitis", $antecedentesPersonales) ? "checked" : "" ?> />
                                                        <label for="Hepatitis"> Hepatitis</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" id="Tuberculosis" value="Tuberculosis" name="datos[antecedentes_p][]" <?= in_array("Tuberculosis", $antecedentesPersonales) ? "checked" : "" ?> />
                                                        <label for="Tuberculosis"> Tuberculosis</label>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" id="Epilepsia" value="Epilepsia" name="datos[antecedentes_p][]" <?= in_array("Epilepsia", $antecedentesPersonales) ? "checked" : "" ?> />
                                                        <label for="Epilepsia">Epilepsia</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" id="Hipertension" value="Hipertension" name="datos[antecedentes_p][]" <?= in_array("Hipertension", $antecedentesPersonales) ? "checked" : "" ?> />
                                                        <label for="Hipertension">Hipertension</label>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" id="SIDA" value="SIDA" name="datos[antecedentes_p][]" <?= in_array("SIDA", $antecedentesPersonales) ? "checked" : "" ?> />
                                                        <label for="SIDA">SIDA</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" id="coagulacion" value="coagulacion" name="datos[antecedentes_p][]" <?= in_array("coagulacion", $antecedentesPersonales) ? "checked" : "" ?> />
                                                        <label for="coagulacion">problemas de Coagulación sanguínea </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-6">
                                                <label for="">Otros:</label>
                                                <textarea name="datos[otros_antecentes]" id="" class="form-control"><?= $rowDatos['otros_antecentes'] ?></textarea>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Alergias:</label>
                                                <textarea name="datos[alergias]" id="" class="form-control"></textarea>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Embarazo:</label>
                                                <textarea name="datos[Embarazo]" id="" class="form-control"><?= $rowDatos['Embarazo'] ?></textarea>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12 row">
                                        <div class="col-md-6 mt-2">
                                            <label for="">¿Está en tratamiento médico?</label>
                                            <textarea name="datos[tratamiento_medico]" id="" class="form-control"></textarea>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label for="">¿Toma algún medicamento?</label>
                                            <textarea name="datos[medicamento_actual]" id="" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 row">
                                        <div class="col-md-6 mt-2">
                                            <div class="form-group">
                                                <label for="">¿Tuvo alguna hemorragia después de una extracción dental?</label>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="datos[hemorragia_extraccion]" id="" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2 p-3 text-center">
                                            <label for="radioPrimary3">
                                                Mediata o inmediata
                                            </label>
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="radioPrimary1" name="datos[mediata_inmediata]" checked="" value="No">
                                                    <label for="radioPrimary1">No
                                                    </label>
                                                </div>
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="radioPrimary2" name="datos[mediata_inmediata]" value="Si">
                                                    <label for="radioPrimary2">Si
                                                    </label>
                                                </div>
                                                <div class="icheck-primary d-inline">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 row">
                                        <div class="col-md-6">
                                            <h3>Examen Extra Oral</h3>
                                            <div class="col-md-12 ">Atm <input type="text" class="form-control" name="datos[atm]"></div>
                                            <div class="col-md-12 ">Ganglios Linfáticos <input type="text" class="form-control" name="datos[ganglios_linfaticos]"></div>
                                            <div class="col-md-12 ">
                                                Respirador: <br>
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="respirador1" name="datos[respirador]" checked="" value="Nasal">
                                                        <label for="respirador1">Nasal
                                                        </label>
                                                    </div>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="respirador2" name="datos[respirador]" value="Bucal">
                                                        <label for="respirador2">Bucal
                                                        </label>
                                                    </div>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="respirador3" name="datos[respirador]" value="Buco Nasal">
                                                        <label for="respirador3">Buco Nasal
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-12">Otros: <input type="text" class="form-control" name="datos[otros_extra]"></div>
                                            <div class="col-md-12"><label for="" class="">Antecedentes Bucodentales</label></div>
                                            <div class="col-md-12">Fecha de la última visita al Odontólogo: <input type="date" name="datos[fecha_ultima_visita]" id="" class="form-control"></div>
                                            <div class="col-md-12">
                                                <br>
                                                Hábitos:
                                                <br><br>

                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" id="Bebe" value="Bebe" name="datos[Habitos][]" <?= in_array("Bebe", $habitos) ? "checked" : "" ?> />
                                                        <label for="Bebe"> Bebe</label>
                                                    </div>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" id="Fuma" value="Fuma" name="datos[Habitos][]" <?= in_array("Fuma", $habitos) ? "checked" : "" ?> />
                                                        <label for="Fuma"> Fuma</label>
                                                    </div>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" id="Otros" value="Otros" name="datos[Habitos][]" <?= in_array("Otros", $habitos) ? "checked" : "" ?> />
                                                        <label for="Otros"> Otros</label>
                                                    </div>
                                                </div>

                                                <!-- <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="habito1" name="datos[habitos]" checked="" value="Fuma" >
                                                        <label for="habito1">Fuma
                                                        </label>
                                                    </div>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="habito2" name="datos[habitos]" value="Bebe">
                                                        <label for="habito2">Bebe
                                                        </label>
                                                    </div>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="habito3" name="datos[habitos]" value="Otros">
                                                        <label for="habito3">Otros
                                                        </label>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h3>Examen Intra Oral</h3>
                                            <div class="col-md-12 ">Labios: <input type="text" class="form-control" name="datos[labios]"></div>
                                            <div class="col-md-12 ">Lengua: <input type="text" class="form-control" name="datos[lengua]"></div>
                                            <div class="col-md-12 ">Paladar: <input type="text" class="form-control" name="datos[paladar]"></div>
                                            <div class="col-md-12 ">Piso de la Boca: <input type="text" class="form-control" name="datos[piso_bucal]"></div>
                                            <div class="col-md-12 ">Mucosa Yugal: <input type="text" class="form-control" name="datos[mucosa_yucal]"></div>
                                            <div class="col-md-12 ">Encías: <input type="text" class="form-control" name="datos[encias]"></div>
                                            <div class="col-md-12 ">
                                                Utiliza Prótesis Dental: <br><br>
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="protesis1" name="datos[protesis]" checked="" value="Si">
                                                        <label for="protesis1">Si
                                                        </label>
                                                    </div>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="protesis2" name="datos[protesis]" value="No">
                                                        <label for="protesis2">No
                                                        </label>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-md-12">Otros: <input type="text" class="form-control" name="datos[otros_intra]"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 row">
                                        <div class="col-md-12 mt-3">
                                            <h3 class="text-center">Antecedentes de Higiene Oral</h3>
                                        </div>
                                        <div class="col-md-12 row ">
                                            <div class="col-md-4">
                                                <br>
                                                <h5 class="text-center">Usa cepillo dental:</h5>
                                                <div class="form-group clearfix d-flex justify-content-center">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="cepillo1" name="datos[cepillo]" checked="" value="Si">
                                                        <label for="cepillo1">Si
                                                        </label>
                                                    </div>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="cepillo2" name="datos[cepillo]" value="No">
                                                        <label for="cepillo2">No
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <br>
                                                <h5 class="text-center">Utiliza Hilo dental:</h5>

                                                <div class="form-group clearfix d-flex justify-content-center">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="hilo1" name="datos[hilo]" checked="" value="Si">
                                                        <label for="hilo1">Si
                                                        </label>
                                                    </div>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="hilo2" name="datos[hilo]" value="No">
                                                        <label for="hilo2">No
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <br>
                                                <h5 class="text-center">Utiliza enjuague Bucal:</h5>
                                                <div class="form-group clearfix d-flex justify-content-center">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="enguaje1" name="datos[enguaje]" checked="" value="Si">
                                                        <label for="enguaje1">Si
                                                        </label>
                                                    </div>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="enguaje2" name="datos[enguaje]" value="No">
                                                        <label for="enguaje2">No
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mt-5">
                                            <div class="col-md-6">
                                                <label for="">Frecuencia de cepillado</label>
                                                <input type="text" class="form-control" name="datos[frecuencia_cepillado]">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-md-12  ">
                                                    <h5 class="text-center"> Durante el cepillado dental sangran las encías:</h5>

                                                    <div class="form-group clearfix d-flex justify-content-center">
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" id="sangrado1" name="datos[cepillado_sangrado]" checked="" value="Si">
                                                            <label for="sangrado1">Si
                                                            </label>
                                                        </div>
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" id="sangrado2" name="datos[cepillado_sangrado]" value="No">
                                                            <label for="sangrado2">No
                                                            </label>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-12  ">
                                                <label> Higiene dental:</label>

                                                <div class="form-group clearfix d-flex ">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="higieneGeneral1" name="datos[higieneGeneral]" checked="" value="Buena">
                                                        <label for="higieneGeneral1">Buena
                                                        </label>
                                                    </div>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="higieneGeneral2" name="datos[higieneGeneral]" value="Regular">
                                                        <label for="higieneGeneral2">Regular
                                                        </label>
                                                    </div>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="higieneGeneral3" name="datos[higieneGeneral]" value="Mala">
                                                        <label for="higieneGeneral3">Mala
                                                        </label>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12 row">

                                            <div class="col-md-12">
                                                <label for="">¿Ha tenido algún problema grave en un tratamiento dental anterior?</label>
                                                <textarea name="datos[problema_tratamiento_anterior]" id="" class="form-control" rows="4"></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Observaciones:</label>
                                                <textarea name="datos[observaciones]" id="" class="form-control" rows="4"></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Motivo de Consulta:</label>
                                                <textarea name="datos[motivo_consulta]" id="" class="form-control" rows="4"></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Examen Clinico:</label>
                                                <textarea name="datos[examen_clinico]" id="" class="form-control" rows="4"></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Diagnostico:</label>
                                                <textarea name="datos[diagnostico]" id="" class="form-control" rows="4"></textarea>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-center mt-5">
                                        <input type="hidden" name="datos[cliente_id]" value="<?= $cliente_id ?>">
                                        <input type="hidden" name="datos[usuario_id]" value="<?= $usuario_id ?>">
                                        <input type="hidden" name="datos[ID_principal]" value="<?= $ID_principal ?>">
                                        <input type="hidden" name="datos[historia_id_anterior]" value="<?= $idUpdate ?>">


                                    </div>
                                </div>


                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-info rounded-pill" >
                                    <i class="fa fa-save mr-1"></i>
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
</div>
</section>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        const datos = <?= $rowDatos1 ?>;
        const keys = Object.keys(datos);
        console.log("datos", datos);

        $("input, textarea, select").each(function() {
            let name = $(this).attr("name");

            // Ensure name is defined before using .replace()
            if (name) {
                let nombre_col = name.replace("datos[", "").replace("]", "").replace("[]", "");
                let tipoElemento = $(this).attr("type");

                if (keys.includes(nombre_col) && nombre_col != "historia_id_anterior") {
                    const valorGuardado = datos[nombre_col];
                    switch (tipoElemento) {
                        case "radio":
                            if ($(this).val() == valorGuardado) {
                                $(this).prop("checked", true);
                            }
                            break;

                        case "checkbox":

                            const arrayValores = valorGuardado.split("|/|");
                            if (arrayValores.includes($(this).val())) {
                                $(this).prop("checked", true);
                            }
                            break;

                        default:
                            $(this).val(datos[nombre_col]).change();
                            break;
                    }
                }
            }
        });
    });
</script>
<?php
include '../footer.php';
?>