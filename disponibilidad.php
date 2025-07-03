<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/conn3.php");

function HorarioGlobal($conn3, $query)
{

  $queryList2 = mysqli_query($conn3, "{$query}");
  if ($queryList2) {
    while ($row_sucursal2 = mysqli_fetch_array($queryList2)) {

      //declarar global a la variables anteriores
      global $lt, $mt, $et, $jt, $vt, $st, $dt, $ld, $md, $ed, $jd, $vd, $sd, $dd, $lh, $mh, $eh, $jh, $vh, $sh, $dh, $ldp, $mdp, $edp, $jdp, $vdp, $sdp, $ddp, $lhp, $mhp, $ehp, $jhp, $vhp, $shp, $dhp, $sul, $sum, $sue, $suj, $suv, $sus, $sud;

      $lt = $row_sucursal2['lt'];
      $mt = $row_sucursal2['mt'];
      $et = $row_sucursal2['et'];
      $jt = $row_sucursal2['jt'];
      $vt = $row_sucursal2['vt'];
      $st = $row_sucursal2['st'];
      $dt = $row_sucursal2['dt'];

      $ld = $row_sucursal2['ld'];
      $md = $row_sucursal2['md'];
      $ed = $row_sucursal2['ed'];
      $jd = $row_sucursal2['jd'];
      $vd = $row_sucursal2['vd'];
      $sd = $row_sucursal2['sd'];
      $dd = $row_sucursal2['dd'];

      $lh = $row_sucursal2['lh'];
      $mh = $row_sucursal2['mh'];
      $eh = $row_sucursal2['eh'];
      $jh = $row_sucursal2['jh'];
      $vh = $row_sucursal2['vh'];
      $sh = $row_sucursal2['sh'];
      $dh = $row_sucursal2['dh'];

      $ldp = $row_sucursal2['ldp'];
      $mdp = $row_sucursal2['mdp'];
      $edp = $row_sucursal2['edp'];
      $jdp = $row_sucursal2['jdp'];
      $vdp = $row_sucursal2['vdp'];
      $sdp = $row_sucursal2['sdp'];
      $ddp = $row_sucursal2['ddp'];

      $lhp = $row_sucursal2['lhp'];
      $mhp = $row_sucursal2['mhp'];
      $ehp = $row_sucursal2['ehp'];
      $jhp = $row_sucursal2['jhp'];
      $vhp = $row_sucursal2['vhp'];
      $shp = $row_sucursal2['shp'];
      $dhp = $row_sucursal2['dhp'];

      $sul = $row_sucursal2['sul'];
      $sum = $row_sucursal2['sum'];
      $sue = $row_sucursal2['sue'];
      $suj = $row_sucursal2['suj'];
      $suv = $row_sucursal2['suv'];
      $sus = $row_sucursal2['sus'];
      $sud = $row_sucursal2['sud'];
    }
  }
}


$sucursal    = $_POST['sucursal'];
$noLaboral = 0;
$cuantos = 0;

$fecha    = $_POST['fecha'];
$Hora     = $_POST['Hora'];
$usuario_id = $_POST['usuario_id'];
$doctor     = $_POST['doctor'];

// solo para ediciones
if ($_POST['idCitas']) {
  $idCitas = $_POST['idCitas'];
  $condicionExtra = " and idCitas <> " . $idCitas . " ";
} else {
  $idCitas == '0';
  $condicionExtra = " ";
}

$dias = array('', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
$DiaSemana = $dias[date('N', strtotime($fecha))];








// Verificamos si es no laboral
/*
$queryList = mysqli_query($conn3, "SELECT count(id) as noLaboral FROM  noLaborales where fechaNoLaboral = '$fecha'  and (idDoctor = '$doctor' or idDoctor = '0')");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $noLaboral      = $rowMotorizado['noLaboral'];
}
*/
$rangoNoPermitido = array();
$queryList = mysqli_query($conn3, "SELECT * FROM noLaborales WHERE fechaNoLaboral = '$fecha' AND (idDoctor = '$doctor' or idDoctor = '0') AND periodo = 0");
$nrowl = mysqli_num_rows($queryList);
if ($nrowl == 1) {
  $noLaboral = 1;
} else {
  $queryList = mysqli_query($conn3, "SELECT * FROM noLaborales WHERE fechaNoLaboral = '$fecha' AND (idDoctor = '$doctor' or idDoctor = '0') AND periodo = 1");
  $nrowl = mysqli_num_rows($queryList);
  if ($nrowl > 0) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
      array_push($rangoNoPermitido, [$rowMotorizado['fechaNoLaboral'], $rowMotorizado['horaInicio'], $rowMotorizado['horaFinal']]);
    }
  }
}






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




if ($noLaboral == 0) {




  $queryList = mysqli_query($conn3, "SELECT count(idCitas) as cuantos FROM  citas where fecha = '$fecha'  and doctor = '$doctor'");
  $nrowl = mysqli_num_rows($queryList);
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $cuantos      = $rowMotorizado['cuantos'];
  }

  /*
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
  */

  $queryList1 = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $doctor");
  if ($queryList1) {
    while ($row_sucursal1 = mysqli_fetch_array($queryList1)) {
      $tiempoConsulta          = $row_sucursal1['tiempoConsulta'];
      $cantidadPacientes = $row_sucursal1['cantidadPacientes'];
    }
  }


  if ($sucursal != "0") {
    HorarioGlobal($conn3, "SELECT * FROM  Horario_Sistema where usuario_id = $doctor and sucursal_id= $sucursal");
  } else {
    HorarioGlobal($conn3, "SELECT * FROM  config where ID_Usuario = $doctor");
  }
  if ($cuantos < $cantidadPacientes) {
    $cuantos2 = $cantidadPacientes - $cuantos;
  }

  $trabaja = 1;



  if ($lt == 0 and $DiaSemana == 'Lunes') {
    $trabaja = 0;
    echo "<font color = 'red'> El día lunes no esta permitido programar citas según configuración de horario, </font>";
  } elseif ($mt == 0 and $DiaSemana == 'Martes') {
    $trabaja = 0;

    echo "<font color = 'red'> El día Martes no esta permitido programar citas según configuración de horario</font>";
  } elseif ($et == 0 and $DiaSemana == 'Miercoles') {
    $trabaja = 0;

    echo "<font color = 'red'> El día Miercoles no esta permitido programar citas según configuración de horario</font>";
  } elseif ($jt == 0 and $DiaSemana == 'Jueves') {
    $trabaja = 0;

    echo "<font color = 'red'> El día Jueves no esta permitido programar citas según configuración de horario</font>";
  } elseif ($vt == 0 and $DiaSemana == 'Viernes') {
    $trabaja = 0;

    echo "<font color = 'red'> El día Viernes no esta permitido programar citas según configuración de horario</font>";
  } elseif ($st == 0 and $DiaSemana == 'Sabado') {
    $trabaja = 0;

    echo "<font color = 'red'> El día Sabado no esta permitido programar citas según configuración de horario</font>";
  } elseif ($dt == 0 and $DiaSemana == 'Domingo') {
    $trabaja = 0;

    echo "<font color = 'red'> El día Domingo no esta permitido programar citas según configuración de horario</font>";
  } else {





    if ($DiaSemana == 'Lunes') {
      $sucursal = $sul;
      $d = $ld;
      $h = $lh;
      $dp = $ldp;
      $hp = $lhp;
    } elseif ($DiaSemana == 'Martes') {
      $sucursal = $sum;
      $d = $md;
      $h = $mh;
      $dp = $mdp;
      $hp = $mhp;
    } elseif ($DiaSemana == 'Miercoles') {
      $sucursal = $sue;
      $d = $ed;
      $h = $eh;
      $dp = $edp;
      $hp = $ehp;
    } elseif ($DiaSemana == 'Jueves') {
      $sucursal = $suj;
      $d = $jd;
      $h = $jh;
      $dp = $jdp;
      $hp = $jhp;
    } elseif ($DiaSemana == 'Viernes') {
      $sucursal = $suv;
      $d = $vd;
      $h = $vh;
      $dp = $vdp;
      $hp = $vhp;
    } elseif ($DiaSemana == 'Sabado') {
      $sucursal = $sus;
      $d = $sd;
      $h = $sh;
      $dp = $sdp;
      $hp = $shp;
    } elseif ($DiaSemana == 'Domingo') {
      $sucursal = $sud;
      $d = $dd;
      $h = $dh;
      $dp = $ddp;
      $hp = $dhp;
    }



    echo '<strong> El día <font color="red">' . $DiaSemana . '</font> solo se atiende en ' . $sucursal . ' <br> Pacientes agendados <font color="red">' . $cuantos . '</font> Cupos disponibles <font color="red">' . $cuantos2 . '</font></strong>';


    if ($cuantos > 0) {

      echo '<h6><table border="1"   style="undefined;table-layout: fixed; width: 100%">
     <tr> <th> <font size="1"> Hora</font> </th><th><font size="1">Nombre</font></th><th><font size="1">Motivo</font></th> </tr>';

      $queryList = mysqli_query($conn3, "SELECT * from citas where fecha = '$fecha' and (estado = 0 or estado = 1 or estado = 2) and doctor = '$doctor' order by Hora");
      $nrowl = mysqli_num_rows($queryList);
      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Hora      = $rowMotorizado['Hora'];
        $nombre      = $rowMotorizado['nombre'];
        $motivoConsulta      = $rowMotorizado['motivoConsulta'];
        $Motivo = funcionMaster($motivoConsulta, 'id', 'descripcion', 'Motivos_Consulta');
        echo '<tr> <th><font size="1">' . $Hora . ' </font></th><th><font size="1">' . $nombre . '</font></th><th><font size="1">' . $Motivo . '</font></th> </tr>';
      }
      echo '</table></h6>';
    }
  }

  $hoy = date("Y-m-d");
  $horaEsteMomento = date("H:i:s");
  $horaEsteMomento2 = date("H:00:00");


  // calcular hora real
  if ($tiempoConsulta > 0 and $trabaja == 1) {

    if ($fecha == $hoy && $horaEsteMomento2 > $d) {
      $horaM = $horaEsteMomento2;
    } else {
      $horaM = $d;
    }
    // horaM es la hora actual para calcular
    // horaF es la hora final del ultimo turno (puede ser primer turno o segun turno)

    if ($hp <> '00:00:00') {
      $horaF = $hp;
    } else {
      $horaF = $h;
    }

    echo '<select name="Hora" id="Hora"  onChange="verHora();" class="form-control select2" style="width: 100%;"  required="required" >';
    echo "<option value='' selected> Seleccione </option>";
    do {
      $horaNormal  = date("g:i a", strtotime($horaM));

      $agendado = 0;
      $queryAgenda = mysqli_query($conn3, "SELECT count(idCitas) as agendado FROM  citas  where doctor = '$doctor' and (Hora <= '{$horaM}' and horaF > '{$horaM}') and fecha = '$fecha' and estado <= '3' $condicionExtra ");
      // $queryAgenda = mysqli_query($conn3, "SELECT count(idCitas) as agendado FROM  citas  where doctor = '$doctor' and Hora = '$horaM' and fecha = '$fecha' and estado <= '3'");

      $nrowl = mysqli_num_rows($queryAgenda);
      while ($row_agenda = mysqli_fetch_array($queryAgenda)) {
        $agendado    = $row_agenda['agendado'];
      }
      if ($agendado == 0) {

        if (count($rangoNoPermitido) > 0) {
          foreach ($rangoNoPermitido as $rango) {
            if ($horaM >= $rango[1] and $horaM <= $rango[2]) {
              // no valido
              echo "<option value='$horaM' disabled> $horaNormal [No disponible por Horario No Laboral]</option>";
            } else {
              echo "<option value='$horaM' > $horaNormal </option>";
            }
          }
        } else {
          echo "<option value='$horaM' > $horaNormal </option>";
        }
      }
      $horaM =  strtotime('' . $fecha . ' ' . $horaM . ' + ' . $tiempoConsulta . ' minute');
      $horaM = date("H:i:s", $horaM);
    } while (($horaM >= $d and  $horaM <= $h));

    // formateamos para la tarde
    $horaM = $dp;
    do {

      $horaNormal  = date("g:i a", strtotime($horaM));

      $agendado = 0;
      $queryAgenda = mysqli_query($conn3, "SELECT count(idCitas) as agendado FROM  citas  where doctor = '$doctor' and (Hora <= '{$horaM}' and horaF > '{$horaM}') and fecha = '$fecha' and estado <= '3' $condicionExtra ");

      $nrowl = mysqli_num_rows($queryAgenda);
      while ($row_agenda = mysqli_fetch_array($queryAgenda)) {
        $agendado    = $row_agenda['agendado'];
      }
      if ($agendado == 0) {
        if (count($rangoNoPermitido) > 0) {
          foreach ($rangoNoPermitido as $rango) {
            if ($horaM >= $rango[1] and $horaM <= $rango[2]) {
              // no valido
              echo "<option value='$horaM' disabled> $horaNormal [No disponible por Horario No Laboral]</option>";
            } else {
              echo "<option value='$horaM' > $horaNormal </option>";
            }
          }
        } else {
          echo "<option value='$horaM' > $horaNormal </option>";
        }
      }
      $horaM =  strtotime('' . $fecha . ' ' . $horaM . ' + ' . $tiempoConsulta . ' minute');
      $horaM = date("H:i:s", $horaM);
    } while (($horaM >= $dp and  $horaM <= $hp));
    echo '</select>';
  }



  // if ($tiempoConsulta==15 and $trabaja == 1) {

  //   if ($fecha <> $hoy) {
  //    $queryList=mysqli_query($conn3,"SELECT * FROM  horario1 where (horaM >= '$d' and horaM <= '$h') or (horaM >= '$dp' and horaM <= '$hp')");

  //  }
  //  elseif ($fecha == $hoy) {
  //   $queryList=mysqli_query($conn3,"SELECT * FROM  horario1 where  horaM > '$horaEsteMomento' and (horaM >= '$d' and horaM <= '$h') or (horaM >= '$dp' and horaM <= '$hp')");
  // }


  //  //$queryList=mysqli_query($conn3,"SELECT * FROM  horario1 where  horaM > '$horaEsteMomento'");

  // echo '<select name="Hora" id="Hora"  onChange="verHora();" class="form-control select2" style="width: 100%;"  required="required" >                   ';

  // $nrowl=mysqli_num_rows($queryList);
  // while($row_recordset32=mysqli_fetch_array($queryList))
  // {
  //   $horaM    = $row_recordset32['horaM'];
  //   $horaN   = $row_recordset32['horaN'];

  //   $ID              = $row_recordset32['id'];




  //   $agendado = 0;
  //   $queryAgenda=mysqli_query($conn3,"SELECT count(idCitas) as agendado FROM  citas  where doctor = '$doctor' and Hora = '$horaM' and fecha = '$fecha' and estado <= '3'");
  //   $nrowl=mysqli_num_rows($queryAgenda);
  //   while($row_agenda=mysqli_fetch_array($queryAgenda))
  //   {
  //     $agendado    = $row_agenda['agendado'];

  //   }

  //   if ($agendado == 0) 
  //   {  
  //    echo "<option value='$horaM' > $horaN </option>";
  //  }




  //                                //      echo "<option value='$horaM' > $horaN </option>";

  // }

  // echo '</select>';

  // }


  // elseif ($tiempoConsulta==20 and $trabaja == 1) {
  //  if ($fecha <> $hoy) {
  //   $queryList=mysqli_query($conn3,"SELECT * FROM  horario2 where (horaM >= '$d' and horaM <= '$h') or (horaM >= '$dp' and horaM <= '$hp')");


  // }
  // elseif ($fecha == $hoy) {

  //   $queryList=mysqli_query($conn3,"SELECT * FROM  horario2 where  horaM > '$horaEsteMomento' and (horaM >= '$d' and horaM <= '$h') or (horaM >= '$dp' and horaM <= '$hp') ");

  // }
  // echo '<select name="Hora" id="Hora"  onChange="verHora();" class="form-control select2" style="width: 100%;"  required="required" >                   ';

  // $nrowl=mysqli_num_rows($queryList);
  // while($row_recordset32=mysqli_fetch_array($queryList))
  // {
  //   $horaM    = $row_recordset32['horaM'];
  //   $horaN   = $row_recordset32['horaN'];

  //   $ID              = $row_recordset32['id'];







  //   $agendado = 0;
  //   $queryAgenda=mysqli_query($conn3,"SELECT count(idCitas) as agendado FROM  citas  where doctor = '$doctor' and Hora = '$horaM' and fecha = '$fecha'and estado <= '3'");
  //   $nrowl=mysqli_num_rows($queryAgenda);
  //   while($row_agenda=mysqli_fetch_array($queryAgenda))
  //   {
  //     $agendado    = $row_agenda['agendado'];

  //   }

  //   if ($agendado == 0) 
  //   {  
  //    echo "<option value='$horaM' > $horaN </option>";
  //  }





  //                                      //echo "<option value='$horaM' > $horaN </option>";


  // }

  // echo '</select>';
  // }

  // elseif ($tiempoConsulta==30 and $trabaja == 1) {

  //   if ($fecha <> $hoy) {
  //     $queryList=mysqli_query($conn3,"SELECT * FROM  horario3 where (horaM >= '$d' and horaM <= '$h') or (horaM >= '$dp' and horaM <= '$hp')");
  //   }
  //   elseif ($fecha == $hoy) 
  //   {

  //     $queryList=mysqli_query($conn3,"SELECT * FROM  horario3 where  horaM > '$horaEsteMomento' and (horaM >= '$d' and horaM <= '$h') or (horaM >= '$dp' and horaM <= '$hp')");

  //   }

  //   echo '<select name="Hora" id="Hora"  onChange="verHora();" class="form-control select2" style="width: 100%;"  required="required" >                   ';

  //   $nrowl=mysqli_num_rows($queryList);
  //   while($row_recordset32=mysqli_fetch_array($queryList))
  //   {
  //     $horaM    = $row_recordset32['horaM'];
  //     $horaN   = $row_recordset32['horaN'];

  //     $ID              = $row_recordset32['id'];






  //     $agendado = 0;
  //     $queryAgenda=mysqli_query($conn3,"SELECT count(idCitas) as agendado FROM  citas  where doctor = '$doctor' and Hora = '$horaM' and fecha = '$fecha'and estado <= '3'");
  //     $nrowl=mysqli_num_rows($queryAgenda);
  //     while($row_agenda=mysqli_fetch_array($queryAgenda))
  //     {
  //       $agendado    = $row_agenda['agendado'];

  //     }

  //     if ($agendado == 0) 
  //     {  
  //      echo "<option value='$horaM' > $horaN </option>";
  //    }




  //                                     // echo "<option value='$horaM' > $horaN </option>";

  //  }

  //  echo '</select>';
  // }

  elseif ($tiempoConsulta == 0 and $trabaja == 1) {
    echo '<input type="time" class="form-control input-lg"  name="Hora" id="Hora"  onChange="verHora();" value="' . $Hora . '"  required>';
  }
} elseif ($noLaboral > 0) {
  echo "<font color = 'red'> <strong> Fecha indicada no es laborable </strong> </font>";
}


// echo '<input type="time" class="form-control input-lg"  name="Hora" id="Hora"  onChange="verHora();" value="'.$Hora.'"  required>';