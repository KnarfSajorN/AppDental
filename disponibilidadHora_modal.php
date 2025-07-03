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
$doctor = $_POST['doctor']; 

$HoraV = $Hora.':00'; 

$dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo');
$DiaSemana = $dias[date('N', strtotime($fecha))];

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

if ($cuantos<$cantidadPacientes) {
	$cuantos2 = $cantidadPacientes-$cuantos;
}
 
if ($lt == 0 and $DiaSemana == 'Lunes') {
	echo "<font color = 'red'> El día lunes no esta permitido programar citas según configuración de horario</font>";
}
elseif ($mt == 0 and $DiaSemana == 'Martes') {
	echo "<font color = 'red'> El día Martes no esta permitido programar citas según configuración de horario</font>";
}
elseif ($et == 0 and $DiaSemana == 'Miercoles') {
	echo "<font color = 'red'> El día Miercoles no esta permitido programar citas según configuración de horario</font>";
}
elseif ($jt == 0 and $DiaSemana == 'Jueves') {
	echo "<font color = 'red'> El día Jueves no esta permitido programar citas según configuración de horario</font>";
}
elseif ($vt == 0 and $DiaSemana == 'Viernes') {
	echo "<font color = 'red'> El día Viernes no esta permitido programar citas según configuración de horario</font>";
}
elseif ($st == 0 and $DiaSemana == 'Sabado') {
	echo "<font color = 'red'> El día Sabado no esta permitido programar citas según configuración de horario</font>";
}
elseif ($dt == 0 and $DiaSemana == 'Domingo') {
	echo "<font color = 'red'> El día Domingo no esta permitido programar citas según configuración de horario</font>";
}

elseif ($lt == 1 and $DiaSemana == 'Lunes') {
if (($HoraV >= $ld and  $HoraV < $lh) or ($HoraV >= $ldp and  $HoraV < $lhp)) 
{
	 
 
		$queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor'");

//echo "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor'";

	    $nrowl=mysqli_num_rows($queryList);
	    while($rowMotorizado=mysqli_fetch_array($queryList))
	    {
		  $Cuantoshora      =$rowMotorizado['Cuantoshora'];
		}

		if ($Cuantoshora == 0) {
			echo "<label style='color:blue;'> Hora disponible </label>";	
			echo '  <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h4> <strong>  G u a r d a r  </strong> </h4> </button></center>' ;
		}
		else
		{
			echo "<font color = 'red' size='5'> Hora  No disponible</font>";
		}
}
else
		{
			echo "<font color = 'red' size='5'> Horario ($Hora)  no disponible según configuración </font>";
		}
	
}

// $ld $dh
elseif ($mt == 1 and $DiaSemana == 'Martes') {
if (($HoraV >= $md and  $HoraV < $mh) or ($HoraV >= $mdp and  $HoraV < $mhp)) 
{
		 
		$queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor'");
	    $nrowl=mysqli_num_rows($queryList);
	    while($rowMotorizado=mysqli_fetch_array($queryList))
	    {
		  $Cuantoshora      =$rowMotorizado['Cuantoshora'];
		}

	if ($Cuantoshora == 0) {
			echo "<label style='color:blue;'> Hora disponible </label>";	
			echo '  <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h4> <strong>  G u a r d a r  </strong> </h4> </button></center>' ;
		}
		else
		{
			echo "<font color = 'red' size='5'> Hora No disponible</font>";
		}
}
else
		{
			echo "<font color = 'red' size='5'> Horario no disponible según configuración </font>";
		}
	




}
elseif ($et == 1 and $DiaSemana == 'Miercoles') {

if (($HoraV >= $ed and  $HoraV < $eh) or ($HoraV >= $edp and  $HoraV < $ehp)) {

	$queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor'");
	    $nrowl=mysqli_num_rows($queryList);
	    while($rowMotorizado=mysqli_fetch_array($queryList))
	    {
		  $Cuantoshora      =$rowMotorizado['Cuantoshora'];
		}

		if ($Cuantoshora == 0) {
			echo "<label style='color:blue;'> Hora disponible </label>";	
			echo '  <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h4> <strong>  G u a r d a r  </strong> </h4> </button></center>' ;
		}
		else
		{
			echo "<font color = 'red' size='5'> Hora No disponible</font>";
		}
}
else
		{
			echo "<font color = 'red' size='5'> Horario no disponible según configuración </font>";
		}
	
}
elseif ($jt == 1 and $DiaSemana == 'Jueves') 
{
if (($HoraV >= $jd and  $HoraV < $jh) or ($HoraV >= $jdp and  $HoraV < $jhp)) {

	
		$queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor'");
	    $nrowl=mysqli_num_rows($queryList);
	    while($rowMotorizado=mysqli_fetch_array($queryList))
	    {
		  $Cuantoshora      =$rowMotorizado['Cuantoshora'];
		}

		if ($Cuantoshora == 0) {
			echo "<label style='color:blue;'> Hora disponible </label>";	
			echo '  <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h4> <strong>  G u a r d a r  </strong> </h4> </button></center>' ;
		}
		else
		{
			echo "<font color = 'red' size='5'> Hora No disponible</font>";
		}
}
else
		{
			echo "<font color = 'red' size='5'> Horario no disponible según configuración </font>";
		}
	


}
elseif ($vt == 1 and $DiaSemana == 'Viernes') {

if (($HoraV >= $vd and  $HoraV < $vh) or ($HoraV >= $vdp and  $HoraV < $vhp)) {

	$queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor'");
	    $nrowl=mysqli_num_rows($queryList);
	    while($rowMotorizado=mysqli_fetch_array($queryList))
	    {
		  $Cuantoshora      =$rowMotorizado['Cuantoshora'];
		}

		if ($Cuantoshora == 0) {
			echo "<label style='color:blue;'> Hora disponible </label>";	
			echo '  <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h4> <strong>  G u a r d a r  </strong> </h4> </button></center>' ;
		}
		else
		{
			echo "<font color = 'red' size='5'> Hora No disponible</font>";
		}
}
else
		{
			echo "<font color = 'red' size='5'> Horario no disponible según configuración </font>";
		}
	



}
elseif ($st == 1 and $DiaSemana == 'Sabado') 
{

if (($HoraV >= $sd and  $HoraV < $sh) or ($HoraV >= $sdp and  $HoraV < $shp)) {


		$queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor'");
	    $nrowl=mysqli_num_rows($queryList);
	    while($rowMotorizado=mysqli_fetch_array($queryList))
	    {
		  $Cuantoshora      =$rowMotorizado['Cuantoshora'];
		}

		if ($Cuantoshora == 0) {
			echo "<label style='color:blue;'> Hora disponible </label>";	
			echo '  <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h4> <strong>  G u a r d a r  </strong> </h4> </button></center>' ;
		}
		else
		{
			echo "<font color = 'red' size='5'> Hora No disponible</font>";
		}
}
else
		{
			echo "<font color = 'red' size='5'> Horario no disponible según configuración </font>";
		}
	



}
elseif ($dt == 1 and $DiaSemana == 'Domingo') {

if (($HoraV >= $dd and  $HoraV < $dh) or ($HoraV >= $ddp and  $HoraV < $dhp)) {

	$queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor'");
	    $nrowl=mysqli_num_rows($queryList);
	    while($rowMotorizado=mysqli_fetch_array($queryList))
	    {
		  $Cuantoshora      =$rowMotorizado['Cuantoshora'];
		}

		if ($Cuantoshora == 0) {
			echo "<label style='color:blue;'> Hora disponible </label>";	
			echo '  <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h4> <strong>  G u a r d a r  </strong> </h4> </button></center>' ;
		}
		else
		{
			echo "<font color = 'red' size='5'> Hora No disponible</font>";
		}
}
else
		{
			echo "<font color = 'red' size='5'> Horario no disponible según configuración </font>";
		}
	
}

else
{

 echo 'Se presento algún error, verificar fecha y hora, o contactar soporte via chat ';
}
 


?>