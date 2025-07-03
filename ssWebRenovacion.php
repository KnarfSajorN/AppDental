
  <!-- Left side column. contains the logo and sidebar -->
   <?php 
   include 'header.php';
   include 'menu.php';





   ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Control de Hosting
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Control de Hosting</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">

              <form class="form-horizontal" action="ssWebRenovacion.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                   
                  <div class="col-sm-6">
                    <label> Dominio </label>
                    <input type="text" name="dominio"  class="form-control input-lg" id="dominio" placeholder="dominio.com" required>
                  </div>
                  <div class="col-sm-6">
                    <label> nombreEmpresa </label>
                     <input type="text" name="nombreEmpresa" class="form-control input-lg" id="nombreEmpresa" placeholder="nombreEmpresa" required>
                  </div>
                  <div class="col-sm-6">
                     <label> proveedor </label>
                     <input type="text" name="proveedor" class="form-control input-lg" id="proveedor" placeholder="proveedor" required>
                  </div>
                  <div class="col-sm-6">
                     <label> fechaRegistro </label>
                     <input type="date" name="fechaRegistro" class="form-control input-lg" id="fechaRegistro" placeholder="fechaRegistro" required>
                  </div>
                  <div class="col-sm-6">
                     <label> fechaVencimiento </label>
                     <input type="date" name="fechaVencimiento" class="form-control input-lg" id="fechaVencimiento" placeholder="fechaVencimiento" required>
                  </div>
                   <div class="col-sm-6">
                     <label> correoEmpresa </label>
                     <input type="email" name="correoEmpresa" class="form-control input-lg" id="correoEmpresa" placeholder="correoEmpresa" required>
                  </div>
                  <div class="col-sm-6">
                     <label> nombrePropietario </label>
                     <input type="text" name="nombrePropietario" class="form-control input-lg" id="nombrePropietario" placeholder="nombrePropietario" required>
                  </div>


                  <div class="col-sm-2">
                      <label>Tipo</label>
                        <select class="form-control select2" name="tipo">
                        <option selected="selected" value="0">Cliente</option>
                        <option value="1">Interno</option>
                      </select>
                  </div>
                  <br>
                  <div class="col-sm-2">
                      <label>estado</label>
                        <select class="form-control select2" name="estado"  >
                        <option selected="selected" value="0">Activo</option>
                        <option value="1">Inactivo</option>
                        <option value="2">Vencido</option>
                      </select>
                  </div>
                  <div class="col-sm-2">
                      <label>tipoServicio</label>
                        <select class="form-control select2" name="tipoServicio">
                        <option selected="selected" value="0">Dominio y Hosting</option>
                        <option value="1">Solo Hosting</option>
                        <option value="2">Solo Dominio</option>
                      </select>
                  </div>

                </div>
              

                  
              </div>
 
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-block btn-primary btn-sm" id="registro_state" name="registro_state"><h4> Save </h4></button>
                
              </div>
              <!-- /.box-footer -->
            </form>
    


<br>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Time</th>
                  <th>Order</th>
                  
                  <th>  </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php
                  
                  //     ?ID_patients=8
                     
                    $resultado=mysql_query("select * from state order by orden");
                    $check=mysql_num_rows($q);
                 

                    while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) 
                    {
                      //  '.$fila[2].'

 

                      echo '     <tr>
                      <td>'.$fila[1].'</td>
                      <td>'.$fila[2].'</td>
                      <td>'.$fila[3].'</td>
                      <td>  
                      <a title="Borrar" href="state.php?ID_state='.$fila[0].'""> <i class="fa fa-trash"></i> </a>  
                      </td>

                      </tr>';

                    }


 ?>


 <a href=""></a>
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Time</th>
                  <th>Order</th>
                  
                  <th>  </th>
                </tr>
                </tfoot>
              </table>
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