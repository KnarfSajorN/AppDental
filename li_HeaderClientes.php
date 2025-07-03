<?php

    $usuarioActual = $_SESSION['ID'];
    $queryAtenciones = mysqli_query($conn3, "SELECT clienteId,ID FROM paciente_atencion WHERE usuarioId = '$usuarioActual' AND activo=1 LIMIT 1 ");

    foreach ($queryAtenciones as $tablaAtenciones) {
        $ID_Atencion = $tablaAtenciones['ID'];
        $clienteId = $tablaAtenciones['clienteId'];
    }


    if ( mysqli_num_rows($queryAtenciones) > 0 ) {

        // <a class="nav-link" href="#" data-toggle="modal" data-target="#modalHeaderPacientes" role="button" title="Paciente en atención">
        //     <i class="fas fa-user"></i>
        // </a>
        // btn btn-primary
        $boton = '<div class="dropdown"><button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i>&nbsp;<b>Paciente en atención: </b>'.funcionMaster($clienteId, "cliente_id", "nombre_cliente", "cliente").'</button><div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="HC_HistoriaGeneral?cI='.encrypt($clienteId).'"><i class="fas fa-folder-open"></i>&nbsp;Ir a historia clínica</a><a class="dropdown-item" href="agregarCitas?cI='.encrypt($clienteId).'"><i class="fas fa-calendar-days"></i>&nbsp;Crear una cita</a><a class="dropdown-item" href="SgenerarFactura?clienteId='.$clienteId.'"><i class="fas fa-receipt"></i>&nbsp;Facturar</a><a class="dropdown-item" onclick="cerrarAtencion('.$ID_Atencion.')"><i class="fa-solid fa-xmark"></i>&nbsp;Finalizar atención</a></div></div>';
        // $boton = '<button type="button" class="btn btn-primary" onclick="cerrarAtencion('.$ID_Atencion.')"> <b>En atención:</b> '. funcionMaster($clienteId, "cliente_id", "nombre_cliente", "cliente") . '</button>';
        

        
    }else{ 
        $boton ='<a class="nav-link" href="#" data-toggle="modal" data-target="#modalHeaderPacientes" role="button" title="Paciente en atención"><i class="fas fa-user"></i></a>';
    }
?>

<script>
    // $('#itemDinamico').html('<?= $boton ?>')
    document.getElementById('itemDinamico').innerHTML = '<?=$boton?>';
</script>