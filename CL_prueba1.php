<?php
include 'funciones/conn3.php';

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


function fechaEnRango($fecha, $fechaInicio, $fechaFin) {
    $fecha = strtotime($fecha);
    $fechaInicio = strtotime($fechaInicio);
    $fechaFin = strtotime($fechaFin);

    return ($fecha >= $fechaInicio && $fecha <= $fechaFin);
}

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


$InicioCalendario = "2024-07-28";
$FinalCalendario = "2024-09-08";


 //los eventos repetidos por mes
 $QueryEventoRepetitivo = mysqli_query($conn3, "SELECT * FROM  Eventos_Recordatorio  where Activo = '1' AND Repetir = '1' order by Fecha asc");
 while ($RowEventoRepetitivo = mysqli_fetch_array($QueryEventoRepetitivo)) {
     
    $FechaHora_Inicio = $RowEventoRepetitivo['Fecha'] . " " . $RowEventoRepetitivo['Hora'];
    $Duracion = $RowEventoRepetitivo['Duracion'];

    $usuario_id = $RowEventoRepetitivo['usuario_id'];
    $Nombre_usuario = funcionMaster($usuario_id, "ID", "NOMBRE_USUARIO", "usuarios");

    $Titulo = $RowEventoRepetitivo['Titulo'];
    $Detalles = $RowEventoRepetitivo['Detalles'];

    $Date = $_POST['start'];

    $FechaEnviar="";
    $EstadoEvento="0";

    echo $Duracion."<br><br>";

    $MesesRepeticion = $RowEventoRepetitivo['MesesRepeticion'];

    //hacer un for int con el numero de la variable de $Duracion
    for ($i=1; $i <= $MesesRepeticion ; $i++) { 
        $nuevaFechaTemporal=$FechaHora_Inicio;
        $nuevaFechaTemporal = strtotime ( '+' . $i . ' month' , strtotime ( $FechaHora_Inicio ) ) ;
        $nuevaFechaTemporal_Final = date('Y-m-d H:i:s', $nuevaFechaTemporal);

        echo $nuevaFechaTemporal_Final."<hr>";
        if (fechaEnRango($nuevaFechaTemporal_Final, $InicioCalendario, $FinalCalendario)){

            $FechaEnviar = $nuevaFechaTemporal_Final;
            $EstadoEvento="1";
        }

    }



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


        $json[] = array(
            'title' => "{$Titulo} - [$Nombre_usuario]",
            'start' => "{$FechaVisualRepetida}",
            'end' => "{$Final_FechaVisualRepetitiva}",
            'icon' => "{$Icono}",
            'icon1' => "{$Icono1}",
            'descripcion' => "{$Texto}",
            'backgroundColor' => "{$Color}",
            'textColor' => "black"

        );


    }
    


 }

 echo json_encode($json);

 

 

?>