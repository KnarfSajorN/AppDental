<?php include 'header.php';
include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        
         <li  class="active"> Registro de Medicamento </li>
      </ol>
    </section>
  
<br>      
     
<section class="content">
 <?php
     $msg = $_GET['msg'];
    if ($msg=='1') 
        {
          echo '  <div class="callout callout-info">
            <h4> Medicamento Registrado! </h4>

            <p>   </p>
          </div>'; 
        }

        if ($msg=='2') 
        {
          echo '
            <div class="callout callout-danger">
            <h4> Medicamento Eliminado! </h4>

            <p>   </p>
          </div>'; 
        }
 
      ?>
<div  class="box box-info" align="center">
<br> 
<br> 
 <div class="card-body">
  <div class="content">
          <h4 class="card-title">  Registro de Medicamentos  </h4>
          <br>
          <form action="GuardarMedicamento.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
            <div class="form-row">

              <div class="form-group col-md-12">
                <div align="left"> Nombre del Producto </div>
                
                <input type="text" class="form-control input-lg" id="nombre_medicamento" name="nombre_medicamento" placeholder="Nombre Medicamento"  required>
              </div>

              <div class="form-group col-md-12">
                <div align="left"> Concentracion </div>
                
                <input type="text" class="form-control input-lg" id="concentracion_medicamento" name="concentracion_medicamento" placeholder="Nombre Medicamento"  required maxlength="70" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
              </div>


              <br>
              <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['ID']?>">
              <center><button type="submit" class="btn btn-block btn-primary btn-sm">Guardar</button></center>
              <br>
              <input type="hidden"  name="tipo_cliente"   valur="1">
            </div>
            
          </form>
    </div>
        </div>
  


</div>
 
<div class="box box-info">
  <div class="content table-responsive">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre Medicamento</th>
        <th>Concentracion</th>
        <th>   </th>

      </tr>
    </thead>
    <tbody>
      <?php

      $usuario_id = $_SESSION['ID'];


      $contador= 0 ;                                                                
      $queryList=mysqli_query($conn3,"SELECT * FROM  pos");
      $nrowl=mysqli_num_rows($queryList);
      while($row_recordset32=mysqli_fetch_array($queryList))
      {

        $id      = $row_recordset32['id'];
        $descripcion      = $row_recordset32['descripcion'];
        $concentracion      = $row_recordset32['concentracion'];

        echo '     <tr>
        <td>'.$id.' </td>
        <td>'.$descripcion.' </td>
        <td>'.$concentracion.' </td>
        <td>    

        <a href="EliminarMedicamento.php?id='.$id.'" title="Eliminar Medicamento"><i class="fa fa-times"></i> </a>  

        </td>

        </tr>';

      }


      ?>


    </tbody>
    <tfoot>
      <tr>
        <th>ID</th>
        <th>Nombre Medicamento</th>
        <th>   </th>
      </tr>
    </tfoot>
  </table>
</div>
</div>


</section>
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

<?php include 'footer.php'?>