<?php
include 'header.php';
include 'menu.php';

$clienteId = $_GET['clienteId'];
$usuarioId = $_SESSION['ID'];

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $whatsapp = $rowMotorizado["whatsapp"];
    $correo_cliente = $rowMotorizado["correo_cliente"];
}

if (isset($_POST["Enviar_Documento"])) {

    $Whatsapp = $_POST["numero_whatsapp"];
    $Correo = $_POST["correo"];

    $cliente_id = $_POST["cliente_id"];
    $id = $_POST["id"];
    $NombreTablaEnviar = $_POST["NombreTablaInformacion"];
    $usuario_id = funcionMaster($id, 'id', 'idDoctor', $NombreTablaEnviar);

    $mensajeW = " Sr(a) *" . funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente') . "* Se le ha registrado un documento por el Doctor " . funcionMaster($usuario_id, 'ID', 'NOMBRE_USUARIO', 'usuarios') . ", para visualizarla entrar en el siguiente link, Link: {$Base}imprimirHistoriaEmergencia.php?historiaClinica1={$id}&tipo=consulta";
    $action = 0;
    Whatsapp_sent_cliente($linkkey, $Whatsapp, $mensajeW, $idCliente, $usuario_id, $Whatsapp, $action);

    /////////////////////////////////Correo electronico [Llenar]/////////////////////////////////
    include 'PlantillaCorreo/funcionesPlantillas.php';

    $usuario_id = $usuario_id;
    $titulo = "Documentos";
    $subtitulo = "Documentos Medicos - " . funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
    $texto = $mensajeW . ' o puede darle click al boton que dice Documento, Muchas gracias por su tiempo';;
    $url = ["{$Base}imprimirHistoriaEmergencia.php?historiaClinica1={$id}&tipo=consulta"];
    $botonurl = ["Documento"];

    $mensaje = PlantillaBasicaMedica($usuario_id, $titulo, $subtitulo, $texto, $url, $botonurl);
    ////////////////////////////////////Correo electronico [Datos Adicionales]/////////////////////////////////
    $para = "{$Correo}"; //Correo

    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Cabeceras adicionales
    $cabeceras .= 'To: ' . funcionMaster($usuario_id, 'ID', 'NOMBRE_USUARIO', 'usuarios') . ' <noreply@medicalsoftcolombia.com>' . "\r\n";
    $cabeceras .= 'From: ' . $titulo . ' <noreply@medicalsoftcolombia.com>' . "\r\n";
    $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
    $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

    // Enviarlo
    mail($para, $subtitulo, $mensaje, $cabeceras);

    echo "<script language='Javascript'> window.location='verHistoriaEmergencia.php?clienteId={$cliente_id}&msg=Se ha enviado el documento correctamente'</script>";
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Paciente

        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Historial Emergencia</a></li>
        </ol>
    </section>

    <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="card-body">
                <div class="box">
                    <?php echo datosPacientes($clienteId); ?>
                    <div align="center">
                        <!-- <a class="btn btn-primary" href="Historia_Clinica.php?clienteId=<?php echo $clienteId; ?>" role="button"> <i class="fa fa-heartbeat"></i> Nueva consulta </a> -->
                        <a class="btn btn-primary" href="historiaImagenes.php?clienteId=<?php echo $clienteId; ?>" role="button"><i class="fa fa-folder-open-o"></i> Agregar exámenes </a>
                        <a class="btn btn-primary" href="PacientesEmergenciaHospitalizacion.php" role="button"><i class="fa fa-refresh"></i> Admision de Paciente</a>
                        <a class="btn btn-primary" href="nuevoPaciente" role="button"><i class="fa fa-user"></i> Admisionar </a>
                        <?php
                        include 'estadoFacturaPresupuestoCliente.php';
                        ?>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>

    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historia</a></li>
                        <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab"> <i class='fas fa-vials' style='font-size:26px'> </i> Examenes</a></li>
                        <!-- <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fas fa-bed' style='font-size:26px'> </i> Incapacidades</a></li> -->
                        <li role="presentation"><a href="#Section4" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fas fa-prescription-bottle-alt' style='font-size:26px'> </i> Recetas</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <!-- inicio seccion 1 -->
                        <div role="tabpanel" class="tab-pane fade in active" id="Section1">

                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                    <?php

                                    $queryList = mysqli_query($conn3, "SELECT * FROM historiaEmergencia where idCliente = '$clienteId' AND idDoctor='$usuarioId'");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id = $rowMotorizado['id'];
                                        $cliente_id = $rowMotorizado['idCliente'];
                                        $usuario_id = $rowMotorizado['idDoctor'];
                                        $motivoConsulta = $rowMotorizado['motivoConsulta'];
                                        $tratamiento = $rowMotorizado['tratamiento'];
                                        $signosVitales = $rowMotorizado['signosVitales'];
                                        $Imagenologia_Examen = $rowMotorizado['Imagenologia_Examen'];
                                        $Laboratorio_Examenes = $rowMotorizado['Laboratorio_Examenes'];
                                        $interconsulta = $rowMotorizado['interconsulta'];
                                        $fecha = $rowMotorizado['created_at'];
                                        $RecetaId = $rowMotorizado['RecetaId'];

                                    ?>
                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?php echo $id ?>" aria-expanded="false" aria-controls="Historia<?php echo $id ?>">
                                                        Historia <?php echo $id . ' / <b style="color: #444444;">' . $fecha . '</b>'; ?>

                                                        <button onclick="window.location.href='finalizadoHistoriaEmergencia.php?historiaClinica1=<?php echo $id; ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
                                                        <button onclick="window.location.href='seguimientoEmergencia.php?historiaClinica1=<?php echo $id; ?>&cliente=<?php echo $cliente_id; ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="bi:eye-fill"></i></button>
                                                        <button data-toggle="modal" data-target="#modalEnvio" onclick="EnviarMensaje('<?php echo $cliente_id; ?>','<?php echo $id; ?>','historiaEmergencia','Enviar_Documento');" style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;" title="Enviar Documento [Whatsapp/Correo Electronico]"><i class="iconify" data-icon="ri:whatsapp-fill" style="position: relative;right: -2px;"></i><i class="iconify" data-icon="fluent:mail-alert-16-filled" style="position: relative;left: -0.5px;"></i></button>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Historia<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                                <div class="panel-body">
                                                    <?php
                                                    echo 'Motivo Consulta<br>' . $motivoConsulta . '<br>';
                                                    echo 'Signos Vitales<br>' . $signosVitales . '<br>';
                                                    echo 'Tratamiento<br>' . $motivoConsulta . '<br>';
                                                    echo 'Enfermedad Actual<br>' . $tratamiento . '<br>';


                                                    echo 'Solicitud de Laboratorios y Exámenes Complementarios<br>';
                                                    $Examen_Paciente = explode(",", $Imagenologia_Examen);
                                                    foreach ($Examen_Paciente as $value) {
                                                        echo funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '<br>';
                                                    }
                                                    echo 'Laboratorios<br>';
                                                    $Laboratorio_Paciente = explode(",", $Laboratorio_Examenes);
                                                    foreach ($Laboratorio_Paciente as $value) {
                                                        echo funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '<br>';
                                                    }
                                                    echo 'Interconsulta <br>' . $interconsulta . '<br>';
                                                    ?>       
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <!--final accordion-->   




                        </div>
                        <!-- cierre seccion 1-->



                        <!-- inicio seccion 2 -->
                        <div role="tabpanel" class="tab-pane fade" id="Section2">


                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                    <?php

                                    $queryList = mysqli_query($conn3, "SELECT * FROM historiaEmergencia where idCliente = '$clienteId' AND idDoctor='$usuarioId'");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id = $rowMotorizado['id'];
                                        $cliente_id = $rowMotorizado['idCliente'];
                                        $usuario_id = $rowMotorizado['idDoctor'];
                                        $motivoConsulta = $rowMotorizado['motivoConsulta'];
                                        $tratamiento = $rowMotorizado['tratamiento'];
                                        $Imagenologia_Examen = $rowMotorizado['Imagenologia_Examen'];
                                        $Laboratorio_Examenes = $rowMotorizado['Laboratorio_Examenes'];
                                        $interconsulta = $rowMotorizado['interconsulta'];
                                        $fecha = $rowMotorizado['created_at'];
                                        $RecetaId = $rowMotorizado['RecetaId'];

                                    ?>
                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Examenes<?php echo $id ?>" aria-expanded="false" aria-controls="Examenes<?php echo $id ?>">
                                                        Examenes <?php echo $id; ?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Examenes<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                                                <div class="panel-body">
                                                    <?php
                                                    echo 'Examenes<br>';
                                                    $Examen_Paciente = explode(",", $Imagenologia_Examen);
                                                    foreach ($Examen_Paciente as $value) {
                                                        echo funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '<br>';
                                                    }
                                                    echo 'Laboratorios<br>';
                                                    $Laboratorio_Paciente = explode(",", $Laboratorio_Examenes);
                                                    foreach ($Laboratorio_Paciente as $value) {
                                                        echo funcionMaster($value, 'id', 'Nombre', 'examenes_historia');
                                                    }
                                                    ?>       
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <!--final accordion--> 


                        </div>
                        <!-- cierre seccion 2-->



                        <!-- inicio seccion 3 -->
                        <!-- <div role="tabpanel" class="tab-pane fade" id="Section3">


                            inicio accordion
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                    <?php

                                    $queryList = mysqli_query($conn3, "SELECT * FROM historiaEmergencia where idCliente = '$clienteId' AND idDoctor='$usuarioId'");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id = $rowMotorizado['id'];
                                        $cliente_id = $rowMotorizado['idCliente'];
                                        $usuario_id = $rowMotorizado['idDoctor'];
                                        $motivoConsulta = $rowMotorizado['motivoConsulta'];
                                        $tratamiento = $rowMotorizado['tratamiento'];
                                        $Imagenologia_Examen = $rowMotorizado['Imagenologia_Examen'];
                                        $Laboratorio_Examenes = $rowMotorizado['Laboratorio_Examenes'];
                                        $interconsulta = $rowMotorizado['interconsulta'];
                                        $fecha = $rowMotorizado['created_at'];
                                        $RecetaId = $rowMotorizado['RecetaId'];

                                    ?>
                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Incapacidad<?php echo $id ?>" aria-expanded="false" aria-controls="Incapacidad<?php echo $id ?>">
                                                        Incapacidad <?php echo $id; ?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Incapacidad<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                                                <div class="panel-body">
                                                    <?php
                                                    echo 'Incapacidades<br>' . $Incapacidades . '<br>';
                                                    ?>       
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            final accordion


                        </div> -->
                        <!-- cierre seccion 3-->

                        <!-- inicio seccion 4 -->
                        <div role="tabpanel" class="tab-pane fade" id="Section4">


                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                    <?php

                                    $queryList = mysqli_query($conn3, "SELECT * FROM historiaEmergencia where idCliente = '$clienteId' AND idDoctor='$usuarioId'");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id = $rowMotorizado['id'];
                                        $cliente_id = $rowMotorizado['idCliente'];
                                        $usuario_id = $rowMotorizado['idDoctor'];
                                        $motivoConsulta = $rowMotorizado['motivoConsulta'];
                                        $tratamiento = $rowMotorizado['tratamiento'];
                                        $Imagenologia_Examen = $rowMotorizado['Imagenologia_Examen'];
                                        $Laboratorio_Examenes = $rowMotorizado['Laboratorio_Examenes'];
                                        $interconsulta = $rowMotorizado['interconsulta'];
                                        $fecha = $rowMotorizado['created_at'];
                                        $RecetaId = $rowMotorizado['RecetaId'];

                                    ?>
                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="headingOne" style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Receta<?php echo $id; ?>" aria-expanded="true" aria-controls="collapseOne"> Receta <?php echo $id; ?> </a>
                                                </h4>
                                            </div>
                                            <div id="Receta<?php echo $id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                                                <div class="panel-body">

                                                    <table id="example1" class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <h6 align="center">MEDICAMENTO</h6>
                                                                </th>
                                                                <th>
                                                                    <h6 align="center">FRECUENCIA DE ADMINISTRACIÓN</h6>
                                                                </th>
                                                                <th>
                                                                    <h6 align="center">DOSIS</h6>
                                                                </th>
                                                                <th>
                                                                    <h6 align="center">DURACIÓN DE PRESCRIPCIÓN</h6>
                                                                </th>
                                                                <th>
                                                                    <h6 align="center">METODO DE ADMINISTRACIÓN</h6>
                                                                </th>
                                                                <th>
                                                                    <h6 align="center">CANTIDAD TOTAL DE DESPACHO</h6>
                                                                </th>
                                                                <th>
                                                                    <h6 align="center">INDICACIONES DE ADMINISTRACIÓN</h6>
                                                                </th>
                                                                <th>
                                                                    <h6 align="center">OBSERVACIONES</h6>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <?php
                                                        $querydeta = mysqli_query($conn3, "SELECT * FROM  operacionRecetario  where  cliente_id = $cliente_id  and idReceta=$RecetaId");
                                                        $nrowl = mysqli_num_rows($querydeta);
                                                        while ($rowDetalle = mysqli_fetch_array($querydeta)) {
                                                            $Producto = funcionMaster($rowDetalle['codigoProd'], 'id', 'descripcion', 'pos');
                                                            $posologia                = $rowDetalle['posologia'];
                                                            $cantidad          = $rowDetalle['cantidad'];
                                                            $duracion          = $rowDetalle['duracion'];
                                                            $metodo          = $rowDetalle['metodo'];
                                                            $nota            = $rowDetalle['nota'];
                                                            $nota2         = $rowDetalle['nota2'];
                                                            $administracion_posologia  = $rowDetalle['administracion_posologia'];
                                                            $duracion_tratamiento         = $rowDetalle['duracion_tratamiento'];

                                                            $dosis                 = $rowDetalle['dosis'];

                                                            $frecuencia                 = $rowDetalle['frecuencia'];
                                                            $administracion              = $rowDetalle['administracion'];
                                                            $dosisdia           = $rowDetalle['dosisdia'];
                                                            $via   = $rowDetalle['via'];
                                                            $id_usuario              = $rowDetalle['id_usuario'];
                                                            $id_cliente              = $rowDetalle['idcliente'];
                                                            $total             = $rowDetalle['total'];
                                                            $dias             = $rowDetalle['dias'];

                                                            $producto1          = $rowDetalle['producto1'];

                                                            $numero++;
                                                        ?>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <h6> <?php echo $Producto . ' - ' . $producto1 ?></h6>
                                                                    </td>
                                                                    <td>
                                                                        <h6><?php echo $frecuencia ?> </h6>
                                                                    </td>
                                                                    <td>
                                                                        <h6><?php echo $dosis ?></h6>
                                                                    </td>
                                                                    <td>
                                                                        <h6><?php echo $duracion ?></h6>
                                                                    </td>
                                                                    <td>
                                                                        <h6><?php echo $metodo ?></h6>
                                                                    </td>
                                                                    <td>
                                                                        <h6><?php echo $cantidad . $posologia ?></h6>
                                                                    </td>
                                                                    <td>
                                                                        <h6><?php echo $nota ?></h6>
                                                                    </td>
                                                                    <td>
                                                                        <h6><?php echo $nota2 ?></h6>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        <?php
                                                        }
                                                        ?>
                                                    </table>
                                                           
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <!--final accordion-->  


                        </div>
                        <!-- cierre seccion 4-->




                    </div>
                </div>
            </div>
        </div>
    </div>

















</div>
</section>
</div>


<div class="modal fade" id="modalEnvio" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Enviar Documento</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="verHistoriaEmergencia.php?clienteId=<?php echo $cliente_id ?>" method="POST" name="formularioEnvioExamen">
                    <div class="form-group">
                        <label for="inputEmail">Whatsapp</label>
                        <input type="number" class="form-control" name="numero_whatsapp" value="<?php echo $whatsapp ?>" />
                        <label for="inputEmail">Correo</label>
                        <input type="text" class="form-control" name="correo" value="<?php echo $correo_cliente ?>" />
                        <input type="hidden" name="cliente_id" id="cliente_id">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="NombreTablaInformacion" id="NombreTablaInformacion">
                    </div>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary submitBtn" Name="Enviar_Documento">Enviar</button>

                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function EnviarMensaje(cliente_id, id, NombreTablaInformacion, boton) {
        document.getElementById("cliente_id").value = cliente_id;
        document.getElementById("id").value = id;
        document.getElementById("NombreTablaInformacion").value = NombreTablaInformacion;
    }
</script>
<?php
include 'footer.php';
?>