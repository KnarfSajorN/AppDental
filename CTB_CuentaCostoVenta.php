
<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);

///////////////////////////////////////////////////////////////////////////

if (isset($_POST['Actualizar_Informacion_Pagina'])) {
    
    $idCuentaContable=$_POST['idCuentaContableCosto'];
    mysqli_query($conn3,"UPDATE CuentaPredeterminadaCosto SET  idCuentaContable= '$idCuentaContable' where id=1");
    
    $idCuentaContableVenta=$_POST['idCuentaContableVenta'];
    mysqli_query($conn3,"UPDATE CuentaPredeterminadaVenta SET  idCuentaContable= '$idCuentaContableVenta' where id=1");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Actualizar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Actualizo La Entidad Correctamente'</script>";
    }
}

#Cierre
if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
?>

<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Actualiza Cuenta Costo y Venta </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Actualiza Cuenta Costo y Venta </h4>
                <div class="box">
                    <div class="box-body">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="col-md-6 card " style="float: left;">
                                      <label>Cuenta Contable de Costo Predeterminada</label><br>
                                      <select class="form-control input-lg select2" name="idCuentaContableCosto" required>
                                        <?php

                                        $queryListCuenta = mysqli_query($conn3, "SELECT * from CuentaPredeterminadaCosto where id = 1");
                                        $nrowl = mysqli_num_rows($queryListCuenta);
                                        while ($rowCuenta = mysqli_fetch_array($queryListCuenta)) {
                                          $id_Costo = $rowCuenta['id'];
                                          $idCuentaContable_Costo = $rowCuenta['idCuentaContable'];
                                        }

                                        if($idCuentaContable_Costo!=""){
                                          echo "<option value='{$idCuentaContable_Costo}'> {$idCuentaContable_Costo} - ".funcionMaster($idCuentaContable_Costo,'id','descripcion','CCuentas')."</option>";
                                        }
                                        else{
                                          echo "<option value=''> Seleccione </option>";
                                        }
                                        

                                        $queryListCuenta = mysqli_query($conn3, "SELECT * from CCuentas WHERE activo = 1");
                                        $nrowl = mysqli_num_rows($queryListCuenta);
                                        while ($rowCuenta = mysqli_fetch_array($queryListCuenta)) {
                                          $idCuenta = $rowCuenta['id'];
                                          $descripcionCuenta = $rowCuenta['descripcion'];
                                          $detalleCuenta = $rowCuenta['detalle'];
                                          $activoCuenta = $rowCuenta['activo'];

                                          echo '<option value="' . $idCuenta . '">' . $idCuenta . '-' . $descripcionCuenta . '</option>';
                                        }
                                        ?>
                                      </select>
                                    </div>

                                    <div class="col-md-6 card ">
                                      <label>Cuenta Contable de Venta Predeterminada</label><br>
                                      <select class="form-control input-lg select2" name="idCuentaContableVenta" required>
                                        <?php

                                        $queryListCuenta = mysqli_query($conn3, "SELECT * from CuentaPredeterminadaVenta where id = 1");
                                        $nrowl = mysqli_num_rows($queryListCuenta);
                                        while ($rowCuenta = mysqli_fetch_array($queryListCuenta)) {
                                          $id_Venta = $rowCuenta['id'];
                                          $idCuentaContable_Venta = $rowCuenta['idCuentaContable'];

                                          
                                        }

                                        if($idCuentaContable_Venta!=""){
                                          echo "<option value='{$idCuentaContable_Venta}'> {$idCuentaContable_Venta} - ".funcionMaster($idCuentaContable_Venta,'id','descripcion','CCuentas')."</option>";
                                        }
                                        else{
                                          echo "<option value=''> Seleccione </option>";
                                        }
                                        

                                        $queryListCuenta = mysqli_query($conn3, "SELECT * from CCuentas");
                                        $nrowl = mysqli_num_rows($queryListCuenta);
                                        while ($rowCuenta = mysqli_fetch_array($queryListCuenta)) {
                                          $idCuenta = $rowCuenta['id'];
                                          $descripcionCuenta = $rowCuenta['descripcion'];
                                          $detalleCuenta = $rowCuenta['detalle'];
                                          $activoCuenta = $rowCuenta['activo'];

                                          echo '<option value="' . $idCuenta . '">' . $idCuenta . '-' . $descripcionCuenta . '</option>';
                                        }
                                        ?>
                                      </select>
                                    </div>


                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

                            
                                <div class="col-sm-12">
                                    <input type="hidden" name="arreglo_id" value="<?php echo $_GET['Editar'] ?>">
                                    <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow" name="Actualizar_Informacion_Pagina">
                                            <h2> <strong> A c t u a l i z a r </strong> </h2>
                                        </button></center>
                                </div>
                            

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>