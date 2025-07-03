<?php 
    include 'funciones/funciones.php';
    include 'funciones/conn3.php';

    $tipoGuardado = $_POST['tipoGuardado'];
    $hospitalizacionId = $_POST['hospitalizacionId'];
    $usuarioId = $_POST['usuarioId'];
    $clienteId = funcionMaster($hospitalizacionId, "idHospitalizacion", "cliente_id" ,"hoIngresoHospitalizacion");



    if ($tipoGuardado == 'Medicamentos') {
        if ($_POST['medicamentos'] <> "") {


            $tablaMedicamentos = '<table class="table" style="width: 100%">
            <thead>
              <tr>
                <th>Medicamento</th>
                <th>Dosis</th>
                <th>Frecuencia</th>
                <th>Via</th>
              </tr>
            </thead>
            <tbody>
          ';
          
          
            ///////////////// PARA INSERTAR MEDICAMENTOS EN LA HISTORIA //////////////// 
            foreach ($_POST['medicamentos'] as $indice => $medicamentos) { // RECORREMOS EL ARRAY medicamentos
                $tablaMedicamentos .= '<tr>';
              foreach ($medicamentos as $nombreCampo => $value) {//RECORREMOS EL ARRAY DE UN MEDICAMENTO
          
                $tablaMedicamentos .= '<td>'.$value.'</td>';
              }
              $tablaMedicamentos .= '</tr>';
          
            }
          }
          $tablaMedicamentos .= '</tbody></table>';


          $fechaActual = date("Y-m-d");
          $horaActual = date("H:i:s");

          $nombreProcedimiento = "Suministro de Medicamentos";
          mysqli_query($conn3, "INSERT INTO procedimientosHospitalizacion (idHospitalizacion, cliente_id, usuario_id, Fecha, Hora, nombreProcedimiento ,detalle) VALUES('$hospitalizacionId', $clienteId,$usuarioId, '$fechaActual', '$horaActual', '$nombreProcedimiento','$tablaMedicamentos') ");
    }

    
    ///INICIO: PARA GUARDAR SUMINISTROS DE ALIMENTACION
    if ($tipoGuardado == 'Alimentacion') {
        if ($_POST['alimento'] <> "") {


            


            $tablaAlimentos = '<table class="table" style="width: 100%">
            <thead>
              <tr>
                <th>Tipo</th>
                <th>Hora</th>
                <th>Detalle</th>
              </tr>
            </thead>
            <tbody>
          ';
          
          
            ///////////////// PARA INSERTAR MEDICAMENTOS EN LA HISTORIA //////////////// 
            foreach ($_POST['alimento'] as $indice => $medicamentos) { // RECORREMOS EL ARRAY medicamentos
                $tablaAlimentos .= '<tr>';
              foreach ($medicamentos as $nombreCampo => $value) {//RECORREMOS EL ARRAY DE UN MEDICAMENTO
          
                $tablaAlimentos .= '<td>'.$value.'</td>';
              }
              $tablaAlimentos .= '</tr>';
          
            }
          }
          $tablaAlimentos .= '</tbody></table>';


          $fechaActual = date("Y-m-d");
          $horaActual = date("H:i:s");

          $nombreProcedimiento = "Suministro de Alimentos";
          mysqli_query($conn3, "INSERT INTO procedimientosHospitalizacion (idHospitalizacion, cliente_id, usuario_id, Fecha, Hora, nombreProcedimiento ,detalle) VALUES('$hospitalizacionId', $clienteId,$usuarioId, '$fechaActual', '$horaActual', '$nombreProcedimiento','$tablaAlimentos') ");
    }
    ///FIN: PARA GUARDAR SUMINISTROS DE ALIMENTACION



    //INICIO: PARA GUARDAR NOTAS DE ENFERMERÍA
    if ($tipoGuardado == 'notaEnfermeria') {

        $notaEnfermeria = $_POST['notaEnfermeria'];



        $fechaActual = date("Y-m-d");
        $horaActual = date("H:i:s");

        $nombreProcedimiento = "Nota de enfermeria";
        mysqli_query($conn3, "INSERT INTO procedimientosHospitalizacion (idHospitalizacion, cliente_id, usuario_id, Fecha, Hora, nombreProcedimiento ,detalle) VALUES('$hospitalizacionId', $clienteId,$usuarioId, '$fechaActual', '$horaActual', '$nombreProcedimiento','$notaEnfermeria') ");
}
    ///FIN: PARA GUARDAR NOTAS DE ENFERMERÍA


///INICIO: PARA GUARDAR REGISTROS DE VISITANTES
if ($tipoGuardado == 'visitantes') {
    if ($_POST['visitantes'] <> "") {


        


        $tablaVisitantes = '<table class="table" style="width: 100%">
        <thead>
          <tr>
            <th>Nombre del visitante</th>
            <th>Parentesco</th>
            <th>Hora de Ingreso</th>
            <th>Hora estimada de salida</th>
          </tr>
        </thead>
        <tbody>
      ';
      
      
        ///////////////// PARA INSERTAR MEDICAMENTOS EN LA HISTORIA //////////////// 
        foreach ($_POST['visitantes'] as $indice => $medicamentos) { // RECORREMOS EL ARRAY medicamentos
            $tablaVisitantes .= '<tr>';
          foreach ($medicamentos as $nombreCampo => $value) {//RECORREMOS EL ARRAY DE UN MEDICAMENTO
      
            $tablaVisitantes .= '<td>'.$value.'</td>';
          }
          $tablaVisitantes .= '</tr>';
      
        }
      }
      $tablaVisitantes .= '</tbody></table>';


      $fechaActual = date("Y-m-d");
      $horaActual = date("H:i:s");

      $nombreProcedimiento = "Registro de visitantes";
      mysqli_query($conn3, "INSERT INTO procedimientosHospitalizacion (idHospitalizacion, cliente_id, usuario_id, Fecha, Hora, nombreProcedimiento ,detalle) VALUES('$hospitalizacionId', $clienteId,$usuarioId, '$fechaActual', '$horaActual', '$nombreProcedimiento','$tablaVisitantes') ");
      echo "INSERT INTO procedimientosHospitalizacion (idHospitalizacion, cliente_id, usuario_id, Fecha, Hora, nombreProcedimiento ,detalle) VALUES('$hospitalizacionId', $clienteId,$usuarioId, '$fechaActual', '$horaActual', '$nombreProcedimiento','$tablaVisitantes') ";
}
///FIN: PARA GUARDAR REGISTROS DE VISITANTES


    //INICIO: PARA REALIZAR MOVIMIENTOS DE CAMILLAS
    if ($tipoGuardado == 'movimientoCamilla') {
        $pisoSelect = $_POST["pisoSelect"];
        $habitacionSelect = $_POST["habitacionSelect"];
        $camillaSelect = $_POST["camillaSelect"];
        $motivoMovimiento = $_POST["motivoMovimiento"];

        $tablaMovimiento='<table class="table">
        <thead>
        <tr>
            <th scope="col" style="width:33%">Piso</th>
            <th scope="col" style="width:33%">Habitación</th>
            <th scope="col" style="width:33%">Camilla</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                '.funcionMaster($pisoSelect, "id","despcripcion", "ho_piso").'
            </td>
            <td>
                '.funcionMaster($habitacionSelect, "idHabitacion", "descripcion", "ho_habitaciones").'
            </td>
            <td>
            '.funcionMaster($camillaSelect, "idCamilla","descripcion", "ho_camilla").'
            </td>
        </tr>
        </tbody>
    </table>';

        $tablaMovimiento .= '<p><b>Motivo del movimiento de camilla</b>'.$motivoMovimiento.'</p>';

        
        $fechaActual = date("Y-m-d");
        $horaActual = date("H:i:s");

        $camillaActual = funcionMaster($hospitalizacionId,'idHospitalizacion','camillaSelect','hoIngresoHospitalizacion');


        $nombreProcedimiento = "Movimiento de Camilla";
        mysqli_query($conn3, "INSERT INTO procedimientosHospitalizacion (idHospitalizacion, cliente_id, usuario_id, Fecha, Hora, nombreProcedimiento ,detalle) VALUES('$hospitalizacionId', $clienteId,$usuarioId, '$fechaActual', '$horaActual', '$nombreProcedimiento','$tablaMovimiento') ");
        mysqli_query($conn3, "UPDATE hoIngresoHospitalizacion SET pisoSelect='$pisoSelect', habitacionSelect='$habitacionSelect', camillaSelect='$camillaSelect' WHERE idHospitalizacion = '$hospitalizacionId'");
        mysqli_query($conn3, "UPDATE ho_camilla SET disponible=0 WHERE idCamilla='$camillaSelect'");
        mysqli_query($conn3, "UPDATE ho_camilla SET disponible=1 WHERE idCamilla='$camillaActual'");
}

    //FIN: PARA REALIZAR MOVIMIENTOS DE CAMILLAS

//FIN: PARA FINALIZAR HOSPITALIZACION
if(isset($_GET['idHos']) && $_GET['idHos'] != ''){
  echo "Entró";
    $idHos = $_GET['idHos'];
    $fechaActual = date("Y-m-d");
    $horaActual = date("H:i:s");
    $camillaActual = funcionMaster($idHos,'idHospitalizacion','camillaSelect','hoIngresoHospitalizacion');
    mysqli_query($conn3, "UPDATE ho_camilla SET disponible=1 WHERE idCamilla = '$camillaActual'");
    //echo "UPDATE ho_camilla SET disponible=1 WHERE idCamilla = '$camillaActual'";
    mysqli_query($conn3, "UPDATE hoIngresoHospitalizacion SET hospitalizacionActiva = 0, fechaSalida='$fechaActual', horaSalida='$horaActual' WHERE idHospitalizacion = '$idHos'");
    //echo "UPDATE hoIngresoHospitalizacion SET hospitalizacionActiva = 1, fechaSalida='$fechaActual', horaSalida='$horaActual' WHERE idHospitalizacion = '$idHos'";
    //echo "<script>window.location.href='documentosFormulario?cI=". encrypt($clienteId). "&pGi=OsBytGjsOEMQ=='</script>";
    $cI = funcionMaster($idHos, "idHospitalizacion", "cliente_id" ,"hoIngresoHospitalizacion");
    echo "<script>window.location.href='documentosFormulario?cI=". encrypt($cI). "&pGi=OsBytGjsOEMQ=='</script>";
}






    $pisoHospitalizacion = funcionMaster($hospitalizacionId, "idHospitalizacion", "pisoSelect", "hoIngresoHospitalizacion");
    echo "<script>window.location.href='salaHospitalizacion.php?idP={$pisoHospitalizacion}'</script>";

?>