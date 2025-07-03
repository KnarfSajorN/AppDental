<?php 
//$licencia = 'xxqwertyxxqwerty';

$licencia = $_GET['licencia'];

include 'funciones/conn3.php';

$licencia = $_GET['licencia'];
$licencia = $_GET['licencia'];

$li = $_GET['li'];

$licencia = substr($licencia, 10,1);


// 0-Demo;1-Mensual;2-Trimestral;3Semestral;4Anual;5Especial 
 $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $li");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $paisacceso=$rowMotorizado['paisacceso'];
            $tipoLic=$rowMotorizado['tipoLic'];
            $aliado=$rowMotorizado['aliado'];
            $fec_ingreso=$rowMotorizado['fec_ingreso'];


            $fec_ingreso=$rowMotorizado['fec_ingreso'];
          
        }



        $queryList2=mysqli_query($conn3,"SELECT * FROM  detalleLicencias where id_usuario = $li");
        $nrowl=mysqli_num_rows($queryList2);
        while($rowD=mysqli_fetch_array($queryList2))
        {
            $detalle=$rowD['detalle'];

        }    


$fec_ingreso = str_replace('-','',$fec_ingreso);


?>
<!DOCTYPE html>
<html lang="es">
<head> 
	<meta charset="utf-8">
</head>

<body>
	<div align="center">


        <div style="float: left; width: 50%;" >

        <div> <br> </div>
        <div> <br> </div>
        <div> <br> </div>
        
            <strong> Detalle de la Licencia.<br> </strong>
          
       <div> <br> </div>
       <div> <br> </div>
       <div> <br> </div>
            

    <?PHP ECHO $detalle;?>
    









    <br>
    <br>
    <br>

    

    </div>

 
<div style="float: right; width: 50%;" >

<img src="createImage.php?x=center&y=370&size=20&r=43&g=42&b=42&text=<?php echo $paisacceso.$tipoLic.$aliado.substr($fec_ingreso, 0,8).$licencia?>" />


</div>





	 


	</div>
</body>
</html>
 