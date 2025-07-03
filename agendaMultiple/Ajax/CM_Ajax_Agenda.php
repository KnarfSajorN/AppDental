<?php 

try {

    session_start();
    
    include __DIR__ . "/../../funciones/conn3.php";
    include __DIR__ . "/../../funciones/funciones.php";
    
    $linkkey = $_SESSION["linkkey"];

    $Tabla = "citas";
    $fechaActual = date("Y-m-d H:i:s");


    switch ($_POST["type"]) {
        case 'crear':
            $detalle = json_decode($_POST["detalle"], true);
            $usuario_id = $_POST["usuario_id"];
            $ID_principal = $_POST["ID_principal"];
            $sucursal = $_POST["sucursal"] != "" ? $_POST["sucursal"] : 0;

            foreach ($detalle as $detalleCita) {

                $nombre_cliente = funcionMaster($detalleCita['idCliente'], "cliente_id", "nombre_cliente", "cliente");
                $celular_cliente = funcionMaster($detalleCita['idCliente'], "cliente_id", "whatsapp", "cliente");
                // $celular_cliente = funcionMaster($detalleCita['idCliente'], "cliente_id", "celular_cliente", "cliente");
                $correo_cliente = funcionMaster($detalleCita['idCliente'], "cliente_id", "correo_cliente", "cliente");
                
                $duracionCita = funcionMaster($detalleCita['motivoConsulta'], "id", "Tiempo", "Motivos_Consulta");
                $MotivoConsulta_Texto = funcionMaster($detalleCita['motivoConsulta'], "id", "descripcion", "Motivos_Consulta");
                $horaFin = date('H:i:s', (strtotime('+ ' . $duracionCita . ' minute', strtotime($detalleCita['Hora']))));
                
                $CitasGoogleCalendar = funcionMaster($detalleCita['doctor'], "ID_Usuario", "CitasGoogleCalendar", "config");
                $nombreD = funcionMaster($detalleCita['doctor'], "ID", "NOMBRE_USUARIO", "usuarios");
                $SucursalNombre = funcionMaster($sucursal, "id", "descripcion", "sucursales");
                

                $QueryInsert = "INSERT INTO {$Tabla} SET 
                                doctor = '{$detalleCita['doctor']}',
                                fecha = '{$detalleCita['fecha']}',
                                Hora = '{$detalleCita['Hora']}',
                                nombre = '{$nombre_cliente}',
                                telefono = '{$celular_cliente}',
                                correo = '{$correo_cliente}',
                                motivoConsulta = '{$detalleCita['motivoConsulta']}',
                                estado = '1',
                                registrado = '{$fechaActual}',
                                usuario_id = '{$usuario_id}',
                                tipo = '{$detalleCita['tipo']}',
                                idCliente = '{$detalleCita['idCliente']}',
                                horaF = '{$horaFin}',
                                duracion= '{$duracionCita}',
                                sucursal = '$sucursal',
                                ID_principal = '$ID_principal'";

                mysqli_query($conn3, $QueryInsert) or throw new Exception("Una o mas citas no fueron guardadas " . mysqli_error($conn3), 1);
                $citaId = mysqli_insert_id($conn3);

                $mensajeW = 'Registro de cita Medica.

Estimado paciente *' . $nombre . '* ,Se registró una cita Medica.

Fecha y Hora:  *' . $detalleCita['fecha'] . '* *' . $detalleCita['Hora'] . '*  Motivo de la consulta:' . utf8_encode($MotivoConsulta_Texto) . '. 

Su consulta es con el Doctor: *' . $nombreD . '*.  

en *' . $SucursalNombre . '*.';

Whatsapp_sent_cliente($linkkey, $celular_cliente, $mensajeW, $detalleCita['idCliente'], $usuario_id, $celular_cliente, 0);

                if ($CitasGoogleCalendar == "Si") {
                    sendApiGoogleCalendar($citaId);
                }


            }


            $Response = [
                "error" => null, 
                "data" => [
                    "message" => "Citas guardadas correctamente",
                    "status" => true,
                ], 
            ];

            echo json_encode($Response);
            exit();

            break;
        
        case 'consultar_agenda':
            $doctor = $_POST["doctor"];
            $fecha = $_POST["fecha"];
            $Hora = $_POST["Hora"];
            
            $validarHorarios = validarHorarios($fecha, $Hora, $doctor);
            if ($validarHorarios["avaliable"] == false) {
                $Response = [
                    "error" => null, 
                    "data" => [
                        "message" =>$validarHorarios["messsage"],
                        "status" => false
                    ], 
                ];
    
                echo json_encode($Response);
                exit();
            }


            $Query = "SELECT nombre, motivoConsulta, doctor FROM $Tabla WHERE doctor='{$doctor}' AND fecha='{$fecha}' AND '{$Hora}' BETWEEN Hora AND horaF AND estado IN(1,2,3) LIMIT 1";
            $Result = mysqli_query($conn3, $Query);
            $data = [];
            $message = "";
            $status = true;
            if ($Result) {
                if (mysqli_num_rows($Result) == 0) {
                    $message = "Espacio disponible";
                }else{
                    $Row = mysqli_fetch_array($Result);
                    $nombre = $Row["nombre"];
                    $motivoConsulta = $Row["motivoConsulta"];
                    $doctor = $Row["doctor"];

                    $status = false;
                    $message = "Espacio no disponible <br><b>Fecha:</b> {$fecha} <br><b>Hora:</b> {$Hora} <br><b> Especialista:</b> " . funcionMaster($doctor, "ID", "NOMBRE_USUARIO", "usuarios") . " <br><b>Paciente: </b> " . $nombre;

                }
            }

            $Response = [
                "error" => null, 
                "data" => [
                    "message" => $message,
                    "status" => $status
                ], 
            ];

            echo json_encode($Response);
            exit();

            break;

        case 'consultar_eventos_calendar':
            $ID_principal = $_POST["ID_principal"];
            
            $Query1 = "SELECT ID, NOMBRE_USUARIO FROM usuarios WHERE ID_principal='{$ID_principal}' AND ACTIVO = 1";
            $Result1 = mysqli_query($conn3, $Query1);
            $colorsUser = [];
            foreach ($Result1 as $RowUser) {
                $colorsUser[$RowUser["ID"]] = [ generarColorHex(), $RowUser["NOMBRE_USUARIO"] ];
            }

            
            $Query = "SELECT nombre, motivoConsulta, doctor, fecha, horaF, Hora FROM $Tabla WHERE ID_principal='{$ID_principal}' AND estado IN(1,2,3)";
            $Result = mysqli_query($conn3, $Query);
            $data = [];
            $message = "";
            $status = true;
            if ($Result) {
                foreach ($Result as $Row) {
                    $motivoConsulta = funcionMaster($Row['motivoConsulta'], "id", "descripcion", "Motivos_Consulta");

                    $data[] = [
                        "title" => $motivoConsulta . " - " . $Row["nombre"],
                        "start" => $Row["fecha"] . "T" . $Row["Hora"],
                        "end" => $Row["fecha"] . "T" . $Row["horaF"],
                        "backgroundColor" => $colorsUser[$Row["doctor"]][0],
                        "textColor" => "#FFFFFF"
                    ];
                }
            }

            $Response = [
                "error" => null, 
                "data" => [
                    "events" => $data,
                    "colorsUser" => $colorsUser,
                ] 
            ];

            echo json_encode($Response);
            exit();

            break;
        
        default:
            $Response = [
                "error" => "Accion no espeficada", 
                "data" => null, 
            ];
        
            echo json_encode($Response);
            exit();
            break;
    }



} catch (\Throwable $th) {
    
    $Response = [
        "error" => $th->getMessage() . " " . $th->getLine(), 
        "data" => null, 
    ];

    echo json_encode($Response);
    exit();

}