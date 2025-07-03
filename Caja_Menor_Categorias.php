
<?php
include 'header.php';
include 'menu.php';
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
            <li><a href="#"> Categorías Caja Menor </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Categorías Caja Menor </h4>
                <div class="box">
                    <div class="box-body">




                    <div class="box">
                           <div class="box-header">
                             <!-- <a href="registrodatafono.php"> -->
                             <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" data-toggle="modal" data-target="#exampleModalD">
                               <h4> <strong> <i class="fa fa-glyphicon glyphicon-plus"></i> Registro de Categoría </strong></h4>
                             </button>
                             <!-- </a> -->
                             <!-- Modal registro datafono -->
                             <div class="modal fade" id="exampleModalD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                               <div class="modal-dialog " role="document">
                                 <div class="modal-content">
                                   <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLabel">Registro Nuevo Categoría</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                     </button>
                                   </div>
                                   <form action="Caja_Menor_CategoriasRegistro.php" method="POST">
                                     <div class="modal-body">
                                       <div class="col-md-12 row">
                                         <div class="col-md-6 mt-3">
                                           <label>Es un sub-Categoría? <strong class="text-danger">*</strong></label><br>
                                           <div class="position-relative form-group">
                                             <div>
                                               <div class="position-relative form-check">
                                                 <label class="form-check-label"><input name="tap" onclick="verSelect(this.value)" value="1" type="radio" class="form-check-input">Si</label>
                                               </div>
                                               <div class="position-relative form-check">
                                                 <label class="form-check-label"><input name="tap" onclick="verSelect(this.value)" value="2" type="radio" class="form-check-input">No</label>
                                               </div>
                                             </div>
                                           </div>
                                         </div>
                                         <div class="col-md-6 mt-3" style="display:none" id="form-centro">
                                           <label>Categoría Principal<strong class="text-danger">*</strong></label><br>
                                           <select name="categoriaPrincipal_id" class="form-control input-lg">
                                             <option value="0" selected="">Ninguno Seleccionado</option>
                                             <?php
                                              $queryList = mysqli_query($conn3, "SELECT * from cajaMenorCategorias where subCategoria=0 and categoriaPrincipal_id=0");
                                              $nrowl = mysqli_num_rows($queryList);
                                              while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                echo '<option value="' . $rowMotorizado['id'] . '">' . $rowMotorizado['descripcion'] . '</option>';
                                              }
                                              ?>
                                           </select>
                                         </div>
                                         <div class="col-md-12 mt-3">
                                           <label>Descripción <strong class="text-danger">*</strong></label><br>
                                           <input type="text" required placeholder="Descripción" name="descripcion" class="form-control input-lg">
                                         </div>
                                       </div>
                                     </div>
                                     <div class="modal-footer">
                                       <button type="button" class="btn btn-outline-danger btn-lg rounded-pill shadow" data-dismiss="modal">Cerrar</button>
                                       <button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow">Guardar Registro</button>
                                     </div>
                                   </form>
                                 </div>
                               </div>
                             </div>

                           </div>
                           <!-- /.box-header -->
                           <div class="box-body mt-3">
                             <table id="example1" class="table table-bordered table-striped">
                               <thead>
                                 <tr>
                                   <th>Código</th>
                                   <th>Descripción</th>
                                   <th></th>
                                 </tr>
                               </thead>
                               <tbody>
                                 <?php

                                  $ID = $_SESSION['ID'];
                                  $contador1 = 0;
                                  $queryList = mysqli_query($conn3, "SELECT * from cajaMenorCategorias where subCategoria=0 and categoriaPrincipal_id=0");
                                  $nrowl = mysqli_num_rows($queryList);
                                  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                    $Cid = $rowMotorizado['id'];
                                    $Cdescripcion = $rowMotorizado['descripcion'];
                                    $CfechaReg = $rowMotorizado['fechaReg'];
                                    $ChoraReg = $rowMotorizado['horaReg'];
                                    $Cestado = $rowMotorizado['estado'];

                                    switch ($Cestado){
                                        case '1':
                                            $CestadoN="Activo";
                                            break;
                                        case '0':
                                            $CestadoN="Inactivo";
                                        default:
                                            $CestadoN=$Cestado;
                                      }

                                    $contador1++;

                                    echo '
                                  <tr>
                                  <td>' . $contador1 . '</td>
                                  <td>' . $Cdescripcion . '</td>
                                  <td><button   class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" data-toggle="modal" data-target="#exampleModal' . $Cid . '">
                                  Ver / Editar</button></td>
                                  </tr>
                                  ';
                                    $contador = 0;
                                    $queryList2 = mysqli_query($conn3, "SELECT * from cajaMenorCategorias where categoriaPrincipal_id=$Cid");
                                    $nrowl = mysqli_num_rows($queryList2);
                                    while ($rowMotorizado2 = mysqli_fetch_array($queryList2)) {
                                      $contador = $contador + 1;
                                      $C2id = $rowMotorizado2['id'];
                                      $C2descripcion = $rowMotorizado2['descripcion'];
                                      $C2fechaReg = $rowMotorizado2['fechaReg'];
                                      $C2horaReg = $rowMotorizado2['horaReg'];

                                      $C2estado = $rowMotorizado2['estado'];

                                      switch ($C2estado){
                                        case '1':
                                            $C2estadoN="Activo";
                                            break;
                                        case '0':
                                            $C2estadoN="Inactivo";
                                        default:
                                            $C2estadoN=$C2estado;
                                      }
                                      echo '
                                    <tr>
                                    <td>' . $contador1 . '-' . $contador . '</td>
                                    <td>' . $C2descripcion . '</td>
                                    <td><button   class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" data-toggle="modal" data-target="#exampleModal' . $C2id . '">
                                    Ver / Editar</button></td>
                                    </tr>
                                    ';

                                      echo '
                                  <!-- Modal registro datafono -->
                                  <div class="modal fade" id="exampleModal' . $C2id . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog " role="document">
                                  <div class="modal-content">
                                  <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Ver / Modificar Centro de Costo  - ' . $C2id . '</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                                  </div>
                                  <form action="Caja_Menor_CategoriasActualizar.php" method="POST">
                                  <div class="modal-body">
                                  <div class="col-md-12 row">
                                  <div class="col-md-12 mt-3">
                                  <label>Descripción <strong class="text-danger">*</strong></label><br>
                                  <input type="text" required placeholder="Descripción" value="' . $C2descripcion . '" name="descripcion" class="form-control input-lg">
                                  </div>
                                  <div class="col-md-12 mt-3 ">
                                  <label><strong class="text-danger"></strong></label><br>
                                  <div class="position-relative form-group">
                                  <div>
                                                                   
                                  
                                  </div>
                                  </div>
                                  </div> 
                                  <div class="col-md-6 mt-3">
                                  <label>Estado <strong class="text-danger">*</strong></label><br>
                                  <select name="estado" class="input-lg form-control">
                                  <option value="' . $C2estado . '" selected="" >' . $C2estadoN . '</option>
                                  <option value="1" >Activo</option>
                                  <option value="0" >Inactivo</option>
                                  </select>
                                  </div>                                       
                                  </div>
                                  </div>
                                  <div class="modal-footer">
                                  <input type="hidden" value="' . $C2id . '" name="idcategoria">
                                  <button type="button" class="btn   btn-outline-danger btn-lg rounded-pill shadow" data-dismiss="modal">Cerrar</button>
                                  <button type="submit" class="btn   btn-outline-info btn-lg rounded-pill shadow">Guardar Registro</button>
                                  </div>
                                  </form>
                                  </div>
                                  </div>
                                  </div>';
                                    }



                                    echo '
                                  <!-- Modal registro datafono -->
                                  <div class="modal fade" id="exampleModal' . $Cid . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog " role="document">
                                  <div class="modal-content">
                                  <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Ver / Modificar Centro de Costo  - ' . $Cid . '</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                                  </div>
                                  <form action="Caja_Menor_CategoriasActualizar.php" method="POST">
                                  <div class="modal-body">
                                  <div class="col-md-12 row">
                                  <div class="col-md-12 mt-3">
                                  <label>Descripción <strong class="text-danger">*</strong></label><br>
                                  <input type="text" required placeholder="Descripción" value="' . $Cdescripcion . '" name="descripcion" class="form-control input-lg">
                                  </div>
                                  <div class="col-md-12 mt-3 ">
                                  <label><strong class="text-danger"></strong></label><br>
                                  <div class="position-relative form-group">
                                  <div>
                                  </div>
                                  </div>
                                  </div> 
                                  <div class="col-md-6 mt-3">
                                  <label>Estado <strong class="text-danger">*</strong></label><br>
                                  <select name="estado" class="input-lg form-control">
                                  <option value="' . $Cestado . '" selected="" >' . $CestadoN . '</option>
                                  <option value="1" >Activo</option>
                                  <option value="0" >Inactivo</option>
                                  </select>
                                  </div>                                       
                                  </div>
                                  </div>
                                  <div class="modal-footer">
                                  <input type="hidden" value="' . $Cid . '" name="idcategoria">
                                  <button type="button" class="btn   btn-outline-danger btn-lg rounded-pill shadow" data-dismiss="modal">Cerrar</button>
                                  <button type="submit" class="btn   btn-outline-info btn-lg rounded-pill shadow">Guardar Registro</button>
                                  </div>
                                  </form>
                                  </div>
                                  </div>
                                  </div>';
                                  }
                                  ?>
                               </tbody>
                               <tfoot>
                                 <tr>
                                   <th>Código</th>
                                   <th>Descripción</th>
                                   <th></th>
                                 </tr>
                               </tfoot>
                             </table>
                           </div>
                           <!-- /.box-body -->
                         </div>
                         <!-- /.box -->




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

<script type="text/javascript">
     function verSelect(valor) {
       console.log(valor);
       if (valor == 1) {
         document.getElementById('form-centro').style.display = 'Block';
       } else {
         document.getElementById('form-centro').style.display = 'none';
       }
     }
   </script>