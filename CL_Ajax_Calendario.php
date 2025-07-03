<?php
date_default_timezone_set('America/Bogota');
include 'funciones/conn3.php';

// para que no se vuelva a ejecutar la funcion -> funcionMaster ya que en este apartado Envio Whatsapp se incluira el archivo funciones.php
if($_POST["Tipo_Consulta"] != "Envio Whatsapp"){
    function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla)
    {
        include 'funciones/conn3.php';
        $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
        $nrowl = mysqli_num_rows($query);
        while ($row = mysqli_fetch_array($query)) {

            $text = $row[$campoImprimir];
        }
        return  $text;
    }
}

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











if($_POST["Tipo_Consulta"]=="Mover Cita")
{
    $usuario_id = $_POST["usuario_id"];//id del usuario que realizo la edicion

    $FechaHoraInicio = $_POST["FechaHoraInicio"];
    $idCita = $_POST["idCita"];
    //separar fecha y hora de $FechaHoraInicio
    $FechaHoraInicio = explode("T", $FechaHoraInicio);
    $Fecha = $FechaHoraInicio[0];
    $Hora = $FechaHoraInicio[1];

    $doctor = $_POST["usuario_modificar_cita"];
    //si se modifica aqui modificar en CL_Calendario.php
    $queryList = mysqli_query($conn3, "SELECT * FROM  citas  where idCitas='$idCita'");
    while ($RowCitas = mysqli_fetch_array($queryList)) {
        $duracion = $RowCitas["duracion"];
        $doctor_inicial = $RowCitas["doctor"];
        $cliente_id = $RowCitas["idCliente"];

        $FechaAnterior = $RowCitas["fecha"];
        $HoraAnterior = $RowCitas["Hora"];
        $Sucursal_Cita = $RowCitas["sucursal"];
    }

    if($doctor!=$doctor_inicial){
        
        $CambioDoctor='<br> Ademas la cita se cambio del usuario <b>'.funcionMaster($doctor_inicial,'ID','NOMBRE_USUARIO','usuarios'). '</b> a el usuario <b>'.funcionMaster($doctor,'ID','NOMBRE_USUARIO','usuarios').'</b>.';
    
    }

    $queryList = mysqli_query($conn3, "SELECT * FROM  usuarios  where ID='$doctor'");
    while ($RowCitas = mysqli_fetch_array($queryList)) {
        $Usuario = $RowCitas["NOMBRE_USUARIO"];
    }

    $queryList = mysqli_query($conn3, "SELECT * FROM noLaborales WHERE fechaNoLaboral = '$Fecha' AND (idDoctor = '$doctor' or idDoctor = '0') AND periodo = 0");
    $nrowl = mysqli_num_rows($queryList);
    if ($nrowl == 1) {
        $noLaboral = 1;
    } else {
        $queryList = mysqli_query($conn3, "SELECT * FROM noLaborales WHERE fechaNoLaboral = '$Fecha' AND (idDoctor = '$doctor' or idDoctor = '0') AND periodo = 1");
        $nrowl = mysqli_num_rows($queryList);
        if ($nrowl > 0) {
            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                $contador++;
                $ArrayRangoNoPermitido[$contador]["Inicio"] = $rowMotorizado['horaInicio'];
                $ArrayRangoNoPermitido[$contador]["Final"] = $rowMotorizado['horaFinal'];
            }
        }
    }



    //echo "SELECT * FROM noLaborales WHERE fechaNoLaboral = '$Fecha' AND (idDoctor = '$doctor' or idDoctor = '0') AND periodo = 0";
    //echo "SELECT * FROM noLaborales WHERE fechaNoLaboral = '$Fecha' AND (idDoctor = '$doctor' or idDoctor = '0') AND periodo = 1";

    $HoraFinal = date('H:i:s',(strtotime ( '+ '.$duracion.' minute' , strtotime ($Hora) )) );

    function EventoNoHorasDisponibles($Inicio, $Final, $NoInicio, $NoFinal) {
        // Convertir los parámetros a objetos DateTime



        $FechaInicio = new DateTime($Inicio);
        $FechaFinal = new DateTime($Final);
        $NoDisponibleInicio = new DateTime($NoInicio);
        $NoDisponibleFinal = new DateTime($NoFinal);
        
        $NoDisponibleInicio->modify("+1 minute");
        $NoDisponibleFinal->modify("-1 minute");
        // Verificar que la hora inicial y final del evento no estén dentro del rango no permitido
        if ($FechaInicio >= $NoDisponibleInicio && $FechaInicio <= $NoDisponibleFinal) {
          return false;
        }
        if ($FechaFinal >= $NoDisponibleInicio && $FechaFinal <= $NoDisponibleFinal) {
          return false;
        }
      
        // El evento está dentro del rango permitido
        return true;
      }
    
    $NoDisponible=0;
    foreach ($ArrayRangoNoPermitido as $key => $value) {

        $start = "{$Fecha}T{$Hora}";
        $end = "{$Fecha}T{$HoraFinal}";
        $notAllowedStart = "{$Fecha}T{$value['Inicio']}";
        $notAllowedEnd = "{$Fecha}T{$value['Final']}";

        $isWithinAllowedHours = EventoNoHorasDisponibles($start, $end, $notAllowedStart, $notAllowedEnd);

        if (!$isWithinAllowedHours) {
            $ArregloRespuesta["Estado"] = false;
            $ArregloRespuesta["Mensaje"] =  "El evento no está dentro del rango permitido <br> [Se encuentra en una fecha/hora no laborable registrada en configuracion y perfil]";
            $NoDisponible++;
        } 





    }

    if($NoDisponible==0){

        



        $queryList1 = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $doctor");
        while ($row_sucursal1 = mysqli_fetch_array($queryList1)) {
            $tiempoConsulta          = $row_sucursal1['tiempoConsulta'];
            $cantidadPacientes = $row_sucursal1['cantidadPacientes'];
        }
        
        $MensajeSucursalArreglo="";
        if($Sucursal_Cita!="0"){
            HorarioGlobal($conn3, "SELECT * FROM  Horario_Sistema where usuario_id = $doctor AND sucursal_id = $Sucursal_Cita");
            $MensajeSucursalArreglo="<br>Sucursal: ".funcionMaster($Sucursal_Cita,'id','descripcion','sucursales');
        }else{
            HorarioGlobal($conn3, "SELECT * FROM  config where ID_Usuario = $doctor");
            $MensajeSucursalArreglo="<br>Sucursal: Ninguna/General.";
        }
        

        //echo $lt.' '.$mt.' '.$et.' '.$jt.' '.$vt.' '.$st.' '.$dt."<br>";
        //echo $ld.' '.$md.' '.$ed.' '.$jd.' '.$vd.' '.$sd.' '.$dd."<br>";
        //echo $lh.' '.$mh.' '.$eh.' '.$jh.' '.$vh.' '.$sh.' '.$dh."<br>";
        //echo $ldp.' '.$mdp.' '.$edp.' '.$jdp.' '.$vdp.' '.$sdp.' '.$ddp."<br>";
        //echo $lhp.' '.$mhp.' '.$ehp.' '.$jhp.' '.$vhp.' '.$shp.' '.$dhp."<br>";
        //echo $sul.' '.$sum.' '.$sue.' '.$suj.' '.$suv.' '.$sus.' '.$sud."<br>";

        $dias = array('', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
        $DiaSemana = $dias[date('N', strtotime($Fecha))];
        $trabaja = 1;

        if ($lt == 0 and $DiaSemana == 'Lunes') {
            $trabaja = 0;
            $DiaNoPermitido="Lunes";
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

        }

        //echo $sucursal.' '.$d.' '.$h.' '.$dp.' '.$hp."<br>";

        if($doctor!=$doctor_inicial && $Sucursal_Cita!=0){
            $ArregloRespuesta["Estado"] = false;
            $ArregloRespuesta["Mensaje"] .= "<label style='font-size: 1.5rem;'>Esta Cita Fue Asignada a Una Sucursal por lo Que No se Puede Mover a Otro Usuario</label>";

            echo json_encode($ArregloRespuesta);
            exit();
        }

        if($trabaja == 0){
            $ArregloRespuesta["Estado"] = false;
            $ArregloRespuesta["Mensaje"] .= "El Dia [{$DiaNoPermitido}] No Esta Activado en el Calendario del Usuario";

            echo json_encode($ArregloRespuesta);
            exit();
        }
        
        

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

        $HoraV = $Hora;
        $cont = "0";
        $NoDisponible = "No";
        foreach ($ArregloDias as $key => $value) {

            if ($value == 1 and $DiaSemana == $key and $NoDisponible == "No") {
                if (($HoraV >= $ArregloDias_1[$cont] and  $HoraV < $ArregloDias_2[$cont]) or ($HoraV >= $ArregloDias_3[$cont] and  $HoraV < $ArregloDias_4[$cont])) {
                    //echo "$HoraV";
                    //$queryList = mysqli_query($conn3, "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$Fecha' and hora = '$HoraV' and doctor = '$doctor'");
                    $queryList = mysqli_query($conn3, "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$Fecha' and (Hora <= '{$HoraV}' and horaF > '{$HoraV}') and doctor = '$doctor' and idCitas != '$idCita'");
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                        $Cuantoshora      = $rowMotorizado['Cuantoshora'];
                    }
                    //Si solicitaron que puedan agendar varios pacientes en una misma hora por lo que se deja en 0 este campo
                    //$Cuantoshora=0;
                    if ($Cuantoshora == 0) {
                        //$ArregloRespuesta["Estado"] = true;
                        //$ArregloRespuesta["Mensaje"] = "Hora Disponible";
                        //echo '<center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h4> <strong>  G u a r d a r  </strong> </h4> </button></center>';
                        $HoraDisponible=true;
                    } else {
                        $ArregloRespuesta["Estado"] = false;
                        $ArregloRespuesta["Mensaje"] = "Hora No Disponible, Existe cita para esa hora";

                        $HoraDisponible=false;
                    }
                } else {
                    $ArregloRespuesta["Estado"] = false;
                    
                    $ArregloRespuesta["Mensaje"] = "Hora No Disponible <br> [Fuera de Horario] <hr> <b>$DiaSemana</b> <br> Horario #1 [$d - $h] <br> Horario #2 [$dp - $hp] ".$MensajeSucursalArreglo."<hr>";
                    $HoraDisponible=false;
                }
            } 
            $cont++;
        }

        //
        if($HoraDisponible==true){
            
            $queryList = mysqli_query($conn3, "SELECT * FROM citas where idCitas = '$idCita' limit 1");
            $rowMotorizado = mysqli_fetch_assoc($queryList);
            //mysqli_
            $QueryAEditar = mysqli_real_escape_string($conn3,json_encode($rowMotorizado,true));
            $FechaUpdate = $Fecha;
            $HoraUpdate = $Hora;
            $Duracion = funcionMaster($idCita,'idCitas','duracion','citas');
            $HoraUpdateFinal = date('H:i:s', (strtotime('+ ' .$Duracion. ' minute', strtotime($HoraUpdate))));
            $QueryUpdate = "UPDATE citas SET fecha = '$FechaUpdate', Hora='$HoraUpdate', usuario_id='$usuario_id', doctor='$doctor', HoraF='$HoraUpdateFinal' WHERE idCitas = '$idCita'";

            $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'Log_Querys'");
            $nrowtabla = mysqli_num_rows($tabla);
            if ($nrowtabla == 0) {

                $query = "CREATE TABLE `Log_Querys` (
                `id` int(11) NOT NULL,
                `Fecha` date DEFAULT NULL,
                `Hora` time DEFAULT NULL,
                `cliente_id` int(11) DEFAULT NULL,
                `usuario_id` int(11) DEFAULT NULL,
                `Ip` TEXT NULL DEFAULT  '',
                `Tabla` TEXT NULL DEFAULT  '',
                `campo_id` TEXT NULL DEFAULT  '' COMMENT 'este es el id de la tabla llenada en el campo *Tabla*',
                `QueryAntiguo` TEXT NULL DEFAULT  '',
                `QueryNuevo` TEXT NULL DEFAULT  '',
                `Estado` TEXT NULL DEFAULT  ''
            ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

                $creaciontabla = mysqli_query($conn3, $query);
                if (!$creaciontabla) {
                    echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
                } else {
                    mysqli_query($conn3, "ALTER TABLE `Log_Querys` ADD PRIMARY KEY (`id`);");
                    mysqli_query($conn3, "ALTER TABLE `Log_Querys` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
                }
            }
            
            $FechaActual = date("Y-m-d");
            $HoraActual = date("H:i:s");

            $Ip = $_SERVER['REMOTE_ADDR'];
            $Tabla = "citas";
            $campo_id = $idCita;

            $QueryUpdateRespuesta = mysqli_query($conn3,$QueryUpdate);
            
            $ArregloGuardar["Fecha"]= $FechaActual;
            $ArregloGuardar["Hora"]= $HoraActual;
            $ArregloGuardar["usuario_id"]= $usuario_id;
            $ArregloGuardar["cliente_id"]= $cliente_id;

            $ArregloGuardar_RES["Ip"]= $Ip;
            $ArregloGuardar_RES["Tabla"]= $Tabla;
            $ArregloGuardar_RES["campo_id"]= $campo_id;
            $ArregloGuardar_RES["QueryAntiguo"]= $QueryAEditar;
            $ArregloGuardar_RES["QueryNuevo"]= $QueryUpdate;
            

            foreach ($ArregloGuardar as $key => $value) {
                $SQL_Campo.=$key.',';
                $SQL_Valor.="'".$value."',";
            }
            $SQL_Campo = trim($SQL_Campo, ',');
            $SQL_Valor = trim($SQL_Valor, ',');
            foreach ($ArregloGuardar_RES as $key => $value) {
                $SQL_Campo_RES.=$key.',';
                $SQL_Valor_RES.="'".mysqli_real_escape_string($conn3,$value)."',";
            }
            $SQL_Campo_RES = trim($SQL_Campo_RES, ',');
            $SQL_Valor_RES = trim($SQL_Valor_RES, ',');
            
            
            if ($QueryUpdateRespuesta) {
                $Estado = "Query Correcto";
                $ArregloRespuesta["Estado"] = true;
                $ArregloRespuesta["Mensaje"] = "<br> Se actualizo la fecha de la cita correctamente. <u> <br>Fecha Anterior: $FechaAnterior - $HoraAnterior</u>";
                $Query_Log = mysqli_query($conn3, "INSERT INTO Log_Querys($SQL_Campo,$SQL_Campo_RES,Estado) 
                                                            VALUES ($SQL_Valor,$SQL_Valor_RES,'$Estado');");
                if (!$Query_Log) {
                    $ArregloRespuesta["Estado"] = "Warning";
                    $ArregloRespuesta["Mensaje"] = $ArregloRespuesta["Mensaje"].", pero hubo un inconveniente en el guardado del historial de citas.";
                }

            } else {
                $Estado = mysqli_real_escape_string($conn3,"Query Error: " . mysqli_error($conn3));
                $ArregloRespuesta["Estado"] = false;
                $ArregloRespuesta["Mensaje"] = "La cita no se actualizo correctamente";

                $QueryAUpdate = mysqli_real_escape_string($conn3, $QueryUpdate);
                $Query_Log = mysqli_query($conn3, "INSERT INTO Log_Querys($SQL_Campo,$SQL_Campo_RES,Estado) 
                                                            VALUES ($SQL_Valor,$SQL_Valor_RES,'$Estado');");
                if (!$Query_Log) {
                    $ArregloRespuesta["Mensaje"] = $ArregloRespuesta["Mensaje"]." y en el historial de citas.";
                }

            }

            ////////////////////////////////////////? Validacion si esta activo el google calendar //////////////////////////////////
            $queryConfig = mysqli_query($conn3, "SELECT * FROM config where ID_Usuario = '$doctor' limit 1");
            while ($RowConfig = mysqli_fetch_array($queryConfig)) {
                $CitasGoogleCalendar = $RowConfig['CitasGoogleCalendar'];
            }

            if($CitasGoogleCalendar!="No"){
                $ArregloRespuesta["GoogleCalendar"] = true;
            }
            ////////////////////////////////////////? Validacion si esta activo el google calendar //////////////////////////////////

        }
        
    }
    if($ArregloRespuesta["Estado"]==true){
        $ArregloRespuesta["Mensaje"] .= $CambioDoctor;
    }
    $ArregloRespuesta["Mensaje"] .= "<br> <b>Usuario asignado a la cita: ".$Usuario."</b>";
    

    echo json_encode($ArregloRespuesta);
}
else if($_POST["Tipo_Consulta"]=="Agregar Notas Adicionales"){

    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'Citas_NotasAdicionales'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {

        $query = "CREATE TABLE `Citas_NotasAdicionales` (
                `id` int(11) NOT NULL,
                `Fecha` date DEFAULT NULL,
                `Hora` time DEFAULT NULL,
                `cliente_id` int(11) DEFAULT NULL,
                `usuario_id` int(11) DEFAULT NULL,
                `Nota` TEXT NULL DEFAULT  '',
                `cita_id` TEXT NULL DEFAULT  '' COMMENT 'este es el id de la tabla citas',
                `Creacion_Dinamica` text DEFAULT '',
                `Activo` varchar(5) DEFAULT '1'
            ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `Citas_NotasAdicionales` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `Citas_NotasAdicionales` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    }

    $FechaActual = date("Y-m-d");
    $HoraActual = date("H:i:s");

    $Notas = mysqli_real_escape_string($conn3,$_POST["Resultados"]["Notas_Cita"]);
    $idCitas = $_POST["Resultados"]["idCitas"];
    $usuario_id = $_POST["Resultados"]["usuario_id"];

    $queryList = mysqli_query($conn3, "SELECT * FROM citas where idCitas = '$idCitas' limit 1");
    $rowMotorizado = mysqli_fetch_assoc($queryList);
    $cliente_id = $rowMotorizado["idCliente"];


    //insert a la tabla de arriba
    $Query_Log = mysqli_query($conn3,"INSERT INTO Citas_NotasAdicionales(Fecha,Hora,cliente_id,usuario_id,Nota,cita_id)
                                    VALUES ('$FechaActual','$HoraActual','$cliente_id','$usuario_id','$Notas','$idCitas')");

    if ($Query_Log) {
        $ArregloRespuesta["Estado"] = true;
        $ArregloRespuesta["Mensaje"] = "Se registro la nota correctamente";
    }else{
        $ArregloRespuesta["Estado"] = false;
        $ArregloRespuesta["Mensaje"] = "No se registro la nota correctamente".mysqli_error($conn3);

    }

    echo json_encode($ArregloRespuesta,true);
}

else if($_POST["Tipo_Consulta"]=="Historial Notas Adicionales"){

    $idCitas = $_POST["idCitas"];

    $ArregloFinal = array();
    $queryList = mysqli_query($conn3, "SELECT * FROM Citas_NotasAdicionales where cita_id = '$idCitas'");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $ArregloRespuesta["Fecha"] = $rowMotorizado["Fecha"];
    $ArregloRespuesta["Hora"] = $rowMotorizado["Hora"];
    $ArregloRespuesta["Nota"] = $rowMotorizado["Nota"];

    //insertar el arreglo de arriba dentro de otro push

    array_push($ArregloFinal,$ArregloRespuesta);
    }

    echo json_encode($ArregloFinal,true);
}

else if($_POST["Tipo_Consulta"] == "Envio Whatsapp"){

    include 'funciones/funciones.php';
    $idCita = $_POST["idCita"];

    ////////////////////////////////////////// Envio Mensaje Whatsapp ///////////////////////////////////

    $QueryCita = mysqli_query($conn3, "SELECT * FROM citas where idCitas = '$idCita' limit 1");
    while ($RowCita = mysqli_fetch_array($QueryCita)) {
        $cliente_id = $RowCita['idCliente'];
        $MotivoConsulta_id = $RowCita['motivoConsulta'];
        $doctor = $RowCita['doctor'];
        $Fecha = $RowCita['fecha'];
        $Hora = $RowCita['Hora'];
        $sucursal = $RowCita['sucursal'];
        $Nombre = funcionMaster($cliente_id,'cliente_id','nombre_cliente','cliente');
        $MotivoConsulta = funcionMaster($MotivoConsulta_id,'id','descripcion','Motivos_Consulta');
        $NombreSucursal = funcionMaster($sucursal,'id','descripcion','sucursales');
        $TextoSucursal="";
        if($NombreSucursal!=""){
            $TextoSucursal = "en *$NombreSucursal*.";
        }
        $Whastapp = funcionMaster($cliente_id,'cliente_id','whatsapp','cliente');
        $NombreDoctor = funcionMaster($doctor,'ID','NOMBRE_USUARIO','usuarios');
    }

    
    

    $mensajeW = 'Reagendamiento de cita Medica.

    Estimado paciente *' . $Nombre . '* ,Se le reagendo una cita Medica.
    
    Fecha y Hora:  *' . $Fecha . '* *' . $Hora . '*  Motivo de la consulta: *' . $MotivoConsulta . '*. 
    
    Su consulta es con el Doctor: *' . $NombreDoctor . '*.  
    
    '.$TextoSucursal.'
    Atte. *ALTE Dentalsoft*';

    $accion = 0;

    Whatsapp_sent_cliente($linkkey, $Whastapp, $mensajeW, $cliente_id, $usuario_id, $Whastapp, $accion);

    //echo "($linkkey, $Whastapp, $mensajeW, $cliente_id, $usuario_id, $Whastapp, $accion)";
}
?>

