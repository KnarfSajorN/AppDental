<?php
date_default_timezone_set('America/Bogota');
include 'funciones/conn3.php';
include("funciones/funciones.php");

if($_POST["Tipo"]=="Disponibilidad")
{
    function HorarioGlobal($conn3, $query)
    {

        $queryList2 = mysqli_query($conn3, "{$query}");
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
    $noLaboral = 0;
    $cuantos = 0;

    $fecha    = $_POST['fecha'];
    $Hora     = $_POST['Hora'];
    $usuario_id = $_POST['usuario_id'];
    $doctor     = $_POST['doctor'];
    $sucursal    = $_POST['sucursal'];
   
    $dias = array('', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
    $DiaSemana = $dias[date('N', strtotime($fecha))];

    // Verificamos si es no laboral
    /*
    $queryList = mysqli_query($conn3, "SELECT count(id) as noLaboral FROM  noLaborales where fechaNoLaboral = '$fecha'  and (idDoctor = '$doctor' or idDoctor = '0')");
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

    if ($noLaboral == 0) {

        $queryList = mysqli_query($conn3, "SELECT count(idCitas) as cuantos FROM  citas where fecha = '$fecha'  and doctor = '$doctor'");
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $cuantos      = $rowMotorizado['cuantos'];
        }

        $queryList1 = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $doctor");
        while ($row_sucursal1 = mysqli_fetch_array($queryList1)) {
                $tiempoConsulta          = $row_sucursal1['tiempoConsulta'];
                $cantidadPacientes = $row_sucursal1['cantidadPacientes'];
        }

        if ($sucursal != "0") {
            
            HorarioGlobal($conn3, "SELECT * FROM  Horario_Sistema where  sucursal_id= $sucursal and usuario_id=$doctor");
            $TipoSucursalNombre = funcionMaster($sucursal,'id','descripcion','sucursales');

        } else {
            
            HorarioGlobal($conn3, "SELECT * FROM  config where ID_Usuario = $doctor");
            $TipoSucursalNombre = "General/Sin Sucursal";

        }

        if ($cuantos < $cantidadPacientes) {
            $cuantos2 = $cantidadPacientes - $cuantos;
        }

        $trabaja = 1;

        if ($lt == 0 and $DiaSemana == 'Lunes') {
            $trabaja = 0;
            $DiaNoPermitido = "Lunes";
        } elseif ($mt == 0 and $DiaSemana == 'Martes') {
            $trabaja = 0;
            $DiaNoPermitido = "Martes";
        } elseif ($et == 0 and $DiaSemana == 'Miercoles') {
            $trabaja = 0;
            $DiaNoPermitido = "Miercoles";
        } elseif ($jt == 0 and $DiaSemana == 'Jueves') {
            $trabaja = 0;
            $DiaNoPermitido = "Jueves";
        } elseif ($vt == 0 and $DiaSemana == 'Viernes') {
            $trabaja = 0;
            $DiaNoPermitido = "Viernes";
        } elseif ($st == 0 and $DiaSemana == 'Sabado') {
            $trabaja = 0;
            $DiaNoPermitido = "Sabado";
        } elseif ($dt == 0 and $DiaSemana == 'Domingo') {
            $trabaja = 0;
            $DiaNoPermitido = "Domingo";
        } else {

            if ($DiaSemana == 'Lunes') {
                //$sucursal = $sul;
                $d = $ld;
                $h = $lh;
                $dp = $ldp;
                $hp = $lhp;
            } elseif ($DiaSemana == 'Martes') {
                //$sucursal = $sum;
                $d = $md;
                $h = $mh;
                $dp = $mdp;
                $hp = $mhp;
            } elseif ($DiaSemana == 'Miercoles') {
                //$sucursal = $sue;
                $d = $ed;
                $h = $eh;
                $dp = $edp;
                $hp = $ehp;
            } elseif ($DiaSemana == 'Jueves') {
                //$sucursal = $suj;
                $d = $jd;
                $h = $jh;
                $dp = $jdp;
                $hp = $jhp;
            } elseif ($DiaSemana == 'Viernes') {
                //$sucursal = $suv;
                $d = $vd;
                $h = $vh;
                $dp = $vdp;
                $hp = $vhp;
            } elseif ($DiaSemana == 'Sabado') {
                //$sucursal = $sus;
                $d = $sd;
                $h = $sh;
                $dp = $sdp;
                $hp = $shp;
            } elseif ($DiaSemana == 'Domingo') {
                //$sucursal = $sud;
                $d = $dd;
                $h = $dh;
                $dp = $ddp;
                $hp = $dhp;
            }

            
            echo '<br><div style="width: 100%;text-align-last: center;"> El día <font color="#3c8dbc">' . $DiaSemana . '</font> <br> Se han Agendado <font color="#3c8dbc">' . $cuantos . '</font> Pacientes, de <font color="#3c8dbc">' . $cuantos2 . '</font> Cupos Disponibles </div><br>';

            if ($cuantos > 0) {
                /*
                foreach ($rangoNoPermitido as $key => $value) {
                    foreach ($value as $key1 => $value1) {
                        echo $key1.":".$value1."<br>";
                    }
                }
                */
                echo "
                    <table class='table'>
                        <thead class='thead-dark' style='background-color: #80808059;'>
                            <tr>
                                <th scope='col'>#</th>
                                <th scope='col'>Hora</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>Sucursal</th>
                                <th scope='col'>Motivo</th>
                            </tr>
                        </thead>
                        <tbody>";

                $queryList = mysqli_query($conn3, "SELECT * from citas where fecha = '$fecha' and (estado = 0 or estado = 1 or estado = 2) and doctor = '$doctor' order by Hora");
                $nrowl = mysqli_num_rows($queryList);
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $ContadorCitasPacientes++;
                    $Hora = $rowMotorizado['Hora'];
                    $Nombre = $rowMotorizado['nombre'];
                    $Motivo = $rowMotorizado['motivoConsulta'];

                    $Sucursal_Nombre = funcionMaster($rowMotorizado['sucursal'],'id','descripcion','sucursales');
                    if($Sucursal_Nombre == ""){
                        $Sucursal_Nombre = "General/Sin Sucursal";
                    }
                    echo "<tr>
                                            <th scope='row'>{$ContadorCitasPacientes}</th>
                                            <td>{$Hora}</td>
                                            <td>{$Nombre}</td>
                                            <td>{$Sucursal_Nombre}</td>
                                            <td>{$Motivo}</td>
                                        </tr>";
                }
                echo "</tbody>
                    </table>";
            }
        }

        if ($trabaja == 0) {
            echo "<font color = 'red'> El día {$DiaNoPermitido} no esta permitido programar citas según configuración de horario.</font>";
        }

        $hoy = date("Y-m-d");
        $horaEsteMomento = date("H:i:s");
        $horaEsteMomento2 = date("H:00:00");

        // calcular hora real
        if ($tiempoConsulta > 0 and $trabaja == 1) {

            if ($fecha == $hoy) {
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
            echo "<label>Horario de la Sucursal: $TipoSucursalNombre </label>";
            //echo de estos campos $d = $ld;$h = $lh;$dp = $ldp;$hp = $lhp;
            echo '<select name="Hora" id="Hora"  onChange="verHora();" class="form-control select2" style="width: 100%;"  required="required" >';
            echo "<option value='' selected> Seleccione </option>";
            do {
                $horaNormal  = date("g:i a", strtotime($horaM));

                $agendado = 0;
                $queryAgenda = mysqli_query($conn3, "SELECT count(idCitas) as agendado FROM  citas  where doctor = '$doctor' and Hora = '$horaM' and fecha = '$fecha' and estado <= '3'");

                $nrowl = mysqli_num_rows($queryAgenda);
                while ($row_agenda = mysqli_fetch_array($queryAgenda)) {
                    $agendado    = $row_agenda['agendado'];
                }

                if ($agendado == 0) {
                    if (count($rangoNoPermitido) > 0) {
                        foreach ($rangoNoPermitido as $rango) {
                            if ($horaM >= $rango[1] and $horaM <= $rango[2]) {
                                // no valido
                                echo "<option value='$horaM' disabled> $horaNormal </option>";
                            } else {
                                echo "<option value='$horaM' > $horaNormal [$horaM >= $rango[1] and $horaM <= $rango[2]] </option>";
                            }
                        }
                    } else {
                        echo "<option value='$horaM' > $horaNormal [($horaM >= $d and  $horaM <= $h)]</option>";
                    }
                }
                $horaM =  strtotime('' . $fecha . ' ' . $horaM . ' + ' . $tiempoConsulta . ' minute');
                $horaM = date("H:i:s", $horaM);
            } while (($horaM >= $d and  $horaM <= $h));

            // formateamos para la tarde
            if ($fecha == $hoy) {
                $horaM = $horaEsteMomento2;
            } else {
                $horaM = $dp;
            }

            //$horaM = $dp;
            do {

                $horaNormal  = date("g:i a", strtotime($horaM));

                $agendado = 0;
                $queryAgenda = mysqli_query($conn3, "SELECT count(idCitas) as agendado FROM  citas  where doctor = '$doctor' and Hora = '$horaM' and fecha = '$fecha' and estado <= '3'");

                $nrowl = mysqli_num_rows($queryAgenda);
                while ($row_agenda = mysqli_fetch_array($queryAgenda)) {
                    $agendado    = $row_agenda['agendado'];
                }

                $agendado = 0;
                if ($agendado == 0) {
                    // echo "<option value='$horaM' > $horaNormal </option>";
                    if (count($rangoNoPermitido) > 0) {
                        foreach ($rangoNoPermitido as $rango) {
                            if ($horaM >= $rango[1] and $horaM <= $rango[2]) {
                                // no valido
                                echo "<option value='$horaM' disabled> $horaNormal [Hora no laboral] </option>";
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
        } elseif ($tiempoConsulta == 0 and $trabaja == 1) {
            echo '<input type="time" class="form-control input-lg"  name="Hora" id="Hora"  onChange="verHora();" value="' . $Hora . '"  required>';
        }
    }

} 



elseif ($_POST["Tipo"] == "Disponibilidad_Hora") {
    function HorarioGlobal($conn3, $query)
    {

        $queryList2 = mysqli_query($conn3, "{$query}");
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
    $cuantos = 0;
    $fecha = $_POST['fecha'];
    $Hora = $_POST['Hora'];
    $doctor = $_POST['doctor'];
  
    $sucursal    = $_POST['sucursal'];
    $HoraV = $Hora . ':00';

    $dias = array('', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
    $DiaSemana = $dias[date('N', strtotime($fecha))];

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


    $queryList = mysqli_query($conn3, "SELECT count(idCitas) as cuantos FROM  citas where fecha = '$fecha'  and doctor = '$doctor'");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $cuantos      = $rowMotorizado['cuantos'];
    }

  $queryList1 = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $doctor");
  while ($row_sucursal1 = mysqli_fetch_array($queryList1)) {
      $tiempoConsulta          = $row_sucursal1['tiempoConsulta'];
      $cantidadPacientes = $row_sucursal1['cantidadPacientes'];
  }
 
  if ($sucursal != "0") {
      HorarioGlobal($conn3, "SELECT * FROM  Horario_Sistema where usuario_id = $doctor and sucursal_id= $sucursal");
  } else {
      HorarioGlobal($conn3, "SELECT * FROM  config where ID_Usuario = $doctor");
  }
    if ($cuantos < $cantidadPacientes) {
        $cuantos2 = $cantidadPacientes - $cuantos;
    }

    if ($lt == 0 and $DiaSemana == 'Lunes') {
        echo "<font color = 'red'> El día lunes no esta permitido programar citas según configuración de horario</font>";
    } elseif ($mt == 0 and $DiaSemana == 'Martes') {
        echo "<font color = 'red'> El día Martes no esta permitido programar citas según configuración de horario</font>";
    } elseif ($et == 0 and $DiaSemana == 'Miercoles') {
        echo "<font color = 'red'> El día Miercoles no esta permitido programar citas según configuración de horario</font>";
    } elseif ($jt == 0 and $DiaSemana == 'Jueves') {
        echo "<font color = 'red'> El día Jueves no esta permitido programar citas según configuración de horario</font>";
    } elseif ($vt == 0 and $DiaSemana == 'Viernes') {
        echo "<font color = 'red'> El día Viernes no esta permitido programar citas según configuración de horario</font>";
    } elseif ($st == 0 and $DiaSemana == 'Sabado') {
        echo "<font color = 'red'> El día Sabado no esta permitido programar citas según configuración de horario</font>";
    } elseif ($dt == 0 and $DiaSemana == 'Domingo') {
        echo "<font color = 'red'> El día Domingo no esta permitido programar citas según configuración de horario</font>";
    } 
    else {

        $ArregloDias["Lunes"] = $lt;
        $ArregloDias["Martes"] = $mt;
        $ArregloDias["Miercoles"] = $et;
        $ArregloDias["Jueves"] = $jt;
        $ArregloDias["Viernes"] = $vt;
        $ArregloDias["Sabado"] = $st;
        $ArregloDias["Domingo"] = $dt;

        $ArregloDias_1 = ["$ld", "$md", "$ed", "$jd", "$vd", "$sd", "$dd"];
        $ArregloDias_2 = ["$lh", "$mh", "$eh", "$jh", "$vh", "$sh", "$dh"];
        $ArregloDias_3 = ["$ldp", "$mdp", "$edp", "$jdp", "$vdp", "$sdp", "$ddp"];
        $ArregloDias_4 = ["$lhp", "$mhp", "$ehp", "$jhp", "$vhp", "$shp", "$dhp"];

        $cont = "0";
        $NoDisponible = "No";
        foreach ($ArregloDias as $key => $value) {

            if ($value == 1 and $DiaSemana == $key and $NoDisponible == "No") {
                if (($HoraV >= $ArregloDias_1[$cont] and  $HoraV < $ArregloDias_2[$cont]) or ($HoraV >= $ArregloDias_3[$cont] and  $HoraV < $ArregloDias_4[$cont])) {

                    $queryList = mysqli_query($conn3, "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor'");
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                        $Cuantoshora      = $rowMotorizado['Cuantoshora'];
                    }

                    if (count($rangoNoPermitido) > 0) {
                        foreach ($rangoNoPermitido as $rango) {
                            if ($HoraV >= $rango[3] and $HoraV <= $rango[3]) {
                                $Cuantoshora = 1;
                            }
                        }
                    }
                    
                    if ($Cuantoshora == 0) {
                        echo "<font color = 'blue'> Hora Disponible [{$key}] </font>";
                        echo '<center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h4> <strong>  G u a r d a r  </strong> </h4> </button></center>';
                    } else {
                        echo "<font color = 'red' size='5'> Hora  No disponible</font>";
                    }

                    $NoDisponible = "Si";
                } 
                else {
                    echo "<font color = 'red' size='5'> Horario: ($Hora)  no disponible [{$key}]según configuración </font>";
                    $NoDisponible = "Si";
                }
            } 
            $cont++;
        }

        if($NoDisponible=="0")
        {
            echo 'Se presento algún error, verificar fecha y hora, o contactar soporte via chat ';
        }

    }

}


elseif ($_POST["Tipo"] == "Verificar_Cliente") {

    $cliente = $_POST['identificacion'];

    $queryList1 = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id =$cliente");
    while ($row2 = mysqli_fetch_array($queryList1)) {

        $nombre      = $row2['nombre_cliente'];
        $telefono = $row2['whatsapp'];
        $correo = $row2['correo_cliente'];
    }

    if($cliente== "0")
    {
        echo '<div class="form-group">
            <div class="input-icon">
                <div align="left"><strong>Nombre</strong></div>
                <input type="text" class="form-control input-lg" name="nombre" id="nombre" placeholder="Nombre del Paciente" required>
            </div>
        </div> 
        
        <div class="form-group">
            <div class="input-icon">
                <div align="left"><strong>Correo</strong></div>
                <input type="text" class="form-control input-lg" name="correo" id="correo" placeholder="Correo del Paciente">
            </div>
        </div> 
        <div class="form-group">
            <div class="input-icon">
                <div align="left"><strong>Numero de Telefono [Colocar Indicacativo]</strong></div>
                <input type="text" class="form-control input-lg" name="telefono" id="telefono" placeholder="Telefono del Paciente" required>
            </div>
        </div>';
    }
    else {
        echo '<div class="form-group">
            <div class="input-icon">
                <div align="left"><strong>Correo</strong></div>
                <input type="text" class="form-control input-lg" name="correo" id="correo" placeholder="Correo del Paciente"  value="' . $correo . '" >
            </div>
        </div> 
        <div class="form-group">
            <div class="input-icon">
                <div align="left"><strong>Numero de Telefono [Colocar Indicacativo]</strong></div>
                <input type="text" class="form-control input-lg" name="telefono" id="telefono" placeholder="Telefono del Paciente" value="' . $telefono . '" required>
            </div>
        </div>';
    }
    
}






// Ajax para el modal //





elseif($_POST["Tipo"] == "Disponibilidad_Modal"){
    function HorarioGlobal($conn3, $query)
    {

        $queryList2 = mysqli_query($conn3, "{$query}");
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
    $noLaboral = 0;
    $cuantos = 0;

    $fecha    = $_POST['fecha'];
    $Hora     = $_POST['Hora'];
    $usuario_id = $_POST['usuario_id'];
    $doctor     = $_POST['doctor'];

     $sucursal    = $_POST['sucursal'];
    $HoraInicio = $_POST['HoraInicio'];
    $HoraFinal = $_POST['HoraFinal'];

    $dias = array('', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
    $DiaSemana = $dias[date('N', strtotime($fecha))];

    // Verificamos si es no laboral

    $queryList = mysqli_query($conn3, "SELECT count(id) as noLaboral FROM  noLaborales where fechaNoLaboral = '$fecha'  and (idDoctor = '$doctor' or idDoctor = '0')");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $noLaboral      = $rowMotorizado['noLaboral'];
    }

    if ($noLaboral == 0) {

        $queryList = mysqli_query($conn3, "SELECT count(idCitas) as cuantos FROM  citas where fecha = '$fecha'  and doctor = '$doctor'");
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
  while ($row_sucursal1 = mysqli_fetch_array($queryList1)) {
      $tiempoConsulta          = $row_sucursal1['tiempoConsulta'];
      $cantidadPacientes = $row_sucursal1['cantidadPacientes'];
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
            $DiaNoPermitido = "Lunes";
        } elseif ($mt == 0 and $DiaSemana == 'Martes') {
            $trabaja = 0;
            $DiaNoPermitido = "Martes";
        } elseif ($et == 0 and $DiaSemana == 'Miercoles') {
            $trabaja = 0;
            $DiaNoPermitido = "Miercoles";
        } elseif ($jt == 0 and $DiaSemana == 'Jueves') {
            $trabaja = 0;
            $DiaNoPermitido = "Jueves";
        } elseif ($vt == 0 and $DiaSemana == 'Viernes') {
            $trabaja = 0;
            $DiaNoPermitido = "Viernes";
        } elseif ($st == 0 and $DiaSemana == 'Sabado') {
            $trabaja = 0;
            $DiaNoPermitido = "Sabado";
        } elseif ($dt == 0 and $DiaSemana == 'Domingo') {
            $trabaja = 0;
            $DiaNoPermitido = "Domingo";
        } 
        else {

            if ($DiaSemana == 'Lunes') {$sucursal = $sul; $d = $ld; $h = $lh;$dp = $ldp; $hp = $lhp;}

            elseif ($DiaSemana == 'Martes') {$sucursal = $sum; $d = $md; $h = $mh;$dp = $mdp; $hp = $mhp;}

            elseif ($DiaSemana == 'Miercoles') {$sucursal = $sue; $d = $ed; $h = $eh;$dp = $edp; $hp = $ehp;}

            elseif ($DiaSemana == 'Jueves') {$sucursal = $suj; $d = $jd; $h = $jh;$dp = $jdp; $hp = $jhp;}

            elseif ($DiaSemana == 'Viernes') {$sucursal = $suv; $d = $vd; $h = $vh;$dp = $vdp; $hp = $vhp;}

            elseif ($DiaSemana == 'Sabado') {$sucursal = $sus; $d = $sd; $h = $sh;$dp = $sdp; $hp = $shp;}

            elseif ($DiaSemana == 'Domingo') {$sucursal = $sud; $d = $dd; $h = $dh;$dp = $ddp; $hp = $dhp;}

            echo '<br><div style="width: 100%;text-align-last: center;"> El día <font color="#3c8dbc">' . $DiaSemana . '</font> solo se atiende en ' . $sucursal . ' <br> Se han Agendado <font color="#3c8dbc">' . $cuantos . '</font> Pacientes, de <font color="#3c8dbc">' . $cuantos2 . '</font> Cupos Disponibles </div><br>';

            if ($cuantos > 0) {

                echo "<table class='table'>
                        <thead class='thead-dark' style='background-color: #80808059;'>
                            <tr>
                                <th scope='col'>#</th>
                                <th scope='col'>Hora</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>Motivo</th>
                            </tr>
                        </thead>
                        <tbody>";

                $queryList = mysqli_query($conn3, "SELECT * from citas where fecha = '$fecha' and (estado = 0 or estado = 1 or estado = 2) and doctor = '$doctor' order by Hora");
                $nrowl = mysqli_num_rows($queryList);
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $ContadorCitasPacientes++;
                    $Hora = $rowMotorizado['Hora'];
                    $Nombre = $rowMotorizado['nombre'];
                    $Motivo = $rowMotorizado['motivoConsulta'];

                    echo "<tr>
                            <th scope='row'>{$ContadorCitasPacientes}</th>
                            <td>{$Hora}</td>
                            <td>{$Nombre}</td>
                            <td>{$Motivo}</td>
                        </tr>";
                }

                echo "</tbody>
                    </table>";
            }

        }

        if ($trabaja == 0) {
            echo "<font color = 'red'> El día {$DiaNoPermitido} no esta permitido programar citas según configuración de horario.</font>";
        }

        $hoy = date("Y-m-d");
        $horaEsteMomento = date("H:i:s");
        $horaEsteMomento2 = date("H:00:00");

        // calcular hora real
        if ($tiempoConsulta > 0 and $trabaja == 1) {

            if ($fecha == $hoy) {
                $horaM = $horaEsteMomento2;
                $horaM_1 = $horaEsteMomento2;
            } else {
                $horaM = $d;
                $horaM_1 = $d;
            }
            // horaM es la hora actual para calcular
            // horaF es la hora final del ultimo turno (puede ser primer turno o segun turno)

            if ($hp <> '00:00:00') {
                $horaF = $hp;
            } else {
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

            $n = sizeof($arregloHorario);
            $Hora_Cliente = str_replace(':', '', $HoraInicio);
            $valor_mas_cercano = findClosest($arregloHorario, $n, $Hora_Cliente);

            if ($Hora_Cliente == $valor_mas_cercano) {
                echo "<br><br><label>Se ha seleccionado la hora que usted eligio</label><br>";
            } else {
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
                $queryAgenda = mysqli_query($conn3, "SELECT count(idCitas) as agendado FROM  citas  where doctor = '$doctor' and Hora = '$horaM' and fecha = '$fecha' and estado <= '3'");

                $nrowl = mysqli_num_rows($queryAgenda);
                while ($row_agenda = mysqli_fetch_array($queryAgenda)) {
                    $agendado    = $row_agenda['agendado'];
                }
                if ($agendado == 0) {
                    $selectedHora = "";
                    if ($horacomparar == $valor_mas_cercano) {
                        $selectedHora = "selected";
                    }
                    echo "<option value='$horaM' $selectedHora> $horaNormal </option>";
                }
                $horaM =  strtotime('' . $fecha . ' ' . $horaM . ' + ' . $tiempoConsulta . ' minute');
                $horaM = date("H:i:s", $horaM);
            } while (($horaM >= $d and  $horaM <= $h));

            // formateamos para la tarde
            $horaM = $dp;
            do {

                $horaNormal  = date("g:i a", strtotime($horaM));
                $horacomparar  = str_replace(':', '', (date("H:i", strtotime($horaM))));

                $agendado = 0;
                $queryAgenda = mysqli_query($conn3, "SELECT count(idCitas) as agendado FROM  citas  where doctor = '$doctor' and Hora = '$horaM' and fecha = '$fecha' and estado <= '3'");

                $nrowl = mysqli_num_rows($queryAgenda);
                while ($row_agenda = mysqli_fetch_array($queryAgenda)) {
                    $agendado    = $row_agenda['agendado'];
                }
                if ($agendado == 0) {
                    $selectedHora = "";
                    if ($horacomparar == $valor_mas_cercano) {
                        $selectedHora = "selected";
                    }
                    echo "<option value='$horaM' $selectedHora> $horaNormal </option>";
                }
                $horaM =  strtotime('' . $fecha . ' ' . $horaM . ' + ' . $tiempoConsulta . ' minute');
                $horaM = date("H:i:s", $horaM);
            } while (($horaM >= $dp and  $horaM <= $hp));
            echo '</select>';
        } 
        elseif ($tiempoConsulta == 0 and $trabaja == 1) {

            echo "<br><br><label>Hora</label>";
            echo '<input type="time" class="form-control input-lg"  name="Hora" id="Hora_modal"  onChange="verHora_modal();" value="' . $HoraInicio . '"  required>';
        }
    } 
    elseif ($noLaboral > 0) {
        echo "<font color = 'red'> <strong> Fecha indicada no es laborable </strong> </font>";
    }


}




elseif($_POST["Tipo"] == "Disponibilidad_Hora_Modal"){
    function HorarioGlobal($conn3, $query)
    {

        $queryList2 = mysqli_query($conn3, "{$query}");
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
    $cuantos = 0;
    $fecha = $_POST['fecha'];
    $Hora = $_POST['Hora'];
    $doctor = $_POST['doctor'];
    $sucursal   = $_POST['sucursal'];
    $HoraV = $Hora . ':00';

    $dias = array('', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
    $DiaSemana = $dias[date('N', strtotime($fecha))];

    $queryList = mysqli_query($conn3, "SELECT count(idCitas) as cuantos FROM  citas where fecha = '$fecha'  and doctor = '$doctor'");
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
  while ($row_sucursal1 = mysqli_fetch_array($queryList1)) {
      $tiempoConsulta          = $row_sucursal1['tiempoConsulta'];
      $cantidadPacientes = $row_sucursal1['cantidadPacientes'];
  }
 
  if ($sucursal != "0") {
      HorarioGlobal($conn3, "SELECT * FROM  Horario_Sistema where usuario_id = $doctor and sucursal_id= $sucursal");
  } else {
      HorarioGlobal($conn3, "SELECT * FROM  config where ID_Usuario = $doctor");
  }
    if ($cuantos < $cantidadPacientes) {
        $cuantos2 = $cantidadPacientes - $cuantos;
    }

    if ($lt == 0 and $DiaSemana == 'Lunes') {
        echo "<font color = 'red'> El día lunes no esta permitido programar citas según configuración de horario</font>";
    } elseif ($mt == 0 and $DiaSemana == 'Martes') {
        echo "<font color = 'red'> El día Martes no esta permitido programar citas según configuración de horario</font>";
    } elseif ($et == 0 and $DiaSemana == 'Miercoles') {
        echo "<font color = 'red'> El día Miercoles no esta permitido programar citas según configuración de horario</font>";
    } elseif ($jt == 0 and $DiaSemana == 'Jueves') {
        echo "<font color = 'red'> El día Jueves no esta permitido programar citas según configuración de horario</font>";
    } elseif ($vt == 0 and $DiaSemana == 'Viernes') {
        echo "<font color = 'red'> El día Viernes no esta permitido programar citas según configuración de horario</font>";
    } elseif ($st == 0 and $DiaSemana == 'Sabado') {
        echo "<font color = 'red'> El día Sabado no esta permitido programar citas según configuración de horario</font>";
    } elseif ($dt == 0 and $DiaSemana == 'Domingo') {
        echo "<font color = 'red'> El día Domingo no esta permitido programar citas según configuración de horario</font>";
    } 
    else {

        $ArregloDias["Lunes"] = $lt;
        $ArregloDias["Martes"] = $mt;
        $ArregloDias["Miercoles"] = $et;
        $ArregloDias["Jueves"] = $jt;
        $ArregloDias["Viernes"] = $vt;
        $ArregloDias["Sabado"] = $st;
        $ArregloDias["Domingo"] = $dt;

        $ArregloDias_1 = ["$ld", "$md", "$ed", "$jd", "$vd", "$sd", "$dd"];
        $ArregloDias_2 = ["$lh", "$mh", "$eh", "$jh", "$vh", "$sh", "$dh"];
        $ArregloDias_3 = ["$ldp", "$mdp", "$edp", "$jdp", "$vdp", "$sdp", "$ddp"];
        $ArregloDias_4 = ["$lhp", "$mhp", "$ehp", "$jhp", "$vhp", "$shp", "$dhp"];

        $cont = "0";
        $NoDisponible = "No";
        foreach ($ArregloDias as $key => $value) {

            if ($value == 1 and $DiaSemana == $key and $NoDisponible == "No") {
                if (($HoraV >= $ArregloDias_1[$cont] and  $HoraV < $ArregloDias_2[$cont]) or ($HoraV >= $ArregloDias_3[$cont] and  $HoraV < $ArregloDias_4[$cont])) {

                    $queryList = mysqli_query($conn3, "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor'");
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                        $Cuantoshora      = $rowMotorizado['Cuantoshora'];
                    }

                    if ($Cuantoshora == 0) {
                        echo "<label style='color:blue;'> Hora Disponible [{$key}] </label>";
                        echo '<center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h4> <strong>  G u a r d a r  </strong> </h4> </button></center>';
                    } else {
                        echo "<label style='color:red' size='5'> Hora  No disponible</label>";
                    }

                    $NoDisponible = "Si";
                } else {
                    echo "<label style='color:red' size='5'> Horario: ($Hora)  no disponible [{$key}]según configuración </label>";
                    $NoDisponible = "Si";
                }
            }
            $cont++;
        }

        if ($NoDisponible == "0") {
            echo 'Se presento algún error, verificar fecha y hora, o contactar soporte via chat ';
        }
    }

}
?>