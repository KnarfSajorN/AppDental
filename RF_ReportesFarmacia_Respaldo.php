<?php
include 'header.php';
include 'menu.php';

//fecha de hoy yyyy-mm-dd
$fecha_actual = date("Y-m-d");
//aumentar dia a la fecha de hoy
$fecha_actual_mas_dias = date("Y-m-d", strtotime("+1 day", strtotime($fecha_actual)));
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
            <li><a href="#"> Reportes Farmacia </a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <h4 class="Titulo_Pagina"> Reportes Farmacia </h4>


                <div class="box">
                    <div class="box-header">
                        <center> <h4> <strong> <i class="fas fa-id-card-alt"></i> Reportes </strong></h4> </center>
                        <hr>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="col-md-12">
                            <hr>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-12" style="text-align:center"><i class="fas fa-id-card-alt"></i> Productos por Vencer </div>
                            <form action="RF_ReporteMedicamentosVencer.php" method="POST" enctype="multipart/form-data">

                            
                            <div class="col-md-12 row" style="text-align:center">

                                <div class="col-md-6">
                                    <label style='padding-top: 15px;'> Fecha Vencimiento Desde</label>
                                    <input type="date" class="form-control input-lg" name="desde" value="<?= $fecha_actual; ?>" >
                                    <input type="hidden" class="form-control input-lg" name="usuario_id" value="<?php echo $_SESSION["ID"] ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label style='padding-top: 15px;'> Fecha Vencimiento Hasta</label>
                                    <input type="date" class="form-control input-lg" name="hasta" value="<?= $fecha_actual_mas_dias; ?>" >
                                </div>
                                
                                <div class="col-md-12">
                                    <label style="red">la fecha que se ingresa es el rango donde el producto tiene la fecha de vencimiento</label>
                                </div>

                                

                                <div class="col-md-4">
                                    <label style='padding-top: 15px;'> Producto</label>
                                    <select name="Producto"  class="form-control select2 select input-lg"  style="width: 100%;" required>
                                        <option value="Todos" selected="selected">Todos</option>
                                            <?php
                                            $queryList=mysqli_query($conn3,"SELECT * FROM sinvetrios  WHERE estado = 1 ");
                                            while($rowInventario=mysqli_fetch_array($queryList))
                                            {
                                                $ID = $rowInventario['ID'];
                                                $descripcion = $rowInventario['descripcion'];

                                                $TipoProducto = funcionMaster($ID,'ID','tipo','sinvetrios');
                                                $ClasificacionProducto = funcionMaster($TipoProducto,'id','tipo','scategoria');

                                                if($ClasificacionProducto=="5"){
                                                    echo "<option value='$ID'> $descripcion </option>";
                                                }
                                                
                                            }
                                            ?>
                                        </select> 
                                </div>

                                <div class="col-md-4">
                                    <label style='padding-top: 15px;'> Depósitos</label>
                                    <select name="Deposito"  class="form-control select2 select input-lg"  style="width: 100%;" required>
                                            <option value="Todos" selected="selected">Todos</option>
                                            <?php
                                            $queryList=mysqli_query($conn3,"SELECT * FROM dep WHERE activo = 1 ");
                                            while($RowDepositos=mysqli_fetch_array($queryList))
                                            {
                                            $id = $RowDepositos['id'];
                                            $descripcion = $RowDepositos['descripcion'];

                                            echo "<option value='$id'> $descripcion </option>";
                                            }
                                            ?>
                                        </select> 
                                </div>



                                <div class="col-md-4">
                                    <center style='padding-top: 35px;'><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                            <h4> <strong> Generar </strong> </h4>
                                        </button></center>
                                </div>
                            </div>
                            </form>
                        </div>











                        <div class="col-md-12">
                            <hr>
                        </div>
                        




                        <div class="col-md-12">
                            <div class="col-md-12" style="text-align:center"><i class="fas fa-id-card-alt"></i> Existencias Actuales </div>
                            <form action="RF_ReporteExistencias.php" method="POST" enctype="multipart/form-data">

                            <div class="col-md-12 row" style="text-align:center">

                                <div class="col-md-3">
                                    <label style='padding-top: 15px;'> Producto</label>
                                    <select name="Producto"  class="form-control select2 select input-lg"  style="width: 100%;" required>
                                        <option value="Todos" selected="selected">Todos</option>
                                            <?php
                                            $queryList=mysqli_query($conn3,"SELECT * FROM sinvetrios  WHERE estado = 1 ");
                                            while($rowInventario=mysqli_fetch_array($queryList))
                                            {
                                                $ID = $rowInventario['ID'];
                                                $descripcion = $rowInventario['descripcion'];

                                                $TipoProducto = funcionMaster($ID,'ID','tipo','sinvetrios');
                                                $ClasificacionProducto = funcionMaster($TipoProducto,'id','tipo','scategoria');

                                                //Producto Lote -> 5
                                                //Producto Simple -> 1
                                                if($ClasificacionProducto=="5" || $ClasificacionProducto=="1"){
                                                    echo "<option value='$ID'> $descripcion </option>";
                                                }
                                                
                                            }
                                            ?>
                                        </select> 
                                </div>

                                <div class="col-md-3">
                                    <label style='padding-top: 15px;'> Depósitos</label>
                                    <select name="Deposito"  class="form-control select2 select input-lg"  style="width: 100%;" required>
                                            <option value="Todos" selected="selected">Todos</option>
                                            <?php
                                            $queryList=mysqli_query($conn3,"SELECT * FROM dep WHERE activo = 1 ");
                                            while($RowDepositos=mysqli_fetch_array($queryList))
                                            {
                                            $id = $RowDepositos['id'];
                                            $descripcion = $RowDepositos['descripcion'];

                                            echo "<option value='$id'> $descripcion </option>";
                                            }
                                            ?>
                                        </select> 
                                </div>



                                <div class="col-md-3">
                                    <center style='padding-top: 35px;'><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                            <h4> <strong> Generar </strong> </h4>
                                        </button></center>
                                </div>
                            </div>
                            </form>
                        </div>





                        <div class="col-md-12">
                            <hr>
                        </div>
                        




                        <div class="col-md-12">
                            <div class="col-md-12" style="text-align:center"><i class="fas fa-id-card-alt"></i> Productos Vendidos    </div>
                            <form action="RF_ReporteMedicamentosVendidos.php" method="POST" enctype="multipart/form-data">

                            <div class="col-md-12 row" style="text-align:center">
                                
                                <div class="col-md-6">
                                    <label style='padding-top: 15px;'> Fecha Desde</label>
                                    <input type="date" class="form-control input-lg" name="desde" value="<?= $fecha_actual; ?>" >
                                    <input type="hidden" class="form-control input-lg" name="usuario_id" value="<?php echo $_SESSION["ID"] ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label style='padding-top: 15px;'> Fecha Hasta</label>
                                    <input type="date" class="form-control input-lg" name="hasta" value="<?= $fecha_actual_mas_dias; ?>" >
                                </div>

                                <div class="col-md-3">
                                    <label style='padding-top: 15px;'> Producto</label>
                                    <select name="Producto"  class="form-control select2 select input-lg"  style="width: 100%;" required>
                                        <option value="Todos" selected="selected">Todos</option>
                                            <?php
                                            $queryList=mysqli_query($conn3,"SELECT * FROM sinvetrios  WHERE estado = 1 ");
                                            while($rowInventario=mysqli_fetch_array($queryList))
                                            {
                                                $ID = $rowInventario['ID'];
                                                $descripcion = $rowInventario['descripcion'];

                                                $TipoProducto = funcionMaster($ID,'ID','tipo','sinvetrios');
                                                $ClasificacionProducto = funcionMaster($TipoProducto,'id','tipo','scategoria');

                                                
                                                echo "<option value='$ID'> $descripcion </option>";
                                                
                                                
                                            }
                                            ?>
                                        </select> 
                                </div>

                                <div class="col-md-3">
                                    <label style='padding-top: 15px;'> Depósitos</label>
                                    <select name="Deposito"  class="form-control select2 select input-lg"  style="width: 100%;" required>
                                            <option value="Todos" selected="selected">Todos</option>
                                            <?php
                                            $queryList=mysqli_query($conn3,"SELECT * FROM dep WHERE activo = 1 ");
                                            while($RowDepositos=mysqli_fetch_array($queryList))
                                            {
                                            $id = $RowDepositos['id'];
                                            $descripcion = $RowDepositos['descripcion'];

                                            echo "<option value='$id'> $descripcion </option>";
                                            }
                                            ?>
                                        </select> 
                                </div>

                                <div class="col-md-3">
                                    <label style='padding-top: 15px;'> Pos </label>
                                    <select name="Pos"  class="form-control select2 select input-lg"  style="width: 100%;" required>
                                            <option value="Todos" selected="selected">Todos</option>
                                            <option value="0" >Sin POS</option>
                                            <?php
                                            $queryList=mysqli_query($conn3,"SELECT * FROM PuntoPOS WHERE Activo = 1 ");
                                            while($RowDepositos=mysqli_fetch_array($queryList))
                                            {
                                            $id = $RowDepositos['id'];
                                            $Nombre = $RowDepositos['Nombre'];

                                            echo "<option value='$id'> $Nombre </option>";
                                            }
                                            ?>
                                        </select> 
                                </div>



                                <div class="col-md-3">
                                    <center style='padding-top: 35px;'><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                            <h4> <strong> Generar </strong> </h4>
                                        </button></center>
                                </div>
                            </div>
                            </form>
                        </div>

                        
                        <div class="col-md-12">
                            <hr>
                        </div>
                        




                        <div class="col-md-12">
                            <div class="col-md-12" style="text-align:center"><i class="fas fa-id-card-alt"></i> Productos Comprados    </div>
                            <form action="RF_ReporteMedicamentosComprados.php" method="POST" enctype="multipart/form-data">

                            <div class="col-md-12 row" style="text-align:center">
                                
                                <div class="col-md-6">
                                    <label style='padding-top: 15px;'> Fecha Desde</label>
                                    <input type="date" class="form-control input-lg" name="desde" value="<?= $fecha_actual; ?>" >
                                    <input type="hidden" class="form-control input-lg" name="usuario_id" value="<?php echo $_SESSION["ID"] ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label style='padding-top: 15px;'> Fecha Hasta</label>
                                    <input type="date" class="form-control input-lg" name="hasta" value="<?= $fecha_actual_mas_dias; ?>" >
                                </div>

                                <div class="col-md-3">
                                    <label style='padding-top: 15px;'> Producto</label>
                                    <select name="Producto"  class="form-control select2 select input-lg"  style="width: 100%;" required>
                                        <option value="Todos" selected="selected">Todos</option>
                                            <?php
                                            $queryList=mysqli_query($conn3,"SELECT * FROM sinvetrios  WHERE estado = 1 ");
                                            while($rowInventario=mysqli_fetch_array($queryList))
                                            {
                                                $ID = $rowInventario['ID'];
                                                $descripcion = $rowInventario['descripcion'];

                                                $TipoProducto = funcionMaster($ID,'ID','tipo','sinvetrios');
                                                $ClasificacionProducto = funcionMaster($TipoProducto,'id','tipo','scategoria');

                                                //Producto Lote -> 5
                                                //Producto Simple -> 1
                                                if($ClasificacionProducto=="5" || $ClasificacionProducto=="1"){
                                                echo "<option value='$ID'> $descripcion </option>";
                                                }
                                                
                                            }
                                            ?>
                                        </select> 
                                </div>

                                <div class="col-md-3">
                                    <label style='padding-top: 15px;'> Depósitos</label>
                                    <select name="Deposito"  class="form-control select2 select input-lg"  style="width: 100%;" required>
                                            <option value="Todos" selected="selected">Todos</option>
                                            <?php
                                            $queryList=mysqli_query($conn3,"SELECT * FROM dep WHERE activo = 1 ");
                                            while($RowDepositos=mysqli_fetch_array($queryList))
                                            {
                                            $id = $RowDepositos['id'];
                                            $descripcion = $RowDepositos['descripcion'];

                                            echo "<option value='$id'> $descripcion </option>";
                                            }
                                            ?>
                                        </select> 
                                </div>

                                <div class="col-md-3">
                                    <label style='padding-top: 15px;'> Proveedor</label>
                                    <select name="Proveedor"  class="form-control select2 select input-lg"  style="width: 100%;" required>
                                            <option value="Todos" selected="selected">Todos</option>
                                            <?php
                                            $queryList=mysqli_query($conn3,"SELECT * FROM sproveedores WHERE Activo = 1 ");
                                            while($RowProveedor=mysqli_fetch_array($queryList))
                                            {
                                            $id = $RowProveedor['id'];
                                            $nombre = $RowProveedor['nombre'];

                                            echo "<option value='$id'> $nombre </option>";
                                            }
                                            ?>
                                        </select> 
                                </div>



                                <div class="col-md-3">
                                    <center style='padding-top: 35px;'><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                            <h4> <strong> Generar </strong> </h4>
                                        </button></center>
                                </div>
                            </div>
                            </form>
                        </div>








                        <div class="col-md-12">
                            <hr>
                        </div>
                        




                        <div class="col-md-12">
                            <div class="col-md-12" style="text-align:center"><i class="fas fa-id-card-alt"></i> Mínimo y Máximo por Medicamento   </div>
                            <form action="RF_ReporteMinimoMaximo.php" method="POST" enctype="multipart/form-data">

                            <div class="col-md-12 row" style="text-align:center">

                                <div class="col-md-4">
                                    <label style='padding-top: 15px;'> Producto</label>
                                    <select name="Producto"  class="form-control select2 select input-lg"  style="width: 100%;" required>
                                        <option value="Todos" selected="selected">Todos</option>
                                            <?php
                                            $queryList=mysqli_query($conn3,"SELECT * FROM sinvetrios  WHERE estado = 1 ");
                                            while($rowInventario=mysqli_fetch_array($queryList))
                                            {
                                                $ID = $rowInventario['ID'];
                                                $descripcion = $rowInventario['descripcion'];

                                                $TipoProducto = funcionMaster($ID,'ID','tipo','sinvetrios');
                                                $ClasificacionProducto = funcionMaster($TipoProducto,'id','tipo','scategoria');

                                                //Producto Lote -> 5
                                                //Producto Simple -> 1
                                                if($ClasificacionProducto=="5" || $ClasificacionProducto=="1"){
                                                    echo "<option value='$ID'> $descripcion </option>";
                                                }
                                                
                                            }
                                            ?>
                                        </select> 
                                </div>

                                <div class="col-md-4">
                                    <label style='padding-top: 15px;'> Depósitos</label>
                                    <select name="Deposito"  class="form-control select2 select input-lg"  style="width: 100%;" required>
                                            <option value="Todos" selected="selected">Todos</option>
                                            <?php
                                            $queryList=mysqli_query($conn3,"SELECT * FROM dep WHERE activo = 1 ");
                                            while($RowDepositos=mysqli_fetch_array($queryList))
                                            {
                                            $id = $RowDepositos['id'];
                                            $descripcion = $RowDepositos['descripcion'];

                                            echo "<option value='$id'> $descripcion </option>";
                                            }
                                            ?>
                                        </select> 
                                </div>



                                <div class="col-md-4">
                                    <center style='padding-top: 35px;'><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                            <h4> <strong> Generar </strong> </h4>
                                        </button></center>
                                </div>
                            </div>
                            </form>
                        </div>



                        <div class="col-md-12">
                            <hr>
                        </div>
                        




                        <div class="col-md-12">
                            <div class="col-md-12" style="text-align:center"><i class="fas fa-id-card-alt"></i> Mínimo y Máximo por Medicamento, Fecha Ultima Compra y Venta del Producto  </div>
                            <form action="RF_ReporteMinimoMaximoFechaUltimaCompraVenta.php" method="POST" enctype="multipart/form-data">

                            <div class="col-md-12 row" style="text-align:center">

                                <div class="col-md-4">
                                    <label style='padding-top: 15px;'> Producto</label>
                                    <select name="Producto"  class="form-control select2 select input-lg"  style="width: 100%;" required>
                                        <option value="Todos" selected="selected">Todos</option>
                                            <?php
                                            $queryList=mysqli_query($conn3,"SELECT * FROM sinvetrios  WHERE estado = 1 ");
                                            while($rowInventario=mysqli_fetch_array($queryList))
                                            {
                                                $ID = $rowInventario['ID'];
                                                $descripcion = $rowInventario['descripcion'];

                                                $TipoProducto = funcionMaster($ID,'ID','tipo','sinvetrios');
                                                $ClasificacionProducto = funcionMaster($TipoProducto,'id','tipo','scategoria');

                                                //Producto Lote -> 5
                                                //Producto Simple -> 1
                                                if($ClasificacionProducto=="5" || $ClasificacionProducto=="1"){
                                                    echo "<option value='$ID'> $descripcion </option>";
                                                }
                                                
                                            }
                                            ?>
                                        </select> 
                                </div>

                                <div class="col-md-4">
                                    <label style='padding-top: 15px;'> Depósitos</label>
                                    <select name="Deposito"  class="form-control select2 select input-lg"  style="width: 100%;" required>
                                            <option value="Todos" selected="selected">Todos</option>
                                            <?php
                                            $queryList=mysqli_query($conn3,"SELECT * FROM dep WHERE activo = 1 ");
                                            while($RowDepositos=mysqli_fetch_array($queryList))
                                            {
                                            $id = $RowDepositos['id'];
                                            $descripcion = $RowDepositos['descripcion'];

                                            echo "<option value='$id'> $descripcion </option>";
                                            }
                                            ?>
                                        </select> 
                                </div>



                                <div class="col-md-4">
                                    <center style='padding-top: 35px;'><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                            <h4> <strong> Generar </strong> </h4>
                                        </button></center>
                                </div>
                            </div>
                            </form>
                        </div>




                        <div class="col-md-12">
                            <hr>
                        </div>
                        




                        <div class="col-md-12">
                            <div class="col-md-12" style="text-align:center"><i class="fas fa-id-card-alt"></i> Reporte de Existencias por Departamentos/Tipo </div>
                            <form action="RF_ReporteExistenciasDepartamento.php" method="POST" enctype="multipart/form-data">

                            <div class="col-md-12 row" style="text-align:center">

                                <div class="col-md-4">
                                    <label style='padding-top: 15px;'> Departamentos</label>
                                    <select name="Departamentos"  class="form-control select2 select input-lg"  style="width: 100%;" required>
                                        <option value="Todos" selected="selected">Todos</option>
                                            <?php
                                            $queryList=mysqli_query($conn3,"SELECT * from scategoria where Activo = 1");
                                            while($rowInventario=mysqli_fetch_array($queryList))
                                            {
                                                $id = $rowInventario['id'];
                                                $descripcion = $rowInventario['descripcion'];
                                                $ClasificacionProducto = $rowInventario['tipo'];
                                                //Producto Lote -> 5
                                                //Producto Simple -> 1
                                                if($ClasificacionProducto=="5" || $ClasificacionProducto=="1"){
                                                echo "<option value='$id'> $descripcion </option>";
                                                }
                                            }
                                            ?>
                                        </select> 
                                </div>

                                <div class="col-md-4">
                                    <label style='padding-top: 15px;'> Depósitos</label>
                                    <select name="Deposito"  class="form-control select2 select input-lg"  style="width: 100%;" required>
                                            <option value="Todos" selected="selected">Todos</option>
                                            <?php
                                            $queryList=mysqli_query($conn3,"SELECT * FROM dep WHERE activo = 1 ");
                                            while($RowDepositos=mysqli_fetch_array($queryList))
                                            {
                                            $id = $RowDepositos['id'];
                                            $descripcion = $RowDepositos['descripcion'];

                                            echo "<option value='$id'> $descripcion </option>";
                                            }
                                            ?>
                                        </select> 
                                </div>



                                <div class="col-md-4">
                                    <center style='padding-top: 35px;'><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                            <h4> <strong> Generar </strong> </h4>
                                        </button></center>
                                </div>
                            </div>
                            </form>
                        </div>



                        <div class="col-md-12">
                            <hr>
                        </div>
                        




                        <div class="col-md-12">
                            <div class="col-md-12" style="text-align:center"><i class="fas fa-id-card-alt"></i> Reporte Cantidad Vendidos Dias,Mes,Año</div>
                            <form action="RF_ReporteCantidadVendidosFiltro.php" method="POST" enctype="multipart/form-data">

                            <div class="col-md-12 row" style="text-align:center">

                                <div class="col-md-6">
                                    <label style='padding-top: 15px;'> Tipo Filtro </label>
                                    <select name="TipoFechas" id="TipoFechas"  class="form-control select2 select input-lg"  style="width: 100%;" onchange="TipoFechasVendidos()" required>
                                        <option value="" selected="selected">Seleccione</option>
                                        <option value="Dias" >Dias</option>
                                        <option value="Mes" >Mes</option>
                                        <option value="Año" >Año</option>
                                    </select> 
                                </div>

                                <div class="col-md-6 row" id="RespuestaTipoFechas">

                                </div>



                                <div class="col-md-12">
                                    <center style='padding-top: 35px;'><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                            <h4> <strong> Generar </strong> </h4>
                                        </button></center>
                                </div>
                            </div>
                            </form>
                        </div>
                                            

                        
                        


                        <div class="col-md-12">
                            <hr>
                        </div>
                        




                        <div class="col-md-12">
                            <div class="col-md-12" style="text-align:center"><i class="fas fa-id-card-alt"></i> Reporte Cantidad Comprados Dias,Mes,Año</div>
                            <form action="RF_ReporteCantidadCompradosFiltro.php" method="POST" enctype="multipart/form-data">

                            <div class="col-md-12 row" style="text-align:center">

                                <div class="col-md-6">
                                    <label style='padding-top: 15px;'> Tipo Filtro </label>
                                    <select name="TipoFechas_Compras" id="TipoFechas_Compras"  class="form-control select2 select input-lg"  style="width: 100%;" onchange="TipoFechasCompras   ()" required>
                                        <option value="" selected="selected">Seleccione</option>
                                        <option value="Dias" >Dias</option>
                                        <option value="Mes" >Mes</option>
                                        <option value="Año" >Año</option>
                                    </select> 
                                </div>

                                <div class="col-md-6 row" id="RespuestaTipoFechas_Compras">

                                </div>



                                <div class="col-md-12">
                                    <center style='padding-top: 35px;'><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                            <h4> <strong> Generar </strong> </h4>
                                        </button></center>
                                </div>
                            </div>
                            </form>
                        </div>




                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include 'footer.php';
?>

<script>
    function TipoFechasVendidos() {
        var tipoSeleccionado = document.getElementById("TipoFechas").value;
        var respuestaTipoFechasDiv = document.getElementById("RespuestaTipoFechas");

        if (tipoSeleccionado === "Dias") {
            respuestaTipoFechasDiv.innerHTML = `
                <div class="col-md-6">
                    <label style='padding-top: 15px;'> Desde </label>
                    <input type="date" name="desde_fecha" placeholder="Desde" class="form-control input-lg" required>
                </div>
                <div class="col-md-6">
                    <label style='padding-top: 15px;'> Hasta </label>
                    <input type="date" name="hasta_fecha" placeholder="Hasta" class="form-control input-lg" required>
                </div>
            `;
        }  else if (tipoSeleccionado === "Mes") {
        var currentDate = new Date();
        var currentMonth = currentDate.getMonth() + 1; // El mes actual es 0-indexado
        respuestaTipoFechasDiv.innerHTML = `
        <div class="col-md-12">
                <label style='padding-top: 15px;'> Mes [Año Actual]</label>
            <select name="meses_venta" id="meses_venta" onchange="seleccionarMes()" class="form-control select2 select input-lg">
                <option value="1" ${currentMonth === 1 ? 'selected' : ''}>Enero</option>
                <option value="2" ${currentMonth === 2 ? 'selected' : ''}>Febrero</option>
                <option value="3" ${currentMonth === 3 ? 'selected' : ''}>Marzo</option>
                <option value="4" ${currentMonth === 4 ? 'selected' : ''}>Abril</option>
                <option value="5" ${currentMonth === 5 ? 'selected' : ''}>Mayo</option>
                <option value="6" ${currentMonth === 6 ? 'selected' : ''}>Junio</option>
                <option value="7" ${currentMonth === 7 ? 'selected' : ''}>Julio</option>
                <option value="8" ${currentMonth === 8 ? 'selected' : ''}>Agosto</option>
                <option value="9" ${currentMonth === 9 ? 'selected' : ''}>Septiembre</option>
                <option value="10" ${currentMonth === 10 ? 'selected' : ''}>Octubre</option>
                <option value="11" ${currentMonth === 11 ? 'selected' : ''}>Noviembre</option>
                <option value="12" ${currentMonth === 12 ? 'selected' : ''}>Diciembre</option>
            </select>
        </div>

            <input type="hidden" name="desde_fecha" id="desde_venta_fecha">
            <input type="hidden" name="hasta_fecha" id="hasta_venta_fecha">

        <label id="RespuestaFechaHidden" style="width:100%;text-align:center;"></label>
        `;
        seleccionarMes('meses_venta','desde_venta_fecha','hasta_venta_fecha','RespuestaFechaHidden');
        } else if (tipoSeleccionado === "Año") {
            var options = "";
            var currentYear = new Date().getFullYear();
            for (var i = 2000; i <= 2100; i++) {
                options += `<option value="${i}" ${i === currentYear ? 'selected' : ''}>${i}</option>`;
            }
            respuestaTipoFechasDiv.innerHTML = `
            <div class="col-md-12">
                    <label style='padding-top: 15px;'> Año </label>
                <select name="anios_venta" id="anios_venta" onchange="seleccionarAnio()" class="form-control select2 select input-lg">
                    ` + options + `
                </select>
            </div>

                <input type="hidden" name="desde_fecha" id="desde_venta_fecha">
                <input type="hidden" name="hasta_fecha" id="hasta_venta_fecha">

                <label id="RespuestaFechaHidden" style="width:100%;text-align:center;"></label>
            `;
            seleccionarAnio('anios_venta','desde_venta_fecha','hasta_venta_fecha','RespuestaFechaHidden');
        }
    }











    function TipoFechasCompras() {
        var tipoSeleccionado = document.getElementById("TipoFechas_Compras").value;
        var respuestaTipoFechasDiv = document.getElementById("RespuestaTipoFechas_Compras");

        if (tipoSeleccionado === "Dias") {
            respuestaTipoFechasDiv.innerHTML = `
                <div class="col-md-6">
                    <label style='padding-top: 15px;'> Desde </label>
                    <input type="date" name="desde_fecha" placeholder="Desde" class="form-control input-lg" required>
                </div>
                <div class="col-md-6">
                    <label style='padding-top: 15px;'> Hasta </label>
                    <input type="date" name="hasta_fecha" placeholder="Hasta" class="form-control input-lg" required>
                </div>
            `;
        }  else if (tipoSeleccionado === "Mes") {
        var currentDate = new Date();
        var currentMonth = currentDate.getMonth() + 1; // El mes actual es 0-indexado
        respuestaTipoFechasDiv.innerHTML = `
        <div class="col-md-12">
                <label style='padding-top: 15px;'> Mes [Año Actual]</label>
            <select name="meses_compra" id="meses_compra" onchange="seleccionarMes()" class="form-control select2 select input-lg">
                <option value="1" ${currentMonth === 1 ? 'selected' : ''}>Enero</option>
                <option value="2" ${currentMonth === 2 ? 'selected' : ''}>Febrero</option>
                <option value="3" ${currentMonth === 3 ? 'selected' : ''}>Marzo</option>
                <option value="4" ${currentMonth === 4 ? 'selected' : ''}>Abril</option>
                <option value="5" ${currentMonth === 5 ? 'selected' : ''}>Mayo</option>
                <option value="6" ${currentMonth === 6 ? 'selected' : ''}>Junio</option>
                <option value="7" ${currentMonth === 7 ? 'selected' : ''}>Julio</option>
                <option value="8" ${currentMonth === 8 ? 'selected' : ''}>Agosto</option>
                <option value="9" ${currentMonth === 9 ? 'selected' : ''}>Septiembre</option>
                <option value="10" ${currentMonth === 10 ? 'selected' : ''}>Octubre</option>
                <option value="11" ${currentMonth === 11 ? 'selected' : ''}>Noviembre</option>
                <option value="12" ${currentMonth === 12 ? 'selected' : ''}>Diciembre</option>
            </select>
        </div>

            <input type="hidden" name="desde_fecha" id="desde_compra_fecha">
            <input type="hidden" name="hasta_fecha" id="hasta_compra_fecha">

        <label id="RespuestaFechaHidden_Compras" style="width:100%;text-align:center;"></label>
        `;
        seleccionarMes('meses_compra','desde_compra_fecha','hasta_compra_fecha','RespuestaFechaHidden_Compras');
        } else if (tipoSeleccionado === "Año") {
            var options = "";
            var currentYear = new Date().getFullYear();
            for (var i = 2000; i <= 2100; i++) {
                options += `<option value="${i}" ${i === currentYear ? 'selected' : ''}>${i}</option>`;
            }
            respuestaTipoFechasDiv.innerHTML = `
            <div class="col-md-12">
                    <label style='padding-top: 15px;'> Año </label>
                <select name="anios_compra" id="anios_compra" onchange="seleccionarAnio()" class="form-control select2 select input-lg">
                    ` + options + `
                </select>
            </div>

                <input type="hidden" name="desde_fecha" id="desde_compra_fecha">
                <input type="hidden" name="hasta_fecha" id="hasta_compra_fecha">

                <label id="RespuestaFechaHidden_Compras" style="width:100%;text-align:center;"></label>
            `;
            seleccionarAnio('anios_compra','desde_compra_fecha','hasta_compra_fecha','RespuestaFechaHidden_Compras');
        }
    }



    function seleccionarMes(Campo_Mes,CampoDesde,CampoHasta,Respuesta) {
        var mesSeleccionado = document.getElementById(Campo_Mes).value;
        var desdeFechaInput = document.getElementById(CampoDesde);
        var hastaFechaInput = document.getElementById(CampoHasta);
        
        // Obtener el año y día actual
        var fechaActual = new Date();
        var añoActual = fechaActual.getFullYear();
        
        // Crear una nueva fecha con el mes seleccionado y el primer día del mes
        var fechaInicio = new Date(añoActual, mesSeleccionado - 1, 1);
        
        // Crear una nueva fecha con el mes seleccionado y el último día del mes
        var fechaFin = new Date(añoActual, mesSeleccionado, 0); // El día 0 del siguiente mes es el último día del mes seleccionado
        
        // Formatear las fechas en el formato YYYY-MM-DD para el input date
        var desdeFecha = fechaInicio.toISOString().split('T')[0];
        var hastaFecha = fechaFin.toISOString().split('T')[0];
        
        // Asignar las fechas a los campos de entrada ocultos
        desdeFechaInput.value = desdeFecha;
        hastaFechaInput.value = hastaFecha;

        document.getElementById(Respuesta).innerHTML = "["+desdeFechaInput.value+" - "+hastaFechaInput.value+"]";
    }

    function seleccionarAnio(Campo_Anual,CampoDesde,CampoHasta,Respuesta) {
    var anioSeleccionado = parseInt(document.getElementById(Campo_Anual).value); // Convertir a número entero
    var desdeFechaInput = document.getElementById(CampoDesde);
    var hastaFechaInput = document.getElementById(CampoHasta);

    // Crear una nueva fecha para el primer día del año seleccionado (1 de enero)
    var fechaInicio = new Date(anioSeleccionado, 0, 1);

    // Crear una nueva fecha para el último día del año seleccionado (31 de diciembre)
    var fechaFin = new Date(anioSeleccionado, 11, 31);

    // Formatear las fechas en el formato YYYY-MM-DD para el input date
    var desdeFecha = fechaInicio.toISOString().split('T')[0];
    var hastaFecha = fechaFin.toISOString().split('T')[0];

    // Asignar las fechas a los campos de entrada ocultos
    desdeFechaInput.value = desdeFecha;
    hastaFechaInput.value = hastaFecha;

    document.getElementById(Respuesta).innerHTML = "["+desdeFechaInput.value+" - "+hastaFechaInput.value+"]";

}

</script>
