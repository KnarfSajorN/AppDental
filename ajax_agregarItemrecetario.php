<?php
date_default_timezone_set('America/Bogota');
 
include("funciones/funciones.php");
include 'funciones/funcionesUtilidades.php';
include 'funciones/conn3.php';
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

if($_POST['codigoProd']  == 0){
	
}else{
	$codigoProd 	= $_POST['codigoProd'];
}
    
   
    $dosis  = $_POST['dosis'];
    $nota  = sincomillas($_POST['nota']);
    $codigoProd1 = $_POST['codigoProd1'];

     $posologia = $_POST['posologia'];
      $fechar                = date("Y-m-d");

 $cantidad = $_POST['cantidad'];
 $frecuencia = $_POST['frecuencia'];
 $duracion = $_POST['duracion'];
 $metodo = $_POST['metodo'];
 $administracion= $_POST['administracion'];
 $dosisdia= $_POST['dosisdia'];
 $dias= $_POST['dias'];
 $via= $_POST['via'];
        $total = $_POST['total'];
        $nota2 = sincomillas($_POST['nota2']); 
      

    $usuario_id 	= $_POST['usuario_id'];
    $idcliente     = $_POST['idcliente'];
    $idR          = $_POST['idReceta'];
 

//echo "$codigoProd - $cantidad - $usuario_id";
 
 /*$queryinv=mysqli_query($conn3,"SELECT * FROM  sinvetrios where usuario_id = '$usuario_id'  and ID = $codigoProd");

$nrowl=mysqli_num_rows($queryinv);
while($rowinv=mysqli_fetch_array($queryinv))
{

$tipo         =$rowinv['tipo'];
$costo        =$rowinv['costo'];
$precio       =$rowinv['precio']; 
$existencia   =$rowinv['existencia']; 

}

if ($valor == 0) {
	$valor = $costo;
}
*/  
 mysqli_query($conn3, "INSERT INTO operacionRecetario (usuario_id, cliente_id, codigoProd, dosis, posologia, fecha, frecuencia, administracion, dosisdia,dias,via,total,nota,producto1,idReceta, cantidad,nota2,duracion,metodo) 
                    VALUES ('$usuario_id','$idcliente', '$codigoProd','$dosis', '$posologia'  ,'$fechar',  '$frecuencia', '$administracion', '$dosisdia', '$dias', '$via', '$total', '$nota','$codigoProd1','$idR','$cantidad','$nota2','$duracion','$metodo');");
  

              $queryExamen=mysqli_query($conn3,"SELECT MAX(id) as idoperacionRecetario from operacionRecetario");
              $nrowl=mysqli_num_rows($queryExamen);
              while($rowExamen=mysqli_fetch_array($queryExamen))
              {
                $idoperacionRecetario = $rowExamen['idoperacionRecetario'];
              }   

 

 mssql_query("INSERT INTO operacionRecetario (id, usuario_id, cliente_id, codigoProd, dosis, posologia, fecha, frecuencia, administracion, dosisdia, dias,via,total,nota,producto1,idReceta, cantidad,nota2,duracion,metodo) 
                    VALUES ('$idoperacionRecetario', '$usuario_id','$idcliente', '$codigoProd','$dosis', '$posologia'  ,'$fechar',  '$frecuencia', '$administracion', '$dosisdia', '$dias', '$via', '$total', '$nota','$codigoProd1','$idR','$cantidad','$nota2','$duracion','$metodo');");




/*echo "INSERT INTO operacionRecetario (usuario_id, cliente_id, codigoProd, dosis, posologia, fecha, frecuencia, administracion, dosisdia,dias,via,total,nota,producto1,idReceta) 
                    VALUES ('$usuario_id','$idcliente', '$codigoProd','$dosis', '$posologia'  ,'$fechar',  '$frecuencia', '$administracion', '$dosisdia', '$dias', '$via', '$total', '$nota','$codigoProd1','$idR');"; */
 


//  <thead class="table-light" ><tr> <th>  Cantidad </th><th>  Medicamento  </th> <th>  Concentracion  </th> <th>  Presentación </th> <th style="max-width: 20px;"> Indicaciones </th><th style="width: 40px;text-align: center;"></th></thead><tbody>';
echo '<br><label style="font-size: 30px;">Medicamentos Generados </label><table class="table">
 
<thead class="table-light" ><tr> <th>  Cantidad </th><th>  Medicamento  </th>  <th>  Presentación </th> <th style="max-width: 20px;"> Indicaciones </th><th style="width: 40px;text-align: center;"></th></thead><tbody>';
$cont = 0;
$queryList=mysqli_query($conn3,"SELECT * FROM  operacionRecetario  where usuario_id = '$usuario_id'  and cliente_id ='$idcliente' and idReceta= '$idR'");

//echo "SELECT * FROM  operacionRecetario  where usuario_id = '$usuario_id'  and cliente_id ='$idcliente' and idReceta= '$idR'";
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
		$cont++;
	$idOper1     =$rowMotorizado['id'];
	$codigoProd =$rowMotorizado['codigoProd'];
	$dosis   =$rowMotorizado['dosis'];
	$posologia  =$rowMotorizado['posologia'];
	$duracion  =$rowMotorizado['duracion'];
	$metodo  =$rowMotorizado['metodo'];
	$frecuencia     =$rowMotorizado['frecuencia'];
	$administracion    =$rowMotorizado['administracion'];
	$dosisdia    =$rowMotorizado['dosisdia'];
	$dias     =$rowMotorizado['dias'];
	$via    =$rowMotorizado['via'];
	$total    =$rowMotorizado['total'];
	$nota    =$rowMotorizado['nota'];
	$codigoProd1   =$rowMotorizado['producto1'];
	$cantidad  =$rowMotorizado['cantidad'];
	$nota2  =$rowMotorizado['nota2'];

	$nombremedicamento = funcionMaster($codigoProd,'id','descripcion','pos');
	$concentracion = funcionMaster($codigoProd,'id','concentracion','pos');



/*		$queryinv=mysqli_query($conn3,"SELECT * FROM  sinvetrios where usuario_id = '$usuario_id'  and ID = $codigoProd");
		$nrowl=mysqli_num_rows($queryinv);
		while($rowinv=mysqli_fetch_array($queryinv))
		{
			$referencia1      =$rowinv['referencia'];
			$descripcion1     =$rowinv['descripcion'];
		}  
 
	echo '<tr> <th> <input type="hidden"  value="'.$idOper1.'" class="form-control input-lg" id="idOper'.$cont.'" name="idOper" >   <a href="#"  onclick="eliminarItem'.$cont.'();"> <font size="5"> <strong>  <i class="fa fa-trash"></i>   </strong>  </font> </a>    
	'.$cantidad.'</th><th>'.$codigoProd.$codigoProd1.'  </th> <th>  '.$dosis.' '.$posologia.'  </th> <th> cada '.$frecuencia.' '.$administracion.' </th><th> '.$via.' </th><th>  '.$dias.' días</th> <th>  '.$nota.'</th>
	';  */



//echo '<tr> <td>'.$cantidad.'</td><td>'.$nombremedicamento.$codigoProd1 .'  </td> <td>'.$concentracion.'</td> <td>'.$posologia.'  </td> <td> '.wordwrap($nota, 30, "\n", true).'</td><td style="width: 40px;text-align: center;"> <input type="hidden"  value="'.$idOper1.'" class="form-control input-lg" id="idOper'.$cont.'" name="idOper" value="medicamento">   <a href="#"  onclick="eliminarItem('.$cont.');"> <font size="5"> <strong>  <i class="fa fa-trash" style="color: #ff0000a1;font-size: 20px;"></i>   </strong>  </font> </a> </td>';
	echo '<tr> <td>' . $cantidad . '</td><td>' . $codigoProd . $codigoProd1 . '  </td> <td>' . $posologia . '  </td> <td> ' . wordwrap($nota, 30, "\n", true) . '</td><td style="width: 40px;text-align: center;"> <input type="hidden"  value="' . $idOper1 . '" class="form-control input-lg" id="idOper' . $cont . '" name="idOper" value="medicamento">   <a href="#"  onclick="eliminarItem(' . $cont . ');"> <font size="5"> <strong>  <i class="fa fa-trash" style="color: #ff0000a1;font-size: 20px;"></i>   </strong>  </font> </a> </td>';
}
//echo '<tr> <th>   </th> <th> Totales </th> <th> '.$cantidadT.' </th><th> '.$costoT.' </th><th>  '.$precioT.' </th>';
	    
   echo '</tbody></table>';


?>