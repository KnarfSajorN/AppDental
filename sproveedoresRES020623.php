   <?php
    include 'header.php';
    include 'menu.php';

    $idproveedor = 0;
    $idproveedor = $_GET['idproveedor'];

    $IDconfig = $_SESSION['ID'];


    $msg = $_GET['msg'];
    if ($msg == 1) {
      $respuesta = ' 
          <div class="callout callout-info">
          <h4>Registrado</h4>
           <p></p>
        </div>';
    } elseif ($msg == 2) {

      $respuesta = ' 
          <div class="callout callout-danger">
          <h4>Código duplicado</h4>
           <p></p>
        </div>';
    } elseif ($msg == 3) {

      $respuesta = ' 
          <div class="callout callout-info">
          <h4>Código borrado</h4>
           <p></p>
        </div>';
    } elseif ($msg == 4) {

      $respuesta = ' 
          <div class="callout callout-danger">
          <h4>Código usado no es posible borrarlo</h4>
           <p></p>
        </div>';
    } elseif ($msg == 5) {

      $respuesta = ' 
          <div class="callout callout-info">
          <h4>Código actualizado </h4>
           <p></p>
        </div>';
    }




    if (isset($_GET['editar_proveedor'])) {



      $codigo     = mysql_real_escape_string(htmlspecialchars(trim($_GET['editar_proveedor'])));

      $usuario_id = mysql_real_escape_string(htmlspecialchars(trim($_GET['usuario_id'])));

      $proveedor = $usuario_id . 'proveedor';



      $queryList = mysqli_query($conn3, "SELECT * FROM  sproveedores where id = '$codigo'");

      $nrowl = mysqli_num_rows($queryList);

      while ($rowMotorizado = mysqli_fetch_array($queryList)) {

        $nombre = $rowMotorizado['nombre'];
        $rut = $rowMotorizado['rut'];
        $correo = $rowMotorizado['correo'];

        $direccion = $rowMotorizado['direccion'];
        $telefono = $rowMotorizado['telefono'];
        $vendedor = $rowMotorizado['vendedor'];
        $nota = $rowMotorizado['nota'];
        $idE = $rowMotorizado['id'];
      }
    }


    ?>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">

       <ol class="breadcrumb">
         <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
         <li><a href="entradadeinventario"><i class="fa fa-gears"></i> Entrada de inventarios</a></li>
         <li><a href="#">Proveedores</a></li>


       </ol>
     </section>

     <!-- Main content -->
     <section class="content">
       <div class="row">
         <div class="col-xs-12">


           <div class="card-body">
             <h4 class="card-title">Proveedores</h4>
             <br>




             <form action="proveedores" method="POST">
               <div class="form-row">
                 <div class="col-md-12">
                   <?php echo $respuesta; ?>
                 </div>
                 <div class="form-group col-md-3">
                   <!-- Fecha para verificar disponiblidad   -->
                   NIT


                   <input type="text" class="form-control input-lg" name="rut" value="<?php echo $rut ?>" pattern="[A-Za-z0-9_-]{1,15}" id="txtRut" onblur="onRutBlur(this);" required />


                   <div id="div-results"></div>

                 </div>
                 <div class="form-group col-md-9">
                   Nombre
                   <input type="text" class="form-control input-lg" name="nombre" value="<?php echo $nombre ?>" id="descripcion" required>
                   <div id="div-resultsHora"></div>
                 </div>







                 <div class="form-group col-md-4">
                   Correo
                   <input type="email" class="form-control input-lg" name="correo" id="correo" value="<?php echo $correo ?>">
                 </div>
                 <div class="form-group col-md-4">
                   Teléfono
                   <input type="text" class="form-control input-lg" name="telefono" id="telefono" value="<?php echo $telefono ?>">
                 </div>
                 <div class="form-group col-md-4">

                   Vendedor

                   <input type="text" class="form-control input-lg" name="vendedor" id="vendedor" value="<?php echo $vendedor ?>">
                 </div>




                 <div class="form-group col-md-6">
                   Dirección

                   <input type="text" class="form-control input-lg" name="direccion" id="direccion" value="<?php echo $direccion ?>">
                 </div>



                 <div class="form-group col-md-6">
                   Notas

                   <input type="text" class="form-control input-lg" name="nota" id="nota" value="<?php echo $nota ?>">
                 </div>


                 <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

                 <input type="hidden" name="id" value="<?php echo $idE ?>">

               </div>

               <center>
                 <?php
                  if ($idE > 0) {
                    echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="actualizar_proveedor"> <h4> <strong> Actualizar   </strong> </h4> </button></center>';
                  } else {
                    echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="registro_proveedor"> <h4> <strong>  Guardar  </strong> </h4> </button></center>';
                  }
                  ?>


             </form>


           </div>


           <br>
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
                 <tr>

                   <th class="text-center">Nombre</th>
                   <th class="text-center">RUT </th>
                   <th class="text-center">Correo </th>
                   <th class="text-center">Teléfono</th>
                   <th class="text-center">Vendedor</th>
                   <th class="text-center">Dirección</th>
                   <th class="text-center"> </th>

                 </tr>
               </thead>
               <tbody>
                 <?php

                  $ID = $_SESSION['ID'];

                  $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));


                  $queryListA = mysqli_query($conn3, "SELECT * FROM  sproveedores where Activo = 1 order by nombre");
                  //  $queryListA=mysqli_query($conn3,"SELECT * FROM  sproveedores where usuario_id = '$ID'  order by nombre");



                  $nrowl = mysqli_num_rows($queryListA);

                  while ($row_recordset32A = mysqli_fetch_array($queryListA)) {
                    $id = $row_recordset32A['id'];
                    $nombre = $row_recordset32A['nombre'];
                    $rut = $row_recordset32A['rut'];
                    $correo = $row_recordset32A['correo'];

                    $telefono = $row_recordset32A['telefono'];

                    $vendedor = $row_recordset32A['vendedor'];
                    $direccion = $row_recordset32A['direccion'];
                    $nota = $row_recordset32A['nota'];






                    echo '      
                      <tr>
                      <td> ' . $nombre . '</td>
                      <td> ' . $rut . '</td>
                      <td> ' . $correo . '</td>
                      <td> ' . $telefono . '</td>
                      <td> ' . $vendedor . '</td>
                      <td> ' . $direccion . '</td>
                     
                      <td>

                      <form method>
                      <font color="#04CC05"> <a href="proveedores?borrar_proveedor=' . $id . '&usuario_id=' . $ID . '"> <i class="fa fa-trash" title="Borrar" name="Borrar"></i>  </a></font> |
                      <font color="#04CC05"> <a href="proveedores?editar_proveedor=' . $id . '&usuario_id=' . $ID . '"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i>  </a></font>
                      </td>
                      </tr>';
                  }


                  ?>



               </tbody>
               <tfoot>
                 <tr>

                   <th class="text-center">Nombre</th>
                   <th class="text-center">RUT </th>
                   <th class="text-center">Correo </th>
                   <th class="text-center">Teléfono</th>
                   <th class="text-center">Vendedor</th>
                   <th class="text-center">Dirección</th>
                   <th class="text-center"> </th>

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

   <!-- Funciona para consultar disponibilidad -->

   <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
   <script type="text/javascript">
     function validar() {
       // estas son las variables que enviamos

       var codigo = $("#codigo").val();
       var usuario_id = $("#usuario_id").val();


       // aqui enviamos el mensaje por medio de un arreglo     

       $.ajax({
         type: "POST",
         url: "ajax_proveedor_verificar.php",
         data: {
           codigo: codigo,
           usuario_id: usuario_id
         },
         success: function(response) {
           $('#div-results').html(response);

         }
       });
     };
   </script>