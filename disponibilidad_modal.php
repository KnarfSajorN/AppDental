<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
$con=conectar();
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

$noLaboral= 0;
$cuantos = 0;

$fecha    = $_POST['fecha'];
$Hora     = $_POST['Hora'];
$usuario_id = $_POST['usuario_id'];
$doctor     = $_POST['doctor'];

$HoraInicio = $_POST['HoraInicio'];
$HoraFinal = $_POST['HoraFinal'];

$dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo');
$DiaSemana = $dias[date('N', strtotime($fecha))];

// Verificamos si es no laboral

$queryList=mysqli_query($conn3,"SELECT count(id) as noLaboral FROM  noLaborales where fechaNoLaboral = '$fecha'  and (idDoctor = '$doctor' or idDoctor = '0')");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
  $noLaboral      =$rowMotorizado['noLaboral'];
}

if ($noLaboral == 0) {

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

    if ($DiaSemana == 'Lunes') {$sucursal = $sul; $d = $ld; $h = $lh;$dp = $ldp; $hp = $lhp;}
    elseif ($DiaSemana == 'Martes') {$sucursal = $sum; $d = $md; $h = $mh;$dp = $mdp; $hp = $mhp;}
    elseif ($DiaSemana == 'Miercoles') {$sucursal = $sue; $d = $ed; $h = $eh;$dp = $edp; $hp = $ehp;}
    elseif ($DiaSemana == 'Jueves') {$sucursal = $suj; $d = $jd; $h = $jh;$dp = $jdp; $hp = $jhp;}
    elseif ($DiaSemana == 'Viernes') {$sucursal = $suv; $d = $vd; $h = $vh;$dp = $vdp; $hp = $vhp;}
    elseif ($DiaSemana == 'Sabado') {$sucursal = $sus; $d = $sd; $h = $sh;$dp = $sdp; $hp = $shp;}
    elseif ($DiaSemana == 'Domingo') {$sucursal = $sud; $d = $dd; $h = $dh;$dp = $ddp; $hp = $dhp;}

    echo '<strong> El día <font color="red">'.$DiaSemana.'</font> solo se atiende en '.$sucursal.' <br> Pacientes agendados <font color="red">'.$cuantos.'</font> Cupos disponibles <font color="red">'.$cuantos2. '</font> <br> </font> Horario Seleccionado: <font color="cian">' . $HoraInicio . ' - '. $HoraFinal.'</font> </strong>';


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

$hoy = date("Y-m-d");
$horaEsteMomento = date("H:i:s");
$horaEsteMomento2 = date("H:00:00");


// calcular hora real
if ($tiempoConsulta>0 and $trabaja == 1) {

  if ($fecha == $hoy) {
    $horaM = $horaEsteMomento2;
    $horaM_1 = $horaEsteMomento2;
  }else{
    $horaM = $d;
    $horaM_1 = $d;
  }
  // horaM es la hora actual para calcular
  // horaF es la hora final del ultimo turno (puede ser primer turno o segun turno)

  if ($hp<>'00:00:00') {
    $horaF = $hp;
  }else{
    $horaF = $h;
  }

    // saber que hora es la mas cercana a la digitada por el usuario desde el calendario directamente
    
    do {
      $horaNormal  = date("H:i", strtotime($horaM_1));

      $agendado = 0;
      $queryAgenda = mysqli_query($conn3, "SELECT count(idCitas) as agendado FROM  citas  where doctor = '$doctor' and Hora = '$horaM_1' and fecha = '$fecha' and estado <= '3'");

      $nrowl = mysqli_num_rows($queryAgenda);
      while ($row_agenda = mysqli_fetch_array($queryAgenda)) {
        $agendado    = $row_agenda['agendado'];
      }
      if ($agendado == 0) {
        $arregloHorario[] = str_replace(':', '', $horaNormal);
      }
      $horaM_1 =  strtotime('' . $fecha . ' ' . $horaM_1 . ' + ' . $tiempoConsulta . ' minute');
      $horaM_1 = date("H:i:s", $horaM_1);
    } while (($horaM_1 >= $d and  $horaM_1 <= $horaF));

    /////////////////////////////////////////////////////////////////////////////////////////////////////



    // Indicar el numero mas cercano debe estar ordenado de mayor a menor
    function findClosest($arr, $n, $target)
    {
      // Corner cases 
      if ($target <= $arr[0])
        return $arr[0];
      if ($target >= $arr[$n - 1])
        return $arr[$n - 1];

      // Doing binary search 
      $i = 0;
      $j = $n;
      $mid = 0;
      while ($i < $j) {
        $mid = ($i + $j) / 2;

        if ($arr[$mid] == $target)
          return $arr[$mid];

        /* If target is less than array element, 
            then search in left */
        if ($target < $arr[$mid]) {

          // If target is greater than previous 
          // to mid, return closest of two 
          if ($mid > 0 && $target > $arr[$mid - 1])
            return getClosest(
              $arr[$mid - 1],
              $arr[$mid],
              $target
            );

          /* Repeat for left half */
          $j = $mid;
        }

        // If target is greater than mid 
        else {
          if (
            $mid < $n - 1 &&
            $target < $arr[$mid + 1]
          )
            return getClosest(
              $arr[$mid],
              $arr[$mid + 1],
              $target
            );
          // update i 
          $i = $mid + 1;
        }
      }

      // Only single element left after search 
      return $arr[$mid];
    }

    function getClosest($val1, $val2, $target)
    {
      if ($target - $val1 >= $val2 - $target)
        return $val2;
      else
        return $val1;
    }

    // Driver code 
    //$arr = array("0800", "0805", "0850");
    $n = sizeof($arregloHorario);
    $Hora_Cliente = str_replace(':','', $HoraInicio);
    $valor_mas_cercano = findClosest($arregloHorario, $n, $Hora_Cliente);

    if($Hora_Cliente==$valor_mas_cercano)
    {
      echo "<br><br><label>Se ha seleccionado la hora que usted eligio</label>";
    }
    else {
      echo "<br><br><label>Se ha seleccionado la hora aproximada a la que usted eligio, debido a que esa hora no esta disponible en su calendario para seleccionar</label>";
    }


  //////////////////////////////////////////////////////////////////////////////////////////////////

  echo "<label>Hora</label>";

  echo '<select name="Hora" id="Hora_modal"  onChange="verHora_modal();" class="form-control select2" style="width: 100%;"  required="required" >';
    echo "<option value='' selected> Seleccione </option>";
  do {
    $horaNormal  = date("g:i a", strtotime($horaM));
    $horacomparar  = str_replace(':', '', (date("H:i", strtotime($horaM))));

    $agendado = 0;
    $queryAgenda=mysqli_query($conn3,"SELECT count(idCitas) as agendado FROM  citas  where doctor = '$doctor' and Hora = '$horaM' and fecha = '$fecha' and estado <= '3'");

    $nrowl=mysqli_num_rows($queryAgenda);
    while($row_agenda=mysqli_fetch_array($queryAgenda))
    {
      $agendado    = $row_agenda['agendado'];
    }
    if ($agendado == 0) 
    {  
      $selectedHora="";
      if($horacomparar==$valor_mas_cercano)
      {
          $selectedHora="selected";
      }
     echo "<option value='$horaM' $selectedHora> $horaNormal </option>";
    }
   $horaM =  strtotime(''.$fecha.' '.$horaM.' + '.$tiempoConsulta.' minute'); 
   $horaM = date("H:i:s",$horaM);
 } while (($horaM >= $d and  $horaM <= $horaF));
 echo '</select>';
}

elseif ($tiempoConsulta==0 and $trabaja == 1){
  echo "<br><br><label>Hora</label>";
  echo '<input type="time" class="form-control input-lg"  name="Hora" id="Hora_modal"  onChange="verHora_modal();" value="'. $HoraInicio.'"  required>';
}
}
elseif ($noLaboral>0) 
{
  echo "<font color = 'red'> <strong> Fecha indicada no es laborable </strong> </font>";    
}

