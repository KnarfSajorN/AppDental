   <?php
    include 'header.php';
    include 'menu.php'; ?>

   <?php
    //$QueryWhereSucursal filtro para la sucursal
    // if($_SESSION['sucursal'] >= 0 AND $_SESSION['vista'] == 0) {$QueryWhereSucursal = " WHERE ".$QueryWhereSucursal; }
    // if($_SESSION['sucursal'] >= 0 AND $_SESSION['vista'] == 1) {$QueryWhereSucursal = " AND  ".$QueryWhereSucursal; }
    ?>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper p-3">
       <!-- Content Header (Page header) -->
       <section class="content-header">
           <ol class="breadcrumb">
               <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
               <li><a href="#">Control de Gastos y Egresos</a></li>
           </ol>
       </section>
       <!-- Main content -->
       <section class="content">
           <div>
               <div class="col-xs-12">
                   <h4 class="Titulo_Pagina">Control de Gastos y Egresos</h4>

                   <div class="box">
                       <div class="box-header">
                           <a href="nuevoPaciente">
                               <!-- <button class="btn btn-block btn-primary btn-sm">
                   <h4> <strong> <i class="fas fa-id-card-alt"></i> Registrar Pacientes </strong></h4>
                 </button> -->
                           </a>

                           <!-- leyenda -->
                           <!-- <div class="col-md-12">
                <label for="">Tipo:</label>
                <div class="col-md-12">
                  <label for="">Gastos: 1 </label>
                  <br>
                  <label for="">Egresos: 2 </label>
                </div>
              </div> -->


                       </div>
                       <!-- /.box-header -->
                       <div class="box-body">


                           <div class="box-body table-responsive no-padding">
                               <table id="example1" class="table table-bordered table-striped" style="font-size:18px">
                                   <thead>
                                       <tr>
                                           <th>Fecha</th>
                                           <th>Mes</th>
                                           <th>Descripción</th>
                                           <th>Tipo</th>
                                           <th>Categoría</th>
                                           <th> </th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <?php
                                        $sql = "SELECT * FROM  S_GE_nuevo where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}')";
                                        $result = mysqli_query($conn3, $sql);
                                        while ($row = mysqli_fetch_array($result)) {
                                            if ($row['tipo'] == 1) {
                                                $tipo = "GASTO";
                                            } else {
                                                $tipo = "EGRESO";
                                            }
                                            $categoria = funcionMaster($row['categoria'], 'id', 'descripcion', 'S_GE_categorias');

                                            echo '<tr>';
                                            echo '<td>' . $row['fecha'] . '</td>';
                                            echo '<td>' . $row['mes'] . '</td>';
                                            echo '<td>' . $row['descripcion'] . '</td>';
                                            echo '<td>' . $tipo . '</td>';
                                            echo '<td>' . $categoria . '</td>';
                                            echo '<td>';
                                            echo '<a href="ImprimirGasto?Id=' . $row['id'] . '">';
                                            echo '<button class="btn btn-block btn-outline-info rounded-pill shadow m-1">';
                                            echo '<i class="fas fa-print"></i>';
                                            echo '</button>';
                                            echo '</a>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                   </tbody>
                               </table>
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