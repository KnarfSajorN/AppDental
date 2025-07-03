<?php

/*
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
*/

   

        // datos del cliente y usuario

        $fechaRegistro           = date("Y-m-d H:i:s");
        $idOperacion             = 0;
        $idProducto              = 0;
        $impuesto                = 0;
        $totalbase               = 0;
        $cantidad                = $_POST['cantidad'];
        $base                    = $_POST['base'];
        $descripcion             = $_POST['descripcion'];
        $subTotal                = $_POST['subTotal'];
        $id_usuario              = $_POST['id_usuario'];
        $id_cliente              = $_POST['id_cliente'];
        $tipo_inv                    = $_POST['tipo_inv'];


        ECHO '>>>>>>>>>>>>'.$tipo_inv;

        
/*
        $chekUsuario = "SELECT * from envioEmbarcador where correo = '$correoCliente'";
        $resultChekusuario = mysql_query ($chekUsuario, $con) or die ( mysql_error());
     
        $usuarioExiste = mysql_num_rows($resultChekusuario);
         echo "3  ";
        if($usuarioExiste>0){
          echo "4  ";
            echo "<script language='Javascript'> window.location='agregarClientes.php?msg=1';
                </script>"; 
        }
        else{
 */           
        
/*

INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente) 
VALUES                    ('$idOperacion','$fechaRegistro', '$idProducto','$cantidad','$descripcion','$base','$impuesto', '$totalbase' '$subTotal', '$id_usuario', '$id_cliente', '1');
                                                                                    
*/
                //insetamos el usuario
                    $queryUsuario = "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente, tipo) 
                                          VALUES ('$idOperacion','$fechaRegistro', '$idProducto','$cantidad','$descripcion','$base','$impuesto', '$totalbase', '$subTotal', '$id_usuario', '$id_cliente', $tipo);";
              
 /*             
  echo "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente, tipo) 
                                          VALUES ('$idOperacion','$fechaRegistro', '$idProducto','$cantidad','$descripcion','$base','$impuesto', '$totalbase', '$subTotal', '$id_usuario', '$id_cliente', '$tipo');";             
              
              
                    mysql_query($queryUsuario,$con) or die(mysql_error());



/*



 
echo'

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
              <tr>';
 

                    $ID = $_SESSION['ID'];

                    $resultado=mysql_query("SELECT * FROM  sDetalleOperPendites where   id_usuario =$ID and  id_cliente = $clienteId order by id");
                    //$resultado=mysql_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");
                    $check=mysql_num_rows($q);

                    while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) {
                  //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                  $Numero++;

                  echo '     <tr>
                  <td  width="5%">'.$Numero.' </td>
                  <td width="50%">'.$fila[5].' </td>
                  <td width="5%"><div align="Right">'.$fila[4].'</div></td>
                  <td width="20%"><div align="Right">'.$fila[6].'   $</div></td>
                  <td width="20%"><div align="Right">'.$fila[9].'   $</div></td>
                  <td width="5%"> <a href=borrarDetalleFactura.php?id='.$fila[0].'><i class="fa fa-trash"></i> </a>  </td>
           
                </tr>';

              $totalCant += $fila[4];
              $totalBase +=  $fila[6];
              $total += $fila[9];

             

}
 

 
echo'       </tr>

 
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
              <th width="5%"><div align="Right">'.$totalCant.'</div></td>
              <th width="20%"><div align="Right">'.$totalBase.' '.$moneda.'  </div></td>
              <th width="20%"><div align="Right">'.$total.' '.$moneda.'  </div></td>
              <th width="5%"> </th>
               
            </tr>';

 
if ($impuestoF >0) {
$impuestoF2 = $impuestoF/100; 
$total1 =  $total*$impuestoF2;
$total =  $total1+$total;


 

echo '    <tr>
              <th width="5%">  </th>
               <td width="50%"> <strong> <div align="Right"> Total con impuesto '.$impuestoF.'%   </div>  </strong>  </th>
              <th width="5%"><div align="Right"> </div></td>
              <th width="20%"><div align="Right">  </div></td>
              <th width="20%"><div align="Right">'.$total.' '.$moneda.'</div></td>
              <th width="5%"> </th>
               
            </tr>':

  
} 


    echo'        </thead>


          </table>

        </div>';







                                                                          
               //    echo "<script language='Javascript'> window.location='SgenerarFactura.php?clienteId=$id_cliente';</script>"; 
   //     }















*/










?>