
<div class="modal fade bd-example-modal-lg" id="ModalSeleccionAll" role="dialog" aria-labelledby="ModalSeleccionAll"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="statusMsg"></p>
                <h5 class="modal-title" id="exampleModalLabel">Seleccion Multiple de Piezas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="">
                        <form action="#" method="POST" name="formularioEnvioExamen"
                            onsubmit="event.preventDefault();GuardarPiezaMultiple();">
                            <div class="col-md-12" align="center">
                                <label style="font-size:20px;color:#3c8dbc;">Seleccion Multiple de Piezas</label>
                            </div>

                            <div class="select-icon" style="margin-top: 40px;">
                                <label for="Diente_Procedimiento">Procedimiento / [Servicio/Inventario]</label>
                                <select id="Diente_Procedimiento_Multiple"
                                    class="select2 form-control input-lg icons_select2" style="width: 100%;" required>
                                    <option value="" selected>Selecione...</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  OD_Procedimiento where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and Activo = 1");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id_procedimiento = $rowMotorizado['id'];
                                        $Icono = $rowMotorizado['Icono'];
                                        $Color = $rowMotorizado['Color'];
                                        $Nombre = $rowMotorizado['Nombre'];

                                        //inventario id
                                        $inventario_id = $rowMotorizado['inventario_id'];
                                        $Nombre_Inventario = funcionMaster($inventario_id, 'ID', 'descripcion', 'sinvetrios');
                                        if ($Nombre_Inventario != "") {
                                            $Nombre_Inventario = " / [ " . $Nombre_Inventario . " ]";
                                        }
                                        //inventario id

                                        echo "<option value='{$id_procedimiento}' data-icon='{$id_procedimiento}' > {$Nombre}{$Nombre_Inventario} </option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <label for="inputdetalle">Detalle</label>
                            <input type="text" class="form-control" id="Diente_Detalle_Multiple" />
                            <br>


                            <div class="" style="margin-top: 10px;">
                                <label>CIE10</label>
                                <select id="cie_10_Multiple" class="form-control select2" style="width: 100%;">
                                    <option value='0'>Sin Codigo</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  OD_Cie10 ");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        echo "<option value='$rowMotorizado[Codigo]'> $rowMotorizado[Codigo] - $rowMotorizado[Nombre] </option>";

                                        $ArregloSwalCIE10 = $ArregloSwalCIE10 . "<option value='$rowMotorizado[Codigo]'> $rowMotorizado[Codigo] - $rowMotorizado[Nombre] </option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <hr>
                            <input type="hidden" id="diente_multiple">
                            <input type="hidden" id="cliente_id_multiple" value="<?= $_GET['clienteId']; ?>">
                            <input type="hidden" id="usuario_id_multiple" value="<?= $_SESSION['ID']; ?>">

                            <button type="button" class="btn btn-default" style="width:50%;"
                                data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" style="width:50%;float: right;"
                                id="Boton_Enviar">Guardar</button>

                        </form>

                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>