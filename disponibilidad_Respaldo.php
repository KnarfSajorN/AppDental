<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
$con=conectar();
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


$cuantos = 0;

$fecha 		= $_POST['fecha'];
$Hora 		= $_POST['Hora'];
$usuario_id = $_POST['usuario_id'];
$doctor     = $_POST['doctor'];
 
$dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo');
$DiaSemana = $dias[date('N', strtotime($fecha))];

/*
function saber_dia($nombredia) 
{
$dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo');
$fecha = $dias[date('N', strtotime($nombredia))];

 echo $fecha;
}
 
// ejecutamos la función pasándole la fecha que queremos
/*
$fecha1 = date("Y-m-d");
saber_dia('2019-04-21');
echo $fecha1 ;
saber_dia($fecha1);
*/

//$queryList=mysqli_query($conn3,"SELECT count(idCitas) as cuantos FROM  citas where fecha = '$fecha' and Hora = '$Hora' and usuario_id = '$usuario_id'");
//echo "SELECT count(idCitas) as cuantos FROM  citas where fecha = '$fecha'  and usuario_id = '$doctor'";
	$queryList=mysqli_query($conn3,"SELECT count(idCitas) as cuantos FROM  citas where fecha = '$fecha'  and doctor = '$doctor'");
	    $nrowl=mysqli_num_rows($queryList);
	    while($rowMotorizado=mysqli_fetch_array($queryList))
	    {
		  $cuantos      =$rowMotorizado['cuantos'];
	    }
 
    $queryList1=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $doctor");
            $nrowl=mysqli_num_rows($queryList1);
            while($row2=mysqli_fetch_array($queryList1))
            {

            $cantidadPacientes      =$row2['cantidadPacientes'];
            $tiempoConsulta          =$row2['tiempoConsulta'];
      
            $cantidadPacientes=$row2['cantidadPacientes'];

            $lt=$row2['lt'];
            $mt=$row2['mt'];
            $et=$row2['et'];
            $jt=$row2['jt'];
            $vt=$row2['vt'];
            $st=$row2['st'];
            $dt=$row2['dt'];

            $ld=$row2['ld'];
            $md=$row2['md'];
            $ed=$row2['ed'];
            $jd=$row2['jd'];
            $vd=$row2['vd'];
            $sd=$row2['sd'];
            $dd=$row2['dd'];

            $lh=$row2['lh'];
            $mh=$row2['mh'];
            $eh=$row2['eh'];
            $jh=$row2['jh'];
            $vh=$row2['vh'];
            $sh=$row2['sh'];
            $dh=$row2['dh'];



	        $ldp=$row2['ldp'];
	        $mdp=$row2['mdp'];
	        $edp=$row2['edp'];
	        $jdp=$row2['jdp'];
	        $vdp=$row2['vdp'];
	        $sdp=$row2['sdp'];
	        $ddp=$row2['ddp'];

	        $lhp=$row2['lhp'];
	        $mhp=$row2['mhp'];
	        $ehp=$row2['ehp'];
	        $jhp=$row2['jhp'];
	        $vhp=$row2['vhp'];
	        $shp=$row2['shp'];
	        $dhp=$row2['dhp'];

        $sul=$row2['sul'];
        $sum=$row2['sum'];
        $sue=$row2['sue'];
        $suj=$row2['suj'];
        $suv=$row2['suv'];
        $sus=$row2['sus'];
        $sud=$row2['sud'];


             }
 
if ($cuantos<$cantidadPacientes) 
{
	$cuantos2 = $cantidadPacientes-$cuantos;
}

	$trabaja = 1;

 

if ($lt == 0 and $DiaSemana == 'Lunes') {
	$trabaja = 0;
	echo "<font color = 'red'> El día lunes no esta permitido programar citas según configuración de horario, </font>";
}
elseif ($mt == 0 and $DiaSemana == 'Martes') {
	$trabaja = 0;

	echo "<font color = 'red'> El día Martes no esta permitido programar citas según configuración de horario</font>";
}
elseif ($et == 0 and $DiaSemana == 'Miercoles') {
	$trabaja = 0;

	echo "<font color = 'red'> El día Miercoles no esta permitido programar citas según configuración de horario</font>";
}
elseif ($jt == 0 and $DiaSemana == 'Jueves') {
	$trabaja = 0;

	echo "<font color = 'red'> El día Jueves no esta permitido programar citas según configuración de horario</font>";
}
elseif ($vt == 0 and $DiaSemana == 'Viernes') {
	$trabaja = 0;

	echo "<font color = 'red'> El día Viernes no esta permitido programar citas según configuración de horario</font>";
}
elseif ($st == 0 and $DiaSemana == 'Sabado') {
	$trabaja = 0;

	echo "<font color = 'red'> El día Sabado no esta permitido programar citas según configuración de horario</font>";
}
elseif ($dt == 0 and $DiaSemana == 'Domingo') {
	$trabaja = 0;

	echo "<font color = 'red'> El día Domingo no esta permitido programar citas según configuración de horario</font>";
}

else
{


    if ($DiaSemana == 'Lunes') {$sucursal = $sul;}
elseif ($DiaSemana == 'Martes') {$sucursal = $sum;}
elseif ($DiaSemana == 'Miercoles') {$sucursal = $sue;}
elseif ($DiaSemana == 'Jueves') {$sucursal = $suj;}
elseif ($DiaSemana == 'Viernes') {$sucursal = $suv;}
elseif ($DiaSemana == 'Sabado') {$sucursal = $sus;}
elseif ($DiaSemana == 'Domingo') {$sucursal = $sud;}



	echo '<strong> El día <font color="red">'.$DiaSemana.'</font> solo se atiende en '.$sucursal.' <br> Pacientes agendados <font color="red">'.$cuantos.'</font> Cupos disponibles <font color="red">'.$cuantos2.'</font></strong>';

	
	if ($cuantos > 0) 
	{
		 
	echo '<h6><table border="1"   style="undefined;table-layout: fixed; width: 100%">
  		<tr> <th> <font size="1"> Hora</font> </th><th><font size="1">Nombre</font></th><th><font size="1">Motivo</font></th> </tr>';

		$queryList=mysqli_query($conn3,"SELECT * from citas where fecha = '$fecha' and (estado = 0 or estado = 1 or estado = 2) and doctor = '$doctor' order by Hora");
	    $nrowl=mysqli_num_rows($queryList);
	    while($rowMotorizado=mysqli_fetch_array($queryList))
	    {
		  $Hora      =$rowMotorizado['Hora'];
		  $nombre      =$rowMotorizado['nombre'];
		  $motivoConsulta      =$rowMotorizado['motivoConsulta'];
		  echo '<tr> <th><font size="1">'.$Hora .' </font></th><th><font size="1">'.$nombre .'</font></th><th><font size="1">'.$motivoConsulta .'</font></th> </tr>';
	    }
	    echo '</table></h6>';
	}
}
 

$horaEsteMomento = date("H:i:s");

 
if ($tiempoConsulta==15 and $trabaja == 1) {
	
 //$queryList=mysqli_query($conn3,"SELECT * FROM  horario1 where  horaM > '$horaEsteMomento'");
 $queryList=mysqli_query($conn3,"SELECT * FROM  horario1 ");
 
                    echo '<select name="Hora" id="Hora"  onChange="verHora();" class="form-control select2" style="width: 100%;"  required="required" >                   ';
                
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {
                                          $horaM    = $row_recordset32['horaM'];
                                          $horaN   = $row_recordset32['horaN'];
                                         
                                          $ID              = $row_recordset32['id'];
                                         
                       echo "<option value='$horaM' > $horaN </option>";
                                         }

echo '</select>';
                                     }


elseif ($tiempoConsulta==20 and $trabaja == 1) {
	
 $queryList=mysqli_query($conn3,"SELECT * FROM  horario2 ");

                    echo '<select name="Hora" id="Hora"  onChange="verHora();" class="form-control select2" style="width: 100%;"  required="required" >                   ';
                
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {
                                          $horaM    = $row_recordset32['horaM'];
                                          $horaN   = $row_recordset32['horaN'];
                                         
                                          $ID              = $row_recordset32['id'];
                                         
                       echo "<option value='$horaM' > $horaN </option>";
                                         }

echo '</select>';
                                     }

elseif ($tiempoConsulta==30 and $trabaja == 1) {
	
  $queryList=mysqli_query($conn3,"SELECT * FROM  horario3 ");

                    echo '<select name="Hora" id="Hora"  onChange="verHora();" class="form-control select2" style="width: 100%;"  required="required" >                   ';
                
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {
                                          $horaM    = $row_recordset32['horaM'];
                                          $horaN   = $row_recordset32['horaN'];
                                         
                                          $ID              = $row_recordset32['id'];
                                         
                       echo "<option value='$horaM' > $horaN </option>";
                                         }

echo '</select>';
                                     }

                                     elseif ($tiempoConsulta==0 and $trabaja == 1)
                                     {
                                     	echo '<input type="time" class="form-control input-lg"  name="Hora" id="Hora"  onChange="verHora();" value="'.$Hora.'"  required>';
                                     }

// echo '<input type="time" class="form-control input-lg"  name="Hora" id="Hora"  onChange="verHora();" value="'.$Hora.'"  required>';


?>