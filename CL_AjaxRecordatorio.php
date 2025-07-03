    <?php
date_default_timezone_set('America/Bogota');
include 'funciones/conn3.php';
include 'funciones/funcionesUtilidades.php';

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


if ($_POST["Tipo_Consulta"] == "Eventos_Calendario") {
    
    date_default_timezone_set("America/Bogota");



    $start = $_POST['start'];
    $end = $_POST['end'];

    $usuario_id = $_POST['usuario_id'];

    $FiltroWhere="";
    if ($usuario_id != "0") {
        $FiltroWhere = " AND usuario_id = '{$usuario_id}' ";
    }

    $QueryEvento = mysqli_query($conn3, "SELECT * FROM  Eventos_Recordatorio  where Activo = '1' AND Fecha BETWEEN '$start' AND '$end' {$FiltroWhere} order by Fecha asc");
     while ($RowEvento = mysqli_fetch_array($QueryEvento)) {

        $id = $RowEvento['id'];


        $evento_padre = $RowEvento['evento_padre'];
          
        $Fecha = $RowEvento['Fecha'];
        $Hora = $RowEvento['Hora'];

        $Duracion = $RowEvento['Duracion'];
        
        // Unir la fecha y la hora 
        $Fecha_Hora = $Fecha . " " . $Hora;
        $fechaHoraObj = new DateTime($Fecha_Hora);

        // Sumar la duración en minutos a la fecha y hora
        $fechaHoraObj->add(new DateInterval('PT' . $Duracion . 'M'));
        // Obtener la nueva fecha y hora después de sumar la duración
        $nuevaFechaHora = $fechaHoraObj->format('Y-m-d H:i:s');
        

        $usuario_id = $RowEvento['usuario_id'];
        $Nombre_usuario = reem_alreves(funcionMaster($usuario_id, "ID", "NOMBRE_USUARIO", "usuarios"));

        $usuario_id_registro = $RowEvento['usuario_id_registro'];
        $Nombre_usuario_registro_evento = reem_alreves(funcionMaster($usuario_id_registro, "ID", "NOMBRE_USUARIO", "usuarios"));

        $Titulo = $RowEvento['Titulo'];
        $Detalles = $RowEvento['Detalles'];

        $Estado = $RowEvento['Estado'];

        $Icono1="";
        $Texto="";
        if($evento_padre!=0){
            $Icono1="fa-rotate-right";

            $Fecha_Inicio_Principal = funcionMaster($evento_padre, "id", "Fecha", "Eventos_Recordatorio");
            $Hora_Inicio_Principal = funcionMaster($evento_padre, "id", "Hora", "Eventos_Recordatorio");

            $Fecha_Final = $Fecha_Inicio_Principal . " " . $Hora_Inicio_Principal;

            $Texto = "<div class='form-group col-md-12' style='text-align:center;'> <h3> Evento/Recordatorio </h3> </div>";
            $Texto .="<div class='form-group col-md-12' style='text-align:center;color:blue;'> <h3> [Repetitivo] </h3> </div>";
            $Texto .= "<div class='form-group col-md-12' style='text-align:center;'> <label> Fecha/Hora del Evento Inicial: </label> $Fecha_Final </div>";
            $Texto .= "<div class='col-md-12'><hr></div>";

        }else{

            $Texto = "<div class='form-group col-md-12' style='text-align:center;'> <h3> Evento/Recordatorio </h3> </div><div class='col-md-12'><hr></div>";
        }
        


        
        $Texto .= "<div class='form-group col-md-6'> <label> Usuario: </label> $Nombre_usuario   </div>";
        $Texto .= "<div class='form-group col-md-6'> <label> Registrado por: </label> $Nombre_usuario_registro_evento </div> ";
        $Texto .= "<div class='form-group col-md-6'> <label> Fecha/Hora de Evento: </label> $Fecha_Hora </div>";
        $Texto .= "<div class='form-group col-md-6'> <label> Duración: </label> $Duracion </div>";

        $Texto .= "<div class='form-group col-md-12'>  <hr>  </div>";
        $Texto .= "<div class='form-group col-md-12'>  <label> Titulo: </label> $Titulo  </div>";
        $Texto .= "<div class='form-group col-md-12' style='height: 300px;overflow-y: auto;'>  <label> Detalles </label><br> $Detalles  </div>";

        $Texto .= "<div class='form-group col-md-12'>  <hr>  </div>";
        
        
        
        $Color="";
        $Icono="";
        switch ($Estado) {
            case 0:
                $Icono = "fa-clock";
                $Color="#eadfac";

                $btnGroup = "<button type='button' class='btn btn-block btn-outline-success rounded-pill shadow m-1'  onclick='ActualizarEstadoEvento($id,1)' title='Completado'> Completado </button><br>";
                $btnGroup .= "<button type='button' class='btn btn-block btn-outline-danger rounded-pill shadow m-1'  onclick='ActualizarEstadoEvento($id,2)' title='Cancelado'> Cancelado </button>";

            break;
            case 1:
                $Icono = "fa-check";
                $Color="#aceab8";

                $btnGroup = "<button type='button' class='btn btn-block btn-outline-secondary rounded-pill shadow m-1'  onclick='ActualizarEstadoEvento($id,3)' title='Ocultar'> Ocultar </button><br>";
            break;
            case 2:
                $Icono = "fa-rectangle-xmark";
                $Color="#eaacac";

                $btnGroup = "<button type='button' class='btn btn-block btn-outline-secondary rounded-pill shadow m-1'  onclick='ActualizarEstadoEvento($id,3)' title='Ocultar'> Ocultar </button><br>";
            break;
        }

        

        $Texto .= "<div class='form-group col-md-12'> $btnGroup </div>";


            //volver json para el calendario
            $json[] = array(
                'title' => "{$Titulo} - [$Nombre_usuario]",
                'start' => "{$Fecha_Hora}",
                'end' => "{$nuevaFechaHora}",
                'icon' => "{$Icono}",
                'icon1' => "{$Icono1}",
                'descripcion' => "{$Texto}",
                'backgroundColor' => "{$Color}",
                'textColor' => "black",
                "evento_id" => $id

            );

         
         

         
        //echo json_encode($json);

     
     }


     echo json_encode($json);
     
    /*
    function fechaEnRango($fecha, $fechaInicio, $fechaFin) {
        $fecha = strtotime($fecha);
        $fechaInicio = strtotime($fechaInicio);
        $fechaFin = strtotime($fechaFin);
    
        return ($fecha >= $fechaInicio && $fecha <= $fechaFin);
    }

    function existeEventoEnArreglo($arreglo, $evento_temp, $evento_temp_start) {
        foreach ($arreglo as $evento) {
            if (
                (isset($evento['evento_id']) && $evento['evento_id'] == $evento_temp) &&
                (isset($evento['start']) && $evento['start'] == $evento_temp_start)
            ) {
                return true;
            }
        }
        return false;
    }
    */

    /*
    function mesesDeDiferencia($fechaInicio, $fechaAValidar) {
        $fechaInicio = new DateTime($fechaInicio);
        $fechaAValidar = new DateTime($fechaAValidar);
    
        // Verificar si la fecha de inicio es menor que la fecha a validar
        if ($fechaAValidar > $fechaInicio) {
            // Intercambiar las fechas si es necesario
            
            $diferencia = $fechaInicio->diff($fechaAValidar);
    
            // Ajustar si los días son menos de 30
            $mesesDiferencia = 0;
            if ($diferencia->d >= 1) {
                $mesesDiferencia = 1;
            }
    
            $Arreglo['Anual'] = $diferencia->y;
            $Arreglo['Mensual'] = $diferencia->m + $mesesDiferencia;
            $Arreglo['Diario'] = $diferencia->d;
    
        }
    
        
    
        return $Arreglo;
    }
    */

    
    /*
    $InicioCalendario = $_POST['start'];
    $FinalCalendario = $_POST['end'];

    
     //los eventos repetidos por mes
     $QueryEventoRepetitivo = mysqli_query($conn3, "SELECT * FROM  Eventos_Recordatorio  where Activo = '1' AND Repetir = '1' order by Fecha asc");
     while ($RowEventoRepetitivo = mysqli_fetch_array($QueryEventoRepetitivo)) {
         
        $FechaHora_Inicio = $RowEventoRepetitivo['Fecha'] . " " . $RowEventoRepetitivo['Hora'];
        $Duracion = $RowEventoRepetitivo['Duracion'];
    
        $usuario_id = $RowEventoRepetitivo['usuario_id'];
        $Nombre_usuario = reem_alreves(funcionMaster($usuario_id, "ID", "NOMBRE_USUARIO", "usuarios"));

        $usuario_id_registro = $RowEventoRepetitivo['usuario_id_registro'];
        $Nombre_usuario_registro_evento = reem_alreves(funcionMaster($usuario_id_registro, "ID", "NOMBRE_USUARIO", "usuarios"));
    
        $Titulo = $RowEventoRepetitivo['Titulo'];
        $Detalles = $RowEventoRepetitivo['Detalles'];
        $Estado = $RowEventoRepetitivo['Estado'];

        $MesesRepeticion = $RowEventoRepetitivo['MesesRepeticion'];

        $Date = $_POST['start'];

        
        //hacer un for int con el numero de la variable de $Duracion
        for ($i=1; $i <= $MesesRepeticion ; $i++) { 

            $FechaEnviar="";
            $EstadoEvento="0";

            $nuevaFechaTemporal=$FechaHora_Inicio;
            $nuevaFechaTemporal = strtotime ( '+' . $i . ' month' , strtotime ( $FechaHora_Inicio ) ) ;
            $nuevaFechaTemporal_Final = date('Y-m-d H:i:s', $nuevaFechaTemporal);

            if (fechaEnRango($nuevaFechaTemporal_Final, $InicioCalendario, $FinalCalendario)){

                $FechaEnviar = $nuevaFechaTemporal_Final;
                $EstadoEvento="1";


                /////////////////////////////////////////////////////////////////////////////




                if($EstadoEvento=="1"){

                    //////////////////////
                    $FechaVisualRepetida = $FechaEnviar;
                    $FechaHoraRepetida = new DateTime($FechaVisualRepetida);
                
                    $FechaHoraRepetida->add(new DateInterval('PT' . $Duracion . 'M'));
                
                    $Final_FechaVisualRepetitiva = $FechaHoraRepetida->format('Y-m-d H:i:s');
                    ///////////////////////////////////////
                
                    $Texto = "<div class='form-group col-md-12' style='text-align:center;'> <h3> Evento/Recordatorio </h3> </div>";
                    $Texto .="<div class='form-group col-md-12' style='text-align:center;color:blue;'> <h3> [Repetitivo] </h3> </div>";
                    $Texto .= "<div class='form-group col-md-12' style='text-align:center;'> <label> Fecha/Hora del Evento Inicial: </label> $FechaHora_Inicio </div>";
                    $Texto .= "<div class='col-md-12'><hr></div>";
                    $Texto .= "<div class='form-group col-md-6'> <label> Usuario: </label> $Nombre_usuario   </div>";
                    $Texto .= "<div class='form-group col-md-6'> <label> Registrado por: </label> $Nombre_usuario_registro_evento </div> ";
                    
                    $Texto .= "<div class='form-group col-md-6'> <label> Fecha/Hora de Evento: </label> $FechaVisualRepetida </div>";
                    $Texto .= "<div class='form-group col-md-6'> <label> Duración: </label> $Duracion </div>";
                
                    $Texto .= "<div class='form-group col-md-12'>  <hr>  </div>";
                    $Texto .= "<div class='form-group col-md-12'>  <label> Titulo: </label> $Titulo  </div>";
                    $Texto .= "<div class='form-group col-md-12'>  <label> Detalles </label><br> $Detalles  </div>";
                
                    $Texto .= "<div class='form-group col-md-12'>  <hr>  </div>";
                    
                    
                    
                    $Color="";
                    $Icono="";
                    switch ($Estado) {
                        case 0:
                            $Icono = "fa-clock";
                            $Color="#eadfac";
                
                            $btnGroup = "<button type='button' class='btn btn-block btn-outline-success rounded-pill shadow m-1'  onclick='ActualizarEstadoEvento($id,1)' title='Completado'> Completado </button><br>";
                            $btnGroup .= "<button type='button' class='btn btn-block btn-outline-danger rounded-pill shadow m-1'  onclick='ActualizarEstadoEvento($id,2)' title='Cancelado'> Cancelado </button>";
                
                        break;
                        case 1:
                            $Icono = "fa-check";
                            $Color="#aceab8";
                
                            $btnGroup = "<button type='button' class='btn btn-block btn-outline-secondary rounded-pill shadow m-1'  onclick='ActualizarEstadoEvento($id,3)' title='Ocultar'> Ocultar </button><br>";
                        break;
                        case 2:
                            $Icono = "fa-trash";
                            $Color="#eaacac";
                
                            $btnGroup = "<button type='button' class='btn btn-block btn-outline-secondary rounded-pill shadow m-1'  onclick='ActualizarEstadoEvento($id,3)' title='Ocultar'> Ocultar </button><br>";
                        break;
                    }
                    
                    $Texto .= "<div class='form-group col-md-12'> $btnGroup </div>";
                    
                    $Icono1="fa-rotate-right";
                
                    if (existeEventoEnArreglo($json, $id, $FechaVisualRepetida)) {
                        //existe el evento por lo que no lo agregaremos
                    }else{
                        $json[] = array(
                            'title' => "{$Titulo} - [$Nombre_usuario]",
                            'start' => "{$FechaVisualRepetida}",
                            'end' => "{$Final_FechaVisualRepetitiva}",
                            'icon' => "{$Icono}",
                            'icon1' => "{$Icono1}",
                            'descripcion' => "{$Texto}",
                            'backgroundColor' => "{$Color}",
                            'textColor' => "black",
                            'evento_id' => $id."_repetido"
                        );
                    }
                        
            
            
                }

                 ///////////////////////////////////////////////////////////////////




            }

        }

     }
    
     echo json_encode($json);
     */
     
}



if ($_POST["Tipo_Consulta"] == "Estado Evento") {
    
    date_default_timezone_set("America/Bogota");

    $Campo1 = mysqli_query($conn3, "show COLUMNS from Eventos_Recordatorio WHERE Field = 'Estado';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Eventos_Recordatorio` ADD `Estado` INT(11) NULL DEFAULT '0' COMMENT '0-> Pendiente 1-> Completado 2-> Cancelado  *Creado desde modulo de CL_AjaxRecordatorio*'");
    }

    $estado = $_POST['estado'];
    $evento_id = $_POST['evento_id'];

    if($estado==3){
        $QueryEvento = mysqli_query($conn3, "UPDATE Eventos_Recordatorio SET Activo = '0' WHERE id = '$evento_id' limit 1");
    }else{
        $QueryEvento = mysqli_query($conn3, "UPDATE Eventos_Recordatorio SET Estado = '$estado' WHERE id = '$evento_id' limit 1");
    }
    
    $AfectadasUp = mysqli_affected_rows($conn3);
    //si hubo filas afectadas agregar en u narreglo estado true y hacerle un echo con json_encode
    if ($AfectadasUp > 0) {
        $Arreglo["Estado"] = true;
    } else {
        $Arreglo["Estado"] = false;
        $Arreglo["Mensaje"] = mysqli_error($conn3);
    }
     
    echo json_encode($Arreglo);
}



















// Ajax para el modal //

