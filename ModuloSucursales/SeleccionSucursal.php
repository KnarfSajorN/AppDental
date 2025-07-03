<?php

if (isset($_POST['Seleccionar_Sucursal'])) {
    include "funciones/conn3.php";
    $Sucursales_Sistema = $_POST["Sucursales_Sistema"];
    session_start();
    $_SESSION["sucursal"] = $Sucursales_Sistema;
    $usuario_id = $_SESSION["ID"];

    $queryList = mysqli_query($conn3, "UPDATE usuarios SET sucursal='{$Sucursales_Sistema}' WHERE ID = '{$usuario_id}' limit 1;") or die(mysqli_error($conn3));
    //echo "<style>.modal{display:none;}</style>";
    //echo "<script>history.back();</script>";
    echo "<script language='Javascript'> window.location='portada';</script>";
    exit();
}
?>


<!-- Modal -->
<div class="modal fade" id="ModalSucursales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sucursal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">Sucursal Activa:<label id="sucursal_label"><?php if ($_SESSION["sucursal"] == "0" or $_SESSION["sucursal"] == "") {
                                                                                            echo "Ninguna";
                                                                                        } else {
                                                                                            echo funcionMaster($_SESSION["sucursal"], "id", "descripcion", "sucursales");
                                                                                        } ?></label></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="SeleccionSucursal.php" method="POST">
                    <div class="col-md-12">
                        <label>Sucursales</label>
                        <select id="Sucursales_Sistema" name="Sucursales_Sistema" class="form-control select2" style="width: 100%;" data-placeholder="Seleccione Sucursal" required>
                            <option value="<?php echo $_SESSION["sucursal"] ?>"><?php echo funcionMaster($_SESSION["sucursal"], "id", "descripcion", "sucursales"); ?></option>
                            <?php
                            $usuario_id = $_SESSION["ID"];

                            $queryList = mysqli_query($conn3, "SELECT * FROM sucursales WHERE idUsuario = $usuario_id");
                            while ($RowSucursales = mysqli_fetch_array($queryList)) {
                                $id = $RowSucursales['id'];
                                $descripcion = $RowSucursales['descripcion'];

                                echo "<option value='$id'> $descripcion </option>";
                            }

                            ?>
                            <option value="0">Ninguna</option>
                        </select>
                    </div>

                    <div class="modal-footer" style="display:flex">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="Seleccionar_Sucursal">Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>