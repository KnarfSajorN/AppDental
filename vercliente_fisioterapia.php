<?php
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

$clienteId = $_GET['clienteId'];

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $usuario_id = $rowMotorizado['usuario_id'];
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $ciudad_cliente = $rowMotorizado['ciudad_cliente'];
    $correo_cliente = $rowMotorizado['correo_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
    $id_uso_servicio = $rowMotorizado['id_uso_servicio'];
    $tipo_cliente = $rowMotorizado['tipo_cliente'];
    $fechar = $rowMotorizado['fechar'];
    $fecha_actualizado = $rowMotorizado['fecha_actualizado'];
    $activo = $rowMotorizado['activo'];
    $genero = $rowMotorizado['genero'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $telefono_cliente = $rowMotorizado['telefono_cliente'];
    $edad_cliente = $rowMotorizado['edad_cliente'];
    $profesion_cliente = $rowMotorizado['profesion_cliente'];
    $acompananteFamiliar = $rowMotorizado['acompananteFamiliar'];
    $telefono_acompanante = $rowMotorizado['telefono_acompanante'];
    $antecedentes = $rowMotorizado['antecedentes'];
    $seguro = $rowMotorizado['entidadSalud'];
    $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
    $autorizacion = $rowMotorizado['autorizacion'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
    $impuestoF = $rowMotorizado['impuestoF'];

    // Nuevos campos

    $nombreF      = $rowMotorizado['nombreF'];
    $telefonoF    = $rowMotorizado['telefonoF'];
    $direccionF   = $rowMotorizado['direccionF'];
    $emailF       = $rowMotorizado['emailF'];
    $ciudadPaisF  = $rowMotorizado['ciudadPaisF'];
    $licenciaF    = $rowMotorizado['licenciaF'];
    $pieF         = $rowMotorizado['pieF'];
    $header       = $rowMotorizado['header'];

    $LogoF               = $rowMotorizado['logoF'];
    $firma               = $rowMotorizado['firma'];
if (strlen($LogoF) > 0) 
              {
                $Logo = '<img src="'.$Base.'logos/'.$LogoF.'" height="175" width="175">'; 
              }
              

            
   if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="'.$Base.'FirmasReg/'.$firma.'" height="80" width="200">'; 
              }

// Nuevos campos 
 
            }
?>
<!-- estilos css-->
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<!-- estilos css-->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    .padd {
        padding-left: 10px;
    }
</style>

<body onload="window.print();">
    <div class="wrapper">
        <div class="col-md-12">

            <table class="tg" style="undefined;table-layout: fixed; width: 100%">
                <tr>
                    <td width="50%" colspan="2"> <?php echo $Logo ?> </td>
                    <td width="50%" colspan="2"> <?php echo $header ?> # Autorización: <?php echo $autorizacion ?></td>
                </tr>
            </table>
            <br>
            <table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">
                <tr>
                    <td width="30%" class="padd">
                        <h6>Nombre del paciente: <?php echo $nombre_cliente ?> </h6>
                    </td>
                    <td width="20%" class="padd">
                        <h6>Documento: <?php echo $CODI_CLIENTE ?> </h6>
                    </td>
                    <td width="20%" class="padd">
                        <h6>Edad: <?php echo  calculaedad($fechaNacimiento) ?> </h6>
                    </td>
                    <td width="30%" class="padd">
                        <h6>F.Nacimiento: <?php echo  $fechaNacimiento ?> </h6>
                    </td>
                </tr>
                <tr>
                    <td class="padd">
                        <h6>Residencia: <?php echo $direccion_cliente ?></h6>
                    </td>
                    <td class="padd">
                        <h6>EPS:<?php echo $seguro  ?> </h6>
                    </td>
                    <td class="padd">
                        <h6>Genero: <?php echo $genero ?></h6>
                    </td>
                    <td class="padd">
                        <h6>Telefono: <?php echo $celular_cliente ?></h6>
                    </td>
                </tr>
            </table>

            <?php
            if ($_GET['desde'] <> "" and $_GET['hasta'] <> "") {
                $desde = $_GET['desde'];
                $hasta = $_GET['hasta'];
                $queryList = mysqli_query($conn3, "SELECT * FROM  historiaClinica6_fisioterapia where cliente_id = $clienteId AND Fecha  BETWEEN '$desde' and '$hasta' order by ID DESC");
            } else {
                $queryList = mysqli_query($conn3, "SELECT * FROM  historiaClinica6_fisioterapia where cliente_id = $clienteId order by ID DESC");
            }
            $nrowl = mysqli_num_rows($queryList);
            while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                $contador++;

                $ID                 = $row_recordset32['id'];
                $Fecha                 = $row_recordset32['Fecha'];
                $Hora                  = $row_recordset32['Hora'];
                $anamnesis       = $row_recordset32['anamnesis'];
                $fisico_postural       = $row_recordset32['fisico_postural'];
                $evaluacion_dolor       = $row_recordset32['evaluacion_dolor'];
                $evaluacion_sensibilidad      = $row_recordset32['evaluacion_sensibilidad'];
                $evaluacion_osteoarticular     = $row_recordset32['evaluacion_osteoarticular'];
                $evaluacion_neuromuscular    = $row_recordset32['evaluacion_neuromuscular'];

                $CIE10    = $row_recordset32['CIE10'];
                $solicitud_procedimiento    = $row_recordset32['solicitud_procedimiento'];
                $orden_medica    = $row_recordset32['orden_medica'];

            ?>

                <h3 align="center"> Historia # <?php echo $contador; ?></h3>
                <hr>

                <div align="right">
                    Fecha <?php echo $Fecha . '-' . $Hora ?>
                </div>


                <?php if (strlen($anamnesis) > 0) : ?>
                    <div align="center">
                        <label> <?php echo $anamnesis ?></label>
                    </div>
                <?php endif ?>

                <?php if (strlen($fisico_postural) > 0) : ?>
                    <div align="center">
                        <label><?php echo $fisico_postural ?></label>
                    </div>
                <?php endif ?>

                <?php if (strlen($evaluacion_dolor) > 0) : ?>
                    <div align="center">
                        <label><?php echo $evaluacion_dolor ?></label>
                    </div>
                <?php endif ?>

                <?php if (strlen($evaluacion_sensibilidad) > 0) : ?>
                    <div align="center">
                        <label><?php echo $evaluacion_sensibilidad ?></label>
                    </div>
                <?php endif ?>

                <?php if (strlen($evaluacion_osteoarticular) > 0) : ?>
                    <div align="center">
                        <label><?php echo $evaluacion_osteoarticular ?></label>
                    </div>
                <?php endif ?>

                <?php if (strlen($evaluacion_neuromuscular) > 0) : ?>
                    <div align="center">
                        <label><?php echo $evaluacion_neuromuscular ?></label>
                    </div>
                <?php endif ?>

                <?php if (strlen($CIE10) > 0) : ?>
                    <div align="center">
                        <label><?php echo $CIE10 ?></label>
                    </div>
                <?php endif ?>

                <?php if (strlen($solicitud_procedimiento) > 0) : ?>
                    <div align="center">
                        <label><?php echo $solicitud_procedimiento ?></label>
                    </div>
                <?php endif ?>

                <?php if (strlen($orden_medica) > 0) : ?>
                    <div align="center">
                        <label><?php echo $orden_medica ?></label>
                    </div>
            <?php endif;
            }
            ?>

        </div>
    </div>
</body>