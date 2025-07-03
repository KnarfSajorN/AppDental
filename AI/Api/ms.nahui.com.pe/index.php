<?php
// recibimos el json por post
// esto nos devuelve el contenido del archivo de texto pasado como argumento en este caso el json
$data = json_decode(file_get_contents('php://input'), true);

// estructura
// tipo:
// 1 = registro cliente
// 2 = cita
// 3 = factura
// 4 = whatsapp
// 5 = Correo
// 6 = Consulta horarios


$tipo = $data['tipo'];

// decode el codigo del cliente
$token = substr(base64_decode($data['token']), 1, -1);
$pass = $data['pass'];
$usuario = $_SERVER['REMOTE_ADDR'];
// array to text
$texto = json_encode($data);





if ($pass == md5(base64_decode($data['token']))) {
    // conexión con base de datos sieved
    $hostApiS = 'localhost';
    $userdbApiS = 'sievenso_sistemaPrincipal';
    $pass2ApiS = '5qA?o]t6d-h25qA?o]t6d-h2';
    $DBApiS = 'sievenso_sistema';
    $conn3ApiS = mysqli_connect($hostApiS, $userdbApiS, $pass2ApiS, $DBApiS);

    // log de servicios utilizados
    // insert into api
    mysqli_query($conn3ApiS, "INSERT INTO api_log
(tipo, token, pass, usuario, fecha ,datos)
 VALUES 
('$tipo', '$token', '$pass', '$usuario', now(), '$texto');");

    // query cliente
    $queryClienteActivo = mysqli_query($conn3ApiS, "SELECT * from clienteActivo where codigoPrincipal like '%$token%' ");
    $nrowl = mysqli_num_rows($queryClienteActivo);
    while ($rowMotorizado = mysqli_fetch_array($queryClienteActivo)) {
        $id      = $rowMotorizado['id'];
        $correo      = $rowMotorizado['USUARIO'];
        $nombre               = $rowMotorizado['NOMBRE_USUARIO'];
        $whatsappn               = $rowMotorizado['whatsappn'];
        $email               = $rowMotorizado['email'];
        $fecha               = $rowMotorizado['fec_ingreso'];
        $codigoPrincipal               = strtolower($rowMotorizado['codigoPrincipal']);
        $estadoCap               = $rowMotorizado['estadoCap'];
        $pais               = $rowMotorizado['pais'];
        $especialidad               = $rowMotorizado['especialidad'];
        $usuarios               = $rowMotorizado['usuarios'];
        $producto               = $rowMotorizado['producto'];
        $activo              = $rowMotorizado['ACTIVO'];
    }

    // conexión con medical
    $hostApiM = 'localhost';
    $userdbApiM = 'medicaso_rootBase';
    $pass2ApiM = '5qA?o]t6d-h25qA?o]t6d-h2';

    if ($producto <> '3') {
        $DBApiM = 'medicaso_ms_' . $codigoPrincipal.'_test';
    }
    if ($producto == '3') {
        $DBApiM = 'medicaso_ps_' . $codigoPrincipal.'_test';
    }

    $conn3ApiM = mysqli_connect($hostApiM, $userdbApiM, $pass2ApiM, $DBApiM);

    // Check conn3ApiM
    if (mysqli_connect_error($conn3ApiM)) {
        // se murio la flor
        echo "<hr>Errores de Conexión favor intentar mas tarde:<hr>" . mysqli_connect_error();
    } else {
        // si el cliente esta activo consultamos sino se cierra 
        if ($activo <> 0) {
            // case para el tipo de servicio
            switch ($tipo) {
                case 1:
                    // cliente
                    $nombre = $data['nombre'];
                    $documento = $data['documento'];
                    $tipoDoc = $data['tipoDoc'];
                    $fechaNacimiento = $data['fechaNacimiento'];
                    $telefono = $data['telefono'];
                    $correo = $data['correo'];

                    if ($nombre <> '' and $documento <> '' and $tipoDoc <> '' and $fechaNacimiento <> '' and $telefono <> '' and $correo <> '') {
                        mysqli_query($conn3ApiM, "INSERT INTO cliente (usuario_id,nombre_cliente,celular_cliente,correo_cliente,CODI_CLIENTE,tipo_cliente,telefono_cliente,fechaNacimiento,whatsapp)
                values 
                ('1','$nombre','$telefono','$correo','$documento','$tipoDoc','$telefono','$fechaNacimiento','$telefono');")
                            or die(mysqli_error($conn3ApiM));
                        // retornamos un arreglo con un mensaje de exito
                        $Objeto->mensaje = 'Cliente registrado correctamente';
                    } else {
                        $Objeto->mensaje = 'Favor de llenar todos los campos requeridos';
                    };
                    $JSON = json_encode($Objeto);
                    echo $JSON;
                    break;
                case 2:
                    // cita
                    $documentoCliente = $data['documentoCliente'];
                    $fechaCita = $data['fechaCita'];
                    $horaCita = $data['horaCita'];
                    $nombreCliente = $data['nombreCliente'];
                    $telefonoCliente = $data['telefonoCliente'];
                    $correoCliente = $data['correoCliente'];
                    $motivoConsulta = $data['motivoConsulta'];
                    $tipoConsulta = $data['tipoConsulta'];
                    $doctor = $data['doctor'];
                    $duracion = $data['duracion'];

                    if ($documentoCliente <> '' and $fechaCita <> '' and $horaCita <> '' and $nombreCliente <> '' and $telefonoCliente <> '' and $correoCliente <> '' and $motivoConsulta <> '' and $tipoConsulta <> '') {
                        mysqli_query($conn3ApiM, "INSERT INTO citas (doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, registrado, usuario_id, tipo, idCliente,duracion)
                    values 
                    ('$doctor','$fechaCita','$horaCita','$nombreCliente','$telefonoCliente','$correoCliente','$motivoConsulta',now(),'1','$tipoConsulta','0','$duracion');") or die(mysqli_error($conn3ApiM));

                        // retornamos un arreglo con un mensaje de exito
                        $Objeto->mensaje = 'Cita registrada correctamente';
                    } else {
                        $Objeto->mensaje = 'Favor de llenar todos los campos requeridos';
                    };
                    $JSON = json_encode($Objeto);
                    echo $JSON;
                    break;
                case 3:
                    // Factura
                    $documentoCliente = $data['documentoCliente'];
                    $fechaOper = $data['fechaOper'];
                    $fechaVenc = $data['fechaVenc'];
                    $descripcion = $data['descripcion'];
                    $totalBruto = $data['totalBruto'];
                    $impuestos = $data['impuestos'];
                    $totalNeto = $data['totalNeto'];
                    $descuentos = $data['descuentos'];
                    $montoPagado = $data['montoPagado'];

                    // YABA PAPI

                    $JSON = json_encode($Objeto);
                    echo $JSON;
                    break;
                case 4:
                    // servicio de envio whatsapp                
                    if ($data['telefono'] <> '' and $data['mensaje'] <> '') {
                        include '../../masterFunciones.php';
                        // envio de whatsapp
                        $data = [
                            'phone' => $data['telefono'], // Receivers phone
                            'body' => $data['mensaje'], // Message
                        ];
                        $json = json_encode($data);
                        // $linkkey = "http://181.61.24.137:8000/send-message/dGVzdA==";
                        $url = $linkkey;
                        $options = stream_context_create([
                            'http' => [
                                'method'  => 'POST',
                                'header'  => 'Content-type: application/json',
                                'content' => $json
                            ]
                        ]);
                        // Send a request
                        $result = file_get_contents($url, false, $options);
                        $obj = json_decode($result);
                        $mensaje2 = $obj->{'message'};
                        $enviado =  $obj->{'sent'};
                        $id =  $obj->{'id'};

                        $Objeto->mensaje = 'Whatsapp enviado correctamente';
                    } else {
                        $Objeto->mensaje = 'Favor de llenar todos los campos requeridos';
                    };
                    $JSON = json_encode($Objeto);
                    echo $JSON;
                    break;
                case 5:
                    // servicio de envio correo
                    if ($data['correo'] <> '' and $data['asunto'] <> '' and $data['mensajeCorreo'] <> '') {
                        // envio de correo
                        $para = $data['correo'];
                        $titulo = $data['asunto'];
                        $mensaje = $data['mensajeCorreo'];
                        $cabeceras = 'From: noreply@medicalsoftcolombia.com';
                        mail($para, $titulo, $mensaje, $cabeceras);
                        $Objeto->mensaje = 'Correo enviado correctamente';
                    } else {
                        $Objeto->mensaje = 'Favor de llenar todos los campos requeridos';
                    };
                    $JSON = json_encode($Objeto);
                    echo $JSON;
                    break;
                case 6:
                    // servicio para consulta de horarios disponibles segun un rango de fechas
                    $fechaInicio = $data['fechaInicio'];
                    $fechaFin = $data['fechaFin'];
                    $horaInicio = $data['horaInicio'];
                    $horaFin = $data['horaFin'];
                    $lapso = $data['lapso'];
                    $doctor = $data['doctor'];

                    // cuantos dias hay entre las fechas
                    $fechaInicio = strtotime($fechaInicio);
                    $fechaFin = strtotime($fechaFin);
                    $diferencia = $fechaFin - $fechaInicio;
                    $dias_ = ($diferencia / (60 * 60 * 24)) + 1;
                    $dias_ = intval($dias_);

                    $dias = array('', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
                    $DiaSemana = $dias[date('N', strtotime($fecha))];
                    
                    
                    // ciclo para recorrer los dias
                    for ($i = 0; $i < $dias_; $i++) {
                        $fecha = date('Y-m-d', strtotime($data['fechaInicio'] . ' +' . $i . ' days'));
                        // $Objeto->dia[$i] = $fecha;

                        $queryList = mysqli_query($conn3ApiM, "SELECT count(idCitas) as cuantos FROM  citas where fecha = '$fecha'  and doctor = '$doctor'");
                        $nrowl = mysqli_num_rows($queryList);
                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                            $cuantos      = $rowMotorizado['cuantos'];
                        }

                        $queryList1 = mysqli_query($conn3ApiM, "SELECT * FROM  config where ID_Usuario = $doctor");
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

                        if ($cuantos < $cantidadPacientes) {
                            $cuantos2 = $cantidadPacientes - $cuantos;
                        }

                        $trabaja = 1;

                        if ($lt == 0 and $DiaSemana == 'Lunes') {
                            $trabaja = 0;
                            $Objeto->mensaje = "El día lunes no esta permitido programar citas según configuración de horario, ";
                        } elseif ($mt == 0 and $DiaSemana == 'Martes') {
                            $trabaja = 0;

                            $Objeto->mensaje = "El día Martes no esta permitido programar citas según configuración de horario";
                        } elseif ($et == 0 and $DiaSemana == 'Miercoles') {
                            $trabaja = 0;

                            $Objeto->mensaje = "El día Miercoles no esta permitido programar citas según configuración de horario";
                        } elseif ($jt == 0 and $DiaSemana == 'Jueves') {
                            $trabaja = 0;

                            $Objeto->mensaje = "El día Jueves no esta permitido programar citas según configuración de horario";
                        } elseif ($vt == 0 and $DiaSemana == 'Viernes') {
                            $trabaja = 0;

                            $Objeto->mensaje = "El día Viernes no esta permitido programar citas según configuración de horario";
                        } elseif ($st == 0 and $DiaSemana == 'Sabado') {
                            $trabaja = 0;

                            $Objeto->mensaje = "El día Sabado no esta permitido programar citas según configuración de horario";
                        } elseif ($dt == 0 and $DiaSemana == 'Domingo') {
                            $trabaja = 0;

                            $Objeto->mensaje = "El día Domingo no esta permitido programar citas según configuración de horario";
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

                            $Objeto->dia[$fecha][0] = $cuantos2;
                        }

                        $hoy = date("Y-m-d");
                        $horaEsteMomento = date("H:i:s");
                        $horaEsteMomento2 = date("H:00:00");

                        // calcular hora real
                        if ($lapso > 0 and $trabaja == 1) {
                            $horaM = $d;

                            $contador = 0;
                            do {
                                $horaNormal  = date("g:i a", strtotime($horaM));
                                

                                $agendado = 0;
                                $queryAgenda = mysqli_query($conn3ApiM, "SELECT count(idCitas) as agendado FROM  citas  where doctor = '$doctor' and Hora = '$horaM' and fecha = '$fecha' and estado <= '3'");

                                $nrowl = mysqli_num_rows($queryAgenda);
                                while ($row_agenda = mysqli_fetch_array($queryAgenda)) {
                                    $agendado    = $row_agenda['agendado'];
                                }
                                if ($agendado == 0) {
                                    $contador = $contador + 1;
                                    $Objeto->dia[$fecha][$contador] = $horaM;
                                    
                                }
                                $horaM =  strtotime('' . $fecha . ' ' . $horaM . ' + ' . $lapso . ' minute');
                                $horaM = date("H:i:s", $horaM);
                            } while (($horaM >= $horaInicio and  $horaM <= $horaFin));
                            
                        }

                    }
                    $JSON = json_encode($Objeto);
                    echo $JSON;
                    break;
                
                default:
                    $Objeto->mensaje = 'No se reconoce el tipo de servicio: '. $data['tipo'];
                    $JSON = json_encode($Objeto);
                    echo $JSON;
                    break;
            }
        } else {
            $Objeto->mensaje = 'Token no apto para uso';
            $JSON = json_encode($Objeto);
            echo $JSON;
        }
    }
} else {
    $Objeto->mensaje = 'Error en las credenciales de acceso';
    $JSON = json_encode($Objeto);
    echo $JSON;
}