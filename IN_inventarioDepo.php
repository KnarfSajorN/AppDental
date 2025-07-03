   <?php
    include 'header.php';
    include 'menu.php'; ?>

   <?php
   $idPrincipal=$_SESSION['ID_principal'];
    ?>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper p-3">
       <!-- Content Header (Page header) -->
       <section class="content-header">
           <ol class="breadcrumb">
               <li><a href="portada"><i class="fa fa-dashboard"></i> Inventario</a></li>
               <li><a href="#">Depositos de Inventario</a></li>
           </ol>
       </section>
       <!-- Main content -->
       <section class="content">
           <div>
               <div class="col-xs-12">
                   <h4 class="Titulo_Pagina">Seleccionar Deposito</h4>


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

                                <form action="IN_ListaInventarios" method="GET">
                                    <div class="col-md-12">
                                        <h1>Selecccione el Deposito de su Inventario </h1>
                                        <select name="deposito" id="" class="form-control">
                                            <?php  $queryDepo= "SELECT * FROM dep WHERE ID_principal = $idPrincipal"; //Este query muestra los depositos relaciones al ID_principal
                                                    $resultDepo = mysqli_query($conn3,$queryDepo);
                                                    while($rowDepo = mysqli_fetch_assoc($resultDepo)){
                                                    echo "<option value = ".$rowDepo['id'].">".$rowDepo['descripcion']."</option>";
                                                    }
                                            ?>     
                                        </select>
                                        </div>
                                    <div class="col-md-12">
                                        <!-- submit -->
                                        <hr>
                                        <button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1">
                                            <h4> <strong> <i class="fas fa-save"></i> Mostrar </strong></h4>
                                        </button>
                                        <input type="hidden" name="usuario_id" value="<?=$idPrincipal ?>">
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