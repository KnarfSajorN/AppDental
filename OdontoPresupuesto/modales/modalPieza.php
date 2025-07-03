<div class="modal fade" id="modalPieza" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <p class="statusMsg"></p>
                <h5 class="modal-title" id="exampleModalLabel">Estado de la pieza</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="#" method="POST" name="formularioEnvioExamen"
                    onsubmit="event.preventDefault();GuardarPiezaInicial();">
                    <div class="row" >
                        <div class="col-md-6" style="height:80px;">
                            <label id="Tipo_Diente_Cara"
                                style="top: 36%;left: 33%;position: relative;"><!-- se llena en la funcion --> </label>
                        </div>
                        <div class="col-md-6" style="height:80px;" id="Imagen_Diente">

                        </div>
                        <hr>
                        <div class="col-md-12" id="DatosOdontogramaModal">
                            <h3 id="MensajeEdicionModal" style="text-align: center;font-weight: bold;"></h3>
                            <div class="select-icon" style="margin-top: 40px;">
                                <label for="Diente_Procedimiento">Procedimiento / [Servicio/Inventario]</label>
                                <select id="Diente_Procedimiento" class="select2 form-control input-lg icons_select2"
                                    style="width: 100%;" required>
                                    <option value="" selected>Selecione...</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  OD_Procedimiento where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and Activo = 1");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id_procedimiento = $rowMotorizado['id'];
                                        $Icono = $rowMotorizado['Icono'];
                                        $Color = $rowMotorizado['Color'];
                                        $Nombre = $rowMotorizado['Nombre'];

                                        $SVG = funcionMaster($Icono, 'id', 'SVG', 'OD_Iconos_SVG');
                                        $SVG = str_replace('fill="currentColor"', 'fill="' . $Color . '"', $SVG);
                                        $SVG = str_replace('"', "|", $SVG);
                                        $SVG = str_replace("\r\n", "■", $SVG);
                                        $SVG = str_replace("\n", "°", $SVG);


                                        $ArregloSVG["$id_procedimiento"] = $SVG;

                                        //inventario id
                                        $inventario_id = $rowMotorizado['inventario_id'];
                                        $Nombre_Inventario = funcionMaster($inventario_id, 'ID', 'descripcion', 'sinvetrios');
                                        if ($Nombre_Inventario != "") {
                                            $Nombre_Inventario = " / [ " . $Nombre_Inventario . " ]";
                                        }
                                        //inventario id


                                        echo "<option value='{$id_procedimiento}' data-icon='{$id_procedimiento}' > {$Nombre}{$Nombre_Inventario} </option>";

                                        //Esto funcion para el editar procedimientos//
                                        $ArregloSwal = $ArregloSwal . "<option value='{$id_procedimiento}' data-icon='{$id_procedimiento}' > {$Nombre}{$Nombre_Inventario} </option>";
                                    }

                                    $ArregloSVGTXT = json_encode($ArregloSVG);
                                    ?>
                                </select>
                            </div>

                            <div class="row col-md-12" id="check_caras">


                            </div>

                            <label for="inputdetalle">Detalle</label>
                            <input type="text" class="form-control" id="Diente_Detalle" />




                            <!--
                            <div class="" style="margin-top: 40px;">
                                <label>Adjuntar Tratamiento Para Presupuestar?</label>
                                <select id="inventario_id" class="form-control select2" style="width: 100%;">
                                    <option value='0'>Seleccione</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  sinvetrios ");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                        $tipo = $rowMotorizado["tipo"];
                                        $OdontogramaAplica = funcionMaster($tipo, 'id', 'GrupoOdontograma', 'scategoria');

                                        if ($OdontogramaAplica == "1") {
                                            $NombreTipo = funcionMaster($tipo, 'id', 'descripcion', 'scategoria');
                                            echo "<option value='$rowMotorizado[ID]'> [$NombreTipo] - $rowMotorizado[descripcion] </option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                                -->

                            <div class="" style="margin-top: 10px;">
                                <label>CIE11</label>
                                <select id="cie_10" class="form-control select2" style="width: 100%;">
                                    <option value='0'>Sin Codigo</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  OD_Cie10 ");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        echo "<option value='$rowMotorizado[Codigo]'> $rowMotorizado[Codigo] - $rowMotorizado[Nombre] </option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <hr>


                            <input type="hidden" id="cliente_id" value="<?= $_GET['clienteId']; ?>">
                            <input type="hidden" id="usuario_id" value="<?= $_SESSION['ID']; ?>">
                            <input type="hidden" id="diente_id">
                            <!--<input type="hidden" id="Diente_Posicion">
                            <input type="hidden" id="Diente_NombreCara">
                            <input type="hidden" id="Diente_TodaPieza">-->

                            <br>


                            <button type="submit" class="btn btn-primary" style="width:100%;float: right;"
                                id="Boton_Enviar">Guardar</button>
                            <br>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>

                        <h2 style="text-align: center;font-weight: bold;"> Historial </h2>
                        <div class="col-md-12" id="Historial_Diente" style="height:300px;overflow-y: auto;">

                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <button type="button" class="btn btn-default" style="width:100%;"
                            data-dismiss="modal">Cerrar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>