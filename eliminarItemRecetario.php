<?php
date_default_timezone_set('America/Bogota');
 
include("funciones/funciones.php");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

    $idOper 	= $_POST['idOper'];
 
    $usuario_id 	= $_POST['usuario_id'];
    $idReceta 	= $_POST['idReceta'];
      $idcliente  = $_POST['idcliente'];
      //$idR  = $_POST['idR'];
      
 
 mysqli_query($conn3, "delete from operacionRecetario where  id = $idOper;");

  mssql_query("delete from operacionRecetario where  id = $idOper;");

//echo "delete from operacionRecetario where  id = $idOper;";
 
 
 
echo '<br><label style="font-size: 30px;">Medicamentos Generados </label><table class="table">
<thead class="table-light" ><tr> <th>  Cantidad </th><th>  Medicamento  </th> <th>  Concentracion  </th> <th>  Presentación </th> <th style="max-width: 20px;"> Indicaciones </th><th style="width: 40px;text-align: center;"></th></thead><tbody>';
$cont = 0;
$queryList=mysqli_query($conn3,"SELECT * FROM  operacionRecetario  where usuario_id = '$usuario_id'  and cliente_id ='$idcliente' and idReceta= '$idReceta'");

//echo "SELECT * FROM  operacionRecetario  where usuario_id = '$usuario_id'  and cliente_id ='$idcliente' and idReceta= '$idReceta'";

$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{

	$cont++;
	$idOper1     =$rowMotorizado['id'];
	$codigoProd =$rowMotorizado['codigoProd'];
	$dosis   =$rowMotorizado['dosis'];
	$posologia  =$rowMotorizado['posologia'];
	$frecuencia     =$rowMotorizado['frecuencia'];
	$administracion    =$rowMotorizado['administracion'];
	$dosisdia    =$rowMotorizado['dosisdia'];
	$dias     =$rowMotorizado['dias'];
	$via    =$rowMotorizado['via'];
	$total    =$rowMotorizado['total'];
	$nota    =$rowMotorizado['nota'];
	$codigoProd1   =$rowMotorizado['producto1'];
	$cantidad  =$rowMotorizado['cantidad'];
	
	$nombremedicamento = funcionMaster($codigoProd,'id','descripcion','pos');
	$concentracion = funcionMaster($codigoProd,'id','concentracion','pos');

/*		$queryinv=mysqli_query($conn3,"SELECT * FROM  sinvetrios where usuario_id = '$usuario_id'  and ID = $codigoProd");
		$nrowl=mysqli_num_rows($queryinv);
		while($rowinv=mysqli_fetch_array($queryinv))
		{
			$referencia1      =$rowinv['referencia'];
			$descripcion1     =$rowinv['descripcion'];
		}  
 
	echo '<tr> <th> <input type="hidden"  value="'.$idOper.'" class="form-control input-lg" id="idOper" name="idOper" >  <a href=""  onclick="eliminarItem();"> <font size="5"> <strong>  <i class="fa fa-trash"></i>   </strong>  </font> </a>  
	'.$codigoProd.$codigoProd1.'  </th> <th>  '.$dosis.' '.$posologia.'  </th> <th> cada '.$frecuencia.' '.$administracion.' </th><th> '.$via.' </th><th>  '.$dias.' días</th> <th>  '.$nota.'</th>
	';  */

echo '<tr> <td>'.$cantidad.'</td><td>'.$nombremedicamento.'  </td> <td>'.$concentracion.'</td> <td>'.$posologia.'  </td> <td> '.wordwrap($nota, 30, "\n", true).'</td><td style="width: 40px;text-align: center;"> <input type="hidden"  value="'.$idOper1.'" class="form-control input-lg" id="idOper'.$cont.'" name="idOper" value="medicamento">   <a href="#"  onclick="eliminarItem('.$cont.');"> <font size="5"> <strong>  <i class="fa fa-trash" style="color: #ff0000a1;font-size: 20px;"></i>   </strong>  </font> </a> </td>';


}
//echo '<tr> <th>   </th> <th> Totales </th> <th> '.$cantidadT.' </th><th> '.$costoT.' </th><th>  '.$precioT.' </th>';
	    
   echo '</tbody></table>';


?>