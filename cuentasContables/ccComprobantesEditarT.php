<?php
include '../header.php';
include '../menu.php';

$idCComprobanteD = $_GET['comprobante_id'];
$conn3_utf = $conn3;
mysqli_set_charset($conn3_utf, "utf8");
$queryList = mysqli_query($conn3_utf, "SELECT * FROM  CCompDiario  where  id = '{$idCComprobanteD}'");
while ($rowMotorizado = mysqli_fetch_assoc($queryList)) {
    $Numero = $rowMotorizado["numero"];
    $fecha = $rowMotorizado["fecha"];
    $descripcion = $rowMotorizado["descripcion"];
    $tipo_tercero = $rowMotorizado["tipo_tercero"];
    $tercero_id = $rowMotorizado["tercero_id"];
}

if (isset($_POST['BotonActualizar'])) {

    $ComprobanteDiario_id = $_POST['ComprobanteDiario_id'];
    /////////////////////////////////////////////////////////////////// creacion de la tabla para los examemenes //////////////////////////////////////////////////////////////////////////

    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'CCompDiario_ediciones'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {
        $query = "CREATE TABLE `CCompDiario_ediciones` ( 
          `id` INT(11) NOT NULL AUTO_INCREMENT , 
          `Fecha` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ,
          `CCompDiario_id` TEXT NULL DEFAULT '' , 
          `DatosAnteriores` TEXT NULL DEFAULT '' , 
          `DatosNuevos` TEXT NULL DEFAULT '' ,
          `ip` TEXT NULL DEFAULT '',
          `usuario_id` INT(11) NULL DEFAULT '0', 
          PRIMARY KEY (`id`)) ENGINE = MyISAM;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');
          window.location='CcuentasComprobantesM';</script>";
            exit();
        }
    }

    $order   = array("'", '"');
    $replace = array("&apos;", '&quot;');


    $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiario  where  id = '{$ComprobanteDiario_id}'");
    while ($rowMotorizado = mysqli_fetch_assoc($queryList)) {
        foreach ($rowMotorizado as $key => $value) {
            $ArregloComprobante[$rowMotorizado['id']][$key] = str_replace($order, $replace, $value);
        }
    }
    /*
  echo"<pre>";
  print_r($ArregloComprobante);
  echo"</pre>";
  */
    $DatosAnteriores = json_encode($ArregloComprobante, JSON_UNESCAPED_UNICODE);

    $DescripcionPrincipal = str_replace($order, $replace, $_POST["DescripcionPrincipal"]);
    $TipoTercero = $_POST["TipoTercero"];
    $Tercero = $_POST["Tercero"];

    $ArregloComprobanteActual["descripcion"] = $DescripcionPrincipal;
    $ArregloComprobanteActual["tipo_tercero"] = $TipoTercero;
    $ArregloComprobanteActual["tercero_id"] = $Tercero;

    $DatosNuevos = json_encode($ArregloComprobanteActual, JSON_UNESCAPED_UNICODE);

    $ip = $_SERVER['REMOTE_ADDR'];
    $usuario_id = $_POST['usuario_id'];

    //echo "INSERT INTO CCompDiarioMov_ediciones (usuario_id,ip,DatosAnteriores,DatosNuevos) VALUES ('$usuario_id',$ip,{$DatosAnteriores},'');";
    $queryvalidar = mysqli_query($conn3, "INSERT INTO CCompDiario_ediciones (usuario_id,ip,DatosAnteriores,DatosNuevos,CCompDiario_id) VALUES ('$usuario_id','$ip','{$DatosAnteriores}','{$DatosNuevos}','{$ComprobanteDiario_id}');") or die(mysqli_error($conn3));

    $queryvalidar = mysqli_query($conn3, "UPDATE CCompDiario 
    SET	descripcion='$DescripcionPrincipal', tipo_tercero='$TipoTercero',tercero_id='$Tercero' where id='$ComprobanteDiario_id' limit 1");

    $queryauditor = mysqli_real_escape_string($conn3, "UPDATE CCompDiario 
    SET	descripcion='$DescripcionPrincipal', tipo_tercero='$TipoTercero',tercero_id='$Tercero' where id='$ComprobanteDiario_id' limit 1");

    auditorMaster($usuario_id, '2', $enlace_actual, "$queryauditor");

    if ($queryvalidar != true) {
        $contadorErrores++;
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    if ($contadorErrores > 0) {
        echo '<script>window.location="ccComprobantesM?error=hubo un inconveniente en la edicion, Por favor volver a generarla";</script>';
    } else {
        echo '<script>window.location="ccComprobantesM";</script>';
    }
}

if ($tipo_tercero == 1) {
    include '../funciones/conn3.php';
    $tipotercerotexto = "Clientes";
    $queryList = mysqli_query($conn3, "SELECT * FROM cliente where cliente_id = '$tercero_id'");
    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
        $nombretercero = $row_recordset32['nombre_cliente'];
    }
} elseif ($tipo_tercero == 2) {
    $tipotercerotexto = "Proveedores";
    $queryList = mysqli_query($conn3, "SELECT * FROM sproveedores where id = '$tercero_id' ");
    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
        $nombretercero = $row_recordset32['nombre'];
    }
}
?>

<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="copyPaste"></div>
        <div class="">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4>Editar Comprobante <?= $Numero ?></h4>
                                </div>
                            </div>
                            <div class="card-body">

                                <form action="ccComprobantesEditarT" method="POST">

                                    <div class="col-md-12">
                                        <label>Descripcion Principal <strong class="text-danger"></strong></label><br>
                                        <input type="text" name="DescripcionPrincipal" class="form-control input-lg" value="<?= $descripcion; ?>" oninput='VerificarCaracteres(this)' required>
                                    </div>

                                    <div class="col-md-12 row">
                                        <div class="col-md-6">
                                            <hr>
                                            <label>Actual : <?= $tipotercerotexto; ?></label><br>
                                            <label>Tipo Tercero <strong class="text-danger">*</strong></label><br>
                                            <select id="TipoTercero" name="TipoTercero" class="form-control" style="width: 100%;" onChange="TipoTerceroBusqueda()" required>
                                                <option value="" selected>Seleccione</option>
                                                <option value="1">Clientes</option>
                                                <option value="2">Proveedores</option>
                                            </select>

                                        </div>
                                        <div class="col-md-6">
                                            <hr>
                                            <label>Actual : <?= $nombretercero; ?></label><br>
                                            <label>Tercero <strong class="text-danger">*</strong></label><br>
                                            <select name="Tercero" id="Tercero" class="form-control" style="width: 100%;" required>
                                                <!-- se llena por ajax -->
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="ComprobanteDiario_id" value="<?php echo $idCComprobanteD; ?>">
                                    <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID']; ?>">
                                    <hr>
                                    <button type="submit" class="btn btn-outline-info rounded-pill" name="BotonActualizar" id="BotonActualizar">
                                        <i class="fa fa-save"></i>
                                        Actualizar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include '../footer.php';
?>

<script>
    function TipoTerceroBusqueda(tercero) {
        var valor = $("#TipoTercero").val();
        $.ajax({
            type: "POST",
            url: "./cuentasContables/RP_Ajax.php",
            data: {
                Valor: valor,
                TipoEspecial: "Búsqueda Tipo Tercero"
            },
            success: function(response) {
                $('#Tercero').html(response);

                if (tercero != "") {
                    $("#Tercero").val('<?= $tercero_id; ?>');
                }
                $('#Tercero').select2();
            }
        });
    }

    function VerificarCaracteres(input) {

        input.value = input.value.replace(/'/g, "");
        input.value = input.value.replace(/"/g, "");

    }

    $(function() {
        $("#TipoTercero").val('<?= $tipo_tercero; ?>');
        TipoTerceroBusqueda('<?= $tercero_id; ?>');
    });
</script>