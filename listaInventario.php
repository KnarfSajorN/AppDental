   <?php 
   include 'header.php';
   include 'menu.php';?>

    <div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inventario
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Inventario</a></li>
      </ol>
    </section>

    <style>
    tr.even td {
    background-color: unset!important;
}
tr.odd td {
    background-color: unset!important;
}
  </style>

    <!-- Main content -->
    <section class="content">
      <div>
        <div class="col-xs-12">
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
            <div class="box-header row">
              <div class="col-md-12">

              <a href="inventario">
              <button class="btn btn-block btn-outline-info rounded-pill shadow m-1"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Registrar inventario </strong></h4></button>
              </a>

            </div>
            <div class="col-md-12">
              <br>
            </div>
            <div class="col-md-6">
              <a href="salidadeinventario">
              <button class="btn btn-block btn-outline-info rounded-pill shadow m-1"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Salida de inventario </strong></h4></button>
              </a>
            </div>

            <div class="col-md-6">
              <a href="entradadeinventario">
              <button class="btn btn-block btn-outline-info rounded-pill shadow m-1"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Entrada de inventario </strong></h4></button>
              </a>
            </div>
          </div>
            <!-- /.box-header -->



            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped" style="font-size: 16px;">
                <thead>
                <tr style="font-size: 13px;">
                  <th>ID</th>
                  <th>Descripción</th>
                  <th>Referencia</th>
                  <th>Tipo</th>
                  <th>Existencia</th>
                  <th size="1">Mínimo</th>
                  <th size="1">Máximo</th>
                  <th size="1">Costo</th>
                  <th size="1">Precio</th>
                  <th>Nota</th>
                  <th>Fecha de <br>vencimiento</th>
                  <th>   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php

                  $usuario_id = $_SESSION['ID'];


                  $contador= 0 ;                                                                
                  $queryList=mysqli_query($conn3,"SELECT * FROM  sinvetrios where usuario_id =$ID");
                  $nrowl=mysqli_num_rows($queryList);
                  while($row_recordset32=mysqli_fetch_array($queryList))
                  {



                    $ID      = $row_recordset32['ID'];

                    $descripcion      = $row_recordset32['descripcion'];
                    $referencia      = $row_recordset32['referencia'];
                    $tipo      = $row_recordset32['tipo'];
                    $existencia      = $row_recordset32['existencia'];
                    $minimo      = $row_recordset32['minimo'];
                    $maximo      = $row_recordset32['maximo'];
                    $costo      = $row_recordset32['costo'];
                    $precio      = $row_recordset32['precio'];
                    $fecha_vencimiento = $row_recordset32['fecha_vencimiento'];
                    $nota      = $row_recordset32['nota'];

                    $fecha_alerta_vencimiento = date("Y-m-d",strtotime($fecha_vencimiento."- 10 days"));
                    $fecha_actual = date("Y-m-d");


                   


                    $alerta='';
                    $contador='0';
                    if($existencia=='0')
                    {
                      $alerta='background: rgb(249,54,54);background:radial-gradient(circle, rgb(249 54 54 / 64%) 0%, rgba(249,54,54,1) 100%);';
                      $alerta_productos_vencido.=$descripcion.',';$contador="1";
                      echo '<script> alert("entro aqui");</script>';
                    }
                    elseif($existencia<=$minimo)
                    {
                      $alerta='background: rgb(248,249,54);background: radial-gradient(circle, rgba(248,249,54,0.6755077030812324) 0%, rgba(248,249,54,1) 100%);';
                      $alerta_productos.=$descripcion.',';
                      
                    }
                    

                    if( $fecha_actual >= $fecha_vencimiento)
                    {
                      if($contador<>"1"){$alerta='background: rgb(249,54,54);background:radial-gradient(circle, rgb(249 54 54 / 64%) 0%, rgba(249,54,54,1) 100%);';}
                      $alerta_productos_fecha_vencido.=$descripcion.',';
                    }
                    elseif(($fecha_actual >= $fecha_alerta_vencimiento) AND ($fecha_actual <= $fecha_vencimiento))
                    {
                      if($contador<>"1"){$alerta='background: rgb(248,249,54);background: radial-gradient(circle, rgba(248,249,54,0.6755077030812324) 0%, rgba(248,249,54,1) 100%);';}
                      $alerta_productos_fecha.=$descripcion.',';
                    }

                    $querycat=mysqli_query($conn3,"SELECT * FROM  scategoria where usuario_id =$usuario_id and id = $tipo");
                    $nrowl=mysqli_num_rows($querycat);
                    while($row_cat=mysqli_fetch_array($querycat))
                    {

                      $tipodescripcion      = $row_cat['descripcion'];
                    }
                    $contador++;


                    echo '     <tr style="'.$alerta.'">
                    <td>'.$ID.' </td>
                    <td>'.$descripcion.' </td>
                    <td>'.$referencia.' </td>
                    <td>'.$tipodescripcion.' </td>
                    <td>'.$existencia.' </td>
                    <td>'.$minimo.' </td>
                    <td>'.$maximo.' </td>
                    <td>'.$costo.' </td>
                    <td>'.$precio.' </td>

                    <td>'.$nota.' </td>
                    <td>'.$fecha_vencimiento.' </td>
                    <td>    

                    <a href="editarInventario.php?ID='.$ID.'" title="Editar Producto"><i class="fa fa-pencil"></i> </a>  

                    </td>

                    </tr>';

                  }

                  if($alerta_productos<>'')
                  {
                    $mensaje.= 'Los siguientes productos tienen pocas existencias :\n '.$alerta_productos;
                    $mensaje_numero='1';
                  }

                  if($alerta_productos_vencido<>'')
                  {
                    $mensaje.= '\nLos siguientes productos no tiene existencias :\n '.$alerta_productos_vencido;
                    $mensaje_numero='1';
                  }

                  if($alerta_productos_fecha_vencido<>'')
                  {
                    $mensaje.= '\nLos siguientes productos están caducados :\n '.$alerta_productos_fecha_vencido;
                    $mensaje_numero='1';
                  }

                  if($alerta_productos_fecha<>'')
                  {
                    $mensaje.= '\nLos siguientes productos tienen pronta fecha de caducidad :\n '.$alerta_productos_fecha;
                    $mensaje_numero='1';
                  }

                  if($mensaje_numero=='1')
                  {
                    echo '<script language="javascript">';
                    echo 'alert("'.$mensaje.'"  )';
                    echo '</script>';
                  }

                  ?>


                </tbody>
                <tfoot>
                <tr style="font-size: 13px;">
                <th>ID</th>
                  <th>Descripción</th>
                  <th>referencia</th>
                  <th>tipo</th>
                  <th>existencia</th>
                  <th>mínimo</th>
                  <th>máximo</th>
                  <th>costo</th>
                  <th>precio</th>
                  <th>Nota</th>
                  <th>fecha de <br>vencimiento</th>
                  <th>   </th>
                </tr>
                <tr style="font-size: 13px;">
                  <th colspan="6"><i class="fa fa-circle" style="color: red"aria-hidden="true"></i>Sin Existencias/Fecha Caducada</th>
                  <th colspan="6"><i class="fa fa-circle" style="color: #fff037" aria-hidden="true"></i>Pocas Existencias/Fecha Próxima a Caducar</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->

















            <!--
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Descripcion</th>
                  <th>referencia</th>
                  <th>tipo</th>
                  <th>existencia</th>
                  <th>minimo</th>
                  <th>maximo</th>
                  <th>costo</th>
                  <th>precio</th>
                  <th>Nota</th>
                  <th>   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php

                    $usuario_id = $_SESSION['ID'];

                   
 $contador= 0 ;                                                                
                        $queryList=mysqli_query($conn3,"SELECT * FROM  sinvetrios where usuario_id =$ID");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {



                                          $ID      = $row_recordset32['ID'];
                                         
                                          $descripcion      = $row_recordset32['descripcion'];
                                          $referencia      = $row_recordset32['referencia'];
                                          $tipo      = $row_recordset32['tipo'];
                                          $existencia      = $row_recordset32['existencia'];
                                          $minimo      = $row_recordset32['minimo'];
                                          $maximo      = $row_recordset32['maximo'];
                                          $costo      = $row_recordset32['costo'];
                                          $precio      = $row_recordset32['precio'];
                                          
                                          $nota      = $row_recordset32['nota'];


                                    $querycat=mysqli_query($conn3,"SELECT * FROM  scategoria where usuario_id =$usuario_id and id = $tipo");
                                      $nrowl=mysqli_num_rows($querycat);
                                      while($row_cat=mysqli_fetch_array($querycat))
                                      {
                                          
                                          $tipodescripcion      = $row_cat['descripcion'];
                                      }


                                          $contador++;
 
  
                  echo '     <tr>
                  <td>'.$ID.' </td>
                  <td>'.$descripcion.' </td>
                  <td>'.$referencia.' </td>
                  <td>'.$tipodescripcion.' </td>
                  <td>'.$existencia.' </td>
                  <td>'.$minimo.' </td>
                  <td>'.$maximo.' </td>
                  <td>'.$costo.' </td>
                  <td>'.$precio.' </td>
                  
                  <td>'.$nota.' </td>
                  
                  <td>    
                      
                   <a href="editarInventario.php?ID='.$ID.'" title="Editar Cliente"><i class="fa fa-pencil"></i> </a>  
                  
 

                  </td>
           
                </tr>';

 }


 ?>

 
                </tbody>
                <tfoot>
                <tr>
                <th>ID</th>
                  <th>Descripcion</th>
                  <th>referencia</th>
                  <th>tipo</th>
                  <th>existencia</th>
                  <th>minimo</th>
                  <th>maximo</th>
                  <th>costo</th>
                  <th>precio</th>
                  <th>Nota</th>
                  <th>   </th>
                </tr>
                </tfoot>
              </table>
            </div>-->
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