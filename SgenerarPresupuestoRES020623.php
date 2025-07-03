   <?php
    include 'header.php';
    include 'menu.php'; ?>


   <?php
    $clienteId = $_GET['clienteId'];
    $usuarioId = $_GET['usuarioId'];

    $ID_Usuario  =  $_SESSION['ID'];

    $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

    $queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $ID_Usuario");
    $nrowl = mysqli_num_rows($queryList);
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
      $moneda = $rowMotorizado['moneda'];
      $impuestoF = $rowMotorizado['impuestoF'];
    }






    $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
    $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
    $nrowl = mysqli_num_rows($queryList);
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
      $usuario_id = $rowMotorizado['usuario_id'];
      $nombre_cliente = $rowMotorizado['nombre_cliente'];
      $celular_cliente = $rowMotorizado['celular_cliente'];
      $ciudad_cliente = $rowMotorizado['ciudad_cliente'];
      $correo_cliente = $rowMotorizado['correo_cliente'];
      $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
      $id_uso_servicio = $rowMotorizado['id_uso_servicio'];
      $tipo_cliente = $rowMotorizado['tipo_cliente'];
      $fechar = $rowMotorizado['fechar'];
      $fecha_actualizado = $rowMotorizado['fecha_actualizado'];
      $activo = $rowMotorizado['activo'];
      $genero = $rowMotorizado['genero'];
      $direccion_cliente = $rowMotorizado['direccion_cliente'];
      $telefono_cliente = $rowMotorizado['telefono_cliente'];
      $edad_cliente = $rowMotorizado['edad_cliente'];
      $profesion_cliente = $rowMotorizado['profesion_cliente'];
      $acompananteFamiliar = $rowMotorizado['acompananteFamiliar'];
      $telefono_acompanante = $rowMotorizado['telefono_acompanante'];
      $antecedentes = $rowMotorizado['antecedentes'];
    }
    ?>


   <style type="text/css">
     .select2-container .select2-selection--single {
       height: 47px !important;
       padding: 15px !important;
     }
   </style>
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
       <h1>
         Generar Presupuesto

       </h1>
       <ol class="breadcrumb">
         <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
         <li><a href="#">Generar Presupuesto</a></li>


       </ol>
     </section>

     <!-- Main content -->
     <section class="content">
       <div class="row">
         <div class="col-xs-12">


           <div class="box">

             <!-- /.box-header -->
             <div class="box-body">


               <div class="form-row">
                 <div class="col-md-6">

                   <label for="nombre"><strong>Correo:</strong></label>
                   <label for="nombre"> <?php echo $correo_cliente; ?> </label>
                 </div>

                 <div class="col-md-6">
                   <label for="inputPassword4"><strong>Nombre:</strong></label>
                   <label for="nombre"><?php echo $nombre_cliente; ?> </label>
                 </div>

                 <div class="col-md-6">
                   <label for="inputAddress"><strong>Celular:</strong></label>
                   <label for="nombre"><?php echo $CODI_CLIENTE; ?></label>
                 </div>
                 <div class="col-md-6">
                   <label for="inputAddress"><strong>Ciudad:</strong></label>
                   <label for="nombre"><?php echo $ciudad_cliente; ?></label>
                 </div>
                 <div class="col-md-6">
                   <label for="inputAddress"><strong>Fecha Registro:</strong></label>
                   <label for="nombre"><?php echo $fechar; ?></label>
                 </div>
                 <div class="col-md-6">
                   <label for="inputAddress"><strong>Genero:</strong></label>
                   <label for="nombre"><?php echo $genero; ?></label>
                 </div>

                 <div class="col-md-6">
                   <label for="inputAddress"><strong> Dirección Cliente:</strong></label>
                   <label for="nombre"><?php echo $direccion_cliente; ?></label>
                 </div>
                 <div class="col-md-6">
                   <label for="inputAddress"><strong> Teléfono :</strong></label>
                   <label for="nombre"><?php echo $telefono_cliente; ?></label>
                 </div>
                 <div class="col-md-6">
                   <label for="inputAddress"><strong> Edad :</strong></label>
                   <label for="nombre"><?php echo $edad_cliente; ?></label>
                 </div>
                 <div class="col-md-6">
                   <label for="inputAddress"><strong> Profesión :</strong></label>
                   <label for="nombre"><?php echo $profesion_cliente; ?></label>
                 </div>


               </div>

               <h4 class="card-title">Agregar Item</h4>
               <br>



               <form action="guardarDetallePresupuesto.php" method="POST" name="formularioActualizarcliente">
                 <div class="form-row">


                   <div class="form-group col-md-4">



                     <input type="hidden" class="form-control input-lg" id="usuario_id" name="usuario_id" placeholder="ususario_id" value="<?php echo  $ususario_id ?>" required>
                     <select id="codigoProd" name="codigoProd" class="form-control select2" style="width: 100%;" required="required" onChange="cargarcosto();">
                       <option value="" selected="selected">Seleccione producto</option>
                       <?php

                        $queryList = mysqli_query($conn3, "SELECT * FROM sinvetrios order by descripcion");
                        $nrowl = mysqli_num_rows($queryList);
                        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                          $descripcion     = $row_recordset32['descripcion'];
                          $existencia      = $row_recordset32['existencia'];
                          $cliente_id      = $row_recordset32['cliente_id'];
                          $referencia      = $row_recordset32['referencia'];
                          $ID              = $row_recordset32['ID'];

                          echo "<option value='$ID'>$referencia | $descripcion | $existencia</option>";
                        }

                        ?>

                     </select>



                     <!--
 
                <input type="text" class="form-control input-lg" id="nombre_cliente" name="descripcion" placeholder="Descripcion del Producto o servicio"  required>
 
                <select name="descripcion" class="form-control select2" style="width: 100%;">
                  <option selected="selected" value="">Seleccione</option>
                 
                  <?php

                  $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
                  $queryList = mysqli_query($conn3, "SELECT * FROM listaServicios order by nombre");
                  $nrowl = mysqli_num_rows($queryList);
                  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $codigo = $rowMotorizado['codigo'];
                    $nombre = $rowMotorizado['nombre'];
                    $valor  = $rowMotorizado['valor'];

                    echo "<option value='$codigo - $nombre - $valor'>$codigo - $nombre - $valor</option>";
                  }
                  ?>



                </select>


-->


                   </div>

                   <div class="form-group col-md-2">

                     <div id="div-results-costo"></div>

                   </div>


                   <div class="form-group col-md-2">

                     <input type="number" class="form-control input-lg" id="1" name="cantidad" placeholder="cantidad" onChange="multiplicar();" required>
                   </div>




                   <div class="form-group col-md-2">
                     <input type="number" class="form-control input-lg" id="3" name="subTotal" placeholder="subTotal" step="0.01" required>
                   </div>
                   <div class="form-group col-md-2">
                     <center><button type="submit" class="btn btn-block btn-primary btn-lg">Guardar</button></center>
                   </div>


                   <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID'] ?>">
                   <input type="hidden" name="id_cliente" value="<?php echo $clienteId ?>">
                   




                   <input type="hidden" name="tipo_cliente" valur="1">

               </form>







             </div>
             <!-- /.box-body -->
           </div>
           <!-- /.box -->
         </div>







         <div class="col-xs-12 table-responsive">
           <table class="table table-striped">
             <thead>
               <tr>
                 <th>#</th>
                 <th>Descripción del producto</th>
                 <th>
                   <div align="Right">Cantidad</div>
                 </th>
                 <th>
                   <div align="Right">Precio</div>
                 </th>
                 <th>
                   <div align="Right">Total</div>
                 </th>
                 <th> </th>

               </tr>
             </thead>
             <tbody>
               <tr>
                 <?php

                  $ID = $_SESSION['ID'];

                  $resultado = mysql_query("SELECT * FROM  sDetalleOperPendites where   id_usuario =$ID and  id_cliente = $clienteId order by id");
                  //$resultado=mysql_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");
                  $check = mysql_num_rows($q);

                  while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) {
                    //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                    $Numero++;

                    echo '     <tr>
                  <td  width="5%">' . $Numero . ' </td>
                  <td width="50%">' . $fila[5] . ' </td>
                  <td width="5%"><div align="Right">' . $fila[4] . '</div></td>
                  <td width="20%"><div align="Right">' . $fila[6] . '   $</div></td>
                  <td width="20%"><div align="Right">' . $fila[9] . '   $</div></td>
                  <td width="5%"> <a href=borrarDetallePresupuesto.php?id=' . $fila[0] . '><i class="fa fa-trash"></i> </a>  </td>
           
                </tr>';

                    $totalCant += $fila[4];
                    $totalBase +=  $fila[6];
                    $total += $fila[9];
                  }


                  ?>
               </tr>


             </tbody>

             <thead>
               <!-- <tr>
                 <th> <strong> </strong> </th>
                 <td>
                   </th>
                 <th> </th>
                 <th> </th>
                 <th> </th>

               </tr> -->
               <tr>
                 <th width="5%"> </th>
                 <td width="50%"> <strong>
                     <div align="Right"> Totales </div>
                   </strong> </th>
                 <th width="5%">
                   <div align="Right"><?php echo $totalCant ?></div>
                   </td>
                 <th width="20%">
                   <div align="Right"><?php echo $totalBase . ' ' . $moneda; ?> </div>
                   </td>
                 <th width="20%">
                   <div align="Right"><?php echo $total . ' ' . $moneda; ?> </div>
                   </td>
                 <th width="5%"> </th>

               </tr>

               <?php
                if ($impuestoF > 0) {
                  $impuestoF2 = $impuestoF / 100;
                  $total1 =  $total * $impuestoF2;
                  $total =  $total1 + $total;


                ?>

                 <tr>
                   <th width="5%"> </th>
                   <td width="50%"> <strong>
                       <div align="Right"> I.T.B.M.S <?php echo $impuestoF ?>% </div>
                     </strong> </th>
                   <th width="5%">
                     <div align="Right"> </div>
                     </td>
                   <th width="20%">
                     <div align="Right"> </div>
                     </td>
                   <th width="20%">
                     <div align="Right"><?php echo $total . ' ' . $moneda; ?> </div>
                     </td>
                   <th width="5%"> </th>

                 </tr>

               <?php
                } ?>


             </thead>


           </table>

         </div>




         <form action="totalizarPresupuesto.php" method="POST" name="formularioActualizarcliente">
           <div class="form-row">

             <div align="left" class="form-group col-md-4">

               <label> Fecha de vencimiento</label>
               <input type="date" name="fechaVencimiento" placeholder="fecha Vencimiento" class="form-control input-lg" required>
               <br> <br>
               <center><button type="submit" class="btn btn-block btn-danger btn-sm"> <strong> Totalizar Presupuesto </strong> </button></center>

             </div>



             <div align="left" class="form-group col-md-4">
               <label> Observaciones o notas</label>
               <textarea id="nota" name="nota" class="textarea" placeholder="Observaciones o Notas" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

             </div>

             <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID'] ?>">
             <input type="hidden" name="id_cliente" value="<?php echo $clienteId ?>">
             <input type="hidden" name="sucursal" value="<?php echo $_SESSION["sucursal"] ?>">




             <input type="hidden" name="tipo_cliente" valur="1">

         </form>



         <!-- /.col -->
       </div>
       <!-- /.row -->
     </section>
     <!-- /.content -->
   </div>

   <?php include("footer.php") ?>




   <script type="text/javascript">
     function multiplicar() {
       m1 = document.getElementById("1").value;
       m2 = document.getElementById("2").value;
       r = m1 * m2;




       document.getElementById("3").value = r;
     }




     function cargarcosto() {
       var codigoProd = $("#codigoProd").val();
       var usuario_id = $("#usuario_id").val();

       $.ajax({
         type: "POST",
         url: "ajax_cargarPrecio.php",
         data: {
           codigoProd: codigoProd,
           usuario_id: usuario_id
         },
         success: function(response) {
           $('#div-results-costo').html(response);
         }
       });
     };

     function agergarItem() {

       // estas son las variables que enviamos

       var codigoProd = $("#codigoProd").val();
       var cantidad = $("#cantidad").val();
       var valor = $("#valor").val();

       var usuario_id = $("#usuario_id").val();

       // aqui enviamos el mensaje por medio de un arreglo     

       $.ajax({
         type: "POST",
         url: "ajax_agregarItem.php",
         data: {
           codigoProd: codigoProd,
           cantidad: cantidad,
           usuario_id: usuario_id,
           valor: valor
         },
         success: function(response) {
           $('#div-results').html(response);

           // aqui enviamos el mensaje por medio de un arreglo     



         }
       });
     };

     function eliminarItem() {

       // estas son las variables que enviamos

       var idOper = $("#idOper").val();

       var usuario_id = $("#usuario_id").val();

       // aqui enviamos el mensaje por medio de un arreglo     

       $.ajax({
         type: "POST",
         url: "eliminarItem.php",
         data: {
           idOper: idOper,
           usuario_id: usuario_id
         },
         success: function(response) {
           $('#div-results').html(response);

           // aqui enviamos el mensaje por medio de un arreglo     



         }
       });
     };






     function listaItem() {

       // estas son las variables que enviamos

       var usuario_id = $("#usuario_id").val();

       // aqui enviamos el mensaje por medio de un arreglo     

       $.ajax({
         type: "POST",
         url: "listaItem.php",
         data: {
           usuario_id: usuario_id
         },
         success: function(response) {
           $('#div-results').html(response);

           // aqui enviamos el mensaje por medio de un arreglo     



         }
       });
     };
     window.onload = listaItem;
   </script>