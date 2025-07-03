   <?php 
   include 'header.php';
   include 'menu.php';?>

 
<?php
            $clienteId = $_GET['clienteId']; 
         
            $ID_Usuario  =  $_SESSION['ID'];
            
            $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
            
            $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $ID_Usuario");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
                $moneda=$rowMotorizado['moneda'];
                $impuestoF=$rowMotorizado['impuestoF'];
            }
  


            $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
            $queryList=mysqli_query($conn3,"SELECT * FROM  v_clienteE where id=$clienteId");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
            $usuario_id=$rowMotorizado['id'];
                $nombre_cliente=$rowMotorizado['nombre'];
                    $celular_cliente=$rowMotorizado['celularResponsable'];
                $ciudad_cliente=$rowMotorizado['ciudad'];
                $correo_cliente=$rowMotorizado['correo'];
                $CODI_CLIENTE=$rowMotorizado['nit'];
                   $responsable=$rowMotorizado['responsable'];
          
                $direccion_cliente=$rowMotorizado['direccion'];
                $telefono_cliente=$rowMotorizado['telefono'];
           
          }
      ?>
     


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Generar factura
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="#">Generar factura</a></li>
        

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
      		      <label for="nombre"> <?php echo $correo_cliente;?>  </label>
      		    </div>

      		    <div class="col-md-6">
      		      <label for="inputPassword4"><strong>Nombre:</strong></label>
      		       <label for="nombre"><?php echo $nombre_cliente;?> </label>
      		    </div>
                <div class="col-md-6">
      		    	<label for="inputAddress"><strong>Ciudad:</strong></label>
      		    	<label for="nombre"><?php echo $ciudad_cliente;?></label>
      		  	</div>



      		  	  
      
            
      		    <div class="col-md-6">
      		    	<label for="inputAddress"><strong>NIT :</strong></label>
      		    	<label for="nombre"><?php echo $CODI_CLIENTE;?></label>
      		  	</div>



           
               <div class="col-md-6">
      		    	<label for="inputAddress"><strong>  Dirección Cliente:</strong></label>
      		    	<label for="nombre"><?php echo $direccion_cliente ;?></label>
      		  	</div>
               <div class="col-md-6">
      		    	<label for="inputAddress"><strong> Teléfono :</strong></label>
      		    	<label for="nombre"><?php echo $telefono_cliente ;?></label>
      		  	</div>


               <div class="col-md-6">
      		    	<label for="inputAddress"><strong> Responsable o Contacto :</strong></label>
      		    	<label for="nombre"><?php echo $responsable ;?></label>
      		  	</div>
               <div class="col-md-6">
      		    	<label for="inputAddress"><strong> Celular :</strong></label>
      		    	<label for="nombre"><?php echo $celular_cliente ;?></label>
      		  	</div>
              
               
      		  </div>
            
          <h4 class="card-title">Agregar Item</h4>                                 
          <br>
     


          <form action="guardarDetalleFactura.php" method="POST" name="formularioActualizarcliente">
            <div class="form-row">
      

              <div class="form-group col-md-5">

                <input type="text" class="form-control input-lg" id="nombre_cliente" name="descripcion" placeholder="Descripcion del Producto o servicio"  required>
              </div>

              <div class="form-group col-md-2">
                <input type="number" class="form-control input-lg" id="1" name="cantidad" placeholder="cantidad" onChange="multiplicar();" required>
              </div>


              <div class="form-group col-md-2">
                <input type="number" class="form-control input-lg" id="2" name="base" placeholder="precio" onChange="multiplicar();" required>
              </div>

              <div class="form-group col-md-2">
                <input type="number" class="form-control input-lg" id="3" name="subTotal" placeholder="subTotal" required>
              </div>
               <div class="form-group col-md-1">    
                <center><button type="submit" class="btn btn-block btn-primary btn-sm">Guardar</button></center>
              </div>
               
 
              <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID']?>">
              <input type="hidden" name="id_cliente" value="<?php echo $clienteId?>">
              
            

           
            
            <input type="hidden"  name="tipo_cliente"   valur="1">
            
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
              <th><div align="Right">Cantidad</div></th>
              <th><div align="Right">Precio</div></th>
              <th><div align="Right">Total</div></th>
              <th> </th>
               
            </tr>
            </thead>
            <tbody>
              <tr>
<?php
                     $ID = $_SESSION['ID'];

                    $resultado=mysql_query("SELECT * FROM  v_sDetalleOper where   id_usuario = $ID and  id_cliente = $clienteId and idOperacion = 0 order by id");
                    //$resultado=mysql_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");
                    $check=mysql_num_rows($q);

                    while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) {
                  //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                  $Numero++;

                  echo '     <tr>
                  <td  width="5%">'.$Numero.' </td>
                  <td width="50%">'.$fila[5].' </td>
                  <td width="5%"><div align="Right">'.$fila[4].'</div></td>
                  <td width="20%"><div align="Right">'.number_format($fila[6], 0, ',','.').'   $</div></td>
                  <td width="20%"><div align="Right">'.number_format($fila[9], 0, ',','.').'   $</div></td>
                  <td width="5%"> <a href=v_borrarDetalleFactura.php?id='.$fila[0].'><i class="fa fa-trash"></i> </a>  </td>
           
                </tr>';

              $totalCant += $fila[4];
              $totalBase +=  $fila[6];
              $total += $fila[9];

             

}
 

 ?>
           </tr>

 
            </tbody>

             <thead>
              <tr>
              <th> <strong>   </strong>  </th>
               <td> </th>
              <th> </th>
              <th> </th>
              <th> </th>
               
            </tr>
            <tr>
              <th width="5%">  </th>
               <td width="50%"> <strong> <div align="Right"> Totales  </div>  </strong>  </th>
              <th width="5%"><div align="Right"><?php echo $totalCant?></div></td>
              <th width="20%"><div align="Right"><?php echo number_format($totalBase, 0, ',','.').' '.$moneda;?>  </div></td>
              <th width="20%"><div align="Right"><?php echo number_format($total, 0, ',','.').' '.$moneda;?>  </div></td>
              <th width="5%"> </th>
               
            </tr>

<?php 
if ($impuestoF >0) {
$impuestoF2 = $impuestoF/100; 
$total1 =  $total*$impuestoF2;
$total =  $total1+$total;


?>

    <tr>
              <th width="5%">  </th>
               <td width="50%"> <strong> <div align="Right"> Total con impuesto <?php echo $impuestoF?>%   </div>  </strong>  </th>
              <th width="5%"><div align="Right"> </div></td>
              <th width="20%"><div align="Right">  </div></td>
              <th width="20%"><div align="Right"><?php echo $total.' '.$moneda;?>  </div></td>
              <th width="5%"> </th>
               
            </tr>

<?php 
}?>


            </thead>


          </table>

        </div>




        <form action="v_totalizarFactura.php" method="POST" name="formularioActualizarcliente">
            <div class="form-row">
      
<div align="left" class="form-group col-md-4">
  <label> Monto pagado </label>
  <input type="number" name="montoPagado" placeholder="Monto Pagado" class="form-control input-lg" value="0" required> <br>
  <label> Fecha de vencimiento</label>
  <input type="date" name="fechaVencimiento" placeholder="fecha Vencimiento" class="form-control input-lg" required>
  <br> <br>
  <center><button type="submit" class="btn btn-block btn-danger btn-sm"> <strong>  Totalizar factura  </strong> </button></center> 

</div> 
             
               
                  
<div align="left" class="form-group col-md-4">
<label> Observaciones o notas</label>
     <textarea id="nota" name="nota"  class="textarea" placeholder="Observaciones o Notas" 
     style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
             
              </div>   
 
              <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID']?>">
              <input type="hidden" name="id_cliente" value="<?php echo $clienteId?>">
              
            

           
            
            <input type="hidden"  name="tipo_cliente"   valur="1">
            
          </form>



        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>  
          
          
          
     

<?php include("footer.php")?>



 <script>
function multiplicar(){
  m1 = document.getElementById("1").value;
  m2 = document.getElementById("2").value;
  r = m1*m2;


  

  document.getElementById("3").value = r;
}

 
</script>