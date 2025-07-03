<?php

if (isset($_POST['keyCitas'])) {
    date_default_timezone_set('America/Bogota');
    //include("conexiones/conexion.php");
    //include("funciones/conexiones.php");
    include("funciones/funciones.php");
    include 'funciones/conn3.php';

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
    $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

    $cuantos = 0;
    $fecha         = $_POST['fecha'];
    $Hora         = $_POST['Hora'];
    $doctor = $_POST['doctor'];
    $Sucursales    = $_POST['Sucursales'];
    $sucursal    = $_POST['sucursal'];
    // solo para ediciones
    if ($_POST['idCitas']) {
        $idCitas = $_POST['idCitas'];
        $condicionExtra = " and idCitas <> " . $idCitas . " ";
    } else {
        $idCitas == '0';
        $condicionExtra = " ";
    }

    if ($_POST['keyCitas'] == "disponibilidad") {

        $noLaboral = 0;
        $usuario_id = $_POST['usuario_id'];

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

        $rangoNoPermitido = array();
        $queryList = mysqli_query($conn3, "SELECT * FROM noLaborales WHERE '$fecha' >= fechaNoLaboralInicio  and   '$fecha' <= fechaNoLaboralFin  AND (idDoctor = '$doctor' or idDoctor = '0') AND periodo = 0");
        $nrowl = mysqli_num_rows($queryList);
        if ($nrowl == 1) {
            $noLaboral = 1;
        } else {
            $queryList = mysqli_query($conn3, "SELECT * FROM noLaborales WHERE '$fecha' >= fechaNoLaboralInicio  and   '$fecha' <= fechaNoLaboralFin  AND (idDoctor = '$doctor' or idDoctor = '0') AND periodo = 1");
            $nrowl = mysqli_num_rows($queryList);
            if ($nrowl > 0) {
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    array_push($rangoNoPermitido, [$rowMotorizado['fechaNoLaboralInicio'], $rowMotorizado['fechaNoLaboralFin'], $rowMotorizado['horaInicio'], $rowMotorizado['horaFinal']]);
                }
            }
        }

        if ($noLaboral == 0) {

            $queryList = mysqli_query($conn3, "SELECT count(idCitas) as cuantos FROM  citas where fecha = '$fecha'  and doctor = '$doctor'");
            $nrowl = mysqli_num_rows($queryList);
            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                $cuantos      = $rowMotorizado['cuantos'];
            }

            if ($Sucursales == 0) {
                $queryList1 = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $doctor");
                $nrowl = mysqli_num_rows($queryList1);
                while ($row2 = mysqli_fetch_array($queryList1)) {

                    $cantidadPacientes      = $row2['cantidadPacientes'];
                    $tiempoConsulta          = $row2['tiempoConsulta'];

                    $cantidadPacientes = $row2['cantidadPacientes'];

                    $lt = $row2['lt'];
                    $mt = $row2['mt'];
                    $et = $row2['et'];
                    $jt = $row2['jt'];
                    $vt = $row2['vt'];
                    $st = $row2['st'];
                    $dt = $row2['dt'];

                    $ld = $row2['ld'];
                    $md = $row2['md'];
                    $ed = $row2['ed'];
                    $jd = $row2['jd'];
                    $vd = $row2['vd'];
                    $sd = $row2['sd'];
                    $dd = $row2['dd'];

                    $lh = $row2['lh'];
                    $mh = $row2['mh'];
                    $eh = $row2['eh'];
                    $jh = $row2['jh'];
                    $vh = $row2['vh'];
                    $sh = $row2['sh'];
                    $dh = $row2['dh'];

                    $ldp = $row2['ldp'];
                    $mdp = $row2['mdp'];
                    $edp = $row2['edp'];
                    $jdp = $row2['jdp'];
                    $vdp = $row2['vdp'];
                    $sdp = $row2['sdp'];
                    $ddp = $row2['ddp'];

                    $lhp = $row2['lhp'];
                    $mhp = $row2['mhp'];
                    $ehp = $row2['ehp'];
                    $jhp = $row2['jhp'];
                    $vhp = $row2['vhp'];
                    $shp = $row2['shp'];
                    $dhp = $row2['dhp'];

                    $sul = $row2['sul'];
                    $sum = $row2['sum'];
                    $sue = $row2['sue'];
                    $suj = $row2['suj'];
                    $suv = $row2['suv'];
                    $sus = $row2['sus'];
                    $sud = $row2['sud'];
                }
            } else {
                $queryList1 = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $doctor");
                while ($row_sucursal1 = mysqli_fetch_array($queryList1)) {
                    $tiempoConsulta          = $row_sucursal1['tiempoConsulta'];
                    $cantidadPacientes = $row_sucursal1['cantidadPacientes'];
                }
                if ($sucursal != "0") {
                    HorarioGlobal($conn3, "SELECT * FROM  Horario_Sistema where  sucursal_id= $sucursal and usuario_id=$doctor");
                } else {
                    HorarioGlobal($conn3, "SELECT * FROM  config where ID_Usuario = $doctor");
                }
            }
            //////////////////////////////////////
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
                        echo '<tr> <th><font size="1">' . $Hora . ' </font></th><th><font size="1">' . $nombre . '</font></th><th><font size="1">' . $motivoConsulta . '</font></th> </tr>';
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
                echo '<select name="citaAgendada[Hora]" id="Hora"  onChange="verHora();" class="form-control select2" style="width: 100%;">';
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
                        // echo "<option value='$horaM' > $horaNormal </option>";
                        if (count($rangoNoPermitido) > 0) {
                            foreach ($rangoNoPermitido as $rango) {
                                if ($horaM >= $rango[2] and $horaM <= $rango[3]) {
                                    // no valido
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
                        // echo "<option value='$horaM' > $horaNormal </option>";
                        if (count($rangoNoPermitido) > 0) {
                            foreach ($rangoNoPermitido as $rango) {
                                if ($horaM >= $rango[2] and $horaM <= $rango[3]) {
                                    // no valido
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
            } else if ($tiempoConsulta == 0 and $trabaja == 1) {
                echo '<input type="time" class="form-control input-lg"  name="citaAgendada[Hora]" id="Hora"  onChange="verHora();" value="' . $Hora . '"  >';
            }
        } elseif ($noLaboral > 0) {
            echo "<font color = 'red'> <strong> Fecha indicada no es laborable </strong> </font>";
        }
    } else if ($_POST['keyCitas'] == "disponibilidadHora") {
        $HoraV = $Hora . ':00';

        $dias = array('', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
        $DiaSemana = $dias[date('N', strtotime($fecha))];
        $rangoNoPermitido = array();
        $queryList = mysqli_query($conn3, "SELECT * FROM noLaborales WHERE '$fecha' >= fechaNoLaboralInicio  and   '$fecha' <= fechaNoLaboralFin AND (idDoctor = '$doctor' or idDoctor = '0') AND periodo = 1");
        $nrowl = mysqli_num_rows($queryList);
        if ($nrowl > 0) {
            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                array_push($rangoNoPermitido, [$rowMotorizado['fechaNoLaboralInicio'], $rowMotorizado['fechaNoLaboralFin'], $rowMotorizado['horaInicio'], $rowMotorizado['horaFinal']]);
            }
        }

        $queryList = mysqli_query($conn3, "SELECT count(idCitas) as cuantos FROM  citas where fecha = '$fecha'  and doctor = '$doctor'");
        $nrowl = mysqli_num_rows($queryList);
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $cuantos      = $rowMotorizado['cuantos'];
        }


        if ($Sucursales == 0) {


            $queryList1 = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $doctor");
            $nrowl = mysqli_num_rows($queryList1);
            while ($row2 = mysqli_fetch_array($queryList1)) {

                $cantidadPacientes      = $row2['cantidadPacientes'];

                $cantidadPacientes = $row2['cantidadPacientes'];

                $lt = $row2['lt'];
                $mt = $row2['mt'];
                $et = $row2['et'];
                $jt = $row2['jt'];
                $vt = $row2['vt'];
                $st = $row2['st'];
                $dt = $row2['dt'];

                $ld = $row2['ld'];
                $md = $row2['md'];
                $ed = $row2['ed'];
                $jd = $row2['jd'];
                $vd = $row2['vd'];
                $sd = $row2['sd'];
                $dd = $row2['dd'];

                $lh = $row2['lh'];
                $mh = $row2['mh'];
                $eh = $row2['eh'];
                $jh = $row2['jh'];
                $vh = $row2['vh'];
                $sh = $row2['sh'];
                $dh = $row2['dh'];



                $ldp = $row2['ldp'];
                $mdp = $row2['mdp'];
                $edp = $row2['edp'];
                $jdp = $row2['jdp'];
                $vdp = $row2['vdp'];
                $sdp = $row2['sdp'];
                $ddp = $row2['ddp'];

                $lhp = $row2['lhp'];
                $mhp = $row2['mhp'];
                $ehp = $row2['ehp'];
                $jhp = $row2['jhp'];
                $vhp = $row2['vhp'];
                $shp = $row2['shp'];
                $dhp = $row2['dhp'];

                $sul = $row2['sul'];
                $sum = $row2['sum'];
                $sue = $row2['sue'];
                $suj = $row2['suj'];
                $suv = $row2['suv'];
                $sus = $row2['sus'];
                $sud = $row2['sud'];
            }
        } else {
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
        } elseif ($lt == 1 and $DiaSemana == 'Lunes') {
            if (($HoraV >= $ld and  $HoraV < $lh) or ($HoraV >= $ldp and  $HoraV < $lhp)) {


                $queryList = mysqli_query($conn3, "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and (Hora <= '{$HoraV}' and horaF > '{$HoraV}') and doctor = '$doctor' and estado <= '3' $condicionExtra ");
                // $queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor' and estado <= '3'");

                //echo "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' (Hora <==horaM}' and horaF > '{=}')'$HoraV' and doctor = '$doctor'";
                // echo "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor'";

                $nrowl = mysqli_num_rows($queryList);
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $Cuantoshora      = $rowMotorizado['Cuantoshora'];
                }
                if (count($rangoNoPermitido) > 0) {
                    foreach ($rangoNoPermitido as $rango) {
                        if ($HoraV >= $rango[2] and $HoraV <= $rango[3]) {
                            $Cuantoshora = 1;
                        }
                    }
                }

                if ($Cuantoshora == 0) {
                    echo "<font color = 'blue'> Hora disponible </font>";
                    echo "<input type='hidden' name='citaAgendada[agendarCita]' value='1'>";
                    // echo '  <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h4> <strong>  G u a r d a r  </strong> </h4> </button></center>';
                } else {
                    echo "<font color = 'red' size='5'> Hora  No disponible</font>";
                    echo "<input type='hidden' name='citaAgendada[agendarCita]' value='0'>";
                }
            } else {
                echo "<font color = 'red' size='5'> Horario ($Hora)  no disponible según configuración </font>";
                echo "<input type='hidden' name='citaAgendada[agendarCita]' value='0'>";
            }
        }

        // $ld $dh
        elseif ($mt == 1 and $DiaSemana == 'Martes') {
            if (($HoraV >= $md and  $HoraV < $mh) or ($HoraV >= $mdp and  $HoraV < $mhp)) {

                $queryList = mysqli_query($conn3, "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and (Hora <= '{$HoraV}' and horaF > '{$HoraV}') and doctor = '$doctor' and estado <= '3' $condicionExtra ");
                // $queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor' and estado <= '3'");
                $nrowl = mysqli_num_rows($queryList);
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $Cuantoshora      = $rowMotorizado['Cuantoshora'];
                }
                if (count($rangoNoPermitido) > 0) {
                    foreach ($rangoNoPermitido as $rango) {
                        if ($HoraV >= $rango[2] and $HoraV <= $rango[3]) {
                            $Cuantoshora = 1;
                        }
                    }
                }

                if ($Cuantoshora == 0) {
                    echo "<font color = 'blue'> Hora disponible </font>";
                    echo "<input type='hidden' name='citaAgendada[agendarCita]' value='1'>";
                    // echo '  <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h4> <strong>  G u a r d a r  </strong> </h4> </button></center>';
                } else {
                    echo "<font color = 'red' size='5'> Hora No disponible</font>";
                    echo "<input type='hidden' name='citaAgendada[agendarCita]' value='0'>";
                }
            } else {
                echo "<font color = 'red' size='5'> Horario no disponible según configuración </font>";
                echo "<input type='hidden' name='citaAgendada[agendarCita]' value='0'>";
            }
        } elseif ($et == 1 and $DiaSemana == 'Miercoles') {

            if (($HoraV >= $ed and  $HoraV < $eh) or ($HoraV >= $edp and  $HoraV < $ehp)) {

                $queryList = mysqli_query($conn3, "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and (Hora <= '{$HoraV}' and horaF > '{$HoraV}') and doctor = '$doctor' and estado <= '3' $condicionExtra ");
                // $queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor' and estado <= '3'");
                $nrowl = mysqli_num_rows($queryList);
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $Cuantoshora      = $rowMotorizado['Cuantoshora'];
                }
                if (count($rangoNoPermitido) > 0) {
                    foreach ($rangoNoPermitido as $rango) {
                        if ($HoraV >= $rango[2] and $HoraV <= $rango[3]) {
                            $Cuantoshora = 1;
                        }
                    }
                }
                if ($Cuantoshora == 0) {
                    echo "<font color = 'blue'> Hora disponible </font>";
                    echo "<input type='hidden' name='citaAgendada[agendarCita]' value='1'>";
                    // echo '  <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h4> <strong>  G u a r d a r  </strong> </h4> </button></center>';
                } else {
                    echo "<font color = 'red' size='5'> Hora No disponible</font>";
                    echo "<input type='hidden' name='citaAgendada[agendarCita]' value='0'>";
                }
            } else {
                echo "<font color = 'red' size='5'> Horario no disponible según configuración </font>";
                echo "<input type='hidden' name='citaAgendada[agendarCita]' value='0'>";
            }
        } elseif ($jt == 1 and $DiaSemana == 'Jueves') {
            if (($HoraV >= $jd and  $HoraV < $jh) or ($HoraV >= $jdp and  $HoraV < $jhp)) {


                $queryList = mysqli_query($conn3, "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and (Hora <= '{$HoraV}' and horaF > '{$HoraV}') and doctor = '$doctor' and estado <= '3' $condicionExtra ");
                // $queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor' and estado <= '3'");
                $nrowl = mysqli_num_rows($queryList);
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $Cuantoshora      = $rowMotorizado['Cuantoshora'];
                }
                if (count($rangoNoPermitido) > 0) {
                    foreach ($rangoNoPermitido as $rango) {
                        if ($HoraV >= $rango[2] and $HoraV <= $rango[3]) {
                            $Cuantoshora = 1;
                        }
                    }
                }
                if ($Cuantoshora == 0) {
                    echo "<font color = 'blue'> Hora disponible </font>";
                    echo "<input type='hidden' name='citaAgendada[agendarCita]' value='1'>";
                    // echo '  <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h4> <strong>  G u a r d a r  </strong> </h4> </button></center>';
                } else {
                    echo "<font color = 'red' size='5'> Hora No disponible</font>";
                    echo "<input type='hidden' name='citaAgendada[agendarCita]' value='0'>";
                }
            } else {
                echo "<font color = 'red' size='5'> Horario no disponible según configuración </font>";
                echo "<input type='hidden' name='citaAgendada[agendarCita]' value='0'>";
            }
        } elseif ($vt == 1 and $DiaSemana == 'Viernes') {

            if (($HoraV >= $vd and  $HoraV < $vh) or ($HoraV >= $vdp and  $HoraV < $vhp)) {

                $queryList = mysqli_query($conn3, "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and (Hora <= '{$HoraV}' and horaF > '{$HoraV}') and doctor = '$doctor' and estado <= '3' $condicionExtra ");
                // $queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor' and estado <= '3'");
                $nrowl = mysqli_num_rows($queryList);
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $Cuantoshora      = $rowMotorizado['Cuantoshora'];
                }
                if (count($rangoNoPermitido) > 0) {
                    foreach ($rangoNoPermitido as $rango) {
                        if ($HoraV >= $rango[2] and $HoraV <= $rango[3]) {
                            $Cuantoshora = 1;
                        }
                    }
                }
                if ($Cuantoshora == 0) {
                    echo "<font color = 'blue'> Hora disponible </font>";
                    echo "<input type='hidden' name='citaAgendada[agendarCita]' value='1'>";
                    // echo '  <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h4> <strong>  G u a r d a r  </strong> </h4> </button></center>';
                } else {
                    echo "<font color = 'red' size='5'> Hora No disponible</font>";
                    echo "<input type='hidden' name='citaAgendada[agendarCita]' value='0'>";
                }
            } else {
                echo "<font color = 'red' size='5'> Horario no disponible según configuración </font>";
                echo "<input type='hidden' name='citaAgendada[agendarCita]' value='0'>";
            }
        } elseif ($st == 1 and $DiaSemana == 'Sabado') {

            if (($HoraV >= $sd and  $HoraV < $sh) or ($HoraV >= $sdp and  $HoraV < $shp)) {


                $queryList = mysqli_query($conn3, "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and (Hora <= '{$HoraV}' and horaF > '{$HoraV}') and doctor = '$doctor' and estado <= '3' $condicionExtra ");
                // $queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor' and estado <= '3'");
                $nrowl = mysqli_num_rows($queryList);
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $Cuantoshora      = $rowMotorizado['Cuantoshora'];
                }
                if (count($rangoNoPermitido) > 0) {
                    foreach ($rangoNoPermitido as $rango) {
                        if ($HoraV >= $rango[2] and $HoraV <= $rango[3]) {
                            $Cuantoshora = 1;
                        }
                    }
                }
                if ($Cuantoshora == 0) {
                    echo "<font color = 'blue'> Hora disponible </font>";
                    echo "<input type='hidden' name='citaAgendada[agendarCita]' value='1'>";
                    // echo '  <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h4> <strong>  G u a r d a r  </strong> </h4> </button></center>';
                } else {
                    echo "<font color = 'red' size='5'> Hora No disponible</font>";
                    echo "<input type='hidden' name='citaAgendada[agendarCita]' value='0'>";
                }
            } else {
                echo "<font color = 'red' size='5'> Horario no disponible según configuración </font>";
                echo "<input type='hidden' name='citaAgendada[agendarCita]' value='0'>";
            }
        } elseif ($dt == 1 and $DiaSemana == 'Domingo') {

            if (($HoraV >= $dd and  $HoraV < $dh) or ($HoraV >= $ddp and  $HoraV < $dhp)) {

                $queryList = mysqli_query($conn3, "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and (Hora <= '{$HoraV}' and horaF > '{$HoraV}') and doctor = '$doctor' and estado <= '3' $condicionExtra ");
                // $queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor' and estado <= '3'");
                $nrowl = mysqli_num_rows($queryList);
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $Cuantoshora      = $rowMotorizado['Cuantoshora'];
                }
                if (count($rangoNoPermitido) > 0) {
                    foreach ($rangoNoPermitido as $rango) {
                        if ($HoraV >= $rango[2] and $HoraV <= $rango[3]) {
                            $Cuantoshora = 1;
                        }
                    }
                }
                if ($Cuantoshora == 0) {
                    echo "<font color = 'blue'> Hora disponible </font>";
                    echo "<input type='hidden' name='citaAgendada[agendarCita]' value='1'>";
                    // echo '  <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h4> <strong>  G u a r d a r  </strong> </h4> </button></center>';
                } else {
                    echo "<font color = 'red' size='5'> Hora No disponible</font>";
                    echo "<input type='hidden' name='citaAgendada[agendarCita]' value='0'>";
                }
            } else {
                echo "<font color = 'red' size='5'> Horario no disponible según configuración </font>";
                echo "<input type='hidden' name='citaAgendada[agendarCita]' value='0'>";
            }
        } else {

            echo 'Se presento algún error, verificar fecha y hora, o contactar soporte via chat ';
        }
    }
    exit();
}



if (!isset($_POST['citaAgendada'])) {
    $posibilidades = array('idCliente', 'idcliente', 'clienteId', 'clienteid', 'cliente_id', 'cliente_Id');
    $clienteExtraido = 0;
    for ($i = 0; $i < count($posibilidades); $i++) {
        if (isset($_GET[$posibilidades[$i]])) {
            if (is_numeric($_GET[$posibilidades[$i]])) {
                $clienteExtraido = $_GET[$posibilidades[$i]];
            } else {
                $clienteExtraido = base64_decode($_GET[$posibilidades[$i]]);
            }
        }
    }
    $clienteAgenda = mysqli_query($conn3, "SELECT * FROM cliente WHERE cliente_id = '{$clienteExtraido}'");
    if (mysqli_num_rows($clienteAgenda) == 1) {
        $clienteAgenda = mysqli_fetch_assoc($clienteAgenda);
        $whatsapp = $clienteAgenda['whatsapp'];
        $whatsapp =  substr($whatsapp, strlen($clienteAgenda['indicativo']));
        $whatsapp = str_replace("/*0*/", "", $whatsapp);
    }
?>
    <div class="box box-body row">
        <div class="form-group col-md-6">
            <div align="left">
                <strong>Usuario</strong>
            </div>
            <select id="doctor" name="citaAgendada[doctor]" class="form-control select2" style="width: 100%;" onChange="cargarFecha();">
                <option value="" selected disabled>Seleccione</option>
                <?php
                $citaUser = mysqli_query($conn3, "SELECT * FROM usuarios WHERE ACTIVO = 1");
                while ($citaUserRow = mysqli_fetch_array($citaUser)) {
                    echo "<option value='{$citaUserRow['ID']}'>{$citaUserRow['NOMBRE_USUARIO']} - {$citaUserRow['especialidad']}</option>";
                }
                ?>
            </select>
        </div>
        <style type="text/css">
            #div-fecha {
                display: none;
            }

            #div-Hora {
                display: none;
            }
        </style>
        <div id="div-fecha" class="form-group col-md-6">
            <!-- Fecha para verificar disponiblidad   -->
            <div align="left">
                <strong>Fecha</strong>
            </div>
            <input type="date" class="form-control input-lg" name="citaAgendada[fecha]" id="fecha" min="<?= date('Y-m-d') ?>" onChange="verDia();">
            <div id="div-results"></div>
        </div>
        <div class="form-group col-md-6">
            <div align="left">
                <strong>Nombre Paciente</strong>
            </div>
            <input type="text" class="form-control input-lg" name="citaAgendada[nombre]" placeholder="Nombre" value="<?= $clienteAgenda['nombre_cliente'] ?>">
        </div>
        <div class="form-group col-md-2" style="margin-bottom: auto;">
            <div align="left">
                <strong>Indicativo</strong>
            </div>
            <select id="indicativo" name="citaAgendada[indicativo]" class="form-control select2" style="width: 100%;">
                <?php
                $indicativosCitas = mysqli_query($conn3, "SELECT * FROM indicativos");
                while ($indicativosCitasRow = mysqli_fetch_array($indicativosCitas)) {
                    echo "<option value='{$indicativosCitasRow['numero']}'>{$indicativosCitasRow['numero']} {$indicativosCitasRow['nombre']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <div align="left">
                <strong>Celular</strong>
            </div>
            <input type="number" class="form-control input-lg" name="citaAgendada[telefono]" placeholder="3206547898" value="<?= $whatsapp ?>">
            <font color="red" size="2">Para enviar la notificación de whatsapp debe de colocar el código país antes del numero +57</font>
        </div>
        <div class="form-group col-md-6">
            <div align="left">
                <strong>Correo</strong>
            </div>
            <input type="email" class="form-control input-lg" name="citaAgendada[correo]" value="<?= $clienteAgenda['correo_cliente'] ?>" placeholder="Correo">
            <font color="red" size="2">Para enviar la notificación al correo colocar el correo de los contrario no colocarlo </font>
        </div>
        <div class="form-group col-md-6">
            <div align="left">
                <strong>Motivo de consulta</strong>
            </div>
            <select class="form-control select2" id="motivoConsulta" name="citaAgendada[motivoConsulta]" placeholder="Motivo de consulta" style="width:100%"value="<?php echo $motivoConsulta ?>" onchange="tiempoMotivoConsulta(this.value, 'duracion')">
            
            <?php if ($motivoConsulta != '') { ?>
                              <option value='<?= $motivoConsulta ?>'> <?= $motivoConsulta ?> </option>
                            <?php } else { ?>
                              <option value="" selected="selected">Seleccione...</option>
                            <?php } ?>
                            <?php
                            $queryList = mysqli_query($conn3, "SELECT * FROM  Motivos_Consulta");
                            $nrowl = mysqli_num_rows($queryList);
                            while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                              // $cod = $row_recordset32A['cliente_id'];
                              $id = $row_recordset32A['id'];
                              $nombre = $row_recordset32A['descripcion'];

                              echo "<option value='$id'> $nombre </option>";
                            }
                            ?>

            </select>
        </div>

        <div class="form-group col-md-6">
            <div align="left">
                <strong>Tiempo de Cita</strong>
            </div>
            <select id="duracion" name="citaAgendada[duracion]" class="form-control select2" data-placeholder="Seleccione el tiempo en minutos" style="width: 100%;">
                <option>5</option>
                <option>10</option>
                <option>15</option>
                <option>20</option>
                <option>30</option>
                <option>45</option>
                <option>60</option>
                <option>80</option>
                <option>120</option>
            </select>
        </div>
        <div class="form-group col-md-12">
            <div align="center">
                <label>
                    <input type="radio" name="citaAgendada[P]" value="0" class="flat-red" checked>
                    <i class="fa fa-user"></i> Presencial

                    <input type="radio" name="citaAgendada[P]" value="2" class="flat-red" checked>
                    <i class="fa fa-user"></i> Domiciliaria

                    <input type="radio" name="citaAgendada[P]" value="1" class="flat-red" checked>
                    <i class="fa fa-video-camera"></i> Virtual
                </label>
            </div>
        </div>
        <div align="center">
            <div id="div-resultsHora">
                <input type="hidden" name="citaAgendada[agendarCita]" value="0">
            </div>
        </div>
        <input type="hidden" name="citaAgendada[usuario_id]" id="usuario_id" value="<?= $_SESSION['ID'] ?>">
        <input type="hidden" name="citaAgendada[NOMBRE_USUARIO]" value="<?= $_SESSION['NOMBRE_USUARIO'] ?>">
        <input type="hidden" name="citaAgendada[clienteId]" value="<?= $clienteId ?>">
        <input type="hidden" name="citaAgendada[Sucursales]" id="Sucursales" value="<?= $Sucursales ?>">
        <input type="hidden" name="citaAgendada[sucursal]" id="sucursal" value='<?= $_SESSION["sucursal"]; ?>'>
    </div>

    <script type="text/javascript">
        function verDia() {
            // estas son las variables que enviamos
            var fecha = $("#fecha").val();
            var Hora = $("#Hora").val();
            var usuario_id = $("#usuario_id").val();
            var doctor = $("#doctor").val();
            var idCitas = $("#idCitas").val();
            var Sucursales = $("#Sucursales").val();
            var sucursal = $("#sucursal").val();
            // aqui enviamos el mensaje por medio de un arreglo     
            console.log(Sucursales);
            console.log(sucursal);
            $.ajax({
                type: "POST",
                url: "agendarCitasInclude.php",
                data: {
                    keyCitas: "disponibilidad",
                    fecha: fecha,
                    Hora: Hora,
                    usuario_id: usuario_id,
                    doctor: doctor,
                    Sucursales: Sucursales,
                    sucursal: sucursal,
                    idCitas: idCitas
                },
                success: function(response) {
                    $('#div-results').html(response);
                }
            });
        };

        function verHora() {
            // estas son las variables que enviamos
            var fecha = $("#fecha").val();
            var Hora = $("#Hora").val();
            var usuario_id = $("#usuario_id").val();
            var doctor = $("#doctor").val();
            var idCitas = $("#idCitas").val();
            var Sucursales = $("#Sucursales").val();
            var sucursal = $("#sucursal").val();
            // aqui enviamos el mensaje por medio de un arreglo     
            $.ajax({
                type: "POST",
                url: "agendarCitasInclude.php",
                data: {
                    keyCitas: "disponibilidadHora",
                    fecha: fecha,
                    Hora: Hora,
                    usuario_id: usuario_id,
                    doctor: doctor,
                    Sucursales: Sucursales,
                    sucursal: sucursal,
                    idCitas: idCitas
                },
                success: function(response) {
                    $('#div-resultsHora').html(response);
                }
            });
        };

        function cargarFecha() {
            var x = document.getElementById('div-fecha');
            x.style.display = 'none';
            if (x.style.display === 'none') {
                x.style.display = 'block';
            }
        }

        $(document).ready(function() {
            $('#duracion').select2({
                tags: true,
                createTag: function(params) {
                    // Don't offset to create a tag if there is no @ symbol
                    if (params.term.search('^[0-9]+$') == 0) {
                        // Return null to disable tag creation
                        return {
                            id: params.term,
                            text: params.term
                        }
                    } else {
                        return null;
                    }
                }
            });
        });

        // seleccione el indicativo correspondiente
        <?php
        if (!empty($clienteExtraido)) {
            $indicativo = funcionMaster($clienteExtraido, 'cliente_id', 'indicativo', 'cliente');
        } else {
            $indicativo = funcionMaster($_SESSION['ID'], 'ID', 'Indicativo', 'usuarios');
        }
        ?>
        $(window).on("load", function() {
            $("#indicativo > option[value='<?php echo $indicativo ?>']").attr("selected", true);
            $('#indicativo').select2();
        });
    </script>
<?php
} else if (isset($_POST['citaAgendada']) && $_POST['citaAgendada']['agendarCita'] == 1) {

    $doctor                 = $_POST['citaAgendada']['doctor'];
    $fecha                  = $_POST['citaAgendada']['fecha'];
    $CODI_CLIENTE           = $_POST['citaAgendada']['CODI_CLIENTE'];
    $Fecha                  = $_POST['citaAgendada']['Fecha'];
    $Hora                   = $_POST['citaAgendada']['Hora'];
    $nombre                 = $_POST['citaAgendada']['nombre'];
    $frecuencia             = $_POST['citaAgendada']['frecuencia'];
    $cantidad               = $_POST['citaAgendada']['cantidad'];
    $telefono               = $_POST['citaAgendada']['indicativo'] . $_POST['citaAgendada']['telefono'];
    $correo                 = $_POST['citaAgendada']['correo'];
    $motivoConsulta         = $_POST['citaAgendada']['motivoConsulta'];
    $usuario_id             = $_POST['citaAgendada']['usuario_id'];
    $estado                 = 1;
    $registrado             = date("Y-m-d H:i:s");
    $P                   = $_POST['citaAgendada']['P'];
    $idCitas             = $_POST['citaAgendada']['idCitas'];
    $clienteid           = $_POST['citaAgendada']['clienteId'];
    $duracion            = $_POST['citaAgendada']['duracion'];
    $Nuevahora = date('H:i:s', (strtotime('+ ' . $duracion . ' minute', strtotime($Hora))));

    $queryListu = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $doctor");
    $nrowlu = mysqli_num_rows($queryListu);
    while ($rowMotorizadou = mysqli_fetch_array($queryListu)) {
        $nombreD = $rowMotorizadou['NOMBRE_USUARIO'];
        $especialidad = $rowMotorizadou['especialidad'];
    }

    if ($clienteid == '') {
        $clienteid = 0;
    }

    if ($P == 0) {
        $ConsultaTipo = 'Presencial';
    } elseif ($P == 1) {
        $ConsultaTipo = 'Virtual';
    }

    $queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario=$usuario_id");
    $nrowl = mysqli_num_rows($queryList);
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $nombreF = $rowMotorizado['nombreF'];
        $telefonoF = $rowMotorizado['telefonoF'];
        $direccionF = $rowMotorizado['direccionF'];
        $emailF = $rowMotorizado['emailF'];
        $whatsapp = $rowMotorizado['whatsapp'];
        $LogoF           = $rowMotorizado['logoF'];
        $emailF = $rowMotorizado['emailF'];
        $sul = $rowMotorizado['sul'];
        $sum = $rowMotorizado['sum'];
        $sue = $rowMotorizado['sue'];
        $suj = $rowMotorizado['suj'];
        $suv = $rowMotorizado['suv'];
        $sus = $rowMotorizado['sus'];
        $sud = $rowMotorizado['sud'];
        if (strlen($LogoF) > 0) {
            $Logo = '<img src="{$Base}/logos/' . $LogoF . '" height="60" width="120">';
        }
    }

    $dias = array('', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');

    $DiaSemana = $dias[date('N', strtotime($fecha))];

    if ($DiaSemana == 'Lunes') {
        $sucursal = $sul;
    } elseif ($DiaSemana == 'Martes') {
        $sucursal = $sum;
    } elseif ($DiaSemana == 'Miercoles') {
        $sucursal = $sue;
    } elseif ($DiaSemana == 'Jueves') {
        $sucursal = $suj;
    } elseif ($DiaSemana == 'Viernes') {
        $sucursal = $suv;
    } elseif ($DiaSemana == 'Sabado') {
        $sucursal = $sus;
    } elseif ($DiaSemana == 'Domingo') {
        $sucursal = $sud;
    }

    $evento_googlecalendar_id_anterior = "";
    if ($idCitas > 0) {
        ////////////////////////////// CREACION DE TABLAS ///////////////////////////////////////////////////
        $Campo1 = mysqli_query($conn3, "show COLUMNS from citas WHERE Field = 'evento_googlecalendar_id_anterior';");
        $nrowCampo1 = mysqli_num_rows($Campo1);
        if ($nrowCampo1 == "0") {
            mysqli_query($conn3, "ALTER TABLE `citas` ADD `evento_googlecalendar_id_anterior` TEXT NULL DEFAULT '' COMMENT 'Si la cita actual fue creada por la edicion de una antigua, se cargara el evento id de esa cita inicial *Creado desde modulo de agendar cita*'");
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////
        $queryList = mysqli_query($conn3, "SELECT * FROM  citas WHERE idCitas='$idCitas'");
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $evento_googlecalendar_id_anterior = $rowMotorizado['evento_googlecalendar_id'];
        }

        mysqli_query($conn3, "delete from citas where idCitas = $idCitas");
    }

    $sucursal = $_POST['sucursal'];
    if ($sucursal == "") {
        $sucursal = "0";
    }

    mysqli_query($conn3, "INSERT INTO citas (doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id, tipo, idCliente,duracion,HoraF,evento_googlecalendar_id_anterior,sucursal) 
VALUES ('$doctor' ,'$fecha' ,'$Hora' ,'$nombre' ,'$telefono' ,'$correo' ,'$motivoConsulta' ,'$estado' ,'$registrado', '$usuario_id', '$P', '$clienteid','$duracion','$Nuevahora','$evento_googlecalendar_id_anterior','$sucursal')");

    //consulta el id de la cita
    $cita_id = mysqli_insert_id($conn3);

    if (!empty($cita_id)) {
        $_POST['citaAgendada']['confirmaAgenda'] = true;
        $_POST['citaAgendada']['idCita'] = $cita_id;
    }

    $queryList = mysqli_query($conn3, "SELECT max(idCitas) as idCitas FROM  citas");
    $nrowl = mysqli_num_rows($queryList);
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $idCitas = $rowMotorizado['idCitas'];
    }

    $queryList2 = mysqli_query($conn3, "SELECT * FROM sucursales where idUsuario = $doctor");
    $nrowl = mysqli_num_rows($queryList2);
    while ($rowMotorizado2 = mysqli_fetch_array($queryList2)) {
        $sucursal = $rowMotorizado2['descripcion'];
        $idE = $rowMotorizado2['id'];
    }

    $queryList3 = mysqli_query($conn3, "SELECT * FROM config where ID_Usuario=$usuario_id");
    $nrowl = mysqli_num_rows($queryList3);
    while ($rowMotorizado = mysqli_fetch_array($queryList3)) {
        $CitasGoogleCalendar = $rowMotorizado['CitasGoogleCalendar'];
        $nombreF = $rowMotorizado['nombreF'];
        $telefonoF = $rowMotorizado['telefonoF'];
        $direccionF = $rowMotorizado['direccionF'];
        $emailF = $rowMotorizado['emailF'];
        $whatsapp = $rowMotorizado['whatsapp'];
        $LogoF           = $rowMotorizado['logoF'];
        $emailF = $rowMotorizado['emailF'];
        $sul = $rowMotorizado['sul'];
        $sum = $rowMotorizado['sum'];
        $sue = $rowMotorizado['sue'];
        $suj = $rowMotorizado['suj'];
        $suv = $rowMotorizado['suv'];
        $sus = $rowMotorizado['sus'];
        $sud = $rowMotorizado['sud'];
        if (strlen($LogoF) > 0) {
            $Logo = '<img src="{$Base}/logos/' . $LogoF . '" height="60" width="120">';
        }
    }


$QueryMotivoC = mysqli_query($conn3, "SELECT * FROM  Motivos_Consulta WHERE id = $motivoConsulta ");
while ($RowMotivoC = mysqli_fetch_array($QueryMotivoC)) {
  $MotivoConsulta_Texto = str_replace(['"', "'"], '',$RowMotivoC['descripcion']);
}

    if ($P == 1) {
        $mensajePago = 'por favor realizar el pago por el siguiente link ' . $Base . 'pagarcita/' . $idCitas . ' ';
    }

    if ($idCitas > 0) {

        $mensajeW = 'Registro de cita Medica.

Estimado paciente *' . $nombre . '* ,Se registró una cita Medica.

Fecha y Hora:  *' . $fecha . '* *' . $Hora . '*  Motivo de la consulta:' . $MotivoConsulta_Texto . '. 

Su consulta es con el Doctor: *' . $nombreD . '*.  


Atte. *ALTE MedicalSoft* Teléfono ' . $telefonoF . ' Correo ' . $emailF . '';

        $accion = 0;

        $mensajeEnviado = Whatsapp_sent_cliente($linkkey, $telefono, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

        $mensaje2 = ' *' . funcionMaster($doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios') . '* la cita Ha sido agendada con la paciente *' . $nombre . '*,  *' . $fecha . '* a las *' . $Hora . '* en *' . $sucursal . '*. Motivo: *' . $MotivoConsulta_Texto . '* Atte ALTE MedicalSoft';

        Whatsapp_sent($whatsapp, $mensaje2);
    } else {

        $mensajeW = '* Registro de cita Medica.* 

Estimado paciente *' . $nombre . '*, Se registró una cita Medica. 

Fecha y Hora: *' . $fecha . '*  *' . $Hora . '*.

Motivo de la consulta: ' . $MotivoConsulta_Texto . ' *.

Su consulta es con el Doctor: *' . $nombreD . '*.  


Atte. *' . $nombreF . '* Teléfono ' . $telefonoF . ' Correo ' . $emailF . '';

        $accion = 0;

        $mensajeEnviado = Whatsapp_sent_cliente($linkkey, $telefono, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

        $mensaje2 = '*' . $doctor . '*  se ha agendado  una cita con la paciente *' . $nombre . '*,  *' . $fecha . '* a las *' . $Hora . '* en *' . $sucursal . '*. Motivo: *' . $MotivoConsulta_Texto . '* Atte ALTE MedicalSoft';

        Whatsapp_sent($whatsapp, $mensaje2);
    }

    $_POST['citaAgendada']['mensajeEnviado'] = $mensajeEnviado;

    $_GET['receptor'] = $correo;
    $_GET['asunto'] = "Cita Medica";
    $_GET['mensaje'] = $mensajeW;
    include 'plantillaCorreo.php';
}
?>