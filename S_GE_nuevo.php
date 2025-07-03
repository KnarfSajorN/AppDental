   <?php
    include 'header.php';
    include 'menu.php'; ?>

   <?php
    //$QueryWhereSucursal filtro para la sucursal
    // if($_SESSION['sucursal'] >= 0 AND $_SESSION['vista'] == 0) {$QueryWhereSucursal = " WHERE ".$QueryWhereSucursal; }
    // if($_SESSION['sucursal'] >= 0 AND $_SESSION['vista'] == 1) {$QueryWhereSucursal = " AND  ".$QueryWhereSucursal; }
    $ID_UsuarioP = $_SESSION['ID_principal'];
    ?>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper p-3">
       <!-- Content Header (Page header) -->
       <section class="content-header">
           <ol class="breadcrumb">
               <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
               <li><a href="#">Registro Gastos / Egresos</a></li>
           </ol>
       </section>
       <!-- Main content -->
       <section class="content">
           <div>
               <div class="col-xs-12">
                   <h4 class="Titulo_Pagina">Registro Gastos / Egresos</h4>


                   <div class="box">
                       <div class="box-header">
                           <a href="nuevoPaciente">
                               <!-- <button class="btn btn-block btn-primary btn-sm">
                   <h4> <strong> <i class="fas fa-id-card-alt"></i> Registrar Pacientes </strong></h4>
                 </button> -->
                           </a>

                       </div>
                       <!-- /.box-header -->
                       <div class="box-body">


                           <div class="box-body table-responsive no-padding">
                               <form action="registroS_GE_nuevo" method="POST">
                               <div class="col-md-12">
                               <?php
                                            //query para obtener los doctores y mostrarlos en el select
                                            $queryDoctor = "SELECT * FROM usuarios WHERE ID_principal = $ID_UsuarioP ";
                                            $queryDocList = mysqli_query($conn3, $queryDoctor);
                                            $docsRow = null;
                                            while ($docsQueryResult = mysqli_fetch_assoc($queryDocList)) {
                                                $docsRow[] = $docsQueryResult;
                                            }
                                            ?>
                                        <label for="">Factura a nombre del Doctor </label>
                                        <select name="id_usuario"  class="form-control input-lg select" id="">
                                            <option value="<?= $_SESSION['ID'] ?>"><?= $_SESSION['NOMBRE_USUARIO'] ?></option>
                                            <?php
                                            foreach ($docsRow as $doc) {
                                                echo '<option value="' . $doc['ID'] . '">' . $doc['NOMBRE_USUARIO'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                            
                                    <div class="col-md-12">
                                        <label for="">Fecha</label>
                                        <input required type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date("Y-m-d"); ?>">
                                    </div>
                                    <div class="col-md-12">
                                       <label for="">Mes</label>
                                       <input required type="text" class="form-control" id="mes" name="mes" value="<?php echo date("m"); ?>">
                                   </div>
                                   <div class="col-md-12">
                                       <label for="">Descripción</label>
                                       <input required type="text" class="form-control" id="descripcion" name="descripcion">
                                   </div>
                                   <div class="col-md-12">
                                       <label for="">Monto</label>
                                       <input required type="number" step="0.01" class="form-control" id="monto" name="monto">
                                   </div>
                                   <div class="col-md-12">
                                       <label for="">tipo</label>
                                       <select required class="form-control" id="tipo" name="tipo">
                                           <option value="1">Gasto</option>
                                           <option value="2">Egreso</option>
                                       </select>
                                   </div>
                                   <div class="col-md-12">
                                       <label for="">Categoría</label>
                                       <select required class="form-control" id="categoria" name="categoria">
                                           <?php
                                            $query = mysqli_query($conn3, "SELECT * FROM S_GE_categorias WHERE estado='1' and (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}')");
                                            while ($row = mysqli_fetch_array($query)) {
                                                echo '<option value="' . $row['id'] . '">' . $row['descripcion'] . '</option>';
                                            }
                                            ?>
                                       </select>
                                   </div>
                                   <div class="col-md-12">
                                       <!-- submit -->
                                       <hr>
                                       <button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1">
                                           <h4> <strong> <i class="fas fa-save"></i> Guardar </strong></h4>
                                       </button>

                                       <input type="hidden" name="sucursal" value="<?php echo $_SESSION["sucursal"] ?>">
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