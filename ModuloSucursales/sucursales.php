   <?php
    include 'header.php';
    include 'menu.php';

    $idsucursales = 0;
    $idsucursales = $_GET['idsucursales'];

    $IDconfig = $_SESSION['ID'];



    if ($clienteId > 0) {

      $host = 'localhost';
      $userdb = 'medicaso_rootBase';
      $pass2 = '5qA?o]t6d-h25qA?o]t6d-h2';
      $DB = 'medicaso_ps_pe757';

      $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

      $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");

      $nrowl = mysqli_num_rows($queryList);

      while ($rowMotorizado = mysqli_fetch_array($queryList)) {

        $usuario_id = $rowMotorizado['usuario_id'];
        $nombre_cliente = $rowMotorizado['nombre_cliente'];
      }


      //     $_SESSION['NOMBRE_USUARIO']

    }


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




    if (isset($_GET['editar_sucursales'])) {



      $id     = mysql_real_escape_string(htmlspecialchars(trim($_GET['editar_sucursales'])));




      $queryList = mysqli_query($conn3, "SELECT * FROM sucursales where id = '$id' and idUsuario = $IDconfig");
      $nrowl = mysqli_num_rows($queryList);
      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $descripcionE = $rowMotorizado['descripcion'];
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
         <li><a href="config"><i class="fa fa-gears"></i> Perfil / Configuración </a></li>
         <li><a href="#">Lista sucursales</a></li>


       </ol>
     </section>

     <!-- Main content -->
     <section class="content">
       <div class="row">
         <div class="col-xs-12">


           <div class="card-body">
             <h4 class="card-title">Lista sucursales</h4>
             <br>




             <form action="sucursales" method="POST">
               <div class="form-row">
                 <div class="col-md-12">
                   <?php echo $respuesta; ?>
                 </div>



                 <?php
                  if ($idE > 0) {

                    echo '<input type="hidden" class="form-control input-lg" name="codigo"  id="codigo"   value="' . $codigoE . '"    required>';
                  }

                  ?>







               </div>
               <div class="form-group col-md-12">
                 Descripción
                 <input type="text" class="form-control input-lg" name="descripcion" value="<?php echo $descripcionE ?>" id="descripcion" required>
                 <div id="div-resultsHora"></div>
               </div>

               <input type="hidden" name="idUsuario" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

               <input type="hidden" name="id" value="<?php echo $idE ?>">

           </div>

           <center>
             <?php
              if ($idE > 0) {
                echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="actualizar_sucursales"> <h4> <strong> Actualizar   </strong> </h4> </button></center>';
              } else {
                echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="registro_sucursales"> <h4> <strong>  Guardar  </strong> </h4> </button></center>';
              }
              ?>


             </form>
             <br>
             <br>


         </div>

         <div class="box-body">
           <table id="example1" class="table table-bordered table-striped">
             <thead>
               <tr>


                 <th class="text-center" width="25%">Sucursal </th>
                 <th class="text-center" width="5%"> </th>
                 <th class="text-center" width="10%"> Whatsapp</th>
                 <th class="text-center" width="35%"> Logo </th>
                 <th class="text-center" width="2%"> Firma </th>

               </tr>
             </thead>
             <tbody>
               <?php

                $ID = $_SESSION['ID'];

                $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));


                $queryListA = mysqli_query($conn3, "SELECT * FROM  sucursales where idUSuario = $IDconfig order by descripcion");


                $nrowl = mysqli_num_rows($queryListA);

                while ($row_recordset32A = mysqli_fetch_array($queryListA)) {
                  $id = $row_recordset32A['id'];

                  $descripcion = $row_recordset32A['descripcion'];
                  $logoF = $row_recordset32A['logoF'];
                  $firmaE = $row_recordset32A['firma'];
                  $whatsapp = $row_recordset32A['whatsapp'];


                  echo '      
                      <tr>
                      
                      <td> ' . $descripcion . '</td>
                     
                      <td>

                      
                      <font color="#04CC05"> <a href="sucursales?editar_sucursales=' . $id . '&usuario_id=' . $ID .
                    '"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i>  </a></font>

                      </td>


<td>

                        <form action="guardarWhatsapp.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" class="form-control input-lg" name="usuarioId" value="' . $id . '">
     
          <div class="form-row">


          
          
            <input type="text" class="form-control input-lg" name="whatsapp"  id="whatsapp" value="'.$whatsapp.'" required>';



                  //         if (strlen($firmaE) > 0) {
                  //           echo '<img src="' . $Base . '/FirmasReg/' . $firmaE . '">';
                  //         } else {

                  //           echo '<img src="' . $Base . '/FirmasReg/firmabasica.jpg">';
                  //         }










                  echo  '<button type="submit" class="btn btn-block btn-primary btn-sm" id="registro_usuario" name="registro_usuario"><h5> Actualizar </h5></button>

          </div>

      </form>

                    
                      
                      </td>
                           <td>

                        <form action="guardarLogos.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" class="form-control input-lg" name="usuarioId" value="' . $id . '">
     
          <div class="form-row">


          
          <div align="left"> <font color="red" size="1"> Tamaño sugerido 500px/500px  </font></div>
          <input type="file" class="form-control input-lg"  name="imagen">';



                  if (strlen($logoF) > 0) {
                    echo  '<img src="' . $Base . '/logos/' . $logoF . '"  height="20%" width="20%">';
                  } else {
                    echo '';
                  }






                  echo  '<button type="submit" class="btn btn-block btn-primary btn-sm" id="registro_usuario" name="registro_usuario"><h5> Actualizar </h5></button>

          </div>

      </form>

                    
                      
                      </td>






            <td>

                        <form action="guardarFirmas.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" class="form-control input-lg" name="usuarioId" value="' . $id . '">
     
          <div class="form-row">


          
          <div align="left"> <font color="red" size="1"> Tamaño sugerido 200px/200px  </font></div>
          <input type="file" class="form-control input-lg"  name="imagen2">';



                  if (strlen($firmaE) > 0) {
                    echo '<img src="' . $Base . '/FirmasReg/' . $firmaE . '">';
                  } else {

                    echo '<img src="' . $Base . '/FirmasReg/firmabasica.jpg">';
                  }










                  echo  '<button type="submit" class="btn btn-block btn-primary btn-sm" id="registro_usuario" name="registro_usuario"><h5> Actualizar </h5></button>

          </div>

      </form>

                    
                      
                      </td>













                      </tr>';
                }
                ?>



             </tbody>
             <tfoot>
               <tr>

                 <th class="text-center">Descripción </th>

                 <th class="text-center"> </th>
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