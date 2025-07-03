<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");


$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));




$cliente		= $_POST['identificacion'];




    $queryList1=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id =$cliente");

    //ECHO "SELECT * FROM  cliente where cliente_id =$cliente";

            $nrowl=mysqli_num_rows($queryList1);
            while($row2=mysqli_fetch_array($queryList1))
            {

            $nombre      =$row2['nombre_cliente'];
      
            $telefono=$row2['whatsapp'];

            $correo=$row2['correo_cliente'];
           


             }


ECHO '
 <div class="form-group">
                  <div class="input-icon">
                    Correo
                    <input type="text" class="form-control input-lg" name="correo" id="correo" placeholder="correo"  value="'.$correo.'" >
                  </div>
                </div> 
  
     <div class="form-group">
                  <div class="input-icon">Teléfono:<br>
                   ( Colocar indicativo del pais 593 + Número)
                    <input type="text" class="form-control input-lg" name="telefono" id="telefono" placeholder="telefono" value="'.$telefono.'" value="'.$indicativo.'" required>
                  </div>
                </div>               
               

';




?>