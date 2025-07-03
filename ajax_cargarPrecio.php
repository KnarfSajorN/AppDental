<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

    $descripcion 	= $_POST['codigoProd'];
    $usuario_id 	= $_POST['usuario_id'];


//echo "$codigoProd - $cantidad - $usuario_id";
 
 $queryinv=mysqli_query($conn3,"SELECT * FROM  sinvetrios where  ID = $descripcion");

$nrowl=mysqli_num_rows($queryinv);
while($rowinv=mysqli_fetch_array($queryinv))
{

$tipo         =$rowinv['tipo'];
$costo        =$rowinv['costo'];
$precio       =$rowinv['precio']; 
$existencia   =$rowinv['existencia']; 

}

// <input type="number" class="form-control input-lg" id="2" name="base" placeholder="precio" onChange="multiplicar();" value="'.$precio.'" required>    
// CONDICION PARA EDITOR DE PRESUPUESTO
if ($_POST['key']) {
    echo $precio;
} else { 
    echo '<input type="number" class="form-control input-lg" id="2" name="base" placeholder="precio" onChange="multiplicar();" value="'.$precio.'" required> ';
}
    //echo $precio;
?>