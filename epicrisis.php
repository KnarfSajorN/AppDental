<?php
include("header.php");
include("menu.php");

$clienteId = decrypt($_GET['cI']);
$ID = $_SESSION['ID'];
?>

<div class="content-wrapper p-3">
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <div class="box-body">
                    <?php echo datosPacientes($clienteId); ?>
                    <div class="col-md-12">
                        <h2 class="text-center">Epicrisis </h2>
                        <form action="guardarHistoriaClinica_controlesPaticas.php" id='FormularioHistoriaClinicaEC'
                            method="POST" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-md-12">

                                    <br>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Servicio </label>
                                            <input type="text" name="servicio" class="form-control" required>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Servicio de Ingreso</label>
                                        <input type="text" name="ingreso" class="form-control">
                                    </div>
                                </div>



                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Fecha de ingreso</label>
                                        <input type="date" name="fecHAI" class="form-control" required>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Hora de Ingreso</label>
                                        <input type="time" name="horai" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Servicio de Egreso</label>
                                        <input type="text" name="egreso" class="form-control">
                                    </div>
                                </div>



                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Fecha de Egreso</label>
                                        <input type="date" name="fechaE" class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Hora de Engreso</label>
                                        <input type="time" name="horaE" class="form-control">
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-12" align="center">
                                    <div class="form-group">
                                        <label>
                                            <h3><b>DEL INGRESO</b></h3></b>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12" align="center">
                                    <div class="form-group">
                                        <label>
                                            <h4><b>Signos Vitales</b></h4></b>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Peso</label>
                                        <input type="text" name="peso" class="form-control">
                                    </div>
                                </div>




                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Talla</label>
                                        <input type="text" name="talla" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">FC</label>
                                        <input type="text" name="fc" class="form-control">
                                    </div>
                                </div>



                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">FR</label>
                                        <input type="text" name="fr" class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">TA</label>
                                        <input type="text" name="ta" class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Profesional</label>
                                        <input type="text" name="profe" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>Motivo de la consulta</b></label>
                                        <textarea class="form-control" name="consultam" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>Enfermedad Actual </b></label>
                                        <textarea class="form-control" name="enferactual" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>Antecedentes Personales </b></label>
                                        <textarea class="form-control" name="antec" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>




                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>Examen Psicológico</b></label>
                                        <textarea class="form-control" name="psico" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>Diagnóstico </b></label>
                                        <textarea class="form-control" name="diagno" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12" align="center">
                                    <div class="form-group" name = "conducta">
                                        <label>
                                            <h3><b>DE LA EVOLUCIÓN</b></h3></b>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>Cambios en el estado del paciente (Complicaciones, accidentes o
                                                eventos
                                                adversos)</b></label>
                                        <textarea class="form-control" name="cambios" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12" align="center">
                                    <div class="form-group">
                                        <label>
                                            <h3><b>DEL EGRESO</b></h3></b>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>Diagnóstico principal
                                            </b></label>
                                        <textarea class="form-control" name="diagEgreso" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>Otros Diagnósticos
                                            </b></label>
                                        <textarea class="form-control" name="otroD" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>Condiciones de la salida del paciente
                                            </b></label>
                                        <textarea class="form-control" name="SALIDAP" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>Recomendaciones
                                            </b></label>
                                        <textarea class="form-control" name="recomenda" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>


                            <input type="hidden" name="control" value="Epicrisis">
                            <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                            <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                            <input type="hidden" name="operador" value="<?php echo $_SESSION['username'] ?>">

                            <br>
                            <div class="col-md-12">
                                <br><br>
                                <center><button type="submit"
                                        class="btn btn-block btn-outline-info rounded-pill btn-md">
                                        <h2> <strong> G u a r d a r </strong> </h2>
                                    </button></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>



<?php
$usuariod_id_autoguardado = $_SESSION["ID"];
$cliente_id_autoguardado = decrypt($_GET['cI']);
$Nombre_Tabla_autoguardado = "historiaClinicaEpic"; //nombre de la tabla de la base de datos de la historia

// $RutaFinal_Encryptado = $_SERVER['SCRIPT_URI'] . "?cl={$cliente_id_autoguardado}";


include 'AutoGuardados/EC/AutoGuardado_Historia_Encryptado.php'; //usar esta para  la historia de medicina estetica

?>
<?php
include("footer.php");
?>
</script>

<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php'; ?>

<script>