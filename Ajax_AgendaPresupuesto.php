<?php

try {
    session_start();
    require_once __DIR__ . "/funciones/funciones.php";
    require_once __DIR__ . "/funciones/conn3.php";

    $Table = "citas";
    $linkkey = $_SESSION["linkkey"];

    $_POST = reem_array($_POST);

    $type = $_POST['type'];
    unset($_POST['type']);

    $QueryAddColumnOP = "ALTER  TABLE {$Table} 
                        ADD COLUMN IF NOT EXISTS sinvetrios_id INT NULL DEFAULT 0 COMMENT 'Referencia a la tabla sinvetrios - Inventario',
                        ADD COLUMN IF NOT EXISTS soperacioninv_id INT NULL DEFAULT 0 COMMENT 'Referencia a la tabla sOperacionInv - Presupuesto de odontograma',
                        ADD COLUMN IF NOT EXISTS sdetalleoper_id INT NULL DEFAULT 0 COMMENT 'Referencia a la tabla sDetalleOper - Detalle Presupuesto de odontograma',
                        ADD COLUMN IF NOT EXISTS oddetalleoper_id INT NULL DEFAULT 0 COMMENT 'Referencia a la tabla OP_PresupuestoDetalle - Detalle Presupuesto de odontograma',
                        ADD COLUMN IF NOT EXISTS odprocedimiento_id INT NULL DEFAULT 0 COMMENT 'Referencia a la tabla sDetalleOper - Detalle Presupuesto de odontograma' ";
    mysqli_query($conn3, $QueryAddColumnOP) or throw new Exception("Error al crear columnas dinamicas => " . ( mysqli_error($conn3) ), 1);


    switch ($type) {
        case 'guardar':
            
            $detalle          = json_decode($_POST["detalle"], true);
            $idOperacion      = $_POST["id"];
            $ID_principal     = $_POST["ID_principal"];
            $sucursal         = $_POST["sucursal"];
            $usuario_id       = $_POST["usuario_id"];
            $cliente_id       = $_POST["cliente_id"];
            $nombre_cliente   = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente ');
            $whatsapp_cliente = $_POST["whatsapp_cliente"];
            $correo_cliente   = $_POST["correo_cliente"];
            // $whatsapp_cliente = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente ');
            // $correo_cliente   = funcionMaster($cliente_id, 'cliente_id', 'correo_cliente', 'cliente ');
            
            $num_citas = count($detalle);
            $mensajeW = $num_citas <= 1 ?  "👋Hola! Se te ha sido asignada *{$num_citas} cita*" :"👋Hola! Se te han sido asignadas *{$num_citas} citas*" ;

            foreach ($detalle as $indice => $dataCita) {
                $descripcion                = $dataCita["descripcion"];
                $doctor                     = $dataCita["doctor"];
                $idProducto                 = $dataCita["idProducto"];
                $sdetalleoper_id            = $dataCita["sdetalleoper_id"];
                $fecha                      = $dataCita["fecha"];
                $hora                       = $dataCita["hora"];
                $tipo                       = $dataCita["tipo"];
                $registrado                 = date("Y-m-d H:i:s");
                $duracion                   = '30';
                $Nuevahora                  = date('H:i:s', (strtotime('+ ' . $duracion . ' minute', strtotime($hora))));
                $nombre_doctor              = funcionMaster($doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios ');


                $InserCitas = "INSERT INTO citas SET 
                                doctor         = '$doctor',
                                fecha          = '$fecha',
                                Hora           = '$hora',
                                nombre         = '$nombre_cliente',
                                telefono       = '$whatsapp_cliente',
                                correo         = '$correo_cliente',
                                motivoConsulta = '0',
                                estado         = '1',
                                sinvetrios_id  = '$idProducto',
                                registrado     = '$registrado',
                                usuario_id     = '$usuario_id',
                                tipo           = '$tipo',
                                idCliente      = '$cliente_id',
                                duracion       = '$duracion',
                                HoraF          = '$Nuevahora',
                                sucursal       = '$sucursal',
                                soperacioninv_id = '$idOperacion',
                                sdetalleoper_id = '$sdetalleoper_id',
                                ID_principal   = '$ID_principal'";
            
                
                if (!mysqli_query($conn3, $InserCitas)) {
                    throw new Exception("Error al guardar cita No {$indice} || {$InserCitas} || " . mysqli_error($conn3), 1);
                }
                            
                if ($num_citas <= 1) {
                    $mensajeW .= "

🏥 *Procedimiento:* {$descripcion}
📆 *Fecha:* {$fecha}
⌚ *Hora:* {$hora}
👨‍⚕️ *Doctor:* {$nombre_doctor}";
                }else{
                    $numero_cita = $indice + 1;
                    $mensajeW .= "

*Session N° {$numero_cita}*
🏥 *Procedimiento:* {$descripcion}
📆 *Fecha:* {$fecha}
⌚ *Hora:* {$hora}
👨‍⚕️ *Doctor:* {$nombre_doctor}";
                }


            }

            Whatsapp_sent_cliente($linkkey, $whatsapp_cliente, $mensajeW, $cliente_id, $usuario_id, $whatsapp_cliente, 0);


            $Response = [
                "error"   => null,
                "status"  => true,
                "message" => "Procedimientos agendados correctamente",
                "data"    => []
            ];

            echo json_encode($Response);
            exit();

            break;
        
        case 'consultar_horarios':

            $doctor = $_POST["doctor"];
            $fecha  = $_POST["fecha"];
            $hora   = $_POST["hora"];
            
            $validarHorarios = validarHorarios($fecha, $hora,  $doctor);
            if ($validarHorarios["avaliable"] == false) {
                $Response = [
                    "error" => null,
                    "status" => $validarHorarios["avaliable"],
                    "message" => $validarHorarios["messsage"],
                    "data" => []
                ];
    
                echo json_encode($Response);
                exit();
            }

            $Cols = "nombre, motivoConsulta, doctor";
            $Query = "SELECT {$Cols} FROM $Table WHERE doctor='{$doctor}' AND fecha='{$fecha}' AND '{$hora}' BETWEEN Hora AND horaF AND estado IN(1,2,3) LIMIT 1";
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
                    $message = "Espacio no disponible <br><b>Fecha:</b> {$fecha} <br><b>Hora:</b> {$hora} <br><b> Especialista:</b> " . funcionMaster($doctor, "ID", "NOMBRE_USUARIO", "usuarios") . " <br><b>Paciente: </b> " . $nombre;

                }
            }

            $Response = [
                "error" => $Query,
                "status" => $status,
                "message" => $message,
                "data" => $data
            ];

            echo json_encode($Response);
            exit();

            break;
        
        default:
            throw new Exception("Type not found", 1);
            break;
    }



} catch (\Throwable $th) {
    $Response = [
        "error" => $th->getMessage() . " On Line: " . $th->getLine(),
        "status" => false,
        "message" => "Ocurrio un error",
        "data" => null
    ];

    echo json_encode($Response);
    exit();
}


?>