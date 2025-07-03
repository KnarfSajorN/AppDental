
  <!-- Left side column. contains the logo and sidebar -->
   <?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registrar Orden Lab.
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Registrar Orden Lab.</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <?php
$msg = $_GET['msg'];
    if ($msg=='1') 
        {
          echo '  <div class="callout callout-info ">
            <h4> Cliente ya Registrado!</h4>

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
      ?>

          <div class="box">
           
           

            <!-- /.box-header -->
            <div class="box-body">

               <div class="col-xs-6">

               <a href="registroDeExamenes">
              <button   class="btn btn-block btn-primary btn-sm"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Registrar Tipo de examenes </strong></h4></button>
              </a>
            </div>

               <div class="col-xs-6">

               <a href="cargar_resultado.php">
              <button   class="btn btn-block btn-primary btn-sm"><h4> <strong>   Ordenes pendientes por carga de resultado </strong></h4></button>
              </a>
            </div>     
               <div class="col-xs-12">

<br>

   </div> 
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Celular</th>
                  <th>Email</th>
                  <th>Telefono Fijo</th>
                  <th>   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php

                    $ID = $_SESSION['ID'];

                    $resultado=mysql_query("SELECT * FROM  cliente where usuario_id =$ID order by cliente_id");
                    //$resultado=mysql_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");
                    $check=mysql_num_rows($q);

                    while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) {
                  //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                  

                  echo '     <tr>
                  <td>'.$fila[2].' </td>
                  <td>'.$fila[3].'</td>
                  <td>'.$fila[5].'</td>
                  <td>'.$fila[13].'</td>
                  <td>';

                  echo '<a href="ordenLaboratorio.php?clienteId='.$fila[0].'"><button type="button" class="btn btn-block btn-primary btn-sm">Generar Orden Lab.</button></a>';

                  echo '</td>
           
                </tr>';

 }


 ?>
 






 <a href=""></a>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Celular</th>
                  <th>Email</th>
                  <th>Telefono Fijo</th>
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