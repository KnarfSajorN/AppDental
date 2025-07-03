<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");
        
        $doctor = $_POST['doctor'];          
           
        $fecha = $_POST['fecha'];                            
        $Hora = $_POST['Hora'];     

        $clienteId = $_POST['clienteId'];
        $nombre = $_POST['nombre'];
        if($clienteId!="0"){
            $nombre = funcionMaster($clienteId, 'cliente_id', 'nombre_cliente', 'cliente');
        }
        $correo = $_POST['correo'];                
        $telefono = $_POST['telefono'];               
                
        $duracion = $_POST['duracion'];
        $motivoConsulta = $_POST['motivoConsulta'];
        $P = $_POST['P'];

        $usuario_id = $_POST['usuario_id'];
        $sucursal_id = $_POST['sucursal'];
        $servicios = $_POST['servicios'];if($servicios == ""){$servicios = 0;}

        $estado = 1;
        $registrado = date("Y-m-d H:i:s");


        $Nuevahora = date('H:i:s',(strtotime ( '+ '.$duracion.' minute' , strtotime ($Hora) )) );
        if ($P == 0) {$ConsultaTipo = 'Presencial';}
        elseif ($P == 1) {$ConsultaTipo = 'Virtual';}

        $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario=$doctor");
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {

        $nombreF=$rowMotorizado['nombreF'];
        $telefonoF=$rowMotorizado['telefonoF'];
        $emailF=$rowMotorizado['emailF'];
        $whatsapp = $rowMotorizado['whatsapp'];

        $sul=$rowMotorizado['sul'];
        $sum=$rowMotorizado['sum'];
        $sue=$rowMotorizado['sue'];
        $suj=$rowMotorizado['suj'];
        $suv=$rowMotorizado['suv'];
        $sus=$rowMotorizado['sus'];
        $sud=$rowMotorizado['sud'];

        }

        $dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo');
        $DiaSemana = $dias[date('N', strtotime($fecha))];


        if ($DiaSemana == 'Lunes') {$sucursal = $sul;}
        elseif ($DiaSemana == 'Martes') {$sucursal = $sum;}
        elseif ($DiaSemana == 'Miercoles') {$sucursal = $sue;}
        elseif ($DiaSemana == 'Jueves') {$sucursal = $suj;}
        elseif ($DiaSemana == 'Viernes') {$sucursal = $suv;}
        elseif ($DiaSemana == 'Sabado') {$sucursal = $sus;}
        elseif ($DiaSemana == 'Domingo') {$sucursal = $sud;}

        ////////////////////////////// CREACION DE TABLAS ///////////////////////////////////////////////////
        $Campo1 = mysqli_query($conn3, "show COLUMNS from citas WHERE Field = 'sucursal';");
        $nrowCampo1 = mysqli_num_rows($Campo1);
        if ($nrowCampo1 == "0") {
            mysqli_query($conn3, "ALTER TABLE `citas` ADD `sucursal` int(11) NULL DEFAULT '0' COMMENT 'Sucursal de la cita *Creado desde modulo de Guardar Cita*'");
        }

        $Campo2 = mysqli_query($conn3, "show COLUMNS from citas WHERE Field = 'servicios';");
        $nrowCampo2 = mysqli_num_rows($Campo2);
        if ($nrowCampo2 == "0") {
            mysqli_query($conn3, "ALTER TABLE `citas` ADD `servicios` int(11) NULL DEFAULT '0' COMMENT 'Servicios de la cita *Creado desde modulo de Guardar Cita*'");
        }

        //crear un campo en la tablas de citas de estado_servicio
        $Campo3 = mysqli_query($conn3, "show COLUMNS from citas WHERE Field = 'estado_servicio';");
        $nrowCampo3 = mysqli_num_rows($Campo3);
        if ($nrowCampo3 == "0") {
            mysqli_query($conn3, "ALTER TABLE `citas` ADD `estado_servicio` VARCHAR(5) NULL DEFAULT '0' COMMENT 'Estado del servicio de la cita | 0 = Sin Cobrar / 1 = Cobrado 1 | *Creado desde modulo de Guardar Cita*'");
        }

        /////////////////////////////////////////////////////////////////////////////////////////////////////////

        $queryUsuario =  "insert INTO citas (doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id, tipo,idCliente,duracion,HoraF,sucursal,servicios) 
                           VALUES ('$doctor' ,'$fecha' ,'$Hora' ,'$nombre' ,'$telefono' ,'$correo' ,'$motivoConsulta' ,'$estado' ,'$registrado', '$usuario_id', '$P','$clienteId','$duracion','$Nuevahora','$sucursal_id','$servicios')";
        mysqli_query($conn3,$queryUsuario);

        $mensajeW = '📍Registro de cita Podológica.
        Estimado paciente *' . $nombre . '* ,Se registró su cita Podológica.
        Fecha y Hora:  *' . $fecha . '* *' . $Hora . '*
        👀 Cualquier duda ó consulta no dude en comunicarse por este medio 🤗*,
        Atte. *' . $nombreF . '* 👣
        (NO PONER TELÉFONO, NI CORREO ELECTRÓNICO, NI ESPECIALISTA)
        ';

        $accion = 0;
        Whatsapp_sent_cliente($linkkey, $telefono, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);             
 
        $mensaje2 = '*'. $nombreF.'*  se ha agendado una cita con el paciente *'.$nombre.'*, el dia  *'.$fecha.'* a las *'.$Hora.'* en *'. $sucursal.'*. Motivo: *'.$motivoConsulta.'* Atte '.$nombreF.'.';
        Whatsapp_sent($whatsapp, $mensaje2);


        /////////////////////////////////Correo electronico [Llenar]/////////////////////////////////
        include 'PlantillaCorreo/funcionesPlantillas.php';

        $usuario_id = $usuario_id;
        $titulo = "Agendamiento de Cita";
        $subtitulo = "Fecha de Cita del Paciente " .$nombre;
        $texto = 'Sr(a) *' . $nombre . '* usted ha agendado un cita con *' . $doctor . '* el día *' . $fecha . '* a las *' . $Hora . '* en' . $sucursal . ' Teléfono: ' . $telefonoF . ' Correo: ' . $emailF . '. <br> Este correo electrónico no puede recibir respuestas. Para obtener más información ' . $nombreF . ' Teléfono ' . $telefonoF . ' Correo ' . $emailF . '.';
        $url = "";
        $botonurl = "";

        $mensaje = PlantillaBasicaMedica($usuario_id, $titulo, $subtitulo, $texto, $url, $botonurl);
        ////////////////////////////////////Correo electronico [Datos Adicionales]/////////////////////////////////
        $para = "{$correo}"; //Correo

        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Cabeceras adicionales
        $cabeceras .= 'To: ' . $nombreF . ' <noreply@medicalsoftcolombia.com>' . "\r\n";
        $cabeceras .= 'From: ' . $titulo . ' <noreply@medicalsoftcolombia.com>' . "\r\n";
        $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
        $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

        // Enviarlo
        mail($para, $subtitulo, $mensaje, $cabeceras);

        echo "<script language='Javascript'> history.back();location.reload();</script>";

?>