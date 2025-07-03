<?php
date_default_timezone_set('America/Bogota');
 
include("funciones/funciones.php");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


  

    $metodo 	= $_POST['metodo'];
   
    $usado  = $_POST['usado'];
    $salud  = $_POST['salud'];
    $economica = $_POST['economica'];

     $estilo = $_POST['estilo'];
     

 $elegible = $_POST['elegible'];
 $observacion = $_POST['observacion'];

      
 $fechar                = date("Y-m-d");
    $usuario_id 	= $_POST['usuario_id'];
    $idcliente     = $_POST['idcliente'];
    $idR          = $_POST['idMetodo'];
 






 mysqli_query($conn3, "INSERT INTO metodos (usuario_id, cliente_id, metodo, usado, salud, economica, estilo, elegible, observacion, fecha, idMetodo) 
                    VALUES ('$usuario_id','$idcliente', '$metodo','$usado', '$salud'  ,'$economica',  '$estilo', '$elegible', '$observacion','$fechar', '$idR');");
  

echo "INSERT INTO metodos (usuario_id, cliente_id, metodo, usado, salud, economica, estilo, elegible, observacion, fecha, idMetodo) 
                    VALUES ('$usuario_id','$idcliente', '$metodo','$usado', '$salud'  ,'$economica',  '$estilo', '$elegible', '$observacion','$fechar', '$idR');";
  
  
 



 
echo '<h6><table border="1" style="undefined;table-layout: fixed; width: 100%">
<tr> <th>  Metodo  </th> <th> Usado antes </th> <th> salud </th> <th> Ecónomica </th> <th> Estilo vida </th> <th> Elegible </th> <th> Observación</th>  ';
$cont = 0;
$queryList=mysqli_query($conn3,"SELECT * FROM  metodos where cliente_id ='$idcliente' and idMetodo= '$idR'");

//echo "SELECT * FROM  operacionRecetario  where usuario_id = '$usuario_id'  and cliente_id ='$idcliente' and idReceta= '$idR'";
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
		$cont++;
	$idOper1     =$rowMotorizado['id'];
	$metodo =$rowMotorizado['metodo'];
	$usado  =$rowMotorizado['usado'];
	$salud  =$rowMotorizado['salud'];
	$economica    =$rowMotorizado['economica'];
	$estilo   =$rowMotorizado['estilo'];
	$elegible    =$rowMotorizado['elegible'];
	$observacion   =$rowMotorizado['observacion'];
	




echo '<tr> <th> <input type="hidden"  value="'.$idOper1.'" class="form-control input-lg" id="idOper'.$cont.'" name="idOper" >   <a href="#"  onclick="eliminarItem'.$cont.'();"> <font size="5">  </font> </a>    
	'.$metodo.'</th><th>'.$usado.'  </th> <th>'.$salud.'  </th> <th> '.$economica.'</th> <th> '.$estilo.'</th> <th> '.$elegible.'</th> <th> '.$observacion.'</th>
	';

}
//echo '<tr> <th>   </th> <th> Totales </th> <th> '.$cantidadT.' </th><th> '.$costoT.' </th><th>  '.$precioT.' </th>';
	    
   echo '</table></h6>';


?>