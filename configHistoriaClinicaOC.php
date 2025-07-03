<?php
include 'header.php';
include 'menu.php';

$clienteId = decrypt($_GET['cI']);
$idHistoria = decrypt($_GET['iCr']);

//echo "<script>alert(".$idHistoria.")</script>";

$line = $_GET['id'];
$ID = $_SESSION['ID'];
$tipo_historia = $_GET['tipo'];



$queryListhc = mysqli_query($conn3, "SELECT * from configTablasOC where id = '$idHistoria'");
$nrowl = mysqli_num_rows($queryListhc);
while ($rowhc = mysqli_fetch_array($queryListhc)) {
    $nombre = $rowhc['nombre'];
    $action = $rowhc['action'];
    $method = $rowhc['method'];
    $name = $rowhc['name'];
    $boton = $rowhc['boton'];
}





$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $usuario_id = $rowMotorizado['usuario_id'];
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $fechaNacimiento  = $rowMotorizado['fechaNacimiento'];
    $genero  = $rowMotorizado['genero'];
}



$queryList = mysqli_query($conn3, "SELECT * FROM  metodos where cliente_id = $clienteId order by id ASC");
/// echo "SELECT * FROM  operacionRecetario where cliente_id = $clienteId order by id ASC";
$nrowl = mysqli_num_rows($queryList);

while ($row_recordset32 = mysqli_fetch_array($queryList)) {

    $idMetodo    = $row_recordset32['idMetodo'];
}



if ($queryList == '') {
    $idM == 1;
} else {
    $idM   = ($idMetodo + 1);
}


/*$queryconfig=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario=$ID");*/
?>

?>
<link rel="stylesheet" href="apiVoz.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?php echo $nombre ?>, Paciente: <?php echo $nombre_cliente . ', Edad: ' . calculaedad($fechaNacimiento); ?> </h1>
        <ol class="breadcrumb">
            <!--<li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> <?php echo $nombre ?>  </a></li>-->
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="col-md-12">

                            <div class="box box-solid">

                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="box-group" id="accordion1">
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                        <div class="panel box box-primary">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                                                        Datos personales
                                                    </a>
                                                </h4>
                                            </div>



                                            <div id="collapseOne" class="panel-collapse collapse">

                                                <?php echo datosPacientes($clienteId); ?>

                                            </div>
                                        </div>








                                        <form action="<?php echo $action ?>" method="POST" autocomplete="off" name="<?php echo  $name ?>" enctype="multipart/form-data" class="row" id="TablaCreadorHistorias">


                                            <?php if ($idHistoria == 17) {
                                                echo 'Considerando los últimos 30 días, indica si tuviste o no los síntomas que se describen en cada uno de los 14 puntos. Responde espontáneamente y no pienses mucho en las respuestas para que estas sean confiables. Este test de ansiedad de Hamilton te ayudara a hacer un autodiagnóstico de cómo te sientes, antes de tu cita con tu terapeuta.<br><br>
                                                0. No, nunca<br>
                                                1. Algunas veces, 1 vez por semana <br>
                                                2. Bastantes veces, más de 4 días por semana <br>
                                                3. Casi todos los dias, 6 dias a la semana <br>
                                                4. Siempre
                                                ';
                                            }

                                            if ($idHistoria == 34) {
                                                $Modulos_Dinamicos = ["Entidad"];
                                                include "Modulos_Historias/HistoriaAudiologia.php";
                                            }

                                            ?>






                                            <?php
                                            $keyTable = $_GET['id'];

                                            $queryDetalle = mysqli_query($conn3, "SELECT * FROM  configTablaDetalleOC 
                                            where 1=1
                                            and idTabla = $idHistoria 
                                            and estado = 1
                                            order by convert(orden, signed) asc
                                            ");
                                            $nrowl = mysqli_num_rows($queryDetalle);
                                            while ($rowDetalle = mysqli_fetch_array($queryDetalle)) {

                                                $idCampo  = $rowDetalle['id'];
                                                $div_class  = $rowDetalle['div_class'];
                                                $div_align  = $rowDetalle['div_align'];
                                                $div_nombre_campo  = $rowDetalle['div_nombre_campo'];
                                                $input_type  = $rowDetalle['input_type'];
                                                $input_calss  = $rowDetalle['input_calss'];
                                                $input_name  = $rowDetalle['input_name'];
                                                $input_placeholder  = $rowDetalle['input_placeholder'];
                                                $input_id  = $rowDetalle['input_id'];
                                                $input_required  = $rowDetalle['input_required'];
                                                $input_pattern = $rowDetalle['input_pattern'];
                                                $input_onChange  = $rowDetalle['input_onChange'];
                                                $select_table  = $rowDetalle['select_table'];
                                                $style  = $rowDetalle['style'];
                                                $tipoCampo  = $rowDetalle['tipoCampo'];
                                                $input_maxlength  = $rowDetalle['input_maxlength'];
                                                $input_oninput  = $rowDetalle['input_oninput'];
                                                $div_nombre_valor  = $rowDetalle['div_nombre_valor'];
                                                $input_value  = $rowDetalle['input_value'];
                                                $img  = $rowDetalle['img'];


                                                if ($idCampo == 2888) {
                                            ?>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="puestoAltura">PUESTO</label>
                                                                <input type="text" class="form-control input-lg" name="puestoAltura" id="puestoAltura" value="" placeholder="">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="empresaAltura">EMPRESA</label>
                                                                <input type="text" class="form-control input-lg" name="empresaAltura" id="empresaAltura" value="" placeholder="">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="areaAltura">ÁREA</label>
                                                                <input type="text" class="form-control input-lg" name="areaAltura" id="areaAltura" value="" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                if ($idCampo == 2588 || $idCampo == 2573 || $idCampo == 2802 || $idCampo == 2839 || $idCampo == 2694) {
                                                ?>
                                                    <div class="col-md-12" style="display:flex; align-items:flex-start">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="intSNE">INSTITUCIÓN DEL SISTEMA O NOMBRE DE LA EMPRESA</label>
                                                                <input type="text" class="form-control input-lg" name="intSNE" id="intSNE" value="" placeholder="">
                                                            </div>
                                                            <div class="col-md-1">
                                                                <label for="RUC">RUC</label>
                                                                <input type="text" class="form-control input-lg" name="RUC" id="RUC" value="" placeholder="">
                                                            </div>
                                                            <div class="col-md-1">
                                                                <label for="CIU">CIU</label>
                                                                <input type="text" class="form-control input-lg" name="CIU" id="CIU" value="" placeholder="">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="ES">ESTABLECIMIENTO SALUD</label>
                                                                <input type="text" class="form-control input-lg" name="ES" id="ES" value="" placeholder="">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="NA">NÚMERO DE ARCHIVO</label>
                                                                <input type="text" class="form-control input-lg" name="NA" id="NA" value="" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                if ($idCampo == 2694) {
                                                ?>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label for="religion">RELIGION</label>
                                                                <select class="form-control select2" name="religion" id="religion" style="width: 100%;">
                                                                    <option value="" selected disabled>Seleccione</option>
                                                                    <option value="Catolica">Católica</option>
                                                                    <option value="Evangélica">Evangélica</option>
                                                                    <option value="Testigos de Jehova">Testigos de Jehova</option>
                                                                    <option value="Mormona">Mormona</option>
                                                                    <option value="Otras">Otras</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="lateralidad">LATERALIDAD</label>
                                                                <input type="text" class="form-control input-lg" name="lateralidad" id="lateralidad" value="" placeholder="">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="orientacionSexual">ORIENTACIÓN SEXUAL</label>
                                                                <select class="form-control select2" name="orientacionSexual" id="orientacionSexual" style="width: 100%;">
                                                                    <option value="" selected disabled>Seleccione</option>
                                                                    <option value="Lesbiana">Lesbiana</option>
                                                                    <option value="Gay">Gay</option>
                                                                    <option value="Bisexual">Bisexual</option>
                                                                    <option value="Heterosexual">Heterosexual</option>
                                                                    <option value="No sabe / no responde">No sabe/ no responde</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="identidadGenero">IDENTIDAD DE GÉNERO</label>
                                                                <select class="form-control select2" name="identidadGenero" id="identidadGenero" style="width: 100%;">
                                                                    <option value="" selected disabled>Seleccione</option>
                                                                    <option value="Femenino" <?= ($genero == "F" ? "selected" : '') ?>>Femenino</option>
                                                                    <option value="Masculino" <?= ($genero == "M" ? "selected" : '') ?>>Masculino</option>
                                                                    <option value="Trans-femenino">Trans-femenino</option>
                                                                    <option value="Trans-masculino">Trans-masculino</option>
                                                                    <option value="No sabe/no responde">No sabe/no responde</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="discapacidad">DISCAPACIDAD</label>
                                                                <select class="form-control select2" name="discapacidad" id="discapacidad" style="width: 100%;">
                                                                    <option value="" selected disabled>Seleccione</option>
                                                                    <option value="Si">Si</option>
                                                                    <option value="No" selected>No</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="tipoDiscapacidad">TIPO</label>
                                                                <input type="text" class="form-control input-lg" name="tipoDiscapacidad" id="tipoDiscapacidad" value="" placeholder="En caso de no Dejar vacio">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="porcentajeDiscapacidad">%</label>
                                                                <input type="text" class="form-control input-lg" name="porcentajeDiscapacidad" id="porcentajeDiscapacidad" value="" placeholder="En caso de no Dejar vacio">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="fechaIngresoTrabajo">FECHA DE INGRESO AL TRABAJO</label>
                                                                <input type="date" class="form-control input-lg" name="fechaIngresoTrabajo" id="fechaIngresoTrabajo" value="" placeholder="">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="puestoTrabajo">PUESTO DE TRABAJO (CIUO)</label>
                                                                <input type="text" class="form-control input-lg" name="puestoTrabajo" id="puestoTrabajo" value="" placeholder="">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="areaTrabajo">ÁREA DE TRABAJO</label>
                                                                <input type="text" class="form-control input-lg" name="areaTrabajo" id="areaTrabajo" value="" placeholder="">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="actividadRPTO">ACTIVIDADES RELEVANTES AL PUESTO DE TRABAJO A OCUPAR</label>
                                                                <input type="text" class="form-control input-lg" name="actividadRPTO" id="actividadRPTO" value="" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                if ($idCampo == 2839) {
                                                ?>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label for="fechaInicioLabores">FECHA DE INICIO DE LABORES </label>
                                                                <input type="date" class="form-control input-lg" name="fechaInicioLabores" id="fechaInicioLabores" value="" placeholder="">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="fechaSalida">FECHA DE SALIDA</label>
                                                                <input type="date" class="form-control input-lg" name="fechaSalida" id="fechaSalida" value="" placeholder="">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="tiempoMeses">TIEMPO (meses)</label>
                                                                <input type="text" class="form-control input-lg" name="tiempoMeses" id="tiempoMeses" value="" placeholder="">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="puestoTrabajo">PUESTO DE TRABAJO (CIUO)</label>
                                                                <input type="text" class="form-control input-lg" name="puestoTrabajo" id="puestoTrabajo" value="" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <br>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <a href="#printerActivRiesgo" class="btn btn-primary" onclick="activRiesgo()"><i class="fa fa-plus-circle"></i> Nueva Actividad/Riesgo</a>
                                                    </div>
                                                    <div class="col-md-12" id="printerActivRiesgo">
                                                    </div>
                                                <?php
                                                }
                                                if ($idCampo == 2802) {
                                                ?>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label for="puestoTrabajo">PUESTO DE TRABAJO (CIUO)</label>
                                                                <input type="text" class="form-control input-lg" name="puestoTrabajo" id="puestoTrabajo" value="" placeholder="">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="fechaUDL">FECHA DEL ÚLTIMO DÍA LABORAL</label>
                                                                <input type="date" class="form-control input-lg" name="fechaUDL" id="fechaUDL" value="" placeholder="">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="fechaReintegro">FECHA DE REINGRESO</label>
                                                                <input type="date" class="form-control input-lg" name="fechaReintegro" id="fechaReintegro" value="" placeholder="">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="diasTotal">TOTAL (DÍAS)</label>
                                                                <input type="text" class="form-control input-lg" name="diasTotal" id="diasTotal" value="" placeholder="">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="causaSalida">CAUSA DE SALIDA</label>
                                                                <input type="text" class="form-control input-lg" name="causaSalida" id="causaSalida" value="" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                } 
                                                if ($idCampo != 2678 && $idCampo != 2682 && $idCampo != 2686 && $ideCampo != 2796 && $idCampo != 2592 && $idCampo != 2593 && $idCampo != 2594 && $idCampo != 2595 && $idCampo != 2596 && $idCampo != 2597 && $idCampo != 2598 && $idCampo != 2599 && $idCampo != 2600 && $idCampo != 2601 && $idCampo != 2602 && $idCampo != 2603 && $idCampo != 2604 && $idCampo != 2605 && $idCampo != 2606 && $idCampo != 2607 && $idCampo != 2608 && $idCampo != 2609 && $idCampo != 2610 && $idCampo != 2611 && $idCampo != 2612 && $idCampo != 2613 && $idCampo != 2614 && $idCampo != 2615 && $idCampo != 2616 && $idCampo != 2617 && $idCampo != 2618 && $idCampo != 2619 && $idCampo != 2620 && $idCampo != 2621 &&$idCampo != 2677 && $idCampo != 2678 && $idCampo != 2679 && $idCampo != 2680 && $idCampo != 2681 && $idCampo != 2682 && $idCampo != 2683 && $idCampo != 2684 && $idCampo != 2685 && $idCampo != 2686 && $idCampo != 2687 && $idCampo != 2688) {

                                                    if ($idCampo == '791') {
                                                        echo '1. En primer lugar se mide las pulsaciones en reposo (de pie o sentado) durante 1 minuto (PO) (durante 15s multiplicados por 4 para conocer las pulsaciones equivalentes por minuto). Situandonos de pie, haremos 30 flexo-extensiones profundas de piernas (sentadillas), a ritmo constante y con el tronco recto en un angulo de 90°, en 45 s con las manos en la cadera. si se terminan las sentadillas antes de los 45s se continua hasta el final. en mujeres se realizan 20 flexiones durante 30s. despues de realizar este ejercicio y tomar nota de las pulsaciones por minuto (P1), se realiza un descanso de un minuto (de pie o sentado) y procede a registrar de nuevo las pulsaciones por minuto (P2). Finalmente calcularemos mediante la formula el valor de I, y segun este valor tendremos que:<br>
Si I= entre 0,1 y 5 rendimiento CV bueno.<br>
Si I= entre 5,1 y 10 rendimiento CV medio.<br>
Si I= entre 10,1 y 15 rendimiento CV insuficioente.<br>
Si I= entre 15,1 y 20 rendimiento CV malo (requiere evaluacion medica).<br>
NOTA: las pulsaciones de P1 y P2 deben medirse en 15 segundos multiplicados por 4 equivalentes a un minuto, para eliminar el factor de recuperacion.
';
                                                    }


                                                    if ($idCampo == '699') {
                                                        echo ' <h4 class="box-title">Antecedentes Médicos</h4>

                            <div class="row">
                              <div class="form-group col-md-3">
                                <label>Hipertensión Arterial Cronica<input type="checkbox" name="ant1" value="Hipertensi&oacuten Arterial Cronica" ></label>
                              </div>
                              <div class="form-group col-md-3">
                                <label>Diabetes  Mellitus <input type="checkbox" name="ant2" value="Diabetes  Mellitus" ></label>
                              </div>
                              <div class="form-group col-md-3">
                                <label> Insuficiencia Cardiaca<input type="checkbox" name="ant3" value="Insuficiencia Cardiaca" ></label>
                              </div>
                              <div class="form-group col-md-3">
                                <label>Insuficiencia Renal <input type="checkbox" name="ant4" value="Insuficiencia Renal" ></label>
                              </div>
                             

                            </div>
                         

                            <div class="row">

                               <div class="form-group col-md-2">
                                <label> Hipotiroidismo<input type="checkbox" name="ant5" value="Hipotiroidismo" ></label>
                              </div>
                              <div class="form-group col-md-2">
                                <label>Hiperlipidemia<input type="checkbox" name="ant6" value="Hiperlipidemia" ></label>
                              </div>
                              <div class="form-group col-md-2">
                                <label>Cáncer<input type="checkbox" name="ant7" value="C&aacutencer" ></label>
                              </div>
                              <div class="form-group col-md-3">
                                <label>Trastorno de Refracción <input type="checkbox" name="ant8" value="Trastorno de Refracci&oacuten" ></label>
                              </div>
                              <div class="form-group col-md-3">
                                <label>Infección de Trasmisión Sexual <input type="checkbox" name="ant9" value="Infecci&oacuten de Trasmisi&oacuten Sexual" ></label>
                              </div>
                              <div class="form-group col-md-2">
                                <label>OTROS <input type="checkbox" name="ant10" value="Otros" ></label>
                              </div>
                            </div>

                         
<hr>
                             <h4 class="box-title">Antecedentes Quirurgicos</h4>

                              <div class="form-group col-md-12">
                
                <input type="text" class="form-control input-lg" id="seguro" name="ant11">
              </div>



               <h4 class="box-title">Antecedentes  Farmacologicos</h4>

                              <div class="form-group col-md-12">
                
                <input type="text" class="form-control input-lg" id="seguro" name="ant12">
              </div>
<hr>

 <h4 class="box-title">Antecedentes Tóxicos</h4>

                              <div class="form-group col-md-12">
                
                <input type="text" class="form-control input-lg" id="seguro" name="ant13">
              </div>
<hr>

 <h4 class="box-title">Antecedentes Alergícos</h4>

                              <div class="form-group col-md-12">
                
                <input type="text" class="form-control input-lg" id="seguro" name="ant14">
              </div>
<hr>


<h4 class="box-title">Inmunización</h4>

                              <div class="form-group col-md-12">
              
                <input type="text" class="form-control input-lg" id="seguro" name="ant15">
              </div>
<hr>


<h4 class="box-title">Salud Mental</h4>

                              <div class="form-group col-md-12">
                
                <input type="text" class="form-control input-lg" id="seguro" name="ant16">
              </div>
<hr>


<h4 class="box-title">Antecedentes Socioecónomicos</h4>

                              <div class="form-group col-md-12">
                
                <input type="text" class="form-control input-lg" id="seguro" name="ant17">
              </div>
<hr>

<h4 class="box-title">Violencia intrafamiliar, sexual,  económica, psicológica, física, de género</h4>

                              <div class="form-group col-md-12">
                
                <input type="text" class="form-control input-lg" id="seguro" name="ant18" >
              </div>
<hr>
                             <h4 class="box-title">Hábitos de vida saluables </h4>
                            <div class="row">
                              <div class="form-group col-md-3">
                                <label>Actividad física <input type="checkbox" name="ant20" value="Actividad f&iacutesica" ></label>
                              </div>
                              <div class="form-group col-md-2">
                                <label>Consumo de licor <input type="checkbox" name="ant21" value="Consumo de licor" ></label>
                              </div>

                              <div class="form-group col-md-4">
                                <label>Consumo de  sustancias  psicoactivas<input type="checkbox" name="ant22" value="Consumo de  sustancias psicoactivas" ></label>
                              </div>

                              <div class="form-group col-md-3">
                                <label>Consumo de cigarrillo<input type="checkbox" name="ant22x" value="Consumo de cigarrillo" ></label>
                              </div>
                            </div> <br>
<div class="col-md-12" align="center"> <b>EXAMEN FÍSICO</B>  </DIV>


<div class="col-md-12"> <font size="1"> Calculo de IMC   </font></div>

                            <div class="form-group col-md-3">
                              <div align="left">Peso en KG</div>
                              <input type="number" class="form-control input-lg" id="peso" name="peso" onChange="calcularimc();" step="any">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">Altura en <strong>  Centimetros </strong></div>
                              <input type="number" class="form-control input-lg" id="altura" name="altura" onChange="calcularimc();" step="any">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left"> Índice de masa corporal </div>
                              <input type="number" class="form-control input-lg" id="imc" name="imc" step="any"> 
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">Composición corporal</div>
                              <input type="text" class="form-control input-lg" id="ComposicionCorporal" name="ComposicionCorporal">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">TA (mmhg)</div>
                              <input type="text" class="form-control input-lg" id="tart1" name="tart1" step="any" placeholder="123 / 123"  maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">Temperatura  ºC </div>
                              <input type="text" class="form-control input-lg" id="temperatura" name="temperatura" step="any"  maxlength="5" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                            <div class="form-group col-md-3">
                              <div align="left">FC LPM</div>
                              <input type="text" class="form-control input-lg" id="fcard" name="fcard"  maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">SAT02</div>
                              <input type="text" class="form-control input-lg" id="sat" name="sat"  maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>

                              <div class="form-group col-md-6">
                              <div align="left">FRECUENCIA  RESPIRATORIA</div>
                              <input type="text" class="form-control input-lg" id="sat" name="FR"  maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                            <div class="form-group col-md-6">
                              <div align="left">PERÍMETRO ABDÓMINAL</div>
                              <input type="text" class="form-control input-lg" id="sat" name="perimetro"  maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>

                             <div class="form-group col-md-12" align="left">
                                        Observación
                                        <textarea id="e1412" name="examenObservacion" > Inspección: Paciente en buenas condiciones generales,  afebril no dificultad respiratoria,   Fio2: 21% <br>

Cabeza / Craneo : normocéfalo, no depresiones, no fracturas, no cicatrices.<br>

Ojos: pupilas isocoricas normo reactivas   a la luz, no Pterigion, no hiperemia conjuntival, fondo de  ojo normal , parpados sin alteraciones , agudeza visual normal.<br>

Nariz : normal, no hipertrofia de cornetes, no desviación de  tabique, no rinorrea.<br>

Boca / Paladar: sin alteraciones, no sialorrea.<br>

Dentadura: buen estado, no prótesis dentales.<br>

Orofaringe: faringe y amígdalas  no eritemaatosas,  no placas  ni exudados.<br>

Cuello: móvil, no masas, no adenopatías , no dolor al movilizar, no contracturas, tiroides sin alteración.<br>

Torax: no disbalance toracoabdominal.<br>

Corazon: ruidos cardiacos  rítmicos, no soplos  ni sobreagredados.<br>

Respiratorio : murmullo vesicular conservado, no ruidos sobreagredados.<br>

Columna: no desviada, fuerza de músculos dorsales conservada,  no dolor a la palapación.<br>

Extremidades Superiores: sin alteraciones, arcos de movimiento conservados, no contracturas, no amputaciones, phalen negativo bilateral, tinnel negativo bilateral.<br>

Abdomen: blando depresible, no masas , no megalias,  hernia umbilical  sin obstrucción ni gangrena , peristaltismo adecuada frecuencia  e intensidad, globoso por gran paniculo adiposo.<br>

Vascular Periferico: no vena varice, pulsos periféricos de buena intensidad.<br>

Genitales: genitales  externos de  características normales, No masas , no varicocele.<br>

Extremidades Inferiores : sin alteraciones, arcos de movimiento conservados, no contracturas, no amputaciones, no edema , no atrofia, no alteración en la marcha , no claudicación , no uso de ayudas para la marcha , lasague  negativo bilateral.<br>

Piel y Faneras: No tatuajes, No   cicatrices , no micosis, no dermatitis, uñas sin alteraciones, no nevus.<br>

Fuerza: 5/5 en todas las extremidades.<br>

Neurológico:  conciente, orientado , colaborador, sin alteración en pares craneales, no déficit neurlogico ni motor.</textarea>
                                      </div>';
                                                    }



                                                    if ($idCampo == '887') {
                                                        echo '  <div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Método</label>
                                                  <select class="form-control posologia" name="metodo" id="metodo" >
                                                     <option value=" "> </option>
                     <option value="Esterilizaci&oacuten">Esterilización</option
                            <option value="Implante">Implante</option>
                            <option value="Mirena">Mirena</option>
                            <option value="DIU">DIU</option>
                            <option value="Inyectable trimestral">Inyectable trimestral</option>
                            <option value="Inyectable mensual">Inyectable mensual</option>
                            <option value="P&iacuteldora">Píldora</option>
                            <option value="Minip&iacuteldora">Minipíldora</option>
                            <option value="Anillo">Anilo</option> 
                            <option value="Parche">Parche</option>
                            <option value="C&oacutendon">Condón</option>
                            <option value="Ninguno">Ninguno</option>
                            
                          </select>
                                                </div>  
                                             </div>


<div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Usado anteriormente</label><br>
                                                  <input type="text" name="usado" id="usado" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div> 




<div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Salud</label><br>
                                                  <input type="text" name="salud" id="salud" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div> 


<div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Económica</label><br>
                                                  <input type="text" name="economica" id="economica" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div> 
<div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Estilo de vida</label><br>
                                                  <input type="text" name="estilo" id="estilo" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div> 


<div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Elegible</label><br>
                                                  <input type="text" name="elegible" id="elegible" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div> 




<div class="col-md-9">
                                                <div class="form-group">
                                                  <label>Observaciones</label><br>
                                                  <input type="text" name="observacion" id="observacion" class="form-control input-lg dosis" > 
                                                </div>
                                                </div> 


    <input type="hidden" name="id_usuario" id="id_usuario"  value=' . $_SESSION['ID'] . '>
              <input type="hidden" name="idcliente" id="idcliente"  value=' . $clienteId . '>
              <input type="hidden" name="idMetodo" id="idMetodo" value=' . $idM . '>
              

 <div class="form-group col-md-12">
                  <br>
                   
<a href="#"  onclick="agergarMetodo();"> <font size="5">  <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Agregar metodo </strong>  </font> </a>


</div> 


            <br>

                <div class="form-group col-md-12" id="div-results1"></div>
                <br>
                <br>



';
                                                    }
                                                    if ($idCampo == '2069') {
                                                        $Modulos_Dinamicos = ["Audiometria Tonal"];
                                                        include "Modulos_Historias/HistoriaAudiologia.php";
                                                    }
                                                    if ($idCampo == '2075') {
                                                        $Modulos_Dinamicos = ["Logoaudiometria"];
                                                        include "Modulos_Historias/HistoriaAudiologia.php";
                                                    }
                                                    if ($idCampo == '2077') {
                                                        $Modulos_Dinamicos = ["Impedanciometria"];
                                                        include "Modulos_Historias/HistoriaAudiologia.php";
                                                    }
















                                                if ($tipoCampo == 'text') {

                                                    $table = '';
                                                    $valor = '';
                                                    $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablas where id = $idHistoria");
                                                    $nrowl = mysqli_num_rows($queryListhc);
                                                    while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                        $table = $rowhc['name'];
                                                    }

                                                    $queryList = mysqli_query($conn3, "SELECT $input_name AS V FROM  $table WHERE cliente_id = $clienteId AND usuario_id= $usuario_id AND id =$keyTable");
                                                    $nrowl = mysqli_num_rows($queryList);
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                        /*$val[$input_name]*/
                                                        $valor      = $rowMotorizado['V'];
                                                    }

                                                    echo '<div class="' . $div_class . '">
                          <div align="' . $div_align . '"><b>  ' . $div_nombre_campo . '</b> </div>
                         <input type="' . $input_type . '" class=" ' . $input_calss . '" name="' . $input_name . '"   placeholder="' . $input_placeholder . '" id = "' . $input_name . '" ' . $input_required . '  value="' . $valor . $input_value . '" >
                     
                     
                     </div>';
                                                }















                                                    if ($tipoCampo == 'number') {
                                                        $table = '';
                                                        $valor = '';
                                                        $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablasOC where id = $idHistoria");
                                                        $nrowl = mysqli_num_rows($queryListhc);
                                                        while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                            $table = $rowhc['name'];
                                                        }

                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND usuario_id= $usuario_id AND id =$keyTable");
                                                        $nrowl = mysqli_num_rows($queryList);
                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                            $valor      = $rowMotorizado[$input_name];
                                                        }

                                                        echo '<div class="' . $div_class . '">
<div align="' . $div_align . '"><b>  ' . $div_nombre_campo . '</b> </div>
                <input type="' . $input_type . '" class="' . $div_class . ' ' . $input_calss . ' col-md-10" name="' . $input_name . '" placeholder="' . $input_placeholder . '" id = "' . $input_id . '" ' . $input_required . '   value="' . $valor . $input_value . '" maxlength="' . $input_maxlength . '">
            
            </div>';
                                                    }

                                                    if ($tipoCampo == 'textarea') {

                                                    ?>

                                                        <script type="text/javascript">
                                                            var recognition<?php echo $idCampo; ?>;
                                                            var recognizing<?php echo $idCampo; ?> = false;
                                                            if (!('webkitSpeechRecognition' in window)) {
                                                                alert("¡API no soportada!");
                                                            } else {

                                                                recognition<?php echo $idCampo; ?> = new webkitSpeechRecognition();
                                                                recognition<?php echo $idCampo; ?>.lang = "es-CO";
                                                                recognition<?php echo $idCampo; ?>.continuous = true;
                                                                recognition<?php echo $idCampo; ?>.interimResults = true;

                                                                recognition<?php echo $idCampo; ?>.onstart = function() {
                                                                    recognizing<?php echo $idCampo; ?> = true;
                                                                    console.log("empezando a eschucar");
                                                                }
                                                                recognition<?php echo $idCampo; ?>.onresult = function(event) {

                                                                    for (var i = event.resultIndex; i < event.results.length; i++) {
                                                                        if (event.results[i].isFinal)
                                                                            document.getElementById("<?php echo $input_name; ?>").value += event.results[i][0].transcript;
                                                                    }

                                                                    //texto
                                                                }
                                                                recognition<?php echo $idCampo; ?>.onerror = function(event) {}
                                                                recognition<?php echo $idCampo; ?>.onend = function() {
                                                                    recognizing<?php echo $idCampo; ?> = false;
                                                                    document.getElementById("procesar<?php echo $idCampo; ?>").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
                                                                    console.log("terminó de eschucar, llegó a su fin");

                                                                }

                                                            }

                                                            function procesar<?php echo $idCampo; ?>() {

                                                                if (recognizing<?php echo $idCampo; ?> == false) {
                                                                    recognition<?php echo $idCampo; ?>.start();
                                                                    recognizing<?php echo $idCampo; ?> = true;
                                                                    document.getElementById("procesar<?php echo $idCampo; ?>").innerHTML = "<i title='Detener Grabación' style='font-size: 18px;' class='fa fa-pause'>";
                                                                } else {
                                                                    recognition<?php echo $idCampo; ?>.stop();
                                                                    recognizing<?php echo $idCampo; ?> = false;
                                                                    document.getElementById("procesar<?php echo $idCampo; ?>").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
                                                                }
                                                            }
                                                        </script>
                                                    <?php


                                                        $table = '';
                                                        $valor = '';
                                                        $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablasOC where id = $idHistoria");
                                                        $nrowl = mysqli_num_rows($queryListhc);
                                                        while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                            $table = $rowhc['name'];
                                                        }

                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND usuario_id= $usuario_id AND id =$keyTable");
                                                        $nrowl = mysqli_num_rows($queryList);
                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                            $valor      = $rowMotorizado[$input_name];
                                                        }

                                                        echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  <b>' . $div_nombre_campo . '</b> </div>


                                                            

                                                            <textarea  id="' . $input_name . '" name="' . $input_name . '"  class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" >' . $valor . '</textarea>



            </div>';
                                                    }







                                                   if ($tipoCampo == 'select_si_no') {

                                                    $table = '';
                                                    $valor = '';
                                                    $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablas where id = $idHistoria");
                                                    $nrowl = mysqli_num_rows($queryListhc);
                                                    while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                        $table = $rowhc['name'];
                                                    }

                                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND usuario_id= $usuario_id AND id =$keyTable");
                                                    $nrowl = mysqli_num_rows($queryList);
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                        $valor      = $rowMotorizado[$input_name];
                                                    }

                                                    echo '<style>
    div.btnR {
    display: inline-block;
    border: 2px solid #ccc;
    margin-right: 5px;
    padding: 2px 5px;
    cursor: pointer;
    }
    div.btnR.on {
        background-color: #777;
        color: white;
    }
</style>';
                                                    echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '"><b>  ' . $div_nombre_campo . '</b> </div>
                
 

             <select id="' . $input_name . 'Radio"  name="' . $input_name . 'Radio" class="form-control"  style="width: 100%;">
                            <option value="No"> No </option>
                            <option value="Si"> Si </option>
                            
                        </select>
                        <input type="hidden" id="' . $input_name . '" name="' . $input_name . '"  value="' . $valor . $input_value . '" class="Botones_Creador_Historia"><!-- no quitar esta clase ya que se usa para el autoguardado -->
            </div>';

                                                    echo "<script>setTimeout(function(){ 
        var data = {};
        $('#" . $input_name . "Radio option').unwrap().each(function(e) {
        data['" . $input_name . "' + e + ''] = '';
        var btnR = $('<div id=\"" . $input_name . "' + e + '\" class=\"btnR\">'+$(this).text()+'</div>');
        //if($(this).is(':checked')) btnR.addClass('on');
        $(this).replaceWith(btnR);

        if($.trim($('#" . $input_name . "' + e + '').html()) == '" . $valor . "')
          $('#" . $input_name . "' + e + '').addClass('on');

        $(document).on('click', '#" . $input_name . "' + e + '', function() {console.log($(this));            
            data['" . $input_name . "' + e + ''] = 'on';
            for(dt in data) $('#' + dt + '').removeClass('on');
            $(this).addClass('on');
            $('#" . $input_name . "').val($(this)[0].outerText);
        });
         
        });
    }, 1000); </script>";
                                                }






                                                    if ($tipoCampo == 'select') {

                                                        $table = '';
                                                        $valor = '';
                                                        $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablasOC where id = $idHistoria");
                                                        $nrowl = mysqli_num_rows($queryListhc);
                                                        while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                            $table = $rowhc['name'];
                                                        }

                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND usuario_id= $usuario_id AND id =$keyTable");
                                                        $nrowl = mysqli_num_rows($queryList);
                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                            $valor      = $rowMotorizado[$input_name];
                                                        }

                                                        $array = explode(";;", $select_table);

                                                        $arrayCantidad = count($array);

                                                        if ($idHistoria == 17) {
                                                            echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '"><b> ' . $div_nombre_campo . '</b> </div>
                 
             <select   name="' . $input_name . '"  id ="' . $input_id . '" value="' . $valor . $input_value . '"   onChange="calculartest();" step="any" class="form-control select2"  style="width: 100%;">
                            <option value="--"  selected="selected"> -- </option>';
                                                        } else {
                                                            echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '"><b> ' . $div_nombre_campo . '</b> </div>
                 
             <select   name="' . $input_name . '" value="' . $valor . $input_value . '" class="form-control select2"  style="width: 100%;">
                            <option value="--"  selected="selected"> -- </option>';
                                                        }


                                                        for ($i = 0; $i < $arrayCantidad; $i++) {
                                                            echo '<option value="' . $array[$i] . '" ' . (($array[$i] == $valor) ? 'selected=selected' : '') . '> ' . $array[$i] . ' </option>';
                                                        }


                                                        echo '           </select>
            </div>';
                                                    }






                                                    if ($tipoCampo == 'selectmultiple') {

                                                        $valor = 0;

                                                        $table = '';
                                                        $valor = '';
                                                        $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablasOC where id = $idHistoria");
                                                        $nrowl = mysqli_num_rows($queryListhc);
                                                        while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                            $table = $rowhc['name'];
                                                        }

                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND usuario_id= $usuario_id AND id =$keyTable");
                                                        $nrowl = mysqli_num_rows($queryList);
                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                            $valor      = $rowMotorizado[$input_name];
                                                        }

                                                        $data = explode("|", $valor);
                                                        $data2 = array();
                                                        foreach ($data as $k => $v)
                                                            if ($v != '')
                                                                $data2[$v] = $v;

                                                        $array = explode(";;", $select_table);
                                                        $array2 = array();
                                                        foreach ($array as $k => $v)
                                                            $array2[$v] = $v;

                                                        //$arrayCantidad = count($array);

                                                        echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '"><b>  ' . $div_nombre_campo . '</b> </div>
                 
             <select   name="' . $input_name . '[]" class="form-control select2"  style="width: 100%;" multiple>
                            <option value="" select> Seleccionar </option>';

                                                        //for ($i=0; $i < $arrayCantidad ; $i++) 
                                                        //{
                                                        //  echo '<option value="'.$array[$i].'" '.(($array[$data[$i]] != '')?'selected=selected':'').'> '.$array[$i].' </option>';

                                                        //}
                                                        foreach ($array2 as $k => $v) {
                                                            echo '<option value="' . $array2[$v] . '" ' . (($array2[$data2[$v]] != '') ? 'selected=selected' : '') . '> ' . $array2[$v] . ' </option>';
                                                        }


                                                        echo '           </select>
            </div>';
                                                    }







                                                    if ($tipoCampo == 'separador') {
                                                        $div = 'separador' . rand(1, 999);

                                                        if ($idCampo == '1295' and $tipo_historia == "0" and $idHistoria == "23") {
                                                            $div_nombre_campo = "&nbsp;";
                                                        }
                                                        if ($idCampo == '1286' and $tipo_historia == "0" and $idHistoria == "23") {
                                                            $div_nombre_campo = "&nbsp;";
                                                        }

                                                        if ($idCampo == '1293' and $tipo_historia == "1" and $idHistoria == "23") {
                                                            $div_nombre_campo = "&nbsp;";
                                                        }
                                                        if ($idCampo == '1287' and $tipo_historia == "1" and $idHistoria == "23") {
                                                            $div_nombre_campo = "&nbsp;";
                                                        }

                                                        echo '<div class="' . $div_class . '" align= "center"> <strong style="font-size:20px"> ' . $div_nombre_campo . '</strong></div>';
                                                    }

                                                    if ($tipoCampo == 'moduloplegable_inicio' or $tipoCampo == 'moduloplegable_final') {
                                                        echo $input_value;
                                                    }




                                                    if ($tipoCampo == 'imagen') {
                                                        $div = 'imagen' . rand(1, 999);




                                                        echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' ' . $borrar . '</div>
                <img src="' . $img . '"  style="' . $style . '">

            </div>';
                                                    }







                                                    if ($tipoCampo == 'date') {

                                                        $table = '';
                                                        $valor = '';
                                                        $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablasOC where id = $idHistoria");
                                                        $nrowl = mysqli_num_rows($queryListhc);
                                                        while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                            $table = $rowhc['name'];
                                                        }

                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND usuario_id= $usuario_id AND id =$keyTable");
                                                        $nrowl = mysqli_num_rows($queryList);
                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                            $valor      = $rowMotorizado[$input_name];
                                                        }
                                                        echo '<div class="' . $div_class . '">
                                                            <div align="' . $div_align . '">  ' . $div_nombre_campo . ' ' . $borrar . '</div>
                                                            <input type="' . $input_type . '" class="form-control input-lg" name="' . $input_name . '" placeholder="' . $input_placeholder . '" id = "' . $input_id . '" value="' . $valor . $input_value . '">
                                                        </div>';
                                                    }






                                                    if ($tipoCampo == 'file') {

                                                        $valor = 0;

                                                        $table = '';
                                                        $valor = '';
                                                        $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablasOC where id = $idHistoria");
                                                        $nrowl = mysqli_num_rows($queryListhc);
                                                        while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                            $table = $rowhc['name'];
                                                        }

                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND usuario_id= $usuario_id AND id =$keyTable");
                                                        $nrowl = mysqli_num_rows($queryList);
                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                            $valor      = $rowMotorizado[$input_name];
                                                        }


                                                        if (strlen($valor) > 0) {

                                                            $file = explode("|", $valor);
                                                            $view = '';
                                                            foreach ($file as $key => $data) {
                                                                if ($key > 0) {
                                                                    $borrar = "<a  href='configBorrarFile.php?clienteId=$clienteId&idHistoria=$idHistoria&Nombre_table=$input_name&Tabla=$table&id=$k&file=$key'><i title='Borrar Imagen' style='font-size: 18px;' class='fa fa-trash'> </i></a>";
                                                                    $view .= $borrar . '<img src="' . $data . '" height="100">';
                                                                }
                                                            }
                                                        }
                                                    }







                                                    if ($tipoCampo == 'file') {

                                                        echo '<div class="' . $div_class . '">' . $view . '
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' </div>
                <input type="' . $input_type . '" name="' . $input_name . '[]" placeholder="' . $input_placeholder . '" id = "' . $input_name . '[]" ' . $input_required . ' multiple="">
            
                        <div class="' . $div_class . '">
                 <div align="' . $div_align . '"></div>
            </div>
            
            </div>';
                                                    }













                                                    if ($idCampo == '127') {
                                                        echo


                                                        '<div class="col-md-12" align="center"> <B>DIÁGNOSTICO CIE10 </B></div>                                                    
  
<div class="col-md-12" align="left">
    Código CIE 10 <br>  </div>                                            

 <div class="col-md-12"> 





<div class="col-md-3">
<br> 
<input type="text"  id="clienteId"  onChange="verlista();" placeholder="Buscar CIE10" >

<input type="hidden"  id="name1"   value="select1" >

</div>
                <div id="div-results"  class="col-md-9">
                </div>
</div>



<div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Observaciones</label><br>
                                                  <textarea type="text" rows="2" class="form-control nota" name="notacie"  id="notacie" placeholder=""> </textarea>
                                                </div>
                                                </div>


<div class="col-md-12"> 

<div class="col-md-3">
<br> 
<input type="text"  id="clienteId2"  onChange="verlista2();" placeholder="Buscar CIE10" >

<input type="hidden"  id="name2"   value="select2" >

</div>
                <div id="div-results2"  class="col-md-9">
                </div>
</div>



<div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Observaciones</label><br>
                                                  <textarea type="text" rows="2" class="form-control nota" name="notacie2"  id="notacie" placeholder=""> </textarea>
                                                </div>
                                                </div>



<div class="col-md-12"> 

<div class="col-md-3">
<br> 
<input type="text"  id="clienteId3"   onChange="verlista3();" placeholder="Buscar CIE10" >

<input type="hidden"  id="name3"   value="select3" >

</div>
                <div id="div-results3"  class="col-md-9">
                </div>
</div>



<div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Observaciones</label><br>
                                                  <textarea type="text" rows="2" class="form-control nota" name="notacie3"  id="notacie" placeholder=""> </textarea>
                                                </div>
                                                </div>';
                                                    }
                                                } else if ($ideCampo == 2796 || $idCampo == 2592 || $idCampo == 2593 || $idCampo == 2594 || $idCampo == 2595 || $idCampo == 2596 || $idCampo == 2597 || $idCampo == 2598 || $idCampo == 2599 || $idCampo == 2600 || $idCampo == 2601 || $idCampo == 2602 || $idCampo == 2603 || $idCampo == 2604 || $idCampo == 2605 || $idCampo == 2606 || $idCampo == 2607 || $idCampo == 2608 || $idCampo == 2609 || $idCampo == 2610 || $idCampo == 2611 || $idCampo == 2612 || $idCampo == 2613 || $idCampo == 2614 || $idCampo == 2615 || $idCampo == 2616 || $idCampo == 2617 || $idCampo == 2618 || $idCampo == 2619 || $idCampo == 2620 || $idCampo == 2621 || $idCampo == 2677 || $idCampo == 2678 || $idCampo == 2679 || $idCampo == 2680 || $idCampo == 2681 || $idCampo == 2682 || $idCampo == 2683 || $idCampo == 2684 || $idCampo == 2685 || $idCampo == 2686 || $idCampo == 2687 || $idCampo == 2688) {
                                                } else {
                                                    ?>
                                                    <!-- <div class="form-group col-md-4">
                                                        <div align="left"><?= $div_nombre_campo ?></div>
                                                        <select class="form-control input-lg cie10Global2" name="<?= $input_name ?>" id="<?= $input_id ?>" style="width:100%">
                                                        </select>
                                                    </div> -->
                                                <?php
                                                }

                                                if ($idCampo == 2625) {
                                                ?>
                                                    <div class="form-group col-md-4">
                                                        <div align="left">Fecha</div>
                                                        <input type="date" class="form-control input-lg" name="fechaAT" id="fechaAT">
                                                    </div>
                                                <?php
                                                }
                                                if ($idCampo == 2626) {
                                                ?>
                                                    <div class="form-group col-md-12">
                                                        <div class="text-bold" align="center">ENFERMEDADES PROFESIONALES</div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <div align="left"><b> FUE CALIFICADO POR EL INSTITUTO DE SEGURIDAD SOCIAL CORRESPONDIENTE:</b></div>
                                                        <select class="form-control input-lg select2" name="fueCalificado" id="fueCalificado">
                                                            <option value="" selected disabled>Seleccione</option>
                                                            <option value="Si">SI</option>
                                                            <option value="No">NO</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <div align="left"><b>EN CASO DE SI, ESPECIFICAR</b></div>
                                                        <input type="text" class="form-control input-lg" name="encasoSi" id="encasoSi">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <div align="left"><b>FECHA</b></div>
                                                        <input type="date" class="form-control input-lg" name="fechaEP" id="fechaAT">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <div align="left"><b>OBSERVACIONES</b></div>
                                                        <textarea class="form-control input-lg" name="descripcionEP" id="descripcionEP" style="width:100%"></textarea>
                                                    </div>
                                                <?php
                                                }
                                                if ($idCampo == 2703) {
                                                ?>
                                                    <div class="form-group col-xs-2">
                                                        <div align="partos"> <b>PARTO</b> </div>
                                                        <input type="text" class="form-group col-md-2 form-control input-lg" name="partos" placeholder="" id="partos" value="">
                                                    </div>
                                                <?php
                                                }

                                                if ($idCampo == 2746) {
                                                ?>
                                                    <div class="col-md-12">
                                                        <a href="#printerAnteTrabajo" class="btn btn-primary" onclick="addAnteTrabajo(true)"><i class="fa fa-plus-circle"></i></a>
                                                    </div>
                                                    <div class="col-md-12" id="printerAnteTrabajo">
                                                    </div>
                                                <?php
                                                }
                                                if ($idCampo == 2745 || $idCampo == 2591) {
                                                ?>
                                                    <div class="col-md-12">
                                                        <a href="#printerHabitosToxicos" class="btn btn-primary" onclick="addHabitosToxicos(true)"><i class="fa fa-plus-circle"></i></a>
                                                    </div>
                                                    <div class="col-md-12" id="printerHabitosToxicos">
                                                    </div>
                                                <?php
                                                }
                                                if ($idCampo == 2745 || $idCampo == 2591) {
                                                ?>
                                                    <div class="col-md-12" style="display: flex; justify-content: center;">
                                                        <span class="text-bold">ESTILO DE VIDA</span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <a href="#printerEstiloVida" class="btn btn-primary" onclick="addEstiloVida(true)"><i class="fa fa-plus-circle"></i></a>
                                                    </div>
                                                    <div class="col-md-12" id="printerEstiloVida">
                                                    </div>
                                                <?php
                                                }
                                                if ($idCampo == 2633 || $idCampo == 2761) {
                                                ?>
                                                    <div class="col-md-12">
                                                        <a href="#printerRiesgos" class="btn btn-primary" onclick="addRiesgos(true)"><i class="fa fa-plus-circle"></i></a>
                                                    </div>
                                                    <div class="col-md-12" id="printRiesgos"></div>
                                                <?php
                                                }
                                                if ($idCampo == 2675 || $idCampo == 2829 || $idCampo == 2880 || $idCampo == 2794) {
                                                ?>
                                                    <div class="col-md-12">
                                                        <a href="#printerimgLabOtros" class="btn btn-primary" onclick="imgLabOtros('Laboratorio')"><i class="fa fa-plus-circle"></i> LABORATORIO</a>
                                                        <a href="#printerimgLabOtros" class="btn btn-primary" onclick="imgLabOtros('Imagenologia')"><i class="fa fa-plus-circle"></i> IMAGENOLOGIA</a>
                                                        <a href="#printerimgLabOtros" class="btn btn-primary" onclick="imgLabOtros('Otros')"><i class="fa fa-plus-circle"></i> OTROS</a>
                                                    </div>
                                                    <div class="col-md-12" id="printerimgLabOtros"></div>
                                                <?php
                                                    if ($idCampo == 2675) {
                                                        ?>
                                                        <div class="col-md-12">
                                                            <label for="">OBSERVACIONES</label>
                                                            <textarea class="form-control input-lg" name="obsebPediodica" id="obsebPediodica" style="width:100%"></textarea>
                                                        </div>
                                                        <?php  
                                                    }
                                                }
                                                if ($idCampo == 2831 || $idCampo == 2882 || $idCampo == 2796 || $idCampo == 2676) {
                                                ?>
                                                    <div class="col-md-12">
                                                        <a href="#printerCie10" class="btn btn-primary" onclick="addCie10s()"><i class="fa fa-plus-circle"></i>NUEVO CIE10</a>
                                                    </div>
                                                    <div class="col-md-12" id="printerCie10">
                                                    </div>
                                            <?php
                                                }
                                            }


                                            ?>

                                            <?php if ($idHistoria == 17) {
                                                echo '
  <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Resultado</label>
                          <input type="text" name="respuestatest1" id="respuestatest1"  class="form-control input-lg"  step="any">
                        </div>
                      </div>

<div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">INTERPRETACIÓN DE HAMILTON  - PUNTUACIÓN TOTAL NIVELES DE ANSIEDAD </label>
                          <input type="text" name="respuestatestx" id="respuestatestx"  class="form-control input-lg"  step="any">
                        </div>
                      </div>

';
                                            } ?>



                                            <div class="col-md-12" align="left"> Ya terminé <input type="checkbox" value="" required></div>

                                            <input type="hidden" name="line" value="<?php echo $line; ?>">
                                            <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
                                            <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
                                            <input type="hidden" name="telefono" value="<?php echo $telefono_cliente; ?>">
                                            <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">

                                            <input type="hidden" name="idHistoria" value="<?php echo $idHistoria ?>">

                                            <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                                            <input type="hidden" name="receta" value="<?php echo $idR ?>">
                                            <input type="hidden" name="metodo" value="<?php echo $idM ?>">
                                            <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>">

                                            <!--<div align="center">
                                                <br>
                                                <br>
                                                <br>
                                                <div class="col-sm-12">
                                                    <br>
                                                    <br>
                                                    <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                                                            <h2> <strong> <?php echo $boton ?> </strong> </h2>
                                                        </button></center>

                                                </div>
                                            </div>-->

                                            <div class="col-md-12">
                                                <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" type="submit">Guardar</button>
                                            </div>

                                            <input type="hidden" name="tipo_cliente" valur="1">
                                    </div>

                                </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

</div>

</div>

</section>

</div>


<?php
include("footer.php");

include("ajaxCreadorSelect.php");
function Encriptar($valor)
{
    $Sc = base64_decode("keyMaster");
    $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
    return $Texto;
}
// selectFrom: con este objeto podran manipular los campos pasados en el SELECT * FROM, muy util cuando usan JOIN EJEMP:
// selectFrom: Encriptar("lb_c.id AS id, lb_c.Nombre AS Nombre") = SELECT lb_c.id AS id, lb_c.Nombre AS Nombre FROM
// name: nombre del select ATENCION añadir clase o id segun corresponda
// Usuario_Select_Global: aun no tiene ningun uso proxima, proxima actualizacion xd
// value del option: podra contener mas de un campo, solo seprara de esta forma id || descripcion
// text del option: podra contener mas de un campo, solo seprara de esta forma id || descripcion
// likeWhere: condicion a cumplir para el buscador donde seran representado como descripcion like "%$likes%", 
// no esta lkimitado a un solo campo, solo seprara de esta forma codigo || descripcion
// campoCreador: esta campo esta añadido siempre y cuando tengamos el creador de tags activo ya que se encargara de indicar con cual campo,
// debe verificar si existe o no el mismo para saber si debe crearse
// order: este sera el campo que te ayudara a filtrar y se representa en arrays Ejemplo ['group by' => 'empresa', 'order by' => 'cliente_id']
// carapter: si tenemos problemas al cargar una data porque los caracteres devueltos rompen el javascript matenetlo en true de otra forma pueden tenerlo como false
// El ultimo campo nos permitira activar o desactivar el creador de Tags, por defecto esta desactivado ya que no queremos crear nuevos datos desde el select
?>

<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php'; ?>

<script type="text/javascript">
    // window.addEventListener('load', () => {

    // });


    // function funcionDinamica(idOperacion) {
    //   Select2Dinamico(
    //     "#categoryExamen", {
    //       selectFrom: "<?= Encriptar("lb_c.id AS id, lb_c.Nombre AS Nombre") ?>",
    //       name: "<?= Encriptar("LB_ExamenCargado AS lb_e JOIN LB_Examen AS lb_ex ON lb_e.examen_id = lb_ex.id JOIN LB_Categoria AS lb_c ON lb_ex.categoria_id = lb_c.id") ?>",
    //       value: "<?= Encriptar("id") ?>",
    //       text: "<?= Encriptar("Nombre") ?>",
    //       likeWhere: "<?= Encriptar("Nombre") ?>",
    //       order: "<?= Encriptar(json_encode(['group by' => 'lb_c.id'])) ?>",
    //       clausula: {
    //         data: "<?= Encriptar("lb_e.idOperacion = $0") ?>",
    //         value: [idOperacion],
    //       },
    //       carapter: "true",
    //       campoCreador: "<?= Encriptar("") ?>",
    //     }, false
    //   );
    // }
</script>
<script src="apiVoz.js"></script>


<script type="text/javascript">
    function verlista() {

        var clienteId = $("#clienteId").val();
        var name = $("#name1").val();



        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista.php",
            data: {
                clienteId: clienteId,
                name: name
            },
            success: function(response) {
                $('#div-results').html(response);

            }
        });
    };





    function verlista2() {

        var clienteId = $("#clienteId2").val();
        var name = $("#name2").val();



        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista.php",
            data: {
                clienteId: clienteId,
                name: name
            },
            success: function(response) {
                $('#div-results2').html(response);

            }
        });
    };



    function verlista3() {

        var clienteId = $("#clienteId3").val();
        var name = $("#name3").val();


        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista.php",
            data: {
                clienteId: clienteId,
                name: name
            },
            success: function(response) {
                $('#div-results3').html(response);

            }
        });
    };




    function calculardosis() {
        m1 = document.getElementById("frecuencia").value;
        m2 = document.getElementById("administracion").value;
        m3 = document.getElementById("dias").value;

        if (m2 == "Horas") {


            r = 24 / m1;



            document.getElementById("dosisdia").value = r;


        }

        if (m2 == "Minutos") {


            r = 1440 / m1;



            document.getElementById("dosisdia").value = r;


        }

        if (m2 == "Dias") {


            r = 1 / m1;



            document.getElementById("dosisdia").value = r;


        }


        if (m2 == "Semana") {

            a = 7 * m1;
            r = 1 / a;


            document.getElementById("dosisdia").value = r;


        }

        if (m2 == "Mes") {

            a = 30 * m1;
            r = 1 / a;


            document.getElementById("dosisdia").value = r;


        }

        if (m2 == "Ano") {

            a = 365 * m1;
            r = 1 / a;


            document.getElementById("dosisdia").value = r;


        }


        if (m2 == "Unica") {



            r = "&uacutenica Dosis";


            document.getElementById("dosisdia").value = r;


        }

        rt = r * m3;
        document.getElementById("total").value = rt;


    }




    function calcularvalor() {



        m1 = document.getElementById("x402").value;
        m2 = document.getElementById("x652").value;
        m3 = document.getElementById("x119").value;


        v1 = parseFloat(m1) + parseFloat(m2) + parseFloat(m3);
        v2 = v1 - 200;
        r = v2 / 10;





        document.getElementById("x677").value = r.toFixed(2);


        if (r.toFixed(2) <= 0)

            ComposicionCorporal = 'Excelente! Deportista de Élite';
        else if (r.toFixed(2) >= 0.1 & r.toFixed(2) <= 5)

            ComposicionCorporal = 'Muy bueno';
        else if (r.toFixed(2) >= 5.1 & r.toFixed(2) <= 10)

            ComposicionCorporal = 'Bueno';
        else if (r.toFixed(2) >= 10.1 & r.toFixed(2) <= 15)

            ComposicionCorporal = 'Insuficiente';

        else if (r.toFixed(2) >= 15.0 & r.toFixed(2) <= 20)

            ComposicionCorporal = 'Malo';


        else if (r.toFixed(2) > 20)

            ComposicionCorporal = 'Sin respuesta';



        document.getElementById("respuestatest").value = ComposicionCorporal;
    }



    function calculartest() {



        m1 = document.getElementById("1").value;
        m2 = document.getElementById("2").value;
        m3 = document.getElementById("3").value;
        m4 = document.getElementById("4").value;
        m5 = document.getElementById("5").value;
        m6 = document.getElementById("6").value;
        m7 = document.getElementById("7").value;
        m8 = document.getElementById("8").value;
        m9 = document.getElementById("9").value;
        m10 = document.getElementById("10").value;
        m11 = document.getElementById("11").value;
        m12 = document.getElementById("12").value;
        m13 = document.getElementById("13").value;
        m14 = document.getElementById("14").value;


        r = parseFloat(m1) + parseFloat(m2) + parseFloat(m3) + parseFloat(m4) + parseFloat(m5) + parseFloat(m6) + parseFloat(m7) + parseFloat(m8) + parseFloat(m9) + parseFloat(m10) + parseFloat(m11) + parseFloat(m12) + parseFloat(m13) + parseFloat(m14);






        document.getElementById("respuestatest1").value = r.toFixed(2);


        if (r.toFixed(2) < 6)

            ComposicionCorporal = 'Ausencia';
        else if (r.toFixed(2) >= 6 & r.toFixed(2) <= 14)

            ComposicionCorporal = 'Leve';
        else if (r.toFixed(2) >= 15 & r.toFixed(2) <= 25)

            ComposicionCorporal = 'Moderado';
        else if (r.toFixed(2) >= 26 & r.toFixed(2) <= 39)

            ComposicionCorporal = 'Alto';

        else if (r.toFixed(2) >= 40)

            ComposicionCorporal = 'Muy Alto';





        document.getElementById("respuestatestx").value = ComposicionCorporal;
    }



    function agergarItem() {
        // estas son las variables que enviamos
        var codigoProd = $("#codigoProd").val();

        var dosis = $("#dosis").val();
        var posologia = $("#posologia").val();
        var frecuencia = $("#frecuencia").val();
        var administracion = $("#administracion").val();
        var dosisdia = $("#dosisdia").val();
        var dias = $("#dias").val();
        var via = $("#via").val();
        var total = $("#total").val();
        var nota = $("#nota").val();
        var usuario_id = $("#id_usuario").val();
        var idcliente = $("#idcliente").val();
        var idReceta = $("#idReceta").val();
        var codigoProd1 = $("#codigoProd1").val();
        var nota = $("#nota").val();
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "ajax_agregarItemrecetario.php",
            data: {
                codigoProd: codigoProd,
                dosis: dosis,
                posologia: posologia,
                frecuencia: frecuencia,
                administracion: administracion,
                dosisdia: dosisdia,
                dias: dias,
                via: via,
                total: total,
                nota: nota,
                usuario_id: usuario_id,
                idcliente: idcliente,
                idReceta: idReceta,
                codigoProd1: codigoProd1,
                nota: nota
            },
            success: function(response) {

                $('#dosis').val('');
                $('#posologia').val('');
                $('#frecuencia').val('');
                $('#administracion').val('');
                $('#dosisdia').val('');
                $('#dias').val('');
                $('#via').val('');
                $('#total').val('');
                $('#nota').val('');

                $('#codigoProd').val('');
                $('#codigoProd1').val('');
                $('#nota').val('');

                $('#div-results').html(response);

                // aqui enviamos el mensaje por medio de un arreglo               
            }
        });

    };



    /* document.getElementById("detalleRecetario").reset(); */


    function listaItem() {
        // estas son las variables que enviamos
        var usuario_id = $("#usuario_id").val();
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "listaItem.php",
            data: {
                usuario_id: usuario_id
            },
            success: function(response) {
                $('#div-results').html(response);
                // aqui enviamos el mensaje por medio de un arreglo     

            }
        });
    };
    window.onload = listaItem;















    function verDia() {
        // estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();

        // aqui enviamos el mensaje por medio de un arreglo

        $.ajax({
            type: "POST",
            url: "disponibilidad.php",
            data: {
                fecha: fecha,
                Hora: Hora,
                usuario_id: usuario_id
            },
            success: function(response) {
                $('#div-results').html(response);

            }
        });
    };

    function verHora() {
        // estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();

        // aqui enviamos el mensaje por medio de un arreglo

        $.ajax({
            type: "POST",
            url: "disponibilidadHora.php",
            data: {
                fecha: fecha,
                Hora: Hora,
                usuario_id: usuario_id
            },
            success: function(response) {
                $('#div-resultsHora').html(response);

            }
        });
    };

    function calcularimc() {



        m1 = document.getElementById("peso").value;
        m2 = document.getElementById("altura").value;

        r = m1 / ((m2 / 100) * (m2 / 100));



        document.getElementById("imc").value = r.toFixed(2);


        if (r.toFixed(2) < 16)

            ComposicionCorporal = 'Infrapeso: Delgadez Severa';
        else if (r.toFixed(2) > 16 & r.toFixed(2) < 16.99)

            ComposicionCorporal = 'Infrapeso: Delgadez moderada';
        else if (r.toFixed(2) > 17 & r.toFixed(2) < 18.49)

            ComposicionCorporal = 'Infrapeso: Delgadez aceptable';
        else if (r.toFixed(2) > 18.50 & r.toFixed(2) < 24.99)

            ComposicionCorporal = 'Peso Normal';

        else if (r.toFixed(2) > 25.00 & r.toFixed(2) < 29.99)

            ComposicionCorporal = 'Sobrepeso';

        else if (r.toFixed(2) > 30.00 & r.toFixed(2) < 34.99)

            ComposicionCorporal = 'Obeso: Tipo I';

        else if (r.toFixed(2) > 35.00 & r.toFixed(2) < 40)

            ComposicionCorporal = 'Obeso: Tipo II';

        else if (r.toFixed(2) > 40.00)

            ComposicionCorporal = 'Obeso: Tipo III';




        document.getElementById("ComposicionCorporal").value = ComposicionCorporal;
    }

    function calcularprematuriedad() {
        try {
            var a = parseInt(document.formularioActualizarcliente.edadGestacionalCompleta.value);
            var b = parseInt(document.formularioActualizarcliente.edadGestacional.value);
            document.formularioActualizarcliente.SemanasPrematuriedad.value = a - b;
        } catch (e) {}
    }

    function calcularEdadCorregida() {
        try {
            var a = parseInt(document.formularioActualizarcliente.edadCronologica.value);
            var b = parseInt(document.formularioActualizarcliente.semPrematuriedad.value);
            document.formularioActualizarcliente.edadCorregida.value = b - a;
        } catch (e) {}
    }





    function agergarMetodo() {
        // estas son las variables que enviamos
        var metodo = $("#metodo").val();

        var usado = $("#usado").val();
        var salud = $("#salud").val();
        var economica = $("#economica").val();
        var estilo = $("#estilo").val();
        var elegible = $("#elegible").val();
        var observacion = $("#observacion").val();
        var usuario_id = $("#id_usuario").val();
        var idcliente = $("#idcliente").val();
        var idMetodo = $("#idMetodo").val();

        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "ajax_agregarMetodo.php",
            data: {
                metodo: metodo,
                usado: usado,
                salud: salud,
                economica: economica,
                estilo: estilo,
                elegible: elegible,
                observacion: observacion,
                usuario_id: usuario_id,
                idcliente: idcliente,
                idMetodo: idMetodo
            },
            success: function(response) {

                $('#metodo').val('');
                $('#usado').val('');
                $('#salud').val('');
                $('#economica').val('');
                $('#estilo').val('');
                $('#elegible').val('');
                $('#observacion').val('');


                $('#div-results1').html(response);

                // aqui enviamos el mensaje por medio de un arreglo               
            }
        });

    };
</script>
<script type="text/javascript">
    function addOtrosRiesgos(input, id) {
        var imprimir = "";
        imprimir += '  <div class="row" id="otros' + input + id + '">';
        imprimir += '    <div class="col-md-12">';
        imprimir += '      <label for="">' + input + ' Otros</label>';
        imprimir += '      <textarea class="form-control" name="riesgos[' + id + '][' + input + '][otros' + id + ']" id="' + input + id + '" rows="3" style="width:100%"></textarea>';
        imprimir += '    </div>';
        imprimir += '  </div>';
        var select = $("#" + input + id).val()
        var unLock = false;
        select.forEach(element => {
            if (element == "Otros") {
                $("#riesgo" + id).append(imprimir);
                unLock = true;
            } else {
                if (unLock == false) {
                    $("#otros" + input + id).remove();
                }
            }
        });
        // console.log(select);
    }

    var acum = 1;

    function addRiesgos(activo = false) {
        var imprimir = "";
        imprimir += '<div class="col-md-12" id="riesgo' + acum + '">';
        imprimir += '<div class="col-md-12" align="right"><a href="#removerimgLabOtros" class="btn btn-danger" onclick="removerRiesgo(' + acum + ')"><i class="fa fa-trash"></i></a></div>';
        imprimir += '  <div class="row">';
        imprimir += '    <div class="col-md-4">';
        imprimir += '      <label for="puestoTrabajo">PUESTO DE TRABAJO / ÁREA</label>';
        imprimir += '      <input type="text" class="form-control" name="riesgos[' + acum + '][puestoTrabajo]" id="puestoTrabajo' + acum + '" placeholder="">';
        imprimir += '    </div>';
        imprimir += '    <div class="col-md-4">';
        imprimir += '      <label for="actividades">ACTIVIDADES</label>';
        imprimir += '      <input type="text" class="form-control" name="riesgos[' + acum + '][actividades]" id="actividades' + acum + '" placeholder="">';
        imprimir += '    </div>';
        imprimir += '    <div class="col-md-4">';
        imprimir += '      <label for="tiempoTrabajo">TIEMPO DE TRABAJO (MESES)</label>';
        imprimir += '      <input type="text" class="form-control" name="riesgos[' + acum + '][tiempoTrabajo]" id="tiempoTrabajo' + acum + '" placeholder="">';
        imprimir += '    </div>';
        imprimir += '  </div>';
        imprimir += '  <div class="row">';
        imprimir += '    <div class="col-md-2">';
        imprimir += '      <label for="puestoTrabajo">FÍSICO</label>';
        imprimir += '      <select class="form-control input-lg select22" multiple name="riesgos[' + acum + '][fisico][]" id="fisico' + acum + '" onchange="addOtrosRiesgos(\'fisico\', ' + acum + ')">';
        imprimir += '        <option value="Temperaturas altas">Temperaturas altas</option>';
        imprimir += '        <option value="Temperaturas bajas">Temperaturas bajas</option>';
        imprimir += '        <option value="Radiación Ionizante">Radiación Ionizante</option>';
        imprimir += '        <option value="Radiación No Ionizante">Radiación No Ionizante</option>';
        imprimir += '        <option value="Ruido Vibración">Ruido Vibración</option>';
        imprimir += '        <option value="Iluminación">Iluminación</option>';
        imprimir += '        <option value="Ventilación">Ventilación</option>';
        imprimir += '        <option value="Fluido">Fluido</option>';
        imprimir += '        <option value="eléctrico">eléctrico</option>';
        imprimir += '        <option value="Otros">Otros</option>';
        imprimir += '      </select>';
        imprimir += '    </div>';
        imprimir += '    <div class="col-md-2">';
        imprimir += '      <label for="actividades">MECÁNICO</label>';
        imprimir += '      <select class="form-control input-lg select22" multiple name="riesgos[' + acum + '][mecanico][]" id="mecanico' + acum + '" onchange="addOtrosRiesgos(\'mecanico\', ' + acum + ')">';
        imprimir += '        <option value="Atrapamiento entre máquinas">Atrapamiento entre máquinas</option>';
        imprimir += '        <option value="Atrapamiento entre superficies">Atrapamiento entre superficies</option>';
        imprimir += '        <option value="Atrapamiento entre objetos">Atrapamiento entre objetos</option>';
        imprimir += '        <option value="Caída de objetos">Caída de objetos</option>';
        imprimir += '        <option value="Caídas al mismo nivel">Caídas al mismo nivel</option>';
        imprimir += '        <option value="Caídas a diferente nivel">Caídas a diferente nivel</option>';
        imprimir += '        <option value="Contacto eléctrico">Contacto eléctrico</option>';
        imprimir += '        <option value="Contacto con superficies de trabajos">Contacto con superficies de trabajos</option>';
        imprimir += '        <option value="Proyección de partículas – fragmentos">Proyección de partículas – fragmentos</option>';
        imprimir += '        <option value="Proyección de fluidos">Proyección de fluidos</option>';
        imprimir += '        <option value="Pinchazos">Pinchazos</option>';
        imprimir += '        <option value="Cortes">Cortes</option>';
        imprimir += '        <option value="Atropellamientos por vehículos">Atropellamientos por vehículos</option>';
        imprimir += '        <option value="Choques/colisión vehicular">Choques/colisión vehicular</option>';
        imprimir += '        <option value="Otros">Otros</option>';
        imprimir += '      </select>';
        imprimir += '    </div>';
        imprimir += '    <div class="col-md-2">';
        imprimir += '      <label for="">QUÍMICO</label>';
        imprimir += '      <select class="form-control input-lg select22" multiple name="riesgos[' + acum + '][quimico][]" id="quimico' + acum + '" onchange="addOtrosRiesgos(\'quimico\', ' + acum + ')">';
        imprimir += '        <option value="Sólidos">Sólidos </option>';
        imprimir += '        <option value="Polvos">Polvos</option>';
        imprimir += '        <option value="Humos">Humos</option>';
        imprimir += '        <option value="líquidos">líquidos</option>';
        imprimir += '        <option value="vapores">vapores</option>';
        imprimir += '        <option value="Aerosoles">Aerosoles</option>';
        imprimir += '        <option value="Neblinas">Neblinas</option>';
        imprimir += '        <option value="Gaseosos">Gaseosos</option>';
        imprimir += '        <option value="Otros">Otros</option>';
        imprimir += '      </select>';
        imprimir += '    </div>';
        imprimir += '    <div class="col-md-2">';
        imprimir += '      <label for="">BIOLÓGICO</label>';
        imprimir += '      <select class="form-control input-lg select22" multiple name="riesgos[' + acum + '][biológico][]" id="biológico' + acum + '" onchange="addOtrosRiesgos(\'biológico\', ' + acum + ')">';
        imprimir += '        <option value="Virus" >Virus</option>';
        imprimir += '        <option value="Hongos" >Hongos</option>';
        imprimir += '        <option value="Bacterias" >Bacterias</option>';
        imprimir += '        <option value="Parásitos" >Parásitos</option>';
        imprimir += '        <option value="Exposición a vectores" >Exposición a vectores</option>';
        imprimir += '        <option value="Exposición a animales selváticos" >Exposición a animales selváticos</option>';
        imprimir += '        <option value="Otros" >Otros</option>';
        imprimir += '      </select>';
        imprimir += '    </div>';
        imprimir += '    <div class="col-md-2">';
        imprimir += '      <label for="">ERGONÓMICO</label>';
        imprimir += '      <select class="form-control input-lg select22" multiple name="riesgos[' + acum + '][ergonomico][]" id="ergonomico' + acum + '" onchange="addOtrosRiesgos(\'ergonomico\', ' + acum + ')">';
        imprimir += '        <option value="Manejo manual de carga">Manejo manual de carga</option>';
        imprimir += '        <option value="Movimiento repetitivos">Movimiento repetitivos</option>';
        imprimir += '        <option value="Posturas forzadas">Posturas forzadas</option>';
        imprimir += '        <option value="Trabajos con PVD">Trabajos con PVD</option>';
        imprimir += '        <option value="Otros">Otros</option>';
        imprimir += '      </select>';
        imprimir += '    </div>';
        imprimir += '    <div class="col-md-2">';
        imprimir += '      <label for="">PSICOSOCIAL</label>';
        imprimir += '      <select class="form-control input-lg select22" multiple name="riesgos[' + acum + '][psicosocial][]" id="psicosocial' + acum + '" onchange="addOtrosRiesgos(\'psicosocial\', ' + acum + ')">';
        imprimir += '        <option value="Monotonía del trabajo" >Monotonía del trabajo</option>';
        imprimir += '        <option value="Sobrecarga laboral" >Sobrecarga laboral</option>';
        imprimir += '        <option value="Minuciosidad de la tarea" >Minuciosidad de la tarea</option>';
        imprimir += '        <option value="Alta responsabilidad" >Alta responsabilidad</option>';
        imprimir += '        <option value="Autonomía en la toma de decisiones" >Autonomía en la toma de decisiones</option>';
        imprimir += '        <option value="Supervisión y estilos de dirección deficiente" >Supervisión y estilos de dirección deficiente</option>';
        imprimir += '        <option value="Conflicto de rol" >Conflicto de rol</option>';
        imprimir += '        <option value="Falta de Claridad en las funciones" >Falta de Claridad en las funciones</option>';
        imprimir += '        <option value="Incorrecta distribución del trabajo" >Incorrecta distribución del trabajo</option>';
        imprimir += '        <option value="Turnos rotativos" >Turnos rotativos</option>';
        imprimir += '        <option value="Relaciones interpersonales" >Relaciones interpersonales</option>';
        imprimir += '        <option value="Inestabilidad laboral" >Inestabilidad laboral</option>';
        imprimir += '        <option value="Otros" >Otros</option>';
        imprimir += '      </select>';
        imprimir += '    </div>';
        imprimir += '  </div>';
        imprimir += '  <div class="row">';
        imprimir += '    <div class="col-md-12">';
        imprimir += '      <label for="">MEDIDAS PREVENTIVAS</label>';
        imprimir += '      <textarea class="form-control" name="riesgos[' + acum + '][medidasPreventivas]" id="medidasPreventivas' + acum + '" rows="3" style="width:100%"></textarea>';
        imprimir += '    </div>';
        imprimir += '  </div>';
        imprimir += '</div>';
        $("#printRiesgos").append(imprimir);
        if (activo == true) {
            $(".select22").select2();
        }
        acum++;
        selectExamenes(true);
    }
    addRiesgos();

    function selectCie10Globales() {
        Select2Dinamico(
            ".cie10Global", {
                selectFrom: "<?= Encriptar("*") ?>",
                name: "<?= Encriptar("cie10") ?>",
                value: "<?= Encriptar("codigo") ?>",
                text: "<?= Encriptar("codigo || descripcion") ?>",
                likeWhere: "<?= Encriptar("codigo || descripcion") ?>",
                order: "<?= Encriptar(json_encode(['order by' => 'codigo'])) ?>",
                clausula: {
                    data: "<?= Encriptar("") ?>",
                    value: [''],
                },
                carapter: "true",
                campoCreador: "<?= Encriptar("empresa") ?>",
            }, false, {
                valueSelect: "",
                textSelect: ""
            }
        );
        $(".select23").select2();
    }

    function cambioTexto(id, valor) {
        var textTitle = $("#cie10" + id + " option[value='" + $(valor).val() + "']").text().split(" | ");
        $("input[name='cie10s[" + id + "][diagCie10]']").val(textTitle[textTitle.length - 1]);
    }

    var acum3 = 1;

    function addCie10s(activo = false) {
        var imprimir = "";
        imprimir += '<div class="row" id="cie10s' + acum3 + '">';
        imprimir += '<div class="col-md-12" align="right"><a href="#removerimgLabOtros" class="btn btn-danger" onclick="removerCie10s(' + acum3 + ')"><i class="fa fa-trash"></i></a></div>';
        imprimir += '    <div class="col-md-12">';
        imprimir += '        <label for="cie10' + acum3 + '">' + acum3 + '. CIE 10</label>';
        imprimir += '        <select class="form-control input-lg cie10Global" name="cie10s[' + acum3 + '][cie10]" id="cie10' + acum3 + '" onchange="cambioTexto(' + acum3 + ', this)" style="width:100%">';
        imprimir += '        </select>';
        imprimir += '    </div>';
        imprimir += '    <div class="col-md-8">';
        imprimir += '        <label for="diagCie10' + acum3 + '">DIAGNOSTICO</label>';
        imprimir += '        <input type="text" class="form-control input-lg" name="cie10s[' + acum3 + '][diagCie10]" id="diagCie10' + acum3 + '" placeholder="Diagnostico">';
        imprimir += '    </div>';
        imprimir += '    <div class="col-md-4">';
        imprimir += '        <label for="preDef' + acum3 + '">PRE/DEF</label>';
        imprimir += '        <select class="form-control input-lg select23" name="cie10s[' + acum3 + '][preDef]" id="preDef' + acum3 + '" style="width:100%">';
        imprimir += '            <option value="">Seleccione..</option>';
        imprimir += '            <option value="PRE">PRE</option>';
        imprimir += '            <option value="DEF">DEF</option>';
        imprimir += '        </select>';
        imprimir += '    </div>';
        imprimir += '    <div class="col-md-12">';
        imprimir += '       <br>';
        imprimir += '    </div>';
        imprimir += '</div>';
        $("#printerCie10").append(imprimir);
        if (activo == false) {
            selectCie10Globales();
        }
        acum3++;
    }
    selectCie10Globales();
    addCie10s(true);

    var acum4 = 1;

    function activRiesgo(activo = false) {
        var imprimir = "";
        imprimir += '<div class="row" id="activRiesgo' + acum4 + '">';
        imprimir += '    <div class="col-md-12" align="right"><a href="#removerimgLabOtros" class="btn btn-danger" onclick="removerActivRiesgo(' + acum4 + ')"><i class="fa fa-trash"></i></a></div>';
        imprimir += '    <div class="col-md-4">';
        imprimir += '        <label for="actividad' + acum4 + '">Actividad</label>';
        imprimir += '        <input type="text" class="form-control input-lg" name="activRiesgo[' + acum4 + '][actividad]" id="actividad' + acum4 + '" placeholder="Actividad">';
        imprimir += '    </div>';
        imprimir += '    <div class="col-md-8">';
        imprimir += '        <label for="riesgos' + acum4 + '">Riesgos</label>';
        imprimir += '        <input type="text" class="form-control input-lg" name="activRiesgo[' + acum4 + '][riesgo]" id="riesgos' + acum4 + '" placeholder="Riesgo">';
        imprimir += '    </div>';
        imprimir += '    <div class="col-md-12">';
        imprimir += '        <br>';
        imprimir += '    </div>';
        imprimir += '</div>';
        $("#printerActivRiesgo").append(imprimir);
        acum4++;
    }
    activRiesgo();

    var acum5 = 1;

    function addHabitosToxicos(activo = false) {
        var imprimir = "";
        imprimir += '<div class="row" id="habitosToxicos' + acum5 + '">';
        imprimir += '   <div class="col-md-12" align="right"><a href="#printerHabitosToxicos" class="btn btn-danger" onclick="removerHabitosToxicos(' + acum5 + ')"><i class="fa fa-trash"></i></a></div>';
        imprimir += '   <div class="col-md-12">';
        imprimir += '       <label for="consumoNocivo' + acum5 + '">CONSUMO NOCIVO</label>';
        imprimir += '       <input type="text" class="form-control input-lg" name="habitosToxicos[' + acum5 + '][consumoNocivo]" id="consumoNocivo' + acum5 + '" placeholder="">';
        imprimir += '   </div>';
        imprimir += '   <div class="col-md-2">';
        imprimir += '       <label for="sino' + acum5 + '">SI/NO</label>';
        imprimir += '       <select class="form-control input-lg" name="habitosToxicos[' + acum5 + '][sino]" id="sino' + acum5 + '" style="width:100%">';
        imprimir += '           <option value="" selected disabled>Seleccione</option>';
        imprimir += '           <option value="Si">Si</option>';
        imprimir += '           <option value="No">No</option>';
        imprimir += '       </select>';
        imprimir += '   </div>';
        imprimir += '   <div class="col-md-3">';
        imprimir += '       <label for="tiempoConsumo' + acum5 + '">TIEMPO DE CONSUMO</label>';
        imprimir += '       <input type="text" class="form-control input-lg" name="habitosToxicos[' + acum5 + '][tiempoConsumo]" id="tiempoConsumo' + acum5 + '" placeholder="">';
        imprimir += '   </div>';
        imprimir += '   <div class="col-md-2">';
        imprimir += '       <label for="cantidad' + acum5 + '">CANTIDAD</label>';
        imprimir += '       <input type="text" class="form-control input-lg" name="habitosToxicos[' + acum5 + '][cantidad]" id="cantidad' + acum5 + '" placeholder="">';
        imprimir += '   </div>';
        imprimir += '   <div class="col-md-2">';
        imprimir += '       <label for="exConsumidor' + acum5 + '">EX CONSUMIDOR</label>';
        imprimir += '       <input type="text" class="form-control input-lg" name="habitosToxicos[' + acum5 + '][exConsumidor]" id="exConsumidor' + acum5 + '" placeholder="">';
        imprimir += '   </div>';
        imprimir += '   <div class="col-md-3">';
        imprimir += '       <label for="tiempoAbstinencia' + acum5 + '">TIEMPO DE ABSTINENCIA</label>';
        imprimir += '       <input type="text" class="form-control input-lg" name="habitosToxicos[' + acum5 + '][tiempoAbstinencia]" id="tiempoAbstinencia' + acum5 + '" placeholder="">';
        imprimir += '   </div>';
        imprimir += '   <div class="col-md-12">';
        imprimir += '       <br>';
        imprimir += '   </div>';
        imprimir += '</div>';
        $("#printerHabitosToxicos").append(imprimir);
        acum5++;
    }
    addHabitosToxicos();

    var acum6 = 1;

    function addEstiloVida(activo = false) {
        var imprimir = "";
        imprimir += '<div class="row" id="estiloVida' + acum6 + '">';
        imprimir += '   <div class="col-md-12" align="right"><a href="#printerEstiloVida" class="btn btn-danger" onclick="removerEstiloVida(' + acum6 + ')"><i class="fa fa-trash"></i></a></div>';
        imprimir += '   <div class="col-md-12">';
        imprimir += '       <label for="estilo' + acum6 + '">ESTILO</label>';
        imprimir += '       <input type="text" class="form-control input-lg" name="estiloVida[' + acum6 + '][estilo]" id="estilo' + acum6 + '" placeholder="">';
        imprimir += '   </div>';
        imprimir += '   <div class="col-md-4">';
        imprimir += '       <label for="sino' + acum6 + '">SI/NO</label>';
        imprimir += '       <select class="form-control input-lg" name="estiloVida[' + acum6 + '][sino]" id="sino' + acum6 + '" style="width:100%">';
        imprimir += '           <option value="" selected disabled>Seleccione</option>';
        imprimir += '           <option value="Si">Si</option>';
        imprimir += '           <option value="No">No</option>';
        imprimir += '       </select>';
        imprimir += '   </div>';
        imprimir += '   <div class="col-md-4">';
        imprimir += '       <label for="cual' + acum6 + '">¿CUÁL?</label>';
        imprimir += '       <input type="text" class="form-control input-lg" name="estiloVida[' + acum6 + '][cual]" id="cual' + acum6 + '" placeholder="">';
        imprimir += '   </div>';
        imprimir += '   <div class="col-md-4">';
        imprimir += '       <label for="tiempoCantidad' + acum6 + '">TIEMPO / CANTIDAD</label>';
        imprimir += '       <input type="text" class="form-control input-lg" name="estiloVida[' + acum6 + '][tiempoCantidad]" id="tiempoCantidad' + acum6 + '" placeholder="">';
        imprimir += '   </div>';
        imprimir += '   <div class="col-md-12">';
        imprimir += '       <br>';
        imprimir += '   </div>';
        imprimir += '</div>';
        $("#printerEstiloVida").append(imprimir);
        acum6++;
    }
    addEstiloVida();

    var acum7 = 1;

    function addAnteTrabajo(activo = false) {
        var imprimir = "";
        imprimir += '<div class="row" id="anteTrabajo' + acum7 + '">';
        imprimir += '   <div class="col-md-12" align="right"><a href="#printerAnteTrabajo" class="btn btn-danger" onclick="removerAnteTrabajo(' + acum7 + ')"><i class="fa fa-trash"></i></a></div>';
        imprimir += '   <div class="col-md-3">';
        imprimir += '       <label for="empresa' + acum7 + '">EMPRESA</label>';
        imprimir += '       <input type="text" class="form-control input-lg" name="anteTrabajo[' + acum7 + '][empresa]" id="empresa' + acum7 + '" placeholder="">';
        imprimir += '   </div>';
        imprimir += '   <div class="col-md-3">';
        imprimir += '       <label for="puestoTrabajo' + acum7 + '">PUESTO DE TRABAJO</label>';
        imprimir += '       <input type="text" class="form-control input-lg" name="anteTrabajo[' + acum7 + '][puestoTrabajo]" id="puestoTrabajo' + acum7 + '" placeholder="">';
        imprimir += '   </div>';
        imprimir += '   <div class="col-md-3">';
        imprimir += '       <label for="activDesem' + acum7 + '">ACTIVIDADES QUE DESEMPEÑABA</label>';
        imprimir += '       <input type="text" class="form-control input-lg" name="anteTrabajo[' + acum7 + '][activDesem]" id="activDesem' + acum7 + '" placeholder="">';
        imprimir += '   </div>';
        imprimir += '   <div class="col-md-3">';
        imprimir += '       <label for="tiempoTrabajo' + acum7 + '">TIEMPO DE TRABAJO</label>';
        imprimir += '       <input type="text" class="form-control input-lg" name="anteTrabajo[' + acum7 + '][tiempoTrabajo]" id="tiempoTrabajo' + acum7 + '" placeholder="">';
        imprimir += '   </div>';
        imprimir += '   <div class="col-md-6">';
        imprimir += '       <label for="riesgosAnte' + acum7 + '">RIESGO</label>';
        imprimir += '       <select class="form-control input-lg selectNuevo" name="anteTrabajo[' + acum7 + '][riesgo]" id="riesgosAnte' + acum7 + '" style="width:100%">';
        imprimir += '           <option value="" selected disabled>Seleccione</option>';
        imprimir += '           <option value="FISICO">FÍSICO</option>';
        imprimir += '           <option value="MECANICO">MECÁNICO</option>';
        imprimir += '           <option value="QUIMICO">QUÍMICO</option>';
        imprimir += '           <option value="BIOLOGICO">BIOLÓGICO</option>';
        imprimir += '           <option value="ERGONOMICO">ERGONÓMICO</option>';
        imprimir += '           <option value="PSICOSOCIAL">PSICOSOCIAL</option>';
        imprimir += '       </select>';
        imprimir += '   </div>';
        imprimir += '   <div class="col-md-6">';
        imprimir += '       <label for="observaciones' + acum7 + '">OBSERVACIONES</label>';
        imprimir += '       <input type="text" class="form-control input-lg" name="anteTrabajo[' + acum7 + '][observaciones]" id="observaciones' + acum7 + '" placeholder="">';
        imprimir += '   </div>';
        imprimir += '   <div class="col-md-12">';
        imprimir += '       <br>';
        imprimir += '   </div>';
        imprimir += '</div>';
        $("#printerAnteTrabajo").append(imprimir);
        acum6++;
    }
    addAnteTrabajo(true);



    var acum2 = 1;
    var imagenologia = 0;
    var laboratorio = 0;
    var otros = 0;

    function imgLabOtros(tipo) {
        var imprimir = "";
        imprimir += '<div class="col-md-12" id="imgLabOtros' + acum2 + '">';
        imprimir += '<div class="col-md-12" align="right"><a href="#removerimgLabOtros" class="btn btn-danger" onclick="removerimgLabOtros(' + acum2 + ')"><i class="fa fa-trash"></i></a></div>';
        if (tipo == "Otros") {
            imprimir += '   <div class="row">';
            imprimir += '     <div class="col-md-6">';
            imprimir += '       <label for="" style="text-transform: uppercase;">' + tipo + '</label>';
            imprimir += '       <input type="text" class="form-control input-lg" name="' + tipo + '[' + (tipo == "Laboratorio" ? laboratorio : (tipo == "Imagenologia" ? imagenologia : otros)) + '][otros]" id="examen' + acum2 + '" style="width: 100%;">';
            imprimir += '     </div>';
        } else {
            imprimir += '   <div class="row">';
            imprimir += '     <div class="col-md-6">';
            imprimir += '       <label for="" style="text-transform: uppercase;">' + tipo + '</label>';
            imprimir += '       <select class="form-control input-lg select2 ' + tipo + '" name="' + tipo + '[' + (tipo == "Laboratorio" ? laboratorio : (tipo == "Imagenologia" ? imagenologia : otros)) + '][' + tipo + '][]" id="examen' + acum2 + '" style="width: 100%;">';
            imprimir += '       </select>';
            imprimir += '     </div>';
        }
        imprimir += '     <div class="col-md-6">';
        imprimir += '       <label for="">FECHA</label>';
        imprimir += '       <input type="date" class="form-control input-lg" name="' + tipo + '[' + (tipo == "Laboratorio" ? laboratorio : (tipo == "Imagenologia" ? imagenologia : otros)) + '][fecha]" id="fecha' + acum2 + '">';
        imprimir += '     </div>';
        imprimir += '     <div class="col-md-12">';
        imprimir += '       <label for="">RESULTADO</label>';
        imprimir += '       <textarea class="form-control input-lg" name="' + tipo + '[' + (tipo == "Laboratorio" ? laboratorio : (tipo == "Imagenologia" ? imagenologia : otros)) + '][resultado]" id="resultado' + acum2 + '"></textarea>';
        imprimir += '     </div>';
        imprimir += '   </div>';
        imprimir += ' </div>';
        $("#printerimgLabOtros").append(imprimir);
        acum2++;
        (tipo == "Laboratorio" ? laboratorio++ : (tipo == "Imagenologia" ? imagenologia++ : otros++));
        selectExamenes();
    }

    function selectExamenes(activo = false) {
        Select2Dinamico(
            ".Laboratorio", {
                selectFrom: "<?= Encriptar("*") ?>",
                name: "<?= Encriptar("examenes_historia") ?>",
                value: "<?= Encriptar("id") ?>",
                text: "<?= Encriptar("Nombre") ?>",
                likeWhere: "<?= Encriptar("Nombre") ?>",
                order: "<?= Encriptar(json_encode(['order by' => 'id'])) ?>",
                clausula: {
                    data: "<?= Encriptar("tipo = 2") ?>",
                    value: [''],
                },
                carapter: "false",
                campoCreador: "<?= Encriptar("empresa") ?>",
            }, false, {
                valueSelect: "",
                textSelect: ""
            }
        );
        Select2Dinamico(
            ".Imagenologia", {
                selectFrom: "<?= Encriptar("*") ?>",
                name: "<?= Encriptar("examenes_historia") ?>",
                value: "<?= Encriptar("id") ?>",
                text: "<?= Encriptar("Nombre") ?>",
                likeWhere: "<?= Encriptar("Nombre") ?>",
                order: "<?= Encriptar(json_encode(['order by' => 'id'])) ?>",
                clausula: {
                    data: "<?= Encriptar("tipo = 1") ?>",
                    value: [''],
                },
                carapter: "false",
                campoCreador: "<?= Encriptar("empresa") ?>",
            }, false, {
                valueSelect: "",
                textSelect: ""
            }
        );

    }
    imgLabOtros("Laboratorio");
    imgLabOtros("Imagenologia");
    imgLabOtros("Otros");

    function removerEstiloVida(indice) {
        $("#estiloVida" + indice).remove();
    }

    function removerHabitosToxicos(indice) {
        $("#habitosToxicos" + indice).remove();
    }

    function removerActivRiesgo(indice) {
        $("#activRiesgo" + indice).remove();
    }

    function removerimgLabOtros(indice) {
        $("#imgLabOtros" + indice).remove();
    }

    function removerRiesgo(indice) {
        $("#riesgo" + indice).remove();
    }

    function removerCie10s(indice) {
        $("#cie10s" + indice).remove();
    }

    window.addEventListener('load', () => {
        $(".select22").select2();
        selectExamenes();
        Select2Dinamico(
            ".cie10Global", {
                selectFrom: "<?= Encriptar("*") ?>",
                name: "<?= Encriptar("cie10") ?>",
                value: "<?= Encriptar("codigo") ?>",
                text: "<?= Encriptar("descripcion") ?>",
                likeWhere: "<?= Encriptar("codigo || descripcion") ?>",
                order: "<?= Encriptar(json_encode(['order by' => 'codigo'])) ?>",
                clausula: {
                    data: "<?= Encriptar("") ?>",
                    value: [''],
                },
                carapter: "true",
                campoCreador: "<?= Encriptar("empresa") ?>",
            }, false, {
                valueSelect: "",
                textSelect: ""
            }
        );
        Select2Dinamico(
            ".cie10Global2", {
                selectFrom: "<?= Encriptar("*") ?>",
                name: "<?= Encriptar("cie10") ?>",
                value: "<?= Encriptar("codigo") ?>",
                text: "<?= Encriptar("descripcion") ?>",
                likeWhere: "<?= Encriptar("codigo || descripcion") ?>",
                order: "<?= Encriptar(json_encode(['order by' => 'codigo'])) ?>",
                clausula: {
                    data: "<?= Encriptar("") ?>",
                    value: [''],
                },
                carapter: "true",
                campoCreador: "<?= Encriptar("empresa") ?>",
            }, false, {
                valueSelect: "",
                textSelect: ""
            }
        );
    });
</script>


<?php 
if ($idHistoria == "44") {
    $Nombre_Tabla_autoguardado = $Nombre_Tabla_AutoGuardado;//nombre de la tabla de la base de datos de la historia


    $cl_Normal=decrypt($_GET['cI']);//codificada
    $iCr_Normal=decrypt($_GET['iCr']);//codificada
    $tipo_Normal=($_GET['tipo']);//esta viene sin codificar

    $RutaFinal_SoloCreadorHistorias = $_SERVER['REDIRECT_URL']."?cl=$cl_Normal&iCr=$iCr_Normal&tipo=$tipo_Normal";

    include 'AutoGuardados/CreadorHistorias/AutoGuardado_Historia_Generico.php';//usar esta si es necesario modificar el codigo del autoguardado
    //include 'AutoGuardado_Historia.php';//usar esta si no tienen que modificar el archivo y la ruta no tiene el get codificado
}


?>