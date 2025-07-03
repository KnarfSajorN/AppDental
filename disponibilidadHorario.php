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

if ($tiempoConsulta==0.2) {
	
 $queryList=mysqli_query($conn3,"SELECT * FROM  horario1");

                    
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {
                                          $horaM    = $row_recordset32['horaM'];
                                          $horaN   = $row_recordset32['horaN'];
                                         
                                          $ID              = $row_recordset32['id'];
                                         
                                         }
                       echo "<option value='$horaM' > $horaN </option>";

                                     }




	


?>