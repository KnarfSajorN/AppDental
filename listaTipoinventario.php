
  <!-- Left side column. contains the logo and sidebar -->
  <?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tipos de inventarios
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Tipos de inventarios</a></li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">
      <div>
        <div class="col-md-12">
          <?php
$msg = $_GET['msg'];
    if ($msg=='1') 
        {
          echo '  <div class="callout callout-info ">
            <h4> Registrado!</h4>

            <p>   </p>
          </div>'; 
        }

        if ($msg=='2') 
        {
          echo '
            <div class="callout callout-info ">
            <h4> Cliente Registrado!</h4>

            <p>   </p>
          </div>'; 
        }
        if ($msg=='3') 
        {
          echo '
            <div class="callout callout-info ">
            <h4> Cliente Actualizado!</h4>

            <p>   </p>
          </div>'; 


 
        }
      ?>

          <div class="box">
            <div class="box-header">
              <a href="tipoinventarios">
              <button   class="btn btn-block btn-outline-info rounded-pill"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Registrar tipo inventarios </strong></h4></button>
              </a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Descripción</th>
                  <th>Nota</th>
                  <th>   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php

                    $ID = $_SESSION['ID'];

                   
 $contador= 0 ;                                                                
                        $queryList=mysqli_query($conn3,"SELECT * FROM  scategoria where usuario_id =$ID and Activo='1' ");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {
                                          $id      = $row_recordset32['id'];
                                          $descripcion      = $row_recordset32['descripcion'];
                                          $nota      = $row_recordset32['nota']; 
                                          $contador++;
 

                  echo '     <tr>
                  <td>'.$id.' </td>
                  <td>'.$descripcion.' </td>
                  <td>'.$nota.' </td>
                  
                  <td>    
                      
                   <a href="Informacion_Adicional_Departamento.php?Tabla=scategoria" class="btn btn-block btn-outline-info rounded-pill " title="Editar"><i class="fa fa-pencil"></i> Editar Departamentos</a> 
                  
 

                  </td>
           
                </tr>';

 }


 ?>


 
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Descripcion</th>
                  <th>Nota</th>
                  <th>   </th>
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