<!DOCTYPE html>

<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
$clienteId = decrypt($_GET['cI']);
$Plantilla_General_id = decrypt($_GET['pGi']);

$NombreTabla = funcionMaster($Plantilla_General_id, 'id', 'Nombre_Tabla', 'PP_Plantillas_Principales');
$NombreVisualTablaInformacion = funcionMaster($Plantilla_General_id, 'id', 'Nombre', 'PP_Plantillas_Principales');
$usuario_id = $_SESSION['ID'];

if (isset($_POST['plantilla_id'])) {
    $plantilla_id = $_POST['plantilla_id'];
    $queryList = mysqli_query($conn3, "SELECT * FROM  {$NombreTabla} where id=$plantilla_id");
    //$nrowl = mysqli_num_rows($queryList);
    if ($queryList) {
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $idPlantilla = $rowMotorizado['id'];
            $TituloActual = $rowMotorizado['Titulo'];
            $Plantilla = $rowMotorizado['Plantilla'];
        }
    }

}

if (isset($_POST['Guardar_Plantilla'])) {
    date_default_timezone_set('America/Bogota');

    $plantilla_id = $_POST['plantilla_id_final'];
    $plantilla_titulo = $_POST['plantilla_titulo'];
    $Plantilla = $_POST['plantilla'];

    $cliente_id = $_POST['cliente_id'];
    $usuario_id = $_POST['usuario_id'];

    $NombreTablaInformacion = funcionMaster($Plantilla_General_id, 'id', 'Nombre_Tabla_Informacion', 'PP_Plantillas_Principales');

    $sucursal = $_POST['sucursal'];
    if ($sucursal == "") {
        $sucursal = "0";
    }
    ////////////////////////////// CREACION DE TABLAS ///////////////////////////////////////////////////
    $Campo1 = mysqli_query($conn3, "show COLUMNS from {$NombreTablaInformacion} WHERE Field = 'sucursal';");
    if ($Campo1) {
        $nrowCampo1 = mysqli_num_rows($Campo1);
        if ($nrowCampo1 == "0") {
            mysqli_query($conn3, "ALTER TABLE `{$NombreTablaInformacion}` ADD `sucursal` TEXT NULL DEFAULT '0' ");
        }
    }

    mysqli_query($conn3, "INSERT INTO {$NombreTablaInformacion} (cliente_id, usuario_id, Titulo, Plantilla, Plantilla_id,sucursal) VALUES ('$cliente_id', '$usuario_id', '$plantilla_titulo', '$Plantilla', '$plantilla_id','$sucursal');");

    $historia_id = mysqli_insert_id($conn3);

    $Plantilla_General_id = encrypt($Plantilla_General_id);
    $cliente_id = encrypt($cliente_id);
    echo "<script language='Javascript'> window.location='documentoVerPaciente?pGi={$Plantilla_General_id}&cI={$cliente_id}';</script>";
}

$tabla2 = 'P_Consentimientos_Informado_Odontologia';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="#">Plantilla / Documento</a></li>

      </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
        <div>
            <div class="col-xs-12">
                <h4 class="Titulo_Pagina"> Plantilla / Documento [<?php echo $NombreVisualTablaInformacion ?>]</h4>

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php echo datosPacientes($clienteId); ?>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form
                            action="documentosFormulario?cI=<?= encrypt($clienteId); ?>&pGi=<?= encrypt($Plantilla_General_id); ?>"
                            method="POST">
                            <label> Seleccione una plantilla de <?php echo $NombreVisualTablaInformacion; ?> </label>
                            <select id="plantilla_id" name="plantilla_id" class="form-control select2" required
                                style="width: 100%;" onchange="this.form.submit()">
                                <option>Seleccione </option>
                                <?php
                              


                                $queryListhc = mysqli_query($conn3, "SELECT * from $NombreTabla Where Activo = 1 AND usuario_id='{$usuario_id}'");
                                // $nrowl = mysqli_num_rows($queryListhc);
                                if ($queryListhc) {
                                    while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                        $id = $rowhc['id'];
                                        $Titulo = $rowhc['Titulo'];
                                        echo "<option value='$id'>$Titulo </option> ";
                                    }
                                }

                                ?>
                            </select>
                            <?php if ($_POST['plantilla_id'] <> ""): ?>
                                <hr>
                                <h2 align="center">Plantilla <?php echo $TituloActual; ?></h2>
                                <hr>
                                <textarea class="editorJR" name="plantilla">
                                    <?php echo cambiarVariables($Plantilla, $clienteId, $usuario_id); ?>
                                </textarea>

                                <input type="hidden" name="cliente_id" value="<?php echo $clienteId ?>">
                                <input type="hidden" name="usuario_id" value="<?php echo $usuario_id ?>">
                                <input type="hidden" name="plantilla_titulo" value="<?php echo $TituloActual ?>">
                                <input type="hidden" name="plantilla_id_final" value="<?php echo $idPlantilla ?>">
                                <!-- <input type="hidden" id="sucursal" value="<?php echo $_SESSION["sucursal"] ?>"> -->
                                <hr>
                                <center><button type="submit"
                                        class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                        name="Guardar_Plantilla">
                                        <h2> <strong> G e n e r a r </strong> </h2>
                                    </button></center>

                            <?php endif; ?>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include ("footer.php") ?>