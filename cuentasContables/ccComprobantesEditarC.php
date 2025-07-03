<?php
include '../header.php';
include '../menu.php';

//$ID = $_SESSION['ID'];

$idCComprobanteD = $_GET['comprobante_id'];
$queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiario  where  id = '{$idCComprobanteD}'");
while ($rowMotorizado = mysqli_fetch_assoc($queryList)) {
    $Numero = $rowMotorizado["numero"];
    $fecha = $rowMotorizado["fecha"];
}

if (isset($_POST['BotonActualizar'])) {


    /////////////////////////////////////////////////////////////////// creacion de la tabla para los examemenes //////////////////////////////////////////////////////////////////////////
    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'CCompDiarioMov_ediciones'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {
        $query = "CREATE TABLE `CCompDiarioMov_ediciones` ( 
          `id` INT(11) NOT NULL AUTO_INCREMENT , 
          `Fecha` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ,
          `CCompDiario_id` TEXT NULL DEFAULT '' , 
          `DatosAnteriores` TEXT NULL DEFAULT '' , 
          `DatosNuevos` TEXT NULL DEFAULT '' ,
          `ip` TEXT NULL DEFAULT '',
          `FechaMovimientoAntigua` TEXT NULL DEFAULT '',
          `FechaMovimientoNueva` TEXT NULL DEFAULT '',
          `usuario_id` INT(11) NULL DEFAULT '0', 
          PRIMARY KEY (`id`)) ENGINE = MyISAM;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');
          window.location='CcuentasComprobantesM';</script>";
            exit();
        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $ComprobanteDiario_id = $_POST["ComprobanteDiario_id"];

    $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiario  where  id = '{$ComprobanteDiario_id}'");
    while ($rowMotorizado = mysqli_fetch_assoc($queryList)) {
        $Numero = $rowMotorizado["numero"];
    }

    $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where  idComprobante = '{$ComprobanteDiario_id}'");
    while ($rowMotorizado = mysqli_fetch_assoc($queryList)) {
        foreach ($rowMotorizado as $key => $value) {
            $ArregloComprobante[$rowMotorizado['id']][$key] = $value;
        }
    }
    /*
  echo"<pre>";
  print_r($ArregloComprobante);
  echo"</pre>";
  */
    $DatosAnteriores = json_encode($ArregloComprobante, JSON_UNESCAPED_UNICODE);

    $Arreglo = $_POST["Arreglo"];
    foreach ($Arreglo as $key => $value) {
        $contador++;
        foreach ($value as $key1 => $value1) {
            $ArregloComprobanteActual[$contador][$key1] = $value1;
        }
    }

    $DatosNuevos = json_encode($ArregloComprobanteActual, JSON_UNESCAPED_UNICODE);

    $ip = $_SERVER['REMOTE_ADDR'];
    $usuario_id = $_POST['usuario_id'];

    $FechaMovimientoNueva = $_POST['FechaGeneral'];

    $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiario  where  id = '{$ComprobanteDiario_id}'");
    while ($rowMotorizado = mysqli_fetch_assoc($queryList)) {
        $FechaMovimientoAntigua = $rowMotorizado["fecha"];
        $Descripcion = $rowMotorizado["descripcion"];
        $Cuenta = $rowMotorizado["cuenta"];
        $idComprobante = $rowMotorizado["id"];
    }


    //echo "INSERT INTO CCompDiarioMov_ediciones (usuario_id,ip,DatosAnteriores,DatosNuevos) VALUES ('$usuario_id',$ip,{$DatosAnteriores},'');";
    $queryvalidar = mysqli_query($conn3, "INSERT INTO CCompDiarioMov_ediciones (usuario_id,ip,DatosAnteriores,DatosNuevos,CCompDiario_id,FechaMovimientoAntigua,FechaMovimientoNueva) VALUES ('$usuario_id','$ip','{$DatosAnteriores}','{$DatosNuevos}','{$idComprobante}','$FechaMovimientoAntigua','$FechaMovimientoNueva');") or die(mysqli_error($conn3));
    $id_movimientoedicion = mysqli_insert_id($conn3);

    $contadorErrores = 0;
    $enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $queryauditor = mysqli_real_escape_string($conn3, "INSERT INTO CCompDiarioMov_ediciones (usuario_id,ip,DatosAnteriores,DatosNuevos,CCompDiario_id,FechaMovimientoAntigua,FechaMovimientoNueva) VALUES ('$usuario_id','$ip','{$DatosAnteriores}','{$DatosNuevos}','{$idComprobante}','$FechaMovimientoAntigua','$FechaMovimientoNueva');");
    auditorMaster($usuario_id, '2', $enlace_actual, "$queryauditor");
    if ($queryvalidar != true) {
        $contadorErrores++;
    }

    foreach ($Arreglo as $key => $value) {

        $idComprobanteMov = $value["id"];
        $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where  id = '{$idComprobanteMov}'");
        $nrowl = mysqli_num_rows($queryList);

        $cuenta = $value["cuenta"];
        $descripcionM = mysqli_real_escape_string($conn3, $value["descripcionM"]);
        $referencia = mysqli_real_escape_string($conn3, $value["referencia"]);
        $debe = $value["debe"];
        $haber = $value["haber"];
        //echo $nrowl."<br>";
        if ($nrowl == 1) {

            $arregloproductovalido[] = $value["id"];

            $queryvalidar = mysqli_query($conn3, "UPDATE CCompDiarioMov 
      set fecha='$FechaMovimientoNueva',	cuenta='$cuenta',	descripcion='$descripcionM', monto_debe='$debe',monto_debe='$debe',monto_haber='$haber',referencia='$referencia'  where id='$idComprobanteMov' limit 1");

            $queryauditor = mysqli_real_escape_string($conn3, "UPDATE CCompDiarioMov 
    set fecha='$FechaMovimientoNueva',	cuenta='$cuenta',	descripcion='$descripcionM', monto_debe='$debe',monto_debe='$debe',monto_haber='$haber',referencia='$referencia'  where id='$idComprobanteMov' limit 1");

            auditorMaster($usuario_id, '2', $enlace_actual, "$queryauditor");

            if ($queryvalidar != true) {
                $contadorErrores++;
            }
        } else {



            //echo "entro";
            $queryvalidar = mysqli_query($conn3, "INSERT INTO CCompDiarioMov
    (numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
    values  
    ('$Numero','$FechaMovimientoNueva',0,0,0,'$cuenta',0,'$descripcionM','$debe','$haber','$referencia','$ComprobanteDiario_id')");
            $idMovDiario = mysqli_insert_id($conn3);

            $arregloproductovalido[] = $idMovDiario;

            $queryauditor = mysqli_real_escape_string($conn3, "INSERT INTO CCompDiarioMov
    (numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
    values  
    ('$Numero','$FechaMovimientoNueva',0,0,0,'$cuenta',0,'$descripcionM','$debe','$haber','$referencia','$ComprobanteDiario_id')");

            auditorMaster($usuario_id, '2', $enlace_actual, "$queryauditor");

            if ($queryvalidar != true) {
                $contadorErrores++;
            }
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    }

    $queryList = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where  idComprobante = '{$ComprobanteDiario_id}'");
    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
        $contador = 0;
        $id = $row_recordset32["id"];
        //echo $id."<br>";
        foreach ($arregloproductovalido as $key => $value) {
            if ($id == $value) {
                $contador++;
            }
        }

        if ($contador == 0) {
            mysqli_query($conn3, "DELETE FROM CCompDiarioMov WHERE id = '{$id}';");
        }
    }





    $queryList = mysqli_query($conn3, "SELECT count(id) as cuantos, sum(monto_debe) as sum_debe,sum(monto_haber) as sum_haber FROM CCompDiarioMov where idComprobante = '{$ComprobanteDiario_id}';");
    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
        $cuantos = 0 + $row_recordset32['cuantos'];
        $sum_debe = 0 + $row_recordset32['sum_debe'];
        $sum_haber = 0 + $row_recordset32['sum_haber'];
    }

    $queryvalidar = mysqli_query($conn3, "UPDATE CCompDiario set monto_debe='$sum_debe',	monto_haber='$sum_haber',	cant_movimientos='$cuantos', fecha='$FechaMovimientoNueva' where id='$ComprobanteDiario_id' limit 1");
    //echo "UPDATE CCompDiario set monto_debe='$sum_debe',	monto_haber='$sum_haber',	cant_movimientos='$cuantos' where numero='$Numero'";

    $queryauditor = mysqli_real_escape_string($conn3, "UPDATE CCompDiario set monto_debe='$sum_debe',	monto_haber='$sum_haber',	cant_movimientos='$cuantos', fecha='$FechaMovimientoNueva' where id='$ComprobanteDiario_id' limit 1");
    auditorMaster($usuario_id, '2', $enlace_actual, "$queryauditor");

    if ($queryvalidar != true) {
        $contadorErrores++;
    }



    if ($contadorErrores > 0) {
        echo '<script>window.location="./ccComprobantesM?error=hubo un inconveniente en la edición, Por favor volver a generarla";</script>';
    } else {
        echo '<script>window.location="./ccComprobantesM";</script>';
    }

    //echo '<script>window.location="CcuentasComprobantesM";</script>';

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
                                    <h4>Editar Comprobante <?= $Numero; ?> </h4>
                                </div>
                            </div>
                            <div class="card-body">

                                <form action="./ccComprobantesEditarC" method="POST">

                                    <div class="col-md-12">
                                        <label>Fecha<strong class="text-danger"></strong></label><br>
                                        <input type="date" name="FechaGeneral" class="form-control input-lg" value="<?= $fecha; ?>" required>
                                    </div>

                                    <br>
                                    <hr>
                                    <br>
                                    <table class="table table-bordered table-striped" id="exaple1" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Cuenta</th>
                                                <th>Descripción Movimiento</th>
                                                <th>Referencia</th>
                                                <th>Debe</th>
                                                <th>Haber</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="TablaDocumentos">


                                            <?php

                                            $queryList = mysqli_query($conn3, "SELECT * FROM CCuentas  order by id ASC");
                                            $nrowl = mysqli_num_rows($queryList);
                                            while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                                $idC = $row_recordset32['id'];
                                                $descripcionC = $row_recordset32['descripcion'];
                                                $detalleC = $row_recordset32['detalle'];
                                                $OptionsSelect .= "<option value='$idC'>$idC | $descripcionC  </option>";
                                            }

                                            //echo "SELECT * FROM  CCompDiarioMov  where  numero = '{$Numero}'";
                                            $queryList1 = mysqli_query($conn3, "SELECT * FROM  CCompDiarioMov  where  idComprobante = '{$idCComprobanteD}' order by id");
                                            while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                                $contador++;
                                                $id = $rowMotorizado1["id"];
                                                $cuenta = $rowMotorizado1["cuenta"];
                                                $monto_haber = $rowMotorizado1["monto_haber"];
                                                $monto_debe = $rowMotorizado1["monto_debe"];
                                                $referencia = $rowMotorizado1["referencia"];
                                                $descripcion = $rowMotorizado1["descripcion"];
                                                $referencia = $rowMotorizado1["referencia"];


                                                echo "<tr id='tr_$contador'>
                                    <td>
                                        <input type='hidden' name='Arreglo[$contador][id]' value='$id'>
                                        <select class='input-lg form-control' name='Arreglo[$contador][cuenta]' style='width:100%'>
                                          <option value='{$cuenta}' selected>$cuenta | " . funcionMaster($cuenta, 'id', 'descripcion', 'CCuentas') . "</option>
                                          {$OptionsSelect}                                  
                                        </select>
                                      </td>
                                      <td><input type='text' class='input-lg form-control' name='Arreglo[$contador][descripcionM]' value='{$descripcion}' oninput='VerificarCaracteres(this)' required></td>
                                      <td><input type='text' class='input-lg form-control' name='Arreglo[$contador][referencia]' value='{$referencia}' oninput='VerificarCaracteres(this)' required></td>
                                      <td><input type='text' class='input-lg form-control debe' name='Arreglo[$contador][debe]' oninput='CalcularValorCorrecto()' value='{$monto_debe}' pattern='^[0-9.]+' required></td>
                                      <td><input type='text' class='input-lg form-control haber' name='Arreglo[$contador][haber]' oninput='CalcularValorCorrecto()' value='{$monto_haber}' pattern='^[0-9.]+' required></td>
                                      <td style='text-align: center;vertical-align: middle; width: calc(100%/14);'> ";

                                                if ($contador > 1) {
                                                    echo "<a href='#'  style='font-size: 20px;' class='removeButton' ><i class='fas fa-trash-alt'></i></a>";
                                                }

                                                echo "</td>
                                    </tr>";

                                                $existe = 1;
                                            }

                                            ?>

                                        </tbody>
                                    </table>

                                    <div class="col-xs-12">
                                        <button type="button" class="btn btn-outline-info btn-block rounded-pill" onclick="AgregarFila()">
                                            <i class="fas fa-plus"></i>
                                            Agregar Fila
                                        </button>
                                    </div>
                                    <?php if ($existe == 1) : ?>
                                        <div class="col-xs-12">
                                            <hr>
                                            <input type="hidden" name="ComprobanteDiario_id" value="<?php echo $idCComprobanteD; ?>">
                                            <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID']; ?>">
                                            <button type="submit" class="btn btn-outline-primary rounded-pill" name="BotonActualizar" id="BotonActualizar" readonly>
                                                <i class="fas fa-save"></i>
                                                Actualizar
                                            </button>
                                            <br>
                                        </div>
                                    <?php endif; ?>
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
    function AgregarFila() {

        var tbody = document.getElementById('TablaDocumentos');
        console.log(tbody);
        if (tbody.lastElementChild == null) {
            var id_inpuro = "tr_1";
        } else {
            var id_inpuro = tbody.lastElementChild.id;
        }

        console.log(id_inpuro);
        var idFila = id_inpuro.split("_");
        var idFila = idFila[1];
        var idOpciones = parseInt(idFila) + parseInt(1);
        var tr = document.createElement('tr');
        tr.id = "tr_" + idOpciones;
        tbody.appendChild(tr);
        var Dato = {};

        Dato[0] = "<select class='input-lg form-control select2' name='Arreglo[" + idOpciones + "][cuenta]' style='width:100%' required ><option value='' selected> Seleccione </option><?= $OptionsSelect; ?></select>";

        Dato[1] = "<input type='text' class='input-lg form-control' name='Arreglo[" + idOpciones + "][descripcionM]' value='' oninput='VerificarCaracteres(this)' required>";
        Dato[2] = "<input type='text' class='input-lg form-control' name='Arreglo[" + idOpciones + "][referencia]' value='' oninput='VerificarCaracteres(this)' required>";
        Dato[3] = "<input type='text' class='input-lg form-control debe' name='Arreglo[" + idOpciones + "][debe]' oninput='CalcularValorCorrecto()' value='0' pattern='^[0-9.]+' required>";
        Dato[4] = "<input type='text' class='input-lg form-control haber' name='Arreglo[" + idOpciones + "][haber]' oninput='CalcularValorCorrecto()' value='0' pattern='^[0-9.]+' required>";
        Dato[5] = '<a href="#"  style="font-size: 20px;" class="removeButton" ><i class="fas fa-trash-alt"></i></a>';

        for (var j = 0; j < 6; j++) {
            var td = document.createElement('td');
            td.setAttribute("style", "text-align: center;vertical-align: middle; width: calc(100%/14)");
            td.innerHTML = (Dato[j]);
            tr.appendChild(td);
        }

    }

    function CalcularValorCorrecto() {
        var classes = document.querySelectorAll(".debe");
        var totaldebe = 0;
        //console.log(classes.length);
        for (var i = 0; i < classes.length; i++) {
            if (isNaN(parseFloat(classes[i].value))) {
                totaldebe += 0;
            } else {
                totaldebe += parseFloat(classes[i].value);
            }

        }

        console.log(totaldebe);

        var classes = document.querySelectorAll(".haber");
        var totalhaber = 0;

        for (var i = 0; i < classes.length; i++) {

            if (isNaN(parseFloat(classes[i].value))) {
                totalhaber += 0;
            } else {
                totalhaber += parseFloat(classes[i].value);
            }
        }

        //console.log(totalhaber);
        if (totaldebe == totalhaber && classes.length > 0) {
            document.getElementById("BotonActualizar").disabled = false;
        } else {
            document.getElementById("BotonActualizar").disabled = true;
        }
    }

    function VerificarCaracteres(input) {

        input.value = input.value.replace(/'/g, "");
        input.value = input.value.replace(/"/g, "");

    }
    $(document).on('click', '.removeButton', function() {
        $(this).parent().parent().remove();
        CalcularValorCorrecto();
    });

    $(document).ready(function() {
        CalcularValorCorrecto();
    });
</script>